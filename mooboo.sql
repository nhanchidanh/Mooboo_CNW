-- phpMyAdmin SQL Dump
-- version 5.2.0
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Nov 07, 2022 at 05:10 AM
-- Server version: 10.4.24-MariaDB
-- PHP Version: 8.1.6

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `mooboo`
--

-- --------------------------------------------------------

--
-- Table structure for table `bill`
--

CREATE TABLE `bill` (
  `id` bigint(11) NOT NULL,
  `fullname` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `phone` varchar(15) COLLATE utf8_unicode_ci NOT NULL,
  `email` varchar(255) COLLATE utf8_unicode_ci DEFAULT NULL,
  `address` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `note` text COLLATE utf8_unicode_ci DEFAULT NULL,
  `total` varchar(255) COLLATE utf8_unicode_ci DEFAULT NULL,
  `status` varchar(255) COLLATE utf8_unicode_ci NOT NULL DEFAULT '0' COMMENT '0:đang duyệt 1:đang vận chuyển 2:đã giao hàng',
  `method` varchar(200) COLLATE utf8_unicode_ci NOT NULL,
  `user_id` int(11) DEFAULT NULL,
  `created_at` datetime NOT NULL,
  `updated_at` datetime DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Dumping data for table `bill`
--

INSERT INTO `bill` (`id`, `fullname`, `phone`, `email`, `address`, `note`, `total`, `status`, `method`, `user_id`, `created_at`, `updated_at`) VALUES
(15, 'Nhan Chi Danh', '0945115260', 'nhanchidanh@gmail.com', 'Hưng lợi Ninh Kiều Cần Thơ', 'cc', '2959000', '0', 'home-payment', 10, '2022-11-03 22:30:12', NULL),
(16, 'Nhan Chi Danh', '0945115260', 'nhanchidanh@gmail.com', 'Hưng lợi Ninh Kiều Cần Thơ', 'cc', '2959000', '0', 'home-payment', 10, '2022-11-03 22:50:16', NULL),
(18, 'Nhan Chi Danh2', '0894961521', 'nhanchidanh2@gmail.com', 'Hưng lợi Ninh Kiều Cần Thơ', 'hi', '7497000', '0', 'home-payment', 0, '2022-11-04 09:42:07', NULL);

-- --------------------------------------------------------

--
-- Table structure for table `category`
--

CREATE TABLE `category` (
  `id` int(11) NOT NULL,
  `name` varchar(200) COLLATE utf8_unicode_ci NOT NULL,
  `created_at` datetime NOT NULL,
  `updated_at` datetime DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Dumping data for table `category`
--

INSERT INTO `category` (`id`, `name`, `created_at`, `updated_at`) VALUES
(3, 'Bags', '2022-10-22 14:56:17', '2022-11-03 10:41:11'),
(4, 'Jackets', '2022-10-22 14:56:28', '2022-10-23 12:12:13'),
(6, 'Sneakers', '2022-10-22 14:57:00', '2022-10-23 12:12:18');

-- --------------------------------------------------------

--
-- Table structure for table `detail_bill`
--

CREATE TABLE `detail_bill` (
  `id` int(11) NOT NULL,
  `id_bill` bigint(11) NOT NULL,
  `id_pro` int(11) NOT NULL,
  `number` int(11) NOT NULL,
  `price` float NOT NULL,
  `total` int(11) NOT NULL,
  `image` text COLLATE utf8_unicode_ci NOT NULL,
  `name_pro` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `created_at` datetime NOT NULL,
  `updated_at` datetime DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Dumping data for table `detail_bill`
--

INSERT INTO `detail_bill` (`id`, `id_bill`, `id_pro`, `number`, `price`, `total`, `image`, `name_pro`, `created_at`, `updated_at`) VALUES
(21, 15, 19, 1, 2959000, 2959000, '16665037501654882770.png', 'Jordan Flight MVP', '2022-11-03 22:30:12', NULL),
(22, 16, 19, 1, 2959000, 2959000, '16665037501654882770.png', 'Jordan Flight MVP', '2022-11-03 22:50:16', NULL),
(25, 18, 9, 3, 2499000, 7497000, '16664989221943403164.png', 'Nike Blazer Low', '2022-11-04 09:42:07', NULL);

-- --------------------------------------------------------

--
-- Table structure for table `group_user`
--

CREATE TABLE `group_user` (
  `id` int(11) NOT NULL,
  `name` varchar(100) COLLATE utf8_unicode_ci NOT NULL,
  `created_at` datetime NOT NULL,
  `updated_at` datetime DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Dumping data for table `group_user`
--

INSERT INTO `group_user` (`id`, `name`, `created_at`, `updated_at`) VALUES
(1, 'Admin', '2022-10-21 05:14:46', '2022-10-21 05:14:46'),
(2, 'Client', '2022-10-21 05:14:46', '2022-10-21 05:14:46');

-- --------------------------------------------------------

--
-- Table structure for table `img_product`
--

CREATE TABLE `img_product` (
  `id` int(11) NOT NULL,
  `product_id` int(11) NOT NULL,
  `image` text COLLATE utf8_unicode_ci NOT NULL,
  `created_at` datetime DEFAULT NULL,
  `updated_at` datetime DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Dumping data for table `img_product`
--

INSERT INTO `img_product` (`id`, `product_id`, `image`, `created_at`, `updated_at`) VALUES
(71, 19, '1666532150290554957.png', '2022-10-23 20:35:50', NULL),
(72, 19, '1666532150590679368.png', '2022-10-23 20:35:50', NULL),
(73, 19, '16665321501073408373.png', '2022-10-23 20:35:50', NULL),
(74, 10, '1666532583636206673.png', '2022-10-23 20:43:03', NULL),
(75, 10, '1666532583737508747.png', '2022-10-23 20:43:03', NULL),
(76, 10, '1666532583420640433.png', '2022-10-23 20:43:03', NULL),
(77, 11, '16665326251836089218.png', '2022-10-23 20:43:45', NULL),
(78, 11, '1666532625538725137.png', '2022-10-23 20:43:45', NULL),
(79, 11, '16665326252098157282.png', '2022-10-23 20:43:45', NULL),
(80, 12, '1666532649750085556.png', '2022-10-23 20:44:09', NULL),
(81, 12, '1666532649999901959.png', '2022-10-23 20:44:09', NULL),
(82, 12, '16665326491611198297.png', '2022-10-23 20:44:09', NULL),
(83, 13, '1666532754694136132.png', '2022-10-23 20:45:54', NULL),
(84, 13, '1666532754298975587.png', '2022-10-23 20:45:54', NULL),
(85, 13, '1666532754139720840.png', '2022-10-23 20:45:54', NULL),
(86, 14, '16665327981241609268.png', '2022-10-23 20:46:38', NULL),
(87, 14, '16665327982071773637.png', '2022-10-23 20:46:38', NULL),
(88, 14, '1666532798220555586.png', '2022-10-23 20:46:38', NULL),
(89, 15, '16665328431304841391.png', '2022-10-23 20:47:23', NULL),
(90, 15, '1666532843595954329.png', '2022-10-23 20:47:23', NULL),
(91, 15, '1666532843124661285.png', '2022-10-23 20:47:23', NULL),
(92, 16, '16665328742002961426.png', '2022-10-23 20:47:54', NULL),
(93, 16, '16665328741309504543.png', '2022-10-23 20:47:54', NULL),
(94, 16, '16665328742009871674.png', '2022-10-23 20:47:54', NULL),
(95, 17, '16665328941253914282.png', '2022-10-23 20:48:14', NULL),
(96, 17, '1666532894793684998.png', '2022-10-23 20:48:14', NULL),
(97, 17, '1666532894741063559.png', '2022-10-23 20:48:14', NULL),
(98, 18, '16665334611720418473.0_2', '2022-10-23 20:57:41', NULL),
(99, 18, '1666533461892696028.0_3', '2022-10-23 20:57:41', NULL),
(100, 18, '16665334611196268602.0_4', '2022-10-23 20:57:41', NULL),
(101, 20, '1666533499905554440.png', '2022-10-23 20:58:19', NULL),
(102, 20, '1666533499582060439.png', '2022-10-23 20:58:19', NULL),
(103, 20, '16665334991308023472.png', '2022-10-23 20:58:19', NULL),
(104, 21, '16665335381111267568.png', '2022-10-23 20:58:58', NULL),
(105, 21, '16665335381557538172.png', '2022-10-23 20:58:58', NULL),
(106, 21, '1666533538585458514.png', '2022-10-23 20:58:58', NULL),
(107, 22, '16665342451732663422.Y', '2022-10-23 21:10:45', NULL),
(108, 22, '16665342451788198637.Y', '2022-10-23 21:10:45', NULL),
(109, 22, '16665342452087801073.Y', '2022-10-23 21:10:45', NULL),
(117, 24, '16675338081240268967.png', '2022-11-04 10:50:08', NULL),
(118, 24, '16675338081985295496.png', '2022-11-04 10:50:08', NULL),
(119, 24, '16675338081178205248.png', '2022-11-04 10:50:08', NULL),
(126, 9, '16676473492140119079.png', '2022-11-05 18:22:29', NULL),
(127, 9, '1667647349533352888.png', '2022-11-05 18:22:29', NULL),
(128, 9, '16676473491973775993.png', '2022-11-05 18:22:29', NULL);

-- --------------------------------------------------------

--
-- Table structure for table `product`
--

CREATE TABLE `product` (
  `id` int(11) NOT NULL,
  `name` varchar(200) COLLATE utf8_unicode_ci NOT NULL,
  `image` text COLLATE utf8_unicode_ci NOT NULL,
  `cate_id` int(11) NOT NULL,
  `price` float NOT NULL COMMENT 'vnd',
  `description` text COLLATE utf8_unicode_ci DEFAULT NULL,
  `view` int(11) NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Dumping data for table `product`
--

INSERT INTO `product` (`id`, `name`, `image`, `cate_id`, `price`, `description`, `view`, `created_at`, `updated_at`) VALUES
(9, 'Nike Blazer Low', '16664989221943403164.png', 6, 2499000, 'Praised for its classic simplicity and comfort, the Nike Blazer Low Platform elevates the hoops icon. The lifted midsole/outsole lets you step confidently while the upper keeps the proportions you loved from the original.', 40, '2022-10-23 04:22:02', '2022-11-05 11:22:29'),
(10, 'Nike Air Force 1', '166649940588764013.png', 6, 2649000, 'The radiance lives on in the Nike Air Force 1, the basketball original that puts a fresh spin on what you know best: durably stitched overlays, clean finishes and the perfect amount of flash to make you shine.', 30, '2022-10-23 04:30:05', '2022-10-23 13:43:03'),
(11, 'Air Jordan 1 Low SE', '1666500280976865117.png', 6, 2649000, 'Crafted with brilliance, this low-cut AJ1 brings a throwback hue synonymous with the 90s to an all-time classic silhouette.', 20, '2022-10-23 04:44:40', '2022-10-23 13:43:45'),
(12, 'Nike Air Max 97', '16665010511713578722.png', 6, 4999000, 'With an iconic design inspired by Japanese bullet trains and water droplets, push your style full speed ahead in the Air Max 97. Full-length Nike Air cushioning lets you ride in first-class comfort.', 10, '2022-10-23 04:57:31', '2022-10-23 13:44:09'),
(13, 'Nike Huarache Run', '16665015171701573176.png', 6, 2089000, 'The Nike Huarache Run is unmistakable.It is all about the famous Huarache heel strap—grab it and slide your foot right in.A snug bootie design helps keep everything secure and supported while you run, climb and play.', 50, '2022-10-23 05:05:17', '2022-10-23 13:45:54'),
(14, 'Nike Brasilia JDI', '1666502118873677059.png', 3, 1149000, 'Do not be fooled by its small size, this mini backpack has plenty of room. From zip pockets and water-bottle storage to comfy straps, it is perfect for daily adventures. Plus, the fluffy exterior keeps you looking and feeling cosy, even in colder temps.', 0, '2022-10-23 05:15:18', '2022-10-23 13:46:38'),
(15, 'Nike Heritage', '1666502523907779193.png', 3, 509000, 'The Nike Heritage Crossbody Bag gives you a durable design with multiple compartments to help keep you organised when you are out and about. An adjustable strap lets you customise your carrying experience.', 0, '2022-10-23 05:22:03', '2022-10-23 13:47:23'),
(16, 'Nike Academy Team', '1666502717784130372.png', 3, 1149000, 'The Nike Academy Team Backpack gives you spacious storage with designated pockets for your phone, laptop and ball. Padding on the straps and back panel lets you comfortably carry your gear.', 0, '2022-10-23 05:25:17', '2022-10-23 13:47:54'),
(17, 'Nike Kyrie', '1666503144408321939.png', 3, 2089000, 'With multiple zipped compartments, the Kyrie Backpack helps you stay organised while repping your favourite player. Just like Kyrie, this durable bag has a great handle … on your gear! There is also a laptop sleeve and an expandable cinched pocket for a water bottle.', 0, '2022-10-23 05:32:24', '2022-10-23 13:48:14'),
(18, 'Nike Hayward 2.0', '16665034802120446754.0_1', 3, 1789000, 'The Nike Hayward 2.0 Backpack combines simplicity and functionality with its sleek design and easy-to-access compartments. Its Ripstop fabric adds durability that will not weigh you down. Bungee cord detailing on the exterior provides quick storage for a shell or sneakers.', 0, '2022-10-23 05:38:00', '2022-10-23 13:57:41'),
(19, 'Jordan Flight MVP', '16665037501654882770.png', 4, 2959000, 'When autumn kicks in, this jacket will be your wardrobes MVP. Lightweight and water-repellent, it zips up to the mock neck collar for extra coverage. Its panel blocking is inspired by Jordan iconic Wings warm-up jacket—a subtle nod to His Airness.', 0, '2022-10-23 05:42:30', '2022-10-23 13:35:50'),
(20, 'Nike Windrunner', '1666504049896447869.png', 4, 2759000, 'The Nike Windrunner Jacket gets updated with water-repellent materials and a packable design.Vent details on the back and on the chevron help keep you cool when your run heats up.This product is made from at least 50% recycled polyester fibres.', 0, '2022-10-23 05:47:29', '2022-10-23 13:58:19'),
(21, 'Nike Dri-FIT', '16665043141206580090.png', 4, 1529000, 'Keep your team covered in the Nike Dri-FIT Jacket. Soft woven fabric uses sweat-wicking technology to help keep you covered, cool and comfortable. Customise the colours for your team signature look. This product is made from 100% recycled polyester fibres.', 0, '2022-10-23 05:51:54', '2022-10-23 13:58:58'),
(22, 'Nike Windrunner D.Y.E', '16665045502097412952.Y', 4, 3109000, 'We updated our classic Windrunner with graphics showing off your brain on exercise. It has the water-repellent and lightweight feel that keeps you going through wind and rain, plus it is packable so you can easily layer down. The jacket is part of the D.Y.E. collection, with artwork that shows how your brain feels after a solid workout.', 0, '2022-10-23 05:55:50', '2022-10-23 14:10:45'),
(24, 'Nike Life', '16675338081718696375.png', 4, 3109000, 'This chore coat design is inspired by the workwear worn by those who built the cities and streets we walk in today. Give a nod and pull on this all-purpose coat. It is got you covered.', 0, '2022-11-04 03:50:08', NULL);

-- --------------------------------------------------------

--
-- Table structure for table `users`
--

CREATE TABLE `users` (
  `id` int(11) NOT NULL,
  `name` varchar(200) COLLATE utf8_unicode_ci NOT NULL,
  `avatar` text COLLATE utf8_unicode_ci DEFAULT NULL,
  `gr_id` int(11) NOT NULL,
  `email` varchar(200) COLLATE utf8_unicode_ci NOT NULL,
  `password` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `phone` varchar(20) COLLATE utf8_unicode_ci NOT NULL,
  `address` text COLLATE utf8_unicode_ci NOT NULL,
  `description` text COLLATE utf8_unicode_ci DEFAULT NULL,
  `created_at` datetime NOT NULL,
  `updated_at` datetime NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Dumping data for table `users`
--

INSERT INTO `users` (`id`, `name`, `avatar`, `gr_id`, `email`, `password`, `phone`, `address`, `description`, `created_at`, `updated_at`) VALUES
(10, 'Nhan Chi Danh', '1667709909.jpg', 1, 'nhanchidanh@gmail.com', '$2y$10$l3JNSC6LfntqWnfWktDaZ.mOZAAPBPSgBXpeCzZu5.R3nEFhSMVvy', '0945115260', 'Đường 3/2, phường Hưng Lợi, quận Ninh Kiều, Cần Thơ', '', '2022-10-24 23:01:52', '2022-11-06 11:45:09'),
(11, 'Tran Minh', '1667643729.Y', 2, 'nhanchidanh2@gmail.com', '$2y$10$ew6M/8/..N.lh/Kk5P5gYeKg9M21dOAEtzGLfhtBGWPcY5ypJOf5K', '0894961521', '', '', '2022-10-24 23:03:17', '2022-11-05 17:55:25'),
(12, 'Vo Suongg', '1667445849.png', 2, 'nhanchidanh3@gmail.com', '$2y$10$Fla1gzU/psNTWYWB/7YGw.Ste3YfUTo2vkNwjZ16PsdBaFnfS6FnS', '', '', '', '2022-10-24 23:04:30', '2022-11-03 10:30:20'),
(13, 'Thảo Sương', '1667625389.Y', 2, 'maikhoi10112001@gmail.com', '$2y$10$X3Uc5z8mtdFak5gzYP3itOnDmrjC3caljq3x4GXpJFxreUOpBggtu', '0894961521', 'Tân Lược, Vĩnh Long', '', '2022-11-04 22:03:23', '2022-11-05 12:16:29');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `bill`
--
ALTER TABLE `bill`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `category`
--
ALTER TABLE `category`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `detail_bill`
--
ALTER TABLE `detail_bill`
  ADD PRIMARY KEY (`id`),
  ADD KEY `id_pro` (`id_pro`),
  ADD KEY `id_bill` (`id_bill`);

--
-- Indexes for table `group_user`
--
ALTER TABLE `group_user`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `img_product`
--
ALTER TABLE `img_product`
  ADD PRIMARY KEY (`id`),
  ADD KEY `product_id` (`product_id`);

--
-- Indexes for table `product`
--
ALTER TABLE `product`
  ADD PRIMARY KEY (`id`),
  ADD KEY `cat_id` (`cate_id`);

--
-- Indexes for table `users`
--
ALTER TABLE `users`
  ADD PRIMARY KEY (`id`),
  ADD KEY `gr_id` (`gr_id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `bill`
--
ALTER TABLE `bill`
  MODIFY `id` bigint(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=34;

--
-- AUTO_INCREMENT for table `category`
--
ALTER TABLE `category`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=7;

--
-- AUTO_INCREMENT for table `detail_bill`
--
ALTER TABLE `detail_bill`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=52;

--
-- AUTO_INCREMENT for table `group_user`
--
ALTER TABLE `group_user`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=23;

--
-- AUTO_INCREMENT for table `img_product`
--
ALTER TABLE `img_product`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=129;

--
-- AUTO_INCREMENT for table `product`
--
ALTER TABLE `product`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=25;

--
-- AUTO_INCREMENT for table `users`
--
ALTER TABLE `users`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=15;

--
-- Constraints for dumped tables
--

--
-- Constraints for table `detail_bill`
--
ALTER TABLE `detail_bill`
  ADD CONSTRAINT `detail_bill_ibfk_1` FOREIGN KEY (`id_bill`) REFERENCES `bill` (`id`);

--
-- Constraints for table `img_product`
--
ALTER TABLE `img_product`
  ADD CONSTRAINT `img_product_ibfk_1` FOREIGN KEY (`product_id`) REFERENCES `product` (`id`);

--
-- Constraints for table `product`
--
ALTER TABLE `product`
  ADD CONSTRAINT `product_ibfk_1` FOREIGN KEY (`cate_id`) REFERENCES `category` (`id`);

--
-- Constraints for table `users`
--
ALTER TABLE `users`
  ADD CONSTRAINT `users_ibfk_1` FOREIGN KEY (`gr_id`) REFERENCES `group_user` (`id`);
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
