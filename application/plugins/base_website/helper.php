<?php 

function getDataIntroduce()

{

	$CI = & get_instance();

	$listIntroduce = $CI->Dindex->getDataDetail([

        'table'=>'introduce_table',

    ]);

    $ret = [''];

    foreach ($listIntroduce as $item) {

    	$ret[$item['keyword']] = $item['vi_value'];

    }

    return $ret;

}

function getValueByKeyword($array,$key)

{

	return isset($array[$key])?$array[$key]:'';

}

function senMailSp($email,$tieude,$noidung,$email_cc=false,$email_bcc=false){

    tryCatchset();

    $CI = &get_instance();

    $mail = new \PHPMailer\PHPMailer\PHPMailer;

    $mail->CharSet = 'UTF-8';

    $mail->SMTPDebug = 0;     

    $mail->isSMTP();    

    $mail->Host = 'smtp.gmail.com'; 

    $mail->SMTPAuth = true;                              

    $mail->Username = $CI->Dindex->getSettings("MAIL_USER");                 

    $mail->Password = $CI->Dindex->getSettings("MAIL_PASS");                        

    $mail->SMTPSecure = 'tls';                           

    $mail->Port = 587;                                   

    $mail->setFrom($CI->Dindex->getSettings("MAIL_USER"), $CI->Dindex->getSettings("MAIL_NAME"));

    $mail->addAddress($email, $email);    

    $mail->isHTML(true);                                 

    $mail->Subject = $tieude;

    $mail->Body    = $noidung;

    $mail->AltBody = strip_tags($noidung);

    if($email_cc){

        $mail->AddCC($email_cc);

    }

    if($email_bcc){

        $mail->AddBCC($email_bcc);

    }

    if(!$mail->send()) {

        return false;

    } else {

        return true;

    }

}

function getTextRating($score){

    $score = (int)$score;

    if ($score >=0 && $score <2) {

        return 'Tệ';

    }

    if ($score >=2 && $score <4) {

        return 'Không hài lòng';

    }

    if ($score >=4 && $score <6) {

        return 'Hài lòng';

    }

    if ($score >=6 && $score <8) {

        return 'Tốt';

    }

    if ($score >=8 && $score <=10) {

        return 'Rất tốt';

    }

    return '';

}

function check(&$var){

    return (is_object($var) && count((array)$var) > 0) || (is_array($var) && count($var) > 0) || (is_string($var) && trim($var) != '' || (is_numeric($var) && $var > 0));

}

function _isMobile(){

    return preg_match("/(android|avantgo|blackberry|bolt|boost|cricket|docomo|fone|hiptop|mini|mobi|palm|phone|pie|tablet|up\.browser|up\.link|webos|wos)/i", $_SERVER["HTTP_USER_AGENT"]);

}

function setCoupon($coupon){

    $CI = &get_instance();

    $CI->session->set_userdata('coupon_used',$coupon);

}

function getCoupon(){

    $CI = &get_instance();

    if(isUsedCoupon()){

        return $CI->session->userdata('coupon_used');

    }

    return [];

}

function unsetCoupon(){

    $CI = &get_instance();

    $CI->session->unset_userdata('coupon_used');

}

function isUsedCoupon(){

    $CI = &get_instance();

    return $CI->session->has_userdata('coupon_used');

}

function getListRelatedHandbook($item){

    $CI = & get_instance();

    $where = [];

    array_push($where,['key'=>'act','compare'=>'=','value'=>1]);

    array_push($where,['key'=>'id','compare'=>'!=','value'=>$item['id']]);

    array_push($where,['key'=>'place_id','compare'=>'=','value'=>$item['place_id']]);

    $listHandBooks = $CI->Dindex->getDataDetail([

        'table'=>'handbooks',

        'where'=>$where,

        'limit'=>'0,6'

    ]);

    return $listHandBooks;

}
