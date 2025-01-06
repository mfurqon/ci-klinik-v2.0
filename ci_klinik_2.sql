-- phpMyAdmin SQL Dump
-- version 5.1.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Jan 06, 2025 at 12:56 PM
-- Server version: 10.4.28-MariaDB
-- PHP Version: 7.3.33

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `ci_klinik_2`
--

-- --------------------------------------------------------

--
-- Table structure for table `daftar_bank`
--

CREATE TABLE `daftar_bank` (
  `id` int(11) NOT NULL,
  `nama_bank` varchar(64) NOT NULL,
  `no_rekening` varchar(128) NOT NULL,
  `gambar` varchar(128) NOT NULL,
  `alt` varchar(256) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `daftar_bank`
--

INSERT INTO `daftar_bank` (`id`, `nama_bank`, `no_rekening`, `gambar`, `alt`) VALUES
(1, 'Bank BCA', '123456789', 'logo-bca-biru.png', 'Logo BCA merupakan merek terdaftar milik PT Bank Central Asia Tbk'),
(2, 'Bank Mandiri', '234567891', 'logo-mandiri.png', ''),
(3, 'Bank BNI', '345678912', 'logo-bni.png', ''),
(4, 'Bank BRI', '456789123', 'logo-bri.png', ''),
(5, 'Bank BSI', '567891234', 'logo-bsi.png', '');

-- --------------------------------------------------------

--
-- Table structure for table `daftar_ewallet`
--

CREATE TABLE `daftar_ewallet` (
  `id` int(11) NOT NULL,
  `nama_ewallet` varchar(64) NOT NULL,
  `alt` varchar(256) NOT NULL,
  `gambar` varchar(128) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `daftar_ewallet`
--

INSERT INTO `daftar_ewallet` (`id`, `nama_ewallet`, `alt`, `gambar`) VALUES
(1, 'Gopay', '', 'logo-gopay.png'),
(2, 'OVO', '', 'logo-ovo.png'),
(3, 'DANA', '', 'logo-dana.png'),
(4, 'ShopeePay', '', 'logo-shopeepay-horizontal.png');

-- --------------------------------------------------------

--
-- Table structure for table `detail_pemesanan_obat`
--

CREATE TABLE `detail_pemesanan_obat` (
  `id_pemesanan` int(11) NOT NULL,
  `id_obat` int(11) NOT NULL,
  `nama_obat` varchar(128) NOT NULL,
  `jumlah_obat` int(11) NOT NULL,
  `harga_obat` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `detail_pemesanan_obat`
--

INSERT INTO `detail_pemesanan_obat` (`id_pemesanan`, `id_obat`, `nama_obat`, `jumlah_obat`, `harga_obat`) VALUES
(40, 2, 'Promag', 1, 5000),
(42, 2, 'Promag', 1, 5000),
(43, 2, 'Promag', 1, 5000),
(45, 2, 'Promag', 1, 5000),
(46, 2, 'Promag', 1, 5000),
(47, 2, 'Promag', 1, 5000),
(48, 1, 'Neozep', 1, 3000),
(49, 1, 'Neozep', 1, 3000),
(50, 2, 'Promag', 2, 5000),
(50, 1, 'Neozep', 1, 3000),
(51, 1, 'Neozep', 1, 3000),
(51, 2, 'Promag', 2, 5000),
(52, 2, 'Promag', 1, 5000),
(53, 2, 'Promag', 1, 5000),
(54, 2, 'Promag', 1, 5000),
(55, 1, 'Neozep', 1, 3000),
(55, 2, 'Promag', 2, 5000),
(56, 2, 'Promag', 1, 5000),
(56, 1, 'Neozep', 2, 3000),
(58, 2, 'Promag', 1, 5000),
(59, 1, 'Neozep', 4, 3000),
(59, 2, 'Promag', 3, 5000),
(59, 11, 'Salep 88', 3, 17000),
(59, 12, 'Paracetamol', 3, 3500);

-- --------------------------------------------------------

--
-- Table structure for table `dokter`
--

CREATE TABLE `dokter` (
  `id` int(11) NOT NULL,
  `nama` varchar(128) NOT NULL,
  `nip` varchar(32) NOT NULL,
  `id_spesialisasi` int(11) NOT NULL,
  `jenis_kelamin` enum('Laki-laki','Perempuan') NOT NULL,
  `telepon` varchar(32) NOT NULL,
  `email` varchar(128) NOT NULL,
  `alamat` text NOT NULL,
  `jam_masuk` varchar(5) NOT NULL,
  `jam_keluar` varchar(5) NOT NULL,
  `tanggal_ditambahkan` date NOT NULL,
  `gambar` varchar(128) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `dokter`
--

INSERT INTO `dokter` (`id`, `nama`, `nip`, `id_spesialisasi`, `jenis_kelamin`, `telepon`, `email`, `alamat`, `jam_masuk`, `jam_keluar`, `tanggal_ditambahkan`, `gambar`) VALUES
(1, 'dr. Tirta Mandira Hudhi, M.A.B', '2100030001', 1, 'Laki-laki', '08123456789', 'cipeng@gmail.com', 'JL. Ardosari Surakarta Jawa Tengah', '10:50', '14:20', '2024-11-02', 'dokter-1730487270.jpeg'),
(2, 'dr. Reisa Broto Asmoro', '2100030002', 1, 'Perempuan', '08132345678', 'reisa@gmail.com', 'JL. Raden Said Jakarta Timur DKJ Jakarta', '08:30', '13:30', '2024-11-02', 'dokter-1730487883.jpg'),
(4, 'dr. Teuku Adifitrian, Sp.BP-RE.', '2100030003', 7, 'Laki-laki', '08123456789', 'tompi@gmail.com', 'Jl. Cut Meutia No. 23 Bekasi Jawa Barat', '10:30', '03:30', '2024-11-25', 'dokter-1732477761.jpeg');

-- --------------------------------------------------------

--
-- Table structure for table `faktur`
--

CREATE TABLE `faktur` (
  `id_faktur` int(11) NOT NULL,
  `no_invoice` varchar(50) NOT NULL,
  `id_user` int(11) NOT NULL,
  `id_pemesanan` int(11) NOT NULL,
  `id_pembayaran` int(11) NOT NULL,
  `subtotal` decimal(10,2) NOT NULL,
  `biaya_admin` decimal(10,2) NOT NULL,
  `biaya_pengiriman` decimal(10,2) NOT NULL,
  `ppn` decimal(10,2) NOT NULL,
  `total` decimal(10,2) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `faktur`
--

INSERT INTO `faktur` (`id_faktur`, `no_invoice`, `id_user`, `id_pemesanan`, `id_pembayaran`, `subtotal`, `biaya_admin`, `biaya_pengiriman`, `ppn`, `total`) VALUES
(22, 'INV1735653129', 5, 42, 34, '5000.00', '1000.00', '0.00', '720.00', '6720.00'),
(23, 'INV1735653906', 5, 43, 35, '5000.00', '1000.00', '0.00', '720.00', '6720.00'),
(24, 'INV1735654448', 5, 45, 36, '5000.00', '1000.00', '0.00', '720.00', '6720.00'),
(25, 'INV1735654524', 5, 46, 37, '5000.00', '1000.00', '0.00', '720.00', '6720.00'),
(26, 'INV1735654883', 5, 47, 38, '5000.00', '1000.00', '0.00', '720.00', '6720.00'),
(27, 'INV1735655136', 5, 48, 39, '3000.00', '1000.00', '0.00', '480.00', '4480.00'),
(28, 'INV1735655628', 5, 49, 40, '3000.00', '1000.00', '0.00', '480.00', '4480.00'),
(29, 'INV1735655725', 5, 50, 41, '13000.00', '1000.00', '0.00', '1680.00', '15680.00'),
(30, 'INV1735656476', 5, 51, 42, '13000.00', '1000.00', '0.00', '1680.00', '25680.00'),
(31, 'INV1735656635', 5, 52, 43, '5000.00', '1000.00', '0.00', '720.00', '16720.00'),
(32, 'INV1735656749', 5, 53, 44, '5000.00', '1000.00', '0.00', '720.00', '16720.00'),
(33, 'INV1735656882', 5, 54, 45, '5000.00', '1000.00', '10000.00', '720.00', '16720.00'),
(34, 'INV1735656962', 5, 55, 46, '13000.00', '1000.00', '10000.00', '1680.00', '25680.00'),
(35, 'INV1735717609', 5, 56, 47, '11000.00', '1000.00', '10000.00', '1440.00', '23440.00'),
(37, 'INV1735910918', 5, 58, 49, '5000.00', '1000.00', '0.00', '720.00', '6720.00'),
(38, 'INV1736010718', 5, 59, 50, '88500.00', '1000.00', '10000.00', '10740.00', '110240.00');

-- --------------------------------------------------------

--
-- Table structure for table `janji_temu`
--

CREATE TABLE `janji_temu` (
  `id` int(11) NOT NULL,
  `no_janji_temu` varchar(20) NOT NULL,
  `id_user` int(11) NOT NULL,
  `id_dokter` int(11) NOT NULL,
  `tanggal_temu` date NOT NULL,
  `jam_temu` varchar(5) NOT NULL,
  `keluhan` text NOT NULL,
  `status` enum('Diproses','Dijadwalkan','Dibatalkan','Ditunda','Selesai') NOT NULL,
  `tanggal_dibuat` date NOT NULL,
  `jam_dibuat` time NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `janji_temu`
--

INSERT INTO `janji_temu` (`id`, `no_janji_temu`, `id_user`, `id_dokter`, `tanggal_temu`, `jam_temu`, `keluhan`, `status`, `tanggal_dibuat`, `jam_dibuat`) VALUES
(1, '', 5, 1, '2024-11-24', '18:51', 'coba', 'Selesai', '2024-11-24', '17:30:00'),
(2, '', 5, 2, '2024-12-01', '10:05', 'test', 'Selesai', '2024-11-24', '00:00:00'),
(3, '', 5, 2, '2024-11-24', '20:06', 'coba lagi', 'Selesai', '2024-11-24', '00:00:00'),
(5, '', 5, 1, '2024-11-25', '02:42', '', 'Selesai', '2024-11-25', '00:00:00'),
(6, '', 5, 2, '2024-12-17', '01:31', 'TEST', 'Selesai', '2024-12-17', '00:00:00'),
(7, '', 5, 2, '2024-12-17', '01:36', 'TEST', 'Selesai', '2024-12-17', '00:00:00'),
(8, '', 5, 1, '2024-12-17', '01:36', 'TEST', 'Selesai', '2024-12-17', '00:00:00'),
(9, '', 5, 1, '2024-12-27', '17:56', 'TEST Status', 'Selesai', '2024-12-26', '00:00:00'),
(14, 'APT20250104-001', 5, 1, '2025-01-04', '19:49', 'TEST No Janji Temu', 'Selesai', '2025-01-04', '00:00:00'),
(15, 'APT20250104-002', 5, 2, '2025-01-05', '19:53', 'TEST No Janji Temu', 'Selesai', '2025-01-04', '00:00:00'),
(16, 'APT20250104-003', 5, 1, '2025-01-04', '19:56', 'TEST No Janji Temu AND jam_dibuat', 'Selesai', '2025-01-04', '19:57:27'),
(17, 'APT20250104-004', 5, 2, '2025-01-05', '19:57', 'TEST No Janji Temu AND jam_dibuat', 'Selesai', '2025-01-04', '19:58:04');

-- --------------------------------------------------------

--
-- Table structure for table `jenis_obat`
--

CREATE TABLE `jenis_obat` (
  `id` int(11) NOT NULL,
  `nama` varchar(32) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `jenis_obat`
--

INSERT INTO `jenis_obat` (`id`, `nama`) VALUES
(3, 'Kapsul'),
(9, 'Tablet'),
(10, 'Sirup'),
(11, 'Salep'),
(14, 'Serbuk');

-- --------------------------------------------------------

--
-- Table structure for table `obat`
--

CREATE TABLE `obat` (
  `id` int(11) NOT NULL,
  `nama` varchar(128) NOT NULL,
  `id_jenis_obat` int(11) NOT NULL,
  `harga` int(11) NOT NULL,
  `deskripsi` text NOT NULL,
  `stok` int(11) NOT NULL,
  `tanggal_kedaluwarsa` date NOT NULL,
  `gambar` varchar(128) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `obat`
--

INSERT INTO `obat` (`id`, `nama`, `id_jenis_obat`, `harga`, `deskripsi`, `stok`, `tanggal_kedaluwarsa`, `gambar`) VALUES
(1, 'Neozep', 9, 3000, 'Obat Batuk Pilek', 2, '2024-11-01', 'obat-1730399659.jpeg'),
(2, 'Promag', 9, 5000, 'obat tablet hisap untuk mengobati maag', 20, '2024-11-02', 'obat-1730401678.webp'),
(9, 'Amoxicillin', 3, 10000, 'obat keras', 0, '2024-12-03', 'obat-1733139737.jpg'),
(11, 'Salep 88', 11, 17000, 'Obat luar untuk jamur kulit, gatal, kutu air, kadas, kurap, panu', 21, '2026-01-04', 'obat-1735995735.jpg'),
(12, 'Paracetamol', 9, 3500, 'Obat untuk sakit kepala, demam, sakit gigi, nyeri haid, sakit pada otot', 26, '2026-06-04', 'obat-1735996016.png');

-- --------------------------------------------------------

--
-- Table structure for table `pembayaran`
--

CREATE TABLE `pembayaran` (
  `id_pembayaran` int(11) NOT NULL,
  `id_pemesanan` int(11) NOT NULL,
  `metode_pembayaran` varchar(64) NOT NULL,
  `total_pembayaran` varchar(64) NOT NULL,
  `status_pembayaran` enum('Lunas','Tertunda','Gagal') NOT NULL,
  `tanggal_pembayaran` datetime NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `pembayaran`
--

INSERT INTO `pembayaran` (`id_pembayaran`, `id_pemesanan`, `metode_pembayaran`, `total_pembayaran`, `status_pembayaran`, `tanggal_pembayaran`) VALUES
(32, 40, 'Bank BCA', '6720', 'Lunas', '2024-12-31 20:36:21'),
(34, 42, 'Bank BCA', '6720', 'Lunas', '2024-12-31 20:52:09'),
(35, 43, 'Bank BCA', '6720', 'Lunas', '2024-12-31 21:05:06'),
(36, 45, 'Bank BCA', '6720', 'Lunas', '2024-12-31 21:14:08'),
(37, 46, 'Bank BCA', '6720', 'Lunas', '2024-12-31 21:15:24'),
(38, 47, 'Bank BCA', '6720', 'Lunas', '2024-12-31 21:21:23'),
(39, 48, 'Bank BCA', '4480', 'Lunas', '2024-12-31 21:25:36'),
(40, 49, 'Bank BCA', '4480', 'Lunas', '2024-12-31 21:33:48'),
(41, 50, 'Bank BCA', '15680', 'Lunas', '2024-12-31 21:35:25'),
(42, 51, 'Bank BNI', '25680', 'Lunas', '2024-12-31 21:47:56'),
(43, 52, 'Bank BCA', '16720', 'Lunas', '2024-12-31 21:50:35'),
(44, 53, 'Bank BCA', '16720', 'Lunas', '2024-12-31 21:52:29'),
(45, 54, 'Bank BCA', '16720', 'Lunas', '2024-12-31 21:54:42'),
(46, 55, 'Bank BSI', '25680', 'Lunas', '2024-12-31 21:56:02'),
(47, 56, 'Bank BCA', '23440', 'Lunas', '2025-01-01 14:46:49'),
(49, 58, 'ShopeePay', '6720', 'Lunas', '2025-01-03 20:28:38'),
(50, 59, 'DANA', '110240', 'Lunas', '2025-01-05 00:11:58');

-- --------------------------------------------------------

--
-- Table structure for table `pemesanan_obat`
--

CREATE TABLE `pemesanan_obat` (
  `id_pemesanan` int(11) NOT NULL,
  `id_user` int(11) NOT NULL,
  `total_harga` int(11) NOT NULL,
  `metode_pembelian` enum('Delivery','Pick-up') NOT NULL,
  `alamat` text NOT NULL,
  `catatan` varchar(256) NOT NULL,
  `tanggal_pemesanan` datetime NOT NULL,
  `status_pemesanan` enum('Tertunda','Berhasil','Dibatalkan') NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `pemesanan_obat`
--

INSERT INTO `pemesanan_obat` (`id_pemesanan`, `id_user`, `total_harga`, `metode_pembelian`, `alamat`, `catatan`, `tanggal_pemesanan`, `status_pemesanan`) VALUES
(42, 5, 6720, 'Pick-up', 'JL. Keadilan 43 Jakarta Timur DKJ Jakarta', '', '2024-12-31 20:52:09', 'Berhasil'),
(43, 5, 6720, 'Pick-up', 'JL. Keadilan 43 Jakarta Timur DKJ Jakarta', '', '2024-12-31 21:05:06', 'Berhasil'),
(45, 5, 6720, 'Pick-up', 'JL. Keadilan 43 Jakarta Timur DKJ Jakarta', '', '2024-12-31 21:14:08', 'Berhasil'),
(46, 5, 6720, 'Pick-up', 'JL. Keadilan 43 Jakarta Timur DKJ Jakarta', '', '2024-12-31 21:15:24', 'Berhasil'),
(47, 5, 6720, 'Pick-up', 'JL. Keadilan 43 Jakarta Timur DKJ Jakarta', '', '2024-12-31 21:21:23', 'Berhasil'),
(48, 5, 4480, 'Pick-up', 'JL. Keadilan 43 Jakarta Timur DKJ Jakarta', '', '2024-12-31 21:25:35', 'Berhasil'),
(49, 5, 4480, 'Pick-up', 'JL. Keadilan 43 Jakarta Timur DKJ Jakarta', '', '2024-12-31 21:33:48', 'Berhasil'),
(50, 5, 15680, 'Pick-up', 'JL. Keadilan 43 Jakarta Timur DKJ Jakarta', '', '2024-12-31 21:35:25', 'Berhasil'),
(51, 5, 25680, 'Delivery', 'JL. Keadilan 43 Jakarta Timur DKJ Jakarta', '', '2024-12-31 21:47:56', 'Berhasil'),
(52, 5, 16720, 'Delivery', 'JL. Keadilan 43 Jakarta Timur DKJ Jakarta', '', '2024-12-31 21:50:35', 'Berhasil'),
(53, 5, 16720, 'Delivery', 'JL. Keadilan 43 Jakarta Timur DKJ Jakarta', '', '2024-12-31 21:52:29', 'Berhasil'),
(54, 5, 16720, 'Delivery', 'JL. Keadilan 43 Jakarta Timur DKJ Jakarta', '', '2024-12-31 21:54:42', 'Berhasil'),
(55, 5, 25680, 'Delivery', 'JL. Keadilan 43 Jakarta Timur DKJ Jakarta', '', '2024-12-31 21:56:02', 'Berhasil'),
(56, 5, 23440, 'Delivery', 'JL. Keadilan 43 Jakarta Timur DKJ Jakarta', '', '2025-01-01 14:46:49', 'Berhasil'),
(58, 5, 6720, 'Pick-up', 'JL. Keadilan 43 Jakarta Timur DKJ Jakarta', 'TEST Update Stok Obat', '2025-01-03 20:28:38', 'Berhasil'),
(59, 5, 110240, 'Delivery', 'JL. Keadilan 43 Jakarta Timur DKJ Jakarta', 'TEST beli obat', '2025-01-05 00:11:58', 'Berhasil');

-- --------------------------------------------------------

--
-- Table structure for table `role`
--

CREATE TABLE `role` (
  `id` int(11) NOT NULL,
  `role` varchar(128) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `role`
--

INSERT INTO `role` (`id`, `role`) VALUES
(1, 'Administrator'),
(2, 'Member');

-- --------------------------------------------------------

--
-- Table structure for table `spesialisasi`
--

CREATE TABLE `spesialisasi` (
  `id` int(11) NOT NULL,
  `nama` varchar(64) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `spesialisasi`
--

INSERT INTO `spesialisasi` (`id`, `nama`) VALUES
(1, 'Umum'),
(3, 'Gigi'),
(5, 'Mata'),
(7, 'Bedah');

-- --------------------------------------------------------

--
-- Table structure for table `temp_pemesanan_obat`
--

CREATE TABLE `temp_pemesanan_obat` (
  `id` int(11) NOT NULL,
  `id_user` int(11) NOT NULL,
  `id_obat` int(11) NOT NULL,
  `nama_obat` varchar(128) NOT NULL,
  `gambar_obat` varchar(128) NOT NULL,
  `harga_obat` int(11) NOT NULL,
  `jumlah_obat` int(11) NOT NULL,
  `tanggal_ditambahkan` date NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

-- --------------------------------------------------------

--
-- Table structure for table `user`
--

CREATE TABLE `user` (
  `id` int(11) NOT NULL,
  `nama` varchar(128) NOT NULL,
  `email` varchar(128) NOT NULL,
  `password` varchar(256) NOT NULL,
  `telepon` varchar(16) NOT NULL,
  `tanggal_lahir_user` date DEFAULT NULL,
  `jenis_kelamin_user` enum('Laki-laki','Perempuan') NOT NULL,
  `alamat` text NOT NULL,
  `gambar` varchar(128) NOT NULL,
  `role_id` int(11) NOT NULL,
  `is_active` int(1) NOT NULL,
  `tanggal_dibuat` varchar(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `user`
--

INSERT INTO `user` (`id`, `nama`, `email`, `password`, `telepon`, `tanggal_lahir_user`, `jenis_kelamin_user`, `alamat`, `gambar`, `role_id`, `is_active`, `tanggal_dibuat`) VALUES
(5, 'Admin', 'admin@gmail.com', '$2y$10$lmyshMrskd0owO7jUd44Je16UlHj9DXc9bLnUSUvDs027lu/FT.3O', '08123456789', '2002-03-06', 'Laki-laki', 'JL. Keadilan 43 Jakarta Timur DKJ Jakarta', 'Admin1735986902.jpg', 1, 1, '29-10-2024');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `daftar_bank`
--
ALTER TABLE `daftar_bank`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `daftar_ewallet`
--
ALTER TABLE `daftar_ewallet`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `dokter`
--
ALTER TABLE `dokter`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `faktur`
--
ALTER TABLE `faktur`
  ADD PRIMARY KEY (`id_faktur`);

--
-- Indexes for table `janji_temu`
--
ALTER TABLE `janji_temu`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `jenis_obat`
--
ALTER TABLE `jenis_obat`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `obat`
--
ALTER TABLE `obat`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `pembayaran`
--
ALTER TABLE `pembayaran`
  ADD PRIMARY KEY (`id_pembayaran`);

--
-- Indexes for table `pemesanan_obat`
--
ALTER TABLE `pemesanan_obat`
  ADD PRIMARY KEY (`id_pemesanan`);

--
-- Indexes for table `role`
--
ALTER TABLE `role`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `spesialisasi`
--
ALTER TABLE `spesialisasi`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `temp_pemesanan_obat`
--
ALTER TABLE `temp_pemesanan_obat`
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
-- AUTO_INCREMENT for table `daftar_bank`
--
ALTER TABLE `daftar_bank`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;

--
-- AUTO_INCREMENT for table `daftar_ewallet`
--
ALTER TABLE `daftar_ewallet`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- AUTO_INCREMENT for table `dokter`
--
ALTER TABLE `dokter`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=13;

--
-- AUTO_INCREMENT for table `faktur`
--
ALTER TABLE `faktur`
  MODIFY `id_faktur` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=39;

--
-- AUTO_INCREMENT for table `janji_temu`
--
ALTER TABLE `janji_temu`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=19;

--
-- AUTO_INCREMENT for table `jenis_obat`
--
ALTER TABLE `jenis_obat`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=16;

--
-- AUTO_INCREMENT for table `obat`
--
ALTER TABLE `obat`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=14;

--
-- AUTO_INCREMENT for table `pembayaran`
--
ALTER TABLE `pembayaran`
  MODIFY `id_pembayaran` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=51;

--
-- AUTO_INCREMENT for table `pemesanan_obat`
--
ALTER TABLE `pemesanan_obat`
  MODIFY `id_pemesanan` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=60;

--
-- AUTO_INCREMENT for table `role`
--
ALTER TABLE `role`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;

--
-- AUTO_INCREMENT for table `spesialisasi`
--
ALTER TABLE `spesialisasi`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=9;

--
-- AUTO_INCREMENT for table `temp_pemesanan_obat`
--
ALTER TABLE `temp_pemesanan_obat`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=115;

--
-- AUTO_INCREMENT for table `user`
--
ALTER TABLE `user`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=30;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
