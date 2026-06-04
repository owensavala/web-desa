-- phpMyAdmin SQL Dump
-- version 5.2.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Dec 26, 2025 at 02:55 PM
-- Server version: 10.4.32-MariaDB
-- PHP Version: 8.2.12

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `desa_kupal`
--

-- --------------------------------------------------------

--
-- Table structure for table `admin`
--

CREATE TABLE `admin` (
  `id_admin` int(11) NOT NULL,
  `username` varchar(100) NOT NULL,
  `password` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `admin`
--

INSERT INTO `admin` (`id_admin`, `username`, `password`) VALUES
(1, 'admin', '$2y$10$BP6N84oYXj3QzETzOij1duy6tIwu2ZcFbmrQXofGThUGmONSUaZty'),
(2, 'sattar', '$2y$10$Tb6RaUeXf54dSIkEsInLNeCUsKFD4.vN5M8wjp2cuQitOCeJb67b6'),
(3, 'anonim1', '$2y$10$heAuWt3osZRYGlPufv4ey.pxvKiUhbmYgABwOGvGTp6OjmfZj.gtO');

-- --------------------------------------------------------

--
-- Table structure for table `apbdes_detail`
--

CREATE TABLE `apbdes_detail` (
  `id` int(11) NOT NULL,
  `id_summary` int(11) NOT NULL,
  `bidang` varchar(255) NOT NULL,
  `kegiatan` varchar(255) NOT NULL,
  `anggaran` bigint(20) DEFAULT 0
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `apbdes_detail`
--

INSERT INTO `apbdes_detail` (`id`, `id_summary`, `bidang`, `kegiatan`, `anggaran`) VALUES
(7, 3, 'A', '1', 15000000),
(12, 1, 'Pelaksanaan Pembangunan Desa', 'Pembangunan Jalan Usaha Tani', 50000000),
(13, 1, 'Pelaksanaan Pembangunan Desa', 'Pembangunan Drainase', 20000000),
(14, 1, 'Penyelenggaraan Pemerintahan Desa', 'Operasional Kantor Desa', 26000000),
(15, 1, 'B', '2', 4000000),
(16, 1, 'bidang c', 'tempat sampag umum', 1000000);

-- --------------------------------------------------------

--
-- Table structure for table `apbdes_summary`
--

CREATE TABLE `apbdes_summary` (
  `id` int(11) NOT NULL,
  `tahun` int(4) NOT NULL,
  `total_pendapatan` bigint(20) DEFAULT 0,
  `total_belanja` bigint(20) DEFAULT 0,
  `pendapatan_pad` bigint(20) DEFAULT 0,
  `pendapatan_transfer` bigint(20) DEFAULT 0,
  `pendapatan_lain` bigint(20) DEFAULT 0
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `apbdes_summary`
--

INSERT INTO `apbdes_summary` (`id`, `tahun`, `total_pendapatan`, `total_belanja`, `pendapatan_pad`, `pendapatan_transfer`, `pendapatan_lain`) VALUES
(1, 2025, 100000000, 101000000, 10000000, 85000000, 5000000),
(3, 2024, 35000000, 15000000, 10000000, 20000000, 5000000);

-- --------------------------------------------------------

--
-- Table structure for table `berita`
--

CREATE TABLE `berita` (
  `id` int(11) NOT NULL,
  `judul` varchar(255) NOT NULL,
  `isi` text NOT NULL,
  `gambar` varchar(255) NOT NULL,
  `tanggal_posting` datetime NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `berita`
--

INSERT INTO `berita` (`id`, `judul`, `isi`, `gambar`, `tanggal_posting`) VALUES
(1, 'Pawai Obor Menyambut Ramadhan 2025', 'Informasi terbaru mengenai program pemberdayaan masyarakat desa yang akan segera\r\n                                    dilaksanakan...', '1755549031_slide3.jpeg', '2025-08-17 05:34:00'),
(3, 'Pemdes Kupal Halsel Salur Honor Perangkat Desa BPD dan Stimulan Tahun Anggaran 2025', 'Pemerintah Desa (Pemdes) Kupal Kecamatan Bacan Selatan Kabupaten Halmahera Selatan menyularkan honor bagi seluruh perangkat Desa, dan BPD pada Sabtu 3 Mei 2025 di Kantor Desa Kupal.\r\n\r\nPenyaluran hak-hak penerima ini, bersumber dari 40 persen Dana Desa (DD) pencairan tahap pertama tahun 2025 yang langsung diserahkan oleh bendahara Desa Kupal Sasmita ke penerima.\r\n\r\nSelain perangkat desa dan BPD, Pemdes Kupal juga menyalurkan Bantuan Langsung Tunai (BLT) serta Stimulan sebesar Rp 50 juta ke Masjid Nurul Iman Desa Kupal.\r\n\r\nKepala Desa Kupal Sanusi La Riaga mengatakan, penyaluran honor perangkat Desa, BLT, dan stimulan bakal disusul dengan pekerjaan fisik yang telah direncanakan.\r\n\r\n\"Kita bagi dulu honor atau gaji perangkat desa dan lain-lain. Insha Allah setelah ini kita kerjakan pekerjaan fisik Desa sesuai yang telah di tetapkan,\" kata Kades Sanusi.\r\n\r\nDia berharap honor dan gaji yang telah dibagikan, perangkat desa dan lainnya yang masuk dalam komponen pengurus desa dapat meningkatkan efisiensi kerja.\r\n\r\nHonor sudah dibagi, mudah-mudahan itu dapat menjadi salah satu pemacu semangat dalam meningkatkan pelayanan di Desa,\" tutur Sanusi \r\n\r\nSanusi menambahkan, untuk pembayaran gaji Kaur, BPD, dan RT, dibayarkan bulan Maret sampai April 2025.\r\n\r\nBerikut daftar dan jumlah penerima honor yang disalurkan Pemdes Kupal:\r\n\r\n1. Imam dan Badan sarah 21 Orang.\r\n\r\n2. Kades Posyandu 10 Orang.\r\n\r\n3.Guru PAUD 4 Orang.\r\n\r\n5.Guru Mengaji 4 Orang.\r\n\r\n\r\n', '1755442575_3.webp', '2025-08-19 23:56:00'),
(4, 'Pemdes Kupal Halmahera Selatan Serahkan Alat Prasarana Penunjang Olahraga ke Pemuda Desa', 'Kepala Desa (Kades) Kupal Kecamatan Bacan Selatan Kabupaten Halmahera Selatan Sanusi La Riaga menyerahkan alat dan prasarana olahraga kepada Pemuda Desa, Rabu 14 Mei 2025 di Kantor Desa Kupal.\r\n\r\nDua mesin paras rumput dan penunjang olahraga lainnya, diserahkan Kades Sanusi sebagai bentuk dukungan terhadap pemuda desa di bidang olahraga khususnya sepak bola.\r\n\r\n Alat dan prasarana yang diserahkan, bersumber dari anggaran Pemuda Desa tahap I dengan nilai Rp 10juta lebih, 40 persen dari Rp 25juta yang di anggarankan untuk Pemuda di tahun 2025.\r\n\r\nKepala Desa Sanusi La Riaga mengatakan, anggaran tersebut direalisasikan dari Dana Desa (DD) tahun 2025 berdasrkan proposal yang diajukan oleh pihak Pemuda Desa.\r\n\r\n\"Untuk tahun 2025, Pemuda di Kupal di dapat anggaran Rp 25juta. Tahap awal kita serahkan dalam bentuk barang sesuai rincian proposal yang diajukan,\" kata Sanusi.\r\n\r\nSanusi menambahkan, alasan tidak diserahkan dalam bentuk uang tunai karena bisa langsung menjadi catatan laporan pertanggungjawaban terkait kegiatan kepemudaan di Desa.\r\n\r\nSanusi bilang, untuk 60 persen sisa anggaran Pemuda Desa Kupal, akan dibicarakan lebih lanjut berdasrkan kegitan Pemuda yang sudah dicanangkan.\r\n\r\nDia berharap, dengan adanya alat dan prasarana tersebut, 1 unit lapangan sepak bola yang dimiliki Pemuda Desa Kupal dapat dirawat dengan baik.\r\n\r\n\"Mudah-mudahan dengan begitu, lapangan pemuda dapat dirawat sebagaimana mestinya. Pastinya demi generasi sepak bola di Kupal,\" harapnya.\r\n\r\nSumber: Ketik.com | Media Kolaborasi Indonesia. \r\nhttps://ketik.com/berita/pemdes-kupal-halmahera-selatan-serahkan-alat-prasarana-penunjang-olahraga-ke-pemuda-desa', '1755444854_4.webp', '2025-05-14 17:30:00'),
(5, 'lomba main domino', ' ', '1755553008_icon-apbd.png', '2025-08-14 23:35:00');

-- --------------------------------------------------------

--
-- Table structure for table `demografi`
--

CREATE TABLE `demografi` (
  `id` int(11) NOT NULL,
  `total_penduduk` int(11) DEFAULT 0,
  `total_kk` int(11) DEFAULT 0,
  `total_laki` int(11) DEFAULT 0,
  `total_perempuan` int(11) DEFAULT 0,
  `umur_anak_laki` int(11) DEFAULT 0,
  `umur_anak_perempuan` int(11) DEFAULT 0,
  `umur_remaja_laki` int(11) DEFAULT 0,
  `umur_remaja_perempuan` int(11) DEFAULT 0,
  `umur_dewasa_laki` int(11) DEFAULT 0,
  `umur_dewasa_perempuan` int(11) DEFAULT 0,
  `umur_lansia_laki` int(11) DEFAULT 0,
  `umur_lansia_perempuan` int(11) DEFAULT 0,
  `pendidikan_sd` int(11) DEFAULT 0,
  `pendidikan_smp` int(11) DEFAULT 0,
  `pendidikan_sma` int(11) DEFAULT 0,
  `pendidikan_pt` int(11) DEFAULT 0,
  `status_cerai_hidup` int(11) DEFAULT 0,
  `status_cerai_mati` int(11) DEFAULT 0,
  `status_kawin` int(11) DEFAULT 0,
  `agama_islam` int(11) DEFAULT 0,
  `agama_kristen` int(11) DEFAULT 0,
  `agama_katolik` int(11) DEFAULT 0,
  `agama_hindu` int(11) DEFAULT 0,
  `agama_buddha` int(11) DEFAULT 0,
  `status_belum_kawin` int(11) DEFAULT 0,
  `agama_konghucu` int(11) DEFAULT 0
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `demografi`
--

INSERT INTO `demografi` (`id`, `total_penduduk`, `total_kk`, `total_laki`, `total_perempuan`, `umur_anak_laki`, `umur_anak_perempuan`, `umur_remaja_laki`, `umur_remaja_perempuan`, `umur_dewasa_laki`, `umur_dewasa_perempuan`, `umur_lansia_laki`, `umur_lansia_perempuan`, `pendidikan_sd`, `pendidikan_smp`, `pendidikan_sma`, `pendidikan_pt`, `status_cerai_hidup`, `status_cerai_mati`, `status_kawin`, `agama_islam`, `agama_kristen`, `agama_katolik`, `agama_hindu`, `agama_buddha`, `status_belum_kawin`, `agama_konghucu`) VALUES
(1, 170, 67, 90, 80, 20, 16, 30, 25, 29, 24, 11, 15, 120, 60, 50, 15, 0, 0, 10, 200, 3, 2, 0, 0, 20, 0);

-- --------------------------------------------------------

--
-- Table structure for table `dokumen_layanan`
--

CREATE TABLE `dokumen_layanan` (
  `id` int(11) NOT NULL,
  `nama_dokumen` varchar(255) NOT NULL,
  `keterangan` text DEFAULT NULL,
  `kategori` varchar(255) DEFAULT NULL,
  `nama_file` varchar(255) NOT NULL,
  `tanggal_upload` timestamp NOT NULL DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `dokumen_layanan`
--

INSERT INTO `dokumen_layanan` (`id`, `nama_dokumen`, `keterangan`, `kategori`, `nama_file`, `tanggal_upload`) VALUES
(1, 'Surat Tidak Mampuh', 'Surat untuk anak sekolah atau mahasiswa untuk menambah berkas pengurusan beasiswa', 'Ekonomi / Sosial', '1755539135_Surat Permintaan Data Siswa MI.pdf', '2025-08-18 17:42:01'),
(2, 'Surat Keterangan Domisili', '', 'Administrasi Kependudukan', '1755540341_1755539135_Surat_Permintaan_Data_Siswa_MI.pdf', '2025-08-18 18:05:41'),
(3, 'Surat Keterangan Pindah Datang / Pindah Keluar', '', 'Administrasi Kependudukan', '1755540409_1755539135_Surat_Permintaan_Data_Siswa_MI.pdf', '2025-08-18 18:06:49'),
(4, 'Surat Keterangan Belum Pernah Menikah', '', 'Administrasi Kependudukan', '1755540418_1755539135_Surat_Permintaan_Data_Siswa_MI.pdf', '2025-08-18 18:06:58'),
(5, 'Surat Keterangan Janda / Duda', '', 'Administrasi Kependudukan', '1755540429_1755539135_Surat_Permintaan_Data_Siswa_MI.pdf', '2025-08-18 18:07:09'),
(6, 'Surat Keterangan Usaha (SKU)', '', 'Ekonomi / Sosial', '1755540442_1755539135_Surat_Permintaan_Data_Siswa_MI.pdf', '2025-08-18 18:07:22'),
(7, 'Surat Keterangan Penghasilan Orang Tua', '', 'Ekonomi / Sosial', '1755540454_1755539135_Surat_Permintaan_Data_Siswa_MI.pdf', '2025-08-18 18:07:34'),
(8, 'Surat Keterangan Aktif Sekolah / Kuliah', '', 'Pendidikan & Beasiswa', '1755540478_IDENTIFIKASI_TUMBUHAN_SEBAGAI_PEMANFAATAN_OBAT.docx', '2025-08-18 18:07:58'),
(9, 'Surat Keterangan Beasiswa', '', 'Pendidikan & Beasiswa', '1755540492_1755539135_Surat_Permintaan_Data_Siswa_MI.pdf', '2025-08-18 18:08:12'),
(10, 'Surat Izin Keramaian', '', 'Perizinan', '1755540503_1755539135_Surat_Permintaan_Data_Siswa_MI.pdf', '2025-08-18 18:08:23'),
(11, 'Surat Keterangan Tanah (SKT)', '', 'Pertanahan', '1755540515_1755539135_Surat_Permintaan_Data_Siswa_MI.pdf', '2025-08-18 18:08:35'),
(12, 'Surat Pengantar Pembuatan KTP', '', 'Surat Pengantar', '1755553288_kupon_bajar_pandu.docx', '2025-08-18 18:08:47');

-- --------------------------------------------------------

--
-- Table structure for table `footer_settings`
--

CREATE TABLE `footer_settings` (
  `id` int(11) NOT NULL,
  `alamat` text DEFAULT NULL,
  `telepon` varchar(20) DEFAULT NULL,
  `email` varchar(100) DEFAULT NULL,
  `link_facebook` varchar(255) DEFAULT NULL,
  `link_instagram` varchar(255) DEFAULT NULL,
  `link_tiktok` varchar(255) DEFAULT NULL,
  `link_youtube` varchar(255) DEFAULT NULL,
  `copyright_text` varchar(255) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `footer_settings`
--

INSERT INTO `footer_settings` (`id`, `alamat`, `telepon`, `email`, `link_facebook`, `link_instagram`, `link_tiktok`, `link_youtube`, `copyright_text`) VALUES
(1, 'Jl. Desa Kupal, Kec. Bacan Sel, Kabupaten Halmahera Selatan, Maluku Utara ', '085218403628', 'desakupal@gmail.go.id', '', '', '', '', NULL);

-- --------------------------------------------------------

--
-- Table structure for table `galeri_foto`
--

CREATE TABLE `galeri_foto` (
  `id` int(11) NOT NULL,
  `nama_file` varchar(255) NOT NULL,
  `keterangan` varchar(255) DEFAULT NULL,
  `tanggal_upload` timestamp NOT NULL DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `galeri_foto`
--

INSERT INTO `galeri_foto` (`id`, `nama_file`, `keterangan`, `tanggal_upload`) VALUES
(4, '1755506685_pengukuran2.jpg', '', '2025-08-18 08:44:45'),
(5, '1755506723_pengukuran3.jpg', '', '2025-08-18 08:45:23'),
(6, '1755506730_pengukuran1.jpg', '', '2025-08-18 08:45:30'),
(7, '1755506736_pengukuran.jpg', '', '2025-08-18 08:45:36'),
(8, '1755506746_Perunahan APBDES 2024.jpg', '', '2025-08-18 08:45:46'),
(9, '1755506753_Penyususnan (RKPDes).jpg', '', '2025-08-18 08:45:53'),
(10, '1755514729_4.webp', 'pemberian', '2025-08-18 10:58:49');

-- --------------------------------------------------------

--
-- Table structure for table `galeri_video`
--

CREATE TABLE `galeri_video` (
  `id` int(11) NOT NULL,
  `judul` varchar(255) NOT NULL,
  `link_video` varchar(255) NOT NULL,
  `tanggal_upload` timestamp NOT NULL DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `galeri_video`
--

INSERT INTO `galeri_video` (`id`, `judul`, `link_video`, `tanggal_upload`) VALUES
(1, 'tes', 'https://youtu.be/pX__5nwtzlk', '2025-08-17 12:43:48');

-- --------------------------------------------------------

--
-- Table structure for table `kritik_saran`
--

CREATE TABLE `kritik_saran` (
  `id` int(11) NOT NULL,
  `nama` varchar(255) NOT NULL,
  `komentar` text NOT NULL,
  `tanggal_kirim` timestamp NOT NULL DEFAULT current_timestamp(),
  `status` enum('baru','dibaca') NOT NULL DEFAULT 'baru'
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `kritik_saran`
--

INSERT INTO `kritik_saran` (`id`, `nama`, `komentar`, `tanggal_kirim`, `status`) VALUES
(3, 'anonim 2', 'tempat sampah umum desa', '2025-08-18 21:42:27', 'baru');

-- --------------------------------------------------------

--
-- Table structure for table `pengumuman`
--

CREATE TABLE `pengumuman` (
  `id` int(11) NOT NULL,
  `judul` text NOT NULL,
  `tanggal_mulai` date NOT NULL,
  `tanggal_selesai` date NOT NULL,
  `status` enum('aktif','tidak aktif') NOT NULL DEFAULT 'aktif'
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `pengumuman`
--

INSERT INTO `pengumuman` (`id`, `judul`, `tanggal_mulai`, `tanggal_selesai`, `status`) VALUES
(1, 'Jadwal Posyandu Balita Bulan September akan dilaksanakan pada tanggal 25.', '2025-08-19', '2025-08-25', 'aktif'),
(2, 'Kerja bakti bersama di masjid : minggu 24 Agustus 2025', '2025-08-19', '2025-08-25', 'aktif');

-- --------------------------------------------------------

--
-- Table structure for table `profil_desa`
--

CREATE TABLE `profil_desa` (
  `id` int(11) NOT NULL,
  `visi` text DEFAULT NULL,
  `misi` text DEFAULT NULL,
  `sejarah` text DEFAULT NULL,
  `sambutan_isi` text DEFAULT NULL,
  `sambutan_nama_pejabat` varchar(255) DEFAULT NULL,
  `sambutan_jabatan` varchar(255) DEFAULT NULL,
  `sambutan_foto` varchar(255) DEFAULT NULL,
  `gambar_bagan1` varchar(255) DEFAULT NULL,
  `gambar_bagan2` varchar(255) DEFAULT NULL,
  `batas_utara` varchar(255) DEFAULT NULL,
  `batas_selatan` varchar(255) DEFAULT NULL,
  `batas_barat` varchar(255) DEFAULT NULL,
  `batas_timur` varchar(255) DEFAULT NULL,
  `luas_desa` varchar(100) DEFAULT NULL,
  `jumlah_penduduk` varchar(100) DEFAULT NULL,
  `gambar_peta` varchar(255) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `profil_desa`
--

INSERT INTO `profil_desa` (`id`, `visi`, `misi`, `sejarah`, `sambutan_isi`, `sambutan_nama_pejabat`, `sambutan_jabatan`, `sambutan_foto`, `gambar_bagan1`, `gambar_bagan2`, `batas_utara`, `batas_selatan`, `batas_barat`, `batas_timur`, `luas_desa`, `jumlah_penduduk`, `gambar_peta`) VALUES
(1, '“Desa Kupal sebagai Desa Wisata yang mampu mengelolah potensi Desa dan pembangunan berkelanjutan untuk mewujudkan masyarakat yang sejahtera”', 'Mewujudkan tata kelola pemerintahan yang baik\r\nMengembangkan kegiatan keagamaan\r\nMeningkatkan kualitas pendidikan dan sumber daya manusia\r\nMengembangkan teknologi informasi\r\nPembangunan infrastruktur, sarana dan prasarana\r\nMengembangkan seluruh usaha potensi desa\r\nMeningkatkan kualitas dan membangun kesadaran kesehatan masyarakat\r\nMeningkatkan perekonomian dan kesejahteraan masyarakat\r\nMembangun kerjasama dan kemitraan strategis', '    Cikal bakal hikayat dan sejarah tentang penamaan suatu daerah baik dari pedesaan hingga perkotaan adalah rintisan panjang yang menjadi cerita yang tak akan pernah putus dari dahulu sampai sekarang itu sebabnya, di setiap cerita dan hikayat satu daerah maupun wilayah banyak melahirkan pertanyaan tentang para pelaku sejarah.\r\n    Tentang Historinya, Penamaan Kupal merupakan penamaan yang tak terlepas sejarahnya dengan kesultanan Bacan, hal tersebut dikarenakan Kupal sendiri mempunyai sejarah panjang yang berhubungan langsung dengan Sultan atau  Raja Bacan yang memimpin Kesultanan Bacan pada masa itu.', 'Assalamu Alaikum Warohmatullahi Wabarakatu,\r\n\r\nWebsite ini hadir sebagai wujud transformasi desa Kupal menjadi desa yang mampu memanfaatkan teknologi informasi dan komunikasi, terintegrasi kedalam sistem online. Keterbukaan informasi publik, pelayanan publik dan kegiatan perekonomian di desa, guna mewujudkan desa Kupal sebagai desa wisata yang berkelanjutan, adaptasi dan mitigasi terhadap perubahan iklim serta menjadi desa yang mandiri.\r\n\r\nTerima kasih kepada semua pihak yang telah banyak memberi dukungan dan kontribusi baik berupa tenaga, pikiran dan semangat. ', 'ilham', 'Kepala Desa Kupal 2024-2029', '1755536047_sambutan_kepala desa.png', '1755552248_bagan1_bagan 2.jpg', '1755552248_bagan2_bagan 1.png', 'Desa Tembal', 'Desa Gandasuli', 'Pantai Kupal', 'gunung', '708 Ha', NULL, 'https://www.google.com/maps/embed?pb=!1m18!1m12!1m3!1d1393.6099631158868!2d127.4771603029561!3d-0.6672357875266723!2m3!1f90!2f0!3f0!3m2!1i1024!2i768!4f35!3m3!1m2!1s0x2d633928247195d7%3A0x50371dc95a3280e8!2sKnt%2C%20Desa%20Kupal!5e1!3m2!1sid!2sid!4v1755110');

-- --------------------------------------------------------

--
-- Table structure for table `slider`
--

CREATE TABLE `slider` (
  `id` int(11) NOT NULL,
  `gambar` varchar(255) NOT NULL,
  `judul` varchar(255) DEFAULT NULL,
  `subjudul` text DEFAULT NULL,
  `urutan` int(11) DEFAULT 0
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `slider`
--

INSERT INTO `slider` (`id`, `gambar`, `judul`, `subjudul`, `urutan`) VALUES
(1, '1755536129_kantor desa.jpg', 'KANTOR DESA KUPAL', '', 1),
(2, '1755552368_slide2.jpg', 'UPACARA', 'kalimat', 2);

-- --------------------------------------------------------

--
-- Table structure for table `sotk`
--

CREATE TABLE `sotk` (
  `id` int(11) NOT NULL,
  `nama` varchar(255) NOT NULL,
  `jabatan` varchar(255) NOT NULL,
  `foto` varchar(255) DEFAULT NULL,
  `urutan` int(11) DEFAULT 0
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `sotk`
--

INSERT INTO `sotk` (`id`, `nama`, `jabatan`, `foto`, `urutan`) VALUES
(1, 'Sanusi La Riaga', 'Kepala Desa Kupal', '1755537036_kepala desa.png', 1),
(2, 'anonim', 'Sekertaris', '1755537079_logo.png', 2),
(3, 'anonim1', 'Bendahara', '1755537099_logo.png', 3);

--
-- Indexes for dumped tables
--

--
-- Indexes for table `admin`
--
ALTER TABLE `admin`
  ADD PRIMARY KEY (`id_admin`);

--
-- Indexes for table `apbdes_detail`
--
ALTER TABLE `apbdes_detail`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `apbdes_summary`
--
ALTER TABLE `apbdes_summary`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `tahun` (`tahun`);

--
-- Indexes for table `berita`
--
ALTER TABLE `berita`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `demografi`
--
ALTER TABLE `demografi`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `dokumen_layanan`
--
ALTER TABLE `dokumen_layanan`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `footer_settings`
--
ALTER TABLE `footer_settings`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `galeri_foto`
--
ALTER TABLE `galeri_foto`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `galeri_video`
--
ALTER TABLE `galeri_video`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `kritik_saran`
--
ALTER TABLE `kritik_saran`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `pengumuman`
--
ALTER TABLE `pengumuman`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `profil_desa`
--
ALTER TABLE `profil_desa`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `slider`
--
ALTER TABLE `slider`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `sotk`
--
ALTER TABLE `sotk`
  ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `admin`
--
ALTER TABLE `admin`
  MODIFY `id_admin` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT for table `apbdes_detail`
--
ALTER TABLE `apbdes_detail`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=17;

--
-- AUTO_INCREMENT for table `apbdes_summary`
--
ALTER TABLE `apbdes_summary`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT for table `berita`
--
ALTER TABLE `berita`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;

--
-- AUTO_INCREMENT for table `demografi`
--
ALTER TABLE `demografi`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT for table `dokumen_layanan`
--
ALTER TABLE `dokumen_layanan`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=13;

--
-- AUTO_INCREMENT for table `footer_settings`
--
ALTER TABLE `footer_settings`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT for table `galeri_foto`
--
ALTER TABLE `galeri_foto`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=12;

--
-- AUTO_INCREMENT for table `galeri_video`
--
ALTER TABLE `galeri_video`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT for table `kritik_saran`
--
ALTER TABLE `kritik_saran`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT for table `pengumuman`
--
ALTER TABLE `pengumuman`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT for table `profil_desa`
--
ALTER TABLE `profil_desa`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- AUTO_INCREMENT for table `slider`
--
ALTER TABLE `slider`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT for table `sotk`
--
ALTER TABLE `sotk`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
