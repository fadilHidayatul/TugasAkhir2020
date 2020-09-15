-- phpMyAdmin SQL Dump
-- version 4.8.2
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Sep 15, 2020 at 04:00 PM
-- Server version: 10.1.34-MariaDB
-- PHP Version: 7.2.7

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET AUTOCOMMIT = 0;
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `db_ujian`
--

-- --------------------------------------------------------

--
-- Table structure for table `tb_admin`
--

CREATE TABLE `tb_admin` (
  `id_admin` int(11) NOT NULL,
  `username` varchar(25) NOT NULL,
  `password` varchar(30) NOT NULL,
  `token` text NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `tb_admin`
--

INSERT INTO `tb_admin` (`id_admin`, `username`, `password`, `token`) VALUES
(1, 'fadil', 'fadil123', '');

-- --------------------------------------------------------

--
-- Table structure for table `tb_jawab`
--

CREATE TABLE `tb_jawab` (
  `id_jawab` int(11) NOT NULL,
  `id_soal` int(11) NOT NULL,
  `jawab` tinyint(1) NOT NULL,
  `txt_jawab` varchar(256) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `tb_jawab`
--

INSERT INTO `tb_jawab` (`id_jawab`, `id_soal`, `jawab`, `txt_jawab`) VALUES
(1, 10, 1, 'jawab1'),
(2, 10, 0, 'jawab2'),
(3, 9, 1, 'jawab a'),
(4, 9, 0, 'jawab b');

-- --------------------------------------------------------

--
-- Table structure for table `tb_matpel`
--

CREATE TABLE `tb_matpel` (
  `id_matpel` int(11) NOT NULL,
  `matpel` varchar(50) NOT NULL,
  `waktu_ujian` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `tb_matpel`
--

INSERT INTO `tb_matpel` (`id_matpel`, `matpel`, `waktu_ujian`) VALUES
(1, 'bahasa indonesia', 90),
(2, 'bahasa inggris', 60),
(3, 'matematika', 75),
(4, 'ipa', 60);

-- --------------------------------------------------------

--
-- Table structure for table `tb_nilai`
--

CREATE TABLE `tb_nilai` (
  `id_nilai` int(11) NOT NULL,
  `id_user` int(11) NOT NULL,
  `kelas` int(11) NOT NULL,
  `id_matpel` int(11) NOT NULL,
  `nilai` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `tb_nilai`
--

INSERT INTO `tb_nilai` (`id_nilai`, `id_user`, `kelas`, `id_matpel`, `nilai`) VALUES
(8, 26, 4, 1, 10),
(9, 26, 4, 3, 95),
(10, 27, 4, 1, 85),
(12, 26, 4, 4, 90),
(13, 38, 1, 1, 15),
(14, 38, 1, 2, 70),
(15, 38, 1, 3, 90);

-- --------------------------------------------------------

--
-- Table structure for table `tb_nis`
--

CREATE TABLE `tb_nis` (
  `id_nis` int(11) NOT NULL,
  `kelas` int(11) NOT NULL,
  `nis` varchar(20) NOT NULL,
  `nama_siswa` varchar(50) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `tb_nis`
--

INSERT INTO `tb_nis` (`id_nis`, `kelas`, `nis`, `nama_siswa`) VALUES
(1, 4, '2018', 'Hidayatul'),
(2, 4, '1025', 'Nova'),
(5, 1, '2020', 'Sayatul Dihasa Andar Rinjani'),
(21, 2, '2022', 'lili'),
(22, 5, '5055', 'Ema'),
(23, 4, '1825', 'Cluster Bennington'),
(24, 5, '7045', 'Allisa'),
(25, 3, '7736', 'Farhanji');

-- --------------------------------------------------------

--
-- Table structure for table `tb_soal`
--

CREATE TABLE `tb_soal` (
  `id_soal` int(11) NOT NULL,
  `kelas` int(11) NOT NULL,
  `image_soal` varchar(100) DEFAULT NULL,
  `id_matpel` int(11) NOT NULL,
  `txt_soal` varchar(256) NOT NULL,
  `jawab_a` varchar(50) NOT NULL,
  `jawab_b` varchar(50) NOT NULL,
  `jawab_c` varchar(50) NOT NULL,
  `jawab_d` varchar(50) NOT NULL,
  `kunci` varchar(50) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `tb_soal`
--

INSERT INTO `tb_soal` (`id_soal`, `kelas`, `image_soal`, `id_matpel`, `txt_soal`, `jawab_a`, `jawab_b`, `jawab_c`, `jawab_d`, `kunci`) VALUES
(1, 3, '/ujianTA/soal/img/b.indo/login.png', 1, 'Orang yang mempunyai nilai tertinggi dikelas disebut?', 'Pemenang', 'Juara', 'Champion', 'Pecundang', 'Juara'),
(2, 4, NULL, 1, '3 kali sehari 1 sendok teh diminum setelah makan. \r\nBerdasarkan petunjuk ini, obat yang diminum oleh pasien selama dua hari adalah â€¦', '2 sendok teh', '4 sendok teh', '6 sendok teh', '8 sendok teh', '6 sendok teh'),
(3, 4, '/ujianTA/soal/img/b.ing/obj_bindo.png', 2, 'is for....', ' write', 'talk', 'read', 'sit', 'read'),
(4, 1, NULL, 1, 'sebelum makan kita harus â€¦', 'mandi', 'cuci kaki', 'cuci tangan', 'tidur', 'cuci tangan'),
(5, 4, '/ujianTA/soal/img/b.indo/trotoar.jpg', 1, 'Tempat yang disediakan untuk pejalan kaki disebut â€¦', 'Trotoar', 'Terminal', 'Zebra Cross', 'Jembatan', 'Trotoar'),
(6, 4, NULL, 1, 'Ayah Eka adalah seorang ahli kesehatan. Kata ahli berarti â€¦', 'orang pekerja keras', 'orang pintar', 'Orang yang memiliki gelar', 'Orang yang ahli dalam suatu bidang', 'Orang yang ahli dalam suatu bidang'),
(7, 1, NULL, 1, 'Rina malas menyikat giginya. Gigi Rina â€¦.', 'Putih', 'Kuning', 'Bersih', 'Berkilau', 'Kuning'),
(8, 1, '/ujianTA/soal/img/b.indo/ibu-memasak.jpg', 1, 'Kalimat yang cocok dengan gambar di atas adalah.', 'Ibu sedang berbelanja di pasar', 'Ibu mencuci pakaian', 'Ibu sedang memasak', 'Ibu sedang tidur dikamar', 'Ibu sedang memasak');

-- --------------------------------------------------------

--
-- Table structure for table `tb_user`
--

CREATE TABLE `tb_user` (
  `id_user` int(11) NOT NULL,
  `id_nis` int(11) NOT NULL,
  `username` varchar(50) NOT NULL,
  `nis` varchar(50) NOT NULL,
  `kelas` int(11) NOT NULL,
  `password` varchar(255) NOT NULL,
  `token` text NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `tb_user`
--

INSERT INTO `tb_user` (`id_user`, `id_nis`, `username`, `nis`, `kelas`, `password`, `token`) VALUES
(26, 1, 'fadil', '2018', 4, '$2y$10$2qq4fKE5ItdK6CBRARZQuuspZdSAL6UiZzzosfjW8goqGs/BulCES', 'eyJ0eXAiOiJKV1QiLCJhbGciOiJIUzI1NiJ9.eyJpc3MiOiJodHRwOlwvXC9sb2NhbGhvc3RcL2RiX3VqaWFuXC8iLCJhdWQiOiJodHRwOlwvXC9sb2NhbGhvc3RcL2RiX3VqaWFuXC8iLCJpYXQiOjE1OTk3NjE5MzgsImV4cCI6MTU5OTc2MTk5OCwiZGF0YSI6eyJ1c2VyX2lkIjoiMjYifX0.8hT3HzRvo38hw1Jv_fbkFB_FB89MtSSK1ixhQLS2y1I'),
(27, 2, 'nova', '1025', 4, '$2y$10$cM2MCzReFb52zESp7hLhl.0sibRcL50jquqy6jj1.MBugmA3SRtCK', 'eyJ0eXAiOiJKV1QiLCJhbGciOiJIUzI1NiJ9.eyJpc3MiOiJodHRwOlwvXC9sb2NhbGhvc3RcL2RiX3VqaWFuXC8iLCJhdWQiOiJodHRwOlwvXC9sb2NhbGhvc3RcL2RiX3VqaWFuXC8iLCJpYXQiOjE1OTk2ODg2ODIsImV4cCI6MTU5OTY4ODc0MiwiZGF0YSI6eyJ1c2VyX2lkIjoiMjcifX0.Bw1_M1o-wDqig0vgWteU0ILFb9ppeHnA9kN30ei7WqI'),
(32, 8, 'spongebob', '9999', 3, '$2y$10$5t0pUiEkp1M5/LV1jCrx2e63ovXSrq/KxOE2XbrFqndiBK/lUmnKC', 'eyJ0eXAiOiJKV1QiLCJhbGciOiJIUzI1NiJ9.eyJpc3MiOiJodHRwOlwvXC9sb2NhbGhvc3RcL2RiX3VqaWFuXC8iLCJhdWQiOiJodHRwOlwvXC9sb2NhbGhvc3RcL2RiX3VqaWFuXC8iLCJpYXQiOjE1OTk3NjMwMDMsImV4cCI6MTU5OTc2MzA2MywiZGF0YSI6eyJ1c2VyX2lkIjoiMzIifX0.SkNdRbJuHheOSBVREDOr3IyOcxGZLUOzup9aKkM0xKo'),
(37, 21, 'lili', '2022', 2, '$2y$10$z8txw9cmxVYCvNgMf10KzOiaFLmwTdhJczulIQLt.tLHkQLncwfjG', 'eyJ0eXAiOiJKV1QiLCJhbGciOiJIUzI1NiJ9.eyJpc3MiOiJodHRwOlwvXC9sb2NhbGhvc3RcL2RiX3VqaWFuXC8iLCJhdWQiOiJodHRwOlwvXC9sb2NhbGhvc3RcL2RiX3VqaWFuXC8iLCJpYXQiOjE1OTk3NjE2NzAsImV4cCI6MTU5OTc2MTczMCwiZGF0YSI6eyJ1c2VyX2lkIjoiMzcifX0.Nc1aoNNU3zJquYwlwpUqr5f757zohYo1LqUfuviMxCY'),
(38, 5, 'Sayatul Dihasa Andar Rinjani', '2020', 1, '$2y$10$haLTO8a6irfp62YC2XlDGe0RV8sAb79qkEBeXZrhqhVSIon.7MAKy', 'eyJ0eXAiOiJKV1QiLCJhbGciOiJIUzI1NiJ9.eyJpc3MiOiJodHRwOlwvXC9sb2NhbGhvc3RcL2RiX3VqaWFuXC8iLCJhdWQiOiJodHRwOlwvXC9sb2NhbGhvc3RcL2RiX3VqaWFuXC8iLCJpYXQiOjE2MDAxNzcxMzMsImV4cCI6MTYwMDE3NzE5MywiZGF0YSI6eyJ1c2VyX2lkIjoiMzgifX0.GbRTgTRnW82hwL0DzuS2clZ416b29jsRM4WyTk2TPQY');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `tb_admin`
--
ALTER TABLE `tb_admin`
  ADD PRIMARY KEY (`id_admin`);

--
-- Indexes for table `tb_jawab`
--
ALTER TABLE `tb_jawab`
  ADD PRIMARY KEY (`id_jawab`);

--
-- Indexes for table `tb_matpel`
--
ALTER TABLE `tb_matpel`
  ADD PRIMARY KEY (`id_matpel`);

--
-- Indexes for table `tb_nilai`
--
ALTER TABLE `tb_nilai`
  ADD PRIMARY KEY (`id_nilai`);

--
-- Indexes for table `tb_nis`
--
ALTER TABLE `tb_nis`
  ADD PRIMARY KEY (`id_nis`);

--
-- Indexes for table `tb_soal`
--
ALTER TABLE `tb_soal`
  ADD PRIMARY KEY (`id_soal`);

--
-- Indexes for table `tb_user`
--
ALTER TABLE `tb_user`
  ADD PRIMARY KEY (`id_user`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `tb_admin`
--
ALTER TABLE `tb_admin`
  MODIFY `id_admin` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT for table `tb_jawab`
--
ALTER TABLE `tb_jawab`
  MODIFY `id_jawab` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- AUTO_INCREMENT for table `tb_matpel`
--
ALTER TABLE `tb_matpel`
  MODIFY `id_matpel` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- AUTO_INCREMENT for table `tb_nilai`
--
ALTER TABLE `tb_nilai`
  MODIFY `id_nilai` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=16;

--
-- AUTO_INCREMENT for table `tb_nis`
--
ALTER TABLE `tb_nis`
  MODIFY `id_nis` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=26;

--
-- AUTO_INCREMENT for table `tb_soal`
--
ALTER TABLE `tb_soal`
  MODIFY `id_soal` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=9;

--
-- AUTO_INCREMENT for table `tb_user`
--
ALTER TABLE `tb_user`
  MODIFY `id_user` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=39;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
