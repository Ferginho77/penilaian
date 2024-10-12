-- --------------------------------------------------------
-- Host:                         127.0.0.1
-- Server version:               8.0.30 - MySQL Community Server - GPL
-- Server OS:                    Win64
-- HeidiSQL Version:             12.1.0.6537
-- --------------------------------------------------------

/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET NAMES utf8 */;
/*!50503 SET NAMES utf8mb4 */;
/*!40103 SET @OLD_TIME_ZONE=@@TIME_ZONE */;
/*!40103 SET TIME_ZONE='+00:00' */;
/*!40014 SET @OLD_FOREIGN_KEY_CHECKS=@@FOREIGN_KEY_CHECKS, FOREIGN_KEY_CHECKS=0 */;
/*!40101 SET @OLD_SQL_MODE=@@SQL_MODE, SQL_MODE='NO_AUTO_VALUE_ON_ZERO' */;
/*!40111 SET @OLD_SQL_NOTES=@@SQL_NOTES, SQL_NOTES=0 */;

-- Dumping structure for table perkin.juri
CREATE TABLE IF NOT EXISTS `juri` (
  `IdJuri` int NOT NULL AUTO_INCREMENT,
  `Username` varchar(50) COLLATE utf8mb4_general_ci NOT NULL,
  `Password` varchar(255) COLLATE utf8mb4_general_ci NOT NULL,
  `NamaJuri` varchar(20) COLLATE utf8mb4_general_ci NOT NULL,
  PRIMARY KEY (`IdJuri`)
) ENGINE=InnoDB AUTO_INCREMENT=8 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

-- Dumping data for table perkin.juri: ~7 rows (approximately)
INSERT INTO `juri` (`IdJuri`, `Username`, `Password`, `NamaJuri`) VALUES
	(1, 'perkin@gmail.com', '$2y$10$PM0EjisLhbGbTjSZMeufD.MBe8B86BVy7ylxogS/blhXUERSivA.W', ''),
	(2, 'maman123', '$2y$10$WcmDvi1mhOYACjvehi0IjuMFdNn7pBLgzszMKPvxpHKWneKZ5b.Hy', 'nana'),
	(3, 'adin123', '$2y$10$8.VWRhyudTh9bwY9h1/cae2uiUAbDS.eL6LYM0qt2FLTN66bYOPpq', 'adin'),
	(4, 'bimo123', '$2y$10$ViEMmwHAJpCnDtIt1e7K5e4ezsbSoWSXSJoL69Blrf8vpEpmFugOC', 'bimo'),
	(5, 'Yoppie', '$2y$10$Dep2yo8DwBo3j1apF9Dilu5dgi82Plv/3oMHqfsvw0OBPG2u6IR/O', 'Yuni'),
	(6, 'Fergie', '$2y$10$bgxmM7OAMv1qsOC4.NnlYuwqJES2Bw8UM.qQh9PqYk9QGEBKPxCXG', 'Nanang aja'),
	(7, 'juri2', '$2y$10$KGoxxiauc6Nr19O1LpmRheb5X7gpjre91PBWGykCyanOy4fQbIzCS', 'Nanang aja');

-- Dumping structure for table perkin.kategori
CREATE TABLE IF NOT EXISTS `kategori` (
  `IdKategori` int NOT NULL AUTO_INCREMENT,
  `NamaEvent` varchar(255) COLLATE utf8mb4_general_ci NOT NULL,
  `Deskripsi` varchar(255) COLLATE utf8mb4_general_ci NOT NULL,
  PRIMARY KEY (`IdKategori`)
) ENGINE=InnoDB AUTO_INCREMENT=8 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

-- Dumping data for table perkin.kategori: ~3 rows (approximately)
INSERT INTO `kategori` (`IdKategori`, `NamaEvent`, `Deskripsi`) VALUES
	(4, 'eventbdg', 'testing'),
	(5, 'event_jogja', 'jogjakarta'),
	(7, 'Event 2', 'www');

