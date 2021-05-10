-- phpMyAdmin SQL Dump
-- version 5.1.0
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: May 06, 2021 at 07:00 AM
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
-- Table structure for table `attendancelist`
--

CREATE TABLE `attendancelist` (
  `student_attendance_id` varchar(10) NOT NULL,
  `student_id` varchar(10) NOT NULL,
  `attendance_date` date NOT NULL,
  `attendance_session` varchar(10) NOT NULL,
  `status` varchar(10) NOT NULL,
  `remarks` varchar(30) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `attendancelist`
--

INSERT INTO `attendancelist` (`student_attendance_id`, `student_id`, `attendance_date`, `attendance_session`, `status`, `remarks`) VALUES
('A01', 'I03', '2021-05-12', 'FN', 'A', 'Late'),
('af12', 'sad1', '2021-05-06', 'AN', 'P', 'LeaveApplied'),
('B01', 'K01', '2021-05-14', 'AN', 'A', 'Permission'),
('B12', 'st12', '2021-05-12', 'AN', 'P', 'Permission'),
('C01', 'I02', '2021-05-07', 'AN', 'A', 'LeaveApplied'),
('D03', 'St13', '2021-05-18', 'FN', 'P', 'Late');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `attendancelist`
--
ALTER TABLE `attendancelist`
  ADD PRIMARY KEY (`student_attendance_id`);
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
