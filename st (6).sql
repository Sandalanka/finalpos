-- phpMyAdmin SQL Dump
-- version 4.7.4
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1:3306
-- Generation Time: Aug 06, 2018 at 04:48 PM
-- Server version: 5.7.19
-- PHP Version: 5.6.31

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET AUTOCOMMIT = 0;
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `st`
--

-- --------------------------------------------------------

--
-- Table structure for table `advanced_payment`
--

DROP TABLE IF EXISTS `advanced_payment`;
CREATE TABLE IF NOT EXISTS `advanced_payment` (
  `invoice_no` int(12) NOT NULL,
  `total` varchar(12) NOT NULL,
  `remain` double NOT NULL,
  `term` int(5) NOT NULL,
  `premium` varchar(12) NOT NULL
) ENGINE=MyISAM DEFAULT CHARSET=latin1;

--
-- Dumping data for table `advanced_payment`
--

INSERT INTO `advanced_payment` (`invoice_no`, `total`, `remain`, `term`, `premium`) VALUES
(41, '540.3', 0, 6, '108.9'),
(42, '5510', 0, 3, '1440.00'),
(43, '1190', 0, 0, '400'),
(44, '-580', 0, 1, '40'),
(45, '5000', 0, -10, '2000'),
(46, '0', 0, -3, '200'),
(50, '-5000', 0, -6, '500'),
(51, '700', 850, 11, '50'),
(57, '1000', 800, 4, '200'),
(66, '33.00', 29.7, 9, '3.3'),
(69, '-23.00', -23, 4, '-5.75');

-- --------------------------------------------------------

--
-- Table structure for table `customer`
--

