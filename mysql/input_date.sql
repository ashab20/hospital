INSERT INTO `user` (`id`, `avatar`, `name`, `email`, `password`, `phone`, `roles`, `address`, `created_at`, `created_by`, `modified_at`, `modified_by`, `status`) VALUES
(1, NULL, 'Ashab Uddin', 'ashab@gmail.com', '125bce26d032f2034e26cf229da4b52e', '01840088189', 'SUPERADMIN', NULL, '2022-07-06 11:34:56', NULL, NULL, NULL, 1),
(2, NULL, 'Mr. Doctor', 'doctor@gmail.com', 'b714337aa8007c433329ef43c7b8252c', '01744100139', 'DOCTOR', 'Bhola', '2022-07-06 11:40:48', 1, NULL, NULL, 1),
(3, NULL, 'Dr. Tashin Mustafe', 'tasin@gmail.com', 'b714337aa8007c433329ef43c7b8252c', '01717661719', 'DOCTOR', 'chawakbazar', '2022-07-15 05:22:07', 1, NULL, NULL, 1);



-- --------------------------------------------------------




INSERT INTO `department` (`id`, `name`, `created_by`, `created_at`, `modified_at`, `modified_by`, `status`) VALUES
(1, 'Anesthesiologists', NULL, '2022-06-27 06:59:29', '0000-00-00 00:00:00', NULL, 1),
(2, 'Dermatol', NULL, '2022-07-04 04:46:20', '2022-07-04 00:46:20', 2, 1),
(3, 'IDB', 1, '2022-07-03 04:50:39', '2022-07-03 00:50:39', 2, 0),
(4, 'Oncologists', 1, '2022-06-28 03:59:40', '0000-00-00 00:00:00', NULL, 1),
(5, 'Osteopaths', 1, '2022-06-28 04:51:50', '0000-00-00 00:00:00', NULL, 1),
(6, 'Neurologists', 1, '2022-07-04 05:45:44', '2022-07-04 01:45:44', 2, 1),
(7, 'Pathologi', 1, '2022-07-04 05:04:12', '2022-07-04 01:04:12', 2, 1);




INSERT INTO `designation` (`id`, `designation_name`, `base_salary`, `bounus_by_percent`, `total_bounus`, `created_at`, `created_by`, `modified_at`, `modified_by`, `status`) VALUES
(1, 'Arthopadic Doctor', '45000.00', '0.00', 2, '2022-06-28 04:02:18', 1, '2022-07-04 00:59:45', 2, 1),
(2, 'Dentist', '40000.00', '0.15', 2, '2022-06-28 05:13:41', NULL, '2022-07-04 03:18:09', 2, 1),
(3, 'Supervisor', '42000.00', '0.15', 2, '2022-06-29 03:27:32', 1, '0000-00-00 00:00:00', NULL, 1),
(4, 'Recipti', '45000.00', '0.10', 2, '2022-07-04 04:04:02', 2, '2022-07-04 01:17:05', 2, 1);


INSERT INTO `room` (`id`, `room_type`, `room_no`, `details`, `floor`, `created_at`, `created_by`, `modified_at`, `modified_by`, `status`) VALUES (1, 'GENERAL-CABIN', '101', 'Doctor', '1st Floor', '2022-06-28 05:32:27', 1, '0000-00-00 00:00:00', NULL, 1), (2, 'GENERAL-CABIN', '102', 'Kjj', 'Hf', '2022-06-28 05:32:37', 1, '0000-00-00 00:00:00', NULL, 1), (3, 'CHAMBER', '103', 'Ghlkj', '1st Floor', '2022-06-28 05:32:43', 1, '0000-00-00 00:00:00', NULL, 1), (4, 'GUEST-ROOM', '203', 'Doc', '2nd Floor', '2022-06-28 05:32:51', 1, '0000-00-00 00:00:00', NULL, 1), (5, 'VIP-CABIN', '1105', 'Free', '11th Floor', '2022-07-04 07:19:15', 1, '2022-07-04 03:19:15', 2, 1), (6, 'CHAMBER', '104', 'Doctor', '1st Floor', '2022-07-04 04:37:50', 2, '0000-00-00 00:00:00', NULL, 1), (7, 'VIP-CABIN', '709', 'Doctor', '7st Floor', '2022-07-04 05:28:55', 2, '2022-07-04 01:28:55', 2, 1);
--
-- Dumping data for table `doctor`
--



