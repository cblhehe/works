# Host: localhost  (Version: 5.5.40)
# Date: 2016-08-17 14:04:10
# Generator: MySQL-Front 5.3  (Build 4.120)

/*!40101 SET NAMES utf8 */;

#
# Structure for table "sy_ad"
#

DROP TABLE IF EXISTS `sy_ad`;
CREATE TABLE `sy_ad` (
  `ad_id` int(11) NOT NULL AUTO_INCREMENT COMMENT '广告id',
  `pid` int(11) NOT NULL DEFAULT '0' COMMENT '广告位置，1-住宿发现，2-服务发现',
  `ad_name` varchar(255) DEFAULT '' COMMENT '广告名称',
  `ad_link` varchar(255) NOT NULL DEFAULT '' COMMENT '广告链接',
  `ad_image` varchar(255) NOT NULL DEFAULT '' COMMENT '广告图片名称',
  `click_count` int(9) DEFAULT NULL COMMENT '点击数',
  `add_time` int(11) DEFAULT NULL COMMENT '广告添加时间',
  `start_time` int(11) DEFAULT NULL COMMENT '广告开始时间',
  `end_time` int(11) NOT NULL DEFAULT '0' COMMENT '广告结束时间，0为永久有效',
  `modify_time` int(11) DEFAULT NULL COMMENT '修改时间',
  `isshow` tinyint(1) NOT NULL DEFAULT '1' COMMENT '是否显示，0-否，1-是',
  `order` int(11) NOT NULL DEFAULT '0' COMMENT '排序',
  PRIMARY KEY (`ad_id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COMMENT='广告表';

#
# Data for table "sy_ad"
#


#
# Structure for table "sy_admin"
#

DROP TABLE IF EXISTS `sy_admin`;
CREATE TABLE `sy_admin` (
  `admin_id` int(11) NOT NULL AUTO_INCREMENT,
  `username` varchar(20) NOT NULL DEFAULT '' COMMENT '管理员名称',
  `password` varchar(32) NOT NULL DEFAULT '' COMMENT '密码,md5',
  `role` tinyint(1) NOT NULL DEFAULT '0' COMMENT '角色权限，1-超级管理员，0-普通管理员',
  `add_time` int(11) DEFAULT NULL COMMENT '管理员添加时间',
  PRIMARY KEY (`admin_id`)
) ENGINE=InnoDB AUTO_INCREMENT=2 DEFAULT CHARSET=utf8 COMMENT='后台管理员表';

#
# Data for table "sy_admin"
#

INSERT INTO `sy_admin` VALUES (1,'sylm','cd2268bb2a1100ad55fd65d50f2db9ae',1,NULL);

#
# Structure for table "sy_admin_log"
#

DROP TABLE IF EXISTS `sy_admin_log`;
CREATE TABLE `sy_admin_log` (
  `log_id` int(11) NOT NULL AUTO_INCREMENT,
  `admin_id` int(11) NOT NULL DEFAULT '0' COMMENT '管理员id',
  `admin_action` varchar(255) NOT NULL DEFAULT '0' COMMENT '管理员操作内容',
  `log_ip` varchar(255) DEFAULT NULL,
  `log_time` int(11) DEFAULT NULL COMMENT '时间',
  PRIMARY KEY (`log_id`)
) ENGINE=InnoDB AUTO_INCREMENT=7 DEFAULT CHARSET=utf8 COMMENT='管理员日志表';

#
# Data for table "sy_admin_log"
#

INSERT INTO `sy_admin_log` VALUES (1,1,'退出登录','::1',1471313919),(2,1,'登录','::1',1471314021),(3,1,'退出登录','::1',1471341843),(4,1,'登录','::1',1471355789),(5,1,'登录','::1',1471359858),(6,1,'登录','::1',1471395848);

#
# Structure for table "sy_comment_response"
#

DROP TABLE IF EXISTS `sy_comment_response`;
CREATE TABLE `sy_comment_response` (
  `comment_id` int(11) NOT NULL AUTO_INCREMENT,
  `room_id` int(11) DEFAULT NULL COMMENT '评论的住房id',
  `top_id` int(11) DEFAULT NULL COMMENT '评论信息id',
  `commenter_id` int(11) DEFAULT NULL COMMENT '评论人id',
  `responser_id` int(11) DEFAULT NULL COMMENT '回复人（管理员）id',
  `pid` int(11) DEFAULT NULL COMMENT '被评论回复的id，评论为0',
  `content` varchar(255) DEFAULT NULL COMMENT '评论回复内容',
  `type` tinyint(1) DEFAULT NULL COMMENT '评论回复类型，1-评论，2-回复',
  `time` int(11) DEFAULT NULL COMMENT '评论回复时间',
  PRIMARY KEY (`comment_id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COMMENT='订单住房评论回复表';

#
# Data for table "sy_comment_response"
#


#
# Structure for table "sy_consult"
#

DROP TABLE IF EXISTS `sy_consult`;
CREATE TABLE `sy_consult` (
  `consult_id` int(11) NOT NULL AUTO_INCREMENT COMMENT '咨询售后id',
  `user_id` int(11) DEFAULT NULL COMMENT '会员id',
  `service_id` varchar(255) DEFAULT NULL COMMENT '客服id',
  `top_id` int(11) DEFAULT NULL COMMENT '咨询售后信息id',
  `type` tinyint(1) DEFAULT NULL COMMENT '类型，1-咨询，2-售后',
  `pid` int(11) DEFAULT NULL COMMENT '被咨询回复id，咨询为0',
  `content` varchar(255) DEFAULT NULL COMMENT '咨询售后内容',
  `msg_type` tinyint(1) DEFAULT NULL COMMENT '咨询回复类型，1-咨询，2-回复',
  `time` int(11) DEFAULT NULL COMMENT '咨询回复时间',
  PRIMARY KEY (`consult_id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COMMENT='咨询售后表';

#
# Data for table "sy_consult"
#


#
# Structure for table "sy_distribution"
#

DROP TABLE IF EXISTS `sy_distribution`;
CREATE TABLE `sy_distribution` (
  `Id` int(11) NOT NULL AUTO_INCREMENT,
  `first_scale` tinyint(3) DEFAULT NULL COMMENT '一级分销商分佣比例',
  `second_scale` tinyint(3) DEFAULT NULL COMMENT '二级分销商分佣比例',
  `third_scale` varchar(255) DEFAULT NULL COMMENT '三级分销商分佣比例',
  `condition` decimal(10,2) DEFAULT NULL COMMENT '提现条件，满多少可以提现',
  `least_condition` decimal(10,2) DEFAULT NULL COMMENT '最少提现额度',
  PRIMARY KEY (`Id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COMMENT='三级分销表';

#
# Data for table "sy_distribution"
#


#
# Structure for table "sy_level"
#

DROP TABLE IF EXISTS `sy_level`;
CREATE TABLE `sy_level` (
  `level_id` int(11) NOT NULL AUTO_INCREMENT,
  `level_name` varchar(50) DEFAULT NULL COMMENT '等级名称',
  `amount` decimal(10,2) DEFAULT NULL COMMENT '等级必要金额',
  `discount` smallint(4) DEFAULT NULL COMMENT '折扣',
  PRIMARY KEY (`level_id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COMMENT='用户等级表';

#
# Data for table "sy_level"
#


#
# Structure for table "sy_order"
#

DROP TABLE IF EXISTS `sy_order`;
CREATE TABLE `sy_order` (
  `order_id` int(11) NOT NULL AUTO_INCREMENT,
  `user_id` int(11) DEFAULT NULL COMMENT '会员id',
  `sifu_id` int(11) DEFAULT NULL COMMENT '师傅id',
  `goods_id` int(11) DEFAULT NULL COMMENT '服务或住房id',
  `order_status` tinyint(1) DEFAULT NULL COMMENT '1-已付款，2-待接单，3-已完成，4-已退款，5-待评价，6-已评价',
  `phone` varchar(20) DEFAULT NULL COMMENT '订单联系方式',
  `image` varchar(255) DEFAULT NULL COMMENT '订单图片',
  `address` varchar(255) DEFAULT NULL COMMENT '地址',
  `deposit` decimal(10,2) DEFAULT NULL COMMENT '押金',
  `rental` decimal(10,2) DEFAULT NULL COMMENT '租金/天',
  `days` tinyint(3) DEFAULT NULL COMMENT '住宿、租用天数',
  `gold` int(11) DEFAULT NULL COMMENT '使用金币',
  `gold_money` int(11) DEFAULT NULL COMMENT '使用金币抵用多少钱',
  `order_amount` decimal(10,2) DEFAULT NULL COMMENT '应付总价',
  `total_amount` decimal(10,2) DEFAULT NULL COMMENT '实付总价',
  `add_time` int(11) DEFAULT NULL COMMENT '下单时间',
  `pay_time` int(11) DEFAULT NULL COMMENT '付款时间',
  `get_time` int(11) DEFAULT NULL COMMENT '接单时间',
  `end_time` int(11) DEFAULT NULL COMMENT '完成时间',
  `user_note` varchar(255) DEFAULT NULL COMMENT '用户备注',
  `admin_note` varchar(255) DEFAULT NULL COMMENT '退款原因，管理员后台添加',
  `goods_type` tinyint(1) DEFAULT NULL COMMENT '订单商品类型，1-住房，2-服务类型',
  PRIMARY KEY (`order_id`)
) ENGINE=InnoDB AUTO_INCREMENT=2 DEFAULT CHARSET=utf8 COMMENT='订单表';

#
# Data for table "sy_order"
#

INSERT INTO `sy_order` VALUES (1,1,1,8,1,'1','1','1',1.00,1.00,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,2);

#
# Structure for table "sy_room"
#

DROP TABLE IF EXISTS `sy_room`;
CREATE TABLE `sy_room` (
  `room_id` int(11) NOT NULL AUTO_INCREMENT,
  `room_name` varchar(255) DEFAULT NULL COMMENT '住房名称',
  `room_cate` tinyint(1) NOT NULL DEFAULT '0' COMMENT '住房类型，1-名宿，2-酒店',
  `room_type` tinyint(1) NOT NULL DEFAULT '0' COMMENT '房间类型，1-单租，2-整租',
  `population` tinyint(3) NOT NULL DEFAULT '0' COMMENT '可住人数',
  `bed_num` tinyint(3) NOT NULL DEFAULT '0' COMMENT '床位',
  `address` varchar(255) DEFAULT NULL COMMENT '住房地址',
  `brokerage` decimal(10,2) DEFAULT NULL COMMENT '佣金',
  `deposit` decimal(10,2) DEFAULT NULL COMMENT '押金',
  `rental` decimal(10,2) DEFAULT NULL COMMENT '租金、住宿费/天',
  `description` varchar(255) DEFAULT NULL COMMENT '住房描述',
  `traffic` varchar(255) DEFAULT NULL COMMENT '交通描述',
  `toilet` tinyint(1) DEFAULT NULL COMMENT '是否独立卫生间，0-否，1-是',
  `add_bed` tinyint(1) DEFAULT NULL COMMENT '是否可加床位，0-否，1-可',
  `least_day` tinyint(3) DEFAULT NULL COMMENT '起住天数',
  `accept_foreigner` tinyint(1) DEFAULT NULL COMMENT '是否接受外籍人员，0-否，1-是',
  `reservation_terms` varchar(255) DEFAULT NULL COMMENT '预订条款',
  `add_time` int(11) DEFAULT NULL COMMENT '房屋添加时间',
  `modify_time` int(11) DEFAULT NULL COMMENT '修改时间',
  PRIMARY KEY (`room_id`)
) ENGINE=InnoDB AUTO_INCREMENT=7 DEFAULT CHARSET=utf8 COMMENT='住房表';

#
# Data for table "sy_room"
#


#
# Structure for table "sy_room_images"
#

DROP TABLE IF EXISTS `sy_room_images`;
CREATE TABLE `sy_room_images` (
  `image_id` int(11) NOT NULL AUTO_INCREMENT,
  `room_id` int(11) NOT NULL DEFAULT '0' COMMENT '房间id',
  `room_image` text NOT NULL COMMENT '图片名称',
  PRIMARY KEY (`image_id`)
) ENGINE=InnoDB AUTO_INCREMENT=15 DEFAULT CHARSET=utf8 COMMENT='房间图片表';

#
# Data for table "sy_room_images"
#


#
# Structure for table "sy_service_cate"
#

DROP TABLE IF EXISTS `sy_service_cate`;
CREATE TABLE `sy_service_cate` (
  `service_id` int(11) NOT NULL AUTO_INCREMENT COMMENT '服务类型id',
  `service_name` varchar(50) NOT NULL DEFAULT '0' COMMENT '服务类型名称',
  `pid` int(11) DEFAULT NULL COMMENT '上级分类id，顶级id为0',
  `order` int(11) DEFAULT NULL COMMENT '排序',
  `isshow` tinyint(1) DEFAULT '0' COMMENT '是否显示，0-不显示，1-显示',
  `add_time` int(11) DEFAULT NULL COMMENT '服务类型添加时间',
  `modify_time` int(11) DEFAULT NULL COMMENT '修改时间',
  `service_image` varchar(255) DEFAULT NULL COMMENT '服务类型图片名称',
  `deposit` decimal(10,2) DEFAULT NULL COMMENT '定金',
  `brokerage` decimal(10,2) DEFAULT NULL COMMENT '佣金',
  PRIMARY KEY (`service_id`)
) ENGINE=InnoDB AUTO_INCREMENT=2 DEFAULT CHARSET=utf8 COMMENT='服务类型表';

#
# Data for table "sy_service_cate"
#

INSERT INTO `sy_service_cate` VALUES (1,'家电维修',0,1,1,1471396048,1471400719,'2016-08-17/57b3cb0ed0a1d.jpg',30.00,10.00),(2,'租车服务',0,1,1,1471397812,1471400747,'2016-08-17/57b3cb2bb0521.jpg',100.00,20.00),(3,'空调维修',1,2,0,1471398325,1471400904,'',30.00,10.00);

#
# Structure for table "sy_sifu"
#

DROP TABLE IF EXISTS `sy_sifu`;
CREATE TABLE `sy_sifu` (
  `sifu_id` int(11) NOT NULL AUTO_INCREMENT,
  `user_id` int(11) DEFAULT NULL COMMENT '会员id',
  `true_name` varchar(30) DEFAULT NULL COMMENT '真名',
  `phone` varchar(20) DEFAULT NULL COMMENT '手机号',
  `address` varchar(255) DEFAULT NULL COMMENT '地址',
  `id_card` varchar(30) DEFAULT NULL COMMENT '身份证号',
  PRIMARY KEY (`sifu_id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COMMENT='师傅注册表';

#
# Data for table "sy_sifu"
#


#
# Structure for table "sy_sifu_car"
#

DROP TABLE IF EXISTS `sy_sifu_car`;
CREATE TABLE `sy_sifu_car` (
  `car_id` int(11) NOT NULL AUTO_INCREMENT,
  `user_id` int(11) DEFAULT NULL COMMENT '会员id',
  `price` varchar(255) DEFAULT NULL COMMENT '车价格区间',
  `car_image` varchar(255) DEFAULT NULL COMMENT '车图片名称',
  `driving_license` varchar(255) DEFAULT NULL COMMENT '驾驶证照片名称',
  `rental` decimal(10,2) DEFAULT NULL COMMENT '租金/天',
  `deposit` decimal(10,2) DEFAULT NULL COMMENT '押金',
  `address` varchar(255) DEFAULT NULL COMMENT '取换车地址',
  `car_brand` varchar(255) DEFAULT NULL COMMENT '车品牌',
  PRIMARY KEY (`car_id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COMMENT='师傅车信息表';

#
# Data for table "sy_sifu_car"
#


#
# Structure for table "sy_sifu_service"
#

DROP TABLE IF EXISTS `sy_sifu_service`;
CREATE TABLE `sy_sifu_service` (
  `Id` int(11) NOT NULL AUTO_INCREMENT,
  `user_id` int(11) DEFAULT NULL COMMENT '会员id',
  `service_id` int(11) DEFAULT NULL COMMENT '服务类型id',
  PRIMARY KEY (`Id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COMMENT='师傅服务类型表';

#
# Data for table "sy_sifu_service"
#


#
# Structure for table "sy_user"
#

DROP TABLE IF EXISTS `sy_user`;
CREATE TABLE `sy_user` (
  `user_id` int(11) NOT NULL AUTO_INCREMENT,
  `openid` varchar(255) DEFAULT NULL COMMENT '微信号唯一标识',
  `nickname` varchar(20) DEFAULT NULL COMMENT '昵称',
  `sex` tinyint(1) DEFAULT NULL COMMENT '性别，0-女，1-男',
  `icon` varchar(225) DEFAULT NULL COMMENT '头像名称',
  `birthday` int(11) DEFAULT NULL COMMENT '出生日期',
  `address` varchar(100) DEFAULT NULL COMMENT '所在地',
  `email` varchar(100) DEFAULT NULL COMMENT '邮箱',
  `phone` varchar(20) DEFAULT NULL COMMENT '电话',
  `level` varchar(50) DEFAULT NULL COMMENT '会员等级',
  `total_amount` decimal(10,2) DEFAULT NULL COMMENT '消费累计金额',
  `true_name` varchar(30) DEFAULT NULL COMMENT '真名',
  `is_distribut` tinyint(1) DEFAULT '0' COMMENT '是否为分销商，0-否，1-是',
  `first_leader` int(11) DEFAULT NULL COMMENT '第一个上级',
  `second_leader` int(11) DEFAULT NULL COMMENT '第二个上级',
  `third_leader` int(11) DEFAULT NULL COMMENT '第三个上级',
  `is_lock` tinyint(1) DEFAULT NULL COMMENT '是否被拉黑，0-否，1-是',
  PRIMARY KEY (`user_id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COMMENT='会员表';

#
# Data for table "sy_user"
#

