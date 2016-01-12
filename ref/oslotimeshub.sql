-- phpMyAdmin SQL Dump
-- version 4.2.7
-- http://www.phpmyadmin.net
--
-- Host: localhost
-- Generation Time: Jan 08, 2016 at 08:09 PM
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
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=3 ;

--
-- Dumping data for table `author_profiles`
--

INSERT INTO `author_profiles` (`id`, `name`, `address`, `phone`, `email`, `twitter`, `img`, `description`, `user_id`) VALUES
(2, 'oslo', NULL, NULL, '', '', '', '', 1);

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
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=114 ;

--
-- Dumping data for table `categories`
--

INSERT INTO `categories` (`id`, `name`, `parent_id`, `position`, `cat_type`, `slug`, `default_menu`, `default_front`) VALUES
(1, 'Rights Issues', 0, 1, 1, 'rights-issues', 1, 0),
(2, 'Human Rights', 1, 2, 1, 'human-rights', 0, 1),
(3, 'Women Rights', 1, 3, 1, 'women-rights', 1, 0),
(106, 'Lifestyle', 0, 4, 1, 'lifestyle', 0, 0),
(108, 'Business', 0, 6, 1, 'business', 0, 1),
(109, 'Sports', 0, 7, 1, 'sports', 0, 0),
(110, 'Politics', 0, 8, 1, 'politics', 0, 0),
(111, 'Beauty', 106, 9, 1, 'beauty', 0, 1),
(113, 'Entertainment', 0, 10, 1, 'entertainment', 1, 0);

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
(2, 4, 106, 0, 1),
(3, 4, 1, 1, 0),
(4, 5, 110, 0, 0),
(7, 6, 109, 0, 0),
(8, 6, 106, 1, 0),
(13, 7, 1, 1, 0),
(15, 8, 1, 1, 0),
(26, 13, 1, 0, 0),
(28, 13, 113, 0, 0),
(29, 13, 2, 0, 0),
(40, 2, 2, 0, 0),
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
(57, 4, 111, 0, 0),
(58, 4, 3, 0, 0),
(59, 5, 106, 0, 0),
(60, 5, 111, 0, 0),
(61, 6, 111, 0, 0),
(62, 11, 108, 0, 0),
(63, 11, 106, 0, 0),
(64, 11, 111, 0, 0),
(65, 7, 2, 0, 0),
(66, 7, 108, 0, 0),
(67, 8, 113, 0, 0),
(68, 8, 2, 0, 0);

-- --------------------------------------------------------

--
-- Table structure for table `category_country_hub_news`
--

