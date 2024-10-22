-- MySQL dump 10.13  Distrib 8.3.0, for Linux (x86_64)
--
-- Host: localhost    Database: daily_app
-- ------------------------------------------------------
-- Server version	8.3.0

/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!50503 SET NAMES utf8mb4 */;
/*!40103 SET @OLD_TIME_ZONE=@@TIME_ZONE */;
/*!40103 SET TIME_ZONE='+00:00' */;
/*!40014 SET @OLD_UNIQUE_CHECKS=@@UNIQUE_CHECKS, UNIQUE_CHECKS=0 */;
/*!40014 SET @OLD_FOREIGN_KEY_CHECKS=@@FOREIGN_KEY_CHECKS, FOREIGN_KEY_CHECKS=0 */;
/*!40101 SET @OLD_SQL_MODE=@@SQL_MODE, SQL_MODE='NO_AUTO_VALUE_ON_ZERO' */;
/*!40111 SET @OLD_SQL_NOTES=@@SQL_NOTES, SQL_NOTES=0 */;

--
-- Table structure for table `app_bill`
--

DROP TABLE IF EXISTS `app_bill`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!50503 SET character_set_client = utf8mb4 */;
CREATE TABLE `app_bill` (
  `id` int DEFAULT NULL,
  `user_id` int DEFAULT NULL COMMENT '所属用户',
  `create_time` datetime DEFAULT NULL COMMENT '创建时间',
  `update_time` datetime DEFAULT NULL COMMENT '更新时间',
  `delete_time` datetime DEFAULT NULL COMMENT '删除时间',
  `spending_time` datetime DEFAULT NULL COMMENT '消费时间',
  `id_delete` datetime DEFAULT NULL COMMENT '是否删除',
  `amount` decimal(10,2) DEFAULT NULL COMMENT '金额',
  `order_name` varchar(255) CHARACTER SET utf8mb3 COLLATE utf8mb3_unicode_ci DEFAULT NULL COMMENT '商品名称'
) ENGINE=MyISAM DEFAULT CHARSET=utf8mb3 COLLATE=utf8mb3_unicode_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `app_bill`
--

