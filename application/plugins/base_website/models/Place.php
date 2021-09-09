<?php 
namespace BaseWebsite\Models;
class Place extends BaseModel{
	protected $table = 'place';
	public function national(){
		return $this->hasOne(National::class,'national_id','id');
	}
	public function getCountHotel(){
		$CI = &get_instance();
		$hotels = $CI->Dindex->getDataDetail([
	        'table'=>'hotels',
	        'where'=>[['key'=>'act','compare'=>'=','value'=>1],['key'=>'place_id','compare'=>'=','value'=>$this->id]]
	    ]);
	    return count($hotels);
	}
	public function getCountHandbook(){
		$CI = &get_instance();
		$hotels = $CI->Dindex->getDataDetail([
	        'table'=>'handbooks',
	        'where'=>[['key'=>'act','compare'=>'=','value'=>1],['key'=>'place_id','compare'=>'=','value'=>$this->id]]
	    ]);
	    return count($hotels);
	}
}