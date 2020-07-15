-- phpMyAdmin SQL Dump
-- version 4.8.4
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Jun 27, 2020 at 08:09 PM
-- Server version: 10.1.37-MariaDB
-- PHP Version: 7.3.0

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET AUTOCOMMIT = 0;
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `sirtaz_sakinah`
--

-- --------------------------------------------------------

--
-- Table structure for table `m_guru`
--

CREATE TABLE `m_guru` (
  `guru_id` int(11) NOT NULL,
  `nip` varchar(12) NOT NULL,
  `nama_guru` varchar(255) NOT NULL,
  `tmplahir_guru` text NOT NULL,
  `tgllahir_guru` varchar(11) NOT NULL,
  `jkel_guru` varchar(1) NOT NULL,
  `nohp_guru` varchar(15) NOT NULL,
  `email_guru` varchar(150) NOT NULL,
  `nik` varchar(30) NOT NULL,
  `no_rek` varchar(50) NOT NULL,
  `lama_mengajar` int(11) NOT NULL,
  `pddknterakhir_guru` varchar(25) NOT NULL,
  `tmt` varchar(11) NOT NULL,
  `alamat_rumah` text NOT NULL,
  `alamat_lembaga` text NOT NULL,
  `penerima_hibah` int(1) NOT NULL,
  `foto_guru` varchar(255) NOT NULL,
  `foto_npwp` varchar(255) NOT NULL,
  `foto_ktp` varchar(255) NOT NULL,
  `foto_bukutabungan` varchar(255) NOT NULL,
  `foto_ijazah` varchar(255) NOT NULL,
  `status_guru` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `m_guru`
--

INSERT INTO `m_guru` (`guru_id`, `nip`, `nama_guru`, `tmplahir_guru`, `tgllahir_guru`, `jkel_guru`, `nohp_guru`, `email_guru`, `nik`, `no_rek`, `lama_mengajar`, `pddknterakhir_guru`, `tmt`, `alamat_rumah`, `alamat_lembaga`, `penerima_hibah`, `foto_guru`, `foto_npwp`, `foto_ktp`, `foto_bukutabungan`, `foto_ijazah`, `status_guru`) VALUES
(1, 'SKNH20052901', 'Qomaindo-Dev', 'Bogor', '24-04-2004', 'L', '082122133144', 'sysadmin@sadm.com', '', '', 0, 'S3', '', 'Bogor', 'Jakarta- Bogor', 0, '1590726082578.jpg', '', '', '', '', 2),
(2, 'SKNH20052902', 'Daud Nuryasin', 'Bogor', '1998-05-31', 'L', '082929292929', 'daud@sknh.com', '', '', 0, 'D3', '2017-07-27', 'Sidang barang jero, bogor', 'Bogor Timur', 0, '1590727723422.jpg', '', '', '', '', 1),
(5, 'SKNH20062003', 'Alfiansyah', 'Bogor', '2020-06-21', 'L', '0819239180290', 'alfiansyah@sknh.com', '5617253761527635', '31232635712516', 11, 'D3', '2020-06-21', 'Parung', 'Jakarta Timur', 1, '1592675919905.jpg', '', '15926759199052.jpg', '1592677871898.jpg', '15926759199054.jpg', 1);

-- --------------------------------------------------------

--
-- Table structure for table `m_santri`
--

CREATE TABLE `m_santri` (
  `santri_id` int(11) NOT NULL,
  `nis` varchar(20) NOT NULL,
  `nisn` varchar(30) NOT NULL,
  `nama_santri` varchar(150) NOT NULL,
  `tmplahir_santri` varchar(50) NOT NULL,
  `tgllahir_santri` varchar(11) NOT NULL,
  `jkel_santri` varchar(1) NOT NULL,
  `usia_santri` int(11) NOT NULL,
  `password` varchar(255) NOT NULL,
  `tingkat_id` int(11) NOT NULL,
  `kelas_id` int(11) NOT NULL,
  `alamat_santri` text NOT NULL,
  `keterangan_santri` text NOT NULL,
  `foto_santri` varchar(255) NOT NULL,
  `nama_wali` varchar(150) NOT NULL,
  `foto_aktakelahiran` varchar(255) NOT NULL,
  `foto_kk` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `m_santri`
--

INSERT INTO `m_santri` (`santri_id`, `nis`, `nisn`, `nama_santri`, `tmplahir_santri`, `tgllahir_santri`, `jkel_santri`, `usia_santri`, `password`, `tingkat_id`, `kelas_id`, `alamat_santri`, `keterangan_santri`, `foto_santri`, `nama_wali`, `foto_aktakelahiran`, `foto_kk`) VALUES
(1, '200613001', '1274681276', 'Aninaya', 'Bogor', '1998-05-29', 'P', 22, '4e7707e81899aa2f30e6157e34d2065f', 1, 0, 'bogor', 'Jalan puncak bogor', '1590767074555.jpg', 'test', '', ''),
(2, '200613002', '', 'Testing ke dua', 'Bogor', '1998-05-30', 'L', 22, '66331da58b153981c1df44d0d163fe6e', 1, 0, 'SBJ', 'Orang Guanteng', '1590767874442.png', 'Test aja inimah', '', '1592918043569.jpg'),
(3, '200623003', '', 'Abd Muklis', 'Jember', '2016-01-11', 'L', 4, '5684ca481604d139bd19d382e723ddd9', 1, 0, 'Empang tea', 'bingung isi apaan', '1592918206050.jpg', 'Anjay', '1592918795006.jpg', '');

-- --------------------------------------------------------

--
-- Table structure for table `t_absen`
--

CREATE TABLE `t_absen` (
  `absen_id` int(11) NOT NULL,
  `jadwal_id` int(11) NOT NULL,
  `santri_id` int(11) NOT NULL,
  `hadir` enum('1','0') NOT NULL,
  `izin` enum('1','0') NOT NULL,
  `alfa` enum('1','0') NOT NULL,
  `sakit` enum('1','0') NOT NULL,
  `keterangan` text NOT NULL,
  `tanggal` date NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Table structure for table `t_ayah`
--

CREATE TABLE `t_ayah` (
  `ayah_id` int(11) NOT NULL,
  `santri_id` int(11) NOT NULL,
  `nik_ayah` varchar(50) NOT NULL,
  `nama_ayah` varchar(150) NOT NULL,
  `pekerjaan_ayah` varchar(150) NOT NULL,
  `nohp_ayah` varchar(15) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `t_ayah`
--

INSERT INTO `t_ayah` (`ayah_id`, `santri_id`, `nik_ayah`, `nama_ayah`, `pekerjaan_ayah`, `nohp_ayah`) VALUES
(1, 1, '', '', '', ''),
(2, 2, '1199337755', 'Pak Testing', 'Tukang ngetes', '081133557799'),
(3, 3, '', '', '', '');

-- --------------------------------------------------------

--
-- Table structure for table `t_berita`
--

CREATE TABLE `t_berita` (
  `berita_id` int(11) NOT NULL,
  `user_id` int(11) NOT NULL,
  `judul_berita` varchar(150) NOT NULL,
  `sub_judul_berita` varchar(150) NOT NULL,
  `isi_berita` text NOT NULL,
  `tgl_diunggah` date NOT NULL,
  `tgl_berita` date NOT NULL,
  `foto_berita` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `t_berita`
--

INSERT INTO `t_berita` (`berita_id`, `user_id`, `judul_berita`, `sub_judul_berita`, `isi_berita`, `tgl_diunggah`, `tgl_berita`, `foto_berita`) VALUES
(1, 1, 'Peringatan Maulid Nabi', 'acara peringatan maulid nabi', 'Peringatan maulid Nabi muhammad SAW.', '2020-06-13', '2020-06-17', '1592075108423.jpg'),
(2, 1, 'UN ditiadakan', 'ujian nasional di tiadakan', 'Ujian Nasional ditiadakan, sesuai dengan keputusan pemerintah.', '2020-06-13', '2020-06-13', '1592074502448.jpg'),
(3, 1, 'Berita Baru', 'berita terhangat', '<p>Berita Terhangat</p>\r\n\r\n<ol>\r\n	<li>Berita</li>\r\n	<li>Hangat</li>\r\n</ol>\r\n', '2020-06-16', '2020-06-15', '1592296340698.jpg'),
(4, 1, 'Test Berita', 'testing berita ke-2', '<p><br />\r\nBerita ke :</p>\r\n\r\n<ol>\r\n	<li>Berita ke 1 <strong>(Done)</strong></li>\r\n	<li>Berita ke 2 <strong>(Done)</strong></li>\r\n</ol>\r\n', '2020-06-16', '2020-06-16', '1592296567157.png');

-- --------------------------------------------------------

--
-- Table structure for table `t_company`
--

CREATE TABLE `t_company` (
  `company_id` bigint(64) NOT NULL,
  `sekolah_id` bigint(64) NOT NULL,
  `no_sk` varchar(150) CHARACTER SET latin1 NOT NULL,
  `company_name` char(150) CHARACTER SET latin1 DEFAULT NULL,
  `company_phone` char(15) CHARACTER SET latin1 DEFAULT NULL,
  `company_email` char(150) CHARACTER SET latin1 DEFAULT NULL,
  `company_address` text CHARACTER SET latin1,
  `company_visi` char(255) CHARACTER SET latin1 DEFAULT NULL,
  `company_misi` char(255) CHARACTER SET latin1 DEFAULT NULL,
  `link_fb` text CHARACTER SET latin1 NOT NULL,
  `link_ig` text CHARACTER SET latin1 NOT NULL,
  `about_history` text CHARACTER SET latin1 NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_bin;

--
-- Dumping data for table `t_company`
--

INSERT INTO `t_company` (`company_id`, `sekolah_id`, `no_sk`, `company_name`, `company_phone`, `company_email`, `company_address`, `company_visi`, `company_misi`, `link_fb`, `link_ig`, `about_history`) VALUES
(3, 2, 'AHU-0000376.AH.01.04', 'TK Qur\'an', '021221902', 'tkquran@gmail.com', 'Jl. Masjid AL Akbar RT 05 RW 02 No.34, Munjul, Cipayung, Jakarta Timur', 'VISI KE 1', 'MISI KE 1', 'DATANYA MASIH KOSONG', 'https://www.instagram.com/rumahtahfidzsakinah/', 'BELUM ADA DATANYA'),
(4, 3, 'AHU-0000376.AH.01.04', 'TPQ', '021221902', 'sdsakinah@gmail.com', 'Jl. Masjid AL Akbar RT 05 RW 02 No.34, Munjul, Cipayung, Jakarta Timur', 'VISI KE-1', 'MISI KE-1', 'MASIH KOSONG', 'https://www.instagram.com/rumahtahfidzsakinah/', 'BELUM ADA, MASIH KOSONG');

-- --------------------------------------------------------

--
-- Table structure for table `t_datappdb`
--

CREATE TABLE `t_datappdb` (
  `datappdb_id` varchar(15) NOT NULL,
  `nisn` varchar(30) NOT NULL,
  `nama_lengkap` varchar(150) NOT NULL,
  `password` varchar(255) NOT NULL,
  `tempat_lahir` varchar(50) NOT NULL,
  `tgl_lahir` varchar(11) NOT NULL,
  `usia` int(11) NOT NULL,
  `jenis_kelamin` varchar(1) NOT NULL,
  `nik_ayah` varchar(50) NOT NULL,
  `nama_ayah` varchar(150) NOT NULL,
  `pekerjaan_ayah` varchar(150) NOT NULL,
  `nik_ibu` varchar(50) NOT NULL,
  `nama_ibu` varchar(150) NOT NULL,
  `pekerjaan_ibu` varchar(150) NOT NULL,
  `nama_wali` varchar(150) NOT NULL,
  `no_hp` varchar(15) NOT NULL,
  `foto_formal` varchar(255) NOT NULL,
  `foto_aktakelahiran` varchar(255) NOT NULL,
  `foto_kk` varchar(255) NOT NULL,
  `status_datappdb` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `t_datappdb`
--

INSERT INTO `t_datappdb` (`datappdb_id`, `nisn`, `nama_lengkap`, `password`, `tempat_lahir`, `tgl_lahir`, `usia`, `jenis_kelamin`, `nik_ayah`, `nama_ayah`, `pekerjaan_ayah`, `nik_ibu`, `nama_ibu`, `pekerjaan_ibu`, `nama_wali`, `no_hp`, `foto_formal`, `foto_aktakelahiran`, `foto_kk`, `status_datappdb`) VALUES
('2020-001', '', 'Daud Nuryasin', '', 'Bogor', '1998-05-31', 0, '', '112233', 'Yasin', 'Kerja Wira Usaha', '332211', 'Nur', 'Kerja Ngajar', '', '', '', '', '', 1),
('2020-002', '', 'Ani Nur Anggraini', '8946ff10610fc61601092e963314a6af', 'Jakarta', '1999-07-07', 0, '', '131517', 'Abidin', 'Jualan', '115599', 'Hanifah', 'Ibu Rumah Tangga', '', '', '', '', '', 1),
('2020-003', '', 'test', '5f02dfb19092a5a9a0319e2856a12b26', 'test', '2019-05-04', 0, '', '112233', 'test', 'test', '332211', 'test', 'test', '', '', '', '', '', 1),
('2020-004', '', 'Daud Nuryasin', '8946ff10610fc61601092e963314a6af', 'Bogor', '1999-07-07', 0, '', '112233', 'Abidin', 'Jualan', '115599', 'test', 'Ibu Rumah Tangga', '', '', '', '', '', 1);

-- --------------------------------------------------------

--
-- Table structure for table `t_ibu`
--

CREATE TABLE `t_ibu` (
  `ibu_id` int(11) NOT NULL,
  `santri_id` int(11) NOT NULL,
  `nik_ibu` varchar(50) NOT NULL,
  `nama_ibu` varchar(150) NOT NULL,
  `pekerjaan_ibu` varchar(150) NOT NULL,
  `nohp_ibu` varchar(15) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `t_ibu`
--

INSERT INTO `t_ibu` (`ibu_id`, `santri_id`, `nik_ibu`, `nama_ibu`, `pekerjaan_ibu`, `nohp_ibu`) VALUES
(1, 1, '', '0', '0', '0'),
(2, 2, '1133557799', 'Bu Tester', 'Penerima Tester', '081199337755'),
(3, 3, '', '', '', '');

-- --------------------------------------------------------

--
-- Table structure for table `t_informasi`
--

CREATE TABLE `t_informasi` (
  `informasi_id` int(11) NOT NULL,
  `user_id` int(11) NOT NULL,
  `tgl_unggah` date NOT NULL,
  `judul_info` varchar(150) NOT NULL,
  `sub_judul` varchar(150) NOT NULL,
  `isi_info` text NOT NULL,
  `tgl_info` date NOT NULL,
  `foto_info` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `t_informasi`
--

INSERT INTO `t_informasi` (`informasi_id`, `user_id`, `tgl_unggah`, `judul_info`, `sub_judul`, `isi_info`, `tgl_info`, `foto_info`) VALUES
(2, 1, '2020-06-12', 'PPD', 'pembukaan ppdb online', 'Pendaftaran Peserta Didik Baru', '2020-06-12', '1591946333859.png'),
(9, 1, '2020-06-16', 'test', 'test', '<p>haiiiii, ini cuma testing yah :</p>\r\n\r\n<ol>\r\n	<li>Test 1</li>\r\n	<li>Test 2</li>\r\n</ol>\r\n', '2020-06-13', '1592294415479.jpg'),
(10, 1, '2020-06-16', 'Test', 'testing lagi', '<p><br />\r\nHalo, nama saya Anisa Fahirah.</p>\r\n\r\n<ol>\r\n	<li>Umur 12</li>\r\n	<li>Tinggi 160</li>\r\n</ol>\r\n', '2020-06-16', '1592295255357.jpg'),
(11, 1, '2020-06-16', 'Sejarah Sekolah', 'sejarah rumah tahfidz & tpq \'sakinah\'', '<p><strong>Bismillahirohmanirrohim </strong></p>\r\n\r\n<p><strong>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp; </strong>Puji syukur Alhamdullilah senantiasa kita panjatkan kehadirat ALLAH Swt. Hanya kepadanya kita bergantung serta memohon. Dialah zat yang menciptakan Jin dan Manusia untuk beribadah kepada-NYA.</p>\r\n\r\n<p>Sholawat dan salam semoga tercurahkan kepada junjungan kita Nabi Muhammad SAW. Beliaulah yang telah memberikan Bimbingan kepada kita kejalan yang diridhoi ALLAH SWT.</p>\r\n\r\n<p>Pada awalnya belum ada niat untuk mendirikan <strong>rumah Tahfidz &amp; TPQ &#39;SAKINAH&#39;</strong> kita mengaji seperti biasa &nbsp;( secara tradisional ) di musholla kemudian rumah dengan guru yang tidak mengikuti metode apapun hanya menggunakan Al- Quran saja.</p>\r\n\r\n<p>Seiring dengan berjalannya waktu dan ada dorongan dari masyarakat serta bantuan dana yang mereka berikan, maka dipandang perlu untuk mendirikan TPQ dengan izin dari kementrian Agama . Dengan tujuan untuk membekali anak-anak tentang AL-Quran secara benar baik fashokhah maupun tartilnya. Juga ada materi sholat, wudhu, do&rsquo;a sehari-hari dan hafalan surat pendek dan &nbsp;tidak kalah pentingnya tajwid dan ghoribnya.</p>\r\n\r\n<p>Maka pada tahun 2017 berdirilah <strong>&nbsp;rumah Tahfidz &amp; TPQ &#39;SAKINAH&#39; </strong>dan kami mulai mengurus perizinannya ke kementrian Agama.</p>\r\n\r\n<p>Guru&nbsp; &ndash; guru diambil dari lingkungan sekitar sehingga dapat memudahkan membantu menyampaikan materi pada anak-anak</p>\r\n\r\n<p>Semoga dengan adanya <strong>rumah Tahfidz &amp; TPQ &#39;SAKINAH&#39;</strong> ini anak- anak bisa mendapatkan ilmu yang bermanfaat dan selamat dunia maupun akhirat.</p>\r\n\r\n<p>Kami memohon do&rsquo;a kepada semuanya semoga Allah swt selalu meridhoi dan memberikan barokahNYA kepada santri dan para Ustadz/Ustadzah<strong> rumah Tahfidz &amp; TPQ &#39;SAKINAH&#39;.</strong> Semoga ALLAH SWT membalas kebaikan Bapak dan Meridhoi Nya.</p>\r\n', '2020-06-16', '1592307443676.jpeg'),
(12, 1, '2020-06-16', 'test informasi', 'informasi', '<ul>\r\n	<li>lalalala nananana babababa tralalala</li>\r\n	<li>babibubebo</li>\r\n</ul>\r\n', '2020-06-15', '1592308245333.jpg');

-- --------------------------------------------------------

--
-- Table structure for table `t_jadwal`
--

CREATE TABLE `t_jadwal` (
  `jadwal_id` int(11) NOT NULL,
  `kelas_id` int(11) NOT NULL,
  `guru_id` int(11) NOT NULL,
  `mapel_id` int(11) NOT NULL,
  `hari` varchar(20) NOT NULL,
  `jam_masuk` time NOT NULL,
  `jam_keluar` time NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `t_jadwal`
--

INSERT INTO `t_jadwal` (`jadwal_id`, `kelas_id`, `guru_id`, `mapel_id`, `hari`, `jam_masuk`, `jam_keluar`) VALUES
(1, 2, 5, 1, 'Senin', '12:00:00', '02:15:00'),
(2, 2, 5, 2, 'Minggu', '00:15:00', '02:45:00');

-- --------------------------------------------------------

--
-- Table structure for table `t_kelas`
--

CREATE TABLE `t_kelas` (
  `kelas_id` int(11) NOT NULL,
  `tingkat_id` int(11) NOT NULL,
  `nip` varchar(12) NOT NULL,
  `nama_kelas` varchar(50) NOT NULL,
  `waktu` varchar(20) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `t_kelas`
--

INSERT INTO `t_kelas` (`kelas_id`, `tingkat_id`, `nip`, `nama_kelas`, `waktu`) VALUES
(1, 1, 'SKNH20052902', 'TKQ-A', 'Sore'),
(2, 1, 'SKNH20052902', 'TKQ-B', 'Sore'),
(3, 1, 'SKNH20052902', 'TKQ-C', 'Sore'),
(4, 2, 'SKNH20052902', 'TPQ-A', 'Sore');

-- --------------------------------------------------------

--
-- Table structure for table `t_kontakkami`
--

CREATE TABLE `t_kontakkami` (
  `kontak_id` int(11) NOT NULL,
  `judul_kontak` varchar(150) NOT NULL,
  `deskripsi_kontak` text NOT NULL,
  `tgl_kontak` varchar(11) NOT NULL,
  `nama_pengirim` varchar(150) NOT NULL,
  `email_pengirim` varchar(150) NOT NULL,
  `nohp_pengirim` varchar(15) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `t_kontakkami`
--

INSERT INTO `t_kontakkami` (`kontak_id`, `judul_kontak`, `deskripsi_kontak`, `tgl_kontak`, `nama_pengirim`, `email_pengirim`, `nohp_pengirim`) VALUES
(1, 'Bertanya soal PPDB', 'Kapan PPDB akan dibuka dan apa saja persyaratannya.?', '20200613', 'Udin', 'udin@gmail.com', '08282828282');

-- --------------------------------------------------------

--
-- Table structure for table `t_mapel`
--

CREATE TABLE `t_mapel` (
  `mapel_id` int(11) NOT NULL,
  `nama_mapel` varchar(128) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `t_mapel`
--

INSERT INTO `t_mapel` (`mapel_id`, `nama_mapel`) VALUES
(1, 'Matematika'),
(2, 'Bahasa Indonesia');

-- --------------------------------------------------------

--
-- Table structure for table `t_role`
--

CREATE TABLE `t_role` (
  `role_id` int(11) NOT NULL,
  `role_code` varchar(10) NOT NULL,
  `role_name` varchar(20) NOT NULL,
  `role_status` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `t_role`
--

INSERT INTO `t_role` (`role_id`, `role_code`, `role_name`, `role_status`) VALUES
(1, 'SADM', 'Sysadmin', 1),
(2, 'MNJM', 'Manajemen', 1),
(3, 'PGJR', 'Pengajar', 1);

-- --------------------------------------------------------

--
-- Table structure for table `t_sekolah`
--

CREATE TABLE `t_sekolah` (
  `sekolah_id` int(11) NOT NULL,
  `yayasan_id` int(11) NOT NULL,
  `nama_sekolah` varchar(150) NOT NULL,
  `alamat_sekolah` text NOT NULL,
  `thn_pendirian` year(4) NOT NULL,
  `thn_perizinan` year(4) NOT NULL,
  `nama_pendiri` varchar(70) NOT NULL,
  `metode_pembelajaran` varchar(20) NOT NULL,
  `waktu_pembelajaran` text NOT NULL,
  `visi_sekolah` text NOT NULL,
  `misi_sekolah` text NOT NULL,
  `sejarah_sekolah` text NOT NULL,
  `link_fb` varchar(255) NOT NULL,
  `link_ig` varchar(255) NOT NULL,
  `link_maps` varchar(255) NOT NULL,
  `logo_sekolah` varchar(255) NOT NULL,
  `struktur_organisasi` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `t_sekolah`
--

INSERT INTO `t_sekolah` (`sekolah_id`, `yayasan_id`, `nama_sekolah`, `alamat_sekolah`, `thn_pendirian`, `thn_perizinan`, `nama_pendiri`, `metode_pembelajaran`, `waktu_pembelajaran`, `visi_sekolah`, `misi_sekolah`, `sejarah_sekolah`, `link_fb`, `link_ig`, `link_maps`, `logo_sekolah`, `struktur_organisasi`) VALUES
(1, 1, 'Rumah Tahfidz & TPQ \'SAKINAH\'', 'Jl.Masjid Al Akbar Rt 005 Rw 002 No.34 - Munjul Cipayung - Jakarta Timur', 2003, 2017, 'Edi linarso,SH.i', 'Iqro', '<ul>\r\n	<li>Pagi 10.00 s/d 12.00 WIB</li>\r\n	<li>Sore 16.00 s/d 18.30 WIB</li>\r\n	<li>Malam 18.30 s/d 20.00 WIB</li>\r\n</ul>\r\n', '<p><strong><em>Mencetak generasi Hafidz/Hafidzoh serta membentuk generasi muda yang Qur&rsquo;ani, Bertaqwa dan ber-akhlaqul Karimah</em>.</strong></p>\r\n', '<ol>\r\n	<li>Membekali santri terampil membaca Al-Quran dengan baik dan benar.</li>\r\n	<li>Membekali santri terampil menghafal surat &ndash; surat pendek.</li>\r\n	<li>Membekali santri taat pada ALLAH, RosulNYA, dan berbakti kepada Orang Tua.</li>\r\n	<li>Membekali santri dengan kebiasaan melaksanakan sholat.</li>\r\n	<li>Membekali santri dengan doa-doa sholat dan doa-doa sehari-hari.</li>\r\n	<li>Membiasakan santri dengan cinta sesama.</li>\r\n</ol>\r\n', '<p><strong>Bismillahirohmanirrohim </strong></p>\r\n\r\n<p>&nbsp;</p>\r\n\r\n<p><strong>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp; </strong>Puji syukur Alhamdullilah senantiasa kita panjatkan kehadirat ALLAH Swt. Hanya kepadanya kita bergantung serta memohon. Dialah zat yang menciptakan Jin dan Manusia untuk beribadah kepada-NYA.</p>\r\n\r\n<p>Sholawat dan salam semoga tercurahkan kepada junjungan kita Nabi Muhammad SAW. Beliaulah yang telah memberikan Bimbingan kepada kita kejalan yang diridhoi ALLAH SWT.</p>\r\n\r\n<p>Pada awalnya belum ada niat untuk mendirikan <strong>rumah Tahfidz &amp; TPQ &#39;SAKINAH&#39;</strong> kita mengaji seperti biasa &nbsp;( secara tradisional ) di musholla kemudian rumah dengan guru yang tidak mengikuti metode apapun hanya menggunakan Al- Quran saja.</p>\r\n\r\n<p>Seiring dengan berjalannya waktu dan ada dorongan dari masyarakat serta bantuan dana yang mereka berikan, maka dipandang perlu untuk mendirikan TPQ dengan izin dari kementrian Agama . Dengan tujuan untuk membekali anak-anak tentang AL-Quran secara benar baik fashokhah maupun tartilnya. Juga ada materi sholat, wudhu, do&rsquo;a sehari-hari dan hafalan surat pendek dan &nbsp;tidak kalah pentingnya tajwid dan ghoribnya.</p>\r\n\r\n<p>Maka pada tahun 2017 berdirilah <strong>&nbsp;rumah Tahfidz &amp; TPQ &#39;SAKINAH&#39; </strong>dan kami mulai mengurus perizinannya ke kementrian Agama.</p>\r\n\r\n<p>Guru&nbsp; &ndash; guru diambil dari lingkungan sekitar sehingga dapat memudahkan membantu menyampaikan materi pada anak-anak</p>\r\n\r\n<p>Semoga dengan adanya <strong>rumah Tahfidz &amp; TPQ &#39;SAKINAH&#39;</strong> ini anak- anak bisa mendapatkan ilmu yang bermanfaat dan selamat dunia maupun akhirat.</p>\r\n\r\n<p>Kami memohon do&rsquo;a kepada semuanya semoga Allah swt selalu meridhoi dan memberikan barokahNYA kepada santri dan para Ustadz/Ustadzah<strong> rumah Tahfidz &amp; TPQ &#39;SAKINAH&#39;.</strong> Semoga ALLAH SWT membalas kebaikan Bapak dan Meridhoi Nya.</p>\r\n', 'kosong', 'https://www.instagram.com/rumahtahfidzsakinah/', 'https://www.google.com/maps/embed?pb=!1m18!1m12!1m3!1d253713.31496703727!2d106.70292175907623!3d-6.487384165359382!2m3!1f0!2f0!3f0!3m2!1i1024!2i768!4f13.1!3m3!1m2!1s0x2e69eb93bc72670b%3A0x1894d17bf9e6d739!2sSMK+YAPPA!5e0!3m2!1sid!2sid!4v1545295569560', '34f02c0fb9267aaeb784fd4f875297dd.png', '875d5b8369e19aafaa5ff411a6e38547.jpg');

-- --------------------------------------------------------

--
-- Table structure for table `t_tingkat`
--

CREATE TABLE `t_tingkat` (
  `tingkat_id` int(11) NOT NULL,
  `kode_tingkat` varchar(10) NOT NULL,
  `nama_tingkat` varchar(70) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `t_tingkat`
--

INSERT INTO `t_tingkat` (`tingkat_id`, `kode_tingkat`, `nama_tingkat`) VALUES
(1, 'TKQ', 'TK Qur\'an'),
(2, 'TPQ', 'TP Qur\'an'),
(3, 'Tahfidz', 'Tahfidz');

-- --------------------------------------------------------

--
-- Table structure for table `t_user`
--

CREATE TABLE `t_user` (
  `user_id` int(11) NOT NULL,
  `role_id` int(11) NOT NULL,
  `nip` varchar(12) NOT NULL,
  `username` varchar(150) NOT NULL,
  `password` varchar(255) NOT NULL,
  `user_status` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `t_user`
--

INSERT INTO `t_user` (`user_id`, `role_id`, `nip`, `username`, `password`, `user_status`) VALUES
(1, 1, 'SKNH20052901', 'sysadmin@sadm.com', 'a9a9e9dcb45962970eac445259464b3f', 1),
(2, 2, 'SKNH20052902', 'daud@sknh.com', '4bb8efd4acf06507028a87ff01237cff', 1),
(3, 3, 'SKNH20062003', 'alfiansyah@sknh.com', 'b7e6e677859670d05a52a609e0a44534', 1);

-- --------------------------------------------------------

--
-- Table structure for table `t_yayasan`
--

CREATE TABLE `t_yayasan` (
  `yayasan_id` int(11) NOT NULL,
  `no_sk` varchar(150) NOT NULL,
  `tahun_sk` year(4) NOT NULL,
  `akta_notaris` varchar(150) NOT NULL,
  `nama_yayasan` varchar(150) NOT NULL,
  `telfon_yayasan` varchar(15) NOT NULL,
  `email_yayasan` varchar(50) NOT NULL,
  `alamat_yayasan` text NOT NULL,
  `logo_yayasan` varchar(255) NOT NULL,
  `background_web` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `t_yayasan`
--

INSERT INTO `t_yayasan` (`yayasan_id`, `no_sk`, `tahun_sk`, `akta_notaris`, `nama_yayasan`, `telfon_yayasan`, `email_yayasan`, `alamat_yayasan`, `logo_yayasan`, `background_web`) VALUES
(1, 'AHU-0000376.AH.01.04', 2018, 'No 3 Tanggal 10 Januari 2018', 'YAYASAN PATRA ILMU SAKINAH (PIS)', '0221001444', 'putrailmusakinah@gmail.com', 'Jl. Masjid AL Akbar RT 05 RW 02 No.34, Munjul, Cipayung, Jakarta Timur', '06af35683337641266dac102c9e5998e.jpeg', '23b110773f2e3e3bf96090686d19096d.jpg');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `m_guru`
--
ALTER TABLE `m_guru`
  ADD PRIMARY KEY (`guru_id`,`nip`),
  ADD KEY `kode_guru` (`nip`);

--
-- Indexes for table `m_santri`
--
ALTER TABLE `m_santri`
  ADD PRIMARY KEY (`santri_id`);

--
-- Indexes for table `t_absen`
--
ALTER TABLE `t_absen`
  ADD PRIMARY KEY (`absen_id`),
  ADD KEY `jadwal_id` (`jadwal_id`),
  ADD KEY `santri_id` (`santri_id`);

--
-- Indexes for table `t_ayah`
--
ALTER TABLE `t_ayah`
  ADD PRIMARY KEY (`ayah_id`);

--
-- Indexes for table `t_berita`
--
ALTER TABLE `t_berita`
  ADD PRIMARY KEY (`berita_id`);

--
-- Indexes for table `t_company`
--
ALTER TABLE `t_company`
  ADD PRIMARY KEY (`company_id`),
  ADD KEY `no_sk` (`no_sk`),
  ADD KEY `fk_sekolah_id_t_sekolah_to_t_company` (`sekolah_id`);

--
-- Indexes for table `t_datappdb`
--
ALTER TABLE `t_datappdb`
  ADD PRIMARY KEY (`datappdb_id`);

--
-- Indexes for table `t_ibu`
--
ALTER TABLE `t_ibu`
  ADD PRIMARY KEY (`ibu_id`);

--
-- Indexes for table `t_informasi`
--
ALTER TABLE `t_informasi`
  ADD PRIMARY KEY (`informasi_id`);

--
-- Indexes for table `t_jadwal`
--
ALTER TABLE `t_jadwal`
  ADD PRIMARY KEY (`jadwal_id`),
  ADD KEY `guru_id` (`guru_id`),
  ADD KEY `mapel_id` (`mapel_id`),
  ADD KEY `kelas_id` (`kelas_id`);

--
-- Indexes for table `t_kelas`
--
ALTER TABLE `t_kelas`
  ADD PRIMARY KEY (`kelas_id`);

--
-- Indexes for table `t_kontakkami`
--
ALTER TABLE `t_kontakkami`
  ADD PRIMARY KEY (`kontak_id`);

--
-- Indexes for table `t_mapel`
--
ALTER TABLE `t_mapel`
  ADD PRIMARY KEY (`mapel_id`);

--
-- Indexes for table `t_role`
--
ALTER TABLE `t_role`
  ADD PRIMARY KEY (`role_id`);

--
-- Indexes for table `t_sekolah`
--
ALTER TABLE `t_sekolah`
  ADD PRIMARY KEY (`sekolah_id`),
  ADD KEY `yayasan_id` (`yayasan_id`);

--
-- Indexes for table `t_tingkat`
--
ALTER TABLE `t_tingkat`
  ADD PRIMARY KEY (`tingkat_id`);

--
-- Indexes for table `t_user`
--
ALTER TABLE `t_user`
  ADD PRIMARY KEY (`user_id`);

--
-- Indexes for table `t_yayasan`
--
ALTER TABLE `t_yayasan`
  ADD PRIMARY KEY (`yayasan_id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `m_guru`
--
ALTER TABLE `m_guru`
  MODIFY `guru_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;

--
-- AUTO_INCREMENT for table `m_santri`
--
ALTER TABLE `m_santri`
  MODIFY `santri_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT for table `t_absen`
--
ALTER TABLE `t_absen`
  MODIFY `absen_id` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `t_ayah`
--
ALTER TABLE `t_ayah`
  MODIFY `ayah_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT for table `t_berita`
--
ALTER TABLE `t_berita`
  MODIFY `berita_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- AUTO_INCREMENT for table `t_company`
--
ALTER TABLE `t_company`
  MODIFY `company_id` bigint(64) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- AUTO_INCREMENT for table `t_ibu`
--
ALTER TABLE `t_ibu`
  MODIFY `ibu_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT for table `t_informasi`
--
ALTER TABLE `t_informasi`
  MODIFY `informasi_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=13;

--
-- AUTO_INCREMENT for table `t_jadwal`
--
ALTER TABLE `t_jadwal`
  MODIFY `jadwal_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT for table `t_kelas`
--
ALTER TABLE `t_kelas`
  MODIFY `kelas_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- AUTO_INCREMENT for table `t_kontakkami`
--
ALTER TABLE `t_kontakkami`
  MODIFY `kontak_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT for table `t_mapel`
--
ALTER TABLE `t_mapel`
  MODIFY `mapel_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT for table `t_role`
--
ALTER TABLE `t_role`
  MODIFY `role_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT for table `t_sekolah`
--
ALTER TABLE `t_sekolah`
  MODIFY `sekolah_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT for table `t_tingkat`
--
ALTER TABLE `t_tingkat`
  MODIFY `tingkat_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT for table `t_user`
--
ALTER TABLE `t_user`
  MODIFY `user_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT for table `t_yayasan`
--
ALTER TABLE `t_yayasan`
  MODIFY `yayasan_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
