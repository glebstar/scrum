-- phpMyAdmin SQL Dump
-- version 4.1.14
-- http://www.phpmyadmin.net
--
-- Host: 127.0.0.1
-- Generation Time: Aug 19, 2016 at 03:53 PM
-- Server version: 5.6.17
-- PHP Version: 5.5.12

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8 */;

--
-- Database: `scrumy`
--

-- --------------------------------------------------------

--
-- Table structure for table `cards`
--

CREATE TABLE IF NOT EXISTS `cards` (
  `card_id` int(10) unsigned NOT NULL AUTO_INCREMENT,
  `project_id` int(11) NOT NULL,
  `card_title` varchar(50) COLLATE utf8_unicode_ci NOT NULL,
  `card_column` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `is_priority` tinyint(1) NOT NULL,
  `card_duedate` timestamp NOT NULL DEFAULT '0000-00-00 00:00:00',
  PRIMARY KEY (`card_id`)
) ENGINE=InnoDB  DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci AUTO_INCREMENT=28 ;

--
-- Dumping data for table `cards`
--

INSERT INTO `cards` (`card_id`, `project_id`, `card_title`, `card_column`, `is_priority`, `card_duedate`) VALUES
(1, 1, 'tset', '', 0, '0000-00-00 00:00:00'),
(2, 1, 'teste', '', 0, '0000-00-00 00:00:00'),
(3, 1, 'test', '', 0, '0000-00-00 00:00:00'),
(4, 0, 'asdfg', '', 0, '0000-00-00 00:00:00'),
(5, 0, 'ttssdfkk', '', 0, '0000-00-00 00:00:00'),
(6, 0, 'sdfgsdgsdgf', '', 0, '0000-00-00 00:00:00'),
(7, 0, 'dfgsdfg', '', 0, '0000-00-00 00:00:00'),
(8, 0, 'tessstt', '', 0, '0000-00-00 00:00:00'),
(9, 0, 'zxcvbn', '', 0, '0000-00-00 00:00:00'),
(10, 0, 'ZXCV', '', 0, '0000-00-00 00:00:00'),
(11, 0, 'TEST', '', 0, '0000-00-00 00:00:00'),
(12, 0, 'x', '', 0, '0000-00-00 00:00:00'),
(13, 0, 'qwert', '', 0, '0000-00-00 00:00:00'),
(14, 0, 'xcv', '', 0, '0000-00-00 00:00:00'),
(15, 0, 'dx', '', 0, '0000-00-00 00:00:00'),
(16, 0, 'xxvx', '', 0, '0000-00-00 00:00:00'),
(17, 0, 'zczxc', '', 0, '0000-00-00 00:00:00'),
(18, 0, 'xc', '', 0, '0000-00-00 00:00:00'),
(19, 0, 'xv', '', 0, '0000-00-00 00:00:00'),
(20, 1, 'ZXCZC', '', 0, '0000-00-00 00:00:00'),
(21, 0, 'xdv', '', 0, '0000-00-00 00:00:00'),
(22, 0, 'asdczxc', '', 0, '0000-00-00 00:00:00'),
(23, 1, 'qazxswedc', '', 0, '0000-00-00 00:00:00'),
(24, 1, 'zx', '', 0, '0000-00-00 00:00:00'),
(25, 1, 'z', '', 0, '0000-00-00 00:00:00'),
(26, 1, 'z', '', 0, '0000-00-00 00:00:00'),
(27, 1, 'x\n', '', 0, '0000-00-00 00:00:00');

-- --------------------------------------------------------

--
-- Table structure for table `card_files`
--

