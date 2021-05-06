-- phpMyAdmin SQL Dump
-- version 5.1.0
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: May 06, 2021 at 06:47 AM
-- Server version: 10.4.18-MariaDB
-- PHP Version: 8.0.3

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
(1, 'PH100', 'Physics', 'It is about Physics.', 69, 696969, '', '2021-05-03 04:16:29'),
(3, 'CS203', 'Database', 'It is about Database', 44, 44, '', '2021-05-03 05:07:41'),
(5, 'BS123', 'test 2.0', 'Lorem ipsum dolor sit amet, consectetuer adipiscing elit.\r\nAenean commodo ligula eget dolor. Aenean massa. Cum sociis natoque penatibus et\r\nmagnis dis parturient montes, nascetur ridiculus mus.\r\nDonec quam felis, ultricies nec, pellentesque eu, pretium quis, sem.\r\nNulla consequat massa quis enim. Donec pede justo, fringilla vel, aliquet nec,\r\nvulputate eget, arcu. In enim justo, rhoncus ut, imperdiet a, venenatis vitae,\r\njusto. Nullam dictum felis eu pede mollis pretium. Integer tincidunt.\r\nCras dapibus. Vivamus elementum semper nisi. Aenean vulputate eleifend tellus.\r\nAenean leo ligula, porttitor eu, consequat vitae, eleifend ac, enim.', 2, 12000, '', '2021-05-03 04:23:22');

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
(1, 5, 1, 'PH100', '2021-05-01', '2021-05-04', NULL, '2021-05-06 04:28:23'),
(2, 6, 3, 'CS203', '2021-05-18', '2021-05-08', NULL, '2021-05-06 04:28:28'),
(3, 7, 5, 'BS123', '2021-05-23', '2021-05-27', NULL, '2021-05-06 04:28:59'),
(1002, 8, 3, 'CS203', '2021-05-06', '2021-05-28', NULL, '2021-05-06 04:29:04');

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
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `course_details`
--
ALTER TABLE `course_details`
  MODIFY `course_id` int(11) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=11;

--
-- AUTO_INCREMENT for table `student_course_details`
--
ALTER TABLE `student_course_details`
  MODIFY `student_course_id` int(11) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=1004;

--
-- Constraints for dumped tables
--

--
-- Constraints for table `student_course_details`
--
ALTER TABLE `student_course_details`
  ADD CONSTRAINT `student_course_details_ibfk_3` FOREIGN KEY (`course_code`) REFERENCES `course_details` (`course_code`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `student_course_details_ibfk_4` FOREIGN KEY (`course_id`) REFERENCES `course_details` (`course_id`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `student_course_details_ibfk_5` FOREIGN KEY (`student_id`) REFERENCES `tblstudent_personal_details` (`student_id`) ON DELETE CASCADE ON UPDATE CASCADE;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
