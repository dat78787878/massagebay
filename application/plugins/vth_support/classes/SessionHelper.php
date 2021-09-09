<?php 
namespace VthSupport\Classes;
class SessionHelper
{
    public static function push($key,$value){
        $CI = &get_instance();
        $CI->session->set_userdata($key,$value);
    }
    public static function pushTemp($key,$value,$time=300){
        $CI = &get_instance();
        $CI->session->set_tempdata($key,$value,$time);
    }
    public static function has($key){
        $CI = &get_instance();
        return $CI->session->has_userdata($key);
    }
    public static function get($key){
        $CI = &get_instance();
        return $CI->session->userdata($key);
    }
    public static function getTemp($key){
        $CI = &get_instance();
        return $CI->session->tempdata($key);
    }
    public static function forget($key){
        $CI = &get_instance();
        $CI->session->unset_userdata($key);
    }
    public static function forgetTemp($key){
        $CI = &get_instance();
        $CI->session->unset_tempdata($key);
    }
    public static function flash($key,$value){
        $CI = &get_instance();
        if(isset($value)){
            $CI->session->set_flashdata($key,$value);
        }
        return $CI->session->flashdata('item');
    }
    
}