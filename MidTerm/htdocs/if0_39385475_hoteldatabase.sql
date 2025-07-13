-- phpMyAdmin SQL Dump
-- version 4.9.0.1
-- https://www.phpmyadmin.net/
--
-- Host: sql300.infinityfree.com
-- Generation Time: Jul 13, 2025 at 12:04 PM
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
  `transactionID` varchar(50) CHARACTER SET utf8mb3 COLLATE utf8mb3_general_ci NOT NULL,
  `userID` int(11) NOT NULL,
  `roomtype` varchar(50) CHARACTER SET utf8mb3 COLLATE utf8mb3_general_ci NOT NULL,
  `guests` int(11) NOT NULL,
  `resdatestart` date NOT NULL,
  `resdateend` date NOT NULL,
  `payment_status` enum('Pending','Paid','Cancelled') DEFAULT 'Pending'
) ENGINE=MyISAM DEFAULT CHARSET=latin1 COLLATE=latin1_swedish_ci;

--
-- Dumping data for table `bookcred`
--

INSERT INTO `bookcred` (`transactionID`, `userID`, `roomtype`, `guests`, `resdatestart`, `resdateend`, `payment_status`) VALUES
('JOJUL150725-SUI00002', 12, 'Suite', 5, '2025-07-15', '2025-07-31', 'Paid'),
('JOJUL170725-DOU00001', 12, 'Double', 2, '2025-07-17', '2025-07-20', 'Paid');

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
-- AUTO_INCREMENT for table `usercred`
--
ALTER TABLE `usercred`
  MODIFY `userID` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=15;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
