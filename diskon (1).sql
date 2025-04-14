-- phpMyAdmin SQL Dump
-- version 5.2.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Waktu pembuatan: 11 Apr 2025 pada 05.09
-- Versi server: 10.4.28-MariaDB
-- Versi PHP: 8.2.4

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `diskon`
--

-- --------------------------------------------------------

--
-- Struktur dari tabel `barang`
--

CREATE TABLE `barang` (
  `IdBarang` int(11) NOT NULL,
  `NamaBarang` varchar(50) DEFAULT NULL,
  `Harga` int(50) DEFAULT NULL,
  `Besarandiskon` decimal(10,2) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data untuk tabel `barang`
--

INSERT INTO `barang` (`IdBarang`, `NamaBarang`, `Harga`, `Besarandiskon`) VALUES
(3, 'mie', 2000, NULL),
(13, 'juken', 2000000, 50.00),
(16, 'popok', 3000, 21.00),
(17, 'air', 5000, 30.50),
(18, 'kursi', 150000, 10.00);

-- --------------------------------------------------------

--
-- Struktur dari tabel `transaksi`
--

CREATE TABLE `transaksi` (
  `IdTransaksi` int(11) NOT NULL,
  `Jumlah` int(50) DEFAULT NULL,
  `TotalHarga` int(255) DEFAULT NULL,
  `IdBarang` int(11) DEFAULT NULL,
  `IdUser` int(11) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data untuk tabel `transaksi`
--

INSERT INTO `transaksi` (`IdTransaksi`, `Jumlah`, `TotalHarga`, `IdBarang`, `IdUser`) VALUES
(1, 18, 36000, 3, 1),
(2, 2, 4000, 3, 1),
(3, 1, 2000, 3, 1),
(6, 4, 8000000, 13, 1),
(7, 2, 3480000, 13, 1),
(8, 1, 1740000, 13, 1),
(11, 1, 1740000, 13, 1),
(12, 15, 26100000, 13, 1),
(14, 6, 20850, 17, 1),
(15, 1, 3475, 17, 16),
(16, 9, 31275, 17, 1),
(18, 2, 300000, 18, 1),
(19, 2, 300000, 18, 1),
(20, 1, 135000, 18, 1),
(21, 3, 405000, 18, 1),
(22, 1, 2370, 16, 1),
(23, 4, 540000, 18, 16),
(25, 1, 135000, 18, 1),
(26, 2, 270000, 18, 23),
(27, 1, 2000, 3, 23),
(28, 2, 270000, 18, 24),
(29, 20, 69500, 17, 1),
(30, 20, 20000000, 13, 1),
(31, 2, 270000, 18, 1);

-- --------------------------------------------------------

--
-- Struktur dari tabel `user`
--

CREATE TABLE `user` (
  `IdUser` int(11) NOT NULL,
  `Username` varchar(50) DEFAULT NULL,
  `Password` varchar(255) DEFAULT NULL,
  `NamaLengkap` varchar(50) DEFAULT NULL,
  `Role` enum('Admin','Pengguna') DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data untuk tabel `user`
--

INSERT INTO `user` (`IdUser`, `Username`, `Password`, `NamaLengkap`, `Role`) VALUES
(1, 'hasan', '$2y$10$Y0hYXSfMOATtLilv7XTJceFfQUKknpvtNKRkeRRYqFSVThrc8qqc.', 'hasan1', 'Pengguna'),
(4, 'hasanedu', '$2y$10$NgC2YxqvJIRAFrvh7o1ATe4iXr4rcwRPFYA2kqTT/Y1rj7DYZLkpq', 'hasan', 'Admin'),
(16, 'candra', '$2y$10$5nzAyAyTDGx32RErzw2h7.mIQywW8AHJ78RwD733OYrYidFTHqGdO', 'candra', 'Pengguna'),
(19, 'candraadmin', '$2y$10$6O4HrDGyMTSPrNwbUUoimeRS4aX9nD6P98KVzglQzrcq0UOY2/OPK', 'candra123', 'Admin'),
(23, 'cotoh', '$2y$10$VFhRPLbFSVNRN.KRiHL1Puju1xRxDkep6HhhjWk5fOmtXRvqUZydS', 'contoh123', 'Pengguna'),
(24, 'candra29', '$2y$10$lNLW.Va1P5FMfRKhuhgub.JEFQB6zMDCvEnTRzWhPEdpjRuwsN7Ye', 'muhamad candr', 'Pengguna'),
(25, '', '$2y$10$uUYGiw9Vz//OUCLQnf1QfuJJEP8qvFLhH9Szg/0RvZYEi/MrvAJdK', '', ''),
(26, '', '$2y$10$ZPTsy2wtVCtb8vfIf9mp2OehAzcWc1GkKgy4mqnDMtx8m6cheEKCW', '', '');

--
-- Indexes for dumped tables
--

--
-- Indeks untuk tabel `barang`
--
ALTER TABLE `barang`
  ADD PRIMARY KEY (`IdBarang`);

--
-- Indeks untuk tabel `transaksi`
--
ALTER TABLE `transaksi`
  ADD PRIMARY KEY (`IdTransaksi`),
  ADD KEY `FK_transaksi_barang` (`IdBarang`),
  ADD KEY `FK_transaksi_user` (`IdUser`);

--
-- Indeks untuk tabel `user`
--
ALTER TABLE `user`
  ADD PRIMARY KEY (`IdUser`);

--
-- AUTO_INCREMENT untuk tabel yang dibuang
--

--
-- AUTO_INCREMENT untuk tabel `barang`
--
ALTER TABLE `barang`
  MODIFY `IdBarang` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=20;

--
-- AUTO_INCREMENT untuk tabel `transaksi`
--
ALTER TABLE `transaksi`
  MODIFY `IdTransaksi` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=32;

--
-- AUTO_INCREMENT untuk tabel `user`
--
ALTER TABLE `user`
  MODIFY `IdUser` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=27;

--
-- Ketidakleluasaan untuk tabel pelimpahan (Dumped Tables)
--

--
-- Ketidakleluasaan untuk tabel `transaksi`
--
ALTER TABLE `transaksi`
  ADD CONSTRAINT `FK_transaksi_barang` FOREIGN KEY (`IdBarang`) REFERENCES `barang` (`IdBarang`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `FK_transaksi_user` FOREIGN KEY (`IdUser`) REFERENCES `user` (`IdUser`) ON DELETE CASCADE ON UPDATE CASCADE;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
