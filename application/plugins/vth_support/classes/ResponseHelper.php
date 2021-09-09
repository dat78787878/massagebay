<?php
namespace VthSupport\Classes;
use VthSupport\Constants\ResponseConstants as ResponseCode;
use VthSupport\Classes\RequestHelper as Request;
class ResponseHelper{
	public static function jsonOrRedirect($code,$message,$url){
		if(Request::isAjax()){
			echoJSON($code, $message);
		}
		else{
			goRedirect($code==ResponseCode::SUCCESS?'success':'error',$message,$url);
		}
		die;
	}
	public static function json($code,$message,$more){
	    $current = new \stdClass;
	    $current->code = $code;
	    $current->message = $message;
	    $result = array_merge((array) $current, $more); 
	    echo json_encode($result);
	    die;
	}
}