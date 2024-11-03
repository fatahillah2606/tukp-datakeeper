-- phpMyAdmin SQL Dump
-- version 5.2.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Nov 02, 2024 at 11:02 AM
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

--
-- Dumping data for table `data_barang_eksternal`
--

INSERT INTO `data_barang_eksternal` (`id`, `tanggal`, `nama_driver`, `nama_suplier`, `keperluan`, `nama_jumlah_barang`, `no_kendaraan`, `jam_kedatangan`, `keterangan`) VALUES
(3, '2024-11-02', 'asd', 'asd', 'asd', '<li>asd, 123</li><li>dsa, 321</li>', 'asd', '16:13:00', 'asd'),
(4, '2025-03-19', 'Driver_6', 'PT. Jaya Abadi', 'Pengiriman Barang', '<li>Minyak, 500</li>', 'B1637', '12:17:32', 'Barang diterima dalam kondisi baik'),
(5, '2025-02-04', 'Driver_4', 'PT. Jaya Abadi', 'Pengiriman Barang', '<li>Beras, 500</li>', 'B6235', '00:07:21', 'Barang diterima dalam kondisi baik'),
(6, '2025-09-28', 'Driver_25', 'PT. Jaya Abadi', 'Pengiriman Barang', '<li>Box, 100</li>', 'B9855', '20:01:12', 'Barang diterima dalam kondisi baik'),
(7, '2025-10-03', 'Driver_52', 'PT. Jaya Abadi', 'Pengiriman Barang', '<li>Box, 100</li>', 'B4937', '18:31:04', 'Barang diterima dalam kondisi baik'),
(8, '2025-01-11', 'Driver_44', 'PT. Mitra Sejati', 'Pengiriman Barang', '<li>Box, 100</li>', 'B6758', '20:53:46', 'Barang diterima dalam kondisi baik'),
(9, '2025-03-11', 'Driver_1', 'CV. Makmur Bersama', 'Pengiriman Barang', '<li>Minyak, 500</li>', 'B5859', '15:42:01', 'Barang diterima dalam kondisi baik'),
(10, '2025-01-17', 'Driver_49', 'CV. Makmur Bersama', 'Pengiriman Barang', '<li>Beras, 500</li>', 'B4160', '23:01:48', 'Barang diterima dalam kondisi baik'),
(11, '2025-01-30', 'Driver_6', 'CV. Makmur Bersama', 'Pengiriman Barang', '<li>Beras, 500</li>', 'B1337', '13:32:25', 'Barang diterima dalam kondisi baik'),
(12, '2025-03-12', 'Driver_15', 'PT. Jaya Abadi', 'Pengiriman Barang', '<li>Unit mesin, 50</li>', 'B5145', '19:38:30', 'Barang diterima dalam kondisi baik'),
(13, '2024-11-12', 'Driver_71', 'PT. Mitra Sejati', 'Pengiriman Barang', '<li>Minyak, 500</li>', 'B1115', '18:57:49', 'Barang diterima dalam kondisi baik'),
(14, '2025-06-04', 'Driver_8', 'PT. Jaya Abadi', 'Pengiriman Barang', '<li>Minyak, 500</li>', 'B3695', '23:41:29', 'Barang diterima dalam kondisi baik'),
(15, '2025-03-29', 'Driver_28', 'CV. Makmur Bersama', 'Pengiriman Barang', '<li>Beras, 500</li>', 'B6126', '13:19:58', 'Barang diterima dalam kondisi baik'),
(16, '2024-12-09', 'Driver_89', 'PT. Jaya Abadi', 'Pengiriman Barang', '<li>Unit mesin, 50</li>', 'B4636', '13:54:23', 'Barang diterima dalam kondisi baik'),
(17, '2025-02-06', 'Driver_62', 'CV. Makmur Bersama', 'Pengiriman Barang', '<li>Beras, 500</li>', 'B9460', '17:36:45', 'Barang diterima dalam kondisi baik'),
(18, '2024-12-27', 'Driver_66', 'PT. Jaya Abadi', 'Pengiriman Barang', '<li>Minyak, 500</li>', 'B4072', '16:42:31', 'Barang diterima dalam kondisi baik'),
(19, '2025-03-08', 'Driver_46', 'PT. Jaya Abadi', 'Pengiriman Barang', '<li>Box, 100</li>', 'B7677', '11:24:44', 'Barang diterima dalam kondisi baik'),
(20, '2025-03-17', 'Driver_52', 'PT. Mitra Sejati', 'Pengiriman Barang', '<li>Box, 100</li>', 'B1515', '14:38:55', 'Barang diterima dalam kondisi baik'),
(21, '2025-08-27', 'Driver_38', 'CV. Makmur Bersama', 'Pengiriman Barang', '<li>Unit mesin, 50</li>', 'B2299', '11:17:41', 'Barang diterima dalam kondisi baik'),
(22, '2024-12-17', 'Driver_3', 'PT. Jaya Abadi', 'Pengiriman Barang', '<li>Minyak, 500</li>', 'B1296', '14:15:34', 'Barang diterima dalam kondisi baik'),
(23, '2025-08-07', 'Driver_65', 'CV. Makmur Bersama', 'Pengiriman Barang', '<li>Minyak, 500</li>', 'B6859', '19:08:42', 'Barang diterima dalam kondisi baik'),
(24, '2025-04-17', 'Driver_18', 'PT. Mitra Sejati', 'Pengiriman Barang', '<li>Box, 100</li>', 'B5569', '15:37:17', 'Barang diterima dalam kondisi baik'),
(25, '2025-02-01', 'Driver_98', 'PT. Mitra Sejati', 'Pengiriman Barang', '<li>Box, 100</li>', 'B8815', '15:05:43', 'Barang diterima dalam kondisi baik'),
(26, '2025-04-20', 'Driver_92', 'CV. Makmur Bersama', 'Pengiriman Barang', '<li>Box, 100</li>', 'B9110', '20:28:34', 'Barang diterima dalam kondisi baik'),
(27, '2025-09-10', 'Driver_23', 'PT. Jaya Abadi', 'Pengiriman Barang', '<li>Beras, 500</li>', 'B2277', '21:49:59', 'Barang diterima dalam kondisi baik'),
(28, '2025-02-12', 'Driver_28', 'CV. Makmur Bersama', 'Pengiriman Barang', '<li>Unit mesin, 50</li>', 'B5339', '14:11:31', 'Barang diterima dalam kondisi baik'),
(29, '2025-07-06', 'Driver_28', 'CV. Makmur Bersama', 'Pengiriman Barang', '<li>Minyak, 500</li>', 'B8256', '18:37:27', 'Barang diterima dalam kondisi baik'),
(30, '2025-10-14', 'Driver_29', 'CV. Makmur Bersama', 'Pengiriman Barang', '<li>Minyak, 500</li>', 'B4507', '15:51:18', 'Barang diterima dalam kondisi baik'),
(31, '2024-12-06', 'Driver_51', 'CV. Makmur Bersama', 'Pengiriman Barang', '<li>Box, 100</li>', 'B3501', '00:56:46', 'Barang diterima dalam kondisi baik'),
(32, '2025-03-29', 'Driver_91', 'PT. Jaya Abadi', 'Pengiriman Barang', '<li>Unit mesin, 50</li>', 'B9592', '14:01:37', 'Barang diterima dalam kondisi baik'),
(33, '2025-10-10', 'Driver_72', 'CV. Makmur Bersama', 'Pengiriman Barang', '<li>Beras, 500</li>', 'B2464', '00:17:42', 'Barang diterima dalam kondisi baik'),
(34, '2025-06-02', 'Driver_31', 'CV. Makmur Bersama', 'Pengiriman Barang', '<li>Beras, 500</li>', 'B3948', '20:08:58', 'Barang diterima dalam kondisi baik'),
(35, '2025-09-02', 'Driver_48', 'PT. Jaya Abadi', 'Pengiriman Barang', '<li>Beras, 500</li>', 'B8403', '15:49:26', 'Barang diterima dalam kondisi baik'),
(36, '2025-07-11', 'Driver_25', 'PT. Mitra Sejati', 'Pengiriman Barang', '<li>Unit mesin, 50</li>', 'B4331', '13:42:40', 'Barang diterima dalam kondisi baik'),
(37, '2025-10-20', 'Driver_23', 'PT. Mitra Sejati', 'Pengiriman Barang', '<li>Minyak, 500</li>', 'B5533', '19:03:25', 'Barang diterima dalam kondisi baik'),
(38, '2025-06-07', 'Driver_1', 'PT. Mitra Sejati', 'Pengiriman Barang', '<li>Unit mesin, 50</li>', 'B1833', '20:36:52', 'Barang diterima dalam kondisi baik'),
(39, '2025-01-05', 'Driver_96', 'PT. Mitra Sejati', 'Pengiriman Barang', '<li>Unit mesin, 50</li>', 'B5295', '12:59:42', 'Barang diterima dalam kondisi baik'),
(40, '2025-01-28', 'Driver_44', 'PT. Mitra Sejati', 'Pengiriman Barang', '<li>Beras, 500</li>', 'B2628', '14:29:18', 'Barang diterima dalam kondisi baik'),
(41, '2025-02-20', 'Driver_23', 'PT. Mitra Sejati', 'Pengiriman Barang', '<li>Beras, 500</li>', 'B4213', '14:06:20', 'Barang diterima dalam kondisi baik'),
(42, '2025-04-19', 'Driver_58', 'PT. Mitra Sejati', 'Pengiriman Barang', '<li>Minyak, 500</li>', 'B9441', '17:52:01', 'Barang diterima dalam kondisi baik'),
(43, '2025-01-29', 'Driver_4', 'PT. Jaya Abadi', 'Pengiriman Barang', '<li>Box, 100</li>', 'B4917', '15:20:21', 'Barang diterima dalam kondisi baik'),
(44, '2025-06-24', 'Driver_37', 'PT. Jaya Abadi', 'Pengiriman Barang', '<li>Minyak, 500</li>', 'B5519', '17:01:30', 'Barang diterima dalam kondisi baik'),
(45, '2025-07-09', 'Driver_49', 'PT. Mitra Sejati', 'Pengiriman Barang', '<li>Beras, 500</li>', 'B2935', '13:32:10', 'Barang diterima dalam kondisi baik'),
(46, '2025-01-16', 'Driver_16', 'PT. Jaya Abadi', 'Pengiriman Barang', '<li>Beras, 500</li>', 'B7804', '20:47:04', 'Barang diterima dalam kondisi baik'),
(47, '2025-02-02', 'Driver_17', 'PT. Mitra Sejati', 'Pengiriman Barang', '<li>Box, 100</li>', 'B2110', '19:43:37', 'Barang diterima dalam kondisi baik'),
(48, '2025-05-16', 'Driver_44', 'PT. Jaya Abadi', 'Pengiriman Barang', '<li>Beras, 500</li>', 'B3649', '00:14:31', 'Barang diterima dalam kondisi baik'),
(49, '2025-08-11', 'Driver_93', 'CV. Makmur Bersama', 'Pengiriman Barang', '<li>Unit mesin, 50</li>', 'B8813', '23:25:34', 'Barang diterima dalam kondisi baik'),
(50, '2025-06-23', 'Driver_98', 'CV. Makmur Bersama', 'Pengiriman Barang', '<li>Minyak, 500</li>', 'B4567', '12:36:37', 'Barang diterima dalam kondisi baik'),
(51, '2025-06-13', 'Driver_93', 'PT. Mitra Sejati', 'Pengiriman Barang', '<li>Beras, 500</li>', 'B7421', '15:48:14', 'Barang diterima dalam kondisi baik'),
(52, '2024-11-09', 'Driver_71', 'PT. Jaya Abadi', 'Pengiriman Barang', '<li>Unit mesin, 50</li>', 'B2723', '21:22:50', 'Barang diterima dalam kondisi baik'),
(53, '2025-05-03', 'Driver_22', 'PT. Jaya Abadi', 'Pengiriman Barang', '<li>Minyak, 500</li>', 'B1583', '16:17:45', 'Barang diterima dalam kondisi baik'),
(54, '2025-03-23', 'Driver_44', 'PT. Mitra Sejati', 'Pengiriman Barang', '<li>Unit mesin, 50</li>', 'B8971', '23:37:08', 'Barang diterima dalam kondisi baik'),
(55, '2025-06-21', 'Driver_69', 'CV. Makmur Bersama', 'Pengiriman Barang', '<li>Minyak, 500</li>', 'B7511', '20:54:04', 'Barang diterima dalam kondisi baik'),
(56, '2025-01-23', 'Driver_64', 'PT. Jaya Abadi', 'Pengiriman Barang', '<li>Unit mesin, 50</li>', 'B1288', '17:32:14', 'Barang diterima dalam kondisi baik'),
(57, '2025-09-24', 'Driver_71', 'CV. Makmur Bersama', 'Pengiriman Barang', '<li>Unit mesin, 50</li>', 'B2743', '20:31:47', 'Barang diterima dalam kondisi baik'),
(58, '2025-01-27', 'Driver_45', 'CV. Makmur Bersama', 'Pengiriman Barang', '<li>Minyak, 500</li>', 'B8785', '12:41:48', 'Barang diterima dalam kondisi baik'),
(59, '2025-07-08', 'Driver_71', 'PT. Mitra Sejati', 'Pengiriman Barang', '<li>Unit mesin, 50</li>', 'B3845', '00:41:20', 'Barang diterima dalam kondisi baik'),
(60, '2025-05-23', 'Driver_46', 'PT. Jaya Abadi', 'Pengiriman Barang', '<li>Beras, 500</li>', 'B2317', '18:06:18', 'Barang diterima dalam kondisi baik'),
(61, '2025-05-15', 'Driver_58', 'CV. Makmur Bersama', 'Pengiriman Barang', '<li>Box, 100</li>', 'B1102', '22:34:56', 'Barang diterima dalam kondisi baik'),
(62, '2025-09-09', 'Driver_19', 'PT. Jaya Abadi', 'Pengiriman Barang', '<li>Unit mesin, 50</li>', 'B6164', '19:29:56', 'Barang diterima dalam kondisi baik'),
(63, '2025-06-02', 'Driver_66', 'PT. Jaya Abadi', 'Pengiriman Barang', '<li>Box, 100</li>', 'B6316', '12:32:14', 'Barang diterima dalam kondisi baik'),
(64, '2024-12-23', 'Driver_13', 'CV. Makmur Bersama', 'Pengiriman Barang', '<li>Minyak, 500</li>', 'B4911', '00:34:58', 'Barang diterima dalam kondisi baik'),
(65, '2025-08-09', 'Driver_52', 'PT. Jaya Abadi', 'Pengiriman Barang', '<li>Unit mesin, 50</li>', 'B5324', '19:43:23', 'Barang diterima dalam kondisi baik'),
(66, '2025-10-22', 'Driver_100', 'PT. Jaya Abadi', 'Pengiriman Barang', '<li>Unit mesin, 50</li>', 'B8141', '13:44:49', 'Barang diterima dalam kondisi baik'),
(67, '2025-03-27', 'Driver_14', 'CV. Makmur Bersama', 'Pengiriman Barang', '<li>Minyak, 500</li>', 'B4795', '00:21:43', 'Barang diterima dalam kondisi baik'),
(68, '2025-01-04', 'Driver_96', 'PT. Jaya Abadi', 'Pengiriman Barang', '<li>Minyak, 500</li>', 'B9619', '13:44:57', 'Barang diterima dalam kondisi baik'),
(69, '2025-08-02', 'Driver_86', 'PT. Mitra Sejati', 'Pengiriman Barang', '<li>Beras, 500</li>', 'B1187', '21:05:08', 'Barang diterima dalam kondisi baik'),
(70, '2025-04-22', 'Driver_20', 'CV. Makmur Bersama', 'Pengiriman Barang', '<li>Beras, 500</li>', 'B3382', '12:18:31', 'Barang diterima dalam kondisi baik'),
(71, '2025-08-14', 'Driver_90', 'PT. Jaya Abadi', 'Pengiriman Barang', '<li>Unit mesin, 50</li>', 'B5921', '17:25:33', 'Barang diterima dalam kondisi baik'),
(72, '2025-10-11', 'Driver_59', 'PT. Mitra Sejati', 'Pengiriman Barang', '<li>Box, 100</li>', 'B7852', '18:56:52', 'Barang diterima dalam kondisi baik'),
(73, '2025-05-15', 'Driver_19', 'PT. Mitra Sejati', 'Pengiriman Barang', '<li>Minyak, 500</li>', 'B5138', '16:49:36', 'Barang diterima dalam kondisi baik'),
(74, '2025-05-18', 'Driver_69', 'PT. Jaya Abadi', 'Pengiriman Barang', '<li>Box, 100</li>', 'B6592', '16:10:13', 'Barang diterima dalam kondisi baik'),
(75, '2025-06-08', 'Driver_32', 'PT. Mitra Sejati', 'Pengiriman Barang', '<li>Box, 100</li>', 'B3665', '17:14:20', 'Barang diterima dalam kondisi baik'),
(76, '2025-09-01', 'Driver_9', 'PT. Mitra Sejati', 'Pengiriman Barang', '<li>Unit mesin, 50</li>', 'B8794', '21:02:09', 'Barang diterima dalam kondisi baik'),
(77, '2025-01-14', 'Driver_11', 'CV. Makmur Bersama', 'Pengiriman Barang', '<li>Minyak, 500</li>', 'B2206', '17:44:57', 'Barang diterima dalam kondisi baik'),
(78, '2025-05-03', 'Driver_11', 'PT. Jaya Abadi', 'Pengiriman Barang', '<li>Beras, 500</li>', 'B1235', '21:01:54', 'Barang diterima dalam kondisi baik'),
(79, '2024-11-23', 'Driver_52', 'CV. Makmur Bersama', 'Pengiriman Barang', '<li>Unit mesin, 50</li>', 'B7923', '18:35:52', 'Barang diterima dalam kondisi baik'),
(80, '2025-10-22', 'Driver_7', 'PT. Mitra Sejati', 'Pengiriman Barang', '<li>Minyak, 500</li>', 'B8194', '11:34:38', 'Barang diterima dalam kondisi baik'),
(81, '2025-03-22', 'Driver_96', 'PT. Jaya Abadi', 'Pengiriman Barang', '<li>Beras, 500</li>', 'B7522', '18:45:47', 'Barang diterima dalam kondisi baik'),
(82, '2025-09-03', 'Driver_33', 'PT. Mitra Sejati', 'Pengiriman Barang', '<li>Box, 100</li>', 'B3102', '20:16:56', 'Barang diterima dalam kondisi baik'),
(83, '2025-08-09', 'Driver_28', 'PT. Mitra Sejati', 'Pengiriman Barang', '<li>Minyak, 500</li>', 'B3888', '16:17:55', 'Barang diterima dalam kondisi baik'),
(84, '2025-03-03', 'Driver_2', 'PT. Mitra Sejati', 'Pengiriman Barang', '<li>Beras, 500</li>', 'B1560', '20:17:35', 'Barang diterima dalam kondisi baik'),
(85, '2025-06-07', 'Driver_64', 'PT. Jaya Abadi', 'Pengiriman Barang', '<li>Minyak, 500</li>', 'B5173', '15:32:28', 'Barang diterima dalam kondisi baik'),
(86, '2025-10-12', 'Driver_35', 'PT. Jaya Abadi', 'Pengiriman Barang', '<li>Beras, 500</li>', 'B1301', '19:26:00', 'Barang diterima dalam kondisi baik'),
(87, '2024-12-17', 'Driver_87', 'CV. Makmur Bersama', 'Pengiriman Barang', '<li>Minyak, 500</li>', 'B4224', '22:19:21', 'Barang diterima dalam kondisi baik'),
(88, '2025-09-01', 'Driver_17', 'PT. Jaya Abadi', 'Pengiriman Barang', '<li>Minyak, 500</li>', 'B2666', '14:58:56', 'Barang diterima dalam kondisi baik'),
(89, '2024-12-25', 'Driver_10', 'PT. Jaya Abadi', 'Pengiriman Barang', '<li>Minyak, 500</li>', 'B6592', '13:49:30', 'Barang diterima dalam kondisi baik'),
(90, '2025-06-01', 'Driver_44', 'PT. Jaya Abadi', 'Pengiriman Barang', '<li>Box, 100</li>', 'B3255', '21:34:49', 'Barang diterima dalam kondisi baik'),
(91, '2025-04-07', 'Driver_6', 'PT. Jaya Abadi', 'Pengiriman Barang', '<li>Box, 100</li>', 'B4505', '20:38:51', 'Barang diterima dalam kondisi baik'),
(92, '2024-12-30', 'Driver_55', 'CV. Makmur Bersama', 'Pengiriman Barang', '<li>Minyak, 500</li>', 'B4296', '19:38:55', 'Barang diterima dalam kondisi baik'),
(93, '2025-01-09', 'Driver_95', 'CV. Makmur Bersama', 'Pengiriman Barang', '<li>Minyak, 500</li>', 'B7655', '18:28:46', 'Barang diterima dalam kondisi baik'),
(94, '2025-09-12', 'Driver_47', 'PT. Mitra Sejati', 'Pengiriman Barang', '<li>Beras, 500</li>', 'B5763', '19:58:13', 'Barang diterima dalam kondisi baik'),
(95, '2025-01-01', 'Driver_88', 'PT. Mitra Sejati', 'Pengiriman Barang', '<li>Beras, 500</li>', 'B3648', '16:10:02', 'Barang diterima dalam kondisi baik'),
(96, '2025-06-08', 'Driver_87', 'PT. Jaya Abadi', 'Pengiriman Barang', '<li>Box, 100</li>', 'B7872', '13:06:09', 'Barang diterima dalam kondisi baik'),
(97, '2025-09-09', 'Driver_52', 'PT. Jaya Abadi', 'Pengiriman Barang', '<li>Unit mesin, 50</li>', 'B9944', '21:28:30', 'Barang diterima dalam kondisi baik'),
(98, '2025-09-17', 'Driver_30', 'CV. Makmur Bersama', 'Pengiriman Barang', '<li>Beras, 500</li>', 'B6921', '12:03:51', 'Barang diterima dalam kondisi baik'),
(99, '2025-05-19', 'Driver_98', 'PT. Mitra Sejati', 'Pengiriman Barang', '<li>Beras, 500</li>', 'B8948', '15:48:44', 'Barang diterima dalam kondisi baik'),
(100, '2024-11-19', 'Driver_23', 'PT. Mitra Sejati', 'Pengiriman Barang', '<li>Box, 100</li>', 'B3778', '11:46:50', 'Barang diterima dalam kondisi baik'),
(101, '2024-11-03', 'Driver_77', 'PT. Jaya Abadi', 'Pengiriman Barang', '<li>Unit mesin, 50</li>', 'B7039', '00:48:37', 'Barang diterima dalam kondisi baik'),
(102, '2025-10-13', 'Driver_1', 'PT. Mitra Sejati', 'Pengiriman Barang', '<li>Box, 100</li>', 'B9114', '22:47:53', 'Barang diterima dalam kondisi baik'),
(103, '2025-04-14', 'Driver_86', 'PT. Jaya Abadi', 'Pengiriman Barang', '<li>Minyak, 500</li>', 'B4122', '17:11:54', 'Barang diterima dalam kondisi baik');

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

