<?php
namespace VthSupport\Classes;
class UploadHelper{
	protected $CI;
	protected $allowedTypes;
	protected $maxSize;
	protected $maxWidth;
	protected $maxHeight;
	protected $maxFiles = 5;
	protected $path = 'uploads';
	public function __construct(){
		$this->CI = &get_instance();
		$this->setDefaultConfig();
	}
	public function setAllowedTypes($allowedTypes){
		$this->allowedTypes = $allowedTypes;
	}
	public function setPath($path){
		if(!file_exists($path)){
			mkdir($path,0777,true);
		}
		$this->path = $path;
	}
	public function setMaxSize($maxSize){
		$this->maxSize = $maxSize;
	}
	public function setMaxWidth($maxWidth){
		$this->maxWidth = $maxWidth;
	}
	public function setMaxHeight($maxHeight){
		$this->maxHeight = $maxHeight;
	}
	public function getMaxFiles(){
		return $this->maxFiles;
	}
	public function setMaxFiles($maxFiles){
		$this->maxFiles = $maxFiles;
	}
	public function setDefaultConfig(){
		$this->CI->load->config('filemanager');
		$extimgs = $this->CI->config->item('ext_img');
	  	$extvideos = $this->CI->config->item('ext_video');
	  	$extfiles = $this->CI->config->item('ext_file');
	  	$extmusic = $this->CI->config->item('ext_music');
	  	$extmisc = $this->CI->config->item('ext_misc');
	  	$this->allowedTypes = implode("|",$extimgs)."|".implode("|",$extvideos)."|".implode("|",$extfiles)."|".implode("|",$extmusic)."|".implode("|",$extmisc);
	  	$this->maxSize = $this->CI->config->item('max_size');
	  	$this->maxWidth = $this->CI->config->item('max_width');
	  	$this->maxHeight = $this->CI->config->item('max_height');
	}
	public function getConfigUpload(){
		return [
			'upload_path'=>$this->path,
			'allowed_types'=>$this->allowedTypes,
			'max_size'=>$this->maxSize,
			'max_width'=>$this->maxWidth,
			'max_height'=>$this->maxHeight,
		];
	}
	public function uploadFiles($field = 'file'){
	  	$config = $this->getConfigUpload();
      	$this->CI->load->library("upload", $config);
      	$results = array();
      	if(!array_key_exists($field, $_FILES)) return $results;
		$files = $_FILES[$field];
		if(count($files)>$this->maxFiles) return $results;
		foreach ($files['name'] as $key => $image) {
			$tmpName = $files['name'][$key];
			$tmpRealName = substr($tmpName, 0,strrpos($tmpName, "."));
			$ext = strtolower(substr($tmpName, strrpos($tmpName, ".")));
			$config['file_name'] = replaceURL($tmpRealName).$ext;
	        $_FILES[$field.'[]']['name']= $files['name'][$key];
	        $_FILES[$field.'[]']['type']= $files['type'][$key];
	        $_FILES[$field.'[]']['tmp_name']= $files['tmp_name'][$key];
	        $_FILES[$field.'[]']['error']= $files['error'][$key];
	        $_FILES[$field.'[]']['size']= $files['size'][$key];
	        $this->CI->upload->initialize($config);
	        if ($this->CI->upload->do_upload($field.'[]')) {
	        	$getFileUpload = $this->CI->upload->data();
	        	$fileuploaded = $config['upload_path'].$getFileUpload['file_name'];
	        	array_push($results,$fileuploaded);
	        }else{
	        $this->CI->upload->display_errors();
	        }
		}
		return $results;
	}
}