-- phpMyAdmin SQL Dump
-- version 5.2.0
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Sep 29, 2024 at 08:52 AM
-- Server version: 10.4.27-MariaDB
-- PHP Version: 7.4.33

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `perkin`
--

-- --------------------------------------------------------

--
-- Table structure for table `juri`
--

CREATE TABLE `juri` (
  `IdJuri` int(11) NOT NULL,
  `Username` varchar(50) NOT NULL,
  `Password` varchar(255) NOT NULL,
  `NamaJuri` varchar(20) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `juri`
--

INSERT INTO `juri` (`IdJuri`, `Username`, `Password`, `NamaJuri`) VALUES
(1, 'perkin@gmail.com', '$2y$10$PM0EjisLhbGbTjSZMeufD.MBe8B86BVy7ylxogS/blhXUERSivA.W', ''),
(2, 'maman123', '$2y$10$WcmDvi1mhOYACjvehi0IjuMFdNn7pBLgzszMKPvxpHKWneKZ5b.Hy', 'nana'),
(3, 'adin123', '$2y$10$8.VWRhyudTh9bwY9h1/cae2uiUAbDS.eL6LYM0qt2FLTN66bYOPpq', 'adin'),
(4, 'bimo123', '$2y$10$ViEMmwHAJpCnDtIt1e7K5e4ezsbSoWSXSJoL69Blrf8vpEpmFugOC', 'bimo'),
(5, 'Yoppie', '$2y$10$Dep2yo8DwBo3j1apF9Dilu5dgi82Plv/3oMHqfsvw0OBPG2u6IR/O', 'Yuni');

-- --------------------------------------------------------

--
-- Table structure for table `kategori`
--

CREATE TABLE `kategori` (
  `IdKategori` int(11) NOT NULL,
  `NamaEvent` varchar(255) NOT NULL,
  `Deskripsi` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `kategori`
--

INSERT INTO `kategori` (`IdKategori`, `NamaEvent`, `Deskripsi`) VALUES
(4, 'eventbdg', 'testing');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `juri`
--
ALTER TABLE `juri`
  ADD PRIMARY KEY (`IdJuri`);

--
-- Indexes for table `kategori`
--
ALTER TABLE `kategori`
  ADD PRIMARY KEY (`IdKategori`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `juri`
--
ALTER TABLE `juri`
  MODIFY `IdJuri` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;

--
-- AUTO_INCREMENT for table `kategori`
--
ALTER TABLE `kategori`
  MODIFY `IdKategori` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
