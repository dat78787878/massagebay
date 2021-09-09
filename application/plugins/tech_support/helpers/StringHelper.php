<?php 
namespace TechSupport\Helpers;

use TechSupport\Classes\Noun;
use VthSupport\Classes\StringHelper as BaseHelper;

class StringHelper extends BaseHelper{
    public static function camelCase($str) {
        $i = array("-","_");
        $str = preg_replace('/([a-z])([A-Z])/', "\\1 \\2", $str);
        $str = preg_replace('@[^a-zA-Z0-9\-_ ]+@', '', $str);
        $str = str_replace($i, ' ', $str);
        $str = str_replace(' ', '', ucwords(strtolower($str)));
        $str = strtolower(substr($str,0,1)).substr($str,1);
        return $str;
    }
    public static function snakeCase($str) {
        $str = preg_replace('/([a-z])([A-Z])/', "\\1_\\2", $str);
        $str = strtolower($str);
        return $str;
    }
    public static function plural($str){
        return Noun::pluralize($str);
    }
    public static function singular($str){
        return Noun::singularize($str);
    }
}