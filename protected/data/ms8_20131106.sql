/*
Navicat MySQL Data Transfer

Source Server         : ms
Source Server Version : 50612
Source Host           : localhost:3306
Source Database       : ms

Target Server Type    : MYSQL
Target Server Version : 50612
File Encoding         : 65001

Date: 2013-11-06 10:24:57
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
  `user_name` varchar(100) NOT NULL COMMENT '谁的关注',
  `prepare_user` varchar(100) NOT NULL COMMENT '谁的面试准备，冗余字段',
  `companyName` varchar(100) NOT NULL COMMENT '公司名称，冗余字段',
  `position` varchar(60) NOT NULL COMMENT '职位信息，冗余字段',
  `time` datetime NOT NULL COMMENT '此记录创建时间',
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
) ENGINE=InnoDB AUTO_INCREMENT=2 DEFAULT CHARSET=utf8;

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
) ENGINE=InnoDB AUTO_INCREMENT=5 DEFAULT CHARSET=utf8;

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
