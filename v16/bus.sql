-- phpMyAdmin SQL Dump
-- version 4.6.6deb4
-- https://www.phpmyadmin.net/
--
-- Host: localhost:3306
-- Generation Time: Nov 22, 2017 at 08:04 PM
-- Server version: 5.7.20-0ubuntu0.17.04.1
-- PHP Version: 7.0.22-0ubuntu0.17.04.1

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `bus`
--

-- --------------------------------------------------------

--
-- Table structure for table `login`
--

CREATE TABLE `login` (
  `uID` int(11) NOT NULL,
  `username` varchar(16) COLLATE utf8mb4_unicode_ci NOT NULL,
  `password` varchar(25) COLLATE utf8mb4_unicode_ci NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `login`
--

INSERT INTO `login` (`uID`, `username`, `password`) VALUES
(1, 'abz', 'root123'),
(2, 'Arbaaz', 'root123'),
(3, 'Ankush', 'root123');

-- --------------------------------------------------------

--
-- Table structure for table `payment`
--

CREATE TABLE `payment` (
  `uid` int(11) NOT NULL,
  `pcode` int(11) NOT NULL,
  `cc` int(20) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `payment`
--

INSERT INTO `payment` (`uid`, `pcode`, `cc`) VALUES
(1, 2110, 174656729),
(2, 1234, 163453790),
(3, 3333, 23532623);

-- --------------------------------------------------------

--
-- Table structure for table `registered`
--

CREATE TABLE `registered` (
  `u_id` int(11) NOT NULL,
  `username` varchar(16) COLLATE utf8mb4_unicode_ci NOT NULL,
  `phNo` varchar(10) COLLATE utf8mb4_unicode_ci NOT NULL,
  `address` varchar(100) COLLATE utf8mb4_unicode_ci NOT NULL,
  `dob` date NOT NULL,
  `password` varchar(25) COLLATE utf8mb4_unicode_ci NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `registered`
--

INSERT INTO `registered` (`u_id`, `username`, `phNo`, `address`, `dob`, `password`) VALUES
(1, 'abz', '7019970219', 'Marathahalli, Bangalore-560980', '1997-03-15', 'root123'),
(2, 'Arbaaz', '9980572645', 'E33/9 , CV RAMAN NAGAR', '2017-02-11', 'root123'),
(3, 'Ankush', '7259240173', 'JP Nagar', '2018-01-11', 'root123');

-- --------------------------------------------------------

--
-- Table structure for table `routes`
--

CREATE TABLE `routes` (
  `rid` int(11) NOT NULL,
  `bid` int(11) NOT NULL,
  `fromCity` varchar(20) COLLATE utf8mb4_unicode_ci NOT NULL,
  `toCity` varchar(20) COLLATE utf8mb4_unicode_ci NOT NULL,
  `cost` int(11) NOT NULL,
  `dep_date` date NOT NULL,
  `dep_time` time NOT NULL,
  `arr_date` date NOT NULL,
  `arr_time` time NOT NULL,
  `availseats` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `routes`
--

INSERT INTO `routes` (`rid`, `bid`, `fromCity`, `toCity`, `cost`, `dep_date`, `dep_time`, `arr_date`, `arr_time`, `availseats`) VALUES
(1, 1, 'Bangalore', 'Chennai', 500, '2017-11-30', '22:00:00', '2017-12-01', '06:00:00', 37),
(1, 2, 'Bangalore', 'Chennai', 500, '2017-11-30', '05:30:00', '2017-11-30', '12:00:00', 50),
(2, 3, 'Delhi', 'Kolkata', 400, '2017-10-28', '18:00:00', '2017-10-29', '06:00:00', 60),
(3, 4, 'Kolkata', 'Delhi', 350, '2017-10-30', '20:00:00', '2017-10-31', '08:00:00', 60);

-- --------------------------------------------------------

--
-- Table structure for table `tickets`
--

CREATE TABLE `tickets` (
  `Tid` int(11) NOT NULL,
  `BusID` int(11) NOT NULL,
  `noseats` int(11) NOT NULL,
  `cost` int(11) NOT NULL,
  `user` int(11) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `tickets`
--

INSERT INTO `tickets` (`Tid`, `BusID`, `noseats`, `cost`, `user`) VALUES
(1, 0, 0, 0, 0);

-- --------------------------------------------------------

--
-- Table structure for table `wallet`
--

CREATE TABLE `wallet` (
  `uid` int(10) NOT NULL DEFAULT '1',
  `balance` int(12) NOT NULL DEFAULT '0'
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `wallet`
--

INSERT INTO `wallet` (`uid`, `balance`) VALUES
(1, 6300),
(2, 7000),
(3, 4812);

--
-- Indexes for dumped tables
--

--
-- Indexes for table `login`
--
ALTER TABLE `login`
  ADD PRIMARY KEY (`uID`);

--
-- Indexes for table `payment`
--
ALTER TABLE `payment`
  ADD PRIMARY KEY (`uid`,`cc`);

--
-- Indexes for table `registered`
--
ALTER TABLE `registered`
  ADD PRIMARY KEY (`u_id`);

--
-- Indexes for table `routes`
--
ALTER TABLE `routes`
  ADD PRIMARY KEY (`bid`);

--
-- Indexes for table `tickets`
--
ALTER TABLE `tickets`
  ADD PRIMARY KEY (`Tid`);

--
-- Indexes for table `wallet`
--
ALTER TABLE `wallet`
  ADD PRIMARY KEY (`uid`);

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