DROP TABLE IF EXISTS `customer`;
CREATE TABLE IF NOT EXISTS `customer` (
  `id` int(10) NOT NULL AUTO_INCREMENT,
  `fname` varchar(100) NOT NULL,
  `lname` varchar(100) NOT NULL,
  `road` varchar(50) NOT NULL,
  `city` varchar(50) NOT NULL,
  `country` varchar(50) NOT NULL,
  `tp_number` int(12) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=22 DEFAULT CHARSET=latin1;

--
-- Dumping data for table `customer`
--

INSERT INTO `customer` (`id`, `fname`, `lname`, `road`, `city`, `country`, `tp_number`) VALUES
(1, 'sameera', 'lakshitha', 'podda', 'Galle', 'Sri Lanka', 781234567),
(2, 'sameera', 'lakshitha', 'podda', 'Galle', 'Sri Lanka', 781234567),
(3, 'sameera', 'lakshitha', 'poddala', 'Galle', 'Sri Lanka', 787382783),
(4, 'sameera', 'lakshitha', 'poddala', 'Galle', 'Sri Lanka', 787382783),
(5, 'sameera', 'lakshitha', 'poddala', 'Galle', 'Sri Lanka', 787382783),
(6, 'sameera', 'lakshitha', 'poddala', 'Galle', 'Sri Lanka', 787382783),
(7, 'jwjndj', 'dkwjkd', 'jidjwi', 'qdjqi', 'sjwi', 2147483647),
(8, 'jkjfk', 'jkjk', 'jwdij', 'jkdwkd', 'skcek', 2147483647),
(9, 'jkjfk', 'jkjk', 'jwdij', 'jkdwkd', 'skcek', 2147483647),
(10, 'dk', 'mk', 'mkjk', 'kmk', 'mkk', 6767),
(11, 'rer', 'lpl', 'lplp', 'lplp', 'kpk', 8989),
(12, 'rer', 'lpl', 'lplp', 'lplp', 'kpk', 8989),
(13, 'rer', 'lpl', 'lplp', 'lplp', 'kpk', 8989),
(14, 'rer', 'lpl', 'lplp', 'lplp', 'kpk', 8989),
(15, 'rer', 'lpl', 'lplp', 'lplp', 'kpk', 8989),
(16, 'rer', 'lpl', 'lplp', 'lplp', 'kpk', 8989),
(17, 'rer', 'lpl', 'lplp', 'lplp', 'kpk', 8989),
(18, 'gu', 'mk', 'hg', 'huh', 'hyg', 98978),
(19, 'ss', 'dd', 'dd', 'ff', 'ff', 489849),
(20, 'wq', 'sas', 'sqs', 'sqas', 'sa', 3546464),
(21, 'ghgh', 'bvn', 'bnvn', 'hjg', 'ghjg', 8789675);

-- --------------------------------------------------------

--
-- Table structure for table `employee`
--

DROP TABLE IF EXISTS `employee`;
CREATE TABLE IF NOT EXISTS `employee` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `fname` varchar(100) NOT NULL,
  `lname` varchar(100) NOT NULL,
  `road` varchar(100) NOT NULL,
  `city` varchar(50) NOT NULL,
  `country` varchar(50) NOT NULL,
  `tp_number` int(12) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=3 DEFAULT CHARSET=latin1;

--
-- Dumping data for table `employee`
--

INSERT INTO `employee` (`id`, `fname`, `lname`, `road`, `city`, `country`, `tp_number`) VALUES
(1, 'sameera', 'lakshitha', 'poddala', 'gg', 'Sri Lanka', 655757),
(2, 'hgh', 'gfghg', 'dsrgf', 'ghygju', 'gfy', 24567689);

-- --------------------------------------------------------

--
-- Table structure for table `imeinumber`
--

DROP TABLE IF EXISTS `imeinumber`;
CREATE TABLE IF NOT EXISTS `imeinumber` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `barcode` varchar(20) NOT NULL,
  `imei` varchar(15) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=MyISAM AUTO_INCREMENT=10 DEFAULT CHARSET=latin1;

--
-- Dumping data for table `imeinumber`
--

INSERT INTO `imeinumber` (`id`, `barcode`, `imei`) VALUES
(9, '1234', '1234556789');

-- --------------------------------------------------------

--
-- Table structure for table `invoiceitem`
--

DROP TABLE IF EXISTS `invoiceitem`;
CREATE TABLE IF NOT EXISTS `invoiceitem` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `barcode` varchar(50) NOT NULL,
  `itemname` varchar(50) NOT NULL,
  `quantity` varchar(255) NOT NULL,
  `unitprice` varchar(255) NOT NULL,
  `subamount` varchar(255) NOT NULL,
  `subprofit` varchar(50) NOT NULL,
  `imei` varchar(15) NOT NULL,
  `invoiceno` varchar(255) NOT NULL,
  `dat` date NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=107 DEFAULT CHARSET=latin1;

--
-- Dumping data for table `invoiceitem`
--

INSERT INTO `invoiceitem` (`id`, `barcode`, `itemname`, `quantity`, `unitprice`, `subamount`, `subprofit`, `imei`, `invoiceno`, `dat`) VALUES
(100, '12', 'df', '1', '12', '12', '2.00', 'null', '65', '2018-02-02'),
(101, '12', 'df', '1', '12', '24', '4', 'null', '66', '2018-02-02'),
(102, '123', 'hjf', '0', '123', '0', '23.00', 'null', '67', '2018-02-03'),
(103, '122y', 'gfh', '-1', '87867', '0', '80212.00', 'null', '68', '2018-02-06'),
(104, '123', 'hjf', '11', '123', '1353', '253', 'null', '69', '2018-05-29'),
(105, '12', 'df', '0', '12', '0', '2.00', '', '70', '2018-07-10'),
(106, '12', 'df', '1', '12', '12', '2.00', '', '71', '2018-07-10');

-- --------------------------------------------------------

--
-- Table structure for table `payment`
--

DROP TABLE IF EXISTS `payment`;
CREATE TABLE IF NOT EXISTS `payment` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `dat` date NOT NULL,
  `user` varchar(60) NOT NULL,
  `customertype` varchar(15) NOT NULL,
  `totalval` varchar(20) NOT NULL,
  `discount` varchar(20) NOT NULL,
  `grandTotal` varchar(20) NOT NULL,
  `paid` varchar(20) NOT NULL,
  `due` varchar(20) NOT NULL,
  `net_profit` double NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=72 DEFAULT CHARSET=latin1;

--
-- Dumping data for table `payment`
--

INSERT INTO `payment` (`id`, `dat`, `user`, `customertype`, `totalval`, `discount`, `grandTotal`, `paid`, `due`, `net_profit`) VALUES
(65, '2018-02-02', 'NB', 'Retail_price', '12.00', '02', '10.00', '15', '5.00', 0),
(66, '2018-02-02', 'NB', 'Retail_price', '24.00', '05', '19.00', '52', '33.00', -3),
(67, '2018-02-03', 'admin', 'Retail_price', '123.00', '0', '123.00', '123', '0.00', 0),
(68, '2018-02-06', 'admin', 'Retail_price', '87867.00', '0', '87867.00', '87867', '0.00', -80212),
(69, '2018-05-29', 'admin', 'Retail_price', '1353.00', '030', '1323.00', '1300', '-23.00', 223),
(70, '2018-07-10', 'admin', 'Retail_price', '12.00', '2', '10.00', '10', '0.00', -2),
(71, '2018-07-10', 'admin', 'Retail_price', '12.00', '2', '10.00', '10', '0.00', 0);

-- --------------------------------------------------------

--
-- Table structure for table `payment_details`
--

DROP TABLE IF EXISTS `payment_details`;
CREATE TABLE IF NOT EXISTS `payment_details` (
  `id` int(20) NOT NULL AUTO_INCREMENT,
  `invoice_no` text NOT NULL,
  `date` text NOT NULL,
  `payment` text NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=MyISAM AUTO_INCREMENT=9 DEFAULT CHARSET=latin1;

--
-- Dumping data for table `payment_details`
--

INSERT INTO `payment_details` (`id`, `invoice_no`, `date`, `payment`) VALUES
(1, '50', '2018-1-25', '500'),
(2, '45', '2018-1-25', '1400'),
(3, '50', '2018-1-25', '2000'),
(4, '51', '2018-1-28', '50'),
(5, '51', '2018-1-28', '50'),
(6, '51', '2018-2-1', '50'),
(7, '57', '2018-2-1', '200'),
(8, '66', '2018-2-3', '3.3');

-- --------------------------------------------------------

--
-- Table structure for table `product`
--

DROP TABLE IF EXISTS `product`;
CREATE TABLE IF NOT EXISTS `product` (
  `product_id` int(11) NOT NULL AUTO_INCREMENT,
  `product_name` varchar(255) NOT NULL,
  `Barcode` varchar(20) NOT NULL,
  `company_price` varchar(20) NOT NULL,
  `quantity` varchar(255) NOT NULL,
  `Retail_price` varchar(255) NOT NULL,
  `Wholesale_Price` varchar(255) NOT NULL,
  PRIMARY KEY (`product_id`)
) ENGINE=InnoDB AUTO_INCREMENT=6 DEFAULT CHARSET=latin1;

--
-- Dumping data for table `product`
--

INSERT INTO `product` (`product_id`, `product_name`, `Barcode`, `company_price`, `quantity`, `Retail_price`, `Wholesale_Price`) VALUES
(1, 'df', '12', '10', '11', '12', '123'),
(2, 'hjf', '123', '100', '112', '123', '1234'),
(3, 'buns', '3000', '35.00', '20', '35.00', '30.00'),
(4, 'ss', '121', '222', '12', '120', '100'),
(5, 'gfh', '122y', '7655', '6449', '87867', '7658');

-- --------------------------------------------------------

--
-- Table structure for table `return_item`
--

DROP TABLE IF EXISTS `return_item`;
CREATE TABLE IF NOT EXISTS `return_item` (
  `ID` int(10) NOT NULL AUTO_INCREMENT,
  `Item_no` varchar(10) NOT NULL,
  `Invoice_No` int(10) NOT NULL,
  `Quantity` int(10) NOT NULL,
  `Return_type` varchar(20) NOT NULL,
  `net_value` float NOT NULL,
  PRIMARY KEY (`ID`)
) ENGINE=InnoDB AUTO_INCREMENT=42 DEFAULT CHARSET=latin1;

--
-- Dumping data for table `return_item`
--

INSERT INTO `return_item` (`ID`, `Item_no`, `Invoice_No`, `Quantity`, `Return_type`, `net_value`) VALUES
(27, '3000', 30, 2, 'Exchange Item', 70),
(28, '3000', 30, 2, 'Exchange Item', 70),
(29, '123', 33, 6, 'Exchange Item', 738),
(30, '123', 41, 2, 'Exchange Item', 246),
(31, '123', 41, 2, 'Exchange Item', 246),
(32, '123', 41, 2, 'Damaged Item', 0),
(33, '123', 41, 2, 'Damaged Item', 0),
(34, '123', 41, 2, 'Damaged Item', 0),
(35, '123', 54, 1, 'Exchange Item', 123),
(36, '123', 40, 1, 'Exchange Item', 123),
(37, '12', 66, 1, 'Damaged Item', 12),
(38, '123', 67, 1, 'Exchange Item', 123),
(39, '12', 105, 1, 'Exchange Item', 0),
(40, '12', 105, 1, 'Exchange Item', 0),
(41, '12', 70, 1, 'Exchange Item', 12);

-- --------------------------------------------------------

--
-- Table structure for table `test`
--

DROP TABLE IF EXISTS `test`;
CREATE TABLE IF NOT EXISTS `test` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `barcode` varchar(30) NOT NULL,
  `resultname` varchar(30) NOT NULL,
  `quantity` varchar(30) NOT NULL,
  `resultprice` varchar(30) NOT NULL,
  `subamount` varchar(30) NOT NULL,
  `subprofit` varchar(50) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=3 DEFAULT CHARSET=latin1;

--
-- Dumping data for table `test`
--

INSERT INTO `test` (`id`, `barcode`, `resultname`, `quantity`, `resultprice`, `subamount`, `subprofit`) VALUES
(1, '123', 'hjf', '4', '123', '492', '92'),
(2, '12', 'df', '3', '12', '36', '6');

-- --------------------------------------------------------

--
-- Table structure for table `users`
--

DROP TABLE IF EXISTS `users`;
CREATE TABLE IF NOT EXISTS `users` (
  `user_id` int(11) NOT NULL AUTO_INCREMENT,
  `username` varchar(255) NOT NULL,
  `password` varchar(255) NOT NULL,
  `validate` varchar(10) DEFAULT NULL,
  PRIMARY KEY (`user_id`)
) ENGINE=InnoDB AUTO_INCREMENT=12 DEFAULT CHARSET=latin1;

--
-- Dumping data for table `users`
--

INSERT INTO `users` (`user_id`, `username`, `password`, `validate`) VALUES
(1, 'admin', '5f4dcc3b5aa765d61d8327deb882cf99', 'superAdmin'),
(10, 'mika', '827ccb0eea8a706c4c34a16891f84e7b', NULL),
(11, 'newuser', '827ccb0eea8a706c4c34a16891f84e7b', NULL);
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
