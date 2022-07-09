-- phpMyAdmin SQL Dump
-- version 5.1.0
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Jul 10, 2021 at 08:20 AM
-- Server version: 10.4.18-MariaDB
-- PHP Version: 8.0.5

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `nepcraft`
--

-- --------------------------------------------------------

--
-- Table structure for table `available`
--

CREATE TABLE `available` (
  `available_id` int(5) NOT NULL,
  `available_status` varchar(20) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `available`
--

INSERT INTO `available` (`available_id`, `available_status`) VALUES
(1, 'Available'),
(2, 'Comming Soon'),
(3, 'Not Available');

-- --------------------------------------------------------

--
-- Table structure for table `cart`
--

CREATE TABLE `cart` (
  `cart_id` int(11) NOT NULL,
  `c_id` int(11) NOT NULL,
  `p_cart` int(11) NOT NULL,
  `qty` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `cart`
--

INSERT INTO `cart` (`cart_id`, `c_id`, `p_cart`, `qty`) VALUES
(77, 0, 16, 1),
(86, 0, 16, 1),
(87, 0, 0, 1),
(91, 0, 16, 1),
(97, 0, 19, 1),
(108, 1, 19, 1),
(128, 1, 23, 1);

-- --------------------------------------------------------

--
-- Table structure for table `category`
--

CREATE TABLE `category` (
  `cat_id` int(11) NOT NULL,
  `cat_name` varchar(50) DEFAULT NULL,
  `cat_stock` int(11) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `category`
--

INSERT INTO `category` (`cat_id`, `cat_name`, `cat_stock`) VALUES
(7, 'Dhaka', 0),
(8, 'Jewellery', 200),
(9, 'Handmade Paper', 0),
(10, 'Wood Craft', 0),
(11, 'Thangka', 0),
(12, 'Singing Bowls', 0),
(14, 'Glass Beads', 200),
(15, 'Hemp Products', 40),
(16, 'Statues ', 0),
(17, 'Khukuri', 1000);

-- --------------------------------------------------------

--
-- Table structure for table `customer`
--

CREATE TABLE `customer` (
  `c_id` int(11) NOT NULL,
  `c_name` varchar(100) NOT NULL,
  `c_email` varchar(100) NOT NULL,
  `shipping_address` varchar(200) NOT NULL,
  `c_dob` date NOT NULL,
  `c_gender` varchar(50) NOT NULL,
  `c_phone` varchar(30) NOT NULL,
  `c_address` text NOT NULL,
  `c_pass` varchar(100) NOT NULL,
  `token` text NOT NULL,
  `status` varchar(100) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `customer`
--

INSERT INTO `customer` (`c_id`, `c_name`, `c_email`, `shipping_address`, `c_dob`, `c_gender`, `c_phone`, `c_address`, `c_pass`, `token`, `status`) VALUES
(1, 'kiran', 'kiran@gmail.com', 'kathmandu', '2001-10-22', 'female', '9843242342', 'pokhara', '827ccb0eea8a706c4c34a16891f84e7b', '', ''),
(22, 'customer', 'customer@gmail.com', 'pokhara', '2021-05-04', 'female', '9843242342', 'pokhara', '827ccb0eea8a706c4c34a16891f84e7b', '', ''),
(25, 'mithu', 'mithubk42@gmail.com', 'jhapa', '2021-05-05', 'male', '9843242342', 'syangja', '827ccb0eea8a706c4c34a16891f84e7b', '8c294c0cdb2cf23487d08496cd571f', 'active'),
(28, 'kiran bk', 'kiran.bk@apexcollege.edu.np', 'nawalpur', '2021-05-05', 'female', '9843242342', 'kathmsnu', '827ccb0eea8a706c4c34a16891f84e7b', 'c0f40ccd1314e51828bf9fd44bd08b', 'active'),
(29, 'ganga sunar', 'gangasunar2052@gmail.com', 'nawalpur pragatinagar 10', '2021-06-10', 'male', '9843242342', 'nawalpur', '827ccb0eea8a706c4c34a16891f84e7b', 'ff2b8f62945deb5535022290d21de3', 'active'),
(30, 'kiran bishwo', 'mtkiranbishwo@gmail.com', 'midbaneshwor kathmandu', '2021-07-01', 'female', '9843242342', 'kathmandu', '827ccb0eea8a706c4c34a16891f84e7b', 'f3bdb93b264c8c574ef120a28f5172', 'active');

-- --------------------------------------------------------

--
-- Table structure for table `order_details`
--

CREATE TABLE `order_details` (
  `o_id` int(11) NOT NULL,
  `p_id` int(11) NOT NULL,
  `c_id` int(11) NOT NULL,
  `ordered_date` date NOT NULL,
  `ordered_time` time NOT NULL,
  `payment_status` varchar(22) NOT NULL,
  `order_status` varchar(50) NOT NULL,
  `new_price` int(11) NOT NULL,
  `qty` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `order_details`
--

INSERT INTO `order_details` (`o_id`, `p_id`, `c_id`, `ordered_date`, `ordered_time`, `payment_status`, `order_status`, `new_price`, `qty`) VALUES
(1, 15, 1, '2021-05-13', '18:05:00', 'cod', 'Delevered', 450, 1),
(4, 16, 11, '2021-05-13', '18:05:00', 'cod', 'Pending', 1164, 1),
(6, 13, 11, '2021-05-13', '18:05:00', 'cod', 'Delevered', 255, 1),
(7, 11, 11, '2021-05-13', '18:05:00', 'cod', 'Pending', 2100, 1),
(8, 11, 11, '2021-05-13', '18:05:00', 'cod', 'Delevered', 2100, 1),
(10, 15, 1, '2021-05-14', '14:05:00', 'cod', 'Delevered', 450, 1),
(11, 13, 1, '2021-05-14', '14:05:00', 'cod', 'Pending', 255, 1),
(12, 16, 1, '2021-05-14', '14:05:00', 'cod', 'Pending', 1164, 1),
(13, 19, 1, '2021-05-14', '14:05:00', 'cod', 'Pending', 90, 1),
(14, 16, 1, '2021-05-14', '16:05:00', 'cod', 'Delevered', 1164, 1),
(15, 16, 1, '2021-05-18', '13:05:00', 'cod', 'Pending', 1164, 1),
(16, 13, 1, '2021-05-18', '13:05:00', 'cod', 'Delevered', 255, 1),
(17, 16, 22, '2021-05-19', '21:05:00', 'cod', 'Pending', 1164, 1),
(19, 23, 22, '2021-05-20', '09:05:00', 'cod', 'Pending', 198, 1),
(39, 19, 28, '2021-06-30', '18:06:00', 'esewa', 'Delevered', 90, 2),
(40, 20, 29, '2021-06-30', '19:06:00', 'esewa', 'Pending', 90, 5),
(41, 19, 29, '2021-06-30', '19:06:00', 'cod', 'Pending', 90, 2),
(42, 16, 29, '2021-07-01', '13:07:00', 'esewa', 'Pending', 1164, 2),
(43, 11, 30, '2021-07-02', '20:07:00', 'esewa', 'Pending', 2100, 2);

-- --------------------------------------------------------

--
-- Table structure for table `product`
--

CREATE TABLE `product` (
  `p_id` int(11) NOT NULL,
  `p_name` varchar(50) NOT NULL,
  `p_photo` varchar(100) NOT NULL,
  `p_cat` int(5) NOT NULL,
  `p_disc` text NOT NULL,
  `p_price` int(20) NOT NULL,
  `p_discount` int(10) NOT NULL,
  `p_qty` int(11) NOT NULL,
  `p_status` int(5) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `product`
--

INSERT INTO `product` (`p_id`, `p_name`, `p_photo`, `p_cat`, `p_disc`, `p_price`, `p_discount`, `p_qty`, `p_status`) VALUES
(11, 'small khukuri', '1620658320-40851078aba47c2a4d49412cb1b93bca.jpg', 17, 'khukuri made by palpali', 3000, 30, 1000, 1),
(13, 'Kurta for baby', '1620658441-kurta.jpg', 15, 'small kurta for baby', 300, 15, 20, 2),
(15, 'ring', '1620658587-94e631310b6b0b6a449ed7913cfba080.jpg', 8, 'hand made rings', 500, 10, 200, 1),
(16, 'bag', '1620658721-0de12fa9bb55f59a2ab12ce782d99baf.jpg', 15, 'hand made bag for girls', 1200, 3, 12, 2),
(19, 'band', '1620919290-f0d13e3798d7b685ae07fdf73a131fc7.jpg', 14, 'made in nepal product', 100, 10, 100, 1),
(20, 'balas', '1620982899-a7b4133edd5a2f8a0a9b393a40b5505d.jpg', 14, 'product made in nepal', 100, 10, 100, 1),
(23, 'pasmina muffler scarf', '1621439557-125548406_1764669530360664_1616420139966038173_n.jpg', 15, 'pasmina muffler scarf for girls', 200, 1, 10, 1);

-- --------------------------------------------------------

--
-- Table structure for table `role`
--

CREATE TABLE `role` (
  `role_id` int(11) NOT NULL,
  `role_name` varchar(50) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `role`
--

INSERT INTO `role` (`role_id`, `role_name`) VALUES
(1, 'Admin'),
(2, 'Manager'),
(3, ' Delivery Person');

-- --------------------------------------------------------

--
-- Table structure for table `users`
--

CREATE TABLE `users` (
  `u_id` int(10) NOT NULL,
  `u_name` varchar(100) DEFAULT NULL,
  `u_role` int(10) DEFAULT NULL,
  `u_email` varchar(100) DEFAULT NULL,
  `u_pass` varchar(100) DEFAULT NULL,
  `u_address` text DEFAULT NULL,
  `u_phone` text DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `users`
--

INSERT INTO `users` (`u_id`, `u_name`, `u_role`, `u_email`, `u_pass`, `u_address`, `u_phone`) VALUES
(5, 'Kiran', 1, 'kiran@gmail.com', '827ccb0eea8a706c4c34a16891f84e7b', 'ktm syangja pokhara', '9825181136'),
(6, 'Akash ', 2, 'akash@gmail.com', '827ccb0eea8a706c4c34a16891f84e7b', 'sindhuli', '9832434234'),
(7, 'ashish', 3, 'ashish@gmail.com', '827ccb0eea8a706c4c34a16891f84e7b', 'pkr', '9845656565'),
(8, 'anjali', 3, 'anjali@gmail.com', '827ccb0eea8a706c4c34a16891f84e7b', 'kathmandu', '9845635363');

-- --------------------------------------------------------

--
-- Table structure for table `wishlist`
--

CREATE TABLE `wishlist` (
  `w_id` int(11) NOT NULL,
  `c_id` int(11) NOT NULL,
  `p_id` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `wishlist`
--

INSERT INTO `wishlist` (`w_id`, `c_id`, `p_id`) VALUES
(14, 11, 11),
(15, 11, 11),
(16, 11, 15),
(18, 1, 15),
(22, 0, 13),
(23, 1, 11),
(25, 1, 13),
(39, 22, 16),
(44, 22, 23),
(52, 29, 20);

--
-- Indexes for dumped tables
--

--
-- Indexes for table `available`
--
ALTER TABLE `available`
  ADD PRIMARY KEY (`available_id`);

--
-- Indexes for table `cart`
--
ALTER TABLE `cart`
  ADD PRIMARY KEY (`cart_id`);

--
-- Indexes for table `category`
--
ALTER TABLE `category`
  ADD PRIMARY KEY (`cat_id`);

--
-- Indexes for table `customer`
--
ALTER TABLE `customer`
  ADD PRIMARY KEY (`c_id`);

--
-- Indexes for table `order_details`
--
ALTER TABLE `order_details`
  ADD PRIMARY KEY (`o_id`);

--
-- Indexes for table `product`
--
ALTER TABLE `product`
  ADD PRIMARY KEY (`p_id`);

--
-- Indexes for table `role`
--
ALTER TABLE `role`
  ADD PRIMARY KEY (`role_id`);

--
-- Indexes for table `users`
--
ALTER TABLE `users`
  ADD PRIMARY KEY (`u_id`);

--
-- Indexes for table `wishlist`
--
ALTER TABLE `wishlist`
  ADD PRIMARY KEY (`w_id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `available`
--
ALTER TABLE `available`
  MODIFY `available_id` int(5) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT for table `cart`
--
ALTER TABLE `cart`
  MODIFY `cart_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=185;

--
-- AUTO_INCREMENT for table `category`
--
ALTER TABLE `category`
  MODIFY `cat_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=18;

--
-- AUTO_INCREMENT for table `customer`
--
ALTER TABLE `customer`
  MODIFY `c_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=31;

--
-- AUTO_INCREMENT for table `order_details`
--
ALTER TABLE `order_details`
  MODIFY `o_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=44;

--
-- AUTO_INCREMENT for table `product`
--
ALTER TABLE `product`
  MODIFY `p_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=24;

--
-- AUTO_INCREMENT for table `role`
--
ALTER TABLE `role`
  MODIFY `role_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT for table `users`
--
ALTER TABLE `users`
  MODIFY `u_id` int(10) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=9;

--
-- AUTO_INCREMENT for table `wishlist`
--
ALTER TABLE `wishlist`
  MODIFY `w_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=53;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
