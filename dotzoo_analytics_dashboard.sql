-- phpMyAdmin SQL Dump
-- version 4.9.11
-- https://www.phpmyadmin.net/
--
-- Host: localhost:3306
-- Generation Time: Apr 23, 2023 at 11:51 PM
-- Server version: 5.7.23-23
-- PHP Version: 7.4.33

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET AUTOCOMMIT = 0;
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `dotzoo_analytics_dashboard`
--

-- --------------------------------------------------------

--
-- Table structure for table `admin`
--

CREATE TABLE `admin` (
  `admin_id` int(11) NOT NULL,
  `username` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `email` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `password` varchar(255) COLLATE utf8_unicode_ci NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Dumping data for table `admin`
--

INSERT INTO `admin` (`admin_id`, `username`, `email`, `password`) VALUES
(1, 'Vikash Luthra', 'admin@gmail.com', 'admin');

-- --------------------------------------------------------

--
-- Table structure for table `date_range`
--

CREATE TABLE `date_range` (
  `id` int(11) NOT NULL,
  `start_date` date NOT NULL,
  `end_date` date NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Dumping data for table `date_range`
--

INSERT INTO `date_range` (`id`, `start_date`, `end_date`) VALUES
(1, '2022-10-22', '2023-04-20');

-- --------------------------------------------------------

--
-- Table structure for table `masterlogin`
--

CREATE TABLE `masterlogin` (
  `id` int(255) NOT NULL,
  `username` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `email` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `password` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `role` varchar(255) COLLATE utf8_unicode_ci NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Dumping data for table `masterlogin`
--

INSERT INTO `masterlogin` (`id`, `username`, `email`, `password`, `role`) VALUES
(1, 'vikash luthra', 'vluthra@dotzoo.net', '$2y$10$U6iUDcvEi8zTV7H0oyuqWehFX9O17bhXF6lawTUMwlmdbScEdr2t6', 'admin'),
(2, 'edmonds bay dental', 'edmondsbaydental.com@gmail.com', '$2y$10$U6iUDcvEi8zTV7H0oyuqWehFX9O17bhXF6lawTUMwlmdbScEdr2t6', 'user');

-- --------------------------------------------------------

--
-- Table structure for table `users`
--

CREATE TABLE `users` (
  `id` int(11) NOT NULL,
  `username` varchar(200) NOT NULL,
  `email` varchar(200) NOT NULL,
  `domain` varchar(255) NOT NULL,
  `role` varchar(255) NOT NULL,
  `password` text NOT NULL,
  `created_at` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `users`
--

INSERT INTO `users` (`id`, `username`, `email`, `domain`, `role`, `password`, `created_at`) VALUES
(1, 'Vikash Luthra', 'admin@gmail.com', 'admin', 'admin', '$2y$10$Y3RsK8GIOK1O2sQ2frXLlu4LajalwDD.tDzBYdup1VcUJ.THNeKwe', '2023-04-15 11:54:35'),
(2, 'Edmonds Bay Dental', 'edmondsbaydental.com@gmail.com', 'edmondsbaydental.com', 'user', '$2y$10$8xMIC16JA7dERF.JZWF/3.EmlyeEjSGuA5IV.552yMtgixhIcrNAS', '2023-04-15 09:59:49'),
(3, 'Vikash Luthra', 'dotzoo.com@gmail.com', 'dotzoo.com', 'user', '$2y$10$q9dFCUALrx6BOQC7PzDReOWxUPk231ZNua0WGsEbwN9xQOgXACiO2', '2023-04-15 09:59:57'),
(4, 'Vikash Luthra', 'dzoapps.com@gmail.com', 'dzoapps.com', 'user', '$2y$10$Y3RsK8GIOK1O2sQ2frXLlu4LajalwDD.tDzBYdup1VcUJ.THNeKwe', '2023-04-15 12:17:52'),
(5, 'Vikash Luthra', 'dotzoo.net@gmail.com', 'dotzoo.net', 'user', '$2y$10$Y3RsK8GIOK1O2sQ2frXLlu4LajalwDD.tDzBYdup1VcUJ.THNeKwe', '2023-04-15 12:17:59'),
(6, 'IeRM', 'ie-rm@gmail.com', 'ie-rm.org', 'user', '$2y$10$eoX27ABXm08PYFJ3krtTL.OO1G0IqFs18hS7YRlipIZJ0q0Z/WNxu', '2023-04-15 10:00:15'),
(7, 'Pacific Highway Dental', 'pacifichighwaydental@gmail.com', 'pacifichighwaydental.com', 'user', '$2y$10$qc.QqjMVY7wCFox4gf.QqOF0gJJEfHGAtdRee1W8Dn0EzgDYpcyLi', '2023-04-15 10:00:22'),
(8, 'Cascade Thermal', 'cascadethermal.com@gmail.com', 'cascadethermal.com', 'user', '$2y$10$Vtb.k5a5R6ii629r50wJteGebuKkZCAnbJlfBdpC5ujFGu1GsuvN.', '2023-04-15 10:00:30'),
(9, 'Exserosoft', 'exserosoft@gmail.com', 'exserosoft.com', 'user', '$2y$10$GVCSzx5rjF0f1MORQOqe/.kex5kzJqVaYavRNJBG6V64wsVDpbqr2', '2023-04-15 10:00:36'),
(10, 'FoldnGoBikes', 'foldngobikes@gmail.com', 'FoldnGoBikes.com', 'user', '$2y$10$3ve2nbbeAMddEmDuhxALTOPX6.o.zNBZnXHRU.VIlXoRoniT8dASK', '2023-04-15 10:00:43'),
(11, 'PPE-Mart', 'ppemart@gmail.com', 'ppemart.com', 'user', '$2y$10$mctAmYGSjWmiURGIyOGMfO0aZctqvGZvj.uHeWkQENygzXGWYiD16', '2023-04-15 10:00:50'),
(120, 'manu', 'manu@gmail.com', 'manu', 'user', '$2y$10$cLSQfNeOlq40Q6L2RZC9KOpta2ydkWZlvjR2jy6zYrHn68UyD1sTi', '2023-04-17 08:34:45'),
(121, 'amit ', 'amit@gmail.com', 'amit', 'user', '$2y$10$qNOabW1erL2ILpCu5Y5dAOMzMjCjCHbRyKBDBTe31BNnwpp2/XVL.', '2023-04-18 04:20:17'),
(123, 'aashi jiuiu', 'aashi@gmail.com', 'aashi', 'user', '$2y$10$AyeGxjdxZpioKJXt0lf6yuV/4p6JQL.2Jj.diPEdV4woeizCaZ3RW', '2023-04-18 04:35:20'),
(125, 'Ram  singh', 'ram@gmail.com', 'ram', 'user', '$2y$10$8lZ/UvcMI/CZqC565rCW7uElZZQMe487r03W0X0EGrEAX84l19t52', '2023-04-22 05:07:39');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `admin`
--
ALTER TABLE `admin`
  ADD PRIMARY KEY (`admin_id`);

--
-- Indexes for table `date_range`
--
ALTER TABLE `date_range`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `masterlogin`
--
ALTER TABLE `masterlogin`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `users`
--
ALTER TABLE `users`
  ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `admin`
--
ALTER TABLE `admin`
  MODIFY `admin_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT for table `date_range`
--
ALTER TABLE `date_range`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT for table `masterlogin`
--
ALTER TABLE `masterlogin`
  MODIFY `id` int(255) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT for table `users`
--
ALTER TABLE `users`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=126;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
