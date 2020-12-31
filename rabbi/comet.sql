-- phpMyAdmin SQL Dump
-- version 5.0.2
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Dec 31, 2020 at 06:57 AM
-- Server version: 10.4.14-MariaDB
-- PHP Version: 7.4.9

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `comet`
--

-- --------------------------------------------------------

--
-- Table structure for table `categories`
--

CREATE TABLE `categories` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `name` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `slug` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `status` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL DEFAULT 'Published',
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `categories`
--

INSERT INTO `categories` (`id`, `name`, `slug`, `status`, `created_at`, `updated_at`) VALUES
(9, 'clothing', 'clothing', 'Published', '2020-11-23 23:13:26', '2020-11-23 23:13:26'),
(10, 'music', 'music', 'Published', '2020-11-23 23:13:36', '2020-11-23 23:13:36'),
(11, 'poster', 'poster', 'Published', '2020-11-23 23:13:42', '2020-11-23 23:13:42'),
(12, 'Game', 'game', 'Published', '2020-11-23 23:17:45', '2020-11-23 23:17:45');

-- --------------------------------------------------------

--
-- Table structure for table `category_post`
--

CREATE TABLE `category_post` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `category_id` int(10) UNSIGNED NOT NULL,
  `post_id` int(10) UNSIGNED NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `category_post`
--

INSERT INTO `category_post` (`id`, `category_id`, `post_id`, `created_at`, `updated_at`) VALUES
(3, 12, 5, NULL, NULL),
(4, 9, 6, NULL, NULL),
(5, 10, 7, NULL, NULL),
(6, 11, 7, NULL, NULL),
(7, 9, 8, NULL, NULL),
(8, 10, 8, NULL, NULL),
(9, 12, 8, NULL, NULL),
(10, 9, 9, NULL, NULL),
(11, 12, 10, NULL, NULL),
(12, 11, 11, NULL, NULL),
(13, 9, 12, NULL, NULL),
(14, 11, 12, NULL, NULL);

-- --------------------------------------------------------

--
-- Table structure for table `failed_jobs`
--

CREATE TABLE `failed_jobs` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `uuid` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `connection` text COLLATE utf8mb4_unicode_ci NOT NULL,
  `queue` text COLLATE utf8mb4_unicode_ci NOT NULL,
  `payload` longtext COLLATE utf8mb4_unicode_ci NOT NULL,
  `exception` longtext COLLATE utf8mb4_unicode_ci NOT NULL,
  `failed_at` timestamp NOT NULL DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `migrations`
--

