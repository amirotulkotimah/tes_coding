-- phpMyAdmin SQL Dump
-- version 5.2.0
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Jun 21, 2023 at 10:36 AM
-- Server version: 10.4.27-MariaDB
-- PHP Version: 8.1.12

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `sepak_bola`
--

-- --------------------------------------------------------

--
-- Table structure for table `tb_klasemen`
--

CREATE TABLE `tb_klasemen` (
  `id_klasemen` bigint(5) NOT NULL,
  `klub` varchar(50) DEFAULT NULL,
  `main` int(5) NOT NULL,
  `menang` int(5) NOT NULL,
  `seri` int(5) NOT NULL,
  `kalah` int(5) NOT NULL,
  `gol_menang` int(5) NOT NULL,
  `gol_kalah` int(5) NOT NULL,
  `point` int(5) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

-- --------------------------------------------------------

--
-- Table structure for table `tb_klub`
--

CREATE TABLE `tb_klub` (
  `id_klub` bigint(5) NOT NULL,
  `nama_klub` varchar(50) NOT NULL,
  `kota_klub` varchar(50) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

-- --------------------------------------------------------

--
-- Table structure for table `tb_skor`
--

CREATE TABLE `tb_skor` (
  `id_skor` bigint(5) NOT NULL,
  `klub_pertama` varchar(50) NOT NULL,
  `klub_kedua` varchar(50) NOT NULL,
  `skor_klub_pertama` bigint(5) NOT NULL,
  `skor_klub_kedua` int(11) NOT NULL,
  `kode` varchar(5) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Indexes for dumped tables
--

--
-- Indexes for table `tb_klasemen`
--
ALTER TABLE `tb_klasemen`
  ADD PRIMARY KEY (`id_klasemen`);

--
-- Indexes for table `tb_klub`
--
ALTER TABLE `tb_klub`
  ADD PRIMARY KEY (`id_klub`);

--
-- Indexes for table `tb_skor`
--
ALTER TABLE `tb_skor`
  ADD PRIMARY KEY (`id_skor`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `tb_klasemen`
--
ALTER TABLE `tb_klasemen`
  MODIFY `id_klasemen` bigint(5) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=14;

--
-- AUTO_INCREMENT for table `tb_klub`
--
ALTER TABLE `tb_klub`
  MODIFY `id_klub` bigint(5) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=22;

--
-- AUTO_INCREMENT for table `tb_skor`
--
ALTER TABLE `tb_skor`
  MODIFY `id_skor` bigint(5) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=107;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
