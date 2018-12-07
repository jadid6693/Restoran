-- phpMyAdmin SQL Dump
-- version 4.5.1
-- http://www.phpmyadmin.net
--
-- Host: 127.0.0.1
-- Generation Time: 07 Des 2018 pada 14.13
-- Versi Server: 10.1.16-MariaDB
-- PHP Version: 5.6.24

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `restoon`
--

-- --------------------------------------------------------

--
-- Struktur dari tabel `admin`
--

CREATE TABLE `admin` (
  `IdAdmin` int(11) NOT NULL,
  `AdminLogin` varchar(8) NOT NULL,
  `NamaAdmin` varchar(25) NOT NULL,
  `PasswordAdmin` varchar(32) NOT NULL,
  `JenisKelamin` varchar(1) NOT NULL,
  `NoTelp` varchar(13) NOT NULL,
  `Alamat` varchar(100) NOT NULL,
  `TanggalLahir` date NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data untuk tabel `admin`
--

INSERT INTO `admin` (`IdAdmin`, `AdminLogin`, `NamaAdmin`, `PasswordAdmin`, `JenisKelamin`, `NoTelp`, `Alamat`, `TanggalLahir`) VALUES
(1, 'SuperAdm', 'Super Admin', 'c1748cef0ad084aa2265c358957bbfe6', 'L', '08818182430', 'Perak Barat No.179', '1997-07-17'),
(2, 'Admi2', 'Admin Novi', '5b41310cd3a0fced1877a71ffd8c992f', 'P', '085608511851', 'Arjuno No.23', '1999-12-31');

-- --------------------------------------------------------

--
-- Struktur dari tabel `dtrans`
--

CREATE TABLE `dtrans` (
  `IdNota` int(11) NOT NULL,
  `IdMenu` int(11) NOT NULL,
  `JumlahMenu` int(11) NOT NULL,
  `HargaMenu` bigint(20) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

-- --------------------------------------------------------

--
-- Struktur dari tabel `htrans`
--

CREATE TABLE `htrans` (
  `IdNota` int(11) NOT NULL,
  `UserLogin` varchar(7) NOT NULL,
  `Tanggal` date NOT NULL,
  `Keterangan` text NOT NULL,
  `Total` bigint(20) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

-- --------------------------------------------------------

--
-- Struktur dari tabel `jenis`
--

CREATE TABLE `jenis` (
  `IdJenis` int(11) NOT NULL,
  `JudulJenis` varchar(100) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data untuk tabel `jenis`
--

INSERT INTO `jenis` (`IdJenis`, `JudulJenis`) VALUES
(1, 'Makanan'),
(2, 'Minuman');

-- --------------------------------------------------------

--
-- Struktur dari tabel `menu`
--

CREATE TABLE `menu` (
  `IdMenu` int(11) NOT NULL,
  `IdJenis` int(11) NOT NULL,
  `JudulMenu` varchar(100) NOT NULL,
  `Harga` bigint(20) NOT NULL,
  `NamaGambar` varchar(100) NOT NULL,
  `status` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data untuk tabel `menu`
--

INSERT INTO `menu` (`IdMenu`, `IdJenis`, `JudulMenu`, `Harga`, `NamaGambar`, `status`) VALUES
(1, 1, 'Ayam Bakar', 250000, 'ayam-bakar.jpg', 1),
(2, 1, 'Bakso', 20000, 'bakso.jpg', 1),
(3, 1, 'Burger', 20000, 'burger.jpg', 1),
(4, 2, 'Es Campur', 12000, 'es-campur.jpg', 1);

-- --------------------------------------------------------

--
-- Struktur dari tabel `user`
--

CREATE TABLE `user` (
  `IdUser` int(11) NOT NULL,
  `UserLogin` varchar(7) NOT NULL,
  `NamaUser` varchar(25) NOT NULL,
  `PasswordUser` varchar(32) NOT NULL,
  `JenisKelamin` varchar(1) NOT NULL,
  `NoTelp` varchar(13) NOT NULL,
  `Alamat` varchar(100) NOT NULL,
  `TanggalLahir` date NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data untuk tabel `user`
--

INSERT INTO `user` (`IdUser`, `UserLogin`, `NamaUser`, `PasswordUser`, `JenisKelamin`, `NoTelp`, `Alamat`, `TanggalLahir`) VALUES
(1, 'Zain1', 'Zainal Abidin', 'e10adc3949ba59abbe56e057f20f883e', 'L', '087855515550', 'Tg Karang III/5', '1995-04-01'),
(2, 'Nova2', 'Novalia', 'e10adc3949ba59abbe56e057f20f883e', 'P', '081232559661', 'Pucang Anom Timur 3', '1999-09-09');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `admin`
--
ALTER TABLE `admin`
  ADD PRIMARY KEY (`IdAdmin`),
  ADD UNIQUE KEY `AdminLogin` (`AdminLogin`);

--
-- Indexes for table `dtrans`
--
ALTER TABLE `dtrans`
  ADD KEY `IdNota` (`IdNota`),
  ADD KEY `IdMenu` (`IdMenu`);

--
-- Indexes for table `htrans`
--
ALTER TABLE `htrans`
  ADD PRIMARY KEY (`IdNota`),
  ADD KEY `UserLogin` (`UserLogin`);

--
-- Indexes for table `jenis`
--
ALTER TABLE `jenis`
  ADD PRIMARY KEY (`IdJenis`);

--
-- Indexes for table `menu`
--
ALTER TABLE `menu`
  ADD PRIMARY KEY (`IdMenu`),
  ADD KEY `IdJenis` (`IdJenis`);

--
-- Indexes for table `user`
--
ALTER TABLE `user`
  ADD PRIMARY KEY (`IdUser`),
  ADD UNIQUE KEY `UserLogin` (`UserLogin`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `admin`
--
ALTER TABLE `admin`
  MODIFY `IdAdmin` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;
--
-- AUTO_INCREMENT for table `htrans`
--
ALTER TABLE `htrans`
  MODIFY `IdNota` int(11) NOT NULL AUTO_INCREMENT;
--
-- AUTO_INCREMENT for table `jenis`
--
ALTER TABLE `jenis`
  MODIFY `IdJenis` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;
--
-- AUTO_INCREMENT for table `menu`
--
ALTER TABLE `menu`
  MODIFY `IdMenu` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;
--
-- AUTO_INCREMENT for table `user`
--
ALTER TABLE `user`
  MODIFY `IdUser` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;
--
-- Ketidakleluasaan untuk tabel pelimpahan (Dumped Tables)
--

--
-- Ketidakleluasaan untuk tabel `dtrans`
--
ALTER TABLE `dtrans`
  ADD CONSTRAINT `dtrans_ibfk_1` FOREIGN KEY (`IdNota`) REFERENCES `htrans` (`IdNota`),
  ADD CONSTRAINT `dtrans_ibfk_2` FOREIGN KEY (`IdMenu`) REFERENCES `menu` (`IdMenu`);

--
-- Ketidakleluasaan untuk tabel `htrans`
--
ALTER TABLE `htrans`
  ADD CONSTRAINT `htrans_ibfk_1` FOREIGN KEY (`UserLogin`) REFERENCES `user` (`UserLogin`);

--
-- Ketidakleluasaan untuk tabel `menu`
--
ALTER TABLE `menu`
  ADD CONSTRAINT `menu_ibfk_1` FOREIGN KEY (`IdJenis`) REFERENCES `jenis` (`IdJenis`);

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
