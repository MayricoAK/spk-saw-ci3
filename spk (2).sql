-- phpMyAdmin SQL Dump
-- version 5.2.0
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Jul 07, 2024 at 01:26 PM
-- Server version: 10.4.24-MariaDB
-- PHP Version: 8.0.19

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `spk`
--

-- --------------------------------------------------------

--
-- Table structure for table `atribut`
--

CREATE TABLE `atribut` (
  `idatribute` int(3) NOT NULL,
  `namaatribut` varchar(35) NOT NULL,
  `nilaipreferensi` int(11) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `atribut`
--

INSERT INTO `atribut` (`idatribute`, `namaatribut`, `nilaipreferensi`) VALUES
(7, 'A1', NULL),
(8, 'A2', NULL),
(9, 'A3', NULL);

-- --------------------------------------------------------

--
-- Table structure for table `kriteria`
--

CREATE TABLE `kriteria` (
  `idkriteria` int(3) NOT NULL,
  `namakriteria` varchar(35) NOT NULL,
  `bobotpreferensi` double(7,2) DEFAULT NULL,
  `nilaiNormalisasi` double(7,2) DEFAULT NULL,
  `jeniskriteria` int(1) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `kriteria`
--

INSERT INTO `kriteria` (`idkriteria`, `namakriteria`, `bobotpreferensi`, `nilaiNormalisasi`, `jeniskriteria`) VALUES
(1, 'Ijazah', 20.00, NULL, 2),
(2, 'Sertifikasi', 20.00, NULL, 2),
(3, 'Absen', 20.00, NULL, 2),
(4, 'Kedisiplinan', 20.00, NULL, 2),
(5, 'Tanggung Jawab', 20.00, NULL, 2);

-- --------------------------------------------------------

--
-- Table structure for table `pengguna`
--

CREATE TABLE `pengguna` (
  `idpengguna` varchar(30) NOT NULL,
  `password` varchar(30) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `pengguna`
--

INSERT INTO `pengguna` (`idpengguna`, `password`) VALUES
('Admin', '*68AB655AF1DDBDB3179671D16EB5B'),
('jaya', '*A4B6157319038724E3560894F7F93');

-- --------------------------------------------------------

--
-- Table structure for table `ratingkecocokan`
--

CREATE TABLE `ratingkecocokan` (
  `idrating` int(5) NOT NULL,
  `idkriteria` int(3) NOT NULL,
  `idatribute` int(3) NOT NULL,
  `nilairating` double(7,2) DEFAULT NULL,
  `nilainormalisasi` double(7,2) DEFAULT NULL,
  `bobotnormalisasi` double(7,2) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `ratingkecocokan`
--

INSERT INTO `ratingkecocokan` (`idrating`, `idkriteria`, `idatribute`, `nilairating`, `nilainormalisasi`, `bobotnormalisasi`) VALUES
(1, 1, 7, 70.00, 0.88, NULL),
(2, 1, 8, 80.00, 1.00, NULL),
(3, 1, 9, 60.00, 0.75, NULL),
(4, 2, 7, 60.00, 0.86, NULL),
(5, 2, 8, 70.00, 1.00, NULL),
(6, 2, 9, 50.00, 0.71, NULL),
(7, 3, 7, 80.00, 1.00, NULL),
(8, 3, 8, 70.00, 0.88, NULL),
(9, 3, 9, 80.00, 1.00, NULL),
(10, 4, 7, 50.00, 0.62, NULL),
(11, 4, 8, 80.00, 1.00, NULL),
(12, 4, 9, 80.00, 1.00, NULL),
(14, 5, 8, 50.00, 0.71, NULL),
(15, 5, 9, 70.00, 1.00, NULL),
(17, 5, 7, 70.00, 1.00, NULL);

--
-- Indexes for dumped tables
--

--
-- Indexes for table `atribut`
--
ALTER TABLE `atribut`
  ADD PRIMARY KEY (`idatribute`);

--
-- Indexes for table `kriteria`
--
ALTER TABLE `kriteria`
  ADD PRIMARY KEY (`idkriteria`);

--
-- Indexes for table `pengguna`
--
ALTER TABLE `pengguna`
  ADD PRIMARY KEY (`idpengguna`);

--
-- Indexes for table `ratingkecocokan`
--
ALTER TABLE `ratingkecocokan`
  ADD PRIMARY KEY (`idrating`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `atribut`
--
ALTER TABLE `atribut`
  MODIFY `idatribute` int(3) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=10;

--
-- AUTO_INCREMENT for table `kriteria`
--
ALTER TABLE `kriteria`
  MODIFY `idkriteria` int(3) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;

--
-- AUTO_INCREMENT for table `ratingkecocokan`
--
ALTER TABLE `ratingkecocokan`
  MODIFY `idrating` int(5) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=18;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
