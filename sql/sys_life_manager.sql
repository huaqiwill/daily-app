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


-- 导出 sys_life_manager 的数据库结构
DROP DATABASE IF EXISTS `sys_life_manager`;
CREATE DATABASE IF NOT EXISTS `sys_life_manager` /*!40100 DEFAULT CHARACTER SET utf8 COLLATE utf8_unicode_ci */;
USE `sys_life_manager`;

-- 导出  表 sys_life_manager.bill 结构
DROP TABLE IF EXISTS `bill`;
CREATE TABLE IF NOT EXISTS `bill` (
  `id` int(11) DEFAULT NULL
) ENGINE=MyISAM DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

-- 正在导出表  sys_life_manager.bill 的数据：0 rows
DELETE FROM `bill`;
/*!40000 ALTER TABLE `bill` DISABLE KEYS */;
/*!40000 ALTER TABLE `bill` ENABLE KEYS */;

-- 导出  表 sys_life_manager.birth 结构
DROP TABLE IF EXISTS `birth`;
CREATE TABLE IF NOT EXISTS `birth` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `name` varchar(50) COLLATE utf8_unicode_ci DEFAULT NULL,
  `sex` int(11) DEFAULT NULL,
  `birth_date` datetime DEFAULT NULL,
  `phone` varchar(50) COLLATE utf8_unicode_ci DEFAULT NULL,
  `email` varchar(50) COLLATE utf8_unicode_ci DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=MyISAM DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

-- 正在导出表  sys_life_manager.birth 的数据：0 rows
DELETE FROM `birth`;
/*!40000 ALTER TABLE `birth` DISABLE KEYS */;
/*!40000 ALTER TABLE `birth` ENABLE KEYS */;

-- 导出  表 sys_life_manager.foods 结构
DROP TABLE IF EXISTS `foods`;
CREATE TABLE IF NOT EXISTS `foods` (
  `id` int(11) DEFAULT NULL
) ENGINE=MyISAM DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

-- 正在导出表  sys_life_manager.foods 的数据：0 rows
DELETE FROM `foods`;
/*!40000 ALTER TABLE `foods` DISABLE KEYS */;
/*!40000 ALTER TABLE `foods` ENABLE KEYS */;

-- 导出  表 sys_life_manager.friends 结构
DROP TABLE IF EXISTS `friends`;
CREATE TABLE IF NOT EXISTS `friends` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `name` varchar(50) COLLATE utf8_unicode_ci DEFAULT NULL,
  `sex` int(11) DEFAULT NULL,
  `birth_date` datetime DEFAULT NULL,
  `create_time` datetime DEFAULT NULL,
  `update_time` datetime DEFAULT NULL,
  `delete_time` datetime DEFAULT NULL,
  `birth_type` int(11) DEFAULT NULL,
  `status` int(11) DEFAULT NULL,
  `avatar` varchar(50) COLLATE utf8_unicode_ci DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=MyISAM DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

-- 正在导出表  sys_life_manager.friends 的数据：0 rows
DELETE FROM `friends`;
/*!40000 ALTER TABLE `friends` DISABLE KEYS */;
/*!40000 ALTER TABLE `friends` ENABLE KEYS */;

-- 导出  表 sys_life_manager.notes 结构
DROP TABLE IF EXISTS `notes`;
CREATE TABLE IF NOT EXISTS `notes` (
  `id` int(11) DEFAULT NULL
) ENGINE=MyISAM DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

-- 正在导出表  sys_life_manager.notes 的数据：0 rows
DELETE FROM `notes`;
/*!40000 ALTER TABLE `notes` DISABLE KEYS */;
/*!40000 ALTER TABLE `notes` ENABLE KEYS */;

-- 导出  表 sys_life_manager.sys_resource 结构
DROP TABLE IF EXISTS `sys_resource`;
CREATE TABLE IF NOT EXISTS `sys_resource` (
  `id` int(11) DEFAULT NULL,
  `name` int(11) DEFAULT NULL
) ENGINE=MyISAM DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

