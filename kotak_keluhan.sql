-- phpMyAdmin SQL Dump
-- version 4.8.0
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Waktu pembuatan: 05 Mar 2020 pada 13.35
-- Versi server: 10.1.31-MariaDB
-- Versi PHP: 7.2.4

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET AUTOCOMMIT = 0;
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `kotak_keluhan`
--

-- --------------------------------------------------------

--
-- Struktur dari tabel `kelas`
--

CREATE TABLE `kelas` (
  `id` int(11) NOT NULL,
  `kelas` varchar(10) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data untuk tabel `kelas`
--

INSERT INTO `kelas` (`id`, `kelas`) VALUES
(1, 'XII RPL 1'),
(2, 'XII RPL 2');

-- --------------------------------------------------------

--
-- Struktur dari tabel `keluhan`
--

CREATE TABLE `keluhan` (
  `id` int(11) NOT NULL,
  `keluhan` text NOT NULL,
  `nama` varchar(128) NOT NULL,
  `nis` int(20) NOT NULL,
  `kelas` varchar(10) NOT NULL,
  `dokumen` varchar(128) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data untuk tabel `keluhan`
--

INSERT INTO `keluhan` (`id`, `keluhan`, `nama`, `nis`, `kelas`, `dokumen`) VALUES
(3, 'wc kotor', 'Nvi', 17180727, 'XII RPL 2', 'Foto_Profil_Dark.jpg');

-- --------------------------------------------------------

--
-- Struktur dari tabel `user`
--

CREATE TABLE `user` (
  `id` int(11) NOT NULL,
  `username` varchar(128) NOT NULL,
  `password` varchar(128) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data untuk tabel `user`
--

INSERT INTO `user` (`id`, `username`, `password`) VALUES
(1, 'admin', '$2y$12$1bGgusN5O0hFE0xDSkaHf.aCWKjKjmLpznGFP/7i9LUYh/lUzNpAq');

--
-- Indexes for dumped tables
--

--
-- Indeks untuk tabel `kelas`
--
ALTER TABLE `kelas`
  ADD PRIMARY KEY (`id`);

--
-- Indeks untuk tabel `keluhan`
--
ALTER TABLE `keluhan`
  ADD PRIMARY KEY (`id`);

--
-- Indeks untuk tabel `user`
--
ALTER TABLE `user`
  ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT untuk tabel yang dibuang
--

--
-- AUTO_INCREMENT untuk tabel `kelas`
--
ALTER TABLE `kelas`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT untuk tabel `keluhan`
--
ALTER TABLE `keluhan`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT untuk tabel `user`
--
ALTER TABLE `user`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