LOCK TABLES `app_bill` WRITE;
/*!40000 ALTER TABLE `app_bill` DISABLE KEYS */;
/*!40000 ALTER TABLE `app_bill` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `app_bill_category`
--

DROP TABLE IF EXISTS `app_bill_category`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!50503 SET character_set_client = utf8mb4 */;
CREATE TABLE `app_bill_category` (
  `id` int NOT NULL,
  `name` int DEFAULT NULL,
  `parent_id` int DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=MyISAM DEFAULT CHARSET=utf8mb3 COLLATE=utf8mb3_unicode_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `app_bill_category`
--

LOCK TABLES `app_bill_category` WRITE;
/*!40000 ALTER TABLE `app_bill_category` DISABLE KEYS */;
/*!40000 ALTER TABLE `app_bill_category` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `app_birth`
--

DROP TABLE IF EXISTS `app_birth`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!50503 SET character_set_client = utf8mb4 */;
CREATE TABLE `app_birth` (
  `id` int NOT NULL AUTO_INCREMENT COMMENT 'ID',
  `user_id` int DEFAULT NULL COMMENT '所属用户',
  `name` varchar(50) CHARACTER SET utf8mb3 COLLATE utf8mb3_unicode_ci DEFAULT NULL COMMENT '姓名',
  `sex` int DEFAULT NULL COMMENT '性别',
  `birth_date` datetime DEFAULT NULL COMMENT '出生日期',
  `birth_type` varchar(255) CHARACTER SET utf8mb3 COLLATE utf8mb3_unicode_ci DEFAULT NULL COMMENT '生日类型（1、农历 2、公历）',
  `phone` varchar(50) CHARACTER SET utf8mb3 COLLATE utf8mb3_unicode_ci DEFAULT NULL COMMENT '手机号',
  `email` varchar(50) CHARACTER SET utf8mb3 COLLATE utf8mb3_unicode_ci DEFAULT NULL COMMENT '邮件',
  `qq` varchar(255) CHARACTER SET utf8mb3 COLLATE utf8mb3_unicode_ci DEFAULT NULL COMMENT 'QQ',
  `wechat` varchar(255) CHARACTER SET utf8mb3 COLLATE utf8mb3_unicode_ci DEFAULT NULL,
  `friend_id` varchar(255) CHARACTER SET utf8mb3 COLLATE utf8mb3_unicode_ci DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=MyISAM AUTO_INCREMENT=5 DEFAULT CHARSET=utf8mb3 COLLATE=utf8mb3_unicode_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `app_birth`
--

LOCK TABLES `app_birth` WRITE;
/*!40000 ALTER TABLE `app_birth` DISABLE KEYS */;
INSERT INTO `app_birth` VALUES (1,NULL,'李四',1,'2024-10-14 17:42:33','2','1212','1212','31734784026','15576763333',NULL),(2,NULL,'张三',1,'2024-10-14 23:48:00','1','1212','1212','31734784026','15576763333',NULL),(3,NULL,'张三',1,'2024-10-14 23:48:00','1','1212','1212','31734784026','15576763333',NULL),(4,NULL,'张三',1,'2024-10-14 23:48:00','1','1212','1212','31734784026','15576763333',NULL);
/*!40000 ALTER TABLE `app_birth` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `app_food`
--

DROP TABLE IF EXISTS `app_food`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!50503 SET character_set_client = utf8mb4 */;
CREATE TABLE `app_food` (
  `id` int DEFAULT NULL,
  `user_id` int DEFAULT NULL COMMENT '用户ID',
  `category_id` int DEFAULT NULL COMMENT '分类ID',
  `name` varchar(255) CHARACTER SET utf8mb3 COLLATE utf8mb3_unicode_ci DEFAULT NULL COMMENT '食物名称',
  `describe` varchar(255) CHARACTER SET utf8mb3 COLLATE utf8mb3_unicode_ci DEFAULT NULL COMMENT '食物描述',
  `create_time` datetime DEFAULT NULL COMMENT '创建时间',
  `update_time` datetime DEFAULT NULL COMMENT '更新时间',
  `status` int DEFAULT NULL COMMENT '状态',
  `thumbnail` varchar(50) COLLATE utf8mb3_unicode_ci DEFAULT NULL COMMENT '缩略图'
) ENGINE=MyISAM DEFAULT CHARSET=utf8mb3 COLLATE=utf8mb3_unicode_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `app_food`
--

LOCK TABLES `app_food` WRITE;
/*!40000 ALTER TABLE `app_food` DISABLE KEYS */;
/*!40000 ALTER TABLE `app_food` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `app_food_analyse`
--

DROP TABLE IF EXISTS `app_food_analyse`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!50503 SET character_set_client = utf8mb4 */;
CREATE TABLE `app_food_analyse` (
  `id` int NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=MyISAM DEFAULT CHARSET=utf8mb3 COLLATE=utf8mb3_unicode_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `app_food_analyse`
--

LOCK TABLES `app_food_analyse` WRITE;
/*!40000 ALTER TABLE `app_food_analyse` DISABLE KEYS */;
/*!40000 ALTER TABLE `app_food_analyse` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `app_food_category`
--

DROP TABLE IF EXISTS `app_food_category`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!50503 SET character_set_client = utf8mb4 */;
CREATE TABLE `app_food_category` (
  `id` int NOT NULL,
  `name` varchar(255) CHARACTER SET utf8mb3 COLLATE utf8mb3_unicode_ci DEFAULT NULL,
  `parent_id` int DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=MyISAM DEFAULT CHARSET=utf8mb3 COLLATE=utf8mb3_unicode_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `app_food_category`
--

LOCK TABLES `app_food_category` WRITE;
/*!40000 ALTER TABLE `app_food_category` DISABLE KEYS */;
/*!40000 ALTER TABLE `app_food_category` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `app_food_detail`
--

DROP TABLE IF EXISTS `app_food_detail`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!50503 SET character_set_client = utf8mb4 */;
CREATE TABLE `app_food_detail` (
  `id` int NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=MyISAM DEFAULT CHARSET=utf8mb3 COLLATE=utf8mb3_unicode_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `app_food_detail`
--

LOCK TABLES `app_food_detail` WRITE;
/*!40000 ALTER TABLE `app_food_detail` DISABLE KEYS */;
/*!40000 ALTER TABLE `app_food_detail` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `app_food_resource`
--

DROP TABLE IF EXISTS `app_food_resource`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!50503 SET character_set_client = utf8mb4 */;
CREATE TABLE `app_food_resource` (
  `id` varchar(255) CHARACTER SET utf8mb3 COLLATE utf8mb3_unicode_ci DEFAULT NULL COMMENT 'ID',
  `food_id` int DEFAULT NULL COMMENT '食物ID',
  `resource_id` int DEFAULT NULL COMMENT '资源ID',
  `resource_type` varchar(255) CHARACTER SET utf8mb3 COLLATE utf8mb3_unicode_ci DEFAULT NULL COMMENT '资源类型',
  `resource_url` varchar(255) CHARACTER SET utf8mb3 COLLATE utf8mb3_unicode_ci DEFAULT NULL COMMENT '资源地址'
) ENGINE=MyISAM DEFAULT CHARSET=utf8mb3 COLLATE=utf8mb3_unicode_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `app_food_resource`
--

LOCK TABLES `app_food_resource` WRITE;
/*!40000 ALTER TABLE `app_food_resource` DISABLE KEYS */;
/*!40000 ALTER TABLE `app_food_resource` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `app_friend`
--

DROP TABLE IF EXISTS `app_friend`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!50503 SET character_set_client = utf8mb4 */;
CREATE TABLE `app_friend` (
  `id` int NOT NULL AUTO_INCREMENT,
  `name` varchar(50) CHARACTER SET utf8mb3 COLLATE utf8mb3_unicode_ci DEFAULT NULL COMMENT '姓名',
  `sex` int DEFAULT NULL COMMENT '性别',
  `birth_date` datetime DEFAULT NULL COMMENT '出生日期',
  `create_time` datetime DEFAULT NULL COMMENT '创建时间',
  `update_time` datetime DEFAULT NULL COMMENT '更新时间',
  `delete_time` datetime DEFAULT NULL COMMENT '删除时间',
  `birth_type` int DEFAULT NULL COMMENT '生日类型（1、农历 2、公历）',
  `status` int DEFAULT NULL COMMENT '状态',
  `avatar` varchar(50) CHARACTER SET utf8mb3 COLLATE utf8mb3_unicode_ci DEFAULT NULL COMMENT '头像',
  `user_id` int DEFAULT NULL COMMENT '所属用户',
  `phone` varchar(255) CHARACTER SET utf8mb3 COLLATE utf8mb3_unicode_ci DEFAULT NULL COMMENT '主手机号',
  `qq` varchar(255) CHARACTER SET utf8mb3 COLLATE utf8mb3_unicode_ci DEFAULT NULL COMMENT '主qq号',
  `wechat` varchar(255) CHARACTER SET utf8mb3 COLLATE utf8mb3_unicode_ci DEFAULT NULL COMMENT '主微信号',
  `email` varchar(255) CHARACTER SET utf8mb3 COLLATE utf8mb3_unicode_ci DEFAULT NULL COMMENT '主邮箱',
  `live_address` varchar(255) CHARACTER SET utf8mb3 COLLATE utf8mb3_unicode_ci DEFAULT NULL COMMENT '居住地址',
  `address` varchar(255) CHARACTER SET utf8mb3 COLLATE utf8mb3_unicode_ci DEFAULT NULL COMMENT '家庭住址',
  `school` varchar(255) CHARACTER SET utf8mb3 COLLATE utf8mb3_unicode_ci DEFAULT NULL COMMENT '学历信息',
  `disposition` varchar(255) CHARACTER SET utf8mb3 COLLATE utf8mb3_unicode_ci DEFAULT NULL COMMENT '性格',
  `remark` varchar(255) CHARACTER SET utf8mb3 COLLATE utf8mb3_unicode_ci DEFAULT NULL COMMENT '备注',
  `advantage` varchar(255) CHARACTER SET utf8mb3 COLLATE utf8mb3_unicode_ci DEFAULT NULL COMMENT '优势',
  `disadvantage` varchar(255) CHARACTER SET utf8mb3 COLLATE utf8mb3_unicode_ci DEFAULT NULL COMMENT '劣势',
  PRIMARY KEY (`id`)
) ENGINE=MyISAM AUTO_INCREMENT=3 DEFAULT CHARSET=utf8mb3 COLLATE=utf8mb3_unicode_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `app_friend`
--

LOCK TABLES `app_friend` WRITE;
/*!40000 ALTER TABLE `app_friend` DISABLE KEYS */;
INSERT INTO `app_friend` VALUES (1,'12',2,'0000-00-00 00:00:00',NULL,NULL,NULL,NULL,12,'12',NULL,'12','12','12','12',NULL,'12',NULL,NULL,'',NULL,NULL),(2,'12',2,'0000-00-00 00:00:00',NULL,NULL,NULL,NULL,12,'12',NULL,'12','12','12','12',NULL,'12',NULL,NULL,'',NULL,NULL);
/*!40000 ALTER TABLE `app_friend` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `app_friend_analyse`
--

DROP TABLE IF EXISTS `app_friend_analyse`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!50503 SET character_set_client = utf8mb4 */;
CREATE TABLE `app_friend_analyse` (
  `id` int NOT NULL,
  `friend_id` int DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=MyISAM DEFAULT CHARSET=utf8mb3 COLLATE=utf8mb3_unicode_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `app_friend_analyse`
--

LOCK TABLES `app_friend_analyse` WRITE;
/*!40000 ALTER TABLE `app_friend_analyse` DISABLE KEYS */;
/*!40000 ALTER TABLE `app_friend_analyse` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `app_friend_detail`
--

DROP TABLE IF EXISTS `app_friend_detail`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!50503 SET character_set_client = utf8mb4 */;
CREATE TABLE `app_friend_detail` (
  `id` varchar(255) CHARACTER SET utf8mb3 COLLATE utf8mb3_unicode_ci DEFAULT NULL
) ENGINE=MyISAM DEFAULT CHARSET=utf8mb3 COLLATE=utf8mb3_unicode_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `app_friend_detail`
--

LOCK TABLES `app_friend_detail` WRITE;
/*!40000 ALTER TABLE `app_friend_detail` DISABLE KEYS */;
/*!40000 ALTER TABLE `app_friend_detail` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `app_friend_email`
--

DROP TABLE IF EXISTS `app_friend_email`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!50503 SET character_set_client = utf8mb4 */;
CREATE TABLE `app_friend_email` (
  `id` varchar(255) CHARACTER SET utf8mb3 COLLATE utf8mb3_unicode_ci DEFAULT NULL,
  `email` varchar(255) CHARACTER SET utf8mb3 COLLATE utf8mb3_unicode_ci DEFAULT NULL,
  `friend_id` int DEFAULT NULL
) ENGINE=MyISAM DEFAULT CHARSET=utf8mb3 COLLATE=utf8mb3_unicode_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `app_friend_email`
--

LOCK TABLES `app_friend_email` WRITE;
/*!40000 ALTER TABLE `app_friend_email` DISABLE KEYS */;
/*!40000 ALTER TABLE `app_friend_email` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `app_friend_phone`
--

DROP TABLE IF EXISTS `app_friend_phone`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!50503 SET character_set_client = utf8mb4 */;
CREATE TABLE `app_friend_phone` (
  `id` int NOT NULL,
  `friend_id` int DEFAULT NULL,
  `phone` varchar(255) CHARACTER SET utf8mb3 COLLATE utf8mb3_unicode_ci DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=MyISAM DEFAULT CHARSET=utf8mb3 COLLATE=utf8mb3_unicode_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `app_friend_phone`
--

LOCK TABLES `app_friend_phone` WRITE;
/*!40000 ALTER TABLE `app_friend_phone` DISABLE KEYS */;
/*!40000 ALTER TABLE `app_friend_phone` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `app_friend_qq`
--

DROP TABLE IF EXISTS `app_friend_qq`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!50503 SET character_set_client = utf8mb4 */;
CREATE TABLE `app_friend_qq` (
  `id` int NOT NULL,
  `friend_id` int DEFAULT NULL,
  `qq` varchar(255) CHARACTER SET utf8mb3 COLLATE utf8mb3_unicode_ci DEFAULT NULL,
  `nickname` varchar(255) CHARACTER SET utf8mb3 COLLATE utf8mb3_unicode_ci DEFAULT NULL,
  `avatar` varchar(255) CHARACTER SET utf8mb3 COLLATE utf8mb3_unicode_ci DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=MyISAM DEFAULT CHARSET=utf8mb3 COLLATE=utf8mb3_unicode_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `app_friend_qq`
--

LOCK TABLES `app_friend_qq` WRITE;
/*!40000 ALTER TABLE `app_friend_qq` DISABLE KEYS */;
/*!40000 ALTER TABLE `app_friend_qq` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `app_friend_wechat`
--

DROP TABLE IF EXISTS `app_friend_wechat`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!50503 SET character_set_client = utf8mb4 */;
CREATE TABLE `app_friend_wechat` (
  `id` int NOT NULL,
  `friend_id` int DEFAULT NULL,
  `wechat` varchar(255) CHARACTER SET utf8mb3 COLLATE utf8mb3_unicode_ci DEFAULT NULL,
  `nickname` varchar(255) CHARACTER SET utf8mb3 COLLATE utf8mb3_unicode_ci DEFAULT NULL,
  `avatar` varchar(255) CHARACTER SET utf8mb3 COLLATE utf8mb3_unicode_ci DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=MyISAM DEFAULT CHARSET=utf8mb3 COLLATE=utf8mb3_unicode_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `app_friend_wechat`
--

LOCK TABLES `app_friend_wechat` WRITE;
/*!40000 ALTER TABLE `app_friend_wechat` DISABLE KEYS */;
/*!40000 ALTER TABLE `app_friend_wechat` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `app_mood`
--

DROP TABLE IF EXISTS `app_mood`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!50503 SET character_set_client = utf8mb4 */;
CREATE TABLE `app_mood` (
  `id` int NOT NULL AUTO_INCREMENT COMMENT 'ID',
  `mood_type` int DEFAULT NULL COMMENT '心情',
  `is_delete` int DEFAULT NULL COMMENT '是否删除',
  `create_time` datetime DEFAULT NULL COMMENT '创建时间',
  `update_time` datetime DEFAULT NULL COMMENT '更新时间',
  `delete_time` datetime DEFAULT NULL COMMENT '删除时间',
  `notes` text CHARACTER SET utf8mb3 COLLATE utf8mb3_unicode_ci COMMENT '备注',
  PRIMARY KEY (`id`)
) ENGINE=MyISAM DEFAULT CHARSET=utf8mb3 COLLATE=utf8mb3_unicode_ci COMMENT='心情、朋友圈';
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `app_mood`
--

LOCK TABLES `app_mood` WRITE;
/*!40000 ALTER TABLE `app_mood` DISABLE KEYS */;
/*!40000 ALTER TABLE `app_mood` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `app_mood_comment`
--

DROP TABLE IF EXISTS `app_mood_comment`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!50503 SET character_set_client = utf8mb4 */;
CREATE TABLE `app_mood_comment` (
  `id` int DEFAULT NULL,
  `content` varchar(50) CHARACTER SET utf8mb3 COLLATE utf8mb3_unicode_ci DEFAULT NULL COMMENT '评论内容',
  `mood_id` int DEFAULT NULL COMMENT '心情ID',
  `user_id` int DEFAULT NULL COMMENT '用户ID',
  `create_time` datetime DEFAULT NULL COMMENT '创建时间',
  `parent_user_id` int DEFAULT NULL COMMENT '父用户iD'
) ENGINE=MyISAM DEFAULT CHARSET=utf8mb3 COLLATE=utf8mb3_unicode_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `app_mood_comment`
--

LOCK TABLES `app_mood_comment` WRITE;
/*!40000 ALTER TABLE `app_mood_comment` DISABLE KEYS */;
/*!40000 ALTER TABLE `app_mood_comment` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `app_mood_images`
--

DROP TABLE IF EXISTS `app_mood_images`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!50503 SET character_set_client = utf8mb4 */;
CREATE TABLE `app_mood_images` (
  `id` int DEFAULT NULL,
  `image_url` varchar(300) CHARACTER SET utf8mb3 COLLATE utf8mb3_unicode_ci DEFAULT NULL
) ENGINE=MyISAM DEFAULT CHARSET=utf8mb3 COLLATE=utf8mb3_unicode_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `app_mood_images`
--

LOCK TABLES `app_mood_images` WRITE;
/*!40000 ALTER TABLE `app_mood_images` DISABLE KEYS */;
/*!40000 ALTER TABLE `app_mood_images` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `app_mood_love`
--

DROP TABLE IF EXISTS `app_mood_love`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!50503 SET character_set_client = utf8mb4 */;
CREATE TABLE `app_mood_love` (
  `id` int DEFAULT NULL,
  `user_id` int DEFAULT NULL
) ENGINE=MyISAM DEFAULT CHARSET=utf8mb3 COLLATE=utf8mb3_unicode_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `app_mood_love`
--

LOCK TABLES `app_mood_love` WRITE;
/*!40000 ALTER TABLE `app_mood_love` DISABLE KEYS */;
/*!40000 ALTER TABLE `app_mood_love` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `app_mood_type`
--

DROP TABLE IF EXISTS `app_mood_type`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!50503 SET character_set_client = utf8mb4 */;
CREATE TABLE `app_mood_type` (
  `id` int DEFAULT NULL,
  `name` int DEFAULT NULL
) ENGINE=MyISAM DEFAULT CHARSET=utf8mb3 COLLATE=utf8mb3_unicode_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `app_mood_type`
--

LOCK TABLES `app_mood_type` WRITE;
/*!40000 ALTER TABLE `app_mood_type` DISABLE KEYS */;
/*!40000 ALTER TABLE `app_mood_type` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `app_note`
--

DROP TABLE IF EXISTS `app_note`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!50503 SET character_set_client = utf8mb4 */;
CREATE TABLE `app_note` (
  `id` int DEFAULT NULL,
  `user_id` int DEFAULT NULL,
  `content` int DEFAULT NULL,
  `create_time` int DEFAULT NULL,
  `update_time` int DEFAULT NULL,
  `delete_time` int DEFAULT NULL
) ENGINE=MyISAM DEFAULT CHARSET=utf8mb3 COLLATE=utf8mb3_unicode_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `app_note`
--

LOCK TABLES `app_note` WRITE;
/*!40000 ALTER TABLE `app_note` DISABLE KEYS */;
/*!40000 ALTER TABLE `app_note` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `app_note_attr`
--

DROP TABLE IF EXISTS `app_note_attr`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!50503 SET character_set_client = utf8mb4 */;
CREATE TABLE `app_note_attr` (
  `app` varchar(255) CHARACTER SET utf8mb3 COLLATE utf8mb3_unicode_ci DEFAULT NULL
) ENGINE=MyISAM DEFAULT CHARSET=utf8mb3 COLLATE=utf8mb3_unicode_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `app_note_attr`
--

LOCK TABLES `app_note_attr` WRITE;
/*!40000 ALTER TABLE `app_note_attr` DISABLE KEYS */;
/*!40000 ALTER TABLE `app_note_attr` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `app_note_type`
--

DROP TABLE IF EXISTS `app_note_type`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!50503 SET character_set_client = utf8mb4 */;
CREATE TABLE `app_note_type` (
  `ap` varchar(255) CHARACTER SET utf8mb3 COLLATE utf8mb3_unicode_ci DEFAULT NULL
) ENGINE=MyISAM DEFAULT CHARSET=utf8mb3 COLLATE=utf8mb3_unicode_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `app_note_type`
--

LOCK TABLES `app_note_type` WRITE;
/*!40000 ALTER TABLE `app_note_type` DISABLE KEYS */;
/*!40000 ALTER TABLE `app_note_type` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `app_todo`
--

DROP TABLE IF EXISTS `app_todo`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!50503 SET character_set_client = utf8mb4 */;
CREATE TABLE `app_todo` (
  `id` int DEFAULT NULL,
  `user_id` int DEFAULT NULL
) ENGINE=MyISAM DEFAULT CHARSET=utf8mb3 COLLATE=utf8mb3_unicode_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `app_todo`
--

LOCK TABLES `app_todo` WRITE;
/*!40000 ALTER TABLE `app_todo` DISABLE KEYS */;
/*!40000 ALTER TABLE `app_todo` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `app_todo_detail`
--

DROP TABLE IF EXISTS `app_todo_detail`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!50503 SET character_set_client = utf8mb4 */;
CREATE TABLE `app_todo_detail` (
  `id` int NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=MyISAM DEFAULT CHARSET=utf8mb3 COLLATE=utf8mb3_unicode_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `app_todo_detail`
--

LOCK TABLES `app_todo_detail` WRITE;
/*!40000 ALTER TABLE `app_todo_detail` DISABLE KEYS */;
/*!40000 ALTER TABLE `app_todo_detail` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `sys_resource`
--

DROP TABLE IF EXISTS `sys_resource`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!50503 SET character_set_client = utf8mb4 */;
CREATE TABLE `sys_resource` (
  `id` int DEFAULT NULL,
  `name` int DEFAULT NULL,
  `user_id` int DEFAULT NULL,
  `create_time` int DEFAULT NULL,
  `update_time` int DEFAULT NULL,
  `delete_time` int DEFAULT NULL,
  `is_delete` int DEFAULT NULL,
  `resource_url` int DEFAULT NULL
) ENGINE=MyISAM DEFAULT CHARSET=utf8mb3 COLLATE=utf8mb3_unicode_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `sys_resource`
--

LOCK TABLES `sys_resource` WRITE;
/*!40000 ALTER TABLE `sys_resource` DISABLE KEYS */;
/*!40000 ALTER TABLE `sys_resource` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `sys_resource_type`
--

DROP TABLE IF EXISTS `sys_resource_type`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!50503 SET character_set_client = utf8mb4 */;
CREATE TABLE `sys_resource_type` (
  `id` int NOT NULL,
  `name` int DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=MyISAM DEFAULT CHARSET=utf8mb3 COLLATE=utf8mb3_unicode_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `sys_resource_type`
--

LOCK TABLES `sys_resource_type` WRITE;
/*!40000 ALTER TABLE `sys_resource_type` DISABLE KEYS */;
/*!40000 ALTER TABLE `sys_resource_type` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `sys_role`
--

DROP TABLE IF EXISTS `sys_role`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!50503 SET character_set_client = utf8mb4 */;
CREATE TABLE `sys_role` (
  `id` int DEFAULT NULL,
  `name` int DEFAULT NULL
) ENGINE=MyISAM DEFAULT CHARSET=utf8mb3 COLLATE=utf8mb3_unicode_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `sys_role`
--

LOCK TABLES `sys_role` WRITE;
/*!40000 ALTER TABLE `sys_role` DISABLE KEYS */;
/*!40000 ALTER TABLE `sys_role` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `sys_task`
--

DROP TABLE IF EXISTS `sys_task`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!50503 SET character_set_client = utf8mb4 */;
CREATE TABLE `sys_task` (
  `id` int DEFAULT NULL,
  `name` int DEFAULT NULL,
  `user_id` int DEFAULT NULL
) ENGINE=MyISAM DEFAULT CHARSET=utf8mb3 COLLATE=utf8mb3_unicode_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `sys_task`
--

LOCK TABLES `sys_task` WRITE;
/*!40000 ALTER TABLE `sys_task` DISABLE KEYS */;
/*!40000 ALTER TABLE `sys_task` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `sys_user`
--

DROP TABLE IF EXISTS `sys_user`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!50503 SET character_set_client = utf8mb4 */;
CREATE TABLE `sys_user` (
  `id` int NOT NULL AUTO_INCREMENT,
  `username` varchar(50) CHARACTER SET utf8mb3 COLLATE utf8mb3_unicode_ci DEFAULT NULL COMMENT '用户名',
  `password` varchar(50) CHARACTER SET utf8mb3 COLLATE utf8mb3_unicode_ci DEFAULT NULL COMMENT '密码',
  `nickname` varchar(50) CHARACTER SET utf8mb3 COLLATE utf8mb3_unicode_ci DEFAULT NULL COMMENT '昵称',
  `sex` int DEFAULT NULL COMMENT '性别',
  `create_time` datetime DEFAULT NULL COMMENT '创建时间',
  `avatar` varchar(50) CHARACTER SET utf8mb3 COLLATE utf8mb3_unicode_ci DEFAULT NULL COMMENT '头像',
  `update_time` datetime DEFAULT NULL COMMENT '更新时间',
  `delete_time` datetime DEFAULT NULL COMMENT '删除时间',
  `status` int DEFAULT NULL COMMENT '账号状态',
  `role_id` int DEFAULT NULL COMMENT '角色',
  `is_delete` varchar(255) CHARACTER SET utf8mb3 COLLATE utf8mb3_unicode_ci DEFAULT NULL COMMENT '是否删除',
  `is_super` varchar(255) CHARACTER SET utf8mb3 COLLATE utf8mb3_unicode_ci DEFAULT NULL COMMENT '是否拥有超级管理权限',
  PRIMARY KEY (`id`)
) ENGINE=MyISAM AUTO_INCREMENT=6 DEFAULT CHARSET=utf8mb3 COLLATE=utf8mb3_unicode_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `sys_user`
--

LOCK TABLES `sys_user` WRITE;
/*!40000 ALTER TABLE `sys_user` DISABLE KEYS */;
INSERT INTO `sys_user` VALUES (1,'test','test','test',1,'2024-10-11 08:30:39','test','2024-10-11 08:30:39',NULL,1,NULL,NULL,NULL),(2,'test1','test1','test',1,'2024-10-11 08:37:25','test','2024-10-11 08:37:25',NULL,1,NULL,NULL,NULL),(3,'test1','test1','test',1,'2024-10-11 08:38:02','test','2024-10-11 08:38:02',NULL,1,NULL,NULL,NULL),(4,'test1','test1','test',1,'2024-10-11 08:38:14','test','2024-10-11 08:38:14',NULL,1,NULL,NULL,NULL),(5,'test1','test1','test',1,'2024-10-11 08:38:50','test','2024-10-11 08:38:50',NULL,1,NULL,NULL,NULL);
/*!40000 ALTER TABLE `sys_user` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `sys_user_detail`
--

DROP TABLE IF EXISTS `sys_user_detail`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!50503 SET character_set_client = utf8mb4 */;
CREATE TABLE `sys_user_detail` (
  `id` int NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=MyISAM DEFAULT CHARSET=utf8mb3 COLLATE=utf8mb3_unicode_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `sys_user_detail`
--

LOCK TABLES `sys_user_detail` WRITE;
/*!40000 ALTER TABLE `sys_user_detail` DISABLE KEYS */;
/*!40000 ALTER TABLE `sys_user_detail` ENABLE KEYS */;
UNLOCK TABLES;
/*!40103 SET TIME_ZONE=@OLD_TIME_ZONE */;

/*!40101 SET SQL_MODE=@OLD_SQL_MODE */;
/*!40014 SET FOREIGN_KEY_CHECKS=@OLD_FOREIGN_KEY_CHECKS */;
/*!40014 SET UNIQUE_CHECKS=@OLD_UNIQUE_CHECKS */;
/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
/*!40111 SET SQL_NOTES=@OLD_SQL_NOTES */;

-- Dump completed on 2024-10-22  4:44:32
