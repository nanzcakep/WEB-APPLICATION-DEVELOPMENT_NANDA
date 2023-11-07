-- phpMyAdmin SQL Dump
-- version 5.2.1
-- https://www.phpmyadmin.net/
--
-- Host: localhost
-- Waktu pembuatan: 07 Nov 2023 pada 17.42
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
-- Database: `db_toko_bekas`
--

-- --------------------------------------------------------

--
-- Struktur dari tabel `barang_bekas`
--

CREATE TABLE `barang_bekas` (
  `id` int(11) NOT NULL,
  `nama_barang` varchar(255) NOT NULL,
  `deskripsi` text DEFAULT NULL,
  `kategori` varchar(50) DEFAULT NULL,
  `harga` decimal(10,2) DEFAULT NULL,
  `kondisi` varchar(20) DEFAULT NULL,
  `gambar_url` varchar(255) DEFAULT NULL,
  `kontak_penjual` varchar(100) DEFAULT NULL,
  `tgl_posting` timestamp NOT NULL DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data untuk tabel `barang_bekas`
--

INSERT INTO `barang_bekas` (`id`, `nama_barang`, `deskripsi`, `kategori`, `harga`, `kondisi`, `gambar_url`, `kontak_penjual`, `tgl_posting`) VALUES
(1, 'Baju Thirft', 'Baju vintage tahun 90', 'Baju', 90000.00, 'Bagus', 'aa', '08921312', '2023-11-07 16:29:42');

--
-- Indexes for dumped tables
--

--
-- Indeks untuk tabel `barang_bekas`
--
ALTER TABLE `barang_bekas`
  ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT untuk tabel yang dibuang
--

--
-- AUTO_INCREMENT untuk tabel `barang_bekas`
--
ALTER TABLE `barang_bekas`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
