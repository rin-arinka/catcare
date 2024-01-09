-- phpMyAdmin SQL Dump
-- version 5.2.0
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Dec 29, 2023 at 10:50 AM
-- Server version: 10.4.27-MariaDB
-- PHP Version: 8.0.25

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `cat_care`
--

-- --------------------------------------------------------

--
-- Table structure for table `tbl_gallery`
--

CREATE TABLE `tbl_gallery` (
  `id_gallery` int(11) NOT NULL,
  `foto_gallery` text NOT NULL,
  `thumb_gallery` text NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `tbl_gallery`
--

INSERT INTO `tbl_gallery` (`id_gallery`, `foto_gallery`, `thumb_gallery`) VALUES
(1, 'demos/pet/images/gallery/1.jpg', 'demos/pet/images/gallery/thumbs/1.jpg'),
(2, 'demos/pet/images/gallery/2.webp', 'demos/pet/images/gallery/thumbs/2.webp'),
(3, 'demos/pet/images/gallery/3.jpg', 'demos/pet/images/gallery/thumbs/3.jpg'),
(4, 'demos/pet/images/gallery/4.jpg', 'demos/pet/images/gallery/thumbs/4.jpg');

-- --------------------------------------------------------

--
-- Table structure for table `tbl_grooming`
--

CREATE TABLE `tbl_grooming` (
  `id_grooming` int(11) NOT NULL,
  `nama_grooming` varchar(50) NOT NULL,
  `deskripsi_grooming` varchar(200) NOT NULL,
  `foto_grooming` text NOT NULL,
  `id_user` int(11) DEFAULT NULL,
  `type_user` varchar(10) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `tbl_grooming`
--

INSERT INTO `tbl_grooming` (`id_grooming`, `nama_grooming`, `deskripsi_grooming`, `foto_grooming`, `id_user`, `type_user`) VALUES
(1, 'Pemotongan Kuku', 'Kuku kucing akan kami potong sesuai batasnya yang tidak terlalu dalam agar kuku kucing tetap sehat dan tidak melukai Anda.', 'demos/pet/images/grooming/1.jpg', 7, 'admin'),
(2, 'Pembersihan Telinga', 'Tim Cat Care akan memeriksa kesehatan telinga kucing apakah berisiko memiliki penyakit atau tidak. Selain itu kami akan membersihkan bagian dalam telinga kucing menggunakan cairan ears cleaner khusus.', 'demos/pet/images/grooming/2.jpg', 7, 'admin'),
(3, 'Merapikan Bulu', 'Dalam proses ini bulu akan kami rapikan agar kucing Anda tetap nyaman saat beraktivitas.', 'demos/pet/images/grooming/3.jpg', 7, 'admin'),
(4, 'Sisir Bulu', 'Penyisiran bulu dilakukan untuk menghindari penggumpalan bulu agar tidak lembab yang dapat menghindari tumbuhnya jamur pada badan kucing Anda.', 'demos/pet/images/grooming/4.jpg', 7, 'admin'),
(5, 'Memandikan Kucing', 'Kami akan memandikan kucing dengan hati-hati supaya air tidak masuk ke dalam telinga dengan menggunakan shampoo khusus untuk kucing yang aman bagi kulit kucing Anda.', 'demos/pet/images/grooming/5.jpg', 7, 'admin'),
(6, 'Pengeringan Menyeluruh', 'Proses ini akan dilakukan secara teliti dan menyeluruh ke setiap permukaan kulit kucing. Hal tersebut agar kulit kucing tidak lembab, dan tidak menyebabkan jamur.', 'demos/pet/images/grooming/6.jpg', 7, 'admin');

-- --------------------------------------------------------

--
-- Table structure for table `tbl_harga_grooming`
--

CREATE TABLE `tbl_harga_grooming` (
  `id_harga_grooming` int(11) NOT NULL,
  `jenis_grooming` varchar(50) NOT NULL,
  `deskripsi_jenis` varchar(200) NOT NULL,
  `harga_normal` int(25) NOT NULL,
  `harga_promo` int(25) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `tbl_harga_grooming`
--

INSERT INTO `tbl_harga_grooming` (`id_harga_grooming`, `jenis_grooming`, `deskripsi_jenis`, `harga_normal`, `harga_promo`) VALUES
(1, 'Mandi Sehat', 'Mandi sehat sudah termasuk dengan Nail Trimming, Ears Cleaning, Pads Shaved, Brush Out, Bathing, Blow Dry, dan Cologne.', 100000, 85000),
(2, 'Mandi Kutu', 'Mandi Sehat + Treatment Kutu', 120000, 105000),
(3, 'Mandi Jamur', 'Mandi Sehat + Treatment Jamur', 120000, 105000),
(4, 'Mandi Lengkap', 'Mandi Sehat + Treatment Kutu & Jamur', 140000, 120000);

-- --------------------------------------------------------

--
-- Table structure for table `tbl_makanan`
--

CREATE TABLE `tbl_makanan` (
  `id_makanan` int(11) NOT NULL,
  `nama_makanan` varchar(50) NOT NULL,
  `stok` int(11) NOT NULL,
  `harga` bigint(20) NOT NULL,
  `foto` text DEFAULT NULL,
  `id_user` int(11) DEFAULT NULL,
  `type_user` varchar(10) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `tbl_makanan`
--

INSERT INTO `tbl_makanan` (`id_makanan`, `nama_makanan`, `stok`, `harga`, `foto`, `id_user`, `type_user`) VALUES
(3, 'abcdef', 0, 578, '4_1.jpg', 7, 'admin'),
(4, 'wishkas', 25, 54000, 'wishkas_1.jpeg', 7, 'admin');

-- --------------------------------------------------------

--
-- Table structure for table `tbl_member`
--

CREATE TABLE `tbl_member` (
  `id_member` int(11) NOT NULL,
  `nama_member` varchar(150) NOT NULL,
  `username` varchar(100) NOT NULL,
  `no_hp` varchar(20) NOT NULL,
  `password` varchar(250) NOT NULL,
  `alamat_member` text NOT NULL,
  `saldo` bigint(20) NOT NULL,
  `level` varchar(15) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `tbl_member`
--

INSERT INTO `tbl_member` (`id_member`, `nama_member`, `username`, `no_hp`, `password`, `alamat_member`, `saldo`, `level`) VALUES
(1, 'member1', 'member1', '085334327835', '$2y$10$ZRs44DaOsMETVKSrLYZ0s.wWoTJd4xC48.h.whc1FyRk6HzJ1qe1C', 'malang', 0, 'silver'),
(3, 'reguler1', 'reguler1', '0876', '$2y$10$vLE1hPaIMpCYE2esfD0syesoJYnI8ZYO8Jbsn8cOWXnrBOrTIeqq2', 'kesamben', 0, 'reguler'),
(4, 'platinum1', 'platinum1', '085334327835', '$2y$10$ZRs44DaOsMETVKSrLYZ0s.wWoTJd4xC48.h.whc1FyRk6HzJ1qe1C', 'malang', 0, 'platinum');

-- --------------------------------------------------------

--
-- Table structure for table `tbl_service`
--

CREATE TABLE `tbl_service` (
  `id_service` int(11) NOT NULL,
  `nama_service` varchar(50) NOT NULL,
  `deskripsi_service` varchar(100) NOT NULL,
  `harga_service` int(11) NOT NULL,
  `foto` text NOT NULL,
  `id_user` int(11) DEFAULT NULL,
  `type_user` varchar(10) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `tbl_service`
--

INSERT INTO `tbl_service` (`id_service`, `nama_service`, `deskripsi_service`, `harga_service`, `foto`, `id_user`, `type_user`) VALUES
(1, 'Cat Grooming', 'Kami menyediakan jasa grooming hewan panggilan rumah ke rumah', 50000, '1.jpg', 7, 'admin'),
(2, 'Cat Hotel', 'Kami menyediakan jasa penitipan hewan kucing kesayangan anda', 25000, '2.jpg', 7, 'admin'),
(3, 'Cat Delivery', 'Jasa pengiriman hewan / ekspedisi kucing ke seluruh Indonesia', 100000, '3.jpg', 7, 'admin'),
(4, 'Cat Care', 'Kami menawarkan layanan khusus untuk hewan peliharaan khusus!', 75000, '4.jpg', 7, 'admin');

-- --------------------------------------------------------

--
-- Table structure for table `tbl_shampo`
--

CREATE TABLE `tbl_shampo` (
  `id_shampo` int(11) NOT NULL,
  `nama_shampo` varchar(50) NOT NULL,
  `stok` int(11) NOT NULL,
  `harga` bigint(20) NOT NULL,
  `foto` text DEFAULT NULL,
  `id_user` int(11) DEFAULT NULL,
  `type_user` varchar(10) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `tbl_shampo`
--

INSERT INTO `tbl_shampo` (`id_shampo`, `nama_shampo`, `stok`, `harga`, `foto`, `id_user`, `type_user`) VALUES
(1, 'sunslik', 4, 5000, 'kucing_1.jpg', 7, 'admin');

-- --------------------------------------------------------

--
-- Table structure for table `tbl_toolkit`
--

CREATE TABLE `tbl_toolkit` (
  `id_toolkit` int(11) NOT NULL,
  `nama_toolkit` varchar(50) NOT NULL,
  `stok` int(11) NOT NULL,
  `harga` bigint(20) NOT NULL,
  `foto` text DEFAULT NULL,
  `id_user` int(11) DEFAULT NULL,
  `type_user` varchar(10) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `tbl_toolkit`
--

INSERT INTO `tbl_toolkit` (`id_toolkit`, `nama_toolkit`, `stok`, `harga`, `foto`, `id_user`, `type_user`) VALUES
(1, 'Tool1', 10, 50000, 'DSC_0381.jpg', 1, 'silver');

-- --------------------------------------------------------

--
-- Table structure for table `tbl_transaksi`
--

CREATE TABLE `tbl_transaksi` (
  `id_transaksi` varchar(15) NOT NULL,
  `id_user` int(11) NOT NULL,
  `tgl_transaksi` date NOT NULL,
  `jenis_produk` varchar(15) NOT NULL,
  `id_produk` varchar(15) NOT NULL,
  `harga` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `tbl_transaksi`
--

INSERT INTO `tbl_transaksi` (`id_transaksi`, `id_user`, `tgl_transaksi`, `jenis_produk`, `id_produk`, `harga`) VALUES
('TRS1229032407', 1, '2023-12-29', 'toolkit', '1', 50000),
('TRS1229032741', 1, '2023-12-29', 'shampo', '1', 5000);

-- --------------------------------------------------------

--
-- Table structure for table `tbl_user`
--

CREATE TABLE `tbl_user` (
  `id_user` int(11) NOT NULL,
  `username` varchar(50) NOT NULL,
  `password` text NOT NULL,
  `nama` varchar(30) NOT NULL,
  `level` enum('admin','user') NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `tbl_user`
--

INSERT INTO `tbl_user` (`id_user`, `username`, `password`, `nama`, `level`) VALUES
(1, 'admin', '$2y$10$g9NqGz16XRoNZR2kDbwCzO5bL7KUf4H3v13tfqRGVqJsdisjKYk5m', 'admin', 'admin'),
(2, 'arinka', '$2y$10$r4ekddwZJr40PzxSeG0YPes2biKnATphv6ocyjUm2VYy0.ju5O3JG', 'Arinka Arethusa', 'user'),
(3, 'user', 'user', 'user', 'user'),
(4, 'user', '$2y$10$QET/nGlulFMiyypnYZKci.z3944pFuZ6LQIq1GVz6IIoiytQddUNC', 'user', 'user'),
(7, 'ryan', '$2y$10$yki0wOk88n7JZ5nilGHi/.bJw5h5frZzWuuCB5bopOVvHW14Ex2ay', 'Ryan', 'admin');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `tbl_grooming`
--
ALTER TABLE `tbl_grooming`
  ADD PRIMARY KEY (`id_grooming`);

--
-- Indexes for table `tbl_makanan`
--
ALTER TABLE `tbl_makanan`
  ADD PRIMARY KEY (`id_makanan`);

--
-- Indexes for table `tbl_member`
--
ALTER TABLE `tbl_member`
  ADD PRIMARY KEY (`id_member`);

--
-- Indexes for table `tbl_service`
--
ALTER TABLE `tbl_service`
  ADD PRIMARY KEY (`id_service`);

--
-- Indexes for table `tbl_shampo`
--
ALTER TABLE `tbl_shampo`
  ADD PRIMARY KEY (`id_shampo`);

--
-- Indexes for table `tbl_toolkit`
--
ALTER TABLE `tbl_toolkit`
  ADD PRIMARY KEY (`id_toolkit`);

--
-- Indexes for table `tbl_transaksi`
--
ALTER TABLE `tbl_transaksi`
  ADD PRIMARY KEY (`id_transaksi`),
  ADD KEY `id_user` (`id_user`);

--
-- Indexes for table `tbl_user`
--
ALTER TABLE `tbl_user`
  ADD PRIMARY KEY (`id_user`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `tbl_grooming`
--
ALTER TABLE `tbl_grooming`
  MODIFY `id_grooming` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=7;

--
-- AUTO_INCREMENT for table `tbl_makanan`
--
ALTER TABLE `tbl_makanan`
  MODIFY `id_makanan` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=7;

--
-- AUTO_INCREMENT for table `tbl_member`
--
ALTER TABLE `tbl_member`
  MODIFY `id_member` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- AUTO_INCREMENT for table `tbl_service`
--
ALTER TABLE `tbl_service`
  MODIFY `id_service` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=12;

--
-- AUTO_INCREMENT for table `tbl_shampo`
--
ALTER TABLE `tbl_shampo`
  MODIFY `id_shampo` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT for table `tbl_toolkit`
--
ALTER TABLE `tbl_toolkit`
  MODIFY `id_toolkit` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT for table `tbl_user`
--
ALTER TABLE `tbl_user`
  MODIFY `id_user` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=8;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
