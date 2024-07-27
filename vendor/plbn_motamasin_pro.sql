-- phpMyAdmin SQL Dump
-- version 5.2.1
-- https://www.phpmyadmin.net/
--
-- Host: localhost:3306
-- Waktu pembuatan: 27 Jul 2024 pada 20.04
-- Versi server: 10.6.18-MariaDB-cll-lve
-- Versi PHP: 8.3.8

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `zjxtorpv_686315`
--

-- --------------------------------------------------------

--
-- Struktur dari tabel `alamat_kendaraan`
--

CREATE TABLE `alamat_kendaraan` (
  `id_alamat_kendaraan` int(11) NOT NULL,
  `id_fw` int(11) NOT NULL,
  `jalan_kendaraan` varchar(75) DEFAULT NULL,
  `kelurahan_kendaraan` varchar(75) DEFAULT NULL,
  `kecamatan_kendaraan` varchar(75) DEFAULT NULL,
  `kabupaten_kota_kendaraan` varchar(75) DEFAULT NULL,
  `provinsi_kendaraan` varchar(75) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data untuk tabel `alamat_kendaraan`
--

INSERT INTO `alamat_kendaraan` (`id_alamat_kendaraan`, `id_fw`, `jalan_kendaraan`, `kelurahan_kendaraan`, `kecamatan_kendaraan`, `kabupaten_kota_kendaraan`, `provinsi_kendaraan`) VALUES
(3, 1, '', '', '', '', ''),
(4, 2, 'WEMASA', 'LITAMALI', 'KOBALIMA', 'MALAKA', 'NTT'),
(5, 3, '', '', '', '', ''),
(6, 4, 'JL.Timur Raya 078', 'Lakekun', 'Kobalima', 'Malaka', 'NTT'),
(7, 5, '', '', '', '', ''),
(8, 6, '', '', '', '', ''),
(9, 7, '', '', '', '', '');

-- --------------------------------------------------------

--
-- Struktur dari tabel `alamat_pengemudi`
--

CREATE TABLE `alamat_pengemudi` (
  `id_alamat_pengemudi` int(11) NOT NULL,
  `id_fw` int(11) NOT NULL,
  `jalan_pengemudi` varchar(75) DEFAULT NULL,
  `kelurahan_pengemudi` varchar(75) DEFAULT NULL,
  `kecamatan_pengemudi` varchar(75) DEFAULT NULL,
  `kabupaten_kota_pengemudi` varchar(75) DEFAULT NULL,
  `provinsi_pengemudi` varchar(75) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data untuk tabel `alamat_pengemudi`
--

INSERT INTO `alamat_pengemudi` (`id_alamat_pengemudi`, `id_fw`, `jalan_pengemudi`, `kelurahan_pengemudi`, `kecamatan_pengemudi`, `kabupaten_kota_pengemudi`, `provinsi_pengemudi`) VALUES
(5, 1, 'WELASAKAR II RT/RW 008/015', 'LITAMALI', 'KOBALIMA', 'MALAKA', 'NTT'),
(6, 2, 'WEMASA', 'LITAMALI', 'KOBALIMA', 'MALAK', 'NTT'),
(7, 3, 'WELASAKAR II RT/RW 012/014', 'LITAMALI', 'KOBALIMA', 'MALAKA', 'NTT'),
(8, 4, 'WEMIAR RT/RW 009/010', 'BEON', 'WEHALI', 'MALAK', 'NTT'),
(9, 5, 'UMAKATAHAN RT/RW 001/001', 'UMAKATAHAN', 'MALAKA TENGAH', 'MALAKA', 'NTT'),
(10, 6, 'UMAKATAHAN RT/RW 001/001', 'UMAKATAHAN', 'MALAKA TENGAH', 'MALAKA', 'NTT'),
(11, 7, 'UMAKATAHAN RT/RW 001/001', 'UMAKATAHAN', 'MALAKA TENGAH', 'MALAKA', 'NTT');

-- --------------------------------------------------------

--
-- Struktur dari tabel `alamat_tujuan`
--

CREATE TABLE `alamat_tujuan` (
  `id_alamat_tujuan` int(11) NOT NULL,
  `id_fw` int(11) NOT NULL,
  `jalan_tujuan` varchar(75) DEFAULT NULL,
  `distric` varchar(75) DEFAULT NULL,
  `sub_distric` varchar(75) DEFAULT NULL,
  `suco` varchar(75) DEFAULT NULL,
  `aldeia` varchar(75) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data untuk tabel `alamat_tujuan`
--

INSERT INTO `alamat_tujuan` (`id_alamat_tujuan`, `id_fw`, `jalan_tujuan`, `distric`, `sub_distric`, `suco`, `aldeia`) VALUES
(3, 1, 'SUAI LORO', 'DES', 'PAS', 'TIO', 'DELE'),
(4, 2, 'WE', 'DELA', 'COE', 'CUMORO', 'DILI'),
(5, 3, 'SUAI', 'BECO', 'KOVALIMA', 'SUAI', 'DILI'),
(6, 4, 'NULAN', 'BECO', 'KOVALIMA', 'SUAI', 'DILI'),
(7, 5, 'NULARAN', 'SAME', 'MANUFAI', 'BETANO', 'SESURAI'),
(8, 6, 'NULARAN', 'SAME', 'MANUFAI', 'BETANO', 'SESURAI'),
(9, 7, 'NULARAN', 'SAME', 'MANUFAI', 'BETANO', 'SESURAI');

-- --------------------------------------------------------

--
-- Struktur dari tabel `bahan_bakar`
--

CREATE TABLE `bahan_bakar` (
  `id_bahan_bakar` int(11) NOT NULL,
  `bahan_bakar` varchar(50) DEFAULT NULL
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
  `id_fw` int(11) NOT NULL,
  `id_user` int(11) NOT NULL,
  `kategori` varchar(15) NOT NULL,
  `id_strp` int(11) NOT NULL,
  `kesehatan` char(10) DEFAULT NULL,
  `pengemudi_kendaraan` char(10) DEFAULT NULL,
  `nama_pengemudi` varchar(100) DEFAULT NULL,
  `tempat_lahir` varchar(50) DEFAULT NULL,
  `tgl_lahir` date DEFAULT NULL,
  `no_pasport_pengemudi` varchar(50) DEFAULT NULL,
  `no_sim_pengemudi` varchar(75) DEFAULT NULL,
  `no_hp_pengemudi` varchar(75) DEFAULT NULL,
  `pemilik_kendaraan` char(10) DEFAULT NULL,
  `nama_pemilik_kendaraan` char(10) DEFAULT NULL,
  `identitas_pemilik_kendaraan` char(10) DEFAULT NULL,
  `surat_kuasa` varchar(50) DEFAULT NULL,
  `plat_nomor` char(15) DEFAULT NULL,
  `merek_kendaraan` char(15) DEFAULT NULL,
  `id_kepemilikan_kendaraan` int(11) DEFAULT NULL,
  `maksud_kunjungan` varchar(50) DEFAULT NULL,
  `waktu_kunjungan` date DEFAULT NULL,
  `pelanggaran_atas_barang` char(20) DEFAULT NULL,
  `pelanggaran_atas_penyalahgunaan` char(20) DEFAULT NULL,
  `pelanggaran_atas_modifikasi` char(20) DEFAULT NULL,
  `pelanggaran_atas_waktu` char(20) DEFAULT NULL,
  `sanksi` char(20) DEFAULT NULL,
  `created_at` datetime DEFAULT current_timestamp(),
  `updated_at` datetime DEFAULT current_timestamp() ON UPDATE current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data untuk tabel `formulir_wawancara`
--

INSERT INTO `formulir_wawancara` (`id_fw`, `id_user`, `kategori`, `id_strp`, `kesehatan`, `pengemudi_kendaraan`, `nama_pengemudi`, `tempat_lahir`, `tgl_lahir`, `no_pasport_pengemudi`, `no_sim_pengemudi`, `no_hp_pengemudi`, `pemilik_kendaraan`, `nama_pemilik_kendaraan`, `identitas_pemilik_kendaraan`, `surat_kuasa`, `plat_nomor`, `merek_kendaraan`, `id_kepemilikan_kendaraan`, `maksud_kunjungan`, `waktu_kunjungan`, `pelanggaran_atas_barang`, `pelanggaran_atas_penyalahgunaan`, `pelanggaran_atas_modifikasi`, `pelanggaran_atas_waktu`, `sanksi`, `created_at`, `updated_at`) VALUES
(1, 6, 'keberangkatan', 1, 'Ya', 'Ya', 'ERMELINDA SIQUEIRA', 'BECO I', '1999-08-24', 'C9088595', '16359903000001', '081237660314', 'Ya', '', '', 'Tidak', 'DH 2020 JC', 'BIRU', 1, 'KUNJUNGAN KELUARGA', '2024-08-29', 'Bersedia', 'Bersedia', 'Bersedia', 'Bersedia', 'Bersedia', '2024-07-25 11:08:14', '2024-07-25 11:08:14'),
(2, 6, 'keberangkatan', 2, 'Ya', 'Ya', 'MELIN', 'BECO', '1999-07-19', '12345', '1234', '12345', 'Ya', 'MELIN', '1234', 'Ya', 'DH 2222 ET', 'HONDA/PINK', 1, 'KUNJUNGAN KELUARGA', '2024-08-06', 'Bersedia', 'Bersedia', 'Bersedia', 'Bersedia', 'Bersedia', '2024-07-25 16:38:05', '2024-07-25 16:38:05'),
(3, 6, 'keberangkatan', 3, 'Ya', 'Ya', 'EVA', 'NULARAN', '1996-08-12', '1234', '1234', '1234', 'Ya', '', '', 'Ya', 'DH 7777 ET', 'YAMAHA/HITAM', 1, 'KUNJUNGAN KELUARGA', '2024-08-02', 'Bersedia', 'Bersedia', 'Bersedia', 'Bersedia', 'Bersedia', '2024-07-25 18:37:42', '2024-07-25 18:37:42'),
(4, 6, 'keberangkatan', 4, 'Ya', 'Ya', 'mario seran', 'betun', '1990-07-17', '1234', '1234', '081235678765', 'Ya', 'besin tae', 'EB 12343', 'Ya', 'DH 1212 JK', 'TOYOTA HILUX2.4', 3, 'MENGUNJUNGI TEMPAT KERJA', '2024-08-12', 'Bersedia', 'Bersedia', 'Bersedia', 'Bersedia', 'Bersedia', '2024-07-26 17:55:55', '2024-07-26 17:55:55'),
(5, 6, 'keberangkatan', 6, 'Ya', 'Ya', 'AZITA BARROS', 'AIDANTUIK', '1992-03-07', 'C9092863', '30489203000004', '081237660314', 'Ya', '', '', 'Ya', 'DH 5855 JD', 'HONDA/D1B02N26L', 1, 'KUNJUNGI KELUARGA', '2024-08-14', 'Bersedia', 'Bersedia', 'Bersedia', 'Bersedia', 'Bersedia', '2024-07-27 12:14:44', '2024-07-27 12:14:44'),
(6, 6, 'keberangkatan', 7, 'Ya', 'Ya', 'AZITA BARROS', 'AIDANTUIK', '1992-03-07', 'C9092863', '30489203000004', '082125189094', 'Ya', '', '', 'Ya', 'DH 5855 JD', 'HONDA/D1B02N26L', 1, 'KUNJUNGI KELUARGA', '2024-08-21', 'Bersedia', 'Bersedia', 'Bersedia', 'Bersedia', 'Bersedia', '2024-07-27 19:06:39', '2024-07-27 19:06:39'),
(7, 6, 'keberangkatan', 8, 'Ya', 'Ya', 'AZITA BARROS', 'AIDANTUIK', '1999-07-16', 'C9092863', '1234567', '0987654321', 'Ya', '', '', 'Ya', 'DH 9999 JC', 'HONDA/D1B02N26L', 1, 'KUNJUNGI KELUARGA', '2024-08-22', 'Bersedia', 'Bersedia', 'Bersedia', 'Bersedia', 'Bersedia', '2024-07-27 19:40:51', '2024-07-27 19:40:51');

-- --------------------------------------------------------

--
-- Struktur dari tabel `keberangkatan`
--

CREATE TABLE `keberangkatan` (
  `id_keberangkatan` int(11) NOT NULL,
  `id_user` int(11) DEFAULT NULL,
  `id_fw` int(11) NOT NULL,
  `status_strp` varchar(50) NOT NULL,
  `status_formulir` varchar(50) NOT NULL,
  `created_at` datetime DEFAULT current_timestamp(),
  `updated_at` datetime DEFAULT current_timestamp() ON UPDATE current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data untuk tabel `keberangkatan`
--

INSERT INTO `keberangkatan` (`id_keberangkatan`, `id_user`, `id_fw`, `status_strp`, `status_formulir`, `created_at`, `updated_at`) VALUES
(2, 6, 1, 'Valid', 'Valid', '2024-07-25 11:08:14', '2024-07-25 11:57:49'),
(3, 6, 2, 'Valid', 'Valid', '2024-07-25 16:38:05', '2024-07-25 16:52:57'),
(4, 6, 3, 'Valid', 'Belum Validasi', '2024-07-25 18:37:42', '2024-07-27 18:37:21'),
(5, 6, 4, 'Valid', 'Belum Validasi', '2024-07-26 17:55:55', '2024-07-26 18:02:43'),
(6, 6, 5, 'Valid', 'Valid', '2024-07-27 12:14:44', '2024-07-27 13:40:30'),
(7, 6, 6, 'Valid', 'Valid', '2024-07-27 19:06:39', '2024-07-27 19:17:07'),
(8, 6, 7, 'Valid', 'Valid', '2024-07-27 19:40:51', '2024-07-27 19:48:48');

-- --------------------------------------------------------

--
-- Struktur dari tabel `kedatangan`
--

CREATE TABLE `kedatangan` (
  `id_keberangkatan` int(11) NOT NULL,
  `id_user` int(11) DEFAULT NULL,
  `id_fw` int(11) NOT NULL,
  `status_strp` varchar(50) NOT NULL,
  `status_formulir` varchar(50) NOT NULL,
  `status_vhd` varchar(50) NOT NULL,
  `kesimpulan` text NOT NULL,
  `created_at` datetime DEFAULT current_timestamp(),
  `updated_at` datetime DEFAULT current_timestamp() ON UPDATE current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data untuk tabel `kedatangan`
--

INSERT INTO `kedatangan` (`id_keberangkatan`, `id_user`, `id_fw`, `status_strp`, `status_formulir`, `status_vhd`, `kesimpulan`, `created_at`, `updated_at`) VALUES
(1, 6, 5, 'Valid', 'Valid', 'Setuju', 'sesuai', '2024-07-27 13:44:56', '2024-07-27 13:44:56');

-- --------------------------------------------------------

--
-- Struktur dari tabel `kepemilikan_kendaraan`
--

CREATE TABLE `kepemilikan_kendaraan` (
  `id_kepemilikan_kendaraan` int(11) NOT NULL,
  `kepemilikan_kendaraan` varchar(75) DEFAULT NULL
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
  `id_strp` int(11) NOT NULL,
  `id_user` int(11) DEFAULT NULL,
  `kategori` varchar(15) NOT NULL,
  `no_registrasi` int(11) DEFAULT NULL,
  `no_polisi` char(15) NOT NULL,
  `nama_pemilik` varchar(225) DEFAULT NULL,
  `alamat_pemilik` varchar(225) DEFAULT NULL,
  `nama_pengemudi` varchar(225) DEFAULT NULL,
  `no_sim` varchar(100) DEFAULT NULL,
  `no_pasport` varchar(50) DEFAULT NULL,
  `id_warga_negara` int(11) DEFAULT NULL,
  `jenis_kendaraan` varchar(100) DEFAULT NULL,
  `id_kepemilikan_kendaraan` int(11) NOT NULL,
  `tahun_pembuatan` int(11) DEFAULT NULL,
  `cc` int(11) DEFAULT NULL,
  `no_rangka` varchar(50) DEFAULT NULL,
  `no_mesin` varchar(25) DEFAULT NULL,
  `warna` varchar(25) DEFAULT NULL,
  `id_bahan_bakar` int(11) DEFAULT NULL,
  `maksud_kunjungan` text DEFAULT NULL,
  `alamat_tujuan` text DEFAULT NULL,
  `berlaku_hingga` date DEFAULT NULL,
  `files` varchar(50) NOT NULL,
  `created_at` datetime DEFAULT current_timestamp(),
  `updated_at` datetime DEFAULT current_timestamp() ON UPDATE current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data untuk tabel `strp`
--

INSERT INTO `strp` (`id_strp`, `id_user`, `kategori`, `no_registrasi`, `no_polisi`, `nama_pemilik`, `alamat_pemilik`, `nama_pengemudi`, `no_sim`, `no_pasport`, `id_warga_negara`, `jenis_kendaraan`, `id_kepemilikan_kendaraan`, `tahun_pembuatan`, `cc`, `no_rangka`, `no_mesin`, `warna`, `id_bahan_bakar`, `maksud_kunjungan`, `alamat_tujuan`, `berlaku_hingga`, `files`, `created_at`, `updated_at`) VALUES
(1, 6, 'keberangkatan', 1, 'DH 2020 JC', 'ERMELINDA SIQUEIRA', 'WELASAKAR II RT/RW 008/015 KEL. LITAMALI, KEC. KOBALIMA', 'ERMELINDA SIQUEIRA', '1635-9903-000001 / B I UMUM/NTT', 'C9088595', 1, 'TOYOTA', 1, 2019, 2393, 'MROKB8CDXK1208885', '2GD0655032', 'MERAH', 1, 'KUNJUNGAN KELUARGA', 'SUAI LORO', '2024-08-07', '2928316742.pdf', '2024-07-25 10:51:17', '2024-07-25 11:50:42'),
(2, 6, 'keberangkatan', 2, 'DH 2222 ET', 'MELIN', 'WEMASA', 'MELIN', '12345', '12345', 1, 'HONDA', 1, 2019, 125, '12345', '1234', 'PINK', 4, 'KUNJUNGI KELUARGA', 'DILI', '2024-08-07', '1446636964.pdf', '2024-07-25 16:29:59', '2024-07-25 16:42:15'),
(3, 6, 'keberangkatan', 3, 'DH 7777 ET', 'EVA', 'BETUN', 'EVA', '1234', '1234', 1, 'YAMAHA', 1, 2020, 1234, '1234', '1234', 'HITAM', 4, 'KUNJUNGI KELUARGA', 'BECO', NULL, '1446636964.pdf', '2024-07-25 18:22:32', '2024-07-25 18:22:32'),
(4, 6, 'keberangkatan', 4, 'DH 1212 JK', 'P.T Karya Indah', 'webua', 'mario seran', '1234', 'e1234b', 1, 'TOYOTA HILUX2.4 DOUBLE CABIN 4X4 M/T', 3, 2017, 2393, '1234', '1234', 'SILVER', 4, 'MENGUNJUNGI TEMPAT KERJA', 'BAUCAO', '2024-08-12', '1446636964.pdf', '2024-07-26 17:15:12', '2024-07-26 18:06:52'),
(5, 6, 'keberangkatan', 5, 'DH 5855 JD', 'AZITA BARROS', 'UMAKATAHAN RT/RW.01/01, KEL.UMAKATAHAN,KEC.MALAKA TENGAH', 'AZITA BARROS', '3048-9203-000004', 'C9092863', 1, 'HONDA/D1B02N26L2 AT/SEPEDA MOTOR', 1, 2018, 108, 'MH1JFZ126JK37368', 'JFZ1E2378683', 'HITAM', 4, 'KUNJUNGI KELUARGA', 'SUAI BECO', '2024-07-17', '1446636964.pdf', '2024-07-27 08:34:26', '2024-07-27 13:00:01'),
(6, 6, 'keberangkatan', 6, 'DH 5855 JD', 'AZITA BARROS', 'UMAKATAHAN RT/RW.01/01, KEL.UMAKATAHAN,KEC.MALAKA TENGAH', 'AZITA BARROS', '30489203000004', 'C9092863', 1, 'HONDA/D1B02N26L2 AT/SEPEDA MOTOR', 1, 2018, 108, 'MH1JFZ126JK37368', 'JFZ1E2378683', 'HITAM', 4, 'KUNJUNGI KELUARGA', 'BETANU', '2024-08-13', '1446636964.pdf', '2024-07-27 11:57:46', '2024-07-27 12:19:54'),
(7, 6, 'keberangkatan', 7, 'DH 5855 JD', 'AZITA BARROS', 'UMAKATAHAN RT/RW.01/01, KEL.UMAKATAHAN,KEC.MALAKA TENGAH', 'AZITA BARROS', '30489203000004', 'C9092863', 1, 'RODA 2', 1, 2018, 108, 'MH1JFZ126JK37368', 'JFZ1E2378683', 'HITAM', 4, 'KUNJUNGI KELUARGA', 'BECO', '2024-08-27', '1446636964.pdf', '2024-07-27 19:02:54', '2024-07-27 19:09:02'),
(8, 6, 'keberangkatan', 8, 'DH 9999 JC', 'AZITA BARROS', 'UMAKATAHAN RT/RW.01/01, KEL.UMAKATAHAN,KEC.MALAKA TENGAH', 'AZITA BARROS', '1234567', 'C9092863', 1, 'RODA 2', 1, 2018, 890, 'MH1JFZ126JK37368', 'JFZ1E2378683', 'HITAM', 4, 'KUNJUNGI KELUARGA', 'SUAI BECO', '2024-08-20', '2928316742.pdf', '2024-07-27 19:37:03', '2024-07-27 19:42:17');

-- --------------------------------------------------------

--
-- Struktur dari tabel `users`
--

CREATE TABLE `users` (
  `id_user` int(11) NOT NULL,
  `id_role` int(11) DEFAULT NULL,
  `id_active` int(11) DEFAULT 2,
  `en_user` varchar(100) DEFAULT NULL,
  `img_user` varchar(225) DEFAULT 'default.jpg',
  `username` varchar(50) DEFAULT NULL,
  `email` varchar(75) DEFAULT NULL,
  `emailOld` varchar(75) DEFAULT NULL,
  `password` varchar(75) DEFAULT NULL,
  `phone` varchar(20) DEFAULT NULL,
  `address` text DEFAULT NULL,
  `country` varchar(10) DEFAULT NULL,
  `ip_user` varchar(20) DEFAULT NULL,
  `regulation` varchar(20) DEFAULT NULL,
  `created_at` datetime DEFAULT current_timestamp(),
  `updated_at` datetime DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data untuk tabel `users`
--

INSERT INTO `users` (`id_user`, `id_role`, `id_active`, `en_user`, `img_user`, `username`, `email`, `emailOld`, `password`, `phone`, `address`, `country`, `ip_user`, `regulation`, `created_at`, `updated_at`) VALUES
(1, 1, 1, NULL, 'default.jpg', 'admin', 'admin@gmail.com', NULL, '$2y$10$//KMATh3ibPoI3nHFp7x/u7vnAbo2WyUgmI4x0CVVrH8ajFhMvbjG', NULL, NULL, NULL, '180.249.167.53', NULL, '2024-07-23 16:46:38', '2024-07-23 16:46:38'),
(2, 2, 1, '2478045448', 'https://lh3.googleusercontent.com/a/ACg8ocJ2sYh_gzij2f4A9Teax_dOyC-VDyKCEDJNhsov-18d6N5LRFE=s96-c', 'Netmedia Framecode', 'netmediaframecode@gmail.com', NULL, NULL, NULL, NULL, NULL, '180.249.167.53', NULL, '2024-07-23 19:42:51', '2024-07-23 19:42:51'),
(6, 4, 1, '2094977855', 'default.jpg', 'Bebi', 'bebicarlo2024@gmail.com', NULL, '$2y$10$HHHRKGgXKDo8el1aGWsjL.yNdgEId8S7JDB6S.tfOqtPwAWdqZhb6', NULL, NULL, NULL, '125.164.196.232', NULL, '2024-07-25 09:47:42', '2024-07-25 09:47:42'),
(7, 2, 1, NULL, 'default.jpg', 'Lantas', 'lantas@gmail.com', NULL, '$2y$10$//KMATh3ibPoI3nHFp7x/u7vnAbo2WyUgmI4x0CVVrH8ajFhMvbjG', NULL, NULL, NULL, '125.164.196.232', NULL, '2024-07-25 11:35:35', '2024-07-25 11:35:35'),
(8, 4, 1, '985684766', 'https://lh3.googleusercontent.com/a/ACg8ocI9iHFeRGUcOHLS58mwk3U4h8F5_VyByHhreUXuh5uoVz5iOsc=s96-c', 'Sahala Zakaria Recardo Butar Butar', 'sahalazrbutarbutar270899@gmail.com', NULL, NULL, NULL, NULL, NULL, '180.249.214.249', NULL, '2024-07-25 13:35:19', '2024-07-25 13:35:19'),
(9, 4, 2, '4109667207', 'default.jpg', 'Dapet', 'Dapetloca@gmail.com', NULL, '$2y$10$eh2TI5QNRlVEg90bZrfQMOJyaQTxrMlmpAGEyJxk/MwHcDwXnmkUi', NULL, NULL, NULL, '125.164.199.223', NULL, '2024-07-25 16:19:07', '2024-07-25 16:19:07'),
(10, 4, 1, '2836483001', 'default.jpg', 'iren', 'irenpasu@gmail.com', NULL, '$2y$10$mZYAoaU.xku35874Vd53KufhILkVQRJ6EwpbcPb2f2CvKih59FdF.', NULL, NULL, NULL, '114.122.167.146', NULL, '2024-07-26 22:45:18', '2024-07-26 22:45:18');

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
  `id_access_menu` int(11) NOT NULL,
  `id_role` int(11) DEFAULT NULL,
  `id_menu` int(11) DEFAULT NULL
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
  `id_access_sub_menu` int(11) NOT NULL,
  `id_role` int(11) DEFAULT NULL,
  `id_sub_menu` int(11) DEFAULT NULL
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
(14, 4, 8),
(15, 4, 9);

-- --------------------------------------------------------

--
-- Struktur dari tabel `users_log`
--

CREATE TABLE `users_log` (
  `id_log` int(11) NOT NULL,
  `id_user` int(11) DEFAULT NULL,
  `status` varchar(10) DEFAULT NULL,
  `description` text DEFAULT NULL,
  `date_log` datetime DEFAULT current_timestamp()
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
(34, 6, '200 OK', 'Menambahkan STRP baru.', '2024-07-25 10:51:17'),
(35, 6, '200 OK', 'Menambahkan Formulir Wawancara baru.', '2024-07-25 11:08:14'),
(36, 7, '200 OK', 'Lantas mengubah data STRP.', '2024-07-25 11:50:42'),
(37, 1, '200 OK', 'Mengubah sub menu dari STRP menjadi sub menu STRP / STNK LBN.', '2024-07-25 14:05:27'),
(38, 6, '200 OK', 'Menambahkan STRP baru.', '2024-07-25 16:29:59'),
(39, 6, '200 OK', 'Menambahkan Formulir Wawancara baru.', '2024-07-25 16:38:05'),
(40, 7, '200 OK', 'Lantas mengubah data STRP.', '2024-07-25 16:42:15'),
(41, 7, '200 OK', 'Lantas mengubah data STRP.', '2024-07-25 16:43:06'),
(42, 7, '200 OK', 'Lantas mengubah data STRP.', '2024-07-25 16:49:38'),
(43, 7, '200 OK', 'Lantas mengubah data STRP.', '2024-07-25 16:49:50'),
(44, 6, '200 OK', 'Menambahkan STRP baru.', '2024-07-25 18:22:32'),
(45, 6, '200 OK', 'Menambahkan Formulir Wawancara baru.', '2024-07-25 18:37:42'),
(46, 6, '200 OK', 'Menambahkan STRP baru.', '2024-07-26 17:15:12'),
(47, 6, '200 OK', 'Menambahkan Formulir Wawancara baru.', '2024-07-26 17:55:55'),
(48, 7, '200 OK', 'Lantas mengubah data STRP.', '2024-07-26 18:06:52'),
(49, 6, '200 OK', 'Menambahkan STRP baru.', '2024-07-27 08:34:26'),
(50, 6, '200 OK', 'Menambahkan STRP baru.', '2024-07-27 11:57:46'),
(51, 6, '200 OK', 'Menambahkan Formulir Wawancara baru.', '2024-07-27 12:14:44'),
(52, 7, '200 OK', 'Lantas mengubah data STRP.', '2024-07-27 12:19:54'),
(53, 7, '200 OK', 'Lantas mengubah data STRP.', '2024-07-27 13:00:01'),
(54, 1, '200 OK', 'Menghapus akses sub menu.', '2024-07-27 18:03:33'),
(55, 6, '200 OK', 'Menambahkan STRP baru.', '2024-07-27 19:02:54'),
(56, 6, '200 OK', 'Menambahkan Formulir Wawancara baru.', '2024-07-27 19:06:39'),
(57, 7, '200 OK', 'Lantas mengubah data STRP.', '2024-07-27 19:09:02'),
(58, 6, '200 OK', 'Menambahkan STRP baru.', '2024-07-27 19:37:03'),
(59, 6, '200 OK', 'Menambahkan Formulir Wawancara baru.', '2024-07-27 19:40:51'),
(60, 7, '200 OK', 'Lantas mengubah data STRP.', '2024-07-27 19:42:17');

-- --------------------------------------------------------

--
-- Struktur dari tabel `users_login_logs`
--

CREATE TABLE `users_login_logs` (
  `id_login_logs` int(11) NOT NULL,
  `id_user` int(11) DEFAULT NULL,
  `status` varchar(10) DEFAULT NULL,
  `problem` text DEFAULT NULL,
  `device` varchar(200) DEFAULT NULL,
  `ip_address` varchar(45) DEFAULT NULL,
  `date_login_logs` datetime DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data untuk tabel `users_login_logs`
--

INSERT INTO `users_login_logs` (`id_login_logs`, `id_user`, `status`, `problem`, `device`, `ip_address`, `date_login_logs`) VALUES
(6, 2, NULL, NULL, 'Chrome - Windows', '127.0.0.1', '2024-07-24 12:09:46'),
(8, 2, NULL, NULL, 'Chrome - Windows', '127.0.0.1', '2024-07-24 14:36:46'),
(11, 1, NULL, NULL, 'Chrome - Windows', '127.0.0.1', '2024-07-25 07:06:31'),
(12, 1, NULL, NULL, 'Chrome - Windows', '180.249.167.53', '2024-07-25 08:55:54'),
(13, 1, NULL, NULL, 'Firefox - Windows', '125.164.196.232', '2024-07-25 09:13:09'),
(14, 6, 'WRN', 'login gagal, akun belum diaktifkan.', 'Firefox - Windows', '125.164.196.232', '2024-07-25 09:53:20'),
(15, 6, 'WRN', 'login gagal, akun belum diaktifkan.', 'Firefox - Windows', '125.164.196.232', '2024-07-25 09:55:22'),
(16, 6, NULL, NULL, 'Firefox - Windows', '125.164.196.232', '2024-07-25 09:59:01'),
(17, 1, NULL, NULL, 'Firefox - Windows', '125.164.196.232', '2024-07-25 10:36:37'),
(18, 6, NULL, NULL, 'Firefox - Windows', '125.164.196.232', '2024-07-25 10:39:22'),
(19, 1, NULL, NULL, 'Firefox - Windows', '125.164.196.232', '2024-07-25 11:13:55'),
(20, 6, NULL, NULL, 'Firefox - Windows', '125.164.196.232', '2024-07-25 11:17:29'),
(21, 1, NULL, NULL, 'Firefox - Windows', '125.164.196.232', '2024-07-25 11:19:05'),
(22, 7, NULL, NULL, 'Chrome - Windows', '180.249.214.249', '2024-07-25 11:36:23'),
(23, 7, NULL, NULL, 'Chrome - Windows', '180.249.214.249', '2024-07-25 11:36:44'),
(24, 7, NULL, NULL, 'Firefox - Windows', '125.164.196.232', '2024-07-25 11:36:58'),
(25, 1, NULL, NULL, 'Firefox - Windows', '125.164.196.232', '2024-07-25 11:55:45'),
(26, 6, NULL, NULL, 'Firefox - Windows', '125.164.196.232', '2024-07-25 12:02:15'),
(27, 1, NULL, NULL, 'Firefox - Windows', '125.164.196.232', '2024-07-25 12:05:18'),
(28, 7, NULL, NULL, 'Firefox - Windows', '125.164.196.232', '2024-07-25 12:13:27'),
(29, 6, NULL, NULL, 'Firefox - Windows', '125.164.196.232', '2024-07-25 12:28:06'),
(30, 6, NULL, NULL, 'Firefox - Windows', '125.164.196.232', '2024-07-25 13:36:05'),
(31, 1, NULL, NULL, 'Chrome - Windows', '180.249.214.249', '2024-07-25 14:05:11'),
(32, 7, NULL, NULL, 'Chrome - Windows', '180.249.214.249', '2024-07-25 14:05:54'),
(33, 8, NULL, NULL, 'Chrome - Windows', '180.249.214.249', '2024-07-25 14:20:26'),
(34, 6, NULL, NULL, 'Firefox - Windows', '119.11.205.59', '2024-07-25 15:04:51'),
(35, 6, NULL, NULL, 'Firefox - Windows', '119.11.205.59', '2024-07-25 16:24:57'),
(36, 7, NULL, NULL, 'Firefox - Windows', '125.164.206.90', '2024-07-25 16:40:34'),
(37, 6, NULL, NULL, 'Firefox - Windows', '125.164.200.174', '2024-07-25 16:45:50'),
(38, 7, NULL, NULL, 'Firefox - Windows', '125.164.200.174', '2024-07-25 16:46:48'),
(39, 6, NULL, NULL, 'Firefox - Windows', '125.164.200.174', '2024-07-25 16:47:58'),
(40, 7, NULL, NULL, 'Firefox - Windows', '125.164.200.174', '2024-07-25 16:48:51'),
(41, 1, NULL, NULL, 'Firefox - Windows', '125.164.205.230', '2024-07-25 16:52:30'),
(42, 6, NULL, NULL, 'Firefox - Windows', '125.164.196.232', '2024-07-25 17:52:14'),
(43, 1, NULL, NULL, 'Firefox - Windows', '125.164.194.144', '2024-07-26 08:28:44'),
(44, 6, NULL, NULL, 'Firefox - Windows', '125.164.194.144', '2024-07-26 09:24:39'),
(45, 1, NULL, NULL, 'Firefox - Windows', '125.164.194.144', '2024-07-26 17:03:05'),
(46, 6, NULL, NULL, 'Firefox - Windows', '125.164.194.144', '2024-07-26 17:04:24'),
(47, 1, NULL, NULL, 'Firefox - Windows', '125.164.194.144', '2024-07-26 17:56:42'),
(48, 7, NULL, NULL, 'Firefox - Windows', '125.164.194.144', '2024-07-26 18:00:13'),
(49, 1, NULL, NULL, 'Chrome - Windows', '114.122.167.146', '2024-07-26 21:14:40'),
(50, 1, NULL, NULL, 'Chrome - Windows', '114.122.167.146', '2024-07-26 21:25:59'),
(51, 1, NULL, NULL, 'Firefox - Windows', '125.164.194.144', '2024-07-26 22:11:39'),
(52, 1, NULL, NULL, 'Chrome - Windows', '114.122.167.146', '2024-07-26 22:37:36'),
(53, 7, NULL, NULL, 'Chrome - Windows', '114.122.167.146', '2024-07-26 22:38:35'),
(54, 1, NULL, NULL, 'Chrome - Windows', '114.122.167.146', '2024-07-26 22:42:27'),
(55, 8, 'WRN', 'login gagal, kata sandi yang dimasukkan salah.', 'Chrome - Windows', '114.122.167.146', '2024-07-26 22:44:19'),
(56, 10, NULL, NULL, 'Chrome - Windows', '114.122.167.146', '2024-07-26 22:46:23'),
(57, 1, NULL, NULL, 'Chrome - Windows', '114.122.167.146', '2024-07-26 23:06:07'),
(58, 7, NULL, NULL, 'Chrome - Windows', '114.122.167.146', '2024-07-26 23:07:47'),
(59, 1, NULL, NULL, 'Chrome - Windows', '114.122.167.146', '2024-07-26 23:08:18'),
(60, 7, NULL, NULL, 'Chrome - Windows', '114.122.167.146', '2024-07-26 23:09:11'),
(61, 1, NULL, NULL, 'Chrome - Windows', '114.122.167.146', '2024-07-26 23:28:24'),
(62, 1, NULL, NULL, 'Chrome - Windows', '180.249.214.249', '2024-07-27 02:37:04'),
(63, 1, NULL, NULL, 'Chrome - Windows', '114.122.167.146', '2024-07-27 07:15:44'),
(64, 10, 'WRN', 'login gagal, kata sandi yang dimasukkan salah.', 'Chrome - Windows', '114.122.167.146', '2024-07-27 07:16:08'),
(65, 10, NULL, NULL, 'Chrome - Windows', '114.122.167.146', '2024-07-27 07:16:20'),
(66, 1, NULL, NULL, 'Firefox - Windows', '125.164.194.144', '2024-07-27 07:34:56'),
(67, 6, NULL, NULL, 'Firefox - Windows', '125.164.194.144', '2024-07-27 07:38:37'),
(68, 10, 'WRN', 'login gagal, kata sandi yang dimasukkan salah.', 'Chrome - Windows', '114.122.167.146', '2024-07-27 07:38:47'),
(69, 10, NULL, NULL, 'Chrome - Windows', '114.122.167.146', '2024-07-27 07:38:55'),
(70, 1, NULL, NULL, 'Firefox - Windows', '125.164.194.144', '2024-07-27 07:40:17'),
(71, 6, NULL, NULL, 'Firefox - Windows', '125.164.194.144', '2024-07-27 08:13:21'),
(72, 1, NULL, NULL, 'Firefox - Windows', '125.164.194.144', '2024-07-27 09:16:16'),
(73, 7, NULL, NULL, 'Firefox - Windows', '125.164.194.144', '2024-07-27 09:17:41'),
(74, 6, NULL, NULL, 'Firefox - Windows', '125.164.194.144', '2024-07-27 09:18:47'),
(75, 1, NULL, NULL, 'Firefox - Windows', '182.4.198.78', '2024-07-27 10:53:30'),
(76, 6, NULL, NULL, 'Firefox - Windows', '125.164.194.144', '2024-07-27 11:48:07'),
(77, 7, NULL, NULL, 'Firefox - Windows', '125.164.194.144', '2024-07-27 12:16:10'),
(78, 1, NULL, NULL, 'Firefox - Windows', '125.164.194.144', '2024-07-27 13:15:39'),
(79, 1, NULL, NULL, 'Chrome - Windows', '180.249.166.78', '2024-07-27 18:03:15'),
(80, 7, NULL, NULL, 'Chrome - Windows', '180.249.166.78', '2024-07-27 18:10:16'),
(81, 1, NULL, NULL, 'Chrome - Windows', '180.249.166.78', '2024-07-27 18:21:58'),
(82, 8, NULL, NULL, 'Chrome - Windows', '180.249.166.78', '2024-07-27 18:30:14'),
(83, 1, NULL, NULL, 'Firefox - Windows', '125.164.194.144', '2024-07-27 18:35:22'),
(84, 7, NULL, NULL, 'Firefox - Windows', '125.164.194.144', '2024-07-27 18:36:11'),
(85, 7, NULL, NULL, 'Chrome - Windows', '180.249.166.78', '2024-07-27 18:45:53'),
(86, 1, NULL, NULL, 'Firefox - Windows', '125.164.194.144', '2024-07-27 18:48:58'),
(87, 6, NULL, NULL, 'Firefox - Windows', '125.164.194.144', '2024-07-27 18:57:18'),
(88, 7, NULL, NULL, 'Firefox - Windows', '125.164.194.144', '2024-07-27 19:07:51'),
(89, 1, NULL, NULL, 'Firefox - Windows', '125.164.194.144', '2024-07-27 19:15:41'),
(90, 1, NULL, NULL, 'Chrome - Windows', '180.249.166.78', '2024-07-27 19:21:07'),
(91, 7, NULL, NULL, 'Chrome - Windows', '180.249.166.78', '2024-07-27 19:22:02'),
(92, 6, NULL, NULL, 'Firefox - Windows', '125.164.194.144', '2024-07-27 19:33:24'),
(93, 7, NULL, NULL, 'Firefox - Windows', '125.164.194.144', '2024-07-27 19:41:36'),
(94, 1, NULL, NULL, 'Firefox - Windows', '125.164.194.144', '2024-07-27 19:46:13');

-- --------------------------------------------------------

--
-- Struktur dari tabel `users_menu`
--

CREATE TABLE `users_menu` (
  `id_menu` int(11) NOT NULL,
  `menu` varchar(50) DEFAULT NULL,
  `icon` varchar(50) DEFAULT NULL,
  `folder` varchar(50) DEFAULT NULL
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
  `id_otentikasi` int(11) NOT NULL,
  `id_user` int(11) DEFAULT NULL,
  `encryption` text DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

-- --------------------------------------------------------

--
-- Struktur dari tabel `users_role`
--

CREATE TABLE `users_role` (
  `id_role` int(11) NOT NULL,
  `role` varchar(35) DEFAULT NULL
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
  `id_status` int(11) NOT NULL,
  `status` varchar(35) DEFAULT NULL
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
  `id_sub_menu` int(11) NOT NULL,
  `id_menu` int(11) DEFAULT NULL,
  `id_active` int(11) DEFAULT 2,
  `title` varchar(50) DEFAULT NULL,
  `file` varchar(50) DEFAULT NULL
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
(8, 3, 1, 'STRP / STNK LBN', 'strp'),
(9, 3, 1, 'Formulir Wawancara', 'formulir-wawancara'),
(10, 3, 1, 'Keberangkatan', 'keberangkatan'),
(11, 3, 1, 'Kedatangan', 'kedatangan');

-- --------------------------------------------------------

--
-- Struktur dari tabel `warga_negara`
--

CREATE TABLE `warga_negara` (
  `id_warga_negara` int(11) NOT NULL,
  `warga_negara` varchar(50) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data untuk tabel `warga_negara`
--

INSERT INTO `warga_negara` (`id_warga_negara`, `warga_negara`) VALUES
(1, 'INDONESIA (ID)');

--
-- Indexes for dumped tables
--

--
-- Indeks untuk tabel `alamat_kendaraan`
--
ALTER TABLE `alamat_kendaraan`
  ADD PRIMARY KEY (`id_alamat_kendaraan`),
  ADD KEY `id_fw` (`id_fw`);

--
-- Indeks untuk tabel `alamat_pengemudi`
--
ALTER TABLE `alamat_pengemudi`
  ADD PRIMARY KEY (`id_alamat_pengemudi`),
  ADD KEY `id_fw` (`id_fw`);

--
-- Indeks untuk tabel `alamat_tujuan`
--
ALTER TABLE `alamat_tujuan`
  ADD PRIMARY KEY (`id_alamat_tujuan`),
  ADD KEY `id_fw` (`id_fw`);

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
  ADD KEY `id_kepemilikan_kendaraan` (`id_kepemilikan_kendaraan`),
  ADD KEY `id_user` (`id_user`),
  ADD KEY `id_strp` (`id_strp`);

--
-- Indeks untuk tabel `keberangkatan`
--
ALTER TABLE `keberangkatan`
  ADD PRIMARY KEY (`id_keberangkatan`),
  ADD KEY `id_user` (`id_user`),
  ADD KEY `id_fw` (`id_fw`);

--
-- Indeks untuk tabel `kedatangan`
--
ALTER TABLE `kedatangan`
  ADD PRIMARY KEY (`id_keberangkatan`),
  ADD KEY `id_user` (`id_user`),
  ADD KEY `id_fw` (`id_fw`);

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
  MODIFY `id_alamat_kendaraan` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=10;

--
-- AUTO_INCREMENT untuk tabel `alamat_pengemudi`
--
ALTER TABLE `alamat_pengemudi`
  MODIFY `id_alamat_pengemudi` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=12;

--
-- AUTO_INCREMENT untuk tabel `alamat_tujuan`
--
ALTER TABLE `alamat_tujuan`
  MODIFY `id_alamat_tujuan` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=10;

--
-- AUTO_INCREMENT untuk tabel `bahan_bakar`
--
ALTER TABLE `bahan_bakar`
  MODIFY `id_bahan_bakar` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=12;

--
-- AUTO_INCREMENT untuk tabel `formulir_wawancara`
--
ALTER TABLE `formulir_wawancara`
  MODIFY `id_fw` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=8;

--
-- AUTO_INCREMENT untuk tabel `keberangkatan`
--
ALTER TABLE `keberangkatan`
  MODIFY `id_keberangkatan` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=9;

--
-- AUTO_INCREMENT untuk tabel `kedatangan`
--
ALTER TABLE `kedatangan`
  MODIFY `id_keberangkatan` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT untuk tabel `kepemilikan_kendaraan`
--
ALTER TABLE `kepemilikan_kendaraan`
  MODIFY `id_kepemilikan_kendaraan` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- AUTO_INCREMENT untuk tabel `strp`
--
ALTER TABLE `strp`
  MODIFY `id_strp` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=9;

--
-- AUTO_INCREMENT untuk tabel `users`
--
ALTER TABLE `users`
  MODIFY `id_user` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=11;

--
-- AUTO_INCREMENT untuk tabel `users_access_menu`
--
ALTER TABLE `users_access_menu`
  MODIFY `id_access_menu` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;

--
-- AUTO_INCREMENT untuk tabel `users_access_sub_menu`
--
ALTER TABLE `users_access_sub_menu`
  MODIFY `id_access_sub_menu` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=16;

--
-- AUTO_INCREMENT untuk tabel `users_log`
--
ALTER TABLE `users_log`
  MODIFY `id_log` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=61;

--
-- AUTO_INCREMENT untuk tabel `users_login_logs`
--
ALTER TABLE `users_login_logs`
  MODIFY `id_login_logs` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=95;

--
-- AUTO_INCREMENT untuk tabel `users_menu`
--
ALTER TABLE `users_menu`
  MODIFY `id_menu` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT untuk tabel `users_otentikasi`
--
ALTER TABLE `users_otentikasi`
  MODIFY `id_otentikasi` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT untuk tabel `users_role`
--
ALTER TABLE `users_role`
  MODIFY `id_role` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- AUTO_INCREMENT untuk tabel `users_status`
--
ALTER TABLE `users_status`
  MODIFY `id_status` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT untuk tabel `users_sub_menu`
--
ALTER TABLE `users_sub_menu`
  MODIFY `id_sub_menu` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=12;

--
-- AUTO_INCREMENT untuk tabel `warga_negara`
--
ALTER TABLE `warga_negara`
  MODIFY `id_warga_negara` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- Ketidakleluasaan untuk tabel pelimpahan (Dumped Tables)
--

--
-- Ketidakleluasaan untuk tabel `alamat_kendaraan`
--
ALTER TABLE `alamat_kendaraan`
  ADD CONSTRAINT `alamat_kendaraan_ibfk_1` FOREIGN KEY (`id_fw`) REFERENCES `formulir_wawancara` (`id_fw`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Ketidakleluasaan untuk tabel `alamat_pengemudi`
--
ALTER TABLE `alamat_pengemudi`
  ADD CONSTRAINT `alamat_pengemudi_ibfk_1` FOREIGN KEY (`id_fw`) REFERENCES `formulir_wawancara` (`id_fw`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Ketidakleluasaan untuk tabel `alamat_tujuan`
--
ALTER TABLE `alamat_tujuan`
  ADD CONSTRAINT `alamat_tujuan_ibfk_1` FOREIGN KEY (`id_fw`) REFERENCES `formulir_wawancara` (`id_fw`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Ketidakleluasaan untuk tabel `formulir_wawancara`
--
ALTER TABLE `formulir_wawancara`
  ADD CONSTRAINT `formulir_wawancara_ibfk_3` FOREIGN KEY (`id_kepemilikan_kendaraan`) REFERENCES `kepemilikan_kendaraan` (`id_kepemilikan_kendaraan`),
  ADD CONSTRAINT `formulir_wawancara_ibfk_5` FOREIGN KEY (`id_user`) REFERENCES `users` (`id_user`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `formulir_wawancara_ibfk_6` FOREIGN KEY (`id_strp`) REFERENCES `strp` (`id_strp`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Ketidakleluasaan untuk tabel `keberangkatan`
--
ALTER TABLE `keberangkatan`
  ADD CONSTRAINT `keberangkatan_ibfk_1` FOREIGN KEY (`id_user`) REFERENCES `users` (`id_user`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `keberangkatan_ibfk_2` FOREIGN KEY (`id_fw`) REFERENCES `formulir_wawancara` (`id_fw`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Ketidakleluasaan untuk tabel `kedatangan`
--
ALTER TABLE `kedatangan`
  ADD CONSTRAINT `kedatangan_ibfk_1` FOREIGN KEY (`id_user`) REFERENCES `users` (`id_user`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `kedatangan_ibfk_2` FOREIGN KEY (`id_fw`) REFERENCES `formulir_wawancara` (`id_fw`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Ketidakleluasaan untuk tabel `strp`
--
ALTER TABLE `strp`
  ADD CONSTRAINT `strp_ibfk_1` FOREIGN KEY (`id_user`) REFERENCES `users` (`id_user`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `strp_ibfk_2` FOREIGN KEY (`id_warga_negara`) REFERENCES `warga_negara` (`id_warga_negara`),
  ADD CONSTRAINT `strp_ibfk_3` FOREIGN KEY (`id_bahan_bakar`) REFERENCES `bahan_bakar` (`id_bahan_bakar`),
  ADD CONSTRAINT `strp_ibfk_4` FOREIGN KEY (`id_kepemilikan_kendaraan`) REFERENCES `kepemilikan_kendaraan` (`id_kepemilikan_kendaraan`);

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
