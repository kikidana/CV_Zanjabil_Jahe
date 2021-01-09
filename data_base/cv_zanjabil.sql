-- phpMyAdmin SQL Dump
-- version 4.8.5
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Waktu pembuatan: 09 Jan 2021 pada 15.08
-- Versi server: 10.1.38-MariaDB
-- Versi PHP: 7.3.4

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET AUTOCOMMIT = 0;
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `cv_zanjabil`
--

-- --------------------------------------------------------

--
-- Struktur dari tabel `bank`
--

CREATE TABLE `bank` (
  `id_bank` int(11) NOT NULL,
  `nama_bank` varchar(50) NOT NULL,
  `gambar_bank` varchar(200) NOT NULL,
  `no_rek` varchar(20) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data untuk tabel `bank`
--

INSERT INTO `bank` (`id_bank`, `nama_bank`, `gambar_bank`, `no_rek`) VALUES
(1, 'bank BCA', '', '1902-54928-9018'),
(2, 'bank Mandiri', '', '1902-77619-992018');

-- --------------------------------------------------------

--
-- Struktur dari tabel `barang`
--

CREATE TABLE `barang` (
  `id_barang` int(11) NOT NULL,
  `nama_barang` varchar(20) NOT NULL,
  `harga_barang` double NOT NULL,
  `jumlah_barang` int(11) NOT NULL,
  `deskripsi_barang` varchar(200) NOT NULL,
  `gambar_barang` varchar(200) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data untuk tabel `barang`
--

INSERT INTO `barang` (`id_barang`, `nama_barang`, `harga_barang`, `jumlah_barang`, `deskripsi_barang`, `gambar_barang`) VALUES
(9, 'jahe zinogre', 20000, 500, 'jahe zinogre, dan memiliki kekuatan listrik', '9.jpg');

-- --------------------------------------------------------

--
-- Struktur dari tabel `barang_pesanan`
--

CREATE TABLE `barang_pesanan` (
  `id_barang` int(11) NOT NULL,
  `id_pesanan` int(11) NOT NULL,
  `qty` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data untuk tabel `barang_pesanan`
--

INSERT INTO `barang_pesanan` (`id_barang`, `id_pesanan`, `qty`) VALUES
(9, 1, 3),
(9, 5, 10);

-- --------------------------------------------------------

--
-- Struktur dari tabel `cart`
--

CREATE TABLE `cart` (
  `pelanggan` int(11) NOT NULL,
  `barang` int(11) NOT NULL,
  `qty` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

-- --------------------------------------------------------

--
-- Struktur dari tabel `komunikasi`
--

CREATE TABLE `komunikasi` (
  `pelanggan` int(11) NOT NULL,
  `cs` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

-- --------------------------------------------------------

--
-- Struktur dari tabel `pembayaran`
--

CREATE TABLE `pembayaran` (
  `id_pesanan` int(11) NOT NULL,
  `bukti_transfer` varchar(200) NOT NULL,
  `id_bank` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data untuk tabel `pembayaran`
--

INSERT INTO `pembayaran` (`id_pesanan`, `bukti_transfer`, `id_bank`) VALUES
(5, '', 1),
(1, '1.jpg', 2);

-- --------------------------------------------------------

--
-- Struktur dari tabel `pesanan`
--

CREATE TABLE `pesanan` (
  `id_pesanan` int(11) NOT NULL,
  `user_id` int(11) NOT NULL,
  `qty` int(11) NOT NULL,
  `status` enum('on_delivery','on_progress') NOT NULL DEFAULT 'on_progress',
  `tanggal_pesanan` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data untuk tabel `pesanan`
--

INSERT INTO `pesanan` (`id_pesanan`, `user_id`, `qty`, `status`, `tanggal_pesanan`) VALUES
(1, 3, 3, 'on_delivery', '2021-01-08 13:20:44'),
(5, 3, 10, 'on_progress', '2021-01-09 06:43:09');

-- --------------------------------------------------------

--
-- Struktur dari tabel `role`
--

CREATE TABLE `role` (
  `role_id` int(11) NOT NULL,
  `nama_role` varchar(10) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data untuk tabel `role`
--

INSERT INTO `role` (`role_id`, `nama_role`) VALUES
(1, 'admin'),
(2, 'cs'),
(3, 'pelanggan');

-- --------------------------------------------------------

--
-- Struktur dari tabel `user`
--

CREATE TABLE `user` (
  `user_id` int(11) NOT NULL,
  `role_id` int(11) NOT NULL,
  `nama` varchar(50) NOT NULL,
  `email` varchar(50) NOT NULL,
  `password` varchar(50) NOT NULL,
  `no_telp` varchar(20) NOT NULL,
  `alamat` varchar(200) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data untuk tabel `user`
--

INSERT INTO `user` (`user_id`, `role_id`, `nama`, `email`, `password`, `no_telp`, `alamat`) VALUES
(1, 3, 'Aqilla Fadia Haya', 'aqilla.haya@gmail.com', 'aqilla', '021347255372', 'di rumah'),
(2, 3, 'Hafiz Alkarim', 'hafiz.alkarim@gmail.com', 'hafiz', '0219938847613', 'di Gedung'),
(3, 3, 'Muhammad Rizky Perdana', 'rizky.perdana@gmail.com', 'rizky', '0218837261', 'di kantor'),
(4, 1, 'admin', 'admin@gmail.com', 'admin123', '02233817367183', 'di warung'),
(5, 2, 'CS', 'cs@gmail.com', 'cs123', '29300138910', 'di rumah'),
(9, 3, 'basuki jaja', 'baja@gmail.com', 'baja123', '09987162716', 'di depan gank');

--
-- Indexes for dumped tables
--

--
-- Indeks untuk tabel `bank`
--
ALTER TABLE `bank`
  ADD PRIMARY KEY (`id_bank`);

--
-- Indeks untuk tabel `barang`
--
ALTER TABLE `barang`
  ADD PRIMARY KEY (`id_barang`);

--
-- Indeks untuk tabel `barang_pesanan`
--
ALTER TABLE `barang_pesanan`
  ADD KEY `id_barang` (`id_barang`),
  ADD KEY `id_pesanan` (`id_pesanan`);

--
-- Indeks untuk tabel `cart`
--
ALTER TABLE `cart`
  ADD KEY `pelanggan` (`pelanggan`),
  ADD KEY `barang` (`barang`);

--
-- Indeks untuk tabel `komunikasi`
--
ALTER TABLE `komunikasi`
  ADD KEY `pelanggan` (`pelanggan`),
  ADD KEY `cs` (`cs`);

--
-- Indeks untuk tabel `pembayaran`
--
ALTER TABLE `pembayaran`
  ADD KEY `id_pesanan` (`id_pesanan`),
  ADD KEY `id_bank` (`id_bank`);

--
-- Indeks untuk tabel `pesanan`
--
ALTER TABLE `pesanan`
  ADD PRIMARY KEY (`id_pesanan`),
  ADD KEY `user_id` (`user_id`);

--
-- Indeks untuk tabel `role`
--
ALTER TABLE `role`
  ADD PRIMARY KEY (`role_id`);

--
-- Indeks untuk tabel `user`
--
ALTER TABLE `user`
  ADD PRIMARY KEY (`user_id`),
  ADD KEY `role_id` (`role_id`);

--
-- AUTO_INCREMENT untuk tabel yang dibuang
--

--
-- AUTO_INCREMENT untuk tabel `bank`
--
ALTER TABLE `bank`
  MODIFY `id_bank` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT untuk tabel `barang`
--
ALTER TABLE `barang`
  MODIFY `id_barang` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=10;

--
-- AUTO_INCREMENT untuk tabel `pesanan`
--
ALTER TABLE `pesanan`
  MODIFY `id_pesanan` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;

--
-- AUTO_INCREMENT untuk tabel `role`
--
ALTER TABLE `role`
  MODIFY `role_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT untuk tabel `user`
--
ALTER TABLE `user`
  MODIFY `user_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=10;

--
-- Ketidakleluasaan untuk tabel pelimpahan (Dumped Tables)
--

--
-- Ketidakleluasaan untuk tabel `barang_pesanan`
--
ALTER TABLE `barang_pesanan`
  ADD CONSTRAINT `barang_pesanan_ibfk_1` FOREIGN KEY (`id_barang`) REFERENCES `barang` (`id_barang`),
  ADD CONSTRAINT `barang_pesanan_ibfk_2` FOREIGN KEY (`id_barang`) REFERENCES `barang` (`id_barang`),
  ADD CONSTRAINT `barang_pesanan_ibfk_3` FOREIGN KEY (`id_pesanan`) REFERENCES `pesanan` (`id_pesanan`) ON DELETE CASCADE;

--
-- Ketidakleluasaan untuk tabel `cart`
--
ALTER TABLE `cart`
  ADD CONSTRAINT `cart_ibfk_1` FOREIGN KEY (`pelanggan`) REFERENCES `user` (`user_id`),
  ADD CONSTRAINT `cart_ibfk_2` FOREIGN KEY (`barang`) REFERENCES `barang` (`id_barang`),
  ADD CONSTRAINT `cart_ibfk_3` FOREIGN KEY (`pelanggan`) REFERENCES `user` (`user_id`),
  ADD CONSTRAINT `cart_ibfk_4` FOREIGN KEY (`barang`) REFERENCES `barang` (`id_barang`);

--
-- Ketidakleluasaan untuk tabel `komunikasi`
--
ALTER TABLE `komunikasi`
  ADD CONSTRAINT `komunikasi_ibfk_1` FOREIGN KEY (`pelanggan`) REFERENCES `user` (`user_id`),
  ADD CONSTRAINT `komunikasi_ibfk_2` FOREIGN KEY (`cs`) REFERENCES `user` (`user_id`),
  ADD CONSTRAINT `komunikasi_ibfk_3` FOREIGN KEY (`pelanggan`) REFERENCES `user` (`user_id`),
  ADD CONSTRAINT `komunikasi_ibfk_4` FOREIGN KEY (`cs`) REFERENCES `user` (`user_id`);

--
-- Ketidakleluasaan untuk tabel `pembayaran`
--
ALTER TABLE `pembayaran`
  ADD CONSTRAINT `pembayaran_ibfk_1` FOREIGN KEY (`id_pesanan`) REFERENCES `pesanan` (`id_pesanan`),
  ADD CONSTRAINT `pembayaran_ibfk_2` FOREIGN KEY (`id_bank`) REFERENCES `bank` (`id_bank`);

--
-- Ketidakleluasaan untuk tabel `pesanan`
--
ALTER TABLE `pesanan`
  ADD CONSTRAINT `pesanan_ibfk_1` FOREIGN KEY (`user_id`) REFERENCES `user` (`user_id`);

--
-- Ketidakleluasaan untuk tabel `user`
--
ALTER TABLE `user`
  ADD CONSTRAINT `user_ibfk_1` FOREIGN KEY (`role_id`) REFERENCES `role` (`role_id`);
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
