-- phpMyAdmin SQL Dump
-- version 4.2.7
-- http://www.phpmyadmin.net
--
-- Host: localhost
-- Generation Time: Dec 10, 2015 at 06:45 PM
-- Server version: 5.6.17
-- PHP Version: 5.5.12

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8 */;

--
-- Database: `oslotimescom`
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
) ENGINE=InnoDB DEFAULT CHARSET=latin1 AUTO_INCREMENT=1 ;

-- --------------------------------------------------------

--
-- Table structure for table `categories`
--

CREATE TABLE IF NOT EXISTS `categories` (
`id` int(4) NOT NULL,
  `name` varchar(45) DEFAULT NULL,
  `parent_id` int(4) DEFAULT NULL,
  `position` int(3) NOT NULL,
  `in_front` tinyint(1) NOT NULL,
  `in_main_menu` tinyint(1) NOT NULL,
  `cat_type` tinyint(1) NOT NULL,
  `slug` varchar(255) NOT NULL
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=4 ;

--
-- Dumping data for table `categories`
--

INSERT INTO `categories` (`id`, `name`, `parent_id`, `position`, `in_front`, `in_main_menu`, `cat_type`, `slug`) VALUES
(1, 'Rights Issues', 0, 1, 1, 0, 1, 'rights-issues'),
(2, 'Human Rights', 1, 2, 0, 1, 1, 'human-rights'),
(3, 'Women Rights', 1, 3, 0, 1, 1, 'women-rights');

-- --------------------------------------------------------

--
-- Table structure for table `category_country`
--

CREATE TABLE IF NOT EXISTS `category_country` (
`id` int(4) NOT NULL,
  `country_id` int(3) NOT NULL,
  `category_id` int(4) NOT NULL
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=9 ;

--
-- Dumping data for table `category_country`
--

INSERT INTO `category_country` (`id`, `country_id`, `category_id`) VALUES
(1, 1, 1),
(2, 3, 1),
(3, 1, 2),
(4, 3, 2),
(5, 5, 2),
(6, 1, 3),
(7, 4, 3),
(8, 6, 3);

-- --------------------------------------------------------

--
-- Table structure for table `category_hub`
--

CREATE TABLE IF NOT EXISTS `category_hub` (
`id` int(8) NOT NULL,
  `hub_id` int(3) DEFAULT NULL,
  `category_id` int(4) DEFAULT NULL
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=8 ;

--
-- Dumping data for table `category_hub`
--

INSERT INTO `category_hub` (`id`, `hub_id`, `category_id`) VALUES
(1, 2, 1),
(2, 3, 1),
(4, 3, 2),
(5, 2, 2),
(6, 2, 3),
(7, 6, 3);

-- --------------------------------------------------------

--
-- Table structure for table `category_news`
--

CREATE TABLE IF NOT EXISTS `category_news` (
`id` int(10) unsigned NOT NULL,
  `category_id` int(11) NOT NULL,
  `news_id` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci AUTO_INCREMENT=1 ;

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
  `continent_id` int(3) NOT NULL
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=7 ;

--
-- Dumping data for table `countries`
--

INSERT INTO `countries` (`id`, `name`, `slug`, `continent_id`) VALUES
(1, 'Nepal', 'nepal', 1),
(2, 'Algeria', 'algeria', 3),
(3, 'China', 'china', 1),
(4, 'Norway', 'norway', 2),
(5, 'Cuba', 'cuba', 6),
(6, 'Brazil', 'brazil', 7);

-- --------------------------------------------------------

--
-- Table structure for table `country_news`
--

CREATE TABLE IF NOT EXISTS `country_news` (
`id` int(11) NOT NULL,
  `news_id` int(11) NOT NULL,
  `country_id` int(3) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1 AUTO_INCREMENT=1 ;

-- --------------------------------------------------------

--
-- Table structure for table `hubs`
--

CREATE TABLE IF NOT EXISTS `hubs` (
`id` int(3) NOT NULL,
  `name` varchar(150) DEFAULT NULL,
  `slug` varchar(150) DEFAULT NULL
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=8 ;

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
(7, 'Scitech Times', 'scitech-times');

-- --------------------------------------------------------

--
-- Table structure for table `hub_news`
--

CREATE TABLE IF NOT EXISTS `hub_news` (
`id` int(11) NOT NULL,
  `news_id` int(11) NOT NULL,
  `hub_id` int(3) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1 AUTO_INCREMENT=1 ;

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
) ENGINE=InnoDB DEFAULT CHARSET=latin1 AUTO_INCREMENT=1 ;

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
) ENGINE=InnoDB DEFAULT CHARSET=latin1 AUTO_INCREMENT=1 ;

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
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci AUTO_INCREMENT=1 ;

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
-- Indexes for table `category_hub`
--
ALTER TABLE `category_hub`
 ADD PRIMARY KEY (`id`), ADD KEY `fk_hubs_has_categories_categories1_idx` (`category_id`), ADD KEY `fk_hubs_has_categories_hubs1_idx` (`hub_id`);

--
-- Indexes for table `category_news`
--
ALTER TABLE `category_news`
 ADD PRIMARY KEY (`id`), ADD KEY `category_news_category_id_foreign` (`category_id`), ADD KEY `category_news_news_id_foreign` (`news_id`);

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
 ADD PRIMARY KEY (`id`), ADD KEY `fk_countries_continents1_idx` (`continent_id`);

--
-- Indexes for table `country_news`
--
ALTER TABLE `country_news`
 ADD PRIMARY KEY (`id`), ADD KEY `fk_news_has_countries_countries1_idx` (`country_id`), ADD KEY `fk_news_has_countries_news1_idx` (`news_id`);

--
-- Indexes for table `hubs`
--
ALTER TABLE `hubs`
 ADD PRIMARY KEY (`id`);

--
-- Indexes for table `hub_news`
--
ALTER TABLE `hub_news`
 ADD PRIMARY KEY (`id`), ADD KEY `fk_news_has_hubs_hubs1_idx` (`hub_id`), ADD KEY `fk_news_has_hubs_news1_idx` (`news_id`);

--
-- Indexes for table `images`
--
ALTER TABLE `images`
 ADD PRIMARY KEY (`id`), ADD KEY `news_id` (`news_id`);

--
-- Indexes for table `news`
--
ALTER TABLE `news`
 ADD PRIMARY KEY (`id`), ADD UNIQUE KEY `slug` (`slug`), ADD KEY `fk_news_users1_idx` (`user_id`), ADD KEY `author_profile_id` (`author_profile_id`);

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
MODIFY `id` int(11) NOT NULL AUTO_INCREMENT;
--
-- AUTO_INCREMENT for table `categories`
--
ALTER TABLE `categories`
MODIFY `id` int(4) NOT NULL AUTO_INCREMENT,AUTO_INCREMENT=4;
--
-- AUTO_INCREMENT for table `category_country`
--
ALTER TABLE `category_country`
MODIFY `id` int(4) NOT NULL AUTO_INCREMENT,AUTO_INCREMENT=9;
--
-- AUTO_INCREMENT for table `category_hub`
--
ALTER TABLE `category_hub`
MODIFY `id` int(8) NOT NULL AUTO_INCREMENT,AUTO_INCREMENT=8;
--
-- AUTO_INCREMENT for table `category_news`
--
ALTER TABLE `category_news`
MODIFY `id` int(10) unsigned NOT NULL AUTO_INCREMENT;
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
MODIFY `id` int(3) NOT NULL AUTO_INCREMENT,AUTO_INCREMENT=7;
--
-- AUTO_INCREMENT for table `country_news`
--
ALTER TABLE `country_news`
MODIFY `id` int(11) NOT NULL AUTO_INCREMENT;
--
-- AUTO_INCREMENT for table `hubs`
--
ALTER TABLE `hubs`
MODIFY `id` int(3) NOT NULL AUTO_INCREMENT,AUTO_INCREMENT=8;
--
-- AUTO_INCREMENT for table `hub_news`
--
ALTER TABLE `hub_news`
MODIFY `id` int(11) NOT NULL AUTO_INCREMENT;
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
MODIFY `id` int(11) NOT NULL AUTO_INCREMENT;
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
MODIFY `id` int(11) NOT NULL AUTO_INCREMENT;
--
-- AUTO_INCREMENT for table `users`
--
ALTER TABLE `users`
MODIFY `id` int(10) unsigned NOT NULL AUTO_INCREMENT;
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
-- Constraints for table `category_hub`
--
ALTER TABLE `category_hub`
ADD CONSTRAINT `fk_hubs_has_categories_categories1` FOREIGN KEY (`category_id`) REFERENCES `categories` (`id`) ON DELETE NO ACTION ON UPDATE NO ACTION,
ADD CONSTRAINT `fk_hubs_has_categories_hubs1` FOREIGN KEY (`hub_id`) REFERENCES `hubs` (`id`) ON DELETE NO ACTION ON UPDATE NO ACTION;

--
-- Constraints for table `category_news`
--
ALTER TABLE `category_news`
ADD CONSTRAINT `category_news_category_id_foreign` FOREIGN KEY (`category_id`) REFERENCES `categories` (`id`) ON DELETE CASCADE,
ADD CONSTRAINT `category_news_news_id_foreign` FOREIGN KEY (`news_id`) REFERENCES `news` (`id`) ON DELETE CASCADE;

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
-- Constraints for table `country_news`
--
ALTER TABLE `country_news`
ADD CONSTRAINT `fk_news_has_countries_countries1` FOREIGN KEY (`country_id`) REFERENCES `countries` (`id`) ON DELETE NO ACTION ON UPDATE NO ACTION,
ADD CONSTRAINT `fk_news_has_countries_news1` FOREIGN KEY (`news_id`) REFERENCES `news` (`id`) ON DELETE NO ACTION ON UPDATE NO ACTION;

--
-- Constraints for table `hub_news`
--
ALTER TABLE `hub_news`
ADD CONSTRAINT `fk_news_has_hubs_hubs1` FOREIGN KEY (`hub_id`) REFERENCES `hubs` (`id`) ON DELETE NO ACTION ON UPDATE NO ACTION,
ADD CONSTRAINT `fk_news_has_hubs_news1` FOREIGN KEY (`news_id`) REFERENCES `news` (`id`) ON DELETE NO ACTION ON UPDATE NO ACTION;

--
-- Constraints for table `images`
--
ALTER TABLE `images`
ADD CONSTRAINT `fk_news_has_images` FOREIGN KEY (`news_id`) REFERENCES `news` (`id`) ON DELETE CASCADE;

--
-- Constraints for table `news`
--
ALTER TABLE `news`
ADD CONSTRAINT `fk_news_has_author` FOREIGN KEY (`author_profile_id`) REFERENCES `author_profiles` (`id`) ON DELETE CASCADE ON UPDATE CASCADE,
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
