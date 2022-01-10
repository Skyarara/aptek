-- phpMyAdmin SQL Dump
-- version 5.1.0
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Jan 10, 2022 at 10:49 AM
-- Server version: 10.4.18-MariaDB
-- PHP Version: 8.0.3

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `finprodatabase`
--

-- --------------------------------------------------------

--
-- Table structure for table `customer`
--

CREATE TABLE `customer` (
  `idCustomer` int(11) NOT NULL,
  `namaCustomer` varchar(50) NOT NULL,
  `umur` int(5) NOT NULL,
  `alamat` varchar(255) DEFAULT NULL,
  `email` varchar(50) NOT NULL,
  `password` varchar(50) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `customer`
--

INSERT INTO `customer` (`idCustomer`, `namaCustomer`, `umur`, `alamat`, `email`, `password`) VALUES
(1, 'bam', 9, 'Jalan pattimura', 'bam@gmail.com', 'e5bea9a864d5b94d76ebdaaf43d66f4d');

-- --------------------------------------------------------

--
-- Table structure for table `detailkeluar`
--

CREATE TABLE `detailkeluar` (
  `idTransaksiKeluar` int(11) NOT NULL,
  `idProduk` varchar(11) NOT NULL,
  `jumlahBarang` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `detailkeluar`
--

INSERT INTO `detailkeluar` (`idTransaksiKeluar`, `idProduk`, `jumlahBarang`) VALUES
(4, 'P01', 1),
(5, 'P01', 1),
(5, 'P03', 1);

-- --------------------------------------------------------

--
-- Table structure for table `detailmasuk`
--

CREATE TABLE `detailmasuk` (
  `idTransaksiMasuk` int(11) NOT NULL,
  `idProduk` varchar(11) NOT NULL,
  `jumlahBarang` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `detailmasuk`
--

INSERT INTO `detailmasuk` (`idTransaksiMasuk`, `idProduk`, `jumlahBarang`) VALUES
(1, 'P01', 27),
(7, 'P01', 5),
(9, 'P03', 50),
(10, 'P04', 55),
(11, 'P02', 5),
(11, 'P03', 5),
(12, 'P01', 20),
(13, 'P02', 3),
(14, 'P01', 2),
(15, 'P01', 1),
(16, 'P01', 2),
(17, 'P01', 2);

-- --------------------------------------------------------

--
-- Table structure for table `loginadmin`
--

CREATE TABLE `loginadmin` (
  `AdminId` int(11) NOT NULL,
  `AdminName` varchar(50) NOT NULL,
  `Email` varchar(50) NOT NULL,
  `Password` varchar(50) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `loginadmin`
--

INSERT INTO `loginadmin` (`AdminId`, `AdminName`, `Email`, `Password`) VALUES
(1, 'Rizal', 'rizal123@gmail.com', 'rizal123');

-- --------------------------------------------------------

--
-- Table structure for table `produk`
--

CREATE TABLE `produk` (
  `idProduk` varchar(11) NOT NULL,
  `idType` varchar(11) NOT NULL,
  `nama` varchar(50) NOT NULL,
  `harga` int(11) NOT NULL,
  `stok` int(11) NOT NULL,
  `gambar` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `produk`
--

INSERT INTO `produk` (`idProduk`, `idType`, `nama`, `harga`, `stok`, `gambar`) VALUES
('P01', 'K01', 'Paracetamol Indofarma 500 mg 10 Tablet 1 Setrip', 30000, 95, 'paracetamol.jpg'),
('P02', 'K01', 'Bodrex', 2323, 240, 'bodrex extra.jpg'),
('P03', 'K04', 'Entrostop', 15000, 55, 'cdac536ee91c4e7d3d1c54a850140360.jpg'),
('P04', 'K04', 'Promag', 20000, 55, '31624416_30644347-c14c-431f-8d1d-52697aae1b5c_780_780.jpg');

-- --------------------------------------------------------

--
-- Table structure for table `supplier`
--

CREATE TABLE `supplier` (
  `idSupplier` int(11) NOT NULL,
  `namaSupplier` varchar(50) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `supplier`
--

INSERT INTO `supplier` (`idSupplier`, `namaSupplier`) VALUES
(2, 'CV. Acep Herbal'),
(3, 'PT. Jaya Utama Santikah');

-- --------------------------------------------------------

--
-- Table structure for table `transaksikeluar`
--

CREATE TABLE `transaksikeluar` (
  `idTransaksiKeluar` int(11) NOT NULL,
  `idCustomer` int(11) NOT NULL,
  `tanggal` timestamp NOT NULL DEFAULT current_timestamp(),
  `harga_total` int(11) NOT NULL,
  `catatan` varchar(255) DEFAULT NULL,
  `alamat` text NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `transaksikeluar`
--

INSERT INTO `transaksikeluar` (`idTransaksiKeluar`, `idCustomer`, `tanggal`, `harga_total`, `catatan`, `alamat`) VALUES
(4, 1, '2022-01-08 17:00:00', 54000, 'tolong kirim secepatnya', 'Jalan pattimura'),
(5, 1, '2022-01-09 17:00:00', 45000, '', 'Jalan pattimura');

-- --------------------------------------------------------

--
-- Table structure for table `transaksimasuk`
--

CREATE TABLE `transaksimasuk` (
  `idTransaksiMasuk` int(11) NOT NULL,
  `idSupplier` int(11) NOT NULL,
  `idAdmin` int(11) NOT NULL,
  `tanggal` timestamp NOT NULL DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `transaksimasuk`
--

INSERT INTO `transaksimasuk` (`idTransaksiMasuk`, `idSupplier`, `idAdmin`, `tanggal`) VALUES
(1, 2, 1, '2022-01-09 07:19:16'),
(2, 2, 1, '2022-01-09 13:14:40'),
(3, 2, 1, '2022-01-10 03:53:26'),
(4, 2, 1, '2022-01-10 03:55:00'),
(5, 2, 1, '2022-01-10 03:55:45'),
(6, 2, 1, '2022-01-10 03:56:21'),
(7, 2, 1, '2022-01-10 03:56:34'),
(8, 2, 1, '2022-01-10 03:59:03'),
(9, 2, 1, '2022-01-10 03:59:18'),
(10, 2, 1, '2022-01-10 04:00:58'),
(11, 2, 1, '2022-01-10 04:08:04'),
(12, 3, 1, '2022-01-10 04:14:30'),
(13, 2, 1, '2022-01-10 04:41:36'),
(14, 2, 1, '2022-01-10 04:45:50'),
(15, 2, 1, '2022-01-10 05:05:51'),
(16, 2, 1, '2022-01-10 05:07:20'),
(17, 2, 1, '2022-01-10 05:09:24');

-- --------------------------------------------------------

--
-- Table structure for table `typeproduk`
--

CREATE TABLE `typeproduk` (
  `idType` varchar(11) NOT NULL,
  `nama` varchar(50) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `typeproduk`
--

INSERT INTO `typeproduk` (`idType`, `nama`) VALUES
('K01', 'Obat Sakit Kepala'),
('K02', 'Obat Batuk & Pilek'),
('K03', 'Obat Sakit Perut'),
('K04', 'Obat Oles'),
('K05', 'Obat Anak - Anak'),
('K06', 'Obat Pereda Rasa Sakit');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `customer`
--
ALTER TABLE `customer`
  ADD PRIMARY KEY (`idCustomer`);

--
-- Indexes for table `detailkeluar`
--
ALTER TABLE `detailkeluar`
  ADD PRIMARY KEY (`idTransaksiKeluar`,`idProduk`),
  ADD KEY `detailkeluar_ibfk_2` (`idProduk`);

--
-- Indexes for table `detailmasuk`
--
ALTER TABLE `detailmasuk`
  ADD PRIMARY KEY (`idTransaksiMasuk`,`idProduk`),
  ADD KEY `idProduk` (`idProduk`);

--
-- Indexes for table `loginadmin`
--
ALTER TABLE `loginadmin`
  ADD PRIMARY KEY (`AdminId`);

--
-- Indexes for table `produk`
--
ALTER TABLE `produk`
  ADD PRIMARY KEY (`idProduk`),
  ADD KEY `idType` (`idType`);

--
-- Indexes for table `supplier`
--
ALTER TABLE `supplier`
  ADD PRIMARY KEY (`idSupplier`);

--
-- Indexes for table `transaksikeluar`
--
ALTER TABLE `transaksikeluar`
  ADD PRIMARY KEY (`idTransaksiKeluar`),
  ADD KEY `idCustomer` (`idCustomer`);

--
-- Indexes for table `transaksimasuk`
--
ALTER TABLE `transaksimasuk`
  ADD PRIMARY KEY (`idTransaksiMasuk`),
  ADD KEY `idAdmin` (`idAdmin`),
  ADD KEY `idSupplier` (`idSupplier`);

--
-- Indexes for table `typeproduk`
--
ALTER TABLE `typeproduk`
  ADD PRIMARY KEY (`idType`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `customer`
--
ALTER TABLE `customer`
  MODIFY `idCustomer` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT for table `loginadmin`
--
ALTER TABLE `loginadmin`
  MODIFY `AdminId` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT for table `supplier`
--
ALTER TABLE `supplier`
  MODIFY `idSupplier` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT for table `transaksikeluar`
--
ALTER TABLE `transaksikeluar`
  MODIFY `idTransaksiKeluar` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;

--
-- AUTO_INCREMENT for table `transaksimasuk`
--
ALTER TABLE `transaksimasuk`
  MODIFY `idTransaksiMasuk` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=18;

--
-- Constraints for dumped tables
--

--
-- Constraints for table `detailkeluar`
--
ALTER TABLE `detailkeluar`
  ADD CONSTRAINT `detailkeluar_ibfk_1` FOREIGN KEY (`idTransaksiKeluar`) REFERENCES `transaksikeluar` (`idTransaksiKeluar`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `detailkeluar_ibfk_2` FOREIGN KEY (`idProduk`) REFERENCES `produk` (`idProduk`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Constraints for table `detailmasuk`
--
ALTER TABLE `detailmasuk`
  ADD CONSTRAINT `detailmasuk_ibfk_1` FOREIGN KEY (`idTransaksiMasuk`) REFERENCES `transaksimasuk` (`idTransaksiMasuk`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `detailmasuk_ibfk_2` FOREIGN KEY (`idProduk`) REFERENCES `produk` (`idProduk`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Constraints for table `produk`
--
ALTER TABLE `produk`
  ADD CONSTRAINT `produk_ibfk_1` FOREIGN KEY (`idType`) REFERENCES `typeproduk` (`idType`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Constraints for table `transaksikeluar`
--
ALTER TABLE `transaksikeluar`
  ADD CONSTRAINT `transaksikeluar_ibfk_1` FOREIGN KEY (`idCustomer`) REFERENCES `customer` (`idCustomer`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Constraints for table `transaksimasuk`
--
ALTER TABLE `transaksimasuk`
  ADD CONSTRAINT `transaksimasuk_ibfk_1` FOREIGN KEY (`idSupplier`) REFERENCES `supplier` (`idSupplier`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `transaksimasuk_ibfk_2` FOREIGN KEY (`idAdmin`) REFERENCES `loginadmin` (`AdminId`) ON DELETE CASCADE ON UPDATE CASCADE;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
