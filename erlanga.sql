-- phpMyAdmin SQL Dump
-- version 5.2.0
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Aug 02, 2023 at 12:09 PM
-- Server version: 10.4.24-MariaDB
-- PHP Version: 8.1.6

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `erlanga`
--

-- --------------------------------------------------------

--
-- Table structure for table `buku`
--

CREATE TABLE `buku` (
  `id_buku` int(11) NOT NULL,
  `judul_buku` varchar(100) NOT NULL,
  `kategori_buku` varchar(100) NOT NULL,
  `harga_buku` int(100) NOT NULL,
  `deskripsi_buku` varchar(100) NOT NULL,
  `cover_buku` varchar(100) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `buku`
--

INSERT INTO `buku` (`id_buku`, `judul_buku`, `kategori_buku`, `harga_buku`, `deskripsi_buku`, `cover_buku`) VALUES
(15, 'Melangkah', 'Novel', 67000, 'Novel karya J. S Khairen yang berjudul Melangkah bertemakan tentang petualangan di Indonesia. Tidak ', 'uploads/64c0d2fa84b0c.jpg'),
(16, 'Xoxo', 'novel', 71000, 'Jenny mendedikasikan hidupnya bermain dan berlatih selo agar diterima di sekolah musik impiannya. Hi', 'uploads/64c0d4245785a.jpg'),
(18, 'Pedoman Praktik Profesi Arsitek', 'Pendidikan', 30000, 'Arsitek, salah satu profesi yang paling dikenal di Indonesia, juga masih belum sepenuhnya dipahami. ', 'uploads/64c0d4e847e67.jpg'),
(19, 'Statistika Penelitian', 'Pendidikan', 85000, 'buku yang berisi tentang ilmu statistika. Statistika adalah cabang matematika yang berkaitan dengan ', 'uploads/64c0d5347212d.jpg'),
(20, '7 in 1 Pemrograman Web untuk Pemula', 'Pendidikan', 116000, 'Teknologi pemrograman web terus berkembang begitu cepat. Bagi pemula, tentu akan sangat tertinggal j', 'uploads/64c0d5742f752.jpg'),
(21, 'Dongeng: Mengapa Air Laut Rasanya Asin', 'Anak-anak', 17000, 'Dongeng merupakan bentuk sastra lama yang bercerita tentang suatu kejadian yang luar biasa dan penuh', 'uploads/64c0dc9aa876d.png');

-- --------------------------------------------------------

--
-- Table structure for table `menginput`
--

CREATE TABLE `menginput` (
  `id_input` int(11) NOT NULL,
  `tanggal_input` datetime NOT NULL,
  `id_penjual` int(11) NOT NULL,
  `id_buku` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `menginput`
--

INSERT INTO `menginput` (`id_input`, `tanggal_input`, `id_penjual`, `id_buku`) VALUES
(8, '2023-07-26 00:00:00', 1, 15),
(9, '2023-07-26 00:00:00', 1, 16),
(11, '2023-07-26 00:00:00', 1, 18),
(12, '2023-07-26 00:00:00', 1, 19),
(13, '2023-07-26 00:00:00', 1, 20),
(14, '2023-07-26 00:00:00', 1, 21);

-- --------------------------------------------------------

--
-- Table structure for table `pembeli`
--

CREATE TABLE `pembeli` (
  `id_pembeli` int(11) NOT NULL,
  `username_pembeli` varchar(100) NOT NULL,
  `password_pembeli` varchar(100) NOT NULL,
  `nama_pembeli` varchar(100) NOT NULL,
  `alamat_pembeli` varchar(100) NOT NULL,
  `telepon_pembeli` varchar(100) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `pembeli`
--

INSERT INTO `pembeli` (`id_pembeli`, `username_pembeli`, `password_pembeli`, `nama_pembeli`, `alamat_pembeli`, `telepon_pembeli`) VALUES
(1, 'pembeli1', '$2a$10$L0JdCj7wELT6ZIto2GCZAehqiNuy/0OMsQk3lCgXscUq6jPw9Zv8C', 'pembeli1', 'jl.jeruk', '0896');

-- --------------------------------------------------------

--
-- Table structure for table `penjual`
--

CREATE TABLE `penjual` (
  `id_penjual` int(11) NOT NULL,
  `username_penjual` varchar(100) NOT NULL,
  `password_penjual` varchar(100) NOT NULL,
  `nama_penjual` varchar(100) NOT NULL,
  `alamat_penjual` varchar(100) NOT NULL,
  `telepon_penjual` varchar(100) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `penjual`
--

INSERT INTO `penjual` (`id_penjual`, `username_penjual`, `password_penjual`, `nama_penjual`, `alamat_penjual`, `telepon_penjual`) VALUES
(1, 'penjual1', '$2a$10$L0JdCj7wELT6ZIto2GCZAehqiNuy/0OMsQk3lCgXscUq6jPw9Zv8C', 'penjual1', 'jl.mangga', '0821');

-- --------------------------------------------------------

--
-- Table structure for table `transaksi`
--

CREATE TABLE `transaksi` (
  `id_transaksi` int(11) NOT NULL,
  `tanggal_transaksi` datetime NOT NULL,
  `jumlah_produk` int(100) NOT NULL,
  `total_transaksi` int(100) NOT NULL,
  `id_pembeli` int(11) NOT NULL,
  `id_buku` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `transaksi`
--

INSERT INTO `transaksi` (`id_transaksi`, `tanggal_transaksi`, `jumlah_produk`, `total_transaksi`, `id_pembeli`, `id_buku`) VALUES
(45, '2023-08-02 00:00:00', 3, 201000, 1, 15);

--
-- Indexes for dumped tables
--

--
-- Indexes for table `buku`
--
ALTER TABLE `buku`
  ADD PRIMARY KEY (`id_buku`);

--
-- Indexes for table `menginput`
--
ALTER TABLE `menginput`
  ADD PRIMARY KEY (`id_input`),
  ADD KEY `id_penjual` (`id_penjual`),
  ADD KEY `id_buku` (`id_buku`);

--
-- Indexes for table `pembeli`
--
ALTER TABLE `pembeli`
  ADD PRIMARY KEY (`id_pembeli`);

--
-- Indexes for table `penjual`
--
ALTER TABLE `penjual`
  ADD PRIMARY KEY (`id_penjual`);

--
-- Indexes for table `transaksi`
--
ALTER TABLE `transaksi`
  ADD PRIMARY KEY (`id_transaksi`),
  ADD KEY `id_pembeli` (`id_pembeli`),
  ADD KEY `id_buku` (`id_buku`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `buku`
--
ALTER TABLE `buku`
  MODIFY `id_buku` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=22;

--
-- AUTO_INCREMENT for table `menginput`
--
ALTER TABLE `menginput`
  MODIFY `id_input` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=15;

--
-- AUTO_INCREMENT for table `pembeli`
--
ALTER TABLE `pembeli`
  MODIFY `id_pembeli` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=12;

--
-- AUTO_INCREMENT for table `penjual`
--
ALTER TABLE `penjual`
  MODIFY `id_penjual` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT for table `transaksi`
--
ALTER TABLE `transaksi`
  MODIFY `id_transaksi` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=46;

--
-- Constraints for dumped tables
--

--
-- Constraints for table `menginput`
--
ALTER TABLE `menginput`
  ADD CONSTRAINT `menginput_ibfk_1` FOREIGN KEY (`id_penjual`) REFERENCES `penjual` (`id_penjual`),
  ADD CONSTRAINT `menginput_ibfk_2` FOREIGN KEY (`id_buku`) REFERENCES `buku` (`id_buku`);

--
-- Constraints for table `transaksi`
--
ALTER TABLE `transaksi`
  ADD CONSTRAINT `transaksi_ibfk_1` FOREIGN KEY (`id_pembeli`) REFERENCES `pembeli` (`id_pembeli`),
  ADD CONSTRAINT `transaksi_ibfk_2` FOREIGN KEY (`id_buku`) REFERENCES `buku` (`id_buku`);
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
