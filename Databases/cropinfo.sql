-- phpMyAdmin SQL Dump
-- version 5.2.0
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Nov 08, 2022 at 09:39 AM
-- Server version: 10.4.24-MariaDB
-- PHP Version: 8.1.6

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `cropinfo`
--

-- --------------------------------------------------------

--
-- Table structure for table `cropinfo`
--

CREATE TABLE `cropinfo` (
  `name` varchar(100) NOT NULL,
  `garea` varchar(100) NOT NULL,
  `Season` varchar(100) NOT NULL,
  `month` int(10) NOT NULL,
  `uses` varchar(100) NOT NULL,
  `changes` varchar(110) NOT NULL,
  `fertilizer` varchar(110) NOT NULL,
  `pesticide` varchar(110) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `cropinfo`
--

INSERT INTO `cropinfo` (`name`, `garea`, `Season`, `month`, `uses`, `changes`, `fertilizer`, `pesticide`) VALUES
('wheat', 'cold to temperate', 'winter/spring', 8, 'flour, bread', 'moderate shift', 'fertogen', 'UPL avert'),
('rice', 'temperate to hot', 'all year', 5, 'human food', 'moderate shift', 'super bonmil', 'vibrant'),
('maize', 'temperate to warm', 'spring', 3, 'human and animal food', 'moderate high', 'kynoch', 'upl(neozin)'),
('potato', 'cold to temperate', 'all year', 4, 'human food', 'low shift', 'dr.earth(NPK of 34-0-0)', 'shriram alesky'),
('apple', 'cold to temperate', 'summer', 6, 'human food', 'low shift', 'N-P-K 12-12-12 or 11-15-15', 'merivon');
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
