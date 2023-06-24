-- phpMyAdmin SQL Dump
-- version 5.2.0
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Jun 24, 2023 at 04:27 AM
-- Server version: 10.4.27-MariaDB
-- PHP Version: 7.4.33

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `projek_akhir`
--

-- --------------------------------------------------------

--
-- Table structure for table `tb_angkatan`
--

CREATE TABLE `tb_angkatan` (
  `kd_angkatan` varchar(11) NOT NULL,
  `tahun_angkatan` int(11) NOT NULL,
  `spp` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `tb_angkatan`
--

INSERT INTO `tb_angkatan` (`kd_angkatan`, `tahun_angkatan`, `spp`) VALUES
('A-001', 2020, 125000),
('A-002', 2021, 125000),
('A-003', 2022, 125000);

-- --------------------------------------------------------

--
-- Table structure for table `tb_buku`
--

CREATE TABLE `tb_buku` (
  `kd_buku` varchar(11) NOT NULL,
  `nama_buku` text NOT NULL,
  `tingkat` varchar(11) NOT NULL,
  `tipe` text NOT NULL,
  `harga` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `tb_buku`
--

INSERT INTO `tb_buku` (`kd_buku`, `nama_buku`, `tingkat`, `tipe`, `harga`) VALUES
('B-001', 'Bahasa Indonesia', '7', 'LKS', 25000),
('B-002', 'Ilmu Pengetahuan Alam', '7', 'LKS', 25000),
('B-003', 'Matematika', '7', 'LKS', 25000),
('B-004', 'Ilmu Pengetahuan Sosial', '7', 'LKS', 25000),
('B-005', 'Seni Budaya', '7', 'LKS', 25000),
('B-006', 'Bahasa Indonesia', '8', 'LKS', 25000),
('B-007', 'Ilmu Pengetahuan Alam', '8', 'LKS', 25000),
('B-008', 'Matematika', '8', 'LKS', 25000),
('B-009', 'Ilmu Pengetauan Sosial', '8', 'LKS', 25000),
('B-010', 'Seni Budaya', '8', 'LKS', 25000),
('B-011', 'Bahasa Indonesia', '9', 'LKS', 25000),
('B-012', 'Ilmu Pengetahuan Alam', '9', 'LKS', 25000),
('B-013', 'Matematika', '9', 'LKS', 25000),
('B-014', 'Ilmu Pengetahuan Sosial', '9', 'LKS', 25000),
('B-015', 'Seni Budaya', '9', 'LKS', 25000);

-- --------------------------------------------------------

--
-- Table structure for table `tb_kelas`
--

CREATE TABLE `tb_kelas` (
  `kd_kelas` varchar(11) NOT NULL,
  `nama_kelas` varchar(11) NOT NULL,
  `wali_kelas` text NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `tb_kelas`
--

INSERT INTO `tb_kelas` (`kd_kelas`, `nama_kelas`, `wali_kelas`) VALUES
('K-001', '7.A', 'KURNIAWATY,S.Pd.'),
('K-002', '7.B', 'MARDIANA,S.Pd.'),
('K-003', '8.A', 'SUKMADIYATI,S.Pd.'),
('K-004', '8.B', 'ABDUL RASYID,S.Pd.'),
('K-005', '8.C', 'ABDILLAH FAHREZI,S.Pd.'),
('K-006', '8.D', 'KURNIA ANASTASIA,S.Pd.'),
('K-007', '9.A', 'SLAMAT RIYADI,S.Pd.'),
('K-008', '9.B', 'RANI WULANDARI,S.Pd.'),
('K-009', '9.C', 'SATRIA,S.Pd.');

-- --------------------------------------------------------

--
-- Table structure for table `tb_siswa`
--

CREATE TABLE `tb_siswa` (
  `nis` varchar(25) NOT NULL,
  `nama_siswa` text NOT NULL,
  `kd_angkatan` varchar(11) NOT NULL,
  `kd_kelas` varchar(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `tb_siswa`
--

INSERT INTO `tb_siswa` (`nis`, `nama_siswa`, `kd_angkatan`, `kd_kelas`) VALUES
('106095630002', 'Arya Peratama', 'A-003', 'K-001'),
('106095630003', 'Dina Amanda', 'A-003', 'K-001'),
('106095630004', 'Erra Fazira', 'A-003', 'K-001'),
('106095630005', 'Febri', 'A-003', 'K-001'),
('106095630006', 'Helen Agustin', 'A-003', 'K-002'),
('106095630007', 'Iqbal Al Fariz', 'A-003', 'K-002'),
('106095630008', 'Lietriyadi', 'A-003', 'K-002'),
('106095630009', 'Luci Amelia', 'A-003', 'K-002'),
('106095630010', 'M. Eka Apriza', 'A-003', 'K-002'),
('106095630011', 'M. Fatir Ramadhan', 'A-002', 'K-003'),
('106095630012', 'M. Ferdi Agustian', 'A-002', 'K-003'),
('106095630013', 'M. Haikal', 'A-002', 'K-003'),
('106095630014', 'M. Rafli', 'A-002', 'K-003'),
('106095630015', 'M. Ridho', 'A-002', 'K-003'),
('106095630016', 'Marissa', 'A-002', 'K-004'),
('106095630017', 'Muhammad Arif', 'A-002', 'K-004'),
('106095630018', 'Muhammad Ridwan', 'A-002', 'K-004'),
('106095630019', 'Nazwa', 'A-002', 'K-004'),
('106095630020', 'Nur', 'A-002', 'K-004'),
('106095630021', 'Nuraini', 'A-002', 'K-005'),
('106095630022', 'Nurjinah', 'A-002', 'K-005'),
('106095630023', 'Oktavia Ramadhani', 'A-002', 'K-005'),
('106095630024', 'Pandu Wijaya', 'A-002', 'K-005'),
('106095630025', 'Rachamn Ramadhan', 'A-002', 'K-005'),
('106095630026', 'Rosidi', 'A-002', 'K-006'),
('106095630027', 'Saptadewi Maharani', 'A-002', 'K-006'),
('106095630028', 'Satria', 'A-002', 'K-006'),
('106095630029', 'Siti Nabilah', 'A-002', 'K-006'),
('106095630030', 'Widya Sari', 'A-002', 'K-006'),
('106095630031', 'Ahmad Danil', 'A-001', 'K-007'),
('106095630032', 'Ahmad Iqbal', 'A-001', 'K-007'),
('106095630033', 'Ahmad Rizky Akbar', 'A-001', 'K-007'),
('106095630034', 'Aisyah Putriani', 'A-001', 'K-007'),
('106095630035', 'Alwi', 'A-001', 'K-007'),
('106095630036', 'Aminah', 'A-001', 'K-008'),
('106095630037', 'Cheilista Ramadhani', 'A-001', 'K-008'),
('106095630038', 'Dimas Dio Andrean', 'A-001', 'K-008'),
('106095630039', 'Erwin', 'A-001', 'K-008'),
('106095630040', 'Feri Andiansyah', 'A-001', 'K-008'),
('106095630041', 'Intan Ramadini', 'A-001', 'K-009'),
('106095630042', 'Jingga Berlianti', 'A-001', 'K-009'),
('106095630043', 'Keyza Davira', 'A-001', 'K-009'),
('106095630044', 'M. Ardiansyah', 'A-001', 'K-009'),
('106095630045', 'M. Firmansyah', 'A-001', 'K-009');

-- --------------------------------------------------------

--
-- Table structure for table `tb_tagihan_buku`
--

CREATE TABLE `tb_tagihan_buku` (
  `id_tagihan` int(11) NOT NULL,
  `nis` varchar(25) NOT NULL,
  `kd_buku` varchar(11) NOT NULL,
  `nobayar` varchar(25) DEFAULT NULL,
  `tglbayar` date DEFAULT NULL,
  `harga_buku` int(11) DEFAULT NULL,
  `ket` text DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `tb_tagihan_buku`
--

INSERT INTO `tb_tagihan_buku` (`id_tagihan`, `nis`, `kd_buku`, `nobayar`, `tglbayar`, `harga_buku`, `ket`) VALUES
(68, '106095630002', 'B-001', '2023-03-080001', '2023-03-08', 25000, 'LUNAS'),
(69, '106095630003', 'B-001', NULL, NULL, 25000, NULL),
(70, '106095630004', 'B-001', NULL, NULL, 25000, NULL),
(71, '106095630005', 'B-001', NULL, NULL, 25000, NULL),
(76, '106095630002', 'B-002', NULL, NULL, 25000, NULL),
(77, '106095630002', 'B-003', NULL, NULL, 25000, NULL),
(78, '106095630002', 'B-004', NULL, NULL, 25000, NULL),
(79, '106095630005', 'B-005', NULL, NULL, 25000, NULL),
(80, '106095630003', 'B-002', NULL, NULL, 25000, NULL),
(81, '106095630003', 'B-003', NULL, NULL, 25000, NULL),
(82, '106095630003', 'B-004', NULL, NULL, 25000, NULL),
(83, '106095630003', 'B-005', NULL, NULL, 25000, NULL),
(84, '106095630004', 'B-002', NULL, NULL, 25000, NULL),
(85, '106095630004', 'B-003', NULL, NULL, 25000, NULL),
(86, '106095630004', 'B-004', NULL, NULL, 25000, NULL),
(87, '106095630004', 'B-005', NULL, NULL, 25000, NULL),
(88, '106095630005', 'B-002', NULL, NULL, 25000, NULL),
(89, '106095630005', 'B-003', NULL, NULL, 25000, NULL),
(90, '106095630005', 'B-004', NULL, NULL, 25000, NULL);

-- --------------------------------------------------------

--
-- Table structure for table `tb_tagihan_spp`
--

CREATE TABLE `tb_tagihan_spp` (
  `id_tagihan` int(11) NOT NULL,
  `kd_spp` varchar(11) DEFAULT NULL,
  `nis` varchar(25) DEFAULT NULL,
  `tahun_ajaran` varchar(25) DEFAULT NULL,
  `bulan` varchar(25) DEFAULT NULL,
  `tglbayar` date DEFAULT NULL,
  `nobayar` varchar(25) DEFAULT NULL,
  `biaya_spp` int(11) DEFAULT NULL,
  `ket` varchar(25) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `tb_tagihan_spp`
--

INSERT INTO `tb_tagihan_spp` (`id_tagihan`, `kd_spp`, `nis`, `tahun_ajaran`, `bulan`, `tglbayar`, `nobayar`, `biaya_spp`, `ket`) VALUES
(142625, NULL, '106095630003', '2023', 'Agustus', NULL, NULL, 125000, NULL),
(142626, NULL, '106095630003', '2023', 'September', NULL, NULL, 125000, NULL),
(142627, NULL, '106095630003', '2023', 'Oktober', NULL, NULL, 125000, NULL),
(142628, NULL, '106095630003', '2023', 'November', NULL, NULL, 125000, NULL),
(142629, NULL, '106095630003', '2023', 'Desember', NULL, NULL, 125000, NULL),
(142630, NULL, '106095630003', '2023', 'Januari', NULL, NULL, 125000, NULL),
(142631, NULL, '106095630003', '2023', 'Februari', NULL, NULL, 125000, NULL),
(142632, NULL, '106095630003', '2023', 'Maret', NULL, NULL, 125000, NULL),
(142633, NULL, '106095630003', '2023', 'April', NULL, NULL, 125000, NULL),
(142634, NULL, '106095630003', '2023', 'Mei', NULL, NULL, 125000, NULL),
(142635, NULL, '106095630003', '2023', 'Juni', NULL, NULL, 125000, NULL),
(142636, NULL, '106095630005', '2023', 'Juli', '2023-03-15', '2303150001', 125000, 'LUNAS'),
(142637, NULL, '106095630005', '2023', 'Agustus', '2023-05-27', '2305270001', 125000, 'LUNAS'),
(142638, NULL, '106095630005', '2023', 'September', NULL, NULL, 125000, NULL),
(142639, NULL, '106095630005', '2023', 'Oktober', NULL, NULL, 125000, NULL),
(142640, NULL, '106095630005', '2023', 'November', NULL, NULL, 125000, NULL),
(142641, NULL, '106095630005', '2023', 'Desember', NULL, NULL, 125000, NULL),
(142642, NULL, '106095630005', '2023', 'Januari', NULL, NULL, 125000, NULL),
(142643, NULL, '106095630005', '2023', 'Februari', NULL, NULL, 125000, NULL),
(142644, NULL, '106095630005', '2023', 'Maret', NULL, NULL, 125000, NULL),
(142645, NULL, '106095630005', '2023', 'April', NULL, NULL, 125000, NULL),
(142646, NULL, '106095630005', '2023', 'Mei', NULL, NULL, 125000, NULL),
(142647, NULL, '106095630005', '2023', 'Juni', NULL, NULL, 125000, NULL),
(142648, NULL, '106095630009', '2023', 'Juli', '2023-03-16', '2303160001', 125000, 'LUNAS'),
(142649, NULL, '106095630009', '2023', 'Agustus', '2023-03-16', '2303160002', 125000, 'LUNAS'),
(142650, NULL, '106095630009', '2023', 'September', '2023-03-16', '2303160003', 125000, 'LUNAS'),
(142651, NULL, '106095630009', '2023', 'Oktober', NULL, NULL, 125000, NULL),
(142652, NULL, '106095630009', '2023', 'November', NULL, NULL, 125000, NULL),
(142653, NULL, '106095630009', '2023', 'Desember', NULL, NULL, 125000, NULL),
(142654, NULL, '106095630009', '2023', 'Januari', NULL, NULL, 125000, NULL),
(142655, NULL, '106095630009', '2023', 'Februari', NULL, NULL, 125000, NULL),
(142656, NULL, '106095630009', '2023', 'Maret', NULL, NULL, 125000, NULL),
(142657, NULL, '106095630009', '2023', 'April', NULL, NULL, 125000, NULL),
(142658, NULL, '106095630009', '2023', 'Mei', NULL, NULL, 125000, NULL),
(142659, NULL, '106095630009', '2023', 'Juni', NULL, NULL, 125000, NULL),
(142660, NULL, '106095630010', '2023', 'Juli', '2023-03-17', '2303170001', 125000, 'LUNAS'),
(142661, NULL, '106095630010', '2023', 'Agustus', '2023-03-17', '2303170002', 125000, 'LUNAS'),
(142662, NULL, '106095630010', '2023', 'September', '2023-03-17', '2303170003', 125000, 'LUNAS'),
(142663, NULL, '106095630010', '2023', 'Oktober', '2023-03-17', '2303170004', 125000, 'LUNAS'),
(142664, NULL, '106095630010', '2023', 'November', '2023-03-17', '2303170005', 125000, 'LUNAS'),
(142665, NULL, '106095630010', '2023', 'Desember', NULL, NULL, 125000, NULL),
(142666, NULL, '106095630010', '2023', 'Januari', NULL, NULL, 125000, NULL),
(142667, NULL, '106095630010', '2023', 'Februari', NULL, NULL, 125000, NULL),
(142668, NULL, '106095630010', '2023', 'Maret', NULL, NULL, 125000, NULL),
(142669, NULL, '106095630010', '2023', 'April', NULL, NULL, 125000, NULL),
(142670, NULL, '106095630010', '2023', 'Mei', NULL, NULL, 125000, NULL),
(142671, NULL, '106095630010', '2023', 'Juni', NULL, NULL, 125000, NULL),
(142672, NULL, '106095630014', '2023', 'Juli', NULL, NULL, 125000, NULL),
(142673, NULL, '106095630014', '2023', 'Agustus', NULL, NULL, 125000, NULL),
(142674, NULL, '106095630014', '2023', 'September', NULL, NULL, 125000, NULL),
(142675, NULL, '106095630014', '2023', 'Oktober', NULL, NULL, 125000, NULL),
(142676, NULL, '106095630014', '2023', 'November', NULL, NULL, 125000, NULL),
(142677, NULL, '106095630014', '2023', 'Desember', NULL, NULL, 125000, NULL),
(142678, NULL, '106095630014', '2023', 'Januari', NULL, NULL, 125000, NULL),
(142679, NULL, '106095630014', '2023', 'Februari', NULL, NULL, 125000, NULL),
(142680, NULL, '106095630014', '2023', 'Maret', NULL, NULL, 125000, NULL),
(142681, NULL, '106095630014', '2023', 'April', NULL, NULL, 125000, NULL),
(142682, NULL, '106095630014', '2023', 'Mei', NULL, NULL, 125000, NULL),
(142683, NULL, '106095630014', '2023', 'Juni', NULL, NULL, 125000, NULL),
(142684, NULL, '106095630045', '2023', 'September', '2023-05-27', '2305270002', 125000, 'LUNAS'),
(142685, NULL, '106095630045', '2023', 'Oktober', NULL, NULL, 125000, NULL),
(142686, NULL, '106095630045', '2023', 'November', NULL, NULL, 125000, NULL),
(142687, NULL, '106095630045', '2023', 'Desember', NULL, NULL, 125000, NULL),
(142688, NULL, '106095630045', '2023', 'Januari', NULL, NULL, 125000, NULL),
(142689, NULL, '106095630045', '2023', 'Februari', NULL, NULL, 125000, NULL),
(142690, NULL, '106095630045', '2023', 'Maret', NULL, NULL, 125000, NULL),
(142691, NULL, '106095630045', '2023', 'April', NULL, NULL, 125000, NULL),
(142692, NULL, '106095630045', '2023', 'Mei', NULL, NULL, 125000, NULL),
(142693, NULL, '106095630045', '2023', 'Juni', NULL, NULL, 125000, NULL),
(142694, NULL, '106095630045', '2023', 'Juli', NULL, NULL, 125000, NULL),
(142695, NULL, '106095630045', '2023', 'Agustus', NULL, NULL, 125000, NULL),
(142696, NULL, '106095630002', '2023', 'Oktober', '2023-06-23', '2306230001', 125000, 'LUNAS'),
(142697, NULL, '106095630002', '2023', 'November', NULL, NULL, 125000, NULL),
(142698, NULL, '106095630002', '2023', 'Desember', NULL, NULL, 125000, NULL),
(142699, NULL, '106095630002', '2023', 'Januari', NULL, NULL, 125000, NULL),
(142700, NULL, '106095630002', '2023', 'Februari', NULL, NULL, 125000, NULL),
(142701, NULL, '106095630002', '2023', 'Maret', NULL, NULL, 125000, NULL),
(142702, NULL, '106095630002', '2023', 'April', NULL, NULL, 125000, NULL),
(142703, NULL, '106095630002', '2023', 'Mei', NULL, NULL, 125000, NULL),
(142704, NULL, '106095630002', '2023', 'Juni', NULL, NULL, 125000, NULL),
(142705, NULL, '106095630002', '2023', 'Juli', NULL, NULL, 125000, NULL),
(142706, NULL, '106095630002', '2023', 'Agustus', NULL, NULL, 125000, NULL),
(142707, NULL, '106095630002', '2023', 'September', NULL, NULL, 125000, NULL);

-- --------------------------------------------------------

--
-- Table structure for table `users`
--

CREATE TABLE `users` (
  `id_user` int(11) NOT NULL,
  `username` varchar(50) NOT NULL,
  `password` varchar(50) NOT NULL,
  `namalengkap` text NOT NULL,
  `level` varchar(50) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `users`
--

INSERT INTO `users` (`id_user`, `username`, `password`, `namalengkap`, `level`) VALUES
(2, 'selamatalfisyahrin@bendahara.pgri1.ac.id', 'bendahara', 'Selamat Alfisyahrin', 'bendahara'),
(3, 'Alfi@operator.pgri1.ac.id', 'operator', 'Alfisyahrin', 'operator'),
(5, 'selamatalfisyahrin@tu.pgri1.ac.id', 'tatausaha', 'Selamat Alfisyahrin', 'tu'),
(6, 'b', 'b', 'b', 'bendahara');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `tb_angkatan`
--
ALTER TABLE `tb_angkatan`
  ADD PRIMARY KEY (`kd_angkatan`);

--
-- Indexes for table `tb_buku`
--
ALTER TABLE `tb_buku`
  ADD PRIMARY KEY (`kd_buku`);

--
-- Indexes for table `tb_kelas`
--
ALTER TABLE `tb_kelas`
  ADD PRIMARY KEY (`kd_kelas`);

--
-- Indexes for table `tb_siswa`
--
ALTER TABLE `tb_siswa`
  ADD PRIMARY KEY (`nis`),
  ADD KEY `kd_angkatan` (`kd_angkatan`),
  ADD KEY `kd_kelas` (`kd_kelas`);

--
-- Indexes for table `tb_tagihan_buku`
--
ALTER TABLE `tb_tagihan_buku`
  ADD PRIMARY KEY (`id_tagihan`),
  ADD KEY `kd_buku` (`kd_buku`),
  ADD KEY `nis` (`nis`);

--
-- Indexes for table `tb_tagihan_spp`
--
ALTER TABLE `tb_tagihan_spp`
  ADD PRIMARY KEY (`id_tagihan`),
  ADD KEY `kd_spp` (`kd_spp`),
  ADD KEY `nis` (`nis`);

--
-- Indexes for table `users`
--
ALTER TABLE `users`
  ADD PRIMARY KEY (`id_user`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `tb_tagihan_buku`
--
ALTER TABLE `tb_tagihan_buku`
  MODIFY `id_tagihan` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=91;

--
-- AUTO_INCREMENT for table `tb_tagihan_spp`
--
ALTER TABLE `tb_tagihan_spp`
  MODIFY `id_tagihan` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=142708;

--
-- AUTO_INCREMENT for table `users`
--
ALTER TABLE `users`
  MODIFY `id_user` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=7;

--
-- Constraints for dumped tables
--

--
-- Constraints for table `tb_siswa`
--
ALTER TABLE `tb_siswa`
  ADD CONSTRAINT `tb_siswa_ibfk_1` FOREIGN KEY (`kd_angkatan`) REFERENCES `tb_angkatan` (`kd_angkatan`) ON UPDATE CASCADE,
  ADD CONSTRAINT `tb_siswa_ibfk_2` FOREIGN KEY (`kd_kelas`) REFERENCES `tb_kelas` (`kd_kelas`) ON UPDATE CASCADE;

--
-- Constraints for table `tb_tagihan_buku`
--
ALTER TABLE `tb_tagihan_buku`
  ADD CONSTRAINT `tb_tagihan_buku_ibfk_1` FOREIGN KEY (`nis`) REFERENCES `tb_siswa` (`nis`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `tb_tagihan_buku_ibfk_2` FOREIGN KEY (`kd_buku`) REFERENCES `tb_buku` (`kd_buku`) ON UPDATE CASCADE;

--
-- Constraints for table `tb_tagihan_spp`
--
ALTER TABLE `tb_tagihan_spp`
  ADD CONSTRAINT `tb_tagihan_spp_ibfk_1` FOREIGN KEY (`nis`) REFERENCES `tb_siswa` (`nis`) ON DELETE CASCADE ON UPDATE CASCADE;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
