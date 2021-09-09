<?php
function tryCatchset(){}
function echoJSON($code,$message){
    $obj = new stdClass();
    $obj->code= $code;
    $obj->message= $message;
    echo json_encode($obj);
}
function echoJSONdata($code,$message,$data){
    $obj = new stdClass();
    $obj->code= $code;
    $obj->message= $message;
    $obj->data= $data;
    echo json_encode($obj);
}

function echom($arr,$key,$check=1){
    echo echor($arr,$key,$check);
}
function imgSingle($json,$folder,$checkWebp=false){
    $webp = false;
    if($checkWebp && function_exists("__checkBrowserWebp")){
        $webp = __checkBrowserWebp();
    }
    $result = base_url("theme/admin/images/no-image.svg");
    if(!array_key_exists("path", $json)){
        $result =  base_url("theme/admin/images/no-image.svg");
        return $result;
    }
    if($folder=="-1"||$folder==""){
        $file = $json["path"].$json["file_name"];
        $file = changeImgWebpExt($file,$webp);
        
        if(!file_exists($file)){
            $result =  base_url("theme/admin/images/no-image.svg");
        }
        else{
            $result =  base_url($file);
        }
    }
    else{
        $folder = "thumbs/".$folder."/";
        $def = $json["path"].$json["file_name"];
        $def = changeImgWebpExt($def,$webp);
        $ret = $json["path"].$folder.$json["file_name"];
        $ret = changeImgWebpExt($ret,$webp);
        if(file_exists($ret)){
            $result =  base_url($ret);
        }
        else{
            if(file_exists($def)){
                $result =  base_url($def);
            }
            else{
                $result =  base_url("theme/admin/images/no-image.svg");
            }
        }
    }
    return $result;
}
//Mảng, img/logo/banner
function imgv2($arr,$key,$folder="",$webp = false){
    $returnNow = false;
    $result = "";
    $ci = & get_instance();
    $resultHook = $ci->hooks->call_hook(['tech5s_before_imgv2',"arr"=>$arr,"key"=>$key,"folder"=>$folder,"webp"=>$webp,"returnNow"=>$returnNow,"result"=>$result]);
    if(!is_bool($resultHook) && is_array($resultHook)){
        extract($resultHook);
    }
    if($returnNow){
        return $result;
    }


    $isPicture = false;
    if(strpos($key, "#W#") ===0 ||strpos($key, "#w#") ===0 ){
        $isPicture = true;
        $key = substr($key, 3);
    }
    if(!$isPicture){
        $json = array_key_exists($key, $arr)?$arr[$key]:"";
        $json = json_decode($json,true);
        $json = @$json?$json:array();
        $result = imgSingle($json,$folder,$webp);
    }
    else{
        if(function_exists("webpImg")){
            $result =  webpImg($arr,$key,false,$folder);
        }
    }
    return $result;
}
function changeImgWebpExt($file,$webp){
    if(!$webp) return $file;
    $path = pathinfo($file);
    $dirname = $path["dirname"];
    $extension = $path["extension"];
    $filename = $path["filename"];
    $tmpfile = $dirname."/".$filename.".webp";
    if(file_exists($tmpfile)){
        return $tmpfile;
    }
    return $file;
}
function _ee($arr,$key,$check=1){
    $CI = & get_instance();
    $default_language = $CI->config->item( 'default_language' );
    $lang = @$CI->session->userdata('lang')?$CI->session->userdata('lang'):$default_language;
    if(strpos($key, "#i")==0){
        //#i#img#id
        $tmp = explode("#", $key);
        if(count($tmp)<3) return "";
        if(is_numeric($tmp[2])){
            if($tmp[2]==0){
                $val = $arr;
            }
            else $val =$arr[$tmp[2]];
        }
        else if(is_string($tmp[2])){
            if(!array_key_exists($tmp[2],$arr))
                return "";
            $val = $arr[$tmp[2]];
            $val = json_decode($val,true);
        }
        if( is_array($val) && array_key_exists($tmp[3], $val)){
            $x = $val[$tmp[3]];
            if($tmp[3]=="alt"||$tmp[3]=="title"){
                if(strlen(trim($x))==0){
                    if(@$arr['name'] || @$arr['name_en']){
                        if(array_key_exists('name_'.$lang, $arr)){
                            $x= $arr["name_".$lang];
                        }
                        else if($lang == $default_language){
                            $x= $arr["name"];
                        }
                    }
                    else{
                        $x = '';
                    }
                }
            }
            return $x;
        }
    }
    return "";
}
function getTailLang(){
    $CI = &get_instance();
    if(!$CI->session->has_userdata("lang")) return "";
    $default_language = $CI->config->item( 'default_language' );
    $lang = $CI->session->has_userdata("lang")?$CI->session->userdata('lang'):$default_language;
    if($default_language==$lang){
        return "";
    }
    return "?lang=".$lang;
}
function getLang(){
    $ci = & get_instance();
    if($ci->session->has_userdata('lang')){
        return $ci->session->userdata('lang');
    }
    return "";
}
function echor($arr,$key,$check=1){
    $ci = & get_instance();
    $resultHook = $ci->hooks->call_hook(['tech5s_before_input_echor',"arr"=>$arr,"key"=>$key,"check"=>$check]);
    if(!is_bool($resultHook) && is_array($resultHook)){
        extract($resultHook);
    }
    $result = "";
    if(!is_array($arr)){ echo $arr;return;}
    if(!array_key_exists($key, $arr) && $key!="img_thumb"){
        $result =  _ee($arr,$key,$check);
    }
    else if(is_array($arr)){
        if($check==1){
            $CI = & get_instance();
            $default_language = $CI->config->item( 'default_language' );
            $k = @$CI->session->userdata('lang')?$CI->session->userdata('lang'):$default_language;
            if(array_key_exists($key."_".$k, $arr)){
                $result =  $arr[$key."_".$k];
            }
            else{
                if($key=='create_time'||$key=='update_time'){
                    $result =  date('d/m/Y H:i:s',$arr[$key]);
                }
                else if($key=='slug' || $key == 'link_static'){
                    $result = base_url($arr[$key].getTailLang());
                }
                else if($key=='price'||$key=='price_sale'){
                    if((double)$arr[$key]==0)
                    $result = lang('LIENHE');
                    else
                    $result = number_format((double)$arr[$key],0,',','.')." đ";
                }
                else if($key=='img_thumb'){
                    $key = 'img';
                    if(isNull($arr[$key]) || !file_exists($arr[$key])){
                        $result = "theme/admin/images/no-image.svg";
                    }
                    else if($arr[$key]!=null && strpos($arr[$key], 'http')===FALSE && strpos($arr[$key], 'theme/frontend')===FALSE){
                        $result = getImageThumb($arr[$key]);    
                    }
                    else{
                        $result = $arr[$key];
                    }
                }
                else if($key=='img'){
                    if(isNull($arr[$key]) || !file_exists($arr[$key])) {
                        $result = "theme/admin/images/no-image.svg";
                    }
                    else{
                        $result = $arr['img'];
                    }
                }
                else{
                    $result = $arr[$key];
                }
            }
        }
        else{
            $result = $arr[$key];
        }
    }
    else{
        $result = $arr;
    }
    $resultHook = $ci->hooks->call_hook(['tech5s_before_echor',"result"=>$result,"arr"=>$arr,"key"=>$key,"check"=>$check]);
    if(!is_bool($resultHook) && is_array($resultHook)){
        extract($resultHook);
    }
    return $result;
}
function isNull($str){
    return  $str==NULL || (is_string($str) && strlen(trim($str))==0);
}
function subString($body,$length){
    $line=$body;
    if (preg_match('/^.{1,'.$length.'}\b/s', $body, $match))
    {
        $line=$match[0];
    }
    return $line;
}
function getExactLink($link){
    if(($link!=NULL && strlen($link)>0 &&  strpos($link, 'http')!==FALSE) || $link == 'javascript:void(0);'){
        return $link;
    }
    else return base_url().$link.getTailLang();
}
/* send mail */
function sendMail($email,$tieude,$noidung,$email_bcc = false,$email_cc = false){
    tryCatchset();
    $CI = &get_instance();
    $mail = new \PHPMailer\PHPMailer\PHPMailer;
    $mail->CharSet = 'UTF-8';
    $mail->SMTPDebug = 0;     
    $mail->isSMTP();    
    $host = $CI->Dindex->getSettings("MAIL_HOST");
    $mail->Host = ($host=='' || $host=='MAIL_HOST')?'smtp.gmail.com':$host; 
    $mail->SMTPAuth = true;                              
    $mail->Username = $CI->Dindex->getSettings("MAIL_USER");                 
    $mail->Password = $CI->Dindex->getSettings("MAIL_PASS");   
    $sec = $CI->Dindex->getSettings("MAIL_SMTP_SECURE");                     
    $mail->SMTPSecure = ($sec=='' || $sec=='MAIL_SMTP_SECURE')?'tls':$sec;
    $port = $CI->Dindex->getSettings("MAIL_SMTP_PORT");
    $mail->Port = ($port=='' || $port=='MAIL_SMTP_PORT')?587:$port;
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
function replaceURL($string){
    $string=strtolower($string);
    $str = str_replace('-', ' ', $string);
    $utf8characters = 'à|a, ả|a, ã|a, á|a, ạ|a, ă|a, ằ|a, ẳ|a, ẵ|a,  ắ|a, ặ|a, â|a, ầ|a, ẩ|a, ẫ|a, ấ|a, ậ|a, đ|d, è|e, ẻ|e, ẽ|e, é|e, ẹ|e,  ê|e, ề|e, ể|e, ễ|e, ế|e, ệ|e, ì|i, ỉ|i, ĩ|i, í|i, ị|i, ò|o, ỏ|o, õ|o,  ó|o, ọ|o, ô|o, ồ|o, ổ|o, ỗ|o, ố|o, ộ|o, ơ|o, ờ|o, ở|o, ỡ|o, ớ|o, ợ|o,  ù|u, ủ|u, ũ|u, ú|u, ụ|u, ư|u, ừ|u, ử|u, ữ|u, ứ|u, ự|u, ỳ|y, ỷ|y, ỹ|y,  ý|y, ỵ|y, À|a, Ả|a, Ã|a, Á|a, Ạ|a, Ă|a, Ằ|a, Ẳ|a, Ẵ|a, Ắ|a, Ặ|a, Â|a,  Ầ|a, Ẩ|a, Ẫ|a, Ấ|a, Ậ|a, Đ|d, È|e, Ẻ|e, Ẽ|e, É|e, Ẹ|e, Ê|e, Ề|e, Ể|e,  Ễ|e, Ế|e, Ệ|e, Ì|i, Ỉ|i, Ĩ|i, Í|i, Ị|i, Ò|o, Ỏ|o, Õ|o, Ó|o, Ọ|o, Ô|o,  Ồ|o, Ổ|o, Ỗ|o, Ố|o, Ộ|o, Ơ|o, Ờ|o, Ở|o, Ỡ|o, Ớ|o, Ợ|o, Ù|u, Ủ|u, Ũ|u,  Ú|u, Ụ|u, Ư|u, Ừ|u, Ử|u, Ữ|u, Ứ|u, Ự|u, Ỳ|y, Ỷ|y, Ỹ|y, Ý|y, Ỵ|y, "|,  &|';
    $replacements = array();
    $items = explode(',', $utf8characters);
    foreach ($items as $item) {
        @list($src, $dst) = explode('|', trim($item));
        $replacements[trim($src)] = trim($dst);
    }
    $str = trim(strtr($str, $replacements));
    $str = preg_replace('/(\s|[^A-Za-z0-9\-])+/', '-', $str);
    $str = trim($str, '-');
    return $str;
}
function printRecursiveSelect($lv,$arrD,$value){
    $lv++;
    for ($i=0;$i<sizeof($arrD);$i++) {
        $sub = $arrD[$i];
        $item = $sub->item;
        $inputs = array_keys($item);
        echo '<option '.($value==$item['id']?' selected ':'').' value="'.$item['id'].'">└'.str_repeat("---", $lv).(in_array('name', $inputs) ? $item['name'] : (!empty($inputs[1]) ? $item[$inputs[1]] : '')).'</option>';
        printRecursiveSelect($lv,$sub->childs,$value);
    }
}
function printRecursiveSelectWithTag($lv,$arrD,$value){
    $lv++;
    for ($i=0;$i<sizeof($arrD);$i++) {
        $sub = $arrD[$i];
        $item = $sub->item;
        echo '<option dt-slug="'.$item['slug'].'" '.($value==$item['id']?' selected ':'').' value="'.$item['id'].'">└'.str_repeat("---", $lv).$item['name'].'</option>';
        printRecursiveSelectWithTag($lv,$sub->childs,$value);
    }
}
function printRecursiveMultiSelect($lv,$arrD,$value){
    $lv++;
    for ($i=0;$i<sizeof($arrD);$i++) {
        $sub = $arrD[$i];
        $item = $sub->item;
        $inputs = array_keys($item);
        $checked = (is_array($value) && in_array($item['id'], $value))?' checked ':'';
        $class = (is_array($value) && in_array($item['id'], $value))?' choose ':'';
        echo '<li class="'.$class.'" style="  font-size: 15px;color:#1D1D1D;margin: 2px 0px;padding-left:'.(($lv-1)*20).'px;"><label>'.($lv>1?'└----':'').'<input type="checkbox" '.$checked.' value="'.$item['id'].'"/>'.(in_array('name', $inputs) ? $item['name'] : (!empty($inputs[1]) ? $item[$inputs[1]] : '')).'</label></li>';
        if(@$sub->childs){
            printRecursiveMultiSelect($lv,$sub->childs,$value);
        }
    }
}
function printRecursiveMultiSelect2($lv,$arrD,$value){
    $value = json_decode($value, true);
    $lv++;
    for ($i=0;$i<sizeof($arrD);$i++) {
        $sub = $arrD[$i];
        $item = $sub->item;
        $checked = (is_array($value) && array_key_exists($item['id'], $value))?' checked ':'';
        echo '<li style="  font-size: 15px;color:#1D1D1D;margin: 2px 0px;margin-left:'.(($lv-1)*20).'px;">'.($lv>1?'└----':'').'<input type="checkbox" '.$checked.' value="'.$item['id'].'"/>'.$item['name'].'<br>';
        echo '<input style="width: 100%;" type="text" value="'.((is_array($value) && array_key_exists($item['id'], $value)) ? $value[$item['id']] : '').'" placeholder="Link sản phẩm trên '.$item['name'].'">';
        echo '</li>';
        if(@$sub->childs){
            printRecursiveMultiSelect($lv,$sub->childs,$value);
        }
    }
}
function printMenu($arrD,$arrSetting){
    $CI= & get_instance();
    $runDefault = true;
    $resultHook = $CI->hooks->call_hook(['tech5s_print_menu',"arrD"=>$arrD,"arrSetting"=>$arrSetting,"runDefault"=>$runDefault]);
    if(!is_bool($resultHook) && is_array($resultHook)){
        extract($resultHook);
    }
    if($runDefault){
        printMenuC($arrD,$arrSetting,0);
    }
}
function printMenuC($arrD,$arrSetting,$count){
    $CI= & get_instance();
    $link = $CI->uri->segment(1);
    $count++;
    $arrDef = array(
        'classli'=>'',
        'classa'=>'',
        'classul'=>'',
        'divajax'=>'',
        'divclr'=>1
        );
    $arrDefault = array_replace($arrDef, $arrSetting);
    $div = $arrDefault['divajax'];
    $home = 0;
    for ($i=0;$i<sizeof($arrD);$i++) {
        $sub = $arrD[$i];
        $item = $sub->item;
        $exactLink = getExactLink($item["link"]);
        if($i==0){ echo "<ul class='".$arrDefault['classul']."'>";}
        echo "<li class=' clli".$count." ".$arrDefault['classli']."'><a rel='".(($item['nofollow'] == 1)?'nofollow':'')."' class='".getMenuActive($item)." clli".$count."".$arrDefault['classa']." menu".$item['id']."' href='".$exactLink."' ";
        if(strlen($div)>0){
            echo "onclick= \"loadPageContent('$div','$exactLink');return false;\" ";
        }
        echo " href='".$item['link']."'>".echor($item,'name',1)."</a>";
        printMenuC($sub->childs,$arrSetting,$count);
        echo "</li>";
        if($i==sizeof($arrD)-1){
            /*if($arrDefault['divclr']==1) echo "<div class='clr'></div>";*/
            echo "</ul>";
        }
        $home++;
    }
}



function getYoutubeId($link){
    preg_match("/^(?:http(?:s)?:\/\/)?(?:www\.)?(?:m\.)?(?:youtu\.be\/|youtube\.com\/(?:(?:watch)?\?(?:.*&)?v(?:i)?=|(?:embed|v|vi|user)\/))([^\?&\"'>]+)/", $link, $matches);
    if(isset($matches[1]) && $matches[1] !=""){
        return $matches[1];
    }
    else{
        return 0;
    }
}
function fetch_highest_res($videoid) {
    $resolutions = array('maxresdefault', 'hqdefault', 'mqdefault');     
    foreach($resolutions as $res) {
        $imgUrl = "http://i.ytimg.com/vi/$videoid/$res.jpg";
        if(@getimagesize(($imgUrl))) 
            return $imgUrl;
    }
}
function wlimit($str,$n) {
    echo word_limiter(strip_tags($str),$n);
}



function getFieldTable($table,$id,$field){
    $CI= & get_instance();
    $pa=$CI->Dindex->getInfoTable($table,$id);
    if(@$pa[0][$field]) return  $pa[0][$field];
    else return " ";
}


function getMothVietnamese($timestamp){
    $months = [
        'Jan' => 'Th1',
        'Feb' => 'Th2',
        'Mar' => 'Th3',
        'Apr' => 'Th4',
        'May' => 'Th5',
        'Jun' => 'Th6',
        'Jul' => 'Th7',
        'Aug' => 'Th8',
        'Sept' => 'Th9',
        'Oct' => 'Th10',
        'Nov' => 'Th11',
        'Dec' => 'Th12'
    ];
    $month_input = date('M', $timestamp);
    $month_output = $months[$month_input];
    return $month_output;
}

function rand_string( $length ) {
    $chars = "abcdefghijklmnopqrstuvwxyzABCDEFGHIJKLMNOPQRSTUVWXYZ0123456789";
    $size = strlen( $chars );
    $str = '';
    for( $i = 0; $i < $length; $i++ ) {
        $str .= $chars[ rand( 0, $size - 1 ) ];
    }
    return $str;
}


function getMenuActive($menus){
   return '';
}
function getConfigPlugin($pluginName){
    $CI = &get_instance();
    $config = $CI->cache->get('_cache_'.$pluginName);
    if ( !@$config )
    {
        $config = HookPlugin::getConfig($pluginName);
        $CI->cache->save('_cache_'.$pluginName, $config, $CI->config->item('tech5s_time_cache_setting'));
    }
    return $config;
}
?>