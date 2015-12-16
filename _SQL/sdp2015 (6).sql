-- phpMyAdmin SQL Dump
-- version 4.2.11
-- http://www.phpmyadmin.net
--
-- Host: 127.0.0.1
-- Generation Time: Dec 14, 2015 at 08:29 AM
-- Server version: 5.6.21
-- PHP Version: 5.6.3

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

--
-- Dumping data for table `beasiswa`
--

INSERT INTO `beasiswa` (`id`, `informasi_beasiswa_nama_beasiswa`, `mahasiswa_nrp`, `tanggal_create`, `status`) VALUES
('BPP201508010001', 'Prestasi', '213116256', '2015-08-01', '1'),
('BPP201508010002', 'Prestasi', '213116267', '2015-08-01', '1'),
('BPP201508010003', 'Sosial Ekonomi', '213116270', '2015-08-01', '1'),
('BPP201508010004', 'Sosial Ekonomi', '213180292', '2015-08-01', '1');

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
('12po09', 'raymondwongso@gmail.com', '123456', 'Raymond Wongso Hartanto', 'L', 'Surabaya', '1995-11-02', 'WNI', NULL, 'Buddha', 'Darmo Harapan Indah VI / WW12A', 'Jawa Timur', 'Surabaya', '60187', '08113192777', '', '', 0, 0, 0, '', '', 'SMAK Frateran', NULL, 'Jawa Timur', 'Surabaya', NULL, NULL, NULL, 'Go Ong Ka Kiat', 'Darmo Harapan Indah VI / WW12A', 'Jawa Timur', 'Surabaya', '60187', NULL, 'Wirausaha', NULL, NULL, 'S1INF131', '2015-11-12 20:45:54', 0),
('2ie93o', 'desmond@gmail.com', 'asd123', 'Desmond Dund', 'L', 'Surabaya', '2015-12-02', 'WNI', NULL, 'Kristen', NULL, 'DKI jakarta', 'jakarta barat', '22321', '44533221', NULL, NULL, 80, 80, 80, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, 'S1DKV152', '2015-12-02 16:40:31', 1),
('38krn1', 'scott@gmail.com', 'asd123', 'Scott Pilgrimr', 'L', 'bogor', '1990-07-11', 'WNA', 'single', 'kristen', 'Jalan Dukuh Pakis 23 Bogor', 'jawa barat', 'bogor', '65525', '08155223344', '38krn1-Foto', '38krn1-Rapor', 75, 83, 79, '38krn1-akteKelahiran', '38krn1-kartuKeluarga', 'SMA Harvard', 'Jalan Banyu Urip XV / 5-10 Bogor', 'jawa barat', 'bogor', '655555', '0317532323', 'W', 'Brat Pidd', 'Jalan Simpang Darmo Permai Selatan 23 Bogor', 'jawa barat', 'bogor', '232323', '08775522342', 'Swasta', NULL, NULL, 'S1DKV150', '2015-12-02 16:41:01', 1),
('a02l3s', 'isaac@gmail.com', 'asd123', 'Isaac Newton', 'L', 'banda aceh', '2015-07-06', 'WNI', NULL, NULL, NULL, 'aceh', 'banda aceh', NULL, NULL, NULL, NULL, 0, 0, 0, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, 'S1SIB150', '2015-12-02 16:41:27', 1),
('a7i4r1', 'stefanietanujaya@gmail.com', '123456', 'Stefanie Tanujaya', 'P', 'Surabaya', '0000-00-00', 'WNI', NULL, 'Buddha', '', 'Jawa Timur', 'Surabaya', '', '', '', '', 0, 0, 0, '', '', 'SMAK St. Louis', NULL, 'Jawa Timur', 'Surabaya', NULL, NULL, NULL, '', '', 'Jawa Timur', 'Surabaya', '', NULL, 'Wirausaha', NULL, NULL, 'S1INF131', '2015-11-12 20:45:54', 1),
('a983ke', 'harry@gmail.com', 'asd123', 'Harry Frost', 'L', 'bandung', '2015-06-10', 'WNI', NULL, NULL, NULL, 'bali', 'denpasar', NULL, NULL, NULL, NULL, 0, 0, 0, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, 'S1SIB150', '2015-12-02 16:41:52', 1),
('and123', 'and123@gmail.com', 'and123', 'Andre Gozali', 'L', 'bali', '2015-12-08', 'WNI', NULL, NULL, NULL, 'bali', 'denpasar', NULL, NULL, NULL, NULL, 0, 0, 0, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, 'D3INF150', '2015-11-29 13:01:23', 1),
('apl02d', 'evan@gmail.com', 'asd123', 'Evan Payton', 'L', 'bandung', '2015-07-22', 'WNI', NULL, 'kristen', 'evann', 'DKI jakarta', 'jakarta barat', '48485', '203498548920', 'apl02d-Foto', 'apl02d-Rapor', 98, 75, 87, 'apl02d-akteKelahiran', 'apl02d-kartuKeluarga', 'SMA Jakarta', 'jakarta', 'DKI jakarta', 'jakarta', '223421', '4409271233', 'O', 'Nessy', 'jalan jakarta', 'DKI jakarta', 'jakarta', '232123', '385793912', 'bekerja', NULL, NULL, 'S1DKV150', '2015-12-02 16:42:47', 1),
('asd123', 'christianlimanto95@gmail.com', 'asd123', 'Holly Ellis', 'L', 'Surabaya', '2015-11-03', 'WNI', 'Single', 'Buddha', '321321', 'aceh', 'banda', '32132', '123123', 'asd123-Foto', 'asd123-Rapor', 12, 12, 12, 'asd123-akteKelahiran', 'asd123-kartuKeluarga', '123123', '123213', 'aceh', 'banda', '123122', '231321', 'O', 'Martha Ellis', 'Oak Street 45', 'aceh', 'banda', '213123', '213', '123123', NULL, NULL, 'S1DKV153', '2015-11-27 07:55:00', 1),
('asd456', 'asd456@gmail.com', 'asd456', 'Christian Limanto', 'L', 'Surabaya', '2015-11-02', 'WNI', NULL, 'kristen', '123', 'aceh', 'banda aceh', '12321', '123123', 'asd456-Foto', 'asd456-Rapor', 12, 12, 12, 'asd456-akteKelahiran', 'asd456-kartuKeluarga', '1231321', '12312313', 'aceh', 'banda', '123123', '12312', 'O', '123123', '123123', 'aceh', 'banda', '123123', '123213', '123132', NULL, NULL, 'S1DKV150', '2015-11-27 07:55:14', 1),
('chr123', 'charlie@gmail.com', 'asd123', 'Charlie Hines', 'L', 'banda aceh', '2015-09-24', 'WNI', NULL, 'kristen', 'Aduhh', 'aceh', 'banda aceh', '22312', '4567885123', 'chr123-Foto', 'chr123-Rapor', 97, 80, 89, 'chr123-akteKelahiran', 'chr123-kartuKeluarga', 'SMA aceh', 'aceh', 'aceh', 'banda', '229482', '9847312223', 'O', 'Saya', 'Mulai lelah', 'aceh', 'banda', '223431', '94575391', 'Saudaraa', NULL, NULL, 'S1INF150', '2015-12-02 16:43:12', 1),
('cyn123', 'cyn123@gmail.com', 'cyn123', 'Ciwang Minata', 'P', 'surabaya', '2015-07-06', 'WNI', NULL, NULL, NULL, 'aceh', 'banda aceh', NULL, NULL, NULL, NULL, 0, 0, 0, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, 'S1DKV150', '2015-11-29 13:00:59', 1),
('d91o04', 'melanialani@gmail.com', '123456', 'Melania Laniwati', 'P', 'Surabaya', '0000-00-00', 'WNI', NULL, '', '', 'Jawa Timur', 'Surabaya', '', '', '', '', 0, 0, 0, '', '', '', NULL, 'Jawa Timur', 'Surabaya', NULL, NULL, NULL, '', '', 'Jawa Timur', 'Surabaya', '', NULL, '', NULL, NULL, 'S1INF131', '2015-11-12 20:45:54', 1),
('dan123', 'neil@gmail.com', 'asd123', 'Neil Schmidt', 'L', 'bandar lampung', '2015-10-21', 'WNI', NULL, 'kristen', 'bandang', 'DKI jakarta', 'jakarta barat', '19903', '28473821938', 'dan123-Foto', 'dan123-Rapor', 100, 100, 100, 'dan123-akteKelahiran', 'dan123-kartuKeluarga', 'SMA Jakarta', 'jakarta', 'DKI jakarta', 'jakarta', '223212', '9857391922', 'O', 'Leeku', 'ngaga', 'gorontalo', 'gorontalo', '950292', '92849281', 'wirasuwastah', NULL, NULL, 'S1INF150', '2015-12-02 16:44:23', 1),
('eo03k4', 'cyrus@gmail.com', 'asd123', 'Cyrus Curtis', 'L', 'balikpapan', '2015-11-04', 'WNI', NULL, 'kristen', 'Tengah', 'aceh', 'banda aceh', '12325', '2985920192', 'eo03k4-Foto', 'eo03k4-Rapor', 85, 85, 85, 'eo03k4-akteKelahiran', 'eo03k4-kartuKeluarga', 'SMA aceh', 'aceh', 'aceh', 'banda', '121212', '3342112345', 'O', 'Yeqan', 'Jaya tengah', 'aceh', 'banda', '232322', '2147483647', 'wirasuwastah', NULL, NULL, 'S1DKV150', '2015-12-02 16:46:08', 1),
('f6t75y', 'ivanderwilson@gmail.com', '123456', 'Ivander Wilson', 'L', 'Surabaya', '0000-00-00', 'WNI', NULL, '', '', 'Jawa Timur', 'Surabaya', '', '', '', '', 0, 0, 0, '', '', '', NULL, 'Jawa Timur', 'Surabaya', NULL, NULL, NULL, '', '', 'Jawa Timur', 'Surabaya', '', NULL, '', NULL, NULL, 'S1INF131', '2015-11-12 20:45:54', 1),
('fdse45', 'chinam@gmail.com', '123456', 'Chinam', 'L', 'Surabaya', '0000-00-00', 'WNI', NULL, '', '', 'Jawa Timur', 'Surabaya', '', '', '', '', 0, 0, 0, '', '', '', NULL, 'Jawa Timur', 'Surabaya', NULL, NULL, NULL, '', '', 'Jawa Timur', 'Surabaya', '', NULL, '', NULL, NULL, 'S1INF131', '2015-11-12 20:45:54', 1),
('fe56ty', 'cynthiawangsawinata@gmail.com', '123456', 'Cynthia Wangsawinata', 'P', 'Surabaya', '0000-00-00', 'WNI', NULL, '', '', 'Jawa Timur', 'Surabaya', '', '', '', '', 0, 0, 0, '', '', '', NULL, 'Jawa Timur', 'Surabaya', NULL, NULL, NULL, '', '', 'Jawa Timur', 'Surabaya', '', NULL, '', NULL, NULL, 'S1INF131', '2015-11-12 20:45:54', 1),
('fewq23', 'nancyyonata@gmail.com', '123456', 'Nancy Yonata', 'P', 'Surabaya', '0000-00-00', 'WNI', NULL, '', '', 'Jawa Timur', 'Surabaya', '', '', '', '', 0, 0, 0, '', '', '', NULL, 'Jawa Timur', 'Surabaya', NULL, NULL, NULL, '', '', 'Jawa Timur', 'Surabaya', '', NULL, '', NULL, NULL, 'S1INF131', '2015-11-12 20:45:54', 1),
('gty564', 'yudhadarmawan@gmail.com', '123456', 'Yudha Darmawan', 'L', 'Surabaya', '0000-00-00', 'WNI', NULL, '', '', 'Jawa Timur', 'Surabaya', '', '', '', '', 0, 0, 0, '', '', '', NULL, 'Jawa Timur', 'Surabaya', NULL, NULL, NULL, '', '', 'Jawa Timur', 'Surabaya', '', NULL, '', NULL, NULL, 'S1INF131', '2015-11-12 20:45:54', 1),
('jj876u', 'stefanuskurniawan@gmail.com', '123456', 'Stefanus Kurniawan', 'L', 'Surabaya', '0000-00-00', 'WNI', NULL, '', '', 'Jawa Timur', 'Surabaya', '', '', '', '', 0, 0, 0, '', '', '', NULL, 'Jawa Timur', 'Surabaya', NULL, NULL, NULL, '', '', 'Jawa Timur', 'Surabaya', '', NULL, '', NULL, NULL, 'S1INF131', '2015-11-12 20:45:54', 1),
('jjhy77', 'lukaskristanto@gmail.com', '123456', 'Lukas Kristanto', 'L', 'Surabaya', '0000-00-00', 'WNI', NULL, '', '', 'Jawa Timur', 'Surabaya', '', '', '', '', 0, 0, 0, '', '', '', NULL, 'Jawa Timur', 'Surabaya', NULL, NULL, NULL, '', '', 'Jawa Timur', 'Surabaya', '', NULL, '', NULL, NULL, 'S1INF131', '2015-11-12 20:45:54', 1),
('k9j9k0', 'kevin@gmail.com', 'asd123', 'Kevin Klein', 'L', 'balikpapan', '2015-12-15', 'WNI', NULL, 'kristen', 'Jalan', 'DKI jakarta', 'jakarta barat', '26641', '223232123', NULL, NULL, 0, 0, 0, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, 'S1SIB150', '2015-12-02 16:46:37', 1),
('kikio0', 'angelineizumi@gmail.com', '123456', 'Angeline Izumi', 'P', 'Surabaya', '0000-00-00', 'WNI', NULL, '', '', 'Jawa Timur', 'Surabaya', '', '', '', '', 0, 0, 0, '', '', '', NULL, 'Jawa Timur', 'Surabaya', NULL, NULL, NULL, '', '', 'Jawa Timur', 'Surabaya', '', NULL, '', NULL, NULL, 'S1INF131', '2015-11-12 20:45:54', 1),
('kl09op', 'sugihartojohanes@gmail.com', '123456', 'Sugiharto Johanes', 'L', 'Surabaya', '0000-00-00', 'WNI', NULL, '', '', 'Jawa Timur', 'Surabaya', '', '', '', '', 0, 0, 0, '', '', '', NULL, 'Jawa Timur', 'Surabaya', NULL, NULL, NULL, '', '', 'Jawa Timur', 'Surabaya', '', NULL, '', NULL, NULL, 'S1INF131', '2015-11-12 20:45:54', 1),
('kli908', 'rickysaid@gmail.com', '123456', 'Ricky Said', 'L', 'Surabaya', '0000-00-00', 'WNI', NULL, '', '', 'Jawa Timur', 'Surabaya', '', '', '', '', 0, 0, 0, '', '', '', NULL, 'Jawa Timur', 'Surabaya', NULL, NULL, NULL, '', '', 'Jawa Timur', 'Surabaya', '', NULL, '', NULL, NULL, 'S1INF131', '2015-11-12 20:45:54', 1),
('ms9kj3', 'foster@gmail.com', 'asd123', 'Foster Sutton', 'L', 'banda aceh', '2015-12-02', 'WNI', NULL, 'kristen', 'jaya', 'bali', 'denpasar', '23314', '09483712', 'ms9kj3-Foto', 'ms9kj3-Rapor', 85, 85, 85, 'ms9kj3-akteKelahiran', 'ms9kj3-kartuKeluarga', 'SMA BALI', 'BALI', 'bali', 'denpasar', '231213', '485938123', 'O', 'Kwan Yuw', 'Ngagel1', 'bali', 'denpasar', '123321', '2147483647', 'wirasuwastah', NULL, NULL, 'S1DKV150', '2015-12-02 16:47:25', 1),
('q0siwk', 'lydia@gmail.com', 'asd123', 'Lydia Carey', 'P', 'aceh', '2015-01-14', 'WNI', NULL, NULL, NULL, 'bali', 'denpasar', NULL, NULL, NULL, NULL, 0, 0, 0, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, 'S1SIB150', '2015-12-03 00:50:49', 1),
('q0wp2d', 'Scarlett@gmail.com', 'asd123', 'Scarlett Johana', 'P', 'balikpapan', '2015-04-07', 'WNI', NULL, NULL, NULL, 'aceh', 'banda aceh', NULL, NULL, NULL, NULL, 0, 0, 0, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, 'D3INF150', '2015-12-03 00:51:29', 1),
('qw5678', 'christianlimanto@gmail.com', '123456', 'Christian Limanto', 'L', 'Surabaya', '0000-00-00', 'WNI', NULL, '', '', 'Jawa Timur', 'Surabaya', '', '', '', '', 0, 0, 0, '', '', '', NULL, 'Jawa Timur', 'Surabaya', NULL, NULL, NULL, '', '', 'Jawa Timur', 'Surabaya', '', NULL, '', NULL, NULL, 'S1INF131', '2015-11-12 20:45:54', 1),
('rowks2', 'erin@gmail.com', 'asd123', 'Erin Collins', 'P', 'bandung', '2015-04-09', 'WNI', NULL, NULL, NULL, 'DKI jakarta', 'jakarta barat', NULL, NULL, NULL, NULL, 0, 0, 0, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, 'S1SIB150', '2015-12-03 00:52:17', 1),
('slck0', 'mollie@gmail.com', 'asd123', 'Mollie Lloyd', 'P', 'bandung', '2015-01-14', 'WNI', NULL, NULL, NULL, 'DKI jakarta', 'jakarta barat', NULL, NULL, NULL, NULL, 0, 0, 0, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, 'D3INF150', '2015-12-03 00:52:51', 1),
('w9lkj1', 'carmen@gmail.com', 'asd123', 'Carmen Gallagher', 'P', 'bandung', '2015-10-02', 'WNI', NULL, NULL, NULL, 'DKI jakarta', 'jakarta barat', NULL, NULL, NULL, NULL, 0, 0, 0, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, 'S1DKV150', '2015-12-03 00:53:17', 1),
('wertiu', 'andregozzidhy@gmail.com', '123456', 'Andre Gozzidhy', 'L', 'Surabaya', '0000-00-00', 'WNI', NULL, '', '', 'Jawa Timur', 'Surabaya', '', '', '', '', 0, 0, 0, '', '', '', NULL, 'Jawa Timur', 'Surabaya', NULL, NULL, NULL, '', '', 'Jawa Timur', 'Surabaya', '', NULL, '', NULL, NULL, 'S1INF131', '2015-11-12 20:45:54', 1),
('wqw123', 'danielstelar@gmail.com', '123456', 'Daniel Stelar', 'L', 'Surabaya', '0000-00-00', 'WNI', NULL, '', '', 'Jawa Timur', 'Surabaya', '', '', '', '', 0, 0, 0, '', '', '', NULL, 'Jawa Timur', 'Surabaya', NULL, NULL, NULL, '', '', 'Jawa Timur', 'Surabaya', '', NULL, '', NULL, NULL, 'S1INF131', '2015-11-12 20:45:54', 1),
('wrkls3', 'keyla@gmail.com', 'asd123', 'Keyla Wallace', 'P', 'Surabaya', '2015-08-06', 'WNI', NULL, NULL, NULL, 'bali', 'denpasar', NULL, NULL, NULL, NULL, 0, 0, 0, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, 'S1SIB150', '2015-12-03 00:53:51', 1),
('zx45mn', 'daniel@gmail.com', '123456', 'Daniel', 'L', 'Surabaya', '0000-00-00', 'WNI', NULL, '', '', 'Jawa Timur', 'Surabaya', '', '', '', '', 0, 0, 0, '', '', '', NULL, 'Jawa Timur', 'Surabaya', NULL, NULL, NULL, '', '', 'Jawa Timur', 'Surabaya', '', NULL, '', NULL, NULL, 'S1INF131', '2015-11-12 20:45:54', 1);

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
('lama_sks', '3000'),
('tahun_ajaran_sekarang', 'GASAL 2015/2016'),
('valnilai_A_to_IPK', '4.00'),
('valnilai_B+_to_IPK', '3.75'),
('valnilai_B_to_IPK', '3.50'),
('valnilai_C+_to_IPK', '3.25'),
('valnilai_C_to_IPK', '3.00'),
('valnilai_D_to_IPK', '2.00'),
('valnilai_E_to_IPK', '1.00');

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
  `periode` tinyint(4) NOT NULL,
  `jumlah` int(11) NOT NULL,
  `tanggal_batas` date NOT NULL,
  `tanggal_created` date NOT NULL,
  `status` varchar(1) NOT NULL DEFAULT '1'
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `dkeuangan`
--

