-- phpMyAdmin SQL Dump
-- version 5.2.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Sep 09, 2024 at 05:49 PM
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
CREATE TABLE IF NOT EXISTS `data_barang_eksternal` (
  `id` int(255) NOT NULL AUTO_INCREMENT,
  `tanggal` date NOT NULL,
  `nama_driver` varchar(255) NOT NULL,
  `nama_suplier` varchar(255) NOT NULL,
  `keperluan` varchar(255) NOT NULL,
  `nama_jumlah_barang` varchar(255) NOT NULL,
  `no_kendaraan` varchar(255) NOT NULL,
  `jam_kedatangan` time NOT NULL,
  `keterangan` varchar(255) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

-- --------------------------------------------------------

--
-- Table structure for table `data_barang_internal`
--

DROP TABLE IF EXISTS `data_barang_internal`;
CREATE TABLE IF NOT EXISTS `data_barang_internal` (
  `id` int(255) NOT NULL AUTO_INCREMENT,
  `nama_pembawa` varchar(255) NOT NULL,
  `nama_jumlah_barang` varchar(255) NOT NULL,
  `tanggal` date NOT NULL,
  `keterangan` varchar(255) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

-- --------------------------------------------------------

--
-- Table structure for table `data_mobil`
--

DROP TABLE IF EXISTS `data_mobil`;
CREATE TABLE IF NOT EXISTS `data_mobil` (
  `id` int(255) NOT NULL AUTO_INCREMENT,
  `nama_driver` varchar(255) NOT NULL,
  `merek_kendaraan` varchar(255) NOT NULL,
  `km_awal` int(255) NOT NULL,
  `km_akhir` int(255) NOT NULL,
  `tujuan` varchar(255) NOT NULL,
  `keperluan` varchar(255) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

-- --------------------------------------------------------

--
-- Table structure for table `data_pengunjung`
--

DROP TABLE IF EXISTS `data_pengunjung`;
CREATE TABLE IF NOT EXISTS `data_pengunjung` (
  `id` int(255) NOT NULL AUTO_INCREMENT,
  `nama_pengunjung` varchar(255) NOT NULL,
  `nama_perusahaan` varchar(255) NOT NULL,
  `tanggal` date NOT NULL,
  `no_telpon` varchar(13) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

-- --------------------------------------------------------

--
-- Table structure for table `pengguna`
--

DROP TABLE IF EXISTS `pengguna`;
CREATE TABLE IF NOT EXISTS `pengguna` (
  `id` int(255) NOT NULL AUTO_INCREMENT,
  `id_user` int(255) DEFAULT NULL,
  `email_user` varchar(255) DEFAULT NULL,
  `nama_user` varchar(255) NOT NULL,
  `role` varchar(255) NOT NULL,
  `password` longtext NOT NULL,
  `token_login` longtext NOT NULL,
  PRIMARY KEY (`id`),
  UNIQUE KEY `id-user` (`id_user`),
  UNIQUE KEY `email-user` (`email_user`),
  UNIQUE KEY `id_user` (`id_user`,`email_user`,`token_login`) USING HASH,
  UNIQUE KEY `token_login` (`token_login`) USING HASH
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

-- --------------------------------------------------------

--
-- Table structure for table `reset_sandi`
--

DROP TABLE IF EXISTS `reset_sandi`;
CREATE TABLE IF NOT EXISTS `reset_sandi` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `cari_pengguna` varchar(255) NOT NULL,
  `dibaca` tinyint(1) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
