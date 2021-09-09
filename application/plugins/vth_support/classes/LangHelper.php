<?php

namespace VthSupport\Classes;

class LangHelper{
	public static function lang($key,$default=""){
		$key = strtoupper($key);
		$lang = lang($key);

		if($lang == $key || $lang ==""){
			return $default;
		}
		return $lang;
	}
}