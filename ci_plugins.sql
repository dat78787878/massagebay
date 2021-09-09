/*
 Navicat Premium Data Transfer

 Source Server         : localhost
 Source Server Type    : MySQL
 Source Server Version : 50621
 Source Host           : localhost:3306
 Source Schema         : ci_plugins

 Target Server Type    : MySQL
 Target Server Version : 50621
 File Encoding         : 65001

 Date: 20/04/2020 09:47:27
*/

SET NAMES utf8mb4;
SET FOREIGN_KEY_CHECKS = 0;

-- ----------------------------
-- Table structure for configs
-- ----------------------------
DROP TABLE IF EXISTS `configs`;
CREATE TABLE `configs`  (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `keyword` varchar(100) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL,
  `vi_value` text CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NULL,
  `en_value` text CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL,
  `act` tinyint(1) NULL DEFAULT 0,
  `type` varchar(50) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NULL DEFAULT 'TEXT',
  `region` int(11) NULL DEFAULT NULL,
  `note` varchar(50) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NULL DEFAULT NULL,
  `is_delete` tinyint(1) NULL DEFAULT 0,
  `ord` int(10) NULL DEFAULT NULL COMMENT 'Sắp xếp',
  `default_data` text CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NULL,
  `lang` varchar(50) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NULL DEFAULT 'vi',
  PRIMARY KEY (`id`, `keyword`) USING BTREE
) ENGINE = InnoDB AUTO_INCREMENT = 22 CHARACTER SET = utf8mb4 COLLATE = utf8mb4_unicode_ci ROW_FORMAT = COMPRESSED;

-- ----------------------------
-- Records of configs
-- ----------------------------
INSERT INTO `configs` VALUES (1, 'LOGO', '{\"id\":\"2\",\"name\":\"leader.png\",\"title\":\"xinc hào\",\"caption\":\"\",\"alt\":\"\",\"description\":\"\",\"create_time\":\"1574237503\",\"parent\":\"0\",\"is_file\":\"1\",\"path\":\"uploads/\",\"file_name\":\"leader.png\",\"extra\":\"{\\\"extension\\\":\\\"png\\\",\\\"size\\\":\\\"4.42 KB\\\",\\\"date\\\":1574237500,\\\"isfile\\\":1,\\\"dir\\\":\\\"uploads\\\\/\\\",\\\"path\\\":\\\"uploads\\\\/leader.png\\\",\\\"width\\\":128,\\\"height\\\":128,\\\"thumb\\\":\\\"uploads\\\\/thumbs\\\\/def\\\\/leader.png\\\"}\"}', '{\"id\":\"39\",\"name\":\"logo-holding-01-copy.png\",\"title\":null,\"caption\":null,\"alt\":null,\"description\":null,\"create_time\":\"1557541545\",\"parent\":\"38\",\"is_file\":\"1\",\"path\":\"uploads/logos/\",\"file_name\":\"logo-holding-01-copy.png\",\"extra\":\"{\\\"extension\\\":\\\"png\\\",\\\"size\\\":\\\"5.73 KB\\\",\\\"date\\\":1557541545,\\\"isfile\\\":1,\\\"dir\\\":\\\"uploads\\\\/logos\\\\/\\\",\\\"path\\\":\\\"uploads\\\\/logos\\\\/logo-holding-01-copy.png\\\",\\\"width\\\":220,\\\"height\\\":39,\\\"thumb\\\":\\\"uploads\\\\/logos\\\\/thumbs\\\\/def\\\\/logo-holding-01-copy.png\\\"}\"}', 1, 'IMGV2', 1, 'Logo website', 0, 1, NULL, 'vi');
INSERT INTO `configs` VALUES (2, 'FACE', 'https://www.facebook.com/tech5s/', 'https://www.facebook.com/tech5s/', 0, 'TEXT', 9, 'Facebook', 0, NULL, NULL, 'vi');
INSERT INTO `configs` VALUES (3, 'ANALYTICS', '', '', 1, 'TEXT', 1, 'Analytics', 0, NULL, NULL, 'vi');
INSERT INTO `configs` VALUES (4, 'SITE_NAME', 'TECH 5S', 'TECH 5S', 1, 'TEXT', 3, 'Tên website', 0, NULL, NULL, 'vi');
INSERT INTO `configs` VALUES (5, 'TITLE_SEO', 'TECH 5S', 'TECH 5S', 1, 'TEXT', 3, 'Tiêu đề SEO', 0, NULL, NULL, 'vi');
INSERT INTO `configs` VALUES (6, 'DES_SEO', 'TECH 5S', 'TECH 5S', 1, 'TEXTAREA', 3, 'Mô tả SEO', 0, NULL, NULL, 'vi');
INSERT INTO `configs` VALUES (7, 'KEY_SEO', 'TECH 5S', 'TECH 5S', 1, 'TEXTAREA', 3, 'Từ khóa SEO', 0, NULL, NULL, 'vi');
INSERT INTO `configs` VALUES (8, 'FAVICON', '{\"id\":\"27\",\"name\":\"logo.png\",\"title\":null,\"caption\":null,\"alt\":null,\"description\":null,\"create_time\":\"1569984467\",\"parent\":\"0\",\"is_file\":\"1\",\"path\":\"uploads/\",\"file_name\":\"logo.png\",\"extra\":\"{\\\"extension\\\":\\\"png\\\",\\\"size\\\":\\\"18.87 KB\\\",\\\"date\\\":1569984466,\\\"isfile\\\":1,\\\"dir\\\":\\\"uploads\\\\/\\\",\\\"path\\\":\\\"uploads\\\\/logo.png\\\",\\\"width\\\":126,\\\"height\\\":75,\\\"thumb\\\":\\\"uploads\\\\/thumbs\\\\/def\\\\/logo.png\\\"}\"}', '{\"id\":\"40\",\"name\":\"logo-holding-02.png\",\"title\":null,\"caption\":null,\"alt\":null,\"description\":null,\"create_time\":\"1557541590\",\"parent\":\"38\",\"is_file\":\"1\",\"path\":\"uploads/logos/\",\"file_name\":\"logo-holding-02.png\",\"extra\":\"{\\\"extension\\\":\\\"png\\\",\\\"size\\\":\\\"6.54 KB\\\",\\\"date\\\":1557541590,\\\"isfile\\\":1,\\\"dir\\\":\\\"uploads\\\\/logos\\\\/\\\",\\\"path\\\":\\\"uploads\\\\/logos\\\\/logo-holding-02.png\\\",\\\"width\\\":220,\\\"height\\\":220,\\\"thumb\\\":\\\"uploads\\\\/logos\\\\/thumbs\\\\/def\\\\/logo-holding-02.png\\\"}\"}', 1, 'IMGV2', 1, 'Favicon', 0, NULL, NULL, 'vi');
INSERT INTO `configs` VALUES (9, 'WMT', '', '', 1, 'TEXT', 1, 'Web master tool', 0, NULL, NULL, 'vi');
INSERT INTO `configs` VALUES (10, 'CMS_HEADER', '', ' ', 1, 'TEXTAREA', 5, 'Chèn nội dung header', 1, NULL, NULL, 'vi');
INSERT INTO `configs` VALUES (11, 'CMS_FOOTER', '', '', 1, 'TEXTAREA', 5, 'Chèn nội dung footer', 1, NULL, NULL, 'vi');
INSERT INTO `configs` VALUES (12, 'MAIL_USER', 'nguyenvanan9889@gmail.com', 'nguyenvanan9889@gmail.com', 0, 'TEXT', 8, 'Email gửi', 0, 4, NULL, 'vi');
INSERT INTO `configs` VALUES (13, 'MAIL_PASS', 'opuoyqnhefttbvzy', 'opuoyqnhefttbvzy', 0, 'TmailXT', 8, 'Pass mail gửi', 0, 5, NULL, 'vi');
INSERT INTO `configs` VALUES (14, 'MAIL_NAME', 'Tech5s Mailer', 'Tech5s Mailer', 1, 'TEXT', 8, 'Tên mail', 0, 2, NULL, 'vi');
INSERT INTO `configs` VALUES (15, 'MAIL_NHAN', 'nguyenvanan9889@gmail.com', 'nguyenvanan9889@gmail.com', 1, 'TEXT', 8, 'Email nhận thông tin khách hàng gửi', NULL, 3, NULL, 'vi');
INSERT INTO `configs` VALUES (16, 'MAIL_TITLE', 'Thông tin khách hàng', 'Thông tin khách hàng liên hệ', 0, 'TEXT', 8, 'Tiêu đề mail', NULL, 1, NULL, 'vi');
INSERT INTO `configs` VALUES (17, 'GOOGLE_RECAPTCHA_SECRE', '6LcfJi0UAAAAAI8XmyNKbICxAWueNVMLIu-tjr6g', '6LcfJi0UAAAAAI8XmyNKbICxAWueNVMLIusbjr6g', 0, 'TEXT', 9, 'GOOGLE_RECAPTCHA_SECRE', NULL, NULL, NULL, 'vi');
INSERT INTO `configs` VALUES (18, 'GOOGLE_RECAPTCHA_SITE_KEY', '6LcfJi0UAAAAAKcAXvHZFz-r4ENiegF9nIaVxS8J', '6LcfJi0UAAAAAKcAXvHZFz-r4ENiegF9nIaVxS8J', 0, 'TEXT', 9, 'GOOGLE_RECAPTCHA_SITE_KEY', NULL, NULL, NULL, 'vi');
INSERT INTO `configs` VALUES (19, 'FB_APPID', '122108548441536', '122108548441536', 0, 'TEXT', 9, 'Facebook app id', NULL, NULL, NULL, 'vi');
INSERT INTO `configs` VALUES (20, 'FB_APP_SECRET', '1030ca5384804a4be2980ec93f700a97', '1030ca5384804a4be2980ec93f700a97', 0, 'TEXT', 9, 'Facebook app secret', NULL, NULL, NULL, 'vi');
INSERT INTO `configs` VALUES (21, 'FBSHARE', '{\"id\":\"2\",\"name\":\"leader.png\",\"title\":\"xinc hào\",\"caption\":\"\",\"alt\":\"\",\"description\":\"\",\"create_time\":\"1574237503\",\"parent\":\"0\",\"is_file\":\"1\",\"path\":\"uploads/\",\"file_name\":\"leader.png\",\"extra\":\"{\\\"extension\\\":\\\"png\\\",\\\"size\\\":\\\"4.42 KB\\\",\\\"date\\\":1574237500,\\\"isfile\\\":1,\\\"dir\\\":\\\"uploads\\\\/\\\",\\\"path\\\":\\\"uploads\\\\/leader.png\\\",\\\"width\\\":128,\\\"height\\\":128,\\\"thumb\\\":\\\"uploads\\\\/thumbs\\\\/def\\\\/leader.png\\\"}\"}', '{\"id\":\"39\",\"name\":\"logo-holding-01-copy.png\",\"title\":null,\"caption\":null,\"alt\":null,\"description\":null,\"create_time\":\"1557541545\",\"parent\":\"38\",\"is_file\":\"1\",\"path\":\"uploads/logos/\",\"file_name\":\"logo-holding-01-copy.png\",\"extra\":\"{\\\"extension\\\":\\\"png\\\",\\\"size\\\":\\\"5.73 KB\\\",\\\"date\\\":1557541545,\\\"isfile\\\":1,\\\"dir\\\":\\\"uploads\\\\/logos\\\\/\\\",\\\"path\\\":\\\"uploads\\\\/logos\\\\/logo-holding-01-copy.png\\\",\\\"width\\\":220,\\\"height\\\":39,\\\"thumb\\\":\\\"uploads\\\\/logos\\\\/thumbs\\\\/def\\\\/logo-holding-01-copy.png\\\"}\"}', 1, 'IMGV2', 1, 'Ảnh Share Facebook', 0, 1, NULL, 'vi');

-- ----------------------------
-- Table structure for group_menu
-- ----------------------------
DROP TABLE IF EXISTS `group_menu`;
CREATE TABLE `group_menu`  (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `name` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NULL DEFAULT NULL,
  PRIMARY KEY (`id`) USING BTREE
) ENGINE = InnoDB AUTO_INCREMENT = 1 CHARACTER SET = utf8mb4 COLLATE = utf8mb4_unicode_ci ROW_FORMAT = COMPRESSED;

-- ----------------------------
-- Table structure for languages
-- ----------------------------
DROP TABLE IF EXISTS `languages`;
CREATE TABLE `languages`  (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `keyword` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NULL DEFAULT NULL,
  `vi_value` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NULL DEFAULT NULL,
  `en_value` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL,
  `note` text CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NULL,
  PRIMARY KEY (`id`) USING BTREE
) ENGINE = InnoDB AUTO_INCREMENT = 112 CHARACTER SET = utf8mb4 COLLATE = utf8mb4_unicode_ci ROW_FORMAT = COMPRESSED;

-- ----------------------------
-- Records of languages
-- ----------------------------
INSERT INTO `languages` VALUES (9, 'PAGINATION_LAST_LINK', 'Trang cuối', 'Last page', NULL);
INSERT INTO `languages` VALUES (10, 'PAGINATION_NEXT_LINK', '	›', '	›', NULL);
INSERT INTO `languages` VALUES (11, 'PAGINATION_PREV_LINK', '‹', '‹', NULL);
INSERT INTO `languages` VALUES (12, 'PAGINATION_FIRST_LINK', 'Trang nhất', 'First page', NULL);
INSERT INTO `languages` VALUES (111, 'HOME', 'Trang chủ', 'Home', NULL);

-- ----------------------------
-- Table structure for medias
-- ----------------------------
DROP TABLE IF EXISTS `medias`;
CREATE TABLE `medias`  (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `name` varchar(500) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NULL DEFAULT NULL,
  `title` varchar(500) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NULL DEFAULT NULL,
  `caption` varchar(500) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NULL DEFAULT NULL,
  `alt` varchar(500) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NULL DEFAULT NULL,
  `description` varchar(500) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NULL DEFAULT NULL,
  `create_time` bigint(20) NULL DEFAULT NULL,
  `parent` int(11) NULL DEFAULT NULL,
  `is_file` tinyint(1) NULL DEFAULT NULL,
  `path` varchar(1000) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NULL DEFAULT NULL,
  `file_name` varchar(500) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NULL DEFAULT NULL,
  `extra` text CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NULL,
  `trash` tinyint(1) NULL DEFAULT 0,
  PRIMARY KEY (`id`) USING BTREE,
  INDEX `id_parent`(`parent`) USING BTREE
) ENGINE = InnoDB AUTO_INCREMENT = 1 CHARACTER SET = utf8mb4 COLLATE = utf8mb4_unicode_ci ROW_FORMAT = COMPRESSED;

-- ----------------------------
-- Table structure for menu
-- ----------------------------
DROP TABLE IF EXISTS `menu`;
CREATE TABLE `menu`  (
  `id` int(11) NOT NULL AUTO_INCREMENT COMMENT 'Mã',
  `name` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NULL DEFAULT NULL COMMENT 'Tên',
  `link` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NULL DEFAULT NULL COMMENT 'Link',
  `clazz` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NULL DEFAULT NULL COMMENT 'Class Css',
  `img` varchar(1000) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NULL DEFAULT NULL,
  `icon` text CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL COMMENT 'Icon menu',
  `parent` int(11) NULL DEFAULT NULL COMMENT 'Cha',
  `ord` int(11) NULL DEFAULT NULL COMMENT 'Sắp xếp',
  `note` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NULL DEFAULT NULL COMMENT 'Title',
  `group_id` int(11) NULL DEFAULT NULL COMMENT 'Nhóm',
  `act` int(11) NOT NULL,
  `hot` tinyint(2) NULL DEFAULT NULL,
  `nofollow` tinyint(1) NULL DEFAULT NULL COMMENT 'Nofflow',
  PRIMARY KEY (`id`) USING BTREE
) ENGINE = InnoDB AUTO_INCREMENT = 1 CHARACTER SET = utf8mb4 COLLATE = utf8mb4_unicode_ci COMMENT = 'Menu' ROW_FORMAT = COMPRESSED;

-- ----------------------------
-- Table structure for news
-- ----------------------------
DROP TABLE IF EXISTS `news`;
CREATE TABLE `news`  (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `name` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NULL DEFAULT NULL COMMENT 'Tên bài viết',
  `slug` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NULL DEFAULT NULL COMMENT 'Slug',
  `short_content` text CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NULL COMMENT 'Mô tả ngắn',
  `content` text CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NULL COMMENT 'Nội dung',
  `img` text CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NULL COMMENT 'Hình ảnh',
  `lib_img` text CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NULL COMMENT 'Thư viện ảnh',
  `parent` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NULL DEFAULT NULL COMMENT 'Danh mục bài viết',
  `create_time` bigint(20) NULL DEFAULT NULL COMMENT 'Thời gian tạo',
  `act` tinyint(4) NULL DEFAULT NULL COMMENT 'Kích hoạt',
  `hot` tinyint(4) NULL DEFAULT 0 COMMENT 'Bài viết hot',
  `ord` int(11) NULL DEFAULT NULL COMMENT 'Sắp xếp',
  `tag` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NULL DEFAULT NULL,
  `count` int(11) NULL DEFAULT NULL COMMENT 'Số lượt xem',
  `publish_by` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NULL DEFAULT NULL COMMENT 'Đăng bởi',
  `s_title` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NULL DEFAULT NULL COMMENT 'Tiêu đề SEO',
  `s_des` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NULL DEFAULT NULL COMMENT 'Mô tả SEO',
  `s_key` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NULL DEFAULT NULL COMMENT 'Từ khóa SEO',
  `home` tinyint(4) NOT NULL,
  `update_time` bigint(20) NULL DEFAULT NULL COMMENT 'Ngày sửa',
  `nofollow` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NULL DEFAULT NULL COMMENT 'Donofollow',
  `custom_wp` text CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NULL COMMENT 'Custom wp',
  `noindex` tinyint(1) NULL DEFAULT NULL COMMENT 'Noindex',
  `banner` text CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NULL COMMENT 'Banner',
  `position` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NULL DEFAULT NULL COMMENT 'Vị trí hiển thị',
  PRIMARY KEY (`id`) USING BTREE,
  INDEX `idx_hot`(`hot`) USING BTREE,
  INDEX `idx_act`(`act`) USING BTREE,
  INDEX `create_time`(`create_time`) USING BTREE,
  FULLTEXT INDEX `fulltext`(`name`, `short_content`, `content`),
  FULLTEXT INDEX `name`(`name`),
  FULLTEXT INDEX `short_content`(`short_content`)
) ENGINE = MyISAM AUTO_INCREMENT = 1 CHARACTER SET = utf8mb4 COLLATE = utf8mb4_unicode_ci ROW_FORMAT = Dynamic;

-- ----------------------------
-- Table structure for news_categories
-- ----------------------------
DROP TABLE IF EXISTS `news_categories`;
CREATE TABLE `news_categories`  (
  `id` int(11) NOT NULL AUTO_INCREMENT COMMENT 'Mã',
  `name` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NULL DEFAULT NULL COMMENT 'Tên',
  `slug` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NULL DEFAULT NULL COMMENT 'Slug',
  `img` text CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NULL COMMENT 'Hình ảnh',
  `short_content` text CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NULL COMMENT 'Mô tả ngắn',
  `content` text CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NULL COMMENT 'Nội dung',
  `create_time` bigint(20) NULL DEFAULT NULL COMMENT 'Thời gian tạo',
  `ord` int(11) NULL DEFAULT NULL COMMENT 'Sắp xếp',
  `parent` int(11) NULL DEFAULT 0 COMMENT 'Danh mục cha',
  `act` tinyint(4) NOT NULL,
  `hot` tinyint(1) NULL DEFAULT 0,
  `s_title` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NULL DEFAULT NULL COMMENT 'Tiêu đề SEO',
  `s_des` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NULL DEFAULT NULL COMMENT 'Mô tả SEO',
  `s_key` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NULL DEFAULT NULL COMMENT 'Từ khóa SEO',
  `count` int(11) NULL DEFAULT NULL COMMENT 'Số lượng xem',
  `home` tinyint(1) NOT NULL,
  `update_time` bigint(20) NULL DEFAULT NULL COMMENT 'Ngày sửa',
  `nofollow` tinyint(1) NULL DEFAULT NULL COMMENT 'Nofollow',
  `noindex` tinyint(20) NULL DEFAULT NULL COMMENT 'No index',
  PRIMARY KEY (`id`) USING BTREE
) ENGINE = InnoDB AUTO_INCREMENT = 1 CHARACTER SET = utf8mb4 COLLATE = utf8mb4_unicode_ci ROW_FORMAT = COMPRESSED;

-- ----------------------------
-- Table structure for nuy_config
-- ----------------------------
DROP TABLE IF EXISTS `nuy_config`;
CREATE TABLE `nuy_config`  (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `name` varchar(100) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL,
  `value` text CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NULL,
  `note` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NULL DEFAULT NULL,
  PRIMARY KEY (`id`, `name`) USING BTREE
) ENGINE = InnoDB AUTO_INCREMENT = 8 CHARACTER SET = utf8mb4 COLLATE = utf8mb4_unicode_ci ROW_FORMAT = COMPRESSED;

-- ----------------------------
-- Records of nuy_config
-- ----------------------------
INSERT INTO `nuy_config` VALUES (1, 'URL_EXT', NULL, 'The extension of the link');
INSERT INTO `nuy_config` VALUES (2, 'AFTER_SUCCESS', '1', 'After successful');
INSERT INTO `nuy_config` VALUES (3, 'DIALOG_TIMEOUT', '3', 'Timeout dialog time notification');
INSERT INTO `nuy_config` VALUES (4, 'TIMECACHE', '1', 'Web cache time (cache database - cache view)');
INSERT INTO `nuy_config` VALUES (5, 'HEIGHT_IMAGE', '120', 'Photo height');
INSERT INTO `nuy_config` VALUES (6, 'WIDTH_IMAGE', '150', 'Image width');
INSERT INTO `nuy_config` VALUES (7, 'SIZE_IMAGE', '[{\r\n		\"name\": \"150x150\",\r\n		\"width\": \"150\",\r\n		\"height\": \"0\",\r\n		\"quality\": 90\r\n	}, \r\n	{\r\n		\"name\": \"300x0\",\r\n		\"width\": \"300\",\r\n		\"height\": \"0\",\r\n		\"quality\": 90\r\n	},\r\n	{\r\n		\"name\": \"768x0\",\r\n		\"width\": \"768\",\r\n		\"height\": \"0\",\r\n		\"quality\": 90\r\n	},\r\n	{\r\n		\"name\": \"1024x0\",\r\n		\"width\": \"1024\",\r\n		\"height\": \"0\",\r\n		\"quality\": 90\r\n	},\r\n	{\r\n		\"name\": \"204x0\",\r\n		\"width\": \"204\",\r\n		\"height\": \"0\",\r\n		\"quality\": 90\r\n	}\r\n]', 'Size photo');

-- ----------------------------
-- Table structure for nuy_detail_region
-- ----------------------------
DROP TABLE IF EXISTS `nuy_detail_region`;
CREATE TABLE `nuy_detail_region`  (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `name` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NULL DEFAULT NULL,
  `name_en` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NULL DEFAULT NULL,
  PRIMARY KEY (`id`) USING BTREE
) ENGINE = InnoDB AUTO_INCREMENT = 20 CHARACTER SET = utf8mb4 COLLATE = utf8mb4_unicode_ci COMMENT = 'Chức năng tab' ROW_FORMAT = COMPRESSED;

-- ----------------------------
-- Records of nuy_detail_region
-- ----------------------------
INSERT INTO `nuy_detail_region` VALUES (1, 'Thông tin', 'Information ');
INSERT INTO `nuy_detail_region` VALUES (2, 'Khác', 'Other information');
INSERT INTO `nuy_detail_region` VALUES (3, 'Cấu hình SEO', 'SEO configuration');
INSERT INTO `nuy_detail_region` VALUES (5, 'Cấu hình hiển thị', 'Configuration display');
INSERT INTO `nuy_detail_region` VALUES (6, 'Thông tin liên hệ', 'Contact Info');
INSERT INTO `nuy_detail_region` VALUES (8, 'Cấu hình Email', 'Email Configuration');
INSERT INTO `nuy_detail_region` VALUES (9, 'Mạng xã hội', 'Social Network');
INSERT INTO `nuy_detail_region` VALUES (14, 'Donofollow', 'Donofollow');
INSERT INTO `nuy_detail_region` VALUES (15, 'Nofollow', 'Nofollow');
INSERT INTO `nuy_detail_region` VALUES (16, 'Banner và tiêu đề', 'Banner & title all page');
INSERT INTO `nuy_detail_region` VALUES (17, 'Trang chủ', 'Home page');
INSERT INTO `nuy_detail_region` VALUES (18, 'Trang giới thiệu', 'Page introduction');
INSERT INTO `nuy_detail_region` VALUES (19, 'Trang Liên hệ', 'Contact page');

