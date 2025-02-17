-- phpMyAdmin SQL Dump
-- version 5.2.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Feb 17, 2025 at 11:19 AM
-- Server version: 10.4.32-MariaDB
-- PHP Version: 8.2.12

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

-- --------------------------------------------------------

--
-- Table structure for table `attendanc`
--

CREATE TABLE `attendanc` (
  `att_id` int(11) NOT NULL,
  `emp_id` int(11) NOT NULL,
  `date` varchar(100) NOT NULL,
  `monthly` varchar(100) NOT NULL,
  `status` varchar(50) NOT NULL,
  `time_in` varchar(50) NOT NULL,
  `time_out` varchar(50) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

-- --------------------------------------------------------

--
-- Table structure for table `department`
--

CREATE TABLE `department` (
  `dep_id` int(11) NOT NULL,
  `department_name` varchar(100) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `department`
--

INSERT INTO `department` (`dep_id`, `department_name`) VALUES
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

CREATE TABLE `employee` (
  `emp_id` int(11) NOT NULL,
  `emp_name` varchar(100) NOT NULL,
  `emp_phone` varchar(50) NOT NULL,
  `emp_address` varchar(100) NOT NULL,
  `gender` varchar(10) NOT NULL,
  `dep_id` int(11) NOT NULL,
  `sch_id` int(11) NOT NULL,
  `emp_photo` varchar(100) NOT NULL,
  `created_at` datetime DEFAULT NULL,
  `updated_at` datetime DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `employee`
--

INSERT INTO `employee` (`emp_id`, `emp_name`, `emp_phone`, `emp_address`, `gender`, `dep_id`, `sch_id`, `emp_photo`, `created_at`, `updated_at`) VALUES
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

CREATE TABLE `schedule` (
  `sch_id` int(11) NOT NULL,
  `time_in` varchar(100) NOT NULL,
  `time_out` varchar(100) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `schedule`
--

INSERT INTO `schedule` (`sch_id`, `time_in`, `time_out`) VALUES
(19, '01.00.00 AM', '10.00.00 PM'),
(20, '08.00.00 AM', '01.30.00 PM'),
(21, '02.00.00 AM', '07.00.00 PM'),
(22, '04.00.00 PM', '10.00.00 PM'),
(23, '08.30.00 AM', '02.00.00 PM');

-- --------------------------------------------------------

--
-- Table structure for table `users`
--

CREATE TABLE `users` (
  `user_id` int(11) NOT NULL,
  `fullname` varchar(100) NOT NULL,
  `username` varchar(50) NOT NULL,
  `password` varchar(50) NOT NULL,
  `role` varchar(50) NOT NULL,
  `user_photo` varchar(100) NOT NULL,
  `created_at` datetime DEFAULT NULL,
  `updated_at` datetime DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `users`
--

INSERT INTO `users` (`user_id`, `fullname`, `username`, `password`, `role`, `user_photo`, `created_at`, `updated_at`) VALUES
(15, 'shooli omar', 'user', '111', 'user', 'img/abdi.png', '2024-12-20 17:40:35', '2024-12-23 02:51:00'),
(17, 'Abdirahman Abdishakur ', 'admin', '123', 'admin', 'img/man.png', '2024-12-23 14:45:04', '2024-12-23 02:45:25'),
(18, 'puntland state university', 'psu', '111', 'user', 'img/psu22.jpg', '2024-12-30 14:59:51', NULL);

--
-- Indexes for dumped tables
--

--
-- Indexes for table `attendanc`
--
ALTER TABLE `attendanc`
  ADD PRIMARY KEY (`att_id`),
  ADD KEY `emp_id` (`emp_id`);

--
-- Indexes for table `department`
--
ALTER TABLE `department`
  ADD PRIMARY KEY (`dep_id`);

--
-- Indexes for table `employee`
--
ALTER TABLE `employee`
  ADD PRIMARY KEY (`emp_id`),
  ADD KEY `dep_id` (`dep_id`),
  ADD KEY `sch_id` (`sch_id`);

--
-- Indexes for table `schedule`
--
ALTER TABLE `schedule`
  ADD PRIMARY KEY (`sch_id`);

--
-- Indexes for table `users`
--
ALTER TABLE `users`
  ADD PRIMARY KEY (`user_id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `attendanc`
--
ALTER TABLE `attendanc`
  MODIFY `att_id` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `department`
--
ALTER TABLE `department`
  MODIFY `dep_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=7;

--
-- AUTO_INCREMENT for table `employee`
--
ALTER TABLE `employee`
  MODIFY `emp_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=31;

--
-- AUTO_INCREMENT for table `schedule`
--
ALTER TABLE `schedule`
  MODIFY `sch_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=24;

--
-- AUTO_INCREMENT for table `users`
--
ALTER TABLE `users`
  MODIFY `user_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=19;

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
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
