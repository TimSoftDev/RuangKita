-- phpMyAdmin SQL Dump
-- version 4.6.5.2
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Feb 28, 2017 at 09:21 PM
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
(4, 'Sugeng Sulistiyawan', 'ssimg', '_PbCNwEauCcB5OQ_muULpR6WkoYzwKAX', '$2y$13$nZ2viBptDXJmNnfUF7WGiO43k7Q/0DgHCQv0KkS70rt95tuDm/9oW', 'jLOaMaG4yssvLaPWZx1DeInzYCRPcopl_1487946764', 'sugeng.sulistiyawan@gmail.com', 10, 1487522606, 1487946764),
(5, 'Bima Satriya', 'bima', '3qEWe1t2nEETu49awmlsBW19POLguNFh', '$2y$13$4N67bQc7jlpAwmL/ZVzlnustaLm9Xd4U3hb484lz/JSCNW.50EUzK', NULL, 'bima@satria.cc', 10, 1487660724, 1487660724),
(6, 'SS', 'ss_img', 'Yhn-KnRbkgo1BI1IVZb7SPUgnC_7raE4', '$2y$13$XOermy6Zxv04SXM0iukXbuLdBmhaXMJAtFpG8QXEiNgFBABKsA5I6', NULL, 'ssimg@gmail.com', 10, 1487946898, 1487946898);

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
(3, 'FK', 'MBUH'),
(4, 'FH', 'KONO KAE'),
(5, 'TEKNIK', '-');

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
(3, 'VICON 1', 32),
(4, 'LAB 3', 32);

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
  `status` enum('Menunggu Validasi','Aktif') NOT NULL,
  `waktu_pesan` datetime NOT NULL,
  `waktu_validasi` datetime NOT NULL,
  `validator` varchar(63) CHARACTER SET utf8 COLLATE utf8_unicode_ci NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `ruangan`
--

INSERT INTO `ruangan` (`id`, `nim_mahasiswa`, `ruang`, `no_surat`, `waktu_mulai`, `waktu_selesai`, `status`, `waktu_pesan`, `waktu_validasi`, `validator`) VALUES
(2, 'K1315021', 'VICON 1', '1212', '2017-02-28 00:00:00', '2017-02-28 07:00:00', 'Aktif', '2017-02-28 00:00:00', '2017-02-27 17:56:00', 'SS'),
(36, 'K1315050', 'LAB 3', '121212', '2017-02-27 07:00:00', '2017-02-27 08:00:00', 'Aktif', '2017-02-26 21:27:00', '2017-02-26 22:11:00', 'SS'),
(37, 'K1315050', 'LAB 3', '121221211212', '2017-02-28 07:00:00', '2017-02-28 08:00:00', 'Aktif', '2017-02-26 21:31:00', '2017-02-27 17:56:00', 'SS'),
(38, 'K1315050', 'LAB 3', '1212211221', '2017-03-08 07:00:00', '2017-03-08 08:00:00', 'Menunggu Validasi', '2017-02-26 21:33:00', '2017-02-26 21:33:00', 'SS'),
(39, 'K1315050', 'VICON 1', 'cdsscd', '2017-02-27 07:00:00', '2017-02-27 08:00:00', 'Menunggu Validasi', '2017-02-26 22:25:00', '2017-02-26 22:25:00', 'SS'),
(40, 'K1315050', 'VICON 1', '12121212', '2017-02-28 07:00:00', '2017-02-28 08:00:00', 'Menunggu Validasi', '2017-02-26 22:26:00', '2017-02-26 22:26:00', 'SS'),
(41, 'K1315050', 'VICON 1', 'eewwqwq', '2017-02-27 07:00:00', '2017-02-27 08:00:00', 'Aktif', '2017-02-26 22:26:00', '2017-02-26 22:28:00', 'SS'),
(42, 'K1315050', 'VICON 1', '121212', '2017-02-27 07:00:00', '2017-02-27 08:00:00', 'Aktif', '2017-02-26 22:27:00', '2017-02-26 22:27:00', 'SS'),
(43, 'K1315051', 'LAB 3', '1121212', '2017-03-01 07:00:00', '2017-03-01 08:00:00', 'Menunggu Validasi', '2017-02-27 23:51:00', '0000-00-00 00:00:00', '-'),
(44, 'K1315050', 'LAB 3', '12121221212', '2017-03-09 07:00:00', '2017-03-09 08:00:00', 'Menunggu Validasi', '2017-02-28 17:26:00', '0000-00-00 00:00:00', '-');

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
(5, 'K1315050', 'Sugeng', 'Sulistiyawan', 'PENDIDIKAN MATEMATIKA', 'ssimg', 'o7A2fPiC34HlUUqXOjvyZkn89h6SVZ4X', '$2y$13$ArHNDjcuv8oHyCSPeXlAW.ag5hxho8LpX7QoToOnKczOJE760kUfm', 'Vb0ZHpZ7bVHqy7HC1GWCzdYziB6yb8LE_1488193177', 'sugeng.sulistiyawan@gmail.com', 10, '@web/uploads/ssimg.png', 1487507672, 1488193178),
(6, 'K1315051', 'SS', 'IMG', 'PENDIDIKAN MATEMATIKA', 'ss_img', 'gMA_7eL2Zu5RRDM0-RJ42jQbEtyEO-pp', '$2y$13$fqm/2R/mHAM7PW70duE2CuqMebbEUzSqfQWMF.bjIc1.JADEOALbm', NULL, 'ssimg@gmail.com', 10, '@web/uploads/ss_img.png', 1487509792, 1487509792),
(7, 'K1315060', 'Bima', 'Satria', 'PENDIDIKAN MATEMATIKA', 'bima', 'bDNpkoP8L783tqs3f5CMooFqjzAjwHnU', '$2y$13$agZYdEj3UzFSwiGji3mrTOmsug6lr8FCCcrZAJ6d8BqNU8TLjFHpy', NULL, 'bima@satria.cc', 10, '@web/uploads/bima.png', 1487660334, 1487660334),
(8, 'K1315021', 'Puji', 'Utomo', 'PENDIDIKAN MATEMATIKA', 'puji', 'EuUfG1RVLKKTPo-oqQ4Y8NSCJUldatcm', '$2y$13$RhS9tPpIm7iLFbvT/IuRf.PcfV0S.Uj.ue9E1EXmo55/310vg1oKa', NULL, 'puji@uto.mo', 10, '@web/uploads/puji.png', 1487731660, 1487731660),
(9, 'K131502A', 'SSS', 'Ssss', 'PENDIDIKAN MATEMATIKA', 'sasaasasa', 'XiwE0ho0VYXPqUiqBuUAsvKWSwxAQk1c', '$2y$13$aTCVxRC1qcQaGWztHfpKC.B1bcFxshKTYJt3hgyAVm1iUVPjcZQRq', NULL, 'sassasa@dsdsdsd.ddss', 10, '@web/uploads/sasaasasa.jpg', 1487784828, 1487784828),
(10, 'K1315022', 'Sasa', 'Asasas', 'MATEMATIKA', 'assaasas', 'QIBzoW8pEop9hlEY36q-hQhrbFmoakWx', '$2y$13$naAJxhrjATybAeEBwvaib.KvuSAO6UBG8s4ySECaB2Od6yvjysTHC', NULL, 'asassa@sasaas.saas', 10, '@web/uploads/assaasas.png', 1487818970, 1487818970),
(11, 'K1315062', 'Sugeng', 'Sulistiyawan', 'PENDIDIKAN MATEMATIKA', 'ssimg_', '-qmAzVjDksBJ6MJAqpeJWEey7PpXOXp4', '$2y$13$XDHvsU1pyuIrbZEouQCZmebUSTjKnPQaiQ.rJfFzGYrIYMrAEn9aW', NULL, 'saassad@sadsa.cac', 10, '@web/uploads/ssimg_.png', 1488181696, 1488181696);

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
  ADD KEY `nama` (`nama`),
  ADD KEY `nama_2` (`nama`);

