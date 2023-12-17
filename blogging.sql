-- phpMyAdmin SQL Dump
-- version 5.2.0
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1:3306
-- Generation Time: Dec 17, 2023 at 06:59 PM
-- Server version: 8.0.31
-- PHP Version: 8.0.26

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `blogging`
--

-- --------------------------------------------------------

--
-- Table structure for table `blogs`
--

DROP TABLE IF EXISTS `blogs`;
CREATE TABLE IF NOT EXISTS `blogs` (
  `id` bigint UNSIGNED NOT NULL AUTO_INCREMENT,
  `category_id` int UNSIGNED NOT NULL,
  `user_id` int UNSIGNED NOT NULL,
  `title` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `title_description` text COLLATE utf8mb4_unicode_ci NOT NULL,
  `image` text COLLATE utf8mb4_unicode_ci NOT NULL,
  `content` longtext COLLATE utf8mb4_unicode_ci NOT NULL,
  `main_tag_line` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `meta_title` text COLLATE utf8mb4_unicode_ci NOT NULL,
  `meta_description` text COLLATE utf8mb4_unicode_ci NOT NULL,
  `meta_keywords` text COLLATE utf8mb4_unicode_ci NOT NULL,
  `slug` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `tags` longtext COLLATE utf8mb4_unicode_ci,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`),
  KEY `blogs_user_id_foreign` (`user_id`),
  KEY `blogs_category_id_foreign` (`category_id`)
) ENGINE=MyISAM AUTO_INCREMENT=11 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `blogs`
--

INSERT INTO `blogs` (`id`, `category_id`, `user_id`, `title`, `title_description`, `image`, `content`, `main_tag_line`, `meta_title`, `meta_description`, `meta_keywords`, `slug`, `tags`, `created_at`, `updated_at`) VALUES
(1, 4, 3, 'Unde esse ut inventore est quaerat enim non.', 'Odit consequatur maxime alias ut. Omnis esse voluptate dolore vitae. Ut molestias sit temporibus et quia facilis.', 'pexels-nataliya-vaitkevich-6941884.jpg', 'Quam voluptates quasi alias dolor reprehenderit eveniet nobis. Minus sed voluptatem et corrupti qui quo nihil veniam. Veritatis consequatur soluta voluptas autem harum rerum ratione.', 'voluptas', 'Illo voluptatum quia molestias ut fuga similique.', 'Voluptatem quis aut nisi aperiam aut nobis. Perspiciatis quo voluptatem velit magni. Quos ut at consequatur ut.', 'eos consequatur deleniti', 'voluptas-et-dolore-reiciendis-quis-corporis', 'quod repellendus rerum exercitationem quia', '2023-12-17 02:37:22', '2023-12-17 02:37:22'),
(2, 2, 2, 'Quis repudiandae et similique tenetur impedit ratione velit.', 'A facilis sapiente neque quo. Aliquam sed a quam. Libero architecto sapiente qui corrupti quis aut velit delectus.', 'pexels-nataliya-vaitkevich-6941884.jpg', 'Incidunt non expedita optio officiis aliquam. Ut sint debitis numquam. Odit nobis exercitationem dolor sunt debitis mollitia dignissimos enim. Autem nulla magnam molestiae et occaecati.', 'dolor', 'Maiores inventore quis ab rerum rem autem natus.', 'Aut ullam nesciunt voluptatem quis delectus. Est sint quos ea necessitatibus facere omnis.', 'minus consequatur cupiditate', 'praesentium-iusto-iure-inventore-exercitationem-autem-qui', 'alias dolores culpa accusamus sit', '2023-12-17 02:37:22', '2023-12-17 02:37:22'),
(3, 1, 2, 'Quia in rem vel.', 'Fugiat ut voluptas consequatur rem iure rerum et. Iusto sapiente illo voluptatem voluptatum accusamus dolores. Aspernatur et quia id explicabo perferendis vel sunt. Amet facilis architecto occaecati quibusdam.', 'pexels-nataliya-vaitkevich-6941884.jpg', 'Ducimus quod temporibus impedit eos quisquam omnis. Perferendis pariatur harum enim ex aspernatur totam. In ea qui dolores in libero voluptas.', 'eligendi', 'Aperiam optio ut ad accusamus numquam.', 'Et reiciendis blanditiis vel dolores id ut et. Et accusantium quo maiores et qui. Repudiandae modi omnis sunt. Occaecati vero at omnis reiciendis similique odio.', 'aliquid facere quaerat', 'molestiae-omnis-illo-exercitationem-autem', 'quisquam similique quidem quia facilis', '2023-12-17 02:37:22', '2023-12-17 02:37:22'),
(4, 3, 5, 'Sit dolorem animi numquam nemo voluptates debitis quis.', 'Doloremque id est et amet consectetur. Deleniti architecto deserunt rem a. Autem unde velit laudantium ex quibusdam natus tenetur. Odio hic voluptate sequi.', 'pexels-nataliya-vaitkevich-6941884.jpg', 'Praesentium est reiciendis molestiae maxime reiciendis laboriosam. Quam quisquam voluptas corrupti qui occaecati quo quidem.', 'error', 'Amet fuga nemo numquam maxime molestiae sequi dolorem.', 'Et inventore asperiores et sed voluptatem. Nihil optio nihil ab repellendus minus. Praesentium quaerat amet eaque blanditiis impedit nesciunt quidem.', 'repellendus facilis quasi', 'repellat-et-error-eum', 'id ut alias tempora adipisci', '2023-12-17 02:37:22', '2023-12-17 02:37:22'),
(5, 3, 2, 'Voluptatem recusandae architecto dolor neque eligendi.', 'Tenetur sint in suscipit eius omnis eaque rem. Et odio voluptas corporis ipsa. Dolor sint quia quos. Accusamus libero id et.', 'pexels-nataliya-vaitkevich-6941884.jpg', 'Ex voluptate nesciunt labore dolor nostrum. Et et occaecati numquam ipsum libero.', 'laborum', 'Sint ut dolorum eaque maiores dolorem aut iste.', 'Alias dolorem quis aperiam dolore ullam quos sit. Debitis dicta voluptas quia nam qui aut omnis voluptas. Dolorem nam sunt animi illum.', 'corporis nam velit', 'sequi-laboriosam-exercitationem-qui-suscipit', 'exercitationem dolores praesentium sequi dolorem', '2023-12-17 02:37:22', '2023-12-17 02:37:22'),
(6, 2, 1, 'Occaecati voluptate consequatur aspernatur velit.', 'Voluptate velit libero aut excepturi porro et. Nulla eum molestiae architecto laborum harum architecto sit. Quia eligendi vel eos ipsum et autem ullam.', 'pexels-nataliya-vaitkevich-6941884.jpg', 'Autem consequuntur aut vel est. Minima ea iusto nisi tempore. Vel laudantium mollitia architecto ut porro.', 'nemo', 'Repudiandae eaque porro rerum dolor recusandae perferendis porro dolorem.', 'Est provident voluptas velit laudantium velit quasi. Dignissimos et sed adipisci id non nisi. Inventore sunt numquam omnis. Eveniet et numquam ipsum nemo tenetur quo.', 'neque iure sed', 'ullam-labore-debitis-illo-porro-ut', 'illo voluptatem error aut eum', '2023-12-17 02:37:22', '2023-12-17 02:37:22'),
(7, 2, 1, 'Ipsam sint non doloremque voluptatem tenetur aut dolorum.', 'Iste est est eius ut cupiditate assumenda. Corrupti molestiae dolorum quisquam dolor repudiandae. Delectus culpa et et ut maxime et et earum.', 'pexels-nataliya-vaitkevich-6941884.jpg', 'Asperiores qui qui quidem animi consectetur porro. Unde sit quas illum commodi qui aut doloribus. Voluptatem animi animi voluptas sint. Quibusdam delectus earum velit assumenda qui qui esse.', 'libero', 'Delectus explicabo velit repellendus cumque ut.', 'Qui eius perferendis quia. Magnam nesciunt labore provident perferendis. Quisquam dolor necessitatibus vero possimus.', 'quaerat necessitatibus voluptates', 'quia-est-incidunt-ipsum-qui-error-quia', 'aliquid accusamus deserunt unde dolorem', '2023-12-17 02:37:22', '2023-12-17 02:37:22'),
(8, 3, 4, 'Quia deserunt sint ipsam consequatur veritatis aut aut hic.', 'Omnis reprehenderit rerum incidunt mollitia dignissimos. Culpa suscipit est fugiat doloremque.', 'pexels-nataliya-vaitkevich-6941884.jpg', 'Nulla incidunt autem autem deserunt officiis. Nihil soluta reiciendis sapiente dolorem aspernatur consequatur. Iure cum et veniam mollitia aut eum eum.', 'sunt', 'Sed libero atque velit ut ducimus temporibus tempore.', 'Eos occaecati iusto eveniet quaerat ea. Totam aut sed deleniti veritatis doloremque.', 'repellat nisi et', 'veritatis-provident-ea-error-nemo', 'ut inventore possimus quo tempora', '2023-12-17 02:37:22', '2023-12-17 02:37:22'),
(9, 4, 1, 'Provident voluptas illo velit quisquam asperiores sed nostrum.', 'Ut voluptate et molestiae quo. Modi ut dolorum consequatur nesciunt modi. Est molestias distinctio vitae dolor temporibus beatae sed.', 'pexels-nataliya-vaitkevich-6941884.jpg', 'Ducimus nostrum explicabo temporibus est eligendi. Id vitae aut dolor distinctio. Nemo voluptates accusantium magnam assumenda.', 'fuga', 'Praesentium esse pariatur alias incidunt quisquam totam atque.', 'Labore qui at officia quae eius at voluptatem. Exercitationem officia excepturi est iure. Molestiae voluptate dolorum magni. Ut distinctio ipsa similique quam omnis provident.', 'totam earum sequi', 'voluptatem-ducimus-quos-sint-molestiae-delectus-ut-occaecati-eveniet', 'quis blanditiis reiciendis voluptatibus quisquam', '2023-12-17 02:37:22', '2023-12-17 02:37:22'),
(10, 2, 3, 'Magnam eos omnis eos a commodi quo sit.', 'Repellat fugiat voluptas et alias maiores velit. Fugit dolorem sed neque. Dolores quas nostrum qui voluptates. Nemo alias minima consequatur.', 'pexels-nataliya-vaitkevich-6941884.jpg', 'Id exercitationem deserunt doloribus doloremque. Natus molestiae nihil saepe distinctio deleniti. Tempore perspiciatis illo quidem enim cupiditate. Et at libero atque sequi delectus.', 'et', 'Velit mollitia sit aspernatur vero consequatur laudantium.', 'Dolor aut iure id voluptatem minima. Amet exercitationem architecto aliquid in animi incidunt sit ducimus. Dignissimos dolor necessitatibus qui eius velit iure voluptatem. Modi beatae qui molestiae ipsam perspiciatis.', 'cupiditate sapiente in', 'minima-totam-quae-officia-qui-numquam-voluptas', 'iste laudantium et similique delectus', '2023-12-17 02:37:22', '2023-12-17 02:37:22');

-- --------------------------------------------------------

--
-- Table structure for table `categories`
--

DROP TABLE IF EXISTS `categories`;
CREATE TABLE IF NOT EXISTS `categories` (
  `id` bigint UNSIGNED NOT NULL AUTO_INCREMENT,
  `category` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `status` tinyint UNSIGNED NOT NULL DEFAULT '1',
  `key` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `deleted_at` timestamp NULL DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=MyISAM AUTO_INCREMENT=5 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `categories`
--

INSERT INTO `categories` (`id`, `category`, `status`, `key`, `deleted_at`, `created_at`, `updated_at`) VALUES
(1, 'dicta', 1, 'ipsam-quibusdam', NULL, '2023-12-17 02:37:22', '2023-12-17 02:37:22'),
(2, 'ut', 1, 'labore-cupiditate', NULL, '2023-12-17 02:37:22', '2023-12-17 02:37:22'),
(3, 'est', 1, 'voluptatum-veniam-itaque', NULL, '2023-12-17 02:37:22', '2023-12-17 02:37:22'),
(4, 'corporis', 0, 'quas-labore-perferendis', NULL, '2023-12-17 02:37:22', '2023-12-17 02:37:22');

-- --------------------------------------------------------

--
-- Table structure for table `comments`
--

DROP TABLE IF EXISTS `comments`;
CREATE TABLE IF NOT EXISTS `comments` (
  `id` bigint UNSIGNED NOT NULL AUTO_INCREMENT,
  `blog_id` int UNSIGNED NOT NULL,
  `content` text COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`),
  KEY `comments_blog_id_foreign` (`blog_id`)
) ENGINE=MyISAM AUTO_INCREMENT=4 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `comments`
--

