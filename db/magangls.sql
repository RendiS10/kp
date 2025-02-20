-- phpMyAdmin SQL Dump
-- version 5.2.0
-- https://www.phpmyadmin.net/
--
-- Host: localhost:3306
-- Generation Time: Feb 20, 2025 at 10:24 AM
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
-- Table structure for table `berjuang`
--

CREATE TABLE `berjuang` (
  `id` int NOT NULL,
  `nama` varchar(255) NOT NULL,
  `profesi` varchar(255) NOT NULL,
  `tempat` varchar(255) NOT NULL,
  `gambar` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;

--
-- Dumping data for table `berjuang`
--

INSERT INTO `berjuang` (`id`, `nama`, `profesi`, `tempat`, `gambar`) VALUES
(1, 'Muhammad Fachri Afif', 'NDN-RG Research Assistant', 'Telkom University', 'https://magang.luarsekolah.com/upload/lulusan_bb/46ff3084892de74b27d0ae3308d1ae04.jpeg'),
(2, 'Rafi Ahmad Khairan', 'Web Developer', 'Kementerian Hukum dan HAM RI', '../../public/assets/images/orang/image 11.png'),
(3, 'Laurensius Patrick Steve', 'Social Media Manager', 'PT. SUMBER REJEKI BERKAT ABADI', 'https://magang.luarsekolah.com/upload/lulusan_bb/9ade67141af985f7fd84dd32c5a67f66.png'),
(4, 'Tengku Chairu Abda', 'Front-End Engineer', 'PT. Summit Global Teknologi', 'https://magang.luarsekolah.com/upload/lulusan_bb/6671da690a622669737af6bb3685618c.jpeg');

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

-- --------------------------------------------------------

--
-- Table structure for table `mereka_berhasil`
--

CREATE TABLE `mereka_berhasil` (
  `id` int NOT NULL,
  `nama` varchar(255) NOT NULL,
  `profesi` varchar(255) NOT NULL,
  `katakata` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_0900_ai_ci NOT NULL,
  `gambar` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;

--
-- Dumping data for table `mereka_berhasil`
--

INSERT INTO `mereka_berhasil` (`id`, `nama`, `profesi`, `katakata`, `gambar`) VALUES
(1, 'Wafiq Nur Agniati', 'Graphic Design', '“Program Luarsekolah membuat skill design graphic aku lebih terasah dan juga membuat aku lebih bisa mengeskpresikan kreativitas dengan bebas.”', '../../public/assets/images/orang/1 1.png'),
(2, 'Eka Rosalina Fitria', 'Digital Marketing', '“Program Luarsekolah membuat skill design graphic aku lebih terasah dan juga membuat aku lebih bisa mengeskpresikan kreativitas dengan bebas.”', '../../public/assets/images/orang/Salinan dari Profile Overview User Persona User Persona Presentation (1) 1.png'),
(3, 'Gunawan', 'Web Developer', '“Program Luarsekolah membuat skill design graphic aku lebih terasah dan juga membuat aku lebih bisa mengeskpresikan kreativitas dengan bebas.”', '../../public/assets/images/orang/Salinan dari Profile Overview User Persona User Persona Presentation 1.png');

-- --------------------------------------------------------

--
-- Table structure for table `program`
--

CREATE TABLE `program` (
  `id` int NOT NULL,
  `nama_program` varchar(255) NOT NULL,
  `deskripsi` text NOT NULL,
  `gambar` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;

--
-- Dumping data for table `program`
--

INSERT INTO `program` (`id`, `nama_program`, `deskripsi`, `gambar`) VALUES
(1, 'Project Based Internship (PBIs)', 'Program magang berdurasi maksimal 3 bulan. Cocok untukmu untuk mendapatkan basic experiences atau portofolio.', 'public/assets/images/orang/Ikon ProgramB1.png'),
(2, 'Job Connector', 'Program berdurasi 6 bulan atau lebih. Cocok untukmu agar lebih siap secara profesional untuk bisa mendapatkan pekerjaan.', 'public/assets/images/orang/Hero ProgramB2.png');

-- --------------------------------------------------------

--
-- Table structure for table `project`
--

CREATE TABLE `project` (
  `id` int NOT NULL,
  `nama_project` varchar(255) NOT NULL,
  `deskripsi` text NOT NULL,
  `gambar` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;

--
-- Dumping data for table `project`
--

INSERT INTO `project` (`id`, `nama_project`, `deskripsi`, `gambar`) VALUES
(1, 'Prakerja', 'Program Pelatihan Prakerja bertujuan mengembangkan kompetensi kerja untuk pencari kerja, pekerja yang terkena PHK, dan yang membutuhkan peningkatan keterampilan.', 'public/assets/images/orang/image prakerja.png'),
(2, 'Belajar Bekerja', 'Program Belajar Bekerja membekali keterampilan digital dan AI, dengan mentor praktisi industri, untuk meningkatkan kesiapan dan daya saing profesional.', 'public/assets/images/orang/image belajar bekerja.png'),
(3, 'Indonesian Skills Week', 'Indonesia Skills Week adalah event dua bulanan dari Prakerja yang terbuka untuk semua golongan, termasuk alumni Prakerja.', 'public/assets/images/orang/image Indonesian Skills Week.png');

-- --------------------------------------------------------

--
-- Table structure for table `rekomendasi_program`
--

CREATE TABLE `rekomendasi_program` (
  `id` int NOT NULL,
  `judul` varchar(255) NOT NULL,
  `deskripsi` text NOT NULL,
  `gambar` varchar(255) NOT NULL,
  `instructor` varchar(255) NOT NULL,
  `harga` varchar(50) NOT NULL,
  `selengkapnya` varchar(250) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;

--
-- Dumping data for table `rekomendasi_program`
--

INSERT INTO `rekomendasi_program` (`id`, `judul`, `deskripsi`, `gambar`, `instructor`, `harga`, `selengkapnya`) VALUES
(1, 'Optimalisasi AI untuk Editing Video di CapCut', 'Program ini bertujuan untuk memanfaatkan teknologi AI di CapCut guna meningkatkan efisiensi dan kualitas editing video secara praktis dan inovatif.', 'public/assets/images/orang/Hero ProgramC1.png', 'M. Syauqi Ridho, Febrian Budi Satia', 'Rp 1.500.000', 'https://luarsekolah.com/kelas/optimalisasi-ai-untuk-editing-video-di-capcut'),
(2, 'Content Writer', 'Program ini membantu kamu belajar menulis konten yang kreatif, menarik, dan cocok banget buat dunia digital marketing.', 'public/assets/images/orang/Hero ProgramC2.png', 'Mohamad Ryan Saputra', 'Rp 645.000', ''),
(3, 'Penggunaan ChatGPT untuk Ide Konten Pemasaran', 'Program ini ngajarin cara pakai ChatGPT buat dapetin ide-ide fresh dan kreatif untuk konten pemasaran.', 'public/assets/images/orang/Hero ProgramC3.png', 'Denny Sitompul', 'Rp 1.500.000', ''),
(4, 'Menerapkan Orientasi Pelayanan bagi Contact Center', 'Program ini mengajarkan petugas contact center cara memberikan pelayanan terbaik yang fokus pada kebutuhan dan kepuasan pelanggan.', 'public/assets/images/orang/Hero ProgramC4.png', 'Afif Lutfi', 'Rp 1.000.00', '');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `berjuang`
--
ALTER TABLE `berjuang`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `login_admin`
--
ALTER TABLE `login_admin`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `mereka_berhasil`
--
ALTER TABLE `mereka_berhasil`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `program`
--
ALTER TABLE `program`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `project`
--
ALTER TABLE `project`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `rekomendasi_program`
--
ALTER TABLE `rekomendasi_program`
  ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `berjuang`
--
ALTER TABLE `berjuang`
  MODIFY `id` int NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- AUTO_INCREMENT for table `login_admin`
--
ALTER TABLE `login_admin`
  MODIFY `id` int NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT for table `mereka_berhasil`
--
ALTER TABLE `mereka_berhasil`
  MODIFY `id` int NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT for table `program`
--
ALTER TABLE `program`
  MODIFY `id` int NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT for table `project`
--
ALTER TABLE `project`
  MODIFY `id` int NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- AUTO_INCREMENT for table `rekomendasi_program`
--
ALTER TABLE `rekomendasi_program`
  MODIFY `id` int NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=8;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
