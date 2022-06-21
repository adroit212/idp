-- phpMyAdmin SQL Dump
-- version 5.1.0
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Oct 02, 2021 at 12:17 PM
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
-- Database: `idpinformation`
--

-- --------------------------------------------------------

--
-- Table structure for table `camp`
--

CREATE TABLE `camp` (
  `campid` int(11) NOT NULL,
  `camp_name` varchar(60) NOT NULL,
  `address` text NOT NULL,
  `state` varchar(30) NOT NULL,
  `lga` varchar(30) NOT NULL,
  `admin_fullname` varchar(30) NOT NULL,
  `email` varchar(30) NOT NULL,
  `mobile` varchar(15) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `camp`
--

INSERT INTO `camp` (`campid`, `camp_name`, `address`, `state`, `lga`, `admin_fullname`, `email`, `mobile`) VALUES
(1, 'Odud Camp', 'no 44 odudu stree benue state', 'Benue', 'Odudu LGA', 'Mike Akpa', 'mike@gmail.com', '090767');

-- --------------------------------------------------------

--
-- Table structure for table `idp`
--

CREATE TABLE `idp` (
  `idpid` int(11) NOT NULL,
  `fullname` varchar(60) NOT NULL,
  `email` varchar(30) NOT NULL,
  `mobile` varchar(15) NOT NULL,
  `dob` varchar(30) NOT NULL,
  `state` varchar(30) NOT NULL,
  `lga` varchar(30) NOT NULL,
  `village` varchar(30) NOT NULL,
  `gender` varchar(10) NOT NULL,
  `camp` varchar(30) NOT NULL,
  `img_url` varchar(40) NOT NULL,
  `last_home_address` text NOT NULL,
  `reg_date` varchar(30) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `idp`
--

INSERT INTO `idp` (`idpid`, `fullname`, `email`, `mobile`, `dob`, `state`, `lga`, `village`, `gender`, `camp`, `img_url`, `last_home_address`, `reg_date`) VALUES
(2, 'English Jonny', 'english@gmail.com', '090767', '2021-08-31T21:00', 'Benue', 'Odudu LGA', 'agbara', 'male', '1', 'photo-20210902220125.jpg', 'no 55 agbarake road mkd', '02 Sep 2021');

-- --------------------------------------------------------

--
-- Table structure for table `login`
--

CREATE TABLE `login` (
  `loginid` varchar(30) NOT NULL,
  `password` varchar(30) NOT NULL,
  `role` varchar(15) NOT NULL,
  `camp` varchar(30) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `login`
--

INSERT INTO `login` (`loginid`, `password`, `role`, `camp`) VALUES
('admin', 'a', 'super-admin', 'admin'),
('john@gmail.com', 'john@gmail.com', 'staff', '1'),
('mike@gmail.com', 'mike@gmail.com', 'admin', '1');

-- --------------------------------------------------------

--
-- Table structure for table `staff`
--

CREATE TABLE `staff` (
  `email` varchar(30) NOT NULL,
  `fullname` varchar(40) NOT NULL,
  `mobile` varchar(15) NOT NULL,
  `camp` varchar(30) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `staff`
--

INSERT INTO `staff` (`email`, `fullname`, `mobile`, `camp`) VALUES
('john@gmail.com', 'John Doe', '90767', '1');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `camp`
--
ALTER TABLE `camp`
  ADD PRIMARY KEY (`campid`);

--
-- Indexes for table `idp`
--
ALTER TABLE `idp`
  ADD PRIMARY KEY (`idpid`);

--
-- Indexes for table `login`
--
ALTER TABLE `login`
  ADD PRIMARY KEY (`loginid`);

--
-- Indexes for table `staff`
--
ALTER TABLE `staff`
  ADD PRIMARY KEY (`email`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `camp`
--
ALTER TABLE `camp`
  MODIFY `campid` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT for table `idp`
--
ALTER TABLE `idp`
  MODIFY `idpid` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
