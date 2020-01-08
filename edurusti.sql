-- phpMyAdmin SQL Dump
-- version 4.7.4
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Sep 14, 2019 at 02:30 PM
-- Server version: 10.1.28-MariaDB
-- PHP Version: 7.1.11

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET AUTOCOMMIT = 0;
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `testm`
--

-- --------------------------------------------------------

--
-- Table structure for table `admin`
--

CREATE TABLE `admin` (
  `admin_id` int(11) NOT NULL,
  `first_name` varchar(100) NOT NULL,
  `last_name` varchar(100) NOT NULL,
  `mobile` int(10) NOT NULL,
  `email` varchar(100) NOT NULL,
  `password` varchar(100) NOT NULL,
  `profile` text NOT NULL,
  `is_active` enum('0','1') NOT NULL,
  `created_date` datetime NOT NULL,
  `updated_date` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP,
  `isDeleted` enum('1','0') NOT NULL DEFAULT '0'
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `admin`
--

INSERT INTO `admin` (`admin_id`, `first_name`, `last_name`, `mobile`, `email`, `password`, `profile`, `is_active`, `created_date`, `updated_date`, `isDeleted`) VALUES
(1, 'admin', 'admin', 1234567890, 'test@gmail.com', '098f6bcd4621d373cade4e832627b4f6', '75754_aaa.jpg', '1', '2019-05-11 04:00:00', '2019-09-08 11:58:31', '0');

-- --------------------------------------------------------

--
-- Table structure for table `banner`
--

CREATE TABLE `banner` (
  `banner_id` int(11) NOT NULL,
  `title` text,
  `description` text,
  `image_path` text,
  `status` enum('1','2','3') NOT NULL DEFAULT '1' COMMENT '1-active,-2-deactive,3-deleted',
  `created_date` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP,
  `updated_date` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `banner`
--

INSERT INTO `banner` (`banner_id`, `title`, `description`, `image_path`, `status`, `created_date`, `updated_date`) VALUES
(1, 'as', 'asdas', '38677_Chrysanthemum.jpg', '1', '2019-09-09 01:16:03', '2019-09-09 06:46:03'),
(2, 'asdasd', 'asdasd', '54658_Desert.jpg', '1', '2019-09-09 01:16:16', '2019-09-09 06:46:16');

-- --------------------------------------------------------

--
-- Table structure for table `brand`
--

CREATE TABLE `brand` (
  `brand_id` int(11) NOT NULL,
  `brand_name` varchar(55) DEFAULT NULL,
  `isDeleted` enum('1','0') NOT NULL DEFAULT '0',
  `status` enum('1','0') NOT NULL DEFAULT '1',
  `created_date` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `brand`
--

INSERT INTO `brand` (`brand_id`, `brand_name`, `isDeleted`, `status`, `created_date`) VALUES
(1, 'Samsung', '0', '0', '2019-09-12 11:57:07'),
(2, 'Nokia', '0', '1', '2019-09-08 12:16:44'),
(3, 'Apple', '0', '1', '2019-09-08 12:16:44'),
(4, 'Lenovo', '0', '1', '2019-09-08 12:16:44'),
(5, 'Motorola', '0', '1', '2019-09-08 12:16:44'),
(6, 'xiaomi\r\n', '0', '1', '2019-09-08 12:16:44'),
(7, 'Redmi', '0', '1', '2019-09-08 12:16:44'),
(8, 'Redmi Note', '0', '1', '2019-09-08 12:16:44'),
(9, 'fdfdfdf', '0', '1', '2019-09-08 12:16:44'),
(10, 'iPhone', '0', '1', '2019-09-08 12:16:44'),
(11, 'new', '0', '1', '2019-09-08 12:16:44'),
(12, 'test', '0', '1', '2019-09-07 20:00:25'),
(13, 'asdasd', '0', '1', '2019-09-09 00:11:30'),
(14, 'asdasd', '0', '1', '2019-09-09 00:14:17'),
(15, 'asdasd', '1', '1', '2019-09-09 06:22:23');

-- --------------------------------------------------------

--
-- Table structure for table `contact`
--

CREATE TABLE `contact` (
  `con_id` int(11) NOT NULL,
  `full_name` varchar(255) DEFAULT NULL,
  `email_id` varchar(60) DEFAULT NULL,
  `mobile_number` varchar(50) DEFAULT NULL,
  `subject` text,
  `message` text,
  `created_date` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Table structure for table `customer`
--

CREATE TABLE `customer` (
  `cust_id` int(11) NOT NULL,
  `full_name` varchar(255) DEFAULT NULL,
  `email` varchar(100) DEFAULT NULL,
  `mobile_number` varchar(50) DEFAULT NULL,
  `otp` int(11) DEFAULT NULL,
  `is_verified` enum('1','0') NOT NULL DEFAULT '0' COMMENT '1-verified,0-not verified',
  `pin_code` int(11) DEFAULT NULL,
  `address` text,
  `address1` text,
  `landmark` text,
  `city` varchar(100) DEFAULT NULL,
  `status` enum('1','2','3') NOT NULL DEFAULT '1' COMMENT '1-active,2- Deactive,3-deleted',
  `created_date` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP,
  `updated_date` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `customer`
--

INSERT INTO `customer` (`cust_id`, `full_name`, `email`, `mobile_number`, `otp`, `is_verified`, `pin_code`, `address`, `address1`, `landmark`, `city`, `status`, `created_date`, `updated_date`) VALUES
(10, '', '', '1234567890', 793203, '0', 0, '', '', '', '', '1', '2019-09-14 01:04:38', '2019-09-14 06:34:38'),
(11, '', '', '1111111111', 387432, '0', 0, '', '', '', '', '1', '2019-09-14 01:06:14', '2019-09-14 06:36:14'),
(12, 'asdasd', 'qwe@sdas.asa', '4444444444', 297686, '0', 123456, 'qwe', 'qwe', 'qwe', 'qwe', '1', '2019-09-14 10:17:22', '2019-09-14 10:17:22'),
(13, '', '', '9999999999', 729162, '0', 0, '', '', '', '', '1', '2019-09-14 05:21:20', '2019-09-14 10:51:20'),
(14, '', '', '2222222222', 924099, '0', 0, '', '', '', '', '1', '2019-09-14 05:37:57', '2019-09-14 11:07:57');

-- --------------------------------------------------------

--
-- Table structure for table `issues`
--

CREATE TABLE `issues` (
  `issues_id` int(11) NOT NULL,
  `title` varchar(255) DEFAULT NULL,
  `description` text,
  `status` enum('1','2','3') NOT NULL DEFAULT '1' COMMENT '1-active,2-seactive,3-delated',
  `created_date` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP,
  `updated_date` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `issues`
--

INSERT INTO `issues` (`issues_id`, `title`, `description`, `status`, `created_date`, `updated_date`) VALUES
(1, 'Glass Repair', '12', '1', '2019-09-12 12:51:07', '2019-09-12 12:51:07'),
(2, 'Camera Failure', '11', '1', '2019-09-12 12:51:17', '2019-09-12 12:51:17'),
(3, 'Earphone Jack Malfunctions', '1', '1', '2019-09-12 12:51:25', '2019-09-12 12:51:25'),
(4, 'Speaker Failure', '1', '1', '2019-09-12 12:51:34', '2019-09-12 12:51:34'),
(5, 'Battery Replacement', '1', '1', '2019-09-12 12:51:43', '2019-09-12 12:51:43'),
(6, 'Mobile Overheating', '1', '1', '2019-09-12 12:51:53', '2019-09-12 12:51:53'),
(7, 'Signal Issues', '1', '1', '2019-09-12 12:52:01', '2019-09-12 12:52:01'),
(8, 'Motherboard Problem', '1', '1', '2019-09-12 12:52:11', '2019-09-12 12:52:11'),
(9, 'Water Damage', '1', '1', '2019-09-12 12:52:19', '2019-09-12 12:52:19'),
(10, 'Network Problem', '1', '1', '2019-09-12 12:52:27', '2019-09-12 12:52:27');

-- --------------------------------------------------------

--
-- Table structure for table `logo`
--

CREATE TABLE `logo` (
  `logo_id` int(11) NOT NULL,
  `logo_path` varchar(255) DEFAULT NULL,
  `description` text,
  `created_date` date NOT NULL,
  `updated_date` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP,
  `status` enum('1','0') NOT NULL DEFAULT '0'
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `logo`
--

INSERT INTO `logo` (`logo_id`, `logo_path`, `description`, `created_date`, `updated_date`, `status`) VALUES
(2, '64770_aaa.jpg', 'qwertasdfgh', '2019-05-26', '2019-06-04 03:18:50', '0'),
(3, '64005_aaa.jpg', 'aefgaf', '2019-05-26', '2019-06-04 03:23:53', '1'),
(4, '35123_aaa.jpg', 'Deva', '2019-05-26', '2019-06-04 03:23:56', '0');

-- --------------------------------------------------------

--
-- Table structure for table `model`
--

CREATE TABLE `model` (
  `model_id` int(11) NOT NULL,
  `brand_id` int(11) DEFAULT NULL,
  `model_name` varchar(200) DEFAULT NULL,
  `isDeleted` enum('1','0') NOT NULL DEFAULT '0',
  `created_date` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `model`
--

INSERT INTO `model` (`model_id`, `brand_id`, `model_name`, `isDeleted`, `created_date`) VALUES
(1, 5, 'nknk', '0', '2019-09-08 12:15:11'),
(2, 2, 'hjjvj', '0', '2019-09-08 12:15:11'),
(3, 4, 'mmmmmmmmmmmmmmm', '0', '2019-09-08 12:15:11'),
(4, 2, 'bbhbh', '0', '2019-09-08 12:15:11'),
(5, 10, 'xs', '0', '2019-09-08 12:15:11'),
(6, 1, 'asdasd', '0', '2019-09-09 06:31:59'),
(7, 1, 'aaaa', '0', '2019-09-09 06:33:49');

-- --------------------------------------------------------

--
-- Table structure for table `order_master`
--

CREATE TABLE `order_master` (
  `ord_id` int(11) NOT NULL,
  `cust_id` int(11) NOT NULL COMMENT 'foregn key of customer table',
  `brand_id` int(11) NOT NULL,
  `model` text,
  `order_description` text,
  `issues_id` text,
  `issues_description` text,
  `pickup_date_time` datetime NOT NULL,
  `order_number` varchar(8) DEFAULT NULL,
  `status` enum('1','2','3') NOT NULL DEFAULT '1' COMMENT '1-active,2-deactive,3-cancel',
  `created_date` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP,
  `updated_date` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `order_master`
--

INSERT INTO `order_master` (`ord_id`, `cust_id`, `brand_id`, `model`, `order_description`, `issues_id`, `issues_description`, `pickup_date_time`, `order_number`, `status`, `created_date`, `updated_date`) VALUES
(17, 7, 1, '5', '', '0,1', '', '0000-00-00 00:00:00', 'ED000017', '1', '0000-00-00 00:00:00', '0000-00-00 00:00:00'),
(18, 7, 2, '5', '', '0,1', '', '2019-09-08 04:35:00', 'ED000018', '1', '2019-09-08 12:31:45', '0000-00-00 00:00:00'),
(19, 7, 2, '5', '', '0,1', '', '2019-09-08 04:35:00', 'ED000019', '1', '2019-09-08 12:31:45', '0000-00-00 00:00:00'),
(20, 7, 1, '5', '', '0,1', '', '2019-09-08 06:27:00', 'ED000020', '1', '2019-09-08 12:53:29', '0000-00-00 00:00:00'),
(21, 7, 1, '5', '', '0,1', '', '2019-09-08 06:47:00', 'ED000021', '1', '2019-09-08 12:53:51', '0000-00-00 00:00:00'),
(22, 7, 1, '5', '', '0', '', '2019-09-12 15:05:00', 'ED000022', '1', '2019-09-12 11:51:49', '0000-00-00 00:00:00'),
(23, 7, 2, '5', '', '5', '', '0000-00-00 00:00:00', 'ED000023', '1', '2019-09-12 11:53:19', '0000-00-00 00:00:00'),
(24, 12, 2, '4', '', '9', '', '2019-09-21 15:30:00', 'ED000024', '1', '2019-09-14 09:56:05', '0000-00-00 00:00:00'),
(25, 12, 1, '6', '', '9', '', '0000-00-00 00:00:00', 'ED000025', '1', '2019-09-14 09:56:39', '0000-00-00 00:00:00'),
(26, 12, 2, '2', '', '9', '', '0000-00-00 00:00:00', 'ED000026', '1', '2019-09-14 10:00:06', '0000-00-00 00:00:00'),
(27, 12, 1, '6', '', '9', '', '2019-09-14 10:30:00', 'ED000027', '1', '2019-09-14 10:05:01', '0000-00-00 00:00:00'),
(28, 12, 1, '6', '', '9', '', '2019-09-14 15:30:00', 'ED000028', '1', '2019-09-14 10:17:22', '0000-00-00 00:00:00'),
(29, 0, 0, NULL, 'test', NULL, NULL, '0000-00-00 00:00:00', NULL, '1', '2019-09-14 11:55:08', '0000-00-00 00:00:00');

-- --------------------------------------------------------

--
-- Table structure for table `tracking`
--

CREATE TABLE `tracking` (
  `track_id` int(11) NOT NULL,
  `cust_id` int(11) NOT NULL COMMENT 'foregn key of customer table',
  `order_id` varchar(8) DEFAULT NULL COMMENT 'foregn key of order_master table',
  `status` int(11) NOT NULL,
  `created_date` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP,
  `updated_date` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `tracking`
--

INSERT INTO `tracking` (`track_id`, `cust_id`, `order_id`, `status`, `created_date`, `updated_date`) VALUES
(2, 7, 'ED000017', 1, '2019-09-08 11:17:44', '2019-09-08 11:45:17'),
(3, 7, 'ED000017', 2, '2019-09-08 11:17:44', '2019-09-08 11:45:17'),
(4, 7, 'ED000017', 3, '2019-09-08 11:17:44', '2019-09-08 11:45:17'),
(5, 7, 'ED000018', 1, '2019-09-08 12:31:45', '2019-09-08 12:31:45'),
(6, 7, 'ED000019', 1, '2019-09-08 12:31:45', '2019-09-08 12:31:45'),
(7, 7, 'ED000020', 1, '2019-09-08 12:53:29', '2019-09-08 12:53:29'),
(8, 7, 'ED000021', 1, '2019-09-08 12:53:51', '2019-09-08 12:53:51'),
(9, 17, 'ED000017', 3, '2019-09-09 01:22:22', '2019-09-09 06:52:22'),
(10, 7, 'ED000022', 1, '2019-09-12 11:51:49', '2019-09-12 11:51:49'),
(11, 7, 'ED000023', 1, '2019-09-12 11:53:19', '2019-09-12 11:53:19'),
(12, 7, 'ED000024', 1, '2019-09-12 12:34:58', '2019-09-12 12:34:58'),
(13, 12, 'ED000024', 1, '2019-09-14 09:56:05', '2019-09-14 09:56:05'),
(14, 12, 'ED000025', 1, '2019-09-14 09:56:39', '2019-09-14 09:56:39'),
(15, 12, 'ED000026', 1, '2019-09-14 10:00:06', '2019-09-14 10:00:06'),
(16, 12, 'ED000027', 1, '2019-09-14 10:05:01', '2019-09-14 10:05:01'),
(17, 12, 'ED000028', 1, '2019-09-14 10:17:22', '2019-09-14 10:17:22');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `admin`
--
ALTER TABLE `admin`
  ADD PRIMARY KEY (`admin_id`);

--
-- Indexes for table `banner`
--
ALTER TABLE `banner`
  ADD PRIMARY KEY (`banner_id`);

--
-- Indexes for table `brand`
--
ALTER TABLE `brand`
  ADD PRIMARY KEY (`brand_id`);

--
-- Indexes for table `contact`
--
ALTER TABLE `contact`
  ADD PRIMARY KEY (`con_id`);

--
-- Indexes for table `customer`
--
ALTER TABLE `customer`
  ADD PRIMARY KEY (`cust_id`);

--
-- Indexes for table `issues`
--
ALTER TABLE `issues`
  ADD PRIMARY KEY (`issues_id`);

--
-- Indexes for table `logo`
--
ALTER TABLE `logo`
  ADD PRIMARY KEY (`logo_id`);

--
-- Indexes for table `model`
--
ALTER TABLE `model`
  ADD PRIMARY KEY (`model_id`);

--
-- Indexes for table `order_master`
--
ALTER TABLE `order_master`
  ADD PRIMARY KEY (`ord_id`);

--
-- Indexes for table `tracking`
--
ALTER TABLE `tracking`
  ADD PRIMARY KEY (`track_id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `admin`
--
ALTER TABLE `admin`
  MODIFY `admin_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT for table `banner`
--
ALTER TABLE `banner`
  MODIFY `banner_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT for table `brand`
--
ALTER TABLE `brand`
  MODIFY `brand_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=16;

--
-- AUTO_INCREMENT for table `contact`
--
ALTER TABLE `contact`
  MODIFY `con_id` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `customer`
--
ALTER TABLE `customer`
  MODIFY `cust_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=15;

--
-- AUTO_INCREMENT for table `issues`
--
ALTER TABLE `issues`
  MODIFY `issues_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=11;

--
-- AUTO_INCREMENT for table `logo`
--
ALTER TABLE `logo`
  MODIFY `logo_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- AUTO_INCREMENT for table `model`
--
ALTER TABLE `model`
  MODIFY `model_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=8;

--
-- AUTO_INCREMENT for table `order_master`
--
ALTER TABLE `order_master`
  MODIFY `ord_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=30;

--
-- AUTO_INCREMENT for table `tracking`
--
ALTER TABLE `tracking`
  MODIFY `track_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=18;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
