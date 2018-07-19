-- phpMyAdmin SQL Dump
-- version 4.8.0.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Waktu pembuatan: 16 Jul 2018 pada 09.38
-- Versi server: 10.1.32-MariaDB
-- Versi PHP: 7.2.5

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET AUTOCOMMIT = 0;
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `db_tour`
--

-- --------------------------------------------------------

--
-- Struktur dari tabel `admin`
--

CREATE TABLE `admin` (
  `id_admin` int(10) NOT NULL,
  `nama_admin` varchar(30) DEFAULT NULL,
  `username` varchar(20) DEFAULT NULL,
  `password` varchar(100) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data untuk tabel `admin`
--

INSERT INTO `admin` (`id_admin`, `nama_admin`, `username`, `password`) VALUES
(1, 'Admin', 'admin', 'd033e22ae348aeb5660fc2140aec35850c4da997');

-- --------------------------------------------------------

--
-- Struktur dari tabel `detail_tempat_makan`
--

CREATE TABLE `detail_tempat_makan` (
  `id_dtmakan` int(11) NOT NULL,
  `id_tempat` int(10) NOT NULL,
  `latitude` varchar(20) NOT NULL,
  `longitude` varchar(20) NOT NULL,
  `alamat` longtext NOT NULL,
  `lokasi_kabkot` int(2) DEFAULT NULL,
  `lokasi_kecamatan` int(5) DEFAULT NULL,
  `jarak_ke_kota` int(11) NOT NULL,
  `jam_buka` time DEFAULT NULL,
  `jam_tutup` time DEFAULT NULL,
  `foto_tempat1` varchar(100) DEFAULT NULL,
  `foto_tempat2` varchar(100) DEFAULT NULL,
  `foto_tempat3` varchar(100) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data untuk tabel `detail_tempat_makan`
--

INSERT INTO `detail_tempat_makan` (`id_dtmakan`, `id_tempat`, `latitude`, `longitude`, `alamat`, `lokasi_kabkot`, `lokasi_kecamatan`, `jarak_ke_kota`, `jam_buka`, `jam_tutup`, `foto_tempat1`, `foto_tempat2`, `foto_tempat3`) VALUES
(1, 1, '-7.966785', '112.619843', 'Jalan Pahlawan Trip No.4 & 5, Oro-oro Dowo, Klojen', 75, 3, 3, '11:00:00', '00:00:00', 'wupnormal_ptrip_1.jpg', 'wupnormal_ptrip_2.jpg', 'wupnormal_ptrip_3.jpg'),
(2, 1, '-7.938753', '112.633729', 'Jl. Borobudur, Mojolangu, Kec. Lowokwaru', 75, 4, 7, '11:00:00', '04:00:00', 'wupnormal_brbd_1.jpg', 'wupnormal_brbd_2.jpg', 'wupnormal_brbd_3.jpg'),
(3, 2, '-7.96558', '112.620534', 'Jl. Jakarta, Oro-oro Dowo, Klojen', 75, 3, 3, '07:30:00', '02:30:00', 'javadancer_1.jpg', 'javadancer_2.jpg', 'javadancer_3.jpg'),
(4, 3, '-7.961696', '112.6237', 'Jl. Bandung No.5, Penanggungan, Klojen', 75, 3, 4, '10:00:00', '02:00:00', 'riadjenakamlg_1.jpg', 'riadjenakamlg_2.jpg', 'riadjenakamlg_3.jpg'),
(5, 3, '-7.896428', '112.554141', 'Jl. Ir. Soekarno No.142, Beji, Junrejo, Kota Batu', 71, 1, 5, '09:00:00', '01:00:00', NULL, NULL, NULL),
(6, 4, '-7.965809', '112.608714', 'Jl. Raya Tidar No.36, Karangbesuki, Sukun', 75, 5, 4, '07:00:00', '11:00:00', 'goldenher_1.jpg', 'goldenher_2.jpg', NULL),
(7, 5, '-7.964556', '112.635524', 'Jl. Letjen Sutoyo No.2, Rampal Celaket, Klojen', 75, 3, 3, '11:00:00', '02:00:00', NULL, NULL, NULL),
(8, 6, '-7.938888', '112.590281', 'Jl. Joyo Agung No.1, Tlogomas, Kec. Lowokwaru', 75, 4, 9, '16:00:00', '00:00:00', NULL, NULL, NULL),
(9, 7, '-7.941221', '112.623232', 'Jalan Soekarno Hatta Blok DP No.1-2, Mojolangu, Kecamatan Lowokwaru', 75, 4, 7, '11:00:00', '00:00:00', NULL, NULL, NULL),
(10, 8, '-7.979856', '112.626412', 'Jalan Arjuno No.2, Kauman, Klojen, Kauman, Klojen', 75, 3, 1, '10:00:00', '23:30:00', NULL, NULL, NULL),
(11, 8, '-7.966134', '112.624314', 'Jl. Besar Ijen No.77A, Oro-oro Dowo, Klojen', 75, 3, 3, '00:00:00', '12:00:00', NULL, NULL, NULL),
(12, 9, '-7.963239', '112.6256', 'Jl. Besar Ijen No.90-92, Oro-oro Dowo, Klojen', 75, 3, 3, '18:30:00', '01:00:00', NULL, NULL, NULL),
(13, 10, '-7.945725', '112.618759', 'Jalan Soekarno Hatta No.24, Jatimulyo, Kecamatan Lowokwaru', 75, 4, 7, '11:00:00', '23:00:00', NULL, NULL, NULL),
(14, 10, '-7.971742', '112.624739', 'Jl. Merapi No.5, Oro-oro Dowo, Klojen, Kota Malang', 75, 3, 3, '11:00:00', '23:00:00', NULL, NULL, NULL),
(15, 10, '-7.921175', '112.594898', 'Ruko Tlogomas, Jl. Raya Tlogomas No.37, Tlogomas, Kec. Lowokwaru, Kota Malang', 75, 4, 10, '11:00:00', '23:00:00', NULL, NULL, NULL);

-- --------------------------------------------------------

--
-- Struktur dari tabel `hotel_penginapan`
--

CREATE TABLE `hotel_penginapan` (
  `id_tempat` int(10) NOT NULL,
  `nama_tempat` varchar(30) NOT NULL,
  `latitude` varchar(20) NOT NULL,
  `longitude` varchar(20) NOT NULL,
  `alamat` longtext NOT NULL,
  `lokasi_kabkot` int(2) DEFAULT NULL,
  `lokasi_kecamatan` int(5) DEFAULT NULL,
  `jarak_ke_kota` int(3) NOT NULL,
  `jenis` varchar(3) NOT NULL,
  `foto_tempat1` varchar(100) DEFAULT NULL,
  `foto_tempat2` varchar(100) DEFAULT NULL,
  `foto_tempat3` varchar(100) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data untuk tabel `hotel_penginapan`
--

INSERT INTO `hotel_penginapan` (`id_tempat`, `nama_tempat`, `latitude`, `longitude`, `alamat`, `lokasi_kabkot`, `lokasi_kecamatan`, `jarak_ke_kota`, `jenis`, `foto_tempat1`, `foto_tempat2`, `foto_tempat3`) VALUES
(1, 'Hotel Savana', '-7.962433', '112.636159', 'Jl. Letjen Sutoyo No.30-34, Rampal Celaket, Klojen, Kota Malang', 75, 3, 4, 'J11', 'savana_1.jpg', 'savana_2.jpg', 'savana_3.jpg'),
(2, 'Best Western OJ Hotel', '-7.967947', '112.635149', 'Jl. Dr. Cipto No.11, Rampal Celaket, Klojen, Kota Malang', 75, 3, 3, 'J11', 'bestwestern_1.jpg', 'bestwestern_2.jpg', 'bestwestern_3.jpg'),
(3, 'Hotel Ibis Style', '-7.952606', '112.638928', 'Jl. Letjend S. Parman No.45, Purwantoro, Blimbing, Kota Malang', 75, 1, 5, 'J11', 'ibis_1.jpg', 'ibis_2.jpg', 'ibis_3.jpg'),
(4, 'Max One Hotel', '-7.965877', '112.633880', 'Jalan Jaksa Agung Suprapto II No.75, Rampal Celaket, Klojen, Kota Malang', 75, 3, 3, 'J11', 'maxone_1.jpg', 'maxone_2.jpg', 'maxone_3.jpg'),
(5, 'Hotel Swiss Bellin', '-7.955756', '112.618674', 'Jalan Veteran No.8A, Penanggungan, Klojen, Kota Malang\r\n', 75, 3, 5, 'J11', 'swissbellin_1.jpg', 'swissbellin_2.jpg', 'swissbellin_3.jpeg'),
(6, 'Everyday Smart Hotel', '-7.949460', '112.616766', 'Jalan Soekarno Hatta 2, Jatimulyo, Lowokwaru, Kota Malang', 75, 4, 7, 'J11', 'everydaysmart_1.jpg', 'everydaysmart_2.jpg', 'everydaysmart_3.jpg'),
(7, 'Hotel Kartika Graha', '-7.973021', '112.630336', 'Jl. Jaksa Agung Suprapto No.17, Oro-oro Dowo, Klojen, Kota Malang', 75, 3, 2, 'J11', 'kartikagraha_1.jpg', 'kartikagraha_2.jpg', 'kartikagraha_3.jpg'),
(8, 'Hotel Atria', '-7.949466', '112.639211', 'Jl. Letjend S. Parman No.87 - 89, Purwantoro, Blimbing, Kota Malang', 75, 1, 5, 'J11', 'atria_1.jpg', 'atria_2.jpg', 'atria_3.jpg'),
(9, 'Hotel Aria Gajayana', '-7.977504', '112.624219', 'Kauman, Klojen, Kota Malang', 75, 3, 2, 'J11', 'ariagajayana_1.jpg', 'ariagajayana_2.jpg', 'ariagajayana_3.jpg'),
(10, 'Hotel Helios', '-7.973172', '112.634809', 'Jl. Patimura No.37, Klojen, Kota Malang', 75, 3, 2, 'J11', 'helios_1.jpg', 'helios_2.jpg', 'helios_3.jpg');

-- --------------------------------------------------------

--
-- Struktur dari tabel `jenis_tempat`
--

CREATE TABLE `jenis_tempat` (
  `id_jenis_tempat` varchar(3) NOT NULL,
  `jenis` varchar(20) NOT NULL,
  `kategori` enum('Tempat Bermain','Tempat Makan','Wisata Alam','Hotel','Tempat Sejarah','Oleh Oleh') NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data untuk tabel `jenis_tempat`
--

INSERT INTO `jenis_tempat` (`id_jenis_tempat`, `jenis`, `kategori`) VALUES
('J01', 'Waterpark', 'Tempat Bermain'),
('J02', 'Waduk', 'Tempat Bermain'),
('J03', 'Kebun Binatang', 'Tempat Bermain'),
('J04', 'Taman', 'Tempat Bermain'),
('J05', 'Lainnya', 'Tempat Bermain'),
('J06', 'Pulau', 'Wisata Alam'),
('J07', 'Tempat Pemandian', 'Wisata Alam'),
('J08', 'Pantai', 'Wisata Alam'),
('J09', 'Coban', 'Wisata Alam'),
('J10', 'Air Terjun', 'Wisata Alam'),
('J11', 'Hotel', 'Hotel'),
('J12', 'Penginapan', 'Hotel'),
('J13', 'Villa', 'Hotel'),
('J14', 'Restoran', 'Tempat Makan'),
('J15', 'Cafe', 'Tempat Makan'),
('J16', 'Kedai', 'Tempat Makan'),
('J17', 'Bistro', 'Tempat Makan'),
('J18', 'Rumah Makan', 'Tempat Makan'),
('J19', 'Warung', 'Tempat Makan'),
('J20', 'Fast Food', 'Tempat Makan'),
('J21', 'Nongkrong', 'Tempat Makan'),
('J22', 'Candi', 'Tempat Sejarah'),
('J23', 'Museum', 'Tempat Sejarah'),
('J24', 'Oleh-Oleh', 'Oleh Oleh');

-- --------------------------------------------------------

--
-- Struktur dari tabel `kecamatan`
--

CREATE TABLE `kecamatan` (
  `id_lokasi` int(5) NOT NULL,
  `kode_lokasi` varchar(20) NOT NULL,
  `nama_lokasi` varchar(100) NOT NULL,
  `lokasi_propinsi` int(5) NOT NULL,
  `lokasi_kabkot` int(5) NOT NULL,
  `lokasi_kecamatan` int(5) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data untuk tabel `kecamatan`
--

INSERT INTO `kecamatan` (`id_lokasi`, `kode_lokasi`, `nama_lokasi`, `lokasi_propinsi`, `lokasi_kabkot`, `lokasi_kecamatan`) VALUES
(3531, '35.14.01.0000', 'Kec. Ampelgading', 35, 14, 1),
(3532, '35.14.02.0000', 'Kec. Bantur', 35, 14, 2),
(3533, '35.14.03.0000', 'Kec. Bululawang', 35, 14, 3),
(3534, '35.14.04.0000', 'Kec. Dampit', 35, 14, 4),
(3535, '35.14.05.0000', 'Kec. Dau', 35, 14, 5),
(3536, '35.14.06.0000', 'Kec. Donomulyo', 35, 14, 6),
(3537, '35.14.07.0000', 'Kec. Gedangan', 35, 14, 7),
(3538, '35.14.08.0000', 'Kec. Gondanglegi', 35, 14, 8),
(3539, '35.14.09.0000', 'Kec. Jabung', 35, 14, 9),
(3540, '35.14.10.0000', 'Kec. Kalipare', 35, 14, 10),
(3541, '35.14.11.0000', 'Kec. Karangploso', 35, 14, 11),
(3542, '35.14.12.0000', 'Kec. Kasembon', 35, 14, 12),
(3543, '35.14.13.0000', 'Kec. Kepanjen', 35, 14, 13),
(3544, '35.14.14.0000', 'Kec. Kromengan', 35, 14, 14),
(3545, '35.14.15.0000', 'Kec. Lawang', 35, 14, 15),
(3546, '35.14.16.0000', 'Kec. Ngajung', 35, 14, 16),
(3547, '35.14.17.0000', 'Kec. Ngantang', 35, 14, 17),
(3548, '35.14.18.0000', 'Kec. Pagak', 35, 14, 18),
(3549, '35.14.19.0000', 'Kec. Pagelaran', 35, 14, 19),
(3550, '35.14.20.0000', 'Kec. Pakis', 35, 14, 20),
(3551, '35.14.21.0000', 'Kec. Pakisaji', 35, 14, 21),
(3552, '35.14.22.0000', 'Kec. Poncokusumo', 35, 14, 22),
(3553, '35.14.23.0000', 'Kec. Pujon', 35, 14, 23),
(3554, '35.14.24.0000', 'Kec. Singosari', 35, 14, 24),
(3555, '35.14.25.0000', 'Kec. Sumbermanjing Wetan', 35, 14, 25),
(3556, '35.14.26.0000', 'Kec. Sumberpucung', 35, 14, 26),
(3557, '35.14.27.0000', 'Kec. Tajinan', 35, 14, 27),
(3558, '35.14.28.0000', 'Kec. Tirtoyudo', 35, 14, 28),
(3559, '35.14.29.0000', 'Kec. Tumpang', 35, 14, 29),
(3560, '35.14.30.0000', 'Kec. Turen', 35, 14, 30),
(3561, '35.14.31.0000', 'Kec. Wagir', 35, 14, 31),
(3562, '35.14.32.0000', 'Kec. Wajak', 35, 14, 32),
(3563, '35.14.33.0000', 'Kec. Wonosari', 35, 14, 33),
(3844, '35.71.01.0000', 'Kec. Batu', 35, 71, 1),
(3845, '35.71.02.0000', 'Kec. Bumiaji', 35, 71, 2),
(3846, '35.71.03.0000', 'Kec. Junrejo', 35, 71, 3),
(3856, '35.75.01.0000', 'Kec. Blimbing', 35, 75, 1),
(3857, '35.75.02.0000', 'Kec. Kedungkandang', 35, 75, 2),
(3858, '35.75.03.0000', 'Kec. Klojen', 35, 75, 3),
(3859, '35.75.04.0000', 'Kec. Lowokwaru', 35, 75, 4),
(3860, '35.75.05.0000', 'Kec. Sukun', 35, 75, 5);

-- --------------------------------------------------------

--
-- Struktur dari tabel `oleh_oleh`
--

CREATE TABLE `oleh_oleh` (
  `id_tempat` int(10) NOT NULL,
  `nama_tempat` varchar(30) NOT NULL,
  `latitude` varchar(20) NOT NULL,
  `longitude` varchar(20) NOT NULL,
  `alamat` longtext NOT NULL,
  `lokasi_kabkot` int(2) DEFAULT NULL,
  `lokasi_kecamatan` int(5) DEFAULT NULL,
  `jarak_ke_kota` int(11) NOT NULL,
  `jam_buka` time NOT NULL,
  `jam_tutup` time NOT NULL,
  `jenis` varchar(3) NOT NULL,
  `foto_tempat1` varchar(100) DEFAULT NULL,
  `foto_tempat2` varchar(100) DEFAULT NULL,
  `foto_tempat3` varchar(100) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data untuk tabel `oleh_oleh`
--

INSERT INTO `oleh_oleh` (`id_tempat`, `nama_tempat`, `latitude`, `longitude`, `alamat`, `lokasi_kabkot`, `lokasi_kecamatan`, `jarak_ke_kota`, `jam_buka`, `jam_tutup`, `jenis`, `foto_tempat1`, `foto_tempat2`, `foto_tempat3`) VALUES
(1, 'Goedang Oleh Oleh', '-7.948623', '112.645674', 'Jalan Simpang Tenaga 2 No.12, Purwantoro, Blimbing, Kota Malang', 75, 1, 5, '07:00:00', '20:30:00', 'J24', 'goedangoleole_1.jpg', 'goedangoleole_2.jpg', 'goedangoleole_3.jpg'),
(2, 'SENSA, Singosari', '-7.868599', '112.680451', 'Jl. Raya Randu Agung No.9, Randutelu, Randuangung, Singosari, Malang', 14, 24, 15, '07:30:00', '20:00:00', 'J24', 'sensa_1.jpg', 'sensa_2.jpg', 'sensa_3.jpg'),
(3, 'Queen Apple Singosari', '-7.868305', '112.680628', 'Jl. Raya Randu Agung No.11, Randutelu, Randuangung, Lawang, Malang', 14, 24, 15, '08:00:00', '23:00:00', 'J24', 'queenapplesgs.jpg', NULL, NULL),
(4, 'Lancar Jaya Tempe and Fruit', '-7.960218', '112.642632', 'Jalan Raden Tumenggung Suryo No.86, Purwantoro, Blimbing, Kota Malang', 75, 1, 3, '07:00:00', '21:30:00', 'J24', 'lancarjaya_1.jpg', 'lancarjaya_2.jpg', NULL);

-- --------------------------------------------------------

--
-- Struktur dari tabel `pusat_kota`
--

CREATE TABLE `pusat_kota` (
  `id_pusatkota` int(11) NOT NULL,
  `id_wilayah` int(11) NOT NULL,
  `latitude` varchar(30) NOT NULL,
  `longitude` varchar(30) NOT NULL,
  `keterangan` longtext NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data untuk tabel `pusat_kota`
--

INSERT INTO `pusat_kota` (`id_pusatkota`, `id_wilayah`, `latitude`, `longitude`, `keterangan`) VALUES
(1, 273, '-7.982525', '112.630801', 'Pusat Kota dan Kabupaten Malang'),
(2, 269, '-7.871143', '112.526785', 'Pusat Kota Batu');

-- --------------------------------------------------------

--
-- Struktur dari tabel `tempat_bermain`
--

CREATE TABLE `tempat_bermain` (
  `id_tempat` int(10) NOT NULL,
  `nama_tempat` varchar(30) NOT NULL,
  `latitude` varchar(20) NOT NULL,
  `longitude` varchar(20) NOT NULL,
  `alamat` longtext NOT NULL,
  `lokasi_kabkot` int(2) DEFAULT NULL,
  `lokasi_kecamatan` int(5) DEFAULT NULL,
  `jarak_ke_kota` float NOT NULL,
  `jam_buka` time DEFAULT NULL,
  `jam_tutup` time DEFAULT NULL,
  `jenis` varchar(3) NOT NULL,
  `foto_tempat1` varchar(100) DEFAULT NULL,
  `foto_tempat2` varchar(100) DEFAULT NULL,
  `foto_tempat3` varchar(100) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data untuk tabel `tempat_bermain`
--

INSERT INTO `tempat_bermain` (`id_tempat`, `nama_tempat`, `latitude`, `longitude`, `alamat`, `lokasi_kabkot`, `lokasi_kecamatan`, `jarak_ke_kota`, `jam_buka`, `jam_tutup`, `jenis`, `foto_tempat1`, `foto_tempat2`, `foto_tempat3`) VALUES
(1, 'Hawai Waterparkk', '-7.923462', '112.658253', 'Perumahan Graha Kencana Raya, Jl. Raya Karanglo, Banjararum, Singosari', 14, 24, 12, '10:00:00', '16:00:00', 'J01', 'hawai_waterpark1.jpg', 'hawai_waterpark2.jpg', 'hawai_waterpark3.jpg'),
(2, 'Jatim Park 1', '-7.883915', '112.524782', 'Jl. Kartika No.2, Sisir, Kec. Batu, Kota Batu', 71, 1, 3, '08:30:00', '16:30:00', 'J04', 'jatim_park1_1.jpg', 'jatim_park1_2.jpg', 'jatim_park1_3.jpg'),
(3, 'Jatim Park 2', '-7.889057', '112.528575', 'Jl. Oro-Oro Ombo No.9, Temas, Kec. Batu, Kota Batu', 71, 1, 3, '10:00:00', '18:00:00', 'J04', 'jatim_park2_1.jpg', 'jatim_park2_2.jpg', NULL),
(4, 'Selecta', '-7.818035', '112.525219', 'Jl. Raya Selecta No. 1,  Tulungrejo, Bumiaji, Kota Batu', 71, 2, 6, '06:00:00', '17:00:00', 'J01', 'selecta_1.jpg', 'selecta_2.jpg', 'selecta_3.jpg'),
(5, 'Waduk Karangkates', '-8.160240', '112.446881', 'Karangkates, Sumber Pucung, Malang', 14, 26, 33, NULL, NULL, 'J02', 'bendungan_karangkates_1.jpg', 'bendungan_karangkates_2.jpg', 'bendungan_karangkates_3.jpg'),
(6, 'Waduk Selorejo', '-7.865278', '112.361111', 'Sambirejo, Pandansari, Ngantang, Malang', 14, 17, 49, NULL, NULL, 'J02', 'waduk_selorejo_1.jpg', 'waduk_selorejo_2.jpg', 'waduk_selorejo_3.jpg'),
(7, 'Alun Alun Kota Malang', '-7.982525', '112.630801', 'Jalan Merdeka Selatan, Kauman, Kiduldalem, Klojen, Kota Malang', 75, 3, 0, NULL, NULL, 'J04', 'alun2_malang_1.jpg', 'alun2_malang_2.jpg', 'alun2_malang_3.jpeg'),
(8, 'Kampung Jodipan', '-7.983205', '112.637630', 'Jodipan, Malang', 75, 5, 1, NULL, NULL, 'J05', 'jodipan_1.jpg', 'jodipan_2.jpg', 'jodipan_3.jpg'),
(9, 'Batu Secret Zoo', '-7.888231', '112.529828', 'Jl. Oro-Oro Ombo No.9, Temas, Kec. Batu, Kota Batu', 71, 1, 3, '09:30:00', '17:30:00', 'J03', 'batu_secret_zoo_1.jpg', NULL, NULL),
(10, 'Taman Sengkaling', '-7.915384', '112.588909', 'Jl. Raya Sengkaling No.194, Sengkaling, Mulyoagung, Dau, Malang', 14, 5, 13, '06:00:00', '17:00:00', 'J04', 'sengkaling_1.jpg', 'sengkaling_2.jpg', 'sengkaling_3.jpg');

-- --------------------------------------------------------

--
-- Struktur dari tabel `tempat_makan`
--

CREATE TABLE `tempat_makan` (
  `id_tempat` int(10) NOT NULL,
  `nama_tempat` varchar(30) NOT NULL,
  `jenis` varchar(3) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data untuk tabel `tempat_makan`
--

INSERT INTO `tempat_makan` (`id_tempat`, `nama_tempat`, `jenis`) VALUES
(1, 'Warunk Upnormal', 'J14'),
(2, 'Java Dancer Coffe Roaster', 'J15'),
(3, 'Ria Jenaka', 'J15'),
(4, 'Golden Heritage Koffie', 'J15'),
(5, 'Simpang Luwe', 'J15'),
(6, 'Bukit Delight', 'J15'),
(7, 'Noodle Inc', 'J14'),
(8, 'Richeese Factory', 'J20'),
(9, 'STMJ Ijen SOB', 'J21'),
(10, 'Mie Jogging', 'J14');

-- --------------------------------------------------------

--
-- Struktur dari tabel `tempat_sejarah`
--

CREATE TABLE `tempat_sejarah` (
  `id_tempat` int(10) NOT NULL,
  `nama_tempat` varchar(30) NOT NULL,
  `latitude` varchar(20) NOT NULL,
  `longitude` varchar(20) NOT NULL,
  `alamat` longtext NOT NULL,
  `lokasi_kabkot` int(2) DEFAULT NULL,
  `lokasi_kecamatan` int(5) DEFAULT NULL,
  `jarak_ke_kota` int(11) NOT NULL,
  `jam_buka` time DEFAULT NULL,
  `jam_tutup` time DEFAULT NULL,
  `jenis` varchar(3) NOT NULL,
  `foto_tempat1` varchar(100) DEFAULT NULL,
  `foto_tempat2` varchar(100) DEFAULT NULL,
  `foto_tempat3` varchar(100) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data untuk tabel `tempat_sejarah`
--

INSERT INTO `tempat_sejarah` (`id_tempat`, `nama_tempat`, `latitude`, `longitude`, `alamat`, `lokasi_kabkot`, `lokasi_kecamatan`, `jarak_ke_kota`, `jam_buka`, `jam_tutup`, `jenis`, `foto_tempat1`, `foto_tempat2`, `foto_tempat3`) VALUES
(1, 'Candi Singosari', '-7.887785', '112.663881', 'Jl. Kertanegara No.148, Candirenggo, Singosari, Malang', 14, 24, 13, '06:00:00', '18:30:00', 'J22', 'candisgs_1.jpg', 'candisgs_2.jpg', 'candisgs_3.jpg'),
(2, 'Candi Jago', '-8.005843', '112.764108', 'Jl. Wisnuwardhana, Ronggowuni, Tumpang, Malang', 14, 29, 17, '09:00:00', '17:00:00', 'J22', 'candijago_1.jpg', 'candijago_2.jpg', 'candijago_3.jpg'),
(3, 'Candi Sumberawan', '-7.855344', '112.644833', 'Sumberawan, Toyomarto, Singosari, Malang', 14, 24, 18, '00:00:00', '00:00:00', 'J22', 'candisbrwn_1.jpg', 'candisbrwn_2.jpg', 'candisbrwn_3.jpg'),
(4, 'Candi Badut', '-7.957783', '112.59854', 'Jalan Candi 5D, Karangwidoro, Dau, Karangwidoro, Dau, Kota Malang', 14, 5, 6, '08:00:00', '17:00:00', 'J22', 'candibadut_1.jpg', 'candibadut_2.jpg', 'candibadut_3.jpg'),
(5, 'Museum Brawijaya', '-7.972198', '112.621286', 'Jl. Ijen, No. 25 A, Gading Kasri, Klojen, Gading Kasri, Klojen, Kota Malang', 75, 3, 2, '08:00:00', '15:00:00', 'J23', 'museumbrawijaya_1.jpg', 'museumbrawijaya_2.jpg', 'museumbrawijaya_3.jpg'),
(6, 'Museum Angkut', '-7.878915', '112.520208', 'Jl. Terusan Sultan Agung No.2, Ngaglik, Kec. Batu, Kota Batu', 71, 1, 2, '00:00:00', '20:00:00', 'J23', 'museumangkut_1.jpg', 'museumangkut_2.jpg', 'museumangkut_3.jpg'),
(7, 'Museum Sejarah Bentoel', '-7.986775', '112.632062', 'JL. Wiromargo, No. 32, 65137, Sukoharjo, Klojen, Kota Malang', 75, 3, 1, '10:00:00', '16:00:00', 'J23', 'museumbentoel_1.jpg', 'museumbentoel_2.jpg', 'museumbentoel_3.jpg'),
(8, 'Candi Kidal', '-8.02556', '112.70861', 'JL. Candi Kidal No.65125, Panggung, Kidal, Tumpang, Malang', 14, 29, 11, '00:00:00', '00:00:00', 'J22', 'candikidal_1.jpg', 'candikidal_2.jpg', 'candikidal_3.jpg');

-- --------------------------------------------------------

--
-- Struktur dari tabel `wilayah`
--

CREATE TABLE `wilayah` (
  `id_wilayah` int(11) NOT NULL,
  `kode_lokasi` varchar(20) NOT NULL,
  `nama_lokasi` varchar(30) NOT NULL,
  `lokasi_propinsi` int(2) NOT NULL,
  `lokasi_kabkot` int(2) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data untuk tabel `wilayah`
--

INSERT INTO `wilayah` (`id_wilayah`, `kode_lokasi`, `nama_lokasi`, `lokasi_propinsi`, `lokasi_kabkot`) VALUES
(253, '35.14.00.0000', 'Kab. Malang', 35, 14),
(269, '35.71.00.0000', 'Kota Batu', 35, 71),
(273, '35.75.00.0000', 'Kota Malang', 35, 75);

-- --------------------------------------------------------

--
-- Struktur dari tabel `wisata_alam`
--

CREATE TABLE `wisata_alam` (
  `id_tempat` int(10) NOT NULL,
  `nama_tempat` varchar(30) NOT NULL,
  `latitude` varchar(20) NOT NULL,
  `longitude` varchar(30) NOT NULL,
  `alamat` longtext NOT NULL,
  `lokasi_kabkot` int(2) DEFAULT NULL,
  `lokasi_kecamatan` int(5) DEFAULT NULL,
  `jarak_ke_kota` int(2) NOT NULL,
  `jenis` varchar(3) NOT NULL,
  `foto_tempat1` varchar(100) DEFAULT NULL,
  `foto_tempat2` varchar(100) DEFAULT NULL,
  `foto_tempat3` varchar(100) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data untuk tabel `wisata_alam`
--

INSERT INTO `wisata_alam` (`id_tempat`, `nama_tempat`, `latitude`, `longitude`, `alamat`, `lokasi_kabkot`, `lokasi_kecamatan`, `jarak_ke_kota`, `jenis`, `foto_tempat1`, `foto_tempat2`, `foto_tempat3`) VALUES
(1, 'Pulau Sempu', '-8.442856', '112.697336', 'Hutan, Tambakrejo, Sumbermanjing, Malang', 14, 25, 69, 'J06', 'pulau_sempu_1.jpg', 'pulau_sempu_2.jpg', NULL),
(2, 'Mata Air Sumber Sirah', '-8.122911', '112.620597', 'Jalan Sunan Gunung Jati, RT.05 / RW.02, Putukrejo, Gondanglegi, Malang', 14, 8, 23, 'J07', 'sumbersirah_1.jpg', 'sumbersirah_2.jpg', NULL),
(3, 'Pantai Watu Leter', '-8.445227', '112.648405', 'Rowotrate, Sitiarjo, Sumbermanjing, Malang', 14, 25, 74, 'J08', 'watuleter_1.JPG', 'watuleter_2.jpg', NULL),
(4, 'Coban Nirwana', '-8.310087', '112.667504', 'Gedangan, Malang', 14, 7, 50, 'J09', 'nirwana_1.jpg', NULL, NULL),
(5, 'Pantai Batu Bengkung', '-8.430171', '112.615103', 'Jalan Jalur Lintas Selatan, RT.42/RW.05, Gedangan, Gajahrejo, Malang', 14, 7, 64, 'J08', 'batubengkung_1.jpg', 'batubengkung_2.jpg', NULL),
(6, 'Pantai Balekambang', '-8.402706', '112.533674', 'Bantur, Malang', 14, 2, 58, 'J08', 'balekambang_1.jpg', 'balekambang_2.png', NULL),
(7, 'Coban Sumber Pitu', '-7.895519', '112.462155', 'Desa Pujon Kidul, Pujon, Pandesari, Malang', 14, 23, 34, 'J09', 'sumberpitu_1.jpg', 'sumberpitu_2.jpg', NULL),
(8, 'Pantai Sipelot', '-8.380618', '112.899231', 'Pujiharjo, Tirtoyudo, Malang', 14, 28, 74, 'J08', 'sipelot_1.jpg', 'sipelot_2.JPG', NULL),
(9, 'Pantai Ngliyep', '-8.383650', '112.424305', 'Desa Kedungsalam, Donomulyo, Malang', 14, 6, 66, 'J08', 'ngliyep_1.jpg', 'ngliyep_2.png', NULL),
(10, 'Coban Pelangi', '-8.011501', '112.865349', 'Dusun Ngadas, Ngadas, Poncokusumo, Malang\r\n', 14, 22, 32, 'J09', 'cobanpelangi_1.jpg', 'cobanpelangi_2.jpg', NULL);

--
-- Indexes for dumped tables
--

--
-- Indeks untuk tabel `admin`
--
ALTER TABLE `admin`
  ADD PRIMARY KEY (`id_admin`);

--
-- Indeks untuk tabel `detail_tempat_makan`
--
ALTER TABLE `detail_tempat_makan`
  ADD PRIMARY KEY (`id_dtmakan`),
  ADD KEY `id_tempat` (`id_tempat`);

--
-- Indeks untuk tabel `hotel_penginapan`
--
ALTER TABLE `hotel_penginapan`
  ADD PRIMARY KEY (`id_tempat`);

--
-- Indeks untuk tabel `jenis_tempat`
--
ALTER TABLE `jenis_tempat`
  ADD PRIMARY KEY (`id_jenis_tempat`);

--
-- Indeks untuk tabel `kecamatan`
--
ALTER TABLE `kecamatan`
  ADD PRIMARY KEY (`id_lokasi`),
  ADD KEY `kec_kabkot` (`lokasi_kabkot`),
  ADD KEY `kec_prop` (`lokasi_propinsi`);

--
-- Indeks untuk tabel `oleh_oleh`
--
ALTER TABLE `oleh_oleh`
  ADD PRIMARY KEY (`id_tempat`);

--
-- Indeks untuk tabel `pusat_kota`
--
ALTER TABLE `pusat_kota`
  ADD PRIMARY KEY (`id_pusatkota`);

--
-- Indeks untuk tabel `tempat_bermain`
--
ALTER TABLE `tempat_bermain`
  ADD PRIMARY KEY (`id_tempat`);

--
-- Indeks untuk tabel `tempat_makan`
--
ALTER TABLE `tempat_makan`
  ADD PRIMARY KEY (`id_tempat`);

--
-- Indeks untuk tabel `tempat_sejarah`
--
ALTER TABLE `tempat_sejarah`
  ADD PRIMARY KEY (`id_tempat`);

--
-- Indeks untuk tabel `wilayah`
--
ALTER TABLE `wilayah`
  ADD PRIMARY KEY (`id_wilayah`);

--
-- Indeks untuk tabel `wisata_alam`
--
ALTER TABLE `wisata_alam`
  ADD PRIMARY KEY (`id_tempat`);

--
-- AUTO_INCREMENT untuk tabel yang dibuang
--

--
-- AUTO_INCREMENT untuk tabel `detail_tempat_makan`
--
ALTER TABLE `detail_tempat_makan`
  MODIFY `id_dtmakan` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=16;

--
-- AUTO_INCREMENT untuk tabel `hotel_penginapan`
--
ALTER TABLE `hotel_penginapan`
  MODIFY `id_tempat` int(10) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=11;

--
-- AUTO_INCREMENT untuk tabel `oleh_oleh`
--
ALTER TABLE `oleh_oleh`
  MODIFY `id_tempat` int(10) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- AUTO_INCREMENT untuk tabel `pusat_kota`
--
ALTER TABLE `pusat_kota`
  MODIFY `id_pusatkota` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT untuk tabel `tempat_bermain`
--
ALTER TABLE `tempat_bermain`
  MODIFY `id_tempat` int(10) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=11;

--
-- AUTO_INCREMENT untuk tabel `tempat_makan`
--
ALTER TABLE `tempat_makan`
  MODIFY `id_tempat` int(10) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=11;

--
-- AUTO_INCREMENT untuk tabel `tempat_sejarah`
--
ALTER TABLE `tempat_sejarah`
  MODIFY `id_tempat` int(10) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=9;

--
-- AUTO_INCREMENT untuk tabel `wisata_alam`
--
ALTER TABLE `wisata_alam`
  MODIFY `id_tempat` int(10) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=11;

--
-- Ketidakleluasaan untuk tabel pelimpahan (Dumped Tables)
--

--
-- Ketidakleluasaan untuk tabel `detail_tempat_makan`
--
ALTER TABLE `detail_tempat_makan`
  ADD CONSTRAINT `detail_tempat_makan_ibfk_1` FOREIGN KEY (`id_tempat`) REFERENCES `tempat_makan` (`id_tempat`);
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
