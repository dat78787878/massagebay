<?php 

namespace Search\Factories;

class SearchFactory{

	use \Kiotviet\Traits\TFactory;

	public static function target(){

		return "\Search\Classes\SearchDB";

	}

}