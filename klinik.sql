-- phpMyAdmin SQL Dump
-- version 4.5.2
-- http://www.phpmyadmin.net
--
-- Host: localhost
-- Generation Time: 21 Jul 2017 pada 12.42
-- Versi Server: 10.1.13-MariaDB
-- PHP Version: 5.6.23

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `klinik`
--

-- --------------------------------------------------------

--
-- Struktur dari tabel `config`
--

CREATE TABLE `config` (
  `id` int(3) NOT NULL,
  `system` varchar(50) NOT NULL,
  `deskripsi` longtext NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Struktur dari tabel `informasi`
--

CREATE TABLE `informasi` (
  `id` int(1) NOT NULL,
  `nama_klinik` varchar(100) NOT NULL,
  `favicon` text NOT NULL,
  `logo` text NOT NULL,
  `ijin_klinik` text NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data untuk tabel `informasi`
--

INSERT INTO `informasi` (`id`, `nama_klinik`, `favicon`, `logo`, `ijin_klinik`) VALUES
(1, 'Klinik La Derma Semarang', '', '', 'No. 333747.50256/DU.1596/449.1/222/VIII/2013');

-- --------------------------------------------------------

--
-- Struktur dari tabel `kategori`
--

CREATE TABLE `kategori` (
  `kategori_obat` int(3) NOT NULL,
  `kategori` varchar(50) NOT NULL,
  `deskripsi` varchar(50) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Struktur dari tabel `k_catatan`
--

CREATE TABLE `k_catatan` (
  `id_catatan` int(3) NOT NULL,
  `catatan` longtext NOT NULL,
  `id_pengguna` int(3) NOT NULL,
  `id_pasien` varchar(20) NOT NULL,
  `status_catatan` varchar(50) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Struktur dari tabel `k_janji`
--

CREATE TABLE `k_janji` (
  `id_kj` int(3) NOT NULL,
  `waktu_janji` int(11) NOT NULL,
  `id_pengguna` int(3) NOT NULL,
  `id_pasien` varchar(20) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Struktur dari tabel `k_obat`
--

CREATE TABLE `k_obat` (
  `id_obat` int(3) NOT NULL,
  `nama` varchar(50) NOT NULL,
  `kategori_obat` int(2) NOT NULL,
  `deskripsi` longtext NOT NULL,
  `stock` int(3) NOT NULL,
  `manufaktur` varchar(100) NOT NULL,
  `harga` int(11) NOT NULL,
  `status` varchar(50) NOT NULL,
  `expired` varchar(50) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data untuk tabel `k_obat`
--

INSERT INTO `k_obat` (`id_obat`, `nama`, `kategori_obat`, `deskripsi`, `stock`, `manufaktur`, `harga`, `status`, `expired`) VALUES
(1, 'Naturgo skin clean', 0, '-membersihkan dan mencerahkan kulit terutama kulit wajah', 20, 'CV. Sun care', 450000, 'Baru', '23-12-2019');

-- --------------------------------------------------------

--
-- Struktur dari tabel `k_paket`
--

CREATE TABLE `k_paket` (
  `id_paket` int(3) NOT NULL,
  `layanan` varchar(120) NOT NULL,
  `deskripsi` longtext NOT NULL,
  `harga` longtext NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Struktur dari tabel `k_r.medis`
--

CREATE TABLE `k_r.medis` (
  `id_r.medis` int(3) NOT NULL,
  `id_tindakan` int(3) NOT NULL,
  `id_pasien` int(3) NOT NULL,
  `diagnosa` longtext NOT NULL,
  `keluhan` longtext NOT NULL,
  `resep` longtext NOT NULL,
  `waktu` varchar(10) NOT NULL,
  `keterangan` longtext NOT NULL,
  `id_pengguna` int(3) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Struktur dari tabel `k_tindakan`
--

CREATE TABLE `k_tindakan` (
  `id_tindakan` int(3) NOT NULL,
  `tindakan` longtext NOT NULL,
  `keterangan` longtext NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Struktur dari tabel `pasien`
--

CREATE TABLE `pasien` (
  `id_pasien` varchar(14) NOT NULL,
  `identitas` varchar(50) NOT NULL,
  `nama` varchar(120) NOT NULL,
  `alamat` text NOT NULL,
  `user` varchar(50) NOT NULL,
  `pass` varchar(50) NOT NULL,
  `sex` varchar(10) NOT NULL,
  `birth_date` varchar(20) NOT NULL,
  `status` varchar(20) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data untuk tabel `pasien`
--

INSERT INTO `pasien` (`id_pasien`, `identitas`, `nama`, `alamat`, `user`, `pass`, `sex`, `birth_date`, `status`) VALUES
('LD-2017000102', '2147483647', 'Zein al Qurthubi', 'Jalan Simongan dalam gang 3 RT 06/01 Simongan Semarang barat, Kota Semarang', 'fafandha', 'fafarisi', 'Laki-laki', '10-11-1988', 'pasien lama'),
('LD-2017000207', '335000124500', 'Mason Najib', 'Perumahan Kompleks Tri Megah blok Anggrek-2 No. 13 Semarang', 'mason', 'mason', 'Laki-laki', '21-02-1976', 'Pasien Baru');

-- --------------------------------------------------------

--
-- Struktur dari tabel `pengguna`
--

CREATE TABLE `pengguna` (
  `id_user` int(3) NOT NULL,
  `nama` varchar(50) NOT NULL,
  `user` varchar(50) NOT NULL,
  `pass` varchar(50) NOT NULL,
  `alamat` varchar(100) NOT NULL,
  `phone` varchar(15) NOT NULL,
  `status` varchar(20) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data untuk tabel `pengguna`
--

INSERT INTO `pengguna` (`id_user`, `nama`, `user`, `pass`, `alamat`, `phone`, `status`) VALUES
(1, 'Fadhila Natasha', 'administrator', 'admin', 'Jalan. Soetta Raya No. 213 Pedurungan Semarang', '+62853211000', 'admin');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `config`
--
ALTER TABLE `config`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `informasi`
--
ALTER TABLE `informasi`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `k_catatan`
--
ALTER TABLE `k_catatan`
  ADD PRIMARY KEY (`id_catatan`);

--
-- Indexes for table `k_janji`
--
ALTER TABLE `k_janji`
  ADD PRIMARY KEY (`id_kj`);

--
-- Indexes for table `k_obat`
--
ALTER TABLE `k_obat`
  ADD PRIMARY KEY (`id_obat`);

--
-- Indexes for table `k_paket`
--
ALTER TABLE `k_paket`
  ADD PRIMARY KEY (`id_paket`);

--
-- Indexes for table `k_r.medis`
--
ALTER TABLE `k_r.medis`
  ADD PRIMARY KEY (`id_r.medis`);

--
-- Indexes for table `k_tindakan`
--
ALTER TABLE `k_tindakan`
  ADD PRIMARY KEY (`id_tindakan`);

--
-- Indexes for table `pasien`
--
ALTER TABLE `pasien`
  ADD PRIMARY KEY (`id_pasien`);

--
-- Indexes for table `pengguna`
--
ALTER TABLE `pengguna`
  ADD PRIMARY KEY (`id_user`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `config`
--
ALTER TABLE `config`
  MODIFY `id` int(3) NOT NULL AUTO_INCREMENT;
--
-- AUTO_INCREMENT for table `k_catatan`
--
ALTER TABLE `k_catatan`
  MODIFY `id_catatan` int(3) NOT NULL AUTO_INCREMENT;
--
-- AUTO_INCREMENT for table `k_janji`
--
ALTER TABLE `k_janji`
  MODIFY `id_kj` int(3) NOT NULL AUTO_INCREMENT;
--
-- AUTO_INCREMENT for table `k_obat`
--
ALTER TABLE `k_obat`
  MODIFY `id_obat` int(3) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;
--
-- AUTO_INCREMENT for table `k_paket`
--
ALTER TABLE `k_paket`
  MODIFY `id_paket` int(3) NOT NULL AUTO_INCREMENT;
--
-- AUTO_INCREMENT for table `k_r.medis`
--
ALTER TABLE `k_r.medis`
  MODIFY `id_r.medis` int(3) NOT NULL AUTO_INCREMENT;
--
-- AUTO_INCREMENT for table `k_tindakan`
--
ALTER TABLE `k_tindakan`
  MODIFY `id_tindakan` int(3) NOT NULL AUTO_INCREMENT;
--
-- AUTO_INCREMENT for table `pengguna`
--
ALTER TABLE `pengguna`
  MODIFY `id_user` int(3) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;
/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
