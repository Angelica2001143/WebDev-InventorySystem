-- phpMyAdmin SQL Dump
-- version 4.9.2
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: May 29, 2021 at 03:45 PM
-- Server version: 10.4.10-MariaDB
-- PHP Version: 7.1.33

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET AUTOCOMMIT = 0;
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `inventory_project`
--

-- --------------------------------------------------------

--
-- Table structure for table `archive`
--

CREATE TABLE `archive` (
  `id` int(50) NOT NULL,
  `name` varchar(255) NOT NULL,
  `bought` int(50) NOT NULL,
  `sold` int(50) NOT NULL,
  `image` varchar(255) NOT NULL,
  `created_at` datetime(6) DEFAULT NULL,
  `updated_at` datetime(6) NOT NULL DEFAULT current_timestamp(6)
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Table structure for table `customers_info`
--

CREATE TABLE `customers_info` (
  `id` int(11) NOT NULL,
  `name` varchar(100) NOT NULL,
  `type` varchar(20) NOT NULL DEFAULT 'new',
  `email` varchar(100) DEFAULT NULL,
  `current_orders` varchar(200) DEFAULT NULL,
  `shipping_address` varchar(300) NOT NULL,
  `avatar` varchar(100) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `customers_info`
--

INSERT INTO `customers_info` (`id`, `name`, `type`, `email`, `current_orders`, `shipping_address`, `avatar`) VALUES
(4, 'Christine Rubio', 'Regular', 'christine@gmail.com', '12 items', 'Nasipit Talamban', 'Customers/pro3.png'),
(5, 'Justine Ambrad', 'New', 'justine@gmail.com', '3 items', 'Talamban', 'Customers/capture.png'),
(6, 'Rubylyn Hernani', 'New', 'rubylyn@gmail.com', '4 items', 'Talamban', 'Customers/cute.png'),
(7, 'Jurick Baybayanon', 'New', 'jurick@gmail.com', '5 items', 'Talamaban', 'Customers/cutest.png'),
(8, 'Melchor Casipong\r\n', 'New', 'melchor@gmail.com', '7 items', 'Talamban', 'Customers/isogkakol.png'),
(9, 'Ericka Gwapa', 'Regular', 'ericka@gmail.com', '10 items', 'Medellin', 'Customers/ericka.png'),
(11, 'Angie', 'Regular', 'angie@gmail.com;', '12 items', 'Talamban', 'Customers/hmmm.jpg');

-- --------------------------------------------------------

--
-- Table structure for table `products`
--

CREATE TABLE `products` (
  `id` int(11) NOT NULL,
  `name` varchar(100) NOT NULL,
  `bought` int(11) NOT NULL DEFAULT 0,
  `sold` int(11) NOT NULL DEFAULT 0,
  `image` varchar(300) NOT NULL,
  `archive` int(11) NOT NULL,
  `created_at` datetime DEFAULT NULL,
  `updated_at` datetime NOT NULL DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `products`
--

INSERT INTO `products` (`id`, `name`, `bought`, `sold`, `image`, `archive`, `created_at`, `updated_at`) VALUES
(22, 'Hand Wash', 61, 20, 'Uploads/hand-removebg-preview.png', 0, '2021-03-30 13:34:45', '2021-03-30 13:34:45'),
(23, 'Milk Powder', 40, 5, 'Uploads/milk-removebg-preview.png', 1, '2021-03-30 13:35:07', '2021-03-30 13:35:07'),
(24, 'Soap Bar', 100, 20, 'Uploads/soap-removebg-preview.png', 0, '2021-03-30 13:38:01', '2021-03-30 13:38:01'),
(28, 'Tooth Paste', 80, 30, 'Uploads/toothpaste-removebg-preview.png', 0, '2021-03-30 15:16:45', '2021-03-30 15:16:45'),
(30, 'Sunscreen', 56, 11, 'Uploads/sun-removebg-preview.png', 0, '2021-03-31 01:32:14', '2021-03-31 01:32:14'),
(31, 'Green Tea', 50, 40, 'Uploads/green-removebg-preview.png', 0, '2021-03-31 01:43:42', '2021-04-08 11:43:42'),
(32, 'Glucose', 200, 40, 'Uploads/glucose-removebg-preview.png', 0, '2021-03-31 01:45:21', '2021-03-31 01:45:21'),
(33, 'Body Lotion', 58, 0, 'Uploads/body-removebg-preview.png', 1, '2021-04-04 23:08:38', '2021-04-04 23:08:38');

-- --------------------------------------------------------

--
-- Table structure for table `request`
--

CREATE TABLE `request` (
  `id` int(11) NOT NULL,
  `product_id` int(11) NOT NULL,
  `name` varchar(50) NOT NULL,
  `message` varchar(100) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `request`
--

INSERT INTO `request` (`id`, `product_id`, `name`, `message`) VALUES
(1, 22, 'Angelica Q. Manlapaz', 'Oi'),
(2, 30, 'Angelica Q. Manlapaz', 'hoy, unsa mani nga products ouy?'),
(3, 30, 'Angelica Q. Manlapaz', 'Hi po heheheh'),
(4, 23, 'Angelica Q. Manlapaz', 'Akong request kay unta makabarato mi ana. Suggest ko lang. Malapit na kasi ang pasko.'),
(5, 24, 'Angelica Q. Manlapaz', 'Hoy, bati ug picture imong product. Effective na?'),
(6, 22, 'Angelica Q. Manlapaz', 'Hello. Kanus a ni gigama?');

-- --------------------------------------------------------

--
-- Table structure for table `users`
--

CREATE TABLE `users` (
  `id` int(50) NOT NULL,
  `username` varchar(255) NOT NULL,
  `password` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `users`
--

INSERT INTO `users` (`id`, `username`, `password`) VALUES
(1, 'admin', 'admin123');

-- --------------------------------------------------------

--
-- Table structure for table `users_info`
--

CREATE TABLE `users_info` (
  `id` int(11) NOT NULL,
  `name` varchar(100) NOT NULL,
  `u_name` varchar(100) NOT NULL,
  `email` varchar(100) DEFAULT NULL,
  `password` varchar(100) NOT NULL,
  `is_active` tinyint(1) NOT NULL DEFAULT 1,
  `is_admin` tinyint(1) NOT NULL DEFAULT 0,
  `avatar` varchar(100) DEFAULT NULL,
  `last_login_time` timestamp NOT NULL DEFAULT current_timestamp() ON UPDATE current_timestamp(),
  `created_at` datetime NOT NULL DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `users_info`
--

INSERT INTO `users_info` (`id`, `name`, `u_name`, `email`, `password`, `is_active`, `is_admin`, `avatar`, `last_login_time`, `created_at`) VALUES
(34, 'Angelica Q. Manlapaz', 'angelica', 'angelica@gmail.com', '161ebd7d45089b3446ee4e0d86dbcf92', 1, 0, 'Users/angelica.jfif', '2021-05-29 13:35:23', '2021-05-25 16:00:29'),
(35, 'Daryll Vildosola', 'daryll', 'daryll@gmail.com', '161ebd7d45089b3446ee4e0d86dbcf92', 1, 1, 'Users/dscf2617.jpg', '2021-05-29 13:41:35', '2021-05-25 16:05:50'),
(36, 'Ean Jason Velayo', 'ean', 'eav@gmail.com', '161ebd7d45089b3446ee4e0d86dbcf92', 1, 0, 'Users/ean.jfif', '2021-05-29 13:41:12', '2021-05-25 17:48:15');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `archive`
--
ALTER TABLE `archive`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `customers_info`
--
ALTER TABLE `customers_info`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `products`
--
ALTER TABLE `products`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `request`
--
ALTER TABLE `request`
  ADD PRIMARY KEY (`id`),
  ADD KEY `product_request` (`product_id`);

--
-- Indexes for table `users`
--
ALTER TABLE `users`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `users_info`
--
ALTER TABLE `users_info`
  ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `archive`
--
ALTER TABLE `archive`
  MODIFY `id` int(50) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `customers_info`
--
ALTER TABLE `customers_info`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=12;

--
-- AUTO_INCREMENT for table `products`
--
ALTER TABLE `products`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=38;

--
-- AUTO_INCREMENT for table `request`
--
ALTER TABLE `request`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=7;

--
-- AUTO_INCREMENT for table `users`
--
ALTER TABLE `users`
  MODIFY `id` int(50) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT for table `users_info`
--
ALTER TABLE `users_info`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=37;

--
-- Constraints for dumped tables
--

--
-- Constraints for table `request`
--
ALTER TABLE `request`
  ADD CONSTRAINT `product_request` FOREIGN KEY (`product_id`) REFERENCES `products` (`id`) ON DELETE CASCADE ON UPDATE CASCADE;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
