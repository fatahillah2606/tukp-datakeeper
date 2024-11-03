-- phpMyAdmin SQL Dump
-- version 5.2.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Nov 02, 2024 at 10:42 AM
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
-- Database: `tukp_datakeeper`
--
CREATE DATABASE IF NOT EXISTS `tukp_datakeeper` DEFAULT CHARACTER SET utf8mb4 COLLATE utf8mb4_general_ci;
USE `tukp_datakeeper`;

-- --------------------------------------------------------

--
-- Table structure for table `data_barang_eksternal`
--

DROP TABLE IF EXISTS `data_barang_eksternal`;
CREATE TABLE `data_barang_eksternal` (
  `id` int(11) NOT NULL,
  `tanggal` date NOT NULL,
  `nama_driver` varchar(255) NOT NULL,
  `nama_suplier` varchar(255) NOT NULL,
  `keperluan` varchar(255) NOT NULL,
  `nama_jumlah_barang` varchar(255) NOT NULL,
  `no_kendaraan` varchar(255) NOT NULL,
  `jam_kedatangan` time NOT NULL,
  `keterangan` varchar(255) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

-- --------------------------------------------------------

--
-- Table structure for table `data_barang_internal`
--

DROP TABLE IF EXISTS `data_barang_internal`;
CREATE TABLE `data_barang_internal` (
  `id` int(11) NOT NULL,
  `nama_pembawa` varchar(255) NOT NULL,
  `nama_jumlah_barang` varchar(255) NOT NULL,
  `tanggal` date NOT NULL,
  `keterangan` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

-- --------------------------------------------------------

--
-- Table structure for table `data_mobil`
--

DROP TABLE IF EXISTS `data_mobil`;
CREATE TABLE `data_mobil` (
  `id` int(11) NOT NULL,
  `tanggal` date NOT NULL,
  `nama_driver` varchar(255) NOT NULL,
  `merek_kendaraan` varchar(255) NOT NULL,
  `no_kendaraan` varchar(25) NOT NULL,
  `km_awal` int(11) NOT NULL,
  `km_akhir` int(11) NOT NULL,
  `tujuan` varchar(255) NOT NULL,
  `keperluan` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

-- --------------------------------------------------------

--
-- Table structure for table `data_pengunjung`
--

DROP TABLE IF EXISTS `data_pengunjung`;
CREATE TABLE `data_pengunjung` (
  `id` int(11) NOT NULL,
  `nama_pengunjung` varchar(255) NOT NULL,
  `nama_perusahaan` varchar(255) NOT NULL,
  `no_kendaraan` varchar(255) NOT NULL,
  `tanggal` date NOT NULL,
  `no_telpon` varchar(13) NOT NULL,
  `safety_induction` enum('Ya','Tidak') NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

-- --------------------------------------------------------

--
-- Table structure for table `pengguna`
--

DROP TABLE IF EXISTS `pengguna`;
CREATE TABLE `pengguna` (
  `id` int(11) NOT NULL,
  `id_user` int(11) DEFAULT NULL,
  `email_user` varchar(255) DEFAULT NULL,
  `nama_user` varchar(255) NOT NULL,
  `role` enum('Admin','User','Tamu') NOT NULL,
  `password` varchar(255) NOT NULL,
  `token_login` varchar(255) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `pengguna`
--

INSERT INTO `pengguna` (`id`, `id_user`, `email_user`, `nama_user`, `role`, `password`, `token_login`) VALUES
(2, NULL, 'andika@admin', 'Andika', 'Admin', '$2y$10$Rq1XpfSihvZ4ZnWpJiASHO8XkHxNCsiEYy2FIVsNFgTLgNk8.DNyW', '$2y$10$GoLPCwx79CXUvzkGbqy.ze.XqQzwkR3fSS6JigfALK8HM.JKFPEXi'),
(6, NULL, 'mei@raiden', 'Raiden Mei', 'Admin', '$2y$10$77RdRcSgvQ5jyTRI9y0UMuwH5qrbymOUvFrx0nDLvEH.wUNt582XC', '$2y$10$fEFPi/Y2ywZLTT7A/W.eKealLUXuF95dyloLK.E5.sDK5bZqjEf7e'),
(9, NULL, NULL, 'Tamu', 'Tamu', '$2y$10$LX7LImtD3NMs9rwAncE8r.7Wu7ejY/LHrcuP3RqsOTTpros34iY5S', '$2y$10$TA4Xk0ybs0awOuuDB.impOKB0/N3iRaKvrvpe.wTir7xqI3tTGy6m');

-- --------------------------------------------------------

--
-- Table structure for table `pengumuman`
--

DROP TABLE IF EXISTS `pengumuman`;
CREATE TABLE `pengumuman` (
  `id` int(11) NOT NULL,
  `judul_pengumuman` varchar(255) NOT NULL,
  `isi_pengumuman` text NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `pengumuman`
--

INSERT INTO `pengumuman` (`id`, `judul_pengumuman`, `isi_pengumuman`) VALUES
(2, 'Update 9/22/24', 'Fix non-unique id'),
(4, 'Update 9/26/24', 'Change the login system using sessions'),
(6, 'Update 9/28/24', '	\nUsers will be logged out if their password is reset.'),
(7, 'Update 10/8/2024', 'Added &quot;Nomor Kendaraan&quot; on &quot;Data Pengunjung&quot; and &quot;Data Kilometer Mobil&quot;'),
(18, 'Update 10/10/2024', 'Transition improvement'),
(19, 'Update 10/30/2024', 'Added Safety Induction check to &quot;Data Pengunjung&quot;'),
(20, 'Update 2/11/2024', 'Create a service record form and add a date column to the vehicle kilometers form.');

-- --------------------------------------------------------

--
-- Table structure for table `reset_sandi`
--

DROP TABLE IF EXISTS `reset_sandi`;
CREATE TABLE `reset_sandi` (
  `id` int(11) NOT NULL,
  `cari_pengguna` varchar(255) NOT NULL,
  `dibaca` tinyint(1) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

-- --------------------------------------------------------

--
-- Table structure for table `service_record`
--

DROP TABLE IF EXISTS `service_record`;
CREATE TABLE `service_record` (
  `id` int(11) NOT NULL,
  `tanggal` date NOT NULL,
  `nama_pelaksana` varchar(255) NOT NULL,
  `merek_kendaraan` varchar(255) NOT NULL,
  `no_kendaraan` varchar(25) NOT NULL,
  `km_service` int(11) NOT NULL,
  `nama_bengkel` varchar(255) NOT NULL,
  `rincian` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Indexes for dumped tables
--

--
-- Indexes for table `data_barang_eksternal`
--
ALTER TABLE `data_barang_eksternal`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `data_barang_internal`
--
ALTER TABLE `data_barang_internal`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `data_mobil`
--
ALTER TABLE `data_mobil`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `data_pengunjung`
--
ALTER TABLE `data_pengunjung`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `pengguna`
--
ALTER TABLE `pengguna`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `token_login` (`token_login`),
  ADD UNIQUE KEY `id-user` (`id_user`),
  ADD UNIQUE KEY `email-user` (`email_user`),
  ADD UNIQUE KEY `id_user` (`id_user`,`email_user`,`token_login`);

--
-- Indexes for table `pengumuman`
--
ALTER TABLE `pengumuman`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `reset_sandi`
--
ALTER TABLE `reset_sandi`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `service_record`
--
ALTER TABLE `service_record`
  ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `data_barang_eksternal`
--
ALTER TABLE `data_barang_eksternal`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `data_barang_internal`
--
ALTER TABLE `data_barang_internal`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `data_mobil`
--
ALTER TABLE `data_mobil`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `data_pengunjung`
--
ALTER TABLE `data_pengunjung`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `pengguna`
--
ALTER TABLE `pengguna`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=10;

--
-- AUTO_INCREMENT for table `pengumuman`
--
ALTER TABLE `pengumuman`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=21;

--
-- AUTO_INCREMENT for table `reset_sandi`
--
ALTER TABLE `reset_sandi`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `service_record`
--
ALTER TABLE `service_record`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
