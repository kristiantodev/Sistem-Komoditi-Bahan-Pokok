-- phpMyAdmin SQL Dump
-- version 5.0.4
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Waktu pembuatan: 27 Jun 2022 pada 12.40
-- Versi server: 5.7.21-log
-- Versi PHP: 8.0.0

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `db_komoditi`
--

-- --------------------------------------------------------

--
-- Struktur dari tabel `bahan`
--

CREATE TABLE `bahan` (
  `id_bahan` int(11) NOT NULL,
  `nm_bahan` varchar(100) NOT NULL,
  `foto` varchar(256) NOT NULL,
  `keterangan` text NOT NULL,
  `deleted` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data untuk tabel `bahan`
--

INSERT INTO `bahan` (`id_bahan`, `nm_bahan`, `foto`, `keterangan`, `deleted`) VALUES
(1, 'Beras', '1.jpg', 'Raskin', 0),
(2, 'Minyak', 'default.jpg', '', 0),
(4, 'Jagung', '278742210.jpg', '', 0),
(5, 'Telur', '1798071043.jpg', '-', 0),
(6, 'Gula Pasir', '1017205789.jpg', 'manis', 0);

-- --------------------------------------------------------

--
-- Struktur dari tabel `distributor`
--

CREATE TABLE `distributor` (
  `id_distributor` int(11) NOT NULL,
  `id_jenis` int(5) NOT NULL,
  `nm_distributor` varchar(100) NOT NULL,
  `telpon` varchar(50) NOT NULL,
  `alamat` text NOT NULL,
  `keterangan` text NOT NULL,
  `deleted` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data untuk tabel `distributor`
--

INSERT INTO `distributor` (`id_distributor`, `id_jenis`, `nm_distributor`, `telpon`, `alamat`, `keterangan`, `deleted`) VALUES
(1, 1, 'nexSOFT', '0928408739', 'Tangerang', '-', 0),
(2, 4, 'test', '089', 'test', 'test', 1),
(3, 4, 'PT Indofood', '089939643', 'Jakarta', 'Distributor', 0);

-- --------------------------------------------------------

--
-- Struktur dari tabel `jenis_distributor`
--

CREATE TABLE `jenis_distributor` (
  `id_jenis` int(11) NOT NULL,
  `nm_jenis` varchar(256) NOT NULL,
  `keterangan` text NOT NULL,
  `deleted` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data untuk tabel `jenis_distributor`
--

INSERT INTO `jenis_distributor` (`id_jenis`, `nm_jenis`, `keterangan`, `deleted`) VALUES
(1, 'Kemasan Merk MM', 'Keterangan Kemasan Merk MM', 0),
(2, 'Tahu Bulat', '-', 1),
(3, 'Kemasan Merk Aqua', '-', 1),
(4, 'Kemasan Merk Aqua', '', 0);

-- --------------------------------------------------------

--
-- Struktur dari tabel `lokasi`
--

CREATE TABLE `lokasi` (
  `id_lokasi` int(11) NOT NULL,
  `nm_lokasi` varchar(256) NOT NULL,
  `keterangan` text NOT NULL,
  `deleted` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data untuk tabel `lokasi`
--

INSERT INTO `lokasi` (`id_lokasi`, `nm_lokasi`, `keterangan`, `deleted`) VALUES
(1, 'Palembang', '-', 0),
(2, 'Ogan Komelir Ilir', '', 0),
(3, 'Pasar OKI 2', '2', 1);

-- --------------------------------------------------------

--
-- Struktur dari tabel `persediaan`
--

CREATE TABLE `persediaan` (
  `id_persediaan` int(11) NOT NULL,
  `id_distributor` int(11) NOT NULL,
  `id_lokasi` int(11) NOT NULL,
  `id_bahan` int(11) NOT NULL,
  `persediaan` int(11) NOT NULL,
  `satuan` varchar(40) NOT NULL,
  `update_persediaan` date NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data untuk tabel `persediaan`
--

INSERT INTO `persediaan` (`id_persediaan`, `id_distributor`, `id_lokasi`, `id_bahan`, `persediaan`, `satuan`, `update_persediaan`) VALUES
(1, 1, 1, 1, 100, 'Ton', '2022-06-27'),
(2, 1, 1, 2, 2000, 'Liter', '2022-06-27'),
(3, 1, 1, 4, 200, 'Ton', '2022-06-27'),
(4, 1, 1, 5, 100, 'Kg', '2022-06-27'),
(5, 1, 2, 1, 100, 'Ton', '2022-06-27'),
(6, 1, 2, 2, 124, 'Ton', '2022-06-27'),
(7, 1, 2, 4, 123, 'Ton', '2022-06-27'),
(8, 1, 2, 5, 100, 'Ton', '2022-06-27'),
(9, 3, 1, 1, 100, 'Ton', '2022-06-27'),
(10, 3, 1, 2, 125, 'Ton', '2022-06-27'),
(11, 3, 1, 4, 100, 'Ton', '2022-06-27'),
(12, 3, 1, 5, 125, 'Ton', '2022-06-27');

-- --------------------------------------------------------

--
-- Struktur dari tabel `update_harga`
--

CREATE TABLE `update_harga` (
  `id` int(11) NOT NULL,
  `id_bahan` int(11) NOT NULL,
  `id_lokasi` int(11) NOT NULL,
  `harga` int(11) NOT NULL,
  `tgl_harga` date NOT NULL,
  `satuan` varchar(50) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data untuk tabel `update_harga`
--

INSERT INTO `update_harga` (`id`, `id_bahan`, `id_lokasi`, `harga`, `tgl_harga`, `satuan`) VALUES
(5, 1, 1, 1000, '2022-06-21', 'kg'),
(6, 2, 2, 1500, '2022-06-23', 'liter'),
(8, 5, 2, 2500, '2022-06-14', 'pcs'),
(9, 1, 1, 12500, '2022-06-27', 'Kg'),
(10, 2, 1, 25000, '2022-06-27', 'Liter'),
(11, 4, 1, 10000, '2022-06-27', 'Kg'),
(12, 5, 1, 23500, '2022-06-27', 'Kg'),
(13, 1, 2, 10000, '2022-06-27', 'Kg'),
(14, 2, 2, 22500, '2022-06-27', 'Liter'),
(15, 4, 2, 10500, '2022-06-27', 'Kg'),
(16, 5, 2, 25000, '2022-06-27', 'Kg');

-- --------------------------------------------------------

--
-- Struktur dari tabel `user`
--

CREATE TABLE `user` (
  `id_user` varchar(60) NOT NULL,
  `username` varchar(60) NOT NULL,
  `password` varchar(200) NOT NULL,
  `nm_user` varchar(50) NOT NULL,
  `level` varchar(20) NOT NULL,
  `foto` varchar(20) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data untuk tabel `user`
--

INSERT INTO `user` (`id_user`, `username`, `password`, `nm_user`, `level`, `foto`) VALUES
('1', 'admin', '$2y$10$gULCedUyIy0vjPr9mJWHAOE6tcGdIzJwy9h8XDt0nOB4BHJIhNIeS', 'Administrator', 'Administrator', '1.jpg'),
('62b8556487642', 'manda', '$2y$10$Yu1ziUFIrjktqeBPpLtfiO5mWh9XXdhdwHIpYT8ThaGTXl13NJa1q', 'Manda Alamanda', 'Administrator', '1.jpg'),
('62b8fc3b96103', 'kris', '$2y$10$wbF8XhqQYiEZEXYBNkDD0.Rp.hvYylWcXsJoJEQSGZ7vRN9zpPWh2', 'kris', 'Administrator', '1.jpg');

--
-- Indexes for dumped tables
--

--
-- Indeks untuk tabel `bahan`
--
ALTER TABLE `bahan`
  ADD PRIMARY KEY (`id_bahan`);

--
-- Indeks untuk tabel `distributor`
--
ALTER TABLE `distributor`
  ADD PRIMARY KEY (`id_distributor`);

--
-- Indeks untuk tabel `jenis_distributor`
--
ALTER TABLE `jenis_distributor`
  ADD PRIMARY KEY (`id_jenis`);

--
-- Indeks untuk tabel `lokasi`
--
ALTER TABLE `lokasi`
  ADD PRIMARY KEY (`id_lokasi`);

--
-- Indeks untuk tabel `persediaan`
--
ALTER TABLE `persediaan`
  ADD PRIMARY KEY (`id_persediaan`);

--
-- Indeks untuk tabel `update_harga`
--
ALTER TABLE `update_harga`
  ADD PRIMARY KEY (`id`);

--
-- Indeks untuk tabel `user`
--
ALTER TABLE `user`
  ADD PRIMARY KEY (`id_user`),
  ADD UNIQUE KEY `username` (`username`);

--
-- AUTO_INCREMENT untuk tabel yang dibuang
--

--
-- AUTO_INCREMENT untuk tabel `bahan`
--
ALTER TABLE `bahan`
  MODIFY `id_bahan` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=7;

--
-- AUTO_INCREMENT untuk tabel `distributor`
--
ALTER TABLE `distributor`
  MODIFY `id_distributor` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT untuk tabel `jenis_distributor`
--
ALTER TABLE `jenis_distributor`
  MODIFY `id_jenis` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- AUTO_INCREMENT untuk tabel `lokasi`
--
ALTER TABLE `lokasi`
  MODIFY `id_lokasi` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT untuk tabel `persediaan`
--
ALTER TABLE `persediaan`
  MODIFY `id_persediaan` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=13;

--
-- AUTO_INCREMENT untuk tabel `update_harga`
--
ALTER TABLE `update_harga`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=17;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
