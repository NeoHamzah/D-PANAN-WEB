-- phpMyAdmin SQL Dump
-- version 5.2.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1:3306
-- Waktu pembuatan: 14 Jun 2024 pada 00.47
-- Versi server: 8.0.35-0ubuntu0.22.04.1
-- Versi PHP: 8.1.27

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `uas222410103044`
--

-- --------------------------------------------------------

--
-- Struktur dari tabel `detail_gedung`
--

CREATE TABLE `detail_gedung` (
  `id_detail` int NOT NULL,
  `nama_lapangan` varchar(100) NOT NULL,
  `gedung_id` int NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;

--
-- Dumping data untuk tabel `detail_gedung`
--

INSERT INTO `detail_gedung` (`id_detail`, `nama_lapangan`, `gedung_id`) VALUES
(1, 'FT 1', 1),
(2, 'FT 2', 1),
(3, 'FT 3', 1),
(4, 'FT 4', 1),
(5, 'FT 5', 1),
(6, 'FT 6', 1),
(7, 'ZO 1', 2),
(8, 'ZO 2', 2),
(9, 'ZO 3', 2),
(10, 'ZO 4', 2),
(11, 'ZO 5', 2),
(12, 'ZO 6', 2),
(13, 'ZO 7', 2),
(14, 'EL 1', 3),
(15, 'EL 2', 3),
(16, 'EL 3', 3),
(17, 'EL 4', 3),
(18, 'EL 5', 3),
(19, 'LP 1', 4),
(20, 'LP 2', 4),
(21, 'LP 3', 4),
(22, 'LP 4', 4),
(23, 'LP 5', 4),
(24, 'LP 6', 4),
(25, 'LP 7', 4),
(26, 'LP 8', 4),
(27, 'AR 1', 5),
(28, 'AR 2', 5),
(29, 'AR 3', 5),
(30, 'AR 4', 5);

-- --------------------------------------------------------

--
-- Struktur dari tabel `gedung`
--

CREATE TABLE `gedung` (
  `id_gedung` int NOT NULL,
  `nama_gedung` varchar(100) NOT NULL,
  `user_id` int NOT NULL,
  `nomor_telepon` varchar(50) NOT NULL,
  `deskripsi_gedung` text NOT NULL,
  `an_rek` text NOT NULL,
  `no_rek` text NOT NULL,
  `harga_lapangan` int NOT NULL,
  `gambar_gedung` varchar(200) NOT NULL,
  `status` varchar(50) NOT NULL,
  `slug` varchar(200) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;

--
-- Dumping data untuk tabel `gedung`
--

INSERT INTO `gedung` (`id_gedung`, `nama_gedung`, `user_id`, `nomor_telepon`, `deskripsi_gedung`, `an_rek`, `no_rek`, `harga_lapangan`, `gambar_gedung`, `status`, `slug`) VALUES
(1, 'Futsalindo', 2, '089787467389', 'Gedung Futsalindo merupakan tempat yang sempurna untuk bermain futsal. Lapangan yang tersedia ada 6 dengan fasilitas yang lengkap dan terjamin kualitasnya. Memiliki lokasi yang strategis di tengah kota Jember yaitu Jl. Mojopahit No. 15, Gerdu, Sempusari, Kec. Kaliwates. \n', 'Amirul Hamzah', 'BRI: 793001013924532', 25000, 'futsalindo.jpg', 'active', 'futsalindo'),
(2, 'Zona Futsal', 3, '087467864536', 'Zona Futsal merupakan gedung olahraga futsal yang memiliki beberapa fasilitas yang lengkap dan memiliki 7 lapangan yang tersedia. Gedung ini terletak di Jl. Hayam Wuruk No. 183, Karang Miuwo, Mangli, Kec. Kaliwates. ', 'Farda Zulfa', 'BNI: 098098761537164', 30000, 'zonafutsal.jpg', 'active', 'zona-futsal'),
(3, 'Elphasindo', 4, '087648937462', 'Elphasindo merupakan fasilitas olahraga modern yang dirancang khusus untuk permainan futsal. Terletak di lokasi yang strategis yaitu Jl. Mastrip No. 59A-N, Krajan Timur, Sumbersari, Kec. Sumbersari, gedung ini menawarkan sarana dan prasarana terbaik untuk mendukung aktivitas futsal baik untuk chilling maupun kompetisi.', 'Ainol Yakin', 'BTN: 876930975912674', 35000, 'elphasindo.png', 'active', 'elphasindo'),
(4, 'Lapangan 8', 5, '087964736523', 'Lapangan 8 adalah gedung olahraga yang secara khusus didesain untuk menyelenggarakan pertandingan dan latihan badminton. Berlokasi di kompleks olahraga kami, gedung ini menjadi pusat kegiatan bagi para pecinta olahraga bulu tangkis. Gedung ini terletak di Jl. Teuku Umar Gg. 8, Tegal Besar Kulon, Tegal Besar, Kec. Kaliwates.', 'Ahmad Hamzah', 'BCA: 768390465829302', 20000, 'lapangan8.jpg', 'active', 'lapangan-8'),
(5, 'Argopuro', 6, '089765473526', 'Argopuro merupakan fasilitas olahraga yang menyediakan fasilitas untuk olahraga badminton baik untuk latihan maupun kompetisi. Gedung ini terletak di Jl. HOS Cokroaminoto No. 5, Kelurahan Jember Kidul, Jember Kidul, Kec. Kaliwates', 'Rezkiya Yakin', 'BSI: 764984750294739', 25000, 'argopuro.jpg', 'active', 'argopuro');

-- --------------------------------------------------------

--
-- Struktur dari tabel `jam`
--

CREATE TABLE `jam` (
  `id_jam` int NOT NULL,
  `jam_sewa` varchar(50) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;

--
-- Dumping data untuk tabel `jam`
--

INSERT INTO `jam` (`id_jam`, `jam_sewa`) VALUES
(1, '07.00-08.00'),
(2, '08.00-09.00'),
(3, '09.00-10.00'),
(4, '10.00-11.00'),
(5, '11.00-12.00'),
(6, '12.00-13.00'),
(7, '13.00-14.00'),
(8, '14.00-15.00'),
(9, '15.00-16.00'),
(10, '16.00-17.00'),
(11, '17.00-18.00'),
(12, '18.00-19.00'),
(13, '19.00-20.00'),
(14, '20.00-21.00'),
(15, '21.00-22.00'),
(16, '22.00-23.00'),
(17, '23.00-00.00');

-- --------------------------------------------------------

--
-- Struktur dari tabel `transaksi`
--

CREATE TABLE `transaksi` (
  `id_transaksi` int NOT NULL,
  `detail_id` int NOT NULL,
  `jam_id` int NOT NULL,
  `user_id` int NOT NULL,
  `tanggal` date NOT NULL,
  `bukti_transfer` varchar(200) NOT NULL,
  `status` varchar(50) CHARACTER SET utf8mb4 COLLATE utf8mb4_0900_ai_ci NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;

--
-- Dumping data untuk tabel `transaksi`
--

INSERT INTO `transaksi` (`id_transaksi`, `detail_id`, `jam_id`, `user_id`, `tanggal`, `bukti_transfer`, `status`) VALUES
(39, 27, 10, 9, '2024-06-13', '66697756f31c5.jpg', 'diterima'),
(40, 27, 11, 9, '2024-06-13', '66697756f31c5.jpg', 'diterima'),
(41, 27, 12, 9, '2024-06-13', '66697756f31c5.jpg', 'diterima'),
(42, 4, 11, 9, '2024-06-20', '666977e76fadb.jpeg', 'diterima'),
(43, 4, 12, 9, '2024-06-20', '666977e76fadb.jpeg', 'diterima'),
(44, 3, 13, 9, '2024-06-20', '666977e76fadb.jpeg', 'diterima'),
(45, 3, 14, 9, '2024-06-20', '666977e76fadb.jpeg', 'diterima'),
(46, 3, 15, 9, '2024-06-20', '666977e76fadb.jpeg', 'diterima'),
(47, 3, 16, 9, '2024-06-20', '666977e76fadb.jpeg', 'diterima'),
(48, 3, 17, 9, '2024-06-20', '666977e76fadb.jpeg', 'diterima'),
(49, 7, 9, 11, '2024-06-22', '666979826eb97.jpg', 'diterima'),
(52, 9, 12, 11, '2024-06-22', '666979826eb97.jpg', 'diterima'),
(53, 11, 13, 11, '2024-06-22', '666979826eb97.jpg', 'diterima'),
(54, 11, 14, 11, '2024-06-22', '666979826eb97.jpg', 'diterima'),
(55, 12, 15, 11, '2024-06-22', '666979826eb97.jpg', 'diterima'),
(56, 12, 16, 11, '2024-06-22', '666979826eb97.jpg', 'diterima'),
(57, 13, 16, 11, '2024-06-22', '666979826eb97.jpg', 'diterima'),
(58, 13, 17, 11, '2024-06-22', '666979826eb97.jpg', 'diterima'),
(59, 1, 10, 7, '2024-06-30', '666994a439219.jpeg', 'diterima'),
(60, 2, 10, 7, '2024-06-30', '666994a439219.jpeg', 'diterima'),
(61, 3, 10, 7, '2024-06-30', '666994a439219.jpeg', 'diterima'),
(62, 4, 10, 7, '2024-06-30', '666994a439219.jpeg', 'diterima'),
(63, 5, 10, 7, '2024-06-30', '666994a439219.jpeg', 'diterima'),
(64, 2, 9, 7, '2024-06-19', '666994ff762d3.jpg', 'diterima'),
(65, 3, 9, 7, '2024-06-19', '666994ff762d3.jpg', 'diterima'),
(66, 2, 10, 7, '2024-06-19', '666994ff762d3.jpg', 'diterima'),
(67, 3, 10, 7, '2024-06-19', '666994ff762d3.jpg', 'diterima'),
(68, 2, 11, 7, '2024-06-19', '666994ff762d3.jpg', 'diterima'),
(69, 1, 9, 7, '2024-06-20', '666996c01b50c.jpeg', 'diterima'),
(70, 2, 9, 7, '2024-06-20', '666996c01b50c.jpeg', 'diterima'),
(71, 3, 9, 7, '2024-06-20', '666996c01b50c.jpeg', 'diterima'),
(72, 4, 9, 7, '2024-06-20', '666996c01b50c.jpeg', 'diterima'),
(73, 5, 9, 7, '2024-06-20', '666996c01b50c.jpeg', 'diterima'),
(74, 1, 6, 7, '2024-06-20', '666996dce36d4.jpg', 'diterima'),
(75, 2, 6, 7, '2024-06-20', '666996dce36d4.jpg', 'diterima'),
(76, 1, 7, 7, '2024-06-20', '666996dce36d4.jpg', 'diterima'),
(77, 2, 7, 7, '2024-06-20', '666996dce36d4.jpg', 'diterima'),
(78, 2, 8, 7, '2024-06-20', '666996dce36d4.jpg', 'diterima'),
(79, 9, 8, 7, '2024-06-22', '66699708706ad.jpeg', 'diterima'),
(80, 10, 8, 7, '2024-06-22', '66699708706ad.jpeg', 'diterima'),
(81, 11, 8, 7, '2024-06-22', '66699708706ad.jpeg', 'diterima'),
(82, 12, 8, 7, '2024-06-22', '66699708706ad.jpeg', 'diterima'),
(83, 13, 8, 7, '2024-06-22', '66699708706ad.jpeg', 'diterima'),
(84, 9, 5, 7, '2024-06-15', '666997248cbcc.jpeg', 'diterima'),
(85, 10, 5, 7, '2024-06-15', '666997248cbcc.jpeg', 'diterima'),
(86, 11, 5, 7, '2024-06-15', '666997248cbcc.jpeg', 'diterima'),
(87, 12, 5, 7, '2024-06-15', '666997248cbcc.jpeg', 'diterima'),
(88, 11, 6, 7, '2024-06-15', '666997248cbcc.jpeg', 'diterima'),
(89, 7, 13, 7, '2024-06-17', '6669973f108d5.jpeg', 'diterima'),
(90, 8, 13, 7, '2024-06-17', '6669973f108d5.jpeg', 'diterima'),
(91, 7, 14, 7, '2024-06-17', '6669973f108d5.jpeg', 'diterima'),
(92, 8, 14, 7, '2024-06-17', '6669973f108d5.jpeg', 'diterima'),
(93, 7, 15, 7, '2024-06-17', '6669973f108d5.jpeg', 'diterima'),
(94, 8, 10, 7, '2024-06-14', '6669977cdc8bc.jpg', 'diterima'),
(95, 9, 10, 7, '2024-06-14', '6669977cdc8bc.jpg', 'diterima'),
(96, 10, 10, 7, '2024-06-14', '6669977cdc8bc.jpg', 'diterima'),
(97, 11, 10, 7, '2024-06-14', '6669977cdc8bc.jpg', 'diterima'),
(98, 12, 10, 7, '2024-06-14', '6669977cdc8bc.jpg', 'diterima'),
(99, 16, 8, 7, '2024-06-15', '6669979b1ebe8.jpeg', 'diterima'),
(100, 16, 9, 7, '2024-06-15', '6669979b1ebe8.jpeg', 'diterima'),
(101, 16, 10, 7, '2024-06-15', '6669979b1ebe8.jpeg', 'diterima'),
(102, 16, 11, 7, '2024-06-15', '6669979b1ebe8.jpeg', 'diterima'),
(103, 17, 12, 7, '2024-06-15', '6669979b1ebe8.jpeg', 'diterima'),
(104, 15, 7, 7, '2024-06-21', '666997b3d13fb.jpg', 'diterima'),
(105, 15, 8, 7, '2024-06-21', '666997b3d13fb.jpg', 'diterima'),
(106, 14, 9, 7, '2024-06-21', '666997b3d13fb.jpg', 'diterima'),
(107, 15, 9, 7, '2024-06-21', '666997b3d13fb.jpg', 'diterima'),
(108, 14, 10, 7, '2024-06-21', '666997b3d13fb.jpg', 'diterima'),
(109, 15, 7, 7, '2024-06-22', '666997d320656.jpg', 'diterima'),
(110, 15, 8, 7, '2024-06-22', '666997d320656.jpg', 'diterima'),
(111, 14, 9, 7, '2024-06-22', '666997d320656.jpg', 'diterima'),
(112, 14, 10, 7, '2024-06-22', '666997d320656.jpg', 'diterima'),
(113, 14, 11, 7, '2024-06-22', '666997d320656.jpg', 'diterima'),
(114, 14, 8, 7, '2024-06-22', '666997ece498a.jpeg', 'diterima'),
(115, 15, 8, 7, '2024-06-22', '666997ece498a.jpeg', 'diterima'),
(116, 14, 9, 7, '2024-06-22', '666997ece498a.jpeg', 'diterima'),
(117, 15, 9, 7, '2024-06-22', '666997ece498a.jpeg', 'diterima'),
(118, 14, 10, 7, '2024-06-22', '666997ece498a.jpeg', 'diterima'),
(119, 19, 9, 7, '2024-06-15', '6669980cc08c8.jpg', 'diterima'),
(120, 19, 10, 7, '2024-06-15', '6669980cc08c8.jpg', 'diterima'),
(121, 19, 12, 7, '2024-06-15', '6669980cc08c8.jpg', 'diterima'),
(122, 19, 14, 7, '2024-06-15', '6669980cc08c8.jpg', 'diterima'),
(123, 19, 15, 7, '2024-06-15', '6669980cc08c8.jpg', 'diterima'),
(124, 19, 12, 7, '2024-06-16', '66699832e6604.jpeg', 'diterima'),
(125, 20, 12, 7, '2024-06-16', '66699832e6604.jpeg', 'diterima'),
(126, 21, 12, 7, '2024-06-16', '66699832e6604.jpeg', 'diterima'),
(127, 19, 13, 7, '2024-06-16', '66699832e6604.jpeg', 'diterima'),
(128, 20, 13, 7, '2024-06-16', '66699832e6604.jpeg', 'diterima'),
(129, 22, 7, 7, '2024-06-22', '6669984eaaaac.jpeg', 'diterima'),
(130, 23, 7, 7, '2024-06-22', '6669984eaaaac.jpeg', 'diterima'),
(131, 24, 7, 7, '2024-06-22', '6669984eaaaac.jpeg', 'diterima'),
(132, 25, 7, 7, '2024-06-22', '6669984eaaaac.jpeg', 'diterima'),
(133, 26, 7, 7, '2024-06-22', '6669984eaaaac.jpeg', 'diterima'),
(134, 19, 9, 7, '2024-06-23', '6669986878fea.jpg', 'diterima'),
(135, 20, 9, 7, '2024-06-23', '6669986878fea.jpg', 'diterima'),
(136, 21, 9, 7, '2024-06-23', '6669986878fea.jpg', 'diterima'),
(137, 19, 10, 7, '2024-06-23', '6669986878fea.jpg', 'diterima'),
(138, 20, 10, 7, '2024-06-23', '6669986878fea.jpg', 'diterima'),
(139, 29, 10, 7, '2024-06-15', '666998887424a.jpeg', 'diterima'),
(140, 30, 10, 7, '2024-06-15', '666998887424a.jpeg', 'diterima'),
(141, 29, 11, 7, '2024-06-15', '666998887424a.jpeg', 'diterima'),
(142, 30, 11, 7, '2024-06-15', '666998887424a.jpeg', 'diterima'),
(143, 30, 12, 7, '2024-06-15', '666998887424a.jpeg', 'diterima'),
(144, 28, 13, 7, '2024-06-16', '666998a412574.jpg', 'diterima'),
(145, 29, 13, 7, '2024-06-16', '666998a412574.jpg', 'diterima'),
(146, 28, 14, 7, '2024-06-16', '666998a412574.jpg', 'diterima'),
(147, 29, 14, 7, '2024-06-16', '666998a412574.jpg', 'diterima'),
(148, 29, 15, 7, '2024-06-16', '666998a412574.jpg', 'diterima'),
(149, 27, 3, 7, '2024-06-27', '666998c5c4374.jpeg', 'diterima'),
(150, 28, 3, 7, '2024-06-27', '666998c5c4374.jpeg', 'diterima'),
(151, 27, 4, 7, '2024-06-27', '666998c5c4374.jpeg', 'diterima'),
(152, 28, 4, 7, '2024-06-27', '666998c5c4374.jpeg', 'diterima'),
(153, 27, 5, 7, '2024-06-27', '666998c5c4374.jpeg', 'diterima'),
(154, 28, 11, 7, '2024-06-24', '666998f800f10.jpeg', 'diterima'),
(155, 28, 12, 7, '2024-06-24', '666998f800f10.jpeg', 'diterima'),
(156, 28, 13, 7, '2024-06-24', '666998f800f10.jpeg', 'diterima'),
(157, 29, 13, 7, '2024-06-24', '666998f800f10.jpeg', 'diterima'),
(158, 29, 14, 7, '2024-06-24', '666998f800f10.jpeg', 'diterima'),
(159, 1, 4, 9, '2024-06-20', '6669994fafd23.jpg', 'diterima'),
(160, 2, 4, 9, '2024-06-20', '6669994fafd23.jpg', 'diterima'),
(161, 3, 4, 9, '2024-06-20', '6669994fafd23.jpg', 'diterima'),
(162, 1, 11, 9, '2024-06-20', '6669994fafd23.jpg', 'diterima'),
(163, 2, 11, 9, '2024-06-20', '6669994fafd23.jpg', 'diterima'),
(164, 3, 11, 9, '2024-06-20', '6669994fafd23.jpg', 'diterima'),
(165, 4, 11, 9, '2024-06-20', '6669994fafd23.jpg', 'diterima'),
(166, 5, 11, 9, '2024-06-20', '6669994fafd23.jpg', 'diterima'),
(167, 2, 12, 9, '2024-06-20', '66699971b9a43.jpeg', 'diterima'),
(168, 2, 13, 9, '2024-06-20', '66699971b9a43.jpeg', 'diterima'),
(169, 3, 14, 9, '2024-06-20', '66699971b9a43.jpeg', 'diterima'),
(170, 4, 14, 9, '2024-06-20', '66699971b9a43.jpeg', 'diterima'),
(171, 5, 15, 9, '2024-06-20', '66699971b9a43.jpeg', 'diterima'),
(172, 28, 11, 9, '2024-06-29', '666999a4c54b4.jpeg', 'diterima'),
(173, 28, 12, 9, '2024-06-29', '666999a4c54b4.jpeg', 'diterima'),
(174, 28, 10, 9, '2024-06-15', '666999c47e2a0.jpeg', 'diterima'),
(175, 28, 11, 9, '2024-06-15', '666999c47e2a0.jpeg', 'diterima'),
(176, 7, 12, 9, '2024-06-15', '66699b6d93775.jpeg', 'diterima'),
(177, 7, 13, 9, '2024-06-15', '66699b6d93775.jpeg', 'diterima'),
(178, 8, 13, 9, '2024-06-15', '66699b6d93775.jpeg', 'diterima'),
(179, 7, 14, 9, '2024-06-15', '66699b6d93775.jpeg', 'diterima'),
(180, 8, 14, 9, '2024-06-15', '66699b6d93775.jpeg', 'diterima'),
(181, 8, 11, 9, '2024-06-15', '66699b87a1ccc.jpg', 'diterima'),
(182, 7, 12, 9, '2024-06-15', '66699b87a1ccc.jpg', 'diterima'),
(183, 7, 13, 9, '2024-06-15', '66699b87a1ccc.jpg', 'diterima'),
(184, 7, 14, 9, '2024-06-15', '66699b87a1ccc.jpg', 'diterima'),
(185, 8, 14, 9, '2024-06-15', '66699b87a1ccc.jpg', 'diterima'),
(186, 7, 9, 9, '2024-06-17', '66699c160d407.jpeg', 'diterima'),
(187, 8, 9, 9, '2024-06-17', '66699c160d407.jpeg', 'diterima'),
(188, 9, 9, 9, '2024-06-17', '66699c160d407.jpeg', 'diterima'),
(189, 8, 10, 9, '2024-06-17', '66699c160d407.jpeg', 'diterima'),
(190, 9, 10, 9, '2024-06-17', '66699c160d407.jpeg', 'diterima'),
(191, 28, 12, 9, '2024-06-21', '6669a56830b8d.jpeg', 'diterima'),
(192, 29, 12, 9, '2024-06-21', '6669a56830b8d.jpeg', 'diterima'),
(193, 30, 12, 9, '2024-06-21', '6669a56830b8d.jpeg', 'diterima'),
(194, 27, 12, 9, '2024-06-17', '6669a5e476f9b.jpeg', 'diterima'),
(195, 28, 12, 9, '2024-06-17', '6669a5e476f9b.jpeg', 'diterima'),
(196, 27, 13, 9, '2024-06-17', '6669a5e476f9b.jpeg', 'diterima'),
(197, 28, 13, 9, '2024-06-17', '6669a5e476f9b.jpeg', 'diterima'),
(198, 28, 14, 9, '2024-06-17', '6669a5e476f9b.jpeg', 'diterima'),
(199, 28, 3, 9, '2024-06-24', '6669a608dd2dc.jpeg', 'diterima'),
(200, 28, 4, 9, '2024-06-24', '6669a608dd2dc.jpeg', 'diterima'),
(201, 29, 4, 9, '2024-06-24', '6669a608dd2dc.jpeg', 'diterima'),
(202, 30, 4, 9, '2024-06-24', '6669a608dd2dc.jpeg', 'diterima'),
(203, 29, 5, 9, '2024-06-24', '6669a608dd2dc.jpeg', 'diterima'),
(204, 14, 9, 9, '2024-06-17', '6669a67a1b4c8.jpg', 'diterima'),
(205, 15, 9, 9, '2024-06-17', '6669a67a1b4c8.jpg', 'diterima'),
(206, 16, 9, 9, '2024-06-17', '6669a67a1b4c8.jpg', 'diterima'),
(207, 14, 10, 9, '2024-06-17', '6669a67a1b4c8.jpg', 'diterima'),
(208, 15, 10, 9, '2024-06-17', '6669a67a1b4c8.jpg', 'diterima'),
(209, 18, 8, 9, '2024-06-14', '6669a69c9ac41.jpeg', 'diterima'),
(210, 17, 9, 9, '2024-06-14', '6669a69c9ac41.jpeg', 'diterima'),
(211, 18, 9, 9, '2024-06-14', '6669a69c9ac41.jpeg', 'diterima'),
(212, 17, 10, 9, '2024-06-14', '6669a69c9ac41.jpeg', 'diterima'),
(213, 18, 10, 9, '2024-06-14', '6669a69c9ac41.jpeg', 'diterima'),
(214, 17, 7, 9, '2024-06-21', '6669a6c5a589a.jpeg', 'diterima'),
(215, 17, 8, 9, '2024-06-21', '6669a6c5a589a.jpeg', 'diterima'),
(216, 18, 8, 9, '2024-06-21', '6669a6c5a589a.jpeg', 'diterima'),
(217, 17, 9, 9, '2024-06-21', '6669a6c5a589a.jpeg', 'diterima'),
(218, 18, 9, 9, '2024-06-21', '6669a6c5a589a.jpeg', 'diterima'),
(219, 14, 9, 9, '2024-06-28', '6669a6e0ed347.jpg', 'diterima'),
(220, 15, 9, 9, '2024-06-28', '6669a6e0ed347.jpg', 'diterima'),
(221, 16, 9, 9, '2024-06-28', '6669a6e0ed347.jpg', 'diterima'),
(222, 17, 9, 9, '2024-06-28', '6669a6e0ed347.jpg', 'diterima'),
(223, 18, 9, 9, '2024-06-28', '6669a6e0ed347.jpg', 'diterima'),
(224, 7, 2, 9, '2024-06-27', '6669a7ad6ab8e.jpeg', 'diterima'),
(225, 8, 2, 9, '2024-06-27', '6669a7ad6ab8e.jpeg', 'diterima'),
(226, 7, 3, 9, '2024-06-27', '6669a7ad6ab8e.jpeg', 'diterima'),
(227, 8, 3, 9, '2024-06-27', '6669a7ad6ab8e.jpeg', 'diterima'),
(228, 7, 4, 9, '2024-06-27', '6669a7ad6ab8e.jpeg', 'diterima'),
(229, 14, 12, 9, '2024-06-17', '6669a8b01b393.jpeg', 'diterima'),
(230, 15, 12, 9, '2024-06-17', '6669a8b01b393.jpeg', 'diterima'),
(231, 16, 12, 9, '2024-06-17', '6669a8b01b393.jpeg', 'diterima'),
(232, 17, 12, 9, '2024-06-17', '6669a8b01b393.jpeg', 'diterima'),
(233, 18, 12, 9, '2024-06-17', '6669a8b01b393.jpeg', 'diterima'),
(234, 1, 2, 10, '2024-06-22', '6669ab461bda5.jpg', 'diterima'),
(235, 2, 2, 10, '2024-06-22', '6669ab461bda5.jpg', 'diterima'),
(236, 3, 2, 10, '2024-06-22', '6669ab461bda5.jpg', 'diterima'),
(237, 4, 2, 10, '2024-06-22', '6669ab461bda5.jpg', 'diterima'),
(238, 5, 2, 10, '2024-06-22', '6669ab461bda5.jpg', 'diterima'),
(239, 1, 2, 10, '2024-06-28', '6669ab6b93800.jpeg', 'diterima'),
(240, 2, 2, 10, '2024-06-28', '6669ab6b93800.jpeg', 'diterima'),
(241, 1, 3, 10, '2024-06-28', '6669ab6b93800.jpeg', 'diterima'),
(242, 2, 3, 10, '2024-06-28', '6669ab6b93800.jpeg', 'diterima'),
(243, 3, 3, 10, '2024-06-28', '6669ab6b93800.jpeg', 'diterima'),
(244, 4, 6, 10, '2024-06-25', '6669ab9112e65.jpeg', 'diterima'),
(245, 5, 6, 10, '2024-06-25', '6669ab9112e65.jpeg', 'diterima'),
(246, 4, 7, 10, '2024-06-25', '6669ab9112e65.jpeg', 'diterima'),
(247, 5, 7, 10, '2024-06-25', '6669ab9112e65.jpeg', 'diterima'),
(248, 5, 8, 10, '2024-06-25', '6669ab9112e65.jpeg', 'diterima'),
(249, 1, 3, 10, '2024-06-23', '6669abdfdaeae.jpeg', 'diterima'),
(250, 2, 3, 10, '2024-06-23', '6669abdfdaeae.jpeg', 'diterima'),
(251, 3, 3, 10, '2024-06-23', '6669abdfdaeae.jpeg', 'diterima'),
(252, 4, 3, 10, '2024-06-23', '6669abdfdaeae.jpeg', 'diterima'),
(253, 5, 3, 10, '2024-06-23', '6669abdfdaeae.jpeg', 'diterima'),
(254, 1, 12, 10, '2024-06-15', '6669ac221d951.jpg', 'diterima'),
(255, 2, 12, 10, '2024-06-15', '6669ac221d951.jpg', 'diterima'),
(256, 1, 13, 10, '2024-06-15', '6669ac221d951.jpg', 'diterima'),
(257, 2, 13, 10, '2024-06-15', '6669ac221d951.jpg', 'diterima'),
(258, 1, 14, 10, '2024-06-15', '6669ac221d951.jpg', 'diterima'),
(259, 7, 6, 10, '2024-06-20', '6669ac6316f5c.jpeg', 'diterima'),
(260, 7, 7, 10, '2024-06-20', '6669ac6316f5c.jpeg', 'diterima'),
(261, 8, 7, 10, '2024-06-20', '6669ac6316f5c.jpeg', 'diterima'),
(262, 7, 8, 10, '2024-06-20', '6669ac6316f5c.jpeg', 'diterima'),
(263, 8, 8, 10, '2024-06-20', '6669ac6316f5c.jpeg', 'diterima'),
(264, 7, 8, 10, '2024-06-25', '6669acc5bbc3b.jpeg', 'diterima'),
(265, 8, 8, 10, '2024-06-25', '6669acc5bbc3b.jpeg', 'diterima'),
(266, 7, 9, 10, '2024-06-25', '6669acc5bbc3b.jpeg', 'diterima'),
(267, 8, 9, 10, '2024-06-25', '6669acc5bbc3b.jpeg', 'diterima'),
(268, 7, 10, 10, '2024-06-25', '6669acc5bbc3b.jpeg', 'diterima'),
(269, 7, 12, 10, '2024-06-23', '6669ad19c863d.jpg', 'diterima'),
(270, 8, 12, 10, '2024-06-23', '6669ad19c863d.jpg', 'diterima'),
(271, 7, 13, 10, '2024-06-23', '6669ad19c863d.jpg', 'diterima'),
(272, 8, 13, 10, '2024-06-23', '6669ad19c863d.jpg', 'diterima'),
(273, 7, 14, 10, '2024-06-23', '6669ad19c863d.jpg', 'diterima'),
(274, 9, 5, 10, '2024-06-29', '6669ad321a534.jpg', 'diterima'),
(275, 10, 5, 10, '2024-06-29', '6669ad321a534.jpg', 'diterima'),
(276, 11, 5, 10, '2024-06-29', '6669ad321a534.jpg', 'diterima'),
(277, 12, 5, 10, '2024-06-29', '6669ad321a534.jpg', 'diterima'),
(278, 13, 5, 10, '2024-06-29', '6669ad321a534.jpg', 'diterima'),
(279, 14, 6, 10, '2024-06-15', '6669ad5ca1b4b.jpeg', 'diterima'),
(280, 15, 6, 10, '2024-06-15', '6669ad5ca1b4b.jpeg', 'diterima'),
(281, 14, 7, 10, '2024-06-15', '6669ad5ca1b4b.jpeg', 'diterima'),
(282, 15, 7, 10, '2024-06-15', '6669ad5ca1b4b.jpeg', 'diterima'),
(283, 14, 8, 10, '2024-06-15', '6669ad5ca1b4b.jpeg', 'diterima'),
(284, 14, 14, 10, '2024-06-21', '6669ad845b87c.jpeg', 'diterima'),
(285, 15, 14, 10, '2024-06-21', '6669ad845b87c.jpeg', 'diterima'),
(286, 16, 14, 10, '2024-06-21', '6669ad845b87c.jpeg', 'diterima'),
(287, 17, 14, 10, '2024-06-21', '6669ad845b87c.jpeg', 'diterima'),
(288, 18, 14, 10, '2024-06-21', '6669ad845b87c.jpeg', 'diterima'),
(289, 14, 9, 10, '2024-06-30', '6669adb5968ee.jpg', 'diterima'),
(290, 15, 9, 10, '2024-06-30', '6669adb5968ee.jpg', 'diterima'),
(291, 16, 9, 10, '2024-06-30', '6669adb5968ee.jpg', 'diterima'),
(292, 15, 10, 10, '2024-06-30', '6669adb5968ee.jpg', 'diterima'),
(293, 16, 10, 10, '2024-06-30', '6669adb5968ee.jpg', 'diterima'),
(294, 14, 14, 10, '2024-06-17', '6669adcb087dc.jpg', 'diterima'),
(295, 15, 14, 10, '2024-06-17', '6669adcb087dc.jpg', 'diterima'),
(296, 16, 14, 10, '2024-06-17', '6669adcb087dc.jpg', 'diterima'),
(297, 17, 14, 10, '2024-06-17', '6669adcb087dc.jpg', 'diterima'),
(298, 16, 15, 10, '2024-06-17', '6669adcb087dc.jpg', 'diterima'),
(299, 20, 6, 10, '2024-06-27', '6669ae2a34d4b.jpg', 'diterima'),
(300, 21, 6, 10, '2024-06-27', '6669ae2a34d4b.jpg', 'diterima'),
(301, 19, 7, 10, '2024-06-27', '6669ae2a34d4b.jpg', 'diterima'),
(302, 20, 7, 10, '2024-06-27', '6669ae2a34d4b.jpg', 'diterima'),
(303, 21, 7, 10, '2024-06-27', '6669ae2a34d4b.jpg', 'diterima'),
(304, 27, 14, 11, '2024-06-20', '6669b01b051bc.jpeg', 'diterima'),
(305, 28, 14, 11, '2024-06-20', '6669b01b051bc.jpeg', 'diterima'),
(306, 27, 5, 11, '2024-06-22', '6669b02f25b39.jpeg', 'diterima'),
(307, 28, 5, 11, '2024-06-22', '6669b02f25b39.jpeg', 'diterima'),
(308, 29, 5, 11, '2024-06-22', '6669b02f25b39.jpeg', 'diterima'),
(309, 27, 6, 11, '2024-06-22', '6669b02f25b39.jpeg', 'diterima'),
(310, 28, 6, 11, '2024-06-22', '6669b02f25b39.jpeg', 'diterima');

-- --------------------------------------------------------

--
-- Struktur dari tabel `users`
--

CREATE TABLE `users` (
  `id_user` int NOT NULL,
  `email` varchar(50) NOT NULL,
  `username` varchar(50) NOT NULL,
  `password` varchar(100) NOT NULL,
  `role` varchar(100) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;

--
-- Dumping data untuk tabel `users`
--

INSERT INTO `users` (`id_user`, `email`, `username`, `password`, `role`) VALUES
(1, 'admin@gmail.com', 'admin', '$2y$10$VHdxkET/AwPf.07S8FUaL..0kt7TDh9CqY2EidSG2LgyOaxGViFvO', 'admin'),
(2, 'futsalindo@gmail.com', 'futsalindo', '$2y$10$yl02kh1.TG46mdqEuy2L3ux5/FglXzAeHkmIzwVUaXJoIa1K6pu4O', 'owner'),
(3, 'zonafutsal@gmail.com', 'zonafutsal', '$2y$10$txzNAVeIS8y1OHNc/YC1IuHYQWZKIyuEOtQylOS/eAzB2J3PWeUfu', 'owner'),
(4, 'elphasindo@gmail.com', 'elphasindo', '$2y$10$hU4ji1PaATkVZW76WzTRP.O2jW5BtAuks/bM0FjQc9HETCs5YyXKi', 'owner'),
(5, 'lapangan8@gmail.com', 'lapangan8', '$2y$10$9pIzcEjvoOaIl5fLreMVa.th0PkWq1C6pAfBEyWAFO35zGl0Rg5am', 'owner'),
(6, 'argopuro@gmail.com', 'argopuro', '$2y$10$LC2F8P7OkvyFGeAapvs4w.fnHhU6Si83dSkhdCr2j.QuNsA0km25K', 'owner'),
(7, 'hamzah@gmail.com', 'hamzah', '$2y$10$XbgXKN9gGr4GTlbv7Jnz4eKi4iLgHZ0PShkgmZ57N2orlF7bz59YO', 'renter'),
(9, 'ainol@gmail.com', 'ainol', '$2y$10$tdvo/i40WqAlbrPK74Qb2etHLgqjKmnO/y0qZ9DofntqBMPmUPqG6', 'renter'),
(10, 'edok@gmail.com', 'edok', '$2y$10$MpEc1qjJ.gnHUSG.vLKglOrKcGgtf8Ltp1djfpdSVGi7LLzeTv5qq', 'renter'),
(11, 'kenol7910@gmail.com', 'azam', '$2y$10$6beqAYDemC4bCMz/Q/.Lr..1XnN08KQhiYGTNTCWT20lsKnFdIANi', 'renter');

--
-- Indexes for dumped tables
--

--
-- Indeks untuk tabel `detail_gedung`
--
ALTER TABLE `detail_gedung`
  ADD PRIMARY KEY (`id_detail`),
  ADD KEY `gedung_id` (`gedung_id`);

--
-- Indeks untuk tabel `gedung`
--
ALTER TABLE `gedung`
  ADD PRIMARY KEY (`id_gedung`),
  ADD KEY `user_id` (`user_id`);

--
-- Indeks untuk tabel `jam`
--
ALTER TABLE `jam`
  ADD PRIMARY KEY (`id_jam`);

--
-- Indeks untuk tabel `transaksi`
--
ALTER TABLE `transaksi`
  ADD PRIMARY KEY (`id_transaksi`),
  ADD KEY `detail_id` (`detail_id`),
  ADD KEY `jam_id` (`jam_id`),
  ADD KEY `user_id` (`user_id`);

--
-- Indeks untuk tabel `users`
--
ALTER TABLE `users`
  ADD PRIMARY KEY (`id_user`);

--
-- AUTO_INCREMENT untuk tabel yang dibuang
--

--
-- AUTO_INCREMENT untuk tabel `detail_gedung`
--
ALTER TABLE `detail_gedung`
  MODIFY `id_detail` int NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=31;

--
-- AUTO_INCREMENT untuk tabel `gedung`
--
ALTER TABLE `gedung`
  MODIFY `id_gedung` int NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;

--
-- AUTO_INCREMENT untuk tabel `jam`
--
ALTER TABLE `jam`
  MODIFY `id_jam` int NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=18;

--
-- AUTO_INCREMENT untuk tabel `transaksi`
--
ALTER TABLE `transaksi`
  MODIFY `id_transaksi` int NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=314;

--
-- AUTO_INCREMENT untuk tabel `users`
--
ALTER TABLE `users`
  MODIFY `id_user` int NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=13;

--
-- Ketidakleluasaan untuk tabel pelimpahan (Dumped Tables)
--

--
-- Ketidakleluasaan untuk tabel `detail_gedung`
--
ALTER TABLE `detail_gedung`
  ADD CONSTRAINT `detail_gedung_ibfk_1` FOREIGN KEY (`gedung_id`) REFERENCES `gedung` (`id_gedung`) ON DELETE RESTRICT ON UPDATE RESTRICT;

--
-- Ketidakleluasaan untuk tabel `gedung`
--
ALTER TABLE `gedung`
  ADD CONSTRAINT `gedung_ibfk_1` FOREIGN KEY (`user_id`) REFERENCES `users` (`id_user`) ON DELETE RESTRICT ON UPDATE RESTRICT;

--
-- Ketidakleluasaan untuk tabel `transaksi`
--
ALTER TABLE `transaksi`
  ADD CONSTRAINT `transaksi_ibfk_1` FOREIGN KEY (`detail_id`) REFERENCES `detail_gedung` (`id_detail`) ON DELETE RESTRICT ON UPDATE RESTRICT,
  ADD CONSTRAINT `transaksi_ibfk_2` FOREIGN KEY (`jam_id`) REFERENCES `jam` (`id_jam`) ON DELETE RESTRICT ON UPDATE RESTRICT,
  ADD CONSTRAINT `transaksi_ibfk_3` FOREIGN KEY (`user_id`) REFERENCES `users` (`id_user`) ON DELETE RESTRICT ON UPDATE RESTRICT;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
