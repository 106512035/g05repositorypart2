-- phpMyAdmin SQL Dump
-- version 5.2.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Jun 01, 2026 at 12:59 PM
-- Server version: 10.4.32-MariaDB
-- PHP Version: 8.2.12

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
-- Table structure for table `member_contributions`
--

CREATE TABLE `member_contributions` (
  `id` int(11) NOT NULL,
  `member_name` varchar(100) NOT NULL,
  `role` varchar(100) DEFAULT NULL,
  `project_1_contribution` text DEFAULT NULL,
  `project_2_contribution` text DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `member_contributions`
--

INSERT INTO `member_contributions` (`id`, `member_name`, `role`, `project_1_contribution`, `project_2_contribution`) VALUES
(1, 'Bianca Zerveas', 'Team Member 3', 'Created the Apply page and assisted with HTML and CSS development.', 'Created the Apply table in the database and converted the Apply form to PHP, storing all submitted data in the database.'),
(2, 'Thomas Nguyen', 'Team Member 2', 'Created the Jobs page and assisted with HTML and CSS development.', 'Created the Jobs table and jobs.php, rendering job descriptions and details dynamically using PHP. Added a search bar and developed login.php, manage.php, and logout.php to provide administrator authentication and management functionality.'),
(3, 'Damisi Omibiyi', 'Team Member 1', 'Created the Index page and assisted with HTML and CSS development.', 'Converted pages to PHP, created reusable PHP includes, and developed the database structure used to store team contribution information for this project.');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `member_contributions`
--
ALTER TABLE `member_contributions`
  ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `member_contributions`
--
ALTER TABLE `member_contributions`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
