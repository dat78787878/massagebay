<?php
namespace VthSupport\Classes;
class ColorHelper{
	private static $color = [
					'a'=>'#E32636',
					'b'=>'#F5F5DC',
					'c'=>'#78866B',
					'd'=>'#FED85D',
					'e'=>'#C2B280',
					'f'=>'#801818',
					'g'=>'#E49B0F',
					'h'=>'#5218FA',
					'i'=>'#00416A',
					'j'=>'#00A86B',
					'k'=>'#4CBB17',
					'l'=>'#B57EDC',
					'm'=>'#FF00FF',
					'n'=>'#FFDEAD',
					'o'=>'#CC7722',
					'p'=>'#FFEFD5',
					'q'=>'#6C6961',
					'r'=>'#734A12',
					's'=>'#FF6600',
					't'=>'#D2B48C',
					'u'=>'#120A8F',
					'v'=>'#413000',
					'w'=>'#F5DEB3',
					'x'=>'#eeed09',
					'y'=>'#FFFF00',
					'z'=>'#506022'
					];
	public static function get($name){
		return array_key_exists($name, static::$color)?static::$color[$name]:'#fff';
	}
}
