-- phpMyAdmin SQL Dump
-- version 5.2.0
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Dec 04, 2023 at 04:41 AM
-- Server version: 10.4.24-MariaDB
-- PHP Version: 8.1.6

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
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

-- --------------------------------------------------------

--
-- Table structure for table `auditee`
--

CREATE TABLE `auditee` (
  `ID_AUDITEE` int(11) NOT NULL,
  `NAMA` date DEFAULT NULL,
  `USERNAME` varchar(100) DEFAULT NULL,
  `PASSWORD` varchar(50) DEFAULT NULL,
  `TANGGAL_LAHIR` date NOT NULL,
  `ALAMAT` text DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

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
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `auditor`
--

INSERT INTO `auditor` (`ID_AUDITOR`, `NAMA`, `TANGGAL_LAHIR`, `ALAMAT`, `USERNAME`, `PASSWORD`) VALUES
(1, 'OK PAK', '2024-11-27', 'DESA PUCUK KECAMATAN PUCUK KABUPATEN PUCUK', 'auditor1', '827ccb0eea8a706c4c34a16891f84e7b'),
(2, 'ok bu', '2024-11-01', 'DESA PUCUK KECAMATAN PUCUK KABUPATEN PADENGAN', 'auditor2', '827ccb0eea8a706c4c34a16891f84e7b');

-- --------------------------------------------------------

--
-- Table structure for table `indikator`
--

CREATE TABLE `indikator` (
  `ID_INDIKATOR` int(11) NOT NULL,
  `ID_KRITERIA` int(11) DEFAULT NULL,
  `INDIKATOR` varchar(500) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `indikator`
--

INSERT INTO `indikator` (`ID_INDIKATOR`, `ID_KRITERIA`, `INDIKATOR`) VALUES
(1, 1, 'VMTS Prodi sesuai dengan VMTS UPPS dan PT'),
(2, 1, 'Mekanisme dan keterlibatan pemangku kepentingan dalam penyusunan VMTS Prodi'),
(3, 1, 'Strategi pencapaian tujuan disusun berdasarkan analisis yang sistematis, serta pada pelaksanaannya dilakukan pemantauan dan evaluasi yang ditindaklanjuti.  '),
(4, 2, 'Metode rekruitmen dan keketatan seleksi '),
(5, 2, 'UPPS melakukan upaya untuk meningkatkan animo calon mahasiswa dan terdapat bukti keberhasilannya.'),
(6, 2, 'UPPS menerima mahasiswa asing'),
(7, 1, 'Adanya Sosialisasi dan pemahaman VMTS prodi yang meliputi:\r\n1. Adanya SK tim sosialisasi VMTS prodi\r\n2. Adanya bukti sosialisasi VMTS prodi\r\n3. Adanya laporan kegiatan sosialisasi VMTS prodi\r\n4. Adanya laporan pemahaman VMTS prodi kepada semua sivitas akademika');

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
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `jadwal`
--

INSERT INTO `jadwal` (`ID_JADWAL`, `UNIT`, `INSTRUMEN`, `TANGGAL`, `TAHUN`, `ID_AUDITOR`, `ID_AUDITEE`) VALUES
(1, 'TEKNIK', 'S1', '2023-12-19', 2023, NULL, NULL);

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
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

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
(10, 1, 2, 'Tidak ada mekanisme dalam penyusunan dan penetapan visi, misi, tujuan dan strategi ', 0);

-- --------------------------------------------------------

--
-- Table structure for table `kriteria`
--

CREATE TABLE `kriteria` (
  `ID_KRITERIA` int(11) NOT NULL,
  `KRITERIA` varchar(500) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `kriteria`
--

INSERT INTO `kriteria` (`ID_KRITERIA`, `KRITERIA`) VALUES
(1, 'VMTS'),
(2, 'MAHASISWA');

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
-- Constraints for dumped tables
--

--
-- Constraints for table `audit`
--
ALTER TABLE `audit`
  ADD CONSTRAINT `audit_ibfk_1` FOREIGN KEY (`ID_AUDITEE`) REFERENCES `auditee` (`ID_AUDITEE`),
  ADD CONSTRAINT `audit_ibfk_2` FOREIGN KEY (`ID_JAWAB`) REFERENCES `jawab` (`ID_JAWAB`),
  ADD CONSTRAINT `audit_ibfk_3` FOREIGN KEY (`ID_AUDITOR`) REFERENCES `auditor` (`ID_AUDITOR`);

--
-- Constraints for table `indikator`
--
ALTER TABLE `indikator`
  ADD CONSTRAINT `FK_RELATIONSHIP_1` FOREIGN KEY (`ID_KRITERIA`) REFERENCES `kriteria` (`ID_KRITERIA`);

--
-- Constraints for table `jadwal`
--
ALTER TABLE `jadwal`
  ADD CONSTRAINT `FK_JADWAL_AUDITEE` FOREIGN KEY (`ID_AUDITEE`) REFERENCES `auditee` (`ID_AUDITEE`),
  ADD CONSTRAINT `FK_JADWAL_AUDITOR` FOREIGN KEY (`ID_AUDITOR`) REFERENCES `auditor` (`ID_AUDITOR`);

--
-- Constraints for table `jawab`
--
ALTER TABLE `jawab`
  ADD CONSTRAINT `FK_RELATIONSHIP_2` FOREIGN KEY (`ID_INDIKATOR`) REFERENCES `indikator` (`ID_INDIKATOR`),
  ADD CONSTRAINT `FK_RELATIONSHIP_3` FOREIGN KEY (`ID_KRITERIA`) REFERENCES `kriteria` (`ID_KRITERIA`);
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
