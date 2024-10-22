# Daily App 日常生活管理APP

Github项目地址：https://github.com/huaqiwill/daily-app

作者：Huaqiwill

作者：Iden9


## 技术 & 架构体系描述

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

## 数据库模型设计

数据库采用MySQL进行标准存储。

### 日程管理模块

本模块包含：日记、相册、心情、账单、饮食、待办等功能。

心情管理

```sql
CREATE TABLE `app_mood` (
	`id` INT(10) NOT NULL AUTO_INCREMENT COMMENT 'ID',
	`mood_type` INT(10) NULL DEFAULT NULL COMMENT '心情',
	`is_delete` INT(10) NULL DEFAULT NULL COMMENT '是否删除',
	`create_time` DATETIME NULL DEFAULT NULL COMMENT '创建时间',
	`update_time` DATETIME NULL DEFAULT NULL COMMENT '更新时间',
	`delete_time` DATETIME NULL DEFAULT NULL COMMENT '删除时间',
	`notes` TEXT NULL DEFAULT NULL COMMENT '备注' COLLATE 'utf8mb3_unicode_ci',
	PRIMARY KEY (`id`) USING BTREE
)
COMMENT='心情、朋友圈'
COLLATE='utf8mb3_unicode_ci'
ENGINE=MyISAM
;
```

日记管理

```sql
CREATE TABLE `app_note` (
	`id` INT(10) NULL DEFAULT NULL,
	`user_id` INT(10) NULL DEFAULT NULL,
	`content` INT(10) NULL DEFAULT NULL,
	`create_time` INT(10) NULL DEFAULT NULL,
	`update_time` INT(10) NULL DEFAULT NULL,
	`delete_time` INT(10) NULL DEFAULT NULL
)
COLLATE='utf8mb3_unicode_ci'
ENGINE=MyISAM
;
```

账单管理

```sql
CREATE TABLE `app_bill` (
	`id` INT(10) NULL DEFAULT NULL,
	`user_id` INT(10) NULL DEFAULT NULL COMMENT '所属用户',
	`create_time` DATETIME NULL DEFAULT NULL COMMENT '创建时间',
	`update_time` DATETIME NULL DEFAULT NULL COMMENT '更新时间',
	`delete_time` DATETIME NULL DEFAULT NULL COMMENT '删除时间',
	`spending_time` DATETIME NULL DEFAULT NULL COMMENT '消费时间',
	`id_delete` DATETIME NULL DEFAULT NULL COMMENT '是否删除',
	`amount` DECIMAL(10,2) NULL DEFAULT NULL COMMENT '金额',
	`order_name` VARCHAR(255) NULL DEFAULT NULL COMMENT '商品名称' COLLATE 'utf8mb3_unicode_ci'
)
COLLATE='utf8mb3_unicode_ci'
ENGINE=MyISAM
;
```

饮食管理

```sql
CREATE TABLE `app_food` (
	`id` INT(10) NULL DEFAULT NULL,
	`user_id` INT(10) NULL DEFAULT NULL COMMENT '用户ID',
	`category_id` INT(10) NULL DEFAULT NULL COMMENT '分类ID',
	`name` VARCHAR(255) NULL DEFAULT NULL COMMENT '食物名称' COLLATE 'utf8mb3_unicode_ci',
	`describe` VARCHAR(255) NULL DEFAULT NULL COMMENT '食物描述' COLLATE 'utf8mb3_unicode_ci',
	`create_time` DATETIME NULL DEFAULT NULL COMMENT '创建时间',
	`update_time` DATETIME NULL DEFAULT NULL COMMENT '更新时间',
	`status` INT(10) NULL DEFAULT NULL COMMENT '状态',
	`thumbnail` VARCHAR(50) NULL DEFAULT NULL COMMENT '缩略图' COLLATE 'utf8mb3_unicode_ci'
)
COLLATE='utf8mb3_unicode_ci'
ENGINE=MyISAM
;
```

待办管理

```sql
CREATE TABLE `app_todo` (
	`id` INT(10) NULL DEFAULT NULL,
	`user_id` INT(10) NULL DEFAULT NULL
)
COLLATE='utf8mb3_unicode_ci'
ENGINE=MyISAM
;
```

### 档案管理模块

本模块包含：关系、生日等信息的管理。

关系管理

