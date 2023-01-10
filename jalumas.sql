-- phpMyAdmin SQL Dump
-- version 5.1.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Waktu pembuatan: 11 Jan 2023 pada 00.30
-- Versi server: 10.4.19-MariaDB
-- Versi PHP: 8.0.7

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `jalumas`
--

-- --------------------------------------------------------

--
-- Struktur dari tabel `barang`
--

CREATE TABLE `barang` (
  `kode_jamu` varchar(10) NOT NULL,
  `nama_jamu` varchar(50) NOT NULL,
  `kemasan` varchar(15) NOT NULL,
  `harga` int(11) NOT NULL,
  `stok` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data untuk tabel `barang`
--

INSERT INTO `barang` (`kode_jamu`, `nama_jamu`, `kemasan`, `harga`, `stok`) VALUES
('JMU001', 'Kunyit Instan', 'Botol', 5000, 13),
('JMU002', 'Kunyit Instan', 'Sachet', 2000, 0),
('JMU003', 'Kunyit Instan', 'Pouch 100gr', 20000, 98),
('JMU004', 'Wedang Rempah', 'Botol', 5000, 0),
('JMU005', 'Wedang Rempah', 'Pouch Rempah', 10000, 0),
('JMU006', 'Wedang Rempah', 'Box', 20000, 0),
('JMU007', 'Jahe Instan', 'Pouch 100gr', 20000, 0),
('JMU008', 'Kencur Instan', 'Pouch 100gr', 20000, 0),
('JMU009', 'Temulawak Instan', 'Pouch 100gr', 20000, 0),
('JMU010', 'Temulawak Instan', 'Pouch 100gr', 2000, 0);

-- --------------------------------------------------------

--
-- Struktur dari tabel `barang_keluar`
--

CREATE TABLE `barang_keluar` (
  `id_keluar` varchar(11) NOT NULL,
  `tanggal` datetime NOT NULL,
  `kode_jamu` varchar(10) NOT NULL,
  `jumlah_beli` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data untuk tabel `barang_keluar`
--

INSERT INTO `barang_keluar` (`id_keluar`, `tanggal`, `kode_jamu`, `jumlah_beli`) VALUES
('TK-0001', '2022-11-26 00:00:00', 'JMU002', 2),
('TK-0002', '2022-11-26 00:00:00', 'JMU002', 8),
('TK-0003', '2022-11-18 00:00:00', 'JMU002', 7),
('TK-0004', '2022-11-11 00:00:00', 'JMU001', 5),
('TK-0005', '2022-11-18 00:00:00', 'JMU001', 5),
('TK-0006', '2022-11-30 00:00:00', 'JMU003', 2),
('TK-0007', '2022-12-03 00:00:00', 'JMU001', 2);

--
-- Trigger `barang_keluar`
--
DELIMITER $$
CREATE TRIGGER `delete` AFTER DELETE ON `barang_keluar` FOR EACH ROW BEGIN 
UPDATE barang SET stok=stok+OLD.jumlah_beli WHERE kode_jamu = OLD.kode_jamu;
END
$$
DELIMITER ;
DELIMITER $$
CREATE TRIGGER `update_stok` AFTER INSERT ON `barang_keluar` FOR EACH ROW BEGIN UPDATE barang SET stok=stok-NEW.jumlah_beli WHERE kode_jamu = new.kode_jamu;
END
$$
DELIMITER ;

-- --------------------------------------------------------

--
-- Struktur dari tabel `barang_masuk`
--

CREATE TABLE `barang_masuk` (
  `id_masuk` varchar(11) NOT NULL,
  `tanggal` date NOT NULL,
  `kode_jamu` varchar(10) NOT NULL,
  `jumlah` int(11) NOT NULL,
  `expired` date NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data untuk tabel `barang_masuk`
--

INSERT INTO `barang_masuk` (`id_masuk`, `tanggal`, `kode_jamu`, `jumlah`, `expired`) VALUES
('TM-0001', '2022-11-25', 'JMU001', 5, '2022-11-27'),
('TM-0002', '2022-11-26', 'JMU001', 10, '2022-11-28'),
('TM-0003', '2022-11-25', 'JMU002', 10, '2022-11-28'),
('TM-0004', '2022-11-25', 'JMU002', 7, '2022-12-10'),
('TM-0005', '2022-11-30', 'JMU003', 100, '2022-12-10'),
('TM-0006', '2022-11-30', 'JMU001', 10, '2022-12-03');

--
-- Trigger `barang_masuk`
--
DELIMITER $$
CREATE TRIGGER `delete_stok` AFTER DELETE ON `barang_masuk` FOR EACH ROW BEGIN 
UPDATE barang SET stok=stok-OLD.jumlah WHERE kode_jamu = OLD.kode_jamu;
END
$$
DELIMITER ;
DELIMITER $$
CREATE TRIGGER `edit_stok` AFTER UPDATE ON `barang_masuk` FOR EACH ROW BEGIN
UPDATE barang set stok = stok + new.jumlah - OLD.jumlah WHERE kode_jamu=new.kode_jamu;
END
$$
DELIMITER ;
DELIMITER $$
CREATE TRIGGER `stok_masuk` AFTER INSERT ON `barang_masuk` FOR EACH ROW BEGIN
UPDATE barang set stok = stok + new.jumlah WHERE kode_jamu=new.kode_jamu;
END
$$
DELIMITER ;

-- --------------------------------------------------------

--
-- Struktur dari tabel `user`
--

CREATE TABLE `user` (
  `id_user` int(11) NOT NULL,
  `username` varchar(50) NOT NULL,
  `password` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data untuk tabel `user`
--

INSERT INTO `user` (`id_user`, `username`, `password`) VALUES
(1, 'adminjalumas', '$2y$10$nkJPy6.ehD3rvMucBxPha.yEqyWdapyjl4tu4h.bBumxKgYdnznwS');

--
-- Indexes for dumped tables
--

--
-- Indeks untuk tabel `barang`
--
ALTER TABLE `barang`
  ADD PRIMARY KEY (`kode_jamu`);

--
-- Indeks untuk tabel `barang_keluar`
--
ALTER TABLE `barang_keluar`
  ADD PRIMARY KEY (`id_keluar`),
  ADD KEY `id_jamu` (`kode_jamu`);

--
-- Indeks untuk tabel `barang_masuk`
--
ALTER TABLE `barang_masuk`
  ADD PRIMARY KEY (`id_masuk`),
  ADD KEY `id_barang` (`kode_jamu`);

--
-- Indeks untuk tabel `user`
--
ALTER TABLE `user`
  ADD PRIMARY KEY (`id_user`);

--
-- AUTO_INCREMENT untuk tabel yang dibuang
--

--
-- AUTO_INCREMENT untuk tabel `user`
--
ALTER TABLE `user`
  MODIFY `id_user` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- Ketidakleluasaan untuk tabel pelimpahan (Dumped Tables)
--

--
-- Ketidakleluasaan untuk tabel `barang_keluar`
--
ALTER TABLE `barang_keluar`
  ADD CONSTRAINT `barang_keluar_ibfk_1` FOREIGN KEY (`kode_jamu`) REFERENCES `barang` (`kode_jamu`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Ketidakleluasaan untuk tabel `barang_masuk`
--
ALTER TABLE `barang_masuk`
  ADD CONSTRAINT `barang_masuk_ibfk_1` FOREIGN KEY (`kode_jamu`) REFERENCES `barang` (`kode_jamu`) ON DELETE CASCADE ON UPDATE CASCADE;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