-- ----------------------------
-- Table structure for nuy_detail_table
-- ----------------------------
DROP TABLE IF EXISTS `nuy_detail_table`;
CREATE TABLE `nuy_detail_table`  (
  `id` int(11) NOT NULL AUTO_INCREMENT COMMENT 'Mã',
  `name` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NULL DEFAULT NULL COMMENT 'Tên',
  `required` tinyint(11) NULL DEFAULT NULL COMMENT 'Bắt buộc',
  `note` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NULL DEFAULT NULL COMMENT 'Ghi chú',
  `length` int(11) NULL DEFAULT NULL COMMENT 'Độ dài',
  `type` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NULL DEFAULT NULL COMMENT 'Loại control textbox, selectbox...',
  `create_time` bigint(20) NULL DEFAULT NULL COMMENT 'Thời gian tạo',
  `update_time` bigint(20) NULL DEFAULT NULL COMMENT 'Thời gian update',
  `link` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NULL DEFAULT NULL COMMENT 'Tên bảng ',
  `view` tinyint(11) NULL DEFAULT 0 COMMENT 'Hiển thị',
  `editable` tinyint(11) NULL DEFAULT 0 COMMENT 'Sửa nhanh',
  `simple_searchable` tinyint(4) NULL DEFAULT 0 COMMENT 'Tìm kiếm cơ bản',
  `searchable` tinyint(4) NULL DEFAULT 0 COMMENT 'Tìm kiếm nâng cao',
  `quickpost` tinyint(4) NULL DEFAULT 0 COMMENT 'Đăng nhanh',
  `is_upload` tinyint(4) NULL DEFAULT 0 COMMENT 'Có thể Upload',
  `parent` int(11) NULL DEFAULT NULL COMMENT 'Bảng cha',
  `default_data` text CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NULL COMMENT 'Cấu hình dữ liệu',
  `region` tinyint(11) NULL DEFAULT NULL COMMENT 'Vùng chọn',
  `help` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NULL DEFAULT NULL COMMENT 'Trợ giúp',
  `ord` int(11) NULL DEFAULT 0 COMMENT 'Thứ tự hiển thị',
  `act` tinyint(4) NULL DEFAULT 1 COMMENT 'Hiển thị trong quản trị',
  `referer` text CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NULL COMMENT 'Cấu hình trường',
  `note_en` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NULL DEFAULT NULL,
  PRIMARY KEY (`id`) USING BTREE,
  INDEX `idx_parent`(`parent`) USING BTREE,
  INDEX `idx_type`(`type`(191)) USING BTREE,
  INDEX `idx_view`(`view`) USING BTREE
) ENGINE = InnoDB AUTO_INCREMENT = 3174 CHARACTER SET = utf8mb4 COLLATE = utf8mb4_unicode_ci COMMENT = 'Chi tiết bảng' ROW_FORMAT = COMPRESSED;

