-- phpMyAdmin SQL Dump
-- version 5.0.2
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Nov 23, 2020 at 05:52 AM
-- Server version: 10.4.13-MariaDB
-- PHP Version: 7.4.7

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `etamu`
--

-- --------------------------------------------------------

--
-- Table structure for table `tbl_bukutamu`
--

CREATE TABLE `tbl_bukutamu` (
  `id_tamu` int(11) NOT NULL,
  `identitas` varchar(255) NOT NULL,
  `tgl` datetime NOT NULL,
  `nama` varchar(255) NOT NULL,
  `tlp` varchar(255) NOT NULL,
  `alamat` varchar(255) NOT NULL,
  `tindakLanjut` varchar(255) NOT NULL,
  `keperluan` varchar(255) NOT NULL,
  `menemui` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `tbl_bukutamu`
--

INSERT INTO `tbl_bukutamu` (`id_tamu`, `identitas`, `tgl`, `nama`, `tlp`, `alamat`, `tindakLanjut`, `keperluan`, `menemui`) VALUES
(20, 'w3435345', '2020-11-03 19:50:26', 'arya', '0258963147', 'jalan kemuning', 'diizinkan', 'mengantar berkas', 'aldiyat'),
(23, '455345345', '2020-11-22 15:21:08', 'sdfsdfs', '435345345', 'sdfsdfsd', 'tidak diizinkan', 'dgdgd', 'dgfdfg');

-- --------------------------------------------------------

--
-- Table structure for table `tbl_user`
--

CREATE TABLE `tbl_user` (
  `id_pengguna` int(11) NOT NULL,
  `username` varchar(255) NOT NULL,
  `password` varchar(255) NOT NULL,
  `nama` varchar(255) NOT NULL,
  `tlp` varchar(255) NOT NULL,
  `alamat` varchar(255) NOT NULL,
  `level` varchar(255) NOT NULL,
  `foto` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `tbl_user`
--

INSERT INTO `tbl_user` (`id_pengguna`, `username`, `password`, `nama`, `tlp`, `alamat`, `level`, `foto`) VALUES
(12, 'arif', 'e10adc3949ba59abbe56e057f20f883e', 'Muhammad Deka wan', '082379049190', 'Jalan Kemuning Lorong Sungai Rotan RT 01 RW 04 Cambai', 'operator', '1586310514_b4d60a37dae8f97371e75e6e0506b960.jpg'),
(13, 'arya', 'e10adc3949ba59abbe56e057f20f883e', 'arya', '082379049190', 'Jalan Kemuning Lorong Sungai Rotan RT 01 RW 04 Cambai', 'admin', '');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `tbl_bukutamu`
--
ALTER TABLE `tbl_bukutamu`
  ADD PRIMARY KEY (`id_tamu`);

--
-- Indexes for table `tbl_user`
--
ALTER TABLE `tbl_user`
  ADD PRIMARY KEY (`id_pengguna`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `tbl_bukutamu`
--
ALTER TABLE `tbl_bukutamu`
  MODIFY `id_tamu` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=25;

--
-- AUTO_INCREMENT for table `tbl_user`
--
ALTER TABLE `tbl_user`
  MODIFY `id_pengguna` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=14;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
