-- phpMyAdmin SQL Dump
-- version 4.5.1
-- http://www.phpmyadmin.net
--
-- Host: 127.0.0.1
-- Generation Time: Sep 09, 2018 at 07:12 PM
-- Server version: 10.1.19-MariaDB
-- PHP Version: 5.6.28

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `gopracproject`
--

-- --------------------------------------------------------

--
-- Table structure for table `codes_table`
--

CREATE TABLE `codes_table` (
  `id` int(6) UNSIGNED NOT NULL,
  `Codes` varchar(6) DEFAULT NULL,
  `Start_Date` date NOT NULL,
  `End_Date` date NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `codes_table`
--

INSERT INTO `codes_table` (`id`, `Codes`, `Start_Date`, `End_Date`) VALUES
(6, 'fnPz2B', '2018-08-02', '2019-08-02'),
(7, 'yhDGk7', '2018-08-19', '2019-08-19'),
(8, '3tAzD8', '2018-08-29', '2019-08-29'),
(9, '9Yw3Xi', '2018-08-12', '2019-08-12'),
(10, 'u2Mon8', '2018-07-31', '2019-07-31'),
(11, 'JcvR8m', '2018-07-01', '2019-07-01'),
(12, '30iAm8', '2018-07-10', '2019-07-10'),
(13, 'z8w2Cv', '2018-07-24', '2019-07-24'),
(14, 'jskF3j', '2018-06-19', '2019-06-19'),
(15, 'Lbm3Qy', '2018-06-03', '2019-06-03'),
(16, 'x6yvkv', '2018-05-22', '2019-05-22'),
(17, 'zdCW0s', '2018-06-16', '2019-06-16'),
(18, 'nTv6om', '2018-05-10', '2019-05-10'),
(19, 'KN7M1M', '2018-04-17', '2019-04-17'),
(20, 'vKume4', '2018-03-12', '2019-03-12'),
(22, 'tDqgYQ', '2018-09-07', '2019-09-07'),
(23, 'Aaa2gp', '2018-09-01', '2019-09-01'),
(24, 'aEKwqQ', '2018-09-03', '2019-09-03'),
(25, '1G0xXV', '2018-09-05', '2019-09-05'),
(26, '12csg3', '2018-08-03', '2019-08-03');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `codes_table`
--
ALTER TABLE `codes_table`
  ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `codes_table`
--
ALTER TABLE `codes_table`
  MODIFY `id` int(6) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=27;
/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
