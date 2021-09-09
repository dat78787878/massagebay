<?php
namespace VthSupport\Classes;
class StringHelper{	
	public static function startsWith($string, $start)	{	   
	 return strrpos($string, $start, -strlen($string)) !== false;	
	}	
	public static function endsWith($string, $end)	{	    
		return ($offset = strlen($string) - strlen($end)) >= 0 && strpos($string, $end, $offset) !== false;	
	}	
	public static function contains($string,$str){		
		return strpos($string, $str)!==FALSE;	
	}	
	public static function toString($obj){		
		if(is_string($obj)){			
			return $obj;		
		}		
		else if(is_array($obj)|| is_object($obj)){			
			return json_encode($obj);		
		}		
		else{			
			return strval($obj);		
		}	
	}	
	public static function toStringArray(...$objs){		
		$str ="";		
		foreach ($objs as $k => $obj) {			
			$str.=static::toString($obj);		
		}		
		return $str;	
		}
	}