-- phpMyAdmin SQL Dump
-- version 5.2.0
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Jun 05, 2024 at 05:48 AM
-- Server version: 10.4.27-MariaDB
-- PHP Version: 8.2.0

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `gc_persada`
--

-- --------------------------------------------------------

--
-- Table structure for table `admin`
--

CREATE TABLE `admin` (
  `id_admin` int(11) NOT NULL,
  `nama` varchar(40) NOT NULL,
  `email` varchar(40) NOT NULL,
  `pass` varchar(40) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1 COLLATE=latin1_swedish_ci;

--
-- Dumping data for table `admin`
--

INSERT INTO `admin` (`id_admin`, `nama`, `email`, `pass`) VALUES
(1, 'Andrean', 'admin123@gmail.com', 'admin');

-- --------------------------------------------------------

--
-- Table structure for table `denda`
--

CREATE TABLE `denda` (
  `no_denda` varchar(4) NOT NULL,
  `nama_denda` varchar(20) NOT NULL,
  `tgl_denda` date NOT NULL,
  `jumlah` int(11) NOT NULL,
  `id_sewa` varchar(4) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `denda`
--

INSERT INTO `denda` (`no_denda`, `nama_denda`, `tgl_denda`, `jumlah`, `id_sewa`) VALUES
('D111', '', '2024-05-29', 35000, 'S011');

-- --------------------------------------------------------

--
-- Table structure for table `kategori_akun`
--

CREATE TABLE `kategori_akun` (
  `id_akun` varchar(5) NOT NULL,
  `nama_akun` varchar(20) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `kategori_akun`
--

INSERT INTO `kategori_akun` (`id_akun`, `nama_akun`) VALUES
('501', 'Beban Gaji'),
('502', 'Beban Service'),
('503', 'Beban Sewa');

-- --------------------------------------------------------

--
-- Table structure for table `merek`
--

CREATE TABLE `merek` (
  `id_merek` varchar(3) NOT NULL,
  `merek` varchar(15) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `merek`
--

INSERT INTO `merek` (`id_merek`, `merek`) VALUES
('M01', 'Hondaa'),
('M02', 'Toyota');

-- --------------------------------------------------------

--
-- Table structure for table `mobil`
--

CREATE TABLE `mobil` (
  `id_mobil` varchar(4) NOT NULL,
  `nama` varchar(15) NOT NULL,
  `warna` varchar(10) NOT NULL,
  `no_polisi` varchar(10) NOT NULL,
  `jenis_sewa` varchar(15) NOT NULL,
  `jumlah_set` varchar(10) NOT NULL,
  `harga` int(11) NOT NULL,
  `id_merek` varchar(4) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `mobil`
--

INSERT INTO `mobil` (`id_mobil`, `nama`, `warna`, `no_polisi`, `jenis_sewa`, `jumlah_set`, `harga`, `id_merek`) VALUES
('BL11', 'Innova Rebon', 'Hitam', 'R 354 WA', '', '', 0, 'M02'),
('BL13', 'jaz', 'Siver', 'AB 4950 DC', '', '', 0, 'M01');

-- --------------------------------------------------------

--
-- Table structure for table `operasional`
--

CREATE TABLE `operasional` (
  `id_operasional` varchar(4) NOT NULL,
  `id_akun` varchar(5) NOT NULL,
  `nama_operasional` varchar(20) NOT NULL,
  `tanggal_operasional` date NOT NULL,
  `harga` int(8) NOT NULL,
  `kuantitas` int(2) NOT NULL,
  `total_operasional` int(8) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1 COLLATE=latin1_swedish_ci;

--
-- Dumping data for table `operasional`
--

INSERT INTO `operasional` (`id_operasional`, `id_akun`, `nama_operasional`, `tanggal_operasional`, `harga`, `kuantitas`, `total_operasional`) VALUES
('O11', '', 'Bayar Gaji Pegawai', '2024-05-27', 1000000, 3, 3000000),
('O12', '', 'Bayar Service', '2024-05-07', 1750000, 2, 3500000);

-- --------------------------------------------------------

--
-- Table structure for table `pelanggan`
--

CREATE TABLE `pelanggan` (
  `no_pelanggan` varchar(4) NOT NULL,
  `nama` varchar(15) NOT NULL,
  `alamat` varchar(20) NOT NULL,
  `no_hp` int(13) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `pelanggan`
--

INSERT INTO `pelanggan` (`no_pelanggan`, `nama`, `alamat`, `no_hp`) VALUES
('NP11', 'Azka', 'Jl. Paris, Bantul', 8635632),
('NP12', 'Cahya', 'Jl Samas', 9877564);

-- --------------------------------------------------------

--
-- Table structure for table `pendapatan_sewa`
--

CREATE TABLE `pendapatan_sewa` (
  `id_pendapatan` varchar(4) NOT NULL,
  `id_akun` varchar(5) NOT NULL,
  `no_pelanggan` varchar(4) NOT NULL,
  `tgl_pendapatan` date NOT NULL,
  `Jumlah` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

-- --------------------------------------------------------

--
-- Table structure for table `pengguna`
--

CREATE TABLE `pengguna` (
  `id_pengguna` varchar(4) NOT NULL,
  `nama` varchar(15) NOT NULL,
  `jabatan` varchar(10) NOT NULL,
  `alamat` varchar(20) NOT NULL,
  `umur` int(2) NOT NULL,
  `kontak` int(15) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1 COLLATE=latin1_swedish_ci;

--
-- Dumping data for table `pengguna`
--

INSERT INTO `pengguna` (`id_pengguna`, `nama`, `jabatan`, `alamat`, `umur`, `kontak`) VALUES
('101', 'Reza widya A', 'Pemilik', 'Jl. Bawuran, Pleret', 22, 2147483647),
('201', 'Andreasn', 'B Keuangan', 'Jl. Paris, Bantul', 30, 856782341);

-- --------------------------------------------------------

--
-- Table structure for table `sewa_kendaraan`
--

CREATE TABLE `sewa_kendaraan` (
  `id_sewa` varchar(4) NOT NULL,
  `tgl_sewa` date NOT NULL,
  `tgl_kembali` date NOT NULL,
  `id_mobil` varchar(4) NOT NULL,
  `no_pelanggan` varchar(4) NOT NULL,
  `lama_sewa` varchar(8) NOT NULL,
  `Total` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `sewa_kendaraan`
--

INSERT INTO `sewa_kendaraan` (`id_sewa`, `tgl_sewa`, `tgl_kembali`, `id_mobil`, `no_pelanggan`, `lama_sewa`, `Total`) VALUES
('S011', '2024-05-27', '2024-05-28', 'BL11', 'NP11', '', 0);

--
-- Indexes for dumped tables
--

--
-- Indexes for table `admin`
--
ALTER TABLE `admin`
  ADD PRIMARY KEY (`id_admin`);

--
-- Indexes for table `denda`
--
ALTER TABLE `denda`
  ADD PRIMARY KEY (`no_denda`),
  ADD UNIQUE KEY `sewa_kendaraan` (`id_sewa`);

--
-- Indexes for table `kategori_akun`
--
ALTER TABLE `kategori_akun`
  ADD PRIMARY KEY (`id_akun`);

--
-- Indexes for table `merek`
--
ALTER TABLE `merek`
  ADD PRIMARY KEY (`id_merek`);

--
-- Indexes for table `mobil`
--
ALTER TABLE `mobil`
  ADD PRIMARY KEY (`id_mobil`),
  ADD UNIQUE KEY `merek` (`id_merek`);

--
-- Indexes for table `operasional`
--
ALTER TABLE `operasional`
  ADD PRIMARY KEY (`id_operasional`);

--
-- Indexes for table `pelanggan`
--
ALTER TABLE `pelanggan`
  ADD PRIMARY KEY (`no_pelanggan`);

--
-- Indexes for table `pendapatan_sewa`
--
ALTER TABLE `pendapatan_sewa`
  ADD PRIMARY KEY (`id_pendapatan`),
  ADD UNIQUE KEY `kode_akun` (`id_akun`),
  ADD UNIQUE KEY `no_pelanggan` (`no_pelanggan`);

--
-- Indexes for table `pengguna`
--
ALTER TABLE `pengguna`
  ADD PRIMARY KEY (`id_pengguna`);

--
-- Indexes for table `sewa_kendaraan`
--
ALTER TABLE `sewa_kendaraan`
  ADD PRIMARY KEY (`id_sewa`),
  ADD UNIQUE KEY `mobil` (`id_mobil`),
  ADD UNIQUE KEY `pemesan` (`no_pelanggan`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `admin`
--
ALTER TABLE `admin`
  MODIFY `id_admin` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
