<?php
class Combo_categoriesMeta{
	protected $table = "combo_categories";
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
		$dttable->addField("id","int","Mã");$dttable->addField("name","varchar(255)","Tên");$dttable->addField("slug","varchar(255)","Slug");$dttable->addField("img","text(65535)","Hình ảnh");$dttable->addField("short_content","text(65535)","Mô tả ngắn");$dttable->addField("content","text(65535)","Nội dung");$dttable->addField("lib_img","text(65535)","lib_img");$dttable->addField("create_time","bigint","Thời gian tạo");$dttable->addField("ord","int","Sắp xếp");$dttable->addField("parent","int","Danh mục cha");$dttable->addField("s_title","varchar(255)","Tiêu đề SEO");$dttable->addField("s_des","varchar(255)","Mô tả SEO");$dttable->addField("s_key","varchar(255)","Từ khóa SEO");$dttable->addField("count","int","Số lượng xem");$dttable->addField("act","tinyint","act");$dttable->addField("home","tinyint","home");$dttable->addField("type","varchar(255)","Kiểu danh mục");$dttable->addField("update_time","bigint","Ngày sửa");
		$dttable->build();
	}
	private function removeTable(){
		$dttable = new DBTable($this->table);
		$dttable->dropTable();
	}
	private function createModule(){
		$m = new DBTech5sModule($this->table);
		$m->insertGroupModule('Danh mục Vourcher/Combo',"view/".$this->table,200,'icon-camera',2);
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
				"note"=>"Danh mục Vourcher/Combo",
				"note_en"=>"ComboCategories",
				"map_table"=>$this->table,
				"table_parent"=>"combo_categories",
				"table_child"=>"combos",
			]
		);
		$columns = $m->getAllColumns();
		foreach ($columns as $k => $column) {
			if($column['name']=="parent"){
				$column["type"]= "select";
				$column["default_data"] = $m->getDefaultData($column,"combo_categories",0);
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