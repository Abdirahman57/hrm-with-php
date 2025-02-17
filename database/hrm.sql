-- phpMyAdmin SQL Dump
-- version 5.2.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Feb 17, 2025 at 09:51 AM
-- Server version: 10.4.32-MariaDB
-- PHP Version: 8.2.12

SET FOREIGN_KEY_CHECKS=0;
SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `hrm`
--
CREATE DATABASE IF NOT EXISTS `hrm` DEFAULT CHARACTER SET utf8mb4 COLLATE utf8mb4_general_ci;
USE `hrm`;

-- --------------------------------------------------------

--
-- Table structure for table `attendanc`
--
-- Creation: Oct 13, 2024 at 07:15 AM
--

DROP TABLE IF EXISTS `attendanc`;
CREATE TABLE IF NOT EXISTS `attendanc` (
  `att_id` int(11) NOT NULL AUTO_INCREMENT,
  `emp_id` int(11) NOT NULL,
  `date` varchar(100) NOT NULL,
  `monthly` varchar(100) NOT NULL,
  `status` varchar(50) NOT NULL,
  `time_in` varchar(50) NOT NULL,
  `time_out` varchar(50) NOT NULL,
  PRIMARY KEY (`att_id`),
  KEY `emp_id` (`emp_id`)
) ENGINE=InnoDB AUTO_INCREMENT=18 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- RELATIONSHIPS FOR TABLE `attendanc`:
--   `emp_id`
--       `employee` -> `emp_id`
--

--
-- Truncate table before insert `attendanc`
--

TRUNCATE TABLE `attendanc`;
--
-- Dumping data for table `attendanc`
--

INSERT DELAYED IGNORE INTO `attendanc` (`att_id`, `emp_id`, `date`, `monthly`, `status`, `time_in`, `time_out`) VALUES
(1, 24, '2024-08-13', 'Aug', '1', '01:00:00 am', '10:00:00 pm'),
(2, 25, '2024-10-13', 'Oct', '1', '04:00:00 pm', '10:00:00 pm'),
(9, 26, '2024-10-14', 'Oct', '1', '08:00:00 am', '01:30:00 pm'),
(11, 26, '2024-10-14', 'Oct', '0', '12:28:00 am', '01:30:00 pm'),
(12, 27, '2024-10-14', 'Oct', '0', '02:29:00 am', '07:00:00 pm'),
(14, 28, '2024-12-01', 'Dec', '0', '05:54:00 pm', '01:30:00 pm'),
(15, 29, '2024-12-20', 'Dec', '0', '08:48:00 pm', '02:00:00 pm'),
(16, 30, '2024-12-21', 'Dec', '0', '08:31:00 am', '02:00:00 pm'),
(17, 28, '2024-12-21', 'Dec', '1', '08:00:00 am', '01:30:00 pm');

-- --------------------------------------------------------

--
-- Table structure for table `department`
--
-- Creation: Oct 05, 2024 at 10:17 AM
--

DROP TABLE IF EXISTS `department`;
CREATE TABLE IF NOT EXISTS `department` (
  `dep_id` int(11) NOT NULL AUTO_INCREMENT,
  `department_name` varchar(100) NOT NULL,
  PRIMARY KEY (`dep_id`)
) ENGINE=InnoDB AUTO_INCREMENT=7 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- RELATIONSHIPS FOR TABLE `department`:
--

--
-- Truncate table before insert `department`
--

TRUNCATE TABLE `department`;
--
-- Dumping data for table `department`
--

INSERT DELAYED IGNORE INTO `department` (`dep_id`, `department_name`) VALUES
(1, 'Garowe'),
(2, 'Shaxda'),
(3, 'Xamar'),
(4, 'Bosaso'),
(5, 'Galkacyo'),
(6, 'qardho');

-- --------------------------------------------------------

--
-- Table structure for table `employee`
--
-- Creation: Oct 05, 2024 at 10:12 AM
--

