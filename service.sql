-- phpMyAdmin SQL Dump
-- version 4.2.11
-- http://www.phpmyadmin.net
--
-- Host: 127.0.0.1
-- Generation Time: Nov 20, 2019 at 07:59 AM
-- Server version: 5.6.21
-- PHP Version: 5.5.19

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8 */;

--
-- Database: `service`
--

-- --------------------------------------------------------

--
-- Table structure for table `barang`
--

CREATE TABLE IF NOT EXISTS `barang` (
  `id_barang` varchar(25) NOT NULL,
  `jenis` varchar(20) NOT NULL,
  `tgl_po` datetime NOT NULL,
  `no_po` varchar(20) NOT NULL,
  `nama_barang` varchar(20) NOT NULL,
  `merk` varchar(20) NOT NULL,
  `stok_in` int(11) NOT NULL,
  `harga` int(20) NOT NULL,
  `keterangan` text NOT NULL,
  `reported` varchar(20) NOT NULL,
  `waktu_input` datetime NOT NULL,
  `status` varchar(5) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `barang`
--

INSERT INTO `barang` (`id_barang`, `jenis`, `tgl_po`, `no_po`, `nama_barang`, `merk`, `stok_in`, `harga`, `keterangan`, `reported`, `waktu_input`, `status`) VALUES
('ITINV201911190001', 'LAPTOP', '2019-11-01 00:00:00', 'JKT788909', 'Dell Vostro 14-5480', 'Dell', 1, 6000000, 'Ram 4 GB, Hardisk 500 GB, OS linux', 'K0009', '2019-11-19 18:56:06', '1'),
('ITINV201911190002', 'LAPTOP', '2019-11-01 00:00:00', 'jkt234567', 'Dell Inspiron 5875', 'Dell', 1, 9000000, 'Ram 4 GB, Hardisk 500 GB, OS Win 10', 'K0009', '2019-11-19 18:44:53', '1');

-- --------------------------------------------------------

--
-- Table structure for table `divisi`
--

CREATE TABLE IF NOT EXISTS `divisi` (
`id_divisi` int(11) NOT NULL,
  `nama_divisi` varchar(30) NOT NULL,
  `reported` int(5) NOT NULL,
  `waktu_input` datetime NOT NULL
) ENGINE=InnoDB AUTO_INCREMENT=31 DEFAULT CHARSET=latin1;

--
-- Dumping data for table `divisi`
--

INSERT INTO `divisi` (`id_divisi`, `nama_divisi`, `reported`, `waktu_input`) VALUES
(10, 'Gudang Inbond', 0, '0000-00-00 00:00:00'),
(11, 'Gudang Outbond', 0, '0000-00-00 00:00:00'),
(12, 'ITSupport', 0, '0000-00-00 00:00:00'),
(13, 'Tali Plastik', 0, '0000-00-00 00:00:00'),
(14, 'R n D', 0, '0000-00-00 00:00:00'),
(15, 'Laborat & QC', 0, '0000-00-00 00:00:00'),
(17, 'HRD', 0, '0000-00-00 00:00:00'),
(18, 'GA / Purchasing', 0, '0000-00-00 00:00:00'),
(19, 'Accounting & Finance', 0, '0000-00-00 00:00:00'),
(20, 'Internal Auditor', 0, '0000-00-00 00:00:00'),
(21, 'Penjualan Jakarta', 0, '0000-00-00 00:00:00'),
(22, 'Penjualan Semarang', 0, '0000-00-00 00:00:00'),
(23, 'Penjualan Surabaya', 0, '0000-00-00 00:00:00'),
(24, 'Teknik Bangunan', 0, '0000-00-00 00:00:00'),
(25, 'Teknik Utility', 0, '0000-00-00 00:00:00'),
(26, 'Procurement', 0, '0000-00-00 00:00:00'),
(28, 'PPIC', 0, '0000-00-00 00:00:00');

-- --------------------------------------------------------

--
-- Table structure for table `history_feedback`
--

CREATE TABLE IF NOT EXISTS `history_feedback` (
`id_feedback` int(11) NOT NULL,
  `id_service` varchar(13) NOT NULL,
  `feedback` int(11) NOT NULL,
  `reported` varchar(5) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Table structure for table `informasi`
--

CREATE TABLE IF NOT EXISTS `informasi` (
`id_informasi` int(11) NOT NULL,
  `tanggal` datetime NOT NULL,
  `subject` varchar(35) NOT NULL,
  `pesan` text NOT NULL,
  `status` decimal(2,0) NOT NULL,
  `id_user` varchar(5) NOT NULL,
  `file_informasi` text NOT NULL
) ENGINE=InnoDB AUTO_INCREMENT=25 DEFAULT CHARSET=latin1;

--
-- Dumping data for table `informasi`
--

INSERT INTO `informasi` (`id_informasi`, `tanggal`, `subject`, `pesan`, `status`, `id_user`, `file_informasi`) VALUES
(23, '2019-11-19 15:36:40', 'Flowcart System Job Request', 'Flowcart System Job Request', '1', 'K0009', '132313.jpg'),
(24, '2019-11-19 15:33:35', 'Icon New ITSupport', 'Icon New ITSupport', '1', 'K0009', '13002.jpg');

-- --------------------------------------------------------

--
-- Table structure for table `jabatan`
--

CREATE TABLE IF NOT EXISTS `jabatan` (
`id_jabatan` int(11) NOT NULL,
  `nama_jabatan` varchar(30) NOT NULL,
  `status` int(5) NOT NULL,
  `reported` int(5) NOT NULL,
  `waktu_input` datetime NOT NULL
) ENGINE=InnoDB AUTO_INCREMENT=10 DEFAULT CHARSET=latin1;

--
-- Dumping data for table `jabatan`
--

INSERT INTO `jabatan` (`id_jabatan`, `nama_jabatan`, `status`, `reported`, `waktu_input`) VALUES
(1, 'Direksi', 0, 0, '0000-00-00 00:00:00'),
(3, 'Supervisor', 0, 0, '0000-00-00 00:00:00'),
(4, 'Staff', 0, 0, '0000-00-00 00:00:00'),
(5, 'Administrasi', 0, 0, '0000-00-00 00:00:00'),
(9, 'Manager', 0, 0, '0000-00-00 00:00:00');

-- --------------------------------------------------------

--
-- Table structure for table `karyawan`
--

CREATE TABLE IF NOT EXISTS `karyawan` (
  `nik` varchar(5) NOT NULL,
  `nama` varchar(35) NOT NULL,
  `email` varchar(50) NOT NULL,
  `alamat` text NOT NULL,
  `jk` varchar(10) NOT NULL,
  `id_divisi` int(11) NOT NULL,
  `id_jabatan` int(11) NOT NULL,
  `level` varchar(10) NOT NULL,
  `reported` int(5) NOT NULL,
  `waktu_input` datetime NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `karyawan`
--

INSERT INTO `karyawan` (`nik`, `nama`, `email`, `alamat`, `jk`, `id_divisi`, `id_jabatan`, `level`, `reported`, `waktu_input`) VALUES
('K0001', 'Admin3', 'admin@batangalum.com', 'Batang', 'LAKI-LAKI', 12, 5, 'ADMIN', 0, '0000-00-00 00:00:00'),
('K0009', 'Santoso', 'santoso@miki-industries.com', 'Batang', 'LAKI-LAKI', 12, 4, 'TEKNISI', 0, '0000-00-00 00:00:00'),
('K0010', 'Riski', 'riski@gamil.com', 'Batang', 'LAKI-LAKI', 10, 4, 'USER', 0, '0000-00-00 00:00:00'),
('K0011', 'Admin', 'admin@gmail.com', 'Batang', 'PEREMPUAN', 12, 4, 'ADMIN', 0, '0000-00-00 00:00:00'),
('K0012', 'user', 'user@gmail.com', 'Batang', 'LAKI-LAKI', 11, 4, 'USER', 0, '0000-00-00 00:00:00'),
('K0013', 'Manager', 'manager@gmail.com', 'batang', 'LAKI-LAKI', 12, 9, 'MANAGER', 0, '0000-00-00 00:00:00');

-- --------------------------------------------------------

--
-- Table structure for table `kondisi`
--

CREATE TABLE IF NOT EXISTS `kondisi` (
`id_kondisi` int(11) NOT NULL,
  `nama_kondisi` varchar(30) NOT NULL,
  `waktu_respon` decimal(10,0) NOT NULL
) ENGINE=InnoDB AUTO_INCREMENT=5 DEFAULT CHARSET=latin1;

--
-- Dumping data for table `kondisi`
--

INSERT INTO `kondisi` (`id_kondisi`, `nama_kondisi`, `waktu_respon`) VALUES
(1, 'Critical', '6'),
(2, 'High', '24'),
(3, 'Medium', '72'),
(4, 'Low', '360');

-- --------------------------------------------------------

--
-- Table structure for table `service`
--

CREATE TABLE IF NOT EXISTS `service` (
  `id_service` varchar(20) NOT NULL,
  `tanggal` datetime NOT NULL,
  `tanggal_proses` datetime NOT NULL,
  `tanggal_solved` datetime NOT NULL,
  `reported` varchar(5) NOT NULL,
  `problem_detail` text NOT NULL,
  `id_teknisi` varchar(5) NOT NULL,
  `status` int(11) NOT NULL,
  `progress` decimal(10,0) NOT NULL,
  `category` varchar(20) NOT NULL,
  `id_barang` varchar(25) NOT NULL,
  `id_kondisi` int(5) NOT NULL,
  `skomputer` text NOT NULL,
  `sparepart` text NOT NULL,
  `tanggal_service` datetime NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `service`
--

INSERT INTO `service` (`id_service`, `tanggal`, `tanggal_proses`, `tanggal_solved`, `reported`, `problem_detail`, `id_teknisi`, `status`, `progress`, `category`, `id_barang`, `id_kondisi`, `skomputer`, `sparepart`, `tanggal_service`) VALUES
('ITS201911200001', '2019-11-20 10:57:43', '0000-00-00 00:00:00', '0000-00-00 00:00:00', 'K0009', '1. Install Ulang', '', 1, '0', '', 'ITINV201911190001', 0, '', '', '2019-11-08 00:00:00');

-- --------------------------------------------------------

--
-- Table structure for table `st_barang`
--

CREATE TABLE IF NOT EXISTS `st_barang` (
  `id_st` varchar(25) NOT NULL,
  `id_barang` varchar(20) NOT NULL,
  `tgl_st` datetime NOT NULL,
  `id_karyawan` varchar(20) NOT NULL,
  `keterangan` text NOT NULL,
  `reported` varchar(20) NOT NULL,
  `waktu_input` datetime NOT NULL,
  `status` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `st_barang`
--

INSERT INTO `st_barang` (`id_st`, `id_barang`, `tgl_st`, `id_karyawan`, `keterangan`, `reported`, `waktu_input`, `status`) VALUES
('ITST201911200001', 'ITINV201911190001', '2019-11-08 00:00:00', 'K0009', '', 'K0009', '2019-11-20 09:33:43', 1);

-- --------------------------------------------------------

--
-- Table structure for table `teknisi`
--

CREATE TABLE IF NOT EXISTS `teknisi` (
  `id_teknisi` varchar(5) NOT NULL,
  `nik` varchar(5) NOT NULL,
  `spesialis` varchar(20) NOT NULL,
  `status` varchar(11) NOT NULL,
  `point` decimal(2,0) NOT NULL,
  `reported` int(5) NOT NULL,
  `waktu_input` datetime NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `teknisi`
--

INSERT INTO `teknisi` (`id_teknisi`, `nik`, `spesialis`, `status`, `point`, `reported`, `waktu_input`) VALUES
('T0001', 'K0009', 'Software', '', '2', 0, '0000-00-00 00:00:00');

-- --------------------------------------------------------

--
-- Table structure for table `tracking`
--

CREATE TABLE IF NOT EXISTS `tracking` (
`id_tracking` int(11) NOT NULL,
  `id_history` varchar(20) NOT NULL,
  `tanggal` datetime NOT NULL,
  `status` varchar(50) NOT NULL,
  `deskripsi` text NOT NULL,
  `id_user` varchar(5) NOT NULL
) ENGINE=InnoDB AUTO_INCREMENT=500 DEFAULT CHARSET=latin1;

--
-- Dumping data for table `tracking`
--

INSERT INTO `tracking` (`id_tracking`, `id_history`, `tanggal`, `status`, `deskripsi`, `id_user`) VALUES
(430, 'SLJK201812210', '2018-12-21 15:14:08', 'Created Request', '', 'K0009'),
(431, 'SLJK201812210', '2018-12-21 15:14:56', 'Request disetujui', '', 'K0009'),
(432, 'SLJK201812210', '2018-12-21 15:15:13', 'Pemilihan Teknisi', 'Request diberikan kepada teknisi', 'K0009'),
(433, 'SLJK201812210', '2018-12-21 15:15:44', 'Diproses oleh teknisi', '', 'K0009'),
(434, 'SLJK201812210', '2018-12-21 15:16:02', 'Up Progress To 100 %', 'selesai', 'K0009'),
(435, 'SLJK201812220', '2018-12-22 14:27:57', 'Created Request', '', 'K0009'),
(436, 'SLJK201812210', '2018-12-22 14:29:36', 'Diterima User', '', 'K0009'),
(437, 'SLJK201812220', '2018-12-22 14:30:21', 'Created Request', '', 'K0009'),
(438, 'SLJK201812220', '2018-12-22 14:42:15', 'Created Request', '', 'K0009'),
(439, 'SLJK201812220', '2018-12-22 14:47:11', 'Created Request', '', 'K0009'),
(440, 'SLJK201812220', '2018-12-22 14:48:07', 'Request disetujui', '', 'K0009'),
(441, 'SLJK201812220', '2018-12-22 14:48:28', 'Pemilihan Teknisi', 'Request diberikan kepada teknisi', 'K0009'),
(442, 'SLJK201812220', '2018-12-22 14:48:40', 'Diproses oleh teknisi', '', 'K0009'),
(443, 'SLJK201812220', '2018-12-22 14:48:55', 'Up Progress To 100 %', '', 'K0009'),
(444, '30', '2019-11-19 09:54:01', 'delete', 'delete cabang', 'K0009'),
(445, '8', '2019-11-19 11:41:53', 'delete', 'delete divisi', 'K0009'),
(446, '9', '2019-11-19 11:41:57', 'delete', 'delete divisi', 'K0009'),
(447, '2', '2019-11-19 15:31:51', 'delete', 'delete jabatan', 'K0009'),
(448, '2', '2019-11-19 15:32:39', 'delete', 'delete informasi', 'K0009'),
(449, 'ITINV201911190001', '2019-11-19 16:56:59', 'insert', 'input new barang', 'K0009'),
(450, 'ITINV201911190002', '2019-11-19 18:44:53', 'insert', 'input new barang', 'K0009'),
(451, 'ITINV201911190001', '2019-11-19 18:48:19', 'update', 'update barang', 'K0009'),
(452, 'ITINV201911190001', '2019-11-19 18:56:06', 'update', 'update barang', 'K0009'),
(453, 'ITST201911200001', '2019-11-20 04:14:32', 'insert ', 'insert serah terima barang', ''),
(454, 'ITST201911200001', '2019-11-20 04:28:14', 'insert ', 'insert serah terima barang', 'K0009'),
(455, 'ITST201911200001', '2019-11-20 04:33:52', 'insert ', 'insert serah terima barang', 'K0009'),
(456, 'ITST201911200001', '2019-11-20 04:36:16', 'insert ', 'insert serah terima barang', 'K0009'),
(457, 'ITST201911200001', '2019-11-20 04:39:21', 'insert ', 'insert serah terima barang', 'K0009'),
(458, 'ITST201911200001', '2019-11-20 04:41:59', 'insert ', 'insert serah terima barang', 'K0009'),
(459, 'ITST201911200001', '2019-11-20 06:31:30', 'update', 'update penyerahan barang', 'K0009'),
(460, 'ITST201911200001', '2019-11-20 06:35:26', 'insert ', 'insert serah terima barang', 'K0009'),
(461, 'ITST201911200001', '2019-11-20 06:35:42', 'update', 'update penyerahan barang', 'K0009'),
(462, 'ITST201911200001', '2019-11-20 06:43:35', 'insert ', 'insert serah terima barang', 'K0009'),
(463, 'ITST201911200001', '2019-11-20 06:43:58', 'update', 'update penyerahan barang', 'K0009'),
(464, 'ITST201911200001', '2019-11-20 06:47:28', 'insert ', 'insert serah terima barang', 'K0009'),
(465, 'ITST201911200001', '2019-11-20 06:47:35', 'update', 'update penyerahan barang', 'K0009'),
(466, 'ITST201911200001', '2019-11-20 06:49:47', 'insert ', 'insert serah terima barang', 'K0009'),
(467, 'ITST201911200001', '2019-11-20 06:49:53', 'update', 'update penyerahan barang', 'K0009'),
(468, 'ITST201911200002', '2019-11-20 06:54:15', 'insert ', 'insert serah terima barang', 'K0009'),
(469, 'ITST201911200001', '2019-11-20 08:05:54', 'insert ', 'insert serah terima barang', 'K0009'),
(470, 'ITST201911200001', '2019-11-20 08:30:04', 'update', 'update penyerahan barang', 'K0009'),
(471, 'ITST201911200001', '2019-11-20 08:38:33', 'insert ', 'insert serah terima barang', 'K0009'),
(472, 'ITST201911200001', '2019-11-20 08:44:31', 'insert ', 'insert serah terima barang', 'K0009'),
(473, 'ITST201911200001', '2019-11-20 09:05:07', 'delete', 'delete Serah Terima Barang', 'K0009'),
(474, 'ITST201911200001', '2019-11-20 09:07:00', 'insert ', 'insert serah terima barang', 'K0009'),
(475, 'ITST201911200001', '2019-11-20 09:11:47', 'delete', 'delete Serah Terima Barang', 'K0009'),
(476, 'ITST201911200001', '2019-11-20 09:13:17', 'insert ', 'insert serah terima barang', 'K0009'),
(477, 'ITST201911200001', '2019-11-20 09:13:34', 'delete', 'delete Serah Terima Barang', 'K0009'),
(478, 'ITST201911200001', '2019-11-20 09:33:43', 'insert ', 'insert serah terima barang', 'K0009'),
(479, 'ITS201911200001', '2019-11-20 10:50:51', 'insert request', 'insert request new', 'K0009'),
(480, 'ITS201911200001', '2019-11-20 10:57:43', 'insert request', 'insert request new', 'K0009'),
(481, 'K0001', '2019-11-20 11:23:23', 'update', 'update karyawan', 'K0001'),
(482, 'K0010', '2019-11-20 11:25:41', 'insert', 'insert karyawan', 'K0010'),
(483, 'K0010', '2019-11-20 12:04:02', 'update', 'update karyawan', 'K0010'),
(484, 'K0011', '2019-11-20 12:05:05', 'insert', 'insert karyawan', 'K0011'),
(485, '', '2019-11-20 12:17:40', 'insert', 'insert jabatan', 'K0009'),
(486, '8', '2019-11-20 12:17:47', 'delete', 'delete jabatan', 'K0009'),
(487, 'Manager', '2019-11-20 12:17:57', 'insert', 'insert jabatan', 'K0009'),
(488, 'K0012', '2019-11-20 12:19:32', 'insert', 'insert karyawan', 'K0012'),
(489, 'K0013', '2019-11-20 12:21:14', 'insert', 'insert karyawan', 'K0013'),
(490, 'K0013', '2019-11-20 12:21:37', 'update', 'update karyawan', 'K0009'),
(491, 'K0001', '2019-11-20 13:31:46', 'update', 'update karyawan', 'K0009'),
(492, 'K0011', '2019-11-20 13:32:18', 'update', 'update karyawan', 'K0009'),
(493, 'K0009', '2019-11-20 13:36:34', 'delete', 'delete user', 'K0009'),
(494, 'K0009', '2019-11-20 13:39:01', 'delete', 'delete user', 'K0009'),
(495, 'K0009', '2019-11-20 13:39:43', 'delete', 'delete user', 'K0009'),
(496, 'K0009', '2019-11-20 13:46:14', 'delete', 'delete user', 'K0009'),
(497, 'K0009', '2019-11-20 13:54:28', 'delete', 'delete user', 'K0009'),
(498, 'K0009', '2019-11-20 13:56:18', 'delete', 'delete user', 'K0009'),
(499, 'K0009', '2019-11-20 13:56:37', 'delete', 'delete user', 'K0009');

-- --------------------------------------------------------

--
-- Table structure for table `user`
--

CREATE TABLE IF NOT EXISTS `user` (
`id_user` int(11) NOT NULL,
  `nik` varchar(5) NOT NULL,
  `password` varchar(32) NOT NULL,
  `photo` text NOT NULL
) ENGINE=InnoDB AUTO_INCREMENT=36 DEFAULT CHARSET=latin1;

--
-- Dumping data for table `user`
--

INSERT INTO `user` (`id_user`, `nik`, `password`, `photo`) VALUES
(1, 'K0001', 'b3d519c6866fb8cfdf001e0a25bd4591', '13011.jpg'),
(32, 'K0009', 'b3d519c6866fb8cfdf001e0a25bd4591', '1332.jpg'),
(33, 'K0012', '80ec08504af83331911f5882349af59d', '1333.jpg'),
(34, 'K0013', '52a1b3a960d680acd9ca78c93345719a', '1334.jpg'),
(35, 'K0011', '7488e331b8b64e5794da3fa4eb10ad5d', '1300.jpg');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `barang`
--
ALTER TABLE `barang`
 ADD PRIMARY KEY (`id_barang`);

--
-- Indexes for table `divisi`
--
ALTER TABLE `divisi`
 ADD PRIMARY KEY (`id_divisi`);

--
-- Indexes for table `history_feedback`
--
ALTER TABLE `history_feedback`
 ADD PRIMARY KEY (`id_feedback`);

--
-- Indexes for table `informasi`
--
ALTER TABLE `informasi`
 ADD PRIMARY KEY (`id_informasi`);

--
-- Indexes for table `jabatan`
--
ALTER TABLE `jabatan`
 ADD PRIMARY KEY (`id_jabatan`);

--
-- Indexes for table `karyawan`
--
ALTER TABLE `karyawan`
 ADD PRIMARY KEY (`nik`);

--
-- Indexes for table `kondisi`
--
ALTER TABLE `kondisi`
 ADD PRIMARY KEY (`id_kondisi`);

--
-- Indexes for table `service`
--
ALTER TABLE `service`
 ADD PRIMARY KEY (`id_service`);

--
-- Indexes for table `st_barang`
--
ALTER TABLE `st_barang`
 ADD PRIMARY KEY (`id_st`);

--
-- Indexes for table `teknisi`
--
ALTER TABLE `teknisi`
 ADD PRIMARY KEY (`id_teknisi`);

--
-- Indexes for table `tracking`
--
ALTER TABLE `tracking`
 ADD PRIMARY KEY (`id_tracking`);

--
-- Indexes for table `user`
--
ALTER TABLE `user`
 ADD PRIMARY KEY (`id_user`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `divisi`
--
ALTER TABLE `divisi`
MODIFY `id_divisi` int(11) NOT NULL AUTO_INCREMENT,AUTO_INCREMENT=31;
--
-- AUTO_INCREMENT for table `history_feedback`
--
ALTER TABLE `history_feedback`
MODIFY `id_feedback` int(11) NOT NULL AUTO_INCREMENT;
--
-- AUTO_INCREMENT for table `informasi`
--
ALTER TABLE `informasi`
MODIFY `id_informasi` int(11) NOT NULL AUTO_INCREMENT,AUTO_INCREMENT=25;
--
-- AUTO_INCREMENT for table `jabatan`
--
ALTER TABLE `jabatan`
MODIFY `id_jabatan` int(11) NOT NULL AUTO_INCREMENT,AUTO_INCREMENT=10;
--
-- AUTO_INCREMENT for table `kondisi`
--
ALTER TABLE `kondisi`
MODIFY `id_kondisi` int(11) NOT NULL AUTO_INCREMENT,AUTO_INCREMENT=5;
--
-- AUTO_INCREMENT for table `tracking`
--
ALTER TABLE `tracking`
MODIFY `id_tracking` int(11) NOT NULL AUTO_INCREMENT,AUTO_INCREMENT=500;
--
-- AUTO_INCREMENT for table `user`
--
ALTER TABLE `user`
MODIFY `id_user` int(11) NOT NULL AUTO_INCREMENT,AUTO_INCREMENT=36;
/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
