<?php
class CouponsMeta{
	protected $table = "coupons";
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
		$dttable->addField("id","int","id");$dttable->addField("name","varchar(255)","Tên ");$dttable->addField("code","varchar(255)","Mã");$dttable->addField("pro_id","varchar(255)","Tour nhận khuyến mãi");$dttable->addField("procate_id","varchar(255)","Danh mục tour được khuyến mãi");$dttable->addField("sale_off","float","Phần trăm khuyến mãi");$dttable->addField("price_off","int","Giá tiền đc giảm");$dttable->addField("from_date","bigint","Từ ngày");$dttable->addField("to_date","bigint","Đến ngày");$dttable->addField("act","tinyint","Kịch hoạt");$dttable->addField("ord","int","Sắp xếp");$dttable->addField("create_time","bigint","Ngày tạo");$dttable->addField("update_time","bigint","Ngày cập nhật");
		$dttable->build();
	}
	private function removeTable(){
		$dttable = new DBTable($this->table);
		$dttable->dropTable();
	}
	private function createModule(){
		$m = new DBTech5sModule($this->table);
		$m->insertGroupModule('Mã giảm giá',"view/".$this->table,178,'icon-camera',2);
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
				"note"=>"Mã giảm giá",
				"note_en"=>"Coupons",
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