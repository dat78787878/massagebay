<?php


namespace BaseWebsite\Constants;


use VthSupport\Enums\BaseEnum;


use TechSupport\Helpers\StringHelper;


class Url extends BaseEnum


{


	const ALL_TOUR = 'all-tour';


	const SHOW_DATA_TOUR = 'tour';


	const SHOW_DATA_COMBO = 'combo';


	const SHOW_TOUR_DOMESTIC = 'tour-trong-nuoc';


	const SHOW_TOUR_FOREIGN = 'tour-quoc-te';


	const FILLTER_TOUR = 'loc-tour';


	const FILLTER_COMBOS = 'loc-combo';


	const ALL_HOTEL = 'khach-san';


	const SHOW_LIST_HOTEL = 'danh-sach-khach-san';


	const ALL_CUSTOMER = 'khach-hang';


	const SHOW_LIST_HANDBOOK = 'cam-nang';


	const SHOW_LIST_SALE = 'khuyen-mai';


	const SHOW_LIST_QUESTIONS = 'cau-hoi-thuong-gap';


	const BUFFET_TOUR = 'tour-tu-chon';


	const SHOW_MENU_TEMPLATE = 'ban-mau-thuc-don';

	const SEARCH = 'tim-kiem';
	

	const SEARCH_TOUR = 'search-tour';


	const SEARCH_COMBO = 'search-combo';


	const LIST_CUSTOMER_SCHEDULE = 'lich-trinh';


	const LIST_PRIVATE_SCHEDULE = 'secret-security-schedule';


	const GET_TOUR_SHOW_SCHEDULE = 'get-tour-schedule';


	const USER_COUPON = 'dung-ma-khuyen-mai';


	const SHOW_HOTELS_DOMESTIC = 'khach-san-trong-nuoc';


	const SHOW_HOTELS_FOREIGN = 'khach-san-quoc-te';


	const SHOW_HANDBOOK_DOMESTIC = 'cam-nang-trong-nuoc';


	const SHOW_HANDBOOK_FOREIGN = 'cam-nang-quoc-te';


	const ALL_HANDBOOK = 'tat-ca-cam-nang';


	const TEST_CODE = 'test-code';





	public static function getRoutes(){


		$constants = static::getConstants();


		$results = [];


		foreach ($constants as $key => $constant) {


			$fnc = StringHelper::camelCase($key);


			$results[$fnc] = $constant;


		}


		return $results;


	}


}