-- ----------------------------
-- Records of nuy_detail_table
-- ----------------------------
INSERT INTO `nuy_detail_table` VALUES (369, 'id', 0, 'id', 11, 'PRIMARYKEY', 1449740743, 1449740743, 'nuy_user', 0, 0, 0, 0, 0, 0, 10, NULL, 1, 'id', 1, 1, NULL, 'id');
INSERT INTO `nuy_detail_table` VALUES (370, 'username', 0, 'username', 255, 'TEXT', 1449740743, 1449740743, 'nuy_user', 1, 0, 0, 0, 0, 0, 10, NULL, 1, 'username', 2, 1, NULL, 'username');
INSERT INTO `nuy_detail_table` VALUES (371, 'password', 0, 'password', 255, 'PASSWORD', 1449740743, 1449740743, 'nuy_user', 0, 0, 0, 0, 0, 0, 10, NULL, 1, 'password', 3, 1, NULL, 'password');
INSERT INTO `nuy_detail_table` VALUES (372, 'act', 0, 'act', 11, 'CHECKBOX', 1449740743, 1449740743, 'nuy_user', 1, 1, 0, 0, 0, 0, 10, NULL, 1, 'act', 4, 1, NULL, 'act');
INSERT INTO `nuy_detail_table` VALUES (373, 'create_time', 0, 'create_time', 20, 'DATETIME', 1449740743, 1449740743, 'nuy_user', 0, 0, 0, 0, 0, 0, 10, NULL, 1, 'create_time', 5, 1, NULL, 'create_time');
INSERT INTO `nuy_detail_table` VALUES (374, 'note', 0, 'note', 255, 'TEXTAREA', 1449740743, 1449740743, 'nuy_user', 0, 0, 0, 0, 0, 0, 10, NULL, 1, 'note', 6, 1, NULL, 'note');
INSERT INTO `nuy_detail_table` VALUES (375, 'parent', 0, 'parent', 11, 'SELECT', 1449740743, 1449740743, 'nuy_user', 0, 0, 0, 0, 0, 0, 10, '{\n \"data\": {\n  \"source\": \"database\",\n  \"value\": {\n   \"table\": \"nuy_group_user\",\n   \"select\": \"id,name\",\n   \"field\": \"parent\",\n   \"base_field\": \"idd\",\n   \"field_value\": \"-1\",\n   \"where\": [{\n    \"1\": \"1\"\n   }]\n  }\n },\n \"config\": {\n  \"searchbox\": 1\n }\n}', 1, 'parent', 7, 1, '', 'parent');
INSERT INTO `nuy_detail_table` VALUES (376, 'email', 0, 'Email', 255, 'TEXT', 1449740743, 1449740743, 'nuy_user', 1, 0, 0, 0, 0, 0, 10, NULL, 1, 'email', 8, 1, NULL, 'email (enter correct email so that the administrator password will be sent to this email later)');
INSERT INTO `nuy_detail_table` VALUES (377, 'id', 0, 'Mã', 11, 'PRIMARYKEY', 1450256645, 1450256645, 'news_categories', 0, 0, 0, 0, 0, 0, 12, NULL, 1, 'Mã', 1, 1, NULL, 'Code');
INSERT INTO `nuy_detail_table` VALUES (378, 'name', 0, 'Tên', 255, 'TEXT', 1450256645, 1450256645, 'news_categories', 1, 1, 1, 0, 0, 0, 12, NULL, 1, 'Tên', 2, 1, '[{\n	\"target\": \"this\",\n	\"event\": \"input\",\n	\"function\": \"count\"\n}, {\n	\"target\": \"slug\",\n	\"event\": \"input\",\n	\"function\": \"slug\",\n	\"when\": \"6\"\n}]', 'Name(vn)');
INSERT INTO `nuy_detail_table` VALUES (379, 'slug', 0, 'Slug', 255, 'TEXT', 1450256645, 1450256645, 'news_categories', 1, 1, 0, 0, 0, 0, 12, NULL, 1, 'Slug', 3, 1, NULL, 'Slug');
INSERT INTO `nuy_detail_table` VALUES (380, 'short_content', 0, 'Mô tả ngắn', -1, 'EDITOR', 1450256645, 1450256645, 'news_categories', 0, 0, 0, 0, 0, 0, 12, NULL, 2, 'Mô tả ngắn', 4, 0, NULL, 'Description of the list item');
INSERT INTO `nuy_detail_table` VALUES (381, 'content', 0, 'Nội dung', -1, 'EDITOR', 1450256646, 1450256646, 'news_categories', 0, 0, 0, 0, 0, 0, 12, NULL, 2, 'Nội dung', 5, 0, NULL, 'Category description');
INSERT INTO `nuy_detail_table` VALUES (382, 'create_time', 0, 'Thời gian tạo', 20, 'DATETIME', 1450256646, 1450256646, 'news_categories', 1, 0, 0, 0, 0, 0, 12, NULL, 1, 'Thời gian tạo', 98, 1, NULL, 'Date created');
INSERT INTO `nuy_detail_table` VALUES (383, 'ord', 0, 'Sắp xếp', 11, 'TEXT', 1450256646, 1450256646, 'news_categories', 1, 1, 0, 0, 0, 0, 12, NULL, 1, 'Sắp xếp', 7, 1, NULL, 'Sort');
INSERT INTO `nuy_detail_table` VALUES (384, 'parent', 0, 'Danh mục cha', 11, 'SELECT', 1450256646, 1450256646, 'news_categories', 1, 0, 0, 0, 0, 0, 12, '{\n \"data\": {\n  \"source\": \"database\",\n  \"value\": {\n   \"table\": \"news_categories\",\n   \"select\": \"id,name\",\n   \"field\": \"parent\",\n   \"base_field\": \"id\",\n   \"field_value\": 0\n  }\n },\n \"config\": {\n  \"searchbox\": 1\n }\n}', 1, 'Danh mục cha', 8, 1, '', 'Categories');
INSERT INTO `nuy_detail_table` VALUES (385, 's_title', 0, 'Tiêu đề SEO', 255, 'TEXT', 1450256646, 1450256646, 'news_categories', 0, 0, 0, 0, 0, 0, 12, NULL, 3, 'Tiêu đề SEO', 9, 1, NULL, 'Seo title (vn)');
INSERT INTO `nuy_detail_table` VALUES (386, 's_des', 0, 'Mô tả SEO', 255, 'TEXTAREA', 1450256646, 1450256646, 'news_categories', 0, 0, 0, 0, 0, 0, 12, NULL, 3, 'Mô tả SEO', 10, 1, NULL, 'Seo description (vn)');
INSERT INTO `nuy_detail_table` VALUES (387, 's_key', 0, 'Từ khóa SEO', 255, 'TEXTAREA', 1450256646, 1450256646, 'news_categories', 0, 0, 0, 0, 0, 0, 12, NULL, 3, 'Từ khóa SEO', 11, 1, NULL, 'Seo keywords (vn)');
INSERT INTO `nuy_detail_table` VALUES (388, 'count', 0, 'Lượt xem', 11, 'TEXT', 1450256646, 1450256646, 'news_categories', 0, 0, 0, 0, 0, 0, 12, NULL, 1, 'Số lượng xem', 12, 0, NULL, 'View Count');
INSERT INTO `nuy_detail_table` VALUES (389, 'id', 0, 'Mã', 11, 'PRIMARYKEY', 1450257045, 1450257045, 'nuy_group_user', 0, 0, 0, 0, 0, 0, 13, NULL, 1, 'Mã nhóm', 1, 1, NULL, 'Code');
INSERT INTO `nuy_detail_table` VALUES (390, 'name', 0, 'Tên', 255, 'TEXT', 1450257045, 1450257045, 'nuy_group_user', 1, 0, 0, 0, 0, 0, 13, NULL, 1, 'Tên nhóm', 2, 1, NULL, 'Name');
INSERT INTO `nuy_detail_table` VALUES (391, 'note', 0, 'Ghi chú', 255, 'TEXT', 1450257045, 1450257045, 'nuy_group_user', 0, 0, 0, 0, 0, 0, 13, NULL, 1, 'Ghi chú', 3, 1, NULL, 'Note');
INSERT INTO `nuy_detail_table` VALUES (392, 'parent', 0, 'Cha', 11, 'SELECT', 1450257045, 1450257045, 'nuy_group_user', 1, 0, 0, 0, 0, 0, 13, '{\n \"data\": {\n  \"source\": \"database\",\n  \"value\": {\n   \"table\": \"nuy_group_user\",\n   \"select\": \"id,name\",\n   \"field\": \"parent\",\n   \"base_field\": \"id\",\n   \"field_value\": 0\n  }\n },\n \"config\": {\n  \"searchbox\": 1\n }\n}', 1, 'Cha', 4, 1, '', 'Parent');
INSERT INTO `nuy_detail_table` VALUES (393, 'act', 0, 'Kích hoạt', 4, 'CHECKBOX', 1450257045, 1450257045, 'nuy_group_user', 1, 1, 0, 0, 0, 0, 13, NULL, 1, 'act', 5, 1, NULL, 'Ative');
INSERT INTO `nuy_detail_table` VALUES (394, 'id', 0, 'Mã', 11, 'PRIMARYKEY', 1450257089, 1450257089, 'nuy_group_module', 0, 0, 0, 0, 0, 0, 14, NULL, 1, 'Mã nhóm', 1, 1, NULL, 'ID');
INSERT INTO `nuy_detail_table` VALUES (395, 'name', 0, 'Tên', 255, 'TEXT', 1450257089, 1450257089, 'nuy_group_module', 1, 0, 0, 0, 0, 0, 14, NULL, 1, 'Tên nhóm', 2, 1, NULL, 'Name');
INSERT INTO `nuy_detail_table` VALUES (396, 'note', 0, 'Ghi chú', 255, 'TEXT', 1450257089, 1450257089, 'nuy_group_module', 0, 0, 0, 0, 0, 0, 14, NULL, 1, 'Ghi chú', 3, 1, NULL, 'Note');
INSERT INTO `nuy_detail_table` VALUES (397, 'link', 0, 'Link', 255, 'TEXT', 1450257089, 1450257089, 'nuy_group_module', 0, 0, 0, 0, 0, 0, 14, NULL, 1, 'Đường dẫn', 3, 1, NULL, 'Link');
INSERT INTO `nuy_detail_table` VALUES (398, 'parent', 0, 'Cha', 11, 'SELECT', 1450257089, 1450257089, 'nuy_group_module', 0, 0, 0, 0, 0, 0, 14, '{\n \"data\": {\n  \"source\": \"database\",\n  \"value\": {\n   \"table\": \"nuy_group_module\",\n   \"select\": \"id,name\",\n   \"field\": \"parent\",\n   \"base_field\": \"idd\",\n   \"field_value\": \"-1\",\n   \"where\": [{\n    \"parent\": \"0\"\n   }]\n  }\n },\n \"config\": {\n  \"searchbox\": 1\n }\n}', 1, 'Cha', 5, 1, '', 'Parent');
INSERT INTO `nuy_detail_table` VALUES (399, 'is_server', 0, 'Is Server', 4, 'CHECKBOX', 1450257089, 1450257089, 'nuy_group_module', 0, 0, 0, 0, 0, 0, 14, NULL, 1, 'Dùng cho đăng nhập bằng tài khoản hệ thống', 6, 1, NULL, 'Used for logging in with the system account');
INSERT INTO `nuy_detail_table` VALUES (400, 'act', 0, 'Kích hoạt', 4, 'CHECKBOX', 1450257089, 1450257089, 'nuy_group_module', 1, 0, 0, 0, 0, 0, 14, NULL, 1, 'act', 7, 1, NULL, 'Active');
INSERT INTO `nuy_detail_table` VALUES (401, 'icon', 0, 'Icon', 255, 'TEXT', 1450257089, 1450257089, 'nuy_group_module', 0, 0, 0, 0, 0, 0, 14, NULL, 1, 'icon', 8, 1, NULL, 'Icon');
INSERT INTO `nuy_detail_table` VALUES (402, 'id', 0, 'Mã', 11, 'TEXT', 1450257107, 1450257107, 'nuy_role', 0, 0, 0, 0, 0, 0, 15, NULL, 1, 'Mã quyền', 1, 1, NULL, 'ID');
INSERT INTO `nuy_detail_table` VALUES (403, 'group_module_id', 0, 'Nhóm tính năng', 11, 'TEXT', 1450257107, 1450257107, 'nuy_role', 0, 0, 0, 0, 0, 0, 15, NULL, 1, 'Mã nhóm chức năng', 2, 1, NULL, 'Functional group code');
INSERT INTO `nuy_detail_table` VALUES (404, 'group_user_id', 0, 'Nhóm người dùng', 11, 'TEXT', 1450257107, 1450257107, 'nuy_role', 0, 0, 0, 0, 0, 0, 15, NULL, 1, 'Mã nhóm người dùng', 3, 1, NULL, 'User group code');
INSERT INTO `nuy_detail_table` VALUES (405, 'role', 0, 'Quyền', 11, 'TEXT', 1450257107, 1450257107, 'nuy_role', 0, 0, 0, 0, 0, 0, 15, NULL, 1, 'Quyền', 4, 1, NULL, 'Permission');
INSERT INTO `nuy_detail_table` VALUES (413, 'id', 0, 'Mã', 11, 'PRIMARYKEY', 1450257634, 1450257634, 'nuy_detail_table', 0, 0, 0, 0, 0, 0, 17, NULL, 1, 'Mã', 1, 1, NULL, 'Code');
INSERT INTO `nuy_detail_table` VALUES (414, 'name', 0, 'Tên', 255, 'TEXT', 1450257634, 1450257634, 'nuy_detail_table', 1, 1, 1, 0, 0, 0, 17, NULL, 1, 'Tên', 2, 1, NULL, 'Name(vn)');
INSERT INTO `nuy_detail_table` VALUES (415, 'required', 0, 'Bắt buộc', 11, 'CHECKBOX', 1450257634, 1450257634, 'nuy_detail_table', 0, 0, 0, 0, 0, 0, 17, NULL, 1, 'Bắt buộc', 3, 1, NULL, 'Obligatory');
INSERT INTO `nuy_detail_table` VALUES (416, 'note', 0, 'Ghi chú', 255, 'TEXT', 1450257634, 1450257634, 'nuy_detail_table', 1, 1, 1, 0, 0, 0, 17, NULL, 1, 'Ghi chú', 4, 1, NULL, 'Note');
INSERT INTO `nuy_detail_table` VALUES (417, 'length', 0, 'Độ dài', 11, 'TEXT', 1450257634, 1450257634, 'nuy_detail_table', 0, 0, 0, 0, 0, 0, 17, NULL, 1, 'Độ dài', 5, 1, NULL, 'Length');
INSERT INTO `nuy_detail_table` VALUES (418, 'type', 0, 'Type control textbox, selectbox ...', 255, 'SELECT', 1450257634, 1510824058, 'nuy_detail_table', 1, 1, 0, 0, 0, 0, 17, '{\r\n	\"data\": {\r\n		\"source\": \"static\",\r\n		\"value\": [{\r\n				\"PRIMARYKEY\": \"Khóa chính\"\r\n			}, {\r\n				\"TEXT\": \"Textbox\"\r\n			}, {\r\n				\"CHECKBOX\": \"Checkbox\"\r\n			}, {\r\n				\"DATETIME\": \"Ngày/Tháng\"\r\n			}, {\r\n				\"EDITOR\": \"HTML Editor\"\r\n			}, {\r\n				\"EDITOR_SMALL\": \"HTML Editor small\"\r\n			}, {\r\n				\"FILE\": \"Browse File\"\r\n			},	{\r\n				\"FILEV2\": \"Browse File V2\"\r\n			}, {\r\n				\"HIDE\": \"Trường ẩn\"\r\n			}, {\r\n				\"IMAGE\": \"Hình ảnh\"\r\n			}, {\r\n				\"LIB_IMG\": \"Thư viện ảnh\"\r\n			}, {\r\n				\"MULTISELECT\": \"Multi Selectbox\"\r\n			}, {\r\n				\"PASSWORD\": \"Mật khẩu\"\r\n			}, {\r\n				\"SELECT\": \"Select box\"\r\n			}, {\r\n				\"TEXTAREA\": \"Textarea - Khung text lớn\"\r\n			}, {\r\n				\"CHOOSELINK\": \"Lựa chọn link menu\"\r\n			}, {\r\n				\"IMGV2\": \"Hình ảnh version 2\"\r\n			}, {\r\n				\"LIBIMGV2\": \"Thư viện ảnh version 2\"\r\n			}, {\r\n				\"MULTISELECTAJAX\": \"MULTISELECTAJAX\"\r\n			}, {\r\n				\"SELECTAJAX\": \"SELECTAJAX\"\r\n			}, {\r\n				\"TAG\": \"Tags\"\r\n			}\r\n\r\n		]\r\n	},\r\n	\"config\": {\r\n		\"type\": \"simple\",\r\n		\"searchbox\": 0\r\n	}\r\n\r\n}', 1, 'Loại control textbox, selectbox...', 6, 1, '', 'Type control textbox, selectbox ...');
INSERT INTO `nuy_detail_table` VALUES (419, 'create_time', 0, 'Thời gian tạo', 20, 'DATETIME', 1450257634, 1450257634, 'nuy_detail_table', 0, 0, 0, 0, 0, 0, 17, NULL, 1, 'Thời gian tạo', 98, 1, NULL, 'Creation time');
INSERT INTO `nuy_detail_table` VALUES (420, 'update_time', 0, 'Thời gian cập nhật', 20, 'DATETIME', 1450257634, 1450257634, 'nuy_detail_table', 0, 0, 0, 0, 0, 0, 17, NULL, 1, 'Thời gian update', 99, 1, NULL, 'Update time');
INSERT INTO `nuy_detail_table` VALUES (421, 'link', 0, 'Table name', 255, 'TEXT', 1450257634, 1450257634, 'nuy_detail_table', 0, 0, 0, 0, 0, 0, 17, NULL, 1, 'Tên bảng ', 9, 1, NULL, 'Table name');
INSERT INTO `nuy_detail_table` VALUES (422, 'view', 0, 'Hiển thị', 11, 'CHECKBOX', 1450257634, 1450257634, 'nuy_detail_table', 1, 1, 0, 0, 0, 0, 17, NULL, 1, 'Hiển thị', 10, 1, NULL, 'Display');
INSERT INTO `nuy_detail_table` VALUES (423, 'editable', 0, 'Sửa nhanh', 11, 'CHECKBOX', 1450257634, 1450257634, 'nuy_detail_table', 1, 1, 0, 0, 0, 0, 17, NULL, 1, 'Sửa nhanh', 11, 1, NULL, 'Quick fix');
INSERT INTO `nuy_detail_table` VALUES (424, 'simple_searchable', 0, 'Tìm cơ bản', 4, 'CHECKBOX', 1450257634, 1450257634, 'nuy_detail_table', 1, 1, 0, 0, 0, 0, 17, NULL, 1, 'Tìm kiếm cơ bản', 12, 1, NULL, 'Basic search');
INSERT INTO `nuy_detail_table` VALUES (425, 'searchable', 0, 'Tìm nâng cao', 4, 'CHECKBOX', 1450257634, 1450257634, 'nuy_detail_table', 1, 1, 0, 0, 0, 0, 17, NULL, 1, 'Tìm kiếm nâng cao', 13, 1, NULL, 'Advanced search');
INSERT INTO `nuy_detail_table` VALUES (426, 'quickpost', 0, 'Đăng nhanh', 4, 'CHECKBOX', 1450257634, 1450257634, 'nuy_detail_table', 1, 1, 0, 0, 0, 0, 17, NULL, 1, 'Đăng nhanh', 14, 1, NULL, 'Post fast');
INSERT INTO `nuy_detail_table` VALUES (427, 'is_upload', 0, 'Can Upload', 4, 'CHECKBOX', 1450257634, 1450257634, 'nuy_detail_table', 1, 1, 0, 0, 0, 0, 17, NULL, 1, 'Có thể Upload', 15, 1, NULL, 'Can Upload');
INSERT INTO `nuy_detail_table` VALUES (428, 'parent', 0, 'Parent table', 11, 'SELECT', 1450257634, 1450257634, 'nuy_detail_table', 1, 0, 1, 0, 0, 0, 17, '{\n	\"data\": {\n		\"source\": \"database\",\n		\"value\": {\n			\"table\": \"nuy_table\",\n			\"select\": \"id,name\",\n			\"field\": \"parent\",\n			\"base_field\": \"idd\",\n			\"field_value\": \"-1\"\n		}\n	},\n	\"config\": {\n		\"searchbox\": 1\n	}\n}', 1, 'Bảng cha', 16, 1, NULL, 'Parent table');
INSERT INTO `nuy_detail_table` VALUES (429, 'default_data', 0, 'Data configuration', -1, 'TEXTAREA', 1450257634, 1450257634, 'nuy_detail_table', 0, 0, 0, 0, 0, 0, 17, NULL, 1, 'Cấu hình dữ liệu', 17, 1, NULL, 'Data configuration');
INSERT INTO `nuy_detail_table` VALUES (430, 'region', 0, 'Selection area', 11, 'SELECT', 1450257634, 1450257634, 'nuy_detail_table', 1, 1, 0, 0, 0, 0, 17, '{\n	\"data\": {\n		\"source\": \"database\",\n		\"value\": {\n			\"table\": \"nuy_detail_region\",\n			\"select\": \"id,name\",\n			\"field\": \"parent\",\n			\"base_field\": \"idd\",\n			\"field_value\": \"-1\"\n		}\n	},\n	\"config\": {\n		\"searchbox\": 1,\n		\"type\": \"simple\"\n	}\n}', 1, 'Vùng chọn', 18, 1, NULL, 'Selection area');
INSERT INTO `nuy_detail_table` VALUES (431, 'help', 0, 'Help', 255, 'TEXT', 1450257634, 1450257634, 'nuy_detail_table', 0, 0, 0, 0, 0, 0, 17, NULL, 1, 'Trợ giúp', 19, 1, NULL, 'Help');
INSERT INTO `nuy_detail_table` VALUES (432, 'ord', 0, 'Order of display', 11, 'TEXT', 1450257634, 1450257634, 'nuy_detail_table', 1, 1, 0, 0, 0, 0, 17, NULL, 1, 'Thứ tự hiển thị', 20, 1, NULL, 'Order of display');
INSERT INTO `nuy_detail_table` VALUES (433, 'act', 0, 'Show in admin', 4, 'CHECKBOX', 1450257634, 1450257634, 'nuy_detail_table', 1, 1, 0, 0, 0, 0, 17, NULL, 1, 'Hiển thị trong quản trị', 21, 1, NULL, 'Show in admin');
INSERT INTO `nuy_detail_table` VALUES (434, 'referer', 0, 'Field configuration', -1, 'TEXTAREA', 1450257634, 1450257634, 'nuy_detail_table', 0, 0, 0, 0, 0, 0, 17, NULL, 1, 'Cấu hình trường', 22, 1, NULL, 'Field configuration');
INSERT INTO `nuy_detail_table` VALUES (481, 'id', 0, 'id', 11, 'PRIMARYKEY', 1450285088, 1450285088, 'nuy_table', 0, 0, 0, 0, 0, 0, 20, NULL, 1, 'id', 1, 1, NULL, 'id');
INSERT INTO `nuy_detail_table` VALUES (482, 'name', 0, 'Name(vn)', 255, 'TEXT', 1450285088, 1450285088, 'nuy_table', 1, 0, 0, 0, 0, 0, 20, NULL, 1, 'Tên', 2, 1, NULL, 'Name(vn)');
INSERT INTO `nuy_detail_table` VALUES (483, 'note', 0, 'Note', 255, 'TEXT', 1450285088, 1450285088, 'nuy_table', 1, 0, 0, 0, 0, 0, 20, NULL, 1, 'Ghi chú', 3, 1, NULL, 'Note');
INSERT INTO `nuy_detail_table` VALUES (484, 'map_table', 0, 'Associated table', 255, 'TEXT', 1450285088, 1450285088, 'nuy_table', 0, 0, 0, 0, 0, 0, 20, NULL, 1, 'Bảng liên kết', 4, 1, NULL, 'Associated table');
INSERT INTO `nuy_detail_table` VALUES (485, 'create_time', 0, 'Thời gian tạo', 20, 'TEXT', 1450285088, 1450285088, 'nuy_table', 0, 0, 0, 0, 0, 0, 20, NULL, 1, 'Thời gian tạo', 98, 1, NULL, 'Creation time');
INSERT INTO `nuy_detail_table` VALUES (486, 'act', 0, 'Kích hoạt', 4, 'CHECKBOX', 1450285088, 1450285088, 'nuy_table', 1, 1, 0, 0, 0, 0, 20, NULL, 1, 'Kích hoạt', 6, 1, NULL, 'Activated');
INSERT INTO `nuy_detail_table` VALUES (487, 'pagination', 0, 'Phân trang', 4, 'TEXT', 1450285088, 1450285088, 'nuy_table', 0, 0, 0, 0, 0, 0, 20, NULL, 1, 'Phân trang (Frontend)', 7, 1, NULL, 'Pagination (Frontend)');
INSERT INTO `nuy_detail_table` VALUES (488, 'table_parent', 0, 'Bảng cha', 255, 'TEXT', 1450285088, 1450285088, 'nuy_table', 0, 0, 0, 0, 0, 0, 20, NULL, 1, 'Bảng cha', 8, 1, NULL, 'Parent table');
INSERT INTO `nuy_detail_table` VALUES (489, 'table_child', 0, 'Bảng con', 255, 'TEXT', 1450285088, 1450285088, 'nuy_table', 0, 0, 0, 0, 0, 0, 20, NULL, 1, 'Bảng con', 9, 1, NULL, 'Small board');
INSERT INTO `nuy_detail_table` VALUES (490, 'controller', 0, 'Controller', 255, 'TEXT', 1450285088, 1450285088, 'nuy_table', 0, 0, 0, 0, 0, 0, 20, NULL, 1, 'Controller', 10, 1, NULL, 'Controller');
INSERT INTO `nuy_detail_table` VALUES (491, 'rpp_admin', 0, 'Number of records / 1 admin page', 11, 'TEXT', 1450285088, 1450285088, 'nuy_table', 0, 0, 0, 0, 0, 0, 20, NULL, 1, 'Số bản ghi/1 trang admin', 11, 1, NULL, 'Number of records / 1 admin page');
INSERT INTO `nuy_detail_table` VALUES (492, 'rpp_view', 0, 'Number of records per frontend page', 11, 'TEXT', 1450285088, 1450285088, 'nuy_table', 0, 0, 0, 0, 0, 0, 20, NULL, 1, 'Số bản ghi/1 trang frontend', 12, 1, NULL, 'Number of records per frontend page');
INSERT INTO `nuy_detail_table` VALUES (493, 'orient', 0, 'Afternoon display board', 11, 'TEXT', 1450285088, 1450285088, 'nuy_table', 0, 0, 0, 0, 0, 0, 20, NULL, 1, 'Chiều hiển thị bảng', 13, 1, NULL, 'Afternoon display board');
INSERT INTO `nuy_detail_table` VALUES (494, 'type', 0, 'Table type', 11, 'SELECT', 1450285088, 1450285088, 'nuy_table', 1, 1, 0, 0, 0, 0, 20, '{\n	\"data\": {\n		\"source\": \"static\",\n		\"value\": [{\n				\"1\": \"Hiển thị chuẩn\"\n			}, {\n				\"2\": \"Dạng configs\"\n			}, {\n				\"3\": \"Dạng Menu kéo thả\"\n			}, {\n				\"4\": \"Dạng Phân quyền\"\n			}, {\n				\"6\": \"Dạng danh mục (danh mục tin)\"\n			}\n\n		]\n	},\n	\"config\": {\n		\"type\": \"simple\",\n		\"searchbox\": 0\n	}\n\n}', 1, 'Loại bảng', 14, 1, '', 'Table type');
INSERT INTO `nuy_detail_table` VALUES (495, 'insert', 0, 'There are more new', 4, 'CHECKBOX', 1450285088, 1450285088, 'nuy_table', 1, 1, 0, 0, 0, 0, 20, NULL, 1, 'insert', 15, 1, NULL, 'There are more new');
INSERT INTO `nuy_detail_table` VALUES (496, 'delete', 0, 'There delete', 4, 'CHECKBOX', 1450285088, 1450285088, 'nuy_table', 1, 1, 0, 0, 0, 0, 20, NULL, 1, 'delete', 16, 1, NULL, 'There delete');
INSERT INTO `nuy_detail_table` VALUES (497, 'edit', 0, 'There corrected', 4, 'CHECKBOX', 1450285088, 1450285088, 'nuy_table', 1, 1, 0, 0, 0, 0, 20, NULL, 1, 'edit', 17, 1, NULL, 'There corrected');
INSERT INTO `nuy_detail_table` VALUES (498, 'help', 0, 'There is help', 4, 'CHECKBOX', 1450285088, 1450285088, 'nuy_table', 1, 1, 0, 0, 0, 0, 20, NULL, 1, 'help', 18, 1, NULL, 'There is help');
INSERT INTO `nuy_detail_table` VALUES (499, 'search', 0, 'There is a search', 4, 'CHECKBOX', 1450285088, 1450285088, 'nuy_table', 1, 1, 0, 0, 0, 0, 20, NULL, 1, 'search', 19, 1, NULL, 'There is a search');
INSERT INTO `nuy_detail_table` VALUES (500, 'copy', 0, 'There is Copy', 4, 'CHECKBOX', 1450285088, 1450285088, 'nuy_table', 1, 1, 0, 0, 0, 0, 20, NULL, 1, 'copy', 20, 1, NULL, 'There is Copy');
INSERT INTO `nuy_detail_table` VALUES (501, 'showinmenu', 0, 'Show in menu selection', 4, 'CHECKBOX', 1450285088, 1450285088, 'nuy_table', 1, 1, 0, 0, 0, 0, 20, NULL, 1, 'showinmenu', 21, 1, NULL, 'Show in menu selection');
INSERT INTO `nuy_detail_table` VALUES (502, 'dashboard', 0, 'Show Homepage Admin value', 4, 'CHECKBOX', 1450285088, 1450285088, 'nuy_table', 1, 1, 0, 0, 0, 0, 20, NULL, 1, 'dashboard', 22, 1, NULL, 'Show Homepage Admin value');
INSERT INTO `nuy_detail_table` VALUES (503, 'quickaccess', 0, 'Show quick access', 4, 'CHECKBOX', 1450285088, 1450285088, 'nuy_table', 1, 1, 0, 0, 0, 0, 20, NULL, 1, 'quickaccess', 23, 1, NULL, 'Show quick access');
INSERT INTO `nuy_detail_table` VALUES (504, 'id', 0, 'Mã', 11, 'PRIMARYKEY', 1450317412, 1450317412, 'configs', 0, 0, 0, 0, 0, 0, 21, NULL, 1, 'id', 1, 1, NULL, 'Code');
INSERT INTO `nuy_detail_table` VALUES (505, 'keyword', 0, 'Từ khóa', 255, 'TEXT', 1450317412, 1450317412, 'configs', 0, 0, 0, 0, 0, 0, 21, NULL, 1, 'keyword', 2, 1, NULL, 'Keywords (No correction)');
INSERT INTO `nuy_detail_table` VALUES (507, 'vi_value', 0, 'Giá trị', 255, 'TEXT', 1450317412, 1450317412, 'configs', 1, 0, 0, 0, 0, 0, 21, NULL, 1, 'vi_value', 4, 1, NULL, 'Value (vn)');
INSERT INTO `nuy_detail_table` VALUES (508, 'act', 0, 'Kích hoạt', 4, 'CHECKBOX', 1450317412, 1450317412, 'configs', 0, 0, 0, 0, 0, 0, 21, NULL, 1, 'act', 5, 1, NULL, 'Activated');
INSERT INTO `nuy_detail_table` VALUES (509, 'type', 0, 'Loại', 255, 'SELECT', 1450317412, 1450317412, 'configs', 0, 0, 0, 0, 0, 0, 21, NULL, 1, 'type', 6, 1, NULL, 'Control type');
INSERT INTO `nuy_detail_table` VALUES (510, 'region', 0, 'Vùng', 11, 'SELECT', 1450317412, 1450317412, 'configs', 0, 0, 0, 0, 0, 0, 21, NULL, 1, 'region', 7, 1, NULL, 'Display tab');
INSERT INTO `nuy_detail_table` VALUES (511, 'note', 0, 'Ghi chú', 255, 'TEXT', 1450317412, 1450317412, 'configs', 1, 0, 0, 0, 0, 0, 21, NULL, 1, 'note', 8, 1, NULL, 'Note');
INSERT INTO `nuy_detail_table` VALUES (512, 'is_delete', 0, 'Có thể xóa', 4, 'CHECKBOX', 1450317412, 1450317412, 'configs', 0, 0, 0, 0, 0, 0, 21, NULL, 1, 'is_delete', 9, 1, NULL, 'Can not delete');
INSERT INTO `nuy_detail_table` VALUES (513, 'id', 0, 'Mã', 11, 'PRIMARYKEY', 1450318317, 1450318317, 'menu', 1, 0, 0, 0, 0, 0, 22, NULL, 1, 'Mã', 1, 1, NULL, 'Code');
INSERT INTO `nuy_detail_table` VALUES (514, 'name', 0, 'Tên', 255, 'TEXT', 1450318317, 1450318317, 'menu', 1, 1, 1, 0, 0, 0, 22, '', 1, 'Tên', 2, 1, '[\n    {\n        \"target\": \"this\",\n        \"event\": \"input\",\n        \"function\": \"count\"\n    },{\n        \"target\": \"this\",\n        \"event\": \"input\",\n        \"function\": \"preview\"\n    },\n    {\n        \"target\": \"slug\",\n        \"event\": \"input\",\n        \"function\": \"slug\",\n        \"when\": \"6\"\n    }\n]', 'Name(vn)');
INSERT INTO `nuy_detail_table` VALUES (515, 'link', 0, 'Link', 255, 'CHOOSELINK', 1450318317, 1450318317, 'menu', 1, 1, 0, 0, 0, 0, 22, NULL, 1, 'Link', 3, 1, NULL, 'Link');
INSERT INTO `nuy_detail_table` VALUES (516, 'clazz', 0, 'Class Css', 255, 'TEXT', 1450318317, 1450318317, 'menu', 0, 0, 0, 0, 0, 0, 22, NULL, 1, 'Class', 4, 0, NULL, 'Class Css');
INSERT INTO `nuy_detail_table` VALUES (517, 'parent', 0, 'Cha', 11, 'SELECT', 1450318317, 1450318317, 'menu', 1, 0, 0, 0, 0, 0, 22, '{\n	\"data\": {\n		\"source\": \"database\",\n		\"value\": {\n			\"table\": \"menu\",\n			\"select\": \"id,name\",\n			\"field\": \"parent\",\n			\"base_field\": \"id\",\n			\"field_value\": 0,\n			\"where\": [{\n				\"1\": \"1\"\n			}]\n		}\n	},\n	\"config\": {\n		\"searchbox\": 1\n	}\n}', 1, 'Cha', 5, 1, '', 'Dad');
INSERT INTO `nuy_detail_table` VALUES (518, 'ord', 0, 'Sắp xếp', 11, 'TEXT', 1450318317, 1450318317, 'menu', 1, 1, 0, 0, 0, 0, 22, NULL, 1, 'Sắp xếp', 6, 1, NULL, 'Sort');
INSERT INTO `nuy_detail_table` VALUES (519, 'note', 0, 'Tiêu đề', 255, 'TEXT', 1450318317, 1450318317, 'menu', 0, 1, 0, 0, 0, 0, 22, NULL, 1, 'note', 7, 0, NULL, 'Title');
INSERT INTO `nuy_detail_table` VALUES (520, 'group_id', 0, 'Nhóm', 11, 'SELECT', 1450318317, 1450318317, 'menu', 1, 0, 0, 0, 0, 0, 22, '{\n	\"data\": {\n		\"source\": \"database\",\n		\"value\": {\n			\"table\": \"group_menu\",\n			\"select\": \"id,name\",\n			\"field\": \"parentd\",\n			\"base_field\": \"idd\",\n			\"field_value\": \"-1\",\n			\"where\": [{\n				\"1\": \"1\"\n			}]\n		}\n	},\n	\"config\": {\n		\"searchbox\": 1\n	}\n}', 1, 'Nhóm', 8, 1, '', 'Group');
INSERT INTO `nuy_detail_table` VALUES (521, 'img', 0, 'Banner', -1, 'IMGV2', 1450256645, 1450256645, 'news_categories', 1, 0, 0, 0, 0, 0, 12, NULL, 1, 'Hình ảnh', 4, 1, NULL, 'Banner catalog');
INSERT INTO `nuy_detail_table` VALUES (522, 'id', 0, 'Mã', 11, 'PRIMARYKEY', 1450342344, 1450342344, 'news', 0, 0, 0, 0, 0, 0, 23, NULL, 1, 'id', 1, 1, NULL, 'Code');
INSERT INTO `nuy_detail_table` VALUES (523, 'name', 0, 'Tên', 255, 'TEXT', 1450342344, 1450342344, 'news', 0, 1, 1, 1, 1, 0, 23, '', 1, 'Tên bài viết', 2, 1, '[{\n	\"target\": \"this\",\n	\"event\": \"input\",\n	\"function\": \"count\"\n}, {\n	\"target\": \"slug\",\n	\"event\": \"input\",\n	\"function\": \"slug\",\n	\"when\": \"6\"\n}]', 'Name of the article (vn)');
INSERT INTO `nuy_detail_table` VALUES (524, 'slug', 0, 'Slug', 255, 'TEXT', 1450342344, 1450342344, 'news', 1, 1, 0, 0, 1, 0, 23, NULL, 1, 'Slug', 3, 1, NULL, 'Slug');
INSERT INTO `nuy_detail_table` VALUES (525, 'short_content', 0, 'Mô tả ngắn', -1, 'TEXTAREA', 1450342344, 1450342344, 'news', 0, 0, 0, 0, 0, 0, 23, NULL, 2, 'Mô tả ngắn', 0, 1, NULL, 'Short description');
INSERT INTO `nuy_detail_table` VALUES (526, 'content', 0, 'Nội dung', -1, 'EDITOR', 1450342344, 1450342344, 'news', 0, 0, 0, 0, 0, 0, 23, NULL, 2, 'Nội dung', 2, 1, NULL, 'content');
INSERT INTO `nuy_detail_table` VALUES (527, 'img', 0, 'Ảnh', 255, 'IMGV2', 1450342344, 1450342344, 'news', 1, 0, 0, 0, 0, 1, 23, NULL, 1, 'Hình ảnh', 6, 1, NULL, 'Picture');
INSERT INTO `nuy_detail_table` VALUES (528, 'lib_img', 0, 'Thư viện ảnh', -1, 'IMGV2', 1450342344, 1450342344, 'news', 0, 0, 0, 0, 0, 1, 23, NULL, 1, 'Thư viện ảnh', 7, 0, NULL, 'Header photo');
INSERT INTO `nuy_detail_table` VALUES (529, 'parent', 0, 'Danh mục', 255, 'MULTISELECT', 1450342344, 1450342344, 'news', 0, 0, 0, 0, 0, 0, 23, '{\n	\"data\": {\n		\"source\": \"database\",\n		\"value\": {\n			\"table\": \"news_categories\",\n			\"select\": \"id,name\",\n			\"field\": \"parent\",\n			\"base_field\": \"id\",\n			\"field_value\": 0,\n			\"where\": [{\n				\"1\": \"1\"\n			}]\n		}\n	},\n	\"config\": {\n		\"searchbox\": 1,\n		\"multiplie\": 0\n	}\n}', 1, 'Danh mục bài viết', 8, 1, '', 'List of articles');
INSERT INTO `nuy_detail_table` VALUES (530, 'create_time', 0, 'Thời gian tạo', 20, 'DATETIME', 1450342344, 1450342344, 'news', 0, 1, 0, 0, 0, 0, 23, NULL, 1, 'Thời gian tạo', 98, 1, NULL, 'Date created');
INSERT INTO `nuy_detail_table` VALUES (531, 'act', 0, 'Kích hoạt', 4, 'CHECKBOX', 1450342344, 1450342344, 'news', 1, 1, 0, 0, 0, 0, 23, NULL, 1, 'Kích hoạt', 10, 1, NULL, 'Activated');
INSERT INTO `nuy_detail_table` VALUES (532, 'hot', 0, 'Tin nóng', 4, 'CHECKBOX', 1450342344, 1509499877, 'news', 1, 1, 0, 0, 0, 0, 23, '', 1, 'Bài học vip', 11, 1, '', 'Hot news');
INSERT INTO `nuy_detail_table` VALUES (533, 'ord', 0, 'Sắp xếp', 11, 'TEXT', 1450342344, 1450342344, 'news', 0, 1, 0, 0, 0, 0, 23, NULL, 1, 'Sắp xếp', 18, 1, NULL, 'Sort');
INSERT INTO `nuy_detail_table` VALUES (534, 'count', 0, 'Lượt xem', 11, 'TEXT', 1450342344, 1450342344, 'news', 0, 0, 0, 0, 0, 0, 23, NULL, 2, 'Số lượt xem', 13, 1, NULL, 'Number of views');
INSERT INTO `nuy_detail_table` VALUES (535, 'publish_by', 0, 'Đăng bởi', 255, 'TEXT', 1450342344, 1450342344, 'news', 0, 0, 0, 0, 0, 0, 23, '{\n	\"data\": {\n		\"source\": \"php\",\n		\"value\": \"@$this->session->userdata(\'userdata\')[\'user\'][\'username\']?$this->session->userdata(\'userdata\')[\'user\'][\'username\']:\'\';\"\n	}\n}', 2, 'Đăng bởi', 14, 1, NULL, 'Posted by');
INSERT INTO `nuy_detail_table` VALUES (536, 's_title', 0, 'Tiêu đề SEO', 255, 'TEXT', 1450342344, 1450342344, 'news', 0, 0, 0, 0, 0, 0, 23, NULL, 3, 'Tiêu đề SEO', 15, 1, NULL, 'Seo title (vn)');
INSERT INTO `nuy_detail_table` VALUES (537, 's_des', 0, 'Mô tả SEO', 255, 'TEXTAREA', 1450342344, 1450342344, 'news', 0, 0, 0, 0, 0, 0, 23, NULL, 3, 'Mô tả SEO', 16, 1, NULL, 'Seo description (vn)');
INSERT INTO `nuy_detail_table` VALUES (538, 's_key', 0, 'Từ khóa SEO', 255, 'TEXTAREA', 1450342344, 1450342344, 'news', 0, 0, 0, 0, 0, 0, 23, NULL, 3, 'Từ khóa SEO', 17, 1, NULL, 'Seo key word (vn)');
INSERT INTO `nuy_detail_table` VALUES (539, 'id', 0, 'Mã', 11, 'PRIMARYKEY', 1450492626, 1450492626, 'nuy_config', 0, 0, 0, 0, 0, 0, 24, NULL, 1, 'id', 1, 1, NULL, 'id');
INSERT INTO `nuy_detail_table` VALUES (540, 'name', 0, 'Tên', 255, 'TEXT', 1450492626, 1450492626, 'nuy_config', 0, 0, 0, 0, 0, 0, 24, NULL, 2, 'name', 2, 1, NULL, 'Name(vn)');
INSERT INTO `nuy_detail_table` VALUES (541, 'value', 0, 'Giá trị', 255, 'TEXT', 1450492626, 1450492626, 'nuy_config', 1, 0, 0, 0, 0, 0, 24, NULL, 1, 'value', 3, 1, NULL, 'value');
INSERT INTO `nuy_detail_table` VALUES (542, 'note', 0, 'Ghi chú', 255, 'TEXT', 1450492626, 1450492626, 'nuy_config', 1, 0, 0, 0, 0, 0, 24, NULL, 1, 'note', 1, 1, NULL, 'note');
INSERT INTO `nuy_detail_table` VALUES (543, 'id', 0, 'Mã', 11, 'PRIMARYKEY', 1450493467, 1450493467, 'pro', 1, 0, 0, 0, 0, 0, 25, NULL, 1, 'id', 1, 1, NULL, 'id');
INSERT INTO `nuy_detail_table` VALUES (544, 'name', 0, 'Tên', 255, 'TEXT', 1450493467, 1450493467, 'pro', 1, 1, 1, 0, 1, 0, 25, '', 1, 'Tên sản phẩm', 1, 1, '', 'Name(vn)');
INSERT INTO `nuy_detail_table` VALUES (545, 'slug', 0, 'Slug', 255, 'TEXT', 1450493467, 1450493467, 'pro', 1, 1, 0, 0, 0, 0, 25, NULL, 1, 'Slug', 3, 1, NULL, 'Slug');
INSERT INTO `nuy_detail_table` VALUES (546, 'short_content', 0, 'Mô tả ngắn', -1, 'TEXTAREA', 1450493467, 1450493467, 'pro', 0, 0, 0, 0, 0, 0, 25, NULL, 2, 'Mô tả ngắn', 1, 1, NULL, 'Short content (vn)');
INSERT INTO `nuy_detail_table` VALUES (547, 'content', 0, 'Nội dung', -1, 'EDITOR', 1450493467, 1450493467, 'pro', 0, 0, 0, 0, 0, 0, 25, '', 2, 'Bạn sẽ học được gì', 4, 1, '', 'Technical specification (vn)');
INSERT INTO `nuy_detail_table` VALUES (548, 'img', 0, 'Ảnh', 255, 'IMGV2', 1450493467, 1450493467, 'pro', 1, 0, 0, 0, 0, 1, 25, NULL, 1, 'Hình ảnh', 6, 1, NULL, 'Picture');
INSERT INTO `nuy_detail_table` VALUES (549, 'lib_img', 0, 'Thư viện ảnh', -1, 'LIBIMGV2', 1450493467, 1450493467, 'pro', 0, 0, 0, 0, 0, 0, 25, NULL, 1, 'Thư viện ảnh', 7, 0, NULL, 'Photo library');
INSERT INTO `nuy_detail_table` VALUES (550, 'parent', 0, 'Danh mục', 255, 'MULTISELECT', 1450493467, 1450493467, 'pro', 1, 0, 1, 0, 1, 0, 25, '{\r\n	\"data\": {\r\n		\"source\": \"database\",\r\n		\"value\": {\r\n			\"table\": \"pro_categories\",\r\n			\"select\": \"id,name\",\r\n			\"field\": \"parent\",\r\n			\"base_field\": \"id\",\r\n			\"field_value\": 0,\r\n			\"where\": [{\r\n				\"1\": \"1\"\r\n			}]\r\n		}\r\n	},\r\n	\"config\": {\r\n		\"searchbox\": 1,\r\n		\"multiplie\": 0\r\n	}\r\n}', 1, 'Danh mục sản phẩm', 8, 1, '', 'Father list');
INSERT INTO `nuy_detail_table` VALUES (551, 'create_time', 0, 'Thời gian tạo', 20, 'DATETIME', 1450493467, 1450493467, 'pro', 0, 0, 0, 0, 0, 0, 25, NULL, 1, 'Thời gian tạo', 98, 1, NULL, 'Date created');
INSERT INTO `nuy_detail_table` VALUES (552, 'act', 0, 'Kích hoạt', 4, 'CHECKBOX', 1450493467, 1450493467, 'pro', 1, 1, 0, 0, 0, 0, 25, NULL, 1, 'Kích hoạt', 20, 1, NULL, 'Activated');
INSERT INTO `nuy_detail_table` VALUES (554, 'ord', 0, 'Sắp xếp', 11, 'TEXT', 1450493467, 1450493467, 'pro', 1, 1, 0, 0, 0, 0, 25, NULL, 1, 'Sắp xếp', 19, 1, NULL, 'Sort');
INSERT INTO `nuy_detail_table` VALUES (555, 'count', 0, 'Lượt xem', 11, 'TEXT', 1450493467, 1450493467, 'pro', 0, 0, 0, 0, 0, 0, 25, NULL, 2, 'Số lượt xem', 13, 0, NULL, 'Number of views');
INSERT INTO `nuy_detail_table` VALUES (556, 'publish_by', 0, 'Đăng bởi', 255, 'TEXT', 1450493467, 1450493467, 'pro', 0, 0, 0, 0, 0, 0, 25, '{\n	\"data\": {\n		\"source\": \"php\",\n		\"value\": \"@$this->session->userdata(\'userdata\')[\'user\'][\'username\']?$this->session->userdata(\'userdata\')[\'user\'][\'username\']:\'\';\"\n	}\n}', 2, 'Đăng bởi', 14, 0, NULL, 'Posted by');
INSERT INTO `nuy_detail_table` VALUES (557, 's_title', 0, 'Tiêu đê SEO', 255, 'TEXT', 1450493467, 1450493467, 'pro', 0, 0, 0, 0, 0, 0, 25, NULL, 3, 'Tiêu đề SEO', 15, 1, NULL, 'Seo title (vn)');
INSERT INTO `nuy_detail_table` VALUES (558, 's_des', 0, 'Mô tả SEO', 255, 'TEXTAREA', 1450493467, 1450493467, 'pro', 0, 0, 0, 0, 0, 0, 25, NULL, 3, 'Mô tả SEO', 16, 1, NULL, 'Seo description (vn)');
INSERT INTO `nuy_detail_table` VALUES (559, 's_key', 0, 'Từ khóa SEO', 255, 'TEXTAREA', 1450493467, 1450493467, 'pro', 0, 0, 0, 0, 0, 0, 25, NULL, 3, 'Từ khóa SEO', 17, 1, NULL, 'Seo key word (vn)');
INSERT INTO `nuy_detail_table` VALUES (560, 'id', 0, 'Mã', 11, 'PRIMARYKEY', 1450493507, 1450493507, 'pro_categories', 0, 0, 0, 0, 0, 0, 26, NULL, 1, 'Mã', 1, 1, NULL, 'Code');
INSERT INTO `nuy_detail_table` VALUES (561, 'name', 0, 'Tên', 255, 'TEXT', 1450493507, 1450493507, 'pro_categories', 1, 1, 1, 0, 0, 0, 26, NULL, 1, 'Tên', 1, 1, '[\n    {\n        \"target\": \"this\",\n        \"event\": \"input\",\n        \"function\": \"count\"\n    },\n    {\n        \"target\": \"slug\",\n        \"event\": \"input\",\n        \"function\": \"slug\",\n        \"when\": \"6\"\n    }\n]', 'Name(vn)');
INSERT INTO `nuy_detail_table` VALUES (562, 'slug', 0, 'Slug', 255, 'TEXT', 1450493507, 1450493507, 'pro_categories', 1, 1, 0, 0, 0, 0, 26, NULL, 1, 'Slug', 3, 1, NULL, 'Slug');
INSERT INTO `nuy_detail_table` VALUES (563, 'img', 0, 'Ảnh', 255, 'IMGV2', 1450493507, 1450493507, 'pro_categories', 1, 0, 0, 0, 0, 0, 26, NULL, 1, 'Hình ảnh', 5, 1, NULL, 'Photo category');
INSERT INTO `nuy_detail_table` VALUES (564, 'short_content', 0, 'Mô tả ngắn', -1, 'TEXTAREA', 1450493507, 1450493507, 'pro_categories', 0, 0, 0, 0, 0, 0, 26, NULL, 2, 'Mô tả ngắn', 2, 1, NULL, 'Short description (vn)');
INSERT INTO `nuy_detail_table` VALUES (565, 'content', 0, 'Nội dung', -1, 'EDITOR', 1450493507, 1450493507, 'pro_categories', 0, 0, 0, 0, 0, 0, 26, NULL, 2, 'Nội dung', 6, 0, NULL, 'Category description');
INSERT INTO `nuy_detail_table` VALUES (566, 'create_time', 0, 'Thời gian tạo', 20, 'DATETIME', 1450493507, 1450493507, 'pro_categories', 0, 0, 0, 0, 0, 0, 26, NULL, 1, 'Thời gian tạo', 98, 1, NULL, 'Date created');
INSERT INTO `nuy_detail_table` VALUES (567, 'ord', 0, 'Sắp xếp', 11, 'TEXT', 1450493507, 1450493507, 'pro_categories', 1, 1, 0, 0, 0, 0, 26, NULL, 1, 'Sắp xếp', 8, 1, NULL, 'Sort');
INSERT INTO `nuy_detail_table` VALUES (568, 'parent', 0, 'Danh mục cha', 11, 'SELECT', 1450493507, 1450493507, 'pro_categories', 1, 0, 0, 0, 0, 0, 26, '{\n \"data\": {\n  \"source\": \"database\",\n  \"value\": {\n   \"table\": \"pro_categories\",\n   \"select\": \"id,name\",\n   \"field\": \"parent\",\n   \"base_field\": \"id\",\n   \"field_value\": 0\n  }\n },\n \"config\": {\n  \"searchbox\": 1\n }\n}', 1, 'Danh mục cha', 9, 1, '', 'Father list');
INSERT INTO `nuy_detail_table` VALUES (569, 's_title', 0, 'Tiêu đề SEO', 255, 'TEXT', 1450493507, 1450493507, 'pro_categories', 0, 0, 0, 0, 0, 0, 26, NULL, 3, 'Tiêu đề SEO', 10, 1, NULL, 'Seo title (vn)');
INSERT INTO `nuy_detail_table` VALUES (570, 's_des', 0, 'Mô tả SEO', 255, 'TEXTAREA', 1450493507, 1450493507, 'pro_categories', 0, 0, 0, 0, 0, 0, 26, NULL, 3, 'Mô tả SEO', 11, 1, NULL, 'Seo description (vn)');
INSERT INTO `nuy_detail_table` VALUES (571, 's_key', 0, 'Từ khóa SEO', 255, 'TEXTAREA', 1450493507, 1450493507, 'pro_categories', 0, 0, 0, 0, 0, 0, 26, NULL, 3, 'Từ khóa SEO', 12, 1, NULL, 'Seo key word (vn)');
INSERT INTO `nuy_detail_table` VALUES (572, 'count', 0, 'Lượt xem', 11, 'TEXT', 1450493507, 1450493507, 'pro_categories', 0, 0, 0, 0, 0, 0, 26, NULL, 2, 'Số lượng xem', 13, 0, NULL, 'Number of views');
INSERT INTO `nuy_detail_table` VALUES (573, 'quickpost', 0, 'Đăng nhanh', 4, 'CHECKBOX', 1450285088, 1450285088, 'nuy_table', 1, 1, 0, 0, 0, 0, 20, NULL, 1, 'Đăng nhanh', 15, 1, NULL, 'Post fast');
INSERT INTO `nuy_detail_table` VALUES (583, 'ext', 0, 'More', 255, 'TEXT', 1450285088, 1450285088, 'nuy_table', 1, 0, 0, 0, 0, 0, 20, NULL, 1, 'Thêm', 3, 1, NULL, 'More');
INSERT INTO `nuy_detail_table` VALUES (587, 'id', 0, 'Mã', 11, 'PRIMARYKEY', 1451368128, 1451368128, 'nuy_routes', 0, 0, 0, 0, 0, 0, 30, NULL, 1, 'id', 1, 1, NULL, 'Code');
INSERT INTO `nuy_detail_table` VALUES (588, 'controller', 0, 'controller', 255, 'TEXT', 1451368128, 1451368128, 'nuy_routes', 0, 0, 1, 0, 0, 0, 30, NULL, 1, 'controller', 2, 1, NULL, 'controller');
INSERT INTO `nuy_detail_table` VALUES (589, 'link', 0, 'Link', 255, 'TEXT', 1451368128, 1451368128, 'nuy_routes', 1, 0, 1, 0, 0, 0, 30, NULL, 1, 'link', 3, 1, NULL, 'link');
INSERT INTO `nuy_detail_table` VALUES (590, 'title_seo', 0, 'Tiêu đề SEO', 255, 'TEXT', 1451368128, 1451368128, 'nuy_routes', 0, 0, 0, 0, 0, 0, 30, NULL, 3, 'title_seo', 4, 1, NULL, 'Seo title (vn)');
INSERT INTO `nuy_detail_table` VALUES (591, 'des_seo', 0, 'Mô tả SEO', 255, 'TEXTAREA', 1451368128, 1451368128, 'nuy_routes', 0, 0, 0, 0, 0, 0, 30, NULL, 3, 'des_seo', 5, 1, NULL, 'Seo description (vn)');
INSERT INTO `nuy_detail_table` VALUES (592, 'key_seo', 0, 'Từ khóa SEO', 255, 'TEXTAREA', 1451368128, 1451368128, 'nuy_routes', 0, 0, 0, 0, 0, 0, 30, NULL, 3, 'key_seo', 6, 1, NULL, 'Seo key word (vn)');
INSERT INTO `nuy_detail_table` VALUES (593, 'root', 0, 'root', 255, 'TEXT', 1451368128, 1451368128, 'nuy_routes', 0, 0, 0, 0, 0, 0, 30, NULL, 1, 'root', 7, 0, NULL, 'root');
INSERT INTO `nuy_detail_table` VALUES (594, 'note', 0, 'Tên', 255, 'TEXT', 1451368128, 1451368128, 'nuy_routes', 1, 0, 0, 0, 0, 0, 30, NULL, 1, 'note', 8, 0, NULL, 'Name(vn)');
INSERT INTO `nuy_detail_table` VALUES (595, 'table', 0, 'Bảng', 255, 'TEXT', 1451368128, 1451368128, 'nuy_routes', 1, 0, 0, 0, 0, 0, 30, NULL, 1, 'table', 9, 0, NULL, 'Data sheet');
INSERT INTO `nuy_detail_table` VALUES (596, 'tag_id', 0, 'Target ID', 11, 'TEXT', 1451368128, 1451368128, 'nuy_routes', 0, 0, 0, 0, 0, 0, 30, NULL, 1, 'tag_id', 10, 0, NULL, 'Destination Id');
INSERT INTO `nuy_detail_table` VALUES (597, 'create_time', 0, 'Thời gian tạo', 20, 'DATETIME', 1451368128, 1451368128, 'nuy_routes', 0, 0, 0, 0, 0, 0, 30, NULL, 1, 'create_time', 98, 1, NULL, 'Date created');
INSERT INTO `nuy_detail_table` VALUES (598, 'update_time', 0, 'Thời gian cập nhật', 20, 'DATETIME', 1451368128, 1451368128, 'nuy_routes', 0, 0, 0, 0, 0, 0, 30, NULL, 1, 'update_time', 12, 1, NULL, 'Date of correction');
INSERT INTO `nuy_detail_table` VALUES (599, 'is_static', 0, 'Link tĩnh', 4, 'CHECKBOX', 1451368128, 1451368128, 'nuy_routes', 0, 0, 0, 0, 0, 0, 30, NULL, 1, 'Link tĩnh', 13, 1, NULL, 'Static link');
INSERT INTO `nuy_detail_table` VALUES (600, 'id', 0, 'Mã', 11, 'PRIMARYKEY', 1451371646, 1451371646, 'reviews', 0, 0, 0, 0, 0, 0, 31, NULL, 1, 'Mã', 1, 1, NULL, 'Code');
INSERT INTO `nuy_detail_table` VALUES (601, 'name', 0, 'Tên', 255, 'TEXT', 1451371646, 1451371646, 'reviews', 0, 0, 0, 0, 0, 0, 31, NULL, 1, 'Tên', 2, 1, NULL, 'Name(vn)');
INSERT INTO `nuy_detail_table` VALUES (602, 'create_time', 0, 'Thời gian tạo', 20, 'DATETIME', 1451371646, 1451371646, 'reviews', 1, 0, 0, 0, 0, 0, 31, NULL, 1, 'Thời gian tạo', 6, 1, NULL, 'Creation time');
INSERT INTO `nuy_detail_table` VALUES (603, 'content', 0, 'Nội dung', -1, 'TEXTAREA', 1451371646, 1451371646, 'reviews', 1, 0, 0, 0, 0, 0, 31, NULL, 1, 'Nội dung', 7, 1, NULL, 'content');
INSERT INTO `nuy_detail_table` VALUES (604, 'email', 0, 'Email', 255, 'TEXT', 1451371646, 1451371646, 'reviews', 1, 0, 0, 0, 0, 0, 31, NULL, 1, 'Họ', 4, 1, NULL, 'Email');
INSERT INTO `nuy_detail_table` VALUES (605, 'phone', 0, 'Phone', 255, 'TEXT', 1451371646, 1451371646, 'reviews', 1, 0, 0, 0, 0, 0, 31, NULL, 1, 'Điện thoại', 2, 0, NULL, 'Phone');
INSERT INTO `nuy_detail_table` VALUES (606, 'note', 0, 'Ghi chú', -1, 'TEXT', 1451371646, 1451371646, 'reviews', 0, 0, 0, 0, 0, 0, 31, NULL, 1, 'Ghi chú', 7, 0, NULL, 'Position');
INSERT INTO `nuy_detail_table` VALUES (607, 'tag', 0, 'Tag', 255, 'TAG', 1450342344, 1501663974, 'news', 0, 0, 0, 0, 0, 0, 23, '{\n	\"data\": {\n		\"source\": \"database\",\n		\"value\": {\n			\"table\": \"tag\",\n			\"select\": \"id,name\",\n			\"field\": \"parentd\",\n			\"base_field\": \"idd\",\n			\"field_value\": \"-1\",\n			\"where\": [{\n				\"1\": \"1\"\n			}]\n		}\n	},\n	\"config\": {\n		\"searchbox\": 1,\n		\"multiplie\": 1\n	}\n}', 3, 'Tag', 50, 0, '', 'Tag (can select multiple tags)');
INSERT INTO `nuy_detail_table` VALUES (629, 'price', 0, 'Giá', 11, 'TEXT', 1450493467, 1450493467, 'pro', 0, 0, 0, 0, 0, 0, 25, NULL, 1, 'Giá', 13, 0, NULL, 'Product price');
INSERT INTO `nuy_detail_table` VALUES (667, 'act', 0, 'Kích hoạt', 11, 'CHECKBOX', 1450493507, 1450493507, 'pro_categories', 1, 1, 0, 0, 0, 0, 26, NULL, 1, 'Active', 22, 1, NULL, 'Activated');
INSERT INTO `nuy_detail_table` VALUES (699, 'more', 0, 'Thông tin thêm', 255, 'EDITOR', 1450493467, 1557043384, 'pro', 0, 0, 0, 0, 0, 0, 25, '{\n		\"data\": {\n			\"source\": \"database\",\n			\"value\": {\n				\"table\": \"link_shops\",\n				\"select\": \"id,name\",\n				\"field\": \"parentd\",\n				\"base_field\": \"idd\",\n				\"field_value\": \"-1\",\n				\"where\": [{\n					\"1\": \"1\"\n				}]\n			}\n		},\n		\"config\": {\n			\"searchbox\": 1,\n			\"multiplie\": 0\n		}\n	}', 2, 'Giới thiệu khóa học', 14, 1, '', 'Mechanical (vn)');
INSERT INTO `nuy_detail_table` VALUES (712, 'home', 0, 'Hiển thị ở Trang chủ', 4, 'CHECKBOX', 1450493467, 1450493467, 'pro', 0, 1, 0, 0, 0, 0, 25, NULL, 1, 'Hiển thị trang chủ', 19, 0, NULL, 'Displayed in the homepage');
INSERT INTO `nuy_detail_table` VALUES (713, 'home', 0, 'Hiển thị trang chủ', 4, 'CHECKBOX', 1450342344, 1450342344, 'news', 0, 1, 0, 0, 0, 0, 23, NULL, 1, 'Hiển thị trang chủ', 11, 0, NULL, 'Currently in the news homepage');
INSERT INTO `nuy_detail_table` VALUES (738, 'act', 0, 'Kích hoạt', 11, 'CHECKBOX', 1450256646, 1450256646, 'news_categories', 1, 1, 0, 0, 0, 0, 12, NULL, 1, 'Trạng thái', 97, 1, NULL, 'Status');
INSERT INTO `nuy_detail_table` VALUES (741, 'img', 0, 'Ảnh', 255, 'IMGV2', 1450318317, 1450318317, 'menu', 0, 0, 0, 0, 0, 0, 22, NULL, 1, 'Ảnh banner danh mục', 4, 0, NULL, 'Menu image (what we do menu)');
INSERT INTO `nuy_detail_table` VALUES (742, 'img', 0, 'Banner', 20, 'IMGV2', 1451368128, 1451368128, 'nuy_routes', 0, 0, 0, 0, 0, 0, 30, '', 1, 'create_time', 11, 0, '', 'Banner image');
INSERT INTO `nuy_detail_table` VALUES (767, 'lib_img', 0, 'Thử viện ảnh', -1, 'LIB_IMG', 1450493507, 1450493507, 'pro_categories', 0, 0, 0, 0, 0, 0, 26, '', 1, 'Thư viện ảnh', 7, 0, '', 'Photo library');
INSERT INTO `nuy_detail_table` VALUES (789, 'act', 0, 'Kích hoạt', 11, 'CHECKBOX', 1450318317, 1450318317, 'menu', 1, 1, 0, 0, 0, 0, 22, '', 1, 'Nhóm', 8, 1, '', 'Activated');
INSERT INTO `nuy_detail_table` VALUES (790, 'home', 0, 'Hiển thị trang chủ', 255, 'CHECKBOX', 1450493507, 1450493507, 'pro_categories', 0, 1, 0, 0, 0, 0, 26, '', 1, 'Hiển thị ở trang chủ', 20, 0, '', 'Displayed in the product category menu');
INSERT INTO `nuy_detail_table` VALUES (807, 'act', 0, 'Kích hoạt', 255, 'CHECKBOX', 1451371646, 1451371646, 'reviews', 0, 1, 0, 0, 0, 0, 31, NULL, 1, 'Acitve', 6, 0, NULL, 'Acitve');
INSERT INTO `nuy_detail_table` VALUES (912, 'price_sale', 0, 'Giá Khuyến mại', 11, 'TEXT', 1450493467, 1450493467, 'pro', 0, 1, 0, 0, 0, 0, 25, NULL, 1, 'Giá giam gia', 13, 0, NULL, 'Promotion price');
INSERT INTO `nuy_detail_table` VALUES (974, 'hot', 0, 'Nổi bật', 11, 'CHECKBOX', 1450256646, 1450256646, 'news_categories', 0, 1, 0, 0, 0, 0, 12, '', 1, 'Hiển thị ở trang chủ', 7, 0, '', 'Has sidebar');
INSERT INTO `nuy_detail_table` VALUES (1123, 'hot', 0, 'Sản phẩm Hot', 4, 'CHECKBOX', 1450493467, 1450493467, 'pro', 0, 0, 0, 0, 0, 0, 25, '', 1, 'Hot', 19, 0, '', 'New product');
INSERT INTO `nuy_detail_table` VALUES (1151, 'home', 0, 'Hiển thị trang chủ', 11, 'CHECKBOX', 1450256646, 1450256646, 'news_categories', 0, 1, 0, 0, 0, 0, 12, '', 1, 'Hiển thi danh mục bệnh nên biết', 7, 0, '', 'Displayed under the homepage slide');
INSERT INTO `nuy_detail_table` VALUES (1505, 'hot', 0, 'Hot', 11, 'CHECKBOX', 1450318317, 1450318317, 'menu', 0, 0, 0, 0, 0, 0, 22, '', 1, 'Nhóm', 9, 0, '', 'Brand menu');
INSERT INTO `nuy_detail_table` VALUES (1637, 'id', 0, 'Mã', 11, 'PRIMARYKEY', 1483494767, 1483494767, 'slide', 0, 0, 0, 0, 0, 0, 103, NULL, 1, 'id', 1, 1, NULL, 'id');
INSERT INTO `nuy_detail_table` VALUES (1638, 'name', 0, 'Tên', 255, 'TEXT', 1483494767, 1483494767, 'slide', 1, 1, 1, 0, 0, 0, 103, NULL, 1, 'name', 1, 1, NULL, 'Name(vn)');
INSERT INTO `nuy_detail_table` VALUES (1639, 'img', 0, 'Ảnh', -1, 'IMGV2', 1483494767, 1483494767, 'slide', 1, 0, 0, 0, 0, 0, 103, NULL, 1, 'img', 14, 1, NULL, 'Photo slider');
INSERT INTO `nuy_detail_table` VALUES (1640, 'link', 0, 'Link', 255, 'CHOOSELINK', 1483494767, 1483494767, 'slide', 1, 1, 0, 0, 0, 0, 103, NULL, 1, 'link', 12, 1, NULL, 'link');
INSERT INTO `nuy_detail_table` VALUES (1641, 'create_time', 0, 'Thời gian tạo', 20, 'DATETIME', 1483494767, 1483494767, 'slide', 1, 0, 0, 0, 0, 0, 103, NULL, 1, 'create_time', 98, 1, NULL, 'Date created');
INSERT INTO `nuy_detail_table` VALUES (1642, 'note', 0, 'Ghi chú', -1, 'TEXTAREA', 1483494767, 1483494767, 'slide', 0, 1, 0, 0, 0, 0, 103, NULL, 1, 'note', 6, 0, NULL, 'Show form');
INSERT INTO `nuy_detail_table` VALUES (1643, 'ord', 0, 'Sắp xếp', 11, 'TEXT', 1483494767, 1483494767, 'slide', 1, 1, 0, 0, 0, 0, 103, NULL, 1, 'ord', 13, 1, NULL, 'Sort');
INSERT INTO `nuy_detail_table` VALUES (1644, 'act', 0, 'Kích hoạt', 4, 'CHECKBOX', 1483494767, 1483494767, 'slide', 1, 1, 0, 0, 0, 0, 103, NULL, 1, 'act', 13, 1, NULL, 'Activated');
INSERT INTO `nuy_detail_table` VALUES (1645, 'position', 0, 'Vị trí hiển thị', 4, 'SELECT', 1483494767, 1483494767, 'slide', 0, 0, 0, 0, 0, 0, 103, NULL, 1, 'poss_vt', 9, 0, NULL, 'poss_vt');
INSERT INTO `nuy_detail_table` VALUES (1646, 'video', 0, 'Video', 255, 'TEXT', 1483494767, 1483494767, 'slide', 0, 1, 0, 0, 0, 0, 103, NULL, 1, 'video', 10, 0, NULL, 'Video link (select uploaded mp4 video)');
INSERT INTO `nuy_detail_table` VALUES (1647, 'nofollow', 0, 'Nofollow', 255, 'CHECKBOX', 1483494767, 1499051438, 'slide', 0, 1, 0, 0, 0, 0, 103, '', 1, 'Nofollow', 11, 0, '', 'Nofollow');
INSERT INTO `nuy_detail_table` VALUES (1648, 'short_content', 0, 'Mô tả ngắn', -1, 'TEXTAREA', 1483494767, 1483494767, 'slide', 0, 0, 0, 0, 0, 0, 103, NULL, 2, 'short_content', 12, 0, NULL, 'Short description');
INSERT INTO `nuy_detail_table` VALUES (1682, 'code', 0, 'Mã sản phẩm', 255, 'TEXT', 1450493467, 1450493467, 'pro', 0, 0, 0, 0, 0, 0, 25, '', 1, 'Mã sản phẩm', 2, 0, '', 'Product code');
INSERT INTO `nuy_detail_table` VALUES (1757, 'tag_pro', 0, 'Tag', 255, 'TAG', 1450493467, 1499142385, 'pro', 0, 0, 0, 0, 0, 0, 25, '{\n        \"data\": {\n            \"source\": \"database\",\n            \"value\": {\n                \"table\": \"tag\",\n                \"select\": \"id,name\",\n                \"field\": \"parentd\",\n                \"base_field\": \"idd\",\n                \"field_value\": \"-1\",\n                \"where\": [{\n                    \"1\": \"1\"\n                }]\n            }\n        },\n        \"config\": {\n            \"searchbox\": 1,\n            \"multiplie\": 0\n        }\n    }', 3, 'Tag sản phẩm', 8, 0, '', 'Tag');
INSERT INTO `nuy_detail_table` VALUES (1766, 'icon', 0, 'Menu icon', 255, 'TEXTAREA', 1450318317, 1450318317, 'menu', 0, 0, 0, 0, 0, 0, 22, '', 1, 'Icon menu', 4, 0, '', 'Menu icon (For top menu)');
INSERT INTO `nuy_detail_table` VALUES (1791, 'sale', 0, 'Khuyến mại', 11, 'CHECKBOX', 1450493467, 1450493467, 'pro', 0, 1, 0, 0, 0, 0, 25, '', 1, 'Sản phẩm khuyến mại', 13, 0, '', 'Promotion tour');
INSERT INTO `nuy_detail_table` VALUES (1923, 'id', 0, 'Mã', 11, 'PRIMARYKEY', 1493880273, 1493880273, 'order', 0, 0, 0, 0, 0, 0, 122, NULL, 1, 'id', 1, 1, NULL, 'id');
INSERT INTO `nuy_detail_table` VALUES (1924, 'create_time', 0, 'Thời gian tạo', -1, 'DATETIME', 1493880273, 1493880273, 'order', 1, 0, 0, 0, 0, 0, 122, NULL, 1, 'Thời gian gửi', 2, 1, NULL, 'Time to send');
INSERT INTO `nuy_detail_table` VALUES (1925, 'info_customer', 0, 'Thông tin khách hàng', -1, 'TEXTAREA', 1493880273, 1493880273, 'order', 1, 0, 0, 0, 0, 0, 122, NULL, 1, 'Thông tin khách hàng', 3, 1, NULL, 'Customer information');
INSERT INTO `nuy_detail_table` VALUES (1926, 'info_pro', 0, 'Thông tin đơn hàng', -1, 'TEXTAREA', 1493880273, 1493880273, 'order', 1, 0, 0, 0, 0, 0, 122, NULL, 1, 'Thông tin sản phẩm', 4, 1, NULL, 'Product information');
INSERT INTO `nuy_detail_table` VALUES (1927, 'act', 0, 'Trạng thái', 4, 'CHECKBOX', 1493880273, 1493880273, 'order', 0, 0, 0, 0, 0, 0, 122, NULL, 1, 'Trạng thái', 5, 1, NULL, 'Status');
INSERT INTO `nuy_detail_table` VALUES (1928, 'city', 0, 'Thành phố', 4, 'TEXT', 1493880273, 1493880273, 'order', 0, 0, 0, 0, 0, 0, 122, NULL, 1, 'city', 6, 1, NULL, 'city');
INSERT INTO `nuy_detail_table` VALUES (1929, 'provide', 0, 'Quận Huyện', 4, 'TEXT', 1493880273, 1493880273, 'order', 0, 0, 0, 0, 0, 0, 122, NULL, 1, 'provide', 7, 1, NULL, 'provide');
INSERT INTO `nuy_detail_table` VALUES (1930, 'id', 0, 'Mã', 11, 'PRIMARYKEY', 1493884621, 1493884621, 'tag', 0, 0, 0, 0, 0, 0, 123, NULL, 1, 'id', 1, 1, NULL, 'id');
INSERT INTO `nuy_detail_table` VALUES (1931, 'name', 0, 'Tên', 255, 'TEXT', 1493884621, 1493884621, 'tag', 1, 1, 1, 0, 0, 0, 123, '', 1, 'name', 2, 1, '', 'Name(vn)');
INSERT INTO `nuy_detail_table` VALUES (1932, 'link', 0, 'Link', 255, 'TEXT', 1493884621, 1493884621, 'tag', 1, 1, 0, 0, 0, 0, 123, NULL, 1, 'link', 3, 1, NULL, 'Link');
INSERT INTO `nuy_detail_table` VALUES (1933, 'content', 0, 'Nội dung', -1, 'EDITOR', 1493884621, 1493884621, 'tag', 0, 0, 0, 0, 0, 0, 123, NULL, 2, 'content', 4, 1, NULL, 'content');
INSERT INTO `nuy_detail_table` VALUES (1934, 'create_time', 0, 'Thời gian tạo', 12, 'DATETIME', 1493884621, 1493884621, 'tag', 1, 0, 0, 0, 0, 0, 123, NULL, 1, 'create_time', 5, 1, NULL, 'Date created');
INSERT INTO `nuy_detail_table` VALUES (1935, 's_title', 0, 'Tiêu đề seo', -1, 'TEXT', 1493884621, 1493884621, 'tag', 0, 0, 0, 0, 0, 0, 123, NULL, 3, 'Tiêu đề SEO', 6, 1, NULL, 'Seo title (vn)');
INSERT INTO `nuy_detail_table` VALUES (1936, 's_des', 0, 'Mô tả seo', -1, 'TEXTAREA', 1493884621, 1493884621, 'tag', 0, 0, 0, 0, 0, 0, 123, NULL, 3, 'Mô tả SEO', 7, 1, NULL, 'Seo description (vn)');
INSERT INTO `nuy_detail_table` VALUES (1937, 's_key', 0, 'Từ khóa seo', -1, 'TEXT', 1493884621, 1493884621, 'tag', 0, 0, 0, 0, 0, 0, 123, NULL, 3, 'Từ khóa SEO', 8, 1, NULL, 'Seo key word (vn)');
INSERT INTO `nuy_detail_table` VALUES (1938, 'id', 0, 'Mã', 11, 'PRIMARYKEY', 1493884654, 1493884654, 'tag_pro', 0, 0, 0, 0, 0, 0, 124, NULL, 1, 'id', 1, 1, NULL, 'id');
INSERT INTO `nuy_detail_table` VALUES (1939, 'name', 0, 'Tên', 255, 'TEXT', 1493884654, 1493884654, 'tag_pro', 1, 1, 1, 0, 0, 0, 124, NULL, 1, 'name', 2, 1, NULL, 'Name(vn)');
INSERT INTO `nuy_detail_table` VALUES (1940, 'link', 0, 'Link', 255, 'TEXT', 1493884654, 1493884654, 'tag_pro', 1, 1, 0, 0, 0, 0, 124, NULL, 1, 'link', 3, 1, NULL, 'link');
INSERT INTO `nuy_detail_table` VALUES (1941, 'content', 0, 'Nội dung', -1, 'EDITOR', 1493884654, 1493884654, 'tag_pro', 0, 0, 0, 0, 0, 0, 124, NULL, 3, 'content', 4, 1, NULL, 'Nội dung');
INSERT INTO `nuy_detail_table` VALUES (1942, 'create_time', 0, 'Thời gian tạo', 12, 'DATETIME', 1493884654, 1493884654, 'tag_pro', 1, 0, 0, 0, 0, 0, 124, NULL, 1, 'create_time', 98, 1, NULL, 'Date created');
INSERT INTO `nuy_detail_table` VALUES (1943, 's_title', 0, 'Tiêu đề seo', -1, 'TEXT', 1493884654, 1493884654, 'tag_pro', 0, 0, 0, 0, 0, 0, 124, NULL, 3, 'Tiêu đề SEO', 6, 1, NULL, 'Seo title (vn)');
INSERT INTO `nuy_detail_table` VALUES (1944, 's_des', 0, 'Mô tả seo', -1, 'TEXTAREA', 1493884654, 1493884654, 'tag_pro', 0, 0, 0, 0, 0, 0, 124, NULL, 3, 'Mô tả SEO', 7, 1, NULL, 'Seo description (vn)');
INSERT INTO `nuy_detail_table` VALUES (1945, 's_key', 0, 'Từ khóa Seo', -1, 'TEXT', 1493884654, 1493884654, 'tag_pro', 0, 0, 0, 0, 0, 0, 124, NULL, 3, 'Từ khóa SEO', 8, 1, NULL, 'Seo key word (vn)');
INSERT INTO `nuy_detail_table` VALUES (1975, 'id', 0, 'Mã', 11, 'PRIMARYKEY', 1494822823, 1494822823, 'partner', 0, 0, 0, 0, 0, 0, 129, NULL, 1, 'Mã đối tác', 1, 1, NULL, 'Partner code');
INSERT INTO `nuy_detail_table` VALUES (1976, 'name', 0, 'Tên', 255, 'TEXT', 1494822823, 1494822823, 'partner', 1, 1, 1, 0, 0, 0, 129, '', 1, 'Tên đối tác', 2, 1, '[\n        {\n            \"target\": \"this\",\n            \"event\": \"input\",\n            \"function\": \"count\"\n        },{\n            \"target\": \"this\",\n            \"event\": \"input\",\n            \"function\": \"preview\"\n        },\n        {\n            \"target\": \"slug\",\n            \"event\": \"input\",\n            \"function\": \"slug\",\n            \"when\": \"6\"\n        }\n    ]', 'Partner name');
INSERT INTO `nuy_detail_table` VALUES (1977, 'content', 0, 'Nội dung', -1, 'EDITOR', 1494822823, 1494822823, 'partner', 0, 0, 0, 0, 0, 0, 129, NULL, 2, 'Mô tả', 3, 0, NULL, 'Description');
INSERT INTO `nuy_detail_table` VALUES (1978, 'short_content', 0, 'Mô tả ngắn', -1, 'EDITOR', 1494822823, 1494822823, 'partner', 0, 0, 0, 0, 0, 0, 129, NULL, 2, 'Mô tả ngắn', 4, 0, NULL, 'Short description');
INSERT INTO `nuy_detail_table` VALUES (1979, 'img', 0, 'Ảnh', -1, 'IMGV2', 1494822823, 1494822823, 'partner', 1, 0, 0, 0, 0, 0, 129, NULL, 1, 'Hình ảnh', 5, 1, NULL, 'Picture');
INSERT INTO `nuy_detail_table` VALUES (1980, 'act', 0, 'Kích hoạt', 4, 'CHECKBOX', 1494822823, 1494822823, 'partner', 1, 1, 0, 0, 0, 0, 129, NULL, 1, 'Kích hoạt', 6, 1, NULL, 'Activated');
INSERT INTO `nuy_detail_table` VALUES (1981, 'create_time', 0, 'Thời gian tạo', 20, 'DATETIME', 1494822823, 1494822823, 'partner', 1, 0, 0, 0, 0, 0, 129, NULL, 1, 'Thời gian tạo', 98, 1, NULL, 'Creation time');
INSERT INTO `nuy_detail_table` VALUES (1982, 'link', 0, 'Link', 255, 'TEXT', 1494822823, 1494822823, 'partner', 0, 1, 0, 0, 0, 0, 129, NULL, 1, 'Link', 8, 0, NULL, 'Link');
INSERT INTO `nuy_detail_table` VALUES (1983, 'ord', 0, 'Sắp xếp', 11, 'TEXT', 1494822823, 1494822823, 'partner', 1, 1, 0, 0, 0, 0, 129, NULL, 1, 'ord', 9, 1, NULL, 'ord');
INSERT INTO `nuy_detail_table` VALUES (1984, 'home', 0, 'Hiển trị trang chủ', 1, 'CHECKBOX', 1494822823, 1494822823, 'partner', 1, 1, 0, 0, 0, 0, 129, NULL, 1, 'home', 5, 1, NULL, 'Partner below');
INSERT INTO `nuy_detail_table` VALUES (1985, 'group_id', 0, 'Nhóm', 1, 'TEXT', 1494822823, 1494822823, 'partner', 0, 0, 0, 0, 0, 0, 129, NULL, 1, 'group_id', 11, 0, NULL, 'group_id');
INSERT INTO `nuy_detail_table` VALUES (1995, 'update_time', 0, 'Thời gian cập nhật', 20, 'DATETIME', 1450342344, 1450342344, 'news', 0, 1, 0, 0, 0, 0, 23, '', 1, 'Ngày sửa', 99, 1, '', 'Date of correction');
INSERT INTO `nuy_detail_table` VALUES (1996, 'update_time', 0, 'Thời gian cập nhật', 20, 'DATETIME', 1450256646, 1450256646, 'news_categories', 1, 0, 0, 0, 0, 0, 12, '', 1, 'Ngày sửa', 99, 1, '', 'Date of correction');
INSERT INTO `nuy_detail_table` VALUES (1997, 'update_time', 0, 'Thời gian cập nhật', 20, 'DATETIME', 1450493467, 1450493467, 'pro', 0, 0, 0, 0, 0, 0, 25, '', 1, 'Ngày sửa', 99, 0, '', 'Date of correction');
INSERT INTO `nuy_detail_table` VALUES (1998, 'update_time', 0, 'Thời gian cập nhật', 20, 'DATETIME', 1450493507, 1450493507, 'pro_categories', 0, 0, 0, 0, 0, 0, 26, '', 1, 'Ngày sửa', 99, 1, '', 'Date of correction');
INSERT INTO `nuy_detail_table` VALUES (1999, 'update_time', 0, 'Thời gian cập nhật', 20, 'DATETIME', 1483494767, 1483494767, 'slide', 0, 0, 0, 0, 0, 0, 103, '', 1, 'Ngày sửa', 99, 0, '', 'Date of correction');
INSERT INTO `nuy_detail_table` VALUES (2000, 'update_time', 0, 'Date of correction', 12, 'DATETIME', 1493884654, 1493884654, 'tag_pro', 1, 0, 0, 0, 0, 0, 124, '', 1, 'Ngày sửa', 99, 1, '', 'Date of correction');
INSERT INTO `nuy_detail_table` VALUES (2032, 'nofollow', 0, 'Nofollow', 4, 'CHECKBOX', 1450342344, 1498450755, 'news', 0, 1, 0, 0, 0, 0, 23, '', 1, 'Nofollow', 13, 0, '', 'Nofollow');
INSERT INTO `nuy_detail_table` VALUES (2033, 'custom_wp', 0, 'custom wp', 4, 'TEXTAREA', 1450342344, 1450342344, 'news', 0, 0, 0, 0, 0, 0, 23, '', 1, 'custom wp', 10, 0, '', 'custom wp');
INSERT INTO `nuy_detail_table` VALUES (2035, 'noindex', 0, 'Noindex', 4, 'CHECKBOX', 1450342344, 1450342344, 'news', 0, 1, 0, 0, 0, 0, 23, '', 1, 'Noindex', 13, 0, '', 'Noindex');
INSERT INTO `nuy_detail_table` VALUES (2036, 'nofollow', 0, 'Nofollow', 255, 'CHECKBOX', 1450318317, 1450318317, 'menu', 0, 1, 0, 0, 0, 0, 22, '', 1, 'donofollow', 4, 0, '', 'Nofollow');
INSERT INTO `nuy_detail_table` VALUES (2038, 'nofollow', 0, 'Nofollow', 11, 'CHECKBOX', 1450256646, 1450256646, 'news_categories', 0, 1, 0, 0, 0, 0, 12, '', 1, 'Nofollow', 8, 0, '', 'Nofollow');
INSERT INTO `nuy_detail_table` VALUES (2072, 'banner', 0, 'Banner', 255, 'IMGV2', 1450493467, 1499141003, 'pro', 0, 0, 0, 0, 0, 1, 25, '', 1, 'Banner', 5, 0, '', 'Banner');
INSERT INTO `nuy_detail_table` VALUES (2073, 'address', 0, 'Địa chỉ', 255, 'TEXT', 1451371646, 1451371646, 'reviews', 0, 0, 0, 0, 0, 0, 31, '', 1, 'Địa chỉ', 5, 0, '', 'Address');
INSERT INTO `nuy_detail_table` VALUES (2090, 'content', 0, 'Nội dung', -1, 'TEXTAREA', 1483494767, 1483494767, 'slide', 0, 0, 0, 0, 0, 0, 103, '', 2, 'Nội dung(vi)', 15, 0, '', 'Content (vn)');
INSERT INTO `nuy_detail_table` VALUES (2367, 'parent', 0, 'Nhóm Slide', 255, 'SELECT', 1483494767, 1483494767, 'slide', 0, 0, 0, 0, 0, 0, 103, '{\n        \"data\": {\n            \"source\": \"database\",\n            \"value\": {\n                \"table\": \"group_slide\",\n                \"select\": \"id,name\",\n                \"field\": \"parentd\",\n                \"base_field\": \"idd\",\n                \"field_value\": \"-1\",\n                \"where\": [{\n                    \"1\": \"1\"\n                }]\n            }\n        },\n        \"config\": {\n            \"searchbox\": 1,\n            \"multiplie\": 0\n        }\n    }', 1, 'parent', 7, 0, '', 'Group slider');
INSERT INTO `nuy_detail_table` VALUES (2481, 'position', 0, 'Vị trí hiển thị', -1, 'MULTISELECT', 1450342344, 1557202620, 'news', 0, 0, 0, 0, 0, 0, 23, '{\n        \"data\": {\n            \"source\": \"static\",\n            \"value\": [{\n                    \"1\": \"Hiển thị ở bài viết nổi bật footer\"\n                }\n            ]\n        },\n        \"config\": {\n            \"type\": \"simple\",\n            \"searchbox\": 0\n        }\n\n    }', 1, 'Vị trí hiển thị', 9, 1, '', 'Location display');
INSERT INTO `nuy_detail_table` VALUES (2487, 'menu', 0, 'The menu will light up when you enter this link:', 255, 'SELECT', 1451368128, 1529465043, 'nuy_routes', 0, 1, 0, 0, 0, 0, 30, '{\n        \"data\": {\n            \"source\": \"database\",\n            \"value\": {\n                \"table\": \"menu\",\n                \"select\": \"id,name\",\n                \"field\": \"parent\",\n                \"base_field\": \"id\",\n                \"field_value\": 0,\n                \"where\": [{\n                    \"1\": \"1\",\"parent\":\"0\",\"group_id\":\"1\"\n                }]\n            }\n        },\n        \"config\": {\n            \"type\": \"simple\",\n            \"searchbox\": 0\n        }\n    }', 1, 'Nhóm menu', 9, 0, '', 'The menu will light up when you enter this link:');
INSERT INTO `nuy_detail_table` VALUES (2990, 'banner', 0, 'Banner', 255, 'IMGV2', 1450342344, 1450342344, 'news', 0, 0, 0, 0, 0, 1, 23, '', 1, 'Banner', 6, 0, '', 'Banner');
INSERT INTO `nuy_detail_table` VALUES (3073, 's_key', 0, 'Từ khóa SEO', 255, 'TEXTAREA', 1450256646, 1450256646, 'news_categories', 0, 0, 0, 0, 0, 0, 12, '', 3, 'Từ khóa SEO(jp)', 11, 1, '', 'Seo key word (jp)');
INSERT INTO `nuy_detail_table` VALUES (3074, 's_key', 0, 'Từ khóa SEO', 255, 'TEXTAREA', 1450342344, 1450342344, 'news', 0, 0, 0, 0, 0, 0, 23, '', 3, 'Từ khóa SEO(jp)', 17, 1, '', 'Seo key word (jp)');
INSERT INTO `nuy_detail_table` VALUES (3075, 's_key', 0, 'Từ khóa SEO', 255, 'TEXTAREA', 1450493467, 1450493467, 'pro', 0, 0, 0, 0, 0, 0, 25, '', 3, 'Từ khóa SEO(jp)', 17, 1, '', 'Seo key word (jp)');
INSERT INTO `nuy_detail_table` VALUES (3076, 's_key', 0, 'Từ khóa SEO', 255, 'TEXTAREA', 1450493507, 1450493507, 'pro_categories', 0, 0, 0, 0, 0, 0, 26, '', 3, 'Từ khóa SEO(jp)', 12, 1, '', 'Seo key word (jp)');
INSERT INTO `nuy_detail_table` VALUES (3077, 's_key', 0, 'Từ khóa SEO', -1, 'TEXT', 1493884621, 1493884621, 'tag', 0, 0, 0, 0, 0, 0, 123, '', 3, 'Từ khóa SEO(jp)', 8, 1, '', 'Seo key word (jp)');
INSERT INTO `nuy_detail_table` VALUES (3078, 's_key', 0, 'Từ khóa SEO', -1, 'TEXT', 1493884654, 1493884654, 'tag_pro', 0, 0, 0, 0, 0, 0, 124, '', 3, 'Từ khóa SEO(jp)', 8, 1, '', 'Seo key word (jp)');
INSERT INTO `nuy_detail_table` VALUES (3169, 'id', 0, 'id', 11, 'PRIMARYKEY', 1570153061, 1570153061, 'languages', 1, 0, 0, 0, 0, 0, 134, NULL, 1, 'id', 1, 1, NULL, 'id');
INSERT INTO `nuy_detail_table` VALUES (3170, 'keyword', 0, 'Keyword', 255, 'TEXT', 1570153061, 1570153061, 'languages', 0, 0, 0, 0, 0, 0, 134, NULL, 1, 'keyword', 2, 0, NULL, 'keyword');
INSERT INTO `nuy_detail_table` VALUES (3171, 'vi_value', 0, 'Tiếng Việt', 255, 'TEXT', 1570153061, 1570153061, 'languages', 1, 1, 0, 0, 0, 0, 134, NULL, 1, 'vi_value', 3, 1, NULL, 'vi_value');
INSERT INTO `nuy_detail_table` VALUES (3172, 'en_value', 0, 'Tiếng Anh', 255, 'TEXT', 1570153061, 1570153061, 'languages', 1, 1, 0, 0, 0, 0, 134, NULL, 1, 'en_value', 4, 1, NULL, 'en_value');
INSERT INTO `nuy_detail_table` VALUES (3173, 'note', 0, 'note', -1, 'TEXT', 1570153061, 1570153061, 'languages', 0, 0, 0, 0, 0, 0, 134, NULL, 1, 'note', 5, 0, NULL, 'note');

