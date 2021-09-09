<?php 
namespace TechSupport\Databases;
use TechSupport\Classes\Pagination;
use TechSupport\Providers\Container;

class Builder{
    protected $CI;
    protected $model;
    public function __construct(){
        $this->CI = &get_instance();
    }
    public function setModel($model){
        $this->model = $model;
    }
    private function createModel(){
        if(is_object($this->model)){
            return clone $this->model;
        }
        return new $this->model;
    }
    public function find($id,$cache = true){
        $ins = $this->createModel();
        $key = $ins->getPrimaryKey();
        return $this->findBy($key,$id,$cache);
    }

    public function findBy($key,$value,$cache=true){
		$results = $this->where([[$key,'=',$value]],'*','0,1','id desc',$cache);
        if(count($results)>0){
            return $results[0];
        }
    }
    
    private function getOffset($segmentIndex){
        if(function_exists('pGetLanguage')){
            $currentLang = pGetLanguage();
            $defaultLang = pgetDefaultLanguage();
            $segmentIndex = $currentLang==$defaultLang?$segmentIndex:$segmentIndex+1;    
        }
		return $segmentIndex;
    }
    public function paginate($where,$url,$perPage =8,$offsetIndex=0,$order='id desc'){
        $ins = $this->createModel();
        $where = $this->convertWhere($where);
        $offsetIndex = $this->getOffset($offsetIndex);
        $offset = \VthSupport\Classes\RequestHelper::segmentInt($offsetIndex,0);
        $config['base_url']=\VthSupport\Classes\UrlHelper::exactLink($url);
        $config['per_page']=$perPage;
        $config['total_rows']=$this->CI->Dindex->getNumDataDetail($ins->getTable(),$where);
        $limit = $offset.",".$config['per_page'];
        $items = $this->where($where,'*',$limit,$order);
        $config['reuse_query_string'] = true;
        $config['uri_segment']=$offsetIndex;
        $total = $config['total_rows'];
        $pages = ceil($config['total_rows']/$config['per_page']);
        $this->CI->pagination->initialize($config);
        $pagination = new Pagination($items,$total,$pages);
        return $pagination;
    }

    public function where($where,$input = '*',$limit = '',$order='id desc',$cache = true){
        $args = func_get_args();
        $ins = $this->createModel();
        $table = $ins->getTable();
        $key = Container::makeKey($args,$table);
        return Container::getData($key,function() use($where,$input,$limit,$order){
            return $this->_where($where,$input,$limit,$order);
        });
    }
    private function _where($where,$input = '*',$limit = '',$order='id desc'){
        $where = $this->convertWhere($where);
        $ins = $this->createModel();
		$results = $this->CI->Dindex->getDataDetail([
            'table'=>$ins->getTable(),
            'input'=>$input,
            'where'=> $where,
            'limit'=>$limit,
            'order'=>$order,
            'object'=>'0'
        ]);
        $items = [];
        foreach ($results as $k => $item) {
            $ins = $this->createModel();
            $ins->setData($item);
            $items[] = $ins;
        }
        return $items;
    }
    private function convertWhere($inputs){
        $wheres = [];
        foreach ($inputs as $k => $w) {
            $wheres[] = array_combine( ['key','compare','value'], $w );
        }
        return $wheres;
    }

  
}