-- phpMyAdmin SQL Dump
-- version 4.5.1
-- http://www.phpmyadmin.net
--
-- Host: 127.0.0.1
-- Generation Time: Dec 04, 2016 at 02:03 AM
-- Server version: 10.1.16-MariaDB
-- PHP Version: 5.6.24

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `a2combined`
--

-- --------------------------------------------------------

--
-- Table structure for table `supplies`
--

DROP TABLE IF EXISTS `supplies`;
CREATE TABLE `supplies` (
  `id` int(11) NOT NULL,
  `name` varchar(256) NOT NULL,
  `description` varchar(256) NOT NULL,
  `receiving_unit` varchar(256) NOT NULL,
  `receiving_cost` decimal(10,2) NOT NULL,
  `stock_unit` varchar(256) NOT NULL,
  `quantities_on_hand` int(11) NOT NULL
) ENGINE=MyISAM DEFAULT CHARSET=utf8;

--
-- Dumping data for table `supplies`
--

INSERT INTO `supplies` (`id`, `name`, `description`, `receiving_unit`, `receiving_cost`, `stock_unit`, `quantities_on_hand`) VALUES
(1, 'pickels', 'Dairy Farms Pickels', 'Case of 10 jars', '50.00', 'Jars of 100 pickels', 120),
(2, 'ketchup', 'Dairy Farms Ketchup', 'Case of 15 boxes', '20.00', 'Boxes of 100 packets of ketchup', 180),
(3, 'tomato', 'Bens tomatos', 'Case of 10 boxes', '40.00', 'Boxes of 250 tomato slices', 50),
(4, 'Mustard', 'Franks Amazing Mustard', 'Case of 10 boxes', '45.00', 'Boxes of 150 packets of mustard', 40),
(5, 'Onions', 'Dairy Farms Onions', 'Bag of 80 Onions', '130.00', '80 Onions', 20),
(6, 'buns', 'Super secret special buns', 'Cases of 20 boxes', '120.00', 'Boxes of 100 buns', 250),
(7, 'meat patty', 'Bobs Farms Patties', 'Cases of 25 boxes', '450.00', 'boxes of 90 patties', 250),
(8, 'Mac Sauce', 'super top secret recipe', 'Cases of 10 boxes', '150.00', 'boxes of 30 packets', 4),
(9, 'fish patty', 'Bobs Farms Patties', 'Cases of 15 boxes', '400.00', 'boxes of 110 fish patties', 250),
(10, 'fries', 'Bobs Farms Patties', 'Cases of 30 boxes', '250.00', 'boxes of 500 fries', 300),
(11, 'soft drink', 'gulp gulp fun times', 'Cases of 40 boxes', '450.00', 'boxes of 110 bottles', 30);

--
-- Indexes for dumped tables
--

--
-- Indexes for table `supplies`
--
ALTER TABLE `supplies`
  ADD PRIMARY KEY (`id`);

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