--
-- Dumping data for table `data_barang_internal`
--

INSERT INTO `data_barang_internal` (`id`, `nama_pembawa`, `nama_jumlah_barang`, `tanggal`, `keterangan`) VALUES
(1, 'asd', '<li>asd, 12</li><li>dsa, 12</li>', '2024-11-02', 'asd'),
(2, 'Driver_51', '<li>Minyak, 500</li>', '2025-03-12', 'Barang diterima dalam kondisi baik'),
(3, 'Driver_92', '<li>Beras, 500</li>', '2025-09-10', 'Barang diterima dalam kondisi baik'),
(4, 'Driver_8', '<li>Box, 100</li>', '2025-09-12', 'Barang diterima dalam kondisi baik'),
(5, 'Driver_49', '<li>Beras, 500</li>', '2025-02-13', 'Barang diterima dalam kondisi baik'),
(6, 'Driver_25', '<li>Unit mesin, 50</li>', '2025-02-24', 'Barang diterima dalam kondisi baik'),
(7, 'Driver_9', '<li>Minyak, 500</li>', '2025-05-17', 'Barang diterima dalam kondisi baik'),
(8, 'Driver_96', '<li>Beras, 500</li>', '2025-02-02', 'Barang diterima dalam kondisi baik'),
(9, 'Driver_60', '<li>Unit mesin, 50</li>', '2025-05-23', 'Barang diterima dalam kondisi baik'),
(10, 'Driver_12', '<li>Unit mesin, 50</li>', '2025-10-31', 'Barang diterima dalam kondisi baik'),
(11, 'Driver_50', '<li>Box, 100</li>', '2024-12-11', 'Barang diterima dalam kondisi baik'),
(12, 'Driver_34', '<li>Unit mesin, 50</li>', '2024-11-15', 'Barang diterima dalam kondisi baik'),
(13, 'Driver_19', '<li>Beras, 500</li>', '2024-11-10', 'Barang diterima dalam kondisi baik'),
(14, 'Driver_23', '<li>Box, 100</li>', '2025-03-06', 'Barang diterima dalam kondisi baik'),
(15, 'Driver_10', '<li>Minyak, 500</li>', '2025-10-20', 'Barang diterima dalam kondisi baik'),
(16, 'Driver_58', '<li>Minyak, 500</li>', '2025-10-12', 'Barang diterima dalam kondisi baik'),
(17, 'Driver_85', '<li>Minyak, 500</li>', '2025-06-02', 'Barang diterima dalam kondisi baik'),
(18, 'Driver_25', '<li>Unit mesin, 50</li>', '2025-06-20', 'Barang diterima dalam kondisi baik'),
(19, 'Driver_36', '<li>Beras, 500</li>', '2025-02-05', 'Barang diterima dalam kondisi baik'),
(20, 'Driver_31', '<li>Minyak, 500</li>', '2024-12-27', 'Barang diterima dalam kondisi baik'),
(21, 'Driver_26', '<li>Minyak, 500</li>', '2025-10-09', 'Barang diterima dalam kondisi baik'),
(22, 'Driver_31', '<li>Minyak, 500</li>', '2025-03-07', 'Barang diterima dalam kondisi baik'),
(23, 'Driver_21', '<li>Unit mesin, 50</li>', '2025-03-23', 'Barang diterima dalam kondisi baik'),
(24, 'Driver_57', '<li>Beras, 500</li>', '2025-02-09', 'Barang diterima dalam kondisi baik'),
(25, 'Driver_42', '<li>Box, 100</li>', '2025-08-10', 'Barang diterima dalam kondisi baik'),
(26, 'Driver_83', '<li>Minyak, 500</li>', '2025-04-14', 'Barang diterima dalam kondisi baik'),
(27, 'Driver_95', '<li>Unit mesin, 50</li>', '2024-11-15', 'Barang diterima dalam kondisi baik'),
(28, 'Driver_90', '<li>Beras, 500</li>', '2025-05-23', 'Barang diterima dalam kondisi baik'),
(29, 'Driver_79', '<li>Beras, 500</li>', '2025-10-16', 'Barang diterima dalam kondisi baik'),
(30, 'Driver_64', '<li>Box, 100</li>', '2025-02-02', 'Barang diterima dalam kondisi baik'),
(31, 'Driver_10', '<li>Beras, 500</li>', '2025-06-27', 'Barang diterima dalam kondisi baik'),
(32, 'Driver_68', '<li>Minyak, 500</li>', '2025-05-07', 'Barang diterima dalam kondisi baik'),
(33, 'Driver_29', '<li>Minyak, 500</li>', '2025-03-05', 'Barang diterima dalam kondisi baik'),
(34, 'Driver_91', '<li>Beras, 500</li>', '2025-05-20', 'Barang diterima dalam kondisi baik'),
(35, 'Driver_48', '<li>Beras, 500</li>', '2025-10-02', 'Barang diterima dalam kondisi baik'),
(36, 'Driver_8', '<li>Unit mesin, 50</li>', '2024-12-14', 'Barang diterima dalam kondisi baik'),
(37, 'Driver_66', '<li>Beras, 500</li>', '2025-04-09', 'Barang diterima dalam kondisi baik'),
(38, 'Driver_16', '<li>Minyak, 500</li>', '2025-10-03', 'Barang diterima dalam kondisi baik'),
(39, 'Driver_17', '<li>Beras, 500</li>', '2025-05-25', 'Barang diterima dalam kondisi baik'),
(40, 'Driver_65', '<li>Unit mesin, 50</li>', '2025-01-20', 'Barang diterima dalam kondisi baik'),
(41, 'Driver_92', '<li>Box, 100</li>', '2025-02-06', 'Barang diterima dalam kondisi baik'),
(42, 'Driver_37', '<li>Box, 100</li>', '2025-05-14', 'Barang diterima dalam kondisi baik'),
(43, 'Driver_34', '<li>Minyak, 500</li>', '2025-01-20', 'Barang diterima dalam kondisi baik'),
(44, 'Driver_19', '<li>Unit mesin, 50</li>', '2025-03-30', 'Barang diterima dalam kondisi baik'),
(45, 'Driver_74', '<li>Beras, 500</li>', '2025-06-20', 'Barang diterima dalam kondisi baik'),
(46, 'Driver_14', '<li>Unit mesin, 50</li>', '2025-08-17', 'Barang diterima dalam kondisi baik'),
(47, 'Driver_61', '<li>Unit mesin, 50</li>', '2025-05-21', 'Barang diterima dalam kondisi baik'),
(48, 'Driver_52', '<li>Beras, 500</li>', '2025-03-01', 'Barang diterima dalam kondisi baik'),
(49, 'Driver_64', '<li>Minyak, 500</li>', '2025-05-05', 'Barang diterima dalam kondisi baik'),
(50, 'Driver_88', '<li>Beras, 500</li>', '2025-08-10', 'Barang diterima dalam kondisi baik'),
(51, 'Driver_64', '<li>Beras, 500</li>', '2025-06-12', 'Barang diterima dalam kondisi baik'),
(52, 'Driver_57', '<li>Unit mesin, 50</li>', '2024-12-05', 'Barang diterima dalam kondisi baik'),
(53, 'Driver_12', '<li>Unit mesin, 50</li>', '2025-01-05', 'Barang diterima dalam kondisi baik'),
(54, 'Driver_12', '<li>Unit mesin, 50</li>', '2025-06-09', 'Barang diterima dalam kondisi baik'),
(55, 'Driver_37', '<li>Minyak, 500</li>', '2025-08-12', 'Barang diterima dalam kondisi baik'),
(56, 'Driver_36', '<li>Unit mesin, 50</li>', '2025-11-01', 'Barang diterima dalam kondisi baik'),
(57, 'Driver_51', '<li>Unit mesin, 50</li>', '2025-01-16', 'Barang diterima dalam kondisi baik'),
(58, 'Driver_55', '<li>Minyak, 500</li>', '2025-01-31', 'Barang diterima dalam kondisi baik'),
(59, 'Driver_1', '<li>Box, 100</li>', '2025-09-15', 'Barang diterima dalam kondisi baik'),
(60, 'Driver_38', '<li>Minyak, 500</li>', '2024-12-08', 'Barang diterima dalam kondisi baik'),
(61, 'Driver_31', '<li>Minyak, 500</li>', '2025-01-07', 'Barang diterima dalam kondisi baik'),
(62, 'Driver_54', '<li>Box, 100</li>', '2024-11-09', 'Barang diterima dalam kondisi baik'),
(63, 'Driver_100', '<li>Minyak, 500</li>', '2025-06-25', 'Barang diterima dalam kondisi baik'),
(64, 'Driver_68', '<li>Box, 100</li>', '2025-01-20', 'Barang diterima dalam kondisi baik'),
(65, 'Driver_44', '<li>Beras, 500</li>', '2025-06-19', 'Barang diterima dalam kondisi baik'),
(66, 'Driver_4', '<li>Box, 100</li>', '2025-01-10', 'Barang diterima dalam kondisi baik'),
(67, 'Driver_38', '<li>Minyak, 500</li>', '2025-01-10', 'Barang diterima dalam kondisi baik'),
(68, 'Driver_67', '<li>Minyak, 500</li>', '2025-07-06', 'Barang diterima dalam kondisi baik'),
(69, 'Driver_41', '<li>Box, 100</li>', '2025-09-29', 'Barang diterima dalam kondisi baik'),
(70, 'Driver_21', '<li>Unit mesin, 50</li>', '2025-01-29', 'Barang diterima dalam kondisi baik'),
(71, 'Driver_5', '<li>Unit mesin, 50</li>', '2025-01-18', 'Barang diterima dalam kondisi baik'),
(72, 'Driver_30', '<li>Box, 100</li>', '2025-04-01', 'Barang diterima dalam kondisi baik'),
(73, 'Driver_64', '<li>Unit mesin, 50</li>', '2025-09-09', 'Barang diterima dalam kondisi baik'),
(74, 'Driver_16', '<li>Beras, 500</li>', '2024-12-29', 'Barang diterima dalam kondisi baik'),
(75, 'Driver_16', '<li>Beras, 500</li>', '2025-01-24', 'Barang diterima dalam kondisi baik'),
(76, 'Driver_76', '<li>Box, 100</li>', '2025-10-19', 'Barang diterima dalam kondisi baik'),
(77, 'Driver_15', '<li>Unit mesin, 50</li>', '2025-09-14', 'Barang diterima dalam kondisi baik'),
(78, 'Driver_2', '<li>Unit mesin, 50</li>', '2025-04-12', 'Barang diterima dalam kondisi baik'),
(79, 'Driver_63', '<li>Beras, 500</li>', '2025-05-05', 'Barang diterima dalam kondisi baik'),
(80, 'Driver_43', '<li>Beras, 500</li>', '2025-10-10', 'Barang diterima dalam kondisi baik'),
(81, 'Driver_24', '<li>Minyak, 500</li>', '2025-05-29', 'Barang diterima dalam kondisi baik'),
(82, 'Driver_74', '<li>Unit mesin, 50</li>', '2025-01-27', 'Barang diterima dalam kondisi baik'),
(83, 'Driver_70', '<li>Unit mesin, 50</li>', '2025-05-04', 'Barang diterima dalam kondisi baik'),
(84, 'Driver_18', '<li>Minyak, 500</li>', '2025-01-17', 'Barang diterima dalam kondisi baik'),
(85, 'Driver_29', '<li>Box, 100</li>', '2025-02-19', 'Barang diterima dalam kondisi baik'),
(86, 'Driver_98', '<li>Box, 100</li>', '2025-09-02', 'Barang diterima dalam kondisi baik'),
(87, 'Driver_47', '<li>Box, 100</li>', '2025-04-19', 'Barang diterima dalam kondisi baik'),
(88, 'Driver_82', '<li>Unit mesin, 50</li>', '2025-02-28', 'Barang diterima dalam kondisi baik'),
(89, 'Driver_95', '<li>Beras, 500</li>', '2025-06-23', 'Barang diterima dalam kondisi baik'),
(90, 'Driver_5', '<li>Unit mesin, 50</li>', '2025-03-10', 'Barang diterima dalam kondisi baik'),
(91, 'Driver_98', '<li>Minyak, 500</li>', '2025-01-12', 'Barang diterima dalam kondisi baik'),
(92, 'Driver_32', '<li>Box, 100</li>', '2025-06-01', 'Barang diterima dalam kondisi baik'),
(93, 'Driver_62', '<li>Minyak, 500</li>', '2025-04-28', 'Barang diterima dalam kondisi baik'),
(94, 'Driver_54', '<li>Box, 100</li>', '2025-06-05', 'Barang diterima dalam kondisi baik'),
(95, 'Driver_51', '<li>Beras, 500</li>', '2024-11-16', 'Barang diterima dalam kondisi baik'),
(96, 'Driver_17', '<li>Unit mesin, 50</li>', '2024-12-25', 'Barang diterima dalam kondisi baik'),
(97, 'Driver_56', '<li>Box, 100</li>', '2025-06-07', 'Barang diterima dalam kondisi baik'),
(98, 'Driver_36', '<li>Unit mesin, 50</li>', '2025-09-02', 'Barang diterima dalam kondisi baik'),
(99, 'Driver_83', '<li>Minyak, 500</li>', '2025-03-13', 'Barang diterima dalam kondisi baik'),
(100, 'Driver_57', '<li>Box, 100</li>', '2024-11-26', 'Barang diterima dalam kondisi baik'),
(101, 'Driver_85', '<li>Box, 100</li>', '2025-03-29', 'Barang diterima dalam kondisi baik');

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

