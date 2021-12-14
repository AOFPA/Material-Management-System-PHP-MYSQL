-- phpMyAdmin SQL Dump
-- version 5.1.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Dec 13, 2021 at 11:19 AM
-- Server version: 10.4.21-MariaDB
-- PHP Version: 8.0.12

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `ko_company`
--
CREATE DATABASE IF NOT EXISTS `ko_company` DEFAULT CHARACTER SET utf8 COLLATE utf8_general_ci;
USE `ko_company`;

-- --------------------------------------------------------

--
-- Table structure for table `category`
--

CREATE TABLE `category` (
  `cate_id` int(10) NOT NULL,
  `cate_name` varchar(50) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

-- --------------------------------------------------------

--
-- Table structure for table `company`
--

CREATE TABLE `company` (
  `com_id` int(10) NOT NULL,
  `com_name` varchar(100) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

-- --------------------------------------------------------

--
-- Table structure for table `product`
--

CREATE TABLE `product` (
  `pro_id` int(10) NOT NULL,
  `pro_name` varchar(100) NOT NULL,
  `pro_stock` int(10) DEFAULT 0,
  `cate_id` int(10) NOT NULL,
  `pro_list` double(10,2) DEFAULT 0.00,
  `pro_cost` double(10,2) DEFAULT 0.00,
  `pro_send` double(10,2) DEFAULT 0.00,
  `pro_note` varchar(100) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

-- --------------------------------------------------------

--
-- Table structure for table `record`
--

CREATE TABLE `record` (
  `rec_id` int(10) NOT NULL,
  `pro_id` int(10) NOT NULL,
  `com_id` int(10) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

-- --------------------------------------------------------

--
-- Stand-in structure for view `view_pro_cate`
-- (See below for the actual view)
--
CREATE TABLE `view_pro_cate` (
`pro_id` int(10)
,`pro_name` varchar(100)
,`pro_list` double(10,2)
,`pro_send` double(10,2)
,`pro_cost` double(10,2)
,`cate_id` int(10)
,`pro_stock` int(10)
,`cate_name` varchar(50)
,`pro_note` varchar(100)
);

-- --------------------------------------------------------

--
-- Stand-in structure for view `view_rec_pro_cate_com1`
-- (See below for the actual view)
--
CREATE TABLE `view_rec_pro_cate_com1` (
`rec_id` int(10)
,`pro_id` int(10)
,`com_id` int(10)
,`pro_name` varchar(100)
,`pro_stock` int(10)
,`pro_cost` double(10,2)
,`pro_list` double(10,2)
,`pro_send` double(10,2)
,`cate_id` int(10)
,`cate_name` varchar(50)
,`com_name` varchar(100)
);

-- --------------------------------------------------------

--
-- Structure for view `view_pro_cate`
--
DROP TABLE IF EXISTS `view_pro_cate`;

CREATE ALGORITHM=UNDEFINED DEFINER=`root`@`localhost` SQL SECURITY DEFINER VIEW `view_pro_cate`  AS SELECT `a`.`pro_id` AS `pro_id`, `a`.`pro_name` AS `pro_name`, `a`.`pro_list` AS `pro_list`, `a`.`pro_send` AS `pro_send`, `a`.`pro_cost` AS `pro_cost`, `a`.`cate_id` AS `cate_id`, `a`.`pro_stock` AS `pro_stock`, `b`.`cate_name` AS `cate_name`, `a`.`pro_note` AS `pro_note` FROM (`product` `a` join `category` `b` on(`a`.`cate_id` = `b`.`cate_id`)) ;

-- --------------------------------------------------------

--
-- Structure for view `view_rec_pro_cate_com1`
--
DROP TABLE IF EXISTS `view_rec_pro_cate_com1`;

CREATE ALGORITHM=UNDEFINED DEFINER=`root`@`localhost` SQL SECURITY DEFINER VIEW `view_rec_pro_cate_com1`  AS SELECT `a`.`rec_id` AS `rec_id`, `a`.`pro_id` AS `pro_id`, `a`.`com_id` AS `com_id`, `b`.`pro_name` AS `pro_name`, `b`.`pro_stock` AS `pro_stock`, `b`.`pro_cost` AS `pro_cost`, `b`.`pro_list` AS `pro_list`, `b`.`pro_send` AS `pro_send`, `b`.`cate_id` AS `cate_id`, `c`.`cate_name` AS `cate_name`, `d`.`com_name` AS `com_name` FROM (((`record` `a` join `product` `b` on(`a`.`pro_id` = `b`.`pro_id`)) join `category` `c` on(`b`.`cate_id` = `c`.`cate_id`)) join `company` `d` on(`a`.`com_id` = `d`.`com_id`)) ORDER BY `a`.`rec_id` ASC ;

--
-- Indexes for dumped tables
--

--
-- Indexes for table `category`
--
ALTER TABLE `category`
  ADD PRIMARY KEY (`cate_id`);

--
-- Indexes for table `company`
--
ALTER TABLE `company`
  ADD PRIMARY KEY (`com_id`);

--
-- Indexes for table `product`
--
ALTER TABLE `product`
  ADD PRIMARY KEY (`pro_id`),
  ADD KEY `cate_pro` (`cate_id`);

--
-- Indexes for table `record`
--
ALTER TABLE `record`
  ADD PRIMARY KEY (`rec_id`),
  ADD KEY `fk_pro_rec` (`pro_id`),
  ADD KEY `fk_com_rec` (`com_id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `category`
--
ALTER TABLE `category`
  MODIFY `cate_id` int(10) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `company`
--
ALTER TABLE `company`
  MODIFY `com_id` int(10) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `product`
--
ALTER TABLE `product`
  MODIFY `pro_id` int(10) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `record`
--
ALTER TABLE `record`
  MODIFY `rec_id` int(10) NOT NULL AUTO_INCREMENT;

--
-- Constraints for dumped tables
--

--
-- Constraints for table `product`
--
ALTER TABLE `product`
  ADD CONSTRAINT `cate_pro` FOREIGN KEY (`cate_id`) REFERENCES `category` (`cate_id`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Constraints for table `record`
--
ALTER TABLE `record`
  ADD CONSTRAINT `fk_com_rec` FOREIGN KEY (`com_id`) REFERENCES `company` (`com_id`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `fk_pro_rec` FOREIGN KEY (`pro_id`) REFERENCES `product` (`pro_id`) ON DELETE CASCADE ON UPDATE CASCADE;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
