-- phpMyAdmin SQL Dump
-- version 5.2.0
-- https://www.phpmyadmin.net/
--
-- Host: localhost:3306
-- Generation Time: Feb 10, 2025 at 05:50 AM
-- Server version: 8.0.30
-- PHP Version: 8.3.15

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `magangls`
--

-- --------------------------------------------------------

--
-- Table structure for table `login_admin`
--

CREATE TABLE `login_admin` (
  `id` int NOT NULL,
  `username` varchar(12) NOT NULL,
  `password` varchar(12) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;

--
-- Dumping data for table `login_admin`
--

INSERT INTO `login_admin` (`id`, `username`, `password`) VALUES
(1, 'admin', 'admin');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `login_admin`
--
ALTER TABLE `login_admin`
  ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `login_admin`
--
ALTER TABLE `login_admin`
  MODIFY `id` int NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;

-- Table structure for table `program`
CREATE TABLE `program` (
  `id` int NOT NULL AUTO_INCREMENT,
  `nama_program` varchar(255) NOT NULL,
  `deskripsi` text NOT NULL,
  `gambar` varchar(255) NOT NULL, -- Kolom untuk menyimpan URL gambar
  PRIMARY KEY (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;

-- Menambahkan data awal ke tabel `program`
INSERT INTO `program` (`id`, `nama_program`, `deskripsi`, `gambar`) VALUES
(1, 'Project Based Internship (PBI)', 'Program magang berdurasi maksimal 3 bulan. Cocok untukmu untuk mendapatkan basic experiences atau portofolio.', 'public/assets/images/orang/Ikon ProgramB1.png'),
(2, 'Job Connector', 'Program berdurasi 6 bulan atau lebih. Cocok untukmu agar lebih siap secara profesional untuk bisa mendapatkan pekerjaan.', 'public/assets/images/orang/Hero ProgramB2.png');

COMMIT;

-- Table structure for table `project`
CREATE TABLE `project` (
  `id` int NOT NULL AUTO_INCREMENT,
  `nama_project` varchar(255) NOT NULL,
  `deskripsi` text NOT NULL,
  `gambar` varchar(255) NOT NULL, -- Kolom untuk menyimpan URL gambar
  PRIMARY KEY (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;

-- Menambahkan data awal ke tabel `project`
INSERT INTO `project` (`nama_project`, `deskripsi`, `gambar`) VALUES
('Prakerja', 'Program Pelatihan Prakerja bertujuan mengembangkan kompetensi kerja untuk pencari kerja, pekerja yang terkena PHK, dan yang membutuhkan peningkatan keterampilan.', 'public/assets/images/orang/image prakerja.png'),
('Belajar Bekerja', 'Program Belajar Bekerja membekali keterampilan digital dan AI, dengan mentor praktisi industri, untuk meningkatkan kesiapan dan daya saing profesional.', 'public/assets/images/orang/image belajar bekerja.png'),
('Indonesian Skills Week', 'Indonesia Skills Week adalah event dua bulanan dari Prakerja yang terbuka untuk semua golongan, termasuk alumni Prakerja.', 'public/assets/images/orang/image Indonesian Skills Week.png');

COMMIT;

-- Table structure for table `rekomendasi_program`
CREATE TABLE `rekomendasi_program` (
  `id` int NOT NULL AUTO_INCREMENT,
  `judul` varchar(255) NOT NULL,
  `deskripsi` text NOT NULL,
  `gambar` varchar(255) NOT NULL,
  `instructor` varchar(255) NOT NULL,
  `harga` varchar(50) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;

-- Menambahkan data awal ke tabel `rekomendasi_program`
INSERT INTO `rekomendasi_program` (`judul`, `deskripsi`, `gambar`, `instructor`, `harga`) VALUES
('Optimalisasi AI untuk Editing Video di CapCut', 'Program ini bertujuan untuk memanfaatkan teknologi AI di CapCut guna meningkatkan efisiensi dan kualitas editing video secara praktis dan inovatif.', 'public/assets/images/orang/Hero ProgramC1.png', 'M. Syauqi Ridho, Febrian Budi Satia', 'Rp 1.500.000'),
('Content Writer', 'Program ini membantu kamu belajar menulis konten yang kreatif, menarik, dan cocok banget buat dunia digital marketing.', 'public/assets/images/orang/Hero ProgramC2.png', 'Mohamad Ryan Saputra', 'Rp 645.000'),
('Penggunaan ChatGPT untuk Ide Konten Pemasaran', 'Program ini ngajarin cara pakai ChatGPT buat dapetin ide-ide fresh dan kreatif untuk konten pemasaran.', 'public/assets/images/orang/Hero ProgramC3.png', 'Denny Sitompul', 'Rp 1.500.000'),
('Menerapkan Orientasi Pelayanan bagi Contact Center', 'Program ini mengajarkan petugas contact center cara memberikan pelayanan terbaik yang fokus pada kebutuhan dan kepuasan pelanggan.', 'public/assets/images/orang/Hero ProgramC4.png', 'Afif Lutfi', 'Rp 1.000.000');

COMMIT;
