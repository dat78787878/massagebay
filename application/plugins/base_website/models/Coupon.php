<?php 
namespace BaseWebsite\Models;
use BaseWebsite\Models\Pro;
class Coupon extends BaseModel{
	public function getCodeSaleInTime($id){
		$ret = [];
		$where =[['FIND_IN_SET('.$id.',pro_id)','>',0],['to_date','>',time()],['from_date','<',time()],['code','=',$this->code],['act','=',1]];
		$coupon = Coupon::where($where);
		if (count($coupon) >0) {
			return $coupon[0];
		}else {
			$pro = Pro::find($id);
			$ret = $this->getCodeProCateSaleInTime($pro->parent);
		}
		return $ret;
	}
	public function getCodeProCateSaleInTime($id){
		if ($id == "") return[];
		$where =[['FIND_IN_SET('.$id.',procate_id)','>',0],['to_date','>',time()],['code','=',$this->code],['from_date','<',time()],['act','=',1]];
		$coupon = Coupon::where($where);
		if (count($coupon) > 0) {
			return $coupon[0];
		}
		return [];
	}
}