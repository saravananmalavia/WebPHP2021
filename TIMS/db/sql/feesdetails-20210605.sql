-- phpMyAdmin SQL Dump
-- version 5.1.0
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: May 06, 2021 at 07:01 AM
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
-- Table structure for table `feesdetails`
--

CREATE TABLE `feesdetails` (
  `fees_collection_id` varchar(10) NOT NULL,
  `student_id` varchar(10) NOT NULL,
  `collection_date` date NOT NULL,
  `amount` int(10) NOT NULL,
  `particulars` varchar(20) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `feesdetails`
--

INSERT INTO `feesdetails` (`fees_collection_id`, `student_id`, `collection_date`, `amount`, `particulars`) VALUES
('F043', '123e', '2021-05-12', 8000, 'yes'),
('F12', 'I03', '2021-06-02', 6000, 'yes'),
('FE09', 'I03', '2021-05-20', 9000, 'yes'),
('FEE01', 'I01', '2021-05-15', 1200, 'yes');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `feesdetails`
--
ALTER TABLE `feesdetails`
  ADD PRIMARY KEY (`fees_collection_id`);
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
