-- phpMyAdmin SQL Dump
-- version 3.4.10.1deb1
-- http://www.phpmyadmin.net
--
-- Host: localhost
-- Generation Time: Jun 05, 2014 at 09:34 AM
-- Server version: 5.5.37
-- PHP Version: 5.3.10-1ubuntu3.11

SET SQL_MODE="NO_AUTO_VALUE_ON_ZERO";
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8 */;

--
-- Database: `e_commerce`
--

-- --------------------------------------------------------

--
-- Table structure for table `admin`
--

CREATE TABLE IF NOT EXISTS `admin` (
  `id_admin` int(5) NOT NULL AUTO_INCREMENT,
  `username` varchar(25) NOT NULL,
  `password` varchar(50) NOT NULL,
  `nama` varchar(25) NOT NULL,
  PRIMARY KEY (`id_admin`)
) ENGINE=MyISAM  DEFAULT CHARSET=latin1 AUTO_INCREMENT=5 ;

--
-- Dumping data for table `admin`
--

INSERT INTO `admin` (`id_admin`, `username`, `password`, `nama`) VALUES
(4, 'admin', '21232f297a57a5a743894a0e4a801fc3', 'admin');

-- --------------------------------------------------------

--
-- Table structure for table `ajaxbaner`
--

CREATE TABLE IF NOT EXISTS `ajaxbaner` (
  `id_berita` int(5) NOT NULL AUTO_INCREMENT,
  `judul` varchar(100) COLLATE latin1_general_ci NOT NULL,
  `headline` text COLLATE latin1_general_ci NOT NULL,
  `gambar` varchar(100) COLLATE latin1_general_ci NOT NULL,
  PRIMARY KEY (`id_berita`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 COLLATE=latin1_general_ci AUTO_INCREMENT=8 ;

--
-- Dumping data for table `ajaxbaner`
--

INSERT INTO `ajaxbaner` (`id_berita`, `judul`, `headline`, `gambar`) VALUES
(1, '', '', '1.jpg'),
(2, '', '', '2.jpg'),
(3, '', '', '3.jpg'),
(4, '', '', '4.jpg'),
(5, '', '', '5.jpg'),
(7, '', '', '6.jpg');

-- --------------------------------------------------------

--
-- Table structure for table `buku_tamu`
--

CREATE TABLE IF NOT EXISTS `buku_tamu` (
  `tamu_id` tinyint(10) NOT NULL AUTO_INCREMENT,
  `nama` varchar(30) NOT NULL,
  `email` varchar(30) NOT NULL,
  `pesan` text NOT NULL,
  `emoticon` varchar(30) NOT NULL,
  `waktu` varchar(25) NOT NULL,
  PRIMARY KEY (`tamu_id`)
) ENGINE=InnoDB  DEFAULT CHARSET=utf8 AUTO_INCREMENT=15 ;

--
-- Dumping data for table `buku_tamu`
--

INSERT INTO `buku_tamu` (`tamu_id`, `nama`, `email`, `pesan`, `emoticon`, `waktu`) VALUES
(14, 'RANGGA', 'ra@gmail.com', 'sdfadfdfadf', 'AddEmoticons0104.gif', '04/Jun/2014, 07:37:48');

-- --------------------------------------------------------

--
-- Table structure for table `katalog`
--

CREATE TABLE IF NOT EXISTS `katalog` (
  `id` int(5) NOT NULL AUTO_INCREMENT,
  `kode_barang` varchar(20) NOT NULL,
  `nama_barang` text NOT NULL,
  `stok` int(5) NOT NULL,
  `harga` int(10) NOT NULL,
  `file` text NOT NULL,
  `best` tinyint(1) NOT NULL,
  `kategori` varchar(50) NOT NULL,
  `deskripsi` text NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=3 ;

--
-- Dumping data for table `katalog`
--

INSERT INTO `katalog` (`id`, `kode_barang`, `nama_barang`, `stok`, `harga`, `file`, `best`, `kategori`, `deskripsi`) VALUES
(1, 'BON-01', 'Angry Bird Big Red', 9, 300000, 'pic/boneka/boneka1.jpg', 1, 'hewan', 'Boneka Angry Bird red ukuran XL cocok buat tidur'),
(2, 'BON-02', 'Teddy Bear Exclusive', 44, 150000, 'pic/boneka/boneka2.jpg', 1, 'figure', 'Boneka Teddy Bear Exclusive <br/>\r\nimport dari inggris, cocok buat di peluk buat yg jones');

-- --------------------------------------------------------

--
-- Table structure for table `kategori`
--

CREATE TABLE IF NOT EXISTS `kategori` (
  `id_kat` int(3) NOT NULL AUTO_INCREMENT,
  `kategori` varchar(20) NOT NULL,
  PRIMARY KEY (`id_kat`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=5 ;

--
-- Dumping data for table `kategori`
--

INSERT INTO `kategori` (`id_kat`, `kategori`) VALUES
(1, 'Hewan'),
(2, 'Action Figure'),
(3, 'Nendroid'),
(4, 'Love');

-- --------------------------------------------------------

--
-- Table structure for table `konfirmasi`
--

CREATE TABLE IF NOT EXISTS `konfirmasi` (
  `id_konf` int(11) NOT NULL AUTO_INCREMENT,
  `id_pesan` varchar(11) NOT NULL,
  `nama` varchar(50) NOT NULL,
  `bank` varchar(15) NOT NULL,
  `rekening` varchar(20) NOT NULL,
  `file` text NOT NULL,
  PRIMARY KEY (`id_konf`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=2 ;

--
-- Dumping data for table `konfirmasi`
--

INSERT INTO `konfirmasi` (`id_konf`, `id_pesan`, `nama`, `bank`, `rekening`, `file`) VALUES
(1, 'NC0002', 'Eka Putra', 'Mandiri', '8768678', '');

-- --------------------------------------------------------

--
-- Table structure for table `kontak_kami`
--

CREATE TABLE IF NOT EXISTS `kontak_kami` (
  `id_faq` int(3) NOT NULL AUTO_INCREMENT,
  `nama` varchar(50) NOT NULL,
  `email` varchar(50) NOT NULL,
  `subjek` varchar(50) NOT NULL,
  `pesan` text NOT NULL,
  `date` date NOT NULL,
  PRIMARY KEY (`id_faq`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1 AUTO_INCREMENT=1 ;

-- --------------------------------------------------------

--
-- Table structure for table `pesan`
--

CREATE TABLE IF NOT EXISTS `pesan` (
  `id_pesan` varchar(6) NOT NULL,
  `id_user` int(5) NOT NULL,
  `status_pesan` enum('LUNAS','PESAN') NOT NULL,
  `total_harga` double NOT NULL,
  `tanggal_pesan` date NOT NULL,
  PRIMARY KEY (`id_pesan`)
) ENGINE=MyISAM DEFAULT CHARSET=latin1;

--
-- Dumping data for table `pesan`
--

INSERT INTO `pesan` (`id_pesan`, `id_user`, `status_pesan`, `total_harga`, `tanggal_pesan`) VALUES
('NC0003', 4, 'PESAN', 300000, '0000-00-00'),
('NC0002', 4, 'LUNAS', 1350000, '0000-00-00'),
('NC0001', 2, 'PESAN', 3450000, '0000-00-00');

-- --------------------------------------------------------

--
-- Table structure for table `pesan_detail`
--

CREATE TABLE IF NOT EXISTS `pesan_detail` (
  `id_pesan` varchar(6) NOT NULL,
  `id_barang` int(5) NOT NULL,
  `jumlah` int(10) NOT NULL,
  `harga` double NOT NULL,
  KEY `id_pesan` (`id_pesan`)
) ENGINE=MyISAM DEFAULT CHARSET=latin1;

--
-- Dumping data for table `pesan_detail`
--

INSERT INTO `pesan_detail` (`id_pesan`, `id_barang`, `jumlah`, `harga`) VALUES
('NC0003', 1, 1, 300000),
('NC0002', 2, 9, 150000),
('NC0001', 2, 23, 150000);

-- --------------------------------------------------------

--
-- Table structure for table `pesan_temp`
--

CREATE TABLE IF NOT EXISTS `pesan_temp` (
  `id_pesan_temp` int(5) NOT NULL AUTO_INCREMENT,
  `id_barang` int(5) NOT NULL,
  `id_user` varchar(8) NOT NULL,
  `jumlah` int(10) NOT NULL,
  PRIMARY KEY (`id_pesan_temp`)
) ENGINE=MyISAM  DEFAULT CHARSET=latin1 AUTO_INCREMENT=57 ;

-- --------------------------------------------------------

--
-- Table structure for table `user`
--

CREATE TABLE IF NOT EXISTS `user` (
  `id_user` int(11) NOT NULL AUTO_INCREMENT,
  `nama_depan` varchar(30) NOT NULL,
  `nama_belakang` varchar(30) NOT NULL,
  `email` varchar(30) NOT NULL,
  `password` varchar(50) NOT NULL,
  `konf_password` varchar(50) NOT NULL,
  `tanggal_lahir` varchar(20) NOT NULL,
  `captcha` int(4) NOT NULL,
  `valid` tinyint(1) NOT NULL,
  `alamat` text NOT NULL,
  `telepon` int(15) NOT NULL,
  PRIMARY KEY (`id_user`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=5 ;

--
-- Dumping data for table `user`
--

INSERT INTO `user` (`id_user`, `nama_depan`, `nama_belakang`, `email`, `password`, `konf_password`, `tanggal_lahir`, `captcha`, `valid`, `alamat`, `telepon`) VALUES
(2, 'Rangga', 'Eka', 'rangga@gmail.com', '81dc9bdb52d04dc20036dbd8313ed055', '1234', '18-september-1985', 0, 0, 'DEPOK 2', 2147483647),
(4, 'Eka', 'Putra', 'ra@gmail.com', 'e10adc3949ba59abbe56e057f20f883e', '123456', '17-september-1964', 123456, 0, 'depok', 3242134);

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
