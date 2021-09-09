<?php 
namespace VthSupport\Classes;
class PluginHelper
{
	public static function isActivePlugin($name){
		return array_key_exists($name, \HookPlugin::$groupPlugins);
	}
}