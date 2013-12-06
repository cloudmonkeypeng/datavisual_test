-- phpMyAdmin SQL Dump
-- version 4.0.4.1
-- http://www.phpmyadmin.net
--
-- 主机: localhost
-- 生成日期: 2013 年 12 月 06 日 03:59
-- 服务器版本: 5.6.12
-- PHP 版本: 5.5.3

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8 */;

--
-- 数据库: `testdata`
--
CREATE DATABASE IF NOT EXISTS `testdata` DEFAULT CHARACTER SET latin1 COLLATE latin1_swedish_ci;
USE `testdata`;

-- --------------------------------------------------------

--
-- 表的结构 `guarantee_circle`
--

CREATE TABLE IF NOT EXISTS `guarantee_circle` (
  `internal_id` int(11) NOT NULL AUTO_INCREMENT COMMENT '内部ID',
  `groups` int(11) NOT NULL COMMENT '组别',
  `client_num` int(11) NOT NULL COMMENT '涉及客户数',
  `bank_id` int(11) NOT NULL COMMENT '分行号',
  `bank_name` varchar(50) COLLATE utf8_bin NOT NULL COMMENT '简称',
  `project_id` int(11) NOT NULL COMMENT '项目编号',
  `project_name` varchar(200) COLLATE utf8_bin NOT NULL COMMENT '项目名称',
  `client_id` int(11) NOT NULL COMMENT '客户编号',
  `client_name` varchar(50) COLLATE utf8_bin NOT NULL COMMENT '客户名称',
  `guarantee_id` int(11) NOT NULL COMMENT '贷款号',
  `currency` varchar(10) COLLATE utf8_bin NOT NULL COMMENT '币种',
  `contract_date` timestamp NOT NULL DEFAULT '0000-00-00 00:00:00' COMMENT '合同到期日',
  `loan_maturities` timestamp NOT NULL DEFAULT '0000-00-00 00:00:00' COMMENT '贷款到期日',
  `amount` float NOT NULL COMMENT '按照汇率转换为人民币',
  `guarantee_contract_id` varchar(20) COLLATE utf8_bin NOT NULL COMMENT '担保合同号',
  `guarantee_contract_name` varchar(50) COLLATE utf8_bin NOT NULL COMMENT '担保合同名称',
  `guarantor_id` int(11) NOT NULL COMMENT '担保人代码',
  `guarantor_name` varchar(50) COLLATE utf8_bin NOT NULL COMMENT '担保人名称',
  PRIMARY KEY (`internal_id`)
) ENGINE=InnoDB  DEFAULT CHARSET=utf8 COLLATE=utf8_bin AUTO_INCREMENT=15 ;

--
-- 转存表中的数据 `guarantee_circle`
--

INSERT INTO `guarantee_circle` (`internal_id`, `groups`, `client_num`, `bank_id`, `bank_name`, `project_id`, `project_name`, `client_id`, `client_name`, `guarantee_id`, `currency`, `contract_date`, `loan_maturities`, `amount`, `guarantee_contract_id`, `guarantee_contract_name`, `guarantor_id`, `guarantor_name`) VALUES
(2, 1, 5, 123123123, '某银行', 1, '项目X00000000001', 8392, '公司A', 665100100, 'CNY', '2006-10-16 16:00:00', '2016-10-16 16:00:00', 380000000, 'B066234235656', '担保合同X00000000001', 24768, '公司N'),
(3, 1, 5, 123123123, '某银行', 2, '项目X00000000002', 8392, '公司A', 65100080, 'CNY', '2006-08-09 16:00:00', '2016-08-17 16:00:00', 140000000, 'Z06612312305', '担保合同X00000000002', 6946, '公司Z'),
(4, 1, 5, 123123123, '某银行', 3, '项目X00000000003', 12179, '公司B', 765100103, 'CNY', '2007-07-19 16:00:00', '2017-08-30 16:00:00', 330000000, 'Z076123123232', '担保合同X00000000003', 12568, '公司H'),
(5, 1, 5, 123123123, '某银行', 4, '项目X00000000004', 12179, '公司B', 765100033, 'CNY', '2007-03-26 16:00:00', '2017-03-26 16:00:00', 70000000, 'Z07123124', '担保合同X00000000004', 6946, '公司Z'),
(7, 1, 5, 123123123, '某银行', 5, '项目X00000000005', 8392, '公司A', 9651, 'CNY', '2008-07-19 16:00:00', '2019-01-21 16:00:00', 30000000, 'Z081231230910', '担保合同X00000000005', 24768, '公司N'),
(8, 1, 5, 123123123, '某银行', 6, '项目X00000000006', 12568, '公司H', 12656021, 'CNY', '2012-06-27 16:00:00', '2013-06-26 16:00:00', 40000000, '6512312512', '担保合同X00000000006', 24768, '公司N'),
(9, 1, 5, 123123123, '某银行', 7, '项目X00000000007', 24768, '公司N', 1165100113, 'CNY', '2011-07-21 16:00:00', '2012-07-21 16:00:00', 120000000, 'B116510922', '担保合同X00000000007', 12179, '公司B'),
(11, 1, 5, 123123123, '某银行', 8, '项目X00000000008', 6946, '公司Z', 1165100130, 'CNY', '2011-08-25 16:00:00', '2012-08-24 16:00:00', 150000000, 'Z116123180', '担保合同X00000000008', 24768, '公司N'),
(12, 1, 5, 123123123, '某银行', 9, '项目X00000000009', 12179, '公司B', 1165100158, 'CNY', '2011-10-25 16:00:00', '2012-10-18 16:00:00', 90000000, 'B11123123547', '担保合同X00000000009', 24768, '公司N'),
(13, 1, 5, 123123123, '某银行', 10, '项目X00000000010', 8392, '公司A', 1265100061, 'CNY', '2012-04-23 16:00:00', '2013-04-22 16:00:00', 120000000, 'B121231231208', '担保合同X00000000010', 12179, '公司B'),
(14, 1, 5, 123123123, '某银行', 11, '项目X00000000011', 12179, '公司B', 1265100044, 'CNY', '2012-03-28 16:00:00', '2013-03-27 16:00:00', 100000000, 'B1212312330', '担保合同X00000000011', 8392, '公司A');

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
