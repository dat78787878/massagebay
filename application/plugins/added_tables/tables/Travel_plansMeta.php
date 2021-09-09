<?php
class Travel_plansMeta{
	protected $table = "travel_plans";
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
		$dttable->addField("id","int","Mã");$dttable->addField("name","varchar(255)","Tên");$dttable->addField("email","varchar(255)","Tên");$dttable->addField("phone","text(65535)","Nội dung");$dttable->addField("address","varchar(255)","Tên");$dttable->addField("start_place","varchar(255)","Email");$dttable->addField("number_person","varchar(255)","Điện thoại");$dttable->addField("type_tour","text(65535)","Ghi chú");$dttable->addField("list_place","varchar(255)","list_place");$dttable->addField("list_place_name","varchar(255)","list_place_name");$dttable->addField("note","text(65535)","note");$dttable->addField("act","int","act");$dttable->addField("ord","varchar(255)","ord");$dttable->addField("create_time","bigint","Thời gian tạo");$dttable->addField("update_time","int","update_time");
		$dttable->build();
	}
	private function removeTable(){
		$dttable = new DBTable($this->table);
		$dttable->dropTable();
	}
	private function createModule(){
		$m = new DBTech5sModule($this->table);
		$m->insertGroupModule('Tour tự chọn',"view/".$this->table,194,'icon-camera',2);
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
				"note"=>"Tour tự chọn",
				"note_en"=>"TravelPlans",
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