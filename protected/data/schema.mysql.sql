
-- 数据库: `ms`
--

-- --------------------------------------------------------

--
-- 表的结构 `company`
--

CREATE TABLE IF NOT EXISTS `company` (
  `companyID` bigint NOT NULL AUTO_INCREMENT,
  `fullname` varchar(100) NOT NULL,
  `shortname` varchar(100) NOT NULL,
  `industryID` varchar(100) NOT NULL,
  `address` varchar(100) default NULL,
  PRIMARY KEY (`companyID`)
) ENGINE=InnoDB;

--
-- 导出表中的数据 `company`
--


-- --------------------------------------------------------

--
-- 表的结构 `concern`
--

CREATE TABLE IF NOT EXISTS `concern` (
  `userID` bigint NOT NULL,
  `prepareID` varchar(100) NOT NULL
) ENGINE=InnoDB;

--
-- 导出表中的数据 `concern`
--


-- --------------------------------------------------------

--
-- 表的结构 `industry`
--

CREATE TABLE IF NOT EXISTS `industry` (
  `industryID` bigint NOT NULL AUTO_INCREMENT,
  `industryName` varchar(100) NOT NULL,
  PRIMARY KEY (`industryID`)
) ENGINE=InnoDB;

--
-- 导出表中的数据 `industry`
--


-- --------------------------------------------------------

--
-- 表的结构 `message`
--

CREATE TABLE IF NOT EXISTS `message` (
  `messageID` bigint NOT NULL AUTO_INCREMENT,
  `from` varchar(100) NOT NULL,
  `to` varchar(100) NOT NULL,
  `content` varchar(100) NOT NULL,
  `time` int(11) NOT NULL,
  PRIMARY KEY (`messageID`)
) ENGINE=InnoDB;

--
-- 导出表中的数据 `message`
--


-- --------------------------------------------------------

--
-- 表的结构 `position`
--

CREATE TABLE IF NOT EXISTS `position` (
  `positionID` bigint NOT NULL AUTO_INCREMENT,
  `positionName` varchar(100) NOT NULL,
  `positionClass` varchar(100) default NULL,
  PRIMARY KEY (`positionID`)
) ENGINE=InnoDB;

--
-- 导出表中的数据 `position`
--


-- --------------------------------------------------------

--
-- 表的结构 `prepare`
--

CREATE TABLE IF NOT EXISTS `prepare` (
  `prepareID` bigint NOT NULL AUTO_INCREMENT,
  `userID` bigint NOT NULL,
  `companyName` varchar(100) NOT NULL,
  `position` bigint NOT NULL,
  `time` int(11) NOT NULL,
  `summary` varchar(1000) default NULL,
  PRIMARY KEY (`prepareID`)
) ENGINE=InnoDB;

--
-- 导出表中的数据 `prepare`
--


-- --------------------------------------------------------

--
-- 表的结构 `prepare_detail`
--

CREATE TABLE IF NOT EXISTS `prepare_detail` (
  `prepareID` bigint NOT NULL,
  `title` varchar(100) NOT NULL COMMENT 'url对于的标题',
  `url` varchar(100) NOT NULL,
  `type` varchar(100) NOT NULL,
  `detailID` bigint NOT NULL AUTO_INCREMENT,
  PRIMARY KEY (`detailID`)
) ENGINE=InnoDB;

--
-- 导出表中的数据 `prepare_detail`
--


-- --------------------------------------------------------

--
-- 表的结构 `renpin`
--

CREATE TABLE IF NOT EXISTS `renpin` (
  `renpinID` bigint NOT NULL AUTO_INCREMENT,
  `userID` bigint NOT NULL,
  `content` varchar(1000) NOT NULL,
  `time` int(11) NOT NULL,
  PRIMARY KEY (`renpinID`)
) ENGINE=InnoDB;

--
-- 导出表中的数据 `renpin`
--


-- --------------------------------------------------------

--
-- 表的结构 `renpin_detail`
--

CREATE TABLE IF NOT EXISTS `renpin_detail` (
  `renpin_id` bigint NOT NULL,
  `bless_user_id` bigint NOT NULL COMMENT '是谁祝福的',
  `time` int(11) NOT NULL
) ENGINE=InnoDB;

--
-- 导出表中的数据 `renpin_detail`
--


-- --------------------------------------------------------

--
-- 表的结构 `self_introduction`
--

CREATE TABLE IF NOT EXISTS `self_introduction` (
  `intro_id` bigint NOT NULL,
  `user_id` bigint NOT NULL,
  `self_introduction` varchar(10000) NOT NULL
) ENGINE=InnoDB;

--
-- 导出表中的数据 `self_introduction`
--


-- --------------------------------------------------------

--
-- 表的结构 `self_introduction_comment`
--

CREATE TABLE IF NOT EXISTS `self_introduction_comment` (
  `posterID` bigint NOT NULL COMMENT '评论人的ID',
  `content` varchar(500) NOT NULL,
  `time` int(11) NOT NULL,
  `commentID` bigint NOT NULL AUTO_INCREMENT COMMENT '本评论的ID' ,
  `intro_id` bigint NOT NULL COMMENT '针对的是哪个自我介绍',
  `toComment` bigint default NULL COMMENT '所针对的评论的ID,如果是仅针对自我介绍的评论,则此字段为空',
  PRIMARY KEY (`commentID`)
) ENGINE=InnoDB;

--
-- 导出表中的数据 `self_introduction_comment`
--


-- --------------------------------------------------------

--
-- 表的结构 `user`
--

CREATE TABLE IF NOT EXISTS `user` (
  `userID` bigint NOT NULL AUTO_INCREMENT,
  `username` varchar(100) NOT NULL,
  `email` varchar(100) NOT NULL,
  `password` varchar(100) NOT NULL,
  `pic` varchar(100) default NULL,
  `sex` varchar(100) default NULL,
  `school` varchar(100) default NULL,
  `major` varchar(100) default NULL,
  `score` tinyint(100) default 0,
  `selfintroduction` varchar(10000) default NULL,
  PRIMARY KEY (`userID`)
) ENGINE=InnoDB;

--
-- 导出表中的数据 `user`
--

