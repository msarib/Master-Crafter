-- phpMyAdmin SQL Dump
-- version 5.2.0
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Jun 25, 2022 at 09:00 PM
-- Server version: 10.4.24-MariaDB
-- PHP Version: 7.4.29

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `master_crafter`
--

-- --------------------------------------------------------

--
-- Table structure for table `tbl_act_nature`
--

CREATE TABLE `tbl_act_nature` (
  `NATURE_CODE` int(11) NOT NULL,
  `NATURE_NAME` varchar(100) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `tbl_act_nature`
--

INSERT INTO `tbl_act_nature` (`NATURE_CODE`, `NATURE_NAME`) VALUES
(1, 'VENDOR'),
(2, 'CUSTOMER'),
(3, 'TRANSPORTER');

-- --------------------------------------------------------

--
-- Table structure for table `tbl_act_type`
--

CREATE TABLE `tbl_act_type` (
  `TYPE_CODE` int(11) NOT NULL,
  `TYPE_NAME` varchar(70) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `tbl_act_type`
--

INSERT INTO `tbl_act_type` (`TYPE_CODE`, `TYPE_NAME`) VALUES
(1, 'control'),
(2, 'Detail');

-- --------------------------------------------------------

--
-- Table structure for table `tbl_brand`
--

CREATE TABLE `tbl_brand` (
  `ID` int(11) NOT NULL,
  `NAME` varchar(100) NOT NULL,
  `STATUS_ID` int(11) NOT NULL,
  `CREATED_AT` datetime NOT NULL,
  `ADD_USER_ID` int(11) NOT NULL,
  `ADD_IP_ADDRESS` varchar(70) NOT NULL,
  `ADD_CMP_NAME` varchar(70) NOT NULL,
  `UPDATED_AT` datetime NOT NULL,
  `EDIT_USER_ID` int(11) NOT NULL,
  `EDIT_IP_ADDRESS` varchar(70) NOT NULL,
  `EDIT_CMP_NAME` varchar(70) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `tbl_brand`
--

INSERT INTO `tbl_brand` (`ID`, `NAME`, `STATUS_ID`, `CREATED_AT`, `ADD_USER_ID`, `ADD_IP_ADDRESS`, `ADD_CMP_NAME`, `UPDATED_AT`, `EDIT_USER_ID`, `EDIT_IP_ADDRESS`, `EDIT_CMP_NAME`) VALUES
(1, 'AMREELI', 1, '0000-00-00 00:00:00', 0, '', '', '0000-00-00 00:00:00', 0, '', ''),
(2, 'Falcon', 1, '0000-00-00 00:00:00', 0, '', '', '0000-00-00 00:00:00', 0, '', ''),
(4, 'Fauji', 1, '0000-00-00 00:00:00', 0, '', '', '0000-00-00 00:00:00', 0, '', ''),
(5, 'DG', 1, '0000-00-00 00:00:00', 0, '', '', '0000-00-00 00:00:00', 0, '', '');

-- --------------------------------------------------------

--
-- Table structure for table `tbl_calculator_itemrate`
--

CREATE TABLE `tbl_calculator_itemrate` (
  `rating_id` int(11) NOT NULL,
  `item_id` int(11) DEFAULT NULL,
  `single_story_qty` double DEFAULT NULL,
  `double_story_qty` double DEFAULT NULL,
  `single_basement_qty` double DEFAULT NULL,
  `double_basement_qty` double DEFAULT NULL,
  `third_floor_qty` double DEFAULT NULL,
  `forth_floor_qty` double DEFAULT NULL,
  `fifth_floor_qty` double DEFAULT NULL,
  `sixth_floor_qty` double DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `tbl_calculator_itemrate`
--

INSERT INTO `tbl_calculator_itemrate` (`rating_id`, `item_id`, `single_story_qty`, `double_story_qty`, `single_basement_qty`, `double_basement_qty`, `third_floor_qty`, `forth_floor_qty`, `fifth_floor_qty`, `sixth_floor_qty`) VALUES
(1, 9, 0.9, 0.2, 0.3, 0.4, 0.5, 0.6, 1, 0.7),
(2, 10, 0.1, 0.2, 0.3, 0.3, 0.5, 1, 0.7, 0.9),
(3, 16, 0.2, 0.6, 0.8, 0.1, 0.2, 0.3, 0.5, 0.7);

-- --------------------------------------------------------

--
-- Table structure for table `tbl_category`
--

CREATE TABLE `tbl_category` (
  `CAT_ID` int(11) NOT NULL,
  `CAT_NAME` varchar(70) NOT NULL,
  `ACT_TYPE` int(11) NOT NULL,
  `ACT_PARENT_CODE` int(11) NOT NULL,
  `STATUS_ID` int(11) NOT NULL,
  `CREATED_AT` datetime NOT NULL,
  `ADD_USER_ID` int(11) NOT NULL,
  `ADD_IP_ADDRESS` varchar(70) NOT NULL,
  `ADD_CMP_NAME` varchar(70) NOT NULL,
  `UPDATED_AT` datetime NOT NULL,
  `EDIT_USER_ID` int(11) NOT NULL,
  `EDIT_IP_ADDRESS` varchar(70) NOT NULL,
  `EDIT_CMP_NAME` varchar(70) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `tbl_category`
--

INSERT INTO `tbl_category` (`CAT_ID`, `CAT_NAME`, `ACT_TYPE`, `ACT_PARENT_CODE`, `STATUS_ID`, `CREATED_AT`, `ADD_USER_ID`, `ADD_IP_ADDRESS`, `ADD_CMP_NAME`, `UPDATED_AT`, `EDIT_USER_ID`, `EDIT_IP_ADDRESS`, `EDIT_CMP_NAME`) VALUES
(16, 'Cements', 2, 0, 1, '2011-05-22 08:51:09', 0, '142.250.185.36', 'DESKTOP-FPCU3DB', '2011-05-22 08:51:09', 0, '142.250.185.36', 'DESKTOP-FPCU3DB'),
(17, 'Steel Rod', 2, 0, 1, '2011-05-22 08:55:14', 0, '142.250.185.36', 'DESKTOP-FPCU3DB', '2011-05-22 08:55:14', 0, '142.250.185.36', 'DESKTOP-FPCU3DB');

-- --------------------------------------------------------

--
-- Table structure for table `tbl_class`
--

CREATE TABLE `tbl_class` (
  `ID` int(11) NOT NULL,
  `NAME` varchar(100) DEFAULT NULL,
  `STATUS_ID` int(11) DEFAULT NULL,
  `CREATED_AT` datetime DEFAULT NULL,
  `ADD_USER_ID` int(11) DEFAULT NULL,
  `ADD_IP_ADDRESS` varchar(70) DEFAULT NULL,
  `ADD_CMP_NAME` varchar(70) DEFAULT NULL,
  `UPDATED_AT` datetime DEFAULT NULL,
  `EDIT_USER_ID` int(11) DEFAULT NULL,
  `EDIT_IP_ADDRESS` varchar(70) DEFAULT NULL,
  `EDIT_CMP_NAME` varchar(70) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `tbl_class`
--

INSERT INTO `tbl_class` (`ID`, `NAME`, `STATUS_ID`, `CREATED_AT`, `ADD_USER_ID`, `ADD_IP_ADDRESS`, `ADD_CMP_NAME`, `UPDATED_AT`, `EDIT_USER_ID`, `EDIT_IP_ADDRESS`, `EDIT_CMP_NAME`) VALUES
(1, 'Local', 1, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL),
(2, 'Imported', 1, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL);

-- --------------------------------------------------------

--
-- Table structure for table `tbl_coast_calculator`
--

CREATE TABLE `tbl_coast_calculator` (
  `cost_id` int(11) NOT NULL,
  `min_single` text DEFAULT NULL,
  `max_single` text DEFAULT NULL,
  `min_double` text DEFAULT NULL,
  `max_double` text DEFAULT NULL,
  `min_signle_basement` text DEFAULT NULL,
  `max_single_basement` text DEFAULT NULL,
  `min_double_basement` text DEFAULT NULL,
  `max_double_basement` text DEFAULT NULL,
  `min_3rdfloor` text DEFAULT NULL,
  `max_3rdfloor` text DEFAULT NULL,
  `min_4_floor` text DEFAULT NULL,
  `max_4floor` text DEFAULT NULL,
  `min_5_floor` text DEFAULT NULL,
  `max_5_floor` text DEFAULT NULL,
  `min_6_floor` text DEFAULT NULL,
  `max_6_floor` text DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `tbl_coast_calculator`
--

INSERT INTO `tbl_coast_calculator` (`cost_id`, `min_single`, `max_single`, `min_double`, `max_double`, `min_signle_basement`, `max_single_basement`, `min_double_basement`, `max_double_basement`, `min_3rdfloor`, `max_3rdfloor`, `min_4_floor`, `max_4floor`, `min_5_floor`, `max_5_floor`, `min_6_floor`, `max_6_floor`) VALUES
(1, '90', '100', '90', '90', '80', '80', '70', '70', '60', '60', '50', '50', '40', '40', '30', '30');

-- --------------------------------------------------------

--
-- Table structure for table `tbl_color`
--

CREATE TABLE `tbl_color` (
  `ID` int(11) NOT NULL,
  `NAME` varchar(70) NOT NULL,
  `STATUS_ID` int(11) NOT NULL,
  `CREATED_AT` datetime NOT NULL,
  `ADD_USER_ID` int(11) NOT NULL,
  `ADD_IP_ADDRESS` varchar(70) NOT NULL,
  `ADD_CMP_NAME` varchar(70) NOT NULL,
  `UPDATED_AT` datetime NOT NULL,
  `EDIT_USER_ID` int(11) NOT NULL,
  `EDIT_IP_ADDRESS` varchar(70) NOT NULL,
  `EDIT_CMP_NAME` varchar(70) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

-- --------------------------------------------------------

--
-- Table structure for table `tbl_contact`
--

CREATE TABLE `tbl_contact` (
  `ID` int(11) NOT NULL,
  `CT_DATE` datetime DEFAULT NULL,
  `NAME` varchar(50) DEFAULT NULL,
  `EMAIL` varchar(50) DEFAULT NULL,
  `PHONE_NUMBER` varchar(50) DEFAULT NULL,
  `SUBJECT` varchar(100) DEFAULT NULL,
  `MESSAGE` text DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `tbl_contact`
--

INSERT INTO `tbl_contact` (`ID`, `CT_DATE`, `NAME`, `EMAIL`, `PHONE_NUMBER`, `SUBJECT`, `MESSAGE`) VALUES
(1, '2030-03-22 02:19:06', 'Owais Khan', 'Owaiskhan837@outlook.com', '0334-7358492', 'CONATACT US', 'MATERIAL DETAIL ARE AS UNDER BELOW'),
(2, '2005-04-22 11:36:55', 'Owais Khan', 'Owaiskhan837@outlook.com', '0334-7358492', 'CONATACT US', 'asdasd'),
(3, '2020-04-22 09:04:44', 'Ashhad', 'zain@gmail.com', '03171008760', 'hh', 'hh'),
(4, '2020-04-22 09:05:45', 'Ashhad', 'zain@gmail.com', '03171008760', 'hh', 'hh'),
(5, '2020-04-22 09:06:24', 'Ashhad', 'zain@gmail.com', '03171008760', 'hh', 'hh'),
(6, '2020-04-22 09:07:50', 'Ashhad', 'zain@gmail.com', '03171008760', 'hh', 'hh'),
(7, '2020-04-22 09:13:47', 'Ashhad', 'zain@gmail.com', '03171008760', 'hh', 'hh'),
(8, '2009-05-22 11:37:03', 'Rana', 'rana1@gmail.com', '6789', 'we are', 'hope you aRE FINE'),
(9, '2014-05-22 11:51:23', 'aa', 'aa@j', '09', 'aa', 'gsghgdh');

-- --------------------------------------------------------

--
-- Table structure for table `tbl_dop`
--

CREATE TABLE `tbl_dop` (
  `DOP_ID` int(11) NOT NULL,
  `DOP_NAME` varchar(70) NOT NULL,
  `STATUS_ID` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

-- --------------------------------------------------------

--
-- Table structure for table `tbl_gallery`
--

CREATE TABLE `tbl_gallery` (
  `GAL_ID` int(11) NOT NULL,
  `ITEM_CODE` varchar(70) NOT NULL,
  `GAL_PATH` text NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

-- --------------------------------------------------------

--
-- Table structure for table `tbl_item`
--

CREATE TABLE `tbl_item` (
  `ITEM_CODE` int(11) NOT NULL,
  `ITEM_BCODE` varchar(70) NOT NULL,
  `ITEM_NAME` varchar(70) NOT NULL,
  `ITEM_UNAME` varchar(70) NOT NULL,
  `BRAND_ID` int(11) NOT NULL,
  `CATE_ID` int(11) NOT NULL,
  `CLASS_ID` int(11) DEFAULT NULL,
  `UNIT_ID` int(11) NOT NULL,
  `MAX_QTY` float DEFAULT NULL,
  `SALE_PRICE` float NOT NULL,
  `DISC_RATE` float NOT NULL,
  `DOP_ID` int(11) NOT NULL,
  `DISC_AMT` float NOT NULL,
  `ITEM_DESCP` text NOT NULL,
  `ITEM_IMG` text NOT NULL,
  `STATUS_ID` int(11) NOT NULL,
  `PARTY_CODE` int(11) DEFAULT NULL,
  `CREATED_AT` datetime NOT NULL,
  `ADD_USER_ID` int(11) NOT NULL,
  `ADD_IP_ADDRESS` varchar(70) NOT NULL,
  `ADD_CMP_NAME` varchar(70) NOT NULL,
  `UPDATED_AT` datetime NOT NULL,
  `EDIT_USER_ID` int(11) NOT NULL,
  `EDIT_IP_ADDRESS` varchar(70) NOT NULL,
  `EDIT_CMP_NAME` varchar(70) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `tbl_item`
--

INSERT INTO `tbl_item` (`ITEM_CODE`, `ITEM_BCODE`, `ITEM_NAME`, `ITEM_UNAME`, `BRAND_ID`, `CATE_ID`, `CLASS_ID`, `UNIT_ID`, `MAX_QTY`, `SALE_PRICE`, `DISC_RATE`, `DOP_ID`, `DISC_AMT`, `ITEM_DESCP`, `ITEM_IMG`, `STATUS_ID`, `PARTY_CODE`, `CREATED_AT`, `ADD_USER_ID`, `ADD_IP_ADDRESS`, `ADD_CMP_NAME`, `UPDATED_AT`, `EDIT_USER_ID`, `EDIT_IP_ADDRESS`, `EDIT_CMP_NAME`) VALUES
(9, '', 'Cement', '', 5, 16, 1, 1, 50, 970, 3, 2, 0, '<p>Very Good Product..</p>', 'download (2).jpg', 2, 18, '2019-04-22 11:21:43', 0, 'DESKTOP-FPCU3DB', '142.251.10.147', '2008-05-22 09:20:22', 0, '142.250.180.36', 'DESKTOP-FPCU3DB'),
(10, '', 'Cement', '', 4, 16, 1, 1, 30, 980, 2, 2, 0, '<p>Relaible Product</p>', 'opc-1-212x300 (1).png', 1, 21, '2020-04-22 07:48:09', 0, 'DESKTOP-FPCU3DB', '142.250.181.36', '2020-04-22 07:51:13', 0, 'DESKTOP-FPCU3DB', '142.250.181.36'),
(15, '', 'Cement', '', 4, 16, 1, 1, 500, 900, 0, 2, 0, '<p>good</p>', 'opc-1-212x300.png', 1, 24, '2011-05-22 07:28:15', 0, 'DESKTOP-FPCU3DB', '142.250.181.4', '2011-05-22 07:28:15', 0, 'DESKTOP-FPCU3DB', '142.250.181.4'),
(16, '', 'Cement', '', 5, 17, 1, 1, 100, 950, 0, 2, 0, '', 'download (2).jpg', 1, 23, '2011-05-22 07:33:51', 0, 'DESKTOP-FPCU3DB', '142.250.181.132', '2011-05-22 07:35:49', 0, '142.250.181.132', 'DESKTOP-FPCU3DB');

-- --------------------------------------------------------

--
-- Table structure for table `tbl_item_gallery`
--

CREATE TABLE `tbl_item_gallery` (
  `GID` int(11) NOT NULL,
  `ITEM_CODE` int(11) NOT NULL,
  `GL_IMG` text NOT NULL,
  `CREATED_AT` datetime NOT NULL,
  `UPDATED_AT` datetime NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `tbl_item_gallery`
--

INSERT INTO `tbl_item_gallery` (`GID`, `ITEM_CODE`, `GL_IMG`, `CREATED_AT`, `UPDATED_AT`) VALUES
(1, 7, 'themeforest-icon.png', '2003-04-22 02:25:06', '2003-04-22 02:25:06'),
(2, 7, 'woothemes-icon.png', '2003-04-22 02:25:06', '2003-04-22 02:25:06'),
(3, 7, 'wpmu-icon.png', '2003-04-22 02:25:06', '2003-04-22 02:25:06'),
(4, 8, 'Background2.jpg', '2010-04-22 10:21:30', '2010-04-22 10:21:30'),
(5, 8, 'Thanos_Bg.jpeg', '2010-04-22 10:21:30', '2010-04-22 10:21:30'),
(6, 9, 'images.jpg', '2019-04-22 11:21:43', '2019-04-22 11:21:43'),
(7, 9, 'product-250x250.jpeg', '2019-04-22 11:21:43', '2019-04-22 11:21:43'),
(8, 11, 'WhatsApp Image 2022-04-30 at 7.44.35 PM.jpeg', '2003-05-22 12:42:02', '2003-05-22 12:42:02'),
(9, 11, 'slide-1-removebg-preview.png', '2003-05-22 12:42:02', '2003-05-22 12:42:02');

-- --------------------------------------------------------

--
-- Table structure for table `tbl_order_detail`
--

CREATE TABLE `tbl_order_detail` (
  `ORDER_DID` int(11) NOT NULL,
  `ORDER_MID` int(11) DEFAULT NULL,
  `ITEM_CODE` int(11) NOT NULL,
  `TITLE` varchar(100) NOT NULL,
  `UNIT_PRICE` float NOT NULL,
  `QTY` float NOT NULL,
  `TOTAL_PRICE` float NOT NULL,
  `PARTY_CODE` int(11) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `tbl_order_detail`
--

INSERT INTO `tbl_order_detail` (`ORDER_DID`, `ORDER_MID`, `ITEM_CODE`, `TITLE`, `UNIT_PRICE`, `QTY`, `TOTAL_PRICE`, `PARTY_CODE`) VALUES
(1, 1, 7, 'Pipe Fitting', 1000, 3, 3000, 1),
(2, 2, 4, 'Pipe Fittig', 30, 3, 90, 1),
(3, 2, 2, 'steel', 10000, 2, 20000, 1),
(4, 3, 8, 'Pipe', 10000, 3, 30000, 1),
(5, 3, 2, 'STEEL', 10000, 3, 30000, 2),
(7, 4, 3, 'sand', 10000, 1, 10000, 1),
(9, 6, 9, 'Cement', 970, 20, 19400, 18),
(11, 8, 9, 'Cement', 970, 10, 9700, 18),
(12, 8, 10, 'Cement', 980, 10, 9800, 21),
(13, 9, 14, 'Cement', 60, 9, 540, 24),
(14, 10, 10, 'Cement', 980, 30, 29400, 21),
(15, 11, 10, 'Cement', 980, 30, 29400, 21),
(16, 12, 13, 'WHITE CEMENT', 900, 40, 36000, 21),
(17, 13, 10, 'Cement', 980, 30, 29400, 21),
(18, 14, 10, 'Cement', 980, 30, 29400, 21),
(19, 15, 10, 'Cement', 980, 30, 29400, 21),
(20, 15, 16, 'Cement', 950, 100, 95000, 23),
(21, 16, 10, 'Cement', 980, 30, 29400, 21),
(22, 17, 16, 'Cement', 950, 97, 92150, 23),
(23, 18, 15, 'Cement', 900, 100, 90000, 24),
(24, 19, 10, 'Cement', 980, 30, 29400, 21),
(25, 20, 10, 'Cement', 980, 30, 29400, 21),
(26, 21, 10, 'Cement', 980, 50, 49000, 21),
(27, 22, 10, 'Cement', 980, 40, 39200, 21),
(28, 23, 10, 'Cement', 980, 70, 68600, 21),
(29, 24, 15, 'Cement', 900, 500, 450000, 24),
(30, 25, 15, 'Cement', 900, 502, 451800, 24);

-- --------------------------------------------------------

--
-- Table structure for table `tbl_order_master`
--

CREATE TABLE `tbl_order_master` (
  `ORDER_ID` int(11) NOT NULL,
  `CUS_ID` int(11) DEFAULT NULL,
  `SUB_TOTAL` float DEFAULT NULL,
  `CHARGES` float DEFAULT NULL,
  `GRAND_TOTAL` float DEFAULT NULL,
  `ORDER_STATUS` int(11) DEFAULT NULL,
  `PAYMENT_TYPE` int(11) DEFAULT NULL,
  `MESSAGE` text DEFAULT NULL,
  `CREATED_AT` datetime DEFAULT NULL,
  `UPDATED_AT` datetime DEFAULT NULL,
  `gst` int(250) NOT NULL,
  `gst_amount` double DEFAULT NULL,
  `final_amount` double DEFAULT NULL,
  `area_name` text DEFAULT NULL,
  `status` varchar(25) DEFAULT 'Pending',
  `payment_mode` text DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `tbl_order_master`
--

INSERT INTO `tbl_order_master` (`ORDER_ID`, `CUS_ID`, `SUB_TOTAL`, `CHARGES`, `GRAND_TOTAL`, `ORDER_STATUS`, `PAYMENT_TYPE`, `MESSAGE`, `CREATED_AT`, `UPDATED_AT`, `gst`, `gst_amount`, `final_amount`, `area_name`, `status`, `payment_mode`) VALUES
(1, 2, 3000, 1000, 4000, 2, 1, 'asdasd', '2010-04-22 12:06:38', '2011-04-22 10:15:08', 0, NULL, NULL, NULL, 'Pending', NULL),
(2, 4, 20090, 1000, 21090, 2, 1, 'Are u sure want to order accpet', '2010-04-22 06:05:30', '2012-04-22 08:25:53', 0, NULL, NULL, NULL, 'Pending', NULL),
(3, 2, 30000, 1000, 31000, 2, 1, 'Order dEliver', '2010-04-22 10:27:36', '2010-04-22 10:28:37', 0, NULL, NULL, NULL, 'Pending', NULL),
(7, 19, 9700, 1000, 10700, 1, 1, '', '2019-04-22 11:25:27', '2020-04-22 08:18:02', 0, NULL, NULL, NULL, 'Pending', NULL),
(9, 26, 540, 1000, 1540, 2, 1, 'i am very hot', '2009-05-22 12:10:30', '2009-05-22 12:12:59', 0, NULL, NULL, NULL, 'Pending', NULL),
(11, 19, 29400, 1000, 30400, 0, 1, '', '2010-05-22 07:09:55', '2010-05-22 07:09:55', 0, NULL, NULL, NULL, 'Pending', NULL),
(12, 19, 36000, 1000, 37000, 0, 1, '', '2010-05-22 08:18:01', '2010-05-22 08:18:01', 0, NULL, NULL, NULL, 'Pending', NULL),
(13, 1, 29400, 1000, 30400, 1, 1, '', '2010-05-22 08:24:47', '2013-05-22 01:31:09', 0, NULL, NULL, NULL, 'Pending', NULL),
(14, 19, 29400, 1000, 30400, 0, 1, '', '2010-05-22 08:25:53', '2010-05-22 08:25:53', 0, NULL, NULL, NULL, 'Pending', NULL),
(15, 19, 124400, 1000, 125400, 1, 1, '', '2011-05-22 08:44:52', '2012-05-22 07:48:21', 0, NULL, NULL, NULL, 'Pending', NULL),
(16, 18, 29400, 1000, 30400, 0, 1, 'sfdsdfsdf', '2012-05-22 08:07:41', '2012-05-22 08:07:41', 0, 5168, 35568, NULL, 'Pending', NULL),
(17, 19, 92150, 1000, 93150, 0, 1, '', '2013-05-22 01:23:45', '2013-05-22 01:23:45', 0, 15835.5, 108985.5, NULL, 'Pending', NULL),
(18, 19, 90000, 1000, 91000, 0, 1, '', '2014-05-22 11:59:05', '2014-05-22 11:59:05', 0, NULL, NULL, NULL, 'Pending', NULL),
(19, 29, 29400, 1000, 30400, 2, 1, 'Loren Ipsum', '2018-05-22 07:52:53', '2018-05-22 07:52:53', 0, 5168, 35568, NULL, 'Pending', NULL),
(20, 31, 29400, 1000, 30400, 1, 1, 'asfasf', '2025-05-22 05:49:32', '2025-05-22 05:49:32', 0, 5168, 35568, 'Gulshan e Iqbal', 'Pending', NULL),
(21, 31, 49000, 1000, 50000, 1, 1, 'afsdfsa', '2025-05-22 07:38:08', '2025-05-22 07:38:08', 0, 8500, 58500, 'Gulshan e Iqbal', 'On Way', NULL),
(22, 31, 39200, 1000, 40200, 2, 1, 'SAdfsad', '2025-05-22 07:47:37', '2025-05-22 07:47:37', 0, 6834, 47034, 'Gulshan e Iqbal', 'Complete', NULL),
(23, 31, 68600, 1000, 69600, 1, 1, 'afsf', '2025-05-22 08:01:10', '2025-05-22 08:01:10', 0, 11832, 81432, 'Gulshan e Iqbal', 'Accepted', NULL),
(24, 31, 450000, 800, 451000, 1, 1, 'dsds', '2010-06-22 08:03:26', '2010-06-22 08:03:26', 0, 76670, 527670, 'Gulshan e Iqbal', 'Accepted', 'Cash On Delivery'),
(25, 31, 451800, 900, 452800, 1, 1, 'sdfgsdgfdsg', '2010-06-22 10:28:57', '2010-06-22 10:28:57', 0, 76976, 529776, 'Gulshan e Iqbal', 'Accepted', 'Cash On Delivery');

-- --------------------------------------------------------

--
-- Table structure for table `tbl_party_list`
--

CREATE TABLE `tbl_party_list` (
  `PARTY_CODE` int(11) NOT NULL,
  `PARTY_NAME` varchar(100) DEFAULT NULL,
  `PARTY_EMAIL` varchar(50) DEFAULT NULL,
  `PARTY_PASWD` varchar(50) DEFAULT NULL,
  `PARTY_NUM1` varchar(50) DEFAULT NULL,
  `PARTY_NUM2` varchar(50) DEFAULT NULL,
  `ACT_CODE` int(11) DEFAULT NULL,
  `PNATURE_CODE` int(11) DEFAULT NULL,
  `PARTY_ADDRESS` text DEFAULT NULL,
  `STATUS_ID` int(11) NOT NULL,
  `CREATED_AT` datetime NOT NULL,
  `ADD_IP_ADDRESS` varchar(50) NOT NULL,
  `ADD_CMP_NAME` varchar(50) NOT NULL,
  `UPDATED_AT` datetime NOT NULL,
  `EDIT_IP_ADDRESS` varchar(50) NOT NULL,
  `EDIT_CMP_NAME` varchar(50) NOT NULL,
  `read_status` varchar(10) NOT NULL DEFAULT 'NotRead',
  `area_name` text DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `tbl_party_list`
--

INSERT INTO `tbl_party_list` (`PARTY_CODE`, `PARTY_NAME`, `PARTY_EMAIL`, `PARTY_PASWD`, `PARTY_NUM1`, `PARTY_NUM2`, `ACT_CODE`, `PNATURE_CODE`, `PARTY_ADDRESS`, `STATUS_ID`, `CREATED_AT`, `ADD_IP_ADDRESS`, `ADD_CMP_NAME`, `UPDATED_AT`, `EDIT_IP_ADDRESS`, `EDIT_CMP_NAME`, `read_status`, `area_name`) VALUES
(18, 'Muhammad Sarib', 'sarib@gmail.com', '12345', '3456', NULL, NULL, 1, 'dfdf', 1, '2019-04-22 11:19:15', '142.251.10.147', 'DESKTOP-FPCU3DB', '2019-04-22 11:19:15', '142.251.10.147', 'DESKTOP-FPCU3DB', 'Read', NULL),
(19, 'Rehman', 'rehman@gmail.com', '12345', '123', NULL, NULL, 2, 'house', 1, '2019-04-22 11:24:04', '142.251.10.105', 'DESKTOP-FPCU3DB', '2019-04-22 11:24:04', '142.251.10.105', 'DESKTOP-FPCU3DB', 'Read', NULL),
(20, 'Mubeen', 'mubeen@gmail.com', '12345', '23456', NULL, NULL, 3, NULL, 1, '2019-04-22 11:26:26', '142.251.10.105', 'DESKTOP-FPCU3DB', '2019-04-22 11:26:26', '142.251.10.105', 'DESKTOP-FPCU3DB', 'Read', NULL),
(21, 'Abdul', 'abdul@gmail.com', '12345', '12345678', NULL, NULL, 1, NULL, 1, '2020-04-22 07:45:52', '142.250.181.36', 'DESKTOP-FPCU3DB', '2020-04-22 07:45:52', '142.250.181.36', 'DESKTOP-FPCU3DB', 'Read', NULL),
(22, 'shah', 'shah@gmail.com', '12345', '2345566', NULL, NULL, 3, NULL, 1, '2020-04-22 08:13:48', '142.250.181.4', 'DESKTOP-FPCU3DB', '2020-04-22 08:13:48', '142.250.181.4', 'DESKTOP-FPCU3DB', 'Read', NULL),
(23, 'ahmed', 'ahmed@gmail.com', '12345', '2345', NULL, NULL, 1, NULL, 1, '2021-04-22 09:54:17', '173.194.76.104', 'DESKTOP-FPCU3DB', '2021-04-22 09:54:17', '173.194.76.104', 'DESKTOP-FPCU3DB', 'Read', NULL),
(24, 'Vendor', 'rana@gmail.com', '12345', '03171008760', NULL, NULL, 1, NULL, 1, '2009-05-22 11:40:51', '142.250.181.68', 'DESKTOP-FPCU3DB', '2009-05-22 11:40:51', '142.250.181.68', 'DESKTOP-FPCU3DB', 'Read', NULL),
(25, 'transporter', 'transpo@gmail.com', '12345', '03171008760', NULL, NULL, 3, NULL, 1, '2009-05-22 11:44:40', '142.250.181.68', 'DESKTOP-FPCU3DB', '2009-05-22 11:44:40', '142.250.181.68', 'DESKTOP-FPCU3DB', 'Read', NULL),
(27, 'abdullah', 'abdullah@gmail.com', '12345', '34568', NULL, NULL, 1, NULL, 1, '2011-05-22 12:15:44', '142.250.181.68', 'DESKTOP-FPCU3DB', '2011-05-22 12:15:44', '142.250.181.68', 'DESKTOP-FPCU3DB', 'Read', NULL),
(28, 'ammad', 'ammad@gmail.com', '12345', '2789', NULL, NULL, 3, NULL, 1, '2011-05-22 12:16:36', '142.250.181.68', 'DESKTOP-FPCU3DB', '2011-05-22 12:16:36', '142.250.181.68', 'DESKTOP-FPCU3DB', 'Read', NULL),
(29, 'saeed', 'saeed@GMAIL.COM', '12345', '8412', NULL, NULL, 2, 'Memon Nagar Sector 15A1', 1, '2011-05-22 12:17:36', '142.250.181.68', 'DESKTOP-FPCU3DB', '2011-05-22 12:17:36', '142.250.181.68', 'DESKTOP-FPCU3DB', 'Read', NULL),
(31, 'Muhammad Ibrahim', 'h.ibrahimayub@gmail.com', '0324ahmed', '03152916066', NULL, NULL, 2, 'gulshan e iqbal karachi', 1, '2025-05-22 05:40:56', '142.250.181.132', 'DESKTOP-S160IA8', '2025-05-22 05:40:56', '142.250.181.132', 'DESKTOP-S160IA8', 'Read', NULL),
(32, 'Ahsen Warind', 'ahsenwarind92@gmail.com', '12345', '33323906886', NULL, NULL, 3, NULL, 1, '2025-05-22 05:55:00', '142.250.181.132', 'DESKTOP-S160IA8', '2025-05-22 05:55:00', '142.250.181.132', 'DESKTOP-S160IA8', 'Read', 'Gulshan e Iqbal');

-- --------------------------------------------------------

--
-- Table structure for table `tbl_review`
--

CREATE TABLE `tbl_review` (
  `review_id` int(11) NOT NULL,
  `product_id` int(11) DEFAULT NULL,
  `uname` text DEFAULT NULL,
  `urating` text DEFAULT NULL,
  `ureview` text DEFAULT NULL,
  `r_date` date DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `tbl_review`
--

INSERT INTO `tbl_review` (`review_id`, `product_id`, `uname`, `urating`, `ureview`, `r_date`) VALUES
(1, 9, 'Muhammad Ibrahin', '4', 'This product is to awesome i build my house ..this quality is aweosme', '2022-05-26'),
(2, 9, 'Muhammad Ahsen', '5', 'Amazing  & really good quality products', '2022-05-26'),
(3, 10, 'Muhammad Ibrahim', '4', 'This product is to awesome i build my house ..this quality is aweosme', '2022-06-11'),
(4, 10, 'yousuf patel', '3', 'Amazing  & really good quality products', '2022-06-11');

-- --------------------------------------------------------

--
-- Table structure for table `tbl_role`
--

CREATE TABLE `tbl_role` (
  `ROLE_ID` int(11) NOT NULL,
  `ROLE_NAME` varchar(50) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `tbl_role`
--

INSERT INTO `tbl_role` (`ROLE_ID`, `ROLE_NAME`) VALUES
(1, 'Admin'),
(2, 'User');

-- --------------------------------------------------------

--
-- Table structure for table `tbl_status`
--

CREATE TABLE `tbl_status` (
  `STATUS_ID` int(11) NOT NULL,
  `STATUS_NAME` varchar(20) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `tbl_status`
--

INSERT INTO `tbl_status` (`STATUS_ID`, `STATUS_NAME`) VALUES
(1, 'Active'),
(2, 'InActive');

-- --------------------------------------------------------

--
-- Table structure for table `tbl_transpoter_order`
--

CREATE TABLE `tbl_transpoter_order` (
  `TO_ID` int(11) NOT NULL,
  `ORDER_MID` int(11) DEFAULT NULL,
  `PARTY_CODE` int(11) DEFAULT NULL,
  `VEH_CODE` int(11) DEFAULT NULL,
  `CHARGES` float DEFAULT NULL,
  `TO_STATUS` int(11) DEFAULT NULL,
  `CREATED_AT` datetime NOT NULL,
  `UPDATED_AT` datetime NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `tbl_transpoter_order`
--

INSERT INTO `tbl_transpoter_order` (`TO_ID`, `ORDER_MID`, `PARTY_CODE`, `VEH_CODE`, `CHARGES`, `TO_STATUS`, `CREATED_AT`, `UPDATED_AT`) VALUES
(1, 3, 3, 1, 1000, 1, '2011-04-22 04:28:40', '2011-04-22 07:43:36'),
(2, 1, 3, 1, 1000, 1, '2011-04-22 10:15:34', '2011-04-22 10:16:36'),
(3, 5, 3, 1, 1000, 1, '2012-04-22 01:48:38', '2012-04-22 01:50:54'),
(4, 2, 20, 1, 1000, 1, '2019-04-22 11:31:30', '2019-04-22 11:33:16'),
(5, 7, 20, 2, 2000, 1, '2020-04-22 08:18:41', '2020-04-22 08:19:31'),
(6, 9, 25, 4, 900, 1, '2009-05-22 12:13:37', '2009-05-22 12:15:15'),
(7, 8, 25, NULL, 1000, 0, '2010-05-22 09:45:15', '2010-05-22 09:45:15'),
(8, 0, 20, NULL, 1000, 0, '2010-05-22 10:47:58', '2010-05-22 10:47:58'),
(9, 10, 25, 4, 1000, 1, '2010-05-22 10:50:11', '2013-05-22 01:26:42'),
(10, 10, 25, 4, 1000, 1, '2010-05-22 07:02:59', '2013-05-22 01:26:42'),
(11, 10, 25, 4, 1000, 1, '2010-05-22 07:10:25', '2013-05-22 01:26:42'),
(12, 10, 25, 4, 1000, 1, '2011-05-22 08:46:10', '2013-05-22 01:26:42'),
(13, 10, 25, 4, 1000, 1, '2011-05-22 08:52:43', '2013-05-22 01:26:42'),
(14, 6, 25, NULL, 1000, 0, '2011-05-22 08:53:47', '2011-05-22 08:53:47'),
(15, 6, 25, NULL, 1000, 0, '2011-05-22 08:56:06', '2011-05-22 08:56:06'),
(16, 13, 25, NULL, 1000, 0, '2012-05-22 08:22:19', '2012-05-22 08:22:19'),
(17, 13, 25, NULL, 1000, 0, '2012-05-22 08:22:46', '2012-05-22 08:22:46'),
(18, 13, 25, NULL, 2000, 0, '2013-05-22 01:24:38', '2013-05-22 01:24:38'),
(19, 13, 25, NULL, 1000, 0, '2013-05-22 01:29:32', '2013-05-22 01:29:32'),
(20, 19, 25, 2, 1000, 1, '2018-05-22 08:11:32', '2018-05-22 08:12:21'),
(21, 21, 32, 1, 1000, 1, '2025-05-22 07:39:25', '2025-05-22 07:42:35'),
(22, 22, 32, 2, 1000, 3, '2025-05-22 07:48:12', '2025-05-22 07:56:19'),
(23, 23, 32, NULL, 1000, 0, '2025-05-22 08:01:59', '2025-05-22 08:01:59'),
(24, 24, 32, NULL, 800, 0, '2010-06-22 08:05:38', '2010-06-22 08:05:38'),
(25, 25, 32, NULL, 900, 0, '2010-06-22 11:50:44', '2010-06-22 11:50:44');

-- --------------------------------------------------------

--
-- Table structure for table `tbl_unit`
--

CREATE TABLE `tbl_unit` (
  `ID` int(11) NOT NULL,
  `NAME` varchar(70) NOT NULL,
  `STATUS_ID` int(11) NOT NULL,
  `CREATED_AT` datetime NOT NULL,
  `ADD_USER_ID` int(11) NOT NULL,
  `ADD_IP_ADDRESS` varchar(70) NOT NULL,
  `ADD_CMP_NAME` varchar(70) NOT NULL,
  `UPDATED_AT` datetime NOT NULL,
  `EDIT_USER_ID` int(11) NOT NULL,
  `EDIT_IP_ADDRESS` varchar(70) NOT NULL,
  `EDIT_CMP_NAME` varchar(70) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `tbl_unit`
--

INSERT INTO `tbl_unit` (`ID`, `NAME`, `STATUS_ID`, `CREATED_AT`, `ADD_USER_ID`, `ADD_IP_ADDRESS`, `ADD_CMP_NAME`, `UPDATED_AT`, `EDIT_USER_ID`, `EDIT_IP_ADDRESS`, `EDIT_CMP_NAME`) VALUES
(1, 'KG', 1, '0000-00-00 00:00:00', 0, '', '', '0000-00-00 00:00:00', 0, '', ''),
(2, 'Ton', 1, '0000-00-00 00:00:00', 0, '', '', '0000-00-00 00:00:00', 0, '', ''),
(3, 'PCS', 1, '0000-00-00 00:00:00', 0, '', '', '0000-00-00 00:00:00', 0, '', ''),
(4, 'dozen', 1, '0000-00-00 00:00:00', 0, '', '', '0000-00-00 00:00:00', 0, '', '');

-- --------------------------------------------------------

--
-- Table structure for table `tbl_user`
--

CREATE TABLE `tbl_user` (
  `U_CODE` int(11) NOT NULL,
  `U_NAME` varchar(100) NOT NULL,
  `ROLE_ID` int(11) NOT NULL,
  `U_PASSWORD` varchar(50) NOT NULL,
  `U_EMAIL` varchar(50) NOT NULL,
  `STATUS_ID` int(11) DEFAULT NULL,
  `CREATED_AT` datetime NOT NULL,
  `ADD_IP_ADDRESS` varchar(50) NOT NULL,
  `ADD_CMP_NAME` varchar(50) NOT NULL,
  `UPDATED_AT` datetime NOT NULL,
  `EDIT_IP_ADDRESS` varchar(50) NOT NULL,
  `EDIT_CMP_NAME` varchar(50) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `tbl_user`
--

INSERT INTO `tbl_user` (`U_CODE`, `U_NAME`, `ROLE_ID`, `U_PASSWORD`, `U_EMAIL`, `STATUS_ID`, `CREATED_AT`, `ADD_IP_ADDRESS`, `ADD_CMP_NAME`, `UPDATED_AT`, `EDIT_IP_ADDRESS`, `EDIT_CMP_NAME`) VALUES
(1, 'sarib', 1, '12345', 'sarib@gmail.com', 1, '0000-00-00 00:00:00', '', '', '2008-05-22 08:31:15', '', 'OWAIS-LAPTOP'),
(4, 'admin', 1, '12345', 'rehman1992.ri@gmail.com', 1, '2022-04-20 08:27:50', '', '', '2022-04-20 08:27:50', '', ''),
(5, 'Owais Khan', 2, '12345', 'owais@gmail.com', 1, '2008-05-22 07:40:58', '216.58.209.132', 'DESKTOP-FPCU3DB', '2008-05-22 07:40:58', '216.58.209.132', 'DESKTOP-FPCU3DB'),
(6, 'Saad', 2, '12345', 'saad12@gmail.com', 1, '2009-05-22 02:55:25', '142.250.181.68', 'DESKTOP-FPCU3DB', '2009-05-22 02:55:38', '142.250.181.68', 'DESKTOP-FPCU3DB');

-- --------------------------------------------------------

--
-- Table structure for table `tbl_vehicle`
--

CREATE TABLE `tbl_vehicle` (
  `VEH_CODE` int(11) NOT NULL,
  `PARTY_CODE` int(11) NOT NULL,
  `PNATURE_CODE` int(11) NOT NULL,
  `VEH_NAME` varchar(50) NOT NULL,
  `VEH_COMP_CODE` int(11) NOT NULL,
  `VEH_CAT_CODE` int(11) NOT NULL,
  `VEH_NO` varchar(50) NOT NULL,
  `VEH_ENG_NO` varchar(50) NOT NULL,
  `VEH_CHECHIS_NO` varchar(50) NOT NULL,
  `VEH_IMG` text DEFAULT NULL,
  `PKMR` float DEFAULT NULL,
  `STANDARD_RATE` float DEFAULT NULL,
  `VEH_DESCP` text DEFAULT NULL,
  `STATUS_ID` int(11) NOT NULL,
  `APRV_ID` int(11) NOT NULL,
  `CREATED_AT` datetime NOT NULL,
  `ADD_IP_ADDRESS` varchar(50) NOT NULL,
  `ADD_CMP_NAME` varchar(50) NOT NULL,
  `UPDATED_AT` datetime NOT NULL,
  `EDIT_IP_ADDRESS` varchar(50) NOT NULL,
  `EDIT_CMP_NAME` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `tbl_vehicle`
--

INSERT INTO `tbl_vehicle` (`VEH_CODE`, `PARTY_CODE`, `PNATURE_CODE`, `VEH_NAME`, `VEH_COMP_CODE`, `VEH_CAT_CODE`, `VEH_NO`, `VEH_ENG_NO`, `VEH_CHECHIS_NO`, `VEH_IMG`, `PKMR`, `STANDARD_RATE`, `VEH_DESCP`, `STATUS_ID`, `APRV_ID`, `CREATED_AT`, `ADD_IP_ADDRESS`, `ADD_CMP_NAME`, `UPDATED_AT`, `EDIT_IP_ADDRESS`, `EDIT_CMP_NAME`) VALUES
(1, 3, 3, 'SUZUKI', 1, 2, '091', '12314', '12345', 'logo.png', 56, 1000, 'suzki is the best suzi', 1, 0, '2005-04-22 07:33:46', '142.250.75.228', 'OWAIS-LAPTOP', '2011-04-22 06:48:41', '142.250.179.100', 0),
(2, 20, 3, 'Truck', 1, 2, '5423', 'E-4532', 'C-56743', 'download.jpg', 100, 1000, 'deliver on time', 1, 0, '2019-04-22 11:29:42', '172.217.194.106', 'DESKTOP-FPCU3DB', '2019-04-22 11:29:42', '172.217.194.106', 0),
(3, 22, 3, 'Truck', 1, 2, '5423', 'E-4532', 'C-56743', '', 120, 2000, '', 1, 0, '2020-04-22 08:15:04', '142.250.181.4', 'DESKTOP-FPCU3DB', '2020-04-22 08:15:04', '142.250.181.4', 0),
(4, 25, 3, 'suzuki', 1, 2, '0967', 'E-6549', 'C-6320', '', 90, 800, '', 1, 0, '2009-05-22 11:51:50', '142.250.181.68', 'DESKTOP-FPCU3DB', '2009-05-22 12:06:14', '142.250.181.68', 0),
(5, 28, 3, 'suzuki', 1, 2, '0967', 'E-4532', 'C-6320', 'download.jpg', 2000, 120, '', 1, 0, '2011-05-22 07:37:49', '142.250.181.4', 'DESKTOP-FPCU3DB', '2011-05-22 07:37:49', '142.250.181.4', 0);

-- --------------------------------------------------------

--
-- Table structure for table `tbl_veh_category`
--

CREATE TABLE `tbl_veh_category` (
  `ID` int(11) NOT NULL,
  `NAME` varchar(50) DEFAULT NULL,
  `STATUS_ID` int(11) DEFAULT NULL,
  `CREATED_AT` datetime DEFAULT NULL,
  `ADD_USER_ID` int(11) DEFAULT NULL,
  `ADD_IP_ADDRESS` varchar(70) DEFAULT NULL,
  `ADD_CMP_NAME` varchar(70) DEFAULT NULL,
  `UPDATED_AT` datetime DEFAULT NULL,
  `EDIT_USER_ID` int(11) DEFAULT NULL,
  `EDIT_IP_ADDRESS` varchar(70) DEFAULT NULL,
  `EDIT_CMP_NAME` varchar(70) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `tbl_veh_category`
--

INSERT INTO `tbl_veh_category` (`ID`, `NAME`, `STATUS_ID`, `CREATED_AT`, `ADD_USER_ID`, `ADD_IP_ADDRESS`, `ADD_CMP_NAME`, `UPDATED_AT`, `EDIT_USER_ID`, `EDIT_IP_ADDRESS`, `EDIT_CMP_NAME`) VALUES
(2, 'suzuki', 1, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL);

-- --------------------------------------------------------

--
-- Table structure for table `tbl_veh_company`
--

CREATE TABLE `tbl_veh_company` (
  `ID` int(11) NOT NULL,
  `NAME` varchar(50) DEFAULT NULL,
  `STATUS_ID` int(11) DEFAULT NULL,
  `CREATED_AT` datetime DEFAULT NULL,
  `ADD_USER_ID` int(11) DEFAULT NULL,
  `ADD_IP_ADDRESS` varchar(70) DEFAULT NULL,
  `ADD_CMP_NAME` varchar(70) DEFAULT NULL,
  `UPDATED_AT` datetime DEFAULT NULL,
  `EDIT_USER_ID` int(11) DEFAULT NULL,
  `EDIT_IP_ADDRESS` varchar(70) DEFAULT NULL,
  `EDIT_CMP_NAME` varchar(70) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `tbl_veh_company`
--

INSERT INTO `tbl_veh_company` (`ID`, `NAME`, `STATUS_ID`, `CREATED_AT`, `ADD_USER_ID`, `ADD_IP_ADDRESS`, `ADD_CMP_NAME`, `UPDATED_AT`, `EDIT_USER_ID`, `EDIT_IP_ADDRESS`, `EDIT_CMP_NAME`) VALUES
(1, 'Suzuki Co.', 1, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL);

-- --------------------------------------------------------

--
-- Table structure for table `tbl_wishlist`
--

CREATE TABLE `tbl_wishlist` (
  `WISH_ID` int(11) NOT NULL,
  `USER_CODE` varchar(50) DEFAULT NULL,
  `ITEM_CODE` int(11) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `tbl_wishlist`
--

INSERT INTO `tbl_wishlist` (`WISH_ID`, `USER_CODE`, `ITEM_CODE`) VALUES
(8, '19', 15),
(9, '19', 15),
(10, '29', 9),
(11, '1', 10),
(12, '1', 10),
(13, '31', 10),
(14, '31', 10);

--
-- Indexes for dumped tables
--

--
-- Indexes for table `tbl_act_nature`
--
ALTER TABLE `tbl_act_nature`
  ADD PRIMARY KEY (`NATURE_CODE`);

--
-- Indexes for table `tbl_act_type`
--
ALTER TABLE `tbl_act_type`
  ADD PRIMARY KEY (`TYPE_CODE`);

--
-- Indexes for table `tbl_brand`
--
ALTER TABLE `tbl_brand`
  ADD PRIMARY KEY (`ID`);

--
-- Indexes for table `tbl_calculator_itemrate`
--
ALTER TABLE `tbl_calculator_itemrate`
  ADD PRIMARY KEY (`rating_id`);

--
-- Indexes for table `tbl_category`
--
ALTER TABLE `tbl_category`
  ADD PRIMARY KEY (`CAT_ID`);

--
-- Indexes for table `tbl_class`
--
ALTER TABLE `tbl_class`
  ADD PRIMARY KEY (`ID`);

--
-- Indexes for table `tbl_coast_calculator`
--
ALTER TABLE `tbl_coast_calculator`
  ADD PRIMARY KEY (`cost_id`);

--
-- Indexes for table `tbl_color`
--
ALTER TABLE `tbl_color`
  ADD PRIMARY KEY (`ID`);

--
-- Indexes for table `tbl_contact`
--
ALTER TABLE `tbl_contact`
  ADD PRIMARY KEY (`ID`);

--
-- Indexes for table `tbl_dop`
--
ALTER TABLE `tbl_dop`
  ADD PRIMARY KEY (`DOP_ID`);

--
-- Indexes for table `tbl_gallery`
--
ALTER TABLE `tbl_gallery`
  ADD PRIMARY KEY (`GAL_ID`);

--
-- Indexes for table `tbl_item`
--
ALTER TABLE `tbl_item`
  ADD PRIMARY KEY (`ITEM_CODE`);

--
-- Indexes for table `tbl_item_gallery`
--
ALTER TABLE `tbl_item_gallery`
  ADD PRIMARY KEY (`GID`);

--
-- Indexes for table `tbl_order_detail`
--
ALTER TABLE `tbl_order_detail`
  ADD PRIMARY KEY (`ORDER_DID`);

--
-- Indexes for table `tbl_order_master`
--
ALTER TABLE `tbl_order_master`
  ADD PRIMARY KEY (`ORDER_ID`);

--
-- Indexes for table `tbl_party_list`
--
ALTER TABLE `tbl_party_list`
  ADD PRIMARY KEY (`PARTY_CODE`),
  ADD UNIQUE KEY `PARTY_EMAIL` (`PARTY_EMAIL`);

--
-- Indexes for table `tbl_review`
--
ALTER TABLE `tbl_review`
  ADD PRIMARY KEY (`review_id`);

--
-- Indexes for table `tbl_role`
--
ALTER TABLE `tbl_role`
  ADD PRIMARY KEY (`ROLE_ID`);

--
-- Indexes for table `tbl_status`
--
ALTER TABLE `tbl_status`
  ADD PRIMARY KEY (`STATUS_ID`);

--
-- Indexes for table `tbl_transpoter_order`
--
ALTER TABLE `tbl_transpoter_order`
  ADD PRIMARY KEY (`TO_ID`);

--
-- Indexes for table `tbl_unit`
--
ALTER TABLE `tbl_unit`
  ADD PRIMARY KEY (`ID`);

--
-- Indexes for table `tbl_user`
--
ALTER TABLE `tbl_user`
  ADD PRIMARY KEY (`U_CODE`);

--
-- Indexes for table `tbl_vehicle`
--
ALTER TABLE `tbl_vehicle`
  ADD PRIMARY KEY (`VEH_CODE`);

--
-- Indexes for table `tbl_veh_category`
--
ALTER TABLE `tbl_veh_category`
  ADD PRIMARY KEY (`ID`);

--
-- Indexes for table `tbl_veh_company`
--
ALTER TABLE `tbl_veh_company`
  ADD PRIMARY KEY (`ID`);

--
-- Indexes for table `tbl_wishlist`
--
ALTER TABLE `tbl_wishlist`
  ADD PRIMARY KEY (`WISH_ID`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `tbl_act_nature`
--
ALTER TABLE `tbl_act_nature`
  MODIFY `NATURE_CODE` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT for table `tbl_act_type`
--
ALTER TABLE `tbl_act_type`
  MODIFY `TYPE_CODE` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT for table `tbl_brand`
--
ALTER TABLE `tbl_brand`
  MODIFY `ID` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;

--
-- AUTO_INCREMENT for table `tbl_calculator_itemrate`
--
ALTER TABLE `tbl_calculator_itemrate`
  MODIFY `rating_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT for table `tbl_category`
--
ALTER TABLE `tbl_category`
  MODIFY `CAT_ID` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=18;

--
-- AUTO_INCREMENT for table `tbl_class`
--
ALTER TABLE `tbl_class`
  MODIFY `ID` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT for table `tbl_coast_calculator`
--
ALTER TABLE `tbl_coast_calculator`
  MODIFY `cost_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT for table `tbl_color`
--
ALTER TABLE `tbl_color`
  MODIFY `ID` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `tbl_contact`
--
ALTER TABLE `tbl_contact`
  MODIFY `ID` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=10;

--
-- AUTO_INCREMENT for table `tbl_dop`
--
ALTER TABLE `tbl_dop`
  MODIFY `DOP_ID` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `tbl_gallery`
--
ALTER TABLE `tbl_gallery`
  MODIFY `GAL_ID` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `tbl_item`
--
ALTER TABLE `tbl_item`
  MODIFY `ITEM_CODE` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=17;

--
-- AUTO_INCREMENT for table `tbl_item_gallery`
--
ALTER TABLE `tbl_item_gallery`
  MODIFY `GID` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=10;

--
-- AUTO_INCREMENT for table `tbl_order_detail`
--
ALTER TABLE `tbl_order_detail`
  MODIFY `ORDER_DID` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=31;

--
-- AUTO_INCREMENT for table `tbl_order_master`
--
ALTER TABLE `tbl_order_master`
  MODIFY `ORDER_ID` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=26;

--
-- AUTO_INCREMENT for table `tbl_party_list`
--
ALTER TABLE `tbl_party_list`
  MODIFY `PARTY_CODE` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=33;

--
-- AUTO_INCREMENT for table `tbl_review`
--
ALTER TABLE `tbl_review`
  MODIFY `review_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- AUTO_INCREMENT for table `tbl_role`
--
ALTER TABLE `tbl_role`
  MODIFY `ROLE_ID` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT for table `tbl_status`
--
ALTER TABLE `tbl_status`
  MODIFY `STATUS_ID` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT for table `tbl_transpoter_order`
--
ALTER TABLE `tbl_transpoter_order`
  MODIFY `TO_ID` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=26;

--
-- AUTO_INCREMENT for table `tbl_unit`
--
ALTER TABLE `tbl_unit`
  MODIFY `ID` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- AUTO_INCREMENT for table `tbl_user`
--
ALTER TABLE `tbl_user`
  MODIFY `U_CODE` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=7;

--
-- AUTO_INCREMENT for table `tbl_vehicle`
--
ALTER TABLE `tbl_vehicle`
  MODIFY `VEH_CODE` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;

--
-- AUTO_INCREMENT for table `tbl_veh_category`
--
ALTER TABLE `tbl_veh_category`
  MODIFY `ID` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT for table `tbl_veh_company`
--
ALTER TABLE `tbl_veh_company`
  MODIFY `ID` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT for table `tbl_wishlist`
--
ALTER TABLE `tbl_wishlist`
  MODIFY `WISH_ID` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=15;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
