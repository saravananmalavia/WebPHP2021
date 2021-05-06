-- phpMyAdmin SQL Dump
-- version 5.0.4
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: May 03, 2021 at 07:26 PM
-- Server version: 10.4.17-MariaDB
-- PHP Version: 8.0.2

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
-- Table structure for table `tblstudent_personal_details`
--

CREATE TABLE `tblstudent_personal_details` (
  `student_id` int(10) UNSIGNED NOT NULL,
  `student_name` varchar(50) NOT NULL,
  `address` varchar(100) NOT NULL,
  `gender` varchar(50) NOT NULL,
  `email` varchar(50) NOT NULL,
  `mobile` bigint(20) NOT NULL,
  `education` varchar(100) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `tblstudent_personal_details`
--

INSERT INTO `tblstudent_personal_details` (`student_id`, `student_name`, `address`, `gender`, `email`, `mobile`, `education`) VALUES
(4, 'Resh', 'Theriyamvila Veedu Perayam PO, 695562', 'female', 'reshmabsathyan@gmail.com', 8281309026, 'UG'),
(5, 'Sha', 'Shani Bhavan, Perayam PO, 695562', 'male', 'sha@gmail.com', 9947863672, 'UG'),
(6, 'Rithu Sha', 'Love Dale, TVM, 695562', 'female', 'rithu@gmail.com', 7907065665, 'PG'),
(7, 'Roshan', 'Rithu Bhavan, Perayam PO, 695562', 'male', 'roshan@gmail.com', 9896321457, 'PG'),
(8, 'Rahul B Sathyan', 'Theriyamvila Veedu, Perayam PO, 695562', 'male', 'rahulbsathyan@gmail.com', 9446320192, 'PG');

-- --------------------------------------------------------

--
-- Table structure for table `tbluser_details`
--

CREATE TABLE `tbluser_details` (
  `user_id` bigint(20) UNSIGNED NOT NULL,
  `user_name` varchar(50) NOT NULL,
  `password` varchar(50) NOT NULL,
  `user_type` varchar(50) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `tbluser_details`
--

INSERT INTO `tbluser_details` (`user_id`, `user_name`, `password`, `user_type`) VALUES
(2, 'reshmabsathyan', 'reshma@2021', 'student'),
(7, 'alexanderbsathyan', 'alex.alex@2021', 'student'),
(8, 'rahulbsathyan', 'rbs.rahul', 'staff'),
(9, 'rithushaa', 'rithu.lovedale2021', 'student');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `tblstudent_personal_details`
--
ALTER TABLE `tblstudent_personal_details`
  ADD PRIMARY KEY (`student_id`);

--
-- Indexes for table `tbluser_details`
--
ALTER TABLE `tbluser_details`
  ADD PRIMARY KEY (`user_id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `tblstudent_personal_details`
--
ALTER TABLE `tblstudent_personal_details`
  MODIFY `student_id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=9;

--
-- AUTO_INCREMENT for table `tbluser_details`
--
ALTER TABLE `tbluser_details`
  MODIFY `user_id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=10;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
