
INSERT INTO `user` (`id`, `avatar`, `name`, `email`, `password`, `phone`, `last_service`, `roles`, `address`, `created_at`, `created_by`, `modified_at`, `modified_by`, `status`) VALUES
(3, '3.jpg', 'Ashab Uddin', 'ashab@gmail.com', '125bce26d032f2034e26cf229da4b52e', '01840088189', NULL, 'SUPERADMIN', NULL, '2022-07-04 07:29:19', NULL, '2022-07-04 09:29:19', 3, 1),
(4, '3.jpg', 'Rabib Hasan', 'rabib@gmail.com', 'b714337aa8007c433329ef43c7b8252c', '01732432423', NULL, 'DOCTOR', 'Bhola', '2022-07-04 07:29:19', 3, '2022-07-04 09:29:19', 3, 1),
(5, '3.jpg', 'Twhidul Islam Tanim', 'twhid@gmail.com', 'b714337aa8007c433329ef43c7b8252c', '0184288176', NULL, 'EMPLOYEE', 'CTG', '2022-07-04 07:29:19', 3, '2022-07-04 09:29:19', 3, 1),
(6, '3.jpg', 'Wdpf', 'wdpf@gmail.com', 'b714337aa8007c433329ef43c7b8252c', '01324234234', NULL, 'SUPERADMIN', 'ctg', '2022-07-04 07:29:19', 3, '2022-07-04 09:29:19', 3, 1),
(7, '3.jpg', 'Rahat Hasan', 'rahathasan@gmail.com', 'b714337aa8007c433329ef43c7b8252c', '01732423432', NULL, 'DOCTOR', 'ctg', '2022-07-04 07:29:19', 3, '2022-07-04 09:29:19', 3, 1);


-- --------------------------------------------------------

INSERT INTO `appointment` (`id`, `name`, `phone`, `patient_id`, `message`, `doctor_id`, `department_id`, `date`, `time`, `created_at`, `created_by`, `modified_at`, `modified_by`, `status`) VALUES
(1, 'Sdfsdfsdf', '43535345', NULL, 'Dfgdfgdfg Dfgdfg Dfg Gdf Dfg ', NULL, NULL, '2022-06-13', NULL, '2022-06-29 03:38:58', NULL, NULL, NULL, 1),
(2, 'Fsdfsdfsd Sdfs Df', '234234234234234', NULL, 'Fdsfd Gsdf Dfg Dfdg', NULL, NULL, '2022-06-25', NULL, '2022-06-29 03:40:12', NULL, NULL, NULL, 1),
(3, 'Karim Ahmad', '017234412312', NULL, 'Serius Problems', NULL, NULL, '2022-07-01', NULL, '2022-06-29 04:16:24', NULL, NULL, NULL, 1),
(4, 'Karim Ahmad', '017234412312', NULL, 'Serius Problems', NULL, NULL, '2022-07-01', NULL, '2022-06-29 04:17:12', NULL, NULL, NULL, 1),
(5, 'Ahmad', '0173453433', NULL, 'Ok', NULL, NULL, '2022-06-30', NULL, '2022-06-29 04:18:45', NULL, NULL, NULL, 1),
(6, 'Rabib Hasan', '017234412323', NULL, 'Ok', NULL, NULL, '2022-06-30', NULL, '2022-06-29 04:21:18', NULL, NULL, NULL, 1),
(7, ' Hasan', '017234412326', NULL, 'Ok', NULL, NULL, '2022-07-02', NULL, '2022-06-29 04:22:00', NULL, NULL, NULL, 1),
(8, 'Sdfsdf', '645645654', NULL, 'Fgdfgdf', NULL, NULL, '2022-07-01', NULL, '2022-06-29 04:24:42', NULL, NULL, NULL, 1),
(9, 'Twhidul Islam Tanim', '01832423423', 4, 'Ok', 2, 1, '2022-07-01', '', '2022-06-29 04:48:42', 3, NULL, NULL, 1),
(11, 'Twhidul Islam Tanim', '01832423423', 4, 'Fevour', 1, 1, '2022-06-30', '', '2022-06-29 04:50:40', 3, NULL, NULL, 1),
(12, 'Twhidul Islam Tanim', '01832423423', 4, 'Gdfgdf', 1, 1, '2022-07-01', '', '2022-06-29 05:09:29', 3, NULL, NULL, 1),
(13, 'Rabib Hasan', '0173001234', NULL, 'Ok', NULL, NULL, '2022-07-01', NULL, '2022-06-29 07:05:23', NULL, NULL, NULL, 1),
(14, 'Helloe', '0174990001', NULL, 'Test', NULL, NULL, '2022-06-30', NULL, '2022-06-29 07:36:18', NULL, NULL, NULL, 1);



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




