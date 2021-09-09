<?php 
namespace BaseWebsite\Classes;
require_once "Singleton.php";
class MediaProvider{
	use Singleton;
	protected $CI ;
	public function __construct(){
		$this->CI= &get_instance();
	}
	private function human_filesize($bytes, $decimals = 2) {
	  $sz = 'BKMGTP';
	  $factor = floor((strlen($bytes) - 1) / 3);
	  return sprintf("%.{$decimals}f", $bytes / pow(1024, $factor)) . (" ".@$sz[$factor]."B");
	}
	private function getInfoFile($filename,$file_path){
        $this->CI->config->load('filemanager', FALSE, TRUE);
		$extimgs = $this->CI->config->item('ext_img');
	 	$extvideos = $this->CI->config->item('ext_video');
		$extfiles = $this->CI->config->item('ext_file');
		$extmusic = $this->CI->config->item('ext_music');
		$extmusic = $this->CI->config->item('ext_misc');
		$pathuploads = $this->CI->config->item('path_uploads');
		$basepath = $this->CI->config->item('base_path');
		$obj = new \stdClass();
		$obj->extension = substr(strrchr($filename,'.'),1);
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
                $obj->thumb = $basepath.$onlyDir.'thumbs/def/'.$filename;
    		}
        }
		return $obj;
	}
	public function createDir($dir){
        $path = pathinfo($dir);
        if(!file_exists($dir)){
            mkdir($dir,0777,true);
            $folderId = 0;
            if($path["dirname"]=="uploads"){
                $folderId = 0;
            }
            else{
                $ppath = pathinfo($path["dirname"]);
                $this->CI->db->where("path",$ppath["dirname"]."/");
                $this->CI->db->where("name",$ppath["basename"]);
                $q = $this->CI->db->get("medias",1,0);
                $arr = $q->result_array();
                if(count($arr)>0){
                    $folderId = $arr[0]["id"];
                }
            }
            $extra = $this->getInfoFile($path["basename"],$dir);
            $extra = json_encode($extra);
            $dataImg = array(
                'name'=>$path["basename"],
                'create_time'=>time(),
                'parent'=>$folderId,
                'is_file'=>0,
                'path'=>$path["dirname"]."/",
                'extra'=>$extra,
                'file_name'=>$path["basename"],
            );
            $lastId =$this->CI->Admindao->insertData($dataImg,'medias');
            $dataImg["id"] = $lastId;
            return $dataImg;
        }
        else{
            $this->CI->db->where("path",$path["dirname"]."/");
            $this->CI->db->where("name",$path["basename"]);
            $q = $this->CI->db->get("medias",1,0);
            $arr = $q->result_array();
            if(count($arr)>0)
                return $arr[0];
        }
    }
    private function _toFile($url,$dir){
        $path = pathinfo($url);
        $f =$this->clean(urldecode($path["filename"]));
        $file = $dir."/".$f.".".$path['extension'];
        $file = strtolower($file);
        $content =@file_get_contents($url);
        file_put_contents($file, $content);
        return $file;
    }
    function clean($string) {
       $string = str_replace(' ', '-', $string); // Replaces all spaces with hyphens.
       $string = preg_replace('/[^A-Za-z0-9\-\.]/', '', $string); // Removes special chars.
       return preg_replace('/-+/', '-', $string); // Replaces multiple hyphens with single one.
    }
    public function makeFile($url,$dirObj){
        if(count($dirObj)==0) return [];
        $file = $this->_toFile($url,$dirObj["path"].$dirObj["file_name"]);
        if(file_exists($file)){
            return $this->insertMedia($file,$dirObj);
        }
        return [];
    }
    public function insertMedia($file,$folder){
        $path = pathinfo($file);
        $extra = $this->getInfoFile($path["basename"],$file);
        $extra = json_encode($extra);
        $dataImg = array(
            'name'=>$path["basename"],
            'create_time'=>time(),
            'parent'=>$folder["id"],
            'is_file'=>1,
            'path'=>$path["dirname"]."/",
            'extra'=>$extra,
            'file_name'=>$path["basename"],
        );
        $lastId =$this->CI->Admindao->insertData($dataImg,'medias');
        $dataImg["id"] = $lastId;
        return $dataImg;
    }
}