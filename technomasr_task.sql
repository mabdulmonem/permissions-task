-- --------------------------------------------------------
-- Host:                         127.0.0.1
-- Server version:               5.7.33 - MySQL Community Server (GPL)
-- Server OS:                    Win64
-- HeidiSQL Version:             11.2.0.6213
-- --------------------------------------------------------

/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET NAMES utf8 */;
/*!50503 SET NAMES utf8mb4 */;
/*!40014 SET @OLD_FOREIGN_KEY_CHECKS=@@FOREIGN_KEY_CHECKS, FOREIGN_KEY_CHECKS=0 */;
/*!40101 SET @OLD_SQL_MODE=@@SQL_MODE, SQL_MODE='NO_AUTO_VALUE_ON_ZERO' */;
/*!40111 SET @OLD_SQL_NOTES=@@SQL_NOTES, SQL_NOTES=0 */;


-- Dumping database structure for tecnomasr_task
CREATE DATABASE IF NOT EXISTS `tecnomasr_task` /*!40100 DEFAULT CHARACTER SET latin1 */;
USE `tecnomasr_task`;

-- Dumping structure for table tecnomasr_task.failed_jobs
CREATE TABLE IF NOT EXISTS `failed_jobs` (
  `id` bigint(20) unsigned NOT NULL AUTO_INCREMENT,
  `uuid` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `connection` text COLLATE utf8mb4_unicode_ci NOT NULL,
  `queue` text COLLATE utf8mb4_unicode_ci NOT NULL,
  `payload` longtext COLLATE utf8mb4_unicode_ci NOT NULL,
  `exception` longtext COLLATE utf8mb4_unicode_ci NOT NULL,
  `failed_at` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP,
  PRIMARY KEY (`id`),
  UNIQUE KEY `failed_jobs_uuid_unique` (`uuid`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- Dumping data for table tecnomasr_task.failed_jobs: ~0 rows (approximately)
/*!40000 ALTER TABLE `failed_jobs` DISABLE KEYS */;
/*!40000 ALTER TABLE `failed_jobs` ENABLE KEYS */;

-- Dumping structure for table tecnomasr_task.migrations
CREATE TABLE IF NOT EXISTS `migrations` (
  `id` int(10) unsigned NOT NULL AUTO_INCREMENT,
  `migration` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `batch` int(11) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=10 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- Dumping data for table tecnomasr_task.migrations: ~8 rows (approximately)
/*!40000 ALTER TABLE `migrations` DISABLE KEYS */;
INSERT INTO `migrations` (`id`, `migration`, `batch`) VALUES
	(1, '2014_10_12_000000_create_users_table', 1),
	(2, '2014_10_12_100000_create_password_resets_table', 1),
	(3, '2019_08_19_000000_create_failed_jobs_table', 1),
	(4, '2019_12_14_000001_create_personal_access_tokens_table', 1),
	(5, '2022_09_27_191936_create_permissions_table', 1),
	(6, '2022_09_27_192009_create_roles_table', 1),
	(7, '2022_09_27_192353_create_users_permissions_table', 1),
	(8, '2022_09_27_192556_create_roles_permissions_table', 1),
	(9, '2022_09_28_115722_create_users_roles_table', 1);
/*!40000 ALTER TABLE `migrations` ENABLE KEYS */;

-- Dumping structure for table tecnomasr_task.password_resets
CREATE TABLE IF NOT EXISTS `password_resets` (
  `email` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `token` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  KEY `password_resets_email_index` (`email`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- Dumping data for table tecnomasr_task.password_resets: ~0 rows (approximately)
/*!40000 ALTER TABLE `password_resets` DISABLE KEYS */;
/*!40000 ALTER TABLE `password_resets` ENABLE KEYS */;

-- Dumping structure for table tecnomasr_task.permissions
CREATE TABLE IF NOT EXISTS `permissions` (
  `id` bigint(20) unsigned NOT NULL AUTO_INCREMENT,
  `name` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL COMMENT 'permission name in english',
  `name_ar` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL COMMENT 'permission name in arabic',
  `slug` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL COMMENT 'spaces not are allowed here replace it with -',
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=13 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- Dumping data for table tecnomasr_task.permissions: ~26 rows (approximately)
/*!40000 ALTER TABLE `permissions` DISABLE KEYS */;
INSERT INTO `permissions` (`id`, `name`, `name_ar`, `slug`, `created_at`, `updated_at`) VALUES
	(1, 'Create Users', 'إنشاء مشرف', 'create-users', '2022-09-30 18:07:46', '2022-09-30 18:07:46'),
	(2, 'Read Users', 'عرض مشرف', 'read-users', '2022-09-30 18:07:46', '2022-09-30 18:07:46'),
	(3, 'Update Users', 'تعديل مشرف', 'update-users', '2022-09-30 18:07:46', '2022-09-30 18:07:46'),
	(4, 'Delete Users', 'حذف مشرف', 'delete-users', '2022-09-30 18:07:47', '2022-09-30 18:07:47'),
	(5, 'Create Permission', 'إنشاء إذن', 'create-permission', '2022-09-30 18:07:47', '2022-09-30 18:07:47'),
	(6, 'Read Permission', 'عرض إذن', 'read-permission', '2022-09-30 18:07:47', '2022-09-30 18:07:47'),
	(7, 'Update Permission', 'تعديل إذن', 'update-permission', '2022-09-30 18:07:47', '2022-09-30 18:07:47'),
	(8, 'Delete Permission', 'حذف إذن', 'delete-permission', '2022-09-30 18:07:47', '2022-09-30 18:07:47'),
	(9, 'Create Roles', 'إنشاء الصلاحيات', 'create-roles', '2022-09-30 18:07:47', '2022-09-30 18:07:47'),
	(10, 'Read Roles', 'عرض الصلاحيات', 'read-roles', '2022-09-30 18:07:48', '2022-09-30 18:07:48'),
	(11, 'Update Roles', 'تعديل الصلاحيات', 'update-roles', '2022-09-30 18:07:48', '2022-09-30 18:07:48'),
	(12, 'Delete Roles', 'حذف الصلاحيات', 'delete-roles', '2022-09-30 18:07:48', '2022-09-30 18:07:48');
/*!40000 ALTER TABLE `permissions` ENABLE KEYS */;

-- Dumping structure for table tecnomasr_task.personal_access_tokens
CREATE TABLE IF NOT EXISTS `personal_access_tokens` (
  `id` bigint(20) unsigned NOT NULL AUTO_INCREMENT,
  `tokenable_type` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `tokenable_id` bigint(20) unsigned NOT NULL,
  `name` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `token` varchar(64) COLLATE utf8mb4_unicode_ci NOT NULL,
  `abilities` text COLLATE utf8mb4_unicode_ci,
  `last_used_at` timestamp NULL DEFAULT NULL,
  `expires_at` timestamp NULL DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`),
  UNIQUE KEY `personal_access_tokens_token_unique` (`token`),
  KEY `personal_access_tokens_tokenable_type_tokenable_id_index` (`tokenable_type`,`tokenable_id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- Dumping data for table tecnomasr_task.personal_access_tokens: ~0 rows (approximately)
/*!40000 ALTER TABLE `personal_access_tokens` DISABLE KEYS */;
/*!40000 ALTER TABLE `personal_access_tokens` ENABLE KEYS */;

-- Dumping structure for table tecnomasr_task.roles
CREATE TABLE IF NOT EXISTS `roles` (
  `id` bigint(20) unsigned NOT NULL AUTO_INCREMENT,
  `name` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL COMMENT 'role name in english',
  `name_ar` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL COMMENT 'role name in arabic',
  `slug` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL COMMENT 'spaces not are allowed here replace it with -',
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=3 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- Dumping data for table tecnomasr_task.roles: ~2 rows (approximately)
/*!40000 ALTER TABLE `roles` DISABLE KEYS */;
INSERT INTO `roles` (`id`, `name`, `name_ar`, `slug`, `created_at`, `updated_at`) VALUES
	(1, 'Administrator', 'المسؤال', 'administrator', '2022-09-30 18:07:38', '2022-09-30 18:07:38'),
	(2, 'Client', 'العميل', 'client', '2022-09-30 18:07:38', '2022-09-30 18:07:38');
/*!40000 ALTER TABLE `roles` ENABLE KEYS */;

-- Dumping structure for table tecnomasr_task.roles_permissions
CREATE TABLE IF NOT EXISTS `roles_permissions` (
  `id` bigint(20) unsigned NOT NULL AUTO_INCREMENT,
  `role_id` bigint(20) unsigned NOT NULL,
  `permission_id` bigint(20) unsigned NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`),
  KEY `roles_permissions_role_id_foreign` (`role_id`),
  KEY `roles_permissions_permission_id_foreign` (`permission_id`),
  CONSTRAINT `roles_permissions_permission_id_foreign` FOREIGN KEY (`permission_id`) REFERENCES `permissions` (`id`),
  CONSTRAINT `roles_permissions_role_id_foreign` FOREIGN KEY (`role_id`) REFERENCES `roles` (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=13 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- Dumping data for table tecnomasr_task.roles_permissions: ~18 rows (approximately)
/*!40000 ALTER TABLE `roles_permissions` DISABLE KEYS */;
INSERT INTO `roles_permissions` (`id`, `role_id`, `permission_id`, `created_at`, `updated_at`) VALUES
	(1, 1, 1, NULL, NULL),
	(2, 1, 2, NULL, NULL),
	(3, 1, 3, NULL, NULL),
	(4, 1, 4, NULL, NULL),
	(5, 1, 5, NULL, NULL),
	(6, 1, 6, NULL, NULL),
	(7, 1, 7, NULL, NULL),
	(8, 1, 8, NULL, NULL),
	(9, 1, 9, NULL, NULL),
	(10, 1, 10, NULL, NULL),
	(11, 1, 11, NULL, NULL),
	(12, 1, 12, NULL, NULL);
/*!40000 ALTER TABLE `roles_permissions` ENABLE KEYS */;

-- Dumping structure for table tecnomasr_task.users
CREATE TABLE IF NOT EXISTS `users` (
  `id` bigint(20) unsigned NOT NULL AUTO_INCREMENT,
  `name` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `email` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `email_verified_at` timestamp NULL DEFAULT NULL,
  `password` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `photo` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `phone` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `remember_token` varchar(100) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`),
  UNIQUE KEY `users_email_unique` (`email`),
  UNIQUE KEY `users_phone_unique` (`phone`)
) ENGINE=InnoDB AUTO_INCREMENT=52 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- Dumping data for table tecnomasr_task.users: ~53 rows (approximately)
/*!40000 ALTER TABLE `users` DISABLE KEYS */;
INSERT INTO `users` (`id`, `name`, `email`, `email_verified_at`, `password`, `photo`, `phone`, `remember_token`, `created_at`, `updated_at`) VALUES
	(1, 'Administrator', 'admin@admin.com', NULL, '$2y$10$qRJRqRkXXdJpFZMt4hCWB.gaWGzZXFz5KXiMcEQGrYQK50wWO2mry', 'assets/dashboard/img/AdminLTELogo.png', '01099647084', NULL, '2022-09-30 18:07:38', '2022-09-30 18:07:38'),
	(2, 'Dejah Hauck', 'tgaylord@example.com', '2022-09-30 18:07:39', '$2y$10$92IXUNpkjO0rOQ5byMi.Ye4oKoEa3Ro9llC/.og/at2.uheWG/igi', 'assets/dashboard/img/AdminLTELogo.png', '1-414-635-8851', 'YMMMRsdzv1', '2022-09-30 18:07:39', '2022-09-30 18:07:39'),
	(3, 'Miss Crystal Grady', 'roscoe15@example.net', '2022-09-30 18:07:39', '$2y$10$92IXUNpkjO0rOQ5byMi.Ye4oKoEa3Ro9llC/.og/at2.uheWG/igi', 'assets/dashboard/img/AdminLTELogo.png', '1-301-315-0943', 'iUPCfs8Rfl', '2022-09-30 18:07:39', '2022-09-30 18:07:39'),
	(4, 'Madalyn Considine', 'juwan42@example.com', '2022-09-30 18:07:39', '$2y$10$92IXUNpkjO0rOQ5byMi.Ye4oKoEa3Ro9llC/.og/at2.uheWG/igi', 'assets/dashboard/img/AdminLTELogo.png', '+19478495349', 'j5BoR6Tfdb', '2022-09-30 18:07:39', '2022-09-30 18:07:39'),
	(5, 'Dan Bosco', 'anabel93@example.org', '2022-09-30 18:07:39', '$2y$10$92IXUNpkjO0rOQ5byMi.Ye4oKoEa3Ro9llC/.og/at2.uheWG/igi', 'assets/dashboard/img/AdminLTELogo.png', '+1 (774) 223-7477', 'TFGIVKAKf9', '2022-09-30 18:07:39', '2022-09-30 18:07:39'),
	(6, 'Ansley Bernier', 'waters.janie@example.org', '2022-09-30 18:07:39', '$2y$10$92IXUNpkjO0rOQ5byMi.Ye4oKoEa3Ro9llC/.og/at2.uheWG/igi', 'assets/dashboard/img/AdminLTELogo.png', '(863) 826-1725', '6gtPekGctX', '2022-09-30 18:07:39', '2022-09-30 18:07:39'),
	(7, 'Miss Demetris Lueilwitz', 'dariana.murray@example.net', '2022-09-30 18:07:39', '$2y$10$92IXUNpkjO0rOQ5byMi.Ye4oKoEa3Ro9llC/.og/at2.uheWG/igi', 'assets/dashboard/img/AdminLTELogo.png', '517.363.5625', 'DSOqgD79DI', '2022-09-30 18:07:39', '2022-09-30 18:07:39'),
	(8, 'Lue Swift', 'qwolf@example.com', '2022-09-30 18:07:39', '$2y$10$92IXUNpkjO0rOQ5byMi.Ye4oKoEa3Ro9llC/.og/at2.uheWG/igi', 'assets/dashboard/img/AdminLTELogo.png', '+1 (380) 386-2087', '4mauXqllmO', '2022-09-30 18:07:39', '2022-09-30 18:07:39'),
	(9, 'Dr. Evan Moen DDS', 'eleazar28@example.org', '2022-09-30 18:07:39', '$2y$10$92IXUNpkjO0rOQ5byMi.Ye4oKoEa3Ro9llC/.og/at2.uheWG/igi', 'assets/dashboard/img/AdminLTELogo.png', '520-615-6259', 'iJqkLVKu8j', '2022-09-30 18:07:39', '2022-09-30 18:07:39'),
	(10, 'Cristina Marquardt', 'morton.stamm@example.net', '2022-09-30 18:07:39', '$2y$10$92IXUNpkjO0rOQ5byMi.Ye4oKoEa3Ro9llC/.og/at2.uheWG/igi', 'assets/dashboard/img/AdminLTELogo.png', '1-201-894-3834', 'BkW8W09P0R', '2022-09-30 18:07:39', '2022-09-30 18:07:39'),
	(11, 'Dr. Jazmyn Wolf', 'nstoltenberg@example.net', '2022-09-30 18:07:39', '$2y$10$92IXUNpkjO0rOQ5byMi.Ye4oKoEa3Ro9llC/.og/at2.uheWG/igi', 'assets/dashboard/img/AdminLTELogo.png', '(520) 249-3442', 'KPwScJdj22', '2022-09-30 18:07:39', '2022-09-30 18:07:39'),
	(12, 'Delbert Macejkovic', 'torp.reina@example.org', '2022-09-30 18:07:39', '$2y$10$92IXUNpkjO0rOQ5byMi.Ye4oKoEa3Ro9llC/.og/at2.uheWG/igi', 'assets/dashboard/img/AdminLTELogo.png', '1-440-414-0895', 'GUsPnuaBFw', '2022-09-30 18:07:39', '2022-09-30 18:07:39'),
	(13, 'Marquis Brekke DDS', 'hugh49@example.org', '2022-09-30 18:07:39', '$2y$10$92IXUNpkjO0rOQ5byMi.Ye4oKoEa3Ro9llC/.og/at2.uheWG/igi', 'assets/dashboard/img/AdminLTELogo.png', '(940) 698-5161', 'ljtpJOYxdD', '2022-09-30 18:07:39', '2022-09-30 18:07:39'),
	(14, 'Tressa Gottlieb', 'robb60@example.org', '2022-09-30 18:07:39', '$2y$10$92IXUNpkjO0rOQ5byMi.Ye4oKoEa3Ro9llC/.og/at2.uheWG/igi', 'assets/dashboard/img/AdminLTELogo.png', '253-268-7617', 'bdzcgppWcy', '2022-09-30 18:07:39', '2022-09-30 18:07:39'),
	(15, 'Mrs. Earlene Bayer III', 'jamaal58@example.com', '2022-09-30 18:07:39', '$2y$10$92IXUNpkjO0rOQ5byMi.Ye4oKoEa3Ro9llC/.og/at2.uheWG/igi', 'assets/dashboard/img/AdminLTELogo.png', '435-818-9823', 'NIM17geTaR', '2022-09-30 18:07:40', '2022-09-30 18:07:40'),
	(16, 'Mr. Wilbert Erdman IV', 'harmony41@example.com', '2022-09-30 18:07:39', '$2y$10$92IXUNpkjO0rOQ5byMi.Ye4oKoEa3Ro9llC/.og/at2.uheWG/igi', 'assets/dashboard/img/AdminLTELogo.png', '817.737.9872', 'Zvh2dVWhVx', '2022-09-30 18:07:40', '2022-09-30 18:07:40'),
	(17, 'Genoveva Hessel', 'ogreenholt@example.com', '2022-09-30 18:07:39', '$2y$10$92IXUNpkjO0rOQ5byMi.Ye4oKoEa3Ro9llC/.og/at2.uheWG/igi', 'assets/dashboard/img/AdminLTELogo.png', '(847) 333-7947', 'knlwaKJ4vT', '2022-09-30 18:07:40', '2022-09-30 18:07:40'),
	(18, 'Mekhi Littel PhD', 'haley.shyann@example.net', '2022-09-30 18:07:39', '$2y$10$92IXUNpkjO0rOQ5byMi.Ye4oKoEa3Ro9llC/.og/at2.uheWG/igi', 'assets/dashboard/img/AdminLTELogo.png', '+1-531-567-8760', 'GIi9iHfREw', '2022-09-30 18:07:40', '2022-09-30 18:07:40'),
	(19, 'Dr. Kaylie Heaney', 'rath.taryn@example.com', '2022-09-30 18:07:39', '$2y$10$92IXUNpkjO0rOQ5byMi.Ye4oKoEa3Ro9llC/.og/at2.uheWG/igi', 'assets/dashboard/img/AdminLTELogo.png', '(539) 973-4923', 'gRcBMSYNqE', '2022-09-30 18:07:40', '2022-09-30 18:07:40'),
	(20, 'Dr. Ahmad Mohr IV', 'quentin.crona@example.com', '2022-09-30 18:07:39', '$2y$10$92IXUNpkjO0rOQ5byMi.Ye4oKoEa3Ro9llC/.og/at2.uheWG/igi', 'assets/dashboard/img/AdminLTELogo.png', '(762) 843-3934', 'w4oYvobu3T', '2022-09-30 18:07:40', '2022-09-30 18:07:40'),
	(21, 'Mr. Oran Tremblay', 'smith.josiah@example.com', '2022-09-30 18:07:39', '$2y$10$92IXUNpkjO0rOQ5byMi.Ye4oKoEa3Ro9llC/.og/at2.uheWG/igi', 'assets/dashboard/img/AdminLTELogo.png', '(223) 266-1421', 'dgoaCdLqxG', '2022-09-30 18:07:40', '2022-09-30 18:07:40'),
	(22, 'Elyssa Turner', 'eugene.gulgowski@example.net', '2022-09-30 18:07:39', '$2y$10$92IXUNpkjO0rOQ5byMi.Ye4oKoEa3Ro9llC/.og/at2.uheWG/igi', 'assets/dashboard/img/AdminLTELogo.png', '+1.831.398.2201', 'aiwFo8qKiT', '2022-09-30 18:07:40', '2022-09-30 18:07:40'),
	(23, 'Pablo Monahan', 'udare@example.org', '2022-09-30 18:07:39', '$2y$10$92IXUNpkjO0rOQ5byMi.Ye4oKoEa3Ro9llC/.og/at2.uheWG/igi', 'assets/dashboard/img/AdminLTELogo.png', '+1 (310) 735-9810', 'vgRNW6sMv3', '2022-09-30 18:07:40', '2022-09-30 18:07:40'),
	(24, 'Josefa Borer I', 'samson33@example.com', '2022-09-30 18:07:39', '$2y$10$92IXUNpkjO0rOQ5byMi.Ye4oKoEa3Ro9llC/.og/at2.uheWG/igi', 'assets/dashboard/img/AdminLTELogo.png', '+1-423-885-4625', 'vGnYSvWO4X', '2022-09-30 18:07:40', '2022-09-30 18:07:40'),
	(25, 'Dr. Rosendo Grady DVM', 'macejkovic.hermann@example.org', '2022-09-30 18:07:39', '$2y$10$92IXUNpkjO0rOQ5byMi.Ye4oKoEa3Ro9llC/.og/at2.uheWG/igi', 'assets/dashboard/img/AdminLTELogo.png', '+1.619.677.3732', 'uxb82UvBjC', '2022-09-30 18:07:40', '2022-09-30 18:07:40'),
	(26, 'Mustafa Abbott', 'vstoltenberg@example.com', '2022-09-30 18:07:39', '$2y$10$92IXUNpkjO0rOQ5byMi.Ye4oKoEa3Ro9llC/.og/at2.uheWG/igi', 'assets/dashboard/img/AdminLTELogo.png', '1-610-873-6210', 'gQFe6DOxs0', '2022-09-30 18:07:40', '2022-09-30 18:07:40'),
	(27, 'Frankie Fadel', 'martine.smith@example.org', '2022-09-30 18:07:39', '$2y$10$92IXUNpkjO0rOQ5byMi.Ye4oKoEa3Ro9llC/.og/at2.uheWG/igi', 'assets/dashboard/img/AdminLTELogo.png', '+1 (702) 476-8953', 'ifJgfv4IJh', '2022-09-30 18:07:40', '2022-09-30 18:07:40'),
	(28, 'Gerson Gutmann I', 'luettgen.maegan@example.net', '2022-09-30 18:07:39', '$2y$10$92IXUNpkjO0rOQ5byMi.Ye4oKoEa3Ro9llC/.og/at2.uheWG/igi', 'assets/dashboard/img/AdminLTELogo.png', '517.231.6064', 'C1936AT5tP', '2022-09-30 18:07:40', '2022-09-30 18:07:40'),
	(29, 'Freida Mann', 'patrick69@example.org', '2022-09-30 18:07:39', '$2y$10$92IXUNpkjO0rOQ5byMi.Ye4oKoEa3Ro9llC/.og/at2.uheWG/igi', 'assets/dashboard/img/AdminLTELogo.png', '+1-707-994-7391', 'ob71pN64MB', '2022-09-30 18:07:41', '2022-09-30 18:07:41'),
	(30, 'Amber Quitzon', 'patricia82@example.org', '2022-09-30 18:07:39', '$2y$10$92IXUNpkjO0rOQ5byMi.Ye4oKoEa3Ro9llC/.og/at2.uheWG/igi', 'assets/dashboard/img/AdminLTELogo.png', '725.407.7836', 'WwOIMODkVh', '2022-09-30 18:07:41', '2022-09-30 18:07:41'),
	(31, 'Johnny O\'Kon', 'larson.ned@example.net', '2022-09-30 18:07:39', '$2y$10$92IXUNpkjO0rOQ5byMi.Ye4oKoEa3Ro9llC/.og/at2.uheWG/igi', 'assets/dashboard/img/AdminLTELogo.png', '269-501-8917', 'j8FSnudnb5', '2022-09-30 18:07:41', '2022-09-30 18:07:41'),
	(32, 'Stacy Grimes', 'swift.hanna@example.com', '2022-09-30 18:07:39', '$2y$10$92IXUNpkjO0rOQ5byMi.Ye4oKoEa3Ro9llC/.og/at2.uheWG/igi', 'assets/dashboard/img/AdminLTELogo.png', '+1 (820) 646-8455', '6cNCHVZOay', '2022-09-30 18:07:41', '2022-09-30 18:07:41'),
	(33, 'Karson Wolff II', 'kstreich@example.net', '2022-09-30 18:07:39', '$2y$10$92IXUNpkjO0rOQ5byMi.Ye4oKoEa3Ro9llC/.og/at2.uheWG/igi', 'assets/dashboard/img/AdminLTELogo.png', '1-863-439-5156', 'bhJ7WgT7CN', '2022-09-30 18:07:41', '2022-09-30 18:07:41'),
	(34, 'Tabitha Koepp II', 'grady.sylvia@example.com', '2022-09-30 18:07:39', '$2y$10$92IXUNpkjO0rOQ5byMi.Ye4oKoEa3Ro9llC/.og/at2.uheWG/igi', 'assets/dashboard/img/AdminLTELogo.png', '+1-737-337-4953', 'hyrgMHPmNu', '2022-09-30 18:07:41', '2022-09-30 18:07:41'),
	(35, 'Chaz Breitenberg', 'hkutch@example.com', '2022-09-30 18:07:39', '$2y$10$92IXUNpkjO0rOQ5byMi.Ye4oKoEa3Ro9llC/.og/at2.uheWG/igi', 'assets/dashboard/img/AdminLTELogo.png', '785-832-3813', '9pG3DkU8TP', '2022-09-30 18:07:41', '2022-09-30 18:07:41'),
	(36, 'Talia Hickle', 'jadyn85@example.net', '2022-09-30 18:07:39', '$2y$10$92IXUNpkjO0rOQ5byMi.Ye4oKoEa3Ro9llC/.og/at2.uheWG/igi', 'assets/dashboard/img/AdminLTELogo.png', '248.668.0245', 'XRFhqjdvet', '2022-09-30 18:07:41', '2022-09-30 18:07:41'),
	(37, 'Arnaldo Kessler', 'istamm@example.com', '2022-09-30 18:07:39', '$2y$10$92IXUNpkjO0rOQ5byMi.Ye4oKoEa3Ro9llC/.og/at2.uheWG/igi', 'assets/dashboard/img/AdminLTELogo.png', '973.887.5979', '8pJJEXyN1Q', '2022-09-30 18:07:41', '2022-09-30 18:07:41'),
	(38, 'Prof. Kaleb Wilkinson DVM', 'qdicki@example.net', '2022-09-30 18:07:39', '$2y$10$92IXUNpkjO0rOQ5byMi.Ye4oKoEa3Ro9llC/.og/at2.uheWG/igi', 'assets/dashboard/img/AdminLTELogo.png', '330.790.8840', 'XZgg9kQbGS', '2022-09-30 18:07:41', '2022-09-30 18:07:41'),
	(39, 'Natasha Hoppe', 'ebert.sister@example.net', '2022-09-30 18:07:39', '$2y$10$92IXUNpkjO0rOQ5byMi.Ye4oKoEa3Ro9llC/.og/at2.uheWG/igi', 'assets/dashboard/img/AdminLTELogo.png', '612.739.3561', 'eWmJnuTpHy', '2022-09-30 18:07:41', '2022-09-30 18:07:41'),
	(40, 'Adeline Torphy Sr.', 'miller.lazaro@example.com', '2022-09-30 18:07:39', '$2y$10$92IXUNpkjO0rOQ5byMi.Ye4oKoEa3Ro9llC/.og/at2.uheWG/igi', 'assets/dashboard/img/AdminLTELogo.png', '650-644-4361', 'HWk8LFBbft', '2022-09-30 18:07:41', '2022-09-30 18:07:41'),
	(41, 'Danyka Hagenes', 'pquigley@example.org', '2022-09-30 18:07:39', '$2y$10$92IXUNpkjO0rOQ5byMi.Ye4oKoEa3Ro9llC/.og/at2.uheWG/igi', 'assets/dashboard/img/AdminLTELogo.png', '+1-520-894-5227', 'ku0xJNUHpI', '2022-09-30 18:07:41', '2022-09-30 18:07:41'),
	(42, 'Alex Nikolaus IV', 'ywisozk@example.com', '2022-09-30 18:07:39', '$2y$10$92IXUNpkjO0rOQ5byMi.Ye4oKoEa3Ro9llC/.og/at2.uheWG/igi', 'assets/dashboard/img/AdminLTELogo.png', '828.383.1700', 'MBA9u2iJt0', '2022-09-30 18:07:41', '2022-09-30 18:07:41'),
	(43, 'Mrs. Maud Stehr III', 'taltenwerth@example.net', '2022-09-30 18:07:39', '$2y$10$92IXUNpkjO0rOQ5byMi.Ye4oKoEa3Ro9llC/.og/at2.uheWG/igi', 'assets/dashboard/img/AdminLTELogo.png', '+1-703-346-1419', 'FkVRBnkkeL', '2022-09-30 18:07:41', '2022-09-30 18:07:41'),
	(44, 'Conor Gottlieb', 'josie32@example.org', '2022-09-30 18:07:39', '$2y$10$92IXUNpkjO0rOQ5byMi.Ye4oKoEa3Ro9llC/.og/at2.uheWG/igi', 'assets/dashboard/img/AdminLTELogo.png', '(870) 453-9148', 'KW5uJaoxWQ', '2022-09-30 18:07:42', '2022-09-30 18:07:42'),
	(45, 'Hosea Auer', 'corwin.lonnie@example.com', '2022-09-30 18:07:39', '$2y$10$92IXUNpkjO0rOQ5byMi.Ye4oKoEa3Ro9llC/.og/at2.uheWG/igi', 'assets/dashboard/img/AdminLTELogo.png', '360-991-4834', 'N7YuHmxa3A', '2022-09-30 18:07:42', '2022-09-30 18:07:42'),
	(46, 'Ms. Belle Lemke', 'hartmann.blake@example.com', '2022-09-30 18:07:39', '$2y$10$92IXUNpkjO0rOQ5byMi.Ye4oKoEa3Ro9llC/.og/at2.uheWG/igi', 'assets/dashboard/img/AdminLTELogo.png', '+1.551.728.9337', 'sI1GgWI96h', '2022-09-30 18:07:42', '2022-09-30 18:07:42'),
	(47, 'Prof. Tyshawn Carroll', 'tremblay.tristin@example.org', '2022-09-30 18:07:39', '$2y$10$92IXUNpkjO0rOQ5byMi.Ye4oKoEa3Ro9llC/.og/at2.uheWG/igi', 'assets/dashboard/img/AdminLTELogo.png', '820-405-7955', '5HtZirK2CD', '2022-09-30 18:07:42', '2022-09-30 18:07:42'),
	(48, 'Dr. Marcus Gorczany III', 'kaylah28@example.org', '2022-09-30 18:07:39', '$2y$10$92IXUNpkjO0rOQ5byMi.Ye4oKoEa3Ro9llC/.og/at2.uheWG/igi', 'assets/dashboard/img/AdminLTELogo.png', '815-451-0249', 'CFoDjNv5gs', '2022-09-30 18:07:42', '2022-09-30 18:07:42'),
	(49, 'Mr. Virgil Wilderman DVM', 'sporer.leilani@example.org', '2022-09-30 18:07:39', '$2y$10$92IXUNpkjO0rOQ5byMi.Ye4oKoEa3Ro9llC/.og/at2.uheWG/igi', 'assets/dashboard/img/AdminLTELogo.png', '+1 (854) 569-1676', 'bukdjZDkbH', '2022-09-30 18:07:42', '2022-09-30 18:07:42'),
	(50, 'Ms. Jeanette Moen PhD', 'iking@example.net', '2022-09-30 18:07:39', '$2y$10$92IXUNpkjO0rOQ5byMi.Ye4oKoEa3Ro9llC/.og/at2.uheWG/igi', 'assets/dashboard/img/AdminLTELogo.png', '(858) 816-2708', 'Ur7sesI4jz', '2022-09-30 18:07:42', '2022-09-30 18:07:42'),
	(51, 'Mabel Leuschke', 'irma93@example.org', '2022-09-30 18:07:39', '$2y$10$92IXUNpkjO0rOQ5byMi.Ye4oKoEa3Ro9llC/.og/at2.uheWG/igi', 'assets/dashboard/img/AdminLTELogo.png', '1-631-213-2942', 'hQzgVLsPpB', '2022-09-30 18:07:42', '2022-09-30 18:07:42');
/*!40000 ALTER TABLE `users` ENABLE KEYS */;

-- Dumping structure for table tecnomasr_task.users_permissions
CREATE TABLE IF NOT EXISTS `users_permissions` (
  `id` bigint(20) unsigned NOT NULL AUTO_INCREMENT,
  `user_id` bigint(20) unsigned NOT NULL,
  `permission_id` bigint(20) unsigned NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`),
  KEY `users_permissions_user_id_foreign` (`user_id`),
  KEY `users_permissions_permission_id_foreign` (`permission_id`),
  CONSTRAINT `users_permissions_permission_id_foreign` FOREIGN KEY (`permission_id`) REFERENCES `permissions` (`id`) ON DELETE CASCADE,
  CONSTRAINT `users_permissions_user_id_foreign` FOREIGN KEY (`user_id`) REFERENCES `users` (`id`) ON DELETE CASCADE
) ENGINE=InnoDB AUTO_INCREMENT=13 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- Dumping data for table tecnomasr_task.users_permissions: ~13 rows (approximately)
/*!40000 ALTER TABLE `users_permissions` DISABLE KEYS */;
INSERT INTO `users_permissions` (`id`, `user_id`, `permission_id`, `created_at`, `updated_at`) VALUES
	(1, 1, 1, NULL, NULL),
	(2, 1, 2, NULL, NULL),
	(3, 1, 3, NULL, NULL),
	(4, 1, 4, NULL, NULL),
	(5, 1, 5, NULL, NULL),
	(6, 1, 6, NULL, NULL),
	(7, 1, 7, NULL, NULL),
	(8, 1, 8, NULL, NULL),
	(9, 1, 9, NULL, NULL),
	(10, 1, 10, NULL, NULL),
	(11, 1, 11, NULL, NULL),
	(12, 1, 12, NULL, NULL);
/*!40000 ALTER TABLE `users_permissions` ENABLE KEYS */;

-- Dumping structure for table tecnomasr_task.users_roles
CREATE TABLE IF NOT EXISTS `users_roles` (
  `id` bigint(20) unsigned NOT NULL AUTO_INCREMENT,
  `user_id` bigint(20) unsigned NOT NULL,
  `role_id` bigint(20) unsigned NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`),
  KEY `users_roles_user_id_foreign` (`user_id`),
  KEY `users_roles_role_id_foreign` (`role_id`),
  CONSTRAINT `users_roles_role_id_foreign` FOREIGN KEY (`role_id`) REFERENCES `roles` (`id`) ON DELETE CASCADE,
  CONSTRAINT `users_roles_user_id_foreign` FOREIGN KEY (`user_id`) REFERENCES `users` (`id`) ON DELETE CASCADE
) ENGINE=InnoDB AUTO_INCREMENT=52 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- Dumping data for table tecnomasr_task.users_roles: ~3 rows (approximately)
/*!40000 ALTER TABLE `users_roles` DISABLE KEYS */;
INSERT INTO `users_roles` (`id`, `user_id`, `role_id`, `created_at`, `updated_at`) VALUES
	(1, 2, 2, NULL, NULL),
	(2, 3, 2, NULL, NULL),
	(3, 4, 2, NULL, NULL),
	(4, 5, 2, NULL, NULL),
	(5, 6, 2, NULL, NULL),
	(6, 7, 2, NULL, NULL),
	(7, 8, 2, NULL, NULL),
	(8, 9, 2, NULL, NULL),
	(9, 10, 2, NULL, NULL),
	(10, 11, 2, NULL, NULL),
	(11, 12, 2, NULL, NULL),
	(12, 13, 2, NULL, NULL),
	(13, 14, 2, NULL, NULL),
	(14, 15, 2, NULL, NULL),
	(15, 16, 2, NULL, NULL),
	(16, 17, 2, NULL, NULL),
	(17, 18, 2, NULL, NULL),
	(18, 19, 2, NULL, NULL),
	(19, 20, 2, NULL, NULL),
	(20, 21, 2, NULL, NULL),
	(21, 22, 2, NULL, NULL),
	(22, 23, 2, NULL, NULL),
	(23, 24, 2, NULL, NULL),
	(24, 25, 2, NULL, NULL),
	(25, 26, 2, NULL, NULL),
	(26, 27, 2, NULL, NULL),
	(27, 28, 2, NULL, NULL),
	(28, 29, 2, NULL, NULL),
	(29, 30, 2, NULL, NULL),
	(30, 31, 2, NULL, NULL),
	(31, 32, 2, NULL, NULL),
	(32, 33, 2, NULL, NULL),
	(33, 34, 2, NULL, NULL),
	(34, 35, 2, NULL, NULL),
	(35, 36, 2, NULL, NULL),
	(36, 37, 2, NULL, NULL),
	(37, 38, 2, NULL, NULL),
	(38, 39, 2, NULL, NULL),
	(39, 40, 2, NULL, NULL),
	(40, 41, 2, NULL, NULL),
	(41, 42, 2, NULL, NULL),
	(42, 43, 2, NULL, NULL),
	(43, 44, 2, NULL, NULL),
	(44, 45, 2, NULL, NULL),
	(45, 46, 2, NULL, NULL),
	(46, 47, 2, NULL, NULL),
	(47, 48, 2, NULL, NULL),
	(48, 49, 2, NULL, NULL),
	(49, 50, 2, NULL, NULL),
	(50, 51, 2, NULL, NULL),
	(51, 1, 1, NULL, NULL);
/*!40000 ALTER TABLE `users_roles` ENABLE KEYS */;

/*!40101 SET SQL_MODE=IFNULL(@OLD_SQL_MODE, '') */;
/*!40014 SET FOREIGN_KEY_CHECKS=IFNULL(@OLD_FOREIGN_KEY_CHECKS, 1) */;
/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40111 SET SQL_NOTES=IFNULL(@OLD_SQL_NOTES, 1) */;
