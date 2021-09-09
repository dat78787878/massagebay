<?php
class Introduce_tableMeta{
	protected $table = "introduce_table";
	protected static $instance;
	private function __construct(){}
	public static function get_instance(){
		if(self::$instance){
			return self::$instance;
		}
		else return $instance = new self;
	}
	public function install(){
		$this->addTable();
		$this->createModule();
		$this->createTableInfo();
	}
	public function uninstall(){
		$this->removeTable();
		$this->removeModule();
		$this->removeTableInfo();
	}

	private function addTable(){
		$dttable = new DBTable($this->table);
		$dttable->addField("id","int","id");$dttable->addField("keyword","varchar(100)","keyword");$dttable->addField("vi_value","text(65535)","vi_value");$dttable->addField("en_value","text(65535)","en_value");$dttable->addField("act","tinyint","act");$dttable->addField("type","varchar(50)","type");$dttable->addField("region","int","region");$dttable->addField("note","varchar(50)","note");$dttable->addField("is_delete","tinyint","is_delete");$dttable->addField("ord","int","Sắp xếp");$dttable->addField("default_data","text(65535)","default_data");$dttable->addField("lang","varchar(50)","lang");
		$dttable->build();
	}
	private function removeTable(){
		$dttable = new DBTable($this->table);
		$dttable->dropTable();
	}
	private function createModule(){
		$m = new DBTech5sModule($this->table);
		$m->insertGroupModule('Cấu hình trang giới thiệu',"view/".$this->table,32,'icon-camera',2);
	}
	private function removeModule(){
		$m = new DBTech5sModule($this->table);
		$m->removeModule();
	}
	private function createTableInfo(){
		$m = new DBTech5sTable($this->table);
		$pid = $m->insertNuyTable(
			[
				"name"=>$this->table,
				"note"=>"Cấu hình trang giới thiệu",
				"note_en"=>"IntroduceTable",
				"map_table"=>$this->table,
				"table_parent"=>"",
				"table_child"=>"",
			]
		);
		$columns = $m->getAllColumns();
		foreach ($columns as $k => $column) {
			if($column['name']=="parent"){
				$column["type"]= "select";
				$column["default_data"] = $m->getDefaultData($column,"",0);
			}
			if($column['name']=="name"){
				$column["referer"] = $m->getRefererSlug();
			}
			$m->insertNuyDetailTable($column,$pid);
		}

	}
	private function removeTableInfo(){
		$m = new DBTech5sTable($this->table);
		$m->removeTable();
	}
}