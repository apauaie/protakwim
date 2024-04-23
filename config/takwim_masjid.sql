-- phpMyAdmin SQL Dump
-- version 4.6.6deb4
-- https://www.phpmyadmin.net/
--
-- Host: localhost:3306
-- Generation Time: Apr 21, 2022 at 03:35 PM
-- Server version: 10.1.23-MariaDB-9+deb9u1
-- PHP Version: 7.0.33-0+deb9u6

-- SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `takwim_masjid`
--

-- --------------------------------------------------------

--
-- Table structure for table `ceramah_list`
--

DROP TABLE IF EXISTS `ceramah_list`;
CREATE TABLE `ceramah_list` (
  `id` int(11) NOT NULL,
  `penceramah` varchar(200) NOT NULL,
  `tajuk` varchar(500) NOT NULL,
  `tarikh` date NOT NULL,
  `datecreated` datetime NOT NULL DEFAULT CURRENT_TIMESTAMP,
  `masa` time NOT NULL,
  `poster` varchar(1000) DEFAULT NULL,
  `modifiedby` varchar(30) DEFAULT NULL,
  `status` varchar(30) NOT NULL DEFAULT 'active',
  `remarks` varchar(1000) DEFAULT NULL,
  `displaytext` varchar(10) NOT NULL,
  `lokasi` varchar(200) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Truncate table before insert `ceramah_list`
--

TRUNCATE TABLE `ceramah_list`;
-- --------------------------------------------------------

--
-- Table structure for table `ceramah_list_video`
--

DROP TABLE IF EXISTS `ceramah_list_video`;
CREATE TABLE `ceramah_list_video` (
  `id` int(11) NOT NULL,
  `penceramah` varchar(200) NOT NULL,
  `tajuk` varchar(500) NOT NULL,
  `tarikh` date NOT NULL,
  `datecreated` datetime NOT NULL DEFAULT CURRENT_TIMESTAMP,
  `masa` time NOT NULL,
  `poster` varchar(1000) DEFAULT NULL,
  `modifiedby` varchar(30) DEFAULT NULL,
  `status` varchar(30) NOT NULL DEFAULT 'active',
  `remarks` varchar(1000) DEFAULT NULL,
  `displaytext` varchar(10) NOT NULL,
  `lokasi` varchar(200) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Truncate table before insert `ceramah_list_video`
--

TRUNCATE TABLE `ceramah_list_video`;
-- --------------------------------------------------------

--
-- Table structure for table `sambutan_hari`
--

DROP TABLE IF EXISTS `sambutan_hari`;
CREATE TABLE `sambutan_hari` (
  `id` int(11) NOT NULL,
  `nama` varchar(400) NOT NULL,
  `tarikh` date NOT NULL,
  `hijridate` varchar(45) DEFAULT NULL,
  `statusx` varchar(30) NOT NULL DEFAULT 'active',
  `date_added` datetime NOT NULL DEFAULT CURRENT_TIMESTAMP
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Truncate table before insert `sambutan_hari`
--

TRUNCATE TABLE `sambutan_hari`;
-- --------------------------------------------------------

--
-- Table structure for table `setting_list`
--

DROP TABLE IF EXISTS `setting_list`;
CREATE TABLE `setting_list` (
  `id` int(11) NOT NULL,
  `zone` varchar(5) NOT NULL,
  `pesanan` varchar(3000) NOT NULL,
  `theme` varchar(50) NOT NULL,
  `iqomahperiod` int(11) NOT NULL,
  `last_update` datetime NOT NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP,
  `timebeforeazan` int(11) NOT NULL,
  `namamasjid` varchar(500) NOT NULL,
  `refresh` varchar(10) NOT NULL,
  `scrollspeed` int(11) NOT NULL,
  `lokasigambarlatar` varchar(400) NOT NULL,
  `lokasigambarsolat` varchar(400) NOT NULL,
  `lokasigambarsolatjumaat` varchar(50) NOT NULL,
  `solatperiod` int(11) NOT NULL,
  `time_per_image` int(11) NOT NULL,
  `timeprayerdisplay` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Truncate table before insert `setting_list`
--

TRUNCATE TABLE `setting_list`;
--
-- Dumping data for table `setting_list`
--

INSERT INTO `setting_list` (`id`, `zone`, `pesanan`, `theme`, `iqomahperiod`, `last_update`, `timebeforeazan`, `namamasjid`, `refresh`, `scrollspeed`, `lokasigambarlatar`, `lokasigambarsolat`, `lokasigambarsolatjumaat`, `solatperiod`, `time_per_image`, `timeprayerdisplay`) VALUES
(1, 'JHR02', 'Sesungguhnya yang memakmurkan masjid-masjid Allah hanyalah orang-orang yang beriman kepada Allah dan hari kemudian serta tetap mendirikan solat, menunaikan zakat dan tidak takut) kepada seorang pun (selain kepada Allah, maka mereka orang-orang yang diharapkan termasuk orang-orang yang mendapat petunjuk: At-Taubah (18)', 'theme3', 780000, '2022-04-21 11:16:56', 60000, 'Masjid Taman Pulai Indah', 'no', 30, 'bg (1).jpeg', 'solattime.jpeg', 'solatjumaat.jpeg', 900000, 21, 60);

-- --------------------------------------------------------

--
-- Table structure for table `solat_zone`
--

DROP TABLE IF EXISTS `solat_zone`;
CREATE TABLE `solat_zone` (
  `negeri` varchar(15) NOT NULL,
  `code` varchar(5) NOT NULL,
  `kawasan` varchar(95) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Truncate table before insert `solat_zone`
--

TRUNCATE TABLE `solat_zone`;
--
-- Dumping data for table `solat_zone`
--

INSERT INTO `solat_zone` (`negeri`, `code`, `kawasan`) VALUES
('JOHOR', 'JHR01', 'Pulau Aur dan Pemanggil'),
('JOHOR', 'JHR02', 'Kota Tinggi, Mersing, Johor Bahru'),
('JOHOR', 'JHR03', 'Kluang dan Pontian'),
('JOHOR', 'JHR04', 'Batu Pahat, Muar, Segamat, Gemas'),
('KEDAH', 'KDH01', 'Kota Setar, Kubang Pasu, Pokok Sena'),
('KEDAH', 'KDH02', 'Pendang, Kuala Muda, Yan'),
('KEDAH', 'KDH03', 'Padang Terap, Sik'),
('KEDAH', 'KDH04', 'Baling'),
('KEDAH', 'KDH05', 'Kulim, Bandar Bahru'),
('KEDAH', 'KDH06', 'Langkawi'),
('KEDAH', 'KDH07', 'Gunung Jerai'),
('KELANTAN', 'KTN01', 'K.Bharu,Bachok,Pasir Puteh,Tumpat,Pasir Mas,Tnh. Merah,Machang,Kuala Krai,Mukim Chiku'),
('KELANTAN', 'KTN03', 'Jeli, Gua Musang (Mukim Galas, Bertam)'),
('MELAKA', 'MLK01', 'Bandar Melaka, Alor Gajah, Jasin, Masjid Tanah, Merlimau, Nyalas'),
('NEGERI SEMBILAN', 'NGS01', 'Jempol, Tampin'),
('NEGERI SEMBILAN', 'NGS02', 'Port Dickson, Seremban, Kuala Pilah, Jelebu, Rembau'),
('PAHANG', 'PHG01', 'Pulau Tioman'),
('PAHANG', 'PHG02', 'Kuantan, Pekan, Rompin, Muadzam Shah'),
('PAHANG', 'PHG03', 'Maran, Chenor, Temerloh, Bera, Jerantut'),
('PAHANG', 'PHG04', 'Bentong, Raub, Kuala Lipis'),
('PAHANG', 'PHG05', 'Genting Sempah, Janda Baik, Bukit Tinggi'),
('PAHANG', 'PHG06', 'Bukit Fraser, Genting Higlands, Cameron Higlands'),
('PERLIS', 'PLS01', 'Kangar, Padang Besar, Arau'),
('PULAU PINANG', 'PNG01', 'Seluruh Negeri Pulau Pinang'),
('PERAK', 'PRK01', 'Tapah,Slim River dan Tanjung Malim'),
('PERAK', 'PRK02', 'Ipoh, Batu Gajah, Kampar, Sg. Siput dan Kuala Kangsar'),
('PERAK', 'PRK03', 'Pengkalan Hulu, Grik dan Lenggong'),
('PERAK', 'PRK04', 'Temengor dan Belum'),
('PERAK', 'PRK05', 'Teluk Intan, Bagan Datoh, Kg.Gajah,Sri Iskandar, Beruas,Parit,Lumut,Setiawan dan Pulau Pangkor'),
('PERAK', 'PRK06', 'Selama, Taiping, Bagan Serai dan Parit Buntar'),
('PERAK', 'PRK07', 'Bukit Larut'),
('SABAH', 'SBH01', 'Zon 1 - Sandakan, Bdr. Bkt. Garam, Semawang, Temanggong, Tambisan'),
('SABAH', 'SBH02', 'Zon 2 - Pinangah, Terusan, Beluran, Kuamut, Telupit'),
('SABAH', 'SBH03', 'Zon 3 - Lahad Datu, Kunak, Silabukan, Tungku, Sahabat, Semporna,'),
('SABAH', 'SBH04', 'Zon 4 - Tawau, Balong, Merotai, Kalabakan'),
('SABAH', 'SBH05', 'Zon 5 - Kudat, Kota Marudu, Pitas, Pulau Banggi'),
('SABAH', 'SBH06', 'Zon 6 - Gunung Kinabalu'),
('SABAH', 'SBH07', 'Zon 7 - Papar, Ranau, Kota Belud, Tuaran, Penampang, Kota Kinabalu'),
('SABAH', 'SBH08', 'Zon 8 - Pensiangan, Keningau, Tambunan, Nabawan'),
('SABAH', 'SBH09', 'Zon 9 - Sipitang, Membakut, Beaufort, Kuala Penyu, Weston, Tenom, Long Pa Sia'),
('SELANGOR', 'SGR01', 'Gombak,H.Selangor,Rawang, H.Langat, Sepang, Petaling, S.Alam,'),
('SELANGOR', 'SGR02', 'Sabak Bernam, Kuala Selangor, Klang, Kuala Langat'),
('KUALA LUMPUR', 'SGR03', 'Kuala Lumpur'),
('PUTRAJAYA', 'SGR04', 'Putrajaya'),
('SARAWAK', 'SWK01', 'Zon 1 - Limbang, Sundar, Terusan, Lawas'),
('SARAWAK', 'SWK02', 'Zon 2 - Niah, Belaga, Sibuti, Miri, Bekenu, Marudi'),
('SARAWAK', 'SWK03', 'Zon 3 - Song, Belingan, Sebauh, Bintulu, Tatau, Kapit'),
('SARAWAK', 'SWK04', 'Zon 4 - Igan, Kanowit, Sibu, Dalat, Oya'),
('SARAWAK', 'SWK05', 'Zon 5 - Belawai, Matu, Daro, Sarikei, Julau, Bitangor, Rajang'),
('SARAWAK', 'SWK06', 'Zon 6 - Kabong, Lingga, Sri Aman, Engkelili, Betong, Spaoh, Pusa, Saratok, Roban, Debak'),
('SARAWAK', 'SWK07', 'Zon 7 - Samarahan, Simunjan, Serian, Sebuyau, Meludam'),
('SARAWAK', 'SWK08', 'Zon 8 - Kuching, Bau, Lundu,Sematan'),
('SARAWAK', 'SWK09', 'Zon 9 - Zon Khas'),
('TERENGGANU', 'TRG01', 'Kuala Terengganu, Marang'),
('TERENGGANU', 'TRG02', 'Besut, Setiu'),
('TERENGGANU', 'TRG03', 'Hulu Terengganu'),
('TERENGGANU', 'TRG04', 'Kemaman Dungun'),
('LABUAN', 'WLY02', 'Labuan');

-- --------------------------------------------------------

--
-- Table structure for table `tema_list`
--

DROP TABLE IF EXISTS `tema_list`;
CREATE TABLE `tema_list` (
  `id_tema` int(11) NOT NULL,
  `nama_tema` varchar(20) NOT NULL,
  `deskripsi` varchar(550) NOT NULL,
  `status` varchar(20) DEFAULT NULL,
  `lokasi` varchar(69) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Truncate table before insert `tema_list`
--

TRUNCATE TABLE `tema_list`;
--
-- Dumping data for table `tema_list`
--

INSERT INTO `tema_list` (`id_tema`, `nama_tema`, `deskripsi`, `status`, `lokasi`) VALUES
(1, 'Minimalist Green', 'Tema minimalist dengan jam digital dankemasan hijau', 'active', 'theme1'),
(2, 'Basic Carousel', 'Tema asas dengan Jam Digital dan Carousel Gambar', 'active', 'theme2'),
(3, 'Tema Analog Kiri', 'Tema dengan Jam Analog dan senarai waktu solat kiri', 'active', 'theme3');

-- --------------------------------------------------------

--
-- Table structure for table `user_list`
--

DROP TABLE IF EXISTS `user_list`;
CREATE TABLE `user_list` (
  `id` int(11) NOT NULL,
  `username` varchar(100) NOT NULL,
  `password` varchar(100) NOT NULL,
  `category` int(11) NOT NULL,
  `email` varchar(100) DEFAULT NULL,
  `status` varchar(30) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Truncate table before insert `user_list`
--

TRUNCATE TABLE `user_list`;
--
-- Dumping data for table `user_list`
--

INSERT INTO `user_list` (`id`, `username`, `password`, `category`, `email`, `status`) VALUES
(1, 'admin', 'protakwim', 1, 'admin@masjidpulaiindah.com', 'active');

-- --------------------------------------------------------

--
-- Table structure for table `waktusolat`
--

DROP TABLE IF EXISTS `waktusolat`;
CREATE TABLE `waktusolat` (
  `id` int(11) NOT NULL,
  `date` varchar(20) NOT NULL,
  `datestamp` int(11) NOT NULL,
  `hijridate` varchar(20) DEFAULT NULL,
  `imsak` varchar(20) NOT NULL,
  `subuh` varchar(20) NOT NULL,
  `syuruk` varchar(20) NOT NULL,
  `zohor` varchar(20) NOT NULL,
  `asar` varchar(20) NOT NULL,
  `maghrib` varchar(20) NOT NULL,
  `isyak` varchar(20) NOT NULL,
  `date_updated` datetime NOT NULL DEFAULT CURRENT_TIMESTAMP
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Truncate table before insert `waktusolat`
--

TRUNCATE TABLE `waktusolat`;
--
-- Dumping data for table `waktusolat`
--

INSERT INTO `waktusolat` (`id`, `date`, `datestamp`, `hijridate`, `imsak`, `subuh`, `syuruk`, `zohor`, `asar`, `maghrib`, `isyak`, `date_updated`) VALUES
(1, '01-01-2022', 1640966400, '27-Jamadilawal-1443', '5:44 am', '5:54 am', '7:08 am', '1:11 pm', '4:35 pm', '7:11 pm', '8:25 pm', '2022-04-13 23:02:42'),
(2, '02-01-2022', 1641052800, '28-Jamadilawal-1443', '5:45 am', '5:55 am', '7:08 am', '1:11 pm', '4:35 pm', '7:11 pm', '8:26 pm', '2022-04-13 23:02:42'),
(3, '03-01-2022', 1641139200, '29-Jamadilawal-1443', '5:45 am', '5:55 am', '7:09 am', '1:12 pm', '4:36 pm', '7:12 pm', '8:26 pm', '2022-04-13 23:02:42'),
(4, '04-01-2022', 1641225600, '01-Jamadilakhir-1443', '5:46 am', '5:56 am', '7:09 am', '1:12 pm', '4:36 pm', '7:12 pm', '8:27 pm', '2022-04-13 23:02:42'),
(5, '05-01-2022', 1641312000, '02-Jamadilakhir-1443', '5:46 am', '5:56 am', '7:10 am', '1:13 pm', '4:36 pm', '7:12 pm', '8:27 pm', '2022-04-13 23:02:42'),
(6, '06-01-2022', 1641398400, '03-Jamadilakhir-1443', '5:47 am', '5:57 am', '7:10 am', '1:13 pm', '4:37 pm', '7:13 pm', '8:27 pm', '2022-04-13 23:02:42'),
(7, '07-01-2022', 1641484800, '04-Jamadilakhir-1443', '5:47 am', '5:57 am', '7:11 am', '1:14 pm', '4:37 pm', '7:13 pm', '8:28 pm', '2022-04-13 23:02:42'),
(8, '08-01-2022', 1641571200, '05-Jamadilakhir-1443', '5:48 am', '5:58 am', '7:11 am', '1:14 pm', '4:38 pm', '7:14 pm', '8:28 pm', '2022-04-13 23:02:42'),
(9, '09-01-2022', 1641657600, '06-Jamadilakhir-1443', '5:48 am', '5:58 am', '7:11 am', '1:14 pm', '4:38 pm', '7:14 pm', '8:28 pm', '2022-04-13 23:02:42'),
(10, '10-01-2022', 1641744000, '07-Jamadilakhir-1443', '5:49 am', '5:59 am', '7:12 am', '1:15 pm', '4:38 pm', '7:15 pm', '8:29 pm', '2022-04-13 23:02:42'),
(11, '11-01-2022', 1641830400, '08-Jamadilakhir-1443', '5:49 am', '5:59 am', '7:12 am', '1:15 pm', '4:39 pm', '7:15 pm', '8:29 pm', '2022-04-13 23:02:42'),
(12, '12-01-2022', 1641916800, '09-Jamadilakhir-1443', '5:50 am', '6:00 am', '7:13 am', '1:16 pm', '4:39 pm', '7:15 pm', '8:29 pm', '2022-04-13 23:02:42'),
(13, '13-01-2022', 1642003200, '10-Jamadilakhir-1443', '5:50 am', '6:00 am', '7:13 am', '1:16 pm', '4:39 pm', '7:16 pm', '8:30 pm', '2022-04-13 23:02:42'),
(14, '14-01-2022', 1642089600, '11-Jamadilakhir-1443', '5:50 am', '6:00 am', '7:13 am', '1:16 pm', '4:40 pm', '7:16 pm', '8:30 pm', '2022-04-13 23:02:42'),
(15, '15-01-2022', 1642176000, '12-Jamadilakhir-1443', '5:51 am', '6:01 am', '7:14 am', '1:17 pm', '4:40 pm', '7:17 pm', '8:30 pm', '2022-04-13 23:02:42'),
(16, '16-01-2022', 1642262400, '13-Jamadilakhir-1443', '5:51 am', '6:01 am', '7:14 am', '1:17 pm', '4:40 pm', '7:17 pm', '8:31 pm', '2022-04-13 23:02:42'),
(17, '17-01-2022', 1642348800, '14-Jamadilakhir-1443', '5:52 am', '6:02 am', '7:14 am', '1:17 pm', '4:41 pm', '7:17 pm', '8:31 pm', '2022-04-13 23:02:42'),
(18, '18-01-2022', 1642435200, '15-Jamadilakhir-1443', '5:52 am', '6:02 am', '7:15 am', '1:18 pm', '4:41 pm', '7:18 pm', '8:31 pm', '2022-04-13 23:02:42'),
(19, '19-01-2022', 1642521600, '16-Jamadilakhir-1443', '5:53 am', '6:03 am', '7:15 am', '1:18 pm', '4:41 pm', '7:18 pm', '8:31 pm', '2022-04-13 23:02:42'),
(20, '20-01-2022', 1642608000, '17-Jamadilakhir-1443', '5:53 am', '6:03 am', '7:15 am', '1:18 pm', '4:41 pm', '7:18 pm', '8:32 pm', '2022-04-13 23:02:42'),
(21, '21-01-2022', 1642694400, '18-Jamadilakhir-1443', '5:53 am', '6:03 am', '7:15 am', '1:19 pm', '4:41 pm', '7:19 pm', '8:32 pm', '2022-04-13 23:02:42'),
(22, '22-01-2022', 1642780800, '19-Jamadilakhir-1443', '5:54 am', '6:04 am', '7:16 am', '1:19 pm', '4:42 pm', '7:19 pm', '8:32 pm', '2022-04-13 23:02:42'),
(23, '23-01-2022', 1642867200, '20-Jamadilakhir-1443', '5:54 am', '6:04 am', '7:16 am', '1:19 pm', '4:42 pm', '7:19 pm', '8:32 pm', '2022-04-13 23:02:42'),
(24, '24-01-2022', 1642953600, '21-Jamadilakhir-1443', '5:54 am', '6:04 am', '7:16 am', '1:19 pm', '4:42 pm', '7:20 pm', '8:32 pm', '2022-04-13 23:02:42'),
(25, '25-01-2022', 1643040000, '22-Jamadilakhir-1443', '5:55 am', '6:05 am', '7:16 am', '1:20 pm', '4:42 pm', '7:20 pm', '8:32 pm', '2022-04-13 23:02:42'),
(26, '26-01-2022', 1643126400, '23-Jamadilakhir-1443', '5:55 am', '6:05 am', '7:17 am', '1:20 pm', '4:42 pm', '7:20 pm', '8:33 pm', '2022-04-13 23:02:42'),
(27, '27-01-2022', 1643212800, '24-Jamadilakhir-1443', '5:55 am', '6:05 am', '7:17 am', '1:20 pm', '4:42 pm', '7:20 pm', '8:33 pm', '2022-04-13 23:02:42'),
(28, '28-01-2022', 1643299200, '25-Jamadilakhir-1443', '5:56 am', '6:06 am', '7:17 am', '1:20 pm', '4:42 pm', '7:21 pm', '8:33 pm', '2022-04-13 23:02:42'),
(29, '29-01-2022', 1643385600, '26-Jamadilakhir-1443', '5:56 am', '6:06 am', '7:17 am', '1:20 pm', '4:42 pm', '7:21 pm', '8:33 pm', '2022-04-13 23:02:42'),
(30, '30-01-2022', 1643472000, '27-Jamadilakhir-1443', '5:56 am', '6:06 am', '7:17 am', '1:21 pm', '4:42 pm', '7:21 pm', '8:33 pm', '2022-04-13 23:02:42'),
(31, '31-01-2022', 1643558400, '28-Jamadilakhir-1443', '5:56 am', '6:06 am', '7:17 am', '1:21 pm', '4:42 pm', '7:21 pm', '8:33 pm', '2022-04-13 23:02:42'),
(32, '01-02-2022', 1643644800, '29-Jamadilakhir-1443', '5:57 am', '6:07 am', '7:17 am', '1:21 pm', '4:42 pm', '7:21 pm', '8:33 pm', '2022-04-13 23:02:42'),
(33, '02-02-2022', 1643731200, '30-Jamadilakhir-1443', '5:57 am', '6:07 am', '7:18 am', '1:21 pm', '4:42 pm', '7:21 pm', '8:33 pm', '2022-04-13 23:02:42'),
(34, '03-02-2022', 1643817600, '01-Rejab-1443', '5:57 am', '6:07 am', '7:18 am', '1:21 pm', '4:42 pm', '7:22 pm', '8:33 pm', '2022-04-13 23:02:42'),
(35, '04-02-2022', 1643904000, '02-Rejab-1443', '5:57 am', '6:07 am', '7:18 am', '1:21 pm', '4:42 pm', '7:22 pm', '8:33 pm', '2022-04-13 23:02:42'),
(36, '05-02-2022', 1643990400, '03-Rejab-1443', '5:57 am', '6:07 am', '7:18 am', '1:21 pm', '4:42 pm', '7:22 pm', '8:33 pm', '2022-04-13 23:02:42'),
(37, '06-02-2022', 1644076800, '04-Rejab-1443', '5:57 am', '6:07 am', '7:18 am', '1:21 pm', '4:42 pm', '7:22 pm', '8:33 pm', '2022-04-13 23:02:42'),
(38, '07-02-2022', 1644163200, '05-Rejab-1443', '5:58 am', '6:08 am', '7:18 am', '1:22 pm', '4:42 pm', '7:22 pm', '8:33 pm', '2022-04-13 23:02:42'),
(39, '08-02-2022', 1644249600, '06-Rejab-1443', '5:58 am', '6:08 am', '7:18 am', '1:22 pm', '4:42 pm', '7:22 pm', '8:33 pm', '2022-04-13 23:02:42'),
(40, '09-02-2022', 1644336000, '07-Rejab-1443', '5:58 am', '6:08 am', '7:18 am', '1:22 pm', '4:41 pm', '7:22 pm', '8:33 pm', '2022-04-13 23:02:42'),
(41, '10-02-2022', 1644422400, '08-Rejab-1443', '5:58 am', '6:08 am', '7:18 am', '1:22 pm', '4:41 pm', '7:22 pm', '8:33 pm', '2022-04-13 23:02:42'),
(42, '11-02-2022', 1644508800, '09-Rejab-1443', '5:58 am', '6:08 am', '7:18 am', '1:22 pm', '4:41 pm', '7:22 pm', '8:33 pm', '2022-04-13 23:02:42'),
(43, '12-02-2022', 1644595200, '10-Rejab-1443', '5:58 am', '6:08 am', '7:18 am', '1:22 pm', '4:41 pm', '7:22 pm', '8:33 pm', '2022-04-13 23:02:42'),
(44, '13-02-2022', 1644681600, '11-Rejab-1443', '5:58 am', '6:08 am', '7:18 am', '1:22 pm', '4:41 pm', '7:22 pm', '8:33 pm', '2022-04-13 23:02:42'),
(45, '14-02-2022', 1644768000, '12-Rejab-1443', '5:58 am', '6:08 am', '7:18 am', '1:22 pm', '4:40 pm', '7:22 pm', '8:33 pm', '2022-04-13 23:02:42'),
(46, '15-02-2022', 1644854400, '13-Rejab-1443', '5:58 am', '6:08 am', '7:18 am', '1:22 pm', '4:40 pm', '7:22 pm', '8:33 pm', '2022-04-13 23:02:42'),
(47, '16-02-2022', 1644940800, '14-Rejab-1443', '5:58 am', '6:08 am', '7:18 am', '1:21 pm', '4:40 pm', '7:22 pm', '8:33 pm', '2022-04-13 23:02:42'),
(48, '17-02-2022', 1645027200, '15-Rejab-1443', '5:58 am', '6:08 am', '7:17 am', '1:21 pm', '4:39 pm', '7:22 pm', '8:32 pm', '2022-04-13 23:02:42'),
(49, '18-02-2022', 1645113600, '16-Rejab-1443', '5:58 am', '6:08 am', '7:17 am', '1:21 pm', '4:39 pm', '7:22 pm', '8:32 pm', '2022-04-13 23:02:42'),
(50, '19-02-2022', 1645200000, '17-Rejab-1443', '5:58 am', '6:08 am', '7:17 am', '1:21 pm', '4:38 pm', '7:22 pm', '8:32 pm', '2022-04-13 23:02:42'),
(51, '20-02-2022', 1645286400, '18-Rejab-1443', '5:58 am', '6:08 am', '7:17 am', '1:21 pm', '4:38 pm', '7:22 pm', '8:32 pm', '2022-04-13 23:02:42'),
(52, '21-02-2022', 1645372800, '19-Rejab-1443', '5:58 am', '6:08 am', '7:17 am', '1:21 pm', '4:38 pm', '7:22 pm', '8:32 pm', '2022-04-13 23:02:42'),
(53, '22-02-2022', 1645459200, '20-Rejab-1443', '5:58 am', '6:08 am', '7:17 am', '1:21 pm', '4:37 pm', '7:22 pm', '8:32 pm', '2022-04-13 23:02:42'),
(54, '23-02-2022', 1645545600, '21-Rejab-1443', '5:58 am', '6:08 am', '7:17 am', '1:21 pm', '4:37 pm', '7:22 pm', '8:32 pm', '2022-04-13 23:02:42'),
(55, '24-02-2022', 1645632000, '22-Rejab-1443', '5:58 am', '6:08 am', '7:16 am', '1:21 pm', '4:36 pm', '7:22 pm', '8:31 pm', '2022-04-13 23:02:42'),
(56, '25-02-2022', 1645718400, '23-Rejab-1443', '5:58 am', '6:08 am', '7:16 am', '1:20 pm', '4:35 pm', '7:22 pm', '8:31 pm', '2022-04-13 23:02:42'),
(57, '26-02-2022', 1645804800, '24-Rejab-1443', '5:58 am', '6:08 am', '7:16 am', '1:20 pm', '4:35 pm', '7:22 pm', '8:31 pm', '2022-04-13 23:02:42'),
(58, '27-02-2022', 1645891200, '25-Rejab-1443', '5:57 am', '6:07 am', '7:16 am', '1:20 pm', '4:34 pm', '7:21 pm', '8:31 pm', '2022-04-13 23:02:42'),
(59, '28-02-2022', 1645977600, '26-Rejab-1443', '5:57 am', '6:07 am', '7:16 am', '1:20 pm', '4:34 pm', '7:21 pm', '8:31 pm', '2022-04-13 23:02:42'),
(60, '01-03-2022', 1646064000, '27-Rejab-1443', '5:57 am', '6:07 am', '7:15 am', '1:20 pm', '4:33 pm', '7:21 pm', '8:30 pm', '2022-04-13 23:02:42'),
(61, '02-03-2022', 1646150400, '28-Rejab-1443', '5:57 am', '6:07 am', '7:15 am', '1:20 pm', '4:33 pm', '7:21 pm', '8:30 pm', '2022-04-13 23:02:42'),
(62, '03-03-2022', 1646236800, '29-Rejab-1443', '5:57 am', '6:07 am', '7:15 am', '1:19 pm', '4:32 pm', '7:21 pm', '8:30 pm', '2022-04-13 23:02:42'),
(63, '04-03-2022', 1646323200, '01-Syaaban-1443', '5:56 am', '6:06 am', '7:15 am', '1:19 pm', '4:31 pm', '7:21 pm', '8:30 pm', '2022-04-13 23:02:42'),
(64, '05-03-2022', 1646409600, '02-Syaaban-1443', '5:56 am', '6:06 am', '7:14 am', '1:19 pm', '4:30 pm', '7:20 pm', '8:30 pm', '2022-04-13 23:02:42'),
(65, '06-03-2022', 1646496000, '03-Syaaban-1443', '5:56 am', '6:06 am', '7:14 am', '1:19 pm', '4:30 pm', '7:20 pm', '8:29 pm', '2022-04-13 23:02:42'),
(66, '07-03-2022', 1646582400, '04-Syaaban-1443', '5:56 am', '6:06 am', '7:14 am', '1:19 pm', '4:29 pm', '7:20 pm', '8:29 pm', '2022-04-13 23:02:42'),
(67, '08-03-2022', 1646668800, '05-Syaaban-1443', '5:56 am', '6:06 am', '7:14 am', '1:18 pm', '4:28 pm', '7:20 pm', '8:29 pm', '2022-04-13 23:02:42'),
(68, '09-03-2022', 1646755200, '06-Syaaban-1443', '5:55 am', '6:05 am', '7:13 am', '1:18 pm', '4:27 pm', '7:20 pm', '8:29 pm', '2022-04-13 23:02:42'),
(69, '10-03-2022', 1646841600, '07-Syaaban-1443', '5:55 am', '6:05 am', '7:13 am', '1:18 pm', '4:27 pm', '7:19 pm', '8:28 pm', '2022-04-13 23:02:42'),
(70, '11-03-2022', 1646928000, '08-Syaaban-1443', '5:55 am', '6:05 am', '7:13 am', '1:18 pm', '4:26 pm', '7:19 pm', '8:28 pm', '2022-04-13 23:02:42'),
(71, '12-03-2022', 1647014400, '09-Syaaban-1443', '5:55 am', '6:05 am', '7:12 am', '1:17 pm', '4:25 pm', '7:19 pm', '8:28 pm', '2022-04-13 23:02:42'),
(72, '13-03-2022', 1647100800, '10-Syaaban-1443', '5:54 am', '6:04 am', '7:12 am', '1:17 pm', '4:24 pm', '7:19 pm', '8:28 pm', '2022-04-13 23:02:42'),
(73, '14-03-2022', 1647187200, '11-Syaaban-1443', '5:54 am', '6:04 am', '7:12 am', '1:17 pm', '4:23 pm', '7:19 pm', '8:27 pm', '2022-04-13 23:02:42'),
(74, '15-03-2022', 1647273600, '12-Syaaban-1443', '5:54 am', '6:04 am', '7:11 am', '1:16 pm', '4:22 pm', '7:18 pm', '8:27 pm', '2022-04-13 23:02:42'),
(75, '16-03-2022', 1647360000, '13-Syaaban-1443', '5:53 am', '6:03 am', '7:11 am', '1:16 pm', '4:21 pm', '7:18 pm', '8:27 pm', '2022-04-13 23:02:42'),
(76, '17-03-2022', 1647446400, '14-Syaaban-1443', '5:53 am', '6:03 am', '7:11 am', '1:16 pm', '4:21 pm', '7:18 pm', '8:27 pm', '2022-04-13 23:02:42'),
(77, '18-03-2022', 1647532800, '15-Syaaban-1443', '5:53 am', '6:03 am', '7:10 am', '1:16 pm', '4:20 pm', '7:18 pm', '8:26 pm', '2022-04-13 23:02:42'),
(78, '19-03-2022', 1647619200, '16-Syaaban-1443', '5:52 am', '6:02 am', '7:10 am', '1:15 pm', '4:19 pm', '7:17 pm', '8:26 pm', '2022-04-13 23:02:42'),
(79, '20-03-2022', 1647705600, '17-Syaaban-1443', '5:52 am', '6:02 am', '7:10 am', '1:15 pm', '4:18 pm', '7:17 pm', '8:26 pm', '2022-04-13 23:02:42'),
(80, '21-03-2022', 1647792000, '18-Syaaban-1443', '5:52 am', '6:02 am', '7:09 am', '1:15 pm', '4:17 pm', '7:17 pm', '8:26 pm', '2022-04-13 23:02:42'),
(81, '22-03-2022', 1647878400, '19-Syaaban-1443', '5:51 am', '6:01 am', '7:09 am', '1:15 pm', '4:16 pm', '7:17 pm', '8:25 pm', '2022-04-13 23:02:42'),
(82, '23-03-2022', 1647964800, '20-Syaaban-1443', '5:51 am', '6:01 am', '7:09 am', '1:14 pm', '4:15 pm', '7:16 pm', '8:25 pm', '2022-04-13 23:02:42'),
(83, '24-03-2022', 1648051200, '21-Syaaban-1443', '5:51 am', '6:01 am', '7:08 am', '1:14 pm', '4:14 pm', '7:16 pm', '8:25 pm', '2022-04-13 23:02:42'),
(84, '25-03-2022', 1648137600, '22-Syaaban-1443', '5:50 am', '6:00 am', '7:08 am', '1:14 pm', '4:12 pm', '7:16 pm', '8:25 pm', '2022-04-13 23:02:42'),
(85, '26-03-2022', 1648224000, '23-Syaaban-1443', '5:50 am', '6:00 am', '7:08 am', '1:13 pm', '4:13 pm', '7:16 pm', '8:24 pm', '2022-04-13 23:02:42'),
(86, '27-03-2022', 1648310400, '24-Syaaban-1443', '5:49 am', '5:59 am', '7:07 am', '1:13 pm', '4:13 pm', '7:15 pm', '8:24 pm', '2022-04-13 23:02:42'),
(87, '28-03-2022', 1648396800, '25-Syaaban-1443', '5:49 am', '5:59 am', '7:07 am', '1:13 pm', '4:14 pm', '7:15 pm', '8:24 pm', '2022-04-13 23:02:42'),
(88, '29-03-2022', 1648483200, '26-Syaaban-1443', '5:49 am', '5:59 am', '7:07 am', '1:13 pm', '4:14 pm', '7:15 pm', '8:24 pm', '2022-04-13 23:02:42'),
(89, '30-03-2022', 1648569600, '27-Syaaban-1443', '5:48 am', '5:58 am', '7:06 am', '1:12 pm', '4:15 pm', '7:15 pm', '8:24 pm', '2022-04-13 23:02:42'),
(90, '31-03-2022', 1648656000, '28-Syaaban-1443', '5:48 am', '5:58 am', '7:06 am', '1:12 pm', '4:15 pm', '7:14 pm', '8:23 pm', '2022-04-13 23:02:42'),
(91, '01-04-2022', 1648742400, '29-Syaaban-1443', '5:48 am', '5:58 am', '7:06 am', '1:12 pm', '4:16 pm', '7:14 pm', '8:23 pm', '2022-04-13 23:02:42'),
(92, '02-04-2022', 1648828800, '30-Syaaban-1443', '5:47 am', '5:57 am', '7:05 am', '1:11 pm', '4:16 pm', '7:14 pm', '8:23 pm', '2022-04-13 23:02:42'),
(93, '03-04-2022', 1648915200, '01-Ramadan-1443', '5:47 am', '5:57 am', '7:05 am', '1:11 pm', '4:16 pm', '7:14 pm', '8:23 pm', '2022-04-13 23:02:42'),
(94, '04-04-2022', 1649001600, '02-Ramadan-1443', '5:46 am', '5:56 am', '7:05 am', '1:11 pm', '4:17 pm', '7:13 pm', '8:22 pm', '2022-04-13 23:02:42'),
(95, '05-04-2022', 1649088000, '03-Ramadan-1443', '5:46 am', '5:56 am', '7:04 am', '1:11 pm', '4:17 pm', '7:13 pm', '8:22 pm', '2022-04-13 23:02:42'),
(96, '06-04-2022', 1649174400, '04-Ramadan-1443', '5:46 am', '5:56 am', '7:04 am', '1:10 pm', '4:17 pm', '7:13 pm', '8:22 pm', '2022-04-13 23:02:42'),
(97, '07-04-2022', 1649260800, '05-Ramadan-1443', '5:45 am', '5:55 am', '7:04 am', '1:10 pm', '4:18 pm', '7:13 pm', '8:22 pm', '2022-04-13 23:02:42'),
(98, '08-04-2022', 1649347200, '06-Ramadan-1443', '5:45 am', '5:55 am', '7:03 am', '1:10 pm', '4:18 pm', '7:12 pm', '8:22 pm', '2022-04-13 23:02:42'),
(99, '09-04-2022', 1649433600, '07-Ramadan-1443', '5:45 am', '5:55 am', '7:03 am', '1:09 pm', '4:18 pm', '7:12 pm', '8:22 pm', '2022-04-13 23:02:43'),
(100, '10-04-2022', 1649520000, '08-Ramadan-1443', '5:44 am', '5:54 am', '7:03 am', '1:09 pm', '4:19 pm', '7:12 pm', '8:21 pm', '2022-04-13 23:02:43'),
(101, '11-04-2022', 1649606400, '09-Ramadan-1443', '5:44 am', '5:54 am', '7:02 am', '1:09 pm', '4:19 pm', '7:12 pm', '8:21 pm', '2022-04-13 23:02:43'),
(102, '12-04-2022', 1649692800, '10-Ramadan-1443', '5:43 am', '5:53 am', '7:02 am', '1:09 pm', '4:19 pm', '7:12 pm', '8:21 pm', '2022-04-13 23:02:43'),
(103, '13-04-2022', 1649779200, '11-Ramadan-1443', '5:43 am', '5:53 am', '7:02 am', '1:08 pm', '4:19 pm', '7:11 pm', '8:21 pm', '2022-04-13 23:02:43'),
(104, '14-04-2022', 1649865600, '12-Ramadan-1443', '5:43 am', '5:53 am', '7:01 am', '1:08 pm', '4:20 pm', '7:11 pm', '8:21 pm', '2022-04-13 23:02:43'),
(105, '15-04-2022', 1649952000, '13-Ramadan-1443', '5:42 am', '5:52 am', '7:01 am', '1:08 pm', '4:20 pm', '7:11 pm', '8:21 pm', '2022-04-13 23:02:43'),
(106, '16-04-2022', 1650038400, '14-Ramadan-1443', '5:42 am', '5:52 am', '7:01 am', '1:08 pm', '4:20 pm', '7:11 pm', '8:21 pm', '2022-04-13 23:02:43'),
(107, '17-04-2022', 1650124800, '15-Ramadan-1443', '5:41 am', '5:51 am', '7:00 am', '1:07 pm', '4:20 pm', '7:11 pm', '8:21 pm', '2022-04-13 23:02:43'),
(108, '18-04-2022', 1650211200, '16-Ramadan-1443', '5:41 am', '5:51 am', '7:00 am', '1:07 pm', '4:21 pm', '7:10 pm', '8:21 pm', '2022-04-13 23:02:43'),
(109, '19-04-2022', 1650297600, '17-Ramadan-1443', '5:41 am', '5:51 am', '7:00 am', '1:07 pm', '4:21 pm', '7:10 pm', '8:20 pm', '2022-04-13 23:02:43'),
(110, '20-04-2022', 1650384000, '18-Ramadan-1443', '5:40 am', '5:50 am', '7:00 am', '1:07 pm', '4:21 pm', '7:10 pm', '8:20 pm', '2022-04-13 23:02:43'),
(111, '21-04-2022', 1650470400, '19-Ramadan-1443', '5:40 am', '5:50 am', '6:59 am', '1:06 pm', '4:21 pm', '7:10 pm', '8:20 pm', '2022-04-13 23:02:43'),
(112, '22-04-2022', 1650556800, '20-Ramadan-1443', '5:40 am', '5:50 am', '6:59 am', '1:06 pm', '4:21 pm', '7:10 pm', '8:20 pm', '2022-04-13 23:02:43'),
(113, '23-04-2022', 1650643200, '21-Ramadan-1443', '5:39 am', '5:49 am', '6:59 am', '1:06 pm', '4:22 pm', '7:10 pm', '8:20 pm', '2022-04-13 23:02:43'),
(114, '24-04-2022', 1650729600, '22-Ramadan-1443', '5:39 am', '5:49 am', '6:59 am', '1:06 pm', '4:22 pm', '7:10 pm', '8:20 pm', '2022-04-13 23:02:43'),
(115, '25-04-2022', 1650816000, '23-Ramadan-1443', '5:39 am', '5:49 am', '6:58 am', '1:06 pm', '4:22 pm', '7:09 pm', '8:20 pm', '2022-04-13 23:02:43'),
(116, '26-04-2022', 1650902400, '24-Ramadan-1443', '5:38 am', '5:48 am', '6:58 am', '1:05 pm', '4:22 pm', '7:09 pm', '8:20 pm', '2022-04-13 23:02:43'),
(117, '27-04-2022', 1650988800, '25-Ramadan-1443', '5:38 am', '5:48 am', '6:58 am', '1:05 pm', '4:22 pm', '7:09 pm', '8:20 pm', '2022-04-13 23:02:43'),
(118, '28-04-2022', 1651075200, '26-Ramadan-1443', '5:38 am', '5:48 am', '6:58 am', '1:05 pm', '4:23 pm', '7:09 pm', '8:20 pm', '2022-04-13 23:02:43'),
(119, '29-04-2022', 1651161600, '27-Ramadan-1443', '5:38 am', '5:48 am', '6:58 am', '1:05 pm', '4:23 pm', '7:09 pm', '8:20 pm', '2022-04-13 23:02:43'),
(120, '30-04-2022', 1651248000, '28-Ramadan-1443', '5:37 am', '5:47 am', '6:57 am', '1:05 pm', '4:23 pm', '7:09 pm', '8:20 pm', '2022-04-13 23:02:43'),
(121, '01-05-2022', 1651334400, '29-Ramadan-1443', '5:37 am', '5:47 am', '6:57 am', '1:05 pm', '4:23 pm', '7:09 pm', '8:20 pm', '2022-04-13 23:02:43'),
(122, '02-05-2022', 1651420800, '30-Ramadan-1443', '5:37 am', '5:47 am', '6:57 am', '1:05 pm', '4:23 pm', '7:09 pm', '8:20 pm', '2022-04-13 23:02:43'),
(123, '03-05-2022', 1651507200, '01-Syawal-1443', '5:36 am', '5:46 am', '6:57 am', '1:04 pm', '4:24 pm', '7:09 pm', '8:20 pm', '2022-04-13 23:02:43'),
(124, '04-05-2022', 1651593600, '02-Syawal-1443', '5:36 am', '5:46 am', '6:57 am', '1:04 pm', '4:24 pm', '7:09 pm', '8:20 pm', '2022-04-13 23:02:43'),
(125, '05-05-2022', 1651680000, '03-Syawal-1443', '5:36 am', '5:46 am', '6:57 am', '1:04 pm', '4:24 pm', '7:09 pm', '8:20 pm', '2022-04-13 23:02:43'),
(126, '06-05-2022', 1651766400, '04-Syawal-1443', '5:36 am', '5:46 am', '6:57 am', '1:04 pm', '4:24 pm', '7:09 pm', '8:20 pm', '2022-04-13 23:02:43'),
(127, '07-05-2022', 1651852800, '05-Syawal-1443', '5:35 am', '5:45 am', '6:56 am', '1:04 pm', '4:24 pm', '7:08 pm', '8:21 pm', '2022-04-13 23:02:43'),
(128, '08-05-2022', 1651939200, '06-Syawal-1443', '5:35 am', '5:45 am', '6:56 am', '1:04 pm', '4:25 pm', '7:08 pm', '8:21 pm', '2022-04-13 23:02:43'),
(129, '09-05-2022', 1652025600, '07-Syawal-1443', '5:35 am', '5:45 am', '6:56 am', '1:04 pm', '4:25 pm', '7:08 pm', '8:21 pm', '2022-04-13 23:02:43'),
(130, '10-05-2022', 1652112000, '08-Syawal-1443', '5:35 am', '5:45 am', '6:56 am', '1:04 pm', '4:25 pm', '7:08 pm', '8:21 pm', '2022-04-13 23:02:43'),
(131, '11-05-2022', 1652198400, '09-Syawal-1443', '5:35 am', '5:45 am', '6:56 am', '1:04 pm', '4:25 pm', '7:08 pm', '8:21 pm', '2022-04-13 23:02:43'),
(132, '12-05-2022', 1652284800, '10-Syawal-1443', '5:34 am', '5:44 am', '6:56 am', '1:04 pm', '4:25 pm', '7:08 pm', '8:21 pm', '2022-04-13 23:02:43'),
(133, '13-05-2022', 1652371200, '11-Syawal-1443', '5:34 am', '5:44 am', '6:56 am', '1:04 pm', '4:26 pm', '7:09 pm', '8:21 pm', '2022-04-13 23:02:43'),
(134, '14-05-2022', 1652457600, '12-Syawal-1443', '5:34 am', '5:44 am', '6:56 am', '1:04 pm', '4:26 pm', '7:09 pm', '8:21 pm', '2022-04-13 23:02:43'),
(135, '15-05-2022', 1652544000, '13-Syawal-1443', '5:34 am', '5:44 am', '6:56 am', '1:04 pm', '4:26 pm', '7:09 pm', '8:22 pm', '2022-04-13 23:02:43'),
(136, '16-05-2022', 1652630400, '14-Syawal-1443', '5:34 am', '5:44 am', '6:56 am', '1:04 pm', '4:26 pm', '7:09 pm', '8:22 pm', '2022-04-13 23:02:43'),
(137, '17-05-2022', 1652716800, '15-Syawal-1443', '5:34 am', '5:44 am', '6:56 am', '1:04 pm', '4:26 pm', '7:09 pm', '8:22 pm', '2022-04-13 23:02:43'),
(138, '18-05-2022', 1652803200, '16-Syawal-1443', '5:34 am', '5:44 am', '6:56 am', '1:04 pm', '4:27 pm', '7:09 pm', '8:22 pm', '2022-04-13 23:02:43'),
(139, '19-05-2022', 1652889600, '17-Syawal-1443', '5:34 am', '5:44 am', '6:56 am', '1:04 pm', '4:27 pm', '7:09 pm', '8:22 pm', '2022-04-13 23:02:43'),
(140, '20-05-2022', 1652976000, '18-Syawal-1443', '5:33 am', '5:43 am', '6:56 am', '1:04 pm', '4:27 pm', '7:09 pm', '8:22 pm', '2022-04-13 23:02:43'),
(141, '21-05-2022', 1653062400, '19-Syawal-1443', '5:33 am', '5:43 am', '6:56 am', '1:04 pm', '4:27 pm', '7:09 pm', '8:23 pm', '2022-04-13 23:02:43'),
(142, '22-05-2022', 1653148800, '20-Syawal-1443', '5:33 am', '5:43 am', '6:56 am', '1:04 pm', '4:27 pm', '7:09 pm', '8:23 pm', '2022-04-13 23:02:43'),
(143, '23-05-2022', 1653235200, '21-Syawal-1443', '5:33 am', '5:43 am', '6:56 am', '1:04 pm', '4:28 pm', '7:09 pm', '8:23 pm', '2022-04-13 23:02:43'),
(144, '24-05-2022', 1653321600, '22-Syawal-1443', '5:33 am', '5:43 am', '6:56 am', '1:04 pm', '4:28 pm', '7:09 pm', '8:23 pm', '2022-04-13 23:02:43'),
(145, '25-05-2022', 1653408000, '23-Syawal-1443', '5:33 am', '5:43 am', '6:56 am', '1:04 pm', '4:28 pm', '7:10 pm', '8:23 pm', '2022-04-13 23:02:43'),
(146, '26-05-2022', 1653494400, '24-Syawal-1443', '5:33 am', '5:43 am', '6:56 am', '1:04 pm', '4:28 pm', '7:10 pm', '8:24 pm', '2022-04-13 23:02:43'),
(147, '27-05-2022', 1653580800, '25-Syawal-1443', '5:33 am', '5:43 am', '6:56 am', '1:04 pm', '4:28 pm', '7:10 pm', '8:24 pm', '2022-04-13 23:02:43'),
(148, '28-05-2022', 1653667200, '26-Syawal-1443', '5:33 am', '5:43 am', '6:56 am', '1:05 pm', '4:29 pm', '7:10 pm', '8:24 pm', '2022-04-13 23:02:43'),
(149, '29-05-2022', 1653753600, '27-Syawal-1443', '5:33 am', '5:43 am', '6:56 am', '1:05 pm', '4:29 pm', '7:10 pm', '8:24 pm', '2022-04-13 23:02:43'),
(150, '30-05-2022', 1653840000, '28-Syawal-1443', '5:33 am', '5:43 am', '6:57 am', '1:05 pm', '4:29 pm', '7:10 pm', '8:25 pm', '2022-04-13 23:02:43'),
(151, '31-05-2022', 1653926400, '29-Syawal-1443', '5:33 am', '5:43 am', '6:57 am', '1:05 pm', '4:29 pm', '7:10 pm', '8:25 pm', '2022-04-13 23:02:43'),
(152, '01-06-2022', 1654012800, '01-Zulkaedah-1443', '5:33 am', '5:43 am', '6:57 am', '1:05 pm', '4:30 pm', '7:11 pm', '8:25 pm', '2022-04-13 23:02:43'),
(153, '02-06-2022', 1654099200, '02-Zulkaedah-1443', '5:33 am', '5:43 am', '6:57 am', '1:05 pm', '4:30 pm', '7:11 pm', '8:25 pm', '2022-04-13 23:02:43'),
(154, '03-06-2022', 1654185600, '03-Zulkaedah-1443', '5:33 am', '5:43 am', '6:57 am', '1:05 pm', '4:30 pm', '7:11 pm', '8:26 pm', '2022-04-13 23:02:43'),
(155, '04-06-2022', 1654272000, '04-Zulkaedah-1443', '5:33 am', '5:43 am', '6:57 am', '1:06 pm', '4:30 pm', '7:11 pm', '8:26 pm', '2022-04-13 23:02:43'),
(156, '05-06-2022', 1654358400, '05-Zulkaedah-1443', '5:34 am', '5:44 am', '6:57 am', '1:06 pm', '4:31 pm', '7:11 pm', '8:26 pm', '2022-04-13 23:02:43'),
(157, '06-06-2022', 1654444800, '06-Zulkaedah-1443', '5:34 am', '5:44 am', '6:58 am', '1:06 pm', '4:31 pm', '7:12 pm', '8:26 pm', '2022-04-13 23:02:43'),
(158, '07-06-2022', 1654531200, '07-Zulkaedah-1443', '5:34 am', '5:44 am', '6:58 am', '1:06 pm', '4:31 pm', '7:12 pm', '8:27 pm', '2022-04-13 23:02:43'),
(159, '08-06-2022', 1654617600, '08-Zulkaedah-1443', '5:34 am', '5:44 am', '6:58 am', '1:06 pm', '4:31 pm', '7:12 pm', '8:27 pm', '2022-04-13 23:02:43'),
(160, '09-06-2022', 1654704000, '09-Zulkaedah-1443', '5:34 am', '5:44 am', '6:58 am', '1:06 pm', '4:32 pm', '7:12 pm', '8:27 pm', '2022-04-13 23:02:43'),
(161, '10-06-2022', 1654790400, '10-Zulkaedah-1443', '5:34 am', '5:44 am', '6:58 am', '1:07 pm', '4:32 pm', '7:12 pm', '8:27 pm', '2022-04-13 23:02:43'),
(162, '11-06-2022', 1654876800, '11-Zulkaedah-1443', '5:34 am', '5:44 am', '6:58 am', '1:07 pm', '4:32 pm', '7:13 pm', '8:28 pm', '2022-04-13 23:02:43'),
(163, '12-06-2022', 1654963200, '12-Zulkaedah-1443', '5:34 am', '5:44 am', '6:59 am', '1:07 pm', '4:32 pm', '7:13 pm', '8:28 pm', '2022-04-13 23:02:43'),
(164, '13-06-2022', 1655049600, '13-Zulkaedah-1443', '5:35 am', '5:45 am', '6:59 am', '1:07 pm', '4:33 pm', '7:13 pm', '8:28 pm', '2022-04-13 23:02:43'),
(165, '14-06-2022', 1655136000, '14-Zulkaedah-1443', '5:35 am', '5:45 am', '6:59 am', '1:07 pm', '4:33 pm', '7:13 pm', '8:28 pm', '2022-04-13 23:02:43'),
(166, '15-06-2022', 1655222400, '15-Zulkaedah-1443', '5:35 am', '5:45 am', '6:59 am', '1:08 pm', '4:33 pm', '7:13 pm', '8:29 pm', '2022-04-13 23:02:43'),
(167, '16-06-2022', 1655308800, '16-Zulkaedah-1443', '5:35 am', '5:45 am', '6:59 am', '1:08 pm', '4:33 pm', '7:14 pm', '8:29 pm', '2022-04-13 23:02:43'),
(168, '17-06-2022', 1655395200, '17-Zulkaedah-1443', '5:35 am', '5:45 am', '7:00 am', '1:08 pm', '4:34 pm', '7:14 pm', '8:29 pm', '2022-04-13 23:02:43'),
(169, '18-06-2022', 1655481600, '18-Zulkaedah-1443', '5:36 am', '5:46 am', '7:00 am', '1:08 pm', '4:34 pm', '7:14 pm', '8:29 pm', '2022-04-13 23:02:43'),
(170, '19-06-2022', 1655568000, '19-Zulkaedah-1443', '5:36 am', '5:46 am', '7:00 am', '1:09 pm', '4:34 pm', '7:14 pm', '8:30 pm', '2022-04-13 23:02:43'),
(171, '20-06-2022', 1655654400, '20-Zulkaedah-1443', '5:36 am', '5:46 am', '7:00 am', '1:09 pm', '4:34 pm', '7:15 pm', '8:30 pm', '2022-04-13 23:02:43'),
(172, '21-06-2022', 1655740800, '21-Zulkaedah-1443', '5:36 am', '5:46 am', '7:00 am', '1:09 pm', '4:35 pm', '7:15 pm', '8:30 pm', '2022-04-13 23:02:43'),
(173, '22-06-2022', 1655827200, '22-Zulkaedah-1443', '5:36 am', '5:46 am', '7:01 am', '1:09 pm', '4:35 pm', '7:15 pm', '8:30 pm', '2022-04-13 23:02:43'),
(174, '23-06-2022', 1655913600, '23-Zulkaedah-1443', '5:37 am', '5:47 am', '7:01 am', '1:09 pm', '4:35 pm', '7:15 pm', '8:31 pm', '2022-04-13 23:02:43'),
(175, '24-06-2022', 1656000000, '24-Zulkaedah-1443', '5:37 am', '5:47 am', '7:01 am', '1:10 pm', '4:35 pm', '7:15 pm', '8:31 pm', '2022-04-13 23:02:43'),
(176, '25-06-2022', 1656086400, '25-Zulkaedah-1443', '5:37 am', '5:47 am', '7:01 am', '1:10 pm', '4:35 pm', '7:16 pm', '8:31 pm', '2022-04-13 23:02:43'),
(177, '26-06-2022', 1656172800, '26-Zulkaedah-1443', '5:37 am', '5:47 am', '7:02 am', '1:10 pm', '4:36 pm', '7:16 pm', '8:31 pm', '2022-04-13 23:02:43'),
(178, '27-06-2022', 1656259200, '27-Zulkaedah-1443', '5:37 am', '5:47 am', '7:02 am', '1:10 pm', '4:36 pm', '7:16 pm', '8:31 pm', '2022-04-13 23:02:43'),
(179, '28-06-2022', 1656345600, '28-Zulkaedah-1443', '5:38 am', '5:48 am', '7:02 am', '1:10 pm', '4:36 pm', '7:16 pm', '8:31 pm', '2022-04-13 23:02:43'),
(180, '29-06-2022', 1656432000, '29-Zulkaedah-1443', '5:38 am', '5:48 am', '7:02 am', '1:11 pm', '4:36 pm', '7:16 pm', '8:32 pm', '2022-04-13 23:02:43'),
(181, '30-06-2022', 1656518400, '30-Zulkaedah-1443', '5:38 am', '5:48 am', '7:02 am', '1:11 pm', '4:36 pm', '7:17 pm', '8:32 pm', '2022-04-13 23:02:43'),
(182, '01-07-2022', 1656604800, '01-Zulhijjah-1443', '5:38 am', '5:48 am', '7:03 am', '1:11 pm', '4:36 pm', '7:17 pm', '8:32 pm', '2022-04-13 23:02:43'),
(183, '02-07-2022', 1656691200, '02-Zulhijjah-1443', '5:39 am', '5:49 am', '7:03 am', '1:11 pm', '4:37 pm', '7:17 pm', '8:32 pm', '2022-04-13 23:02:43'),
(184, '03-07-2022', 1656777600, '03-Zulhijjah-1443', '5:39 am', '5:49 am', '7:03 am', '1:11 pm', '4:37 pm', '7:17 pm', '8:32 pm', '2022-04-13 23:02:43'),
(185, '04-07-2022', 1656864000, '04-Zulhijjah-1443', '5:39 am', '5:49 am', '7:03 am', '1:12 pm', '4:37 pm', '7:17 pm', '8:32 pm', '2022-04-13 23:02:43'),
(186, '05-07-2022', 1656950400, '05-Zulhijjah-1443', '5:39 am', '5:49 am', '7:03 am', '1:12 pm', '4:37 pm', '7:17 pm', '8:32 pm', '2022-04-13 23:02:43'),
(187, '06-07-2022', 1657036800, '06-Zulhijjah-1443', '5:40 am', '5:50 am', '7:04 am', '1:12 pm', '4:37 pm', '7:18 pm', '8:33 pm', '2022-04-13 23:02:43'),
(188, '07-07-2022', 1657123200, '07-Zulhijjah-1443', '5:40 am', '5:50 am', '7:04 am', '1:12 pm', '4:37 pm', '7:18 pm', '8:33 pm', '2022-04-13 23:02:43'),
(189, '08-07-2022', 1657209600, '08-Zulhijjah-1443', '5:40 am', '5:50 am', '7:04 am', '1:12 pm', '4:37 pm', '7:18 pm', '8:33 pm', '2022-04-13 23:02:43'),
(190, '09-07-2022', 1657296000, '09-Zulhijjah-1443', '5:40 am', '5:50 am', '7:04 am', '1:13 pm', '4:37 pm', '7:18 pm', '8:33 pm', '2022-04-13 23:02:43'),
(191, '10-07-2022', 1657382400, '10-Zulhijjah-1443', '5:41 am', '5:51 am', '7:04 am', '1:13 pm', '4:37 pm', '7:18 pm', '8:33 pm', '2022-04-13 23:02:43'),
(192, '11-07-2022', 1657468800, '11-Zulhijjah-1443', '5:41 am', '5:51 am', '7:04 am', '1:13 pm', '4:38 pm', '7:18 pm', '8:33 pm', '2022-04-13 23:02:43'),
(193, '12-07-2022', 1657555200, '12-Zulhijjah-1443', '5:41 am', '5:51 am', '7:05 am', '1:13 pm', '4:38 pm', '7:18 pm', '8:33 pm', '2022-04-13 23:02:43'),
(194, '13-07-2022', 1657641600, '13-Zulhijjah-1443', '5:41 am', '5:51 am', '7:05 am', '1:13 pm', '4:38 pm', '7:18 pm', '8:33 pm', '2022-04-13 23:02:43'),
(195, '14-07-2022', 1657728000, '14-Zulhijjah-1443', '5:42 am', '5:52 am', '7:05 am', '1:13 pm', '4:38 pm', '7:19 pm', '8:33 pm', '2022-04-13 23:02:43'),
(196, '15-07-2022', 1657814400, '15-Zulhijjah-1443', '5:42 am', '5:52 am', '7:05 am', '1:13 pm', '4:38 pm', '7:19 pm', '8:33 pm', '2022-04-13 23:02:43'),
(197, '16-07-2022', 1657900800, '16-Zulhijjah-1443', '5:42 am', '5:52 am', '7:05 am', '1:13 pm', '4:38 pm', '7:19 pm', '8:33 pm', '2022-04-13 23:02:43'),
(198, '17-07-2022', 1657987200, '17-Zulhijjah-1443', '5:42 am', '5:52 am', '7:05 am', '1:14 pm', '4:38 pm', '7:19 pm', '8:33 pm', '2022-04-13 23:02:43'),
(199, '18-07-2022', 1658073600, '18-Zulhijjah-1443', '5:42 am', '5:52 am', '7:05 am', '1:14 pm', '4:38 pm', '7:19 pm', '8:33 pm', '2022-04-13 23:02:43'),
(200, '19-07-2022', 1658160000, '19-Zulhijjah-1443', '5:43 am', '5:53 am', '7:06 am', '1:14 pm', '4:38 pm', '7:19 pm', '8:33 pm', '2022-04-13 23:02:43'),
(201, '20-07-2022', 1658246400, '20-Zulhijjah-1443', '5:43 am', '5:53 am', '7:06 am', '1:14 pm', '4:37 pm', '7:19 pm', '8:33 pm', '2022-04-13 23:02:43'),
(202, '21-07-2022', 1658332800, '21-Zulhijjah-1443', '5:43 am', '5:53 am', '7:06 am', '1:14 pm', '4:37 pm', '7:19 pm', '8:33 pm', '2022-04-13 23:02:43'),
(203, '22-07-2022', 1658419200, '22-Zulhijjah-1443', '5:43 am', '5:53 am', '7:06 am', '1:14 pm', '4:37 pm', '7:19 pm', '8:32 pm', '2022-04-13 23:02:43'),
(204, '23-07-2022', 1658505600, '23-Zulhijjah-1443', '5:43 am', '5:53 am', '7:06 am', '1:14 pm', '4:37 pm', '7:19 pm', '8:32 pm', '2022-04-13 23:02:43'),
(205, '24-07-2022', 1658592000, '24-Zulhijjah-1443', '5:43 am', '5:53 am', '7:06 am', '1:14 pm', '4:37 pm', '7:19 pm', '8:32 pm', '2022-04-13 23:02:43'),
(206, '25-07-2022', 1658678400, '25-Zulhijjah-1443', '5:44 am', '5:54 am', '7:06 am', '1:14 pm', '4:37 pm', '7:19 pm', '8:32 pm', '2022-04-13 23:02:43'),
(207, '26-07-2022', 1658764800, '26-Zulhijjah-1443', '5:44 am', '5:54 am', '7:06 am', '1:14 pm', '4:37 pm', '7:19 pm', '8:32 pm', '2022-04-13 23:02:43'),
(208, '27-07-2022', 1658851200, '27-Zulhijjah-1443', '5:44 am', '5:54 am', '7:06 am', '1:14 pm', '4:37 pm', '7:19 pm', '8:32 pm', '2022-04-13 23:02:43'),
(209, '28-07-2022', 1658937600, '28-Zulhijjah-1443', '5:44 am', '5:54 am', '7:06 am', '1:14 pm', '4:36 pm', '7:19 pm', '8:32 pm', '2022-04-13 23:02:43'),
(210, '29-07-2022', 1659024000, '29-Zulhijjah-1443', '5:44 am', '5:54 am', '7:06 am', '1:14 pm', '4:36 pm', '7:19 pm', '8:32 pm', '2022-04-13 23:02:43'),
(211, '30-07-2022', 1659110400, '01-Muharram-1444', '5:44 am', '5:54 am', '7:06 am', '1:14 pm', '4:36 pm', '7:19 pm', '8:31 pm', '2022-04-13 23:02:43'),
(212, '31-07-2022', 1659196800, '02-Muharram-1444', '5:44 am', '5:54 am', '7:06 am', '1:14 pm', '4:36 pm', '7:19 pm', '8:31 pm', '2022-04-13 23:02:43'),
(213, '01-08-2022', 1659283200, '03-Muharram-1444', '5:44 am', '5:54 am', '7:06 am', '1:14 pm', '4:35 pm', '7:18 pm', '8:31 pm', '2022-04-13 23:02:43'),
(214, '02-08-2022', 1659369600, '04-Muharram-1444', '5:45 am', '5:55 am', '7:06 am', '1:14 pm', '4:35 pm', '7:18 pm', '8:31 pm', '2022-04-13 23:02:43'),
(215, '03-08-2022', 1659456000, '05-Muharram-1444', '5:45 am', '5:55 am', '7:06 am', '1:14 pm', '4:35 pm', '7:18 pm', '8:30 pm', '2022-04-13 23:02:43'),
(216, '04-08-2022', 1659542400, '06-Muharram-1444', '5:45 am', '5:55 am', '7:06 am', '1:14 pm', '4:35 pm', '7:18 pm', '8:30 pm', '2022-04-13 23:02:43'),
(217, '05-08-2022', 1659628800, '07-Muharram-1444', '5:45 am', '5:55 am', '7:06 am', '1:14 pm', '4:34 pm', '7:18 pm', '8:30 pm', '2022-04-13 23:02:43'),
(218, '06-08-2022', 1659715200, '08-Muharram-1444', '5:45 am', '5:55 am', '7:06 am', '1:13 pm', '4:34 pm', '7:18 pm', '8:30 pm', '2022-04-13 23:02:43'),
(219, '07-08-2022', 1659801600, '09-Muharram-1444', '5:45 am', '5:55 am', '7:06 am', '1:13 pm', '4:34 pm', '7:18 pm', '8:29 pm', '2022-04-13 23:02:43'),
(220, '08-08-2022', 1659888000, '10-Muharram-1444', '5:45 am', '5:55 am', '7:06 am', '1:13 pm', '4:33 pm', '7:17 pm', '8:29 pm', '2022-04-13 23:02:43'),
(221, '09-08-2022', 1659974400, '11-Muharram-1444', '5:45 am', '5:55 am', '7:06 am', '1:13 pm', '4:33 pm', '7:17 pm', '8:29 pm', '2022-04-13 23:02:43'),
(222, '10-08-2022', 1660060800, '12-Muharram-1444', '5:45 am', '5:55 am', '7:05 am', '1:13 pm', '4:32 pm', '7:17 pm', '8:29 pm', '2022-04-13 23:02:43'),
(223, '11-08-2022', 1660147200, '13-Muharram-1444', '5:45 am', '5:55 am', '7:05 am', '1:13 pm', '4:32 pm', '7:17 pm', '8:28 pm', '2022-04-13 23:02:43'),
(224, '12-08-2022', 1660233600, '14-Muharram-1444', '5:45 am', '5:55 am', '7:05 am', '1:13 pm', '4:31 pm', '7:17 pm', '8:28 pm', '2022-04-13 23:02:43'),
(225, '13-08-2022', 1660320000, '15-Muharram-1444', '5:45 am', '5:55 am', '7:05 am', '1:13 pm', '4:31 pm', '7:16 pm', '8:28 pm', '2022-04-13 23:02:43'),
(226, '14-08-2022', 1660406400, '16-Muharram-1444', '5:45 am', '5:55 am', '7:05 am', '1:12 pm', '4:30 pm', '7:16 pm', '8:27 pm', '2022-04-13 23:02:43'),
(227, '15-08-2022', 1660492800, '17-Muharram-1444', '5:45 am', '5:55 am', '7:05 am', '1:12 pm', '4:30 pm', '7:16 pm', '8:27 pm', '2022-04-13 23:02:43'),
(228, '16-08-2022', 1660579200, '18-Muharram-1444', '5:45 am', '5:55 am', '7:05 am', '1:12 pm', '4:29 pm', '7:16 pm', '8:27 pm', '2022-04-13 23:02:43'),
(229, '17-08-2022', 1660665600, '19-Muharram-1444', '5:45 am', '5:55 am', '7:05 am', '1:12 pm', '4:29 pm', '7:16 pm', '8:26 pm', '2022-04-13 23:02:43'),
(230, '18-08-2022', 1660752000, '20-Muharram-1444', '5:45 am', '5:55 am', '7:04 am', '1:12 pm', '4:28 pm', '7:15 pm', '8:26 pm', '2022-04-13 23:02:43'),
(231, '19-08-2022', 1660838400, '21-Muharram-1444', '5:45 am', '5:55 am', '7:04 am', '1:11 pm', '4:28 pm', '7:15 pm', '8:26 pm', '2022-04-13 23:02:43'),
(232, '20-08-2022', 1660924800, '22-Muharram-1444', '5:44 am', '5:54 am', '7:04 am', '1:11 pm', '4:27 pm', '7:15 pm', '8:25 pm', '2022-04-13 23:02:43'),
(233, '21-08-2022', 1661011200, '23-Muharram-1444', '5:44 am', '5:54 am', '7:04 am', '1:11 pm', '4:26 pm', '7:14 pm', '8:25 pm', '2022-04-13 23:02:43'),
(234, '22-08-2022', 1661097600, '24-Muharram-1444', '5:44 am', '5:54 am', '7:04 am', '1:11 pm', '4:26 pm', '7:14 pm', '8:24 pm', '2022-04-13 23:02:43'),
(235, '23-08-2022', 1661184000, '25-Muharram-1444', '5:44 am', '5:54 am', '7:03 am', '1:10 pm', '4:25 pm', '7:14 pm', '8:24 pm', '2022-04-13 23:02:43'),
(236, '24-08-2022', 1661270400, '26-Muharram-1444', '5:44 am', '5:54 am', '7:03 am', '1:10 pm', '4:24 pm', '7:13 pm', '8:24 pm', '2022-04-13 23:02:43'),
(237, '25-08-2022', 1661356800, '27-Muharram-1444', '5:44 am', '5:54 am', '7:03 am', '1:10 pm', '4:24 pm', '7:13 pm', '8:23 pm', '2022-04-13 23:02:43'),
(238, '26-08-2022', 1661443200, '28-Muharram-1444', '5:44 am', '5:54 am', '7:03 am', '1:10 pm', '4:23 pm', '7:13 pm', '8:23 pm', '2022-04-13 23:02:43'),
(239, '27-08-2022', 1661529600, '29-Muharram-1444', '5:44 am', '5:54 am', '7:02 am', '1:09 pm', '4:22 pm', '7:13 pm', '8:22 pm', '2022-04-13 23:02:43'),
(240, '28-08-2022', 1661616000, '30-Muharram-1444', '5:43 am', '5:53 am', '7:02 am', '1:09 pm', '4:21 pm', '7:12 pm', '8:22 pm', '2022-04-13 23:02:43'),
(241, '29-08-2022', 1661702400, '01-Safar-1444', '5:43 am', '5:53 am', '7:02 am', '1:09 pm', '4:21 pm', '7:12 pm', '8:22 pm', '2022-04-13 23:02:43'),
(242, '30-08-2022', 1661788800, '02-Safar-1444', '5:43 am', '5:53 am', '7:02 am', '1:08 pm', '4:20 pm', '7:11 pm', '8:21 pm', '2022-04-13 23:02:43'),
(243, '31-08-2022', 1661875200, '03-Safar-1444', '5:43 am', '5:53 am', '7:01 am', '1:08 pm', '4:19 pm', '7:11 pm', '8:21 pm', '2022-04-13 23:02:43'),
(244, '01-09-2022', 1661961600, '04-Safar-1444', '5:43 am', '5:53 am', '7:01 am', '1:08 pm', '4:18 pm', '7:11 pm', '8:20 pm', '2022-04-13 23:02:43'),
(245, '02-09-2022', 1662048000, '05-Safar-1444', '5:42 am', '5:52 am', '7:01 am', '1:08 pm', '4:17 pm', '7:10 pm', '8:20 pm', '2022-04-13 23:02:43'),
(246, '03-09-2022', 1662134400, '06-Safar-1444', '5:42 am', '5:52 am', '7:01 am', '1:07 pm', '4:16 pm', '7:10 pm', '8:19 pm', '2022-04-13 23:02:43'),
(247, '04-09-2022', 1662220800, '07-Safar-1444', '5:42 am', '5:52 am', '7:00 am', '1:07 pm', '4:15 pm', '7:10 pm', '8:19 pm', '2022-04-13 23:02:43'),
(248, '05-09-2022', 1662307200, '08-Safar-1444', '5:42 am', '5:52 am', '7:00 am', '1:07 pm', '4:15 pm', '7:09 pm', '8:18 pm', '2022-04-13 23:02:43'),
(249, '06-09-2022', 1662393600, '09-Safar-1444', '5:42 am', '5:52 am', '7:00 am', '1:06 pm', '4:14 pm', '7:09 pm', '8:18 pm', '2022-04-13 23:02:43'),
(250, '07-09-2022', 1662480000, '10-Safar-1444', '5:41 am', '5:51 am', '7:00 am', '1:06 pm', '4:13 pm', '7:08 pm', '8:18 pm', '2022-04-13 23:02:43'),
(251, '08-09-2022', 1662566400, '11-Safar-1444', '5:41 am', '5:51 am', '6:59 am', '1:06 pm', '4:12 pm', '7:08 pm', '8:17 pm', '2022-04-13 23:02:43'),
(252, '09-09-2022', 1662652800, '12-Safar-1444', '5:41 am', '5:51 am', '6:59 am', '1:05 pm', '4:11 pm', '7:08 pm', '8:17 pm', '2022-04-13 23:02:43'),
(253, '10-09-2022', 1662739200, '13-Safar-1444', '5:41 am', '5:51 am', '6:59 am', '1:05 pm', '4:10 pm', '7:07 pm', '8:16 pm', '2022-04-13 23:02:43'),
(254, '11-09-2022', 1662825600, '14-Safar-1444', '5:40 am', '5:50 am', '6:58 am', '1:05 pm', '4:09 pm', '7:07 pm', '8:16 pm', '2022-04-13 23:02:44'),
(255, '12-09-2022', 1662912000, '15-Safar-1444', '5:40 am', '5:50 am', '6:58 am', '1:04 pm', '4:08 pm', '7:06 pm', '8:15 pm', '2022-04-13 23:02:44'),
(256, '13-09-2022', 1662998400, '16-Safar-1444', '5:40 am', '5:50 am', '6:58 am', '1:04 pm', '4:07 pm', '7:06 pm', '8:15 pm', '2022-04-13 23:02:44'),
(257, '14-09-2022', 1663084800, '17-Safar-1444', '5:40 am', '5:50 am', '6:57 am', '1:03 pm', '4:06 pm', '7:06 pm', '8:14 pm', '2022-04-13 23:02:44'),
(258, '15-09-2022', 1663171200, '18-Safar-1444', '5:39 am', '5:49 am', '6:57 am', '1:03 pm', '4:04 pm', '7:05 pm', '8:14 pm', '2022-04-13 23:02:44'),
(259, '16-09-2022', 1663257600, '19-Safar-1444', '5:39 am', '5:49 am', '6:57 am', '1:03 pm', '4:03 pm', '7:05 pm', '8:14 pm', '2022-04-13 23:02:44'),
(260, '17-09-2022', 1663344000, '20-Safar-1444', '5:39 am', '5:49 am', '6:56 am', '1:02 pm', '4:02 pm', '7:04 pm', '8:13 pm', '2022-04-13 23:02:44'),
(261, '18-09-2022', 1663430400, '21-Safar-1444', '5:38 am', '5:48 am', '6:56 am', '1:02 pm', '4:01 pm', '7:04 pm', '8:13 pm', '2022-04-13 23:02:44'),
(262, '19-09-2022', 1663516800, '22-Safar-1444', '5:38 am', '5:48 am', '6:56 am', '1:02 pm', '4:01 pm', '7:04 pm', '8:12 pm', '2022-04-13 23:02:44'),
(263, '20-09-2022', 1663603200, '23-Safar-1444', '5:38 am', '5:48 am', '6:56 am', '1:01 pm', '4:01 pm', '7:03 pm', '8:12 pm', '2022-04-13 23:02:44'),
(264, '21-09-2022', 1663689600, '24-Safar-1444', '5:38 am', '5:48 am', '6:55 am', '1:01 pm', '4:01 pm', '7:03 pm', '8:12 pm', '2022-04-13 23:02:44'),
(265, '22-09-2022', 1663776000, '25-Safar-1444', '5:37 am', '5:47 am', '6:55 am', '1:00 pm', '4:02 pm', '7:02 pm', '8:11 pm', '2022-04-13 23:02:44'),
(266, '23-09-2022', 1663862400, '26-Safar-1444', '5:37 am', '5:47 am', '6:55 am', '1:00 pm', '4:02 pm', '7:02 pm', '8:11 pm', '2022-04-13 23:02:44'),
(267, '24-09-2022', 1663948800, '27-Safar-1444', '5:37 am', '5:47 am', '6:54 am', '1:00 pm', '4:02 pm', '7:02 pm', '8:10 pm', '2022-04-13 23:02:44'),
(268, '25-09-2022', 1664035200, '28-Safar-1444', '5:36 am', '5:46 am', '6:54 am', '12:59 am', '4:03 pm', '7:01 pm', '8:10 pm', '2022-04-13 23:02:44'),
(269, '26-09-2022', 1664121600, '29-Safar-1444', '5:36 am', '5:46 am', '6:54 am', '12:59 am', '4:03 pm', '7:01 pm', '8:10 pm', '2022-04-13 23:02:44'),
(270, '27-09-2022', 1664208000, '30-Safar-1444', '5:36 am', '5:46 am', '6:53 am', '12:59 am', '4:03 pm', '7:00 pm', '8:09 pm', '2022-04-13 23:02:44'),
(271, '28-09-2022', 1664294400, '01-Rabiulawal-1444', '5:35 am', '5:45 am', '6:53 am', '12:58 am', '4:04 pm', '7:00 pm', '8:09 pm', '2022-04-13 23:02:44'),
(272, '29-09-2022', 1664380800, '02-Rabiulawal-1444', '5:35 am', '5:45 am', '6:53 am', '12:58 am', '4:04 pm', '7:00 pm', '8:08 pm', '2022-04-13 23:02:44'),
(273, '30-09-2022', 1664467200, '03-Rabiulawal-1444', '5:35 am', '5:45 am', '6:53 am', '12:58 am', '4:04 pm', '6:59 pm', '8:08 pm', '2022-04-13 23:02:44'),
(274, '01-10-2022', 1664553600, '04-Rabiulawal-1444', '5:34 am', '5:44 am', '6:52 am', '12:57 am', '4:04 pm', '6:59 pm', '8:08 pm', '2022-04-13 23:02:44'),
(275, '02-10-2022', 1664640000, '05-Rabiulawal-1444', '5:34 am', '5:44 am', '6:52 am', '12:57 am', '4:05 pm', '6:59 pm', '8:07 pm', '2022-04-13 23:02:44'),
(276, '03-10-2022', 1664726400, '06-Rabiulawal-1444', '5:34 am', '5:44 am', '6:52 am', '12:57 am', '4:05 pm', '6:58 pm', '8:07 pm', '2022-04-13 23:02:44'),
(277, '04-10-2022', 1664812800, '07-Rabiulawal-1444', '5:34 am', '5:44 am', '6:51 am', '12:56 am', '4:05 pm', '6:58 pm', '8:07 pm', '2022-04-13 23:02:44'),
(278, '05-10-2022', 1664899200, '08-Rabiulawal-1444', '5:33 am', '5:43 am', '6:51 am', '12:56 am', '4:05 pm', '6:58 pm', '8:06 pm', '2022-04-13 23:02:44'),
(279, '06-10-2022', 1664985600, '09-Rabiulawal-1444', '5:33 am', '5:43 am', '6:51 am', '12:56 am', '4:06 pm', '6:57 pm', '8:06 pm', '2022-04-13 23:02:44'),
(280, '07-10-2022', 1665072000, '10-Rabiulawal-1444', '5:33 am', '5:43 am', '6:51 am', '12:55 am', '4:06 pm', '6:57 pm', '8:06 pm', '2022-04-13 23:02:44'),
(281, '08-10-2022', 1665158400, '11-Rabiulawal-1444', '5:32 am', '5:42 am', '6:50 am', '12:55 am', '4:06 pm', '6:57 pm', '8:06 pm', '2022-04-13 23:02:44'),
(282, '09-10-2022', 1665244800, '12-Rabiulawal-1444', '5:32 am', '5:42 am', '6:50 am', '12:55 am', '4:06 pm', '6:56 pm', '8:05 pm', '2022-04-13 23:02:44'),
(283, '10-10-2022', 1665331200, '13-Rabiulawal-1444', '5:32 am', '5:42 am', '6:50 am', '12:55 am', '4:06 pm', '6:56 pm', '8:05 pm', '2022-04-13 23:02:44'),
(284, '11-10-2022', 1665417600, '14-Rabiulawal-1444', '5:32 am', '5:42 am', '6:50 am', '12:54 am', '4:07 pm', '6:56 pm', '8:05 pm', '2022-04-13 23:02:44'),
(285, '12-10-2022', 1665504000, '15-Rabiulawal-1444', '5:31 am', '5:41 am', '6:50 am', '12:54 am', '4:07 pm', '6:55 pm', '8:05 pm', '2022-04-13 23:02:44'),
(286, '13-10-2022', 1665590400, '16-Rabiulawal-1444', '5:31 am', '5:41 am', '6:49 am', '12:54 am', '4:07 pm', '6:55 pm', '8:04 pm', '2022-04-13 23:02:44'),
(287, '14-10-2022', 1665676800, '17-Rabiulawal-1444', '5:31 am', '5:41 am', '6:49 am', '12:54 am', '4:07 pm', '6:55 pm', '8:04 pm', '2022-04-13 23:02:44'),
(288, '15-10-2022', 1665763200, '18-Rabiulawal-1444', '5:31 am', '5:41 am', '6:49 am', '12:53 am', '4:07 pm', '6:54 pm', '8:04 pm', '2022-04-13 23:02:44'),
(289, '16-10-2022', 1665849600, '19-Rabiulawal-1444', '5:30 am', '5:40 am', '6:49 am', '12:53 am', '4:07 pm', '6:54 pm', '8:04 pm', '2022-04-13 23:02:44'),
(290, '17-10-2022', 1665936000, '20-Rabiulawal-1444', '5:30 am', '5:40 am', '6:49 am', '12:53 am', '4:08 pm', '6:54 pm', '8:04 pm', '2022-04-13 23:02:44'),
(291, '18-10-2022', 1666022400, '21-Rabiulawal-1444', '5:30 am', '5:40 am', '6:48 am', '12:53 am', '4:08 pm', '6:54 pm', '8:03 pm', '2022-04-13 23:02:44'),
(292, '19-10-2022', 1666108800, '22-Rabiulawal-1444', '5:30 am', '5:40 am', '6:48 am', '12:52 am', '4:08 pm', '6:53 pm', '8:03 pm', '2022-04-13 23:02:44'),
(293, '20-10-2022', 1666195200, '23-Rabiulawal-1444', '5:29 am', '5:39 am', '6:48 am', '12:52 am', '4:08 pm', '6:53 pm', '8:03 pm', '2022-04-13 23:02:44'),
(294, '21-10-2022', 1666281600, '24-Rabiulawal-1444', '5:29 am', '5:39 am', '6:48 am', '12:52 am', '4:08 pm', '6:53 pm', '8:03 pm', '2022-04-13 23:02:44'),
(295, '22-10-2022', 1666368000, '25-Rabiulawal-1444', '5:29 am', '5:39 am', '6:48 am', '12:52 am', '4:09 pm', '6:53 pm', '8:03 pm', '2022-04-13 23:02:44'),
(296, '23-10-2022', 1666454400, '26-Rabiulawal-1444', '5:29 am', '5:39 am', '6:48 am', '12:52 am', '4:09 pm', '6:53 pm', '8:03 pm', '2022-04-13 23:02:44'),
(297, '24-10-2022', 1666540800, '27-Rabiulawal-1444', '5:29 am', '5:39 am', '6:48 am', '12:52 am', '4:09 pm', '6:53 pm', '8:03 pm', '2022-04-13 23:02:44'),
(298, '25-10-2022', 1666627200, '28-Rabiulawal-1444', '5:28 am', '5:38 am', '6:48 am', '12:52 am', '4:09 pm', '6:52 pm', '8:03 pm', '2022-04-13 23:02:44'),
(299, '26-10-2022', 1666713600, '29-Rabiulawal-1444', '5:28 am', '5:38 am', '6:47 am', '12:51 am', '4:09 pm', '6:52 pm', '8:03 pm', '2022-04-13 23:02:44'),
(300, '27-10-2022', 1666800000, '01-Rabiulakhir-1444', '5:28 am', '5:38 am', '6:47 am', '12:51 am', '4:09 pm', '6:52 pm', '8:03 pm', '2022-04-13 23:02:44'),
(301, '28-10-2022', 1666886400, '02-Rabiulakhir-1444', '5:28 am', '5:38 am', '6:47 am', '12:51 am', '4:10 pm', '6:52 pm', '8:03 pm', '2022-04-13 23:02:44'),
(302, '29-10-2022', 1666972800, '03-Rabiulakhir-1444', '5:28 am', '5:38 am', '6:47 am', '12:51 am', '4:10 pm', '6:52 pm', '8:02 pm', '2022-04-13 23:02:44'),
(303, '30-10-2022', 1667059200, '04-Rabiulakhir-1444', '5:28 am', '5:38 am', '6:47 am', '12:51 am', '4:10 pm', '6:52 pm', '8:03 pm', '2022-04-13 23:02:44'),
(304, '31-10-2022', 1667145600, '05-Rabiulakhir-1444', '5:27 am', '5:37 am', '6:47 am', '12:51 am', '4:10 pm', '6:52 pm', '8:03 pm', '2022-04-13 23:02:44'),
(305, '01-11-2022', 1667232000, '06-Rabiulakhir-1444', '5:27 am', '5:37 am', '6:47 am', '12:51 am', '4:10 pm', '6:52 pm', '8:03 pm', '2022-04-13 23:02:44'),
(306, '02-11-2022', 1667318400, '07-Rabiulakhir-1444', '5:27 am', '5:37 am', '6:47 am', '12:51 am', '4:11 pm', '6:52 pm', '8:03 pm', '2022-04-13 23:02:44'),
(307, '03-11-2022', 1667404800, '08-Rabiulakhir-1444', '5:27 am', '5:37 am', '6:47 am', '12:51 am', '4:11 pm', '6:52 pm', '8:03 pm', '2022-04-13 23:02:44'),
(308, '04-11-2022', 1667491200, '09-Rabiulakhir-1444', '5:27 am', '5:37 am', '6:47 am', '12:51 am', '4:11 pm', '6:51 pm', '8:03 pm', '2022-04-13 23:02:44'),
(309, '05-11-2022', 1667577600, '10-Rabiulakhir-1444', '5:27 am', '5:37 am', '6:47 am', '12:51 am', '4:11 pm', '6:51 pm', '8:03 pm', '2022-04-13 23:02:44'),
(310, '06-11-2022', 1667664000, '11-Rabiulakhir-1444', '5:27 am', '5:37 am', '6:47 am', '12:51 am', '4:11 pm', '6:51 pm', '8:03 pm', '2022-04-13 23:02:44'),
(311, '07-11-2022', 1667750400, '12-Rabiulakhir-1444', '5:27 am', '5:37 am', '6:48 am', '12:51 am', '4:12 pm', '6:51 pm', '8:03 pm', '2022-04-13 23:02:44'),
(312, '08-11-2022', 1667836800, '13-Rabiulakhir-1444', '5:27 am', '5:37 am', '6:48 am', '12:51 am', '4:12 pm', '6:52 pm', '8:03 pm', '2022-04-13 23:02:44'),
(313, '09-11-2022', 1667923200, '14-Rabiulakhir-1444', '5:27 am', '5:37 am', '6:48 am', '12:51 am', '4:12 pm', '6:52 pm', '8:03 pm', '2022-04-13 23:02:44'),
(314, '10-11-2022', 1668009600, '15-Rabiulakhir-1444', '5:27 am', '5:37 am', '6:48 am', '12:51 am', '4:12 pm', '6:52 pm', '8:04 pm', '2022-04-13 23:02:44'),
(315, '11-11-2022', 1668096000, '16-Rabiulakhir-1444', '5:27 am', '5:37 am', '6:48 am', '12:51 am', '4:13 pm', '6:52 pm', '8:04 pm', '2022-04-13 23:02:44'),
(316, '12-11-2022', 1668182400, '17-Rabiulakhir-1444', '5:27 am', '5:37 am', '6:48 am', '12:52 am', '4:13 pm', '6:52 pm', '8:04 pm', '2022-04-13 23:02:44'),
(317, '13-11-2022', 1668268800, '18-Rabiulakhir-1444', '5:27 am', '5:37 am', '6:48 am', '12:52 am', '4:13 pm', '6:52 pm', '8:04 pm', '2022-04-13 23:02:44'),
(318, '14-11-2022', 1668355200, '19-Rabiulakhir-1444', '5:27 am', '5:37 am', '6:48 am', '12:52 am', '4:14 pm', '6:52 pm', '8:04 pm', '2022-04-13 23:02:44'),
(319, '15-11-2022', 1668441600, '20-Rabiulakhir-1444', '5:27 am', '5:37 am', '6:49 am', '12:52 am', '4:14 pm', '6:52 pm', '8:05 pm', '2022-04-13 23:02:44'),
(320, '16-11-2022', 1668528000, '21-Rabiulakhir-1444', '5:27 am', '5:37 am', '6:49 am', '12:52 am', '4:14 pm', '6:52 pm', '8:05 pm', '2022-04-13 23:02:44'),
(321, '17-11-2022', 1668614400, '22-Rabiulakhir-1444', '5:27 am', '5:37 am', '6:49 am', '12:52 am', '4:14 pm', '6:52 pm', '8:05 pm', '2022-04-13 23:02:44'),
(322, '18-11-2022', 1668700800, '23-Rabiulakhir-1444', '5:27 am', '5:37 am', '6:49 am', '12:53 am', '4:15 pm', '6:53 pm', '8:05 pm', '2022-04-13 23:02:44'),
(323, '19-11-2022', 1668787200, '24-Rabiulakhir-1444', '5:28 am', '5:38 am', '6:50 am', '12:53 am', '4:15 pm', '6:53 pm', '8:06 pm', '2022-04-13 23:02:44'),
(324, '20-11-2022', 1668873600, '25-Rabiulakhir-1444', '5:28 am', '5:38 am', '6:50 am', '12:53 am', '4:15 pm', '6:53 pm', '8:06 pm', '2022-04-13 23:02:44'),
(325, '21-11-2022', 1668960000, '26-Rabiulakhir-1444', '5:28 am', '5:38 am', '6:50 am', '12:53 am', '4:16 pm', '6:53 pm', '8:06 pm', '2022-04-13 23:02:44'),
(326, '22-11-2022', 1669046400, '27-Rabiulakhir-1444', '5:28 am', '5:38 am', '6:50 am', '12:53 am', '4:16 pm', '6:53 pm', '8:07 pm', '2022-04-13 23:02:44'),
(327, '23-11-2022', 1669132800, '28-Rabiulakhir-1444', '5:28 am', '5:38 am', '6:51 am', '12:54 am', '4:16 pm', '6:54 pm', '8:07 pm', '2022-04-13 23:02:44'),
(328, '24-11-2022', 1669219200, '29-Rabiulakhir-1444', '5:28 am', '5:38 am', '6:51 am', '12:54 am', '4:17 pm', '6:54 pm', '8:07 pm', '2022-04-13 23:02:44'),
(329, '25-11-2022', 1669305600, '30-Rabiulakhir-1444', '5:29 am', '5:39 am', '6:51 am', '12:54 am', '4:17 pm', '6:54 pm', '8:08 pm', '2022-04-13 23:02:44'),
(330, '26-11-2022', 1669392000, '01-Jamadilawal-1444', '5:29 am', '5:39 am', '6:52 am', '12:55 am', '4:18 pm', '6:55 pm', '8:08 pm', '2022-04-13 23:02:44');
INSERT INTO `waktusolat` (`id`, `date`, `datestamp`, `hijridate`, `imsak`, `subuh`, `syuruk`, `zohor`, `asar`, `maghrib`, `isyak`, `date_updated`) VALUES
(331, '27-11-2022', 1669478400, '02-Jamadilawal-1444', '5:29 am', '5:39 am', '6:52 am', '12:55 am', '4:18 pm', '6:55 pm', '8:09 pm', '2022-04-13 23:02:44'),
(332, '28-11-2022', 1669564800, '03-Jamadilawal-1444', '5:29 am', '5:39 am', '6:52 am', '12:55 am', '4:18 pm', '6:55 pm', '8:09 pm', '2022-04-13 23:02:44'),
(333, '29-11-2022', 1669651200, '04-Jamadilawal-1444', '5:30 am', '5:40 am', '6:53 am', '12:56 am', '4:19 pm', '6:55 pm', '8:09 pm', '2022-04-13 23:02:44'),
(334, '30-11-2022', 1669737600, '05-Jamadilawal-1444', '5:30 am', '5:40 am', '6:53 am', '12:56 am', '4:19 pm', '6:56 pm', '8:10 pm', '2022-04-13 23:02:44'),
(335, '01-12-2022', 1669824000, '06-Jamadilawal-1444', '5:30 am', '5:40 am', '6:53 am', '12:56 am', '4:20 pm', '6:56 pm', '8:10 pm', '2022-04-13 23:02:44'),
(336, '02-12-2022', 1669910400, '07-Jamadilawal-1444', '5:31 am', '5:41 am', '6:54 am', '12:57 am', '4:20 pm', '6:57 pm', '8:11 pm', '2022-04-13 23:02:44'),
(337, '03-12-2022', 1669996800, '08-Jamadilawal-1444', '5:31 am', '5:41 am', '6:54 am', '12:57 am', '4:20 pm', '6:57 pm', '8:11 pm', '2022-04-13 23:02:44'),
(338, '04-12-2022', 1670083200, '09-Jamadilawal-1444', '5:31 am', '5:41 am', '6:55 am', '12:58 am', '4:21 pm', '6:57 pm', '8:12 pm', '2022-04-13 23:02:44'),
(339, '05-12-2022', 1670169600, '10-Jamadilawal-1444', '5:32 am', '5:42 am', '6:55 am', '12:58 am', '4:21 pm', '6:58 pm', '8:12 pm', '2022-04-13 23:02:44'),
(340, '06-12-2022', 1670256000, '11-Jamadilawal-1444', '5:32 am', '5:42 am', '6:55 am', '12:58 am', '4:22 pm', '6:58 pm', '8:13 pm', '2022-04-13 23:02:44'),
(341, '07-12-2022', 1670342400, '12-Jamadilawal-1444', '5:32 am', '5:42 am', '6:56 am', '12:59 am', '4:22 pm', '6:59 pm', '8:13 pm', '2022-04-13 23:02:44'),
(342, '08-12-2022', 1670428800, '13-Jamadilawal-1444', '5:33 am', '5:43 am', '6:56 am', '12:59 am', '4:23 pm', '6:59 pm', '8:14 pm', '2022-04-13 23:02:44'),
(343, '09-12-2022', 1670515200, '14-Jamadilawal-1444', '5:33 am', '5:43 am', '6:57 am', '1:00 pm', '4:23 pm', '6:59 pm', '8:14 pm', '2022-04-13 23:02:44'),
(344, '10-12-2022', 1670601600, '15-Jamadilawal-1444', '5:33 am', '5:43 am', '6:57 am', '1:00 pm', '4:24 pm', '7:00 pm', '8:14 pm', '2022-04-13 23:02:44'),
(345, '11-12-2022', 1670688000, '16-Jamadilawal-1444', '5:34 am', '5:44 am', '6:58 am', '1:01 pm', '4:24 pm', '7:00 pm', '8:15 pm', '2022-04-13 23:02:44'),
(346, '12-12-2022', 1670774400, '17-Jamadilawal-1444', '5:34 am', '5:44 am', '6:58 am', '1:01 pm', '4:25 pm', '7:01 pm', '8:15 pm', '2022-04-13 23:02:44'),
(347, '13-12-2022', 1670860800, '18-Jamadilawal-1444', '5:35 am', '5:45 am', '6:59 am', '1:01 pm', '4:25 pm', '7:01 pm', '8:16 pm', '2022-04-13 23:02:44'),
(348, '14-12-2022', 1670947200, '19-Jamadilawal-1444', '5:35 am', '5:45 am', '6:59 am', '1:02 pm', '4:26 pm', '7:02 pm', '8:16 pm', '2022-04-13 23:02:44'),
(349, '15-12-2022', 1671033600, '20-Jamadilawal-1444', '5:36 am', '5:46 am', '7:00 am', '1:02 pm', '4:26 pm', '7:02 pm', '8:17 pm', '2022-04-13 23:02:44'),
(350, '16-12-2022', 1671120000, '21-Jamadilawal-1444', '5:36 am', '5:46 am', '7:00 am', '1:03 pm', '4:27 pm', '7:03 pm', '8:17 pm', '2022-04-13 23:02:44'),
(351, '17-12-2022', 1671206400, '22-Jamadilawal-1444', '5:37 am', '5:47 am', '7:01 am', '1:03 pm', '4:27 pm', '7:03 pm', '8:18 pm', '2022-04-13 23:02:44'),
(352, '18-12-2022', 1671292800, '23-Jamadilawal-1444', '5:37 am', '5:47 am', '7:01 am', '1:04 pm', '4:28 pm', '7:04 pm', '8:18 pm', '2022-04-13 23:02:44'),
(353, '19-12-2022', 1671379200, '24-Jamadilawal-1444', '5:38 am', '5:48 am', '7:01 am', '1:04 pm', '4:28 pm', '7:04 pm', '8:19 pm', '2022-04-13 23:02:44'),
(354, '20-12-2022', 1671465600, '25-Jamadilawal-1444', '5:38 am', '5:48 am', '7:02 am', '1:05 pm', '4:29 pm', '7:05 pm', '8:20 pm', '2022-04-13 23:02:44'),
(355, '21-12-2022', 1671552000, '26-Jamadilawal-1444', '5:38 am', '5:48 am', '7:02 am', '1:05 pm', '4:29 pm', '7:05 pm', '8:20 pm', '2022-04-13 23:02:44'),
(356, '22-12-2022', 1671638400, '27-Jamadilawal-1444', '5:39 am', '5:49 am', '7:03 am', '1:06 pm', '4:30 pm', '7:06 pm', '8:21 pm', '2022-04-13 23:02:44'),
(357, '23-12-2022', 1671724800, '28-Jamadilawal-1444', '5:39 am', '5:49 am', '7:03 am', '1:06 pm', '4:30 pm', '7:06 pm', '8:21 pm', '2022-04-13 23:02:44'),
(358, '24-12-2022', 1671811200, '29-Jamadilawal-1444', '5:40 am', '5:50 am', '7:04 am', '1:07 pm', '4:31 pm', '7:07 pm', '8:21 pm', '2022-04-13 23:02:44'),
(359, '25-12-2022', 1671897600, '01-Jamadilakhir-1444', '5:41 am', '5:51 am', '7:04 am', '1:07 pm', '4:31 pm', '7:07 pm', '8:22 pm', '2022-04-13 23:02:44'),
(360, '26-12-2022', 1671984000, '02-Jamadilakhir-1444', '5:41 am', '5:51 am', '7:05 am', '1:08 pm', '4:32 pm', '7:08 pm', '8:22 pm', '2022-04-13 23:02:44'),
(361, '27-12-2022', 1672070400, '03-Jamadilakhir-1444', '5:42 am', '5:52 am', '7:05 am', '1:08 pm', '4:32 pm', '7:08 pm', '8:23 pm', '2022-04-13 23:02:44'),
(362, '28-12-2022', 1672156800, '04-Jamadilakhir-1444', '5:42 am', '5:52 am', '7:06 am', '1:09 pm', '4:33 pm', '7:09 pm', '8:23 pm', '2022-04-13 23:02:44'),
(363, '29-12-2022', 1672243200, '05-Jamadilakhir-1444', '5:43 am', '5:53 am', '7:06 am', '1:09 pm', '4:33 pm', '7:09 pm', '8:24 pm', '2022-04-13 23:02:44'),
(364, '30-12-2022', 1672329600, '06-Jamadilakhir-1444', '5:43 am', '5:53 am', '7:07 am', '1:10 pm', '4:34 pm', '7:10 pm', '8:24 pm', '2022-04-13 23:02:44'),
(365, '31-12-2022', 1672416000, '07-Jamadilakhir-1444', '5:44 am', '5:54 am', '7:07 am', '1:10 pm', '4:34 pm', '7:10 pm', '8:25 pm', '2022-04-13 23:02:44');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `ceramah_list`
--
ALTER TABLE `ceramah_list`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `ceramah_list_video`
--
ALTER TABLE `ceramah_list_video`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `sambutan_hari`
--
ALTER TABLE `sambutan_hari`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `setting_list`
--
ALTER TABLE `setting_list`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `solat_zone`
--
ALTER TABLE `solat_zone`
  ADD PRIMARY KEY (`code`);

--
-- Indexes for table `tema_list`
--
ALTER TABLE `tema_list`
  ADD PRIMARY KEY (`id_tema`);

--
-- Indexes for table `user_list`
--
ALTER TABLE `user_list`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `waktusolat`
--
ALTER TABLE `waktusolat`
  ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `ceramah_list`
--

ALTER TABLE `user_list` ADD UNIQUE(`username`);


ALTER TABLE `ceramah_list`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT;
--
-- AUTO_INCREMENT for table `ceramah_list_video`
--
ALTER TABLE `ceramah_list_video`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT;
--
-- AUTO_INCREMENT for table `sambutan_hari`
--
ALTER TABLE `sambutan_hari`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT;
--
-- AUTO_INCREMENT for table `tema_list`
--
ALTER TABLE `tema_list`
  MODIFY `id_tema` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;
--
-- AUTO_INCREMENT for table `waktusolat`
--
ALTER TABLE `user_list`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT;
--

ALTER TABLE `waktusolat`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=366;
/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
