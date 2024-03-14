-- phpMyAdmin SQL Dump
-- version 4.8.5
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Waktu pembuatan: 14 Mar 2024 pada 08.15
-- Versi server: 10.1.40-MariaDB
-- Versi PHP: 7.1.29

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET AUTOCOMMIT = 0;
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `db_kelurahan`
--

-- --------------------------------------------------------

--
-- Struktur dari tabel `setting`
--

CREATE TABLE `setting` (
  `id` int(11) NOT NULL,
  `title_admin` varchar(200) NOT NULL,
  `title_login` varchar(200) NOT NULL,
  `statistik_data` varchar(100) NOT NULL,
  `mode_perbaikan` varchar(100) NOT NULL,
  `sebutan_desa` varchar(100) NOT NULL,
  `sebutan_dusun` varchar(100) NOT NULL,
  `tema_modul` varchar(100) NOT NULL,
  `artikel_page` varchar(100) NOT NULL,
  `vendor` varchar(200) NOT NULL,
  `cek_internet` varchar(100) NOT NULL,
  `latar_website` varchar(500) NOT NULL,
  `latar_login_admin` varchar(500) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data untuk tabel `setting`
--

INSERT INTO `setting` (`id`, `title_admin`, `title_login`, `statistik_data`, `mode_perbaikan`, `sebutan_desa`, `sebutan_dusun`, `tema_modul`, `artikel_page`, `vendor`, `cek_internet`, `latar_website`, `latar_login_admin`) VALUES
(1, 'Management Sistem', 'Sistem Informasi', 'Tidak', 'Tidak', 'Desa', 'Dusun', 'skin-purple', '5', 'Glen Alvaro', 'Tidak', 'web.jpg', 'manado-city-2.jpg');

-- --------------------------------------------------------

--
-- Struktur dari tabel `user`
--

CREATE TABLE `user` (
  `id` int(11) NOT NULL,
  `name` varchar(128) NOT NULL,
  `email` varchar(128) NOT NULL,
  `no_hp` varchar(17) NOT NULL,
  `alamat` varchar(100) NOT NULL,
  `image` varchar(128) NOT NULL,
  `password` varchar(256) NOT NULL,
  `role_id` int(11) NOT NULL,
  `is_active` int(1) NOT NULL,
  `date_created` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data untuk tabel `user`
--

INSERT INTO `user` (`id`, `name`, `email`, `no_hp`, `alamat`, `image`, `password`, `role_id`, `is_active`, `date_created`) VALUES
(1, 'Administrator', 'admin@gmail.com', '081242291179', 'Tataaran 2, Lingkungan I', 'Glendy_Rongko_(1).png', '$2y$10$CxX9lhFJ4osja3wF92cIuu4d7CHPEBC2Kb8.XuTANWKk.cNbfdbNy', 1, 1, 1645368145),
(2, 'Operator Buyat', 'user@gmail.com', '0898013040201', 'Tomohon', 'Operator_Desa.png', '$2y$10$UjsTE5NgRRaDa0kD9fwPEe5YgVBsu4YyIxxlttRhybtkmLuBZidsK', 3, 1, 1645368382);

-- --------------------------------------------------------

--
-- Struktur dari tabel `user_access_menu`
--

CREATE TABLE `user_access_menu` (
  `id` int(11) NOT NULL,
  `role_id` int(11) NOT NULL,
  `menu_id` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data untuk tabel `user_access_menu`
--

INSERT INTO `user_access_menu` (`id`, `role_id`, `menu_id`) VALUES
(1, 1, 1),
(3, 2, 2),
(6, 1, 3),
(10, 4, 2),
(11, 4, 6),
(12, 3, 6),
(13, 1, 6),
(14, 1, 7),
(15, 1, 8),
(16, 1, 9),
(17, 6, 2),
(19, 5, 2),
(20, 5, 8),
(21, 1, 10),
(22, 9, 2),
(23, 9, 9),
(24, 6, 10),
(25, 1, 11),
(26, 7, 2),
(29, 1, 12),
(31, 8, 2),
(33, 7, 12),
(34, 8, 11),
(35, 3, 2),
(37, 1, 4),
(38, 1, 5);

-- --------------------------------------------------------

--
-- Struktur dari tabel `user_menu`
--

CREATE TABLE `user_menu` (
  `id` int(11) NOT NULL,
  `menu` varchar(128) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data untuk tabel `user_menu`
--

INSERT INTO `user_menu` (`id`, `menu`) VALUES
(2, 'User'),
(3, 'Menu'),
(4, 'Pengaturan'),
(5, 'Kependudukan');

-- --------------------------------------------------------

--
-- Struktur dari tabel `user_role`
--

CREATE TABLE `user_role` (
  `id` int(11) NOT NULL,
  `role` varchar(128) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data untuk tabel `user_role`
--

INSERT INTO `user_role` (`id`, `role`) VALUES
(1, 'Administrator'),
(2, 'Operator'),
(3, 'Redaksi');

-- --------------------------------------------------------

--
-- Struktur dari tabel `user_sub_menu`
--

CREATE TABLE `user_sub_menu` (
  `id` int(11) NOT NULL,
  `menu_id` int(11) NOT NULL,
  `title` varchar(128) NOT NULL,
  `url` varchar(128) NOT NULL,
  `icon` varchar(128) NOT NULL,
  `is_active` int(1) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data untuk tabel `user_sub_menu`
--

INSERT INTO `user_sub_menu` (`id`, `menu_id`, `title`, `url`, `icon`, `is_active`) VALUES
(1, 1, 'Home', 'home', 'fa fa-home', 1),
(2, 2, 'Profil', 'user', 'fa fa-user-circle', 1),
(23, 1, 'Informasi Desa', 'admin/identitas_desa', 'fa fa-television', 1),
(25, 3, 'Wilayah Administratif', 'wilayah_desa', 'fa fa-map-marker', 1),
(26, 4, 'Modul', 'menu', 'fa fa-tags', 1),
(27, 4, 'Pengguna', 'admin/list_user', 'fa fa-users', 1),
(28, 4, 'Aplikasi', 'admin/setting', 'fa fa-cube', 1),
(29, 4, 'Database', 'admin/database', 'fa fa-database', 1),
(31, 3, 'Informasi Desa', 'admin/identitas_desa', 'fa fa-tv', 1),
(32, 5, 'Penduduk', 'data_penduduk', 'fa fa-user', 1);

--
-- Indexes for dumped tables
--

--
-- Indeks untuk tabel `setting`
--
ALTER TABLE `setting`
  ADD PRIMARY KEY (`id`);

--
-- Indeks untuk tabel `user`
--
ALTER TABLE `user`
  ADD PRIMARY KEY (`id`);

--
-- Indeks untuk tabel `user_access_menu`
--
ALTER TABLE `user_access_menu`
  ADD PRIMARY KEY (`id`);

--
-- Indeks untuk tabel `user_menu`
--
ALTER TABLE `user_menu`
  ADD PRIMARY KEY (`id`);

--
-- Indeks untuk tabel `user_role`
--
ALTER TABLE `user_role`
  ADD PRIMARY KEY (`id`);

--
-- Indeks untuk tabel `user_sub_menu`
--
ALTER TABLE `user_sub_menu`
  ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT untuk tabel yang dibuang
--

--
-- AUTO_INCREMENT untuk tabel `setting`
--
ALTER TABLE `setting`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT untuk tabel `user`
--
ALTER TABLE `user`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT untuk tabel `user_access_menu`
--
ALTER TABLE `user_access_menu`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=39;

--
-- AUTO_INCREMENT untuk tabel `user_menu`
--
ALTER TABLE `user_menu`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;

--
-- AUTO_INCREMENT untuk tabel `user_role`
--
ALTER TABLE `user_role`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT untuk tabel `user_sub_menu`
--
ALTER TABLE `user_sub_menu`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=33;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
