-- phpMyAdmin SQL Dump
-- version 5.2.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Feb 19, 2025 at 04:12 AM
-- Server version: 10.4.32-MariaDB
-- PHP Version: 8.0.30

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `clemenz`
--

-- --------------------------------------------------------

--
-- Table structure for table `back_order_list`
--

CREATE TABLE `back_order_list` (
  `id` int(30) NOT NULL,
  `receiving_id` int(30) NOT NULL,
  `po_id` int(30) NOT NULL,
  `bo_code` varchar(50) NOT NULL,
  `supplier_id` int(30) NOT NULL,
  `amount` float NOT NULL,
  `discount_perc` float NOT NULL DEFAULT 0,
  `discount` float NOT NULL DEFAULT 0,
  `tax_perc` float NOT NULL DEFAULT 0,
  `tax` float NOT NULL DEFAULT 0,
  `remarks` text DEFAULT NULL,
  `status` tinyint(4) NOT NULL DEFAULT 0 COMMENT '0 = pending, 1 = partially received, 2 =received',
  `date_created` datetime NOT NULL DEFAULT current_timestamp(),
  `date_updated` datetime NOT NULL DEFAULT current_timestamp() ON UPDATE current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `back_order_list`
--

INSERT INTO `back_order_list` (`id`, `receiving_id`, `po_id`, `bo_code`, `supplier_id`, `amount`, `discount_perc`, `discount`, `tax_perc`, `tax`, `remarks`, `status`, `date_created`, `date_updated`) VALUES
(1, 1, 1, 'BO-0001', 1, 40740, 3, 1125, 12, 4365, NULL, 1, '2021-11-03 11:20:38', '2021-11-03 11:20:51'),
(2, 2, 1, 'BO-0002', 1, 20370, 3, 562.5, 12, 2182.5, NULL, 2, '2021-11-03 11:20:51', '2021-11-03 11:21:00'),
(3, 4, 2, 'BO-0003', 2, 42826, 5, 2012.5, 12, 4588.5, NULL, 1, '2021-11-03 11:51:41', '2021-11-03 11:52:02'),
(4, 5, 2, 'BO-0004', 2, 10640, 5, 500, 12, 1140, NULL, 2, '2021-11-03 11:52:02', '2021-11-03 11:52:15');

-- --------------------------------------------------------

--
-- Table structure for table `bo_items`
--

CREATE TABLE `bo_items` (
  `bo_id` int(30) NOT NULL,
  `item_id` int(30) NOT NULL,
  `quantity` int(30) NOT NULL,
  `price` float NOT NULL DEFAULT 0,
  `unit` varchar(50) NOT NULL,
  `total` float NOT NULL DEFAULT 0
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `bo_items`
--

INSERT INTO `bo_items` (`bo_id`, `item_id`, `quantity`, `price`, `unit`, `total`) VALUES
(1, 1, 250, 150, 'pcs', 37500),
(2, 1, 125, 150, 'pcs', 18750),
(3, 2, 150, 200, 'Boxes', 30000),
(3, 4, 50, 205, 'pcs', 10250),
(4, 2, 50, 200, 'Boxes', 10000);

-- --------------------------------------------------------

--
-- Table structure for table `category`
--

CREATE TABLE `category` (
  `CATEGORY_ID` int(11) NOT NULL,
  `CNAME` varchar(50) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1 COLLATE=latin1_swedish_ci;

--
-- Dumping data for table `category`
--

INSERT INTO `category` (`CATEGORY_ID`, `CNAME`) VALUES
(0, 'Milktea'),
(1, 'Softdrinks'),
(2, 'Liquior'),
(3, 'UnliFoods'),
(4, 'Grapes'),
(5, 'Billiards'),
(6, 'Pizza'),
(7, 'Coffee'),
(9, 'Others');

-- --------------------------------------------------------

--
-- Table structure for table `customer`
--

CREATE TABLE `customer` (
  `CUST_ID` int(11) NOT NULL,
  `FIRST_NAME` varchar(50) DEFAULT NULL,
  `LAST_NAME` varchar(50) DEFAULT NULL,
  `PHONE_NUMBER` varchar(11) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1 COLLATE=latin1_swedish_ci;

--
-- Dumping data for table `customer`
--

INSERT INTO `customer` (`CUST_ID`, `FIRST_NAME`, `LAST_NAME`, `PHONE_NUMBER`) VALUES
(9, 'Hailee', 'Steinfield', '09394566543'),
(11, 'A Walk in Customer', 'Clemeña', '09533480232'),
(14, 'Chuchay', 'Jusay', '09781633451'),
(15, 'Kimbert', 'Duyag', '09956288467'),
(16, 'Dieqcohr', 'Rufino', '09891344576'),
(17, 'gino', 'clemen', '093223');

-- --------------------------------------------------------

--
-- Table structure for table `employee`
--

CREATE TABLE `employee` (
  `EMPLOYEE_ID` int(11) NOT NULL,
  `FIRST_NAME` varchar(50) DEFAULT NULL,
  `LAST_NAME` varchar(50) DEFAULT NULL,
  `GENDER` varchar(50) DEFAULT NULL,
  `EMAIL` varchar(100) DEFAULT NULL,
  `PHONE_NUMBER` varchar(11) DEFAULT NULL,
  `JOB_ID` int(11) DEFAULT NULL,
  `HIRED_DATE` varchar(50) NOT NULL,
  `LOCATION_ID` int(11) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1 COLLATE=latin1_swedish_ci;

--
-- Dumping data for table `employee`
--

INSERT INTO `employee` (`EMPLOYEE_ID`, `FIRST_NAME`, `LAST_NAME`, `GENDER`, `EMAIL`, `PHONE_NUMBER`, `JOB_ID`, `HIRED_DATE`, `LOCATION_ID`) VALUES
(1, 'john', 'clemz', 'Male', 'admin23@gmail.com', '09124033805', 1, '0000-00-00', 113),
(2, 'clemenz', 'john', 'Male', 'clemenz@yahoo.com', '09091245761', 2, '2025-02-12', 156),
(4, 'jana', 'clemenz', 'Female', 'jana@gmail.com', '09123357105', 1, '2025-02-06', 158),
(5, 'kupal', 'john', 'Male', 'joqu.clemena.coc@phinmaed.com', '09533480232', 4, '2025-02-12', 159);

-- --------------------------------------------------------

--
-- Table structure for table `item_list`
--

CREATE TABLE `item_list` (
  `id` int(30) NOT NULL,
  `name` text NOT NULL,
  `description` text NOT NULL,
  `supplier_id` int(30) NOT NULL,
  `cost` float NOT NULL DEFAULT 0,
  `status` tinyint(1) NOT NULL DEFAULT 1,
  `date_created` datetime NOT NULL DEFAULT current_timestamp(),
  `date_updated` datetime NOT NULL DEFAULT current_timestamp() ON UPDATE current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `item_list`
--

INSERT INTO `item_list` (`id`, `name`, `description`, `supplier_id`, `cost`, `status`, `date_created`, `date_updated`) VALUES
(1, 'Item 101', 'Sample Only', 1, 150, 1, '2021-11-02 10:01:55', '2021-11-02 10:01:55'),
(2, 'Item 102', 'Sample only', 2, 200, 1, '2021-11-02 10:02:12', '2021-11-02 10:02:12'),
(3, 'Item 103', 'Sample', 1, 185, 1, '2021-11-02 10:02:27', '2021-11-02 10:02:27'),
(4, 'Item 104', 'Sample only', 2, 205, 1, '2021-11-02 10:02:47', '2021-11-02 10:02:47');

-- --------------------------------------------------------

--
-- Table structure for table `job`
--

CREATE TABLE `job` (
  `JOB_ID` int(11) NOT NULL,
  `JOB_TITLE` varchar(50) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1 COLLATE=latin1_swedish_ci;

--
-- Dumping data for table `job`
--

INSERT INTO `job` (`JOB_ID`, `JOB_TITLE`) VALUES
(1, 'Manager'),
(2, 'Cashier'),
(3, 'Staff'),
(4, 'Gardener'),
(5, 'Farm Maintenance');

-- --------------------------------------------------------

--
-- Table structure for table `location`
--

CREATE TABLE `location` (
  `LOCATION_ID` int(11) NOT NULL,
  `PROVINCE` varchar(100) DEFAULT NULL,
  `CITY` varchar(100) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1 COLLATE=latin1_swedish_ci;

--
-- Dumping data for table `location`
--

INSERT INTO `location` (`LOCATION_ID`, `PROVINCE`, `CITY`) VALUES
(111, 'Negros Occidental', 'Bacolod City'),
(112, 'Negros Occidental', 'Bacolod City'),
(113, 'Misamis Oriental', 'Cagayan de Oro'),
(114, 'Negros Occidental', 'Himamaylan'),
(115, 'Negros Oriental', 'Dumaguette City'),
(116, 'Negros Occidental', 'Isabella'),
(126, 'Negros Occidental', 'Binalbagan'),
(130, 'Cebu', 'Bogo City'),
(131, 'Negros Occidental', 'Himamaylan'),
(132, 'Negros', 'Jupiter'),
(133, 'Aincrad', 'Floor 91'),
(134, 'negros', 'binalbagan'),
(135, 'hehe', 'tehee'),
(136, 'PLANET YEKOK', 'KOKEY'),
(137, 'Camiguin', 'Catarman'),
(138, 'Camiguin', 'Catarman'),
(139, 'Negros Occidental', 'Binalbagan'),
(140, 'Batangas', 'Lemery'),
(141, 'Capiz', 'Panay'),
(142, 'Camarines Norte', 'Labo'),
(143, 'Camarines Norte', 'Labo'),
(144, 'Camarines Norte', 'Labo'),
(145, 'Camarines Norte', 'Labo'),
(146, 'Capiz', 'Pilar'),
(147, 'Negros Occidental', 'Moises Padilla'),
(148, 'a', 'a'),
(149, '1', '1'),
(150, 'Negros Occidental', 'Himamaylan'),
(151, 'Masbate', 'Mandaon'),
(152, 'Aklanas', 'Madalagsasa'),
(153, 'Batangas', 'Mabini'),
(154, 'Bataan', 'Morong'),
(155, 'Capiz', 'Pillar'),
(156, 'Misamis Oriental', 'Cagayan de Oro'),
(157, 'Camarines Norte', 'Labo'),
(158, 'Misamis Oriental', 'Cagayan de Oro'),
(159, 'Bukidnon', 'Kitaotao');

-- --------------------------------------------------------

--
-- Table structure for table `manager`
--

CREATE TABLE `manager` (
  `FIRST_NAME` varchar(50) DEFAULT NULL,
  `LAST_NAME` varchar(50) DEFAULT NULL,
  `LOCATION_ID` int(11) NOT NULL,
  `EMAIL` varchar(50) DEFAULT NULL,
  `PHONE_NUMBER` varchar(11) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1 COLLATE=latin1_swedish_ci;

--
-- Dumping data for table `manager`
--

INSERT INTO `manager` (`FIRST_NAME`, `LAST_NAME`, `LOCATION_ID`, `EMAIL`, `PHONE_NUMBER`) VALUES
('Prince Ly', 'Cesar', 113, 'PC@00', '09124033805'),
('Emman', 'Adventures', 116, 'emman@', '09123346576'),
('Bruce', 'Willis', 113, 'bruce@', NULL),
('Regine', 'Santos', 111, 'regine@', '09123456789');

-- --------------------------------------------------------

--
-- Table structure for table `po_items`
--

CREATE TABLE `po_items` (
  `po_id` int(30) NOT NULL,
  `item_id` int(30) NOT NULL,
  `quantity` int(30) NOT NULL,
  `price` float NOT NULL DEFAULT 0,
  `unit` varchar(50) NOT NULL,
  `total` float NOT NULL DEFAULT 0
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `po_items`
--

INSERT INTO `po_items` (`po_id`, `item_id`, `quantity`, `price`, `unit`, `total`) VALUES
(1, 1, 500, 150, 'pcs', 75000),
(2, 2, 300, 200, 'Boxes', 60000),
(2, 4, 200, 205, 'pcs', 41000);

-- --------------------------------------------------------

--
-- Table structure for table `product`
--

CREATE TABLE `product` (
  `PRODUCT_ID` int(11) NOT NULL,
  `PRODUCT_CODE` varchar(20) NOT NULL,
  `NAME` varchar(50) DEFAULT NULL,
  `DESCRIPTION` varchar(250) NOT NULL,
  `QTY_STOCK` int(50) DEFAULT NULL,
  `ON_HAND` int(250) NOT NULL,
  `PRICE` int(50) DEFAULT NULL,
  `CATEGORY_ID` int(11) DEFAULT NULL,
  `SUPPLIER_ID` int(11) DEFAULT NULL,
  `DATE_STOCK_IN` varchar(50) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1 COLLATE=latin1_swedish_ci;

--
-- Dumping data for table `product`
--

INSERT INTO `product` (`PRODUCT_ID`, `PRODUCT_CODE`, `NAME`, `DESCRIPTION`, `QTY_STOCK`, `ON_HAND`, `PRICE`, `CATEGORY_ID`, `SUPPLIER_ID`, `DATE_STOCK_IN`) VALUES
(1, '20191001', 'Lenovo ideapad 20059', 'Windows 8', 1, 1, 32999, 7, 15, '2019-03-02'),
(3, '20191003', 'Predator Helios 300 Gaming Laptop', 'Windows 10 Home\r\nIntelÂ® Coreâ„¢ i7-8750H processor Hexa-core 2.20 GHz\r\n15.6\" Full HD (1920 x 1080) ', 1, 1, 77850, 7, 15, '2019-03-02'),
(4, '20191002', 'Newmen E120', 'hehe', 1, 1, 550, 0, 11, '2019-03-02'),
(5, '20191002', 'Newmen E120', 'hehe', 1, 1, 550, 0, 15, '2019-03-03'),
(6, '20191002', 'Newmen E120', 'hehe', 1, 1, 550, 0, 11, '2019-03-04'),
(8, '20191002', 'Newmen E120', 'hehe', 1, 1, 550, 0, 11, '2019-03-05'),
(9, '20191002', 'Newmen E120', 'hehe', 1, 1, 550, 0, 11, '2019-03-04'),
(10, '20191004', 'Fantech EG1', 'BEST FOR MOBILE PHONE GAMERS\r\nSPEAKER:10mm\r\nIMPEDANCE: 18+-15%\r\nFREQUENCY RESPONSE: 20 TO 20khz\r\nMICROPHONE : OMNI DIRECTIONAL\r\nJACK: AUDIO+MICROPHONE\r\nCOMBINED JACK 3.5 WIRE\r\nWIRE LENGTH: 1.3M\r\nWhat in inside:-1 pcs Female 3.5mm to Audio and\r\nmicrop', 1, 1, 859, 6, 13, '2019-03-06'),
(11, '20191004', 'Fantech EG1', 'a', 1, 1, 895, 6, 13, '2019-03-01'),
(12, '20191004', 'Fantech EG1', 'a', 1, 1, 895, 6, 13, '2019-03-01'),
(13, '20191004', 'Fantech EG1', 'a', 1, 1, 895, 6, 13, '2019-03-01'),
(14, '20191002', 'Newmen E120', 'haha', 1, 1, 550, 0, 15, '2019-03-06'),
(15, '20191002', 'Newmen E120', 'haha', 1, 1, 550, 0, 15, '2019-03-06'),
(16, '20191002', 'Newmen E120', 'haha', 1, 1, 550, 0, 15, '2019-03-06'),
(17, '20191002', 'Newmen E120', 'haha', 1, 1, 550, 0, 15, '2019-03-06'),
(18, '20191002', 'Newmen E120', 'haha', 1, 1, 550, 0, 15, '2019-03-06'),
(19, '20191002', 'Newmen E120', 'haha', 1, 1, 550, 0, 15, '2019-03-06'),
(20, '20191002', 'Newmen E120', 'haha', 1, 1, 550, 0, 15, '2019-03-06'),
(21, '20191002', 'Newmen E120', 'haha', 1, 1, 550, 0, 15, '2019-03-06'),
(22, '20191001', 'Lenovo ideapad 20059', 'hehe', 1, 1, 32999, 7, 12, '2019-03-11'),
(23, '20191001', 'Lenovo ideapad 20059', 'hehe', 1, 1, 32999, 7, 12, '2019-03-11'),
(24, '20191001', 'Lenovo ideapad 20059', 'hehe', 1, 1, 32999, 7, 12, '2019-03-11'),
(25, '20191001', 'Lenovo ideapad 20059', 'hehe', 1, 1, 32999, 7, 12, '2019-03-11'),
(26, '20191001', 'Lenovo ideapad 20059', 'hehe', 1, 1, 32999, 7, 12, '2019-03-11'),
(27, '20191005', 'A4tech OP-720', 'normal mouse', 1, 1, 289, 1, 16, '2019-03-13'),
(28, '1', 'mocha', 'dasd', 12, 1, 90, 0, 12, '2025-02-12'),
(29, '1', 'mocha', 'dasd', 1, 1, 90, 0, 12, '2025-02-12'),
(30, '1', 'mocha', 'dasd', 1, 1, 90, 0, 12, '2025-02-12'),
(31, '1', 'mocha', 'dasd', 1, 1, 90, 0, 12, '2025-02-12'),
(32, '1', 'mocha', 'dasd', 1, 1, 90, 0, 12, '2025-02-12'),
(33, '1', 'mocha', 'dasd', 1, 1, 90, 0, 12, '2025-02-12'),
(34, '1', 'mocha', 'dasd', 1, 1, 90, 0, 12, '2025-02-12'),
(35, '1', 'mocha', 'dasd', 1, 1, 90, 0, 12, '2025-02-12'),
(36, '1', 'mocha', 'dasd', 1, 1, 90, 0, 12, '2025-02-12'),
(37, '1', 'mocha', 'dasd', 1, 1, 90, 0, 12, '2025-02-12'),
(38, '1', 'mocha', 'dasd', 1, 1, 90, 0, 12, '2025-02-12'),
(39, '1', 'mocha', 'dasd', 1, 1, 90, 0, 12, '2025-02-12'),
(40, '1', 'mocha', 'dasd', 1, 1, 90, 0, 12, '2025-02-12'),
(41, '1', 'mocha', 'dasd', 1, 1, 90, 0, 12, '2025-02-12'),
(42, '1', 'mocha', 'dasd', 1, 1, 90, 0, 12, '2025-02-12'),
(43, '1', 'mocha', 'dasd', 1, 1, 90, 0, 12, '2025-02-12'),
(44, '1', 'mocha', 'dasd', 1, 1, 90, 0, 12, '2025-02-12'),
(45, '1', 'mocha', 'dasd', 1, 1, 90, 0, 12, '2025-02-12'),
(46, '1', 'mocha', 'dasd', 1, 1, 90, 0, 12, '2025-02-12'),
(47, '1', 'mocha', 'dasd', 1, 1, 90, 0, 12, '2025-02-12'),
(48, '1', 'mocha', 'dasd', 1, 1, 90, 0, 12, '2025-02-12'),
(49, '1', 'mocha', 'dasd', 1, 1, 90, 0, 12, '2025-02-12'),
(50, '1', 'mocha', 'dasd', 1, 1, 90, 0, 12, '2025-02-12'),
(51, '1', 'mocha', 'dasd', 1, 1, 90, 0, 12, '2025-02-12'),
(52, '1', 'mocha', 'dasd', 1, 1, 90, 0, 12, '2025-02-12'),
(53, '1', 'mocha', 'dasd', 1, 1, 90, 0, 12, '2025-02-12'),
(54, '1', 'mocha', 'dasd', 1, 1, 90, 0, 12, '2025-02-12'),
(55, '1', 'mocha', 'dasd', 1, 1, 90, 0, 12, '2025-02-12'),
(56, '1', 'mocha', 'dasd', 1, 1, 90, 0, 12, '2025-02-12'),
(57, '1', 'mocha', 'dasd', 1, 1, 90, 0, 12, '2025-02-12'),
(58, '1', 'mocha', 'dasd', 1, 1, 90, 0, 12, '2025-02-12'),
(59, '1', 'mocha', 'dasd', 1, 1, 90, 0, 12, '2025-02-12'),
(60, '1', 'mocha', 'dasd', 1, 1, 90, 0, 12, '2025-02-12'),
(61, '1', 'mocha', 'dasd', 1, 1, 90, 0, 12, '2025-02-12'),
(62, '1', 'mocha', 'dasd', 1, 1, 90, 0, 12, '2025-02-12'),
(63, '1', 'mocha', 'dasd', 1, 1, 90, 0, 12, '2025-02-12'),
(64, '1', 'mocha', 'dasd', 1, 1, 90, 0, 12, '2025-02-12'),
(65, '1', 'mocha', 'dasd', 1, 1, 90, 0, 12, '2025-02-12'),
(66, '1', 'mocha', 'dasd', 1, 1, 90, 0, 12, '2025-02-12'),
(67, '1', 'mocha', 'dasd', 1, 1, 90, 0, 12, '2025-02-12'),
(68, '1', 'mocha', 'dasd', 1, 1, 90, 0, 12, '2025-02-12'),
(69, '1', 'mocha', 'dasd', 1, 1, 90, 0, 12, '2025-02-12'),
(70, '1', 'mocha', 'dasd', 1, 1, 90, 0, 12, '2025-02-12'),
(71, '1', 'mocha', 'dasd', 1, 1, 90, 0, 12, '2025-02-12'),
(72, '1', 'mocha', 'dasd', 1, 1, 90, 0, 12, '2025-02-12'),
(73, '1', 'mocha', 'dasd', 1, 1, 90, 0, 12, '2025-02-12'),
(74, '1', 'mocha', 'dasd', 1, 1, 90, 0, 12, '2025-02-12'),
(75, '1', 'mocha', 'dasd', 1, 1, 90, 0, 12, '2025-02-12'),
(76, '1', 'mocha', 'dasd', 1, 1, 90, 0, 12, '2025-02-12'),
(77, '1', 'mocha', 'dasd', 1, 1, 90, 0, 12, '2025-02-12'),
(78, '1', 'mocha', 'dasd', 1, 1, 90, 0, 12, '2025-02-12'),
(79, '1', 'mocha', 'dasd', 1, 1, 90, 0, 12, '2025-02-12'),
(80, '1', 'mocha', 'dasd', 1, 1, 90, 0, 12, '2025-02-12'),
(81, '1', 'mocha', 'dasd', 1, 1, 90, 0, 12, '2025-02-12'),
(82, '1', 'mocha', 'dasd', 1, 1, 90, 0, 12, '2025-02-12'),
(83, '1', 'mocha', 'dasd', 1, 1, 90, 0, 12, '2025-02-12'),
(84, '1', 'mocha', 'dasd', 1, 1, 90, 0, 12, '2025-02-12'),
(85, '1', 'mocha', 'dasd', 1, 1, 90, 0, 12, '2025-02-12'),
(86, '1', 'mocha', 'dasd', 1, 1, 90, 0, 12, '2025-02-12'),
(87, '1', 'mocha', 'dasd', 1, 1, 90, 0, 12, '2025-02-12'),
(88, '1', 'mocha', 'dasd', 1, 1, 90, 0, 12, '2025-02-12'),
(89, '1', 'mocha', 'dasd', 1, 1, 90, 0, 12, '2025-02-12'),
(90, '1', 'mocha', 'dasd', 1, 1, 90, 0, 12, '2025-02-12'),
(91, '1', 'mocha', 'dasd', 1, 1, 90, 0, 12, '2025-02-12'),
(92, '1', 'mocha', 'dasd', 1, 1, 90, 0, 12, '2025-02-12'),
(93, '1', 'mocha', 'dasd', 1, 1, 90, 0, 12, '2025-02-12'),
(94, '1', 'mocha', 'dasd', 1, 1, 90, 0, 12, '2025-02-12'),
(95, '1', 'mocha', 'dasd', 1, 1, 90, 0, 12, '2025-02-12'),
(96, '1', 'mocha', 'dasd', 1, 1, 90, 0, 12, '2025-02-12'),
(97, '1', 'mocha', 'dasd', 1, 1, 90, 0, 12, '2025-02-12'),
(98, '1', 'mocha', 'dasd', 1, 1, 90, 0, 12, '2025-02-12'),
(99, '1', 'mocha', 'dasd', 1, 1, 90, 0, 12, '2025-02-12'),
(100, '1', 'mocha', 'dasd', 1, 1, 90, 0, 12, '2025-02-12'),
(101, '1', 'mocha', 'dasd', 1, 1, 90, 0, 12, '2025-02-12'),
(102, '1', 'mocha', 'dasd', 1, 1, 90, 0, 12, '2025-02-12'),
(103, '1', 'mocha', 'dasd', 1, 1, 90, 0, 12, '2025-02-12'),
(104, '1', 'mocha', 'dasd', 1, 1, 90, 0, 12, '2025-02-12'),
(105, '1', 'mocha', 'dasd', 1, 1, 90, 0, 12, '2025-02-12'),
(106, '1', 'mocha', 'dasd', 1, 1, 90, 0, 12, '2025-02-12'),
(107, '1', 'mocha', 'dasd', 1, 1, 90, 0, 12, '2025-02-12'),
(108, '1', 'mocha', 'dasd', 1, 1, 90, 0, 12, '2025-02-12'),
(109, '1', 'mocha', 'dasd', 1, 1, 90, 0, 12, '2025-02-12'),
(110, '1', 'mocha', 'dasd', 1, 1, 90, 0, 12, '2025-02-12'),
(111, '1', 'mocha', 'dasd', 1, 1, 90, 0, 12, '2025-02-12'),
(112, '1', 'mocha', 'dasd', 1, 1, 90, 0, 12, '2025-02-12'),
(113, '1', 'mocha', 'dasd', 1, 1, 90, 0, 12, '2025-02-12'),
(114, '1', 'mocha', 'dasd', 1, 1, 90, 0, 12, '2025-02-12'),
(115, '1', 'mocha', 'dasd', 1, 1, 90, 0, 12, '2025-02-12'),
(116, '1', 'mocha', 'dasd', 1, 1, 90, 0, 12, '2025-02-12'),
(117, '1', 'mocha', 'dasd', 1, 1, 90, 0, 12, '2025-02-12'),
(118, '1', 'mocha', 'dasd', 1, 1, 90, 0, 12, '2025-02-12'),
(119, '1', 'mocha', 'dasd', 1, 1, 90, 0, 12, '2025-02-12'),
(120, '1', 'mocha', 'dasd', 1, 1, 90, 0, 12, '2025-02-12'),
(121, '1', 'mocha', 'dasd', 1, 1, 90, 0, 12, '2025-02-12'),
(122, '1', 'mocha', 'dasd', 1, 1, 90, 0, 12, '2025-02-12'),
(123, '1', 'mocha', 'dasd', 1, 1, 90, 0, 12, '2025-02-12'),
(124, '1', 'mocha', 'dasd', 1, 1, 90, 0, 12, '2025-02-12'),
(125, '1', 'mocha', 'dasd', 1, 1, 90, 0, 12, '2025-02-12'),
(126, '1', 'mocha', 'dasd', 1, 1, 90, 0, 12, '2025-02-12'),
(127, '1', 'mocha', 'dasd', 1, 1, 90, 0, 12, '2025-02-12');

-- --------------------------------------------------------

--
-- Table structure for table `purchase_order_list`
--

CREATE TABLE `purchase_order_list` (
  `id` int(30) NOT NULL,
  `po_code` varchar(50) NOT NULL,
  `supplier_id` int(30) NOT NULL,
  `amount` float NOT NULL,
  `discount_perc` float NOT NULL DEFAULT 0,
  `discount` float NOT NULL DEFAULT 0,
  `tax_perc` float NOT NULL DEFAULT 0,
  `tax` float NOT NULL DEFAULT 0,
  `remarks` text NOT NULL,
  `status` tinyint(4) NOT NULL DEFAULT 0 COMMENT '0 = pending, 1 = partially received, 2 =received',
  `date_created` datetime NOT NULL DEFAULT current_timestamp(),
  `date_updated` datetime NOT NULL DEFAULT current_timestamp() ON UPDATE current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `purchase_order_list`
--

INSERT INTO `purchase_order_list` (`id`, `po_code`, `supplier_id`, `amount`, `discount_perc`, `discount`, `tax_perc`, `tax`, `remarks`, `status`, `date_created`, `date_updated`) VALUES
(1, 'PO-0001', 1, 81480, 3, 2250, 12, 8730, 'Sample', 2, '2021-11-03 11:20:22', '2021-11-03 11:21:00'),
(2, 'PO-0002', 2, 107464, 5, 5050, 12, 11514, 'Sample PO Only', 2, '2021-11-03 11:50:50', '2021-11-03 11:52:15');

-- --------------------------------------------------------

--
-- Table structure for table `receiving_list`
--

CREATE TABLE `receiving_list` (
  `id` int(30) NOT NULL,
  `form_id` int(30) NOT NULL,
  `from_order` tinyint(1) NOT NULL DEFAULT 1 COMMENT '1=PO ,2 = BO',
  `amount` float NOT NULL DEFAULT 0,
  `discount_perc` float NOT NULL DEFAULT 0,
  `discount` float NOT NULL DEFAULT 0,
  `tax_perc` float NOT NULL DEFAULT 0,
  `tax` float NOT NULL DEFAULT 0,
  `stock_ids` text DEFAULT NULL,
  `remarks` text DEFAULT NULL,
  `date_created` datetime NOT NULL DEFAULT current_timestamp(),
  `date_updated` datetime NOT NULL DEFAULT current_timestamp() ON UPDATE current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `receiving_list`
--

INSERT INTO `receiving_list` (`id`, `form_id`, `from_order`, `amount`, `discount_perc`, `discount`, `tax_perc`, `tax`, `stock_ids`, `remarks`, `date_created`, `date_updated`) VALUES
(1, 1, 1, 40740, 3, 1125, 12, 4365, '1', 'Sample', '2021-11-03 11:20:38', '2021-11-03 11:20:38'),
(2, 1, 2, 20370, 3, 562.5, 12, 2182.5, '2', '', '2021-11-03 11:20:51', '2021-11-03 11:20:51'),
(3, 2, 2, 20370, 3, 562.5, 12, 2182.5, '3', 'Success', '2021-11-03 11:21:00', '2021-11-03 11:21:00'),
(4, 2, 1, 64638, 5, 3037.5, 12, 6925.5, '4,5', 'Sample Receiving (Partial)', '2021-11-03 11:51:41', '2021-11-03 11:51:41'),
(5, 3, 2, 32186, 5, 1512.5, 12, 3448.5, '6,7', 'BO Receive (Partial)', '2021-11-03 11:52:02', '2021-11-03 11:52:02'),
(6, 4, 2, 10640, 5, 500, 12, 1140, '8', 'Sample Success', '2021-11-03 11:52:15', '2021-11-03 11:52:15');

-- --------------------------------------------------------

--
-- Table structure for table `return_list`
--

CREATE TABLE `return_list` (
  `id` int(30) NOT NULL,
  `return_code` varchar(50) NOT NULL,
  `supplier_id` int(30) NOT NULL,
  `amount` float NOT NULL DEFAULT 0,
  `remarks` text DEFAULT NULL,
  `stock_ids` text NOT NULL,
  `date_created` datetime NOT NULL DEFAULT current_timestamp(),
  `date_updated` datetime NOT NULL DEFAULT current_timestamp() ON UPDATE current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `return_list`
--

INSERT INTO `return_list` (`id`, `return_code`, `supplier_id`, `amount`, `remarks`, `stock_ids`, `date_created`, `date_updated`) VALUES
(1, 'R-0001', 2, 3025, 'Sample Issue', '16,17', '2021-11-03 13:45:53', '2021-11-03 13:45:53');

-- --------------------------------------------------------

--
-- Table structure for table `sales_list`
--

CREATE TABLE `sales_list` (
  `id` int(30) NOT NULL,
  `sales_code` varchar(50) NOT NULL,
  `client` text DEFAULT NULL,
  `amount` float NOT NULL DEFAULT 0,
  `remarks` text DEFAULT NULL,
  `stock_ids` text NOT NULL,
  `date_created` datetime NOT NULL DEFAULT current_timestamp(),
  `date_updated` datetime NOT NULL DEFAULT current_timestamp() ON UPDATE current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `sales_list`
--

INSERT INTO `sales_list` (`id`, `sales_code`, `client`, `amount`, `remarks`, `stock_ids`, `date_created`, `date_updated`) VALUES
(1, 'SALE-0001', 'John Smith', 7625, 'Sample Remarks', '24,25,26', '2021-11-03 14:03:30', '2021-11-03 14:08:27');

-- --------------------------------------------------------

--
-- Table structure for table `stock_list`
--

CREATE TABLE `stock_list` (
  `id` int(30) NOT NULL,
  `item_id` int(30) NOT NULL,
  `quantity` int(30) NOT NULL,
  `unit` varchar(250) DEFAULT NULL,
  `price` float NOT NULL DEFAULT 0,
  `total` float NOT NULL DEFAULT current_timestamp(),
  `type` tinyint(1) NOT NULL DEFAULT 1 COMMENT '1=IN , 2=OUT',
  `date_created` datetime NOT NULL DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `stock_list`
--

INSERT INTO `stock_list` (`id`, `item_id`, `quantity`, `unit`, `price`, `total`, `type`, `date_created`) VALUES
(1, 1, 250, 'pcs', 150, 37500, 1, '2021-11-03 11:20:38'),
(2, 1, 125, 'pcs', 150, 18750, 1, '2021-11-03 11:20:51'),
(3, 1, 125, 'pcs', 150, 18750, 1, '2021-11-03 11:21:00'),
(4, 2, 150, 'Boxes', 200, 30000, 1, '2021-11-03 11:51:41'),
(5, 4, 150, 'pcs', 205, 30750, 1, '2021-11-03 11:51:41'),
(6, 2, 100, 'Boxes', 200, 20000, 1, '2021-11-03 11:52:02'),
(7, 4, 50, 'pcs', 205, 10250, 1, '2021-11-03 11:52:02'),
(8, 2, 50, 'Boxes', 200, 10000, 1, '2021-11-03 11:52:15'),
(16, 2, 10, 'pcs', 200, 2000, 2, '2021-11-03 13:45:53'),
(17, 4, 5, 'boxes', 205, 1025, 2, '2021-11-03 13:45:53'),
(24, 1, 10, 'pcs', 150, 1500, 2, '2021-11-03 14:08:27'),
(25, 2, 5, 'pcs', 200, 1000, 2, '2021-11-03 14:08:27'),
(26, 4, 25, 'boxes', 205, 5125, 2, '2021-11-03 14:08:27');

-- --------------------------------------------------------

--
-- Table structure for table `supplier`
--

CREATE TABLE `supplier` (
  `SUPPLIER_ID` int(11) NOT NULL,
  `COMPANY_NAME` varchar(50) DEFAULT NULL,
  `LOCATION_ID` int(11) NOT NULL,
  `PHONE_NUMBER` varchar(11) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1 COLLATE=latin1_swedish_ci;

--
-- Dumping data for table `supplier`
--

INSERT INTO `supplier` (`SUPPLIER_ID`, `COMPANY_NAME`, `LOCATION_ID`, `PHONE_NUMBER`) VALUES
(11, 'InGame Tech', 114, '09457488521'),
(12, 'Asus', 115, '09635877412'),
(13, 'Razer Co.', 111, '09587855685'),
(15, 'Strategic Technology Co.', 116, '09124033805'),
(16, 'A4tech', 155, '09775673257');

-- --------------------------------------------------------

--
-- Table structure for table `supplier_list`
--

CREATE TABLE `supplier_list` (
  `id` int(30) NOT NULL,
  `name` text NOT NULL,
  `address` text NOT NULL,
  `cperson` text NOT NULL,
  `contact` text NOT NULL,
  `status` tinyint(1) NOT NULL DEFAULT 1,
  `date_created` datetime NOT NULL DEFAULT current_timestamp(),
  `date_updated` datetime NOT NULL DEFAULT current_timestamp() ON UPDATE current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `supplier_list`
--

INSERT INTO `supplier_list` (`id`, `name`, `address`, `cperson`, `contact`, `status`, `date_created`, `date_updated`) VALUES
(1, 'Supplier 101', 'Sample Supplier Address 101', 'Supplier Staff 101', '09123456789', 1, '2021-11-02 09:36:19', '2021-11-02 09:36:19'),
(2, 'Supplier 102', 'Sample Address 102', 'Supplier Staff 102', '0987654332', 1, '2021-11-02 09:36:54', '2021-11-02 09:36:54');

-- --------------------------------------------------------

--
-- Table structure for table `transaction`
--

CREATE TABLE `transaction` (
  `TRANS_ID` int(50) NOT NULL,
  `CUST_ID` int(11) DEFAULT NULL,
  `NUMOFITEMS` varchar(250) NOT NULL,
  `SUBTOTAL` varchar(50) NOT NULL,
  `LESSVAT` varchar(50) NOT NULL,
  `NETVAT` varchar(50) NOT NULL,
  `ADDVAT` varchar(50) NOT NULL,
  `GRANDTOTAL` varchar(250) NOT NULL,
  `CASH` varchar(250) NOT NULL,
  `DATE` varchar(50) NOT NULL,
  `TRANS_D_ID` varchar(250) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1 COLLATE=latin1_swedish_ci;

--
-- Dumping data for table `transaction`
--

INSERT INTO `transaction` (`TRANS_ID`, `CUST_ID`, `NUMOFITEMS`, `SUBTOTAL`, `LESSVAT`, `NETVAT`, `ADDVAT`, `GRANDTOTAL`, `CASH`, `DATE`, `TRANS_D_ID`) VALUES
(3, 16, '3', '456,982.00', '48,962.36', '408,019.64', '48,962.36', '456,982.00', '500000', '2019-03-18', '0318160336'),
(4, 11, '2', '1,967.00', '210.75', '1,756.25', '210.75', '1,967.00', '2000', '2019-03-18', '0318160622'),
(5, 14, '1', '550.00', '58.93', '491.07', '58.93', '550.00', '550', '2019-03-18', '0318170309'),
(6, 15, '1', '77,850.00', '8,341.07', '69,508.93', '8,341.07', '77,850.00', '80000', '2019-03-18', '0318170352'),
(7, 16, '1', '1,718.00', '184.07', '1,533.93', '184.07', '1,718.00', '2000', '2019-03-18', '0318170511'),
(8, 16, '1', '1,718.00', '184.07', '1,533.93', '184.07', '1,718.00', '2000', '2019-03-18', '0318170524'),
(9, 14, '1', '1,718.00', '184.07', '1,533.93', '184.07', '1,718.00', '2000', '2019-03-18', '0318170551'),
(10, 11, '1', '289.00', '30.96', '258.04', '30.96', '289.00', '500', '2019-03-18', '0318170624'),
(11, 9, '2', '1,148.00', '123.00', '1,025.00', '123.00', '1,148.00', '2000', '2019-03-18', '0318170825'),
(12, 9, '1', '5,500.00', '589.29', '4,910.71', '589.29', '5,500.00', '6000', '2019-03-18 19:40 pm', '0318194016'),
(13, 11, '1', '1,650.00', '176.79', '1,473.21', '176.79', '1,650.00', '1700', '2025-02-12 06:43 am', '021264407'),
(14, 11, '3', '1,238.00', '132.64', '1,105.36', '132.64', '1,238.00', '2500', '2025-02-12 10:48 am', '0212104848'),
(15, 11, '2', '379.00', '0.00', '379.00', '379.00', '379.00', '500', '2025-02-12 12:52 pm', '0212125259'),
(16, 11, '2', '640.00', '0.00', '640.00', '640.00', '640.00', '4500', '2025-02-12 12:59 pm', '0212125958'),
(17, 11, '1', '180.00', '', '', '', '180.00', '525', '2025-02-15 10:26 am', '0215102709'),
(18, 11, '2', '379.00', '', '', '', '379.00', '555', '2025-02-17 06:01 am', '021760132'),
(19, 11, '1', '1,260.00', '', '', '', '1,260.00', '30000', '2025-02-17 12:37 pm', '0217123747');

-- --------------------------------------------------------

--
-- Table structure for table `transaction_details`
--

CREATE TABLE `transaction_details` (
  `ID` int(11) NOT NULL,
  `TRANS_D_ID` varchar(250) NOT NULL,
  `PRODUCTS` varchar(250) NOT NULL,
  `QTY` varchar(250) NOT NULL,
  `PRICE` varchar(250) NOT NULL,
  `EMPLOYEE` varchar(250) NOT NULL,
  `ROLE` varchar(250) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1 COLLATE=latin1_swedish_ci;

--
-- Dumping data for table `transaction_details`
--

INSERT INTO `transaction_details` (`ID`, `TRANS_D_ID`, `PRODUCTS`, `QTY`, `PRICE`, `EMPLOYEE`, `ROLE`) VALUES
(7, '0318160336', 'Lenovo ideapad 20059', '2', '32999', 'Prince Ly', 'Manager'),
(8, '0318160336', 'Predator Helios 300 Gaming Laptop', '5', '77850', 'Prince Ly', 'Manager'),
(9, '0318160336', 'A4tech OP-720', '6', '289', 'Prince Ly', 'Manager'),
(10, '0318160622', 'Newmen E120', '2', '550', 'Prince Ly', 'Manager'),
(11, '0318160622', 'A4tech OP-720', '3', '289', 'Prince Ly', 'Manager'),
(12, '0318170309', 'Newmen E120', '1', '550', 'Prince Ly', 'Manager'),
(13, '0318170352', 'Predator Helios 300 Gaming Laptop', '1', '77850', 'Prince Ly', 'Manager'),
(14, '0318170511', 'Fantech EG1', '2', '859', 'Prince Ly', 'Manager'),
(15, '0318170524', 'Fantech EG1', '2', '859', 'Prince Ly', 'Manager'),
(16, '0318170551', 'Fantech EG1', '2', '859', 'Prince Ly', 'Manager'),
(17, '0318170624', 'A4tech OP-720', '1', '289', 'Prince Ly', 'Manager'),
(18, '0318170825', 'A4tech OP-720', '1', '289', 'Prince Ly', 'Manager'),
(19, '0318170825', 'Fantech EG1', '1', '859', 'Prince Ly', 'Manager'),
(20, '0318194016', 'Newmen E120', '10', '550', 'Josuey', 'Cashier'),
(21, '021264407', 'Newmen E120', '3', '550', 'john', 'Manager'),
(22, '0212104848', 'mocha', '1', '90', 'clemenz', 'Cashier'),
(23, '0212104848', 'Fantech EG1', '1', '859', 'clemenz', 'Cashier'),
(24, '0212104848', 'A4tech OP-720', '1', '289', 'clemenz', 'Cashier'),
(25, '0212125259', 'mocha', '1', '90', 'clemenz', 'Cashier'),
(26, '0212125259', 'A4tech OP-720', '1', '289', 'clemenz', 'Cashier'),
(27, '0212125958', 'mocha', '1', '90', 'clemenz', 'Cashier'),
(28, '0212125958', 'Newmen E120', '1', '550', 'clemenz', 'Cashier'),
(29, '0215102709', 'mocha', '2', '90', 'john', 'Manager'),
(30, '021760132', 'mocha', '1', '90', 'john', 'Manager'),
(31, '021760132', 'A4tech OP-720', '1', '289', 'john', 'Manager'),
(32, '0217123747', 'mocha', '14', '90', 'john', 'Manager');

-- --------------------------------------------------------

--
-- Table structure for table `type`
--

CREATE TABLE `type` (
  `TYPE_ID` int(11) NOT NULL,
  `TYPE` varchar(50) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1 COLLATE=latin1_swedish_ci;

--
-- Dumping data for table `type`
--

INSERT INTO `type` (`TYPE_ID`, `TYPE`) VALUES
(1, 'Admin'),
(2, 'User');

-- --------------------------------------------------------

--
-- Table structure for table `users`
--

CREATE TABLE `users` (
  `ID` int(11) NOT NULL,
  `EMPLOYEE_ID` int(11) DEFAULT NULL,
  `USERNAME` varchar(50) DEFAULT NULL,
  `PASSWORD` varchar(50) DEFAULT NULL,
  `TYPE_ID` int(11) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1 COLLATE=latin1_swedish_ci;

--
-- Dumping data for table `users`
--

INSERT INTO `users` (`ID`, `EMPLOYEE_ID`, `USERNAME`, `PASSWORD`, `TYPE_ID`) VALUES
(1, 1, 'clemenz', '7110eda4d09e062aa5e4a390b0a572ac0d2c0220', 1),
(7, 2, 'clemenzuserboy', '7110eda4d09e062aa5e4a390b0a572ac0d2c0220', 2),
(10, 4, 'clemenzusergirl', '7110eda4d09e062aa5e4a390b0a572ac0d2c0220', 2);

--
-- Indexes for dumped tables
--

--
-- Indexes for table `back_order_list`
--
ALTER TABLE `back_order_list`
  ADD PRIMARY KEY (`id`),
  ADD KEY `supplier_id` (`supplier_id`),
  ADD KEY `po_id` (`po_id`),
  ADD KEY `receiving_id` (`receiving_id`);

--
-- Indexes for table `bo_items`
--
ALTER TABLE `bo_items`
  ADD KEY `item_id` (`item_id`),
  ADD KEY `bo_id` (`bo_id`);

--
-- Indexes for table `category`
--
ALTER TABLE `category`
  ADD PRIMARY KEY (`CATEGORY_ID`);

--
-- Indexes for table `customer`
--
ALTER TABLE `customer`
  ADD PRIMARY KEY (`CUST_ID`);

--
-- Indexes for table `employee`
--
ALTER TABLE `employee`
  ADD PRIMARY KEY (`EMPLOYEE_ID`),
  ADD UNIQUE KEY `EMPLOYEE_ID` (`EMPLOYEE_ID`),
  ADD UNIQUE KEY `PHONE_NUMBER` (`PHONE_NUMBER`),
  ADD KEY `LOCATION_ID` (`LOCATION_ID`),
  ADD KEY `JOB_ID` (`JOB_ID`);

--
-- Indexes for table `item_list`
--
ALTER TABLE `item_list`
  ADD PRIMARY KEY (`id`),
  ADD KEY `supplier_id` (`supplier_id`);

--
-- Indexes for table `job`
--
ALTER TABLE `job`
  ADD PRIMARY KEY (`JOB_ID`);

--
-- Indexes for table `location`
--
ALTER TABLE `location`
  ADD PRIMARY KEY (`LOCATION_ID`);

--
-- Indexes for table `manager`
--
ALTER TABLE `manager`
  ADD UNIQUE KEY `PHONE_NUMBER` (`PHONE_NUMBER`),
  ADD KEY `LOCATION_ID` (`LOCATION_ID`);

--
-- Indexes for table `po_items`
--
ALTER TABLE `po_items`
  ADD KEY `po_id` (`po_id`),
  ADD KEY `item_id` (`item_id`);

--
-- Indexes for table `product`
--
ALTER TABLE `product`
  ADD PRIMARY KEY (`PRODUCT_ID`),
  ADD KEY `CATEGORY_ID` (`CATEGORY_ID`),
  ADD KEY `SUPPLIER_ID` (`SUPPLIER_ID`);

--
-- Indexes for table `purchase_order_list`
--
ALTER TABLE `purchase_order_list`
  ADD PRIMARY KEY (`id`),
  ADD KEY `supplier_id` (`supplier_id`);

--
-- Indexes for table `receiving_list`
--
ALTER TABLE `receiving_list`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `return_list`
--
ALTER TABLE `return_list`
  ADD PRIMARY KEY (`id`),
  ADD KEY `supplier_id` (`supplier_id`);

--
-- Indexes for table `sales_list`
--
ALTER TABLE `sales_list`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `stock_list`
--
ALTER TABLE `stock_list`
  ADD PRIMARY KEY (`id`),
  ADD KEY `item_id` (`item_id`);

--
-- Indexes for table `supplier`
--
ALTER TABLE `supplier`
  ADD PRIMARY KEY (`SUPPLIER_ID`),
  ADD KEY `LOCATION_ID` (`LOCATION_ID`);

--
-- Indexes for table `supplier_list`
--
ALTER TABLE `supplier_list`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `transaction`
--
ALTER TABLE `transaction`
  ADD PRIMARY KEY (`TRANS_ID`),
  ADD KEY `TRANS_DETAIL_ID` (`TRANS_D_ID`),
  ADD KEY `CUST_ID` (`CUST_ID`);

--
-- Indexes for table `transaction_details`
--
ALTER TABLE `transaction_details`
  ADD PRIMARY KEY (`ID`),
  ADD KEY `TRANS_D_ID` (`TRANS_D_ID`) USING BTREE;

--
-- Indexes for table `type`
--
ALTER TABLE `type`
  ADD PRIMARY KEY (`TYPE_ID`);

--
-- Indexes for table `users`
--
ALTER TABLE `users`
  ADD PRIMARY KEY (`ID`),
  ADD KEY `TYPE_ID` (`TYPE_ID`),
  ADD KEY `EMPLOYEE_ID` (`EMPLOYEE_ID`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `back_order_list`
--
ALTER TABLE `back_order_list`
  MODIFY `id` int(30) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- AUTO_INCREMENT for table `category`
--
ALTER TABLE `category`
  MODIFY `CATEGORY_ID` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=10;

--
-- AUTO_INCREMENT for table `customer`
--
ALTER TABLE `customer`
  MODIFY `CUST_ID` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=18;

--
-- AUTO_INCREMENT for table `employee`
--
ALTER TABLE `employee`
  MODIFY `EMPLOYEE_ID` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;

--
-- AUTO_INCREMENT for table `item_list`
--
ALTER TABLE `item_list`
  MODIFY `id` int(30) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;

--
-- AUTO_INCREMENT for table `location`
--
ALTER TABLE `location`
  MODIFY `LOCATION_ID` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=160;

--
-- AUTO_INCREMENT for table `product`
--
ALTER TABLE `product`
  MODIFY `PRODUCT_ID` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=128;

--
-- AUTO_INCREMENT for table `purchase_order_list`
--
ALTER TABLE `purchase_order_list`
  MODIFY `id` int(30) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT for table `receiving_list`
--
ALTER TABLE `receiving_list`
  MODIFY `id` int(30) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=7;

--
-- AUTO_INCREMENT for table `return_list`
--
ALTER TABLE `return_list`
  MODIFY `id` int(30) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT for table `sales_list`
--
ALTER TABLE `sales_list`
  MODIFY `id` int(30) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT for table `stock_list`
--
ALTER TABLE `stock_list`
  MODIFY `id` int(30) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=27;

--
-- AUTO_INCREMENT for table `supplier`
--
ALTER TABLE `supplier`
  MODIFY `SUPPLIER_ID` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=17;

--
-- AUTO_INCREMENT for table `supplier_list`
--
ALTER TABLE `supplier_list`
  MODIFY `id` int(30) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT for table `transaction`
--
ALTER TABLE `transaction`
  MODIFY `TRANS_ID` int(50) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=20;

--
-- AUTO_INCREMENT for table `transaction_details`
--
ALTER TABLE `transaction_details`
  MODIFY `ID` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=33;

--
-- AUTO_INCREMENT for table `users`
--
ALTER TABLE `users`
  MODIFY `ID` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=11;

--
-- Constraints for dumped tables
--

--
-- Constraints for table `back_order_list`
--
ALTER TABLE `back_order_list`
  ADD CONSTRAINT `back_order_list_ibfk_1` FOREIGN KEY (`supplier_id`) REFERENCES `supplier_list` (`id`) ON DELETE CASCADE,
  ADD CONSTRAINT `back_order_list_ibfk_2` FOREIGN KEY (`po_id`) REFERENCES `purchase_order_list` (`id`) ON DELETE CASCADE,
  ADD CONSTRAINT `back_order_list_ibfk_3` FOREIGN KEY (`receiving_id`) REFERENCES `receiving_list` (`id`) ON DELETE CASCADE;

--
-- Constraints for table `bo_items`
--
ALTER TABLE `bo_items`
  ADD CONSTRAINT `bo_items_ibfk_1` FOREIGN KEY (`item_id`) REFERENCES `item_list` (`id`) ON DELETE CASCADE,
  ADD CONSTRAINT `bo_items_ibfk_2` FOREIGN KEY (`bo_id`) REFERENCES `back_order_list` (`id`) ON DELETE CASCADE;

--
-- Constraints for table `employee`
--
ALTER TABLE `employee`
  ADD CONSTRAINT `employee_ibfk_1` FOREIGN KEY (`LOCATION_ID`) REFERENCES `location` (`LOCATION_ID`),
  ADD CONSTRAINT `employee_ibfk_2` FOREIGN KEY (`JOB_ID`) REFERENCES `job` (`JOB_ID`);

--
-- Constraints for table `item_list`
--
ALTER TABLE `item_list`
  ADD CONSTRAINT `item_list_ibfk_1` FOREIGN KEY (`supplier_id`) REFERENCES `supplier_list` (`id`) ON DELETE CASCADE;

--
-- Constraints for table `manager`
--
ALTER TABLE `manager`
  ADD CONSTRAINT `manager_ibfk_1` FOREIGN KEY (`LOCATION_ID`) REFERENCES `location` (`LOCATION_ID`);

--
-- Constraints for table `po_items`
--
ALTER TABLE `po_items`
  ADD CONSTRAINT `po_items_ibfk_1` FOREIGN KEY (`po_id`) REFERENCES `purchase_order_list` (`id`) ON DELETE CASCADE,
  ADD CONSTRAINT `po_items_ibfk_2` FOREIGN KEY (`item_id`) REFERENCES `item_list` (`id`) ON DELETE CASCADE;

--
-- Constraints for table `product`
--
ALTER TABLE `product`
  ADD CONSTRAINT `product_ibfk_1` FOREIGN KEY (`CATEGORY_ID`) REFERENCES `category` (`CATEGORY_ID`),
  ADD CONSTRAINT `product_ibfk_2` FOREIGN KEY (`SUPPLIER_ID`) REFERENCES `supplier` (`SUPPLIER_ID`);

--
-- Constraints for table `purchase_order_list`
--
ALTER TABLE `purchase_order_list`
  ADD CONSTRAINT `purchase_order_list_ibfk_1` FOREIGN KEY (`supplier_id`) REFERENCES `supplier_list` (`id`) ON DELETE CASCADE;

--
-- Constraints for table `return_list`
--
ALTER TABLE `return_list`
  ADD CONSTRAINT `return_list_ibfk_1` FOREIGN KEY (`supplier_id`) REFERENCES `supplier_list` (`id`) ON DELETE CASCADE;

--
-- Constraints for table `stock_list`
--
ALTER TABLE `stock_list`
  ADD CONSTRAINT `stock_list_ibfk_1` FOREIGN KEY (`item_id`) REFERENCES `item_list` (`id`) ON DELETE CASCADE;

--
-- Constraints for table `supplier`
--
ALTER TABLE `supplier`
  ADD CONSTRAINT `supplier_ibfk_1` FOREIGN KEY (`LOCATION_ID`) REFERENCES `location` (`LOCATION_ID`);

--
-- Constraints for table `transaction`
--
ALTER TABLE `transaction`
  ADD CONSTRAINT `transaction_ibfk_3` FOREIGN KEY (`CUST_ID`) REFERENCES `customer` (`CUST_ID`),
  ADD CONSTRAINT `transaction_ibfk_4` FOREIGN KEY (`TRANS_D_ID`) REFERENCES `transaction_details` (`TRANS_D_ID`);

--
-- Constraints for table `users`
--
ALTER TABLE `users`
  ADD CONSTRAINT `users_ibfk_3` FOREIGN KEY (`TYPE_ID`) REFERENCES `type` (`TYPE_ID`),
  ADD CONSTRAINT `users_ibfk_4` FOREIGN KEY (`EMPLOYEE_ID`) REFERENCES `employee` (`EMPLOYEE_ID`);
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
