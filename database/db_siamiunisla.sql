-- phpMyAdmin SQL Dump
-- version 5.2.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Dec 29, 2023 at 07:47 AM
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
-- Database: `db_siamiunisla`
--

-- --------------------------------------------------------

--
-- Table structure for table `audit`
--

CREATE TABLE `audit` (
  `ID_AUDIT` int(11) NOT NULL,
  `ID_AUDITEE` int(11) DEFAULT NULL,
  `ID_JAWAB` int(11) DEFAULT NULL,
  `NILAI_AUDITEE` decimal(10,2) DEFAULT NULL,
  `NILAI_AUDITOR` decimal(10,2) DEFAULT NULL,
  `ID_AUDITOR` int(11) DEFAULT NULL,
  `DOKUMEN` varchar(555) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `audit`
--

INSERT INTO `audit` (`ID_AUDIT`, `ID_AUDITEE`, `ID_JAWAB`, `NILAI_AUDITEE`, `NILAI_AUDITOR`, `ID_AUDITOR`, `DOKUMEN`) VALUES
(1, 1, 1, 4.00, 1.00, 1, 'https://github.com/newmiftah'),
(2, 1, 6, 4.00, 4.00, NULL, NULL),
(3, 1, 11, 3.00, 1.00, NULL, NULL),
(4, 1, 16, 3.00, 2.00, NULL, NULL),
(5, 1, 21, 0.80, 3.00, NULL, NULL),
(6, 1, 23, 3.00, 1.00, NULL, NULL),
(7, 1, 28, 2.00, 0.00, NULL, NULL),
(8, 1, 30, 3.00, 2.00, NULL, NULL),
(9, 1, 36, 4.00, 0.00, NULL, NULL),
(10, 1, 40, 2.00, NULL, NULL, NULL),
(11, 1, 45, 3.11, NULL, NULL, NULL),
(12, 1, 47, 2.00, NULL, NULL, NULL),
(13, 1, 48, 3.71, NULL, NULL, NULL),
(14, 1, 52, 1.57, NULL, NULL, NULL),
(15, 1, 56, 4.00, NULL, NULL, NULL),
(16, 1, 57, 4.00, NULL, NULL, NULL),
(17, 1, 58, 2.44, NULL, NULL, NULL),
(18, 1, 60, 3.33, NULL, NULL, NULL),
(19, 1, 62, 2.56, NULL, NULL, NULL),
(20, 1, 66, 3.00, NULL, NULL, NULL),
(21, 1, 77, 4.00, NULL, NULL, NULL),
(22, 1, 79, 2.14, NULL, NULL, NULL),
(23, 1, 83, 3.00, NULL, NULL, NULL),
(24, 1, 88, 4.00, NULL, NULL, NULL),
(25, 1, 93, 1.00, NULL, NULL, NULL),
(26, 1, 101, 3.00, NULL, NULL, NULL),
(27, 1, 103, 4.00, NULL, NULL, NULL),
(28, 1, 108, 2.00, NULL, NULL, NULL),
(29, NULL, 113, NULL, NULL, NULL, NULL),
(30, 1, 114, 2.00, NULL, NULL, NULL),
(31, NULL, 119, NULL, NULL, NULL, NULL),
(32, NULL, 124, NULL, NULL, NULL, NULL),
(33, NULL, 129, NULL, NULL, NULL, NULL),
(34, NULL, 134, NULL, NULL, NULL, NULL),
(35, NULL, 139, NULL, NULL, NULL, NULL),
(36, NULL, 144, NULL, NULL, NULL, NULL),
(37, NULL, 149, NULL, NULL, NULL, NULL),
(38, 1, 154, 2.74, NULL, NULL, NULL),
(39, NULL, 156, NULL, NULL, NULL, NULL),
(40, NULL, 161, NULL, NULL, NULL, NULL),
(41, NULL, 166, NULL, NULL, NULL, NULL),
(42, NULL, 171, NULL, NULL, NULL, NULL),
(43, NULL, 176, NULL, NULL, NULL, NULL),
(44, NULL, 181, NULL, NULL, NULL, NULL),
(45, NULL, 186, NULL, NULL, NULL, NULL),
(46, 1, 191, 4.00, NULL, NULL, NULL),
(47, NULL, 195, NULL, NULL, NULL, NULL),
(48, NULL, 198, NULL, NULL, NULL, NULL),
(49, NULL, 204, NULL, NULL, NULL, NULL),
(50, 1, 209, 4.00, NULL, NULL, NULL),
(51, NULL, 211, NULL, NULL, NULL, NULL),
(52, 1, 215, 3.76, NULL, NULL, NULL),
(53, 1, 216, 0.00, NULL, NULL, NULL),
(54, 1, 220, 0.00, NULL, NULL, NULL),
(55, 1, 224, 4.00, NULL, NULL, NULL),
(56, 1, 225, 2.32, NULL, NULL, NULL),
(57, 1, 226, 1.82, NULL, NULL, NULL),
(58, 1, 227, 4.00, NULL, NULL, NULL),
(59, 1, 228, 3.67, NULL, NULL, NULL),
(60, 1, 229, 3.00, NULL, NULL, NULL),
(61, 1, 234, 3.00, NULL, NULL, NULL),
(62, 1, 236, 2.17, NULL, NULL, NULL);

-- --------------------------------------------------------

--
-- Table structure for table `auditee`
--

CREATE TABLE `auditee` (
  `ID_AUDITEE` int(11) NOT NULL,
  `NAMA` varchar(255) DEFAULT NULL,
  `USERNAME` varchar(100) DEFAULT NULL,
  `PASSWORD` varchar(50) DEFAULT NULL,
  `TANGGAL_LAHIR` date NOT NULL,
  `ALAMAT` text DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `auditee`
--

INSERT INTO `auditee` (`ID_AUDITEE`, `NAMA`, `USERNAME`, `PASSWORD`, `TANGGAL_LAHIR`, `ALAMAT`) VALUES
(1, 'AUDITEE 1', 'auditee1', '827ccb0eea8a706c4c34a16891f84e7b', '2023-12-13', 'Ds. Pucuk');

-- --------------------------------------------------------

--
-- Table structure for table `auditor`
--

CREATE TABLE `auditor` (
  `ID_AUDITOR` int(11) NOT NULL,
  `NAMA` varchar(50) DEFAULT NULL,
  `TANGGAL_LAHIR` date DEFAULT NULL,
  `ALAMAT` text DEFAULT NULL,
  `USERNAME` varchar(50) DEFAULT NULL,
  `PASSWORD` varchar(50) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `auditor`
--

INSERT INTO `auditor` (`ID_AUDITOR`, `NAMA`, `TANGGAL_LAHIR`, `ALAMAT`, `USERNAME`, `PASSWORD`) VALUES
(1, 'OK PAK GURU', '2024-11-27', 'DESA PUCUK KECAMATAN PUCUK KABUPATEN PUCUK LMG', 'auditor1', '827ccb0eea8a706c4c34a16891f84e7b'),
(2, 'ok bu', '2024-11-01', 'DESA PUCUK KECAMATAN PUCUK KABUPATEN PADENGAN', 'auditor2', '827ccb0eea8a706c4c34a16891f84e7b');

-- --------------------------------------------------------

--
-- Table structure for table `indikator`
--

CREATE TABLE `indikator` (
  `ID_INDIKATOR` int(11) NOT NULL,
  `ID_KRITERIA` int(11) DEFAULT NULL,
  `INDIKATOR` text DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `indikator`
--

INSERT INTO `indikator` (`ID_INDIKATOR`, `ID_KRITERIA`, `INDIKATOR`) VALUES
(1, 1, 'VMTS Prodi sesuai dengan VMTS UPPS dan PT'),
(2, 1, 'Mekanisme dan keterlibatan pemangku kepentingan dalam penyusunan VMTS Prodi'),
(3, 1, 'Adanya Sosialisasi dan pemahaman VMTS prodi yang meliputi:\r\n1. Adanya SK tim sosialisasi VMTS prodi\r\n2. Adanya bukti sosialisasi VMTS prodi\r\n3. Adanya laporan kegiatan sosialisasi VMTS prodi\r\n4. Adanya laporan pemahaman VMTS prodi kepada semua sivitas akademika'),
(4, 1, 'Strategi pencapaian tujuan disusun berdasarkan analisis yang sistematis, serta pada pelaksanaannya dilakukan pemantauan dan evaluasi yang ditindaklanjuti.  '),
(5, 2, 'Metode rekruitmen dan keketatan seleksi '),
(6, 2, 'UPPS melakukan upaya untuk meningkatkan animo calon mahasiswa dan terdapat bukti keberhasilannya.'),
(7, 2, 'UPPS menerima mahasiswa asing'),
(8, 2, 'Ketersediaan layanan kemahasiswaan di bidang: \n1) penalaran, minat dan bakat,\n2) kesejahteraan (bimbingan dan\nkonseling, layanan beasiswa, dan layanan kesehatan), dan\n3) bimbingan karir dan kewirausahaan.'),
(9, 2, 'Akses dan mutu layanan kemahasiswaan.'),
(10, 2, 'kerjasama kegiatan UKM  dengan institusi lain '),
(11, 3, 'Kecukupan jumlah dosen tetap perguruan tinggi yang ditugaskan sebagai pengampu mata kuliah dengan bidang keahlian yang sesuai dengan kompetensi inti program studi (DTPS)'),
(12, 3, 'Persentase jumlah DTPS berpendidikan Doktor/Doktor Terapan/Subspesialis terhadap jumlah DTPS'),
(13, 3, 'Persentase jumlah DTPS dengan jabatan akademik Lektor, Lektor Kepala dan Guru Besar terhadap jumlah DTPS'),
(14, 3, 'Rasio jumlah mahasiswa program studi terhadap jumlah DTPS'),
(15, 3, 'Rata-rata jumlah bimbingan sebagai pembimbing utama tugas akhir mahasiswa'),
(16, 3, 'Ekuivalensi Waktu Mengajar Penuh (EWMP) DT/DTPS pada kegiatan pendidikan (pembelajaran dan bimbingan), penelitian, PkM, dan tugas tambahan dan/atau penunjang'),
(17, 3, 'Persentase jumlah Dosen Tidak Tetap (DTT) terhadap jumlah DT'),
(18, 3, 'Pengakuan/rekognisi atas kepakaran/ prestasi/kinerja DTPS'),
(19, 3, 'Kegiatan penelitian DTPS yang relevan dengan bidang studi dalam 3 tahun terakhir'),
(20, 3, 'Publikasi ilmiah dengan tema yang relevan dengan bidang program studi yang dihasilkan DTPS dalam 3 tahun terakhir'),
(21, 3, 'Artikel karya ilmiah DTPS yang disitasi dalam 3 tahun terakhir'),
(22, 3, 'Kegiatan PkM DTPS yang relevan dengan bidang program studi dalam 3 tahun terakhir'),
(23, 3, 'Luaran penelitian dan PkM yang dihasilkan DTPS dalam 3 tahun terakhir'),
(24, 3, 'Kualifikasi dan tingkat kemampuan yang dimiliki oleh peneliti berdasarkan bidang keilmuan dan kedalaman penelitian'),
(25, 3, 'Kualifikasi dan tingkat kemampuan yang dimiliki oleh pelaksana pengabdian masyarakat berdasarkan bidang keilmuan yang sesuai dengan bidang keahlian'),
(26, 4, 'Penuangan tingkat kedalaman dan keluasan materi pembelajaran ke dalam bahan kajian yang distrukturkan dalam bentuk mata kuliah'),
(27, 4, 'Penetapan besarnya SKS mata kuliah berdasarkan tingkat kemampuan yang harus dicapai, kedalaman dan keluasan materi pembelajaran yang harus dikuasai dan metode yang digunakan'),
(28, 4, 'Ketersediaan susunan mata kuliah yang dilengkapi dengan uraian butir capaian pembelajaran lulusan yang dibebankan pada matakuliah tersebut dan rencana pembelajaran setiap mata kuiah'),
(29, 4, 'Integrasi kegiatan penelitian dan PkM dalam pembelajaran oleh DTPS dalam 3 tahun terakhir.'),
(30, 4, 'Pelaksanaan Karakteristik proses pembelajaran yang terdiri atas sifat 1) interaktif, 2) holistik, 3) integratif, 4) saintifik, 5) kontekstual, 6) tematik, 7) efektif, 8) kolaboratif, 9) religius, dan 10) berpusat pada mahasiswa.'),
(31, 4, 'Ketersediaan dan kelengkapan dokumen rencana pembelajaran semester (RPS)'),
(32, 4, 'Kedalaman dan keluasan RPS sesuai dengan capaian pembelajaran lulusan'),
(33, 4, 'Bentuk interaksi antara dosen, mahasiswa dan sumber belajar'),
(34, 4, 'Pemantauan kesesuaian proses terhadap rencana pembelajaran'),
(35, 4, 'Pelaksanaan proses pembelajaran yang terkait dengan penelitian memenuhi SN-Dikti pada bidang penelitian yang mencakup:\r\n1) hasil penelitian: harus memenuhi pengembangan IPTEKS, meningkatkan kesejahteraan masyarakat, dan daya saing bangsa.\r\n2) isi penelitian: memenuhi kedalaman dan keluasan materi penelitian sesuai capaian pembelajaran.\r\n3) proses penelitian: mencakup perencanaan, pelaksanaan, dan pelaporan.\r\n4) penilaian penelitian memenuhi unsur edukatif, obyektif, akuntabel, dan transparan.'),
(36, 4, 'Proses pembelajaran yang terkait dengan PkM harus mengacu SN Dikti PkM:\r\n1) hasil PkM: harus memenuhi pengembangan IPTEKS, meningkatkan kesejahteraan masyarakat, dan daya saing bangsa.\r\n2) isi PkM: memenuhi kedalaman dan keluasan materi PkM sesuai capaian pembelajaran.\r\n3) proses PkM:  mencakup perencanaan, pelaksanaan, dan pelaporan.\r\n4) penilaian PkM memenuhi unsur edukatif, obyektif, akuntabel, dan transparan. '),
(37, 4, 'Kesesuaian metode pembelajaran dengan\r\ncapaian pembelajaran. Contoh: RBE (research based education), IBE (industry based education), teaching factory/teaching industry, dll.'),
(38, 4, 'Pelaksanaan pembelajaran praktikum'),
(39, 4, 'Prodi melaksanakan penilaian pembelajaran dengan menganut prinsip\r\na. Edukatif;\r\nb. Otentik;\r\nc. Objektif;\r\nd. Akuntabel; dan \r\ne. Transparan\r\nYang dilakukan secara terintegrasi'),
(40, 4, 'Prodi melaksanakan penilaian dengan teknik dan instrument\r\nTeknik penilaian terdiri dari:\r\n1) observasi,\r\n2) partisipasi,\r\n3) unjuk kerja,\r\n4) test tertulis,\r\n5) test lisan, dan\r\n6) angket.'),
(41, 4, 'Pelaksanaan penilaian memuat unsurunsur\r\nsebagai berikut:\r\n1) mempunyai kontrak rencana penilaian,\r\n2) melaksanakan penilaian sesuai\r\nkontrak atau kesepakatan,\r\n3) memberikan umpan balik dan memberi kesempatan untuk mempertanyakan hasil kepada mahasiswa,\r\n4) mempunyai dokumentasi\r\npenilaian proses dan hasil belajar mahasiswa,\r\n5) mempunyai prosedur yang mencakup tahap perencanaan, kegiatan pemberian tugas atau soal, observasi kinerja, pengembalian hasil observasi, dan pemberian nilai akhir,\r\n6) pelaporan penilaian berupa kualifikasi keberhasilan mahasiswa dalam menempuh suatu\r\nmata kuliah dalam bentuk huruf dan angka,\r\n7) mempunyai bukti-bukti rencana dan telah melakukan proses perbaikan berdasar hasil monev penilaian.'),
(42, 4, 'Pengumuman nilai di setiap MK diumumkan paling lambat 2 minggu setelah UAS'),
(43, 4, 'Keterlibatan pemangku kepentingan dalam proses evaluasi dan pemutakhiran kurikulum'),
(44, 4, 'Kesesuaian capaian pembelajaran dengan profil lulusan dan jenjang KKNI/SKKNI.'),
(45, 4, 'Ketepatan struktur kurikulum dalam pembentukan capaian pembelajaran.'),
(46, 5, 'Penelitian DTPS yang dalam pelaksanaanya melibatkan mahasiswa program studi dalam 3 tahun terakhir'),
(47, 5, 'Ketersediaan pedoman Penyusunan Tugas Akhir '),
(48, 5, 'Ketersediaan pedoman penilaian Tugas Akhir'),
(49, 5, 'Penugasan dosen penguji tugas akhir memiliki jabatan akademik minimal lektor   (RP = Penguji Dengan Jabatan Akademik min Lektor / Total Penguji)'),
(50, 6, 'PkM DTPS yang dalam pelaksanaannya melibatkan mahasiswa program studi dalam 3 tahun terakhir '),
(51, 6, 'Kegiatan pengabdian kepada masyarakat yang dilakukan oleh mahasiswa sebagai salah satu dari bentuk pembelajaran  memenuhi capaian pembelajaran lulusan'),
(52, 7, 'IPK lulusan'),
(53, 7, 'Prestasi mahasiswa di bidang akademik dalam 3 tahun terakhir '),
(54, 7, 'Prestasi mahasiswa di bidang nonakademik dalam 3 tahun terakhir '),
(55, 7, 'Masa studi'),
(56, 7, 'Kelulusan tepat waktu'),
(57, 7, 'Keberhasilan studi '),
(58, 7, 'Waktu tunggu'),
(59, 7, 'Kesesuaian bidang kerja'),
(60, 7, 'Tingkat dan ukuran tempat kerja lulusan'),
(61, 7, 'Publikasi ilmiah mahasiswa yang dihasilkan secara mandiri atau bersama DTPS dengan judul yang relevan dengan bidang program studi dalam 3 tahun terakhir'),
(62, 7, 'Luaran penelitian dan PkM yang dihasilkan mahasiswa, baik secara mandiri atau bersama DTPS dalam 3 tahun terakhir');

-- --------------------------------------------------------

--
-- Table structure for table `jadwal`
--

CREATE TABLE `jadwal` (
  `ID_JADWAL` int(11) NOT NULL,
  `UNIT` varchar(255) NOT NULL,
  `INSTRUMEN` varchar(255) NOT NULL,
  `TANGGAL` date NOT NULL,
  `TAHUN` int(11) NOT NULL,
  `ID_AUDITOR` int(11) DEFAULT NULL,
  `ID_AUDITEE` int(11) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `jadwal`
--

INSERT INTO `jadwal` (`ID_JADWAL`, `UNIT`, `INSTRUMEN`, `TANGGAL`, `TAHUN`, `ID_AUDITOR`, `ID_AUDITEE`) VALUES
(1, 'TEKNIK', 'S1', '2023-12-19', 2023, NULL, NULL),
(2, 'MANAJEMEN', 'S1', '2023-12-16', 2024, 1, 1);

-- --------------------------------------------------------

--
-- Table structure for table `jawab`
--

CREATE TABLE `jawab` (
  `ID_JAWAB` int(11) NOT NULL,
  `ID_KRITERIA` int(11) DEFAULT NULL,
  `ID_INDIKATOR` int(11) DEFAULT NULL,
  `JAWAB` varchar(500) DEFAULT NULL,
  `NILAI` int(11) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `jawab`
--

INSERT INTO `jawab` (`ID_JAWAB`, `ID_KRITERIA`, `ID_INDIKATOR`, `JAWAB`, `NILAI`) VALUES
(1, 1, 1, '(1) Visi Prodi mencerminkan visi UPPS dan PT dan didukung dengan implementasi yang konsisten\r\n(2) Misi, Tujuan dan Strategi Prodi searah dengan misi, tujuan dan strategi UPPS dan PT dengan data implementasi yang konsisten', 4),
(2, 1, 1, '(1) Visi Prodi mencerminkan visi UPPS dan PT \r\n(2) Misi, Tujuan dan Strategi Prodi searah dan bersinergi dengan misi, tujuan dan strategi UPPS dan PT', 3),
(3, 1, 1, '(1) Visi Prodi mencerminkan visi UPPS dan PT \r\n(2) Misi, Tujuan dan Strategi Prodi searah dengan misi, tujuan dan strategi UPPS dan PT', 2),
(4, 1, 1, '(1) Visi Prodi tidak mencerminkan visi UPPS dan PT \r\n(2) Misi, Tujuan dan Strategi Prodi kurang searah dengan misi, tujuan dan strategi UPPS dan PT', 1),
(5, 1, 1, 'Prodi memiliki misi, tujuan, dan strategi yang tidak terkait dengan strategi UPPS dan perguruan tinggi dan pengembangan program studi. ', 0),
(6, 1, 2, 'Ada mekanisme dala \r\npenyusunan dan penetapan visi, misi,\r\ntujuan dan strategi yang terdokumentasi serta ada keterlibatan semua pemangku kepentingan internal (dosen, mahasiswa dan tenaga kependidikan) dan eksternal (lulusan, pengguna lulusan dan pakar/mitra/organisasi profesi/pemerintah).', 4),
(7, 1, 2, 'Ada mekanisme dalam penyusunan dan penetapan visi, misi, tujuan dan strategi yang terdokumentasi serta ada keterlibatan semua pemangku kepentingan internal (dosen, mahasiswa dan tenaga kependidikan) dan eksternal (lulusan, pengguna lulusan ).', 3),
(8, 1, 2, 'Ada mekanisme dalam penyusunan dan penetapan visi, misi, tujuan dan strategi yang terdokumentasi serta ada keterlibatan semua pemangku kepentingan internal (dosen, mahasiswa dan tenaga kependidikan) dan eksternal (lulusan).', 2),
(9, 1, 2, 'Ada mekanisme dalam penyusunan dan penetapan visi, misi, tujuan dan strategi yang terdokumentasi namun tidak melibatkan pemangku kepentingan ', 1),
(10, 1, 2, 'Tidak ada mekanisme dalam penyusunan dan penetapan visi, misi, tujuan dan strategi ', 0),
(11, 1, 4, 'Strategi efektif untuk mencapai tujuan dan disusun berdasarkan analisis yang sistematis dengan menggunakan metoda yang relevan dan terdokumentasi serta pada pelaksanaannya dilakukan pemantauan dan evaluasi dan ditindaklanjuti. ', 4),
(12, 1, 4, 'Strategi efektif untuk mencapai tujuan dan disusun berdasarkan analisis yang sistematis dengan menggunakan metoda yang relevan dan terdokumentasi serta pada pelaksanaannya dilakukan pemantauan dan evaluasi ', 3),
(13, 1, 4, 'Strategi efektif untuk mencapai tujuan dan disusun berdasarkan analisis yang sistematis dengan menggunakan metoda yang relevan dan terdokumentasi namun belum terbukti efektifitasnya.', 2),
(14, 1, 4, 'Strategi efektif untuk mencapai tujuan dan disusun berdasarkan analisis yang sistematis namun tidak menggunakan metode yang relevan ', 1),
(15, 1, 4, 'Tidak memiliki strategi untuk mencapai tujuan.', 0),
(16, 1, 3, 'Tersedia 4 dokumen sosialisasi dan pemahaman VMTS prodi', 4),
(17, 1, 3, 'Tersedia 3 dokumen sosialisasi dan pemahaman VMTS prodi', 3),
(18, 1, 3, 'Tersedia 2 dokumen sosialisasi dan pemahaman VMTS prodi', 2),
(19, 1, 3, 'Tersedia 1 dokumen sosialisasi dan pemahaman VMTS prodi', 1),
(20, 1, 3, 'Tidak tersedia  dokumen sosialisasi dan pemahaman VMTS prodi', 0),
(21, 2, 5, 'Jumlah Pendaftar', NULL),
(22, 2, 5, 'Jumlah yang mendaftar yang diterima', NULL),
(23, 2, 6, 'UPPS melakukan upaya untuk meningkatkan animo calon mahasiswa yang ditunjukkan dengan adanya tren peningkatan jumlah pendaftar secara signifikan (> 10%) dalam 3 tahun terakhir. ', 4),
(24, 2, 6, 'UPPS melakukan upaya\nuntuk meningkatkan animo calon mahasiswa yang ditunjukkan dengan adanya tren peningkatan jumlah pendaftar dalam 3 tahun terakhir. ', 3),
(25, 2, 6, 'UPPS melakukan upaya\nuntuk meningkatkan animo calon mahasiswa dalam 3 tahun terakhir dengan tren tetap', 2),
(26, 2, 6, 'UPPS melakukan upaya\nuntuk meningkatkan animo calon mahasiswa dalam 3 tahun terakhir namun trennya menurun', 1),
(27, 2, 6, 'UPPS tidak melakukan upaya untuk meningkatkan animo calon mahasiswa ', 0),
(28, 2, 7, 'Jumlah Mahasiswa Asing', NULL),
(29, 2, 7, 'Jumlah Mahasiswa', NULL),
(30, 2, 8, 'tersedia layanan kemahasiswaan di bidang: \n1) penalaran, minat dan bakat,\n2) kesejahteraan (bimbingan dan\nkonseling, layanan beasiswa, dan layanan kesehatan), dan\n3) bimbingan karir dan kewirausahaan.', 4),
(31, 2, 8, 'tersedia layanan kemahasiswaan di bidang: \n1) penalaran, minat dan bakat,\n2) kesejahteraan (bimbingan dan\nkonseling, layanan beasiswa, dan layanan kesehatan)', 3),
(32, 2, 8, 'tersedia layanan kemahasiswaan di bidang: penalaran, minat dan bakat', 2),
(33, 2, 8, 'Jenis layanan hanya mencakup sebagian bidang penalaran, minat atau bakat', 1),
(34, 2, 8, 'tidak memiliki layanan kemahasiswaan', 0),
(35, 2, 9, 'ada kemudahan akses dan mutu layanan yang baik di bidang: \n1) penalaran, minat dan bakat,\n2) kesejahteraan (bimbingan dan\nkonseling, layanan beasiswa, dan layanan kesehatan), dan\n3) bimbingan karir dan kewirausahaan.', 4),
(36, 2, 9, 'ada kemudahan akses dan mutu layanan yang baik di bidang: \n1) penalaran, minat dan bakat,\n2) kesejahteraan (bimbingan dan\nkonseling, layanan beasiswa, dan layanan kesehatan)', 3),
(37, 2, 9, 'ada kemudahan akses dan mutu layanan yang baik di bidang: penalaran, minat dan bakat', 2),
(38, 2, 9, 'Mutu layanan kurang baik untuk bidang penalaran atau minat bakat mahasiswa.  ', 1),
(39, 2, 9, 'tidak memiliki layanan kemahasiswaan', 0),
(40, 2, 10, 'Terdapat kegiatan kemahasiswaan dengan institusi lain ≥ jumlah prodi yang dikelola', 4),
(41, 2, 10, 'Terdapat kegiatan kemahasiswaan dengan institusi lain < jumlah prodi yang dikelola', 3),
(42, 2, 10, 'tidak terdapat kegiatan kemahasiswaan dengan institusi lain ', 2),
(43, 2, 10, 'Tidak ada nilai kurang dari 2', 1),
(44, 2, 10, NULL, 0),
(45, 3, 11, 'Jumlah dosen tetap yang ditugaskan sebagai pengampu mata kuliah dengan bidang keahlian yang sesuai dengan kompetensi inti program studi yang diakreditasi (NDTPS)', NULL),
(46, 3, 12, 'NDS3(Jumlah DTPS yang berpendidikan tertinggi Doktor/Doktor Terapan/Subspesialis)', NULL),
(47, 3, 12, 'Jumlah dosen tetap yang ditugaskan sebagai pengampu mata kuliah dengan bidang keahlian yang sesuai dengan kompetensi inti program studi yang diakreditasi (NDTPS)', NULL),
(48, 3, 13, 'NDGB (Jumlah DTPS yang memiliki jabatan akademik Guru Besar', NULL),
(49, 3, 13, 'NDLK (Jumlah DTPS yang memiliki jabatan akademik Lektor Kepala)', NULL),
(50, 3, 13, 'NDL (Jumlah DTPS yang memiliki jabatan akademik Lektor)', NULL),
(51, 3, 13, 'Jumlah dosen tetap yang ditugaskan sebagai pengampu mata kuliah dengan bidang keahlian yang sesuai dengan kompetensi inti program studi yang diakreditasi (NDTPS)', NULL),
(52, 3, 14, 'NM(Jumlah Mahasiswa pada saat TS)', NULL),
(53, 3, 14, 'Jumlah dosen tetap yang ditugaskan sebagai pengampu mata kuliah dengan bidang keahlian yang sesuai dengan kompetensi inti program studi yang diakreditasi (NDTPS)', NULL),
(54, 3, 14, 'NM(Jumlah Mahasiswa pada saat TS)', NULL),
(55, 3, 14, 'Jumlah dosen tetap yang ditugaskan sebagai pengampu mata kuliah dengan bidang keahlian yang sesuai dengan kompetensi inti program studi yang diakreditasi (NDTPS)', NULL),
(56, 3, 15, 'RDPU (Rata-rata jumlah bimbingan sebagai pembimbing utama di seluruh program/semester)', NULL),
(57, 3, 16, 'EWMP', NULL),
(58, 3, 17, 'NDTT(Jumlah dosen tidak tetap yang ditugaskan sebagai pengampu mata kuliah di program studi yang diakreditasi)', NULL),
(59, 3, 17, 'NDT(Jumlah dosen tetap yang ditugaskan sebagai pengampu mata kuliah di program studi yang diakreditasi)', NULL),
(60, 3, 18, 'Jumlah Pengakuan atas prestasi/kinerja DTPS yang relevan dengan bidang keahlian dalam 3 tahun terakhir (NRD)', NULL),
(61, 3, 18, 'Jumlah dosen tetap yang ditugaskan sebagai pengampu mata kuliah dengan bidang keahlian yang sesuai dengan kompetensi inti program studi yang diakreditasi (NDTPS)', NULL),
(62, 3, 19, 'Jumlah penelitian dengan sumber pembiayaan luar negeri dalam 3 tahun terakhir (NI)', NULL),
(63, 3, 19, 'Jumlah penelitian dengan sumber pembiayaan dalam negeri dalam 3 tahun terakhir (NN)', NULL),
(64, 3, 19, 'Jumlah penelitian dengan sumber pembiayaan PT/mandiri dalam 3 tahun terakhir (NL)', NULL),
(65, 3, 19, 'Jumlah dosen tetap yang ditugaskan sebagai pengampu mata kuliah dengan bidang keahlian yang sesuai dengan kompetensi inti program studi yang diakreditasi (NDTPS)', NULL),
(66, 3, 20, 'Jumlah publikasi di jurnal nasional tidak terakreditasi (NA1)', NULL),
(67, 3, 20, 'Jumlah publikasi di jurnal nasional terakreditasi (NA2)', NULL),
(68, 3, 20, 'Jumlah publikasi di jurnal internasional(NA3)', NULL),
(69, 3, 20, 'Jumlah publikasi di jurnal internasional bereputasi(NA4)', NULL),
(70, 3, 20, 'Jumlah publikasi di seminar wilayah/lokal/PT(NB1)', NULL),
(71, 3, 20, 'Jumlah publikasi di seminar nasional(NB2)', NULL),
(72, 3, 20, 'Jumlah publikasi di seminar internasional(NB3)', NULL),
(73, 3, 20, 'Jumlah publikasi di media massa wilayah (NC1)', NULL),
(74, 3, 20, 'Jumlah publikasi di media massa nasional (NC2)', NULL),
(75, 3, 20, 'Jumlah publikasi di media massa internasional (NC3)', NULL),
(76, 3, 20, 'Jumlah dosen tetap yang ditugaskan sebagai pengampu mata kuliah dengan bidang keahlian yang sesuai dengan kompetensi inti program studi yang diakreditasi (NDTPS)', NULL),
(77, 3, 21, 'Jumlah artikel yang disitasi (NAS)', NULL),
(78, 3, 21, 'Jumlah dosen tetap yang ditugaskan sebagai pengampu mata kuliah dengan bidang keahlian yang sesuai dengan kompetensi inti program studi yang diakreditasi (NDTPS)', NULL),
(79, 3, 22, 'Jumlah PkM dengan sumber pembiayaan luar negeri dalam 3 tahun terakhir (NI)', NULL),
(80, 3, 22, 'Jumlah PkM dengan sumber pembiayaan dalam negeri dalam 3 tahun terakhir (NN)', NULL),
(81, 3, 22, 'Jumlah PkM dengan sumber pembiayaan PT/mandiri dalam 3 tahun terakhir (NL)', NULL),
(82, 3, 22, 'Jumlah dosen tetap yang ditugaskan sebagai pengampu mata kuliah dengan bidang keahlian yang sesuai dengan kompetensi inti program studi yang diakreditasi (NDTPS)', NULL),
(83, 3, 23, 'Jumlah luaran penelitian/PkM yang mendapat pengakuan HKI (Paten, Paten Sederhana) (NA)', NULL),
(84, 3, 23, 'Jumlah luaran penelitian/PkM yang mendapat pengakuan HKI (Hak Cipta, Desain Produk Industri, Perlindungan Varietas Tanaman, Desain Tata Letak Sirkuit Terpadu, dll) (NB)', NULL),
(85, 3, 23, 'Jumlah luaran penelitian/PkM dalam bentuk Teknologi Tepat Guna, Produk (Produk Terstandarisasi, Produk Tersertifikasi), Karya Seni, Rekayasa Sosial (NC)', NULL),
(86, 3, 23, 'Jumlah luaran penelitian/PkM yang diterbitkan dalam bentuk Buku ber-ISBN, Book Chapter (ND)', NULL),
(87, 3, 23, 'Jumlah dosen tetap yang ditugaskan sebagai pengampu mata kuliah dengan bidang keahlian yang sesuai dengan kompetensi inti program studi yang diakreditasi (NDTPS)', NULL),
(88, 3, 24, 'Jumlah dosen tetap yang ditugaskan sebagai pengampu mata kuliah dengan bidang keahlian yang sesuai dengan kompetensi inti program studi yang diakreditasi (NDTPS)', 4),
(89, 3, 24, 'Peneliti wajib memiliki kemampuan tingkat penguasaan metodologi penelitian yang sesuai dengan bidang keilmuan dan objek penelitian.', 3),
(90, 3, 24, 'Peneliti wajib memiliki kemampuan tingkat penguasaan metodologi penelitian yang sesuai dengan bidang keilmuan', 2),
(91, 3, 24, 'Tidak ada nilai kurang dari 2', 1),
(92, 3, 24, '', 0),
(93, 3, 25, 'Pelaksana pengabdian kepada masyarakat wajib memiliki penguasaan metodologi penerapan keilmuan yang sesuai dengan bidang keahlian, jenis kegiatan, serta tingkat kerumitan dan kedalaman sasaran kegiatan.', 4),
(94, 3, 25, 'Pelaksana pengabdian kepada masyarakat wajib memiliki penguasaan metodologi penerapan keilmuan yang sesuai dengan bidang keahlian dan jenis kegiatan.', 3),
(95, 3, 25, 'Pelaksana pengabdian kepada masyarakat wajib memiliki penguasaan metodologi penerapan keilmuan yang sesuai dengan bidang keahlian.', 2),
(96, 3, 25, 'Tidak ada nilai kurang dari 2', 1),
(97, 3, 25, NULL, 0),
(98, 4, 26, 'Adanya peta kurikulum prodi yang mencakup 1) CPL Prodi; 2) Bahan Kajian; dan 3) MK yang saling berhubungan', 4),
(99, 4, 26, 'Adanya peta kurikulum prodi yang mencakup 1) CPL Prodi; 2) Bahan Kajian; dan 3) MK yang tidak berhubungan', 3),
(100, 4, 26, 'tidak memiliki peta kurikulum', 2),
(101, 4, 26, 'Tidak ada nilai kurang dari 2', 1),
(102, 4, 26, '', 0),
(103, 4, 27, 'Prodi menetapkan besarnya SKS mata kuliah berdasarkan tingkat kemampuan yang harus dicapai, kedalaman dan keluasan materi pembelajaran yang harus dikuasai dan metode yang digunakan', 4),
(104, 4, 27, 'Prodi menetapkan besarnya SKS mata kuliah berdasarkan tingkat kemampuan yang harus dicapai, kedalaman dan keluasan materi pembelajaran yang harus dikuasai ', 3),
(105, 4, 27, 'Prodi menetapkan besarnya SKS mata kuliah tidak berdasarkan tingkat kemampuan yang harus dicapai, kedalaman dan keluasan materi pembelajaran yang harus dikuasai dan metode yang digunakan', 2),
(106, 4, 27, 'Tidak ada nilai kurang dari 2', 1),
(107, 4, 27, NULL, 0),
(108, 4, 28, 'Ketersediaan susunan mata kuliah yang dilengkapi dengan uraian butir capaian pembelajaran lulusan yang dibebankan pada matakuliah tersebut dan rencana pembelajaran setiap mata kuiah', 4),
(109, 4, 28, 'Ketersediaan susunan mata kuliah yang dilengkapi dengan uraian butir capaian pembelajaran lulusan yang dibebankan pada matakuliah tersebut ', 3),
(110, 4, 28, 'tidak ada Ketersediaan susunan mata kuliah yang dilengkapi dengan uraian butir capaian pembelajaran lulusan yang dibebankan pada matakuliah tersebut dan rencana pembelajaran setiap mata kuiah', 2),
(111, 4, 28, 'Tidak ada nilai kurang dari 2', 1),
(112, 4, 28, '', 0),
(113, 4, 29, 'Jumlah mata kuliah yang dikembangkan berdasarkan hasil penelitian/PkM dalam 3 tahun terakhir (NMKI)', NULL),
(114, 4, 30, 'Terpenuhinya karakteristik proses pembelajaran program studi yang mencakup seluruh sifat, dan telah menghasilkan profil lulusan yang sesuai dengan capaian pembelajaran.', 4),
(115, 4, 30, 'Terpenuhinya karakteristik proses pembelajaran program studi yang berpusat pada mahasiswa, dan telah menghasilkan profil lulusan yang sesuai dengan capaian\r\npembelajaran.', 3),
(116, 4, 30, 'Karakteristik proses pembelajaran program\r\nstudi berpusat pada mahasiswa yang diterapkan pada minimal 50% matakuliah. ', 2),
(117, 4, 30, 'Karakteristik proses pembelajaran program studi belum berpusat pada mahasiswa', 1),
(118, 4, 30, '', 0),
(119, 4, 31, 'Dokumen RPS mencakup target capaian pembelajaran, bahan kajian, metode pembelajaran, waktu dan tahapan, asesmen hasil capaian pembelajaran. RPS ditinjau dan disesuaikan secara berkala serta dapat diakses oleh mahasiswa, dilaksanakan secara konsisten.', 4),
(120, 4, 31, 'Dokumen RPS mencakup target capaian pembelajaran, bahan kajian, metode pembelajaran, waktu dan tahapan, asesmen hasil capaian pembelajaran. RPS ditinjau dan disesuaikan secara berkala serta dapat diakses oleh mahasiswa.', 3),
(121, 4, 31, 'Dokumen RPS mencakup target capaian pembelajaran, bahan kajian, metode pembelajaran, waktu dan tahapan, asesmen hasil capaian pembelajaran. RPS ditinjau dan disesuaikan secara berkala ', 2),
(122, 4, 31, 'Dokumen RPS mencakup target capaian pembelajaran, bahan kajian, metode\r\npembelajaran, waktu dan tahapan, asesmen hasil capaian pembelajaran atau tidak semua MK memiliki RPS', 1),
(123, 4, 31, 'Tidak memiliki dokumen RPS', 0),
(124, 4, 32, 'Isi materi pembelajaran sesuai dengan RPS, memiliki kedalaman dan keluasan yang relevan untuk mencapai capaian pembelajaran lulusan, serta ditinjau ulang secara berkala.  ', 4),
(125, 4, 32, 'Isi materi pembelajaran sesuai dengan RPS, memiliki kedalaman dan keluasan yang relevan untuk mencapai capaian pembelajaran lulusan', 3),
(126, 4, 32, 'Isi materi pembelajaran memiliki kedalaman dan keluasan yang relevan untuk mencapai capaian pembelajaran lulusan', 2),
(127, 4, 32, 'Isi materi pembelajaran memiliki kedalaman dan keluasan namun sebagian tidak sesuai dengan capaian pembelajaran lulusan.', 1),
(128, 4, 32, 'Isi materi pembelajaran tidak sesuai dengan capaian pembelajaran lulusan.', 0),
(129, 4, 33, 'Pelaksanaan pembelajaran berlangsung dalam bentuk interaksi antara dosen, mahasiswa, dan sumber belajar dalam lingkungan belajar tertentu secara on-line dan off-line dalam bentuk audio-visual terdokumentasi.', 4),
(130, 4, 33, 'Pelaksanaan pembelajaran berlangsung dalam bentuk interaksi antara dosen, mahasiswa, dan sumber belajar dalam lingkungan belajar tertentu secara on-line dan off-line', 3),
(131, 4, 33, 'Pelaksanaan pembelajaran berlangsung dalam bentuk interaksi antara dosen, mahasiswa, dan sumber belajar dalam lingkungan belajar tertentu', 2),
(132, 4, 33, 'Pelaksanaan pembelajaran berlangsung hanya sebagian dalam bentuk interaksi antara dosen, mahasiswa, dan sumber belajar dalam lingkungan belajar tertentu', 1),
(133, 4, 33, 'Pelaksanaan pembelajaran tidak berlangsung dalam bentuk interaksi antara dosen dan mahasiswa', 0),
(134, 4, 34, 'Memiliki bukti sahih adanya sistem dan pelaksanaan pemantauan proses pembelajaran yang dilaksanakan secara periodik untuk menjamin kesesuaian dengan RPS dalam rangka menjaga mutu proses pembelajaran. Hasil monev  terdokumentasi dengan baik dan digunakan untuk meningkatkan mutu proses pembelajaran.', 4),
(135, 4, 34, 'Memiliki bukti sahih adanya sistem dan pelaksanaan pemantauan proses pembelajaran yang dilaksanakan secara periodik untuk menjamin kesesuaian dengan RPS dalam rangka menjaga mutu proses pembelajaran. Hasil monev  terdokumentasi dengan baik', 3),
(136, 4, 34, 'Memiliki bukti sahih adanya sistem dan pelaksanaan pemantauan proses pembelajaran yang dilaksanakan secara periodik untuk menjamin kesesuaian dengan RPS', 2),
(137, 4, 34, 'Memiliki bukti sahih adanya sistem dan pelaksanaan pemantauan proses pembelajarannamun tidak dilaksanakan secara konsisten', 1),
(138, 4, 34, 'Tidak memiliki bukti sahih adanya sistem dan pelaksanaan pemantauan proses pembelajaran.', 0),
(139, 4, 35, '4 aspek terpenuhi', 4),
(140, 4, 35, '3 aspek terpenuhi', 3),
(141, 4, 35, '2 aspek terpenuhi', 2),
(142, 4, 35, '1 aspek terpenuhi', 1),
(143, 4, 35, 'Tidak ada Skor kurang dari 1.', 0),
(144, 4, 36, '4 aspek terpenuhi', 4),
(145, 4, 36, '3 aspek terpenuhi', 3),
(146, 4, 36, '2 aspek terpenuhi', 2),
(147, 4, 36, '1 aspek terpenuhi', 1),
(148, 4, 36, 'Tidak ada Skor kurang dari 1.', 0),
(149, 4, 37, 'terdapat 75%-100% MK menggunakan metode sesuai dengan pencapaian CPL', 4),
(150, 4, 37, 'terdapat 50%-<75% MK menggunakan metode sesuai dengan pencapaian CPL', 3),
(151, 4, 37, 'terdapat 25%-<50% MK menggunakan metode sesuai dengan pencapaian CPL', 2),
(152, 4, 37, 'terdapat 0%-<25% MK menggunakan metode sesuai dengan pencapaian CPL', 1),
(153, 4, 37, 'Tidak terdapat bukti sahih yang menunjukkan metode pembelajaran yang dilaksanakan sesuai dengan capaian pembelajaran yang direncanakan.', 0),
(154, 4, 38, 'Jam Pembelajaran praktikum, praktik studio, praktik bengkel, atau praktik lapangan (termasuk KKN) (JP)', NULL),
(155, 4, 38, 'Jam pembelajaran total selama masa pendidikan (JB)', NULL),
(156, 4, 39, 'Terdapat bukti sahih tentang dipenuhinya 5 prinsip penilaian yang dilakukan secara terintegrasi dan dilengkapi dengan rubrik/portofolio penilaian minimum 70% jumlah matakuliah.', 4),
(157, 4, 39, 'Terdapat bukti sahih tentang dipenuhinya 5 prinsip penilaian yang dilakukan secara terintegrasi dan dilengkapi dengan rubrik/portofolio penilaian minimum 50% jumlah matakuliah.', 3),
(158, 4, 39, 'Terdapat bukti sahih tentang dipenuhinya 5 prinsip penilaian yang dilakukan secara terintegrasi', 2),
(159, 4, 39, 'Terdapat bukti sahih tentang dipenuhinya 5 prinsip penilaian namun tidak dilakukan secara terintegrasi', 1),
(160, 4, 39, 'Tidak terdapat bukti sahih tentang dipenuhinya 5 prinsip penilaian ', 0),
(161, 4, 40, 'Terdapat bukti sahih yang menunjukkan kesesuaian teknik dan instrumen penilaian terhadap capaian pembelajaran antara 75% s.d. 100% dari jumlah matakuliah.', 4),
(162, 4, 40, 'Terdapat bukti sahih yang menunjukkan kesesuaian teknik dan instrumen penilaian terhadap capaian pembelajaran minimum 50 s.d. < 75% dari jumlah matakuliah.', 3),
(163, 4, 40, 'Terdapat bukti sahih yang menunjukkan kesesuaian teknik dan instrumen penilaian terhadap capaian pembelajaran yang dinilai minimum 25 s.d. < 50%  dari jumlah matakuliah.', 2),
(164, 4, 40, 'Terdapat bukti sahih yang menunjukkan kesesuaian teknik dan instrumen penilaian terhadap capaian pembelajaran yang dinilai < 25% dari jumlah matakuliah.', 1),
(165, 4, 40, 'Tidak terdapat bukti sahih yang menunjukkan kesesuaian teknik dan instrumen penilaian terhadap capaian pembelajaran. ', 0),
(166, 4, 41, 'Terdapat bukti sahih pelaksanaan penilaian mencakup 7 unsur.', 4),
(167, 4, 41, 'Terdapat bukti sahih pelaksanaan penilaian mencakup minimum unsur 1, 4 dan 6 serta 2 unsur lainnya. ', 3),
(168, 4, 41, 'Terdapat bukti sahih pelaksanaan penilaian mencakup minimum unsur 1, 4 dan 6.', 2),
(169, 4, 41, 'Terdapat bukti sahih pelaksanaan penilaian hanya mencakup unsur 6. ', 1),
(170, 4, 41, 'Tidak ada Skor kurang\r\ndari 1.', 0),
(171, 4, 42, 'Pengumuman nilai di setiap MK diumumkan paling lambat 2 minggu setelah UAS', 4),
(172, 4, 42, 'Tidak ada nilai antara 1 dan 4', 3),
(173, 4, 42, NULL, 2),
(174, 4, 42, 'Pengumuman nilai di setiap MK diumumkan melebihi 2 minggu setelah UAS', 1),
(175, 4, 42, 'tidak ada nilai 0', 0),
(176, 4, 43, 'Evaluasi dan pemutakhiran kurikulum secara berkala tiap 4 s.d. 5 tahun yang melibatkan pemangku kepentingan internal dan eksternal, serta direview oleh pakar bidang ilmu program studi, industri, asosiasi, serta sesuai perkembangan ipteks dan kebutuhan pengguna.', 4),
(177, 4, 43, 'Evaluasi dan pemutakhiran kurikulum secara berkala tiap 4 s.d. 5 tahun yang melibatkan pemangku kepentingan internal dan eksternal. ', 3),
(178, 4, 43, 'Evaluasi dan pemutakhiran kurikulum melibatkan pemangku kepentingan internal. ', 2),
(179, 4, 43, 'Evaluasi dan pemutakhiran kurikulum tidak melibatkan seluruh pemangku  kepentingan internal. ', 1),
(180, 4, 43, 'Evaluasi dan pemutakhiran kurikulum dilakukan oleh dosen program studi.', 0),
(181, 4, 44, 'Capaian pembelajaran diturunkan dari profil lulusan, mengacu pada hasil kesepakatan dengan asosiasi penyelenggara program studi sejenis dan organisasi profesi, dan memenuhi level KKNI, serta dimutakhirkan secara berkala tiap 4 s.d. 5 tahun sesuai perkembangan ipteks dan kebutuhan pengguna.', 4),
(182, 4, 44, 'Capaian pembelajaran diturunkan dari profil lulusan, memenuhi level KKNI, dan dimutakhirkan secara berkala tiap 4 s.d. 5 tahun sesuai perkembangan ipteks atau kebutuhan pengguna. ', 3),
(183, 4, 44, 'Capaian pembelajaran diturunkan dari profil lulusan dan memenuhi level KKNI.', 2),
(184, 4, 44, 'Capaian pembelajaran diturunkan dari profil lulusan dan tidak memenuhi level KKNI. ', 1),
(185, 4, 44, 'Capaian pembelajaran tidak diturunkan dari profil lulusan dan tidak memenuhi level KKNI. ', 0),
(186, 4, 45, 'Struktur kurikulum memuat keterkaitan antara matakuliah dengan capaian pembelajaran lulusan yang digambarkan dalam peta kurikulum yang jelas, capaian pembelajaran lulusan dipenuhi oleh seluruh capaian pembelajaran matakuliah, serta tidak ada capaian pembelajaran matakuliah yang tidak mendukung capaian pembelajaran lulusan.', 4),
(187, 4, 45, 'Struktur kurikulum memuat keterkaitan antara matakuliah dengan capaian pembelajaran lulusan yang digambarkan dalam peta kurikulum yang jelas, capaian pembelajaran lulusan dipenuhi oleh seluruh capaian pembelajaran matakuliah', 3),
(188, 4, 45, 'Struktur kurikulum memuat keterkaitan antara matakuliah dengan capaian pembelajaran lulusan yang digambarkan dalam peta kurikulum yang jelas.', 2),
(189, 4, 45, 'Struktur kurikulum tidak sesuai dengan capaian pembelajaran lulusan. ', 1),
(190, 4, 45, 'Tidak ada Skor kurang dari 1', 0),
(191, 5, 46, 'NPM (Jumlah judul penelitian DTPS) yang dalam pelaksanaannya melibatkan mahasiswa program studi dalam 3 tahun terakhir', NULL),
(192, 5, 46, 'NPD(Jumlah judul penelitian DTPS dalam 3 tahun terakhir)', NULL),
(193, 5, 47, 'Tersedia ', 4),
(194, 5, 47, 'Tidak ada nilai antara 0 dan 4', 3),
(195, 5, 47, NULL, 2),
(196, 5, 47, NULL, 1),
(197, 5, 47, 'Tidak Tersedia', 0),
(198, 5, 48, 'Tersedia ', 4),
(199, 5, 48, 'Tidak ada nilai antara 0 dan 4', 3),
(200, 5, 48, NULL, 2),
(201, 5, 48, NULL, 1),
(202, 5, 48, 'Tidak Tersedia', 0),
(203, 5, 49, 'Memenuhi ≥ 75%', 4),
(204, 5, 49, '50% ≤ RP < 75%', 3),
(205, 5, 49, '25% ≤ RP < 59%', 2),
(206, 5, 49, '0% < RP < 25%', 1),
(207, 5, 49, 'RP = 0', 0),
(208, 6, 50, 'NPkMM (Jumlah judul PkM DTPS yang dalam pelaksanaannya melibatkan mahasiswa program studi dalam 3 tahun terakhir', NULL),
(209, 6, 50, 'NPkMD (Jumlah judul PkM DTPS dalam 3 tahun terakhir', NULL),
(210, 6, 51, 'Memenuhi', 4),
(211, 6, 51, 'Tidak ada nilai antara 0 dan 4', 3),
(212, 6, 51, '', 2),
(213, 6, 51, '', 1),
(214, 6, 51, 'Tidak Memenuhi', 0),
(215, 7, 52, 'RIPK (Rata-rata IPK lulusan dalam 3 tahun terakhir) ', NULL),
(216, 7, 53, 'NI (Jumlah prestasi akademik internasional)', NULL),
(217, 7, 53, 'NN (Jumlah prestasi akademik nasional)', NULL),
(218, 7, 53, 'NW (Jumlah prestasi akademik wilayah/lokal)', NULL),
(219, 7, 53, 'NM (Jumlah mahasiswa pada saat TS)', NULL),
(220, 7, 54, 'NI (Jumlah prestasi nonakademik internasional)', NULL),
(221, 7, 54, 'NN (Jumlah prestasi nonakademik nasional)', NULL),
(222, 7, 54, 'NW (Jumlah prestasi nonakademik wilayah/lokal)', NULL),
(223, 7, 54, 'NM (Jumlah mahasiswa pada saat TS)', NULL),
(224, 7, 55, 'MS (Rata-rata Masa studi lulusan (tahun))', NULL),
(225, 7, 56, 'PTW', NULL),
(226, 7, 57, 'PPS (Persentase keberhasilan studi)', NULL),
(227, 7, 58, 'WT (waktu tunggu lulusan untuk mendapatkan pekerjaan pertama dalam 3 tahun mulai TS-4 s.d TS-2', NULL),
(228, 7, 59, 'PBS (Kesesuaian bidang kerja lulusan saat mendapatkan pekerjaan pertama dalam 3 tahun, mulai TS-4 s.d TS-2)', NULL),
(229, 7, 60, 'NI (Jumlah lulusan yang bekerja di badan usaha tingkat multi nasional/internasional)', NULL),
(230, 7, 60, 'NN (Jumlah lulusan yang bekerja di badan usaha tingkat nasional atau berwirausaha yang berizin)', NULL),
(231, 7, 60, 'NW (Jumlah lulusan yang bekerja di badan usaha tingkat wilayah/lokal atau berwirausaha tidak berizin)', NULL),
(232, 7, 60, 'NL (Jumlah lulusan)', NULL),
(233, 7, 61, 'Jumlah publikasi di jurnal nasional tidak terakreditasi (NA1)', NULL),
(234, 7, 61, 'Jumlah publikasi di jurnal nasional terakreditasi (NA2)', NULL),
(235, 7, 61, 'Jumlah publikasi di jurnal internasional(NA3)', NULL),
(236, 7, 61, 'Jumlah publikasi di jurnal internasional bereputasi(NA4)', NULL),
(237, 7, 61, 'Jumlah publikasi di seminar wilayah/lokal/PT(NB1)', NULL),
(238, 7, 61, 'Jumlah publikasi di seminar nasional(NB2)', NULL),
(239, 7, 61, 'Jumlah publikasi di seminar internasional(NB3)', NULL),
(240, 7, 61, 'Jumlah publikasi di media massa wilayah (NC1)', NULL),
(241, 7, 61, 'Jumlah publikasi di media massa nasional (NC2)', NULL),
(242, 7, 61, 'Jumlah publikasi di media massa internasional (NC3)', NULL),
(243, 7, 61, 'Jumlah mahasiswa pada saat TS (NM)', NULL),
(244, 7, 62, 'Jumlah luaran penelitian/PkM mahasiswa yang mendapat pengakuan HKI (Paten, Paten Sederhana) (NA)', NULL),
(245, 7, 62, 'Jumlah luaran penelitian/PkM mahasiswa yang mendapat pengakuan HKI (Hak Cipta, Desain Produk Industri, Perlindungan Varietas Tanaman, Desain Tata Letak Sirkuit Terpadu, dll) (NB)', NULL),
(246, 7, 62, 'Jumlah luaran penelitian/PkM mahasiswa dalam bentuk Teknologi Tepat Guna, Produk (Produk Terstandarisasi, Produk Tersertifikasi), Karya Seni, Rekayasa Sosial (NC)', NULL),
(247, 7, 62, 'Jumlah luaran penelitian/PkM mahasiswa yang diterbitkan dalam bentuk Buku ber-ISBN, Book Chapter (ND)', NULL),
(248, 7, 62, 'Jumlah mahasiswa pada saat TS (NM)', NULL);

-- --------------------------------------------------------

--
-- Table structure for table `kriteria`
--

CREATE TABLE `kriteria` (
  `ID_KRITERIA` int(11) NOT NULL,
  `KRITERIA` varchar(500) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `kriteria`
--

INSERT INTO `kriteria` (`ID_KRITERIA`, `KRITERIA`) VALUES
(1, 'VMTS'),
(2, 'MAHASISWA'),
(3, 'SDM'),
(4, 'PENDIDIKAN'),
(5, 'PENELITIAN'),
(6, 'PKM'),
(7, 'Luaran dan Capaian Tri Dharma');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `audit`
--
ALTER TABLE `audit`
  ADD PRIMARY KEY (`ID_AUDIT`),
  ADD KEY `ID_AUDITEE` (`ID_AUDITEE`),
  ADD KEY `ID_JAWAB` (`ID_JAWAB`),
  ADD KEY `ID_AUDITOR` (`ID_AUDITOR`);

--
-- Indexes for table `auditee`
--
ALTER TABLE `auditee`
  ADD PRIMARY KEY (`ID_AUDITEE`);

--
-- Indexes for table `auditor`
--
ALTER TABLE `auditor`
  ADD PRIMARY KEY (`ID_AUDITOR`);

--
-- Indexes for table `indikator`
--
ALTER TABLE `indikator`
  ADD PRIMARY KEY (`ID_INDIKATOR`),
  ADD KEY `FK_RELATIONSHIP_1` (`ID_KRITERIA`);

--
-- Indexes for table `jadwal`
--
ALTER TABLE `jadwal`
  ADD PRIMARY KEY (`ID_JADWAL`),
  ADD KEY `FK_JADWAL_AUDITOR` (`ID_AUDITOR`),
  ADD KEY `FK_JADWAL_AUDITEE` (`ID_AUDITEE`);

--
-- Indexes for table `jawab`
--
ALTER TABLE `jawab`
  ADD PRIMARY KEY (`ID_JAWAB`),
  ADD KEY `FK_RELATIONSHIP_2` (`ID_INDIKATOR`),
  ADD KEY `FK_RELATIONSHIP_3` (`ID_KRITERIA`);

--
-- Indexes for table `kriteria`
--
ALTER TABLE `kriteria`
  ADD PRIMARY KEY (`ID_KRITERIA`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `indikator`
--
ALTER TABLE `indikator`
  MODIFY `ID_INDIKATOR` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=63;

--
-- AUTO_INCREMENT for table `jawab`
--
ALTER TABLE `jawab`
  MODIFY `ID_JAWAB` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=249;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
