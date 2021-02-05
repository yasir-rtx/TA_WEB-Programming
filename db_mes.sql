-- phpMyAdmin SQL Dump
-- version 5.0.2
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Waktu pembuatan: 05 Feb 2021 pada 12.04
-- Versi server: 10.4.14-MariaDB
-- Versi PHP: 7.4.10

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `db_mes`
--

-- --------------------------------------------------------

--
-- Struktur dari tabel `admin`
--

CREATE TABLE `admin` (
  `id_admin` int(11) NOT NULL,
  `username` varchar(16) NOT NULL,
  `password` varchar(16) NOT NULL,
  `name` varchar(100) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data untuk tabel `admin`
--

INSERT INTO `admin` (`id_admin`, `username`, `password`, `name`) VALUES
(1, 'admin', 'admin', 'Administrator');

-- --------------------------------------------------------

--
-- Struktur dari tabel `gejala`
--

CREATE TABLE `gejala` (
  `id_gejala` int(11) NOT NULL,
  `kode_gejala` varchar(3) NOT NULL,
  `gejala` varchar(500) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data untuk tabel `gejala`
--

INSERT INTO `gejala` (`id_gejala`, `kode_gejala`, `gejala`) VALUES
(1, 'G01', 'Bercak kemerahan'),
(2, 'G02', 'Berkeringat'),
(3, 'G03', 'Bintik-bintik merah'),
(4, 'G04', 'Demam'),
(5, 'G05', 'Diare'),
(6, 'G06', 'Lelah'),
(7, 'G07', 'Mata kuning'),
(8, 'G08', 'Menggigil'),
(9, 'G09', 'Mimisan'),
(10, 'G10', 'Mual'),
(11, 'G11', 'Muntah'),
(12, 'G12', 'Nafsu makan berkurang'),
(13, 'G13', 'Nyeri otot'),
(14, 'G14', 'Penurunan kesadaran\r\n'),
(15, 'G15', 'Pusing'),
(16, 'G16', 'Sakit kepala'),
(17, 'G17', 'Sakit persendian'),
(18, 'G18', 'Susah buang air besar'),
(19, 'G19', 'Terasa nyeri sendi');

-- --------------------------------------------------------

--
-- Struktur dari tabel `history`
--

CREATE TABLE `history` (
  `id_history` int(11) NOT NULL,
  `id_anggota` int(11) NOT NULL,
  `waktu` datetime NOT NULL DEFAULT '0000-00-00 00:00:00',
  `CF_P01` float NOT NULL,
  `CF_P02` float NOT NULL,
  `CF_P03` float NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data untuk tabel `history`
--

INSERT INTO `history` (`id_history`, `id_anggota`, `waktu`, `CF_P01`, `CF_P02`, `CF_P03`) VALUES
(1019, 2, '2021-01-31 22:26:33', 0, 0, 0),
(1020, 2, '2021-01-31 22:31:53', 0, 0, 0),
(1021, 2, '2021-01-31 22:32:30', 0, 0, 0),
(1022, 2, '2021-01-31 22:33:11', 0, 0, 0),
(1023, 2, '2021-01-31 22:34:01', 26.44, 41.2, 85),
(1024, 2, '2021-01-31 22:36:08', 0, 0, 0),
(1025, 2, '2021-01-31 22:36:17', 0, 0, 0),
(1026, 2, '2021-01-31 22:37:32', 0, 0, 0),
(1027, 2, '2021-01-31 22:52:17', 39.23, 36.37, 84),
(1028, 4, '2021-02-01 10:23:12', 0, 0, 0),
(1029, 4, '2021-02-01 10:24:02', 55.17, 54.51, 100),
(1030, 1, '2021-02-01 10:35:33', 0, 0, 0),
(1031, 1, '0000-00-00 00:00:00', 3.26, 9.68, 100),
(1032, 1, '2021-02-01 11:37:40', 0, 0, 0),
(1033, 1, '2021-02-01 11:38:34', 13.59, 25.71, 100),
(1034, 1, '2021-02-01 11:45:29', 37.05, 9.68, 100),
(1035, 1, '2021-02-01 11:49:49', 22.4, 27.23, 60.8),
(1036, 1, '2021-02-01 12:47:34', 22.4, 27.23, 30.57),
(1037, 4, '2021-02-04 15:56:26', 0, 0, 0),
(1038, 1, '2021-02-04 16:40:49', 0, 0, 0),
(1039, 1, '2021-02-04 16:43:39', 12.07, 22.7, 12.27);

-- --------------------------------------------------------

--
-- Struktur dari tabel `penyakit`
--

CREATE TABLE `penyakit` (
  `id_penyakit` int(11) NOT NULL,
  `kode_penyakit` varchar(3) NOT NULL,
  `penyakit` varchar(500) NOT NULL,
  `pasien` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data untuk tabel `penyakit`
--

INSERT INTO `penyakit` (`id_penyakit`, `kode_penyakit`, `penyakit`, `pasien`) VALUES
(1, 'P01', 'Demam berdarah', 89),
(2, 'P02', 'Malaria', 56),
(3, 'P03', 'Chikungunya', 22);

-- --------------------------------------------------------

--
-- Struktur dari tabel `questions`
--

CREATE TABLE `questions` (
  `id_quest` int(11) NOT NULL,
  `kode_quest` varchar(3) NOT NULL,
  `question` varchar(500) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data untuk tabel `questions`
--

INSERT INTO `questions` (`id_quest`, `kode_quest`, `question`) VALUES
(1, 'Q01', 'Apakah muncul bercak-bercak kemerahan pada permukaan kulit anda?'),
(2, 'Q02', 'Apakah Anda mudah berkeringat ?'),
(3, 'Q03', 'Apakah muncul bintik-bintik kemerahan di permukaan kulit Anda ?'),
(4, 'Q04', 'Apakah Anda mengalami demam ?'),
(5, 'Q05', 'Apakah Anda mengalami diare ?'),
(6, 'Q06', 'Apakah Anda sering merasa lelah ?'),
(7, 'Q07', 'Apakah mata anda kuning ?'),
(8, 'Q08', 'Apakah Anda sering menggigil ?'),
(9, 'Q09', 'Apakah akhir-akhir ini Anda sering mimisan ?'),
(10, 'Q10', 'Apakah Anda merasakan mual ?'),
(11, 'Q11', 'Apakah Anda sering muntah ?'),
(12, 'Q12', 'Apakah nafsu makan Anda berkurang ?'),
(13, 'Q13', 'Apakah otot Anda terasa nyeri ?'),
(14, 'Q14', 'Apakah Anda mengalami penurunan kesadaran ?'),
(15, 'Q15', 'Apakah kepala Anda terasa pusing ?'),
(16, 'Q16', 'Apakah kepala Anda terasa sakit ?'),
(17, 'Q17', 'Apakah Anda merasakan sakit pada persendian ?'),
(18, 'Q18', 'Apakah Anda susah buang air besar ?'),
(19, 'Q19', 'Apakah sendi Anda sering terasa nyeri ?');

-- --------------------------------------------------------

--
-- Struktur dari tabel `rule`
--

CREATE TABLE `rule` (
  `id_rule` int(11) NOT NULL,
  `kode_rule` varchar(3) NOT NULL,
  `rule` varchar(100) NOT NULL,
  `id_penyakit` int(11) NOT NULL,
  `pasien` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data untuk tabel `rule`
--

INSERT INTO `rule` (`id_rule`, `kode_rule`, `rule`, `id_penyakit`, `pasien`) VALUES
(1, 'R01', 'G03 AND G04 AND G06 AND G09 AND G15', 1, 29),
(2, 'R02', 'G03 AND G06 AND G15 AND G19', 1, 37),
(3, 'R03', 'G03 AND G04 AND G09 AND G12 AND G18', 1, 23),
(4, 'R04', 'G02 AND G03 AND G04 AND G08', 2, 20),
(5, 'R05', 'G03 AND G04 AND G07 AND G16', 2, 25),
(6, 'R06', 'G03 AND G05 AND G06 AND G10 AND G11', 2, 11),
(7, 'G07', 'G01 AND G06 AND G14 AND G16 AND G17', 3, 8),
(8, 'R08', 'G01 AND G04 AND G16 AND G17 ', 3, 5),
(9, 'R09', 'G01 AND G04 G11 AND G13', 3, 9);

-- --------------------------------------------------------

--
-- Struktur dari tabel `user`
--

CREATE TABLE `user` (
  `id_user` int(11) NOT NULL,
  `username` varchar(20) NOT NULL,
  `password` varchar(16) NOT NULL,
  `name` varchar(100) NOT NULL,
  `jk` char(1) NOT NULL,
  `email` varchar(100) NOT NULL,
  `nohp` varchar(12) NOT NULL,
  `terdaftar` datetime NOT NULL DEFAULT '0000-00-00 00:00:00'
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data untuk tabel `user`
--

INSERT INTO `user` (`id_user`, `username`, `password`, `name`, `jk`, `email`, `nohp`, `terdaftar`) VALUES
(1, 'user', 'user', 'user', 'l', 'user@user.com', '081234567890', '2021-01-30 23:48:41'),
(2, 'yelf', '112358', 'yelf van lie', 'l', 'yelfvanliechanstain@gmail.com', '081240125792', '2021-01-31 00:48:49'),
(4, 'admin', 'admin', 'admin', 'l', 'admin@admin.com', '082142147121', '2021-01-31 00:52:53');

--
-- Indexes for dumped tables
--

--
-- Indeks untuk tabel `admin`
--
ALTER TABLE `admin`
  ADD PRIMARY KEY (`id_admin`);

--
-- Indeks untuk tabel `gejala`
--
ALTER TABLE `gejala`
  ADD PRIMARY KEY (`id_gejala`);

--
-- Indeks untuk tabel `history`
--
ALTER TABLE `history`
  ADD PRIMARY KEY (`id_history`);

--
-- Indeks untuk tabel `penyakit`
--
ALTER TABLE `penyakit`
  ADD PRIMARY KEY (`id_penyakit`);

--
-- Indeks untuk tabel `questions`
--
ALTER TABLE `questions`
  ADD PRIMARY KEY (`id_quest`);

--
-- Indeks untuk tabel `rule`
--
ALTER TABLE `rule`
  ADD PRIMARY KEY (`id_rule`);

--
-- Indeks untuk tabel `user`
--
ALTER TABLE `user`
  ADD PRIMARY KEY (`id_user`);

--
-- AUTO_INCREMENT untuk tabel yang dibuang
--

--
-- AUTO_INCREMENT untuk tabel `admin`
--
ALTER TABLE `admin`
  MODIFY `id_admin` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT untuk tabel `gejala`
--
ALTER TABLE `gejala`
  MODIFY `id_gejala` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=21;

--
-- AUTO_INCREMENT untuk tabel `history`
--
ALTER TABLE `history`
  MODIFY `id_history` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=1040;

--
-- AUTO_INCREMENT untuk tabel `penyakit`
--
ALTER TABLE `penyakit`
  MODIFY `id_penyakit` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- AUTO_INCREMENT untuk tabel `questions`
--
ALTER TABLE `questions`
  MODIFY `id_quest` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=21;

--
-- AUTO_INCREMENT untuk tabel `rule`
--
ALTER TABLE `rule`
  MODIFY `id_rule` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=11;

--
-- AUTO_INCREMENT untuk tabel `user`
--
ALTER TABLE `user`
  MODIFY `id_user` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
