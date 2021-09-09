<?php
namespace BaseWebsite\Classes;
class Media
{
	use \VthSupport\Traits\Singleton;
	private $ci;
	public function __construct()
	{
		$this->CI = &get_instance();
		$this->configsite();
	}
	public function insertMedia($data){
		$this->CI->db->trans_start();
		$this->CI->db->insert("medias",$data);
		$lastId = $this->CI->db->insert_id();
		$this->CI->db->trans_complete();
		if ($this->CI->db->trans_status() === FALSE)
		{
		    $this->CI->db->trans_rollback();
		    return -1;
		}
		else
		{
		    $this->CI->db->trans_commit();
		    return $lastId;
		}
	}
	public function getInfoFile($filename,$file_path){
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
	function human_filesize($bytes, $decimals = 2) {
		$sz = 'BKMGTP';
		$factor = floor((strlen($bytes) - 1) / 3);
		return sprintf("%.{$decimals}f", $bytes / pow(1024, $factor)) . (" ".@$sz[$factor]."B");
	}
	public function uploadFile($idDir, $path, $field = 'file'){
		$this->CI->load->config('filemanager');
		$extimgs = $this->CI->config->item('ext_img');
	  	$extvideos = $this->CI->config->item('ext_video');
	  	$extfiles = $this->CI->config->item('ext_file');
	  	$extmusic = $this->CI->config->item('ext_music');
	  	$extmisc = $this->CI->config->item('ext_misc');
	  	$config['upload_path']=$path;
      	$config['allowed_types'] = implode("|",$extimgs)."|".implode("|",$extvideos)."|".implode("|",$extfiles)."|".implode("|",$extmusic)."|".implode("|",$extmisc);
      	$config['max_size'] = $this->CI->config->item('max_size');
      	$config['max_width']  = $this->CI->config->item('max_width');
      	$config['max_height']  = $this->CI->config->item('max_height');
      	$this->CI->load->library("upload", $config);
      	$images = array();
		$files = $_FILES[$field];
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
	        $this->CI->upload->initialize($config); // load new config setting 
	        if ($this->CI->upload->do_upload($field.'[]')) { // upload file here
	        	$getFileUpload = $this->CI->upload->data();
	        	$fileuploaded = $config['upload_path'].$getFileUpload['file_name'];
	        	if(in_array(substr($ext,1), $extimgs)){
	        		$arrSizes = $this->getSizes($fileuploaded);
	        		if(count($arrSizes)>0){
	        			$new_image = "";
	        			foreach ($arrSizes as $size) {
	        				$new_image = $this->resizeImage($config["upload_path"],$getFileUpload,$size["width"],$size["height"],$size["quality"],$size["name"]);
	        			}
	        		}
	        	}
	        	$ret = $this->insertImageMedia($config['upload_path'],$getFileUpload['file_name'],$idDir);
	        	array_push($images,$ret);
	        } else {
	        	return;
	        }
		}
		return $images;
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
	function configsite(){
		if(!@$this->CI->session->userdata('siteconfigs')){
			$q = $this->CI->db->get('nuy_config');
			$configsite = $q->result_array();
			$arrConfigs= array();
			foreach ($configsite as $key => $value) {
				$arrConfigs[$value['name']] = $value['value'];
			}
			$this->CI->session->set_userdata('siteconfigs',$arrConfigs);
		}
	}
	private function resizeImage($upload_path,$getFileUpload,$widthImage,$heightImage,$quality,$name){
		$filename = is_array($getFileUpload)?$getFileUpload['file_name']:$getFileUpload;
		$this->CI->load->library("image_lib");
		$config['image_library'] = 'gd2';
		$config['source_image'] = $upload_path.$filename;
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
		return $config['new_image'];
	}
	private function insertImageMedia($path, $filename,$parent = 0){
		$data["name"]= $filename;
		$data["file_name"]= $filename;
		$data["is_file"]= 1;
		$data["create_time"]= time();
		$data["parent"]= $parent;
		$data["path"]= $path;
		$data["extra"]= json_encode($this->getInfoFile($filename,$path.$filename));
		return $this->insertMedia($data);
	}
}