INSERT INTO `service` (`id`, `service_name`, `rate`, `condition_on`, `description`, `duration`, `created_at`, `created_by`, `modified_at`, `modified_by`, `status`) VALUES
(1, 'Dfhwaieh', 1524, 'Hfg', 'Update', 'Hf', '2022-07-05 04:15:46', 1, '2022-07-05 00:15:46', 2, 1),
(2, 'Nebuliger', 200, 'Ok', 'Yes', '1 Hour', '2022-06-28 04:04:53', 1, '0000-00-00 00:00:00', NULL, 1);
--
-- Dumping data for table `patient`
--



-- --------------------------------------------------------


-- Dumping data for table `room`
--

INSERT INTO `room` (`id`, `room_type`, `room_no`, `details`, `floor`, `created_at`, `created_by`, `modified_at`, `modified_by`, `status`) VALUES
(1, 'CHAMBER', '201', '', '2nd Floor', '2022-06-29 03:24:03', 3, '0000-00-00 00:00:00', NULL, 1),
(2, 'CHAMBER', '301', '', '3rd Floor', '2022-06-29 03:24:26', 3, '0000-00-00 00:00:00', NULL, 1),
(3, 'CHAMBER', '105', 'Yhh', 'Htgf', '2022-06-29 05:16:46', 3, '0000-00-00 00:00:00', NULL, 1);

-- 


INSERT INTO `department` (`id`, `name`, `created_by`, `created_at`, `modified_at`, `modified_by`, `status`) VALUES
(1, 'Allergists/Immunologists', NULL, '2022-06-27 06:17:37', '0000-00-00 00:00:00', NULL, 1),
(2, 'Anesthesiologists', NULL, '2022-06-27 06:17:54', '0000-00-00 00:00:00', NULL, 1),
(3, 'Gastroenterologists', NULL, '2022-06-27 06:18:07', '0000-00-00 00:00:00', NULL, 1),
(4, 'Family Physicians\r\n', NULL, '2022-06-27 06:18:19', '0000-00-00 00:00:00', NULL, 1);


INSERT INTO `rate` (`id`, `service_name`, `rate`, `created_at`, `created_by`, `modified_at`, `modified_by`, `status`) VALUES
(1, 'Blood Test', 2500, '2022-07-05 04:16:21', 1, '2022-07-05 00:16:21', 2, 1),
(2, 'X-ray', 1500, '2022-06-28 07:10:38', 1, '0000-00-00 00:00:00', NULL, 1),
(3, 'Oxyzen', 1000, '2022-06-29 04:06:47', 2, '0000-00-00 00:00:00', NULL, 1),
(4, 'MRI', 6000, '2022-07-05 04:32:02', 2, '0000-00-00 00:00:00', NULL, 1);



INSERT INTO `room` (`id`, `room_type`, `room_no`, `details`, `floor`, `created_at`, `created_by`, `modified_at`, `modified_by`, `status`) VALUES
(1, 'CHAMBER', '101', NULL, 'Ground Floor', '2022-06-27 06:12:26', NULL, '0000-00-00 00:00:00', NULL, 1),
(2, 'CHAMBER', '102', NULL, '1st Floor', '2022-06-27 06:12:55', NULL, '0000-00-00 00:00:00', NULL, 1);


INSERT INTO `test` (`id`, `test_name`, `description`, `rate`, `created_at`, `created_by`, `modified_at`, `modified_by`, `status`) VALUES
(1, 'MRI', 'Full Body Scane', '4000.00', '2022-07-06 11:50:36', 1, '0000-00-00 00:00:00', NULL, 1),
(2, 'X-Ray', 'Normal X-ray', '300.00', '2022-07-06 11:57:20', 1, '0000-00-00 00:00:00', NULL, 1),
(3, 'CBC', '', '4000.00', '2022-07-07 04:27:01', 1, '0000-00-00 00:00:00', NULL, 1),
(4, 'Blood Group Test', '', '100.00', '2022-07-07 04:27:46', 1, '0000-00-00 00:00:00', NULL, 1),
(5, 'Hemoglobin Test', '', '2500.00', '2022-07-07 04:28:25', 1, '0000-00-00 00:00:00', NULL, 1);
