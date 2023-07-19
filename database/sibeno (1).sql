-- phpMyAdmin SQL Dump
-- version 5.2.0
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Jul 17, 2023 at 06:15 AM
-- Server version: 10.4.27-MariaDB
-- PHP Version: 8.0.25

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `sibeno`
--

-- --------------------------------------------------------

--
-- Table structure for table `data_titik`
--

CREATE TABLE `data_titik` (
  `kode_titik` varchar(255) NOT NULL,
  `nama_titik` varchar(255) NOT NULL,
  `link` varchar(255) NOT NULL,
  `deskripsi` text NOT NULL,
  `foto` varchar(500) NOT NULL,
  `status` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1 COLLATE=latin1_swedish_ci;

--
-- Dumping data for table `data_titik`
--

INSERT INTO `data_titik` (`kode_titik`, `nama_titik`, `link`, `deskripsi`, `foto`, `status`) VALUES
('A11', 'Bendungan satu', 'https://www.google.com/maps/place/4%C2%B027\'24.0%22S+122%C2%B017\'52.9%22E/@-4.456669,122.2955955,18z/data=!3m1!4b1!4m7!1m2!2m1!1sbendungan!3m3!8m2!3d-4.456669!4d122.298031?entry=ttu', 'Bendungan adalah bangunan yang berupa urugan tanah, urugan batu, beton, dan atau pasangan batu yang dibangun selain untuk menahan dan menampung air, dapat pula dibangun untuk menahan dan menampung limbah tambang (tailing), atau menampung lumpur sehingga terbentuk waduk (Peraturan Pemerintah No. 37 Tahun 2010 tentang Bendungan).', '6342fb268adea-bendung-katulampa-kota-bogor-jawa-barat_1265_711.jpg', 'Nonaktif');

-- --------------------------------------------------------

--
-- Table structure for table `nilai`
--

CREATE TABLE `nilai` (
  `id` int(11) NOT NULL,
  `waktu` datetime NOT NULL DEFAULT current_timestamp() ON UPDATE current_timestamp(),
  `kode_titik` varchar(255) NOT NULL,
  `debit` int(255) NOT NULL,
  `tinggi` int(255) NOT NULL,
  `hujan` varchar(255) NOT NULL,
  `portal` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `nilai`
--

INSERT INTO `nilai` (`id`, `waktu`, `kode_titik`, `debit`, `tinggi`, `hujan`, `portal`) VALUES
(4468, '2023-07-17 12:14:35', 'A11', 0, 2, 'tidak_hujan', 'Tertutup');

-- --------------------------------------------------------

--
-- Table structure for table `user`
--

CREATE TABLE `user` (
  `id` int(11) NOT NULL,
  `name` varchar(255) NOT NULL,
  `password` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1 COLLATE=latin1_swedish_ci;

--
-- Dumping data for table `user`
--

INSERT INTO `user` (`id`, `name`, `password`) VALUES
(1, 'admin', '21232f297a57a5a743894a0e4a801fc3');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `data_titik`
--
ALTER TABLE `data_titik`
  ADD PRIMARY KEY (`kode_titik`);

--
-- Indexes for table `nilai`
--
ALTER TABLE `nilai`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `user`
--
ALTER TABLE `user`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `name` (`name`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `nilai`
--
ALTER TABLE `nilai`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4469;

--
-- AUTO_INCREMENT for table `user`
--
ALTER TABLE `user`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=28;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
