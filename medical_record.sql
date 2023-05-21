-- phpMyAdmin SQL Dump
-- version 4.8.5
-- https://www.phpmyadmin.net/
--
-- Host: localhost:3308
-- Generation Time: May 21, 2023 at 08:33 PM
-- Server version: 10.1.38-MariaDB
-- PHP Version: 7.3.2

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET AUTOCOMMIT = 0;
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `medical_record`
--

-- --------------------------------------------------------

--
-- Table structure for table `ch_gen_tbl_mst_factory`
--

CREATE TABLE `ch_gen_tbl_mst_factory` (
  `factory_id` bigint(20) NOT NULL,
  `factory_name` varchar(150) NOT NULL,
  `factory_abbr` varchar(50) DEFAULT NULL,
  `factory_location` varchar(100) DEFAULT NULL,
  `factory_address` text,
  `factory_phone` varchar(100) DEFAULT NULL,
  `factory_fax` varchar(100) DEFAULT NULL,
  `created_by` varchar(50) DEFAULT NULL,
  `created_date` datetime DEFAULT NULL,
  `updated_by` varchar(50) DEFAULT NULL,
  `updated_date` datetime DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1 ROW_FORMAT=COMPACT;

--
-- Dumping data for table `ch_gen_tbl_mst_factory`
--

INSERT INTO `ch_gen_tbl_mst_factory` (`factory_id`, `factory_name`, `factory_abbr`, `factory_location`, `factory_address`, `factory_phone`, `factory_fax`, `created_by`, `created_date`, `updated_by`, `updated_date`) VALUES
(1, 'PT Pulau Sambu', 'PSG', 'Sungai Guntung', NULL, NULL, NULL, NULL, NULL, NULL, NULL),
(2, 'PT Pulau Sambu Kuala Enok', 'PSKE', 'Kuala Enok', NULL, NULL, NULL, NULL, NULL, NULL, NULL),
(3, 'PT Riau Sakti United Plantations', 'RSUP', 'Pulau Burung', 'Pulau Burung', '', '', NULL, NULL, 'HARRY', '2016-03-17 10:55:24'),
(4, 'PT. Pulau Sambu Jakarta', 'PSJ', 'Jakarta', 'Jakarta', '', '', 'HARRY', '2016-11-15 16:51:45', NULL, NULL),
(5, 'Singpore', 'SIN', 'Singapore', NULL, NULL, NULL, NULL, NULL, NULL, NULL),
(6, 'PT Sumatra TimurIndonesia', 'STI', 'Sungai Guntung', NULL, NULL, NULL, NULL, NULL, NULL, NULL);

-- --------------------------------------------------------

--
-- Table structure for table `ch_gen_tbl_user`
--

CREATE TABLE `ch_gen_tbl_user` (
  `userid` varchar(50) NOT NULL,
  `userpassword` varchar(50) DEFAULT NULL,
  `groupid` varchar(50) DEFAULT NULL,
  `position_id` int(11) NOT NULL,
  `jabatan` varchar(50) DEFAULT NULL,
  `firstname` varchar(50) DEFAULT NULL,
  `lastname` varchar(25) DEFAULT NULL,
  `mobilenumber` varchar(25) DEFAULT NULL,
  `photo` varchar(50) DEFAULT NULL,
  `email` varchar(50) DEFAULT NULL,
  `approval` bit(1) DEFAULT b'0',
  `notactive` bit(1) DEFAULT b'0',
  `telegramid` varchar(20) DEFAULT NULL,
  `otp` varchar(20) DEFAULT NULL,
  `count_otp_req` int(11) DEFAULT NULL,
  `created_by` varchar(50) DEFAULT NULL,
  `created_date` datetime DEFAULT CURRENT_TIMESTAMP COMMENT 'now()',
  `updated_by` varchar(50) DEFAULT NULL,
  `updated_date` datetime DEFAULT NULL,
  `factory_id` tinyint(4) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `ch_gen_tbl_user`
--

INSERT INTO `ch_gen_tbl_user` (`userid`, `userpassword`, `groupid`, `position_id`, `jabatan`, `firstname`, `lastname`, `mobilenumber`, `photo`, `email`, `approval`, `notactive`, `telegramid`, `otp`, `count_otp_req`, `created_by`, `created_date`, `updated_by`, `updated_date`, `factory_id`) VALUES
('aziz', '6116afedcb0bc31083935c1c262ff4c9', '1', 1, NULL, 'abdul', 'azis', NULL, NULL, NULL, b'0', b'0', NULL, NULL, NULL, NULL, '2023-05-21 19:32:38', NULL, NULL, NULL);

-- --------------------------------------------------------

--
-- Table structure for table `ch_gen_tbl_utl_factory_access`
--

CREATE TABLE `ch_gen_tbl_utl_factory_access` (
  `user_group_id` bigint(20) DEFAULT NULL,
  `factory_id` bigint(20) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 ROW_FORMAT=COMPACT;

--
-- Dumping data for table `ch_gen_tbl_utl_factory_access`
--

INSERT INTO `ch_gen_tbl_utl_factory_access` (`user_group_id`, `factory_id`) VALUES
(1, 1);

-- --------------------------------------------------------

--
-- Table structure for table `ch_gen_tbl_utl_menu_access`
--

CREATE TABLE `ch_gen_tbl_utl_menu_access` (
  `user_group_id` bigint(20) NOT NULL,
  `menu_id` bigint(20) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `ch_gen_tbl_utl_menu_access`
--

INSERT INTO `ch_gen_tbl_utl_menu_access` (`user_group_id`, `menu_id`) VALUES
(1, 1000),
(1, 1100),
(1, 1200),
(1, 2000),
(1, 2100),
(1, 4000),
(1, 4100);

-- --------------------------------------------------------

--
-- Table structure for table `ch_gen_tbl_utl_menu_dtl`
--

CREATE TABLE `ch_gen_tbl_utl_menu_dtl` (
  `menudtl_id` bigint(20) NOT NULL,
  `menudtl_title` varchar(100) NOT NULL,
  `menudtl_link` varchar(150) DEFAULT NULL,
  `menudtl_icon` varchar(50) DEFAULT NULL,
  `column_group` bigint(20) DEFAULT NULL,
  `menuhdr_id` bigint(20) NOT NULL,
  `created_by` varchar(50) DEFAULT NULL,
  `created_date` datetime DEFAULT NULL,
  `updated_by` varchar(50) DEFAULT NULL,
  `updated_date` datetime DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `ch_gen_tbl_utl_menu_dtl`
--

INSERT INTO `ch_gen_tbl_utl_menu_dtl` (`menudtl_id`, `menudtl_title`, `menudtl_link`, `menudtl_icon`, `column_group`, `menuhdr_id`, `created_by`, `created_date`, `updated_by`, `updated_date`) VALUES
(1100, 'Master Obat', 'C_Mst_Obat', 'fa-align-left', NULL, 1000, 'aziz', '2023-05-21 10:50:38', NULL, NULL),
(1200, 'Master Users', 'C_Mst_User', 'fa-database', NULL, 1000, 'aziz', '2023-05-21 10:51:37', NULL, NULL),
(2100, 'Kunjungan', 'C_Medical_Record', 'fa-align-left', NULL, 2000, 'aziz', '2023-05-21 10:53:27', NULL, NULL),
(4100, 'Report Kunjungan', 'C_Report_Kunjungan', 'fa-align-left', NULL, 4000, 'aziz', '2023-05-21 11:46:05', NULL, NULL);

-- --------------------------------------------------------

--
-- Table structure for table `ch_gen_tbl_utl_menu_dtlsub`
--

CREATE TABLE `ch_gen_tbl_utl_menu_dtlsub` (
  `menudtlsub_id` bigint(20) NOT NULL,
  `menudtlsub_title` varchar(100) NOT NULL,
  `menudtlsub_link` varchar(255) NOT NULL,
  `menudtlsub_icon` varchar(100) NOT NULL DEFAULT 'fa-angle-right',
  `menudtl_id` bigint(20) NOT NULL,
  `created_by` varchar(50) DEFAULT NULL,
  `created_date` datetime DEFAULT NULL,
  `updated_by` varchar(50) DEFAULT NULL,
  `updated_date` datetime DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Table structure for table `ch_gen_tbl_utl_menu_hdr`
--

CREATE TABLE `ch_gen_tbl_utl_menu_hdr` (
  `menuhdr_id` bigint(20) NOT NULL,
  `menuhdr_title` varchar(100) NOT NULL,
  `menu_style` varchar(50) DEFAULT NULL,
  `app_id` bigint(20) DEFAULT NULL,
  `created_by` varchar(50) DEFAULT NULL,
  `created_date` datetime DEFAULT NULL,
  `updated_by` varchar(50) DEFAULT NULL,
  `updated_date` datetime DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `ch_gen_tbl_utl_menu_hdr`
--

INSERT INTO `ch_gen_tbl_utl_menu_hdr` (`menuhdr_id`, `menuhdr_title`, `menu_style`, `app_id`, `created_by`, `created_date`, `updated_by`, `updated_date`) VALUES
(1000, 'Master', NULL, NULL, 'aziz', '2023-05-21 10:50:07', NULL, NULL),
(2000, 'Transction', NULL, NULL, 'aziz', '2023-05-21 10:52:51', NULL, NULL),
(4000, 'Report', NULL, NULL, 'aziz', '2023-05-21 11:40:45', NULL, NULL);

-- --------------------------------------------------------

--
-- Table structure for table `ch_gen_tbl_utl_user_group`
--

CREATE TABLE `ch_gen_tbl_utl_user_group` (
  `user_group_id` bigint(20) NOT NULL,
  `user_group_name` varchar(100) NOT NULL,
  `user_group_remark` varchar(255) DEFAULT NULL,
  `not_active` smallint(6) DEFAULT '0',
  `created_by` varchar(50) DEFAULT NULL,
  `created_date` datetime DEFAULT NULL,
  `updated_by` varchar(50) DEFAULT NULL,
  `updated_date` datetime DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `ch_gen_tbl_utl_user_group`
--

INSERT INTO `ch_gen_tbl_utl_user_group` (`user_group_id`, `user_group_name`, `user_group_remark`, `not_active`, `created_by`, `created_date`, `updated_by`, `updated_date`) VALUES
(1, 'Adminstrator', '', 0, 'aziz', '2023-05-21 10:49:10', NULL, NULL);

-- --------------------------------------------------------

--
-- Table structure for table `ch_logs`
--

CREATE TABLE `ch_logs` (
  `log_id` bigint(20) NOT NULL,
  `level` varchar(10) DEFAULT NULL,
  `class_name` varchar(200) DEFAULT NULL,
  `method_name` varchar(100) DEFAULT NULL,
  `message` varchar(100) DEFAULT NULL,
  `new_value` text,
  `old_value` text,
  `exception` text,
  `created_by` varchar(50) DEFAULT NULL,
  `log_date` datetime DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Table structure for table `gen_tbl_mst_factory`
--

CREATE TABLE `gen_tbl_mst_factory` (
  `factory_id` bigint(20) NOT NULL,
  `factory_name` varchar(150) NOT NULL,
  `factory_abbr` varchar(50) DEFAULT NULL,
  `factory_location` varchar(100) DEFAULT NULL,
  `factory_address` text,
  `factory_phone` varchar(100) DEFAULT NULL,
  `factory_fax` varchar(100) DEFAULT NULL,
  `created_by` varchar(50) DEFAULT NULL,
  `created_date` datetime DEFAULT NULL,
  `updated_by` varchar(50) DEFAULT NULL,
  `updated_date` datetime DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Table structure for table `gen_tbl_mst_position`
--

CREATE TABLE `gen_tbl_mst_position` (
  `position_id` bigint(20) NOT NULL,
  `position_name` varchar(50) DEFAULT NULL,
  `position_remark` varchar(255) DEFAULT NULL,
  `created_by` varchar(50) DEFAULT NULL,
  `created_date` datetime DEFAULT NULL,
  `updated_by` varchar(50) DEFAULT NULL,
  `updated_date` datetime DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1 ROW_FORMAT=COMPACT;

--
-- Dumping data for table `gen_tbl_mst_position`
--

INSERT INTO `gen_tbl_mst_position` (`position_id`, `position_name`, `position_remark`, `created_by`, `created_date`, `updated_by`, `updated_date`) VALUES
(1, 'Programmer', 'Software developer for PSS application website', 'HARRY', '2016-03-02 09:35:51', NULL, NULL),
(2, 'Administrator', 'Administrator for PSS application website', 'HARRY', '2016-03-02 09:35:51', NULL, NULL),
(3, 'Sales Person', 'PSS Marketing Sales Person', 'HARRY', '2016-03-02 09:35:51', NULL, NULL),
(4, 'Purchaser', 'PSS Purchaser', 'HARRY', '2016-03-02 09:35:51', NULL, NULL),
(5, 'Accounting', 'PSS Accounting', 'HARRY', '2016-03-02 09:35:51', NULL, NULL),
(6, 'Shipping', 'PSS Shipping', 'DEKI', '2016-03-04 14:28:56', NULL, NULL),
(7, 'Sales Marketing', 'PSS Sales Marketing', 'HARRY', '2016-06-18 13:49:31', NULL, NULL),
(8, 'Shipment Liaison', 'Factory Shipment', 'HARRY', '2017-01-04 15:19:53', NULL, NULL);

-- --------------------------------------------------------

--
-- Table structure for table `setting_web`
--

CREATE TABLE `setting_web` (
  `jadwal_daftar_ulang` date DEFAULT NULL,
  `nama_ketua_panitia` varchar(100) DEFAULT NULL,
  `id` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Table structure for table `tb_anamnesa`
--

CREATE TABLE `tb_anamnesa` (
  `id` int(11) NOT NULL,
  `keluhan` varchar(100) DEFAULT NULL,
  `tinggi_badan` float DEFAULT NULL,
  `berat_badan` float DEFAULT NULL,
  `tekanan_darah` float DEFAULT NULL,
  `pernapasan` float DEFAULT NULL,
  `detak_jantung` float DEFAULT NULL,
  `suhu_tubuh` float DEFAULT NULL,
  `id_pasien` varchar(100) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `tb_anamnesa`
--

INSERT INTO `tb_anamnesa` (`id`, `keluhan`, `tinggi_badan`, `berat_badan`, `tekanan_darah`, `pernapasan`, `detak_jantung`, `suhu_tubuh`, `id_pasien`) VALUES
(1, '', 0, 0, 0, 0, 0, 0, '213213213'),
(2, '', 0, 0, 0, 0, 0, 0, '1404082109960003'),
(3, 'sakit perut', 160, 80, 120, 1210, 121, 12, '1404082109960003'),
(4, 'sakit gigi', 120, 120, 120, 120, 0, 0, '1404082109960003'),
(5, 'sakit perut, pilek, mual', 20, 20, 21, 22, 23, 24, '1404082109960003'),
(6, 'test', 12, 12, 12, 21, 12, 0, '1404082109960003'),
(7, 'test sakit', 180, 80, 120, 20, 2, 22, '1404082109960003');

-- --------------------------------------------------------

--
-- Table structure for table `tb_diagnosa`
--

CREATE TABLE `tb_diagnosa` (
  `id` int(11) NOT NULL,
  `id_pasien` varchar(100) DEFAULT NULL,
  `subjektif` varchar(100) DEFAULT NULL,
  `objektif` varchar(100) DEFAULT NULL,
  `assesment` varchar(100) DEFAULT NULL,
  `planning` varchar(100) DEFAULT NULL,
  `nik` varchar(100) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `tb_diagnosa`
--

INSERT INTO `tb_diagnosa` (`id`, `id_pasien`, `subjektif`, `objektif`, `assesment`, `planning`, `nik`) VALUES
(1, NULL, 'test subjektif', 'test objektif', 'test assesment', 'test planning', '1404082109960003');

-- --------------------------------------------------------

--
-- Table structure for table `tb_obat`
--

CREATE TABLE `tb_obat` (
  `id` int(11) NOT NULL,
  `kode_obat` varchar(100) DEFAULT NULL,
  `nama_obat` varchar(100) DEFAULT NULL,
  `jenis_obat` varchar(100) DEFAULT NULL,
  `harga` double DEFAULT NULL,
  `stok` int(11) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `tb_obat`
--

INSERT INTO `tb_obat` (`id`, `kode_obat`, `nama_obat`, `jenis_obat`, `harga`, `stok`) VALUES
(1, '0012', 'Paracetamol @600ml', 'Paracetamol', 12000, 1000);

-- --------------------------------------------------------

--
-- Table structure for table `tb_pasien`
--

CREATE TABLE `tb_pasien` (
  `id` int(11) NOT NULL,
  `nama_depan` varchar(100) DEFAULT NULL,
  `nama_belakang` varchar(100) DEFAULT NULL,
  `gender` varchar(100) DEFAULT NULL,
  `golongan_darah` varchar(100) DEFAULT NULL,
  `alamat` varchar(100) DEFAULT NULL,
  `catatan` varchar(100) DEFAULT NULL,
  `nik` varchar(100) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `tb_pasien`
--

INSERT INTO `tb_pasien` (`id`, `nama_depan`, `nama_belakang`, `gender`, `golongan_darah`, `alamat`, `catatan`, `nik`) VALUES
(22, 'abdul', 'azis', 'Pria', 'A', 'test', 'test', '1404082109960003');

-- --------------------------------------------------------

--
-- Table structure for table `tb_temp_cart`
--

CREATE TABLE `tb_temp_cart` (
  `id` int(11) DEFAULT NULL,
  `id_obat` int(11) DEFAULT NULL,
  `qty` int(11) DEFAULT NULL,
  `created_by` varchar(100) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `tb_temp_cart`
--

INSERT INTO `tb_temp_cart` (`id`, `id_obat`, `qty`, `created_by`) VALUES
(NULL, 1, 2, NULL);

--
-- Indexes for dumped tables
--

--
-- Indexes for table `ch_gen_tbl_mst_factory`
--
ALTER TABLE `ch_gen_tbl_mst_factory`
  ADD PRIMARY KEY (`factory_id`) USING BTREE;

--
-- Indexes for table `ch_gen_tbl_utl_menu_dtl`
--
ALTER TABLE `ch_gen_tbl_utl_menu_dtl`
  ADD PRIMARY KEY (`menudtl_id`);

--
-- Indexes for table `ch_gen_tbl_utl_menu_dtlsub`
--
ALTER TABLE `ch_gen_tbl_utl_menu_dtlsub`
  ADD PRIMARY KEY (`menudtlsub_id`);

--
-- Indexes for table `ch_gen_tbl_utl_menu_hdr`
--
ALTER TABLE `ch_gen_tbl_utl_menu_hdr`
  ADD PRIMARY KEY (`menuhdr_id`);

--
-- Indexes for table `ch_gen_tbl_utl_user_group`
--
ALTER TABLE `ch_gen_tbl_utl_user_group`
  ADD PRIMARY KEY (`user_group_id`);

--
-- Indexes for table `ch_logs`
--
ALTER TABLE `ch_logs`
  ADD PRIMARY KEY (`log_id`);

--
-- Indexes for table `gen_tbl_mst_factory`
--
ALTER TABLE `gen_tbl_mst_factory`
  ADD PRIMARY KEY (`factory_id`);

--
-- Indexes for table `gen_tbl_mst_position`
--
ALTER TABLE `gen_tbl_mst_position`
  ADD PRIMARY KEY (`position_id`) USING BTREE;

--
-- Indexes for table `setting_web`
--
ALTER TABLE `setting_web`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `tb_anamnesa`
--
ALTER TABLE `tb_anamnesa`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `tb_diagnosa`
--
ALTER TABLE `tb_diagnosa`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `tb_obat`
--
ALTER TABLE `tb_obat`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `tb_pasien`
--
ALTER TABLE `tb_pasien`
  ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `ch_gen_tbl_mst_factory`
--
ALTER TABLE `ch_gen_tbl_mst_factory`
  MODIFY `factory_id` bigint(20) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=7;

--
-- AUTO_INCREMENT for table `ch_gen_tbl_utl_user_group`
--
ALTER TABLE `ch_gen_tbl_utl_user_group`
  MODIFY `user_group_id` bigint(20) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT for table `gen_tbl_mst_factory`
--
ALTER TABLE `gen_tbl_mst_factory`
  MODIFY `factory_id` bigint(20) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `gen_tbl_mst_position`
--
ALTER TABLE `gen_tbl_mst_position`
  MODIFY `position_id` bigint(20) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=9;

--
-- AUTO_INCREMENT for table `setting_web`
--
ALTER TABLE `setting_web`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `tb_anamnesa`
--
ALTER TABLE `tb_anamnesa`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=8;

--
-- AUTO_INCREMENT for table `tb_diagnosa`
--
ALTER TABLE `tb_diagnosa`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT for table `tb_obat`
--
ALTER TABLE `tb_obat`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT for table `tb_pasien`
--
ALTER TABLE `tb_pasien`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=23;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
