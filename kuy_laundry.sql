-- phpMyAdmin SQL Dump
-- version 5.0.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Waktu pembuatan: 20 Nov 2020 pada 09.16
-- Versi server: 10.4.11-MariaDB
-- Versi PHP: 7.3.15

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET AUTOCOMMIT = 0;
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `kuy_laundry`
--

-- --------------------------------------------------------

--
-- Struktur dari tabel `absensi_pegawai`
--

CREATE TABLE `absensi_pegawai` (
  `id_absen` int(11) NOT NULL,
  `nama_pegawai` varchar(128) NOT NULL,
  `tanggal_hadir` date NOT NULL,
  `tanggal_keluar` date NOT NULL,
  `presensi` int(1) NOT NULL,
  `jam_masuk` time NOT NULL,
  `jam_keluar` time NOT NULL,
  `status_aktif` int(1) NOT NULL,
  `active` int(1) NOT NULL,
  `id_user` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data untuk tabel `absensi_pegawai`
--

INSERT INTO `absensi_pegawai` (`id_absen`, `nama_pegawai`, `tanggal_hadir`, `tanggal_keluar`, `presensi`, `jam_masuk`, `jam_keluar`, `status_aktif`, `active`, `id_user`) VALUES
(15, 'Sunariyah Azahra', '2020-11-18', '0000-00-00', 1, '23:44:00', '23:44:00', 1, 1, 123456);

-- --------------------------------------------------------

--
-- Struktur dari tabel `bahan_cuci`
--

CREATE TABLE `bahan_cuci` (
  `id_bahan` int(11) NOT NULL,
  `nama_bahan` varchar(128) NOT NULL,
  `harga_bahan` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data untuk tabel `bahan_cuci`
--

INSERT INTO `bahan_cuci` (`id_bahan`, `nama_bahan`, `harga_bahan`) VALUES
(1, 'Parfum Sakura', 5000),
(2, 'Parfum Casablance', 7000);

-- --------------------------------------------------------

--
-- Struktur dari tabel `data_pemesanan`
--

CREATE TABLE `data_pemesanan` (
  `id_pemesanan` int(11) NOT NULL,
  `no_pemesanan` varchar(12) NOT NULL,
  `nama_customer` varchar(128) NOT NULL,
  `nama_kasir` varchar(128) NOT NULL,
  `jenis_cucian` int(11) NOT NULL,
  `paket_cucian` int(11) NOT NULL,
  `berat_cucian` int(11) NOT NULL,
  `parfum_cucian` int(11) NOT NULL,
  `waktu_pemesanan` time NOT NULL,
  `tanggal_pemesanan` date NOT NULL,
  `no_telp_customer` char(12) NOT NULL,
  `status` int(1) NOT NULL,
  `total_pemesanan` int(11) NOT NULL,
  `active` int(1) NOT NULL,
  `id_user` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data untuk tabel `data_pemesanan`
--

INSERT INTO `data_pemesanan` (`id_pemesanan`, `no_pemesanan`, `nama_customer`, `nama_kasir`, `jenis_cucian`, `paket_cucian`, `berat_cucian`, `parfum_cucian`, `waktu_pemesanan`, `tanggal_pemesanan`, `no_telp_customer`, `status`, `total_pemesanan`, `active`, `id_user`) VALUES
(41, 'EA42311', 'Fani Inayah', 'Yanti Nella', 3000, 20000, 5, 7000, '23:41:00', '2020-11-17', '089111222333', 1, 150000, 1, 123456),
(42, '-', '-', '-', 1000, 20000, 0, 5000, '13:44:00', '2020-11-18', '087555432118', 0, 0, 1, 123456);

-- --------------------------------------------------------

--
-- Struktur dari tabel `gaji_pegawai`
--

CREATE TABLE `gaji_pegawai` (
  `id_gaji` int(11) NOT NULL,
  `nama_pegawai` varchar(128) NOT NULL,
  `gaji_pokok` int(11) NOT NULL,
  `gaji_bonus` int(11) NOT NULL,
  `total_gaji_pegawai` int(11) NOT NULL,
  `tanggal_gaji` date NOT NULL,
  `active` int(1) NOT NULL,
  `id_user` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data untuk tabel `gaji_pegawai`
--

INSERT INTO `gaji_pegawai` (`id_gaji`, `nama_pegawai`, `gaji_pokok`, `gaji_bonus`, `total_gaji_pegawai`, `tanggal_gaji`, `active`, `id_user`) VALUES
(4, 'Sunariyah Azahra', 20000, 20000, 40000, '2020-11-19', 1, 123456);

-- --------------------------------------------------------

--
-- Struktur dari tabel `jenis_cuci`
--

CREATE TABLE `jenis_cuci` (
  `id_jenis` int(11) NOT NULL,
  `nama_jenis` varchar(128) NOT NULL,
  `harga_jenis` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data untuk tabel `jenis_cuci`
--

INSERT INTO `jenis_cuci` (`id_jenis`, `nama_jenis`, `harga_jenis`) VALUES
(1, 'Baju', 1000),
(2, 'Boneka', 3000);

-- --------------------------------------------------------

--
-- Struktur dari tabel `ongkos`
--

CREATE TABLE `ongkos` (
  `id_ongkos` int(11) NOT NULL,
  `listrik` int(11) NOT NULL,
  `pajak` int(11) NOT NULL,
  `total_harga_barang` int(11) NOT NULL,
  `total_gaji_pegawai` int(11) NOT NULL,
  `total_ongkos` int(11) NOT NULL,
  `tanggal_ongkos` date NOT NULL,
  `active` int(1) NOT NULL,
  `id_user` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data untuk tabel `ongkos`
--

INSERT INTO `ongkos` (`id_ongkos`, `listrik`, `pajak`, `total_harga_barang`, `total_gaji_pegawai`, `total_ongkos`, `tanggal_ongkos`, `active`, `id_user`) VALUES
(13, 1000, 500, 10000, 20000, 31500, '2020-11-18', 1, 123456),
(14, 1000, 500, 4000, 20000, 25500, '2020-11-19', 1, 123456);

-- --------------------------------------------------------

--
-- Struktur dari tabel `paket_cuci`
--

CREATE TABLE `paket_cuci` (
  `id_paket` int(11) NOT NULL,
  `nama_paket` varchar(128) NOT NULL,
  `harga_paket` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data untuk tabel `paket_cuci`
--

INSERT INTO `paket_cuci` (`id_paket`, `nama_paket`, `harga_paket`) VALUES
(1, 'Paket Kilat (Kering)', 20000),
(2, 'Paket Normal (Kering)', 15000),
(3, 'Paket Kilat (Setrika)', 17000),
(4, 'Paket Normal (Setrika)', 12000);

-- --------------------------------------------------------

--
-- Struktur dari tabel `stok_barang`
--

CREATE TABLE `stok_barang` (
  `id_stok` int(11) NOT NULL,
  `kode_barang` varchar(12) NOT NULL,
  `nama_barang` varchar(64) NOT NULL,
  `harga_satuan` int(11) NOT NULL,
  `jumlah_barang` int(11) NOT NULL,
  `total_harga_barang` int(11) NOT NULL,
  `digunakan` int(11) NOT NULL,
  `tersedia` int(11) NOT NULL,
  `tanggal_barang` date NOT NULL,
  `active` int(11) NOT NULL,
  `id_user` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data untuk tabel `stok_barang`
--

INSERT INTO `stok_barang` (`id_stok`, `kode_barang`, `nama_barang`, `harga_satuan`, `jumlah_barang`, `total_harga_barang`, `digunakan`, `tersedia`, `tanggal_barang`, `active`, `id_user`) VALUES
(14, 'A23006', 'Daia Detergen', 2000, 5, 10000, 4, 1, '2020-11-18', 1, 123456);

-- --------------------------------------------------------

--
-- Struktur dari tabel `user`
--

CREATE TABLE `user` (
  `id` int(11) NOT NULL,
  `name` varchar(128) NOT NULL,
  `email` varchar(128) NOT NULL,
  `image` varchar(128) NOT NULL,
  `password` varchar(256) NOT NULL,
  `no_telp` char(12) NOT NULL,
  `id_entitas` int(128) NOT NULL,
  `role_id` int(11) NOT NULL,
  `is_active` int(1) NOT NULL,
  `date_created` int(11) NOT NULL,
  `testi` varchar(256) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data untuk tabel `user`
--

INSERT INTO `user` (`id`, `name`, `email`, `image`, `password`, `no_telp`, `id_entitas`, `role_id`, `is_active`, `date_created`, `testi`) VALUES
(19, 'Santi Wulandari', 'santuwulandari@gmail.com', 'manager.png', '$2y$10$mEKG3WrDUTKEIGrMn.bj8erNiG95e6mkF7De4W2jczSZsBwS4E.Qu', '081373230666', 123456, 2, 1, 1605684430, 'Lorem ipsum dolor, sit amet consectetur adipisicing elit. Maiores molestiae velit porro laudantium minus corrupti eos'),
(21, 'Dwi Fath Syahdi Akbar', 'syahdiazurec99@gmail.com', 'photo_2.jpg', '$2y$10$rFw1hufgLe3j/zeVWmsQI.bySmmxIjDHS/Y9q2tMiuoEew760PbgO', '081373230222', 123456, 1, 1, 1605686175, 'dsandndlnsanldnNLNLKNlnLNLNLNLKNLNLnlnlnlk');

-- --------------------------------------------------------

--
-- Struktur dari tabel `user_access_menu`
--

CREATE TABLE `user_access_menu` (
  `id` int(11) NOT NULL,
  `role_id` int(11) NOT NULL,
  `menu_id` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data untuk tabel `user_access_menu`
--

INSERT INTO `user_access_menu` (`id`, `role_id`, `menu_id`) VALUES
(1, 1, 1),
(2, 2, 2);

-- --------------------------------------------------------

--
-- Struktur dari tabel `user_menu`
--

CREATE TABLE `user_menu` (
  `id` int(11) NOT NULL,
  `menu` varchar(128) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data untuk tabel `user_menu`
--

INSERT INTO `user_menu` (`id`, `menu`) VALUES
(1, 'Manajer'),
(2, 'Admin');

-- --------------------------------------------------------

--
-- Struktur dari tabel `user_role`
--

CREATE TABLE `user_role` (
  `id` int(11) NOT NULL,
  `role` varchar(128) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data untuk tabel `user_role`
--

INSERT INTO `user_role` (`id`, `role`) VALUES
(1, 'Manajer'),
(2, 'Admin');

-- --------------------------------------------------------

--
-- Struktur dari tabel `user_sub_menu`
--

CREATE TABLE `user_sub_menu` (
  `id` int(11) NOT NULL,
  `menu_id` int(11) NOT NULL,
  `title` varchar(128) NOT NULL,
  `url` varchar(128) NOT NULL,
  `icon` varchar(128) NOT NULL,
  `is_active` int(1) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data untuk tabel `user_sub_menu`
--

INSERT INTO `user_sub_menu` (`id`, `menu_id`, `title`, `url`, `icon`, `is_active`) VALUES
(1, 1, 'Dashboard Manajer', 'manajer', 'fa fa-fw fa-desktop', 1),
(2, 2, 'Dashboard Admin', 'admin', 'fa fa-fw fa-desktop', 1),
(3, 2, 'Absensi Pegawai', 'admin/absensi_pegawai', 'fa fa-fw fa-table', 1),
(4, 2, 'Stok Barang', 'admin/stok_barang', 'fas fa-fw fa-cubes', 1),
(5, 2, 'Ongkos', 'admin/ongkos', 'fas fa-fw fa-money-bill-wave', 1),
(6, 1, 'Data Pegawai', 'manajer/data_pegawai', 'fas fa-fw fa-people-arrows', 1),
(7, 1, 'Monitor Laundry', 'manajer/monitor_laundry', 'fas fa-fw fa-hand-holding-usd', 1),
(8, 1, 'Stok Barang', 'manajer/stok_barang', 'fas fa-fw fa-box', 1),
(9, 1, 'Riwayat Pemesanan', 'manajer/riwayat_pemesanan', 'fas fa-fw fa-file-invoice-dollar', 1),
(10, 1, 'Gaji Pegawai', 'manajer/gaji_pegawai', 'fas fa-fw fa-money-check-alt', 1),
(11, 1, 'Edit Profile', 'manajer/editProfile', 'fas fa-fw fa-user-edit', 1),
(12, 2, 'Edit Profile', 'admin/editProfile', 'fas fa-fw fa-user-edit', 1),
(13, 1, 'My Profile', 'manajer/my_profile', 'fas fa-fw fa-user', 1),
(14, 2, 'My Profile', 'admin/my_profile', 'fas fa-fw fa-user', 1),
(18, 1, 'Change Password', 'manajer/changePassword', 'fas fa-fw fa-key', 1),
(19, 2, 'Change Password', 'admin/changePassword', 'fas fa-fw fa-key', 1);

-- --------------------------------------------------------

--
-- Struktur dari tabel `user_token`
--

CREATE TABLE `user_token` (
  `id_token` int(11) NOT NULL,
  `email` varchar(128) NOT NULL,
  `token` varchar(128) NOT NULL,
  `date_created` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data untuk tabel `user_token`
--

INSERT INTO `user_token` (`id_token`, `email`, `token`, `date_created`) VALUES
(6, 'lauraimel@gmail.com', '1a4pi4XjyD2o+SBoBhxVV6gX8cw5RYoUddklbAXMguU=', 1605846782),
(8, 'syahdiakbar99@gmail.com', 'wuW3xjE5gcaZi1frbdvV7rnHMD+yD1cSlAUKhl7WdEc=', 1605847385);

--
-- Indexes for dumped tables
--

--
-- Indeks untuk tabel `absensi_pegawai`
--
ALTER TABLE `absensi_pegawai`
  ADD PRIMARY KEY (`id_absen`);

--
-- Indeks untuk tabel `bahan_cuci`
--
ALTER TABLE `bahan_cuci`
  ADD PRIMARY KEY (`id_bahan`);

--
-- Indeks untuk tabel `data_pemesanan`
--
ALTER TABLE `data_pemesanan`
  ADD PRIMARY KEY (`id_pemesanan`);

--
-- Indeks untuk tabel `gaji_pegawai`
--
ALTER TABLE `gaji_pegawai`
  ADD PRIMARY KEY (`id_gaji`);

--
-- Indeks untuk tabel `jenis_cuci`
--
ALTER TABLE `jenis_cuci`
  ADD PRIMARY KEY (`id_jenis`);

--
-- Indeks untuk tabel `ongkos`
--
ALTER TABLE `ongkos`
  ADD PRIMARY KEY (`id_ongkos`);

--
-- Indeks untuk tabel `paket_cuci`
--
ALTER TABLE `paket_cuci`
  ADD PRIMARY KEY (`id_paket`);

--
-- Indeks untuk tabel `stok_barang`
--
ALTER TABLE `stok_barang`
  ADD PRIMARY KEY (`id_stok`);

--
-- Indeks untuk tabel `user`
--
ALTER TABLE `user`
  ADD PRIMARY KEY (`id`);

--
-- Indeks untuk tabel `user_access_menu`
--
ALTER TABLE `user_access_menu`
  ADD PRIMARY KEY (`id`);

--
-- Indeks untuk tabel `user_menu`
--
ALTER TABLE `user_menu`
  ADD PRIMARY KEY (`id`);

--
-- Indeks untuk tabel `user_role`
--
ALTER TABLE `user_role`
  ADD PRIMARY KEY (`id`);

--
-- Indeks untuk tabel `user_sub_menu`
--
ALTER TABLE `user_sub_menu`
  ADD PRIMARY KEY (`id`);

--
-- Indeks untuk tabel `user_token`
--
ALTER TABLE `user_token`
  ADD PRIMARY KEY (`id_token`);

--
-- AUTO_INCREMENT untuk tabel yang dibuang
--

--
-- AUTO_INCREMENT untuk tabel `absensi_pegawai`
--
ALTER TABLE `absensi_pegawai`
  MODIFY `id_absen` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=16;

--
-- AUTO_INCREMENT untuk tabel `bahan_cuci`
--
ALTER TABLE `bahan_cuci`
  MODIFY `id_bahan` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT untuk tabel `data_pemesanan`
--
ALTER TABLE `data_pemesanan`
  MODIFY `id_pemesanan` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=43;

--
-- AUTO_INCREMENT untuk tabel `gaji_pegawai`
--
ALTER TABLE `gaji_pegawai`
  MODIFY `id_gaji` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- AUTO_INCREMENT untuk tabel `jenis_cuci`
--
ALTER TABLE `jenis_cuci`
  MODIFY `id_jenis` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT untuk tabel `ongkos`
--
ALTER TABLE `ongkos`
  MODIFY `id_ongkos` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=15;

--
-- AUTO_INCREMENT untuk tabel `paket_cuci`
--
ALTER TABLE `paket_cuci`
  MODIFY `id_paket` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- AUTO_INCREMENT untuk tabel `stok_barang`
--
ALTER TABLE `stok_barang`
  MODIFY `id_stok` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=15;

--
-- AUTO_INCREMENT untuk tabel `user`
--
ALTER TABLE `user`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=35;

--
-- AUTO_INCREMENT untuk tabel `user_access_menu`
--
ALTER TABLE `user_access_menu`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT untuk tabel `user_menu`
--
ALTER TABLE `user_menu`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT untuk tabel `user_role`
--
ALTER TABLE `user_role`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT untuk tabel `user_sub_menu`
--
ALTER TABLE `user_sub_menu`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=20;

--
-- AUTO_INCREMENT untuk tabel `user_token`
--
ALTER TABLE `user_token`
  MODIFY `id_token` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=9;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
