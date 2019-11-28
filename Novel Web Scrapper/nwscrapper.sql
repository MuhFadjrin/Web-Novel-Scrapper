-- phpMyAdmin SQL Dump
-- version 4.8.3
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Nov 28, 2019 at 08:34 AM
-- Server version: 10.1.36-MariaDB
-- PHP Version: 7.2.10

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET AUTOCOMMIT = 0;
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `nwscrapper`
--

-- --------------------------------------------------------

--
-- Table structure for table `identifier`
--

CREATE TABLE `identifier` (
  `idnID` int(11) NOT NULL,
  `webID` int(11) NOT NULL,
  `judul` varchar(50) NOT NULL,
  `content` varchar(50) NOT NULL,
  `nextPage` varchar(50) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `identifier`
--

INSERT INTO `identifier` (`idnID`, `webID`, `judul`, `content`, `nextPage`) VALUES
(1, 1, 'header h1', 'article div div p', 'a.nextkey'),
(2, 2, 'div #chapterContent p', 'div #chapterContent p span', '');

-- --------------------------------------------------------

--
-- Table structure for table `website`
--

CREATE TABLE `website` (
  `webID` int(11) NOT NULL,
  `Nama` varchar(30) NOT NULL,
  `url` varchar(50) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `website`
--

INSERT INTO `website` (`webID`, `Nama`, `url`) VALUES
(1, 'Creative Novel', 'https://creativenovels.com'),
(2, 'Gravity Tales', 'http://gravitytales.com/');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `identifier`
--
ALTER TABLE `identifier`
  ADD PRIMARY KEY (`idnID`);

--
-- Indexes for table `website`
--
ALTER TABLE `website`
  ADD PRIMARY KEY (`webID`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `identifier`
--
ALTER TABLE `identifier`
  MODIFY `idnID` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT for table `website`
--
ALTER TABLE `website`
  MODIFY `webID` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
