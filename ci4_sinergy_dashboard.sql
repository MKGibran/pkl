-- phpMyAdmin SQL Dump
-- version 5.1.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Mar 18, 2022 at 05:48 AM
-- Server version: 10.4.22-MariaDB
-- PHP Version: 8.1.1

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `ci4_sinergy_dashboard`
--

-- --------------------------------------------------------

--
-- Table structure for table `barang`
--

CREATE TABLE `barang` (
  `id` int(11) NOT NULL,
  `nama_barang` varchar(100) NOT NULL,
  `satuan` varchar(50) NOT NULL,
  `tipe` varchar(50) NOT NULL,
  `kuantitas` int(11) NOT NULL,
  `update_at` datetime NOT NULL DEFAULT current_timestamp(),
  `id_user` int(11) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `barang`
--

INSERT INTO `barang` (`id`, `nama_barang`, `satuan`, `tipe`, `kuantitas`, `update_at`, `id_user`) VALUES
(2, 'Contoh', 'Contoh', 'Contoh', 2, '2022-02-18 10:07:11', NULL),
(4, 'Contoh Barang', 'Contoh Satuan', 'Contoh Tipe', 3, '2022-02-25 10:07:36', NULL),
(5, 'Handphone', 'Pcs', 'Samsung', 5, '2022-03-07 16:57:57', NULL);

-- --------------------------------------------------------

--
-- Table structure for table `detailpermintaan`
--

CREATE TABLE `detailpermintaan` (
  `id` int(11) NOT NULL,
  `nama_barang` varchar(100) NOT NULL,
  `tipe` varchar(50) NOT NULL,
  `satuan` varchar(50) NOT NULL,
  `kuantitas` int(11) NOT NULL,
  `jumlah_kerusakan` int(11) DEFAULT NULL,
  `id_permintaan` int(11) NOT NULL,
  `updated_at` date NOT NULL DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `detailpermintaan`
--

INSERT INTO `detailpermintaan` (`id`, `nama_barang`, `tipe`, `satuan`, `kuantitas`, `jumlah_kerusakan`, `id_permintaan`, `updated_at`) VALUES
(42, 'Contoh Barang', 'Contoh Tipe', 'Contoh Satuan', 1, 3, 43, '2022-03-04'),
(43, 'Contoh Barang', 'Contoh Tipe', 'Contoh Satuan', 2, 2, 44, '2022-03-06');

-- --------------------------------------------------------

--
-- Table structure for table `migrations`
--

CREATE TABLE `migrations` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `version` varchar(255) NOT NULL,
  `class` varchar(255) NOT NULL,
  `group` varchar(255) NOT NULL,
  `namespace` varchar(255) NOT NULL,
  `time` int(11) NOT NULL,
  `batch` int(10) UNSIGNED NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `migrations`
--

INSERT INTO `migrations` (`id`, `version`, `class`, `group`, `namespace`, `time`, `batch`) VALUES
(1, '2022-02-03-072238', 'App\\Database\\Migrations\\Users', 'default', 'App', 1643874478, 1),
(2, '2022-02-08-164431', 'App\\Database\\Migrations\\Operasional', 'default', 'App', 1644339245, 2);

-- --------------------------------------------------------

--
-- Table structure for table `note`
--

CREATE TABLE `note` (
  `id` int(11) NOT NULL,
  `nama_barang` varchar(50) NOT NULL,
  `note` text NOT NULL,
  `created_at` date NOT NULL DEFAULT current_timestamp(),
  `id_barang` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `note`
--

INSERT INTO `note` (`id`, `nama_barang`, `note`, `created_at`, `id_barang`) VALUES
(10, 'Contoh', 'cek note', '2022-02-25', 2),
(12, 'Contoh Barang', 'Contoh Note', '2022-02-25', 4),
(13, 'Contoh Barang', 'Contoh Note 2', '2022-02-25', 4),
(14, 'Contoh Barang', 'Contoh Note 2', '2022-02-25', 4),
(15, 'Handphone', 'Barang dibeli hari Senin', '2022-03-07', 5);

-- --------------------------------------------------------

--
-- Table structure for table `operasionals`
--

CREATE TABLE `operasionals` (
  `id` int(12) NOT NULL,
  `proyek` varchar(100) DEFAULT NULL,
  `lokasi` varchar(255) DEFAULT NULL,
  `w_berangkat` date DEFAULT NULL,
  `w_pulang` date DEFAULT NULL,
  `transport` int(11) DEFAULT NULL,
  `tol` int(11) DEFAULT NULL,
  `parkir` int(11) DEFAULT NULL,
  `makan` int(11) DEFAULT NULL,
  `lainnya` varchar(20) DEFAULT NULL,
  `keterangan` varchar(100) DEFAULT NULL,
  `status_gm` tinyint(1) DEFAULT 0,
  `status_fm` tinyint(1) DEFAULT 0,
  `created_at` datetime NOT NULL DEFAULT current_timestamp(),
  `updated_at` datetime NOT NULL DEFAULT current_timestamp(),
  `user_id` int(11) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `operasionals`
--

INSERT INTO `operasionals` (`id`, `proyek`, `lokasi`, `w_berangkat`, `w_pulang`, `transport`, `tol`, `parkir`, `makan`, `lainnya`, `keterangan`, `status_gm`, `status_fm`, `created_at`, `updated_at`, `user_id`) VALUES
(2, 'contoh 2', 'contoh 2', '2022-03-15', '2022-03-17', 4000, 4000, 400, 4000, '4000', 'contoh 2', 1, 1, '2022-03-10 05:54:08', '2022-03-10 05:54:08', 1);

-- --------------------------------------------------------

--
-- Table structure for table `permintaanbarang`
--

CREATE TABLE `permintaanbarang` (
  `id` int(11) NOT NULL,
  `proyek` varchar(100) NOT NULL,
  `lokasi` varchar(100) NOT NULL,
  `tanggal_pengajuan` date NOT NULL,
  `tanggal_pengembalian` date NOT NULL,
  `status_pengembalian` tinyint(1) NOT NULL DEFAULT 0,
  `verified_gudang` tinyint(1) NOT NULL DEFAULT 0,
  `verified_gm` tinyint(1) NOT NULL DEFAULT 0,
  `note` text DEFAULT NULL,
  `id_user` bigint(20) NOT NULL,
  `created_at` datetime NOT NULL DEFAULT current_timestamp(),
  `updated_at` datetime NOT NULL DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `permintaanbarang`
--

INSERT INTO `permintaanbarang` (`id`, `proyek`, `lokasi`, `tanggal_pengajuan`, `tanggal_pengembalian`, `status_pengembalian`, `verified_gudang`, `verified_gm`, `note`, `id_user`, `created_at`, `updated_at`) VALUES
(42, 'Contoh Proyek', 'Contoh Lokasi', '2022-03-22', '2022-03-25', 1, 1, 1, 'Contoh', 1, '2022-03-05 03:09:18', '2022-03-04 14:11:07'),
(43, 'Contoh 1', 'Contoh 1', '2022-03-16', '2022-03-18', 1, 1, 1, '', 1, '2022-03-05 03:20:16', '2022-03-04 14:21:19'),
(44, 'Contoh Proyek 2', 'Contoh Lokasi 2', '2022-03-19', '2022-03-26', 1, 1, 1, '', 1, '2022-03-06 19:33:13', '2022-03-06 10:58:35');

-- --------------------------------------------------------

--
-- Table structure for table `report_operasional`
--

CREATE TABLE `report_operasional` (
  `id` int(11) NOT NULL,
  `transport` int(100) NOT NULL,
  `tol` int(100) NOT NULL,
  `parkir` int(100) NOT NULL,
  `makan` int(100) NOT NULL,
  `lainnya` int(100) NOT NULL,
  `keterangan` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `report_operasional`
--

INSERT INTO `report_operasional` (`id`, `transport`, `tol`, `parkir`, `makan`, `lainnya`, `keterangan`) VALUES
(1, 20000, 2000, 2000, 2000, 200, '020dsa');

-- --------------------------------------------------------

--
-- Table structure for table `users`
--

CREATE TABLE `users` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `name` varchar(100) DEFAULT NULL,
  `email` varchar(255) NOT NULL,
  `phone` int(11) DEFAULT NULL,
  `role` varchar(100) DEFAULT 'staff',
  `password` varchar(100) NOT NULL,
  `photo` varchar(100) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `users`
--

INSERT INTO `users` (`id`, `name`, `email`, `phone`, `role`, `password`, `photo`) VALUES
(1, 'Arsyandi Pratama', 'arsyandi.develop@gmail.com', 123123123, 'staff', '$2y$10$ml6DSWwEoV86HKzn122FkOylsVGemUaBkVQ4P3lVuyOejXCqX1HAy', '1647414113_e6bc94803ea9552a2ac7.jpeg'),
(2, 'Mohammad Toha', 'paktoha@gmail.com', 2147483647, 'manager', '$2y$10$XFd3KkdzjcrGeCXpqPPxvO5v4PfZdUxfvHaiz/lh9bvwSUYnXOzWS', NULL),
(3, 'Lina Nainggolan', 'bulina@gmail.com', 2147483647, 'finance', '$2y$10$7bBC4Ug.cj.kgcgREMLzUe2bhsZReh9sAhaiYk.gcSgJkQcwYvbtm', '1647416305_70b81d4ffc3cd67c342c.jpeg'),
(11, 'Admin', 'admin@gmail.com', 123123123, 'admin', '$2y$10$imgzIkmu4/cAzaP29xET8.FauMuH4wB9ujsIkvaI3fW4bv6/f1dbO', NULL),
(17, 'Gibran', 'mkgibran@gmail.com', 111, 'gudang', '$2y$10$3Yqb4kkaHFripG.VFZ8f6u3ohxVeRfPACMwIxtw0C3vbeP5ROZC2a', '1647415661_98fb1550f57efca78039.jpeg');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `barang`
--
ALTER TABLE `barang`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `detailpermintaan`
--
ALTER TABLE `detailpermintaan`
  ADD PRIMARY KEY (`id`),
  ADD KEY `detailpermintaan_ibfk_1` (`id_permintaan`);

--
-- Indexes for table `migrations`
--
ALTER TABLE `migrations`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `note`
--
ALTER TABLE `note`
  ADD PRIMARY KEY (`id`),
  ADD KEY `id_barang` (`id_barang`);

--
-- Indexes for table `operasionals`
--
ALTER TABLE `operasionals`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `permintaanbarang`
--
ALTER TABLE `permintaanbarang`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `report_operasional`
--
ALTER TABLE `report_operasional`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `users`
--
ALTER TABLE `users`
  ADD PRIMARY KEY (`id`) USING BTREE;

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `barang`
--
ALTER TABLE `barang`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;

--
-- AUTO_INCREMENT for table `detailpermintaan`
--
ALTER TABLE `detailpermintaan`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=46;

--
-- AUTO_INCREMENT for table `migrations`
--
ALTER TABLE `migrations`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT for table `note`
--
ALTER TABLE `note`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=16;

--
-- AUTO_INCREMENT for table `operasionals`
--
ALTER TABLE `operasionals`
  MODIFY `id` int(12) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT for table `permintaanbarang`
--
ALTER TABLE `permintaanbarang`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=50;

--
-- AUTO_INCREMENT for table `report_operasional`
--
ALTER TABLE `report_operasional`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT for table `users`
--
ALTER TABLE `users`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=18;

--
-- Constraints for dumped tables
--

--
-- Constraints for table `detailpermintaan`
--
ALTER TABLE `detailpermintaan`
  ADD CONSTRAINT `detailpermintaan_ibfk_1` FOREIGN KEY (`id_permintaan`) REFERENCES `permintaanbarang` (`id`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Constraints for table `note`
--
ALTER TABLE `note`
  ADD CONSTRAINT `note_ibfk_1` FOREIGN KEY (`id_barang`) REFERENCES `barang` (`id`) ON DELETE CASCADE ON UPDATE CASCADE;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
