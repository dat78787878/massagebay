<?php
namespace VthSupport\Classes;
class ViewHelper{
	public static function exists($view){
		$CI = &get_instance();
		return $CI->blade->view()->exists($view);
	}
	public static function make($view,$data=[],$show=true){
		$CI = &get_instance();
		if($show){
			echo $CI->blade->view()->make($view, $data)->render();
		}
		else{
			return $CI->blade->view()->make($view, $data)->render();
		}
	}
	public static function makeDefault($view,$def,$data=[],$show=true){
		if(static::exists($view)){
			return static::make($view,$data,$show);
		}
		else{
			if(static::exists($def)){
				return static::make($def,$data,$show);
			}
		}
	}
}
