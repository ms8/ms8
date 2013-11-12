/*
Navicat MySQL Data Transfer

Source Server         : ms
Source Server Version : 50612
Source Host           : localhost:3306
Source Database       : ms

Target Server Type    : MYSQL
Target Server Version : 50612
File Encoding         : 65001

Date: 2013-11-09 16:37:57
*/

SET FOREIGN_KEY_CHECKS=0;
-- ----------------------------
-- Table structure for `company`
-- ----------------------------
DROP TABLE IF EXISTS `company`;
CREATE TABLE `company` (
  `companyID` bigint(20) NOT NULL AUTO_INCREMENT,
  `fullname` varchar(100) NOT NULL,
  `shortname` varchar(100) NOT NULL,
  `industryID` varchar(100) NOT NULL,
  `address` varchar(100) DEFAULT NULL,
  PRIMARY KEY (`companyID`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

CREATE TABLE IF NOT EXISTS `score` (
  `id` bigint(20) NOT NULL AUTO_INCREMENT,
  `user_name` varchar(100) COLLATE utf8_unicode_ci NOT NULL,
  `action` varchar(100) COLLATE utf8_unicode_ci NOT NULL,
  `time` varchar(100) COLLATE utf8_unicode_ci NOT NULL,
  `score` varchar(100) COLLATE utf8_unicode_ci NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=MyISAM DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- 导出表中的数据 `score`
--
INSERT INTO `score` (`id`, `user_name`, `action`, `time`, `score`) VALUES
(1, 'syd', '发表', '2013-11-10', '500');

-- ----------------------------
-- Table structure for `concern`
-- ----------------------------
DROP TABLE IF EXISTS `concern`;
CREATE TABLE `concern` (
  `concernID` bigint(20) NOT NULL AUTO_INCREMENT,
  `user_name` varchar(100) NOT NULL COMMENT '谁的关注',
  `prepare_user` varchar(100) NOT NULL COMMENT '谁的面试准备，冗余字段',
  `companyName` varchar(100) NOT NULL COMMENT '公司名称，冗余字段',
  `position` varchar(60) NOT NULL COMMENT '职位信息，冗余字段',
  `time` datetime NOT NULL COMMENT '此记录创建时间',
  `prepareID` varchar(100) NOT NULL,
  PRIMARY KEY (`concernID`)
) ENGINE=InnoDB AUTO_INCREMENT=7 DEFAULT CHARSET=utf8;

-- ----------------------------
-- Records of concern
-- ----------------------------
INSERT INTO `concern` VALUES ('1', 'syd', 'test1', '中软', '软件研发', '2013-11-06 10:00:00', '5');
INSERT INTO `concern` VALUES ('2', 'syd', 'test1', '中软', '客户经理', '2013-11-06 10:00:00', '6');
INSERT INTO `concern` VALUES ('3', 'syd', 'test1', '宝洁', '客户经理', '2013-11-06 10:00:00', '4');
INSERT INTO `concern` VALUES ('4', 'syd', 'syd', '微软', '产品经理', '2013-11-07 10:56:00', '7');
INSERT INTO `concern` VALUES ('5', 'syd', 'syd', '华为', '软件工程师', '2013-11-07 13:17:37', '1');
INSERT INTO `concern` VALUES ('6', 'syd', 'syd', '华为', '软件工程师', '2013-11-09 03:49:52', '8');

-- ----------------------------
-- Table structure for `industry`
-- ----------------------------
DROP TABLE IF EXISTS `industry`;
CREATE TABLE `industry` (
  `industryID` bigint(20) NOT NULL AUTO_INCREMENT,
  `industryName` varchar(100) NOT NULL,
  PRIMARY KEY (`industryID`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

-- ----------------------------
-- Records of industry
-- ----------------------------

-- ----------------------------
-- Table structure for `message`
-- ----------------------------
DROP TABLE IF EXISTS `message`;
CREATE TABLE `message` (
  `messageID` bigint(20) NOT NULL AUTO_INCREMENT,
  `from` varchar(100) NOT NULL,
  `to` varchar(100) NOT NULL,
  `content` varchar(100) NOT NULL,
  `time` datetime NOT NULL,
  PRIMARY KEY (`messageID`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

-- ----------------------------
-- Records of message
-- ----------------------------

-- ----------------------------
-- Table structure for `position`
-- ----------------------------
DROP TABLE IF EXISTS `position`;
CREATE TABLE `position` (
  `positionID` bigint(20) NOT NULL AUTO_INCREMENT,
  `positionName` varchar(100) NOT NULL,
  `positionClass` varchar(100) DEFAULT NULL,
  PRIMARY KEY (`positionID`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

-- ----------------------------
-- Records of position
-- ----------------------------

-- ----------------------------
-- Table structure for `prepare`
-- ----------------------------
DROP TABLE IF EXISTS `prepare`;
CREATE TABLE `prepare` (
  `prepareID` bigint(20) NOT NULL AUTO_INCREMENT,
  `user_name` varchar(100) NOT NULL,
  `companyName` varchar(100) NOT NULL,
  `position` varchar(60) NOT NULL,
  `time` datetime NOT NULL,
  `summary` varchar(1000) DEFAULT NULL,
  PRIMARY KEY (`prepareID`)
) ENGINE=InnoDB AUTO_INCREMENT=9 DEFAULT CHARSET=utf8;

-- ----------------------------
-- Records of prepare
-- ----------------------------
INSERT INTO `prepare` VALUES ('1', 'syd', '华为', '软件工程师', '2013-11-04 10:43:38', '');
INSERT INTO `prepare` VALUES ('2', 'test1', '微软', '技术研发', '2013-11-06 03:40:18', '');
INSERT INTO `prepare` VALUES ('3', 'test1', '微软', '软件工程师', '2013-11-06 03:41:10', '');
INSERT INTO `prepare` VALUES ('4', 'test1', '宝洁', '客户经理', '2013-11-06 03:41:45', '');
INSERT INTO `prepare` VALUES ('5', 'test1', '中软', '软件研发', '2013-11-06 03:42:23', '');
INSERT INTO `prepare` VALUES ('6', 'test1', '中软', '客户经理', '2013-11-06 03:42:51', '');
INSERT INTO `prepare` VALUES ('7', 'syd', '微软', '产品经理', '2013-11-07 10:23:44', '');
INSERT INTO `prepare` VALUES ('8', 'syd', '华为', '软件工程师', '2013-11-07 15:09:34', '');

-- ----------------------------
-- Table structure for `prepare_detail`
-- ----------------------------
DROP TABLE IF EXISTS `prepare_detail`;
CREATE TABLE `prepare_detail` (
  `prepareID` bigint(20) NOT NULL,
  `title` varchar(100) NOT NULL COMMENT 'url对于的标题',
  `url` varchar(500) NOT NULL,
  `type` varchar(100) NOT NULL,
  `detailID` bigint(20) NOT NULL AUTO_INCREMENT,
  PRIMARY KEY (`detailID`)
) ENGINE=InnoDB AUTO_INCREMENT=22 DEFAULT CHARSET=utf8;

-- ----------------------------
-- Records of prepare_detail
-- ----------------------------
INSERT INTO `prepare_detail` VALUES ('1', '华为技术有限公司_百度百科', 'http://www.baidu.com/link?url=t8ZqUMDI5yW6bdtcVIftP-lxg2D7pFZQ6163U_-p2Ih62pLrYJknkNPum4rX42QR', '0', '1');
INSERT INTO `prepare_detail` VALUES ('1', '华为技术有限公司_百度百科', 'http://www.baidu.com/link?url=t8ZqUMDI5yW6bdtcVIftP-lxg2D7pFZQ6163U_-p2Ih62pLrYJknkNPum4rX42QR', '0', '2');
INSERT INTO `prepare_detail` VALUES ('1', '华为软件工程师工资待遇 - 真人分享 - 职业圈', 'http://www.baidu.com/link?url=PVmny1B4U3IbG63bhRMQ6s6Dekleqs-1U_m82casuk10FX6q5PjZ2NTix2RUvXdAeTODP8QxG8lnE84icMgWVq', '1', '3');
INSERT INTO `prepare_detail` VALUES ('1', '华为 软件工程师 工资待遇 - 分智', 'http://www.baidu.com/link?url=pdseLCM6wFNsOGOLrKmSVYbq63QXIxSsgv7nGpXKPg14aGIXZ66qtJitm0LZLmHU', '1', '4');
INSERT INTO `prepare_detail` VALUES ('2', '微软_分类_百度百科', 'http://www.baidu.com/link?url=rMNgmYi8A4aSVLTaDggZLvZp6RlUd1-W3YcqAjJSrZLlNaGwhiw7b728CLCzjTouRmW_LWmL2me8LssNoEvpqa', '0', '5');
INSERT INTO `prepare_detail` VALUES ('2', '微软 中心词', 'http://www.baidu.com/link?url=KSCqAJTnznW-lsWGVA_13svRBRXfBRoIUPsFk2cwvx105kO9jY58r6WXxj6H9q4diPOmmXUXAQmlxz36GxjBTTRLrSNfkg2TOIeiA7NbAU3', '0', '6');
INSERT INTO `prepare_detail` VALUES ('3', '微软软件工程师工资待遇 - 真人分享 - 职业圈', 'http://www.baidu.com/link?url=tHe3Q1g2mIO5TVZBlheQ7OWdDW4zlfJm31lh-5UixPeq0qI_yIVvUsqR4oyVPcKDdRVufT7cnXS237muYefOX_', '1', '7');
INSERT INTO `prepare_detail` VALUES ('3', '软件工程师面试笔试-微软_文档下载_IT168文库', 'http://www.baidu.com/link?url=i0OUAP8kLddhWes86PU6gERIkPGJDHjnfmBjWQvgYjXZ_OMmHUNAAMBCHfgVEkBd0KkMISNkPjCMKQ8fjbqwvq', '3', '8');
INSERT INTO `prepare_detail` VALUES ('4', '宝洁_百度百科', 'http://www.baidu.com/link?url=Xsnf8reTRgaBdnwuqyWq26XXK1C6FM4xRSuFUYTsvwYrBvRgnzXkdsvY0lIwup-w', '0', '9');
INSERT INTO `prepare_detail` VALUES ('4', '宝洁客户经理工资待遇 - 真人分享 - 职业圈', 'http://www.baidu.com/link?url=LBOv2XgbvFHlge4HkYtYhbmchauC_F9OdPRhQ3_40jcm70vh-n6urXunZsUU8tx7Q45cpGLx1z7ahD4BECjqjq', '1', '10');
INSERT INTO `prepare_detail` VALUES ('5', '中软国际 软件研发面试 - 2012-10.28发布 - 分智', 'http://www.baidu.com/link?url=ONeuGQzMi45x88PQBbL0jpT1lfzQFi6Fscc4dtDEqVdSNG7F22A3VFgAvrNu52j_', '2', '11');
INSERT INTO `prepare_detail` VALUES ('6', '中软动力_百度百科', 'http://www.baidu.com/link?url=qCEO0Uqty0R8b-JZrM-2Tgs8JPeWGB1E_qZWwSn9E5TrgIBuUA2A0hVVUxJ4JWbeEdOq7V6HGwNAeyK5OCcdtK', '0', '12');
INSERT INTO `prepare_detail` VALUES ('6', '客户经理工资待遇 - 真人分享 - 职业圈', 'http://www.baidu.com/link?url=EpYQRURsEsJoC5y_EdKhHrTUhJM0ueL1o3YABfrsgU6qgL0_5u_hn_RB0mqxSaDiv4ughPbs1XQUGzZlOFXxRK', '1', '13');
INSERT INTO `prepare_detail` VALUES ('7', '微软中国_百度百科', 'http://www.baidu.com/link?url=sg-_ljiHE0B8RspFZ4GNgbNlzUPNrFRfiD74Zoo0HMbmUHp8FvRmw6IzwUAw_TK0', '0', '14');
INSERT INTO `prepare_detail` VALUES ('7', '微软中国(Microsoft)产品经理面试 - 分智', 'http://www.baidu.com/link?url=g10kzGjjtmw1yPGztbmFu2aqDiwQd940gQHB5q9GgrZHLE6AmMBaX2KX5bPCy9yfbTfisTQU63EUWOUlYA3FrniZ3FFP_yfQ-gsXoleZyZb6LySnaasvZvNHGf5QjPhU', '2', '15');
INSERT INTO `prepare_detail` VALUES ('7', '微软面试-阅微网 - 互联网产品经理互动...', 'http://www.baidu.com/link?url=NoV884W-uXbPu-LNdn_B0QEyc6lB86qMBPe-8DjItZGBCHZXogABY_Yc6ZdyWVTziMAuVazMXv5EyAjOXOBhrq', '2', '16');
INSERT INTO `prepare_detail` VALUES ('8', '华为手机_百度百科', 'http://www.baidu.com/link?url=m1bRbXIUluXr7oJsi9CYhlCwKyAHSlmk8WbFQBce3wX7Ux6iWaPsWFQbHR9k5_W2', '0', '17');
INSERT INTO `prepare_detail` VALUES ('8', '华为认证_百度百科', 'http://www.baidu.com/link?url=lMa94w--lChSAjMqIEd002ZOP0JDA-9VoDzM5dCDXEDk3-gA7Ynck3DVjNKOHhar', '0', '18');
INSERT INTO `prepare_detail` VALUES ('8', '华为机器 软件工程师 工资待遇 - 分智', 'http://www.baidu.com/link?url=Nhpb-lqGoJxmaOxPwmTX3jxmBVmDDvbFtHcPUCe374IGykZOLod8venZuXrJIh0Y', '1', '19');
INSERT INTO `prepare_detail` VALUES ('8', '华为技术有限公司软件工程师工资待遇|华为技术有限公司软件工程师...', 'http://www.baidu.com/link?url=I68p-uymX4tJLlsKNS70WzERzCDCvMEJ6xyzMtevOd1ncjRN08lMINI0Duvn6AbJshi1yn8p_JAR8PA_PMi4-K', '1', '20');
INSERT INTO `prepare_detail` VALUES ('8', '华为软件工程师工资有多少啊', 'http://www.baidu.com/link?url=xOSNb-WvbL8kuHpks45UhWXwwlxI01CWeUGorrs8bUJrLMQ3ayhTsbv7fxd3PXDJ', '1', '21');

-- ----------------------------
-- Table structure for `renpin`
-- ----------------------------
DROP TABLE IF EXISTS `renpin`;
CREATE TABLE `renpin` (
  `renpinID` bigint(20) NOT NULL AUTO_INCREMENT,
  `user_name` varchar(100) NOT NULL,
  `content` varchar(1000) NOT NULL,
  `time` datetime NOT NULL,
  PRIMARY KEY (`renpinID`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

-- ----------------------------
-- Records of renpin
-- ----------------------------

-- ----------------------------
-- Table structure for `renpin_detail`
-- ----------------------------
DROP TABLE IF EXISTS `renpin_detail`;
CREATE TABLE `renpin_detail` (
  `renpin_id` bigint(20) NOT NULL,
  `bless_userName` varchar(100) NOT NULL COMMENT '是谁祝福的',
  `time` datetime NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

-- ----------------------------
-- Records of renpin_detail
-- ----------------------------

-- ----------------------------
-- Table structure for `self_introduction`
-- ----------------------------
DROP TABLE IF EXISTS `self_introduction`;
CREATE TABLE `self_introduction` (
  `intro_id` bigint(20) NOT NULL AUTO_INCREMENT,
  `user_name` varchar(100) NOT NULL,
  `self_introduction` varchar(10000) NOT NULL,
  PRIMARY KEY (`intro_id`)
) ENGINE=InnoDB AUTO_INCREMENT=3 DEFAULT CHARSET=utf8;

-- ----------------------------
-- Records of self_introduction
-- ----------------------------
INSERT INTO `self_introduction` VALUES ('1', 'test1', 'test1的自我介绍');
INSERT INTO `self_introduction` VALUES ('2', 'test2', 'test2的自我介绍');

-- ----------------------------
-- Table structure for `self_introduction_comment`
-- ----------------------------
DROP TABLE IF EXISTS `self_introduction_comment`;
CREATE TABLE `self_introduction_comment` (
  `commentID` bigint(20) NOT NULL AUTO_INCREMENT COMMENT '本评论的ID',
  `posterName` varchar(100) NOT NULL,
  `content` varchar(500) NOT NULL,
  `time` datetime NOT NULL,
  `intro_id` bigint(20) NOT NULL COMMENT '针对的是哪个自我介绍',
  `toComment` bigint(20) DEFAULT NULL COMMENT '所针对的评论的ID,如果是仅针对自我介绍的评论,则此字段为空',
  PRIMARY KEY (`commentID`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

-- ----------------------------
-- Records of self_introduction_comment
-- ----------------------------

-- ----------------------------
-- Table structure for `summary`
-- ----------------------------
DROP TABLE IF EXISTS `summary`;
CREATE TABLE `summary` (
  `summary_id` bigint(20) NOT NULL AUTO_INCREMENT,
  `user_name` varchar(100) NOT NULL,
  `company_name` varchar(200) NOT NULL,
  `position_name` varchar(100) NOT NULL,
  `language` varchar(100) DEFAULT NULL,
  `dress` varchar(100) DEFAULT NULL,
  `format` varchar(100) DEFAULT NULL,
  `atmosphere` varchar(100) DEFAULT NULL,
  `rounds` varchar(10) DEFAULT NULL,
  `impression` varchar(500) DEFAULT NULL,
  `result` varchar(100) DEFAULT NULL,
  `tips` varchar(500) DEFAULT NULL,
  `exam` varchar(100) DEFAULT NULL,
  `exam_content` varchar(5000) DEFAULT NULL,
  `experience` varchar(5000) DEFAULT NULL,
  `status` varchar(100) DEFAULT NULL,
  `time` varchar(100) NOT NULL,
  `title` varchar(500) NOT NULL,
  PRIMARY KEY (`summary_id`)
) ENGINE=MyISAM AUTO_INCREMENT=7 DEFAULT CHARSET=utf8;

-- ----------------------------
-- Records of summary
-- ----------------------------
INSERT INTO `summary` VALUES ('1', 'hohowu', '??', 'IT???', '', '', '', '', '', '', '', '', '', '', '', '', '', '');
INSERT INTO `summary` VALUES ('2', 'hohowu', '啊啊啊啊啊', '办法', '巴黎大姐夫', '', '', '', '', '', '', '', '', '', '', '', '', '');
INSERT INTO `summary` VALUES ('3', 'hohowu', '11111111111111111', '11111111111111111', '11111111111111111', '11111111111111111', '11111111111111111', '11111111111111111', '1111111111', '11111111111111111', '11111111111111111', '11111111111111111', '11111111111111111', '11111111111111111', '11111111111111111', '0', '2013-11-09 01:47:04', '1111111111111111111111111111111111');
INSERT INTO `summary` VALUES ('4', 'hohowu', '测试测试测试', '测试测试测试', null, null, null, null, '测试测试测试', '测试测试测试', null, '测试测试测试', null, '测试测试测试测试测试测试测试测试测试测试测试测试', '测试测试测试测试测试测试测试测试测试测试测试测试测试测试测试', '1', '2013-11-09 05:57:51', '测试测试测试');
INSERT INTO `summary` VALUES ('5', 'hohowu', '测试测试测试测试测试测试测试测试测试', '测试测试测试测试测试测试测试测试测试', null, null, null, null, '测试测试测试测试测试', '测试测试测试测试测试测试测试测试测试测试测试测试测试测试测试测试测试测试', null, '测试测试测试测试测试测试测试测试测试测试测试测试测试测试测试测试测试测试测试测试测试测试测试测试测试测试测试测试测试测试测试测试测试测试测试测试', null, '测试测试测试测试测试测试测试测试测试测试测试测试测试测试测试测试测试测试测试测试测试测试测试测试测试测试测试', 'vvv测试测试测试测试测试测试测试测试测试测试测试测试测试测试测试测试测试测试测试测试测试测试测试测试测试测试测试', '1', '2013-11-09 05:59:32', '测试测试测试测试测试测试测试测试测试');
INSERT INTO `summary` VALUES ('6', 'hohowu', 'SummaryFormSummaryFormSummaryForm', 'SummaryForm', 'cn', '0', '0', '0', '2222', 'SummaryForm', '1', 'SummaryFormSummaryFormSummaryFormSummaryFormSummaryForm', '0', 'SummaryFormSummaryFormSummaryForm', 'SummaryFormSummaryFormSummaryForm', '1', '2013-11-09 07:39:36', 'SummaryFormSummaryFormSummaryFormSummaryFormSummaryFormSummaryFormSummaryForm');

-- ----------------------------
-- Table structure for `user`
-- ----------------------------
DROP TABLE IF EXISTS `user`;
CREATE TABLE `user` (
  `userID` bigint(20) NOT NULL AUTO_INCREMENT,
  `user_name` varchar(100) NOT NULL,
  `nick_name` varchar(100) DEFAULT NULL,
  `email` varchar(100) NOT NULL,
  `password` varchar(100) NOT NULL,
  `pic` varchar(100) DEFAULT NULL,
  `sex` varchar(100) DEFAULT NULL,
  `school` varchar(100) DEFAULT NULL,
  `major` varchar(100) DEFAULT NULL,
  `score` tinyint(100) DEFAULT '0',
  `selfintroduction` varchar(10000) DEFAULT NULL,
  PRIMARY KEY (`userID`)
) ENGINE=InnoDB AUTO_INCREMENT=6 DEFAULT CHARSET=utf8;

-- ----------------------------
-- Records of user
-- ----------------------------
INSERT INTO `user` VALUES ('1', 'syd', null, '1@1.com', '$2a$13$/T1hR8aiMWS9IFWMwQBTGus5NCZKeF5.QpZDnOHLaq6pk5TQRVcQi', null, null, null, null, '0', null);
INSERT INTO `user` VALUES ('2', 'test1', null, '2@1.com', '$2a$13$LduG3JRsf5AT2O9/Puk8qOis8xhCiQhaVz0rgNZxaVp8PRyCNhY0K', null, null, null, '计算机', '0', null);
INSERT INTO `user` VALUES ('3', 'test2', null, '3@1.com', '$2a$13$gVHD2l0OqRnbwYl9Wc/yO.jXStiyCivUV1v1J4kkKni9zqIK//J4O', null, null, null, '食品安全', '0', null);
INSERT INTO `user` VALUES ('4', 'admin', null, '1@1.com', '$2a$13$gODZhvk/KZql8WnCVivXN.gali/YPfBj3TkC1gxubi5q8T/D67Sbq', null, null, null, null, '0', null);
INSERT INTO `user` VALUES ('5', 'shenyuede', null, '1@1.com', '$2a$13$qEbRPYtVX506JqW1aZ25tuCNHQ4VrONr2X6Y9uehAuJsESwUQPAdG', null, null, null, null, '0', null);
