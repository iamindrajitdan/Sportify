-- phpMyAdmin SQL Dump
-- version 5.2.0
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Sep 02, 2023 at 03:24 PM
-- Server version: 10.4.27-MariaDB
-- PHP Version: 8.2.0

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `sportify`
--

-- --------------------------------------------------------

--
-- Table structure for table `banners`
--

CREATE TABLE `banners` (
  `banner_id` int(11) NOT NULL,
  `img` varchar(500) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `banners`
--

INSERT INTO `banners` (`banner_id`, `img`) VALUES
(1, 'a.jpg'),
(2, 'c111.jpg'),
(3, 'a1.jpg'),
(4, 'c7.jpg'),
(5, 'c4.jpg'),
(6, 'c2.jpg'),
(7, 'a3.jpg'),
(8, 'c3.jpg'),
(9, 'c5.jpg'),
(10, 'c6.jpg'),
(11, 'c8.jpg');

-- --------------------------------------------------------

--
-- Table structure for table `brands`
--

CREATE TABLE `brands` (
  `brand_id` int(11) NOT NULL,
  `brand_title` varchar(50) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `brands`
--

INSERT INTO `brands` (`brand_id`, `brand_title`) VALUES
(1, 'Puma'),
(2, 'Adidas'),
(3, 'New Balance'),
(5, 'Nike');

-- --------------------------------------------------------

--
-- Table structure for table `cart`
--

CREATE TABLE `cart` (
  `product_id` int(11) NOT NULL,
  `ip` varchar(255) NOT NULL,
  `quantity` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

-- --------------------------------------------------------

--
-- Table structure for table `categories`
--

CREATE TABLE `categories` (
  `category_id` int(11) NOT NULL,
  `category_title` varchar(50) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `categories`
--

INSERT INTO `categories` (`category_id`, `category_title`) VALUES
(3, 'Boots(FG)'),
(1, 'Club Jersey'),
(2, 'National Jersey');

-- --------------------------------------------------------

--
-- Table structure for table `products`
--

CREATE TABLE `products` (
  `product_id` int(11) NOT NULL,
  `product_title` varchar(100) NOT NULL,
  `product_description` varchar(200) NOT NULL,
  `product_keywords` varchar(200) NOT NULL,
  `category_id` int(11) NOT NULL,
  `brand_id` int(11) NOT NULL,
  `img` varchar(500) NOT NULL,
  `product_priceog` varchar(100) NOT NULL,
  `product_price` varchar(100) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `products`
--

INSERT INTO `products` (`product_id`, `product_title`, `product_description`, `product_keywords`, `category_id`, `brand_id`, `img`, `product_priceog`, `product_price`) VALUES
(5, 'PREDATOR FREAK + FG', 'BOSS GAMES ON FIRM GROUND IN THESE LACELESS, MID-CUT CLEATS.', 'Boots FG predator freak adidas', 3, 2, 'item1.jpg', '17999.00', '11200.00'),
(6, 'COPA SENSE+ FG', 'TUNE INTO THE BEAUTIFUL GAME IN LACELESS BOOTS WITH A SILKY TOUCH.', 'Boots FG copa sense adidas', 3, 2, 'item2.jpg', '19999.00', '14999.00'),
(7, 'X SPEEDPORTAL+ FG', 'LEAVE YOUR LIMITS BEHIND IN LACELESS BOOTS MADE IN PART WITH RECYCLED MATERIALS.', 'Boots FG x speedportal adidas', 3, 2, 'item3.webp', '17999.00', '14999.00'),
(8, 'Nike Mercurial Vapor 14 Elite FG ', 'TRULY UNIQUE FIT WITH AN OUTSTANDING TOUCH ON THE BALL.', 'Boots FG Nike Mercurial Vapor 14 Elite', 3, 5, 'item4.jpg', '24999.00', '17499.00'),
(9, 'JUVENTUS 22/23 AWAY JERSEY', 'A JUVENTUS FOOTBALL JERSEY MADE WITH RECYCLED MATERIALS.', 'Club Jersey JUVENTUS 22/23 AWAY JERSEY', 1, 2, '5f4939f70f3d496798eeadd000f919b8_9366.webp', '2299.00', '1199.00'),
(10, 'REAL MADRID 22/23 AWAY JERSEY', 'A COMFORTABLE REAL MADRID AWAY JERSEY MADE WITH RECYCLED MATERIALS.', 'Club Jersey REAL MADRID 22/23 AWAY JERSEY', 1, 2, 'Real_Madrid_22-23_Away_Jersey_Purple_HA2660_01_laydown.jpg', '2299.00', '1499'),
(11, 'MANCHESTER UNITED 22/23 HOME JERSEY', 'A COMFORTABLE SUPPORTER JERSEY MADE WITH RECYCLED MATERIALS.', 'Club Jersey MANCHESTER UNITED 22/23 HOME JERSEY', 1, 2, 'edc50f58129041be80b2ae29011a3119_9366.webp', '2299.00', '1199.00'),
(12, 'BRAZIL 22/23 HOME JERSEY', 'A COMFORTABLE SUPPORTER JERSEY MADE WITH RECYCLED MATERIALS.', 'National Jersey BRAZIL 22/23 HOME JERSEY', 2, 5, 'Brazil-Home-2022-Worldcup-Football-Jersey-scaled-scaled.webp', '2299.00', '1499.00'),
(13, 'Paris Saint-Germain 2022/23 Match Fourth', 'Men\'s Jordan Dri-FIT ADV Football Shirt ', 'Club Jersey Paris Saint-Germain 2022/23 Match Fourth', 1, 5, 'psg.webp', '2499.00', '1499.00'),
(14, 'Liverpool F.C. 2022/23 Match Home', 'Men\'s Jordan Dri-FIT ADV Football Shirt ', 'Club Jersey Liverpool F.C. 2022/23 Match Home', 1, 5, 'liv.webp', '2499.00', '1499.00'),
(15, 'ITALY 23 AWAY JERSEY', 'A FAN-FOCUSED ITALY JERSEY MADE WITH PARLEY OCEAN PLASTIC.', 'National Jersey ITALY 23 AWAY JERSEY', 2, 2, 'italy.webp', '2299.00', '1499.00'),
(16, 'NEW BALANCE FURON V7 PRO EZE FG', 'TRULY UNIQUE FIT AND LIGHT WEIGHT WITH AN OUTSTANDING SUPPORT AND CONTROL.', 'Boots FG NEW BALANCE FURON V7 PRO EZE', 3, 3, 'NBF.webp', '24999.00', '14999.00');

-- --------------------------------------------------------

--
-- Table structure for table `users`
--

CREATE TABLE `users` (
  `firstname` varchar(100) NOT NULL,
  `lastname` varchar(100) NOT NULL,
  `email` varchar(30) NOT NULL,
  `password` varchar(255) NOT NULL,
  `address` varchar(500) NOT NULL,
  `city` text NOT NULL,
  `st` text NOT NULL,
  `zip` int(6) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `users`
--

INSERT INTO `users` (`firstname`, `lastname`, `email`, `password`, `address`, `city`, `st`, `zip`) VALUES
('Indrajit', 'Dan', 'iamindrajitdan@gmail.com', '$2y$10$ffRjgVT6eJp4JXG7nFrJxe5qd4EHaDhyuUUKCIv2AAlJhDNaaf6MC', 'DVC/DTPS , 3RD UNIT COLONY , HT/H8', 'Durgapur', 'West Bengal', 713207);

--
-- Indexes for dumped tables
--

--
-- Indexes for table `banners`
--
ALTER TABLE `banners`
  ADD PRIMARY KEY (`banner_id`);

--
-- Indexes for table `brands`
--
ALTER TABLE `brands`
  ADD PRIMARY KEY (`brand_id`);

--
-- Indexes for table `cart`
--
ALTER TABLE `cart`
  ADD PRIMARY KEY (`product_id`,`ip`);

--
-- Indexes for table `categories`
--
ALTER TABLE `categories`
  ADD PRIMARY KEY (`category_id`),
  ADD UNIQUE KEY `category_title` (`category_title`);

--
-- Indexes for table `products`
--
ALTER TABLE `products`
  ADD PRIMARY KEY (`product_id`),
  ADD UNIQUE KEY `product_id_2` (`product_id`),
  ADD KEY `product_id` (`product_id`);

--
-- Indexes for table `users`
--
ALTER TABLE `users`
  ADD PRIMARY KEY (`email`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `banners`
--
ALTER TABLE `banners`
  MODIFY `banner_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=12;

--
-- AUTO_INCREMENT for table `brands`
--
ALTER TABLE `brands`
  MODIFY `brand_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;

--
-- AUTO_INCREMENT for table `categories`
--
ALTER TABLE `categories`
  MODIFY `category_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=7;

--
-- AUTO_INCREMENT for table `products`
--
ALTER TABLE `products`
  MODIFY `product_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=17;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