--
-- Dumping data for table `data_mobil`
--

INSERT INTO `data_mobil` (`id`, `tanggal`, `nama_driver`, `merek_kendaraan`, `no_kendaraan`, `km_awal`, `km_akhir`, `tujuan`, `keperluan`) VALUES
(1, '2024-11-02', 'asd', 'asd', 'asd', 12, 12, 'asd', 'asd'),
(3, '2024-11-06', 'sd', 'Grandmax', 'asd', 12, 12, 'asd', 'asd'),
(4, '2023-09-01', 'Driver_49', 'Toyota', 'B4907', 96319, 34417, 'Jakarta', 'Perjalanan Dinas'),
(5, '2023-11-11', 'Driver_28', 'Toyota', 'B8496', 39017, 40246, 'Jakarta', 'Perjalanan Dinas'),
(6, '2023-10-15', 'Driver_551', 'Honda', 'B 3696 XYZ', 32662, 83411, 'Yogyakarta', 'Dinas'),
(7, '2025-09-09', 'Driver_17', 'Honda', 'B6450', 28774, 151725, 'Bandung', 'Pribadi'),
(8, '2025-03-15', 'Driver_81', 'Mitsubishi', 'B8949', 73568, 112581, 'Surabaya', 'Perjalanan Dinas'),
(9, '2025-10-12', 'Driver_5', 'Toyota', 'B4056', 22525, 183113, 'Surabaya', 'Perjalanan Dinas'),
(10, '2025-04-29', 'Driver_86', 'Toyota', 'B6032', 18503, 152973, 'Jakarta', 'Antar Barang'),
(11, '2025-07-02', 'Driver_17', 'Mitsubishi', 'B2644', 48354, 130166, 'Jakarta', 'Perjalanan Dinas'),
(12, '2025-03-08', 'Driver_8', 'Nissan', 'B9392', 65443, 112925, 'Makassar', 'Pribadi'),
(13, '2025-05-08', 'Driver_18', 'Nissan', 'B5716', 37864, 116982, 'Medan', 'Perjalanan Dinas'),
(14, '2025-07-21', 'Driver_99', 'Toyota', 'B6547', 47985, 135128, 'Jakarta', 'Antar Barang'),
(15, '2025-06-26', 'Driver_87', 'Toyota', 'B7815', 80300, 150444, 'Medan', 'Pribadi'),
(16, '2025-05-22', 'Driver_68', 'Nissan', 'B3032', 57084, 164783, 'Jakarta', 'Antar Barang'),
(17, '2025-02-22', 'Driver_100', 'Suzuki', 'B3263', 96815, 155796, 'Surabaya', 'Pribadi'),
(18, '2025-07-17', 'Driver_63', 'Mitsubishi', 'B5425', 69991, 117158, 'Makassar', 'Pribadi'),
(19, '2025-09-25', 'Driver_32', 'Suzuki', 'B6129', 29258, 113786, 'Bandung', 'Antar Barang'),
(20, '2025-03-24', 'Driver_14', 'Suzuki', 'B9831', 82650, 145885, 'Makassar', 'Antar Barang'),
(21, '2025-05-29', 'Driver_15', 'Suzuki', 'B8178', 77383, 184060, 'Makassar', 'Pribadi'),
(22, '2025-01-05', 'Driver_53', 'Honda', 'B8495', 88391, 182715, 'Bandung', 'Antar Barang'),
(23, '2025-09-11', 'Driver_13', 'Suzuki', 'B7825', 32609, 125313, 'Makassar', 'Perjalanan Dinas'),
(24, '2025-01-29', 'Driver_79', 'Honda', 'B5787', 17089, 193450, 'Surabaya', 'Perjalanan Dinas'),
(25, '2024-11-12', 'Driver_14', 'Honda', 'B7215', 95955, 146694, 'Surabaya', 'Perjalanan Dinas'),
(26, '2025-02-26', 'Driver_20', 'Suzuki', 'B8106', 25832, 152669, 'Bandung', 'Perjalanan Dinas'),
(27, '2025-07-27', 'Driver_33', 'Honda', 'B9621', 59272, 184934, 'Surabaya', 'Antar Barang'),
(28, '2025-01-11', 'Driver_40', 'Nissan', 'B7010', 43517, 126185, 'Makassar', 'Pribadi'),
(29, '2025-04-05', 'Driver_37', 'Suzuki', 'B1736', 79677, 173010, 'Surabaya', 'Antar Barang'),
(30, '2025-01-03', 'Driver_13', 'Honda', 'B7292', 57731, 189663, 'Jakarta', 'Pribadi'),
(31, '2025-03-12', 'Driver_41', 'Suzuki', 'B7782', 22631, 190151, 'Medan', 'Antar Barang'),
(32, '2025-08-02', 'Driver_38', 'Honda', 'B7593', 39250, 155014, 'Jakarta', 'Antar Barang'),
(33, '2025-03-29', 'Driver_94', 'Toyota', 'B2165', 13007, 196679, 'Medan', 'Antar Barang'),
(34, '2024-12-06', 'Driver_16', 'Nissan', 'B2971', 40851, 180653, 'Surabaya', 'Antar Barang'),
(35, '2024-11-11', 'Driver_4', 'Honda', 'B4158', 60757, 133833, 'Jakarta', 'Pribadi'),
(36, '2025-10-22', 'Driver_6', 'Mitsubishi', 'B5296', 66785, 117575, 'Surabaya', 'Pribadi'),
(37, '2025-09-09', 'Driver_13', 'Toyota', 'B1341', 50094, 123246, 'Jakarta', 'Perjalanan Dinas'),
(38, '2025-04-23', 'Driver_30', 'Toyota', 'B1280', 77286, 152743, 'Makassar', 'Perjalanan Dinas'),
(39, '2025-01-29', 'Driver_99', 'Mitsubishi', 'B7871', 86943, 149469, 'Surabaya', 'Perjalanan Dinas'),
(40, '2025-04-23', 'Driver_26', 'Toyota', 'B5173', 25068, 165641, 'Bandung', 'Perjalanan Dinas'),
(41, '2025-08-27', 'Driver_32', 'Honda', 'B1399', 75577, 122632, 'Bandung', 'Perjalanan Dinas'),
(42, '2024-12-17', 'Driver_64', 'Honda', 'B4542', 72868, 123830, 'Jakarta', 'Pribadi'),
(43, '2025-10-16', 'Driver_67', 'Toyota', 'B7234', 12800, 186722, 'Bandung', 'Perjalanan Dinas'),
(44, '2025-09-26', 'Driver_88', 'Honda', 'B6343', 24929, 141145, 'Bandung', 'Pribadi'),
(45, '2025-07-22', 'Driver_52', 'Mitsubishi', 'B6989', 38139, 173689, 'Bandung', 'Perjalanan Dinas'),
(46, '2025-02-25', 'Driver_81', 'Mitsubishi', 'B1153', 70353, 147533, 'Medan', 'Pribadi'),
(47, '2024-12-21', 'Driver_79', 'Suzuki', 'B7395', 63501, 166418, 'Jakarta', 'Pribadi'),
(48, '2025-09-04', 'Driver_66', 'Toyota', 'B5880', 87464, 150910, 'Makassar', 'Antar Barang'),
(49, '2025-05-07', 'Driver_94', 'Mitsubishi', 'B9762', 92892, 152188, 'Surabaya', 'Antar Barang'),
(50, '2025-10-17', 'Driver_72', 'Mitsubishi', 'B7127', 92067, 181992, 'Medan', 'Antar Barang'),
(51, '2025-02-05', 'Driver_14', 'Toyota', 'B2956', 18835, 187636, 'Bandung', 'Perjalanan Dinas'),
(52, '2024-12-03', 'Driver_20', 'Nissan', 'B1066', 80810, 190995, 'Makassar', 'Perjalanan Dinas'),
(53, '2025-05-12', 'Driver_78', 'Nissan', 'B7152', 38278, 181690, 'Medan', 'Perjalanan Dinas'),
(54, '2025-07-01', 'Driver_58', 'Honda', 'B8579', 76946, 136834, 'Bandung', 'Pribadi'),
(55, '2025-02-15', 'Driver_29', 'Honda', 'B6769', 68974, 151425, 'Surabaya', 'Pribadi'),
(56, '2025-07-26', 'Driver_22', 'Honda', 'B4547', 24044, 188449, 'Jakarta', 'Pribadi'),
(57, '2025-03-18', 'Driver_69', 'Honda', 'B8655', 57742, 187428, 'Jakarta', 'Antar Barang'),
(58, '2025-02-03', 'Driver_86', 'Suzuki', 'B1749', 39545, 113793, 'Jakarta', 'Perjalanan Dinas'),
(59, '2025-09-10', 'Driver_90', 'Honda', 'B2966', 68579, 129019, 'Jakarta', 'Antar Barang'),
(60, '2025-10-16', 'Driver_86', 'Suzuki', 'B3177', 31093, 194441, 'Surabaya', 'Antar Barang'),
(61, '2025-08-07', 'Driver_4', 'Suzuki', 'B1674', 53935, 185422, 'Surabaya', 'Pribadi'),
(62, '2025-01-20', 'Driver_34', 'Nissan', 'B5057', 17594, 146075, 'Jakarta', 'Antar Barang'),
(63, '2025-08-18', 'Driver_33', 'Suzuki', 'B2862', 44631, 172569, 'Bandung', 'Perjalanan Dinas'),
(64, '2025-10-12', 'Driver_82', 'Suzuki', 'B7122', 76942, 111829, 'Surabaya', 'Antar Barang'),
(65, '2025-01-23', 'Driver_14', 'Suzuki', 'B2371', 50775, 110072, 'Surabaya', 'Perjalanan Dinas'),
(66, '2024-11-13', 'Driver_3', 'Suzuki', 'B2465', 29719, 130513, 'Bandung', 'Pribadi'),
(67, '2025-10-18', 'Driver_8', 'Mitsubishi', 'B1014', 84265, 123071, 'Jakarta', 'Antar Barang'),
(68, '2024-12-13', 'Driver_79', 'Toyota', 'B1516', 68507, 185245, 'Surabaya', 'Pribadi'),
(69, '2025-07-22', 'Driver_84', 'Suzuki', 'B3123', 75271, 143948, 'Medan', 'Pribadi'),
(70, '2025-06-01', 'Driver_9', 'Toyota', 'B9635', 71134, 128679, 'Bandung', 'Perjalanan Dinas'),
(71, '2024-12-13', 'Driver_5', 'Mitsubishi', 'B3495', 61662, 111869, 'Jakarta', 'Antar Barang'),
(72, '2024-11-20', 'Driver_75', 'Suzuki', 'B7388', 93192, 187165, 'Surabaya', 'Antar Barang'),
(73, '2025-05-28', 'Driver_13', 'Toyota', 'B3927', 66208, 194614, 'Medan', 'Perjalanan Dinas'),
(74, '2025-07-16', 'Driver_11', 'Mitsubishi', 'B4467', 18160, 167425, 'Bandung', 'Pribadi'),
(75, '2025-02-12', 'Driver_42', 'Nissan', 'B5736', 51118, 113440, 'Bandung', 'Perjalanan Dinas'),
(76, '2025-06-03', 'Driver_38', 'Toyota', 'B7100', 88513, 140744, 'Makassar', 'Perjalanan Dinas'),
(77, '2025-01-25', 'Driver_75', 'Mitsubishi', 'B3522', 18825, 174131, 'Medan', 'Perjalanan Dinas'),
(78, '2025-01-17', 'Driver_61', 'Toyota', 'B8264', 98067, 190820, 'Jakarta', 'Perjalanan Dinas'),
(79, '2025-03-27', 'Driver_75', 'Honda', 'B9245', 25527, 117359, 'Jakarta', 'Antar Barang'),
(80, '2024-11-21', 'Driver_68', 'Suzuki', 'B3191', 67053, 152712, 'Jakarta', 'Antar Barang'),
(81, '2025-03-28', 'Driver_100', 'Nissan', 'B4486', 97802, 132962, 'Medan', 'Perjalanan Dinas'),
(82, '2025-02-10', 'Driver_36', 'Mitsubishi', 'B8866', 37098, 135924, 'Medan', 'Pribadi'),
(83, '2024-12-30', 'Driver_98', 'Toyota', 'B8021', 37388, 198775, 'Surabaya', 'Perjalanan Dinas'),
(84, '2024-12-02', 'Driver_51', 'Toyota', 'B4484', 65119, 168967, 'Surabaya', 'Antar Barang'),
(85, '2025-07-17', 'Driver_2', 'Mitsubishi', 'B6817', 81169, 149028, 'Surabaya', 'Pribadi'),
(86, '2024-11-19', 'Driver_46', 'Nissan', 'B3626', 67718, 194275, 'Medan', 'Perjalanan Dinas'),
(87, '2025-04-05', 'Driver_51', 'Toyota', 'B6150', 82849, 182419, 'Makassar', 'Antar Barang'),
(88, '2024-12-08', 'Driver_76', 'Toyota', 'B9199', 49487, 168790, 'Medan', 'Antar Barang'),
(89, '2025-08-18', 'Driver_77', 'Suzuki', 'B6542', 18254, 129217, 'Medan', 'Pribadi'),
(90, '2025-02-12', 'Driver_47', 'Toyota', 'B3427', 92174, 182722, 'Medan', 'Perjalanan Dinas'),
(91, '2024-12-09', 'Driver_96', 'Nissan', 'B3315', 50145, 139379, 'Makassar', 'Perjalanan Dinas'),
(92, '2025-02-14', 'Driver_62', 'Toyota', 'B7125', 72705, 140776, 'Makassar', 'Pribadi'),
(93, '2025-07-18', 'Driver_18', 'Mitsubishi', 'B6032', 45877, 123962, 'Makassar', 'Perjalanan Dinas'),
(94, '2025-07-25', 'Driver_30', 'Honda', 'B6325', 71365, 111747, 'Bandung', 'Perjalanan Dinas'),
(95, '2025-07-11', 'Driver_45', 'Toyota', 'B7118', 90459, 138098, 'Bandung', 'Perjalanan Dinas'),
(96, '2025-01-07', 'Driver_92', 'Mitsubishi', 'B9652', 80361, 116245, 'Makassar', 'Antar Barang'),
(97, '2025-09-30', 'Driver_96', 'Nissan', 'B4131', 32293, 139537, 'Bandung', 'Perjalanan Dinas'),
(98, '2024-12-17', 'Driver_57', 'Nissan', 'B2928', 39362, 144243, 'Bandung', 'Antar Barang'),
(99, '2025-04-28', 'Driver_7', 'Suzuki', 'B5684', 51468, 142614, 'Jakarta', 'Perjalanan Dinas'),
(100, '2025-04-04', 'Driver_5', 'Nissan', 'B2502', 32095, 161180, 'Medan', 'Perjalanan Dinas'),
(101, '2024-12-15', 'Driver_23', 'Honda', 'B2629', 67442, 153721, 'Medan', 'Antar Barang'),
(102, '2025-02-03', 'Driver_92', 'Mitsubishi', 'B4484', 90916, 124995, 'Makassar', 'Pribadi'),
(103, '2024-12-05', 'Driver_54', 'Mitsubishi', 'B4197', 47404, 142497, 'Bandung', 'Antar Barang'),
(104, '2025-05-07', 'Driver_45', 'Suzuki', 'B9697', 39793, 190642, 'Makassar', 'Perjalanan Dinas'),
(105, '2025-03-13', 'Driver_18', 'Nissan', 'B1027', 86265, 150342, 'Surabaya', 'Antar Barang'),
(106, '2025-01-13', 'Driver_30', 'Toyota', 'B8843', 60705, 110404, 'Surabaya', 'Pribadi');

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

