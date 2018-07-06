-- phpMyAdmin SQL Dump
-- version 4.7.7
-- https://www.phpmyadmin.net/
--
-- Host: localhost:3306
-- Generation Time: Jul 06, 2018 at 02:42 PM
-- Server version: 10.1.31-MariaDB-cll-lve
-- PHP Version: 5.6.30

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET AUTOCOMMIT = 0;
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `nocuniverse_dbcart`
--

-- --------------------------------------------------------

--
-- Table structure for table `barang`
--

CREATE TABLE `barang` (
  `kodebrg` varchar(10) NOT NULL,
  `nama` varchar(50) DEFAULT NULL,
  `harga` int(11) DEFAULT NULL,
  `stok` int(11) DEFAULT NULL,
  `gambar` varchar(35) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `barang`
--

INSERT INTO `barang` (`kodebrg`, `nama`, `harga`, `stok`, `gambar`) VALUES
('BRG-001', 'DELL Inspiron 15 Gaming 7567', 4725000, 88, 'Dell-Inspiron-15-Gaming-7567.jpg'),
('BRG-002', 'ASUS A555LB', 8320000, 63, 'Asus_A555lb.jpg'),
('BRG-003', 'Lenovo Yoga 720', 1900000, 92, 'Lenovo-Yoga-720.jpg'),
('BRG-004', 'Toshiba Satellite C55D', 4725000, 74, 'Toshiba-Satellite-C55D.jpg'),
('BRG-005', 'Apple MacBook Air MMG2', 13125000, 96, 'Apple-MacBook-Air-MMGF2.jpg'),
('BRG-006', 'ASUS X455J', 5225000, 99, 'Asus-X455LJ.jpg');

-- --------------------------------------------------------

--
-- Table structure for table `jual`
--

CREATE TABLE `jual` (
  `nopjl` varchar(10) NOT NULL,
  `kodebrg` varchar(10) NOT NULL,
  `harga` int(11) DEFAULT NULL,
  `jumlah` int(11) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `jual`
--

INSERT INTO `jual` (`nopjl`, `kodebrg`, `harga`, `jumlah`) VALUES
('PJL00001', 'BRG-001', 4725000, 1),
('PJL00001', 'BRG-002', 8320000, 2),
('PJL00003', 'BRG-001', 4725000, 1),
('PJL00003', 'BRG-002', 8320000, 2),
('PJL00003', 'BRG-003', 1900000, 2),
('PJL00004', 'BRG-001', 4725000, 1),
('PJL00004', 'BRG-002', 8320000, 2),
('PJL00005', 'BRG-001', 4725000, 1),
('PJL00005', 'BRG-002', 8320000, 2),
('PJL00005', 'BRG-003', 1900000, 1),
('PJL00006', 'BRG-001', 4725000, 1),
('PJL00006', 'BRG-003', 1900000, 2);

-- --------------------------------------------------------

--
-- Table structure for table `pembayaran`
--

CREATE TABLE `pembayaran` (
  `nopjl` varchar(10) NOT NULL,
  `tgl_bayar` date DEFAULT NULL,
  `jml_bayar` int(11) DEFAULT NULL,
  `status` tinyint(1) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `pembayaran`
--

INSERT INTO `pembayaran` (`nopjl`, `tgl_bayar`, `jml_bayar`, `status`) VALUES
('PJL00001', '2018-07-06', 213650000, 1),
('PJL00003', '2018-07-06', 25165006, 1),
('PJL00005', '2018-07-06', 23265000, 1),
('PJL00006', '2018-07-06', 85250000, 1);

-- --------------------------------------------------------

--
-- Table structure for table `penjualan`
--

CREATE TABLE `penjualan` (
  `nopjl` varchar(10) NOT NULL,
  `tgl` date DEFAULT NULL,
  `nama` varchar(50) DEFAULT NULL,
  `hp` varchar(13) DEFAULT NULL,
  `alamat` text
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `penjualan`
--

INSERT INTO `penjualan` (`nopjl`, `tgl`, `nama`, `hp`, `alamat`) VALUES
('PJL00001', '2018-07-06', 'Mufid Jamaluddin', '081563532000', 'Situraja, Sumedang, Jawa Barat'),
('PJL00003', '2018-07-06', 'Geraldi Sihombing', '08156778899', 'Bandung, Jawa Barat'),
('PJL00004', '2018-07-06', 'Mufid J', '081563532000 ', 'Situraja, Sumedang '),
('PJL00005', '2018-07-06', 'Adrian Halim', '+628132294439', 'Bandung, Jawa Barat'),
('PJL00006', '2018-07-06', 'Aziz Kivlan', '+628234343430', 'Bandung, Jawa Barat');

-- --------------------------------------------------------

--
-- Table structure for table `users`
--

CREATE TABLE `users` (
  `username` varchar(35) NOT NULL,
  `password` varchar(60) DEFAULT NULL
) ENGINE=MyISAM DEFAULT CHARSET=latin1;

--
-- Dumping data for table `users`
--

INSERT INTO `users` (`username`, `password`) VALUES
('admin', 'f7c3bc1d808e04732adf679965ccc34ca7ae3441');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `barang`
--
ALTER TABLE `barang`
  ADD PRIMARY KEY (`kodebrg`);

--
-- Indexes for table `jual`
--
ALTER TABLE `jual`
  ADD PRIMARY KEY (`nopjl`,`kodebrg`);

--
-- Indexes for table `pembayaran`
--
ALTER TABLE `pembayaran`
  ADD PRIMARY KEY (`nopjl`);

--
-- Indexes for table `penjualan`
--
ALTER TABLE `penjualan`
  ADD PRIMARY KEY (`nopjl`);

--
-- Indexes for table `users`
--
ALTER TABLE `users`
  ADD PRIMARY KEY (`username`);
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
