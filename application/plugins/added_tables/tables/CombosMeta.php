<?php
class CombosMeta{
	protected $table = "combos";
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
		$dttable->addField("id","int","id");$dttable->addField("name","varchar(255)","Tên sản phẩm");$dttable->addField("slug","varchar(255)","Slug");$dttable->addField("short_content","text(65535)","Mô tả ngắn");$dttable->addField("content","text(65535)","Nội dung");$dttable->addField("img","text(65535)","Hình ảnh");$dttable->addField("lib_img","text(65535)","Thư viện ảnh");$dttable->addField("total_time","varchar(255)","Thư viện ảnh");$dttable->addField("parent","int","Danh mục sản phẩm");$dttable->addField("starting_line","int","Danh mục sản phẩm");$dttable->addField("end_line","int","Danh mục sản phẩm");$dttable->addField("departure_time","bigint","Danh mục sản phẩm");$dttable->addField("count","int","Số lượt xem");$dttable->addField("more","text(65535)","Thông số kỹ thuật");$dttable->addField("schedule","text(65535)","Thông số kỹ thuật");$dttable->addField("group_id","int","Mã sản phẩm");$dttable->addField("type_id","int","Mã sản phẩm");$dttable->addField("vehicle","varchar(255)","Mã sản phẩm");$dttable->addField("code","varchar(255)","Mã sản phẩm");$dttable->addField("mode_of_movement","varchar(255)","Mã sản phẩm");$dttable->addField("tag_pro","varchar(255)","tag_pro");$dttable->addField("tour_price_list","text(65535)","Banner");$dttable->addField("info_price_child","text(65535)","Banner");$dttable->addField("price_include","text(65535)","Banner");$dttable->addField("price_notinclude","text(65535)","Banner");$dttable->addField("banner","text(65535)","Banner");$dttable->addField("count_rating","float","count_rating");$dttable->addField("base_onereview","int","base_onereview");$dttable->addField("price","float","price");$dttable->addField("price_sale","float","price_sale");$dttable->addField("sale","tinyint","Sản phẩm khuyến mại");$dttable->addField("hot","tinyint","hot");$dttable->addField("home","tinyint","home");$dttable->addField("act","tinyint","Kích hoạt");$dttable->addField("ord","int","Sắp xếp");$dttable->addField("s_title","varchar(255)","Tiêu đề SEO");$dttable->addField("s_key","text(65535)","s_key");$dttable->addField("s_des","varchar(255)","Mô tả SEO");$dttable->addField("publish_by","varchar(255)","Đăng bởi");$dttable->addField("create_time","bigint","Thời gian tạo");$dttable->addField("update_time","bigint","Ngày sửa");
		$dttable->build();
	}
	private function removeTable(){
		$dttable = new DBTable($this->table);
		$dttable->dropTable();
	}
	private function createModule(){
		$m = new DBTech5sModule($this->table);
		$m->insertGroupModule('Vourcher/Combo',"view/".$this->table,200,'icon-camera',2);
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
				"note"=>"Vourcher/Combo",
				"note_en"=>"Combos",
				"map_table"=>$this->table,
				"table_parent"=>"combo_categories",
				"table_child"=>"",
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