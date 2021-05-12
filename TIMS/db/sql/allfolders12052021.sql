-- phpMyAdmin SQL Dump
-- version 5.1.0
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: May 12, 2021 at 07:33 PM
-- Server version: 10.4.18-MariaDB
-- PHP Version: 7.3.27

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `keltrondb`
--

-- --------------------------------------------------------

--
-- Table structure for table `course_details`
--

CREATE TABLE `course_details` (
  `course_id` int(11) UNSIGNED NOT NULL,
  `course_code` varchar(15) NOT NULL,
  `course_name` varchar(50) NOT NULL,
  `syllabus` varchar(10000) NOT NULL,
  `duration` int(11) NOT NULL,
  `fees` int(11) NOT NULL,
  `updated_by` varchar(15) NOT NULL,
  `updated_on` timestamp NOT NULL DEFAULT current_timestamp() ON UPDATE current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `course_details`
--

INSERT INTO `course_details` (`course_id`, `course_code`, `course_name`, `syllabus`, `duration`, `fees`, `updated_by`, `updated_on`) VALUES
(1, 'PH100', 'Physics', 'It is about Physics.', 69, 696969, '', '2021-05-03 11:16:29'),
(3, 'CS203', 'Database', 'It is about Database', 44, 44, '', '2021-05-03 12:07:41'),
(5, 'BS123', 'test 2.0', 'Lorem ipsum dolor sit amet, consectetuer adipiscing elit.\r\nAenean commodo ligula eget dolor. Aenean massa. Cum sociis natoque penatibus et\r\nmagnis dis parturient montes, nascetur ridiculus mus.\r\nDonec quam felis, ultricies nec, pellentesque eu, pretium quis, sem.\r\nNulla consequat massa quis enim. Donec pede justo, fringilla vel, aliquet nec,\r\nvulputate eget, arcu. In enim justo, rhoncus ut, imperdiet a, venenatis vitae,\r\njusto. Nullam dictum felis eu pede mollis pretium. Integer tincidunt.\r\nCras dapibus. Vivamus elementum semper nisi. Aenean vulputate eleifend tellus.\r\nAenean leo ligula, porttitor eu, consequat vitae, eleifend ac, enim.', 2, 12000, '', '2021-05-03 11:23:22');

-- --------------------------------------------------------

--
-- Table structure for table `student_course_details`
--

CREATE TABLE `student_course_details` (
  `student_course_id` int(11) UNSIGNED NOT NULL,
  `student_id` int(10) UNSIGNED NOT NULL,
  `course_id` int(11) UNSIGNED NOT NULL,
  `course_code` varchar(15) NOT NULL,
  `start_date` date NOT NULL,
  `end_date` date NOT NULL,
  `updated_by` varchar(15) DEFAULT NULL,
  `updated_on` timestamp NULL DEFAULT current_timestamp() ON UPDATE current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `student_course_details`
--

INSERT INTO `student_course_details` (`student_course_id`, `student_id`, `course_id`, `course_code`, `start_date`, `end_date`, `updated_by`, `updated_on`) VALUES
(1, 5, 1, 'PH100', '2021-05-01', '2021-05-04', NULL, '2021-05-06 11:28:23'),
(2, 6, 3, 'CS203', '2021-05-18', '2021-05-08', NULL, '2021-05-06 11:28:28'),
(3, 7, 5, 'BS123', '2021-05-23', '2021-05-27', NULL, '2021-05-06 11:28:59'),
(1002, 8, 3, 'CS203', '2021-05-06', '2021-05-28', NULL, '2021-05-06 11:29:04');

-- --------------------------------------------------------

--
-- Table structure for table `student_personal_details`
--

CREATE TABLE `student_personal_details` (
  `student_id` int(11) NOT NULL,
  `student_name` varchar(50) NOT NULL,
  `address` varchar(100) NOT NULL,
  `gender` varchar(50) NOT NULL,
  `email` varchar(50) NOT NULL,
  `mobile` bigint(20) NOT NULL,
  `education` varchar(50) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

-- --------------------------------------------------------

--
-- Table structure for table `tbl_exam_timetable`
--

CREATE TABLE `tbl_exam_timetable` (
  `exam_time_table_id` int(10) NOT NULL,
  `subject_name` varchar(20) NOT NULL,
  `exam_date` date NOT NULL,
  `exam_time` time(6) NOT NULL,
  `remarks` varchar(10) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `tbl_exam_timetable`
--

INSERT INTO `tbl_exam_timetable` (`exam_time_table_id`, `subject_name`, `exam_date`, `exam_time`, `remarks`) VALUES
(342, 'PHP', '2021-04-18', '10:04:00.000000', 'good'),
(343, 'PYTHON', '2021-04-11', '11:10:00.000000', 'good'),
(344, 'PYTHON', '2021-04-30', '13:56:00.000000', 'good'),
(345, 'JAVA', '2021-05-09', '13:02:00.000000', 'nice'),
(346, 'JAVA', '2021-05-02', '03:55:00.000000', 'nice'),
(347, 'PHP', '2021-05-23', '04:10:00.000000', 'good'),
(348, 'JAVA', '2021-04-30', '05:14:00.000000', 'good'),
(349, 'PHP', '2021-04-30', '11:34:00.000000', 'good'),
(350, 'JAVA', '2021-05-01', '18:18:00.000000', 'good');

-- --------------------------------------------------------

--
-- Table structure for table `tbl_staff_details`
--

CREATE TABLE `tbl_staff_details` (
  `staff_id` int(7) NOT NULL,
  `staff_name` varchar(10) NOT NULL,
  `address` varchar(50) NOT NULL,
  `gender` varchar(8) NOT NULL,
  `email` varchar(20) NOT NULL,
  `mobile` bigint(10) NOT NULL,
  `education` varchar(20) NOT NULL,
  `subject` varchar(20) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `tbl_staff_details`
--

INSERT INTO `tbl_staff_details` (`staff_id`, `staff_name`, `address`, `gender`, `email`, `mobile`, `education`, `subject`) VALUES
(236, 'ajith', 'street 2 kollam', 'male', 'aji@gmail.com', 8767656543, 'UG', 'PHP'),
(237, 'swathy', 'street5 tvm', 'female', 'swathy@gmail.com', 9876765454, 'UG', 'JAVA'),
(238, 'ajitha', 'street 2 kollam', 'female', 'ajitha@gmail.com', 7687654343, 'PG', 'PHP'),
(239, 'nayan', 'ernakulam town', 'female', 'naayan@gmail.cpm', 9876565433, 'PhD', 'PYTHON'),
(240, 'aquilla', 'street5 tvm', 'female', 'aqu2@yahoo.in', 7658746534, 'PhD', 'JAVA'),
(241, 'NILA', 'street 2 kollam', 'female', 'swathy@gmail.com', 7567465750, 'PG', 'PYTHON'),
(242, 'yogi', 'street5 kochi', 'male', 'babu@yahoo.in', 9876656560, 'UG', 'JAVA'),
(243, 'kutti', 'no 9 street  erklm', 'male', 'kutti@gmail.in', 8767654343, 'PhD', 'PHP'),
(244, 'kannan', 'street 2 kollam', 'male', 'aji@gmail.com', 6754565439, 'UG', 'PYTHON'),
(245, 'gowri', 'street5 tvm', 'female', 'ajitha@gmail.com', 6765454323, 'PG', 'PYTHON'),
(246, 'swathy', 'street 2 kollam', 'male', 'swathy@gmail.com', 5666777888, 'PhD', 'PHP');

-- --------------------------------------------------------

--
-- Table structure for table `user_details`
--

CREATE TABLE `user_details` (
  `user_id` int(11) NOT NULL,
  `user_name` varchar(50) NOT NULL,
  `password` varchar(50) NOT NULL,
  `user_type` varchar(50) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `user_details`
--

INSERT INTO `user_details` (`user_id`, `user_name`, `password`, `user_type`) VALUES
(9, 'anu', '12345', 'student');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `course_details`
--
ALTER TABLE `course_details`
  ADD PRIMARY KEY (`course_id`),
  ADD UNIQUE KEY `course_code` (`course_code`);

--
-- Indexes for table `student_course_details`
--
ALTER TABLE `student_course_details`
  ADD PRIMARY KEY (`student_course_id`),
  ADD KEY `course_code` (`course_code`),
  ADD KEY `course_id` (`course_id`),
  ADD KEY `student_id` (`student_id`);

--
-- Indexes for table `student_personal_details`
--
ALTER TABLE `student_personal_details`
  ADD PRIMARY KEY (`student_id`);

--
-- Indexes for table `tbl_exam_timetable`
--
ALTER TABLE `tbl_exam_timetable`
  ADD PRIMARY KEY (`exam_time_table_id`);

--
-- Indexes for table `tbl_staff_details`
--
ALTER TABLE `tbl_staff_details`
  ADD PRIMARY KEY (`staff_id`);

--
-- Indexes for table `user_details`
--
ALTER TABLE `user_details`
  ADD PRIMARY KEY (`user_id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `student_personal_details`
--
ALTER TABLE `student_personal_details`
  MODIFY `student_id` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `tbl_exam_timetable`
--
ALTER TABLE `tbl_exam_timetable`
  MODIFY `exam_time_table_id` int(10) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=351;

--
-- AUTO_INCREMENT for table `tbl_staff_details`
--
ALTER TABLE `tbl_staff_details`
  MODIFY `staff_id` int(7) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=247;

--
-- AUTO_INCREMENT for table `user_details`
--
ALTER TABLE `user_details`
  MODIFY `user_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=10;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
