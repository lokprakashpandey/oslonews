-- phpMyAdmin SQL Dump
-- version 4.2.7
-- http://www.phpmyadmin.net
--
-- Host: localhost
-- Generation Time: Jan 13, 2016 at 01:21 PM
-- Server version: 5.6.17
-- PHP Version: 5.5.12

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8 */;

--
-- Database: `oslotimeshub`
--

-- --------------------------------------------------------

--
-- Table structure for table `author_profiles`
--

CREATE TABLE IF NOT EXISTS `author_profiles` (
`id` int(11) NOT NULL,
  `name` varchar(100) NOT NULL,
  `address` varchar(45) DEFAULT NULL,
  `phone` varchar(45) DEFAULT NULL,
  `email` varchar(150) NOT NULL,
  `twitter` varchar(50) NOT NULL,
  `img` varchar(100) NOT NULL,
  `description` text NOT NULL,
  `user_id` int(10) unsigned NOT NULL
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=5 ;

--
-- Dumping data for table `author_profiles`
--

INSERT INTO `author_profiles` (`id`, `name`, `address`, `phone`, `email`, `twitter`, `img`, `description`, `user_id`) VALUES
(2, 'oslo', '', '', 'admin@oslotimes.com', '', '', '', 1),
(4, 'The Author', 'Kathmandu', '', 'theauthor@theoslotimes.com', '', '', '', 1);

-- --------------------------------------------------------

--
-- Table structure for table `categories`
--

CREATE TABLE IF NOT EXISTS `categories` (
`id` int(4) NOT NULL,
  `name` varchar(45) DEFAULT NULL,
  `parent_id` int(4) DEFAULT NULL,
  `position` int(3) NOT NULL,
  `cat_type` tinyint(1) NOT NULL,
  `slug` varchar(255) NOT NULL,
  `default_menu` tinyint(1) NOT NULL,
  `default_front` tinyint(1) NOT NULL
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=115 ;

--
-- Dumping data for table `categories`
--

INSERT INTO `categories` (`id`, `name`, `parent_id`, `position`, `cat_type`, `slug`, `default_menu`, `default_front`) VALUES
(1, 'Rights Issues', 0, 1, 1, 'rights-issues', 1, 0),
(2, 'Human Rights', 1, 2, 1, 'human-rights', 1, 1),
(3, 'Women Rights', 1, 3, 1, 'women-rights', 1, 0),
(106, 'Lifestyle', 0, 4, 1, 'lifestyle', 0, 0),
(108, 'Business', 0, 6, 1, 'business', 0, 1),
(109, 'Sports', 0, 7, 1, 'sports', 0, 0),
(110, 'Politics', 0, 8, 1, 'politics', 0, 0),
(111, 'Beauty', 106, 9, 1, 'beauty', 0, 1),
(113, 'Entertainment', 0, 10, 1, 'entertainment', 1, 0),
(114, 'Child Rights', 1, 11, 1, 'child-rights', 0, 0);

-- --------------------------------------------------------

--
-- Table structure for table `category_country`
--

CREATE TABLE IF NOT EXISTS `category_country` (
`id` int(4) NOT NULL,
  `country_id` int(3) NOT NULL,
  `category_id` int(4) NOT NULL,
  `cnt_in_main_menu` tinyint(1) DEFAULT NULL
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=9 ;

--
-- Dumping data for table `category_country`
--

INSERT INTO `category_country` (`id`, `country_id`, `category_id`, `cnt_in_main_menu`) VALUES
(1, 1, 1, NULL),
(2, 3, 1, NULL),
(3, 1, 2, NULL),
(4, 3, 2, NULL),
(5, 1, 3, NULL),
(6, 3, 3, NULL),
(7, 1, 106, NULL),
(8, 5, 106, NULL);

-- --------------------------------------------------------

--
-- Table structure for table `category_country_hub`
--

CREATE TABLE IF NOT EXISTS `category_country_hub` (
`id` int(11) NOT NULL,
  `country_hub_id` int(4) NOT NULL,
  `category_id` int(4) NOT NULL,
  `cnt_cat_in_main_menu` tinyint(1) NOT NULL,
  `cnt_cat_in_front` tinyint(1) NOT NULL
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=69 ;

--
-- Dumping data for table `category_country_hub`
--

INSERT INTO `category_country_hub` (`id`, `country_hub_id`, `category_id`, `cnt_cat_in_main_menu`, `cnt_cat_in_front`) VALUES
(1, 2, 1, 1, 0),
(2, 4, 106, 1, 1),
(3, 4, 1, 1, 0),
(4, 5, 110, 1, 0),
(7, 6, 109, 0, 0),
(8, 6, 106, 1, 0),
(13, 7, 1, 1, 0),
(15, 8, 1, 1, 0),
(26, 13, 1, 0, 0),
(28, 13, 113, 0, 0),
(29, 13, 2, 0, 0),
(40, 2, 2, 0, 1),
(42, 18, 1, 0, 0),
(43, 18, 2, 0, 0),
(44, 18, 3, 0, 0),
(47, 9, 108, 0, 0),
(48, 9, 2, 0, 0),
(49, 15, 1, 0, 0),
(50, 15, 2, 0, 0),
(51, 15, 3, 0, 0),
(52, 15, 108, 0, 0),
(53, 15, 110, 0, 0),
(54, 17, 1, 0, 0),
(55, 17, 2, 0, 0),
(56, 17, 108, 0, 0),
(57, 4, 111, 1, 0),
(58, 4, 3, 0, 0),
(59, 5, 106, 0, 0),
(60, 5, 111, 0, 0),
(61, 6, 111, 0, 0),
(62, 11, 108, 0, 0),
(63, 11, 106, 0, 0),
(64, 11, 111, 0, 0),
(65, 7, 2, 0, 1),
(66, 7, 108, 0, 1),
(67, 8, 113, 0, 0),
(68, 8, 2, 0, 1);

-- --------------------------------------------------------

--
-- Table structure for table `category_country_hub_news`
--

CREATE TABLE IF NOT EXISTS `category_country_hub_news` (
  `news_id` int(11) NOT NULL,
  `category_country_hub_id` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Table structure for table `category_hub`
--

CREATE TABLE IF NOT EXISTS `category_hub` (
`id` int(8) NOT NULL,
  `hub_id` int(3) DEFAULT NULL,
  `category_id` int(4) DEFAULT NULL,
  `in_main_menu` tinyint(1) NOT NULL,
  `in_front` tinyint(1) NOT NULL
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=53 ;

--
-- Dumping data for table `category_hub`
--

INSERT INTO `category_hub` (`id`, `hub_id`, `category_id`, `in_main_menu`, `in_front`) VALUES
(11, 2, 108, 1, 0),
(12, 2, 109, 0, 1),
(14, 3, 108, 0, 1),
(16, 2, 110, 0, 1),
(18, 2, 111, 1, 1),
(25, 5, 113, 1, 1),
(29, 3, 113, 1, 1),
(30, 5, 1, 1, 0),
(31, 6, 1, 1, 0),
(32, 2, 106, 1, 0),
(33, 3, 1, 1, 0),
(34, 2, 1, 1, 0),
(35, 9, 1, 0, 0),
(36, 9, 109, 0, 0),
(37, 4, 1, 0, 0),
(38, 4, 113, 1, 0),
(39, 1, 2, 0, 1),
(41, 1, 1, 1, 0),
(43, 3, 2, 0, 1),
(44, 2, 3, 0, 0),
(45, 6, 2, 0, 0),
(46, 6, 3, 0, 0),
(47, 6, 108, 0, 0),
(48, 6, 110, 0, 0),
(50, 4, 2, 0, 1),
(51, 2, 2, 0, 0),
(52, 1, 108, 0, 1);

-- --------------------------------------------------------

--
-- Table structure for table `category_hub_news`
--

CREATE TABLE IF NOT EXISTS `category_hub_news` (
  `category_hub_id` int(11) NOT NULL,
  `news_id` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Table structure for table `category_news`
--

CREATE TABLE IF NOT EXISTS `category_news` (
  `category_id` int(11) NOT NULL,
  `news_id` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Table structure for table `comments`
--

CREATE TABLE IF NOT EXISTS `comments` (
`id` int(10) unsigned NOT NULL,
  `comment` text COLLATE utf8_unicode_ci NOT NULL,
  `user_id` int(10) unsigned NOT NULL,
  `news_id` int(11) NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci AUTO_INCREMENT=1 ;

-- --------------------------------------------------------

--
-- Table structure for table `continents`
--

CREATE TABLE IF NOT EXISTS `continents` (
`id` int(3) NOT NULL,
  `name` varchar(45) DEFAULT NULL,
  `slug` varchar(50) DEFAULT NULL
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=8 ;

--
-- Dumping data for table `continents`
--

INSERT INTO `continents` (`id`, `name`, `slug`) VALUES
(1, 'Asia', 'asia'),
(2, 'Europe', 'europe'),
(3, 'Africa', 'africa'),
(4, 'Antarctica', 'antarctica'),
(5, 'Australia', 'australia'),
(6, 'North America', 'north-america'),
(7, 'South America', 'south-america');

-- --------------------------------------------------------

--
-- Table structure for table `countries`
--

CREATE TABLE IF NOT EXISTS `countries` (
`id` int(3) NOT NULL,
  `name` varchar(100) DEFAULT NULL,
  `slug` varchar(100) DEFAULT NULL,
  `continent_id` int(3) NOT NULL,
  `default_country` tinyint(1) NOT NULL,
  `default_front_country` tinyint(1) NOT NULL
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=10 ;

--
-- Dumping data for table `countries`
--

INSERT INTO `countries` (`id`, `name`, `slug`, `continent_id`, `default_country`, `default_front_country`) VALUES
(1, 'Nepal', 'nepal', 1, 1, 0),
(2, 'Algeria', 'algeria', 3, 0, 0),
(3, 'China', 'china', 1, 0, 0),
(4, 'Norway', 'norway', 2, 0, 0),
(5, 'Cuba', 'cuba', 6, 0, 0),
(6, 'Brazil', 'brazil', 7, 0, 0),
(7, 'India', 'india', 1, 0, 0),
(8, 'Bhutan', 'bhutan', 1, 0, 0),
(9, 'Shreelanka', 'shreelanka', 1, 0, 0);

-- --------------------------------------------------------

--
-- Table structure for table `country_hub`
--

CREATE TABLE IF NOT EXISTS `country_hub` (
`id` int(4) NOT NULL,
  `hub_id` int(3) NOT NULL,
  `country_id` int(3) NOT NULL,
  `cnt_in_main_menu` tinyint(1) NOT NULL,
  `cnt_in_front` tinyint(1) NOT NULL
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=20 ;

--
-- Dumping data for table `country_hub`
--

INSERT INTO `country_hub` (`id`, `hub_id`, `country_id`, `cnt_in_main_menu`, `cnt_in_front`) VALUES
(2, 1, 4, 1, 0),
(4, 2, 4, 1, 0),
(5, 2, 5, 1, 0),
(6, 2, 2, 1, 0),
(7, 3, 1, 0, 0),
(8, 3, 8, 1, 0),
(9, 3, 7, 1, 0),
(11, 2, 6, 1, 0),
(13, 4, 6, 1, 0),
(14, 5, 6, 0, 0),
(15, 6, 6, 0, 0),
(16, 7, 6, 0, 0),
(17, 6, 8, 0, 0),
(18, 6, 1, 1, 0),
(19, 4, 1, 0, 0);

-- --------------------------------------------------------

--
-- Table structure for table `hubs`
--

CREATE TABLE IF NOT EXISTS `hubs` (
`id` int(3) NOT NULL,
  `name` varchar(150) DEFAULT NULL,
  `slug` varchar(150) DEFAULT NULL
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=10 ;

--
-- Dumping data for table `hubs`
--

INSERT INTO `hubs` (`id`, `name`, `slug`) VALUES
(1, 'International Edition', 'international-edition'),
(2, 'TOT Norway', 'tot-norway'),
(3, 'Exclusive Interviews', 'exclusive-interviews'),
(4, 'Extremism Alert', 'extremism-alert'),
(5, 'Journalist Front', 'journalist-front'),
(6, 'Human Rights', 'human-rights'),
(7, 'Scitech Times', 'scitech-times'),
(8, 'test', 'test'),
(9, 'test123', 'test123');

-- --------------------------------------------------------

--
-- Table structure for table `hub_news`
--

CREATE TABLE IF NOT EXISTS `hub_news` (
  `hub_id` int(11) NOT NULL,
  `news_id` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Table structure for table `images`
--

CREATE TABLE IF NOT EXISTS `images` (
`id` int(11) NOT NULL,
  `img` varchar(150) DEFAULT NULL,
  `tags` varchar(100) DEFAULT NULL,
  `caption` varchar(255) DEFAULT NULL,
  `news_id` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1 AUTO_INCREMENT=1 ;

-- --------------------------------------------------------

--
-- Table structure for table `news`
--

CREATE TABLE IF NOT EXISTS `news` (
`id` int(11) NOT NULL,
  `name` varchar(255) DEFAULT NULL,
  `content` text,
  `front_img` varchar(25) NOT NULL,
  `user_id` int(10) unsigned NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  `publish` tinyint(1) NOT NULL,
  `position` int(4) NOT NULL,
  `slug` varchar(255) NOT NULL,
  `author_profile_id` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1 AUTO_INCREMENT=1 ;

-- --------------------------------------------------------

--
-- Table structure for table `news_type`
--

CREATE TABLE IF NOT EXISTS `news_type` (
`id` int(11) NOT NULL,
  `news_id` int(11) NOT NULL,
  `type_id` int(11) NOT NULL
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=26 ;

-- --------------------------------------------------------

--
-- Table structure for table `pages`
--

CREATE TABLE IF NOT EXISTS `pages` (
`id` int(5) NOT NULL,
  `name` varchar(255) NOT NULL,
  `content` text NOT NULL,
  `slug` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1 AUTO_INCREMENT=1 ;

-- --------------------------------------------------------

--
-- Table structure for table `password_resets`
--

CREATE TABLE IF NOT EXISTS `password_resets` (
  `email` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `token` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `roles`
--

CREATE TABLE IF NOT EXISTS `roles` (
`id` int(10) unsigned NOT NULL,
  `name` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `slug` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `description` varchar(255) COLLATE utf8_unicode_ci DEFAULT NULL,
  `level` int(11) NOT NULL DEFAULT '1',
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci AUTO_INCREMENT=1 ;

-- --------------------------------------------------------

--
-- Table structure for table `role_user`
--

CREATE TABLE IF NOT EXISTS `role_user` (
`id` int(10) unsigned NOT NULL,
  `role_id` int(10) unsigned NOT NULL,
  `user_id` int(10) unsigned NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci AUTO_INCREMENT=1 ;

-- --------------------------------------------------------

--
-- Table structure for table `types`
--

CREATE TABLE IF NOT EXISTS `types` (
`id` int(11) NOT NULL,
  `name` varchar(100) NOT NULL,
  `slug` varchar(100) NOT NULL
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=5 ;

--
-- Dumping data for table `types`
--

INSERT INTO `types` (`id`, `name`, `slug`) VALUES
(1, 'General', 'general'),
(2, 'Breaking News', 'breaking'),
(3, 'Top Stories', 'top'),
(4, 'Scrolling News', 'scrolling');

-- --------------------------------------------------------

--
-- Table structure for table `users`
--

CREATE TABLE IF NOT EXISTS `users` (
`id` int(10) unsigned NOT NULL,
  `name` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `email` varchar(255) COLLATE utf8_unicode_ci DEFAULT NULL,
  `phone` varchar(20) COLLATE utf8_unicode_ci NOT NULL,
  `address` tinytext COLLATE utf8_unicode_ci NOT NULL,
  `password` varchar(60) COLLATE utf8_unicode_ci NOT NULL,
  `remember_token` varchar(100) COLLATE utf8_unicode_ci DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  `active` tinyint(1) NOT NULL,
  `confirmation_code` varchar(255) COLLATE utf8_unicode_ci DEFAULT NULL,
  `avatar` varchar(100) COLLATE utf8_unicode_ci NOT NULL,
  `provider` varchar(100) COLLATE utf8_unicode_ci NOT NULL,
  `provider_id` varchar(100) COLLATE utf8_unicode_ci NOT NULL
) ENGINE=InnoDB  DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci AUTO_INCREMENT=2 ;

--
-- Dumping data for table `users`
--

INSERT INTO `users` (`id`, `name`, `email`, `phone`, `address`, `password`, `remember_token`, `created_at`, `updated_at`, `active`, `confirmation_code`, `avatar`, `provider`, `provider_id`) VALUES
(1, 'oslo', 'oslo@oslo.com', '', '', '', NULL, NULL, NULL, 1, NULL, '', '', '');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `author_profiles`
--
ALTER TABLE `author_profiles`
 ADD PRIMARY KEY (`id`), ADD KEY `fk_author_profiles_users1_idx` (`user_id`);

--
-- Indexes for table `categories`
--
ALTER TABLE `categories`
 ADD PRIMARY KEY (`id`), ADD UNIQUE KEY `slug` (`slug`);

--
-- Indexes for table `category_country`
--
ALTER TABLE `category_country`
 ADD PRIMARY KEY (`id`), ADD KEY `fk_countries_has_categories_categories1_idx` (`category_id`), ADD KEY `fk_countries_has_categories_countries1_idx` (`country_id`);

--
-- Indexes for table `category_country_hub`
--
ALTER TABLE `category_country_hub`
 ADD PRIMARY KEY (`id`), ADD KEY `fk_country_hub_has_categories_categories1_idx` (`category_id`), ADD KEY `fk_country_hub_has_categories_country_hub1_idx` (`country_hub_id`);

--
-- Indexes for table `category_country_hub_news`
--
ALTER TABLE `category_country_hub_news`
 ADD KEY `news_id` (`news_id`), ADD KEY `category_country_hub_id` (`category_country_hub_id`);

--
-- Indexes for table `category_hub`
--
ALTER TABLE `category_hub`
 ADD PRIMARY KEY (`id`), ADD KEY `fk_hubs_has_categories_categories1_idx` (`category_id`), ADD KEY `fk_hubs_has_categories_hubs1_idx` (`hub_id`);

--
-- Indexes for table `category_hub_news`
--
ALTER TABLE `category_hub_news`
 ADD KEY `hub_id` (`category_hub_id`), ADD KEY `news_id` (`news_id`);

--
-- Indexes for table `category_news`
--
ALTER TABLE `category_news`
 ADD KEY `category_id` (`category_id`,`news_id`), ADD KEY `news_id` (`news_id`);

--
-- Indexes for table `comments`
--
ALTER TABLE `comments`
 ADD PRIMARY KEY (`id`), ADD KEY `comments_user_id_foreign` (`user_id`), ADD KEY `comments_news_id_foreign` (`news_id`);

--
-- Indexes for table `continents`
--
ALTER TABLE `continents`
 ADD PRIMARY KEY (`id`);

--
-- Indexes for table `countries`
--
ALTER TABLE `countries`
 ADD PRIMARY KEY (`id`), ADD UNIQUE KEY `slug_UNIQUE` (`slug`), ADD KEY `fk_countries_continents1_idx` (`continent_id`);

--
-- Indexes for table `country_hub`
--
ALTER TABLE `country_hub`
 ADD PRIMARY KEY (`id`), ADD KEY `fk_hubs_has_countries_countries1_idx` (`country_id`), ADD KEY `fk_hubs_has_countries_hubs1_idx` (`hub_id`);

--
-- Indexes for table `hubs`
--
ALTER TABLE `hubs`
 ADD PRIMARY KEY (`id`);

--
-- Indexes for table `hub_news`
--
ALTER TABLE `hub_news`
 ADD KEY `hub_id` (`hub_id`), ADD KEY `news_id` (`news_id`);

--
-- Indexes for table `images`
--
ALTER TABLE `images`
 ADD PRIMARY KEY (`id`), ADD KEY `fk_images_news1_idx` (`news_id`);

--
-- Indexes for table `news`
--
ALTER TABLE `news`
 ADD PRIMARY KEY (`id`), ADD UNIQUE KEY `slug` (`slug`), ADD KEY `fk_news_users1_idx` (`user_id`), ADD KEY `fk_news_author_profiles1_idx` (`author_profile_id`);

--
-- Indexes for table `news_type`
--
ALTER TABLE `news_type`
 ADD PRIMARY KEY (`id`), ADD KEY `news_types_news_id_foreign` (`news_id`), ADD KEY `news_types_type_id_foreign` (`type_id`);

--
-- Indexes for table `pages`
--
ALTER TABLE `pages`
 ADD PRIMARY KEY (`id`);

--
-- Indexes for table `password_resets`
--
ALTER TABLE `password_resets`
 ADD KEY `password_resets_email_index` (`email`), ADD KEY `password_resets_token_index` (`token`);

--
-- Indexes for table `roles`
--
ALTER TABLE `roles`
 ADD PRIMARY KEY (`id`), ADD UNIQUE KEY `roles_slug_unique` (`slug`);

--
-- Indexes for table `role_user`
--
ALTER TABLE `role_user`
 ADD PRIMARY KEY (`id`), ADD KEY `role_user_role_id_index` (`role_id`), ADD KEY `role_user_user_id_index` (`user_id`);

--
-- Indexes for table `types`
--
ALTER TABLE `types`
 ADD PRIMARY KEY (`id`);

--
-- Indexes for table `users`
--
ALTER TABLE `users`
 ADD PRIMARY KEY (`id`), ADD UNIQUE KEY `users_email_unique` (`email`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `author_profiles`
--
ALTER TABLE `author_profiles`
MODIFY `id` int(11) NOT NULL AUTO_INCREMENT,AUTO_INCREMENT=5;
--
-- AUTO_INCREMENT for table `categories`
--
ALTER TABLE `categories`
MODIFY `id` int(4) NOT NULL AUTO_INCREMENT,AUTO_INCREMENT=115;
--
-- AUTO_INCREMENT for table `category_country`
--
ALTER TABLE `category_country`
MODIFY `id` int(4) NOT NULL AUTO_INCREMENT,AUTO_INCREMENT=9;
--
-- AUTO_INCREMENT for table `category_country_hub`
--
ALTER TABLE `category_country_hub`
MODIFY `id` int(11) NOT NULL AUTO_INCREMENT,AUTO_INCREMENT=69;
--
-- AUTO_INCREMENT for table `category_hub`
--
ALTER TABLE `category_hub`
MODIFY `id` int(8) NOT NULL AUTO_INCREMENT,AUTO_INCREMENT=53;
--
-- AUTO_INCREMENT for table `comments`
--
ALTER TABLE `comments`
MODIFY `id` int(10) unsigned NOT NULL AUTO_INCREMENT;
--
-- AUTO_INCREMENT for table `continents`
--
ALTER TABLE `continents`
MODIFY `id` int(3) NOT NULL AUTO_INCREMENT,AUTO_INCREMENT=8;
--
-- AUTO_INCREMENT for table `countries`
--
ALTER TABLE `countries`
MODIFY `id` int(3) NOT NULL AUTO_INCREMENT,AUTO_INCREMENT=10;
--
-- AUTO_INCREMENT for table `country_hub`
--
ALTER TABLE `country_hub`
MODIFY `id` int(4) NOT NULL AUTO_INCREMENT,AUTO_INCREMENT=20;
--
-- AUTO_INCREMENT for table `hubs`
--
ALTER TABLE `hubs`
MODIFY `id` int(3) NOT NULL AUTO_INCREMENT,AUTO_INCREMENT=10;
--
-- AUTO_INCREMENT for table `images`
--
ALTER TABLE `images`
MODIFY `id` int(11) NOT NULL AUTO_INCREMENT;
--
-- AUTO_INCREMENT for table `news`
--
ALTER TABLE `news`
MODIFY `id` int(11) NOT NULL AUTO_INCREMENT;
--
-- AUTO_INCREMENT for table `news_type`
--
ALTER TABLE `news_type`
MODIFY `id` int(11) NOT NULL AUTO_INCREMENT,AUTO_INCREMENT=26;
--
-- AUTO_INCREMENT for table `pages`
--
ALTER TABLE `pages`
MODIFY `id` int(5) NOT NULL AUTO_INCREMENT;
--
-- AUTO_INCREMENT for table `roles`
--
ALTER TABLE `roles`
MODIFY `id` int(10) unsigned NOT NULL AUTO_INCREMENT;
--
-- AUTO_INCREMENT for table `role_user`
--
ALTER TABLE `role_user`
MODIFY `id` int(10) unsigned NOT NULL AUTO_INCREMENT;
--
-- AUTO_INCREMENT for table `types`
--
ALTER TABLE `types`
MODIFY `id` int(11) NOT NULL AUTO_INCREMENT,AUTO_INCREMENT=5;
--
-- AUTO_INCREMENT for table `users`
--
ALTER TABLE `users`
MODIFY `id` int(10) unsigned NOT NULL AUTO_INCREMENT,AUTO_INCREMENT=2;
--
-- Constraints for dumped tables
--

--
-- Constraints for table `author_profiles`
--
ALTER TABLE `author_profiles`
ADD CONSTRAINT `fk_author_profiles_users1` FOREIGN KEY (`user_id`) REFERENCES `users` (`id`) ON DELETE CASCADE ON UPDATE NO ACTION;

--
-- Constraints for table `category_country`
--
ALTER TABLE `category_country`
ADD CONSTRAINT `fk_countries_has_categories_categories1` FOREIGN KEY (`category_id`) REFERENCES `categories` (`id`) ON DELETE NO ACTION ON UPDATE NO ACTION,
ADD CONSTRAINT `fk_countries_has_categories_countries1` FOREIGN KEY (`country_id`) REFERENCES `countries` (`id`) ON DELETE NO ACTION ON UPDATE NO ACTION;

--
-- Constraints for table `category_country_hub`
--
ALTER TABLE `category_country_hub`
ADD CONSTRAINT `fk_country_hub_has_categories_categories1` FOREIGN KEY (`category_id`) REFERENCES `categories` (`id`) ON DELETE CASCADE ON UPDATE CASCADE,
ADD CONSTRAINT `fk_country_hub_has_categories_country_hub1` FOREIGN KEY (`country_hub_id`) REFERENCES `country_hub` (`id`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Constraints for table `category_country_hub_news`
--
ALTER TABLE `category_country_hub_news`
ADD CONSTRAINT `fk_news_has_category_country_hub_category_country_hub1` FOREIGN KEY (`category_country_hub_id`) REFERENCES `category_country_hub` (`id`) ON DELETE CASCADE ON UPDATE CASCADE,
ADD CONSTRAINT `fk_news_has_category_country_hub_news1` FOREIGN KEY (`news_id`) REFERENCES `news` (`id`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Constraints for table `category_hub`
--
ALTER TABLE `category_hub`
ADD CONSTRAINT `fk_hubs_has_categories_categories1` FOREIGN KEY (`category_id`) REFERENCES `categories` (`id`) ON DELETE NO ACTION ON UPDATE NO ACTION,
ADD CONSTRAINT `fk_hubs_has_categories_hubs1` FOREIGN KEY (`hub_id`) REFERENCES `hubs` (`id`) ON DELETE NO ACTION ON UPDATE NO ACTION;

--
-- Constraints for table `category_hub_news`
--
ALTER TABLE `category_hub_news`
ADD CONSTRAINT `fk_category_hub_news_id` FOREIGN KEY (`category_hub_id`) REFERENCES `category_hub` (`id`) ON DELETE CASCADE ON UPDATE CASCADE,
ADD CONSTRAINT `fk_category_hub_news_news_id` FOREIGN KEY (`news_id`) REFERENCES `news` (`id`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Constraints for table `category_news`
--
ALTER TABLE `category_news`
ADD CONSTRAINT `fk_category_news_id` FOREIGN KEY (`news_id`) REFERENCES `news` (`id`) ON DELETE CASCADE ON UPDATE CASCADE,
ADD CONSTRAINT `fk_news_category_id` FOREIGN KEY (`category_id`) REFERENCES `categories` (`id`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Constraints for table `comments`
--
ALTER TABLE `comments`
ADD CONSTRAINT `comments_news_id_foreign` FOREIGN KEY (`news_id`) REFERENCES `news` (`id`) ON DELETE CASCADE,
ADD CONSTRAINT `comments_user_id_foreign` FOREIGN KEY (`user_id`) REFERENCES `users` (`id`) ON DELETE CASCADE;

--
-- Constraints for table `countries`
--
ALTER TABLE `countries`
ADD CONSTRAINT `fk_countries_continents1` FOREIGN KEY (`continent_id`) REFERENCES `continents` (`id`) ON DELETE NO ACTION ON UPDATE NO ACTION;

--
-- Constraints for table `country_hub`
--
ALTER TABLE `country_hub`
ADD CONSTRAINT `fk_hubs_has_countries_countries1` FOREIGN KEY (`country_id`) REFERENCES `countries` (`id`) ON DELETE CASCADE ON UPDATE CASCADE,
ADD CONSTRAINT `fk_hubs_has_countries_hubs1` FOREIGN KEY (`hub_id`) REFERENCES `hubs` (`id`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Constraints for table `hub_news`
--
ALTER TABLE `hub_news`
ADD CONSTRAINT `fk_hub_hub_id` FOREIGN KEY (`hub_id`) REFERENCES `hubs` (`id`) ON DELETE CASCADE ON UPDATE CASCADE,
ADD CONSTRAINT `fk_news_news_id` FOREIGN KEY (`news_id`) REFERENCES `news` (`id`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Constraints for table `images`
--
ALTER TABLE `images`
ADD CONSTRAINT `fk_images_news1` FOREIGN KEY (`news_id`) REFERENCES `news` (`id`) ON DELETE NO ACTION ON UPDATE NO ACTION;

--
-- Constraints for table `news`
--
ALTER TABLE `news`
ADD CONSTRAINT `fk_news_author_profiles1` FOREIGN KEY (`author_profile_id`) REFERENCES `author_profiles` (`id`) ON DELETE NO ACTION ON UPDATE NO ACTION,
ADD CONSTRAINT `fk_news_users1` FOREIGN KEY (`user_id`) REFERENCES `users` (`id`) ON DELETE CASCADE ON UPDATE NO ACTION;

--
-- Constraints for table `news_type`
--
ALTER TABLE `news_type`
ADD CONSTRAINT `news_types_news_id_foreign` FOREIGN KEY (`news_id`) REFERENCES `news` (`id`) ON DELETE CASCADE,
ADD CONSTRAINT `news_types_type_id_foreign` FOREIGN KEY (`type_id`) REFERENCES `types` (`id`) ON DELETE CASCADE;

--
-- Constraints for table `role_user`
--
ALTER TABLE `role_user`
ADD CONSTRAINT `role_user_role_id_foreign` FOREIGN KEY (`role_id`) REFERENCES `roles` (`id`) ON DELETE CASCADE,
ADD CONSTRAINT `role_user_user_id_foreign` FOREIGN KEY (`user_id`) REFERENCES `users` (`id`) ON DELETE CASCADE;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
