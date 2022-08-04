-- phpMyAdmin SQL Dump
-- version 5.1.0
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Jul 08, 2022 at 11:29 PM
-- Server version: 10.4.19-MariaDB
-- PHP Version: 8.0.6

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `db_crud`
--

-- --------------------------------------------------------

--
-- Table structure for table `akun`
--

CREATE TABLE `akun` (
  `id_akun` int(11) NOT NULL,
  `nama` varchar(100) NOT NULL,
  `username` varchar(100) NOT NULL,
  `email` varchar(50) NOT NULL,
  `password` varchar(100) NOT NULL,
  `level` varchar(2) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `akun`
--

INSERT INTO `akun` (`id_akun`, `nama`, `username`, `email`, `password`, `level`) VALUES
(11, 'admin', 'admin', 'admin@gmail.com', '$2y$10$./ymCA5kf2IR9oSP9pz4AeDilwT9enwEe7JOFyvUVhhKP7ThD2RE2', '1'),
(12, 'Operator Barang', 'OPB', 'opb@gmail.com', '$2y$10$KaSiF2HCAo7mQCbLqbIUjuOshLyB7ihRK6b7mdlCJsTLEvLKf1kYq', '2'),
(13, 'Mahasiswa', 'OPM', 'opm@gmail.com', '$2y$10$M7QmsxQaH8Ggrbz5HvWg.uxxvblRXF4qKznYPvLO5svLU5FF3FV3S', '3');

-- --------------------------------------------------------

--
-- Table structure for table `tb_barang`
--

CREATE TABLE `tb_barang` (
  `id_barang` int(12) NOT NULL,
  `nama` varchar(50) NOT NULL,
  `jumlah` varchar(50) NOT NULL,
  `harga` varchar(50) NOT NULL,
  `tanggal` timestamp NOT NULL DEFAULT current_timestamp() ON UPDATE current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `tb_barang`
--

INSERT INTO `tb_barang` (`id_barang`, `nama`, `jumlah`, `harga`, `tanggal`) VALUES
(1, 'Beras merah', '25', '100000', '2022-06-14 02:37:44'),
(3, 'headgear', '10', '19000', '2022-06-09 23:18:36'),
(7, 'ring', '2', '900000', '2022-06-13 09:00:46'),
(8, 'grit', '5', '10000', '2022-06-13 09:01:43'),
(10, 'Pagupon', '5', '50000', '2022-06-14 02:09:10'),
(13, 'Kacang ijo', '20', '15000', '2022-06-14 02:38:06'),
(14, 'Kacanag Tanah', '5', '9000', '2022-06-14 02:38:29'),
(15, 'Telur ayam', '90', '1000', '2022-06-14 03:33:44');

-- --------------------------------------------------------

--
-- Table structure for table `tb_mhs`
--

CREATE TABLE `tb_mhs` (
  `id_mhs` int(11) NOT NULL,
  `nama` varchar(100) NOT NULL,
  `prodi` varchar(100) NOT NULL,
  `jk` varchar(10) NOT NULL,
  `no_tlp` varchar(30) NOT NULL,
  `email` varchar(30) NOT NULL,
  `foto` varchar(100) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `tb_mhs`
--

INSERT INTO `tb_mhs` (`id_mhs`, `nama`, `prodi`, `jk`, `no_tlp`, `email`, `foto`) VALUES
(6, 'Putra', 'Informatika', 'Perempuan', '089786', 'ora@gmail.com', '62aa17a9ba7aa.jpg'),
(8, 'johan', 'Managemen', 'Laki-laki', '0834937922', 'hsau@gmail.com', '62b964a4c1edb.png'),
(9, 'Putri aulia', 'Managemen', 'Perempuan', '08297386783', 'putriesca@gmail.com', '62b96dae04540.jpg'),
(15, 'Nova Dwiputri', 'Pyscology', 'Perempuan', '081921732', 'novap@gmail.com', '62b9c24b2f763.jpg'),
(17, 'Yoana', 'Pyscology', 'Perempuan', '08293782332', 'yoanarw@gmail.com', '62ba5f8450788.jpg'),
(18, 'Siti Aprillianti', 'Informatika', 'Perempuan', '0938923472', 'aprilliantisiti@gmail.com', '62ba5fc072c40.jpg'),
(19, 'Yoga', 'Managemen', 'Laki-laki', '08493748342', 'yogawy@gmail.com', '62ba5fed70cf3.jpg'),
(20, 'ariel', 'Informatika', 'Laki-laki', '0983984934', 'ariel@gmail.com', '62ba604f2e8aa.jpg'),
(21, 'poik', 'Informatika', 'Laki-laki', '08493843873', 'poikugly@gmail.com', '62ba607d524e4.jpg'),
(23, 'Riana', 'Managemen', 'Perempuan', '08937473839', 'raiana@gmail.com', '62ba6472a6e71.jpg'),
(24, 'amat sobirin', 'Informatika', 'Perempuan', '08947564843', 'amatsobirin@gmail.com', '62ba64b0eb1d6.png'),
(25, 'Junaedi', 'Pyscology', 'Laki-laki', '08497383648', 'rast@gmail.com', '62bfe87e6c731.jpg'),
(26, 'Joni', 'Informatika', 'Laki-laki', '0898937434', 'jonideeqq@gmail.com', '62c3fc4ae2df4.jpg'),
(27, 'Eka', 'Informatika', 'Laki-laki', '098989789', 'rahmat@gmail.com', '62c3fd56cf945.jpg'),
(28, 'cek', 'Informatika', 'Laki-laki', '05960890568', 'cek@gmail.com', '62c402d8b797f.jpg'),
(29, 'asdad', 'Managemen', 'Perempuan', '244353', 'sdbshda@gmail.com', '62c4032d5e173.jpg'),
(30, 'juned', 'Informatika', 'Laki-laki', '89897877', 'juned@gmail.com', '62c852d054827.jpg');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `akun`
--
ALTER TABLE `akun`
  ADD PRIMARY KEY (`id_akun`),
  ADD UNIQUE KEY `email_unique` (`email`);

--
-- Indexes for table `tb_barang`
--
ALTER TABLE `tb_barang`
  ADD PRIMARY KEY (`id_barang`);

--
-- Indexes for table `tb_mhs`
--
ALTER TABLE `tb_mhs`
  ADD PRIMARY KEY (`id_mhs`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `akun`
--
ALTER TABLE `akun`
  MODIFY `id_akun` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=14;

--
-- AUTO_INCREMENT for table `tb_barang`
--
ALTER TABLE `tb_barang`
  MODIFY `id_barang` int(12) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=17;

--
-- AUTO_INCREMENT for table `tb_mhs`
--
ALTER TABLE `tb_mhs`
  MODIFY `id_mhs` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=31;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