-- 正在导出表  sys_life_manager.sys_resource 的数据：0 rows
DELETE FROM `sys_resource`;
/*!40000 ALTER TABLE `sys_resource` DISABLE KEYS */;
/*!40000 ALTER TABLE `sys_resource` ENABLE KEYS */;

-- 导出  表 sys_life_manager.sys_task 结构
DROP TABLE IF EXISTS `sys_task`;
CREATE TABLE IF NOT EXISTS `sys_task` (
  `id` int(11) DEFAULT NULL,
  `name` int(11) DEFAULT NULL
) ENGINE=MyISAM DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

-- 正在导出表  sys_life_manager.sys_task 的数据：0 rows
DELETE FROM `sys_task`;
/*!40000 ALTER TABLE `sys_task` DISABLE KEYS */;
/*!40000 ALTER TABLE `sys_task` ENABLE KEYS */;

-- 导出  表 sys_life_manager.todos 结构
DROP TABLE IF EXISTS `todos`;
CREATE TABLE IF NOT EXISTS `todos` (
  `id` int(11) DEFAULT NULL
) ENGINE=MyISAM DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

-- 正在导出表  sys_life_manager.todos 的数据：0 rows
DELETE FROM `todos`;
/*!40000 ALTER TABLE `todos` DISABLE KEYS */;
/*!40000 ALTER TABLE `todos` ENABLE KEYS */;

-- 导出  表 sys_life_manager.user 结构
DROP TABLE IF EXISTS `user`;
CREATE TABLE IF NOT EXISTS `user` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `username` varchar(50) CHARACTER SET utf8 COLLATE utf8_unicode_ci DEFAULT NULL,
  `password` varchar(50) CHARACTER SET utf8 COLLATE utf8_unicode_ci DEFAULT NULL,
  `nickname` varchar(50) CHARACTER SET utf8 COLLATE utf8_unicode_ci DEFAULT NULL,
  `sex` int(11) DEFAULT NULL,
  `create_time` datetime DEFAULT NULL,
  `avatar` varchar(50) COLLATE utf8_unicode_ci DEFAULT NULL,
  `update_time` datetime DEFAULT NULL,
  `delete_time` datetime DEFAULT NULL,
  `status` int(11) DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=MyISAM AUTO_INCREMENT=6 DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

-- 正在导出表  sys_life_manager.user 的数据：5 rows
DELETE FROM `user`;
/*!40000 ALTER TABLE `user` DISABLE KEYS */;
INSERT INTO `user` (`id`, `username`, `password`, `nickname`, `sex`, `create_time`, `avatar`, `update_time`, `delete_time`, `status`) VALUES
	(1, 'test', 'test', 'test', 1, '2024-10-11 08:30:39', 'test', '2024-10-11 08:30:39', NULL, 1),
	(2, 'test1', 'test1', 'test', 1, '2024-10-11 08:37:25', 'test', '2024-10-11 08:37:25', NULL, 1),
	(3, 'test1', 'test1', 'test', 1, '2024-10-11 08:38:02', 'test', '2024-10-11 08:38:02', NULL, 1),
	(4, 'test1', 'test1', 'test', 1, '2024-10-11 08:38:14', 'test', '2024-10-11 08:38:14', NULL, 1),
	(5, 'test1', 'test1', 'test', 1, '2024-10-11 08:38:50', 'test', '2024-10-11 08:38:50', NULL, 1);
/*!40000 ALTER TABLE `user` ENABLE KEYS */;

/*!40103 SET TIME_ZONE=IFNULL(@OLD_TIME_ZONE, 'system') */;
/*!40101 SET SQL_MODE=IFNULL(@OLD_SQL_MODE, '') */;
/*!40014 SET FOREIGN_KEY_CHECKS=IFNULL(@OLD_FOREIGN_KEY_CHECKS, 1) */;
/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40111 SET SQL_NOTES=IFNULL(@OLD_SQL_NOTES, 1) */;
