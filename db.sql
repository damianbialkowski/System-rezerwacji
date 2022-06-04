-- phpMyAdmin SQL Dump
-- version 5.1.0
-- https://www.phpmyadmin.net/
--
-- Host: db
-- Generation Time: Jun 04, 2022 at 09:25 PM
-- Server version: 8.0.22
-- PHP Version: 7.4.19

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `db`
--

-- --------------------------------------------------------

--
-- Table structure for table `abilities`
--

CREATE TABLE `abilities` (
  `id` bigint UNSIGNED NOT NULL,
  `name` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `title` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `entity_id` bigint UNSIGNED DEFAULT NULL,
  `entity_type` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `only_owned` tinyint(1) NOT NULL DEFAULT '0',
  `options` json DEFAULT NULL,
  `scope` int DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `abilities`
--

INSERT INTO `abilities` (`id`, `name`, `title`, `entity_id`, `entity_type`, `only_owned`, `options`, `scope`, `created_at`, `updated_at`) VALUES
(1, '*', 'All abilities', NULL, '*', 0, NULL, NULL, '2022-05-11 22:19:17', '2022-05-11 22:19:17');

-- --------------------------------------------------------

--
-- Table structure for table `admins`
--

CREATE TABLE `admins` (
  `id` int UNSIGNED NOT NULL,
  `last_name` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `name` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `login` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `email` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `password` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `active` tinyint(1) NOT NULL DEFAULT '0',
  `remember_token` varchar(100) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `last_login` timestamp NULL DEFAULT NULL,
  `updated_by` int DEFAULT NULL,
  `created_by` int DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  `deleted_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `admins`
--

INSERT INTO `admins` (`id`, `last_name`, `name`, `login`, `email`, `password`, `active`, `remember_token`, `last_login`, `updated_by`, `created_by`, `created_at`, `updated_at`, `deleted_at`) VALUES
(1, NULL, 'admin', 'admin', 'admin@admin.admin', '$2y$10$YRXVcozKQwoR9SGcVlF7aOMyMK3GjZOF.fhf8f5aa7mjyW2zpeFpW', 1, NULL, '2022-06-04 23:21:57', NULL, NULL, '2022-05-11 22:19:17', '2022-06-04 23:21:57', NULL);

-- --------------------------------------------------------

--
-- Table structure for table `assigned_roles`
--

CREATE TABLE `assigned_roles` (
  `id` bigint UNSIGNED NOT NULL,
  `role_id` bigint UNSIGNED NOT NULL,
  `entity_id` bigint UNSIGNED NOT NULL,
  `entity_type` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `restricted_to_id` bigint UNSIGNED DEFAULT NULL,
  `restricted_to_type` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `scope` int DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `assigned_roles`
--

INSERT INTO `assigned_roles` (`id`, `role_id`, `entity_id`, `entity_type`, `restricted_to_id`, `restricted_to_type`, `scope`) VALUES
(1, 1, 1, 'Modules\\Admin\\Entities\\Admin', NULL, NULL, NULL);

-- --------------------------------------------------------

--
-- Table structure for table `attributes`
--

CREATE TABLE `attributes` (
  `id` bigint UNSIGNED NOT NULL,
  `ext_id` bigint UNSIGNED DEFAULT NULL,
  `name` json DEFAULT NULL,
  `slug` json DEFAULT NULL,
  `code` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `type` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `filter` tinyint(1) NOT NULL DEFAULT '0',
  `active` json DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  `deleted_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `attributes`
--

INSERT INTO `attributes` (`id`, `ext_id`, `name`, `slug`, `code`, `type`, `filter`, `active`, `created_at`, `updated_at`, `deleted_at`) VALUES
(1, NULL, '{\"en\": \"Rodzaj obiektu\"}', '{\"en\": \"rodzaj-obiektu\"}', 'rodzaj_obiektu', NULL, 1, '1', '2022-05-31 17:56:42', '2022-05-31 17:56:42', NULL),
(2, NULL, '{\"en\": \"Rozrywki\"}', '{\"en\": \"rozrywki\"}', 'rozrywki', NULL, 1, '1', '2022-05-31 17:56:42', '2022-05-31 17:56:42', NULL),
(3, NULL, '{\"en\": \"Udogodnienia\"}', '{\"en\": \"udogodnienia\"}', 'udogodnienia', NULL, 1, '1', '2022-05-31 17:56:42', '2022-05-31 17:56:42', NULL);

-- --------------------------------------------------------

--
-- Table structure for table `attribute_values`
--

CREATE TABLE `attribute_values` (
  `id` bigint UNSIGNED NOT NULL,
  `ext_id` bigint UNSIGNED DEFAULT NULL,
  `name` json DEFAULT NULL,
  `slug` json DEFAULT NULL,
  `attribute_id` bigint UNSIGNED NOT NULL,
  `value` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `active` tinyint(1) DEFAULT '0',
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  `deleted_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `attribute_values`
--

INSERT INTO `attribute_values` (`id`, `ext_id`, `name`, `slug`, `attribute_id`, `value`, `active`, `created_at`, `updated_at`, `deleted_at`) VALUES
(1, NULL, '{\"en\": \"Apartamenty\"}', '{\"en\": \"apartamenty\"}', 1, 'apartamenty', 1, NULL, NULL, NULL),
(2, NULL, '{\"en\": \"Hotele\"}', '{\"en\": \"hotele\"}', 1, 'hotele', 1, NULL, NULL, NULL),
(3, NULL, '{\"en\": \"Kryty basen\"}', '{\"en\": \"kryty-basen\"}', 2, 'kryty-basen', 1, NULL, NULL, NULL),
(4, NULL, '{\"en\": \"Plaża\"}', '{\"en\": \"plaza\"}', 2, 'plaza', 1, NULL, NULL, NULL),
(5, NULL, '{\"en\": \"SPA\"}', '{\"en\": \"spa\"}', 2, 'spa', 1, NULL, NULL, NULL),
(6, NULL, '{\"en\": \"Parking\"}', '{\"en\": \"parking\"}', 3, 'parking', 1, NULL, NULL, NULL),
(7, NULL, '{\"en\": \"Restauracja\"}', '{\"en\": \"restauracja\"}', 3, 'restauracja', 1, NULL, NULL, NULL),
(8, NULL, '{\"en\": \"Bezpłatne wifi\"}', '{\"en\": \"bezplatne-wifi\"}', 3, 'bezplatne-wifi', 1, NULL, NULL, NULL);

-- --------------------------------------------------------

--
-- Table structure for table `cities`
--

CREATE TABLE `cities` (
  `id` bigint UNSIGNED NOT NULL,
  `ext_id` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `name` json DEFAULT NULL,
  `slug` json DEFAULT NULL,
  `short_content` json DEFAULT NULL,
  `content` json DEFAULT NULL,
  `active` json DEFAULT NULL,
  `params` json DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  `deleted_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `cities`
--

INSERT INTO `cities` (`id`, `ext_id`, `name`, `slug`, `short_content`, `content`, `active`, `params`, `created_at`, `updated_at`, `deleted_at`) VALUES
(3, NULL, '{\"en\": \"Poznań\"}', '{\"en\": \"poznan\"}', '{\"en\": null}', '{\"en\": null}', '1', NULL, '2022-05-22 21:33:36', '2022-05-22 21:33:36', NULL),
(4, NULL, '{\"en\": \"Kraków\"}', '{\"en\": \"krakow\"}', '{\"en\": null}', '{\"en\": null}', '1', NULL, '2022-05-24 20:39:21', '2022-05-24 20:39:21', NULL),
(5, NULL, '{\"en\": \"Warszawa\"}', '{\"en\": \"warszawa\"}', '{\"en\": null}', '{\"en\": null}', '1', NULL, '2022-06-03 10:20:48', '2022-06-03 10:20:48', NULL),
(6, NULL, '{\"en\": \"Gdańsk\"}', '{\"en\": \"gdansk\"}', '{\"en\": null}', '{\"en\": null}', '1', NULL, '2022-06-03 22:01:41', '2022-06-03 22:01:41', NULL);

-- --------------------------------------------------------

--
-- Table structure for table `cms_domains`
--

CREATE TABLE `cms_domains` (
  `id` bigint UNSIGNED NOT NULL,
  `name` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `url` varchar(100) COLLATE utf8mb4_unicode_ci NOT NULL DEFAULT '*',
  `options` json DEFAULT NULL,
  `active` tinyint(1) NOT NULL DEFAULT '0',
  `default` tinyint(1) NOT NULL DEFAULT '0',
  `deleted_at` timestamp NULL DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `cms_domains`
--

INSERT INTO `cms_domains` (`id`, `name`, `url`, `options`, `active`, `default`, `deleted_at`, `created_at`, `updated_at`) VALUES
(1, '{\"en\":\"Default\"}', '*', NULL, 1, 1, NULL, '2022-05-11 22:22:16', '2022-05-11 22:22:16');

-- --------------------------------------------------------

--
-- Table structure for table `cms_domain_language`
--

CREATE TABLE `cms_domain_language` (
  `id` bigint UNSIGNED NOT NULL,
  `cms_domain_id` bigint UNSIGNED NOT NULL,
  `cms_language_id` bigint UNSIGNED NOT NULL,
  `default` tinyint(1) NOT NULL DEFAULT '0',
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `cms_domain_language`
--

INSERT INTO `cms_domain_language` (`id`, `cms_domain_id`, `cms_language_id`, `default`, `created_at`, `updated_at`) VALUES
(1, 1, 1, 1, NULL, NULL);

-- --------------------------------------------------------

--
-- Table structure for table `cms_languages`
--

CREATE TABLE `cms_languages` (
  `id` bigint UNSIGNED NOT NULL,
  `name` varchar(100) COLLATE utf8mb4_unicode_ci NOT NULL,
  `locale` varchar(10) COLLATE utf8mb4_unicode_ci NOT NULL,
  `date_format` varchar(100) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `is_rtl` tinyint(1) NOT NULL DEFAULT '0',
  `options` json DEFAULT NULL,
  `deleted_at` timestamp NULL DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `cms_languages`
--

INSERT INTO `cms_languages` (`id`, `name`, `locale`, `date_format`, `is_rtl`, `options`, `deleted_at`, `created_at`, `updated_at`) VALUES
(1, 'English', 'en', 'dd/mm/YYYY', 1, NULL, NULL, '2022-05-11 22:25:23', '2022-05-11 22:25:23');

-- --------------------------------------------------------

--
-- Table structure for table `cms_links`
--

CREATE TABLE `cms_links` (
  `id` bigint UNSIGNED NOT NULL,
  `slug` json DEFAULT NULL,
  `parent_id` bigint UNSIGNED DEFAULT NULL,
  `class_type` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `model_id` bigint UNSIGNED DEFAULT NULL,
  `action` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `final_path` json DEFAULT NULL,
  `params` json DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  `deleted_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `cms_seo_data`
--

CREATE TABLE `cms_seo_data` (
  `id` bigint UNSIGNED NOT NULL,
  `class_type` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `model_id` bigint UNSIGNED NOT NULL,
  `params` json DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `cms_users`
--

CREATE TABLE `cms_users` (
  `id` bigint UNSIGNED NOT NULL,
  `name` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `email` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `username` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `password` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `email_verified_at` timestamp NULL DEFAULT NULL,
  `remember_token` varchar(100) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `options` json DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  `deleted_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `cms_users`
--

INSERT INTO `cms_users` (`id`, `name`, `email`, `username`, `password`, `email_verified_at`, `remember_token`, `options`, `created_at`, `updated_at`, `deleted_at`) VALUES
(1, 'Damian', 'damianbialkowski8@gmail.com', 'damian405', '$2y$10$wWj0ADJiKwsSkPpgid45VeGSz5ASEtodHxSZZUp87Pn6WFJBmD5UG', NULL, NULL, NULL, '2022-05-28 21:09:56', '2022-05-28 21:09:56', NULL),
(2, 'Michal', 'michal@onet.pl', 'michal2', '$2y$10$lO6V/WD8NppH9cDBB85s6ufF6ChtwORubMsIiH7o2pCXEbKtevTjO', NULL, NULL, NULL, '2022-06-04 23:12:25', '2022-06-04 23:12:25', NULL);

-- --------------------------------------------------------

--
-- Table structure for table `cms_users_roles`
--

CREATE TABLE `cms_users_roles` (
  `id` bigint UNSIGNED NOT NULL,
  `name` json NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  `deleted_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `cms_user_role`
--

CREATE TABLE `cms_user_role` (
  `id` bigint UNSIGNED NOT NULL,
  `user_id` bigint UNSIGNED NOT NULL,
  `role_id` bigint UNSIGNED NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `cms_visitors`
--

CREATE TABLE `cms_visitors` (
  `id` bigint UNSIGNED NOT NULL,
  `class_type` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `model_id` bigint UNSIGNED NOT NULL,
  `ip` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `user_agent` text COLLATE utf8mb4_unicode_ci,
  `clicks` int UNSIGNED NOT NULL DEFAULT '1',
  `cms_user_id` bigint UNSIGNED DEFAULT NULL,
  `params` json DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `hotels`
--

CREATE TABLE `hotels` (
  `id` bigint UNSIGNED NOT NULL,
  `ext_id` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `city_id` bigint UNSIGNED NOT NULL,
  `name` json DEFAULT NULL,
  `slug` json DEFAULT NULL,
  `short_content` json DEFAULT NULL,
  `content` json DEFAULT NULL,
  `active` json DEFAULT NULL,
  `params` json DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  `deleted_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `hotels`
--

INSERT INTO `hotels` (`id`, `ext_id`, `city_id`, `name`, `slug`, `short_content`, `content`, `active`, `params`, `created_at`, `updated_at`, `deleted_at`) VALUES
(1, NULL, 3, '{\"en\": \"Arche Hotel\"}', '{\"en\": \"sunset-room-1\"}', '{\"en\": \"lorem ipsum\"}', '{\"en\": null}', '1', NULL, '2022-05-22 21:42:28', '2022-06-04 18:08:14', NULL),
(2, NULL, 3, '{\"en\": \"Hotel Gromada\"}', '{\"en\": \"hotel-gromada\"}', '{\"en\": null}', '{\"en\": null}', '1', NULL, '2022-06-04 22:52:23', '2022-06-04 22:52:23', NULL),
(3, NULL, 6, '{\"en\": \"Baltic hotel\"}', '{\"en\": \"baltic-hotel\"}', '{\"en\": null}', '{\"en\": null}', '1', NULL, '2022-06-04 23:09:59', '2022-06-04 23:09:59', NULL);

-- --------------------------------------------------------

--
-- Table structure for table `media`
--

CREATE TABLE `media` (
  `id` int UNSIGNED NOT NULL,
  `disk` varchar(32) COLLATE utf8mb4_unicode_ci NOT NULL,
  `directory` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `filename` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `extension` varchar(32) COLLATE utf8mb4_unicode_ci NOT NULL,
  `mime_type` varchar(128) COLLATE utf8mb4_unicode_ci NOT NULL,
  `aggregate_type` varchar(32) COLLATE utf8mb4_unicode_ci NOT NULL,
  `size` int UNSIGNED NOT NULL,
  `variant_name` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `original_media_id` int UNSIGNED DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `media`
--

INSERT INTO `media` (`id`, `disk`, `directory`, `filename`, `extension`, `mime_type`, `aggregate_type`, `size`, `variant_name`, `original_media_id`, `created_at`, `updated_at`) VALUES
(6, 'files', 'image', '196797', 'jpg', 'image/jpeg', 'image', 605709, NULL, NULL, '2022-05-29 00:30:24', '2022-05-29 00:30:24'),
(7, 'files', 'image', 'poznan', 'jpg', 'image/jpeg', 'image', 351853, NULL, NULL, '2022-05-29 13:15:01', '2022-05-29 13:15:01'),
(8, 'files', 'image', 'poznan2', 'jpg', 'image/jpeg', 'image', 351853, NULL, NULL, '2022-05-29 22:26:55', '2022-05-29 22:26:55'),
(9, 'files', 'image', 'krakow', 'jpg', 'image/jpeg', 'image', 102405, NULL, NULL, '2022-05-29 22:38:34', '2022-05-29 22:38:34'),
(10, 'files', 'image', '1', 'jpg', 'image/jpeg', 'image', 75045, NULL, NULL, '2022-05-31 20:37:52', '2022-05-31 20:37:52'),
(11, 'files', 'images', '2', 'jpg', 'image/jpeg', 'image', 111738, NULL, NULL, '2022-05-31 20:37:52', '2022-05-31 20:37:52'),
(16, 'files', 'image', 'warszawa', 'jpg', 'image/jpeg', 'image', 213539, NULL, NULL, '2022-06-03 10:21:45', '2022-06-03 10:21:45'),
(18, 'files', 'image', 'gdansk', 'jpg', 'image/jpeg', 'image', 510753, NULL, NULL, '2022-06-03 22:01:49', '2022-06-03 22:01:49'),
(19, 'files', 'image', 'gromada1', 'jpg', 'image/jpeg', 'image', 87418, NULL, NULL, '2022-06-04 22:58:19', '2022-06-04 22:58:19'),
(20, 'files', 'images', 'gromada2', 'jpg', 'image/jpeg', 'image', 69606, NULL, NULL, '2022-06-04 22:58:19', '2022-06-04 22:58:19'),
(21, 'files', 'image', 'gromada3', 'jpg', 'image/jpeg', 'image', 97183, NULL, NULL, '2022-06-04 23:03:44', '2022-06-04 23:03:44'),
(22, 'files', 'images', 'gromada4', 'jpg', 'image/jpeg', 'image', 161994, NULL, NULL, '2022-06-04 23:03:44', '2022-06-04 23:03:44'),
(23, 'files', 'image', 'gdansk1', 'jpg', 'image/jpeg', 'image', 53627, NULL, NULL, '2022-06-04 23:11:07', '2022-06-04 23:11:07'),
(24, 'files', 'images', 'gdansk2', 'jpg', 'image/jpeg', 'image', 96617, NULL, NULL, '2022-06-04 23:11:07', '2022-06-04 23:11:07');

-- --------------------------------------------------------

--
-- Table structure for table `mediables`
--

CREATE TABLE `mediables` (
  `media_id` int UNSIGNED NOT NULL,
  `mediable_type` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `mediable_id` int UNSIGNED NOT NULL,
  `tag` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `order` int UNSIGNED NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `mediables`
--

INSERT INTO `mediables` (`media_id`, `mediable_type`, `mediable_id`, `tag`, `order`) VALUES
(6, 'Modules\\Booking\\Entities\\City', 3, 'images', 1),
(8, 'Modules\\Booking\\Entities\\City', 3, 'image', 1),
(9, 'Modules\\Booking\\Entities\\City', 4, 'image', 1),
(10, 'Modules\\Booking\\Entities\\Room', 1, 'image', 1),
(11, 'Modules\\Booking\\Entities\\Room', 1, 'images', 1),
(16, 'Modules\\Booking\\Entities\\City', 5, 'image', 1),
(18, 'Modules\\Booking\\Entities\\City', 6, 'image', 1),
(19, 'Modules\\Booking\\Entities\\Room', 2, 'image', 1),
(20, 'Modules\\Booking\\Entities\\Room', 2, 'images', 1),
(21, 'Modules\\Booking\\Entities\\Room', 3, 'image', 1),
(22, 'Modules\\Booking\\Entities\\Room', 3, 'images', 1),
(23, 'Modules\\Booking\\Entities\\Room', 4, 'image', 1),
(24, 'Modules\\Booking\\Entities\\Room', 4, 'images', 1),
(7, 'Modules\\Booking\\Entities\\City', 3, 'images', 2);

-- --------------------------------------------------------

--
-- Table structure for table `migrations`
--

CREATE TABLE `migrations` (
  `id` int UNSIGNED NOT NULL,
  `migration` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `batch` int NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `migrations`
--

INSERT INTO `migrations` (`id`, `migration`, `batch`) VALUES
(1, '2016_06_27_000000_create_mediable_tables', 1),
(2, '2020_05_04_223511_create_admins_table', 1),
(3, '2020_08_12_191804_alter_table_admins', 1),
(4, '2020_10_12_000000_add_variants_to_media', 1),
(5, '2020_11_19_233644_create_cms_domains_table', 1),
(6, '2020_11_21_124411_create_cms_languages_table', 1),
(7, '2020_11_21_190346_create_cms_domain_language_table', 1),
(8, '2020_12_29_195632_add_active_column_to_roles_table', 1),
(9, '2020_12_29_203513_add_soft_deletes_to_roles_table', 1),
(10, '2021_05_03_170520_create_password_resets_table', 1),
(11, '2021_05_20_000109_create_bouncer_tables', 1),
(12, '2021_12_26_151635_create_cms_users_table', 1),
(13, '2021_12_26_195351_create_cms_users_roles_table', 1),
(14, '2021_12_26_222604_create_cms_user_role_table', 1),
(15, '2022_01_06_145736_add_options_column_to_cms_users_table', 1),
(16, '2022_03_06_193641_create_cms_links_table', 2),
(17, '2022_04_10_111306_create_cms_visitors_table', 2),
(18, '2022_04_30_104154_create_cms_seo_data_table', 2),
(19, '2022_05_22_101937_create_cities_table', 3),
(20, '2022_05_22_102142_create_hotels_table', 3),
(21, '2022_05_22_104045_create_rooms_table', 3),
(23, '2022_05_30_232554_create_opinions_table', 4),
(24, '2022_03_19_123419_create_attributes_table', 5),
(25, '2022_03_19_123434_create_attribute_values_table', 5),
(26, '2022_03_19_123438_create_room_attribute_value_table', 5),
(28, '2022_06_04_175054_add_promoted_column_to_rooms_table', 6),
(30, '2022_06_04_164134_create_reservations_table', 7);

-- --------------------------------------------------------

--
-- Table structure for table `opinions`
--

CREATE TABLE `opinions` (
  `id` bigint UNSIGNED NOT NULL,
  `entity_id` bigint UNSIGNED NOT NULL,
  `entity_type` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `name` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `content` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `rate` tinyint UNSIGNED NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `opinions`
--

INSERT INTO `opinions` (`id`, `entity_id`, `entity_type`, `name`, `content`, `rate`, `created_at`, `updated_at`) VALUES
(1, 1, 'Modules\\Booking\\Entities\\Room', 'Damian B', 'tewt', 3, '2022-05-31 22:37:24', '2022-05-31 22:37:24'),
(2, 2, 'Modules\\Booking\\Entities\\Room', 'Michał M', 'Polecam', 4, '2022-06-04 22:59:52', '2022-06-04 22:59:52');

-- --------------------------------------------------------

--
-- Table structure for table `password_resets`
--

CREATE TABLE `password_resets` (
  `email` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `token` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `is_front` tinyint(1) NOT NULL,
  `created_at` timestamp NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `permissions`
--

CREATE TABLE `permissions` (
  `id` bigint UNSIGNED NOT NULL,
  `ability_id` bigint UNSIGNED NOT NULL,
  `entity_id` bigint UNSIGNED DEFAULT NULL,
  `entity_type` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `forbidden` tinyint(1) NOT NULL DEFAULT '0',
  `scope` int DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `permissions`
--

INSERT INTO `permissions` (`id`, `ability_id`, `entity_id`, `entity_type`, `forbidden`, `scope`) VALUES
(1, 1, 1, 'Modules\\Admin\\Entities\\Admin', 0, NULL),
(2, 1, 1, 'roles', 0, NULL);

-- --------------------------------------------------------

--
-- Table structure for table `reservations`
--

CREATE TABLE `reservations` (
  `id` bigint UNSIGNED NOT NULL,
  `cms_user_id` bigint UNSIGNED NOT NULL,
  `room_id` bigint UNSIGNED NOT NULL,
  `date_from` varchar(30) COLLATE utf8mb4_unicode_ci NOT NULL,
  `date_to` varchar(30) COLLATE utf8mb4_unicode_ci NOT NULL,
  `total_price` decimal(8,2) NOT NULL DEFAULT '0.00',
  `cancelled_at` timestamp NULL DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  `deleted_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `reservations`
--

INSERT INTO `reservations` (`id`, `cms_user_id`, `room_id`, `date_from`, `date_to`, `total_price`, `cancelled_at`, `created_at`, `updated_at`, `deleted_at`) VALUES
(8, 1, 1, '08-06-2022', '16-06-2022', '1272.00', NULL, '2022-06-04 20:55:29', '2022-06-04 21:21:05', NULL),
(9, 1, 2, '08-06-2022', '09-06-2022', '310.00', NULL, '2022-06-04 23:07:32', '2022-06-04 23:07:32', NULL),
(10, 1, 4, '04-06-2022', '06-06-2022', '820.00', NULL, '2022-06-04 23:21:08', '2022-06-04 23:21:08', NULL);

-- --------------------------------------------------------

--
-- Table structure for table `roles`
--

CREATE TABLE `roles` (
  `id` bigint UNSIGNED NOT NULL,
  `name` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `title` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `level` int UNSIGNED DEFAULT NULL,
  `scope` int DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `roles`
--

INSERT INTO `roles` (`id`, `name`, `title`, `level`, `scope`, `created_at`, `updated_at`) VALUES
(1, 'admin', 'Administrator', NULL, NULL, '2022-05-11 22:19:17', '2022-05-11 22:19:17');

-- --------------------------------------------------------

--
-- Table structure for table `rooms`
--

CREATE TABLE `rooms` (
  `id` bigint UNSIGNED NOT NULL,
  `ext_id` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `hotel_id` bigint UNSIGNED NOT NULL,
  `name` json DEFAULT NULL,
  `slug` json DEFAULT NULL,
  `short_content` json DEFAULT NULL,
  `content` json DEFAULT NULL,
  `active` json DEFAULT NULL,
  `cost` decimal(8,2) NOT NULL DEFAULT '0.00',
  `quantity_places` smallint UNSIGNED NOT NULL DEFAULT '1',
  `params` json DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  `deleted_at` timestamp NULL DEFAULT NULL,
  `promoted` tinyint(1) NOT NULL DEFAULT '0'
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `rooms`
--

INSERT INTO `rooms` (`id`, `ext_id`, `hotel_id`, `name`, `slug`, `short_content`, `content`, `active`, `cost`, `quantity_places`, `params`, `created_at`, `updated_at`, `deleted_at`, `promoted`) VALUES
(1, NULL, 1, '{\"en\": \"Arche Hotel\"}', '{\"en\": \"sunset-room-1\"}', '{\"en\": null}', '{\"en\": \"Obiekt Arche Hotel Piła, położony w miejscowości Piła, zapewnia centrum fitness i bar. Do dyspozycji Gości przygotowano takie udogodnienia, jak restauracja, całodobowa recepcja, obsługa pokoju oraz bezpłatne WiFi we wszystkich pomieszczeniach. Prywatny parking dostępny jest za dodatkową opłatą.\\r\\n\\r\\nW każdym pokoju w obiekcie znajduje się biurko, telewizor z płaskim ekranem oraz prywatna łazienka. Pościel i ręczniki są zapewnione. Pokoje w obiekcie wyposażone są w klimatyzację i szafę.\\r\\n\\r\\nCodziennie w obiekcie serwowane jest śniadanie kontynentalne.\\r\\n\\r\\n4-gwiazdkowy obiekt Arche Hotel Piła oferuje saunę i taras słoneczny.\\r\\n\\r\\nMiejscowość Wałcz jest oddalona o 23 km od obiektu, a miejscowość Wągrowiec – o 49 km. Najbliższe lotnisko, Lotnisko Poznań-Ławica, znajduje się 82 km od obiektu Arche Hotel Piła.\"}', '1', '159.00', 1, NULL, '2022-05-22 22:53:57', '2022-06-04 18:11:08', NULL, 1),
(2, NULL, 2, '{\"en\": \"Hotel gromada - pokój 1\"}', '{\"en\": \"hotel-gromada-pokoj-1\"}', '{\"en\": null}', '{\"en\": \"Hotel ten położony jest na terenie rozległego parku nad brzegiem malowniczej rzeki Gwdy, w centrum miasta. Hotel Gromada Piła znajduje się 1 km od dworca kolejowego. Na miejscu Goście mogą korzystać z bezpłatnego WiFi.\\r\\n\\r\\nKażdy pokój obejmuje część wypoczynkową i wyposażony jest w telewizor z dostępem do kanałów kablowych. W łazience znajduje się wanna lub prysznic oraz suszarka do włosów.\\r\\n\\r\\nHotel oferuje liczne udogodnienia, w tym saunę i centrum fitness, w którym można poćwiczyć. Goście mogą również zagrać w kręgle. Na miejscu znajduje się także salon kosmetyczny.\\r\\n\\r\\nHotel zapewnia 5 sal konferencyjnych, które mogą pomieścić od 30 do 200 osób i wyposażone są w specjalistyczny sprzęt.\"}', '1', '310.00', 2, NULL, '2022-06-04 22:58:19', '2022-06-04 23:01:39', NULL, 1),
(3, NULL, 2, '{\"en\": \"Hotel gromada - pokój 2\"}', '{\"en\": \"hotel-gromada-pokoj-2\"}', '{\"en\": \"Każdy pokój obejmuje część wypoczynkową i wyposażony jest w telewizor z dostępem do kanałów kablowych. W łazience znajduje się wanna lub prysznic oraz suszarka do włosów.\"}', '{\"en\": \"Każdy pokój obejmuje część wypoczynkową i wyposażony jest w telewizor z dostępem do kanałów kablowych. W łazience znajduje się wanna lub prysznic oraz suszarka do włosów.\\r\\n\\r\\nHotel oferuje liczne udogodnienia, w tym saunę i centrum fitness, w którym można poćwiczyć. Goście mogą również zagrać w kręgle. Na miejscu znajduje się także salon kosmetyczny.\\r\\n\\r\\nHotel zapewnia 5 sal konferencyjnych, które mogą pomieścić od 30 do 200 osób i wyposażone są w specjalistyczny sprzęt.\"}', '1', '160.00', 1, NULL, '2022-06-04 23:03:44', '2022-06-04 23:03:44', NULL, 0),
(4, NULL, 3, '{\"en\": \"Baltic Gdansk - room 1\"}', '{\"en\": \"baltic-gdansk-room-1\"}', '{\"en\": \"Obiekt Baltic Gdansk położony jest w centrum miejscowości Gdańsk i oferuje ogród. W pobliżu znajduje się: Ratusz Głównego Miasta, Fontanna Neptuna i Długi Targ. Obiekt zapewnia bezpłatne WiFi we wszystkich pomieszczeniach. Na terenie obiektu dostępny jest też prywatny parking.\"}', '{\"en\": \"Obiekt Baltic Gdansk położony jest w centrum miejscowości Gdańsk i oferuje ogród. W pobliżu znajduje się: Ratusz Głównego Miasta, Fontanna Neptuna i Długi Targ. Obiekt zapewnia bezpłatne WiFi we wszystkich pomieszczeniach. Na terenie obiektu dostępny jest też prywatny parking.\\r\\n\\r\\nZe wszystkich opcji zakwaterowania roztacza się widok na miasto. W każdej z nich zapewniono pralkę, kuchnię z pełnym wyposażeniem, w tym zmywarką, jak również prywatną łazienkę z suszarką do włosów. Wyposażenie obejmuje także mikrofalówkę, lodówkę, płytę kuchenną, czajnik i ekspres do kawy.\\r\\n\\r\\nW pobliżu obiektu Baltic Gdansk znajdują się liczne atrakcje, takie jak Długie Pobrzeże, Brama Zielona i Żuraw nad Motławą. Najbliższe lotnisko, Lotnisko Gdańsk-Rębiechowo, znajduje się 13 km od obiektu Baltic Gdansk. Goście mogą skorzystać z płatnego transferu lotniskowego.\"}', '1', '410.00', 3, NULL, '2022-06-04 23:11:07', '2022-06-04 23:11:07', NULL, 0);

-- --------------------------------------------------------

--
-- Table structure for table `room_attribute_value`
--

CREATE TABLE `room_attribute_value` (
  `id` bigint UNSIGNED NOT NULL,
  `room_id` bigint UNSIGNED NOT NULL,
  `attribute_id` bigint UNSIGNED NOT NULL,
  `attribute_value_id` bigint UNSIGNED NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `room_attribute_value`
--

INSERT INTO `room_attribute_value` (`id`, `room_id`, `attribute_id`, `attribute_value_id`, `created_at`, `updated_at`) VALUES
(1, 1, 1, 2, NULL, NULL),
(2, 1, 2, 3, NULL, NULL);

--
-- Indexes for dumped tables
--

--
-- Indexes for table `abilities`
--
ALTER TABLE `abilities`
  ADD PRIMARY KEY (`id`),
  ADD KEY `abilities_scope_index` (`scope`);

--
-- Indexes for table `admins`
--
ALTER TABLE `admins`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `admins_email_unique` (`email`);

--
-- Indexes for table `assigned_roles`
--
ALTER TABLE `assigned_roles`
  ADD PRIMARY KEY (`id`),
  ADD KEY `assigned_roles_entity_index` (`entity_id`,`entity_type`,`scope`),
  ADD KEY `assigned_roles_role_id_index` (`role_id`),
  ADD KEY `assigned_roles_scope_index` (`scope`);

--
-- Indexes for table `attributes`
--
ALTER TABLE `attributes`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `attributes_code_unique` (`code`);

--
-- Indexes for table `attribute_values`
--
ALTER TABLE `attribute_values`
  ADD PRIMARY KEY (`id`),
  ADD KEY `attribute_values_attribute_id_index` (`attribute_id`);

--
-- Indexes for table `cities`
--
ALTER TABLE `cities`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `cms_domains`
--
ALTER TABLE `cms_domains`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `cms_domains_name_unique` (`name`),
  ADD UNIQUE KEY `cms_domains_url_unique` (`url`),
  ADD KEY `cms_domains_url_index` (`url`);

--
-- Indexes for table `cms_domain_language`
--
ALTER TABLE `cms_domain_language`
  ADD PRIMARY KEY (`id`),
  ADD KEY `cms_domain_language_cms_domain_id_index` (`cms_domain_id`),
  ADD KEY `cms_domain_language_cms_language_id_index` (`cms_language_id`);

--
-- Indexes for table `cms_languages`
--
ALTER TABLE `cms_languages`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `cms_links`
--
ALTER TABLE `cms_links`
  ADD PRIMARY KEY (`id`),
  ADD KEY `cms_links_class_type_model_id_index` (`class_type`,`model_id`);

--
-- Indexes for table `cms_seo_data`
--
ALTER TABLE `cms_seo_data`
  ADD PRIMARY KEY (`id`),
  ADD KEY `cms_seo_data_class_type_model_id_index` (`class_type`,`model_id`),
  ADD KEY `cms_seo_data_class_type_index` (`class_type`),
  ADD KEY `cms_seo_data_model_id_index` (`model_id`);

--
-- Indexes for table `cms_users`
--
ALTER TABLE `cms_users`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `cms_users_email_unique` (`email`),
  ADD UNIQUE KEY `cms_users_username_unique` (`username`);

--
-- Indexes for table `cms_users_roles`
--
ALTER TABLE `cms_users_roles`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `cms_user_role`
--
ALTER TABLE `cms_user_role`
  ADD PRIMARY KEY (`id`),
  ADD KEY `cms_user_role_user_id_index` (`user_id`),
  ADD KEY `cms_user_role_role_id_index` (`role_id`);

--
-- Indexes for table `cms_visitors`
--
ALTER TABLE `cms_visitors`
  ADD PRIMARY KEY (`id`),
  ADD KEY `cms_visitors_class_type_index` (`class_type`),
  ADD KEY `cms_visitors_model_id_index` (`model_id`);

--
-- Indexes for table `hotels`
--
ALTER TABLE `hotels`
  ADD PRIMARY KEY (`id`),
  ADD KEY `hotels_city_id_index` (`city_id`);

--
-- Indexes for table `media`
--
ALTER TABLE `media`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `media_disk_directory_filename_extension_unique` (`disk`,`directory`,`filename`,`extension`),
  ADD KEY `media_aggregate_type_index` (`aggregate_type`),
  ADD KEY `original_media_id` (`original_media_id`);

--
-- Indexes for table `mediables`
--
ALTER TABLE `mediables`
  ADD PRIMARY KEY (`media_id`,`mediable_type`,`mediable_id`,`tag`),
  ADD KEY `mediables_mediable_id_mediable_type_index` (`mediable_id`,`mediable_type`),
  ADD KEY `mediables_tag_index` (`tag`),
  ADD KEY `mediables_order_index` (`order`);

--
-- Indexes for table `migrations`
--
ALTER TABLE `migrations`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `opinions`
--
ALTER TABLE `opinions`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `password_resets`
--
ALTER TABLE `password_resets`
  ADD KEY `password_resets_email_index` (`email`),
  ADD KEY `password_resets_token_index` (`token`);

--
-- Indexes for table `permissions`
--
ALTER TABLE `permissions`
  ADD PRIMARY KEY (`id`),
  ADD KEY `permissions_entity_index` (`entity_id`,`entity_type`,`scope`),
  ADD KEY `permissions_ability_id_index` (`ability_id`),
  ADD KEY `permissions_scope_index` (`scope`);

--
-- Indexes for table `reservations`
--
ALTER TABLE `reservations`
  ADD PRIMARY KEY (`id`),
  ADD KEY `reservations_cms_user_id_foreign` (`cms_user_id`),
  ADD KEY `reservations_room_id_foreign` (`room_id`);

--
-- Indexes for table `roles`
--
ALTER TABLE `roles`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `roles_name_unique` (`name`,`scope`),
  ADD KEY `roles_scope_index` (`scope`);

--
-- Indexes for table `rooms`
--
ALTER TABLE `rooms`
  ADD PRIMARY KEY (`id`),
  ADD KEY `rooms_hotel_id_index` (`hotel_id`);

--
-- Indexes for table `room_attribute_value`
--
ALTER TABLE `room_attribute_value`
  ADD PRIMARY KEY (`id`),
  ADD KEY `room_attribute_value_room_id_index` (`room_id`),
  ADD KEY `room_attribute_value_attribute_id_index` (`attribute_id`),
  ADD KEY `room_attribute_value_attribute_value_id_index` (`attribute_value_id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `abilities`
--
ALTER TABLE `abilities`
  MODIFY `id` bigint UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT for table `admins`
--
ALTER TABLE `admins`
  MODIFY `id` int UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT for table `assigned_roles`
--
ALTER TABLE `assigned_roles`
  MODIFY `id` bigint UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT for table `attributes`
--
ALTER TABLE `attributes`
  MODIFY `id` bigint UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT for table `attribute_values`
--
ALTER TABLE `attribute_values`
  MODIFY `id` bigint UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=9;

--
-- AUTO_INCREMENT for table `cities`
--
ALTER TABLE `cities`
  MODIFY `id` bigint UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=7;

--
-- AUTO_INCREMENT for table `cms_domains`
--
ALTER TABLE `cms_domains`
  MODIFY `id` bigint UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT for table `cms_domain_language`
--
ALTER TABLE `cms_domain_language`
  MODIFY `id` bigint UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT for table `cms_languages`
--
ALTER TABLE `cms_languages`
  MODIFY `id` bigint UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT for table `cms_links`
--
ALTER TABLE `cms_links`
  MODIFY `id` bigint UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `cms_seo_data`
--
ALTER TABLE `cms_seo_data`
  MODIFY `id` bigint UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `cms_users`
--
ALTER TABLE `cms_users`
  MODIFY `id` bigint UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT for table `cms_users_roles`
--
ALTER TABLE `cms_users_roles`
  MODIFY `id` bigint UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `cms_user_role`
--
ALTER TABLE `cms_user_role`
  MODIFY `id` bigint UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `cms_visitors`
--
ALTER TABLE `cms_visitors`
  MODIFY `id` bigint UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `hotels`
--
ALTER TABLE `hotels`
  MODIFY `id` bigint UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT for table `media`
--
ALTER TABLE `media`
  MODIFY `id` int UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=25;

--
-- AUTO_INCREMENT for table `migrations`
--
ALTER TABLE `migrations`
  MODIFY `id` int UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=31;

--
-- AUTO_INCREMENT for table `opinions`
--
ALTER TABLE `opinions`
  MODIFY `id` bigint UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT for table `permissions`
--
ALTER TABLE `permissions`
  MODIFY `id` bigint UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT for table `reservations`
--
ALTER TABLE `reservations`
  MODIFY `id` bigint UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=11;

--
-- AUTO_INCREMENT for table `roles`
--
ALTER TABLE `roles`
  MODIFY `id` bigint UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT for table `rooms`
--
ALTER TABLE `rooms`
  MODIFY `id` bigint UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- AUTO_INCREMENT for table `room_attribute_value`
--
ALTER TABLE `room_attribute_value`
  MODIFY `id` bigint UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- Constraints for dumped tables
--

--
-- Constraints for table `assigned_roles`
--
ALTER TABLE `assigned_roles`
  ADD CONSTRAINT `assigned_roles_role_id_foreign` FOREIGN KEY (`role_id`) REFERENCES `roles` (`id`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Constraints for table `attribute_values`
--
ALTER TABLE `attribute_values`
  ADD CONSTRAINT `attribute_values_attribute_id_foreign` FOREIGN KEY (`attribute_id`) REFERENCES `attributes` (`id`);

--
-- Constraints for table `cms_domain_language`
--
ALTER TABLE `cms_domain_language`
  ADD CONSTRAINT `cms_domain_language_cms_domain_id_foreign` FOREIGN KEY (`cms_domain_id`) REFERENCES `cms_domains` (`id`) ON DELETE CASCADE,
  ADD CONSTRAINT `cms_domain_language_cms_language_id_foreign` FOREIGN KEY (`cms_language_id`) REFERENCES `cms_languages` (`id`) ON DELETE CASCADE;

--
-- Constraints for table `cms_user_role`
--
ALTER TABLE `cms_user_role`
  ADD CONSTRAINT `cms_user_role_role_id_foreign` FOREIGN KEY (`role_id`) REFERENCES `cms_users_roles` (`id`) ON DELETE CASCADE,
  ADD CONSTRAINT `cms_user_role_user_id_foreign` FOREIGN KEY (`user_id`) REFERENCES `cms_users` (`id`) ON DELETE CASCADE;

--
-- Constraints for table `hotels`
--
ALTER TABLE `hotels`
  ADD CONSTRAINT `hotels_city_id_foreign` FOREIGN KEY (`city_id`) REFERENCES `cities` (`id`);

--
-- Constraints for table `media`
--
ALTER TABLE `media`
  ADD CONSTRAINT `original_media_id` FOREIGN KEY (`original_media_id`) REFERENCES `media` (`id`) ON DELETE SET NULL;

--
-- Constraints for table `mediables`
--
ALTER TABLE `mediables`
  ADD CONSTRAINT `mediables_media_id_foreign` FOREIGN KEY (`media_id`) REFERENCES `media` (`id`) ON DELETE CASCADE;

--
-- Constraints for table `permissions`
--
ALTER TABLE `permissions`
  ADD CONSTRAINT `permissions_ability_id_foreign` FOREIGN KEY (`ability_id`) REFERENCES `abilities` (`id`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Constraints for table `reservations`
--
ALTER TABLE `reservations`
  ADD CONSTRAINT `reservations_cms_user_id_foreign` FOREIGN KEY (`cms_user_id`) REFERENCES `cms_users` (`id`),
  ADD CONSTRAINT `reservations_room_id_foreign` FOREIGN KEY (`room_id`) REFERENCES `rooms` (`id`);

--
-- Constraints for table `rooms`
--
ALTER TABLE `rooms`
  ADD CONSTRAINT `rooms_hotel_id_foreign` FOREIGN KEY (`hotel_id`) REFERENCES `hotels` (`id`);

--
-- Constraints for table `room_attribute_value`
--
ALTER TABLE `room_attribute_value`
  ADD CONSTRAINT `room_attribute_value_attribute_id_foreign` FOREIGN KEY (`attribute_id`) REFERENCES `attributes` (`id`) ON DELETE CASCADE,
  ADD CONSTRAINT `room_attribute_value_attribute_value_id_foreign` FOREIGN KEY (`attribute_value_id`) REFERENCES `attribute_values` (`id`) ON DELETE CASCADE,
  ADD CONSTRAINT `room_attribute_value_room_id_foreign` FOREIGN KEY (`room_id`) REFERENCES `rooms` (`id`) ON DELETE CASCADE;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
