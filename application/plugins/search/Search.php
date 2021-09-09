<?php
use Search\Factories\SearchFactory as SF;
class Search extends IPlugin{
	protected $linkSearch = "search";
	public function __construct(){
		parent::__construct();
		$this->CI = &get_instance();
	}
	public function install(){
		$this->addRoutes("Vindex/search",$this->linkSearch);
		$this->publishFile("theme/js/script.min.js");
		$this->publishFile("theme/css/style.css");
	}
	public function uninstall(){
		$this->removeRoutes($this->linkSearch);
		$this->removeFile();
	}
	
	public function initVindex(){
		$vindex = &get_instance();
		$page = $this;
		$vindex::macro("search", function($itemRoutes) use($page){
			$page->search($itemRoutes);
		});
	}
	public function search($itemRoutes){
		$segment = 2;
		$datasearch = $this->CI->input->get();
		$q=isset($datasearch['q'])?$datasearch['q']:'';
		$q=addslashes(trim($q));
		$table = 'pro';
		$limit = 10;
		$wheres=[['key'=>'act','compare'=>'=','value'=>1]];
		$isAjax = $this->CI->input->is_ajax_request();
		$catchAutocomplete = true;
		$keyQuery = ['name'];
		$resultHook = $this->CI->hooks->call_hook(['plugin_search_before_select','keyQuery'=>$keyQuery,'segment'=>$segment,'table'=>$table,'q'=>$q,'itemRoutes'=>$itemRoutes,'limit'=>$limit,'wheres'=>$wheres,'catchAutocomplete'=>$catchAutocomplete]);
        if(is_array($resultHook)){
            extract($resultHook);
        }

		$pp=(int)$this->CI->uri->segment($segment,0);
		$list_data = SF::getDataTable($table,$q,$keyQuery,$wheres,$pp,$limit);
		if($isAjax && $catchAutocomplete){
			$this->showAjaxdata($q,$list_data);
	        die;
		}
		$total = SF::getCount($table,$q,$keyQuery,$wheres);
		$resultHook = $this->CI->hooks->call_hook(['plugin_search_after_select','pp'=>$pp,'list_data'=>$list_data,'total'=>$total]);
        if(is_array($resultHook)){
            extract($resultHook);
        }
		$config['base_url']=base_url($itemRoutes['link']);
		$config['per_page']=$limit;
		$config['total_rows']=$total;
		$config['uri_segment']=$segment;
		$config['reuse_query_string'] = true;
		$this->CI->pagination->initialize($config);

		$dataitem = [];
		$dataitem['name']= $itemRoutes['title_seo']."-".$q;
		$dataitem['s_title']= $itemRoutes['title_seo']."-".$q;
		$dataitem['s_des']= $itemRoutes['des_seo'];
		$dataitem['s_key'] = $itemRoutes['key_seo'];

		$data['totalrow'] = $config['total_rows'];
		$data['pages'] = $config['total_rows']/$config['per_page'];
		$data['list_data'] = $list_data;
		$data['dataitem'] =$dataitem;
		$data['keyword']=$q;
		$resultHook = $this->CI->hooks->call_hook(['plugin_search_before_show','data'=>$data,'config'=>$config]);
        if(is_array($resultHook)){
            extract($resultHook);
        }
        if($this->CI->blade->view()->exists('search.view')){
			echo $this->CI->blade->view()->make('search.view',$data)->render();
        }
        else{
			echo $this->CI->blade->view()->make('search::view',$data)->render();
        }
	}
	private function showAjaxdata($q,$list_data){
		$dataAutocomplete = [];
		$dataAutocomplete['keyword'] = $q;
		$dataAutocomplete['list_data'] = $list_data;
		if($this->CI->blade->view()->exists('search.autocomplete')){
			echo $this->CI->blade->view()->make('search.autocomplete',$dataAutocomplete)->render();
        }
        else{
			echo $this->CI->blade->view()->make('search::autocomplete',$dataAutocomplete)->render();
        }
	}
	public function insertScript(){

		return '<script defer type="text/javascript" src="'.$this->urlFile("theme/js/script.min.js").'"></script>';

	}
	public function insertStyle(){
		return '<link rel="stylesheet" href="'.$this->urlFile("theme/css/style.css").'">';
	}
}