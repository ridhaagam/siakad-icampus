-- phpMyAdmin SQL Dump
-- version 5.0.2
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: May 30, 2021 at 11:50 AM
-- Server version: 10.4.14-MariaDB
-- PHP Version: 7.4.10

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `icampus-khs`
--

-- --------------------------------------------------------

--
-- Table structure for table `dosen`
--

CREATE TABLE `dosen` (
  `id_dosen` int(5) NOT NULL,
  `nidn` int(10) DEFAULT NULL,
  `kode_dosen` varchar(8) DEFAULT NULL,
  `nama_dosen` varchar(40) DEFAULT NULL,
  `jenkel` enum('Laki-laki','Perempuan','','') NOT NULL,
  `password` varchar(8) NOT NULL,
  `email` varchar(50) DEFAULT NULL,
  `no_hp` varchar(13) DEFAULT NULL,
  `pendidikan` enum('S2','S3','Profesor','') DEFAULT NULL,
  `foto` varchar(255) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `dosen`
--

INSERT INTO `dosen` (`id_dosen`, `nidn`, `kode_dosen`, `nama_dosen`, `jenkel`, `password`, `email`, `no_hp`, `pendidikan`, `foto`) VALUES
(4, 714086102, 'DSN0001', 'Dr. Fauzan, M.Pd', 'Laki-laki', 'admin', 'fauzan@umm.ac.id', '081254658956', 'S3', '1622345430_ded8cc1b7a66adf28ebf.png');

-- --------------------------------------------------------

--
-- Table structure for table `fakultas`
--

CREATE TABLE `fakultas` (
  `id_fakultas` int(3) NOT NULL,
  `fakultas` varchar(55) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `fakultas`
--

INSERT INTO `fakultas` (`id_fakultas`, `fakultas`) VALUES
(5, 'Fakultas Ekonomi dan Bisnis'),
(6, 'Fakultas Agama Islam'),
(7, 'Fakultas Hukum'),
(8, 'Fakultas Ilmu Kesehatan'),
(9, 'Fakultas Ilmu Sosial dan Politik'),
(10, 'Fakultas Kedokteran'),
(11, 'Fakultas Keguruan dan Ilmu Pendidikan'),
(12, 'Fakultas Pertanian dan Peternakan'),
(14, 'Fakultas Teknik'),
(15, 'Fakultas Psikologi');

-- --------------------------------------------------------

--
-- Table structure for table `gedung`
--

CREATE TABLE `gedung` (
  `id_gedung` int(3) NOT NULL,
  `gedung` varchar(40) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `gedung`
--

INSERT INTO `gedung` (`id_gedung`, `gedung`) VALUES
(1, 'GKB 1'),
(2, 'GKB 2'),
(3, 'GKB 3'),
(4, 'GKB 4'),
(6, 'Gedung Perkuliahan Kampus II'),
(7, 'Gedung Perkuliahan Kampus I');

-- --------------------------------------------------------

--
-- Table structure for table `jadwal_kuliah`
--

CREATE TABLE `jadwal_kuliah` (
  `id_jadwal_kuliah` int(11) NOT NULL,
  `id_prodi` int(3) DEFAULT NULL,
  `id_tahun_akademik` int(3) DEFAULT NULL,
  `id_kelas` int(3) DEFAULT NULL,
  `id_matkul` int(3) DEFAULT NULL,
  `id_dosen` int(5) DEFAULT NULL,
  `hari` varchar(255) DEFAULT NULL,
  `waktu` varchar(255) DEFAULT NULL,
  `id_ruangan` int(3) DEFAULT NULL,
  `kuota` int(11) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `jadwal_kuliah`
--

INSERT INTO `jadwal_kuliah` (`id_jadwal_kuliah`, `id_prodi`, `id_tahun_akademik`, `id_kelas`, `id_matkul`, `id_dosen`, `hari`, `waktu`, `id_ruangan`, `kuota`) VALUES
(12, 1, 1, 1, 4, 4, 'Senin', '07:00 - 08:40', 3, 47);

-- --------------------------------------------------------

--
-- Table structure for table `kelas`
--

CREATE TABLE `kelas` (
  `id_kelas` int(3) NOT NULL,
  `kelas` varchar(10) DEFAULT NULL,
  `id_prodi` int(3) DEFAULT NULL,
  `id_dosen` int(5) DEFAULT NULL,
  `angkatan` year(4) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `kelas`
--

INSERT INTO `kelas` (`id_kelas`, `kelas`, `id_prodi`, `id_dosen`, `angkatan`) VALUES
(1, 'A', 1, 4, 2021);

-- --------------------------------------------------------

--
-- Table structure for table `krs`
--

CREATE TABLE `krs` (
  `id_krs` int(11) NOT NULL,
  `nim` varchar(16) NOT NULL,
  `id_jadwal_kuliah` int(11) NOT NULL,
  `id_tahun_akademik` int(3) NOT NULL,
  `p1` int(3) NOT NULL,
  `p2` int(3) NOT NULL,
  `p3` int(3) NOT NULL,
  `p4` int(3) NOT NULL,
  `p5` int(3) NOT NULL,
  `p6` int(3) NOT NULL,
  `p7` int(3) NOT NULL,
  `p8` int(3) NOT NULL,
  `p9` int(3) NOT NULL,
  `p10` int(3) NOT NULL,
  `p11` int(3) NOT NULL,
  `p12` int(3) NOT NULL,
  `p13` int(3) NOT NULL,
  `p14` int(3) NOT NULL,
  `p15` int(3) NOT NULL,
  `p16` int(3) NOT NULL,
  `nilai_tugas` int(3) NOT NULL,
  `nilai_uts` int(3) NOT NULL,
  `nilai_uas` int(3) NOT NULL,
  `nilai_akhir` int(3) NOT NULL,
  `nilai_huruf` varchar(2) NOT NULL,
  `bobot` int(3) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

-- --------------------------------------------------------

--
-- Table structure for table `mahasiswa`
--

CREATE TABLE `mahasiswa` (
  `id_mhs` int(11) NOT NULL,
  `nim` varchar(15) DEFAULT NULL,
  `nama_mahasiswa` varchar(40) DEFAULT NULL,
  `id_prodi` int(3) DEFAULT NULL,
  `jenkel` enum('Laki-laki','Perempuan','','') DEFAULT NULL,
  `password` varchar(8) DEFAULT NULL,
  `no_hp` varchar(13) DEFAULT NULL,
  `email` varchar(50) DEFAULT NULL,
  `alamat` text DEFAULT NULL,
  `foto` varchar(255) DEFAULT NULL,
  `id_kelas` int(11) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

-- --------------------------------------------------------

--
-- Table structure for table `matkul`
--

CREATE TABLE `matkul` (
  `id_matkul` int(3) NOT NULL,
  `kode_matkul` int(11) DEFAULT NULL,
  `matkul` varchar(50) DEFAULT NULL,
  `sks` int(3) DEFAULT NULL,
  `kategori` varchar(10) DEFAULT NULL,
  `smt` int(1) DEFAULT NULL,
  `semester` varchar(10) DEFAULT NULL,
  `id_prodi` int(3) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `matkul`
--

INSERT INTO `matkul` (`id_matkul`, `kode_matkul`, `matkul`, `sks`, `kategori`, `smt`, `semester`, `id_prodi`) VALUES
(1, 120374975, 'Foreign Language of Specific Purpose', 4, 'Wajib', 2, 'Genap', 1),
(4, 23232143, 'Pemrograman Dasar', 3, 'Pilihan', 1, 'Ganjil', 1);

-- --------------------------------------------------------

--
-- Table structure for table `prodi`
--

CREATE TABLE `prodi` (
  `id_prodi` int(3) NOT NULL,
  `kode_prodi` int(6) DEFAULT NULL,
  `id_fakultas` int(3) DEFAULT NULL,
  `prodi` varchar(55) DEFAULT NULL,
  `jenjang` enum('D3','D4','S1','S2','S3') NOT NULL,
  `ka_prodi` varchar(40) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `prodi`
--

INSERT INTO `prodi` (`id_prodi`, `kode_prodi`, `id_fakultas`, `prodi`, `jenjang`, `ka_prodi`) VALUES
(1, 55201, 14, 'Informatika', 'S2', 'Gita Indah Marthasari, Hj., ST., M.Kom'),
(5, 55202, 15, 'FIKES', 'S1', 'Gita Indah Marthasari, Hj., ST., M.Kom'),
(6, 55203, 14, 'Teknik Informatika', 'S1', 'Gita Indah Marthasari, Hj., ST., M.Kom');

-- --------------------------------------------------------

--
-- Table structure for table `ruangan`
--

CREATE TABLE `ruangan` (
  `id_ruangan` int(3) NOT NULL,
  `id_gedung` int(3) DEFAULT NULL,
  `ruangan` varchar(30) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `ruangan`
--

INSERT INTO `ruangan` (`id_ruangan`, `id_gedung`, `ruangan`) VALUES
(3, 1, '2A'),
(4, 2, '2B');

-- --------------------------------------------------------

--
-- Table structure for table `tahun_akademik`
--

CREATE TABLE `tahun_akademik` (
  `id_tahun_akademik` int(3) NOT NULL,
  `ta` varchar(10) DEFAULT NULL,
  `semester` varchar(10) DEFAULT NULL,
  `status` int(2) DEFAULT 0
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `tahun_akademik`
--

INSERT INTO `tahun_akademik` (`id_tahun_akademik`, `ta`, `semester`, `status`) VALUES
(1, '2020/2021', 'Ganjil', 1),
(2, '2020/2021', 'Genap', 1);

-- --------------------------------------------------------

--
-- Table structure for table `user`
--

CREATE TABLE `user` (
  `id_user` int(3) NOT NULL,
  `username` varchar(16) NOT NULL,
  `password` varchar(8) NOT NULL,
  `nama_user` varchar(40) NOT NULL,
  `foto` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `user`
--

INSERT INTO `user` (`id_user`, `username`, `password`, `nama_user`, `foto`) VALUES
(2, 'admin', 'admin', 'Putro Setyoko', '1622354182_3a085a456e45016eafe2.jpg');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `dosen`
--
ALTER TABLE `dosen`
  ADD PRIMARY KEY (`id_dosen`);

--
-- Indexes for table `fakultas`
--
ALTER TABLE `fakultas`
  ADD PRIMARY KEY (`id_fakultas`);

--
-- Indexes for table `gedung`
--
ALTER TABLE `gedung`
  ADD PRIMARY KEY (`id_gedung`);

--
-- Indexes for table `jadwal_kuliah`
--
ALTER TABLE `jadwal_kuliah`
  ADD PRIMARY KEY (`id_jadwal_kuliah`),
  ADD KEY `id_prodi` (`id_prodi`),
  ADD KEY `id_tahun_akademik` (`id_tahun_akademik`),
  ADD KEY `id_kelas` (`id_kelas`),
  ADD KEY `id_matkul` (`id_matkul`),
  ADD KEY `nidn` (`id_dosen`),
  ADD KEY `id_ruangan` (`id_ruangan`);

--
-- Indexes for table `kelas`
--
ALTER TABLE `kelas`
  ADD PRIMARY KEY (`id_kelas`),
  ADD KEY `id_prodi` (`id_prodi`),
  ADD KEY `id_dosen` (`id_dosen`);

--
-- Indexes for table `krs`
--
ALTER TABLE `krs`
  ADD PRIMARY KEY (`id_krs`),
  ADD KEY `nim` (`nim`),
  ADD KEY `id_jadwal_kuliah` (`id_jadwal_kuliah`),
  ADD KEY `id_tahun_akademik` (`id_tahun_akademik`);

--
-- Indexes for table `mahasiswa`
--
ALTER TABLE `mahasiswa`
  ADD PRIMARY KEY (`id_mhs`),
  ADD KEY `id_prodi` (`id_prodi`);

--
-- Indexes for table `matkul`
--
ALTER TABLE `matkul`
  ADD PRIMARY KEY (`id_matkul`),
  ADD KEY `id_prodi` (`id_prodi`);

--
-- Indexes for table `prodi`
--
ALTER TABLE `prodi`
  ADD PRIMARY KEY (`id_prodi`),
  ADD KEY `id_fakultas` (`id_fakultas`);

--
-- Indexes for table `ruangan`
--
ALTER TABLE `ruangan`
  ADD PRIMARY KEY (`id_ruangan`),
  ADD KEY `id_gedung` (`id_gedung`);

--
-- Indexes for table `tahun_akademik`
--
ALTER TABLE `tahun_akademik`
  ADD PRIMARY KEY (`id_tahun_akademik`);

--
-- Indexes for table `user`
--
ALTER TABLE `user`
  ADD PRIMARY KEY (`id_user`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `dosen`
--
ALTER TABLE `dosen`
  MODIFY `id_dosen` int(5) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=7;

--
-- AUTO_INCREMENT for table `fakultas`
--
ALTER TABLE `fakultas`
  MODIFY `id_fakultas` int(3) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=16;

--
-- AUTO_INCREMENT for table `gedung`
--
ALTER TABLE `gedung`
  MODIFY `id_gedung` int(3) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=11;

--
-- AUTO_INCREMENT for table `jadwal_kuliah`
--
ALTER TABLE `jadwal_kuliah`
  MODIFY `id_jadwal_kuliah` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=13;

--
-- AUTO_INCREMENT for table `kelas`
--
ALTER TABLE `kelas`
  MODIFY `id_kelas` int(3) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=7;

--
-- AUTO_INCREMENT for table `krs`
--
ALTER TABLE `krs`
  MODIFY `id_krs` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `mahasiswa`
--
ALTER TABLE `mahasiswa`
  MODIFY `id_mhs` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;

--
-- AUTO_INCREMENT for table `matkul`
--
ALTER TABLE `matkul`
  MODIFY `id_matkul` int(3) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- AUTO_INCREMENT for table `prodi`
--
ALTER TABLE `prodi`
  MODIFY `id_prodi` int(3) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=7;

--
-- AUTO_INCREMENT for table `ruangan`
--
ALTER TABLE `ruangan`
  MODIFY `id_ruangan` int(3) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;

--
-- AUTO_INCREMENT for table `tahun_akademik`
--
ALTER TABLE `tahun_akademik`
  MODIFY `id_tahun_akademik` int(3) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT for table `user`
--
ALTER TABLE `user`
  MODIFY `id_user` int(3) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- Constraints for dumped tables
--

--
-- Constraints for table `jadwal_kuliah`
--
ALTER TABLE `jadwal_kuliah`
  ADD CONSTRAINT `jadwal_kuliah_ibfk_1` FOREIGN KEY (`id_prodi`) REFERENCES `prodi` (`id_prodi`),
  ADD CONSTRAINT `jadwal_kuliah_ibfk_2` FOREIGN KEY (`id_tahun_akademik`) REFERENCES `tahun_akademik` (`id_tahun_akademik`),
  ADD CONSTRAINT `jadwal_kuliah_ibfk_3` FOREIGN KEY (`id_kelas`) REFERENCES `kelas` (`id_kelas`),
  ADD CONSTRAINT `jadwal_kuliah_ibfk_4` FOREIGN KEY (`id_matkul`) REFERENCES `matkul` (`id_matkul`),
  ADD CONSTRAINT `jadwal_kuliah_ibfk_6` FOREIGN KEY (`id_ruangan`) REFERENCES `ruangan` (`id_ruangan`),
  ADD CONSTRAINT `jadwal_kuliah_ibfk_7` FOREIGN KEY (`id_dosen`) REFERENCES `dosen` (`id_dosen`);

--
-- Constraints for table `kelas`
--
ALTER TABLE `kelas`
  ADD CONSTRAINT `kelas_ibfk_1` FOREIGN KEY (`id_prodi`) REFERENCES `prodi` (`id_prodi`),
  ADD CONSTRAINT `kelas_ibfk_2` FOREIGN KEY (`id_dosen`) REFERENCES `dosen` (`id_dosen`);

--
-- Constraints for table `krs`
--
ALTER TABLE `krs`
  ADD CONSTRAINT `krs_ibfk_1` FOREIGN KEY (`id_tahun_akademik`) REFERENCES `tahun_akademik` (`id_tahun_akademik`),
  ADD CONSTRAINT `krs_ibfk_2` FOREIGN KEY (`id_jadwal_kuliah`) REFERENCES `jadwal_kuliah` (`id_jadwal_kuliah`);

--
-- Constraints for table `mahasiswa`
--
ALTER TABLE `mahasiswa`
  ADD CONSTRAINT `mahasiswa_ibfk_2` FOREIGN KEY (`id_prodi`) REFERENCES `prodi` (`id_prodi`);

--
-- Constraints for table `matkul`
--
ALTER TABLE `matkul`
  ADD CONSTRAINT `matkul_ibfk_1` FOREIGN KEY (`id_prodi`) REFERENCES `prodi` (`id_prodi`);

--
-- Constraints for table `prodi`
--
ALTER TABLE `prodi`
  ADD CONSTRAINT `prodi_ibfk_1` FOREIGN KEY (`id_fakultas`) REFERENCES `fakultas` (`id_fakultas`);

--
-- Constraints for table `ruangan`
--
ALTER TABLE `ruangan`
  ADD CONSTRAINT `ruangan_ibfk_1` FOREIGN KEY (`id_gedung`) REFERENCES `gedung` (`id_gedung`);
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
