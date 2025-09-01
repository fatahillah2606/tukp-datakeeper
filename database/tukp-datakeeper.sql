-- phpMyAdmin SQL Dump
-- version 5.2.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Aug 30, 2025 at 10:09 AM
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
-- Database: `tukp-datakeeper`
--
CREATE DATABASE IF NOT EXISTS `tukp-datakeeper` DEFAULT CHARACTER SET utf8mb4 COLLATE utf8mb4_general_ci;
USE `tukp-datakeeper`;

-- --------------------------------------------------------

--
-- Table structure for table `data_barang_eksternal`
--

DROP TABLE IF EXISTS `data_barang_eksternal`;
CREATE TABLE `data_barang_eksternal` (
  `id_barang_eksternal` int(4) NOT NULL,
  `id_pengguna` int(4) NOT NULL,
  `tanggal` date NOT NULL,
  `nama_driver` varchar(25) NOT NULL,
  `nama_suplier` varchar(25) NOT NULL,
  `keperluan` varchar(25) NOT NULL,
  `nama_jumlah_barang` text NOT NULL,
  `no_kendaraan` varchar(11) NOT NULL,
  `jam_kedatangan` time NOT NULL,
  `keterangan` varchar(50) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `data_barang_eksternal`
--

INSERT INTO `data_barang_eksternal` (`id_barang_eksternal`, `id_pengguna`, `tanggal`, `nama_driver`, `nama_suplier`, `keperluan`, `nama_jumlah_barang`, `no_kendaraan`, `jam_kedatangan`, `keterangan`) VALUES
(1, 2, '2025-08-12', 'Driver 1', 'Suplier 1', 'Antar barang', '[{ \"nama_barang\": \"asd\", \"jumlah_barang\": 12 }]', 'DK 1234 OPQ', '22:01:35', 'barang di return pembeli'),
(2, 2, '2025-08-12', 'Driver 23', 'Suplier 1', 'Antar barang', '[{ \"nama_barang\": \"asd\", \"jumlah_barang\": 14 }]', 'DK 1234 OPQ', '22:01:35', 'barang di return pembeli'),
(3, 2, '2025-08-12', 'Driver 24', 'Suplier 12', 'Antar barang', '[{ \"nama_barang\": \"asd\", \"jumlah_barang\": 16 }]', 'DK 1234 OPQ', '22:01:35', 'barang di return pembeli'),
(4, 2, '2025-08-12', 'Driver 56', 'Suplier 134', 'Antar barang', '[{ \"nama_barang\": \"asd\", \"jumlah_barang\": 45 }]', 'DK 1234 OPQ', '22:01:35', 'barang di return pembeli'),
(5, 2, '2025-08-12', 'Driver 42', 'Suplier 67', 'Antar barang', '[{ \"nama_barang\": \"asd\", \"jumlah_barang\": 164 }]', 'DK 1234 OPQ', '22:01:35', 'barang di return pembeli'),
(6, 2, '2025-08-12', 'Driver 57', 'Suplier 46', 'Antar barang', '[{ \"nama_barang\": \"asd\", \"jumlah_barang\": 58 }]', 'DK 1234 OPQ', '22:01:35', 'barang di return pembeli'),
(7, 2, '2025-08-12', 'Driver 35', 'Suplier 76', 'Antar barang', '[{ \"nama_barang\": \"asd\", \"jumlah_barang\": 23 }]', 'DK 1234 OPQ', '22:01:35', 'barang di return pembeli'),
(8, 2, '2025-08-12', 'Driver 32', 'Suplier 24', 'Antar barang', '[{ \"nama_barang\": \"asd\", \"jumlah_barang\": 14 }]', 'DK 1234 OPQ', '22:01:35', 'barang di return pembeli'),
(9, 2, '2025-08-12', 'Driver 13', 'Suplier 13', 'Antar barang', '[{ \"nama_barang\": \"asd\", \"jumlah_barang\": 13 }]', 'DK 1234 OPQ', '22:01:35', 'barang di return pembeli'),
(10, 2, '2025-08-12', 'Driver 34', 'Suplier 56', 'Antar barang', '[{ \"nama_barang\": \"asd\", \"jumlah_barang\": 67 }]', 'DK 1234 OPQ', '22:01:35', 'barang di return pembeli');

-- --------------------------------------------------------

--
-- Table structure for table `data_barang_internal`
--

DROP TABLE IF EXISTS `data_barang_internal`;
CREATE TABLE `data_barang_internal` (
  `id_barang_internal` int(4) NOT NULL,
  `id_pengguna` int(4) NOT NULL,
  `nama_pembawa` varchar(25) NOT NULL,
  `nama_jumlah_barang` text NOT NULL,
  `tanggal` date NOT NULL,
  `keterangan` varchar(50) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `data_barang_internal`
--

INSERT INTO `data_barang_internal` (`id_barang_internal`, `id_pengguna`, `nama_pembawa`, `nama_jumlah_barang`, `tanggal`, `keterangan`) VALUES
(1, 0, 'driver 24', '[{ \"nama_barang\": \"driver 24\", \"jumlah_barang\": 12 }]', '2024-11-02', 'asd'),
(2, 0, 'Driver_51', '[{ \"nama_barang\": \"asd\", \"jumlah_barang\": 12 },{ \"nama_barang\": \"dsa\", \"jumlah_barang\": 12 }]', '2025-03-12', 'Barang diterima dalam kondisi baik'),
(3, 0, 'Driver_92', '[{ \"nama_barang\": \"asd\", \"jumlah_barang\": 12 },{ \"nama_barang\": \"dsa\", \"jumlah_barang\": 12 }]', '2025-09-10', 'Barang diterima dalam kondisi baik'),
(4, 0, 'Driver_8', '[{ \"nama_barang\": \"asd\", \"jumlah_barang\": 12 },{ \"nama_barang\": \"dsa\", \"jumlah_barang\": 12 }]', '2025-09-12', 'Barang diterima dalam kondisi baik'),
(5, 0, 'Driver_49', '[{ \"nama_barang\": \"asd\", \"jumlah_barang\": 12 },{ \"nama_barang\": \"dsa\", \"jumlah_barang\": 12 }]', '2025-02-13', 'Barang diterima dalam kondisi baik'),
(6, 0, 'Driver_25', '[{ \"nama_barang\": \"asd\", \"jumlah_barang\": 12 },{ \"nama_barang\": \"dsa\", \"jumlah_barang\": 12 }]', '2025-02-24', 'Barang diterima dalam kondisi baik'),
(7, 0, 'Driver_9', '[{ \"nama_barang\": \"asd\", \"jumlah_barang\": 12 },{ \"nama_barang\": \"dsa\", \"jumlah_barang\": 12 }]', '2025-05-17', 'Barang diterima dalam kondisi baik'),
(8, 0, 'Driver_96', '[{ \"nama_barang\": \"asd\", \"jumlah_barang\": 12 },{ \"nama_barang\": \"dsa\", \"jumlah_barang\": 12 }]', '2025-02-02', 'Barang diterima dalam kondisi baik'),
(9, 0, 'Driver_60', '[{ \"nama_barang\": \"asd\", \"jumlah_barang\": 12 },{ \"nama_barang\": \"dsa\", \"jumlah_barang\": 12 }]', '2025-05-23', 'Barang diterima dalam kondisi baik'),
(10, 0, 'Driver_12', '[{ \"nama_barang\": \"asd\", \"jumlah_barang\": 12 },{ \"nama_barang\": \"dsa\", \"jumlah_barang\": 12 }]', '2025-10-31', 'Barang diterima dalam kondisi baik');

-- --------------------------------------------------------

--
-- Table structure for table `data_mobil`
--

DROP TABLE IF EXISTS `data_mobil`;
CREATE TABLE `data_mobil` (
  `id_mobil` int(4) NOT NULL,
  `id_pengguna` int(4) NOT NULL,
  `tanggal` date NOT NULL,
  `nama_driver` varchar(25) NOT NULL,
  `merek_kendaraan` varchar(25) NOT NULL,
  `no_kendaraan` varchar(11) NOT NULL,
  `km_awal` int(6) NOT NULL,
  `km_akhir` int(6) NOT NULL,
  `tujuan` varchar(25) NOT NULL,
  `keperluan` varchar(50) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `data_mobil`
--

INSERT INTO `data_mobil` (`id_mobil`, `id_pengguna`, `tanggal`, `nama_driver`, `merek_kendaraan`, `no_kendaraan`, `km_awal`, `km_akhir`, `tujuan`, `keperluan`) VALUES
(1, 0, '2024-11-02', 'asd', 'asd', 'asd', 12, 12, 'asd', 'asd'),
(3, 0, '2024-11-06', 'sd', 'Grandmax', 'asd', 12, 12, 'asd', 'asd'),
(4, 0, '2023-09-01', 'Driver_49', 'Toyota', 'B4907', 96319, 34417, 'Jakarta', 'Perjalanan Dinas'),
(5, 0, '2023-11-11', 'Driver_28', 'Toyota', 'B8496', 39017, 40246, 'Jakarta', 'Perjalanan Dinas'),
(6, 0, '2023-10-15', 'Driver_551', 'Honda', 'B 3696 XYZ', 32662, 83411, 'Yogyakarta', 'Dinas'),
(7, 0, '2025-09-09', 'Driver_17', 'Honda', 'B6450', 28774, 151725, 'Bandung', 'Pribadi'),
(8, 0, '2025-03-15', 'Driver_81', 'Mitsubishi', 'B8949', 73568, 112581, 'Surabaya', 'Perjalanan Dinas'),
(9, 0, '2025-10-12', 'Driver_5', 'Toyota', 'B4056', 22525, 183113, 'Surabaya', 'Perjalanan Dinas'),
(10, 0, '2025-04-29', 'Driver_86', 'Toyota', 'B6032', 18503, 152973, 'Jakarta', 'Antar Barang'),
(11, 0, '2025-07-02', 'Driver_17', 'Mitsubishi', 'B2644', 48354, 130166, 'Jakarta', 'Perjalanan Dinas'),
(12, 0, '2025-03-08', 'Driver_8', 'Nissan', 'B9392', 65443, 112925, 'Makassar', 'Pribadi'),
(13, 0, '2025-05-08', 'Driver_18', 'Nissan', 'B5716', 37864, 116982, 'Medan', 'Perjalanan Dinas'),
(14, 0, '2025-07-21', 'Driver_99', 'Toyota', 'B6547', 47985, 135128, 'Jakarta', 'Antar Barang'),
(15, 0, '2025-06-26', 'Driver_87', 'Toyota', 'B7815', 80300, 150444, 'Medan', 'Pribadi'),
(16, 0, '2025-05-22', 'Driver_68', 'Nissan', 'B3032', 57084, 164783, 'Jakarta', 'Antar Barang'),
(17, 0, '2025-02-22', 'Driver_100', 'Suzuki', 'B3263', 96815, 155796, 'Surabaya', 'Pribadi'),
(18, 0, '2025-07-17', 'Driver_63', 'Mitsubishi', 'B5425', 69991, 117158, 'Makassar', 'Pribadi'),
(19, 0, '2025-09-25', 'Driver_32', 'Suzuki', 'B6129', 29258, 113786, 'Bandung', 'Antar Barang'),
(20, 0, '2025-03-24', 'Driver_14', 'Suzuki', 'B9831', 82650, 145885, 'Makassar', 'Antar Barang'),
(21, 0, '2025-05-29', 'Driver_15', 'Suzuki', 'B8178', 77383, 184060, 'Makassar', 'Pribadi'),
(22, 0, '2025-01-05', 'Driver_53', 'Honda', 'B8495', 88391, 182715, 'Bandung', 'Antar Barang'),
(23, 0, '2025-09-11', 'Driver_13', 'Suzuki', 'B7825', 32609, 125313, 'Makassar', 'Perjalanan Dinas'),
(24, 0, '2025-01-29', 'Driver_79', 'Honda', 'B5787', 17089, 193450, 'Surabaya', 'Perjalanan Dinas'),
(25, 0, '2024-11-12', 'Driver_14', 'Honda', 'B7215', 95955, 146694, 'Surabaya', 'Perjalanan Dinas'),
(26, 0, '2025-02-26', 'Driver_20', 'Suzuki', 'B8106', 25832, 152669, 'Bandung', 'Perjalanan Dinas'),
(27, 0, '2025-07-27', 'Driver_33', 'Honda', 'B9621', 59272, 184934, 'Surabaya', 'Antar Barang'),
(28, 0, '2025-01-11', 'Driver_40', 'Nissan', 'B7010', 43517, 126185, 'Makassar', 'Pribadi'),
(29, 0, '2025-04-05', 'Driver_37', 'Suzuki', 'B1736', 79677, 173010, 'Surabaya', 'Antar Barang'),
(30, 0, '2025-01-03', 'Driver_13', 'Honda', 'B7292', 57731, 189663, 'Jakarta', 'Pribadi'),
(31, 0, '2025-03-12', 'Driver_41', 'Suzuki', 'B7782', 22631, 190151, 'Medan', 'Antar Barang'),
(32, 0, '2025-08-02', 'Driver_38', 'Honda', 'B7593', 39250, 155014, 'Jakarta', 'Antar Barang'),
(33, 0, '2025-03-29', 'Driver_94', 'Toyota', 'B2165', 13007, 196679, 'Medan', 'Antar Barang'),
(34, 0, '2024-12-06', 'Driver_16', 'Nissan', 'B2971', 40851, 180653, 'Surabaya', 'Antar Barang'),
(35, 0, '2024-11-11', 'Driver_4', 'Honda', 'B4158', 60757, 133833, 'Jakarta', 'Pribadi'),
(36, 0, '2025-10-22', 'Driver_6', 'Mitsubishi', 'B5296', 66785, 117575, 'Surabaya', 'Pribadi'),
(37, 0, '2025-09-09', 'Driver_13', 'Toyota', 'B1341', 50094, 123246, 'Jakarta', 'Perjalanan Dinas'),
(38, 0, '2025-04-23', 'Driver_30', 'Toyota', 'B1280', 77286, 152743, 'Makassar', 'Perjalanan Dinas'),
(39, 0, '2025-01-29', 'Driver_99', 'Mitsubishi', 'B7871', 86943, 149469, 'Surabaya', 'Perjalanan Dinas'),
(40, 0, '2025-04-23', 'Driver_26', 'Toyota', 'B5173', 25068, 165641, 'Bandung', 'Perjalanan Dinas'),
(41, 0, '2025-08-27', 'Driver_32', 'Honda', 'B1399', 75577, 122632, 'Bandung', 'Perjalanan Dinas'),
(42, 0, '2024-12-17', 'Driver_64', 'Honda', 'B4542', 72868, 123830, 'Jakarta', 'Pribadi'),
(43, 0, '2025-10-16', 'Driver_67', 'Toyota', 'B7234', 12800, 186722, 'Bandung', 'Perjalanan Dinas'),
(44, 0, '2025-09-26', 'Driver_88', 'Honda', 'B6343', 24929, 141145, 'Bandung', 'Pribadi'),
(45, 0, '2025-07-22', 'Driver_52', 'Mitsubishi', 'B6989', 38139, 173689, 'Bandung', 'Perjalanan Dinas'),
(46, 0, '2025-02-25', 'Driver_81', 'Mitsubishi', 'B1153', 70353, 147533, 'Medan', 'Pribadi'),
(47, 0, '2024-12-21', 'Driver_79', 'Suzuki', 'B7395', 63501, 166418, 'Jakarta', 'Pribadi'),
(48, 0, '2025-09-04', 'Driver_66', 'Toyota', 'B5880', 87464, 150910, 'Makassar', 'Antar Barang'),
(49, 0, '2025-05-07', 'Driver_94', 'Mitsubishi', 'B9762', 92892, 152188, 'Surabaya', 'Antar Barang'),
(50, 0, '2025-10-17', 'Driver_72', 'Mitsubishi', 'B7127', 92067, 181992, 'Medan', 'Antar Barang'),
(51, 0, '2025-02-05', 'Driver_14', 'Toyota', 'B2956', 18835, 187636, 'Bandung', 'Perjalanan Dinas'),
(52, 0, '2024-12-03', 'Driver_20', 'Nissan', 'B1066', 80810, 190995, 'Makassar', 'Perjalanan Dinas'),
(53, 0, '2025-05-12', 'Driver_78', 'Nissan', 'B7152', 38278, 181690, 'Medan', 'Perjalanan Dinas'),
(54, 0, '2025-07-01', 'Driver_58', 'Honda', 'B8579', 76946, 136834, 'Bandung', 'Pribadi'),
(55, 0, '2025-02-15', 'Driver_29', 'Honda', 'B6769', 68974, 151425, 'Surabaya', 'Pribadi'),
(56, 0, '2025-07-26', 'Driver_22', 'Honda', 'B4547', 24044, 188449, 'Jakarta', 'Pribadi'),
(57, 0, '2025-03-18', 'Driver_69', 'Honda', 'B8655', 57742, 187428, 'Jakarta', 'Antar Barang'),
(58, 0, '2025-02-03', 'Driver_86', 'Suzuki', 'B1749', 39545, 113793, 'Jakarta', 'Perjalanan Dinas'),
(59, 0, '2025-09-10', 'Driver_90', 'Honda', 'B2966', 68579, 129019, 'Jakarta', 'Antar Barang'),
(60, 0, '2025-10-16', 'Driver_86', 'Suzuki', 'B3177', 31093, 194441, 'Surabaya', 'Antar Barang'),
(61, 0, '2025-08-07', 'Driver_4', 'Suzuki', 'B1674', 53935, 185422, 'Surabaya', 'Pribadi'),
(62, 0, '2025-01-20', 'Driver_34', 'Nissan', 'B5057', 17594, 146075, 'Jakarta', 'Antar Barang'),
(63, 0, '2025-08-18', 'Driver_33', 'Suzuki', 'B2862', 44631, 172569, 'Bandung', 'Perjalanan Dinas'),
(64, 0, '2025-10-12', 'Driver_82', 'Suzuki', 'B7122', 76942, 111829, 'Surabaya', 'Antar Barang'),
(65, 0, '2025-01-23', 'Driver_14', 'Suzuki', 'B2371', 50775, 110072, 'Surabaya', 'Perjalanan Dinas'),
(66, 0, '2024-11-13', 'Driver_3', 'Suzuki', 'B2465', 29719, 130513, 'Bandung', 'Pribadi'),
(67, 0, '2025-10-18', 'Driver_8', 'Mitsubishi', 'B1014', 84265, 123071, 'Jakarta', 'Antar Barang'),
(68, 0, '2024-12-13', 'Driver_79', 'Toyota', 'B1516', 68507, 185245, 'Surabaya', 'Pribadi'),
(69, 0, '2025-07-22', 'Driver_84', 'Suzuki', 'B3123', 75271, 143948, 'Medan', 'Pribadi'),
(70, 0, '2025-06-01', 'Driver_9', 'Toyota', 'B9635', 71134, 128679, 'Bandung', 'Perjalanan Dinas'),
(71, 0, '2024-12-13', 'Driver_5', 'Mitsubishi', 'B3495', 61662, 111869, 'Jakarta', 'Antar Barang'),
(72, 0, '2024-11-20', 'Driver_75', 'Suzuki', 'B7388', 93192, 187165, 'Surabaya', 'Antar Barang'),
(73, 0, '2025-05-28', 'Driver_13', 'Toyota', 'B3927', 66208, 194614, 'Medan', 'Perjalanan Dinas'),
(74, 0, '2025-07-16', 'Driver_11', 'Mitsubishi', 'B4467', 18160, 167425, 'Bandung', 'Pribadi'),
(75, 0, '2025-02-12', 'Driver_42', 'Nissan', 'B5736', 51118, 113440, 'Bandung', 'Perjalanan Dinas'),
(76, 0, '2025-06-03', 'Driver_38', 'Toyota', 'B7100', 88513, 140744, 'Makassar', 'Perjalanan Dinas'),
(77, 0, '2025-01-25', 'Driver_75', 'Mitsubishi', 'B3522', 18825, 174131, 'Medan', 'Perjalanan Dinas'),
(78, 0, '2025-01-17', 'Driver_61', 'Toyota', 'B8264', 98067, 190820, 'Jakarta', 'Perjalanan Dinas'),
(79, 0, '2025-03-27', 'Driver_75', 'Honda', 'B9245', 25527, 117359, 'Jakarta', 'Antar Barang'),
(80, 0, '2024-11-21', 'Driver_68', 'Suzuki', 'B3191', 67053, 152712, 'Jakarta', 'Antar Barang'),
(81, 0, '2025-03-28', 'Driver_100', 'Nissan', 'B4486', 97802, 132962, 'Medan', 'Perjalanan Dinas'),
(82, 0, '2025-02-10', 'Driver_36', 'Mitsubishi', 'B8866', 37098, 135924, 'Medan', 'Pribadi'),
(83, 0, '2024-12-30', 'Driver_98', 'Toyota', 'B8021', 37388, 198775, 'Surabaya', 'Perjalanan Dinas'),
(84, 0, '2024-12-02', 'Driver_51', 'Toyota', 'B4484', 65119, 168967, 'Surabaya', 'Antar Barang'),
(85, 0, '2025-07-17', 'Driver_2', 'Mitsubishi', 'B6817', 81169, 149028, 'Surabaya', 'Pribadi'),
(86, 0, '2024-11-19', 'Driver_46', 'Nissan', 'B3626', 67718, 194275, 'Medan', 'Perjalanan Dinas'),
(87, 0, '2025-04-05', 'Driver_51', 'Toyota', 'B6150', 82849, 182419, 'Makassar', 'Antar Barang'),
(88, 0, '2024-12-08', 'Driver_76', 'Toyota', 'B9199', 49487, 168790, 'Medan', 'Antar Barang'),
(89, 0, '2025-08-18', 'Driver_77', 'Suzuki', 'B6542', 18254, 129217, 'Medan', 'Pribadi'),
(90, 0, '2025-02-12', 'Driver_47', 'Toyota', 'B3427', 92174, 182722, 'Medan', 'Perjalanan Dinas'),
(91, 0, '2024-12-09', 'Driver_96', 'Nissan', 'B3315', 50145, 139379, 'Makassar', 'Perjalanan Dinas'),
(92, 0, '2025-02-14', 'Driver_62', 'Toyota', 'B7125', 72705, 140776, 'Makassar', 'Pribadi'),
(93, 0, '2025-07-18', 'Driver_18', 'Mitsubishi', 'B6032', 45877, 123962, 'Makassar', 'Perjalanan Dinas'),
(94, 0, '2025-07-25', 'Driver_30', 'Honda', 'B6325', 71365, 111747, 'Bandung', 'Perjalanan Dinas'),
(95, 0, '2025-07-11', 'Driver_45', 'Toyota', 'B7118', 90459, 138098, 'Bandung', 'Perjalanan Dinas'),
(96, 0, '2025-01-07', 'Driver_92', 'Mitsubishi', 'B9652', 80361, 116245, 'Makassar', 'Antar Barang'),
(97, 0, '2025-09-30', 'Driver_96', 'Nissan', 'B4131', 32293, 139537, 'Bandung', 'Perjalanan Dinas'),
(98, 0, '2024-12-17', 'Driver_57', 'Nissan', 'B2928', 39362, 144243, 'Bandung', 'Antar Barang'),
(99, 0, '2025-04-28', 'Driver_7', 'Suzuki', 'B5684', 51468, 142614, 'Jakarta', 'Perjalanan Dinas'),
(100, 0, '2025-04-04', 'Driver_5', 'Nissan', 'B2502', 32095, 161180, 'Medan', 'Perjalanan Dinas'),
(101, 0, '2024-12-15', 'Driver_23', 'Honda', 'B2629', 67442, 153721, 'Medan', 'Antar Barang'),
(102, 0, '2025-02-03', 'Driver_92', 'Mitsubishi', 'B4484', 90916, 124995, 'Makassar', 'Pribadi'),
(103, 0, '2024-12-05', 'Driver_54', 'Mitsubishi', 'B4197', 47404, 142497, 'Bandung', 'Antar Barang'),
(104, 0, '2025-05-07', 'Driver_45', 'Suzuki', 'B9697', 39793, 190642, 'Makassar', 'Perjalanan Dinas'),
(105, 0, '2025-03-13', 'Driver_18', 'Nissan', 'B1027', 86265, 150342, 'Surabaya', 'Antar Barang'),
(106, 0, '2025-01-13', 'Driver_30', 'Toyota', 'B8843', 60705, 110404, 'Surabaya', 'Pribadi');

-- --------------------------------------------------------

--
-- Table structure for table `data_pengunjung`
--

DROP TABLE IF EXISTS `data_pengunjung`;
CREATE TABLE `data_pengunjung` (
  `id_pengunjung` int(4) NOT NULL,
  `id_pengguna` int(4) NOT NULL,
  `nama_pengunjung` text NOT NULL,
  `nama_perusahaan` varchar(25) NOT NULL,
  `no_kendaraan` varchar(11) NOT NULL,
  `tanggal` date NOT NULL,
  `no_telpon` varchar(13) NOT NULL,
  `keperluan` text NOT NULL,
  `safety_induction` enum('Ya','Tidak') NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `data_pengunjung`
--

INSERT INTO `data_pengunjung` (`id_pengunjung`, `id_pengguna`, `nama_pengunjung`, `nama_perusahaan`, `no_kendaraan`, `tanggal`, `no_telpon`, `keperluan`, `safety_induction`) VALUES
(1, 0, '[\"Ajis\",\"Dzaki\"]', 'CV. ABC', 'B 1212 CYG', '1212-12-12', '081245678900', 'survey', 'Tidak'),
(2, 0, '[\"Galang\",\"Fadel\"]', 'CV. Bahtera Cahaya Expres', 'A 1234 BCE', '2024-10-30', '08123456789', '', 'Ya'),
(95, 0, '[\"Fatah\"]', 'CV. Take Taka', 'B 1424 TT', '2025-09-24', '0887124780', '', 'Tidak'),
(103, 0, '[\"Rahman\"]', 'CV. ABC', 'B 1212 CYG', '1212-12-12', '081245678900', '', 'Tidak'),
(104, 0, '[\"Duhan\"]', 'CV. Bahtera Cahaya Expres', 'A 1234 BCE', '2024-10-30', '08123456789', '', 'Ya'),
(105, 0, '[\"Abu\"]', 'CV. Take Taka', 'B 1424 TT', '2025-09-24', '0887124780', '', 'Tidak'),
(106, 0, '[\"Fajri\"]', 'CV. ABC', 'B 1212 CYG', '1212-12-12', '081245678900', '', 'Tidak'),
(107, 0, '[\"Al\"]', 'CV. Bahtera Cahaya Expres', 'A 1234 BCE', '2024-10-30', '08123456789', '', 'Ya'),
(108, 0, '[\"Mansur\"]', 'CV. Take Taka', 'B 1424 TT', '2025-09-24', '0887124780', '', 'Tidak'),
(109, 0, '[\"Awan\"]', 'CV. Bahtera Cahaya Expres', 'A 1234 BCE', '2024-10-30', '08123456789', '', 'Ya'),
(110, 0, '[\"Muhammad\"]', 'CV. Take Taka', 'B 1424 TT', '2025-09-24', '0887124780', '', 'Tidak'),
(111, 0, '[\"Awan\"]', 'CV. Bahtera Cahaya Expres', 'A 1234 BCE', '2024-10-30', '08123456789', '', 'Ya'),
(112, 0, '[\"Muhammad\"]', 'CV. Take Taka', 'B 1424 TT', '2025-09-24', '0887124780', '', 'Tidak');

-- --------------------------------------------------------

--
-- Table structure for table `pengguna`
--

DROP TABLE IF EXISTS `pengguna`;
CREATE TABLE `pengguna` (
  `id_pengguna` int(4) NOT NULL,
  `id_user` int(4) DEFAULT NULL,
  `email_user` varchar(25) DEFAULT NULL,
  `nama_user` varchar(25) NOT NULL,
  `role` enum('Admin','Security','Tamu') NOT NULL,
  `password` varchar(60) NOT NULL,
  `token_login` varchar(60) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `pengguna`
--

INSERT INTO `pengguna` (`id_pengguna`, `id_user`, `email_user`, `nama_user`, `role`, `password`, `token_login`) VALUES
(2, NULL, 'andika@admin', 'Andika', 'Admin', '$2y$10$Rq1XpfSihvZ4ZnWpJiASHO8XkHxNCsiEYy2FIVsNFgTLgNk8.DNyW', '$2y$10$XCx0tG1FHOp.s8ujXAjF8uxhKtBtZK3VfyPAX1Fh7F/KRN0hiQKN6'),
(6, NULL, 'mei@raiden', 'Raiden Mei', 'Admin', '$2y$10$77RdRcSgvQ5jyTRI9y0UMuwH5qrbymOUvFrx0nDLvEH.wUNt582XC', '$2y$10$fEFPi/Y2ywZLTT7A/W.eKealLUXuF95dyloLK.E5.sDK5bZqjEf7e'),
(9, NULL, NULL, 'Tamu', 'Tamu', '$2b$12$4dPcke2nSNLdH2mctYhxIOFeXoCwO1f7jX8nEYflP6oLLpsmgbZC.', '$2y$10$yPKodAfRiGVRq6rDSGb5oeIachFfWUTLV34iq8jchTwhN8KcSfgB6'),
(18, NULL, 'CODOTERS@admin', 'Andika', 'Admin', '$2y$10$O0zOLoVPB8oWAiXeIj4pkOEU14BEsJmamILyopyZ9ZbCQhE8lswGu', NULL),
(19, 1234, NULL, 'tes1234', 'Security', '$2y$10$W0XytEuSqOD3/B.0SP.pMOcvufwV5cIWBl8gXU2z9yS1QY31vMHqC', '$2y$10$6cO6IMxAk.gtDHWN8n4B7O7aIUPunc9YuOv3E.mCeuxn.CkLendXy'),
(21, 1224, NULL, 'Andika', 'Security', '$2y$10$E28cahcnEMJd.QV./5HfJu19PpRdMyl4fhsnWXvgrSr.e6KSuLQOK', '$2y$10$A4azbEUlPe/p4cl0zOjRUOaL.4oLB1/h6BxVVaYOkzWp178FYbKOK');

-- --------------------------------------------------------

--
-- Table structure for table `pengumuman`
--

DROP TABLE IF EXISTS `pengumuman`;
CREATE TABLE `pengumuman` (
  `id_pengumuman` int(4) NOT NULL,
  `id_pengguna` int(4) NOT NULL,
  `judul_pengumuman` varchar(25) NOT NULL,
  `isi_pengumuman` text NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `pengumuman`
--

INSERT INTO `pengumuman` (`id_pengumuman`, `id_pengguna`, `judul_pengumuman`, `isi_pengumuman`) VALUES
(2, 0, 'Update 9/22/24', 'Fix non-unique id'),
(4, 0, 'Update 9/26/24', 'Change the login system using sessions'),
(6, 0, 'Update 9/28/24', '	\nUsers will be logged out if their password is reset.'),
(7, 0, 'Update 10/8/2024', 'Added &quot;Nomor Kendaraan&quot; on &quot;Data Pengunjung&quot; and &quot;Data Kilometer Mobil&quot;'),
(18, 0, 'Update 10/10/2024', 'Transition improvement'),
(19, 0, 'Update 10/30/2024', 'Added Safety Induction check to &quot;Data Pengunjung&quot;'),
(20, 0, 'Update 2/11/2024', 'Create a service record form and add a date column to the vehicle kilometers form.');

-- --------------------------------------------------------

--
-- Table structure for table `reset_sandi`
--

DROP TABLE IF EXISTS `reset_sandi`;
CREATE TABLE `reset_sandi` (
  `id_reset_sandi` int(4) NOT NULL,
  `cari_pengguna` varchar(25) NOT NULL,
  `dibaca` tinyint(1) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Indexes for dumped tables
--

--
-- Indexes for table `data_barang_eksternal`
--
ALTER TABLE `data_barang_eksternal`
  ADD PRIMARY KEY (`id_barang_eksternal`),
  ADD KEY `id_pengguna` (`id_pengguna`);

--
-- Indexes for table `data_barang_internal`
--
ALTER TABLE `data_barang_internal`
  ADD PRIMARY KEY (`id_barang_internal`),
  ADD KEY `id_pengguna` (`id_pengguna`);

--
-- Indexes for table `data_mobil`
--
ALTER TABLE `data_mobil`
  ADD PRIMARY KEY (`id_mobil`),
  ADD KEY `id_pengguna` (`id_pengguna`);

--
-- Indexes for table `data_pengunjung`
--
ALTER TABLE `data_pengunjung`
  ADD PRIMARY KEY (`id_pengunjung`);

--
-- Indexes for table `pengguna`
--
ALTER TABLE `pengguna`
  ADD PRIMARY KEY (`id_pengguna`),
  ADD UNIQUE KEY `token_login` (`token_login`),
  ADD UNIQUE KEY `id-user` (`id_user`),
  ADD UNIQUE KEY `email-user` (`email_user`),
  ADD UNIQUE KEY `id_user` (`id_user`,`email_user`,`token_login`);

--
-- Indexes for table `pengumuman`
--
ALTER TABLE `pengumuman`
  ADD PRIMARY KEY (`id_pengumuman`),
  ADD KEY `id_pengguna` (`id_pengguna`);

--
-- Indexes for table `reset_sandi`
--
ALTER TABLE `reset_sandi`
  ADD PRIMARY KEY (`id_reset_sandi`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `data_barang_eksternal`
--
ALTER TABLE `data_barang_eksternal`
  MODIFY `id_barang_eksternal` int(4) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=11;

--
-- AUTO_INCREMENT for table `data_barang_internal`
--
ALTER TABLE `data_barang_internal`
  MODIFY `id_barang_internal` int(4) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=11;

--
-- AUTO_INCREMENT for table `data_mobil`
--
ALTER TABLE `data_mobil`
  MODIFY `id_mobil` int(4) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=107;

--
-- AUTO_INCREMENT for table `data_pengunjung`
--
ALTER TABLE `data_pengunjung`
  MODIFY `id_pengunjung` int(4) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=113;

--
-- AUTO_INCREMENT for table `pengguna`
--
ALTER TABLE `pengguna`
  MODIFY `id_pengguna` int(4) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=34;

--
-- AUTO_INCREMENT for table `pengumuman`
--
ALTER TABLE `pengumuman`
  MODIFY `id_pengumuman` int(4) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=21;

--
-- AUTO_INCREMENT for table `reset_sandi`
--
ALTER TABLE `reset_sandi`
  MODIFY `id_reset_sandi` int(4) NOT NULL AUTO_INCREMENT;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
