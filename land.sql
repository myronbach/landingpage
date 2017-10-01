-- phpMyAdmin SQL Dump
-- version 4.6.4
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Oct 01, 2017 at 03:13 PM
-- Server version: 5.7.14
-- PHP Version: 7.0.10

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `land`
--

-- --------------------------------------------------------

--
-- Table structure for table `migrations`
--

CREATE TABLE `migrations` (
  `id` int(10) UNSIGNED NOT NULL,
  `migration` varchar(255) NOT NULL,
  `batch` int(11) NOT NULL
) ENGINE=MyISAM DEFAULT CHARSET=utf8;

--
-- Dumping data for table `migrations`
--

INSERT INTO `migrations` (`id`, `migration`, `batch`) VALUES
(1, '2014_10_12_000000_create_users_table', 1),
(2, '2014_10_12_100000_create_password_resets_table', 1),
(3, '2017_04_02_120213_create_table_pages', 1),
(4, '2017_04_02_120345_create_table_services', 1),
(5, '2017_04_02_120453_create_table_portfolios', 1),
(6, '2017_04_02_120554_create_table_peoples', 1),
(7, '2017_04_08_192828_change_table_portfolios', 2),
(8, '2017_04_10_220219_edit_table_portfolios', 3);

-- --------------------------------------------------------

--
-- Table structure for table `pages`
--

CREATE TABLE `pages` (
  `id` int(10) UNSIGNED NOT NULL,
  `name` varchar(100) NOT NULL,
  `alias` varchar(100) NOT NULL,
  `text` text NOT NULL,
  `images` varchar(100) NOT NULL,
  `created_at` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP,
  `updated_at` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP
) ENGINE=MyISAM DEFAULT CHARSET=utf8;

--
-- Dumping data for table `pages`
--

INSERT INTO `pages` (`id`, `name`, `alias`, `text`, `images`, `created_at`, `updated_at`) VALUES
(1, 'home', 'home', '<h2>We create <strong>awesome</strong>web templates</h2>\r\n<p>Mauris purus orci, scelerisque nec tristique quis, fermentum a risus. Morbi porta vestibulum sollicitudin. Fusce sed vulputate orci. Pellentesque ut. </p>', 'main_device_image.png', '2017-04-06 12:16:22', '2017-04-06 12:16:57'),
(2, 'about us', 'aboutUs', '<h3>Lorem ipsum dolor sit amet, consectetur adipiscing elit. Integer a</h3>\r\n<br>\r\n<p>Mauris purus orci, scelerisque nec tristique quis, fermentum a risus. Morbi porta vestibulum sollicitudin. Fusce sed vulputate orci. Pellentesque ut.</p>\r\n<br>\r\n<p>Mauris purus orci, scelerisque nec tristique quis, fermentum a risus. Morbi porta vestibulum sollicitudin. Fusce sed vulputate orci. Pellentesque ut.</p>\r\n<br>', 'about-img.jpg', '2017-04-05 12:16:31', '2017-04-06 12:17:08');

-- --------------------------------------------------------

--
-- Table structure for table `password_resets`
--

CREATE TABLE `password_resets` (
  `email` varchar(255) NOT NULL,
  `token` varchar(255) NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL
) ENGINE=MyISAM DEFAULT CHARSET=utf8;

-- --------------------------------------------------------

--
-- Table structure for table `peoples`
--

CREATE TABLE `peoples` (
  `id` int(10) UNSIGNED NOT NULL,
  `name` varchar(255) NOT NULL,
  `position` varchar(150) NOT NULL,
  `images` varchar(100) NOT NULL,
  `text` text NOT NULL,
  `created_at` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP,
  `updated_at` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP
) ENGINE=MyISAM DEFAULT CHARSET=utf8;

--
-- Dumping data for table `peoples`
--

