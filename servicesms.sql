-- phpMyAdmin SQL Dump
-- version 4.7.7
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Aug 17, 2018 at 01:59 PM
-- Server version: 10.1.30-MariaDB
-- PHP Version: 7.2.2

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET AUTOCOMMIT = 0;
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `servicesms`
--

-- --------------------------------------------------------

--
-- Table structure for table `categories`
--

CREATE TABLE `categories` (
  `id` int(11) NOT NULL,
  `name` varchar(256) NOT NULL,
  `Incoming` int(11) NOT NULL,
  `Outgoing` int(11) NOT NULL,
  `description_eng` varchar(256) NOT NULL,
  `description_amh` varchar(256) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL,
  `date_created` datetime NOT NULL,
  `date_updated` datetime NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `categories`
--

INSERT INTO `categories` (`id`, `name`, `Incoming`, `Outgoing`, `description_eng`, `description_amh`, `date_created`, `date_updated`) VALUES
(1, 'Knowledge', 6, 7, 'Did we not have fun?', '', '2018-08-15 00:00:00', '2018-08-17 10:54:10'),
(2, 'Amharic', 7, 3, 'Kene, teret ena mesale', '', '2018-08-15 00:00:00', '2018-08-15 07:12:12'),
(3, 'Quotes', 4, 5, 'Quotes by famous people', '', '0000-00-00 00:00:00', '0000-00-00 00:00:00');

-- --------------------------------------------------------

--
-- Table structure for table `contacts`
--

CREATE TABLE `contacts` (
  `id` int(11) NOT NULL,
  `name` varchar(256) NOT NULL,
  `email` varchar(255) DEFAULT NULL,
  `number` varchar(256) NOT NULL,
  `status` int(11) NOT NULL,
  `notification_date` datetime NOT NULL DEFAULT CURRENT_TIMESTAMP,
  `date_created` datetime NOT NULL DEFAULT CURRENT_TIMESTAMP,
  `date_updated` datetime NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `contacts`
--

INSERT INTO `contacts` (`id`, `name`, `email`, `number`, `status`, `notification_date`, `date_created`, `date_updated`) VALUES
(3, 'Abebe', NULL, '0911452365', 0, '2018-08-15 11:30:05', '2018-08-07 02:36:23', '0000-00-00 00:00:00'),
(4, 'Home', NULL, '0115236589', 0, '2018-08-15 11:30:05', '2018-08-07 02:38:13', '0000-00-00 00:00:00'),
(7, 'Kebede', NULL, '0945262325', 0, '2018-08-15 11:30:05', '2018-08-07 02:45:01', '2018-08-09 00:37:22'),
(8, 'TiTi', NULL, '0901917390', 0, '2018-08-15 11:30:05', '2018-08-09 01:40:18', '0000-00-00 00:00:00'),
(9, 'Beyene Mola', NULL, '0954123658', 0, '2018-08-15 11:30:05', '2018-08-09 09:02:27', '0000-00-00 00:00:00'),
(10, 'Belete', NULL, '0965214563', 0, '2018-08-15 11:30:05', '2018-08-09 09:04:48', '0000-00-00 00:00:00');

-- --------------------------------------------------------

--
-- Table structure for table `messages`
--

CREATE TABLE `messages` (
  `id` int(11) NOT NULL,
  `cat_id` int(11) NOT NULL,
  `message` varchar(5000) CHARACTER SET utf8 COLLATE utf8_unicode_ci NOT NULL,
  `created_by` varchar(256) NOT NULL,
  `status` varchar(256) NOT NULL DEFAULT 'Not Tested',
  `date_tested` datetime NOT NULL,
  `date_created` datetime NOT NULL,
  `date_updated` datetime NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `messages`
--

INSERT INTO `messages` (`id`, `cat_id`, `message`, `created_by`, `status`, `date_tested`, `date_created`, `date_updated`) VALUES
(1, 2, 'Zoro zoro megbiyaw cheraro', '', 'Not Tested', '0000-00-00 00:00:00', '2018-08-15 06:59:45', '0000-00-00 00:00:00'),
(2, 3, 'To live is to suffer. To survive is to find meaning in suffering', '4', 'Not Tested', '0000-00-00 00:00:00', '2018-08-15 07:09:44', '0000-00-00 00:00:00'),
(3, 1, 'An ant can carry 4 times its weight', '4', 'Not Tested', '0000-00-00 00:00:00', '2018-08-15 07:10:24', '0000-00-00 00:00:00'),
(4, 2, 'Ethiopia hagere mogn nesh telala \r\nyemotelesh kerto yegedelesh bela', '4', 'Not Tested', '0000-00-00 00:00:00', '2018-08-15 07:11:20', '0000-00-00 00:00:00'),
(5, 3, 'Take it one day at a time', '1', 'Not Tested', '0000-00-00 00:00:00', '2018-08-15 07:13:11', '0000-00-00 00:00:00'),
(6, 2, 'Yesew Hodu \r\nyewef wendu aytawekem', '1', 'Sent', '2018-08-15 07:14:47', '2018-08-15 07:14:25', '2018-08-15 07:15:01'),
(7, 2, 'Yekotun awerd bela yebibitwan talech\r\n', '1', 'Not Tested', '0000-00-00 00:00:00', '2018-08-15 07:16:50', '0000-00-00 00:00:00'),
(8, 2, 'Metlebsew yelat metekenanebew amarat', '1', 'Tested', '2018-08-15 07:23:14', '2018-08-15 07:22:14', '2018-08-15 07:23:14'),
(9, 2, 'Bemetenu Memegeb\r\n\r\n\r\n', '8', 'Sent', '2018-08-17 05:50:41', '2018-08-17 05:50:13', '2018-08-17 05:51:10');

-- --------------------------------------------------------

--
-- Table structure for table `roles`
--

CREATE TABLE `roles` (
  `id` int(11) NOT NULL,
  `name` varchar(256) NOT NULL,
  `status` varchar(256) NOT NULL,
  `date_created` datetime NOT NULL,
  `user_category` varchar(256) NOT NULL DEFAULT 'client'
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `roles`
--

INSERT INTO `roles` (`id`, `name`, `status`, `date_created`, `user_category`) VALUES
(1, 'General Knowledge', 'active', '2018-08-15 10:15:00', 'client'),
(2, 'Qene', 'Active', '2018-08-14 12:14:52', 'client'),
(3, 'Teret ena Mesale', 'Active', '2018-08-06 14:45:45', 'admin'),
(4, 'Famous Quotes', 'active', '2018-08-15 11:25:11', 'admin'),
(5, 'Enqokelesh', 'active', '2018-08-07 00:40:00', 'client'),
(6, 'Enqokelesh', 'active', '2018-08-15 13:24:25', 'admin');

-- --------------------------------------------------------

--
-- Table structure for table `role_groups`
--

CREATE TABLE `role_groups` (
  `id` int(11) NOT NULL,
  `name` varchar(256) NOT NULL,
  `description` varchar(256) NOT NULL,
  `date_created` datetime NOT NULL,
  `date_updated` datetime NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `role_groups`
--

INSERT INTO `role_groups` (`id`, `name`, `description`, `date_created`, `date_updated`) VALUES
(1, 'Amharic', 'controls all amharic related services', '2018-08-13 20:22:44', '0000-00-00 00:00:00'),
(2, 'Knowledge', 'handles all knowledge related services', '2018-08-06 06:36:20', '0000-00-00 00:00:00'),
(3, 'Quotes', '', '2018-08-13 00:27:19', '0000-00-00 00:00:00'),
(4, 'Language and Info', '', '2018-08-15 00:24:23', '0000-00-00 00:00:00'),
(5, 'All Services', '', '2018-08-17 05:47:30', '0000-00-00 00:00:00');

-- --------------------------------------------------------

--
-- Table structure for table `role_permissions`
--

CREATE TABLE `role_permissions` (
  `id` int(11) NOT NULL,
  `role_id` int(11) NOT NULL,
  `role_group_id` int(11) NOT NULL,
  `date_created` datetime NOT NULL,
  `date_updated` datetime NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `role_permissions`
--

INSERT INTO `role_permissions` (`id`, `role_id`, `role_group_id`, `date_created`, `date_updated`) VALUES
(1, 2, 1, '2018-08-15 17:20:00', '0000-00-00 00:00:00'),
(2, 4, 3, '2018-08-15 00:24:28', '0000-00-00 00:00:00'),
(3, 3, 1, '2018-08-15 00:18:24', '0000-00-00 00:00:00'),
(4, 5, 4, '2018-08-15 17:19:37', '0000-00-00 00:00:00'),
(5, 2, 1, '2018-08-01 12:00:00', '0000-00-00 00:00:00'),
(6, 2, 4, '2018-08-15 06:20:25', '0000-00-00 00:00:00'),
(7, 4, 4, '2018-08-20 00:00:00', '0000-00-00 00:00:00'),
(8, 1, 5, '2018-08-17 05:47:30', '0000-00-00 00:00:00'),
(9, 2, 5, '2018-08-17 05:47:30', '0000-00-00 00:00:00'),
(10, 5, 5, '2018-08-17 05:47:30', '0000-00-00 00:00:00');

-- --------------------------------------------------------

--
-- Table structure for table `services`
--

CREATE TABLE `services` (
  `id` int(11) NOT NULL,
  `name` varchar(256) NOT NULL,
  `description` varchar(5000) CHARACTER SET utf8 COLLATE utf8_unicode_ci NOT NULL,
  `amharic_name` varchar(256) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL,
  `ser_cat` int(11) NOT NULL,
  `subscription_code` varchar(256) NOT NULL,
  `unsubscription_code` varchar(256) NOT NULL,
  `date_created` datetime NOT NULL,
  `date_updated` datetime NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `services`
--

INSERT INTO `services` (`id`, `name`, `description`, `amharic_name`, `ser_cat`, `subscription_code`, `unsubscription_code`, `date_created`, `date_updated`) VALUES
(1, 'General Knowledge', '', '', 1, 'OK', 'Bye', '2018-08-15 00:00:00', '0000-00-00 00:00:00'),
(2, 'Qene', '', '', 2, 'Sub', 'UnSub', '2018-08-15 07:20:00', '0000-00-00 00:00:00'),
(3, 'Teret ena Mesale', '', '', 2, 'Eshi', 'Enbi', '2018-08-15 08:32:14', '0000-00-00 00:00:00'),
(4, 'Enqokelesh', '', '', 2, 'sure', 'enough', '2018-08-15 07:12:09', '0000-00-00 00:00:00'),
(5, 'Famous Quotes', 'OK', 'Not OK', 3, '', '', '2018-08-15 11:07:18', '0000-00-00 00:00:00');

-- --------------------------------------------------------

--
-- Table structure for table `short_numbers`
--

CREATE TABLE `short_numbers` (
  `id` int(11) NOT NULL,
  `type` varchar(256) NOT NULL,
  `number` int(11) NOT NULL,
  `date_created` datetime NOT NULL,
  `date_updated` datetime NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `short_numbers`
--

INSERT INTO `short_numbers` (`id`, `type`, `number`, `date_created`, `date_updated`) VALUES
(3, 'Free', 8400, '2018-08-08 09:00:58', '0000-00-00 00:00:00'),
(4, 'Free', 8746, '2018-08-09 02:09:22', '0000-00-00 00:00:00'),
(5, 'paid alittle', 874, '2018-08-09 02:10:36', '2018-08-09 02:11:53'),
(6, 'Paid', 8431, '2018-08-15 00:00:00', '0000-00-00 00:00:00'),
(7, 'Free', 8010, '2018-08-15 00:00:00', '0000-00-00 00:00:00');

-- --------------------------------------------------------

--
-- Table structure for table `subscriptions`
--

CREATE TABLE `subscriptions` (
  `id` int(11) NOT NULL,
  `sub_contact` int(11) NOT NULL,
  `sub_service` int(11) NOT NULL,
  `sub_cat` int(11) NOT NULL,
  `date_created` datetime NOT NULL,
  `date_updated` datetime NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `subscriptions`
--

INSERT INTO `subscriptions` (`id`, `sub_contact`, `sub_service`, `sub_cat`, `date_created`, `date_updated`) VALUES
(6, 7, 4, 2, '2018-08-13 15:14:00', '0000-00-00 00:00:00'),
(7, 4, 1, 1, '2018-08-13 15:17:12', '0000-00-00 00:00:00'),
(8, 8, 5, 3, '2018-08-08 06:33:14', '0000-00-00 00:00:00'),
(9, 9, 3, 2, '2018-08-15 08:00:13', '0000-00-00 00:00:00'),
(10, 10, 1, 1, '2018-08-15 11:10:28', '0000-00-00 00:00:00'),
(11, 7, 4, 2, '2018-08-15 13:10:30', '0000-00-00 00:00:00');

-- --------------------------------------------------------

--
-- Table structure for table `users_management`
--

CREATE TABLE `users_management` (
  `id` int(11) NOT NULL,
  `name` varchar(256) NOT NULL,
  `user_name` varchar(256) NOT NULL,
  `password` varchar(256) NOT NULL,
  `role_group` varchar(256) NOT NULL,
  `user_category` varchar(256) NOT NULL DEFAULT 'client',
  `status` varchar(256) NOT NULL,
  `date_created` datetime NOT NULL,
  `date_updated` datetime NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `users_management`
--

INSERT INTO `users_management` (`id`, `name`, `user_name`, `password`, `role_group`, `user_category`, `status`, `date_created`, `date_updated`) VALUES
(1, 'Marsha Croatians', 'MarshaCros', 'e10adc3949ba59abbe56e057f20f883e\r\n', '4', 'client', 'active', '2018-08-10 22:23:13', '2018-08-14 01:17:10'),
(4, 'Rahel Zewde', 'rahelEZ', 'e10adc3949ba59abbe56e057f20f883e ', '7', 'admin', 'active', '2018-08-14 03:36:39', '0000-00-00 00:00:00'),
(7, 'Abebe Kebede', 'AbebeK', 'e10adc3949ba59abbe56e057f20f883e ', '1', 'client', 'active', '2018-08-17 05:39:48', '0000-00-00 00:00:00'),
(8, 'Chala Bekele', 'ChalaK', 'e10adc3949ba59abbe56e057f20f883e ', '5', 'client', 'active', '2018-08-17 05:48:45', '0000-00-00 00:00:00'),
(9, 'Ribka Ermias', 'kukuER', 'e10adc3949ba59abbe56e057f20f883e', '3', 'admin', 'active', '2018-08-17 12:11:41', '0000-00-00 00:00:00');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `categories`
--
ALTER TABLE `categories`
  ADD KEY `id` (`id`),
  ADD KEY `Incoming` (`Incoming`),
  ADD KEY `Outgoing` (`Outgoing`);

--
-- Indexes for table `contacts`
--
ALTER TABLE `contacts`
  ADD KEY `id` (`id`);

--
-- Indexes for table `messages`
--
ALTER TABLE `messages`
  ADD KEY `id` (`id`),
  ADD KEY `cat_id` (`cat_id`);

--
-- Indexes for table `roles`
--
ALTER TABLE `roles`
  ADD KEY `id` (`id`);

--
-- Indexes for table `role_groups`
--
ALTER TABLE `role_groups`
  ADD KEY `id` (`id`);

--
-- Indexes for table `role_permissions`
--
ALTER TABLE `role_permissions`
  ADD KEY `id` (`id`),
  ADD KEY `role_group_id` (`role_group_id`),
  ADD KEY `role_id` (`role_id`);

--
-- Indexes for table `services`
--
ALTER TABLE `services`
  ADD KEY `id` (`id`),
  ADD KEY `ser_cat` (`ser_cat`);

--
-- Indexes for table `short_numbers`
--
ALTER TABLE `short_numbers`
  ADD KEY `id` (`id`);

--
-- Indexes for table `subscriptions`
--
ALTER TABLE `subscriptions`
  ADD KEY `id` (`id`),
  ADD KEY `sub_cat` (`sub_cat`),
  ADD KEY `sub_contact` (`sub_contact`),
  ADD KEY `sub_service` (`sub_service`);

--
-- Indexes for table `users_management`
--
ALTER TABLE `users_management`
  ADD KEY `id` (`id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `categories`
--
ALTER TABLE `categories`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT for table `contacts`
--
ALTER TABLE `contacts`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=11;

--
-- AUTO_INCREMENT for table `messages`
--
ALTER TABLE `messages`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=10;

--
-- AUTO_INCREMENT for table `roles`
--
ALTER TABLE `roles`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=7;

--
-- AUTO_INCREMENT for table `role_groups`
--
ALTER TABLE `role_groups`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;

--
-- AUTO_INCREMENT for table `role_permissions`
--
ALTER TABLE `role_permissions`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=11;

--
-- AUTO_INCREMENT for table `services`
--
ALTER TABLE `services`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;

--
-- AUTO_INCREMENT for table `short_numbers`
--
ALTER TABLE `short_numbers`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=8;

--
-- AUTO_INCREMENT for table `subscriptions`
--
ALTER TABLE `subscriptions`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=12;

--
-- AUTO_INCREMENT for table `users_management`
--
ALTER TABLE `users_management`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=10;

--
-- Constraints for dumped tables
--

--
-- Constraints for table `categories`
--
ALTER TABLE `categories`
  ADD CONSTRAINT `categories_ibfk_1` FOREIGN KEY (`Incoming`) REFERENCES `short_numbers` (`id`) ON DELETE CASCADE,
  ADD CONSTRAINT `categories_ibfk_2` FOREIGN KEY (`Outgoing`) REFERENCES `short_numbers` (`id`) ON DELETE CASCADE;

--
-- Constraints for table `messages`
--
ALTER TABLE `messages`
  ADD CONSTRAINT `messages_ibfk_1` FOREIGN KEY (`cat_id`) REFERENCES `categories` (`id`) ON DELETE CASCADE;

--
-- Constraints for table `role_permissions`
--
ALTER TABLE `role_permissions`
  ADD CONSTRAINT `role_permissions_ibfk_1` FOREIGN KEY (`role_group_id`) REFERENCES `role_groups` (`id`) ON DELETE CASCADE,
  ADD CONSTRAINT `role_permissions_ibfk_2` FOREIGN KEY (`role_id`) REFERENCES `roles` (`id`) ON DELETE CASCADE;

--
-- Constraints for table `services`
--
ALTER TABLE `services`
  ADD CONSTRAINT `services_ibfk_1` FOREIGN KEY (`ser_cat`) REFERENCES `categories` (`id`) ON DELETE CASCADE;

--
-- Constraints for table `subscriptions`
--
ALTER TABLE `subscriptions`
  ADD CONSTRAINT `subscriptions_ibfk_1` FOREIGN KEY (`sub_cat`) REFERENCES `categories` (`id`) ON DELETE CASCADE,
  ADD CONSTRAINT `subscriptions_ibfk_2` FOREIGN KEY (`sub_contact`) REFERENCES `contacts` (`id`) ON DELETE CASCADE,
  ADD CONSTRAINT `subscriptions_ibfk_3` FOREIGN KEY (`sub_service`) REFERENCES `services` (`id`) ON DELETE CASCADE;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
