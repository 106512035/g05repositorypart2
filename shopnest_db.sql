-- phpMyAdmin SQL Dump
-- version 5.2.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1:3306
-- Generation Time: Jun 01, 2026 at 01:07 PM
-- Server version: 9.6.0
-- PHP Version: 8.2.4

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `shopnest_db`
--

-- --------------------------------------------------------

--
-- Table structure for table `jobs`
--

CREATE TABLE `jobs` (
  `job_id` int NOT NULL,
  `reference_number` varchar(5) NOT NULL,
  `job_title` varchar(100) NOT NULL,
  `reporting_line` varchar(100) NOT NULL,
  `location` varchar(100) NOT NULL,
  `job_type` varchar(50) NOT NULL,
  `salary_range` varchar(50) NOT NULL,
  `experience` varchar(100) NOT NULL,
  `key_skills` text NOT NULL,
  `about_role` text NOT NULL,
  `about_team` text NOT NULL,
  `responsibilities` text NOT NULL,
  `essential_req` text NOT NULL,
  `preferable_req` text NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;

--
-- Dumping data for table `jobs`
--

INSERT INTO `jobs` (`job_id`, `reference_number`, `job_title`, `reporting_line`, `location`, `job_type`, `salary_range`, `experience`, `key_skills`, `about_role`, `about_team`, `responsibilities`, `essential_req`, `preferable_req`) VALUES
(1, 'EWC01', 'Ecommerce Website Coordinator', 'Senior Developer', 'Melbourne, VIC', 'Full-time', '$70,000 - $100,000', '1-2 years preferred', '<li>HTML & CSS</li><li>Shopify / WooCommerce</li><li>Attention to detail</li><li>SEO basics</li>', 'We are seeking a detail-oriented and proactive Ecommerce Website Coordinator to manage and maintain our online store. This role involves updating website content, ensuring product information is accurate, and supporting the overall performance of our ecommerce platform.', 'You will join a cross-functional digital team of eight, working closely with marketing, logistics, and customer support. We run weekly content sprints and review site performance every fortnight.', '<li>Manage and publish all website content including banners, landing pages, and promotional campaigns using our CMS (Shopify Plus).</li><li>Conduct weekly audits of the storefront to identify broken links, outdated content, and accessibility issues.</li><li>Coordinate with the design team to brief, review, and deploy new page templates and seasonal updates.</li><li>Monitor site performance metrics (bounce rate, page speed, conversion rate) and flag anomalies to the digital manager.</li><li>Support the rollout of new site features and A/B tests in collaboration with the development team.</li>', '<li>2+ years of customer experience.</li><li>Hands-on experience with a major CMS platform (Shopify, Magento, or similar).</li><li>Strong attention to detail with the ability to manage multiple concurrent content updates.</li><li>Familiarity with basic HTML for content troubleshooting and minor edits.</li><li>Available to attend on site.</li>', '<li>Experience with ecommerce platforms (Shopify, WooCommerce, Magento).</li><li>Basic graphic design skills (Canva, Photoshop).</li><li>Understanding of SEO and Google Analytics.</li><li>Experience with digital marketing tools (email campaigns, ads).</li><li>Basic HTML and CSS knowledge.</li><li>Previous experience in ecommerce or retail environment.</li>'),
(2, 'EMA02', 'Ecommerce Marketing Assistant', 'Marketing Manager', 'Melbourne, VIC', 'Full-time', '$60,000 - $70,000', '1-2 years in Marketing', '<li>Social media management</li><li>Basic SEO knowledge</li><li>Content creation (posts, emails)</li><li>Analytical thinking (traffic and sales data)</li><li>Communication and teamwork</li>', 'We are looking for an Ecommerce Digital Marketing Assistant to help promote our online store, attract new customers, and increase sales. This role involves managing social media, supporting marketing campaigns, and improving product visibility online.', 'You will be joining a small but fast-paced ecommerce team that includes website coordinators, customer service staff, and marketing specialists. The team works closely together to improve the online shopping experience, increase sales, and ensure customers receive high-quality support. Collaboration, communication, and creativity are highly valued in this environment.', '<li>Manage social media content (Instagram, TikTok, Facebook).</li><li>Assist with email marketing campaigns.</li><li>Support SEO improvements for product listings.</li><li>Monitor website traffic and report insights.</li><li>Help run online advertising campaigns.</li><li>Research trends to improve marketing strategies.</li>', '<li>1+ years of experience in marketing or a related field.</li><li>Experience managing social media accounts professionally.</li><li>Strong written and verbal communication skills.</li><li>Ability to work in a fast-paced team environment.</li><li>Basic understanding of digital marketing concepts.</li>', '<li>Good communication skills.</li><li>Basic understanding of social media platforms.</li><li>Creative thinking and attention to detail.</li><li>Willingness to learn digital marketing tools.</li>');

-- --------------------------------------------------------

--
-- Table structure for table `member_contributions`
--

CREATE TABLE `member_contributions` (
  `id` int NOT NULL,
  `member_name` varchar(100) COLLATE utf8mb4_general_ci NOT NULL,
  `role` varchar(100) COLLATE utf8mb4_general_ci DEFAULT NULL,
  `project_1_contribution` text COLLATE utf8mb4_general_ci,
  `project_2_contribution` text COLLATE utf8mb4_general_ci
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `member_contributions`
--

INSERT INTO `member_contributions` (`id`, `member_name`, `role`, `project_1_contribution`, `project_2_contribution`) VALUES
(1, 'Bianca Zerveas', 'Team Member 3', 'Created the Apply page and assisted with HTML and CSS development.', 'Created the Apply table in the database and converted the Apply form to PHP, storing all submitted data in the database.'),
(2, 'Thomas Nguyen', 'Team Member 2', 'Created the Jobs page and assisted with HTML and CSS development.', 'Created the Jobs table and jobs.php, rendering job descriptions and details dynamically using PHP. Added a search bar and developed login.php, manage.php, and logout.php to provide administrator authentication and management functionality.'),
(3, 'Damisi Omibiyi', 'Team Member 1', 'Created the Index page and assisted with HTML and CSS development.', 'Converted pages to PHP, created reusable PHP includes, and developed the database structure used to store team contribution information for this project.');

-- --------------------------------------------------------

--
-- Table structure for table `users`
--

CREATE TABLE `users` (
  `id` int NOT NULL,
  `username` varchar(50) NOT NULL,
  `password` varchar(50) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;

--
-- Dumping data for table `users`
--

INSERT INTO `users` (`id`, `username`, `password`) VALUES
(1, 'admin', 'admin');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `jobs`
--
ALTER TABLE `jobs`
  ADD PRIMARY KEY (`job_id`);

--
-- Indexes for table `member_contributions`
--
ALTER TABLE `member_contributions`
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
-- AUTO_INCREMENT for table `jobs`
--
ALTER TABLE `jobs`
  MODIFY `job_id` int NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT for table `member_contributions`
--
ALTER TABLE `member_contributions`
  MODIFY `id` int NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT for table `users`
--
ALTER TABLE `users`
  MODIFY `id` int NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
