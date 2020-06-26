-- phpMyAdmin SQL Dump
-- version 5.0.2
-- https://www.phpmyadmin.net/
--
-- Host: localhost
-- Generation Time: May 02, 2020 at 05:57 AM
-- Server version: 10.4.11-MariaDB
-- PHP Version: 7.4.5

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `swm`
--

-- --------------------------------------------------------

--
-- Table structure for table `area`
--

CREATE TABLE `area` (
  `a_id` int(10) NOT NULL,
  `a_name` varchar(100) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `area`
--

INSERT INTO `area` (`a_id`, `a_name`) VALUES
(1, 'Main Street'),
(2, 'Dunkin'),
(3, 'walmart');

-- --------------------------------------------------------

--
-- Table structure for table `assistant`
--

CREATE TABLE `assistant` (
  `asid` int(10) NOT NULL,
  `aname` varchar(30) NOT NULL,
  `apassword` varchar(30) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `assistant`
--

INSERT INTO `assistant` (`asid`, `aname`, `apassword`) VALUES
(1, 'akshay', '1234'),
(2, 'kiran', '5678');

-- --------------------------------------------------------

--
-- Table structure for table `bins`
--

CREATE TABLE `bins` (
  `bins_id` int(11) NOT NULL,
  `bins_cap_fill` int(11) DEFAULT NULL,
  `bins_add` varchar(100) NOT NULL,
  `lat` float DEFAULT NULL,
  `lng` float DEFAULT NULL,
  `a_id` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `bins`
--

INSERT INTO `bins` (`bins_id`, `bins_cap_fill`, `bins_add`, `lat`, `lng`, `a_id`) VALUES
(1010, 61, 'Main Street', 42.1049, -75.9361, 1),
(1011, 33, 'Dunkin', 42.105, -75.934, 2),
(1012, NULL, 'walmart', 42.1154, -75.9469, 3);

-- --------------------------------------------------------

--
-- Table structure for table `bins_analysis`
--

CREATE TABLE `bins_analysis` (
  `bins_id` int(10) NOT NULL,
  `bin_add` varchar(30) CHARACTER SET latin1 NOT NULL,
  `last_collected` varchar(30) CHARACTER SET latin1 NOT NULL,
  `times` int(10) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `bins_analysis`
--

INSERT INTO `bins_analysis` (`bins_id`, `bin_add`, `last_collected`, `times`) VALUES
(1010, 'Main Street', '1 hr ago', 1);

-- --------------------------------------------------------

--
-- Table structure for table `users`
--

CREATE TABLE `users` (
  `uid` int(11) NOT NULL,
  `uname` varchar(100) NOT NULL,
  `upassword` varchar(30) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `users`
--

INSERT INTO `users` (`uid`, `uname`, `upassword`) VALUES
(1, 'akshay', '1234'),
(2, 'kiran', '5678');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `area`
--
ALTER TABLE `area`
  ADD PRIMARY KEY (`a_id`);

--
-- Indexes for table `assistant`
--
ALTER TABLE `assistant`
  ADD PRIMARY KEY (`asid`);

--
-- Indexes for table `bins`
--
ALTER TABLE `bins`
  ADD PRIMARY KEY (`bins_id`),
  ADD KEY `a_id` (`a_id`);

--
-- Indexes for table `users`
--
ALTER TABLE `users`
  ADD PRIMARY KEY (`uid`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `assistant`
--
ALTER TABLE `assistant`
  MODIFY `asid` int(10) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- Constraints for dumped tables
--

--
-- Constraints for table `bins`
--
ALTER TABLE `bins`
  ADD CONSTRAINT `bins_ibfk_2` FOREIGN KEY (`a_id`) REFERENCES `area` (`a_id`) ON DELETE NO ACTION ON UPDATE NO ACTION;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;

