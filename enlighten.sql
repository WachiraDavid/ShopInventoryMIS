-- phpMyAdmin SQL Dump
-- version 4.5.1
-- http://www.phpmyadmin.net
--
-- Host: 127.0.0.1
-- Generation Time: Apr 15, 2019 at 12:12 PM
-- Server version: 10.1.16-MariaDB
-- PHP Version: 5.6.24

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `enlighten`
--

-- --------------------------------------------------------

--
-- Table structure for table `sales`
--

CREATE TABLE `sales` (
  `id` int(10) NOT NULL,
  `item_name` varchar(50) NOT NULL,
  `quantity` int(50) NOT NULL,
  `b_price` int(50) NOT NULL,
  `s_price` int(50) NOT NULL,
  `profit` int(50) NOT NULL,
  `timestamp` timestamp(6) NOT NULL DEFAULT CURRENT_TIMESTAMP
) ;

--
-- Dumping data for table `sales`
--

INSERT INTO `sales` (`id`, `item_name`, `quantity`, `b_price`, `s_price`, `profit`, `timestamp`) VALUES
(52, 'Wheat Flour]', 2, 200, 260, 30, '2019-04-15 01:10:38.652302'),
(53, 'Cooking Fat]', 3, 180, 165, -5, '2019-04-15 01:10:53.513386'),
(54, 'Rice]', 5, 250, 300, 10, '2019-04-15 01:11:07.190259'),
(55, 'Bread]', 5, 225, 250, 5, '2019-04-15 01:11:17.688599'),
(56, 'Rice]', 5, 250, 75, -35, '2019-04-15 01:47:31.450757');

-- --------------------------------------------------------

--
-- Table structure for table `stock`
--

CREATE TABLE `stock` (
  `id` int(20) NOT NULL,
  `description` varchar(50) NOT NULL,
  `code` int(50) NOT NULL,
  `quantity` int(50) NOT NULL,
  `b_price` int(20) NOT NULL,
  `s_price` int(20) NOT NULL,
  `time stamp` timestamp(6) NOT NULL DEFAULT CURRENT_TIMESTAMP
) ;

--
-- Dumping data for table `stock`
--

INSERT INTO `stock` (`id`, `description`, `code`, `quantity`, `b_price`, `s_price`, `time stamp`) VALUES
(89, 'Salt', 0, 35, 20, 30, '2019-04-15 01:48:35.926550'),
(93, 'Bread', 1, 20, 45, 50, '2019-04-15 01:48:35.960634'),
(94, 'Sugar', 2, 30, 45, 50, '2019-04-15 01:48:36.004768'),
(77, 'Wheat Flour', 5, 36, 100, 130, '2019-04-15 01:48:35.760155'),
(86, 'Maize Flour', 6, 50, 60, 80, '2019-04-15 01:48:35.882501'),
(82, 'Cooking Fat', 7, 30, 60, 70, '2019-04-15 01:48:35.816370'),
(84, 'Cooking Oil', 8, 50, 60, 80, '2019-04-15 01:48:35.848465'),
(75, 'Rice', 9, 36, 50, 60, '2019-04-15 01:48:35.719011');

-- --------------------------------------------------------

--
-- Table structure for table `users`
--

CREATE TABLE `users` (
  `id` int(50) NOT NULL,
  `first_name` text NOT NULL,
  `last_name` text NOT NULL,
  `email` varchar(100) NOT NULL,
  `password` varchar(100) NOT NULL,
  `Time Stamp` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `users`
--

INSERT INTO `users` (`id`, `first_name`, `last_name`, `email`, `password`, `Time Stamp`) VALUES
(1, 'David', 'Wachira', 'davygcarl@gmail.com', '02', '2019-03-06 13:59:24'),
(3, 'Gade', 'Wanjiku', 'Gadekariithi@gmail.com', '1234', '2019-03-06 14:04:53'),
(2, 'Zephania', 'Mwando', 'Mwandojr@gmail.com', '1234', '2019-03-06 14:03:25'),
(4, 'Thomas', 'Kiarii', 'tom@gmail.com', '1234', '2019-03-08 10:57:09');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `users`
--
ALTER TABLE `users`
  ADD PRIMARY KEY (`email`),
  ADD KEY `id` (`id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `sales`
--
ALTER TABLE `sales`
  MODIFY `id` int(10) NOT NULL AUTO_INCREMENT;
--
-- AUTO_INCREMENT for table `stock`
--
ALTER TABLE `stock`
  MODIFY `id` int(20) NOT NULL AUTO_INCREMENT;
--
-- AUTO_INCREMENT for table `users`
--
ALTER TABLE `users`
  MODIFY `id` int(50) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;
/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
