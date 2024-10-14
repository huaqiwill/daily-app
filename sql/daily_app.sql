-- --------------------------------------------------------
-- 主机:                           127.0.0.1
-- 服务器版本:                        8.0.12 - MySQL Community Server - GPL
-- 服务器操作系统:                      Win64
-- HeidiSQL 版本:                  12.3.0.6589
-- --------------------------------------------------------

/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET NAMES utf8 */;
/*!50503 SET NAMES utf8mb4 */;
/*!40103 SET @OLD_TIME_ZONE=@@TIME_ZONE */;
/*!40103 SET TIME_ZONE='+00:00' */;
/*!40014 SET @OLD_FOREIGN_KEY_CHECKS=@@FOREIGN_KEY_CHECKS, FOREIGN_KEY_CHECKS=0 */;
/*!40101 SET @OLD_SQL_MODE=@@SQL_MODE, SQL_MODE='NO_AUTO_VALUE_ON_ZERO' */;
/*!40111 SET @OLD_SQL_NOTES=@@SQL_NOTES, SQL_NOTES=0 */;


-- 导出 daily_app 的数据库结构
DROP DATABASE IF EXISTS `daily_app`;
CREATE DATABASE IF NOT EXISTS `daily_app` /*!40100 DEFAULT CHARACTER SET utf8 COLLATE utf8_unicode_ci */;
USE `daily_app`;

-- 导出  表 daily_app.app_bill 结构
DROP TABLE IF EXISTS `app_bill`;
CREATE TABLE IF NOT EXISTS `app_bill` (
  `id` int(11) DEFAULT NULL,
  `user_id` int(11) DEFAULT NULL COMMENT '所属用户',
  `create_time` datetime DEFAULT NULL COMMENT '创建时间',
  `update_time` datetime DEFAULT NULL COMMENT '更新时间',
  `delete_time` datetime DEFAULT NULL COMMENT '删除时间',
  `spending_time` datetime DEFAULT NULL COMMENT '消费时间',
  `id_delete` datetime DEFAULT NULL COMMENT '是否删除',
  `amount` decimal(10,2) DEFAULT NULL COMMENT '金额',
  `order_name` varchar(255) CHARACTER SET utf8 COLLATE utf8_unicode_ci DEFAULT NULL COMMENT '商品名称'
) ENGINE=MyISAM DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

-- 正在导出表  daily_app.app_bill 的数据：0 rows
DELETE FROM `app_bill`;
/*!40000 ALTER TABLE `app_bill` DISABLE KEYS */;
/*!40000 ALTER TABLE `app_bill` ENABLE KEYS */;

