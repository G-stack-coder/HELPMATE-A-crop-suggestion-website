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
-- Database: `hweather`
--

-- --------------------------------------------------------

--
-- Table structure for table `hweather`
--

CREATE TABLE `hweather` (
  `minlat` float NOT NULL,
  `maxlat` float NOT NULL,
  `minlongi` float NOT NULL,
  `maxlongi` float NOT NULL,
  `avgrain` int(100) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `hweather`
--

INSERT INTO `hweather` (`minlat`, `maxlat`, `minlongi`, `maxlongi`, `avgrain`) VALUES
(15.35, 22.02, 72.36, 80.54, 1002),
(11.7, 37.6428, 78.39, 24.8076, 987),
(11.3, 18.3, 74, 78.3, 980),
(8.18, 12.48, 74.52, 72.22, 3055),
(12.41, 19.07, 77, 84.4, 860);
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
