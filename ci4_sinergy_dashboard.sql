-- phpMyAdmin SQL Dump
-- version 5.1.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Feb 25, 2022 at 05:28 AM
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
(4, 'Contoh Barang', 'Contoh Satuan', 'Contoh Tipe', 3, '2022-02-25 10:07:36', NULL);

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
  `id_permintaan` int(11) NOT NULL,
  `updated_at` datetime NOT NULL DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

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
(1, 'Contoh', 'aaa', '2022-02-25', 2),
(6, 'Contoh', 'cekcek', '2022-02-25', 2),
(7, 'Contoh', 'cek', '2022-02-25', 2),
(8, 'Contoh', 'ceklagi', '2022-02-25', 2),
(10, 'Contoh', 'cek note', '2022-02-25', 2),
(12, 'Contoh Barang', 'Contoh Note', '2022-02-25', 4),
(13, 'Contoh Barang', 'Contoh Note 2', '2022-02-25', 4),
(14, 'Contoh Barang', 'Contoh Note 2', '2022-02-25', 4);

-- --------------------------------------------------------

--
-- Table structure for table `operasionals`
--

CREATE TABLE `operasionals` (
  `id` int(10) UNSIGNED NOT NULL,
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
  `updated_at` datetime NOT NULL DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `operasionals`
--

INSERT INTO `operasionals` (`id`, `proyek`, `lokasi`, `w_berangkat`, `w_pulang`, `transport`, `tol`, `parkir`, `makan`, `lainnya`, `keterangan`, `status_gm`, `status_fm`, `created_at`, `updated_at`) VALUES
(1, 'Pengecatan Gedung', 'Depok', '2022-02-16', '2022-02-17', 1000000, 50000, 2000, 50000, '60000', 'Contoh keterangan', 1, 1, '2022-02-15 00:38:05', '2022-02-15 00:38:49'),
(2, 'Kampus IPB Baranangsiang', 'Bogor', '2022-02-15', '2022-02-26', 123, 123, 123, 123, '123', 'Contoh', 1, 1, '2022-02-15 00:43:39', '2022-02-15 00:44:38'),
(3, 'Instalasi Gedung', 'Depok', '2022-02-19', '2022-02-19', 100000, 50000, 10000, 50000, '50000', 'Cadangan Ban', 1, 1, '2022-02-17 21:59:29', '2022-02-17 21:59:53');

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
  `id_user` int(11) DEFAULT NULL,
  `created_at` datetime NOT NULL DEFAULT current_timestamp(),
  `updated_at` datetime NOT NULL DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `permintaanbarang`
--

INSERT INTO `permintaanbarang` (`id`, `proyek`, `lokasi`, `tanggal_pengajuan`, `tanggal_pengembalian`, `status_pengembalian`, `verified_gudang`, `verified_gm`, `note`, `id_user`, `created_at`, `updated_at`) VALUES
(34, '', '', '0000-00-00', '0000-00-00', 1, 1, 1, 'qa', NULL, '2022-02-23 12:00:30', '2022-02-22 23:00:30'),
(36, '', '', '0000-00-00', '0000-00-00', 1, 1, 1, 'cekcek', NULL, '2022-02-23 12:14:49', '2022-02-22 23:14:49');

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
  `password` varchar(100) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `users`
--

INSERT INTO `users` (`id`, `name`, `email`, `phone`, `role`, `password`) VALUES
(1, 'Arsyandi Pratama', 'arsyandi.develop@gmail.com', 2147483647, 'staff', '$2y$10$h/c9wVOK5pEZ75SQUlOvm.pEtY0arsVXkV0ehVORzzUWhmISHs8r2'),
(2, 'Mohammad Toha', 'paktoha@gmail.com', 2147483647, 'manager', '$2y$10$XFd3KkdzjcrGeCXpqPPxvO5v4PfZdUxfvHaiz/lh9bvwSUYnXOzWS'),
(3, 'Lina Nainggolan', 'bulina@gmail.com', 2147483647, 'finance', '$2y$10$7bBC4Ug.cj.kgcgREMLzUe2bhsZReh9sAhaiYk.gcSgJkQcwYvbtm'),
(9, 'Kahlil Gibran', 'mkgibran@gmail.com', 999999, 'gudang', '$2y$10$UUlg6aG.C.a.bBV//dVR3uOZlw0NOWclrgSd9h7mak9pRuZ2KWsdq');

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
  ADD KEY `id` (`id`);

--
-- Indexes for table `permintaanbarang`
--
ALTER TABLE `permintaanbarang`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `users`
--
ALTER TABLE `users`
  ADD KEY `id` (`id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `barang`
--
ALTER TABLE `barang`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- AUTO_INCREMENT for table `detailpermintaan`
--
ALTER TABLE `detailpermintaan`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=32;

--
-- AUTO_INCREMENT for table `migrations`
--
ALTER TABLE `migrations`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT for table `note`
--
ALTER TABLE `note`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=15;

--
-- AUTO_INCREMENT for table `operasionals`
--
ALTER TABLE `operasionals`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT for table `permintaanbarang`
--
ALTER TABLE `permintaanbarang`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=37;

--
-- AUTO_INCREMENT for table `users`
--
ALTER TABLE `users`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=10;

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