-- ----------------------------
-- Table structure for nuy_group_module
-- ----------------------------
DROP TABLE IF EXISTS `nuy_group_module`;
CREATE TABLE `nuy_group_module`  (
  `id` int(11) NOT NULL AUTO_INCREMENT COMMENT 'Mã nhóm',
  `name` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NULL DEFAULT NULL COMMENT 'Tên nhóm',
  `note` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NULL DEFAULT NULL COMMENT 'Ghi chú',
  `note_en` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NULL DEFAULT NULL,
  `link` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NULL DEFAULT NULL COMMENT 'Đường dẫn',
  `parent` int(11) NULL DEFAULT NULL COMMENT 'Cha',
  `is_server` tinyint(4) NULL DEFAULT 0 COMMENT 'Dùng cho đăng nhập bằng tài khoản hệ thống',
  `act` tinyint(4) NULL DEFAULT NULL,
  `icon` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NULL DEFAULT NULL,
  `ord` int(11) NULL DEFAULT NULL,
  PRIMARY KEY (`id`) USING BTREE
) ENGINE = InnoDB AUTO_INCREMENT = 176 CHARACTER SET = utf8mb4 COLLATE = utf8mb4_unicode_ci COMMENT = 'Nhóm chức năng' ROW_FORMAT = COMPRESSED;

