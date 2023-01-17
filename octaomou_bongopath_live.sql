-- phpMyAdmin SQL Dump
-- version 4.9.7
-- https://www.phpmyadmin.net/
--
-- Host: localhost:3306
-- Generation Time: Dec 25, 2022 at 08:35 AM
-- Server version: 10.3.37-MariaDB-log-cll-lve
-- PHP Version: 7.4.30

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET AUTOCOMMIT = 0;
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `octaomou_bongopath_live`
--

-- --------------------------------------------------------

--
-- Table structure for table `admin`
--

CREATE TABLE `admin` (
  `id` int(11) NOT NULL,
  `name` varchar(100) NOT NULL,
  `password` varchar(100) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `admin`
--

INSERT INTO `admin` (`id`, `name`, `password`) VALUES
(1, 'Admin', 'admin123');

-- --------------------------------------------------------

--
-- Table structure for table `breaking_news`
--

CREATE TABLE `breaking_news` (
  `id` int(11) NOT NULL,
  `news_id` varchar(5555) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `breaking_news`
--

INSERT INTO `breaking_news` (`id`, `news_id`) VALUES
(25, '74'),
(26, '75');

-- --------------------------------------------------------

--
-- Table structure for table `google_news`
--

CREATE TABLE `google_news` (
  `id` int(11) NOT NULL,
  `news_id` varchar(5555) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `google_news`
--

INSERT INTO `google_news` (`id`, `news_id`) VALUES
(13, '74'),
(14, '75');

-- --------------------------------------------------------

--
-- Table structure for table `menus_navbar`
--

CREATE TABLE `menus_navbar` (
  `id` int(11) NOT NULL,
  `name` varchar(50) NOT NULL,
  `link` varchar(150) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `menus_navbar`
--

INSERT INTO `menus_navbar` (`id`, `name`, `link`) VALUES
(2, 'Politics', 'politics'),
(4, 'World', 'world'),
(5, 'Country', 'country'),
(6, 'Education', 'education'),
(7, 'Spots', 'spots'),
(8, 'Tech', 'tech'),
(9, 'Health', 'health');

-- --------------------------------------------------------

--
-- Table structure for table `posts`
--

CREATE TABLE `posts` (
  `post_id` int(11) NOT NULL,
  `post_meta` text NOT NULL,
  `summery` text NOT NULL,
  `thm` varchar(500) NOT NULL DEFAULT 'd.png',
  `post_f_alt` varchar(5000) NOT NULL DEFAULT 'Latest news, analysis and opinion by the reporters of Bongo Path, Subscribe for Bangladesh and International news, business, politics, sports, science, technology, health, arts and more.',
  `postSlug` varchar(500) NOT NULL DEFAULT 'null-post',
  `post_title` text NOT NULL,
  `post_details` text NOT NULL,
  `post_cat` varchar(50) NOT NULL,
  `types` varchar(1) NOT NULL DEFAULT '1',
  `time` timestamp NOT NULL DEFAULT current_timestamp() ON UPDATE current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `posts`
--

INSERT INTO `posts` (`post_id`, `post_meta`, `summery`, `thm`, `post_f_alt`, `postSlug`, `post_title`, `post_details`, `post_cat`, `types`, `time`) VALUES
(74, '\r\n<script type=\"application/ld+json\">\r\n    {\r\n      \"@context\": \"https://schema.org\",\r\n      \"@type\": \"NewsArticle\",\r\n      \"mainEntityOfPage\": {\r\n        \"@type\": \"WebPage\",\r\n        \"@id\": \"https://bongopath.com/post/tech/whatsapp-introducing-undo-button-to-recover-deleted-messages\"\r\n      },\r\n      \"headline\": \"WhatsApp introducing undo button to recover deleted messages\",\r\n      \"description\": \"With the \\\"Accidental Delete\\\" function, users now have a five-second chance to retrieve accidentally deleted messages. This feature will serve as a safeguard for WhatsApp users, allowing them to undo accidental deletions or choose over how they want a text to be deleted.\",\r\n      \"image\": \"https://bongopath.com/assets/post_img/1671723142whatsapp_undo_delete_button.png\",  \r\n      \"author\": {\r\n        \"@type\": \"Organization\",\r\n        \"name\": \"Bongo Path Reporter\",\r\n        \"url\": \"https://bongopath.com/mhp\"\r\n      },  \r\n      \"publisher\": {\r\n        \"@type\": \"Organization\",\r\n        \"name\": \"Bongo Path\",\r\n        \"logo\": {\r\n          \"@type\": \"ImageObject\",\r\n          \"url\": \"https://bongopath.com/\"\r\n        }\r\n      },\r\n      \"datePublished\": \"2022-12-22\"\r\n    }\r\n    </script>\r\n<meta name=\"description\" content=\"With the \\\"Accidental Delete\\\" function, users now have a five-second chance to retrieve accidentally deleted messages. This feature will serve as a safeguard for WhatsApp users, allowing them to undo accidental deletions or choose over how they want a text to be deleted.\">\r\n<link rel=\"canonical\" href=\"https://bongopath.com/post/tech/whatsapp-introducing-undo-button-to-recover-deleted-messages\">\r\n<meta property=\"og:site_name\" content=\"Bongo Path\">\r\n<meta property=\"og:type\" content=\"article\">\r\n<meta property=\"og:url\" content=\"https://bongopath.com/post/tech/whatsapp-introducing-undo-button-to-recover-deleted-messages\">\r\n<meta property=\"og:title\" content=\"WhatsApp introducing undo button to recover deleted messages\">\r\n<meta property=\"og:description\" content=\"With the \\\"Accidental Delete\\\" function, users now have a five-second chance to retrieve accidentally deleted messages. This feature will serve as a safeguard for WhatsApp users, allowing them to undo accidental deletions or choose over how they want a text to be deleted.\">\r\n<meta property=\"og:image\" content=\"http://bongopath.com/assets/post_img/1671723142whatsapp_undo_delete_button.png\">\r\n<meta property=\"og:image:width\" content=\"750\">\r\n<meta property=\"og:image:height\" content=\"393\">\r\n<meta property=\"article:published_time\" content=\"2022-12-22\">\r\n<meta name=\"robots\" content=\"index, follow, max-image-preview:large\">\r\n', 'With the \"Accidental Delete\" function, users now have a five-second chance to retrieve accidentally deleted messages. This feature will serve as a safeguard for WhatsApp users, allowing them to undo accidental deletions or choose over how they want a text to be deleted.', '1671723142whatsapp_undo_delete_button.png', 'WhatsApp is introducing an undo button to recover deleted messages', 'whatsapp-introducing-undo-button-to-recover-deleted-messages', 'WhatsApp introducing undo button to recover deleted messages', '<p>&nbsp;</p>\r\n<p>&nbsp;</p>\r\n<p>WhatsApp is introducing a new feature that will let users retrieve their deleted messages on the platform.&nbsp;</p>\r\n<p>With the \"Accidental Delete\" function, users now have a five-second chance to retrieve accidentally deleted messages. This feature will serve as a safeguard for WhatsApp users, allowing them to undo accidental deletions or choose over how they want a text to be deleted.</p>\r\n<p>Currently, there are two ways to delete messages on WhatsApp: \"Delete for me\" and \"Delete for everyone.\" \"Delete for me\" makes the message unavailable to the user but visible to everyone else.</p>\r\n<p>In the past, if a user mistakenly clicked \"Delete for me\" rather than \"Delete for everyone,\" there was no way to view the message and choose the appropriate deletion choice.</p>\r\n<p>The undo feature is automated and will show up as a \"Undo\" button on a floating bar at the bottom of the app once a user selects \"Delete for me\" on a message.</p>', 'Tech', '1', '2022-12-22 16:04:13'),
(75, '\n<script type=\"application/ld+json\">\n    {\n      \"@context\": \"https://schema.org\",\n      \"@type\": \"NewsArticle\",\n      \"mainEntityOfPage\": {\n        \"@type\": \"WebPage\",\n        \"@id\": \"https://bongopath.com/post/tech/elon-musk-said-on-tuesday-he-will-step-down-as-chief-executive-of-twitter-after-finding-a-replacement\"\n      },\n      \"headline\": \"Elon Musk said on Tuesday he will step down as chief executive of Twitter after finding a replacement.\",\n      \"description\": \"Elon Musk said on Tuesday he will step down as chief executive of Twitter after finding a replacement.\",\n      \"image\": \"https://bongopath.com/assets/post_img/1671725124elon-musk.jpg\",  \n      \"author\": {\n        \"@type\": \"Organization\",\n        \"name\": \"Bongo Path Reporter\",\n        \"url\": \"https://bongopath.com/mhp\"\n      },  \n      \"publisher\": {\n        \"@type\": \"Organization\",\n        \"name\": \"Bongo Path\",\n        \"logo\": {\n          \"@type\": \"ImageObject\",\n          \"url\": \"https://bongopath.com/\"\n        }\n      },\n      \"datePublished\": \"2022-12-22\"\n    }\n    </script>\n<meta name=\"description\" content=\"Elon Musk said on Tuesday he will step down as chief executive of Twitter after finding a replacement.\">\n<link rel=\"canonical\" href=\"https://bongopath.com/post/tech/elon-musk-said-on-tuesday-he-will-step-down-as-chief-executive-of-twitter-after-finding-a-replacement\">\n<meta property=\"og:site_name\" content=\"Bongo Path\">\n<meta property=\"og:type\" content=\"article\">\n<meta property=\"og:url\" content=\"https://bongopath.com/post/tech/elon-musk-said-on-tuesday-he-will-step-down-as-chief-executive-of-twitter-after-finding-a-replacement\">\n<meta property=\"og:title\" content=\"Elon Musk said on Tuesday he will step down as chief executive of Twitter after finding a replacement.\">\n<meta property=\"og:description\" content=\"Elon Musk said on Tuesday he will step down as chief executive of Twitter after finding a replacement.\">\n<meta property=\"og:image\" content=\"https://bongopath.com/assets/post_img/1671725124elon-musk.jpg\">\n<meta property=\"og:image:width\" content=\"750\">\n<meta property=\"og:image:height\" content=\"393\">\n<meta property=\"article:published_time\" content=\"2022-12-22\">\n<meta name=\"robots\" content=\"index, follow, max-image-preview:large\">\n', 'Elon Musk said on Tuesday he will step down as chief executive of Twitter after finding a replacement.', '1671725124elon-musk.jpg', 'Elon Musk said on Tuesday he will step down as chief executive of Twitter after finding a replacement.', 'elon-musk-said-on-tuesday-he-will-step-down-as-chief-executive-of-twitter-after-finding-a-replacement', 'Elon Musk said on Tuesday he will step down as chief executive of Twitter after finding a replacement.', '<h1><strong>Elon Musk said on Tuesday he will step down as chief executive of Twitter after finding a replacement.</strong></h1>', 'Tech', '1', '2022-12-22 16:05:24');

-- --------------------------------------------------------

--
-- Table structure for table `sitemap`
--

CREATE TABLE `sitemap` (
  `id` int(11) NOT NULL,
  `main_url` varchar(500) NOT NULL,
  `time` timestamp NOT NULL DEFAULT current_timestamp() ON UPDATE current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `sitemap`
--

INSERT INTO `sitemap` (`id`, `main_url`, `time`) VALUES
(1, 'sitemap_post.xml', '2022-12-06 19:12:25'),
(2, 'sitemap_cat.xml', '2022-12-06 19:14:04'),
(3, 'sitemap_for_google.xml', '2022-12-21 19:57:50');

-- --------------------------------------------------------

--
-- Table structure for table `site_settings`
--

CREATE TABLE `site_settings` (
  `id` int(11) NOT NULL,
  `site_name` varchar(50) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `site_settings`
--

INSERT INTO `site_settings` (`id`, `site_name`) VALUES
(1, 'Bongo Path');

-- --------------------------------------------------------

--
-- Table structure for table `users`
--

CREATE TABLE `users` (
  `id` int(11) NOT NULL,
  `name` varchar(50) NOT NULL DEFAULT 'No Name',
  `email` varchar(100) NOT NULL,
  `time` timestamp NOT NULL DEFAULT current_timestamp() ON UPDATE current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `users`
--

INSERT INTO `users` (`id`, `name`, `email`, `time`) VALUES
(4, 'No Name', 'a4arpon@gmail.com', '2022-12-16 09:37:17');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `admin`
--
ALTER TABLE `admin`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `breaking_news`
--
ALTER TABLE `breaking_news`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `google_news`
--
ALTER TABLE `google_news`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `menus_navbar`
--
ALTER TABLE `menus_navbar`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `posts`
--
ALTER TABLE `posts`
  ADD PRIMARY KEY (`post_id`);

--
-- Indexes for table `sitemap`
--
ALTER TABLE `sitemap`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `site_settings`
--
ALTER TABLE `site_settings`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `users`
--
ALTER TABLE `users`
  ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `admin`
--
ALTER TABLE `admin`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT for table `breaking_news`
--
ALTER TABLE `breaking_news`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=27;

--
-- AUTO_INCREMENT for table `google_news`
--
ALTER TABLE `google_news`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=15;

--
-- AUTO_INCREMENT for table `menus_navbar`
--
ALTER TABLE `menus_navbar`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=10;

--
-- AUTO_INCREMENT for table `posts`
--
ALTER TABLE `posts`
  MODIFY `post_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=76;

--
-- AUTO_INCREMENT for table `sitemap`
--
ALTER TABLE `sitemap`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- AUTO_INCREMENT for table `site_settings`
--
ALTER TABLE `site_settings`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT for table `users`
--
ALTER TABLE `users`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
