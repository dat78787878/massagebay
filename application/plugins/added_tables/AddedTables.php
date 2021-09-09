<?php
spl_autoload_register(function($class){
	if(file_exists(__dir__."/tables/$class.php")){
		require_once __dir__."/tables/$class.php";
	}
});
class AddedTables extends IPlugin
{
	//public $CI;
	//public $Xyz;
	// public $Headquarters;
	// public $Place;
	// public $Introduce_table;
	// public $Customer_categories;
	// public $Customers;
	// public $Hot_customer;
	// public $Type_tours;
	// public $Hotels;
	// public $Services;
	// public $Recruitment;
	// public $Job_applications;
	// public $Handbooks;
	// public $Questions;
	// public $Travel_plans;
	// public $Template_menus;
	// public $Coupons;
	// public $Combo_categories;
	// public $Combos;
	// public $Slide_mbs;
	// public $video;
	public function __construct()
	{
		//$this->CI = &get_instance();
		//$this->Xyz = XyzMeta::get_instance();
		//$this->abc = abcMeta::get_instance();
		// $this->Headquarters = HeadquartersMeta::get_instance();
		// $this->Place = PlaceMeta::get_instance();
		// $this->Introduce_table = Introduce_tableMeta::get_instance();
		// $this->Customer_categories = Customer_categoriesMeta::get_instance();
		// $this->Customers = CustomersMeta::get_instance();
		// $this->Hot_customer = Hot_customersMeta::get_instance();
		// $this->Type_tours = Type_toursMeta::get_instance();
		// $this->Hotels = HotelsMeta::get_instance();
		// $this->Services = ServicesMeta::get_instance();
		// $this->Recruitment = RecruitmentsMeta::get_instance();
		// $this->Job_applications = Job_applicationsMeta::get_instance();
		// $this->Handbooks = HandbooksMeta::get_instance();
		// $this->Questions = QuestionsMeta::get_instance();
		// $this->Travel_plans = Travel_plansMeta::get_instance();
		// $this->Template_menus = Template_menusMeta::get_instance();
		// $this->Coupons = CouponsMeta::get_instance();
		// $this->Combo_categories = Combo_categoriesMeta::get_instance();
		// $this->Combos = CombosMeta::get_instance();
		// $this->Slide_mbs = Slide_mbsMeta::get_instance();
		// $this->video = Video::get_instance();
	}
	public function install()
	{
		//$this->abc -> install();
		//$this->Xyz -> install();
		// $this->Headquarters->install();
		// $this->Place->install();
		// $this->Introduce_table->install();
		// $this->Customer_categories->install();
		// $this->Customers->install();
		// $this->Hot_customer->install();
		// $this->Type_tours->install();
		// $this->Hotels->install();
		// $this->Services->install();
		// $this->Recruitment->install();
		// $this->Job_applications->install();
		// $this->Handbooks->install();
		// $this->Questions->install();
		// $this->Travel_plans->install();
		// $this->Template_menus->install();
		// $this->Coupons->install();
		// $this->Combo_categories->install();
		// $this->Combos->install();
		// $this->Slide_mbs->install();
		// $this->video->install();
	}
	public function uninstall()
	{
		//$this->Xyz -> uninstall();
		//$this->abc -> uninstall();
		// $this->Headquarters->uninstall();
		// $this->Place->uninstall();
		// $this->Introduce_tableMeta->uninstall();
		// $this->Customer_categories->uninstall();
		// $this->Customers->uninstall();
		// $this->Hot_customer->uninstall();
		// $this->Type_tours->uninstall();
		// $this->Hotels->uninstall();
		// $this->Services->uninstall();
		// $this->Recruitment->uninstall();
		// $this->Job_applications->uninstall();
		// $this->Handbooks->uninstall();
		// $this->Questions->uninstall();
		// $this->Travel_plans->uninstall();
		// $this->Template_menus->uninstall();
		// $this->Coupons->uninstall();
		// $this->Combo_categories->uninstall();
		// $this->Combos->uninstall();
		// $this->Slide_mbs->uninstall();
		// $this->video->uninstall();
	}
}