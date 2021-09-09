<?php 
namespace VthSupport\Traits;
trait TFactory{
	public static function __callStatic($name, $arguments){
        $target = static::target();
        $obj = null;
        if(method_exists($target, 'instance')){
        	$obj= $target::instance();
        }
        else{
        	$obj = new $target();
        }
        if(isset($obj) && method_exists($obj,$name)){
            return call_user_func_array(array($obj,$name), $arguments);
        }
        else{
           throw new Exception('Lỗi không có phương thức '.$name);
        }
    }
}