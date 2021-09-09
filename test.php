<?php
use VthSupport\Classes\RequestHelper as Request;
use VthSupport\Classes\ResponseHelper as Response;
use TechLogin\Classes\Auth;
use VthSupport\Classes\UrlHelper as UH;
use VthSupport\Classes\LangHelper as LH;
use VthSupport\Classes\ViewHelper;
class PcbSupport extends IPlugin{
  protected $linkOrderProductPcb = 'order-product-pcb';
  protected $linkUpdateOrderProductPcb = 'update-order-product-pcb';
  protected $linkDeleteOrderProductPcb = 'delete-order-product-pcb';
  protected $linkOrderProductSmtStencil = 'order-product-smt-stencil';
  protected $linkUpdateOrderProductSmtStencil = 'update-order-product-smt-stencil';
  protected $linkDeleteOrderProductSmtStencil = 'delete-order-product-smt-stencil';
  protected $linkviewOrderProduct = 'view-order-product';
  protected $linkQuickQuote = 'bao-gia-nhanh';

  public function __construct(){
    parent::__construct();
    $this->CI = &get_instance();
  }
  public function install(){
    $this->addRoutes("Vindex/orderProductPcb",$this->linkOrderProductPcb);
    $this->addRoutes("Vindex/updateOrderProductPcb",$this->linkUpdateOrderProductPcb);
    $this->addRoutes("Vindex/deleteOrderProductPcb",$this->linkDeleteOrderProductPcb);
    $this->addRoutes("Vindex/orderProductSmtStencil",$this->linkOrderProductSmtStencil);
    $this->addRoutes("Vindex/updateOrderProductSmtStencil",$this->linkUpdateOrderProductSmtStencil);
    $this->addRoutes("Vindex/deleteOrderProductSmtStencil",$this->linkDeleteOrderProductSmtStencil);
    $this->addRoutes("Vindex/viewOrderDetail",$this->linkviewOrderProduct);
    $this->addRoutes("Vindex/quickQuotePcb",$this->linkQuickQuote);
  }
  public function uninstall(){
    $this->removeRoutes($this->linkOrderProductPcb);
    $this->removeRoutes($this->linkUpdateOrderProductPcb);
    $this->removeRoutes($this->linkDeleteOrderProductPcb);
    $this->removeRoutes($this->linkOrderProductSmtStencil);
    $this->removeRoutes($this->linkUpdateOrderProductSmtStencil);
    $this->removeRoutes($this->linkDeleteOrderProductSmtStencil);
    $this->removeRoutes($this->linkviewOrderProduct);
    $this->removeRoutes($this->linkQuickQuote);
  }
  public function initVindex(){
    $vindex = &get_instance();
    $page = $this;
    $vindex::macro("orderProductPcb", function($itemRoutes) use($page){
     $page->orderProductPcb($itemRoutes);
   });
    $vindex::macro("updateOrderProductPcb", function($itemRoutes) use($page){
     $page->updateOrderProductPcb($itemRoutes);
   });
    $vindex::macro("deleteOrderProductPcb", function($itemRoutes) use($page){
     $page->deleteOrderProductPcb($itemRoutes);
   });
    $vindex::macro("orderProductSmtStencil", function($itemRoutes) use($page){
     $page->orderProductSmtStencil($itemRoutes);
   });
    $vindex::macro("updateOrderProductSmtStencil", function($itemRoutes) use($page){
     $page->updateOrderProductSmtStencil($itemRoutes);
   });
    $vindex::macro("deleteOrderProductSmtStencil", function($itemRoutes) use($page){
     $page->deleteOrderProductSmtStencil($itemRoutes);
   });
    $vindex::macro("viewOrderDetail", function($itemRoutes) use($page){
     $page->viewOrderDetail($itemRoutes);
   });
    $vindex::macro("quickQuotePcb", function($itemRoutes) use($page){
     $page->quickQuotePcb($itemRoutes);
   });
  }

  public function viewOrderDetail($itemRoutes) {
    if (Request::isGet()) {
      $type_order = Request::getString('type_order','');
      $order_id = Request::getString('order_id','');

      if($type_order == 1) {
        $data['dataOrder'] = $this->CI->Dindex->getDataDetail(array(
          'table'=> 'orders_pcb',
          'where'=> array(
            array('key'=>'id','compare'=>'=','value'=>$order_id),
            array('key'=>'act','compare'=>'=','value'=>1),
          ),
          'limit'=>'0,1'
        ));
      }
      if($type_order == 2) {
        $data['dataOrder'] = $this->CI->Dindex->getDataDetail(array(
          'table'=> 'orders_smt_stencil',
          'where'=> array(
            array('key'=>'id','compare'=>'=','value'=>$order_id),
            array('key'=>'act','compare'=>'=','value'=>1),
          ),
          'limit'=>'0,1'
        ));
      }

      ViewHelper::make('auth.order_info_detail',$data);
    }
  }

