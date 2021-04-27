-- phpMyAdmin SQL Dump
-- version 4.4.15.7
-- http://www.phpmyadmin.net
--
-- Host: 127.0.0.1
-- Generation Time: Apr 27, 2021 at 07:52 AM
-- Server version: 5.6.37
-- PHP Version: 7.1.8

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `KeltronDB`
--

-- --------------------------------------------------------

--
-- Table structure for table `tblstudent`
--

CREATE TABLE IF NOT EXISTS `tblstudent` (
  `roll_no` int(10) NOT NULL,
  `student_name` varchar(50) NOT NULL,
  `mark1` int(4) NOT NULL,
  `mark2` int(4) NOT NULL,
  `mark3` int(4) NOT NULL,
  `total` int(4) NOT NULL,
  `result` varchar(10) NOT NULL
) ENGINE=InnoDB AUTO_INCREMENT=45 DEFAULT CHARSET=latin1;

--
-- Dumping data for table `tblstudent`
--

INSERT INTO `tblstudent` (`roll_no`, `student_name`, `mark1`, `mark2`, `mark3`, `total`, `result`) VALUES
(1, 'Saravan', 50, 60, 50, 160, 'PASS'),
(2, 'Richard', 40, 60, 50, 150, 'FAIL'),
(24, 'Mikel', 55, 75, 95, 225, 'PASS'),
(25, 'david', 55, 75, 95, 225, 'PASS'),
(26, 'soman', 45, 65, 75, 185, 'FAIL'),
(28, 'driysa', 45, 65, 75, 185, 'FAIL'),
(29, 'driysa', 45, 65, 75, 185, 'FAIL'),
(30, 'driysa', 45, 65, 75, 185, 'FAIL'),
(31, 'driysa', 45, 65, 75, 185, 'FAIL'),
(32, 'driysa', 45, 65, 75, 185, 'FAIL'),
(33, 'Kannan', 95, 95, 95, 285, 'PASS'),
(34, 'saravanan', 90, 90, 78, 258, 'PASS'),
(35, 'Reshma', 89, 90, 78, 257, 'PASS'),
(36, 'Aswathy', 90, 89, 78, 257, 'PASS'),
(37, 'sanya sarav', 90, 95, 100, 285, 'PASS'),
(38, 'Sankar', 80, 80, 80, 240, 'PASS'),
(39, 'Thampi', 80, 80, 80, 240, 'PASS'),
(40, 'Soman', 70, 70, 70, 210, 'PASS'),
(41, 'Velan', 70, 70, 70, 210, 'PASS'),
(42, 'ThampiRaj', 80, 80, 80, 240, 'PASS'),
(43, 'Shanthi', 80, 80, 80, 240, 'PASS'),
(44, 'Smitha', 80, 80, 80, 240, 'PASS');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `tblstudent`
--
ALTER TABLE `tblstudent`
  ADD PRIMARY KEY (`roll_no`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `tblstudent`
--
ALTER TABLE `tblstudent`
  MODIFY `roll_no` int(10) NOT NULL AUTO_INCREMENT,AUTO_INCREMENT=45;
/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
