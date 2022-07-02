
-
-- Dumping data for table `appointment`
--

INSERT INTO `appointment` (`id`, `name`, `phone`, `patient_id`, `message`, `doctor_id`, `department_id`, `date`, `time`, `created_at`, `created_by`, `modified_at`, `modified_by`, `status`) VALUES
(2, 'Ashab', '0124344323', 5, 'fevour', 1, 3, '2022-06-22', '7:00pm', '2022-06-25 18:23:49', 1, '2022-06-25 18:22:12', NULL, 1),
(3, 'Ashab Uddin', '01840088189', 1, 'Fevur', 2, 3, '2022-06-29', NULL, '2022-06-25 18:33:18', NULL, NULL, NULL, 1);

-- --------------------------------------------------------


-- Dumping data for table `department`
--

INSERT INTO `department` (`id`, `name`, `created_by`, `created_at`, `modified_at`, `modified_by`, `status`) VALUES
(1, 'Internists', 1, '2022-06-24 16:49:33', '0000-00-00 00:00:00', NULL, 1),
(2, 'Medical Geneticists', 1, '2022-06-24 16:49:58', '0000-00-00 00:00:00', NULL, 1),
(3, 'Nephrologists', 1, '2022-06-24 16:51:13', '0000-00-00 00:00:00', NULL, 1),
(4, 'Neurologists', 1, '2022-06-24 16:50:34', '0000-00-00 00:00:00', NULL, 1),
(5, 'Pathologists', 1, '2022-06-25 15:44:38', '0000-00-00 00:00:00', NULL, 1),
(6, 'Paediatricians', 1, '2022-06-25 15:45:01', '0000-00-00 00:00:00', NULL, 1),
(7, 'Physiatrists', 1, '2022-06-25 15:45:18', '0000-00-00 00:00:00', NULL, 1);

-- --------------------------------------------------------


-- Dumping data for table `designation`
--

INSERT INTO `designation` (`id`, `designation_name`, `base_salary`, `bounus_by_percent`, `total_bounus`, `created_at`, `created_by`, `modified_at`, `modified_by`, `status`) VALUES
(1, 'Receptionist', '25000.00', '20.00', 2, '2022-06-25 15:39:21', 1, '0000-00-00 00:00:00', NULL, 1),
(2, 'Manager', '30000.00', '20.00', 2, '2022-06-25 15:40:36', 1, '0000-00-00 00:00:00', NULL, 1),
(3, 'Supervisor', '45000.00', '20.00', 2, '2022-06-25 15:41:30', 1, '0000-00-00 00:00:00', NULL, 1),
(4, 'Technologist', '20.00', '15.00', 2, '2022-06-25 15:42:28', 1, '0000-00-00 00:00:00', NULL, 1),
(5, 'Register', '32000.00', '25.00', 2, '2022-06-25 15:43:04', 1, '0000-00-00 00:00:00', NULL, 1),
(6, 'Medical Officer', '40000.00', '20.00', 2, '2022-06-25 15:43:35', 1, '0000-00-00 00:00:00', NULL, 1);

-- --------------------------------------------------------


-- Dumping data for table `doctor`
--

INSERT INTO `doctor` (`id`, `user_id`, `father_name`, `mother_name`, `gender`, `date_of_birth`, `shift`, `chamber_id`, `designation_id`, `visit_fee`, `department_id`, `created_at`, `created_by`, `modified_at`, `modified_by`, `status`) VALUES
(1, 1, '', '', 'male', '1984-05-15', 'EVENING', 2, 3, '1000.00', 6, '2022-06-25 16:01:01', 1, '0000-00-00 00:00:00', NULL, 1),
(2, 5, '', '', 'male', '1994-05-15', 'EVENING', 3, 3, '1000.00', 4, '2022-06-25 16:01:01', 1, '0000-00-00 00:00:00', NULL, 1);

-- --------------------------------------------------------

--

--
-- Dumping data for table `patient`
--

INSERT INTO `patient` (`id`, `name`, `phone`, `gender`, `age`, `weight`, `address`, `created_at`, `created_by`, `modified_at`, `modified_by`, `status`) VALUES
(1, 'Ashab Uddin', '01840088189', 'male', '25', NULL, 'ctg', '2022-06-24 11:21:56', NULL, '0000-00-00 00:00:00', NULL, 1),
(2, 'Rabib Hasan', '01834234354', 'male', '25', NULL, 'Noakhali', '2022-06-24 11:40:22', 1, '0000-00-00 00:00:00', NULL, 1),
(3, 'Ahmad Ullah', '01744100139', 'male', '44', NULL, 'Dhaka', '2022-06-24 14:43:09', 1, '0000-00-00 00:00:00', NULL, 1),
(4, 'Sadeka Beguam', '01825122224', 'female', '50', NULL, 'ctg', '2022-06-24 14:45:52', 1, '0000-00-00 00:00:00', NULL, 1),
(5, 'Nasim Ahmed', '01711000000', 'male', '26', NULL, 'Cumillah', '2022-06-24 14:53:00', 1, '0000-00-00 00:00:00', NULL, 1);

