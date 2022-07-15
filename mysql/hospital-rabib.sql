

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
(1, 'Anesthesiologists', NULL, '2022-06-27 06:59:29', '0000-00-00 00:00:00', NULL, 1),
(2, 'Dermatol', NULL, '2022-07-04 04:46:20', '2022-07-04 00:46:20', 2, 1),
(3, 'IDB', 1, '2022-07-03 04:50:39', '2022-07-03 00:50:39', 2, 0),
(4, 'Oncologists', 1, '2022-06-28 03:59:40', '0000-00-00 00:00:00', NULL, 1),
(5, 'Osteopaths', 1, '2022-06-28 04:51:50', '0000-00-00 00:00:00', NULL, 1),
(6, 'Neurologists', 1, '2022-07-04 05:45:44', '2022-07-04 01:45:44', 2, 1),
(7, 'Pathologi', 1, '2022-07-04 05:04:12', '2022-07-04 01:04:12', 2, 1);

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
(1, 'Arthopadic Doctor', '45000.00', '0.00', 2, '2022-06-28 04:02:18', 1, '2022-07-04 00:59:45', 2, 1),
(2, 'Dentist', '40000.00', '0.15', 2, '2022-06-28 05:13:41', NULL, '2022-07-04 03:18:09', 2, 1),
(3, 'Supervisor', '42000.00', '0.15', 2, '2022-06-29 03:27:32', 1, '0000-00-00 00:00:00', NULL, 1),
(4, 'Recipti', '45000.00', '0.10', 2, '2022-07-04 04:04:02', 2, '2022-07-04 01:17:05', 2, 1);

-- --------------------------------------------------------

--
-- Table structure for table `doctor`
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

--
-- Dumping data for table `rate`
--

INSERT INTO `rate` (`id`, `service_name`, `rate`, `created_at`, `created_by`, `modified_at`, `modified_by`, `status`) VALUES
(1, 'Blood Test', 2500, '2022-07-05 04:16:21', 1, '2022-07-05 00:16:21', 2, 1),
(2, 'X-ray', 1500, '2022-06-28 07:10:38', 1, '0000-00-00 00:00:00', NULL, 1),
(3, 'Oxyzen', 1000, '2022-06-29 04:06:47', 2, '0000-00-00 00:00:00', NULL, 1),
(4, 'MRI', 6000, '2022-07-05 04:32:02', 2, '0000-00-00 00:00:00', NULL, 1);

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
(1, 'GENERAL-CABIN', '101', 'Doctor', '1st Floor', '2022-06-28 05:32:27', 1, '0000-00-00 00:00:00', NULL, 1),
(2, 'GENERAL-CABIN', '101', 'Kjj', 'Hf', '2022-06-28 05:32:37', 1, '0000-00-00 00:00:00', NULL, 1),
(3, 'CHAMBER', '101', 'Ghlkj', '1st Floor', '2022-06-28 05:32:43', 1, '0000-00-00 00:00:00', NULL, 1),
(4, 'GUEST-ROOM', '203', 'Doc', '2nd Floor', '2022-06-28 05:32:51', 1, '0000-00-00 00:00:00', NULL, 1),
(5, 'VIP-CABIN', '1105', 'Free', '11th Floor', '2022-07-04 07:19:15', 1, '2022-07-04 03:19:15', 2, 1),
(6, 'CHAMBER', '101', 'Doctor', '1st Floor', '2022-07-04 04:37:50', 2, '0000-00-00 00:00:00', NULL, 1),
(7, 'VIP-CABIN', '709', 'Doctor', '7st Floor', '2022-07-04 05:28:55', 2, '2022-07-04 01:28:55', 2, 1);


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
(1, 'Dfhwaieh', 1524, 'Hfg', 'Update', 'Hf', '2022-07-05 04:15:46', 1, '2022-07-05 00:15:46', 2, 1),
(2, 'Nebuliger', 200, 'Ok', 'Yes', '1 Hour', '2022-06-28 04:04:53', 1, '0000-00-00 00:00:00', NULL, 1);

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
(1, 'MRI', 'All Body Checkup', 6000, '2022-07-05 05:37:10', 2, '2022-07-05 01:37:10', 2, 1),
(2, 'Blood Test', 'All Test', 1000, '2022-07-05 05:21:32', 2, '0000-00-00 00:00:00', NULL, 1);




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
-- Indexes for table `rate`
--
ALTER TABLE `rate`
  ADD PRIMARY KEY (`id`),
  ADD KEY `modified_by` (`modified_by`),
  ADD KEY `created_by` (`created_by`);


