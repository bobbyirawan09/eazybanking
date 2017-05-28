-- phpMyAdmin SQL Dump
-- version 4.6.5.2
-- https://www.phpmyadmin.net/
--
-- Host: localhost
-- Generation Time: May 28, 2017 at 09:03 AM
-- Server version: 10.1.21-MariaDB
-- PHP Version: 7.1.1

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `eazybanking`
--

-- --------------------------------------------------------

--
-- Table structure for table `activity`
--

CREATE TABLE `activity` (
  `idactivity` int(11) NOT NULL,
  `otheruser` varchar(30) NOT NULL,
  `info` varchar(100) NOT NULL,
  `amount` int(11) NOT NULL,
  `type` int(1) NOT NULL,
  `user` varchar(15) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Table structure for table `bank`
--

CREATE TABLE `bank` (
  `bankcode` varchar(4) NOT NULL,
  `bankname` varchar(30) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `bank`
--

INSERT INTO `bank` (`bankcode`, `bankname`) VALUES
('0001', 'Eazy Banking Online'),
('0002', 'Bank Mandiri'),
('0003', 'Bank Rakyat Indonesia'),
('0004', 'Bank Nasional Indonesia'),
('0005', 'Bank Central Asia');

-- --------------------------------------------------------

--
-- Table structure for table `otheruser`
--

CREATE TABLE `otheruser` (
  `account` varchar(15) NOT NULL,
  `name` varchar(30) NOT NULL,
  `bankcode` varchar(4) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `otheruser`
--

INSERT INTO `otheruser` (`account`, `name`, `bankcode`) VALUES
('0987654321', 'Dummy Others', '0005');

-- --------------------------------------------------------

--
-- Table structure for table `transfer`
--

CREATE TABLE `transfer` (
  `idtrans` int(11) NOT NULL,
  `amount` int(11) NOT NULL,
  `bankcode` varchar(4) NOT NULL,
  `user` varchar(15) NOT NULL,
  `otheruser` varchar(30) NOT NULL,
  `info` varchar(100) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Table structure for table `user`
--

CREATE TABLE `user` (
  `account` varchar(15) NOT NULL,
  `name` varchar(30) NOT NULL,
  `address` varchar(50) NOT NULL,
  `dob` date NOT NULL,
  `phone` varchar(15) NOT NULL,
  `username` varchar(16) NOT NULL,
  `password` varchar(16) NOT NULL,
  `privilege` int(1) NOT NULL,
  `bankcode` varchar(4) NOT NULL,
  `balance` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `user`
--

INSERT INTO `user` (`account`, `name`, `address`, `dob`, `phone`, `username`, `password`, `privilege`, `bankcode`, `balance`) VALUES
('0000000001', 'Dummy Name', 'Dummy Address 99', '2000-01-01', '031-1234567', 'dummy', 'dummy', 0, '0001', 0),
('1234567890', 'Dummy 2', 'Dummy Address 2', '1999-01-31', '021-1122334', 'dummy2', 'dummy2', 0, '0001', 0);

--
-- Indexes for dumped tables
--

--
-- Indexes for table `activity`
--
ALTER TABLE `activity`
  ADD PRIMARY KEY (`idactivity`),
  ADD KEY `user` (`user`);

--
-- Indexes for table `bank`
--
ALTER TABLE `bank`
  ADD PRIMARY KEY (`bankcode`);

--
-- Indexes for table `otheruser`
--
ALTER TABLE `otheruser`
  ADD PRIMARY KEY (`account`),
  ADD KEY `bankcode` (`bankcode`);

--
-- Indexes for table `transfer`
--
ALTER TABLE `transfer`
  ADD PRIMARY KEY (`idtrans`),
  ADD KEY `bankcode` (`bankcode`,`user`),
  ADD KEY `user_trans` (`user`);

--
-- Indexes for table `user`
--
ALTER TABLE `user`
  ADD PRIMARY KEY (`account`),
  ADD KEY `bankcode` (`bankcode`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `activity`
--
ALTER TABLE `activity`
  MODIFY `idactivity` int(11) NOT NULL AUTO_INCREMENT;
--
-- AUTO_INCREMENT for table `transfer`
--
ALTER TABLE `transfer`
  MODIFY `idtrans` int(11) NOT NULL AUTO_INCREMENT;
--
-- Constraints for dumped tables
--

--
-- Constraints for table `activity`
--
ALTER TABLE `activity`
  ADD CONSTRAINT `user_activity` FOREIGN KEY (`user`) REFERENCES `user` (`account`);

--
-- Constraints for table `otheruser`
--
ALTER TABLE `otheruser`
  ADD CONSTRAINT `otheruser_ibfk_1` FOREIGN KEY (`bankcode`) REFERENCES `bank` (`bankcode`);

--
-- Constraints for table `transfer`
--
ALTER TABLE `transfer`
  ADD CONSTRAINT `bankcode_trans` FOREIGN KEY (`bankcode`) REFERENCES `bank` (`bankcode`),
  ADD CONSTRAINT `user_trans` FOREIGN KEY (`user`) REFERENCES `user` (`account`);

--
-- Constraints for table `user`
--
ALTER TABLE `user`
  ADD CONSTRAINT `bankcode_user` FOREIGN KEY (`bankcode`) REFERENCES `bank` (`bankcode`);

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