-- ----------------------------
-- Records of nuy_group_module
-- ----------------------------
INSERT INTO `nuy_group_module` VALUES (31, 'tintuc', 'Tin tức', 'News', 'javascript:void(0)', 0, 0, 1, 'icon-paper-clip', 5);
INSERT INTO `nuy_group_module` VALUES (32, 'khac', 'Khác', 'Other', 'javascript:void(0)', 0, 0, 1, 'icon-screenshot', 30);
INSERT INTO `nuy_group_module` VALUES (35, 'nuy_user', 'Người dùng', 'User list', 'view/nuy_user', 38, 0, 1, NULL, 1);
INSERT INTO `nuy_group_module` VALUES (37, 'news_categories', 'Danh mục tin tức', 'News category', 'view/news_categories', 31, 0, 1, NULL, 1);
INSERT INTO `nuy_group_module` VALUES (38, 'nangcao', 'Nâng cao', 'Advanced', 'javascript:void(0)', 0, 0, 1, 'icon-money', 40);
INSERT INTO `nuy_group_module` VALUES (39, 'nuy_group_user', 'Nhóm người dùng', 'User group', 'view/nuy_group_user', 38, 0, 1, NULL, 3);
INSERT INTO `nuy_group_module` VALUES (40, 'nuy_group_module', 'Nhóm chức năng', 'Nhóm chức năng', 'view/nuy_group_module', 38, 1, 1, NULL, 4);
INSERT INTO `nuy_group_module` VALUES (41, 'nuy_role', 'Quyền', 'Role', 'view/nuy_role', 38, 0, 1, NULL, 5);
INSERT INTO `nuy_group_module` VALUES (42, 'giaodien', 'Giao diện', 'Interface', 'javascript:void(0)', 0, 0, 1, 'icon-desktop', 20);
INSERT INTO `nuy_group_module` VALUES (44, 'nuy_detail_table', 'Chi tiết bảng', 'Table details', 'view/nuy_detail_table', 38, 1, 1, NULL, 6);
INSERT INTO `nuy_group_module` VALUES (47, 'nuy_table', 'Bảng', 'List of tables', 'view/nuy_table', 38, 1, 1, NULL, 7);
INSERT INTO `nuy_group_module` VALUES (48, 'cauhinh', 'Cấu hình', 'Configuration', 'javascript:void(0)', 0, 0, 1, 'icon-cogs', 50);
INSERT INTO `nuy_group_module` VALUES (49, 'configs', 'Cấu hình', 'Configuration', 'view/configs', 48, 0, 1, NULL, 1);
INSERT INTO `nuy_group_module` VALUES (50, 'menu', 'Menu', 'Menu', 'view/menu', 42, 0, 1, NULL, 1);
INSERT INTO `nuy_group_module` VALUES (51, 'news', 'Tin tức', 'News', 'view/news', 31, 0, 1, NULL, 2);
INSERT INTO `nuy_group_module` VALUES (52, 'nuy_config', 'Cấu hình Tech 5s', 'Tech5s Config', 'view/nuy_config', 48, 0, 1, NULL, 2);
INSERT INTO `nuy_group_module` VALUES (53, 'sanpham', 'Sản phẩm', 'Product', 'javascript:void(0)', 0, 0, 0, 'icon-gift', 2);
INSERT INTO `nuy_group_module` VALUES (56, 'media', 'Kho media', 'Media warehouse', 'javascript:void(0)', 0, 0, 0, 'icon-picture', 60);
INSERT INTO `nuy_group_module` VALUES (60, 'nuy_routes', 'Link', 'Link', 'view/nuy_routes', 48, 0, 1, '', 3);
INSERT INTO `nuy_group_module` VALUES (61, 'reviews', 'Thông tin liên hệ', 'Contact Info', 'view/reviews', 32, 0, 1, NULL, 1);
INSERT INTO `nuy_group_module` VALUES (119, 'medias', 'Media Version 2', 'Media Version 2', 'media1', 56, 0, 1, NULL, 1);
INSERT INTO `nuy_group_module` VALUES (125, 'pro_categories', 'Danh mục sản phẩm', 'Product Categories', 'view/pro_categories', 53, 0, 1, '', 1);
INSERT INTO `nuy_group_module` VALUES (126, 'pro', 'Sản phẩm', 'Product', 'view/pro', 53, 0, 1, '', 2);
INSERT INTO `nuy_group_module` VALUES (137, 'slide', 'Slide Ảnh', 'Slider', 'view/slide', 42, 0, 1, NULL, 3);
INSERT INTO `nuy_group_module` VALUES (159, 'order', 'Đơn hàng', 'Orders', 'view/order', 32, 0, 1, NULL, 2);
INSERT INTO `nuy_group_module` VALUES (160, 'tag', 'Tag', 'Tag', 'javascript:void(0)', 0, 0, 1, 'icon-gift', 1);
INSERT INTO `nuy_group_module` VALUES (161, 'tag', 'Tag tin tức', 'Tag tin tức', 'view/tag', 31, 1, 1, NULL, 3);
INSERT INTO `nuy_group_module` VALUES (162, 'tag_pro', 'Tag sản phẩm', 'Tag sản phẩm', 'view/tag_pro', 53, 1, 1, NULL, 3);
INSERT INTO `nuy_group_module` VALUES (167, 'partner', ' Đối tác', ' Đối tác', 'view/partner', 42, 1, 1, NULL, 6);
INSERT INTO `nuy_group_module` VALUES (172, 'languages', 'Languages', 'Languages', 'view/languages', 32, 0, 1, NULL, NULL);
INSERT INTO `nuy_group_module` VALUES (173, 'Plugin', 'Plugin', 'Plugins', 'javascript:void(0)', 0, 0, 0, 'icon-trophy', 60);
INSERT INTO `nuy_group_module` VALUES (174, 'list_plugins', 'Danh sách Plugins', 'List Plugins', 'plugins', 173, 0, 1, NULL, NULL);
INSERT INTO `nuy_group_module` VALUES (175, 'core', 'Thông tin CMS', 'CMS Information', 'updateCore', 173, 0, 1, NULL, NULL);