INSERT INTO `room` (`id`, `room_type`, `room_no`, `details`, `floor`, `created_at`, `created_by`, `modified_at`, `modified_by`, `status`) VALUES
(1, 'GENERAL-CABIN', '101', 'Doctor', '1st Floor', '2022-06-28 05:32:27', 1, '0000-00-00 00:00:00', NULL, 1),
(2, 'GENERAL-CABIN', '101', 'Kjj', 'Hf', '2022-06-28 05:32:37', 1, '0000-00-00 00:00:00', NULL, 1),
(3, 'CHAMBER', '101', 'Ghlkj', '1st Floor', '2022-06-28 05:32:43', 1, '0000-00-00 00:00:00', NULL, 1),
(4, 'GUEST-ROOM', '203', 'Doc', '2nd Floor', '2022-06-28 05:32:51', 1, '0000-00-00 00:00:00', NULL, 1),
(5, 'VIP-CABIN', '1105', 'Free', '11th Floor', '2022-07-04 07:19:15', 1, '2022-07-04 03:19:15', 2, 1),
(6, 'CHAMBER', '101', 'Doctor', '1st Floor', '2022-07-04 04:37:50', 2, '0000-00-00 00:00:00', NULL, 1),
(7, 'VIP-CABIN', '709', 'Doctor', '7st Floor', '2022-07-04 05:28:55', 2, '2022-07-04 01:28:55', 2, 1);
--
-- Dumping data for table `doctor`
--

INSERT INTO `doctor` (`id`, `user_id`, `father_name`, `mother_name`, `qualification`, `gratuated_from`, `gender`, `date_of_birth`, `shift`, `chamber_id`, `designation_id`, `visit_fee`, `department_id`, `created_at`, `created_by`, `modified_at`, `modified_by`, `status`) VALUES
(1, 4, 'Sdfsdf', 'Sdfs', 'Sdfsdf', 'Sdfsd', 'male', '2022-06-14', '', NULL, NULL, '100.00', 1, '2022-06-28 06:39:01', 3, '0000-00-00 00:00:00', NULL, 1),
(2, 7, 'Rahul Khondokar', 'Mrs Rahul', 'FCPS', 'Chittagong Medical College', 'male', '2012-05-16', 'MORNING', NULL, NULL, '2000.00', 1, '2022-06-29 03:27:40', 3, '0000-00-00 00:00:00', NULL, 1);

-- --------------------------------------------------------

--

INSERT INTO `service` (`id`, `service_name`, `rate`, `condition_on`, `description`, `duration`, `created_at`, `created_by`, `modified_at`, `modified_by`, `status`) VALUES
(1, 'Dfhwaieh', 1524, 'Hfg', 'Update', 'Hf', '2022-07-05 04:15:46', 1, '2022-07-05 00:15:46', 2, 1),
(2, 'Nebuliger', 200, 'Ok', 'Yes', '1 Hour', '2022-06-28 04:04:53', 1, '0000-00-00 00:00:00', NULL, 1);
--
-- Dumping data for table `patient`
--


INSERT INTO `patient` (`id`, `name`, `phone`, `gender`, `age`, `weight`, `address`, `created_at`, `created_by`, `modified_at`, `modified_by`, `status`) VALUES
(1, 'Nasim  Ahmed', '01700000000', 'male', '26', NULL, 'ctg', '2022-06-26 05:44:18', 3, '0000-00-00 00:00:00', NULL, 1),
(2, 'Biplob Uddin', '05158798790', 'male', '27', NULL, 'Hatiya', '2022-06-26 05:45:09', 3, '0000-00-00 00:00:00', NULL, 1),
(3, 'Mahadi Rohman', '01660103771', 'male', '24', NULL, 'Cumilla', '2022-06-26 06:51:54', 3, '0000-00-00 00:00:00', NULL, 1),
(4, 'Twhidul Islam Tanim', '01832423423', 'male', '27', NULL, 'Oxyzen', '2022-06-28 06:36:07', 3, '0000-00-00 00:00:00', NULL, 1),
(5, 'MR BP', '02154154514', 'male', '50', NULL, 'Idb dhaka', '2022-06-30 03:27:51', 3, '0000-00-00 00:00:00', NULL, 1);

