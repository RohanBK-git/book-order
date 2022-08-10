-- phpMyAdmin SQL Dump
-- version 5.1.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Feb 11, 2022 at 05:49 PM
-- Server version: 10.4.22-MariaDB
-- PHP Version: 8.0.13

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `book-order`
--

DELIMITER $$
--
-- Procedures
--
CREATE DEFINER=`root`@`localhost` PROCEDURE `DisplayOrder` ()  SELECT * FROM tbl_order ORDER BY id DESC$$

DELIMITER ;

-- --------------------------------------------------------

--
-- Table structure for table `tbl_admin`
--

CREATE TABLE `tbl_admin` (
  `id` int(10) UNSIGNED NOT NULL,
  `full_name` varchar(100) NOT NULL,
  `username` varchar(100) NOT NULL,
  `password` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `tbl_admin`
--

INSERT INTO `tbl_admin` (`id`, `full_name`, `username`, `password`) VALUES
(22, 'adminstrator', 'admin', '21232f297a57a5a743894a0e4a801fc3'),
(25, 'Brooklyn Hauck', 'Bobbie45', '11a655c6f129519dc9ab10a86b0773f8'),
(26, 'Amelie Weissnat', 'Enoch_Wilderman66', 'eeb0337eb09a37200aa950838d880d8a'),
(30, 'ujm', 'mkl', '90a0eaee3c3f5cba0ef2e352726f10e5');

-- --------------------------------------------------------

--
-- Table structure for table `tbl_book`
--

CREATE TABLE `tbl_book` (
  `id` int(10) UNSIGNED NOT NULL,
  `title` varchar(100) NOT NULL,
  `description` text NOT NULL,
  `price` decimal(10,2) NOT NULL,
  `qty` int(11) NOT NULL,
  `image_name` varchar(255) NOT NULL,
  `category_id` int(10) UNSIGNED NOT NULL,
  `publisher_id` int(10) UNSIGNED NOT NULL,
  `featured` varchar(10) NOT NULL,
  `active` varchar(10) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `tbl_book`
--

INSERT INTO `tbl_book` (`id`, `title`, `description`, `price`, `qty`, `image_name`, `category_id`, `publisher_id`, `featured`, `active`) VALUES
(22, 'The Ultimate Hitchhikers Guide To The Galaxy', 'Douglas Adams', '775.00', 245, 'book-Name-7268.jfif', 23, 8, 'Yes', 'Yes'),
(24, 'Jurassic Park', 'Written by Micahel Crichton', '614.00', 0, 'book-Name-7594.jpg', 23, 12, 'Yes', 'Yes'),
(25, 'Around The World In Eighty Days', 'Written by Jules Verne', '389.00', 1, 'book-Name-2769.jfif', 20, 5, 'Yes', 'Yes'),
(35, 'Foundation', 'Written by Issac Asimov', '468.00', 5, 'book-Name-3142.jfif', 23, 6, 'Yes', 'Yes'),
(50, 'Thomas Calculus', 'George B Thomas', '700.00', 500, 'book-Name-8941.jpg', 31, 20, 'Yes', 'Yes'),
(51, 'Calculus: Early Transcendentals', 'James Stewart', '975.00', 200, 'book-Name-5684.jpg', 31, 21, 'Yes', 'Yes'),
(52, 'Advanced Engineering Mathematics', 'H K Dass', '475.00', 150, 'book-Name-7426.jpg', 31, 5, 'Yes', 'Yes'),
(53, 'Civil Engineering: Conventional And Objective Type', 'R S Khurmi', '410.00', 450, 'book-Name-8718.jpg', 34, 5, 'Yes', 'Yes'),
(54, 'GATE Civil Engineering 2022', 'Trishna', '899.00', 300, 'book-Name-4115.jpg', 34, 20, 'Yes', 'Yes'),
(55, 'Elements of Civil Engineering and Mechanics', 'N Balasubramanya', '275.00', 350, 'book-Name-1831.jpg', 34, 21, 'Yes', 'Yes'),
(56, 'Power Electronics', 'Muhammed H Rashid', '745.00', 500, 'book-Name-7916.jpg', 32, 20, 'Yes', 'Yes'),
(57, 'Analog And Digital Electronics', 'Charles H Roth Jr,\r\nLarry L Kinney,\r\nRaghunandan G H', '499.00', 700, 'book-Name-3893.jpg', 32, 21, 'Yes', 'Yes'),
(58, 'Electric Machines', 'Dino Zorbas', '799.00', 300, 'book-Name-1956.jpg', 33, 21, 'Yes', 'Yes'),
(59, 'Electrical Engineering', 'P V Prasad', '575.00', 250, 'book-Name-6706.jpg', 33, 21, 'Yes', 'Yes'),
(60, 'Basic Electrical Engineering', 'Ramana Pilla,\r\nM. Suryakalavathi,\r\nG. T. Chandra Sekhar', '395.00', 400, 'book-Name-3563.jpg', 33, 5, 'Yes', 'Yes'),
(61, 'Organic Chemistry', 'Morrison Boyd & Bhattacharjee', '969.00', 500, 'book-Name-4264.jpg', 30, 20, 'Yes', 'Yes'),
(62, 'Chemistry', 'Prasanta Rath, \r\nSubhendu Chakroborty', '299.00', 150, 'book-Name-8317.jpg', 30, 21, 'Yes', 'Yes'),
(63, 'Conceptual Chemistry', 'S. K. Jain', '750.00', 300, 'book-Name-49.jpg', 30, 5, 'Yes', 'Yes'),
(64, 'Physical Chemistry', ' Arun Bahl, \r\nB S Bahl, \r\nG D Tuli', '675.00', 450, 'book-Name-6350.jpg', 30, 5, 'Yes', 'Yes'),
(65, 'Basic Mechanical Engineering', 'Pravin Kumar', '469.00', 400, 'book-Name-8603.jpg', 35, 20, 'Yes', 'Yes'),
(66, 'Elements of Mechanical Engineering', 'S N Lal', '431.00', 350, 'book-Name-9808.jpg', 35, 21, 'Yes', 'Yes'),
(67, 'Mechanical Engineering', 'R S Khurmi', '699.00', 480, 'book-Name-5801.jpg', 35, 5, 'Yes', 'Yes'),
(68, 'Nineteen Eighty Four', 'George Orwell', '700.00', 250, 'book-Name-1725.jpg', 26, 8, 'Yes', 'Yes'),
(69, 'Azura Ghost', 'Essa Hansen', '493.00', 500, 'book-Name-9584.jpg', 23, 12, 'Yes', 'Yes'),
(70, 'Moon Acadia National Park', 'Hilary Nangle', '1100.00', 450, 'book-Name-6297.jpg', 20, 12, 'Yes', 'Yes'),
(71, 'Amalfi Coast', 'Laura Thayer', '1280.00', 480, 'book-Name-1466.jpg', 20, 12, 'Yes', 'Yes'),
(72, 'Stockholm', 'Rick Steves', '753.00', 395, 'book-Name-9142.jpg', 20, 12, 'Yes', 'Yes'),
(73, 'Alice Adventures in Wonderland', 'Lewis Carroll', '200.00', 480, 'book-Name-3806.jpg', 26, 8, 'Yes', 'Yes'),
(74, 'Our Mutual Friend', 'Charles Dickens', '295.00', 580, 'book-Name-4835.jpg', 26, 8, 'Yes', 'Yes'),
(75, 'Dream Town', 'David Baldacci', '700.00', 400, 'book-Name-6717.jpg', 25, 8, 'Yes', 'Yes'),
(76, 'The House in the Cerulean Sea', 'T J Klune', '527.00', 480, 'book-Name-4715.jpg', 21, 8, 'Yes', 'Yes'),
(77, 'sea of tranquility', 'Emily St. John Mandel', '640.00', 480, 'book-Name-5293.jpg', 21, 8, 'Yes', 'Yes');

--
-- Triggers `tbl_book`
--
DELIMITER $$
CREATE TRIGGER `InsertBook` AFTER INSERT ON `tbl_book` FOR EACH ROW INSERT INTO tbl_booklog  VALUES(null,NEW.id,'INSERTED',NOW())
$$
DELIMITER ;

-- --------------------------------------------------------

--
-- Table structure for table `tbl_booklog`
--

CREATE TABLE `tbl_booklog` (
  `id` int(11) NOT NULL,
  `book_id` int(11) NOT NULL,
  `action` varchar(20) NOT NULL,
  `date` datetime NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `tbl_booklog`
--

INSERT INTO `tbl_booklog` (`id`, `book_id`, `action`, `date`) VALUES
(1, 48, 'INSERTED', '2022-01-22 11:00:37'),
(2, 49, 'INSERTED', '2022-02-11 11:25:45'),
(3, 50, 'INSERTED', '2022-02-11 18:52:00'),
(4, 51, 'INSERTED', '2022-02-11 18:55:58'),
(5, 52, 'INSERTED', '2022-02-11 18:59:19'),
(6, 53, 'INSERTED', '2022-02-11 19:01:36'),
(7, 54, 'INSERTED', '2022-02-11 19:03:55'),
(8, 55, 'INSERTED', '2022-02-11 19:07:59'),
(9, 56, 'INSERTED', '2022-02-11 19:12:39'),
(10, 57, 'INSERTED', '2022-02-11 19:15:47'),
(11, 58, 'INSERTED', '2022-02-11 19:36:10'),
(12, 59, 'INSERTED', '2022-02-11 19:37:48'),
(13, 60, 'INSERTED', '2022-02-11 19:43:47'),
(14, 61, 'INSERTED', '2022-02-11 19:46:55'),
(15, 62, 'INSERTED', '2022-02-11 19:50:03'),
(16, 63, 'INSERTED', '2022-02-11 19:53:13'),
(17, 64, 'INSERTED', '2022-02-11 19:55:51'),
(18, 65, 'INSERTED', '2022-02-11 19:59:42'),
(19, 66, 'INSERTED', '2022-02-11 20:01:37'),
(20, 67, 'INSERTED', '2022-02-11 20:04:00'),
(21, 68, 'INSERTED', '2022-02-11 20:21:39'),
(22, 69, 'INSERTED', '2022-02-11 20:24:27'),
(23, 70, 'INSERTED', '2022-02-11 20:31:50'),
(24, 71, 'INSERTED', '2022-02-11 20:44:09'),
(25, 72, 'INSERTED', '2022-02-11 20:47:24'),
(26, 73, 'INSERTED', '2022-02-11 20:54:57'),
(27, 74, 'INSERTED', '2022-02-11 20:57:21'),
(28, 75, 'INSERTED', '2022-02-11 21:00:26'),
(29, 76, 'INSERTED', '2022-02-11 21:05:44'),
(30, 77, 'INSERTED', '2022-02-11 21:09:55');

-- --------------------------------------------------------

--
-- Table structure for table `tbl_category`
--

CREATE TABLE `tbl_category` (
  `id` int(10) UNSIGNED NOT NULL,
  `title` varchar(100) NOT NULL,
  `image_name` varchar(255) NOT NULL,
  `featured` varchar(10) NOT NULL,
  `active` varchar(10) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `tbl_category`
--

INSERT INTO `tbl_category` (`id`, `title`, `image_name`, `featured`, `active`) VALUES
(20, 'Travel', 'book_category_105.jfif', 'Yes', 'Yes'),
(21, 'Fantasy', 'book_category_94.jfif', 'Yes', 'Yes'),
(23, 'Science Fiction', 'book_category_221.png', 'Yes', 'Yes'),
(25, 'History', 'book_category_127.jfif', 'Yes', 'Yes'),
(26, 'Classics', 'book_category_501.jfif', 'Yes', 'Yes'),
(30, 'Chemistry', 'book_category_275.jfif', 'Yes', 'Yes'),
(31, 'Mathematics', 'book_category_962.jfif', 'Yes', 'Yes'),
(32, 'Electronics', 'book_category_917.jfif', 'Yes', 'Yes'),
(33, 'Electrical', 'book_category_949.jfif', 'Yes', 'Yes'),
(34, 'Civil', 'book_category_854.jfif', 'Yes', 'Yes'),
(35, 'Mechanical', 'book_category_309.jfif', 'Yes', 'Yes');

-- --------------------------------------------------------

--
-- Table structure for table `tbl_customer`
--

CREATE TABLE `tbl_customer` (
  `id` int(10) UNSIGNED NOT NULL,
  `full_name` varchar(100) NOT NULL,
  `username` varchar(100) NOT NULL,
  `password` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `tbl_customer`
--

INSERT INTO `tbl_customer` (`id`, `full_name`, `username`, `password`) VALUES
(1, 'abc', 'abc', '4ed9407630eb1000c0f6b63842defa7d'),
(2, 'qwe', 'erc', '4911e516e5aa21d327512e0c8b197616'),
(3, 'qwe', 'asd', '5fa72358f0b4fb4f2c5d7de8c9a41846'),
(4, 'aaaa', 'aaa', '47bce5c74f589f4867dbd57e9ca9f808'),
(5, '', '', 'd41d8cd98f00b204e9800998ecf8427e'),
(6, '', '', '0cc175b9c0f1b6a831c399e269772661'),
(7, 'a', 'a', '0cc175b9c0f1b6a831c399e269772661'),
(8, 'a', 'a', '0cc175b9c0f1b6a831c399e269772661'),
(9, 'a', 'a', '0cc175b9c0f1b6a831c399e269772661'),
(10, 'abc', 'abc', '900150983cd24fb0d6963f7d28e17f72'),
(11, 'poi', 'mlp', 'f1f501c2c23fea8dfb0fe1af25b879d1');

-- --------------------------------------------------------

--
-- Table structure for table `tbl_order`
--

CREATE TABLE `tbl_order` (
  `id` int(10) UNSIGNED NOT NULL,
  `book` varchar(150) NOT NULL,
  `price` decimal(10,2) NOT NULL,
  `qty` int(11) NOT NULL,
  `total` decimal(10,2) NOT NULL,
  `order_date` datetime NOT NULL,
  `status` varchar(50) NOT NULL,
  `customer_name` varchar(150) NOT NULL,
  `customer_contact` varchar(20) NOT NULL,
  `customer_email` varchar(150) NOT NULL,
  `customer_address` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `tbl_order`
--

INSERT INTO `tbl_order` (`id`, `book`, `price`, `qty`, `total`, `order_date`, `status`, `customer_name`, `customer_contact`, `customer_email`, `customer_address`) VALUES
(13, 'The Ultimate Hitchhikers Guide To The Galaxy', '432.00', 10, '4320.00', '2022-01-22 08:21:23', 'On Delivery', 'Edmond Schimmel', '654-426-3654', 'your.email+fakedata67156@gmail.com', '4332 Mertz Isle'),
(14, 'Foundation', '468.00', 11, '5148.00', '2022-01-22 08:23:17', 'Delivered', 'Kiera Swift', '286-535-7329', 'your.email+fakedata79704@gmail.com', '8532 Lucius Prairie'),
(15, 'Around The World In Eighty Days', '389.00', 5, '1945.00', '2022-01-22 08:23:32', 'On Delivery', 'Melody Sauer', '846-889-1103', 'your.email+fakedata41461@gmail.com', '904 Kirlin Grove'),
(16, 'The Ultimate Hitchhikers Guide To The Galaxy', '432.00', 50, '21600.00', '2022-01-22 08:24:53', 'Delivered', 'Robbie Auer', '084-135-2310', 'your.email+fakedata39723@gmail.com', '70 Dusty Hills'),
(17, 'Foundation', '468.00', 5, '2340.00', '2022-01-22 08:25:02', 'Ordered', 'Delphia Powlowski', '624-974-1249', 'your.email+fakedata55210@gmail.com', '4554 Emard Drives'),
(18, 'Around The World In Eighty Days', '389.00', 1, '389.00', '2022-01-22 08:25:15', 'Cancelled', 'Aron Thompson', '665-284-1871', 'your.email+fakedata95309@gmail.com', '785 Robb Common'),
(19, 'Stockholm', '753.00', 5, '3765.00', '2022-02-11 04:58:41', 'Delivered', 'Aaliyah Skiles', '302-697-9770', 'your.email+fakedata79454@gmail.com', '686 McDermott Junction'),
(20, 'The Ultimate Hitchhikers Guide To The Galaxy', '775.00', 5, '3875.00', '2022-02-11 05:03:40', 'Delivered', 'Violet Gerlach', '366-859-6890', 'your.email+fakedata10115@gmail.com', '418 Madelyn Prairie');

-- --------------------------------------------------------

--
-- Table structure for table `tbl_publisher`
--

CREATE TABLE `tbl_publisher` (
  `id` int(10) UNSIGNED NOT NULL,
  `title` varchar(100) NOT NULL,
  `image_name` varchar(255) NOT NULL,
  `featured` varchar(10) NOT NULL,
  `active` varchar(10) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `tbl_publisher`
--

INSERT INTO `tbl_publisher` (`id`, `title`, `image_name`, `featured`, `active`) VALUES
(5, 'S CHAND AND COMPANY LIMITED', 'book_publisher_690.jfif', 'Yes', 'Yes'),
(8, 'Pan Macmillan', 'publisher_category_854.jfif', 'Yes', 'Yes'),
(12, 'Hachette', 'publisher_category_43.jpg', 'Yes', 'Yes'),
(13, 'Cambridge University Press', 'publisher_category_805.png', 'No', 'No'),
(14, 'Westland', 'publisher_category_508.jpg', 'No', 'No'),
(20, 'Pearson', 'publisher_publisher_43.jfif', 'Yes', 'Yes'),
(21, 'Cengage', 'publisher_publisher_360.jfif', 'Yes', 'Yes');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `tbl_admin`
--
ALTER TABLE `tbl_admin`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `tbl_book`
--
ALTER TABLE `tbl_book`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `tbl_booklog`
--
ALTER TABLE `tbl_booklog`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `tbl_category`
--
ALTER TABLE `tbl_category`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `tbl_customer`
--
ALTER TABLE `tbl_customer`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `tbl_order`
--
ALTER TABLE `tbl_order`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `tbl_publisher`
--
ALTER TABLE `tbl_publisher`
  ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `tbl_admin`
--
ALTER TABLE `tbl_admin`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=31;

--
-- AUTO_INCREMENT for table `tbl_book`
--
ALTER TABLE `tbl_book`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=78;

--
-- AUTO_INCREMENT for table `tbl_booklog`
--
ALTER TABLE `tbl_booklog`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=31;

--
-- AUTO_INCREMENT for table `tbl_category`
--
ALTER TABLE `tbl_category`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=36;

--
-- AUTO_INCREMENT for table `tbl_customer`
--
ALTER TABLE `tbl_customer`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=12;

--
-- AUTO_INCREMENT for table `tbl_order`
--
ALTER TABLE `tbl_order`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=21;

--
-- AUTO_INCREMENT for table `tbl_publisher`
--
ALTER TABLE `tbl_publisher`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=22;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
