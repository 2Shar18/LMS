-- phpMyAdmin SQL Dump
-- version 4.8.5
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Apr 29, 2020 at 04:21 PM
-- Server version: 10.1.38-MariaDB
-- PHP Version: 7.2.16

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET AUTOCOMMIT = 0;
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `laundry`
--

-- --------------------------------------------------------

--
-- Table structure for table `login`
--

CREATE TABLE `login` (
  `id` int(11) NOT NULL,
  `name` varchar(30) COLLATE utf8_unicode_ci NOT NULL,
  `username` varchar(20) COLLATE utf8_unicode_ci NOT NULL,
  `password` varchar(20) COLLATE utf8_unicode_ci NOT NULL,
  `email` varchar(50) COLLATE utf8_unicode_ci NOT NULL,
  `phone` bigint(10) NOT NULL,
  `address` varchar(100) COLLATE utf8_unicode_ci NOT NULL,
  `type` varchar(10) COLLATE utf8_unicode_ci NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Dumping data for table `login`
--

INSERT INTO `login` (`id`, `name`, `username`, `password`, `email`, `phone`, `address`, `type`) VALUES
(1, 'Dhobi', 'dhobi', '12345', 'dhobi@gmail.com', 0, '9876543210', 'laundry'),
(2, 'Tushar', 'tushar', '12345', 'tushar@gmail.com', 0, '9969475697', 'customer');

-- --------------------------------------------------------

--
-- Table structure for table `orders`
--

CREATE TABLE `orders` (
  `id` int(11) NOT NULL,
  `time` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP,
  `user_id` int(11) NOT NULL,
  `product` varchar(1000) COLLATE utf8_unicode_ci NOT NULL,
  `quantity` int(11) NOT NULL,
  `cost` float NOT NULL,
  `confirm` tinyint(1) NOT NULL DEFAULT '0',
  `type` varchar(20) COLLATE utf8_unicode_ci NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Dumping data for table `orders`
--

INSERT INTO `orders` (`id`, `time`, `user_id`, `product`, `quantity`, `cost`, `confirm`, `type`) VALUES
(1, '2020-04-29 13:53:05', 2, 'YToxMDp7aTowO3M6MToiMyI7aToxO2k6MDtpOjI7aTowO2k6MztpOjA7aTo0O2k6MDtpOjU7aTowO2k6NjtpOjA7aTo3O2k6MDtpOjg7aTowO2k6OTtpOjA7fQ==', 3, 15, 1, 'Washing'),
(2, '2020-04-29 13:53:06', 2, 'YToxMDp7aTowO3M6MToiMyI7aToxO3M6MToiMiI7aToyO3M6MToiMiI7aTozO3M6MToiMSI7aTo0O3M6MToiMSI7aTo1O2k6MDtpOjY7aTowO2k6NztpOjA7aTo4O2k6MDtpOjk7aTowO30=', 9, 78, 1, 'Washing'),
(3, '2020-04-29 13:53:06', 2, 'YToxMDp7aTowO2k6MDtpOjE7aTowO2k6MjtpOjA7aTozO2k6MDtpOjQ7aTowO2k6NTtzOjE6IjIiO2k6NjtzOjE6IjIiO2k6NztzOjE6IjIiO2k6ODtpOjA7aTo5O2k6MDt9', 6, 40, 1, 'Ironing');

-- --------------------------------------------------------

--
-- Table structure for table `product`
--

CREATE TABLE `product` (
  `id` int(11) NOT NULL,
  `name` varchar(10) COLLATE utf8_unicode_ci NOT NULL,
  `type` varchar(10) COLLATE utf8_unicode_ci NOT NULL,
  `costw` float NOT NULL,
  `costi` float NOT NULL,
  `costd` float NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Dumping data for table `product`
--

INSERT INTO `product` (`id`, `name`, `type`, `costw`, `costi`, `costd`) VALUES
(1, 'Shirt', 'Male', 5, 7, 9),
(2, 'T-shirt', 'Male', 5, 7, 9),
(3, 'Trousers', 'Male', 10, 12, 15),
(4, 'Shorts', 'Male', 5, 7, 9),
(5, 'Jeans', 'Male', 10, 12, 15),
(8, 'Shirt', 'Female', 5, 7, 9),
(9, 'T-shirt', 'Female', 5, 7, 9),
(10, 'Trousers', 'Female', 10, 12, 15),
(11, 'Saree', 'Female', 15, 17, 20),
(12, 'Dress', 'Female', 12, 15, 17);

--
-- Indexes for dumped tables
--

--
-- Indexes for table `login`
--
ALTER TABLE `login`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `orders`
--
ALTER TABLE `orders`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `product`
--
ALTER TABLE `product`
  ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `login`
--
ALTER TABLE `login`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT for table `orders`
--
ALTER TABLE `orders`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT for table `product`
--
ALTER TABLE `product`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=17;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
