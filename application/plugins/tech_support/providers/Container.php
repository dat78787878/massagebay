<?php 
namespace TechSupport\Providers;
use TechSupport\Helpers\StringHelper;
use TechSupport\Models\BaseModel;
use TechSupport\Models\SimpleModel;
class Container{
    private static $pools = [];
    public static function setData($key,$value){
        static::$pools[$key] = $value;
    }
    public static function getDataByKey($key){
        if(array_key_exists($key, static::$pools)){
            return static::$pools[$key];
        }
    }
    public static function getData($key,$callback){
        if(!array_key_exists($key,static::$pools)){
            static::$pools[$key] = $callback();
        }
        return static::$pools[$key];
    }
    public static function makeKey(){
        $args = func_get_args();
        return md5(json_encode($args));
    }
    public static function table($tableName){
        $object = new SimpleModel();
        $object->setTable($tableName);
        return $object;
    }
}