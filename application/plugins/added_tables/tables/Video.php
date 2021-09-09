<?php
class Video{
	protected $table = "video";
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
		$dttable->addField("id","int","id");
		$dttable->addField("name","varchar(255)","Tiêu đề video");
		$dttable->addField("link","varchar(255)","Liên kết video");
		$dttable->addField("img","text(0)","Hình ảnh");
		$dttable->addField("intro","tinyint","Video giới thiệu");				
		$dttable->addField("ord","int","Sắp xếp");
		$dttable->addField("act","tinyint","Kích hoạt");
		$dttable->addField("create_time","bigint","Thời gian tạo");		
		$dttable->build();
	}
	private function removeTable(){
		$dttable = new DBTable($this->table);
		$dttable->dropTable();
	}
	private function createModule(){
		$m = new DBTech5sModule($this->table);
		$m->insertGroupModule('Videos',"view/".$this->table,42,'icon-camera',2);
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
				"note"=>"Videos",
				"note_en"=>"Video",
				"map_table"=>$this->table,
				"table_parent"=>"",
				"table_child"=>"",
			]
		);
		$columns = $m->getAllColumns();
		foreach ($columns as $k => $column) {
			if($column['name']=="parent"){
				$column["type"]= "select";
				$column["default_data"] = $m->getDefaultData($column,"video",0);
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