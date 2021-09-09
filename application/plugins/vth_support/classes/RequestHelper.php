<?php
namespace VthSupport\Classes;
use VthSupport\Classes\PluginHelper;
class RequestHelper{
	public static function isAjax(){
		$CI= &get_instance();
		return $CI->input->is_ajax_request();
	}
	public static function isPost(){
		$CI= &get_instance();
		return $CI->input->server('REQUEST_METHOD') == 'POST';
	}
	public static function isGet(){
		$CI= &get_instance();
		return $CI->input->server('REQUEST_METHOD') == 'GET';
	}
	public static function getString($key,$def=''){
		$CI= &get_instance();
		$get = $CI->input->get();
		return isset($get[$key])?$get[$key]:$def;
	}
	public static function getInt($key,$def=0){
		return static::getString($key,$def);
	}
	public static function segmentInt($segment,$def=0){
		return (int)static::segmentString($segment,$def);
	}
	public static function segmentString($segment,$def=0){
		$CI= &get_instance();
		return $CI->uri->segment($segment,$def);
	}
	public static function postString($key,$def=''){
		$CI= &get_instance();
		$post = $CI->input->post();
		return isset($post[$key])?$post[$key]:$def;
	}
	public static function postInt($key,$def=0){
		return static::postString($key,$def);
	}
	public static function getReferrer($def = '/'){
		$CI= &get_instance();
		$CI->load->library('user_agent');
		$referer =  $CI->agent->referrer();
		return empty($referrer)?$def:$referrer;
	}
	public static function getIp(){
		$CI= &get_instance();
		$CI->load->library('user_agent');
		return $CI->input->ip_address();
	}
	public static function getSegmentPerpage($segment){
	    $CI = &get_instance();
		if(PluginHelper::isActivePlugin('multi_language')){
			$currentLang = pGetLanguage();
		    $defaultLang = pgetDefaultLanguage();
		    return $currentLang==$defaultLang?$segment:($segment+1);	
		}
		return $segment;
	}
}