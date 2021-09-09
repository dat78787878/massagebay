<?php 
namespace BaseWebsite\Models;
class ProCategory extends BaseModel{
	public function place(){
		return $this->hasOne(Place::class,'place_id','id');
	}
}