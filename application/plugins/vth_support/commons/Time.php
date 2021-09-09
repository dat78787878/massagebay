<?php 
namespace VthSupport\Commons;
/**
 * 
 */
class Time
{
	protected $ago = 'trước';
	protected $yesterday = 'Hôm qua';
	protected $beforeYesterday = 'Hôm kia';
	protected $plurals =['year'   => 'năm',
						'month'  => 'tháng',
						'day'    => 'ngày',
						'hour'   => 'giờ',
						'minute' => 'phút',
						'second' => 'giây'];
	protected $seconds = [
					365 * 24 * 60 * 60  =>  'year',
					 30 * 24 * 60 * 60  =>  'month',
						  24 * 60 * 60  =>  'day',
							   60 * 60  =>  'hour',
									60  =>  'minute',
									 1  =>  'second'
						];
	protected $time;
	public function __construct($time){
		$this->time = (int)$time;
	}
	public function format()
	{
		$now = new \DateTime; 
		$now->modify('today');
		$yesterday = clone $now;
        $yesterday = $yesterday->modify('-1 day');
        $beforeYesterday = clone $yesterday;
        $beforeYesterday = $beforeYesterday->modify('-1 day');
        $breakTime = clone $now;
        $breakTime = $breakTime->modify('-30 day');
        if($this->time == 0) return '';
        if($this->time < $breakTime->getTimestamp()){
            return $this->formatLongTime();
        }
        else if($this->time < $beforeYesterday->getTimestamp()){
		    return $this->formatAgo();
        }
        else if($this->time < $yesterday->getTimestamp()){
            return $this->formatBeforeYesterday();
        }
		else if($this->time < $now->getTimestamp()){
		    return $this->formatYesterday();
		}
		else{
		    return $this->formatAgo();
		}
	}
	public function formatLongTime()
	{
		return date('d/m/Y',$this->time);
	}
	public function formatYesterday()
	{
		return sprintf('%s %s',date('H:i',$this->time),$this->yesterday); 
    }
    public function formatBeforeYesterday()
	{
		return sprintf('%s %s',date('H:i',$this->time),$this->beforeYesterday); 
	}
	public function formatAgo()
	{
		$etime = time() - $this->time;
		if ($etime < 1)
		{
			return $this->formatFewTimeAgo();
		}
		else{
			return $this->formatMoreTimeAgo($etime);
		}
	}
	private function formatMoreTimeAgo($etime){
		foreach ($this->seconds as $secs => $name)
		{
			$quotient = $etime / $secs;
			if ($quotient >= 1)
			{
				$round = round($quotient);
				return sprintf('%s %s %s',$round,($round > 1 ? $this->plurals[$name] : $name),$this->ago);
			}
		}
	}
	private function formatFewTimeAgo(){
		return sprintf('%s %s %s',0,$this->plurals['second'],$this->ago);
	}
	public static function createFromDateTime(\DateTime $date){
		return new static($date->getTimestamp());
	}
}