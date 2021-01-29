-- phpMyAdmin SQL Dump
-- version 5.0.2
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Jan 27, 2021 at 08:09 AM
-- Server version: 10.4.11-MariaDB
-- PHP Version: 7.4.4

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `absensi`
--

-- --------------------------------------------------------

--
-- Table structure for table `absenpegawai`
--

CREATE TABLE `absenpegawai` (
  `id_absen` int(11) NOT NULL,
  `id_pegawai` int(11) NOT NULL,
  `tanggal_absen` timestamp NOT NULL DEFAULT current_timestamp() ON UPDATE current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `absenpegawai`
--

INSERT INTO `absenpegawai` (`id_absen`, `id_pegawai`, `tanggal_absen`) VALUES
(1, 6, '2021-01-21 15:58:03');

-- --------------------------------------------------------

--
-- Table structure for table `admin`
--

CREATE TABLE `admin` (
  `id` int(11) NOT NULL,
  `username` varchar(100) NOT NULL,
  `password` varchar(100) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `admin`
--

INSERT INTO `admin` (`id`, `username`, `password`) VALUES
(1, 'admin', 'admin');

-- --------------------------------------------------------

--
-- Table structure for table `datagaji`
--

CREATE TABLE `datagaji` (
  `id_dataGaji` int(11) NOT NULL,
  `nama_gaji` varchar(100) NOT NULL,
  `jumlah_datagaji` int(100) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `datagaji`
--

INSERT INTO `datagaji` (`id_dataGaji`, `nama_gaji`, `jumlah_datagaji`) VALUES
(1, 'Direktur', 10000000),
(2, 'Supervisor', 5000000);

-- --------------------------------------------------------

--
-- Table structure for table `gaji`
--

CREATE TABLE `gaji` (
  `id_gaji` int(11) NOT NULL,
  `id_pegawai` int(11) NOT NULL,
  `tanggal_gaji` date NOT NULL,
  `id_datagaji` int(11) NOT NULL,
  `id_tunjangan` int(11) NOT NULL,
  `id_potongan` int(11) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `gaji`
--

INSERT INTO `gaji` (`id_gaji`, `id_pegawai`, `tanggal_gaji`, `id_datagaji`, `id_tunjangan`, `id_potongan`) VALUES
(1, 13, '2021-01-06', 1, 1, 1),
(2, 7, '2021-01-27', 2, 2, 2),
(13, 12, '2021-01-19', 1, 1, 2),
(15, 7, '2021-01-14', 2, 1, 1),
(16, 12, '2021-01-20', 2, 1, 2),
(21, 7, '2021-01-05', 2, 1, 3);

-- --------------------------------------------------------

--
-- Table structure for table `pegawai`
--

CREATE TABLE `pegawai` (
  `id_pegawai` int(3) NOT NULL,
  `nama_pegawai` varchar(50) NOT NULL,
  `alamat` varchar(50) NOT NULL,
  `agama` varchar(20) NOT NULL,
  `jabatan` varchar(20) NOT NULL,
  `foto` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `pegawai`
--

INSERT INTO `pegawai` (`id_pegawai`, `nama_pegawai`, `alamat`, `agama`, `jabatan`, `foto`) VALUES
(6, 'Adi Setiawan', 'Indonesia', 'Islam', 'Direktur', ''),
(7, 'BoloDewe', 'Tulungagung', 'Islam', 'Supervisor', ''),
(12, 'uhuy', 'lkajsdkj', 'aksjdlkajd', 'Direktur', '14-aku.jpg'),
(13, 'adi', 'a', 'a', 'CEO', '367-aku.jpg');

-- --------------------------------------------------------

--
-- Table structure for table `potongan`
--

CREATE TABLE `potongan` (
  `id_potongan` int(11) NOT NULL,
  `nama_potongan` varchar(100) NOT NULL,
  `jumlah_potongan` int(100) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `potongan`
--

INSERT INTO `potongan` (`id_potongan`, `nama_potongan`, `jumlah_potongan`) VALUES
(1, 'Absen Alpha', 40000),
(2, 'Absen Telat', 10000),
(3, 'Tidak Ada Potongan', NULL),
(4, 'Hutang Kantor', 500000);

-- --------------------------------------------------------

--
-- Table structure for table `tunjangan`
--

CREATE TABLE `tunjangan` (
  `id_tunjangan` int(11) NOT NULL,
  `nama_tunjangan` varchar(100) NOT NULL,
  `jumlah_tunjangan` int(100) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `tunjangan`
--

INSERT INTO `tunjangan` (`id_tunjangan`, `nama_tunjangan`, `jumlah_tunjangan`) VALUES
(1, 'Direktur', 1000000),
(2, 'Supervisor', 500000);

--
-- Indexes for dumped tables
--

--
-- Indexes for table `absenpegawai`
--
ALTER TABLE `absenpegawai`
  ADD PRIMARY KEY (`id_absen`),
  ADD KEY `FK_pegawai_absen` (`id_pegawai`);

--
-- Indexes for table `admin`
--
ALTER TABLE `admin`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `datagaji`
--
ALTER TABLE `datagaji`
  ADD PRIMARY KEY (`id_dataGaji`);

--
-- Indexes for table `gaji`
--
ALTER TABLE `gaji`
  ADD PRIMARY KEY (`id_gaji`),
  ADD KEY `FK_datagaji` (`id_datagaji`),
  ADD KEY `FK_tunjangan` (`id_tunjangan`),
  ADD KEY `FK_potongan` (`id_potongan`),
  ADD KEY `FK_pegawai` (`id_pegawai`);

--
-- Indexes for table `pegawai`
--
ALTER TABLE `pegawai`
  ADD PRIMARY KEY (`id_pegawai`);

--
-- Indexes for table `potongan`
--
ALTER TABLE `potongan`
  ADD PRIMARY KEY (`id_potongan`);

--
-- Indexes for table `tunjangan`
--
ALTER TABLE `tunjangan`
  ADD PRIMARY KEY (`id_tunjangan`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `absenpegawai`
--
ALTER TABLE `absenpegawai`
  MODIFY `id_absen` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT for table `admin`
--
ALTER TABLE `admin`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT for table `datagaji`
--
ALTER TABLE `datagaji`
  MODIFY `id_dataGaji` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT for table `gaji`
--
ALTER TABLE `gaji`
  MODIFY `id_gaji` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=22;

--
-- AUTO_INCREMENT for table `pegawai`
--
ALTER TABLE `pegawai`
  MODIFY `id_pegawai` int(3) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=15;

--
-- AUTO_INCREMENT for table `potongan`
--
ALTER TABLE `potongan`
  MODIFY `id_potongan` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- AUTO_INCREMENT for table `tunjangan`
--
ALTER TABLE `tunjangan`
  MODIFY `id_tunjangan` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- Constraints for dumped tables
--

--
-- Constraints for table `absenpegawai`
--
ALTER TABLE `absenpegawai`
  ADD CONSTRAINT `FK_pegawai_absen` FOREIGN KEY (`id_pegawai`) REFERENCES `pegawai` (`id_pegawai`);

--
-- Constraints for table `gaji`
--
ALTER TABLE `gaji`
  ADD CONSTRAINT `FK_datagaji` FOREIGN KEY (`id_datagaji`) REFERENCES `datagaji` (`id_dataGaji`),
  ADD CONSTRAINT `FK_pegawai` FOREIGN KEY (`id_pegawai`) REFERENCES `pegawai` (`id_pegawai`),
  ADD CONSTRAINT `FK_potongan` FOREIGN KEY (`id_potongan`) REFERENCES `potongan` (`id_potongan`),
  ADD CONSTRAINT `FK_tunjangan` FOREIGN KEY (`id_tunjangan`) REFERENCES `tunjangan` (`id_tunjangan`);
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