CREATE TABLE IF NOT EXISTS `card_files` (
  `card_id` int(11) NOT NULL,
  `file_name` varchar(255) COLLATE utf8_unicode_ci NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `card_members`
--

CREATE TABLE IF NOT EXISTS `card_members` (
  `card_id` int(11) NOT NULL,
  `user_id` int(11) NOT NULL,
  `project_id` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `migrations`
--

CREATE TABLE IF NOT EXISTS `migrations` (
  `migration` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `batch` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Dumping data for table `migrations`
--

INSERT INTO `migrations` (`migration`, `batch`) VALUES
('2014_10_12_000000_create_users_table', 1),
('2014_10_12_100000_create_password_resets_table', 1),
('2016_07_03_103937_projects_table', 2),
('2016_07_03_143139_projects_table', 3),
('2016_07_03_144921_create_projects_table', 4),
('2016_07_16_152241_create_project_members_table', 5),
('2016_07_26_160516_create_cards_table', 6),
('2016_07_26_162042_create_card_members_table', 6),
('2016_07_26_162051_create_card_files_table', 6);

-- --------------------------------------------------------

--
-- Table structure for table `password_resets`
--

CREATE TABLE IF NOT EXISTS `password_resets` (
  `email` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `token` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `created_at` timestamp NOT NULL DEFAULT '0000-00-00 00:00:00',
  KEY `password_resets_email_index` (`email`),
  KEY `password_resets_token_index` (`token`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `projects`
--

CREATE TABLE IF NOT EXISTS `projects` (
  `project_id` int(10) unsigned NOT NULL AUTO_INCREMENT,
  `project_name` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `project_manager_id` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `to_do` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `doing` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `done` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `created_at` timestamp NOT NULL DEFAULT '0000-00-00 00:00:00',
  `updated_at` timestamp NOT NULL DEFAULT '0000-00-00 00:00:00',
  PRIMARY KEY (`project_id`)
) ENGINE=InnoDB  DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci AUTO_INCREMENT=17 ;

--
-- Dumping data for table `projects`
--

INSERT INTO `projects` (`project_id`, `project_name`, `project_manager_id`, `to_do`, `doing`, `done`, `created_at`, `updated_at`) VALUES
(1, 'project_01', '01', '25', '30', '25', '0000-00-00 00:00:00', '0000-00-00 00:00:00'),
(2, 'project 02', '01', '10', '20', '30', '0000-00-00 00:00:00', '0000-00-00 00:00:00'),
(3, 'test', '', '', '', '', '0000-00-00 00:00:00', '0000-00-00 00:00:00'),
(4, 'test02', '', '', '', '', '0000-00-00 00:00:00', '0000-00-00 00:00:00'),
(5, 'test04', '1', '10', '10', '10', '0000-00-00 00:00:00', '0000-00-00 00:00:00'),
(6, 'test05', '1', '20', '1', '1', '0000-00-00 00:00:00', '0000-00-00 00:00:00'),
(8, 'teest07', '1', '', '', '', '0000-00-00 00:00:00', '0000-00-00 00:00:00'),
(9, 'test08', '1', '', '', '', '0000-00-00 00:00:00', '0000-00-00 00:00:00'),
(10, 'test09', '1', '', '', '', '0000-00-00 00:00:00', '0000-00-00 00:00:00'),
(11, 'test10', '1', '', '', '', '0000-00-00 00:00:00', '0000-00-00 00:00:00'),
(12, 'test11', '1', '', '', '', '0000-00-00 00:00:00', '0000-00-00 00:00:00'),
(13, 'testt20', '2', '', '', '', '0000-00-00 00:00:00', '0000-00-00 00:00:00'),
(14, 'TEST21', '2', '', '', '', '0000-00-00 00:00:00', '0000-00-00 00:00:00'),
(15, 'ASDFGH', '2', '', '', '', '0000-00-00 00:00:00', '0000-00-00 00:00:00'),
(16, 'test21', '1', '', '', '', '0000-00-00 00:00:00', '0000-00-00 00:00:00');

-- --------------------------------------------------------

--
-- Table structure for table `project_members`
--

CREATE TABLE IF NOT EXISTS `project_members` (
  `member_id` int(11) NOT NULL,
  `project_id` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `users`
--

CREATE TABLE IF NOT EXISTS `users` (
  `id` int(10) unsigned NOT NULL AUTO_INCREMENT,
  `name` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `email` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `password` varchar(60) COLLATE utf8_unicode_ci NOT NULL,
  `remember_token` varchar(100) COLLATE utf8_unicode_ci DEFAULT NULL,
  `created_at` timestamp NOT NULL DEFAULT '0000-00-00 00:00:00',
  `updated_at` timestamp NOT NULL DEFAULT '0000-00-00 00:00:00',
  PRIMARY KEY (`id`),
  UNIQUE KEY `users_email_unique` (`email`)
) ENGINE=InnoDB  DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci AUTO_INCREMENT=3 ;

--
-- Dumping data for table `users`
--

INSERT INTO `users` (`id`, `name`, `email`, `password`, `remember_token`, `created_at`, `updated_at`) VALUES
(1, 'admin', 'johnjayanora@gmail.com', '$2y$10$SpB.TQIiG9BPQeFJdlgIweaAgHBqhgkhBWuyKNbqt/rXC9QV7oiRK', 'tNcNrMVsDJN6seCtQJ2HkkxJbhGA9NfvBh6uYfHnKju4nH1sIYp5QUEqGQvX', '2016-06-22 03:07:15', '2016-08-19 03:08:52'),
(2, 'john', 'johnjayanora@gnail.com', '$2y$10$bkjCreSNGqRmJG0oTICFcOg5UeYTZkNGlv.Jxb5DTLhB8gCfNrdcm', 'ClyikQRW6IakXbuTQyJU30f3pfY4EX3EDT6BHYBcwXR8SMpaRjkJGEB6Icol', '2016-07-06 13:30:35', '2016-08-15 07:05:01');

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
