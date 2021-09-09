<?php
use TechSupport\Exams\Order;
use TechSupport\Exams\User;
use TechSupport\Providers\Container;
use TechSupport\Helpers\StringHelper as Str;

class TechSupport extends IPlugin{
	public function install(){
	}
	public function uninstall(){	
	}
	public function initVindex(){
	}
	public function customEchor($args){
		$arr = $args['arr'];
		if($arr instanceof \TechSupport\Models\BaseModel){
			$arr = $arr->getData();
			return ['arr'=>$arr];
		}
		else{
			return true;
		}
	}
	public function customBeforeGetDataDetail($args){
		$options = $args['options'];
		$key = Container::makeKey($options);
		$results= Container::getDataByKey($key);
		if(isset($results)){
			return ['force_return'=>true,'results'=>$results];
		}
		return true;
	}
	public function customAfterGetDataDetail($args){
		$results = $args['results'];
		$options = $args['options'];
		$table = $options['table'];
		$key = Container::makeKey($options);
		if(array_key_exists('object',$options) && $options['object']){
			$name = ucwords(Str::camelCase(Str::singular($table)));
			$class = '\BaseWebsite\\Models\\'.$name;
			if(class_exists($class)){
				$ret = [];
				foreach ($results as $k => $item) {
					$ret[] = new $class($item);
				}
				Container::setData($key,$ret);
				return ['results'=>$ret];
			}
		}
		else{
			Container::setData($key,$results);
		}
		return ['results'=>$results];
	}
}