--
-- Dumping data for table `data_pengunjung`
--

INSERT INTO `data_pengunjung` (`id`, `nama_pengunjung`, `nama_perusahaan`, `no_kendaraan`, `tanggal`, `no_telpon`, `safety_induction`) VALUES
(1, '<li>asd</li>', 'asd', 'asd', '1212-12-12', 'asd', 'Tidak'),
(2, '<li>Galang</li><li>Fadel</li><li>Fatahillah</li>', 'CV. Bahtera Cahaya Express', 'A 1234 BC', '2024-10-30', '08123456789', 'Ya'),
(3, '<li>Asep 71</li>', 'PT. Sopian Berkah 7', 'B2909', '2025-05-16', '0884219657', 'Ya'),
(4, '<li>Asep 60</li>', 'PT. Sopian Berkah 6', 'B5997', '2025-08-10', '0874365219', 'Ya'),
(5, '<li>Asep 3</li>', 'PT. Sopian Berkah 61', 'B5963', '2025-08-14', '0828419763', 'Ya'),
(6, '<li>Asep 69</li>', 'PT. Sopian Berkah 94', 'B6616', '2025-05-09', '0899471502', 'Tidak'),
(7, '<li>Asep 87</li>', 'PT. Sopian Berkah 79', 'B8719', '2025-10-06', '0835043833', 'Ya'),
(8, '<li>Asep 92</li>', 'PT. Sopian Berkah 66', 'B7889', '2024-11-28', '0844837999', 'Tidak'),
(9, '<li>Asep 22</li>', 'PT. Sopian Berkah 3', 'B8355', '2025-03-29', '0868657749', 'Ya'),
(10, '<li>Asep 57</li>', 'PT. Sopian Berkah 20', 'B4407', '2025-04-18', '0879558838', 'Ya'),
(11, '<li>Asep 5</li>', 'PT. Sopian Berkah 19', 'B5070', '2025-03-17', '0864483965', 'Tidak'),
(12, '<li>Asep 63</li>', 'PT. Sopian Berkah 1', 'B8343', '2025-05-05', '0869625582', 'Tidak'),
(13, '<li>Asep 55</li>', 'PT. Sopian Berkah 25', 'B5418', '2025-01-14', '0826941323', 'Tidak'),
(14, '<li>Asep 92</li>', 'PT. Sopian Berkah 37', 'B9520', '2025-09-03', '0824727339', 'Ya'),
(15, '<li>Asep 91</li>', 'PT. Sopian Berkah 67', 'B8911', '2024-12-10', '0857708017', 'Ya'),
(16, '<li>Asep 57</li>', 'PT. Sopian Berkah 24', 'B7459', '2025-01-26', '0890323469', 'Tidak'),
(17, '<li>Asep 26</li>', 'PT. Sopian Berkah 92', 'B3427', '2025-09-12', '0884936395', 'Ya'),
(18, '<li>Asep 7</li>', 'PT. Sopian Berkah 9', 'B6717', '2024-11-09', '0815939681', 'Tidak'),
(19, '<li>Asep 58</li>', 'PT. Sopian Berkah 1', 'B2538', '2024-12-16', '0863818688', 'Ya'),
(20, '<li>Asep 98</li>', 'PT. Sopian Berkah 60', 'B4892', '2025-07-09', '0847927191', 'Ya'),
(21, '<li>Asep 1</li>', 'PT. Sopian Berkah 11', 'B1210', '2025-01-12', '0822706505', 'Tidak'),
(22, '<li>Asep 39</li>', 'PT. Sopian Berkah 87', 'B8948', '2025-09-25', '0862138514', 'Ya'),
(23, '<li>Asep 49</li>', 'PT. Sopian Berkah 71', 'B9378', '2025-05-11', '0878451672', 'Tidak'),
(24, '<li>Asep 60</li>', 'PT. Sopian Berkah 68', 'B3288', '2025-06-28', '0828721277', 'Ya'),
(25, '<li>Asep 48</li>', 'PT. Sopian Berkah 38', 'B5990', '2025-09-10', '0880068217', 'Tidak'),
(26, '<li>Asep 37</li>', 'PT. Sopian Berkah 30', 'B8201', '2025-02-08', '0814958449', 'Tidak'),
(27, '<li>Asep 65</li>', 'PT. Sopian Berkah 39', 'B6525', '2025-07-24', '0838548949', 'Ya'),
(28, '<li>Asep 37</li>', 'PT. Sopian Berkah 1', 'B1175', '2025-05-29', '0824700118', 'Ya'),
(29, '<li>Asep 95</li>', 'PT. Sopian Berkah 92', 'B1563', '2025-01-02', '0830124763', 'Tidak'),
(30, '<li>Asep 74</li>', 'PT. Sopian Berkah 76', 'B3785', '2025-03-10', '0826774214', 'Ya'),
(31, '<li>Asep 54</li>', 'PT. Sopian Berkah 41', 'B9552', '2025-08-08', '0884751717', 'Ya'),
(32, '<li>Asep 13</li>', 'PT. Sopian Berkah 84', 'B5454', '2025-05-26', '0890402841', 'Tidak'),
(33, '<li>Asep 11</li>', 'PT. Sopian Berkah 96', 'B9739', '2025-07-28', '0847779002', 'Ya'),
(34, '<li>Asep 92</li>', 'PT. Sopian Berkah 88', 'B4016', '2025-09-12', '0892674350', 'Ya'),
(35, '<li>Asep 8</li>', 'PT. Sopian Berkah 13', 'B4169', '2025-02-02', '0886019579', 'Ya'),
(36, '<li>Asep 18</li>', 'PT. Sopian Berkah 28', 'B3972', '2025-03-07', '0883783131', 'Ya'),
(37, '<li>Asep 18</li>', 'PT. Sopian Berkah 5', 'B6099', '2025-03-19', '0891721761', 'Tidak'),
(38, '<li>Asep 99</li>', 'PT. Sopian Berkah 56', 'B6568', '2025-02-13', '0883678508', 'Tidak'),
(39, '<li>Asep 17</li>', 'PT. Sopian Berkah 85', 'B4053', '2025-10-09', '0896362812', 'Ya'),
(40, '<li>Asep 11</li>', 'PT. Sopian Berkah 44', 'B1189', '2025-06-04', '0829719162', 'Tidak'),
(41, '<li>Asep 74</li>', 'PT. Sopian Berkah 38', 'B2973', '2025-04-20', '0831780606', 'Tidak'),
(42, '<li>Asep 68</li>', 'PT. Sopian Berkah 62', 'B5986', '2025-04-05', '0852195962', 'Tidak'),
(43, '<li>Asep 65</li>', 'PT. Sopian Berkah 49', 'B5581', '2025-01-13', '0814558733', 'Tidak'),
(44, '<li>Asep 55</li>', 'PT. Sopian Berkah 72', 'B3568', '2025-06-29', '0860828809', 'Tidak'),
(45, '<li>Asep 78</li>', 'PT. Sopian Berkah 87', 'B2313', '2025-07-08', '0873358813', 'Ya'),
(46, '<li>Asep 87</li>', 'PT. Sopian Berkah 97', 'B1817', '2025-05-03', '0852201777', 'Ya'),
(47, '<li>Asep 27</li>', 'PT. Sopian Berkah 30', 'B7729', '2025-10-15', '0821697369', 'Ya'),
(48, '<li>Asep 80</li>', 'PT. Sopian Berkah 28', 'B6446', '2025-10-25', '0872938940', 'Ya'),
(49, '<li>Asep 7</li>', 'PT. Sopian Berkah 27', 'B8481', '2025-08-07', '0872958845', 'Tidak'),
(50, '<li>Asep 12</li>', 'PT. Sopian Berkah 98', 'B6565', '2025-09-11', '0844454159', 'Ya'),
(51, '<li>Asep 62</li>', 'PT. Sopian Berkah 75', 'B9420', '2025-06-18', '0846069397', 'Tidak'),
(52, '<li>Asep 88</li>', 'PT. Sopian Berkah 66', 'B3673', '2025-09-28', '0812381709', 'Ya'),
(53, '<li>Asep 73</li>', 'PT. Sopian Berkah 80', 'B6849', '2025-06-29', '0838409542', 'Ya'),
(54, '<li>Asep 80</li>', 'PT. Sopian Berkah 69', 'B2278', '2025-01-10', '0883430494', 'Ya'),
(55, '<li>Asep 91</li>', 'PT. Sopian Berkah 81', 'B9643', '2025-09-03', '0887254779', 'Ya'),
(56, '<li>Asep 37</li>', 'PT. Sopian Berkah 60', 'B8262', '2025-01-29', '0879808445', 'Ya'),
(57, '<li>Asep 44</li>', 'PT. Sopian Berkah 97', 'B9274', '2024-11-13', '0886769268', 'Ya'),
(58, '<li>Asep 32</li>', 'PT. Sopian Berkah 80', 'B8674', '2025-04-22', '0855364907', 'Ya'),
(59, '<li>Asep 81</li>', 'PT. Sopian Berkah 39', 'B3776', '2025-06-19', '0854191807', 'Ya'),
(60, '<li>Asep 47</li>', 'PT. Sopian Berkah 45', 'B6095', '2025-06-06', '0841726518', 'Ya'),
(61, '<li>Asep 96</li>', 'PT. Sopian Berkah 1', 'B3157', '2025-03-22', '0851253309', 'Tidak'),
(62, '<li>Asep 15</li>', 'PT. Sopian Berkah 81', 'B1389', '2025-05-02', '0811353362', 'Tidak'),
(63, '<li>Asep 53</li>', 'PT. Sopian Berkah 1', 'B6361', '2025-10-27', '0861948568', 'Ya'),
(64, '<li>Asep 59</li>', 'PT. Sopian Berkah 19', 'B1440', '2025-07-13', '0898935980', 'Ya'),
(65, '<li>Asep 96</li>', 'PT. Sopian Berkah 37', 'B4074', '2025-08-07', '0885370730', 'Tidak'),
(66, '<li>Asep 42</li>', 'PT. Sopian Berkah 76', 'B9890', '2025-06-23', '0873557128', 'Tidak'),
(67, '<li>Asep 4</li>', 'PT. Sopian Berkah 60', 'B5724', '2025-10-24', '0894848615', 'Tidak'),
(68, '<li>Asep 89</li>', 'PT. Sopian Berkah 63', 'B6362', '2025-05-14', '0846202472', 'Ya'),
(69, '<li>Asep 38</li>', 'PT. Sopian Berkah 28', 'B4521', '2025-09-07', '0899030051', 'Ya'),
(70, '<li>Asep 78</li>', 'PT. Sopian Berkah 19', 'B8735', '2025-02-28', '0893596929', 'Ya'),
(71, '<li>Asep 75</li>', 'PT. Sopian Berkah 37', 'B8666', '2025-01-12', '0832227820', 'Ya'),
(72, '<li>Asep 78</li>', 'PT. Sopian Berkah 77', 'B1354', '2024-11-09', '0848767605', 'Ya'),
(73, '<li>Asep 74</li>', 'PT. Sopian Berkah 36', 'B8901', '2025-07-08', '0862746814', 'Tidak'),
(74, '<li>Asep 7</li>', 'PT. Sopian Berkah 58', 'B4775', '2025-07-28', '0816684997', 'Ya'),
(75, '<li>Asep 79</li>', 'PT. Sopian Berkah 13', 'B8724', '2025-10-27', '0819709025', 'Tidak'),
(76, '<li>Asep 76</li>', 'PT. Sopian Berkah 72', 'B3928', '2025-02-24', '0867051129', 'Tidak'),
(77, '<li>Asep 35</li>', 'PT. Sopian Berkah 44', 'B4356', '2025-02-22', '0865624581', 'Tidak'),
(78, '<li>Asep 100</li>', 'PT. Sopian Berkah 35', 'B6597', '2025-10-03', '0878076271', 'Tidak'),
(79, '<li>Asep 61</li>', 'PT. Sopian Berkah 69', 'B5206', '2025-09-24', '0891601567', 'Ya'),
(80, '<li>Asep 69</li>', 'PT. Sopian Berkah 49', 'B4717', '2025-06-11', '0838469107', 'Tidak'),
(81, '<li>Asep 89</li>', 'PT. Sopian Berkah 41', 'B3853', '2025-10-25', '0869209583', 'Ya'),
(82, '<li>Asep 7</li>', 'PT. Sopian Berkah 41', 'B6956', '2025-08-17', '0846423374', 'Tidak'),
(83, '<li>Asep 5</li>', 'PT. Sopian Berkah 92', 'B3414', '2025-01-17', '0834692717', 'Ya'),
(84, '<li>Asep 87</li>', 'PT. Sopian Berkah 40', 'B4889', '2024-12-26', '0815312477', 'Tidak'),
(85, '<li>Asep 15</li>', 'PT. Sopian Berkah 23', 'B3594', '2025-02-27', '0853397490', 'Ya'),
(86, '<li>Asep 32</li>', 'PT. Sopian Berkah 9', 'B5579', '2025-03-20', '0896691460', 'Ya'),
(87, '<li>Asep 64</li>', 'PT. Sopian Berkah 53', 'B5750', '2025-03-10', '0840865890', 'Tidak'),
(88, '<li>Asep 47</li>', 'PT. Sopian Berkah 16', 'B2973', '2025-08-24', '0872073950', 'Tidak'),
(89, '<li>Asep 73</li>', 'PT. Sopian Berkah 61', 'B8873', '2025-07-26', '0892481404', 'Ya'),
(90, '<li>Asep 83</li>', 'PT. Sopian Berkah 99', 'B9116', '2025-06-12', '0895216960', 'Ya'),
(91, '<li>Asep 18</li>', 'PT. Sopian Berkah 91', 'B2664', '2025-01-18', '0824937032', 'Ya'),
(92, '<li>Asep 40</li>', 'PT. Sopian Berkah 77', 'B6499', '2025-10-31', '0868648657', 'Ya'),
(93, '<li>Asep 49</li>', 'PT. Sopian Berkah 81', 'B2930', '2024-11-16', '0836112265', 'Tidak'),
(94, '<li>Asep 48</li>', 'PT. Sopian Berkah 64', 'B7453', '2024-12-04', '0827767995', 'Ya'),
(95, '<li>Asep 5</li>', 'PT. Sopian Berkah 25', 'B1424', '2025-09-24', '0887124780', 'Tidak'),
(96, '<li>Asep 2</li>', 'PT. Sopian Berkah 70', 'B8253', '2025-02-25', '0815761105', 'Tidak'),
(97, '<li>Asep 32</li>', 'PT. Sopian Berkah 66', 'B3605', '2025-04-01', '0852592240', 'Tidak'),
(98, '<li>Asep 58</li>', 'PT. Sopian Berkah 85', 'B4722', '2025-04-17', '0824594413', 'Tidak'),
(99, '<li>Asep 6</li>', 'PT. Sopian Berkah 47', 'B2647', '2025-07-27', '0833970081', 'Ya'),
(100, '<li>Asep 7</li>', 'PT. Sopian Berkah 34', 'B6539', '2025-03-13', '0847908183', 'Tidak'),
(101, '<li>Asep 76</li>', 'PT. Sopian Berkah 84', 'B8796', '2025-10-23', '0867172725', 'Tidak'),
(102, '<li>Asep 23</li>', 'PT. Sopian Berkah 32', 'B3354', '2025-09-16', '0818891198', 'Ya');

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
-- Dumping data for table `service_record`
--

