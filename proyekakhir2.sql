-- phpMyAdmin SQL Dump
-- version 5.0.4
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Mar 02, 2022 at 03:42 PM
-- Server version: 10.4.17-MariaDB
-- PHP Version: 7.3.26

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `proyekakhir2`
--

-- --------------------------------------------------------

--
-- Table structure for table `tb_akses_menu`
--

CREATE TABLE `tb_akses_menu` (
  `id_aksesmenu` int(11) NOT NULL,
  `id_role` int(11) NOT NULL,
  `id_menu` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `tb_akses_menu`
--

INSERT INTO `tb_akses_menu` (`id_aksesmenu`, `id_role`, `id_menu`) VALUES
(1, 1, 1),
(2, 1, 2),
(3, 2, 2),
(4, 1, 3);

-- --------------------------------------------------------

--
-- Table structure for table `tb_akun`
--

CREATE TABLE `tb_akun` (
  `nik` varchar(20) NOT NULL,
  `nama` varchar(100) NOT NULL,
  `email` varchar(100) NOT NULL,
  `jenis_kelamin` varchar(20) NOT NULL,
  `id_role` int(11) NOT NULL,
  `username` varchar(20) NOT NULL,
  `password` varchar(50) NOT NULL,
  `profil` varchar(100) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `tb_akun`
--

INSERT INTO `tb_akun` (`nik`, `nama`, `email`, `jenis_kelamin`, `id_role`, `username`, `password`, `profil`) VALUES
('11110000', 'Sukimin', 'Pengguna@gmail.com', 'Perempuan', 2, 'Pengguna', 'Pengguna', 'default.jpg'),
('111150701', 'RAHUL STEPEN SINAGA', 'rahul@gmail.com', 'Perempuan', 2, 'rahul123', 'rahul123', '769e10a8aa452cd5fa5a639729c768ed.jpg'),
('1131900', 'Pengunjung', 'Pengunjung@gmail.com', 'Perempuan', 3, 'Pengunjung', 'Pengunjung', 'default.jpg'),
('11319000', 'Administrator', 'Administrator@gmail.com', 'Perempuan', 1, 'Administrator', 'Administrator', 'default.jpg'),
('11319001', 'DAUD MANURUNG', 'daudmanurung@gmail.com', 'Laki-laki', 1, 'if319001', 'daudmanurung', 'default.jpg'),
('11319010', 'ELFRIDA TAMPUBOLON', 'elfridatampubolon@gmail.com', 'Perempuan', 1, 'if319010', 'elfridatampubolon', 'default.jpg'),
('11319023', 'RAHUL STEPEN SINAGA', 'rahul.sinaga01@gmail.com', 'Laki-laki', 1, 'if319023', 'Akuganteng', '88953abbdd69cdb811980dcf608c45f7.jpg'),
('11319056', 'LUCY BUTAR-BUTAR', 'lucybutarbutar@gmail.com', 'Perempuan', 1, 'if319056', 'lucybutarbuta', 'default.jpg'),
('123123123', 'Mukdin', 'mukdin@gmail.com', 'Perempuan', 2, 'mukdin123', 'mukdin123', 'default.jpg'),
('12345', 'Lucys', 'lucys@gmail.com', 'Perempuan', 2, 'lucys123', 'lucys123', 'default.jpg'),
('987654321', 'kawokawoka', '987654321@gmail.com', 'Perempuan', 2, '987654321', '987654321', 'default.jpg');

-- --------------------------------------------------------

--
-- Table structure for table `tb_keuangan`
--

CREATE TABLE `tb_keuangan` (
  `id_keuangan` int(11) NOT NULL,
  `tanggal_laporan_keuangan` timestamp NOT NULL DEFAULT current_timestamp() ON UPDATE current_timestamp(),
  `jumlah_keuangan` double NOT NULL,
  `keterangan` varchar(100) NOT NULL,
  `lampiran` text NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `tb_keuangan`
--

INSERT INTO `tb_keuangan` (`id_keuangan`, `tanggal_laporan_keuangan`, `jumlah_keuangan`, `keterangan`, `lampiran`) VALUES
(14, '2021-06-01 03:30:10', 11111, 'Pemasukan', '7f9c3a7bdd4ea5e611c0581ead08c614.pdf'),
(15, '2021-06-01 02:49:18', 99999, 'Pemasukan', '0e499bb323e5a1e6f8e6ef54ce7ad2d3.docx'),
(16, '2021-06-01 02:52:10', 99999, 'Pemasukan', '30de2263cf6126b8c59d116fcc598300.docx'),
(17, '2021-06-01 02:53:34', 99999, 'Pengeluaran', 'd81084cffbfa93adba18e3eaa2a6b0b6.docx'),
(18, '2021-06-02 02:09:15', 10000, 'Pemasukan', '0adbbe2c2b8118fcaceec2d708f37d21.docx'),
(24, '2021-06-06 09:37:37', 123123, 'Pemasukan', '9a4af40ffa64e024f788de464c2470a7.docx'),
(25, '2021-06-06 09:38:34', 11319023, 'Pengeluaran', 'a2b9a66968b363059de776edd16ba6d7.docx'),
(26, '2021-06-06 10:44:28', 99999, 'Pemasukan', '55fb7f014efdf43578818d31a121b922.docx');

-- --------------------------------------------------------

--
-- Table structure for table `tb_komentar`
--

CREATE TABLE `tb_komentar` (
  `id_komentar` int(11) NOT NULL,
  `nik` int(11) NOT NULL,
  `isi_komentar` text NOT NULL,
  `nama_komentar` varchar(255) NOT NULL,
  `waktu_komentar` timestamp NOT NULL DEFAULT current_timestamp() ON UPDATE current_timestamp(),
  `id_pengumuman` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `tb_komentar`
--

INSERT INTO `tb_komentar` (`id_komentar`, `nik`, `isi_komentar`, `nama_komentar`, `waktu_komentar`, `id_pengumuman`) VALUES
(16, 11110000, 'ini pengguna yang komen yang udah diedit\r\n', 'Sukimin', '2021-05-28 08:55:44', 14),
(22, 11110000, 'Ini komentar Saia', 'Sukimin', '2021-05-31 07:02:42', 7),
(25, 111150701, 'Wahh.. enggak sabar ingin melakukan pemilihan :)', 'RAHUL STEPEN SINAGA', '2021-06-02 02:05:27', 7),
(26, 11319023, 'Wahhh enggak sabar nunggu', 'RAHUL STEPEN SINAGA', '2021-06-02 07:22:54', 18),
(27, 11319023, 'Wahh enggak sabar nunggu pemilihan', 'RAHUL STEPEN SINAGA', '2021-06-02 07:27:27', 19),
(28, 111150701, 'Sama aku juga enggak sabar kapan ini selesai', 'RAHUL STEPEN SINAGA', '2021-06-02 07:31:49', 7);

-- --------------------------------------------------------

--
-- Table structure for table `tb_menu`
--

CREATE TABLE `tb_menu` (
  `id_menu` int(11) NOT NULL,
  `menu` varchar(128) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `tb_menu`
--

INSERT INTO `tb_menu` (`id_menu`, `menu`) VALUES
(1, 'Admin'),
(2, 'Pengguna'),
(3, 'Menu');

-- --------------------------------------------------------

--
-- Table structure for table `tb_penduduk_baru`
--

CREATE TABLE `tb_penduduk_baru` (
  `nik` int(11) NOT NULL,
  `nama` varchar(255) NOT NULL,
  `jumlah_anggota_keluarga` int(11) NOT NULL,
  `tempat_lahir` varchar(255) NOT NULL,
  `tanggal_lahir` varchar(255) NOT NULL,
  `alamat` text NOT NULL,
  `pekerjaan` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `tb_penduduk_baru`
--

INSERT INTO `tb_penduduk_baru` (`nik`, `nama`, `jumlah_anggota_keluarga`, `tempat_lahir`, `tanggal_lahir`, `alamat`, `pekerjaan`) VALUES
(12345, 'Lucys', 1, 'PARPAREAN', '06/16/2021', 'narumonda', 'Pelajar'),
(11110000, 'Sukimin', 7, 'Parparean', '07/15/2001', 'Parparean', 'Petani'),
(11319001, 'DAUD MANURUNG', 1, 'Uluan', '07/15/2001', 'Uluan', 'Pegawai'),
(11319010, 'ELFRIDA TAMPUBOLON', 6, 'Tambunan', '02/05/2001', 'Tambunan', 'Guru'),
(11319023, 'RAHUL STEPEN SINAGA', 7, 'Parparean', '07/15/2001', 'Parparean', 'Petani'),
(11319056, 'LUCY BUTAR-BUTAR', 3, 'Medan', '07/15/2001', 'Medan', 'Pelajar'),
(111150701, 'RAHUL STEPEN SINAGA', 7, 'Parparean', '06/11/2021', 'narumonda', 'Pelajar'),
(123123123, 'Mukdin', 3, 'Parparean', '07/15/2001', 'Narumonda', 'Pelajar');

-- --------------------------------------------------------

--
-- Table structure for table `tb_pengumuman`
--

CREATE TABLE `tb_pengumuman` (
  `id_pengumuman` int(255) NOT NULL,
  `judul_pengumuman` varchar(255) NOT NULL,
  `isi_pengumuman` text NOT NULL,
  `waktu_pengumuman` timestamp NOT NULL DEFAULT current_timestamp() ON UPDATE current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `tb_pengumuman`
--

INSERT INTO `tb_pengumuman` (`id_pengumuman`, `judul_pengumuman`, `isi_pengumuman`, `waktu_pengumuman`) VALUES
(7, 'Pemilihan Kepala Desa Baru', 'Pemilihan Kepala Desa Baru akan kita adakan Pada 1 Juni 2021.', '2021-05-26 09:02:00'),
(18, 'Pemilihan Pengurus Desa Baru', 'Akan diadakan tanggal 1 agustus 2020', '2021-06-02 07:22:24'),
(19, 'Pemilihan presiden', 'pemilihan akan ada tanggal 1 agustus 2021', '2021-06-02 07:27:10');

-- --------------------------------------------------------

--
-- Table structure for table `tb_role`
--

CREATE TABLE `tb_role` (
  `id_role` int(11) NOT NULL,
  `role` varchar(128) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `tb_role`
--

INSERT INTO `tb_role` (`id_role`, `role`) VALUES
(1, 'Administrator'),
(2, 'Masyarakat'),
(3, 'Pengunjung');

-- --------------------------------------------------------

--
-- Table structure for table `tb_sub_menu`
--

CREATE TABLE `tb_sub_menu` (
  `id_submenu` int(11) NOT NULL,
  `id_menu` int(11) NOT NULL,
  `nama_menu` varchar(128) NOT NULL,
  `url` varchar(128) NOT NULL,
  `icon` varchar(128) NOT NULL,
  `is_active` int(1) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `tb_sub_menu`
--

INSERT INTO `tb_sub_menu` (`id_submenu`, `id_menu`, `nama_menu`, `url`, `icon`, `is_active`) VALUES
(1, 2, 'Dashboard', 'Pengguna', 'fas fa-fw fa-tachometer-alt', 1),
(2, 2, 'My Profile', 'Pengguna/profil', 'fas fa-fw fa-user', 1),
(3, 3, 'Menu Management', 'Menu', 'fas fa-fw fa-folder', 1),
(4, 3, 'Sub Menu Management', 'menu/submenu', 'fas fa-fw fa-folder-open', 1),
(5, 1, 'Daftar Akun', 'Admin/DaftarAkun', 'fas fa-fw fa-users', 1),
(6, 1, 'Daftar Akun Aktivasi', 'Admin/DaftarAkunAktivasi', 'fas fa-fw fa-users-slash', 1),
(7, 2, 'Daftar Pengumuman', 'Pengguna/DaftarPengumuman', 'fas fa-fw fa-bullhorn', 1),
(8, 1, 'Daftar Akun Admin', 'Admin/DaftarAkunAdmin', 'fas fa-fw fa-users', 1),
(9, 1, 'Daftar Penduduk', 'Admin/DaftarPenduduk', '	fas fa-fw fa-users', 1),
(24, 1, 'Keuangan', 'Admin/Keuangan', 'fas fa-fw fa-wallet', 1),
(29, 1, 'Pengumuman', 'Admin/Pengumuman', 'fas fa-fw fa-edit', 1),
(30, 2, 'Daftar Pengurus Desa', 'Pengguna/DaftarPengurusDesa', 'fas fa-fw fa-users', 1),
(31, 2, 'Daftar Penduduk Desa', 'Pengguna/DaftarPendudukDesa', 'fas fa-fw fa-users', 1),
(32, 2, 'Laporan Keuangan', 'Pengguna/LaporanKeuangan', 'fas fa-fw fa-wallet', 1);

--
-- Indexes for dumped tables
--

--
-- Indexes for table `tb_akses_menu`
--
ALTER TABLE `tb_akses_menu`
  ADD PRIMARY KEY (`id_aksesmenu`);

--
-- Indexes for table `tb_akun`
--
ALTER TABLE `tb_akun`
  ADD PRIMARY KEY (`nik`);

--
-- Indexes for table `tb_keuangan`
--
ALTER TABLE `tb_keuangan`
  ADD PRIMARY KEY (`id_keuangan`);

--
-- Indexes for table `tb_komentar`
--
ALTER TABLE `tb_komentar`
  ADD PRIMARY KEY (`id_komentar`);

--
-- Indexes for table `tb_menu`
--
ALTER TABLE `tb_menu`
  ADD PRIMARY KEY (`id_menu`);

--
-- Indexes for table `tb_penduduk_baru`
--
ALTER TABLE `tb_penduduk_baru`
  ADD PRIMARY KEY (`nik`);

--
-- Indexes for table `tb_pengumuman`
--
ALTER TABLE `tb_pengumuman`
  ADD PRIMARY KEY (`id_pengumuman`);

--
-- Indexes for table `tb_role`
--
ALTER TABLE `tb_role`
  ADD PRIMARY KEY (`id_role`);

--
-- Indexes for table `tb_sub_menu`
--
ALTER TABLE `tb_sub_menu`
  ADD PRIMARY KEY (`id_submenu`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `tb_akses_menu`
--
ALTER TABLE `tb_akses_menu`
  MODIFY `id_aksesmenu` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=8;

--
-- AUTO_INCREMENT for table `tb_keuangan`
--
ALTER TABLE `tb_keuangan`
  MODIFY `id_keuangan` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=28;

--
-- AUTO_INCREMENT for table `tb_komentar`
--
ALTER TABLE `tb_komentar`
  MODIFY `id_komentar` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=29;

--
-- AUTO_INCREMENT for table `tb_menu`
--
ALTER TABLE `tb_menu`
  MODIFY `id_menu` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=16;

--
-- AUTO_INCREMENT for table `tb_pengumuman`
--
ALTER TABLE `tb_pengumuman`
  MODIFY `id_pengumuman` int(255) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=21;

--
-- AUTO_INCREMENT for table `tb_role`
--
ALTER TABLE `tb_role`
  MODIFY `id_role` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT for table `tb_sub_menu`
--
ALTER TABLE `tb_sub_menu`
  MODIFY `id_submenu` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=38;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
