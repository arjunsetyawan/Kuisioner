-- phpMyAdmin SQL Dump
-- version 5.0.4
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Sep 15, 2023 at 02:44 PM
-- Server version: 10.4.17-MariaDB
-- PHP Version: 8.0.2

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `kuisioner`
--

-- --------------------------------------------------------

--
-- Table structure for table `ajuan`
--

CREATE TABLE `ajuan` (
  `id` int(11) NOT NULL,
  `nama` varchar(255) NOT NULL,
  `email` varchar(255) NOT NULL,
  `role_id` int(255) NOT NULL,
  `status` varchar(255) NOT NULL,
  `status_ajuan` varchar(255) NOT NULL,
  `created_at` datetime NOT NULL,
  `updated_at` datetime NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `ajuan`
--

INSERT INTO `ajuan` (`id`, `nama`, `email`, `role_id`, `status`, `status_ajuan`, `created_at`, `updated_at`) VALUES
(23, 'severo_', 'severozchannel13@gmail.com', 2, 'Inactive', 'Akun telah dibuat', '2023-06-12 12:20:16', '2023-06-15 20:26:03'),
(24, 'Sandra', 'desandrahilma@student.uns.ac.id', 2, 'Inactive', 'Akun telah dibuat', '2023-07-06 15:44:57', '2023-07-20 09:37:10'),
(25, 'Devi Anggita', 'arjunsetyawan17@gmail.com', 2, 'Inactive', 'Akun telah dibuat', '2023-07-07 07:05:43', '2023-07-07 07:14:40'),
(29, 'Ksatria', 'harjunosetyawan@student.uns.ac.id', 2, 'Inactive', 'Menunggu Admin', '2023-09-01 11:42:04', '2023-09-01 11:42:04');

-- --------------------------------------------------------

--
-- Table structure for table `divisi`
--

CREATE TABLE `divisi` (
  `id` int(11) NOT NULL,
  `nama_divisi` varchar(255) NOT NULL,
  `kode_divisi` varchar(100) NOT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `divisi`
--

INSERT INTO `divisi` (`id`, `nama_divisi`, `kode_divisi`, `updated_at`, `created_at`) VALUES
(2, 'Software Quality Assurance', 'SQA', '2023-05-08 10:48:25', '2023-04-28 08:02:53'),
(3, 'Backend', 'BE', '2023-04-28 08:03:43', '2023-04-28 08:03:43'),
(4, 'Frontend', 'FE', '2023-04-28 08:03:48', '2023-04-28 08:03:48'),
(6, 'API Tester', 'API', '2023-07-02 21:33:39', '2023-05-08 10:48:35');

-- --------------------------------------------------------

--
-- Table structure for table `hasil`
--

CREATE TABLE `hasil` (
  `id` int(11) NOT NULL,
  `karyawan_id` bigint(20) NOT NULL,
  `karyawan_id2` bigint(20) NOT NULL,
  `tanggal_pengisian` datetime NOT NULL,
  `attitude` int(11) NOT NULL,
  `kedisiplinan` int(100) NOT NULL,
  `inisiatif` int(100) NOT NULL,
  `leadership` int(100) NOT NULL,
  `kerjasama` int(100) NOT NULL,
  `kehadiran` int(100) NOT NULL,
  `tanggungjawab` int(100) NOT NULL,
  `komunikasi` int(100) NOT NULL,
  `value_essay` varchar(1000) COLLATE utf8mb4_unicode_ci NOT NULL,
  `periode_id` int(100) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `hasil`
--

INSERT INTO `hasil` (`id`, `karyawan_id`, `karyawan_id2`, `tanggal_pengisian`, `attitude`, `kedisiplinan`, `inisiatif`, `leadership`, `kerjasama`, `kehadiran`, `tanggungjawab`, `komunikasi`, `value_essay`, `periode_id`) VALUES
(2, 28, 1, '2023-06-11 15:20:01', 12, 12, 12, 12, 10, 10, 12, 12, 'Mohon untuk menjaga performa kinerja anda dan selalu mengevaluasi segala kekurangan anda', 8),
(10, 1, 50, '2023-06-26 10:28:35', 8, 6, 9, 11, 6, 7, 8, 4, 'Coba untuk meningkatkan lagi kinerja kamu', 9),
(11, 28, 33, '2023-06-27 05:36:43', 7, 11, 8, 8, 6, 6, 6, 8, 'Mohon untuk tingkatkan lagi', 9),
(12, 1, 51, '2023-07-04 12:05:55', 11, 8, 9, 9, 9, 9, 9, 9, 'mohon tingkatkan lagi kinerjanya', 8),
(15, 51, 1, '2023-07-05 15:41:58', 8, 2, 6, 12, 5, 6, 9, 10, 'Coba tingkatkan lagi', 8),
(16, 51, 1, '2023-07-05 15:46:35', 12, 7, 8, 5, 8, 9, 10, 6, 'Tingkatkan yaa', 9),
(17, 50, 1, '2023-07-05 15:48:41', 5, 2, 12, 10, 6, 8, 11, 7, 'Semangat', 8),
(19, 33, 28, '2023-07-06 18:58:47', 8, 9, 7, 10, 7, 7, 5, 6, 'Mohon tingkatkan kinerja andaa', 8),
(20, 33, 28, '2023-07-06 18:59:49', 7, 7, 7, 9, 9, 8, 9, 11, 'tingkatkan lagi yaa', 9),
(21, 50, 1, '2023-07-06 19:15:25', 7, 7, 9, 11, 11, 11, 10, 11, 'semangat terus', 9),
(32, 28, 61, '2023-09-01 11:49:09', 10, 10, 9, 9, 8, 9, 9, 6, 'Semangat dan tingkatkan lagi', 9);

-- --------------------------------------------------------

--
-- Table structure for table `karyawan`
--

CREATE TABLE `karyawan` (
  `id` int(11) NOT NULL,
  `nama` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `tanggal_masuk` date NOT NULL,
  `tempat_lahir` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `tanggal_lahir` date NOT NULL,
  `gender` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `alamat` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `divisi_id` int(11) NOT NULL,
  `no_telp` varchar(50) COLLATE utf8mb4_unicode_ci NOT NULL,
  `user_id` bigint(20) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `karyawan`
--

INSERT INTO `karyawan` (`id`, `nama`, `tanggal_masuk`, `tempat_lahir`, `tanggal_lahir`, `gender`, `alamat`, `divisi_id`, `no_telp`, `user_id`) VALUES
(7, 'Harjuno Setyawan', '2023-05-13', 'Kediri', '2023-05-12', 'Laki-Laki', 'Jln Rinjani Barat 1 No 18 Mojosongo', 2, '082261287925', 1),
(8, 'Arjun Setyawan', '2023-05-29', 'Surakarta', '2023-06-24', 'Laki-Laki', 'Jln Rinjani Barat 1 No 15', 3, '34832905853', 28),
(9, 'Devanza Priyansah', '2023-06-20', 'Surakarta', '2023-06-19', 'Laki-Laki', 'Kediri', 3, '09432940329', 33),
(11, 'Severo Adhy', '2023-07-16', 'Surakarta', '2023-07-05', 'Laki-Laki', 'Colomadu', 2, '082382323525', 51),
(12, 'Muhammad Taufiq', '2023-07-11', 'Batam', '2023-07-09', 'Laki-Laki', 'Batam no 15', 2, '0834324432445', 50),
(14, 'Ksatria Tirta', '2023-09-13', 'Surakarta', '2023-09-11', 'Laki-Laki', 'Colomadu', 3, '0822612879435', 61);

-- --------------------------------------------------------

--
-- Table structure for table `kriteria`
--

CREATE TABLE `kriteria` (
  `id_kriteria` int(11) NOT NULL,
  `kriteria` varchar(255) NOT NULL,
  `detail_kriteria` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `kriteria`
--

INSERT INTO `kriteria` (`id_kriteria`, `kriteria`, `detail_kriteria`) VALUES
(1, 'Attitude', 'Kriteria ini menilai bagaimana sikap karyawan terhadap rekan kerja, apakah dia bisa untuk diajak bekerja sama. Karyawan yang memiliki attitude yang baik akan membentuk lingkungan kerja yang positif'),
(2, 'Kedisiplinan kerja', 'Kriteria ini menilai apakah karyawan menyelesaikan pekerjaan dan mengikuti peraturan yang telah dibuat manajemen perusahaan. Disiplin ketika membuat perencanaan pekerjaannya akan berpengaruh pada ketepatan waktu menyelesaikan tanggung jawab'),
(3, 'Inisiatif dalam bekerja', 'Kriteria ini menilai apakah karyawan inisiatif untuk melakukan hal-hal baru yang memberikan hasil nyata. Karyawan yang punya inisiatif biasanya merupakan pekerja mandiri yang dapat menjalankan perannya tanpa perlu banyak supervisi dari atasan.'),
(4, 'Leadership', 'Kriteria ini menilai apakah karyawan yang memiliki bakat menjadi pemimpin dan menggerakan serta memotivasi rekan kerjanya bisa menjadi poin penting dalam penilaian karyawan.'),
(5, 'Kerjasama tim', 'Kriteria ini menilai apakah karyawan menjalankan tugasnya dalam tim, bagaimana mereka berkomunikasi dengan atasan, menerima perintah dan menjalankannya, serta berkolaborasi dengan rekan kerja'),
(6, 'Kehadiran', 'Kriteria ini menunjukkan kepatuhan karyawan pada peraturan perusahaan mengenai waktu kerja dan kesadaran terhadap kewajibannya sebagai pekerja'),
(7, 'Tanggung jawab', 'Kriteria ini mengukur pemenuhan tanggung jawab dari peran yang dijalankan karyawan, mana yang sudah memenuhi harapan dan mana yang belum'),
(8, 'Komunikasi', 'Kriteria ini menilai apakah karyawan tersebut memiliki kemampuan untuk berkomunikasi secara memadai dengan rekan kerja, manajer, dan pelanggan');

-- --------------------------------------------------------

--
-- Table structure for table `migrations`
--

CREATE TABLE `migrations` (
  `id` int(10) UNSIGNED NOT NULL,
  `migration` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `batch` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `migrations`
--

INSERT INTO `migrations` (`id`, `migration`, `batch`) VALUES
(1, '2014_10_12_000000_create_users_table', 1),
(2, '2019_12_14_000001_create_personal_access_tokens_table', 1),
(3, '2023_03_08_102316_create_divisi_table', 1),
(4, '2023_03_08_102337_create_kriteria_table', 1),
(5, '2023_03_08_102353_create_pertanyaan_table', 1),
(6, '2023_03_08_102405_create_hasil_table', 1),
(7, '2023_03_08_102419_create_konversi_table', 1),
(8, '2023_03_08_102436_create_laporan_table', 1),
(9, '2023_03_30_111730_karyawan', 1);

-- --------------------------------------------------------

--
-- Table structure for table `periode`
--

CREATE TABLE `periode` (
  `id_periode` int(11) NOT NULL,
  `bulan` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `periode`
--

INSERT INTO `periode` (`id_periode`, `bulan`) VALUES
(1, 'Januari'),
(2, 'Februari'),
(3, 'Maret'),
(4, 'April'),
(5, 'Mei'),
(6, 'Juni'),
(7, 'Juli'),
(8, 'Agustus'),
(9, 'September'),
(10, 'Oktober'),
(11, 'November'),
(12, 'Desember');

-- --------------------------------------------------------

--
-- Table structure for table `personal_access_tokens`
--

CREATE TABLE `personal_access_tokens` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `tokenable_type` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `tokenable_id` bigint(20) UNSIGNED NOT NULL,
  `name` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `token` varchar(64) COLLATE utf8mb4_unicode_ci NOT NULL,
  `abilities` text COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `last_used_at` timestamp NULL DEFAULT NULL,
  `expires_at` timestamp NULL DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `pertanyaan`
--

CREATE TABLE `pertanyaan` (
  `id` int(11) NOT NULL,
  `kriteria_id` int(11) NOT NULL,
  `nama_pertanyaan` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `kartegori_id` int(10) NOT NULL,
  `periode_id` int(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `pertanyaan`
--

INSERT INTO `pertanyaan` (`id`, `kriteria_id`, `nama_pertanyaan`, `kartegori_id`, `periode_id`) VALUES
(1, 1, 'Seberapa positif dan profesional sikap karyawan dalam berinteraksi dengan rekan kerja dan atasan?', 0, 6),
(2, 1, 'Sejauh mana karyawan menunjukkan keramahan dan kerjasama dalam menangani situasi yang menantang?', 0, 6),
(3, 1, 'Apakah karyawan menunjukkan dedikasi yang tinggi dalam melaksanakan tugasnya dengan sikap yang positif?', 0, 6),
(6, 2, 'Seberapa konsisten karyawan dalam memenuhi tenggat waktu yang ditetapkan?', 0, 6),
(7, 2, 'Apakah karyawan sering terlambat datang atau pulang dari kantor?', 0, 6),
(8, 2, 'Sejauh mana karyawan mengikuti prosedur dan kebijakan perusahaan dengan tepat?', 0, 6),
(9, 3, 'Seberapa sering karyawan mengambil inisiatif untuk mencari solusi atau memberikan ide baru untuk meningkatkan efisiensi kerja?', 0, 6),
(10, 3, 'Apakah karyawan aktif dalam mencari peluang baru dan mengembangkan diri?', 0, 6),
(11, 3, 'Sejauh mana karyawan mampu bekerja secara mandiri dan menyelesaikan tugas tanpa pengawasan terus-menerus?', 0, 6),
(12, 4, 'Apakah karyawan menunjukkan kemampuan kepemimpinan yang baik dalam mengarahkan dan memotivasi rekan kerja?', 0, 6),
(13, 4, 'Apakah karyawan mampu mengambil tanggung jawab dan membuat keputusan yang tepat dalam situasi yang sulit?', 0, 6),
(14, 4, 'Sejauh mana karyawan mampu memberikan arahan yang jelas kepada anggota tim atau bawahan?', 0, 6),
(15, 5, 'Seberapa baik karyawan berkontribusi dalam kerjasama tim dan mampu bekerja sama dengan rekan kerja?', 0, 6),
(16, 5, 'Apakah karyawan aktif dalam membantu rekan kerja dan membangun hubungan yang baik di dalam tim?', 0, 6),
(17, 5, 'Sejauh mana karyawan mampu menyelesaikan tugas secara efektif dalam kerjasama dengan anggota tim lainnya?', 0, 6),
(18, 6, 'Seberapa sering karyawan hadir tepat waktu dan tidak absen tanpa alasan yang jelas?', 0, 6),
(19, 6, 'Apakah karyawan sering mengajukan izin absen dengan alasan yang sah?', 0, 6),
(20, 6, 'Apakah karyawan memiliki catatan kehadiran yang baik dan jarang absen atau terlambat?', 0, 6),
(21, 7, 'Sejauh mana karyawan bertanggung jawab terhadap tugas dan proyek yang diberikan?', 0, 6),
(22, 7, 'Apakah karyawan selalu menyelesaikan pekerjaannya dengan baik dan bertanggung jawab terhadap hasilnya?', 0, 6),
(23, 7, 'Seberapa baik karyawan mengelola tanggung jawab dan melakukan tindakan pencegahan jika terjadi masalah?', 0, 6),
(24, 8, 'Sejauh mana karyawan memiliki kemampuan komunikasi yang efektif dalam berinteraksi dengan rekan kerja dan atasan?', 0, 6),
(25, 8, 'Apakah karyawan mampu mendengarkan dengan baik dan mengungkapkan pikiran atau pendapatnya secara jelas?', 0, 6),
(26, 8, 'Apakah karyawan dapat mengomunikasikan ide atau instruksi dengan jelas dan terbuka kepada rekan kerja atau bawahan?', 0, 6),
(27, 1, 'Apakah Anda merasa bahwa karyawan ini memiliki sikap negatif terhadap pekerjaan atau rekan kerja?', 1, 9),
(29, 1, 'Bagaimana karyawan menangani masalah atau hambatan dengan sikap yang positif?', 0, 9),
(30, 1, 'Bagaimana karyawan menghadapi umpan balik atau kritik yang diberikan kepada mereka?', 0, 9),
(31, 2, 'Seberapa buruk kedisiplinan karyawan ini terkait sering terlambat, pulang lebih awal atau absen tanpa izin?', 1, 9),
(32, 2, 'Seberapa sering karyawan menyelesaikan tugas-tugas mereka sesuai dengan tenggat waktu yang ditetapkan?', 0, 9),
(33, 2, 'Bagaimana karyawan menghadapi gangguan atau godaan yang dapat mempengaruhi kedisiplinan mereka?', 0, 9),
(34, 3, 'Seberapa buruk sikap proaktif karyawan dalam mengambil inisiatif atau mencari solusi dalam menyelesaikan tugas-tugasnya?', 1, 9),
(35, 3, 'Bagaimana karyawan menunjukkan kreativitas dan pemikiran inovatif dalam pekerjaan mereka?', 0, 9),
(36, 3, 'Bagaimana karyawan menggunakan waktunya di luar tugas rutin untuk belajar atau mengembangkan keterampilan baru yang relevan?', 0, 9),
(37, 4, 'Seberapa buruk kemampuan laryawan ini dalam kepemimpinannya dan kemampuan dalam mengarahkan tim atau rekan kerja nya?', 1, 9),
(38, 4, 'Bagaimana karyawan memotivasi dan menginspirasi orang lain untuk mencapai hasil yang lebih baik?', 0, 9),
(39, 4, 'Bagaimana karyawan menunjukkan kemampuan dalam mengambil keputusan yang baik dan memimpin dalam situasi yang kompleks?', 0, 9),
(40, 5, 'Seberapa buruk karyawan ini dalam masalah kolaborasi, apakah menunjukkan ketidakaktifan atau kesulitan dalam bekerja sama dengan rekannya?', 1, 9),
(41, 5, 'Bagaimana karyawan menunjukkan kemampuan mendengarkan yang baik terhadap pendapat atau ide-ide dari rekan kerja?', 0, 9),
(42, 5, 'Bagaimana karyawan berbagi pengetahuan atau keterampilan mereka dengan rekan kerja lainnya?', 0, 9),
(43, 6, 'Bagaimana karyawan mengatur jadwal mereka untuk memastikan kehadiran yang konsisten?', 1, 9),
(44, 6, 'Apakah karyawan memberi tahu sebelumnya jika mereka tidak bisa hadir atau terlambat?', 0, 9),
(45, 6, 'Bagaimana karyawan menangani kehadiran yang tidak konsisten atau absen tanpa pemberitahuan sebelumnya?', 0, 9),
(46, 7, 'Seberapa buruk karyawan ini dalam masalah tanggung jawab, apakah karyawan ini cenderung menghindari tanggung jawab atau menyalahkan orang lain ketika terjadi masalah?', 1, 9),
(47, 7, 'Bagaimana karyawan menghadapi situasi di mana mereka harus mengatasi kesalahan atau kegagalan dalam pekerjaan mereka?', 0, 9),
(48, 7, 'Bagaimana karyawan menghadapi situasi yang membutuhkan keputusan yang sulit atau tanggung jawab yang besar?', 0, 9),
(49, 8, 'Seberapa buruk karyawan ini dalam masalah komunikasi , apakah karyawan ini memiliki kesulitan dalam berkomunikasi, terutama dalam memberikan dan menerima umpan balik dari rekan kerja atau atasan?', 1, 9),
(50, 8, 'Bagaimana karyawan menggunakan media komunikasi yang berbeda, seperti email, panggilan telepon, atau pertemuan tatap muka, untuk menyampaikan informasi dengan efisien dan efektif?', 0, 9),
(51, 8, 'Bagaimana karyawan menangani pertanyaan atau permintaan informasi dari rekan kerja atau pelanggan? Apakah mereka merespons dengan cepat dan memberikan jawaban yang jelas?', 0, 9);

-- --------------------------------------------------------

--
-- Table structure for table `role`
--

CREATE TABLE `role` (
  `id` int(11) NOT NULL,
  `role` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `role`
--

INSERT INTO `role` (`id`, `role`) VALUES
(1, 'Admin'),
(2, 'User'),
(3, 'HRD');

-- --------------------------------------------------------

--
-- Table structure for table `users`
--

CREATE TABLE `users` (
  `id` bigint(20) NOT NULL,
  `nama` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `email` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `password` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `role_id` int(11) NOT NULL DEFAULT 0,
  `status` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `users`
--

INSERT INTO `users` (`id`, `nama`, `email`, `password`, `role_id`, `status`, `created_at`, `updated_at`) VALUES
(1, 'Harjuno Setyawan', 'harjunosetyawan@gmail.com', '$2y$10$21tjlKavJn/./iUjkrDw/.1v8v/K81qZ6r.9.sbc5UQ4ChsGgpaDC', 2, 'Active', '2023-04-04 21:59:48', '2023-07-20 02:20:05'),
(28, 'Arjun Setyawan', 'harjunosetyawan16@gmail.com', '$2y$10$0ZrnU1VwmEyhmZL53rrYD.pl/5wbLoFdvs4QYZzUawMIzzlvaW/KO', 2, 'Active', '2023-05-02 21:19:48', '2023-05-10 09:00:41'),
(29, 'Admin2', 'adminharjuno@gmail.com', '$2y$10$ThKREOy//cn./euEplwo.eUUfGPbuqQUXnp1CODPfprQbdd8tXq2K', 1, 'Inactive', '2023-05-10 02:41:03', '2023-06-15 13:07:02'),
(30, 'HRD_Arjun', 'hrd@gmail.com', '$2y$10$jqP2ikAXRncNZr5JD1YHTu1jqzU5sBX9ZgaY.jZbi1kGBY5.a5sxu', 3, 'Active', '2023-05-10 02:43:39', '2023-05-10 02:43:39'),
(31, 'Admin', 'admin@gmail.com', '$2y$10$PG7jgy.VzN5OGdPHrn.3OehPEGhjtNQyN55itNcVpqh0/ZhPJktAa', 1, 'Active', '2023-05-10 08:52:22', '2023-06-15 13:39:25'),
(33, 'Devanza Priyansah', 'harjunosetyawan123@gmail.com', '$2y$10$ic1I5W3kXXaaPuVtY5xxA.bqh3AUBL2n4m4kBGebzQn310sB6ZeCm', 2, 'Active', '2023-05-24 22:48:31', '2023-05-24 22:48:31'),
(50, 'Muhammad Taufiq', 'arjunsetyawan16@gmail.com', '$2y$10$0FbcAEdUDijjbYSejiKQv.0tbHfrGz7QGQxs5aNM7qF.cjrcEMRNS', 2, 'Active', '2023-06-15 08:20:05', '2023-06-15 13:36:13'),
(51, 'Severo', 'severozchannel13@gmail.com', '$2y$10$y8/ljoCJ/OsL48j8TVQ6TuqYs6PZKfMyxMlz6XPop4wuyI8.fLwJm', 2, 'Active', '2023-06-26 22:47:18', '2023-07-07 00:11:22'),
(61, 'Ksatria', 'harjunosetyawan@student.uns.ac.id', '$2y$10$TkMcy5ydlQNNIgvLc3mQ9eg/tVJMzR0taeqpOQilCNxW4pw2.oiVC', 2, 'Active', '2023-09-01 04:43:17', '2023-09-01 04:43:17');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `ajuan`
--
ALTER TABLE `ajuan`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `divisi`
--
ALTER TABLE `divisi`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `hasil`
--
ALTER TABLE `hasil`
  ADD PRIMARY KEY (`id`),
  ADD KEY `hasil_id_index` (`id`),
  ADD KEY `karyawan_id` (`karyawan_id`),
  ADD KEY `karyawan_id2` (`karyawan_id2`);

--
-- Indexes for table `karyawan`
--
ALTER TABLE `karyawan`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `user_id` (`user_id`),
  ADD KEY `karyawan_id_index` (`id`),
  ADD KEY `divisi_id` (`divisi_id`);

--
-- Indexes for table `kriteria`
--
ALTER TABLE `kriteria`
  ADD PRIMARY KEY (`id_kriteria`);

--
-- Indexes for table `migrations`
--
ALTER TABLE `migrations`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `periode`
--
ALTER TABLE `periode`
  ADD PRIMARY KEY (`id_periode`);

--
-- Indexes for table `personal_access_tokens`
--
ALTER TABLE `personal_access_tokens`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `personal_access_tokens_token_unique` (`token`),
  ADD KEY `personal_access_tokens_tokenable_type_tokenable_id_index` (`tokenable_type`,`tokenable_id`);

--
-- Indexes for table `pertanyaan`
--
ALTER TABLE `pertanyaan`
  ADD PRIMARY KEY (`id`),
  ADD KEY `pertanyaan_id_index` (`id`),
  ADD KEY `kriteria_id` (`kriteria_id`),
  ADD KEY `periode_id` (`periode_id`);

--
-- Indexes for table `role`
--
ALTER TABLE `role`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `users`
--
ALTER TABLE `users`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `users_email_unique` (`email`),
  ADD KEY `role_id` (`role_id`),
  ADD KEY `role_id_2` (`role_id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `ajuan`
--
ALTER TABLE `ajuan`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=30;

--
-- AUTO_INCREMENT for table `divisi`
--
ALTER TABLE `divisi`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=9;

--
-- AUTO_INCREMENT for table `hasil`
--
ALTER TABLE `hasil`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=33;

--
-- AUTO_INCREMENT for table `karyawan`
--
ALTER TABLE `karyawan`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=15;

--
-- AUTO_INCREMENT for table `kriteria`
--
ALTER TABLE `kriteria`
  MODIFY `id_kriteria` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=13;

--
-- AUTO_INCREMENT for table `migrations`
--
ALTER TABLE `migrations`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=10;

--
-- AUTO_INCREMENT for table `periode`
--
ALTER TABLE `periode`
  MODIFY `id_periode` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=13;

--
-- AUTO_INCREMENT for table `personal_access_tokens`
--
ALTER TABLE `personal_access_tokens`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `pertanyaan`
--
ALTER TABLE `pertanyaan`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=53;

--
-- AUTO_INCREMENT for table `role`
--
ALTER TABLE `role`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT for table `users`
--
ALTER TABLE `users`
  MODIFY `id` bigint(20) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=62;

--
-- Constraints for dumped tables
--

--
-- Constraints for table `hasil`
--
ALTER TABLE `hasil`
  ADD CONSTRAINT `hasil_ibfk_1` FOREIGN KEY (`karyawan_id`) REFERENCES `users` (`id`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `hasil_ibfk_2` FOREIGN KEY (`karyawan_id2`) REFERENCES `users` (`id`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Constraints for table `karyawan`
--
ALTER TABLE `karyawan`
  ADD CONSTRAINT `karyawan_ibfk_1` FOREIGN KEY (`divisi_id`) REFERENCES `divisi` (`id`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `karyawan_ibfk_2` FOREIGN KEY (`user_id`) REFERENCES `users` (`id`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Constraints for table `pertanyaan`
--
ALTER TABLE `pertanyaan`
  ADD CONSTRAINT `pertanyaan_ibfk_3` FOREIGN KEY (`kriteria_id`) REFERENCES `kriteria` (`id_kriteria`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `pertanyaan_ibfk_4` FOREIGN KEY (`periode_id`) REFERENCES `periode` (`id_periode`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Constraints for table `users`
--
ALTER TABLE `users`
  ADD CONSTRAINT `users_ibfk_1` FOREIGN KEY (`role_id`) REFERENCES `role` (`id`) ON DELETE CASCADE ON UPDATE CASCADE;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
