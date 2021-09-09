<?php
class Template_menusMeta{
	protected $table = "template_menus";
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
		$dttable->addField("id","int","id");$dttable->addField("name","varchar(255)","Tên thực dơn");$dttable->addField("count_mam","varchar(255)","Số người trong mâm");$dttable->addField("menu1","varchar(255)","Tên");$dttable->addField("menu1_list","text(65535)","List món ăn thực đơn 1");$dttable->addField("menu2","varchar(255)","Tên");$dttable->addField("menu2_list","text(65535)","List món ăn thực đơn 2");$dttable->addField("act","tinyint","Kích hoạt");$dttable->addField("ord","int","Sắp xếp");$dttable->addField("create_time","bigint","Thời gian tạo");$dttable->addField("update_time","bigint","Ngày sửa");
		$dttable->build();
	}
	private function removeTable(){
		$dttable = new DBTable($this->table);
		$dttable->dropTable();
	}
	private function createModule(){
		$m = new DBTech5sModule($this->table);
		$m->insertGroupModule('Thực đơn',"view/".$this->table,191,'icon-camera',2);
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
				"note"=>"Thực đơn",
				"note_en"=>"TemplateMenus",
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