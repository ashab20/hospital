-- phpMyAdmin SQL Dump
-- version 5.1.1deb5ubuntu1
-- https://www.phpmyadmin.net/
--
-- Host: localhost:3306
-- Generation Time: Jul 15, 2022 at 07:17 PM
-- Server version: 10.6.7-MariaDB-2ubuntu1.1
-- PHP Version: 8.1.2


SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";



create table `user`(id int auto_increment primary key,avatar varchar(255), name varchar(255)not null,email varchar(40)  unique, password char(40) not null, phone varchar(13) unique not null  , roles ENUM('SUPERADMIN','ADMIN','DOCTOR','NURSE','RECIPTIONIST') default 'RECIPTIONIST',address text , created_at timestamp  , created_by int, modified_at datetime , modified_by int, status int not null default 1 ,foreign key (created_by) references user(id), foreign key (modified_by) references user(id));



-- tested
create table `designation` (id int auto_increment primary key, designation_name varchar(255) not null, base_salary decimal(10,2) not null, bounus_by_percent decimal(5,2), total_bounus int ,created_at  timestamp default now(), created_by int , modified_at timestamp, modified_by int, status int not null default 1, foreign key (modified_by) references user(id),foreign key (created_by) references user(id));

-- tested
create table `department` (id int auto_increment primary key,name varchar(255) not null unique, created_by int,created_at  timestamp not null, modified_at timestamp, modified_by int, status int not null default 1, foreign key (modified_by) references user(id),foreign key (created_by) references user(id));


--  room_no='A5' ,details='ac' , floor='2nd' , created_by=3;
create table `room` (id int auto_increment primary key, room_type ENUM('GENERAL-CABIN','VIP-CABIN','CHAMBER','OT','GUEST-ROOM') default 'GENERAL-CABIN', room_no varchar(30) unique, details varchar(255) , floor varchar(20),created_at  timestamp not null, created_by int, modified_at timestamp, modified_by int, status int not null default 1, foreign key (modified_by) references user(id),foreign key (created_by) references user(id));



-- tested
-- doctor schema
create table `doctor` (id int auto_increment primary key,user_id int,father_name varchar(40) not null, mother_name varchar(40) not null,qualification varchar(100), gratuated_from varchar(100),gender varchar(10) null,date_of_birth  date not null, shift ENUM('MORNING','EVENING','NIGHT'), chamber_id int, designation_id int, visit_fee decimal(7,2),department_id int, created_at  timestamp , created_by int, modified_at timestamp, modified_by int, status int not null default 1,foreign key (user_id) references user(id), foreign key (modified_by) references user(id),foreign key (created_by) references user(id),foreign key (designation_id) references designation(id),foreign key (chamber_id) references room(id),foreign key (department_id) references department(id));



create table `patient` (id int auto_increment primary key,name varchar(40) not null, phone varchar(13) not null unique, gender varchar(10) not null , age varchar(3) not null, weight int, address varchar(30), created_at  timestamp , created_by int, modified_at timestamp, modified_by int, status int not null default 1, foreign key (modified_by) references user(id),foreign key (created_by) references user(id));


-- appointment
create table `appointment` (id int auto_increment primary key,name varchar(40) not null,phone varchar(15) ,patient_id int, message text,doctor_id int, department_id int, date date, time varchar(20), created_at  timestamp  , created_by int, modified_at datetime , modified_by int, status int not null default 1, foreign key (modified_by) references user(id),foreign key (created_by) references user(id),foreign key (doctor_id) references doctor(id),foreign key (patient_id) references patient(id),foreign key (department_id) references department(id));

-- patient schema


create table test (id int auto_increment primary key, test_name varchar(20) unique not null,description mediumtext,  rate decimal(10,2), created_at  timestamp not null, created_by int, modified_at timestamp, modified_by int, status int not null default 1, foreign key (modified_by) references user(id),foreign key (created_by) references user(id));

-- !does not work on windows
-- delivary date not null default date_add(now(),interval 1 day)


