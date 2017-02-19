-- phpMyAdmin SQL Dump
-- version 4.6.5.2
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Feb 20, 2017 at 01:51 AM
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
-- Table structure for table `admin`
--

CREATE TABLE `admin` (
  `id` int(11) NOT NULL,
  `nama` varchar(63) COLLATE utf8_unicode_ci NOT NULL,
  `username` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `auth_key` varchar(32) COLLATE utf8_unicode_ci NOT NULL,
  `password_hash` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `password_reset_token` varchar(255) COLLATE utf8_unicode_ci DEFAULT NULL,
  `email` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `status` smallint(6) NOT NULL DEFAULT '10',
  `created_at` int(11) NOT NULL,
  `updated_at` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Dumping data for table `admin`
--

INSERT INTO `admin` (`id`, `nama`, `username`, `auth_key`, `password_hash`, `password_reset_token`, `email`, `status`, `created_at`, `updated_at`) VALUES
(4, 'Sugeng Sulistiyawan', 'ssimg', '_PbCNwEauCcB5OQ_muULpR6WkoYzwKAX', '$2y$13$nZ2viBptDXJmNnfUF7WGiO43k7Q/0DgHCQv0KkS70rt95tuDm/9oW', NULL, 'sugeng.sulistiyawan@gmail.com', 10, 1487522606, 1487522606);

-- --------------------------------------------------------

--
-- Table structure for table `fakultas`
--

CREATE TABLE `fakultas` (
  `id` int(11) NOT NULL,
  `nama` varchar(63) NOT NULL,
  `alamat` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `fakultas`
--

INSERT INTO `fakultas` (`id`, `nama`, `alamat`) VALUES
(1, 'FKIP', 'BELAKANG NH UNS '),
(2, 'FISIP', 'BELAKANG FKIP'),
(3, 'FK', 'MBUH');

-- --------------------------------------------------------

--
-- Table structure for table `migration`
--

CREATE TABLE `migration` (
  `version` varchar(180) NOT NULL,
  `apply_time` int(11) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `migration`
--

INSERT INTO `migration` (`version`, `apply_time`) VALUES
('m000000_000000_base', 1487218913),
('m130524_201442_init', 1487218915);

-- --------------------------------------------------------

--
-- Table structure for table `prodi`
--

CREATE TABLE `prodi` (
  `id` int(11) NOT NULL,
  `id_fakultas` int(11) NOT NULL,
  `nama` varchar(63) CHARACTER SET utf8 COLLATE utf8_unicode_ci NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `prodi`
--

INSERT INTO `prodi` (`id`, `id_fakultas`, `nama`) VALUES
(1, 1, 'PENDIDIKAN MATEMATIKA'),
(2, 2, 'MATEMATIKA');

-- --------------------------------------------------------

--
-- Table structure for table `ruang`
--

CREATE TABLE `ruang` (
  `id` int(11) NOT NULL,
  `nama` varchar(63) NOT NULL,
  `kapasitas` int(3) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `ruang`
--

INSERT INTO `ruang` (`id`, `nama`, `kapasitas`) VALUES
(3, 'VICON 1', 32);

-- --------------------------------------------------------

--
-- Table structure for table `ruangan`
--

CREATE TABLE `ruangan` (
  `id` int(11) NOT NULL,
  `nim_mahasiswa` varchar(8) CHARACTER SET utf8 COLLATE utf8_unicode_ci NOT NULL,
  `ruang` varchar(63) NOT NULL,
  `no_surat` varchar(63) NOT NULL,
  `waktu_mulai` datetime NOT NULL,
  `waktu_selesai` datetime NOT NULL,
  `status` enum('Menunggu Validasi','Aktif','Sudah Selesai') NOT NULL,
  `waktu_pesan` datetime NOT NULL,
  `waktu_validasi` datetime NOT NULL,
  `validator` varchar(63) CHARACTER SET utf8 COLLATE utf8_unicode_ci NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `ruangan`
--

INSERT INTO `ruangan` (`id`, `nim_mahasiswa`, `ruang`, `no_surat`, `waktu_mulai`, `waktu_selesai`, `status`, `waktu_pesan`, `waktu_validasi`, `validator`) VALUES
(10, 'K1315050', 'VICON 1', '12333', '2017-02-20 00:00:00', '2017-02-20 13:00:00', 'Aktif', '2017-02-19 09:00:00', '2017-02-19 07:00:00', 'Sugeng Sulistiyawan'),
(11, 'K1315051', 'VICON 1', '12333', '2017-02-20 01:20:00', '2017-02-21 01:25:00', 'Menunggu Validasi', '2017-02-19 20:24:00', '2017-02-19 20:24:00', '-'),
(12, 'K1315051', 'VICON 1', '23', '2017-02-21 02:10:00', '2017-02-22 03:10:00', 'Menunggu Validasi', '2017-02-19 21:15:00', '2017-02-19 21:15:00', '-'),
(13, 'K1315051', 'VICON 1', '121211', '2017-02-23 02:10:00', '2017-02-28 02:50:00', 'Aktif', '2017-02-19 22:10:00', '0000-00-00 00:00:00', 'Sugeng Sulistiyawan'),
(14, 'K1315051', 'VICON 1', '1221212', '1899-12-31 12:00:00', '1899-12-31 12:00:00', 'Menunggu Validasi', '2017-02-19 22:25:00', '0000-00-00 00:00:00', '-'),
(15, 'K1315051', 'VICON 1', '121212', '2017-02-21 06:25:00', '2017-02-16 10:25:00', 'Menunggu Validasi', '2017-02-19 22:25:00', '0000-00-00 00:00:00', '-'),
(16, 'K1315050', 'VICON 1', '123323', '2017-02-22 11:30:00', '2017-02-28 06:25:00', 'Menunggu Validasi', '2017-02-19 23:25:00', '0000-00-00 00:00:00', '-'),
(17, 'K1315060', 'VICON 1', '121223', '2017-02-22 01:05:00', '2017-02-28 06:50:00', 'Aktif', '2017-02-20 01:49:00', '2017-02-20 01:49:00', 'Sugeng Sulistiyawan'),
(18, 'K1315060', 'VICON 1', '121223', '2017-02-22 01:05:00', '2017-02-28 06:50:00', 'Aktif', '2017-02-20 01:50:00', '2017-02-20 01:50:00', 'Sugeng Sulistiyawan');

-- --------------------------------------------------------

--
-- Table structure for table `user`
--

CREATE TABLE `user` (
  `id` int(11) NOT NULL,
  `nim` varchar(8) COLLATE utf8_unicode_ci NOT NULL,
  `nama_depan` varchar(63) COLLATE utf8_unicode_ci NOT NULL,
  `nama_belakang` varchar(63) COLLATE utf8_unicode_ci NOT NULL,
  `prodi` varchar(63) COLLATE utf8_unicode_ci NOT NULL,
  `username` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `auth_key` varchar(32) COLLATE utf8_unicode_ci NOT NULL,
  `password_hash` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `password_reset_token` varchar(255) COLLATE utf8_unicode_ci DEFAULT NULL,
  `email` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `status` smallint(6) NOT NULL DEFAULT '10',
  `foto` varchar(256) COLLATE utf8_unicode_ci NOT NULL,
  `created_at` int(11) NOT NULL,
  `updated_at` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Dumping data for table `user`
--

INSERT INTO `user` (`id`, `nim`, `nama_depan`, `nama_belakang`, `prodi`, `username`, `auth_key`, `password_hash`, `password_reset_token`, `email`, `status`, `foto`, `created_at`, `updated_at`) VALUES
(5, 'K1315050', 'Sugeng', 'Sulistiyawan', 'PENDIDIKAN MATEMATIKA', 'ssimg', 'o7A2fPiC34HlUUqXOjvyZkn89h6SVZ4X', '$2y$13$ArHNDjcuv8oHyCSPeXlAW.ag5hxho8LpX7QoToOnKczOJE760kUfm', NULL, 'sugeng.sulistiyawan@gmail.com', 10, '@web/uploads/ssimg.png', 1487507672, 1487507672),
(6, 'K1315051', 'SS', 'IMG', 'PENDIDIKAN MATEMATIKA', 'ss_img', 'gMA_7eL2Zu5RRDM0-RJ42jQbEtyEO-pp', '$2y$13$fqm/2R/mHAM7PW70duE2CuqMebbEUzSqfQWMF.bjIc1.JADEOALbm', NULL, 'ssimg@gmail.com', 10, '@web/uploads/ss_img.png', 1487509792, 1487509792);

--
-- Indexes for dumped tables
--

--
-- Indexes for table `admin`
--
ALTER TABLE `admin`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `username` (`username`),
  ADD UNIQUE KEY `email` (`email`),
  ADD UNIQUE KEY `password_reset_token` (`password_reset_token`),
  ADD KEY `nama` (`nama`);

--
-- Indexes for table `fakultas`
--
ALTER TABLE `fakultas`
  ADD PRIMARY KEY (`id`),
  ADD KEY `id` (`id`);

--
-- Indexes for table `migration`
--
ALTER TABLE `migration`
  ADD PRIMARY KEY (`version`);

--
-- Indexes for table `prodi`
--
ALTER TABLE `prodi`
  ADD PRIMARY KEY (`id`),
  ADD KEY `id` (`id`),
  ADD KEY `id_fakultas` (`id_fakultas`),
  ADD KEY `nama` (`nama`);

--
-- Indexes for table `ruang`
--
ALTER TABLE `ruang`
  ADD PRIMARY KEY (`id`),
  ADD KEY `id` (`id`),
  ADD KEY `nama` (`nama`),
  ADD KEY `nama_2` (`nama`),
  ADD KEY `nama_3` (`nama`);

--
-- Indexes for table `ruangan`
--
ALTER TABLE `ruangan`
  ADD PRIMARY KEY (`id`),
  ADD KEY `id_ruang` (`ruang`),
  ADD KEY `nim_mahasiswa` (`nim_mahasiswa`),
  ADD KEY `nim_mahasiswa_2` (`nim_mahasiswa`),
  ADD KEY `id_ruang_2` (`ruang`),
  ADD KEY `ruang` (`ruang`),
  ADD KEY `validator` (`validator`);

--
-- Indexes for table `user`
--
ALTER TABLE `user`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `username` (`username`),
  ADD UNIQUE KEY `email` (`email`),
  ADD UNIQUE KEY `nim` (`nim`),
  ADD UNIQUE KEY `password_reset_token` (`password_reset_token`),
  ADD KEY `id_prodi` (`prodi`),
  ADD KEY `nim_2` (`nim`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `admin`
--
ALTER TABLE `admin`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;
--
-- AUTO_INCREMENT for table `fakultas`
--
ALTER TABLE `fakultas`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;
--
-- AUTO_INCREMENT for table `prodi`
--
ALTER TABLE `prodi`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;
--
-- AUTO_INCREMENT for table `ruang`
--
ALTER TABLE `ruang`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;
--
-- AUTO_INCREMENT for table `ruangan`
--
ALTER TABLE `ruangan`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=19;
--
-- AUTO_INCREMENT for table `user`
--
ALTER TABLE `user`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=7;
--
-- Constraints for dumped tables
--

--
-- Constraints for table `prodi`
--
ALTER TABLE `prodi`
  ADD CONSTRAINT `prodi_ibfk_1` FOREIGN KEY (`id_fakultas`) REFERENCES `fakultas` (`id`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Constraints for table `ruangan`
--
ALTER TABLE `ruangan`
  ADD CONSTRAINT `ruangan_ibfk_1` FOREIGN KEY (`ruang`) REFERENCES `ruang` (`nama`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Constraints for table `user`
--
ALTER TABLE `user`
  ADD CONSTRAINT `user_ibfk_1` FOREIGN KEY (`prodi`) REFERENCES `prodi` (`nama`) ON DELETE CASCADE ON UPDATE CASCADE;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
