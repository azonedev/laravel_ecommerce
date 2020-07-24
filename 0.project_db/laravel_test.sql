-- phpMyAdmin SQL Dump
-- version 4.9.2
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Jul 24, 2020 at 10:02 PM
-- Server version: 10.4.10-MariaDB
-- PHP Version: 7.3.12

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET AUTOCOMMIT = 0;
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `laravel_test`
--

-- --------------------------------------------------------

--
-- Table structure for table `category`
--

CREATE TABLE `category` (
  `id` int(11) NOT NULL,
  `cat_name` varchar(255) DEFAULT NULL,
  `cat_code` int(11) DEFAULT NULL,
  `user_id` int(11) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `category`
--

INSERT INTO `category` (`id`, `cat_name`, `cat_code`, `user_id`) VALUES
(2, 'MEN', 2, 1),
(7, 'WOMEN', 7, 1),
(8, 'ExcoExperience', 1, 1),
(9, 'Light', 90, 1),
(10, 'BAGS', 115, 1);

-- --------------------------------------------------------

--
-- Table structure for table `feature_slider`
--

CREATE TABLE `feature_slider` (
  `id` int(11) NOT NULL,
  `title` varchar(255) DEFAULT NULL,
  `feature_slider` varchar(255) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `feature_slider`
--

INSERT INTO `feature_slider` (`id`, `title`, `feature_slider`) VALUES
(4, 'Popular', 'slider-image/1593091142.jpg'),
(5, 'Pro Pack', 'slider-image/1593091400.jpg'),
(6, 'Delta Offer', 'slider-image/1593092234.jpg'),
(7, 'New collection', 'slider-image/1593092307.jpg'),
(8, 'Cyclone Offer', 'slider-image/1593092590.jpg');

-- --------------------------------------------------------

--
-- Table structure for table `ledger`
--

CREATE TABLE `ledger` (
  `id` int(11) NOT NULL,
  `description` text DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `ledger`
--

INSERT INTO `ledger` (`id`, `description`) VALUES
(1, 'Money Bag 42 359188 528  1 528 150 428 1'),
(2, 'Money Bag 42 681441 528  1 528 150 428 1'),
(3, 'Money Bag 42 369947 528  1 528 150 428 1');

-- --------------------------------------------------------

--
-- Table structure for table `orders`
--

CREATE TABLE `orders` (
  `id` int(11) NOT NULL,
  `user_id` int(11) DEFAULT NULL,
  `debit` int(11) DEFAULT NULL,
  `credit` int(11) DEFAULT NULL,
  `balance` int(11) DEFAULT NULL,
  `order_date` timestamp NOT NULL DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `orders`
--

INSERT INTO `orders` (`id`, `user_id`, `debit`, `credit`, `balance`, `order_date`) VALUES
(1, 1, 428, 500, 500, '2020-07-24 04:09:44'),
(2, 1, 428, 500, 500, '2020-07-24 04:13:23'),
(3, 1, 428, 500, 500, '2020-07-24 04:14:17'),
(4, 1, 428, 500, 500, '2020-07-24 04:20:30'),
(5, 1, 428, 500, 500, '2020-07-24 04:21:07'),
(6, 1, 428, 500, 500, '2020-07-24 04:21:19'),
(7, 1, 428, 500, 500, '2020-07-24 04:22:13'),
(8, 1, 428, 500, 500, '2020-07-24 04:22:39');

-- --------------------------------------------------------

--
-- Table structure for table `order_track`
--

CREATE TABLE `order_track` (
  `id` int(11) NOT NULL,
  `order_id` int(11) DEFAULT NULL,
  `order_state` varchar(255) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `order_track`
--

INSERT INTO `order_track` (`id`, `order_id`, `order_state`) VALUES
(1, 148823, 'queue'),
(2, 319100, 'queue'),
(3, 179591, 'queue'),
(4, 943799, 'queue'),
(5, 888684, 'queue'),
(6, 984838, 'queue'),
(7, 646022, 'queue'),
(8, 487123, 'queue'),
(9, 578340, 'queue'),
(10, 760957, 'queue'),
(11, 310698, 'queue'),
(12, 298266, 'queue'),
(13, 229230, 'queue'),
(14, 625741, 'queue'),
(15, 337672, 'queue'),
(16, 226366, 'queue'),
(17, 439615, 'queue'),
(18, 439949, 'queue'),
(19, 658562, 'queue'),
(20, 421280, 'queue'),
(21, 551459, 'queue'),
(22, 673794, 'queue'),
(23, 625630, 'queue'),
(24, 188478, 'queue'),
(25, 901267, 'queue'),
(26, 719584, 'queue'),
(27, 504158, 'queue'),
(28, 113870, 'queue'),
(29, 968711, 'queue'),
(30, 587880, 'queue'),
(31, 392725, 'queue'),
(32, 525, 'Hello'),
(33, 681441, 'queue'),
(34, 369947, 'queue');

-- --------------------------------------------------------

--
-- Table structure for table `ordperplace`
--

CREATE TABLE `ordperplace` (
  `id` int(11) NOT NULL,
  `product_id` int(11) NOT NULL,
  `order_id` varchar(300) NOT NULL,
  `product_title` varchar(300) NOT NULL,
  `price` decimal(10,0) NOT NULL DEFAULT 0,
  `quantity` int(11) NOT NULL DEFAULT 0,
  `subtotal` decimal(10,0) NOT NULL DEFAULT 0,
  `discount` decimal(10,0) NOT NULL DEFAULT 0,
  `grantotal` decimal(10,0) NOT NULL DEFAULT 0,
  `customer_id` int(11) NOT NULL DEFAULT 0,
  `status` int(11) NOT NULL DEFAULT 0,
  `order_date` timestamp NOT NULL DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `ordperplace`
--

INSERT INTO `ordperplace` (`id`, `product_id`, `order_id`, `product_title`, `price`, `quantity`, `subtotal`, `discount`, `grantotal`, `customer_id`, `status`, `order_date`) VALUES
(11, 17, '1586802417', 'AMD Ryzen 3 1300X Gaming PC', '30000', 1, '30000', '500', '30000', 3, 0, '2020-04-16 11:07:16'),
(12, 16, '1586802417', 'AMD Ryzen 3 1300X Gaming PC', '30000', 1, '60000', '500', '60000', 3, 0, '2020-04-16 11:07:16'),
(13, 17, '1586803069', 'AMD Ryzen 3 1300X Gaming PC', '30000', 1, '30000', '0', '30000', 3, 0, '2020-04-16 11:07:16'),
(48, 42, '584451', 'Money Bag', '528', 1, '528', '150', '428', 1, 0, '2020-07-24 03:03:45'),
(49, 42, '587880', 'Money Bag', '528', 1, '528', '150', '428', 1, 0, '2020-07-24 03:06:23'),
(50, 42, '822324', 'Money Bag', '528', 1, '528', '150', '428', 1, 0, '2020-07-24 03:08:42'),
(51, 42, '392725', 'Money Bag', '528', 1, '528', '150', '428', 1, 0, '2020-07-24 03:09:00'),
(52, 42, '557330', 'Money Bag', '528', 1, '528', '150', '428', 1, 0, '2020-07-24 03:09:45'),
(53, 42, '852320', 'Money Bag', '528', 1, '528', '150', '428', 1, 0, '2020-07-24 03:13:56'),
(54, 42, '681441', 'Money Bag', '528', 1, '528', '150', '428', 1, 0, '2020-07-24 04:22:13'),
(55, 42, '369947', 'Money Bag', '528', 1, '528', '150', '428', 1, 0, '2020-07-24 04:22:39');

-- --------------------------------------------------------

--
-- Table structure for table `product`
--

CREATE TABLE `product` (
  `id` int(11) NOT NULL,
  `title` varchar(300) NOT NULL,
  `buy_price` decimal(10,0) NOT NULL,
  `regular_price` decimal(10,0) NOT NULL,
  `flate_price` decimal(10,0) DEFAULT 0,
  `rating` int(11) NOT NULL DEFAULT 0,
  `shortdes` text NOT NULL,
  `cat_id` int(11) NOT NULL DEFAULT 0,
  `tag` varchar(600) NOT NULL DEFAULT '0',
  `quantity` int(11) DEFAULT 0,
  `sales_qty` int(11) NOT NULL DEFAULT 0,
  `stock_qty` int(11) NOT NULL DEFAULT 0,
  `product_info` longtext NOT NULL,
  `feature_image` varchar(300) NOT NULL DEFAULT '0',
  `user_id` int(11) NOT NULL DEFAULT 0,
  `status` int(11) NOT NULL DEFAULT 0,
  `section` int(11) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `product`
--

INSERT INTO `product` (`id`, `title`, `buy_price`, `regular_price`, `flate_price`, `rating`, `shortdes`, `cat_id`, `tag`, `quantity`, `sales_qty`, `stock_qty`, `product_info`, `feature_image`, `user_id`, `status`, `section`) VALUES
(36, 'Bag Twing', '700', '900', '20', 0, 'Lorem ipsum dolor sit amet, consectetur adipisicing elit. Eius, accusantium.', 7, 'bag', 0, 0, 0, 'dolor sit amet, consectetur adipisicing elit. Eius, accusantium.oduct info here..', 'product-image/15930971180.jpg', 0, 0, 1),
(37, 'Watch', '300', '400', '30', 0, 'Lorem ipsum dolor sit amet, consectetur adipisicing elit. Eius, accusantium.', 2, 'watch,twice', 0, 0, 0, 'met, consectetur adipisicing elit. Eius, accusantium.', 'product-image/15930971860.jpg', 0, 0, 1),
(38, 'Shoo large', '3540', '4000', '15', 0, 'Lorem ipsum dolor sit amet, consectetur adipisicing elit. Eius, accusantium.', 7, 'large, shoose', 0, 0, 0, 'cing elit. Eius, accusantium.', 'product-image/15930972650.jpg', 0, 0, 1),
(39, 'shoes pro', '900', '1200', '35', 0, 'Lorem ipsum dolor sit amet, consectetur adipisicing elit. Eius, accusantium.', 2, 'shoes,shoes japanies', 0, 0, 0, 'tur adipisicing elit. Eius, accusantium.', 'product-image/15930973950.jpg', 0, 0, 1),
(40, 'Bag Uba', '702', '800', '25', 0, 'Lorem ipsum dolor sit amet, consectetur adipisicing elit. Eius, accusantium.', 2, 'bag,jarman,technology', 0, 0, 0, 'sectetur adipisicing elit. Eius, accusantium.', 'product-image/15930975130.jpg', 0, 0, 2),
(41, 'shoes', '850', '820', '35', 0, 'Lorem ipsum dolor sit amet, consectetur adipisicing elit. Eius, accusantium.', 2, 'shoes', 0, 0, 0, 'adipisicing elit. Eius, accusantium.', 'product-image/15930975950.jpg', 0, 0, 2),
(42, 'Money Bag', '800', '1100', '34', 0, 'Lorem ipsum dolor sit amet, consectetur adipisicing elit. Eius, accusantium.', 2, 'tags,bag', 0, 0, 0, 'met, consectetur adipisicing elit. Eius, accusantium.', 'product-image/15930978510.jpg', 0, 0, 2),
(43, 'Watch', '250', '350', '17', 0, 'Lorem ipsum dolor sit amet, consectetur adipisicing elit. Eius, accusantium.', 2, 'watch,jarman', 0, 0, 0, 'adipisicing elit. Eius, accusantium.', 'product-image/15930979700.jpg', 0, 0, 2),
(44, 'Belt', '350', '4720', '10', 0, 'Lorem ipsum dolor sit amet, consectetur adipisicing elit. Eius, accusantium.', 2, 'belts', 0, 0, 0, 'Lorem ipsum dolor sit amet, consectetur adipisicing elit. Eius, accusantium.', 'product-image/15931036270.jpg', 0, 0, 3),
(45, 'Watch gold', '1500', '1700', '12', 0, 'Lorem ipsum dolor sit amet, consectetur adipisicing elit. Eius, accusantium.', 2, 'watch,gold', 0, 0, 0, 'Lorem ipsum dolor sit amet, consectetur adipisicing elit. Eius, accusantium.', 'product-image/15931037360.jpg', 0, 0, 3),
(46, 'Black ladies Bag', '470', '520', '12', 0, 'Lorem ipsum dolor sit amet, consectetur adipisicing elit. Eius, accusantium.', 2, 'black,ladies,bag', 0, 0, 0, 'Lorem ipsum dolor sit amet, consectetur adipisicing elit. Eius, accusantium.', 'product-image/15931038940.jpg', 0, 0, 3),
(47, 'Light blue ware shoes', '8000', '9000', '20', 0, 'Lorem ipsum dolor sit amet, consectetur adipisicing elit. Eius, accusantium.', 2, 'light,blue,ware,shoes', 0, 0, 0, 'Lorem ipsum dolor sit amet, consectetur adipisicing elit. Eius, accusantium.', 'product-image/15931040780.jpg', 0, 0, 3),
(48, 'Watch gold', '1500', '1700', '12', 0, 'Lorem ipsum dolor sit amet, consectetur adipisicing elit. Eius, accusantium.', 2, 'watch,gold', 0, 0, 0, 'Lorem ipsum dolor sit amet, consectetur adipisicing elit. Eius, accusantium.', 'product-image/15931037360.jpg', 0, 0, 3),
(49, 'Bag Twing', '700', '900', '20', 0, 'Lorem ipsum dolor sit amet, consectetur adipisicing elit. Eius, accusantium.', 7, 'bag', 0, 0, 0, 'dolor sit amet, consectetur adipisicing elit. Eius, accusantium.oduct info here..', 'product-image/15930971180.jpg', 0, 0, 4),
(50, 'Belt', '350', '4720', '10', 0, 'Lorem ipsum dolor sit amet, consectetur adipisicing elit. Eius, accusantium.', 2, 'belts', 0, 0, 0, 'Lorem ipsum dolor sit amet, consectetur adipisicing elit. Eius, accusantium.', 'product-image/15931036270.jpg', 0, 0, 4),
(51, 'Shoo large', '3540', '4000', '15', 0, 'Lorem ipsum dolor sit amet, consectetur adipisicing elit. Eius, accusantium.', 7, 'large, shoose', 0, 0, 0, 'cing elit. Eius, accusantium.', 'product-image/15930972650.jpg', 0, 0, 4),
(52, 'Money Bag', '800', '1100', '34', 0, 'Lorem ipsum dolor sit amet, consectetur adipisicing elit. Eius, accusantium.', 2, 'tags,bag', 0, 0, 0, 'met, consectetur adipisicing elit. Eius, accusantium.', 'product-image/15930978510.jpg', 0, 0, 4);

-- --------------------------------------------------------

--
-- Table structure for table `product_image`
--

CREATE TABLE `product_image` (
  `id` int(11) NOT NULL,
  `image_url` varchar(300) NOT NULL,
  `product_id` int(11) NOT NULL,
  `status` int(11) NOT NULL DEFAULT 0
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `product_image`
--

INSERT INTO `product_image` (`id`, `image_url`, `product_id`, `status`) VALUES
(22, 'product-image/15930098110.jpg', 33, 0),
(23, 'product-image/15930098111.jpg', 33, 0),
(24, 'product-image/15930098112.jpg', 33, 0),
(25, 'product-image/15930098380.jpg', 34, 0),
(26, 'product-image/15930098391.jpg', 34, 0),
(27, 'product-image/15930098392.jpg', 34, 0),
(28, 'product-image/15930954310.jpg', 35, 0),
(29, 'product-image/15930971180.jpg', 36, 0),
(30, 'product-image/15930971860.jpg', 37, 0),
(31, 'product-image/15930972650.jpg', 38, 0),
(32, 'product-image/15930973950.jpg', 39, 0),
(33, 'product-image/15930975130.jpg', 40, 0),
(34, 'product-image/15930975950.jpg', 41, 0),
(35, 'product-image/15930978510.jpg', 42, 0),
(36, 'product-image/15930979700.jpg', 43, 0),
(37, 'product-image/15931036270.jpg', 44, 0),
(38, 'product-image/15931037360.jpg', 45, 0),
(39, 'product-image/15931038940.jpg', 46, 0),
(40, 'product-image/15931040780.jpg', 47, 0);

-- --------------------------------------------------------

--
-- Table structure for table `role`
--

CREATE TABLE `role` (
  `id` int(11) NOT NULL,
  `role` varchar(255) DEFAULT NULL,
  `status_code` int(11) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `role`
--

INSERT INTO `role` (`id`, `role`, `status_code`) VALUES
(3, 'Modarator', 8),
(7, 'admin', 6),
(10, 'udate', 5);

-- --------------------------------------------------------

--
-- Table structure for table `slider`
--

CREATE TABLE `slider` (
  `id` int(11) NOT NULL,
  `title` varchar(255) DEFAULT NULL,
  `subtitle` varchar(255) DEFAULT NULL,
  `feature_image` varchar(255) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `slider`
--

INSERT INTO `slider` (`id`, `title`, `subtitle`, `feature_image`) VALUES
(5, 'Add new collection', 'Up to 30 % DISCOUNT', 'slider-image/1593090503.jpg'),
(7, 'hot deal', 'Up to 70% DISCOUNT', 'slider-image/1593090554.jpg');

-- --------------------------------------------------------

--
-- Table structure for table `users`
--

CREATE TABLE `users` (
  `id` int(11) NOT NULL,
  `username` varchar(255) DEFAULT NULL,
  `email` varchar(255) DEFAULT NULL,
  `password` varchar(255) DEFAULT NULL,
  `photo_url` varchar(255) DEFAULT 'public/image/avater.png',
  `first_name` varchar(255) DEFAULT NULL,
  `last_name` varchar(255) DEFAULT NULL,
  `shipping_email` varchar(255) DEFAULT NULL,
  `address` varchar(255) DEFAULT NULL,
  `city` varchar(255) DEFAULT NULL,
  `country` varchar(255) DEFAULT NULL,
  `zip_code` int(11) DEFAULT NULL,
  `phone` decimal(10,0) DEFAULT NULL,
  `order_id` varchar(6) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `users`
--

INSERT INTO `users` (`id`, `username`, `email`, `password`, `photo_url`, `first_name`, `last_name`, `shipping_email`, `address`, `city`, `country`, `zip_code`, `phone`, `order_id`) VALUES
(1, 'abdullah', 'abdullah@gmail.com', '1234', 'public/image/1670005842006154.jpg', 'Abdullah', 'Al Noman', 'noman@mail.com', 'Helllo Road', 'City star', 'Pantdio', 7848, '1724546975', '369947');

-- --------------------------------------------------------

--
-- Table structure for table `voucer`
--

CREATE TABLE `voucer` (
  `id` int(11) NOT NULL,
  `name` varchar(300) NOT NULL,
  `discount` decimal(10,0) NOT NULL,
  `status` int(11) NOT NULL DEFAULT 0
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `voucer`
--

INSERT INTO `voucer` (`id`, `name`, `discount`, `status`) VALUES
(2, 'marathon', '500', 0),
(3, 'SHOPMAMA', '500', 0),
(4, 'stayhome', '150', 0),
(5, 'covid19', '600', 0),
(7, 'cyclone', '132', 0);

--
-- Indexes for dumped tables
--

--
-- Indexes for table `category`
--
ALTER TABLE `category`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `feature_slider`
--
ALTER TABLE `feature_slider`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `ledger`
--
ALTER TABLE `ledger`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `orders`
--
ALTER TABLE `orders`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `order_track`
--
ALTER TABLE `order_track`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `ordperplace`
--
ALTER TABLE `ordperplace`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `product`
--
ALTER TABLE `product`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `product_image`
--
ALTER TABLE `product_image`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `role`
--
ALTER TABLE `role`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `slider`
--
ALTER TABLE `slider`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `users`
--
ALTER TABLE `users`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `voucer`
--
ALTER TABLE `voucer`
  ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `category`
--
ALTER TABLE `category`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=11;

--
-- AUTO_INCREMENT for table `feature_slider`
--
ALTER TABLE `feature_slider`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=9;

--
-- AUTO_INCREMENT for table `ledger`
--
ALTER TABLE `ledger`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT for table `orders`
--
ALTER TABLE `orders`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=9;

--
-- AUTO_INCREMENT for table `order_track`
--
ALTER TABLE `order_track`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=35;

--
-- AUTO_INCREMENT for table `ordperplace`
--
ALTER TABLE `ordperplace`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=56;

--
-- AUTO_INCREMENT for table `product`
--
ALTER TABLE `product`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=53;

--
-- AUTO_INCREMENT for table `product_image`
--
ALTER TABLE `product_image`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=41;

--
-- AUTO_INCREMENT for table `role`
--
ALTER TABLE `role`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=11;

--
-- AUTO_INCREMENT for table `slider`
--
ALTER TABLE `slider`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=9;

--
-- AUTO_INCREMENT for table `users`
--
ALTER TABLE `users`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=14;

--
-- AUTO_INCREMENT for table `voucer`
--
ALTER TABLE `voucer`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=8;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
