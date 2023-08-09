-- phpMyAdmin SQL Dump
-- version 5.1.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Aug 09, 2023 at 05:18 PM
-- Server version: 10.4.21-MariaDB
-- PHP Version: 8.0.12

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `shop_db`
--

-- --------------------------------------------------------

--
-- Table structure for table `admin_logi`
--

CREATE TABLE `admin_logi` (
  `admin_name` varchar(100) NOT NULL,
  `admin_password` varchar(100) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `admin_logi`
--

INSERT INTO `admin_logi` (`admin_name`, `admin_password`) VALUES
('suvani', 'P@ssWorD!@#1');

-- --------------------------------------------------------

--
-- Table structure for table `cart`
--

CREATE TABLE `cart` (
  `id` int(255) NOT NULL,
  `name` varchar(255) NOT NULL,
  `price` varchar(255) NOT NULL,
  `image` varchar(255) NOT NULL,
  `quantity` int(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `cart`
--

INSERT INTO `cart` (`id`, `name`, `price`, `image`, `quantity`) VALUES
(0, 'princess monoki', '16', 'princessmonoki.jpg', 1),
(0, 'howls moving castle', '12', 'howlscastle.jpg', 1);

-- --------------------------------------------------------

--
-- Table structure for table `order`
--

CREATE TABLE `order` (
  `id` int(255) NOT NULL,
  `name` varchar(20) NOT NULL,
  `number` varchar(12) NOT NULL,
  `email` varchar(255) NOT NULL,
  `method` varchar(30) NOT NULL,
  `flat` varchar(100) NOT NULL,
  `street` varchar(60) NOT NULL,
  `city` varchar(100) NOT NULL,
  `country` varchar(100) NOT NULL,
  `pin_code` int(10) NOT NULL,
  `total_products` varchar(255) NOT NULL,
  `total_price` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `order`
--

INSERT INTO `order` (`id`, `name`, `number`, `email`, `method`, `flat`, `street`, `city`, `country`, `pin_code`, `total_products`, `total_price`) VALUES
(0, 'suvani basnet', '99999999', 'basnet@gmail.com', 'cash on delivery', '12', 'gems school', 'lalitpur', 'Nepal', 654321, 'zelda(1), grave of fireflies(1), the wind rises(1)', '60'),
(0, 'suvani basnet', '99999999', 'basnet@gmail.com', 'cash on delivery', '12', 'gems school', 'lalitpur', 'Nepal', 654321, 'zelda(1), grave of fireflies(1), the wind rises(1)', '60'),
(0, 'suvani basnet', '99999999', 'basnet@gmail.com', 'cash on delivery', '12', 'gems school', 'lalitpur', 'Nepal', 654321, 'zelda(1), grave of fireflies(1), the wind rises(1)', '60'),
(0, 'suvani basnet', '99999999', 'basnet@gmail.com', 'cash on delivery', '12', 'gems school', 'lalitpur', 'Nepal', 654321, 'zelda(1), grave of fireflies(1), the wind rises(1)', '60'),
(0, 'suvani basnet', '99999999', 'basnet@gmail.com', 'cash on delivery', '12', 'gems school', 'lalitpur', 'Nepal', 654321, 'zelda(1), grave of fireflies(1), the wind rises(1)', '60'),
(0, 'suvani basnet', '99999999', 'basnet@gmail.com', 'cash on delivery', '12', 'gems school', 'lalitpur', 'Nepal', 654321, 'zelda(1), grave of fireflies(1), the wind rises(1)', '60'),
(0, 'suvani basnet', '99999999', 'basnet@gmail.com', 'cash on delivery', '12', 'gems school', 'lalitpur', 'Nepal', 654321, 'zelda(1), grave of fireflies(1), the wind rises(1)', '60'),
(0, 'suvani basnet', '99999999', 'basnet@gmail.com', 'cash on delivery', '12', 'gems school', 'lalitpur', 'Nepal', 654321, 'zelda(1), grave of fireflies(1), the wind rises(1)', '60'),
(0, 'suvani basnet', '99999999', 'basnet@gmail.com', 'cash on delivery', '12', 'gems school', 'lalitpur', 'Nepal', 654321, 'zelda(1), grave of fireflies(1), the wind rises(1)', '60'),
(0, 'suvam basnet', '88888888', 'suvam@gmail.com', 'cash on delivery', '12', 'satdobato', 'ktm', 'Nepal', 654321, 'zelda(1), grave of fireflies(1), the wind rises(1)', '60'),
(0, 'suvu', '55555555', 'basnet@gmail.com', 'cash on delivery', '12', 'gems school', 'lalitpur', 'Nepal', 0, 'zelda(2), grave of fireflies(2), the wind rises(2)', '120'),
(0, 'suv', '6666666', 'basnet@gmail.com', 'cash on delivery', '12', 'gems school', 'lalitpur', 'Nepal', 654321, 'zelda(2), grave of fireflies(2), the wind rises(2)', '120'),
(0, 'suvani basnet', '88888888', 'basnet@gmail.com', 'cash on delivery', '12', 'gems school', 'lalitpur', 'Nepal', 654321, 'zelda(2), grave of fireflies(2), the wind rises(2)', '120');

-- --------------------------------------------------------

--
-- Table structure for table `products`
--

CREATE TABLE `products` (
  `id` int(255) NOT NULL,
  `name` varchar(255) NOT NULL,
  `price` varchar(255) NOT NULL,
  `image` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `products`
--

INSERT INTO `products` (`id`, `name`, `price`, `image`) VALUES
(54, 'The wind rises', '8', 'windrises.jpg'),
(56, 'spirited away', '20', 'spirited-away.jpg');

-- --------------------------------------------------------

--
-- Table structure for table `user`
--

CREATE TABLE `user` (
  `id` int(11) NOT NULL,
  `name` varchar(255) DEFAULT NULL,
  `email` varchar(255) NOT NULL,
  `password_hash` varchar(500) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `user`
--

INSERT INTO `user` (`id`, `name`, `email`, `password_hash`) VALUES
(1, 'Riwaj Chalise', 'riwaj5972@gmail.com', '$2y$10$8Li4nx3KmHuWgSmrjqOBKOTKPN/Hp1e7f6085QS4hTJmYL86iZM3G'),
(6, 'Ashely Estrada', 'butafada@mailinator.com', '$2y$10$wM92x9mG6B5xLyzI2AG4wOPVISmba4fyeF9av0tyRW.HAEfv5vLBy'),
(7, 'suvani basnet', 'suvani@gmail.com', '$2y$10$o0D6FTVZjTlIj1EVu4P2Y.Z/VqtSjuMsWTipA5yodVhzY5l4qKp8q'),
(8, 'supri', 'supriya@gmail.com', '$2y$10$hSaxw1ytegnfm9gPU3xNFu41jO1yJol72ZqloW7y7UVE1o6/YNfre'),
(9, 'suvanii', 'suv@gmail.com', '$2y$10$gKDBywSzuOJfG3SEFb81K.xZdbIaN9TUURAJCEOMuZfdmyfksWNIm');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `products`
--
ALTER TABLE `products`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `user`
--
ALTER TABLE `user`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `email` (`email`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `products`
--
ALTER TABLE `products`
  MODIFY `id` int(255) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=57;

--
-- AUTO_INCREMENT for table `user`
--
ALTER TABLE `user`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=10;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
