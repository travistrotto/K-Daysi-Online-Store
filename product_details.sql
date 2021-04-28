-- phpMyAdmin SQL Dump
-- version 5.0.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: May 12, 2020 at 01:48 AM
-- Server version: 10.4.11-MariaDB
-- PHP Version: 7.4.2

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET AUTOCOMMIT = 0;
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `product_details`
--

-- --------------------------------------------------------

--
-- Table structure for table `accounts`
--

CREATE TABLE `accounts` (
  `userid` int(255) NOT NULL,
  `userAccount` varchar(20) NOT NULL,
  `userPass` varchar(20) NOT NULL,
  `userEmail` varchar(50) NOT NULL,
  `create_datetime` datetime DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `accounts`
--

INSERT INTO `accounts` (`userid`, `userAccount`, `userPass`, `userEmail`, `create_datetime`) VALUES
(1, 'travis', 'trotto1', '', NULL),
(2, 'michelle', 'gonzalez1', '', NULL),
(3, 'esmond', 'chin1', '', NULL),
(12, 'test', 'test', 'test@test.com', '2020-05-11 20:30:31'),
(15, 'John_NYC', 'check123', 'ilovephp@csi.com', '2020-05-11 22:59:43'),
(16, 'poohbear', '1234', 'winnie@thepooh.com', '2020-05-11 23:00:44'),
(17, 'account5', 'Pwd99', 'trying@php.com', '2020-05-11 23:01:29');

-- --------------------------------------------------------

--
-- Table structure for table `adminaccounts`
--

CREATE TABLE `adminaccounts` (
  `adminAccount` varchar(20) DEFAULT NULL,
  `adminPass` varchar(20) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `adminaccounts`
--

INSERT INTO `adminaccounts` (`adminAccount`, `adminPass`) VALUES
('admin', 'admin1');

-- --------------------------------------------------------

--
-- Table structure for table `help_tickets`
--

CREATE TABLE `help_tickets` (
  `id` int(10) NOT NULL,
  `cust` varchar(20) DEFAULT NULL,
  `email` varchar(30) DEFAULT NULL,
  `orderno` varchar(10) DEFAULT NULL,
  `issue` varchar(500) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `help_tickets`
--

INSERT INTO `help_tickets` (`id`, `cust`, `email`, `orderno`, `issue`) VALUES
(62, 'John', 'jn@gm.com', 'KD1223', 'No receipt'),
(67, 'John', 'jn@gm.com', 'KD1223', 'No receipt'),
(68, 'test', 'test', 'test', 'test'),
(69, 'pooh', 'winnie@thepooh.com', 'K66790', 'Haven\'t received my order yet');

-- --------------------------------------------------------

--
-- Table structure for table `product`
--

CREATE TABLE `product` (
  `id` int(11) NOT NULL,
  `pname` varchar(255) DEFAULT NULL,
  `image` varchar(255) DEFAULT NULL,
  `price` double DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `product`
--

INSERT INTO `product` (`id`, `pname`, `image`, `price`) VALUES
(1, 'Jeans', 'sale2.jpg', 49.99),
(2, 'Hoodie', 'sale1.jpg', 39.99),
(3, 'Shoes', 'sale3.jpg', 29.99),
(4, 'Watch', 'sale4.JPG', 99.99);

--
-- Indexes for dumped tables
--

--
-- Indexes for table `accounts`
--
ALTER TABLE `accounts`
  ADD PRIMARY KEY (`userid`),
  ADD UNIQUE KEY `userAccount` (`userAccount`);

--
-- Indexes for table `help_tickets`
--
ALTER TABLE `help_tickets`
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
-- AUTO_INCREMENT for table `accounts`
--
ALTER TABLE `accounts`
  MODIFY `userid` int(255) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=19;

--
-- AUTO_INCREMENT for table `help_tickets`
--
ALTER TABLE `help_tickets`
  MODIFY `id` int(10) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=70;

--
-- AUTO_INCREMENT for table `product`
--
ALTER TABLE `product`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=9;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
