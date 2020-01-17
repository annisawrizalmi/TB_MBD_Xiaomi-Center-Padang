-- phpMyAdmin SQL Dump
-- version 4.8.5
-- https://www.phpmyadmin.net/
--
-- Host: localhost:3306
-- Generation Time: Dec 06, 2019 at 07:28 AM
-- Server version: 5.7.24
-- PHP Version: 7.2.19

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET AUTOCOMMIT = 0;
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `xiaomipdgs`
--

-- --------------------------------------------------------

--
-- Table structure for table `barang`
--

CREATE TABLE `barang` (
  `id_barang` varchar(10) NOT NULL,
  `tipe_barang` varchar(50) NOT NULL,
  `warna` varchar(20) NOT NULL,
  `stock` int(4) NOT NULL,
  `ram_rom` varchar(20) NOT NULL,
  `harga` int(10) NOT NULL,
  `imei` varchar(20) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `barang`
--

INSERT INTO `barang` (`id_barang`, `tipe_barang`, `warna`, `stock`, `ram_rom`, `harga`, `imei`) VALUES
('74573', 'iphone', 'red', 7, '6gb/8gb', 98000000, '74384738832'),
('BRG2', 'vivo y83', 'byellow', 8, '6gb/8gb', 11000000, '46238746283'),
('BRG4', 'oppo', 'green', 7, '6gb/12gb', 43000000, '6342364836'),
('brg8', 'asus', 'green', 5, '8gn/128gb', 4500000, '74984759348382');

-- --------------------------------------------------------

--
-- Table structure for table `detail_transaksi`
--

CREATE TABLE `detail_transaksi` (
  `no_faktur` int(5) NOT NULL,
  `id_barang` varchar(10) NOT NULL,
  `jumlah_barang` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `detail_transaksi`
--

INSERT INTO `detail_transaksi` (`no_faktur`, `id_barang`, `jumlah_barang`) VALUES
(9, 'BRG4', 8),
(10, 'BRG4', 1),
(11, 'BRG2', 1),
(12, '74573', 2),
(13, 'BRG4', 1);

-- --------------------------------------------------------

--
-- Table structure for table `login`
--

CREATE TABLE `login` (
  `kode_user` int(5) NOT NULL,
  `username` varchar(50) NOT NULL,
  `password` varchar(50) NOT NULL,
  `nama` varchar(30) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `login`
--

INSERT INTO `login` (`kode_user`, `username`, `password`, `nama`) VALUES
(1, 'admin', '12345', 'Annisa WR');

-- --------------------------------------------------------

--
-- Table structure for table `pembeli`
--

CREATE TABLE `pembeli` (
  `id_pembeli` varchar(30) NOT NULL,
  `nama_pembeli` varchar(40) NOT NULL,
  `no_hp` varchar(12) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `pembeli`
--

INSERT INTO `pembeli` (`id_pembeli`, `nama_pembeli`, `no_hp`) VALUES
('001P', 'wahyu febrian bayu khan', '087456378294'),
('002p', 'ananda mardhatillah', '08463746237'),
('006', 'M. Nur Faiz Putro', '084394239472'),
('8473', 'muhammad hamdi', '03403258432'),
('brg6', 'erick okta wirdana', '094857637623'),
('ph002', 'Feny Mametri', '083473829132'),
('ph004', 'Annisa Wistia Rizalmi', '093283273124');

-- --------------------------------------------------------

--
-- Table structure for table `transaksi`
--

CREATE TABLE `transaksi` (
  `no_faktur` int(5) NOT NULL,
  `tgl_transaksi` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP,
  `total_harga` varchar(10) NOT NULL,
  `id_pembeli` varchar(30) NOT NULL,
  `kode_user` int(5) NOT NULL,
  `status` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `transaksi`
--

INSERT INTO `transaksi` (`no_faktur`, `tgl_transaksi`, `total_harga`, `id_pembeli`, `kode_user`, `status`) VALUES
(9, '2019-12-05 17:00:00', '8', '001P', 1, 8),
(10, '2019-12-05 17:00:00', '1', 'ph004', 1, 1),
(11, '2019-12-05 17:00:00', '1', 'ph002', 1, 1),
(12, '2019-12-05 17:00:00', '2', '001P', 1, 2),
(13, '2019-12-05 17:00:00', '1', '006', 1, 1);

--
-- Indexes for dumped tables
--

--
-- Indexes for table `barang`
--
ALTER TABLE `barang`
  ADD PRIMARY KEY (`id_barang`);

--
-- Indexes for table `detail_transaksi`
--
ALTER TABLE `detail_transaksi`
  ADD PRIMARY KEY (`no_faktur`,`id_barang`),
  ADD KEY `id_barang` (`id_barang`),
  ADD KEY `no_faktur` (`no_faktur`);

--
-- Indexes for table `login`
--
ALTER TABLE `login`
  ADD PRIMARY KEY (`kode_user`);

--
-- Indexes for table `pembeli`
--
ALTER TABLE `pembeli`
  ADD PRIMARY KEY (`id_pembeli`);

--
-- Indexes for table `transaksi`
--
ALTER TABLE `transaksi`
  ADD PRIMARY KEY (`no_faktur`),
  ADD KEY `id_pembeli` (`id_pembeli`),
  ADD KEY `kode_user` (`kode_user`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `detail_transaksi`
--
ALTER TABLE `detail_transaksi`
  MODIFY `no_faktur` int(5) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=14;

--
-- AUTO_INCREMENT for table `login`
--
ALTER TABLE `login`
  MODIFY `kode_user` int(5) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT for table `transaksi`
--
ALTER TABLE `transaksi`
  MODIFY `no_faktur` int(5) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=14;

--
-- Constraints for dumped tables
--

--
-- Constraints for table `detail_transaksi`
--
ALTER TABLE `detail_transaksi`
  ADD CONSTRAINT `detail_transaksi_ibfk_2` FOREIGN KEY (`id_barang`) REFERENCES `barang` (`id_barang`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `detail_transaksi_ibfk_3` FOREIGN KEY (`no_faktur`) REFERENCES `transaksi` (`no_faktur`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Constraints for table `transaksi`
--
ALTER TABLE `transaksi`
  ADD CONSTRAINT `transaksi_ibfk_1` FOREIGN KEY (`kode_user`) REFERENCES `login` (`kode_user`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `transaksi_ibfk_2` FOREIGN KEY (`id_pembeli`) REFERENCES `pembeli` (`id_pembeli`) ON DELETE CASCADE ON UPDATE CASCADE;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
