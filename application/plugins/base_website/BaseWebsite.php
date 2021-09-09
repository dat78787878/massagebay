<?php 
use BaseWebsite\Constants\Url;
use BaseWebsite\Models\Pro;
use BaseWebsite\Models\News;
use BaseWebsite\Models\Place;
use BaseWebsite\Models\Hotel;
use BaseWebsite\Models\HandBook;
use BaseWebsite\Models\Question;
use BaseWebsite\Models\TravelPlan;
use BaseWebsite\Models\TypeTour;
use BaseWebsite\Models\TemplateMenu;
use BaseWebsite\Models\Combo;
use BaseWebsite\Models\Coupon;
use BaseWebsite\Models\NuyRoute;
use \VthSupport\Traits\TraitPlugin;
use \VthSupport\Classes\ViewHelper as View;
use \VthSupport\Classes\RequestHelper as Request;
class BaseWebsite extends IPlugin
{
	use TraitPlugin{
		initVindex as traitInitVindex;
	}
	protected $routes = [];
	public function __construct(){
		parent::__construct();
		$this->routes = Url::getRoutes();
	}
	public function initVindex(){
		$this->traitInitVindex();
		require_once 'helper.php';
		return true;
	}
	public function initTechsystem(){
		return true;
	}
	public function changeSlugTolink($args)
	{
		$table = $args['table'];
		$dataUpload = $args['dataUpload'];
		if($table=="pro" || $table=="combos"){
			$dataUpload['link'] = BaseWebsite\Classes\ConvertStringToSlug::convertStringLink($dataUpload['name'],$table);
			return ['dataUpload' =>$dataUpload];
		}
	}
	public function convertNotDuplicateLink($args)
	{
		$table = $args['table'];
		$dataUpload = $args['dataUpload'];
		if($table=="pro" || $table=="combos"){
			$id = $args['arrWhere'][0]['value'];
			$oldItem = $this->CI->db->get_where($table,['id'=>$id])->result_array();
			if (count($oldItem) > 0) {
				if ($oldItem[0]['link'] != $dataUpload['link']) {
					$dataUpload['link'] = BaseWebsite\Classes\ConvertStringToSlug::convertStringLink($dataUpload['link'],$table);
				}
			}
			return ['dataUpload' =>$dataUpload];
		}
	}
	public function allCustomer($itemRoutes)
	{
		View::make('customer_categories.all');
	}
	public function allTour($itemRoutes)
	{
		View::make('pro_categories.allpro');
	}
	private function getShowDataItem($linkRedrect,$class){
		$slug = Request::segmentString(2,'');
		if ($slug == '') redirect($linkRedrect);
		$items = $class::where([['link','=',$slug]]);
		if (count($items) == 0) redirect($linkRedrect);
		$item = $items[0];
		$data['dataitem']=$item->getData();
		$table = $item->getTable();
		$arrTable = $this->CI->Dindex->getData('nuy_table',array('map_table'=>$table),0,1);
		$itemTable = $arrTable[0];
		$data['datatable']=$itemTable;
		$data['masteritem']['controller'] = $table.'.view';
		$data['masteritem']['table'] = $table;
		$data['masteritem']['tag_id'] = $item->id;
		View::make($table.'.view',$data);
	}
	public function showDataTour($itemRoutes)
	{
		$this->getShowDataItem('all-tour','BaseWebsite\Models\Pro');
	}
	public function showDataCombo($itemRoutes)
	{
		$this->getShowDataItem('vourcher-combo','BaseWebsite\Models\Combo');
	}
	public function showTourDomestic($itemRoutes)
	{
		/* 1 là nhóm tour trong nước */
		$where =[['act','=',1],['group_id','=',1]];
		$pagination = Pro::paginate($where,$itemRoutes['link'],9,2);
		$data['pagination'] = $pagination;
		$data['dataitem']['name'] = 'Tour trong nước';
		$data['dataitem']['id'] = 0;
        View::make('pro_categories.view',$data);
	}
	public function showTourForeign($itemRoutes)
	{
		/* 2 là nhóm tour quốc tế */
		$where =[['act','=',1],['group_id','=',2]];
		$pagination = Pro::paginate($where,$itemRoutes['link'],9,2);
		$data['pagination'] = $pagination;
		$data['dataitem']['name'] = 'Tour quốc tế';
		$data['dataitem']['id'] = 0;
        View::make('pro_categories.view',$data);
	}
	public function fillterTour($itemRoutes)
	{
		$get = $this->CI->input->get();
		$where =[['act','=',1]];
		if (check($get['group_id'])) {
			array_push($where,['group_id','=',(int)$get['group_id']]);
		}
		if (check($get['end_line']) && $get['end_line'] > 0) {
			array_push($where,['end_line','=',(int)$get['end_line']]);
		}
		if (check($get['starting_line']) && $get['starting_line'] > 0) {
			array_push($where,['starting_line','=',(int)$get['starting_line']]);
		}
		if (check($get['type_id'])) {
			$arrType = implode(',',$get['type_id']);
			array_push($where,['FIND_SET_EQUALS(\''.$arrType.'\',type_id)','>',0]);
		}
		if (check($get['price_min'])) {
			array_push($where,['price','>=',(int)$get['price_min']]);
		}
		if (check($get['price_max'])) {
			array_push($where,['price','<=',(int)$get['price_max']]);
		}
		if (check($get['is_sale'])) {
			array_push($where,['price_sale','>',0]);
		}
		$pagination = Pro::paginate($where,$itemRoutes['link'],12,2);
		$data['pagination'] = $pagination;
		$data['get'] = $get;
		$data['dataitem']['name'] = 'Tìm kiếm tour';
        View::make('filter.fillter_tour',$data);
	}
	public function fillterCombos($itemRoutes)
	{
		$get = $this->CI->input->get();
		$where =[['act','=',1]];
		if (check($get['group_id'])) {
			array_push($where,['group_id','=',(int)$get['group_id']]);
		}
		if (check($get['end_line']) && $get['end_line'] > 0) {
			array_push($where,['end_line','=',(int)$get['end_line']]);
		}
		if (check($get['starting_line']) && $get['starting_line'] > 0) {
			array_push($where,['starting_line','=',(int)$get['starting_line']]);
		}
		if (check($get['type_id'])) {
			array_push($where,['type_id','=',(int)$get['type_id']]);
		}
		if (check($get['price_min'])) {
			array_push($where,['price','>=',(int)$get['price_min']]);
		}
		if (check($get['price_max'])) {
			array_push($where,['price','<=',(int)$get['price_max']]);
		}
		if (check($get['is_sale'])) {
			array_push($where,['price_sale','>',0]);
		}
		$pagination = Combo::paginate($where,$itemRoutes['link'],12,2);
		$data['pagination'] = $pagination;
		$data['get'] = $get;
		$data['dataitem']['name'] = 'Tìm kiếm combo';
        View::make('filter.fillter_combo',$data);
	}
	public function allHotel($itemRoutes)
	{
		$where =[['act','=',1]];
		$pagination = Place::paginate($where,$itemRoutes['link'],16,2);
		$data['pagination'] = $pagination;
		$data['dataitem']['name'] = 'Khách sạn';
		View::make('hotel.all_hotel',$data);
	}
	public function showListHotel($itemRoutes)
	{
		$slugPlace = Request::segmentString(2,'');
		if ($slugPlace == '') {
			redirect('not-found');
		}
		$place = Place::findBy('slug',$slugPlace);
		$where =[['act','=',1],['place_id','=',$place->id]];
		$pagination = Hotel::paginate($where,$itemRoutes['link'].'/'.$slugPlace,10,3);
		$data['pagination'] = $pagination;
		$data['place'] = $place;
		$data['dataitem']['name'] = $place->name;
		View::make('hotel.view',$data);
	}
	public function showListHandbook($itemRoutes)
	{
		$slugPlace = Request::segmentString(2,0);
		if (is_numeric($slugPlace)) {
			$where =[['act','=',1]];
			$pagination = Place::paginate($where,$itemRoutes['link'],12,2);
			$data['pagination'] = $pagination;
			View::make('handbooks.list',$data);
		}else {
			$place = Place::findBy('slug',$slugPlace);
			if ($place->isEmpty()) {
				redirect('not-found');
			}
			$where =[['act','=',1],['place_id','=',$place->id]];
			$pagination = HandBook::paginate($where,$itemRoutes['link'].'/'.$slugPlace,8,3);
			$data['pagination'] = $pagination;
			$data['place'] = $place;
			$data['dataitem']['name'] = $place->name;
			$data['dataitem']['handbook_hot'] = $place->handbook_hot;
			View::make('handbooks.list_place',$data);
		}
	}
	public function showListSale($itemRoutes)
	{
		$where =[['act','=',1],['price_sale','>',0]];
		$pagination = Pro::paginate($where,$itemRoutes['link'],12,2);
		$data['pagination'] = $pagination;
		View::make('sale.view',$data);
	}
	public function showListQuestions($itemRoutes)
	{
		$where =[['act','=',1]];
		$pagination = Question::paginate($where,$itemRoutes['link'],16,2);
		$data['pagination'] = $pagination;
		$data['dataitem']['name'] = "Câu hỏi thường gặp";
		View::make('questions.list',$data);
	}
	private function _validateInfoBuffet($post){
		if (Request::postString('start_place')== 0) {
			echoJson(100,'Vui lòng nhập điểm khởi hành!');
			die();
		}
		if (Request::postString('number_person')== 0) {
			echoJson(100,'Vui lòng nhập số người!');
			die();
		}
		if (Request::postString('type_tour') == 0) {
			echoJson(100,'Vui lòng nhập loại tour!');
			die();
		}
		if (!check($post['list_place'])) {
			echoJson(100,'Vui lòng chọn một địa điểm!');
			die();
		}
		if (Request::postString('name')== '') {
			echoJson(100,'Vui lòng nhập tên!');
			die();
		}
		if(isset($post['email']) && empty($post['email'])){
            echoJSON(110,'Vui lòng nhập email!');
            die();
        }
        if(isset($post['email']) && !filter_var($post['email'], FILTER_VALIDATE_EMAIL) && strpos($post['email'],"'") == 0) {
            echoJSON(100,'Email không hợp lệ!');
            die();
        }
		if (Request::postString('phone')== '' ) {
			echoJson(100,'Vui lòng nhập số điện thoại!');
			die();
		}
        if(!preg_match('/^0[0-9]{9}$/', Request::postString('phone'))){
        	echoJson(100,'Vui lòng nhập đúng định dạng số điện thoại!');
			die();
        }
	}
	private function getListPlaceName($list_id){
		$ret = '';
		foreach ($list_id as $key => $item) {
			$place = Place::find($item);
			if ($key == 0) {
				$ret.=$place->name;
			}else {
				$ret.= ' - '.$place->name;
			}
		}
		return $ret;
	}
	public function buffetTour($itemRoutes)
	{
		$data = [];
		$data['dataitem']['name'] = "Tour tự chọn";
		if (!Request::isPost()) {
			View::make('pro.buffet_tour',$data);
		}else {
			$post = $this->CI->input->post();
			$this->_validateInfoBuffet($post);
			$travelPlan = new TravelPlan($post);
			$travelPlan->list_place = implode(',', $post['list_place']);
			$travelPlan->list_place_name = $this->getListPlaceName($post['list_place']);
			$travelPlan->create_time = time();
			$travelPlan->update_time = time();
			$travelPlan->save();
			$contactIf = [];
			$contactIf['type'] =1;
			$contactIf['title'] ='Khách hàng gửi thông tin tự chọn tour';
			$contactIf['list_th'] =array("Họ tên khách hàng","Số điện thoại","Email","Địa chỉ","Ghi chú","Điểm khởi hành","Số người","Loại tour","Danh sách địa điểm muốn đến");
			$contactIf['data'] = [];
			$contactIf['data']['0'] = isset($post['name'])?$post['name']:"";
			$contactIf['data']['1'] = isset($post['phone'])?$post['phone']:"";
			$contactIf['data']['2'] = isset($post['email'])?$post['email']:"";
			$contactIf['data']['3'] = isset($post['address'])?$post['address']:"";
			$contactIf['data']['4'] = isset($post['note'])?$post['note']:"";
			$contactIf['data']['5'] = Place::find($post['start_place'])->name;
			$contactIf['data']['6'] = isset($post['number_person'])?$post['number_person']:"";
			$contactIf['data']['7'] = TypeTour::find($post['type_tour'])->name;
			$contactIf['data']['8'] = $travelPlan->list_place_name;
			$customerInfo = $this->CI->load->view('template_mail.template_mail',$contactIf,true);
			$customerInfo .= 'Ngày gửi: <b>'.date('d/m/Y', time()).'</b><br>';
			senMailSp($this->CI->Dindex->getSettings('MAIL_NHAN'), $contactIf['title'], $customerInfo);
			echoJson(200,'Gửi thông tin thành công!');
		}
	}
	public function showMenuTemplate($itemRoutes)
	{
		$where =[['act','=',1]];
		$pagination = TemplateMenu::paginate($where,$itemRoutes['link'],8,2);
		$data['pagination'] = $pagination;
		$data['dataitem']['name'] = "Bản mẫu thực đơn";
		View::make('template_menus.list',$data);
	}
	public function search($itemRoutes)
	{
		// var_dump("xxx");
		// die();
		$get = $this->CI->input->get();
		$key = '';
		if (isset($get) && count($get) > 0) {
			$key = $get['q'];
		}
		$data = [];
		$data['key'] = trim(addslashes($key));
		$data['dataitem']['name'] = "Tìm kiếm";
		View::make('search.view',$data);
	
	}
	public function searchTour($itemRoutes)
	{
	
		$where =[['act','=',1]];
		$get = $this->CI->input->get();
		
		if (isset($get) && count($get) > 0) {
		
			$key = isset($get['q'])?$get['q']:'';
			$key = addslashes($key);
			array_push($where,['name','like',$key]);
			array_push($where,['zone','=',1]);
		
		}
	
		$pagination = News::paginate($where,$itemRoutes['link'],6,2);
		$data['pagination'] = $pagination;
		
		// var_dump($data);
		// die();
		View::make('search.tour',$data);
	}
	// public function searchCombo($itemRoutes)
	// {
	// 	$where =[['act','=',1]];
	// 	$get = $this->CI->input->get();
	// 	if (isset($get) && count($get) > 0) {
	// 		$key = isset($get['q'])?$get['q']:'';
	// 		$key = addslashes($key);
	// 		array_push($where,['name','like',$key]);
	// 	}
	// 	$pagination = Combo::paginate($where,$itemRoutes['link'],6,2);
	// 	$data['pagination'] = $pagination;
	// 	View::make('search.combo',$data);
	// }
	public function listCustomerSchedule($itemRoutes)
	{
		View::make('pro.schedule');
	}
	public function getTourShowSchedule($itemRoutes)
	{
		$get = $this->CI->input->get();
		/*$where =[['act','=',1],['group_id','=',$get['id']]];*/
		$where =[['act','=',1]];
		$pagination = Pro::paginate($where,$itemRoutes['link'],8,2);
		$data['pagination'] = $pagination;
		View::make('pro.item_schedule_customer',$data);
	}
	public function listPrivateSchedule($itemRoutes)
	{
		$where =[['act','=',1], ['show_schedule','=',1]];
		$pagination = Pro::paginate($where,$itemRoutes['link'],10,2);
		$data['pagination'] = $pagination;
		View::make('pro.schedule_secret',$data);
	}
	public function userCoupon($itemRoutes)
	{
		if (isUsedCoupon()) {
	        echoJSON(110,'Bạn đã dùng mã giảm giá cho đơn hàng này rồi');
	        return;
	    }
		$post = $this->CI->input->post();
		if (isset($post) && count($post) > 0) {
			$code = addslashes($post['coupon']);
			$carts = $this->CI->cart->contents();
			$id = 0;
			foreach ($carts as $item) {
				$id = $item['id'];
			}
			$where = [['code','=',$code],['act','=',1]];
			$coupons = Coupon::where($where);
			if (count($coupons) > 0) {
				$coupon = $coupons[0];
				$check = $coupon->getCodeSaleInTime($id);
				if (is_object($check)) {
					$checkUse = 0;
					foreach ($carts as $item) {
						$salePercen = 0;
		                if ($item['price_old'] > $item['price']) {
		                    $salePercen = (($item['price_old']-$item['price'])/$item['price_old'])*100;
		                }
		                if ($coupon->sale_off > $salePercen) {
		                    $checkUse++;
		                    $dataUpdate = [];
		                    $dataUpdate['rowid'] = $item['rowid'];
		                    $dataUpdate['price'] = $item['price_old'] - $item['price_old']*($coupon->sale_off/100);
		                    $dataUpdate['coupon'] = $coupon->code;
		                    $dataUpdate['percen'] = $coupon->sale_off;
		                    $this->CI->cart->update($dataUpdate);
		                }
					}
					if ($checkUse > 0) {
			            setCoupon([$coupon->code,$coupon->sale_off]);
			            echoJSON(200,'Bạn đã sử dụng mã giảm giá thành công');
			            return;
			        }else {
			            echoJSON(110,"Mã giảm giá không hợp lệ!");
			            return;
			        }
				}else {
		            echoJSON(110,"Mã giảm giá không hợp lệ!");
		            return;
		        }
			}else {
	            echoJSON(110,"Mã giảm giá không hợp lệ!");
	            return;
	        }
		}
	}
	public function showHotelsDomestic($itemRoutes)
	{
		$where =[['act','=',1],['group_id','=',1]];
		$pagination = Hotel::paginate($where,$itemRoutes['link'],6,2);
		$data['pagination'] = $pagination;
		$data['dataitem']['name'] = "Khách sạn trong nước";
		$data['dataitem']['slug'] = "khach-san-trong-nuoc";
		$data['dataitem']['group_id'] = 1;
		View::make('hotel.list',$data);
	}
	public function showHotelsForeign($itemRoutes)
	{
		$where =[['act','=',1],['group_id','=',2]];
		$pagination = Hotel::paginate($where,$itemRoutes['link'],6,2);
		$data['pagination'] = $pagination;
		$data['dataitem']['name'] = "Khách sạn quốc tế";
		$data['dataitem']['slug'] = "khach-san-quoc-te";
		$data['dataitem']['group_id'] = 2;
		View::make('hotel.list',$data);
	}
	public function showHandbookDomestic($itemRoutes)
	{
		$where =[['act','=',1],['group_id','=',1]];
		$pagination = HandBook::paginate($where,$itemRoutes['link'],8,2);
		$data['pagination'] = $pagination;
		$data['dataitem']['name'] = "Cẩm nang trong nước";
		$data['dataitem']['slug'] = "cam-nang-trong-nuoc";
		$data['dataitem']['group_id'] = 1;
		View::make('handbooks.list_place',$data);
	}
	public function showHandbookForeign($itemRoutes)
	{
		$where =[['act','=',1],['group_id','=',2]];
		$pagination = HandBook::paginate($where,$itemRoutes['link'],8,2);
		$data['pagination'] = $pagination;
		$data['dataitem']['name'] = "Cẩm nang quốc tế";
		$data['dataitem']['slug'] = "cam-nang-quoc-te";
		$data['dataitem']['group_id'] = 2;
		View::make('handbooks.list_place',$data);
	}
	public function allHandbook($itemRoutes)
	{
		$where =[['act','=',1]];
		$pagination = HandBook::paginate($where,$itemRoutes['link'],8,2);
		$data['pagination'] = $pagination;
		$data['dataitem']['name'] = "Tất cả cẩm nang";
		$data['dataitem']['slug'] = "tat-ca-cam-nang";
		View::make('handbooks.list_place',$data);
	}
	/* SEARCH_CODE */
	public function createDir($currentpath, $folder_name, $parent)
    {
    	if (!file_exists($currentpath.$folder_name)) {
    		mkdir($currentpath.$folder_name,0777,TRUE);
    	}	
		$data["name"]= $folder_name;
		$data["file_name"]= $folder_name;
		$data["is_file"]= 0;
		$data["create_time"]= time();
		$data["parent"]= $parent;
		$data["path"]= $currentpath;
		$data["file_name"]= $folder_name;
		$data["extra"]= json_encode(BaseWebsite\Classes\Media::instance()->getInfoFile($folder_name,$currentpath));
		$idDir = BaseWebsite\Classes\Media::instance()->insertMedia($data);
		return $idDir;
    }
	private function _getIdDirOrCreateThenReturnIdDir($name,$parent,$currentPath){
		$this->CI->db->where('name',$name);
		$this->CI->db->where('parent',$parent);
		$ret = $this->CI->db->get('medias')->result_array();
		if (count($ret) > 0) {
			return $ret[0]['id'];
		}else {
			return $this->createDir($currentPath,$name,$parent);
		}
	}
	function human_filesize($bytes, $decimals = 2) {
		$sz = 'BKMGTP';
		$factor = floor((strlen($bytes) - 1) / 3);
		return sprintf("%.{$decimals}f", $bytes / pow(1024, $factor)) . (" ".@$sz[$factor]."B");
	}
	public function getInfoFile($filename,$file_path){
		$this->CI->config->load('filemanager');
		$extimgs = $this->CI->config->item('ext_img');
	 	$extvideos = $this->CI->config->item('ext_video');
		$extfiles = $this->CI->config->item('ext_file');
		$extmusic = $this->CI->config->item('ext_music');
		$extmisc = $this->CI->config->item('ext_misc');
		$pathuploads = $this->CI->config->item('path_uploads');
		$basepath = $this->CI->config->item('base_path');
		$obj = new \stdClass();
		$obj->extension = strtolower(substr(strrchr($filename,'.'),1));
		$obj->size= $this->human_filesize(filesize($file_path));
		$obj->date = filemtime($file_path);
		$obj->isfile = is_file($file_path)?1:0;
		$onlyDir =  substr($file_path,0, strrpos($file_path, "/")+1);
		$onlyDir = str_replace(FCPATH."/", "", $onlyDir);
		$obj->dir= $onlyDir;
		$obj->path = $onlyDir.$filename;
		if($obj->isfile){
			if(in_array($obj->extension, $extimgs)){
			$imagedetails = getimagesize($file_path);
			$obj->width = $imagedetails[0];
			$obj->height= $imagedetails[1];
			    if(file_exists(FCPATH.$onlyDir.'thumbs/def/'.$filename)){
			    $obj->thumb = $basepath.$onlyDir.'thumbs/def/'.$filename;
			    }
			    else{
			    $obj->thumb = $basepath.$onlyDir.$filename;
			    }
			}
			else if(in_array($obj->extension, $extvideos)){
			    if(file_exists(FCPATH."theme/admin/images/ico/".$obj->extension.".jpg")){
			    $obj ->thumb = $basepath."theme/admin/images/ico/".$obj->extension.".jpg";
			    }
			    else{
			    $obj->thumb = $basepath."theme/admin/images/file.jpg";
			    }
			}
			else if(in_array($obj->extension, $extfiles)){
			    if(file_exists(FCPATH."theme/admin/images/ico/".$obj->extension.".jpg")){
			    $obj ->thumb = $basepath."theme/admin/images/ico/".$obj->extension.".jpg";
			    }
			    else{
			    $obj->thumb = $basepath."theme/admin/images/file.jpg";
			    }
			  }
			else if(in_array($obj->extension, $extmusic)){
			    if(file_exists(FCPATH."theme/admin/images/ico/".$obj->extension.".jpg")){
			    $obj ->thumb = $basepath."theme/admin/images/ico/".$obj->extension.".jpg";
			    }
			    else{
			    $obj->thumb = $basepath."theme/admin/images/file.jpg";
			    }
			  }
			  else if(in_array($obj->extension, $extmisc)){
			    if(file_exists(FCPATH."theme/admin/images/ico/".$obj->extension.".jpg")){
			    $obj ->thumb = $basepath."theme/admin/images/ico/".$obj->extension.".jpg";
			    }
			    else{
			    $obj->thumb = $basepath."theme/admin/images/file.jpg";
			    }
			  }
			else{
			  $obj->thumb = $basepath."theme/admin/images/file.jpg";
			}
		}
		return $obj;
	}
	private function insertImageMedia($path, $filename,$parent = 0){
		$data["name"]= $filename;
		$data["file_name"]= $filename;
		$data["is_file"]= 1;
		$data["create_time"]= time();
		$data["parent"]= $parent;
		$data["path"]= $path;
		$data["extra"]= json_encode($this->getInfoFile($filename,$path.$filename));
		return BaseWebsite\Classes\Media::instance()->insertMedia($data);
	}
	private function resizeImage($upload_path,$getFileUpload,$widthImage,$heightImage,$quality,$name){
		$filename = is_array($getFileUpload)?$getFileUpload['file_name']:$getFileUpload;
		$config['image_library'] = 'gd2';
		$config['source_image'] = FCPATH.$upload_path.$filename;
		$config['create_thumb'] = false;
		$p = $upload_path."thumbs/".$name."/";
		if(!is_dir($p)){
			mkdir($p,0777,1);
		}
		$config['new_image'] = $p.$filename;
		if($heightImage<=0){
			$config['maintain_ratio'] = TRUE;
			$config['width'] = $widthImage;
		}
		else if($widthImage<=0){
			$config['maintain_ratio'] = TRUE;
			$config['height']   = $heightImage; 
		}
		else{
			$config['maintain_ratio'] = FALSE;
			$config['width'] = $widthImage;
			$config['height']   = $heightImage; 
		}
		$config['quality'] = $quality;
		$this->CI->image_lib->initialize($config);
		$this->CI->image_lib->resize();
		$this->convertToWebp($config['new_image']);
		return $config['new_image'];
	}
	private function getSizes($file){
		if(file_exists($file)){
			$json = $this->getConfigSite('size_image',"");
			$arr = json_decode($json,true);
			$arr = @$arr?$arr:array();
			$s = getimagesize($file);
			$w = count($s)>0 && $s[0] > 0 ?$s[0]:1;
			$h = count($s)>1?$s[1]:1;
			array_push($arr,array("name"=>"def","width"=>100,"height"=>(int)($h*100/$w),"quality"=>80));
			return $arr;
		}
		return array();
	}
	public function getConfigSite($key,$def){
		$configs = $this->CI->session->userdata('siteconfigs');
		$key = strtoupper($key);
		if(@$configs && array_key_exists($key, $configs)){
			return $configs[$key];
		}
		return $def;
	}
	private function convertToWebp($source){
		if (!is_file($source)) {
			return '';
		}
		$destination = $this->getWebpFile($source);
		$options = [];
		\WebPConvert\WebPConvert::convert($source, $destination, $options);
		if(file_exists($destination)){
			return $destination;
		}
		return '';
	}
	private function getWebpFile($file){
		$path = pathinfo($file);
		$dirname = $path["dirname"];
		$extension = $path["extension"];
		$filename = $path["filename"];
		$destination = $dirname."/".$filename.".webp";
		return $destination;
	}
	private function getMimeType($filename)
	{
	    $mimetype = false;
	    if(function_exists('finfo_open')) {
	    } elseif(function_exists('getimagesize')) {
	    } elseif(function_exists('exif_imagetype')) {
	    } elseif(function_exists('mime_content_type')) {
	       $mimetype = mime_content_type($filename);
	    }
	    return $mimetype;
	}
	public function testCode(){
		set_time_limit(0);
		$this->CI->load->library('image_lib');
		$this->CI->db->where('post_type','product');
		$list_product = $this->CI->db->get('wp_posts')->result_array();
		$idRootFolder = $this->_getIdDirOrCreateThenReturnIdDir('old_tour',0,'uploads/');
		foreach ($list_product as $itemPro) {
			$idProductFolder = $this->_getIdDirOrCreateThenReturnIdDir(replaceURL($itemPro['post_title']),$idRootFolder,'uploads/old_tour/');
			$pathFolder = 'uploads/old_tour/'.replaceURL($itemPro['post_title']).'/';
			$this->CI->db->where('post_type','attachment');
			$this->CI->db->where('post_parent',$itemPro['ID']);
			$listImg = $this->CI->db->get('wp_posts')->result_array();
			if (count($listImg) > 0) {
				foreach ($listImg as $itemImg) {
					$url = $itemImg['guid'];
					if(@is_array(getimagesize($url))){
					   	$nameImg = basename($itemImg['guid']);
						$nameImg = str_replace('.jpg','',$nameImg);
						$nameImg = replaceURL($nameImg).'.jpg';
						$imgLink = 'uploads/old_tour/'.replaceURL($itemPro['post_title']).'/'.$nameImg;
						file_put_contents($imgLink, @file_get_contents($url));
						$this->insertImageMedia($pathFolder,$nameImg,$idProductFolder);
						$linkImgAfterConvert = $this->convertToWebp($imgLink);
						$sizes = $this->getSizes($imgLink);
						foreach ($sizes as $ks => $size) {
							$folder = $size["name"];
							$width = $size["width"];
							$height = $size["height"];
							$quality = $size["quality"];
							$retResize = $this->resizeImage($pathFolder,$nameImg,$width,$height,$quality,$folder);
							$this->convertToWebp($retResize);
						}
					}
				}
			}
		}
	}
}