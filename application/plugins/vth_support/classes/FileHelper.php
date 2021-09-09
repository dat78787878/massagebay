<?php 
namespace VthSupport\Classes;
class FileHelper
{
	public static function mkdir($dir,$permission = 0755){
		if(!file_exists($dir)){
			mkdir($dir,$permission,true);
		}
	}
}