-- phpMyAdmin SQL Dump
-- version 5.1.0
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: May 06, 2021 at 05:33 PM
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
(348, 'JAVA', '2021-04-30', '05:14:00.000000', 'good');

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
(243, 'kutti', 'no 9 street  erklm', 'male', 'kutti@gmail.in', 8767654343, 'PhD', 'PHP');

--
-- Indexes for dumped tables
--

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
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `tbl_exam_timetable`
--
ALTER TABLE `tbl_exam_timetable`
  MODIFY `exam_time_table_id` int(10) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=349;

--
-- AUTO_INCREMENT for table `tbl_staff_details`
--
ALTER TABLE `tbl_staff_details`
  MODIFY `staff_id` int(7) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=244;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
