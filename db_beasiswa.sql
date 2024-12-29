-- phpMyAdmin SQL Dump
-- version 5.0.2
-- https://www.phpmyadmin.net/
--
-- Host: localhost:3306
-- Generation Time: Aug 19, 2023 at 07:56 PM
-- Server version: 10.4.13-MariaDB
-- PHP Version: 7.4.7

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";

/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `dbeasiswa`
--

-- --------------------------------------------------------

--
-- Table structure for table `data_beasiswa`
--

CREATE TABLE `data_beasiswa` (
  `id` int(11) NOT NULL,
  `nama` varchar(100) NOT NULL,
  `email` varchar(100) NOT NULL,
  `nomor_hp` varchar(20) NOT NULL,
  `semester` int(11) NOT NULL,
  `ipk` decimal(3,2) DEFAULT NULL,
  `beasiswa` varchar(50) NOT NULL,
  `berkas` varchar(255) NOT NULL,
  `status_ajuan` varchar(100) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `data_beasiswa`
--

INSERT INTO `data_beasiswa` (`id`, `nama`, `email`, `nomor_hp`, `semester`, `ipk`, `beasiswa`, `berkas`, `status_ajuan`) VALUES
(17, 'Kurniawan Rs', 'kurniawanrs11@gmail.com', '086574624525', 7, '3.40', 'beasiswa1', 'berkas1.pdf', ''),
(18, 'Dina Pratiwi', 'dinapratiwi@example.com', '087654321234', 5, '3.75', 'beasiswa2', 'berkas2.pdf', ''),
(19, 'Andi Setiawan', 'andi.setiawan@example.com', '089876543210', 6, '2.90', 'beasiswa3', 'berkas3.pdf', ''),
(20, 'Lina Susanti', 'lina.susanti@example.com', '081234567890', 3, '3.60', 'beasiswa1', 'berkas4.pdf', ''),
(21, 'Budi Hartono', 'budi.hartono@example.com', '082345678901', 4, '3.40', 'beasiswa2', 'berkas5.pdf', ''),
(22, 'Siti Aisyah', 'siti.aisyah@example.com', '083456789012', 2, '3.20', 'beasiswa3', 'berkas6.pdf', ''),
(23, 'Rudi Rahman', 'rudi.rahman@example.com', '085678901234', 5, '3.50', 'beasiswa1', 'berkas7.pdf', ''),
(24, 'Rina Puspita', 'rina.puspita@example.com', '086789012345', 6, '3.10', 'beasiswa2', 'berkas8.pdf', ''),
(25, 'Maya Lestari', 'maya.lestari@example.com', '087890123456', 7, '3.80', 'beasiswa3', 'berkas9.pdf', ''),
(26, 'Ahmad Zulkifli', 'ahmad.zulkifli@example.com', '089901234567', 4, '2.85', 'beasiswa1', 'berkas10.pdf', ''),
(27, 'Nina Fitria', 'nina.fitria@example.com', '080123456789', 3, '3.30', 'beasiswa2', 'berkas11.pdf', ''),
(28, 'Eko Prasetyo', 'eko.prasetyo@example.com', '081234567890', 2, '2.70', 'beasiswa3', 'berkas12.pdf', ''),
(29, 'Dewi Kusuma', 'dewi.kusuma@example.com', '082345678901', 1, '3.60', 'beasiswa1', 'berkas13.pdf', ''),
(30, 'Hendra Setiawan', 'hendra.setiawan@example.com', '083456789012', 5, '3.55', 'beasiswa2', 'berkas14.pdf', ''),
(31, 'Feni Wulandari', 'feni.wulandari@example.com', '084567890123', 6, '3.25', 'beasiswa3', 'berkas15.pdf', '');

-- --------------------------------------------------------

--
-- Table structure for table `mahasiswa`
--

CREATE TABLE `mahasiswa` (
  `id` int(11) NOT NULL,
  `ipk` decimal(3,2) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `mahasiswa`
--

INSERT INTO `mahasiswa` (`id`, `ipk`) VALUES
(3, '3.50'),
(4, '2.85'),
(5, '3.60'),
(6, '3.40'),
(7, '3.30'),
(8, '3.70'),
(9, '3.20'),
(10, '3.80'),
(11, '2.90'),
(12, '3.00'),
(13, '3.60'),
(14, '2.75'),
(15, '3.40'),
(16, '3.10');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `data_beasiswa`
--
ALTER TABLE `data_beasiswa`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `mahasiswa`
--
ALTER TABLE `mahasiswa`
  ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `data_beasiswa`
--
ALTER TABLE `data_beasiswa`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=32;

--
-- AUTO_INCREMENT for table `mahasiswa`
--
ALTER TABLE `mahasiswa`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=17;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
