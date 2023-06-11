-- phpMyAdmin SQL Dump
-- version 5.2.0
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Waktu pembuatan: 11 Jun 2023 pada 10.13
-- Versi server: 10.4.24-MariaDB
-- Versi PHP: 7.4.29

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `uas`
--

-- --------------------------------------------------------

--
-- Struktur dari tabel `barang`
--

CREATE TABLE `barang` (
  `kode_brg` int(10) NOT NULL,
  `nama_brg` varchar(100) NOT NULL,
  `jenis_brg` varchar(100) NOT NULL,
  `stok` int(8) NOT NULL,
  `hrg_jual` int(10) NOT NULL,
  `hrg_beli` int(10) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data untuk tabel `barang`
--

INSERT INTO `barang` (`kode_brg`, `nama_brg`, `jenis_brg`, `stok`, `hrg_jual`, `hrg_beli`) VALUES
(1, 'meja', 'furnitur', 110, 1000000, 900000),
(2, 'kursi', 'furnitur', 250, 950000, 800000),
(3, 'indomie rebus', 'makanan', 10000, 5000, 3000);

-- --------------------------------------------------------

--
-- Struktur dari tabel `jual`
--

CREATE TABLE `jual` (
  `no_faktur` int(10) NOT NULL,
  `tgl_faktur` datetime NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data untuk tabel `jual`
--

INSERT INTO `jual` (`no_faktur`, `tgl_faktur`) VALUES
(1, '2023-06-11 00:00:00');

-- --------------------------------------------------------

--
-- Struktur dari tabel `jual_dt`
--

CREATE TABLE `jual_dt` (
  `no_faktur` int(10) NOT NULL,
  `qty` int(8) NOT NULL,
  `harga_juals` int(10) NOT NULL,
  `kode_brg` int(10) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data untuk tabel `jual_dt`
--

INSERT INTO `jual_dt` (`no_faktur`, `qty`, `harga_juals`, `kode_brg`) VALUES
(1, 1, 5000, 3);

-- --------------------------------------------------------

--
-- Struktur dari tabel `pembayaran`
--

CREATE TABLE `pembayaran` (
  `no_faktur_tagihan` int(8) NOT NULL,
  `tgl_pembayaran` datetime NOT NULL DEFAULT current_timestamp(),
  `jumlah` int(10) NOT NULL,
  `no_po` int(8) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data untuk tabel `pembayaran`
--

INSERT INTO `pembayaran` (`no_faktur_tagihan`, `tgl_pembayaran`, `jumlah`, `no_po`) VALUES
(1, '2023-06-11 15:04:38', 9000000, 1),
(2, '2023-06-11 15:05:02', 40000000, 2);

-- --------------------------------------------------------

--
-- Struktur dari tabel `po`
--

CREATE TABLE `po` (
  `no_po` int(8) NOT NULL,
  `tgl_po` date NOT NULL DEFAULT current_timestamp(),
  `stat_po` enum('pending','process','delivery','success','paid') NOT NULL,
  `id_supplier` int(8) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data untuk tabel `po`
--

INSERT INTO `po` (`no_po`, `tgl_po`, `stat_po`, `id_supplier`) VALUES
(1, '2023-06-11', 'paid', 3),
(2, '2023-06-11', 'paid', 4),
(3, '2023-06-11', 'process', 2),
(4, '2023-06-11', 'pending', 2);

-- --------------------------------------------------------

--
-- Struktur dari tabel `po_dt`
--

CREATE TABLE `po_dt` (
  `no_po` int(8) NOT NULL,
  `kode_brg` int(8) NOT NULL,
  `qty` int(10) NOT NULL,
  `harga_belis` int(10) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data untuk tabel `po_dt`
--

INSERT INTO `po_dt` (`no_po`, `kode_brg`, `qty`, `harga_belis`) VALUES
(1, 1, 10, 9000000),
(2, 2, 50, 40000000),
(3, 1, 10, 9000000),
(4, 2, 10, 8000000);

-- --------------------------------------------------------

--
-- Struktur dari tabel `supplier`
--

CREATE TABLE `supplier` (
  `id_supplier` int(8) NOT NULL,
  `nama_supplier` varchar(100) NOT NULL,
  `no_telp` int(10) NOT NULL,
  `alamat` varchar(100) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data untuk tabel `supplier`
--

INSERT INTO `supplier` (`id_supplier`, `nama_supplier`, `no_telp`, `alamat`) VALUES
(2, 'PT. Papua Jaya Sekali', 2147483647, 'Papua Pusat'),
(3, 'PT Wakanda', 12312512, 'Wakanda Pusat'),
(4, 'PT Wijaya', 2147483647, 'Jakarta Selatan');

-- --------------------------------------------------------

--
-- Struktur dari tabel `users`
--

CREATE TABLE `users` (
  `username` varchar(100) NOT NULL,
  `password` varchar(100) NOT NULL,
  `id_user` int(11) NOT NULL,
  `level` enum('admin','user') NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data untuk tabel `users`
--

INSERT INTO `users` (`username`, `password`, `id_user`, `level`) VALUES
('admin', 'admin', 1, 'admin'),
('user1', 'user1', 3, 'admin');

--
-- Indexes for dumped tables
--

--
-- Indeks untuk tabel `barang`
--
ALTER TABLE `barang`
  ADD PRIMARY KEY (`kode_brg`);

--
-- Indeks untuk tabel `jual`
--
ALTER TABLE `jual`
  ADD PRIMARY KEY (`no_faktur`);

--
-- Indeks untuk tabel `pembayaran`
--
ALTER TABLE `pembayaran`
  ADD PRIMARY KEY (`no_faktur_tagihan`);

--
-- Indeks untuk tabel `po`
--
ALTER TABLE `po`
  ADD PRIMARY KEY (`no_po`);

--
-- Indeks untuk tabel `supplier`
--
ALTER TABLE `supplier`
  ADD PRIMARY KEY (`id_supplier`);

--
-- Indeks untuk tabel `users`
--
ALTER TABLE `users`
  ADD PRIMARY KEY (`id_user`);

--
-- AUTO_INCREMENT untuk tabel yang dibuang
--

--
-- AUTO_INCREMENT untuk tabel `barang`
--
ALTER TABLE `barang`
  MODIFY `kode_brg` int(10) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT untuk tabel `jual`
--
ALTER TABLE `jual`
  MODIFY `no_faktur` int(10) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT untuk tabel `pembayaran`
--
ALTER TABLE `pembayaran`
  MODIFY `no_faktur_tagihan` int(8) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT untuk tabel `po`
--
ALTER TABLE `po`
  MODIFY `no_po` int(8) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- AUTO_INCREMENT untuk tabel `supplier`
--
ALTER TABLE `supplier`
  MODIFY `id_supplier` int(8) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- AUTO_INCREMENT untuk tabel `users`
--
ALTER TABLE `users`
  MODIFY `id_user` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
