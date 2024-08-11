-- phpMyAdmin SQL Dump
-- version 5.2.0
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: יוני 24, 2024 בזמן 11:29 AM
-- גרסת שרת: 10.4.27-MariaDB
-- PHP Version: 8.2.0

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `projectgmrh`
--

-- --------------------------------------------------------

--
-- מבנה טבלה עבור טבלה `admin`
--

CREATE TABLE `admin` (
  `id` int(11) NOT NULL,
  `username` varchar(200) NOT NULL,
  `password` varchar(200) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- הוצאת מידע עבור טבלה `admin`
--

INSERT INTO `admin` (`id`, `username`, `password`) VALUES
(1, 'tahreer', '123456');

-- --------------------------------------------------------

--
-- מבנה טבלה עבור טבלה `appointments`
--

CREATE TABLE `appointments` (
  `id` int(11) NOT NULL,
  `date` date NOT NULL,
  `created_at` timestamp NOT NULL DEFAULT current_timestamp(),
  `timeslot` varchar(255) DEFAULT NULL,
  `email` varchar(255) DEFAULT NULL,
  `treatment` varchar(255) DEFAULT NULL,
  `phone` varchar(20) DEFAULT NULL,
  `name` varchar(255) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- הוצאת מידע עבור טבלה `appointments`
--

INSERT INTO `appointments` (`id`, `date`, `created_at`, `timeslot`, `email`, `treatment`, `phone`, `name`) VALUES
(1, '2023-12-23', '2023-12-23 12:02:11', NULL, NULL, NULL, NULL, NULL),
(2, '2023-12-27', '2023-12-23 06:00:00', NULL, NULL, NULL, NULL, NULL),
(3, '2023-12-28', '2023-12-23 07:30:00', NULL, NULL, NULL, NULL, NULL),
(4, '2023-12-24', '2023-12-23 12:03:18', NULL, NULL, NULL, NULL, NULL),
(5, '2023-12-25', '2023-12-23 12:03:18', NULL, NULL, NULL, NULL, NULL),
(6, '2023-12-26', '2023-12-23 12:03:18', NULL, NULL, NULL, NULL, NULL),
(7, '2023-12-23', '2023-12-23 12:03:32', NULL, NULL, NULL, NULL, NULL),
(10, '2023-12-24', '2023-12-23 13:10:28', '10:00 AM', 'john@example.com', 'Consultation', '1234567890', 'aden habm'),
(11, '2023-12-24', '2023-12-23 13:10:59', '10:00 AM', 'john@example.com', 'Consultation', '1234567890', 'aden habm'),
(12, '2023-12-24', '2023-12-23 13:11:34', '10:00 AM', 'john@example.com', 'Consultation', '1234567890', 'aden habm'),
(13, '2023-12-24', '2023-12-23 13:11:41', '10:00 AM', 'john@example.com', 'Consultation', '1234567890', 'aden habm'),
(14, '2023-12-27', '2023-12-23 13:12:14', NULL, 'talzg@gmail.com', NULL, NULL, 'aden habm'),
(15, '2023-12-27', '2023-12-23 13:12:19', NULL, 'talzg@gmail.com', NULL, NULL, 'aden habm'),
(16, '2023-12-27', '2023-12-23 13:12:54', NULL, 'talzg@gmail.com', NULL, NULL, 'עדן'),
(17, '2023-12-23', '2023-12-23 14:28:35', '12:40PM - 13:10PM', 'talzg@gmail.com', 'Consultation', '025897', 'עדן'),
(18, '2023-12-23', '2023-12-23 14:29:13', '12:40PM - 13:10PM', 'talzg@gmail.com', 'Consultation', '025897', 'עדן'),
(29, '2023-12-23', '2023-12-23 15:12:17', '12:00PM - 12:30PM', 'talzg@gmail.com', 'Buying products', '0147950', 'ronit'),
(30, '2023-12-23', '2023-12-23 15:12:59', '12:00PM - 12:30PM', 'talzg@gmail.com', 'Consultation', '1497852', 'amer'),
(31, '2023-12-23', '2023-12-23 15:13:57', '12:00PM - 12:30PM', 'talzg@gmail.com', 'Consultation', '1497852', 'amer'),
(32, '2023-12-23', '2023-12-23 15:14:34', '12:00PM - 12:30PM', 'talzg@gmail.com', 'Consultation', '1497852', 'amer'),
(33, '2023-12-23', '2023-12-23 15:14:59', '12:00PM - 12:30PM', 'talzg@gmail.com', 'Consultation', '1497852', 'amer'),
(34, '2023-12-23', '2023-12-23 15:15:22', '12:00PM - 12:30PM', 'talzg@gmail.com', 'Consultation', '1497852', 'amer'),
(35, '2023-12-23', '2023-12-23 15:15:45', '12:00PM - 12:30PM', 'talzg@gmail.com', 'Consultation', '1497852', 'amer'),
(36, '2023-12-23', '2023-12-23 15:17:23', '12:00PM - 12:30PM', 'talzg@gmail.com', 'Consultation', '1497852', 'amer'),
(37, '2023-12-23', '2023-12-23 15:17:40', '12:00PM - 12:30PM', 'talzg@gmail.com', 'Consultation', '1497852', 'amer'),
(38, '2023-12-23', '2023-12-23 15:17:52', '12:00PM - 12:30PM', 'talzg@gmail.com', 'Consultation', '1497852', 'amer'),
(39, '2023-12-23', '2023-12-23 15:18:04', '12:00PM - 12:30PM', 'talzg@gmail.com', 'Consultation', '1497852', 'amer'),
(40, '2023-12-23', '2023-12-23 15:18:21', '12:00PM - 12:30PM', 'talzg@gmail.com', 'Consultation', '1497852', 'amer'),
(41, '2023-12-23', '2023-12-23 15:18:51', '12:00PM - 12:30PM', 'talzg@gmail.com', 'Consultation', '1497852', 'amer'),
(42, '2023-12-23', '2023-12-23 15:19:30', '12:00PM - 12:30PM', 'talzg@gmail.com', 'Consultation', '1497852', 'amer'),
(43, '2023-12-23', '2023-12-23 15:19:44', '12:00PM - 12:30PM', 'talzg@gmail.com', 'Consultation', '1497852', 'amer'),
(44, '2023-12-23', '2023-12-23 15:19:57', '12:00PM - 12:30PM', 'talzg@gmail.com', 'Consultation', '1497852', 'amer'),
(45, '2023-12-23', '2023-12-23 15:20:13', '12:00PM - 12:30PM', 'talzg@gmail.com', 'Consultation', '1497852', 'amer'),
(46, '2023-12-23', '2023-12-23 15:20:38', '12:00PM - 12:30PM', 'talzg@gmail.com', 'Consultation', '1497852', 'amer'),
(47, '2023-12-23', '2023-12-23 15:21:22', '12:00PM - 12:30PM', 'talzg@gmail.com', 'Consultation', '1497852', 'amer'),
(48, '2023-12-23', '2023-12-23 15:21:34', '12:00PM - 12:30PM', 'talzg@gmail.com', 'Consultation', '1497852', 'amer'),
(49, '2023-12-23', '2023-12-23 15:21:56', '12:00PM - 12:30PM', 'talzg@gmail.com', 'Consultation', '1497852', 'amer'),
(50, '2023-12-23', '2023-12-23 15:22:46', '12:00PM - 12:30PM', 'talzg@gmail.com', 'Consultation', '1497852', 'amer'),
(51, '2023-12-23', '2023-12-23 15:23:10', '12:00PM - 12:30PM', 'talzg@gmail.com', 'Consultation', '1497852', 'amer'),
(52, '2023-12-23', '2023-12-23 15:24:00', '12:00PM - 12:30PM', 'talzg@gmail.com', 'Consultation', '1497852', 'amer'),
(53, '2023-12-23', '2023-12-23 15:24:15', '11:20AM - 11:50AM', 'talzg@gmail.com', 'Buying products', '05358954', 'wageeh'),
(54, '2023-12-27', '2023-12-27 20:40:46', '11:20AM - 11:50AM', 'talzg@gmail.com', 'Buying products', '0152', 'bmb'),
(55, '2023-12-29', '2023-12-29 12:04:18', '10:40AM - 11:10AM', 'talzg@gmail.com', 'Consultation', '025897', 'aden habm'),
(56, '2023-12-29', '2023-12-29 12:08:03', '10:40AM - 11:10AM', 'talzg@gmail.com', 'Consultation', '025897', 'aden habm'),
(57, '2023-12-29', '2023-12-29 12:08:12', '11:20AM - 11:50AM', 'talzg@gmail.com', 'Buying products', '0258972', 'עדן'),
(58, '2023-12-29', '2023-12-29 12:08:46', '11:20AM - 11:50AM', 'talzg@gmail.com', 'Buying products', '025897', 'עדן'),
(60, '2023-12-30', '2023-12-30 00:37:17', '15:20PM - 15:50PM', 'talzg@gmail.com', 'Consultation', 'hgfh', 'ggkjuj');

-- --------------------------------------------------------

--
-- מבנה טבלה עבור טבלה `orders`
--

CREATE TABLE `orders` (
  `id` int(11) NOT NULL,
  `user_email` varchar(255) DEFAULT NULL,
  `product_id` int(11) DEFAULT NULL,
  `order_number` int(11) DEFAULT NULL,
  `image` varchar(255) DEFAULT NULL,
  `name` varchar(255) DEFAULT NULL,
  `price` decimal(10,2) DEFAULT NULL,
  `qty` int(11) DEFAULT NULL,
  `date` datetime DEFAULT NULL,
  `pro_cat` varchar(255) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- הוצאת מידע עבור טבלה `orders`
--

INSERT INTO `orders` (`id`, `user_email`, `product_id`, `order_number`, `image`, `name`, `price`, `qty`, `date`, `pro_cat`) VALUES
(1, NULL, NULL, NULL, NULL, 'Carpet flooring', '140.00', 2, '2023-12-29 23:34:03', NULL),
(2, NULL, NULL, NULL, NULL, 'sdas', '0.00', 1, '2023-12-29 23:34:03', NULL),
(3, NULL, NULL, NULL, NULL, 'bhbjh', '0.00', 2, '2023-12-29 23:34:03', NULL),
(4, NULL, NULL, NULL, NULL, 'Bamboo flooring', '100.00', 1, '2023-12-29 23:34:03', NULL);

-- --------------------------------------------------------

--
-- מבנה טבלה עבור טבלה `product`
--

CREATE TABLE `product` (
  `id` int(11) NOT NULL,
  `name` varchar(250) NOT NULL,
  `image` varchar(1000) NOT NULL,
  `price` int(250) NOT NULL,
  `quantity` int(250) NOT NULL,
  `cat` varchar(250) NOT NULL,
  `detail` varchar(5000) NOT NULL,
  `sales_count` int(11) DEFAULT 0
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- הוצאת מידע עבור טבלה `product`
--

INSERT INTO `product` (`id`, `name`, `image`, `price`, `quantity`, `cat`, `detail`, `sales_count`) VALUES
(29, ' Laminate flooring', 'floor8.png', 120, 0, 'floor', '', 0),
(30, 'Rubber flooring', 'floor12.jpg', 170, 4, 'floor', '', 0),
(31, 'Natural stone flooring', 'floor13.jpg', 80, 0, 'floor', '', 0),
(32, 'Carpet flooring', 'floor15.jpg', 140, 32, 'floor', '', 0),
(33, ' Porcelain or ceramic tile flooring', 'floor11.jpg', 180, 0, 'floor', '', 0),
(34, 'Vinyl flooring', 'floor6.webp', 160, 7, 'floor', '', 0),
(35, 'Bamboo flooring', 'floor14.jpg', 100, 22, 'floor', '', 0),
(37, 'Cork flooring', 'floor10.png', 130, 14, 'floor', '', 0),
(43, 'Bambo Lamp', 'mnora7.jpeg', 230, 13, 'interior designer', '', 0),
(44, 'Flowers Lamp', 'mnora5.jpg', 1400, 19, 'interior designer', '', 0),
(45, 'Dreamy ', 'mnora8.jpg', 1570, 3, 'interior designer', '', 0),
(46, 'Sparkel & Shine', 'mnora1.jpg', 1650, 0, 'interior designer', '', 0),
(47, 'Universe', 'mnora9.webp', 1500, 15, 'interior designer', '', 0);

-- --------------------------------------------------------

--
-- מבנה טבלה עבור טבלה `sales`
--

CREATE TABLE `sales` (
  `id` int(11) NOT NULL,
  `product_id` int(11) DEFAULT NULL,
  `quantity` int(11) DEFAULT NULL,
  `sale_date` timestamp NOT NULL DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

-- --------------------------------------------------------

--
-- מבנה טבלה עבור טבלה `user`
--

CREATE TABLE `user` (
  `id` int(11) NOT NULL,
  `name` varchar(225) NOT NULL,
  `email` varchar(225) NOT NULL,
  `password` varchar(225) NOT NULL,
  `phone` int(10) NOT NULL,
  `status` varchar(100) NOT NULL,
  `lname` varchar(255) DEFAULT NULL,
  `fname` varchar(255) DEFAULT NULL,
  `gender` varchar(255) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- הוצאת מידע עבור טבלה `user`
--

INSERT INTO `user` (`id`, `name`, `email`, `password`, `phone`, `status`, `lname`, `fname`, `gender`) VALUES
(2, '', 'talzg@gmail.com', '123456', 9876543, 'verfied', 'habm', NULL, NULL),
(4, '', 'adenbar@gmail.com', 'adan123', 505661284, '', 'barakat', 'Aden', 'Female'),
(5, '', 'ayabar@gmail.com', 'aya11', 124886, 'verfied', 'bar', 'aya', 'Female');

--
-- Indexes for dumped tables
--

--
-- אינדקסים לטבלה `admin`
--
ALTER TABLE `admin`
  ADD PRIMARY KEY (`id`);

--
-- אינדקסים לטבלה `appointments`
--
ALTER TABLE `appointments`
  ADD PRIMARY KEY (`id`);

--
-- אינדקסים לטבלה `orders`
--
ALTER TABLE `orders`
  ADD PRIMARY KEY (`id`);

--
-- אינדקסים לטבלה `product`
--
ALTER TABLE `product`
  ADD PRIMARY KEY (`id`);

--
-- אינדקסים לטבלה `sales`
--
ALTER TABLE `sales`
  ADD PRIMARY KEY (`id`),
  ADD KEY `product_id` (`product_id`);

--
-- אינדקסים לטבלה `user`
--
ALTER TABLE `user`
  ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `admin`
--
ALTER TABLE `admin`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT for table `appointments`
--
ALTER TABLE `appointments`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=64;

--
-- AUTO_INCREMENT for table `orders`
--
ALTER TABLE `orders`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- AUTO_INCREMENT for table `product`
--
ALTER TABLE `product`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=52;

--
-- AUTO_INCREMENT for table `sales`
--
ALTER TABLE `sales`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `user`
--
ALTER TABLE `user`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;

--
-- הגבלות לטבלאות שהוצאו
--

--
-- הגבלות לטבלה `sales`
--
ALTER TABLE `sales`
  ADD CONSTRAINT `sales_ibfk_1` FOREIGN KEY (`product_id`) REFERENCES `product` (`id`);
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