-- employee schema
create table `employee` (id int auto_increment primary key,user_id int,father_name varchar(40) not null, mother_name varchar(40) not null,gender varchar(10) null,date_of_birth  date not null, shift ENUM('MORNING','EVENING','NIGHT'),  designation_id int, base_salary int, created_at  timestamp , created_by int, modified_at timestamp, modified_by int, status int not null default 1,foreign key (user_id) references user(id), foreign key (modified_by) references user(id),foreign key (created_by) references user(id),foreign key (designation_id) references designation(id));


create table `employeehistory` (id int auto_increment primary key, emplopyee_id int, joined_date date not null, leave_date date not null, atentance int, absense int , created_at  timestamp not null, created_by int, modified_at timestamp, modified_by int, status int not null default 1,foreign key (emplopyee_id) references employee(id), foreign key (modified_by) references user(id),foreign key (created_by) references user(id));


-- salary
create table `salary` (id int auto_increment primary key, _id varchar(20) unique not null, created_at  timestamp not null, created_by int, modified_at timestamp, modified_by int, status int not null default 1, foreign key (modified_by) references user(id),foreign key (created_by) references user(id));

-- rate
create table `rate` (id int auto_increment primary key, service_name varchar(255), rate decimal(10,2) not null , created_at  timestamp not null, created_by int, modified_at timestamp, modified_by int, status int not null default 1, foreign key (modified_by) references user(id),foreign key (created_by) references user(id));


create table `service` (id int auto_increment primary key, service_name varchar(20), rate int not null , condition_on varchar(100), description varchar (255), duration varchar(20),created_at  timestamp not null, created_by int, modified_at timestamp, modified_by int, status int not null default 1, foreign key (modified_by) references user(id),foreign key (created_by) references user(id));

-- addmit
create table `admit` (id int auto_increment primary key, room_id int , duration int, created_at  timestamp not null, created_by int, modified_at timestamp, modified_by int, status int not null default 1, foreign key (modified_by) references user(id),foreign key (created_by) references user(id));





-- payment schama
create table `invoice_payment`(
    `id` int(11) auto_increment primary key,
  `ipid` varchar(100) NOT NULL,
  `patient_id` int(11) DEFAULT NULL,
  `test_id` longtext CHARACTER SET utf8mb4 COLLATE utf8mb4_bin DEFAULT NULL CHECK (json_valid(`test_id`)),
  `appointment_id` longtext CHARACTER SET utf8mb4 COLLATE utf8mb4_bin DEFAULT NULL CHECK (json_valid(`appointment_id`)),
  `payment_date` timestamp NOT NULL DEFAULT current_timestamp() ON UPDATE current_timestamp(),
  `subtotal` decimal(10,2) UNSIGNED DEFAULT NULL,
  `tax` decimal(10,0) DEFAULT NULL,
  `discount` decimal(10,2) DEFAULT NULL,
  `total` decimal(10,2) NOT NULL,
  `payment` decimal(10,2) DEFAULT NULL,
  `note` varchar(255) DEFAULT NULL,
  `remark` enum('DUE','PAID') DEFAULT NULL,
  `created_at` timestamp NOT NULL DEFAULT current_timestamp(),
  `created_by` int(11) DEFAULT NULL,
  `modified_at` timestamp NOT NULL DEFAULT '0000-00-00 00:00:00',
  `modified_by` int(11) DEFAULT NULL,
  `status` int(11) NOT NULL DEFAULT 1, foreign key (modified_by) references user(id),foreign key (created_by) references user(id),foreign key (patient_id) references patient(id));





create table `report` (id int auto_increment primary key, patient_id int(20),test_id int, payment_id int, printed_at timestamp, condition_on varchar(255) ,  issues_by int,created_at  timestamp not null, created_by int, modified_at timestamp, modified_by int, status int not null default 1, foreign key (modified_by) references user(id),foreign key (created_by) references user(id) , foreign key (issues_by) references doctor(id));


INSERT INTO `user` (`id`, `avatar`, `name`, `email`, `password`, `phone`, `roles`, `address`, `created_at`, `created_by`, `modified_at`, `modified_by`, `status`) VALUES
(1, NULL, 'Ashab Uddin', 'ashab@gmail.com', '125bce26d032f2034e26cf229da4b52e', '01840088189', 'SUPERADMIN', NULL, '2022-07-06 11:34:56', NULL, NULL, NULL, 1),
(2, NULL, 'Mr. Doctor', 'doctor@gmail.com', 'b714337aa8007c433329ef43c7b8252c', '01744100139', 'DOCTOR', 'Bhola', '2022-07-06 11:40:48', 1, NULL, NULL, 1),
(3, NULL, 'Dr. Tashin Mustafe', 'tasin@gmail.com', 'b714337aa8007c433329ef43c7b8252c', '01717661719', 'DOCTOR', 'chawakbazar', '2022-07-15 05:22:07', 1, NULL, NULL, 1);