  public function orderProductPcb($itemRoutes) {
    if (Request::isPost()) {
      if(Request::postString('type') == "baogia_home") {
       $width = Request::postString('width','');
       $height = Request::postString('height','');

       $this->CI->session->set_flashdata('width', $width);
       $this->CI->session->set_flashdata('height', $height);

       Response::jsonOrRedirect(false,'','dat-mach-pcb');    
     }
     if(!Auth::isLogin())
     {
      Response::jsonOrRedirect(100, LH::lang('ERROR_NO_LOGIN'), '');
    }
    $type = Request::postString('type');
    if($type=="baogia"){
     $this->sendBaogia();
   } 
 }
}
public function orderProductSmtStencil($itemRoutes) {
  if (Request::isPost()) {
    if(!Auth::isLogin())
    {
      Response::jsonOrRedirect(100, LH::lang('ERROR_NO_LOGIN','Báº¡n vui lÃ²ng Ä‘Äƒng nháº­p'), 'login');
    }
    $type = Request::postString('type');
    if($type=="order-smt-stencil"){
     $this->sendOrderSmtStencil();
   }
 }     
}
private function sendBaogia(){
  $user = Auth::getUser();
  $data_order['id_user'] =  $user['id'];
  $data_order['name_user'] =  $user['fullname'];
  $data_order['email_user'] =  $user['email'];
  $data_order['phone_user'] =  $user['phone'];
  $data_order['address_user'] =  $user['address'];
  $data_order['status_order'] = 1;
  $data_order['total_money'] = 0;
  $data_order['code_order'] = randomString($length = 10);
  $data_order['act'] = 1;
  $data_order['type_order'] = 1;
  $data_order['create_time'] = time(); 
  $data_order['update_time'] = time();
  $data_order['time_expect'] = time();

  $type = Request::postString('type');
  $post['is_pcb'] = Request::postString('is_pcb','');
  $post['id_pro'] = Request::postString('id_pro','');
  $post['name_pro'] = Request::postString('name_pro','');
  $post['type_pro'] = Request::postString('type_pro','');
  $post['design'] = Request::postString('design','');
  $post['type_board'] = Request::postString('type_board','');
  $post['width'] = Request::postString('width','');
  $post['height'] = Request::postString('height','');
  $post['amount'] = Request::postString('amount','');
  $post['layers'] = Request::postString('layers','');
  $post['material'] = Request::postString('material','');
  $post['thichness'] = Request::postString('thichness','');
  $post['min_tracks'] = Request::postString('min_tracks','');
  $post['min_hole_sizes'] = Request::postString('min_hole_sizes','');
  $post['colors'] = Request::postString('colors','');
  $post['silk_screens'] = Request::postString('silk_screens','');
  $post['surface_finishs'] = Request::postString('surface_finishs','');
  $post['finished_coppers'] = Request::postString('finished_coppers','');
  $post['gold_fingers'] = Request::postString('gold_fingers','');
  $post['vias'] = Request::postString('vias','');
  $post['impedance_control'] = Request::postString('impedance_control','');
  $post['halfhole'] = Request::postString('halfhole','');
  $post['note'] = Request::postString('note','');
  $post['transport'] = Request::postString('transport','');
  $post['price'] = Request::postString('price','');
  $post['create_transport'] = Request::postString('create_transport','');
  $post['id_order'] = $data_order['code_order'];


  if($post['name_pro'] == '') {
    $post['name_pro'] = "Máº¡ch PCB";
  }
  if($post['design'] == '') {
    Response::jsonOrRedirect(110,LH::lang('EMPTY_DESIGN','Báº¡n cáº§n chá»n máº«u thiáº¿t káº¿ báº£ng máº¡ch'),false);
  }
  if($post['type_board'] == '') {
    Response::jsonOrRedirect(110,LH::lang('EMPTY_TYPE_BOARD','Báº¡n cáº§n chá»n loáº¡i board'),false);
  }
  if($post['width'] == '') {
    Response::jsonOrRedirect(110,LH::lang('EMPTY_WIDTH','Báº¡n cáº§n nháº­p chiá»u dÃ i'),false);
  }
  if($post['height'] == '') {
    Response::jsonOrRedirect(110,LH::lang('EMPTY_HEIGHT','Báº¡n cáº§n nháº­p chiá»u rá»™ng'),false);
  }
  if($post['amount'] == '') {
    Response::jsonOrRedirect(110,LH::lang('EMPTY_HEIGHT','Báº¡n cáº§n nháº­p sá»‘ lÆ°á»£ng'),false);
  }
  if($post['layers'] == '') {
    Response::jsonOrRedirect(110,LH::lang('EMPTY_LAYERS','Báº¡n cáº§n chá»n sá»‘ lá»›p'),false);
  }
  if($post['material'] == '') {
    Response::jsonOrRedirect(110,LH::lang('EMPTY_MATERIAL','Báº¡n cáº§n chá»n váº­t liá»‡u'),false);
  }
  if($post['thichness'] == '') {
    Response::jsonOrRedirect(110,LH::lang('EMPTY_THICHNESS','Báº¡n cáº§n chá»n Ä‘á»™ dÃ y'),false);
  }
  if($post['min_tracks'] == '') {
    Response::jsonOrRedirect(110,LH::lang('EMPTY_MIN_TRACKS','Báº¡n cáº§n chá»n Ä‘á»™ rá»™ng Ä‘Æ°á»ng máº¡ch'),false);
  }
  if($post['min_hole_sizes'] == '') {
    Response::jsonOrRedirect(110,LH::lang('EMPTY_MIN_HOLE_SIZES','Báº¡n cáº§n chá»n kÃ­ch thÆ°á»›c lá»— khoan'),false);
  }
  if($post['colors'] == '') {
    Response::jsonOrRedirect(110,LH::lang('EMPTY_COLORS','Báº¡n cáº§n chá»n mÃ u sÆ¡n'),false);
  }
  if($post['silk_screens'] == '') {
    Response::jsonOrRedirect(110,LH::lang('EMPTY_SILK_SCREEN','Báº¡n cáº§n chá»n silk screen'),false);
  }
  if($post['surface_finishs'] == '') {
    Response::jsonOrRedirect(110,LH::lang('EMPTY_SURFACE_FINISHS','Báº¡n cáº§n chá»n xá»­ lÃ½ bá» máº·t'),false);
  }
  if($post['gold_fingers'] == '') {
    Response::jsonOrRedirect(110,LH::lang('EMPTY_GOLD_FINGERS','Báº¡n cáº§n chá»n vÃ¡t gold fingers'),false);
  }
  if($post['vias'] == '') {
    Response::jsonOrRedirect(110,LH::lang('EMPTY_VIAS','Báº¡n cáº§n chá»n kiá»ƒu vias'),false);
  }
  if($post['impedance_control'] == '') {
    Response::jsonOrRedirect(110,LH::lang('EMPTY_IMPEDANCE_CONTROL','Báº¡n cáº§n chá»n cÃ³/khÃ´ng kiá»ƒm soÃ¡t trá»Ÿ khÃ¡ng'),false);
  }
  if($post['halfhole'] == '') {
    Response::jsonOrRedirect(110,LH::lang('EMPTY_HALFHOLE','Báº¡n cáº§n chá»n cÃ³/khÃ´ng máº¡ ná»­a lá»—'),false);
  }
  if($post['transport'] == '') {
    Response::jsonOrRedirect(110,LH::lang('EMPTY_TRANSPORT','Báº¡n cáº§n chá»n Ä‘Æ¡n vá»‹ váº­n chuyá»ƒn'),false);
  }


  $uploadHelper = new \VthSupport\Classes\UploadHelper();
  $uploadHelper->setAllowedTypes('zip');
  $uploadHelper->setMaxSize(2000000000);
  $uploadHelper->setPath('uploads/file-design/');
  $file_design = $uploadHelper->uploadFiles('file_design');

  $data_order['note_customer'] =  $post['note'];
  $lastOrderId = $this->CI->Dindex->insertData1($data_order,'orders_pcb');
  $post['id_order'] = 0;
  if ($lastOrderId) {
    $post['id_order'] = $lastOrderId;
    $post['file'] = json_encode($file_design, true);
    $result = $this->CI->Dindex->insertData1($post,'orders_detail_pcb');

    if($result) {
      $this->controlSenMail($data_order, $post, $type);
    }
  }
}
private function sendOrderSmtStencil(){
  $user = Auth::getUser();
  $data_order['id_user'] =  $user['id'];
  $data_order['name_user'] =  $user['fullname'];
  $data_order['email_user'] =  $user['email'];
  $data_order['phone_user'] =  $user['phone'];
  $data_order['address_user'] =  $user['address'];
  $data_order['status_order'] = 1;
  $data_order['total_money'] = 0;
  $data_order['code_order'] = randomString($length = 10);
  $data_order['act'] = 1;
  $data_order['type_order'] = 2;
  $data_order['create_time'] = time();
  $data_order['update_time'] = time();
  $data_order['time_expect'] = time();

  $type = Request::postString('type');
  $post['is_pcb'] = Request::postString('is_pcb','');
  $post['name_pro'] = Request::postString('name_pro','');
  $post['time_make'] = Request::postString('time_make','');
  $post['type_stelcil'] = Request::postString('type_stelcil','');
  $post['elec_surface'] = Request::postString('elec_surface','');
  $post['face_stencill'] = Request::postString('face_stencill','');
  $post['amount'] = Request::postString('amount','');
  $post['stelcil_thichnes'] = Request::postString('stelcil_thichnes',''); 
  $post['position_hole'] = Request::postString('position_hole','');
  $post['size_stencil'] = Request::postString('size_stencil','');
  $post['note_stelcil'] = Request::postString('note_stelcil','');
  $post['file_design'] = Request::postString('file_design','');
  $post['transport'] = Request::postString('transport','');

  if(empty($post['name_pro'])) {
   $post['name_pro'] = "Máº¡ch SMT Stencil";
 }
 if(empty($post['type_stelcil'])) {
  Response::jsonOrRedirect(110,LH::lang('EMPTY_TYPE_STENCIL','Báº¡n cáº§n chá»n loáº¡i stencil'),false);
}
if(empty($post['elec_surface'])) {
  Response::jsonOrRedirect(110,LH::lang('EMPTY_ELEC_SURFACE','Báº¡n cáº§n chá»n cÃ³ / khÃ´ng LÃ m nháºµn bá» máº·t báº±ng tÄ©nh Ä‘iá»‡n'),false);
}
if(empty($post['face_stencill'])) {
  Response::jsonOrRedirect(110,LH::lang('EMPTY_FACE_STENCILL','Báº¡n cáº§n chá»n máº·t stencill'),false);
}
if(empty($post['amount'])) {
  Response::jsonOrRedirect(110,LH::lang('EMPTY_AMOUNT_STENCILL','Báº¡n cáº§n nháº­p sá»‘ lÆ°á»£ng'),false);
}
if(empty($post['size_stencil'])) {
  Response::jsonOrRedirect(110,LH::lang('EMPTY_SIZE_STENCIL','Báº¡n cáº§n chá»n kÃ­ch thÆ°á»›c'),false);
}
if(empty($post['stelcil_thichnes'])) {
  Response::jsonOrRedirect(110,LH::lang('EMPTY_STELCIL_THICHNES','Báº¡n cáº§n chá»n Ä‘á»™ dÃ y'),false);
}
if(empty($post['position_hole'])) {
  Response::jsonOrRedirect(110,LH::lang('EMPTY_POSITION_HOLE','Báº¡n cáº§n chá»n lá»— Ä‘á»‹nh vá»‹'),false);
}
if(empty($post['transport'])) {
  Response::jsonOrRedirect(110,LH::lang('EMPTY_TRANSPORTS','Báº¡n cáº§n chá»n Ä‘Æ¡n vá»‹ váº­n chuyá»ƒn'),false);
}

$uploadHelper = new \VthSupport\Classes\UploadHelper();
$uploadHelper->setAllowedTypes('zip');
$uploadHelper->setMaxSize(2000000000);
$uploadHelper->setPath('uploads/file-design-smt/');
$file_design_smt = $uploadHelper->uploadFiles('file_design_smt');

$data_order['note_customer'] = $post['note_stelcil'];
$lastOrderId = $this->CI->Dindex->insertData1($data_order,'orders_smt_stencil');

if ($lastOrderId) {
  $post['id_order'] = $lastOrderId;
  $post['file_design'] = json_encode($file_design_smt, true);
  $result = $this->CI->Dindex->insertData1($post,'orders_smt_stencil_detail');

  if($result) {
    $this->controlSenMail($data_order, $post, $type);
  }
}

}

public function updateOrderProductPcb() {
  if(Request::isPost()) {
    $order_id = Request::postString('order_id','');
    $order_id_detail = Request::postString('order_id_detail','');

    $dataUpdateOrder['name_user'] = Request::postString('name_user','');
    $dataUpdateOrder['phone_user'] = Request::postString('phone_user','');
    $dataUpdateOrder['email_user'] = Request::postString('email_user','');
    $dataUpdateOrder['address_user'] = Request::postString('address_user','');
    $dataUpdateOrder['status_order'] = Request::postString('status','');
    $dataUpdateOrder['feedback'] = Request::postString('feedback','');
    $dataUpdateOrder['update_time'] = time();
    $dataUpdateOrder['time_make'] = Request::postString('time_make','');    
    $dataUpdateOrder['time_expect'] = Request::postString('time_expect','');
    $dataUpdateOrder['total_money'] = Request::postString('total_money','');
    if(empty($dataUpdateOrder['total_money'])) {
      $dataUpdateOrder['total_money'] = '0';
    }
    $post['is_pcb'] = 1;
    $post['id_order'] = $order_id;
    $post['order_id_detail'] = $order_id_detail;
    $post['name_pro'] = Request::postString('name_pro','');
    $post['code_order'] = Request::postString('code_order','');
    $post['type_design'] = Request::postString('type_design','');
    $post['type_board'] = Request::postString('type_board','');
    $post['size'] = Request::postString('size','');
    $post['feedback'] = Request::postString('feedback','');
    $post['size_height'] = Request::postString('size_height','');
    $post['size_width'] = Request::postString('size_width','');
    $post['amount'] = Request::postString('amount','');
    $post['layers'] = Request::postString('layers','');
    $post['material'] = Request::postString('material','');
    $post['thichnes'] = Request::postString('thichnes','');
    $post['min_tracks'] = Request::postString('min_tracks','');
    $post['min_hole_size'] = Request::postString('min_hole_size','');
    $post['colors'] = Request::postString('colors','');
    $post['silk_screens'] = Request::postString('silk_screens','');
    $post['surface_finishs'] = Request::postString('surface_finishs','');
    $post['finished_coppers'] = Request::postString('finished_coppers','');
    $post['gold_finger'] = Request::postString('gold_finger','');
    $post['impedance_control'] = Request::postString('impedance_control','');
    $post['halfhole'] = Request::postString('halfhole','');
    $post['update_time'] = Request::postString('update_time','');
    $post['transport'] = Request::postString('transport','');
    $post['total_price'] = Request::postString('total_price','');

    $resultUpdateOrder = $this->CI->Dindex->updateDataFull('orders_pcb', $dataUpdateOrder, array('id'=>$order_id));
    if($resultUpdateOrder) {
      $type = "baogia";
      $this->controlSenMail($dataUpdateOrder, $post, $type);
      Response::jsonOrRedirect(200,LH::lang('SUCCESS_UPDATE_ORDER','Cáº­p nháº­t Ä‘Æ¡n hÃ ng thÃ nh cÃ´ng'),false);
    }
  }
}

public function updateOrderProductSmtStencil() {
  if(Request::isPost()) {
    $order_id = Request::postString('order_id','');
    $order_id_detail = Request::postString('order_id_detail','');


    $dataUpdateOrder['name_user'] = Request::postString('name_user','');
    $dataUpdateOrder['phone_user'] = Request::postString('phone_user','');
    $dataUpdateOrder['email_user'] = Request::postString('email_user','');
    $dataUpdateOrder['address_user'] = Request::postString('address_user','');
    $dataUpdateOrder['status_order'] = Request::postString('status','');
    $dataUpdateOrder['feedback'] = Request::postString('feedback','');
    $dataUpdateOrder['update_time'] = time();
    $dataUpdateOrder['time_make'] = Request::postString('time_make','');    
    $dataUpdateOrder['time_expect'] = Request::postString('time_expect','');
    $dataUpdateOrder['time_make'] = Request::postString('time_make','');
    $dataUpdateOrder['total_money'] = Request::postString('total_money','');

    if(empty($dataUpdateOrder['total_money'])) {
      $dataUpdateOrder['total_money'] = '0';
    }

    $post['is_pcb'] = 0;
    $post['id_order'] = $order_id;
    $post['status_order'] = 5;
    $post['order_id_detail'] = $order_id_detail;
    $post['name_user'] =   Request::postString('name_user','');
    $post['phone_user'] =   Request::postString('phone_user','');
    $post['email_user'] =   Request::postString('email_user','');
    $post['address'] =   Request::postString('address','');
    $post['transport'] =   Request::postString('transport','');
    $post['code_order'] =   Request::postString('code_order','');
    $post['file_design'] =   Request::postString('file_design','');
    $post['time_make'] =   Request::postString('time_make','');
    $post['type_stelcil'] =   Request::postString('type_stelcil','');
    $post['feedback'] =   Request::postString('feedback','');
    $post['size_stencil'] =   Request::postString('size_stencil','');

    $post['amount'] =   Request::postString('amount','');
    $post['stelcil_thichnes'] =   Request::postString('stelcil_thichnes','');
    $post['elec_surfaces'] =   Request::postString('elec_surfaces','');

    $post['face_stencill'] =   Request::postString('face_stencill','');
    $post['position_hole'] =   Request::postString('position_hole','');
    $post['create_time'] =   Request::postString('create_time','');
    $post['update_time'] =   Request::postString('update_time','');
    $post['time_expect'] =   Request::postString('time_expect','');
    $post['total_money'] =   Request::postString('total_money','');

    $resultUpdateOrder = $this->CI->Dindex->updateDataFull('orders_smt_stencil', $dataUpdateOrder, array('id'=>$order_id));
    if($resultUpdateOrder) {
      $type = "order-smt-stencil";
      $this->controlSenMail($dataUpdateOrder, $post, $type);
      Response::jsonOrRedirect(200,LH::lang('SUCCESS_UPDATE_ORDER','Cáº­p nháº­t Ä‘Æ¡n hÃ ng thÃ nh cÃ´ng'),false);
    }
  }
}

public function deleteOrderProductPcb() {
  if(Request::isPost()) {
    $order_id = Request::postString('order_id','');
    $order_id_detail = Request::postString('order_id_detail','');

    $resultDeleteOrder = $this->CI->Dindex->deleteData('orders_pcb', array('id'=>$order_id));
    if($resultDeleteOrder) {
      $resultDeleteOrderDetail = $this->CI->Dindex->deleteData('orders_detail_pcb', array('id'=>$order_id_detail));
      if ($resultDeleteOrderDetail) {
        Response::jsonOrRedirect(200,LH::lang('SUCCESS_UPDATE_ORDER','XÃ³a Ä‘Æ¡n hÃ ng thÃ nh cÃ´ng'),false);
      }
    }
  }
}

public function deleteOrderProductSmtStencil() {
  if(Request::isPost()) {
    $order_id = Request::postString('order_id','');
    $order_id_detail = Request::postString('order_id_detail','');

    $resultDeleteOrder = $this->CI->Dindex->deleteData('orders_smt_stencil', array('id'=>$order_id));
    if($resultDeleteOrder) {
      $resultDeleteOrderDetail = $this->CI->Dindex->deleteData('orders_smt_stencil_detail', array('id'=>$order_id_detail));
      if ($resultDeleteOrderDetail) {
        Response::jsonOrRedirect(200,LH::lang('SUCCESS_UPDATE_ORDER','XÃ³a Ä‘Æ¡n hÃ ng thÃ nh cÃ´ng'),false);
      }
    }
  }
}

private function controlSenMail($data_order, $post, $type) {
  $customer = [];
  $customer['title'] = LH::lang('CUSTOMER_INFO','ThÃ´ng tin khÃ¡ch hÃ ng');
  $customer['header'] = [
    'name'  =>LH::lang('CUSTOMER_NAME','KhÃ¡ch hÃ ng'),
    'email' =>LH::lang('CUSTOMER_EMAIL','Email'),
    'phone' =>LH::lang('CUSTOMER_PHONE','Sá»‘ Ä‘iá»‡n thoáº¡i'),
    'address' =>LH::lang('CUSTOMER_ADDRESS','Äá»‹a chá»‰'),
    'note'  =>LH::lang('CUSTOMER_PAYMETHOD','Ghi chÃº')
  ];
  $customer['data']['name'] = isset($data_order['name_user'])?$data_order['name_user']:"";
  $customer['data']['email'] = isset($data_order['email_user'])?$data_order['email_user']:"";
  $customer['data']['phone'] = isset($data_order['phone_user'])?$data_order['phone_user']:"";
  $customer['data']['address'] = isset($data_order['address_user'])?$data_order['address_user']:"";
  $customer['data']['note_customer'] = isset($post['note_customer'])?$post['note_customer']:"";
  $status_order = isset($data_order['status_order'])?$data_order['status_order']:1;

  $productInfos = [];
  $productInfos['header'] = [
    'name'=>LH::lang('PRODUCT_NAME','TÃªn'),
  ];
  if($post['is_pcb'] == 1)
  {

    $productInfos['name'] = isset($post['name_pro'])?$post['name_pro']:"";
    $productInfos['code_order'] = isset($post['code_order'])?$post['code_order']:"";
    $productInfos['feedback'] = isset($post['feedback'])?$post['feedback']:"";
    $productInfos['type_design'] = isset($post['type_design'])?$post['type_design']:"";
    $productInfos['type_board'] = isset($post['type_board'])?$post['type_board']:"";
    $productInfos['size'] = isset($post['size'])?$post['size']:"";
    $productInfos['size_width'] = isset($post['size_width'])?$post['size_width']:"";
    $productInfos['size_height'] = isset($post['size_height'])?$post['size_height']:"";
    $productInfos['amount'] = isset($post['amount'])?$post['amount']:"";
    $productInfos['layers'] = isset($post['layers'])?$post['layers']:"";
    $productInfos['material'] = isset($post['material'])?$post['material']:"";
    $productInfos['thichnes'] = isset($post['thichnes'])?$post['thichnes']:"";
    $productInfos['min_tracks'] = isset($post['min_tracks'])?$post['min_tracks']:"";
    $productInfos['min_hole_size'] = isset($post['min_hole_size'])?$post['min_hole_size']:"";
    $productInfos['colors'] = isset($post['colors'])?$post['colors']:"";
    $productInfos['silk_screens'] = isset($post['silk_screens'])?$post['silk_screens']:"";
    $productInfos['surface_finishs'] = isset($post['surface_finishs'])?$post['surface_finishs']:"";
    $productInfos['finished_coppers'] = isset($post['finished_coppers'])?$post['finished_coppers']:"";
    $productInfos['gold_finger'] = isset($post['gold_finger'])?$post['gold_finger']:"";
    $productInfos['impedance_control'] = isset($post['impedance_control'])?$post['impedance_control']:"";
    $productInfos['halfhole'] = isset($post['halfhole'])?$post['halfhole']:"";
    $productInfos['transport'] = isset($post['transport'])?$post['transport']:"";
    $productInfos['update_time'] = isset($post['update_time'])?$post['update_time']:"";
    $productInfos['total_price'] = isset($post['total_price'])?$post['total_price']:"";
  }
  else
  {

    $productInfos['id_order'] = isset($post['id_order'])?$post['id_order']:"";
    $productInfos['status_order'] = 5;
    $productInfos['order_id_detail'] = isset($post['id_order'])?$post['id_order']:"";
    $productInfos['name_user'] =   isset($post['name_user'])?$post['name_user']:"";
    $productInfos['phone_user'] =   isset($post['phone_user'])?$post['phone_user']:"";
    $productInfos['email_user'] =   isset($post['email_user'])?$post['email_user']:"";
    $productInfos['address'] =   isset($post['address'])?$post['address']:"";
    $productInfos['transport'] =   isset($post['transport'])?$post['transport']:"";
    $productInfos['code_order'] =   isset($post['code_order'])?$post['code_order']:"";
    $productInfos['name'] =   isset($post['name'])?$post['name']:"ChÆ°a xÃ¡c Ä‘á»‹nh";
    $productInfos['file_design'] =   isset($post['file_design'])?$post['file_design']:"";
    $productInfos['type_stelcil'] =   isset($post['type_stelcil'])?$post['type_stelcil']:"";
    $productInfos['time_make'] =   isset($post['time_make'])?$post['time_make']:"";
    $productInfos['feedback'] =   isset($post['feedback'])?$post['feedback']:"";
    $productInfos['size_stencil'] =   isset($post['size_stencil'])?$post['size_stencil']:"";

    $productInfos['amount'] =   isset($post['amount'])?$post['amount']:"";
    $productInfos['stelcil_thichnes'] =   isset($post['stelcil_thichnes'])?$post['stelcil_thichnes']:"";
    $productInfos['elec_surfaces'] =   isset($post['elec_surfaces'])?$post['elec_surfaces']:"";

    $productInfos['face_stencill'] =   isset($post['face_stencill'])?$post['face_stencill']:"";
    $productInfos['position_hole'] =   isset($post['position_hole'])?$post['position_hole']:"";
    $productInfos['create_time'] =   isset($post['create_time'])?$post['create_time']:"";
    $productInfos['update_time'] =   isset($post['update_time'])?$post['update_time']:"";
    $productInfos['time_expect'] =   isset($post['time_expect'])?$post['time_expect']:"";
    $productInfos['total_money'] =   isset($post['total_money'])?$post['total_money']:"";

  }
  $orderInfor = [];
  $orderInfor['order_id'] = $post['id_order'];

  $emailAdmin = $this->CI->Dindex->getSettings('MAIL_NHAN');
  $emailCustomer = isset($data_order['email_user'])?$data_order['email_user']:"";
  $emails = [$emailAdmin=>$emailAdmin, $emailCustomer=>$emailCustomer];

  $title = "ThÃ´ng tin Ä‘áº·t hÃ ng website";
  
  if($status_order == 1) 
  {
            //Email gá»­i vá» quáº£n trá»‹
    $content1 = "<b>KhÃ¡ch hÃ ng gá»­i thÃ´ng tin Ä‘Æ¡n hÃ ng.</b><br>";
    $content1 .= 'Há» tÃªn: <b>'.$customer['data']['name'].'</b><br>';
    $content1 .= 'Sá»‘ Ä‘iá»‡n thoáº¡i: <b>'.$customer['data']['phone'].'</b><br>';
    $content1 .= 'Email: <b>'.$customer['data']['email'].'</b><br>';
    $content1 .= 'Ná»™i dung: <b>'.$customer['data']['note_customer'].'</b><br><br>';
    $content1 .= '<b>ThÃ´ng tin Ä‘Æ¡n hÃ ng</b>';
    $content1 .= 'TÃªn sáº£n pháº©m: <b>'.$productInfos['name'].'</b><br>';
    $content1 .= 'MÃ£ sáº£n pháº©m: <b>'.$post['id_order'].'</b><br>';
    $content1 .= 'NgÃ y gá»­i: <b>'.date('d/m/Y', time()).'</b><br>';
    $emailAd = [$emailAdmin=>$emailAdmin];
    $resultSenMail = \VthSupport\Classes\MailHelper::sendMail($emailAd,$title,$content1);

            //Email gá»­i vá» khÃ¡ch hÃ ng
    $content2 = "<b>ThÃ´ng tin Ä‘Æ¡n hÃ ng cá»§a khÃ¡ch hÃ ng.</b><br>";
    $content2 .= 'Há» tÃªn: <b>'.$customer['data']['name'].'</b><br>';
    $content2 .= 'Sá»‘ Ä‘iá»‡n thoáº¡i: <b>'.$customer['data']['phone'].'</b><br>';
    $content2 .= 'Email: <b>'.$customer['data']['email'].'</b><br>';
    $content2 .= 'Ná»™i dung: Cáº£m Æ¡n quÃ½ khÃ¡ch hÃ ng Ä‘Ã£ Ä‘áº·t mua sáº£n pháº©m, chÃºng tÃ´i sáº½ gá»­i láº¡i thÃ´ng tin bÃ¡o giÃ¡ Ä‘Æ¡n hÃ ng cho quÃ½ khÃ¡ch trong thá»i gian sá»›m nháº¥t. QuÃ½ khÃ¡ch cÃ³ thá»ƒ Ä‘Äƒng nháº­p website Ä‘á»ƒ xem láº¡i thÃ´ng tin Ä‘Æ¡n hÃ ng cá»§a minh'.'<br><br>';
    $content2 .= '<b>ThÃ´ng tin Ä‘Æ¡n hÃ ng cá»§a quÃ½ khÃ¡ch.</b><br><br>';
    $content2 .= 'TÃªn sáº£n pháº©m: <b>'.$productInfos['name'].'</b><br>';
    $content2 .= 'MÃ£ sáº£n pháº©m: <b>'.$post['id_order'].'</b><br>';
    $content2 .= 'NgÃ y gá»­i: <b>'.date('d/m/Y', time()).'</b><br>';
    $emailCus = [$emailCustomer=>$emailCustomer];
    $resultSenMail = \VthSupport\Classes\MailHelper::sendMail($emailCus,$title,$content2);
    if($resultSenMail) {
      Response::jsonOrRedirect(200,LH::lang('ORDER_SUCCESS','Gá»­i Ä‘Æ¡n hÃ ng thÃ nh cÃ´ng'), UH::exactLink(''));
    }
  }
  if($status_order == 5) 
  {
    $content = $this->getFullEmailContent($customer,$productInfos,$orderInfor, $type);
    $emailCus2 = [$emailCustomer=>$emailCustomer];
    $title = $this->CI->Dindex->getSettings('SITE_NAME').": ThÃ´ng tin báº£ng giÃ¡ sáº£n pháº©m cá»§a khÃ¡ch hÃ ng khÃ¡ch hÃ ng.";
    $resultSenMail = \VthSupport\Classes\MailHelper::sendMail($emailCus2,$title,$content);
    if($resultSenMail) {
      Response::jsonOrRedirect(200,LH::lang('ORDER_SUCCESS','XÃ¡c nháº­n gá»­i bÃ¡o giÃ¡ thÃ nh cÃ´ng'), UH::exactLink(''));
    }
  }
}
private function getFullEmailContent($customer,$productInfos,$orderInfor,$type){
  $logo = json_decode($this->CI->Dindex->getSettings('LOGO'), true);
  $logo = $logo ? $logo:[];
  if (!empty($logo)) {
   $logo = UH::exactLink('').$logo['path'].$logo['file_name'];
 }
 $data['logo'] = $logo;
 $data['name'] = $customer['data']['name'];
 $data['phone'] = $customer['data']['phone'];
 $data['email'] = $customer['data']['email'];
 $data['address'] = $customer['data']['address'];
 $data['address'] = $customer['data']['address'];

        // $productInfos['name'] = isset($post['name_pro'])?$post['name_pro']:"";
        // $productInfos['code_order'] = isset($post['code_order'])?$post['code_order']:"";
        // $productInfos['type_design'] = isset($post['type_design'])?$post['type_design']:"";
        // $productInfos['type_board'] = isset($post['type_board'])?$post['type_board']:"";
        // $productInfos['size'] = isset($post['size'])?$post['size']:"";
        // $productInfos['amount'] = isset($post['amount'])?$post['amount']:"";
        // $productInfos['layers'] = isset($post['layers'])?$post['layers']:"";
        // $productInfos['material'] = isset($post['material'])?$post['material']:"";
        // $productInfos['thichnes'] = isset($post['thichnes'])?$post['thichnes']:"";
        // $productInfos['min_tracks'] = isset($post['min_tracks'])?$post['min_tracks']:"";
        // $productInfos['min_hole_size'] = isset($post['min_hole_size'])?$post['min_hole_size']:"";
        // $productInfos['colors'] = isset($post['colors'])?$post['colors']:"";
        // $productInfos['silk_screens'] = isset($post['silk_screens'])?$post['silk_screens']:"";
        // $productInfos['surface_finishs'] = isset($post['surface_finishs'])?$post['surface_finishs']:"";
        // $productInfos['finished_coppers'] = isset($post['finished_coppers'])?$post['finished_coppers']:"";
        // $productInfos['gold_finger'] = isset($post['gold_finger'])?$post['gold_finger']:"";
        // $productInfos['impedance_control'] = isset($post['impedance_control'])?$post['impedance_control']:"";
        // $productInfos['halfhole'] = isset($post['halfhole'])?$post['halfhole']:"";

 $data['productInfos'] = $productInfos;

 $data['orderInfor'] = $orderInfor;
 $data['address_header_mail'] = $this->CI->Dindex->getSettings('ADDRESS_HEADER_MAIL');
 if($type == "baogia") 
 {
  if($this->CI->blade->view()->exists('pcb_support::template_mail')) {
    return  $this->CI->blade->view()->make('pcb_support::template_mail', $data)->render();
  }
  else{
    return $this->CI->blade->view()->make('pcb_support.template_mail', $data)->render();
  }
}
if($type == "order-smt-stencil")
{
  if($this->CI->blade->view()->exists('pcb_support::template_mail_smt')) {
    return $this->CI->blade->view()->make('pcb_support::template_mail_smt', $data)->render();
  }
  else{
    return $this->CI->blade->view()->make('pcb_support.template_mail_smt', $data)->render();
  }
}
return;
}

public function quickQuotePcb($itemRoutes) {
  if(Request::isGet()) {
    $congThuc = $this->CI->Dindex->getSettings("CONGTHUC_PCB");

    $length = (int) Request::getString('length',0);
    $height = (int) Request::getString('height',0);
    $layer = (int) Request::getString('layer',0);
    $amount = (int) Request::getString('amount',0);
    $thichness = (int) Request::getString('thichness',0);
    $baogia = [];

    preg_match('/#BEGIN_TH1(.+)#END_TH1/s', $congThuc, $matches);
    if(!@$matches[1]){
      echo 'Cáº¥u hÃ¬nh cÃ´ng thá»©c á»Ÿ TH1 Ä‘ang bá»‹ sai';
      return;
    }
    $giaTh1 = (int)$matches[1];
    if($layer != 2 && $layer != 1){
      $baogia['string'] = 'Chá»‰ Ã¡p dá»¥ng bÃ¡o giÃ¡ nhanh vá»›i máº¡ch 1 - 2 lá»›p.';
    }
    else {
      if ($length <= 100 && $height <= 100 && $amount <= 10) {
        $baogia['number'] = $giaTh1;
      } else {
        preg_match('/#BEGIN_CONG_THUC(.+)#END_CONG_THUC/s', $congThuc, $matches);
        if(!@$matches[1]){
          echo 'Cáº¥u hÃ¬nh cÃ´ng thá»©c á»Ÿ CONG_THUC Ä‘ang bá»‹ sai';
          return;
        }
        eval(trim('$a = '.$matches[1]).';');
        if ($a < 1) {
          preg_match('/#BEGIN_TH2(.+)#END_TH2/s', $congThuc, $matches);
          if(!@$matches[1]){
            echo 'Cáº¥u hÃ¬nh cÃ´ng thá»©c á»Ÿ TH2 Ä‘ang bá»‹ sai';
            return;
          }
          eval('$gia = '.$matches[1].';');
          $baogia['number'] = $gia;
        } elseif ($a < 5 && $a >= 1) {
          if ($layer == 2) {
            preg_match('/#BEGIN_TH3_1(.+)#END_TH3_1/s', $congThuc, $matches);
            if(!@$matches[1]){
              echo 'Cáº¥u hÃ¬nh cÃ´ng thá»©c á»Ÿ TH3_1 Ä‘ang bá»‹ sai';
              return;
            }
            eval('$gia = '.$matches[1].';');
            $baogia['number'] = $gia;
          } elseif ($layer == 1) {
            preg_match('/#BEGIN_TH3_2(.+)#END_TH3_2/s', $congThuc, $matches);
            if(!@$matches[1]){
              echo 'Cáº¥u hÃ¬nh cÃ´ng thá»©c TH3_2 Ä‘ang bá»‹ sai';
              return;
            }
            eval('$gia = '.$matches[1].';');
            $baogia['number'] = $gia;
          }    
        } elseif ($a >= 5) {
          preg_match('/#BEGIN_TH4(.+)#END_TH4/s', $congThuc, $matches);
          if(!@$matches[1]){
            echo 'Cáº¥u hÃ¬nh cÃ´ng thá»©c á»Ÿ TH_4 Ä‘ang bá»‹ sai';
            return;
          }
          $baogia['string'] = $matches[1];
        }
      }
    }
    if(array_key_exists('number', $baogia)){
      echo number_format($baogia['number'], 0, ',', '.').' vnÄ‘';
    }
    elseif(array_key_exists('string', $baogia)){
      echo $baogia['string'];
    }
  }
}

}