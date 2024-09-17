-- phpMyAdmin SQL Dump
-- version 5.2.1
-- https://www.phpmyadmin.net/
--
-- Host: localhost
-- Generation Time: Sep 17, 2024 at 06:03 PM
-- Server version: 8.0.39
-- PHP Version: 8.3.9

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
CREATE TABLE IF NOT EXISTS `data_barang_eksternal` (
  `id` int NOT NULL AUTO_INCREMENT,
  `tanggal` date NOT NULL,
  `nama_driver` varchar(255) COLLATE utf8mb4_general_ci NOT NULL,
  `nama_suplier` varchar(255) COLLATE utf8mb4_general_ci NOT NULL,
  `keperluan` varchar(255) COLLATE utf8mb4_general_ci NOT NULL,
  `nama_jumlah_barang` varchar(255) COLLATE utf8mb4_general_ci NOT NULL,
  `no_kendaraan` varchar(255) COLLATE utf8mb4_general_ci NOT NULL,
  `jam_kedatangan` time NOT NULL,
  `keterangan` varchar(255) COLLATE utf8mb4_general_ci NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

-- --------------------------------------------------------

--
-- Table structure for table `data_barang_internal`
--

DROP TABLE IF EXISTS `data_barang_internal`;
CREATE TABLE IF NOT EXISTS `data_barang_internal` (
  `id` int NOT NULL AUTO_INCREMENT,
  `nama_pembawa` varchar(255) COLLATE utf8mb4_general_ci NOT NULL,
  `nama_jumlah_barang` varchar(255) COLLATE utf8mb4_general_ci NOT NULL,
  `tanggal` date NOT NULL,
  `keterangan` varchar(255) COLLATE utf8mb4_general_ci NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

-- --------------------------------------------------------

--
-- Table structure for table `data_mobil`
--

DROP TABLE IF EXISTS `data_mobil`;
CREATE TABLE IF NOT EXISTS `data_mobil` (
  `id` int NOT NULL AUTO_INCREMENT,
  `nama_driver` varchar(255) COLLATE utf8mb4_general_ci NOT NULL,
  `merek_kendaraan` varchar(255) COLLATE utf8mb4_general_ci NOT NULL,
  `km_awal` int NOT NULL,
  `km_akhir` int NOT NULL,
  `tujuan` varchar(255) COLLATE utf8mb4_general_ci NOT NULL,
  `keperluan` varchar(255) COLLATE utf8mb4_general_ci NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

-- --------------------------------------------------------

--
-- Table structure for table `data_pengunjung`
--

DROP TABLE IF EXISTS `data_pengunjung`;
CREATE TABLE IF NOT EXISTS `data_pengunjung` (
  `id` int NOT NULL AUTO_INCREMENT,
  `nama_pengunjung` varchar(255) COLLATE utf8mb4_general_ci NOT NULL,
  `nama_perusahaan` varchar(255) COLLATE utf8mb4_general_ci NOT NULL,
  `tanggal` date NOT NULL,
  `no_telpon` varchar(13) COLLATE utf8mb4_general_ci NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

-- --------------------------------------------------------

--
-- Table structure for table `pengguna`
--

DROP TABLE IF EXISTS `pengguna`;
CREATE TABLE IF NOT EXISTS `pengguna` (
  `id` int NOT NULL AUTO_INCREMENT,
  `id_user` int DEFAULT NULL,
  `email_user` varchar(255) COLLATE utf8mb4_general_ci DEFAULT NULL,
  `nama_user` varchar(255) COLLATE utf8mb4_general_ci NOT NULL,
  `role` varchar(255) COLLATE utf8mb4_general_ci NOT NULL,
  `password` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_general_ci NOT NULL,
  `token_login` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_general_ci DEFAULT NULL,
  PRIMARY KEY (`id`),
  UNIQUE KEY `token_login` (`token_login`),
  UNIQUE KEY `id-user` (`id_user`),
  UNIQUE KEY `email-user` (`email_user`),
  UNIQUE KEY `id_user` (`id_user`,`email_user`,`token_login`)
) ENGINE=InnoDB AUTO_INCREMENT=3 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `pengguna`
--

INSERT INTO `pengguna` (`id`, `id_user`, `email_user`, `nama_user`, `role`, `password`, `token_login`) VALUES
(2, NULL, 'andika@admin', 'Andika', 'Admin', '$2y$10$e5cMNe7GUr6AlWQ1zkqaXe8SKlqm1g/HlrucDpfMN.Gwt0TxKTBwG', NULL);

-- --------------------------------------------------------

--
-- Table structure for table `reset_sandi`
--

DROP TABLE IF EXISTS `reset_sandi`;
CREATE TABLE IF NOT EXISTS `reset_sandi` (
  `id` int NOT NULL AUTO_INCREMENT,
  `cari_pengguna` varchar(255) COLLATE utf8mb4_general_ci NOT NULL,
  `dibaca` tinyint(1) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
