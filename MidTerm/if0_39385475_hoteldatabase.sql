-- phpMyAdmin SQL Dump
-- version 4.9.0.1
-- https://www.phpmyadmin.net/
--
-- Host: sql300.infinityfree.com
-- Generation Time: Jul 10, 2025 at 04:17 AM
-- Server version: 11.4.7-MariaDB
-- PHP Version: 7.2.22

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET AUTOCOMMIT = 0;
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `if0_39385475_hoteldatabase`
--

-- --------------------------------------------------------

--
-- Table structure for table `bookcred`
--

CREATE TABLE `bookcred` (
  `transactionID` int(11) NOT NULL,
  `userID` int(11) NOT NULL,
  `roomtype` varchar(50) NOT NULL,
  `guests` int(11) NOT NULL,
  `resdatestart` date NOT NULL,
  `resdateend` date NOT NULL
) ENGINE=MyISAM DEFAULT CHARSET=latin1 COLLATE=latin1_swedish_ci;

--
-- Dumping data for table `bookcred`
--

INSERT INTO `bookcred` (`transactionID`, `userID`, `roomtype`, `guests`, `resdatestart`, `resdateend`) VALUES
(1, 12, 'Single', 2, '2025-07-12', '2025-07-16'),
(2, 12, 'Single', 2, '2025-07-12', '2025-07-16'),
(3, 12, 'Single', 2, '2025-07-12', '2025-07-16'),
(4, 14, 'Single', 4, '2025-07-16', '2025-07-21'),
(5, 12, 'Single', 2, '2025-07-12', '2025-07-15');

-- --------------------------------------------------------

--
-- Table structure for table `usercred`
--

CREATE TABLE `usercred` (
  `userID` int(11) NOT NULL,
  `firstname` varchar(50) NOT NULL,
  `lastname` varchar(50) NOT NULL,
  `username` varchar(50) NOT NULL,
  `password` varchar(255) NOT NULL,
  `birthday` date NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `usercred`
--

INSERT INTO `usercred` (`userID`, `firstname`, `lastname`, `username`, `password`, `birthday`) VALUES
(1, 'Ian Lindley', 'Del Rosario', 'Trainee', '123456', '2025-07-10'),
(12, 'John', 'Wick', 'UserTest', '123456', '2025-07-02'),
(13, 'admin', '123', 'admin', 'admin123', '2000-01-01'),
(14, 'Walter', 'White', 'heisenberg', '123456', '1997-07-03');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `bookcred`
--
ALTER TABLE `bookcred`
  ADD PRIMARY KEY (`transactionID`),
  ADD KEY `userID` (`userID`);

--
-- Indexes for table `usercred`
--
ALTER TABLE `usercred`
  ADD PRIMARY KEY (`userID`),
  ADD UNIQUE KEY `username` (`username`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `bookcred`
--
ALTER TABLE `bookcred`
  MODIFY `transactionID` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;

--
-- AUTO_INCREMENT for table `usercred`
--
ALTER TABLE `usercred`
  MODIFY `userID` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=15;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
