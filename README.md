# Daily App

Github项目地址：https://github.com/huaqiwill/daily-app


## 技术 & 架构描述

前端使用unaipp开发，适配安卓、iOS、微信小程序三大平台。

服务端使用ThinkPHP开发。

后期接入AI大模型为App注入智能化管理。


前端技术体系

* 网络请求使用axios
* 前端UI使用Vant4 + Bootstrap
* 前端路由使用uniapp自带


服务端技术体系

* 后台管理系统后续完成
* 后台基于ThinPHP6开发




## 模型设计

日记管理

```sql
CREATE TABLE `notes` (
	`id` INT(11) NULL DEFAULT NULL
)
COLLATE='utf8_unicode_ci'
ENGINE=MyISAM
;
```

账单管理

```sql
CREATE TABLE `bill` (
	`id` INT(11) NULL DEFAULT NULL
)
COLLATE='utf8_unicode_ci'
ENGINE=MyISAM
;
```

用户管理

```sql
CREATE TABLE `user` (
	`id` INT(11) NOT NULL AUTO_INCREMENT,
	`username` VARCHAR(50) NULL DEFAULT NULL COLLATE 'utf8_unicode_ci',
	`password` VARCHAR(50) NULL DEFAULT NULL COLLATE 'utf8_unicode_ci',
	`nickname` VARCHAR(50) NULL DEFAULT NULL COLLATE 'utf8_unicode_ci',
	`sex` INT(11) NULL DEFAULT NULL,
	`create_time` DATETIME NULL DEFAULT NULL,
	`avatar` VARCHAR(50) NULL DEFAULT NULL COLLATE 'utf8_unicode_ci',
	`update_time` DATETIME NULL DEFAULT NULL,
	`delete_time` DATETIME NULL DEFAULT NULL,
	`status` INT(11) NULL DEFAULT NULL,
	PRIMARY KEY (`id`) USING BTREE
)
COLLATE='utf8_unicode_ci'
ENGINE=MyISAM
AUTO_INCREMENT=6
;
```

生日管理

```sql
CREATE TABLE `birth` (
	`id` INT(11) NOT NULL AUTO_INCREMENT,
	`name` VARCHAR(50) NULL DEFAULT NULL COLLATE 'utf8_unicode_ci',
	`sex` INT(11) NULL DEFAULT NULL,
	`birth_date` DATETIME NULL DEFAULT NULL,
	`phone` VARCHAR(50) NULL DEFAULT NULL COLLATE 'utf8_unicode_ci',
	`email` VARCHAR(50) NULL DEFAULT NULL COLLATE 'utf8_unicode_ci',
	PRIMARY KEY (`id`) USING BTREE
)
COLLATE='utf8_unicode_ci'
ENGINE=MyISAM
;
```

饮食管理

```sql
CREATE TABLE `foods` (
	`id` INT(11) NULL DEFAULT NULL
)
COLLATE='utf8_unicode_ci'
ENGINE=MyISAM
;
```

关系管理

```sql
CREATE TABLE `friends` (
	`id` INT(11) NOT NULL AUTO_INCREMENT,
	`name` VARCHAR(50) NULL DEFAULT NULL COLLATE 'utf8_unicode_ci',
	`sex` INT(11) NULL DEFAULT NULL,
	`birth_date` DATETIME NULL DEFAULT NULL,
	`create_time` DATETIME NULL DEFAULT NULL,
	`update_time` DATETIME NULL DEFAULT NULL,
	`delete_time` DATETIME NULL DEFAULT NULL,
	`birth_type` INT(11) NULL DEFAULT NULL,
	`status` INT(11) NULL DEFAULT NULL,
	`avatar` VARCHAR(50) NULL DEFAULT NULL COLLATE 'utf8_unicode_ci',
	PRIMARY KEY (`id`) USING BTREE
)
COLLATE='utf8_unicode_ci'
ENGINE=MyISAM
;
```

待办管理

```sql
CREATE TABLE `todos` (
	`id` INT(11) NULL DEFAULT NULL
)
COLLATE='utf8_unicode_ci'
ENGINE=MyISAM
;
```





## 服务端功能描述

### 功能描述

* 日记管理
* 饮食管理
* 生活管理
* 账单管理
* 生日管理
* 关系管理
* 资源管理
* 任务管理
* 待办管理
* 

### 日记管理

笔记的增删改查，

接入每日提醒功能、接入微信公众号消息提醒和邮件消息提醒。





### 饮食管理

饮食的增删改查，后期接入AI大模型





### 账单管理

实现AI自动记账功能，后期接入大模型







### 资源管理

* 图片、文件的管理

* 文件的上传下载
* 图片、视频、音频等内容支持预览
* 

### 任务管理



### 待办管理





## 前端界面管理

### TabBar

首页、我的、



### 登录注册页面





### 首页（Index）







### 我的（Profile）





### 生日管理（Birth）





### 待办（Todos）