-- ----------------------------
-- Table structure for nuy_group_user
-- ----------------------------
DROP TABLE IF EXISTS `nuy_group_user`;
CREATE TABLE `nuy_group_user`  (
  `id` int(11) NOT NULL AUTO_INCREMENT COMMENT 'Mã nhóm',
  `name` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NULL DEFAULT NULL COMMENT 'Tên nhóm',
  `note` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NULL DEFAULT NULL COMMENT 'Ghi chú',
  `parent` int(11) NULL DEFAULT NULL COMMENT 'Cha',
  `act` tinyint(4) NULL DEFAULT NULL,
  PRIMARY KEY (`id`) USING BTREE
) ENGINE = InnoDB AUTO_INCREMENT = 6 CHARACTER SET = utf8mb4 COLLATE = utf8mb4_unicode_ci COMMENT = 'Nhóm người dùng' ROW_FORMAT = COMPRESSED;

-- ----------------------------
-- Records of nuy_group_user
-- ----------------------------
INSERT INTO `nuy_group_user` VALUES (1, 'admin', 'Admin', 0, 1);
INSERT INTO `nuy_group_user` VALUES (4, 'editor', 'Editor', 1, 1);
INSERT INTO `nuy_group_user` VALUES (5, 'dangbai', 'Post', 1, 1);

-- ----------------------------
-- Table structure for nuy_history
-- ----------------------------
DROP TABLE IF EXISTS `nuy_history`;
CREATE TABLE `nuy_history`  (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `name` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL,
  `create_time` bigint(20) NOT NULL,
  `note` text CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL,
  `ip` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL,
  PRIMARY KEY (`id`) USING BTREE
) ENGINE = InnoDB AUTO_INCREMENT = 5 CHARACTER SET = utf8mb4 COLLATE = utf8mb4_unicode_ci ROW_FORMAT = COMPRESSED;

-- ----------------------------
-- Records of nuy_history
-- ----------------------------
INSERT INTO `nuy_history` VALUES (1, 'admin', 1586748771, 'Đăng nhập hệ thống ', '::1');
INSERT INTO `nuy_history` VALUES (2, 'admin', 1587115477, 'Đăng nhập hệ thống ', '::1');
INSERT INTO `nuy_history` VALUES (3, 'admin', 1587116310, 'Đăng nhập hệ thống ', '::1');
INSERT INTO `nuy_history` VALUES (4, 'admin', 1587184240, 'Đăng nhập hệ thống ', '::1');

-- ----------------------------
-- Table structure for nuy_languages
-- ----------------------------
DROP TABLE IF EXISTS `nuy_languages`;
CREATE TABLE `nuy_languages`  (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `keyword` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NULL DEFAULT NULL,
  `vi_value` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NULL DEFAULT NULL,
  `en_value` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL,
  `note` text CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NULL,
  PRIMARY KEY (`id`) USING BTREE
) ENGINE = InnoDB AUTO_INCREMENT = 77 CHARACTER SET = utf8mb4 COLLATE = utf8mb4_unicode_ci ROW_FORMAT = COMPRESSED;

-- ----------------------------
-- Records of nuy_languages
-- ----------------------------
INSERT INTO `nuy_languages` VALUES (1, 'PAGINATION_LAST_LINK', 'Trang cuối', 'Last page', NULL);
INSERT INTO `nuy_languages` VALUES (2, 'PAGINATION_NEXT_LINK', '	›', '	›', NULL);
INSERT INTO `nuy_languages` VALUES (3, 'PAGINATION_PREV_LINK', '‹', '‹', NULL);
INSERT INTO `nuy_languages` VALUES (4, 'PAGINATION_FIRST_LINK', 'Trang nhất', 'First page', NULL);
INSERT INTO `nuy_languages` VALUES (5, 'TITLE', 'Hệ thống quản trị website Tech5s', 'Website management system Tech5s', NULL);
INSERT INTO `nuy_languages` VALUES (6, 'CLOSE', 'Đóng', 'Close', NULL);
INSERT INTO `nuy_languages` VALUES (7, 'CHANGE_PASS', 'Đổi mật khẩu', 'Change Password', NULL);
INSERT INTO `nuy_languages` VALUES (8, 'OLD_PASS', 'Mật khẩu cũ', 'Old Password', NULL);
INSERT INTO `nuy_languages` VALUES (9, 'NEW_PASS', 'Mật khẩu mới', 'New Password', NULL);
INSERT INTO `nuy_languages` VALUES (10, 'FILE_MANAGER', 'Quản lý file Tech5s', 'Tech5s File Manager', NULL);
INSERT INTO `nuy_languages` VALUES (11, 'FORGET_PASS', 'Quên mật khẩu?', 'Forget Password?', NULL);
INSERT INTO `nuy_languages` VALUES (12, 'USERNAME', 'Tên đăng nhập', 'Username', NULL);
INSERT INTO `nuy_languages` VALUES (13, 'PASSWORD', 'Mật khẩu', 'Password', NULL);
INSERT INTO `nuy_languages` VALUES (14, 'CLEAR_CACHE', 'Xóa cache', 'Clear Cache', NULL);
INSERT INTO `nuy_languages` VALUES (15, 'VISIT_HISTORIES', 'Lịch sử truy cập', 'Visit Histories', NULL);
INSERT INTO `nuy_languages` VALUES (16, 'VISIT_HISTORIES', 'Lịch sử truy cập', 'Visit Histories', NULL);
INSERT INTO `nuy_languages` VALUES (17, 'LOGOUT', 'Thoát', 'Logout', NULL);
INSERT INTO `nuy_languages` VALUES (18, 'REMAIL', 'Email đăng ký', 'Registed Email', NULL);
INSERT INTO `nuy_languages` VALUES (19, 'RESEND_PASSWORD', 'Gửi lại mật khẩu', 'Resend Password', NULL);
INSERT INTO `nuy_languages` VALUES (20, 'LOGIN', 'Đăng nhập', 'Login', NULL);
INSERT INTO `nuy_languages` VALUES (21, 'HOME', 'Trang chủ', 'Home', NULL);
INSERT INTO `nuy_languages` VALUES (22, 'NOTIFY', 'Thông báo', 'Notifies', NULL);
INSERT INTO `nuy_languages` VALUES (23, 'HELP', 'Trợ giúp', 'Help', NULL);
INSERT INTO `nuy_languages` VALUES (24, 'NEED_HELP', 'Bạn cần trợ giúp?', 'Do you need any help?', NULL);
INSERT INTO `nuy_languages` VALUES (25, 'CREATE_HELP', 'Hãy tạo Yêu cầu hỗ trợ mới', 'Create ticket for your issuse', NULL);
INSERT INTO `nuy_languages` VALUES (26, 'HERE', 'tại đây', 'here', NULL);
INSERT INTO `nuy_languages` VALUES (27, 'SUPPORT_CENTER', 'Trung tâm trợ giúp', 'Support Center', NULL);
INSERT INTO `nuy_languages` VALUES (28, 'SUPPORT_SOON', 'sẽ hỗ trợ bạn sớm nhất', 'will support you soon!', NULL);
INSERT INTO `nuy_languages` VALUES (29, 'QUICK_ACCESS', 'Truy cập nhanh', 'Quick access', NULL);
INSERT INTO `nuy_languages` VALUES (30, 'ADD', 'Thêm', 'ADD', NULL);
INSERT INTO `nuy_languages` VALUES (31, 'ADVISORY', 'Tư vấn', 'Advisory', NULL);
INSERT INTO `nuy_languages` VALUES (32, 'RECORDS', 'bản ghi', 'Record(s)', NULL);
INSERT INTO `nuy_languages` VALUES (33, 'WANT_DELETE', 'Bạn có thực sự muốn xóa các %s này không?', 'Do you want to delete %s?', NULL);
INSERT INTO `nuy_languages` VALUES (34, 'DONT_CHOOSE', 'Bạn chưa chọn %s để xóa !', 'You need choose %s to delete!', NULL);
INSERT INTO `nuy_languages` VALUES (35, 'QUICK_POST', 'Đăng nhanh', 'Quick Post', NULL);
INSERT INTO `nuy_languages` VALUES (36, 'INSERT', 'Thêm mới ', 'Add', NULL);
INSERT INTO `nuy_languages` VALUES (37, 'DELETE', 'Xóa', 'Delete', NULL);
INSERT INTO `nuy_languages` VALUES (38, 'REFRESH', 'Làm mới', 'Refresh', NULL);
INSERT INTO `nuy_languages` VALUES (39, 'ADVANCE_SEARCH', 'Tìm kiếm nâng cao', 'Advance Search', NULL);
INSERT INTO `nuy_languages` VALUES (40, 'FILTER', 'Lọc', 'Filter', NULL);
INSERT INTO `nuy_languages` VALUES (41, 'SEARCH', 'Tìm kiếm', 'Search', NULL);
INSERT INTO `nuy_languages` VALUES (42, 'CLOSE', 'Đóng', 'Close', NULL);
INSERT INTO `nuy_languages` VALUES (43, 'SUM', 'Tổng số', 'Sum', NULL);
INSERT INTO `nuy_languages` VALUES (44, 'FUNCTION', 'Chức năng', 'Function', NULL);
INSERT INTO `nuy_languages` VALUES (45, 'ORDER', 'Sắp xếp', 'Order', NULL);
INSERT INTO `nuy_languages` VALUES (46, 'BY', 'Thứ tự', 'By', NULL);
INSERT INTO `nuy_languages` VALUES (47, 'SAVE', 'Lưu', 'Save', NULL);
INSERT INTO `nuy_languages` VALUES (48, 'LIST_GROUP_USERS', 'Danh sách nhóm người dùng trong hệ thống', 'List group users', NULL);
INSERT INTO `nuy_languages` VALUES (49, 'LIST_ROLE', 'Danh sách quyền', 'List roles', NULL);
INSERT INTO `nuy_languages` VALUES (50, 'EDIT', 'Chỉnh sửa', 'Edit', NULL);
INSERT INTO `nuy_languages` VALUES (51, 'BACK', 'Quay lại', 'Back', NULL);
INSERT INTO `nuy_languages` VALUES (52, 'PLUGIN_MANAGER', 'Quản trị Plugin', 'Plugin Manager', NULL);
INSERT INTO `nuy_languages` VALUES (53, 'ACTIVE', 'Kích hoạt', 'Active', NULL);
INSERT INTO `nuy_languages` VALUES (54, 'DEACTIVE', 'Hủy kích hoạt', 'Deactive', NULL);
INSERT INTO `nuy_languages` VALUES (55, 'ALL_ITEM', 'Tất cả', 'All items', NULL);
INSERT INTO `nuy_languages` VALUES (56, 'FROM', 'Từ', 'From', NULL);
INSERT INTO `nuy_languages` VALUES (57, 'TO', 'Đến', 'To', NULL);
INSERT INTO `nuy_languages` VALUES (58, 'SITEMAP', 'Sitemap', 'Sitemap', NULL);
INSERT INTO `nuy_languages` VALUES (59, 'ROBOT', 'Robots.txt', 'Robots.txt', NULL);
INSERT INTO `nuy_languages` VALUES (60, 'MEDIA_MANAGER', 'Quản lỳ File', 'Media Manager', NULL);
INSERT INTO `nuy_languages` VALUES (61, 'HTACCESS', 'Htaccess', 'Htaccess', NULL);
INSERT INTO `nuy_languages` VALUES (62, 'CHOOSE', 'Lựa chọn', 'Choose', NULL);
INSERT INTO `nuy_languages` VALUES (63, 'EDIT_INFO', 'Sửa thông tin cơ bản', 'Edit information', NULL);
INSERT INTO `nuy_languages` VALUES (64, 'TYPING_SEARCH', 'Gõ để tìm kiếm', 'Type for search', NULL);
INSERT INTO `nuy_languages` VALUES (65, 'NO_PERMISSION', 'Bạn không có quyền thực hiện tác vụ này', 'You do not have permission to perform this action', NULL);
INSERT INTO `nuy_languages` VALUES (66, 'MISSING_PARAM', 'Thiếu thông tin dữ liệu', 'Missing Params...', NULL);
INSERT INTO `nuy_languages` VALUES (67, 'UPDATED', 'Đã cập nhật', 'Updated', NULL);
INSERT INTO `nuy_languages` VALUES (68, 'PASS_CHANGE_SUCCESS', 'Đổi mật khẩu thành công!Bạn cần thực hiện đăng nhập lại.', 'Password successfully changed! You need to login again.', NULL);
INSERT INTO `nuy_languages` VALUES (69, 'PASS_CHANGE_FAIL', 'Đổi mật khẩu thất bại!', 'Password change failed!', NULL);
INSERT INTO `nuy_languages` VALUES (70, 'WRONG_OLD_PASS', 'Sai mật khẩu cũ!', 'Wrong old password!', NULL);
INSERT INTO `nuy_languages` VALUES (71, 'UPDATE_FAIL', 'Cập nhật thất bại', 'Update failed!', NULL);
INSERT INTO `nuy_languages` VALUES (72, 'INSERT_SUCCESS', 'Thêm mới thành công', 'Insert success!', NULL);
INSERT INTO `nuy_languages` VALUES (73, 'INSERT_FAIL', 'Thêm mới thất bại', 'Insert failed!', NULL);
INSERT INTO `nuy_languages` VALUES (74, 'DELETE_SUCCESS', 'Xóa thành công', 'Delete success', NULL);
INSERT INTO `nuy_languages` VALUES (75, 'DELETE_FAIL', 'Xóa thất bại', 'Delete failed!', NULL);
INSERT INTO `nuy_languages` VALUES (76, 'UPDATE_SUCCESS', 'Cập nhật thành công', 'Update success!', NULL);

-- ----------------------------
-- Table structure for nuy_module
-- ----------------------------
DROP TABLE IF EXISTS `nuy_module`;
CREATE TABLE `nuy_module`  (
  `id` int(11) NOT NULL AUTO_INCREMENT COMMENT 'Mã chức năng',
  `note` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NULL DEFAULT NULL COMMENT 'Tên chức năng',
  `name` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NULL DEFAULT NULL COMMENT 'Ghi chú',
  `path` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NULL DEFAULT NULL COMMENT 'Path',
  `parent` int(11) NULL DEFAULT NULL COMMENT 'Mã Nhóm chức năng',
  `code` int(255) NULL DEFAULT NULL COMMENT 'Mã Code',
  `note_en` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NULL DEFAULT NULL,
  PRIMARY KEY (`id`) USING BTREE
) ENGINE = InnoDB AUTO_INCREMENT = 798 CHARACTER SET = utf8mb4 COLLATE = utf8mb4_unicode_ci COMMENT = 'Module chức năng' ROW_FORMAT = COMPRESSED;

-- ----------------------------
-- Records of nuy_module
-- ----------------------------
INSERT INTO `nuy_module` VALUES (106, 'Thêm', 'insert', NULL, 32, 1, 'Insert');
INSERT INTO `nuy_module` VALUES (107, 'Sửa', 'edit', NULL, 32, 2, 'Edit');
INSERT INTO `nuy_module` VALUES (108, 'Xóa', 'delete', NULL, 32, 4, 'Delete');
INSERT INTO `nuy_module` VALUES (109, 'Copy', 'copy', NULL, 32, 8, 'Copy');
INSERT INTO `nuy_module` VALUES (122, 'Xem', 'view', NULL, 32, 16, 'Xem');
INSERT INTO `nuy_module` VALUES (128, 'Xem', 'view', NULL, 35, 1, 'Xem');
INSERT INTO `nuy_module` VALUES (129, 'Thêm', 'insert', NULL, 35, 2, 'Insert');
INSERT INTO `nuy_module` VALUES (130, 'Sửa', 'edit', NULL, 35, 4, 'Edit');
INSERT INTO `nuy_module` VALUES (131, 'Xóa', 'delete', NULL, 35, 8, 'Delete');
INSERT INTO `nuy_module` VALUES (132, 'Copy', 'copy', NULL, 35, 16, 'Copy');
INSERT INTO `nuy_module` VALUES (138, 'Xem', 'view', NULL, 37, 1, 'Xem');
INSERT INTO `nuy_module` VALUES (139, 'Thêm', 'insert', NULL, 37, 2, 'Insert');
INSERT INTO `nuy_module` VALUES (140, 'Sửa', 'edit', NULL, 37, 4, 'Edit');
INSERT INTO `nuy_module` VALUES (141, 'Xóa', 'delete', NULL, 37, 8, 'Delete');
INSERT INTO `nuy_module` VALUES (142, 'Copy', 'copy', NULL, 37, 16, 'Copy');
INSERT INTO `nuy_module` VALUES (143, 'Xem', 'view', NULL, 39, 1, 'Xem');
INSERT INTO `nuy_module` VALUES (144, 'Thêm', 'insert', NULL, 39, 2, 'Insert');
INSERT INTO `nuy_module` VALUES (145, 'Sửa', 'edit', NULL, 39, 4, 'Edit');
INSERT INTO `nuy_module` VALUES (146, 'Xóa', 'delete', NULL, 39, 8, 'Delete');
INSERT INTO `nuy_module` VALUES (147, 'Copy', 'copy', NULL, 39, 16, 'Copy');
INSERT INTO `nuy_module` VALUES (148, 'Xem', 'view', NULL, 40, 1, 'Xem');
INSERT INTO `nuy_module` VALUES (149, 'Thêm', 'insert', NULL, 40, 2, 'Insert');
INSERT INTO `nuy_module` VALUES (150, 'Sửa', 'edit', NULL, 40, 4, 'Edit');
INSERT INTO `nuy_module` VALUES (151, 'Xóa', 'delete', NULL, 40, 8, 'Delete');
INSERT INTO `nuy_module` VALUES (152, 'Copy', 'copy', NULL, 40, 16, 'Copy');
INSERT INTO `nuy_module` VALUES (153, 'Xem', 'view', NULL, 41, 1, 'Xem');
INSERT INTO `nuy_module` VALUES (154, 'Thêm', 'insert', NULL, 41, 2, 'Insert');
INSERT INTO `nuy_module` VALUES (155, 'Sửa', 'edit', NULL, 41, 4, 'Edit');
INSERT INTO `nuy_module` VALUES (156, 'Xóa', 'delete', NULL, 41, 8, 'Delete');
INSERT INTO `nuy_module` VALUES (157, 'Copy', 'copy', NULL, 41, 16, 'Copy');
INSERT INTO `nuy_module` VALUES (163, 'Xem', 'view', NULL, 44, 1, 'Xem');
INSERT INTO `nuy_module` VALUES (164, 'Thêm', 'insert', NULL, 44, 2, 'Insert');
INSERT INTO `nuy_module` VALUES (165, 'Sửa', 'edit', NULL, 44, 4, 'Edit');
INSERT INTO `nuy_module` VALUES (166, 'Xóa', 'delete', NULL, 44, 8, 'Delete');
INSERT INTO `nuy_module` VALUES (167, 'Copy', 'copy', NULL, 44, 16, 'Copy');
INSERT INTO `nuy_module` VALUES (178, 'Xem', 'view', NULL, 47, 1, 'Xem');
INSERT INTO `nuy_module` VALUES (179, 'Thêm', 'insert', NULL, 47, 2, 'Insert');
INSERT INTO `nuy_module` VALUES (180, 'Sửa', 'edit', NULL, 47, 4, 'Edit');
INSERT INTO `nuy_module` VALUES (181, 'Xóa', 'delete', NULL, 47, 8, 'Delete');
INSERT INTO `nuy_module` VALUES (182, 'Copy', 'copy', NULL, 47, 16, 'Copy');
INSERT INTO `nuy_module` VALUES (183, 'Xem', 'view', NULL, 49, 1, 'Xem');
INSERT INTO `nuy_module` VALUES (184, 'Thêm', 'insert', NULL, 49, 2, 'Insert');
INSERT INTO `nuy_module` VALUES (185, 'Sửa', 'edit', NULL, 49, 4, 'Edit');
INSERT INTO `nuy_module` VALUES (186, 'Xóa', 'delete', NULL, 49, 8, 'Delete');
INSERT INTO `nuy_module` VALUES (187, 'Copy', 'copy', NULL, 49, 16, 'Copy');
INSERT INTO `nuy_module` VALUES (188, 'Xem', 'view', NULL, 50, 1, 'Xem');
INSERT INTO `nuy_module` VALUES (189, 'Thêm', 'insert', NULL, 50, 2, 'Insert');
INSERT INTO `nuy_module` VALUES (190, 'Sửa', 'edit', NULL, 50, 4, 'Edit');
INSERT INTO `nuy_module` VALUES (191, 'Xóa', 'delete', NULL, 50, 8, 'Delete');
INSERT INTO `nuy_module` VALUES (192, 'Copy', 'copy', NULL, 50, 16, 'Copy');
INSERT INTO `nuy_module` VALUES (193, 'Xem', 'view', NULL, 51, 1, 'Xem');
INSERT INTO `nuy_module` VALUES (194, 'Thêm', 'insert', NULL, 51, 2, 'Insert');
INSERT INTO `nuy_module` VALUES (195, 'Sửa', 'edit', NULL, 51, 4, 'Edit');
INSERT INTO `nuy_module` VALUES (196, 'Xóa', 'delete', NULL, 51, 8, 'Delete');
INSERT INTO `nuy_module` VALUES (197, 'Copy', 'copy', NULL, 51, 16, 'Copy');
INSERT INTO `nuy_module` VALUES (198, 'Xem', 'view', NULL, 52, 1, 'Xem');
INSERT INTO `nuy_module` VALUES (199, 'Thêm', 'insert', NULL, 52, 2, 'Insert');
INSERT INTO `nuy_module` VALUES (200, 'Sửa', 'edit', NULL, 52, 4, 'Edit');
INSERT INTO `nuy_module` VALUES (201, 'Xóa', 'delete', NULL, 52, 8, 'Delete');
INSERT INTO `nuy_module` VALUES (202, 'Copy', 'copy', NULL, 52, 16, 'Copy');
INSERT INTO `nuy_module` VALUES (228, 'Xem', 'view', NULL, 60, 1, 'Xem');
INSERT INTO `nuy_module` VALUES (229, 'Thêm', 'insert', NULL, 60, 2, 'Insert');
INSERT INTO `nuy_module` VALUES (230, 'Sửa', 'edit', NULL, 60, 4, 'Edit');
INSERT INTO `nuy_module` VALUES (231, 'Xóa', 'delete', NULL, 60, 8, 'Delete');
INSERT INTO `nuy_module` VALUES (232, 'Copy', 'copy', NULL, 60, 16, 'Copy');
INSERT INTO `nuy_module` VALUES (233, 'Xem', 'view', NULL, 61, 1, 'Xem');
INSERT INTO `nuy_module` VALUES (234, 'Thêm', 'insert', NULL, 61, 2, 'Insert');
INSERT INTO `nuy_module` VALUES (235, 'Sửa', 'edit', NULL, 61, 4, 'Edit');
INSERT INTO `nuy_module` VALUES (236, 'Xóa', 'delete', NULL, 61, 8, 'Delete');
INSERT INTO `nuy_module` VALUES (237, 'Copy', 'copy', NULL, 61, 16, 'Copy');
INSERT INTO `nuy_module` VALUES (548, 'Xem', 'view', NULL, 119, 1, 'Xem');
INSERT INTO `nuy_module` VALUES (549, 'Thêm', 'insert', NULL, 119, 2, 'Insert');
INSERT INTO `nuy_module` VALUES (550, 'Sửa', 'edit', NULL, 119, 4, 'Edit');
INSERT INTO `nuy_module` VALUES (551, 'Xóa', 'delete', NULL, 119, 8, 'Delete');
INSERT INTO `nuy_module` VALUES (552, 'Copy', 'copy', NULL, 119, 16, 'Copy');
INSERT INTO `nuy_module` VALUES (573, 'Xem', 'view', NULL, 125, 1, 'Xem');
INSERT INTO `nuy_module` VALUES (574, 'Thêm', 'insert', NULL, 125, 2, 'Insert');
INSERT INTO `nuy_module` VALUES (575, 'Sửa', 'edit', NULL, 125, 4, 'Edit');
INSERT INTO `nuy_module` VALUES (576, 'Xóa', 'delete', NULL, 125, 8, 'Delete');
INSERT INTO `nuy_module` VALUES (577, 'Copy', 'copy', NULL, 125, 16, 'Copy');
INSERT INTO `nuy_module` VALUES (578, 'Xem', 'view', NULL, 126, 1, 'Xem');
INSERT INTO `nuy_module` VALUES (579, 'Copy', 'copy', NULL, 126, 16, 'Copy');
INSERT INTO `nuy_module` VALUES (580, 'Xóa', 'delete', NULL, 126, 8, 'Delete');
INSERT INTO `nuy_module` VALUES (581, 'Sửa', 'edit', NULL, 126, 4, 'Edit');
INSERT INTO `nuy_module` VALUES (582, 'Thêm', 'insert', NULL, 126, 2, 'Insert');
INSERT INTO `nuy_module` VALUES (623, 'Xem', 'view', NULL, 137, 1, 'Xem');
INSERT INTO `nuy_module` VALUES (624, 'Thêm', 'insert', NULL, 137, 2, 'Insert');
INSERT INTO `nuy_module` VALUES (625, 'Sửa', 'edit', NULL, 137, 4, 'Edit');
INSERT INTO `nuy_module` VALUES (626, 'Xóa', 'delete', NULL, 137, 8, 'Delete');
INSERT INTO `nuy_module` VALUES (627, 'Copy', 'copy', NULL, 137, 16, 'Copy');
INSERT INTO `nuy_module` VALUES (723, 'Xem', 'view', NULL, 159, 1, 'Xem');
INSERT INTO `nuy_module` VALUES (724, 'Thêm', 'insert', NULL, 159, 2, 'Insert');
INSERT INTO `nuy_module` VALUES (725, 'Sửa', 'edit', NULL, 159, 4, 'Edit');
INSERT INTO `nuy_module` VALUES (726, 'Xóa', 'delete', NULL, 159, 8, 'Delete');
INSERT INTO `nuy_module` VALUES (727, 'Copy', 'copy', NULL, 159, 16, 'Copy');
INSERT INTO `nuy_module` VALUES (728, 'Xem', 'view', NULL, 161, 1, 'Xem');
INSERT INTO `nuy_module` VALUES (729, 'Thêm', 'insert', NULL, 161, 2, 'Insert');
INSERT INTO `nuy_module` VALUES (730, 'Sửa', 'edit', NULL, 161, 4, 'Edit');
INSERT INTO `nuy_module` VALUES (731, 'Xóa', 'delete', NULL, 161, 8, 'Delete');
INSERT INTO `nuy_module` VALUES (732, 'Copy', 'copy', NULL, 161, 16, 'Copy');
INSERT INTO `nuy_module` VALUES (733, 'Xem', 'view', NULL, 162, 1, 'Xem');
INSERT INTO `nuy_module` VALUES (734, 'Thêm', 'insert', NULL, 162, 2, 'Insert');
INSERT INTO `nuy_module` VALUES (735, 'Sửa', 'edit', NULL, 162, 4, 'Edit');
INSERT INTO `nuy_module` VALUES (736, 'Xóa', 'delete', NULL, 162, 8, 'Delete');
INSERT INTO `nuy_module` VALUES (737, 'Copy', 'copy', NULL, 162, 16, 'Copy');
INSERT INTO `nuy_module` VALUES (758, 'Xem', 'view', NULL, 167, 1, 'Xem');
INSERT INTO `nuy_module` VALUES (759, 'Thêm', 'insert', NULL, 167, 2, 'Insert');
INSERT INTO `nuy_module` VALUES (760, 'Sửa', 'edit', NULL, 167, 4, 'Edit');
INSERT INTO `nuy_module` VALUES (761, 'Xóa', 'delete', NULL, 167, 8, 'Delete');
INSERT INTO `nuy_module` VALUES (762, 'Copy', 'copy', NULL, 167, 16, 'Copy');
INSERT INTO `nuy_module` VALUES (783, 'Xem', 'view', NULL, 172, 1, 'Xem');
INSERT INTO `nuy_module` VALUES (784, 'Thêm', 'insert', NULL, 172, 2, 'Insert');
INSERT INTO `nuy_module` VALUES (785, 'Sửa', 'edit', NULL, 172, 4, 'Edit');
INSERT INTO `nuy_module` VALUES (786, 'Xóa', 'delete', NULL, 172, 8, 'Delete');
INSERT INTO `nuy_module` VALUES (787, 'Copy', 'copy', NULL, 172, 16, 'Copy');
INSERT INTO `nuy_module` VALUES (788, 'Xem', 'view', NULL, 174, 1, NULL);
INSERT INTO `nuy_module` VALUES (789, 'Thêm', 'insert', NULL, 174, 2, NULL);
INSERT INTO `nuy_module` VALUES (790, 'Sửa', 'edit', NULL, 174, 4, NULL);
INSERT INTO `nuy_module` VALUES (791, 'Xóa', 'delete', NULL, 174, 8, NULL);
INSERT INTO `nuy_module` VALUES (792, 'Copy', 'copy', NULL, 174, 16, NULL);
INSERT INTO `nuy_module` VALUES (793, 'Xem', 'view', NULL, 175, 1, NULL);
INSERT INTO `nuy_module` VALUES (794, 'Thêm', 'insert', NULL, 175, 2, NULL);
INSERT INTO `nuy_module` VALUES (795, 'Sửa', 'edit', NULL, 175, 4, NULL);
INSERT INTO `nuy_module` VALUES (796, 'Xóa', 'delete', NULL, 175, 8, NULL);
INSERT INTO `nuy_module` VALUES (797, 'Copy', 'copy', NULL, 175, 16, NULL);

