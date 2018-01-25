-- phpMyAdmin SQL Dump
-- version 4.1.14
-- http://www.phpmyadmin.net
--
-- Host: 127.0.0.1
-- Generation Time: 25 Jan 2018 pada 18.05
-- Versi Server: 5.6.17
-- PHP Version: 5.5.12

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8 */;

--
-- Database: `juniordev`
--

-- --------------------------------------------------------

--
-- Struktur dari tabel `member`
--

CREATE TABLE IF NOT EXISTS `member` (
  `id_member` int(10) NOT NULL AUTO_INCREMENT,
  `nama_lengkap` varchar(255) NOT NULL,
  `gender` varchar(1) NOT NULL,
  `alamat` varchar(255) NOT NULL,
  `username` varchar(255) NOT NULL,
  `password` varchar(255) NOT NULL,
  PRIMARY KEY (`id_member`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=6 ;

--
-- Dumping data untuk tabel `member`
--

INSERT INTO `member` (`id_member`, `nama_lengkap`, `gender`, `alamat`, `username`, `password`) VALUES
(1, 'apip', 'L', 'kuningan jawabarat', 'kurniawan', '16ca55b4f29157780eabc6244f49d442'),
(2, 'ila', 'P', 'jakarta', 'ila', 'aafe26449a364e5d6b5db7dc565a9b6a'),
(3, 'ayu', 'P', 'pemalang', 'ayu', '29c65f781a1068a41f735e1b092546de'),
(4, 'wiki', 'L', 'tambun', 'dwiki', '2314b026f8163ccf63c8897999a57517'),
(5, 'tata', 'L', 'kuningan', 'tata', '49d02d55ad10973b7b9d0dc9eba7fdf0');

-- --------------------------------------------------------

--
-- Struktur dari tabel `pesan`
--

CREATE TABLE IF NOT EXISTS `pesan` (
  `id_pesan` int(10) NOT NULL AUTO_INCREMENT,
  `id_pengirim` int(10) NOT NULL,
  `id_penerima` int(10) NOT NULL,
  `tanggal` date NOT NULL,
  `subyek_pesan` varchar(255) NOT NULL,
  `isi_pesan` longtext NOT NULL,
  `sudah_dibaca` enum('belum','sudah','','') NOT NULL,
  PRIMARY KEY (`id_pesan`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=11 ;

--
-- Dumping data untuk tabel `pesan`
--

INSERT INTO `pesan` (`id_pesan`, `id_pengirim`, `id_penerima`, `tanggal`, `subyek_pesan`, `isi_pesan`, `sudah_dibaca`) VALUES
(1, 3, 1, '2018-01-02', 'halo world haha', 'apa kabar kamu ??', 'sudah'),
(2, 4, 1, '2018-01-03', 'kamu//??', 'lagi apa?', 'sudah'),
(3, 1, 2, '2018-01-16', 'hai', 'lagi apa?', 'sudah'),
(4, 2, 1, '2018-01-16', 'hai juga', 'apip lagi dimana', 'sudah'),
(5, 1, 2, '2018-01-16', 'Re: iya', 'aku lagi di mall', 'sudah'),
(6, 2, 1, '2018-01-21', 'haloo', 'ini pesan dari apip', 'sudah'),
(7, 2, 1, '2018-01-25', 'Re: lagi makan', 'makan sama nasi di goreng', 'sudah'),
(8, 2, 4, '2018-01-25', 'tugas bu win', 'ki gimana tugas udah jadi', 'sudah'),
(9, 1, 4, '2018-01-25', 'nongkrong', 'ki biasa jam 07 otw ya', 'sudah'),
(10, 4, 1, '2018-01-25', 'Re: nongkrong', 'ok pip otw', 'belum');

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
