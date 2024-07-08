-- phpMyAdmin SQL Dump
-- version 5.0.2
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Jul 08, 2024 at 03:21 AM
-- Server version: 10.4.14-MariaDB
-- PHP Version: 7.4.10

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
-- Table structure for table `alternatif`
--

CREATE TABLE `alternatif` (
  `idalternatife` int(3) NOT NULL,
  `namaalternatif` varchar(35) NOT NULL,
  `nilaipreferensi` double(7,3) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `alternatif`
--

INSERT INTO `alternatif` (`idalternatife`, `namaalternatif`, `nilaipreferensi`) VALUES
(1, 'araz', 0.920),
(2, 'xavier', 0.758),
(3, 'garit', 1.000);

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
(1, 'hafalan alquran', 0.25, NULL, 2),
(2, 'pelafalan makhroj', 0.25, NULL, 2),
(3, 'penerapan kaedah kaedah tajwid', 0.25, NULL, 2),
(4, 'Sifat-sifat huruf Hijaiyah ', 0.25, NULL, 2);

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
  `idalternatife` int(3) NOT NULL,
  `nilairating` double(7,2) DEFAULT NULL,
  `nilainormalisasi` double(7,2) DEFAULT NULL,
  `bobotnormalisasi` double(7,2) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `ratingkecocokan`
--

INSERT INTO `ratingkecocokan` (`idrating`, `idkriteria`, `idalternatife`, `nilairating`, `nilainormalisasi`, `bobotnormalisasi`) VALUES
(5, 1, 1, 0.03, 0.75, NULL),
(6, 2, 1, 0.28, 0.93, NULL),
(7, 3, 1, 0.27, 1.00, NULL),
(8, 4, 1, 0.27, 1.00, NULL),
(9, 1, 2, 0.01, 0.25, NULL),
(10, 2, 2, 0.30, 1.00, NULL),
(11, 3, 2, 0.24, 0.89, NULL),
(12, 4, 2, 0.24, 0.89, NULL),
(13, 1, 3, 0.04, 1.00, NULL),
(14, 2, 3, 0.30, 1.00, NULL),
(15, 3, 3, 0.27, 1.00, NULL),
(16, 4, 3, 0.27, 1.00, NULL);

--
-- Indexes for dumped tables
--

--
-- Indexes for table `alternatif`
--
ALTER TABLE `alternatif`
  ADD PRIMARY KEY (`idalternatife`);

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
-- AUTO_INCREMENT for table `alternatif`
--
ALTER TABLE `alternatif`
  MODIFY `idalternatife` int(3) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT for table `kriteria`
--
ALTER TABLE `kriteria`
  MODIFY `idkriteria` int(3) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- AUTO_INCREMENT for table `ratingkecocokan`
--
ALTER TABLE `ratingkecocokan`
  MODIFY `idrating` int(5) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=17;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