-- ----------------------------
-- Table structure for nuy_role
-- ----------------------------
DROP TABLE IF EXISTS `nuy_role`;
CREATE TABLE `nuy_role`  (
  `id` int(11) NOT NULL AUTO_INCREMENT COMMENT 'Mã quyền',
  `group_module_id` int(11) NULL DEFAULT NULL COMMENT 'Mã nhóm chức năng',
  `group_user_id` int(11) NULL DEFAULT NULL COMMENT 'Mã nhóm người dùng',
  `role` varchar(11) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NULL DEFAULT NULL COMMENT 'Quyền',
  PRIMARY KEY (`id`) USING BTREE,
  INDEX `idx_gr_id`(`group_module_id`) USING BTREE,
  INDEX `id_gr_u_id`(`group_user_id`) USING BTREE,
  INDEX `idx_m_u`(`group_module_id`, `group_user_id`) USING BTREE
) ENGINE = InnoDB AUTO_INCREMENT = 399 CHARACTER SET = utf8mb4 COLLATE = utf8mb4_unicode_ci COMMENT = 'Phân quyền' ROW_FORMAT = COMPRESSED;

-- ----------------------------
-- Records of nuy_role
-- ----------------------------
INSERT INTO `nuy_role` VALUES (55, 32, 1, '255');
INSERT INTO `nuy_role` VALUES (89, 35, 1, '31');
INSERT INTO `nuy_role` VALUES (91, 37, 1, '31');
INSERT INTO `nuy_role` VALUES (92, 39, 1, '31');
INSERT INTO `nuy_role` VALUES (93, 40, 1, '31');
INSERT INTO `nuy_role` VALUES (94, 41, 1, '31');
INSERT INTO `nuy_role` VALUES (96, 44, 1, '0');
INSERT INTO `nuy_role` VALUES (99, 47, 1, '0');
INSERT INTO `nuy_role` VALUES (100, 49, 1, '31');
INSERT INTO `nuy_role` VALUES (101, 50, 1, '31');
INSERT INTO `nuy_role` VALUES (102, 51, 1, '31');
INSERT INTO `nuy_role` VALUES (103, 52, 1, '31');
INSERT INTO `nuy_role` VALUES (124, 60, 1, '31');
INSERT INTO `nuy_role` VALUES (125, 61, 1, '31');
INSERT INTO `nuy_role` VALUES (210, 119, 1, '31');
INSERT INTO `nuy_role` VALUES (217, 125, 1, '31');
INSERT INTO `nuy_role` VALUES (219, 126, 1, '31');
INSERT INTO `nuy_role` VALUES (227, 137, 1, '31');
INSERT INTO `nuy_role` VALUES (247, 159, 1, '31');
INSERT INTO `nuy_role` VALUES (248, 161, 1, '31');
INSERT INTO `nuy_role` VALUES (249, 162, 1, '31');
INSERT INTO `nuy_role` VALUES (254, 167, 1, '31');
INSERT INTO `nuy_role` VALUES (276, 60, 5, '0');
INSERT INTO `nuy_role` VALUES (277, 119, 5, '23');
INSERT INTO `nuy_role` VALUES (279, 162, 5, '0');
INSERT INTO `nuy_role` VALUES (280, 126, 5, '0');
INSERT INTO `nuy_role` VALUES (281, 125, 5, '0');
INSERT INTO `nuy_role` VALUES (282, 52, 5, '0');
INSERT INTO `nuy_role` VALUES (283, 49, 5, '0');
INSERT INTO `nuy_role` VALUES (288, 167, 5, '0');
INSERT INTO `nuy_role` VALUES (291, 137, 5, '0');
INSERT INTO `nuy_role` VALUES (292, 50, 5, '23');
INSERT INTO `nuy_role` VALUES (293, 47, 5, '0');
INSERT INTO `nuy_role` VALUES (294, 44, 5, '0');
INSERT INTO `nuy_role` VALUES (295, 41, 5, '0');
INSERT INTO `nuy_role` VALUES (296, 40, 5, '0');
INSERT INTO `nuy_role` VALUES (297, 39, 5, '0');
INSERT INTO `nuy_role` VALUES (299, 35, 5, '0');
INSERT INTO `nuy_role` VALUES (302, 159, 5, '0');
INSERT INTO `nuy_role` VALUES (303, 61, 5, '0');
INSERT INTO `nuy_role` VALUES (305, 161, 5, '23');
INSERT INTO `nuy_role` VALUES (306, 51, 5, '23');
INSERT INTO `nuy_role` VALUES (307, 37, 5, '23');
INSERT INTO `nuy_role` VALUES (313, 119, 4, '23');
INSERT INTO `nuy_role` VALUES (317, 126, 4, '0');
INSERT INTO `nuy_role` VALUES (318, 125, 4, '0');
INSERT INTO `nuy_role` VALUES (319, 60, 4, '0');
INSERT INTO `nuy_role` VALUES (320, 52, 4, '0');
INSERT INTO `nuy_role` VALUES (321, 49, 4, '0');
INSERT INTO `nuy_role` VALUES (322, 167, 4, '0');
INSERT INTO `nuy_role` VALUES (324, 137, 4, '0');
INSERT INTO `nuy_role` VALUES (325, 50, 4, '0');
INSERT INTO `nuy_role` VALUES (326, 47, 4, '0');
INSERT INTO `nuy_role` VALUES (327, 44, 4, '0');
INSERT INTO `nuy_role` VALUES (328, 41, 4, '0');
INSERT INTO `nuy_role` VALUES (329, 39, 4, '0');
INSERT INTO `nuy_role` VALUES (331, 35, 4, '0');
INSERT INTO `nuy_role` VALUES (332, 159, 4, '0');
INSERT INTO `nuy_role` VALUES (333, 61, 4, '0');
INSERT INTO `nuy_role` VALUES (334, 51, 4, '23');
INSERT INTO `nuy_role` VALUES (335, 37, 4, '23');
INSERT INTO `nuy_role` VALUES (340, 172, 1, '31');
INSERT INTO `nuy_role` VALUES (367, 199, 1, '255');
INSERT INTO `nuy_role` VALUES (394, 199, 1, '255');
INSERT INTO `nuy_role` VALUES (395, 200, 1, '255');
INSERT INTO `nuy_role` VALUES (396, 201, 1, '255');
INSERT INTO `nuy_role` VALUES (397, 174, 1, '255');
INSERT INTO `nuy_role` VALUES (398, 175, 1, '255');

-- ----------------------------
-- Table structure for nuy_routes
-- ----------------------------
DROP TABLE IF EXISTS `nuy_routes`;
CREATE TABLE `nuy_routes`  (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `controller` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NULL DEFAULT NULL,
  `link` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NULL DEFAULT NULL,
  `img` varchar(1000) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NULL DEFAULT NULL,
  `title_seo` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NULL DEFAULT NULL,
  `des_seo` text CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NULL,
  `key_seo` text CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NULL,
  `root` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NULL DEFAULT NULL,
  `note` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NULL DEFAULT NULL,
  `table` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NULL DEFAULT NULL,
  `tag_id` int(11) NULL DEFAULT NULL,
  `create_time` bigint(20) NULL DEFAULT NULL,
  `update_time` bigint(20) NULL DEFAULT NULL,
  `is_static` tinyint(4) NULL DEFAULT 0 COMMENT 'Link tĩnh',
  `en_title_seo` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL,
  `en_des_seo` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL,
  `en_key_seo` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL,
  `menu` int(11) NULL DEFAULT NULL COMMENT 'Nhóm menu',
  PRIMARY KEY (`id`) USING BTREE,
  INDEX `idx_tag`(`tag_id`) USING BTREE
) ENGINE = InnoDB AUTO_INCREMENT = 1 CHARACTER SET = utf8mb4 COLLATE = utf8mb4_unicode_ci ROW_FORMAT = COMPRESSED;

-- ----------------------------
-- Table structure for nuy_table
-- ----------------------------
DROP TABLE IF EXISTS `nuy_table`;
CREATE TABLE `nuy_table`  (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `name` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NULL DEFAULT NULL COMMENT 'Tên',
  `note` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NULL DEFAULT NULL COMMENT 'Ghi chú',
  `map_table` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NULL DEFAULT NULL COMMENT 'Bảng liên kết',
  `create_time` bigint(20) NULL DEFAULT NULL COMMENT 'Thời gian tạo',
  `act` tinyint(4) NULL DEFAULT 1 COMMENT 'Kích hoạt',
  `pagination` tinyint(4) NULL DEFAULT 1 COMMENT 'Phân trang (Frontend)',
  `table_parent` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NULL DEFAULT NULL COMMENT 'Bảng cha',
  `table_child` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NULL DEFAULT NULL COMMENT 'Bảng con',
  `controller` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NULL DEFAULT NULL COMMENT 'Controller',
  `rpp_admin` int(11) NULL DEFAULT NULL COMMENT 'Số bản ghi/1 trang admin',
  `rpp_view` int(11) NULL DEFAULT NULL COMMENT 'Số bản ghi/1 trang frontend',
  `orient` int(11) NULL DEFAULT NULL COMMENT 'Chiều hiển thị bảng',
  `type` int(11) NULL DEFAULT NULL COMMENT 'Loại bảng',
  `insert` tinyint(4) NULL DEFAULT 1,
  `delete` tinyint(4) NULL DEFAULT 1,
  `edit` tinyint(4) NULL DEFAULT 1,
  `help` tinyint(4) NULL DEFAULT 1,
  `search` tinyint(4) NULL DEFAULT 1,
  `quickpost` tinyint(4) NULL DEFAULT 0,
  `copy` tinyint(4) NULL DEFAULT 0,
  `showinmenu` tinyint(4) NULL DEFAULT 0,
  `dashboard` tinyint(4) NULL DEFAULT NULL,
  `quickaccess` tinyint(4) NULL DEFAULT NULL,
  `ext` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NULL DEFAULT NULL,
  `note_en` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NULL DEFAULT NULL,
  `help_view_link` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NULL DEFAULT NULL,
  `help_edit_link` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NULL DEFAULT NULL,
  PRIMARY KEY (`id`) USING BTREE
) ENGINE = InnoDB AUTO_INCREMENT = 137 CHARACTER SET = utf8mb4 COLLATE = utf8mb4_unicode_ci ROW_FORMAT = COMPRESSED;

-- ----------------------------
-- Records of nuy_table
-- ----------------------------
INSERT INTO `nuy_table` VALUES (10, 'nuy_user', 'Tài khoản', 'nuy_user', 1449740743, 1, 1, '', '', 'nuy_user.view', 10, 10, 1, 1, 1, 1, 1, 1, 1, 0, 1, 0, NULL, NULL, NULL, 'Admin user', 'https://tech5s.gitbook.io/huong-dan-quan-tri-website/nang-cao/quan-ly-phan-quyen-va-cac-tai-khoan-su-dung-quan-tri', 'https://tech5s.gitbook.io/huong-dan-quan-tri-website/nang-cao/quan-ly-phan-quyen-va-cac-tai-khoan-su-dung-quan-tri');
INSERT INTO `nuy_table` VALUES (12, 'news_categories', 'Danh mục tin', 'news_categories', 1450256645, 1, 1, 'news_categories', 'news', 'news_categories.view', 10, 3, 1, 6, 1, 1, 1, 1, 1, 0, 1, 1, 1, 1, NULL, 'News Categories', 'https://tech5s.gitbook.io/huong-dan-quan-tri-website/tin-tuc/danh-muc-tin-tuc', 'https://tech5s.gitbook.io/huong-dan-quan-tri-website/tin-tuc/danh-muc-tin-tuc/them-moi-danh-muc-tin-tuc');
INSERT INTO `nuy_table` VALUES (13, 'nuy_group_user', 'Nhóm User', 'nuy_group_user', 1450257045, 1, 0, '', '', 'nuy_group_user.view', 10, 10, 1, 1, 1, 1, 1, 1, 1, 0, 1, 0, NULL, NULL, NULL, 'User Groups', 'https://tech5s.gitbook.io/huong-dan-quan-tri-website/nang-cao/quan-ly-phan-quyen-va-cac-tai-khoan-su-dung-quan-tri', 'https://tech5s.gitbook.io/huong-dan-quan-tri-website/nang-cao/quan-ly-phan-quyen-va-cac-tai-khoan-su-dung-quan-tri');
INSERT INTO `nuy_table` VALUES (14, 'nuy_group_module', 'Nhóm Module', 'nuy_group_module', 1450257089, 1, 0, '', '', 'nuy_group_module.view', 10, 10, 1, 1, 1, 1, 1, 1, 1, 0, 1, 0, NULL, NULL, NULL, 'Module Groups', NULL, NULL);
INSERT INTO `nuy_table` VALUES (15, 'nuy_role', 'Quyền', 'nuy_role', 1450257106, 1, 0, '', '', 'nuy_role.view', 10, 10, 1, 4, 1, 1, 1, 1, 1, 0, 1, 0, NULL, NULL, NULL, 'Permission', 'https://tech5s.gitbook.io/huong-dan-quan-tri-website/nang-cao/quan-ly-phan-quyen-va-cac-tai-khoan-su-dung-quan-tri', 'https://tech5s.gitbook.io/huong-dan-quan-tri-website/nang-cao/quan-ly-phan-quyen-va-cac-tai-khoan-su-dung-quan-tri');
INSERT INTO `nuy_table` VALUES (17, 'nuy_detail_table', 'Chi tiết bảng', 'nuy_detail_table', 1450257634, 1, 0, '', '', 'nuy_detail_table.view', 10, 10, 1, 1, 1, 1, 1, 1, 1, 0, 1, 0, NULL, NULL, NULL, 'Detail Table', NULL, NULL);
INSERT INTO `nuy_table` VALUES (20, 'nuy_table', 'Bảng', 'nuy_table', 1450285088, 1, 0, '', '', 'nuy_table.view', 10, 10, 1, 1, 1, 1, 1, 1, 1, 0, 1, 0, NULL, NULL, NULL, 'Tables', NULL, NULL);
INSERT INTO `nuy_table` VALUES (21, 'configs', 'Cấu hình', 'configs', 1450317412, 1, 0, '', '', 'configs.view', 10000000, 1000000, 1, 2, 1, 1, 1, 1, 1, 0, 1, 0, NULL, NULL, 'en,cn,vi,jp', 'Config', 'https://tech5s.gitbook.io/huong-dan-quan-tri-website/cau-hinh/cau-hinh', 'https://tech5s.gitbook.io/huong-dan-quan-tri-website/cau-hinh/thong-tin');
INSERT INTO `nuy_table` VALUES (22, 'menu', 'Menu', 'menu', 1450318317, 1, 0, '', '', 'menu.view', 10, 10, 1, 6, 1, 1, 1, 1, 1, 0, 1, 0, NULL, 1, NULL, 'Menu', 'https://tech5s.gitbook.io/huong-dan-quan-tri-website/menu', 'https://tech5s.gitbook.io/huong-dan-quan-tri-website/menu/them-moi-menu');
INSERT INTO `nuy_table` VALUES (23, 'news', 'Tin tức', 'news', 1450342344, 1, 0, 'news_categories', '', 'news.view', 10, 5, 1, 1, 1, 1, 1, 1, 1, 1, 1, 1, 1, 1, NULL, 'News', 'https://tech5s.gitbook.io/huong-dan-quan-tri-website/tin-tuc/tin-tuc', 'https://tech5s.gitbook.io/huong-dan-quan-tri-website/tin-tuc/tin-tuc/them-moi-tin-tuc');
INSERT INTO `nuy_table` VALUES (24, 'nuy_config', 'Cấu hình Tech 5s', 'nuy_config', 1450492626, 1, 0, '', '', 'nuy_config.view', 10, 10, 1, 1, 1, 1, 1, 1, 1, 0, 1, 0, 0, NULL, NULL, 'Config Tech5s', '', '');
INSERT INTO `nuy_table` VALUES (25, 'pro', 'Sản phẩm', 'pro', 1450493467, 1, 0, 'pro_categories', '', 'pro.view', 10, 10, 1, 1, 1, 1, 1, 1, 1, 1, 1, 1, 0, 0, '', 'Products', 'https://tech5s.gitbook.io/huong-dan-quan-tri-website/san-pham/san-pham', 'https://tech5s.gitbook.io/huong-dan-quan-tri-website/san-pham/san-pham/them-moi-san-pham');
INSERT INTO `nuy_table` VALUES (26, 'pro_categories', 'Danh mục sản phẩm', 'pro_categories', 1450493507, 1, 1, 'pro_categories', 'pro', 'pro_categories.view', 10, 8, 1, 1, 1, 1, 1, 1, 1, 0, 1, 1, 0, 0, '', 'Product Categories', 'https://tech5s.gitbook.io/huong-dan-quan-tri-website/san-pham/danh-muc-san-pham', 'https://tech5s.gitbook.io/huong-dan-quan-tri-website/san-pham/danh-muc-san-pham/them-moi-danh-muc-san-pham');
INSERT INTO `nuy_table` VALUES (30, 'nuy_routes', 'Link', 'nuy_routes', 1451368127, 1, 0, '', '', 'nuy_routes.view', 10, 10, 1, 1, 1, 1, 1, 0, 1, 0, 0, 0, NULL, NULL, NULL, 'Link', NULL, NULL);
INSERT INTO `nuy_table` VALUES (31, 'reviews', 'Thông tin liên hệ', 'reviews', 1451371645, 1, 0, '', '', '', 10, 10, 1, 1, 1, 1, 1, 1, 1, 0, 1, 0, 1, 0, '', 'Contacts', 'https://tech5s.gitbook.io/huong-dan-quan-tri-website/thong-tin-lien-he', 'https://tech5s.gitbook.io/huong-dan-quan-tri-website/thong-tin-lien-he/them-moi-thong-tin-lien-he');
INSERT INTO `nuy_table` VALUES (88, 'medias', 'Media Version 2', 'medias', 1481855609, 1, 0, '', '', '', 10, 10, 1, 1, 1, 1, 1, 1, 1, 0, 1, 0, NULL, NULL, NULL, 'Media Version 2', 'https://tech5s.gitbook.io/huong-dan-quan-tri-website/kho-media/kho-media-hinh-anh', 'https://tech5s.gitbook.io/huong-dan-quan-tri-website/kho-media/kho-media-hinh-anh');
INSERT INTO `nuy_table` VALUES (103, 'slide', 'Slide', 'slide', 1483494767, 1, 0, '', '', 'slide.view', 10, 10, 1, 1, 1, 1, 1, 1, 1, 0, 1, 0, 0, 1, NULL, 'Slide', 'https://tech5s.gitbook.io/huong-dan-quan-tri-website/slide-anh', 'https://tech5s.gitbook.io/huong-dan-quan-tri-website/slide-anh/them-moi-slide-anh');
INSERT INTO `nuy_table` VALUES (122, 'order', 'Đơn hàng', 'order', 1493880273, 1, 1, '', '', 'order.view', 10, 10, 1, 1, 1, 1, 1, 1, 1, 0, 1, 0, 1, NULL, NULL, 'Orders', 'https://tech5s.gitbook.io/huong-dan-quan-tri-website/don-hang', 'https://tech5s.gitbook.io/huong-dan-quan-tri-website/don-hang/don-hang');
INSERT INTO `nuy_table` VALUES (123, 'tag', 'Tag tin tức', 'tag', 1493884621, 1, 1, '', '', 'tag.view', 10, 10, 1, 1, 1, 1, 1, 1, 1, 0, 1, 0, 1, NULL, NULL, 'News Tag', 'https://tech5s.gitbook.io/huong-dan-quan-tri-website/tin-tuc/tag-tin-tuc-neu-co', 'https://tech5s.gitbook.io/huong-dan-quan-tri-website/tin-tuc/tag-tin-tuc-neu-co/them-moi-tag-tin-tuc');
INSERT INTO `nuy_table` VALUES (124, 'tag_pro', 'Tag sản phẩm', 'tag_pro', 1493884654, 1, 1, '', '', 'tag_pro.view', 10, 10, 1, 1, 1, 1, 1, 1, 1, 0, 1, 0, NULL, NULL, NULL, 'Products Tag', 'https://tech5s.gitbook.io/huong-dan-quan-tri-website/san-pham/tag-san-pham-neu-co', 'https://tech5s.gitbook.io/huong-dan-quan-tri-website/san-pham/tag-san-pham-neu-co/them-moi-tag-san-pham');
INSERT INTO `nuy_table` VALUES (129, 'partner', 'Đối tác', 'partner', 1494822823, 1, 1, '', '', 'partner.view', 10, 10, 1, 1, 1, 1, 1, 1, 1, 0, 1, 0, NULL, NULL, NULL, 'Partner', 'https://tech5s.gitbook.io/huong-dan-quan-tri-website/doi-tac', 'https://tech5s.gitbook.io/huong-dan-quan-tri-website/doi-tac/them-moi-doi-tac');
INSERT INTO `nuy_table` VALUES (134, 'languages', 'Ngôn ngữ', 'languages', 1570153061, 1, 1, '', '', 'languages.view', 1000, 10, 1, 1, 1, 1, 1, 1, 1, 0, 1, 0, NULL, NULL, NULL, 'Languages', 'https://tech5s.gitbook.io/huong-dan-quan-tri-website/languages', 'https://tech5s.gitbook.io/huong-dan-quan-tri-website/languages/them-moi-ngon-ngu');

