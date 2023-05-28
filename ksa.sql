-- phpMyAdmin SQL Dump
-- version 5.2.0
-- https://www.phpmyadmin.net/
--
-- Host: localhost
-- Generation Time: Jan 27, 2023 at 05:47 PM
-- Server version: 10.4.24-MariaDB
-- PHP Version: 7.4.29

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `ksa`
--

-- --------------------------------------------------------

--
-- Table structure for table `tb_barang`
--

CREATE TABLE `tb_barang` (
  `id` int(11) NOT NULL,
  `kode_barang` varchar(128) NOT NULL,
  `nama_barang` varchar(128) NOT NULL,
  `stok_barang` int(11) NOT NULL,
  `kemasan` int(128) NOT NULL,
  `satuan` varchar(128) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `tb_barang`
--

INSERT INTO `tb_barang` (`id`, `kode_barang`, `nama_barang`, `stok_barang`, `kemasan`, `satuan`) VALUES
(1, 'AF5405/00', 'WATHER BASE TOP COAT', 30, 25, 'LT'),
(2, '530:05590/A', 'PU TOPCOAT', 22, 18, 'KG'),
(4, 'AZ2705/00', 'WATHERBASE TOPCOAT', 50, 25, 'LT'),
(5, 'AF5410/00', 'WATHERBASE TOPCOAT', 15, 25, 'LT'),
(7, '430C42414M', 'NC TOP COAT SHEEN 40', 41, 208, 'KG'),
(9, 'EL87003/C', 'BLOCKING', 30, 20, 'LT'),
(10, 'AF5410/00', 'WATHERBASE TOPCOAT', 15, 5, 'LT'),
(11, 'EL 87003/C GREY 4H', 'BASECOAT COLOR', 10, 20, 'LT'),
(13, 'AM0562 GREY WGTK', 'Basecoat RH', 10, 25, 'KG'),
(14, 'warna usm', 'warna', 11, 25, 'LT');

-- --------------------------------------------------------

--
-- Table structure for table `tb_barang_gk`
--

CREATE TABLE `tb_barang_gk` (
  `id` int(11) NOT NULL,
  `kode_barang` varchar(128) NOT NULL,
  `nama_barang` varchar(128) NOT NULL,
  `stok_barang` int(128) NOT NULL,
  `satuan` varchar(10) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `tb_barang_gk`
--

INSERT INTO `tb_barang_gk` (`id`, `kode_barang`, `nama_barang`, `stok_barang`, `satuan`) VALUES
(3, 'AF5405/00', 'whaterbase topcoat', 23200, 'ml'),
(4, '530:05590/A', 'PU TOP COAT', 25000, 'grm'),
(12, 'AF5410/00', 'WATHERBASE TOPCOAT', 50000, 'ml'),
(18, 'AM0562 GREY WGTK', 'Basecoat RH', 20000, 'gram');

-- --------------------------------------------------------

--
-- Table structure for table `tb_barang_keluar`
--

CREATE TABLE `tb_barang_keluar` (
  `id` int(11) NOT NULL,
  `id_barang` int(128) NOT NULL,
  `satuan` varchar(128) NOT NULL,
  `kemasan` int(128) NOT NULL,
  `qty` int(128) NOT NULL,
  `date` varchar(12) NOT NULL,
  `detail` varchar(286) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `tb_barang_keluar`
--

INSERT INTO `tb_barang_keluar` (`id`, `id_barang`, `satuan`, `kemasan`, `qty`, `date`, `detail`) VALUES
(10, 5, 'LT', 25, 7, ' 16 / 01 / 2', 'KIrim PT. EURO DESIGN'),
(11, 4, 'LT', 25, 3, ' 16 / 01 / 2', 'Kirim PT. Mandiri Abadi'),
(12, 2, 'LT', 19, 3, ' 16 / 01 / 2', 'kirim PT. Triconvile'),
(13, 7, 'LT', 208, 9, ' 28 / 01 / 2', 'KIrim PT. DANWOOD'),
(15, 9, 'LT', 20, 5, ' 27 / 06 / 2', 'KIrim PT. DANWOOD'),
(18, 10, 'LT', 5, 1, ' 29 / 06 / 2', 'Kirim PT. Mandiri Abadi'),
(19, 10, 'LT', 5, 1, ' 29 / 06 / 2', 'KIrim PT. EURO DESIGN'),
(20, 5, 'LT', 25, 6, ' 29 / 06 / 2', 'Kirim PT. Mandiri Abadi'),
(23, 11, 'LT', 20, 8, ' 27 / 08 / 2', 'order rajawali'),
(24, 1, 'LT', 25, 3, ' 20 / 10 / 2', 'kirim usm'),
(25, 13, 'LT', 25, 5, ' 22 / 12 / 2', 'Kirim PT. Mandiri Abadi'),
(26, 14, 'LT', 25, 2, ' 27 / 12 / 2', 'kirim di usm');

-- --------------------------------------------------------

--
-- Table structure for table `tb_barang_keluar_gk`
--

CREATE TABLE `tb_barang_keluar_gk` (
  `id` int(11) NOT NULL,
  `id_barang` int(11) NOT NULL,
  `satuan` varchar(128) NOT NULL,
  `qty` int(128) NOT NULL,
  `date` varchar(12) NOT NULL,
  `detail` varchar(286) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `tb_barang_keluar_gk`
--

INSERT INTO `tb_barang_keluar_gk` (`id`, `id_barang`, `satuan`, `qty`, `date`, `detail`) VALUES
(1, 12, 'ml', 15000, ' 10 / 07 / 2', 'po danwood'),
(2, 3, 'ml', 10000, '10/9/2022', 'po danwood\r\n'),
(3, 4, 'ml', 10000, ' 10 / 07 / 2', 'po paliser'),
(7, 16, 'ml', 10000, ' 27 / 08 / 2', 'po mandiri abadi'),
(8, 18, 'gram', 10000, ' 22 / 12 / 2', 'sample RH');

-- --------------------------------------------------------

--
-- Table structure for table `tb_barang_masuk`
--

CREATE TABLE `tb_barang_masuk` (
  `id` int(11) NOT NULL,
  `id_barang` int(7) NOT NULL,
  `satuan` varchar(7) NOT NULL,
  `kemasan` int(128) NOT NULL,
  `qty` int(128) NOT NULL,
  `date` varchar(12) NOT NULL,
  `detail` varchar(256) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `tb_barang_masuk`
--

INSERT INTO `tb_barang_masuk` (`id`, `id_barang`, `satuan`, `kemasan`, `qty`, `date`, `detail`) VALUES
(20, 5, 'LT', 25, 5, ' 16 / 01 / 2', 'dari ksa pusat jakarta'),
(21, 6, 'LT', 25, 7, ' 16 / 01 / 2', 'dari Sherwin surabaya'),
(22, 4, 'LT', 25, 9, ' 16 / 01 / 2', 'dari ksa cabang Bali'),
(23, 7, 'KG', 208, 30, ' 28 / 01 / 2', 'dari Sherwin surabaya'),
(24, 5, 'LT', 25, 15, ' 29 / 06 / 2', 'dari ksa pusat jakarta'),
(25, 10, 'LT', 5, 10, ' 29 / 06 / 2', 'dari ksa cabang Bali'),
(26, 11, 'LT', 20, 8, ' 27 / 08 / 2', 'dari produksi'),
(27, 1, 'LT', 25, 3, ' 20 / 10 / 2', 'return dari usm'),
(28, 5, 'LT', 25, 5, ' 22 / 12 / 2', 'Hasil dari produksi'),
(29, 13, 'LT', 25, 5, ' 22 / 12 / 2', 'Hasil dari produksi'),
(30, 14, 'LT', 25, 3, ' 27 / 12 / 2', 'dari produksi');

-- --------------------------------------------------------

--
-- Table structure for table `tb_barang_masuk_gk`
--

CREATE TABLE `tb_barang_masuk_gk` (
  `id` int(11) NOT NULL,
  `id_barang` int(11) NOT NULL,
  `satuan` varchar(7) NOT NULL,
  `qty` int(128) NOT NULL,
  `date` varchar(12) NOT NULL,
  `detail` varchar(256) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `tb_barang_masuk_gk`
--

INSERT INTO `tb_barang_masuk_gk` (`id`, `id_barang`, `satuan`, `qty`, `date`, `detail`) VALUES
(2, 3, 'ml', 100, '20/6/2022', 'sembarangan'),
(9, 3, 'ml', 150, ' 04 / 07 / 2', 'produksi af5410'),
(15, 3, 'mg', 5000, ' 06 / 07 / 2', 'produksi'),
(16, 0, 'ml', 1000, ' 09 / 07 / 2', 'spbi'),
(18, 16, 'ml', 10000, ' 27 / 08 / 2', 'spbi'),
(19, 18, 'gram', 5000, ' 22 / 12 / 2', 'sisa produksi');

-- --------------------------------------------------------

--
-- Table structure for table `tb_formulasi`
--

CREATE TABLE `tb_formulasi` (
  `id` int(11) NOT NULL,
  `name` varchar(128) NOT NULL,
  `customer` varchar(128) NOT NULL,
  `date_create` varchar(12) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `tb_formulasi`
--

INSERT INTO `tb_formulasi` (`id`, `name`, `customer`, `date_create`) VALUES
(7, 'AF5410/00', 'DANWOOD', '16 / 06 / 22'),
(9, 'AF5410 LACI NORTHMAN', 'EURO DESIGN', '24 / 06 / 22'),
(10, 'risqi ahong', 'otong surotong', '27 / 06 / 22'),
(12, 'AM 549 TVA SAS', 'PT. SAS KREASINDO', '05 / 09 / 22'),
(13, 'AM 549 CREAM', 'PT. HALLO INDONESIA', '05 / 09 / 22'),
(14, 'AM 549 TEAK HARMONIZER', 'PT. JORDAN ARTHA PERKASA', '05 / 09 / 22'),
(15, 'AU 465 FANCY CREAM', 'PT. DHANA PERSADA MANUNGGAL', '05 / 09 / 22'),
(16, 'XA 1327 WALNUT SAS', 'PT. SAS KREASINDO', '05 / 09 / 22'),
(17, 'XA 1327 GLAZE WHITE IDE S', 'PT. IDE STUDIO', '05 / 09 / 22'),
(19, 'AC 600 TEA BROWN DPM', 'PT. DHANA PERSADA MANUNGGAL', '05 / 09 / 22'),
(20, 'AC 600 D\'BEST BROWN', 'PT. D\'BEST FURNITURE', '05 / 09 / 22'),
(21, 'AF 5405 WHITE IND', 'PT. INDEX', '05 / 09 / 22'),
(22, 'AF 5450 GREY', 'PT. LOUTCOU', '05 / 09 / 22'),
(23, 'AM 549 NATURAL TEAK RJ', 'PT. RAJAWALI', '05 / 09 / 22'),
(24, 'AM 549 HONEY TEAK', 'CV. CAMBIUM F', '05 / 09 / 22'),
(25, 'XA 1327  ONIX', 'CV. CAMBIUM F', '05 / 09 / 22'),
(26, 'AU 454 TONER DW', 'PT. DANWOOD', '05 / 09 / 22'),
(27, 'S61SETTING LISBON', 'PT. EASTWIND', '05 / 09 / 22'),
(28, 'TZ2850 BLUE INDIGO', 'PT. EASTWIND', '05 / 09 / 22'),
(29, 'TZ8830 GREY LISBON', 'PT. EASTWIND', '06 / 09 / 22'),
(30, 'TU0574/41 WHITE EM', 'PT. EASTWIND', '06 / 09 / 22'),
(31, 'TZ8830 GREY MALIBU', 'PT. EASTWIND', '06 / 09 / 22'),
(32, '420C1513MU RED BOX DRAWER', 'PT. EASTWIND', '06 / 09 / 22'),
(33, 'S65 BLACK EBONY', 'PT. DANWOOD', '06 / 09 / 22'),
(34, '430C42414M (40-45)', 'PT. DANWOOD', '06 / 09 / 22'),
(35, 'XA4394 WHITE WASH', 'PT. KAYU LAMA', '06 / 09 / 22'),
(36, 'JM1053/EM BLACK KK', 'PT. KOOC KREASI', '06 / 09 / 22'),
(37, 'AM0549 SNOW WHITE', 'PT. KOOC KREASI', '06 / 09 / 22'),
(38, 'XA4394 WHITE SC', 'PT. SCANCOM', '06 / 09 / 22'),
(39, 'AM0481 DRIFT GREY', 'PT. SCANCOM', '06 / 09 / 22'),
(42, 'grey usm', 'universitas semarang', '20 / 10 / 22'),
(43, 'ahong coba coba', 'ahong', '22 / 12 / 22'),
(44, 'orange', 'ftik', '27 / 12 / 22');

-- --------------------------------------------------------

--
-- Table structure for table `tb_formulasi_isi`
--

CREATE TABLE `tb_formulasi_isi` (
  `id` int(11) NOT NULL,
  `id_name` int(11) NOT NULL,
  `item_a` varchar(30) NOT NULL,
  `qty_a` varchar(30) NOT NULL,
  `item_b` varchar(30) NOT NULL,
  `qty_b` varchar(30) NOT NULL,
  `item_c` varchar(30) NOT NULL,
  `qty_c` varchar(30) NOT NULL,
  `item_d` varchar(30) NOT NULL,
  `qty_d` varchar(30) NOT NULL,
  `item_e` varchar(30) NOT NULL,
  `qty_e` varchar(30) NOT NULL,
  `item_f` varchar(30) NOT NULL,
  `qty_f` varchar(30) NOT NULL,
  `item_g` varchar(30) NOT NULL,
  `qty_g` varchar(30) NOT NULL,
  `total` varchar(30) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `tb_formulasi_isi`
--

INSERT INTO `tb_formulasi_isi` (`id`, `id_name`, `item_a`, `qty_a`, `item_b`, `qty_b`, `item_c`, `qty_c`, `item_d`, `qty_d`, `item_e`, `qty_e`, `item_f`, `qty_f`, `item_g`, `qty_g`, `total`) VALUES
(17, 7, 'af5405', '50', 'af5450', '50', '0', '0', '0', '0', '0', '0', '0', '0', '0', '0', '100'),
(18, 9, 'af5405', '35', 'af5450', '35', 'xa2006/bb', '10', 'xa2006/17', '5', 'xa2006/08', '5', 'xa2006/72', '10', '0', '0', '100'),
(20, 12, 'AM0623/NN', '70', 'AIR', '27', 'PIGMEN RED', '1', 'PIGMEN BLACK', '1', 'PIGMEN YELLOW ', '1', '0', '0', '0', '0', '100'),
(21, 13, 'AU 454-13', '96', 'AIR', '3', 'PIGMEN YELLOW ', '1', 'PIGMEN RED', '0', 'PIGMEN BLACK', '0', '0', '0', '0', '0', '100'),
(22, 15, 'AU0465/00', '98', 'XA 2006-BB', '2', 'PIGMEN YELLOW ', '0', 'PIGMEN RED', '0', '0', '0', '0', '0', '0', '0', '100'),
(23, 16, 'XA 1327', '75', 'AIR', '19', 'PIGMEN YELLOW ', '1', 'PIGMEN RED', '1', 'XA 4034-72', '4', '0', '0', '0', '0', '100'),
(24, 17, 'XA 1327', '11', 'TALK HAICHEN', '35', 'XA 2006/BB', '1', 'AIR', '53', '0', '0', '0', '0', '0', '0', '100'),
(25, 18, 'THINNER NC', '95', 'XM 8000-07', '3', 'XM 8000-25', '1', 'XM 8000-72', '1', '0', '0', '0', '0', '0', '0', '100'),
(26, 19, 'AIR', '83', 'AM0623/NN', '10', 'NOVONYL YELLOW', '4', 'NOVONYL RED', '1', 'NOVONYL BLACK', '2', '0', '0', '0', '0', '100'),
(28, 21, 'AF 5405', '92', 'AC 600-13', '8', '0', '0', '0', '0', '0', '0', '0', '0', '0', '0', '100'),
(29, 22, 'AF 5450', '90', 'PASTA BLACK MTP', '2', 'PASTA RED MTP', '0', 'PASTA YELLOW MTP', '0', 'PIGMENT BLUE', '0', 'XA 2006-BB', '8', '0', '0', '100'),
(30, 23, 'AM0623/NN', '20', 'PASTA BLACK MTP', '1', 'PASTA RED MTP', '1', 'PASTA YELLOW MTP', '2', 'AIR', '76', 'XA 2006-BB', '0', '0', '0', '100'),
(31, 14, 'AM0623/NN', '20', 'AIR RO', '77', 'PIGMENT YELLOW', '1', 'PIGMEN RED', '1', 'PIGMEN BLACK', '1', '0', '0', '0', '0', '100'),
(32, 24, 'AIR', '86', 'AM0623', '10', 'PIGMEN RED', '1', 'PIGMEN YELLOW', '3', '0', '0', '0', '0', '0', '0', '100'),
(33, 25, 'AIR RO', '53', 'XA 1327', '40', 'PIGMENT BLACK', '5', 'XA 2006/BB', '2', '0', '0', '0', '0', '0', '0', '100'),
(34, 26, 'AU0454/13', '75', 'PIGMEN RED', '1', 'PIGMEN YELLOW', '2', 'PIGMENT BLACK', '0', 'AIR', '22', '0', '0', '0', '0', '100'),
(35, 27, 'S65WY0800', '1', 'S61YY0103', '7', 'S61RY0102', '1', 'S61BY0100', '6', '110:08510', '12', '500C1213MR', '74', '0', '0', '100'),
(36, 28, 'TP2009/BB', '1', 'TP2009/06', '2', 'TP2009/72', '1', 'TZ2850', '96', '0', '0', '0', '0', '0', '0', '100'),
(38, 29, 'TP2009/BB', '2.95', 'TP2009/52', '4.46', 'TP2009/72', '0.73', 'TZ2830', '91.86', '0', '0', '0', '0', '0', '0', '100'),
(39, 30, 'TU0574/41', '48.80', 'UNICOAT SUPER WHITE', '2.40', 'TU0004', '48.80', '0', '0', '0', '0', '0', '0', '0', '0', '100'),
(40, 31, 'TP2009/13', '9.56', 'TP2009/17', '2.78', 'TP2009/26', '0.33', 'TP2009/72', '0.93', 'TZ2830', '86.40', '0', '0', '0', '0', '100'),
(41, 32, '900-801U', '0.29', '900-703', '2.64', '900-608', '6.62', '900-301U', '0.18', '420C1513MU', '90.27', '0', '0', '0', '0', '100'),
(42, 33, 'S65BY0301', '28.57', '500C1213MR', '71.43', '0', '0', '0', '0', '0', '0', '0', '0', '0', '0', '100'),
(43, 34, '430C42414M', '90', '430C92419M', '10.00', '0', '0', '0', '0', '0', '0', '0', '0', '0', '0', '100'),
(44, 35, 'XA2006/BB', '1.94', 'SILICON DIOXIDE', '4.37', 'AIR RO', '26.34', 'AM0623', '67.35', '0', '0', '0', '0', '0', '0', '100'),
(45, 36, '195:00830', '60', 'AIR RO', '30', 'PIGMENT BLACK', '10', '0', '0', '0', '0', '0', '0', '0', '0', '100'),
(46, 37, 'AM0623/NN', '50', 'XA2006/BB', '2.5', 'AIR RO', '47.5', '0', '0', '0', '0', '0', '0', '0', '0', '100'),
(47, 38, 'XA4394', '99', 'XA2006/BB', '1', '0', '0', '0', '0', '0', '0', '0', '0', '0', '0', '100'),
(48, 39, 'XA2006/17', '0.65', 'XA2006/08', '0.02', 'XA2006/72', '0.09', 'AIR RO', '19.69', 'AM0481/00', '79.55', '0', '0', '0', '0', '100'),
(49, 49, 'AM0623/NN', '90', 'XA2006/BB', '7', 'XA2006/72', '3', '0', '0', '0', '0', '0', '0', '0', '0', '100'),
(50, 41, 'AM0623/NN', '90', 'XA2006/BB', '5', 'XA2006/72', '5', '0', '0', '0', '0', '0', '0', '0', '0', '100'),
(51, 42, 'AM0623/NN', '90', 'XA2006/BB', '5', 'XA2006/72', '5', '0', '0', '0', '0', '0', '0', '0', '0', '100'),
(52, 52, 'AM0623/NN', '90', 'XA2006/BB', '8', 'XA2006/72', '2', '0', '0', '0', '0', '0', '0', '0', '0', '100'),
(53, 10, 'AM0623/NN', '90', 'XA2006/BB', '5', 'XA2006/72', '5', '0', '0', '0', '0', '0', '0', '0', '0', '100'),
(54, 43, 'A', '10', 'B', '10', 'C', '80', '0', '0', '0', '0', '0', '0', '0', '0', '100'),
(55, 44, 'AM0623/NN', '90', 'merah', '5', 'kuning', '5', '0', '0', '0', '0', '0', '0', '0', '0', '100');

-- --------------------------------------------------------

--
-- Table structure for table `tb_po_produksi`
--

CREATE TABLE `tb_po_produksi` (
  `id` int(11) NOT NULL,
  `id_formulasi` int(11) NOT NULL,
  `customer` varchar(128) NOT NULL,
  `qty` int(11) NOT NULL,
  `date` varchar(12) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `tb_po_produksi`
--

INSERT INTO `tb_po_produksi` (`id`, `id_formulasi`, `customer`, `qty`, `date`) VALUES
(9, 7, 'danwood', 200, '22 / 08 / 22'),
(10, 7, 'danwood', 100000, '27 / 08 / 22'),
(11, 9, 'PT EURO DESIGN', 1000, '29 / 08 / 22'),
(12, 9, 'PT. POLYTRON', 500, '29 / 08 / 22'),
(13, 41, 'universitas semarang', 200, '20 / 10 / 22'),
(14, 42, 'usm', 200, '20 / 10 / 22'),
(15, 43, 'sembarangan', 300000, '22 / 12 / 22'),
(16, 44, 'universitas semarang', 1000, '27 / 12 / 22');

-- --------------------------------------------------------

--
-- Table structure for table `tb_spr`
--

CREATE TABLE `tb_spr` (
  `id` int(11) NOT NULL,
  `id_name` int(11) NOT NULL,
  `item_a` varchar(30) NOT NULL,
  `qty_a` int(30) NOT NULL,
  `item_b` varchar(30) NOT NULL,
  `qty_b` int(30) NOT NULL,
  `item_c` varchar(30) NOT NULL,
  `qty_c` int(30) NOT NULL,
  `item_d` varchar(30) NOT NULL,
  `qty_d` int(30) NOT NULL,
  `item_e` varchar(30) NOT NULL,
  `qty_e` int(30) NOT NULL,
  `item_f` varchar(30) NOT NULL,
  `qty_f` int(30) NOT NULL,
  `item_g` varchar(30) NOT NULL,
  `qty_g` int(30) NOT NULL,
  `total` int(30) NOT NULL,
  `date_create` varchar(12) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Table structure for table `users`
--

CREATE TABLE `users` (
  `id` int(11) NOT NULL,
  `username` varchar(128) NOT NULL,
  `email` varchar(128) NOT NULL,
  `image` varchar(128) NOT NULL,
  `password` varchar(256) NOT NULL,
  `role_id` int(11) NOT NULL,
  `is_active` int(1) NOT NULL,
  `date_create` char(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `users`
--

INSERT INTO `users` (`id`, `username`, `email`, `image`, `password`, `role_id`, `is_active`, `date_create`) VALUES
(4, 'risqiahong', 'risqinur28@gmail.com', 'default.jpg', '$2y$10$/RM/xz6vmQAelBEiC.GBq.4uL8zpksIZ7NVQXM86.72.v8o9HUNHO', 1, 1, '1631131251'),
(7, 'gudangksa', 'gudangksa@gmail.com', 'default.jpg', '$2y$10$sMNkfrIsElYzvE8zFSX/g.nuMVpz9aPXGBpy9NqbxNz21j/Qc.7EC', 2, 1, '1661752948'),
(8, 'RnD', 'RnD@gmail.com', 'default.jpg', '$2y$10$eGL0cE9sTfNStAmwzPoPIOqEil3gr2CpBR7aPdH23udk6fSkt4dDq', 3, 1, '1661754004'),
(13, 'devi', 'devitalang74@gmail.com', 'default.jpg', '$2y$10$ipa5s9BktUdUJcx6FVznNuGp6JqQQdrAgS7nEsl8V34UI8n4ELqKi', 1, 1, '1670695087');

-- --------------------------------------------------------

--
-- Table structure for table `user_access_menu`
--

CREATE TABLE `user_access_menu` (
  `id` int(11) NOT NULL,
  `role_id` int(11) NOT NULL,
  `menu_id` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `user_access_menu`
--

INSERT INTO `user_access_menu` (`id`, `role_id`, `menu_id`) VALUES
(1, 1, 1),
(5, 1, 19),
(6, 1, 20),
(7, 2, 20),
(8, 1, 26),
(9, 1, 21),
(10, 2, 21),
(13, 1, 25),
(15, 2, 1),
(16, 3, 25),
(17, 3, 26),
(18, 3, 1);

-- --------------------------------------------------------

--
-- Table structure for table `user_menu`
--

CREATE TABLE `user_menu` (
  `id` int(11) NOT NULL,
  `menu` varchar(128) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `user_menu`
--

INSERT INTO `user_menu` (`id`, `menu`) VALUES
(1, 'NAVIGATION'),
(19, 'MENU'),
(20, 'WAREHOUSE'),
(21, 'RETAIL WAREHOUSE'),
(25, 'PRODUCTION'),
(26, 'RnD'),
(28, 'menucoba');

-- --------------------------------------------------------

--
-- Table structure for table `user_role`
--

CREATE TABLE `user_role` (
  `id` int(11) NOT NULL,
  `role_id` varchar(12) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `user_role`
--

INSERT INTO `user_role` (`id`, `role_id`) VALUES
(1, 'admin'),
(2, 'gudang'),
(3, 'RnD');

-- --------------------------------------------------------

--
-- Table structure for table `user_sub_menu`
--

CREATE TABLE `user_sub_menu` (
  `id` int(11) NOT NULL,
  `menu_id` int(11) NOT NULL,
  `judul` varchar(128) NOT NULL,
  `url` varchar(128) NOT NULL,
  `icon` varchar(128) NOT NULL,
  `is_active` int(1) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `user_sub_menu`
--

INSERT INTO `user_sub_menu` (`id`, `menu_id`, `judul`, `url`, `icon`, `is_active`) VALUES
(1, 1, 'Dashboard', 'dashboard', 'fa fa-dashboard', 1),
(4, 19, 'Menu Management', 'menu', 'fa fa-folder', 1),
(5, 19, 'Sub Menu Management', 'subMenu', 'fa fa-folder-o', 1),
(8, 20, 'Data Warehouse', 'bigWarehouse', 'fa fa-book', 1),
(9, 20, 'Transaksi Out', 'transaksi_out', 'fa fa-mail-forward', 1),
(10, 20, 'Transaksi In', 'transaksi_in', 'fa fa-mail-reply', 1),
(11, 26, 'Data Formulasi', 'formula', 'fa fa-flask', 1),
(12, 25, 'Data PO Production', 'produksi', 'fa fa-pencil-square-o', 1),
(21, 21, 'Data Retaile Warehouse', 'retailWarehouse', 'fa fa-book', 1),
(22, 21, 'Transaksi Retail Out', 'retail_out', 'fa fa-mail-forward', 1),
(23, 21, 'Transaksi Retail In', 'retail_in', 'fa fa-mail-reply', 1),
(24, 27, 'lakan coba coba', 'apa aja boleh', 'rahasia', 1),
(25, 19, 'Users Management', 'usersManagement', 'fa fa-users', 1),
(26, 19, 'Users Access Menu', 'userAccessMenu', 'fa fa-folder-open', 1),
(27, 28, 'coba aja', 'coba/coba', 'fa fa-pencil-square-o', 1);

--
-- Indexes for dumped tables
--

--
-- Indexes for table `tb_barang`
--
ALTER TABLE `tb_barang`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `tb_barang_gk`
--
ALTER TABLE `tb_barang_gk`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `tb_barang_keluar`
--
ALTER TABLE `tb_barang_keluar`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `tb_barang_keluar_gk`
--
ALTER TABLE `tb_barang_keluar_gk`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `tb_barang_masuk`
--
ALTER TABLE `tb_barang_masuk`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `tb_barang_masuk_gk`
--
ALTER TABLE `tb_barang_masuk_gk`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `tb_formulasi`
--
ALTER TABLE `tb_formulasi`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `tb_formulasi_isi`
--
ALTER TABLE `tb_formulasi_isi`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `tb_po_produksi`
--
ALTER TABLE `tb_po_produksi`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `tb_spr`
--
ALTER TABLE `tb_spr`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `users`
--
ALTER TABLE `users`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `user_access_menu`
--
ALTER TABLE `user_access_menu`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `user_menu`
--
ALTER TABLE `user_menu`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `user_role`
--
ALTER TABLE `user_role`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `user_sub_menu`
--
ALTER TABLE `user_sub_menu`
  ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `tb_barang`
--
ALTER TABLE `tb_barang`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=15;

--
-- AUTO_INCREMENT for table `tb_barang_gk`
--
ALTER TABLE `tb_barang_gk`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=19;

--
-- AUTO_INCREMENT for table `tb_barang_keluar`
--
ALTER TABLE `tb_barang_keluar`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=27;

--
-- AUTO_INCREMENT for table `tb_barang_keluar_gk`
--
ALTER TABLE `tb_barang_keluar_gk`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=9;

--
-- AUTO_INCREMENT for table `tb_barang_masuk`
--
ALTER TABLE `tb_barang_masuk`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=31;

--
-- AUTO_INCREMENT for table `tb_barang_masuk_gk`
--
ALTER TABLE `tb_barang_masuk_gk`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=20;

--
-- AUTO_INCREMENT for table `tb_formulasi`
--
ALTER TABLE `tb_formulasi`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=45;

--
-- AUTO_INCREMENT for table `tb_formulasi_isi`
--
ALTER TABLE `tb_formulasi_isi`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=56;

--
-- AUTO_INCREMENT for table `tb_po_produksi`
--
ALTER TABLE `tb_po_produksi`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=17;

--
-- AUTO_INCREMENT for table `tb_spr`
--
ALTER TABLE `tb_spr`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `users`
--
ALTER TABLE `users`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=14;

--
-- AUTO_INCREMENT for table `user_access_menu`
--
ALTER TABLE `user_access_menu`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=20;

--
-- AUTO_INCREMENT for table `user_menu`
--
ALTER TABLE `user_menu`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=29;

--
-- AUTO_INCREMENT for table `user_role`
--
ALTER TABLE `user_role`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT for table `user_sub_menu`
--
ALTER TABLE `user_sub_menu`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=28;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
