-- phpMyAdmin SQL Dump
-- version 5.0.2
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1:3306
-- Generation Time: Mar 11, 2024 at 04:37 PM
-- Server version: 5.7.31
-- PHP Version: 7.3.21

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `qlds_thi`
--
CREATE DATABASE IF NOT EXISTS `qlds_thi` DEFAULT CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci;
USE `qlds_thi`;

-- --------------------------------------------------------

--
-- Table structure for table `login`
--
-- Creation: Mar 06, 2024 at 03:53 AM
-- Last update: Mar 06, 2024 at 04:09 AM
--

DROP TABLE IF EXISTS `login`;
CREATE TABLE IF NOT EXISTS `login` (
  `Username` varchar(50) COLLATE utf8mb4_unicode_ci NOT NULL,
  `Password` varchar(28) COLLATE utf8mb4_unicode_ci NOT NULL,
  PRIMARY KEY (`Username`)
) ENGINE=MyISAM DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `login`
--

INSERT INTO `login` (`Username`, `Password`) VALUES
('asdasd', '123123'),
('qweqwe', '123123');

-- --------------------------------------------------------

--
-- Table structure for table `students`
--
-- Creation: Mar 06, 2024 at 04:01 AM
-- Last update: Mar 06, 2024 at 04:10 AM
--

DROP TABLE IF EXISTS `students`;
CREATE TABLE IF NOT EXISTS `students` (
  `ID` varchar(10) COLLATE utf8mb4_unicode_ci NOT NULL,
  `Fal-name` varchar(20) COLLATE utf8mb4_unicode_ci NOT NULL,
  `Gender` varchar(10) COLLATE utf8mb4_unicode_ci NOT NULL,
  `Age` int(10) NOT NULL,
  `School-name` varchar(100) COLLATE utf8mb4_unicode_ci NOT NULL,
  `School-address` varchar(100) COLLATE utf8mb4_unicode_ci NOT NULL,
  PRIMARY KEY (`ID`),
  UNIQUE KEY `Fal-name` (`Fal-name`)
) ENGINE=MyISAM DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `students`
--

INSERT INTO `students` (`ID`, `Fal-name`, `Gender`, `Age`, `School-name`, `School-address`) VALUES
('SV01', 'Nguyễn Duy Tân', 'Không rõ', 18, 'Trường Đại Học Bách Khoa Toàn Thư', '51 A Bùi Xuân Viện');

-- --------------------------------------------------------

--
-- Table structure for table `test_score`
--
-- Creation: Mar 06, 2024 at 04:14 AM
-- Last update: Mar 06, 2024 at 04:14 AM
--

DROP TABLE IF EXISTS `test_score`;
CREATE TABLE IF NOT EXISTS `test_score` (
  `ID` varchar(10) COLLATE utf8mb4_unicode_ci NOT NULL,
  `Score` int(11) NOT NULL,
  PRIMARY KEY (`ID`)
) ENGINE=MyISAM DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `test_score`
--

INSERT INTO `test_score` (`ID`, `Score`) VALUES
('SV01', 10);
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
