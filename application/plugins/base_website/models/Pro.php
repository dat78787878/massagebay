<?php namespace BaseWebsite\Models;
class Pro extends BaseModel
{
    protected $table = 'pro';
    public function isSale()
    {
        if ($this->price_sale > 0 & $this->price_sale < $this->price)
        {
            return true;
        }
        return false;
    }
    public function getPercen()
    {
        $percen = round((($this->price - $this->price_sale) / $this->price) * 100);
        return $percen;
    }
    public function startingLine()
    {
        return $this->hasOne(Place::class , 'starting_line', 'id');
    }
    public function endLine()
    {
        return $this->hasOne(Place::class , 'end_line', 'id');
    }
    public function getCodeSaleInTime()
    {
        $ret = [];
        $where = [['FIND_IN_SET(' . $this->id . ',pro_id)', '>', 0], ['to_date', '>', time() ], ['from_date', '<', time() ], ['act', '=', 1]];
        $coupon = Coupon::where($where);
        if (count($coupon) > 0)
        {
            return $coupon[0];
        }
        else
        {
            $ret = $this->getCodeProCateSaleInTime();
        }
        return $ret;
    }
    public function getCodeProCateSaleInTime()
    {
        if ($this->parent == "") return [];
        $where = [['FIND_IN_SET(' . $this->parent . ',procate_id)', '>', 0], ['to_date', '>', time() ], ['from_date', '<', time() ], ['act', '=', 1]];
        $coupon = Coupon::where($where);
        if (count($coupon) > 0)
        {
            return $coupon[0];
        }
        return [];
    }
}

