-- phpMyAdmin SQL Dump
-- version 4.3.11
-- http://www.phpmyadmin.net
--
-- Host: 127.0.0.1
-- Generation Time: 16 Sep 2017 pada 02.08
-- Versi Server: 5.6.24
-- PHP Version: 5.6.8

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8 */;

--
-- Database: `klinik`
--

-- --------------------------------------------------------

--
-- Struktur dari tabel `config`
--

CREATE TABLE IF NOT EXISTS `config` (
  `id` int(3) NOT NULL,
  `system` varchar(50) NOT NULL,
  `deskripsi` longtext NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Struktur dari tabel `groups`
--

CREATE TABLE IF NOT EXISTS `groups` (
  `id` mediumint(8) unsigned NOT NULL,
  `name` varchar(20) NOT NULL,
  `description` varchar(100) NOT NULL
) ENGINE=InnoDB AUTO_INCREMENT=6 DEFAULT CHARSET=utf8;

--
-- Dumping data untuk tabel `groups`
--

INSERT INTO `groups` (`id`, `name`, `description`) VALUES
(1, 'admin', 'Administrator'),
(2, 'members', 'General User'),
(3, 'Owner', ''),
(4, 'Dokter', ''),
(5, 'Pasien', '');

-- --------------------------------------------------------

--
-- Struktur dari tabel `informasi`
--

CREATE TABLE IF NOT EXISTS `informasi` (
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
-- Struktur dari tabel `jadwal`
--

CREATE TABLE IF NOT EXISTS `jadwal` (
  `idJadwal` int(10) NOT NULL,
  `idDokter` varchar(50) NOT NULL,
  `Hari` varchar(7) NOT NULL,
  `DariJam` time NOT NULL,
  `SampaiJam` time NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Struktur dari tabel `kategori`
--

CREATE TABLE IF NOT EXISTS `kategori` (
  `kategori_obat` int(3) NOT NULL,
  `kategori` varchar(50) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data untuk tabel `kategori`
--

INSERT INTO `kategori` (`kategori_obat`, `kategori`) VALUES
(1, 'Obat Sedang'),
(2, 'Obat Bahaya');

-- --------------------------------------------------------

--
-- Struktur dari tabel `k_catatan`
--

CREATE TABLE IF NOT EXISTS `k_catatan` (
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

CREATE TABLE IF NOT EXISTS `k_janji` (
  `id_kj` int(3) NOT NULL,
  `id_pasien` varchar(20) NOT NULL,
  `idDokter` varchar(50) NOT NULL,
  `Tanggal` date NOT NULL,
  `Jam` time NOT NULL,
  `IdPengguna` varchar(50) NOT NULL
) ENGINE=InnoDB AUTO_INCREMENT=2 DEFAULT CHARSET=latin1;

--
-- Dumping data untuk tabel `k_janji`
--

INSERT INTO `k_janji` (`id_kj`, `id_pasien`, `idDokter`, `Tanggal`, `Jam`, `IdPengguna`) VALUES
(1, '123455678888', 'doketer@la-derma.com', '2017-09-17', '09:00:00', 'admin@admin.com');

-- --------------------------------------------------------

--
-- Struktur dari tabel `k_obat`
--

CREATE TABLE IF NOT EXISTS `k_obat` (
  `id_obat` int(3) NOT NULL,
  `nama` varchar(50) NOT NULL,
  `kategori_obat` int(2) NOT NULL,
  `deskripsi` longtext NOT NULL,
  `stock` int(3) NOT NULL,
  `manufaktur` varchar(100) NOT NULL,
  `harga` int(11) NOT NULL,
  `status` varchar(50) NOT NULL,
  `expired` varchar(50) NOT NULL
) ENGINE=InnoDB AUTO_INCREMENT=3 DEFAULT CHARSET=latin1;

--
-- Dumping data untuk tabel `k_obat`
--

INSERT INTO `k_obat` (`id_obat`, `nama`, `kategori_obat`, `deskripsi`, `stock`, `manufaktur`, `harga`, `status`, `expired`) VALUES
(1, 'Naturgo skin clean', 1, '-membersihkan dan mencerahkan kulit terutama kulit wajah', 20, 'CV. Sun care', 450000, 'Baru', '23-12-2019'),
(2, 'test', 2, 'a', 100, 'PT. Denso', 2000, 'ADA', '20-11-2020');

-- --------------------------------------------------------

--
-- Struktur dari tabel `k_paket`
--

CREATE TABLE IF NOT EXISTS `k_paket` (
  `id_paket` int(3) NOT NULL,
  `layanan` varchar(120) NOT NULL,
  `deskripsi` longtext NOT NULL,
  `harga` longtext NOT NULL
) ENGINE=InnoDB AUTO_INCREMENT=2 DEFAULT CHARSET=latin1;

--
-- Dumping data untuk tabel `k_paket`
--

INSERT INTO `k_paket` (`id_paket`, `layanan`, `deskripsi`, `harga`) VALUES
(1, 'Check Up', 'Cek Kesehatan', '50000');

-- --------------------------------------------------------

--
-- Struktur dari tabel `k_rmedis`
--

CREATE TABLE IF NOT EXISTS `k_rmedis` (
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
-- Struktur dari tabel `k_tindakan`
--

CREATE TABLE IF NOT EXISTS `k_tindakan` (
  `id_tindakan` int(3) NOT NULL,
  `tindakan` longtext NOT NULL,
  `keterangan` longtext NOT NULL
) ENGINE=InnoDB AUTO_INCREMENT=2 DEFAULT CHARSET=latin1;

--
-- Dumping data untuk tabel `k_tindakan`
--

INSERT INTO `k_tindakan` (`id_tindakan`, `tindakan`, `keterangan`) VALUES
(1, 'Operasi Kecil', 'Operasi kecil');

-- --------------------------------------------------------

--
-- Struktur dari tabel `login_attempts`
--

CREATE TABLE IF NOT EXISTS `login_attempts` (
  `id` int(11) unsigned NOT NULL,
  `ip_address` varchar(15) NOT NULL,
  `login` varchar(100) NOT NULL,
  `time` int(11) unsigned DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

-- --------------------------------------------------------

--
-- Struktur dari tabel `pasien`
--

CREATE TABLE IF NOT EXISTS `pasien` (
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
('', '123455678888', 'Rismawan Junandia', 'JL. KARAMAT', 'junandia08@gmail.com', 'junandia101', 'Laki-laki', '1998-10-18', 'Pasien Baru'),
('LD-2017000102', '2147483647', 'Zein al Qurthubi', 'Jalan Simongan dalam gang 3 RT 06/01 Simongan Semarang barat, Kota Semarang', 'fafandha', 'fafarisi', 'Laki-laki', '10-11-1988', 'pasien lama'),
('LD-2017000207', '335000124500', 'Mason Najib', 'Perumahan Kompleks Tri Megah blok Anggrek-2 No. 13 Semarang', 'mason', 'mason', 'Laki-laki', '21-02-1976', 'Pasien Baru');

-- --------------------------------------------------------

--
-- Struktur dari tabel `pengguna`
--

CREATE TABLE IF NOT EXISTS `pengguna` (
  `id_user` int(3) NOT NULL,
  `nama` varchar(50) NOT NULL,
  `user` varchar(50) NOT NULL,
  `pass` varchar(50) NOT NULL,
  `alamat` varchar(100) NOT NULL,
  `phone` varchar(15) NOT NULL,
  `status` varchar(20) NOT NULL
) ENGINE=InnoDB AUTO_INCREMENT=2 DEFAULT CHARSET=latin1;

--
-- Dumping data untuk tabel `pengguna`
--

INSERT INTO `pengguna` (`id_user`, `nama`, `user`, `pass`, `alamat`, `phone`, `status`) VALUES
(1, 'Fadhila Natasha', 'administrator', 'admin', 'Jalan. Soetta Raya No. 213 Pedurungan Semarang', '+62853211000', 'admin');

-- --------------------------------------------------------

--
-- Struktur dari tabel `percakapan`
--

CREATE TABLE IF NOT EXISTS `percakapan` (
  `id_percakapan` int(10) NOT NULL,
  `judul` varchar(50) NOT NULL,
  `dari` varchar(200) NOT NULL,
  `untuk` varchar(200) NOT NULL
) ENGINE=InnoDB AUTO_INCREMENT=3 DEFAULT CHARSET=latin1;

--
-- Dumping data untuk tabel `percakapan`
--

INSERT INTO `percakapan` (`id_percakapan`, `judul`, `dari`, `untuk`) VALUES
(1, 'test', 'pasien@la-derma.com', 'admin@admin.com'),
(2, 'Test 2', 'pasien@la-derma.com', 'admin@admin.com');

-- --------------------------------------------------------

--
-- Struktur dari tabel `pesan`
--

CREATE TABLE IF NOT EXISTS `pesan` (
  `id_pesan` int(11) NOT NULL,
  `id_percakapan` int(10) NOT NULL,
  `jam` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP,
  `dari` varchar(100) NOT NULL,
  `pesan` text NOT NULL
) ENGINE=InnoDB AUTO_INCREMENT=7 DEFAULT CHARSET=latin1;

--
-- Dumping data untuk tabel `pesan`
--

INSERT INTO `pesan` (`id_pesan`, `id_percakapan`, `jam`, `dari`, `pesan`) VALUES
(1, 1, '2017-08-03 03:01:53', 'admin@admin.com', 'test'),
(2, 1, '2017-08-10 16:15:15', 'pasien@la-derma.com', 'test jg'),
(4, 1, '2017-08-10 17:00:48', 'pasien@la-derma.com', 'test again'),
(5, 1, '2017-08-13 01:57:38', 'admin@admin.com', 'lol'),
(6, 1, '2017-08-13 01:57:46', 'admin@admin.com', 'July4');

-- --------------------------------------------------------

--
-- Struktur dari tabel `rincian`
--

CREATE TABLE IF NOT EXISTS `rincian` (
  `id` int(4) NOT NULL,
  `idTransaksi` varchar(20) NOT NULL,
  `KodeBarang` varchar(10) NOT NULL,
  `qty` int(10) NOT NULL,
  `subtotal` bigint(12) NOT NULL
) ENGINE=InnoDB AUTO_INCREMENT=20 DEFAULT CHARSET=latin1;

--
-- Dumping data untuk tabel `rincian`
--

INSERT INTO `rincian` (`id`, `idTransaksi`, `KodeBarang`, `qty`, `subtotal`) VALUES
(15, '14.001.082017.LD', '1', 1, 45000),
(16, '21.001.082017.LD', '1', 1, 450000),
(18, '21.001.082017.LD', '2', 2, 4000),
(19, '10.001.092017.LD', '1', 3, 1350000);

-- --------------------------------------------------------

--
-- Struktur dari tabel `transaksi`
--

CREATE TABLE IF NOT EXISTS `transaksi` (
  `idTransaksi` varchar(20) NOT NULL,
  `idPasien` varchar(100) NOT NULL,
  `idDokter` varchar(100) NOT NULL,
  `total_bayar` bigint(10) NOT NULL,
  `metode` enum('Transfer','Tunai','Kartu Kredit') NOT NULL,
  `status` enum('Pending','Terjual','Lunas') NOT NULL,
  `idCreate` varchar(100) NOT NULL,
  `date` date NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data untuk tabel `transaksi`
--

INSERT INTO `transaksi` (`idTransaksi`, `idPasien`, `idDokter`, `total_bayar`, `metode`, `status`, `idCreate`, `date`) VALUES
('10.001.092017.LD', 'LD-2017000102', 'admin@admin.com', 0, 'Transfer', 'Pending', 'admin@admin.com', '2017-09-10'),
('14.001.082017.LD', 'pasien@la-derma.com', 'doketer@la-derma.com', 2000000, 'Transfer', 'Lunas', 'admin@admin.com', '2017-08-14'),
('14.002.082017.LD', 'pasien@la-derma.com', 'doketer@la-derma.com', 0, 'Transfer', 'Pending', 'admin@admin.com', '2017-08-14'),
('21.001.082017.LD', 'LD-2017000102', 'doketer@la-derma.com', 500000, 'Tunai', 'Lunas', 'admin@admin.com', '2017-08-21');

-- --------------------------------------------------------

--
-- Struktur dari tabel `users`
--

CREATE TABLE IF NOT EXISTS `users` (
  `id` int(11) unsigned NOT NULL,
  `ip_address` varchar(45) NOT NULL,
  `username` varchar(100) DEFAULT NULL,
  `password` varchar(255) NOT NULL,
  `salt` varchar(255) DEFAULT NULL,
  `email` varchar(100) NOT NULL,
  `activation_code` varchar(40) DEFAULT NULL,
  `forgotten_password_code` varchar(40) DEFAULT NULL,
  `forgotten_password_time` int(11) unsigned DEFAULT NULL,
  `remember_code` varchar(40) DEFAULT NULL,
  `created_on` int(11) unsigned NOT NULL,
  `last_login` int(11) unsigned DEFAULT NULL,
  `active` tinyint(1) unsigned DEFAULT NULL,
  `first_name` varchar(50) DEFAULT NULL,
  `last_name` varchar(50) DEFAULT NULL,
  `company` varchar(100) DEFAULT NULL,
  `phone` varchar(20) DEFAULT NULL
) ENGINE=InnoDB AUTO_INCREMENT=5 DEFAULT CHARSET=utf8;

--
-- Dumping data untuk tabel `users`
--

INSERT INTO `users` (`id`, `ip_address`, `username`, `password`, `salt`, `email`, `activation_code`, `forgotten_password_code`, `forgotten_password_time`, `remember_code`, `created_on`, `last_login`, `active`, `first_name`, `last_name`, `company`, `phone`) VALUES
(1, '127.0.0.1', 'administrator', '$2a$07$SeBknntpZror9uyftVopmu61qg0ms8Qv1yV6FG.kQOSM.9QhmTo36', '', 'admin@admin.com', '', NULL, NULL, NULL, 1268889823, 1505515320, 1, 'Admin', 'istrator', 'ADMIN', '0'),
(2, '::1', 'pasien@la-derma.com', '$2y$08$Pn8porgrcHoRWuVJ5gW47.LpR9euGlwKZzfwatvsKFYsxTdT64him', NULL, 'pasien@la-derma.com', NULL, NULL, NULL, NULL, 1501726388, 1502800334, 1, 'Pasien', 'Satu', 'Pasien', '08080808'),
(3, '::1', 'doketer@la-derma.com', '$2y$08$cT0mQdyvgffjViAn.pCwFOP8TJKoAmP5/YWB4.xP1oCuH62LJNDdq', NULL, 'doketer@la-derma.com', NULL, NULL, NULL, NULL, 1501726460, 1502800241, 1, 'Dokter', 'Satu', 'La-Derma', '0808081088'),
(4, '::1', 'junandia08@gmail.com', '$2y$08$9LnF5z3fxZpqyKrjTizjAeMz7.E5Yt2ze8F2W4qngRZCd5ZPhQWMi', NULL, 'junandia08@gmail.com', NULL, NULL, NULL, NULL, 1505478507, NULL, 1, '123455678888', 'Rismawan Junandia', NULL, NULL);

-- --------------------------------------------------------

--
-- Struktur dari tabel `users_groups`
--

CREATE TABLE IF NOT EXISTS `users_groups` (
  `id` int(11) unsigned NOT NULL,
  `user_id` int(11) unsigned NOT NULL,
  `group_id` mediumint(8) unsigned NOT NULL
) ENGINE=InnoDB AUTO_INCREMENT=13 DEFAULT CHARSET=utf8;

--
-- Dumping data untuk tabel `users_groups`
--

INSERT INTO `users_groups` (`id`, `user_id`, `group_id`) VALUES
(3, 1, 1),
(4, 1, 2),
(5, 1, 3),
(6, 1, 4),
(7, 1, 5),
(9, 2, 5),
(11, 3, 4),
(12, 4, 5);

--
-- Indexes for dumped tables
--

--
-- Indexes for table `config`
--
ALTER TABLE `config`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `groups`
--
ALTER TABLE `groups`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `informasi`
--
ALTER TABLE `informasi`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `jadwal`
--
ALTER TABLE `jadwal`
  ADD PRIMARY KEY (`idJadwal`);

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
-- Indexes for table `k_rmedis`
--
ALTER TABLE `k_rmedis`
  ADD PRIMARY KEY (`id_rmedis`);

--
-- Indexes for table `k_tindakan`
--
ALTER TABLE `k_tindakan`
  ADD PRIMARY KEY (`id_tindakan`);

--
-- Indexes for table `login_attempts`
--
ALTER TABLE `login_attempts`
  ADD PRIMARY KEY (`id`);

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
-- Indexes for table `users_groups`
--
ALTER TABLE `users_groups`
  ADD PRIMARY KEY (`id`), ADD UNIQUE KEY `uc_users_groups` (`user_id`,`group_id`), ADD KEY `fk_users_groups_users1_idx` (`user_id`), ADD KEY `fk_users_groups_groups1_idx` (`group_id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `config`
--
ALTER TABLE `config`
  MODIFY `id` int(3) NOT NULL AUTO_INCREMENT;
--
-- AUTO_INCREMENT for table `groups`
--
ALTER TABLE `groups`
  MODIFY `id` mediumint(8) unsigned NOT NULL AUTO_INCREMENT,AUTO_INCREMENT=6;
--
-- AUTO_INCREMENT for table `jadwal`
--
ALTER TABLE `jadwal`
  MODIFY `idJadwal` int(10) NOT NULL AUTO_INCREMENT;
--
-- AUTO_INCREMENT for table `k_catatan`
--
ALTER TABLE `k_catatan`
  MODIFY `id_catatan` int(3) NOT NULL AUTO_INCREMENT;
--
-- AUTO_INCREMENT for table `k_janji`
--
ALTER TABLE `k_janji`
  MODIFY `id_kj` int(3) NOT NULL AUTO_INCREMENT,AUTO_INCREMENT=2;
--
-- AUTO_INCREMENT for table `k_obat`
--
ALTER TABLE `k_obat`
  MODIFY `id_obat` int(3) NOT NULL AUTO_INCREMENT,AUTO_INCREMENT=3;
--
-- AUTO_INCREMENT for table `k_paket`
--
ALTER TABLE `k_paket`
  MODIFY `id_paket` int(3) NOT NULL AUTO_INCREMENT,AUTO_INCREMENT=2;
--
-- AUTO_INCREMENT for table `k_rmedis`
--
ALTER TABLE `k_rmedis`
  MODIFY `id_rmedis` int(3) NOT NULL AUTO_INCREMENT;
--
-- AUTO_INCREMENT for table `k_tindakan`
--
ALTER TABLE `k_tindakan`
  MODIFY `id_tindakan` int(3) NOT NULL AUTO_INCREMENT,AUTO_INCREMENT=2;
--
-- AUTO_INCREMENT for table `login_attempts`
--
ALTER TABLE `login_attempts`
  MODIFY `id` int(11) unsigned NOT NULL AUTO_INCREMENT;
--
-- AUTO_INCREMENT for table `pengguna`
--
ALTER TABLE `pengguna`
  MODIFY `id_user` int(3) NOT NULL AUTO_INCREMENT,AUTO_INCREMENT=2;
--
-- AUTO_INCREMENT for table `percakapan`
--
ALTER TABLE `percakapan`
  MODIFY `id_percakapan` int(10) NOT NULL AUTO_INCREMENT,AUTO_INCREMENT=3;
--
-- AUTO_INCREMENT for table `pesan`
--
ALTER TABLE `pesan`
  MODIFY `id_pesan` int(11) NOT NULL AUTO_INCREMENT,AUTO_INCREMENT=7;
--
-- AUTO_INCREMENT for table `rincian`
--
ALTER TABLE `rincian`
  MODIFY `id` int(4) NOT NULL AUTO_INCREMENT,AUTO_INCREMENT=20;
--
-- AUTO_INCREMENT for table `users`
--
ALTER TABLE `users`
  MODIFY `id` int(11) unsigned NOT NULL AUTO_INCREMENT,AUTO_INCREMENT=5;
--
-- AUTO_INCREMENT for table `users_groups`
--
ALTER TABLE `users_groups`
  MODIFY `id` int(11) unsigned NOT NULL AUTO_INCREMENT,AUTO_INCREMENT=13;
--
-- Ketidakleluasaan untuk tabel pelimpahan (Dumped Tables)
--

--
-- Ketidakleluasaan untuk tabel `users_groups`
--
ALTER TABLE `users_groups`
ADD CONSTRAINT `fk_users_groups_groups1` FOREIGN KEY (`group_id`) REFERENCES `groups` (`id`) ON DELETE CASCADE ON UPDATE NO ACTION,
ADD CONSTRAINT `fk_users_groups_users1` FOREIGN KEY (`user_id`) REFERENCES `users` (`id`) ON DELETE CASCADE ON UPDATE NO ACTION;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