INSERT INTO `comments` (`id`, `blog_id`, `content`, `created_at`, `updated_at`) VALUES
(1, 2, 'test', '2023-12-17 12:37:48', '2023-12-17 12:37:48'),
(2, 2, 'What a Nice View', '2023-12-17 12:38:13', '2023-12-17 12:38:13'),
(3, 1, 'Yes', '2023-12-17 13:49:21', '2023-12-17 13:49:21');

-- --------------------------------------------------------

--
-- Table structure for table `contact_us`
--

DROP TABLE IF EXISTS `contact_us`;
CREATE TABLE IF NOT EXISTS `contact_us` (
  `id` bigint UNSIGNED NOT NULL AUTO_INCREMENT,
  `name` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `email` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `message` text COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=MyISAM DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `failed_jobs`
--

DROP TABLE IF EXISTS `failed_jobs`;
CREATE TABLE IF NOT EXISTS `failed_jobs` (
  `id` bigint UNSIGNED NOT NULL AUTO_INCREMENT,
  `uuid` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `connection` text COLLATE utf8mb4_unicode_ci NOT NULL,
  `queue` text COLLATE utf8mb4_unicode_ci NOT NULL,
  `payload` longtext COLLATE utf8mb4_unicode_ci NOT NULL,
  `exception` longtext COLLATE utf8mb4_unicode_ci NOT NULL,
  `failed_at` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP,
  PRIMARY KEY (`id`),
  UNIQUE KEY `failed_jobs_uuid_unique` (`uuid`)
) ENGINE=MyISAM DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `migrations`
--

DROP TABLE IF EXISTS `migrations`;
CREATE TABLE IF NOT EXISTS `migrations` (
  `id` int UNSIGNED NOT NULL AUTO_INCREMENT,
  `migration` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `batch` int NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=MyISAM AUTO_INCREMENT=10 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `migrations`
--

INSERT INTO `migrations` (`id`, `migration`, `batch`) VALUES
(1, '2014_10_12_000000_create_users_table', 1),
(2, '2014_10_12_100000_create_password_resets_table', 1),
(3, '2019_08_19_000000_create_failed_jobs_table', 1),
(4, '2019_12_14_000001_create_personal_access_tokens_table', 1),
(5, '2023_02_26_184324_create_categories_table', 1),
(6, '2023_02_27_221159_create_blogs_table', 1),
(7, '2023_03_26_152940_create_contact_us', 1),
(8, '2023_03_29_193451_create_newsletters_table', 1),
(9, '2023_12_17_173045_create_comments_table', 2);

-- --------------------------------------------------------

--
-- Table structure for table `newsletters`
--

DROP TABLE IF EXISTS `newsletters`;
CREATE TABLE IF NOT EXISTS `newsletters` (
  `id` bigint UNSIGNED NOT NULL AUTO_INCREMENT,
  `email` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=MyISAM DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `password_resets`
--

DROP TABLE IF EXISTS `password_resets`;
CREATE TABLE IF NOT EXISTS `password_resets` (
  `email` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `token` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  KEY `password_resets_email_index` (`email`)
) ENGINE=MyISAM DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `personal_access_tokens`
--

DROP TABLE IF EXISTS `personal_access_tokens`;
CREATE TABLE IF NOT EXISTS `personal_access_tokens` (
  `id` bigint UNSIGNED NOT NULL AUTO_INCREMENT,
  `tokenable_type` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `tokenable_id` bigint UNSIGNED NOT NULL,
  `name` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `token` varchar(64) COLLATE utf8mb4_unicode_ci NOT NULL,
  `abilities` text COLLATE utf8mb4_unicode_ci,
  `last_used_at` timestamp NULL DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`),
  UNIQUE KEY `personal_access_tokens_token_unique` (`token`),
  KEY `personal_access_tokens_tokenable_type_tokenable_id_index` (`tokenable_type`,`tokenable_id`)
) ENGINE=MyISAM DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `users`
--

DROP TABLE IF EXISTS `users`;
CREATE TABLE IF NOT EXISTS `users` (
  `id` bigint UNSIGNED NOT NULL AUTO_INCREMENT,
  `name` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `email` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `role` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL DEFAULT 'author',
  `email_verified_at` timestamp NULL DEFAULT NULL,
  `password` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `gender` enum('male','female','others') COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `picture` varchar(191) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `social_login` enum('google','github') COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `token` text COLLATE utf8mb4_unicode_ci,
  `remember_token` varchar(100) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=MyISAM AUTO_INCREMENT=16 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `users`
--

INSERT INTO `users` (`id`, `name`, `email`, `role`, `email_verified_at`, `password`, `gender`, `picture`, `social_login`, `token`, `remember_token`, `created_at`, `updated_at`) VALUES
(1, 'Johnnie Zieme', 'kole.kreiger@example.org', 'author', '2023-12-17 02:37:22', '$2y$10$92IXUNpkjO0rOQ5byMi.Ye4oKoEa3Ro9llC/.og/at2.uheWG/igi', 'male', '17028250841.png', NULL, NULL, 'F86cAzzBX66PIESnekZpbpZKgpAtfYobSVRfZNi79AgnfQA2iJp6SU3PRoEZ', '2023-12-17 02:37:22', '2023-12-17 09:58:04'),
(2, 'Ms. Liliane Mraz Jr.', 'americo20@example.net', 'author', '2023-12-17 02:37:22', '$2y$10$92IXUNpkjO0rOQ5byMi.Ye4oKoEa3Ro9llC/.og/at2.uheWG/igi', NULL, NULL, NULL, NULL, '9ULh2wCnX1', '2023-12-17 02:37:22', '2023-12-17 02:37:22'),
(3, 'Arnulfo Schumm', 'beth64@example.org', 'author', '2023-12-17 02:37:22', '$2y$10$92IXUNpkjO0rOQ5byMi.Ye4oKoEa3Ro9llC/.og/at2.uheWG/igi', NULL, NULL, NULL, NULL, 'GcYa9VYQh4', '2023-12-17 02:37:22', '2023-12-17 02:37:22'),
(4, 'Jeanie Ryan', 'josinski@example.com', 'author', '2023-12-17 02:37:22', '$2y$10$92IXUNpkjO0rOQ5byMi.Ye4oKoEa3Ro9llC/.og/at2.uheWG/igi', NULL, NULL, NULL, NULL, '6PAC4tzqnh', '2023-12-17 02:37:22', '2023-12-17 02:37:22'),
(5, 'Ericka Halvorson', 'jacquelyn06@example.org', 'author', '2023-12-17 02:37:22', '$2y$10$92IXUNpkjO0rOQ5byMi.Ye4oKoEa3Ro9llC/.og/at2.uheWG/igi', NULL, NULL, NULL, NULL, 'PrmkMoM6AmU2S4zFWRhKB25oh85Srd78l0BCAQMaHUkDqjPnb7Hw9nuvDAKg', '2023-12-17 02:37:22', '2023-12-17 02:37:22'),
(6, 'Giles Fritsch', 'cummerata.maribel@example.net', 'admin', '2023-12-17 02:37:22', '$2y$10$92IXUNpkjO0rOQ5byMi.Ye4oKoEa3Ro9llC/.og/at2.uheWG/igi', NULL, NULL, NULL, NULL, 'kbfCw65yD4', '2023-12-17 02:37:22', '2023-12-17 02:37:22'),
(7, 'Ellen Brown DDS', 'martine.kub@example.net', 'admin', '2023-12-17 02:37:22', '$2y$10$92IXUNpkjO0rOQ5byMi.Ye4oKoEa3Ro9llC/.og/at2.uheWG/igi', NULL, NULL, NULL, NULL, 'st2KvGrnBU', '2023-12-17 02:37:22', '2023-12-17 02:37:22'),
(8, 'Wilmer Keebler Jr.', 'alanis29@example.net', 'admin', '2023-12-17 02:37:22', '$2y$10$92IXUNpkjO0rOQ5byMi.Ye4oKoEa3Ro9llC/.og/at2.uheWG/igi', NULL, NULL, NULL, NULL, 'HuGXvIMvcq', '2023-12-17 02:37:22', '2023-12-17 02:37:22'),
(9, 'Myrl Jenkins', 'ahomenick@example.org', 'admin', '2023-12-17 02:37:22', '$2y$10$92IXUNpkjO0rOQ5byMi.Ye4oKoEa3Ro9llC/.og/at2.uheWG/igi', NULL, NULL, NULL, NULL, 'N6P61SHufJ', '2023-12-17 02:37:22', '2023-12-17 02:37:22'),
(10, 'Prof. Courtney Brakus V', 'darryl43@example.com', 'admin', '2023-12-17 02:37:22', '$2y$10$92IXUNpkjO0rOQ5byMi.Ye4oKoEa3Ro9llC/.og/at2.uheWG/igi', NULL, NULL, NULL, NULL, 'F1PbrrF2PV', '2023-12-17 02:37:22', '2023-12-17 02:37:22'),
(11, 'milax', 'zefotif@mailinator.com', 'author', NULL, '$2y$10$6BP0pAm5hP1hdogXt5oBU..SqHV.1fBbmqTUPN7DRRxnlwIfyvI8G', 'female', NULL, NULL, NULL, NULL, '2023-12-17 04:20:17', '2023-12-17 04:20:17'),
(12, 'saima', 'saima@gmail.com', 'author', NULL, '$2y$10$zsy3CYODmOd3hyUffS6psOVOmPR7u9S6a1fRczs/c7S/liJGa.3Ri', 'female', NULL, NULL, NULL, NULL, '2023-12-17 04:24:49', '2023-12-17 04:24:49'),
(13, 'choi', 'choi@gmial.co', 'author', NULL, '$2y$10$zavzg7o.L9rUIq7Mo6XM6uk/N0iNSYs6OyVQHctktdCVpHuIobDTW', 'male', '1702805308.png', NULL, NULL, NULL, '2023-12-17 04:28:28', '2023-12-17 04:28:28'),
(14, 'UKYZ', 'ionkhan@gmail.com', 'author', NULL, '$2y$10$CiaEnDi8N0.GGv/RVzdNHOEOiN2n9TXGYBUF.EIfTi87KisLJNKhS', NULL, 'https://avatars.githubusercontent.com/u/43144366?v=4', 'github', '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', NULL, '2023-12-17 04:41:39', '2023-12-17 04:41:39'),
(15, 'Samaher IRshad', 'hadel.ahbeck@gmail.com', 'admin', NULL, '$2y$10$tbCixP8kyXNQGMgVYxTqdug8uuyBvYJNSgYw0VTrfmKz3cd05BJDO', 'female', '17028280801.jpg', NULL, NULL, NULL, '2023-12-17 10:47:23', '2023-12-17 10:48:00');
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
