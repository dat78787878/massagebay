<?php 
namespace BaseWebsite\Models;
class Customer extends BaseModel{
	public function pro(){
		return $this->hasOne(Pro::class,'tour_id','id');
	}
	public function combo(){
		return $this->hasOne(Combo::class,'combo_id','id');
	}
}