-- Dumping structure for table perkin.penilaian
CREATE TABLE IF NOT EXISTS `penilaian` (
  `IdNilai` int NOT NULL AUTO_INCREMENT,
  `status` varchar(50) COLLATE utf8mb4_general_ci DEFAULT NULL,
  `waktu_tempuh` decimal(10,2) DEFAULT NULL,
  `fault` int DEFAULT NULL,
  `refusal` int DEFAULT NULL,
  `result` decimal(10,2) DEFAULT NULL,
  `kelas` varchar(50) CHARACTER SET utf8mb4 COLLATE utf8mb4_general_ci DEFAULT NULL,
  `tanggal` date DEFAULT NULL,
  `IdKategori` int DEFAULT NULL,
  `no_peserta` int DEFAULT NULL,
  `IdJuri` int DEFAULT NULL,
  PRIMARY KEY (`IdNilai`) USING BTREE,
  KEY `FK_penilaian_kategori` (`IdKategori`),
  KEY `FK_penilaian_peserta` (`no_peserta`),
  KEY `FK_penilaian_juri` (`IdJuri`),
  CONSTRAINT `FK_penilaian_juri` FOREIGN KEY (`IdJuri`) REFERENCES `juri` (`IdJuri`) ON DELETE CASCADE ON UPDATE CASCADE,
  CONSTRAINT `FK_penilaian_kategori` FOREIGN KEY (`IdKategori`) REFERENCES `kategori` (`IdKategori`) ON DELETE CASCADE ON UPDATE CASCADE,
  CONSTRAINT `FK_penilaian_peserta` FOREIGN KEY (`no_peserta`) REFERENCES `peserta` (`no_peserta`) ON DELETE CASCADE ON UPDATE CASCADE
) ENGINE=InnoDB AUTO_INCREMENT=34 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

-- Dumping data for table perkin.penilaian: ~6 rows (approximately)
INSERT INTO `penilaian` (`IdNilai`, `status`, `waktu_tempuh`, `fault`, `refusal`, `result`, `kelas`, `tanggal`, `IdKategori`, `no_peserta`, `IdJuri`) VALUES
	(28, 'Diskualifikasi', 0.03, 2, 1, 15.03, 'A2', '2024-10-11', 5, 20, 6),
	(29, 'Finish', 0.04, 4, 2, 30.04, 'A2', '2024-10-12', 7, 22, 6),
	(30, 'Eliminasi', 0.03, 2, 1, 15.03, 'A2', '2024-10-12', 7, 23, 6),
	(31, 'Eliminasi', 0.04, 2, 2, 20.04, 'A1', '2024-10-12', 5, 20, 7),
	(32, 'Finish', 0.06, 4, 2, 30.06, 'A1', '2024-10-12', 5, 21, 7),
	(33, 'Eliminasi', 0.05, 3, 2, 25.05, 'A1', '2024-10-12', 5, 21, 7);

-- Dumping structure for table perkin.peserta
CREATE TABLE IF NOT EXISTS `peserta` (
  `no_peserta` int NOT NULL AUTO_INCREMENT,
  `nama_anjing` varchar(100) COLLATE utf8mb4_general_ci NOT NULL,
  `nama_pemilik` varchar(100) COLLATE utf8mb4_general_ci NOT NULL,
  `handler` varchar(100) COLLATE utf8mb4_general_ci DEFAULT NULL,
  `size` varchar(50) COLLATE utf8mb4_general_ci DEFAULT NULL,
  `IdKategori` int DEFAULT NULL,
  `IdJuri` int DEFAULT NULL,
  PRIMARY KEY (`no_peserta`),
  KEY `FK_nama_anjing_kategori` (`IdKategori`),
  KEY `FK_peserta_juri` (`IdJuri`),
  CONSTRAINT `FK_nama_anjing_kategori` FOREIGN KEY (`IdKategori`) REFERENCES `kategori` (`IdKategori`) ON DELETE CASCADE ON UPDATE CASCADE,
  CONSTRAINT `FK_peserta_juri` FOREIGN KEY (`IdJuri`) REFERENCES `juri` (`IdJuri`) ON DELETE CASCADE ON UPDATE CASCADE
) ENGINE=InnoDB AUTO_INCREMENT=24 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

-- Dumping data for table perkin.peserta: ~4 rows (approximately)
INSERT INTO `peserta` (`no_peserta`, `nama_anjing`, `nama_pemilik`, `handler`, `size`, `IdKategori`, `IdJuri`) VALUES
	(20, 'Dom', 'a', 'MEEEY', 'Medium', 5, 6),
	(21, 'handy', 'Mey', 'MEEEY', 'Large', 5, 7),
	(22, 'Dom', 'a', 'MEEEY', 'Large', 7, 6),
	(23, 'Heyyas', 'Landy', 'Landy', 'Medium', 5, 7);

/*!40103 SET TIME_ZONE=IFNULL(@OLD_TIME_ZONE, 'system') */;
/*!40101 SET SQL_MODE=IFNULL(@OLD_SQL_MODE, '') */;
/*!40014 SET FOREIGN_KEY_CHECKS=IFNULL(@OLD_FOREIGN_KEY_CHECKS, 1) */;
/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40111 SET SQL_NOTES=IFNULL(@OLD_SQL_NOTES, 1) */;
