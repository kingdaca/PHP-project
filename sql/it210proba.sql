-- phpMyAdmin SQL Dump
-- version 4.8.5
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Aug 13, 2019 at 08:33 PM
-- Server version: 10.1.38-MariaDB
-- PHP Version: 7.3.3

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET AUTOCOMMIT = 0;
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `it210proba`
--

-- --------------------------------------------------------

--
-- Table structure for table `narudzbenica`
--

CREATE TABLE `narudzbenica` (
  `id_user` int(11) NOT NULL,
  `id_product` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `narudzbenica`
--

INSERT INTO `narudzbenica` (`id_user`, `id_product`) VALUES
(11, 5),
(11, 6);

-- --------------------------------------------------------

--
-- Table structure for table `tbl_product`
--

CREATE TABLE `tbl_product` (
  `id` int(11) auto_increment primary key ,
  `name` varchar(50) NOT NULL,
  `image` varchar(255) NOT NULL,
  `price` double(10,2) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `tbl_product`
--

INSERT INTO `tbl_product` (`id`, `name`, `image`, `price`) VALUES
(1, 'Asus N705FD-GC061', '1.jpg', 1142.00),
(2, 'Asus ROG Strix G731GU-EV007', '2.jpg', 999.00),
(3, 'MacBook Pro 13', '3.jpg', 1000.00),
(4, 'Dell 3567', '4.jpg', 500.00),
(5, 'Lenovo Legion Y530-15ICH', '5.jpg', 1200.00),
(6, 'Asus VivoBook S530FN-BQ079', '6.jpg', 999.00);

-- --------------------------------------------------------

--
-- Table structure for table `users`
--

CREATE TABLE `users` (
  `id` int(11) NOT NULL,
  `name` varchar(50) NOT NULL,
  `last_name` varchar(50) NOT NULL,
  `email` varchar(70) NOT NULL,
  `username` varchar(50) NOT NULL,
  `password` varchar(512) NOT NULL,
  `role` varchar(20) DEFAULT 'user',
  `created_at` datetime DEFAULT CURRENT_TIMESTAMP
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `users`
--

INSERT INTO `users` (`id`, `name`, `last_name`, `email`, `username`, `password`, `role`, `created_at`) VALUES
(1, 'stefan', 'stefanovic', 'stefan@gmail.com', 'stefan22', '123456', 'user', '2017-06-18 02:22:22'),
(2, 'nikola', 'nikolic', 'nikola@gmail.com', 'nikola52', '1234567', 'user', '2016-06-18 02:02:22'),
(3, 'marko', 'markovic', 'marko@gmail.com', 'maree', '1234568', 'user', '2019-05-18 02:22:22'),
(4, 'milos', 'markovic', 'milos@gmail.com', 'miloss', '1234569', 'user', '2019-03-18 03:22:22'),
(5, 'marija', 'markovic', 'marija@gmail.com', 'maraa', '*6BB4837EB74329105EE4568DDA7DC67ED2CA2AD9', 'user', '2019-06-11 05:22:22'),
(6, 'stevan', 'stevanovic', 'stevan@gmail.com', 'stevanovic', '123456', 'user', '2019-06-18 01:10:22'),
(7, '', '', '', 'david', '$2y$10$gyGyDxwmgWgUoWhPbb2P0OURNyr2HhqFhrWcPDcyHjsqLIFLoVsKe', 'user', '2019-08-13 19:38:05'),
(10, 'David1', 'davidovic1', 'david.mitic.3704@metropolita.ac.rs', 'admin', '$2y$10$mwW1hNGs35e.zLRyr3ca6.dSOEuBKEnY/Il6Kjj28OOIq2IvG9qVa', 'user', '2019-08-13 19:53:16'),
(11, 'petar', 'petrovic', 'petar12@gmail.com', 'admin2', '$2y$12$bqUJT7jFTcXR2NyHnY7sUORMEk.nixuSJm6mcFDJsl0dyVl2Nregu', 'admin', '2019-08-13 20:00:20'),
(12, 'David', 'davidovic23', 'david.mitic.3704@metropolitan.ac.rs', 'admin3', '$2y$10$Bl1DCuQSo.IoHVkH4H4F7ONzq0A5m8CEeAd.WiXXineUuAC8ydfaS', 'user', '2019-08-13 20:01:32');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `tbl_product`
--
ALTER TABLE `tbl_product`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `users`
--
ALTER TABLE `users`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `email` (`email`),
  ADD UNIQUE KEY `username` (`username`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `tbl_product`
--
ALTER TABLE `tbl_product`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=7;

--
-- AUTO_INCREMENT for table `users`
--
ALTER TABLE `users`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=13;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
