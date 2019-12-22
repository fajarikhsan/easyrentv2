-- phpMyAdmin SQL Dump
-- version 4.9.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Waktu pembuatan: 15 Des 2019 pada 15.47
-- Versi server: 10.4.8-MariaDB
-- Versi PHP: 7.3.11

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET AUTOCOMMIT = 0;
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `easyrent`
--

-- --------------------------------------------------------

--
-- Struktur dari tabel `mobil`
--

CREATE TABLE `mobil` (
  `id_mobil` int(11) NOT NULL,
  `nama_mobil` varchar(30) DEFAULT NULL,
  `thn_mobil` year(4) DEFAULT NULL,
  `tipe_mobil` varchar(20) DEFAULT NULL,
  `silinder` varchar(10) DEFAULT NULL,
  `harga` int(11) DEFAULT NULL,
  `deskripsi` varchar(200) DEFAULT NULL,
  `foto_mobil` blob DEFAULT NULL,
  `nama_toko` varchar(20) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

-- --------------------------------------------------------

--
-- Struktur dari tabel `pembayaran`
--

CREATE TABLE `pembayaran` (
  `no_faktur` varchar(40) NOT NULL,
  `total_harga` int(11) DEFAULT NULL,
  `tgl_pembayaran` date DEFAULT NULL,
  `id_pesanan` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

-- --------------------------------------------------------

--
-- Struktur dari tabel `penyedia`
--

CREATE TABLE `penyedia` (
  `nama_toko` varchar(20) NOT NULL,
  `email` varchar(40) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

-- --------------------------------------------------------

--
-- Struktur dari tabel `perental`
--

CREATE TABLE `perental` (
  `email` varchar(40) NOT NULL,
  `ktp` blob DEFAULT NULL,
  `selfie` blob DEFAULT NULL,
  `kk` blob DEFAULT NULL,
  `sim` blob DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data untuk tabel `perental`
--

INSERT INTO `perental` (`email`, `ktp`, `selfie`, `kk`, `sim`) VALUES
('fajarikhsan3@gmail.com', 0x4b54502e6a7067, 0x4b54502053656c662e6a7067, 0x4b4b2e6a7067, '');

-- --------------------------------------------------------

--
-- Struktur dari tabel `transaksi`
--

CREATE TABLE `transaksi` (
  `id_pesanan` int(11) NOT NULL,
  `status` enum('0','1') DEFAULT NULL,
  `email` varchar(40) NOT NULL,
  `nama_toko` varchar(20) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

-- --------------------------------------------------------

--
-- Struktur dari tabel `user`
--

CREATE TABLE `user` (
  `nama` varchar(40) NOT NULL,
  `username` varchar(20) NOT NULL,
  `email` varchar(40) NOT NULL,
  `nohp` varchar(12) DEFAULT NULL,
  `password` varchar(40) DEFAULT NULL,
  `token` varchar(255) DEFAULT NULL,
  `aktif` enum('1','0') DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data untuk tabel `user`
--

INSERT INTO `user` (`nama`, `username`, `email`, `nohp`, `password`, `token`, `aktif`) VALUES
('Fajar Ikhsan', 'fajarikhsan', 'fajarikhsan3@gmail.com', '085314930404', 'fafa', '3f44d0a290df0d988719e8d9a4f346dc11a0c717d3c63ce7583d7f61bfab400d', '1');

--
-- Indexes for dumped tables
--

--
-- Indeks untuk tabel `mobil`
--
ALTER TABLE `mobil`
  ADD PRIMARY KEY (`id_mobil`),
  ADD KEY `nama_toko` (`nama_toko`);

--
-- Indeks untuk tabel `pembayaran`
--
ALTER TABLE `pembayaran`
  ADD PRIMARY KEY (`no_faktur`),
  ADD KEY `id_pesanan` (`id_pesanan`);

--
-- Indeks untuk tabel `penyedia`
--
ALTER TABLE `penyedia`
  ADD PRIMARY KEY (`nama_toko`),
  ADD KEY `email` (`email`);

--
-- Indeks untuk tabel `perental`
--
ALTER TABLE `perental`
  ADD KEY `email` (`email`);

--
-- Indeks untuk tabel `transaksi`
--
ALTER TABLE `transaksi`
  ADD PRIMARY KEY (`id_pesanan`),
  ADD KEY `email` (`email`),
  ADD KEY `nama_toko` (`nama_toko`);

--
-- Indeks untuk tabel `user`
--
ALTER TABLE `user`
  ADD PRIMARY KEY (`email`);

--
-- AUTO_INCREMENT untuk tabel yang dibuang
--

--
-- AUTO_INCREMENT untuk tabel `mobil`
--
ALTER TABLE `mobil`
  MODIFY `id_mobil` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- Ketidakleluasaan untuk tabel pelimpahan (Dumped Tables)
--

--
-- Ketidakleluasaan untuk tabel `mobil`
--
ALTER TABLE `mobil`
  ADD CONSTRAINT `mobil_ibfk_1` FOREIGN KEY (`nama_toko`) REFERENCES `penyedia` (`nama_toko`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Ketidakleluasaan untuk tabel `pembayaran`
--
ALTER TABLE `pembayaran`
  ADD CONSTRAINT `pembayaran_ibfk_1` FOREIGN KEY (`id_pesanan`) REFERENCES `transaksi` (`id_pesanan`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Ketidakleluasaan untuk tabel `penyedia`
--
ALTER TABLE `penyedia`
  ADD CONSTRAINT `penyedia_ibfk_1` FOREIGN KEY (`email`) REFERENCES `user` (`email`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Ketidakleluasaan untuk tabel `perental`
--
ALTER TABLE `perental`
  ADD CONSTRAINT `perental_ibfk_1` FOREIGN KEY (`email`) REFERENCES `user` (`email`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Ketidakleluasaan untuk tabel `transaksi`
--
ALTER TABLE `transaksi`
  ADD CONSTRAINT `transaksi_ibfk_1` FOREIGN KEY (`email`) REFERENCES `perental` (`email`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `transaksi_ibfk_2` FOREIGN KEY (`nama_toko`) REFERENCES `penyedia` (`nama_toko`) ON DELETE CASCADE ON UPDATE CASCADE;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
