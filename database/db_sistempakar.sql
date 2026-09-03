-- --------------------------------------------------------
-- Host:                         127.0.0.1
-- Versi server:                 8.0.30 - MySQL Community Server - GPL
-- OS Server:                    Win64
-- HeidiSQL Versi:               12.1.0.6537
-- --------------------------------------------------------

/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET NAMES utf8 */;
/*!50503 SET NAMES utf8mb4 */;
/*!40103 SET @OLD_TIME_ZONE=@@TIME_ZONE */;
/*!40103 SET TIME_ZONE='+00:00' */;
/*!40014 SET @OLD_FOREIGN_KEY_CHECKS=@@FOREIGN_KEY_CHECKS, FOREIGN_KEY_CHECKS=0 */;
/*!40101 SET @OLD_SQL_MODE=@@SQL_MODE, SQL_MODE='NO_AUTO_VALUE_ON_ZERO' */;
/*!40111 SET @OLD_SQL_NOTES=@@SQL_NOTES, SQL_NOTES=0 */;


-- Membuang struktur basisdata untuk db_sistempakar
CREATE DATABASE IF NOT EXISTS `db_sistempakar` /*!40100 DEFAULT CHARACTER SET utf8mb4 COLLATE utf8mb4_0900_ai_ci */ /*!80016 DEFAULT ENCRYPTION='N' */;
USE `db_sistempakar`;

-- membuang struktur untuk table db_sistempakar.admin
CREATE TABLE IF NOT EXISTS `admin` (
  `id_admin` int NOT NULL AUTO_INCREMENT,
  `username` varchar(50) DEFAULT NULL,
  `password` varchar(255) DEFAULT NULL,
  PRIMARY KEY (`id_admin`)
) ENGINE=InnoDB AUTO_INCREMENT=2 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;

-- Membuang data untuk tabel db_sistempakar.admin: ~0 rows (lebih kurang)
INSERT INTO `admin` (`id_admin`, `username`, `password`) VALUES
	(1, 'admin', '827ccb0eea8a706c4c34a16891f84e7b');

-- membuang struktur untuk table db_sistempakar.gejala
CREATE TABLE IF NOT EXISTS `gejala` (
  `id_gejala` int NOT NULL AUTO_INCREMENT,
  `kode_gejala` varchar(10) DEFAULT NULL,
  `pertanyaan` text,
  `bobot` int DEFAULT NULL,
  PRIMARY KEY (`id_gejala`)
) ENGINE=InnoDB AUTO_INCREMENT=16 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;

-- Membuang data untuk tabel db_sistempakar.gejala: ~15 rows (lebih kurang)
INSERT INTO `gejala` (`id_gejala`, `kode_gejala`, `pertanyaan`, `bobot`) VALUES
	(1, 'G01', 'Apakah teman di sekolah sering mengejek atau mengolok kamu dengan kata-kata kasar?', 5),
	(2, 'G02', 'Apakah kamu sering merasa takut atau cemas saat akan hadir ke sekolah karena perlakuan teman?', 4),
	(3, 'G03', 'Pernahkah kamu dipukul, didorong, atau dicubit oleh teman di sekolah?', 4),
	(4, 'G04', 'Pernahkah rumor atau gosip tentangmu disebarkan oleh teman di sekolah atau media sosial?', 4),
	(5, 'G05', 'Seberapa mudah kamu menceritakan kejadian bullying ke guru atau orang tua?', 3),
	(6, 'G06', 'Seberapa sering kamu merasa sedih atau kehilangan semangat setelah interaksi di sekolah?', 5),
	(7, 'G07', 'Seberapa sering kamu merasa sulit tidur atau gelisah setelah kejadian di sekolah?', 4),
	(8, 'G08', 'Apakah kamu merasa diabaikan atau dihindari oleh teman-temanmu?', 4),
	(9, 'G09', 'Apakah kamu merasa kurang percaya diri untuk berbicara di depan teman?', 3),
	(10, 'G10', 'Seberapa sering kamu menggunakan media sosial untuk menghindari interaksi langsung?', 3),
	(11, 'G11', 'Seberapa sering kamu merasa stres karena tugas sekolah dan tekanan teman sebaya?', 4),
	(12, 'G12', 'Apakah kamu merasa tidak berharga atau tidak diterima oleh lingkungan sekolahmu?', 5),
	(13, 'G13', 'Apakah kamu merasa takut disindir atau dikomentari saat di media sosial?', 4),
	(14, 'G14', 'Seberapa sering kamu mengalami gangguan konsentrasi di kelas karena pikiran negatif?', 3),
	(15, 'G15', 'Apakah kamu memiliki seseorang yang bisa kamu ajak bicara ketika sedih atau stres?', 2);

-- membuang struktur untuk table db_sistempakar.hasil_konsultasi
CREATE TABLE IF NOT EXISTS `hasil_konsultasi` (
  `id_hasil` int NOT NULL AUTO_INCREMENT,
  `id_user` int DEFAULT NULL,
  `id_penyakit` int DEFAULT NULL,
  `nilai_total` float DEFAULT NULL,
  `tanggal` timestamp NULL DEFAULT CURRENT_TIMESTAMP,
  PRIMARY KEY (`id_hasil`),
  KEY `id_user` (`id_user`),
  KEY `id_penyakit` (`id_penyakit`),
  CONSTRAINT `hasil_konsultasi_ibfk_1` FOREIGN KEY (`id_user`) REFERENCES `user` (`id_user`),
  CONSTRAINT `hasil_konsultasi_ibfk_2` FOREIGN KEY (`id_penyakit`) REFERENCES `penyakit` (`id_penyakit`)
) ENGINE=InnoDB AUTO_INCREMENT=3 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;

