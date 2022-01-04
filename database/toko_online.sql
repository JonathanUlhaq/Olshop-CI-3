-- phpMyAdmin SQL Dump
-- version 5.0.4
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Jan 04, 2022 at 03:47 PM
-- Server version: 10.4.17-MariaDB
-- PHP Version: 8.0.2

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `toko_online`
--

-- --------------------------------------------------------

--
-- Table structure for table `kategori`
--

CREATE TABLE `kategori` (
  `id_kategori` varchar(255) NOT NULL,
  `kategori` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `kategori`
--

INSERT INTO `kategori` (`id_kategori`, `kategori`) VALUES
('101', 'Minuman'),
('102', 'Makanan'),
('103', 'Skincare');

-- --------------------------------------------------------

--
-- Table structure for table `tb_barang`
--

CREATE TABLE `tb_barang` (
  `id_brng` varchar(255) NOT NULL,
  `nama_brng` varchar(255) NOT NULL,
  `keterangan` varchar(255) NOT NULL,
  `kategori` varchar(255) NOT NULL,
  `harga` varchar(255) NOT NULL,
  `stok` varchar(255) NOT NULL,
  `gambar` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `tb_barang`
--

INSERT INTO `tb_barang` (`id_brng`, `nama_brng`, `keterangan`, `kategori`, `harga`, `stok`, `gambar`) VALUES
('BRNG_2532', 'Seblak', 'Makanan Bandung', '102', '15000', '2', 'handbody3.jpg'),
('BRNG_6423', 'Hand Body', 'Pelembab Badan', '103', '125000', '250', 'handbody2.jpg'),
('BRNG_6476', 'Indomilk', 'Susu Murni Sapi', '101', '25000', '350', 'indomilk.jpg');

-- --------------------------------------------------------

--
-- Table structure for table `transaksi`
--

CREATE TABLE `transaksi` (
  `id` int(11) NOT NULL,
  `id_transaksi` varchar(255) NOT NULL,
  `id_user` varchar(255) NOT NULL,
  `id_brng` varchar(255) NOT NULL,
  `jumlah_barang` varchar(255) NOT NULL,
  `total_harga` varchar(255) NOT NULL,
  `atm` varchar(255) NOT NULL,
  `status` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `transaksi`
--

INSERT INTO `transaksi` (`id`, `id_transaksi`, `id_user`, `id_brng`, `jumlah_barang`, `total_harga`, `atm`, `status`) VALUES
(8, 'TR3917', 'US8699', 'BRNG_6476', '1', '25000', '5017', 'Sudah Bayar'),
(9, 'TR3917', 'US8699', 'BRNG_6423', '1', '150000', '5017', 'Sudah Bayar'),
(10, 'TR5513', 'US8699', 'BRNG_6423', '1', '125000', '6986', 'Sudah Bayar'),
(11, 'TR5513', 'US8699', 'BRNG_6476', '1', '150000', '6986', 'Sudah Bayar'),
(12, 'TR2336', 'US8699', 'BRNG_6476', '1', '25000', '1247', 'Sudah Bayar'),
(13, 'TR6251', 'US8699', 'BRNG_6423', '1', '125000', '4827', 'Sudah Bayar'),
(14, 'TR8462', 'US8699', 'BRNG_6423', '2', '250000', '4260', 'Sudah Bayar'),
(15, 'TR9295', 'US8699', 'BRNG_6423', '1', '125000', '9913', 'Sudah Bayar'),
(16, 'TR1982', 'US8699', 'BRNG_6423', '1', '125000', '2041', 'Sudah Bayar'),
(17, 'TR4375', 'US8699', 'BRNG_6423', '1', '125000', '6390', 'Sudah Bayar'),
(18, 'TR9431', 'US8699', 'BRNG_6423', '1', '125000', '2133', 'Sudah Bayar'),
(19, 'TR5383', 'US8699', 'BRNG_6423', '2', '250000', '8844', 'Sudah Bayar'),
(20, 'TR2660', 'US8699', 'BRNG_6423', '1', '125000', '5148', 'Sudah Bayar'),
(21, 'TR2660', 'US8699', 'BRNG_6476', '1', '150000', '5148', 'Sudah Bayar'),
(22, 'TR5868', 'US8699', 'BRNG_6476', '1', '25000', '5317', 'Sudah Bayar'),
(23, 'TR5868', 'US8699', 'BRNG_6423', '2', '275000', '5317', 'Sudah Bayar'),
(24, 'TR9323', 'US8699', 'BRNG_6423', '1', '125000', '3094', 'Sudah Bayar'),
(25, 'TR9323', 'US8699', 'BRNG_2532', '1', '140000', '3094', 'Sudah Bayar'),
(26, 'TR9323', 'US8699', 'BRNG_6476', '1', '165000', '3094', 'Sudah Bayar');

-- --------------------------------------------------------

--
-- Table structure for table `user`
--

CREATE TABLE `user` (
  `id_user` varchar(255) NOT NULL,
  `nama` varchar(255) NOT NULL,
  `username` varchar(255) NOT NULL,
  `password` varchar(255) NOT NULL,
  `role` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `user`
--

INSERT INTO `user` (`id_user`, `nama`, `username`, `password`, `role`) VALUES
('US6319', 'admin', 'admin', 'akugaul123', 'Admin'),
('US8699', 'Jovian', 'vianulhag', 'akugaul123', 'User');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `kategori`
--
ALTER TABLE `kategori`
  ADD PRIMARY KEY (`id_kategori`);

--
-- Indexes for table `tb_barang`
--
ALTER TABLE `tb_barang`
  ADD PRIMARY KEY (`id_brng`),
  ADD KEY `kategori` (`kategori`);

--
-- Indexes for table `transaksi`
--
ALTER TABLE `transaksi`
  ADD PRIMARY KEY (`id`),
  ADD KEY `id_brng` (`id_brng`),
  ADD KEY `id_user` (`id_user`);

--
-- Indexes for table `user`
--
ALTER TABLE `user`
  ADD PRIMARY KEY (`id_user`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `transaksi`
--
ALTER TABLE `transaksi`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=27;

--
-- Constraints for dumped tables
--

--
-- Constraints for table `tb_barang`
--
ALTER TABLE `tb_barang`
  ADD CONSTRAINT `tb_barang_ibfk_1` FOREIGN KEY (`kategori`) REFERENCES `kategori` (`id_kategori`) ON DELETE NO ACTION ON UPDATE CASCADE;

--
-- Constraints for table `transaksi`
--
ALTER TABLE `transaksi`
  ADD CONSTRAINT `transaksi_ibfk_1` FOREIGN KEY (`id_brng`) REFERENCES `tb_barang` (`id_brng`) ON DELETE CASCADE ON UPDATE NO ACTION,
  ADD CONSTRAINT `transaksi_ibfk_2` FOREIGN KEY (`id_user`) REFERENCES `user` (`id_user`) ON DELETE CASCADE ON UPDATE NO ACTION;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