--
-- Indexes for table `room`
--
ALTER TABLE `room`
  ADD PRIMARY KEY (`id`),
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

ALTER TABLE `admit`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `appointment`
--
ALTER TABLE `appointment`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;

--
-- AUTO_INCREMENT for table `department`
--
ALTER TABLE `department`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=8;

--
-- AUTO_INCREMENT for table `designation`
--
ALTER TABLE `designation`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;




--
-- AUTO_INCREMENT for table `rate`
--
ALTER TABLE `rate`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- AUTO_INCREMENT for table `room`
--
ALTER TABLE `room`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=8;


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
-- Constraints for dumped tables
--

--
-- Constraints for table `admit`
--
ALTER TABLE `admit`
  ADD CONSTRAINT `admit_ibfk_1` FOREIGN KEY (`modified_by`) REFERENCES `user` (`id`),
  ADD CONSTRAINT `admit_ibfk_2` FOREIGN KEY (`created_by`) REFERENCES `user` (`id`);

--
-- Constraints for table `department`
--
ALTER TABLE `department`
  ADD CONSTRAINT `department_ibfk_1` FOREIGN KEY (`modified_by`) REFERENCES `user` (`id`),
  ADD CONSTRAINT `department_ibfk_2` FOREIGN KEY (`created_by`) REFERENCES `user` (`id`);

--
-- Constraints for table `designation`
--
ALTER TABLE `designation`
  ADD CONSTRAINT `designation_ibfk_1` FOREIGN KEY (`modified_by`) REFERENCES `user` (`id`),
  ADD CONSTRAINT `designation_ibfk_2` FOREIGN KEY (`created_by`) REFERENCES `user` (`id`);



--
-- Constraints for table `patient`
--
ALTER TABLE `patient`
  ADD CONSTRAINT `patient_ibfk_1` FOREIGN KEY (`modified_by`) REFERENCES `user` (`id`),
  ADD CONSTRAINT `patient_ibfk_2` FOREIGN KEY (`created_by`) REFERENCES `user` (`id`);

--
-- Constraints for table `rate`
--
ALTER TABLE `rate`
  ADD CONSTRAINT `rate_ibfk_1` FOREIGN KEY (`modified_by`) REFERENCES `user` (`id`),
  ADD CONSTRAINT `rate_ibfk_2` FOREIGN KEY (`created_by`) REFERENCES `user` (`id`);


--
-- Constraints for table `room`
--
ALTER TABLE `room`
  ADD CONSTRAINT `room_ibfk_1` FOREIGN KEY (`modified_by`) REFERENCES `user` (`id`),
  ADD CONSTRAINT `room_ibfk_2` FOREIGN KEY (`created_by`) REFERENCES `user` (`id`);

--
-- Constraints for table `service`
--
ALTER TABLE `service`
  ADD CONSTRAINT `service_ibfk_1` FOREIGN KEY (`modified_by`) REFERENCES `user` (`id`),
  ADD CONSTRAINT `service_ibfk_2` FOREIGN KEY (`created_by`) REFERENCES `user` (`id`);

--
-- Constraints for table `test`
--
ALTER TABLE `test`
  ADD CONSTRAINT `test_ibfk_1` FOREIGN KEY (`modified_by`) REFERENCES `user` (`id`),
  ADD CONSTRAINT `test_ibfk_2` FOREIGN KEY (`created_by`) REFERENCES `user` (`id`);
