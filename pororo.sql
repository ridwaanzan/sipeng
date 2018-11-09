-- phpMyAdmin SQL Dump
-- version 4.5.1
-- http://www.phpmyadmin.net
--
-- Host: 127.0.0.1
-- Generation Time: Jul 17, 2017 at 12:27 PM
-- Server version: 10.1.19-MariaDB
-- PHP Version: 7.0.13

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `pororo`
--

-- --------------------------------------------------------

--
-- Table structure for table `tb_dt_karyawan`
--

CREATE TABLE `tb_dt_karyawan` (
  `kode_karyawan` varchar(255) DEFAULT NULL,
  `kode_jabatan` varchar(255) DEFAULT NULL,
  `gaji_pokok` decimal(10,0) DEFAULT NULL,
  `tgl_masuk` date DEFAULT NULL,
  `tgl_resign` date DEFAULT NULL,
  `tgl_kenaikan` date DEFAULT NULL,
  `status` int(11) DEFAULT NULL,
  `approve_by` varchar(255) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Table structure for table `tb_d_tun_karyawan`
--

CREATE TABLE `tb_d_tun_karyawan` (
  `id` int(11) NOT NULL,
  `kode_karyawan` varchar(255) DEFAULT NULL,
  `kode_tunjangan` varchar(255) DEFAULT NULL,
  `jumlah` decimal(10,0) DEFAULT NULL,
  `keterangan` varchar(255) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1 ROW_FORMAT=COMPACT;

-- --------------------------------------------------------

--
-- Table structure for table `tb_mt_absensi`
--

CREATE TABLE `tb_mt_absensi` (
  `id` int(11) NOT NULL,
  `kode_transaksi` varchar(225) NOT NULL,
  `kode_karyawan` varchar(255) DEFAULT NULL,
  `hari_kerja` int(255) DEFAULT NULL,
  `masuk` int(11) DEFAULT NULL,
  `absen` int(11) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Table structure for table `tb_mt_departemen`
--

CREATE TABLE `tb_mt_departemen` (
  `kode_departemen` varchar(255) NOT NULL,
  `nama_departemen` varchar(255) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Table structure for table `tb_mt_gajian`
--

CREATE TABLE `tb_mt_gajian` (
  `no_slip` varchar(255) NOT NULL,
  `kode_transaksi` varchar(225) NOT NULL,
  `kode_karyawan` varchar(255) DEFAULT NULL,
  `tanggal` varchar(255) DEFAULT NULL,
  `gaji_pokok` decimal(10,0) DEFAULT NULL,
  `total_potongan` decimal(10,0) DEFAULT NULL,
  `total_tunjangan` decimal(10,0) DEFAULT NULL,
  `total_gaji` decimal(10,0) DEFAULT NULL,
  `keterangan` varchar(255) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Table structure for table `tb_mt_jabatan`
--

CREATE TABLE `tb_mt_jabatan` (
  `kode_jabatan` varchar(255) NOT NULL,
  `kode_departemen` varchar(255) DEFAULT NULL,
  `nama_jabatan` varchar(255) DEFAULT NULL,
  `golongan` varchar(255) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Table structure for table `tb_mt_karyawan`
--

CREATE TABLE `tb_mt_karyawan` (
  `kode_karyawan` varchar(50) NOT NULL,
  `kode_jabatan` varchar(255) DEFAULT NULL,
  `nama_karyawan` varchar(50) DEFAULT NULL,
  `alamat` varchar(255) DEFAULT NULL,
  `kota` varchar(50) DEFAULT NULL,
  `provinsi` varchar(50) DEFAULT NULL,
  `kode_pos` int(11) DEFAULT NULL,
  `negara` varchar(50) DEFAULT NULL,
  `telp` varchar(50) DEFAULT NULL,
  `email` varchar(50) DEFAULT NULL,
  `kontak` varchar(50) DEFAULT NULL,
  `no_rekening` varchar(25) DEFAULT NULL,
  `an` varchar(50) DEFAULT NULL,
  `bank` varchar(50) DEFAULT NULL,
  `Keterangan` varchar(50) DEFAULT NULL,
  `created_at` timestamp NOT NULL DEFAULT '0000-00-00 00:00:00',
  `create_by` varchar(50) DEFAULT NULL,
  `updated_at` timestamp NOT NULL DEFAULT '0000-00-00 00:00:00',
  `update_by` varchar(50) DEFAULT NULL,
  `status` int(11) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Table structure for table `tb_mt_transaksi`
--

CREATE TABLE `tb_mt_transaksi` (
  `kode_transaksi` varchar(225) NOT NULL,
  `tgl_transaksi` date NOT NULL,
  `keterangan` varchar(225) DEFAULT NULL,
  `status` int(1) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Table structure for table `tb_mt_tunjangan`
--

CREATE TABLE `tb_mt_tunjangan` (
  `kode_tunjangan` varchar(255) NOT NULL,
  `nama_tunjangan` varchar(255) DEFAULT NULL,
  `status` int(11) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Table structure for table `users`
--

CREATE TABLE `users` (
  `id` int(10) UNSIGNED NOT NULL,
  `name` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `username` varchar(150) COLLATE utf8mb4_unicode_ci NOT NULL,
  `email` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `password` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `remember_token` varchar(100) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  `level` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Indexes for dumped tables
--

--
-- Indexes for table `tb_d_tun_karyawan`
--
ALTER TABLE `tb_d_tun_karyawan`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `tb_mt_absensi`
--
ALTER TABLE `tb_mt_absensi`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `tb_mt_departemen`
--
ALTER TABLE `tb_mt_departemen`
  ADD PRIMARY KEY (`kode_departemen`);

--
-- Indexes for table `tb_mt_gajian`
--
ALTER TABLE `tb_mt_gajian`
  ADD PRIMARY KEY (`no_slip`);

--
-- Indexes for table `tb_mt_jabatan`
--
ALTER TABLE `tb_mt_jabatan`
  ADD PRIMARY KEY (`kode_jabatan`);

--
-- Indexes for table `tb_mt_karyawan`
--
ALTER TABLE `tb_mt_karyawan`
  ADD PRIMARY KEY (`kode_karyawan`);

--
-- Indexes for table `tb_mt_transaksi`
--
ALTER TABLE `tb_mt_transaksi`
  ADD PRIMARY KEY (`kode_transaksi`);

--
-- Indexes for table `tb_mt_tunjangan`
--
ALTER TABLE `tb_mt_tunjangan`
  ADD PRIMARY KEY (`kode_tunjangan`);

--
-- Indexes for table `users`
--
ALTER TABLE `users`
  ADD PRIMARY KEY (`id`);
