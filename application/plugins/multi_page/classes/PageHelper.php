<?php 
namespace MultiPage\Classes;
class PageHelper{
	public static function linkPage($link){
		$CI = &get_instance();
		$resultHook = $CI->hooks->call_hook(['plugins_multi_page_link_page','link'=>$link]);
		if(!is_bool($resultHook) && is_array($resultHook)){
			extract($resultHook);
		}
		return $link;
	}
	public static function linkTable($link,$table,$lang){
		$CI = &get_instance();
		$resultHook = $CI->hooks->call_hook(['plugins_multi_page_link_table','link'=>$link,'lang'=>$lang,'table'=>$table]);
		if(!is_bool($resultHook) && is_array($resultHook)){
			extract($resultHook);
		}
		return $link;
	}
}