INSERT INTO `peoples` (`id`, `name`, `position`, `images`, `text`, `created_at`, `updated_at`) VALUES
(1, 'Tom Rensend', 'Chief Executive Officer', 'team_pic1.jpg', 'Lorem ipsum dolor sit amet, consectetur adipiscing elit. Donec tristique facilisis ullamcorper. Sed at urna blandit, dignissim tortor non, interdum leo. Fusce sed dictum eros. Duis quis massa volutpat, accumsan. ', '2017-04-04 12:18:35', '2017-04-06 12:18:51'),
(2, 'Kather Mory', 'Vice President', 'team_pic2.jpg', 'Lorem ipsum dolor sit amet, consectetur adipiscing elit. Donec tristique facilisis ullamcorper. Sed at urna blandit, dignissim tortor non, interdum leo. Fusce sed dictum eros. Duis quis massa volutpat, accumsan.', '2017-04-05 12:18:43', '2017-04-06 12:18:53'),
(3, 'Lancer Jack', 'Senior Manager', 'team_pic3.jpg', 'Lorem ipsum dolor sit amet, consectetur adipiscing elit. Donec tristique facilisis ullamcorper. Sed at urna blandit, dignissim tortor non, interdum leo. Fusce sed dictum eros. Duis quis massa volutpat, accumsan. ', '2017-04-06 12:18:48', '2017-04-06 12:18:54');

-- --------------------------------------------------------

--
-- Table structure for table `portfolios`
--

CREATE TABLE `portfolios` (
  `id` int(10) UNSIGNED NOT NULL,
  `name` varchar(200) NOT NULL,
  `images` varchar(100) NOT NULL,
  `filter` varchar(100) NOT NULL,
  `created_at` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP,
  `updated_at` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP,
  `text` text
) ENGINE=MyISAM DEFAULT CHARSET=utf8;

--
-- Dumping data for table `portfolios`
--

INSERT INTO `portfolios` (`id`, `name`, `images`, `filter`, `created_at`, `updated_at`, `text`) VALUES
(1, 'Finance App', 'portfolio_pic2.jpg', 'GPS', '2017-04-08 18:28:51', '2017-06-18 17:36:49', NULL),
(2, 'Concept', 'portfolio_pic3.jpg', 'design', '2017-04-08 18:28:51', '2017-04-08 18:29:04', ''),
(3, 'Shopping', 'portfolio_pic4.jpg', 'android', '2017-04-08 18:28:51', '2017-04-08 18:29:04', ''),
(4, 'Managment', 'portfolio_pic5.jpg', 'web', '2017-04-08 18:28:51', '2017-04-08 18:29:04', ''),
(5, 'IPhone', 'portfolio_pic6.jpg', 'web', '2017-04-08 18:28:51', '2017-04-08 18:29:04', ''),
(6, 'Nexus', 'portfolio_pic7.jpg', 'GPS', '2017-04-08 18:28:51', '2017-04-08 18:29:04', ''),
(7, 'Android', 'portfolio_pic8.jpg', 'GPS', '2017-04-08 18:28:51', '2017-04-08 18:29:04', '');

-- --------------------------------------------------------

--
-- Table structure for table `services`
--

CREATE TABLE `services` (
  `id` int(10) UNSIGNED NOT NULL,
  `name` varchar(100) NOT NULL,
  `text` text NOT NULL,
  `icon` varchar(100) NOT NULL,
  `created_at` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP,
  `updated_at` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP
) ENGINE=MyISAM DEFAULT CHARSET=utf8;

--
-- Dumping data for table `services`
--

