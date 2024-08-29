-- phpMyAdmin SQL Dump
-- version 5.2.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Aug 29, 2024 at 06:55 AM
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
-- Database: `memberjkt48`
--

-- --------------------------------------------------------

--
-- Table structure for table `memberjkt48`
--

CREATE TABLE `memberjkt48` (
  `id` int(11) NOT NULL,
  `fullname` varchar(100) NOT NULL,
  `birtday` varchar(100) NOT NULL,
  `generation` varchar(100) NOT NULL,
  `nickname` varchar(100) NOT NULL,
  `profile` varchar(100) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `memberjkt48`
--

INSERT INTO `memberjkt48` (`id`, `fullname`, `birtday`, `generation`, `nickname`, `profile`) VALUES
(2, 'Azizi Shafaa Asadel', '16 Mei 2004', '7th Generation', 'Zee (ジー?)', 'zee.webp'),
(3, 'Freyanashifa Jayawardana', ' February 13, 2006', '7th Generation', ' Freya (フレヤ?)', 'freya.webp'),
(4, 'Angelina Christy', 'December 5, 2005', '7th Generation', 'Christy (クリスティー?)', 'toya.webp'),
(5, 'Marsha Lenathea Lapian', 'January 9, 2006', '9th Generation', 'Marsha (マーシャ?)', 'marsha.webp'),
(6, ' Shania Gracia Harlan', ' August 31, 199', '3th Generation', ' Gracia (グラシア?)', 'gracia.webp'),
(7, ' Shani Indira Natio', 'October 5, 1998', '3th Generation', 'Shani (シャニ?)', 'shani.webp'),
(32, 'fiony', 'Februari 13, 2006', '7th Generation', 'fiony', '66a8cc17a7dd0.webp'),
(38, 'feni', '23 juli 2006', 'gen 3', 'feni', '66b37881e5e85.webp'),
(43, 'yessica Tamara', '8 januari 2003', 'gen Z', 'jesica', '66b37810618cd.webp'),
(44, 'Eko Yusron Ardiyansyah', '21 September 2003', 'Admin', 'Admin', '66c2a9a25bdf9.jpg');

-- --------------------------------------------------------

--
-- Table structure for table `users`
--

CREATE TABLE `users` (
  `id` int(11) NOT NULL,
  `username` varchar(255) NOT NULL,
  `password` varchar(255) NOT NULL,
  `fullname` varchar(250) NOT NULL,
  `thumbnail` varchar(250) NOT NULL,
  `profile` varchar(250) NOT NULL,
  `bio` varchar(250) NOT NULL,
  `session` varchar(250) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `users`
--

INSERT INTO `users` (`id`, `username`, `password`, `fullname`, `thumbnail`, `profile`, `bio`, `session`) VALUES
(1, '', '$2y$10$5ctDV6p0HdNaBD4iDuj85eKuIMMmlXfQn565TxjLAKNVO5tdrznni', '', '', '', '', ''),
(10, 'admin123', '$2y$10$vJpfHVMsASvBDM47V3/Rw.HPBE6t7eVEPaakG0YO9KY4Bx5QyZ.Ju', '', '', '', '', ''),
(11, 'yusron', '$2y$10$2l7RdmeDt0OEmE.DsFBFaupniDURox.Yt9vv4NU6OeVeK8VGeBSKe', '', '', '', '', ''),
(12, 'ekoysrn_', '$2y$10$0qz9nbBsCaq/IsU8HFE6.e.ilx1MVrpyPry5tGfJzcIS7ngK/5jfG', '', '', '', '', ''),
(14, 'hehe', '$2y$10$Q5VQq/XucuL3LkKkh.R62e4ejGx/LMt64tDlxBOMMEiL9AJHuHnQ6', '', '', '', '', ''),
(15, 'freyaJKT48_', '$2y$10$k35FoS8tisc79mn1o7B4E.nNJjqW94dRF4W43dBxZ86eDrbYbGG/q', 'Freya Nashifa Jayawardana', '20231116_052057.jpg', 'freya.webp', 'Gadis koleris yang suka berimajinasi, terangi harimu dengan senyum karamelku. Halo semua, Aku Freya!', '0564ac72f061dd4bbb25bfc4803290d071e9bd8d6f9fa8a36638bbcbba10a0a2'),
(16, 'ekoyusron', '$2y$10$QotxUN68AAiRe6rghl1hsutFK5Ut2c2JOrD99AwBRuc9YRCeKSSvC', '', '', '', '', ''),
(17, 'ekoyeah_', '$2y$10$30b2INCJui6WlceLdwZPkOe3z1B8tF.t42eDjwMpBGcpZwNorXwXK', 'Eko Yusron Ardiyansyah', '', '', '', ''),
(18, 'aaa', '$2y$10$GnZNkX9Oa6ywTQUPs5WtZ.DVA.9kGi0n1ahZP5qSN3ZgXzHO5x8yK', 'aaa', '', '', '', ''),
(29, 'spx', '$2y$10$LpaTbUFhGz8E8P/7.qK0h.GjncwVbHj1wyOSkqFA3M/56gTetRQw2', 'shopee express', '66c4a724501f8.webp', '66c4a735d1799.png', 'a courier with jacket orange an have the text &quot;spx&quot; in back the jacket. he have a many parcel in the future', 'e478f044284fa7ed75b4c4a0782b3e48dd722d9aa2e7357573a7b8744a07ff9c'),
(30, 'eko', '$2y$10$r.S.RKYNs8DWrZA8Vx0lte/f9ARcTwpgOkOjZfDfW9g8chZjc8I9O', 'eko', '66c4a8275279a.webp', '66c4a8301803e.png', '', 'e99dd63094f6802fff3712251d0fcf0ff7e3425a406d987b92021f7cd0ffe406'),
(31, 'exo', '$2y$10$L2F4/VJRHg6Kr0DXtT8Jne7yfH5cAcedCePhz4k0ixTWfDudr.Xsi', 'exo', '66c51644140b7.jpg', '66c516562ee08.jpg', 'fdff', '5dd46c764922555cac91808927b529fd9d8191e78099fa6388531a96e6be7f95'),
(36, '123', '$2y$10$bOLMzXbAl0fWgdNyhCo6V.HDyWvptoXc0Ce3HxSfe1HE8l2J1u.J6', '123', '66c92de72a649.jpg', '66c92de72aed9.jpg', 'function hello world!', '6e863f872240b8fb61ac2d614b7c07f240a0ebbfa1a51433083ae30b0e0591ff');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `memberjkt48`
--
ALTER TABLE `memberjkt48`
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
-- AUTO_INCREMENT for table `memberjkt48`
--
ALTER TABLE `memberjkt48`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=45;

--
-- AUTO_INCREMENT for table `users`
--
ALTER TABLE `users`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=37;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
