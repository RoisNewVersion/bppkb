-- phpMyAdmin SQL Dump
-- version 2.10.3
-- http://www.phpmyadmin.net
-- 
-- Host: localhost
-- Generation Time: Jan 16, 2017 at 09:49 AM
-- Server version: 5.0.51
-- PHP Version: 5.2.6

SET SQL_MODE="NO_AUTO_VALUE_ON_ZERO";

-- 
-- Database: `bppkb`
-- 

-- --------------------------------------------------------

-- 
-- Table structure for table `instansi`
-- 

CREATE TABLE `instansi` (
  `no_ins` int(3) NOT NULL,
  `nama_ins` varchar(40) NOT NULL,
  `kota` varchar(15) NOT NULL,
  PRIMARY KEY  (`no_ins`)
) ENGINE=MyISAM DEFAULT CHARSET=utf8;

-- 
-- Dumping data for table `instansi`
-- 


-- --------------------------------------------------------

-- 
-- Table structure for table `tabel_gol`
-- 

CREATE TABLE `tabel_gol` (
  `id_gol` int(3) NOT NULL,
  `tmt_jabatan` date NOT NULL,
  `gol` varchar(6) NOT NULL,
  `tmt_gol` date NOT NULL,
  `mk_thn` varchar(2) NOT NULL,
  `mk_bln` varchar(2) NOT NULL,
  PRIMARY KEY  (`id_gol`)
) ENGINE=MyISAM DEFAULT CHARSET=utf8;

-- 
-- Dumping data for table `tabel_gol`
-- 

INSERT INTO `tabel_gol` VALUES (0, '2015-02-18', 'IV/C', '2015-11-09', '', '');
INSERT INTO `tabel_gol` VALUES (1, '2013-02-21', 'IV/b', '2012-04-01', '22', '2');

-- --------------------------------------------------------

-- 
-- Table structure for table `tabel_karyawan`
-- 

CREATE TABLE `tabel_karyawan` (
  `nip` varchar(20) NOT NULL,
  `id_pendidikan` int(3) NOT NULL,
  `id_gol` int(3) NOT NULL,
  `jabatan` varchar(40) NOT NULL,
  `nama_karyawan` varchar(40) NOT NULL,
  `tmp_lahir` varchar(15) NOT NULL,
  `tgl_lahir` date NOT NULL,
  `agama` varchar(10) NOT NULL,
  `jk` enum('L','P') NOT NULL,
  `status_nikah` varchar(15) NOT NULL,
  `jml_anak` varchar(2) default NULL,
  `status_karyawan` enum('pns','cpns') NOT NULL,
  `thn_lulus` int(4) default NULL,
  `status` enum('Aktif','Tidak Aktif') NOT NULL,
  `no_karpeg` varchar(10) default NULL,
  `keterangan` varchar(40) NOT NULL,
  PRIMARY KEY  (`nip`)
) ENGINE=MyISAM DEFAULT CHARSET=utf8;

-- 
-- Dumping data for table `tabel_karyawan`
-- 

INSERT INTO `tabel_karyawan` VALUES ('196012201986082001', 1, 0, 'Kepala Badan', 'Ir.DIAH ANING BUDIARTI. M.Si', 'Kendal', '1960-12-20', 'Islam', 'P', 'Nikah', '3', 'pns', NULL, 'Aktif', NULL, '');
INSERT INTO `tabel_karyawan` VALUES ('19601031198821001', 2, 1, 'Sekretaris', 'Drs. Zaenuri', 'Kendal', '1960-10-31', 'Islam', 'L', 'Nikah', '3', 'pns', 1989, 'Tidak Aktif', NULL, '');

-- --------------------------------------------------------

-- 
-- Table structure for table `tabel_mutasi`
-- 

CREATE TABLE `tabel_mutasi` (
  `no_surat` int(25) NOT NULL,
  `nip` int(20) NOT NULL,
  `nama_karyawan` varchar(40) NOT NULL,
  `dinas_lama` varchar(15) NOT NULL,
  `dinas_baru` varchar(15) NOT NULL,
  `tmt_baru` date NOT NULL,
  PRIMARY KEY  (`no_surat`)
) ENGINE=MyISAM DEFAULT CHARSET=utf8;

-- 
-- Dumping data for table `tabel_mutasi`
-- 

INSERT INTO `tabel_mutasi` VALUES (0, 0, '', '', '', '2016-12-27');
INSERT INTO `tabel_mutasi` VALUES (122, 111, 'sss', 'dd', 'dff', '2016-12-08');

-- --------------------------------------------------------

-- 
-- Table structure for table `tabel_promosi`
-- 

CREATE TABLE `tabel_promosi` (
  `no_sk` int(25) NOT NULL,
  `nip` int(20) NOT NULL,
  `nama_karyawan` varchar(40) NOT NULL,
  `gol_lama` varchar(6) NOT NULL,
  `dinas_lama` varchar(15) NOT NULL,
  `gol_baru` varchar(6) NOT NULL,
  `dinas_baru` varchar(15) NOT NULL,
  `tmt_baru` date NOT NULL,
  PRIMARY KEY  (`no_sk`)
) ENGINE=MyISAM DEFAULT CHARSET=utf8;

-- 
-- Dumping data for table `tabel_promosi`
-- 


-- --------------------------------------------------------

-- 
-- Table structure for table `tb_pendidikan`
-- 

CREATE TABLE `tb_pendidikan` (
  `id_pendidikan` int(3) NOT NULL auto_increment,
  `pendidikan` varchar(6) NOT NULL,
  `jurusan` varchar(20) default NULL,
  PRIMARY KEY  (`id_pendidikan`)
) ENGINE=MyISAM  DEFAULT CHARSET=utf8 AUTO_INCREMENT=3 ;

-- 
-- Dumping data for table `tb_pendidikan`
-- 

INSERT INTO `tb_pendidikan` VALUES (1, 'S1', 'Sarjana Ekonomi');
INSERT INTO `tb_pendidikan` VALUES (2, 'S1', 'Sarjana Hukum');

-- --------------------------------------------------------

-- 
-- Table structure for table `tb_user`
-- 

CREATE TABLE `tb_user` (
  `id_admin` int(1) NOT NULL auto_increment,
  `username` varchar(20) NOT NULL,
  `password` varchar(15) NOT NULL,
  `nama` varchar(10) NOT NULL,
  PRIMARY KEY  (`id_admin`)
) ENGINE=MyISAM  DEFAULT CHARSET=utf8 AUTO_INCREMENT=2 ;

-- 
-- Dumping data for table `tb_user`
-- 

INSERT INTO `tb_user` VALUES (1, 'admin', 'admin', 'dimas');
