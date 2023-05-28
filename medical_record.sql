#
# TABLE STRUCTURE FOR: ch_gen_tbl_mst_factory
#

DROP TABLE IF EXISTS `ch_gen_tbl_mst_factory`;

CREATE TABLE `ch_gen_tbl_mst_factory` (
  `factory_id` bigint(20) NOT NULL AUTO_INCREMENT,
  `factory_name` varchar(150) NOT NULL,
  `factory_abbr` varchar(50) DEFAULT NULL,
  `factory_location` varchar(100) DEFAULT NULL,
  `factory_address` text DEFAULT NULL,
  `factory_phone` varchar(100) DEFAULT NULL,
  `factory_fax` varchar(100) DEFAULT NULL,
  `created_by` varchar(50) DEFAULT NULL,
  `created_date` datetime DEFAULT NULL,
  `updated_by` varchar(50) DEFAULT NULL,
  `updated_date` datetime DEFAULT NULL,
  PRIMARY KEY (`factory_id`) USING BTREE
) ENGINE=InnoDB AUTO_INCREMENT=7 DEFAULT CHARSET=latin1 COLLATE=latin1_swedish_ci ROW_FORMAT=COMPACT;

INSERT INTO `ch_gen_tbl_mst_factory` (`factory_id`, `factory_name`, `factory_abbr`, `factory_location`, `factory_address`, `factory_phone`, `factory_fax`, `created_by`, `created_date`, `updated_by`, `updated_date`) VALUES ('1', 'PT Pulau Sambu', 'PSG', 'Sungai Guntung', NULL, NULL, NULL, NULL, NULL, NULL, NULL);
INSERT INTO `ch_gen_tbl_mst_factory` (`factory_id`, `factory_name`, `factory_abbr`, `factory_location`, `factory_address`, `factory_phone`, `factory_fax`, `created_by`, `created_date`, `updated_by`, `updated_date`) VALUES ('2', 'PT Pulau Sambu Kuala Enok', 'PSKE', 'Kuala Enok', NULL, NULL, NULL, NULL, NULL, NULL, NULL);
INSERT INTO `ch_gen_tbl_mst_factory` (`factory_id`, `factory_name`, `factory_abbr`, `factory_location`, `factory_address`, `factory_phone`, `factory_fax`, `created_by`, `created_date`, `updated_by`, `updated_date`) VALUES ('3', 'PT Riau Sakti United Plantations', 'RSUP', 'Pulau Burung', 'Pulau Burung', '', '', NULL, NULL, 'HARRY', '2016-03-17 10:55:24');
INSERT INTO `ch_gen_tbl_mst_factory` (`factory_id`, `factory_name`, `factory_abbr`, `factory_location`, `factory_address`, `factory_phone`, `factory_fax`, `created_by`, `created_date`, `updated_by`, `updated_date`) VALUES ('4', 'PT. Pulau Sambu Jakarta', 'PSJ', 'Jakarta', 'Jakarta', '', '', 'HARRY', '2016-11-15 16:51:45', NULL, NULL);
INSERT INTO `ch_gen_tbl_mst_factory` (`factory_id`, `factory_name`, `factory_abbr`, `factory_location`, `factory_address`, `factory_phone`, `factory_fax`, `created_by`, `created_date`, `updated_by`, `updated_date`) VALUES ('5', 'Singpore', 'SIN', 'Singapore', NULL, NULL, NULL, NULL, NULL, NULL, NULL);
INSERT INTO `ch_gen_tbl_mst_factory` (`factory_id`, `factory_name`, `factory_abbr`, `factory_location`, `factory_address`, `factory_phone`, `factory_fax`, `created_by`, `created_date`, `updated_by`, `updated_date`) VALUES ('6', 'PT Sumatra TimurIndonesia', 'STI', 'Sungai Guntung', NULL, NULL, NULL, NULL, NULL, NULL, NULL);


#
# TABLE STRUCTURE FOR: ch_gen_tbl_user
#

DROP TABLE IF EXISTS `ch_gen_tbl_user`;

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
  `created_date` datetime DEFAULT current_timestamp() COMMENT 'now()',
  `updated_by` varchar(50) DEFAULT NULL,
  `updated_date` datetime DEFAULT NULL,
  `factory_id` tinyint(4) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1 COLLATE=latin1_swedish_ci;

INSERT INTO `ch_gen_tbl_user` (`userid`, `userpassword`, `groupid`, `position_id`, `jabatan`, `firstname`, `lastname`, `mobilenumber`, `photo`, `email`, `approval`, `notactive`, `telegramid`, `otp`, `count_otp_req`, `created_by`, `created_date`, `updated_by`, `updated_date`, `factory_id`) VALUES ('aziz', '6116afedcb0bc31083935c1c262ff4c9', '1', 1, NULL, 'abdul', 'azis', NULL, NULL, NULL, '0', '0', NULL, NULL, NULL, NULL, '2023-05-21 19:32:38', NULL, NULL, NULL);
INSERT INTO `ch_gen_tbl_user` (`userid`, `userpassword`, `groupid`, `position_id`, `jabatan`, `firstname`, `lastname`, `mobilenumber`, `photo`, `email`, `approval`, `notactive`, `telegramid`, `otp`, `count_otp_req`, `created_by`, `created_date`, `updated_by`, `updated_date`, `factory_id`) VALUES ('admin', '6116afedcb0bc31083935c1c262ff4c9', NULL, 0, NULL, 'adminstrator', NULL, NULL, NULL, NULL, '0', '0', NULL, NULL, NULL, NULL, '2023-05-28 00:45:15', NULL, NULL, NULL);
INSERT INTO `ch_gen_tbl_user` (`userid`, `userpassword`, `groupid`, `position_id`, `jabatan`, `firstname`, `lastname`, `mobilenumber`, `photo`, `email`, `approval`, `notactive`, `telegramid`, `otp`, `count_otp_req`, `created_by`, `created_date`, `updated_by`, `updated_date`, `factory_id`) VALUES ('faisal', '8843028fefce50a6de50acdf064ded27', NULL, 0, NULL, 'muhammad faisal', NULL, NULL, NULL, NULL, '0', '0', NULL, NULL, NULL, NULL, '2023-05-28 01:03:07', NULL, NULL, NULL);


#
# TABLE STRUCTURE FOR: ch_gen_tbl_utl_factory_access
#

DROP TABLE IF EXISTS `ch_gen_tbl_utl_factory_access`;