```sql
CREATE TABLE `app_friend` (
	`id` INT(10) NOT NULL AUTO_INCREMENT,
	`name` VARCHAR(50) NULL DEFAULT NULL COMMENT '姓名' COLLATE 'utf8mb3_unicode_ci',
	`sex` INT(10) NULL DEFAULT NULL COMMENT '性别',
	`birth_date` DATETIME NULL DEFAULT NULL COMMENT '出生日期',
	`create_time` DATETIME NULL DEFAULT NULL COMMENT '创建时间',
	`update_time` DATETIME NULL DEFAULT NULL COMMENT '更新时间',
	`delete_time` DATETIME NULL DEFAULT NULL COMMENT '删除时间',
	`birth_type` INT(10) NULL DEFAULT NULL COMMENT '生日类型（1、农历 2、公历）',
	`status` INT(10) NULL DEFAULT NULL COMMENT '状态',
	`avatar` VARCHAR(50) NULL DEFAULT NULL COMMENT '头像' COLLATE 'utf8mb3_unicode_ci',
	`user_id` INT(10) NULL DEFAULT NULL COMMENT '所属用户',
	`phone` VARCHAR(255) NULL DEFAULT NULL COMMENT '主手机号' COLLATE 'utf8mb3_unicode_ci',
	`qq` VARCHAR(255) NULL DEFAULT NULL COMMENT '主qq号' COLLATE 'utf8mb3_unicode_ci',
	`wechat` VARCHAR(255) NULL DEFAULT NULL COMMENT '主微信号' COLLATE 'utf8mb3_unicode_ci',
	`email` VARCHAR(255) NULL DEFAULT NULL COMMENT '主邮箱' COLLATE 'utf8mb3_unicode_ci',
	`live_address` VARCHAR(255) NULL DEFAULT NULL COMMENT '居住地址' COLLATE 'utf8mb3_unicode_ci',
	`address` VARCHAR(255) NULL DEFAULT NULL COMMENT '家庭住址' COLLATE 'utf8mb3_unicode_ci',
	`school` VARCHAR(255) NULL DEFAULT NULL COMMENT '学历信息' COLLATE 'utf8mb3_unicode_ci',
	`disposition` VARCHAR(255) NULL DEFAULT NULL COMMENT '性格' COLLATE 'utf8mb3_unicode_ci',
	`remark` VARCHAR(255) NULL DEFAULT NULL COMMENT '备注' COLLATE 'utf8mb3_unicode_ci',
	`advantage` VARCHAR(255) NULL DEFAULT NULL COMMENT '优势' COLLATE 'utf8mb3_unicode_ci',
	`disadvantage` VARCHAR(255) NULL DEFAULT NULL COMMENT '劣势' COLLATE 'utf8mb3_unicode_ci',
	PRIMARY KEY (`id`) USING BTREE
)
COLLATE='utf8mb3_unicode_ci'
ENGINE=MyISAM
AUTO_INCREMENT=3
;
```

生日管理

```sql
CREATE TABLE `app_birth` (
	`id` INT(10) NOT NULL AUTO_INCREMENT COMMENT 'ID',
	`user_id` INT(10) NULL DEFAULT NULL COMMENT '所属用户',
	`name` VARCHAR(50) NULL DEFAULT NULL COMMENT '姓名' COLLATE 'utf8mb3_unicode_ci',
	`sex` INT(10) NULL DEFAULT NULL COMMENT '性别',
	`birth_date` DATETIME NULL DEFAULT NULL COMMENT '出生日期',
	`birth_type` VARCHAR(255) NULL DEFAULT NULL COMMENT '生日类型（1、农历 2、公历）' COLLATE 'utf8mb3_unicode_ci',
	`phone` VARCHAR(50) NULL DEFAULT NULL COMMENT '手机号' COLLATE 'utf8mb3_unicode_ci',
	`email` VARCHAR(50) NULL DEFAULT NULL COMMENT '邮件' COLLATE 'utf8mb3_unicode_ci',
	`qq` VARCHAR(255) NULL DEFAULT NULL COMMENT 'QQ' COLLATE 'utf8mb3_unicode_ci',
	`wechat` VARCHAR(255) NULL DEFAULT NULL COLLATE 'utf8mb3_unicode_ci',
	`friend_id` VARCHAR(255) NULL DEFAULT NULL COLLATE 'utf8mb3_unicode_ci',
	PRIMARY KEY (`id`) USING BTREE
)
COLLATE='utf8mb3_unicode_ci'
ENGINE=MyISAM
AUTO_INCREMENT=5
;
```



### 日志管理模块

由于我们的日志数据会比较多，因此我们的日志数据不存储到数据库，而是存储到日志文件。或者其他专用数据库系统。



### 系统管理模块

用户以及会员管理

用户管理

