<?php


namespace FeedBack\Tables;


class Orders{


	use \VthSupport\Traits\Singleton;


	protected $table = 'orders';


	public function install(){


		$this->addTable();


		$this->createModule();


		$this->createTableInfo();


		$this->_createTableOrdersDetails();


	}


	public function uninstall(){


		$this->removeTable();


		$this->removeModule();


		$this->removeTableInfo();


		$this->_dropTableOrdersDetails();


	}


	private function addTable(){


		$dttable = new \DBTable($this->table);


		$dttable->dropTable();


		$dttable->addField("id","int","id");


		$dttable->addField("name","varchar(255)","Tên khách hàng");


		$dttable->addField("email","varchar(255)","Email");


		$dttable->addField("phone","varchar(255)","Số điện thoại");


		$dttable->addField("note","Text(0)","Ghi chú");


		$dttable->addField("create_time","varchar(30)","Ngày tạo");


		$dttable->addField("update_time","varchar(30)","Ngày cập nhật");


		$dttable->addField("other_note","varchar(255)","");


		$dttable->addField("status","varchar(255)","Trạng Thái");


		$dttable->addField("act","tinyint","Kích hoạt");


		$dttable->addField("total","varchar(255)","Tổng tiền");


		$dttable->addField("ord","int","Sắp xếp");


		$dttable->addField("user_id","int(11)","Id khách hàng");


		$dttable->addField("fee_ship","int(11)","Phí ship");


		$dttable->addField("code_order","varchar(255)","Mã đơn hàng");


		$dttable->build();


	}


	private function _createTableOrdersDetails(){


		$dttable = new \DBTable('order_details');


		$dttable->dropTable();


		$dttable->addField("id","int","id");


		$dttable->addField("order_id","int(11)","Id đơn hàng");


		$dttable->addField("pro_id","varchar(255)","Email");


		$dttable->addField("name","varchar(255)","Số điện thoại");


		$dttable->addField("qty","varchar(255)","Số Lượng");


		$dttable->addField("link","varchar(30)","Link");


		$dttable->addField("price","varchar(30)","Giá");


		$dttable->addField("subtotal","varchar(255)","Tổng tiền");


		$dttable->build();


	}


	private function _dropTableOrdersDetails(){


		$dttable = new \DBTable('order_details');


		$dttable->dropTable();


	}


	private function removeTable(){


		$dttable = new \DBTable($this->table);


		$dttable->dropTable();


	}


	private function createModule(){


		$m = new \DBTech5sModule($this->table);


		$m->insertGroupModule($this->table,"view/".$this->table,32,'icon-camera',2);


	}


	private function removeModule(){


		$m = new \DBTech5sModule($this->table);


		$m->removeModule();


	}


	private function createTableInfo(){


		$m = new \DBTech5sTable($this->table);


		$pid = $m->insertNuyTable(


			[


				"name"=>$this->table,


				"note"=>$this->table,


				"note_en"=>"Đơn Hàng",


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


		$m = new \DBTech5sTable($this->table);


		$m->removeTable();


	}


}