-- 导出  表 daily_app.app_bill_category 结构
DROP TABLE IF EXISTS `app_bill_category`;
CREATE TABLE IF NOT EXISTS `app_bill_category` (
  `id` int(11) NOT NULL,
  `name` int(11) DEFAULT NULL,
  `parent_id` int(11) DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=MyISAM DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

-- 正在导出表  daily_app.app_bill_category 的数据：0 rows
DELETE FROM `app_bill_category`;
/*!40000 ALTER TABLE `app_bill_category` DISABLE KEYS */;
/*!40000 ALTER TABLE `app_bill_category` ENABLE KEYS */;

-- 导出  表 daily_app.app_birth 结构
DROP TABLE IF EXISTS `app_birth`;
CREATE TABLE IF NOT EXISTS `app_birth` (
  `id` int(11) NOT NULL AUTO_INCREMENT COMMENT 'ID',
  `user_id` int(11) DEFAULT NULL COMMENT '所属用户',
  `name` varchar(50) CHARACTER SET utf8 COLLATE utf8_unicode_ci DEFAULT NULL COMMENT '姓名',
  `sex` int(11) DEFAULT NULL COMMENT '性别',
  `birth_date` datetime DEFAULT NULL COMMENT '出生日期',
  `birth_type` varchar(255) CHARACTER SET utf8 COLLATE utf8_unicode_ci DEFAULT NULL COMMENT '生日类型（1、农历 2、公历）',
  `phone` varchar(50) CHARACTER SET utf8 COLLATE utf8_unicode_ci DEFAULT NULL COMMENT '手机号',
  `email` varchar(50) CHARACTER SET utf8 COLLATE utf8_unicode_ci DEFAULT NULL COMMENT '邮件',
  `qq` varchar(255) CHARACTER SET utf8 COLLATE utf8_unicode_ci DEFAULT NULL COMMENT 'QQ',
  `wechat` varchar(255) COLLATE utf8_unicode_ci DEFAULT NULL,
  `friend_id` varchar(255) CHARACTER SET utf8 COLLATE utf8_unicode_ci DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=MyISAM AUTO_INCREMENT=5 DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

-- 正在导出表  daily_app.app_birth 的数据：1 rows
DELETE FROM `app_birth`;
/*!40000 ALTER TABLE `app_birth` DISABLE KEYS */;
INSERT INTO `app_birth` (`id`, `user_id`, `name`, `sex`, `birth_date`, `birth_type`, `phone`, `email`, `qq`, `wechat`, `friend_id`) VALUES
	(1, NULL, '李四', 1, '2024-10-14 17:42:33', '2', '1212', '1212', '31734784026', '15576763333', NULL),
	(2, NULL, '张三', 1, '2024-10-14 23:48:00', '1', '1212', '1212', '31734784026', '15576763333', NULL),
	(3, NULL, '张三', 1, '2024-10-14 23:48:00', '1', '1212', '1212', '31734784026', '15576763333', NULL),
	(4, NULL, '张三', 1, '2024-10-14 23:48:00', '1', '1212', '1212', '31734784026', '15576763333', NULL);
/*!40000 ALTER TABLE `app_birth` ENABLE KEYS */;

-- 导出  表 daily_app.app_food 结构
DROP TABLE IF EXISTS `app_food`;
CREATE TABLE IF NOT EXISTS `app_food` (
  `id` int(11) DEFAULT NULL,
  `user_id` int(11) DEFAULT NULL,
  `category_id` int(11) DEFAULT NULL,
  `name` varchar(255) COLLATE utf8_unicode_ci DEFAULT NULL
) ENGINE=MyISAM DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

-- 正在导出表  daily_app.app_food 的数据：0 rows
DELETE FROM `app_food`;
/*!40000 ALTER TABLE `app_food` DISABLE KEYS */;
/*!40000 ALTER TABLE `app_food` ENABLE KEYS */;

-- 导出  表 daily_app.app_food_analyse 结构
DROP TABLE IF EXISTS `app_food_analyse`;
CREATE TABLE IF NOT EXISTS `app_food_analyse` (
  `id` int(11) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=MyISAM DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

-- 正在导出表  daily_app.app_food_analyse 的数据：0 rows
DELETE FROM `app_food_analyse`;
/*!40000 ALTER TABLE `app_food_analyse` DISABLE KEYS */;
/*!40000 ALTER TABLE `app_food_analyse` ENABLE KEYS */;

-- 导出  表 daily_app.app_food_category 结构
DROP TABLE IF EXISTS `app_food_category`;
CREATE TABLE IF NOT EXISTS `app_food_category` (
  `id` int(11) NOT NULL,
  `name` varchar(255) COLLATE utf8_unicode_ci DEFAULT NULL,
  `parent_id` int(11) DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=MyISAM DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

-- 正在导出表  daily_app.app_food_category 的数据：0 rows
DELETE FROM `app_food_category`;
/*!40000 ALTER TABLE `app_food_category` DISABLE KEYS */;
/*!40000 ALTER TABLE `app_food_category` ENABLE KEYS */;

-- 导出  表 daily_app.app_food_detail 结构
DROP TABLE IF EXISTS `app_food_detail`;
CREATE TABLE IF NOT EXISTS `app_food_detail` (
  `id` int(11) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=MyISAM DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

-- 正在导出表  daily_app.app_food_detail 的数据：0 rows
DELETE FROM `app_food_detail`;
/*!40000 ALTER TABLE `app_food_detail` DISABLE KEYS */;
/*!40000 ALTER TABLE `app_food_detail` ENABLE KEYS */;

-- 导出  表 daily_app.app_food_resource 结构
DROP TABLE IF EXISTS `app_food_resource`;
CREATE TABLE IF NOT EXISTS `app_food_resource` (
  `id` varchar(255) CHARACTER SET utf8 COLLATE utf8_unicode_ci DEFAULT NULL COMMENT 'ID',
  `food_id` int(11) DEFAULT NULL COMMENT '食物ID',
  `resource_id` int(11) DEFAULT NULL COMMENT '资源ID',
  `resource_type` varchar(255) CHARACTER SET utf8 COLLATE utf8_unicode_ci DEFAULT NULL COMMENT '资源类型',
  `resource_url` varchar(255) CHARACTER SET utf8 COLLATE utf8_unicode_ci DEFAULT NULL COMMENT '资源地址'
) ENGINE=MyISAM DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

-- 正在导出表  daily_app.app_food_resource 的数据：0 rows
DELETE FROM `app_food_resource`;
/*!40000 ALTER TABLE `app_food_resource` DISABLE KEYS */;
/*!40000 ALTER TABLE `app_food_resource` ENABLE KEYS */;

-- 导出  表 daily_app.app_friend 结构
DROP TABLE IF EXISTS `app_friend`;
CREATE TABLE IF NOT EXISTS `app_friend` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `name` varchar(50) CHARACTER SET utf8 COLLATE utf8_unicode_ci DEFAULT NULL COMMENT '姓名',
  `sex` int(11) DEFAULT NULL COMMENT '性别',
  `birth_date` datetime DEFAULT NULL COMMENT '出生日期',
  `create_time` datetime DEFAULT NULL COMMENT '创建时间',
  `update_time` datetime DEFAULT NULL COMMENT '更新时间',
  `delete_time` datetime DEFAULT NULL COMMENT '删除时间',
  `birth_type` int(11) DEFAULT NULL COMMENT '生日类型（1、农历 2、公历）',
  `status` int(11) DEFAULT NULL COMMENT '状态',
  `avatar` varchar(50) CHARACTER SET utf8 COLLATE utf8_unicode_ci DEFAULT NULL COMMENT '头像',
  `user_id` int(11) DEFAULT NULL COMMENT '所属用户',
  `phone` varchar(255) CHARACTER SET utf8 COLLATE utf8_unicode_ci DEFAULT NULL COMMENT '主手机号',
  `qq` varchar(255) CHARACTER SET utf8 COLLATE utf8_unicode_ci DEFAULT NULL COMMENT '主qq号',
  `wechat` varchar(255) CHARACTER SET utf8 COLLATE utf8_unicode_ci DEFAULT NULL COMMENT '主微信号',
  `email` varchar(255) CHARACTER SET utf8 COLLATE utf8_unicode_ci DEFAULT NULL COMMENT '主邮箱',
  `live_address` varchar(255) CHARACTER SET utf8 COLLATE utf8_unicode_ci DEFAULT NULL COMMENT '居住地址',
  `address` varchar(255) CHARACTER SET utf8 COLLATE utf8_unicode_ci DEFAULT NULL COMMENT '家庭住址',
  `school` varchar(255) CHARACTER SET utf8 COLLATE utf8_unicode_ci DEFAULT NULL COMMENT '学历信息',
  `disposition` varchar(255) COLLATE utf8_unicode_ci DEFAULT NULL COMMENT '性格',
  `remark` varchar(255) CHARACTER SET utf8 COLLATE utf8_unicode_ci DEFAULT NULL COMMENT '备注',
  `advantage` varchar(255) CHARACTER SET utf8 COLLATE utf8_unicode_ci DEFAULT NULL COMMENT '优势',
  `disadvantage` varchar(255) CHARACTER SET utf8 COLLATE utf8_unicode_ci DEFAULT NULL COMMENT '劣势',
  PRIMARY KEY (`id`)
) ENGINE=MyISAM AUTO_INCREMENT=3 DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

-- 正在导出表  daily_app.app_friend 的数据：0 rows
DELETE FROM `app_friend`;
/*!40000 ALTER TABLE `app_friend` DISABLE KEYS */;
INSERT INTO `app_friend` (`id`, `name`, `sex`, `birth_date`, `create_time`, `update_time`, `delete_time`, `birth_type`, `status`, `avatar`, `user_id`, `phone`, `qq`, `wechat`, `email`, `live_address`, `address`, `school`, `disposition`, `remark`, `advantage`, `disadvantage`) VALUES
	(1, '12', 2, '0000-00-00 00:00:00', NULL, NULL, NULL, NULL, 12, '12', NULL, '12', '12', '12', '12', NULL, '12', NULL, NULL, '', NULL, NULL),
	(2, '12', 2, '0000-00-00 00:00:00', NULL, NULL, NULL, NULL, 12, '12', NULL, '12', '12', '12', '12', NULL, '12', NULL, NULL, '', NULL, NULL);
/*!40000 ALTER TABLE `app_friend` ENABLE KEYS */;

-- 导出  表 daily_app.app_friend_analyse 结构
DROP TABLE IF EXISTS `app_friend_analyse`;
CREATE TABLE IF NOT EXISTS `app_friend_analyse` (
  `id` int(11) NOT NULL,
  `friend_id` int(11) DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=MyISAM DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

-- 正在导出表  daily_app.app_friend_analyse 的数据：0 rows
DELETE FROM `app_friend_analyse`;
/*!40000 ALTER TABLE `app_friend_analyse` DISABLE KEYS */;
/*!40000 ALTER TABLE `app_friend_analyse` ENABLE KEYS */;

-- 导出  表 daily_app.app_friend_detail 结构
DROP TABLE IF EXISTS `app_friend_detail`;
CREATE TABLE IF NOT EXISTS `app_friend_detail` (
  `id` varchar(255) CHARACTER SET utf8 COLLATE utf8_unicode_ci DEFAULT NULL
) ENGINE=MyISAM DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

-- 正在导出表  daily_app.app_friend_detail 的数据：0 rows
DELETE FROM `app_friend_detail`;
/*!40000 ALTER TABLE `app_friend_detail` DISABLE KEYS */;
/*!40000 ALTER TABLE `app_friend_detail` ENABLE KEYS */;

-- 导出  表 daily_app.app_friend_email 结构
DROP TABLE IF EXISTS `app_friend_email`;
CREATE TABLE IF NOT EXISTS `app_friend_email` (
  `id` varchar(255) CHARACTER SET utf8 COLLATE utf8_unicode_ci DEFAULT NULL,
  `email` varchar(255) COLLATE utf8_unicode_ci DEFAULT NULL,
  `friend_id` int(11) DEFAULT NULL
) ENGINE=MyISAM DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

-- 正在导出表  daily_app.app_friend_email 的数据：0 rows
DELETE FROM `app_friend_email`;
/*!40000 ALTER TABLE `app_friend_email` DISABLE KEYS */;
/*!40000 ALTER TABLE `app_friend_email` ENABLE KEYS */;

-- 导出  表 daily_app.app_friend_phone 结构
DROP TABLE IF EXISTS `app_friend_phone`;
CREATE TABLE IF NOT EXISTS `app_friend_phone` (
  `id` int(11) NOT NULL,
  `friend_id` int(11) DEFAULT NULL,
  `phone` varchar(255) CHARACTER SET utf8 COLLATE utf8_unicode_ci DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=MyISAM DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

-- 正在导出表  daily_app.app_friend_phone 的数据：0 rows
DELETE FROM `app_friend_phone`;
/*!40000 ALTER TABLE `app_friend_phone` DISABLE KEYS */;
/*!40000 ALTER TABLE `app_friend_phone` ENABLE KEYS */;

-- 导出  表 daily_app.app_friend_qq 结构
DROP TABLE IF EXISTS `app_friend_qq`;
CREATE TABLE IF NOT EXISTS `app_friend_qq` (
  `id` int(11) NOT NULL,
  `friend_id` int(11) DEFAULT NULL,
  `qq` varchar(255) COLLATE utf8_unicode_ci DEFAULT NULL,
  `nickname` varchar(255) COLLATE utf8_unicode_ci DEFAULT NULL,
  `avatar` varchar(255) COLLATE utf8_unicode_ci DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=MyISAM DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

-- 正在导出表  daily_app.app_friend_qq 的数据：0 rows
DELETE FROM `app_friend_qq`;
/*!40000 ALTER TABLE `app_friend_qq` DISABLE KEYS */;
/*!40000 ALTER TABLE `app_friend_qq` ENABLE KEYS */;

-- 导出  表 daily_app.app_friend_wechat 结构
DROP TABLE IF EXISTS `app_friend_wechat`;
CREATE TABLE IF NOT EXISTS `app_friend_wechat` (
  `id` int(11) NOT NULL,
  `friend_id` int(11) DEFAULT NULL,
  `wechat` varchar(255) CHARACTER SET utf8 COLLATE utf8_unicode_ci DEFAULT NULL,
  `nickname` varchar(255) COLLATE utf8_unicode_ci DEFAULT NULL,
  `avatar` varchar(255) COLLATE utf8_unicode_ci DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=MyISAM DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

-- 正在导出表  daily_app.app_friend_wechat 的数据：0 rows
DELETE FROM `app_friend_wechat`;
/*!40000 ALTER TABLE `app_friend_wechat` DISABLE KEYS */;
/*!40000 ALTER TABLE `app_friend_wechat` ENABLE KEYS */;

-- 导出  表 daily_app.app_mood 结构
DROP TABLE IF EXISTS `app_mood`;
CREATE TABLE IF NOT EXISTS `app_mood` (
  `id` int(11) NOT NULL AUTO_INCREMENT COMMENT 'ID',
  `mood_type` int(11) DEFAULT NULL COMMENT '心情',
  `is_delete` int(11) DEFAULT NULL COMMENT '是否删除',
  `create_time` datetime DEFAULT NULL COMMENT '创建时间',
  `update_time` datetime DEFAULT NULL COMMENT '更新时间',
  `delete_time` datetime DEFAULT NULL COMMENT '删除时间',
  `notes` text CHARACTER SET utf8 COLLATE utf8_unicode_ci COMMENT '备注',
  PRIMARY KEY (`id`)
) ENGINE=MyISAM DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci COMMENT='心情、朋友圈';

-- 正在导出表  daily_app.app_mood 的数据：0 rows
DELETE FROM `app_mood`;
/*!40000 ALTER TABLE `app_mood` DISABLE KEYS */;
/*!40000 ALTER TABLE `app_mood` ENABLE KEYS */;

-- 导出  表 daily_app.app_mood_comment 结构
DROP TABLE IF EXISTS `app_mood_comment`;
CREATE TABLE IF NOT EXISTS `app_mood_comment` (
  `id` int(11) DEFAULT NULL,
  `content` varchar(50) CHARACTER SET utf8 COLLATE utf8_unicode_ci DEFAULT NULL COMMENT '评论内容',
  `mood_id` int(11) DEFAULT NULL COMMENT '心情ID',
  `user_id` int(11) DEFAULT NULL COMMENT '用户ID',
  `create_time` datetime DEFAULT NULL COMMENT '创建时间',
  `parent_user_id` int(11) DEFAULT NULL COMMENT '父用户iD'
) ENGINE=MyISAM DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

-- 正在导出表  daily_app.app_mood_comment 的数据：0 rows
DELETE FROM `app_mood_comment`;
/*!40000 ALTER TABLE `app_mood_comment` DISABLE KEYS */;
/*!40000 ALTER TABLE `app_mood_comment` ENABLE KEYS */;

-- 导出  表 daily_app.app_mood_images 结构
DROP TABLE IF EXISTS `app_mood_images`;
CREATE TABLE IF NOT EXISTS `app_mood_images` (
  `id` int(11) DEFAULT NULL,
  `image_url` varchar(300) COLLATE utf8_unicode_ci DEFAULT NULL
) ENGINE=MyISAM DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

-- 正在导出表  daily_app.app_mood_images 的数据：0 rows
DELETE FROM `app_mood_images`;
/*!40000 ALTER TABLE `app_mood_images` DISABLE KEYS */;
/*!40000 ALTER TABLE `app_mood_images` ENABLE KEYS */;

-- 导出  表 daily_app.app_mood_love 结构
DROP TABLE IF EXISTS `app_mood_love`;
CREATE TABLE IF NOT EXISTS `app_mood_love` (
  `id` int(11) DEFAULT NULL,
  `user_id` int(11) DEFAULT NULL
) ENGINE=MyISAM DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

-- 正在导出表  daily_app.app_mood_love 的数据：0 rows
DELETE FROM `app_mood_love`;
/*!40000 ALTER TABLE `app_mood_love` DISABLE KEYS */;
/*!40000 ALTER TABLE `app_mood_love` ENABLE KEYS */;

-- 导出  表 daily_app.app_mood_type 结构
DROP TABLE IF EXISTS `app_mood_type`;
CREATE TABLE IF NOT EXISTS `app_mood_type` (
  `id` int(11) DEFAULT NULL,
  `name` int(11) DEFAULT NULL
) ENGINE=MyISAM DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

-- 正在导出表  daily_app.app_mood_type 的数据：0 rows
DELETE FROM `app_mood_type`;
/*!40000 ALTER TABLE `app_mood_type` DISABLE KEYS */;
/*!40000 ALTER TABLE `app_mood_type` ENABLE KEYS */;

-- 导出  表 daily_app.app_note 结构
DROP TABLE IF EXISTS `app_note`;
CREATE TABLE IF NOT EXISTS `app_note` (
  `id` int(11) DEFAULT NULL,
  `user_id` int(11) DEFAULT NULL,
  `content` int(11) DEFAULT NULL,
  `create_time` int(11) DEFAULT NULL,
  `update_time` int(11) DEFAULT NULL,
  `delete_time` int(11) DEFAULT NULL
) ENGINE=MyISAM DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

-- 正在导出表  daily_app.app_note 的数据：0 rows
DELETE FROM `app_note`;
/*!40000 ALTER TABLE `app_note` DISABLE KEYS */;
/*!40000 ALTER TABLE `app_note` ENABLE KEYS */;

-- 导出  表 daily_app.app_note_attr 结构
DROP TABLE IF EXISTS `app_note_attr`;
CREATE TABLE IF NOT EXISTS `app_note_attr` (
  `app` varchar(255) COLLATE utf8_unicode_ci DEFAULT NULL
) ENGINE=MyISAM DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

-- 正在导出表  daily_app.app_note_attr 的数据：0 rows
DELETE FROM `app_note_attr`;
/*!40000 ALTER TABLE `app_note_attr` DISABLE KEYS */;
/*!40000 ALTER TABLE `app_note_attr` ENABLE KEYS */;

-- 导出  表 daily_app.app_note_type 结构
DROP TABLE IF EXISTS `app_note_type`;
CREATE TABLE IF NOT EXISTS `app_note_type` (
  `ap` varchar(255) COLLATE utf8_unicode_ci DEFAULT NULL
) ENGINE=MyISAM DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

-- 正在导出表  daily_app.app_note_type 的数据：0 rows
DELETE FROM `app_note_type`;
/*!40000 ALTER TABLE `app_note_type` DISABLE KEYS */;
/*!40000 ALTER TABLE `app_note_type` ENABLE KEYS */;

-- 导出  表 daily_app.app_todo 结构
DROP TABLE IF EXISTS `app_todo`;
CREATE TABLE IF NOT EXISTS `app_todo` (
  `id` int(11) DEFAULT NULL,
  `user_id` int(11) DEFAULT NULL
) ENGINE=MyISAM DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

-- 正在导出表  daily_app.app_todo 的数据：0 rows
DELETE FROM `app_todo`;
/*!40000 ALTER TABLE `app_todo` DISABLE KEYS */;
/*!40000 ALTER TABLE `app_todo` ENABLE KEYS */;

-- 导出  表 daily_app.app_todo_detail 结构
DROP TABLE IF EXISTS `app_todo_detail`;
CREATE TABLE IF NOT EXISTS `app_todo_detail` (
  `id` int(11) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=MyISAM DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

-- 正在导出表  daily_app.app_todo_detail 的数据：0 rows
DELETE FROM `app_todo_detail`;
/*!40000 ALTER TABLE `app_todo_detail` DISABLE KEYS */;
/*!40000 ALTER TABLE `app_todo_detail` ENABLE KEYS */;

-- 导出  表 daily_app.sys_resource 结构
DROP TABLE IF EXISTS `sys_resource`;
CREATE TABLE IF NOT EXISTS `sys_resource` (
  `id` int(11) DEFAULT NULL,
  `name` int(11) DEFAULT NULL,
  `user_id` int(11) DEFAULT NULL,
  `create_time` int(11) DEFAULT NULL,
  `update_time` int(11) DEFAULT NULL,
  `delete_time` int(11) DEFAULT NULL,
  `is_delete` int(11) DEFAULT NULL,
  `resource_url` int(11) DEFAULT NULL
) ENGINE=MyISAM DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

-- 正在导出表  daily_app.sys_resource 的数据：0 rows
DELETE FROM `sys_resource`;
/*!40000 ALTER TABLE `sys_resource` DISABLE KEYS */;
/*!40000 ALTER TABLE `sys_resource` ENABLE KEYS */;

-- 导出  表 daily_app.sys_resource_type 结构
DROP TABLE IF EXISTS `sys_resource_type`;
CREATE TABLE IF NOT EXISTS `sys_resource_type` (
  `id` int(11) NOT NULL,
  `name` int(11) DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=MyISAM DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

-- 正在导出表  daily_app.sys_resource_type 的数据：0 rows
DELETE FROM `sys_resource_type`;
/*!40000 ALTER TABLE `sys_resource_type` DISABLE KEYS */;
/*!40000 ALTER TABLE `sys_resource_type` ENABLE KEYS */;

-- 导出  表 daily_app.sys_role 结构
DROP TABLE IF EXISTS `sys_role`;
CREATE TABLE IF NOT EXISTS `sys_role` (
  `id` int(11) DEFAULT NULL,
  `name` int(11) DEFAULT NULL
) ENGINE=MyISAM DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

-- 正在导出表  daily_app.sys_role 的数据：0 rows
DELETE FROM `sys_role`;
/*!40000 ALTER TABLE `sys_role` DISABLE KEYS */;
/*!40000 ALTER TABLE `sys_role` ENABLE KEYS */;

-- 导出  表 daily_app.sys_task 结构
DROP TABLE IF EXISTS `sys_task`;
CREATE TABLE IF NOT EXISTS `sys_task` (
  `id` int(11) DEFAULT NULL,
  `name` int(11) DEFAULT NULL,
  `user_id` int(11) DEFAULT NULL
) ENGINE=MyISAM DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

-- 正在导出表  daily_app.sys_task 的数据：0 rows
DELETE FROM `sys_task`;
/*!40000 ALTER TABLE `sys_task` DISABLE KEYS */;
/*!40000 ALTER TABLE `sys_task` ENABLE KEYS */;

-- 导出  表 daily_app.sys_user 结构
DROP TABLE IF EXISTS `sys_user`;
CREATE TABLE IF NOT EXISTS `sys_user` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `username` varchar(50) CHARACTER SET utf8 COLLATE utf8_unicode_ci DEFAULT NULL COMMENT '用户名',
  `password` varchar(50) CHARACTER SET utf8 COLLATE utf8_unicode_ci DEFAULT NULL COMMENT '密码',
  `nickname` varchar(50) CHARACTER SET utf8 COLLATE utf8_unicode_ci DEFAULT NULL COMMENT '昵称',
  `sex` int(11) DEFAULT NULL COMMENT '性别',
  `create_time` datetime DEFAULT NULL COMMENT '创建时间',
  `avatar` varchar(50) CHARACTER SET utf8 COLLATE utf8_unicode_ci DEFAULT NULL COMMENT '头像',
  `update_time` datetime DEFAULT NULL COMMENT '更新时间',
  `delete_time` datetime DEFAULT NULL COMMENT '删除时间',
  `status` int(11) DEFAULT NULL COMMENT '账号状态',
  `role_id` int(11) DEFAULT NULL COMMENT '角色',
  `is_delete` varchar(255) CHARACTER SET utf8 COLLATE utf8_unicode_ci DEFAULT NULL COMMENT '是否删除',
  `is_super` varchar(255) COLLATE utf8_unicode_ci DEFAULT NULL COMMENT '是否拥有超级管理权限',
  PRIMARY KEY (`id`)
) ENGINE=MyISAM AUTO_INCREMENT=6 DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

-- 正在导出表  daily_app.sys_user 的数据：5 rows
DELETE FROM `sys_user`;
/*!40000 ALTER TABLE `sys_user` DISABLE KEYS */;
INSERT INTO `sys_user` (`id`, `username`, `password`, `nickname`, `sex`, `create_time`, `avatar`, `update_time`, `delete_time`, `status`, `role_id`, `is_delete`, `is_super`) VALUES
	(1, 'test', 'test', 'test', 1, '2024-10-11 08:30:39', 'test', '2024-10-11 08:30:39', NULL, 1, NULL, NULL, NULL),
	(2, 'test1', 'test1', 'test', 1, '2024-10-11 08:37:25', 'test', '2024-10-11 08:37:25', NULL, 1, NULL, NULL, NULL),
	(3, 'test1', 'test1', 'test', 1, '2024-10-11 08:38:02', 'test', '2024-10-11 08:38:02', NULL, 1, NULL, NULL, NULL),
	(4, 'test1', 'test1', 'test', 1, '2024-10-11 08:38:14', 'test', '2024-10-11 08:38:14', NULL, 1, NULL, NULL, NULL),
	(5, 'test1', 'test1', 'test', 1, '2024-10-11 08:38:50', 'test', '2024-10-11 08:38:50', NULL, 1, NULL, NULL, NULL);
/*!40000 ALTER TABLE `sys_user` ENABLE KEYS */;

-- 导出  表 daily_app.sys_user_detail 结构
DROP TABLE IF EXISTS `sys_user_detail`;
CREATE TABLE IF NOT EXISTS `sys_user_detail` (
  `id` int(11) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=MyISAM DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

-- 正在导出表  daily_app.sys_user_detail 的数据：0 rows
DELETE FROM `sys_user_detail`;
/*!40000 ALTER TABLE `sys_user_detail` DISABLE KEYS */;
/*!40000 ALTER TABLE `sys_user_detail` ENABLE KEYS */;

/*!40103 SET TIME_ZONE=IFNULL(@OLD_TIME_ZONE, 'system') */;
/*!40101 SET SQL_MODE=IFNULL(@OLD_SQL_MODE, '') */;
/*!40014 SET FOREIGN_KEY_CHECKS=IFNULL(@OLD_FOREIGN_KEY_CHECKS, 1) */;
/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40111 SET SQL_NOTES=IFNULL(@OLD_SQL_NOTES, 1) */;