CREATE TABLE IF NOT EXISTS `category_country_hub_news` (
  `news_id` int(11) NOT NULL,
  `category_country_hub_id` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `category_country_hub_news`
--

INSERT INTO `category_country_hub_news` (`news_id`, `category_country_hub_id`) VALUES
(1, 40),
(1, 65),
(1, 50),
(1, 55),
(2, 62),
(2, 66),
(2, 47),
(2, 52),
(3, 40),
(3, 29),
(4, 40),
(4, 29),
(4, 50),
(5, 65),
(5, 68);

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
(32, 2, 106, 0, 0),
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

--
-- Dumping data for table `category_hub_news`
--

INSERT INTO `category_hub_news` (`category_hub_id`, `news_id`) VALUES
(39, 1),
(43, 1),
(45, 1),
(45, 1),
(11, 2),
(14, 2),
(14, 2),
(47, 2),
(39, 3),
(50, 3),
(39, 4),
(50, 4),
(45, 4),
(43, 5);

-- --------------------------------------------------------

--
-- Table structure for table `category_news`
--

CREATE TABLE IF NOT EXISTS `category_news` (
  `category_id` int(11) NOT NULL,
  `news_id` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `category_news`
--

INSERT INTO `category_news` (`category_id`, `news_id`) VALUES
(2, 1),
(2, 3),
(2, 4),
(2, 5),
(108, 2);

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
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=9 ;

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
(8, 'Bhutan', 'bhutan', 1, 0, 0);

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
(7, 3, 1, 1, 0),
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
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=6 ;

--
-- Dumping data for table `news`
--

INSERT INTO `news` (`id`, `name`, `content`, `front_img`, `user_id`, `created_at`, `updated_at`, `publish`, `position`, `slug`, `author_profile_id`) VALUES
(1, 'The Republicans pour outrage over President Obama''s Oval Office Speech', 'Dec 7, WASHINGTON &mdash; President Obama&#39;s oval&nbsp; office speech has sparked an outrage amongst the Republicans who have criticized him for it. According to reports,&nbsp; Donald Trump, tweeted that Obama had too little to say about defeating the Islamic State in the wake of mass attacks in Paris and San Bernardino, Calif. &ldquo;Is that all there is?&rdquo; Trump said. &ldquo;We need a new President &ndash; FAST!&rdquo;<br />\r\nWhile, Sen. Marco Rubio, R-Fla, right after the speech, told fox news that Obama had failed to address public concerns about the threats from the Islamic State.&quot; Nothing the president said &ldquo;will assuage people&rsquo;s fears,&rdquo; the Florida senator said. &ldquo;We are at war with a radical jihadist group,&rdquo; Rubio said. Leaders of the Republican-run Congress have also denounced Obama&rsquo;s speech. House Speaker Paul Ryan, R-Wis., called it &ldquo;disappointing: no new plan, just a half-hearted attempt to defend and distract from a failing policy.&rdquo;<br />\r\nMeanwhile, the Republicans have also said that Obama&rsquo;s strategy has not been working, and mocked the president for declining to use the words &ldquo;radical Islamic terrorism.&rdquo;&nbsp; After Obama&rsquo;s speech Sunday,&nbsp; Sen. Ted Cruz, R-Tex., said that if he wins the presidency, he will order the Pentagon to &ldquo;destroy&rdquo; the Islamic State, and &ldquo;shut down the broken immigration system&rdquo; that is letting terrorists into the country. &ldquo;Nothing President Obama said tonight will assist in either case,&rdquo; Cruz said.<br />\r\nIn his remarks, Obama appeared to reference the presidential campaign by denouncing what he called divisive rhetoric about Muslims and terrorism. &ldquo;We cannot turn against one another by letting this fight be defined as a war between America and Islam,&rdquo; he said.', 'test', 1, '2016-01-08 11:23:49', '2016-01-08 11:23:49', 1, 0, 'the-republicans-pour-outrage-over-president-obamas-oval-office-speech', 2),
(2, 'President Obama urged to discuss Rights issues with the Saudi King ', 'Sept 3, Washington: Human Rights organizations have urged President Barack Obama to focus on Human Rights issues during his talks with the Saudi king Salman on Friday.<br />\r\n<br />\r\n&ldquo;If the United States is serious about confronting violent extremism, U.S. relations with Saudi Arabia should give priority to calling for greater tolerance for political pluralism and independent civil society in that country,&rdquo; said Mark P. Lagon, president of Freedom House. &ldquo;President Obama should press King Salman to release imprisoned human rights activists, including Waleed Abu al-Khair, Mohammed al-Qahtani, and Raif Badawi, and support the passage of the Law of Association that allows civil society to operate freely.&rdquo;<br />\r\n<br />\r\nAccording to Freedom House, the Human Rights organizations through their joint letter have urged President Obama, to focus on rights issues. &ldquo;We have watched with alarm as the Kingdom of Saudi Arabia continues to severely restrict basic civil and political rights. We remain deeply concerned with many of the government&rsquo;s policies that, if maintained, will erode the internal stability of Saudi Arabia and its neighbors,&quot; he said.<br />\r\n<br />\r\n&ldquo;Your administration has highlighted the key role that independent civil society plays in advancing human rights and delegitimizing violent extremism. However, bilateral relations with Saudi Arabia have not adequately incorporated this as a policy priority. The U.S.-Saudi alliance must not only address the shared challenges of today, but anticipate and prevent the regional crises of tomorrow. Peaceful civil society organizations in Saudi Arabia must be able to operate freely, as U.S. foreign policy cannot succeed unless civil society succeeds.&rdquo; Freedom house further stated that, the Saudi government has closed a number of human rights organizations and sentenced human rights defenders to lengthy prison terms. &quot;Nine of the eleven co-founders of the Saudi Arabian Civil and Political Rights Association have been impriTimessoned, while the remaining two have been charged and could face more than a decade in prison if convicted. Saudi courts used the country&rsquo;s anti-terrorism law to sentence Waleed Abu al-Khair, the founder of the Monitor of Human Rights in Saudi Arabia, to 15 years imprisonment&quot;, Lagon added.<br />\r\n', 'test', 1, '2016-01-08 11:27:28', '2016-01-08 11:27:28', 1, 0, 'president-obama-urged-to-discuss-rights-issues-with-the-saudi-king', 2),
(3, 'US to extend more troops in Afghanistan', 'Washington: The United States is to extend 5,500 more troops in Afghanistan beyond 2016 and President Barack Obama will outline the plans later, administration officials said on Thursday.<br />\r\nOriginally all but a small embassy-based force were due to leave by the end of next year. But the US military said that more troops would be needed to help Afghan forces counter a growing Taliban threat.<br />\r\nThere are currently 9,800 US troops stationed in Afghanistan. Last week, the top US military commander in Afghanistan, Gen John Campbell, said the US must consider boosting its military presence there beyond 2016. The US forces will be stationed in four locations - in Kabul, Bagram, Jalalabad and Kandahar.', 'test', 1, '2016-01-08 11:33:22', '2016-01-08 11:33:22', 1, 0, 'us-to-extend-more-troops-in-afghanistan', 2),
(4, 'Former US President Clinton receives human rights award', 'Storrs: Former US President Bill Clinton awarded with &ldquo;Thomas J. Dodd Prize in International Justice and Human Rights&rdquo; for changing the global conversation on human rights, both during his presidency and afterward through his work with the Clinton Foundation.<br />\r\nReceiving the award Clinton said human rights are more important now than ever in an increasingly linked world where positive and negative forces are &ldquo;bumping up against one another.&rdquo;<br />\r\nThe Thomas J. Dodd Research Center was created through a fundraising effort by his son to honor the elder Dodd&#39;s battles for human rights and his work as executive trial counsel at the Nuremberg Trials in 1945 and 1946. Dodd represented Connecticut in the U.S. Senate from 1959 until 1971.<br />\r\nThe former president honored with the prize on Thursday as a co-winner of the prize with Tostan, an organization that employs more than 1,000 people to help African communities to address human rights issues and foster sustainable development. Senegal-based Tostan, which is a member of the Clinton Global Initiative, promotes literacy in rural areas and has helped 2 million people through education, health, and economic development. The winners of the Dodd Prize, which is awarded every two years, receive $100,000.', 'test', 1, '2016-01-08 11:38:34', '2016-01-08 11:38:34', 1, 0, 'former-us-president-clinton-receives-human-rights-award', 2),
(5, 'El Niño has put world in ''uncharted territory'': UN', 'Jan 8, Washington: Briefing United Nations Member States on Thursday on the widely varied and devastating impacts of the current El Ni&ntilde;o weather phenomenon &ndash; which for months has sparked massive floods in some countries while leaving others, often in the same region, bone dry &ndash; the top UN relief official urged the international community to act now to help millions of people facing food insecurity.<br />\r\n<br />\r\n&ldquo;We are here to re-sound the alarm; to spur a collective response to the humanitarian suffering caused by changes in weather patterns linked to El Ni&ntilde;o and to take action now to mitigate its effects,&rdquo; said Stephen O&#39;Brien, the UN Under-Secretary-General for the Coordination of Humanitarian Affairs, who added: &ldquo;If we act now, we will save lives and livelihoods and prevent an even more serious humanitarian emergency from taking hold.&rdquo;<br />\r\n<br />\r\nHe said that in some regions, millions of people are already facing food insecurity caused by droughts related to El Ni&ntilde;o. &ldquo;In other parts of the world, we have a short window of opportunity now to prepare for what we know will happen within months. In both cases, we must act together and we must act quickly,&rdquo; he stressed.<br />\r\n<br />\r\nMr. O&#39;Brien, who is also the UN Emergency Relief Coordinator, was joined today by Paul D. Egerton, Representative to the UN and other International Organizations in North America, and Director, World Meteorological Organization (WMO) Liaison Office to the UN , as well as: Osnat Lubrani, Resident Coordinator in Fiji (via phone); Valerie Julliand, Resident Coordinator in Guatemala (via video link); Christy Ahenkora, Resident Coordinator a.i. in Lesotho (via video link); Ahunna Eziakonwa-Onochie, Resident Coordinator /Humanitarian Coordinator in Ethiopia (via video link); and Niels B. Holm-Nielsen, World Bank, Global Lead, Resilience and Disaster Risk Management.<br />\r\n<br />\r\n&ldquo;The strength of the current El Ni&ntilde;o has put our world into uncharted territory,&rdquo; continued Mr. O&#39;Brien, explaining that while the phenomenon is not caused by climate change, the fact that it is taking place in a changed climate means that its impacts are less predictable and could be more severe. While the current El Ni&ntilde;o is expected to decline in strength in the first months of 2016, &ldquo;this does not mean that the danger is past.&rdquo;<br />\r\n<br />\r\nEl Nino and a possible subsequent La Ni&ntilde;a event would continue to effect different parts of the world &ndash; at different times &ndash; with a mix of above or below average rainfall.<br />\r\n<br />\r\n&ldquo;The impacts, especially on food security, may last as long as two years,&rdquo; he said, expressing particular concern about a number of countries spread across Central and South America, the Pacific region and East and southern Africa. And while countries in those regions are by no means the only ones that could be impacted by the phenomenon, the gap between projected needs and local government and humanitarian actors&#39; capacity to respond &ldquo;requires our urgent attention.&rdquo;<br />\r\n<br />\r\nHe said that in Latin America and the Caribbean, Honduras, Guatemala, El Salvador and Haiti are particularly vulnerable. Indeed, below average rainfall from March to September 2015 had led to significant crop losses and triggered the need for food aid for millions of people.<br />\r\n<br />\r\n&ldquo;More than 4.2 million people in Central America, including 3.5 million in Honduras, Guatemala and El Salvador are affected by one of the most severe droughts in the region&#39;s history, which is likely to grow in intensity until March this year,&rdquo; he explained, adding that in Haiti, some 3 million people &ndash; or 30 per cent of the population &ndash; are classified as food insecure, with some 800,000 severely food insecure and in need of urgent assistance.<br />\r\n<br />\r\nBeyond those countries, the wider region is at risk of potentially devastating effects on the agricultural sector including floods, landslides and droughts, potentially leading to forest fires.<br />\r\n<br />\r\n&ldquo;In the Pacific region, Fiji, Vanuatu, Solomon Islands, Papua New Guinea; these are the ones at greatest risk, but as many as 13 countries could be affected,&rdquo; said Mr. O&#39;Brien, noting that drought conditions are already affecting some 3.5 million across the region and that in some countries, El Ni&ntilde;o is increasing the likelihood of typhoons and cyclones. Serious food insecurity is also foreseen in Timor Leste by March, when harvests are expected to fail, affecting about 220,000 people.<br />\r\n<br />\r\nTurning to East Africa, he said that poor rains had resulted in drought-like conditions in the northern parts of the region, mostly Ethiopia, Sudan, Djibouti and Eritrea, while other parts of East Africa had experienced a wetter than normal season. By early 2016, projections indicate that at least 22 million people will be food insecure across the region and between 2.7 million and 3.5 million people could be affected by floods.<br />\r\n<br />\r\n&ldquo;Ethiopia is the country most affected so far as it faces the worst drought in 30 years. Humanitarian needs more than tripled in the past year,&rdquo; reported the UN relief chief, adding that some 10.2 million people are in need of emergency food assistance. And while the Government is taking on an &ldquo;impressive&rdquo; leadership role in confronting the crisis &ndash; including the allocation of some $290 million of its own resources for response efforts &ndash; the scale of the challenges demand more significant and timely support, as it could take possibly three to five months for donor support to reach those in need on the ground.<br />\r\n<br />\r\nAll these countries and regions need assistance now, to offset the impacts already being felt and to prepare &ldquo;for what we know is to come,&rdquo; said Mr. O&#39;Brien, adding that: El Ni&ntilde;o poses a critical test to the global humanitarian system in two fundament areas. First, it has tested the world&#39;s commitment to early action. &ldquo;The warning signs are there. Are we prepared to act on them? Are we prepared to make the resources available now based on these firm clues, or do we wait [&hellip;] for the facts of a massive crisis?&rdquo; he asked.<br />\r\n<br />\r\nThe second challenge, he said, is ensuring cooperation between humanitarian and development actors and between the international community and local actors. Could humanitarian and development actors work together at all levels to build resilience at the community level to prevent major loss of lives and livelihoods?<br />\r\n<br />\r\nO&#39;Brien stressed that previous crises had shown that early action is critical to reduce vulnerability and the need for humanitarian assistance later on. While major contributions from donors and humanitarian agencies had provided &ldquo;a good start,&rdquo; much more was needed, particularly as many of the response plans in affected countries remain seriously underfunded.<br />\r\n<br />\r\nThe Oslo Times<br />\r\n- See more at: http://www.theoslotimes.com/article/el-ni%C3%B1o-has-put-world-in-%27uncharted-territory%27%3A-un#sthash.usjCYo9H.dpuf', 'test', 1, '2016-01-08 13:21:40', '2016-01-08 13:21:40', 1, 0, 'el-nino-has-put-world-in-uncharted-territory-un', 2);

-- --------------------------------------------------------

--
-- Table structure for table `news_type`
--

CREATE TABLE IF NOT EXISTS `news_type` (
`id` int(11) NOT NULL,
  `news_id` int(11) NOT NULL,
  `type_id` int(11) NOT NULL
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=18 ;

--
-- Dumping data for table `news_type`
--

INSERT INTO `news_type` (`id`, `news_id`, `type_id`) VALUES
(11, 1, 1),
(12, 2, 1),
(13, 3, 1),
(14, 3, 2),
(15, 4, 1),
(16, 4, 3),
(17, 5, 1);

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
MODIFY `id` int(11) NOT NULL AUTO_INCREMENT,AUTO_INCREMENT=3;
--
-- AUTO_INCREMENT for table `categories`
--
ALTER TABLE `categories`
MODIFY `id` int(4) NOT NULL AUTO_INCREMENT,AUTO_INCREMENT=114;
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
MODIFY `id` int(3) NOT NULL AUTO_INCREMENT,AUTO_INCREMENT=9;
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
MODIFY `id` int(11) NOT NULL AUTO_INCREMENT,AUTO_INCREMENT=6;
--
-- AUTO_INCREMENT for table `news_type`
--
ALTER TABLE `news_type`
MODIFY `id` int(11) NOT NULL AUTO_INCREMENT,AUTO_INCREMENT=18;
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
