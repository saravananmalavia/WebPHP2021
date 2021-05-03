-- phpMyAdmin SQL Dump
-- version 5.1.0
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: May 03, 2021 at 08:54 AM
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
(5, 'BS123', 'test 2.0', 'Lorem ipsum dolor sit amet, consectetuer adipiscing elit.\r\nAenean commodo ligula eget dolor. Aenean massa. Cum sociis natoque penatibus et\r\nmagnis dis parturient montes, nascetur ridiculus mus.\r\nDonec quam felis, ultricies nec, pellentesque eu, pretium quis, sem.\r\nNulla consequat massa quis enim. Donec pede justo, fringilla vel, aliquet nec,\r\nvulputate eget, arcu. In enim justo, rhoncus ut, imperdiet a, venenatis vitae,\r\njusto. Nullam dictum felis eu pede mollis pretium. Integer tincidunt.\r\nCras dapibus. Vivamus elementum semper nisi. Aenean vulputate eleifend tellus.\r\nAenean leo ligula, porttitor eu, consequat vitae, eleifend ac, enim.', 2, 12000, '', '2021-05-03 04:23:22'),
(8, 'r', 'r', 'r', 98, 45, '', '2021-05-03 06:08:52');

-- --------------------------------------------------------

--
-- Table structure for table `student_course_details`
--

CREATE TABLE `student_course_details` (
  `student_course_id` int(11) UNSIGNED NOT NULL,
  `student_id` int(11) UNSIGNED NOT NULL,
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
(10011, 12, 5, 'BS123', '2021-05-23', '2021-05-27', NULL, '2021-05-02 18:00:11'),
(10012, 3, 3, 'CS203', '2021-05-18', '2021-05-08', NULL, '2021-05-02 18:02:30');

-- --------------------------------------------------------

--
-- Table structure for table `student_mark_details`
--

CREATE TABLE `student_mark_details` (
  `student_id` int(10) UNSIGNED NOT NULL,
  `student_name` varchar(50) NOT NULL,
  `mark1` int(11) NOT NULL,
  `mark2` int(11) NOT NULL,
  `mark3` int(11) NOT NULL,
  `total` int(11) NOT NULL,
  `result` varchar(20) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `student_mark_details`
--

INSERT INTO `student_mark_details` (`student_id`, `student_name`, `mark1`, `mark2`, `mark3`, `total`, `result`) VALUES
(1, 'Anjith S', 85, 96, 78, 259, 'PASS'),
(2, 'Don', 99, 50, 65, 214, 'PASS'),
(3, 'Don2.0', 69, 69, 69, 207, 'PASS'),
(5, 'aea', 69, 45, 55, 169, 'FAIL');

-- --------------------------------------------------------

--
-- Table structure for table `student_personal_details`
--

CREATE TABLE `student_personal_details` (
  `student_id` int(11) UNSIGNED NOT NULL,
  `student_name` varchar(50) NOT NULL,
  `email` varchar(20) NOT NULL,
  `gender` varchar(50) NOT NULL,
  `mobile` bigint(20) NOT NULL,
  `education` varchar(50) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `student_personal_details`
--

INSERT INTO `student_personal_details` (`student_id`, `student_name`, `email`, `gender`, `mobile`, `education`) VALUES
(1, 'fdsfd', 'waeqwe@fhghg.com', 'male', 9999999999, 'wdsdsdsd'),
(2, '', '', '', 0, ''),
(3, 'tryerey', 'waeqwe@fhghg.com', 'gender', 5695458745, 'ertyuio'),
(4, '', '', '', 0, ''),
(5, '', '', '', 0, ''),
(6, '', '', '', 0, ''),
(7, '', '', '', 0, ''),
(8, '', '', '', 0, ''),
(9, 'qwewq', 'e12', '413', 5454846466636, 'eqeq'),
(10, '', '', '', 0, ''),
(11, '', '', '', 0, ''),
(12, '', '', '', 0, '');

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
  ADD KEY `student_id` (`student_id`),
  ADD KEY `course_code` (`course_code`),
  ADD KEY `course_id` (`course_id`);

--
-- Indexes for table `student_personal_details`
--
ALTER TABLE `student_personal_details`
  ADD PRIMARY KEY (`student_id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `course_details`
--
ALTER TABLE `course_details`
  MODIFY `course_id` int(11) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=9;

--
-- AUTO_INCREMENT for table `student_course_details`
--
ALTER TABLE `student_course_details`
  MODIFY `student_course_id` int(11) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=10013;

--
-- AUTO_INCREMENT for table `student_personal_details`
--
ALTER TABLE `student_personal_details`
  MODIFY `student_id` int(11) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=13;

--
-- Constraints for dumped tables
--

--
-- Constraints for table `student_course_details`
--
ALTER TABLE `student_course_details`
  ADD CONSTRAINT `student_course_details_ibfk_2` FOREIGN KEY (`student_id`) REFERENCES `student_personal_details` (`student_id`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `student_course_details_ibfk_3` FOREIGN KEY (`course_code`) REFERENCES `course_details` (`course_code`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `student_course_details_ibfk_4` FOREIGN KEY (`course_id`) REFERENCES `course_details` (`course_id`) ON DELETE CASCADE ON UPDATE CASCADE;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
