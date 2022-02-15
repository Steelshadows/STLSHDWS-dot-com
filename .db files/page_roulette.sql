-- phpMyAdmin SQL Dump
-- version 5.0.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Feb 14, 2022 at 12:02 PM
-- Server version: 10.4.11-MariaDB
-- PHP Version: 7.4.2

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET AUTOCOMMIT = 0;
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `page_roulette`
--

-- --------------------------------------------------------

--
-- Table structure for table `pages`
--

CREATE TABLE `pages` (
  `id` int(11) NOT NULL,
  `url` text NOT NULL COMMENT 'target URL',
  `duration` int(11) NOT NULL DEFAULT 10000 COMMENT 'duration in ms',
  `pageInfo` text NOT NULL COMMENT 'info to be shown to the ',
  `status` text NOT NULL DEFAULT 'active' COMMENT 'page status',
  `date` datetime NOT NULL DEFAULT current_timestamp() COMMENT 'page added date'
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `pages`
--

INSERT INTO `pages` (`id`, `url`, `duration`, `pageInfo`, `status`, `date`) VALUES
(1, 'https://www.bing.com/images/search?q=waterfalls%20and%20cliffs', 7500, '', 'hidden', '2022-02-10 12:02:48'),
(2, 'https://www.bing.com/videos/search?q=Home', 5000, '', 'active', '2022-02-10 12:02:48'),
(3, 'https://www.bing.com/videos/search?q=DIE%20Crafts', 5000, 'DIE crafts', 'active', '2022-02-10 12:02:48'),
(4, 'https://www.bing.com/images/search?q=bing', 5000, 'bing', 'active', '2022-02-11 11:31:41'),
(5, 'https://www.bing.com/images/search?q=oktober%20fest', 5000, 'oktoberFest', 'active', '2022-02-11 12:23:09'),
(6, 'https://depositado.com', 4555, '', 'active', '2022-02-11 13:16:44');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `pages`
--
ALTER TABLE `pages`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `url` (`url`) USING HASH;

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `pages`
--
ALTER TABLE `pages`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=11;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