CREATE TABLE `migrations` (
  `id` int(10) UNSIGNED NOT NULL,
  `migration` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `batch` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `migrations`
--

INSERT INTO `migrations` (`id`, `migration`, `batch`) VALUES
(6, '2020_11_18_143943_create_posts_table', 4),
(9, '2014_10_12_000000_create_users_table', 5),
(10, '2014_10_12_100000_create_password_resets_table', 5),
(11, '2019_08_19_000000_create_failed_jobs_table', 5),
(12, '2020_11_09_171757_create_categories_table', 5),
(13, '2020_11_18_131941_create_tags_table', 5),
(14, '2020_11_23_144110_create_category_post_table', 5),
(15, '2020_11_23_155533_create_post_table', 5),
(16, '2020_11_24_031705_create_posts_table', 6),
(17, '2020_11_24_034950_create_category_post_table', 7);

-- --------------------------------------------------------

--
-- Table structure for table `password_resets`
--

CREATE TABLE `password_resets` (
  `email` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `token` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `posts`
--

CREATE TABLE `posts` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `title` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `slug` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `user_id` int(10) UNSIGNED NOT NULL,
  `content` longtext COLLATE utf8mb4_unicode_ci NOT NULL,
  `featured_image` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `status` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL DEFAULT 'Published',
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `posts`
--

INSERT INTO `posts` (`id`, `title`, `slug`, `user_id`, `content`, `featured_image`, `status`, `created_at`, `updated_at`) VALUES
(5, 'bangladesh win', 'bangladesh-win', 1, '<p>bangladesh win by 71 runs</p>\r\n\r\n<p>&nbsp;</p>', 'a39f8078cc0476b703b1394c4bf42a1d.jpg', 'Published', '2020-11-23 23:19:40', '2020-12-15 22:19:00'),
(7, 'bangladeshi song', 'bangladeshi-song', 1, '<p>lksjaluogia</p>', 'b6fced00d1f060e65809e2d639f772b5.jpg', 'Published', '2020-11-24 00:03:09', '2020-11-24 00:03:09'),
(8, 'bangaldes is a good country', 'bangaldes-is-a-good-country', 1, '<p>gteryjnhtr</p>', '5eb6e35ae140bdd12eb645ef7a2ff528.jpg', 'Published', '2020-11-24 00:03:50', '2020-11-24 00:03:50'),
(9, 'bangladesh cloth', 'bangladesh-cloth', 1, '<p>kjkljfuadsi&nbsp;</p>', '55a1b2b72439dd1e72c458ba8948be0c.jpg', 'Published', '2020-11-24 00:04:27', '2020-11-24 00:04:27'),
(10, 'cricket game', 'cricket-game', 1, '<p>kdslafjoia sdg</p>', 'eacefcc7d458b139c290e75aeb9e7b78.jpg', 'Published', '2020-11-24 00:04:57', '2020-11-24 00:04:57'),
(11, 'how to practice', 'how-to-practice', 1, '<p>daghahha lorem</p>', 'ec3d99a3e75887f3f2f8fc358f325351.png', 'Published', '2020-12-13 08:20:17', '2020-12-13 08:20:17'),
(12, 'Checklists for Startups', 'checklists-for-startups', 1, '<p>Lorem ipsum dolor sit amet, consectetur adipisicing elit. Molestiae ut ratione similique temporibus tempora dicta soluta? Qui hic, voluptatem nemo quo corporis dignissimos voluptatum debitis cumque fugiat mollitia quasi quod. Repudiandae possimus quas odio nisi optio asperiores, vitae error laudantium, ratione odit ipsa obcaecati debitis deleniti minus, illo maiores placeat omnis magnam.</p>\r\n\r\n<blockquote>\r\n<p>Modi perferendis ipsa, dolorum eaque accusantium! Velit libero fugit dolores repellendus consequatur nisi, deserunt aperiam a ea ex hic, iusto atque, quas. Aliquam rerum dolores saepe sunt, assumenda voluptas.</p>\r\n</blockquote>\r\n\r\n<p>Ipsa in adipisci eius qui quos minima ratione velit reprehenderit fuga deleniti amet quidem commodi ducimus.</p>\r\n\r\n<h3>In hac habitasse platea dictumst.</h3>\r\n\r\n<p>Sapiente amet eaque soluta perferendis. Quia ex sit sint voluptate ipsa culpa, veritatis:</p>\r\n\r\n<ul>\r\n	<li>Proin elementum ante quis mauris</li>\r\n	<li>Integer dictum magna vitae ullamcorper sodales</li>\r\n	<li>Integer non placerat diam, id ornare est. Curabitur sit amet lectus vitae urna.</li>\r\n	<li>Vestibulum ante ipsum primis in faucibus</li>\r\n</ul>\r\n\r\n<p>Labore expedita officiis, in perspiciatis atque voluptates odio dignissimos doloribus quibusdam est minus ullam nulla quisquam nihil aspernatur rem laborum accusantium animi.</p>', '6ec2ac7aac2f876efe1d0b16bfd88c61.jpg', 'Published', '2020-12-14 21:42:40', '2020-12-14 21:42:40');

-- --------------------------------------------------------

--
-- Table structure for table `tags`
--

CREATE TABLE `tags` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `name` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `slug` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `status` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL DEFAULT 'Published',
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `tags`
--

INSERT INTO `tags` (`id`, `name`, `slug`, `status`, `created_at`, `updated_at`) VALUES
(2, 'color', 'color', 'Published', '2020-11-23 23:16:19', '2020-12-15 22:15:11'),
(3, 'album', 'album', 'Published', '2020-11-23 23:16:28', '2020-11-23 23:16:28'),
(5, 'football', 'football', 'Published', '2020-11-23 23:17:56', '2020-11-23 23:17:56'),
(6, 'cricket', 'cricket', 'Published', '2020-11-23 23:18:02', '2020-11-23 23:18:02');

-- --------------------------------------------------------

--
-- Table structure for table `users`
--

CREATE TABLE `users` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `name` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `role_id` int(10) UNSIGNED NOT NULL DEFAULT 1,
  `email` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `email_verified_at` timestamp NULL DEFAULT NULL,
  `password` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `remember_token` varchar(100) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `users`
--

INSERT INTO `users` (`id`, `name`, `role_id`, `email`, `email_verified_at`, `password`, `remember_token`, `created_at`, `updated_at`) VALUES
(1, 'rabbi', 1, 'rabbi@gmail.com', NULL, '$2y$10$5se58JT8M1rDQD4I1FpZ5eeQhpTJQXjDavWV2IR9QrJFRU//KN0NO', NULL, '2020-11-23 10:13:44', '2020-11-23 10:13:44');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `categories`
--
ALTER TABLE `categories`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `category_post`
--
ALTER TABLE `category_post`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `failed_jobs`
--
ALTER TABLE `failed_jobs`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `failed_jobs_uuid_unique` (`uuid`);

--
-- Indexes for table `migrations`
--
ALTER TABLE `migrations`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `password_resets`
--
ALTER TABLE `password_resets`
  ADD KEY `password_resets_email_index` (`email`);

--
-- Indexes for table `posts`
--
ALTER TABLE `posts`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `tags`
--
ALTER TABLE `tags`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `tags_name_unique` (`name`);

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
-- AUTO_INCREMENT for table `categories`
--
ALTER TABLE `categories`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=13;

--
-- AUTO_INCREMENT for table `category_post`
--
ALTER TABLE `category_post`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=15;

--
-- AUTO_INCREMENT for table `failed_jobs`
--
ALTER TABLE `failed_jobs`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `migrations`
--
ALTER TABLE `migrations`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=18;

--
-- AUTO_INCREMENT for table `posts`
--
ALTER TABLE `posts`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=13;

--
-- AUTO_INCREMENT for table `tags`
--
ALTER TABLE `tags`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=7;

--
-- AUTO_INCREMENT for table `users`
--
ALTER TABLE `users`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
