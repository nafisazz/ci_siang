-- phpMyAdmin SQL Dump
-- version 5.1.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Jan 17, 2023 at 03:42 AM
-- Server version: 10.4.22-MariaDB
-- PHP Version: 8.0.13

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `db_magang`
--

-- --------------------------------------------------------

--
-- Table structure for table `admin`
--

CREATE TABLE `admin` (
  `id` int(80) NOT NULL,
  `email` varchar(80) DEFAULT NULL,
  `password` varchar(80) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `admin`
--

INSERT INTO `admin` (`id`, `email`, `password`) VALUES
(1, 'adminn@gmail.com', '12345');

-- --------------------------------------------------------

--
-- Table structure for table `divisi`
--

CREATE TABLE `divisi` (
  `id` int(11) NOT NULL,
  `divisi` varchar(80) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `divisi`
--

INSERT INTO `divisi` (`id`, `divisi`) VALUES
(1, 'Humas'),
(2, 'Tata Usaha'),
(3, 'Perlengkapan'),
(4, 'Rumah Tangga'),
(5, 'Persidangan');

-- --------------------------------------------------------

--
-- Table structure for table `kegiatan`
--

CREATE TABLE `kegiatan` (
  `id` int(80) NOT NULL,
  `isi_kegiatan` varchar(80) DEFAULT NULL,
  `tanggal` datetime DEFAULT NULL,
  `user_id` int(80) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `kegiatan`
--

INSERT INTO `kegiatan` (`id`, `isi_kegiatan`, `tanggal`, `user_id`) VALUES
(9, 'kenalan', '2023-01-04 12:00:00', 34),
(10, 'hghg', '2023-01-04 12:00:00', 34),
(11, 'cobaa', '2023-01-04 09:13:51', 34),
(12, 'SADWADD', '2023-01-04 03:14:39', 34),
(13, 'heloo', '2023-01-04 03:16:16', 34),
(14, 'dsdsdsd', '2023-01-04 15:16:52', 34),
(16, 'sdsad', '2023-01-04 22:32:00', 38),
(17, 'memasak', '2023-01-04 22:48:43', 38),
(18, 'makan\r\n', '2023-01-05 18:09:23', 47),
(19, 'perkenalan', '2023-01-05 23:27:47', 49),
(20, 'perkenalan', '2023-01-08 20:26:42', 51),
(21, 'makan', '2023-01-08 20:28:32', 51),
(24, 'perkenalan diri', '2023-01-10 03:23:09', 52),
(25, 'input kegiatan', '2023-01-10 03:27:33', 52);

-- --------------------------------------------------------

--
-- Table structure for table `nilai`
--

CREATE TABLE `nilai` (
  `id` int(80) NOT NULL,
  `id_peserta` int(11) NOT NULL,
  `inovasi` char(11) DEFAULT NULL,
  `kerja_sama` char(11) DEFAULT NULL,
  `disiplin` char(11) DEFAULT NULL,
  `rata` char(11) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `nilai`
--

INSERT INTO `nilai` (`id`, `id_peserta`, `inovasi`, `kerja_sama`, `disiplin`, `rata`) VALUES
(1, 48, '56', '80', '90', NULL),
(2, 34, '70', '80', '90', NULL),
(4, 51, '90', '90', '90', NULL),
(5, 49, '90', '90', '95', NULL),
(6, 52, '90', '95', '80', NULL),
(7, 53, '90', '80', '90', NULL);

-- --------------------------------------------------------

--
-- Table structure for table `pendaftaran`
--

CREATE TABLE `pendaftaran` (
  `id` int(10) NOT NULL,
  `nama_peserta` varchar(80) DEFAULT NULL,
  `nim` varchar(20) NOT NULL,
  `image` varchar(180) DEFAULT NULL,
  `alamat` varchar(80) DEFAULT NULL,
  `jenis_kel` enum('L','P') DEFAULT NULL,
  `agama` varchar(80) DEFAULT NULL,
  `asal_sekolah` varchar(80) DEFAULT NULL,
  `alamat_sekolah` varchar(80) DEFAULT NULL,
  `jurusan` varchar(80) DEFAULT NULL,
  `email` varchar(80) DEFAULT NULL,
  `no_telp` varchar(20) DEFAULT NULL,
  `password` varchar(50) DEFAULT NULL,
  `role_id` int(11) DEFAULT NULL,
  `data_created` int(11) DEFAULT NULL,
  `divisi` int(11) DEFAULT NULL,
  `surat_ket` varchar(80) NOT NULL,
  `tgl_mulai` date DEFAULT NULL,
  `tgl_selesai` date DEFAULT NULL,
  `acc` varchar(30) NOT NULL DEFAULT 'belum',
  `alasan` text NOT NULL,
  `status` int(11) NOT NULL,
  `penilaian` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `pendaftaran`
--

INSERT INTO `pendaftaran` (`id`, `nama_peserta`, `nim`, `image`, `alamat`, `jenis_kel`, `agama`, `asal_sekolah`, `alamat_sekolah`, `jurusan`, `email`, `no_telp`, `password`, `role_id`, `data_created`, `divisi`, `surat_ket`, `tgl_mulai`, `tgl_selesai`, `acc`, `alasan`, `status`, `penilaian`) VALUES
(1, 'Penyelia Tata Usaha', '0', 'default.png', 'penyelia', NULL, 'islam', 'penyelia', '', '', 'penyelia@tatausaha.com', '', '827ccb0eea8a706c4c34a16891f84e7b', 2, 1672829011, 2, '0', '0000-00-00', '0000-00-00', 'lolos', '', 0, 0),
(2, 'Penyelia Perlengkapan', '0', 'default.png', 'jl. bandar lampung', NULL, 'islam', 'penyelia', '', '', 'penyelia@perlengkapan.com', '', '827ccb0eea8a706c4c34a16891f84e7b', 2, 1672838079, 3, '0', '0000-00-00', '0000-00-00', 'lolos', '', 0, 0),
(3, 'Penyelia Perlengkapan', '0', 'default.png', 'penyelia', 'P', 'islam', 'penyelia', '', 'penyelia', 'penyelia@perlengkapan.com', '', '827ccb0eea8a706c4c34a16891f84e7b', 2, 0, 4, '0', '0000-00-00', '0000-00-00', 'lolos', '', 0, 0),
(13, 'admin', '0', 'default.png', 'admin', 'L', 'islam', 'undip', NULL, 'Ekonomi', 'admin@gmail.com', '121212', '827ccb0eea8a706c4c34a16891f84e7b', 1, 1671355420, 0, '0', '0000-00-00', '0000-00-00', 'lolos', '', 0, 0),
(29, 'Penyelia Humas', '0', 'default.png', 'Penyelia', NULL, 'islam', 'udinus', NULL, 'IT', 'penyelia@gmail.com', '098767643', '827ccb0eea8a706c4c34a16891f84e7b', 2, 1672046277, 1, '0', NULL, NULL, 'lolos', '', 1, 0),
(34, 'Fajri Hasan', 'a22', 'default.png', 'Jl. Raden Intan No.55, Enggal', 'L', 'islam', 'udinus', 'Jl. Nakula', 'Teknik Informatika', 'yutubsu767@gmail.com', '08383838', '827ccb0eea8a706c4c34a16891f84e7b', 3, 1672468568, 1, '221219-ALUR.pdf', '2023-02-10', '2023-03-10', 'tidak_aktif', '', 1, 0),
(47, 'nafisa', '8676876', 'default.png', 'jl. bandar lampung', 'P', 'islam', 'udinus', 'jl, nakula', 'Teknik Informatika', 'raabtahai@gmail.com', '0876856469', '827ccb0eea8a706c4c34a16891f84e7b', 3, 1672916719, 2, '221219-ALUR.pdf', '2023-01-11', '2023-01-26', 'tidak_aktif', '', 1, 0),
(48, 'yuyu', '8567576576', 'default.png', 'jl', 'P', 'islam', 'udinus', 'jl bulu', 'ti', 'asd@gmail.com', '09876543', '827ccb0eea8a706c4c34a16891f84e7b', 3, 1672929532, 1, '221219-ALUR.pdf', '2023-01-18', '2023-01-26', 'tidak_aktif', '', 1, 0),
(49, 'Nafisa Azzahra', 'Y76564728', 'default.png', 'jl. bandar lampung', 'P', 'islam', 'UDINUS', 'jl, nakula', 'Teknik Informatika', 'qwe@gmail.com', '0876856469', '827ccb0eea8a706c4c34a16891f84e7b', 3, 1672934133, 1, '221219-ALUR.pdf', '2023-01-10', '2023-01-31', 'tidak_aktif', '', 1, 0),
(50, 'Hayati', '34687792', 'default.png', 'jl. bandar lampung', 'P', 'islam', 'UDINUS', 'jl, nakula', 'Teknik Informatika', 'abc@gmail.com', '08383838', '827ccb0eea8a706c4c34a16891f84e7b', 3, 1673140099, 3, '221219-ALUR.pdf', '2022-02-20', '2002-02-20', 'ditolak', '																												', 1, 0),
(51, 'hayati lelah', 'A22.0202', 'default.png', 'jl. bandar lampung', 'P', 'islam', 'UDINUS', 'jl, nakula', 'Teknik Informatika', 'hayati@gmail.com', '08383838', '827ccb0eea8a706c4c34a16891f84e7b', 3, 1673183620, 1, '221219-ALUR.pdf', '2023-01-12', '2023-01-31', 'tidak_aktif', '', 1, 0),
(52, 'Alvina', 'A22.2020.02834', 'default.png', 'Jl. P. Antasari No.15, Kedamaian', 'P', 'islam', 'undip', 'jl, nakula', 'Teknik Informatika', 'nim@gmail.com', '08383838', '827ccb0eea8a706c4c34a16891f84e7b', 3, 1673245655, 1, '221219-ALUR.pdf', '2023-01-17', '2023-01-25', 'tidak_aktif', '', 1, 0),
(53, 'Nafisa Khally', 'A22.2020.02834', 'default.png', 'jl. bandar lampung', 'P', 'islam', 'UDINUS', 'jl. Imam Bonjol', 'Teknik Informatika D3', 'nafisa@gmail.com', '087546576767', '827ccb0eea8a706c4c34a16891f84e7b', 3, 1673314193, 1, '221219-ALUR.pdf', '2023-01-10', '2023-02-28', 'tidak_aktif', '', 1, 0),
(54, 'Azzahra', 'A22.2020.02834', 'default.png', 'jl. bandar lampung', NULL, 'islam', 'UDINUS', 'jl, nakula', 'Teknik Informatika D3', 'zahra@gmail.com', '08383838', '827ccb0eea8a706c4c34a16891f84e7b', 3, 1673316902, 1, '221219-ALUR.pdf', '2023-01-10', '2022-12-22', 'belum', '', 1, 0),
(62, 'kevin', 'A22.2020.02832', 'default.png', 'asdd', 'L', 'islam', 'asdasdasd', 'asdd', 'asdsad', '1@gmail.com', '0808023', '827ccb0eea8a706c4c34a16891f84e7b', 3, 1673708486, 2, 'LAPORAN_KKI_KEVIN2.pdf', '2023-01-14', '2023-01-19', 'belum', '', 1, 0),
(63, 'Super Admin', '0', 'default.png', 'admin', 'L', 'islam', 'undip', NULL, 'Ekonomi', 'superadmin@gmail.com', '121212', '827ccb0eea8a706c4c34a16891f84e7b', 4, 1671355420, 0, '0', '0000-00-00', '0000-00-00', 'lolos', '', 0, 0);

-- --------------------------------------------------------

--
-- Table structure for table `penyelia`
--

CREATE TABLE `penyelia` (
  `id` int(80) NOT NULL,
  `email` varchar(80) DEFAULT NULL,
  `password` varchar(80) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `penyelia`
--

INSERT INTO `penyelia` (`id`, `email`, `password`) VALUES
(1, 'penyelia@humas.com', '12345'),
(2, 'penyelia@perlengkapan.com', '12345'),
(3, 'penyelia@keuangan.com', '12345');

-- --------------------------------------------------------

--
-- Table structure for table `user`
--

CREATE TABLE `user` (
  `id` int(11) NOT NULL,
  `role_id` varchar(80) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `user`
--

INSERT INTO `user` (`id`, `role_id`) VALUES
(1, 'admin'),
(2, 'penyelia'),
(3, 'user');

-- --------------------------------------------------------

--
-- Table structure for table `user_access_menu`
--

CREATE TABLE `user_access_menu` (
  `id` int(11) NOT NULL,
  `role_id` int(11) NOT NULL,
  `menu_id` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `user_access_menu`
--

INSERT INTO `user_access_menu` (`id`, `role_id`, `menu_id`) VALUES
(1, 1, 1),
(2, 1, 3),
(3, 3, 3);

--
-- Indexes for dumped tables
--

--
-- Indexes for table `divisi`
--
ALTER TABLE `divisi`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `kegiatan`
--
ALTER TABLE `kegiatan`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `nilai`
--
ALTER TABLE `nilai`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `pendaftaran`
--
ALTER TABLE `pendaftaran`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `penyelia`
--
ALTER TABLE `penyelia`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `user`
--
ALTER TABLE `user`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `user_access_menu`
--
ALTER TABLE `user_access_menu`
  ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `divisi`
--
ALTER TABLE `divisi`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;

--
-- AUTO_INCREMENT for table `kegiatan`
--
ALTER TABLE `kegiatan`
  MODIFY `id` int(80) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=26;

--
-- AUTO_INCREMENT for table `nilai`
--
ALTER TABLE `nilai`
  MODIFY `id` int(80) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=8;

--
-- AUTO_INCREMENT for table `pendaftaran`
--
ALTER TABLE `pendaftaran`
  MODIFY `id` int(10) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=64;

--
-- AUTO_INCREMENT for table `user`
--
ALTER TABLE `user`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT for table `user_access_menu`
--
ALTER TABLE `user_access_menu`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
