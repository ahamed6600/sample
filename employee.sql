-- phpMyAdmin SQL Dump
-- version 5.1.0
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Jul 07, 2021 at 07:50 PM
-- Server version: 10.4.19-MariaDB
-- PHP Version: 7.3.28

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `employee`
--

-- --------------------------------------------------------

--
-- Table structure for table `admin`
--

CREATE TABLE `admin` (
  `id` int(11) NOT NULL,
  `username` varchar(200) NOT NULL,
  `password` varchar(200) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `admin`
--

INSERT INTO `admin` (`id`, `username`, `password`) VALUES
(1, 'user', '123');

-- --------------------------------------------------------

--
-- Table structure for table `employee_details`
--

CREATE TABLE `employee_details` (
  `id` int(11) NOT NULL,
  `employee_code` varchar(500) NOT NULL,
  `employee_name` varchar(500) NOT NULL,
  `department` varchar(500) NOT NULL,
  `age` varchar(100) NOT NULL,
  `experience` varchar(500) NOT NULL,
  `date_of_birth` varchar(200) NOT NULL,
  `join_date` varchar(200) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `employee_details`
--

INSERT INTO `employee_details` (`id`, `employee_code`, `employee_name`, `department`, `age`, `experience`, `date_of_birth`, `join_date`) VALUES
(1, 'EM001', 'Tiger Chan', 'Marketing', '', '', '12/12/1994', '7/5/2020'),
(2, 'EM002', 'Clara', 'Developer', '', '', '11/15/1994', '5/8/2019'),
(3, 'EM003', 'Sandy', 'Designer', '', '', '8/15/1993', '6/26/2018'),
(4, 'EM004', 'Mark', 'Tester', '', '', '9/30/1990', '9/18/2019'),
(7, 'EM005', 'Tiger Chan', 'Marketing', '', '', '12/12/1994', '7/5/2020'),
(8, 'EM006', 'Clara', 'Developer', '', '', '11/15/1994', '5/8/2019'),
(9, 'EM007', 'Sandy', 'Designer', '', '', '8/15/1993', '6/26/2018'),
(10, 'EM008', 'Mark', 'Tester', '', '', '9/30/1990', '9/18/2019');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `admin`
--
ALTER TABLE `admin`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `employee_details`
--
ALTER TABLE `employee_details`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `employee_code` (`employee_code`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `admin`
--
ALTER TABLE `admin`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT for table `employee_details`
--
ALTER TABLE `employee_details`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=11;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