DROP TABLE IF EXISTS `employee`;
CREATE TABLE IF NOT EXISTS `employee` (
  `emp_id` int(11) NOT NULL AUTO_INCREMENT,
  `emp_name` varchar(100) NOT NULL,
  `emp_phone` varchar(50) NOT NULL,
  `emp_address` varchar(100) NOT NULL,
  `gender` varchar(10) NOT NULL,
  `dep_id` int(11) NOT NULL,
  `sch_id` int(11) NOT NULL,
  `emp_photo` varchar(100) NOT NULL,
  `created_at` datetime DEFAULT NULL,
  `updated_at` datetime DEFAULT NULL,
  PRIMARY KEY (`emp_id`),
  KEY `dep_id` (`dep_id`),
  KEY `sch_id` (`sch_id`)
) ENGINE=InnoDB AUTO_INCREMENT=31 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- RELATIONSHIPS FOR TABLE `employee`:
--   `dep_id`
--       `department` -> `dep_id`
--   `sch_id`
--       `schedule` -> `sch_id`
--

--
-- Truncate table before insert `employee`
--

TRUNCATE TABLE `employee`;
--
-- Dumping data for table `employee`
--

INSERT DELAYED IGNORE INTO `employee` (`emp_id`, `emp_name`, `emp_phone`, `emp_address`, `gender`, `dep_id`, `sch_id`, `emp_photo`, `created_at`, `updated_at`) VALUES
(24, 'Pep Guardiola', '0905386724', 'hodan', 'male', 5, 19, 'img/Aurum-Speakers-Bureau-Pep-Guardi.png', '2024-10-13 04:48:27', NULL),
(25, ' Steve Jobs ', '666572198', 'Sunami', 'male', 1, 22, 'img/b8f49c7fba7e3d6dd996cf4747fcc866.png', '2024-10-13 05:39:22', '2024-10-14 08:41:13'),
(26, 'Abdullahi Abdirizaq sahal', '905386724', 'Sunami', 'male', 1, 20, 'img/Alaska.jpg', '2024-10-13 05:39:56', NULL),
(27, 'Axmed yusuf', '7737237', 'ma dareemin', 'male', 6, 21, 'img/WhatsApp Image 2024-10-04 at 03.19.03_d515c587.jpg', '2024-10-13 05:40:31', NULL),
(28, 'Abdikdir Daauud', '09067563553', 'Sunami', 'male', 1, 20, 'img/nan.jpg', '2024-11-18 14:41:19', NULL),
(29, 'ahmed salah', '09070347474', 'hodan garowe', 'male', 1, 23, 'img/pexels-one-editor-llc-17120235-6452075.jpg', '2024-12-20 17:46:59', NULL),
(30, ' Abdirahmaan Abdishakuur', '0906572198', 'israac ', 'male', 1, 23, 'img/AdobeStock_932127794_Preview.jpeg', '2024-12-21 10:59:55', '2024-12-21 11:00:50');

-- --------------------------------------------------------

--
-- Table structure for table `schedule`
--
-- Creation: Oct 05, 2024 at 10:16 AM
--

DROP TABLE IF EXISTS `schedule`;
CREATE TABLE IF NOT EXISTS `schedule` (
  `sch_id` int(11) NOT NULL AUTO_INCREMENT,
  `time_in` varchar(100) NOT NULL,
  `time_out` varchar(100) NOT NULL,
  PRIMARY KEY (`sch_id`)
) ENGINE=InnoDB AUTO_INCREMENT=24 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- RELATIONSHIPS FOR TABLE `schedule`:
--

--
-- Truncate table before insert `schedule`
--

TRUNCATE TABLE `schedule`;
--
-- Dumping data for table `schedule`
--

INSERT DELAYED IGNORE INTO `schedule` (`sch_id`, `time_in`, `time_out`) VALUES
(19, '01.00.00 AM', '10.00.00 PM'),
(20, '08.00.00 AM', '01.30.00 PM'),
(21, '02.00.00 AM', '07.00.00 PM'),
(22, '04.00.00 PM', '10.00.00 PM'),
(23, '08.30.00 AM', '02.00.00 PM');

-- --------------------------------------------------------

--
-- Table structure for table `users`
--
-- Creation: Oct 10, 2024 at 05:05 AM
--

DROP TABLE IF EXISTS `users`;
CREATE TABLE IF NOT EXISTS `users` (
  `user_id` int(11) NOT NULL AUTO_INCREMENT,
  `fullname` varchar(100) NOT NULL,
  `username` varchar(50) NOT NULL,
  `password` varchar(50) NOT NULL,
  `role` varchar(50) NOT NULL,
  `user_photo` varchar(100) NOT NULL,
  `created_at` datetime DEFAULT NULL,
  `updated_at` datetime DEFAULT NULL,
  PRIMARY KEY (`user_id`)
) ENGINE=InnoDB AUTO_INCREMENT=19 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- RELATIONSHIPS FOR TABLE `users`:
--

