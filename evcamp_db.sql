-- phpMyAdmin SQL Dump
-- version 4.7.4
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: 11 Sep 2019 pada 16.41
-- Versi Server: 10.1.30-MariaDB
-- PHP Version: 7.2.1

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET AUTOCOMMIT = 0;
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `evcamp_db`
--

-- --------------------------------------------------------

--
-- Struktur dari tabel `admins`
--

CREATE TABLE `admins` (
  `id` int(10) UNSIGNED NOT NULL,
  `name` varchar(100) COLLATE utf8mb4_unicode_ci NOT NULL,
  `email` varchar(100) COLLATE utf8mb4_unicode_ci NOT NULL,
  `password` varchar(100) COLLATE utf8mb4_unicode_ci NOT NULL,
  `nama_bank` varchar(100) COLLATE utf8mb4_unicode_ci NOT NULL,
  `nama_akun` varchar(100) COLLATE utf8mb4_unicode_ci NOT NULL,
  `no_rek` varchar(30) COLLATE utf8mb4_unicode_ci NOT NULL,
  `remember_token` varchar(100) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data untuk tabel `admins`
--

INSERT INTO `admins` (`id`, `name`, `email`, `password`, `nama_bank`, `nama_akun`, `no_rek`, `remember_token`, `created_at`, `updated_at`) VALUES
(1, 'ADMIN', 'admin@gmail.com', '$2y$10$Cbe8TFgEGk5XNPsgiNvciesn8d20DhVQ8Gag7H2o7sgCZaxp8l/km', 'BRI', 'EVCAMP', '3113002019', NULL, '2019-05-26 18:00:00', NULL);

-- --------------------------------------------------------

--
-- Struktur dari tabel `campuses`
--

CREATE TABLE `campuses` (
  `id` int(10) UNSIGNED NOT NULL,
  `nama_kampus` varchar(120) COLLATE utf8mb4_unicode_ci NOT NULL,
  `alamat` varchar(250) COLLATE utf8mb4_unicode_ci NOT NULL,
  `latitude` varchar(30) COLLATE utf8mb4_unicode_ci NOT NULL,
  `longitude` varchar(30) COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  `deleted_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data untuk tabel `campuses`
--

INSERT INTO `campuses` (`id`, `nama_kampus`, `alamat`, `latitude`, `longitude`, `created_at`, `updated_at`, `deleted_at`) VALUES
(1, 'Politeknik Harapan Bersama', 'Jl. Mataram No.9, Kel. Pesurungan Lor, Pesurungan Lor, Kec. Margadana, Kota Tegal, Jawa Tengah', '-6.868314', '109.107880', '2019-05-31 02:56:24', NULL, NULL),
(2, 'Universitas Pancasakti Tegal', 'Jl. Halmahera No.KM. 01, Mintaragen, Kec. Tegal Tim., Kota Tegal, Jawa Tengah', '-6.852141', '109.147955', '2019-05-31 02:56:24', NULL, NULL),
(3, 'STMIK YMI Tegal', 'Jl. Pendidikan No.1, Pesurungan Lor, Kec. Margadana, Kota Tegal, Jawa Tengah', '-6.869233', '109.115673', '2019-05-31 02:56:24', NULL, NULL),
(4, 'STIKES Bhamada Slawi', 'Jalan Cut Nyak Dien No.16, Kalisapu, Slawi, Griya Prajamukti, Kalisapu, Slawi, Tegal, Jawa Tengah', '-6.991501', '109.120523', '2019-05-31 02:56:24', NULL, NULL),
(5, 'STKIP Nahdlatul Ulama Kab. Tegal', 'Jl. Raya Sel. Banjaran No.21, Procot, Slawi, Tegal, Jawa Tengah', '-6.971906', '109.139127', '2019-05-31 02:56:24', NULL, NULL),
(6, 'STIKES Muhammadiyah Tegal', 'Ketengahan, Lebaksiu Kidul, Lebaksiu, Tegal, Jawa Tengah', '-7.046791', '109.145311', '2019-05-31 02:56:24', NULL, NULL),
(7, 'AMIK YMI Tegal', 'Jl. Raya Dampyak No.KM 4, Kedondong, Padaharja, Kec. Kramat, Tegal, Jawa Tengah', '-6.863244', '109.170111', '2019-05-31 02:56:24', '2019-06-01 13:01:28', NULL),
(8, 'Akademi Perikanan Baruna', 'Jl. Slawi-Jatibarang Km 04, Dukuhwaru, Kab.Tegal, Jawa Tengah', '-6.972698', '109.104276', '2019-05-31 02:56:24', '2019-06-01 14:38:17', NULL),
(9, 'Akademi Kebidanan Siti Fatimah', 'JL. Raya Slawi Jatibarang Km. 4, Dukuhwaru, Kalipinang, Kalisapu, Slawi, Tegal, Jawa Tengah', '-6.970874', '109.105416', '2019-05-31 02:56:24', '2019-06-20 20:42:05', NULL),
(10, 'AMIK BSI Tegal', 'Jl. Sipelem No.22, Kraton, Kec. Tegal Barat, Kota Tegal, Jawa Tengah', '-6.864314', '109.121005', '2019-05-31 02:56:24', '2019-06-01 12:33:42', NULL),
(11, 'Politeknik Purbaya', 'Jl. Pancakarya No.1, Kalimati, Kajen, Kec. Talang, Tegal, Jawa Tengah', '-6.922119', '109.135859', '2019-05-31 02:56:24', '2019-06-01 13:04:06', NULL),
(12, 'Politeknik Muhammadiyah Tegal', 'Jl. Melati No.27, Slerok, Kec. Tegal Timur, Kota Tegal, Jawa Tengah', '-6.874815', '109.140363', '2019-05-31 02:56:24', '2019-06-01 13:24:53', NULL),
(13, 'Politeknik Trisila Dharma', 'Jl. Halmahera No.1, Mintaragen, Kec. Tegal Tim., Kota Tegal, Jawa Tengah', '-6.850048', '109.146772', '2019-05-31 02:56:24', NULL, NULL),
(14, 'Politeknik Baja Tegal', 'Jl. Raya Barat, Dukuhwaru, Keplik, Dukuhwaru, Tegal, Jawa Tengah', '-6.969727', '109.095774', '2019-05-31 02:56:24', '2019-06-01 13:02:06', NULL),
(19, 'Kambus baru', 'Tegal', '-6.868484429440672', '109.11543310058596', '2019-08-02 04:00:38', '2019-08-02 04:00:38', NULL);

-- --------------------------------------------------------

--
-- Struktur dari tabel `events`
--

CREATE TABLE `events` (
  `id` int(10) UNSIGNED NOT NULL,
  `id_organizer` int(10) UNSIGNED NOT NULL,
  `nama_event` varchar(200) COLLATE utf8mb4_unicode_ci NOT NULL,
  `deskripsi` text COLLATE utf8mb4_unicode_ci NOT NULL,
  `id_campus` int(10) UNSIGNED NOT NULL,
  `detail_lokasi` varchar(200) COLLATE utf8mb4_unicode_ci NOT NULL,
  `kategori_event` varchar(8) COLLATE utf8mb4_unicode_ci NOT NULL,
  `kategori_tiket` varchar(8) COLLATE utf8mb4_unicode_ci NOT NULL,
  `banner` varchar(200) COLLATE utf8mb4_unicode_ci NOT NULL,
  `jumlah` int(11) NOT NULL,
  `tgl_mulai` date NOT NULL,
  `tgl_selesai` date NOT NULL,
  `waktu_mulai` time NOT NULL,
  `waktu_selesai` time NOT NULL,
  `penyelenggara` varchar(200) COLLATE utf8mb4_unicode_ci NOT NULL,
  `tgl_penj_mulai` date NOT NULL,
  `tgl_penj_selesai` date NOT NULL,
  `bukti_transfer_hasil` varchar(200) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  `deleted_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data untuk tabel `events`
--

INSERT INTO `events` (`id`, `id_organizer`, `nama_event`, `deskripsi`, `id_campus`, `detail_lokasi`, `kategori_event`, `kategori_tiket`, `banner`, `jumlah`, `tgl_mulai`, `tgl_selesai`, `waktu_mulai`, `waktu_selesai`, `penyelenggara`, `tgl_penj_mulai`, `tgl_penj_selesai`, `bukti_transfer_hasil`, `created_at`, `updated_at`, `deleted_at`) VALUES
(1, 11, 'Tech Talk Internet of Thing', 'Membahas Internet of Thing bersama para ahli di bidang IoT ini. Pesan Tiketnya sekarang', 1, 'Gedung D Lantai 4 Ruang D41', 'Seminar', 'Berbayar', 'banner/banner02.png', 80, '2019-08-21', '2019-08-22', '08:00:00', '16:00:00', 'D4 T. Informatika', '0000-00-00', '0000-00-00', 'bukti_transfer_hasil/rDYtupJz06zk33kNCKAKthFA1SdguBAuU9TzJ8OK.jpeg', NULL, '2019-08-01 15:22:32', '2019-08-01 15:22:32'),
(2, 14, 'Meet A Mentor', 'Membahas Dunia IT bersama para ahli di bidang IT ini. Pesan Tiketnya sekarang haha', 1, 'Gedung A Lantai 2 Ruang A21', 'Seminar', 'Berbayar', 'banner/banner01.png', 50, '2019-07-31', '2019-07-31', '08:00:00', '16:00:00', 'Fakultas Ilmu Komputer', '0000-00-00', '0000-00-00', 'bukti_transfer_hasil/eQhT1tI56NCB4o0WM1e8QuoPO5KW18TVODgvicnn.jpeg', NULL, '2019-08-01 03:21:32', NULL),
(3, 11, 'Technology Conference', 'Konferensi Dunia IT bersama para ahli di bidang IT ini. Pesan Tiketnya sekarang', 13, 'Gedung A Lantai 2 Ruang A25', 'Seminar', 'Berbayar', 'banner/banner03.png', 50, '2019-06-21', '2019-06-21', '08:00:00', '16:00:00', 'D3 T. Komputer', '0000-00-00', '0000-00-00', NULL, NULL, '2019-06-20 21:00:06', NULL),
(4, 11, 'Event Saya', 'Pengisi Bapak Alien', 1, 'Gedung A Ruang Aula', 'Seminar', 'Berbayar', 'banner/xowsXMQ7I8MO6as50dzfmuxsG8ZQROhxEVHZqygT.jpeg', 50, '2019-07-09', '2019-07-11', '08:00:00', '10:00:00', 'D4 Teknik Mesin', '0000-00-00', '0000-00-00', NULL, '2019-07-07 22:44:48', '2019-07-07 22:46:50', NULL),
(5, 1, 'jjjjjjjjjjjjjj', 'kkkkkkkkkkkkkk', 1, 'kkkkkkkkkkkk', 'Seminar', 'Berbayar', 'banner/Anq71YhN8unDihIp1xNNbJAtU9p8aqoz55wS0wzq.jpeg', 80, '2019-07-10', '2019-07-10', '08:00:00', '09:00:00', 'kkkkkkkkkkkkk', '0000-00-00', '0000-00-00', NULL, '2019-07-08 20:29:59', '2019-08-01 15:38:10', '2019-08-01 15:38:10'),
(6, 13, 'ggggggggggggggg', 'ffffffffffffffff', 7, 'hhhhhhhhhhhhh', 'Seminar', 'Berbayar', 'banner/gyWtJDNc9hnCxlePXCMpfdlwmDUQ4xQwqijjX6vk.jpeg', 66, '2019-07-09', '2019-07-12', '09:00:00', '10:08:00', 'fffffffffffffffffff', '0000-00-00', '0000-00-00', NULL, '2019-07-09 03:45:26', '2019-07-09 03:45:26', NULL),
(7, 14, 'Seminar Panjat Gunung', 'Diisi oleh ahli nya', 1, 'Aula Gedung C', 'Seminar', 'Berbayar', 'banner/6RFYCyBIoWOi4w9nkH0XmAT0dzeiY0lQtW1WSpot.jpeg', 50, '2019-07-18', '2019-07-30', '08:00:00', '10:00:00', 'UKM Pecinta Alam', '0000-00-00', '0000-00-00', 'bukti_transfer_hasil/j1C5dR4NOwUsa1jWJT8dOFRKPxyvvDL0TVYVDSFA.jpeg', '2019-07-16 02:52:17', '2019-08-01 03:28:40', NULL),
(8, 14, 'jjjjjjjjjjjj', 'jjjjjjjjjjjjjjjj', 1, 'kkkkkkkkkkkkkkkkkkk', 'Seminar', 'Berbayar', 'banner/EqQLN3EgW9TBQ5QRllZ7IJowdrdncB4JuMcsbfpi.png', 100, '2019-07-26', '2019-07-15', '08:00:00', '09:00:00', 'kkkkkkkkkkkkkkkkkk', '0000-00-00', '0000-00-00', NULL, '2019-07-24 09:56:40', '2019-07-24 09:57:39', '2019-07-24 09:57:39'),
(9, 14, 'jjjjjjjjjjjj', 'jjjjjjjjjjjjjjjj', 1, 'kkkkkkkkkkkkkkkkkkk', 'Seminar', 'Berbayar', 'banner/uSDAz4aNVTcFIkLHwlIkCOYD5Ie4WGffEKAs9c5I.png', 100, '2019-07-25', '2019-07-29', '08:00:00', '09:00:00', 'kkkkkkkkkkkkkkkkkk', '0000-00-00', '0000-00-00', NULL, '2019-07-24 09:57:28', '2019-07-31 09:09:50', '2019-07-31 09:09:50'),
(10, 14, 'jjjjjjjjjjjj', 'jjjjjjjjjjjjjjjj', 1, 'kkkkkkkkkkkkkkkkkkk', 'Seminar', 'Berbayar', 'banner/UDDkhdJnRxbTL8shYP1qP3ynygi3uOreOhKdBBXW.png', 100, '2019-07-25', '2019-07-29', '08:00:00', '09:00:00', 'kkkkkkkkkkkkkkkkkk', '0000-00-00', '0000-00-00', NULL, '2019-07-24 09:58:17', '2019-07-31 09:09:46', '2019-07-31 09:09:46'),
(11, 14, 'coeg', 'coeggggggggggggg', 1, 'jjjjjj', 'Workshop', 'Gratis', 'banner/BKbcZa5Rd7dQWPTaJqcwOF6mOaP2ovkcf2sVuidz.jpeg', 10, '2019-08-15', '2019-08-22', '01:59:00', '11:23:00', 'diio goeg', '0000-00-00', '0000-00-00', NULL, '2019-07-31 09:08:03', '2019-07-31 09:10:10', '2019-07-31 09:10:10'),
(12, 14, 'MEGA BAZZAR $30M', 'Gosrek Community menghadirkan event Bazzar dengan total potongan harga sebesar $30M', 1, 'Sport center PHB Tegal.', 'Hiburan', 'Berbayar', 'banner/iZw1K7Hg3hRj5o5lU8gKFRWkdEVKDaq4kHv9oQMt.jpeg', 500, '2019-08-08', '2019-08-09', '15:30:00', '21:00:00', 'Abang Gosrek', '0000-00-00', '0000-00-00', NULL, '2019-07-31 11:17:56', '2019-07-31 11:17:56', '2019-08-01 00:00:00'),
(13, 10, 'Seminar IT', 'Merupakan Seminar Nasional Invofest 2017 dengan tema Bisnis Aplikasi Start Up untuk membangun Kreatifitas \r\n\r\nPengisi Acara\r\n1. SAMUEL ABRIJANI PANGERAPAN\r\n    (Ditjen Apoka Kementrian Komunikasi dan Informatika)\r\n2. RULLY INDRAWAN\r\n    (Pondok Programmer)', 1, 'Aula Gedung C', 'Seminar', 'Berbayar', 'banner/qkMzGTnd7VE9jNP4hZzKNOiHACIbNZmadvbpuOFk.jpeg', 20, '2019-08-14', '2019-08-18', '08:00:00', '12:00:00', 'Panitia Invofest', '0000-00-00', '0000-00-00', NULL, '2019-08-01 00:16:16', '2019-08-01 00:26:15', NULL),
(14, 10, 'Workshop IT', 'Merupakan workshop IT yang meliputi Traing Data Security, Web Service, Game Development, and Augmented Reality\r\n\r\nPengisi Acara :\r\n1. Data Security (Denny Darmawan)\r\n    Founder and Trainer PT, INTRA\r\n2. Web Service (Aris Setyawan)\r\n    Ruby Engineer', 1, 'Gedung C Ruang C4.2', 'Workshop', 'Berbayar', 'banner/RUe7qluE2RLdGMk1JUONP3ocnIBA2EmohXfjCyx0.jpeg', 10, '2019-08-14', '2019-08-15', '08:00:00', '12:00:00', 'Panitia Invofest', '0000-00-00', '0000-00-00', NULL, '2019-08-01 00:24:59', '2019-08-01 00:24:59', NULL),
(15, 10, 'Seminar IT 2018', 'Merupakan Seminar IT 2018 dengan tema Artificial Intelegent dalam Transformasi Industri Masa Depan\r\n\r\nPengisi Acara :\r\n1. Prof. Dr. Ir. Richardus Eko Indrajit, M.Sc., M.A, M.B.A., \r\n    M.Phil\r\n    First Chairman of ID-SIRTII', 1, 'Aula Gedung C', 'Seminar', 'Berbayar', 'banner/z3jNSCFHxYSJbokMKuSws8Av4UcaIWzfIwusiNkh.jpeg', 40, '2019-08-21', '2019-08-24', '08:00:00', '12:00:00', 'Panitia Invofest', '0000-00-00', '0000-00-00', NULL, '2019-08-01 00:31:42', '2019-08-01 00:31:42', NULL),
(16, 10, 'Workshop IT 2018', 'Merupakan Acara Workshop IT 2018\r\n\r\nPengisi Acara :\r\n1. Ahmad Ilham (Data Science)\r\n2. Afnizar Nur Ghifari (UI/UX DESIGN)\r\n3. Yahya Al-fath (Cyber Security)\r\n4. Web Service (Farah Luthfi Oktarina)', 1, 'Gedung C Lantai 4 Ruang D4.3', 'Workshop', 'Berbayar', 'banner/OlIUTY2kUIyjjVSonVkPNWfIfTD5m8nI0si0DwGg.jpeg', 20, '2019-08-17', '2019-08-17', '08:00:00', '12:00:00', 'Panitia Invofest', '0000-00-00', '0000-00-00', NULL, '2019-08-01 00:37:32', '2019-08-01 00:37:32', NULL),
(17, 6, 'Manajemen Sumber Daya Manusia', 'Seminar Nasional ini diadakan untuk meningkatkan kapasitas ilmu pengetahuan, literasi, serta konsentrasi sumber daya manusia (SDM)\r\n\r\nPengisi Acara :\r\n1.  Dr Riyadi Nugroho MM', 2, 'Aula Yayasan Pendidikan Pancasakti (YPP)', 'Seminar', 'Berbayar', 'banner/Jg1vLLaUPXQkK1QK8oUgqUTQGBuR9B8UQEr2fCMe.jpeg', 150, '2019-08-10', '2019-08-10', '08:00:00', '12:00:00', 'Panitia Fakultas Ekonomi dan Bisnis (FEB)', '0000-00-00', '0000-00-00', NULL, '2019-08-01 09:05:41', '2019-08-01 09:05:41', NULL),
(18, 5, 'Pelatihan Jurnalistik', 'Pelatihan Jurnalistik Merupakan salah satu proker dari HMPS Pendidkan  IPA UPS Tegal. Mendatangkan pemateri Bapak Kuntoro, S.IP yang merupakan ketua Persatuan Wartawan Indonesia (PWI), dan jurnalis metronews.com', 5, 'Gedung FKIP UPS tegal', 'Workshop', 'Berbayar', 'banner/k5L2HMfNQJCFyk2Ud3XCObEkEo7GUHdZU29b5fo7.jpeg', 50, '2019-08-15', '2019-08-15', '08:00:00', '12:00:00', 'HMPS UPS Tegal', '0000-00-00', '0000-00-00', NULL, '2019-08-01 09:10:18', '2019-08-01 10:08:46', NULL),
(19, 6, 'SEMINAR NASIONAL MIPA', 'Tantangan Pendidik MIPA di Era Revolusi Industri 4.0', 2, 'Aula', 'Seminar', 'Berbayar', 'banner/4ZY2KWVMCo9ZB4xMcRjHgxtvw6p7pNM3C6jvuRUP.jpeg', 50, '2019-08-06', '2019-08-06', '08:00:00', '12:00:00', 'Fakultas Keguruan dan Ilmu Pendidikan', '0000-00-00', '0000-00-00', NULL, '2019-08-01 09:13:53', '2019-08-01 09:13:53', NULL),
(20, 5, 'Workshop PKM Ke-3', 'Kegiatan ini diselenggarakan untuk mendukung atmosfer akademik mahasiswa, yang outputnya adalah mahasiswa menghasilkan karya ilmiah dan siap dilombakan.', 5, 'Aula Gedung UPS Tegal', 'Workshop', 'Berbayar', 'banner/I4Tw336W3jP1oUzU8AP1DRctCsCYTHSoLHI1KorN.jpeg', 50, '2019-08-12', '2019-08-13', '08:00:00', '16:00:00', 'Panitia PPI', '0000-00-00', '0000-00-00', NULL, '2019-08-01 09:15:24', '2019-08-01 09:44:45', NULL),
(21, 6, 'penulisan karya ilmiah', 'workshop penulisan kali ini adalah “Strategi Menembus Jurnl Berputasi Internasional dan Kiat Meraih Guru Besar”\r\n\r\nPengisi Acara :\r\n1. Prof. Anton Satria Prabuwono, Ph.D\r\nPofesor dari Fakultas Komputer dan Teknologi Informasi Universitas King Abdulaz', 2, 'Aula YPP Tegal', 'Workshop', 'Berbayar', 'banner/nDrIasC0o7QuWPutZvBvRpEVQ0BBSPFz7t5ZBVBR.jpeg', 50, '2019-08-12', '2019-08-17', '08:00:00', '12:00:00', 'UPS TEGAL', '0000-00-00', '0000-00-00', NULL, '2019-08-01 09:29:46', '2019-08-01 09:29:46', NULL),
(22, 33, 'Seminar Kesehatan Nasional', 'Seminar JariPunktur dan Smartpunktur di isi oleh M. Ferry Wong', 4, 'Gedung Aula', 'Seminar', 'Berbayar', 'banner/YGp731RB5yxJf3pKKiD63JjikiQhcgqf2wJfF6ky.jpeg', 130, '2019-09-25', '2019-09-25', '08:00:00', '11:00:00', 'Himadan', '0000-00-00', '0000-00-00', NULL, '2019-08-01 14:38:33', '2019-08-01 14:55:25', NULL),
(23, 34, 'Seminar Kefarmasian 2019', 'Seminar kefarmasian bertemakan membangun paradigma wirausahawan muda farmasi di era MEA\r\nPemateri I : Hamidah Sri Nindyarini, S.Si., Apt\r\nPemateri II : Agung Nurcahyanta, M.Farm., Apt', 4, 'Geduang Aula', 'Seminar', 'Berbayar', 'banner/1QQ0kXAdXpyqoniACtpn2eMe5B5BHiYjx7hVElSc.jpeg', 400, '2019-12-20', '2019-12-20', '07:30:00', '14:55:00', 'Himafarda', '0000-00-00', '0000-00-00', NULL, '2019-08-01 14:54:00', '2019-08-01 14:54:00', NULL),
(24, 35, 'Pekan Ilmiah dan Kefarmasian', 'Pekan ilmiah diadakan selama 3 hari dengan agenda yaitu oral presentation hasil penelitian dari mahasiswa tingkat 4 yang dihadiri oleh mahasiswa  kegiatan di tutup dengan agenda seminar kefarmasian dengan tema \"Potensi bahan alam untuk kesehatan\"', 4, 'Gedung Aula', 'Seminar', 'Berbayar', 'banner/6fbyTg8Y9UdDbugEVUQJsJoSNR5lrIm9lkpJyDMB.jpeg', 350, '2019-08-06', '2019-08-06', '08:00:00', '13:00:00', 'HIMAFARDA', '0000-00-00', '0000-00-00', NULL, '2019-08-01 15:09:46', '2019-08-01 15:13:48', NULL),
(25, 36, 'Seminar Challenging 4.0', 'Memberikan pemahaman tentangpentingnya skill di era revolusi', 1, 'Auditorium Gedung C', 'Seminar', 'Berbayar', 'banner/EeFR5QVP6DObFxpAUR8Tw5vfH0hA749klV4ABNgP.jpeg', 20, '2019-08-30', '2019-08-30', '07:30:00', '10:30:00', 'HMP Akuntansi', '0000-00-00', '0000-00-00', NULL, '2019-08-01 18:17:18', '2019-08-01 18:17:18', NULL),
(26, 36, 'Coba event', 'blabla', 1, 'b', 'Seminar', 'Berbayar', 'banner/hPPjhSuElIJhl2TCaSY0j1WfjZLarC1l9x7MfObF.jpeg', 10, '2019-08-16', '2019-08-16', '08:00:00', '09:00:00', 'bla bla bla', '0000-00-00', '0000-00-00', NULL, '2019-08-01 18:24:52', '2019-08-01 18:25:01', '2019-08-01 18:25:01'),
(27, 37, 'Seminar Kewirausahaan Farmasi', 'Memberikan bekal pengetahuan bagi generasi milenial yang berjiwa wirausaha.\r\n\r\nPemateri : Bpk. Bagus S.', 1, 'Aula Gedung C', 'Seminar', 'Berbayar', 'banner/PgksjCAnGYy1e0sSe0HmcfYUAHzZnSBASHMSfXYr.jpeg', 250, '2019-08-23', '2019-08-23', '13:00:00', '15:00:00', 'HMP Farmasi', '0000-00-00', '0000-00-00', NULL, '2019-08-01 18:39:10', '2019-08-01 18:52:29', NULL),
(28, 39, 'INVOFEST 2019', 'EVENT TAHUNAN INFORMATIKA', 1, 'Aula Gedung C', 'Seminar', 'Berbayar', 'banner/J32v1JmcRmdM2317g2g76CwbYibGDGainw0hOm5R.png', 290, '2019-08-06', '2019-08-06', '08:00:00', '12:00:00', 'HMP iNFORMATIKA', '0000-00-00', '0000-00-00', NULL, '2019-08-02 03:29:57', '2019-08-09 01:54:40', NULL),
(29, 14, 'Seminar E-Comerce', 'blablabla', 1, 'Gedung D Aula', 'Seminar', 'Berbayar', 'banner/8atRue0VFd9gFFk3VLoCLjZTRmrEjtrO9e8P3G8T.jpeg', 100, '2019-08-30', '2019-08-31', '09:00:00', '12:00:00', 'HMP Akuntansi', '2019-08-09', '2019-08-28', NULL, '2019-08-08 11:18:33', '2019-08-08 11:18:33', NULL),
(30, 39, 'choba', 'choba', 1, 'choba', 'Seminar', 'Berbayar', 'banner/C18SeNq1X2ASV4451RJRKNx3DAWwWAxbAfq2qH0E.png', 70, '2019-08-30', '2019-08-30', '08:00:00', '10:00:00', 'choba', '2019-08-15', '2019-08-29', NULL, '2019-08-15 01:35:59', '2019-08-19 20:53:01', NULL);

-- --------------------------------------------------------

--
-- Struktur dari tabel `migrations`
--

CREATE TABLE `migrations` (
  `id` int(10) UNSIGNED NOT NULL,
  `migration` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `batch` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data untuk tabel `migrations`
--

INSERT INTO `migrations` (`id`, `migration`, `batch`) VALUES
(1, '2014_10_12_000000_create_users_table', 1),
(2, '2014_10_12_100000_create_password_resets_table', 1),
(4, '2019_05_18_152514_create_admins_table', 1),
(8, '2019_05_31_064829_create_campuses_table', 2),
(16, '2019_06_07_144055_create_events_table', 3),
(17, '2019_06_07_195057_create_tickets_table', 3),
(18, '2019_06_07_195220_create_transactions_table', 3),
(19, '2019_05_18_145832_create_organizers_table', 4),
(20, '2019_07_11_122333_create_ticket_codes_table', 5);

-- --------------------------------------------------------

--
-- Struktur dari tabel `organizers`
--

CREATE TABLE `organizers` (
  `id` int(10) UNSIGNED NOT NULL,
  `nama` varchar(150) COLLATE utf8mb4_unicode_ci NOT NULL,
  `email` varchar(100) COLLATE utf8mb4_unicode_ci NOT NULL,
  `password` varchar(100) COLLATE utf8mb4_unicode_ci NOT NULL,
  `nama_bank` varchar(100) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `nama_akun` varchar(100) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `no_rek` varchar(30) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `id_campus` int(10) UNSIGNED NOT NULL,
  `no_telp` varchar(16) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `foto_ktm` varchar(200) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `foto` varchar(200) COLLATE utf8mb4_unicode_ci DEFAULT 'foto/default.png',
  `email_verified_at` timestamp NULL DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  `deleted_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data untuk tabel `organizers`
--

INSERT INTO `organizers` (`id`, `nama`, `email`, `password`, `nama_bank`, `nama_akun`, `no_rek`, `id_campus`, `no_telp`, `foto_ktm`, `foto`, `email_verified_at`, `created_at`, `updated_at`, `deleted_at`) VALUES
(1, 'Hasim', 'hasim@gmail.com', '$2y$10$61uNar/mbP.uosTZ3RCaPOd9.Wsw4nPREpuY.pJ6NFfWY/v0bHpui', 'BRI', 'Hasim', '11223344', 1, '+6285225454111', 'foto_ktm/ktm01.jpg', 'foto/user01.png', '2019-07-08 19:54:44', '2019-07-08 19:54:44', '2019-07-09 15:26:33', NULL),
(2, 'Wahid', 'wahid@gmail.com', '$2y$10$61uNar/mbP.uosTZ3RCaPOd9.Wsw4nPREpuY.pJ6NFfWY/v0bHpui', 'BRI', 'Wahid', '11223355', 4, '+6285225454222', 'foto_ktm/ktm01.jpg', 'foto/user02.png', '2019-07-08 19:54:45', '2019-07-08 19:54:45', NULL, NULL),
(3, 'Dinda', 'dinda@gmail.com', '$2y$10$uj2DsZM42gS2WWEDO3Zr8e9C.mpCxTU243l2PO3TcUfJE81yy6HI2', 'BRI', 'Dinda', '11223366', 1, '+6285225454333', 'foto_ktm/ktm01.jpg', 'foto/user03.png', '2019-07-08 19:54:45', '2019-07-08 19:54:45', NULL, NULL),
(4, 'Abdul', 'abdul@gmail.com', '$2y$10$UcO4SiW3yP3h119BvumKEO2JBtt0vL/Bif9x/0aeqiJtaKxTSTdgG', 'BRI', 'Abdul', '11223377', 2, '+6285225454444', 'foto_ktm/ktm01.jpg', 'foto/user01.png', '2019-07-08 19:54:45', '2019-07-08 19:54:45', NULL, NULL),
(5, 'Wildan', 'wildan@gmail.com', '$2y$10$Vsy6MfIkc5u3jeCX156JyeLnt8Xa4p4EZYHEenrAUv0nv3nhUBixa', 'BRI', 'Wildan', '11223388', 5, '085225454555', 'foto_ktm/ktm01.jpg', 'foto/user02.png', '2019-07-08 19:54:46', '2019-07-08 19:54:46', NULL, NULL),
(6, 'Yayan', 'yayankubil26@gmail.com', '$2y$10$cy9Rc/FVPSdKcJnpIZZGFuDk7Tdeoa/n6Gp.xmdzpNBQw/M9TGCrO', 'BRI', 'Yayan', '11223399', 2, '+62895358534122', 'foto_ktm/ktm01.jpg', 'foto/user03.png', '2019-07-08 19:54:46', '2019-07-08 19:54:46', NULL, NULL),
(7, 'Rizal', 'rizal@gmail.com', '$2y$10$ihe//ydejNlYEatUwggrpOfNE63MHvMMrbeys9F3iMDHVI2UTe6gO', 'BRI', 'Rizal', '11223411', 2, '085225454777', 'foto_ktm/ktm01.jpg', 'foto/user01.png', '2019-07-08 19:54:46', '2019-07-08 19:54:46', NULL, NULL),
(8, 'Wawan', 'wawan@gmail.com', '$2y$10$BfDjidUzdIbk0zUZ6yOmHeonY993t6MMLTdH8sQ4M54Mc.yaC7QRu', 'BRI', 'Wawan', '11223422', 2, '+6285225454888', 'foto_ktm/ktm01.jpg', 'foto/user02.png', '2019-07-08 19:54:46', '2019-07-08 19:54:46', NULL, NULL),
(9, 'Hamzah', 'hamzah@gmail.com', '$2y$10$jwp3XEVhkOJi7HHa3T8BzuMX2t1vzDRCjdh8Ydf7r2sxKn.cscRK.', 'BRI', 'Hamzah', '11223433', 1, '+6285225454999', 'foto_ktm/ktm01.jpg', 'foto/user01.png', '2019-07-08 19:54:47', '2019-07-08 19:54:47', '2019-07-09 00:30:17', '2019-07-09 00:30:17'),
(10, 'Anita', 'anita@gmail.com', '$2y$10$JMHHpF8Gc/lq0EheNGE0regC9N28PWw1biYce1M7SwWdqNUhelSnK', 'BRI', 'Anita', '11223444', 1, '+6285225455000', 'foto_ktm/ktm01.jpg', 'foto/user03.png', '2019-07-08 19:54:47', '2019-07-08 19:54:47', NULL, NULL),
(11, 'Hanif', 'hanif@gmail.com', '$2y$10$I8cFVFnZNVbdzzLziYf7FuDFNyVax66DcL9lcttHJdWdAws2H71tC', 'BCA', 'Hanif', '11223455', 1, '+6285225455111', 'foto_ktm/ktm01.jpg', 'foto/user02.png', '2019-07-08 19:54:47', '2019-07-08 19:54:47', NULL, NULL),
(14, 'Samson', 'samson@gmail.com', '$2y$10$yvGkl6b7lhFL/QBetJv3cuPcKWufSjAaDzwnww1mdF8JztcC9Tv4O', 'BCA', 'Samson', '6767888895432898', 1, '+6285641499999', 'foto_ktm/ktm01.jpg', 'foto/589TTZJZyWLBtrV2f1ksmzb89e5QRew7EZSES1aS.jpeg', '2019-07-15 17:00:00', '2019-07-11 18:58:18', '2019-08-01 03:05:28', NULL),
(33, 'Siswati', 'siswati@gmail.com', '$2y$10$oey264fi4dlrnE5ta48T1uxj4hP2X6Wgh62hdCG4YwDv.NYlGWV1G', 'BCA', 'Siswati', '1234567890', 4, '+6281328754705', 'foto_ktm/pn8WePNQbMz7dRvmiR7YcLQUbVHsZBM9EwynBBRV.png', 'foto/default.png', '2019-08-01 00:00:00', '2019-08-01 14:20:54', '2019-08-01 14:23:57', NULL),
(34, 'Ariyanto', 'ariyantoariyanto67@gmail.com', '$2y$10$pqv9KulzxRngkZrh98wTiOaZ65UPzYUzWsoC2eFXDM/XRMHJ64EvS', 'BCA', 'Ariyanto', '1234567890', 4, '+6285647946744', 'foto_ktm/CnXnncDaNG2eUxXNfF61IvBzfNQ8VjrVIc23kkpN.jpeg', 'foto/default.png', '2019-08-01 00:00:00', '2019-08-01 14:42:40', '2019-08-01 14:45:11', NULL),
(35, 'Sigit Wijanarko', 'sigitwijanarko@gmail.com', '$2y$10$lE68GZYydPp/PW9Z4.FGluPxgcjm30kJ6UptcT7.cNzLd5McVQHmm', 'BCA', 'Sigit Wijanarko', '0987654321', 4, '+6281809563655', 'foto_ktm/ptxWVsgElClVLAAUYzcNrtIuayGIHRfmhFvCcC6T.png', 'foto/default.png', '2019-08-02 00:00:00', '2019-08-01 14:57:18', '2019-08-01 15:01:40', NULL),
(36, 'Melyyana Maulidda', 'melyyanamaulida@gmail.com', '$2y$10$tJ72SaFmFjZsv1J/JexFte4b4w38jVwUM.P46fN7SpronSFnNHHku', 'BCA', 'Melyana Maulidda', '1083434343', 1, '+6281272727375', 'foto_ktm/TOxTwoOQONxZIOux9HMhLiGeNPSBBVPOGzfVCCCy.jpeg', 'foto/default.png', '2019-08-01 00:00:00', '2019-08-01 16:02:28', '2019-08-01 16:10:20', NULL),
(37, 'Eka Fujiati', 'ekafujiati@gmail.com', '$2y$10$QO8ZO5vLjyzOuOI9XLYX8u3PrWt1a5/3dc7RVLHSnkbX0bXnB2exS', 'BCA', 'Eka Fujiati', '1234567770', 1, '+6281373432124', 'foto_ktm/TXpEmh0tGcNAFZgOFbChLWFtqTLOKWUaobc73CaA.jpeg', 'foto/default.png', '2019-08-02 00:00:00', '2019-08-01 18:29:36', '2019-08-01 18:31:43', NULL),
(39, 'Penyelenggara', 'agliket.kj@gmail.com', '$2y$10$BLZwAJ0oWiIwigOApkhKz.6wSUAGBNVRCJL.fqJMVZs1nv4IHUKZa', 'BCA', 'Anisa Pandu', '10000000000', 1, '+628127270000', 'foto_ktm/euUKc2BOQyauVy8E3HCmGZ1zdRlqNOl1j6Uo3qPt.png', 'foto/default.png', '2019-08-02 03:22:01', '2019-08-02 03:20:24', '2019-09-03 07:43:21', NULL);

-- --------------------------------------------------------

--
-- Struktur dari tabel `password_resets`
--

CREATE TABLE `password_resets` (
  `email` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `token` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Stand-in structure for view `pendapatan_event`
-- (Lihat di bawah untuk tampilan aktual)
--
CREATE TABLE `pendapatan_event` (
`id_event` int(10) unsigned
,`nama_event` varchar(200)
,`pendapatan_awal` decimal(42,0)
,`komisi` decimal(47,4)
,`pendapatan_akhir` decimal(48,4)
);

-- --------------------------------------------------------

--
-- Stand-in structure for view `pendapatan_organizer`
-- (Lihat di bawah untuk tampilan aktual)
--
CREATE TABLE `pendapatan_organizer` (
`id_organizer` int(10) unsigned
,`nama_organizer` varchar(150)
,`no_rek` varchar(30)
,`nama_akun_bank` varchar(100)
,`nama_bank` varchar(100)
,`pendapatan_awal` decimal(64,0)
,`komisi` decimal(65,4)
,`pendapatan_akhir` decimal(65,4)
);

-- --------------------------------------------------------

--
-- Struktur dari tabel `tickets`
--

CREATE TABLE `tickets` (
  `id` int(10) UNSIGNED NOT NULL,
  `id_event` int(10) UNSIGNED NOT NULL,
  `harga` int(11) NOT NULL,
  `harga_fee` int(11) NOT NULL,
  `kategori_tiket` varchar(9) COLLATE utf8mb4_unicode_ci NOT NULL,
  `stok_tiket` int(11) NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  `deleted_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data untuk tabel `tickets`
--

INSERT INTO `tickets` (`id`, `id_event`, `harga`, `harga_fee`, `kategori_tiket`, `stok_tiket`, `created_at`, `updated_at`, `deleted_at`) VALUES
(1, 1, 100000, 0, 'Berbayar', 43, NULL, '2019-07-16 02:59:41', NULL),
(2, 2, 50000, 0, 'Berbayar', 50, NULL, '2019-08-01 03:21:32', NULL),
(3, 3, 65000, 0, 'Berbayar', 50, NULL, NULL, NULL),
(4, 4, 45000, 0, 'Berbayar', 50, '2019-07-07 22:44:49', '2019-07-07 22:46:50', NULL),
(5, 5, 85000, 0, 'Berbayar', 80, '2019-07-08 20:29:59', '2019-07-08 20:29:59', NULL),
(6, 6, 10000, 0, 'Berbayar', 66, '2019-07-09 03:45:26', '2019-07-09 03:45:26', NULL),
(7, 7, 50000, 0, 'Berbayar', 48, '2019-07-16 02:52:17', '2019-07-17 02:54:17', NULL),
(8, 8, 899898, 0, 'Berbayar', 100, '2019-07-24 09:56:40', '2019-07-24 09:56:40', NULL),
(9, 9, 899898, 0, 'Berbayar', 100, '2019-07-24 09:57:28', '2019-07-24 09:57:28', NULL),
(10, 10, 899898, 0, 'Berbayar', 100, '2019-07-24 09:58:17', '2019-07-24 09:58:17', NULL),
(11, 11, 1, 0, 'Gratis', 10, '2019-07-31 09:08:03', '2019-07-31 09:09:02', NULL),
(12, 12, 10000, 10500, 'Berbayar', 498, '2019-07-31 11:17:56', '2019-07-31 14:39:27', NULL),
(13, 13, 150000, 0, 'Berbayar', 20, '2019-08-01 00:16:16', '2019-08-01 00:26:15', NULL),
(14, 14, 80000, 0, 'Berbayar', 10, '2019-08-01 00:24:59', '2019-08-01 00:24:59', NULL),
(15, 15, 100000, 105000, 'Berbayar', 38, '2019-08-01 00:31:42', '2019-08-14 02:33:00', NULL),
(16, 16, 50000, 52500, 'Berbayar', 15, '2019-08-01 00:37:32', '2019-08-01 00:54:56', NULL),
(17, 17, 100000, 0, 'Berbayar', 150, '2019-08-01 09:05:41', '2019-08-01 09:05:41', NULL),
(18, 18, 50000, 0, 'Berbayar', 50, '2019-08-01 09:10:18', '2019-08-01 10:08:46', NULL),
(19, 19, 70000, 0, 'Berbayar', 50, '2019-08-01 09:13:53', '2019-08-01 09:13:53', NULL),
(20, 20, 50000, 0, 'Berbayar', 50, '2019-08-01 09:15:24', '2019-08-01 09:44:45', NULL),
(21, 21, 60000, 63000, 'Berbayar', 45, '2019-08-01 09:29:46', '2019-08-02 04:04:09', NULL),
(22, 22, 150000, 0, 'Berbayar', 130, '2019-08-01 14:38:33', '2019-08-01 14:55:25', NULL),
(23, 23, 100000, 0, 'Berbayar', 400, '2019-08-01 14:54:00', '2019-08-01 14:54:00', NULL),
(24, 24, 100000, 0, 'Berbayar', 350, '2019-08-01 15:09:46', '2019-08-01 15:13:48', NULL),
(25, 25, 40000, 0, 'Berbayar', 20, '2019-08-01 18:17:18', '2019-08-01 18:17:18', NULL),
(26, 26, 100000, 0, 'Berbayar', 10, '2019-08-01 18:24:52', '2019-08-01 18:24:52', NULL),
(27, 27, 20000, 21000, 'Berbayar', 242, '2019-08-01 18:39:10', '2019-08-16 00:24:09', NULL),
(28, 28, 80000, 84000, 'Berbayar', 283, '2019-08-02 03:29:57', '2019-08-14 02:32:50', NULL),
(29, 29, 100000, 0, 'Berbayar', 100, '2019-08-08 11:18:33', '2019-08-08 11:18:33', NULL),
(30, 30, 100000, 105000, 'Berbayar', 67, '2019-08-15 01:35:59', '2019-08-19 22:10:25', NULL);

-- --------------------------------------------------------

--
-- Struktur dari tabel `ticket_codes`
--

CREATE TABLE `ticket_codes` (
  `id` int(10) UNSIGNED NOT NULL,
  `id_trans` int(10) UNSIGNED NOT NULL,
  `nama_peserta` varchar(100) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `kode_tiket` varchar(100) COLLATE utf8mb4_unicode_ci NOT NULL,
  `cek_in` timestamp NULL DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  `deleted_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data untuk tabel `ticket_codes`
--

INSERT INTO `ticket_codes` (`id`, `id_trans`, `nama_peserta`, `kode_tiket`, `cek_in`, `created_at`, `updated_at`, `deleted_at`) VALUES
(1, 14, NULL, 'EVC000100014T4IXMJ30MR', NULL, NULL, NULL, NULL),
(2, 15, NULL, 'EVC00010001594XIP4JVEA', NULL, NULL, NULL, NULL),
(3, 15, NULL, 'EVC000100015MVJZ8N0E70', NULL, NULL, NULL, NULL),
(4, 16, NULL, 'EVC000100016N2jUZSFGCT', NULL, NULL, NULL, NULL),
(5, 16, NULL, 'EVC000100016MZZHERD2T7', '2019-07-15 04:32:35', NULL, '2019-07-14 21:32:35', NULL),
(6, 17, NULL, 'EVC000100017THTQNTYY1S', '2019-07-14 21:05:17', NULL, '2019-07-14 21:05:17', NULL),
(7, 17, NULL, 'EVC0001000170XXQR2X34V', '2019-07-14 20:57:06', NULL, '2019-07-14 20:57:06', NULL),
(8, 17, NULL, 'EVC000100017GOLXGFYP91', '2019-07-15 04:22:31', NULL, '2019-07-14 21:22:31', NULL),
(9, 19, NULL, 'EVC000200019LO4HSUTOJD', NULL, NULL, NULL, NULL),
(10, 19, NULL, 'EVC00020001985ECCZQYJ6', NULL, NULL, NULL, NULL),
(11, 19, NULL, 'EVC000200019TRWPTC0S9S', NULL, NULL, NULL, NULL),
(12, 19, NULL, 'EVC000200019KQCEGGSZIP', NULL, NULL, NULL, NULL),
(13, 20, NULL, 'EVC000700020WTQRG4HPGN', NULL, NULL, NULL, NULL),
(14, 20, NULL, 'EVC000700020XHWDO6AJZZ', NULL, NULL, NULL, NULL),
(15, 20, NULL, 'EVC0007000209GYHODM3WH', NULL, NULL, NULL, NULL),
(16, 20, NULL, 'EVC000700020HYQJDF2HLZ', NULL, NULL, NULL, NULL),
(17, 21, NULL, 'EVC000700021XVBSTNFMKR', NULL, NULL, NULL, NULL),
(18, 21, NULL, 'EVC000700021EA6RKMPLAB', NULL, NULL, NULL, NULL),
(19, 21, NULL, 'EVC000700021JHA87SQTZV', NULL, NULL, NULL, NULL),
(20, 21, NULL, 'EVC000700021YP1JLOBJMK', NULL, NULL, NULL, NULL),
(21, 22, NULL, 'EVC000700022DYWCJHQEWT', NULL, NULL, NULL, NULL),
(22, 22, NULL, 'EVC0007000226NQX6PL9DY', NULL, NULL, NULL, NULL),
(23, 22, NULL, 'EVC000700022BAKSFG2Y4M', NULL, NULL, NULL, NULL),
(24, 22, NULL, 'EVC0007000226YB6SIMFEY', NULL, NULL, NULL, NULL),
(25, 22, NULL, 'EVC000700022IOEWWSAVHL', NULL, NULL, NULL, NULL),
(26, 23, NULL, 'EVC000700023RMUCOQ4C8N', NULL, NULL, NULL, NULL),
(27, 23, NULL, 'EVC000700023GXHT3KXWSK', NULL, NULL, NULL, NULL),
(28, 26, NULL, 'EVC001200026UV3SAJ2454', NULL, NULL, NULL, NULL),
(29, 26, NULL, 'EVC001200026E59V9LITYD', NULL, NULL, NULL, NULL),
(30, 28, NULL, 'EVC001600028NAN91Z7RHZ', NULL, NULL, NULL, NULL),
(31, 28, NULL, 'EVC001600028GNVDRX0IKX', NULL, NULL, NULL, NULL),
(32, 28, NULL, 'EVC001600028UVHTLKGFPH', NULL, NULL, NULL, NULL),
(33, 28, NULL, 'EVC001600028DMGLEZF1FO', NULL, NULL, NULL, NULL),
(34, 28, NULL, 'EVC001600028CLG7NRGDGH', NULL, NULL, NULL, NULL),
(35, 38, NULL, 'EVC002700038N0L2LPLNTB', NULL, NULL, NULL, NULL),
(36, 38, NULL, 'EVC002700038DUTIRQ131Y', NULL, NULL, NULL, NULL),
(37, 38, NULL, 'EVC002700038LN9XRUQB5T', NULL, NULL, NULL, NULL),
(38, 38, NULL, 'EVC002700038Y3XKYHMSHC', NULL, NULL, NULL, NULL),
(39, 38, NULL, 'EVC002700038TBYIZ9N6J2', NULL, NULL, NULL, NULL),
(40, 41, NULL, 'EVC002800041DPYVE7KO2N', '2019-08-02 03:52:37', NULL, '2019-08-02 03:52:37', NULL),
(41, 41, NULL, 'EVC002800041IBGASS5NAY', NULL, NULL, NULL, NULL),
(42, 41, NULL, 'EVC00280004191EZTEUDKW', NULL, NULL, NULL, NULL),
(43, 41, NULL, 'EVC0028000418GU1C5QZR4', NULL, NULL, NULL, NULL),
(44, 41, NULL, 'EVC002800041ZNFFNQMXLW', NULL, NULL, NULL, NULL),
(45, 43, NULL, 'EVC002100043LG3NLTVCI9', NULL, NULL, NULL, NULL),
(46, 43, NULL, 'EVC002100043DF61UGASRM', NULL, NULL, NULL, NULL),
(47, 43, NULL, 'EVC002100043YCX6TVGBXM', NULL, NULL, NULL, NULL),
(48, 43, NULL, 'EVC00210004376IHXXPKHQ', NULL, NULL, NULL, NULL),
(49, 43, NULL, 'EVC002100043QPUW6WFKLJ', NULL, NULL, NULL, NULL),
(50, 42, NULL, 'EVC002800042MB95N27EWO', NULL, NULL, NULL, NULL),
(51, 42, NULL, 'EVC002800042EEZBBXHYLS', NULL, NULL, NULL, NULL),
(52, 27, NULL, 'EVC001500027UOGLW3JWPB', NULL, NULL, NULL, NULL),
(53, 27, NULL, 'EVC00150002728V5O5WIP3', NULL, NULL, NULL, NULL),
(54, 46, NULL, 'EVC002700046TG0H46ZD3K', NULL, NULL, NULL, NULL),
(55, 46, NULL, 'EVC0027000464NYALREQSY', NULL, NULL, NULL, NULL),
(56, 48, NULL, 'EVC003000048QXP71HOYZU', '2019-08-16 15:31:02', NULL, '2019-08-16 08:31:02', NULL),
(57, 48, NULL, 'EVC0030000484KNWJVTZNK', '2019-08-16 15:31:11', NULL, '2019-08-16 08:31:11', NULL),
(58, 48, NULL, 'EVC003000048TIJFWAPAGA', '2019-08-16 15:31:17', NULL, '2019-08-16 08:31:17', NULL),
(59, 47, NULL, 'EVC002700047YEAMLQYTDW', NULL, NULL, NULL, NULL),
(60, 49, 'Saeful Bahri', 'EVC003000049GQGJ6N4DAL', NULL, NULL, NULL, NULL),
(61, 49, 'Gilang Primandha', 'EVC003000049TX8LVLWQHG', NULL, NULL, NULL, NULL),
(62, 49, 'wakwaw1', 'EVC003000049EAZPLWETEP', NULL, NULL, NULL, NULL),
(63, 49, 'wakwaw2', 'EVC003000049Z3ZDOXQGYU', NULL, NULL, NULL, NULL),
(64, 49, 'wakwaw3', 'EVC003000049XLYUINSRVU', NULL, NULL, NULL, NULL),
(65, 50, 'Saeful', 'EVC003000050L6Y9KAC0HD', NULL, NULL, NULL, NULL),
(66, 50, 'Bahri', 'EVC003000050X8QSXIJNJC', NULL, NULL, NULL, NULL),
(67, 50, 'wakwaw1', 'EVC0030000506ZJOQ70NNX', NULL, NULL, NULL, NULL);

-- --------------------------------------------------------

--
-- Struktur dari tabel `transactions`
--

CREATE TABLE `transactions` (
  `id` int(10) UNSIGNED NOT NULL,
  `id_user` int(10) UNSIGNED NOT NULL,
  `id_event` int(10) UNSIGNED NOT NULL,
  `id_tiket` int(10) UNSIGNED NOT NULL,
  `jumlah` int(2) NOT NULL,
  `tgl_transaksi` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP,
  `bukti_bayar` varchar(200) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `nm_1` varchar(100) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `nm_2` varchar(100) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `nm_3` varchar(100) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `nm_4` varchar(100) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `nm_5` varchar(100) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `verifikasi` int(1) NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  `deleted_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data untuk tabel `transactions`
--

INSERT INTO `transactions` (`id`, `id_user`, `id_event`, `id_tiket`, `jumlah`, `tgl_transaksi`, `bukti_bayar`, `nm_1`, `nm_2`, `nm_3`, `nm_4`, `nm_5`, `verifikasi`, `created_at`, `updated_at`, `deleted_at`) VALUES
(26, 13, 12, 12, 2, '2019-07-31 14:38:24', '76ai8h7ue6dte4dtdizv.png', NULL, NULL, NULL, NULL, NULL, 2, NULL, '2019-07-31 14:39:27', NULL),
(27, 40, 15, 15, 2, '2019-08-01 00:42:23', '0hvvxcd83uvqc43xaixb.png', NULL, NULL, NULL, NULL, NULL, 2, NULL, '2019-08-14 02:33:00', NULL),
(28, 40, 16, 16, 5, '2019-08-01 00:53:51', 'attb2fn2eknkf28jynx3.png', NULL, NULL, NULL, NULL, NULL, 2, NULL, '2019-08-01 00:54:56', NULL),
(29, 40, 14, 14, 1, '2019-08-01 00:56:39', NULL, NULL, NULL, NULL, NULL, NULL, 0, NULL, NULL, NULL),
(30, 40, 13, 13, 2, '2019-08-01 00:57:09', NULL, NULL, NULL, NULL, NULL, NULL, 3, NULL, NULL, NULL),
(31, 40, 18, 18, 5, '2019-08-01 12:50:05', NULL, NULL, NULL, NULL, NULL, NULL, 3, NULL, NULL, NULL),
(32, 40, 24, 24, 2, '2019-08-01 15:24:22', NULL, NULL, NULL, NULL, NULL, NULL, 3, NULL, NULL, NULL),
(33, 40, 23, 23, 4, '2019-08-01 15:24:29', NULL, NULL, NULL, NULL, NULL, NULL, 3, NULL, NULL, NULL),
(34, 40, 13, 13, 1, '2019-08-01 15:27:52', NULL, NULL, NULL, NULL, NULL, NULL, 3, NULL, NULL, NULL),
(35, 40, 27, 27, 2, '2019-08-01 21:56:29', NULL, NULL, NULL, NULL, NULL, NULL, 3, NULL, NULL, NULL),
(36, 40, 27, 27, 5, '2019-08-01 21:56:32', NULL, NULL, NULL, NULL, NULL, NULL, 0, NULL, NULL, NULL),
(37, 40, 27, 27, 2, '2019-08-02 00:29:30', NULL, NULL, NULL, NULL, NULL, NULL, 0, NULL, NULL, NULL),
(38, 14, 27, 27, 5, '2019-08-02 01:34:58', '8v0uw8vhcjvv6aijgkjv.png', NULL, NULL, NULL, NULL, NULL, 2, NULL, '2019-08-02 01:38:55', NULL),
(39, 42, 27, 27, 2, '2019-08-02 02:24:01', NULL, NULL, NULL, NULL, NULL, NULL, 0, NULL, NULL, NULL),
(40, 40, 28, 28, 2, '2019-08-02 03:31:25', NULL, 'Dio', 'Zaky', NULL, NULL, NULL, 0, NULL, NULL, NULL),
(41, 40, 28, 28, 5, '2019-08-02 03:31:52', 'pxmazx980jwi5z1t2pk2.png', 'dio', 'zaky', 'agus', 'sepul', 'gilang', 2, NULL, '2019-08-02 03:33:04', NULL),
(42, 40, 28, 28, 2, '2019-08-02 03:55:10', 'spv31a48d4esvyxiqw7n.png', 'Dio', 'Zaky', NULL, NULL, NULL, 2, NULL, '2019-08-14 02:32:50', NULL),
(43, 40, 21, 21, 5, '2019-08-02 04:03:49', 'kvhifqjk2exughejpqy2.png', NULL, NULL, NULL, NULL, NULL, 2, NULL, '2019-08-02 04:04:09', NULL),
(44, 13, 27, 27, 1, '2019-08-05 09:20:32', NULL, NULL, NULL, NULL, NULL, NULL, 0, NULL, NULL, NULL),
(45, 13, 27, 27, 1, '2019-08-05 09:21:01', NULL, NULL, NULL, NULL, NULL, NULL, 0, NULL, NULL, NULL),
(46, 13, 27, 27, 2, '2019-08-05 09:21:01', NULL, NULL, NULL, NULL, NULL, NULL, 2, NULL, '2019-08-14 03:54:17', NULL),
(47, 13, 27, 27, 1, '2019-08-05 09:21:01', NULL, NULL, NULL, NULL, NULL, NULL, 2, NULL, '2019-08-16 00:24:09', NULL),
(48, 13, 30, 30, 3, '2019-08-05 09:21:01', 'kvhifqjk2exughejpqy2.png', 'Saeful Bahri', 'Gilang Primandha', 'Bayu Adi Prasetiyo', NULL, NULL, 2, NULL, '2019-08-15 21:49:02', NULL),
(49, 13, 30, 30, 5, '2019-08-05 09:21:01', 'kvhifqjk2exughejpqy2.png', 'Saeful Bahri', 'Gilang Primandha', 'wakwaw1', 'wakwaw2', 'wakwaw3', 2, NULL, '2019-08-16 06:44:09', NULL),
(50, 13, 30, 30, 3, '2019-08-05 09:21:01', 'kvhifqjk2exughejpqy2.png', 'Saeful', 'Bahri', 'wakwaw1', '', '', 2, NULL, '2019-08-19 22:10:25', NULL);

-- --------------------------------------------------------

--
-- Struktur dari tabel `transaction_offlines`
--

CREATE TABLE `transaction_offlines` (
  `id` int(10) UNSIGNED NOT NULL,
  `id_organizer` int(10) UNSIGNED NOT NULL,
  `id_event` int(10) UNSIGNED NOT NULL,
  `jumlah_beli` int(6) NOT NULL,
  `tgl_beli` datetime NOT NULL,
  `created_at` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP,
  `updated_at` timestamp NULL DEFAULT NULL,
  `deleted_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data untuk tabel `transaction_offlines`
--

INSERT INTO `transaction_offlines` (`id`, `id_organizer`, `id_event`, `jumlah_beli`, `tgl_beli`, `created_at`, `updated_at`, `deleted_at`) VALUES
(1, 39, 28, 10, '2019-08-09 15:54:40', '2019-08-09 01:54:40', '2019-08-09 01:54:40', NULL),
(2, 39, 30, 20, '2019-08-16 14:19:01', '2019-08-16 00:19:01', '2019-08-16 00:19:01', NULL),
(3, 39, 30, 10, '2019-08-17 08:38:52', '2019-08-16 18:38:52', '2019-08-16 18:38:52', NULL);

-- --------------------------------------------------------

--
-- Struktur dari tabel `users`
--

CREATE TABLE `users` (
  `id` int(10) UNSIGNED NOT NULL,
  `nama` varchar(250) COLLATE utf8mb4_unicode_ci NOT NULL,
  `email` varchar(100) COLLATE utf8mb4_unicode_ci NOT NULL,
  `password` varchar(100) COLLATE utf8mb4_unicode_ci NOT NULL,
  `alamat` varchar(250) COLLATE utf8mb4_unicode_ci NOT NULL,
  `jenis_klmn` varchar(9) COLLATE utf8mb4_unicode_ci NOT NULL,
  `no_telp` varchar(15) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `foto` varchar(200) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `verifikasi` tinyint(1) NOT NULL DEFAULT '0',
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  `deleted_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data untuk tabel `users`
--

INSERT INTO `users` (`id`, `nama`, `email`, `password`, `alamat`, `jenis_klmn`, `no_telp`, `foto`, `verifikasi`, `created_at`, `updated_at`, `deleted_at`) VALUES
(1, 'Hasim', 'hasim@gmail.com', '$2y$10$CTaTNbWj5DL6HMtBhmmhqulFTzCnUi7EhWwTXQ7d68N1e7HPUo2sW', 'Brebes', 'Laki-laki', '+628522545411', 'user.png', 1, '2019-06-04 10:24:57', '2019-06-04 11:38:20', NULL),
(2, 'Hasan', 'hasan@gmail.com', '$2y$10$D1lSujXXHFAaij08Am057.773rnbFLRXNMWfpbJfrT5TCLOkH2vEu', 'Tegal', 'Laki-laki', '+6285225454112', 'user.png', 1, '2019-06-04 10:24:57', NULL, NULL),
(3, 'Ujank', 'ujank@gmail.com', '$2y$10$tuKafv/gzMvsyinp/JJrweRzN6eU8J2zpXc2dskDio1nH5tRLJVTy', 'Brebes', 'Laki-laki', '+6285225454113', 'user.png', 1, '2019-06-04 10:24:57', NULL, NULL),
(4, 'Echa', 'echa@gmail.com', '$2y$10$GQCoz0MYC/9ZBwg4kmSA3egcT4EAK2qtjyqKBQwPK6wJWOIgDJB7y', 'Pemalang', 'Perempuan', '+6285225454114', 'user.png', 1, '2019-06-04 10:24:57', NULL, NULL),
(5, 'Siska', 'siska@gmail.com', '$2y$10$OdQ.Tbo.NKZgiJ.pxUo1s.RAR/OvfyOHMv0agf9X.TOdvwA.MTfke', 'Brebes', 'Perempuan', '+6285225454115', 'user.png', 1, '2019-06-04 10:24:58', NULL, NULL),
(6, 'Nussa', 'nussa@gmail.com', '$2y$10$6Gjg9HhbOlENma9qcBaQMePNMBX4J/sBJOZq37naypzlLwwPCZrS.', 'Jakarta', 'Laki-laki', '+6285225454116', 'user.png', 1, '2019-06-04 10:24:58', NULL, NULL),
(7, 'Rara', 'rara@gmail.com', '$2y$10$fy4FChGj73G9OnPWL1liMO1knIt4Dliw1afJGJGnJEtWUFs4c536a', 'Jakarta', 'Perempuan', '+6285225454117', 'user.png', 1, '2019-06-04 10:24:58', '2019-06-20 20:40:00', '2019-06-20 20:40:00'),
(9, 'dany', 'ahmadzakyammardany8@gmail.com', 'a665a45920422f9d417e4867efdc4fb8a04a1f3fff1fa07e998e86f7f7a27ae3', 'Pemalang', 'Laki-Laki', '', NULL, 0, NULL, NULL, NULL),
(13, 'dany', 'dany@gmail.com', 'a665a45920422f9d417e4867efdc4fb8a04a1f3fff1fa07e998e86f7f7a27ae3', 'Pemalang', 'Laki-Laki', '+6287788784321', NULL, 1, NULL, NULL, NULL),
(14, 'dek dany', 'ahmadzakyammardany7@gmail.com', 'a665a45920422f9d417e4867efdc4fb8a04a1f3fff1fa07e998e86f7f7a27ae3', 'Pemalang', 'Laki-Laki', '087788784300', NULL, 1, NULL, NULL, NULL),
(19, 'diqi', 'diqisuprianto@gmail.com', 'e4e75d0568f1c2af805ae887b7a9d09a7ee4a2bf1383291e0093023b6493f1ed', 'pemalang', 'laki - la', NULL, NULL, 1, NULL, NULL, NULL),
(20, 'syeh', 'sholikhun21@gmail.com', '8d969eef6ecad3c29a3a629280e686cf0c3f5d5a86aff3ca12020c923adc6c92', 'brebes', 'laki-laki', NULL, NULL, 1, NULL, NULL, NULL),
(21, 'gilang', 'gilangprimandha23@gmail.com', 'd96c797aec2a1310f0b5913f503f7b96e573d7b0120f942b352e02784bb16ad4', 'jl.mangga rt 02/rw 04 desa procot', 'laki-laki', NULL, NULL, 1, NULL, NULL, NULL),
(22, 'Muhammad zulfikar', 'zulfikar170897@gmail.com', '57030001347c9ba3a9db17a07fae8e629b78d2295cf63a19a30d15de739e969e', 'tegal', 'laki-laki', NULL, NULL, 1, NULL, NULL, NULL),
(24, 'sulthan falah', 'sultanfalah09@gmail.com', '02cf1cce1b9414df96996756be90dc9f025acfd806a060a07ae5bcf5b133fe12', 'Balapulang', 'Laki Laki', NULL, NULL, 1, NULL, NULL, NULL),
(25, 'kimball', 'kimballcho.id@gmail.com', 'ef797c8118f02dfb649607dd5d3f8c7623048c9c063d532cc95c5ed7a898a64f', 'Boulevard Anggrek No.20', 'Laki-Laki', NULL, NULL, 1, NULL, NULL, NULL),
(26, 'faisal firdaus', 'faisalfirdaus910@gmail.com', '8d969eef6ecad3c29a3a629280e686cf0c3f5d5a86aff3ca12020c923adc6c92', 'peslor', 'laki-laki', NULL, NULL, 1, NULL, NULL, NULL),
(27, 'aguzri10', 'aguzri10@gmail.com', 'ef797c8118f02dfb649607dd5d3f8c7623048c9c063d532cc95c5ed7a898a64f', 'Sidapurna', 'Laki-Laki', '083144855420', NULL, 1, NULL, NULL, NULL),
(28, 'ihwan arif fandi', 'ihwanarifandi@gmail.com', '8d969eef6ecad3c29a3a629280e686cf0c3f5d5a86aff3ca12020c923adc6c92', 'purwokerto', 'Laki-Laki', NULL, NULL, 1, NULL, NULL, NULL),
(29, 'dhikri', 'ibnudickry@gmail.com', '8d969eef6ecad3c29a3a629280e686cf0c3f5d5a86aff3ca12020c923adc6c92', 'Pemalang', 'Laki-Laki', NULL, NULL, 0, NULL, NULL, NULL),
(30, 'daffa.muhtar', 'daffa.muhtar1@gmail.com', 'ceb7ab7561b538dc4401fe7983d035aab5e39466c2b3dc736959e70bfc5f86c9', 'Mejasem', 'Laki laki', NULL, NULL, 0, NULL, NULL, NULL),
(31, 'fitria tahta alfina', 'fitria.tahta07@gmail.com', 'a05e292f4c7de29fa04da3f80c61096397abcf16e4fe40ec0bdff86e0d3b831c', 'kademangaran', 'perempuan', NULL, NULL, 1, NULL, NULL, NULL),
(32, 'Dina Wahyuni', 'dinawahyuni440@gmail.com', '4e2e269ba516629c0f5abf6ff4f686730a2bd477b1ee51d6d69ee3ea344ed80a', 'lebaksiu', 'perempuan', NULL, NULL, 1, NULL, NULL, NULL),
(39, 'kimball', 'bayu28.bap@gmail.com', 'ef797c8118f02dfb649607dd5d3f8c7623048c9c063d532cc95c5ed7a898a64f', 'tegal', 'Laki-Laki', NULL, NULL, 1, NULL, NULL, NULL),
(40, 'coeg', 'coegwakwaw105@gmail.com', '8d969eef6ecad3c29a3a629280e686cf0c3f5d5a86aff3ca12020c923adc6c92', 'Brebes', 'Laki-Laki', '0877887843112', NULL, 1, NULL, NULL, NULL),
(41, 'adi pati', 'adipatilawliet@gmail.com', '460ec873543da3f549867aeaa0abc7c774d5979d496fd11e43d306451819ce42', 'Brebes', 'Laki-Laki', NULL, NULL, 0, NULL, '2019-08-13 21:45:57', NULL),
(42, 'Ahmad Zaky', 'duniaku2509@gmail.com', '8d969eef6ecad3c29a3a629280e686cf0c3f5d5a86aff3ca12020c923adc6c92', 'Pemalang', 'Laki-Laki', '08778878430', NULL, 1, NULL, NULL, NULL),
(43, 'ridho', 'ridhogmaulana@gmail.com', 'ef797c8118f02dfb649607dd5d3f8c7623048c9c063d532cc95c5ed7a898a64f', 'kupu', 'Laki-Laki', NULL, NULL, 0, NULL, NULL, NULL);

-- --------------------------------------------------------

--
-- Struktur untuk view `pendapatan_event`
--
DROP TABLE IF EXISTS `pendapatan_event`;

CREATE ALGORITHM=UNDEFINED DEFINER=`root`@`localhost` SQL SECURITY DEFINER VIEW `pendapatan_event`  AS  select `transactions`.`id_event` AS `id_event`,`events`.`nama_event` AS `nama_event`,(sum(`transactions`.`jumlah`) * `tickets`.`harga_fee`) AS `pendapatan_awal`,(sum(`transactions`.`jumlah`) * ((`tickets`.`harga` * 5) / 100)) AS `komisi`,((sum(`transactions`.`jumlah`) * `tickets`.`harga_fee`) - (sum(`transactions`.`jumlah`) * ((`tickets`.`harga` * 5) / 100))) AS `pendapatan_akhir` from ((`transactions` join `events` on((`transactions`.`id_event` = `events`.`id`))) join `tickets` on((`transactions`.`id_tiket` = `tickets`.`id`))) where (`transactions`.`verifikasi` = 2) group by `transactions`.`id_event` ;

-- --------------------------------------------------------

--
-- Struktur untuk view `pendapatan_organizer`
--
DROP TABLE IF EXISTS `pendapatan_organizer`;

CREATE ALGORITHM=UNDEFINED DEFINER=`root`@`localhost` SQL SECURITY DEFINER VIEW `pendapatan_organizer`  AS  select `organizers`.`id` AS `id_organizer`,`organizers`.`nama` AS `nama_organizer`,`organizers`.`no_rek` AS `no_rek`,`organizers`.`nama_akun` AS `nama_akun_bank`,`organizers`.`nama_bank` AS `nama_bank`,sum(`pendapatan_event`.`pendapatan_awal`) AS `pendapatan_awal`,sum(`pendapatan_event`.`komisi`) AS `komisi`,sum(`pendapatan_event`.`pendapatan_akhir`) AS `pendapatan_akhir` from ((`pendapatan_event` join `events` on((`pendapatan_event`.`id_event` = `events`.`id`))) join `organizers` on((`organizers`.`id` = `events`.`id_organizer`))) group by `organizers`.`id` ;

--
-- Indexes for dumped tables
--

--
-- Indexes for table `admins`
--
ALTER TABLE `admins`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `admins_email_unique` (`email`);

--
-- Indexes for table `campuses`
--
ALTER TABLE `campuses`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `events`
--
ALTER TABLE `events`
  ADD PRIMARY KEY (`id`),
  ADD KEY `events_id_organizer_foreign` (`id_organizer`),
  ADD KEY `events_id_campus_foreign` (`id_campus`);

--
-- Indexes for table `migrations`
--
ALTER TABLE `migrations`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `organizers`
--
ALTER TABLE `organizers`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `organizers_email_unique` (`email`),
  ADD UNIQUE KEY `organizers_no_telp_unique` (`no_telp`),
  ADD KEY `organizers_id_campus_foreign_key` (`id_campus`);

--
-- Indexes for table `password_resets`
--
ALTER TABLE `password_resets`
  ADD KEY `password_resets_email_index` (`email`);

--
-- Indexes for table `tickets`
--
ALTER TABLE `tickets`
  ADD PRIMARY KEY (`id`),
  ADD KEY `tickets_id_event_foreign` (`id_event`);

--
-- Indexes for table `ticket_codes`
--
ALTER TABLE `ticket_codes`
  ADD PRIMARY KEY (`id`),
  ADD KEY `ticket_codes_id_trans_foreign` (`id_trans`);

--
-- Indexes for table `transactions`
--
ALTER TABLE `transactions`
  ADD PRIMARY KEY (`id`),
  ADD KEY `transactions_id_user_foreign` (`id_user`),
  ADD KEY `transactions_id_tiket_foreign` (`id_tiket`),
  ADD KEY `id_event` (`id_event`);

--
-- Indexes for table `transaction_offlines`
--
ALTER TABLE `transaction_offlines`
  ADD PRIMARY KEY (`id`),
  ADD KEY `id_organizer` (`id_organizer`),
  ADD KEY `id_event` (`id_event`);

--
-- Indexes for table `users`
--
ALTER TABLE `users`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `users_email_unique` (`email`),
  ADD UNIQUE KEY `users_no_telp_unique` (`no_telp`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `admins`
--
ALTER TABLE `admins`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT for table `campuses`
--
ALTER TABLE `campuses`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=20;

--
-- AUTO_INCREMENT for table `events`
--
ALTER TABLE `events`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=31;

--
-- AUTO_INCREMENT for table `migrations`
--
ALTER TABLE `migrations`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=21;

--
-- AUTO_INCREMENT for table `organizers`
--
ALTER TABLE `organizers`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=40;

--
-- AUTO_INCREMENT for table `tickets`
--
ALTER TABLE `tickets`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=31;

--
-- AUTO_INCREMENT for table `ticket_codes`
--
ALTER TABLE `ticket_codes`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=68;

--
-- AUTO_INCREMENT for table `transactions`
--
ALTER TABLE `transactions`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=51;

--
-- AUTO_INCREMENT for table `transaction_offlines`
--
ALTER TABLE `transaction_offlines`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- Ketidakleluasaan untuk tabel pelimpahan (Dumped Tables)
--

--
-- Ketidakleluasaan untuk tabel `transaction_offlines`
--
ALTER TABLE `transaction_offlines`
  ADD CONSTRAINT `transaction_offlines_ibfk_1` FOREIGN KEY (`id_organizer`) REFERENCES `organizers` (`id`) ON DELETE NO ACTION ON UPDATE NO ACTION,
  ADD CONSTRAINT `transaction_offlines_ibfk_2` FOREIGN KEY (`id_event`) REFERENCES `events` (`id`) ON DELETE NO ACTION ON UPDATE NO ACTION;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