-- --------------------------------------------------------


-- Dumping data for table `room`
--

INSERT INTO `room` (`id`, `room_type`, `room_no`, `details`, `floor`, `created_at`, `created_by`, `modified_at`, `modified_by`, `status`) VALUES
(1, 'GENERAL-CABIN', '201', 'Non Ac', '2nd', '2022-06-25 15:47:11', 1, '0000-00-00 00:00:00', NULL, 1),
(2, 'CHAMBER', '101', NULL, 'Ground', '2022-06-25 15:47:54', 1, '0000-00-00 00:00:00', NULL, 1),
(3, 'CHAMBER', '102', NULL, 'Ground', '2022-06-25 15:48:20', 1, '0000-00-00 00:00:00', NULL, 1),
(4, 'CHAMBER', '103', NULL, 'Ground', '2022-06-25 15:48:40', 1, '0000-00-00 00:00:00', NULL, 1);

-- 

INSERT INTO `user` (`id`, `name`, `email`, `password`, `phone`, `roles`, `address`, `created_at`, `created_by`, `modified_at`, `modified_by`, `status`) VALUES
(1, 'Ashab Uddin', 'ashab@gmail.com', '125bce26d032f2034e26cf229da4b52e', '01840088189', 'SUPERADMIN', NULL, '2022-06-25 13:07:57', 1, NULL, NULL, 1),
(2, 'DR', 'dr@gmail.com', '125bce26d032f2034e26cf229da4b52e', '01700349043', 'DOCTOR', '', '2022-06-25 14:40:47', NULL, '2022-06-24 05:29:28', 1, 1),
(3, 'Emp', 'emp@gmail.com', '0144712dd81be0c3d9724f5e56ce6685', '019347872782', 'DOCTOR', '', '2022-06-25 13:08:05', 4, '2022-06-25 08:47:45', 1, 1),
(4, 'Nasim Ahmed', 'nasim@gmail.com', '0144712dd81be0c3d9724f5e56ce6685', '01780012301', 'ADMIN', '', '2022-06-25 13:08:11', 1, '2022-06-25 12:10:49', 1, 1),
(5, 'Mokit', 'mokit@gmail.com', '0144712dd81be0c3d9724f5e56ce6685', '', 'DOCTOR', 'ctg', '2022-06-25 16:02:36', 1, '2022-06-25 16:02:36', 1, 1);

INSERT INTO `department` (`id`, `name`, `created_by`, `created_at`, `modified_at`, `modified_by`, `status`) VALUES
(1, 'Allergists/Immunologists', NULL, '2022-06-27 06:17:37', '0000-00-00 00:00:00', NULL, 1),
(2, 'Anesthesiologists', NULL, '2022-06-27 06:17:54', '0000-00-00 00:00:00', NULL, 1),
(3, 'Gastroenterologists', NULL, '2022-06-27 06:18:07', '0000-00-00 00:00:00', NULL, 1),
(4, 'Family Physicians\r\n', NULL, '2022-06-27 06:18:19', '0000-00-00 00:00:00', NULL, 1);


INSERT INTO `designation` (`id`, `designation_name`, `base_salary`, `bounus_by_percent`, `total_bounus`, `created_at`, `created_by`, `modified_at`, `modified_by`, `status`) VALUES
(1, 'Supervisor', '25000.00', '0.10', 2, '2022-06-27 06:14:05', NULL, '0000-00-00 00:00:00', NULL, 1),
(2, 'Medical Officer', '45000.00', '0.15', 2, '2022-06-27 06:16:32', NULL, '0000-00-00 00:00:00', NULL, 1);


INSERT INTO `room` (`id`, `room_type`, `room_no`, `details`, `floor`, `created_at`, `created_by`, `modified_at`, `modified_by`, `status`) VALUES
(1, 'CHAMBER', '101', NULL, 'Ground Floor', '2022-06-27 06:12:26', NULL, '0000-00-00 00:00:00', NULL, 1),
(2, 'CHAMBER', '102', NULL, '1st Floor', '2022-06-27 06:12:55', NULL, '0000-00-00 00:00:00', NULL, 1);
