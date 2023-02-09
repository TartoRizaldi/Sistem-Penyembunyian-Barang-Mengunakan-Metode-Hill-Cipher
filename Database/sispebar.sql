-- phpMyAdmin SQL Dump
-- version 5.2.0
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Waktu pembuatan: 13 Jan 2023 pada 14.43
-- Versi server: 10.4.25-MariaDB
-- Versi PHP: 7.4.30

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `sispebar`
--

-- --------------------------------------------------------

--
-- Struktur dari tabel `barang`
--

CREATE TABLE `barang` (
  `id_barang` varchar(10) NOT NULL,
  `nama_barang` varchar(100) NOT NULL,
  `id_satuan` int(10) NOT NULL,
  `stok` int(11) NOT NULL,
  `harga` int(11) NOT NULL,
  `id_supplier` varchar(10) NOT NULL,
  `id` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data untuk tabel `barang`
--

INSERT INTO `barang` (`id_barang`, `nama_barang`, `id_satuan`, `stok`, `harga`, `id_supplier`, `id`) VALUES
('BR00001', '.(^95odho{', 11, 50, 12000, 'SP00001', 15),
('BR00002', '*=h>4_tizf&j', 12, 0, 25000, 'SP00002', 15),
('BR00003', '.(^95o{zz.^l)u', 11, 0, 150000, 'SP00002', 15),
('BR00004', '*=h>4_ti9n&j', 12, 0, 75000, 'SP00002', 15),
('BR00005', '*=h>4_ti|@', 12, 0, 12000, 'SP00002', 15);

-- --------------------------------------------------------

--
-- Struktur dari tabel `barang_keluar`
--

CREATE TABLE `barang_keluar` (
  `id_barangkeluar` int(10) NOT NULL,
  `id_barang` varchar(10) NOT NULL,
  `tgl_keluar` timestamp NOT NULL DEFAULT current_timestamp() ON UPDATE current_timestamp(),
  `stok_keluar` int(11) NOT NULL,
  `total` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Trigger `barang_keluar`
--
DELIMITER $$
CREATE TRIGGER `barang_keluar` AFTER INSERT ON `barang_keluar` FOR EACH ROW BEGIN

	UPDATE barang SET stok = stok - NEW.stok_keluar
    where id_barang = NEW.id_barang;

END
$$
DELIMITER ;

-- --------------------------------------------------------

--
-- Struktur dari tabel `barang_masuk`
--

CREATE TABLE `barang_masuk` (
  `id_barangmasuk` int(10) NOT NULL,
  `id_barang` varchar(10) NOT NULL,
  `tgl_masuk` timestamp NOT NULL DEFAULT current_timestamp() ON UPDATE current_timestamp(),
  `stok_masuk` int(11) NOT NULL,
  `total` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data untuk tabel `barang_masuk`
--

INSERT INTO `barang_masuk` (`id_barangmasuk`, `id_barang`, `tgl_masuk`, `stok_masuk`, `total`) VALUES
(18, 'BR00001', '2022-12-22 17:00:00', 50, 1000000);

--
-- Trigger `barang_masuk`
--
DELIMITER $$
CREATE TRIGGER `barang_masuk` AFTER INSERT ON `barang_masuk` FOR EACH ROW BEGIN

	UPDATE barang SET stok = stok + NEW.stok_masuk
    where id_barang = NEW.id_barang;

END
$$
DELIMITER ;

-- --------------------------------------------------------

--
-- Struktur dari tabel `satuan`
--

CREATE TABLE `satuan` (
  `id_satuan` int(11) NOT NULL,
  `nama_satuan` varchar(100) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data untuk tabel `satuan`
--

INSERT INTO `satuan` (`id_satuan`, `nama_satuan`) VALUES
(11, 'Pcs'),
(12, 'Frame');

-- --------------------------------------------------------

--
-- Struktur dari tabel `supplier`
--

CREATE TABLE `supplier` (
  `id_supplier` varchar(10) NOT NULL,
  `nama_supplier` varchar(100) NOT NULL,
  `alamat_supplier` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data untuk tabel `supplier`
--

INSERT INTO `supplier` (`id_supplier`, `nama_supplier`, `alamat_supplier`) VALUES
('SP00001', 'CV Mitra Card', 'Jl. Slamet Riyadi'),
('SP00002', 'Buana Sawito', 'Jl. nangka'),
('SP00003', 'Meubel Hadi Utomo', 'Jl. Uwe Laponu'),
('SP00004', 'Radja Undangan', 'Jl. Slamet Riyadi');

-- --------------------------------------------------------

--
-- Struktur dari tabel `user`
--

CREATE TABLE `user` (
  `id` int(11) NOT NULL,
  `name` varchar(128) NOT NULL,
  `username` varchar(128) NOT NULL,
  `email` varchar(128) NOT NULL,
  `image` varchar(128) NOT NULL,
  `password` varchar(256) NOT NULL,
  `role_id` int(11) NOT NULL,
  `is_active` int(1) NOT NULL,
  `date_created` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data untuk tabel `user`
--

INSERT INTO `user` (`id`, `name`, `username`, `email`, `image`, `password`, `role_id`, `is_active`, `date_created`) VALUES
(15, 'Administrator', 'admin', 'admin@admin.com', 'default1.jpg', '$2y$10$WFgIKAcsr0xoLmZDCGZbFOsVyHnE2VV4S2iNeC0DiewHJgWFW9xX.', 1, 1, 1586583977),
(18, 'User', 'user1', 'user@user.com', 'default.jpg', '$2y$10$7yqbK3XYn7l1JAb2fkr8y./Qn5myLF6ys920TSusFVqqoU3DEQyW6', 2, 1, 1655302752),
(19, 'User Tes', 'user2', 'user2@gmail.com', 'default.jpg', '$2y$10$By1ODtdDi3Bp/.dCVsmRL.QiSsLH7XIBFIvoOvSptm/UzD5JdzDyK', 2, 1, 1667393835);

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
(2, 1, 2),
(3, 1, 3),
(5, 1, 5),
(15, 2, 2),
(17, 2, 6),
(24, 1, 6),
(26, 1, 4),
(27, 2, 4),
(28, 2, 5),
(29, 1, 26);

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
(1, 'Admin'),
(2, 'User'),
(3, 'Menu'),
(4, 'Data Master'),
(5, 'Transaksi'),
(6, 'Laporan'),
(26, 'Hill Cipher'),
(27, 'Setup');

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
(1, 'Administrator'),
(2, 'Petugas');

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
(1, 1, 'Dashboard', 'admin', 'fas fa-fw fa-tachometer-alt', 1),
(2, 2, 'My Profile', 'user', 'fas fa-fw fa-user', 1),
(3, 2, 'Edit Profile', 'user/edit', 'fas fa-fw fa-user-edit', 1),
(19, 3, 'Menu Management', 'menu', 'fas fa-fw fa-folder', 1),
(20, 3, 'Sub Menu Management', 'menu/submenu', 'fas fa-fw fa-folder-open', 1),
(21, 1, 'Role', 'admin/role', 'fas fa-fw fa-users', 1),
(22, 4, 'Master Supplier', 'supplier', 'fas fa-fw fa-folder', 1),
(24, 4, 'Master Barang', 'barang', 'fas fa-fw fa-folder', 1),
(25, 4, 'Master Satuan', 'satuan', 'fas fa-fw fa-folder', 1),
(30, 5, 'Barang Masuk', 'barangmasuk', 'fas fa-fw fa-folder', 1),
(31, 5, 'Barang Keluar', 'barangkeluar', 'fas fa-fw fa-folder', 1),
(32, 6, 'Laporan Supplier', 'laporansupplier', 'fas fa-fw fa-folder', 1),
(33, 6, 'Laporan Stok Barang', 'laporanbarang', 'fas fa-fw fa-folder', 1),
(34, 6, 'Laporan Barang Masuk', 'laporanbarangmasuk', 'fas fa-fw fa-folder', 1),
(35, 6, 'Laporan Barang Keluar', 'laporanbarangkeluar', 'fas fa-fw fa-folder', 1),
(36, 26, 'Data Barang', 'databarang', 'fas fa-fw fa-folder', 1);

--
-- Indexes for dumped tables
--

--
-- Indeks untuk tabel `barang`
--
ALTER TABLE `barang`
  ADD PRIMARY KEY (`id_barang`),
  ADD KEY `id_satuan` (`id_satuan`),
  ADD KEY `id_supplier` (`id_supplier`),
  ADD KEY `id` (`id`);

--
-- Indeks untuk tabel `barang_keluar`
--
ALTER TABLE `barang_keluar`
  ADD PRIMARY KEY (`id_barangkeluar`),
  ADD KEY `id_barang` (`id_barang`);

--
-- Indeks untuk tabel `barang_masuk`
--
ALTER TABLE `barang_masuk`
  ADD PRIMARY KEY (`id_barangmasuk`),
  ADD KEY `id_barang` (`id_barang`);

--
-- Indeks untuk tabel `satuan`
--
ALTER TABLE `satuan`
  ADD PRIMARY KEY (`id_satuan`);

--
-- Indeks untuk tabel `supplier`
--
ALTER TABLE `supplier`
  ADD PRIMARY KEY (`id_supplier`);

--
-- Indeks untuk tabel `user`
--
ALTER TABLE `user`
  ADD PRIMARY KEY (`id`),
  ADD KEY `role_id` (`role_id`);

--
-- Indeks untuk tabel `user_access_menu`
--
ALTER TABLE `user_access_menu`
  ADD PRIMARY KEY (`id`),
  ADD KEY `role_id` (`role_id`),
  ADD KEY `menu_id` (`menu_id`);

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
  ADD PRIMARY KEY (`id`),
  ADD KEY `menu_id` (`menu_id`);

--
-- AUTO_INCREMENT untuk tabel yang dibuang
--

--
-- AUTO_INCREMENT untuk tabel `barang_keluar`
--
ALTER TABLE `barang_keluar`
  MODIFY `id_barangkeluar` int(10) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=11;

--
-- AUTO_INCREMENT untuk tabel `barang_masuk`
--
ALTER TABLE `barang_masuk`
  MODIFY `id_barangmasuk` int(10) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=19;

--
-- AUTO_INCREMENT untuk tabel `satuan`
--
ALTER TABLE `satuan`
  MODIFY `id_satuan` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=16;

--
-- AUTO_INCREMENT untuk tabel `user`
--
ALTER TABLE `user`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=20;

--
-- AUTO_INCREMENT untuk tabel `user_access_menu`
--
ALTER TABLE `user_access_menu`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=30;

--
-- AUTO_INCREMENT untuk tabel `user_menu`
--
ALTER TABLE `user_menu`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=28;

--
-- AUTO_INCREMENT untuk tabel `user_role`
--
ALTER TABLE `user_role`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;

--
-- AUTO_INCREMENT untuk tabel `user_sub_menu`
--
ALTER TABLE `user_sub_menu`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=37;

--
-- Ketidakleluasaan untuk tabel pelimpahan (Dumped Tables)
--

--
-- Ketidakleluasaan untuk tabel `barang`
--
ALTER TABLE `barang`
  ADD CONSTRAINT `barang_ibfk_1` FOREIGN KEY (`id_satuan`) REFERENCES `satuan` (`id_satuan`),
  ADD CONSTRAINT `barang_ibfk_2` FOREIGN KEY (`id_supplier`) REFERENCES `supplier` (`id_supplier`),
  ADD CONSTRAINT `barang_ibfk_3` FOREIGN KEY (`id`) REFERENCES `user` (`id`);

--
-- Ketidakleluasaan untuk tabel `barang_keluar`
--
ALTER TABLE `barang_keluar`
  ADD CONSTRAINT `barang_keluar_ibfk_1` FOREIGN KEY (`id_barang`) REFERENCES `barang` (`id_barang`);

--
-- Ketidakleluasaan untuk tabel `barang_masuk`
--
ALTER TABLE `barang_masuk`
  ADD CONSTRAINT `barang_masuk_ibfk_1` FOREIGN KEY (`id_barang`) REFERENCES `barang` (`id_barang`);

--
-- Ketidakleluasaan untuk tabel `user`
--
ALTER TABLE `user`
  ADD CONSTRAINT `user_ibfk_1` FOREIGN KEY (`role_id`) REFERENCES `user_role` (`id`);

--
-- Ketidakleluasaan untuk tabel `user_access_menu`
--
ALTER TABLE `user_access_menu`
  ADD CONSTRAINT `user_access_menu_ibfk_1` FOREIGN KEY (`role_id`) REFERENCES `user_role` (`id`),
  ADD CONSTRAINT `user_access_menu_ibfk_2` FOREIGN KEY (`role_id`) REFERENCES `user_role` (`id`),
  ADD CONSTRAINT `user_access_menu_ibfk_3` FOREIGN KEY (`menu_id`) REFERENCES `user_menu` (`id`);

--
-- Ketidakleluasaan untuk tabel `user_sub_menu`
--
ALTER TABLE `user_sub_menu`
  ADD CONSTRAINT `user_sub_menu_ibfk_1` FOREIGN KEY (`menu_id`) REFERENCES `user_menu` (`id`);
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
