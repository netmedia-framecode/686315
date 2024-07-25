-- phpMyAdmin SQL Dump
-- version 5.2.1
-- https://www.phpmyadmin.net/
--
-- Host: localhost:3306
-- Waktu pembuatan: 24 Jul 2024 pada 03.08
-- Versi server: 8.0.30
-- Versi PHP: 8.1.10

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `plbn_motamasin_pro`
--

-- --------------------------------------------------------

--
-- Struktur dari tabel `alamat_kendaraan`
--

CREATE TABLE `alamat_kendaraan` (
  `id_alamat_kendaraan` int NOT NULL,
  `jalan` varchar(75) COLLATE utf8mb4_general_ci DEFAULT NULL,
  `kelurahan` varchar(75) COLLATE utf8mb4_general_ci DEFAULT NULL,
  `kecamatan` varchar(75) COLLATE utf8mb4_general_ci DEFAULT NULL,
  `kabupaten_kota` varchar(75) COLLATE utf8mb4_general_ci DEFAULT NULL,
  `provinsi` varchar(75) COLLATE utf8mb4_general_ci DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

-- --------------------------------------------------------

--
-- Struktur dari tabel `alamat_pengemudi`
--

CREATE TABLE `alamat_pengemudi` (
  `id_alamat_pengemudi` int NOT NULL,
  `jalan` varchar(75) COLLATE utf8mb4_general_ci DEFAULT NULL,
  `kelurahan` varchar(75) COLLATE utf8mb4_general_ci DEFAULT NULL,
  `kecamatan` varchar(75) COLLATE utf8mb4_general_ci DEFAULT NULL,
  `kabupaten_kota` varchar(75) COLLATE utf8mb4_general_ci DEFAULT NULL,
  `provinsi` varchar(75) COLLATE utf8mb4_general_ci DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

-- --------------------------------------------------------

--
-- Struktur dari tabel `alamat_tujuan`
--

CREATE TABLE `alamat_tujuan` (
  `id_alamat_tujuan` int NOT NULL,
  `jalan` varchar(75) COLLATE utf8mb4_general_ci DEFAULT NULL,
  `distric` varchar(75) COLLATE utf8mb4_general_ci DEFAULT NULL,
  `sub_distric` varchar(75) COLLATE utf8mb4_general_ci DEFAULT NULL,
  `suco` varchar(75) COLLATE utf8mb4_general_ci DEFAULT NULL,
  `aldeia` varchar(75) COLLATE utf8mb4_general_ci DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

-- --------------------------------------------------------

--
-- Struktur dari tabel `bahan_bakar`
--

CREATE TABLE `bahan_bakar` (
  `id_bahan_bakar` int NOT NULL,
  `bahan_bakar` varchar(50) COLLATE utf8mb4_general_ci DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data untuk tabel `bahan_bakar`
--

INSERT INTO `bahan_bakar` (`id_bahan_bakar`, `bahan_bakar`) VALUES
(1, 'Bensin'),
(2, 'Solar'),
(3, 'Pertamax'),
(4, 'Pertalite'),
(5, 'Premium'),
(6, 'Bio Solar'),
(7, 'Dexlite'),
(8, 'Pertamina Dex'),
(9, 'Biodiesel'),
(10, 'E85'),
(11, 'Electricity');

-- --------------------------------------------------------

--
-- Struktur dari tabel `formulir_wawancara`
--

CREATE TABLE `formulir_wawancara` (
  `id_fw` int NOT NULL,
  `kesehatan` char(10) COLLATE utf8mb4_general_ci DEFAULT NULL,
  `pengemudi_kendaraan` char(10) COLLATE utf8mb4_general_ci DEFAULT NULL,
  `nama_pengemudi` varchar(100) COLLATE utf8mb4_general_ci DEFAULT NULL,
  `tempat_lahir` varchar(50) COLLATE utf8mb4_general_ci DEFAULT NULL,
  `tgl_lahir` date DEFAULT NULL,
  `id_alamat_pengemudi` int DEFAULT NULL,
  `no_pasport_pengemudi` varchar(50) COLLATE utf8mb4_general_ci DEFAULT NULL,
  `no_sim_pengemudi` varchar(75) COLLATE utf8mb4_general_ci DEFAULT NULL,
  `no_hp_pengemudi` varchar(75) COLLATE utf8mb4_general_ci DEFAULT NULL,
  `pemilik_kendaraan` char(10) COLLATE utf8mb4_general_ci DEFAULT NULL,
  `nama_pemilik_kendaraan` char(10) COLLATE utf8mb4_general_ci DEFAULT NULL,
  `identitas_pemilik_kendaraan` char(10) COLLATE utf8mb4_general_ci DEFAULT NULL,
  `id_alamat_kendaraan` int DEFAULT NULL,
  `surat_kuasa` varchar(50) COLLATE utf8mb4_general_ci DEFAULT NULL,
  `plat_nomor` char(15) COLLATE utf8mb4_general_ci DEFAULT NULL,
  `merek_kendaraan` char(15) COLLATE utf8mb4_general_ci DEFAULT NULL,
  `id_kepemilikan_kendaraan` int DEFAULT NULL,
  `id_alamat_tujuan` int DEFAULT NULL,
  `maksud_kunjungan` varchar(50) COLLATE utf8mb4_general_ci DEFAULT NULL,
  `waktu_kunjungan` date DEFAULT NULL,
  `pelanggaran_atas_barang` char(20) COLLATE utf8mb4_general_ci DEFAULT NULL,
  `pelanggaran_atas_penyalahgunaan` char(20) COLLATE utf8mb4_general_ci DEFAULT NULL,
  `pelanggaran_atas_modifikasi` char(20) COLLATE utf8mb4_general_ci DEFAULT NULL,
  `pelanggaran_atas_waktu` char(20) COLLATE utf8mb4_general_ci DEFAULT NULL,
  `sanksi` char(20) COLLATE utf8mb4_general_ci DEFAULT NULL,
  `created_at` datetime DEFAULT CURRENT_TIMESTAMP,
  `updated_at` datetime DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

-- --------------------------------------------------------

--
-- Struktur dari tabel `keberangkatan`
--

CREATE TABLE `keberangkatan` (
  `id_keberangkatan` int NOT NULL,
  `id_user` int DEFAULT NULL,
  `status_strp` varchar(50) COLLATE utf8mb4_general_ci NOT NULL,
  `status_formulir` varchar(50) COLLATE utf8mb4_general_ci NOT NULL,
  `created_at` datetime DEFAULT CURRENT_TIMESTAMP,
  `updated_at` datetime DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

-- --------------------------------------------------------

--
-- Struktur dari tabel `kedatangan`
--

CREATE TABLE `kedatangan` (
  `id_keberangkatan` int NOT NULL,
  `id_user` int DEFAULT NULL,
  `status_strp` varchar(50) COLLATE utf8mb4_general_ci NOT NULL,
  `status_formulir` varchar(50) COLLATE utf8mb4_general_ci NOT NULL,
  `created_at` datetime DEFAULT CURRENT_TIMESTAMP,
  `updated_at` datetime DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

-- --------------------------------------------------------

--
-- Struktur dari tabel `kepemilikan_kendaraan`
--

CREATE TABLE `kepemilikan_kendaraan` (
  `id_kepemilikan_kendaraan` int NOT NULL,
  `kepemilikan_kendaraan` varchar(75) COLLATE utf8mb4_general_ci DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data untuk tabel `kepemilikan_kendaraan`
--

INSERT INTO `kepemilikan_kendaraan` (`id_kepemilikan_kendaraan`, `kepemilikan_kendaraan`) VALUES
(1, 'Pribadi'),
(2, 'Dinas'),
(3, 'Perusahaan'),
(4, 'Angkutan Umum');

-- --------------------------------------------------------

--
-- Struktur dari tabel `strp`
--

CREATE TABLE `strp` (
  `id_strp` int NOT NULL,
  `id_user` int DEFAULT NULL,
  `no_registrasi` int DEFAULT NULL,
  `no_polisi` char(15) COLLATE utf8mb4_general_ci NOT NULL,
  `nama_pemilik` varchar(225) COLLATE utf8mb4_general_ci DEFAULT NULL,
  `alamat_pemilik` varchar(225) COLLATE utf8mb4_general_ci DEFAULT NULL,
  `nama_pengemudi` varchar(225) COLLATE utf8mb4_general_ci DEFAULT NULL,
  `no_sim` varchar(100) COLLATE utf8mb4_general_ci DEFAULT NULL,
  `no_pasport` varchar(50) COLLATE utf8mb4_general_ci DEFAULT NULL,
  `id_warga_negara` int DEFAULT NULL,
  `jenis_kendaraan` varchar(100) COLLATE utf8mb4_general_ci DEFAULT NULL,
  `id_kepemilikan_kendaraan` int NOT NULL,
  `tahun_pembuatan` int DEFAULT NULL,
  `cc` int DEFAULT NULL,
  `no_rangka` varchar(50) COLLATE utf8mb4_general_ci DEFAULT NULL,
  `no_mesin` varchar(25) COLLATE utf8mb4_general_ci DEFAULT NULL,
  `warna` varchar(25) COLLATE utf8mb4_general_ci DEFAULT NULL,
  `id_bahan_bakar` int DEFAULT NULL,
  `maksud_kunjungan` text COLLATE utf8mb4_general_ci,
  `alamat_tujuan` text COLLATE utf8mb4_general_ci,
  `berlaku_hingga` date DEFAULT NULL,
  `files` varchar(50) COLLATE utf8mb4_general_ci NOT NULL,
  `created_at` datetime DEFAULT CURRENT_TIMESTAMP,
  `updated_at` datetime DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data untuk tabel `strp`
--

INSERT INTO `strp` (`id_strp`, `id_user`, `no_registrasi`, `no_polisi`, `nama_pemilik`, `alamat_pemilik`, `nama_pengemudi`, `no_sim`, `no_pasport`, `id_warga_negara`, `jenis_kendaraan`, `id_kepemilikan_kendaraan`, `tahun_pembuatan`, `cc`, `no_rangka`, `no_mesin`, `warna`, `id_bahan_bakar`, `maksud_kunjungan`, `alamat_tujuan`, `berlaku_hingga`, `files`, `created_at`, `updated_at`) VALUES
(2, 3, NULL, 'DH 1111 AR', 'Arlan', 'BJW', 'Arlan', 'tes', 'tes', 1, '', 1, 2000, 1000, 'tes', 'tes', 'tes', 3, 'tes', 'tes', NULL, '3952495080.pdf', '2024-07-24 10:05:29', '2024-07-24 10:05:29');

-- --------------------------------------------------------

--
-- Struktur dari tabel `users`
--

CREATE TABLE `users` (
  `id_user` int NOT NULL,
  `id_role` int DEFAULT NULL,
  `id_active` int DEFAULT '2',
  `en_user` varchar(100) COLLATE utf8mb4_general_ci DEFAULT NULL,
  `img_user` varchar(225) COLLATE utf8mb4_general_ci DEFAULT 'default.jpg',
  `username` varchar(50) COLLATE utf8mb4_general_ci DEFAULT NULL,
  `email` varchar(75) COLLATE utf8mb4_general_ci DEFAULT NULL,
  `emailOld` varchar(75) COLLATE utf8mb4_general_ci DEFAULT NULL,
  `password` varchar(75) COLLATE utf8mb4_general_ci DEFAULT NULL,
  `phone` varchar(20) COLLATE utf8mb4_general_ci DEFAULT NULL,
  `address` text COLLATE utf8mb4_general_ci,
  `country` varchar(10) COLLATE utf8mb4_general_ci DEFAULT NULL,
  `ip_user` varchar(20) COLLATE utf8mb4_general_ci DEFAULT NULL,
  `regulation` varchar(20) COLLATE utf8mb4_general_ci DEFAULT NULL,
  `created_at` datetime DEFAULT CURRENT_TIMESTAMP,
  `updated_at` datetime DEFAULT CURRENT_TIMESTAMP
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data untuk tabel `users`
--

INSERT INTO `users` (`id_user`, `id_role`, `id_active`, `en_user`, `img_user`, `username`, `email`, `emailOld`, `password`, `phone`, `address`, `country`, `ip_user`, `regulation`, `created_at`, `updated_at`) VALUES
(1, 1, 1, NULL, 'default.jpg', 'admin', 'admin@gmail.com', NULL, '$2y$10$//KMATh3ibPoI3nHFp7x/u7vnAbo2WyUgmI4x0CVVrH8ajFhMvbjG', NULL, NULL, NULL, '180.249.167.53', NULL, '2024-07-23 16:46:38', '2024-07-23 16:46:38'),
(2, 2, 1, '2478045448', 'https://lh3.googleusercontent.com/a/ACg8ocJ2sYh_gzij2f4A9Teax_dOyC-VDyKCEDJNhsov-18d6N5LRFE=s96-c', 'Netmedia Framecode', 'netmediaframecode@gmail.com', NULL, NULL, NULL, NULL, NULL, '180.249.167.53', NULL, '2024-07-23 19:42:51', '2024-07-23 19:42:51'),
(3, 4, 1, '985684766', 'https://lh3.googleusercontent.com/a/ACg8ocI9iHFeRGUcOHLS58mwk3U4h8F5_VyByHhreUXuh5uoVz5iOsc=s96-c', 'Sahala Zakaria Recardo Butar Butar', 'sahalazrbutarbutar270899@gmail.com', NULL, NULL, NULL, NULL, NULL, '180.249.167.53', NULL, '2024-07-23 19:43:10', '2024-07-23 19:43:10');

--
-- Trigger `users`
--
DELIMITER $$
CREATE TRIGGER `insert_users` BEFORE INSERT ON `users` FOR EACH ROW BEGIN
    SET NEW.id_role = (
        SELECT id_role
        FROM `users_role`
        ORDER BY id_role DESC
        LIMIT 1
    );
END
$$
DELIMITER ;

-- --------------------------------------------------------

--
-- Struktur dari tabel `users_access_menu`
--

CREATE TABLE `users_access_menu` (
  `id_access_menu` int NOT NULL,
  `id_role` int DEFAULT NULL,
  `id_menu` int DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data untuk tabel `users_access_menu`
--

INSERT INTO `users_access_menu` (`id_access_menu`, `id_role`, `id_menu`) VALUES
(1, 1, 1),
(2, 1, 2),
(3, 1, 3),
(4, 2, 3),
(5, 4, 3);

-- --------------------------------------------------------

--
-- Struktur dari tabel `users_access_sub_menu`
--

CREATE TABLE `users_access_sub_menu` (
  `id_access_sub_menu` int NOT NULL,
  `id_role` int DEFAULT NULL,
  `id_sub_menu` int DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data untuk tabel `users_access_sub_menu`
--

INSERT INTO `users_access_sub_menu` (`id_access_sub_menu`, `id_role`, `id_sub_menu`) VALUES
(1, 1, 1),
(2, 1, 2),
(3, 1, 3),
(4, 1, 4),
(5, 1, 5),
(6, 1, 6),
(7, 1, 7),
(8, 1, 9),
(9, 2, 8),
(10, 1, 10),
(11, 1, 11),
(12, 2, 10),
(13, 2, 11),
(14, 4, 8),
(15, 4, 9);

-- --------------------------------------------------------

--
-- Struktur dari tabel `users_log`
--

CREATE TABLE `users_log` (
  `id_log` int NOT NULL,
  `id_user` int DEFAULT NULL,
  `status` varchar(10) COLLATE utf8mb4_general_ci DEFAULT NULL,
  `description` text COLLATE utf8mb4_general_ci,
  `date_log` datetime DEFAULT CURRENT_TIMESTAMP
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data untuk tabel `users_log`
--

INSERT INTO `users_log` (`id_log`, `id_user`, `status`, `description`, `date_log`) VALUES
(1, 2, '200 OK', 'Mengubah role dari Administrator menjadi role Bea Cukai.', '2024-07-24 08:41:36'),
(2, 2, '200 OK', 'Mengubah role dari Pengemudi menjadi role Lantas.', '2024-07-24 08:41:53'),
(3, 2, '200 OK', 'Menambahkan role Pengemudi baru.', '2024-07-24 08:42:03'),
(4, 2, '200 OK', 'Menambahkan menu Pendataan baru.', '2024-07-24 08:44:07'),
(5, 2, '200 OK', 'Menambahkan sub menu STRP baru.', '2024-07-24 08:45:33'),
(6, 2, '200 OK', 'Menambahkan sub menu Formulir Wawancara baru.', '2024-07-24 08:45:45'),
(7, 2, '200 OK', 'Menambahkan sub menu Keberangkatan baru.', '2024-07-24 08:46:02'),
(8, 2, '200 OK', 'Menambahkan sub menu Kedatangan baru.', '2024-07-24 08:46:11'),
(9, 2, '200 OK', 'Menambahkan akses menu baru.', '2024-07-24 08:46:26'),
(10, 2, '200 OK', 'Menambahkan akses menu baru.', '2024-07-24 08:46:32'),
(11, 2, '200 OK', 'Menambahkan akses menu baru.', '2024-07-24 08:46:38'),
(12, 2, '200 OK', 'Menambahkan akses sub menu baru.', '2024-07-24 08:48:50'),
(13, 2, '200 OK', 'Menambahkan akses sub menu baru.', '2024-07-24 08:48:56'),
(14, 2, '200 OK', 'Menambahkan akses sub menu baru.', '2024-07-24 08:49:11'),
(15, 2, '200 OK', 'Menambahkan akses sub menu baru.', '2024-07-24 08:49:19'),
(16, 2, '200 OK', 'Menambahkan akses sub menu baru.', '2024-07-24 08:49:25'),
(17, 2, '200 OK', 'Menambahkan akses sub menu baru.', '2024-07-24 08:49:31'),
(18, 2, '200 OK', 'Menambahkan akses sub menu baru.', '2024-07-24 08:49:37'),
(19, 2, '200 OK', 'Menambahkan akses sub menu baru.', '2024-07-24 08:49:44'),
(20, 3, '200 OK', 'Menambahkan STRP baru.', '2024-07-24 10:00:41'),
(21, 3, '200 OK', 'Menambahkan STRP baru.', '2024-07-24 10:05:29');

-- --------------------------------------------------------

--
-- Struktur dari tabel `users_login_logs`
--

CREATE TABLE `users_login_logs` (
  `id_login_logs` int NOT NULL,
  `id_user` int DEFAULT NULL,
  `status` varchar(10) COLLATE utf8mb4_general_ci DEFAULT NULL,
  `problem` text COLLATE utf8mb4_general_ci,
  `device` varchar(200) COLLATE utf8mb4_general_ci DEFAULT NULL,
  `ip_address` varchar(45) COLLATE utf8mb4_general_ci DEFAULT NULL,
  `date_login_logs` datetime DEFAULT CURRENT_TIMESTAMP
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

-- --------------------------------------------------------

--
-- Struktur dari tabel `users_menu`
--

CREATE TABLE `users_menu` (
  `id_menu` int NOT NULL,
  `menu` varchar(50) COLLATE utf8mb4_general_ci DEFAULT NULL,
  `icon` varchar(50) COLLATE utf8mb4_general_ci DEFAULT NULL,
  `folder` varchar(50) COLLATE utf8mb4_general_ci DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data untuk tabel `users_menu`
--

INSERT INTO `users_menu` (`id_menu`, `menu`, `icon`, `folder`) VALUES
(1, 'User Management', 'bi bi-person-fill-gear', 'user-management'),
(2, 'Menu Management', 'bi bi-menu-app-fill', 'menu-management'),
(3, 'Pendataan', 'bi bi-truck', 'pendataan');

-- --------------------------------------------------------

--
-- Struktur dari tabel `users_otentikasi`
--

CREATE TABLE `users_otentikasi` (
  `id_otentikasi` int NOT NULL,
  `id_user` int DEFAULT NULL,
  `encryption` text COLLATE utf8mb4_general_ci
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

-- --------------------------------------------------------

--
-- Struktur dari tabel `users_role`
--

CREATE TABLE `users_role` (
  `id_role` int NOT NULL,
  `role` varchar(35) COLLATE utf8mb4_general_ci DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data untuk tabel `users_role`
--

INSERT INTO `users_role` (`id_role`, `role`) VALUES
(1, 'Bea Cukai'),
(2, 'Lantas'),
(4, 'Pengemudi');

-- --------------------------------------------------------

--
-- Struktur dari tabel `users_status`
--

CREATE TABLE `users_status` (
  `id_status` int NOT NULL,
  `status` varchar(35) COLLATE utf8mb4_general_ci DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data untuk tabel `users_status`
--

INSERT INTO `users_status` (`id_status`, `status`) VALUES
(1, 'Active'),
(2, 'No Active');

-- --------------------------------------------------------

--
-- Struktur dari tabel `users_sub_menu`
--

CREATE TABLE `users_sub_menu` (
  `id_sub_menu` int NOT NULL,
  `id_menu` int DEFAULT NULL,
  `id_active` int DEFAULT '2',
  `title` varchar(50) COLLATE utf8mb4_general_ci DEFAULT NULL,
  `file` varchar(50) COLLATE utf8mb4_general_ci DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data untuk tabel `users_sub_menu`
--

INSERT INTO `users_sub_menu` (`id_sub_menu`, `id_menu`, `id_active`, `title`, `file`) VALUES
(1, 1, 1, 'Users', 'users'),
(2, 1, 1, 'Role', 'role'),
(3, 1, 1, 'Activity Log', 'activity-log'),
(4, 2, 1, 'Menu', 'menu'),
(5, 2, 1, 'Sub Menu', 'sub-menu'),
(6, 2, 1, 'Menu Access', 'menu-access'),
(7, 2, 1, 'Sub Menu Access', 'sub-menu-access'),
(8, 3, 1, 'STRP', 'strp'),
(9, 3, 1, 'Formulir Wawancara', 'formulir-wawancara'),
(10, 3, 1, 'Keberangkatan', 'keberangkatan'),
(11, 3, 1, 'Kedatangan', 'kedatangan');

-- --------------------------------------------------------

--
-- Struktur dari tabel `warga_negara`
--

CREATE TABLE `warga_negara` (
  `id_warga_negara` int NOT NULL,
  `warga_negara` varchar(50) COLLATE utf8mb4_general_ci DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data untuk tabel `warga_negara`
--

INSERT INTO `warga_negara` (`id_warga_negara`, `warga_negara`) VALUES
(1, 'INDONESIA (ID)'),
(2, 'TIMOR LESTE (TL)');

--
-- Indexes for dumped tables
--

--
-- Indeks untuk tabel `alamat_kendaraan`
--
ALTER TABLE `alamat_kendaraan`
  ADD PRIMARY KEY (`id_alamat_kendaraan`);

--
-- Indeks untuk tabel `alamat_pengemudi`
--
ALTER TABLE `alamat_pengemudi`
  ADD PRIMARY KEY (`id_alamat_pengemudi`);

--
-- Indeks untuk tabel `alamat_tujuan`
--
ALTER TABLE `alamat_tujuan`
  ADD PRIMARY KEY (`id_alamat_tujuan`);

--
-- Indeks untuk tabel `bahan_bakar`
--
ALTER TABLE `bahan_bakar`
  ADD PRIMARY KEY (`id_bahan_bakar`);

--
-- Indeks untuk tabel `formulir_wawancara`
--
ALTER TABLE `formulir_wawancara`
  ADD PRIMARY KEY (`id_fw`),
  ADD KEY `id_alamat_pengemudi` (`id_alamat_pengemudi`),
  ADD KEY `id_alamat_kendaraan` (`id_alamat_kendaraan`),
  ADD KEY `id_kepemilikan_kendaraan` (`id_kepemilikan_kendaraan`),
  ADD KEY `id_alamat_tujuan` (`id_alamat_tujuan`);

--
-- Indeks untuk tabel `keberangkatan`
--
ALTER TABLE `keberangkatan`
  ADD PRIMARY KEY (`id_keberangkatan`),
  ADD KEY `id_user` (`id_user`);

--
-- Indeks untuk tabel `kedatangan`
--
ALTER TABLE `kedatangan`
  ADD PRIMARY KEY (`id_keberangkatan`),
  ADD KEY `id_user` (`id_user`);

--
-- Indeks untuk tabel `kepemilikan_kendaraan`
--
ALTER TABLE `kepemilikan_kendaraan`
  ADD PRIMARY KEY (`id_kepemilikan_kendaraan`);

--
-- Indeks untuk tabel `strp`
--
ALTER TABLE `strp`
  ADD PRIMARY KEY (`id_strp`),
  ADD KEY `id_user` (`id_user`),
  ADD KEY `id_warga_negara` (`id_warga_negara`),
  ADD KEY `id_bahan_bakar` (`id_bahan_bakar`),
  ADD KEY `id_kepemilikan_kendaraan` (`id_kepemilikan_kendaraan`);

--
-- Indeks untuk tabel `users`
--
ALTER TABLE `users`
  ADD PRIMARY KEY (`id_user`),
  ADD KEY `id_role` (`id_role`),
  ADD KEY `id_active` (`id_active`);

--
-- Indeks untuk tabel `users_access_menu`
--
ALTER TABLE `users_access_menu`
  ADD PRIMARY KEY (`id_access_menu`),
  ADD KEY `id_role` (`id_role`),
  ADD KEY `id_menu` (`id_menu`);

--
-- Indeks untuk tabel `users_access_sub_menu`
--
ALTER TABLE `users_access_sub_menu`
  ADD PRIMARY KEY (`id_access_sub_menu`),
  ADD KEY `id_role` (`id_role`),
  ADD KEY `id_sub_menu` (`id_sub_menu`);

--
-- Indeks untuk tabel `users_log`
--
ALTER TABLE `users_log`
  ADD PRIMARY KEY (`id_log`),
  ADD KEY `id_user` (`id_user`);

--
-- Indeks untuk tabel `users_login_logs`
--
ALTER TABLE `users_login_logs`
  ADD PRIMARY KEY (`id_login_logs`),
  ADD KEY `id_user` (`id_user`);

--
-- Indeks untuk tabel `users_menu`
--
ALTER TABLE `users_menu`
  ADD PRIMARY KEY (`id_menu`);

--
-- Indeks untuk tabel `users_otentikasi`
--
ALTER TABLE `users_otentikasi`
  ADD PRIMARY KEY (`id_otentikasi`),
  ADD KEY `id_user` (`id_user`);

--
-- Indeks untuk tabel `users_role`
--
ALTER TABLE `users_role`
  ADD PRIMARY KEY (`id_role`);

--
-- Indeks untuk tabel `users_status`
--
ALTER TABLE `users_status`
  ADD PRIMARY KEY (`id_status`);

--
-- Indeks untuk tabel `users_sub_menu`
--
ALTER TABLE `users_sub_menu`
  ADD PRIMARY KEY (`id_sub_menu`),
  ADD KEY `id_menu` (`id_menu`),
  ADD KEY `id_active` (`id_active`);

--
-- Indeks untuk tabel `warga_negara`
--
ALTER TABLE `warga_negara`
  ADD PRIMARY KEY (`id_warga_negara`);

--
-- AUTO_INCREMENT untuk tabel yang dibuang
--

--
-- AUTO_INCREMENT untuk tabel `alamat_kendaraan`
--
ALTER TABLE `alamat_kendaraan`
  MODIFY `id_alamat_kendaraan` int NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT untuk tabel `alamat_pengemudi`
--
ALTER TABLE `alamat_pengemudi`
  MODIFY `id_alamat_pengemudi` int NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT untuk tabel `alamat_tujuan`
--
ALTER TABLE `alamat_tujuan`
  MODIFY `id_alamat_tujuan` int NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT untuk tabel `bahan_bakar`
--
ALTER TABLE `bahan_bakar`
  MODIFY `id_bahan_bakar` int NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=12;

--
-- AUTO_INCREMENT untuk tabel `formulir_wawancara`
--
ALTER TABLE `formulir_wawancara`
  MODIFY `id_fw` int NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT untuk tabel `keberangkatan`
--
ALTER TABLE `keberangkatan`
  MODIFY `id_keberangkatan` int NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT untuk tabel `kedatangan`
--
ALTER TABLE `kedatangan`
  MODIFY `id_keberangkatan` int NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT untuk tabel `kepemilikan_kendaraan`
--
ALTER TABLE `kepemilikan_kendaraan`
  MODIFY `id_kepemilikan_kendaraan` int NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- AUTO_INCREMENT untuk tabel `strp`
--
ALTER TABLE `strp`
  MODIFY `id_strp` int NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT untuk tabel `users`
--
ALTER TABLE `users`
  MODIFY `id_user` int NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT untuk tabel `users_access_menu`
--
ALTER TABLE `users_access_menu`
  MODIFY `id_access_menu` int NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;

--
-- AUTO_INCREMENT untuk tabel `users_access_sub_menu`
--
ALTER TABLE `users_access_sub_menu`
  MODIFY `id_access_sub_menu` int NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=16;

--
-- AUTO_INCREMENT untuk tabel `users_log`
--
ALTER TABLE `users_log`
  MODIFY `id_log` int NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=22;

--
-- AUTO_INCREMENT untuk tabel `users_login_logs`
--
ALTER TABLE `users_login_logs`
  MODIFY `id_login_logs` int NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;

--
-- AUTO_INCREMENT untuk tabel `users_menu`
--
ALTER TABLE `users_menu`
  MODIFY `id_menu` int NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT untuk tabel `users_otentikasi`
--
ALTER TABLE `users_otentikasi`
  MODIFY `id_otentikasi` int NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT untuk tabel `users_role`
--
ALTER TABLE `users_role`
  MODIFY `id_role` int NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- AUTO_INCREMENT untuk tabel `users_status`
--
ALTER TABLE `users_status`
  MODIFY `id_status` int NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT untuk tabel `users_sub_menu`
--
ALTER TABLE `users_sub_menu`
  MODIFY `id_sub_menu` int NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=12;

--
-- AUTO_INCREMENT untuk tabel `warga_negara`
--
ALTER TABLE `warga_negara`
  MODIFY `id_warga_negara` int NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- Ketidakleluasaan untuk tabel pelimpahan (Dumped Tables)
--

--
-- Ketidakleluasaan untuk tabel `formulir_wawancara`
--
ALTER TABLE `formulir_wawancara`
  ADD CONSTRAINT `formulir_wawancara_ibfk_1` FOREIGN KEY (`id_alamat_pengemudi`) REFERENCES `alamat_pengemudi` (`id_alamat_pengemudi`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `formulir_wawancara_ibfk_2` FOREIGN KEY (`id_alamat_kendaraan`) REFERENCES `alamat_kendaraan` (`id_alamat_kendaraan`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `formulir_wawancara_ibfk_3` FOREIGN KEY (`id_kepemilikan_kendaraan`) REFERENCES `kepemilikan_kendaraan` (`id_kepemilikan_kendaraan`),
  ADD CONSTRAINT `formulir_wawancara_ibfk_4` FOREIGN KEY (`id_alamat_tujuan`) REFERENCES `alamat_tujuan` (`id_alamat_tujuan`);

--
-- Ketidakleluasaan untuk tabel `keberangkatan`
--
ALTER TABLE `keberangkatan`
  ADD CONSTRAINT `keberangkatan_ibfk_1` FOREIGN KEY (`id_user`) REFERENCES `users` (`id_user`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Ketidakleluasaan untuk tabel `kedatangan`
--
ALTER TABLE `kedatangan`
  ADD CONSTRAINT `kedatangan_ibfk_1` FOREIGN KEY (`id_user`) REFERENCES `users` (`id_user`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Ketidakleluasaan untuk tabel `strp`
--
ALTER TABLE `strp`
  ADD CONSTRAINT `strp_ibfk_1` FOREIGN KEY (`id_user`) REFERENCES `users` (`id_user`),
  ADD CONSTRAINT `strp_ibfk_2` FOREIGN KEY (`id_warga_negara`) REFERENCES `warga_negara` (`id_warga_negara`),
  ADD CONSTRAINT `strp_ibfk_3` FOREIGN KEY (`id_bahan_bakar`) REFERENCES `bahan_bakar` (`id_bahan_bakar`),
  ADD CONSTRAINT `strp_ibfk_4` FOREIGN KEY (`id_kepemilikan_kendaraan`) REFERENCES `kepemilikan_kendaraan` (`id_kepemilikan_kendaraan`) ON DELETE RESTRICT ON UPDATE RESTRICT;

--
-- Ketidakleluasaan untuk tabel `users`
--
ALTER TABLE `users`
  ADD CONSTRAINT `users_ibfk_1` FOREIGN KEY (`id_role`) REFERENCES `users_role` (`id_role`),
  ADD CONSTRAINT `users_ibfk_2` FOREIGN KEY (`id_active`) REFERENCES `users_status` (`id_status`);

--
-- Ketidakleluasaan untuk tabel `users_access_menu`
--
ALTER TABLE `users_access_menu`
  ADD CONSTRAINT `users_access_menu_ibfk_1` FOREIGN KEY (`id_role`) REFERENCES `users_role` (`id_role`),
  ADD CONSTRAINT `users_access_menu_ibfk_2` FOREIGN KEY (`id_menu`) REFERENCES `users_menu` (`id_menu`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Ketidakleluasaan untuk tabel `users_access_sub_menu`
--
ALTER TABLE `users_access_sub_menu`
  ADD CONSTRAINT `users_access_sub_menu_ibfk_1` FOREIGN KEY (`id_role`) REFERENCES `users_role` (`id_role`),
  ADD CONSTRAINT `users_access_sub_menu_ibfk_2` FOREIGN KEY (`id_sub_menu`) REFERENCES `users_sub_menu` (`id_sub_menu`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Ketidakleluasaan untuk tabel `users_log`
--
ALTER TABLE `users_log`
  ADD CONSTRAINT `users_log_ibfk_1` FOREIGN KEY (`id_user`) REFERENCES `users` (`id_user`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Ketidakleluasaan untuk tabel `users_login_logs`
--
ALTER TABLE `users_login_logs`
  ADD CONSTRAINT `users_login_logs_ibfk_1` FOREIGN KEY (`id_user`) REFERENCES `users` (`id_user`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Ketidakleluasaan untuk tabel `users_otentikasi`
--
ALTER TABLE `users_otentikasi`
  ADD CONSTRAINT `users_otentikasi_ibfk_1` FOREIGN KEY (`id_user`) REFERENCES `users` (`id_user`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Ketidakleluasaan untuk tabel `users_sub_menu`
--
ALTER TABLE `users_sub_menu`
  ADD CONSTRAINT `users_sub_menu_ibfk_1` FOREIGN KEY (`id_menu`) REFERENCES `users_menu` (`id_menu`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `users_sub_menu_ibfk_2` FOREIGN KEY (`id_active`) REFERENCES `users_status` (`id_status`);
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
