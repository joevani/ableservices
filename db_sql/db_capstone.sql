-- phpMyAdmin SQL Dump
-- version 4.8.3
-- https://www.phpmyadmin.net/
--
-- Host: localhost
-- Generation Time: May 04, 2019 at 11:27 AM
-- Server version: 10.1.37-MariaDB
-- PHP Version: 7.2.12

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET AUTOCOMMIT = 0;
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `capstone`
--

-- --------------------------------------------------------

--
-- Table structure for table `categories`
--

CREATE TABLE `categories` (
  `id` int(10) UNSIGNED NOT NULL,
  `name` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Dumping data for table `categories`
--

INSERT INTO `categories` (`id`, `name`, `created_at`, `updated_at`) VALUES
(1, 'Lack of Manpower', NULL, NULL),
(2, 'Lack of Equipment', NULL, NULL),
(3, 'Client Feedback', NULL, NULL);

-- --------------------------------------------------------

--
-- Table structure for table `chat`
--

CREATE TABLE `chat` (
  `id` int(10) UNSIGNED NOT NULL,
  `from_user` int(10) UNSIGNED NOT NULL,
  `to_user` int(10) UNSIGNED NOT NULL,
  `message` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `status` int(11) NOT NULL,
  `created_at` timestamp NULL DEFAULT CURRENT_TIMESTAMP,
  `updated_at` timestamp NULL DEFAULT CURRENT_TIMESTAMP
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Dumping data for table `chat`
--

INSERT INTO `chat` (`id`, `from_user`, `to_user`, `message`, `status`, `created_at`, `updated_at`) VALUES
(7, 1, 35, 'Test', 0, '2019-04-28 23:34:46', '2019-04-28 23:34:46'),
(8, 1, 35, 'WAHAHA', 0, '2019-04-28 23:42:21', '2019-04-28 23:42:21'),
(9, 1, 16, 'sdsd', 0, '2019-05-02 09:17:14', '2019-05-02 09:17:14'),
(10, 1, 36, 'okay', 0, '2019-05-02 09:41:08', '2019-05-02 09:41:08'),
(11, 1, 36, 'Okay', 0, '2019-05-02 09:41:33', '2019-05-02 09:41:33');

-- --------------------------------------------------------

--
-- Table structure for table `comments`
--

CREATE TABLE `comments` (
  `id` int(10) UNSIGNED NOT NULL,
  `ticket_id` int(10) UNSIGNED NOT NULL,
  `user_id` int(10) UNSIGNED NOT NULL,
  `comment` text COLLATE utf8_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Dumping data for table `comments`
--

INSERT INTO `comments` (`id`, `ticket_id`, `user_id`, `comment`, `created_at`, `updated_at`) VALUES
(1, 1, 23, 'Okay', '2019-04-22 23:17:02', '2019-04-22 23:17:02'),
(2, 1, 1, 'Test', '2019-04-22 23:37:05', '2019-04-22 23:37:05'),
(3, 2, 24, 'Okay', '2019-04-23 01:34:43', '2019-04-23 01:34:43'),
(4, 2, 23, 'How you doin ?', '2019-04-23 01:35:08', '2019-04-23 01:35:08'),
(5, 4, 1, 'Okay', '2019-04-27 16:16:04', '2019-04-27 16:16:04'),
(6, 5, 1, 'Hello', '2019-04-27 16:30:31', '2019-04-27 16:30:31'),
(7, 5, 32, 'Hi', '2019-04-27 16:30:43', '2019-04-27 16:30:43');

-- --------------------------------------------------------

--
-- Table structure for table `feedbacks`
--

CREATE TABLE `feedbacks` (
  `id` int(11) NOT NULL,
  `user_id` int(11) NOT NULL,
  `subject` varchar(255) NOT NULL,
  `content` text NOT NULL,
  `created_at` timestamp NULL DEFAULT CURRENT_TIMESTAMP,
  `is_read` int(11) NOT NULL DEFAULT '0'
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `feedbacks`
--

INSERT INTO `feedbacks` (`id`, `user_id`, `subject`, `content`, `created_at`, `is_read`) VALUES
(1, 17, 'dsd', 'sdsd', '2019-04-27 11:04:36', 0),
(2, 25, 'dd', 'dfd', '2019-04-27 12:03:32', 0);

-- --------------------------------------------------------

--
-- Table structure for table `locations`
--

CREATE TABLE `locations` (
  `id` int(11) NOT NULL,
  `company` varchar(225) NOT NULL,
  `location` varchar(225) NOT NULL,
  `create_at` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP,
  `updated_at` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `locations`
--

INSERT INTO `locations` (`id`, `company`, `location`, `create_at`, `updated_at`) VALUES
(1, 'SM City Cebu', 'location here sdf', '2019-04-27 15:31:39', '2019-04-27 16:15:46'),
(2, 'Okasd', 'SM City Cebu', '2019-04-27 15:55:43', '2019-04-27 16:16:01');

-- --------------------------------------------------------

--
-- Table structure for table `location_assigment`
--

CREATE TABLE `location_assigment` (
  `id` int(11) NOT NULL,
  `location_id` int(11) NOT NULL,
  `user_id` int(11) NOT NULL,
  `created_at` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP,
  `updated_at` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `location_assigment`
--

INSERT INTO `location_assigment` (`id`, `location_id`, `user_id`, `created_at`, `updated_at`) VALUES
(2, 2, 23, '2019-04-27 17:39:04', '2019-04-27 17:39:04'),
(3, 2, 30, '2019-04-27 23:25:56', '2019-04-27 23:25:56');

-- --------------------------------------------------------

--
-- Table structure for table `memo`
--

CREATE TABLE `memo` (
  `id` int(11) NOT NULL,
  `user_id` int(11) NOT NULL,
  `subject` varchar(255) NOT NULL,
  `content` text NOT NULL,
  `created_at` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP,
  `created_by` int(11) NOT NULL,
  `is_read` int(11) NOT NULL DEFAULT '0'
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `memo`
--

INSERT INTO `memo` (`id`, `user_id`, `subject`, `content`, `created_at`, `created_by`, `is_read`) VALUES
(1, 17, 'dsd', 'sdsd', '2019-04-27 11:04:36', 1, 0),
(2, 25, 'oka', 'dfdf', '2019-04-27 12:03:07', 1, 0);

-- --------------------------------------------------------

--
-- Table structure for table `migrations`
--

CREATE TABLE `migrations` (
  `id` int(10) UNSIGNED NOT NULL,
  `migration` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `batch` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Dumping data for table `migrations`
--

INSERT INTO `migrations` (`id`, `migration`, `batch`) VALUES
(1, '2014_10_12_000000_create_users_table', 1),
(2, '2014_10_12_100000_create_password_resets_table', 1),
(3, '2019_04_22_194144_create_tickets_table', 1),
(4, '2019_04_22_194217_create_categories_table', 1),
(5, '2019_04_22_194258_create_comments_table', 1),
(6, '2019_04_22_195348_create_chat_table', 1),
(7, '2019_05_02_092140_create_notifications_table', 2);

-- --------------------------------------------------------

--
-- Table structure for table `news`
--

CREATE TABLE `news` (
  `id` int(11) NOT NULL,
  `subject` varchar(225) NOT NULL,
  `content` text NOT NULL,
  `thumbnail` varchar(255) DEFAULT NULL,
  `client_can_see` int(11) NOT NULL DEFAULT '0',
  `supervisor_can_see` int(11) NOT NULL DEFAULT '0',
  `teamlead_can_see` int(11) NOT NULL DEFAULT '0',
  `admin_can_see` int(11) NOT NULL DEFAULT '0',
  `worker_can_see` int(11) DEFAULT '0',
  `created_at` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP,
  `updated_at` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `news`
--

INSERT INTO `news` (`id`, `subject`, `content`, `thumbnail`, `client_can_see`, `supervisor_can_see`, `teamlead_can_see`, `admin_can_see`, `worker_can_see`, `created_at`, `updated_at`) VALUES
(1, 'dsd', 'sd', NULL, 0, 0, 0, 0, 0, '2019-04-25 07:12:47', '2019-04-25 07:12:47');

-- --------------------------------------------------------

--
-- Table structure for table `notification`
--

CREATE TABLE `notification` (
  `id` int(11) NOT NULL,
  `title` varchar(225) NOT NULL,
  `message` varchar(225) NOT NULL,
  `is_opened` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Table structure for table `notifications`
--

CREATE TABLE `notifications` (
  `id` char(36) COLLATE utf8_unicode_ci NOT NULL,
  `type` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `notifiable_type` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `notifiable_id` bigint(20) UNSIGNED NOT NULL,
  `data` text COLLATE utf8_unicode_ci NOT NULL,
  `read_at` timestamp NULL DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Dumping data for table `notifications`
--

INSERT INTO `notifications` (`id`, `type`, `notifiable_type`, `notifiable_id`, `data`, `read_at`, `created_at`, `updated_at`) VALUES
('1e5671ad-dda0-4ff5-8e8e-a4d7bdf6238c', 'App\\Notifications\\Register', 'App\\User', 36, '{\"title\":\"New Message\",\"message\":\"Okay\"}', '2019-05-01 16:00:00', '2019-05-02 01:41:33', '2019-05-02 01:41:33'),
('4f5b7350-e4ab-4542-852d-5e43fae02b8f', 'App\\Notifications\\Register', 'App\\User', 1, '{\"data\":\"This is my first notification\"}', NULL, '2019-05-02 01:29:25', '2019-05-02 01:29:25'),
('e383e9e6-bd67-405e-a35f-e60dac3b173a', 'App\\Notifications\\Register', 'App\\User', 1, '{\"title\":\"New Message\",\"message\":\"Hello world\"}', NULL, '2019-05-02 01:35:28', '2019-05-02 01:35:28'),
('e3a25fd9-e6cb-41c4-bf03-9ad29de68aec', 'App\\Notifications\\Register', 'App\\User', 1, '{\"title\":\"New Message\",\"message\":\"Hello world\"}', NULL, '2019-05-02 01:35:07', '2019-05-02 01:35:07');

-- --------------------------------------------------------

--
-- Table structure for table `password_resets`
--

CREATE TABLE `password_resets` (
  `email` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `token` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `reply`
--

CREATE TABLE `reply` (
  `id` int(10) UNSIGNED NOT NULL,
  `ticket_id` int(10) UNSIGNED NOT NULL,
  `user_id` int(10) UNSIGNED NOT NULL,
  `comment` text COLLATE utf8_unicode_ci NOT NULL,
  `status` int(11) NOT NULL,
  `created_at` timestamp NULL DEFAULT CURRENT_TIMESTAMP,
  `updated_at` timestamp NULL DEFAULT CURRENT_TIMESTAMP
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Dumping data for table `reply`
--

INSERT INTO `reply` (`id`, `ticket_id`, `user_id`, `comment`, `status`, `created_at`, `updated_at`) VALUES
(13, 7, 1, 'Test', 1, '2019-04-28 23:34:46', '2019-04-28 23:34:46'),
(14, 7, 35, 'okaysds', 0, '2019-04-28 23:37:29', '2019-04-28 23:37:29'),
(15, 7, 1, 'Okay', 1, '2019-04-28 23:41:52', '2019-04-28 23:41:52'),
(16, 8, 1, 'WAHAHA', 1, '2019-04-28 23:42:21', '2019-04-28 23:42:21'),
(17, 7, 1, 'grani siya', 1, '2019-04-28 23:54:55', '2019-04-28 23:54:55'),
(18, 7, 1, 'Bastos', 1, '2019-04-29 00:09:29', '2019-04-29 00:09:29'),
(19, 7, 1, 'hpya', 1, '2019-04-29 00:27:01', '2019-04-29 00:27:01'),
(20, 7, 35, 'wasap', 0, '2019-04-29 00:27:23', '2019-04-29 00:27:23'),
(21, 9, 1, 'sdsd', 0, '2019-05-02 09:17:14', '2019-05-02 09:17:14'),
(22, 10, 1, 'okay', 0, '2019-05-02 09:41:08', '2019-05-02 09:41:08'),
(23, 11, 1, 'Okay', 0, '2019-05-02 09:41:33', '2019-05-02 09:41:33');

-- --------------------------------------------------------

--
-- Table structure for table `reports`
--

CREATE TABLE `reports` (
  `id` int(11) NOT NULL,
  `user_id` int(11) NOT NULL,
  `subject` varchar(255) NOT NULL,
  `content` text NOT NULL,
  `created_at` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP,
  `created_by` int(11) NOT NULL,
  `is_read` int(11) NOT NULL DEFAULT '0'
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `reports`
--

INSERT INTO `reports` (`id`, `user_id`, `subject`, `content`, `created_at`, `created_by`, `is_read`) VALUES
(1, 1, '1556557780.jpg', 'sas', '2019-04-29 17:09:40', 1, 1);

-- --------------------------------------------------------

--
-- Table structure for table `supervisor_members`
--

CREATE TABLE `supervisor_members` (
  `id` int(11) NOT NULL,
  `supervisor_userid` int(11) NOT NULL,
  `teamlead_userid` int(11) NOT NULL,
  `created_at` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP,
  `updated_at` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `supervisor_members`
--

INSERT INTO `supervisor_members` (`id`, `supervisor_userid`, `teamlead_userid`, `created_at`, `updated_at`) VALUES
(5, 15, 17, '2019-04-23 06:06:14', '2019-04-23 06:06:14'),
(6, 21, 24, '2019-04-23 07:27:49', '2019-04-23 07:27:49'),
(7, 26, 32, '2019-04-27 14:31:12', '2019-04-28 01:58:21'),
(8, 26, 31, '2019-04-27 23:36:40', '2019-04-27 23:36:40');

-- --------------------------------------------------------

--
-- Table structure for table `team_lead_members`
--

CREATE TABLE `team_lead_members` (
  `id` int(11) NOT NULL,
  `teamlead_userid` int(11) NOT NULL,
  `worker_userid` int(11) NOT NULL,
  `created_at` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP,
  `updated_at` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `team_lead_members`
--

INSERT INTO `team_lead_members` (`id`, `teamlead_userid`, `worker_userid`, `created_at`, `updated_at`) VALUES
(1, 20, 19, '2019-04-23 06:20:58', '2019-04-23 06:20:58'),
(2, 24, 23, '2019-04-23 07:28:07', '2019-04-23 07:28:07'),
(3, 28, 27, '2019-04-27 14:31:26', '2019-04-27 14:31:26'),
(4, 17, 30, '2019-04-27 23:50:04', '2019-04-28 02:47:59');

-- --------------------------------------------------------

--
-- Table structure for table `tickets`
--

CREATE TABLE `tickets` (
  `id` int(10) UNSIGNED NOT NULL,
  `user_id` int(10) UNSIGNED NOT NULL,
  `category_id` int(10) UNSIGNED NOT NULL,
  `ticket_id` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `title` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `priority` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `message` text COLLATE utf8_unicode_ci NOT NULL,
  `status` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `is_escalated_to_supervisor` int(11) NOT NULL DEFAULT '0',
  `is_escalated_to_management` int(11) NOT NULL DEFAULT '0',
  `resolved_by` int(11) DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  `type` int(11) DEFAULT '0'
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Dumping data for table `tickets`
--

INSERT INTO `tickets` (`id`, `user_id`, `category_id`, `ticket_id`, `title`, `priority`, `message`, `status`, `is_escalated_to_supervisor`, `is_escalated_to_management`, `resolved_by`, `created_at`, `updated_at`, `type`) VALUES
(1, 23, 1, '7M30W5M42K', 'dsd', 'low', 'sds', 'Escalated', 1, 0, NULL, '2019-04-22 23:06:54', '2019-04-22 23:45:51', 0),
(2, 27, 2, '9KH9PM2I9K', 'df', 'high', 'dfd', 'Open', 0, 0, NULL, '2019-04-22 23:45:39', '2019-04-22 23:45:39', 0),
(3, 1, 3, '9XTWJE8PGZ', 'My Feedback', 'low', 'Okay', 'Open', 0, 0, NULL, '2019-04-27 16:12:46', '2019-04-27 16:12:46', 0),
(4, 1, 3, 'DNGYL24GGQ', 'This is my feedback', 'low', 'OKAY HAHAH', 'Open', 0, 0, NULL, '2019-04-27 16:15:36', '2019-04-27 16:15:36', 1),
(5, 32, 3, 'LGSU5JY1AY', 'This is it', 'low', 'jJDDFD', 'Open', 0, 0, NULL, '2019-04-27 16:30:10', '2019-04-27 16:30:10', 1),
(6, 33, 3, 'YYTSRBFYGI', 'SUBJECT', 'low', 'okay', 'Open', 0, 0, NULL, '2019-04-27 19:44:03', '2019-04-27 19:44:03', 1),
(7, 34, 3, 'KOBQT1XMWG', 'dfdf', 'low', 'fdf', 'Open', 0, 0, NULL, '2019-04-27 19:52:33', '2019-04-27 19:52:33', 1);

-- --------------------------------------------------------

--
-- Table structure for table `users`
--

CREATE TABLE `users` (
  `id` int(10) UNSIGNED NOT NULL,
  `name` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `username` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `email` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `email_verified_at` timestamp NULL DEFAULT NULL,
  `password` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `remember_token` varchar(100) COLLATE utf8_unicode_ci DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  `user_type` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `user_pic` varchar(255) COLLATE utf8_unicode_ci DEFAULT 'capstone/Template/assets/images/about-1.jpg',
  `is_deleted` int(11) NOT NULL DEFAULT '0',
  `address` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `dob` date NOT NULL,
  `company` varchar(255) COLLATE utf8_unicode_ci NOT NULL DEFAULT 'N/A'
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Dumping data for table `users`
--

INSERT INTO `users` (`id`, `name`, `username`, `email`, `email_verified_at`, `password`, `remember_token`, `created_at`, `updated_at`, `user_type`, `user_pic`, `is_deleted`, `address`, `dob`, `company`) VALUES
(1, 'Louise Shit', 'admin', 'louisesalas@gmail.com', NULL, '$2y$10$nEZzofOy5m4O.Cvw6uImCegpdpcW34CgKFgMefvZ2i4AhrBxXKSs.', '3q2d28pOcl3rQHLj4MkIxCJjGxqP91eyFGhtBQdStLDUWNCNVWEZbdwyoMC7', NULL, NULL, 'management', '1556406263.jpg', 0, 'sdhh', '2019-04-19', 'N/A'),
(15, 'IMM COIN', 'sod', 'dsd@gmail.com', NULL, '$2y$10$nEZzofOy5m4O.Cvw6uImCegpdpcW34CgKFgMefvZ2i4AhrBxXKSs.', NULL, '2019-04-22 16:31:31', '2019-04-22 16:31:31', 'supervisor', 'capstone/Template/assets/images/about-1.jpg', 0, '', '0000-00-00', 'N/A'),
(16, 'df', 'sds', 'ds', NULL, '$2y$10$IQdbGKl0Q5nHTdmad.Ee/.q/04hl9Su8NSKsCSKWsnEu8MLydVPXi', NULL, '2019-04-22 16:48:41', '2019-04-22 16:48:41', 'supervisor', 'capstone/Template/assets/images/about-1.jpg', 0, '', '0000-00-00', 'N/A'),
(17, 'df', 'sd', 'df', NULL, '$2y$10$5etgmo.C1mUO4MtFxzJZ/.Ui4vedHwzJLl21rnlnh1IexDPdA4f/C', NULL, '2019-04-22 16:49:11', '2019-04-22 16:49:11', 'team lead', 'capstone/Template/assets/images/about-1.jpg', 0, '', '0000-00-00', 'N/A'),
(18, 'Client Ko', 'client', 'client@gmail.com', NULL, '$2y$10$UAistMW1cPyKwYibq3iKnOxQnpusMcm62asjR81AGJ66NMgAuSMam', NULL, '2019-04-22 16:56:48', '2019-04-22 16:56:48', 'client', 'capstone/Template/assets/images/about-1.jpg', 0, 'DSD', '2019-04-11', 'OAKY'),
(19, 'Worker KO', 'worker', 'workermail@gmail.com', NULL, '$2y$10$tXwvYxFyknKOj5CUSlSnge6IOhdFTI0RoI4H4WhEwZtdpDlXzjT0q', NULL, '2019-04-22 16:57:57', '2019-04-22 16:57:57', 'worker', 'capstone/Template/assets/images/about-1.jpg', 0, '', '0000-00-00', 'N/A'),
(20, 'Team Lead Ko', 'teamlead', 'teamlead@gmail.com', NULL, '$2y$10$EGH/HooQKh2qB3kuJgdo3O6ayB3/3nZgLsUHM.t4I5AF/Kt7RR1W.', NULL, '2019-04-22 16:58:46', '2019-04-22 16:58:46', 'team lead', 'capstone/Template/assets/images/about-1.jpg', 0, '', '0000-00-00', 'N/A'),
(21, 'Super Visor Ko', 'supervisor', 'supervisor@gmail.com', NULL, '$2y$10$nEZzofOy5m4O.Cvw6uImCegpdpcW34CgKFgMefvZ2i4AhrBxXKSs.', NULL, '2019-04-22 16:59:47', '2019-04-22 16:59:47', 'supervisor', 'capstone/Template/assets/images/about-1.jpg', 0, '', '0000-00-00', 'N/A'),
(22, 'Super Kunoya', 'SUPER', 'supe', NULL, '$2y$10$v6XSFiIz6PfRsZz5xC3lYeTMMHV5Tctkv5wp3k74SNkXwaGKprJla', NULL, '2019-04-22 20:33:08', '2019-04-22 20:33:08', 'supervisor', 'capstone/Template/assets/images/about-1.jpg', 0, '', '0000-00-00', 'N/A'),
(23, 'Im Worker', 'worker1', 'worker1@gmail.com', NULL, '$2y$10$BCUPyHMq8r9BfOQu/2iGcOtRqwdcFaclbTTQX1s3POA2oBnB0/0IS', 'sfjGpKBv0SGceMWAL8lasmJIOJB0k9fKgiFohluTlUCRhcTIyZ6vJ0AHiTg7', '2019-04-22 22:57:37', '2019-04-22 22:57:37', 'worker', 'capstone/Template/assets/images/about-1.jpg', 0, '', '0000-00-00', 'N/A'),
(24, 'dsd', 'teamlead1', 'ewer', NULL, '$2y$10$nEZzofOy5m4O.Cvw6uImCegpdpcW34CgKFgMefvZ2i4AhrBxXKSs.', NULL, '2019-04-22 23:27:31', '2019-04-22 23:27:31', 'team lead', 'capstone/Template/assets/images/about-1.jpg', 0, '', '0000-00-00', 'N/A'),
(25, 'Client Okay', 'client1', 'admin@gmail.com', NULL, '$2y$10$1KZCxC9YSae31aNw38kuRO7VCzyvmGGUoP/6QpaC4Z4SFmo5m7oG.', NULL, '2019-04-27 03:45:52', '2019-04-27 03:45:52', 'client', 'capstone/Template/assets/images/about-1.jpg', 0, 'sfdf', '2019-04-10', 'tapos'),
(26, 'Twet', 'test12', 'admin1@gmail.com', NULL, '$2y$10$tn4OPlneTVYgCG5jXuNU5ehSPSWMgG4z93noIm3z3HTV7MAlUQ50e', NULL, '2019-04-27 06:29:29', '2019-04-27 06:29:29', 'supervisor', 'capstone/Template/assets/images/about-1.jpg', 0, '', '0000-00-00', 'N/A'),
(27, 'fdf', 'work', 'ksd@gmail.com', NULL, '$2y$10$6V/EmHlYL8kOQrFv/bLUO.gl4IgKO8IiJRRdURTmzKLupHfuvkI6G', NULL, '2019-04-27 06:30:41', '2019-04-27 06:30:41', 'worker', 'capstone/Template/assets/images/about-1.jpg', 0, '', '0000-00-00', 'N/A'),
(28, 'GSDSF', 'team', 'techsuppsort@xinrox.com', NULL, '$2y$10$V0GyfSL2kot0OIp0ZgLuXuuJcgFoI1jZAJmzcTWQWB1TwuO4OLE8q', NULL, '2019-04-27 06:30:54', '2019-04-27 06:30:54', 'team lead', 'capstone/Template/assets/images/about-1.jpg', 0, '', '0000-00-00', 'N/A'),
(29, 'Star 12', 'dsdsdsds', 'nullifiedgeek@gmail.com', NULL, '$2y$10$mTpsrsq6Intu0KH7BUwDvOu1v5IIhf/5DyM4n8lxju0wmJ.km6hZW', NULL, NULL, NULL, 'management', '1556384698.png', 0, 'Amba Business Hub, Trimandir, Adalaj,', '2019-04-19', 'N/A'),
(30, 'dfd', 'djhfjdf', 'dfl@gmail.com', NULL, '$2y$10$vHkoXFhJU4PawpqxeSlXNO7U7BOznNN1jozf8cJ0ApsXCcnp9rKXO', NULL, NULL, NULL, 'worker', '1556404535.jpg', 0, 'sdsd', '2019-04-18', 'sdsd'),
(31, 'Louise Salas', 'louise', 'ok@gmail.com', NULL, '$2y$10$JcnfQV7xuE7e4DF6KXgAfOn/h7L.qeXymyA8m8CgNMgMNTskc0Gma', 'bc9eF6a639A6FsnQNsPDn2UmO0Xb0qwPL8G5JAAfoTegTeq7nq9c1NPfTb2Z', NULL, NULL, 'team lead', '1556408015.jpg', 0, 'sdsd', '2019-04-10', 'N/A'),
(32, 'Sample Client', 'sampleclient', 'sdsk@gmail.com', NULL, '$2y$10$mfAIn4/QV7CPrJLsSdRiYOM2I39qh3v7qgk9PZTgDgCFHcKtal0yW', NULL, NULL, NULL, 'worker', '1556411122.jpg', 0, 'Amba Business Hub, Trimandir, Adalaj,', '2019-04-18', 'Okay'),
(33, 'Louise Salas', 'louise56', 'sfs@gmail.com', NULL, '$2y$10$tkJTSmcT8x.Sop0m1ZFmve..2Csjjhn5Jtcpfg5FVCdULbhXTzlJi', 'Qeo0Lu3eDKLKUDXLYDS6eYD3FZ61mXj6ensa3gHc2DnlIycZ3wuQ9wT94dUF', NULL, NULL, 'client', '1556423020.jpg', 0, 'Amba Business Hub, Trimandir, Adalaj,', '2019-04-11', 'SM City Cebu'),
(34, 'dlfd', 'testclient', 'dg@gmail.com', NULL, '$2y$10$tn4OPlneTVYgCG5jXuNU5ehSPSWMgG4z93noIm3z3HTV7MAlUQ50e', 'Vr7QiNk376vxp2MnN5YBbylBRtGC7jZfEn7mNllc0cUGYU2WxCSRrgnMct2n', NULL, NULL, 'client', '1556423392.jpg', 0, 'sdsd', '2019-04-19', 'SM City Cebudsd'),
(35, 'John Snow', 'testlouise', 'louisesalas826@gmail.com', NULL, '$2y$10$IZenArQXG.hw8niYkEmUKeb/8fBz5WQ6QjLhcaeMnIg6QfQ8MlYN2', NULL, NULL, NULL, 'supervisor', '1556493631.jpg', 0, 'Amba Business Hub, Trimandir, Adalaj,', '2019-04-29', 'N/A'),
(36, 'Checker', 'check', 'louisesalas8.26@gmail.com', NULL, '$2y$10$pyRY.3CgcXjKX0iXqjH5KOEQeR3Ok6fCrxF871GXjxZnKmDA9ihh2', NULL, NULL, NULL, 'client', '1556788455.png', 0, 'sds', '2019-05-10', 'dsd'),
(37, 'bjb', 'sbh', 'jj@gmail.com', NULL, '$2y$10$mQalO5THaLK9uQkIfTfKLOuFhGb8gGV/oZVStc6MQCfOx2OKTZEm2', NULL, NULL, NULL, 'supervisor', '1556945538.jpg', 0, 'dfdf', '2019-05-22', 'N/A'),
(38, 'sds', 'sas', 'dsd@gm.con', NULL, '$2y$10$Vh7uK.kXFB92.QJBUSOS3OKh5BmGrh7SW2qfl9xnQ9flUjZshVHtO', NULL, NULL, NULL, 'supervisor', '1556945699.jpg', 0, 'dsd', '2019-05-29', 'N/A'),
(39, 'ds', 'asasd', 'kk@gmail.com', NULL, '$2y$10$BCwfMeXAfihLoGsLAgh3fujYg3pOFfqoFME6nFh3YzRDteYh4358O', NULL, NULL, NULL, 'worker', '1556945853.jpg', 0, 'sdsd', '2019-05-09', 'N/A'),
(40, 'okas', 'okas', 'louisesssalas8.26@gmail.com', NULL, '$2y$10$qg6iUjQNDP0C4npUBb3BLuhvfxaH.vTYTa4x.n/zSDI9nQmVOcmAa', NULL, NULL, NULL, 'team lead', '1556946096.jpg', 0, 'sd', '2019-05-16', 'N/A'),
(41, 'ok', 'syaro', 'jaja@gmail.com', NULL, '$2y$10$1Du4bymAy6JKAxpA78cxrOnQylTJI.otbsmr56GWRtXLZrefbFSQu', NULL, NULL, NULL, 'worker', '1556946413.jpg', 0, 'sdk', '2019-05-09', 'N/A'),
(42, 'JJK', 'SASJAHDJ', 'DJKHKHKH@GMAIL.COM', NULL, '$2y$10$s6md6Q4stMpu4l18ib02Muk7dhiA7nlSyJnsp.IpZFHp0ID9STCe6', NULL, NULL, NULL, 'supervisor', '1556946493.png', 0, 'DSD', '2019-05-17', 'N/A'),
(43, 'dkshkh', 'grabi', 'hk@gmail.com', NULL, '$2y$10$TxQcMVtf5ss5LRpPrjoA6um88cQGuGhFJwsS2REfaNC6a1UKblRee', NULL, NULL, NULL, 'management', '1556946562.png', 0, 'sds', '2019-05-02', 'N/A'),
(44, 'bwseit', 'bwesit', 'cyberspacsdse418@gmail.com', NULL, '$2y$10$DGGLsW6Ado2TDRKy/hVCfus8WBQd.nh.9o6XbcMN7JN75L9neDy86', NULL, NULL, NULL, 'management', '1556946706.png', 0, 'dsd', '2019-05-23', 'N/A');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `categories`
--
ALTER TABLE `categories`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `chat`
--
ALTER TABLE `chat`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `comments`
--
ALTER TABLE `comments`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `feedbacks`
--
ALTER TABLE `feedbacks`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `locations`
--
ALTER TABLE `locations`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `location_assigment`
--
ALTER TABLE `location_assigment`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `memo`
--
ALTER TABLE `memo`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `migrations`
--
ALTER TABLE `migrations`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `news`
--
ALTER TABLE `news`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `notification`
--
ALTER TABLE `notification`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `notifications`
--
ALTER TABLE `notifications`
  ADD PRIMARY KEY (`id`),
  ADD KEY `notifications_notifiable_type_notifiable_id_index` (`notifiable_type`,`notifiable_id`);

--
-- Indexes for table `password_resets`
--
ALTER TABLE `password_resets`
  ADD KEY `password_resets_email_index` (`email`);

--
-- Indexes for table `reply`
--
ALTER TABLE `reply`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `reports`
--
ALTER TABLE `reports`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `supervisor_members`
--
ALTER TABLE `supervisor_members`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `team_lead_members`
--
ALTER TABLE `team_lead_members`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `tickets`
--
ALTER TABLE `tickets`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `tickets_ticket_id_unique` (`ticket_id`);

--
-- Indexes for table `users`
--
ALTER TABLE `users`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `users_email_unique` (`email`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `categories`
--
ALTER TABLE `categories`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT for table `chat`
--
ALTER TABLE `chat`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=12;

--
-- AUTO_INCREMENT for table `comments`
--
ALTER TABLE `comments`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=8;

--
-- AUTO_INCREMENT for table `feedbacks`
--
ALTER TABLE `feedbacks`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT for table `locations`
--
ALTER TABLE `locations`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT for table `location_assigment`
--
ALTER TABLE `location_assigment`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT for table `memo`
--
ALTER TABLE `memo`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT for table `migrations`
--
ALTER TABLE `migrations`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=8;

--
-- AUTO_INCREMENT for table `news`
--
ALTER TABLE `news`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT for table `notification`
--
ALTER TABLE `notification`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `reply`
--
ALTER TABLE `reply`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=24;

--
-- AUTO_INCREMENT for table `reports`
--
ALTER TABLE `reports`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT for table `supervisor_members`
--
ALTER TABLE `supervisor_members`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=9;

--
-- AUTO_INCREMENT for table `team_lead_members`
--
ALTER TABLE `team_lead_members`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- AUTO_INCREMENT for table `tickets`
--
ALTER TABLE `tickets`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=8;

--
-- AUTO_INCREMENT for table `users`
--
ALTER TABLE `users`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=45;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
