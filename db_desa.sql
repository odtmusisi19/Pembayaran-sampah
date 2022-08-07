-- phpMyAdmin SQL Dump
-- version 5.2.0
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Jul 24, 2022 at 01:27 PM
-- Server version: 10.4.24-MariaDB
-- PHP Version: 8.1.6

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `db_desa`
--

-- --------------------------------------------------------

--
-- Table structure for table `dusun`
--

CREATE TABLE `dusun` (
  `id_dusun` int(11) NOT NULL,
  `nama_dusun` varchar(100) NOT NULL,
  `rt` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `dusun`
--

INSERT INTO `dusun` (`id_dusun`, `nama_dusun`, `rt`) VALUES
(1, 'Tenangga', 3),
(3, 'Bawak Tanggok', 2);

-- --------------------------------------------------------

--
-- Table structure for table `masyarakat`
--

CREATE TABLE `masyarakat` (
  `id_masyarakat` int(11) NOT NULL,
  `nama_masyarakat` varchar(200) NOT NULL,
  `jenis_kelamin` varchar(20) NOT NULL,
  `tempat_lahir` varchar(50) NOT NULL,
  `tanggal_lahir` date NOT NULL,
  `telepon` varchar(20) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `masyarakat`
--

INSERT INTO `masyarakat` (`id_masyarakat`, `nama_masyarakat`, `jenis_kelamin`, `tempat_lahir`, `tanggal_lahir`, `telepon`) VALUES
(25, 'Ogi darma tena', 'Laki Laki', 'Tenangga', '2022-07-24', '085333799648'),
(27, 'Feri anggara', 'Laki Laki', 'Tenangga', '0000-00-00', '085334555222'),
(37, 'Dio Pratama', 'Laki Laki', 'Tangkok', '2001-07-25', '085334555222'),
(39, 'Johri', 'Laki Laki', 'Pemenang', '2022-07-24', '085333799648');

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
  `batch` int(11) UNSIGNED NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `migrations`
--

INSERT INTO `migrations` (`id`, `version`, `class`, `group`, `namespace`, `time`, `batch`) VALUES
(1, '2022-05-24-094541', 'App\\Database\\Migrations\\Penduduk', 'default', 'App', 1653386079, 1),
(2, '2022-05-24-095523', 'App\\Database\\Migrations\\Keluarga', 'default', 'App', 1653386384, 2),
(3, '2022-06-03-020111', 'App\\Database\\Migrations\\Sktm', 'default', 'App', 1654221986, 3),
(4, '2022-06-03-020747', 'App\\Database\\Migrations\\Sktm', 'default', 'App', 1654222134, 4),
(5, '2022-06-03-021944', 'App\\Database\\Migrations\\Sktm', 'default', 'App', 1654222804, 5),
(6, '2022-06-03-022210', 'App\\Database\\Migrations\\Sktm', 'default', 'App', 1654222968, 6),
(8, '2022-06-13-051817', 'App\\Database\\Migrations\\Masyarakat', 'default', 'App', 1655097539, 8),
(9, '2022-06-20-112857', 'App\\Database\\Migrations\\Dusun', 'default', 'App', 1655725798, 9),
(10, '2022-06-21-231929', 'App\\Database\\Migrations\\Pembayaran', 'default', 'App', 1655854053, 10),
(11, '2022-06-22-233024', 'App\\Database\\Migrations\\Pembayaran', 'default', 'App', 1655940748, 11),
(12, '2022-06-24-070016', 'App\\Database\\Migrations\\Petugas', 'default', 'App', 1656054331, 12),
(13, '2022-06-27-234757', 'App\\Database\\Migrations\\Users', 'default', 'App', 1656374908, 13),
(14, '2022-06-28-001228', 'App\\Database\\Migrations\\Users', 'default', 'App', 1656375231, 14),
(16, '2022-07-07-081819', 'App\\Database\\Migrations\\Pembayaran', 'default', 'App', 1657181938, 15),
(18, '2022-07-07-082141', 'App\\Database\\Migrations\\Pembayaran', 'default', 'App', 1657183119, 16),
(19, '2022-07-07-084221', 'App\\Database\\Migrations\\Pembayaran', 'default', 'App', 1657183580, 17),
(23, '2022-07-07-103506', 'App\\Database\\Migrations\\Pembayaran', 'default', 'App', 1657190576, 18),
(24, '2022-07-07-104904', 'App\\Database\\Migrations\\Pembayaran', 'default', 'App', 1657191035, 19);

-- --------------------------------------------------------

--
-- Table structure for table `pembayaran`
--

CREATE TABLE `pembayaran` (
  `id_pembayaran` int(11) NOT NULL,
  `id_masyarakat` int(11) NOT NULL,
  `id_dusun` int(11) DEFAULT NULL,
  `id_petugas` int(11) DEFAULT NULL,
  `jumlah` varchar(10) NOT NULL,
  `tanggal_pembayaran` varchar(150) NOT NULL,
  `keterangan` varchar(50) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `pembayaran`
--

INSERT INTO `pembayaran` (`id_pembayaran`, `id_masyarakat`, `id_dusun`, `id_petugas`, `jumlah`, `tanggal_pembayaran`, `keterangan`) VALUES
(23, 25, 1, 4, '750000', '2022-07-21', 'Lunas'),
(25, 27, 1, 1, '90000', '2022-07-24', 'Lunas'),
(35, 37, 3, 1, '10000', '2022-07-24', 'Lunas'),
(37, 39, 3, NULL, '0', '-', '-');

-- --------------------------------------------------------

--
-- Table structure for table `petugas`
--

CREATE TABLE `petugas` (
  `id_petugas` int(11) NOT NULL,
  `nama_petugas` varchar(50) NOT NULL,
  `telepon` varchar(50) NOT NULL,
  `username` varchar(50) NOT NULL,
  `password` varchar(50) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `petugas`
--

INSERT INTO `petugas` (`id_petugas`, `nama_petugas`, `telepon`, `username`, `password`) VALUES
(1, 'ogito', '08734233423', 'ogidarma', 'masuk123'),
(4, 'Bapak Ogi', '085333799648', 'Ogibapak', 'masuk123');

-- --------------------------------------------------------

--
-- Table structure for table `users`
--

CREATE TABLE `users` (
  `id` int(11) NOT NULL,
  `username` varchar(100) NOT NULL,
  `password` varchar(100) NOT NULL,
  `password_conf` varchar(100) NOT NULL,
  `name` varchar(100) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `users`
--

INSERT INTO `users` (`id`, `username`, `password`, `password_conf`, `name`) VALUES
(1, 'ogidarma', '$2y$10$sM5pZ1AP4NsPJhzLVR5theYXK9T4a8n4SJmIEIiADLEytZipR3puu', '', 'Ogi darma tena'),
(2, 'admin', '$2y$10$abFqNSt8oWI7sHExeDtYve7cfnIu1VYfSQBsKE6RLY8u8SbNdyFbC', '', 'admin');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `dusun`
--
ALTER TABLE `dusun`
  ADD PRIMARY KEY (`id_dusun`);

--
-- Indexes for table `masyarakat`
--
ALTER TABLE `masyarakat`
  ADD PRIMARY KEY (`id_masyarakat`);

--
-- Indexes for table `migrations`
--
ALTER TABLE `migrations`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `pembayaran`
--
ALTER TABLE `pembayaran`
  ADD PRIMARY KEY (`id_pembayaran`),
  ADD KEY `id_dusun` (`id_dusun`),
  ADD KEY `id_petugas` (`id_petugas`),
  ADD KEY `pembayaran_ibfk_1` (`id_masyarakat`);

--
-- Indexes for table `petugas`
--
ALTER TABLE `petugas`
  ADD PRIMARY KEY (`id_petugas`);

--
-- Indexes for table `users`
--
ALTER TABLE `users`
  ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `dusun`
--
ALTER TABLE `dusun`
  MODIFY `id_dusun` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT for table `masyarakat`
--
ALTER TABLE `masyarakat`
  MODIFY `id_masyarakat` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=40;

--
-- AUTO_INCREMENT for table `migrations`
--
ALTER TABLE `migrations`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=25;

--
-- AUTO_INCREMENT for table `pembayaran`
--
ALTER TABLE `pembayaran`
  MODIFY `id_pembayaran` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=38;

--
-- AUTO_INCREMENT for table `petugas`
--
ALTER TABLE `petugas`
  MODIFY `id_petugas` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- AUTO_INCREMENT for table `users`
--
ALTER TABLE `users`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- Constraints for dumped tables
--

--
-- Constraints for table `pembayaran`
--
ALTER TABLE `pembayaran`
  ADD CONSTRAINT `pembayaran_ibfk_1` FOREIGN KEY (`id_masyarakat`) REFERENCES `masyarakat` (`id_masyarakat`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `pembayaran_ibfk_2` FOREIGN KEY (`id_dusun`) REFERENCES `dusun` (`id_dusun`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `pembayaran_ibfk_3` FOREIGN KEY (`id_petugas`) REFERENCES `petugas` (`id_petugas`) ON DELETE CASCADE ON UPDATE CASCADE;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
