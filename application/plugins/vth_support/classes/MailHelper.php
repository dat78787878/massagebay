<?php
namespace VthSupport\Classes;
class MailHelper{
	/*
	$emails =[
		"email@domain.com"=>"Name Email",
		"email2@domain.com"=>"Name Email 2",
	]
	*/
	public static function sendMail($emails,$title,$content,$username="",$password="",$mailname="",$email_ccs=[],$email_bccs=[],$secure='tls',$port=587,$host='smtp.gmail.com'){
	    $CI = &get_instance();
		if($username == ""){
			$username = $CI->Dindex->getSettings("MAIL_USER");
		}
		if($password == ""){
			$password = $CI->Dindex->getSettings("MAIL_PASS");
		}
		if($mailname == ""){
			$mailname = $CI->Dindex->getSettings("MAIL_NAME");
		}
	    $mail = new \PHPMailer\PHPMailer\PHPMailer;
	    $mail->CharSet = 'UTF-8';
	    $mail->SMTPDebug = 0;     
	    $mail->isSMTP();    
	    $mail->Host = $host; 
	    $mail->SMTPAuth = true;                              
	    $mail->Username = $username;                 
	    $mail->Password = $password;                        
	    $mail->SMTPSecure = $secure;                           
	    $mail->Port = $port;                                   
	    $mail->setFrom($username, $mailname);
	    foreach ($emails as $kemail => $vemail) {
	    	$mail->addAddress($kemail, $vemail);
	    }
	    $mail->isHTML(true);                                 
	    $mail->Subject = $title;
	    $mail->Body    = $content;
	    $mail->AltBody = strip_tags($content);
	    if(count($email_ccs)>0){
	    	foreach ($email_ccs as $k => $email_cc) {
	    		$mail->AddCC($email_cc);
	    	}
	    }
	    if(count($email_bccs)>0){
	        foreach ($email_bccs as $k => $email_bcc) {
	        	$mail->AddBCC($email_bcc);
	    	}
	    }
	    if(!$mail->send()) {
	        return false;
	    } else {
	        return true;
	    }
	}
}