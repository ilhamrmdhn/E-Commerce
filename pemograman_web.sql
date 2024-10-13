-- phpMyAdmin SQL Dump
-- version 5.2.0
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Apr 11, 2023 at 09:37 AM
-- Server version: 10.4.27-MariaDB
-- PHP Version: 8.2.0

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `pemograman_web`
--

-- --------------------------------------------------------

--
-- Table structure for table `barang`
--

CREATE TABLE `barang` (
  `id_barang` int(11) NOT NULL,
  `nama_barang` varchar(100) NOT NULL,
  `foto` text NOT NULL,
  `jenis_barang` varchar(100) NOT NULL,
  `harga_satuan` int(11) NOT NULL,
  `stok_barang` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `barang`
--

INSERT INTO `barang` (`id_barang`, `nama_barang`, `foto`, `jenis_barang`, `harga_satuan`, `stok_barang`) VALUES
(2, 'HP Deskjet 2676', 'printer1.jpg', 'Printer', 9550000, 42),
(4, 'EPSON L4160', 'printer2.jpg', 'Printer', 4000000, 60),
(6, 'Canon PIXMA MP287', 'printer3.jpg', 'Printer', 1589000, 97),
(7, 'Brother DCP T300', 'printer4.jpg', 'Printer', 2000000, 57),
(8, 'Kodak Photo Printer 305', 'printer5.jpg', 'Printer', 16999000, 144),
(9, 'Fuji Xerox Docuprint M205F', 'printer6.jpg', 'Printer', 1500000, 246),
(10, 'Lexmark MS415dn', 'printer7.jpg', 'Printer', 6599000, 99),
(23, 'Samsung M2885FW', 'printer8.jpg', 'Printer', 2999000, 32),
(24, 'Panasonic KX-MB2545', 'printer9.jpg', 'Printer', 4550000, 15),
(25, 'Kyocera ECOSYS M2540DN', 'printer10.jpg', 'Printer', 8415000, 23),
(26, 'HP Smart Tank 615', 'printer11.jpg', 'Printer', 3770000, 23);

-- --------------------------------------------------------

--
-- Table structure for table `transaksi`
--

CREATE TABLE `transaksi` (
  `id_transaksi` int(11) NOT NULL,
  `tgl_transaksi` date NOT NULL,
  `alamat` text NOT NULL,
  `nomor_whatsapp` varchar(20) NOT NULL,
  `nama_penerima` varchar(100) NOT NULL,
  `nama_barang` varchar(100) NOT NULL,
  `foto` text NOT NULL,
  `id_user` int(11) NOT NULL,
  `id_barang` int(11) NOT NULL,
  `jmlh_barang` int(11) NOT NULL,
  `total_harga` int(11) NOT NULL,
  `status` enum('proses','terverifikasi','ditolak') NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `transaksi`
--

INSERT INTO `transaksi` (`id_transaksi`, `tgl_transaksi`, `alamat`, `nomor_whatsapp`, `nama_penerima`, `nama_barang`, `foto`, `id_user`, `id_barang`, `jmlh_barang`, `total_harga`, `status`) VALUES
(648, '2023-04-11', 'tangki wood 3 no.8', '08159827491', 'tio pale', 'EPSON L4160', 'printer2.jpg', 6, 4, 1, 3999000, 'terverifikasi'),
(649, '2023-04-11', 'tangki wood 3 no.8', '08159827491', 'tio pale', 'HP Deskjet 2676', 'printer1.jpg', 6, 2, 1, 950000, 'ditolak'),
(650, '2023-04-11', 'tangki wood 3 no.8', '08159827491', 'tio pale', 'Canon PIXMA MP287', 'printer3.jpg', 6, 6, 1, 1589000, 'terverifikasi'),
(651, '2023-04-11', 'tangki wood 3 no.8', '08159827491', 'tio pale', 'Kyocera ECOSYS M2540DN', 'printer10.jpg', 6, 25, 1, 8415000, 'ditolak'),
(652, '2023-04-11', 'mangga besar 9', '081319077749', 'tio pale', 'Samsung M2885FW', 'printer8.jpg', 6, 23, 3, 8997000, 'terverifikasi'),
(653, '2023-04-11', 'mangga besar 9', '081319077749', 'tio pale', 'HP Deskjet 2676', 'printer1.jpg', 6, 2, 1, 9550000, 'terverifikasi'),
(654, '2023-04-11', 'mangga besar 9', '081319077749', 'tio pale', 'EPSON L4160', 'printer2.jpg', 6, 4, 7, 27993000, 'terverifikasi'),
(655, '2023-04-11', 'tangki wood 3 no.8', '08159827491', 'tio pale', 'HP Deskjet 2676', 'printer1.jpg', 6, 2, 2, 19100000, 'terverifikasi'),
(656, '2023-04-11', 'tangki wood 3 no.8', '08159827491', 'tio pale', 'EPSON L4160', 'printer2.jpg', 6, 4, 8, 31992000, 'ditolak');

-- --------------------------------------------------------

--
-- Table structure for table `user`
--

CREATE TABLE `user` (
  `id_user` int(11) NOT NULL,
  `username` varchar(100) NOT NULL,
  `password` varchar(100) NOT NULL,
  `nama_user` varchar(100) NOT NULL,
  `role` int(11) NOT NULL,
  `created_at` datetime DEFAULT NULL,
  `update_at` datetime DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `user`
--

INSERT INTO `user` (`id_user`, `username`, `password`, `nama_user`, `role`, `created_at`, `update_at`) VALUES
(3, 'admin', 'admin', 'ilham tio ramadhan', 1, '2023-04-03 04:13:21', NULL),
(5, 'ilhamdoyok', '12345', 'ilham toyo', 2, '2023-04-03 05:35:42', '2023-04-11 09:39:48'),
(6, 'ilhamrmdhn', '12345', 'tio pale', 2, '2023-04-03 05:41:49', '2023-04-03 06:00:15'),
(7, 'tioajah', '123', 'tiooo', 2, '2023-04-04 11:34:24', '2023-04-11 09:54:37'),
(10, 'yono', '12345', 'ilham yono', 2, '2023-04-11 09:57:30', NULL);

--
-- Indexes for dumped tables
--

--
-- Indexes for table `barang`
--
ALTER TABLE `barang`
  ADD PRIMARY KEY (`id_barang`);

--
-- Indexes for table `transaksi`
--
ALTER TABLE `transaksi`
  ADD PRIMARY KEY (`id_transaksi`);

--
-- Indexes for table `user`
--
ALTER TABLE `user`
  ADD PRIMARY KEY (`id_user`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `barang`
--
ALTER TABLE `barang`
  MODIFY `id_barang` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=27;

--
-- AUTO_INCREMENT for table `transaksi`
--
ALTER TABLE `transaksi`
  MODIFY `id_transaksi` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=657;

--
-- AUTO_INCREMENT for table `user`
--
ALTER TABLE `user`
  MODIFY `id_user` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=11;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
