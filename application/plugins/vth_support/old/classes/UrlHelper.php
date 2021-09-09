<?php
namespace VthSupport\Classes;
class UrlHelper{
	public static function exactLink($link){
		$CI= &get_instance();
		$resultHook = $CI->hooks->call_hook(['vth_url_helper_exact_link','link'=>$link]);
		if(is_array($resultHook)){
			extract($resultHook);
		}
		if(($link!=NULL && strlen($link)>0 &&  strpos($link, 'http')!==FALSE) || $link == 'javascript:void(0);'){
	        return $link;
	    }
	    else return base_url($link);
	}
	public static function uriString($link){
		return str_replace(base_url(), '', $link);
	}
}