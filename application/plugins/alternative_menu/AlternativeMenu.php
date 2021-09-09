<?php
use VthSupport\Classes\ArrayHelper as AH;
use VthSupport\Classes\UrlHelper as UH;
use VthSupport\Classes\StringHelper as SH;
use AlternativeMenu\Classes\DBHelper as DBH;
class AlternativeMenu extends IPlugin{
	public $hasAdmin = true;
	protected $rootItems = [];
	protected $rootNoEmptyItems = [];
	protected $menuBySlugs = [];
	protected $menuByIds = [];
	protected $config = [];
	protected $activeMenu = '';
	protected $currentGroupId = 0;
	public function __construct(){
		parent::__construct();
		$this->config= $this->getConfigPlugins();
		$this->configStatic = array_key_exists('static', $this->config)?$this->config['static']:[];
		$this->configMenu = array_key_exists('menus', $this->config)?$this->config['menus']:[];
	}
	public function install(){}
	public function uninstall(){}
	public function printMenu($args){
	}
	private function _selectMenuData($where,$input,$table,$field){
		$key = md5(SH::toStringArray(__FILE__,$where,$input,$table,$field));
		$resultHook = $this->CI->hooks->call_hook(['plugin_alternative_menu_pre_select_data','where'=>$where,'input'=>$input,'table'=>$table,'field'=>$field]);
		if(is_array($resultHook)){
			extract($resultHook);
		}
		\Container::setData($key,
			function() use($where,$input,$table,$field){
				$sql = "select ".(strlen($input)>0?$input:" * ")." from ".$table." where 1= 1 ";
		        if(is_array($where)){
		            foreach ($where as $w) {
		                $sql .=" and ".$w["key"]." = ".$w["value"]."";
		                if($w['key']=='group_id'){
		                	$this->currentGroupId = $w['value'];
		                }
		            }
		        }
	            $sql .=" order by parent,ord";
	            return $this->CI->db->query($sql)->result_array();
		            
			}); 
		return \Container::getBy($key);
	}
	public function recursiveTable($args){
		$where = $args['where'];
		$input = $args['input'];
		$table = $args['table'];
		$field = $args['field'];
		if($table =='menu'){
			$results = $this->_selectMenuData($where,$input,$table,$field);
            $this->_extractMenus($results);
            $results = AH::groupBy($results,'parent');
            if(array_key_exists($this->currentGroupId, $this->configMenu)){
            	$this->activeMenu = $this->getActiveMenu($results);
            }
            $this->_printMenu($results);
			return ['returnDefault'=>false,'result'=>[]];
		}
		return true;
		
	}
	private function _extractMenus($results){
		foreach ($results as $k => $item) {
			$slug = $item['link'];
			if($item['parent']==0){
				$slug = UH::uriString($slug);
				
				if(!isNull($slug) && !SH::startsWith($slug,'http')){
					$this->rootItems[$slug] = $item;
					$this->rootNoEmptyItems[$slug] = $item;
				}
				else{
					$this->rootItems[$item['id']] = $item;
				}
			}
			if(!isNull($slug)){
				$this->menuBySlugs[$slug] = $item;
				$this->menuByIds[$item['id']] = $item;
			}
		}
	}
	private function getRootParentRoutes(){
		$uris = array_keys($this->rootNoEmptyItems);
		$routes = DBH::instance()->getRoute($uris);
		$routesByTable = AH::groupBy($routes,'table');
		return $routesByTable;
	}
	private function getAllParentCurrent($currentItem,$currentTable,$tableParent){
		$parents = DBH::instance()->getParentPivots($currentTable,$tableParent,$currentItem['id']);
		if(count($parents)==0){
			$parents = isset($currentItem['parent'])?$currentItem['parent']:'';
			$parents = explode(',', $parents);
		}
		return $parents;
	}
	private function getAllSubParents($tableParent,$currentRoot){
		$ids = [$currentRoot['tag_id']];
		$finalIds = [];
		$finalIds = array_merge($finalIds,$ids);
		do {
			$results = DBH::instance()->getByField($tableParent,'parent',$ids);
			$ids = AH::getFields($results,'id');
			$finalIds = array_merge($finalIds,$ids);
		} while (count($results)>0);
		return $finalIds;
	}
	private function isChild($uri){
		$this->configStatic = AH::groupBy($this->configStatic,'map');
		$result = DBH::instance()->getRoute($uri);
		if(!$result) return false;
		$currentTable = $result['table'];
		if(isNull($currentTable)) return false;
		if(array_key_exists($currentTable, $this->configStatic)){
			$staticLink = count($this->configStatic[$currentTable])>0?$this->configStatic[$currentTable][0]['name']:'';
			if(!isNull($staticLink)){
				foreach ($this->rootNoEmptyItems as $k => $root) {
					if($root['link'] ==$staticLink){
						return $root['link'];
					}
				}
			}
		}
		$currentItem = DBH::instance()->getById($currentTable,$result['tag_id']);
		if(!$currentItem) return false;
		$currentTableData = DBH::instance()->getDataTable($currentTable);
		if($currentTableData['pagination']==0 && !isNull($currentTableData['table_parent'])){
			$tableParent = $currentTableData['table_parent'];
			$routesRoots = $this->getRootParentRoutes();
			if(array_key_exists($tableParent, $routesRoots)){
				$currentParents  = $this->getAllParentCurrent($currentItem,$currentTable,$tableParent);
				if(count($currentParents)==0) return false;
				$currentRoots = $routesRoots[$tableParent];
				foreach ($currentRoots as $key => $currentRoot) {
					$parents = $this->getAllSubParents($tableParent,$currentRoot);
					if(count(array_intersect($parents,$currentParents))>0){
						return $currentRoot['link'];
					}
				}
			}
			else{
				return false;
			}
		}
		return false;
	}
	private function getIsSubMenu($results,$uri){
		do {
			$parentMenu = $this->menuByIds[$this->menuBySlugs[$uri]['parent']];
			$uri = $parentMenu['link'];
			$parent= $parentMenu['parent'];
		} while ($parent>0);
		return $uri;
	}
	private function getActiveMenu($results){
		$uri = $this->CI->uri->segment(1,'');
		$resultHook = $this->CI->hooks->call_hook(['plugin_alternative_menu_pre_get_active_menu','results'=>$results,'uri'=>$uri]);
		if(is_array($resultHook)){
			extract($resultHook);
		}
		if(!isNull($uri)){
			if(array_key_exists($uri, $this->rootNoEmptyItems)){
				return $uri;
			}
			else{
				if(array_key_exists($uri, $this->menuBySlugs)){
					return $this->getIsSubMenu($results,$uri);
				}
				if($link = $this->isChild($uri)){
					return $link;
				}
			}
		}
		return '';
	}
	private function _printMenu($results,$parent = 0){
		$resultHook = $this->CI->hooks->call_hook(['plugin_alternative_menu_pre_print_menu','results'=>$results,'parent'=>$parent]);
		if(is_array($resultHook)){
			extract($resultHook);
		}
		if(array_key_exists($parent, $results) && count($results[$parent])>0){
			echo '<ul>';
			foreach ($results[$parent] as $k => $item) {
				if($item['parent']==$parent){
					$str = '<li class="clazzli clazzli-%s %s %s"><a class="clazza clazza-%s" rel="%s" href="%s">%s</a>';
					$str = sprintf($str,$item['id'],$item['clazz'],(!isNull($this->activeMenu) && $this->activeMenu==$item['link'])?'active':'',$item['id'],$item['nofollow'] == 1?'nofollow':'',UH::exactLink($item['link']),$item['name']);
					echo $str;
					$this->_printMenu($results,$item['id']);
					echo '</li>';
				}
			}
			echo '</ul>';
		}
	}
}