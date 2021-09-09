<?php 
namespace BaseWebsite\Models;
class Combo extends BaseModel{
	public function isSale()
	{
		if ($this->price_sale > 0 & $this->price_sale < $this->price) {
			return true;
		}
		return false;
	}
	public function getPercen(){
		$percen = round((($this->price - $this->price_sale)/$this->price)*100);
		return $percen;
	}
	public function startingLine(){
		return $this->hasOne(Place::class,'starting_line','id');
	}
	public function endLine(){
		return $this->hasOne(Place::class,'end_line','id');
	}
	public function hotel(){
		return $this->hasOne(Hotel::class,'hotel_id','id');
	}
}