INSERT INTO `service_record` (`id`, `tanggal`, `nama_pelaksana`, `merek_kendaraan`, `no_kendaraan`, `km_service`, `nama_bengkel`, `rincian`) VALUES
(4, '2024-11-15', 'Asep mujaer', 'KLX', 'BH 151 TT', 2000, 'Ketok magic', 'Ganti oli mesin'),
(6, '2025-09-01', 'Teknisi 10', 'Toyota', 'B1206', 64474, 'Bengkel Jepri Sejahtera', 'Servis rutin'),
(7, '2025-08-16', 'Teknisi 5', 'Nissan', 'B1026', 88860, 'Bengkel Jepri Sejahtera', 'Ganti oli'),
(8, '2025-03-29', 'Teknisi 1', 'Suzuki', 'B1706', 54854, 'Bengkel Ujang', 'Perbaikan rem'),
(9, '2025-05-14', 'Teknisi 1', 'Mitsubishi', 'B3189', 73787, 'Bengkel Asep', 'Ganti oli'),
(10, '2025-05-04', 'Teknisi 10', 'Toyota', 'B4472', 74194, 'Bengkel Jepri Sejahtera', 'Ganti oli'),
(11, '2025-09-09', 'Teknisi 10', 'Mitsubishi', 'B9373', 93062, 'Bengkel Asep', 'Ganti oli'),
(12, '2025-01-19', 'Teknisi 4', 'Toyota', 'B5437', 13046, 'Bengkel Jepri Sejahtera', 'Ganti oli'),
(13, '2025-06-17', 'Teknisi 1', 'Nissan', 'B4469', 60042, 'Bengkel Ujang', 'Perbaikan rem'),
(14, '2025-06-30', 'Teknisi 6', 'Nissan', 'B5597', 27358, 'Bengkel Ujang', 'Servis rutin'),
(15, '2025-07-27', 'Teknisi 9', 'Nissan', 'B9477', 10396, 'Bengkel Jepri Sejahtera', 'Perbaikan rem'),
(16, '2025-06-03', 'Teknisi 5', 'Suzuki', 'B6094', 30334, 'Bengkel Ujang', 'Servis rutin'),
(17, '2025-04-23', 'Teknisi 10', 'Honda', 'B9888', 91931, 'Bengkel Asep', 'Perbaikan rem'),
(18, '2024-11-15', 'Teknisi 10', 'Honda', 'B9037', 87360, 'Bengkel Asep', 'Ganti oli'),
(19, '2025-07-09', 'Teknisi 7', 'Mitsubishi', 'B8108', 74304, 'Bengkel Ujang', 'Ganti oli'),
(20, '2025-06-13', 'Teknisi 8', 'Suzuki', 'B5156', 32958, 'Bengkel Jepri Sejahtera', 'Ganti oli'),
(21, '2025-03-21', 'Teknisi 7', 'Nissan', 'B1101', 41755, 'Bengkel Jepri Sejahtera', 'Ganti oli'),
(22, '2025-04-09', 'Teknisi 4', 'Mitsubishi', 'B8940', 56498, 'Bengkel Jepri Sejahtera', 'Servis rutin'),
(23, '2025-04-15', 'Teknisi 2', 'Honda', 'B1086', 61167, 'Bengkel Ujang', 'Ganti oli'),
(24, '2025-07-03', 'Teknisi 5', 'Mitsubishi', 'B7728', 63393, 'Bengkel Ujang', 'Ganti oli'),
(25, '2025-06-13', 'Teknisi 7', 'Nissan', 'B4059', 30561, 'Bengkel Asep', 'Servis rutin'),
(26, '2024-11-06', 'Teknisi 6', 'Nissan', 'B3837', 46544, 'Bengkel Ujang', 'Ganti oli'),
(27, '2025-05-17', 'Teknisi 7', 'Mitsubishi', 'B6535', 58600, 'Bengkel Ujang', 'Servis rutin'),
(28, '2024-11-04', 'Teknisi 8', 'Suzuki', 'B8323', 67022, 'Bengkel Jepri Sejahtera', 'Servis rutin'),
(29, '2024-11-02', 'Teknisi 6', 'Mitsubishi', 'B4526', 51617, 'Bengkel Asep', 'Servis rutin'),
(30, '2025-09-11', 'Teknisi 9', 'Suzuki', 'B8486', 89565, 'Bengkel Asep', 'Perbaikan rem'),
(31, '2025-07-25', 'Teknisi 5', 'Mitsubishi', 'B3542', 44386, 'Bengkel Ujang', 'Servis rutin'),
(32, '2025-05-31', 'Teknisi 4', 'Nissan', 'B8745', 92369, 'Bengkel Asep', 'Perbaikan rem'),
(33, '2024-12-03', 'Teknisi 5', 'Honda', 'B1483', 34757, 'Bengkel Asep', 'Servis rutin'),
(34, '2024-12-01', 'Teknisi 10', 'Honda', 'B3072', 90528, 'Bengkel Ujang', 'Ganti oli'),
(35, '2025-11-01', 'Teknisi 3', 'Nissan', 'B9624', 75233, 'Bengkel Asep', 'Servis rutin'),
(36, '2025-07-30', 'Teknisi 10', 'Suzuki', 'B4939', 79244, 'Bengkel Asep', 'Servis rutin'),
(37, '2025-04-09', 'Teknisi 6', 'Mitsubishi', 'B9306', 17186, 'Bengkel Asep', 'Ganti oli'),
(38, '2025-02-01', 'Teknisi 6', 'Honda', 'B9631', 49302, 'Bengkel Asep', 'Ganti oli'),
(39, '2024-12-24', 'Teknisi 3', 'Mitsubishi', 'B5005', 54024, 'Bengkel Jepri Sejahtera', 'Perbaikan rem'),
(40, '2025-10-07', 'Teknisi 8', 'Mitsubishi', 'B9746', 92300, 'Bengkel Asep', 'Perbaikan rem'),
(41, '2025-04-02', 'Teknisi 8', 'Suzuki', 'B8166', 82555, 'Bengkel Ujang', 'Servis rutin'),
(42, '2025-06-30', 'Teknisi 4', 'Honda', 'B7074', 21791, 'Bengkel Ujang', 'Ganti oli'),
(43, '2025-08-20', 'Teknisi 9', 'Nissan', 'B1790', 49084, 'Bengkel Ujang', 'Perbaikan rem'),
(44, '2025-08-26', 'Teknisi 2', 'Suzuki', 'B8027', 41865, 'Bengkel Ujang', 'Servis rutin'),
(45, '2024-12-28', 'Teknisi 8', 'Toyota', 'B8947', 16030, 'Bengkel Ujang', 'Ganti oli'),
(46, '2025-08-11', 'Teknisi 1', 'Nissan', 'B4362', 95789, 'Bengkel Asep', 'Servis rutin'),
(47, '2025-05-13', 'Teknisi 4', 'Nissan', 'B4445', 11081, 'Bengkel Ujang', 'Ganti oli'),
(48, '2025-03-12', 'Teknisi 7', 'Suzuki', 'B5769', 61347, 'Bengkel Jepri Sejahtera', 'Perbaikan rem'),
(49, '2025-06-18', 'Teknisi 2', 'Honda', 'B4672', 38269, 'Bengkel Jepri Sejahtera', 'Ganti oli'),
(50, '2025-02-01', 'Teknisi 1', 'Suzuki', 'B1392', 43345, 'Bengkel Asep', 'Perbaikan rem'),
(51, '2025-07-20', 'Teknisi 8', 'Nissan', 'B5371', 37245, 'Bengkel Ujang', 'Ganti oli'),
(52, '2025-09-19', 'Teknisi 5', 'Nissan', 'B7486', 82628, 'Bengkel Ujang', 'Ganti oli'),
(53, '2025-09-21', 'Teknisi 7', 'Toyota', 'B5890', 24019, 'Bengkel Asep', 'Ganti oli'),
(54, '2025-05-25', 'Teknisi 7', 'Mitsubishi', 'B8893', 86853, 'Bengkel Jepri Sejahtera', 'Ganti oli'),
(55, '2025-10-07', 'Teknisi 2', 'Nissan', 'B7688', 30874, 'Bengkel Jepri Sejahtera', 'Ganti oli'),
(56, '2025-09-23', 'Teknisi 1', 'Honda', 'B6035', 92640, 'Bengkel Jepri Sejahtera', 'Servis rutin'),
(57, '2025-01-13', 'Teknisi 7', 'Nissan', 'B5214', 15183, 'Bengkel Jepri Sejahtera', 'Ganti oli'),
(58, '2025-04-14', 'Teknisi 10', 'Mitsubishi', 'B2268', 28729, 'Bengkel Jepri Sejahtera', 'Servis rutin'),
(59, '2024-12-09', 'Teknisi 10', 'Nissan', 'B3190', 26744, 'Bengkel Ujang', 'Ganti oli'),
(60, '2025-08-28', 'Teknisi 8', 'Honda', 'B9159', 56246, 'Bengkel Asep', 'Ganti oli'),
(61, '2025-03-23', 'Teknisi 3', 'Nissan', 'B6955', 68898, 'Bengkel Jepri Sejahtera', 'Perbaikan rem'),
(62, '2025-05-25', 'Teknisi 10', 'Nissan', 'B5116', 64640, 'Bengkel Asep', 'Perbaikan rem'),
(63, '2025-05-10', 'Teknisi 3', 'Honda', 'B2575', 21885, 'Bengkel Asep', 'Servis rutin'),
(64, '2025-04-04', 'Teknisi 4', 'Mitsubishi', 'B6617', 64151, 'Bengkel Jepri Sejahtera', 'Perbaikan rem'),
(65, '2025-01-12', 'Teknisi 4', 'Toyota', 'B5649', 26307, 'Bengkel Ujang', 'Perbaikan rem'),
(66, '2025-01-08', 'Teknisi 1', 'Mitsubishi', 'B4407', 26582, 'Bengkel Jepri Sejahtera', 'Ganti oli'),
(67, '2025-04-14', 'Teknisi 2', 'Nissan', 'B7738', 44579, 'Bengkel Asep', 'Perbaikan rem'),
(68, '2025-08-26', 'Teknisi 2', 'Mitsubishi', 'B4046', 41980, 'Bengkel Ujang', 'Perbaikan rem'),
(69, '2025-07-05', 'Teknisi 1', 'Toyota', 'B3674', 76614, 'Bengkel Ujang', 'Ganti oli'),
(70, '2024-11-13', 'Teknisi 1', 'Nissan', 'B7687', 33847, 'Bengkel Jepri Sejahtera', 'Servis rutin'),
(71, '2025-04-17', 'Teknisi 3', 'Mitsubishi', 'B2675', 25845, 'Bengkel Ujang', 'Ganti oli'),
(72, '2025-10-09', 'Teknisi 4', 'Suzuki', 'B6125', 99782, 'Bengkel Asep', 'Servis rutin'),
(73, '2025-09-10', 'Teknisi 7', 'Nissan', 'B1823', 80608, 'Bengkel Asep', 'Ganti oli'),
(74, '2025-07-26', 'Teknisi 5', 'Toyota', 'B5986', 97475, 'Bengkel Jepri Sejahtera', 'Perbaikan rem'),
(75, '2025-02-03', 'Teknisi 3', 'Toyota', 'B9709', 96380, 'Bengkel Jepri Sejahtera', 'Ganti oli'),
(76, '2025-06-21', 'Teknisi 9', 'Toyota', 'B9002', 86225, 'Bengkel Ujang', 'Perbaikan rem'),
(77, '2025-08-30', 'Teknisi 7', 'Mitsubishi', 'B6639', 20658, 'Bengkel Jepri Sejahtera', 'Ganti oli'),
(78, '2025-01-13', 'Teknisi 2', 'Suzuki', 'B8683', 10737, 'Bengkel Asep', 'Ganti oli'),
(79, '2025-02-14', 'Teknisi 7', 'Toyota', 'B9746', 55786, 'Bengkel Jepri Sejahtera', 'Servis rutin'),
(80, '2025-03-15', 'Teknisi 5', 'Honda', 'B7753', 86318, 'Bengkel Ujang', 'Perbaikan rem'),
(81, '2025-06-16', 'Teknisi 10', 'Suzuki', 'B6330', 78483, 'Bengkel Ujang', 'Ganti oli'),
(82, '2025-05-10', 'Teknisi 6', 'Suzuki', 'B6235', 80700, 'Bengkel Ujang', 'Perbaikan rem'),
(83, '2025-04-12', 'Teknisi 7', 'Toyota', 'B8506', 52886, 'Bengkel Jepri Sejahtera', 'Servis rutin'),
(84, '2025-06-11', 'Teknisi 9', 'Suzuki', 'B6083', 83691, 'Bengkel Jepri Sejahtera', 'Servis rutin'),
(85, '2025-07-21', 'Teknisi 8', 'Nissan', 'B8521', 59143, 'Bengkel Asep', 'Servis rutin'),
(86, '2025-10-09', 'Teknisi 10', 'Toyota', 'B7067', 98041, 'Bengkel Asep', 'Ganti oli'),
(87, '2025-02-15', 'Teknisi 1', 'Honda', 'B5477', 23184, 'Bengkel Jepri Sejahtera', 'Ganti oli'),
(88, '2025-08-19', 'Teknisi 1', 'Honda', 'B1804', 64146, 'Bengkel Jepri Sejahtera', 'Perbaikan rem'),
(89, '2025-08-18', 'Teknisi 2', 'Suzuki', 'B4583', 75888, 'Bengkel Jepri Sejahtera', 'Perbaikan rem'),
(90, '2025-02-19', 'Teknisi 4', 'Toyota', 'B7173', 79006, 'Bengkel Asep', 'Servis rutin'),
(91, '2025-07-03', 'Teknisi 4', 'Suzuki', 'B6968', 60148, 'Bengkel Ujang', 'Ganti oli'),
(92, '2024-12-16', 'Teknisi 7', 'Nissan', 'B3766', 65240, 'Bengkel Jepri Sejahtera', 'Servis rutin'),
(93, '2024-12-10', 'Teknisi 3', 'Mitsubishi', 'B2989', 43369, 'Bengkel Jepri Sejahtera', 'Servis rutin'),
(94, '2025-02-02', 'Teknisi 4', 'Nissan', 'B6767', 58029, 'Bengkel Jepri Sejahtera', 'Ganti oli'),
(95, '2025-10-06', 'Teknisi 9', 'Mitsubishi', 'B3021', 53800, 'Bengkel Jepri Sejahtera', 'Perbaikan rem'),
(96, '2025-07-29', 'Teknisi 3', 'Honda', 'B6088', 84419, 'Bengkel Asep', 'Ganti oli'),
(97, '2025-02-04', 'Teknisi 1', 'Toyota', 'B5934', 51772, 'Bengkel Ujang', 'Servis rutin'),
(98, '2024-12-25', 'Teknisi 9', 'Nissan', 'B4665', 60275, 'Bengkel Asep', 'Ganti oli'),
(99, '2024-11-03', 'Teknisi 1', 'Honda', 'B1616', 89863, 'Bengkel Ujang', 'Servis rutin'),
(100, '2025-06-05', 'Teknisi 8', 'Nissan', 'B1331', 83071, 'Bengkel Jepri Sejahtera', 'Servis rutin'),
(101, '2025-09-04', 'Teknisi 9', 'Honda', 'B8315', 13148, 'Bengkel Asep', 'Ganti oli'),
(102, '2025-01-22', 'Teknisi 9', 'Toyota', 'B2834', 13140, 'Bengkel Ujang', 'Perbaikan rem'),
(103, '2025-04-11', 'Teknisi 3', 'Suzuki', 'B8486', 78088, 'Bengkel Ujang', 'Perbaikan rem'),
(104, '2025-02-01', 'Teknisi 6', 'Toyota', 'B5856', 31126, 'Bengkel Asep', 'Ganti oli'),
(105, '2025-03-19', 'Teknisi 9', 'Mitsubishi', 'B6285', 52700, 'Bengkel Ujang', 'Servis rutin');

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
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=104;

--
-- AUTO_INCREMENT for table `data_barang_internal`
--
ALTER TABLE `data_barang_internal`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=102;

--
-- AUTO_INCREMENT for table `data_mobil`
--
ALTER TABLE `data_mobil`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=107;

--
-- AUTO_INCREMENT for table `data_pengunjung`
--
ALTER TABLE `data_pengunjung`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=103;

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
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=106;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