--
-- Truncate table before insert `users`
--

TRUNCATE TABLE `users`;
--
-- Dumping data for table `users`
--

INSERT DELAYED IGNORE INTO `users` (`user_id`, `fullname`, `username`, `password`, `role`, `user_photo`, `created_at`, `updated_at`) VALUES
(15, 'shooli omar', 'user', '111', 'user', 'img/abdi.png', '2024-12-20 17:40:35', '2024-12-23 02:51:00'),
(17, 'Abdirahman Abdishakur ', 'admin', '123', 'admin', 'img/man.png', '2024-12-23 14:45:04', '2024-12-23 02:45:25'),
(18, 'puntland state university', 'psu', '111', 'user', 'img/psu22.jpg', '2024-12-30 14:59:51', NULL);

--
-- Constraints for dumped tables
--

--
-- Constraints for table `attendanc`
--
ALTER TABLE `attendanc`
  ADD CONSTRAINT `attendanc_ibfk_1` FOREIGN KEY (`emp_id`) REFERENCES `employee` (`emp_id`);

--
-- Constraints for table `employee`
--
ALTER TABLE `employee`
  ADD CONSTRAINT `employee_ibfk_1` FOREIGN KEY (`dep_id`) REFERENCES `department` (`dep_id`),
  ADD CONSTRAINT `employee_ibfk_2` FOREIGN KEY (`sch_id`) REFERENCES `schedule` (`sch_id`);


--
-- Metadata
--
USE `phpmyadmin`;

--
-- Metadata for table attendanc
--

--
-- Truncate table before insert `pma__column_info`
--

TRUNCATE TABLE `pma__column_info`;
--
-- Truncate table before insert `pma__table_uiprefs`
--

TRUNCATE TABLE `pma__table_uiprefs`;
--
-- Truncate table before insert `pma__tracking`
--

TRUNCATE TABLE `pma__tracking`;
--
-- Metadata for table department
--

--
-- Truncate table before insert `pma__column_info`
--

TRUNCATE TABLE `pma__column_info`;
--
-- Truncate table before insert `pma__table_uiprefs`
--

TRUNCATE TABLE `pma__table_uiprefs`;
--
-- Truncate table before insert `pma__tracking`
--

TRUNCATE TABLE `pma__tracking`;
--
-- Metadata for table employee
--

--
-- Truncate table before insert `pma__column_info`
--

TRUNCATE TABLE `pma__column_info`;
--
-- Truncate table before insert `pma__table_uiprefs`
--

TRUNCATE TABLE `pma__table_uiprefs`;
--
-- Truncate table before insert `pma__tracking`
--

TRUNCATE TABLE `pma__tracking`;
--
-- Metadata for table schedule
--

--
-- Truncate table before insert `pma__column_info`
--

TRUNCATE TABLE `pma__column_info`;
--
-- Truncate table before insert `pma__table_uiprefs`
--

TRUNCATE TABLE `pma__table_uiprefs`;
--
-- Truncate table before insert `pma__tracking`
--

TRUNCATE TABLE `pma__tracking`;
--
-- Metadata for table users
--

--
-- Truncate table before insert `pma__column_info`
--

TRUNCATE TABLE `pma__column_info`;
--
-- Truncate table before insert `pma__table_uiprefs`
--

TRUNCATE TABLE `pma__table_uiprefs`;
--
-- Truncate table before insert `pma__tracking`
--

TRUNCATE TABLE `pma__tracking`;
--
-- Metadata for database hrm
--

--
-- Truncate table before insert `pma__bookmark`
--

TRUNCATE TABLE `pma__bookmark`;
--
-- Truncate table before insert `pma__relation`
--

TRUNCATE TABLE `pma__relation`;
--
-- Truncate table before insert `pma__savedsearches`
--

TRUNCATE TABLE `pma__savedsearches`;
--
-- Truncate table before insert `pma__central_columns`
--

TRUNCATE TABLE `pma__central_columns`;SET FOREIGN_KEY_CHECKS=1;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
