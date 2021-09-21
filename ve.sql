-- --------------------------------------------------------
-- Host:                         151.106.124.219
-- Server version:               10.5.12-MariaDB-cll-lve - MariaDB Server
-- Server OS:                    Linux
-- HeidiSQL Version:             11.2.0.6213
-- --------------------------------------------------------

/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET NAMES utf8 */;
/*!50503 SET NAMES utf8mb4 */;
/*!40014 SET @OLD_FOREIGN_KEY_CHECKS=@@FOREIGN_KEY_CHECKS, FOREIGN_KEY_CHECKS=0 */;
/*!40101 SET @OLD_SQL_MODE=@@SQL_MODE, SQL_MODE='NO_AUTO_VALUE_ON_ZERO' */;
/*!40111 SET @OLD_SQL_NOTES=@@SQL_NOTES, SQL_NOTES=0 */;


-- Dumping database structure for u491560908_expo
CREATE DATABASE IF NOT EXISTS `u491560908_expo` /*!40100 DEFAULT CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci */;
USE `u491560908_expo`;

-- Dumping structure for table u491560908_expo.appointments
CREATE TABLE IF NOT EXISTS `appointments` (
  `id` bigint(20) unsigned NOT NULL AUTO_INCREMENT,
  `exhibitor_id` bigint(20) unsigned DEFAULT NULL,
  `user_id` bigint(20) unsigned NOT NULL,
  `visitor_id` bigint(20) unsigned DEFAULT NULL,
  `date` date DEFAULT NULL,
  `time` time DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- Dumping data for table u491560908_expo.appointments: ~0 rows (approximately)
/*!40000 ALTER TABLE `appointments` DISABLE KEYS */;
/*!40000 ALTER TABLE `appointments` ENABLE KEYS */;

-- Dumping structure for table u491560908_expo.chats
CREATE TABLE IF NOT EXISTS `chats` (
  `id` bigint(20) unsigned NOT NULL AUTO_INCREMENT,
  `sender_id` bigint(20) unsigned NOT NULL,
  `receiver_id` bigint(20) unsigned NOT NULL,
  `image` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `message` text COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- Dumping data for table u491560908_expo.chats: ~0 rows (approximately)
/*!40000 ALTER TABLE `chats` DISABLE KEYS */;
/*!40000 ALTER TABLE `chats` ENABLE KEYS */;

-- Dumping structure for table u491560908_expo.failed_jobs
CREATE TABLE IF NOT EXISTS `failed_jobs` (
  `id` bigint(20) unsigned NOT NULL AUTO_INCREMENT,
  `uuid` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `connection` text COLLATE utf8mb4_unicode_ci NOT NULL,
  `queue` text COLLATE utf8mb4_unicode_ci NOT NULL,
  `payload` longtext COLLATE utf8mb4_unicode_ci NOT NULL,
  `exception` longtext COLLATE utf8mb4_unicode_ci NOT NULL,
  `failed_at` timestamp NOT NULL DEFAULT current_timestamp(),
  PRIMARY KEY (`id`),
  UNIQUE KEY `failed_jobs_uuid_unique` (`uuid`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- Dumping data for table u491560908_expo.failed_jobs: ~0 rows (approximately)
/*!40000 ALTER TABLE `failed_jobs` DISABLE KEYS */;
/*!40000 ALTER TABLE `failed_jobs` ENABLE KEYS */;

-- Dumping structure for table u491560908_expo.migrations
CREATE TABLE IF NOT EXISTS `migrations` (
  `id` int(10) unsigned NOT NULL AUTO_INCREMENT,
  `migration` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `batch` int(11) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=9 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- Dumping data for table u491560908_expo.migrations: ~8 rows (approximately)
/*!40000 ALTER TABLE `migrations` DISABLE KEYS */;
INSERT IGNORE INTO `migrations` (`id`, `migration`, `batch`) VALUES
	(1, '2014_10_12_000000_create_users_table', 1),
	(2, '2014_10_12_100000_create_password_resets_table', 1),
	(3, '2019_08_19_000000_create_failed_jobs_table', 1),
	(4, '2019_12_14_000001_create_personal_access_tokens_table', 1),
	(5, '2021_08_24_061938_create_products_table', 1),
	(6, '2021_08_24_074606_create_news_table', 1),
	(7, '2021_08_25_021738_create_appointments_table', 1),
	(8, '2021_08_27_080400_create_chats_table', 1);
/*!40000 ALTER TABLE `migrations` ENABLE KEYS */;

-- Dumping structure for table u491560908_expo.news
CREATE TABLE IF NOT EXISTS `news` (
  `id` bigint(20) unsigned NOT NULL AUTO_INCREMENT,
  `title` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `slug` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `body` text COLLATE utf8mb4_unicode_ci NOT NULL,
  `publish` tinyint(1) NOT NULL DEFAULT 0,
  `publish_at` date NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- Dumping data for table u491560908_expo.news: ~0 rows (approximately)
/*!40000 ALTER TABLE `news` DISABLE KEYS */;
/*!40000 ALTER TABLE `news` ENABLE KEYS */;

-- Dumping structure for table u491560908_expo.password_resets
CREATE TABLE IF NOT EXISTS `password_resets` (
  `email` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `token` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  KEY `password_resets_email_index` (`email`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- Dumping data for table u491560908_expo.password_resets: ~0 rows (approximately)
/*!40000 ALTER TABLE `password_resets` DISABLE KEYS */;
/*!40000 ALTER TABLE `password_resets` ENABLE KEYS */;

-- Dumping structure for table u491560908_expo.personal_access_tokens
CREATE TABLE IF NOT EXISTS `personal_access_tokens` (
  `id` bigint(20) unsigned NOT NULL AUTO_INCREMENT,
  `tokenable_type` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `tokenable_id` bigint(20) unsigned NOT NULL,
  `name` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `token` varchar(64) COLLATE utf8mb4_unicode_ci NOT NULL,
  `abilities` text COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `last_used_at` timestamp NULL DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`),
  UNIQUE KEY `personal_access_tokens_token_unique` (`token`),
  KEY `personal_access_tokens_tokenable_type_tokenable_id_index` (`tokenable_type`,`tokenable_id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- Dumping data for table u491560908_expo.personal_access_tokens: ~0 rows (approximately)
/*!40000 ALTER TABLE `personal_access_tokens` DISABLE KEYS */;
/*!40000 ALTER TABLE `personal_access_tokens` ENABLE KEYS */;

-- Dumping structure for table u491560908_expo.products
CREATE TABLE IF NOT EXISTS `products` (
  `id` bigint(20) unsigned NOT NULL AUTO_INCREMENT,
  `name` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `image` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `video_url` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `price` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `description` text COLLATE utf8mb4_unicode_ci NOT NULL,
  `user_id` bigint(20) unsigned NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- Dumping data for table u491560908_expo.products: ~0 rows (approximately)
/*!40000 ALTER TABLE `products` DISABLE KEYS */;
/*!40000 ALTER TABLE `products` ENABLE KEYS */;

-- Dumping structure for table u491560908_expo.users
CREATE TABLE IF NOT EXISTS `users` (
  `id` bigint(20) unsigned NOT NULL AUTO_INCREMENT,
  `name` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `email` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `mobile` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `job_function` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `company_name` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `company_website` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `country` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `province` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `business_nature` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `institution_name` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `institution_type` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `visitor_type` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `product_interest` longtext CHARACTER SET utf8mb4 COLLATE utf8mb4_bin DEFAULT NULL CHECK (json_valid(`product_interest`)),
  `visit_purpose` longtext CHARACTER SET utf8mb4 COLLATE utf8mb4_bin DEFAULT NULL CHECK (json_valid(`visit_purpose`)),
  `member_sehat_ri` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `company_logo` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `company_video_url` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `company_description` text COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `role` varchar(20) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `email_verified_at` timestamp NULL DEFAULT NULL,
  `password` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `remember_token` varchar(100) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`),
  UNIQUE KEY `users_email_unique` (`email`)
) ENGINE=InnoDB AUTO_INCREMENT=17 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- Dumping data for table u491560908_expo.users: ~0 rows (approximately)
/*!40000 ALTER TABLE `users` DISABLE KEYS */;
INSERT IGNORE INTO `users` (`id`, `name`, `email`, `mobile`, `job_function`, `company_name`, `company_website`, `country`, `province`, `business_nature`, `institution_name`, `institution_type`, `visitor_type`, `product_interest`, `visit_purpose`, `member_sehat_ri`, `company_logo`, `company_video_url`, `company_description`, `role`, `email_verified_at`, `password`, `remember_token`, `created_at`, `updated_at`) VALUES
	(1, 'Visitor 1', 'visitor1@mail.com', '+627346723878', 'Director', NULL, NULL, 'Iran (Islamic Republic of)', 'Sumatera Utara', NULL, 'inst', 'Consultancy Services', 'Hospital Clinical Staff', '["Hospital Building","COVID-19 Related Products"]', '["Buying","Networking"]', 'No', NULL, NULL, NULL, 'visitor', NULL, '$2y$10$nUTzMpPnHA40QZr2uvk8WOwiE.Clt8PtYuA7/80R79mJ4.5ps/38C', NULL, '2021-09-07 02:20:28', '2021-09-07 02:20:28'),
	(2, 'Cas Sano', 'cassano@temporary-mail.net', '08236276428', 'Doctor', NULL, NULL, 'Italy', 'Bali', NULL, 'RS Italiano', 'Hospital (Private)', 'Medical Doctor', '["Hospital Informatics","Hospital Devices","COVID-19 Related Products"]', '["Buying","Networking","Join Webinar"]', 'No', NULL, NULL, NULL, 'visitor', NULL, '$2y$10$iBBZKJ3LNj5pBe3meT/Jpe3oOWuCZJUaZQR2cjBT4fnoah9MZm7p6', NULL, '2021-09-07 04:44:32', '2021-09-07 04:44:32'),
	(3, 'Amelia Lita', 'alita@temporary-mail.net', 'Halohalobandung', 'Engineer', NULL, NULL, 'Andorra', 'Bengkulu', NULL, 'Karya Indonesia Cerdas', 'Educational Institute (Medical)', 'Medical Doctor', '["Hospital Building","Hospital Mechanic","Hospital Electric","Hospital Environment","Hospital Informatics","Hospital Devices","COVID-19 Related Products","Other"]', '["Buying","Networking","Information Gathering","Join Webinar","Other"]', 'I Forget', NULL, NULL, NULL, 'visitor', NULL, '$2y$10$aSwWkujZF1HFmaHAcQ5d6uvIo8xnNX7X.pGNvOmuN1cxvKyYlTqKu', NULL, '2021-09-07 07:34:23', '2021-09-07 07:34:23'),
	(4, 'Amelia Lita', 'aslita@ksks.net', 'Halohalobandung', 'Engineer', 'Karya Indonesia Cerdas', 'Xxx', 'American Samoa', 'Bengkulu', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, 'exhibitor', NULL, '$2y$10$8JEKl/AJ6KZTMGJWRkHyoeXEg9.AXRQmvIgBKDiw0STgriIxXiKd6', NULL, '2021-09-07 07:53:35', '2021-09-07 07:53:35'),
	(5, 'dokter1', 'dede@mail.com', '+6285362119212', 'Doctor', NULL, NULL, 'Honduras', 'Nusa Tenggara Barat', NULL, 'inst', 'Laboratories (Medical)', 'Biomedical Engineering', '["Hospital Building"]', '["Buying"]', 'No', NULL, NULL, NULL, 'visitor', NULL, '$2y$10$bqAKtDl41jaibcZ2vAlQTumm0yjAUvqD74KI/DIlZK4VI72GSPCVO', NULL, '2021-09-07 09:23:11', '2021-09-07 09:23:11'),
	(6, 'ahli', 'aszasani@gmail.com', '+6285362119212', 'Consultant', 'DedeBKc', 'DedeBKc', 'Bahamas', 'Banten', '["Hospital Building"]', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, 'exhibitor', NULL, '$2y$10$9bkaHpILB8it3qZy9oXxde9pkH8BdzbfYUFvBwf/Vo3mVbWu43cy.', NULL, '2021-09-07 09:23:52', '2021-09-07 09:23:52'),
	(7, 'Test', '1xnj9_bi@temporary-mail.net', '0912830934', 'Director', NULL, NULL, 'Afghanistan', 'Kepulauan Riau', NULL, 'RS lksdjlaq', 'Comunity Health Services', 'Medical Doctor', '["Hospital Building"]', '["Buying"]', 'Yes', NULL, NULL, NULL, 'visitor', NULL, '$2y$10$DpebjXL3MQMjRTCZ6YqzaeTlGdmRHHFYdgJntlE1CPXXpi6IK74L.', NULL, '2021-09-09 04:20:47', '2021-09-09 04:20:47'),
	(8, 'Wiryo Tanjung', 'wiryo.tanjung@gmail.com', '085102507681', 'Other', NULL, NULL, 'Indonesia', 'Dki Jakarta', NULL, 'KIC', 'Other', 'University Lecturer', '["Hospital Electric"]', '["Information Gathering"]', 'Yes', NULL, NULL, NULL, 'visitor', NULL, '$2y$10$WjIGJy./GljoegTEp6AtI.8RD6O9P.MIv32AFcMWYKHOAP/qoIl3W', NULL, '2021-09-10 04:36:40', '2021-09-10 04:36:40'),
	(9, 'Aszani', 'aszanisif@gmail.com', '081212341234', 'Other', NULL, NULL, 'Indonesia', 'Dki Jakarta', NULL, 'apa aja', 'Other', 'University Lecturer', '["Hospital Electric","Hospital Devices"]', '["Information Gathering","Consultaion"]', 'I Forget', NULL, NULL, NULL, 'visitor', NULL, '$2y$10$EIlSEiq0UK1ogeGndgKwkO5CgqgGARnWQc467HQCUoCl0851IPaB2', NULL, '2021-09-10 04:56:10', '2021-09-10 04:56:10'),
	(10, 'Ayaka Rona', 'ayaka.nabihah@gmail.com', '081318083955', 'Engineer', NULL, NULL, 'Indonesia', 'Jawa Barat', NULL, 'Politeknik Negeri Jakarta', 'Educational Institute (Non-Medical)', 'Government Staff', '["Hospital Electric","Hospital Devices"]', '["Join Webinar","Consultaion"]', 'Yes', NULL, NULL, NULL, 'visitor', NULL, '$2y$10$d.w8Co6QgAAkf.Q0bV89GuGhvaLTEE22mk0eitYOf1ZIFiCIxRhja', NULL, '2021-09-10 07:08:02', '2021-09-10 07:08:02'),
	(11, 'Manajemen Lita', 'xxx@gmail.com', '0819231141fasdkjl', 'Other', NULL, NULL, 'Australia', 'Sumatera Utara', NULL, 'KIC', 'Laboratories (Medical)', 'Hospital Engineering Staff', '["Other"]', '["Networking"]', 'I Forget', NULL, NULL, NULL, 'visitor', NULL, '$2y$10$QzqyA/iDcrZQXKRg4cnwS.QnLwRDEl6Mmec0nU.Axxjcq4JThZklu', NULL, '2021-09-10 07:15:03', '2021-09-10 07:15:03'),
	(12, 'sani', 'vwtq0bmf@chapedia.org', '123243432432', 'Director', 'lala land', 'lala land', 'American Samoa', 'Nusa Tenggara Barat', '["Hospital Informatics"]', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, 'exhibitor', NULL, '$2y$10$ejpbptoN0HieavHoD7BnButej77/IcFBTaNiZ/BxszviJGJqAnJtO', NULL, '2021-09-10 07:27:16', '2021-09-10 07:27:16'),
	(13, 'jackbrown', 'haryantosteven72@gmail.com', '081293427693', 'Programmer', '123', '123', 'Indonesia', 'Dki Jakarta', '["Hospital Building"]', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, 'exhibitor', NULL, '$2y$10$jKrsD/DS8uEBQNS61gH3Re4lq6zunlZAWJpcWF5BZdTQ6fdRZmofS', NULL, '2021-09-10 07:36:57', '2021-09-10 07:36:57'),
	(14, 'Haryanto Steven', 'haryantosteven72@yahoo.com', '081293427693', 'Doctor', NULL, NULL, 'Indonesia', 'Dki Jakarta', NULL, 'POLITEKNIK NEGERI JAKARTA', 'Contractor (Hospital)', 'Medical Doctor', '["Hospital Building","Hospital Mechanic","Hospital Electric","Hospital Environment","Hospital Informatics","Hospital Devices","COVID-19 Related Products"]', '["Buying"]', 'Yes', NULL, NULL, NULL, 'visitor', NULL, '$2y$10$plvtDBdlP6QToLaVIsZ58uCFBVdzh4Y04WWCzuvgH6nZTYeqoPnpa', NULL, '2021-09-10 07:45:13', '2021-09-10 07:45:13'),
	(15, 'Bagas Atmojo, ST', 'vepon66319@sicmag.com', '081311048649', 'Engineer', NULL, NULL, 'Indonesia', 'Jawa Barat', NULL, 'PT. ABC123', 'Technology (Medical)', 'Biomedical Engineering', '["Hospital Building","Hospital Mechanic","Hospital Electric","Hospital Environment","Hospital Informatics","Hospital Devices","COVID-19 Related Products","Other"]', '["Buying","Networking","Other"]', 'I Forget', NULL, NULL, NULL, 'visitor', NULL, '$2y$10$ShqsbXc1Szyj5MAYu4C06O5yBP/jro4ZPZTrBJwX1ewLXhtZbGMJu', NULL, '2021-09-10 07:53:23', '2021-09-10 07:53:23'),
	(16, 'Rino Ferdian Surakusumah', 'rinoferdian@gmail.com', '087737713414', 'Other', 'KIC', 'kic.com', 'Indonesia', 'Riau', '["Other"]', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, 'exhibitor', NULL, '$2y$10$1WXvEtvh39UjIaFTx2gvWuhzWN/rU995DvCJ78MAH69QXASjWtwYu', NULL, '2021-09-10 09:36:08', '2021-09-10 09:36:08');
/*!40000 ALTER TABLE `users` ENABLE KEYS */;

/*!40101 SET SQL_MODE=IFNULL(@OLD_SQL_MODE, '') */;
/*!40014 SET FOREIGN_KEY_CHECKS=IFNULL(@OLD_FOREIGN_KEY_CHECKS, 1) */;
/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40111 SET SQL_NOTES=IFNULL(@OLD_SQL_NOTES, 1) */;
