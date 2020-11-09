-- phpMyAdmin SQL Dump
-- version 4.8.5
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Waktu pembuatan: 09 Nov 2020 pada 03.45
-- Versi server: 10.1.38-MariaDB
-- Versi PHP: 7.2.15

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET AUTOCOMMIT = 0;
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `sis-blt`
--

-- --------------------------------------------------------

--
-- Struktur dari tabel `m_jenis_bantuan`
--

CREATE TABLE `m_jenis_bantuan` (
  `id_jenis_bantuan` bigint(20) NOT NULL,
  `nama_jenis_bantuan` varchar(100) NOT NULL,
  `nominal` varchar(100) NOT NULL,
  `satuan` varchar(100) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data untuk tabel `m_jenis_bantuan`
--

INSERT INTO `m_jenis_bantuan` (`id_jenis_bantuan`, `nama_jenis_bantuan`, `nominal`, `satuan`) VALUES
(2, 'Beras', '40', 'kg'),
(3, 'BLT', '30000', 'Rp.');

-- --------------------------------------------------------

--
-- Struktur dari tabel `m_kk`
--

CREATE TABLE `m_kk` (
  `id_kk` bigint(20) NOT NULL,
  `no_kk` varchar(100) NOT NULL,
  `nama_kepala_keluarga` varchar(100) NOT NULL,
  `rt` int(11) NOT NULL,
  `rw` int(11) NOT NULL,
  `kode_pos` int(11) NOT NULL,
  `desa` varchar(100) NOT NULL,
  `kecamatan` varchar(100) NOT NULL,
  `kabupaten` varchar(100) NOT NULL,
  `provinsi` varchar(100) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data untuk tabel `m_kk`
--

INSERT INTO `m_kk` (`id_kk`, `no_kk`, `nama_kepala_keluarga`, `rt`, `rw`, `kode_pos`, `desa`, `kecamatan`, `kabupaten`, `provinsi`) VALUES
(1, '330406211211000001', 'Nur Irianto', 1, 1, 53415, 'Kutabanjarnegara', 'Banjarnegara', 'Banjarnegara', 'Jawa Tengah');

-- --------------------------------------------------------

--
-- Struktur dari tabel `m_penduduk`
--

CREATE TABLE `m_penduduk` (
  `id_penduduk` bigint(20) NOT NULL,
  `no_ktp` varchar(40) NOT NULL,
  `nama_penduduk` varchar(100) NOT NULL,
  `tempat_lahir` varchar(100) NOT NULL,
  `tanggal_lahir` date NOT NULL,
  `jenis_kelamin` varchar(100) NOT NULL,
  `agama` varchar(100) NOT NULL,
  `status_kawin` varchar(100) NOT NULL,
  `pekerjaan` varchar(100) NOT NULL,
  `kewarganegaraan` varchar(100) NOT NULL,
  `id_kk` varchar(40) NOT NULL,
  `rt` varchar(10) DEFAULT NULL,
  `rw` varchar(10) DEFAULT NULL,
  `kec` varchar(50) DEFAULT NULL,
  `kel` varchar(50) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data untuk tabel `m_penduduk`
--

INSERT INTO `m_penduduk` (`id_penduduk`, `no_ktp`, `nama_penduduk`, `tempat_lahir`, `tanggal_lahir`, `jenis_kelamin`, `agama`, `status_kawin`, `pekerjaan`, `kewarganegaraan`, `id_kk`, `rt`, `rw`, `kec`, `kel`) VALUES
(1, '3304062909000001', 'Dion Budi Riyanto', 'Kendari', '2000-09-29', 'L', 'Islam', 'Jomblo', 'Karyawan', 'Indonesia', '1', NULL, NULL, NULL, NULL),
(2, '3304062909000002', 'Bagas Ariefia', 'Banjarnegara', '1998-05-20', 'L', 'Islam', 'Jomblo Akut', 'Atasan', 'Indonesia', '1', NULL, NULL, NULL, NULL),
(4, '3304062909000004', 'Paramore', 'Wowowowowow', '1993-01-31', 'L', 'Islam', 'Lajang', 'Karyawan', 'Indonesia', '3304062909000001', '2', '3', 'Banjarnegara', 'Kutabanjarnegara');

-- --------------------------------------------------------

--
-- Struktur dari tabel `m_status`
--

CREATE TABLE `m_status` (
  `id_status` bigint(20) NOT NULL,
  `nama_status` varchar(100) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data untuk tabel `m_status`
--

INSERT INTO `m_status` (`id_status`, `nama_status`) VALUES
(1, 'Diteruskan RT'),
(2, 'Diteruskan RW'),
(3, 'Diterima Lurah/Kades'),
(4, 'Ditolak RW'),
(5, 'Ditolak RT'),
(6, 'Ditolak Lurah/Kades');

-- --------------------------------------------------------

--
-- Struktur dari tabel `m_tingkat_adm`
--

CREATE TABLE `m_tingkat_adm` (
  `id_tingkat_adm` bigint(20) NOT NULL,
  `nama_tingkat_adm` varchar(100) NOT NULL,
  `rt` int(11) DEFAULT NULL,
  `rw` int(11) DEFAULT NULL,
  `tahun` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data untuk tabel `m_tingkat_adm`
--

INSERT INTO `m_tingkat_adm` (`id_tingkat_adm`, `nama_tingkat_adm`, `rt`, `rw`, `tahun`) VALUES
(1, 'RT', 1, 1, 2020),
(2, 'RW', NULL, 1, 2020),
(3, 'Desa', NULL, NULL, 2020);

-- --------------------------------------------------------

--
-- Struktur dari tabel `m_user`
--

CREATE TABLE `m_user` (
  `id_user` bigint(20) NOT NULL,
  `nama_user` varchar(100) NOT NULL,
  `pass_user` varchar(100) NOT NULL,
  `id_tingkat_adm` int(11) NOT NULL,
  `tahun` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data untuk tabel `m_user`
--

INSERT INTO `m_user` (`id_user`, `nama_user`, `pass_user`, `id_tingkat_adm`, `tahun`) VALUES
(1, 'rt', 'rt', 1, 2020),
(3, 'kades', 'kades', 3, 2020);

-- --------------------------------------------------------

--
-- Struktur dari tabel `t_pengajuan`
--

CREATE TABLE `t_pengajuan` (
  `id_pengajuan` bigint(20) NOT NULL,
  `id_user_pengajuan` int(11) NOT NULL,
  `id_penduduk` int(11) NOT NULL,
  `id_jenis_bantuan` int(11) NOT NULL,
  `id_status` int(11) NOT NULL,
  `tanggal_pengajuan` datetime DEFAULT CURRENT_TIMESTAMP,
  `tanggal_selesai` datetime DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data untuk tabel `t_pengajuan`
--

INSERT INTO `t_pengajuan` (`id_pengajuan`, `id_user_pengajuan`, `id_penduduk`, `id_jenis_bantuan`, `id_status`, `tanggal_pengajuan`, `tanggal_selesai`) VALUES
(1, 1, 1, 2, 1, '2020-11-08 09:30:15', '0000-00-00 00:00:00'),
(3, 1, 4, 3, 1, '2020-11-08 09:03:05', '0000-00-00 00:00:00');

--
-- Indexes for dumped tables
--

--
-- Indeks untuk tabel `m_jenis_bantuan`
--
ALTER TABLE `m_jenis_bantuan`
  ADD PRIMARY KEY (`id_jenis_bantuan`);

--
-- Indeks untuk tabel `m_kk`
--
ALTER TABLE `m_kk`
  ADD PRIMARY KEY (`id_kk`);

--
-- Indeks untuk tabel `m_penduduk`
--
ALTER TABLE `m_penduduk`
  ADD PRIMARY KEY (`id_penduduk`);

--
-- Indeks untuk tabel `m_status`
--
ALTER TABLE `m_status`
  ADD PRIMARY KEY (`id_status`);

--
-- Indeks untuk tabel `m_tingkat_adm`
--
ALTER TABLE `m_tingkat_adm`
  ADD PRIMARY KEY (`id_tingkat_adm`);

--
-- Indeks untuk tabel `m_user`
--
ALTER TABLE `m_user`
  ADD PRIMARY KEY (`id_user`);

--
-- Indeks untuk tabel `t_pengajuan`
--
ALTER TABLE `t_pengajuan`
  ADD PRIMARY KEY (`id_pengajuan`);

--
-- AUTO_INCREMENT untuk tabel yang dibuang
--

--
-- AUTO_INCREMENT untuk tabel `m_jenis_bantuan`
--
ALTER TABLE `m_jenis_bantuan`
  MODIFY `id_jenis_bantuan` bigint(20) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT untuk tabel `m_kk`
--
ALTER TABLE `m_kk`
  MODIFY `id_kk` bigint(20) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT untuk tabel `m_penduduk`
--
ALTER TABLE `m_penduduk`
  MODIFY `id_penduduk` bigint(20) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- AUTO_INCREMENT untuk tabel `m_status`
--
ALTER TABLE `m_status`
  MODIFY `id_status` bigint(20) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=7;

--
-- AUTO_INCREMENT untuk tabel `m_tingkat_adm`
--
ALTER TABLE `m_tingkat_adm`
  MODIFY `id_tingkat_adm` bigint(20) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT untuk tabel `m_user`
--
ALTER TABLE `m_user`
  MODIFY `id_user` bigint(20) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT untuk tabel `t_pengajuan`
--
ALTER TABLE `t_pengajuan`
  MODIFY `id_pengajuan` bigint(20) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
