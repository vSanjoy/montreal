-- phpMyAdmin SQL Dump
-- version 5.0.4
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1:3307
-- Generation Time: Apr 29, 2021 at 01:51 PM
-- Server version: 10.4.17-MariaDB
-- PHP Version: 7.4.13

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `laravel_montreal`
--

-- --------------------------------------------------------

--
-- Table structure for table `mwd_cms`
--

CREATE TABLE `mwd_cms` (
  `id` int(10) UNSIGNED NOT NULL,
  `parent_id` int(11) DEFAULT NULL COMMENT 'Cms page id',
  `page_name` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `title` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `slug` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `short_title` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `short_description` text COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `description` longtext COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `other_description` longtext COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `banner_title` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `banner_short_title` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `banner_short_description` text COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `banner_image` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `featured_image` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `other_image` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `meta_title` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `meta_keywords` text COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `meta_description` text COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `status` enum('0','1') COLLATE utf8mb4_unicode_ci NOT NULL DEFAULT '1' COMMENT '0=>Inactive, 1=>Active',
  `created_at` timestamp NOT NULL DEFAULT current_timestamp(),
  `updated_at` timestamp NULL DEFAULT NULL ON UPDATE current_timestamp(),
  `deleted_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `mwd_cms`
--

INSERT INTO `mwd_cms` (`id`, `parent_id`, `page_name`, `title`, `slug`, `short_title`, `short_description`, `description`, `other_description`, `banner_title`, `banner_short_title`, `banner_short_description`, `banner_image`, `featured_image`, `other_image`, `meta_title`, `meta_keywords`, `meta_description`, `status`, `created_at`, `updated_at`, `deleted_at`) VALUES
(1, NULL, 'Home', 'Home Page', 'home', '<span>Portfolio</span>  Our latest projects', NULL, '<h2>Based out of Montreal, and serving clients across Canada,<br />\r\nMONTREAL WEB DESIGN is backed by a team of creative graphic designers and web technicians who are<br />\r\nready to handle all your web and computer needs, on any budget.</h2>\r\n\r\n<h3>Our approach</h3>', '<h3>So What&rsquo;s Next?</h3>\r\n\r\n<h2>Are you ready? Let&rsquo;s go!</h2>', NULL, NULL, 'Montreal Web Design, specializing in the design and implementation of websites at <span>affordable prices</span>', 'banner_1617617728.jpg', NULL, NULL, NULL, NULL, NULL, '1', '2021-03-16 01:23:17', '2021-04-06 22:14:43', NULL),
(2, NULL, 'About Us', 'About Us', 'about-us', NULL, NULL, '<p>Montreal Web Design.COM has been offering <strong>one-stop web development and design</strong> to its customers since 2004.</p>\r\n\r\n<p>Our vast experience includes Web Design and Maintenance, Hosting, Domain Registration, Computer Repair/Troubleshooting, Home Office setup, SEO and Digital Marketing services for small and medium businesses.</p>', NULL, NULL, NULL, NULL, NULL, 'featured_image_1617707388.png', NULL, NULL, NULL, NULL, '1', '2021-04-06 00:09:49', '2021-04-06 00:09:49', NULL);

-- --------------------------------------------------------

--
-- Table structure for table `mwd_contacts`
--

CREATE TABLE `mwd_contacts` (
  `id` int(10) UNSIGNED NOT NULL,
  `name` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `email` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `phone` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `subject` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `message` text COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `status` enum('0','1') COLLATE utf8mb4_unicode_ci NOT NULL DEFAULT '1' COMMENT '0=>Inactive, 1=>Active',
  `created_at` timestamp NOT NULL DEFAULT current_timestamp(),
  `updated_at` timestamp NULL DEFAULT NULL ON UPDATE current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `mwd_enquiries`
--

CREATE TABLE `mwd_enquiries` (
  `id` int(10) UNSIGNED NOT NULL,
  `name` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `phone_number` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `email` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `message` text COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `status` enum('0','1') COLLATE utf8mb4_unicode_ci NOT NULL DEFAULT '1' COMMENT '0=>Inactive, 1=>Active',
  `created_at` timestamp NOT NULL DEFAULT current_timestamp(),
  `updated_at` timestamp NULL DEFAULT NULL ON UPDATE current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `mwd_enquiries`
--

INSERT INTO `mwd_enquiries` (`id`, `name`, `phone_number`, `email`, `message`, `status`, `created_at`, `updated_at`) VALUES
(1, 'David Milan', '9876543210', 'david@yopmail.com', 'Thank you for the services, I will discuss this through phone call.', '1', '2021-04-07 02:11:41', '2021-04-07 02:11:41'),
(2, 'Mark Boucher', '9876541111', 'mark@yopmail.com', 'I will discuss this by phone or you can call me.', '1', '2021-04-07 02:13:31', '2021-04-07 02:13:31'),
(3, 'John Doe', '9876545263', 'johndoe@yopmail.com', 'I want to build a project that is suitable for our business.', '1', '2021-04-07 23:55:39', '2021-04-07 23:55:39');

-- --------------------------------------------------------

--
-- Table structure for table `mwd_migrations`
--

CREATE TABLE `mwd_migrations` (
  `id` int(10) UNSIGNED NOT NULL,
  `migration` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `batch` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `mwd_migrations`
--

INSERT INTO `mwd_migrations` (`id`, `migration`, `batch`) VALUES
(1, '2014_10_12_000000_create_users_table', 1),
(2, '2020_12_24_115140_create_roles_table', 1),
(3, '2020_12_24_115756_create_role_permissions_table', 1),
(4, '2020_12_24_120619_create_user_roles_table', 1),
(5, '2020_12_24_120728_create_role_pages_table', 1),
(6, '2021_01_04_060015_create_website_settings_table', 1),
(7, '2021_01_06_120249_create_cms_table', 1),
(8, '2021_01_19_114719_create_testimonials_table', 1),
(9, '2021_03_02_131412_create_contacts_table', 1),
(10, '2021_04_06_072632_create_services_table', 2),
(11, '2021_04_07_052417_create_portfolios_table', 3),
(12, '2021_04_07_053109_create_portfolio_service_mappings_table', 4),
(13, '2021_04_07_130646_create_enquiries_table', 5),
(14, '2021_04_29_071012_create_portfolio_categories_table', 6);

-- --------------------------------------------------------

--
-- Table structure for table `mwd_portfolios`
--

CREATE TABLE `mwd_portfolios` (
  `id` int(10) UNSIGNED NOT NULL,
  `title` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `slug` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `short_title` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `short_description` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `description` text COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `is_featured` enum('N','Y') COLLATE utf8mb4_unicode_ci NOT NULL DEFAULT 'N' COMMENT 'N=>No, Y=>Yes',
  `image` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `sort` int(11) NOT NULL DEFAULT 0,
  `status` enum('0','1') COLLATE utf8mb4_unicode_ci NOT NULL DEFAULT '1' COMMENT '0=>Inactive, 1=>Active',
  `created_at` timestamp NOT NULL DEFAULT current_timestamp(),
  `updated_at` timestamp NULL DEFAULT NULL ON UPDATE current_timestamp(),
  `deleted_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `mwd_portfolios`
--

INSERT INTO `mwd_portfolios` (`id`, `title`, `slug`, `short_title`, `short_description`, `description`, `is_featured`, `image`, `sort`, `status`, `created_at`, `updated_at`, `deleted_at`) VALUES
(1, 'Bioastra Tech', 'bioastra-tech', 'Bioastra Tech.com', NULL, NULL, 'Y', 'portfolio_1617781191.jpg', 0, '1', '2021-04-07 00:54:18', '2021-04-07 02:14:51', NULL),
(2, 'Bioastra Tech', 'bioastra-tech-1', 'Bioastra Tech.com', NULL, NULL, 'Y', 'portfolio_1617781428.jpg', 1, '1', '2021-04-07 02:13:48', '2021-04-07 02:14:51', NULL),
(3, 'Bioastra Tech', 'bioastra-tech-2', 'Bioastra Tech.com', NULL, NULL, 'Y', 'portfolio_1617781456.jpg', 2, '1', '2021-04-07 02:14:17', '2021-04-07 02:14:51', NULL),
(4, 'Bioastra Tech', 'bioastra-tech-3', 'Bioastra Tech.com', NULL, NULL, 'Y', 'portfolio_1617781563.jpg', 3, '1', '2021-04-07 02:16:03', '2021-04-07 02:16:03', NULL);

-- --------------------------------------------------------

--
-- Table structure for table `mwd_portfolio_categories`
--

CREATE TABLE `mwd_portfolio_categories` (
  `id` int(10) UNSIGNED NOT NULL,
  `title` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `slug` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `sort` int(11) NOT NULL DEFAULT 0,
  `status` enum('0','1') COLLATE utf8mb4_unicode_ci NOT NULL DEFAULT '1' COMMENT '0=>Inactive, 1=>Active',
  `created_at` timestamp NOT NULL DEFAULT current_timestamp(),
  `updated_at` timestamp NULL DEFAULT NULL ON UPDATE current_timestamp(),
  `deleted_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `mwd_portfolio_categories`
--

INSERT INTO `mwd_portfolio_categories` (`id`, `title`, `slug`, `sort`, `status`, `created_at`, `updated_at`, `deleted_at`) VALUES
(1, 'Marketing', 'marketing', 0, '1', '2021-04-29 05:31:38', '2021-04-29 05:31:38', NULL),
(2, 'Branding Design', 'branding-design', 1, '1', '2021-04-29 05:33:23', '2021-04-29 05:33:23', NULL),
(3, 'Development Design', 'development-design', 2, '1', '2021-04-29 05:33:52', '2021-04-29 05:33:52', NULL),
(4, 'Ecommerce Design', 'ecommerce-design', 3, '1', '2021-04-29 05:34:11', '2021-04-29 05:34:11', NULL);

-- --------------------------------------------------------

--
-- Table structure for table `mwd_portfolio_service_mappings`
--

CREATE TABLE `mwd_portfolio_service_mappings` (
  `portfolio_id` int(11) DEFAULT NULL COMMENT 'Id from portfolios table',
  `service_id` int(11) DEFAULT NULL COMMENT 'Id from services table'
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `mwd_portfolio_service_mappings`
--

INSERT INTO `mwd_portfolio_service_mappings` (`portfolio_id`, `service_id`) VALUES
(1, 1),
(1, 2),
(1, 6),
(2, 1),
(2, 2),
(2, 6),
(3, 1),
(3, 2),
(3, 5),
(4, 1),
(4, 2),
(4, 3);

-- --------------------------------------------------------

--
-- Table structure for table `mwd_roles`
--

CREATE TABLE `mwd_roles` (
  `id` int(10) UNSIGNED NOT NULL,
  `name` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `slug` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `is_admin` enum('0','1') COLLATE utf8mb4_unicode_ci NOT NULL DEFAULT '1' COMMENT '0=>Inactive, 1=>Active',
  `status` enum('0','1') COLLATE utf8mb4_unicode_ci NOT NULL DEFAULT '1' COMMENT '0=>Inactive, 1=>Active',
  `created_at` timestamp NOT NULL DEFAULT current_timestamp(),
  `updated_at` timestamp NULL DEFAULT NULL ON UPDATE current_timestamp(),
  `deleted_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `mwd_roles`
--

INSERT INTO `mwd_roles` (`id`, `name`, `slug`, `is_admin`, `status`, `created_at`, `updated_at`, `deleted_at`) VALUES
(1, 'Super Admin', 'super-admin', '1', '1', '2021-03-12 04:46:01', '2021-03-12 04:46:01', NULL),
(2, 'Banner Role', 'banner-role', '1', '1', '2021-04-02 07:35:32', '2021-04-02 07:35:32', NULL);

-- --------------------------------------------------------

--
-- Table structure for table `mwd_role_pages`
--

CREATE TABLE `mwd_role_pages` (
  `id` int(10) UNSIGNED NOT NULL,
  `routeName` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `mwd_role_pages`
--

INSERT INTO `mwd_role_pages` (`id`, `routeName`) VALUES
(1, 'user.list'),
(2, 'user.add'),
(3, 'user.edit'),
(4, 'user.change-status'),
(5, 'user.delete'),
(6, 'banner.list'),
(7, 'banner.add'),
(8, 'banner.edit'),
(9, 'banner.change-status'),
(10, 'banner.delete'),
(11, 'banner.sort'),
(12, 'category.list'),
(13, 'category.add'),
(14, 'category.edit'),
(15, 'category.change-status'),
(16, 'category.delete'),
(17, 'post.list'),
(18, 'post.add'),
(19, 'post.edit'),
(20, 'post.change-status'),
(21, 'post.delete'),
(22, 'post.sort'),
(23, 'teamMember.list'),
(24, 'teamMember.add'),
(25, 'teamMember.edit'),
(26, 'teamMember.change-status'),
(27, 'teamMember.delete'),
(28, 'teamMember.sort'),
(29, 'faq.list'),
(30, 'faq.add'),
(31, 'faq.edit'),
(32, 'faq.change-status'),
(33, 'faq.delete'),
(34, 'faq.sort'),
(35, 'testimonial.list'),
(36, 'testimonial.add'),
(37, 'testimonial.edit'),
(38, 'testimonial.change-status'),
(39, 'testimonial.delete'),
(40, 'testimonial.sort'),
(41, 'officeBranch.list'),
(42, 'officeBranch.add'),
(43, 'officeBranch.edit'),
(44, 'officeBranch.change-status'),
(45, 'officeBranch.delete'),
(46, 'officeBranch.sort'),
(47, 'contact.list'),
(48, 'contact.view'),
(49, 'contact.delete'),
(50, 'contact.export'),
(51, 'career.list'),
(52, 'career.view'),
(53, 'career.delete'),
(54, 'galleryAlbum.list'),
(55, 'galleryAlbum.add'),
(56, 'galleryAlbum.edit'),
(57, 'galleryAlbum.change-status'),
(58, 'galleryAlbum.delete'),
(59, 'galleryAlbum.gallery-list'),
(60, 'cms.list'),
(61, 'cms.add'),
(62, 'cms.edit'),
(63, 'cms.change-status'),
(64, 'cms.delete'),
(65, 'career.export');

-- --------------------------------------------------------

--
-- Table structure for table `mwd_role_permissions`
--

CREATE TABLE `mwd_role_permissions` (
  `role_id` int(11) NOT NULL,
  `page_id` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `mwd_role_permissions`
--

INSERT INTO `mwd_role_permissions` (`role_id`, `page_id`) VALUES
(2, 6),
(2, 7),
(2, 8),
(2, 9),
(2, 10),
(2, 11);

-- --------------------------------------------------------

--
-- Table structure for table `mwd_services`
--

CREATE TABLE `mwd_services` (
  `id` int(10) UNSIGNED NOT NULL,
  `title` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `slug` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `short_title` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `short_description` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `description` text COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `is_featured` enum('N','Y') COLLATE utf8mb4_unicode_ci NOT NULL DEFAULT 'N' COMMENT 'N=>No, Y=>Yes',
  `image` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `sort` int(11) NOT NULL DEFAULT 0,
  `status` enum('0','1') COLLATE utf8mb4_unicode_ci NOT NULL DEFAULT '1' COMMENT '0=>Inactive, 1=>Active',
  `created_at` timestamp NOT NULL DEFAULT current_timestamp(),
  `updated_at` timestamp NULL DEFAULT NULL ON UPDATE current_timestamp(),
  `deleted_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `mwd_services`
--

INSERT INTO `mwd_services` (`id`, `title`, `slug`, `short_title`, `short_description`, `description`, `is_featured`, `image`, `sort`, `status`, `created_at`, `updated_at`, `deleted_at`) VALUES
(1, 'Web Design', 'web-design', 'Web Design & <br>Development', 'We offer custom web <br>development services to meet <br>customer requirements.', NULL, 'Y', 'service_1617697647.png', 0, '1', '2021-04-06 02:57:27', '2021-04-06 07:14:57', NULL),
(2, 'Web Hosting', 'web-hosting', 'Web Hosting', 'At Montreal Web Design.Com, we <br>offer our clients reliable, affordable <br>and professional web hosting.', NULL, 'Y', 'service_1617698222.png', 1, '1', '2021-04-06 03:07:02', '2021-04-06 07:14:57', NULL),
(3, 'Domain Names', 'domain-names', 'Web Domains', 'A domain name - such as Montreal <br>Web Design.Com - signifies your own <br>address on the Internet.', NULL, 'Y', 'service_1617698387.png', 2, '1', '2021-04-06 03:09:47', '2021-04-06 07:14:57', NULL),
(4, 'Digital Marketing / SEO', 'digital-marketing-seo', 'Digital Marketing /<br> SEO', 'We offer custom web <br> development services to meet <br>customer requirements.', NULL, 'Y', 'service_1617698511.png', 3, '1', '2021-04-06 03:11:51', '2021-04-06 07:14:57', NULL),
(5, 'Computer Repair', 'computer-repair', 'Computer Repair', 'Having trouble with your <br> computer, give us a call. Quick and <br>reliable repairs.', NULL, 'Y', 'service_1617698587.png', 4, '1', '2021-04-06 03:13:08', '2021-04-12 00:59:00', NULL),
(6, 'Website Maintenance', 'website-maintenance', 'Home Office Setup', 'A domain name - such as Montreal <br>Web Design.Com - signifies your own <br>address on the Internet.', NULL, 'Y', 'service_1617698630.png', 5, '1', '2021-04-06 03:13:50', '2021-04-12 00:58:58', NULL);

-- --------------------------------------------------------

--
-- Table structure for table `mwd_users`
--

CREATE TABLE `mwd_users` (
  `id` int(10) UNSIGNED NOT NULL,
  `nickname` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `title` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `first_name` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `last_name` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `full_name` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `username` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `email` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `phone_no` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `password` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `profile_pic` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `role_id` int(11) DEFAULT NULL,
  `remember_token` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `auth_token` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `type` enum('SA','A','U') COLLATE utf8mb4_unicode_ci NOT NULL DEFAULT 'U' COMMENT 'SA=>Super Admin, A=>Sub Admin, U=>User',
  `status` enum('0','1') COLLATE utf8mb4_unicode_ci NOT NULL DEFAULT '1' COMMENT '0=>Inactive, 1=>Active',
  `lastlogintime` int(11) DEFAULT NULL,
  `sample_login_show` enum('N','Y') COLLATE utf8mb4_unicode_ci NOT NULL DEFAULT 'N' COMMENT 'Y=>Yes, N=>No',
  `created_at` timestamp NOT NULL DEFAULT current_timestamp(),
  `updated_at` timestamp NULL DEFAULT NULL ON UPDATE current_timestamp(),
  `deleted_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `mwd_users`
--

INSERT INTO `mwd_users` (`id`, `nickname`, `title`, `first_name`, `last_name`, `full_name`, `username`, `email`, `phone_no`, `password`, `profile_pic`, `role_id`, `remember_token`, `auth_token`, `type`, `status`, `lastlogintime`, `sample_login_show`, `created_at`, `updated_at`, `deleted_at`) VALUES
(1, NULL, NULL, 'Domenic', 'Grippo', 'Domenic Grippo', NULL, 'admin@montreal.com', '514.688.4344', '$2y$10$Q7bfaZW/iVMW.xqpZjM4duggEYLFV5LpiX4p68WqzQ94ntqZipMDy', '', 1, 'jBp46pkHlBHjLdsStsKOB24z4Uz3qYrQTaOfup1QuK5NzIhlOfxSLHDiPOQS', NULL, 'SA', '1', 1619691390, 'Y', '2021-03-12 04:46:01', '2021-04-29 04:46:30', NULL);

-- --------------------------------------------------------

--
-- Table structure for table `mwd_user_roles`
--

CREATE TABLE `mwd_user_roles` (
  `user_id` int(11) NOT NULL,
  `role_id` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `mwd_website_settings`
--

CREATE TABLE `mwd_website_settings` (
  `id` int(10) UNSIGNED NOT NULL,
  `from_email` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `to_email` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `website_title` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `phone_no` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `facebook_link` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `twitter_link` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `instagram_link` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `linkedin_link` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `pinterest_link` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `googleplus_link` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `youtube_link` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `rss_link` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `dribble_link` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `tumblr_link` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `default_meta_title` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `default_meta_keywords` text COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `default_meta_description` text COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `address` text COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `map` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `footer_address` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `copyright_text` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `tag_line` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `logo` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `footer_logo` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `mwd_website_settings`
--

INSERT INTO `mwd_website_settings` (`id`, `from_email`, `to_email`, `website_title`, `phone_no`, `facebook_link`, `twitter_link`, `instagram_link`, `linkedin_link`, `pinterest_link`, `googleplus_link`, `youtube_link`, `rss_link`, `dribble_link`, `tumblr_link`, `default_meta_title`, `default_meta_keywords`, `default_meta_description`, `address`, `map`, `footer_address`, `copyright_text`, `tag_line`, `logo`, `footer_logo`) VALUES
(1, 'support@montrealwebdesign.com', 'info@montrealwebdesign.com', 'Montreal Webdesign', '(514) 819-1901', 'https://www.facebook.com/MontrealWebDesign', 'https://twitter.com/montrealweb', NULL, 'https://ca.linkedin.com/in/domenic-grippo-899ba21', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, '<h2>Hire us, or just say hello!</h2>\r\n                    <div class=\"phone_num_holder\">\r\n                        <p>Montreal: <a href=\"tel:5148191901\"> (514) 819-1901</a></p>\r\n                        <p>Toll Free: <a href=\"tel:18009391077\">1 (800) 939-1077</a></p>\r\n                    </div>\r\n                    <div class=\"address_holder\">\r\n                        <h3>OFFICE HOURS:</h3>\r\n                        <p>Monday to Friday</p>\r\n                        <p>9:00 a.m - 5:00 p.m EDT</p> \r\n                    </div>', NULL, NULL, '2021 <span>montrealwebdesign.com</span>. All rights reserved.', '1 (800) 939-1077', 'logo_1617616699.png', 'footer_logo_1617616699.png');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `mwd_cms`
--
ALTER TABLE `mwd_cms`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `mwd_contacts`
--
ALTER TABLE `mwd_contacts`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `mwd_enquiries`
--
ALTER TABLE `mwd_enquiries`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `mwd_migrations`
--
ALTER TABLE `mwd_migrations`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `mwd_portfolios`
--
ALTER TABLE `mwd_portfolios`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `mwd_portfolio_categories`
--
ALTER TABLE `mwd_portfolio_categories`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `mwd_roles`
--
ALTER TABLE `mwd_roles`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `mwd_role_pages`
--
ALTER TABLE `mwd_role_pages`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `mwd_services`
--
ALTER TABLE `mwd_services`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `mwd_users`
--
ALTER TABLE `mwd_users`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `mwd_website_settings`
--
ALTER TABLE `mwd_website_settings`
  ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `mwd_cms`
--
ALTER TABLE `mwd_cms`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT for table `mwd_contacts`
--
ALTER TABLE `mwd_contacts`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `mwd_enquiries`
--
ALTER TABLE `mwd_enquiries`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT for table `mwd_migrations`
--
ALTER TABLE `mwd_migrations`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=15;

--
-- AUTO_INCREMENT for table `mwd_portfolios`
--
ALTER TABLE `mwd_portfolios`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- AUTO_INCREMENT for table `mwd_portfolio_categories`
--
ALTER TABLE `mwd_portfolio_categories`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- AUTO_INCREMENT for table `mwd_roles`
--
ALTER TABLE `mwd_roles`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT for table `mwd_role_pages`
--
ALTER TABLE `mwd_role_pages`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=66;

--
-- AUTO_INCREMENT for table `mwd_services`
--
ALTER TABLE `mwd_services`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=7;

--
-- AUTO_INCREMENT for table `mwd_users`
--
ALTER TABLE `mwd_users`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT for table `mwd_website_settings`
--
ALTER TABLE `mwd_website_settings`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
