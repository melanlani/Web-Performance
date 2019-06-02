-- phpMyAdmin SQL Dump
-- version 4.8.5
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: May 16, 2019 at 04:31 AM
-- Server version: 10.1.38-MariaDB
-- PHP Version: 7.1.27

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET AUTOCOMMIT = 0;
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `bigbox`
--

-- --------------------------------------------------------

--
-- Table structure for table `performance`
--

CREATE TABLE `performance` (
  `id_performance` int(11) NOT NULL,
  `user_id` int(11) NOT NULL,
  `target_time` int(11) NOT NULL,
  `work_time` int(11) NOT NULL,
  `achievement` int(11) NOT NULL,
  `over_time` int(11) NOT NULL,
  `date` date NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `performance`
--

INSERT INTO `performance` (`id_performance`, `user_id`, `target_time`, `work_time`, `achievement`, `over_time`, `date`) VALUES
(1, 1, 8, 8, 100, 3, '2019-04-01'),
(2, 1, 8, 8, 100, 3, '2019-04-02'),
(3, 1, 8, 8, 100, 1, '2019-04-03'),
(4, 1, 8, 4, 50, 2, '2019-04-04'),
(5, 1, 8, 8, 100, 0, '2019-04-05'),
(6, 1, 0, 0, 100, 2, '2019-04-06'),
(7, 1, 0, 0, 100, 4, '2019-04-07'),
(8, 1, 8, 8, 100, 2, '2019-04-08'),
(9, 1, 8, 4, 50, 1, '2019-04-09'),
(10, 1, 8, 8, 100, 2, '2019-04-10'),
(11, 1, 8, 6, 80, 3, '2019-04-11'),
(12, 1, 8, 4, 50, 2, '2019-04-12'),
(13, 1, 0, 0, 100, 2, '2019-04-13'),
(15, 1, 0, 0, 100, 3, '2019-04-14'),
(16, 1, 8, 6, 80, 1, '2019-04-15'),
(17, 1, 8, 8, 100, 4, '2019-04-16'),
(18, 1, 8, 8, 100, 3, '2019-04-17'),
(19, 1, 8, 7, 90, 3, '2019-04-18'),
(20, 1, 8, 8, 100, 1, '2019-04-19'),
(21, 1, 0, 0, 100, 1, '2019-04-20'),
(22, 1, 0, 0, 100, 3, '2019-04-21'),
(23, 1, 8, 4, 50, 2, '2019-04-22'),
(24, 1, 8, 8, 100, 1, '2019-04-23'),
(25, 1, 8, 8, 100, 4, '2019-04-24'),
(26, 1, 8, 6, 80, 2, '2019-04-25'),
(27, 1, 8, 8, 100, 1, '2019-04-26'),
(28, 1, 0, 0, 100, 1, '2019-04-27'),
(29, 1, 0, 0, 100, 0, '2019-04-28'),
(30, 1, 8, 8, 100, 2, '2019-04-29'),
(31, 1, 8, 0, 0, 0, '2019-04-30'),
(32, 1, 8, 8, 100, 2, '2019-05-01'),
(33, 1, 8, 6, 80, 3, '2019-05-02');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `performance`
--
ALTER TABLE `performance`
  ADD PRIMARY KEY (`id_performance`),
  ADD KEY `user_id` (`user_id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `performance`
--
ALTER TABLE `performance`
  MODIFY `id_performance` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=34;

--
-- Constraints for dumped tables
--

--
-- Constraints for table `performance`
--
ALTER TABLE `performance`
  ADD CONSTRAINT `performance_ibfk_1` FOREIGN KEY (`user_id`) REFERENCES `user_login` (`id`);
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
