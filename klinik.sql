-- phpMyAdmin SQL Dump
-- version 4.5.2
-- http://www.phpmyadmin.net
--
-- Host: localhost
-- Generation Time: Aug 17, 2017 at 04:44 
-- Server version: 10.1.13-MariaDB
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
-- Table structure for table `config`
--

CREATE TABLE `config` (
  `id` int(3) NOT NULL,
  `system` varchar(50) NOT NULL,
  `deskripsi` longtext NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Table structure for table `groups`
--

CREATE TABLE `groups` (
  `id` mediumint(8) UNSIGNED NOT NULL,
  `name` varchar(20) NOT NULL,
  `description` varchar(100) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `groups`
--

INSERT INTO `groups` (`id`, `name`, `description`) VALUES
(1, 'admin', 'Administrator'),
(2, 'members', 'General User'),
(3, 'Owner', ''),
(4, 'Dokter', ''),
(5, 'Pasien', '');

-- --------------------------------------------------------

--
-- Table structure for table `informasi`
--

CREATE TABLE `informasi` (
  `id` int(1) NOT NULL,
  `nama_klinik` varchar(100) NOT NULL,
  `favicon` text NOT NULL,
  `logo` text NOT NULL,
  `ijin_klinik` text NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `informasi`
--

INSERT INTO `informasi` (`id`, `nama_klinik`, `favicon`, `logo`, `ijin_klinik`) VALUES
(1, 'Klinik La Derma Semarang', '', '', 'No. 333747.50256/DU.1596/449.1/222/VIII/2013');

-- --------------------------------------------------------

--
-- Table structure for table `kategori`
--

CREATE TABLE `kategori` (
  `kategori_obat` int(3) NOT NULL,
  `kategori` varchar(50) NOT NULL,
  `deskripsi` varchar(50) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `kategori`
--

INSERT INTO `kategori` (`kategori_obat`, `kategori`, `deskripsi`) VALUES
(1, 'Obat Sedang', ''),
(2, 'Obat Bahaya', '');

-- --------------------------------------------------------

--
-- Table structure for table `k_catatan`
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
-- Table structure for table `k_janji`
--

CREATE TABLE `k_janji` (
  `id_kj` int(3) NOT NULL,
  `waktu_janji` int(11) NOT NULL,
  `id_pengguna` int(3) NOT NULL,
  `id_pasien` varchar(20) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Table structure for table `k_obat`
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
-- Dumping data for table `k_obat`
--

INSERT INTO `k_obat` (`id_obat`, `nama`, `kategori_obat`, `deskripsi`, `stock`, `manufaktur`, `harga`, `status`, `expired`) VALUES
(1, 'Naturgo skin clean', 1, '-membersihkan dan mencerahkan kulit terutama kulit wajah', 20, 'CV. Sun care', 450000, 'Baru', '2019-12-30'),
(2, 'test', 2, 'a', 100, 'PT. Denso', 2000, 'ADA', '2020-12-01');

-- --------------------------------------------------------

--
-- Table structure for table `k_paket`
--

CREATE TABLE `k_paket` (
  `id_paket` int(3) NOT NULL,
  `layanan` varchar(120) NOT NULL,
  `deskripsi` longtext NOT NULL,
  `harga` longtext NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `k_paket`
--

INSERT INTO `k_paket` (`id_paket`, `layanan`, `deskripsi`, `harga`) VALUES
(1, 'Konsultasi Umum', '-Konsultasi tentang hal umum kulit', '40000'),
(2, 'Konsultasi Kecantikan', '-Konsultasi tentang kecantikan', '60000');

-- --------------------------------------------------------

--
-- Table structure for table `k_r.medis`
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
-- Table structure for table `k_rmedis`
--

CREATE TABLE `k_rmedis` (
  `id_rmedis` int(3) NOT NULL,
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
-- Table structure for table `k_tindakan`
--

CREATE TABLE `k_tindakan` (
  `id_tindakan` int(3) NOT NULL,
  `tindakan` longtext NOT NULL,
  `keterangan` longtext NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Table structure for table `login_attempts`
--

CREATE TABLE `login_attempts` (
  `id` int(11) UNSIGNED NOT NULL,
  `ip_address` varchar(15) NOT NULL,
  `login` varchar(100) NOT NULL,
  `time` int(11) UNSIGNED DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

-- --------------------------------------------------------

--
-- Table structure for table `pasien`
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
-- Dumping data for table `pasien`
--

INSERT INTO `pasien` (`id_pasien`, `identitas`, `nama`, `alamat`, `user`, `pass`, `sex`, `birth_date`, `status`) VALUES
('LD-2017000102', '2147483647', 'Zein al Qurthubi', 'Jalan Simongan dalam gang 3 RT 06/01 Simongan Semarang barat, Kota Semarang', 'fafandha', 'fafarisi', 'Laki-laki', '10-11-1988', 'pasien lama'),
('LD-2017000207', '335000124500', 'Mason Najib', 'Perumahan Kompleks Tri Megah blok Anggrek-2 No. 13 Semarang', 'mason', 'mason', 'Laki-laki', '21-02-1976', 'Pasien Baru');

-- --------------------------------------------------------

--
-- Table structure for table `pengguna`
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
-- Dumping data for table `pengguna`
--

INSERT INTO `pengguna` (`id_user`, `nama`, `user`, `pass`, `alamat`, `phone`, `status`) VALUES
(1, 'Fadhila Natasha', 'administrator', 'admin', 'Jalan. Soetta Raya No. 213 Pedurungan Semarang', '+62853211000', 'admin');

-- --------------------------------------------------------

--
-- Table structure for table `percakapan`
--

CREATE TABLE `percakapan` (
  `id_percakapan` int(10) NOT NULL,
  `judul` varchar(50) NOT NULL,
  `dari` varchar(200) NOT NULL,
  `untuk` varchar(200) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `percakapan`
--

INSERT INTO `percakapan` (`id_percakapan`, `judul`, `dari`, `untuk`) VALUES
(1, 'test', 'pasien@la-derma.com', 'admin@admin.com'),
(2, 'Test 2', 'pasien@la-derma.com', 'admin@admin.com');

-- --------------------------------------------------------

--
-- Table structure for table `pesan`
--

CREATE TABLE `pesan` (
  `id_pesan` int(11) NOT NULL,
  `id_percakapan` int(10) NOT NULL,
  `jam` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP,
  `dari` varchar(100) NOT NULL,
  `pesan` text NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `pesan`
--

INSERT INTO `pesan` (`id_pesan`, `id_percakapan`, `jam`, `dari`, `pesan`) VALUES
(1, 1, '2017-08-03 03:01:53', 'admin@admin.com', 'test'),
(2, 1, '2017-08-10 16:15:15', 'pasien@la-derma.com', 'test jg'),
(4, 1, '2017-08-10 17:00:48', 'pasien@la-derma.com', 'test again'),
(5, 1, '2017-08-13 01:57:38', 'admin@admin.com', 'lol'),
(6, 1, '2017-08-13 01:57:46', 'admin@admin.com', 'July4');

-- --------------------------------------------------------

--
-- Table structure for table `rincian`
--

CREATE TABLE `rincian` (
  `id` int(4) NOT NULL,
  `idTransaksi` varchar(20) NOT NULL,
  `KodeBarang` varchar(10) NOT NULL,
  `qty` int(10) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `rincian`
--

INSERT INTO `rincian` (`id`, `idTransaksi`, `KodeBarang`, `qty`) VALUES
(0, '14.002.082017.LD', '1', 9),
(15, '14.001.082017.LD', '1', 4);

-- --------------------------------------------------------

--
-- Table structure for table `transaksi`
--

CREATE TABLE `transaksi` (
  `idTransaksi` varchar(20) NOT NULL,
  `idPasien` varchar(100) NOT NULL,
  `idDokter` varchar(100) NOT NULL,
  `total_bayar` bigint(10) NOT NULL,
  `status` enum('Pending','Terjual','Lunas') NOT NULL,
  `idCreate` varchar(100) NOT NULL,
  `date` date NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `transaksi`
--

INSERT INTO `transaksi` (`idTransaksi`, `idPasien`, `idDokter`, `total_bayar`, `status`, `idCreate`, `date`) VALUES
('14.001.082017.LD', 'pasien@la-derma.com', 'doketer@la-derma.com', 2000000, 'Lunas', 'admin@admin.com', '2017-08-14'),
('14.002.082017.LD', 'pasien@la-derma.com', 'doketer@la-derma.com', 80000, 'Lunas', 'admin@admin.com', '2017-08-14'),
('16.003.082017.LD', '', '', 0, 'Pending', 'admin@admin.com', '2017-08-16');

-- --------------------------------------------------------

--
-- Table structure for table `users`
--

CREATE TABLE `users` (
  `id` int(11) UNSIGNED NOT NULL,
  `ip_address` varchar(45) NOT NULL,
  `username` varchar(100) DEFAULT NULL,
  `password` varchar(255) NOT NULL,
  `salt` varchar(255) DEFAULT NULL,
  `email` varchar(100) NOT NULL,
  `activation_code` varchar(40) DEFAULT NULL,
  `forgotten_password_code` varchar(40) DEFAULT NULL,
  `forgotten_password_time` int(11) UNSIGNED DEFAULT NULL,
  `remember_code` varchar(40) DEFAULT NULL,
  `created_on` int(11) UNSIGNED NOT NULL,
  `last_login` int(11) UNSIGNED DEFAULT NULL,
  `active` tinyint(1) UNSIGNED DEFAULT NULL,
  `first_name` varchar(50) DEFAULT NULL,
  `last_name` varchar(50) DEFAULT NULL,
  `company` varchar(100) DEFAULT NULL,
  `phone` varchar(20) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `users`
--

INSERT INTO `users` (`id`, `ip_address`, `username`, `password`, `salt`, `email`, `activation_code`, `forgotten_password_code`, `forgotten_password_time`, `remember_code`, `created_on`, `last_login`, `active`, `first_name`, `last_name`, `company`, `phone`) VALUES
(1, '127.0.0.1', 'administrator', '$2a$07$SeBknntpZror9uyftVopmu61qg0ms8Qv1yV6FG.kQOSM.9QhmTo36', '', 'admin@admin.com', '', NULL, NULL, NULL, 1268889823, 1502871822, 1, 'Admin', 'istrator', 'ADMIN', '0'),
(2, '::1', 'pasien@la-derma.com', '$2y$08$cT0mQdyvgffjViAn.pCwFOP8TJKoAmP5/YWB4.xP1oCuH62LJNDdq', NULL, 'pasien@la-derma.com', NULL, NULL, NULL, NULL, 1501726388, 1502381484, 1, 'Pasien', 'Satu', 'Pasien', '08080808'),
(3, '::1', 'doketer@la-derma.com', '$2y$08$cT0mQdyvgffjViAn.pCwFOP8TJKoAmP5/YWB4.xP1oCuH62LJNDdq', NULL, 'doketer@la-derma.com', NULL, NULL, NULL, NULL, 1501726460, 1502854916, 1, 'Dokter', 'Satu', 'La-Derma', '0808081088');

-- --------------------------------------------------------

--
-- Table structure for table `users_groups`
--

CREATE TABLE `users_groups` (
  `id` int(11) UNSIGNED NOT NULL,
  `user_id` int(11) UNSIGNED NOT NULL,
  `group_id` mediumint(8) UNSIGNED NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `users_groups`
--

INSERT INTO `users_groups` (`id`, `user_id`, `group_id`) VALUES
(3, 1, 1),
(4, 1, 2),
(5, 1, 3),
(6, 1, 4),
(7, 1, 5),
(11, 3, 4),
(0, 2, 5);

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
-- Indexes for table `percakapan`
--
ALTER TABLE `percakapan`
  ADD PRIMARY KEY (`id_percakapan`);

--
-- Indexes for table `pesan`
--
ALTER TABLE `pesan`
  ADD PRIMARY KEY (`id_pesan`);

--
-- Indexes for table `rincian`
--
ALTER TABLE `rincian`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `transaksi`
--
ALTER TABLE `transaksi`
  ADD PRIMARY KEY (`idTransaksi`);

--
-- Indexes for table `users`
--
ALTER TABLE `users`
  ADD PRIMARY KEY (`id`);

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
  MODIFY `id_obat` int(3) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;
--
-- AUTO_INCREMENT for table `k_paket`
--
ALTER TABLE `k_paket`
  MODIFY `id_paket` int(3) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;
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
