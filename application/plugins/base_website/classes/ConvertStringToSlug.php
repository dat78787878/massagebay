<?php 
namespace BaseWebsite\Classes;
class ConvertStringToSlug
{
	public static function convertString($string){
        if (!is_string($string)) {
            return '';
        }
        $CI = @get_instance();
        $slug = replaceURL($string);
        $total = 0;
        $count = sizeof($CI->Admindao->getTagInNuyRountes($slug,"","",''));
        $total +=$count;
        $ext= $slug;
        while($count>0){
            $ext  = $slug.($count>0?"-".($total+1):"");
            $count = sizeof($CI->Admindao->getTagInNuyRountes($ext,"","",''));
            $total +=1;
        }
        return $ext;
    }
    public static function convertStringSp($string){
        if (!is_string($string)) {
            return '';
        }
        $CI = @get_instance();
        $slug = replaceURL($string);
        $total = 0;
        $count = sizeof($CI->Admindao->getTagInNuyRountes($slug,"","",''));
        $total +=$count;
        $ext= $slug;
        while($count>0){
            $ext  = $slug.($count>0?"-".($total+1):"");
            $count = sizeof($CI->Admindao->getTagInNuyRountes($ext,"","",''));
            $total +=1;
        }
        return $ext;
    }
    public static function convertStringLink($string,$table){
        if (!is_string($string)) {
            return '';
        }
        $CI = @get_instance();
        $slug = replaceURL($string);
        $total = 0;
        $count = sizeof(static::getTagInTable($slug,$table));
        $total +=$count;
        $ext= $slug;
        while($count>0){
            $ext  = $slug.($count>0?"-".($total+1):"");
            $count = sizeof(static::getTagInTable($ext,$table));
            $total +=1;
        }
        return $ext;
    }
    private static function getTagInTable($slug,$table)
    {
        $CI = &get_instance();
        $sql = "select * from ".$table." where 1 = 1 ";
        if(!isNull($slug)){
            $sql .=" and link = '".$slug."'";
        }
        $q= $CI->db->query($sql);
        return $q->result_array();
    }
}