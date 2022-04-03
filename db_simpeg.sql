-- phpMyAdmin SQL Dump
-- version 5.1.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Waktu pembuatan: 20 Mar 2022 pada 16.42
-- Versi server: 10.4.22-MariaDB
-- Versi PHP: 8.1.2

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `db_simpeg`
--

-- --------------------------------------------------------

--
-- Struktur dari tabel `gaji`
--

CREATE TABLE `gaji` (
  `id_gaji` int(11) NOT NULL,
  `id_pegawai` int(11) NOT NULL,
  `gaji_pokok` int(11) NOT NULL,
  `bonus` int(11) NOT NULL,
  `tj_konsumsi` int(11) NOT NULL,
  `tanggal` date NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data untuk tabel `gaji`
--

INSERT INTO `gaji` (`id_gaji`, `id_pegawai`, `gaji_pokok`, `bonus`, `tj_konsumsi`, `tanggal`) VALUES
(15, 15, 8000000, 80000000, 120000, '2022-03-20');

-- --------------------------------------------------------

--
-- Struktur dari tabel `kontrak`
--

CREATE TABLE `kontrak` (
  `id_kontrak` int(11) NOT NULL,
  `id_pegawai` int(11) NOT NULL,
  `nama_kontrak` varchar(50) NOT NULL,
  `tanggal` date NOT NULL,
  `nilai_kontrak` varchar(50) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data untuk tabel `kontrak`
--

INSERT INTO `kontrak` (`id_kontrak`, `id_pegawai`, `nama_kontrak`, `tanggal`, `nilai_kontrak`) VALUES
(16, 15, 'Pembangunan Rumah', '2022-03-08', '200000000');

--
-- Trigger `kontrak`
--
DELIMITER $$
CREATE TRIGGER `updateBonus` AFTER INSERT ON `kontrak` FOR EACH ROW UPDATE gaji SET bonus = new.nilai_kontrak*0.4+bonus
WHERE id_pegawai = new.id_pegawai
$$
DELIMITER ;
DELIMITER $$
CREATE TRIGGER `updateBonus2` AFTER DELETE ON `kontrak` FOR EACH ROW UPDATE gaji SET bonus = bonus-old.nilai_kontrak*0.4 WHERE id_pegawai = old.id_pegawai
$$
DELIMITER ;
DELIMITER $$
CREATE TRIGGER `updateBonus3` AFTER UPDATE ON `kontrak` FOR EACH ROW UPDATE gaji SET bonus = IF(new.nilai_kontrak<old.nilai_kontrak,bonus-(old.nilai_kontrak*0.4)+(new.nilai_kontrak*0.4), bonus-(old.nilai_kontrak*0.4)+(new.nilai_kontrak*0.4)) WHERE id_pegawai = new.id_pegawai
$$
DELIMITER ;

-- --------------------------------------------------------

--
-- Struktur dari tabel `pegawai`
--

CREATE TABLE `pegawai` (
  `id_pegawai` int(11) NOT NULL,
  `nama_pegawai` varchar(50) NOT NULL,
  `jabatan` varchar(50) NOT NULL,
  `jenis_pegawai` varchar(25) NOT NULL,
  `tanggal_lahir` date NOT NULL,
  `jenis_kelamin` varchar(25) NOT NULL,
  `alamat` varchar(100) NOT NULL,
  `telfon` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data untuk tabel `pegawai`
--

INSERT INTO `pegawai` (`id_pegawai`, `nama_pegawai`, `jabatan`, `jenis_pegawai`, `tanggal_lahir`, `jenis_kelamin`, `alamat`, `telfon`) VALUES
(15, 'Raul', 'Manager', 'Tetap', '1971-08-19', 'Pria', 'Kalimantan Timur', 812877867);

--
-- Trigger `pegawai`
--
DELIMITER $$
CREATE TRIGGER `deleteGaji` AFTER DELETE ON `pegawai` FOR EACH ROW DELETE FROM gaji WHERE id_pegawai = old.id_pegawai
$$
DELIMITER ;
DELIMITER $$
CREATE TRIGGER `deleteKontrak` AFTER DELETE ON `pegawai` FOR EACH ROW DELETE FROM kontrak WHERE id_pegawai = old.id_pegawai
$$
DELIMITER ;
DELIMITER $$
CREATE TRIGGER `deletePengeluaran` AFTER DELETE ON `pegawai` FOR EACH ROW DELETE FROM pengeluaran WHERE id_pegawai = old.id_pegawai
$$
DELIMITER ;

-- --------------------------------------------------------

--
-- Struktur dari tabel `pengeluaran`
--

CREATE TABLE `pengeluaran` (
  `id_pengeluaran` int(11) NOT NULL,
  `jenis_pengeluaran` varchar(25) NOT NULL,
  `id_pegawai` int(11) NOT NULL,
  `tanggal` date NOT NULL,
  `keterangan` varchar(250) NOT NULL,
  `total` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data untuk tabel `pengeluaran`
--

INSERT INTO `pengeluaran` (`id_pengeluaran`, `jenis_pengeluaran`, `id_pegawai`, `tanggal`, `keterangan`, `total`) VALUES
(11, 'Operasional', 15, '2022-03-20', 'Besin pertamax', 130000);

-- --------------------------------------------------------

--
-- Struktur dari tabel `user`
--

CREATE TABLE `user` (
  `id_user` int(11) NOT NULL,
  `nama_user` varchar(50) NOT NULL,
  `email` varchar(50) NOT NULL,
  `username` varchar(50) NOT NULL,
  `password` varchar(50) NOT NULL,
  `level` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data untuk tabel `user`
--

INSERT INTO `user` (`id_user`, `nama_user`, `email`, `username`, `password`, `level`) VALUES
(3, 'Aku Admin', 'admin@gmail.com', 'admin', 'd033e22ae348aeb5660fc2140aec35850c4da997', 1),
(4, 'Aku Pimpinan', 'pimpinan@gmail.com', 'pimpinan', '59335c9f58c78597ff73f6706c6c8fa278e08b3a', 2),
(5, 'Aku Pegawai', 'pegawai@gmail.com', 'pegawai', 'a431ba54c55ae2cb91be1785398ecd595ca96b7a', 3),
(7, 'Mumtaz Azkia', 'admin1@gmail.com', 'admin1', '6c7ca345f63f835cb353ff15bd6c5e052ec08e7a', 1),
(8, 'coba', 'coba@gmail.com', 'coba', '6bca54961f06f184b6cc93f7b3506fb4c0b51248', 1);

--
-- Indexes for dumped tables
--

--
-- Indeks untuk tabel `gaji`
--
ALTER TABLE `gaji`
  ADD PRIMARY KEY (`id_gaji`),
  ADD KEY `id_pegawai` (`id_pegawai`);

--
-- Indeks untuk tabel `kontrak`
--
ALTER TABLE `kontrak`
  ADD PRIMARY KEY (`id_kontrak`),
  ADD KEY `id_pegawai` (`id_pegawai`);

--
-- Indeks untuk tabel `pegawai`
--
ALTER TABLE `pegawai`
  ADD PRIMARY KEY (`id_pegawai`);

--
-- Indeks untuk tabel `pengeluaran`
--
ALTER TABLE `pengeluaran`
  ADD PRIMARY KEY (`id_pengeluaran`),
  ADD KEY `id_pegawai` (`id_pegawai`);

--
-- Indeks untuk tabel `user`
--
ALTER TABLE `user`
  ADD PRIMARY KEY (`id_user`);

--
-- AUTO_INCREMENT untuk tabel yang dibuang
--

--
-- AUTO_INCREMENT untuk tabel `gaji`
--
ALTER TABLE `gaji`
  MODIFY `id_gaji` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=16;

--
-- AUTO_INCREMENT untuk tabel `kontrak`
--
ALTER TABLE `kontrak`
  MODIFY `id_kontrak` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=17;

--
-- AUTO_INCREMENT untuk tabel `pegawai`
--
ALTER TABLE `pegawai`
  MODIFY `id_pegawai` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=16;

--
-- AUTO_INCREMENT untuk tabel `pengeluaran`
--
ALTER TABLE `pengeluaran`
  MODIFY `id_pengeluaran` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=12;

--
-- AUTO_INCREMENT untuk tabel `user`
--
ALTER TABLE `user`
  MODIFY `id_user` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=9;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
