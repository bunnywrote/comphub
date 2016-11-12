-- phpMyAdmin SQL Dump
-- version 4.5.1
-- http://www.phpmyadmin.net
--
-- Host: 127.0.0.1
-- Generation Time: Nov 12, 2016 at 08:56 PM
-- Server version: 10.1.16-MariaDB
-- PHP Version: 7.0.9

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `comphub`
--

-- --------------------------------------------------------

--
-- Table structure for table `products`
--

CREATE TABLE `products` (
  `id` int(11) NOT NULL,
  `name` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `descrEN` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `descrDE` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `descrFR` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `price` decimal(10,2) NOT NULL,
  `brandId` int(11) NOT NULL,
  `categoryId` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Dumping data for table `products`
--

INSERT INTO `products` (`id`, `name`, `descrEN`, `descrDE`, `descrFR`, `price`, `brandId`, `categoryId`) VALUES
(1, 'HP Spectre', 'Business Notebook', 'Business Laptop', 'Business Ordinateur', '2500.00', 11, 7),
(2, 'HP 650', 'Home Office Notebook', 'Home Office Laptop', 'Home Office Ordinateur', '999.00', 11, 7),
(3, 'HP Workstation', 'Workstation', 'Workstation', 'Workstation', '4500.00', 11, 8),
(4, 'Toshiba Sattelite', 'Business Notebook', 'Business Laptop', 'Business Ordinateur', '2999.00', 9, 7),
(5, 'Toshiba Workstation', 'Workstation', 'Workstation', 'Workstation', '3999.00', 9, 8),
(6, 'Lenovo Yoga', 'Business Notebook', 'Business Laptop', 'Business Ordinateur', '2670.00', 5, 7),
(7, 'Lenovo ThinkPad', 'Home Office Notebook', 'Home Office Laptop', 'Home Office Ordinateur', '1300.00', 5, 7),
(8, 'Apple MacBook PRO', 'Business Notebook', 'Business Laptop', 'Business Ordinateur', '3400.00', 3, 7),
(9, 'Apple MacBook', 'Home Office Notebook', 'Home Office Laptop', 'Home Office Ordinateur', '1800.00', 3, 7);

--
-- Indexes for dumped tables
--

--
-- Indexes for table `products`
--
ALTER TABLE `products`
  ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `products`
--
ALTER TABLE `products`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=10;
/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
