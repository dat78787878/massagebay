<?php
class QuestionsMeta{
	protected $table = "questions";
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
		$dttable->addField("id","int","id");$dttable->addField("name","varchar(255)","Tên câu hỏi");$dttable->addField("slug","varchar(255)","Slug");$dttable->addField("parent","varchar(255)","Danh mục cha");$dttable->addField("short_content","text(65535)","Câu trả lời");$dttable->addField("content","text(65535)","Nội dung");$dttable->addField("img","text(65535)","Hình ảnh");$dttable->addField("lib_img","text(65535)","Thư viện ảnh");$dttable->addField("act","tinyint","Kích hoạt");$dttable->addField("hot","tinyint","Bài viết hot");$dttable->addField("side_bar","tinyint","Hiển thị sidebar");$dttable->addField("ord","int","Sắp xếp");$dttable->addField("place_id","int","Sắp xếp");$dttable->addField("count","int","Số lượt xem");$dttable->addField("publish_by","varchar(255)","Đăng bởi");$dttable->addField("s_title","varchar(255)","Tiêu đề SEO");$dttable->addField("s_des","varchar(255)","Mô tả SEO");$dttable->addField("s_key","varchar(255)","Từ khóa SEO");$dttable->addField("create_time","bigint","Thời gian tạo");$dttable->addField("update_time","bigint","Ngày sửa");
		$dttable->build();
	}
	private function removeTable(){
		$dttable = new DBTable($this->table);
		$dttable->dropTable();
	}
	private function createModule(){
		$m = new DBTech5sModule($this->table);
		$m->insertGroupModule('Câu hỏi thường gặp',"view/".$this->table,191,'icon-camera',2);
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
				"note"=>"Câu hỏi thường gặp",
				"note_en"=>"Questions",
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