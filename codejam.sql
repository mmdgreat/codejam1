-- phpMyAdmin SQL Dump
-- version 3.5.1
-- http://www.phpmyadmin.net
--
-- Host: localhost
-- Generation Time: May 15, 2013 at 10:39 AM
-- Server version: 5.1.63-0ubuntu0.11.10.1
-- PHP Version: 5.3.6-13ubuntu3.9

SET SQL_MODE="NO_AUTO_VALUE_ON_ZERO";
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8 */;

--
-- Database: `codejam`
--

-- --------------------------------------------------------

--
-- Table structure for table `cart_items`
--

CREATE TABLE IF NOT EXISTS `cart_items` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `order_id` int(11) NOT NULL,
  `product_id` int(11) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=MyISAM  DEFAULT CHARSET=latin1 AUTO_INCREMENT=49 ;

--
-- Dumping data for table `cart_items`
--

INSERT INTO `cart_items` (`id`, `order_id`, `product_id`) VALUES
(4, 6, 4),
(3, 6, 1),
(5, 6, 6),
(6, 7, 6),
(7, 7, 11),
(8, 7, 13),
(9, 7, 15),
(10, 8, 17),
(11, 8, 15),
(12, 8, 12),
(13, 8, 10),
(14, 8, 8),
(15, 8, 1),
(16, 9, 4),
(17, 9, 5),
(18, 9, 18),
(19, 10, 11),
(20, 10, 9),
(21, 10, 10),
(22, 10, 17),
(23, 11, 1),
(24, 11, 2),
(25, 11, 3),
(26, 11, 4),
(27, 11, 5),
(28, 11, 16),
(29, 11, 19),
(30, 12, 14),
(31, 12, 15),
(32, 12, 19),
(33, 12, 13),
(34, 12, 5),
(35, 12, 6),
(36, 14, 8),
(37, 14, 10),
(38, 14, 13),
(39, 15, 1),
(40, 15, 18),
(41, 15, 9),
(42, 15, 15),
(43, 16, 1),
(44, 16, 3),
(45, 16, 11),
(46, 16, 13),
(47, 16, 19),
(48, 16, 16);

-- --------------------------------------------------------

--
-- Table structure for table `orders`
--

CREATE TABLE IF NOT EXISTS `orders` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `user_id` int(11) NOT NULL,
  `created_on` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP,
  `order_total` decimal(10,2) DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=MyISAM  DEFAULT CHARSET=latin1 AUTO_INCREMENT=17 ;

--
-- Dumping data for table `orders`
--

INSERT INTO `orders` (`id`, `user_id`, `created_on`, `order_total`) VALUES
(10, 4, '2013-05-14 15:31:51', '770.00'),
(9, 3, '2013-05-14 15:31:35', '120.00'),
(8, 8, '2013-05-14 15:30:02', '970.00'),
(7, 1, '2013-05-13 15:28:20', '230.00'),
(6, 2, '2013-05-01 15:25:39', '260.00'),
(11, 12, '2013-05-14 15:32:07', '410.00'),
(12, 6, '2013-05-14 20:32:20', '290.00'),
(14, 11, '2013-05-14 21:29:04', '710.00'),
(15, 7, '2013-05-14 21:33:58', '310.00'),
(16, 11, '2013-05-15 05:00:57', '380.00');

-- --------------------------------------------------------

--
-- Table structure for table `products`
--

CREATE TABLE IF NOT EXISTS `products` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `product_name` varchar(211) NOT NULL,
  `product_price` decimal(11,0) NOT NULL,
  `product_image` varchar(211) NOT NULL,
  `comments` varchar(211) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=20 ;

--
-- Dumping data for table `products`
--

INSERT INTO `products` (`id`, `product_name`, `product_price`, `product_image`, `comments`) VALUES
(1, 'apple', '140', 'img/apple.jpg', 'price is for one apple'),
(2, 'banana', '30', 'img/banana.jpg', 'price for dozones of banana'),
(3, 'brinjal', '40', 'img/brinjal.jpg', 'price per kg'),
(4, 'capsicum', '40', 'img/capsicum.jpg', 'price per kg'),
(5, 'carrot', '60', 'img/carrot.jpg', 'price per kg'),
(6, 'grapes', '80', 'img/grapes.jpg', 'price per kg'),
(7, 'greenChilly', '20', 'img/greenChilly.jpg', 'price per kg'),
(8, 'ladiesfinger', '30', 'img/ladiesfinger.jpg', 'price per kg'),
(9, 'lemon', '100', 'img/lemon.jpg', 'price for 10 lemons'),
(10, 'mango', '600', 'img/mango.jpg', 'pirce for dozones of mangoes'),
(11, 'methi', '20', 'img/methi.jpg', 'price for bunch of methi'),
(12, 'orange', '100', 'img/orange.jpg', 'price per dozones of oranges'),
(13, 'papaya', '80', 'img/papaya.jpg', 'price of 2 papaya'),
(14, 'raddish', '10', 'img/raddish.jpg', 'price per kg'),
(15, 'redChilly', '50', 'img/redChilly.jpg', 'price per kg'),
(16, 'strawberries', '80', 'img/strawberries.jpg', 'price per kg'),
(17, 'watermelon', '50', 'img/watermelon.jpg', 'price of one watermelon'),
(18, 'coriander', '20', 'img/coriander.jpg', 'price per bunch of coriander'),
(19, 'springonion', '20', 'img/springonion.jpg', 'price per bunch of coriander');

-- --------------------------------------------------------

--
-- Table structure for table `users`
--

CREATE TABLE IF NOT EXISTS `users` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `username` varchar(211) NOT NULL,
  `password` varchar(255) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=16 ;

--
-- Dumping data for table `users`
--

INSERT INTO `users` (`id`, `username`, `password`) VALUES
(1, 'arvind', ''),
(2, 'john', ''),
(3, 'ram', ''),
(4, 'sham', ''),
(5, 'victor', ''),
(6, 'laxmn', ''),
(7, 'dravid', ''),
(8, 'sachin', ''),
(9, 'vishal', ''),
(10, 'sita', ''),
(11, 'geeta', ''),
(12, 'rita', ''),
(13, 'alice', ''),
(14, 'gorge', ''),
(15, 'rohan', '');

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
