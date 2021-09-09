<?php 
namespace VthSupport\Classes;
class DBMaker{	
	use \VthSupport\Traits\Singleton;	
	protected $CI;	
	public function __construct(){		
		$this->CI= &get_instance();	
	}	
	/*	$columns = ['key'=>'name','note'=>'Tên','type'=>'varchar(255)','default'=>'']	*/	
	public function addColumn($table,$columns,$forceDrop= false){		
		$sql = "select * from information_schema.`COLUMNS` where table_name = ? and column_name = ?";		
		foreach ($columns as $k => $column) {
			$key = array_key_exists('key', $column)?$column['key']:'';
			$note = array_key_exists('note', $column)?$column['note']:'';
			$type = array_key_exists('type', $column)?$column['type']:'';
			$default = array_key_exists('default', $column)?$column['default']:'';
			if($key=='' || $note=='' ||$type=='') continue;
			$results = $this->CI->db->query($sql,[$table,$key])->result_array();
			if(count($results)==1 && $forceDrop){
				$this->_dropColumn($table,$key);			
			}			
			if(count($results)==0 || $forceDrop){
				if($default!=''){
					$sql = "ALTER TABLE %s ADD COLUMN `%s` %s NULL DEFAULT '%s' COMMENT '%s'";
					$sql = sprintf($sql,$table,$key,$type,$default,$note);
				}
				else{
					$sql = "ALTER TABLE %s ADD COLUMN `%s` %s NULL  COMMENT '%s'";
					$sql = sprintf($sql,$table,$key,$type,$note);
				}
				$this->CI->db->query($sql);
			}		
		}	
	}
	private function _dropColumn($table,$column){
		$sql = "ALTER TABLE %s 		DROP COLUMN `%s`";
		$sql = sprintf($sql,$table,$column);
		$this->CI->db->query($sql);	
	}
	public function removeColumn($table,$columnName){
		$sql = "select * from information_schema.`COLUMNS` where table_name = ? and column_name = ?";
		$arr = $this->CI->db->query($sql,[$table,$columnName])->result_array();
		if(count($arr)>0){
			$sql = "ALTER TABLE %s DROP COLUMN `%s`";
			$sql = sprintf($sql,$table,$columnName);
			$this->CI->db->query($sql);
		}
	}	
	public function addIndex($table,$columnName){
		$sql = "select * from information_schema.`COLUMNS` where table_name = ? and column_name = ?";
		$arr = $this->CI->db->query($sql,[$table,$columnName])->result_array();
		if(count($arr)>0){
			$sql = "ALTER TABLE %s ADD INDEX `idx_%s`(`%s`);";
			$sql = sprintf($sql,$table,$columnName,$columnName);
			$this->CI->db->query($sql);		
		}	
	}	
	/*	$data=[		'name'=>'',		'required'=>'',		'note'=>'',		'length'=>'',		'type'=>'',		'create_time'=>'',		'update_time'=>'',		'link'=>'',		'view'=>'',		'editable'=>'',		'simple_searchable'=>'',		'searchable'=>'',		'simple_searchable'=>'',		'quickpost'=>'',		'is_upload'=>'',		'parent'=>'',		'default_data'=>'',		'region'=>'',		'help'=>'',		'ord'=>'',		'act'=>'',		'referer'=>'',		'note_en'=>'',	]	*/	
	public function addDetailTable($table,$columnName,$forceDelete= false,$dataInsert = []){
		$this->CI->db->where('name',$table);
		$q = $this->CI->db->get('nuy_table');
		$results = $q->result_array();
		if(count($results)>0){
			$this->CI->db->where('name',$columnName);
			$this->CI->db->where('link',$table);
			$q = $this->CI->db->get('nuy_detail_table');
			$results = $q->result_array();
			$insert = true;	
			if(count($results)>0){
				$insert = false;
				if($forceDelete){
					$this->removeDetailTable($table,$columnName);
					$insert = true;
				}
			}
			if($insert){
				$data=['name'=>$columnName,'required'=>'0','note'=>$columnName,'length'=>'0','type'=>'TEXT','create_time'=>time(),'update_time'=>time(),'link'=>$table,'view'=>'0','editable'=>'0','simple_searchable'=>'0','searchable'=>'0','quickpost'=>'0','is_upload'=>'0','parent'=>'0','default_data'=>'','region'=>'1','help'=>'0','ord'=>'1','act'=>'1','referer'=>'','note_en'=>$columnName,];
				$dataInsert = array_replace($data, $dataInsert);
				$this->CI->db->insert($table,$dataInsert);
			}
		}
	}	
	public function removeDetailTable($table,$columnName){
		$sql = "DELETE from nuy_detail_table where link = ? and name = ?";
		$this->CI->db->query($sql,$table,$columnName);	
	}
}