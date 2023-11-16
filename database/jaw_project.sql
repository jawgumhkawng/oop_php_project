-- phpMyAdmin SQL Dump
-- version 5.1.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Nov 16, 2023 at 06:13 AM
-- Server version: 10.4.22-MariaDB
-- PHP Version: 8.1.2

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `jaw_project`
--

-- --------------------------------------------------------

--
-- Table structure for table `roles`
--

CREATE TABLE `roles` (
  `id` int(11) NOT NULL,
  `name` varchar(255) NOT NULL,
  `value` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `roles`
--

INSERT INTO `roles` (`id`, `name`, `value`) VALUES
(1, 'user', 1),
(2, 'manager', 2),
(3, 'admin', 3);

-- --------------------------------------------------------

--
-- Table structure for table `users`
--

CREATE TABLE `users` (
  `id` int(11) NOT NULL,
  `name` varchar(255) NOT NULL,
  `email` varchar(255) NOT NULL,
  `password` varchar(255) NOT NULL,
  `phone` varchar(255) NOT NULL,
  `address` varchar(255) NOT NULL,
  `role_id` int(11) NOT NULL DEFAULT 1,
  `photo` varchar(255) DEFAULT NULL,
  `suspended` int(11) NOT NULL,
  `created_at` datetime NOT NULL DEFAULT current_timestamp(),
  `updated_at` datetime NOT NULL DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `users`
--

INSERT INTO `users` (`id`, `name`, `email`, `password`, `phone`, `address`, `role_id`, `photo`, `suspended`, `created_at`, `updated_at`) VALUES
(10, 'Caesar Abernathy III', 'liana78@mann.info', '5f4dcc3b5aa765d61d8327deb882cf99', '(847) 855-4392', '66340 Christine Springs\nBeattyberg, CA 70299', 1, NULL, 0, '2023-11-09 23:19:06', '2023-11-09 23:19:06'),
(13, 'Elbert Wiegand', 'donnelly.ezra@gmail.com', '5f4dcc3b5aa765d61d8327deb882cf99', '+1-562-694-1195', '34923 Powlowski Village\nKochshire, OH 49367', 1, NULL, 1, '2023-11-10 15:06:55', '2023-11-10 15:06:55'),
(14, 'Maggie Rogahn IV', 'alana83@ward.com', '5f4dcc3b5aa765d61d8327deb882cf99', '1-727-794-7244', '1596 Maye Avenue Suite 177\nClairport, LA 15553-0759', 1, NULL, 0, '2023-11-10 15:06:55', '2023-11-10 15:06:55'),
(15, 'Titus Halvorson', 'qmoore@mante.com', '5f4dcc3b5aa765d61d8327deb882cf99', '959-306-0911', '218 Weimann River Suite 251\nPort Rethachester, MI 75864', 1, NULL, 0, '2023-11-10 15:06:55', '2023-11-10 15:06:55'),
(16, 'Chadrick Hagenes', 'daisha79@gmail.com', '5f4dcc3b5aa765d61d8327deb882cf99', '(283) 995-3114', '161 Schmidt Crossroad Apt. 638\nEast Stevie, KY 31462', 1, NULL, 0, '2023-11-10 15:06:55', '2023-11-10 15:06:55'),
(17, 'Tyrique McCullough', 'quitzon.mervin@hotmail.com', '5f4dcc3b5aa765d61d8327deb882cf99', '+17063581474', '569 Johnson Mill\nOrnfort, OK 09010-3779', 1, NULL, 0, '2023-11-10 15:06:55', '2023-11-10 15:06:55'),
(18, 'Marina Mosciski', 'lorenzo.monahan@swaniawski.org', '5f4dcc3b5aa765d61d8327deb882cf99', '754.778.6772', '759 Deja Port Suite 074\nEast Marvinbury, LA 66287', 1, NULL, 0, '2023-11-10 15:06:55', '2023-11-10 15:06:55'),
(19, 'Hillard Jones DDS', 'qreichert@hilpert.net', '5f4dcc3b5aa765d61d8327deb882cf99', '564.953.6749', '709 Crist Extension\nLake Megane, DC 75736-7542', 2, NULL, 0, '2023-11-10 15:06:55', '2023-11-10 15:06:55'),
(20, 'Piper Corwin', 'maggio.shyanne@gmail.com', '5f4dcc3b5aa765d61d8327deb882cf99', '430.901.2608', '843 Halvorson Locks Suite 372\nWest Kelli, IN 31881-9700', 2, NULL, 0, '2023-11-10 15:06:55', '2023-11-10 15:06:55'),
(25, 'jaw', 'jaw20007@gmail.com', '1396441277b35c7332579e77cf069fb5', '0967757432', 'mkn', 3, 'IMG_20230101_003239.jpg', 0, '2023-11-10 16:02:36', '2023-11-10 16:02:36'),
(32, 'hhh', 'jaw2@gmail.com', 'afdbf4b6eeacd5df69ba4b3fa9514641', '908796785', 'thfg', 2, 'FB_IMG_1678414884667.jpg', 0, '2023-11-12 21:19:40', '2023-11-12 21:19:40'),
(33, 'hhhy', 'jaw200@gmail.com', '4ae0f5023b2c9a0649ade447fe5bc981', '097685745543', 'ghd', 2, 'Screenshot_20230706_182616.jpg', 1, '2023-11-12 21:39:26', '2023-11-12 21:39:26'),
(34, 'kyawkyaw', 'kyawkyaw@gmail.com', '29a2d203b618f62045f50834648d836f', '0988786966', 'mkn', 1, 'IMG_20220918_144113_523.jpg', 0, '2023-11-13 15:34:01', '2023-11-13 15:34:01'),
(35, 'mr kyaw', 'mrkyaw@gmail.com', '7747a3f5a1d3dd668143c79caad505f4', '096745242341', 'mmkn', 1, 'FB_IMG_1670772649792.jpg', 0, '2023-11-16 11:40:40', '2023-11-16 11:40:40');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `roles`
--
ALTER TABLE `roles`
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
-- AUTO_INCREMENT for table `roles`
--
ALTER TABLE `roles`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT for table `users`
--
ALTER TABLE `users`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=36;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
