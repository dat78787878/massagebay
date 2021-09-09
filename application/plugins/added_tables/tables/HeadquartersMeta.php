<?php
class HeadquartersMeta{
	protected $table = "headquarters";
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
		$dttable->addField("id","int","Mã đối tác");$dttable->addField("name","varchar(255)","Tên đối tác");$dttable->addField("link","varchar(255)","Tên đối tác");$dttable->addField("type","varchar(255)","Tên đối tác");$dttable->addField("content","text(65535)","Mô tả");$dttable->addField("short_content","text(65535)","Mô tả ngắn");$dttable->addField("img","text(65535)","Hình ảnh");$dttable->addField("act","tinyint","Kích hoạt");$dttable->addField("ord","int","ord");$dttable->addField("create_time","bigint","Thời gian tạo");$dttable->addField("update_time","bigint","Thời gian tạo");
		$dttable->build();
	}
	private function removeTable(){
		$dttable = new DBTable($this->table);
		$dttable->dropTable();
	}
	private function createModule(){
		$m = new DBTech5sModule($this->table);
		$m->insertGroupModule('Trụ sở',"view/".$this->table,42,'icon-camera',2);
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
				"note"=>"Trụ sở",
				"note_en"=>"Headquarters",
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