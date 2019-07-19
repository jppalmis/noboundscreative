-- phpMyAdmin SQL Dump
-- version 4.8.5
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Jul 19, 2019 at 04:06 AM
-- Server version: 10.1.39-MariaDB
-- PHP Version: 7.3.5

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET AUTOCOMMIT = 0;
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `database_noboundscreative_ci`
--

-- --------------------------------------------------------

--
-- Table structure for table `tbl_concerns`
--

CREATE TABLE `tbl_concerns` (
  `concern_id` int(11) NOT NULL,
  `firstname` varchar(64) NOT NULL,
  `lastname` varchar(64) NOT NULL,
  `email` varchar(64) NOT NULL,
  `subject` varchar(128) NOT NULL,
  `message` text NOT NULL,
  `ip_address` varchar(32) NOT NULL,
  `user_agent` varchar(256) NOT NULL,
  `created_at` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `tbl_concerns`
--

INSERT INTO `tbl_concerns` (`concern_id`, `firstname`, `lastname`, `email`, `subject`, `message`, `ip_address`, `user_agent`, `created_at`) VALUES
(1, 'asdsad', 'asdsada', 'asdsad@fasdsa.xom', 'asdsad', 'fdfdgfdgdfsgfsdg', '', '', '2019-06-12 05:55:32');

-- --------------------------------------------------------

--
-- Table structure for table `tbl_frontend_request`
--

CREATE TABLE `tbl_frontend_request` (
  `id` int(11) NOT NULL,
  `business_name` varchar(256) COLLATE utf8_unicode_ci NOT NULL,
  `business_email` varchar(64) COLLATE utf8_unicode_ci NOT NULL,
  `what_do_they_do` varchar(256) COLLATE utf8_unicode_ci NOT NULL,
  `target_customers` varchar(256) COLLATE utf8_unicode_ci NOT NULL,
  `product_services_reason` varchar(256) COLLATE utf8_unicode_ci NOT NULL,
  `payment_method` varchar(256) COLLATE utf8_unicode_ci NOT NULL,
  `help_needed` varchar(256) COLLATE utf8_unicode_ci NOT NULL,
  `ip_address` varchar(32) COLLATE utf8_unicode_ci NOT NULL,
  `location` varchar(256) COLLATE utf8_unicode_ci NOT NULL,
  `user_agent` varchar(256) COLLATE utf8_unicode_ci NOT NULL,
  `created_at` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP,
  `updated_at` varchar(64) COLLATE utf8_unicode_ci NOT NULL
) ENGINE=MyISAM DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Dumping data for table `tbl_frontend_request`
--

INSERT INTO `tbl_frontend_request` (`id`, `business_name`, `business_email`, `what_do_they_do`, `target_customers`, `product_services_reason`, `payment_method`, `help_needed`, `ip_address`, `location`, `user_agent`, `created_at`, `updated_at`) VALUES
(11, 'Globe At Home', 'globe@gmail.com', 'prepaid wifi', 'mga pinoy na walang net', 'abot mo ang mundo', 'Paypal', 'Social Media Management', '', '', '', '2019-06-30 12:19:06', '2019-07-06 16:13:25'),
(8, 'no bounds creative services', 'nbcs@gmail.com', 'social media marketing and web dev', 'canadians', 'we the best', 'Cash', 'Social Media Management', '', '', '', '2019-06-30 12:04:27', '2019-07-06 16:13:25'),
(14, 'Tea-napa', 'teanapa@gmail.com', 'milk tea and tinapa', 'adik sa milk tea', 'sweet and salty', 'paymaya', 'wala na po', '', '', '', '2019-07-06 11:22:07', '2019-07-06 16:34:32');

-- --------------------------------------------------------

--
-- Table structure for table `tbl_users`
--

CREATE TABLE `tbl_users` (
  `user_id` int(11) NOT NULL,
  `username` varchar(64) NOT NULL,
  `password` varchar(128) NOT NULL,
  `firstname` varchar(64) NOT NULL,
  `lastname` varchar(64) NOT NULL,
  `email` varchar(64) NOT NULL,
  `contact` varchar(16) NOT NULL,
  `street` varchar(64) NOT NULL,
  `city` varchar(64) NOT NULL,
  `province` varchar(64) NOT NULL,
  `state` varchar(8) NOT NULL,
  `state_full` varchar(64) NOT NULL,
  `zipcode` varchar(16) NOT NULL,
  `role` tinyint(4) NOT NULL,
  `created_at` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP,
  `updated_at` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP,
  `status` varchar(16) NOT NULL,
  `avatar` varchar(64) NOT NULL DEFAULT 'user_image.jpg'
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `tbl_users`
--

INSERT INTO `tbl_users` (`user_id`, `username`, `password`, `firstname`, `lastname`, `email`, `contact`, `street`, `city`, `province`, `state`, `state_full`, `zipcode`, `role`, `created_at`, `updated_at`, `status`, `avatar`) VALUES
(1, 'admin', '21232f297a57a5a743894a0e4a801fc3', 'JP', 'Palmis', 'jppalmis@gmail.com', '09567899108', '3079  Maynard Rd', 'Calgary', 'Alberta', '', '', 'T2E 6J8', 1, '2019-05-24 14:01:58', '2019-05-24 14:01:58', 'active', 'user_image.jpg'),
(12, 'ivy', '95d3b3e1cf31a1b528cf82463bf2b200', 'Ivy', 'Capundag', 'ivycapundag@gmail.com', '09567899108', '3403  Reynolds Alley', 'Los Angeles', '', 'CA', 'California', '90017', 2, '2019-06-26 07:39:00', '2019-06-26 07:39:00', 'active', 'user_image.jpg'),
(14, 'nobounds', 'f098e321056b385ef14a9ee2ecb39333', 'nobounds', 'creative services', 'nbcs@gmail.com', '68986867', '', '', '', '', '', '', 3, '2019-07-07 10:09:52', '2019-07-07 10:09:52', '', 'user_image.jpg');

-- --------------------------------------------------------

--
-- Table structure for table `tbl_user_roles`
--

CREATE TABLE `tbl_user_roles` (
  `role_id` int(11) NOT NULL,
  `role` varchar(32) NOT NULL,
  `role_display_name` varchar(32) NOT NULL,
  `created_at` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP,
  `updated_at` varchar(32) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `tbl_user_roles`
--

INSERT INTO `tbl_user_roles` (`role_id`, `role`, `role_display_name`, `created_at`, `updated_at`) VALUES
(1, 'superadmin', 'Super Administrator', '2019-07-07 07:36:50', ''),
(2, 'admin', 'Administrator', '2019-07-07 07:36:50', ''),
(3, 'user', 'Nomar User', '2019-07-07 07:38:01', '');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `tbl_concerns`
--
ALTER TABLE `tbl_concerns`
  ADD PRIMARY KEY (`concern_id`);

--
-- Indexes for table `tbl_frontend_request`
--
ALTER TABLE `tbl_frontend_request`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `tbl_users`
--
ALTER TABLE `tbl_users`
  ADD PRIMARY KEY (`user_id`);

--
-- Indexes for table `tbl_user_roles`
--
ALTER TABLE `tbl_user_roles`
  ADD PRIMARY KEY (`role_id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `tbl_concerns`
--
ALTER TABLE `tbl_concerns`
  MODIFY `concern_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT for table `tbl_frontend_request`
--
ALTER TABLE `tbl_frontend_request`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=15;

--
-- AUTO_INCREMENT for table `tbl_users`
--
ALTER TABLE `tbl_users`
  MODIFY `user_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=15;

--
-- AUTO_INCREMENT for table `tbl_user_roles`
--
ALTER TABLE `tbl_user_roles`
  MODIFY `role_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
