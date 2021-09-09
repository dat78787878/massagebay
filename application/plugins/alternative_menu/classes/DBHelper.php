<?php 
namespace AlternativeMenu\Classes;
use VthSupport\Classes\ArrayHelper;
use VthSupport\Classes\StringHelper;
class DBHelper{
	use \VthSupport\Traits\Singleton;
	protected $CI;
	public function __construct(){
		$this->CI = &get_instance();
	}
	public function getRoute($link){
		$key = md5(StringHelper::toStringArray(__CLASS__,__FUNCTION__,$link));
		\Container::setData($key,
			function() use($link){
				if(is_array($link)){
					$link = count($link)==0?[-1]:$link;
			    	$this->CI->db->where_in("link",$link);
				}
				else{
			    	$this->CI->db->where("link",$link);
				}
			    $routes = $this->CI->db->get("nuy_routes")->result_array();
			    if(count($routes) > 0){
			    	if(is_array($link)){
			        	return $routes;
			    	}
		        	return $routes[0];
			    }
			    else{
			         return false;
			    }
		            
			}); 
		return \Container::getBy($key);
	}
	public function getDataTable($table){
		$key = md5(StringHelper::toStringArray(__CLASS__,__FUNCTION__,$table));
		\Container::setData($key,
			function() use($table){
				$this->CI->db->where("name",$table);
			    $tables = $this->CI->db->get("nuy_table")->result_array();
			    if(count($tables) > 0){
			        return $tables[0];
			    }
			    else{
			         return false;
			    }
			}); 
		return \Container::getBy($key);
	    
	}
	public function getByField($table,$field, $values,$select="id,parent,slug"){
		$key = md5(StringHelper::toStringArray(__CLASS__,__FUNCTION__,$table,$field,$values,$select));
		\Container::setData($key,
			function() use($table,$field,$values,$select){
				$this->CI->db->select($select);
				if(is_array($values)){
					$values = count($values)==0?[-1]:$values;
					$this->CI->db->where_in($field,$values);
				}
				else{
					$this->CI->db->where($field,$values);
				}
				$q = $this->CI->db->get($table);
				$result = $q->result_array();
				if(count($result) > 0){
					if(is_array($values)){
						return $result;
					}
			        return $result[0];
			    }
			    else{
			         return [];
			    }
		            
			}); 
		return \Container::getBy($key);
		
	}
	public function getById($table,$id,$select="id,parent,slug"){
		return $this->getByField($table,'id',$id,$select);
	}
	public function getParentPivots($subTable,$parentTable,$id){
		$key = md5(StringHelper::toStringArray(__CLASS__,__FUNCTION__,$subTable,$parentTable,$id));
		\Container::setData($key,
			function() use($subTable,$parentTable,$id){
				$this->CI->db->where('sub_id',$id);
				$this->CI->db->where('sub_table',$subTable);
				$this->CI->db->where('parent_table',$parentTable);
				$q = $this->CI->db->get('pivots');
				$results = $q->result_array();
				return ArrayHelper::getFields($results,'parent');
		            
			}); 
		return \Container::getBy($key);
		
	}
}