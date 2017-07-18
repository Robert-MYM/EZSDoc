-- phpMyAdmin SQL Dump
-- version 4.5.1
-- http://www.phpmyadmin.net
--
-- Host: 127.0.0.1
-- Generation Time: 2017-07-15 08:33:36
-- 服务器版本： 10.1.19-MariaDB
-- PHP Version: 5.6.28

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `ezs`
--

-- --------------------------------------------------------

--
-- 表的结构 `address`
--

CREATE TABLE `address` (
  `id` int(11) NOT NULL,
  `phone` char(11) COLLATE utf8_unicode_ci NOT NULL,
  `address` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `name` varchar(50) COLLATE utf8_unicode_ci NOT NULL,
  `realphone` char(11) COLLATE utf8_unicode_ci NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- 转存表中的数据 `address`
--

INSERT INTO `address` (`id`, `phone`, `address`, `name`, `realphone`) VALUES
(1, '17816800000', '浙江省杭州市浙江大学玉泉校区曹光彪西楼503', '蔡跃区', '17816800000'),
(2, '17816800000', '浙江省杭州市浙江大学玉泉校区30舍', '蔡跃区', '17816800000'),
(3, '17816800000', '浙江省杭州市某个小角落', '蔡跃区', '17816800000'),
(11, '17816811111', '随便送送到算你输', '毛一鸣', '17816811111');

-- --------------------------------------------------------

--
-- 表的结构 `aks`
--

CREATE TABLE `aks` (
  `aksid` char(10) COLLATE utf8_unicode_ci NOT NULL,
  `phone` char(11) COLLATE utf8_unicode_ci NOT NULL,
  `goodsid` char(13) COLLATE utf8_unicode_ci NOT NULL,
  `addressid` int(11) NOT NULL,
  `cardid` int(11) NOT NULL,
  `num` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- 转存表中的数据 `aks`
--

INSERT INTO `aks` (`aksid`, `phone`, `goodsid`, `addressid`, `cardid`, `num`) VALUES
('00001', '17816800000', '6934665084720', 1, 1, 1),
('00002', '17816800000', '6922266440090', 2, 1, 2),
('00003', '17816800000', '6920458834412', 1, 1, 1);

-- --------------------------------------------------------

--
-- 表的结构 `bank`
--

CREATE TABLE `bank` (
  `creditCard` char(19) COLLATE utf8_unicode_ci NOT NULL,
  `password` char(6) COLLATE utf8_unicode_ci NOT NULL,
  `name` varchar(50) COLLATE utf8_unicode_ci NOT NULL,
  `account` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- 转存表中的数据 `bank`
--

INSERT INTO `bank` (`creditCard`, `password`, `name`, `account`) VALUES
('6217001540011360001', '123456', '工商银行', 1000),
('6217001540011360002', '123456', '建设银行', 1000),
('6217001540011360003', '123456', '招商银行', 1000),
('6217001540011360004', '123456', '中国银行', 1000),
('6217001540011360005', '123456', '工商银行', 1000),
('6217001540011360006', '123456', '工商银行', 1000);

-- --------------------------------------------------------

--
-- 表的结构 `creditcard`
--

CREATE TABLE `creditcard` (
  `id` int(11) NOT NULL,
  `phone` char(11) COLLATE utf8_unicode_ci NOT NULL,
  `cardID` char(19) COLLATE utf8_unicode_ci NOT NULL,
  `bank` varchar(50) COLLATE utf8_unicode_ci NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- 转存表中的数据 `creditcard`
--

INSERT INTO `creditcard` (`id`, `phone`, `cardID`, `bank`) VALUES
(1, '17816800000', '6217001540011360001', '工商银行'),
(2, '17816800000', '6217001540011360003', '招商银行'),
(3, '17816811111', '6217001540011360002', '建设银行');

-- --------------------------------------------------------

--
-- 表的结构 `goods`
--

CREATE TABLE `goods` (
  `id` char(13) COLLATE utf8_unicode_ci NOT NULL,
  `name` varchar(50) COLLATE utf8_unicode_ci NOT NULL,
  `stock` int(11) NOT NULL,
  `price` decimal(5,2) NOT NULL,
  `image` varchar(255) COLLATE utf8_unicode_ci DEFAULT NULL,
  `state` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- 转存表中的数据 `goods`
--

INSERT INTO `goods` (`id`, `name`, `stock`, `price`, `image`, `state`) VALUES
('6902022137235', '蓝月亮洗衣液', 20, '21.80', 'image/xiyiye.jpg', 0),
('6903148144541', '舒肤佳香皂', 20, '3.80', 'image/soap.jpg', 0),
('6920458834412', '火咖美式冰咖啡', 10, '5.00', 'image/coffee.jpg', 0),
('6922266440090', '清风牌抽纸', 10, '4.00', 'image/chouzhi.jpg', 0),
('6934665084720', '鲜牛奶', 10, '3.50', 'image/milk.jpg', 0),
('6938761200046', '5100西藏冰川矿泉水24瓶', 20, '168.00', 'image/water.jpg', 0);

-- --------------------------------------------------------

--
-- 表的结构 `order`
--

CREATE TABLE `order` (
  `orderid` int(11) NOT NULL,
  `goodsid` char(13) COLLATE utf8_unicode_ci NOT NULL,
  `phone` char(11) COLLATE utf8_unicode_ci NOT NULL,
  `address` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `condition` int(11) NOT NULL,
  `date` date NOT NULL,
  `num` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- 转存表中的数据 `order`
--

INSERT INTO `order` (`orderid`, `goodsid`, `phone`, `address`, `condition`, `date`, `num`) VALUES
(1, '6920458834412', '17816800000', '浙江省杭州市浙江大学玉泉校区曹光彪西楼503', 0, '2017-07-15', 1),
(2, '6922266440090', '17816800000', '浙江省杭州市浙江大学玉泉校区30舍', 0, '2017-07-14', 2),
(3, '6934665084720', '17816800000', '浙江省杭州市某个小角落', 2, '2017-07-15', 3),
(4, '6938761200046', '17816800000', '浙江省杭州市浙江大学玉泉校区30舍', 1, '2017-07-14', 1);

-- --------------------------------------------------------

--
-- 表的结构 `seller`
--

CREATE TABLE `seller` (
  `phone` char(11) NOT NULL DEFAULT '',
  `password` varchar(50) NOT NULL DEFAULT ''
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- 转存表中的数据 `seller`
--

INSERT INTO `seller` (`phone`, `password`) VALUES
('12345678901', '123456');

-- --------------------------------------------------------

--
-- 表的结构 `userinfo`
--

CREATE TABLE `userinfo` (
  `username` varchar(50) COLLATE utf8_unicode_ci NOT NULL,
  `password` varchar(50) COLLATE utf8_unicode_ci NOT NULL,
  `email` varchar(50) COLLATE utf8_unicode_ci NOT NULL,
  `phone` char(11) COLLATE utf8_unicode_ci NOT NULL,
  `creditCard` char(19) COLLATE utf8_unicode_ci DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- 转存表中的数据 `userinfo`
--

INSERT INTO `userinfo` (`username`, `password`, `email`, `phone`, `creditCard`) VALUES
('蔡跃区', '123456', '123@qq.com', '17816800000', '6217001540011360001'),
('毛一鸣', '123456', 'maoyiming@163.com', '17816811111', NULL);

--
-- Indexes for dumped tables
--

--
-- Indexes for table `address`
--
ALTER TABLE `address`
  ADD PRIMARY KEY (`id`),
  ADD KEY `address_phone` (`phone`);

--
-- Indexes for table `aks`
--
ALTER TABLE `aks`
  ADD PRIMARY KEY (`aksid`),
  ADD KEY `aks_userinfo` (`phone`),
  ADD KEY `aks_goods` (`goodsid`),
  ADD KEY `aks_address` (`addressid`),
  ADD KEY `aks_creditCard` (`cardid`);

--
-- Indexes for table `bank`
--
ALTER TABLE `bank`
  ADD PRIMARY KEY (`creditCard`);

--
-- Indexes for table `creditcard`
--
ALTER TABLE `creditcard`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `cardID_UNIQUE` (`cardID`),
  ADD KEY `creditcard_userinfo` (`phone`);

--
-- Indexes for table `goods`
--
ALTER TABLE `goods`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `name_UNIQUE` (`name`);

--
-- Indexes for table `order`
--
ALTER TABLE `order`
  ADD PRIMARY KEY (`orderid`),
  ADD KEY `order_goodsid_goods_idx` (`goodsid`),
  ADD KEY `order_phone_userinfo_idx` (`phone`);

--
-- Indexes for table `seller`
--
ALTER TABLE `seller`
  ADD PRIMARY KEY (`phone`);

--
-- Indexes for table `userinfo`
--
ALTER TABLE `userinfo`
  ADD PRIMARY KEY (`phone`),
  ADD UNIQUE KEY `email_UNIQUE` (`email`);

--
-- 在导出的表使用AUTO_INCREMENT
--

--
-- 使用表AUTO_INCREMENT `address`
--
ALTER TABLE `address`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=12;
--
-- 使用表AUTO_INCREMENT `creditcard`
--
ALTER TABLE `creditcard`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;
--
-- 使用表AUTO_INCREMENT `order`
--
ALTER TABLE `order`
  MODIFY `orderid` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=31;
--
-- 限制导出的表
--

--
-- 限制表 `address`
--
ALTER TABLE `address`
  ADD CONSTRAINT `address_phone` FOREIGN KEY (`phone`) REFERENCES `userinfo` (`phone`) ON DELETE NO ACTION ON UPDATE NO ACTION;

--
-- 限制表 `aks`
--
ALTER TABLE `aks`
  ADD CONSTRAINT `aks_address` FOREIGN KEY (`addressid`) REFERENCES `address` (`id`) ON DELETE NO ACTION ON UPDATE NO ACTION,
  ADD CONSTRAINT `aks_creditCard` FOREIGN KEY (`cardid`) REFERENCES `creditcard` (`id`) ON DELETE NO ACTION ON UPDATE NO ACTION,
  ADD CONSTRAINT `aks_goods` FOREIGN KEY (`goodsid`) REFERENCES `goods` (`id`) ON DELETE NO ACTION ON UPDATE NO ACTION,
  ADD CONSTRAINT `aks_userinfo` FOREIGN KEY (`phone`) REFERENCES `userinfo` (`phone`) ON DELETE NO ACTION ON UPDATE NO ACTION;

--
-- 限制表 `creditcard`
--
ALTER TABLE `creditcard`
  ADD CONSTRAINT `creditcard_userinfo` FOREIGN KEY (`phone`) REFERENCES `userinfo` (`phone`) ON DELETE NO ACTION ON UPDATE NO ACTION;

--
-- 限制表 `order`
--
ALTER TABLE `order`
  ADD CONSTRAINT `order_goodsid_goods` FOREIGN KEY (`goodsid`) REFERENCES `goods` (`id`) ON DELETE NO ACTION ON UPDATE NO ACTION,
  ADD CONSTRAINT `order_phone_userinfo` FOREIGN KEY (`phone`) REFERENCES `userinfo` (`phone`) ON DELETE NO ACTION ON UPDATE NO ACTION;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