--
-- Indexes for table `fakultas`
--
ALTER TABLE `fakultas`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `nama` (`nama`),
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
  ADD UNIQUE KEY `nama_2` (`nama`),
  ADD KEY `id` (`id`),
  ADD KEY `id_fakultas` (`id_fakultas`),
  ADD KEY `nama` (`nama`);

--
-- Indexes for table `ruang`
--
ALTER TABLE `ruang`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `nama_4` (`nama`),
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
  ADD KEY `validator` (`validator`),
  ADD KEY `validator_2` (`validator`);

--
-- Indexes for table `sesi_waktu`
--
ALTER TABLE `sesi_waktu`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `tampil` (`tampil`);

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
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=7;
--
-- AUTO_INCREMENT for table `fakultas`
--
ALTER TABLE `fakultas`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;
--
-- AUTO_INCREMENT for table `prodi`
--
ALTER TABLE `prodi`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;
--
-- AUTO_INCREMENT for table `ruang`
--
ALTER TABLE `ruang`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;
--
-- AUTO_INCREMENT for table `ruangan`
--
ALTER TABLE `ruangan`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=45;
--
-- AUTO_INCREMENT for table `sesi_waktu`
--
ALTER TABLE `sesi_waktu`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;
--
-- AUTO_INCREMENT for table `user`
--
ALTER TABLE `user`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=12;
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
  ADD CONSTRAINT `ruangan_ibfk_1` FOREIGN KEY (`ruang`) REFERENCES `ruang` (`nama`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `ruangan_ibfk_2` FOREIGN KEY (`nim_mahasiswa`) REFERENCES `user` (`nim`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Constraints for table `user`
--
ALTER TABLE `user`
  ADD CONSTRAINT `user_ibfk_1` FOREIGN KEY (`prodi`) REFERENCES `prodi` (`nama`) ON DELETE CASCADE ON UPDATE CASCADE;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