INSERT INTO `services` (`id`, `name`, `text`, `icon`, `created_at`, `updated_at`) VALUES
(1, 'Android', 'Mauris purus orci, scelerisque nec tristique quis, fermentum a risus. Morbi porta vestibulum sollicitudin. Fusce sed vulputate orci. Pellentesque ut.', 'fa-android', '2017-04-12 08:07:46', '2017-04-12 08:07:57'),
(2, 'Apple OS', 'Mauris purus orci, scelerisque nec tristique quis, fermentum a risus. Morbi porta vestibulum sollicitudin. Fusce sed vulputate orci. Pellentesque ut.', 'fa-apple', '2017-04-12 08:07:50', '2017-04-12 08:07:59'),
(3, 'Design', 'Mauris purus orci, scelerisque nec tristique quis, fermentum a risus. Morbi porta vestibulum sollicitudin. Fusce sed vulputate orci. Pellentesque ut. ', 'fa-dropbox', '2017-04-12 08:07:52', '2017-04-12 08:08:00'),
(4, 'Consept', 'Mauris purus orci, scelerisque nec tristique quis, fermentum a risus. Morbi porta vestibulum sollicitudin. Fusce sed vulputate orci. Pellentesque ut.', 'fa-html5', '2017-04-12 08:07:53', '2017-04-12 08:08:01'),
(5, 'User Research', 'Mauris purus orci, scelerisque nec tristique quis, fermentum a risus. Morbi porta vestibulum sollicitudin. Fusce sed vulputate orci. Pellentesque ut. ', 'fa-slack', '2017-04-12 08:07:54', '2017-04-12 08:08:02'),
(6, 'Android', 'Mauris purus orci, scelerisque nec tristique quis, fermentum a risus. Morbi porta vestibulum sollicitudin. Fusce sed vulputate orci. Pellentesque ut. ', 'fa-user', '2017-04-12 08:07:56', '2017-04-12 08:08:03');

-- --------------------------------------------------------

--
-- Table structure for table `users`
--

CREATE TABLE `users` (
  `id` int(10) UNSIGNED NOT NULL,
  `name` varchar(255) NOT NULL,
  `email` varchar(255) NOT NULL,
  `password` varchar(255) NOT NULL,
  `remember_token` varchar(100) DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=MyISAM DEFAULT CHARSET=utf8;

--
-- Dumping data for table `users`
--

INSERT INTO `users` (`id`, `name`, `email`, `password`, `remember_token`, `created_at`, `updated_at`) VALUES
(1, 'John', 'j@j.j', '$2y$10$/LtAHBUZkBh75gXjCzztwuxIt4sz4uxZYAsn.KjsG6UfDQWhgLama', 'MtCt3lCmQZJnaMob3dL34vokIAsL3mYBOEogYSrkDftMkGT7NVoQ2oyOkcQy', '2017-04-06 06:17:38', '2017-04-10 17:43:06'),
(2, 'Stefa', 'stefa@s.s', '$2y$10$dJnpOpqUhFFR4ljotgkyV.Po9DSJp1fQPhQCyFmuhCvdY56JWZPca', NULL, '2017-06-28 18:56:18', '2017-06-28 18:56:18');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `migrations`
--
ALTER TABLE `migrations`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `pages`
--
ALTER TABLE `pages`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `password_resets`
--
ALTER TABLE `password_resets`
  ADD KEY `password_resets_email_index` (`email`);

--
-- Indexes for table `peoples`
--
ALTER TABLE `peoples`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `portfolios`
--
ALTER TABLE `portfolios`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `services`
--
ALTER TABLE `services`
  ADD PRIMARY KEY (`id`);

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
-- AUTO_INCREMENT for table `migrations`
--
ALTER TABLE `migrations`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=9;
--
-- AUTO_INCREMENT for table `pages`
--
ALTER TABLE `pages`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;
--
-- AUTO_INCREMENT for table `peoples`
--
ALTER TABLE `peoples`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;
--
-- AUTO_INCREMENT for table `portfolios`
--
ALTER TABLE `portfolios`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=9;
--
-- AUTO_INCREMENT for table `services`
--
ALTER TABLE `services`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=7;
--
-- AUTO_INCREMENT for table `users`
--
ALTER TABLE `users`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;
/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
