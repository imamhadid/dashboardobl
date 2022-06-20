-- phpMyAdmin SQL Dump
-- version 5.1.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Jun 17, 2022 at 09:05 AM
-- Server version: 10.4.22-MariaDB
-- PHP Version: 8.0.13

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `db_dashboardobl`
--

-- --------------------------------------------------------

--
-- Table structure for table `account`
--

CREATE TABLE `account` (
  `id` int(11) NOT NULL,
  `nama` varchar(255) DEFAULT NULL,
  `username` varchar(255) DEFAULT NULL,
  `password` varchar(255) DEFAULT NULL,
  `level` enum('admin','witel','mitra','') NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `account`
--

INSERT INTO `account` (`id`, `nama`, `username`, `password`, `level`) VALUES
(1, 'Admin OBL 1', 'adminobl1', 'akunobl1', 'admin'),
(2, 'Admin OBL 2', 'adminobl2', 'akunobl2', 'admin'),
(3, 'Admin PJM', 'adminpjm', 'akunpjm', 'admin'),
(4, 'Witel Bpp', 'witelbpp', 'akunbpp', 'witel'),
(5, 'Witel Smd', 'witelsmd', 'akunsmd', 'witel'),
(6, 'Witel Kalsel', 'witelkalsel', 'akunkalsel', 'witel'),
(7, 'Witel Kalbar', 'witelkalbar', 'akunkalbar', 'witel'),
(8, 'Witel Kalteng', 'witelkalteng', 'akunkalteng', 'witel'),
(9, 'Witel Kaltara', 'witelkaltara', 'akunkaltara', 'witel'),
(10, 'Prima Com Interbuana', 'mitra1', 'akunmitra1', 'mitra'),
(11, 'AP POLITEKNIK NEGERI SANGGAU 2022', 'mitra2', 'akunmitra2', 'mitra'),
(12, 'POLITEKNIK NEGERI PONTIANAK', 'mitra3', 'akunmitra3', 'mitra'),
(13, '-', 'mitra4', 'akunmitra4', 'mitra'),
(14, 'Universitas Tanjungpura', 'mitra5', 'akunmitra5', 'mitra'),
(15, 'UNTAN PELATIHAN IN HOUSE', 'mitra6', 'akunmitra6', 'mitra'),
(16, 'UIN Antasari', 'mitra7', 'akunmitra7', 'mitra'),
(17, 'PT PHKT', 'mitra8', 'akunmitra8', 'mitra'),
(18, 'PT Pertamina Kilang Internasional', 'mitra9', 'akunmitra9', 'mitra'),
(19, 'PT Adimitra Baratama Nusantara', 'mitra10', 'akunmitra10', 'mitra'),
(20, 'Bank Pembangunan Daerah Kaltim Kaltara', 'mitra11', 'akunmitra11', 'mitra'),
(21, 'PT LADANG RUMPUN SUBUR ABADI', 'mitra12', 'akunmitra12', 'mitra'),
(22, 'JHONLIN GROUP\nCARAVAN ETEGRA CNC', 'mitra13', 'akunmitra13', 'mitra'),
(23, 'JHONLIN GROUP\nCARAVAN ITASCA CNC', 'mitra14', 'akunmitra14', 'mitra'),
(24, 'BAPEDA KALSEL', 'mitra15', 'akunmitra15', 'mitra'),
(25, 'DIstrik Kelas 1 Samarinda', 'mitra16', 'akunmitra16', 'mitra'),
(26, 'Diskominfo Kukar', 'mitra17', 'akunmitra17', 'mitra'),
(27, 'LPSE Kalsel', 'mitra18', 'akunmitra18', 'mitra'),
(28, 'LPPL TV Tabalong', 'mitra19', 'akunmitra19', 'mitra'),
(29, 'Dinas Kesehatan Pemkot Balikpapan', 'mitra20', 'akunmitra20', 'mitra'),
(30, 'PT. Kalimantan Besi Baja', 'mitra21', 'akunmitra21', 'mitra'),
(31, 'SMKN 1 Pasak Taliwang Kapuas', 'mitra22', 'akunmitra22', 'mitra'),
(32, 'PT Perdana Teknologi Persada', 'mitra23', 'akunmitra23', 'mitra'),
(33, 'PT Abdi Borneo Palntation Site APOM', 'mitra24', 'akunmitra24', 'mitra'),
(34, 'PT ARANA TEKNOLOGI INDONESIA', 'mitra25', 'akunmitra25', 'mitra'),
(35, 'Bend. Desa Belawaian', 'mitra26', 'akunmitra26', 'mitra'),
(36, 'STT MIGAS BALIKPAPAN', 'mitra27', 'akunmitra27', 'mitra'),
(37, 'CV Amanta Karya', 'mitra28', 'akunmitra28', 'mitra'),
(38, 'Permata Indah Energi', 'mitra29', 'akunmitra29', 'mitra'),
(39, 'Perpanjangan Orica Mining Service', 'mitra30', 'akunmitra30', 'mitra'),
(40, 'SMK TI LABBAIKA', 'mitra31', 'akunmitra31', 'mitra'),
(41, 'SMAN 1 HULU SUNGAI', 'mitra32', 'akunmitra32', 'mitra'),
(42, 'PT KAPUAS PRIMA COAL', 'mitra33', 'akunmitra33', 'mitra');

-- --------------------------------------------------------

--
-- Table structure for table `report_obl`
--

CREATE TABLE `report_obl` (
  `id` int(2) DEFAULT NULL,
  `proses` varchar(5) DEFAULT NULL,
  `tanggal_update` varchar(11) DEFAULT NULL,
  `no_folder` varchar(6) DEFAULT NULL,
  `jenis_spk` varchar(2) DEFAULT NULL,
  `nama_pelanggan` varchar(38) DEFAULT NULL,
  `jenis_layanan` varchar(31) DEFAULT NULL,
  `nama_vendor` varchar(19) DEFAULT NULL,
  `jangka_waktu` int(2) DEFAULT NULL,
  `nilai_kb` int(10) DEFAULT NULL,
  `no_kfs` varchar(57) DEFAULT NULL,
  `no_kl` varchar(32) DEFAULT NULL,
  `pic` varchar(19) DEFAULT NULL,
  `status` varchar(10) DEFAULT NULL,
  `witel` varchar(10) DEFAULT NULL,
  `keterangan` varchar(10) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `report_obl`
--

INSERT INTO `report_obl` (`id`, `proses`, `tanggal_update`, `no_folder`, `jenis_spk`, `nama_pelanggan`, `jenis_layanan`, `nama_vendor`, `jangka_waktu`, `nilai_kb`, `no_kfs`, `no_kl`, `pic`, `status`, `witel`, `keterangan`) VALUES
(1, 'OBL', '27-Apr-2022', '22001A', 'KL', 'Prima Com Interbuana', 'Radio IP dan CPE', 'PINS', 12, 888594240, 'K.TEL.565/HK.810/TR6-W500/2021', NULL, 'Farouk', NULL, 'KALSEL', NULL),
(2, 'OBL', '2-Feb-2022', '22001B', 'KL', 'Prima Com Interbuana', 'Radio IP (Licensed)', 'WAVECOMINDO', 8, 439051200, 'K.TEL.12/HK.820/TR6-W511/2022', NULL, NULL, NULL, 'KALSEL', NULL),
(3, 'OBL', '2-Feb-2022', '22001C', 'KL', 'Prima Com Interbuana', 'Radio Ip (Unlicensed)', 'WAVECOMINDO', NULL, 1804391100, '-', NULL, NULL, NULL, 'KALSEL', NULL),
(4, 'MITRA', '14-Apr-2022', '22002', 'SP', 'AP POLITEKNIK NEGERI SANGGAU 2022', 'AP', 'KOPKAR SMART MEDIA', 12, 199700000, '0007PL16KUPPK22022_01', 'K.TEL.0084/HK.810/TR6-R604/2021', 'ISSA', NULL, 'KALBAR', NULL),
(5, 'MITRA', '22-Jan-2022', '22003A', 'KL', 'POLITEKNIK NEGERI PONTIANAK', 'SMS BLAST', 'INFOMEDIA', 9, 102597408, '0004/PL16/KU/PPK.2/2022', 'K.TEL.0122/HK.810/TR6-R600/2022', NULL, NULL, 'KALBAR', NULL),
(6, 'MITRA', '6-Apr-2022', '22003B', 'KL', 'POLITEKNIK NEGERI PONTIANAK', 'PENGADAAN PERANGKAT ICT', 'KOPKAR SMART MEDIA', 1, 762121212, '0004/PL16/KU/PPK.2/2022', 'K.TEL.0123/HK.810/TR6-R600/2022', NULL, NULL, 'KALBAR', NULL),
(7, 'WITEL', '25-Jan-2022', '22004', NULL, '-', '-', NULL, NULL, 240700800, '-', NULL, NULL, NULL, 'KALTARA', NULL),
(8, 'MITRA', '3-Feb-2022', '22005A', 'KL', 'Universitas Tanjungpura', 'Back Up Internet', 'INDOSAT', 12, 1438350000, '-', 'K.TEL. 101/HK.810/TR6-R001/2022', 'Frida', NULL, 'KALBAR', NULL),
(9, 'MITRA', '6-Apr-2022', '22005B', 'KL', 'Universitas Tanjungpura', 'PENGADAAN UNTAN', 'KOPKAR SMART MEDIA', 12, 902113128, 'TEL45HK820TR6W4002022_02', 'K.TEL. 0402/HK.810/TR6-R600/2022', 'Issa', NULL, 'KALBAR', NULL),
(10, 'MITRA', '28-Mar-2022', '22005C', 'SP', 'UNTAN PELATIHAN IN HOUSE', 'PELATIHAN IN HOUSE', 'TPCC', 12, 107499996, 'Tel. 45/HK820/TR6-W400/2022', 'K.TEL.0363/HK.810/TR6-R600/2022', 'Ismi', NULL, 'KALBAR', NULL),
(11, 'OBL', NULL, '22006', NULL, '-', '-', NULL, NULL, 455047324, '-', NULL, NULL, NULL, 'KALTARA', NULL),
(12, 'MITRA', '22-Feb-2022', '22007A', 'KL', 'UIN Antasari', 'Wireless Controller', 'KOPKAR SMART MEDIA', 10, 448096320, '108/Un.14/I.1/01/2022', NULL, 'Issa', NULL, 'KALSEL', NULL),
(13, 'MITRA', '21-Feb-2022', '22007B', 'KL', 'UIN Antasari', 'Pelatihan', 'TPCC', 12, 168642000, '108/Un.14/I.1/01/2022', 'K.TEL.1082/HK.810/TR6-R600/2022', 'Arga / Ismi', NULL, 'KALSEL', NULL),
(14, 'OBL', '8-Mar-2022', '22008', 'KL', 'PT PHKT', 'IT Services dan Link', 'KOPEGTEL BALIKPAPAN', 24, 344303400, '-', NULL, NULL, NULL, 'BALIKPAPAN', NULL),
(15, 'MITRA', '22-Apr-2022', '22009A', 'KL', 'PT Pertamina Kilang Internasional', 'Collocation', 'MITRATEL', 24, 147600000, 'K.TEL.10644/HK.810/TR6-W113/2021', NULL, 'asdelisa', NULL, 'BALIKPAPAN', NULL),
(16, 'PJM', '26-Apr-2022', '22009B', 'KL', 'PT Pertamina Kilang Internasional', 'Manage IT Service', 'KOPEGTEL BALIKPAPAN', 24, 285408000, 'K.TEL.10644/HK.810/TR6-W113/2021', 'K.TEL. 7108/HK.810/TR6-R600/2021', NULL, NULL, 'BALIKPAPAN', NULL),
(17, 'PJM', '7-Apr-2022', '22010', 'KL', 'PT Adimitra Baratama Nusantara', 'IT Services', 'KOPEGTEL BALIKPAPAN', 24, 180000000, 'K.TEL.10183/HK.810/TR6-W112/2021', 'K.TEL.6824/HK.810/TR6-R600/2021', NULL, NULL, 'BALIKPAPAN', NULL),
(18, 'OBL', '16-Mar-2022', '22011', 'WO', 'Bank Pembangunan Daerah Kaltim Kaltara', 'VSAT KU-Band', 'TELKOMSAT', 12, 54000000, 'K.TEL.433/HK.810/TR6-W612/2022', 'K.TEL.4868/HK.820/TR6-R600/2022', 'Dwi', NULL, NULL, NULL),
(19, NULL, NULL, NULL, NULL, '-', '-', NULL, NULL, NULL, '-', NULL, NULL, NULL, NULL, NULL),
(20, NULL, NULL, NULL, NULL, '-', '-', NULL, NULL, NULL, '-', NULL, NULL, NULL, NULL, NULL),
(21, 'DONE', '6-Apr-2022', '22014', 'WO', 'PT LADANG RUMPUN SUBUR ABADI', 'RADIO IP', 'TELKOMSAT', 12, 105000000, 'K.TEL.1400/HK.820/TR6-W100/2021 - K.TEL.', 'K.TEL.1642/HK.820/TR6-R600/2022', NULL, NULL, NULL, NULL),
(22, 'OBL', '17-May-2022', '22015', 'WO', 'JHONLIN GROUP\nCARAVAN ETEGRA CNC', 'VSAT IP', 'TELKOMSAT', 12, 330000000, 'K.TEL.103/HK.820/TR6-W511/2022', 'K.TEL.3161/HK.820/TR6-R600/2022', NULL, NULL, NULL, NULL),
(23, 'OBL', '17-May-2022', '22016', 'WO', 'JHONLIN GROUP\nCARAVAN ITASCA CNC', 'VSAT', 'TELKOMSAT', 12, 330000000, 'K.TEL.104/HK.820/TR6-W511/2022', 'K.TEL.3162/HK.820/TR6-R600/2022', NULL, NULL, NULL, NULL),
(24, 'DONE', '8-Mar-2022', '22001', 'WO', 'BAPEDA KALSEL', 'V Machine', 'SIGMA', 12, 179335200, '-', 'K.TEL.0083/HK.820/TR6-R600/2022', 'Herry', NULL, 'KALSEL', NULL),
(25, 'DONE', '26-Apr-2022', '22002A', 'KL', 'DIstrik Kelas 1 Samarinda', 'Radio IP', 'WAVECOMINDO', 12, 155544000, 'K.TEL.0010/HK.820/TR6-W209/2022', 'K.TEL.0441/HK.820/TR6-R600/2022', NULL, NULL, 'SAMARINDA', NULL),
(26, 'MITRA', '10-Feb-2022', '22002B', 'WO', 'DIstrik Kelas 1 Samarinda', 'VSAT', 'TELKOMSAT', 12, 684000000, 'K.TEL.0010/HK.820/TR6-W209/2022', 'K.TEL.0364/HK.820/TR6-R600/2022', 'Dwi / anita', NULL, 'SAMARINDA', NULL),
(27, 'WITEL', '10-Feb-2022', '22003A', 'KL', 'DIstrik Kelas 1 Samarinda', 'Radio IP', 'CEMITEL', 10, 104500000, 'K.TEL.0028/HK.820/TR6-W209/2022', 'K.TEL.0403/HK.810/TR6-R600/2022', 'Gema', NULL, 'SAMARINDA', NULL),
(28, 'MITRA', '10-Feb-2022', '22003B', 'KL', 'DIstrik Kelas 1 Samarinda', 'Collocation', 'MITRATEL', 10, 52496400, 'K.TEL.0028/HK.820/TR6-W209/2022', 'K.TEL.0404/HK.810/TR6-R600/2022', 'asdelisa', NULL, 'SAMARINDA', NULL),
(29, 'PJM', '18-Mar-2022', '22004A', 'WO', 'Diskominfo Kukar', 'EOS dan Manage Service Jaringan', 'PUTRA BISTEL', 12, 216193536, 'K.TEL.2591/HK.810/TR6-W612/2021', 'K.TEL.7244/HK.810/TR6-R600/2021', 'Eko', NULL, 'SAMARINDA', NULL),
(30, 'MITRA', '23-May-2022', '22004B', 'KL', 'Diskominfo Kukar', 'Pelatihan TPCC', 'TPCC', 9, 270241920, 'K.TEL.2591/HK.810/TR6-W612/2021', 'K.TEL.7245/HK.810/TR6-R600/2021', 'Ismi', NULL, 'SAMARINDA', NULL),
(31, 'MITRA', '14-Apr-2022', '22005', 'WO', 'LPSE Kalsel', 'Collocation', 'SIGMA', 12, 440488221, 'K.TEL.563/HK.820/TR6-W512/2021', 'K.TEL.7064/HK.820/TR6-R600/2021', 'herry', NULL, '-', NULL),
(32, 'DONE', '4-Apr-2022', '22006', 'WO', 'LPPL TV Tabalong', 'MCPC', 'TELKOMSAT', 12, 436363632, 'K.TEL.019/HK.810/TR6-W512/2022', 'K.TEL.0126/HK.810/TR6-R600/2022', NULL, NULL, '-', NULL),
(33, 'OBL', '29-Mar-2022', '22007', NULL, 'Dinas Kesehatan Pemkot Balikpapan', 'Admin Support', 'KOPEGTEL BALIKPAPAN', 12, 1032240000, 'K.TEL.10742/HK.820/TR6-WR112/2021', 'K.TEL.0441/HK.820/TR6-R600/2022', 'Ika', NULL, '-', NULL),
(34, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, '-', NULL, NULL, NULL, '-', NULL),
(35, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, '-', NULL, NULL, NULL, '-', NULL),
(36, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, '-', NULL, NULL, NULL, '-', NULL),
(37, 'OBL', '18-May-2022', '22011B', 'SP', NULL, 'PERANGKAT KERJA', 'SUMBER SOLUSINDO', 12, NULL, '-', NULL, NULL, NULL, '-', NULL),
(38, 'OBL', '14-Apr-2022', '22012', 'WO', NULL, 'VMACHINE', 'SIGMA', 12, 71200000, 'K.TEL.043/HK810/TR6-W512/2022', 'K.TEL.0164/HK.810/TR6-R600/2022', 'MAS HERRY', NULL, '-', NULL),
(39, 'MITRA', '24-May-2022', '22001', 'KL', 'PT. Kalimantan Besi Baja', 'Radio IP', 'WAVECOMINDO', 12, 530077350, 'K.TEL.955/HK.810/TR6-W308/2021 - 045/KBB/XII/2021', 'di review mitra', NULL, NULL, 'KALTARA', NULL),
(40, 'OBL', '21-Jan-2022', '22002', 'WO', 'SMKN 1 Pasak Taliwang Kapuas', 'MangoSKy', 'TELKOMSAT', NULL, 40150000, NULL, NULL, NULL, NULL, 'KALTENG', NULL),
(41, 'OBL', '14-Feb-2022', '22003', 'SP', 'PT Perdana Teknologi Persada', 'Collocation', 'MITRATEL', NULL, 94938800, NULL, NULL, NULL, NULL, 'KALTENG', NULL),
(42, 'MITRA', '15-Mar-2022', '22004', 'KL', 'PT Abdi Borneo Palntation Site APOM', 'GSM Repeater', 'CEMITEL', 1, 34100000, 'K.TEL.0957/HK.810/TR6-W111/2022', NULL, NULL, NULL, 'BALIKPAPAN', NULL),
(43, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL),
(44, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL),
(45, 'MITRA', '24-May-2022', '22007', 'SP', 'PT ARANA TEKNOLOGI INDONESIA', 'COLLOCATION', 'MITRATEL', 12, 34067000, 'K.TEL.213/HK.810/TR6-W611/2022', 'K.TEL.0641/HK.810/TR6-R600/2022', NULL, NULL, NULL, NULL),
(46, 'OBL', '25-Apr-2022', '22008', 'WO', 'Bend. Desa Belawaian', 'Mangoesky', 'TELKOMSAT', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL),
(47, 'MITRA', '26-Apr-2022', '22009', 'SP', 'STT MIGAS BALIKPAPAN', 'ACCESS POINT', 'CEMITEL', 1, 43560000, 'K.TEL.2231/HK810/TR6-W111/2022', 'K.TEL.3014/HK.810/TR6-R600/2022', NULL, NULL, NULL, NULL),
(48, 'OBL', '22-Mar-2022', '22010', 'SP', 'CV Amanta Karya', 'COLLOCATION', 'MITRATEL', 12, 0, NULL, NULL, NULL, NULL, NULL, NULL),
(49, 'OBL', '6-Apr-2022', '22011', 'SP', 'Permata Indah Energi', 'COLLOCATION', 'MITRATEL', 12, 0, NULL, NULL, NULL, NULL, NULL, NULL),
(50, 'OBL', '13-Apr-2022', '22012A', 'SP', 'Perpanjangan Orica Mining Service', 'COLLOCATION', 'MITRATEL', 12, NULL, NULL, NULL, NULL, NULL, NULL, NULL),
(51, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL),
(52, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL),
(53, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL),
(54, 'MITRA', '26-Apr-2022', '22016', 'SP', 'SMK TI LABBAIKA', 'FIBER OPTIK', 'TPCC', 12, 89008500, 'TEL.800/HK.810/TR6-W611/2022 - 1213/SMK.TI.L/MOU/III/2022', 'K.TEL.3441/HK.810/TR6-R600/2022', 'MAS RIDWAN\nMAS ARGA', NULL, NULL, NULL),
(55, 'MITRA', '30-May-2022', '22017', 'WO', 'SMAN 1 HULU SUNGAI', 'MANGOESKY', 'TELKOMSAT', 12, 17260000, 'K.TEL.277/HK.820/TR6-W411/2022', 'K.TEL.2481/HK.810/TR6-R600/2022', 'MAS JAMAL', NULL, NULL, NULL),
(56, 'MITRA', '30-May-2022', '22018', 'WO', 'PT KAPUAS PRIMA COAL', 'VSAT', 'TELKOMSAT', 12, 102000000, 'K.TEL.2077/HK.810/TR6-W208/2022', 'K.TEL.4601/HK.810/TR6-R600/2022', 'MAS JAMAL', NULL, NULL, NULL);

--
-- Indexes for dumped tables
--

--
-- Indexes for table `account`
--
ALTER TABLE `account`
  ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `account`
--
ALTER TABLE `account`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=43;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
