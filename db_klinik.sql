-- phpMyAdmin SQL Dump
-- version 4.8.5
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Waktu pembuatan: 14 Feb 2022 pada 10.43
-- Versi server: 10.1.38-MariaDB
-- Versi PHP: 5.6.40

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET AUTOCOMMIT = 0;
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `db_klinik`
--

-- --------------------------------------------------------

--
-- Struktur dari tabel `aksesmenu`
--

CREATE TABLE `aksesmenu` (
  `IdMenu` int(11) NOT NULL,
  `IdUser` int(11) NOT NULL,
  `Nama` varchar(30) NOT NULL,
  `Alamat` varchar(50) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data untuk tabel `aksesmenu`
--

INSERT INTO `aksesmenu` (`IdMenu`, `IdUser`, `Nama`, `Alamat`) VALUES
(2, 4, 'Wilayah', 'wilayah/index.php'),
(3, 4, 'User', 'user/index.php'),
(4, 4, 'Pegawai', 'pegawai/index.php'),
(5, 4, 'Tindakan', 'tindakan/index.php'),
(6, 4, 'Obat', 'obat/index.php'),
(7, 7, 'Pendaftaran Pasien', 'pendaftaranPasien/index.php'),
(8, 5, 'Berobat', 'berobat/index.php'),
(9, 6, 'Cek Pembayaran', 'cekPembayaran/index.php'),
(10, 0, 'Pasien', 'pasien/index.php');

-- --------------------------------------------------------

--
-- Struktur dari tabel `berobat`
--

CREATE TABLE `berobat` (
  `IdBerobat` int(11) NOT NULL,
  `IdPasien` int(11) NOT NULL,
  `IdDokter` int(11) NOT NULL,
  `IdTindakan` int(11) NOT NULL,
  `IdObat` int(11) NOT NULL,
  `StatusPembayaran` varchar(15) NOT NULL,
  `TimeEdit` datetime NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Struktur dari tabel `kategori`
--

CREATE TABLE `kategori` (
  `IdKategori` int(11) NOT NULL,
  `Kategori` varchar(15) NOT NULL,
  `Nilai` varchar(15) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data untuk tabel `kategori`
--

INSERT INTO `kategori` (`IdKategori`, `Kategori`, `Nilai`) VALUES
(1, 'Pilih Kategori', ''),
(2, 'Master', 'Master'),
(3, 'Pasien', 'Pasien'),
(4, 'Dokter', 'Dokter'),
(5, 'Keuangan', 'Keuangan'),
(6, 'B. Pendaftaran', 'B. Pendaftaran');

-- --------------------------------------------------------

--
-- Struktur dari tabel `obat`
--

CREATE TABLE `obat` (
  `IdObat` int(11) NOT NULL,
  `Nama` varchar(50) NOT NULL,
  `HargaSatuan` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data untuk tabel `obat`
--

INSERT INTO `obat` (`IdObat`, `Nama`, `HargaSatuan`) VALUES
(1, 'obat_a', 5000),
(2, 'obat_b', 10000),
(3, 'obat_c', 7500);

-- --------------------------------------------------------

--
-- Struktur dari tabel `pasien`
--

CREATE TABLE `pasien` (
  `IdPasien` int(11) NOT NULL,
  `IdUser` int(11) NOT NULL,
  `Nama` varchar(50) NOT NULL,
  `TempatLahir` varchar(30) NOT NULL,
  `TanggalLahir` date NOT NULL,
  `Alamat` text NOT NULL,
  `Wilayah` varchar(15) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Struktur dari tabel `pegawai`
--

CREATE TABLE `pegawai` (
  `IdPegawai` int(11) NOT NULL,
  `Nama` varchar(50) NOT NULL,
  `IdUser` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data untuk tabel `pegawai`
--

INSERT INTO `pegawai` (`IdPegawai`, `Nama`, `IdUser`) VALUES
(1, 'namaa', 4),
(2, 'namab', 5),
(3, 'namac', 6),
(4, 'namad', 7);

-- --------------------------------------------------------

--
-- Struktur dari tabel `tindakan`
--

CREATE TABLE `tindakan` (
  `IdTindakan` int(11) NOT NULL,
  `Keterangan` varchar(200) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data untuk tabel `tindakan`
--

INSERT INTO `tindakan` (`IdTindakan`, `Keterangan`) VALUES
(1, 'Banyak minum air putih'),
(2, 'Istirahat yang cukup minimal 8 jam tidur sehari');

-- --------------------------------------------------------

--
-- Struktur dari tabel `user`
--

CREATE TABLE `user` (
  `IdUser` int(11) NOT NULL,
  `Kategori` varchar(15) NOT NULL,
  `UserName` varchar(50) NOT NULL,
  `Password` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data untuk tabel `user`
--

INSERT INTO `user` (`IdUser`, `Kategori`, `UserName`, `Password`) VALUES
(4, 'Master', 'master123', '$2y$10$gdN9RQRw9AxQABSpqwS4yO6een6PTzs/maRcDWdPUXq8T52x9M9VK'),
(5, 'Dokter', 'dokter123', '$2y$10$x2T1VGwsTg3hlvSiU76i9eaWf1e8as7BFXA6DEY8fYVLu5G.VJZAi'),
(6, 'Keuangan', 'keuangan123', '$2y$10$d6We13nLXvi00CRagwnuyuY1K3u6gA9FSBhEFbaZXQvqTqaC41RNm'),
(7, 'B. Pendaftaran', 'pendaftaran123', '$2y$10$7LQw.AnbCZkSJ1szkHiCU.BXuYGLGV6gnyj/hqxLs81XaDkJO38wK');

-- --------------------------------------------------------

--
-- Struktur dari tabel `wilayah`
--

CREATE TABLE `wilayah` (
  `IdWilayah` int(11) NOT NULL,
  `Wilayah` varchar(50) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data untuk tabel `wilayah`
--

INSERT INTO `wilayah` (`IdWilayah`, `Wilayah`) VALUES
(1, 'Baleendah'),
(3, 'Dayeuhkolot');

--
-- Indexes for dumped tables
--

--
-- Indeks untuk tabel `aksesmenu`
--
ALTER TABLE `aksesmenu`
  ADD PRIMARY KEY (`IdMenu`);

--
-- Indeks untuk tabel `berobat`
--
ALTER TABLE `berobat`
  ADD PRIMARY KEY (`IdBerobat`);

--
-- Indeks untuk tabel `kategori`
--
ALTER TABLE `kategori`
  ADD PRIMARY KEY (`IdKategori`);

--
-- Indeks untuk tabel `obat`
--
ALTER TABLE `obat`
  ADD PRIMARY KEY (`IdObat`);

--
-- Indeks untuk tabel `pasien`
--
ALTER TABLE `pasien`
  ADD PRIMARY KEY (`IdPasien`);

--
-- Indeks untuk tabel `pegawai`
--
ALTER TABLE `pegawai`
  ADD PRIMARY KEY (`IdPegawai`);

--
-- Indeks untuk tabel `tindakan`
--
ALTER TABLE `tindakan`
  ADD PRIMARY KEY (`IdTindakan`);

--
-- Indeks untuk tabel `user`
--
ALTER TABLE `user`
  ADD PRIMARY KEY (`IdUser`);

--
-- Indeks untuk tabel `wilayah`
--
ALTER TABLE `wilayah`
  ADD PRIMARY KEY (`IdWilayah`);

--
-- AUTO_INCREMENT untuk tabel yang dibuang
--

--
-- AUTO_INCREMENT untuk tabel `aksesmenu`
--
ALTER TABLE `aksesmenu`
  MODIFY `IdMenu` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=11;

--
-- AUTO_INCREMENT untuk tabel `berobat`
--
ALTER TABLE `berobat`
  MODIFY `IdBerobat` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT untuk tabel `kategori`
--
ALTER TABLE `kategori`
  MODIFY `IdKategori` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=7;

--
-- AUTO_INCREMENT untuk tabel `obat`
--
ALTER TABLE `obat`
  MODIFY `IdObat` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT untuk tabel `pasien`
--
ALTER TABLE `pasien`
  MODIFY `IdPasien` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT untuk tabel `pegawai`
--
ALTER TABLE `pegawai`
  MODIFY `IdPegawai` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- AUTO_INCREMENT untuk tabel `tindakan`
--
ALTER TABLE `tindakan`
  MODIFY `IdTindakan` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT untuk tabel `user`
--
ALTER TABLE `user`
  MODIFY `IdUser` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=8;

--
-- AUTO_INCREMENT untuk tabel `wilayah`
--
ALTER TABLE `wilayah`
  MODIFY `IdWilayah` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
