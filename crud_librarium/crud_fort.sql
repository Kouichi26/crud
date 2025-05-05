-- phpMyAdmin SQL Dump
-- version 5.2.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: May 04, 2025 at 03:24 PM
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
-- Database: `crud_fort`
--

-- --------------------------------------------------------

--
-- Table structure for table `tb_admin`
--

CREATE TABLE `tb_admin` (
  `id` int(11) NOT NULL,
  `nm_admin` varchar(50) NOT NULL,
  `username` varchar(50) NOT NULL,
  `password` varchar(50) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

-- --------------------------------------------------------

--
-- Table structure for table `tb_shelf`
--

CREATE TABLE `tb_shelf` (
  `id` int(11) NOT NULL,
  `shelf_code` varchar(20) DEFAULT NULL,
  `nama` varchar(255) DEFAULT NULL,
  `author` varchar(255) DEFAULT NULL,
  `image` varchar(255) DEFAULT NULL,
  `amount` int(11) DEFAULT 0,
  `description` text NOT NULL,
  `synopsis` text NOT NULL,
  `genre` varchar(100) NOT NULL,
  `publish` date DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `tb_shelf`
--

INSERT INTO `tb_shelf` (`id`, `shelf_code`, `nama`, `author`, `image`, `amount`, `description`, `synopsis`, `genre`, `publish`, `created_at`) VALUES
(7, '01', 'The Wings', 'Yi Sang', '01.jpg', 1, '\"Utter to me what you think the ideal is.\"', 'The Wings adalah karya fiksi avant-garde oleh penulis Korea, Yi Sang. Dalam novel ini, karakter utama, seorang pria yang terperangkap dalam kehidupan monoton, menghadapi dilema eksistensial, merenungkan makna hidup dan kematian. Cerita ini sering dianggap sebagai representasi dari kesendirian dan alienasi, serta penelusuran dalam dunia pikiran yang terisolasi dan penuh ketegangan.', 'Fiksi Eksperimental, Modernis', '1936-01-01', '2025-05-04 10:03:20'),
(8, '02', 'Faust I', 'Goethe', '02.jpg', 2, '\"Faust knows all outcomes.\"', '', '', NULL, '2025-05-04 10:04:16'),
(9, '03', 'The Ingenious Gentleman Don Quixote of La Mancha', 'Miguel de Cervantes', '03.jpg', 3, '\"Gallop on, Rocinante! Justice shall prevail!\"', '', '', NULL, '2025-05-04 10:06:49'),
(10, '04', 'Hell Screen', 'Ryunosuke Akutagawa', '04.jpg', 4, '\"OSHARE.\r\n(Obligate style hearkens aflame this robust earth.)\"\r\n', '', '', NULL, '2025-05-04 10:09:02'),
(11, '05', 'The Stranger', 'Albert Camus', '05.jpg', 5, '\"The multitude tightens its hold…\"', '', '', NULL, '2025-05-04 10:09:56'),
(12, '06', 'Dream of the Red Chamber', 'Cao Xueqin', '06.jpg', 6, '\"Let’s visit the world of wonders.\"\r\n', '', '', NULL, '2025-05-04 10:10:53'),
(13, '07', 'Wuthering Heights', 'Emily Bronte', '07.jpg', 7, '\"You’ll… get shoved in this bag too!\"', '', '', NULL, '2025-05-04 10:11:24'),
(14, '08', 'Moby Dick', 'Herman Melville', '08.jpg', 8, '\"That bastard… has to be alive still.\"', '', '', NULL, '2025-05-04 10:13:04'),
(15, '09', 'Crime and Punishment', 'Fyodor Dostoevsky', '09.jpg', 9, '\"I couldn\'t undo a thing...\"', '', '', NULL, '2025-05-04 10:14:58'),
(16, '10', 'Dante\'s Inferno', 'Dante Alighieri', '10.jpg', 10, '\"*Holy Shuckaroonies...!*\"', '', '', NULL, '2025-05-04 10:18:05'),
(17, '11', 'Demian', 'Hermann Hesse', '11.jpg', 11, '\"If I can sever it by my own hands…\"\r\n', '', '', NULL, '2025-05-04 10:21:32'),
(18, '12', 'Oddysey', 'Homer', '12.jpg', 12, '\"The odyssey had a purpose…\"\r\n', '', '', NULL, '2025-05-04 10:23:52');

-- --------------------------------------------------------

--
-- Table structure for table `tb_user`
--

CREATE TABLE `tb_user` (
  `id` int(11) NOT NULL,
  `created_at` timestamp NOT NULL DEFAULT current_timestamp(),
  `level` enum('Admin','Moderator','Visitor','') DEFAULT 'Visitor',
  `name` varchar(30) DEFAULT NULL,
  `pass` varchar(50) DEFAULT NULL,
  `username` varchar(30) DEFAULT NULL,
  `updated_at` datetime DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `tb_user`
--

INSERT INTO `tb_user` (`id`, `created_at`, `level`, `name`, `pass`, `username`, `updated_at`) VALUES
(1, '2025-05-04 05:32:03', 'Admin', 'Hafiez', '81dc9bdb52d04dc20036dbd8313ed055', 'Dantalion', '2025-05-04 12:32:03'),
(2, '2025-05-04 05:32:17', 'Moderator', 'Fauzi', '81dc9bdb52d04dc20036dbd8313ed055', 'WhiteDust', '2025-05-04 12:32:17'),
(3, '2025-05-04 05:32:34', 'Visitor', 'Zakariya', '81dc9bdb52d04dc20036dbd8313ed055', 'XKVZXRV', '2025-05-04 12:32:34'),
(4, '2025-05-04 05:33:00', 'Moderator', 'Sandi Ahmad', '81dc9bdb52d04dc20036dbd8313ed055', 'Sandi', '2025-05-04 12:33:00'),
(5, '2025-05-04 05:33:12', 'Moderator', 'Abdul Solihin', '81dc9bdb52d04dc20036dbd8313ed055', 'Abdul', '2025-05-04 12:33:12'),
(6, '2025-05-04 05:33:31', 'Moderator', 'Widya Maya', '81dc9bdb52d04dc20036dbd8313ed055', 'Widya', '2025-05-04 12:33:31'),
(7, '2025-05-04 05:36:53', 'Admin', 'Admin', '21232f297a57a5a743894a0e4a801fc3', 'Admin', '2025-05-04 12:36:53'),
(8, '2025-05-04 05:37:11', 'Moderator', 'Moderator', '0408f3c997f309c03b08bf3a4bc7b730', 'Moderator', '2025-05-04 12:37:11'),
(9, '2025-05-04 05:37:32', 'Moderator', 'Visitor', '127870930d65c57ee65fcc47f2170d38', 'Visitor', '2025-05-04 18:58:47');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `tb_admin`
--
ALTER TABLE `tb_admin`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `tb_shelf`
--
ALTER TABLE `tb_shelf`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `tb_user`
--
ALTER TABLE `tb_user`
  ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `tb_admin`
--
ALTER TABLE `tb_admin`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `tb_shelf`
--
ALTER TABLE `tb_shelf`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=19;

--
-- AUTO_INCREMENT for table `tb_user`
--
ALTER TABLE `tb_user`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=20;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
