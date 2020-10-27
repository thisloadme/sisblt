-- phpMyAdmin SQL Dump
-- version 4.8.5
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Waktu pembuatan: 27 Okt 2020 pada 06.57
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
-- Database: `sirusa`
--

-- --------------------------------------------------------

--
-- Struktur dari tabel `m_asuransi_jiwa`
--

CREATE TABLE `m_asuransi_jiwa` (
  `id_asuransi_jiwa` int(255) NOT NULL,
  `nama_asuransi_jiwa` varchar(100) DEFAULT NULL,
  `potongan` varchar(10) DEFAULT NULL,
  `keterangan` text,
  `kode_asuransi_jiwa` varchar(20) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data untuk tabel `m_asuransi_jiwa`
--

INSERT INTO `m_asuransi_jiwa` (`id_asuransi_jiwa`, `nama_asuransi_jiwa`, `potongan`, `keterangan`, `kode_asuransi_jiwa`) VALUES
(1, 'BPJS', '50', 'OK', '12310');

-- --------------------------------------------------------

--
-- Struktur dari tabel `m_dokter`
--

CREATE TABLE `m_dokter` (
  `id_dokter` int(255) NOT NULL,
  `nomor_identitas` varchar(20) DEFAULT NULL,
  `nomor_kepegawaian` varchar(20) DEFAULT NULL,
  `nama_identitas` varchar(255) DEFAULT NULL,
  `jenis_kelamin` varchar(20) DEFAULT NULL,
  `golongan_darah` varchar(10) DEFAULT NULL,
  `agama` varchar(15) DEFAULT NULL,
  `alamat` text,
  `telp` varchar(20) DEFAULT NULL,
  `tempat_lahir` varchar(30) DEFAULT NULL,
  `tanggal_lahir` date DEFAULT NULL,
  `id_jenis_poli` int(30) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data untuk tabel `m_dokter`
--

INSERT INTO `m_dokter` (`id_dokter`, `nomor_identitas`, `nomor_kepegawaian`, `nama_identitas`, `jenis_kelamin`, `golongan_darah`, `agama`, `alamat`, `telp`, `tempat_lahir`, `tanggal_lahir`, `id_jenis_poli`) VALUES
(1, '31028008', '0238012009', 'Dion Budi Wiyoko', 'Laki-Laki', 'A', 'Islam', 'Banjarnegara', '-', 'Wonosobo', '1998-05-25', 1);

-- --------------------------------------------------------

--
-- Struktur dari tabel `m_jenis_poli`
--

CREATE TABLE `m_jenis_poli` (
  `id_jenis_poli` int(255) NOT NULL,
  `nama_jenis_poli` varchar(20) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data untuk tabel `m_jenis_poli`
--

INSERT INTO `m_jenis_poli` (`id_jenis_poli`, `nama_jenis_poli`) VALUES
(1, 'Poli Umum');

-- --------------------------------------------------------

--
-- Struktur dari tabel `m_obat`
--

CREATE TABLE `m_obat` (
  `id_obat` int(255) NOT NULL,
  `nama_obat` varchar(50) DEFAULT NULL,
  `stock` int(255) DEFAULT NULL,
  `harga` varchar(255) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data untuk tabel `m_obat`
--

INSERT INTO `m_obat` (`id_obat`, `nama_obat`, `stock`, `harga`) VALUES
(1, 'Amonixlin', 3, '3000');

-- --------------------------------------------------------

--
-- Struktur dari tabel `m_pasien`
--

CREATE TABLE `m_pasien` (
  `id_pasien` int(255) NOT NULL,
  `nomor_identitas` varchar(20) DEFAULT NULL,
  `nomor_kepegawaian` varchar(20) DEFAULT NULL,
  `nama_identitas` varchar(255) DEFAULT NULL,
  `jenis_kelamin` varchar(20) DEFAULT NULL,
  `golongan_darah` varchar(10) DEFAULT NULL,
  `agama` varchar(15) DEFAULT NULL,
  `alamat` text,
  `telp` varchar(20) DEFAULT NULL,
  `tempat_lahir` varchar(30) DEFAULT NULL,
  `tanggal_lahir` date DEFAULT NULL,
  `id_jenis_asuransi` int(30) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data untuk tabel `m_pasien`
--

INSERT INTO `m_pasien` (`id_pasien`, `nomor_identitas`, `nomor_kepegawaian`, `nama_identitas`, `jenis_kelamin`, `golongan_darah`, `agama`, `alamat`, `telp`, `tempat_lahir`, `tanggal_lahir`, `id_jenis_asuransi`) VALUES
(1, '31028008', '0238012009', 'Kusuma', 'Laki-Laki', 'A', 'Islam', 'Banjarnegara', '-', 'Wonosobo', '1998-05-25', 1);

-- --------------------------------------------------------

--
-- Struktur dari tabel `m_pegawai`
--

CREATE TABLE `m_pegawai` (
  `id_pegawai` int(255) NOT NULL,
  `nomor_identitas` varchar(20) DEFAULT NULL,
  `nomor_kepegawaian` varchar(20) DEFAULT NULL,
  `nama_identitas` varchar(255) DEFAULT NULL,
  `jenis_kelamin` varchar(20) DEFAULT NULL,
  `golongan_darah` varchar(10) DEFAULT NULL,
  `agama` varchar(15) DEFAULT NULL,
  `alamat` text,
  `telp` varchar(20) DEFAULT NULL,
  `tempat_lahir` varchar(30) DEFAULT NULL,
  `tanggal_lahir` date DEFAULT NULL,
  `status_pegawai` varchar(30) DEFAULT NULL,
  `jabatan` varchar(30) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data untuk tabel `m_pegawai`
--

INSERT INTO `m_pegawai` (`id_pegawai`, `nomor_identitas`, `nomor_kepegawaian`, `nama_identitas`, `jenis_kelamin`, `golongan_darah`, `agama`, `alamat`, `telp`, `tempat_lahir`, `tanggal_lahir`, `status_pegawai`, `jabatan`) VALUES
(1, '31028008', '0238012009', 'Bagas Ariefia Pribady', 'Laki-Laki', 'A', 'Islam', 'Banjarnegara', '-', 'Wonosobo', '1998-05-25', 'Aktif', 'Staff');

-- --------------------------------------------------------

--
-- Struktur dari tabel `m_userlogin`
--

CREATE TABLE `m_userlogin` (
  `userloginid` int(11) NOT NULL,
  `usergroup_akses_id` int(11) DEFAULT NULL,
  `usergroup_akses` varchar(20) DEFAULT NULL,
  `username` varchar(20) DEFAULT NULL,
  `email` varchar(50) DEFAULT NULL,
  `password` varchar(100) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Struktur dari tabel `t_layanan_dokter`
--

CREATE TABLE `t_layanan_dokter` (
  `id_layanan_dokter` int(11) NOT NULL,
  `kode_layanan` varchar(20) DEFAULT NULL,
  `id_dokter` int(11) DEFAULT NULL,
  `jam_mulai` varchar(15) DEFAULT NULL,
  `jam_selesai` varchar(15) DEFAULT NULL,
  `istirahat_mulai` varchar(15) DEFAULT NULL,
  `istirahat_selesai` varchar(15) DEFAULT NULL,
  `hari_layanan` varchar(10) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Struktur dari tabel `t_riwayat_obat`
--

CREATE TABLE `t_riwayat_obat` (
  `id_riwayat_obat` int(11) NOT NULL,
  `id_riwayat_sakit` int(11) DEFAULT NULL,
  `id_pasien` int(11) DEFAULT NULL,
  `id_obat` int(11) DEFAULT NULL,
  `harga` decimal(19,4) DEFAULT NULL,
  `jumlah` int(11) DEFAULT NULL,
  `keterangan` longtext,
  `nama_obat` varchar(40) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Struktur dari tabel `t_riwayat_sakit`
--

CREATE TABLE `t_riwayat_sakit` (
  `id_riwayat_sakit` int(11) NOT NULL,
  `id_pasien` int(11) DEFAULT NULL,
  `keluhan` longtext,
  `diagnosa` longtext,
  `anjuran` longtext,
  `keterangan_tambahan` longtext,
  `id_jenis_poli` int(11) DEFAULT NULL,
  `status_pasien` varchar(10) DEFAULT NULL,
  `tanggal_berobat` date DEFAULT NULL,
  `riwayat_sakit_terakhir` longtext
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Indexes for dumped tables
--

--
-- Indeks untuk tabel `m_asuransi_jiwa`
--
ALTER TABLE `m_asuransi_jiwa`
  ADD PRIMARY KEY (`id_asuransi_jiwa`);

--
-- Indeks untuk tabel `m_dokter`
--
ALTER TABLE `m_dokter`
  ADD PRIMARY KEY (`id_dokter`) USING BTREE;

--
-- Indeks untuk tabel `m_jenis_poli`
--
ALTER TABLE `m_jenis_poli`
  ADD PRIMARY KEY (`id_jenis_poli`);

--
-- Indeks untuk tabel `m_obat`
--
ALTER TABLE `m_obat`
  ADD PRIMARY KEY (`id_obat`);

--
-- Indeks untuk tabel `m_pasien`
--
ALTER TABLE `m_pasien`
  ADD PRIMARY KEY (`id_pasien`) USING BTREE;

--
-- Indeks untuk tabel `m_pegawai`
--
ALTER TABLE `m_pegawai`
  ADD PRIMARY KEY (`id_pegawai`);

--
-- Indeks untuk tabel `m_userlogin`
--
ALTER TABLE `m_userlogin`
  ADD PRIMARY KEY (`userloginid`);

--
-- Indeks untuk tabel `t_layanan_dokter`
--
ALTER TABLE `t_layanan_dokter`
  ADD PRIMARY KEY (`id_layanan_dokter`);

--
-- Indeks untuk tabel `t_riwayat_obat`
--
ALTER TABLE `t_riwayat_obat`
  ADD PRIMARY KEY (`id_riwayat_obat`);

--
-- Indeks untuk tabel `t_riwayat_sakit`
--
ALTER TABLE `t_riwayat_sakit`
  ADD PRIMARY KEY (`id_riwayat_sakit`);

--
-- AUTO_INCREMENT untuk tabel yang dibuang
--

--
-- AUTO_INCREMENT untuk tabel `m_asuransi_jiwa`
--
ALTER TABLE `m_asuransi_jiwa`
  MODIFY `id_asuransi_jiwa` int(255) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT untuk tabel `m_dokter`
--
ALTER TABLE `m_dokter`
  MODIFY `id_dokter` int(255) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT untuk tabel `m_jenis_poli`
--
ALTER TABLE `m_jenis_poli`
  MODIFY `id_jenis_poli` int(255) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT untuk tabel `m_obat`
--
ALTER TABLE `m_obat`
  MODIFY `id_obat` int(255) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT untuk tabel `m_pasien`
--
ALTER TABLE `m_pasien`
  MODIFY `id_pasien` int(255) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT untuk tabel `m_pegawai`
--
ALTER TABLE `m_pegawai`
  MODIFY `id_pegawai` int(255) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT untuk tabel `m_userlogin`
--
ALTER TABLE `m_userlogin`
  MODIFY `userloginid` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT untuk tabel `t_layanan_dokter`
--
ALTER TABLE `t_layanan_dokter`
  MODIFY `id_layanan_dokter` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT untuk tabel `t_riwayat_obat`
--
ALTER TABLE `t_riwayat_obat`
  MODIFY `id_riwayat_obat` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT untuk tabel `t_riwayat_sakit`
--
ALTER TABLE `t_riwayat_sakit`
  MODIFY `id_riwayat_sakit` int(11) NOT NULL AUTO_INCREMENT;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
