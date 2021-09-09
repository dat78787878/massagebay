<?php
class PlaceMeta{
	protected $table = "place";
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
		$dttable->addField("id","int","id");$dttable->addField("name","varchar(255)","Tên địa điểm");$dttable->addField("slug","varchar(255)","Slug");$dttable->addField("short_content","text(65535)","Mô tả ngắn");$dttable->addField("content","text(65535)","Nội dung");$dttable->addField("img","text(65535)","Hình ảnh");$dttable->addField("lib_img","text(65535)","Thư viện ảnh");$dttable->addField("act","tinyint","Kích hoạt");$dttable->addField("ord","int","Sắp xếp");$dttable->addField("count","int","Số lượt xem");$dttable->addField("home","tinyint","Hiển thị trang chủ");$dttable->addField("create_time","bigint","Thời gian tạo");$dttable->addField("update_time","bigint","Thời gian cập nhật");
		$dttable->build();
	}
	private function removeTable(){
		$dttable = new DBTable($this->table);
		$dttable->dropTable();
	}
	private function createModule(){
		$m = new DBTech5sModule($this->table);
		$m->insertGroupModule('Địa điểm',"view/".$this->table,178,'icon-camera',2);
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
				"note"=>"Địa điểm",
				"note_en"=>"Place",
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