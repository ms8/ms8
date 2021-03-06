/*
Navicat MySQL Data Transfer

Source Server         : ms
Source Server Version : 50612
Source Host           : localhost:3306
Source Database       : ms

Target Server Type    : MYSQL
Target Server Version : 50612
File Encoding         : 65001

Date: 2013-10-22 21:36:31
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

-- ----------------------------
-- Records of company
-- ----------------------------

-- ----------------------------
-- Table structure for `concern`
-- ----------------------------
DROP TABLE IF EXISTS `concern`;
CREATE TABLE `concern` (
  `concernID` bigint(20) NOT NULL AUTO_INCREMENT,
  `userName` varchar(100) NOT NULL,
  `prepareID` varchar(100) NOT NULL,
  PRIMARY KEY (`concernID`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

-- ----------------------------
-- Records of concern
-- ----------------------------

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
  `time` int(11) NOT NULL,
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
  `userName` varchar(100) NOT NULL,
  `companyName` varchar(100) NOT NULL,
  `position` varchar(60) NOT NULL,
  `time` int(11) NOT NULL,
  `summary` varchar(1000) DEFAULT NULL,
  PRIMARY KEY (`prepareID`)
) ENGINE=InnoDB AUTO_INCREMENT=6 DEFAULT CHARSET=utf8;

-- ----------------------------
-- Records of prepare
-- ----------------------------
INSERT INTO `prepare` VALUES ('1', 'test1', '华为技术有限公司', '客户经理', '1210003200', '呼呼哈嘿，快使用双节棍');
INSERT INTO `prepare` VALUES ('2', 'test2', '微软科技有限公司', '项目经理', '1210003200', '木有双节棍');
INSERT INTO `prepare` VALUES ('4', 'syd', '华为test', 'testmanager', '1382425529', 'sum1');
INSERT INTO `prepare` VALUES ('5', 'Guest', '华为test', 'testmanager', '1382446880', 'sum1');

-- ----------------------------
-- Table structure for `prepare_detail`
-- ----------------------------
DROP TABLE IF EXISTS `prepare_detail`;
CREATE TABLE `prepare_detail` (
  `prepareID` bigint(20) NOT NULL,
  `title` varchar(100) NOT NULL COMMENT 'url对于的标题',
  `url` varchar(100) NOT NULL,
  `type` varchar(100) NOT NULL,
  `detailID` bigint(20) NOT NULL AUTO_INCREMENT,
  PRIMARY KEY (`detailID`)
) ENGINE=InnoDB AUTO_INCREMENT=17 DEFAULT CHARSET=utf8;

-- ----------------------------
-- Records of prepare_detail
-- ----------------------------
INSERT INTO `prepare_detail` VALUES ('4', 'title0', 'url0', '0', '1');
INSERT INTO `prepare_detail` VALUES ('4', 'title1', 'url1', '1', '2');
INSERT INTO `prepare_detail` VALUES ('4', 'title2', 'url2', '2', '3');
INSERT INTO `prepare_detail` VALUES ('4', 'title3', 'url3', '3', '4');
INSERT INTO `prepare_detail` VALUES ('4', 'title4', 'url4', '0', '5');
INSERT INTO `prepare_detail` VALUES ('4', 'title5', 'url5', '1', '6');
INSERT INTO `prepare_detail` VALUES ('4', 'title6', 'url6', '2', '7');
INSERT INTO `prepare_detail` VALUES ('4', 'title7', 'url7', '3', '8');
INSERT INTO `prepare_detail` VALUES ('5', 'title0', 'url0', '0', '9');
INSERT INTO `prepare_detail` VALUES ('5', 'title1', 'url1', '1', '10');
INSERT INTO `prepare_detail` VALUES ('5', 'title2', 'url2', '2', '11');
INSERT INTO `prepare_detail` VALUES ('5', 'title3', 'url3', '3', '12');
INSERT INTO `prepare_detail` VALUES ('5', 'title4', 'url4', '0', '13');
INSERT INTO `prepare_detail` VALUES ('5', 'title5', 'url5', '1', '14');
INSERT INTO `prepare_detail` VALUES ('5', 'title6', 'url6', '2', '15');
INSERT INTO `prepare_detail` VALUES ('5', 'title7', 'url7', '3', '16');

-- ----------------------------
-- Table structure for `renpin`
-- ----------------------------
DROP TABLE IF EXISTS `renpin`;
CREATE TABLE `renpin` (
  `renpinID` bigint(20) NOT NULL AUTO_INCREMENT,
  `userName` varchar(100) NOT NULL,
  `content` varchar(1000) NOT NULL,
  `time` int(11) NOT NULL,
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
  `time` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

-- ----------------------------
-- Records of renpin_detail
-- ----------------------------

-- ----------------------------
-- Table structure for `self_introduction`
-- ----------------------------
DROP TABLE IF EXISTS `self_introduction`;
CREATE TABLE `self_introduction` (
  `intro_id` bigint(20) NOT NULL,
  `userName` varchar(100) NOT NULL,
  `self_introduction` varchar(10000) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

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
  `userName` varchar(100) NOT NULL,
  `content` varchar(500) NOT NULL,
  `time` int(11) NOT NULL,
  `intro_id` bigint(20) NOT NULL COMMENT '针对的是哪个自我介绍',
  `toComment` bigint(20) DEFAULT NULL COMMENT '所针对的评论的ID,如果是仅针对自我介绍的评论,则此字段为空',
  PRIMARY KEY (`commentID`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

-- ----------------------------
-- Records of self_introduction_comment
-- ----------------------------

-- ----------------------------
-- Table structure for `user`
-- ----------------------------
DROP TABLE IF EXISTS `user`;
CREATE TABLE `user` (
  `userID` bigint(20) NOT NULL AUTO_INCREMENT,
  `username` varchar(100) NOT NULL,
  `nickName` varchar(100) DEFAULT NULL,
  `email` varchar(100) NOT NULL,
  `password` varchar(100) NOT NULL,
  `pic` varchar(100) DEFAULT NULL,
  `sex` varchar(100) DEFAULT NULL,
  `school` varchar(100) DEFAULT NULL,
  `major` varchar(100) DEFAULT NULL,
  `score` tinyint(100) DEFAULT '0',
  `selfintroduction` varchar(10000) DEFAULT NULL,
  PRIMARY KEY (`userID`)
) ENGINE=InnoDB AUTO_INCREMENT=4 DEFAULT CHARSET=utf8;

-- ----------------------------
-- Records of user
-- ----------------------------
INSERT INTO `user` VALUES ('1', 'syd', null, '1@1.com', '$2a$13$/T1hR8aiMWS9IFWMwQBTGus5NCZKeF5.QpZDnOHLaq6pk5TQRVcQi', null, null, null, null, '0', null);
INSERT INTO `user` VALUES ('2', 'test1', null, '2@1.com', '$2a$13$LduG3JRsf5AT2O9/Puk8qOis8xhCiQhaVz0rgNZxaVp8PRyCNhY0K', null, null, null, '计算机', '0', null);
INSERT INTO `user` VALUES ('3', 'test2', null, '3@1.com', '$2a$13$gVHD2l0OqRnbwYl9Wc/yO.jXStiyCivUV1v1J4kkKni9zqIK//J4O', null, null, null, '食品安全', '0', null);
