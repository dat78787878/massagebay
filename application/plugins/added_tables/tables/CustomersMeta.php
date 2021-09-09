<?php
class CustomersMeta{
	protected $table = "customers";
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
		$dttable->addField("id","int","id");$dttable->addField("name","varchar(255)","Tên hành trình");$dttable->addField("slug","varchar(255)","Slug");$dttable->addField("name_customer","varchar(255)","Tên khách hàng");$dttable->addField("short_content","text(65535)","Phát biểu ngắn");$dttable->addField("content","text(65535)","Nội dung");$dttable->addField("img","text(65535)","Hình ảnh");$dttable->addField("lib_img","text(65535)","Thư viện ảnh");$dttable->addField("name_company","varchar(255)","Tên công ty");$dttable->addField("address","varchar(255)","Địa chỉ khác hàng");$dttable->addField("score_rating","varchar(255)","Điểm đánh giá");$dttable->addField("hot","tinyint","Khách hàng nổi bật");$dttable->addField("act","tinyint","Kích hoạt");$dttable->addField("ord","int","Sắp xếp");$dttable->addField("create_time","bigint","Thời gian tạo");$dttable->addField("update_time","bigint","Ngày sửa");
		$dttable->build();
	}
	private function removeTable(){
		$dttable = new DBTable($this->table);
		$dttable->dropTable();
	}
	private function createModule(){
		$m = new DBTech5sModule($this->table);
		$m->insertGroupModule('Khách hàng',"view/".$this->table,181,'icon-camera',2);
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
				"note"=>"Khách hàng",
				"note_en"=>"Customers",
				"map_table"=>$this->table,
				"table_parent"=>"customer_categories",
				"table_child"=>"",
			]
		);
		$columns = $m->getAllColumns();
		foreach ($columns as $k => $column) {
			if($column['name']=="parent"){
				$column["type"]= "select";
				$column["default_data"] = $m->getDefaultData($column,"customer_categories",0);
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