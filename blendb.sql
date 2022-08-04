-- phpMyAdmin SQL Dump
-- version 5.2.0
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Jul 15, 2022 at 02:42 PM
-- Server version: 10.4.24-MariaDB
-- PHP Version: 8.1.6

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `blendb`
--

-- --------------------------------------------------------

--
-- Table structure for table `attendance`
--

CREATE TABLE `attendance` (
  `id` int(11) NOT NULL,
  `userID` text NOT NULL,
  `dep_id` text NOT NULL,
  `attendanceTime` text NOT NULL,
  `timeOfTheDay` text DEFAULT NULL,
  `att_Status` text DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `attendance`
--

INSERT INTO `attendance` (`id`, `userID`, `dep_id`, `attendanceTime`, `timeOfTheDay`, `att_Status`) VALUES
(23, 'beruk01', '1', '2022-07-13 16:34:32', 'afternoon', 'late'),
(24, 'beruk01', '1', '2022-07-14 18:33:57', 'afternoon', 'present'),
(25, 'beruk01', '1', '2022-07-15 18:33:57', 'afternoon', 'acc_late'),
(26, 'amha01', '2', '2022-07-13 18:33:57', 'afternoon', 'acc_late'),
(27, 'amha01', '2', '2022-07-14 18:33:57', 'afternoon', 'late'),
(28, 'amha01', '2', '2022-07-15 18:33:57', 'afternoon', 'present'),
(29, 'almaz01', '3', '2022-07-13 18:33:57', 'afternoon', 'acc_late'),
(30, 'almaz01', '3', '2022-07-14 18:33:57', 'afternoon', 'acc_late'),
(31, 'almaz01', '3', '2022-07-15 18:33:57', 'afternoon', 'acc_late');

-- --------------------------------------------------------

--
-- Table structure for table `departments`
--

CREATE TABLE `departments` (
  `dep_id` int(4) NOT NULL,
  `departmentname` varchar(50) NOT NULL,
  `departmentcode` varchar(5) NOT NULL,
  `creationdate` datetime NOT NULL DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `departments`
--

INSERT INTO `departments` (`dep_id`, `departmentname`, `departmentcode`, `creationdate`) VALUES
(1, 'Human Resource', 'A0001', '2022-07-06 16:31:28'),
(2, 'IT', 'IT000', '2022-07-06 16:32:32'),
(3, 'marketing', 'm0003', '2022-07-06 16:45:58'),
(4, 'finance and acc', 'f0005', '2022-07-06 16:46:17'),
(7, 'sales', 'S0001', '2022-07-11 14:09:42'),
(9, 'corporate', 'cor00', '2022-07-13 20:38:05');

-- --------------------------------------------------------

--
-- Table structure for table `employee`
--

CREATE TABLE `employee` (
  `emp_id` int(4) NOT NULL,
  `f_name` text NOT NULL,
  `l_name` text NOT NULL,
  `userID` text NOT NULL,
  `password` text NOT NULL,
  `email` text NOT NULL,
  `registered_date` datetime NOT NULL DEFAULT current_timestamp(),
  `dob` varchar(100) NOT NULL,
  `phone` int(10) NOT NULL,
  `adress` varchar(100) NOT NULL,
  `gender` varchar(6) NOT NULL,
  `position` enum('staff','humanresource','manager','') NOT NULL,
  `dep_id` text NOT NULL,
  `Status` int(1) NOT NULL DEFAULT 1,
  `available_leave_date` int(11) NOT NULL DEFAULT 15
) ENGINE=MyISAM DEFAULT CHARSET=latin1;

--
-- Dumping data for table `employee`
--

INSERT INTO `employee` (`emp_id`, `f_name`, `l_name`, `userID`, `password`, `email`, `registered_date`, `dob`, `phone`, `adress`, `gender`, `position`, `dep_id`, `Status`, `available_leave_date`) VALUES
(16, 'marken', 'ayele', 'marken01', '202cb962ac59075b964b07152d234b70', 'marken@gmail.com', '2022-07-12 23:26:46', '2000-01-01', 911998877, 'kera', 'Male', 'staff', 'corporate', 0, 19),
(15, 'leul', 'berhanu', 'leul01', '202cb962ac59075b964b07152d234b70', 'lb@gmail.com', '2022-07-12 23:24:07', '2000-01-01', 938067108, 'mekanisa', 'Male', 'manager', 'IT', 1, 14),
(10, 'beruk', 'berhanu', 'beruk01', '202cb962ac59075b964b07152d234b70', 'berukberhanua@gmail.com', '2022-07-12 17:45:41', '2000-01-01', 944363343, 'sarbet', 'Male', 'staff', 'sales', 1, 14),
(11, 'almaz', 'ayana', 'almaz01', '202cb962ac59075b964b07152d234b70', 'almi@gmail.com', '2022-07-12 17:50:57', '2000-01-01', 901020304, 'arada', 'Female', 'staff', 'marketing', 1, 14),
(12, 'asfaw', 'ayalkibet', 'asfaw01', '202cb962ac59075b964b07152d234b70', 'asfaw@gmail.com', '2022-07-12 17:55:49', '1996-01-01', 919187353, 'lancha', 'Male', 'staff', 'IT', 1, 13),
(14, 'gerum', 'berhanu', 'gerum11', '202cb962ac59075b964b07152d234b70', 'gerum@gmail.com', '2022-07-12 22:57:32', '2000-01-02', 934353637, 'mekanisa', 'Male', 'humanresource', 'Human Resource', 1, 14),
(17, 'nahom', 'kebede', 'nahom01', '202cb962ac59075b964b07152d234b70', 'nahi@gmail.com', '2022-07-13 20:16:25', '2000-01-01', 9939699, 'bole', 'Male', 'manager', 'finance and acc', 1, 14),
(18, 'jo', 'seleshi', 'jo01', 'e10adc3949ba59abbe56e057f20f883e', 'jo@gmail.com', '2022-07-14 09:23:41', '1999-01-01', 933859817, 'gerji', 'Male', 'manager', 'marketing', 1, 14),
(19, 'amha', 'ayalkibet', 'amha01', 'e10adc3949ba59abbe56e057f20f883e', 'amha@gmail.com', '2022-07-14 13:03:09', '2000-01-01', 930303030, 'gofa', 'male', 'staff', 'marketing', 1, 14);

-- --------------------------------------------------------

--
-- Table structure for table `leave_types`
--

CREATE TABLE `leave_types` (
  `lt_id` int(4) NOT NULL,
  `category` varchar(120) NOT NULL,
  `description` text NOT NULL,
  `creationdate` datetime NOT NULL DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `leave_types`
--

INSERT INTO `leave_types` (`lt_id`, `category`, `description`, `creationdate`) VALUES
(1, 'homelander', 'milk', '2022-07-11 14:22:09'),
(3, 'butcher', 'cunt', '2022-07-13 03:19:56'),
(5, 'annual_leave', 'annual leave', '2022-07-15 11:48:44');

-- --------------------------------------------------------

--
-- Table structure for table `report`
--

CREATE TABLE `report` (
  `re_id` int(100) NOT NULL,
  `userID` text NOT NULL,
  `name` text NOT NULL,
  `department` text NOT NULL,
  `att_status` text NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

-- --------------------------------------------------------

--
-- Table structure for table `requested_leaves`
--

CREATE TABLE `requested_leaves` (
  `leave_id` int(4) NOT NULL,
  `leavetype` varchar(120) NOT NULL,
  `todate` varchar(120) NOT NULL,
  `fromdate` varchar(120) NOT NULL,
  `postingdate` timestamp NOT NULL DEFAULT current_timestamp() ON UPDATE current_timestamp(),
  `manager_remark` text DEFAULT NULL,
  `remark_date` varchar(120) DEFAULT NULL,
  `Status` int(1) NOT NULL,
  `isread` int(1) NOT NULL,
  `id_emp` int(1) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `requested_leaves`
--

INSERT INTO `requested_leaves` (`leave_id`, `leavetype`, `todate`, `fromdate`, `postingdate`, `manager_remark`, `remark_date`, `Status`, `isread`, `id_emp`) VALUES
(1, 'homelander', '2022-07-13', '2022-07-15', '2022-07-15 09:39:25', 'sd', '2022-07-15 12:39:25 ', 1, 1, 12),
(3, 'butcher', '2022-07-13', '2022-07-19', '2022-07-14 12:37:10', NULL, NULL, 0, 1, 16),
(5, 'homelander', '2022-07-13', '2022-07-16', '2022-07-13 21:05:54', 'not for homelander', '2022-07-14 0:05:54 ', 2, 1, 10),
(6, 'homelander', '2022-07-13', '2022-08-03', '2022-07-13 20:58:32', NULL, '2022-07-13 23:58:32 ', 1, 1, 11),
(7, 'annual_leave', '2022-07-15', '2022-07-15', '2022-07-15 09:15:18', 'ljl', '2022-07-15 12:15:18 ', 1, 1, 19);

--
-- Indexes for dumped tables
--

--
-- Indexes for table `attendance`
--
ALTER TABLE `attendance`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `departments`
--
ALTER TABLE `departments`
  ADD PRIMARY KEY (`dep_id`),
  ADD UNIQUE KEY `departmentcode` (`departmentcode`);

--
-- Indexes for table `employee`
--
ALTER TABLE `employee`
  ADD PRIMARY KEY (`emp_id`),
  ADD UNIQUE KEY `phone` (`phone`),
  ADD UNIQUE KEY `userID` (`userID`) USING HASH,
  ADD UNIQUE KEY `email` (`email`) USING HASH;

--
-- Indexes for table `leave_types`
--
ALTER TABLE `leave_types`
  ADD PRIMARY KEY (`lt_id`);

--
-- Indexes for table `report`
--
ALTER TABLE `report`
  ADD PRIMARY KEY (`re_id`);

--
-- Indexes for table `requested_leaves`
--
ALTER TABLE `requested_leaves`
  ADD PRIMARY KEY (`leave_id`),
  ADD UNIQUE KEY `id_emp` (`id_emp`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `attendance`
--
ALTER TABLE `attendance`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=32;

--
-- AUTO_INCREMENT for table `departments`
--
ALTER TABLE `departments`
  MODIFY `dep_id` int(4) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=10;

--
-- AUTO_INCREMENT for table `employee`
--
ALTER TABLE `employee`
  MODIFY `emp_id` int(4) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=20;

--
-- AUTO_INCREMENT for table `leave_types`
--
ALTER TABLE `leave_types`
  MODIFY `lt_id` int(4) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;

--
-- AUTO_INCREMENT for table `report`
--
ALTER TABLE `report`
  MODIFY `re_id` int(100) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `requested_leaves`
--
ALTER TABLE `requested_leaves`
  MODIFY `leave_id` int(4) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=9;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
