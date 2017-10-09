-- phpMyAdmin SQL Dump
-- version 4.6.6deb1+deb.cihar.com~xenial.2
-- https://www.phpmyadmin.net/
--
-- Host: localhost
-- Generation Time: Oct 02, 2017 at 02:24 PM
-- Server version: 5.7.19-0ubuntu0.16.04.1
-- PHP Version: 5.6.31-4+ubuntu16.04.1+deb.sury.org+4

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `erp`
--
CREATE DATABASE IF NOT EXISTS `erp` DEFAULT CHARACTER SET latin1 COLLATE latin1_swedish_ci;
USE `erp`;

-- --------------------------------------------------------

--
-- Table structure for table `17entcam`
--

CREATE TABLE `17entcam` (
  `userid` int(11) DEFAULT NULL,
  `subj1` int(11) DEFAULT '0',
  `subj2` int(11) DEFAULT '0',
  `subj3` int(11) DEFAULT '0',
  `subj4` int(11) DEFAULT '0',
  `subj5` int(11) DEFAULT '0'
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `17entcam`
--

INSERT INTO `17entcam` (`userid`, `subj1`, `subj2`, `subj3`, `subj4`, `subj5`) VALUES
(99, 0, 0, 0, 0, 0),
(174001, 0, 0, 0, 0, 0),
(174002, 0, 0, 0, 0, 0),
(174003, 0, 0, 0, 0, 0),
(174004, 0, 0, 0, 0, 0),
(174005, 0, 0, 0, 0, 0);

-- --------------------------------------------------------

--
-- Table structure for table `17entcdb`
--

CREATE TABLE `17entcdb` (
  `userid` int(11) NOT NULL,
  `password` varchar(40) NOT NULL,
  `fname` varchar(50) NOT NULL,
  `mname` varchar(50) NOT NULL,
  `lname` varchar(50) NOT NULL,
  `address` varchar(100) NOT NULL,
  `email` varchar(50) NOT NULL,
  `year` varchar(50) NOT NULL,
  `dept` varchar(50) NOT NULL,
  `image` varchar(1024) DEFAULT NULL,
  `examfees` int(10) DEFAULT NULL,
  `libraryfine` int(10) DEFAULT NULL,
  `otherfees` int(10) DEFAULT NULL,
  `remarks` varchar(50) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `17entcdb`
--

INSERT INTO `17entcdb` (`userid`, `password`, `fname`, `mname`, `lname`, `address`, `email`, `year`, `dept`, `image`, `examfees`, `libraryfine`, `otherfees`, `remarks`) VALUES
(174001, '7c222fb2927d828af22f592134e8932480637c0d', 'Jagdish', 'Madhusadan', 'Malpani', 'Parbhani', 'jagdishmmalpani22@gmail.com', 'fe', 'entc', NULL, NULL, NULL, NULL, NULL),
(174002, '7c222fb2927d828af22f592134e8932480637c0d', 'Harshal', '', 'Pardeshi', 'Warje', 'harshalpardeshi@gmail.com', 'fe', 'entc', NULL, NULL, NULL, NULL, NULL),
(174003, '7c222fb2927d828af22f592134e8932480637c0d', 'Mayur', 'Pravin', 'Galande', 'Kanpur', 'mayurthetechy.12@gmail.com', 'fe', 'entc', NULL, NULL, NULL, NULL, NULL),
(174004, '7c222fb2927d828af22f592134e8932480637c0d', 'Vikas', '', '', 'Lohegaon', 'vikas.saini@gmail.com', 'fe', 'entc', NULL, NULL, NULL, NULL, NULL),
(174005, '7c222fb2927d828af22f592134e8932480637c0d', 'Kunal', '', 'Nevagi', 'Pune', 'knevagi@yahoo.com', 'fe', 'entc', NULL, NULL, NULL, NULL, NULL);

-- --------------------------------------------------------

--
-- Table structure for table `17itam`
--

CREATE TABLE `17itam` (
  `userid` int(11) DEFAULT NULL,
  `subj1` int(11) DEFAULT '0',
  `subj2` int(11) DEFAULT '0',
  `subj3` int(11) DEFAULT '0',
  `subj4` int(11) DEFAULT '0',
  `subj5` int(11) DEFAULT '0'
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `17itam`
--

INSERT INTO `17itam` (`userid`, `subj1`, `subj2`, `subj3`, `subj4`, `subj5`) VALUES
(99, 2, 1, 0, 0, 0),
(173001, 2, 1, 0, 0, 0),
(173002, 1, 0, 0, 0, 0),
(173003, 1, 1, 0, 0, 0),
(173004, 1, 0, 0, 0, 0),
(173005, 0, 1, 0, 0, 0);

-- --------------------------------------------------------

--
-- Table structure for table `17itdb`
--

CREATE TABLE `17itdb` (
  `userid` int(11) NOT NULL,
  `password` varchar(40) NOT NULL,
  `fname` varchar(50) NOT NULL,
  `mname` varchar(50) NOT NULL,
  `lname` varchar(50) NOT NULL,
  `address` varchar(100) NOT NULL,
  `email` varchar(50) NOT NULL,
  `year` varchar(50) NOT NULL,
  `dept` varchar(50) NOT NULL,
  `image` varchar(1024) DEFAULT NULL,
  `examfees` int(10) DEFAULT NULL,
  `libraryfine` int(10) DEFAULT NULL,
  `otherfees` int(10) DEFAULT NULL,
  `remarks` varchar(50) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `17itdb`
--

INSERT INTO `17itdb` (`userid`, `password`, `fname`, `mname`, `lname`, `address`, `email`, `year`, `dept`, `image`, `examfees`, `libraryfine`, `otherfees`, `remarks`) VALUES
(173001, '7c222fb2927d828af22f592134e8932480637c0d', 'Vipul', 'Suresh', 'Sonje', '2/26 Runwal park, 580/1 marketyard-411038', 'vipulsonje@gmail.com', 'fe', 'it', '', 0, 0, 0, NULL),
(173002, '7c222fb2927d828af22f592134e8932480637c0d', 'Sujay', 'Sanjay', 'Mahadik', 'Mumbai', 'mahadik203@gmail.com', 'fe', 'it', NULL, NULL, NULL, NULL, NULL),
(173003, '7c222fb2927d828af22f592134e8932480637c0d', 'Shivansh', 'Vijay', 'Nathani', 'Pimpri', 'nathanishivansh07@gmail.com', 'fe', 'it', NULL, NULL, NULL, NULL, NULL),
(173004, '7c222fb2927d828af22f592134e8932480637c0d', 'Anurag', 'Rajesh', 'Pardeshi', 'Pune', 'anuragpardeshi11@gmail.com', 'fe', 'it', NULL, NULL, NULL, NULL, NULL),
(173005, '7c222fb2927d828af22f592134e8932480637c0d', 'Karan', '', 'Patharkar', 'Pune', 'karanpatharkar@gmail.com', 'fe', 'it', NULL, NULL, NULL, NULL, NULL);

-- --------------------------------------------------------

--
-- Table structure for table `17mechanicalam`
--

CREATE TABLE `17mechanicalam` (
  `userid` int(11) DEFAULT NULL,
  `subj1` int(11) DEFAULT '0',
  `subj2` int(11) DEFAULT '0',
  `subj3` int(11) DEFAULT '0',
  `subj4` int(11) DEFAULT '0',
  `subj5` int(11) DEFAULT '0'
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `17mechanicalam`
--

INSERT INTO `17mechanicalam` (`userid`, `subj1`, `subj2`, `subj3`, `subj4`, `subj5`) VALUES
(99, 0, 0, 0, 0, 0),
(175001, 0, 0, 0, 0, 0),
(175002, 0, 0, 0, 0, 0),
(175003, 0, 0, 0, 0, 0),
(175004, 0, 0, 0, 0, 0),
(175005, 0, 0, 0, 0, 0);

-- --------------------------------------------------------

--
-- Table structure for table `17mechanicaldb`
--

CREATE TABLE `17mechanicaldb` (
  `userid` int(11) NOT NULL,
  `password` varchar(40) NOT NULL,
  `fname` varchar(50) NOT NULL,
  `mname` varchar(50) NOT NULL,
  `lname` varchar(50) NOT NULL,
  `address` varchar(100) NOT NULL,
  `email` varchar(50) NOT NULL,
  `year` varchar(50) NOT NULL,
  `dept` varchar(50) NOT NULL,
  `image` varchar(1024) DEFAULT NULL,
  `examfees` int(10) DEFAULT NULL,
  `libraryfine` int(10) DEFAULT NULL,
  `otherfees` int(10) DEFAULT NULL,
  `remarks` varchar(50) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `17mechanicaldb`
--

INSERT INTO `17mechanicaldb` (`userid`, `password`, `fname`, `mname`, `lname`, `address`, `email`, `year`, `dept`, `image`, `examfees`, `libraryfine`, `otherfees`, `remarks`) VALUES
(175001, '7c222fb2927d828af22f592134e8932480637c0d', 'Apoorv ', '', 'Shah', 'Pune', 'apoorvshah@gmail.com', 'fe', 'mechanical', NULL, NULL, NULL, NULL, NULL),
(175002, '7c222fb2927d828af22f592134e8932480637c0d', 'Anish', 'Satish', 'Pawar', 'Nashik', 'anishthenoob@gmail.com', 'fe', 'mechanical', NULL, NULL, NULL, NULL, NULL),
(175003, '7c222fb2927d828af22f592134e8932480637c0d', 'Sairaj', '', 'Magar', 'Nashik', 'magarsairaj@gmail.com', 'fe', 'mechanical', NULL, NULL, NULL, NULL, NULL),
(175004, '7c222fb2927d828af22f592134e8932480637c0d', 'Ajinkya', '', 'malve', 'nashik', 'ajinkyammalve@gmail.com', 'fe', 'mechanical', NULL, NULL, NULL, NULL, NULL),
(175005, '7c222fb2927d828af22f592134e8932480637c0d', 'Harshal', '', 'Hattarki', 'Kerala', 'hh@gmail.com', 'fe', 'mechanical', NULL, NULL, NULL, NULL, NULL);

-- --------------------------------------------------------

--
-- Table structure for table `admin`
--

CREATE TABLE `admin` (
  `userid` int(11) NOT NULL,
  `password` varchar(40) DEFAULT NULL,
  `fname` varchar(10) DEFAULT NULL,
  `mname` varchar(10) DEFAULT NULL,
  `lname` varchar(10) DEFAULT NULL,
  `address` varchar(100) DEFAULT NULL,
  `email` varchar(50) DEFAULT NULL,
  `image` varchar(1024) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `admin`
--

INSERT INTO `admin` (`userid`, `password`, `fname`, `mname`, `lname`, `address`, `email`, `image`) VALUES
(100, '7c222fb2927d828af22f592134e8932480637c0d', 'Sujay', 'admin', 'admin', 'pune', 'm@gmail.com', NULL);

-- --------------------------------------------------------

--
-- Table structure for table `docs`
--

CREATE TABLE `docs` (
  `name` varchar(40) NOT NULL,
  `loc` varchar(400) NOT NULL,
  `year` int(11) NOT NULL,
  `dept` varchar(15) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `docs`
--

INSERT INTO `docs` (`name`, `loc`, `year`, `dept`) VALUES
('Test', 'docs/apache2-index.html', 17, 'civil'),
('Test', 'docs/apache2-index.html', 17, 'it'),
('hella', 'docs/upload-php.php', 17, 'it'),
('notes', 'docs/download.php', 17, 'it');

-- --------------------------------------------------------

--
-- Table structure for table `office`
--

CREATE TABLE `office` (
  `userid` int(11) NOT NULL,
  `password` varchar(40) NOT NULL,
  `fname` varchar(50) NOT NULL,
  `mname` varchar(50) NOT NULL,
  `lname` varchar(50) NOT NULL,
  `address` varchar(100) NOT NULL,
  `email` varchar(50) NOT NULL,
  `post` varchar(50) NOT NULL,
  `balance` int(10) NOT NULL,
  `image` varchar(1024) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `office`
--

INSERT INTO `office` (`userid`, `password`, `fname`, `mname`, `lname`, `address`, `email`, `post`, `balance`, `image`) VALUES
(301, '7c222fb2927d828af22f592134e8932480637c0d', 'Sujayoffice', 'Sanjay', 'Mahadik', 'A10, lotus court, kothrud, pune-38', 'mahadik203@gmail.com', 'head cashier', 0, NULL),
(302, '7c222fb2927d828af22f592134e8932480637c0d', 'Shivanshiv', 'Vijay', 'Mahanana', 'pimpri', 'gpk@gmail.com', 'staff', 0, NULL),
(303, '7c222fb2927d828af22f592134e8932480637c0d', 'Gauri', '', '', 'aundh', 'karekargauri@gmail.com', 'staff', 0, NULL),
(304, '7c222fb2927d828af22f592134e8932480637c0d', 'ajinkya', 'arun', 'malve', 'nashik', 'sammalve@gmail.com', 'librarian', 0, NULL);

-- --------------------------------------------------------

--
-- Table structure for table `teacher`
--

CREATE TABLE `teacher` (
  `userid` int(11) NOT NULL,
  `password` varchar(40) NOT NULL,
  `fname` varchar(50) NOT NULL,
  `mname` varchar(50) NOT NULL,
  `lname` varchar(50) NOT NULL,
  `address` varchar(100) NOT NULL,
  `email` varchar(50) NOT NULL,
  `dept` varchar(50) NOT NULL,
  `image` varchar(1024) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `teacher`
--

INSERT INTO `teacher` (`userid`, `password`, `fname`, `mname`, `lname`, `address`, `email`, `dept`, `image`) VALUES
(201, '7c222fb2927d828af22f592134e8932480637c0d', 'Gauri', '', '', 'aundh', 'karekargauri@gmail.com', 'it', NULL),
(202, '7c222fb2927d828af22f592134e8932480637c0d', 'Priti', 'Prabhakar', 'Wakodikar', 'Pune', 'ppw@gmail.com', 'it', NULL),
(203, '7c222fb2927d828af22f592134e8932480637c0d', 'Vasundhara', '', 'Ghate', 'Pune', 'vp@gmail.com', 'entc', NULL),
(204, '7c222fb2927d828af22f592134e8932480637c0d', 'Ujwala', '', 'P', 'Pune', 'up@gmail.com', 'entc', NULL),
(205, '7c222fb2927d828af22f592134e8932480637c0d', 'Neha', '', 'Sathe', 'Pune', 'ns@gmail.com', 'mechanical', NULL),
(206, '7c222fb2927d828af22f592134e8932480637c0d', 'Minal', '', 'Patil', 'Pune', 'mp@gmail.com', 'mechanical', NULL);

--
-- Indexes for dumped tables
--

--
-- Indexes for table `17entcdb`
--
ALTER TABLE `17entcdb`
  ADD PRIMARY KEY (`userid`);

--
-- Indexes for table `17itdb`
--
ALTER TABLE `17itdb`
  ADD PRIMARY KEY (`userid`);

--
-- Indexes for table `17mechanicaldb`
--
ALTER TABLE `17mechanicaldb`
  ADD PRIMARY KEY (`userid`);

--
-- Indexes for table `admin`
--
ALTER TABLE `admin`
  ADD PRIMARY KEY (`userid`);

--
-- Indexes for table `office`
--
ALTER TABLE `office`
  ADD PRIMARY KEY (`userid`);

--
-- Indexes for table `teacher`
--
ALTER TABLE `teacher`
  ADD PRIMARY KEY (`userid`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `17entcdb`
--
ALTER TABLE `17entcdb`
  MODIFY `userid` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=174006;
--
-- AUTO_INCREMENT for table `17itdb`
--
ALTER TABLE `17itdb`
  MODIFY `userid` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=173006;
--
-- AUTO_INCREMENT for table `17mechanicaldb`
--
ALTER TABLE `17mechanicaldb`
  MODIFY `userid` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=175006;
--
-- AUTO_INCREMENT for table `admin`
--
ALTER TABLE `admin`
  MODIFY `userid` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=101;
--
-- AUTO_INCREMENT for table `office`
--
ALTER TABLE `office`
  MODIFY `userid` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=305;
--
-- AUTO_INCREMENT for table `teacher`
--
ALTER TABLE `teacher`
  MODIFY `userid` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=207;
/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