--
-- Dumping data for table `department`
--

INSERT INTO `department` (`id`, `name`, `created_by`, `created_at`, `modified_at`, `modified_by`, `status`) VALUES
(1, 'Pethology', 1, '2022-07-06 11:41:15', '0000-00-00 00:00:00', NULL, 1),
(2, 'Allergists/Immunologists', 1, '2022-07-06 11:41:34', '0000-00-00 00:00:00', NULL, 1),
(3, 'Anesthesiologists', 1, '2022-07-06 11:41:41', '0000-00-00 00:00:00', NULL, 1);

-- --------------------------------------------------------

--
-- Dumping data for table `designation`
--

INSERT INTO `designation` (`id`, `designation_name`, `base_salary`, `bounus_by_percent`, `total_bounus`, `created_at`, `created_by`, `modified_at`, `modified_by`, `status`) VALUES
(1, 'Reciptionist', '32000.00', '0.15', 2, '2022-07-06 11:42:07', 1, '0000-00-00 00:00:00', NULL, 1),
(2, 'Supervisor', '25000.00', '0.15', 2, '2022-07-06 11:42:34', 1, '0000-00-00 00:00:00', NULL, 1),
(3, 'Medical Officer', '25000.00', '0.15', 2, '2022-07-06 11:42:54', 1, '0000-00-00 00:00:00', NULL, 1);


INSERT INTO `rate` (`id`, `service_name`, `rate`, `created_at`, `created_by`, `modified_at`, `modified_by`, `status`) VALUES
(1, 'MRI', 4000, '2022-07-06 12:01:36', 1, '0000-00-00 00:00:00', NULL, 1);


-- --------------------------------------------------------

--
-- Table structure for table `room`
--


INSERT INTO `room` (`id`, `room_type`, `room_no`, `details`, `floor`, `created_at`, `created_by`, `modified_at`, `modified_by`, `status`) VALUES
(1, 'GENERAL-CABIN', '101', '', 'Ground Floor', '2022-07-06 11:43:26', 1, '0000-00-00 00:00:00', NULL, 1),
(2, 'CHAMBER', '102', '', 'Ground Floor', '2022-07-06 11:43:41', 1, '0000-00-00 00:00:00', NULL, 1),
(3, 'CHAMBER', '103', '', 'Ground Floor', '2022-07-06 11:44:01', 1, '0000-00-00 00:00:00', NULL, 1);




--
-- Dumping data for table `service`
--

INSERT INTO `service` (`id`, `service_name`, `rate`, `condition_on`, `description`, `duration`, `created_at`, `created_by`, `modified_at`, `modified_by`, `status`) VALUES
(1, 'Nebulzer', 300, 'Every Time', '', '', '2022-07-06 12:01:17', 1, '0000-00-00 00:00:00', NULL, 1);


-- Dumping data for table `test`
--

INSERT INTO `test` (`id`, `test_name`, `description`, `rate`, `created_at`, `created_by`, `modified_at`, `modified_by`, `status`) VALUES
(1, 'MRI', 'Full Body Scane', '4000.00', '2022-07-06 11:50:36', 1, '0000-00-00 00:00:00', NULL, 1),
(2, 'X-Ray', 'Normal X-ray', '300.00', '2022-07-06 11:57:20', 1, '0000-00-00 00:00:00', NULL, 1),
(3, 'CBC', '', '4000.00', '2022-07-07 04:27:01', 1, '0000-00-00 00:00:00', NULL, 1),
(4, 'Blood Group Test', '', '100.00', '2022-07-07 04:27:46', 1, '0000-00-00 00:00:00', NULL, 1),
(5, 'Hemoglobin Test', '', '2500.00', '2022-07-07 04:28:25', 1, '0000-00-00 00:00:00', NULL, 1);


