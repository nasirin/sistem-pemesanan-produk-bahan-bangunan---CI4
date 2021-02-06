-- phpMyAdmin SQL Dump
-- version 5.0.4
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Feb 03, 2021 at 06:52 PM
-- Server version: 10.4.17-MariaDB
-- PHP Version: 7.4.13

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `vergi`
--

-- --------------------------------------------------------

--
-- Table structure for table `bayar`
--

CREATE TABLE `bayar` (
  `no_bayar` int(11) NOT NULL,
  `no_so` varchar(20) NOT NULL,
  `kd_pel` varchar(20) NOT NULL,
  `jumlah` int(20) UNSIGNED NOT NULL,
  `terbayar` int(20) DEFAULT NULL,
  `sisa` int(20) DEFAULT NULL,
  `keterangan` varchar(255) DEFAULT NULL,
  `created_bayar` date NOT NULL,
  `updated_at` date DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `bayar`
--

INSERT INTO `bayar` (`no_bayar`, `no_so`, `kd_pel`, `jumlah`, `terbayar`, `sisa`, `keterangan`, `created_bayar`, `updated_at`) VALUES
(59, 'SO-001', 'P001', 0, NULL, NULL, 'lunas', '2021-02-03', '2021-02-04'),
(64, 'SO-001', 'P001', 0, 300, 12000, 'dp', '2021-02-03', NULL),
(75, 'SO-001', 'P001', 0, 12000, 0, 'lunas', '2021-02-19', NULL),
(76, 'SO-002', 'P002', 0, NULL, NULL, 'belum dibayar', '2021-02-04', NULL);

-- --------------------------------------------------------

--
-- Table structure for table `kendaraan`
--

CREATE TABLE `kendaraan` (
  `no_perk` varchar(20) NOT NULL,
  `no_plat` varchar(20) NOT NULL,
  `jenis` varchar(20) NOT NULL,
  `kd_driver` varchar(20) NOT NULL,
  `tonase` int(20) NOT NULL,
  `volume` int(20) NOT NULL,
  `posisi` varchar(20) DEFAULT NULL,
  `driver` varchar(20) NOT NULL,
  `status_kendaraan` varchar(20) NOT NULL,
  `status_ekspedisi` varchar(20) NOT NULL,
  `created_at` date NOT NULL,
  `updated_at` date DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `kendaraan`
--

INSERT INTO `kendaraan` (`no_perk`, `no_plat`, `jenis`, `kd_driver`, `tonase`, `volume`, `posisi`, `driver`, `status_kendaraan`, `status_ekspedisi`, `created_at`, `updated_at`) VALUES
('PRK001', 'L 9012 UV', 'build up', 'D001', 40, 12, 'jakarta', '', '', 'sedia', '0000-00-00', '2020-12-03'),
('PRK002', 'H 1780 DZ', 'build up', 'D002', 40, 14, NULL, '', '', '', '0000-00-00', NULL),
('PRK003', 'H 1758 CZ', 'build up', 'D003', 40, 14, NULL, '', '', '', '0000-00-00', NULL);

-- --------------------------------------------------------

--
-- Table structure for table `migrations`
--

CREATE TABLE `migrations` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `version` varchar(255) NOT NULL,
  `class` text NOT NULL,
  `group` varchar(255) NOT NULL,
  `namespace` varchar(255) NOT NULL,
  `time` int(11) NOT NULL,
  `batch` int(11) UNSIGNED NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `migrations`
--

INSERT INTO `migrations` (`id`, `version`, `class`, `group`, `namespace`, `time`, `batch`) VALUES
(1, '2020-08-24-050352', 'App\\Database\\Migrations\\Pelanggan', 'default', 'App', 1606749409, 1),
(2, '2020-08-24-074322', 'App\\Database\\Migrations\\Kendaraan', 'default', 'App', 1606749409, 1),
(3, '2020-08-24-143746', 'App\\Database\\Migrations\\Sopir', 'default', 'App', 1606749409, 1),
(4, '2020-08-25-084844', 'App\\Database\\Migrations\\SO', 'default', 'App', 1606749409, 1),
(5, '2020-08-25-085646', 'App\\Database\\Migrations\\Bayar', 'default', 'App', 1606749409, 1),
(6, '2020-08-25-090517', 'App\\Database\\Migrations\\Sj', 'default', 'App', 1606749409, 1),
(7, '2020-08-26-062000', 'App\\Database\\Migrations\\DetailKirim', 'default', 'App', 1606749409, 1),
(8, '2020-08-30-035457', 'App\\Database\\Migrations\\Admin', 'default', 'App', 1606749409, 1);

-- --------------------------------------------------------

--
-- Table structure for table `pelanggan`
--

CREATE TABLE `pelanggan` (
  `kd_pel` varchar(20) NOT NULL,
  `nama_pel` varchar(30) NOT NULL,
  `jln_pel` varchar(30) NOT NULL,
  `no_jln_pel` varchar(30) NOT NULL,
  `kota_pel` varchar(30) NOT NULL,
  `kelurahan_pel` varchar(30) NOT NULL,
  `kecamatan_pel` varchar(30) NOT NULL,
  `kodepos_pel` varchar(30) NOT NULL,
  `notelp_pel` varchar(30) NOT NULL,
  `cp_pel` varchar(30) NOT NULL,
  `hp_pel` int(30) DEFAULT NULL,
  `status_pel` varchar(30) NOT NULL,
  `created_at` date NOT NULL,
  `updated_at` date DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `pelanggan`
--

INSERT INTO `pelanggan` (`kd_pel`, `nama_pel`, `jln_pel`, `no_jln_pel`, `kota_pel`, `kelurahan_pel`, `kecamatan_pel`, `kodepos_pel`, `notelp_pel`, `cp_pel`, `hp_pel`, `status_pel`, `created_at`, `updated_at`) VALUES
('P001', 'PT. ADHI KARYA', 'PURI ANJASMORO', '12', 'semarang', 'KROBOKAN', 'SEMARANG UTARA', '2343', '085334959536', 'TRI JOKO', NULL, '', '0000-00-00', NULL),
('P002', 'PT REDJA ABADI PERSADA', 'candi doko', '12', 'sidoarjo', 'candi', 'grisik', '34324', '081235556721', 'RACHMAD SUSILO', NULL, '', '0000-00-00', NULL),
('P003', 'PT ORIENTAL SHEET PILE', 'ruko mutiara blok d', '12', 'jakarta', 'ngablak', 'doko', '44895', '24546789', '08977674', NULL, '', '0000-00-00', NULL);

-- --------------------------------------------------------

--
-- Table structure for table `sj`
--

CREATE TABLE `sj` (
  `no_sj` varchar(20) NOT NULL,
  `no_so` varchar(20) NOT NULL,
  `no_perk` varchar(20) NOT NULL,
  `kd_pel` varchar(20) NOT NULL,
  `terkirim` int(20) NOT NULL,
  `totalKirim` int(11) NOT NULL,
  `tersisa` int(11) NOT NULL,
  `jurusan` varchar(50) NOT NULL,
  `muatan` varchar(50) NOT NULL,
  `status_sj` varchar(50) DEFAULT NULL,
  `created_sj` date DEFAULT NULL,
  `created_tiba` date DEFAULT NULL,
  `updated_at` date DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `sj`
--

INSERT INTO `sj` (`no_sj`, `no_so`, `no_perk`, `kd_pel`, `terkirim`, `totalKirim`, `tersisa`, `jurusan`, `muatan`, `status_sj`, `created_sj`, `created_tiba`, `updated_at`) VALUES
('SJ-001', 'SO-001', 'PRK001', 'P001', 0, 0, 100, 'GRESIK - SEMARANG', 'TIANG PANCANG ', NULL, '2021-02-02', '0000-00-00', NULL),
('SJ-002', 'SO-001', 'PRK001', 'P001', 40, 40, 60, 'GRESIK - SEMARANG', 'TIANG PANCANG ', 'kirim', '2021-02-18', '2021-03-01', NULL),
('SJ-003', 'SO-001', 'PRK001', 'P001', 40, 80, 20, 'GRESIK - SEMARANG', 'TIANG PANCANG ', 'batal', '2021-02-12', NULL, NULL),
('SJ-004', 'SO-001', 'PRK001', 'P001', 20, 100, 0, 'GRESIK - SEMARANG', 'TIANG PANCANG ', 'proses', '2021-02-04', NULL, NULL),
('SJ-005', 'SO-002', 'PRK002', 'P002', 0, 0, 123, 'surabaya', 'ssp ', NULL, '2021-02-12', NULL, NULL),
('SJ-006', 'SO-002', 'PRK002', 'P002', 23, 23, 100, 'surabaya', 'ssp ', 'kirim', '2021-02-26', '2021-03-05', NULL);

-- --------------------------------------------------------

--
-- Table structure for table `so`
--

CREATE TABLE `so` (
  `no_so` varchar(20) NOT NULL,
  `kd_pel` varchar(20) NOT NULL,
  `harga_so` int(16) NOT NULL,
  `totalHargaSO` varchar(20) NOT NULL,
  `jumlah_pesanan` int(11) NOT NULL,
  `status_so` enum('lunas','belum lunas','batal','proses','kirim','dp') NOT NULL,
  `created_so` date NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `so`
--

INSERT INTO `so` (`no_so`, `kd_pel`, `harga_so`, `totalHargaSO`, `jumlah_pesanan`, `status_so`, `created_so`) VALUES
('SO-001', 'P001', 123, '12300', 100, 'lunas', '2021-02-01'),
('SO-002', 'P002', 123, '15129', 123, 'proses', '2021-02-05');

-- --------------------------------------------------------

--
-- Table structure for table `supir`
--

CREATE TABLE `supir` (
  `kd_supir` varchar(20) NOT NULL,
  `nama_supir` varchar(30) NOT NULL,
  `notelp_supir` varchar(16) NOT NULL,
  `jln_supir` varchar(50) NOT NULL,
  `no_jln_supir` int(5) NOT NULL,
  `kota_supir` varchar(20) NOT NULL,
  `kecamatan_supir` varchar(20) NOT NULL,
  `kelurahan_supir` varchar(20) NOT NULL,
  `kodepos_supir` int(10) NOT NULL,
  `status_supir` enum('sedia','tidak tersedia') NOT NULL,
  `created_at` date NOT NULL,
  `updated_at` date DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `supir`
--

INSERT INTO `supir` (`kd_supir`, `nama_supir`, `notelp_supir`, `jln_supir`, `no_jln_supir`, `kota_supir`, `kecamatan_supir`, `kelurahan_supir`, `kodepos_supir`, `status_supir`, `created_at`, `updated_at`) VALUES
('D001', 'nasirin', '2147483647', 'jalan jalan', 123, 'semarang', 'genuk', 'genuk indah', 123, 'sedia', '0000-00-00', NULL),
('D002', 'PURNOMO', '842323', 'Bugangan', 12, 'SURABAYA', 'BULAK BANTENG', 'Sidorejo', 1234, 'sedia', '0000-00-00', NULL),
('D003', 'SUGIONO', '9122321', 'KEBONHARJO', 34, 'SEMARANG', 'SEMARANG UTARA', 'TANJUNG MAS', 67454, 'sedia', '0000-00-00', NULL);

-- --------------------------------------------------------

--
-- Table structure for table `user`
--

CREATE TABLE `user` (
  `id_user` int(11) NOT NULL,
  `username` varchar(20) NOT NULL,
  `password` varchar(50) NOT NULL,
  `telepon` int(15) NOT NULL,
  `level` enum('admin','manager','pelanggan') NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `user`
--

INSERT INTO `user` (`id_user`, `username`, `password`, `telepon`, `level`) VALUES
(1, 'manager', 'manager', 2147483647, 'manager'),
(2, 'admin', 'admin', 321, 'admin'),
(3, 'pelanggan', 'pelanggan', 211321, 'pelanggan');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `bayar`
--
ALTER TABLE `bayar`
  ADD PRIMARY KEY (`no_bayar`),
  ADD KEY `no_so` (`no_so`);

--
-- Indexes for table `kendaraan`
--
ALTER TABLE `kendaraan`
  ADD PRIMARY KEY (`no_perk`);

--
-- Indexes for table `migrations`
--
ALTER TABLE `migrations`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `pelanggan`
--
ALTER TABLE `pelanggan`
  ADD PRIMARY KEY (`kd_pel`);

--
-- Indexes for table `sj`
--
ALTER TABLE `sj`
  ADD PRIMARY KEY (`no_sj`);

--
-- Indexes for table `so`
--
ALTER TABLE `so`
  ADD PRIMARY KEY (`no_so`),
  ADD KEY `kd_pel` (`kd_pel`);

--
-- Indexes for table `supir`
--
ALTER TABLE `supir`
  ADD PRIMARY KEY (`kd_supir`);

--
-- Indexes for table `user`
--
ALTER TABLE `user`
  ADD PRIMARY KEY (`id_user`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `bayar`
--
ALTER TABLE `bayar`
  MODIFY `no_bayar` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=77;

--
-- AUTO_INCREMENT for table `migrations`
--
ALTER TABLE `migrations`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=9;

--
-- AUTO_INCREMENT for table `user`
--
ALTER TABLE `user`
  MODIFY `id_user` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