-- ----------------------------
-- Table structure for nuy_user
-- ----------------------------
DROP TABLE IF EXISTS `nuy_user`;
CREATE TABLE `nuy_user`  (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `username` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NULL DEFAULT NULL,
  `password` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NULL DEFAULT NULL,
  `act` int(11) NULL DEFAULT NULL,
  `create_time` bigint(20) NULL DEFAULT NULL,
  `note` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NULL DEFAULT NULL,
  `parent` int(11) NULL DEFAULT NULL,
  `email` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NULL DEFAULT NULL,
  PRIMARY KEY (`id`) USING BTREE
) ENGINE = InnoDB AUTO_INCREMENT = 5 CHARACTER SET = utf8mb4 COLLATE = utf8mb4_unicode_ci ROW_FORMAT = COMPRESSED;

-- ----------------------------
-- Records of nuy_user
-- ----------------------------
INSERT INTO `nuy_user` VALUES (4, 'admin', '$2a$08$Y30ndaUamGuj6GbPd0Ix4.riM.X4kWLuF8CtTMxd.vmg4gMmRTR7a', 1, 3600, '', 1, 'nguyenvanan9889@gmail.com');

-- ----------------------------
-- Table structure for order
-- ----------------------------
DROP TABLE IF EXISTS `order`;
CREATE TABLE `order`  (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `create_time` text CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NULL COMMENT 'Thời gian gửi',
  `info_customer` text CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NULL COMMENT 'Thông tin khách hàng',
  `info_pro` text CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NULL COMMENT 'Thông tin sản phẩm',
  `act` tinyint(4) NULL DEFAULT 0 COMMENT 'Trạng thái',
  `city` int(4) NULL DEFAULT NULL,
  `provide` int(4) NULL DEFAULT NULL,
  `pro` text CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NULL COMMENT 'Pro',
  `viewed` tinyint(4) NULL DEFAULT 0,
  PRIMARY KEY (`id`) USING BTREE
) ENGINE = InnoDB AUTO_INCREMENT = 1 CHARACTER SET = utf8mb4 COLLATE = utf8mb4_unicode_ci ROW_FORMAT = COMPRESSED;

-- ----------------------------
-- Table structure for partner
-- ----------------------------
DROP TABLE IF EXISTS `partner`;
CREATE TABLE `partner`  (
  `id` int(11) NOT NULL AUTO_INCREMENT COMMENT 'Mã đối tác',
  `name` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NULL DEFAULT NULL COMMENT 'Tên đối tác',
  `content` text CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NULL COMMENT 'Mô tả',
  `short_content` text CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NULL COMMENT 'Mô tả ngắn',
  `img` text CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NULL COMMENT 'Hình ảnh',
  `act` tinyint(4) NULL DEFAULT 1 COMMENT 'Kích hoạt',
  `create_time` bigint(20) NULL DEFAULT NULL COMMENT 'Thời gian tạo',
  `link` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NULL DEFAULT NULL COMMENT 'Link',
  `ord` int(11) NOT NULL,
  `home` tinyint(1) NOT NULL DEFAULT 0,
  `group_id` tinyint(1) NOT NULL,
  PRIMARY KEY (`id`) USING BTREE
) ENGINE = InnoDB AUTO_INCREMENT = 1 CHARACTER SET = utf8mb4 COLLATE = utf8mb4_unicode_ci COMMENT = 'Đối tác' ROW_FORMAT = COMPRESSED;

-- ----------------------------
-- Table structure for pivots
-- ----------------------------
DROP TABLE IF EXISTS `pivots`;
CREATE TABLE `pivots`  (
  `id` bigint(20) NOT NULL AUTO_INCREMENT,
  `sub_id` int(11) NULL DEFAULT NULL,
  `parent_id` int(11) NULL DEFAULT NULL,
  `sub_table` varchar(50) CHARACTER SET latin1 COLLATE latin1_swedish_ci NULL DEFAULT NULL,
  `parent_table` varchar(50) CHARACTER SET latin1 COLLATE latin1_swedish_ci NULL DEFAULT NULL,
  `create_time` int(11) NULL DEFAULT NULL,
  `update_time` int(11) NULL DEFAULT NULL,
  `field_map` varchar(20) CHARACTER SET latin1 COLLATE latin1_swedish_ci NULL DEFAULT NULL,
  PRIMARY KEY (`id`) USING BTREE,
  INDEX `idx_sub_id`(`sub_id`) USING BTREE,
  INDEX `idx_parent_id`(`parent_id`) USING BTREE,
  INDEX `idx_sub_table`(`sub_table`(6)) USING BTREE,
  INDEX `idx_parent_table`(`parent_table`(6)) USING BTREE,
  INDEX `idx_field`(`field_map`(4)) USING BTREE
) ENGINE = InnoDB AUTO_INCREMENT = 1 CHARACTER SET = latin1 COLLATE = latin1_swedish_ci ROW_FORMAT = COMPRESSED;

-- ----------------------------
-- Table structure for pro
-- ----------------------------
DROP TABLE IF EXISTS `pro`;
CREATE TABLE `pro`  (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `name` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NULL DEFAULT NULL COMMENT 'Tên sản phẩm',
  `slug` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NULL DEFAULT NULL COMMENT 'Slug',
  `short_content` text CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NULL COMMENT 'Mô tả ngắn',
  `content` text CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NULL COMMENT 'Nội dung',
  `img` text CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NULL COMMENT 'Hình ảnh',
  `lib_img` text CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NULL COMMENT 'Thư viện ảnh',
  `parent` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NULL DEFAULT NULL COMMENT 'Danh mục sản phẩm',
  `create_time` bigint(20) NULL DEFAULT NULL COMMENT 'Thời gian tạo',
  `act` tinyint(4) NULL DEFAULT NULL COMMENT 'Kích hoạt',
  `price` float NULL DEFAULT NULL,
  `ord` int(11) NULL DEFAULT NULL COMMENT 'Sắp xếp',
  `count` int(11) NULL DEFAULT NULL COMMENT 'Số lượt xem',
  `publish_by` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NULL DEFAULT NULL COMMENT 'Đăng bởi',
  `s_title` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NULL DEFAULT NULL COMMENT 'Tiêu đề SEO',
  `s_des` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NULL DEFAULT NULL COMMENT 'Mô tả SEO',
  `home` tinyint(4) NOT NULL,
  `price_sale` float NULL DEFAULT NULL,
  `sale` tinyint(2) NOT NULL COMMENT 'Sản phẩm khuyến mại',
  `more` text CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL COMMENT 'Thông số kỹ thuật',
  `s_key` text CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL,
  `hot` tinyint(1) NULL DEFAULT NULL,
  `code` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL COMMENT 'Mã sản phẩm',
  `tag_pro` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NULL DEFAULT NULL,
  `update_time` bigint(20) NULL DEFAULT NULL COMMENT 'Ngày sửa',
  `banner` text CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NULL COMMENT 'Banner',
  PRIMARY KEY (`id`) USING BTREE,
  INDEX `idx_act`(`act`) USING BTREE,
  INDEX `idx_parent`(`parent`(191)) USING BTREE,
  INDEX `idx_tag_pro`(`tag_pro`(191)) USING BTREE,
  INDEX `idx_parent_act`(`parent`(191), `act`) USING BTREE,
  INDEX `act_parent_home`(`act`, `parent`(191), `home`) USING BTREE
) ENGINE = InnoDB AUTO_INCREMENT = 2 CHARACTER SET = utf8mb4 COLLATE = utf8mb4_unicode_ci ROW_FORMAT = COMPRESSED;

-- ----------------------------
-- Records of pro
-- ----------------------------
INSERT INTO `pro` VALUES (1, '', '', '', '', '', NULL, '', 1575087496, 0, NULL, 0, NULL, NULL, '', '', 0, NULL, 0, '', '', NULL, '', NULL, NULL, NULL);

-- ----------------------------
-- Table structure for pro_categories
-- ----------------------------
DROP TABLE IF EXISTS `pro_categories`;
CREATE TABLE `pro_categories`  (
  `id` int(11) NOT NULL AUTO_INCREMENT COMMENT 'Mã',
  `name` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NULL DEFAULT NULL COMMENT 'Tên',
  `slug` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NULL DEFAULT NULL COMMENT 'Slug',
  `img` text CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NULL COMMENT 'Hình ảnh',
  `short_content` text CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NULL COMMENT 'Mô tả ngắn',
  `content` text CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NULL COMMENT 'Nội dung',
  `lib_img` text CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL,
  `create_time` bigint(20) NULL DEFAULT NULL COMMENT 'Thời gian tạo',
  `ord` int(11) NULL DEFAULT NULL COMMENT 'Sắp xếp',
  `parent` int(11) NOT NULL DEFAULT 0 COMMENT 'Danh mục cha',
  `s_title` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NULL DEFAULT NULL COMMENT 'Tiêu đề SEO',
  `s_des` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NULL DEFAULT NULL COMMENT 'Mô tả SEO',
  `s_key` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NULL DEFAULT NULL COMMENT 'Từ khóa SEO',
  `count` int(11) NULL DEFAULT NULL COMMENT 'Số lượng xem',
  `act` tinyint(4) NULL DEFAULT NULL,
  `home` tinyint(1) NULL DEFAULT NULL,
  `type` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NULL DEFAULT NULL COMMENT 'Kiểu danh mục',
  `update_time` bigint(20) NULL DEFAULT NULL COMMENT 'Ngày sửa',
  PRIMARY KEY (`id`) USING BTREE,
  INDEX `act_parent_home`(`act`, `parent`, `home`) USING BTREE
) ENGINE = InnoDB AUTO_INCREMENT = 1 CHARACTER SET = utf8mb4 COLLATE = utf8mb4_unicode_ci ROW_FORMAT = COMPRESSED;

-- ----------------------------
-- Table structure for reviews
-- ----------------------------
DROP TABLE IF EXISTS `reviews`;
CREATE TABLE `reviews`  (
  `id` int(11) NOT NULL AUTO_INCREMENT COMMENT 'Mã',
  `act` int(11) NOT NULL,
  `name` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NULL DEFAULT NULL COMMENT 'Tên',
  `create_time` bigint(20) NULL DEFAULT NULL COMMENT 'Thời gian tạo',
  `content` text CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NULL COMMENT 'Nội dung',
  `email` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NULL DEFAULT NULL COMMENT 'Email',
  `phone` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NULL DEFAULT NULL COMMENT 'Điện thoại',
  `note` text CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NULL COMMENT 'Ghi chú',
  `ord` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NULL DEFAULT NULL,
  `sex` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NULL DEFAULT NULL,
  `address` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NULL DEFAULT NULL COMMENT 'Địa chỉ',
  `update_time` int(11) NULL DEFAULT NULL,
  PRIMARY KEY (`id`) USING BTREE
) ENGINE = InnoDB AUTO_INCREMENT = 1 CHARACTER SET = utf8mb4 COLLATE = utf8mb4_unicode_ci COMMENT = 'Phản hồi' ROW_FORMAT = COMPRESSED;

-- ----------------------------
-- Table structure for slide
-- ----------------------------
DROP TABLE IF EXISTS `slide`;
CREATE TABLE `slide`  (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `name` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NULL DEFAULT NULL,
  `img` text CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NULL,
  `link` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NULL DEFAULT NULL,
  `create_time` bigint(20) NULL DEFAULT NULL,
  `note` text CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NULL COMMENT 'Title',
  `ord` int(11) NULL DEFAULT NULL,
  `act` tinyint(4) NOT NULL,
  `position` tinyint(4) NULL DEFAULT NULL,
  `video` text CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL,
  `nofollow` tinyint(1) NOT NULL COMMENT 'Nofollow',
  `short_content` text CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NULL,
  `update_time` bigint(20) NULL DEFAULT NULL COMMENT 'Ngày sửa',
  `content` text CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NULL COMMENT 'Nội dung(vi)',
  `parent` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NULL DEFAULT NULL COMMENT 'Nhóm slider',
  PRIMARY KEY (`id`) USING BTREE
) ENGINE = InnoDB AUTO_INCREMENT = 2 CHARACTER SET = utf8mb4 COLLATE = utf8mb4_unicode_ci ROW_FORMAT = COMPRESSED;

-- ----------------------------
-- Records of slide
-- ----------------------------
INSERT INTO `slide` VALUES (1, 'Slider 1', '{\"id\":\"19\",\"name\":\"h-slider.jpg\",\"title\":null,\"caption\":null,\"alt\":null,\"description\":null,\"create_time\":\"1569984460\",\"parent\":\"0\",\"is_file\":\"1\",\"path\":\"uploads/\",\"file_name\":\"h-slider.jpg\",\"extra\":\"{\\\"extension\\\":\\\"jpg\\\",\\\"size\\\":\\\"95.85 KB\\\",\\\"date\\\":1569984458,\\\"isfile\\\":1,\\\"dir\\\":\\\"uploads\\\\/\\\",\\\"path\\\":\\\"uploads\\\\/h-slider.jpg\\\",\\\"width\\\":990,\\\"height\\\":536,\\\"thumb\\\":\\\"uploads\\\\/thumbs\\\\/def\\\\/h-slider.jpg\\\"}\"}', NULL, 1569991433, NULL, 1, 1, NULL, '', 0, NULL, NULL, NULL, NULL);

-- ----------------------------
-- Table structure for sys_plugins
-- ----------------------------
DROP TABLE IF EXISTS `sys_plugins`;
CREATE TABLE `sys_plugins`  (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `name` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NULL DEFAULT NULL,
  `act` tinyint(1) NULL DEFAULT 0,
  `create_time` int(11) NULL DEFAULT NULL,
  `update_time` int(11) NULL DEFAULT NULL,
  `ord` int(11) NULL DEFAULT NULL,
  `last_update` int(11) NULL DEFAULT NULL,
  `version` int(10) NULL DEFAULT NULL,
  `title` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NULL DEFAULT NULL,
  `description` varchar(500) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NULL DEFAULT NULL,
  `config` text CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NULL,
  `author` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NULL DEFAULT NULL,
  `hash` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NULL DEFAULT NULL,
  PRIMARY KEY (`id`) USING BTREE,
  INDEX `idx_name`(`name`(6)) USING BTREE
) ENGINE = InnoDB AUTO_INCREMENT = 7 CHARACTER SET = utf8mb4 COLLATE = utf8mb4_unicode_ci ROW_FORMAT = COMPRESSED;

-- ----------------------------
-- Table structure for tag
-- ----------------------------
DROP TABLE IF EXISTS `tag`;
CREATE TABLE `tag`  (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `name` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL,
  `link` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL,
  `content` text CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL,
  `create_time` bigint(12) NOT NULL,
  `s_title` text CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL COMMENT 'Tiêu đề SEO',
  `s_des` text CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL COMMENT 'Mô tả SEO',
  `s_key` text CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL COMMENT 'Từ khóa SEO',
  `update_time` bigint(20) NOT NULL COMMENT 'Ngày sửa',
  PRIMARY KEY (`id`) USING BTREE
) ENGINE = InnoDB AUTO_INCREMENT = 1 CHARACTER SET = utf8mb4 COLLATE = utf8mb4_unicode_ci ROW_FORMAT = COMPRESSED;

-- ----------------------------
-- Table structure for tag_pro
-- ----------------------------
DROP TABLE IF EXISTS `tag_pro`;
CREATE TABLE `tag_pro`  (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `name` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL,
  `link` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL,
  `content` text CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL,
  `create_time` bigint(12) NOT NULL,
  `s_title` text CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL COMMENT 'Tiêu đề SEO',
  `s_des` text CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL COMMENT 'Mô tả SEO',
  `s_key` text CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL COMMENT 'Từ khóa SEO',
  `update_time` bigint(20) NULL DEFAULT NULL COMMENT 'Ngày sửa',
  PRIMARY KEY (`id`) USING BTREE
) ENGINE = InnoDB AUTO_INCREMENT = 1 CHARACTER SET = utf8mb4 COLLATE = utf8mb4_unicode_ci ROW_FORMAT = COMPRESSED;

-- ----------------------------
-- Table structure for visit_online
-- ----------------------------
DROP TABLE IF EXISTS `visit_online`;
CREATE TABLE `visit_online`  (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `ip` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NULL DEFAULT NULL,
  `create_time` bigint(20) NULL DEFAULT NULL,
  `url` varchar(1000) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NULL DEFAULT NULL,
  PRIMARY KEY (`id`) USING BTREE
) ENGINE = InnoDB AUTO_INCREMENT = 1 CHARACTER SET = utf8mb4 COLLATE = utf8mb4_unicode_ci ROW_FORMAT = COMPRESSED;

-- ----------------------------
-- Function structure for FIND_SET_EQUALS
-- ----------------------------
DROP FUNCTION IF EXISTS `FIND_SET_EQUALS`;
delimiter ;;
CREATE FUNCTION `FIND_SET_EQUALS`(`s1` VARCHAR(200), `s2` VARCHAR(200))
 RETURNS tinyint(4)
BEGIN
          DECLARE a INT Default 0 ;
            DECLARE isEquals TINYINT(1) Default 0 ;
          DECLARE str VARCHAR(255);
          IF s1 IS NOT NULL AND s2 IS NOT NULL THEN
             simple_loop : LOOP
                 SET a=a+1;
                 SET str= SPLIT_STR(s2,",",a);
                 IF str='' THEN
                    LEAVE simple_loop;
                 END IF;
                 IF FIND_IN_SET(str, s1)>0 THEN
                    SET isEquals=1;
                     LEAVE simple_loop;
                 END IF;
                 SET isEquals=0;
            END LOOP simple_loop;
          END IF;
        RETURN isEquals;
    END
;;
delimiter ;

-- ----------------------------
-- Function structure for getAllGroupUser
-- ----------------------------
DROP FUNCTION IF EXISTS `getAllGroupUser`;
delimiter ;;
CREATE FUNCTION `getAllGroupUser`(`pid` INT)
 RETURNS varchar(100) CHARSET utf8mb4 COLLATE utf8mb4_unicode_ci
BEGIN 
DECLARE count INT DEFAULT 0;
DECLARE ret varchar(100);
DECLARE tmp varchar(100);
DECLARE idl INT DEFAULT 0;
select count(*) into count from nuy_group_user where parent = pid;
set tmp = concat('',pid,'');
myloop:while(count>0) do
 select GROUP_CONCAT(id SEPARATOR ',') into tmp from nuy_group_user a where  FIND_IN_SET (a.parent, tmp)>0;
 if(tmp is null)
 then
 set tmp = '';
 end if;
 select concat_ws(',',tmp,ret) into ret;
 select count(*) into count from nuy_group_user where parent in (tmp);
 if(count=0) then 
  leave myloop;
 end if;
end while;
return ret;
END
;;
delimiter ;

-- ----------------------------
-- Function structure for SPLIT_STR
-- ----------------------------
DROP FUNCTION IF EXISTS `SPLIT_STR`;
delimiter ;;
CREATE FUNCTION `SPLIT_STR`(`x` VARCHAR(255), `delim` VARCHAR(12), `pos` INT)
 RETURNS varchar(255) CHARSET utf8mb4
RETURN REPLACE(SUBSTRING(SUBSTRING_INDEX(x, delim, pos),
       LENGTH(SUBSTRING_INDEX(x, delim, pos -1)) + 1),
       delim, '')
;;
delimiter ;

-- ----------------------------
-- Triggers structure for table configs
-- ----------------------------
DROP TRIGGER IF EXISTS `tr_config_update`;
delimiter ;;
CREATE TRIGGER `tr_config_update` AFTER UPDATE ON `configs` FOR EACH ROW BEGIN
	
	declare idd int;
	declare nname varchar(255);
	set nname = OLD.keyword;
	set idd = NEW.act;
	
	

	IF ((idd = 0 or idd = null) and (nname ='CMS_HEADER' or nname ='CMS_FOOTER' or nname ='LOGO' or nname ='FACE' or nname ='FAVICON'or nname ='FBSHARE')) THEN
		SIGNAL SQLSTATE '45000' SET message_text = 'You can not update to 0 on this row, this row is require for Tech 5s CMS!';
	END IF;
END
;;
delimiter ;

-- ----------------------------
-- Triggers structure for table configs
-- ----------------------------
DROP TRIGGER IF EXISTS `tr_config_de`;
delimiter ;;
CREATE TRIGGER `tr_config_de` AFTER DELETE ON `configs` FOR EACH ROW BEGIN
	declare idd int;
	declare nname varchar(255);
	set nname = OLD.keyword;
	set idd = OLD.is_delete;
	

	IF (idd is null or idd = 0 or nname ='CMS_HEADER' or nname ='CMS_FOOTER' or nname ='LOGO' or nname ='FACE' or nname ='FAVICON'or nname ='FBSHARE') THEN
		SIGNAL SQLSTATE '45000' SET message_text = 'You can not remove this row, this row is require for Tech 5s CMS!';
	END IF;
END
;;
delimiter ;

-- ----------------------------
-- Triggers structure for table nuy_group_module
-- ----------------------------
DROP TRIGGER IF EXISTS `tr_gr_module_in`;
delimiter ;;
CREATE TRIGGER `tr_gr_module_in` AFTER INSERT ON `nuy_group_module` FOR EACH ROW BEGIN
	declare idd int;
declare parent int;
	DECLARE msg VARCHAR(255);
	set idd = NEW.id;
	set parent = NEW.parent;
	delete from nuy_module where parent = idd;
if parent != 0 THEN
insert into nuy_module (note,`name`,parent,code) values ('Xem','view',idd,1);
	insert into nuy_module (note,`name`,parent,code) values ('Thêm','insert',idd,2);
insert into nuy_module (note,`name`,parent,code) values ('Sửa','edit',idd,4);
insert into nuy_module (note,`name`,parent,code) values ('Xóa','delete',idd,8);
insert into nuy_module (note,`name`,parent,code) values ('Copy','copy',idd,16);
INSERT INTO nuy_role ( group_module_id, group_user_id, role) VALUES (idd, 1, 255);

	end if;
END
;;
delimiter ;

-- ----------------------------
-- Triggers structure for table nuy_group_module
-- ----------------------------
DROP TRIGGER IF EXISTS `tr_gr_module_de`;
delimiter ;;
CREATE TRIGGER `tr_gr_module_de` AFTER DELETE ON `nuy_group_module` FOR EACH ROW BEGIN
	declare idd int;
	set idd = OLD.id;
	delete from nuy_module where parent = idd;
	delete from nuy_role where group_module_id = idd;
END
;;
delimiter ;

SET FOREIGN_KEY_CHECKS = 1;
