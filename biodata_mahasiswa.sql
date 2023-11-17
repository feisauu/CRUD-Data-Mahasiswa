-- phpMyAdmin SQL Dump
-- version 5.2.0
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Waktu pembuatan: 17 Nov 2023 pada 08.55
-- Versi server: 10.4.27-MariaDB
-- Versi PHP: 8.1.12

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `biodata_mahasiswa`
--

-- --------------------------------------------------------

--
-- Struktur dari tabel `tbmahasiswa`
--

CREATE TABLE `tbmahasiswa` (
  `nim` varchar(13) NOT NULL,
  `foto` varchar(255) DEFAULT NULL,
  `nama` varchar(255) NOT NULL,
  `jenis_kelamin` varchar(10) NOT NULL,
  `fakultas` varchar(255) NOT NULL,
  `prodi` varchar(255) NOT NULL,
  `alamat` varchar(255) NOT NULL,
  `email` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1 COLLATE=latin1_swedish_ci;

--
-- Dumping data untuk tabel `tbmahasiswa`
--

INSERT INTO `tbmahasiswa` (`nim`, `foto`, `nama`, `jenis_kelamin`, `fakultas`, `prodi`, `alamat`, `email`) VALUES
('22091397001', '775-hecan.jpg', 'Haechan', 'Laki-laki', 'Kedokteran', 'S1 Farmasi', 'Jl. Bunga Mawar No. 150, Madiun', 'haeshan@gmail.com'),
('22091397002', '654-doyoung crud.jpg', 'Kim Doyoung', 'Laki-laki', 'Pascarjana', 'S2 PSikologi', 'Jl. Ketintang Madya No. 89, Surabaya', 'doyoungsyalala@gmail.com');

--
-- Indexes for dumped tables
--

--
-- Indeks untuk tabel `tbmahasiswa`
--
ALTER TABLE `tbmahasiswa`
  ADD PRIMARY KEY (`nim`);
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
