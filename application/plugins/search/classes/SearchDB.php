<?php 
namespace Search\Classes;
class SearchDB{
	use \VthSupport\Traits\Singleton;
	protected $CI;
	public function __construct(){
		$this->CI= &get_instance();
	}
	public function getCount($table,$q,$keys=['name'],$wheres=[]){
		if(mb_strlen($q)==1) return 0;
		$sql = "SELECT count(id) as count FROM %s WHERE MATCH (%s) AGAINST (? IN BOOLEAN MODE) > 0";
		$length = count(explode(' ', $q));
		$q = $length>1?$q:$q."*";
		$condtions = [];
		array_push($condtions, $table);
		array_push($condtions, implode(',', $keys));
		$addWheres = [];
		array_push($addWheres, $q);
		foreach ($wheres as $key => $where) {
			$sql .= " and %s %s ?";
			array_push($condtions, $where['key'],$where['compare']);
			array_push($condtions, $where['compare']);
			array_push($addWheres,$where['value']);
		}
		$sql = vsprintf($sql, $condtions);
		$query = $this->CI->db->query($sql,$addWheres);
		$results = $query->result_array();
		$count = count($results)>0?$results[0]['count']:0;
		return $count;
	}
	public function getDataTable($table,$q,$keys=['name'],$wheres=[],$offset =0,$limit=10){
		if(mb_strlen($q)==1) return [];
		$sql = "SELECT %s.*, MATCH (%s) AGAINST (? IN BOOLEAN MODE) as score1 FROM %s WHERE MATCH (%s) AGAINST (? IN BOOLEAN MODE) > 0 ";
		$length = count(explode(' ', $q));
		$q = $length>1?$q:$q."*";
		$condtions = [];
		array_push($condtions, $table);
		array_push($condtions, implode(',', $keys));
		array_push($condtions, $table);
		array_push($condtions, implode(',', $keys));
		$addWheres = [];
		array_push($addWheres, $q);
		array_push($addWheres, $q);
		foreach ($wheres as $key => $where) {
			$sql .= " and %s %s ?";
			array_push($condtions, $where['key']);
			array_push($condtions, $where['compare']);
			array_push($addWheres,$where['value']);
		}
		$sql .=" order by score1 desc limit %s,%s";
		array_push($condtions, $offset);
		array_push($condtions, $limit);
		$sql = vsprintf($sql, $condtions);
		$query = $this->CI->db->query($sql,$addWheres);
		$results = $query->result_array();
		return $results;
	}
}