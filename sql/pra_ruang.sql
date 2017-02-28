-- phpMyAdmin SQL Dump
-- version 4.6.5.2
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Feb 28, 2017 at 08:27 PM
-- Server version: 10.1.21-MariaDB
-- PHP Version: 7.1.1

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `pra_ruang`
--

-- --------------------------------------------------------

--
-- Table structure for table `sesi_waktu`
--

CREATE TABLE `sesi_waktu` (
  `id` int(11) NOT NULL,
  `sesi` varchar(32) NOT NULL,
  `mulai` time NOT NULL,
  `selesai` time NOT NULL,
  `tampil` varchar(32) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `sesi_waktu`
--

INSERT INTO `sesi_waktu` (`id`, `sesi`, `mulai`, `selesai`, `tampil`) VALUES
(1, 'pertama', '07:00:00', '08:00:00', '07:00 - 08:00'),
(2, 'QQWQW', '21:00:00', '22:15:00', '21:00 - 22:15');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `sesi_waktu`
--
ALTER TABLE `sesi_waktu`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `tampil` (`tampil`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `sesi_waktu`
--
ALTER TABLE `sesi_waktu`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;
/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
