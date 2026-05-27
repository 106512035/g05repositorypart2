-- phpMyAdmin SQL Dump
-- version 5.2.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1:3306
-- Generation Time: May 27, 2026 at 10:32 AM
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
-- Database: `jobs_db`
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
(1, 'EWC01', 'Ecommerce Website Coordinator', 'Senior Developer', 'Melbourne, VIC', 'Full-time', '$70,000 - $100,000', '1-2 years preferred', 'HTML & CSS,Shopify / WooCommerce,Attention to detail,SEO basics', 'We are seeking a detail-oriented and proactive Ecommerce Website Coordinator to manage and maintain our online store. This role involves updating website content, ensuring product information is accurate, and supporting the overall performance of our ecommerce platform.', 'You will join a cross-functional digital team of eight, working closely with marketing, logistics, and customer support. We run weekly content sprints and review site performance every fortnight.', 'Manage and publish all website content including banners, landing pages, and promotional campaigns using our CMS (Shopify Plus).|Conduct weekly audits of the storefront to identify broken links, outdated content, and accessibility issues.|Coordinate with the design team to brief, review, and deploy new page templates and seasonal updates.|Monitor site performance metrics (bounce rate, page speed, conversion rate) and flag anomalies to the digital manager.|Support the rollout of new site features and A/B tests in collaboration with the development team.', '2+ years of customer experience.|Hands-on experience with a major CMS platform (Shopify, Magento, or similar).|Strong attention to detail with the ability to manage multiple concurrent content updates.|Familiarity with basic HTML for content troubleshooting and minor edits.|Available to attend on site.', 'Experience with ecommerce platforms (Shopify, WooCommerce, Magento).|Basic graphic design skills (Canva, Photoshop).|Understanding of SEO and Google Analytics.|Experience with digital marketing tools (email campaigns, ads).|Basic HTML and CSS knowledge.|Previous experience in ecommerce or retail environment.'),
(2, 'EMA02', 'Ecommerce Marketing Assistant', 'Marketing Manager', 'Melbourne, VIC', 'Full-time', '$60,000 - $70,000', '1-2 years in Marketing', 'Social media management,Basic SEO knowledge,Content creation (posts, emails),Analytical thinking (traffic and sales data),Communication and teamwork', 'We are looking for an Ecommerce Digital Marketing Assistant to help promote our online store, attract new customers, and increase sales. This role involves managing social media, supporting marketing campaigns, and improving product visibility online.', 'You will be joining a small but fast-paced ecommerce team that includes website coordinators, customer service staff, and marketing specialists. The team works closely together to improve the online shopping experience, increase sales, and ensure customers receive high-quality support. Collaboration, communication, and creativity are highly valued in this environment.', 'Manage social media content (Instagram, TikTok, Facebook).|Assist with email marketing campaigns.|Support SEO improvements for product listings.|Monitor website traffic and report insights.|Help run online advertising campaigns.|Research trends to improve marketing strategies.', 'Good communication skills.|Basic understanding of social media platforms.|Creative thinking and attention to detail.|Willingness to learn digital marketing tools.', 'Good communication skills.|Basic understanding of social media platforms.|Creative thinking and attention to detail.|Willingness to learn digital marketing tools.');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `jobs`
--
ALTER TABLE `jobs`
  ADD PRIMARY KEY (`job_id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `jobs`
--
ALTER TABLE `jobs`
  MODIFY `job_id` int NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
