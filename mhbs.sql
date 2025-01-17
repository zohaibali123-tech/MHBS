-- phpMyAdmin SQL Dump
-- version 5.2.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Jan 05, 2024 at 08:16 PM
-- Server version: 10.4.28-MariaDB
-- PHP Version: 8.2.4

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `mhbs`
--

-- --------------------------------------------------------

--
-- Table structure for table `cities`
--

CREATE TABLE `cities` (
  `city_id` int(11) NOT NULL,
  `city_name` varchar(255) NOT NULL,
  `halls` int(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `cities`
--

INSERT INTO `cities` (`city_id`, `city_name`, `halls`) VALUES
(1, 'Mirpurkhas', 0),
(2, 'Hyderabad', 0),
(3, 'Karachi', 0);

-- --------------------------------------------------------

--
-- Table structure for table `hallcharges`
--

CREATE TABLE `hallcharges` (
  `hall_charges_id` int(11) NOT NULL,
  `hall_id` int(11) NOT NULL,
  `guest_slot` varchar(255) NOT NULL,
  `price` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `hallcharges`
--

INSERT INTO `hallcharges` (`hall_charges_id`, `hall_id`, `guest_slot`, `price`) VALUES
(14, 14, '100', 30000);

-- --------------------------------------------------------

--
-- Table structure for table `hall_bank_detail`
--

CREATE TABLE `hall_bank_detail` (
  `hall_bank_id` int(11) NOT NULL,
  `hall_id` int(11) NOT NULL,
  `hall_bank_name` varchar(255) NOT NULL,
  `hall_bank_title` varchar(255) NOT NULL,
  `hall_acc_no` int(11) NOT NULL,
  `hall_iban` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `hall_bank_detail`
--

INSERT INTO `hall_bank_detail` (`hall_bank_id`, `hall_id`, `hall_bank_name`, `hall_bank_title`, `hall_acc_no`, `hall_iban`) VALUES
(9, 14, '', '', 0, 0);

-- --------------------------------------------------------

--
-- Table structure for table `hall_booking_records`
--

CREATE TABLE `hall_booking_records` (
  `hall_book_id` int(11) NOT NULL,
  `hall_id` int(11) NOT NULL,
  `event_name` varchar(255) NOT NULL,
  `full_name` varchar(255) NOT NULL,
  `email` varchar(255) NOT NULL,
  `contact_no` varchar(13) NOT NULL,
  `guests` int(255) NOT NULL,
  `booking_date` date NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `hall_booking_records`
--

INSERT INTO `hall_booking_records` (`hall_book_id`, `hall_id`, `event_name`, `full_name`, `email`, `contact_no`, `guests`, `booking_date`) VALUES
(1, 14, 'Shadi', 'Abdul Jabbar', 'jabbarpanhwar2706@gmail.com', '3052468756', 1000, '2024-01-02');

-- --------------------------------------------------------

--
-- Table structure for table `hall_card_image`
--

CREATE TABLE `hall_card_image` (
  `hall_card_image_id` int(11) NOT NULL,
  `hall_id` int(11) NOT NULL,
  `image_path` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `hall_card_image`
--

INSERT INTO `hall_card_image` (`hall_card_image_id`, `hall_id`, `image_path`) VALUES
(12, 14, 'Hut.jpg');

-- --------------------------------------------------------

--
-- Table structure for table `hall_charges`
--

CREATE TABLE `hall_charges` (
  `hall_charges_id` int(11) NOT NULL,
  `hall_id` int(11) NOT NULL,
  `hall_service_charges` int(11) NOT NULL,
  `hall_lighting` int(11) NOT NULL,
  `hall_DJ` int(11) NOT NULL,
  `hall_tax` int(11) NOT NULL,
  `hall_advance_book` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `hall_charges`
--

INSERT INTO `hall_charges` (`hall_charges_id`, `hall_id`, `hall_service_charges`, `hall_lighting`, `hall_DJ`, `hall_tax`, `hall_advance_book`) VALUES
(13, 14, 6000, 0, 0, 0, 50000);

-- --------------------------------------------------------

--
-- Table structure for table `hall_contact`
--

CREATE TABLE `hall_contact` (
  `hall_contact_id` int(11) NOT NULL,
  `hall_id` int(11) NOT NULL,
  `hall_phone` varchar(200) NOT NULL,
  `hall_email` varchar(255) NOT NULL,
  `hall_website` varchar(255) NOT NULL,
  `hall_face` varchar(255) NOT NULL,
  `hall_insta` varchar(255) NOT NULL,
  `hall_you` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `hall_contact`
--

INSERT INTO `hall_contact` (`hall_contact_id`, `hall_id`, `hall_phone`, `hall_email`, `hall_website`, `hall_face`, `hall_insta`, `hall_you`) VALUES
(14, 14, '0347 3001971', 'hatulbanquet@gmail.com', '0', 'https://web.facebook.com/hatulbanquet', '', '');

-- --------------------------------------------------------

--
-- Table structure for table `hall_images`
--

CREATE TABLE `hall_images` (
  `image_id` int(11) NOT NULL,
  `hall_id` int(11) NOT NULL,
  `image_path` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `hall_images`
--

INSERT INTO `hall_images` (`image_id`, `hall_id`, `image_path`) VALUES
(96, 14, 'uploads/Hut.jpg'),
(97, 14, 'uploads/Hut2.jpg'),
(98, 14, 'uploads/Hut3.jpg'),
(99, 14, 'uploads/Hut4.jpg');

-- --------------------------------------------------------

--
-- Table structure for table `hall_main_info`
--

CREATE TABLE `hall_main_info` (
  `hall_id` int(11) NOT NULL,
  `user_id` int(11) NOT NULL,
  `hall_name` varchar(255) NOT NULL,
  `hall_city_name` varchar(255) NOT NULL,
  `hall_address` varchar(255) NOT NULL,
  `hall_max_capicity` varchar(255) NOT NULL,
  `hall_facilities` varchar(255) NOT NULL,
  `hall_parking` varchar(255) NOT NULL,
  `hall_desc` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `hall_main_info`
--

INSERT INTO `hall_main_info` (`hall_id`, `user_id`, `hall_name`, `hall_city_name`, `hall_address`, `hall_max_capicity`, `hall_facilities`, `hall_parking`, `hall_desc`) VALUES
(14, 10, 'Hatul Banquet ', 'Mirpurkhas', 'Hatul Banquet Near Kos ghar Railway Phatak Umarkot Road , Mirpur Khas, Pakistan, 69000', '1000', 'AC', 'YES', 'Welcome to Hatul Banquet , a charming wedding venue located in Mirpurkhas . Our hall boasts a spacious and elegantly designed space, accommodating up to thousand plus guests. With state-of-the-art amenities and ample parking, we offer a seamless experienc');

-- --------------------------------------------------------

--
-- Table structure for table `menu`
--

CREATE TABLE `menu` (
  `menu_id` int(11) NOT NULL,
  `hall_id` int(11) NOT NULL,
  `menu_name` varchar(255) NOT NULL,
  `menu_price` int(255) NOT NULL,
  `menu_items` int(255) NOT NULL,
  `menu_image` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `menu`
--

INSERT INTO `menu` (`menu_id`, `hall_id`, `menu_name`, `menu_price`, `menu_items`, `menu_image`) VALUES
(26, 14, 'Shadi Menu', 850, 11, 'simple.jpg');

-- --------------------------------------------------------

--
-- Table structure for table `photoservice`
--

CREATE TABLE `photoservice` (
  `photo_service_id` int(11) NOT NULL,
  `hall_id` int(11) NOT NULL,
  `package_name` varchar(255) NOT NULL,
  `service` varchar(255) NOT NULL,
  `photo_service_price` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `photoservice`
--

INSERT INTO `photoservice` (`photo_service_id`, `hall_id`, `package_name`, `service`, `photo_service_price`) VALUES
(10, 14, 'Picture and Video', 'Photo/Video', 10000);

-- --------------------------------------------------------

--
-- Table structure for table `users`
--

CREATE TABLE `users` (
  `id` int(11) NOT NULL,
  `fullname` varchar(255) NOT NULL,
  `email` varchar(255) NOT NULL,
  `mobile` varchar(13) NOT NULL,
  `password` varchar(25) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `users`
--

INSERT INTO `users` (`id`, `fullname`, `email`, `mobile`, `password`) VALUES
(10, 'admin', 'admin@gmail.com', '03052468756', '1234'),
(11, 'Abdul Jabbar', 'jabbarpanhwar2706@gmail.com', '03052468756', '1234');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `cities`
--
ALTER TABLE `cities`
  ADD PRIMARY KEY (`city_id`);

--
-- Indexes for table `hallcharges`
--
ALTER TABLE `hallcharges`
  ADD PRIMARY KEY (`hall_charges_id`);

--
-- Indexes for table `hall_bank_detail`
--
ALTER TABLE `hall_bank_detail`
  ADD PRIMARY KEY (`hall_bank_id`);

--
-- Indexes for table `hall_booking_records`
--
ALTER TABLE `hall_booking_records`
  ADD PRIMARY KEY (`hall_book_id`);

--
-- Indexes for table `hall_card_image`
--
ALTER TABLE `hall_card_image`
  ADD PRIMARY KEY (`hall_card_image_id`);

--
-- Indexes for table `hall_charges`
--
ALTER TABLE `hall_charges`
  ADD PRIMARY KEY (`hall_charges_id`);

--
-- Indexes for table `hall_contact`
--
ALTER TABLE `hall_contact`
  ADD PRIMARY KEY (`hall_contact_id`);

--
-- Indexes for table `hall_images`
--
ALTER TABLE `hall_images`
  ADD PRIMARY KEY (`image_id`);

--
-- Indexes for table `hall_main_info`
--
ALTER TABLE `hall_main_info`
  ADD PRIMARY KEY (`hall_id`);

--
-- Indexes for table `menu`
--
ALTER TABLE `menu`
  ADD PRIMARY KEY (`menu_id`);

--
-- Indexes for table `photoservice`
--
ALTER TABLE `photoservice`
  ADD PRIMARY KEY (`photo_service_id`);

--
-- Indexes for table `users`
--
ALTER TABLE `users`
  ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `cities`
--
ALTER TABLE `cities`
  MODIFY `city_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT for table `hallcharges`
--
ALTER TABLE `hallcharges`
  MODIFY `hall_charges_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=15;

--
-- AUTO_INCREMENT for table `hall_bank_detail`
--
ALTER TABLE `hall_bank_detail`
  MODIFY `hall_bank_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=10;

--
-- AUTO_INCREMENT for table `hall_booking_records`
--
ALTER TABLE `hall_booking_records`
  MODIFY `hall_book_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT for table `hall_card_image`
--
ALTER TABLE `hall_card_image`
  MODIFY `hall_card_image_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=13;

--
-- AUTO_INCREMENT for table `hall_charges`
--
ALTER TABLE `hall_charges`
  MODIFY `hall_charges_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=14;

--
-- AUTO_INCREMENT for table `hall_contact`
--
ALTER TABLE `hall_contact`
  MODIFY `hall_contact_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=15;

--
-- AUTO_INCREMENT for table `hall_images`
--
ALTER TABLE `hall_images`
  MODIFY `image_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=100;

--
-- AUTO_INCREMENT for table `hall_main_info`
--
ALTER TABLE `hall_main_info`
  MODIFY `hall_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=15;

--
-- AUTO_INCREMENT for table `menu`
--
ALTER TABLE `menu`
  MODIFY `menu_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=27;

--
-- AUTO_INCREMENT for table `photoservice`
--
ALTER TABLE `photoservice`
  MODIFY `photo_service_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=11;

--
-- AUTO_INCREMENT for table `users`
--
ALTER TABLE `users`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=12;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
