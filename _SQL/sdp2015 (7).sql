-- phpMyAdmin SQL Dump
-- version 4.2.7.1
-- http://www.phpmyadmin.net
--
-- Host: 127.0.0.1
-- Generation Time: Dec 29, 2015 at 08:59 AM
-- Server version: 5.6.20
-- PHP Version: 5.5.15

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8 */;

--
-- Database: `sdp2015`
--

-- --------------------------------------------------------

--
-- Table structure for table `beasiswa`
--

CREATE TABLE IF NOT EXISTS `beasiswa` (
  `id` varchar(15) NOT NULL,
  `informasi_beasiswa_nama_beasiswa` varchar(30) NOT NULL,
  `mahasiswa_nrp` varchar(9) NOT NULL,
  `tanggal_create` date NOT NULL,
  `status` varchar(1) NOT NULL DEFAULT '1'
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Table structure for table `calon_mahasiswa`
--

CREATE TABLE IF NOT EXISTS `calon_mahasiswa` (
  `nomor_registrasi_id` varchar(6) NOT NULL,
  `email` varchar(50) NOT NULL,
  `password` varchar(20) NOT NULL,
  `nama` varchar(50) DEFAULT NULL,
  `jenis_kelamin` varchar(1) DEFAULT NULL,
  `tempat_lahir` varchar(20) DEFAULT NULL,
  `tanggal_lahir` date DEFAULT NULL,
  `kewarganegaraan` varchar(3) DEFAULT NULL,
  `status_sosial` varchar(10) DEFAULT NULL,
  `agama` varchar(10) DEFAULT NULL,
  `alamat` varchar(50) DEFAULT NULL,
  `provinsi` varchar(30) DEFAULT NULL,
  `kota` varchar(30) DEFAULT NULL,
  `kodepos` varchar(5) DEFAULT NULL,
  `nomor_hp` varchar(12) DEFAULT NULL,
  `foto` varchar(100) DEFAULT NULL,
  `rapor` varchar(100) DEFAULT NULL,
  `nilai_mat` tinyint(3) unsigned NOT NULL DEFAULT '0',
  `nilai_inggris` tinyint(3) unsigned NOT NULL DEFAULT '0',
  `nilai_rata_rata` tinyint(3) unsigned NOT NULL DEFAULT '0',
  `akte_kelahiran` varchar(100) DEFAULT NULL,
  `kartu_keluarga` varchar(100) DEFAULT NULL,
  `nama_sekolah` varchar(30) DEFAULT NULL,
  `alamat_sekolah` varchar(50) DEFAULT NULL,
  `provinsi_sekolah` varchar(30) DEFAULT NULL,
  `kota_sekolah` varchar(30) DEFAULT NULL,
  `kodepos_sekolah` varchar(6) DEFAULT NULL,
  `nomor_telp_sekolah` varchar(12) DEFAULT NULL,
  `relasi` varchar(1) DEFAULT NULL,
  `nama_wali` varchar(50) DEFAULT NULL,
  `alamat_wali` varchar(50) DEFAULT NULL,
  `provinsi_wali` varchar(30) DEFAULT NULL,
  `kota_wali` varchar(30) DEFAULT NULL,
  `kodepos_wali` varchar(6) DEFAULT NULL,
  `nomor_telp_wali` varchar(12) DEFAULT NULL,
  `pekerjaan_wali` varchar(30) DEFAULT NULL,
  `skhun` varchar(100) DEFAULT NULL,
  `ijazah` varchar(100) DEFAULT NULL,
  `informasi_kurikulum_id` varchar(8) DEFAULT NULL,
  `tanggal_create` datetime NOT NULL DEFAULT CURRENT_TIMESTAMP,
  `status` tinyint(1) NOT NULL DEFAULT '1'
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `calon_mahasiswa`
--

INSERT INTO `calon_mahasiswa` (`nomor_registrasi_id`, `email`, `password`, `nama`, `jenis_kelamin`, `tempat_lahir`, `tanggal_lahir`, `kewarganegaraan`, `status_sosial`, `agama`, `alamat`, `provinsi`, `kota`, `kodepos`, `nomor_hp`, `foto`, `rapor`, `nilai_mat`, `nilai_inggris`, `nilai_rata_rata`, `akte_kelahiran`, `kartu_keluarga`, `nama_sekolah`, `alamat_sekolah`, `provinsi_sekolah`, `kota_sekolah`, `kodepos_sekolah`, `nomor_telp_sekolah`, `relasi`, `nama_wali`, `alamat_wali`, `provinsi_wali`, `kota_wali`, `kodepos_wali`, `nomor_telp_wali`, `pekerjaan_wali`, `skhun`, `ijazah`, `informasi_kurikulum_id`, `tanggal_create`, `status`) VALUES
('13g31g', 'bagas@yhz.biz', '123456', 'Bagas Dirgantara', 'L', 'bekasi', '1995-09-03', 'WNI', 'single', 'islam', 'Jl. MH. Thamrin Kav. 105, Lippo Cikarang', 'jawa barat', 'bekasi', '61421', '08125235232', '13g31g-Foto', '13g31g-Rapor', 78, 70, 74, '13g31g-akteKelahiran', '13g31g-kartuKeluarga', 'SMA 105', 'Jl. MH. Thamrin Kav. 105, Lippo Cikarang', 'jawa barat', 'bekasi', '65121', '0215635365', 'O', 'Mohammad Fajar', 'Jl. MH. Thamrin Kav. 105, Lippo Cikarang', 'jawa barat', 'bekasi', '65111', '08785124353', 'Swasta', NULL, NULL, 'D3INF153', '2015-12-18 22:14:12', 0),
('1f11vf', 'nugroho@yhz.biz', '123456', 'Nugroho Limantara', 'L', 'surabaya', '1995-11-10', 'WNI', 'single', 'kristen', 'Jl. Dharmahusada 121, Surabaya', 'jawa timur', 'surabaya', '65888', '08123522626', '1f11vf-Foto', '1f11vf-Rapor', 81, 89, 85, '1f11vf-akteKelahiran', '1f11vf-kartuKeluarga', 'SMA 121', 'Jl. Dharmahusada 121, Surabaya', 'jawa timur', 'surabaya', '65888', '031526466', 'O', 'Setiawan Limantara', 'Jl. Dharmahusada 121, Surabaya', 'jawa timur', 'surabaya', '65888', '08722526535', 'Swasta', NULL, NULL, 'S1IND152', '2015-12-18 23:01:59', 1),
('1f1gg7', 'fajar@yhz.biz', '123456', 'Fajar Bagaskara', 'L', 'ambon', '1995-09-14', 'WNI', 'single', 'islam', 'Jl. Bubutan No. 49, Surabaya', 'jawa timur', 'surabaya', '65777', '082532353231', '1f1gg7-Foto', '1f1gg7-Rapor', 78, 90, 84, '1f1gg7-akteKelahiran', '1f1gg7-kartuKeluarga', 'SMA 49', 'Jl. Bubutan No. 49, Surabaya', 'jawa timur', 'surabaya', '65777', '0315672356', 'O', 'Bambang Triatmojo', 'Jl. Bubutan No. 49, Surabaya', 'jawa timur', 'surabaya', '65777', '087135351513', 'Swasta', NULL, NULL, 'S1DES152', '2015-12-18 23:05:20', 1),
('315135', 'khofifah@yhz.biz', '123456', 'Khofifah', 'P', 'balikpapan', '1994-10-12', 'WNI', 'single', 'islam', 'Jl. MT. Haryono No. 9, Ring Road Balikpapan', 'kalimantan timur', 'balikpapan', '65655', '08771235533', '315135-Foto', '315135-Rapor', 96, 85, 91, '315135-akteKelahiran', '315135-kartuKeluarga', 'SMA 9', 'Jl. MT. Haryono No. 9, Ring Road Balikpapan', 'kalimantan timur', 'balikpapan', '65511', '0216246444', 'O', 'Arum Sekar', 'Jl. MT. Haryono No. 9, Ring Road Balikpapan', 'kalimantan timur', 'balikpapan', '65512', '08165433222', 'Swasta', NULL, NULL, 'S1DES151', '2015-12-18 22:18:38', 1),
('3n3b3b', 'eka@yhz.biz', '123456', 'Eka Panca', 'L', 'surabaya', '1995-02-15', 'WNI', 'single', 'katolik', 'Jl. Jemursari No. 1, Surabaya', 'jawa timur', 'surabaya', '65432', '0878235236', '3n3b3b-Foto', '3n3b3b-Rapor', 95, 78, 87, '3n3b3b-akteKelahiran', '3n3b3b-kartuKeluarga', 'SMA 1', 'Jl. Jemursari No. 1, Surabaya', 'jawa timur', 'surabaya', '65342', '0317325262', 'O', 'Sri Rahayu', 'Jl. Jemursari No. 1, Surabaya', 'jawa timur', 'surabaya', '65143', '08782352626', 'Swasta', NULL, NULL, 'S1INF152', '2015-12-18 23:12:39', 1),
('514f13', 'ayu@yhz.biz', '123456', 'Ayu Diah Sari', 'P', 'surabaya', '1995-08-17', 'WNI', 'single', 'islam', 'Jl. Kapas Krampung 220/1, Surabaya', 'jawa timur', 'surabaya', '65611', '0812342322', '514f13-Foto', '514f13-Rapor', 95, 90, 93, '514f13-akteKelahiran', '514f13-kartuKeluarga', 'SMA 220', 'Jl. Kapas Krampung 220/1, Surabaya', 'jawa timur', 'surabaya', '65113', '0317533566', 'O', 'Saraswati', 'Jl. Kapas Krampung 220/1, Surabaya', 'jawa timur', 'surabaya', '65113', '0813132353', 'Swasta', NULL, NULL, 'S1INF151', '2015-12-18 22:22:41', 1),
('adf312', 'andre@yhg.biz', '123456', 'Aditya Warman', 'L', 'bandung', '1995-02-17', 'WNI', 'single', 'kristen', 'Jl. Marga Asih No. 162 Bandung', 'jawa barat', 'bandung', '65563', '08155290322', 'adf312-Foto', 'adf312-Rapor', 77, 75, 76, 'adf312-akteKelahiran', 'adf312-kartuKeluarga', 'SMA John De Britto', 'Jl. Marga Asih No. 162 Bandung', 'jawa barat', 'bandung', '65525', '0227775544', 'O', 'Agung Baskoro', 'Jl. Marga Asih No. 162 Bandung', 'jawa barat', 'bandung', '65563', '08193844423', 'Swasta', NULL, NULL, 'D3INF153', '2015-12-18 20:30:46', 0),
('asd125', 'budi@yhz.biz', '123456', 'Budi Sentosa', 'L', 'surabaya', '1995-10-25', 'WNI', 'single', 'kristen', 'Jl. Raya Mulyosari No. 99B, Surabaya', 'jawa timur', 'surabaya', '65111', '08153252623', 'asd125-Foto', 'asd125-Rapor', 90, 92, 91, 'asd125-akteKelahiran', 'asd125-kartuKeluarga', 'SMA 99', 'Jl. Raya Mulyosari No. 99B, Surabaya', 'jawa timur', 'surabaya', '65111', '0317535313', 'O', 'Eka Kristian', 'Jl. Raya Mulyosari No. 99B, Surabaya', 'jawa timur', 'surabaya', '65111', '08781523534', 'Swasta', NULL, NULL, 'S1INF151', '2015-12-18 22:28:18', 1),
('asdqwe', 'aji@yhz.biz', '123456', 'Aji Mumpung', 'L', 'bandung', '1995-10-17', 'WNI', 'single', 'kristen', 'Jl. Sarimanah No. 23, Sarijadi, Bandung', 'jawa barat', 'bandung', '61434', '08785552312', 'asdqwe-Foto', 'asdqwe-Rapor', 78, 88, 83, 'asdqwe-akteKelahiran', 'asdqwe-kartuKeluarga', 'SMA 23', 'Jl. Sarimanah No. 23, Sarijadi, Bandung', 'jawa barat', 'bandung', '65555', '0225452345', 'O', 'Budi Sentosa', 'Jl. Sarimanah No. 23, Sarijadi, Bandung', 'jawa barat', 'bandung', '61434', '08134544324', 'Swasta', NULL, NULL, 'S1DKV152', '2015-12-18 21:51:16', 0),
('b2222f', 'rey@yhz.biz', '123456', 'Reynalno Wijaya', 'L', 'surabaya', '1994-12-28', 'WNI', 'single', 'budha', 'Jl. Nyamplungan No. 133, Surabaya', 'jawa timur', 'surabaya', '65236', '0878235626', 'b2222f-Foto', 'b2222f-Rapor', 85, 80, 83, 'b2222f-akteKelahiran', 'b2222f-kartuKeluarga', 'SMA St. Louis', 'Jl. Nyamplungan No. 133, Surabaya', 'jawa timur', 'surabaya', '67677', '0317531356', 'O', 'Bernard Santoso', 'Jl. Nyamplungan No. 133, Surabaya', 'jawa timur', 'surabaya', '67777', '0815325325', 'Swasta', NULL, NULL, 'S1INF152', '2015-12-18 23:15:48', 1),
('bxvtr7', 'sari@yhz.biz', '123456', 'Sari Ayu', 'P', 'bekasi', '1995-09-08', 'WNI', 'single', 'islam', 'Jl. Jenderal Ahmad Yani Bekasi', 'jawa barat', 'bekasi', '68888', '0815262626', 'bxvtr7-Foto', 'bxvtr7-Rapor', 75, 79, 77, 'bxvtr7-akteKelahiran', 'bxvtr7-kartuKeluarga', 'SMA 101', 'Jl. Jenderal Ahmad Yani Bekasi', 'jawa barat', 'bekasi', '68888', '0215623662', 'O', 'Susi Astuti', 'Jl. Jenderal Ahmad Yani Bekasi', 'jawa barat', 'bekasi', '68888', '08113525323', 'Swasta', NULL, NULL, 'S1DKV151', '2015-12-18 23:19:53', 1),
('f311g3', 'bayu@yhz.biz', '123456', 'Bayu Shodiq', 'L', 'bekasi', '1995-09-25', 'WNI', 'single', 'islam', 'Jalan Mekar Sari No.1 Bekasi', 'jawa barat', 'bekasi', '64122', '08783523566', 'f311g3-Foto', 'f311g3-Rapor', 78, 80, 79, 'f311g3-akteKelahiran', 'f311g3-kartuKeluarga', 'SMA 11', 'Jalan Mekar Sari No.1 Bekasi', 'jawa barat', 'bekasi', '64124', '0215363412', 'O', 'Adi Firmansyah', 'Jalan Mekar Sari No.1 Bekasi', 'jawa barat', 'bekasi', '61412', '0877143532', 'Swasta', NULL, NULL, 'D3INF151', '2015-12-18 23:24:46', 1),
('f322y4', 'david@yhz.biz', '123456', 'David Dharma', 'L', 'malang', '1995-02-22', 'WNI', 'single', 'budha', 'Jl. Raya Tidar 100 Malang', 'jawa timur', 'malang', '67890', '0871523526', 'f322y4-Foto', 'f322y4-Rapor', 85, 78, 82, 'f322y4-akteKelahiran', 'f322y4-kartuKeluarga', 'SMA 100', 'Jl. Raya Tidar 100 Malang', 'jawa timur', 'malang', '61432', '0315325265', 'O', 'Viktor', 'Jl. Raya Tidar 100 Malang', 'jawa timur', 'malang', '61432', '08982352626', 'Swasta', NULL, NULL, 'S1INF150', '2015-12-18 23:28:02', 1),
('gg3rfd', 'novi@yhz.biz', '123456', 'Novi Mutiara', 'P', 'bandung', '1994-07-27', 'WNI', 'single', 'islam', 'Jl. Ters Jakarta No. 37, Bandung', 'jawa barat', 'bandung', '65123', '087878787555', 'gg3rfd-Foto', 'gg3rfd-Rapor', 95, 89, 92, 'gg3rfd-akteKelahiran', 'gg3rfd-kartuKeluarga', 'SMA 37', 'Jl. Ters Jakarta No. 37, Bandung', 'jawa barat', 'bandung', '65525', '0227775245', 'O', 'Abdul Rahman', 'Jl. Ters Jakarta No. 37, Bandung', 'jawa barat', 'bandung', '65525', '0813352356', 'Swasta', NULL, NULL, 'S1SIB151', '2015-12-18 21:55:57', 0),
('j45j44', 'diah@yhz.biz', '123456', 'Diah Pitaloka', 'P', 'ambon', '1994-03-23', 'WNI', 'single', 'islam', 'Jl. Terusan Wiriaga Blok G No. 5-6 Bunulrejo Malan', 'jawa timur', 'malang', '65551', '0899235266', 'j45j44-Foto', 'j45j44-Rapor', 98, 95, 97, 'j45j44-akteKelahiran', 'j45j44-kartuKeluarga', 'SMA 56', 'Jl. Terusan Wiriaga Blok G No. 5-6 Perum Ngujil Pe', 'jawa timur', 'malang', '65141', '0316252623', 'O', 'Eni Setiowati', 'Jl. Terusan Wiriaga Blok G No. 5-6 Bunulrejo Malan', 'jawa timur', 'malang', '61432', '0898452633', 'Swasta', NULL, NULL, 'S1DKV153', '2015-12-18 23:34:20', 1),
('k6464f', 'indah@yhz.biz', '123456', 'Indah Permata Intan', 'P', 'malang', '1994-08-26', 'WNI', 'single', 'kristen', 'Jl. Aries Munandar No. 41-45, Malang', 'jawa timur', 'malang', '67883', '08781535236', 'k6464f-Foto', 'k6464f-Rapor', 90, 75, 83, 'k6464f-akteKelahiran', 'k6464f-kartuKeluarga', 'SMA 41', 'Jl. Aries Munandar No. 41-45, Malang', 'jawa timur', 'malang', '65134', '0316426423', 'O', 'Abraham Andika', 'Jl. Aries Munandar No. 41-45, Malang', 'jawa timur', 'malang', '61432', '0899262462', 'Swasta', NULL, NULL, 'D3INF152', '2015-12-18 23:38:49', 1),
('n4h3ff', 'ika@yhz.biz', '123456', 'Ika Asih', 'P', 'malang', '1995-11-29', 'WNI', 'single', 'islam', ' Master Malang, Jl. Trunojoyo No.23, Malang', 'jawa timur', 'malang', '61231', '08776543212', 'n4h3ff-Foto', 'n4h3ff-Rapor', 85, 80, 83, 'n4h3ff-akteKelahiran', 'n4h3ff-kartuKeluarga', 'SMA Santo Joseph', ' Master Malang, Jl. Trunojoyo No.23, Malang', 'jawa timur', 'malang', '65123', '0227532424', 'O', 'Heni', ' Master Malang, Jl. Trunojoyo No.23, Malang', 'jawa timur', 'malang', '61234', '087877886543', 'Swasta', NULL, NULL, 'S1INF152', '2015-12-18 22:00:03', 0),
('qwe321', 'evan@yhz.biz', '123456', 'Evan Sugiarto', 'L', 'jakarta barat', '1995-03-15', 'WNI', 'single', 'katolik', 'Jl. Siloam No. 6, Lippo Karawaci 1600', 'banten', 'tangerang', '67777', '08781253252', 'qwe321-Foto', 'qwe321-Rapor', 89, 90, 90, 'qwe321-akteKelahiran', 'qwe321-kartuKeluarga', 'SMA Kompas', 'Jl. Siloam No. 6, Lippo Karawaci 1600', 'banten', 'tangerang', '65143', '0215564234', 'O', 'Ali Surya', 'Jl. Siloam No. 6, Lippo Karawaci 1600', 'banten', 'tangerang', '65133', '08155235244', 'Swasta', NULL, NULL, 'S1INF151', '2015-12-18 22:06:11', 1),
('wdf31', 'sarahmita@yhz.biz', '123456', 'Sarahmita Dewi', 'P', 'surabaya', '1995-08-30', 'WNI', 'single', 'islam', 'Jl. Bukit Darmo Boulevard No. 8F, Sby', 'jawa timur', 'surabaya', '65999', '08715532626', 'wdf31-Foto', 'wdf31-Rapor', 91, 89, 90, 'wdf31-akteKelahiran', 'wdf31-kartuKeluarga', 'SMA 8', 'Jl. Bukit Darmo Boulevard No. 8F, Sby', 'jawa timur', 'surabaya', '65999', '0315266443', 'O', 'Dewi Sinta', 'Jl. Bukit Darmo Boulevard No. 8F, Sby', 'jawa timur', 'surabaya', '65999', '08153252664', 'Swasta', NULL, NULL, 'S1DKV151', '2015-12-18 22:31:44', 1),
('zxc241', 'sugiarto@yhz.biz', '123456', 'Sugiarto Budiman', 'L', 'surabaya', '1995-10-24', 'WNI', 'single', 'kristen', 'Jl. Jemursari 205/A-05, Surabaya', 'jawa timur', 'surabaya', '65112', '0815235226', 'zxc241-Foto', 'zxc241-Rapor', 78, 88, 83, 'zxc241-akteKelahiran', 'zxc241-kartuKeluarga', 'SMA 205', 'Jl. Jemursari 205/A-05, Surabaya', 'jawa timur', 'surabaya', '65112', '0317512633', 'O', 'Heru Cahya', 'Jl. Jemursari 205/A-05, Surabaya', 'jawa timur', 'surabaya', '65112', '08152352624', 'Swasta', NULL, NULL, 'S1DES152', '2015-12-18 22:41:57', 1);

-- --------------------------------------------------------

--
-- Table structure for table `data_umum`
--

CREATE TABLE IF NOT EXISTS `data_umum` (
  `index` varchar(50) NOT NULL,
  `value` text NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `data_umum`
--

INSERT INTO `data_umum` (`index`, `value`) VALUES
('tahun_ajaran_sekarang', 'GASAL 2015/2016');

-- --------------------------------------------------------

--
-- Table structure for table `dispensasi`
--

CREATE TABLE IF NOT EXISTS `dispensasi` (
  `id` varchar(15) NOT NULL,
  `nama_dispensasi` varchar(30) NOT NULL,
  `periode_cicilan` tinyint(3) unsigned NOT NULL,
  `tanggal_batas` date NOT NULL,
  `calon_mahasiswa_nomor_registrasi` varchar(6) DEFAULT NULL,
  `mahasiswa_nrp` varchar(9) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Table structure for table `dkeuangan`
--

CREATE TABLE IF NOT EXISTS `dkeuangan` (
  `id` varchar(17) NOT NULL,
  `jumlah` int(11) NOT NULL,
  `tanggal_batas` date NOT NULL,
  `tanggal_created` date NOT NULL,
  `status` varchar(1) NOT NULL DEFAULT '1'
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `dkeuangan`
--

INSERT INTO `dkeuangan` (`id`, `jumlah`, `tanggal_batas`, `tanggal_created`, `status`) VALUES
('USP2015122000000', 7000000, '2016-01-20', '2015-12-20', '0'),
('USP2015122000010', 8500000, '2016-01-20', '2015-12-20', '0'),
('USP2015122000020', 10000000, '2016-01-20', '2015-12-20', '0'),
('USP2015122000030', 10000000, '2016-01-20', '2015-12-20', '0'),
('USP2015122000040', 8500000, '2016-01-20', '2015-12-20', '0'),
('USP2015122000050', 10500000, '2016-01-20', '2015-12-20', '1'),
('USP2015122000060', 10500000, '2016-01-20', '2015-12-20', '1'),
('USP2015122000070', 9000000, '2016-01-20', '2015-12-20', '1'),
('USP2015122000080', 9000000, '2016-01-20', '2015-12-20', '1'),
('USP2015122000090', 10500000, '2016-01-20', '2015-12-20', '1'),
('USP2015122000100', 12000000, '2016-01-20', '2015-12-20', '1'),
('USP2015122000110', 9000000, '2016-01-20', '2015-12-20', '1'),
('USP2015122000120', 11000000, '2016-01-20', '2015-12-20', '1'),
('USP2015122000130', 11000000, '2016-01-20', '2015-12-20', '1'),
('USP2015122000140', 11000000, '2016-01-20', '2015-12-20', '1'),
('USP2015122000150', 13500000, '2016-01-20', '2015-12-20', '1'),
('USP2015122000160', 13500000, '2016-01-20', '2015-12-20', '1'),
('USP2015122000170', 13500000, '2016-01-20', '2015-12-20', '1'),
('USP2015122000180', 10500000, '2016-01-20', '2015-12-20', '1');

-- --------------------------------------------------------

--
-- Table structure for table `dosen`
--

CREATE TABLE IF NOT EXISTS `dosen` (
  `nip` varchar(10) NOT NULL,
  `nama` varchar(100) NOT NULL,
  `tempat_lahir` varchar(20) NOT NULL,
  `tanggal_lahir` date NOT NULL,
  `agama` varchar(10) NOT NULL,
  `alamat` varchar(50) NOT NULL,
  `kota` varchar(50) NOT NULL,
  `provinsi` varchar(50) NOT NULL,
  `nomor_telepon` varchar(12) DEFAULT NULL,
  `jenis_kelamin` varchar(1) NOT NULL,
  `email` varchar(50) NOT NULL,
  `kepala_jurusan_id` varchar(8) DEFAULT NULL COMMENT 'mereference pada informasi_kurikulum_id ke 0 (belakangnya)',
  `jumlah_sks_mengajar` int(10) unsigned NOT NULL DEFAULT '0',
  `status_dosen` varchar(1) NOT NULL DEFAULT '1'
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `dosen`
--

INSERT INTO `dosen` (`nip`, `nama`, `tempat_lahir`, `tanggal_lahir`, `agama`, `alamat`, `kota`, `provinsi`, `nomor_telepon`, `jenis_kelamin`, `email`, `kepala_jurusan_id`, `jumlah_sks_mengajar`, `status_dosen`) VALUES
('DO001', 'Ferdinandus F.X.', 'Surabaya', '1965-12-29', 'Kristen', 'Jalan.Ngagel Jaya 23', 'Surabaya', 'Jawa timur', '08155332423', 'L', 'ferdi@stt.edu', NULL, 0, '1'),
('DO002', 'Jaya Pranata,S.Kom', 'Jakarta', '1985-12-02', 'Budha', 'Jalan.Perak 344', 'surabaya', 'jawa timur', '087859038021', 'L', 'jaya@gmail.com', NULL, 0, '1'),
('DO003', 'Jenny Ngo.Dr., M.Sc.Ed', 'Munchen', '1988-12-01', 'Kristen', 'Jalan.T.Hos', 'Surabaya', 'Jawa Timur', '081131877878', 'P', 'jennyngo@gmail.com', NULL, 0, '1'),
('DO004', 'Edwin Pramana,Ir., M.AppSc.', 'Surabay', '1962-12-01', 'Kristen', 'Jalan Darmo Besar', 'Surabaya', 'Jawa Timur', '0384752132', '', 'edwin@stts.edu', 'S1INF150', 0, '1'),
('DO005', 'Eka Rahayu Setyaningsih ,S.Kom., M.Kom.', '', '0000-00-00', '', '', '', '', '0317673023', '', 'eka@gmail.com', NULL, 0, '1'),
('DO006', 'Arya Tandy Hermawan,Ir., M.T.', '', '0000-00-00', '', '', '', '', '038539283', '', 'arya@stts.edu', NULL, 0, '1');

-- --------------------------------------------------------

--
-- Table structure for table `drevisi_penilaian`
--

CREATE TABLE IF NOT EXISTS `drevisi_penilaian` (
  `id` varchar(10) NOT NULL,
  `hrevisi_penilaian_id` varchar(9) NOT NULL,
  `mahasiswa_nrp` varchar(9) NOT NULL,
  `nilai_akhir_sebelum` tinyint(3) unsigned NOT NULL,
  `nilai_akhir_sesudah` tinyint(3) unsigned NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Stand-in structure for view `getgrade`
--
CREATE TABLE IF NOT EXISTS `getgrade` (
`mahasiswa_nrp` varchar(9)
,`nama` varchar(50)
,`nilai_grade` varchar(2)
);
-- --------------------------------------------------------

--
-- Table structure for table `hkeuangan`
--

CREATE TABLE IF NOT EXISTS `hkeuangan` (
  `id` varchar(15) NOT NULL,
  `user_id` varchar(9) NOT NULL,
  `jumlah` int(11) NOT NULL,
  `tanggal_created` date NOT NULL,
  `tanggal_batas` date NOT NULL,
  `tanggal_bayar` date DEFAULT NULL,
  `semester` varchar(1) NOT NULL,
  `periode` varchar(1) NOT NULL,
  `status` varchar(1) NOT NULL DEFAULT '1'
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `hkeuangan`
--

INSERT INTO `hkeuangan` (`id`, `user_id`, `jumlah`, `tanggal_created`, `tanggal_batas`, `tanggal_bayar`, `semester`, `periode`, `status`) VALUES
('SPP0001', '215116001', 3398000, '2013-06-01', '2013-08-10', '2013-08-07', '1', '1', '1'),
('SPP0002', '215116001', 3398000, '2013-06-01', '2013-10-10', '2013-10-03', '1', '2', '1'),
('SPP0003', '215116001', 3398000, '2013-06-01', '2013-12-10', '2013-12-07', '1', '3', '1'),
('SPP0004', '215116001', 3398000, '2014-01-01', '2014-02-10', '2014-02-08', '2', '1', '1'),
('SPP0005', '215116001', 3398000, '2014-01-01', '2014-04-10', '2014-04-02', '2', '2', '1'),
('SPP0006', '215116001', 4268000, '2014-01-01', '2014-06-10', '2014-06-04', '2', '3', '1'),
('SPP0007', '215116001', 3398000, '2014-06-01', '2014-08-10', '2014-08-03', '3', '1', '1'),
('SPP0008', '215116001', 3398000, '2014-06-01', '2014-10-10', '2014-10-09', '3', '2', '1'),
('SPP0009', '215116001', 4268000, '2014-06-01', '2014-12-10', '2014-12-04', '3', '3', '1'),
('SPP0010', '215116001', 3398000, '2015-01-01', '2015-02-10', '2015-02-06', '4', '1', '1'),
('SPP0011', '215116001', 3398000, '2015-01-01', '2015-04-10', '2015-04-09', '4', '2', '1'),
('SPP0012', '215116001', 3398000, '2015-01-01', '2015-06-10', '2015-06-08', '4', '3', '1'),
('SPP0013', '215116001', 3398000, '2015-06-01', '2015-08-10', '2015-08-05', '5', '1', '1'),
('SPP0014', '215116001', 3398000, '2015-06-01', '2015-10-10', '2015-10-07', '5', '2', '1'),
('SPP0015', '215116001', 5573000, '2015-06-01', '2015-12-10', NULL, '5', '3', '0'),
('SPP0016', '215116002', 3398000, '2015-06-01', '2015-08-10', '2015-08-09', '1', '1', '1'),
('SPP0017', '215116002', 3398000, '2015-06-01', '2015-10-10', '2015-10-02', '1', '2', '1'),
('SPP0018', '215116002', 3398000, '2015-06-01', '2015-12-10', NULL, '1', '3', '0'),
('USP0001', '215116001', 4000000, '2013-06-01', '2013-08-31', '2013-07-25', '1', '1', '1'),
('USP0002', '215116002', 10000000, '2015-06-01', '2015-08-31', '2015-07-14', '1', '1', '1'),
('USP201512200000', 'adf312', 7000000, '2015-12-20', '0000-00-00', '0000-00-00', '', '', '0'),
('USP201512200001', 'asdqwe', 8500000, '2015-12-20', '0000-00-00', '0000-00-00', '', '', '0'),
('USP201512200002', 'gg3rfd', 10000000, '2015-12-20', '0000-00-00', '0000-00-00', '', '', '0'),
('USP201512200003', 'n4h3ff', 10000000, '2015-12-20', '0000-00-00', '0000-00-00', '', '', '0'),
('USP201512200004', '13g31g', 8500000, '2015-12-20', '0000-00-00', '0000-00-00', '', '', '0'),
('USP201512200005', '315135', 10500000, '2015-12-20', '0000-00-00', '0000-00-00', '', '', '1'),
('USP201512200006', '514f13', 10500000, '2015-12-20', '0000-00-00', '0000-00-00', '', '', '1'),
('USP201512200007', 'asd125', 9000000, '2015-12-20', '0000-00-00', '0000-00-00', '', '', '1'),
('USP201512200008', 'qwe321', 9000000, '2015-12-20', '0000-00-00', '0000-00-00', '', '', '1'),
('USP201512200009', '1f1gg7', 10500000, '2015-12-20', '0000-00-00', '0000-00-00', '', '', '1'),
('USP201512200010', 'zxc241', 12000000, '2015-12-20', '0000-00-00', '0000-00-00', '', '', '1'),
('USP201512200011', 'wdf31', 9000000, '2015-12-20', '0000-00-00', '0000-00-00', '', '', '1'),
('USP201512200012', '1f11vf', 11000000, '2015-12-20', '0000-00-00', '0000-00-00', '', '', '1'),
('USP201512200013', '3n3b3b', 11000000, '2015-12-20', '0000-00-00', '0000-00-00', '', '', '1'),
('USP201512200014', 'f311g3', 11000000, '2015-12-20', '0000-00-00', '0000-00-00', '', '', '1'),
('USP201512200015', 'k6464f', 13500000, '2015-12-20', '0000-00-00', '0000-00-00', '', '', '1'),
('USP201512200016', 'bxvtr7', 13500000, '2015-12-20', '0000-00-00', '0000-00-00', '', '', '1'),
('USP201512200017', 'j45j44', 13500000, '2015-12-20', '0000-00-00', '0000-00-00', '', '', '1'),
('USP201512200018', 'b2222f', 10500000, '2015-12-20', '0000-00-00', '0000-00-00', '', '', '1');

-- --------------------------------------------------------

--
-- Table structure for table `hrevisi_penilaian`
--

CREATE TABLE IF NOT EXISTS `hrevisi_penilaian` (
  `id` varchar(9) NOT NULL,
  `kelas_id` varchar(6) NOT NULL,
  `catatan` text,
  `status_revisi` tinyint(1) NOT NULL,
  `tanggal_create` datetime NOT NULL DEFAULT CURRENT_TIMESTAMP
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Table structure for table `informasi_beasiswa`
--

CREATE TABLE IF NOT EXISTS `informasi_beasiswa` (
  `id` varchar(20) NOT NULL,
  `nama_beasiswa` varchar(30) NOT NULL,
  `aspek_dipotong` varchar(10) NOT NULL,
  `berapa_dipotong` tinyint(3) unsigned NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Table structure for table `informasi_kurikulum`
--

CREATE TABLE IF NOT EXISTS `informasi_kurikulum` (
  `id` varchar(8) NOT NULL,
  `jurusan` varchar(30) NOT NULL,
  `tahun_angkatan` varchar(9) NOT NULL,
  `kategori` tinyint(4) NOT NULL,
  `harga_usp` bigint(8) unsigned NOT NULL,
  `harga_spp` mediumint(8) unsigned NOT NULL,
  `harga_sks` mediumint(8) unsigned NOT NULL,
  `sks` tinyint(3) unsigned NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `informasi_kurikulum`
--

INSERT INTO `informasi_kurikulum` (`id`, `jurusan`, `tahun_angkatan`, `kategori`, `harga_usp`, `harga_spp`, `harga_sks`, `sks`) VALUES
('D3INF150', 'D3-Informatika', '2015/2016', 0, 0, 0, 0, 88),
('D3INF151', 'D3-Informatika', '2015/2016', 1, 7000000, 200000, 250000, 88),
('D3INF152', 'D3-Informatika', '2015/2016', 2, 8500000, 200000, 250000, 88),
('D3INF153', 'D3-Informatika', '2015/2016', 3, 10000000, 200000, 250000, 88),
('S1DES150', 'S1-Desain Produk', '2015/2016', 0, 0, 0, 0, 144),
('S1DES151', 'S1-Desain Produk', '2015/2016', 1, 8500000, 225000, 225000, 144),
('S1DES152', 'S1-Desain Produk', '2015/2016', 2, 10500000, 225000, 225000, 144),
('S1DES153', 'S1-Desain Produk', '2015/2016', 3, 12000000, 225000, 225000, 144),
('S1DKV150', 'S1-Desain Komunikasi Visual', '2015/2016', 0, 0, 0, 0, 144),
('S1DKV151', 'S1-Desain Komunikasi Visual', '2015/2016', 1, 9000000, 200000, 250000, 144),
('S1DKV152', 'S1-Desain Komunikasi Visual', '2015/2016', 2, 10500000, 200000, 250000, 144),
('S1DKV153', 'S1-Desain Komunikasi Visual', '2015/2016', 3, 12000000, 200000, 250000, 144),
('S1IND150', 'S1-Industri', '2015/2016', 0, 0, 0, 0, 144),
('S1IND151', 'S1-Industri', '2015/2016', 1, 7500000, 225000, 250000, 144),
('S1IND152', 'S1-Industri', '2015/2016', 2, 9000000, 225000, 250000, 144),
('S1IND153', 'S1-Industri', '2015/2016', 3, 10500000, 225000, 250000, 144),
('S1INF150', 'S1-Informatika', '2015/2016', 0, 0, 0, 0, 144),
('S1INF151', 'S1-Informatika', '2015/2016', 1, 11000000, 300000, 325000, 144),
('S1INF152', 'S1-Informatika', '2015/2016', 2, 13500000, 300000, 325000, 144),
('S1INF153', 'S1-Informatika', '2015/2016', 3, 16000000, 300000, 325000, 144),
('S1SIB150', 'S1-Sistem Informasi Bisnis', '2015/2016', 0, 0, 0, 0, 144),
('S1SIB151', 'S1-Sistem Informasi Bisnis', '2015/2016', 1, 10500000, 250000, 275000, 144),
('S1SIB152', 'S1-Sistem Informasi Bisnis', '2015/2016', 2, 12500000, 250000, 275000, 144),
('S1SIB153', 'S1-Sistem Informasi Bisnis', '2015/2016', 3, 14500000, 250000, 275000, 144);

-- --------------------------------------------------------

--
-- Table structure for table `karyawan`
--

CREATE TABLE IF NOT EXISTS `karyawan` (
  `id` varchar(9) NOT NULL,
  `nama` varchar(50) NOT NULL,
  `jabatan` varchar(50) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Table structure for table `kelas`
--

CREATE TABLE IF NOT EXISTS `kelas` (
  `id` varchar(9) NOT NULL,
  `nama` varchar(1) NOT NULL DEFAULT '-',
  `mata_kuliah_id` varchar(6) NOT NULL,
  `ruangan_id` varchar(5) DEFAULT NULL,
  `dosen_nip` varchar(11) DEFAULT NULL,
  `hari` varchar(1) DEFAULT NULL,
  `jam_mulai` time DEFAULT NULL,
  `persentase_uts` tinyint(3) unsigned NOT NULL DEFAULT '30',
  `persentase_uas` tinyint(3) unsigned NOT NULL DEFAULT '30',
  `persentase_tugas` tinyint(3) unsigned NOT NULL DEFAULT '40',
  `tambahan_grade` tinyint(3) unsigned NOT NULL DEFAULT '0',
  `status_konfirmasi` tinyint(1) unsigned NOT NULL DEFAULT '0',
  `komentar_kajur` text NOT NULL,
  `kelas_id` varchar(6) DEFAULT NULL COMMENT 'buat_gabung kelas',
  `jumlah_mahasiswa` int(3) unsigned NOT NULL,
  `tahun_ajaran` varchar(20) NOT NULL,
  `tanggal_create` datetime NOT NULL DEFAULT CURRENT_TIMESTAMP,
  `tanggal_update` datetime NOT NULL DEFAULT CURRENT_TIMESTAMP,
  `status` tinyint(1) DEFAULT '1'
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `kelas`
--

INSERT INTO `kelas` (`id`, `nama`, `mata_kuliah_id`, `ruangan_id`, `dosen_nip`, `hari`, `jam_mulai`, `persentase_uts`, `persentase_uas`, `persentase_tugas`, `tambahan_grade`, `status_konfirmasi`, `komentar_kajur`, `kelas_id`, `jumlah_mahasiswa`, `tahun_ajaran`, `tanggal_create`, `tanggal_update`, `status`) VALUES
('141MK001A', 'A', 'MK001', 'R0003', 'DO001', '1', '08:00:00', 30, 30, 40, 10, 3, '', NULL, 0, 'GASAL 2014/2015', '2015-11-12 21:56:10', '2015-12-08 20:40:59', 1),
('141MK001B', 'B', 'MK001', 'R0004', 'DO002', '1', '08:30:00', 30, 30, 40, 0, 0, '', NULL, 0, 'GASAL 2014/2015', '2015-11-12 21:56:58', '2015-11-12 21:56:58', 1),
('141MK002A', 'B', 'MK002', 'R0004', 'DO002', '1', '08:30:00', 30, 30, 40, 0, 0, '', NULL, 0, 'GASAL 2014/2015', '2015-11-12 21:56:58', '2015-11-12 21:56:58', 1),
('141MK003A', 'A', 'MK003', 'R0008', 'DO003', '2', '13:00:00', 30, 30, 40, 0, 0, '', NULL, 0, 'GASAL 2014/2015', '2015-11-12 21:57:39', '2015-11-12 21:57:39', 1),
('141MK003B', 'B', 'MK003', 'R0006', 'DO001', '3', '13:00:00', 30, 30, 40, 20, 0, '', NULL, 0, 'GASAL 2014/2015', '2015-11-12 21:57:39', '2015-11-29 23:22:36', 1),
('141MK004A', 'A', 'MK004', 'R0006', 'DO001', '3', '13:00:00', 30, 30, 40, 20, 0, '', NULL, 0, 'GASAL 2014/2015', '2015-11-12 21:57:39', '2015-11-29 23:22:36', 1),
('141MK005A', 'A', 'MK005', 'R0004', 'DO001', '4', '15:30:00', 30, 30, 40, 0, 2, '', NULL, 0, 'GASAL 2014/2015', '2015-11-12 21:58:53', '2015-11-29 23:12:45', 1),
('141MK005B', 'B', 'MK005', 'R0003', 'DO002', '4', '08:00:00', 30, 30, 40, 0, 0, '', NULL, 0, 'GASAL 2014/2015', '2015-11-12 21:58:53', '2015-11-12 21:58:53', 1),
('141MK006A', 'A', 'MK006', 'R0003', 'DO002', '4', '08:00:00', 30, 30, 40, 0, 0, '', NULL, 0, 'GASAL 2014/2015', '2015-11-12 21:58:53', '2015-11-12 21:58:53', 1),
('141MK014A', 'A', 'MK014', 'R0003', 'DO002', '4', '08:00:00', 30, 30, 40, 0, 0, '', NULL, 0, 'GASAL 2014/2015', '2015-11-12 21:58:53', '2015-11-12 21:58:53', 1),
('141MK015A', 'A', 'MK015', 'R0003', 'DO002', '4', '08:00:00', 30, 30, 40, 0, 0, '', NULL, 0, 'GASAL 2014/2015', '2015-11-12 21:58:53', '2015-11-12 21:58:53', 1),
('141MK016A', 'A', 'MK016', 'R0003', 'DO002', '4', '08:00:00', 30, 30, 40, 0, 0, '', NULL, 0, 'GASAL 2014/2015', '2015-11-12 21:58:53', '2015-11-12 21:58:53', 1),
('141MK017A', 'A', 'MK017', 'R0003', 'DO002', '4', '08:00:00', 30, 30, 40, 0, 0, '', NULL, 0, 'GASAL 2014/2015', '2015-11-12 21:58:53', '2015-11-12 21:58:53', 1),
('141MK018A', 'A', 'MK018', 'R0003', 'DO002', '4', '08:00:00', 30, 30, 40, 0, 0, '', NULL, 0, 'GASAL 2014/2015', '2015-11-12 21:58:53', '2015-11-12 21:58:53', 1),
('141MK019A', 'A', 'MK019', 'R0003', 'DO002', '4', '08:00:00', 30, 30, 40, 0, 0, '', NULL, 0, 'GASAL 2014/2015', '2015-11-12 21:58:53', '2015-11-12 21:58:53', 1),
('141MK020A', 'A', 'MK020', 'R0003', 'DO002', '4', '08:00:00', 30, 30, 40, 0, 0, '', NULL, 0, 'GASAL 2014/2015', '2015-11-12 21:58:53', '2015-11-12 21:58:53', 1),
('141MK021A', 'A', 'MK021', 'R0003', 'DO002', '4', '08:00:00', 30, 30, 40, 0, 0, '', NULL, 0, 'GASAL 2014/2015', '2015-11-12 21:58:53', '2015-11-12 21:58:53', 1),
('141MK037A', 'A', 'MK037', 'R0009', 'DO003', '3', '15:30:00', 20, 30, 50, 10, 1, '', NULL, 0, 'GASAL 2014/2015', '2015-12-13 16:36:18', '2015-12-13 16:36:18', 1),
('141MK038A', 'A', 'MK038', 'R0001', 'DO004', '4', '18:00:00', 30, 20, 50, 15, 2, '', NULL, 0, 'GASAL 2014/2015', '2015-12-13 16:36:18', '2015-12-13 16:36:18', 1),
('141MK039A', 'A', 'MK039', 'R0002', 'DO001', '5', '08:00:00', 20, 30, 50, 0, 3, '', NULL, 0, 'GASAL 2014/2015', '2015-12-13 16:36:18', '2015-12-13 16:36:18', 1),
('150MK007A', 'A', 'MK007', 'R0007', 'DO003', '2', '10:30:00', 30, 30, 40, 0, 0, '', NULL, 0, 'GENAP 2014/2015', '2015-11-12 21:59:24', '2015-11-12 21:59:24', 1),
('150MK007B', 'B', 'MK007', 'R0006', 'DO002', '2', '10:30:00', 30, 30, 40, 0, 0, '', NULL, 0, 'GENAP 2014/2015', '2015-11-12 21:59:24', '2015-11-12 21:59:24', 1),
('150MK009A', 'A', 'MK009', 'R0004', 'DO004', '2', '10:30:00', 30, 30, 40, 0, 0, '', NULL, 0, 'GENAP 2014/2015', '2015-11-12 21:59:56', '2015-11-12 21:59:56', 1),
('150MK009B', 'B', 'MK009', 'R0001', 'DO004', '3', '10:30:00', 30, 30, 40, 0, 0, '', NULL, 0, 'GENAP 2014/2015', '2015-11-12 21:59:56', '2015-11-12 21:59:56', 1),
('150MK011A', 'A', 'MK011', 'R0009', 'DO002', '4', '13:00:00', 30, 30, 40, 0, 0, '', NULL, 0, 'GENAP 2014/2015', '2015-11-12 22:00:53', '2015-11-12 22:00:53', 1),
('150MK012A', 'A', 'MK012', 'R0008', 'DO001', '5', '15:30:00', 30, 30, 40, 0, 0, '', NULL, 0, 'GENAP 2014/2015', '2015-11-12 22:00:53', '2015-11-12 22:00:53', 1),
('150MK013A', 'A', 'MK013', 'R0005', 'DO002', '1', '15:30:00', 30, 30, 40, 0, 0, '', NULL, 0, 'GENAP 2014/2015', '2015-11-12 22:01:10', '2015-11-12 22:01:10', 1),
('150MK013B', 'B', 'MK013', 'R0009', 'DO005', '1', '15:30:00', 30, 30, 40, 0, 0, '', NULL, 0, 'GENAP 2014/2015', '2015-12-24 16:05:32', '2015-12-24 16:05:32', 1),
('150MK014A', 'A', 'MK014', 'R0009', 'DO005', '1', '15:30:00', 30, 30, 40, 0, 0, '', NULL, 0, 'GENAP 2014/2015', '2015-12-24 16:05:32', '2015-12-24 16:05:32', 1),
('150MK015A', 'A', 'MK015', 'R0009', 'DO005', '1', '15:30:00', 30, 30, 40, 0, 0, '', NULL, 0, 'GENAP 2014/2015', '2015-12-24 16:05:32', '2015-12-24 16:05:32', 1),
('150MK024A', 'A', 'MK024', 'R0007', 'DO002', '5', '10:30:00', 30, 20, 50, 5, 0, '', NULL, 0, 'GENAP 2014/2015', '2015-12-13 16:36:18', '2015-12-13 16:36:18', 1),
('150MK025A', 'A', 'MK025', 'R0008', 'DO003', '1', '13:00:00', 20, 30, 50, 10, 1, '', NULL, 0, 'GENAP 2014/2015', '2015-12-13 16:36:18', '2015-12-13 16:36:18', 1),
('150MK025B', 'B', 'MK025', 'R0009', 'DO006', '1', '13:00:00', 30, 30, 40, 0, 0, '', NULL, 0, 'GENAP 2014/2015', '2015-12-24 16:00:12', '2015-12-24 16:00:12', 1),
('150MK040A', 'A', 'MK040', 'R0003', 'DO002', '1', '08:30:00', 30, 20, 50, 5, 0, '', NULL, 0, 'GENAP 2014/2015', '2015-12-13 16:36:18', '2015-12-13 16:36:18', 1),
('150MK041A', 'A', 'MK041', 'R0004', 'DO003', '2', '08:00:00', 20, 30, 50, 10, 1, '', NULL, 0, 'GENAP 2014/2015', '2015-12-13 16:36:18', '2015-12-13 16:36:18', 1),
('150MK042A', 'A', 'MK042', 'R0005', 'DO004', '3', '10:30:00', 30, 20, 50, 15, 2, '', NULL, 0, 'GENAP 2014/2015', '2015-12-13 16:36:18', '2015-12-13 16:36:18', 1),
('151MK001A', 'A', 'MK001', 'R0004', 'DO001', '3', '08:00:00', 30, 30, 40, 0, 0, '', NULL, 0, 'GASAL 2015/2016', '2015-11-27 15:09:56', '2015-11-27 15:09:56', 1),
('151MK001B', 'B', 'MK001', 'R0006', 'DO003', '3', '08:00:00', 30, 30, 40, 0, 0, '', NULL, 0, 'GASAL 2015/2016', '2015-12-24 16:12:49', '2015-12-24 16:12:49', 1),
('151MK002A', 'A', 'MK002', 'R0004', 'DO001', '3', '08:00:00', 30, 30, 40, 0, 0, '', NULL, 0, 'GASAL 2015/2016', '2015-11-27 15:09:56', '2015-11-27 15:09:56', 1),
('151MK017A', 'A', 'MK017', 'R0003', 'DO002', '1', '18:00:00', 30, 30, 40, 0, 0, '', NULL, 0, 'GASAL 2015/2016', '2015-11-27 15:09:56', '2015-11-27 15:09:56', 1),
('151MK017B', 'B', 'MK017', 'R0009', 'DO003', '1', '18:00:00', 30, 30, 40, 0, 0, '', NULL, 0, '', '2015-12-24 16:16:52', '2015-12-24 16:16:52', 1),
('151MK018A', 'A', 'MK018', 'R0004', 'DO002', '4', '13:00:00', 30, 30, 40, 0, 0, '', NULL, 0, 'GASAL 2015/2016', '2015-11-27 15:09:56', '2015-11-27 15:09:56', 1),
('151MK019A', 'A', 'MK019', 'R0004', 'DO001', '5', '10:30:00', 30, 30, 40, 0, 0, '', NULL, 0, 'GASAL 2015/2016', '2015-11-27 15:09:56', '2015-11-27 15:09:56', 1),
('151MK020A', 'A', 'MK020', 'R0008', 'DO002', '1', '08:00:00', 30, 30, 40, 0, 0, '', NULL, 0, 'GASAL 2015/2016', '2015-11-27 15:09:56', '2015-11-27 15:09:56', 1),
('151MK021A', 'A', 'MK021', 'R0006', 'DO001', '3', '13:00:00', 30, 30, 40, 0, 0, '', NULL, 0, 'GASAL 2015/2016', '2015-11-27 15:09:56', '2015-11-27 15:09:56', 1),
('151MK021B', 'B', 'MK021', 'R0003', 'DO003', '2', '15:30:00', 30, 30, 40, 0, 0, '', NULL, 0, 'GASAL 2015/2016', '2015-11-27 15:09:56', '2015-11-27 15:09:56', 1),
('151MK026A', 'A', 'MK026', 'R0009', 'DO004', '2', '10:30:00', 30, 20, 50, 15, 2, '', NULL, 0, 'GASAL 2015/2016', '2015-12-13 16:36:18', '2015-12-13 16:36:18', 1),
('151MK027A', 'A', 'MK027', 'R0004', 'DO003', '4', '10:30:00', 30, 30, 40, 0, 0, '', NULL, 0, 'GASAL 2015/2016', '2015-11-27 15:09:56', '2015-11-27 15:09:56', 1),
('151MK027B', 'B', 'MK027', 'R0003', 'DO002', '4', '10:30:00', 30, 30, 40, 0, 0, '', NULL, 0, 'GASAL 2015/2016', '2015-12-24 16:41:03', '2015-12-24 16:41:03', 1),
('151MK028A', 'A', 'MK028', 'R0008', 'DO003', '5', '13:00:00', 30, 30, 40, 0, 0, '', NULL, 0, 'GASAL 2015/2016', '2015-11-27 15:09:56', '2015-11-27 15:09:56', 1),
('151MK029A', 'A', 'MK029', 'R0003', 'DO003', '5', '13:00:00', 20, 30, 50, 10, 1, '', NULL, 0, 'GASAL 2015/2016', '2015-12-13 16:36:18', '2015-12-13 16:36:18', 1),
('151MK029B', 'B', 'MK029', 'R0002', 'DO004', '5', '13:00:00', 30, 30, 40, 0, 0, '', NULL, 0, 'GASAL 2015/2016', '2015-12-24 16:41:55', '2015-12-24 16:41:55', 1),
('151MK030A', 'A', 'MK030', 'R0003', 'DO001', '1', '08:00:00', 30, 30, 40, 0, 0, '', NULL, 0, 'GASAL 2015/2016', '2015-11-12 21:56:10', '2015-11-12 21:56:10', 1),
('151MK031A', 'A', 'MK031', 'R0003', 'DO002', '1', '10:30:00', 30, 30, 40, 0, 0, '', NULL, 0, 'GASAL 2015/2016', '2015-11-12 21:56:58', '2015-11-12 21:56:58', 1),
('151MK032A', 'A', 'MK032', 'R008', 'DO002', '3', '13:00:00', 30, 30, 40, 0, 0, '', NULL, 0, 'GASAL 2015/2016', '2015-12-24 18:04:55', '2015-12-24 18:04:55', 1),
('151MK033A', 'A', 'MK033', 'R0008', 'DO003', '2', '13:00:00', 30, 30, 40, 0, 2, '', NULL, 0, 'GASAL 2015/2016', '2015-11-12 21:57:39', '2015-11-12 21:57:39', 1),
('151MK033B', 'B', 'MK033', 'R0004', 'DO005', '2', '13:00:00', 30, 30, 40, 0, 0, '', NULL, 0, 'GASAL 2015/2016', '2015-12-24 16:40:16', '2015-12-24 16:40:16', 1),
('151MK034A', 'A', 'MK034', 'R0004', 'DO001', '3', '08:00:00', 30, 30, 40, 0, 0, '', NULL, 0, 'GASAL 2015/2016', '2015-11-27 15:09:56', '2015-11-27 15:09:56', 1);

-- --------------------------------------------------------

--
-- Table structure for table `kelas_mahasiswa`
--

CREATE TABLE IF NOT EXISTS `kelas_mahasiswa` (
  `mahasiswa_nrp` varchar(9) NOT NULL COMMENT 'NYY',
  `kelas_id` varchar(9) NOT NULL,
  `mata_kuliah_id` varchar(6) NOT NULL,
  `status_ambil` varchar(10) NOT NULL,
  `semester` tinyint(2) unsigned NOT NULL,
  `nilai_id` varchar(9) DEFAULT NULL COMMENT 'nilai sebenarnya'
) ENGINE=InnoDB DEFAULT CHARSET=latin1 COMMENT='mahasiswa mengambil kelas';

--
-- Dumping data for table `kelas_mahasiswa`
--

INSERT INTO `kelas_mahasiswa` (`mahasiswa_nrp`, `kelas_id`, `mata_kuliah_id`, `status_ambil`, `semester`, `nilai_id`) VALUES
('213116230', '151MK014A', 'MK014', 'A', 5, 'N6230005'),
('213116230', '151MK017A', 'MK017', 'A', 5, 'N6230004'),
('213116230', '151MK021A', 'MK021', 'A', 5, 'N6230006'),
('213116230', '151MK026A', 'MK026', 'A', 5, 'N6230001'),
('213116230', '151MK027A', 'MK027', 'A', 5, 'N6230002'),
('213116230', '151MK028A', 'MK028', 'A', 5, 'N6230003'),
('213116241', '141MK001A', 'MK001', 'A', 1, 'N6241017'),
('213116241', '141MK002A', 'MK002', 'A', 1, 'N6241018'),
('213116241', '141MK003A', 'MK003', 'A', 1, 'N6241002'),
('213116241', '141MK004A', 'MK004', 'A', 1, 'N6241003'),
('213116241', '141MK005A', 'MK005', 'A', 1, 'N6241004'),
('213116241', '141MK006A', 'MK006', 'A', 1, 'N6241001'),
('213116241', '141MK014A', 'MK014', 'A', 3, 'N6241009'),
('213116241', '141MK015A', 'MK015', 'A', 3, 'N6241010'),
('213116241', '141MK016A', 'MK016', 'A', 3, 'N6241011'),
('213116241', '141MK017A', 'MK017', 'A', 3, 'N6241012'),
('213116241', '141MK018A', 'MK018', 'A', 3, 'N6241013'),
('213116241', '141MK019A', 'MK019', 'A', 3, 'N6241014'),
('213116241', '141MK020A', 'MK020', 'A', 1, 'N6241015'),
('213116241', '141MK021A', 'MK021', 'A', 1, 'N6241016'),
('213116241', '150MK009B', 'MK009', 'A', 1, 'N6241005'),
('213116241', '150MK011A', 'MK011', 'A', 1, 'N6241006'),
('213116241', '150MK012A', 'MK012', 'A', 1, 'N6241007'),
('213116241', '150MK013B', 'MK013', 'A', 1, 'N6241008'),
('213116278', '151MK014A', 'MK014', 't', 5, 'N6278005'),
('213116278', '151MK017A', 'MK017', 'A', 5, 'N6278004'),
('213116278', '151MK021A', 'MK021', 'A', 5, 'N6278006'),
('213116278', '151MK026A', 'MK026', 'A', 5, 'N6278001'),
('213116278', '151MK027A', 'MK027', 'A', 5, 'N6278002'),
('213116278', '151MK028A', 'MK028', 'b', 5, 'N6278003');

-- --------------------------------------------------------

--
-- Table structure for table `kode_verifikasi`
--

CREATE TABLE IF NOT EXISTS `kode_verifikasi` (
  `id` varchar(6) NOT NULL COMMENT '6 digit angka kode verifikasi',
  `nomor_registrasi_id` varchar(6) NOT NULL,
  `email` varchar(50) NOT NULL,
  `tanggal_create` datetime NOT NULL DEFAULT CURRENT_TIMESTAMP
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Table structure for table `kota`
--

CREATE TABLE IF NOT EXISTS `kota` (
  `id` varchar(6) NOT NULL,
  `provinsi_id` varchar(5) NOT NULL,
  `nama` varchar(50) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `kota`
--

INSERT INTO `kota` (`id`, `provinsi_id`, `nama`) VALUES
('KO001', 'PRO01', 'banda aceh'),
('KO002', 'PRO01', 'langsa'),
('KO003', 'PRO01', 'lhokseumawe'),
('KO004', 'PRO01', 'sabang'),
('KO005', 'PRO01', 'sabulussalam'),
('KO006', 'PRO02', 'denpasar'),
('KO007', 'PRO03', 'cilegon'),
('KO008', 'PRO03', 'serang'),
('KO009', 'PRO03', 'tangerang'),
('KO010', 'PRO03', 'tangerang selatan'),
('KO011', 'PRO04', 'bengkulu'),
('KO012', 'PRO05', 'gorontalo'),
('KO013', 'PRO06', 'jakarta barat'),
('KO014', 'PRO06', 'jakarta pusat'),
('KO015', 'PRO06', 'jakarta selatan'),
('KO016', 'PRO06', 'jakarta timur'),
('KO017', 'PRO06', 'jakarta utara'),
('KO018', 'PRO07', 'jambi'),
('KO019', 'PRO07', 'sungai penuh'),
('KO020', 'PRO08', 'bandung'),
('KO021', 'PRO08', 'banjar'),
('KO022', 'PRO08', 'bekasi'),
('KO023', 'PRO08', 'bogor'),
('KO024', 'PRO08', 'cimahi'),
('KO025', 'PRO08', 'cirebon'),
('KO026', 'PRO08', 'depok'),
('KO027', 'PRO08', 'sukabumi'),
('KO028', 'PRO08', 'tasikmalaya'),
('KO029', 'PRO09', 'magelang'),
('KO030', 'PRO09', 'pekalongan'),
('KO031', 'PRO09', 'salatiga'),
('KO032', 'PRO09', 'semarang'),
('KO033', 'PRO09', 'surakarta'),
('KO034', 'PRO09', 'tegal'),
('KO035', 'PRO10', 'batu'),
('KO036', 'PRO10', 'blitar'),
('KO037', 'PRO10', 'kediri'),
('KO038', 'PRO10', 'madiun'),
('KO039', 'PRO10', 'malang'),
('KO040', 'PRO10', 'mojokerto'),
('KO041', 'PRO10', 'pasuruan'),
('KO042', 'PRO10', 'probolinggo'),
('KO043', 'PRO11', 'ketapang'),
('KO044', 'PRO11', 'mempawah'),
('KO045', 'PRO11', 'pontianak'),
('KO046', 'PRO11', 'sambas'),
('KO047', 'PRO11', 'sintang'),
('KO048', 'PRO11', 'singkawang'),
('KO049', 'PRO12', 'banjarbaru'),
('KO050', 'PRO12', 'banjarmasin'),
('KO051', 'PRO13', 'muara teweh'),
('KO052', 'PRO13', 'palangka raya'),
('KO053', 'PRO13', 'sampit'),
('KO054', 'PRO14', 'balikpapan'),
('KO055', 'PRO14', 'bontang'),
('KO056', 'PRO14', 'samarinda'),
('KO057', 'PRO15', 'tarakan'),
('KO058', 'PRO16', 'pangkal pinang'),
('KO059', 'PRO17', 'batam'),
('KO060', 'PRO17', 'tanjung pinang'),
('KO061', 'PRO18', 'bandar lampung'),
('KO062', 'PRO18', 'metro'),
('KO063', 'PRO19', 'ambon'),
('KO064', 'PRO19', 'tual'),
('KO065', 'PRO20', 'sofifi'),
('KO066', 'PRO20', 'ternate'),
('KO067', 'PRO20', 'tidore kepulauan'),
('KO068', 'PRO21', 'bima'),
('KO069', 'PRO21', 'mataram'),
('KO070', 'PRO22', 'kupang'),
('KO071', 'PRO23', 'jayapura'),
('KO072', 'PRO24', 'sorong'),
('KO073', 'PRO25', 'dumai'),
('KO074', 'PRO25', 'pekanbaru'),
('KO075', 'PRO26', 'mamuju'),
('KO076', 'PRO27', 'makassar'),
('KO077', 'PRO27', 'palopo'),
('KO078', 'PRO27', 'parepare'),
('KO079', 'PRO28', 'luwuk'),
('KO080', 'PRO28', 'palu'),
('KO081', 'PRO28', 'poso'),
('KO082', 'PRO28', 'yango'),
('KO083', 'PRO29', 'bau-bau'),
('KO084', 'PRO29', 'kendari'),
('KO085', 'PRO30', 'bitung'),
('KO086', 'PRO30', 'kotamobagu'),
('KO087', 'PRO30', 'manado'),
('KO088', 'PRO30', 'tomohon'),
('KO089', 'PRO34', 'yogyakarta'),
('KO090', 'PRO10', 'surabaya'),
('KOT91', 'PRO31', 'kabupaten asahan'),
('KOT92', 'PRO31', 'kabupaten batubara'),
('KOT93', 'PRO31', 'kabupaten dairi'),
('KOT94', 'PRO32', 'kabupaten banyuasin'),
('KOT95', 'PRO32', 'kabupaten empat lawang'),
('KOT96', 'PRO32', 'kabupaten lahat'),
('KOT97', 'PRO33', 'kabupaten agam'),
('KOT98', 'PRO33', 'kabupaten dharmasraya'),
('KOT99', 'PRO33', 'kabupaten kepulauan mentawai');

-- --------------------------------------------------------

--
-- Table structure for table `log_penilaian`
--

CREATE TABLE IF NOT EXISTS `log_penilaian` (
  `id` varchar(11) NOT NULL,
  `keterangan` text,
  `tanggal_create` datetime NOT NULL,
  `kelas_id` varchar(9) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Table structure for table `log_penilaian_nilai`
--

CREATE TABLE IF NOT EXISTS `log_penilaian_nilai` (
  `nilai_id` varchar(9) NOT NULL,
  `log_penilaian_id` varchar(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Table structure for table `mahasiswa`
--

CREATE TABLE IF NOT EXISTS `mahasiswa` (
  `nrp` varchar(9) NOT NULL,
  `nomor_registrasi_id` varchar(6) NOT NULL,
  `nip_dosen` varchar(10) NOT NULL,
  `email` varchar(30) NOT NULL,
  `nama` varchar(50) NOT NULL,
  `jenis_kelamin` varchar(1) NOT NULL,
  `tempat_lahir` varchar(30) NOT NULL,
  `tanggal_lahir` date NOT NULL,
  `kewarganegaraan` varchar(3) NOT NULL,
  `status_sosial` varchar(10) NOT NULL,
  `agama` varchar(10) NOT NULL,
  `alamat` varchar(50) NOT NULL,
  `provinsi` varchar(30) NOT NULL,
  `kota` varchar(30) NOT NULL,
  `kodepos` varchar(5) NOT NULL,
  `nomor_hp` varchar(12) NOT NULL,
  `relasi` varchar(1) NOT NULL,
  `nama_wali` varchar(30) NOT NULL,
  `alamat_wali` varchar(50) NOT NULL,
  `provinsi_wali` varchar(30) NOT NULL,
  `kota_wali` varchar(30) NOT NULL,
  `nomor_telp_wali` varchar(12) NOT NULL,
  `pekerjaan_wali` varchar(30) NOT NULL,
  `status_perwalian` varchar(1) NOT NULL DEFAULT '0',
  `sks` smallint(3) unsigned NOT NULL DEFAULT '0',
  `ipk` varchar(5) NOT NULL DEFAULT '0',
  `semester` tinyint(2) unsigned NOT NULL DEFAULT '0',
  `informasi_kurikulum_id` varchar(8) DEFAULT NULL,
  `dosen_nip` varchar(5) NOT NULL,
  `status` tinyint(1) NOT NULL DEFAULT '1'
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `mahasiswa`
--

INSERT INTO `mahasiswa` (`nrp`, `nomor_registrasi_id`, `nip_dosen`, `email`, `nama`, `jenis_kelamin`, `tempat_lahir`, `tanggal_lahir`, `kewarganegaraan`, `status_sosial`, `agama`, `alamat`, `provinsi`, `kota`, `kodepos`, `nomor_hp`, `relasi`, `nama_wali`, `alamat_wali`, `provinsi_wali`, `kota_wali`, `nomor_telp_wali`, `pekerjaan_wali`, `status_perwalian`, `sks`, `ipk`, `semester`, `informasi_kurikulum_id`, `dosen_nip`, `status`) VALUES
('213116004', 'gg3rfd', '', 'novi@yhz.biz', 'Novi Mutiara', 'P', 'bandung', '1994-07-27', 'WNI', 'single', 'islam', 'Jl. Ters Jakarta No. 37, Bandung', 'jawa barat', 'bandung', '65123', '087878787555', 'O', 'Abdul Rahman', 'Jl. Ters Jakarta No. 37, Bandung', 'jawa barat', 'bandung', '0813352356', 'Swasta', '0', 0, '0', 0, 'S1SIB151', '', 1),
('213116230', 'asdb21', 'DO001', 'ivander_wilson95@yahoo.co.id', 'Ivander Wilson Soenjoyo', 'L', 'Malang', '1995-08-01', 'WNI', 'Single', 'Kristen', 'Ngagel Madya V 20 Surabaya', 'Jawa Timur', 'Surabaya', '61234', '0812345678', 'O', 'Pauw Shang Ren', 'Lawang View Lawang', 'Jawa Timur', 'Lawang', '123412341234', 'Wiraswasta', '1', 70, '3.4', 5, 'S1INF151', '', 1),
('213116241', 'jjhy77', 'DO001', 'lukaskristanto@gmail.com', 'Lukas Kristanto', 'L', 'Surabaya', '0000-00-00', 'WNA', 'Single', 'Buddha', 'asdasdasdas', 'aceh', 'banda', '55555', '123123123', '', 'Lee Kum Kee', 'Waras 23 Surabaya', 'aceh', 'banda', '0151352413', 'Swasta', '0', 23, '3.99', 5, 'S1INF131', '', 0),
('213116278', 'fdsa23', 'DO001', 'yudhadarmawan@yahoo.co.id', 'Yudha Darmawan', 'L', 'Surabaya', '1995-08-01', 'WNI', 'Single', 'Kristen', 'Ngagel Madya V 15 Surabaya', 'Jawa Timur', 'Surabaya', '61235', '08198765432', 'O', 'Bambang Darmawan', 'Ngagel Madya V 15 Surabaya', 'Jawa Timur', 'Surabaya', '0815463729', 'Wiraswasta', '1', 70, '3.7', 5, 'S1INF151', '', 1),
('215116001', '13g31g', '', 'bagas@yhz.biz', 'Bagas Dirgantara', 'L', 'bekasi', '1995-09-03', 'WNI', 'single', 'islam', 'Jl. MH. Thamrin Kav. 105, Lippo Cikarang', 'jawa barat', 'bekasi', '61421', '08125235232', 'O', 'Mohammad Fajar', 'Jl. MH. Thamrin Kav. 105, Lippo Cikarang', 'jawa barat', 'bekasi', '08785124353', 'Swasta', '0', 0, '0', 0, 'D3INF153', '', 1),
('215116002', 'adf312', '', 'andre@yhg.biz', 'Aditya Warman', 'L', 'bandung', '1995-02-17', 'WNI', 'single', 'kristen', 'Jl. Marga Asih No. 162 Bandung', 'jawa barat', 'bandung', '65563', '08155290322', 'O', 'Agung Baskoro', 'Jl. Marga Asih No. 162 Bandung', 'jawa barat', 'bandung', '08193844423', 'Swasta', '0', 0, '0', 0, 'D3INF153', '', 1),
('215116003', 'asdqwe', '', 'aji@yhz.biz', 'Aji Mumpung', 'L', 'bandung', '1995-10-17', 'WNI', 'single', 'kristen', 'Jl. Sarimanah No. 23, Sarijadi, Bandung', 'jawa barat', 'bandung', '61434', '08785552312', 'O', 'Budi Sentosa', 'Jl. Sarimanah No. 23, Sarijadi, Bandung', 'jawa barat', 'bandung', '08134544324', 'Swasta', '0', 0, '0', 0, 'S1DKV152', '', 1),
('215116005', 'n4h3ff', '', 'ika@yhz.biz', 'Ika Asih', 'P', 'malang', '1995-11-29', 'WNI', 'single', 'islam', ' Master Malang, Jl. Trunojoyo No.23, Malang', 'jawa timur', 'malang', '61231', '08776543212', 'O', 'Heni', ' Master Malang, Jl. Trunojoyo No.23, Malang', 'jawa timur', 'malang', '087877886543', 'Swasta', '0', 0, '0', 0, 'S1INF152', '', 1);

-- --------------------------------------------------------

--
-- Table structure for table `mata_kuliah`
--

CREATE TABLE IF NOT EXISTS `mata_kuliah` (
  `id` varchar(5) NOT NULL,
  `nama` varchar(50) NOT NULL,
  `deskripsi` text,
  `semester` tinyint(2) unsigned NOT NULL,
  `jumlah_sks` tinyint(2) unsigned NOT NULL,
  `informasi_kurikulum_id` varchar(8) DEFAULT NULL,
  `lulus_minimal` varchar(2) NOT NULL,
  `berpraktikum` tinyint(1) NOT NULL,
  `major` varchar(50) NOT NULL,
  `status` tinyint(1) NOT NULL DEFAULT '1'
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `mata_kuliah`
--

INSERT INTO `mata_kuliah` (`id`, `nama`, `deskripsi`, `semester`, `jumlah_sks`, `informasi_kurikulum_id`, `lulus_minimal`, `berpraktikum`, `major`, `status`) VALUES
('MK001', 'Algoritma dan Programming', 'Alpro 1', 1, 3, 'S1INF131', 'C', 0, '', 1),
('MK002', 'Intro to Programming', 'ITP', 1, 3, 'S1INF131', 'C', 1, '', 1),
('MK003', 'Internet dan World Wide Web', 'IWWW', 1, 3, 'S1INF131', 'C', 0, '', 1),
('MK004', 'Intro to Information Technology', 'IIT', 1, 3, 'S1INF131', 'C', 0, '', 1),
('MK005', 'Religion', 'Agama', 1, 3, 'S1INF131', 'C', 0, '', 1),
('MK006', 'Indonesian Language', 'BI', 1, 3, 'S1INF131', 'D', 0, '', 1),
('MK007', 'Algoritma dan Programming 2', 'Alpro 2', 2, 3, 'S1INF131', 'C', 0, '', 1),
('MK008', 'Pemrograman Visual', 'PV', 2, 3, 'S1INF131', 'C', 1, '', 1),
('MK009', 'Database', 'db', 2, 3, 'S1INF131', 'C', 1, '', 1),
('MK010', 'Computer Network', 'Jarkom', 2, 3, 'S1INF131', 'D', 0, '', 1),
('MK011', 'English', 'English', 2, 2, 'S1INF131', 'D', 0, '', 1),
('MK012', 'Logic Mathematics', 'LogMat', 2, 2, 'S1INF131', 'D', 0, '', 1),
('MK013', 'Mathematics', 'Mat', 2, 2, 'S1INF131', 'D', 0, '', 1),
('MK014', 'Data Structures', 'Strukdat', 3, 3, 'S1INF131', 'C', 0, '', 1),
('MK015', 'Internet Application Development', 'Aplin', 3, 3, 'S1INF131', 'C', 1, '', 1),
('MK016', 'System Analysis and Design', 'ADS', 3, 3, 'S1INF131', 'C', 0, '', 1),
('MK017', 'Object-Oriented Programming', 'OOP', 3, 3, 'S1INF131', 'C', 1, '', 1),
('MK018', 'Graph Theory', 'Teori Graph', 3, 2, 'S1INF131', 'C', 0, '', 1),
('MK019', 'Mathematics 2', 'Mat 2', 3, 2, 'S1INF131', 'C', 0, '', 1),
('MK020', 'Client Server Programming', 'ADS', 3, 4, 'S1INF131', 'C', 1, '', 1),
('MK021', 'Object-Oriented Analysis and Design', 'adbo', 4, 3, 'S1INF131', 'C', 0, '', 1),
('MK022', 'National Ideology', 'PKN', 4, 2, 'S1INF131', 'C', 0, '', 1),
('MK023', 'Digital Circuits', 'RDIG', 4, 3, 'S1INF131', 'C', 1, '', 1),
('MK024', 'Advanced Data Structures', 'Struktur Data Lanjut', 4, 3, 'S1INF131', 'C', 0, '', 1),
('MK025', 'Digital Image Processing', 'PCD', 4, 3, 'S1INF131', 'C', 0, '', 1),
('MK026', 'Human Computer Interaction', 'HCI', 5, 3, 'S1INF131', 'C', 0, '', 1),
('MK027', 'Internet Application Framework', 'FAI', 5, 3, 'S1INF131', 'C', 1, '', 1),
('MK028', 'Operating System', 'Sisop', 5, 3, 'S1INF131', 'C', 0, '', 1),
('MK029', 'Artificial Intelligence', 'AI', 5, 3, 'S1INF131', 'C', 0, '', 1),
('MK030', 'Computer Graphics', 'Grafkom', 5, 3, 'S1INF131', 'C', 0, '', 1),
('MK031', 'Computer Organization', 'Orkom', 5, 3, 'S1INF131', 'C', 0, '', 1),
('MK032', 'Software Engineering', 'SE', 6, 3, 'S1INF131', 'C', 0, '', 1),
('MK033', 'Multimedia', 'MMI', 6, 3, 'S1INF131', 'C', 1, '', 1),
('MK034', 'Technopreneurship', 'KWU', 6, 2, 'S1INF131', 'C', 0, '', 1),
('MK035', 'Ethics and Profession', 'Etika', 6, 2, 'S1INF131', 'D', 0, '', 1),
('MK036', 'Intership', '', 6, 2, 'S1INF131', 'C', 0, '', 1),
('MK037', 'Soft Computing', 'SC', 6, 3, 'S1INF131', 'C', 0, '', 1),
('MK038', 'Select Topics in IT', '', 6, 3, 'S1INF131', 'C', 0, '', 1),
('MK039', 'Software Development Project', 'SDP', 7, 3, 'S1INF131', 'C', 0, '', 1),
('MK040', 'Embedded Systems', 'ES', 7, 3, 'S1INF131', 'C', 0, '', 1),
('MK041', 'Electives', '', 7, 12, 'S1INF131', 'C', 0, '', 1),
('MK042', 'Undergraduate Thesis', 'TA', 7, 3, 'S1INF131', 'C', 0, '', 1),
('MK043', 'Electives', 'HCI', 7, 3, 'S1INF131', 'C', 0, '', 1);

-- --------------------------------------------------------

--
-- Table structure for table `nilai`
--

CREATE TABLE IF NOT EXISTS `nilai` (
  `id` varchar(9) NOT NULL,
  `uts` tinyint(3) unsigned NOT NULL DEFAULT '0',
  `uas` tinyint(3) unsigned NOT NULL DEFAULT '0',
  `tugas` tinyint(3) unsigned NOT NULL DEFAULT '0',
  `nilai_akhir` tinyint(3) unsigned NOT NULL DEFAULT '0',
  `nilai_akhir_grade` tinyint(3) unsigned NOT NULL DEFAULT '0',
  `nilai_grade` varchar(2) NOT NULL DEFAULT 'E',
  `value_nilai_grade` tinyint(2) unsigned NOT NULL DEFAULT '0'
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `nilai`
--

INSERT INTO `nilai` (`id`, `uts`, `uas`, `tugas`, `nilai_akhir`, `nilai_akhir_grade`, `nilai_grade`, `value_nilai_grade`) VALUES
('N6230001', 70, 80, 90, 100, 79, 'B', 12),
('N6230002', 100, 100, 100, 100, 100, 'A', 12),
('N6230003', 70, 70, 100, 74, 74, 'B', 9),
('N6230004', 65, 80, 100, 71, 71, 'B', 8),
('N6230005', 56, 90, 75, 65, 65, 'C', 6),
('N6230006', 100, 100, 100, 100, 100, 'A', 12),
('N6241001', 90, 80, 78, 77, 82, 'A', 5),
('N6241002', 80, 90, 80, 68, 68, 'C', 0),
('N6241003', 78, 70, 90, 55, 75, 'B', 11),
('N6241004', 68, 80, 100, 65, 80, 'A', 12),
('N6241005', 92, 100, 90, 70, 80, 'A', 10),
('N6241006', 77, 90, 80, 57, 62, 'C', 5),
('N6241007', 80, 80, 77, 67, 67, 'C', 0),
('N6241008', 90, 78, 90, 59, 79, 'B', 20),
('N6241009', 70, 68, 68, 81, 96, 'A', 15),
('N6241010', 80, 92, 78, 77, 87, 'A', 10),
('N6241011', 100, 77, 80, 68, 73, 'B', 5),
('N6241012', 90, 80, 90, 61, 61, 'C', 0),
('N6241013', 80, 90, 100, 65, 85, 'A', 20),
('N6241014', 77, 68, 70, 70, 85, 'A', 15),
('N6241015', 80, 92, 90, 57, 67, 'C', 10),
('N6241016', 90, 77, 80, 67, 72, 'A', 5),
('N6241017', 70, 80, 77, 59, 59, 'C', 0),
('N6241018', 80, 90, 90, 81, 101, 'A', 20);

-- --------------------------------------------------------

--
-- Table structure for table `nilai_semester`
--

CREATE TABLE IF NOT EXISTS `nilai_semester` (
  `mahasiswa_nrp` varchar(9) NOT NULL,
  `semester` tinyint(2) unsigned NOT NULL,
  `ips` varchar(4) NOT NULL,
  `tahun_ajaran` varchar(50) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `nilai_semester`
--

INSERT INTO `nilai_semester` (`mahasiswa_nrp`, `semester`, `ips`, `tahun_ajaran`) VALUES
('213116241', 4, '3.37', 'GENAP 2014/2015');

-- --------------------------------------------------------

--
-- Table structure for table `nomor_registrasi`
--

CREATE TABLE IF NOT EXISTS `nomor_registrasi` (
  `id` varchar(6) NOT NULL,
  `status` tinyint(1) NOT NULL DEFAULT '0' COMMENT '0 = belum terpakai, 1 = sudah terpakai untuk registrasi'
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `nomor_registrasi`
--

INSERT INTO `nomor_registrasi` (`id`, `status`) VALUES
('13g31g', 1),
('1f11vf', 1),
('1f1gg7', 1),
('315135', 1),
('3n3b3b', 1),
('514f13', 1),
('adf312', 1),
('asd125', 1),
('asdqwe', 1),
('b2222f', 1),
('bxvtr7', 1),
('f311g3', 1),
('f322y4', 1),
('gg3rfd', 1),
('j45j44', 1),
('k6464f', 1),
('kkusgd', 0),
('n4h3ff', 1),
('qwe321', 1),
('wdf31', 1),
('zxc241', 1);

-- --------------------------------------------------------

--
-- Table structure for table `notifikasi`
--

CREATE TABLE IF NOT EXISTS `notifikasi` (
`id` int(11) NOT NULL,
  `dari` varchar(9) DEFAULT NULL,
  `tujuan` varchar(9) DEFAULT NULL,
  `judul` varchar(255) NOT NULL,
  `isi` text,
  `tanggal_create` datetime NOT NULL DEFAULT CURRENT_TIMESTAMP,
  `status_baca` tinyint(1) NOT NULL DEFAULT '0'
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=55 ;

--
-- Dumping data for table `notifikasi`
--

INSERT INTO `notifikasi` (`id`, `dari`, `tujuan`, `judul`, `isi`, `tanggal_create`, `status_baca`) VALUES
(6, 'PMB', 'BAU', 'adf312', NULL, '2015-12-18 22:11:38', 0),
(7, 'PMB', 'BAU', 'asdqwe', NULL, '2015-12-18 22:11:43', 0),
(8, 'PMB', 'BAU', 'gg3rfd', NULL, '2015-12-18 22:11:48', 0),
(9, 'PMB', 'BAU', 'n4h3ff', NULL, '2015-12-18 22:11:53', 0),
(15, 'PMB', 'BAU', '13g31g', NULL, '2015-12-18 22:34:58', 0),
(16, 'PMB', 'BAU', '315135', NULL, '2015-12-18 22:35:03', 1),
(17, 'PMB', 'BAU', '514f13', NULL, '2015-12-18 22:35:08', 1),
(18, 'PMB', 'BAU', 'asd125', NULL, '2015-12-18 22:35:14', 1),
(19, 'PMB', 'BAU', 'qwe321', NULL, '2015-12-18 22:35:19', 1),
(25, 'PMB', 'BAU', '1f1gg7', NULL, '2015-12-18 23:18:41', 1),
(26, 'PMB', 'BAU', 'zxc241', NULL, '2015-12-18 23:18:47', 1),
(27, 'PMB', 'BAU', 'wdf31', NULL, '2015-12-18 23:18:51', 1),
(28, 'PMB', 'BAU', '1f11vf', NULL, '2015-12-18 23:18:55', 1),
(29, 'PMB', 'BAU', '3n3b3b', NULL, '2015-12-18 23:19:00', 1),
(35, 'PMB', 'BAU', 'f311g3', NULL, '2015-12-18 23:44:57', 1),
(36, 'PMB', 'BAU', 'k6464f', NULL, '2015-12-18 23:45:04', 1),
(37, 'PMB', 'BAU', 'bxvtr7', NULL, '2015-12-18 23:45:25', 1),
(38, 'PMB', 'BAU', 'j45j44', NULL, '2015-12-18 23:45:50', 1),
(39, 'PMB', 'BAU', 'b2222f', NULL, '2015-12-18 23:46:05', 1),
(40, 'BAU', 'PMB', 'adf312', NULL, '2015-12-21 22:11:38', 1),
(41, 'BAU', 'PMB', 'asdqwe', NULL, '2015-12-21 22:11:43', 1),
(42, 'BAU', 'PMB', 'gg3rfd', NULL, '2015-12-21 22:11:48', 1),
(43, 'BAU', 'PMB', 'n4h3ff', NULL, '2015-12-21 22:11:53', 1),
(44, 'BAU', 'PMB', '13g31g', NULL, '2015-12-21 22:34:58', 1),
(45, 'DO004', 'DO001', 'Anda diminta untuk mengajar Artificial Intelligence Kelas B', NULL, '2015-12-24 15:44:33', 0),
(46, 'DO004', 'DO006', 'Anda diminta untuk mengajar Digital Image Processing Kelas B', NULL, '2015-12-24 16:00:12', 0),
(47, 'DO004', 'DO005', 'Anda diminta untuk mengajar Mathematics Kelas B', NULL, '2015-12-24 16:05:32', 0),
(48, 'DO004', 'DO001', 'Artificial Intelligence Kelas A ditutup.', NULL, '2015-12-24 16:09:35', 0),
(49, 'DO004', 'DO003', 'Anda diminta untuk mengajar Algoritma dan Programming Kelas C', NULL, '2015-12-24 16:12:49', 0),
(50, 'DO004', 'DO003', 'Anda diminta untuk mengajar Object-Oriented Programming Kelas B', NULL, '2015-12-24 16:16:52', 0),
(51, 'DO004', 'DO004', 'Anda diminta untuk mengajar Computer Graphics Kelas B', NULL, '2015-12-24 16:18:02', 0),
(52, 'DO004', 'DO005', 'Anda diminta untuk mengajar Multimedia Kelas B', NULL, '2015-12-24 16:40:16', 0),
(53, 'DO004', 'DO002', 'Anda diminta untuk mengajar Internet Application Framework Kelas B', NULL, '2015-12-24 16:41:03', 0),
(54, 'DO004', 'DO004', 'Anda diminta untuk mengajar Artificial Intelligence Kelas B', NULL, '2015-12-24 16:41:55', 0);

-- --------------------------------------------------------

--
-- Table structure for table `nrp`
--

CREATE TABLE IF NOT EXISTS `nrp` (
  `id` varchar(9) NOT NULL,
  `status` tinyint(1) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `nrp`
--

INSERT INTO `nrp` (`id`, `status`) VALUES
('215116001', 1),
('215116002', 1),
('215116003', 1),
('215116004', 1),
('215116005', 1),
('215116006', 0),
('215116007', 0),
('215116008', 0),
('215116009', 0),
('215116010', 0);

-- --------------------------------------------------------

--
-- Table structure for table `provinsi`
--

CREATE TABLE IF NOT EXISTS `provinsi` (
  `id` varchar(5) NOT NULL,
  `nama` varchar(50) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `provinsi`
--

INSERT INTO `provinsi` (`id`, `nama`) VALUES
('PRO01', 'aceh'),
('PRO02', 'bali'),
('PRO03', 'banten'),
('PRO04', 'bengkulu'),
('PRO05', 'gorontalo'),
('PRO06', 'DKI jakarta'),
('PRO07', 'jambi'),
('PRO08', 'jawa barat'),
('PRO09', 'jawa tengah'),
('PRO10', 'jawa timur'),
('PRO11', 'kalimantan barat'),
('PRO12', 'kalimantan selatan'),
('PRO13', 'kalimantan tengah'),
('PRO14', 'kalimantan timur'),
('PRO15', 'kalimantan utara'),
('PRO16', 'kepulauan bangka belitung'),
('PRO17', 'kepulauan riau'),
('PRO18', 'lampung'),
('PRO19', 'maluku'),
('PRO20', 'maluku utara'),
('PRO21', 'nusa tenggara barat'),
('PRO22', 'nusa tenggara timur'),
('PRO23', 'papua'),
('PRO24', 'papua barat'),
('PRO25', 'riau'),
('PRO26', 'sulawesi barat'),
('PRO27', 'sulawesi selatan'),
('PRO28', 'sulawesi tengah'),
('PRO29', 'sulawesi tenggara'),
('PRO30', 'sulawesi utara'),
('PRO31', 'sumatera barat'),
('PRO32', 'sumatera selatan'),
('PRO33', 'sumatera utara'),
('PRO34', 'daerah istimewa yogyakarta');

-- --------------------------------------------------------

--
-- Table structure for table `ruangan`
--

CREATE TABLE IF NOT EXISTS `ruangan` (
  `id` varchar(5) NOT NULL,
  `nama` varchar(30) NOT NULL,
  `kapasitas` int(3) DEFAULT '0',
  `status` tinyint(1) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `ruangan`
--

INSERT INTO `ruangan` (`id`, `nama`, `kapasitas`, `status`) VALUES
('R0001', 'B100', 69, 1),
('R0002', 'B301', 40, 1),
('R0003', 'B302', 50, 1),
('R0004', 'B303', 60, 1),
('R0005', 'U101', 20, 1),
('R0006', 'U102', 20, 1),
('R0007', 'U301', 40, 1),
('R0008', 'U302', 40, 1),
('R0009', 'U303', 40, 1);

-- --------------------------------------------------------

--
-- Table structure for table `syarat_matakuliah`
--

CREATE TABLE IF NOT EXISTS `syarat_matakuliah` (
  `id_matakuliah` varchar(5) NOT NULL,
  `id_syarat_matakuliah` varchar(5) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `syarat_matakuliah`
--

INSERT INTO `syarat_matakuliah` (`id_matakuliah`, `id_syarat_matakuliah`) VALUES
('MK007', 'MK001'),
('MK008', 'MK001'),
('MK008', 'MK002'),
('MK017', 'MK002'),
('MK015', 'MK004'),
('MK014', 'MK007'),
('MK020', 'MK008'),
('MK016', 'MK009'),
('MK020', 'MK009'),
('MK019', 'MK013'),
('MK024', 'MK014'),
('MK029', 'MK014'),
('MK021', 'MK016'),
('MK032', 'MK021'),
('MK037', 'MK029'),
('MK029', 'MK031'),
('MK040', 'MK031'),
('MK039', 'MK032');

-- --------------------------------------------------------

--
-- Table structure for table `user`
--

CREATE TABLE IF NOT EXISTS `user` (
  `id` varchar(9) NOT NULL DEFAULT '',
  `password` varchar(20) DEFAULT NULL,
  `peran` varchar(20) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `user`
--

INSERT INTO `user` (`id`, `password`, `peran`) VALUES
('213116230', '123456', 'mahasiswa'),
('213116241', '123456', 'mahasiswa'),
('DO001', 'ferdinandus', 'dosen_pimpinanpmb'),
('DO002', 'budibudi', 'dosen'),
('DO003', 'jngojngo', 'dosen_chiefbau'),
('DO004', 'edwin', 'dosen'),
('DO005', 'steste', 'dosen');

-- --------------------------------------------------------

--
-- Structure for view `getgrade`
--
DROP TABLE IF EXISTS `getgrade`;

CREATE ALGORITHM=UNDEFINED DEFINER=`root`@`localhost` SQL SECURITY DEFINER VIEW `getgrade` AS select `kelas_mahasiswa`.`mahasiswa_nrp` AS `mahasiswa_nrp`,`mata_kuliah`.`nama` AS `nama`,`nilai`.`nilai_grade` AS `nilai_grade` from ((`nilai` join `kelas_mahasiswa`) join `mata_kuliah`) where ((`kelas_mahasiswa`.`nilai_id` = `nilai`.`id`) and (`kelas_mahasiswa`.`mata_kuliah_id` = `mata_kuliah`.`id`));

--
-- Indexes for dumped tables
--

--
-- Indexes for table `beasiswa`
--
ALTER TABLE `beasiswa`
 ADD PRIMARY KEY (`id`), ADD KEY `fk_beasiswa_informasi_beasiswa` (`informasi_beasiswa_nama_beasiswa`);

--
-- Indexes for table `calon_mahasiswa`
--
ALTER TABLE `calon_mahasiswa`
 ADD PRIMARY KEY (`nomor_registrasi_id`), ADD KEY `informasi_kurikulum_id` (`informasi_kurikulum_id`), ADD KEY `nomor_registrasi_id` (`nomor_registrasi_id`) USING BTREE;

--
-- Indexes for table `data_umum`
--
ALTER TABLE `data_umum`
 ADD PRIMARY KEY (`index`);

--
-- Indexes for table `dispensasi`
--
ALTER TABLE `dispensasi`
 ADD UNIQUE KEY `id` (`id`);

--
-- Indexes for table `dkeuangan`
--
ALTER TABLE `dkeuangan`
 ADD PRIMARY KEY (`id`);

--
-- Indexes for table `dosen`
--
ALTER TABLE `dosen`
 ADD PRIMARY KEY (`nip`);

--
-- Indexes for table `drevisi_penilaian`
--
ALTER TABLE `drevisi_penilaian`
 ADD PRIMARY KEY (`id`), ADD KEY `fk_hrevisi_drevisi` (`hrevisi_penilaian_id`);

--
-- Indexes for table `hkeuangan`
--
ALTER TABLE `hkeuangan`
 ADD PRIMARY KEY (`id`);

--
-- Indexes for table `hrevisi_penilaian`
--
ALTER TABLE `hrevisi_penilaian`
 ADD PRIMARY KEY (`id`);

--
-- Indexes for table `informasi_beasiswa`
--
ALTER TABLE `informasi_beasiswa`
 ADD PRIMARY KEY (`id`);

--
-- Indexes for table `informasi_kurikulum`
--
ALTER TABLE `informasi_kurikulum`
 ADD PRIMARY KEY (`id`), ADD KEY `id` (`id`);

--
-- Indexes for table `karyawan`
--
ALTER TABLE `karyawan`
 ADD PRIMARY KEY (`id`);

--
-- Indexes for table `kelas`
--
ALTER TABLE `kelas`
 ADD PRIMARY KEY (`id`), ADD KEY `fk_kelas_mata_kuliah` (`mata_kuliah_id`), ADD KEY `fk_kelas_ruangan` (`ruangan_id`), ADD KEY `fk_dosen_kelas` (`dosen_nip`), ADD KEY `fk_kelas_kelas` (`kelas_id`);

--
-- Indexes for table `kelas_mahasiswa`
--
ALTER TABLE `kelas_mahasiswa`
 ADD PRIMARY KEY (`mahasiswa_nrp`,`kelas_id`), ADD KEY `kelas_id` (`kelas_id`), ADD KEY `fk_kelas_mahasiswa_mata_kuliah` (`mata_kuliah_id`), ADD KEY `fk_kelas_mahasiswa_nilai` (`nilai_id`);

--
-- Indexes for table `kode_verifikasi`
--
ALTER TABLE `kode_verifikasi`
 ADD PRIMARY KEY (`id`), ADD KEY `nomor_registrasi_id` (`nomor_registrasi_id`) USING BTREE;

--
-- Indexes for table `kota`
--
ALTER TABLE `kota`
 ADD PRIMARY KEY (`id`), ADD KEY `provinsi_id` (`provinsi_id`) USING BTREE;

--
-- Indexes for table `log_penilaian`
--
ALTER TABLE `log_penilaian`
 ADD PRIMARY KEY (`id`);

--
-- Indexes for table `log_penilaian_nilai`
--
ALTER TABLE `log_penilaian_nilai`
 ADD PRIMARY KEY (`nilai_id`,`log_penilaian_id`), ADD KEY `log_penilaian_id` (`log_penilaian_id`);

--
-- Indexes for table `mahasiswa`
--
ALTER TABLE `mahasiswa`
 ADD PRIMARY KEY (`nrp`), ADD UNIQUE KEY `nomor_registrasi_id_2` (`nomor_registrasi_id`), ADD UNIQUE KEY `email` (`email`), ADD KEY `nomor_registrasi_id` (`nomor_registrasi_id`), ADD KEY `informasi_kurikulum_id` (`informasi_kurikulum_id`);

--
-- Indexes for table `mata_kuliah`
--
ALTER TABLE `mata_kuliah`
 ADD PRIMARY KEY (`id`);

--
-- Indexes for table `nilai`
--
ALTER TABLE `nilai`
 ADD PRIMARY KEY (`id`);

--
-- Indexes for table `nilai_semester`
--
ALTER TABLE `nilai_semester`
 ADD PRIMARY KEY (`mahasiswa_nrp`,`semester`);

--
-- Indexes for table `nomor_registrasi`
--
ALTER TABLE `nomor_registrasi`
 ADD PRIMARY KEY (`id`);

--
-- Indexes for table `notifikasi`
--
ALTER TABLE `notifikasi`
 ADD PRIMARY KEY (`id`);

--
-- Indexes for table `nrp`
--
ALTER TABLE `nrp`
 ADD PRIMARY KEY (`id`);

--
-- Indexes for table `user`
--
ALTER TABLE `user`
 ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `notifikasi`
--
ALTER TABLE `notifikasi`
MODIFY `id` int(11) NOT NULL AUTO_INCREMENT,AUTO_INCREMENT=55;
/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
