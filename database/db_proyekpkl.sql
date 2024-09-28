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

-- Dumping structure for table db_proyekpkl.tbl_dosen
CREATE TABLE IF NOT EXISTS `tbl_dosen` (
  `nidn` varchar(10) NOT NULL DEFAULT '',
  `nama` varchar(100) DEFAULT NULL,
  `email` varchar(50) DEFAULT NULL,
  `kontak` varchar(15) DEFAULT NULL,
  `status` enum('Y','N') DEFAULT NULL,
  PRIMARY KEY (`nidn`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb3;

-- Dumping data for table db_proyekpkl.tbl_dosen: ~2 rows (approximately)
INSERT INTO `tbl_dosen` (`nidn`, `nama`, `email`, `kontak`, `status`) VALUES
	('0001', 'matien', 'matien@gmail.com', '08616236555', 'N'),
	('0002', 'aan', 'aan@gmail.com', '087762661', 'Y');

-- Dumping structure for table db_proyekpkl.tbl_pengguna
CREATE TABLE IF NOT EXISTS `tbl_pengguna` (
  `NIP` varchar(254) DEFAULT NULL,
  `username` varchar(254) DEFAULT NULL,
  `kata_sandi` varchar(254) DEFAULT NULL,
  `nama` varchar(254) DEFAULT NULL,
  `stat` enum('0','1','2') DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb3;

-- Dumping data for table db_proyekpkl.tbl_pengguna: ~6 rows (approximately)
INSERT INTO `tbl_pengguna` (`NIP`, `username`, `kata_sandi`, `nama`, `stat`) VALUES
	('ADM-0002', 'matien', '40bd001563085fc35165329ea1ff5c5ecbdbbeef', 'Matien', '0'),
	('ADM-0003', 'admin', '40bd001563085fc35165329ea1ff5c5ecbdbbeef', 'admin', '0'),
	('ADM-0001', 'paitem2', '40bd001563085fc35165329ea1ff5c5ecbdbbeef', 'paitem2', '0'),
	('ADM-0004', 'aan', '40bd001563085fc35165329ea1ff5c5ecbdbbeef', 'aan', '0'),
	('0001', '0001', '7a6779700f09e1eafe9ad40e390f3a15b94dfa4b', 'matien', '1'),
	('0002', '0002', 'c5e8754637504e5ebf868efc915ae09cb8ba1c3b', 'aan', '1');

/*!40103 SET TIME_ZONE=IFNULL(@OLD_TIME_ZONE, 'system') */;
/*!40101 SET SQL_MODE=IFNULL(@OLD_SQL_MODE, '') */;
/*!40014 SET FOREIGN_KEY_CHECKS=IFNULL(@OLD_FOREIGN_KEY_CHECKS, 1) */;
/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40111 SET SQL_NOTES=IFNULL(@OLD_SQL_NOTES, 1) */;
