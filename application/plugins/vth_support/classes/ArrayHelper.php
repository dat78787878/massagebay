<?php 
namespace VthSupport\Classes;
class ArrayHelper
{
    public static function groupBy($array, $key)
    {
        $result = array();
        foreach ($array as $val)
        {
            if (array_key_exists($key, $val))
            {
                $result[$val[$key]][] = $val;
            }
        }
        return $result;
    }
    public static function jsonDecode($string)
    {
        $result = json_decode($string, true);
        return isset($result) ? $result : [];
    }
    public static function getFields($array, $field)
    {
        $result = [];
        foreach ($array as $k => $item)
        {
            array_push($result, $item[$field]);
        }
        return $result;
    }
}

