-- phpMyAdmin SQL Dump
-- version 5.2.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Jan 07, 2025 at 11:11 AM
-- Server version: 10.4.28-MariaDB
-- PHP Version: 8.2.4

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `pendaftaran`
--

-- --------------------------------------------------------

--
-- Table structure for table `nilai`
--

CREATE TABLE `nilai` (
  `id` int(11) NOT NULL,
  `nilai_semester1` double DEFAULT NULL,
  `nilai_semester2` double DEFAULT NULL,
  `nilai_semester3` double DEFAULT NULL,
  `nilai_semester4` double DEFAULT NULL,
  `nilai_semester5` double DEFAULT NULL,
  `status` int(1) NOT NULL,
  `pendaftar_id` int(11) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1 COLLATE=latin1_swedish_ci;

--
-- Dumping data for table `nilai`
--

INSERT INTO `nilai` (`id`, `nilai_semester1`, `nilai_semester2`, `nilai_semester3`, `nilai_semester4`, `nilai_semester5`, `status`, `pendaftar_id`) VALUES
(22, 20, 100, 80, 90, 70, 0, 25),
(24, 10, 100, 80, 90, 100, 0, 26),
(25, 80, 80, 80, 80, 80, 1, 27);

-- --------------------------------------------------------

--
-- Table structure for table `payment`
--

CREATE TABLE `payment` (
  `id` int(11) NOT NULL,
  `tanggal_pembayaran` date DEFAULT NULL,
  `bukti_pembayaran` varchar(300) CHARACTER SET latin1 COLLATE latin1_swedish_ci DEFAULT NULL,
  `status` int(1) NOT NULL,
  `pendaftar_id` int(11) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `payment`
--

INSERT INTO `payment` (`id`, `tanggal_pembayaran`, `bukti_pembayaran`, `status`, `pendaftar_id`) VALUES
(9, '2024-12-02', '83074955_819191281841589_5414137822313447424_n.jpg', 0, 14),
(11, '2024-12-04', 'contoh bukti tf.jpg', 0, 17),
(13, '2024-12-15', 'bukti pembayaran ukt Fatur Rahman.jpg', 0, 25),
(14, '2024-12-17', 'bukti pembayaran ukt Fatur Rahman.jpg', 0, 26),
(15, '2024-12-28', 'bukti pembayaran ukt Fatur Rahman.jpg', 0, 26),
(16, '2024-12-20', 'ttd fatur.jpg', 0, 27);

-- --------------------------------------------------------

--
-- Table structure for table `pendaftar`
--

CREATE TABLE `pendaftar` (
  `id` int(11) NOT NULL,
  `nama` varchar(100) DEFAULT NULL,
  `tmpt_lahir` varchar(100) DEFAULT NULL,
  `tgl_lahir` date DEFAULT NULL,
  `jenis_kelamin` enum('L','P') DEFAULT NULL,
  `agama` varchar(45) DEFAULT NULL,
  `alamat` text DEFAULT NULL,
  `email` varchar(100) DEFAULT NULL,
  `telepon` varchar(45) DEFAULT NULL,
  `foto` varchar(100) NOT NULL,
  `users_id` int(11) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1 COLLATE=latin1_swedish_ci;

--
-- Dumping data for table `pendaftar`
--

INSERT INTO `pendaftar` (`id`, `nama`, `tmpt_lahir`, `tgl_lahir`, `jenis_kelamin`, `agama`, `alamat`, `email`, `telepon`, `foto`, `users_id`) VALUES
(24, 'Fatur Rahman', 'Jakarta', '2001-01-30', 'L', 'islam', 'Jl tambun rengas rt 03/rw 07 Cakung timur Jakarta timur', 'elfatur988@gmail.com', '081905212457', '', 33),
(25, 'yasa', 'Jakarta', '2001-01-30', 'P', 'katolik', 'Jl tambun rengas rt 03/rw 07 Cakung timur Jakarta timur', 'yasa@gmail.com', '081905212457', '', 34),
(26, 'nana', 'Bandung', '2003-05-31', 'P', 'islam', 'Jl tambun rengas rt 03/rw 07 Cakung timur Jakarta timur', 'ftrhmn989@gmail.com', '081905212457', 'nana.jpg', 36),
(27, 'rayhandika', 'bekasi', '2024-12-12', 'L', 'islam', 'kaliabang dukuh', 'rayhandhika77@gmail.com', '085156087573', '', 37);

-- --------------------------------------------------------

--
-- Table structure for table `users`
--

CREATE TABLE `users` (
  `id` int(11) NOT NULL,
  `nama` varchar(45) DEFAULT NULL,
  `username` varchar(100) DEFAULT NULL,
  `password` varchar(255) DEFAULT NULL,
  `level` varchar(45) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1 COLLATE=latin1_swedish_ci;

--
-- Dumping data for table `users`
--

INSERT INTO `users` (`id`, `nama`, `username`, `password`, `level`) VALUES
(8, 'Administrator', 'admin@gmail.com', '81dc9bdb52d04dc20036dbd8313ed055', 'admin'),
(33, 'Fatur Rahman', 'elfatur988@gmail.com', '81dc9bdb52d04dc20036dbd8313ed055', 'siswa'),
(34, 'yasa', 'yasa@gmail.com', '81dc9bdb52d04dc20036dbd8313ed055', 'siswa'),
(36, 'nana', 'ftrhmn989@gmail.com', '81dc9bdb52d04dc20036dbd8313ed055', 'siswa'),
(37, 'rayhandika', 'rayhandhika77@gmail.com', '45d0c2233a8c406612cd7649e94c7757', 'siswa');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `nilai`
--
ALTER TABLE `nilai`
  ADD PRIMARY KEY (`id`),
  ADD KEY `fk_nilai_pendaftar1_idx` (`pendaftar_id`);

--
-- Indexes for table `payment`
--
ALTER TABLE `payment`
  ADD PRIMARY KEY (`id`),
  ADD KEY `pendaftar_id` (`pendaftar_id`);

--
-- Indexes for table `pendaftar`
--
ALTER TABLE `pendaftar`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `email_UNIQUE` (`email`),
  ADD KEY `fk_pendaftar_users_idx` (`users_id`);

--
-- Indexes for table `users`
--
ALTER TABLE `users`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `username_UNIQUE` (`username`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `nilai`
--
ALTER TABLE `nilai`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=26;

--
-- AUTO_INCREMENT for table `payment`
--
ALTER TABLE `payment`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=17;

--
-- AUTO_INCREMENT for table `pendaftar`
--
ALTER TABLE `pendaftar`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=28;

--
-- AUTO_INCREMENT for table `users`
--
ALTER TABLE `users`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=38;

--
-- Constraints for dumped tables
--

--
-- Constraints for table `nilai`
--
ALTER TABLE `nilai`
  ADD CONSTRAINT `fk_nilai_pendaftar1` FOREIGN KEY (`pendaftar_id`) REFERENCES `pendaftar` (`id`) ON DELETE NO ACTION ON UPDATE NO ACTION;

--
-- Constraints for table `pendaftar`
--
ALTER TABLE `pendaftar`
  ADD CONSTRAINT `fk_pendaftar_users` FOREIGN KEY (`users_id`) REFERENCES `users` (`id`) ON DELETE NO ACTION ON UPDATE NO ACTION;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
