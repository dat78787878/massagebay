<?php
namespace VthSupport\Classes;
class FileInfoHelper{
	
	public static function isImage($file){
		$CI = &get_instance();
		$CI->load->config('filemanager');
		$extimgs= $CI->config->item('ext_img');
		$ext = strtolower(static::getExtension($file));
		return in_array($ext, $extimgs);
	}
	public static function getExtension($file){
		return pathinfo($file, PATHINFO_EXTENSION);
	}
}