INSERT INTO `dkeuangan` (`id`, `periode`, `jumlah`, `tanggal_batas`, `tanggal_created`, `status`) VALUES
('USP2015121400000', 0, 15000000, '2016-01-14', '2015-12-14', '1');

-- --------------------------------------------------------

--
-- Table structure for table `dosen`
--

CREATE TABLE IF NOT EXISTS `dosen` (
  `nip` varchar(10) NOT NULL,
  `nama` varchar(100) NOT NULL,
  `nomor_telepon` varchar(12) DEFAULT NULL,
  `email` varchar(50) NOT NULL,
  `kepala_jurusan_id` varchar(8) DEFAULT NULL COMMENT 'mereference pada informasi_kurikulum_id ke 0 (belakangnya)',
  `jumlah_sks_mengajar` int(10) unsigned NOT NULL DEFAULT '0',
  `status` varchar(1) NOT NULL DEFAULT '1'
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `dosen`
--

INSERT INTO `dosen` (`nip`, `nama`, `nomor_telepon`, `email`, `kepala_jurusan_id`, `jumlah_sks_mengajar`, `status`) VALUES
('DO001', 'Jaya Pranata,S.Kom', '087859038021', 'jaya@gmail.com', NULL, 0, '1'),
('DO002', 'Eka Rahayu Setyaningsih ,S.Kom., M.Kom.', '0317673023', 'eka@gmail.com', NULL, 0, '1'),
('DO003', 'Jenny Ngo,Dr., M.Sc.Ed.', '031654654', 'jennyngo@gmail.com', NULL, 0, '1'),
('DO004', 'Edwin Pramana,Ir., M.AppSc.', '0384752132', 'edwin@stts.edu', 'S1INF150', 0, '1'),
('DO005', 'Arya Tandy Hermawan,Ir., M.T.', '038539283', 'arya@stts.edu', NULL, 0, '1'),
('DO006', 'Ferdinandus F.X.', '08885553322', 'ferdinandus@stts.edu', NULL, 0, '1');

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

--
-- Dumping data for table `drevisi_penilaian`
--

INSERT INTO `drevisi_penilaian` (`id`, `hrevisi_penilaian_id`, `mahasiswa_nrp`, `nilai_akhir_sebelum`, `nilai_akhir_sesudah`) VALUES
('DNR1312001', 'NR1312001', '213116249', 92, 85),
('DNR1312002', 'NR1312002', '213116249', 101, 95),
('DNR1312003', 'NR1312003', '213116249', 59, 65),
('DNR1312004', 'NR1312004', '213116249', 72, 75),
('DNR1312005', 'NR1312005', '213116249', 67, 78),
('DNR1312006', 'NR1312006', '213116249', 85, 81),
('DNR1312007', 'NR1312007', '213116249', 85, 83),
('DNR1312008', 'NR1312008', '213116249', 61, 67),
('DNR1312009', 'NR1312009', '213116249', 73, 85),
('DNR1312010', 'NR1312010', '213116249', 87, 95),
('DNR1312011', 'NR1312001', '213116256', 92, 65),
('DNR1312012', 'NR1312002', '213116256', 101, 75),
('DNR1312013', 'NR1312003', '213116256', 59, 78),
('DNR1312014', 'NR1312004', '213116256', 72, 81),
('DNR1312015', 'NR1312005', '213116256', 67, 83),
('DNR1312016', 'NR1312006', '213116256', 85, 67),
('DNR1312017', 'NR1312007', '213116256', 85, 85),
('DNR1312018', 'NR1312008', '213116256', 61, 95),
('DNR1312019', 'NR1312009', '213116256', 73, 65),
('DNR1312020', 'NR1312010', '213116256', 87, 75),
('DNR1312021', 'NR1312001', '213116267', 92, 78),
('DNR1312022', 'NR1312002', '213116267', 101, 81),
('DNR1312023', 'NR1312003', '213116267', 59, 83),
('DNR1312024', 'NR1312004', '213116267', 72, 67),
('DNR1312025', 'NR1312005', '213116267', 67, 75),
('DNR1511001', 'NR1511001', '213116181', 35, 60),
('DNR1511002', 'NR1511001', '213116261', 52, 80),
('DNR1511003', 'NR1511001', '213116268', 0, 20),
('DNR1511004', 'NR1511002', '213116178', 72, 88),
('DNR1511005', 'NR1511002', '213116195', 91, 95),
('DNR1511006', 'NR1511002', '213116230', 56, 100);

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
  `status` varchar(1) NOT NULL DEFAULT '1'
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `hkeuangan`
--

INSERT INTO `hkeuangan` (`id`, `user_id`, `jumlah`, `tanggal_created`, `status`) VALUES
('USP201512140000', '2ie93o', 15000000, '2015-12-14', '1');

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

--
-- Dumping data for table `hrevisi_penilaian`
--

INSERT INTO `hrevisi_penilaian` (`id`, `kelas_id`, `catatan`, `status_revisi`, `tanggal_create`) VALUES
('NR1312001', 'K15014', 'coba 1 dong', 1, '2015-12-13 16:40:43'),
('NR1312002', 'K15015', 'coba 2 dong', 2, '2015-12-13 16:40:43'),
('NR1312003', 'K15016', 'coba 3 dong', 1, '2015-12-13 16:40:43'),
('NR1312004', 'K15017', 'coba 4 dong', 2, '2015-12-13 16:40:43'),
('NR1312005', 'K15018', 'coba 5 dong', 1, '2015-12-13 16:40:43'),
('NR1312006', 'K15019', 'coba 6 dong', 2, '2015-12-13 16:40:43'),
('NR1312007', 'K15020', 'coba 7 dong', 1, '2015-12-13 16:40:43'),
('NR1312008', 'K15021', 'coba 8 dong', 2, '2015-12-13 16:40:43'),
('NR1312009', 'K15022', 'coba 9 dong', 1, '2015-12-13 16:40:43'),
('NR1312010', 'K15023', 'coba 10 dong', 2, '2015-12-13 16:40:43'),
('NR1511001', 'K15001', 'Ganti Grade', 2, '2015-11-29 00:00:00'),
('NR1511002', 'K15001', 'Coba lagi\r\n', 2, '2015-11-29 00:00:00');

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
('D3INF131', 'D3-Informatika', '2013/2014', 1, 7000000, 200000, 250000, 88),
('D3INF150', 'D3-Informatika', '2015/2016', 0, 0, 0, 0, 88),
('S1DKV131', 'S1-Desain Komunikasi Visual', '2013/2014', 1, 8000000, 175000, 200000, 144),
('S1DKV132', 'S1-Desain Komunikasi Visual', '2013/2014', 2, 9500000, 175000, 200000, 144),
('S1DKV133', 'S1-Desain Komunikasi Visual', '2013/2014', 3, 11000000, 175000, 200000, 144),
('S1DKV141', 'S1-Desain Komunikasi Visual', '2014/2015', 1, 9000000, 200000, 250000, 144),
('S1DKV142', 'S1-Desain Komunikasi Visual', '2014/2015', 2, 10500000, 200000, 250000, 144),
('S1DKV143', 'S1-Desain Komunikasi Visual', '2014/2015', 3, 12000000, 200000, 250000, 144),
('S1DKV150', 'S1-Desain Komunikasi Visual', '2015/2016', 0, 0, 0, 0, 144),
('S1DKV152', 'S1-Desain Komunikasi Visual', '2015/2016', 2, 15000000, 400000, 375000, 0),
('S1INF101', 'S1-Informatika', '2010/2011', 1, 1, 1, 1, 0),
('S1INF131', 'S1-Informatika', '2013/2014', 1, 10000000, 250000, 300000, 144),
('S1INF132', 'S1-informatika', '2013/2014', 2, 12500000, 250000, 300000, 144),
('S1INF133', 'S1-Informatika', '2013/2014', 3, 15000000, 250000, 300000, 144),
('S1INF141', 'S1-Informatika', '2014/2015', 1, 11000000, 300000, 325000, 144),
('S1INF142', 'S1-Informatika', '2014/2015', 2, 13500000, 300000, 325000, 144),
('S1INF143', 'S1-Informatika', '2014/2015', 3, 16000000, 300000, 325000, 144),
('S1INF150', 'S1-Informatika', '2015/2016', 0, 0, 0, 0, 144),
('S1SIB131', 'S1-Sistem Informasi Bisnis', '2013/2014', 1, 9500000, 200000, 250000, 144),
('S1SIB132', 'S1-Sistem Informasi Bisnis', '2013/2014', 2, 11500000, 200000, 250000, 144),
('S1SIB133', 'S1-Sistem Informasi Bisnis', '2013/2014', 3, 13500000, 200000, 250000, 144),
('S1SIB141', 'S1-Sistem Informasi Bisnis', '2014/2015', 1, 10500000, 250000, 275000, 144),
('S1SIB142', 'S1-Sistem Informasi Bisnis', '2014/2015', 2, 12500000, 250000, 275000, 144),
('S1SIB143', 'S1-Sistem Informasi Bisnis', '2014/2015', 3, 14500000, 250000, 275000, 144),
('S1SIB150', 'S1-Sistem Informasi Bisnis', '2015/2016', 0, 0, 0, 0, 144),
('S1SIB151', 'S1-Sistem Informasi Bisnis', '2015/2016', 1, 11500000, 300000, 300000, 144),
('S1SIB152', 'S1-Sistem Informasi Bisnis', '2015/2016', 2, 13500000, 300000, 300000, 144),
('S1SIB153', 'S1-Sistem Informasi Bisnis', '2015/2016', 3, 15500000, 300000, 300000, 144);

-- --------------------------------------------------------

--
-- Table structure for table `karyawan`
--

CREATE TABLE IF NOT EXISTS `karyawan` (
  `id` varchar(9) NOT NULL,
  `nama` varchar(50) NOT NULL,
  `jabatan` varchar(50) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `karyawan`
--

INSERT INTO `karyawan` (`id`, `nama`, `jabatan`) VALUES
('edelynlyn', 'Franzeska Edelyn', 'Admin BAU');

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
('K15001', 'A', 'MK001', 'R0003', 'DO001', '1', '08:00:00', 30, 30, 40, 10, 0, '', NULL, 1, 'GASAL 2014/2015', '2015-11-12 21:56:10', '2015-12-08 20:40:59', 1),
('K15002', 'B', 'MK001', 'R0004', 'DO002', '1', '08:30:00', 30, 30, 40, 0, 0, '', NULL, 1, 'GASAL 2014/2015', '2015-11-12 21:56:58', '2015-11-12 21:56:58', 1),
('K15003', 'A', 'MK003', 'R0008', 'DO003', '2', '13:00:00', 30, 30, 40, 0, 0, '', NULL, 0, 'GASAL 2014/2014', '2015-11-12 21:57:39', '2015-11-12 21:57:39', 1),
('K15004', 'B', 'MK003', 'R0006', 'DO001', '3', '13:00:00', 30, 30, 40, 20, 0, '', NULL, 1, 'GASAL 2014/2015', '2015-11-12 21:57:39', '2015-11-29 23:22:36', 1),
('K15005', '-', 'MK005', 'R0004', 'DO001', '4', '15:30:00', 30, 30, 40, 0, 0, '', NULL, 1, 'GASAL 2014/2015', '2015-11-12 21:58:53', '2015-11-29 23:12:45', 1),
('K15006', '-', 'MK005', NULL, NULL, NULL, '08:00:00', 30, 30, 40, 0, 0, '', 'K15005', 1, 'GASAL 2014/2015', '2015-11-12 21:58:53', '2015-11-12 21:58:53', 1),
('K15007', 'A', 'MK007', 'R0007', 'DO003', '2', '10:30:00', 30, 30, 40, 0, 0, '', NULL, 0, 'GASAL 2014/2015', '2015-11-12 21:59:24', '2015-11-12 21:59:24', 1),
('K15008', 'B', 'MK007', 'R0006', 'DO002', '2', '10:30:00', 30, 30, 40, 0, 0, '', NULL, 0, 'GENAP 2014/2015', '2015-11-12 21:59:24', '2015-11-12 21:59:24', 1),
('K15009', 'A', 'MK009', 'R0004', 'DO004', '2', '10:30:00', 30, 30, 40, 0, 0, '', NULL, 1, 'GASAL 2015/2016', '2015-11-12 21:59:56', '2015-11-12 21:59:56', 1),
('K15010', 'B', 'MK009', 'R0001', 'DO004', '3', '10:30:00', 30, 30, 40, 0, 0, '', NULL, 0, 'GENAP 2015/2016', '2015-11-12 21:59:56', '2015-11-12 21:59:56', 1),
('K15011', '-', 'MK011', 'R0009', 'DO002', '4', '13:00:00', 30, 30, 40, 0, 0, '', NULL, 1, 'GENAP 2014/2015', '2015-11-12 22:00:53', '2015-11-12 22:00:53', 1),
('K15012', '-', 'MK012', 'R0008', 'DO001', '5', '15:30:00', 30, 30, 40, 0, 0, '', NULL, 1, 'GENAP 2014/2015', '2015-11-12 22:00:53', '2015-11-12 22:00:53', 1),
('K15013', '-', 'MK013', 'R0005', 'DO002', '1', '15:30:00', 30, 30, 40, 0, 0, '', NULL, 1, 'GENAP 2014/2015', '2015-11-12 22:01:10', '2015-11-12 22:01:10', 1),
('K15014', '', 'MK014', 'R0002', 'DO002', '2', '10:30:00', 30, 30, 40, 0, 0, '', NULL, 16, 'GASAL 2015/2016', '2015-11-27 15:09:56', '2015-11-27 15:09:56', 1),
('K15015', '', 'MK015', 'R0001', 'DO001', '4', '08:00:00', 30, 30, 40, 0, 0, '', NULL, 16, 'GASAL 2015/2016', '2015-11-27 15:09:56', '2015-11-27 15:09:56', 1),
('K15016', '', 'MK016', 'R0002', 'DO003', '5', '15:30:00', 30, 30, 40, 0, 0, '', NULL, 16, 'GASAL 2015/2016', '2015-11-27 15:09:56', '2015-11-27 15:09:56', 1),
('K15017', '', 'MK017', 'R0003', 'DO002', '1', '18:00:00', 30, 30, 40, 0, 0, '', NULL, 16, 'GASAL 2015/2016', '2015-11-27 15:09:56', '2015-11-27 15:09:56', 1),
('K15018', '', 'MK018', 'R0004', 'DO002', '4', '13:00:00', 30, 30, 40, 0, 0, '', NULL, 16, 'GASAL 2015/2016', '2015-11-27 15:09:56', '2015-11-27 15:09:56', 1),
('K15019', '', 'MK019', 'R0004', 'DO001', '5', '10:30:00', 30, 30, 40, 0, 0, '', NULL, 16, 'GASAL 2015/2016', '2015-11-27 15:09:56', '2015-11-27 15:09:56', 1),
('K15020', '', 'MK020', 'R0008', 'DO002', '1', '08:00:00', 30, 30, 40, 0, 0, '', NULL, 16, 'GASAL 2015/2016', '2015-11-27 15:09:56', '2015-11-27 15:09:56', 1),
('K15021', '', 'MK021', 'R0006', 'DO001', '3', '13:00:00', 30, 30, 40, 0, 0, '', NULL, 16, 'GASAL 2015/2016', '2015-11-27 15:09:56', '2015-11-27 15:09:56', 1),
('K15022', '', 'MK021', 'R0003', 'DO003', '2', '15:30:00', 30, 30, 40, 0, 0, '', NULL, 15, 'GASAL 2015/2016', '2015-11-27 15:09:56', '2015-11-27 15:09:56', 1),
('K15023', '', 'MK027', 'R0004', 'DO003', '4', '10:30:00', 30, 30, 40, 0, 0, '', NULL, 15, 'GASAL 2015/2016', '2015-11-27 15:09:56', '2015-11-27 15:09:56', 1),
('K15024', '', 'MK028', 'R0008', 'DO003', '5', '13:00:00', 30, 30, 40, 0, 0, '', NULL, 15, 'GASAL 2015/2016', '2015-11-27 15:09:56', '2015-11-27 15:09:56', 1),
('K15025', 'A', 'MK001', 'R0004', 'DO001', '3', '08:00:00', 30, 30, 40, 0, 3, 'nilai cukup', NULL, 16, 'GASAL 2015/2016', '2015-11-27 15:09:56', '2015-11-27 15:09:56', 1),
('K15026', '-', 'MK002', 'R0004', 'DO001', '3', '08:00:00', 30, 30, 40, 0, 0, '', NULL, 16, 'GASAL 2015/2016', '2015-11-27 15:09:56', '2015-11-27 15:09:56', 1),
('K15027', '-', 'MK030', 'R0003', 'DO001', '5', '08:00:00', 30, 30, 40, 0, 0, '', NULL, 15, 'GASAL 2015/2016', '2015-11-12 21:56:10', '2015-11-12 21:56:10', 1),
('K15028', '-', 'MK031', 'R0003', 'DO002', '1', '10:30:00', 30, 30, 40, 0, 0, '', NULL, 15, 'GASAL 2015/2016', '2015-11-12 21:56:58', '2015-11-12 21:56:58', 1),
('K15029', '-', 'MK033', 'R0008', 'DO003', '2', '13:00:00', 30, 30, 40, 0, 0, '', NULL, 15, 'GASAL 2015/2016', '2015-11-12 21:57:39', '2015-11-12 21:57:39', 1),
('K15030', '-', 'MK034', 'R0004', 'DO001', '3', '08:00:00', 30, 30, 40, 0, 0, '', NULL, 15, 'GASAL 2015/2016', '2015-11-27 15:09:56', '2015-11-27 15:09:56', 1),
('K15031', 'C', 'MK037', 'R0009', 'DO003', '3', '16:30:00', 20, 30, 50, 10, 0, '', NULL, 15, 'GASAL 2014/2015', '2015-12-13 16:36:18', '2015-12-13 16:36:18', 1),
('K15032', 'C', 'MK038', 'R0001', 'DO004', '4', '17:00:00', 30, 20, 50, 15, 0, '', NULL, 15, 'GASAL 2014/2015', '2015-12-13 16:36:18', '2015-12-13 16:36:18', 1),
('K15033', 'C', 'MK039', 'R0002', 'DO001', '5', '08:00:00', 20, 30, 50, 0, 0, '', NULL, 15, 'GASAL 2014/2015', '2015-12-13 16:36:18', '2015-12-13 16:36:18', 1),
('K15034', 'C', 'MK040', 'R0003', 'DO002', '1', '08:30:00', 30, 20, 50, 5, 0, '', NULL, 15, 'GENAP 2014/2015', '2015-12-13 16:36:18', '2015-12-13 16:36:18', 1),
('K15035', 'C', 'MK041', 'R0004', 'DO003', '2', '09:00:00', 20, 30, 50, 10, 3, 'nilai cukup', NULL, 15, 'GENAP 2014/2015', '2015-12-13 16:36:18', '2015-12-13 16:36:18', 1),
('K15036', 'C', 'MK042', 'R0005', 'DO004', '3', '09:30:00', 30, 20, 50, 15, 0, '', NULL, 15, 'GENAP 2014/2015', '2015-12-13 16:36:18', '2015-12-13 16:36:18', 1),
('K15037', 'C', 'MK043', 'R0006', 'DO001', '4', '10:00:00', 20, 30, 50, 0, 0, '', NULL, 15, 'GENAP 2014/2015', '2015-12-13 16:36:18', '2015-12-13 16:36:18', 1),
('K15038', 'C', 'MK044', 'R0007', 'DO002', '5', '10:30:00', 30, 20, 50, 5, 0, '', NULL, 15, 'GENAP 2014/2015', '2015-12-13 16:36:18', '2015-12-13 16:36:18', 1),
('K15039', 'C', 'MK045', 'R0008', 'DO003', '1', '11:00:00', 20, 30, 50, 10, 0, '', NULL, 15, 'GENAP 2014/2015', '2015-12-13 16:36:18', '2015-12-13 16:36:18', 1),
('K15040', 'B', 'MK046', 'R0009', 'DO004', '2', '11:30:00', 30, 20, 50, 15, 0, '', NULL, 15, 'GASAL 2015/2016', '2015-12-13 16:36:18', '2015-12-13 16:36:18', 1),
('K15041', 'B', 'MK047', 'R0001', 'DO001', '3', '12:00:00', 20, 30, 50, 0, 0, '', NULL, 15, 'GASAL 2015/2016', '2015-12-13 16:36:18', '2015-12-13 16:36:18', 1),
('K15042', 'B', 'MK048', 'R0002', 'DO002', '4', '12:30:00', 30, 20, 50, 5, 0, '', NULL, 15, 'GASAL 2015/2016', '2015-12-13 16:36:18', '2015-12-13 16:36:18', 1),
('K15043', 'B', 'MK049', 'R0003', 'DO003', '5', '13:00:00', 20, 30, 50, 10, 0, '', NULL, 15, 'GASAL 2015/2016', '2015-12-13 16:36:18', '2015-12-13 16:36:18', 1),
('K15044', 'B', 'MK050', 'R0004', 'DO004', '1', '13:30:00', 30, 20, 50, 15, 1, '', NULL, 15, 'GASAL 2015/2016', '2015-12-13 16:36:18', '2015-12-13 16:36:18', 1),
('K15045', 'B', 'MK051', 'R0005', 'DO001', '2', '14:00:00', 20, 30, 50, 0, 0, '', NULL, 15, 'GASAL 2015/2016', '2015-12-13 16:36:18', '2015-12-13 16:36:18', 1),
('K15099', '', 'MK029', 'R0004', 'DO001', '3', '08:00:00', 30, 30, 40, 0, 0, '', NULL, 0, 'GASAL 2015/2016', '2015-11-27 15:09:56', '2015-11-27 15:09:56', 1);

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
('213116176', 'K15014', 'MK020', 'A', 1, 'N6176001'),
('213116176', 'K15015', 'MK021', 'A', 1, 'N6176002'),
('213116176', 'K15016', 'MK022', 'A', 1, 'N6176003'),
('213116176', 'K15017', 'MK023', 'A', 1, 'N6176004'),
('213116176', 'K15018', 'MK024', 'A', 1, 'N6176005'),
('213116176', 'K15019', 'MK025', 'A', 1, 'N6176006'),
('213116176', 'K15020', 'MK026', 'A', 2, 'N6176007'),
('213116176', 'K15021', 'MK027', 'A', 2, 'N6176008'),
('213116176', 'K15022', 'MK028', 'A', 2, 'N6176009'),
('213116176', 'K15023', 'MK029', 'A', 2, 'N6176010'),
('213116176', 'K15024', 'MK030', 'A', 2, 'N6176011'),
('213116176', 'K15025', 'MK031', 'A', 2, 'N6176012'),
('213116176', 'K15026', 'MK032', 'A', 2, 'N6176013'),
('213116176', 'K15027', 'MK033', 'A', 3, 'N6176014'),
('213116176', 'K15028', 'MK034', 'A', 3, 'N6176015'),
('213116176', 'K15029', 'MK035', 'A', 3, 'N6176016'),
('213116176', 'K15030', 'MK036', 'A', 3, 'N6176017'),
('213116176', 'K15031', 'MK037', 'A', 3, 'N6176018'),
('213116176', 'K15032', 'MK038', 'A', 3, 'N6176019'),
('213116176', 'K15033', 'MK039', 'A', 3, 'N6176020'),
('213116176', 'K15034', 'MK040', 'A', 4, 'N6176021'),
('213116176', 'K15035', 'MK041', 'A', 4, 'N6176022'),
('213116176', 'K15036', 'MK042', 'A', 4, 'N6176023'),
('213116176', 'K15037', 'MK043', 'A', 4, 'N6176024'),
('213116176', 'K15038', 'MK044', 'A', 4, 'N6176025'),
('213116176', 'K15039', 'MK045', 'A', 4, 'N6176026'),
('213116176', 'K15040', 'MK046', 'A', 5, 'N6176027'),
('213116176', 'K15041', 'MK047', 'A', 5, 'N6176028'),
('213116176', 'K15042', 'MK048', 'A', 5, 'N6176029'),
('213116176', 'K15043', 'MK049', 'A', 5, 'N6176030'),
('213116176', 'K15044', 'MK050', 'A', 5, 'N6176031'),
('213116176', 'K15045', 'MK051', 'A', 5, 'N6176032'),
('213116178', 'K15014', 'MK020', 'A', 1, 'N6178001'),
('213116178', 'K15015', 'MK021', 'A', 1, 'N6178002'),
('213116178', 'K15016', 'MK022', 'A', 1, 'N6178003'),
('213116178', 'K15017', 'MK023', 'A', 1, 'N6178004'),
('213116178', 'K15018', 'MK024', 'A', 1, 'N6178005'),
('213116178', 'K15019', 'MK025', 'A', 1, 'N6178006'),
('213116178', 'K15020', 'MK026', 'A', 2, 'N6178007'),
('213116178', 'K15021', 'MK027', 'A', 2, 'N6178008'),
('213116178', 'K15022', 'MK028', 'A', 2, 'N6178009'),
('213116178', 'K15023', 'MK029', 'A', 2, 'N6178010'),
('213116178', 'K15024', 'MK030', 'A', 2, 'N6178011'),
('213116178', 'K15025', 'MK031', 'A', 2, 'N6178012'),
('213116178', 'K15026', 'MK032', 'A', 2, 'N6178013'),
('213116178', 'K15027', 'MK033', 'A', 3, 'N6178014'),
('213116178', 'K15028', 'MK034', 'A', 3, 'N6178015'),
('213116178', 'K15029', 'MK035', 'A', 3, 'N6178016'),
('213116178', 'K15030', 'MK036', 'A', 3, 'N6178017'),
('213116178', 'K15031', 'MK037', 'A', 3, 'N6178018'),
('213116178', 'K15032', 'MK038', 'A', 3, 'N6178019'),
('213116178', 'K15033', 'MK039', 'A', 3, 'N6178020'),
('213116178', 'K15034', 'MK040', 'A', 4, 'N6178021'),
('213116178', 'K15035', 'MK041', 'A', 4, 'N6178022'),
('213116178', 'K15036', 'MK042', 'A', 4, 'N6178023'),
('213116178', 'K15037', 'MK043', 'A', 4, 'N6178024'),
('213116178', 'K15038', 'MK044', 'A', 4, 'N6178025'),
('213116178', 'K15039', 'MK045', 'A', 4, 'N6178026'),
('213116178', 'K15040', 'MK046', 'A', 5, 'N6178027'),
('213116178', 'K15041', 'MK047', 'A', 5, 'N6178028'),
('213116178', 'K15042', 'MK048', 'A', 5, 'N6178029'),
('213116178', 'K15043', 'MK049', 'A', 5, 'N6178030'),
('213116178', 'K15044', 'MK050', 'A', 5, 'N6178031'),
('213116178', 'K15045', 'MK051', 'A', 5, 'N6178032'),
('213116181', 'K15014', 'MK020', 'A', 1, 'N6181001'),
('213116181', 'K15015', 'MK021', 'A', 1, 'N6181002'),
('213116181', 'K15016', 'MK022', 'A', 1, 'N6181003'),
('213116181', 'K15017', 'MK023', 'A', 1, 'N6181004'),
('213116181', 'K15018', 'MK024', 'A', 1, 'N6181005'),
('213116181', 'K15019', 'MK025', 'A', 1, 'N6181006'),
('213116181', 'K15020', 'MK026', 'A', 2, 'N6181007'),
('213116181', 'K15021', 'MK027', 'A', 2, 'N6181008'),
('213116181', 'K15022', 'MK028', 'A', 2, 'N6181009'),
('213116181', 'K15023', 'MK029', 'A', 2, 'N6181010'),
('213116181', 'K15024', 'MK030', 'A', 2, 'N6181011'),
('213116181', 'K15025', 'MK031', 'A', 2, 'N6181012'),
('213116181', 'K15026', 'MK032', 'A', 2, 'N6181013'),
('213116181', 'K15027', 'MK033', 'A', 3, 'N6181014'),
('213116181', 'K15028', 'MK034', 'A', 3, 'N6181015'),
('213116181', 'K15029', 'MK035', 'A', 3, 'N6181016'),
('213116181', 'K15030', 'MK036', 'A', 3, 'N6181017'),
('213116181', 'K15031', 'MK037', 'A', 3, 'N6181018'),
('213116181', 'K15032', 'MK038', 'A', 3, 'N6181019'),
('213116181', 'K15033', 'MK039', 'A', 3, 'N6181020'),
('213116181', 'K15034', 'MK040', 'A', 4, 'N6181021'),
('213116181', 'K15035', 'MK041', 'A', 4, 'N6181022'),
('213116181', 'K15036', 'MK042', 'A', 4, 'N6181023'),
('213116181', 'K15037', 'MK043', 'A', 4, 'N6181024'),
('213116181', 'K15038', 'MK044', 'A', 4, 'N6181025'),
('213116181', 'K15039', 'MK045', 'A', 4, 'N6181026'),
('213116181', 'K15040', 'MK046', 'A', 5, 'N6181027'),
('213116181', 'K15041', 'MK047', 'A', 5, 'N6181028'),
('213116181', 'K15042', 'MK048', 'A', 5, 'N6181029'),
('213116181', 'K15043', 'MK049', 'A', 5, 'N6181030'),
('213116181', 'K15044', 'MK050', 'A', 5, 'N6181031'),
('213116181', 'K15045', 'MK051', 'A', 5, 'N6181032'),
('213116193', 'K15014', 'MK020', 'A', 1, 'N6193001'),
('213116193', 'K15015', 'MK021', 'A', 1, 'N6193002'),
('213116193', 'K15016', 'MK022', 'A', 1, 'N6193003'),
('213116193', 'K15017', 'MK023', 'A', 1, 'N6193004'),
('213116193', 'K15018', 'MK024', 'A', 1, 'N6193005'),
('213116193', 'K15019', 'MK025', 'A', 1, 'N6193006'),
('213116193', 'K15020', 'MK026', 'A', 2, 'N6193007'),
('213116193', 'K15021', 'MK027', 'A', 2, 'N6193008'),
('213116193', 'K15022', 'MK028', 'A', 2, 'N6193009'),
('213116193', 'K15023', 'MK029', 'A', 2, 'N6193010'),
('213116193', 'K15024', 'MK030', 'A', 2, 'N6193011'),
('213116193', 'K15025', 'MK031', 'A', 2, 'N6193012'),
('213116193', 'K15026', 'MK032', 'A', 2, 'N6193013'),
('213116193', 'K15027', 'MK033', 'A', 3, 'N6193014'),
('213116193', 'K15028', 'MK034', 'A', 3, 'N6193015'),
('213116193', 'K15029', 'MK035', 'A', 3, 'N6193016'),
('213116193', 'K15030', 'MK036', 'A', 3, 'N6193017'),
('213116193', 'K15031', 'MK037', 'A', 3, 'N6193018'),
('213116193', 'K15032', 'MK038', 'A', 3, 'N6193019'),
('213116193', 'K15033', 'MK039', 'A', 3, 'N6193020'),
('213116193', 'K15034', 'MK040', 'A', 4, 'N6193021'),
('213116193', 'K15035', 'MK041', 'A', 4, 'N6193022'),
('213116193', 'K15036', 'MK042', 'A', 4, 'N6193023'),
('213116193', 'K15037', 'MK043', 'A', 4, 'N6193024'),
('213116193', 'K15038', 'MK044', 'A', 4, 'N6193025'),
('213116193', 'K15039', 'MK045', 'A', 4, 'N6193026'),
('213116193', 'K15040', 'MK046', 'A', 5, 'N6193027'),
('213116193', 'K15041', 'MK047', 'A', 5, 'N6193028'),
('213116193', 'K15042', 'MK048', 'A', 5, 'N6193029'),
('213116193', 'K15043', 'MK049', 'A', 5, 'N6193030'),
('213116193', 'K15044', 'MK050', 'A', 5, 'N6193031'),
('213116193', 'K15045', 'MK051', 'A', 5, 'N6193032'),
('213116195', 'K15014', 'MK020', 'A', 1, 'N6195001'),
('213116195', 'K15015', 'MK021', 'A', 1, 'N6195002'),
('213116195', 'K15016', 'MK022', 'A', 1, 'N6195003'),
('213116195', 'K15017', 'MK023', 'A', 1, 'N6195004'),
('213116195', 'K15018', 'MK024', 'A', 1, 'N6195005'),
('213116195', 'K15019', 'MK025', 'A', 1, 'N6195006'),
('213116195', 'K15020', 'MK026', 'A', 2, 'N6195007'),
('213116195', 'K15021', 'MK027', 'A', 2, 'N6195008'),
('213116195', 'K15022', 'MK028', 'A', 2, 'N6195009'),
('213116195', 'K15023', 'MK029', 'A', 2, 'N6195010'),
('213116195', 'K15024', 'MK030', 'A', 2, 'N6195011'),
('213116195', 'K15025', 'MK031', 'A', 2, 'N6195012'),
('213116195', 'K15026', 'MK032', 'A', 2, 'N6195013'),
('213116195', 'K15027', 'MK033', 'A', 3, 'N6195014'),
('213116195', 'K15028', 'MK034', 'A', 3, 'N6195015'),
('213116195', 'K15029', 'MK035', 'A', 3, 'N6195016'),
('213116195', 'K15030', 'MK036', 'A', 3, 'N6195017'),
('213116195', 'K15031', 'MK037', 'A', 3, 'N6195018'),
('213116195', 'K15032', 'MK038', 'A', 3, 'N6195019'),
('213116195', 'K15033', 'MK039', 'A', 3, 'N6195020'),
('213116195', 'K15034', 'MK040', 'A', 4, 'N6195021'),
('213116195', 'K15035', 'MK041', 'A', 4, 'N6195022'),
('213116195', 'K15036', 'MK042', 'A', 4, 'N6195023'),
('213116195', 'K15037', 'MK043', 'A', 4, 'N6195024'),
('213116195', 'K15038', 'MK044', 'A', 4, 'N6195025'),
('213116195', 'K15039', 'MK045', 'A', 4, 'N6195026'),
('213116195', 'K15040', 'MK046', 'A', 5, 'N6195027'),
('213116195', 'K15041', 'MK047', 'A', 5, 'N6195028'),
('213116195', 'K15042', 'MK048', 'A', 5, 'N6195029'),
('213116195', 'K15043', 'MK049', 'A', 5, 'N6195030'),
('213116195', 'K15044', 'MK050', 'A', 5, 'N6195031'),
('213116195', 'K15045', 'MK051', 'A', 5, 'N6195032'),
('213116196', 'K15014', 'MK020', 'A', 1, 'N6196001'),
('213116196', 'K15015', 'MK021', 'A', 1, 'N6196002'),
('213116196', 'K15016', 'MK022', 'A', 1, 'N6196003'),
('213116196', 'K15017', 'MK023', 'A', 1, 'N6196004'),
('213116196', 'K15018', 'MK024', 'A', 1, 'N6196005'),
('213116196', 'K15019', 'MK025', 'A', 1, 'N6196006'),
('213116196', 'K15020', 'MK026', 'A', 2, 'N6196007'),
('213116196', 'K15021', 'MK027', 'A', 2, 'N6196008'),
('213116196', 'K15022', 'MK028', 'A', 2, 'N6196009'),
('213116196', 'K15023', 'MK029', 'A', 2, 'N6196010'),
('213116196', 'K15024', 'MK030', 'A', 2, 'N6196011'),
('213116196', 'K15025', 'MK031', 'A', 2, 'N6196012'),
('213116196', 'K15026', 'MK032', 'A', 2, 'N6196013'),
('213116196', 'K15027', 'MK033', 'A', 3, 'N6196014'),
('213116196', 'K15028', 'MK034', 'A', 3, 'N6196015'),
('213116196', 'K15029', 'MK035', 'A', 3, 'N6196016'),
('213116196', 'K15030', 'MK036', 'A', 3, 'N6196017'),
('213116196', 'K15031', 'MK037', 'A', 3, 'N6196018'),
('213116196', 'K15032', 'MK038', 'A', 3, 'N6196019'),
('213116196', 'K15033', 'MK039', 'A', 3, 'N6196020'),
('213116196', 'K15034', 'MK040', 'A', 4, 'N6196021'),
('213116196', 'K15035', 'MK041', 'A', 4, 'N6196022'),
('213116196', 'K15036', 'MK042', 'A', 4, 'N6196023'),
('213116196', 'K15037', 'MK043', 'A', 4, 'N6196024'),
('213116196', 'K15038', 'MK044', 'A', 4, 'N6196025'),
('213116196', 'K15039', 'MK045', 'A', 4, 'N6196026'),
('213116196', 'K15040', 'MK046', 'A', 5, 'N6196027'),
('213116196', 'K15041', 'MK047', 'b', 5, 'N6196028'),
('213116196', 'K15042', 'MK048', 't', 5, 'N6196029'),
('213116196', 'K15043', 'MK049', 'A', 5, 'N6196030'),
('213116196', 'K15044', 'MK050', 'A', 5, 'N6196031'),
('213116196', 'K15045', 'MK051', 'A', 5, 'N6196032'),
('213116200', 'K15014', 'MK020', 'A', 1, 'N6200001'),
('213116200', 'K15015', 'MK021', 'A', 1, 'N6200002'),
('213116200', 'K15016', 'MK022', 'A', 1, 'N6200003'),
('213116200', 'K15017', 'MK023', 'A', 1, 'N6200004'),
('213116200', 'K15018', 'MK024', 'A', 1, 'N6200005'),
('213116200', 'K15019', 'MK025', 'A', 1, 'N6200006'),
('213116200', 'K15020', 'MK026', 'A', 2, 'N6200007'),
('213116200', 'K15021', 'MK027', 'A', 2, 'N6200008'),
('213116200', 'K15022', 'MK028', 'A', 2, 'N6200009'),
('213116200', 'K15023', 'MK029', 'A', 2, 'N6200010'),
('213116200', 'K15024', 'MK030', 'A', 2, 'N6200011'),
('213116200', 'K15025', 'MK031', 'A', 2, 'N6200012'),
('213116200', 'K15026', 'MK032', 'A', 2, 'N6200013'),
('213116200', 'K15027', 'MK033', 'A', 3, 'N6200014'),
('213116200', 'K15028', 'MK034', 'A', 3, 'N6200015'),
('213116200', 'K15029', 'MK035', 'A', 3, 'N6200016'),
('213116200', 'K15030', 'MK036', 'A', 3, 'N6200017'),
('213116200', 'K15031', 'MK037', 'A', 3, 'N6200018'),
('213116200', 'K15032', 'MK038', 'A', 3, 'N6200019'),
('213116200', 'K15033', 'MK039', 'A', 3, 'N6200020'),
('213116200', 'K15034', 'MK040', 'A', 4, 'N6200021'),
('213116200', 'K15035', 'MK041', 'A', 4, 'N6200022'),
('213116200', 'K15036', 'MK042', 'A', 4, 'N6200023'),
('213116200', 'K15037', 'MK043', 'A', 4, 'N6200024'),
('213116200', 'K15038', 'MK044', 'A', 4, 'N6200025'),
('213116200', 'K15039', 'MK045', 'A', 4, 'N6200026'),
('213116200', 'K15040', 'MK046', 'A', 5, 'N6200027'),
('213116200', 'K15041', 'MK047', 'A', 5, 'N6200028'),
('213116200', 'K15042', 'MK048', 'A', 5, 'N6200029'),
('213116200', 'K15043', 'MK049', 'A', 5, 'N6200030'),
('213116200', 'K15044', 'MK050', 'A', 5, 'N6200031'),
('213116200', 'K15045', 'MK051', 'A', 5, 'N6200032'),
('213116230', 'K15014', 'MK020', 'A', 1, 'N6230001'),
('213116230', 'K15015', 'MK021', 'A', 1, 'N6230002'),
('213116230', 'K15016', 'MK022', 'A', 1, 'N6230003'),
('213116230', 'K15017', 'MK023', 'A', 1, 'N6230004'),
('213116230', 'K15018', 'MK024', 'A', 1, 'N6230005'),
('213116230', 'K15019', 'MK025', 'A', 1, 'N6230006'),
('213116230', 'K15020', 'MK026', 'A', 2, 'N6230007'),
('213116230', 'K15021', 'MK027', 'A', 2, 'N6230008'),
('213116230', 'K15022', 'MK028', 'A', 2, 'N6230009'),
('213116230', 'K15023', 'MK029', 'A', 2, 'N6230010'),
('213116230', 'K15024', 'MK030', 'A', 2, 'N6230011'),
('213116230', 'K15025', 'MK031', 'A', 2, 'N6230012'),
('213116230', 'K15026', 'MK032', 'A', 2, 'N6230013'),
('213116230', 'K15027', 'MK033', 'A', 3, 'N6230014'),
('213116230', 'K15028', 'MK034', 'A', 3, 'N6230015'),
('213116230', 'K15029', 'MK035', 'A', 3, 'N6230016'),
('213116230', 'K15030', 'MK036', 'A', 3, 'N6230017'),
('213116230', 'K15031', 'MK037', 'A', 3, 'N6230018'),
('213116230', 'K15032', 'MK038', 'A', 3, 'N6230019'),
('213116230', 'K15033', 'MK039', 'A', 3, 'N6230020'),
('213116230', 'K15034', 'MK040', 'A', 4, 'N6230021'),
('213116230', 'K15035', 'MK041', 'A', 4, 'N6230022'),
('213116230', 'K15036', 'MK042', 'A', 4, 'N6230023'),
('213116230', 'K15037', 'MK043', 'A', 4, 'N6230024'),
('213116230', 'K15038', 'MK044', 'A', 4, 'N6230025'),
('213116230', 'K15039', 'MK045', 'A', 4, 'N6230026'),
('213116230', 'K15040', 'MK046', 'A', 5, 'N6230027'),
('213116230', 'K15041', 'MK047', 'b', 5, 'N6230028'),
('213116230', 'K15042', 'MK048', 't', 5, 'N6230029'),
('213116230', 'K15043', 'MK049', 'A', 5, 'N6230030'),
('213116230', 'K15044', 'MK050', 'A', 5, 'N6230031'),
('213116230', 'K15045', 'MK051', 'A', 5, 'N6230032'),
('213116241', 'K15001', 'MK006', 'A', 1, 'N6241001'),
('213116241', 'K15002', 'MK003', 'A', 1, 'N6241002'),
('213116241', 'K15004', 'MK004', 'A', 1, 'N6241001'),
('213116241', 'K15006', 'MK005', 'A', 1, 'N6241005'),
('213116241', 'K15009', 'MK009', 'A', 1, 'N6241004'),
('213116241', 'K15011', 'MK011', 'A', 1, 'N6241001'),
('213116241', 'K15012', 'MK012', 'A', 1, 'N6241004'),
('213116241', 'K15013', 'MK013', 'A', 1, 'N6241001'),
('213116241', 'K15014', 'MK014', 'A', 1, 'N6241004'),
('213116241', 'K15015', 'MK015', 'A', 1, 'N6241004'),
('213116241', 'K15016', 'MK016', 'A', 1, 'N6241004'),
('213116241', 'K15017', 'MK017', 'A', 1, 'N6241004'),
('213116241', 'K15018', 'MK018', 'A', 1, 'N6241004'),
('213116241', 'K15019', 'MK019', 'A', 1, 'N6241004'),
('213116241', 'K15020', 'MK020', 'A', 1, 'N6241004'),
('213116241', 'K15021', 'MK021', 'A', 1, 'N6241004'),
('213116241', 'K15025', 'MK001', 'A', 1, 'N6241003'),
('213116241', 'K15026', 'MK002', 'A', 1, 'N6241004'),
('213116249', 'K15014', 'MK020', 'A', 1, 'N6249001'),
('213116249', 'K15015', 'MK021', 'A', 1, 'N6249002'),
('213116249', 'K15016', 'MK022', 'A', 1, 'N6249003'),
('213116249', 'K15017', 'MK023', 'A', 1, 'N6249004'),
('213116249', 'K15018', 'MK024', 'A', 1, 'N6249005'),
('213116249', 'K15019', 'MK025', 'A', 1, 'N6249006'),
('213116249', 'K15020', 'MK026', 'A', 2, 'N6249007'),
('213116249', 'K15021', 'MK027', 'A', 2, 'N6249008'),
('213116249', 'K15022', 'MK028', 'A', 2, 'N6249009'),
('213116249', 'K15023', 'MK029', 'A', 2, 'N6249010'),
('213116249', 'K15024', 'MK030', 'A', 2, 'N6249011'),
('213116249', 'K15025', 'MK031', 'A', 2, 'N6249012'),
('213116249', 'K15026', 'MK032', 'A', 2, 'N6249013'),
('213116249', 'K15027', 'MK033', 'A', 3, 'N6249014'),
('213116249', 'K15028', 'MK034', 'A', 3, 'N6249015'),
('213116249', 'K15029', 'MK035', 'A', 3, 'N6249016'),
('213116249', 'K15030', 'MK036', 'A', 3, 'N6249017'),
('213116249', 'K15031', 'MK037', 'A', 3, 'N6249018'),
('213116249', 'K15032', 'MK038', 'A', 3, 'N6249019'),
('213116249', 'K15033', 'MK039', 'A', 3, 'N6249020'),
('213116249', 'K15034', 'MK040', 'A', 4, 'N6249021'),
('213116249', 'K15035', 'MK041', 'A', 4, 'N6249022'),
('213116249', 'K15036', 'MK042', 'A', 4, 'N6249023'),
('213116249', 'K15037', 'MK043', 'A', 4, 'N6249024'),
('213116249', 'K15038', 'MK044', 'A', 4, 'N6249025'),
('213116249', 'K15039', 'MK045', 'A', 4, 'N6249026'),
('213116249', 'K15040', 'MK046', 'A', 5, 'N6249027'),
('213116249', 'K15041', 'MK047', 'A', 5, 'N6249028'),
('213116249', 'K15042', 'MK048', 'A', 5, 'N6249029'),
('213116249', 'K15043', 'MK049', 'A', 5, 'N6249030'),
('213116249', 'K15044', 'MK050', 'A', 5, 'N6249031'),
('213116249', 'K15045', 'MK051', 'A', 5, 'N6249032'),
('213116256', 'K15014', 'MK020', 'A', 1, 'N6256001'),
('213116256', 'K15015', 'MK021', 'A', 1, 'N6256002'),
('213116256', 'K15016', 'MK022', 'A', 1, 'N6256003'),
('213116256', 'K15017', 'MK023', 'A', 1, 'N6256004'),
('213116256', 'K15018', 'MK024', 'A', 1, 'N6256005'),
('213116256', 'K15019', 'MK025', 'A', 1, 'N6256006'),
('213116256', 'K15020', 'MK026', 'A', 2, 'N6256007'),
('213116256', 'K15021', 'MK027', 'A', 2, 'N6256008'),
('213116256', 'K15022', 'MK028', 'A', 2, 'N6256009'),
('213116256', 'K15023', 'MK029', 'A', 2, 'N6256010'),
('213116256', 'K15024', 'MK030', 'A', 2, 'N6256011'),
('213116256', 'K15025', 'MK031', 'A', 2, 'N6256012'),
('213116256', 'K15026', 'MK032', 'A', 2, 'N6256013'),
('213116256', 'K15027', 'MK033', 'A', 3, 'N6256014'),
('213116256', 'K15028', 'MK034', 'A', 3, 'N6256015'),
('213116256', 'K15029', 'MK035', 'A', 3, 'N6256016'),
('213116256', 'K15030', 'MK036', 'A', 3, 'N6256017'),
('213116256', 'K15031', 'MK037', 'A', 3, 'N6256018'),
('213116256', 'K15032', 'MK038', 'A', 3, 'N6256019'),
('213116256', 'K15033', 'MK039', 'A', 3, 'N6256020'),
('213116256', 'K15034', 'MK040', 'A', 4, 'N6256021'),
('213116256', 'K15035', 'MK041', 'A', 4, 'N6256022'),
('213116256', 'K15036', 'MK042', 'A', 4, 'N6256023'),
('213116256', 'K15037', 'MK043', 'A', 4, 'N6256024'),
('213116256', 'K15038', 'MK044', 'A', 4, 'N6256025'),
('213116256', 'K15039', 'MK045', 'A', 4, 'N6256026'),
('213116256', 'K15040', 'MK046', 'A', 5, 'N6256027'),
('213116256', 'K15041', 'MK047', 'A', 5, 'N6256028'),
('213116256', 'K15042', 'MK048', 'A', 5, 'N6256029'),
('213116256', 'K15043', 'MK049', 'A', 5, 'N6256030'),
('213116256', 'K15044', 'MK050', 'A', 5, 'N6256031'),
('213116256', 'K15045', 'MK051', 'A', 5, 'N6256032'),
('213116261', 'K15014', 'MK020', 'A', 1, 'N6261001'),
('213116261', 'K15015', 'MK021', 'A', 1, 'N6261002'),
('213116261', 'K15016', 'MK022', 'A', 1, 'N6261003'),
('213116261', 'K15017', 'MK023', 'A', 1, 'N6261004'),
('213116261', 'K15018', 'MK024', 'A', 1, 'N6261005'),
('213116261', 'K15019', 'MK025', 'A', 1, 'N6261006'),
('213116261', 'K15020', 'MK026', 'A', 2, 'N6261007'),
('213116261', 'K15021', 'MK027', 'A', 2, 'N6261008'),
('213116261', 'K15022', 'MK028', 'A', 2, 'N6261009'),
('213116261', 'K15023', 'MK029', 'A', 2, 'N6261010'),
('213116261', 'K15024', 'MK030', 'A', 2, 'N6261011'),
('213116261', 'K15025', 'MK031', 'A', 2, 'N6261012'),
('213116261', 'K15026', 'MK032', 'A', 2, 'N6261013'),
('213116261', 'K15027', 'MK033', 'A', 3, 'N6261014'),
('213116261', 'K15028', 'MK034', 'A', 3, 'N6261015'),
('213116261', 'K15029', 'MK035', 'A', 3, 'N6261016'),
('213116261', 'K15030', 'MK036', 'A', 3, 'N6261017'),
('213116261', 'K15031', 'MK037', 'A', 3, 'N6261018'),
('213116261', 'K15032', 'MK038', 'A', 3, 'N6261019'),
('213116261', 'K15033', 'MK039', 'A', 3, 'N6261020'),
('213116261', 'K15034', 'MK040', 'A', 4, 'N6261021'),
('213116261', 'K15035', 'MK041', 'A', 4, 'N6261022'),
('213116261', 'K15036', 'MK042', 'A', 4, 'N6261023'),
('213116261', 'K15037', 'MK043', 'A', 4, 'N6261024'),
('213116261', 'K15038', 'MK044', 'A', 4, 'N6261025'),
('213116261', 'K15039', 'MK045', 'A', 4, 'N6261026'),
('213116261', 'K15040', 'MK046', 'A', 5, 'N6261027'),
('213116261', 'K15041', 'MK047', 'A', 5, 'N6261028'),
('213116261', 'K15042', 'MK048', 'A', 5, 'N6261029'),
('213116261', 'K15043', 'MK049', 'A', 5, 'N6261030'),
('213116261', 'K15044', 'MK050', 'A', 5, 'N6261031'),
('213116261', 'K15045', 'MK051', 'A', 5, 'N6261032'),
('213116267', 'K15014', 'MK020', 'A', 1, 'N6267001'),
('213116267', 'K15015', 'MK021', 'A', 1, 'N6267002'),
('213116267', 'K15016', 'MK022', 'A', 1, 'N6267003'),
('213116267', 'K15017', 'MK023', 'A', 1, 'N6267004'),
('213116267', 'K15018', 'MK024', 'A', 1, 'N6267005'),
('213116267', 'K15019', 'MK025', 'A', 1, 'N6267006'),
('213116267', 'K15020', 'MK026', 'A', 2, 'N6267007'),
('213116267', 'K15021', 'MK027', 'A', 2, 'N6267008'),
('213116267', 'K15022', 'MK028', 'A', 2, 'N6267009'),
('213116267', 'K15023', 'MK029', 'A', 2, 'N6267010'),
('213116267', 'K15024', 'MK030', 'A', 2, 'N6267011'),
('213116267', 'K15025', 'MK031', 'A', 2, 'N6267012'),
('213116267', 'K15026', 'MK032', 'A', 2, 'N6267013'),
('213116267', 'K15027', 'MK033', 'A', 3, 'N6267014'),
('213116267', 'K15028', 'MK034', 'A', 3, 'N6267015'),
('213116267', 'K15029', 'MK035', 'A', 3, 'N6267016'),
('213116267', 'K15030', 'MK036', 'A', 3, 'N6267017'),
('213116267', 'K15031', 'MK037', 'A', 3, 'N6267018'),
('213116267', 'K15032', 'MK038', 'A', 3, 'N6267019'),
('213116267', 'K15033', 'MK039', 'A', 3, 'N6267020'),
('213116267', 'K15034', 'MK040', 'A', 4, 'N6267021'),
('213116267', 'K15035', 'MK041', 'A', 4, 'N6267022'),
('213116267', 'K15036', 'MK042', 'A', 4, 'N6267023'),
('213116267', 'K15037', 'MK043', 'A', 4, 'N6267024'),
('213116267', 'K15038', 'MK044', 'A', 4, 'N6267025'),
('213116267', 'K15039', 'MK045', 'A', 4, 'N6267026'),
('213116267', 'K15040', 'MK046', 'A', 5, 'N6267027'),
('213116267', 'K15041', 'MK047', 'A', 5, 'N6267028'),
('213116267', 'K15042', 'MK048', 'A', 5, 'N6267029'),
('213116267', 'K15043', 'MK049', 'A', 5, 'N6267030'),
('213116267', 'K15044', 'MK050', 'A', 5, 'N6267031'),
('213116267', 'K15045', 'MK051', 'A', 5, 'N6267032'),
('213116268', 'K15014', 'MK020', 'A', 1, 'N6268001'),
('213116268', 'K15015', 'MK021', 'A', 1, 'N6268002'),
('213116268', 'K15016', 'MK022', 'A', 1, 'N6268003'),
('213116268', 'K15017', 'MK023', 'A', 1, 'N6268004'),
('213116268', 'K15018', 'MK024', 'A', 1, 'N6268005'),
('213116268', 'K15019', 'MK025', 'A', 1, 'N6268006'),
('213116268', 'K15020', 'MK026', 'A', 2, 'N6268007'),
('213116268', 'K15021', 'MK027', 'A', 2, 'N6268008'),
('213116268', 'K15022', 'MK028', 'A', 2, 'N6268009'),
('213116268', 'K15023', 'MK029', 'A', 2, 'N6268010'),
('213116268', 'K15024', 'MK030', 'A', 2, 'N6268011'),
('213116268', 'K15025', 'MK031', 'A', 2, 'N6268012'),
('213116268', 'K15026', 'MK032', 'A', 2, 'N6268013'),
('213116268', 'K15027', 'MK033', 'A', 3, 'N6268014'),
('213116268', 'K15028', 'MK034', 'A', 3, 'N6268015'),
('213116268', 'K15029', 'MK035', 'A', 3, 'N6268016'),
('213116268', 'K15030', 'MK036', 'A', 3, 'N6268017'),
('213116268', 'K15031', 'MK037', 'A', 3, 'N6268018'),
('213116268', 'K15032', 'MK038', 'A', 3, 'N6268019'),
('213116268', 'K15033', 'MK039', 'A', 3, 'N6268020'),
('213116268', 'K15034', 'MK040', 'A', 4, 'N6268021'),
('213116268', 'K15035', 'MK041', 'A', 4, 'N6268022'),
('213116268', 'K15036', 'MK042', 'A', 4, 'N6268023'),
('213116268', 'K15037', 'MK043', 'A', 4, 'N6268024'),
('213116268', 'K15038', 'MK044', 'A', 4, 'N6268025'),
('213116268', 'K15039', 'MK045', 'A', 4, 'N6268026'),
('213116268', 'K15040', 'MK046', 'A', 5, 'N6268027'),
('213116268', 'K15041', 'MK047', 'A', 5, 'N6268028'),
('213116268', 'K15042', 'MK048', 'A', 5, 'N6268029'),
('213116268', 'K15043', 'MK049', 'A', 5, 'N6268030'),
('213116268', 'K15044', 'MK050', 'A', 5, 'N6268031'),
('213116268', 'K15045', 'MK051', 'A', 5, 'N6268032'),
('213116270', 'K15014', 'MK020', 'A', 1, 'N6270001'),
('213116270', 'K15015', 'MK021', 'A', 1, 'N6270002'),
('213116270', 'K15016', 'MK022', 'A', 1, 'N6270003'),
('213116270', 'K15017', 'MK023', 'A', 1, 'N6270004'),
('213116270', 'K15018', 'MK024', 'A', 1, 'N6270005'),
('213116270', 'K15019', 'MK025', 'A', 1, 'N6270006'),
('213116270', 'K15020', 'MK026', 'A', 2, 'N6270007'),
('213116270', 'K15021', 'MK027', 'A', 2, 'N6270008'),
('213116270', 'K15022', 'MK028', 'A', 2, 'N6270009'),
('213116270', 'K15023', 'MK029', 'A', 2, 'N6270010'),
('213116270', 'K15024', 'MK030', 'A', 2, 'N6270011'),
('213116270', 'K15025', 'MK031', 'A', 2, 'N6270012'),
('213116270', 'K15026', 'MK032', 'A', 2, 'N6270013'),
('213116270', 'K15027', 'MK033', 'A', 3, 'N6270014'),
('213116270', 'K15028', 'MK034', 'A', 3, 'N6270015'),
('213116270', 'K15029', 'MK035', 'A', 3, 'N6270016'),
('213116270', 'K15030', 'MK036', 'A', 3, 'N6270017'),
('213116270', 'K15031', 'MK037', 'A', 3, 'N6270018'),
('213116270', 'K15032', 'MK038', 'A', 3, 'N6270019'),
('213116270', 'K15033', 'MK039', 'A', 3, 'N6270020'),
('213116270', 'K15034', 'MK040', 'A', 4, 'N6270021'),
('213116270', 'K15035', 'MK041', 'A', 4, 'N6270022'),
('213116270', 'K15036', 'MK042', 'A', 4, 'N6270023'),
('213116270', 'K15037', 'MK043', 'A', 4, 'N6270024'),
('213116270', 'K15038', 'MK044', 'A', 4, 'N6270025'),
('213116270', 'K15039', 'MK045', 'A', 4, 'N6270026'),
('213116270', 'K15040', 'MK046', 'A', 5, 'N6270027'),
('213116270', 'K15041', 'MK047', 'A', 5, 'N6270028'),
('213116270', 'K15042', 'MK048', 'A', 5, 'N6270029'),
('213116270', 'K15043', 'MK049', 'A', 5, 'N6270030'),
('213116270', 'K15044', 'MK050', 'A', 5, 'N6270031'),
('213116270', 'K15045', 'MK051', 'A', 5, 'N6270032'),
('213116278', 'K15014', 'MK020', 'A', 1, 'N6278001'),
('213116278', 'K15015', 'MK021', 'A', 1, 'N6278002'),
('213116278', 'K15016', 'MK022', 'A', 1, 'N6278003'),
('213116278', 'K15017', 'MK023', 'A', 1, 'N6278004'),
('213116278', 'K15018', 'MK024', 'A', 1, 'N6278005'),
('213116278', 'K15019', 'MK025', 'A', 1, 'N6278006'),
('213116278', 'K15020', 'MK026', 'A', 2, 'N6278007'),
('213116278', 'K15021', 'MK027', 'A', 2, 'N6278008'),
('213116278', 'K15022', 'MK028', 'A', 2, 'N6278009'),
('213116278', 'K15023', 'MK029', 'A', 2, 'N6278010'),
('213116278', 'K15024', 'MK030', 'A', 2, 'N6278011'),
('213116278', 'K15025', 'MK031', 'A', 2, 'N6278012'),
('213116278', 'K15026', 'MK032', 'A', 2, 'N6278013'),
('213116278', 'K15027', 'MK033', 'A', 3, 'N6278014'),
('213116278', 'K15028', 'MK034', 'A', 3, 'N6278015'),
('213116278', 'K15029', 'MK035', 'A', 3, 'N6278016'),
('213116278', 'K15030', 'MK036', 'A', 3, 'N6278017'),
('213116278', 'K15031', 'MK037', 'A', 3, 'N6278018'),
('213116278', 'K15032', 'MK038', 'A', 3, 'N6278019'),
('213116278', 'K15033', 'MK039', 'A', 3, 'N6278020'),
('213116278', 'K15034', 'MK040', 'A', 4, 'N6278021'),
('213116278', 'K15035', 'MK041', 'A', 4, 'N6278022'),
('213116278', 'K15036', 'MK042', 'A', 4, 'N6278023'),
('213116278', 'K15037', 'MK043', 'A', 4, 'N6278024'),
('213116278', 'K15038', 'MK044', 'A', 4, 'N6278025'),
('213116278', 'K15039', 'MK045', 'A', 4, 'N6278026'),
('213116278', 'K15040', 'MK046', 'A', 5, 'N6278027'),
('213116278', 'K15041', 'MK047', 'A', 5, 'N6278028'),
('213116278', 'K15042', 'MK048', 'A', 5, 'N6278029'),
('213116278', 'K15043', 'MK049', 'A', 5, 'N6278030'),
('213116278', 'K15044', 'MK050', 'A', 5, 'N6278031'),
('213116278', 'K15045', 'MK051', 'A', 5, 'N6278032');

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

--
-- Dumping data for table `kode_verifikasi`
--

INSERT INTO `kode_verifikasi` (`id`, `nomor_registrasi_id`, `email`, `tanggal_create`) VALUES
('584263', 'cyn123', 'rangers@yhg.biz', '2015-12-03 00:45:26');

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
('213116176', 'fdse45', '', 'chinam@gmail.com', 'Chinam', 'L', 'Surabaya', '0000-00-00', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '0', 0, '0.441', 5, 'S1INF131', '', 1),
('213116178', 'wertiu', '', 'andregozzidhy@gmail.com', 'Andre Gozzidhy', 'L', 'Surabaya', '0000-00-00', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '0', 0, '0.5', 5, 'S1INF131', '', 1),
('213116181', 'kikio0', '', 'angelineizumi@gmail.com', 'Angeline Izumi', 'P', 'Surabaya', '0000-00-00', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '0', 0, '0.441', 5, 'S1INF131', '', 1),
('213116193', 'qw5678', '', 'christianlimanto@gmail.com', 'Christian Limanto', 'L', 'Surabaya', '0000-00-00', 'WNI', 'Single', 'Kristen', 'Jalan Oro Oro Ombo 123', 'jawa timur', 'surabaya', '65525', '08155293322', '', 'Lee Kum Kee', 'Jalan Merdeka 55', 'aceh', 'banda', '08123544422', 'Swasta', '0', 0, '0.5', 5, 'S1INF131', '', 1),
('213116195', 'fe56ty', '', 'cynthiawangsawinata@gmail.com', 'Cynthia Wangsawinata', 'P', 'Surabaya', '0000-00-00', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '0', 0, '1.578', 5, 'S1INF131', '', 1),
('213116196', 'wqw123', 'DO004', 'danielstelar@gmail.com', 'Daniel Stelar', 'L', 'Surabaya', '0000-00-00', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '0', 0, '3.607', 5, 'S1INF131', '', 1),
('213116200', 'zx45mn', '', 'daniel@gmail.com', 'Daniel', 'L', 'Surabaya', '0000-00-00', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '0', 0, '3.745', 5, 'S1INF131', '', 1),
('213116230', 'f6t75y', 'DO004', 'ivanderwilson@gmail.com', 'Ivander Wilson', 'L', 'Surabaya', '0000-00-00', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '0', 0, '3.607', 5, 'S1INF131', '', 1),
('213116241', 'jjhy77', '', 'lukaskristanto@gmail.com', 'Lukas Kristanto', 'L', 'Surabaya', '0000-00-00', 'WNA', 'Single', 'Buddha', 'asdasdasdas', 'aceh', 'banda', '55555', '123123123', '', 'Lee Kum Kee', 'Waras 23 Surabaya', 'aceh', 'banda', '0151352413', 'Swasta', '0', 0, '0', 5, 'S1INF131', '', 1),
('213116249', 'd91o04', '', 'melanialani@gmail.com', 'Melania Laniwati', 'P', 'Surabaya', '0000-00-00', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '0', 0, '3.607', 5, 'S1INF131', '', 1),
('213116256', '12po09', '', 'raymondwongso@gmail.com', 'Raymond Wongso Hartanto', 'L', 'Surabaya', '1995-11-02', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '0', 0, '3.607', 5, 'S1INF131', '', 1),
('213116261', 'kli908', '', 'rickysaid@gmail.com', 'Ricky Said', 'L', 'Surabaya', '0000-00-00', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '0', 0, '3.745', 5, 'S1INF131', '', 1),
('213116267', 'a7i4r1', '', 'stefanietanujaya@gmail.com', 'Stefanie Tanujaya', 'P', 'Surabaya', '0000-00-00', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '0', 0, '3.607', 5, 'S1INF131', '', 1),
('213116268', 'jj876u', '', 'stefanuskurniawan@gmail.com', 'Stefanus Kurniawan', 'L', 'Surabaya', '0000-00-00', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '0', 0, '3.745', 5, 'S1INF131', '', 1),
('213116270', 'kl09op', '', 'sugihartojohanes@gmail.com', 'Sugiharto Johanes', 'L', 'Surabaya', '0000-00-00', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '0', 0, '3.607', 5, 'S1INF131', '', 1),
('213116278', 'gty564', '', 'yudhadarmawan@gmail.com', 'Yudha Darmawan', 'L', 'Surabaya', '0000-00-00', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '0', 0, '2.862', 5, 'S1INF131', '', 1),
('213180292', 'fewq23', '', 'nancyyonata@gmail.com', 'Nancy Yonata', 'P', 'Surabaya', '0000-00-00', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '0', 0, '0', 5, 'S1INF131', '', 1);

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
('MK002', 'Intro to Prgoramming', 'ITP', 1, 3, 'S1INF131', 'C', 1, '', 1),
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
('MK043', 'Electives', 'HCI', 7, 3, 'S1INF131', 'C', 0, '', 1),
('MK044', 'Advanced Data Structures', 'SDL', 4, 3, 'S1INF136', 'D', 0, 'umum', 1),
('MK045', 'Digital Image Processing', 'NULL', 4, 3, 'S1INF137', 'D', 0, 'umum', 1),
('MK046', 'Human Computer Interaction', 'IMK', 5, 3, 'S1INF138', 'D', 0, 'umum', 1),
('MK047', 'Internet Application Framework', 'FAI', 5, 3, 'S1INF139', 'C', 1, 'umum', 1),
('MK048', 'Operating Systems', 'Sisop', 5, 3, 'S1INF140', 'D', 0, 'umum', 1),
('MK049', 'Artificial Intelligence', 'AI', 5, 3, 'S1INF141', 'D', 0, 'umum', 1),
('MK050', 'Computer Graphics', 'Grafkom', 5, 3, 'S1INF142', 'D', 0, 'umum', 1),
('MK051', 'Computer Organization', 'Orkom', 5, 3, 'S1INF143', 'D', 0, 'umum', 1);

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
('N6176001', 90, 80, 78, 77, 82, 'A', 0),
('N6176002', 80, 90, 80, 68, 68, 'C', 0),
('N6176003', 78, 70, 90, 55, 75, 'B', 0),
('N6176004', 68, 80, 100, 65, 80, 'A', 0),
('N6176005', 92, 100, 90, 70, 80, 'A', 0),
('N6176006', 77, 90, 80, 57, 62, 'C', 0),
('N6176007', 80, 80, 77, 67, 67, 'C', 0),
('N6176008', 90, 78, 90, 59, 79, 'B', 0),
('N6176009', 70, 68, 68, 81, 96, 'A', 0),
('N6176010', 80, 92, 78, 77, 87, 'A', 0),
('N6176011', 100, 77, 80, 68, 73, 'B', 0),
('N6176012', 90, 80, 90, 61, 61, 'C', 9),
('N6176013', 80, 90, 100, 65, 85, 'A', 0),
('N6176014', 77, 68, 70, 70, 85, 'A', 0),
('N6176015', 80, 92, 90, 57, 67, 'C', 0),
('N6176016', 90, 77, 80, 67, 72, 'B', 0),
('N6176017', 70, 80, 77, 59, 59, 'C', 0),
('N6176018', 80, 90, 90, 81, 101, 'A', 0),
('N6176019', 100, 77, 68, 77, 92, 'A', 0),
('N6176020', 90, 80, 78, 68, 78, 'B', 0),
('N6176021', 80, 90, 80, 55, 60, 'C', 0),
('N6176022', 78, 70, 90, 65, 65, 'C', 36),
('N6176023', 68, 80, 100, 70, 90, 'A', 0),
('N6176024', 92, 100, 90, 57, 72, 'B', 0),
('N6176025', 77, 90, 80, 67, 77, 'B', 0),
('N6176026', 80, 80, 77, 59, 64, 'C', 0),
('N6176027', 90, 78, 90, 81, 81, 'A', 0),
('N6176028', 70, 68, 68, 77, 97, 'A', 0),
('N6176029', 80, 92, 78, 68, 83, 'A', 0),
('N6176030', 100, 77, 80, 55, 65, 'C', 0),
('N6176031', 90, 80, 90, 65, 70, 'B', 0),
('N6176032', 80, 90, 100, 70, 70, 'B', 0),
('N6178001', 80, 90, 100, 70, 70, 'B', 0),
('N6178002', 90, 80, 90, 65, 70, 'B', 0),
('N6178003', 100, 77, 80, 55, 65, 'C', 0),
('N6178004', 80, 92, 78, 68, 83, 'A', 0),
('N6178005', 70, 68, 68, 77, 97, 'A', 0),
('N6178006', 90, 78, 90, 81, 81, 'A', 0),
('N6178007', 80, 80, 77, 59, 64, 'C', 0),
('N6178008', 77, 90, 80, 67, 77, 'B', 0),
('N6178009', 92, 100, 90, 57, 72, 'B', 0),
('N6178010', 68, 80, 100, 70, 90, 'A', 0),
('N6178011', 78, 70, 90, 65, 65, 'C', 0),
('N6178012', 80, 90, 80, 55, 60, 'C', 9),
('N6178013', 90, 80, 78, 68, 78, 'B', 0),
('N6178014', 100, 77, 68, 77, 92, 'A', 0),
('N6178015', 80, 90, 90, 81, 101, 'A', 0),
('N6178016', 70, 80, 77, 59, 59, 'C', 0),
('N6178017', 90, 77, 80, 67, 72, 'B', 0),
('N6178018', 80, 92, 90, 57, 67, 'C', 0),
('N6178019', 77, 68, 70, 70, 85, 'A', 0),
('N6178020', 80, 90, 100, 65, 85, 'A', 0),
('N6178021', 90, 80, 90, 61, 61, 'C', 0),
('N6178022', 100, 77, 80, 68, 73, 'B', 42),
('N6178023', 80, 92, 78, 77, 87, 'A', 0),
('N6178024', 70, 68, 68, 81, 96, 'A', 0),
('N6178025', 90, 78, 90, 59, 79, 'B', 0),
('N6178026', 80, 80, 77, 67, 67, 'C', 0),
('N6178027', 77, 90, 80, 57, 62, 'C', 0),
('N6178028', 92, 100, 90, 70, 80, 'A', 0),
('N6178029', 68, 80, 100, 65, 80, 'A', 0),
('N6178030', 78, 70, 90, 55, 75, 'B', 0),
('N6178031', 80, 90, 80, 68, 68, 'C', 0),
('N6178032', 90, 80, 78, 77, 82, 'A', 0),
('N6181001', 90, 80, 78, 77, 82, 'A', 0),
('N6181002', 80, 90, 80, 68, 68, 'C', 0),
('N6181003', 78, 70, 90, 55, 75, 'B', 0),
('N6181004', 68, 80, 100, 65, 80, 'A', 0),
('N6181005', 92, 100, 90, 70, 80, 'A', 0),
('N6181006', 77, 90, 80, 57, 62, 'C', 0),
('N6181007', 80, 80, 77, 67, 67, 'C', 0),
('N6181008', 90, 78, 90, 59, 79, 'B', 0),
('N6181009', 70, 68, 68, 81, 96, 'A', 0),
('N6181010', 80, 92, 78, 77, 87, 'A', 0),
('N6181011', 100, 77, 80, 68, 73, 'B', 0),
('N6181012', 90, 80, 90, 61, 61, 'C', 9),
('N6181013', 80, 90, 100, 65, 85, 'A', 0),
('N6181014', 77, 68, 70, 70, 85, 'A', 0),
('N6181015', 80, 92, 90, 57, 67, 'C', 0),
('N6181016', 90, 77, 80, 67, 72, 'B', 0),
('N6181017', 70, 80, 77, 59, 59, 'C', 0),
('N6181018', 80, 90, 90, 81, 101, 'A', 0),
('N6181019', 100, 77, 68, 77, 92, 'A', 0),
('N6181020', 90, 80, 78, 68, 78, 'B', 0),
('N6181021', 80, 90, 80, 55, 60, 'C', 0),
('N6181022', 78, 70, 90, 65, 65, 'C', 36),
('N6181023', 68, 80, 100, 70, 90, 'A', 0),
('N6181024', 92, 100, 90, 57, 72, 'B', 0),
('N6181025', 77, 90, 80, 67, 77, 'B', 0),
('N6181026', 80, 80, 77, 59, 64, 'C', 0),
('N6181027', 90, 78, 90, 81, 81, 'A', 0),
('N6181028', 70, 68, 68, 77, 97, 'A', 0),
('N6181029', 80, 92, 78, 68, 83, 'A', 0),
('N6181030', 100, 77, 80, 55, 65, 'C', 0),
('N6181031', 90, 80, 90, 65, 70, 'B', 0),
('N6181032', 80, 90, 100, 70, 70, 'B', 0),
('N6193001', 80, 90, 100, 70, 70, 'B', 0),
('N6193002', 90, 80, 90, 65, 70, 'B', 0),
('N6193003', 100, 77, 80, 55, 65, 'C', 0),
('N6193004', 80, 92, 78, 68, 83, 'A', 0),
('N6193005', 70, 68, 68, 77, 97, 'A', 0),
('N6193006', 90, 78, 90, 81, 81, 'A', 0),
('N6193007', 80, 80, 77, 59, 64, 'C', 0),
('N6193008', 77, 90, 80, 67, 77, 'B', 0),
('N6193009', 92, 100, 90, 57, 72, 'B', 0),
('N6193010', 68, 80, 100, 70, 90, 'A', 0),
('N6193011', 78, 70, 90, 65, 65, 'C', 0),
('N6193012', 80, 90, 80, 55, 60, 'C', 9),
('N6193013', 90, 80, 78, 68, 78, 'B', 0),
('N6193014', 100, 77, 68, 77, 92, 'A', 0),
('N6193015', 80, 90, 90, 81, 101, 'A', 0),
('N6193016', 70, 80, 77, 59, 59, 'C', 0),
('N6193017', 90, 77, 80, 67, 72, 'B', 0),
('N6193018', 80, 92, 90, 57, 67, 'C', 0),
('N6193019', 77, 68, 70, 70, 85, 'A', 0),
('N6193020', 80, 90, 100, 65, 85, 'A', 0),
('N6193021', 90, 80, 90, 61, 61, 'C', 0),
('N6193022', 100, 77, 80, 68, 73, 'B', 42),
('N6193023', 80, 92, 78, 77, 87, 'A', 0),
('N6193024', 70, 68, 68, 81, 96, 'A', 0),
('N6193025', 90, 78, 90, 59, 79, 'B', 0),
('N6193026', 80, 80, 77, 67, 67, 'C', 0),
('N6193027', 77, 90, 80, 57, 62, 'C', 0),
('N6193028', 92, 100, 90, 70, 80, 'A', 0),
('N6193029', 68, 80, 100, 65, 80, 'A', 0),
('N6193030', 78, 70, 90, 55, 75, 'B', 0),
('N6193031', 80, 90, 80, 68, 68, 'C', 0),
('N6193032', 90, 80, 78, 77, 82, 'A', 0),
('N6195001', 90, 80, 78, 77, 82, 'A', 0),
('N6195002', 80, 90, 80, 68, 68, 'C', 0),
('N6195003', 78, 70, 90, 55, 75, 'B', 0),
('N6195004', 68, 80, 100, 65, 80, 'A', 0),
('N6195005', 92, 100, 90, 70, 80, 'A', 0),
('N6195006', 77, 90, 80, 57, 62, 'C', 0),
('N6195007', 80, 80, 77, 67, 67, 'C', 0),
('N6195008', 90, 78, 90, 59, 79, 'B', 0),
('N6195009', 70, 68, 68, 81, 96, 'A', 0),
('N6195010', 80, 92, 78, 77, 87, 'A', 0),
('N6195011', 100, 77, 80, 68, 73, 'B', 0),
('N6195012', 90, 80, 90, 61, 61, 'C', 9),
('N6195013', 80, 90, 100, 65, 85, 'A', 0),
('N6195014', 77, 68, 70, 70, 85, 'A', 0),
('N6195015', 80, 92, 90, 57, 67, 'C', 0),
('N6195016', 90, 77, 80, 67, 72, 'B', 0),
('N6195017', 70, 80, 77, 59, 59, 'C', 0),
('N6195018', 80, 90, 90, 81, 101, 'A', 0),
('N6195019', 100, 77, 68, 77, 92, 'A', 0),
('N6195020', 90, 80, 78, 68, 78, 'B', 0),
('N6195021', 80, 90, 80, 55, 60, 'C', 0),
('N6195022', 78, 70, 90, 65, 65, 'C', 36),
('N6195023', 68, 80, 100, 70, 90, 'A', 20),
('N6195024', 92, 100, 90, 57, 72, 'B', 15),
('N6195025', 77, 90, 80, 67, 77, 'B', 10),
('N6195026', 80, 80, 77, 59, 64, 'C', 5),
('N6195027', 90, 78, 90, 81, 81, 'A', 0),
('N6195028', 70, 68, 68, 77, 97, 'A', 20),
('N6195029', 80, 92, 78, 68, 83, 'A', 15),
('N6195030', 100, 77, 80, 55, 65, 'C', 9),
('N6195031', 90, 80, 90, 65, 70, 'B', 11),
('N6195032', 80, 90, 100, 70, 70, 'B', 11),
('N6196001', 80, 90, 100, 70, 70, 'B', 11),
('N6196002', 90, 80, 90, 65, 70, 'B', 5),
('N6196003', 100, 77, 80, 55, 65, 'C', 10),
('N6196004', 80, 92, 78, 68, 83, 'A', 15),
('N6196005', 70, 68, 68, 77, 97, 'A', 20),
('N6196006', 90, 78, 90, 81, 81, 'A', 0),
('N6196007', 80, 80, 77, 59, 64, 'C', 12),
('N6196008', 77, 90, 80, 67, 77, 'B', 10),
('N6196009', 92, 100, 90, 57, 72, 'B', 15),
('N6196010', 68, 80, 100, 70, 90, 'A', 20),
('N6196011', 78, 70, 90, 65, 65, 'C', 0),
('N6196012', 80, 90, 80, 55, 60, 'C', 9),
('N6196013', 90, 80, 78, 68, 78, 'B', 10),
('N6196014', 100, 77, 68, 77, 92, 'A', 12),
('N6196015', 80, 90, 90, 81, 101, 'A', 20),
('N6196016', 70, 80, 77, 59, 59, 'C', 0),
('N6196017', 90, 77, 80, 67, 72, 'B', 5),
('N6196018', 80, 92, 90, 57, 67, 'C', 10),
('N6196019', 77, 68, 70, 70, 85, 'A', 15),
('N6196020', 80, 90, 100, 65, 85, 'A', 20),
('N6196021', 90, 80, 90, 61, 61, 'C', 0),
('N6196022', 100, 77, 80, 68, 73, 'B', 42),
('N6196023', 80, 92, 78, 77, 87, 'A', 10),
('N6196024', 70, 68, 68, 81, 96, 'A', 15),
('N6196025', 90, 78, 90, 59, 79, 'B', 20),
('N6196026', 80, 80, 77, 67, 67, 'C', 0),
('N6196027', 77, 90, 80, 57, 62, 'C', 5),
('N6196028', 92, 100, 90, 70, 80, 'A', 10),
('N6196029', 68, 80, 100, 65, 80, 'A', 15),
('N6196030', 78, 70, 90, 55, 75, 'B', 11),
('N6196031', 80, 90, 80, 68, 68, 'C', 9),
('N6196032', 90, 80, 78, 77, 82, 'A', 12),
('N6200001', 90, 80, 78, 77, 82, 'A', 12),
('N6200002', 80, 90, 80, 68, 68, 'C', 0),
('N6200003', 78, 70, 90, 55, 75, 'B', 20),
('N6200004', 68, 80, 100, 65, 80, 'A', 15),
('N6200005', 92, 100, 90, 70, 80, 'A', 10),
('N6200006', 77, 90, 80, 57, 62, 'C', 5),
('N6200007', 80, 80, 77, 67, 67, 'C', 12),
('N6200008', 90, 78, 90, 59, 79, 'B', 20),
('N6200009', 70, 68, 68, 81, 96, 'A', 15),
('N6200010', 80, 92, 78, 77, 87, 'A', 10),
('N6200011', 100, 77, 80, 68, 73, 'B', 5),
('N6200012', 90, 80, 90, 61, 61, 'C', 9),
('N6200013', 80, 90, 100, 65, 85, 'A', 20),
('N6200014', 77, 68, 70, 70, 85, 'A', 12),
('N6200015', 80, 92, 90, 57, 67, 'C', 10),
('N6200016', 90, 77, 80, 67, 72, 'B', 5),
('N6200017', 70, 80, 77, 59, 59, 'C', 0),
('N6200018', 80, 90, 90, 81, 101, 'A', 20),
('N6200019', 100, 77, 68, 77, 92, 'A', 15),
('N6200020', 90, 80, 78, 68, 78, 'B', 10),
('N6200021', 80, 90, 80, 55, 60, 'C', 5),
('N6200022', 78, 70, 90, 65, 65, 'C', 36),
('N6200023', 68, 80, 100, 70, 90, 'A', 20),
('N6200024', 92, 100, 90, 57, 72, 'B', 15),
('N6200025', 77, 90, 80, 67, 77, 'B', 10),
('N6200026', 80, 80, 77, 59, 64, 'C', 5),
('N6200027', 90, 78, 90, 81, 81, 'A', 0),
('N6200028', 70, 68, 68, 77, 97, 'A', 20),
('N6200029', 80, 92, 78, 68, 83, 'A', 15),
('N6200030', 100, 77, 80, 55, 65, 'C', 9),
('N6200031', 90, 80, 90, 65, 70, 'B', 11),
('N6200032', 80, 90, 100, 70, 70, 'B', 11),
('N6230001', 80, 90, 100, 70, 70, 'B', 11),
('N6230002', 90, 80, 90, 65, 70, 'B', 5),
('N6230003', 100, 77, 80, 55, 65, 'C', 10),
('N6230004', 80, 92, 78, 68, 83, 'A', 15),
('N6230005', 70, 68, 68, 77, 97, 'A', 20),
('N6230006', 90, 78, 90, 81, 81, 'A', 0),
('N6230007', 80, 80, 77, 59, 64, 'C', 12),
('N6230008', 77, 90, 80, 67, 77, 'B', 10),
('N6230009', 92, 100, 90, 57, 72, 'B', 15),
('N6230010', 68, 80, 100, 70, 90, 'A', 20),
('N6230011', 78, 70, 90, 65, 65, 'C', 0),
('N6230012', 80, 90, 80, 55, 60, 'C', 9),
('N6230013', 90, 80, 78, 68, 78, 'B', 10),
('N6230014', 100, 77, 68, 77, 92, 'A', 12),
('N6230015', 80, 90, 90, 81, 101, 'A', 20),
('N6230016', 70, 80, 77, 59, 59, 'C', 0),
('N6230017', 90, 77, 80, 67, 72, 'B', 5),
('N6230018', 80, 92, 90, 57, 67, 'C', 10),
('N6230019', 77, 68, 70, 70, 85, 'A', 15),
('N6230020', 80, 90, 100, 65, 85, 'A', 20),
('N6230021', 90, 80, 90, 61, 61, 'C', 0),
('N6230022', 100, 77, 80, 68, 73, 'B', 42),
('N6230023', 80, 92, 78, 77, 87, 'A', 10),
('N6230024', 70, 68, 68, 81, 96, 'A', 15),
('N6230025', 90, 78, 90, 59, 79, 'B', 20),
('N6230026', 80, 80, 77, 67, 67, 'C', 0),
('N6230027', 77, 90, 80, 57, 62, 'C', 5),
('N6230028', 92, 100, 90, 70, 80, 'A', 10),
('N6230029', 68, 80, 100, 65, 80, 'A', 15),
('N6230030', 78, 70, 90, 55, 75, 'B', 11),
('N6230031', 80, 90, 80, 68, 68, 'C', 9),
('N6230032', 90, 80, 78, 77, 82, 'A', 12),
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
('N6241016', 90, 77, 80, 67, 72, 'B', 5),
('N6241017', 70, 80, 77, 59, 59, 'C', 0),
('N6241018', 80, 90, 90, 81, 101, 'A', 20),
('N6241019', 100, 77, 68, 77, 92, 'A', 15),
('N6241020', 90, 80, 78, 68, 78, 'B', 10),
('N6241021', 80, 90, 80, 55, 60, 'C', 5),
('N6241022', 78, 70, 90, 65, 65, 'C', 0),
('N6241023', 68, 80, 100, 70, 90, 'A', 20),
('N6241024', 92, 100, 90, 57, 72, 'B', 15),
('N6241025', 77, 90, 80, 67, 77, 'B', 10),
('N6241026', 80, 80, 77, 59, 64, 'C', 5),
('N6241027', 90, 78, 90, 81, 81, 'A', 0),
('N6241028', 70, 68, 68, 77, 97, 'A', 20),
('N6241029', 80, 92, 78, 68, 83, 'A', 15),
('N6241030', 100, 77, 80, 55, 65, 'C', 10),
('N6241031', 90, 80, 90, 65, 70, 'B', 5),
('N6241032', 80, 90, 100, 70, 70, 'B', 0),
('N6249001', 80, 90, 100, 70, 70, 'B', 11),
('N6249002', 90, 80, 90, 65, 70, 'B', 5),
('N6249003', 100, 77, 80, 55, 65, 'C', 10),
('N6249004', 80, 92, 78, 68, 83, 'A', 15),
('N6249005', 70, 68, 68, 77, 97, 'A', 20),
('N6249006', 90, 78, 90, 81, 81, 'A', 0),
('N6249007', 80, 80, 77, 59, 64, 'C', 12),
('N6249008', 77, 90, 80, 67, 77, 'B', 10),
('N6249009', 92, 100, 90, 57, 72, 'B', 15),
('N6249010', 68, 80, 100, 70, 90, 'A', 20),
('N6249011', 78, 70, 90, 65, 65, 'C', 0),
('N6249012', 80, 90, 80, 55, 60, 'C', 9),
('N6249013', 90, 80, 78, 68, 78, 'B', 10),
('N6249014', 100, 77, 68, 77, 92, 'A', 12),
('N6249015', 80, 90, 90, 81, 101, 'A', 20),
('N6249016', 70, 80, 77, 59, 59, 'C', 0),
('N6249017', 90, 77, 80, 67, 72, 'B', 5),
('N6249018', 80, 92, 90, 57, 67, 'C', 10),
('N6249019', 77, 68, 70, 70, 85, 'A', 15),
('N6249020', 80, 90, 100, 65, 85, 'A', 20),
('N6249021', 90, 80, 90, 61, 61, 'C', 0),
('N6249022', 100, 77, 80, 68, 73, 'B', 42),
('N6249023', 80, 92, 78, 77, 87, 'A', 10),
('N6249024', 70, 68, 68, 81, 96, 'A', 15),
('N6249025', 90, 78, 90, 59, 79, 'B', 20),
('N6249026', 80, 80, 77, 67, 67, 'C', 0),
('N6249027', 77, 90, 80, 57, 62, 'C', 5),
('N6249028', 92, 100, 90, 70, 80, 'A', 10),
('N6249029', 68, 80, 100, 65, 80, 'A', 15),
('N6249030', 78, 70, 90, 55, 75, 'B', 11),
('N6249031', 80, 90, 80, 68, 68, 'C', 9),
('N6249032', 90, 80, 78, 77, 82, 'A', 12),
('N6256001', 80, 90, 100, 70, 70, 'B', 11),
('N6256002', 90, 80, 90, 65, 70, 'B', 5),
('N6256003', 100, 77, 80, 55, 65, 'C', 10),
('N6256004', 80, 92, 78, 68, 83, 'A', 15),
('N6256005', 70, 68, 68, 77, 97, 'A', 20),
('N6256006', 90, 78, 90, 81, 81, 'A', 0),
('N6256007', 80, 80, 77, 59, 64, 'C', 12),
('N6256008', 77, 90, 80, 67, 77, 'B', 10),
('N6256009', 92, 100, 90, 57, 72, 'B', 15),
('N6256010', 68, 80, 100, 70, 90, 'A', 20),
('N6256011', 78, 70, 90, 65, 65, 'C', 0),
('N6256012', 80, 90, 80, 55, 60, 'C', 9),
('N6256013', 90, 80, 78, 68, 78, 'B', 10),
('N6256014', 100, 77, 68, 77, 92, 'A', 12),
('N6256015', 80, 90, 90, 81, 101, 'A', 20),
('N6256016', 70, 80, 77, 59, 59, 'C', 0),
('N6256017', 90, 77, 80, 67, 72, 'B', 5),
('N6256018', 80, 92, 90, 57, 67, 'C', 10),
('N6256019', 77, 68, 70, 70, 85, 'A', 15),
('N6256020', 80, 90, 100, 65, 85, 'A', 20),
('N6256021', 90, 80, 90, 61, 61, 'C', 0),
('N6256022', 100, 77, 80, 68, 73, 'B', 42),
('N6256023', 80, 92, 78, 77, 87, 'A', 10),
('N6256024', 70, 68, 68, 81, 96, 'A', 15),
('N6256025', 90, 78, 90, 59, 79, 'B', 20),
('N6256026', 80, 80, 77, 67, 67, 'C', 0),
('N6256027', 77, 90, 80, 57, 62, 'C', 5),
('N6256028', 92, 100, 90, 70, 80, 'A', 10),
('N6256029', 68, 80, 100, 65, 80, 'A', 15),
('N6256030', 78, 70, 90, 55, 75, 'B', 11),
('N6256031', 80, 90, 80, 68, 68, 'C', 9),
('N6256032', 90, 80, 78, 77, 82, 'A', 12),
('N6261001', 90, 80, 78, 77, 82, 'A', 12),
('N6261002', 80, 90, 80, 68, 68, 'C', 0),
('N6261003', 78, 70, 90, 55, 75, 'B', 20),
('N6261004', 68, 80, 100, 65, 80, 'A', 15),
('N6261005', 92, 100, 90, 70, 80, 'A', 10),
('N6261006', 77, 90, 80, 57, 62, 'C', 5),
('N6261007', 80, 80, 77, 67, 67, 'C', 12),
('N6261008', 90, 78, 90, 59, 79, 'B', 20),
('N6261009', 70, 68, 68, 81, 96, 'A', 15),
('N6261010', 80, 92, 78, 77, 87, 'A', 10),
('N6261011', 100, 77, 80, 68, 73, 'B', 5),
('N6261012', 90, 80, 90, 61, 61, 'C', 9),
('N6261013', 80, 90, 100, 65, 85, 'A', 20),
('N6261014', 77, 68, 70, 70, 85, 'A', 12),
('N6261015', 80, 92, 90, 57, 67, 'C', 10),
('N6261016', 90, 77, 80, 67, 72, 'B', 5),
('N6261017', 70, 80, 77, 59, 59, 'C', 0),
('N6261018', 80, 90, 90, 81, 101, 'A', 20),
('N6261019', 100, 77, 68, 77, 92, 'A', 15),
('N6261020', 90, 80, 78, 68, 78, 'B', 10),
('N6261021', 80, 90, 80, 55, 60, 'C', 5),
('N6261022', 78, 70, 90, 65, 65, 'C', 36),
('N6261023', 68, 80, 100, 70, 90, 'A', 20),
('N6261024', 92, 100, 90, 57, 72, 'B', 15),
('N6261025', 77, 90, 80, 67, 77, 'B', 10),
('N6261026', 80, 80, 77, 59, 64, 'C', 5),
('N6261027', 90, 78, 90, 81, 81, 'A', 0),
('N6261028', 70, 68, 68, 77, 97, 'A', 20),
('N6261029', 80, 92, 78, 68, 83, 'A', 15),
('N6261030', 100, 77, 80, 55, 65, 'C', 9),
('N6261031', 90, 80, 90, 65, 70, 'B', 11),
('N6261032', 80, 90, 100, 70, 70, 'B', 11),
('N6267001', 80, 90, 100, 70, 70, 'B', 11),
('N6267002', 90, 80, 90, 65, 70, 'B', 5),
('N6267003', 100, 77, 80, 55, 65, 'C', 10),
('N6267004', 80, 92, 78, 68, 83, 'A', 15),
('N6267005', 70, 68, 68, 77, 97, 'A', 20),
('N6267006', 90, 78, 90, 81, 81, 'A', 0),
('N6267007', 80, 80, 77, 59, 64, 'C', 12),
('N6267008', 77, 90, 80, 67, 77, 'B', 10),
('N6267009', 92, 100, 90, 57, 72, 'B', 15),
('N6267010', 68, 80, 100, 70, 90, 'A', 20),
('N6267011', 78, 70, 90, 65, 65, 'C', 0),
('N6267012', 80, 90, 80, 55, 60, 'C', 9),
('N6267013', 90, 80, 78, 68, 78, 'B', 10),
('N6267014', 100, 77, 68, 77, 92, 'A', 12),
('N6267015', 80, 90, 90, 81, 101, 'A', 20),
('N6267016', 70, 80, 77, 59, 59, 'C', 0),
('N6267017', 90, 77, 80, 67, 72, 'B', 5),
('N6267018', 80, 92, 90, 57, 67, 'C', 10),
('N6267019', 77, 68, 70, 70, 85, 'A', 15),
('N6267020', 80, 90, 100, 65, 85, 'A', 20),
('N6267021', 90, 80, 90, 61, 61, 'C', 0),
('N6267022', 100, 77, 80, 68, 73, 'B', 42),
('N6267023', 80, 92, 78, 77, 87, 'A', 10),
('N6267024', 70, 68, 68, 81, 96, 'A', 15),
('N6267025', 90, 78, 90, 59, 79, 'B', 20),
('N6267026', 80, 80, 77, 67, 67, 'C', 0),
('N6267027', 77, 90, 80, 57, 62, 'C', 5),
('N6267028', 92, 100, 90, 70, 80, 'A', 10),
('N6267029', 68, 80, 100, 65, 80, 'A', 15),
('N6267030', 78, 70, 90, 55, 75, 'B', 11),
('N6267031', 80, 90, 80, 68, 68, 'C', 9),
('N6267032', 90, 80, 78, 77, 82, 'A', 12),
('N6268001', 90, 80, 78, 77, 82, 'A', 12),
('N6268002', 80, 90, 80, 68, 68, 'C', 0),
('N6268003', 78, 70, 90, 55, 75, 'B', 20),
('N6268004', 68, 80, 100, 65, 80, 'A', 15),
('N6268005', 92, 100, 90, 70, 80, 'A', 10),
('N6268006', 77, 90, 80, 57, 62, 'C', 5),
('N6268007', 80, 80, 77, 67, 67, 'C', 12),
('N6268008', 90, 78, 90, 59, 79, 'B', 20),
('N6268009', 70, 68, 68, 81, 96, 'A', 15),
('N6268010', 80, 92, 78, 77, 87, 'A', 10),
('N6268011', 100, 77, 80, 68, 73, 'B', 5),
('N6268012', 90, 80, 90, 61, 61, 'C', 9),
('N6268013', 80, 90, 100, 65, 85, 'A', 20),
('N6268014', 77, 68, 70, 70, 85, 'A', 12),
('N6268015', 80, 92, 90, 57, 67, 'C', 10),
('N6268016', 90, 77, 80, 67, 72, 'B', 5),
('N6268017', 70, 80, 77, 59, 59, 'C', 0),
('N6268018', 80, 90, 90, 81, 101, 'A', 20),
('N6268019', 100, 77, 68, 77, 92, 'A', 15),
('N6268020', 90, 80, 78, 68, 78, 'B', 10),
('N6268021', 80, 90, 80, 55, 60, 'C', 5),
('N6268022', 78, 70, 90, 65, 65, 'C', 36),
('N6268023', 68, 80, 100, 70, 90, 'A', 20),
('N6268024', 92, 100, 90, 57, 72, 'B', 15),
('N6268025', 77, 90, 80, 67, 77, 'B', 10),
('N6268026', 80, 80, 77, 59, 64, 'C', 5),
('N6268027', 90, 78, 90, 81, 81, 'A', 0),
('N6268028', 70, 68, 68, 77, 97, 'A', 20),
('N6268029', 80, 92, 78, 68, 83, 'A', 15),
('N6268030', 100, 77, 80, 55, 65, 'C', 9),
('N6268031', 90, 80, 90, 65, 70, 'B', 11),
('N6268032', 80, 90, 100, 70, 70, 'B', 11),
('N6270001', 80, 90, 100, 70, 70, 'B', 11),
('N6270002', 90, 80, 90, 65, 70, 'B', 5),
('N6270003', 100, 77, 80, 55, 65, 'C', 10),
('N6270004', 80, 92, 78, 68, 83, 'A', 15),
('N6270005', 70, 68, 68, 77, 97, 'A', 20),
('N6270006', 90, 78, 90, 81, 81, 'A', 0),
('N6270007', 80, 80, 77, 59, 64, 'C', 12),
('N6270008', 77, 90, 80, 67, 77, 'B', 10),
('N6270009', 92, 100, 90, 57, 72, 'B', 15),
('N6270010', 68, 80, 100, 70, 90, 'A', 20),
('N6270011', 78, 70, 90, 65, 65, 'C', 0),
('N6270012', 80, 90, 80, 55, 60, 'C', 9),
('N6270013', 90, 80, 78, 68, 78, 'B', 10),
('N6270014', 100, 77, 68, 77, 92, 'A', 12),
('N6270015', 80, 90, 90, 81, 101, 'A', 20),
('N6270016', 70, 80, 77, 59, 59, 'C', 0),
('N6270017', 90, 77, 80, 67, 72, 'B', 5),
('N6270018', 80, 92, 90, 57, 67, 'C', 10),
('N6270019', 77, 68, 70, 70, 85, 'A', 15),
('N6270020', 80, 90, 100, 65, 85, 'A', 20),
('N6270021', 90, 80, 90, 61, 61, 'C', 0),
('N6270022', 100, 77, 80, 68, 73, 'B', 42),
('N6270023', 80, 92, 78, 77, 87, 'A', 10),
('N6270024', 70, 68, 68, 81, 96, 'A', 15),
('N6270025', 90, 78, 90, 59, 79, 'B', 20),
('N6270026', 80, 80, 77, 67, 67, 'C', 0),
('N6270027', 77, 90, 80, 57, 62, 'C', 5),
('N6270028', 92, 100, 90, 70, 80, 'A', 10),
('N6270029', 68, 80, 100, 65, 80, 'A', 15),
('N6270030', 78, 70, 90, 55, 75, 'B', 11),
('N6270031', 80, 90, 80, 68, 68, 'C', 9),
('N6270032', 90, 80, 78, 77, 82, 'A', 12),
('N6278001', 90, 80, 78, 77, 82, 'A', 12),
('N6278002', 80, 90, 80, 68, 68, 'C', 0),
('N6278003', 78, 70, 90, 55, 75, 'B', 20),
('N6278004', 68, 80, 100, 65, 80, 'A', 15),
('N6278005', 92, 100, 90, 70, 80, 'A', 10),
('N6278006', 77, 90, 80, 57, 62, 'C', 5),
('N6278007', 80, 80, 77, 67, 67, 'C', 12),
('N6278008', 90, 78, 90, 59, 79, 'B', 20),
('N6278009', 70, 68, 68, 81, 96, 'A', 15),
('N6278010', 80, 92, 78, 77, 87, 'A', 10),
('N6278011', 100, 77, 80, 68, 73, 'B', 5),
('N6278012', 90, 80, 90, 61, 61, 'C', 9),
('N6278013', 80, 90, 100, 65, 85, 'A', 20),
('N6278014', 77, 68, 70, 70, 85, 'A', 12),
('N6278015', 80, 92, 90, 57, 67, 'C', 10),
('N6278016', 90, 77, 80, 67, 72, 'B', 5),
('N6278017', 70, 80, 77, 59, 59, 'C', 0),
('N6278018', 80, 90, 90, 81, 101, 'A', 20),
('N6278019', 100, 77, 68, 77, 92, 'A', 15),
('N6278020', 90, 80, 78, 68, 78, 'B', 10),
('N6278021', 80, 90, 80, 55, 60, 'C', 0),
('N6278022', 78, 70, 90, 65, 65, 'C', 36),
('N6278023', 68, 80, 100, 70, 90, 'A', 0),
('N6278024', 92, 100, 90, 57, 72, 'B', 0),
('N6278025', 77, 90, 80, 67, 77, 'B', 0),
('N6278026', 80, 80, 77, 59, 64, 'C', 0),
('N6278027', 90, 78, 90, 81, 81, 'A', 0),
('N6278028', 70, 68, 68, 77, 97, 'A', 0),
('N6278029', 80, 92, 78, 68, 83, 'A', 0),
('N6278030', 100, 77, 80, 55, 65, 'C', 9),
('N6278031', 90, 80, 90, 65, 70, 'B', 11),
('N6278032', 80, 90, 100, 70, 70, 'B', 11);

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
('213116176', 4, '1.33', 'GENAP 2014/2015'),
('213116178', 4, '1.55', 'GENAP 2014/2015'),
('213116181', 4, '1.33', 'GENAP 2014/2015'),
('213116193', 4, '1.55', 'GENAP 2014/2015'),
('213116195', 4, '3.18', 'GENAP 2014/2015'),
('213116196', 4, '3.22', 'GENAP 2014/2015'),
('213116200', 4, '3.37', 'GENAP 2014/2015'),
('213116230', 4, '3.22', 'GENAP 2014/2015'),
('213116249', 4, '3.22', 'GENAP 2014/2015'),
('213116256', 4, '3.22', 'GENAP 2014/2015'),
('213116261', 4, '3.37', 'GENAP 2014/2015'),
('213116267', 4, '3.22', 'GENAP 2014/2015'),
('213116268', 4, '3.37', 'GENAP 2014/2015'),
('213116270', 4, '3.22', 'GENAP 2014/2015'),
('213116278', 4, '1.33', 'GENAP 2014/2015');

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
('12po09', 1),
('2ie93o', 1),
('38krn1', 1),
('a02l3s', 1),
('a7i4r1', 1),
('a983ke', 1),
('and123', 1),
('apl02d', 1),
('asd123', 1),
('asd456', 1),
('chr123', 1),
('cyn123', 1),
('d91o04', 1),
('dan123', 1),
('eo03k4', 1),
('f6t75y', 1),
('fdse45', 1),
('fe56ty', 1),
('fewq23', 1),
('gty564', 1),
('jj876u', 1),
('jjhy77', 1),
('k9j9k0', 1),
('kikio0', 1),
('kl09op', 1),
('kli908', 1),
('ms9kj3', 1),
('q0siwk', 1),
('q0wp2d', 1),
('qw5678', 1),
('rowks2', 1),
('slck0', 1),
('w9lkj1', 1),
('wertiu', 1),
('wqw123', 1),
('wrkls3', 0),
('x0mfk1', 0),
('zx45mn', 1),
('zxck02', 0);

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
) ENGINE=InnoDB AUTO_INCREMENT=33 DEFAULT CHARSET=latin1;

--
-- Dumping data for table `notifikasi`
--

INSERT INTO `notifikasi` (`id`, `dari`, `tujuan`, `judul`, `isi`, `tanggal_create`, `status_baca`) VALUES
(1, 'DO004', 'DO001', 'COBA', NULL, '2015-12-08 19:18:44', 0),
(2, 'DO001', 'DO001', 'COBA2', NULL, '2015-12-08 19:29:09', 0),
(3, 'DO001', 'DO001', 'COBA3', NULL, '2015-12-08 19:29:27', 0),
(4, 'DO001', NULL, 'Jaya Pranata,S.Kom telah menyelesaikan penilaian Religion / -', NULL, '2015-12-08 20:23:59', 0),
(5, 'DO001', 'DO004', 'Jaya Pranata,S.Kom telah menyelesaikan penilaian Religion / -', NULL, '2015-12-08 20:24:41', 0),
(6, 'DO001', 'DO004', 'Jaya Pranata,S.Kom telah menyelesaikan penilaian Religion / -', NULL, '2015-12-08 20:26:03', 0),
(7, 'DO004', 'DO001', 'Kajur tidak setuju atas penilaian Religion / -', NULL, '2015-12-08 20:36:15', 0),
(8, 'DO004', 'DO001', 'Revisi untuk Penilaian Algoritma dan Programming / A diterima.', NULL, '2015-12-08 20:40:59', 0),
(9, 'DO001', '213116241', 'Pemberitahuan Perwalian', 'Perwalian anda ditolak, harap menemui Saya secepatnya', '2015-11-29 16:40:39', 1),
(10, '213116241', '', 'Konfirmasi Perwalian', 'Lukas Kristanto telah melakukan perwalian', '2015-12-13 21:47:59', 0),
(11, 'PMB', 'BAU', '2ie93o', NULL, '2015-12-13 21:54:49', 1),
(12, 'DO004', 'DO003', 'Kajur tidak setuju atas penilaian Electives / C', NULL, '2015-12-13 22:51:05', 0),
(13, 'DO004', 'DO003', 'Penilaian Artificial Intelligence / B telah terkonfirmasi.', NULL, '2015-12-13 22:52:54', 0),
(14, 'DO004', 'DO001', 'Penilaian Algoritma dan Programming / A telah terkonfirmasi.', NULL, '2015-12-13 23:40:06', 0),
(15, 'DO004', 'DO001', 'Penilaian Algoritma dan Programming / A telah terkonfirmasi.', NULL, '2015-12-14 12:02:19', 0),
(16, 'BAA', 'BAU', '213116196', NULL, '2015-12-14 13:25:14', 0),
(17, 'BAA', 'BAU', '213116196', NULL, '2015-12-14 13:25:14', 0),
(18, 'BAA', 'BAU', '213116196', NULL, '2015-12-14 13:25:14', 0),
(19, 'BAA', 'BAU', '213116196', NULL, '2015-12-14 13:25:14', 0),
(20, 'DO004', '213116196', 'batal tambah anda telah berhasil', NULL, '2015-12-14 13:25:14', 0),
(21, 'DO004', '213116230', 'batal tambah anda ditolak, silahkan menemui saya secepatnya', NULL, '2015-12-14 13:25:22', 0),
(22, 'DO004', 'DO003', 'Penilaian Artificial Intelligence / B telah terkonfirmasi.', NULL, '2015-12-14 13:43:38', 0),
(23, 'DO004', 'DO002', 'Penilaian Client Server Programming /  telah terkonfirmasi.', NULL, '2015-12-14 13:45:29', 0),
(24, 'DO004', 'DO004', 'Penilaian Computer Graphics / B telah terkonfirmasi.', NULL, '2015-12-14 13:51:43', 0),
(25, 'DO004', 'DO002', 'Kajur tidak setuju atas penilaian Computer Organization / -', NULL, '2015-12-14 13:52:37', 0),
(26, 'DO004', 'DO001', 'Penilaian Computer Graphics / - telah terkonfirmasi.', NULL, '2015-12-14 13:54:08', 0),
(27, 'DO004', 'DO001', 'Penilaian Computer Organization / B telah terkonfirmasi.', NULL, '2015-12-14 13:55:56', 0),
(28, 'DO004', 'DO002', 'Penilaian Data Structures /  telah terkonfirmasi.', NULL, '2015-12-14 13:57:16', 0),
(29, 'DO004', 'DO004', 'Penilaian Database / A telah terkonfirmasi.', NULL, '2015-12-14 13:58:14', 0),
(30, 'DO004', 'DO001', 'Penilaian Algoritma dan Programming / A telah terkonfirmasi.', NULL, '2015-12-14 14:07:10', 0),
(31, 'DO004', 'DO003', 'Penilaian Electives / C telah terkonfirmasi.', NULL, '2015-12-14 14:09:22', 0),
(32, 'DO004', 'DO004', 'Edwin Pramana,Ir., M.AppSc. telah menyelesaikan penilaian Computer Graphics / B', NULL, '2015-12-14 14:27:16', 0);

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
('213116176', '123456', 'mahasiswa'),
('213116178', '123456', 'mahasiswa'),
('213116181', '123456', 'mahasiswa'),
('213116193', '123456', 'mahasiswa'),
('213116195', '123456', 'mahasiswa'),
('213116196', '123456', 'mahasiswa'),
('213116200', '123456', 'mahasiswa'),
('213116230', '123456', 'mahasiswa'),
('213116241', '123456', 'mahasiswa'),
('213116249', '123456', 'mahasiswa'),
('213116256', '123456', 'mahasiswa'),
('213116261', '123456', 'mahasiswa'),
('213116267', '123456', 'mahasiswa'),
('213116268', '123456', 'mahasiswa'),
('213116270', '123456', 'mahasiswa'),
('213116278', '123456', 'mahasiswa'),
('213180292', '123456', 'mahasiswa'),
('BAU01', 'baubau1', 'karyawan'),
('BAU02', 'baubau2', 'karyawan'),
('DO001', 'budibudi', 'dosen'),
('DO002', 'steste', 'dosen'),
('DO003', 'jngojngo', 'dosen_chiefbau'),
('DO004', 'edwin', 'dosen'),
('DO006', 'ferdinandus', 'dosen_pimpinanpmb'),
('edelynlyn', 'edeledel', 'admin_bau');

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
MODIFY `id` int(11) NOT NULL AUTO_INCREMENT,AUTO_INCREMENT=33;
/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