-- --------------------------------------------------------


-- Dumping data for table `room`
--

INSERT INTO `room` (`id`, `room_type`, `room_no`, `details`, `floor`, `created_at`, `created_by`, `modified_at`, `modified_by`, `status`) VALUES
(1, 'CHAMBER', '201', '', '2nd Floor', '2022-06-29 03:24:03', 3, '0000-00-00 00:00:00', NULL, 1),
(2, 'CHAMBER', '301', '', '3rd Floor', '2022-06-29 03:24:26', 3, '0000-00-00 00:00:00', NULL, 1),
(3, 'CHAMBER', '105', 'Yhh', 'Htgf', '2022-06-29 05:16:46', 3, '0000-00-00 00:00:00', NULL, 1);

-- 

INSERT INTO `user` (`id`, `name`, `email`, `password`, `phone`, `roles`, `address`, `created_at`, `created_by`, `modified_at`, `modified_by`, `status`) VALUES
(1, 'Ashab Uddin', 'ashab@gmail.com', '125bce26d032f2034e26cf229da4b52e', '01840088189', 'SUPERADMIN', NULL, '2022-06-25 13:07:57', 1, NULL, NULL, 1),
(2, 'DR', 'dr@gmail.com', '125bce26d032f2034e26cf229da4b52e', '01700349043', 'DOCTOR', '', '2022-06-25 14:40:47', NULL, '2022-06-24 05:29:28', 1, 1),
(3, 'Emp', 'emp@gmail.com', '0144712dd81be0c3d9724f5e56ce6685', '019347872782', 'DOCTOR', '', '2022-06-25 13:08:05', 4, '2022-06-25 08:47:45', 1, 1),
(4, 'Nasim Ahmed', 'nasim@gmail.com', '0144712dd81be0c3d9724f5e56ce6685', '01780012301', 'ADMIN', '', '2022-06-25 13:08:11', 1, '2022-06-25 12:10:49', 1, 1),
(5, 'Mokit', 'mokit@gmail.com', '0144712dd81be0c3d9724f5e56ce6685', '', 'DOCTOR', 'ctg', '2022-06-25 16:02:36', 1, '2022-06-25 16:02:36', 1, 1);

INSERT INTO `test` (`id`, `test_name`, `description`, `rate`, `created_at`, `created_by`, `modified_at`, `modified_by`, `status`) VALUES
(1, 'MRI', 'All Body Checkup', 6000, '2022-07-05 05:37:10', 2, '2022-07-05 01:37:10', 2, 1),
(2, 'Blood Test', 'All Test', 1000, '2022-07-05 05:21:32', 2, '0000-00-00 00:00:00', NULL, 1);



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


INSERT INTO `invoice_payment` (`id`, `patient_id`, `test_id`, `appointment_id`, `payment_date`, `subtotal`, `tax`, `discount`, `total`, `payment`, `remark`, `created_at`, `created_by`, `modified_at`, `modified_by`, `status`) VALUES
(1, 5, 4, NULL, '2022-07-14 18:00:00', 8000, 15, 200, 9000, 9000, 'paid', '0000-00-00 00:00:00', NULL, '0000-00-00 00:00:00', NULL, 1),
(2, 4, 4, NULL, '2022-07-13 18:00:00', 7723, 15, 100, 8781, 8781, '', '0000-00-00 00:00:00', NULL, '0000-00-00 00:00:00', NULL, 1),
(3, 2, 1, NULL, '2022-07-05 18:00:00', 213723, 0, 0, 213723, 0, '', '0000-00-00 00:00:00', NULL, '0000-00-00 00:00:00', NULL, 1),
(4, 3, 4, NULL, '0000-00-00 00:00:00', 7423, 0, 0, 7423, 0, '', '0000-00-00 00:00:00', NULL, '0000-00-00 00:00:00', NULL, 1);



INSERT INTO `room` (`id`, `room_type`, `room_no`, `details`, `floor`, `created_at`, `created_by`, `modified_at`, `modified_by`, `status`) VALUES
(1, 'CHAMBER', '101', NULL, 'Ground Floor', '2022-06-27 06:12:26', NULL, '0000-00-00 00:00:00', NULL, 1),
(2, 'CHAMBER', '102', NULL, '1st Floor', '2022-06-27 06:12:55', NULL, '0000-00-00 00:00:00', NULL, 1);