```sql
CREATE TABLE `sys_user` (
	`id` INT(10) NOT NULL AUTO_INCREMENT,
	`username` VARCHAR(50) NULL DEFAULT NULL COMMENT '用户名' COLLATE 'utf8mb3_unicode_ci',
	`password` VARCHAR(50) NULL DEFAULT NULL COMMENT '密码' COLLATE 'utf8mb3_unicode_ci',
	`nickname` VARCHAR(50) NULL DEFAULT NULL COMMENT '昵称' COLLATE 'utf8mb3_unicode_ci',
	`sex` INT(10) NULL DEFAULT NULL COMMENT '性别',
	`create_time` DATETIME NULL DEFAULT NULL COMMENT '创建时间',
	`avatar` VARCHAR(50) NULL DEFAULT NULL COMMENT '头像' COLLATE 'utf8mb3_unicode_ci',
	`update_time` DATETIME NULL DEFAULT NULL COMMENT '更新时间',
	`delete_time` DATETIME NULL DEFAULT NULL COMMENT '删除时间',
	`status` INT(10) NULL DEFAULT NULL COMMENT '账号状态',
	`role_id` INT(10) NULL DEFAULT NULL COMMENT '角色',
	`is_delete` VARCHAR(255) NULL DEFAULT NULL COMMENT '是否删除' COLLATE 'utf8mb3_unicode_ci',
	`is_super` VARCHAR(255) NULL DEFAULT NULL COMMENT '是否拥有超级管理权限' COLLATE 'utf8mb3_unicode_ci',
	PRIMARY KEY (`id`) USING BTREE
)
COLLATE='utf8mb3_unicode_ci'
ENGINE=MyISAM
AUTO_INCREMENT=6
;
```

会员管理

```sql
CREATE TABLE `sys_member` (
	`id` INT(10) NULL DEFAULT NULL,
	`user_id` INT(10) NULL DEFAULT NULL COMMENT '用户ID',
	`level` INT(10) NULL DEFAULT NULL COMMENT '会员等级',
	`status` INT(10) NULL DEFAULT NULL COMMENT '会员状态'
)
COMMENT='会员管理'
COLLATE='utf8mb3_unicode_ci'
ENGINE=InnoDB
;
```

会员等级管理

```sql
CREATE TABLE `sys_member_level` (
	`id` INT(10) NULL DEFAULT NULL,
	`name` INT(10) NULL DEFAULT NULL,
	`level` INT(10) NULL DEFAULT NULL
)
COMMENT='会员等级'
COLLATE='utf8mb3_unicode_ci'
ENGINE=InnoDB
;
```





## 服务端功能和接口设计

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





### 1.关系|人脉管理（档案管理）

> 字段管理

* 姓名
* 性别
* 手机号
* 出生日期（可以计算年龄）
* QQ
* 手机号
* 微信号
* 邮箱
* 家庭住址
* 居住地址
* 学历（小学、初中、高中、大学、硕士、博士、院士）
* 学校
* 性格
* 备注
* 优势
* 劣势
* 关系网
* 

> 功能集合

* 生日管理
* 





### 2.生日管理（生日提醒）

> 表单字段

* 姓名
* 性别（男、女）
* 生日（选择农历、公历、日期）
* 提醒（选择提醒时间、次数、周期）
* 手机
* 邮箱
* QQ



### 3.账单管理（后续独立App）

实现AI自动记账功能，后期接入大模型

> 字段表单

* 
* 

>  功能

从支付宝导入、从微信导入、自己新增

数据分析、汇总



### 4.日程管理

主要显示一个日历，日历上可以观察到多个，基于日历组件开发。

> 字段





> 功能

* 待办
* 节日
* 日记
* 饮食录入管理和分析
* 账单录入管理和分析
* 拍照打卡（进行AI分析）
* 



### 5.饮食管理（后续独立App）

饮食的增删改查，后期接入AI大模型

> 字段表单

* 图片集合、标题、描述、数量、类型
* 类型（堂食、聚餐）
* 金额
* 创建日期、修改日期、删除日期
* 



数据汇总

成就

我的



### 6.心情管理|朋友圈

实现类似微信朋友圈的功能、允许点赞和评论。







### 日记管理

笔记的增删改查，

接入每日提醒功能、接入微信公众号消息提醒和邮件消息提醒。





### 用户|会员管理

需要完成的功能：用户新增、修改、删除、查询、登录、注册、个人信息详情

需要完成的功能：会员管理











### 资源管理

* 图片、文件的管理

* 文件的上传下载
* 图片、视频、音频等内容支持预览
* 

### 任务管理



### 待办管理

> 表单字段

* 



### 资产管理（后续独立App）

> 字段

个人资产管理







### 笔记管理（后续独立App）

集成待办管理、任务管理





### 朋友管理





## 前端功能和界面设计

### 功能描述



### TabBar（5个栏目）

日程、打卡、生态、生日、我的（后续加入个性化、可以自定义界面和导航）



### 生态页面







### 登录注册页面





### 首页（Index）







### 我的（Profile）

顶部显示用户详情、数据统计、

中间为个性化设置、更多应用







### 生日管理（Birth）





### 待办（Todos）



## 第三方服务

### 云存储

云存储采用七牛云对象存储，

存储方案一：MinIO

存储方案二：七牛云存储

### 云短信

云短信使用阿里云SMS。

### 邮件通知

邮件通知采用QQ邮箱进行邮件通知，主要是为了方便后台管理人员和运维人员能够及时接到系统通知。

### 支付

本系统支付采用聚合支付，支持微信和支付宝支付。



















