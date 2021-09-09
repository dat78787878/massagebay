<?php
class MultiPage extends IPlugin{
	public function install(){
		$this->remove();
		$this->_createTable();
		$this->_createTableAttributes();
	}
	public function uninstall(){
		$this->remove();
	}
	private function remove(){
		$sqls = ["drop table if exists pages","delete from nuy_group_module where name = 'pages'","delete from nuy_table where id = 500","delete from nuy_detail_table where link = 'pages'","delete from nuy_routes where `table` = 'pages'"];
		foreach ($sqls as $k => $sql) {
			$this->CI->db->query($sql);
		}
	}
	private function _createTable(){
		$sql = "
		CREATE TABLE if not exists pages  (
		  `id` int(11) NOT NULL AUTO_INCREMENT COMMENT 'Mã',
		  `name` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NULL DEFAULT NULL COMMENT 'Tên',
		  `slug` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NULL DEFAULT NULL COMMENT 'Slug',
		  `content` text CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NULL COMMENT 'Nội dung',
		  `act` tinyint(1) NULL DEFAULT NULL COMMENT 'Kích hoạt',
		  `img` text CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NULL COMMENT 'Ảnh đại diện',
		  `create_time` int(11) NULL DEFAULT NULL COMMENT 'Thời gian tạo',
		  `update_time` int(11) NULL DEFAULT NULL COMMENT 'Thời gian cập nhật',
		  `ord` int(5) NULL DEFAULT NULL COMMENT 'Sắp xếp',
		  `s_title` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NULL DEFAULT NULL COMMENT 'Tiêu đề SEO',
		  `s_des` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NULL DEFAULT NULL COMMENT 'Mô tả SEO',
		  `s_key` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NULL DEFAULT NULL COMMENT 'Từ khóa SEO',
		  `type` varchar(50) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NULL DEFAULT NULL COMMENT 'Template',
		  PRIMARY KEY (`id`) USING BTREE
		) ENGINE = InnoDB AUTO_INCREMENT = 1 CHARACTER SET = utf8mb4 COLLATE = utf8mb4_unicode_ci ROW_FORMAT = Compact;";
		$this->CI->db->query($sql);
	}
	private function _createTableAttributes(){
		$sqls = ["INSERT INTO `nuy_group_module`( `name`, `note`, `link`, `parent`, `is_server`, `act`, `icon`, `ord`, `note_en`) VALUES ('pages', 'Trang', 'view/pages', 42, 0, 1, NULL, NULL, NULL);",
		"INSERT INTO `nuy_table`(`id`, `name`, `note`, `map_table`, `create_time`, `act`, `pagination`, `table_parent`, `table_child`, `controller`, `rpp_admin`, `rpp_view`, `orient`, `type`, `insert`, `delete`, `edit`, `help`, `search`, `quickpost`, `copy`, `showinmenu`, `dashboard`, `quickaccess`, `ext`, `note_en`) VALUES (500, 'pages', 'Trang', 'pages', 1547534713, 1, 0, '', '', 'pages.view', 10, 10, 1, 1, 1, 1, 1, 1, 1, 0, 1, 0, NULL, NULL, NULL, NULL);",
		"INSERT INTO `nuy_detail_table`(`name`, `required`, `note`, `length`, `type`, `create_time`, `update_time`, `link`, `view`, `editable`, `simple_searchable`, `searchable`, `quickpost`, `is_upload`, `parent`, `default_data`, `region`, `help`, `ord`, `act`, `referer`, `note_en`) VALUES ( 'id', 0, 'Mã', 11, 'PRIMARYKEY', 1450256645, 1450256645, 'pages', 0, 0, 0, 0, 0, 0, 500, NULL, 1, 'Mã', 1, 1, NULL, NULL);",
		"INSERT INTO `nuy_detail_table`(`name`, `required`, `note`, `length`, `type`, `create_time`, `update_time`, `link`, `view`, `editable`, `simple_searchable`, `searchable`, `quickpost`, `is_upload`, `parent`, `default_data`, `region`, `help`, `ord`, `act`, `referer`, `note_en`) VALUES ( 'name', 0, 'Tên', 255, 'TEXT', 1450256645, 1450256645, 'pages', 1, 1, 1, 0, 0, 0, 500, NULL, 1, 'Tên', 2, 1, '[{\n	\"target\": \"this\",\n	\"event\": \"input\",\n	\"function\": \"count\"\n}, {\n	\"target\": \"slug\",\n	\"event\": \"input\",\n	\"function\": \"slug\",\n	\"when\": \"6\"\n}]', NULL);",
		"INSERT INTO `nuy_detail_table`(`name`, `required`, `note`, `length`, `type`, `create_time`, `update_time`, `link`, `view`, `editable`, `simple_searchable`, `searchable`, `quickpost`, `is_upload`, `parent`, `default_data`, `region`, `help`, `ord`, `act`, `referer`, `note_en`) VALUES ('slug', 0, 'Slug', 255, 'TEXT', 1450256645, 1450256645, 'pages', 0, 0, 0, 0, 0, 0, 500, NULL, 1, 'Slug', 3, 1, NULL, NULL);",
		"INSERT INTO `nuy_detail_table`(`name`, `required`, `note`, `length`, `type`, `create_time`, `update_time`, `link`, `view`, `editable`, `simple_searchable`, `searchable`, `quickpost`, `is_upload`, `parent`, `default_data`, `region`, `help`, `ord`, `act`, `referer`, `note_en`) VALUES ('content', 0, 'Nội dung', -1, 'EDITOR', 1450256646, 1450256646, 'pages', 0, 0, 0, 0, 0, 0, 500, NULL, 2, 'Nội dung', 5, 1, NULL, NULL);",
		"INSERT INTO `nuy_detail_table`(`name`, `required`, `note`, `length`, `type`, `create_time`, `update_time`, `link`, `view`, `editable`, `simple_searchable`, `searchable`, `quickpost`, `is_upload`, `parent`, `default_data`, `region`, `help`, `ord`, `act`, `referer`, `note_en`) VALUES ('create_time', 0, 'Ngày tạo', 20, 'DATETIME', 1450256646, 1450256646, 'pages', 1, 0, 0, 0, 0, 0, 500, NULL, 1, 'Thời gian tạo', 98, 1, NULL, NULL);",
		"INSERT INTO `nuy_detail_table`(`name`, `required`, `note`, `length`, `type`, `create_time`, `update_time`, `link`, `view`, `editable`, `simple_searchable`, `searchable`, `quickpost`, `is_upload`, `parent`, `default_data`, `region`, `help`, `ord`, `act`, `referer`, `note_en`) VALUES ( 'update_time', 0, 'Ngày cập nhật', 20, 'DATETIME', 1450256646, 1450256646, 'pages', 1, 0, 0, 0, 0, 0, 500, NULL, 1, 'Thời gian cập nhật', 98, 1, NULL, NULL);",
		"INSERT INTO `nuy_detail_table`(`name`, `required`, `note`, `length`, `type`, `create_time`, `update_time`, `link`, `view`, `editable`, `simple_searchable`, `searchable`, `quickpost`, `is_upload`, `parent`, `default_data`, `region`, `help`, `ord`, `act`, `referer`, `note_en`) VALUES ( 'ord', 0, 'Sắp xếp', 11, 'TEXT', 1450256646, 1450256646, 'pages', 1, 1, 0, 0, 0, 0, 500, NULL, 1, 'Sắp xếp', 7, 1, NULL, NULL);",
		"INSERT INTO `nuy_detail_table`(`name`, `required`, `note`, `length`, `type`, `create_time`, `update_time`, `link`, `view`, `editable`, `simple_searchable`, `searchable`, `quickpost`, `is_upload`, `parent`, `default_data`, `region`, `help`, `ord`, `act`, `referer`, `note_en`) VALUES ('s_title', 0, 'Tiêu đề SEO', 255, 'TEXT', 1450256646, 1450256646, 'pages', 0, 0, 0, 0, 0, 0, 500, NULL, 3, 'Tiêu đề SEO', 9, 1, NULL, NULL);",
		"INSERT INTO `nuy_detail_table`(`name`, `required`, `note`, `length`, `type`, `create_time`, `update_time`, `link`, `view`, `editable`, `simple_searchable`, `searchable`, `quickpost`, `is_upload`, `parent`, `default_data`, `region`, `help`, `ord`, `act`, `referer`, `note_en`) VALUES ('s_des', 0, 'Mô tả SEO', 255, 'TEXTAREA', 1450256646, 1450256646, 'pages', 0, 0, 0, 0, 0, 0, 500, NULL, 3, 'Mô tả SEO', 10, 1, NULL, NULL);",
		"INSERT INTO `nuy_detail_table`(`name`, `required`, `note`, `length`, `type`, `create_time`, `update_time`, `link`, `view`, `editable`, `simple_searchable`, `searchable`, `quickpost`, `is_upload`, `parent`, `default_data`, `region`, `help`, `ord`, `act`, `referer`, `note_en`) VALUES ('s_key', 0, 'Từ khóa SEO', 255, 'TEXTAREA', 1450256646, 1450256646, 'pages', 0, 0, 0, 0, 0, 0, 500, NULL, 3, 'Từ khóa SEO', 11, 1, NULL, NULL);",
		"INSERT INTO `nuy_detail_table`(`name`, `required`, `note`, `length`, `type`, `create_time`, `update_time`, `link`, `view`, `editable`, `simple_searchable`, `searchable`, `quickpost`, `is_upload`, `parent`, `default_data`, `region`, `help`, `ord`, `act`, `referer`, `note_en`) VALUES ('act', 0, 'Kích hoạt', 255, 'CHECKBOX', 1450256646, 1450256646, 'pages', 0, 0, 0, 0, 0, 0, 500, NULL, 1, 'Kích hoạt', 11, 1, NULL, NULL);",
		"INSERT INTO `nuy_detail_table`(`name`, `required`, `note`, `length`, `type`, `create_time`, `update_time`, `link`, `view`, `editable`, `simple_searchable`, `searchable`, `quickpost`, `is_upload`, `parent`, `default_data`, `region`, `help`, `ord`, `act`, `referer`, `note_en`) VALUES ('type', 0, 'Template', 255, 'MULTI_PAGE.TYPE', 1450256646, 1450256646, 'pages', 0, 0, 0, 0, 0, 0, 500, NULL, 1, 'Template', 11, 1, NULL, NULL);",
		"INSERT INTO `nuy_detail_table`(`name`, `required`, `note`, `length`, `type`, `create_time`, `update_time`, `link`, `view`, `editable`, `simple_searchable`, `searchable`, `quickpost`, `is_upload`, `parent`, `default_data`, `region`, `help`, `ord`, `act`, `referer`, `note_en`) VALUES ('img', 0, 'Ảnh', 255, 'IMGV2', 1450256646, 1450256646, 'pages', 0, 0, 0, 0, 0, 0, 500, NULL, 1, 'Ảnh', 11, 1, NULL, NULL);"];
		foreach ($sqls as $k => $sql) {
			$this->CI->db->query($sql);
		}
	}
	public function updateBeforeInsert($args){
		$table = $args['table'];
		$dataUpload = $args['dataUpload'];
		if($table=='pages'){
			$post = [];
			$post['tech5s_controller'] = 'pages.'.$dataUpload['type'];
			return ['post'=>$post];
		}
		return [];
	}
}