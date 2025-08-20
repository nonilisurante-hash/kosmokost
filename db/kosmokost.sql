-- phpMyAdmin SQL Dump
-- version 5.1.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Aug 19, 2025 at 05:13 PM
-- Server version: 10.4.20-MariaDB
-- PHP Version: 7.3.29

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `kosmokost`
--

-- --------------------------------------------------------

--
-- Table structure for table `kamar`
--

CREATE TABLE `kamar` (
  `no_kamar` varchar(5) NOT NULL,
  `harga` int(11) NOT NULL,
  `deskripsi` text NOT NULL,
  `status` enum('Kosong','Berpenghuni') NOT NULL,
  `gambar` varchar(100) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `kamar`
--

INSERT INTO `kamar` (`no_kamar`, `harga`, `deskripsi`, `status`, `gambar`) VALUES
('01', 800000, 'Fasilitas kamar mandi, dapur, kamar, dan dispenser', 'Kosong', 'no4.jpg'),
('02', 800000, 'Fasilitas kamar mandi, dapur, kamar,  dan dispenser', 'Berpenghuni', 'no9.jpg'),
('03', 800000, 'Fasilitas kamar mandi, dapur, kamar, dan dispenser', 'Kosong', 'no7.jpg'),
('04', 800000, 'Fasilitas kamar mandi, dapur, kamar, dan dispenser', 'Berpenghuni', 'no6.jpg'),
('05', 500000, 'Fasilitas kamar mandi, dapur, kamar, dan dispenser', 'Kosong', 'no5.jpg'),
('06', 1000000, 'Fasilitas kamar mandi, dapur, kamar, dispenser, dan wifi', 'Kosong', 'no3.jpg');

-- --------------------------------------------------------

--
-- Table structure for table `pembayaran`
--

CREATE TABLE `pembayaran` (
  `id_pembayaran` int(11) NOT NULL,
  `id_penghuni` int(11) DEFAULT NULL,
  `no_kamar` varchar(5) DEFAULT NULL,
  `bulan` enum('januari','februari','maret','april','mei','juni','juli','agustus','september','oktober','november','desember') NOT NULL,
  `tanggal_bayar` datetime NOT NULL,
  `bayar` bigint(20) NOT NULL,
  `keterangan` enum('Lunas','Belum Lunas') NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `pembayaran`
--

INSERT INTO `pembayaran` (`id_pembayaran`, `id_penghuni`, `no_kamar`, `bulan`, `tanggal_bayar`, `bayar`, `keterangan`) VALUES
(47, 40, '02', 'agustus', '2025-08-14 15:27:00', 800000, 'Lunas'),
(48, 41, '04', 'september', '2025-08-17 15:30:00', 500000, 'Belum Lunas'),
(49, 41, '04', 'agustus', '2025-08-17 15:31:00', 800000, 'Lunas');

-- --------------------------------------------------------

--
-- Table structure for table `penghuni`
--

CREATE TABLE `penghuni` (
  `id_penghuni` int(11) NOT NULL,
  `no_kamar` varchar(5) DEFAULT NULL,
  `no_ktp` varchar(16) NOT NULL,
  `nama` varchar(100) NOT NULL,
  `no_hp` varchar(15) NOT NULL,
  `tgl_masuk` date NOT NULL,
  `status` enum('Penghuni','Bukan Penghuni') NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `penghuni`
--

INSERT INTO `penghuni` (`id_penghuni`, `no_kamar`, `no_ktp`, `nama`, `no_hp`, `tgl_masuk`, `status`) VALUES
(40, '02', '026333338191183', 'Alibaba Saluja', '083698992487', '2025-08-17', 'Penghuni'),
(41, '04', '0273429429924949', 'Alexander Well', '087865893902', '2025-08-14', 'Penghuni');

-- --------------------------------------------------------

--
-- Table structure for table `user`
--

CREATE TABLE `user` (
  `id_user` int(11) NOT NULL,
  `username` varchar(20) NOT NULL,
  `password` varchar(20) NOT NULL,
  `id_penghuni` int(11) DEFAULT NULL,
  `role` enum('admin','penghuni') NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `user`
--

INSERT INTO `user` (`id_user`, `username`, `password`, `id_penghuni`, `role`) VALUES
(8, 'admin', 'admin', NULL, 'admin'),
(25, 'noni', 'noni', NULL, 'admin'),
(28, 'alibaba', 'alibaba', 40, 'penghuni'),
(29, 'alex', 'alex', 41, 'penghuni');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `kamar`
--
ALTER TABLE `kamar`
  ADD PRIMARY KEY (`no_kamar`);

--
-- Indexes for table `pembayaran`
--
ALTER TABLE `pembayaran`
  ADD PRIMARY KEY (`id_pembayaran`),
  ADD KEY `id_penghuni` (`id_penghuni`),
  ADD KEY `no_kamar` (`no_kamar`);

--
-- Indexes for table `penghuni`
--
ALTER TABLE `penghuni`
  ADD PRIMARY KEY (`id_penghuni`),
  ADD KEY `no_kamar` (`no_kamar`);

--
-- Indexes for table `user`
--
ALTER TABLE `user`
  ADD PRIMARY KEY (`id_user`),
  ADD KEY `id_penghuni` (`id_penghuni`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `pembayaran`
--
ALTER TABLE `pembayaran`
  MODIFY `id_pembayaran` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=50;

--
-- AUTO_INCREMENT for table `penghuni`
--
ALTER TABLE `penghuni`
  MODIFY `id_penghuni` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=42;

--
-- AUTO_INCREMENT for table `user`
--
ALTER TABLE `user`
  MODIFY `id_user` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=30;

--
-- Constraints for dumped tables
--

--
-- Constraints for table `pembayaran`
--
ALTER TABLE `pembayaran`
  ADD CONSTRAINT `pembayaran_ibfk_2` FOREIGN KEY (`no_kamar`) REFERENCES `kamar` (`no_kamar`) ON DELETE SET NULL,
  ADD CONSTRAINT `pembayaran_ibfk_3` FOREIGN KEY (`id_penghuni`) REFERENCES `penghuni` (`id_penghuni`);

--
-- Constraints for table `penghuni`
--
ALTER TABLE `penghuni`
  ADD CONSTRAINT `penghuni_ibfk_1` FOREIGN KEY (`no_kamar`) REFERENCES `kamar` (`no_kamar`) ON DELETE SET NULL;

--
-- Constraints for table `user`
--
ALTER TABLE `user`
  ADD CONSTRAINT `user_ibfk_1` FOREIGN KEY (`id_penghuni`) REFERENCES `penghuni` (`id_penghuni`) ON DELETE CASCADE;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
