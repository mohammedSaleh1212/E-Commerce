-- phpMyAdmin SQL Dump
-- version 5.2.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1:3306
-- Generation Time: Feb 19, 2024 at 12:19 PM
-- Server version: 8.2.0
-- PHP Version: 8.2.13

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `mystore`
--

-- --------------------------------------------------------

--
-- Table structure for table `cartproducts`
--

DROP TABLE IF EXISTS `cartproducts`;
CREATE TABLE IF NOT EXISTS `cartproducts` (
  `id` int NOT NULL AUTO_INCREMENT,
  `image_path` varchar(1024) NOT NULL,
  `title` varchar(1024) NOT NULL,
  `price` int NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=MyISAM AUTO_INCREMENT=8 DEFAULT CHARSET=utf8mb3;

--
-- Dumping data for table `cartproducts`
--

INSERT INTO `cartproducts` (`id`, `image_path`, `title`, `price`) VALUES
(1, 'images/products/f1.jpg', 'قميص ', 100000),
(2, 'images/products/f1.jpg', 'قميص تاني', 20000),
(3, 'images/products/f1.jpg', 'فسطان', 234234),
(4, 'images/products/f1.jpg', 'فسطاااان', 234234),
(5, 'images/products/f1.jpg', 'قققثثث', 20000),
(6, 'images/products/f1.jpg', 'سيبسي', 20000),
(7, 'images/products/f1.jpg', 'سيبسشب', 20000);

-- --------------------------------------------------------

--
-- Table structure for table `products`
--

DROP TABLE IF EXISTS `products`;
CREATE TABLE IF NOT EXISTS `products` (
  `id` int NOT NULL AUTO_INCREMENT,
  `product_name` varchar(100) NOT NULL,
  `description` varchar(1024) NOT NULL,
  `image_path` varchar(100) NOT NULL,
  `quantity` int NOT NULL,
  `price` int NOT NULL,
  `for_men` tinyint(1) NOT NULL DEFAULT '1',
  PRIMARY KEY (`id`)
) ENGINE=MyISAM AUTO_INCREMENT=104 DEFAULT CHARSET=utf8mb3;

--
-- Dumping data for table `products`
--

INSERT INTO `products` (`id`, `product_name`, `description`, `image_path`, `quantity`, `price`, `for_men`) VALUES
(1, 'name', 'qwepppqwe', 'images/products/f1.jpg', 22, 600000, 1),
(2, 'name', 'qwepppqwe', 'images/products/f1.jpg', 22, 600000, 1),
(3, 'asd', 'adas', 'images/products/f1.jpg', 12, 400000, 1),
(4, 'example3', 'dasdaexample', 'images/products/f1.jpg', 22, 500000, 1),
(5, 'example4', 'example', 'images/products/f1.jpg', 22, 0, 1),
(6, 'example5', 'example', 'images/products/f1.jpg', 22, 220000, 1),
(7, 'example', 'example', 'images/products/f1.jpg', 22, 220000, 1),
(8, 'example', 'asdasexample', 'images/products/f1.jpg', 22, 0, 1),
(9, 'example', 'example', 'images/products/f1.jpg', 22, 220000, 1),
(10, 'example', 'example', 'images/products/f1.jpg', 22, 220000, 1),
(11, 'example', 'example', 'images/products/f1.jpg', 22, 220000, 1),
(13, 'example', 'example', 'images/products/f1.jpg', 22, 220000, 1),
(14, 'example', 'example', 'images/products/f1.jpg', 22, 220000, 1),
(15, 'example', 'example', 'images/products/f1.jpg', 22, 220000, 1),
(16, 'example', 'example', 'images/products/f1.jpg', 22, 220000, 1),
(17, 'example', 'example', 'images/products/f1.jpg', 22, 220000, 1),
(18, 'example', 'example', 'images/products/f1.jpg', 22, 220000, 1),
(19, 'example', 'example', 'images/products/f1.jpg', 22, 220000, 1),
(20, 'example', 'example', 'images/products/f1.jpg', 22, 220000, 1),
(21, 'example', 'example', 'images/products/f1.jpg', 22, 220000, 1),
(22, 'example', 'example', 'images/products/f1.jpg', 22, 220000, 1),
(23, 'example', 'example', 'images/products/f1.jpg', 22, 220000, 1),
(24, 'example', 'example', 'images/products/f1.jpg', 22, 220000, 1),
(25, 'example', 'example', 'images/products/f1.jpg', 22, 220000, 1),
(26, 'example', 'example', 'images/products/f1.jpg', 22, 220000, 1),
(27, 'example', 'example', 'images/products/f1.jpg', 22, 220000, 1),
(28, 'example', 'example', 'images/products/f1.jpg', 22, 220000, 1),
(29, 'example', 'example', 'images/products/f1.jpg', 22, 220000, 1),
(30, 'example', 'example', 'images/products/f1.jpg', 22, 220000, 1),
(31, 'example', 'example', 'images/products/f1.jpg', 22, 220000, 1),
(32, 'example', 'example', 'images/products/f1.jpg', 22, 220000, 1),
(33, 'example', 'example', 'images/products/f1.jpg', 22, 220000, 1),
(34, 'example', 'example', 'images/products/f1.jpg', 22, 220000, 1),
(35, 'example', 'example', 'images/products/f1.jpg', 22, 220000, 1),
(36, 'example', 'example', 'images/products/f1.jpg', 22, 220000, 1),
(37, 'example', 'example', 'images/products/f1.jpg', 22, 220000, 1),
(38, 'example', 'example', 'images/products/f1.jpg', 22, 220000, 1),
(39, 'example', 'example', 'images/products/f1.jpg', 22, 220000, 1),
(40, 'example', 'example', 'images/products/f1.jpg', 22, 220000, 1),
(41, 'example', 'example', 'images/products/f1.jpg', 22, 220000, 1),
(42, 'example', 'example', 'images/products/f1.jpg', 22, 220000, 1),
(43, 'example', 'example', 'images/products/f1.jpg', 22, 220000, 1),
(44, 'example', 'example', 'images/products/f1.jpg', 22, 220000, 1),
(45, 'example', 'example', 'images/products/f1.jpg', 22, 220000, 1),
(46, 'example', 'example', 'images/products/f1.jpg', 22, 220000, 1),
(47, 'example', 'example', 'images/products/f1.jpg', 22, 220000, 1),
(48, 'example', 'example', 'images/products/f1.jpg', 22, 220000, 1),
(49, 'example', 'example', 'images/products/f1.jpg', 22, 220000, 1),
(50, 'example', 'example', 'images/products/f1.jpg', 22, 220000, 1),
(51, 'example', 'example', 'images/products/f1.jpg', 22, 220000, 1),
(52, 'example', 'example', 'images/products/f1.jpg', 22, 220000, 1),
(53, 'example', 'example', 'images/products/f1.jpg', 22, 220000, 1),
(54, 'example', 'example', 'images/products/f1.jpg', 22, 220000, 1),
(55, 'example', 'example', 'images/products/f1.jpg', 22, 220000, 1),
(56, 'example', 'example', 'images/products/f1.jpg', 22, 220000, 1),
(57, 'example', 'example', 'images/products/f1.jpg', 22, 220000, 1),
(58, 'example', 'example', 'images/products/f1.jpg', 22, 220000, 1),
(59, 'example', 'example', 'images/products/f1.jpg', 22, 220000, 1),
(60, 'example', 'example', 'images/products/f1.jpg', 22, 220000, 1),
(61, 'example', 'example', 'images/products/f1.jpg', 22, 220000, 1),
(62, 'example', 'example', 'images/products/f1.jpg', 22, 220000, 1),
(63, 'example', 'example', 'images/products/f1.jpg', 22, 220000, 1),
(64, 'example', 'example', 'images/products/f1.jpg', 22, 220000, 1),
(65, 'example', 'example', 'images/products/f1.jpg', 22, 220000, 1),
(66, 'example', 'example', 'images/products/f1.jpg', 22, 220000, 1),
(67, 'example', 'example', 'images/products/f1.jpg', 22, 220000, 1),
(68, 'example', 'example', 'images/products/f1.jpg', 22, 220000, 1),
(69, 'example', 'example', 'images/products/f1.jpg', 22, 220000, 1),
(70, 'example', 'example', 'images/products/f1.jpg', 22, 220000, 1),
(71, 'example', 'example', 'images/products/f1.jpg', 22, 220000, 1),
(72, 'example', 'example', 'images/products/f1.jpg', 22, 220000, 1),
(73, 'example', 'example', 'images/products/f1.jpg', 22, 220000, 1),
(74, 'example', 'example', 'images/products/f1.jpg', 22, 220000, 1),
(75, 'example', 'example', 'images/products/f1.jpg', 22, 220000, 1),
(76, 'example', 'example', 'images/products/f1.jpg', 22, 220000, 1),
(77, 'example', 'example', 'images/products/f1.jpg', 22, 220000, 1),
(78, 'example', 'example', 'images/products/f1.jpg', 22, 220000, 1),
(79, 'example', 'example', 'images/products/f1.jpg', 22, 220000, 1),
(80, 'example', 'example', 'images/products/f1.jpg', 22, 220000, 1),
(81, 'example', 'example', 'images/products/f1.jpg', 22, 220000, 1),
(82, 'example', 'example', 'images/products/f1.jpg', 22, 220000, 1),
(83, 'example', 'example', 'images/products/f1.jpg', 22, 220000, 1),
(84, 'example', 'example', 'images/products/f1.jpg', 22, 220000, 1),
(85, 'example', 'example', 'images/products/f1.jpg', 22, 220000, 1),
(86, 'example', 'example', 'images/products/f1.jpg', 22, 220000, 1),
(87, 'example', 'example', 'images/products/f1.jpg', 22, 220000, 1),
(88, 'example', 'example', 'images/products/f1.jpg', 22, 220000, 1),
(89, 'example', 'example', 'images/products/f1.jpg', 22, 220000, 1),
(90, 'example', 'example', 'images/products/f1.jpg', 22, 220000, 1),
(91, 'example', 'example', 'images/products/f1.jpg', 22, 220000, 1),
(92, 'example', 'example', 'images/products/f1.jpg', 22, 220000, 1),
(93, 'example', 'example', 'images/products/f1.jpg', 22, 220000, 1),
(94, 'example', 'example', 'images/products/f1.jpg', 22, 220000, 1),
(95, 'example', 'example', 'images/products/f1.jpg', 22, 220000, 1),
(96, 'example', 'example', 'images/products/f1.jpg', 22, 220000, 1),
(97, 'example', 'example', 'images/products/f1.jpg', 22, 220000, 1),
(98, 'example', 'example', 'images/products/f1.jpg', 22, 220000, 1),
(99, 'example', 'example', 'images/products/f1.jpg', 22, 4220000, 1),
(100, 'example', 'example', 'images/products/f1.jpg', 22, 220000, 1),
(101, 'example', 'example', 'images/products/f1.jpg', 22, 220000, 1),
(102, 'asd', 'asd', 'images/products/f6.jpg', 22, 123, 1),
(12, 'example', 'example', 'images/products/f1.jpg', 22, 220000, 1),
(103, 'asdqw', 'شسيqwe', 'images/products/f1.jpg', 2, 120000, 1);

-- --------------------------------------------------------

--
-- Table structure for table `users`
--

DROP TABLE IF EXISTS `users`;
CREATE TABLE IF NOT EXISTS `users` (
  `id` int NOT NULL AUTO_INCREMENT,
  `user_name` varchar(100) CHARACTER SET utf8mb3 COLLATE utf8mb3_general_ci NOT NULL,
  `user_password` varchar(40) NOT NULL,
  `email` varchar(100) NOT NULL,
  `is_valid` tinyint(1) NOT NULL DEFAULT '1',
  `is_admin` tinyint(1) NOT NULL DEFAULT '0',
  PRIMARY KEY (`id`),
  UNIQUE KEY `email` (`email`)
) ENGINE=MyISAM AUTO_INCREMENT=20 DEFAULT CHARSET=utf8mb3;

--
-- Dumping data for table `users`
--

INSERT INTO `users` (`id`, `user_name`, `user_password`, `email`, `is_valid`, `is_admin`) VALUES
(10, 'mohammed', '40bd001563085fc35165329ea1ff5c5ecbdbbeef', 'mohammedsaleh@gmail.com', 1, 0),
(11, 'mohammed', '40bd001563085fc35165329ea1ff5c5ecbdbbeef', 'mohammed@gmail.com', 1, 1),
(12, 'ali', 'f0483f255e0ce2c93d5dfa593f2161b266474869', 'aliibrahem@gmail.com', 1, 0),
(13, 'gg', '40bd001563085fc35165329ea1ff5c5ecbdbbeef', 'gg@gmail.com', 1, 0),
(14, 'ghadir', '40bd001563085fc35165329ea1ff5c5ecbdbbeef', 'ghadirSaleh@gmail.com', 1, 0),
(15, 'hasan', '40bd001563085fc35165329ea1ff5c5ecbdbbeef', 'hasan@gmail.com', 1, 0),
(16, 'mohammed', '40bd001563085fc35165329ea1ff5c5ecbdbbeef', 'moSaleh@gmail.com', 1, 0),
(17, 'mt', '40bd001563085fc35165329ea1ff5c5ecbdbbeef', 'mt@ww', 1, 0),
(18, 'mt', '40bd001563085fc35165329ea1ff5c5ecbdbbeef', 'mt@mt', 1, 0),
(19, 'mt', '40bd001563085fc35165329ea1ff5c5ecbdbbeef', 'mt@gmail', 1, 0);
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
