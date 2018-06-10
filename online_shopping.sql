-- phpMyAdmin SQL Dump
-- version 4.7.0
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Nov 21, 2017 at 10:25 AM
-- Server version: 10.1.24-MariaDB
-- PHP Version: 7.1.6

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET AUTOCOMMIT = 0;
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `online_shopping`
--

-- --------------------------------------------------------

--
-- Table structure for table `checkout`
--

CREATE TABLE `checkout` (
  `chk_id` int(11) NOT NULL,
  `chk_item` int(11) NOT NULL,
  `chk_ref` text NOT NULL,
  `chk_timing` datetime NOT NULL,
  `chk_qty` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `checkout`
--

INSERT INTO `checkout` (`chk_id`, `chk_item`, `chk_ref`, `chk_timing`, `chk_qty`) VALUES
(207, 3, '17-07-11 08:43:43_1892717744', '2017-07-11 09:47:07', 0),
(209, 3, '17-07-11 08:43:43_1892717744', '2017-07-11 09:47:07', 0),
(211, 3, '17-07-11 08:43:43_1892717744', '2017-07-11 09:47:21', 0),
(216, 4, '17-07-11 01:29:58_1230347519', '2017-07-11 01:37:11', 1),
(217, 4, '17-07-11 01:29:58_1230347519', '2017-07-11 01:37:24', 1),
(218, 2, '17-07-11 01:29:58_1230347519', '2017-07-11 01:37:35', 1),
(219, 4, '17-07-12 07:23:26_1217730319', '2017-07-12 07:23:26', 1),
(222, 4, '17-07-12 07:23:26_1217730319', '2017-07-12 12:46:21', 1),
(228, 4, '17-07-13 06:26:43_2002271074', '2017-07-13 07:47:38', 8),
(229, 4, '17-07-13 07:58:56_1563095409', '2017-07-13 07:58:56', 1),
(230, 4, '17-07-14 11:39:02_1751193768', '2017-07-14 11:39:02', 1),
(231, 1, '17-07-21 05:43:03_1502045941', '2017-07-21 05:43:03', 6),
(232, 1, '17-08-02 04:10:46_631360740', '2017-08-02 04:10:46', 1),
(233, 4, '17-08-03 02:36:21_491109703', '2017-08-03 02:36:21', 1),
(234, 1, '17-08-03 02:36:21_491109703', '2017-08-03 05:48:02', 10),
(235, 2, '17-08-03 07:10:32_232990825', '2017-08-03 07:10:32', 1),
(236, 3, '17-08-04 07:01:00_484586177', '2017-08-04 07:01:00', 5),
(237, 3, '17-08-04 07:01:00_484586177', '2017-08-04 07:01:32', 1),
(238, 2, '17-08-04 09:50:43_152293046', '2017-08-04 09:50:43', 1),
(240, 1, '17-08-04 09:50:43_152293046', '2017-08-04 11:20:41', 9),
(241, 1, '17-08-04 09:50:43_152293046', '2017-08-04 11:26:15', 1),
(242, 1, '17-08-04 09:50:43_152293046', '2017-08-04 11:37:20', 1),
(243, 3, '17-08-04 09:50:43_152293046', '2017-08-04 11:41:15', 1),
(250, 1, '17-08-05 06:27:54_178606533', '2017-08-05 06:27:54', 3),
(251, 4, '17-08-31 11:47:18_924357167', '2017-08-31 11:47:18', 0),
(252, 2, '17-09-07 12:02:04_1362380514', '2017-09-07 12:02:04', 2),
(253, 4, '17-09-12 11:34:22_479006267', '2017-09-12 11:34:22', 1),
(254, 2, '17-10-23 11:13:45_1267554980', '2017-10-23 11:13:45', 1),
(255, 4, '17-10-29 12:20:00_734179696', '2017-10-29 12:20:00', 1),
(256, 2, '17-11-20 10:50:58_1866785480', '2017-11-20 10:50:58', 1),
(257, 1, '17-11-21 10:08:25_2126525682', '2017-11-21 10:08:25', 1);

-- --------------------------------------------------------

--
-- Table structure for table `items`
--

CREATE TABLE `items` (
  `item_id` int(11) NOT NULL,
  `item_image` text NOT NULL,
  `item_title` text NOT NULL,
  `item_description` text NOT NULL,
  `item_cat` text NOT NULL,
  `item_qty` int(11) NOT NULL,
  `item_cost` int(11) NOT NULL,
  `item_price` int(11) NOT NULL,
  `item_discount` int(11) NOT NULL,
  `item_delivery` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `items`
--

INSERT INTO `items` (`item_id`, `item_image`, `item_title`, `item_description`, `item_cat`, `item_qty`, `item_cost`, `item_price`, `item_discount`, `item_delivery`) VALUES
(1, 'images/item/item1.jpg', 'Beautiful Watch', '	<p>	This is a beautiful Watch.It is purely made on metal and you can buy buy this watch buy clicking on buy button</p>\r\n		<ul>\r\n		\r\n		<li>It\'s Beautiful</li>\r\n		<li>Made of metal</li>\r\n		<li>AN orignal and brand Quality</li>\r\n		<li>Free shipping over all the country</li>\r\n		<li>Pay Securily via <b>Cash on Delivery </b>Method</li>\r\n		</ul>', 'watches', 50, 500, 400, 50, 0),
(2, 'images/item/item1.jpg', 'Black Watch', '<p>	This is a beautiful Watch.It is purely made on metal and you can buy buy this watch buy clicking on buy button</p>\r\n		<ul>\r\n		\r\n		<li>It\'s Beautiful</li>\r\n		<li>Made of metal</li>\r\n		<li>AN orignal and brand Quality</li>\r\n		<li>Free shipping over all the country</li>\r\n		<li>Pay Securily via <b>Cash on Delivery </b>Method</li>\r\n		</ul>', 'watches', 30, 400, 600, 100, 0),
(3, 'images/item/item2.jpg', 'Men Wear Glasses', '	<p>This is a beautiful glasses.it looks amazing</p>\r\n		<ul>\r\n		\r\n		<li>It\'s Beautiful</li>\r\n		<li>Made of metal</li>\r\n		<li>AN orignal and brand Quality</li>\r\n		<li>Free shipping over all the country</li>\r\n		<li>Pay Securily via <b>Cash on Delivery </b>Method</li>\r\n		</ul>', 'men', 20, 449, 400, 49, 0),
(4, 'images/item/item3.jpg', 'Best Summer Shoe', '<p> BEst Summer Shoe and good quality</p>\r\n		<ul>\r\n		\r\n		<li>It\'s Awesome</li>\r\n		\r\n		<li>AN orignal and brand Quality</li>\r\n		<li>Free shipping over all the country</li>\r\n		<li>Pay Securily via <b>Cash on Delivery </b>Method</li>\r\n		</ul>', 'shoe', 10, 1499, 1500, 50, 0),
(5, 'images/item/item1.jpg', 'watch', '	<p>	This is a beautiful Watch.It is purely made on metal and you can buy buy this watch buy clicking on buy button</p>\r\n		<ul>\r\n		\r\n		<li>It\'s Beautiful</li>\r\n		<li>Made of metal</li>\r\n		<li>AN orignal and brand Quality</li>\r\n		<li>Free shipping over all the country</li>\r\n		<li>Pay Securily via <b>Cash on Delivery </b>Method</li>\r\n		</ul>', 'watches', 50, 30, 1200, 300, 50),
(6, 'images/item/item1.jpg', 'watch', '	<p>	This is a beautiful Watch.It is purely made on metal and you can buy buy this watch buy clicking on buy button</p>\r\n		<ul>\r\n		\r\n		<li>It\'s Beautiful</li>\r\n		<li>Made of metal</li>\r\n		<li>AN orignal and brand Quality</li>\r\n		<li>Free shipping over all the country</li>\r\n		<li>Pay Securily via <b>Cash on Delivery </b>Method</li>\r\n		</ul>', 'watches', 50, 30, 1200, 300, 50);

-- --------------------------------------------------------

--
-- Table structure for table `items_cat`
--

CREATE TABLE `items_cat` (
  `cat_id` int(11) NOT NULL,
  `cat_name` text NOT NULL,
  `cat_slug` text NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `items_cat`
--

INSERT INTO `items_cat` (`cat_id`, `cat_name`, `cat_slug`) VALUES
(1, 'watches', 'watches'),
(2, 'men', ''),
(3, 'shoe', 'shoe');

-- --------------------------------------------------------

--
-- Table structure for table `orders`
--

CREATE TABLE `orders` (
  `order_id` int(11) NOT NULL,
  `order_name` text NOT NULL,
  `order_email` text NOT NULL,
  `order_contact` text NOT NULL,
  `order_state` text NOT NULL,
  `order_delivery_add` text NOT NULL,
  `order_checkout_ref` text NOT NULL,
  `order_total` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `orders`
--

INSERT INTO `orders` (`order_id`, `order_name`, `order_email`, `order_contact`, `order_state`, `order_delivery_add`, `order_checkout_ref`, `order_total`) VALUES
(1, 'sonu', 'vermasonu791@gmail.com', '972899677', 'Rohtak', 'abc', '17-07-13 07:58:56_1563095409)', 1450),
(2, 'sonu', 'vermasonu791@gmail.com', '972899677', 'Rohtak', 'abc', '17-07-13 07:58:56_1563095409)', 1450),
(3, '', '', '', '', '', '17-07-14 11:39:02_1751193768)', 1450),
(4, '', '', '', '', '', '17-07-21 05:43:03_1502045941)', 2100),
(5, '', '', '', '', '', '17-08-02 04:10:46_631360740)', 350),
(6, '', '', '', '', '', '17-08-03 02:36:21_491109703)', 1450),
(7, '', '', '', '', '', '17-08-03 02:36:21_491109703)', 4950),
(8, '', '', '', '', '', '17-08-04 07:01:00_484586177)', 351),
(9, '', '', '', '', '', '17-08-04 07:01:00_484586177)', 2106),
(10, '', '', '', '', '', '17-08-04 09:50:43_152293046)', 500),
(11, '', '', '', '', '', '17-08-04 09:50:43_152293046)', 4350),
(12, '', '', '', '', '', '17-08-05 06:27:54_178606533)', 1050);

--
-- Indexes for dumped tables
--

--
-- Indexes for table `checkout`
--
ALTER TABLE `checkout`
  ADD PRIMARY KEY (`chk_id`);

--
-- Indexes for table `items`
--
ALTER TABLE `items`
  ADD PRIMARY KEY (`item_id`);

--
-- Indexes for table `items_cat`
--
ALTER TABLE `items_cat`
  ADD PRIMARY KEY (`cat_id`);

--
-- Indexes for table `orders`
--
ALTER TABLE `orders`
  ADD PRIMARY KEY (`order_id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `checkout`
--
ALTER TABLE `checkout`
  MODIFY `chk_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=258;
--
-- AUTO_INCREMENT for table `items`
--
ALTER TABLE `items`
  MODIFY `item_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=7;
--
-- AUTO_INCREMENT for table `items_cat`
--
ALTER TABLE `items_cat`
  MODIFY `cat_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;
--
-- AUTO_INCREMENT for table `orders`
--
ALTER TABLE `orders`
  MODIFY `order_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=13;COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