-- Membuang data untuk tabel db_sistempakar.hasil_konsultasi: ~1 rows (lebih kurang)
INSERT INTO `hasil_konsultasi` (`id_hasil`, `id_user`, `id_penyakit`, `nilai_total`, `tanggal`) VALUES
	(2, 7, 1, 5, '2025-10-15 04:15:00');

-- membuang struktur untuk table db_sistempakar.penyakit
CREATE TABLE IF NOT EXISTS `penyakit` (
  `id_penyakit` int NOT NULL AUTO_INCREMENT,
  `nama_penyakit` varchar(100) DEFAULT NULL,
  `deskripsi` text,
  `saran` text,
  PRIMARY KEY (`id_penyakit`)
) ENGINE=InnoDB AUTO_INCREMENT=5 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;

-- Membuang data untuk tabel db_sistempakar.penyakit: ~4 rows (lebih kurang)
INSERT INTO `penyakit` (`id_penyakit`, `nama_penyakit`, `deskripsi`, `saran`) VALUES
	(1, 'Normal', 'Kondisi mental stabil; tidak menunjukkan tanda stres atau kecemasan akibat bullying.', 'Pertahankan keseimbangan emosional, tetap berinteraksi positif dengan teman dan guru.'),
	(2, 'Stres Ringan', 'Ada tanda stres akibat tekanan sosial atau ejekan ringan, namun masih bisa dikendalikan.', 'Istirahat cukup, lakukan kegiatan positif seperti olahraga dan journaling.'),
	(3, 'Cemas', 'Mengalami kecemasan sosial, takut ke sekolah, atau merasa terancam oleh lingkungan.', 'Ceritakan masalahmu ke guru BK atau orang tua, dan batasi interaksi dengan sumber tekanan.'),
	(4, 'Depresi Ringan', 'Tanda kehilangan motivasi, sedih berkepanjangan, dan menarik diri dari pergaulan.', 'Segera konsultasi ke psikolog sekolah, lakukan kegiatan relaksasi, dan perkuat dukungan sosial.');

-- membuang struktur untuk table db_sistempakar.rule
CREATE TABLE IF NOT EXISTS `rule` (
  `id_rule` int NOT NULL AUTO_INCREMENT,
  `id_penyakit` int DEFAULT NULL,
  `id_gejala` int DEFAULT NULL,
  PRIMARY KEY (`id_rule`),
  KEY `id_penyakit` (`id_penyakit`),
  KEY `id_gejala` (`id_gejala`),
  CONSTRAINT `rule_ibfk_1` FOREIGN KEY (`id_penyakit`) REFERENCES `penyakit` (`id_penyakit`),
  CONSTRAINT `rule_ibfk_2` FOREIGN KEY (`id_gejala`) REFERENCES `gejala` (`id_gejala`)
) ENGINE=InnoDB AUTO_INCREMENT=46 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;

-- Membuang data untuk tabel db_sistempakar.rule: ~15 rows (lebih kurang)
INSERT INTO `rule` (`id_rule`, `id_penyakit`, `id_gejala`) VALUES
	(31, 1, 5),
	(32, 1, 15),
	(33, 2, 2),
	(34, 2, 6),
	(35, 2, 11),
	(36, 3, 1),
	(37, 3, 3),
	(38, 3, 7),
	(39, 3, 8),
	(40, 3, 13),
	(41, 4, 4),
	(42, 4, 6),
	(43, 4, 9),
	(44, 4, 12),
	(45, 4, 14);

-- membuang struktur untuk table db_sistempakar.user
CREATE TABLE IF NOT EXISTS `user` (
  `id_user` int NOT NULL AUTO_INCREMENT,
  `nama` varchar(100) DEFAULT NULL,
  `kelas` varchar(50) DEFAULT NULL,
  `tanggal` timestamp NULL DEFAULT CURRENT_TIMESTAMP,
  PRIMARY KEY (`id_user`)
) ENGINE=InnoDB AUTO_INCREMENT=8 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;

-- Membuang data untuk tabel db_sistempakar.user: ~0 rows (lebih kurang)
INSERT INTO `user` (`id_user`, `nama`, `kelas`, `tanggal`) VALUES
	(1, 'hhh', '6', '2025-10-15 04:09:16'),
	(2, 'hhh', '6', '2025-10-15 04:11:10'),
	(3, 'arin', '12', '2025-10-15 04:11:41'),
	(4, 'arin', '12', '2025-10-15 04:12:29'),
	(5, 'arin', '12', '2025-10-15 04:12:36'),
	(6, 'arin', '12', '2025-10-15 04:13:35'),
	(7, 'arin', '12', '2025-10-15 04:15:00');

/*!40103 SET TIME_ZONE=IFNULL(@OLD_TIME_ZONE, 'system') */;
/*!40101 SET SQL_MODE=IFNULL(@OLD_SQL_MODE, '') */;
/*!40014 SET FOREIGN_KEY_CHECKS=IFNULL(@OLD_FOREIGN_KEY_CHECKS, 1) */;
/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40111 SET SQL_NOTES=IFNULL(@OLD_SQL_NOTES, 1) */;