CREATE TABLE `ch_gen_tbl_utl_factory_access` (
  `user_group_id` bigint(20) DEFAULT NULL,
  `factory_id` bigint(20) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_general_ci ROW_FORMAT=COMPACT;

INSERT INTO `ch_gen_tbl_utl_factory_access` (`user_group_id`, `factory_id`) VALUES ('1', '1');


#
# TABLE STRUCTURE FOR: ch_gen_tbl_utl_menu_access
#

DROP TABLE IF EXISTS `ch_gen_tbl_utl_menu_access`;

CREATE TABLE `ch_gen_tbl_utl_menu_access` (
  `user_group_id` bigint(20) NOT NULL,
  `menu_id` bigint(20) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1 COLLATE=latin1_swedish_ci;

INSERT INTO `ch_gen_tbl_utl_menu_access` (`user_group_id`, `menu_id`) VALUES ('1', '1000');
INSERT INTO `ch_gen_tbl_utl_menu_access` (`user_group_id`, `menu_id`) VALUES ('1', '1100');
INSERT INTO `ch_gen_tbl_utl_menu_access` (`user_group_id`, `menu_id`) VALUES ('1', '1200');
INSERT INTO `ch_gen_tbl_utl_menu_access` (`user_group_id`, `menu_id`) VALUES ('1', '1300');
INSERT INTO `ch_gen_tbl_utl_menu_access` (`user_group_id`, `menu_id`) VALUES ('1', '1400');
INSERT INTO `ch_gen_tbl_utl_menu_access` (`user_group_id`, `menu_id`) VALUES ('1', '1500');
INSERT INTO `ch_gen_tbl_utl_menu_access` (`user_group_id`, `menu_id`) VALUES ('1', '2000');
INSERT INTO `ch_gen_tbl_utl_menu_access` (`user_group_id`, `menu_id`) VALUES ('1', '2100');
INSERT INTO `ch_gen_tbl_utl_menu_access` (`user_group_id`, `menu_id`) VALUES ('1', '4000');
INSERT INTO `ch_gen_tbl_utl_menu_access` (`user_group_id`, `menu_id`) VALUES ('1', '4001');
INSERT INTO `ch_gen_tbl_utl_menu_access` (`user_group_id`, `menu_id`) VALUES ('1', '4002');
INSERT INTO `ch_gen_tbl_utl_menu_access` (`user_group_id`, `menu_id`) VALUES ('1', '4100');
INSERT INTO `ch_gen_tbl_utl_menu_access` (`user_group_id`, `menu_id`) VALUES ('1', '4200');


#
# TABLE STRUCTURE FOR: ch_gen_tbl_utl_menu_dtl
#

DROP TABLE IF EXISTS `ch_gen_tbl_utl_menu_dtl`;

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
  `updated_date` datetime DEFAULT NULL,
  PRIMARY KEY (`menudtl_id`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1 COLLATE=latin1_swedish_ci;

INSERT INTO `ch_gen_tbl_utl_menu_dtl` (`menudtl_id`, `menudtl_title`, `menudtl_link`, `menudtl_icon`, `column_group`, `menuhdr_id`, `created_by`, `created_date`, `updated_by`, `updated_date`) VALUES ('1100', 'Master Obat', 'C_Mst_Obat', 'fa-align-left', NULL, '1000', 'aziz', '2023-05-21 10:50:38', NULL, NULL);
INSERT INTO `ch_gen_tbl_utl_menu_dtl` (`menudtl_id`, `menudtl_title`, `menudtl_link`, `menudtl_icon`, `column_group`, `menuhdr_id`, `created_by`, `created_date`, `updated_by`, `updated_date`) VALUES ('1200', 'Master Users', 'C_Mst_User', 'fa-database', NULL, '1000', 'aziz', '2023-05-21 10:51:37', NULL, NULL);
INSERT INTO `ch_gen_tbl_utl_menu_dtl` (`menudtl_id`, `menudtl_title`, `menudtl_link`, `menudtl_icon`, `column_group`, `menuhdr_id`, `created_by`, `created_date`, `updated_by`, `updated_date`) VALUES ('1300', 'Layanan', 'C_Mst_Layanan', 'fa-align-left', NULL, '1000', 'aziz', '2023-05-23 19:12:36', NULL, NULL);
INSERT INTO `ch_gen_tbl_utl_menu_dtl` (`menudtl_id`, `menudtl_title`, `menudtl_link`, `menudtl_icon`, `column_group`, `menuhdr_id`, `created_by`, `created_date`, `updated_by`, `updated_date`) VALUES ('1400', 'Master Dokter', 'C_Mst_Dokter', 'fa-align-left', NULL, '1000', 'aziz', '2023-05-25 20:55:53', NULL, NULL);
INSERT INTO `ch_gen_tbl_utl_menu_dtl` (`menudtl_id`, `menudtl_title`, `menudtl_link`, `menudtl_icon`, `column_group`, `menuhdr_id`, `created_by`, `created_date`, `updated_by`, `updated_date`) VALUES ('1500', 'Master Kamar', 'C_Mst_Kamar', 'fa-align-left', NULL, '1000', 'aziz', '2023-05-25 20:56:17', NULL, NULL);
INSERT INTO `ch_gen_tbl_utl_menu_dtl` (`menudtl_id`, `menudtl_title`, `menudtl_link`, `menudtl_icon`, `column_group`, `menuhdr_id`, `created_by`, `created_date`, `updated_by`, `updated_date`) VALUES ('2100', 'Kunjungan', 'C_Medical_Record', 'fa-align-left', NULL, '2000', 'aziz', '2023-05-21 10:53:27', NULL, NULL);
INSERT INTO `ch_gen_tbl_utl_menu_dtl` (`menudtl_id`, `menudtl_title`, `menudtl_link`, `menudtl_icon`, `column_group`, `menuhdr_id`, `created_by`, `created_date`, `updated_by`, `updated_date`) VALUES ('4001', 'Stok Obat', 'C_Mst_Obat/stok', 'fa-align-left', NULL, '4000', 'aziz', '2023-05-24 17:03:26', NULL, NULL);
INSERT INTO `ch_gen_tbl_utl_menu_dtl` (`menudtl_id`, `menudtl_title`, `menudtl_link`, `menudtl_icon`, `column_group`, `menuhdr_id`, `created_by`, `created_date`, `updated_by`, `updated_date`) VALUES ('4002', 'Obat Keluar', 'C_Report_Kunjungan/report_trans_obat', 'fa-align-left', NULL, '4000', 'faisal', '2023-05-28 10:14:52', NULL, NULL);
INSERT INTO `ch_gen_tbl_utl_menu_dtl` (`menudtl_id`, `menudtl_title`, `menudtl_link`, `menudtl_icon`, `column_group`, `menuhdr_id`, `created_by`, `created_date`, `updated_by`, `updated_date`) VALUES ('4100', 'Report Kunjungan', 'C_Report_Kunjungan', 'fa-align-left', NULL, '4000', 'aziz', '2023-05-21 11:46:05', NULL, NULL);
INSERT INTO `ch_gen_tbl_utl_menu_dtl` (`menudtl_id`, `menudtl_title`, `menudtl_link`, `menudtl_icon`, `column_group`, `menuhdr_id`, `created_by`, `created_date`, `updated_by`, `updated_date`) VALUES ('4200', 'Resume Dokter', 'C_Report_Kunjungan/resumeDokter', 'fa-align-left', NULL, '4000', 'faisal', '2023-05-28 18:07:00', NULL, NULL);


#
# TABLE STRUCTURE FOR: ch_gen_tbl_utl_menu_dtlsub
#

DROP TABLE IF EXISTS `ch_gen_tbl_utl_menu_dtlsub`;

CREATE TABLE `ch_gen_tbl_utl_menu_dtlsub` (
  `menudtlsub_id` bigint(20) NOT NULL,
  `menudtlsub_title` varchar(100) NOT NULL,
  `menudtlsub_link` varchar(255) NOT NULL,
  `menudtlsub_icon` varchar(100) NOT NULL DEFAULT 'fa-angle-right',
  `menudtl_id` bigint(20) NOT NULL,
  `created_by` varchar(50) DEFAULT NULL,
  `created_date` datetime DEFAULT NULL,
  `updated_by` varchar(50) DEFAULT NULL,
  `updated_date` datetime DEFAULT NULL,
  PRIMARY KEY (`menudtlsub_id`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1 COLLATE=latin1_swedish_ci;

#
# TABLE STRUCTURE FOR: ch_gen_tbl_utl_menu_hdr
#

DROP TABLE IF EXISTS `ch_gen_tbl_utl_menu_hdr`;

CREATE TABLE `ch_gen_tbl_utl_menu_hdr` (
  `menuhdr_id` bigint(20) NOT NULL,
  `menuhdr_title` varchar(100) NOT NULL,
  `menu_style` varchar(50) DEFAULT NULL,
  `app_id` bigint(20) DEFAULT NULL,
  `created_by` varchar(50) DEFAULT NULL,
  `created_date` datetime DEFAULT NULL,
  `updated_by` varchar(50) DEFAULT NULL,
  `updated_date` datetime DEFAULT NULL,
  PRIMARY KEY (`menuhdr_id`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1 COLLATE=latin1_swedish_ci;

INSERT INTO `ch_gen_tbl_utl_menu_hdr` (`menuhdr_id`, `menuhdr_title`, `menu_style`, `app_id`, `created_by`, `created_date`, `updated_by`, `updated_date`) VALUES ('1000', 'Master', NULL, NULL, 'aziz', '2023-05-21 10:50:07', NULL, NULL);
INSERT INTO `ch_gen_tbl_utl_menu_hdr` (`menuhdr_id`, `menuhdr_title`, `menu_style`, `app_id`, `created_by`, `created_date`, `updated_by`, `updated_date`) VALUES ('2000', 'Transction', NULL, NULL, 'aziz', '2023-05-21 10:52:51', NULL, NULL);
INSERT INTO `ch_gen_tbl_utl_menu_hdr` (`menuhdr_id`, `menuhdr_title`, `menu_style`, `app_id`, `created_by`, `created_date`, `updated_by`, `updated_date`) VALUES ('4000', 'Report', NULL, NULL, 'aziz', '2023-05-21 11:40:45', NULL, NULL);


#
# TABLE STRUCTURE FOR: ch_gen_tbl_utl_user_group
#

DROP TABLE IF EXISTS `ch_gen_tbl_utl_user_group`;

CREATE TABLE `ch_gen_tbl_utl_user_group` (
  `user_group_id` bigint(20) NOT NULL AUTO_INCREMENT,
  `user_group_name` varchar(100) NOT NULL,
  `user_group_remark` varchar(255) DEFAULT NULL,
  `not_active` smallint(6) DEFAULT 0,
  `created_by` varchar(50) DEFAULT NULL,
  `created_date` datetime DEFAULT NULL,
  `updated_by` varchar(50) DEFAULT NULL,
  `updated_date` datetime DEFAULT NULL,
  PRIMARY KEY (`user_group_id`)
) ENGINE=InnoDB AUTO_INCREMENT=2 DEFAULT CHARSET=latin1 COLLATE=latin1_swedish_ci;

INSERT INTO `ch_gen_tbl_utl_user_group` (`user_group_id`, `user_group_name`, `user_group_remark`, `not_active`, `created_by`, `created_date`, `updated_by`, `updated_date`) VALUES ('1', 'Adminstrator', '', 0, 'aziz', '2023-05-21 10:49:10', NULL, NULL);


#
# TABLE STRUCTURE FOR: ch_logs
#

DROP TABLE IF EXISTS `ch_logs`;

CREATE TABLE `ch_logs` (
  `log_id` bigint(20) NOT NULL,
  `level` varchar(10) DEFAULT NULL,
  `class_name` varchar(200) DEFAULT NULL,
  `method_name` varchar(100) DEFAULT NULL,
  `message` varchar(100) DEFAULT NULL,
  `new_value` text DEFAULT NULL,
  `old_value` text DEFAULT NULL,
  `exception` text DEFAULT NULL,
  `created_by` varchar(50) DEFAULT NULL,
  `log_date` datetime DEFAULT NULL,
  PRIMARY KEY (`log_id`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1 COLLATE=latin1_swedish_ci;

#
# TABLE STRUCTURE FOR: gen_tbl_mst_factory
#

DROP TABLE IF EXISTS `gen_tbl_mst_factory`;

CREATE TABLE `gen_tbl_mst_factory` (
  `factory_id` bigint(20) NOT NULL AUTO_INCREMENT,
  `factory_name` varchar(150) NOT NULL,
  `factory_abbr` varchar(50) DEFAULT NULL,
  `factory_location` varchar(100) DEFAULT NULL,
  `factory_address` text DEFAULT NULL,
  `factory_phone` varchar(100) DEFAULT NULL,
  `factory_fax` varchar(100) DEFAULT NULL,
  `created_by` varchar(50) DEFAULT NULL,
  `created_date` datetime DEFAULT NULL,
  `updated_by` varchar(50) DEFAULT NULL,
  `updated_date` datetime DEFAULT NULL,
  PRIMARY KEY (`factory_id`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1 COLLATE=latin1_swedish_ci;

#
# TABLE STRUCTURE FOR: gen_tbl_mst_position
#

DROP TABLE IF EXISTS `gen_tbl_mst_position`;

CREATE TABLE `gen_tbl_mst_position` (
  `position_id` bigint(20) NOT NULL AUTO_INCREMENT,
  `position_name` varchar(50) DEFAULT NULL,
  `position_remark` varchar(255) DEFAULT NULL,
  `created_by` varchar(50) DEFAULT NULL,
  `created_date` datetime DEFAULT NULL,
  `updated_by` varchar(50) DEFAULT NULL,
  `updated_date` datetime DEFAULT NULL,
  PRIMARY KEY (`position_id`) USING BTREE
) ENGINE=InnoDB AUTO_INCREMENT=9 DEFAULT CHARSET=latin1 COLLATE=latin1_swedish_ci ROW_FORMAT=COMPACT;

INSERT INTO `gen_tbl_mst_position` (`position_id`, `position_name`, `position_remark`, `created_by`, `created_date`, `updated_by`, `updated_date`) VALUES ('1', 'Programmer', 'Software developer for PSS application website', 'HARRY', '2016-03-02 09:35:51', NULL, NULL);
INSERT INTO `gen_tbl_mst_position` (`position_id`, `position_name`, `position_remark`, `created_by`, `created_date`, `updated_by`, `updated_date`) VALUES ('2', 'Administrator', 'Administrator for PSS application website', 'HARRY', '2016-03-02 09:35:51', NULL, NULL);
INSERT INTO `gen_tbl_mst_position` (`position_id`, `position_name`, `position_remark`, `created_by`, `created_date`, `updated_by`, `updated_date`) VALUES ('3', 'Sales Person', 'PSS Marketing Sales Person', 'HARRY', '2016-03-02 09:35:51', NULL, NULL);
INSERT INTO `gen_tbl_mst_position` (`position_id`, `position_name`, `position_remark`, `created_by`, `created_date`, `updated_by`, `updated_date`) VALUES ('4', 'Purchaser', 'PSS Purchaser', 'HARRY', '2016-03-02 09:35:51', NULL, NULL);
INSERT INTO `gen_tbl_mst_position` (`position_id`, `position_name`, `position_remark`, `created_by`, `created_date`, `updated_by`, `updated_date`) VALUES ('5', 'Accounting', 'PSS Accounting', 'HARRY', '2016-03-02 09:35:51', NULL, NULL);
INSERT INTO `gen_tbl_mst_position` (`position_id`, `position_name`, `position_remark`, `created_by`, `created_date`, `updated_by`, `updated_date`) VALUES ('6', 'Shipping', 'PSS Shipping', 'DEKI', '2016-03-04 14:28:56', NULL, NULL);
INSERT INTO `gen_tbl_mst_position` (`position_id`, `position_name`, `position_remark`, `created_by`, `created_date`, `updated_by`, `updated_date`) VALUES ('7', 'Sales Marketing', 'PSS Sales Marketing', 'HARRY', '2016-06-18 13:49:31', NULL, NULL);
INSERT INTO `gen_tbl_mst_position` (`position_id`, `position_name`, `position_remark`, `created_by`, `created_date`, `updated_by`, `updated_date`) VALUES ('8', 'Shipment Liaison', 'Factory Shipment', 'HARRY', '2017-01-04 15:19:53', NULL, NULL);


#
# TABLE STRUCTURE FOR: setting_web
#

DROP TABLE IF EXISTS `setting_web`;

CREATE TABLE `setting_web` (
  `jadwal_daftar_ulang` date DEFAULT NULL,
  `nama_ketua_panitia` varchar(100) DEFAULT NULL,
  `id` int(11) NOT NULL AUTO_INCREMENT,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1 COLLATE=latin1_swedish_ci;

#
# TABLE STRUCTURE FOR: tb_anamnesa
#

DROP TABLE IF EXISTS `tb_anamnesa`;

CREATE TABLE `tb_anamnesa` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `keluhan` varchar(100) DEFAULT NULL,
  `tinggi_badan` float DEFAULT NULL,
  `berat_badan` float DEFAULT NULL,
  `tekanan_darah` float DEFAULT NULL,
  `pernapasan` float DEFAULT NULL,
  `detak_jantung` float DEFAULT NULL,
  `suhu_tubuh` float DEFAULT NULL,
  `id_pasien` varchar(100) DEFAULT NULL,
  `create_date` date NOT NULL DEFAULT current_timestamp(),
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=26 DEFAULT CHARSET=latin1 COLLATE=latin1_swedish_ci;

INSERT INTO `tb_anamnesa` (`id`, `keluhan`, `tinggi_badan`, `berat_badan`, `tekanan_darah`, `pernapasan`, `detak_jantung`, `suhu_tubuh`, `id_pasien`, `create_date`) VALUES (1, '', '0', '0', '0', '0', '0', '0', '213213213', '2023-05-23');
INSERT INTO `tb_anamnesa` (`id`, `keluhan`, `tinggi_badan`, `berat_badan`, `tekanan_darah`, `pernapasan`, `detak_jantung`, `suhu_tubuh`, `id_pasien`, `create_date`) VALUES (2, '', '0', '0', '0', '0', '0', '0', '1404082109960003', '2023-05-23');
INSERT INTO `tb_anamnesa` (`id`, `keluhan`, `tinggi_badan`, `berat_badan`, `tekanan_darah`, `pernapasan`, `detak_jantung`, `suhu_tubuh`, `id_pasien`, `create_date`) VALUES (3, 'sakit perut', '160', '80', '120', '1210', '121', '12', '1404082109960003', '2023-05-23');
INSERT INTO `tb_anamnesa` (`id`, `keluhan`, `tinggi_badan`, `berat_badan`, `tekanan_darah`, `pernapasan`, `detak_jantung`, `suhu_tubuh`, `id_pasien`, `create_date`) VALUES (4, 'sakit gigi', '120', '120', '120', '120', '0', '0', '1404082109960003', '2023-05-23');
INSERT INTO `tb_anamnesa` (`id`, `keluhan`, `tinggi_badan`, `berat_badan`, `tekanan_darah`, `pernapasan`, `detak_jantung`, `suhu_tubuh`, `id_pasien`, `create_date`) VALUES (5, 'sakit perut, pilek, mual', '20', '20', '21', '22', '23', '24', '1404082109960003', '2023-05-23');
INSERT INTO `tb_anamnesa` (`id`, `keluhan`, `tinggi_badan`, `berat_badan`, `tekanan_darah`, `pernapasan`, `detak_jantung`, `suhu_tubuh`, `id_pasien`, `create_date`) VALUES (6, 'test', '12', '12', '12', '21', '12', '0', '1404082109960003', '2023-05-23');
INSERT INTO `tb_anamnesa` (`id`, `keluhan`, `tinggi_badan`, `berat_badan`, `tekanan_darah`, `pernapasan`, `detak_jantung`, `suhu_tubuh`, `id_pasien`, `create_date`) VALUES (7, 'test sakit', '180', '80', '120', '20', '2', '22', '1404082109960003', '2023-05-23');
INSERT INTO `tb_anamnesa` (`id`, `keluhan`, `tinggi_badan`, `berat_badan`, `tekanan_darah`, `pernapasan`, `detak_jantung`, `suhu_tubuh`, `id_pasien`, `create_date`) VALUES (8, 'test', '232', '12', '21', '21', '212', '12', '1404082109960004', '2023-05-23');
INSERT INTO `tb_anamnesa` (`id`, `keluhan`, `tinggi_badan`, `berat_badan`, `tekanan_darah`, `pernapasan`, `detak_jantung`, `suhu_tubuh`, `id_pasien`, `create_date`) VALUES (9, 'test keluhan', '1', '12', '13', '14', '16', '21', '1404082109960005', '2023-05-23');
INSERT INTO `tb_anamnesa` (`id`, `keluhan`, `tinggi_badan`, `berat_badan`, `tekanan_darah`, `pernapasan`, `detak_jantung`, `suhu_tubuh`, `id_pasien`, `create_date`) VALUES (12, 'asdasf', '121', '1212', '12', '12', '1212', '21', '2212', '2023-05-23');
INSERT INTO `tb_anamnesa` (`id`, `keluhan`, `tinggi_badan`, `berat_badan`, `tekanan_darah`, `pernapasan`, `detak_jantung`, `suhu_tubuh`, `id_pasien`, `create_date`) VALUES (14, 'dsafasf', '1', '2', '2', '2', '2', '2', '123456789', '2023-05-23');
INSERT INTO `tb_anamnesa` (`id`, `keluhan`, `tinggi_badan`, `berat_badan`, `tekanan_darah`, `pernapasan`, `detak_jantung`, `suhu_tubuh`, `id_pasien`, `create_date`) VALUES (15, 'sakit kepala sebelah', '21', '2', '2', '2', '2', '2', '1404082109960003', '2023-05-23');
INSERT INTO `tb_anamnesa` (`id`, `keluhan`, `tinggi_badan`, `berat_badan`, `tekanan_darah`, `pernapasan`, `detak_jantung`, `suhu_tubuh`, `id_pasien`, `create_date`) VALUES (16, 'Sakit Kepala Mual', '170', '76', '120', '90', '89', '32', '14040821009960003', '2023-05-23');
INSERT INTO `tb_anamnesa` (`id`, `keluhan`, `tinggi_badan`, `berat_badan`, `tekanan_darah`, `pernapasan`, `detak_jantung`, `suhu_tubuh`, `id_pasien`, `create_date`) VALUES (17, 'sdasdsa', '1221', '21', '1', '1', '2', '2', '11231241', '2023-05-24');
INSERT INTO `tb_anamnesa` (`id`, `keluhan`, `tinggi_badan`, `berat_badan`, `tekanan_darah`, `pernapasan`, `detak_jantung`, `suhu_tubuh`, `id_pasien`, `create_date`) VALUES (18, 'asdasd', '12', '1221', '21', '12', '0', '0', '21321', '2023-05-24');
INSERT INTO `tb_anamnesa` (`id`, `keluhan`, `tinggi_badan`, `berat_badan`, `tekanan_darah`, `pernapasan`, `detak_jantung`, `suhu_tubuh`, `id_pasien`, `create_date`) VALUES (19, 'tetesa', '0', '0', '0', '0', '0', '0', '141231', '2023-05-28');
INSERT INTO `tb_anamnesa` (`id`, `keluhan`, `tinggi_badan`, `berat_badan`, `tekanan_darah`, `pernapasan`, `detak_jantung`, `suhu_tubuh`, `id_pasien`, `create_date`) VALUES (20, 'dfgsggds', '0', '0', '0', '0', '0', '0', '2124141', '2023-05-28');
INSERT INTO `tb_anamnesa` (`id`, `keluhan`, `tinggi_badan`, `berat_badan`, `tekanan_darah`, `pernapasan`, `detak_jantung`, `suhu_tubuh`, `id_pasien`, `create_date`) VALUES (21, 'safddsaf', '0', '0', '0', '0', '0', '0', '123313', '2023-05-28');
INSERT INTO `tb_anamnesa` (`id`, `keluhan`, `tinggi_badan`, `berat_badan`, `tekanan_darah`, `pernapasan`, `detak_jantung`, `suhu_tubuh`, `id_pasien`, `create_date`) VALUES (22, 'sadf', '0', '0', '0', '0', '0', '0', '213213213', '2023-05-28');
INSERT INTO `tb_anamnesa` (`id`, `keluhan`, `tinggi_badan`, `berat_badan`, `tekanan_darah`, `pernapasan`, `detak_jantung`, `suhu_tubuh`, `id_pasien`, `create_date`) VALUES (23, 'sadfas', '0', '0', '0', '0', '0', '0', '12313', '2023-05-28');
INSERT INTO `tb_anamnesa` (`id`, `keluhan`, `tinggi_badan`, `berat_badan`, `tekanan_darah`, `pernapasan`, `detak_jantung`, `suhu_tubuh`, `id_pasien`, `create_date`) VALUES (24, 'asdasda', '0', '0', '0', '0', '0', '0', '1213213', '2023-05-28');
INSERT INTO `tb_anamnesa` (`id`, `keluhan`, `tinggi_badan`, `berat_badan`, `tekanan_darah`, `pernapasan`, `detak_jantung`, `suhu_tubuh`, `id_pasien`, `create_date`) VALUES (25, 'sadfasfas', '0', '0', '0', '0', '0', '0', '13212323', '2023-05-28');


#
# TABLE STRUCTURE FOR: tb_diagnosa
#

DROP TABLE IF EXISTS `tb_diagnosa`;

CREATE TABLE `tb_diagnosa` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `id_pasien` varchar(100) DEFAULT NULL,
  `subjektif` varchar(100) DEFAULT NULL,
  `objektif` varchar(100) DEFAULT NULL,
  `assesment` varchar(100) DEFAULT NULL,
  `planning` varchar(100) DEFAULT NULL,
  `nik` varchar(100) DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=20 DEFAULT CHARSET=latin1 COLLATE=latin1_swedish_ci;

INSERT INTO `tb_diagnosa` (`id`, `id_pasien`, `subjektif`, `objektif`, `assesment`, `planning`, `nik`) VALUES (1, NULL, 'test subjektif', 'test objektif', 'test assesment', 'test planning', '1404082109960003');
INSERT INTO `tb_diagnosa` (`id`, `id_pasien`, `subjektif`, `objektif`, `assesment`, `planning`, `nik`) VALUES (2, NULL, 'tes sub', 'tes objek', 'test asess', 'tes plan', '1404082109960004');
INSERT INTO `tb_diagnosa` (`id`, `id_pasien`, `subjektif`, `objektif`, `assesment`, `planning`, `nik`) VALUES (3, NULL, 'rwrr', 'wrwr', 'wrw', 'wrwr', '1404082109960005');
INSERT INTO `tb_diagnosa` (`id`, `id_pasien`, `subjektif`, `objektif`, `assesment`, `planning`, `nik`) VALUES (6, NULL, 'dsa', 'as', 'as', 'dasd', '2212');
INSERT INTO `tb_diagnosa` (`id`, `id_pasien`, `subjektif`, `objektif`, `assesment`, `planning`, `nik`) VALUES (8, NULL, 'ada', 'sfafa', 'sfdas', 'fsadf', '123456789');
INSERT INTO `tb_diagnosa` (`id`, `id_pasien`, `subjektif`, `objektif`, `assesment`, `planning`, `nik`) VALUES (9, NULL, 'sadfaf', 'fdsaf', 'sadfas', 'fdasdf', '1404082109960003');
INSERT INTO `tb_diagnosa` (`id`, `id_pasien`, `subjektif`, `objektif`, `assesment`, `planning`, `nik`) VALUES (10, NULL, 'pokpk', 'kok', 'okok', 'oko', '14040821009960003');
INSERT INTO `tb_diagnosa` (`id`, `id_pasien`, `subjektif`, `objektif`, `assesment`, `planning`, `nik`) VALUES (11, NULL, 'asdasd', 'asdsad', 'asdsa', 'dasdsa', '11231241');
INSERT INTO `tb_diagnosa` (`id`, `id_pasien`, `subjektif`, `objektif`, `assesment`, `planning`, `nik`) VALUES (12, NULL, 'sadfas', 'fdsaf', 'asfsaf', 'asf', '21321');
INSERT INTO `tb_diagnosa` (`id`, `id_pasien`, `subjektif`, `objektif`, `assesment`, `planning`, `nik`) VALUES (13, NULL, 'sdfasfas', 'fsaf', 'sadfas', 'fdsadf', '141231');
INSERT INTO `tb_diagnosa` (`id`, `id_pasien`, `subjektif`, `objektif`, `assesment`, `planning`, `nik`) VALUES (14, NULL, 'dfgsd', 'gsdgds', 'gdsfg', 'sdf', '2124141');
INSERT INTO `tb_diagnosa` (`id`, `id_pasien`, `subjektif`, `objektif`, `assesment`, `planning`, `nik`) VALUES (15, NULL, 'sadfasf', 'dsafsdaf', 'asfd', 'sdaf', '123313');
INSERT INTO `tb_diagnosa` (`id`, `id_pasien`, `subjektif`, `objektif`, `assesment`, `planning`, `nik`) VALUES (16, NULL, 'sadfas', 'fasdfa', 'fds', 'fasf', '213213213');
INSERT INTO `tb_diagnosa` (`id`, `id_pasien`, `subjektif`, `objektif`, `assesment`, `planning`, `nik`) VALUES (17, NULL, 'sadfasfd', 'asdfsa', 'fdsaf', 'dsafdfa', '12313');
INSERT INTO `tb_diagnosa` (`id`, `id_pasien`, `subjektif`, `objektif`, `assesment`, `planning`, `nik`) VALUES (18, NULL, 'sdasd', 'asdasd', 'asdasd', 'adsdas', '1213213');
INSERT INTO `tb_diagnosa` (`id`, `id_pasien`, `subjektif`, `objektif`, `assesment`, `planning`, `nik`) VALUES (19, NULL, 'safsa', 'fsadf', 'asfd', 'asdf', '13212323');


#
# TABLE STRUCTURE FOR: tb_layanan
#

DROP TABLE IF EXISTS `tb_layanan`;

CREATE TABLE `tb_layanan` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `nama_layanan` varchar(100) NOT NULL,
  `harga` int(11) NOT NULL,
  `satuan` varchar(100) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=7 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

INSERT INTO `tb_layanan` (`id`, `nama_layanan`, `harga`, `satuan`) VALUES (1, 'Pembuatan Kartu Berobat', 13000, 'kali');
INSERT INTO `tb_layanan` (`id`, `nama_layanan`, `harga`, `satuan`) VALUES (2, 'Biaya Kamar', 10000, 'malam');
INSERT INTO `tb_layanan` (`id`, `nama_layanan`, `harga`, `satuan`) VALUES (3, 'Pemasangan Infus', 50000, 'kali');
INSERT INTO `tb_layanan` (`id`, `nama_layanan`, `harga`, `satuan`) VALUES (4, 'Injeksi', 80000, 'kali');


#
# TABLE STRUCTURE FOR: tb_mst_dokter
#

DROP TABLE IF EXISTS `tb_mst_dokter`;

CREATE TABLE `tb_mst_dokter` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `nama` varchar(100) NOT NULL,
  `spesialisasi` varchar(100) NOT NULL,
  `alamat` varchar(255) DEFAULT NULL,
  `telepon` varchar(20) DEFAULT NULL,
  `email` varchar(100) DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=3 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

INSERT INTO `tb_mst_dokter` (`id`, `nama`, `spesialisasi`, `alamat`, `telepon`, `email`) VALUES (1, 'dr. aziz', 'gigi', NULL, NULL, NULL);


#
# TABLE STRUCTURE FOR: tb_mst_kamar
#

DROP TABLE IF EXISTS `tb_mst_kamar`;

CREATE TABLE `tb_mst_kamar` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `nomor_kamar` varchar(10) NOT NULL,
  `jenis_kamar` varchar(50) NOT NULL,
  `fasilitas` varchar(255) DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=3 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

INSERT INTO `tb_mst_kamar` (`id`, `nomor_kamar`, `jenis_kamar`, `fasilitas`) VALUES (1, 'Kamar A', 'Kelas 1', 'TV, AC');
INSERT INTO `tb_mst_kamar` (`id`, `nomor_kamar`, `jenis_kamar`, `fasilitas`) VALUES (2, 'Kamar B', 'VIP', 'TV, AC, Kamar Mandi Dalam');


#
# TABLE STRUCTURE FOR: tb_obat
#

DROP TABLE IF EXISTS `tb_obat`;

CREATE TABLE `tb_obat` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `kode_obat` varchar(100) DEFAULT NULL,
  `nama_obat` varchar(100) DEFAULT NULL,
  `jenis_obat` varchar(100) DEFAULT NULL,
  `harga` double DEFAULT NULL,
  `stok` int(11) DEFAULT NULL,
  `satuan` varchar(100) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=8 DEFAULT CHARSET=latin1 COLLATE=latin1_swedish_ci;

INSERT INTO `tb_obat` (`id`, `kode_obat`, `nama_obat`, `jenis_obat`, `harga`, `stok`, `satuan`) VALUES (1, '0012', 'Paracetamol @600ml', 'Paracetamol', '12000', 988, 'tablet');
INSERT INTO `tb_obat` (`id`, `kode_obat`, `nama_obat`, `jenis_obat`, `harga`, `stok`, `satuan`) VALUES (2, '0013', 'kAbrocitinib', 'Obat imunosupresan', '10000', 3, 'kapsul');
INSERT INTO `tb_obat` (`id`, `kode_obat`, `nama_obat`, `jenis_obat`, `harga`, `stok`, `satuan`) VALUES (7, '0014', 'PEGINTERFERON ALFA-2B', 'Vitamin', '7000', 100, 'tablet');


#
# TABLE STRUCTURE FOR: tb_pasien
#

DROP TABLE IF EXISTS `tb_pasien`;

CREATE TABLE `tb_pasien` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `nama_depan` varchar(100) DEFAULT NULL,
  `nama_belakang` varchar(100) DEFAULT NULL,
  `gender` varchar(100) DEFAULT NULL,
  `golongan_darah` varchar(100) DEFAULT NULL,
  `alamat` varchar(100) DEFAULT NULL,
  `catatan` varchar(100) DEFAULT NULL,
  `nik` varchar(100) DEFAULT NULL,
  `status_pulang` int(11) NOT NULL DEFAULT 1,
  `create_date` datetime NOT NULL,
  `umur` int(11) NOT NULL,
  `kamar` varchar(100) NOT NULL,
  `tgl_selesai` date NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=61 DEFAULT CHARSET=latin1 COLLATE=latin1_swedish_ci;

INSERT INTO `tb_pasien` (`id`, `nama_depan`, `nama_belakang`, `gender`, `golongan_darah`, `alamat`, `catatan`, `nik`, `status_pulang`, `create_date`, `umur`, `kamar`, `tgl_selesai`) VALUES (45, 'fassfa', 'asfasf', 'Pria', 'B', '', '', '123213', 1, '2023-05-21 00:00:00', 0, '', '0000-00-00');
INSERT INTO `tb_pasien` (`id`, `nama_depan`, `nama_belakang`, `gender`, `golongan_darah`, `alamat`, `catatan`, `nik`, `status_pulang`, `create_date`, `umur`, `kamar`, `tgl_selesai`) VALUES (48, 'asdasdad', 'asdasd', 'Wanita', 'A', '', '', '1233', 1, '2023-05-20 00:00:00', 0, '', '0000-00-00');
INSERT INTO `tb_pasien` (`id`, `nama_depan`, `nama_belakang`, `gender`, `golongan_darah`, `alamat`, `catatan`, `nik`, `status_pulang`, `create_date`, `umur`, `kamar`, `tgl_selesai`) VALUES (49, 'wqe', 'qeqe', 'Pria', NULL, '', '1231', '213213', 1, '2023-05-23 00:00:00', 24, '', '0000-00-00');
INSERT INTO `tb_pasien` (`id`, `nama_depan`, `nama_belakang`, `gender`, `golongan_darah`, `alamat`, `catatan`, `nik`, `status_pulang`, `create_date`, `umur`, `kamar`, `tgl_selesai`) VALUES (50, '123', 'wqeqe', 'Pria', NULL, '', '', '12313', 2, '2023-05-23 00:00:00', 25, '', '0000-00-00');
INSERT INTO `tb_pasien` (`id`, `nama_depan`, `nama_belakang`, `gender`, `golongan_darah`, `alamat`, `catatan`, `nik`, `status_pulang`, `create_date`, `umur`, `kamar`, `tgl_selesai`) VALUES (51, 'muhammad', 'nuh', 'Pria', 'A', 'Sungai Guntung, Indragi Hilir, Riau', 'asdfasf', '1404082109960003', 2, '2023-05-23 00:00:00', 22, 'BANGSAL', '2023-05-01');
INSERT INTO `tb_pasien` (`id`, `nama_depan`, `nama_belakang`, `gender`, `golongan_darah`, `alamat`, `catatan`, `nik`, `status_pulang`, `create_date`, `umur`, `kamar`, `tgl_selesai`) VALUES (52, 'ABDUL', 'AZIS', 'Pria', 'A', 'Jala Hibrida No 1', 'tidak terlau sakit, masih normal', '14040821009960003', 2, '2023-05-23 00:00:00', 26, 'cerry', '2023-05-17');
INSERT INTO `tb_pasien` (`id`, `nama_depan`, `nama_belakang`, `gender`, `golongan_darah`, `alamat`, `catatan`, `nik`, `status_pulang`, `create_date`, `umur`, `kamar`, `tgl_selesai`) VALUES (53, 'muhamad', 'sofyan', 'Wanita', 'A', 'sadas', 'asdsad', '11231241', 2, '2023-05-24 00:00:00', 22, 'wqeqewe', '2023-05-26');
INSERT INTO `tb_pasien` (`id`, `nama_depan`, `nama_belakang`, `gender`, `golongan_darah`, `alamat`, `catatan`, `nik`, `status_pulang`, `create_date`, `umur`, `kamar`, `tgl_selesai`) VALUES (54, 'asdasd', 'asdasda', 'Pria', 'AB', '', 'asdfasf', '21321', 1, '2023-05-24 00:00:00', 0, '', '2023-05-26');
INSERT INTO `tb_pasien` (`id`, `nama_depan`, `nama_belakang`, `gender`, `golongan_darah`, `alamat`, `catatan`, `nik`, `status_pulang`, `create_date`, `umur`, `kamar`, `tgl_selesai`) VALUES (55, 'Muhammad', 'Ardi', 'Pria', 'A', '', 'test', '141231', 2, '2023-05-28 00:00:00', 28, 'Kamar A', '2023-05-28');
INSERT INTO `tb_pasien` (`id`, `nama_depan`, `nama_belakang`, `gender`, `golongan_darah`, `alamat`, `catatan`, `nik`, `status_pulang`, `create_date`, `umur`, `kamar`, `tgl_selesai`) VALUES (56, 'sdafaf', 'sdfadfsa', 'Pria', 'AB', '', 'sdgfsdg', '2124141', 2, '2023-05-26 00:00:00', 33, 'Kamar A', '2023-05-04');
INSERT INTO `tb_pasien` (`id`, `nama_depan`, `nama_belakang`, `gender`, `golongan_darah`, `alamat`, `catatan`, `nik`, `status_pulang`, `create_date`, `umur`, `kamar`, `tgl_selesai`) VALUES (57, 'aasfsdfds', 'sdfdsf', 'Pria', 'B', '', 'asdfdasf', '123313', 2, '0000-00-00 00:00:00', 22, 'Kamar A', '2023-05-30');
INSERT INTO `tb_pasien` (`id`, `nama_depan`, `nama_belakang`, `gender`, `golongan_darah`, `alamat`, `catatan`, `nik`, `status_pulang`, `create_date`, `umur`, `kamar`, `tgl_selesai`) VALUES (58, 'sfdsf', 'sdfdsf', 'Pria', 'B', 'asdfa', 'sadfsaf', '213213213', 2, '0000-00-00 00:00:00', 22, 'Kamar A', '2023-05-28');
INSERT INTO `tb_pasien` (`id`, `nama_depan`, `nama_belakang`, `gender`, `golongan_darah`, `alamat`, `catatan`, `nik`, `status_pulang`, `create_date`, `umur`, `kamar`, `tgl_selesai`) VALUES (59, 'asdasda', 'sasda', 'Wanita', 'A', 'asd', 'asdasd', '1213213', 2, '2023-05-28 17:57:37', 22, 'Kamar A', '2023-05-28');
INSERT INTO `tb_pasien` (`id`, `nama_depan`, `nama_belakang`, `gender`, `golongan_darah`, `alamat`, `catatan`, `nik`, `status_pulang`, `create_date`, `umur`, `kamar`, `tgl_selesai`) VALUES (60, 'Mardani', 'Ali', 'Pria', 'B', 'dsafa', 'asfsad', '13212323', 2, '2023-05-28 17:59:50', 22, 'Kamar B', '2023-05-31');


#
# TABLE STRUCTURE FOR: tb_resep
#

DROP TABLE IF EXISTS `tb_resep`;

CREATE TABLE `tb_resep` (
  `nik` varchar(100) NOT NULL,
  `id_obat` int(11) NOT NULL,
  `diperiksa_oleh` varchar(100) NOT NULL,
  `catatan` varchar(100) NOT NULL,
  `qty` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

INSERT INTO `tb_resep` (`nik`, `id_obat`, `diperiksa_oleh`, `catatan`, `qty`) VALUES ('141231', 1, 'dr. aziz', 'test', 2);
INSERT INTO `tb_resep` (`nik`, `id_obat`, `diperiksa_oleh`, `catatan`, `qty`) VALUES ('141231', 2, 'dr. aziz', 'test', 4);
INSERT INTO `tb_resep` (`nik`, `id_obat`, `diperiksa_oleh`, `catatan`, `qty`) VALUES ('141231', 7, 'dr. aziz', 'test', 1);
INSERT INTO `tb_resep` (`nik`, `id_obat`, `diperiksa_oleh`, `catatan`, `qty`) VALUES ('2124141', 1, 'dr. aziz', 'sdgfsdg', 5);
INSERT INTO `tb_resep` (`nik`, `id_obat`, `diperiksa_oleh`, `catatan`, `qty`) VALUES ('2124141', 2, 'dr. aziz', 'sdgfsdg', 1);
INSERT INTO `tb_resep` (`nik`, `id_obat`, `diperiksa_oleh`, `catatan`, `qty`) VALUES ('123313', 1, 'dr. aziz', 'asdfdasf', 10);
INSERT INTO `tb_resep` (`nik`, `id_obat`, `diperiksa_oleh`, `catatan`, `qty`) VALUES ('123313', 2, 'dr. aziz', 'asdfdasf', 5);
INSERT INTO `tb_resep` (`nik`, `id_obat`, `diperiksa_oleh`, `catatan`, `qty`) VALUES ('213213213', 2, 'dr. aziz', 'sadfsaf', 1);
INSERT INTO `tb_resep` (`nik`, `id_obat`, `diperiksa_oleh`, `catatan`, `qty`) VALUES ('12313', 1, 'dr. aziz', 'sdfs', 1);
INSERT INTO `tb_resep` (`nik`, `id_obat`, `diperiksa_oleh`, `catatan`, `qty`) VALUES ('1213213', 1, 'dr. aziz', 'asdasd', 1);
INSERT INTO `tb_resep` (`nik`, `id_obat`, `diperiksa_oleh`, `catatan`, `qty`) VALUES ('13212323', 2, 'dr. aziz', 'asfsad', 1);


#
# TABLE STRUCTURE FOR: tb_temp_cart
#

DROP TABLE IF EXISTS `tb_temp_cart`;

CREATE TABLE `tb_temp_cart` (
  `id` int(11) DEFAULT NULL,
  `id_obat` int(11) DEFAULT NULL,
  `qty` int(11) DEFAULT NULL,
  `created_by` varchar(100) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1 COLLATE=latin1_swedish_ci;

#
# TABLE STRUCTURE FOR: tb_temp_layanan
#

DROP TABLE IF EXISTS `tb_temp_layanan`;

CREATE TABLE `tb_temp_layanan` (
  `id_layanan` int(11) NOT NULL,
  `nama_layanan` int(11) NOT NULL,
  `harga` int(11) NOT NULL,
  `qty` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

#
# TABLE STRUCTURE FOR: tb_trans_layanan
#

DROP TABLE IF EXISTS `tb_trans_layanan`;

CREATE TABLE `tb_trans_layanan` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `layanan_id` int(11) NOT NULL,
  `nik` varchar(100) NOT NULL,
  `qty` int(11) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=32 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

INSERT INTO `tb_trans_layanan` (`id`, `layanan_id`, `nik`, `qty`) VALUES (10, 1, '213213', 2);
INSERT INTO `tb_trans_layanan` (`id`, `layanan_id`, `nik`, `qty`) VALUES (11, 2, '213213', 1);
INSERT INTO `tb_trans_layanan` (`id`, `layanan_id`, `nik`, `qty`) VALUES (12, 3, '213213', 1);
INSERT INTO `tb_trans_layanan` (`id`, `layanan_id`, `nik`, `qty`) VALUES (13, 2, '123213', 1);
INSERT INTO `tb_trans_layanan` (`id`, `layanan_id`, `nik`, `qty`) VALUES (14, 3, '12313', 1);
INSERT INTO `tb_trans_layanan` (`id`, `layanan_id`, `nik`, `qty`) VALUES (15, 1, '1404082109960003', 1);
INSERT INTO `tb_trans_layanan` (`id`, `layanan_id`, `nik`, `qty`) VALUES (16, 2, '1404082109960003', 1);
INSERT INTO `tb_trans_layanan` (`id`, `layanan_id`, `nik`, `qty`) VALUES (17, 4, '1404082109960003', 1);
INSERT INTO `tb_trans_layanan` (`id`, `layanan_id`, `nik`, `qty`) VALUES (18, 1, '14040821009960003', 1);
INSERT INTO `tb_trans_layanan` (`id`, `layanan_id`, `nik`, `qty`) VALUES (19, 2, '14040821009960003', 2);
INSERT INTO `tb_trans_layanan` (`id`, `layanan_id`, `nik`, `qty`) VALUES (20, 1, '11231241', 1);
INSERT INTO `tb_trans_layanan` (`id`, `layanan_id`, `nik`, `qty`) VALUES (21, 3, '11231241', 1);
INSERT INTO `tb_trans_layanan` (`id`, `layanan_id`, `nik`, `qty`) VALUES (22, 1, '141231', 1);
INSERT INTO `tb_trans_layanan` (`id`, `layanan_id`, `nik`, `qty`) VALUES (23, 1, '2124141', 1);
INSERT INTO `tb_trans_layanan` (`id`, `layanan_id`, `nik`, `qty`) VALUES (24, 2, '2124141', 1);
INSERT INTO `tb_trans_layanan` (`id`, `layanan_id`, `nik`, `qty`) VALUES (25, 3, '2124141', 1);
INSERT INTO `tb_trans_layanan` (`id`, `layanan_id`, `nik`, `qty`) VALUES (26, 4, '2124141', 1);
INSERT INTO `tb_trans_layanan` (`id`, `layanan_id`, `nik`, `qty`) VALUES (27, 2, '123313', 1);
INSERT INTO `tb_trans_layanan` (`id`, `layanan_id`, `nik`, `qty`) VALUES (28, 2, '213213213', 1);
INSERT INTO `tb_trans_layanan` (`id`, `layanan_id`, `nik`, `qty`) VALUES (29, 2, '12313', 1);
INSERT INTO `tb_trans_layanan` (`id`, `layanan_id`, `nik`, `qty`) VALUES (30, 2, '1213213', 1);
INSERT INTO `tb_trans_layanan` (`id`, `layanan_id`, `nik`, `qty`) VALUES (31, 1, '13212323', 1);


