-- phpMyAdmin SQL Dump
-- version 4.8.3
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Jul 06, 2022 at 09:46 AM
-- Server version: 10.1.37-MariaDB
-- PHP Version: 7.2.12

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET AUTOCOMMIT = 0;
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `hospital-2`
--

-- --------------------------------------------------------

--
-- Table structure for table `admit`
--

CREATE TABLE `admit` (
  `id` int(11) NOT NULL,
  `room_id` int(11) DEFAULT NULL,
  `duration` int(11) DEFAULT NULL,
  `created_at` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP,
  `created_by` int(11) DEFAULT NULL,
  `modified_at` timestamp NOT NULL DEFAULT '0000-00-00 00:00:00',
  `modified_by` int(11) DEFAULT NULL,
  `status` int(11) NOT NULL DEFAULT '1'
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

-- --------------------------------------------------------

--
-- Table structure for table `appointment`
--

CREATE TABLE `appointment` (
  `id` int(11) NOT NULL,
  `name` varchar(40) NOT NULL,
  `phone` varchar(15) DEFAULT NULL,
  `patient_id` int(11) DEFAULT NULL,
  `message` mediumtext,
  `doctor_id` int(11) DEFAULT NULL,
  `department_id` int(11) DEFAULT NULL,
  `date` date DEFAULT NULL,
  `time` varchar(20) DEFAULT NULL,
  `created_at` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP,
  `created_by` int(11) DEFAULT NULL,
  `modified_at` datetime DEFAULT NULL,
  `modified_by` int(11) DEFAULT NULL,
  `status` int(11) NOT NULL DEFAULT '1'
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `appointment`
--

INSERT INTO `appointment` (`id`, `name`, `phone`, `patient_id`, `message`, `doctor_id`, `department_id`, `date`, `time`, `created_at`, `created_by`, `modified_at`, `modified_by`, `status`) VALUES
(1, 'Sdfsdfsdf', '43535345', NULL, 'Dfgdfgdfg Dfgdfg Dfg Gdf Dfg ', NULL, NULL, '2022-06-13', NULL, '2022-06-28 21:38:58', NULL, NULL, NULL, 1),
(2, 'Fsdfsdfsd Sdfs Df', '234234234234234', NULL, 'Fdsfd Gsdf Dfg Dfdg', NULL, NULL, '2022-06-25', NULL, '2022-06-28 21:40:12', NULL, NULL, NULL, 1),
(3, 'Karim Ahmad', '017234412312', NULL, 'Serius Problems', NULL, NULL, '2022-07-01', NULL, '2022-06-28 22:16:24', NULL, NULL, NULL, 1),
(4, 'Karim Ahmad', '017234412312', NULL, 'Serius Problems', NULL, NULL, '2022-07-01', NULL, '2022-06-28 22:17:12', NULL, NULL, NULL, 1),
(5, 'Ahmad', '0173453433', NULL, 'Ok', NULL, NULL, '2022-06-30', NULL, '2022-06-28 22:18:45', NULL, NULL, NULL, 1),
(6, 'Rabib Hasan', '017234412323', NULL, 'Ok', NULL, NULL, '2022-06-30', NULL, '2022-06-28 22:21:18', NULL, NULL, NULL, 1),
(7, ' Hasan', '017234412326', NULL, 'Ok', NULL, NULL, '2022-07-02', NULL, '2022-06-28 22:22:00', NULL, NULL, NULL, 1),
(8, 'Sdfsdf', '645645654', NULL, 'Fgdfgdf', NULL, NULL, '2022-07-01', NULL, '2022-06-28 22:24:42', NULL, NULL, NULL, 1),
(9, 'Twhidul Islam Tanim', '01832423423', 4, 'Ok', 2, 1, '2022-07-01', '', '2022-06-28 22:48:42', 3, NULL, NULL, 1),
(11, 'Twhidul Islam Tanim', '01832423423', 4, 'Fevour', 1, 1, '2022-06-30', '', '2022-06-28 22:50:40', 3, NULL, NULL, 1),
(12, 'Twhidul Islam Tanim', '01832423423', 4, 'Gdfgdf', 1, 1, '2022-07-01', '', '2022-06-28 23:09:29', 3, NULL, NULL, 1),
(13, 'Rabib Hasan', '0173001234', NULL, 'Ok', NULL, NULL, '2022-07-01', NULL, '2022-06-29 01:05:23', NULL, NULL, NULL, 1),
(14, 'Helloe', '0174990001', NULL, 'Test', NULL, NULL, '2022-06-30', NULL, '2022-06-29 01:36:18', NULL, NULL, NULL, 1),
(15, 'Biplob Uddin', '05158798790', 2, '', 2, 4, '2022-07-07', '', '2022-07-06 05:14:27', 3, NULL, NULL, 1);

-- --------------------------------------------------------

--
-- Table structure for table `department`
--

CREATE TABLE `department` (
  `id` int(11) NOT NULL,
  `name` varchar(255) NOT NULL,
  `created_by` int(11) DEFAULT NULL,
  `created_at` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP,
  `modified_at` timestamp NOT NULL DEFAULT '0000-00-00 00:00:00',
  `modified_by` int(11) DEFAULT NULL,
  `status` int(11) NOT NULL DEFAULT '1'
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `department`
--

INSERT INTO `department` (`id`, `name`, `created_by`, `created_at`, `modified_at`, `modified_by`, `status`) VALUES
(1, 'Anesthesiologists', NULL, '2022-06-27 00:59:29', '0000-00-00 00:00:00', NULL, 1),
(2, 'Dermatol', NULL, '2022-07-03 22:46:20', '2022-07-03 18:46:20', 2, 1),
(3, 'IDB', 1, '2022-07-02 22:50:39', '2022-07-02 18:50:39', 2, 0),
(4, 'Oncologists', 1, '2022-06-27 21:59:40', '0000-00-00 00:00:00', NULL, 1),
(5, 'Osteopaths', 1, '2022-06-27 22:51:50', '0000-00-00 00:00:00', NULL, 1),
(6, 'Neurologists', 1, '2022-07-03 23:45:44', '2022-07-03 19:45:44', 2, 1),
(7, 'Pathologi', 1, '2022-07-03 23:04:12', '2022-07-03 19:04:12', 2, 1),
(8, 'Another', 3, '2022-07-06 06:23:22', '2022-07-06 02:20:33', 3, 1);

-- --------------------------------------------------------

--
-- Table structure for table `designation`
--

CREATE TABLE `designation` (
  `id` int(11) NOT NULL,
  `designation_name` varchar(255) NOT NULL,
  `base_salary` decimal(10,2) NOT NULL,
  `bounus_by_percent` decimal(5,2) DEFAULT NULL,
  `total_bounus` int(11) DEFAULT NULL,
  `created_at` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP,
  `created_by` int(11) DEFAULT NULL,
  `modified_at` timestamp NOT NULL DEFAULT '0000-00-00 00:00:00',
  `modified_by` int(11) DEFAULT NULL,
  `status` int(11) NOT NULL DEFAULT '1'
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `designation`
--

INSERT INTO `designation` (`id`, `designation_name`, `base_salary`, `bounus_by_percent`, `total_bounus`, `created_at`, `created_by`, `modified_at`, `modified_by`, `status`) VALUES
(1, 'Arthopadic Doctor', '45000.00', '0.00', 2, '2022-06-27 22:02:18', 1, '2022-07-03 18:59:45', 2, 1),
(2, 'Dentist', '40000.00', '0.15', 2, '2022-06-27 23:13:41', NULL, '2022-07-03 21:18:09', 2, 1),
(3, 'Supervisor', '42000.00', '0.15', 2, '2022-06-28 21:27:32', 1, '0000-00-00 00:00:00', NULL, 1),
(4, 'Recipti', '45000.00', '0.10', 2, '2022-07-03 22:04:02', 2, '2022-07-03 19:17:05', 2, 1),
(5, 'Arthopadic', '32000.00', '0.15', 2, '2022-07-06 06:21:13', 3, '2022-07-06 02:21:28', 3, 1);

-- --------------------------------------------------------

--
-- Table structure for table `doctor`
--

CREATE TABLE `doctor` (
  `id` int(11) NOT NULL,
  `user_id` int(11) DEFAULT NULL,
  `father_name` varchar(40) NOT NULL,
  `mother_name` varchar(40) NOT NULL,
  `qualification` varchar(100) DEFAULT NULL,
  `gratuated_from` varchar(100) DEFAULT NULL,
  `gender` varchar(10) DEFAULT NULL,
  `date_of_birth` date NOT NULL,
  `shift` enum('MORNING','EVENING','NIGHT') DEFAULT NULL,
  `chamber_id` int(11) DEFAULT NULL,
  `designation_id` int(11) DEFAULT NULL,
  `visit_fee` decimal(7,2) DEFAULT NULL,
  `department_id` int(11) DEFAULT NULL,
  `created_at` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP,
  `created_by` int(11) DEFAULT NULL,
  `modified_at` timestamp NOT NULL DEFAULT '0000-00-00 00:00:00',
  `modified_by` int(11) DEFAULT NULL,
  `status` int(11) NOT NULL DEFAULT '1'
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `doctor`
--

INSERT INTO `doctor` (`id`, `user_id`, `father_name`, `mother_name`, `qualification`, `gratuated_from`, `gender`, `date_of_birth`, `shift`, `chamber_id`, `designation_id`, `visit_fee`, `department_id`, `created_at`, `created_by`, `modified_at`, `modified_by`, `status`) VALUES
(1, 2, 'Md Ruhul Amin', 'Mrs. Ruhul', 'MBBS', 'Chittagong Medical College ', 'male', '2022-06-08', 'NIGHT', NULL, NULL, '1000.00', 2, '2022-06-27 07:08:06', 2, '0000-00-00 00:00:00', NULL, 1),
(2, 5, 'Md Abdul Hamid', 'Mrs. Hamid', 'M.B.B.S', 'CMC', 'male', '2022-07-05', 'EVENING', NULL, NULL, '1000.00', 4, '2022-07-06 04:07:11', 4, '0000-00-00 00:00:00', NULL, 1);

-- --------------------------------------------------------

--
-- Table structure for table `employee`
--

CREATE TABLE `employee` (
  `id` int(11) NOT NULL,
  `user_id` int(11) DEFAULT NULL,
  `father_name` varchar(40) NOT NULL,
  `mother_name` varchar(40) NOT NULL,
  `gender` varchar(10) DEFAULT NULL,
  `date_of_birth` date NOT NULL,
  `shift` enum('MORNING','EVENING','NIGHT') DEFAULT NULL,
  `designation_id` int(11) DEFAULT NULL,
  `base_salary` int(11) DEFAULT NULL,
  `created_at` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP,
  `created_by` int(11) DEFAULT NULL,
  `modified_at` timestamp NOT NULL DEFAULT '0000-00-00 00:00:00',
  `modified_by` int(11) DEFAULT NULL,
  `status` int(11) NOT NULL DEFAULT '1'
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

-- --------------------------------------------------------

--
-- Table structure for table `employeehistory`
--

CREATE TABLE `employeehistory` (
  `id` int(11) NOT NULL,
  `emplopyee_id` int(11) DEFAULT NULL,
  `joined_date` date NOT NULL,
  `leave_date` date NOT NULL,
  `atentance` int(11) DEFAULT NULL,
  `absense` int(11) DEFAULT NULL,
  `created_at` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP,
  `created_by` int(11) DEFAULT NULL,
  `modified_at` timestamp NOT NULL DEFAULT '0000-00-00 00:00:00',
  `modified_by` int(11) DEFAULT NULL,
  `status` int(11) NOT NULL DEFAULT '1'
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

-- --------------------------------------------------------

--
-- Table structure for table `invoice_payment`
--

CREATE TABLE `invoice_payment` (
  `id` int(11) NOT NULL,
  `patient_id` int(11) DEFAULT NULL,
  `test_id` int(11) DEFAULT NULL,
  `appointment_id` int(11) DEFAULT NULL,
  `payment_date` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP,
  `subtotal` int(11) DEFAULT NULL,
  `tax` int(11) DEFAULT NULL,
  `discount` int(11) DEFAULT NULL,
  `total` int(11) DEFAULT NULL,
  `payment` int(11) DEFAULT NULL,
  `remark` varchar(255) DEFAULT NULL,
  `created_at` timestamp NOT NULL DEFAULT '0000-00-00 00:00:00',
  `created_by` int(11) DEFAULT NULL,
  `modified_at` timestamp NOT NULL DEFAULT '0000-00-00 00:00:00',
  `modified_by` int(11) DEFAULT NULL,
  `status` int(11) NOT NULL DEFAULT '1'
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `invoice_payment`
--

INSERT INTO `invoice_payment` (`id`, `patient_id`, `test_id`, `appointment_id`, `payment_date`, `subtotal`, `tax`, `discount`, `total`, `payment`, `remark`, `created_at`, `created_by`, `modified_at`, `modified_by`, `status`) VALUES
(1, 4, 1, NULL, '2022-07-06 05:55:01', 6000, 0, 0, 6000, 0, '', '0000-00-00 00:00:00', NULL, '0000-00-00 00:00:00', NULL, 1),
(2, 2, 2, NULL, '0000-00-00 00:00:00', 7000, 0, 0, 7000, 0, '', '0000-00-00 00:00:00', NULL, '0000-00-00 00:00:00', NULL, 1),
(3, 0, 2, NULL, '0000-00-00 00:00:00', 7000, 10, 200, 7500, 0, '', '0000-00-00 00:00:00', NULL, '0000-00-00 00:00:00', NULL, 1);

-- --------------------------------------------------------

--
-- Table structure for table `patient`
--

CREATE TABLE `patient` (
  `id` int(11) NOT NULL,
  `name` varchar(40) NOT NULL,
  `phone` varchar(13) NOT NULL,
  `gender` varchar(10) NOT NULL,
  `age` varchar(3) NOT NULL,
  `weight` int(11) DEFAULT NULL,
  `address` varchar(30) DEFAULT NULL,
  `created_at` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP,
  `created_by` int(11) DEFAULT NULL,
  `modified_at` timestamp NOT NULL DEFAULT '0000-00-00 00:00:00',
  `modified_by` int(11) DEFAULT NULL,
  `status` int(11) NOT NULL DEFAULT '1'
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `patient`
--

INSERT INTO `patient` (`id`, `name`, `phone`, `gender`, `age`, `weight`, `address`, `created_at`, `created_by`, `modified_at`, `modified_by`, `status`) VALUES
(1, 'Nasim  Ahmed', '01700000000', 'male', '26', NULL, 'ctg', '2022-06-25 23:44:18', 3, '0000-00-00 00:00:00', NULL, 1),
(2, 'Biplob Uddin', '05158798790', 'male', '27', NULL, 'Hatiya', '2022-06-25 23:45:09', 3, '0000-00-00 00:00:00', NULL, 1),
(3, 'Mahadi Rohman', '01660103771', 'male', '24', NULL, 'Cumilla', '2022-06-26 00:51:54', 3, '0000-00-00 00:00:00', NULL, 1),
(4, 'Twhidul Islam Tanim', '01832423423', 'male', '27', NULL, 'Oxyzen', '2022-06-28 00:36:07', 3, '0000-00-00 00:00:00', NULL, 1),
(5, 'MR BP', '02154154514', 'male', '50', NULL, 'Idb dhaka', '2022-06-29 21:27:51', 3, '0000-00-00 00:00:00', NULL, 1),
(6, 'Jalal Uddin', '01825870343', 'male', '28', NULL, 'Fatikchhari', '2022-07-06 06:24:45', 3, '0000-00-00 00:00:00', NULL, 1);

-- --------------------------------------------------------

--
-- Table structure for table `rate`
--

CREATE TABLE `rate` (
  `id` int(11) NOT NULL,
  `service_name` varchar(255) DEFAULT NULL,
  `rate` int(11) NOT NULL,
  `created_at` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP,
  `created_by` int(11) DEFAULT NULL,
  `modified_at` timestamp NOT NULL DEFAULT '0000-00-00 00:00:00',
  `modified_by` int(11) DEFAULT NULL,
  `status` int(11) NOT NULL DEFAULT '1'
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

-- --------------------------------------------------------

--
-- Table structure for table `report`
--

CREATE TABLE `report` (
  `id` int(11) NOT NULL,
  `patient_id` int(20) DEFAULT NULL,
  `test_id` int(11) DEFAULT NULL,
  `payment_id` int(11) DEFAULT NULL,
  `printed_at` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP,
  `condition_on` varchar(255) DEFAULT NULL,
  `issues_by` int(11) DEFAULT NULL,
  `created_at` timestamp NOT NULL DEFAULT '0000-00-00 00:00:00',
  `created_by` int(11) DEFAULT NULL,
  `modified_at` timestamp NOT NULL DEFAULT '0000-00-00 00:00:00',
  `modified_by` int(11) DEFAULT NULL,
  `status` int(11) NOT NULL DEFAULT '1'
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

-- --------------------------------------------------------

--
-- Table structure for table `room`
--

CREATE TABLE `room` (
  `id` int(11) NOT NULL,
  `room_type` enum('GENERAL-CABIN','VIP-CABIN','CHAMBER','OT','GUEST-ROOM') DEFAULT 'GENERAL-CABIN',
  `room_no` varchar(30) DEFAULT NULL,
  `details` varchar(255) DEFAULT NULL,
  `floor` varchar(20) DEFAULT NULL,
  `created_at` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP,
  `created_by` int(11) DEFAULT NULL,
  `modified_at` timestamp NOT NULL DEFAULT '0000-00-00 00:00:00',
  `modified_by` int(11) DEFAULT NULL,
  `status` int(11) NOT NULL DEFAULT '1'
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `room`
--

INSERT INTO `room` (`id`, `room_type`, `room_no`, `details`, `floor`, `created_at`, `created_by`, `modified_at`, `modified_by`, `status`) VALUES
(1, 'GENERAL-CABIN', '101', 'Doctor', '1st Floor', '2022-06-27 23:32:27', 1, '0000-00-00 00:00:00', NULL, 1),
(2, 'GENERAL-CABIN', '101', 'Kjj', 'Hf', '2022-06-27 23:32:37', 1, '0000-00-00 00:00:00', NULL, 1),
(3, 'CHAMBER', '101', 'Ghlkj', '1st Floor', '2022-06-27 23:32:43', 1, '0000-00-00 00:00:00', NULL, 1),
(4, 'GUEST-ROOM', '203', 'Doc', '2nd Floor', '2022-06-27 23:32:51', 1, '0000-00-00 00:00:00', NULL, 1),
(5, 'VIP-CABIN', '1105', 'Free', '11th Floor', '2022-07-04 01:19:15', 1, '2022-07-03 21:19:15', 2, 1),
(6, 'CHAMBER', '101', 'Doctor', '1st Floor', '2022-07-03 22:37:50', 2, '0000-00-00 00:00:00', NULL, 1),
(7, 'VIP-CABIN', '709', 'Doctor', '7st Floor', '2022-07-03 23:28:55', 2, '2022-07-03 19:28:55', 2, 1),
(8, 'GENERAL-CABIN', '105', 'Ac', 'Ground Floor', '2022-07-06 06:25:40', 3, '0000-00-00 00:00:00', NULL, 1);

-- --------------------------------------------------------

--
-- Table structure for table `salary`
--

CREATE TABLE `salary` (
  `id` int(11) NOT NULL,
  `_id` varchar(20) NOT NULL,
  `created_at` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP,
  `created_by` int(11) DEFAULT NULL,
  `modified_at` timestamp NOT NULL DEFAULT '0000-00-00 00:00:00',
  `modified_by` int(11) DEFAULT NULL,
  `status` int(11) NOT NULL DEFAULT '1'
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

-- --------------------------------------------------------

--
-- Table structure for table `service`
--

CREATE TABLE `service` (
  `id` int(11) NOT NULL,
  `service_name` varchar(255) DEFAULT NULL,
  `rate` int(11) NOT NULL,
  `condition_on` varchar(100) DEFAULT NULL,
  `description` varchar(255) DEFAULT NULL,
  `duration` varchar(20) DEFAULT NULL,
  `created_at` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP,
  `created_by` int(11) DEFAULT NULL,
  `modified_at` timestamp NOT NULL DEFAULT '0000-00-00 00:00:00',
  `modified_by` int(11) DEFAULT NULL,
  `status` int(11) NOT NULL DEFAULT '1'
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `service`
--

INSERT INTO `service` (`id`, `service_name`, `rate`, `condition_on`, `description`, `duration`, `created_at`, `created_by`, `modified_at`, `modified_by`, `status`) VALUES
(1, 'Dfhwaieh', 1524, 'Hfg', 'Update', 'Hf', '2022-07-04 22:15:46', 1, '2022-07-04 18:15:46', 2, 1),
(2, 'Nebuliger', 200, 'Ok', 'Yes', '1 Hour', '2022-06-27 22:04:53', 1, '0000-00-00 00:00:00', NULL, 1);

-- --------------------------------------------------------

--
-- Table structure for table `test`
--

CREATE TABLE `test` (
  `id` int(11) NOT NULL,
  `test_name` varchar(20) NOT NULL,
  `description` mediumtext,
  `rate` int(11) DEFAULT NULL,
  `created_at` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP,
  `created_by` int(11) DEFAULT NULL,
  `modified_at` timestamp NOT NULL DEFAULT '0000-00-00 00:00:00',
  `modified_by` int(11) DEFAULT NULL,
  `status` int(11) NOT NULL DEFAULT '1'
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `test`
--

INSERT INTO `test` (`id`, `test_name`, `description`, `rate`, `created_at`, `created_by`, `modified_at`, `modified_by`, `status`) VALUES
(1, 'MRI', 'All Body Checkup', 6000, '2022-07-04 23:37:10', 2, '2022-07-04 19:37:10', 2, 1),
(2, 'Blood Test', 'All Test', 1000, '2022-07-04 23:21:32', 2, '0000-00-00 00:00:00', NULL, 1);

-- --------------------------------------------------------

--
-- Table structure for table `user`
--

CREATE TABLE `user` (
  `id` int(11) NOT NULL,
  `avatar` varchar(255) DEFAULT NULL,
  `name` varchar(255) NOT NULL,
  `email` varchar(40) DEFAULT NULL,
  `password` char(40) NOT NULL,
  `phone` varchar(13) NOT NULL,
  `last_service` date DEFAULT NULL,
  `roles` enum('SUPERADMIN','ADMIN','DOCTOR','EMPLOYEE') DEFAULT 'EMPLOYEE',
  `address` mediumtext,
  `created_at` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP,
  `created_by` int(11) DEFAULT NULL,
  `modified_at` datetime DEFAULT NULL,
  `modified_by` int(11) DEFAULT NULL,
  `status` int(11) NOT NULL DEFAULT '1'
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `user`
--

INSERT INTO `user` (`id`, `avatar`, `name`, `email`, `password`, `phone`, `last_service`, `roles`, `address`, `created_at`, `created_by`, `modified_at`, `modified_by`, `status`) VALUES
(3, '3.jpg', 'Ashab Uddin', 'ashab@gmail.com', '125bce26d032f2034e26cf229da4b52e', '01840088189', NULL, 'SUPERADMIN', NULL, '2022-07-04 01:29:19', NULL, '2022-07-04 09:29:19', 3, 1),
(4, '3.jpg', 'Rabib Hasan', 'rabib@gmail.com', 'b714337aa8007c433329ef43c7b8252c', '01732432423', NULL, 'DOCTOR', 'Bhola', '2022-07-04 01:29:19', 3, '2022-07-04 09:29:19', 3, 1),
(5, '3.jpg', 'Twhidul Islam Tanim', 'twhid@gmail.com', 'b714337aa8007c433329ef43c7b8252c', '0184288176', NULL, 'EMPLOYEE', 'CTG', '2022-07-04 01:29:19', 3, '2022-07-04 09:29:19', 3, 1),
(6, '3.jpg', 'Wdpf', 'wdpf@gmail.com', 'b714337aa8007c433329ef43c7b8252c', '01324234234', NULL, 'SUPERADMIN', 'ctg', '2022-07-04 01:29:19', 3, '2022-07-04 09:29:19', 3, 1),
(7, '3.jpg', 'Rahat Hasan', 'rahathasan@gmail.com', 'b714337aa8007c433329ef43c7b8252c', '01732423432', NULL, 'DOCTOR', 'ctg', '2022-07-04 01:29:19', 3, '2022-07-04 09:29:19', 3, 1),
(8, NULL, 'Name', 'test@email.com', '0144712dd81be0c3d9724f5e56ce6685', '01840000000', NULL, 'DOCTOR', 'ctg', '2022-07-06 03:57:39', 3, '2022-07-06 05:57:39', 3, 1);

--
-- Indexes for dumped tables
--

--
-- Indexes for table `admit`
--
ALTER TABLE `admit`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `appointment`
--
ALTER TABLE `appointment`
  ADD PRIMARY KEY (`id`),
  ADD KEY `modified_by` (`modified_by`),
  ADD KEY `created_by` (`created_by`),
  ADD KEY `doctor_id` (`doctor_id`),
  ADD KEY `patient_id` (`patient_id`),
  ADD KEY `department_id` (`department_id`);

--
-- Indexes for table `department`
--
ALTER TABLE `department`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `name` (`name`),
  ADD KEY `modified_by` (`modified_by`),
  ADD KEY `created_by` (`created_by`);

--
-- Indexes for table `designation`
--
ALTER TABLE `designation`
  ADD PRIMARY KEY (`id`),
  ADD KEY `modified_by` (`modified_by`),
  ADD KEY `created_by` (`created_by`);

--
-- Indexes for table `doctor`
--
ALTER TABLE `doctor`
  ADD PRIMARY KEY (`id`),
  ADD KEY `user_id` (`user_id`),
  ADD KEY `modified_by` (`modified_by`),
  ADD KEY `created_by` (`created_by`),
  ADD KEY `designation_id` (`designation_id`),
  ADD KEY `chamber_id` (`chamber_id`),
  ADD KEY `department_id` (`department_id`);

--
-- Indexes for table `employee`
--
ALTER TABLE `employee`
  ADD PRIMARY KEY (`id`),
  ADD KEY `user_id` (`user_id`),
  ADD KEY `modified_by` (`modified_by`),
  ADD KEY `created_by` (`created_by`),
  ADD KEY `designation_id` (`designation_id`);

--
-- Indexes for table `employeehistory`
--
ALTER TABLE `employeehistory`
  ADD PRIMARY KEY (`id`),
  ADD KEY `emplopyee_id` (`emplopyee_id`),
  ADD KEY `modified_by` (`modified_by`),
  ADD KEY `created_by` (`created_by`);

--
-- Indexes for table `invoice_payment`
--
ALTER TABLE `invoice_payment`
  ADD PRIMARY KEY (`id`),
  ADD KEY `modified_by` (`modified_by`),
  ADD KEY `created_by` (`created_by`),
  ADD KEY `patient_id` (`patient_id`);

--
-- Indexes for table `patient`
--
ALTER TABLE `patient`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `phone` (`phone`),
  ADD KEY `modified_by` (`modified_by`),
  ADD KEY `created_by` (`created_by`);

--
-- Indexes for table `rate`
--
ALTER TABLE `rate`
  ADD PRIMARY KEY (`id`),
  ADD KEY `modified_by` (`modified_by`),
  ADD KEY `created_by` (`created_by`);

--
-- Indexes for table `report`
--
ALTER TABLE `report`
  ADD PRIMARY KEY (`id`),
  ADD KEY `modified_by` (`modified_by`),
  ADD KEY `created_by` (`created_by`),
  ADD KEY `issues_by` (`issues_by`);

--
-- Indexes for table `room`
--
ALTER TABLE `room`
  ADD PRIMARY KEY (`id`),
  ADD KEY `modified_by` (`modified_by`),
  ADD KEY `created_by` (`created_by`);

--
-- Indexes for table `salary`
--
ALTER TABLE `salary`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `_id` (`_id`),
  ADD KEY `modified_by` (`modified_by`),
  ADD KEY `created_by` (`created_by`);

--
-- Indexes for table `service`
--
ALTER TABLE `service`
  ADD PRIMARY KEY (`id`),
  ADD KEY `modified_by` (`modified_by`),
  ADD KEY `created_by` (`created_by`);

--
-- Indexes for table `test`
--
ALTER TABLE `test`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `test_name` (`test_name`),
  ADD KEY `modified_by` (`modified_by`),
  ADD KEY `created_by` (`created_by`);

--
-- Indexes for table `user`
--
ALTER TABLE `user`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `phone` (`phone`),
  ADD UNIQUE KEY `email` (`email`),
  ADD KEY `created_by` (`created_by`),
  ADD KEY `modified_by` (`modified_by`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `admit`
--
ALTER TABLE `admit`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `appointment`
--
ALTER TABLE `appointment`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=16;

--
-- AUTO_INCREMENT for table `department`
--
ALTER TABLE `department`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=9;

--
-- AUTO_INCREMENT for table `designation`
--
ALTER TABLE `designation`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;

--
-- AUTO_INCREMENT for table `doctor`
--
ALTER TABLE `doctor`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT for table `employee`
--
ALTER TABLE `employee`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `employeehistory`
--
ALTER TABLE `employeehistory`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `invoice_payment`
--
ALTER TABLE `invoice_payment`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT for table `patient`
--
ALTER TABLE `patient`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=7;

--
-- AUTO_INCREMENT for table `rate`
--
ALTER TABLE `rate`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `report`
--
ALTER TABLE `report`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `room`
--
ALTER TABLE `room`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=9;

--
-- AUTO_INCREMENT for table `salary`
--
ALTER TABLE `salary`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `service`
--
ALTER TABLE `service`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT for table `test`
--
ALTER TABLE `test`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT for table `user`
--
ALTER TABLE `user`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=9;

--
-- Constraints for dumped tables
--

--
-- Constraints for table `patient`
--
ALTER TABLE `patient`
  ADD CONSTRAINT `patient_ibfk_1` FOREIGN KEY (`created_by`) REFERENCES `user` (`id`);
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
