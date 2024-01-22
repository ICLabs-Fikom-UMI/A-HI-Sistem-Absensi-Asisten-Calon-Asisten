-- phpMyAdmin SQL Dump
-- version 5.2.1
-- https://www.phpmyadmin.net/
--
-- Host: localhost
-- Waktu pembuatan: 23 Jan 2024 pada 00.20
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
-- Database: `db_A_HI`
--

-- --------------------------------------------------------

--
-- Struktur dari tabel `mst_status_kedatangan`
--

CREATE TABLE `mst_status_kedatangan` (
  `id_status_kedatangan` int(11) NOT NULL,
  `status_kedatangan` varchar(20) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

-- --------------------------------------------------------

--
-- Struktur dari tabel `mst_user`
--

CREATE TABLE `mst_user` (
  `id_user` int(11) NOT NULL,
  `username` varchar(50) NOT NULL,
  `password` varchar(50) NOT NULL,
  `role` varchar(10) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

-- --------------------------------------------------------

--
-- Struktur dari tabel `mst_waktu`
--

CREATE TABLE `mst_waktu` (
  `id_waktu` int(11) NOT NULL,
  `waktuKedatangan` datetime NOT NULL DEFAULT current_timestamp(),
  `waktuKepulangan` datetime NOT NULL DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

-- --------------------------------------------------------

--
-- Struktur dari tabel `trx_asisten`
--

CREATE TABLE `trx_asisten` (
  `id_asisten` int(11) NOT NULL,
  `id_user` int(11) NOT NULL,
  `nama` varchar(100) NOT NULL,
  `program_studi` varchar(50) NOT NULL,
  `email` varchar(50) NOT NULL,
  `status` varchar(20) NOT NULL,
  `profile_picture` varchar(10) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

-- --------------------------------------------------------

--
-- Struktur dari tabel `trx_face_data`
--

CREATE TABLE `trx_face_data` (
  `id_asisten` int(11) NOT NULL,
  `face_data` blob NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

-- --------------------------------------------------------

--
-- Struktur dari tabel `trx_kehadiran`
--

CREATE TABLE `trx_kehadiran` (
  `id_kehadiran` int(11) NOT NULL,
  `id_asisten` int(11) NOT NULL,
  `id_waktu` int(11) NOT NULL,
  `id_status_kedatangan` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Indexes for dumped tables
--

--
-- Indeks untuk tabel `mst_status_kedatangan`
--
ALTER TABLE `mst_status_kedatangan`
  ADD PRIMARY KEY (`id_status_kedatangan`);

--
-- Indeks untuk tabel `mst_user`
--
ALTER TABLE `mst_user`
  ADD PRIMARY KEY (`id_user`);

--
-- Indeks untuk tabel `mst_waktu`
--
ALTER TABLE `mst_waktu`
  ADD PRIMARY KEY (`id_waktu`);

--
-- Indeks untuk tabel `trx_asisten`
--
ALTER TABLE `trx_asisten`
  ADD PRIMARY KEY (`id_asisten`),
  ADD KEY `id_user` (`id_user`);

--
-- Indeks untuk tabel `trx_face_data`
--
ALTER TABLE `trx_face_data`
  ADD KEY `id_asisten` (`id_asisten`);

--
-- Indeks untuk tabel `trx_kehadiran`
--
ALTER TABLE `trx_kehadiran`
  ADD PRIMARY KEY (`id_kehadiran`),
  ADD KEY `id_asisten` (`id_asisten`),
  ADD KEY `id_waktu` (`id_waktu`),
  ADD KEY `id_status_kedatangan` (`id_status_kedatangan`);

--
-- AUTO_INCREMENT untuk tabel yang dibuang
--

--
-- AUTO_INCREMENT untuk tabel `mst_status_kedatangan`
--
ALTER TABLE `mst_status_kedatangan`
  MODIFY `id_status_kedatangan` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=301;

--
-- AUTO_INCREMENT untuk tabel `mst_waktu`
--
ALTER TABLE `mst_waktu`
  MODIFY `id_waktu` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=201;

--
-- Ketidakleluasaan untuk tabel pelimpahan (Dumped Tables)
--

--
-- Ketidakleluasaan untuk tabel `trx_asisten`
--
ALTER TABLE `trx_asisten`
  ADD CONSTRAINT `trx_asisten_ibfk_1` FOREIGN KEY (`id_user`) REFERENCES `mst_user` (`id_user`) ON DELETE CASCADE;

--
-- Ketidakleluasaan untuk tabel `trx_face_data`
--
ALTER TABLE `trx_face_data`
  ADD CONSTRAINT `trx_face_data_ibfk_1` FOREIGN KEY (`id_asisten`) REFERENCES `trx_asisten` (`id_asisten`) ON DELETE CASCADE,
  ADD CONSTRAINT `trx_face_data_ibfk_2` FOREIGN KEY (`id_asisten`) REFERENCES `trx_asisten` (`id_asisten`) ON DELETE CASCADE;

--
-- Ketidakleluasaan untuk tabel `trx_kehadiran`
--
ALTER TABLE `trx_kehadiran`
  ADD CONSTRAINT `trx_kehadiran_ibfk_1` FOREIGN KEY (`id_asisten`) REFERENCES `trx_asisten` (`id_asisten`),
  ADD CONSTRAINT `trx_kehadiran_ibfk_2` FOREIGN KEY (`id_waktu`) REFERENCES `mst_waktu` (`id_waktu`),
  ADD CONSTRAINT `trx_kehadiran_ibfk_3` FOREIGN KEY (`id_status_kedatangan`) REFERENCES `mst_status_kedatangan` (`id_status_kedatangan`);
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
