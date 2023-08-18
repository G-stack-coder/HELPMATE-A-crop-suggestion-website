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
-- Database: `hcrop`
--

-- --------------------------------------------------------

--
-- Table structure for table `hcrop`
--

CREATE TABLE `hcrop` (
  `name` varchar(100) NOT NULL,
  `ph` int(20) NOT NULL,
  `npkratio` varchar(100) NOT NULL,
  `size` int(100) NOT NULL,
  `availability` varchar(100) NOT NULL,
  `avgrainfall` int(100) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `hcrop`
--

INSERT INTO `hcrop` (`name`, `ph`, `npkratio`, `size`, `availability`, `avgrainfall`) VALUES
('wheat', 6, '2:1:1', 20, 'low', 750),
('rice', 6, '5:2:2', 20, 'high', 900),
('maize', 6, '135:62.5:50', 20, 'low', 700),
('potato', 6, '1:1:2', 0, 'medium', 800),
('apple', 6, '1.25:1.5:1', 0, 'medium', 500);
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
