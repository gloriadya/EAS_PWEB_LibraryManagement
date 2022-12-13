-- phpMyAdmin SQL Dump
-- version 5.0.4
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Dec 24, 2021 at 03:59 PM
-- Server version: 10.4.17-MariaDB
-- PHP Version: 7.4.21

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `aplikasi_sekolah`
--

-- --------------------------------------------------------

--
-- Table structure for table `admin`
--

CREATE TABLE `admin` (
  `id` int(11) NOT NULL,
  `username` varchar(255) NOT NULL,
  `password` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `admin`
--

INSERT INTO `admin` (`id`, `username`, `password`) VALUES
(3, 'admin', '21232f297a57a5a743894a0e4a801fc3');

-- --------------------------------------------------------

--
-- Table structure for table `guru`
--

CREATE TABLE `guru` (
  `id_guru` int(11) NOT NULL,
  `fotodiri` varchar(255) NOT NULL,
  `nama` varchar(255) NOT NULL,
  `mata_pelajaran` varchar(100) NOT NULL,
  `jenis_kelamin` varchar(15) NOT NULL,
  `nip` varchar(20) NOT NULL,
  `alamat` varchar(100) NOT NULL,
  `nomor_hp` varchar(15) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `guru`
--

INSERT INTO `guru` (`id_guru`, `fotodiri`, `nama`, `mata_pelajaran`, `jenis_kelamin`, `nip`, `alamat`, `nomor_hp`) VALUES
(1, '2412202115334394495832_p0_master1200.jpg', 'Vladilena Milize', 'Pendidikan Jasmani, Olahraga, dan Kesehatan', 'Perempuan', '1298319839189', 'San Magnolia', '081923891831'),
(2, '24122021153805yC7nNi.png', 'Kharis', 'Biologi', 'Laki-laki', '39183919831', 'Soloyolo', '081293819831'),
(3, '24122021154056399px-Shun.png', 'Sunohara Shun', 'Bahasa Inggris', 'Laki-laki', '9183912839189', 'London', '081319211211231');

-- --------------------------------------------------------

--
-- Table structure for table `siswa`
--

CREATE TABLE `siswa` (
  `id_siswa` int(11) NOT NULL,
  `fotodiri` varchar(255) NOT NULL,
  `nama` varchar(255) NOT NULL,
  `kelas` varchar(15) NOT NULL,
  `jenis_kelamin` varchar(15) NOT NULL,
  `nomor_induk` varchar(10) NOT NULL,
  `alamat` varchar(100) NOT NULL,
  `nomor_hp` varchar(15) NOT NULL,
  `agama` varchar(30) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `siswa`
--

INSERT INTO `siswa` (`id_siswa`, `fotodiri`, `nama`, `kelas`, `jenis_kelamin`, `nomor_induk`, `alamat`, `nomor_hp`, `agama`) VALUES
(2, '24122021152443E9BBUS3VIAEFSlP.jpg', 'Thomas Felix Brilliant', 'XII', 'Laki-laki', '16969', 'Surabaya, Jawa Timur', '08121608913123', 'Hindu'),
(3, '2412202114091994910317_p0_master1200.jpg', 'Roxy Migurdia', 'XII', 'Perempuan', '10239', 'Jepang', '08103123131231', 'Hindu'),
(6, '2412202115373687606985_p0_master1200.jpg', 'Sunaōkami Shiroko', 'X', 'Perempuan', '193819', 'Shibuya', '089891298913', 'Islam'),
(7, '24122021154210230391920_366645041504994_7660330818399265609_n.png', 'Awikwok', 'XII', 'Laki-laki', '138138', 'Bojonegoro', '085875342421', 'Kong Hu Cu'),
(8, '241220211542501058939.png', 'Shin Tae Yong', 'XII', 'Laki-laki', '123189', 'Korea', '0892389183', 'Kristen Protestan'),
(9, '24122021154332Fate Grand Order - Zettai Majuu Sensen Babylonia Episode 3.mkv_snapshot_13.49.245.jpg', 'Piki', 'XI', 'Perempuan', '1111111', 'Pacul', '0819319319831', 'Islam');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `admin`
--
ALTER TABLE `admin`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `guru`
--
ALTER TABLE `guru`
  ADD PRIMARY KEY (`id_guru`);

--
-- Indexes for table `siswa`
--
ALTER TABLE `siswa`
  ADD PRIMARY KEY (`id_siswa`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `admin`
--
ALTER TABLE `admin`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT for table `guru`
--
ALTER TABLE `guru`
  MODIFY `id_guru` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT for table `siswa`
--
ALTER TABLE `siswa`
  MODIFY `id_siswa` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=10;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
