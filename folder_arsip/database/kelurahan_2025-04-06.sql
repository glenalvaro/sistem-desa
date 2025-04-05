SET foreign_key_checks = 0;
#
# TABLE STRUCTURE FOR: agenda
#

CREATE TABLE `agenda` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `nama_agenda` varchar(200) NOT NULL,
  `tgl_agenda` varchar(128) NOT NULL,
  `jam` varchar(128) NOT NULL,
  `kordinator_lapangan` varchar(200) NOT NULL,
  `lokasi_kegiatan` varchar(200) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=4 DEFAULT CHARSET=utf8;

INSERT INTO `agenda` (`id`, `nama_agenda`, `tgl_agenda`, `jam`, `kordinator_lapangan`, `lokasi_kegiatan`) VALUES (2, 'Rapat Tahunan Desa', '2025-03-31', '9:00', 'Bpk. Contoh', 'Hotel Manado');
INSERT INTO `agenda` (`id`, `nama_agenda`, `tgl_agenda`, `jam`, `kordinator_lapangan`, `lokasi_kegiatan`) VALUES (3, 'Sosialisasi Pengadaan Bansos', '2025-03-30', '10:00', 'kepala Desa', 'Kantor Desa');


#
# TABLE STRUCTURE FOR: anggota_kelompok
#

CREATE TABLE `anggota_kelompok` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `id_anggota` varchar(128) NOT NULL,
  `id_kelompok` varchar(128) NOT NULL,
  `no_anggota` varchar(128) NOT NULL,
  `jabatan` varchar(128) NOT NULL,
  `no_sk` varchar(128) DEFAULT NULL,
  `keterangan` varchar(128) DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=8 DEFAULT CHARSET=utf8;

INSERT INTO `anggota_kelompok` (`id`, `id_anggota`, `id_kelompok`, `no_anggota`, `jabatan`, `no_sk`, `keterangan`) VALUES (6, '22', '13', '1123', '1', '', '');
INSERT INTO `anggota_kelompok` (`id`, `id_anggota`, `id_kelompok`, `no_anggota`, `jabatan`, `no_sk`, `keterangan`) VALUES (7, '9', '13', '12345', '3', '', '');


#
# TABLE STRUCTURE FOR: artikel
#

CREATE TABLE `artikel` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `judul` varchar(200) NOT NULL,
  `isi` text NOT NULL,
  `user` varchar(128) NOT NULL,
  `gambar` varchar(300) NOT NULL,
  `aktif` int(11) NOT NULL,
  `tgl_created` varchar(128) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=16 DEFAULT CHARSET=utf8;

INSERT INTO `artikel` (`id`, `judul`, `isi`, `user`, `gambar`, `aktif`, `tgl_created`) VALUES (4, 'Makkela Kela Pererat Hubungan Antar Warga', '<p><span style=\"font-family: Rubik; font-size: 14px;\">﻿</span><span style=\"font-family: Rubik; font-size: 14px;\">﻿</span><span style=\"font-family: Rubik; font-size: 14px;\">﻿</span><span style=\"color: rgb(0, 0, 0); font-family: Rubik; font-size: 14px;\">“Makkela Kela” adalah sebuah tradisi makan bersama yang dilakukan oleh masyarakat Desa Kersik. Acara ini merupakan bentuk perayaan kebersamaan dan pelestarian budaya lokal. Dalam “Makkela Kela,” warga desa berkumpul untuk menikmati hidangan khas yang dibawa oleh masing-masing keluarga, serta terlibat dalam berbagai kegiatan budaya dan sosial. Tradisi ini bertujuan untuk mempererat hubungan antarwarga dan merayakan kekayaan budaya serta keragaman kuliner lokal.</span><br></p>', 'Administrator', '31369ac54f.jpeg', 1, '1741756068');
INSERT INTO `artikel` (`id`, `judul`, `isi`, `user`, `gambar`, `aktif`, `tgl_created`) VALUES (9, 'Artikel, Contoh', '<p><span style=\"font-family: Rubik; font-size: 14px;\">﻿</span><span style=\"font-family: Rubik; font-size: 14px;\">﻿</span><span style=\"font-family: Rubik; font-size: 14px;\">﻿</span><span style=\"font-family: Rubik; font-size: 14px;\">﻿</span><span style=\"font-size: 14px; font-family: Rubik;\">﻿Dalam sambutannya, Sekretaris Desa Kersik, Jusman, menyampaikan pentingnya peran Linmas dalam menjaga ketertiban dan keamanan desa. “Pelatihan ini merupakan bagian dari upaya kami untuk memastikan bahwa Linmas dapat melaksanakan tugas mereka dengan lebih baik dan profesional,” ujarnya.</span></p><p><span style=\"color: rgb(0, 0, 0); font-family: Rubik; font-size: 14px; text-align: justify;\">Contrary to popular belief, Lorem Ipsum is not simply random text. It has roots in a piece of classical Latin literature from 45 BC, making it over 2000 years old. Richard McClintock, a Latin professor at Hampden-Sydney College in Virginia, looked up one of the more obscure Latin words, consectetur, from a Lorem Ipsum passage, and going through the cites of the word in classical literature, discovered the undoubtable source. Lorem Ipsum comes from sections 1.10.32 and 1.10.33 of \"de Finibus Bonorum et Malorum\" (The Extremes of Good and Evil) by Cicero, written in 45 BC. This book is a treatise on the theory of ethics, very popular during the Renaissance. The first line of Lorem Ipsum, \"Lorem ipsum dolor sit amet..\", comes from a line in section 1.10.32.</span></p><p><span style=\"color: rgb(0, 0, 0); font-family: Rubik; font-size: 14px; text-align: justify;\">Contrary to popular belief, Lorem Ipsum is not simply random text. It has roots in a piece of classical Latin literature from 45 BC, making it over 2000 years old. Richard McClintock, a Latin professor at Hampden-Sydney College in Virginia, looked up one of the more obscure Latin words, consectetur, from a Lorem Ipsum passage, and going through the cites of the word in classical literature, discovered the undoubtable source. Lorem Ipsum comes from sections 1.10.32 and 1.10.33 of \"de Finibus Bonorum et Malorum\" (The Extremes of Good and Evil) by Cicero, written in 45 BC. This book is a treatise on the theory of ethics, very popular during the Renaissance. The first line of Lorem Ipsum, \"Lorem ipsum dolor sit amet..\", comes from a line in section 1.10.32.</span></p><p><span style=\"color: rgb(0, 0, 0); font-family: Rubik; font-size: 14px; text-align: justify;\">Contrary to popular belief, Lorem Ipsum is not simply random text. It has roots in a piece of classical Latin literature from 45 BC, making it over 2000 years old. Richard McClintock, a Latin professor at Hampden-Sydney College in Virginia, looked up one of the more obscure Latin words, consectetur, from a Lorem Ipsum passage, and going through the cites of the word in classical literature, discovered the undoubtable source. Lorem Ipsum comes from sections 1.10.32 and 1.10.33 of \"de Finibus Bonorum et Malorum\" (The Extremes of Good and Evil) by Cicero, written in 45 BC. This book is a treatise on the theory of ethics, very popular during the Renaissance. The first line of Lorem Ipsum, \"Lorem ipsum dolor sit amet..\", comes from a line in section 1.10.32.</span><span style=\"color: rgb(0, 0, 0); font-family: Rubik; font-size: 14px; text-align: justify;\"><br></span><span style=\"color: rgb(0, 0, 0); font-family: &quot;Open Sans&quot;, Arial, sans-serif; font-size: 14px; text-align: justify;\"><br></span><span style=\"font-size: 14px;\"><br></span><br></p>', 'Administrator', 'fc1f060d8e.jpg', 1, '1741760312');
INSERT INTO `artikel` (`id`, `judul`, `isi`, `user`, `gambar`, `aktif`, `tgl_created`) VALUES (11, 'Pemerintah Desa Kersik Gelar Pelatihan Untuk Anggota Linmas', '<p><span style=\"font-family: Rubik; font-size: 14px;\">﻿</span><span style=\"font-family: Rubik; font-size: 14px;\">﻿</span><span style=\"font-size: 14px;\">﻿﻿Kersik – Pemerintah Desa Kersik baru-baru ini menyelenggarakan pelatihan intensif bagi anggota Perlindungan Masyarakat (Linmas) desa. Kegiatan ini bertujuan untuk meningkatkan keterampilan dan kesiapsiagaan Linmas dalam melaksanakan tugas mereka di tengah masyarakat.</span><br></p><p style=\"margin-bottom: var(--mantine-spacing-lg);\"><span style=\"margin-top: 0px; margin-bottom: 0px; font-size: 14px;\">Pelatihan yang dilaksanakan ini mencakup berbagai materi penting, termasuk penanganan keamanan lingkungan, dan prosedur pelayanan masyarakat serta pelatihan baris berbaris guna menanamkan kedisiplinan dan kekompakan antar linmas. Para peserta mendapatkan pemahaman mendalam tentang teknik-teknik terkini dalam merespons situasi darurat serta cara-cara efektif dalam menjaga keamanan dan ketertiban desa.</span></p><p style=\"margin-bottom: var(--mantine-spacing-lg);\"><span style=\"margin-top: 0px; margin-bottom: 0px; font-size: 14px;\"><br></span></p><p style=\"margin-bottom: var(--mantine-spacing-lg);\"><span style=\"margin-top: 0px; margin-bottom: 0px; font-size: 14px;\">Dalam sambutannya, Sekretaris Desa Kersik, Jusman, menyampaikan pentingnya peran Linmas dalam menjaga ketertiban dan keamanan desa. “Pelatihan ini merupakan bagian dari upaya kami untuk memastikan bahwa Linmas dapat melaksanakan tugas mereka dengan lebih baik dan profesional,” ujarnya.</span></p><p style=\"margin-bottom: var(--mantine-spacing-lg);\"><span style=\"margin-top: 0px; margin-bottom: 0px; font-size: 14px;\"><br></span></p><p style=\"margin-bottom: var(--mantine-spacing-lg);\"><span style=\"margin-top: 0px; margin-bottom: 0px; font-size: 14px;\">Pelatihan ini juga melibatkan Bhabinkantibmas dan Babinsa untuk memberikan materi dan pengalaman langsung kepada para peserta. Dengan demikian, diharapkan mereka dapat lebih siap dan tanggap dalam menghadapi berbagai situasi yang mungkin terjadi di masyarakat.</span></p><p style=\"margin-bottom: var(--mantine-spacing-lg);\"><span style=\"margin-top: 0px; font-size: 14px;\">Kegiatan ini dihadiri oleh seluruh anggota Linmas Desa Kersik. Melalui pelatihan ini, Pemerintah Desa Kersik berharap dapat memperkuat peran Linmas dalam mendukung keamanan dan kesejahteraan masyarakat desa.(jsm)</span></p>', 'Administrator', '4a38b6a59b.jpeg', 1, '1741761811');
INSERT INTO `artikel` (`id`, `judul`, `isi`, `user`, `gambar`, `aktif`, `tgl_created`) VALUES (12, 'Pelatihan Teknologi Aplikasi Desa', '<p><span style=\"font-family: Rubik; font-size: 14px;\">﻿</span><span style=\"font-family: Rubik; font-size: 14px;\">﻿</span><span style=\"font-family: Rubik; font-size: 14px;\">﻿</span><span style=\"color: rgb(31, 31, 31); font-family: Rubik; font-size: 14px;\">Lorem ipsum, atau ringkasnya lipsum, adalah teks standar yang ditempatkan untuk mendemostrasikan elemen grafis atau presentasi visual seperti font, tipografi, dan tata letak.</span><br></p>', 'Administrator', 'a3daf15a06.jpg', 1, '1742198705');
INSERT INTO `artikel` (`id`, `judul`, `isi`, `user`, `gambar`, `aktif`, `tgl_created`) VALUES (13, 'Teknologi Pemanfaatan Lahan Pertanian', '<p><span style=\"font-family: Rubik; font-size: 14px;\">﻿</span><span style=\"font-family: Rubik; font-size: 14px;\">﻿</span><span style=\"color: rgb(31, 31, 31); font-family: Rubik; font-size: 14px;\">Lorem ipsum, atau ringkasnya lipsum, adalah teks standar yang ditempatkan untuk mendemostrasikan elemen grafis atau presentasi visual seperti font, tipografi, dan tata letak.&nbsp;</span><span style=\"color: rgb(31, 31, 31); font-family: Rubik; font-size: 14px;\">Lorem ipsum, atau ringkasnya lipsum, adalah teks standar yang ditempatkan untuk mendemostrasikan elemen grafis atau presentasi visual seperti font, tipografi, dan tata letak.</span></p><p><br></p>', 'Administrator', 'bbe6afa4dc.jpg', 1, '1742198815');
INSERT INTO `artikel` (`id`, `judul`, `isi`, `user`, `gambar`, `aktif`, `tgl_created`) VALUES (15, 'Pemanfaatan Umkm Rakyat', '<p><span style=\"font-family: Rubik; font-size: 14px;\">﻿</span><span style=\"font-family: Rubik; font-size: 14px;\">﻿</span><span style=\"font-family: Rubik; font-size: 14px;\">﻿</span><span style=\"color: rgb(31, 31, 31); font-family: &quot;Google Sans&quot;, Arial, sans-serif; font-size: 16px;\">Lorem ipsum</span><br></p>', 'Administrator', '86eceebdc2.jpg', 1, '1742354678');


#
# TABLE STRUCTURE FOR: buku_surat_keluar
#

CREATE TABLE `buku_surat_keluar` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `nama_surat` varchar(128) NOT NULL,
  `no_surat_kel` varchar(128) NOT NULL,
  `tgl_surat` varchar(128) NOT NULL,
  `tujuan` varchar(128) NOT NULL,
  `isi_singkat` text NOT NULL,
  `file_surat` varchar(300) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

#
# TABLE STRUCTURE FOR: buku_surat_masuk
#

CREATE TABLE `buku_surat_masuk` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `nama_surat` varchar(128) NOT NULL,
  `tgl_terima` varchar(128) NOT NULL,
  `no_surat` varchar(128) NOT NULL,
  `tgl_surat` varchar(128) NOT NULL,
  `pengirim_surat` varchar(128) NOT NULL,
  `perihal` text NOT NULL,
  `disposisi_ke` varchar(128) NOT NULL,
  `isi_disposisi` text NOT NULL,
  `file_surat_masuk` varchar(400) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

#
# TABLE STRUCTURE FOR: daftar_album
#

CREATE TABLE `daftar_album` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `id_album` int(11) NOT NULL,
  `nama_gambar` varchar(128) NOT NULL,
  `aktif` int(11) NOT NULL,
  `tgl_dibuat` varchar(128) NOT NULL,
  `gambar` varchar(400) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=3 DEFAULT CHARSET=utf8;

INSERT INTO `daftar_album` (`id`, `id_album`, `nama_gambar`, `aktif`, `tgl_dibuat`, `gambar`) VALUES (1, 5, 'Pertanian', 1, '1742206007', '1aa9c7ec71.jpg');
INSERT INTO `daftar_album` (`id`, `id_album`, `nama_gambar`, `aktif`, `tgl_dibuat`, `gambar`) VALUES (2, 5, 'Sawah Irigasi', 1, '1742206031', 'aca926ed56.jpg');


#
# TABLE STRUCTURE FOR: daftar_persyaratan
#

CREATE TABLE `daftar_persyaratan` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `nama` varchar(128) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=14 DEFAULT CHARSET=utf8;

INSERT INTO `daftar_persyaratan` (`id`, `nama`) VALUES (1, 'Surat Pengantar RT/RW');
INSERT INTO `daftar_persyaratan` (`id`, `nama`) VALUES (2, 'Fotokopi KK');
INSERT INTO `daftar_persyaratan` (`id`, `nama`) VALUES (3, 'Fotokopi KTP');
INSERT INTO `daftar_persyaratan` (`id`, `nama`) VALUES (4, 'Fotokopi Surat Nikah/Akta Nikah/Kutipan Akta Perkawinan');
INSERT INTO `daftar_persyaratan` (`id`, `nama`) VALUES (5, 'Fotokopi Akta Kelahiran/Surat Kelahiran bagi keluarga yang mempunyai anak');
INSERT INTO `daftar_persyaratan` (`id`, `nama`) VALUES (6, 'Surat Pindah Datang dari tempat asal');
INSERT INTO `daftar_persyaratan` (`id`, `nama`) VALUES (7, 'Surat Keterangan Kematian dari Rumah Sakit, Rumah Bersalin Puskesmas, atau visum Dokter');
INSERT INTO `daftar_persyaratan` (`id`, `nama`) VALUES (8, 'Surat Keterangan Cerai');
INSERT INTO `daftar_persyaratan` (`id`, `nama`) VALUES (9, 'Fotokopi Ijasah Terakhir');
INSERT INTO `daftar_persyaratan` (`id`, `nama`) VALUES (10, 'SK. PNS/KARIP/SK. TNI – POLRI');
INSERT INTO `daftar_persyaratan` (`id`, `nama`) VALUES (11, 'Surat Keterangan Kematian dari Kepala Desa/Kelurahan');
INSERT INTO `daftar_persyaratan` (`id`, `nama`) VALUES (12, 'Surat imigrasi / STMD (Surat Tanda Melapor Diri)');
INSERT INTO `daftar_persyaratan` (`id`, `nama`) VALUES (13, 'Fotocopy Slip Gaji');


#
# TABLE STRUCTURE FOR: data_kelompok
#

CREATE TABLE `data_kelompok` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `nama_kelompok` varchar(200) NOT NULL,
  `kode_kelompok` int(128) NOT NULL,
  `id_kategori` varchar(200) NOT NULL,
  `id_ketua` varchar(200) NOT NULL,
  `deskripsi_kelompok` text,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=16 DEFAULT CHARSET=utf8;

INSERT INTO `data_kelompok` (`id`, `nama_kelompok`, `kode_kelompok`, `id_kategori`, `id_ketua`, `deskripsi_kelompok`) VALUES (13, 'Cingkeh', 123, '2', '10', 'Petani Cingkeh');
INSERT INTO `data_kelompok` (`id`, `nama_kelompok`, `kode_kelompok`, `id_kategori`, `id_ketua`, `deskripsi_kelompok`) VALUES (14, 'Sejahtera', 12344, '4', '21', '');
INSERT INTO `data_kelompok` (`id`, `nama_kelompok`, `kode_kelompok`, `id_kategori`, `id_ketua`, `deskripsi_kelompok`) VALUES (15, 'Sanggar Kolintang Desa', 12456, '6', '21', 'Kelompok Kesenian Desa');


#
# TABLE STRUCTURE FOR: data_penduduk
#

CREATE TABLE `data_penduduk` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `nik` varchar(17) NOT NULL,
  `no_kk` varchar(20) NOT NULL,
  `nama_penduduk` varchar(200) NOT NULL,
  `hubungan_keluarga_id` int(11) NOT NULL,
  `jenis_kelamin` varchar(100) NOT NULL,
  `agama_id` int(11) NOT NULL,
  `status_penduduk_id` int(11) NOT NULL,
  `tempat_lahir` varchar(128) NOT NULL,
  `tgl_lahir` varchar(128) NOT NULL,
  `kelahiran_anak_ke` varchar(100) DEFAULT NULL,
  `pendikan_kk_id` varchar(100) DEFAULT NULL,
  `pendidikan_sedang_id` varchar(100) DEFAULT NULL,
  `pekerjaan_id` varchar(100) DEFAULT NULL,
  `suku` varchar(150) DEFAULT NULL,
  `status_warganegara` varchar(100) DEFAULT NULL,
  `dokumen_paspor` varchar(45) DEFAULT NULL,
  `tgl_paspor` varchar(128) DEFAULT NULL,
  `dokumen_kitas` varchar(45) DEFAULT NULL,
  `negara_asal` varchar(128) DEFAULT NULL,
  `nik_ayah` varchar(17) DEFAULT NULL,
  `nik_ibu` varchar(17) DEFAULT NULL,
  `nama_ayah` varchar(128) NOT NULL,
  `nama_ibu` varchar(128) NOT NULL,
  `dusun_id` int(11) NOT NULL,
  `alamat_sebelumnya` varchar(200) DEFAULT NULL,
  `alamat_sekarang` varchar(200) DEFAULT NULL,
  `no_telepon` varchar(128) DEFAULT NULL,
  `email` varchar(128) DEFAULT NULL,
  `status_kawin` varchar(128) DEFAULT NULL,
  `golongan_darah` varchar(128) NOT NULL,
  `asuransi_kesehatan` varchar(128) DEFAULT NULL,
  `no_asuransi` varchar(128) DEFAULT NULL,
  `bpjs_ketenagakerjaan` varchar(128) DEFAULT NULL,
  `keterangan` text,
  `foto` varchar(400) DEFAULT NULL,
  `status_dasar_id` int(11) NOT NULL,
  `tgl_terdaftar` varchar(100) NOT NULL,
  `created_by` varchar(128) NOT NULL,
  PRIMARY KEY (`id`),
  UNIQUE KEY `nik` (`nik`)
) ENGINE=InnoDB AUTO_INCREMENT=30 DEFAULT CHARSET=utf8;

INSERT INTO `data_penduduk` (`id`, `nik`, `no_kk`, `nama_penduduk`, `hubungan_keluarga_id`, `jenis_kelamin`, `agama_id`, `status_penduduk_id`, `tempat_lahir`, `tgl_lahir`, `kelahiran_anak_ke`, `pendikan_kk_id`, `pendidikan_sedang_id`, `pekerjaan_id`, `suku`, `status_warganegara`, `dokumen_paspor`, `tgl_paspor`, `dokumen_kitas`, `negara_asal`, `nik_ayah`, `nik_ibu`, `nama_ayah`, `nama_ibu`, `dusun_id`, `alamat_sebelumnya`, `alamat_sekarang`, `no_telepon`, `email`, `status_kawin`, `golongan_darah`, `asuransi_kesehatan`, `no_asuransi`, `bpjs_ketenagakerjaan`, `keterangan`, `foto`, `status_dasar_id`, `tgl_terdaftar`, `created_by`) VALUES (9, '7110026712510002', '7110020704100080', 'Lisbet Mandak', 3, '2', 2, 1, 'Siau', '27-12-1951', '1', '', '18', '1', '134', 'WNI', '', '', '', '', '', '', 'Daniel Mandak', 'Bin Manganpara', 12, '', '', '', '', 'KAWIN', '1', 'TIDAK/BELUM PUNYA', NULL, '', '', 'wuser.png', 1, '2024-06-07', 'Administrator');
INSERT INTO `data_penduduk` (`id`, `nik`, `no_kk`, `nama_penduduk`, `hubungan_keluarga_id`, `jenis_kelamin`, `agama_id`, `status_penduduk_id`, `tempat_lahir`, `tgl_lahir`, `kelahiran_anak_ke`, `pendikan_kk_id`, `pendidikan_sedang_id`, `pekerjaan_id`, `suku`, `status_warganegara`, `dokumen_paspor`, `tgl_paspor`, `dokumen_kitas`, `negara_asal`, `nik_ayah`, `nik_ibu`, `nama_ayah`, `nama_ibu`, `dusun_id`, `alamat_sebelumnya`, `alamat_sekarang`, `no_telepon`, `email`, `status_kawin`, `golongan_darah`, `asuransi_kesehatan`, `no_asuransi`, `bpjs_ketenagakerjaan`, `keterangan`, `foto`, `status_dasar_id`, `tgl_terdaftar`, `created_by`) VALUES (10, '7110020402010002', '7110020704100080', 'GLENDY RONGKO', 6, '1', 2, 1, 'Buyat', '04-02-2001', '1', '5', '12', '3', '100', 'WNA', '1234567', '', '12345678', 'Belanda', '', '', 'Rius Rongko', 'Misye Lahope', 12, '', 'Manado', '081242291179', 'glendyrongko@gmail.com', 'BELUM KAWIN', '3', 'TIDAK/BELUM PUNYA', '', '', '', '7110020402010002.png', 1, '2024-06-07', 'Administrator');
INSERT INTO `data_penduduk` (`id`, `nik`, `no_kk`, `nama_penduduk`, `hubungan_keluarga_id`, `jenis_kelamin`, `agama_id`, `status_penduduk_id`, `tempat_lahir`, `tgl_lahir`, `kelahiran_anak_ke`, `pendikan_kk_id`, `pendidikan_sedang_id`, `pekerjaan_id`, `suku`, `status_warganegara`, `dokumen_paspor`, `tgl_paspor`, `dokumen_kitas`, `negara_asal`, `nik_ayah`, `nik_ibu`, `nama_ayah`, `nama_ibu`, `dusun_id`, `alamat_sebelumnya`, `alamat_sekarang`, `no_telepon`, `email`, `status_kawin`, `golongan_darah`, `asuransi_kesehatan`, `no_asuransi`, `bpjs_ketenagakerjaan`, `keterangan`, `foto`, `status_dasar_id`, `tgl_terdaftar`, `created_by`) VALUES (12, '7101105510790002', '7101102603081291', 'Vivi Robot', 3, '2', 2, 1, 'Dumoga', '15-10-1979', '1', '5', '18', '2', '34', 'WNI', '', '', '', '', '', '', 'I Robot', 'AN Kapantow', 11, '', '', '', '', 'KAWIN', '1', 'TIDAK/BELUM PUNYA', NULL, '', '', 'wuser.png', 1, '2024-06-07', 'Administrator');
INSERT INTO `data_penduduk` (`id`, `nik`, `no_kk`, `nama_penduduk`, `hubungan_keluarga_id`, `jenis_kelamin`, `agama_id`, `status_penduduk_id`, `tempat_lahir`, `tgl_lahir`, `kelahiran_anak_ke`, `pendikan_kk_id`, `pendidikan_sedang_id`, `pekerjaan_id`, `suku`, `status_warganegara`, `dokumen_paspor`, `tgl_paspor`, `dokumen_kitas`, `negara_asal`, `nik_ayah`, `nik_ibu`, `nama_ayah`, `nama_ibu`, `dusun_id`, `alamat_sebelumnya`, `alamat_sekarang`, `no_telepon`, `email`, `status_kawin`, `golongan_darah`, `asuransi_kesehatan`, `no_asuransi`, `bpjs_ketenagakerjaan`, `keterangan`, `foto`, `status_dasar_id`, `tgl_terdaftar`, `created_by`) VALUES (13, '7101102209000001', '7101102603081291', 'Hendrawan Igirisa', 4, '1', 2, 1, 'Manado', '22-09-2000', '1', '5', '11', '3', '34', 'WNI', '', '', '', '', '', '', 'Ajis Igirisa', 'Vivi Robot', 11, '', '', '', '', 'BELUM KAWIN', '1', 'TIDAK/BELUM PUNYA', NULL, '', '', 'kuser.png', 1, '2024-06-07', 'Administrator');
INSERT INTO `data_penduduk` (`id`, `nik`, `no_kk`, `nama_penduduk`, `hubungan_keluarga_id`, `jenis_kelamin`, `agama_id`, `status_penduduk_id`, `tempat_lahir`, `tgl_lahir`, `kelahiran_anak_ke`, `pendikan_kk_id`, `pendidikan_sedang_id`, `pekerjaan_id`, `suku`, `status_warganegara`, `dokumen_paspor`, `tgl_paspor`, `dokumen_kitas`, `negara_asal`, `nik_ayah`, `nik_ibu`, `nama_ayah`, `nama_ibu`, `dusun_id`, `alamat_sebelumnya`, `alamat_sekarang`, `no_telepon`, `email`, `status_kawin`, `golongan_darah`, `asuransi_kesehatan`, `no_asuransi`, `bpjs_ketenagakerjaan`, `keterangan`, `foto`, `status_dasar_id`, `tgl_terdaftar`, `created_by`) VALUES (14, '7101100308050302', '7101102603081291', 'Gian Franco Gilbert Marciano igirisa', 4, '1', 2, 1, 'Manado', '03-08-2005', '2', '5', '11', '3', '34', 'WNI', '', '', '', '', '', '', 'Ajis Igirisa', 'Vivi Robot', 11, '', '', '', '', 'BELUM KAWIN', '2', 'TIDAK/BELUM PUNYA', NULL, '', '', 'kuser.png', 1, '2024-06-07', 'Administrator');
INSERT INTO `data_penduduk` (`id`, `nik`, `no_kk`, `nama_penduduk`, `hubungan_keluarga_id`, `jenis_kelamin`, `agama_id`, `status_penduduk_id`, `tempat_lahir`, `tgl_lahir`, `kelahiran_anak_ke`, `pendikan_kk_id`, `pendidikan_sedang_id`, `pekerjaan_id`, `suku`, `status_warganegara`, `dokumen_paspor`, `tgl_paspor`, `dokumen_kitas`, `negara_asal`, `nik_ayah`, `nik_ibu`, `nama_ayah`, `nama_ibu`, `dusun_id`, `alamat_sebelumnya`, `alamat_sekarang`, `no_telepon`, `email`, `status_kawin`, `golongan_darah`, `asuransi_kesehatan`, `no_asuransi`, `bpjs_ketenagakerjaan`, `keterangan`, `foto`, `status_dasar_id`, `tgl_terdaftar`, `created_by`) VALUES (15, '7101101604090002', '7101102603081291', 'Avrilia Verlita Evelin Igirisa', 4, '2', 2, 1, 'Dumooga', '16-04-2009', '3', '4', '6', '3', '34', 'WNI', '', '', '', '', '', '', 'Ajis Igirisa', 'Vivi Robot', 11, '', '', '', '', 'BELUM KAWIN', '2', 'TIDAK/BELUM PUNYA', NULL, '', '', 'wuser.png', 1, '2024-06-07', 'Administrator');
INSERT INTO `data_penduduk` (`id`, `nik`, `no_kk`, `nama_penduduk`, `hubungan_keluarga_id`, `jenis_kelamin`, `agama_id`, `status_penduduk_id`, `tempat_lahir`, `tgl_lahir`, `kelahiran_anak_ke`, `pendikan_kk_id`, `pendidikan_sedang_id`, `pekerjaan_id`, `suku`, `status_warganegara`, `dokumen_paspor`, `tgl_paspor`, `dokumen_kitas`, `negara_asal`, `nik_ayah`, `nik_ibu`, `nama_ayah`, `nama_ibu`, `dusun_id`, `alamat_sebelumnya`, `alamat_sekarang`, `no_telepon`, `email`, `status_kawin`, `golongan_darah`, `asuransi_kesehatan`, `no_asuransi`, `bpjs_ketenagakerjaan`, `keterangan`, `foto`, `status_dasar_id`, `tgl_terdaftar`, `created_by`) VALUES (21, '7110020402010004', '7110020704100080', 'Alvaro Morata', 4, '1', 2, 2, 'Manado', '17-12-2002', '2', '5', '9', '3', '100', 'WNI', '', '', '', '', '', '', 'Ronald', 'Katrin', 12, '', '', '', '', 'BELUM KAWIN', '1', 'TIDAK/BELUM PUNYA', NULL, '', '', 'kuser.png', 1, '2024-06-16', 'Administrator');
INSERT INTO `data_penduduk` (`id`, `nik`, `no_kk`, `nama_penduduk`, `hubungan_keluarga_id`, `jenis_kelamin`, `agama_id`, `status_penduduk_id`, `tempat_lahir`, `tgl_lahir`, `kelahiran_anak_ke`, `pendikan_kk_id`, `pendidikan_sedang_id`, `pekerjaan_id`, `suku`, `status_warganegara`, `dokumen_paspor`, `tgl_paspor`, `dokumen_kitas`, `negara_asal`, `nik_ayah`, `nik_ibu`, `nama_ayah`, `nama_ibu`, `dusun_id`, `alamat_sebelumnya`, `alamat_sekarang`, `no_telepon`, `email`, `status_kawin`, `golongan_darah`, `asuransi_kesehatan`, `no_asuransi`, `bpjs_ketenagakerjaan`, `keterangan`, `foto`, `status_dasar_id`, `tgl_terdaftar`, `created_by`) VALUES (22, '7110020302530002', '7110020704100080', 'Hans Lahope', 1, '1', 2, 1, 'Buyat', '03-02-1953', '', '3', '18', '9', '134', 'WNI', '', '', '', '', '', '', 'Portinus Lahope', 'Min Manuho', 12, '', 'Desa Buyat', '', '', 'KAWIN', '1', 'TIDAK/BELUM PUNYA', NULL, '', '', 'kuser.png', 1, '2024-06-07', 'Administrator');
INSERT INTO `data_penduduk` (`id`, `nik`, `no_kk`, `nama_penduduk`, `hubungan_keluarga_id`, `jenis_kelamin`, `agama_id`, `status_penduduk_id`, `tempat_lahir`, `tgl_lahir`, `kelahiran_anak_ke`, `pendikan_kk_id`, `pendidikan_sedang_id`, `pekerjaan_id`, `suku`, `status_warganegara`, `dokumen_paspor`, `tgl_paspor`, `dokumen_kitas`, `negara_asal`, `nik_ayah`, `nik_ibu`, `nama_ayah`, `nama_ibu`, `dusun_id`, `alamat_sebelumnya`, `alamat_sekarang`, `no_telepon`, `email`, `status_kawin`, `golongan_darah`, `asuransi_kesehatan`, `no_asuransi`, `bpjs_ketenagakerjaan`, `keterangan`, `foto`, `status_dasar_id`, `tgl_terdaftar`, `created_by`) VALUES (23, '7101155092700005', '7101102603081291', 'Ajis Igirisa', 1, '1', 1, 1, 'Dumoga', '03-12-1967', '', '5', '18', '10', '34', 'WNI', '', '', '', '', '', '', 'Supratman', 'Hajida', 11, '', 'Dumoga Tengah', '08543345667', '', 'KAWIN', '2', 'TIDAK/BELUM PUNYA', '', '', '', 'kuser.png', 1, '2024-06-07', 'Administrator');
INSERT INTO `data_penduduk` (`id`, `nik`, `no_kk`, `nama_penduduk`, `hubungan_keluarga_id`, `jenis_kelamin`, `agama_id`, `status_penduduk_id`, `tempat_lahir`, `tgl_lahir`, `kelahiran_anak_ke`, `pendikan_kk_id`, `pendidikan_sedang_id`, `pekerjaan_id`, `suku`, `status_warganegara`, `dokumen_paspor`, `tgl_paspor`, `dokumen_kitas`, `negara_asal`, `nik_ayah`, `nik_ibu`, `nama_ayah`, `nama_ibu`, `dusun_id`, `alamat_sebelumnya`, `alamat_sekarang`, `no_telepon`, `email`, `status_kawin`, `golongan_darah`, `asuransi_kesehatan`, `no_asuransi`, `bpjs_ketenagakerjaan`, `keterangan`, `foto`, `status_dasar_id`, `tgl_terdaftar`, `created_by`) VALUES (24, '7110020402010005', '7110020704100080', 'Operator Desa', 4, '1', 2, 2, 'Manado', '28-12-1999', '2', '8', '9', '39', '100', 'WNA', '', '2024-06-05', '1243322', 'China', '', '', 'Herman', 'Lia', 12, '', 'Manado Singkil', '0898013040201', 'kevin@gmail.com', 'BELUM KAWIN', '3', 'BPJS PENERIMA BANTUAN IURAN', '111233', '', '', 'kuser.png', 1, '2024-06-29', 'Administrator');
INSERT INTO `data_penduduk` (`id`, `nik`, `no_kk`, `nama_penduduk`, `hubungan_keluarga_id`, `jenis_kelamin`, `agama_id`, `status_penduduk_id`, `tempat_lahir`, `tgl_lahir`, `kelahiran_anak_ke`, `pendikan_kk_id`, `pendidikan_sedang_id`, `pekerjaan_id`, `suku`, `status_warganegara`, `dokumen_paspor`, `tgl_paspor`, `dokumen_kitas`, `negara_asal`, `nik_ayah`, `nik_ibu`, `nama_ayah`, `nama_ibu`, `dusun_id`, `alamat_sebelumnya`, `alamat_sekarang`, `no_telepon`, `email`, `status_kawin`, `golongan_darah`, `asuransi_kesehatan`, `no_asuransi`, `bpjs_ketenagakerjaan`, `keterangan`, `foto`, `status_dasar_id`, `tgl_terdaftar`, `created_by`) VALUES (25, '7102182603600001', '7102181008083047', 'Yani Rinaldi James Tendean', 1, '1', 2, 2, 'Tondano', '26-03-1960', '', '5', '18', '9', '100', 'WNI', '', '', '', '', '', '', 'J.C Tendean', 'Julian Wondal', 12, 'Kelurahan Tataaran 2', 'Kelurahan Tataaran 2', '', '', 'KAWIN', '3', 'TIDAK/BELUM PUNYA', '', '', 'Pendatang', 'kuser.png', 1, '2024-06-29', 'Administrator');
INSERT INTO `data_penduduk` (`id`, `nik`, `no_kk`, `nama_penduduk`, `hubungan_keluarga_id`, `jenis_kelamin`, `agama_id`, `status_penduduk_id`, `tempat_lahir`, `tgl_lahir`, `kelahiran_anak_ke`, `pendikan_kk_id`, `pendidikan_sedang_id`, `pekerjaan_id`, `suku`, `status_warganegara`, `dokumen_paspor`, `tgl_paspor`, `dokumen_kitas`, `negara_asal`, `nik_ayah`, `nik_ibu`, `nama_ayah`, `nama_ibu`, `dusun_id`, `alamat_sebelumnya`, `alamat_sekarang`, `no_telepon`, `email`, `status_kawin`, `golongan_darah`, `asuransi_kesehatan`, `no_asuransi`, `bpjs_ketenagakerjaan`, `keterangan`, `foto`, `status_dasar_id`, `tgl_terdaftar`, `created_by`) VALUES (26, '7102185309580001', '7102181008083047', 'Silvana Grace Warouw', 3, '2', 2, 2, 'Eris', '13-09-1958', '', '9', '18', '5', '100', 'WNI', '', '', '', '', '', '', 'Ernesco Warouw', 'Netty Polii', 12, 'Kelurahan Tataaran 2', 'Kelurahan Tataaran 2', '', '', 'KAWIN', '2', 'TIDAK/BELUM PUNYA', '', '', 'Pendatang', 'wuser.png', 1, '2024-06-29', 'Administrator');
INSERT INTO `data_penduduk` (`id`, `nik`, `no_kk`, `nama_penduduk`, `hubungan_keluarga_id`, `jenis_kelamin`, `agama_id`, `status_penduduk_id`, `tempat_lahir`, `tgl_lahir`, `kelahiran_anak_ke`, `pendikan_kk_id`, `pendidikan_sedang_id`, `pekerjaan_id`, `suku`, `status_warganegara`, `dokumen_paspor`, `tgl_paspor`, `dokumen_kitas`, `negara_asal`, `nik_ayah`, `nik_ibu`, `nama_ayah`, `nama_ibu`, `dusun_id`, `alamat_sebelumnya`, `alamat_sekarang`, `no_telepon`, `email`, `status_kawin`, `golongan_darah`, `asuransi_kesehatan`, `no_asuransi`, `bpjs_ketenagakerjaan`, `keterangan`, `foto`, `status_dasar_id`, `tgl_terdaftar`, `created_by`) VALUES (27, '7102180103840002', '7102181008083047', 'Scott Richie Valentino Tendean', 4, '1', 2, 2, 'Tondano', '01-03-1984', '', '9', '18', '15', '100', 'WNI', '', '', '', '', '', '', 'Yani Rinaldi James Tendean', 'Silvana Grace Warouw', 12, 'Kelurahan Tataaran 2', 'Kelurahan Tataaran 2', '', '', 'BELUM KAWIN', '4', 'TIDAK/BELUM PUNYA', '', '', 'Pendatang', 'kuser.png', 1, '2024-06-29', 'Administrator');
INSERT INTO `data_penduduk` (`id`, `nik`, `no_kk`, `nama_penduduk`, `hubungan_keluarga_id`, `jenis_kelamin`, `agama_id`, `status_penduduk_id`, `tempat_lahir`, `tgl_lahir`, `kelahiran_anak_ke`, `pendikan_kk_id`, `pendidikan_sedang_id`, `pekerjaan_id`, `suku`, `status_warganegara`, `dokumen_paspor`, `tgl_paspor`, `dokumen_kitas`, `negara_asal`, `nik_ayah`, `nik_ibu`, `nama_ayah`, `nama_ibu`, `dusun_id`, `alamat_sebelumnya`, `alamat_sekarang`, `no_telepon`, `email`, `status_kawin`, `golongan_darah`, `asuransi_kesehatan`, `no_asuransi`, `bpjs_ketenagakerjaan`, `keterangan`, `foto`, `status_dasar_id`, `tgl_terdaftar`, `created_by`) VALUES (28, '7102180508880001', '7102181008083047', 'Pierre Ralph Tendean', 4, '1', 2, 2, 'Tomohon', '05-08-1988', '', '10', '18', '1', '100', 'WNI', '', '', '', '', '', '', 'Yani Rinaldi James Tendean', 'Silvana Grace Warouw', 12, 'Kelurahan Tataaran 2', 'Kelurahan Tataaran 2', '', '', 'BELUM KAWIN', '4', 'TIDAK/BELUM PUNYA', '', '', 'Pendatang', 'kuser.png', 1, '2024-06-29', 'Administrator');
INSERT INTO `data_penduduk` (`id`, `nik`, `no_kk`, `nama_penduduk`, `hubungan_keluarga_id`, `jenis_kelamin`, `agama_id`, `status_penduduk_id`, `tempat_lahir`, `tgl_lahir`, `kelahiran_anak_ke`, `pendikan_kk_id`, `pendidikan_sedang_id`, `pekerjaan_id`, `suku`, `status_warganegara`, `dokumen_paspor`, `tgl_paspor`, `dokumen_kitas`, `negara_asal`, `nik_ayah`, `nik_ibu`, `nama_ayah`, `nama_ibu`, `dusun_id`, `alamat_sebelumnya`, `alamat_sekarang`, `no_telepon`, `email`, `status_kawin`, `golongan_darah`, `asuransi_kesehatan`, `no_asuransi`, `bpjs_ketenagakerjaan`, `keterangan`, `foto`, `status_dasar_id`, `tgl_terdaftar`, `created_by`) VALUES (29, '7102186708390001', '7102181008083047', 'Juliana E. Wondal', 7, '2', 2, 2, 'Tondano', '27-08-1939', '', '', '18', '1', '100', 'WNI', '', '', '', '', '', '', 'J. Wondal', 'E. Sepang', 12, 'Kelurahan Tataaran 2', 'Kelurahan Tataaran 2', '088766786879', '', 'KAWIN', '1', 'BPJS BANTUAN DAERAH', '12354678', '', 'Pendatang', 'wuser.png', 1, '2024-06-29', 'Administrator');


#
# TABLE STRUCTURE FOR: dokumen_penduduk
#

CREATE TABLE `dokumen_penduduk` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `id_penduduk` int(11) NOT NULL,
  `nama` varchar(200) NOT NULL,
  `file` varchar(300) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=14 DEFAULT CHARSET=utf8;

INSERT INTO `dokumen_penduduk` (`id`, `id_penduduk`, `nama`, `file`) VALUES (10, 10, 'Fotokopi KK', '9d5b960410.jpeg');
INSERT INTO `dokumen_penduduk` (`id`, `id_penduduk`, `nama`, `file`) VALUES (11, 10, 'Fotocopy Slip Gaji', '9a2c145614.jpeg');
INSERT INTO `dokumen_penduduk` (`id`, `id_penduduk`, `nama`, `file`) VALUES (12, 13, 'Fotokopi KTP', '0798b50392.pdf');
INSERT INTO `dokumen_penduduk` (`id`, `id_penduduk`, `nama`, `file`) VALUES (13, 10, 'Fotokopi KTP', '5affff8aec.jpeg');


#
# TABLE STRUCTURE FOR: dokumentasi_pembangunan
#

CREATE TABLE `dokumentasi_pembangunan` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `id_pembangunan` int(11) NOT NULL,
  `presentase` varchar(128) NOT NULL,
  `foto_dok` varchar(300) NOT NULL,
  `ket` text NOT NULL,
  `tgl_rekam` varchar(128) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=22 DEFAULT CHARSET=utf8;

INSERT INTO `dokumentasi_pembangunan` (`id`, `id_pembangunan`, `presentase`, `foto_dok`, `ket`, `tgl_rekam`) VALUES (20, 6, '10%', 'OIP.jpg', 'Tahap 1', '2025-03-28');
INSERT INTO `dokumentasi_pembangunan` (`id`, `id_pembangunan`, `presentase`, `foto_dok`, `ket`, `tgl_rekam`) VALUES (21, 6, '20%', 'OIP_(2).jpg', 'Tahap 2', '2025-03-28');


#
# TABLE STRUCTURE FOR: galeri
#

CREATE TABLE `galeri` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `nama_album` varchar(128) NOT NULL,
  `aktif` int(11) NOT NULL,
  `tgl_buat` varchar(128) NOT NULL,
  `gambar` varchar(400) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=6 DEFAULT CHARSET=utf8;

INSERT INTO `galeri` (`id`, `nama_album`, `aktif`, `tgl_buat`, `gambar`) VALUES (1, 'Pembangunan', 1, '1742203817', 'bda40d041d.jpg');
INSERT INTO `galeri` (`id`, `nama_album`, `aktif`, `tgl_buat`, `gambar`) VALUES (2, 'Sosialisasi', 1, '1742204773', 'abf8154fc8.jpeg');
INSERT INTO `galeri` (`id`, `nama_album`, `aktif`, `tgl_buat`, `gambar`) VALUES (3, 'Komputer', 1, '1742204808', 'f9bad44858.jpg');
INSERT INTO `galeri` (`id`, `nama_album`, `aktif`, `tgl_buat`, `gambar`) VALUES (4, 'Tambak Ikan', 1, '1742205690', 'eff6421153.jpg');
INSERT INTO `galeri` (`id`, `nama_album`, `aktif`, `tgl_buat`, `gambar`) VALUES (5, 'Sawah', 1, '1742205720', '4598c89785.jpg');


#
# TABLE STRUCTURE FOR: galeri_umkm
#

CREATE TABLE `galeri_umkm` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `id_umkm` int(11) NOT NULL,
  `foto` varchar(200) NOT NULL,
  `token` varchar(128) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=7 DEFAULT CHARSET=utf8;

INSERT INTO `galeri_umkm` (`id`, `id_umkm`, `foto`, `token`) VALUES (1, 5, 'download_(2).jpg', '0.5156708069392422');
INSERT INTO `galeri_umkm` (`id`, `id_umkm`, `foto`, `token`) VALUES (2, 5, 'download_(3).jpg', '0.5907975759360318');
INSERT INTO `galeri_umkm` (`id`, `id_umkm`, `foto`, `token`) VALUES (3, 5, 'images_(3).jpg', '0.19151069327804704');
INSERT INTO `galeri_umkm` (`id`, `id_umkm`, `foto`, `token`) VALUES (4, 5, 'images_(4).jpg', '0.44711993090182345');
INSERT INTO `galeri_umkm` (`id`, `id_umkm`, `foto`, `token`) VALUES (5, 4, 'manado-city-2.jpg', '0.7598036557651662');
INSERT INTO `galeri_umkm` (`id`, `id_umkm`, `foto`, `token`) VALUES (6, 4, 'images_(2).jpg', '0.41503876474084556');


#
# TABLE STRUCTURE FOR: golongan_darah
#

CREATE TABLE `golongan_darah` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `nama` varchar(15) DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=14 DEFAULT CHARSET=utf8;

INSERT INTO `golongan_darah` (`id`, `nama`) VALUES (1, 'A');
INSERT INTO `golongan_darah` (`id`, `nama`) VALUES (2, 'B');
INSERT INTO `golongan_darah` (`id`, `nama`) VALUES (3, 'AB');
INSERT INTO `golongan_darah` (`id`, `nama`) VALUES (4, 'O');
INSERT INTO `golongan_darah` (`id`, `nama`) VALUES (5, 'A+');
INSERT INTO `golongan_darah` (`id`, `nama`) VALUES (6, 'A-');
INSERT INTO `golongan_darah` (`id`, `nama`) VALUES (7, 'B+');
INSERT INTO `golongan_darah` (`id`, `nama`) VALUES (8, 'B-');
INSERT INTO `golongan_darah` (`id`, `nama`) VALUES (9, 'AB+');
INSERT INTO `golongan_darah` (`id`, `nama`) VALUES (10, 'AB-');
INSERT INTO `golongan_darah` (`id`, `nama`) VALUES (11, 'O+');
INSERT INTO `golongan_darah` (`id`, `nama`) VALUES (12, 'O-');
INSERT INTO `golongan_darah` (`id`, `nama`) VALUES (13, 'TIDAK TAHU');


#
# TABLE STRUCTURE FOR: halaman_statis
#

CREATE TABLE `halaman_statis` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `judul` varchar(200) NOT NULL,
  `isi` text NOT NULL,
  `user` varchar(128) NOT NULL,
  `status` int(11) NOT NULL,
  `tgl_posting` varchar(128) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=5 DEFAULT CHARSET=utf8;

INSERT INTO `halaman_statis` (`id`, `judul`, `isi`, `user`, `status`, `tgl_posting`) VALUES (2, 'Sejarah Desa', '<p align=\"center\" style=\"border-width: 0px; border-style: solid; border-color: rgb(229, 231, 235); --tw-translate-x:0; --tw-translate-y:0; --tw-rotate:0; --tw-skew-x:0; --tw-skew-y:0; --tw-scale-x:1; --tw-scale-y:1; --tw-scroll-snap-strictness:proximity; --tw-ring-offset-width:0px; --tw-ring-offset-color:#fff; --tw-ring-color:rgb(59 130 246 / 0.5); --tw-ring-offset-shadow:0 0 #0000; --tw-ring-shadow:0 0 #0000; --tw-shadow:0 0 #0000; --tw-shadow-colored:0 0 #0000; margin-bottom: 0px; color: rgb(75, 85, 99); font-family: Poppins, sans-serif; font-size: 15px; text-align: justify; overflow-wrap: break-word !important;\"><span style=\"font-family: Rubik; font-size: 14px;\"><br></span></p><p align=\"center\" style=\"text-align: center; border-width: 0px; border-style: solid; border-color: rgb(229, 231, 235); --tw-translate-x:0; --tw-translate-y:0; --tw-rotate:0; --tw-skew-x:0; --tw-skew-y:0; --tw-scale-x:1; --tw-scale-y:1; --tw-scroll-snap-strictness:proximity; --tw-ring-offset-width:0px; --tw-ring-offset-color:#fff; --tw-ring-color:rgb(59 130 246 / 0.5); --tw-ring-offset-shadow:0 0 #0000; --tw-ring-shadow:0 0 #0000; --tw-shadow:0 0 #0000; --tw-shadow-colored:0 0 #0000; margin-bottom: 0px; color: rgb(75, 85, 99); font-family: Poppins, sans-serif; font-size: 15px; overflow-wrap: break-word !important;\"><iframe frameborder=\"0\" src=\"//www.youtube.com/embed/7KGmig6l7bE\" width=\"640\" height=\"360\" class=\"note-video-clip\"></iframe><span style=\"font-family: Rubik; font-size: 14px;\"><br></span></p><p align=\"center\" style=\"border-width: 0px; border-style: solid; border-color: rgb(229, 231, 235); --tw-translate-x:0; --tw-translate-y:0; --tw-rotate:0; --tw-skew-x:0; --tw-skew-y:0; --tw-scale-x:1; --tw-scale-y:1; --tw-scroll-snap-strictness:proximity; --tw-ring-offset-width:0px; --tw-ring-offset-color:#fff; --tw-ring-color:rgb(59 130 246 / 0.5); --tw-ring-offset-shadow:0 0 #0000; --tw-ring-shadow:0 0 #0000; --tw-shadow:0 0 #0000; --tw-shadow-colored:0 0 #0000; margin-bottom: 0px; color: rgb(75, 85, 99); font-family: Poppins, sans-serif; font-size: 15px; text-align: justify; overflow-wrap: break-word !important;\"><span style=\"font-family: Rubik; font-size: 14px;\"><br></span></p><p align=\"center\" style=\"border-width: 0px; border-style: solid; border-color: rgb(229, 231, 235); --tw-translate-x:0; --tw-translate-y:0; --tw-rotate:0; --tw-skew-x:0; --tw-skew-y:0; --tw-scale-x:1; --tw-scale-y:1; --tw-scroll-snap-strictness:proximity; --tw-ring-offset-width:0px; --tw-ring-offset-color:#fff; --tw-ring-color:rgb(59 130 246 / 0.5); --tw-ring-offset-shadow:0 0 #0000; --tw-ring-shadow:0 0 #0000; --tw-shadow:0 0 #0000; --tw-shadow-colored:0 0 #0000; margin-bottom: 0px; color: rgb(75, 85, 99); font-family: Poppins, sans-serif; font-size: 15px; text-align: justify; overflow-wrap: break-word !important;\"><span style=\"font-family: Rubik; font-size: 14px;\">﻿</span><span style=\"font-family: Rubik;\">Sejarah telah mencatat bahwa Pulau Lombok pernah menjadi wilayah kekuasaan Kerajaan Karang Asem Bali yang berkedudukan di Cakranegara dengan seorang raja bernama Anak Agung Gde Jelantik. Berakhirnya&nbsp;</span><span style=\"border-width: 0px; border-style: solid; border-color: rgb(229, 231, 235); --tw-translate-x:0; --tw-translate-y:0; --tw-rotate:0; --tw-skew-x:0; --tw-skew-y:0; --tw-scale-x:1; --tw-scale-y:1; --tw-scroll-snap-strictness:proximity; --tw-ring-offset-width:0px; --tw-ring-offset-color:#fff; --tw-ring-color:rgb(59 130 246 / 0.5); --tw-ring-offset-shadow:0 0 #0000; --tw-ring-shadow:0 0 #0000; --tw-shadow:0 0 #0000; --tw-shadow-colored:0 0 #0000; font-weight: bolder; font-family: Rubik;\">kekuasaan</span><span style=\"font-family: Rubik;\">&nbsp;Kerajaan Karang Asem Bali di Pulau Lombok setelah datangnya Belanda pada Tahun 1891, dimana Belanda pada waktu itu ingin menguasai Pulau Lombok dengan dalih pura-pura membantu rakyat Lombok yang dianggap tertindas oleh Pemerintahan Raja Lombok yaitu Anak Agung Gede Jelantik.</span></p><p style=\"border-width: 0px; border-style: solid; border-color: rgb(229, 231, 235); --tw-translate-x:0; --tw-translate-y:0; --tw-rotate:0; --tw-skew-x:0; --tw-skew-y:0; --tw-scale-x:1; --tw-scale-y:1; --tw-scroll-snap-strictness:proximity; --tw-ring-offset-width:0px; --tw-ring-offset-color:#fff; --tw-ring-color:rgb(59 130 246 / 0.5); --tw-ring-offset-shadow:0 0 #0000; --tw-ring-shadow:0 0 #0000; --tw-shadow:0 0 #0000; --tw-shadow-colored:0 0 #0000; margin-top: calc(0.5rem * calc(1 - var(--tw-space-y-reverse))); margin-bottom: calc(0.5rem * var(--tw-space-y-reverse)); --tw-space-y-reverse:0; color: rgb(75, 85, 99); font-family: Poppins, sans-serif; font-size: 15px; text-align: justify; overflow-wrap: break-word !important;\"><span style=\"font-family: Rubik;\">Pada masa kekuasaan Raja Lombok yaitu Anak Agung Gde Jelantik, wilayah Desa Senggigi ( Dusun Mangsit, Kerandangan, Senggigi dan Dusun Loco) masih bergabung dengan Desa Senteluk yang sekarang menjadi Desa Meninting . Sedangkan pada tahun 1962 Desa Senteluk pecah menjadi 2 (Dua) desa yaitu Desa Meninting dan Desa Batulayar dan Dusun Mangsit,Kerandangan,Senggigi dan Dusun Loco bergabung ke Desa Batulayar.&nbsp;</span></p><p style=\"border-width: 0px; border-style: solid; border-color: rgb(229, 231, 235); --tw-translate-x:0; --tw-translate-y:0; --tw-rotate:0; --tw-skew-x:0; --tw-skew-y:0; --tw-scale-x:1; --tw-scale-y:1; --tw-scroll-snap-strictness:proximity; --tw-ring-offset-width:0px; --tw-ring-offset-color:#fff; --tw-ring-color:rgb(59 130 246 / 0.5); --tw-ring-offset-shadow:0 0 #0000; --tw-ring-shadow:0 0 #0000; --tw-shadow:0 0 #0000; --tw-shadow-colored:0 0 #0000; margin-top: calc(0.5rem * calc(1 - var(--tw-space-y-reverse))); margin-bottom: calc(0.5rem * var(--tw-space-y-reverse)); --tw-space-y-reverse:0; color: rgb(75, 85, 99); font-family: Poppins, sans-serif; font-size: 15px; text-align: justify; overflow-wrap: break-word !important;\"><span style=\"font-family: Rubik;\">Pemberian nama Desa Batulayar pada waktu itu yang lazim disebut dengan Pemusungan/Kepala Dea Batulayar berdasarkan hasil musyawarah nama Batulayar diambil dari nama tempat yang amat terkenal yaitu Makam Batulayar yang sampai saat ini banyak dikunjungi oleh masyarakat Pulau Lombok pada khususnya dan Masyarakat Nusa Tenggara Barat pada umumnya.</span></p>', 'Administrator', 1, '1742380744');
INSERT INTO `halaman_statis` (`id`, `judul`, `isi`, `user`, `status`, `tgl_posting`) VALUES (3, 'Visi dan Misi', '<p style=\"margin-top: calc(0.5rem * calc(1 - var(--tw-space-y-reverse))); margin-bottom: calc(0.5rem * var(--tw-space-y-reverse)); border-width: 0px; border-style: solid; border-color: rgb(229, 231, 235); --tw-translate-x:0; --tw-translate-y:0; --tw-rotate:0; --tw-skew-x:0; --tw-skew-y:0; --tw-scale-x:1; --tw-scale-y:1; --tw-scroll-snap-strictness:proximity; --tw-ring-offset-width:0px; --tw-ring-offset-color:#fff; --tw-ring-color:rgb(59 130 246 / 0.5); --tw-ring-offset-shadow:0 0 #0000; --tw-ring-shadow:0 0 #0000; --tw-shadow:0 0 #0000; --tw-shadow-colored:0 0 #0000; --tw-space-y-reverse:0; color: rgb(75, 85, 99); font-family: Poppins, sans-serif; font-size: 15px; text-align: center; overflow-wrap: break-word !important;\"><span style=\"font-family: Rubik; font-weight: bolder; font-size: 14px;\">VISI</span><span style=\"font-family: Rubik; font-size: 14px;\">&nbsp;</span></p><p style=\"margin-top: calc(0.5rem * calc(1 - var(--tw-space-y-reverse))); margin-bottom: calc(0.5rem * var(--tw-space-y-reverse)); border-width: 0px; border-style: solid; border-color: rgb(229, 231, 235); --tw-translate-x:0; --tw-translate-y:0; --tw-rotate:0; --tw-skew-x:0; --tw-skew-y:0; --tw-scale-x:1; --tw-scale-y:1; --tw-scroll-snap-strictness:proximity; --tw-ring-offset-width:0px; --tw-ring-offset-color:#fff; --tw-ring-color:rgb(59 130 246 / 0.5); --tw-ring-offset-shadow:0 0 #0000; --tw-ring-shadow:0 0 #0000; --tw-shadow:0 0 #0000; --tw-shadow-colored:0 0 #0000; --tw-space-y-reverse:0; color: rgb(75, 85, 99); font-family: Poppins, sans-serif; font-size: 15px; text-align: center; overflow-wrap: break-word !important;\"><span style=\"border-width: 0px; border-style: solid; border-color: rgb(229, 231, 235); --tw-translate-x:0; --tw-translate-y:0; --tw-rotate:0; --tw-skew-x:0; --tw-skew-y:0; --tw-scale-x:1; --tw-scale-y:1; --tw-scroll-snap-strictness:proximity; --tw-ring-offset-width:0px; --tw-ring-offset-color:#fff; --tw-ring-color:rgb(59 130 246 / 0.5); --tw-ring-offset-shadow:0 0 #0000; --tw-ring-shadow:0 0 #0000; --tw-shadow:0 0 #0000; --tw-shadow-colored:0 0 #0000; font-weight: bolder; font-family: Rubik; font-size: 14px;\">\"Senggigi Berseri\"</span></p><p style=\"margin-top: calc(0.5rem * calc(1 - var(--tw-space-y-reverse))); margin-bottom: calc(0.5rem * var(--tw-space-y-reverse)); border-width: 0px; border-style: solid; border-color: rgb(229, 231, 235); --tw-translate-x:0; --tw-translate-y:0; --tw-rotate:0; --tw-skew-x:0; --tw-skew-y:0; --tw-scale-x:1; --tw-scale-y:1; --tw-scroll-snap-strictness:proximity; --tw-ring-offset-width:0px; --tw-ring-offset-color:#fff; --tw-ring-color:rgb(59 130 246 / 0.5); --tw-ring-offset-shadow:0 0 #0000; --tw-ring-shadow:0 0 #0000; --tw-shadow:0 0 #0000; --tw-shadow-colored:0 0 #0000; --tw-space-y-reverse:0; color: rgb(75, 85, 99); font-family: Poppins, sans-serif; font-size: 15px; text-align: center; overflow-wrap: break-word !important;\"><span style=\"font-family: Rubik; font-size: 14px;\">&nbsp;</span></p><p style=\"margin-top: calc(0.5rem * calc(1 - var(--tw-space-y-reverse))); margin-bottom: calc(0.5rem * var(--tw-space-y-reverse)); border-width: 0px; border-style: solid; border-color: rgb(229, 231, 235); --tw-translate-x:0; --tw-translate-y:0; --tw-rotate:0; --tw-skew-x:0; --tw-skew-y:0; --tw-scale-x:1; --tw-scale-y:1; --tw-scroll-snap-strictness:proximity; --tw-ring-offset-width:0px; --tw-ring-offset-color:#fff; --tw-ring-color:rgb(59 130 246 / 0.5); --tw-ring-offset-shadow:0 0 #0000; --tw-ring-shadow:0 0 #0000; --tw-shadow:0 0 #0000; --tw-shadow-colored:0 0 #0000; --tw-space-y-reverse:0; color: rgb(75, 85, 99); font-family: Poppins, sans-serif; font-size: 15px; text-align: center; overflow-wrap: break-word !important;\"><span style=\"border-width: 0px; border-style: solid; border-color: rgb(229, 231, 235); --tw-translate-x:0; --tw-translate-y:0; --tw-rotate:0; --tw-skew-x:0; --tw-skew-y:0; --tw-scale-x:1; --tw-scale-y:1; --tw-scroll-snap-strictness:proximity; --tw-ring-offset-width:0px; --tw-ring-offset-color:#fff; --tw-ring-color:rgb(59 130 246 / 0.5); --tw-ring-offset-shadow:0 0 #0000; --tw-ring-shadow:0 0 #0000; --tw-shadow:0 0 #0000; --tw-shadow-colored:0 0 #0000; font-weight: bolder; font-family: Rubik; font-size: 14px;\">(Bersih, Relegius, Sejahtera, Rapi, dan Indah)</span></p><p style=\"margin-top: calc(0.5rem * calc(1 - var(--tw-space-y-reverse))); margin-bottom: calc(0.5rem * var(--tw-space-y-reverse)); border-width: 0px; border-style: solid; border-color: rgb(229, 231, 235); --tw-translate-x:0; --tw-translate-y:0; --tw-rotate:0; --tw-skew-x:0; --tw-skew-y:0; --tw-scale-x:1; --tw-scale-y:1; --tw-scroll-snap-strictness:proximity; --tw-ring-offset-width:0px; --tw-ring-offset-color:#fff; --tw-ring-color:rgb(59 130 246 / 0.5); --tw-ring-offset-shadow:0 0 #0000; --tw-ring-shadow:0 0 #0000; --tw-shadow:0 0 #0000; --tw-shadow-colored:0 0 #0000; --tw-space-y-reverse:0; color: rgb(75, 85, 99); font-family: Poppins, sans-serif; font-size: 15px; text-align: center; overflow-wrap: break-word !important;\"><span style=\"font-family: Rubik; font-size: 14px;\">&nbsp;</span></p><p style=\"margin-top: calc(0.5rem * calc(1 - var(--tw-space-y-reverse))); margin-bottom: calc(0.5rem * var(--tw-space-y-reverse)); border-width: 0px; border-style: solid; border-color: rgb(229, 231, 235); --tw-translate-x:0; --tw-translate-y:0; --tw-rotate:0; --tw-skew-x:0; --tw-skew-y:0; --tw-scale-x:1; --tw-scale-y:1; --tw-scroll-snap-strictness:proximity; --tw-ring-offset-width:0px; --tw-ring-offset-color:#fff; --tw-ring-color:rgb(59 130 246 / 0.5); --tw-ring-offset-shadow:0 0 #0000; --tw-ring-shadow:0 0 #0000; --tw-shadow:0 0 #0000; --tw-shadow-colored:0 0 #0000; --tw-space-y-reverse:0; color: rgb(75, 85, 99); font-family: Poppins, sans-serif; font-size: 15px; text-align: center; overflow-wrap: break-word !important;\"><span style=\"border-width: 0px; border-style: solid; border-color: rgb(229, 231, 235); --tw-translate-x:0; --tw-translate-y:0; --tw-rotate:0; --tw-skew-x:0; --tw-skew-y:0; --tw-scale-x:1; --tw-scale-y:1; --tw-scroll-snap-strictness:proximity; --tw-ring-offset-width:0px; --tw-ring-offset-color:#fff; --tw-ring-color:rgb(59 130 246 / 0.5); --tw-ring-offset-shadow:0 0 #0000; --tw-ring-shadow:0 0 #0000; --tw-shadow:0 0 #0000; --tw-shadow-colored:0 0 #0000; font-weight: bolder; font-family: Rubik; font-size: 14px;\">\"Terwujudnya masyarakat Desa Senggigi yang Bersih, Relegius, Sejahtera, Rapi dan Indah melalui Akselerasi Pembangunan yang berbasis Keagamaan, Budaya Hukum dan Berwawasan Lingkungan dengan berorentasi pada peningkatan Kinerja Aparatur dan Pemberdayaan Masyarakat\"</span></p><p style=\"margin-top: calc(0.5rem * calc(1 - var(--tw-space-y-reverse))); margin-bottom: calc(0.5rem * var(--tw-space-y-reverse)); border-width: 0px; border-style: solid; border-color: rgb(229, 231, 235); --tw-translate-x:0; --tw-translate-y:0; --tw-rotate:0; --tw-skew-x:0; --tw-skew-y:0; --tw-scale-x:1; --tw-scale-y:1; --tw-scroll-snap-strictness:proximity; --tw-ring-offset-width:0px; --tw-ring-offset-color:#fff; --tw-ring-color:rgb(59 130 246 / 0.5); --tw-ring-offset-shadow:0 0 #0000; --tw-ring-shadow:0 0 #0000; --tw-shadow:0 0 #0000; --tw-shadow-colored:0 0 #0000; --tw-space-y-reverse:0; color: rgb(75, 85, 99); font-family: Poppins, sans-serif; font-size: 15px; overflow-wrap: break-word !important;\"><span style=\"font-family: Rubik; font-size: 14px;\">&nbsp;&nbsp;</span></p><p style=\"margin-top: calc(0.5rem * calc(1 - var(--tw-space-y-reverse))); margin-bottom: calc(0.5rem * var(--tw-space-y-reverse)); border-width: 0px; border-style: solid; border-color: rgb(229, 231, 235); --tw-translate-x:0; --tw-translate-y:0; --tw-rotate:0; --tw-skew-x:0; --tw-skew-y:0; --tw-scale-x:1; --tw-scale-y:1; --tw-scroll-snap-strictness:proximity; --tw-ring-offset-width:0px; --tw-ring-offset-color:#fff; --tw-ring-color:rgb(59 130 246 / 0.5); --tw-ring-offset-shadow:0 0 #0000; --tw-ring-shadow:0 0 #0000; --tw-shadow:0 0 #0000; --tw-shadow-colored:0 0 #0000; --tw-space-y-reverse:0; color: rgb(75, 85, 99); font-family: Poppins, sans-serif; font-size: 15px; overflow-wrap: break-word !important;\"><span style=\"border-width: 0px; border-style: solid; border-color: rgb(229, 231, 235); --tw-translate-x:0; --tw-translate-y:0; --tw-rotate:0; --tw-skew-x:0; --tw-skew-y:0; --tw-scale-x:1; --tw-scale-y:1; --tw-scroll-snap-strictness:proximity; --tw-ring-offset-width:0px; --tw-ring-offset-color:#fff; --tw-ring-color:rgb(59 130 246 / 0.5); --tw-ring-offset-shadow:0 0 #0000; --tw-ring-shadow:0 0 #0000; --tw-shadow:0 0 #0000; --tw-shadow-colored:0 0 #0000; font-weight: bolder; font-family: Rubik; font-size: 14px;\">MISI</span></p><p style=\"margin-top: calc(0.5rem * calc(1 - var(--tw-space-y-reverse))); margin-bottom: calc(0.5rem * var(--tw-space-y-reverse)); border-width: 0px; border-style: solid; border-color: rgb(229, 231, 235); --tw-translate-x:0; --tw-translate-y:0; --tw-rotate:0; --tw-skew-x:0; --tw-skew-y:0; --tw-scale-x:1; --tw-scale-y:1; --tw-scroll-snap-strictness:proximity; --tw-ring-offset-width:0px; --tw-ring-offset-color:#fff; --tw-ring-color:rgb(59 130 246 / 0.5); --tw-ring-offset-shadow:0 0 #0000; --tw-ring-shadow:0 0 #0000; --tw-shadow:0 0 #0000; --tw-shadow-colored:0 0 #0000; --tw-space-y-reverse:0; color: rgb(75, 85, 99); font-family: Poppins, sans-serif; font-size: 15px; overflow-wrap: break-word !important;\"><span style=\"border-width: 0px; border-style: solid; border-color: rgb(229, 231, 235); --tw-translate-x:0; --tw-translate-y:0; --tw-rotate:0; --tw-skew-x:0; --tw-skew-y:0; --tw-scale-x:1; --tw-scale-y:1; --tw-scroll-snap-strictness:proximity; --tw-ring-offset-width:0px; --tw-ring-offset-color:#fff; --tw-ring-color:rgb(59 130 246 / 0.5); --tw-ring-offset-shadow:0 0 #0000; --tw-ring-shadow:0 0 #0000; --tw-shadow:0 0 #0000; --tw-shadow-colored:0 0 #0000; font-weight: bolder; font-family: Rubik; font-size: 14px;\">Misi dan Program Desa Senggigi</span></p><p style=\"margin-top: calc(0.5rem * calc(1 - var(--tw-space-y-reverse))); margin-bottom: calc(0.5rem * var(--tw-space-y-reverse)); border-width: 0px; border-style: solid; border-color: rgb(229, 231, 235); --tw-translate-x:0; --tw-translate-y:0; --tw-rotate:0; --tw-skew-x:0; --tw-skew-y:0; --tw-scale-x:1; --tw-scale-y:1; --tw-scroll-snap-strictness:proximity; --tw-ring-offset-width:0px; --tw-ring-offset-color:#fff; --tw-ring-color:rgb(59 130 246 / 0.5); --tw-ring-offset-shadow:0 0 #0000; --tw-ring-shadow:0 0 #0000; --tw-shadow:0 0 #0000; --tw-shadow-colored:0 0 #0000; --tw-space-y-reverse:0; color: rgb(75, 85, 99); font-family: Poppins, sans-serif; font-size: 15px; overflow-wrap: break-word !important;\"><span style=\"font-family: Rubik; font-size: 14px;\">Dan untuk melaksanakan visi Desa Senggigi dilaksanakan misi dan program sebagai berikut:</span></p><p style=\"margin-top: calc(0.5rem * calc(1 - var(--tw-space-y-reverse))); margin-bottom: calc(0.5rem * var(--tw-space-y-reverse)); border-width: 0px; border-style: solid; border-color: rgb(229, 231, 235); --tw-translate-x:0; --tw-translate-y:0; --tw-rotate:0; --tw-skew-x:0; --tw-skew-y:0; --tw-scale-x:1; --tw-scale-y:1; --tw-scroll-snap-strictness:proximity; --tw-ring-offset-width:0px; --tw-ring-offset-color:#fff; --tw-ring-color:rgb(59 130 246 / 0.5); --tw-ring-offset-shadow:0 0 #0000; --tw-ring-shadow:0 0 #0000; --tw-shadow:0 0 #0000; --tw-shadow-colored:0 0 #0000; --tw-space-y-reverse:0; color: rgb(75, 85, 99); font-family: Poppins, sans-serif; font-size: 15px; overflow-wrap: break-word !important;\"><span style=\"font-family: Rubik; font-size: 14px;\">1. Pembangunan Jangka Panjang</span></p><p style=\"margin-top: calc(0.5rem * calc(1 - var(--tw-space-y-reverse))); margin-bottom: calc(0.5rem * var(--tw-space-y-reverse)); border-width: 0px; border-style: solid; border-color: rgb(229, 231, 235); --tw-translate-x:0; --tw-translate-y:0; --tw-rotate:0; --tw-skew-x:0; --tw-skew-y:0; --tw-scale-x:1; --tw-scale-y:1; --tw-scroll-snap-strictness:proximity; --tw-ring-offset-width:0px; --tw-ring-offset-color:#fff; --tw-ring-color:rgb(59 130 246 / 0.5); --tw-ring-offset-shadow:0 0 #0000; --tw-ring-shadow:0 0 #0000; --tw-shadow:0 0 #0000; --tw-shadow-colored:0 0 #0000; --tw-space-y-reverse:0; color: rgb(75, 85, 99); font-family: Poppins, sans-serif; font-size: 15px; overflow-wrap: break-word !important;\"><span style=\"font-family: Rubik; font-size: 14px;\">&nbsp; &nbsp; - Melanjutkan pembangunan desa yang belum terlaksana.</span></p><p style=\"margin-top: calc(0.5rem * calc(1 - var(--tw-space-y-reverse))); margin-bottom: calc(0.5rem * var(--tw-space-y-reverse)); border-width: 0px; border-style: solid; border-color: rgb(229, 231, 235); --tw-translate-x:0; --tw-translate-y:0; --tw-rotate:0; --tw-skew-x:0; --tw-skew-y:0; --tw-scale-x:1; --tw-scale-y:1; --tw-scroll-snap-strictness:proximity; --tw-ring-offset-width:0px; --tw-ring-offset-color:#fff; --tw-ring-color:rgb(59 130 246 / 0.5); --tw-ring-offset-shadow:0 0 #0000; --tw-ring-shadow:0 0 #0000; --tw-shadow:0 0 #0000; --tw-shadow-colored:0 0 #0000; --tw-space-y-reverse:0; color: rgb(75, 85, 99); font-family: Poppins, sans-serif; font-size: 15px; overflow-wrap: break-word !important;\"><span style=\"font-family: Rubik; font-size: 14px;\">&nbsp; &nbsp; - Meningkatkan kerjasama antara pemerintah desa dengan lembaga desa yang ada.</span></p><p style=\"margin-top: calc(0.5rem * calc(1 - var(--tw-space-y-reverse))); margin-bottom: calc(0.5rem * var(--tw-space-y-reverse)); border-width: 0px; border-style: solid; border-color: rgb(229, 231, 235); --tw-translate-x:0; --tw-translate-y:0; --tw-rotate:0; --tw-skew-x:0; --tw-skew-y:0; --tw-scale-x:1; --tw-scale-y:1; --tw-scroll-snap-strictness:proximity; --tw-ring-offset-width:0px; --tw-ring-offset-color:#fff; --tw-ring-color:rgb(59 130 246 / 0.5); --tw-ring-offset-shadow:0 0 #0000; --tw-ring-shadow:0 0 #0000; --tw-shadow:0 0 #0000; --tw-shadow-colored:0 0 #0000; --tw-space-y-reverse:0; color: rgb(75, 85, 99); font-family: Poppins, sans-serif; font-size: 15px; overflow-wrap: break-word !important;\"><span style=\"font-family: Rubik; font-size: 14px;\">&nbsp; &nbsp; - Meningkatkan kesejahtraan masyarakat desa dengan meningkatkan sarana dan prasarana ekonomi warga.&nbsp;</span></p><p style=\"margin-top: calc(0.5rem * calc(1 - var(--tw-space-y-reverse))); margin-bottom: calc(0.5rem * var(--tw-space-y-reverse)); border-width: 0px; border-style: solid; border-color: rgb(229, 231, 235); --tw-translate-x:0; --tw-translate-y:0; --tw-rotate:0; --tw-skew-x:0; --tw-skew-y:0; --tw-scale-x:1; --tw-scale-y:1; --tw-scroll-snap-strictness:proximity; --tw-ring-offset-width:0px; --tw-ring-offset-color:#fff; --tw-ring-color:rgb(59 130 246 / 0.5); --tw-ring-offset-shadow:0 0 #0000; --tw-ring-shadow:0 0 #0000; --tw-shadow:0 0 #0000; --tw-shadow-colored:0 0 #0000; --tw-space-y-reverse:0; color: rgb(75, 85, 99); font-family: Poppins, sans-serif; font-size: 15px; overflow-wrap: break-word !important;\"><span style=\"font-family: Rubik; font-size: 14px;\">&nbsp;</span></p><p style=\"margin-top: calc(0.5rem * calc(1 - var(--tw-space-y-reverse))); margin-bottom: calc(0.5rem * var(--tw-space-y-reverse)); border-width: 0px; border-style: solid; border-color: rgb(229, 231, 235); --tw-translate-x:0; --tw-translate-y:0; --tw-rotate:0; --tw-skew-x:0; --tw-skew-y:0; --tw-scale-x:1; --tw-scale-y:1; --tw-scroll-snap-strictness:proximity; --tw-ring-offset-width:0px; --tw-ring-offset-color:#fff; --tw-ring-color:rgb(59 130 246 / 0.5); --tw-ring-offset-shadow:0 0 #0000; --tw-ring-shadow:0 0 #0000; --tw-shadow:0 0 #0000; --tw-shadow-colored:0 0 #0000; --tw-space-y-reverse:0; color: rgb(75, 85, 99); font-family: Poppins, sans-serif; font-size: 15px; overflow-wrap: break-word !important;\"><span style=\"font-family: Rubik; font-size: 14px;\">2. Pembangunan Jangka Pendek &nbsp;</span></p><p style=\"margin-top: calc(0.5rem * calc(1 - var(--tw-space-y-reverse))); margin-bottom: calc(0.5rem * var(--tw-space-y-reverse)); border-width: 0px; border-style: solid; border-color: rgb(229, 231, 235); --tw-translate-x:0; --tw-translate-y:0; --tw-rotate:0; --tw-skew-x:0; --tw-skew-y:0; --tw-scale-x:1; --tw-scale-y:1; --tw-scroll-snap-strictness:proximity; --tw-ring-offset-width:0px; --tw-ring-offset-color:#fff; --tw-ring-color:rgb(59 130 246 / 0.5); --tw-ring-offset-shadow:0 0 #0000; --tw-ring-shadow:0 0 #0000; --tw-shadow:0 0 #0000; --tw-shadow-colored:0 0 #0000; --tw-space-y-reverse:0; color: rgb(75, 85, 99); font-family: Poppins, sans-serif; font-size: 15px; overflow-wrap: break-word !important;\"><span style=\"font-family: Rubik; font-size: 14px;\">&nbsp; &nbsp; - Mengembangkan dan Menjaga serta melestarikan ada istiadat desa terutama yang telah mengakar di desa senggigi.&nbsp;</span></p><p style=\"margin-top: calc(0.5rem * calc(1 - var(--tw-space-y-reverse))); margin-bottom: calc(0.5rem * var(--tw-space-y-reverse)); border-width: 0px; border-style: solid; border-color: rgb(229, 231, 235); --tw-translate-x:0; --tw-translate-y:0; --tw-rotate:0; --tw-skew-x:0; --tw-skew-y:0; --tw-scale-x:1; --tw-scale-y:1; --tw-scroll-snap-strictness:proximity; --tw-ring-offset-width:0px; --tw-ring-offset-color:#fff; --tw-ring-color:rgb(59 130 246 / 0.5); --tw-ring-offset-shadow:0 0 #0000; --tw-ring-shadow:0 0 #0000; --tw-shadow:0 0 #0000; --tw-shadow-colored:0 0 #0000; --tw-space-y-reverse:0; color: rgb(75, 85, 99); font-family: Poppins, sans-serif; font-size: 15px; overflow-wrap: break-word !important;\"><span style=\"font-family: Rubik; font-size: 14px;\">&nbsp; &nbsp; - Meningkatkan pelayanan dalam bidang pemerintahan kepada warga masyarakat&nbsp;</span></p><p style=\"margin-top: calc(0.5rem * calc(1 - var(--tw-space-y-reverse))); margin-bottom: calc(0.5rem * var(--tw-space-y-reverse)); border-width: 0px; border-style: solid; border-color: rgb(229, 231, 235); --tw-translate-x:0; --tw-translate-y:0; --tw-rotate:0; --tw-skew-x:0; --tw-skew-y:0; --tw-scale-x:1; --tw-scale-y:1; --tw-scroll-snap-strictness:proximity; --tw-ring-offset-width:0px; --tw-ring-offset-color:#fff; --tw-ring-color:rgb(59 130 246 / 0.5); --tw-ring-offset-shadow:0 0 #0000; --tw-ring-shadow:0 0 #0000; --tw-shadow:0 0 #0000; --tw-shadow-colored:0 0 #0000; --tw-space-y-reverse:0; color: rgb(75, 85, 99); font-family: Poppins, sans-serif; font-size: 15px; overflow-wrap: break-word !important;\"><span style=\"font-family: Rubik; font-size: 14px;\">&nbsp; &nbsp; - Meningkatkan sarana dan prasarana ekonomi warga desa dengan perbaikan prasarana dan sarana ekonomi.</span></p><p style=\"margin-top: calc(0.5rem * calc(1 - var(--tw-space-y-reverse))); margin-bottom: calc(0.5rem * var(--tw-space-y-reverse)); border-width: 0px; border-style: solid; border-color: rgb(229, 231, 235); --tw-translate-x:0; --tw-translate-y:0; --tw-rotate:0; --tw-skew-x:0; --tw-skew-y:0; --tw-scale-x:1; --tw-scale-y:1; --tw-scroll-snap-strictness:proximity; --tw-ring-offset-width:0px; --tw-ring-offset-color:#fff; --tw-ring-color:rgb(59 130 246 / 0.5); --tw-ring-offset-shadow:0 0 #0000; --tw-ring-shadow:0 0 #0000; --tw-shadow:0 0 #0000; --tw-shadow-colored:0 0 #0000; --tw-space-y-reverse:0; color: rgb(75, 85, 99); font-family: Poppins, sans-serif; font-size: 15px; overflow-wrap: break-word !important;\"><span style=\"font-family: Rubik; font-size: 14px;\">&nbsp; &nbsp; - Meningkatkan sarana dan prasarana pendidikan guna peningkatan sumber daya manusia Desa Senggigi.&nbsp;</span></p>', 'Administrator', 1, '1742380513');
INSERT INTO `halaman_statis` (`id`, `judul`, `isi`, `user`, `status`, `tgl_posting`) VALUES (4, 'Sambutan Kepala Desa', '<span style=\"text-align: justify; font-size: 14px;\">Assalamu’alaikum warahmatullahi wabarakatuh,</span><br style=\"border-width: 0px; border-style: solid; border-color: rgb(229, 231, 235); --tw-border-spacing-x: 0; --tw-border-spacing-y: 0; --tw-translate-x: 0; --tw-translate-y: 0; --tw-rotate: 0; --tw-skew-x: 0; --tw-skew-y: 0; --tw-scale-x: 1; --tw-scale-y: 1; --tw-pan-x: ; --tw-pan-y: ; --tw-pinch-zoom: ; --tw-scroll-snap-strictness: proximity; --tw-ordinal: ; --tw-slashed-zero: ; --tw-numeric-figure: ; --tw-numeric-spacing: ; --tw-numeric-fraction: ; --tw-ring-inset: ; --tw-ring-offset-width: 0px; --tw-ring-offset-color: #fff; --tw-ring-color: rgb(59 130 246 / 0.5); --tw-ring-offset-shadow: 0 0 #0000; --tw-ring-shadow: 0 0 #0000; --tw-shadow: 0 0 #0000; --tw-shadow-colored: 0 0 #0000; --tw-blur: ; --tw-brightness: ; --tw-contrast: ; --tw-grayscale: ; --tw-hue-rotate: ; --tw-invert: ; --tw-saturate: ; --tw-sepia: ; --tw-drop-shadow: ; --tw-backdrop-blur: ; --tw-backdrop-brightness: ; --tw-backdrop-contrast: ; --tw-backdrop-grayscale: ; --tw-backdrop-hue-rotate: ; --tw-backdrop-invert: ; --tw-backdrop-opacity: ; --tw-backdrop-saturate: ; --tw-backdrop-sepia: ; text-align: justify;\"><span style=\"text-align: justify; font-size: 14px;\">Salam sejahtera bagi kita semua,</span><br style=\"border-width: 0px; border-style: solid; border-color: rgb(229, 231, 235); --tw-border-spacing-x: 0; --tw-border-spacing-y: 0; --tw-translate-x: 0; --tw-translate-y: 0; --tw-rotate: 0; --tw-skew-x: 0; --tw-skew-y: 0; --tw-scale-x: 1; --tw-scale-y: 1; --tw-pan-x: ; --tw-pan-y: ; --tw-pinch-zoom: ; --tw-scroll-snap-strictness: proximity; --tw-ordinal: ; --tw-slashed-zero: ; --tw-numeric-figure: ; --tw-numeric-spacing: ; --tw-numeric-fraction: ; --tw-ring-inset: ; --tw-ring-offset-width: 0px; --tw-ring-offset-color: #fff; --tw-ring-color: rgb(59 130 246 / 0.5); --tw-ring-offset-shadow: 0 0 #0000; --tw-ring-shadow: 0 0 #0000; --tw-shadow: 0 0 #0000; --tw-shadow-colored: 0 0 #0000; --tw-blur: ; --tw-brightness: ; --tw-contrast: ; --tw-grayscale: ; --tw-hue-rotate: ; --tw-invert: ; --tw-saturate: ; --tw-sepia: ; --tw-drop-shadow: ; --tw-backdrop-blur: ; --tw-backdrop-brightness: ; --tw-backdrop-contrast: ; --tw-backdrop-grayscale: ; --tw-backdrop-hue-rotate: ; --tw-backdrop-invert: ; --tw-backdrop-opacity: ; --tw-backdrop-saturate: ; --tw-backdrop-sepia: ; text-align: justify;\"><span style=\"text-align: justify; font-size: 14px;\">Dengan penuh rasa syukur, saya menyambut seluruh warga dan pengunjung di website resmi Desa Digital. Website ini kami hadirkan sebagai wujud keterbukaan informasi dan upaya dalam memajukan desa menuju kemandirian berbasis teknologi.</span><br style=\"border-width: 0px; border-style: solid; border-color: rgb(229, 231, 235); --tw-border-spacing-x: 0; --tw-border-spacing-y: 0; --tw-translate-x: 0; --tw-translate-y: 0; --tw-rotate: 0; --tw-skew-x: 0; --tw-skew-y: 0; --tw-scale-x: 1; --tw-scale-y: 1; --tw-pan-x: ; --tw-pan-y: ; --tw-pinch-zoom: ; --tw-scroll-snap-strictness: proximity; --tw-ordinal: ; --tw-slashed-zero: ; --tw-numeric-figure: ; --tw-numeric-spacing: ; --tw-numeric-fraction: ; --tw-ring-inset: ; --tw-ring-offset-width: 0px; --tw-ring-offset-color: #fff; --tw-ring-color: rgb(59 130 246 / 0.5); --tw-ring-offset-shadow: 0 0 #0000; --tw-ring-shadow: 0 0 #0000; --tw-shadow: 0 0 #0000; --tw-shadow-colored: 0 0 #0000; --tw-blur: ; --tw-brightness: ; --tw-contrast: ; --tw-grayscale: ; --tw-hue-rotate: ; --tw-invert: ; --tw-saturate: ; --tw-sepia: ; --tw-drop-shadow: ; --tw-backdrop-blur: ; --tw-backdrop-brightness: ; --tw-backdrop-contrast: ; --tw-backdrop-grayscale: ; --tw-backdrop-hue-rotate: ; --tw-backdrop-invert: ; --tw-backdrop-opacity: ; --tw-backdrop-saturate: ; --tw-backdrop-sepia: ; text-align: justify;\"><span style=\"text-align: justify; font-size: 14px;\">Sebagai Kepala Desa, saya bersama seluruh perangkat desa berkomitmen untuk membangun Desa Digital yang mandiri, maju, dan berdaya saing dengan memanfaatkan teknologi sebagai pilar utama pembangunan.</span><br style=\"border-width: 0px; border-style: solid; border-color: rgb(229, 231, 235); --tw-border-spacing-x: 0; --tw-border-spacing-y: 0; --tw-translate-x: 0; --tw-translate-y: 0; --tw-rotate: 0; --tw-skew-x: 0; --tw-skew-y: 0; --tw-scale-x: 1; --tw-scale-y: 1; --tw-pan-x: ; --tw-pan-y: ; --tw-pinch-zoom: ; --tw-scroll-snap-strictness: proximity; --tw-ordinal: ; --tw-slashed-zero: ; --tw-numeric-figure: ; --tw-numeric-spacing: ; --tw-numeric-fraction: ; --tw-ring-inset: ; --tw-ring-offset-width: 0px; --tw-ring-offset-color: #fff; --tw-ring-color: rgb(59 130 246 / 0.5); --tw-ring-offset-shadow: 0 0 #0000; --tw-ring-shadow: 0 0 #0000; --tw-shadow: 0 0 #0000; --tw-shadow-colored: 0 0 #0000; --tw-blur: ; --tw-brightness: ; --tw-contrast: ; --tw-grayscale: ; --tw-hue-rotate: ; --tw-invert: ; --tw-saturate: ; --tw-sepia: ; --tw-drop-shadow: ; --tw-backdrop-blur: ; --tw-backdrop-brightness: ; --tw-backdrop-contrast: ; --tw-backdrop-grayscale: ; --tw-backdrop-hue-rotate: ; --tw-backdrop-invert: ; --tw-backdrop-opacity: ; --tw-backdrop-saturate: ; --tw-backdrop-sepia: ; text-align: justify;\"><span style=\"text-align: justify; font-size: 14px;\">Melalui platform ini, kami berharap dapat memberikan kemudahan akses informasi, pelayanan yang lebih baik, serta menjadi jembatan komunikasi antara pemerintah desa dan masyarakat. Mari bersama-sama membangun desa yang lebih maju, sejahtera, dan berdaya saing di era digital ini.</span><br style=\"border-width: 0px; border-style: solid; border-color: rgb(229, 231, 235); --tw-border-spacing-x: 0; --tw-border-spacing-y: 0; --tw-translate-x: 0; --tw-translate-y: 0; --tw-rotate: 0; --tw-skew-x: 0; --tw-skew-y: 0; --tw-scale-x: 1; --tw-scale-y: 1; --tw-pan-x: ; --tw-pan-y: ; --tw-pinch-zoom: ; --tw-scroll-snap-strictness: proximity; --tw-ordinal: ; --tw-slashed-zero: ; --tw-numeric-figure: ; --tw-numeric-spacing: ; --tw-numeric-fraction: ; --tw-ring-inset: ; --tw-ring-offset-width: 0px; --tw-ring-offset-color: #fff; --tw-ring-color: rgb(59 130 246 / 0.5); --tw-ring-offset-shadow: 0 0 #0000; --tw-ring-shadow: 0 0 #0000; --tw-shadow: 0 0 #0000; --tw-shadow-colored: 0 0 #0000; --tw-blur: ; --tw-brightness: ; --tw-contrast: ; --tw-grayscale: ; --tw-hue-rotate: ; --tw-invert: ; --tw-saturate: ; --tw-sepia: ; --tw-drop-shadow: ; --tw-backdrop-blur: ; --tw-backdrop-brightness: ; --tw-backdrop-contrast: ; --tw-backdrop-grayscale: ; --tw-backdrop-hue-rotate: ; --tw-backdrop-invert: ; --tw-backdrop-opacity: ; --tw-backdrop-saturate: ; --tw-backdrop-sepia: ; text-align: justify;\"><span style=\"text-align: justify; font-size: 14px;\">Wassalamu’alaikum warahmatullahi wabarakatuh.</span><br><p></p><p style=\"text-align: center;\"></p>', 'Administrator', 1, '1742379586');


#
# TABLE STRUCTURE FOR: header_surat
#

CREATE TABLE `header_surat` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `header` text NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=2 DEFAULT CHARSET=utf8;

INSERT INTO `header_surat` (`id`, `header`) VALUES (1, '<table style=\"border-collapse: collapse; width: 100%;\">\r\n<tbody>\r\n<tr>\r\n<td style=\"width: 10%;\"><img style=\"width: 55px;\" src=\"[logo_surat]\"></td>\r\n<td style=\"text-align: center; width: 90%;\">\r\n<p style=\"margin: 0; text-align: center;\"><span style=\"font-size: 14pt; font-family: arial, helvetica, sans-serif;\">PEMERINTAH [Sebutan_Kabupaten] [Nama_Kabupaten]&nbsp;<br>KECAMATAN [Nama_Kecamatan]<strong><br><span style=\"font-size: 14pt;\">[Sebutan_Desa] [Nama_Desa] </span></strong></span></p>\r\n<p style=\"margin: 0; text-align: center;\"><span style=\"font-family: arial, helvetica, sans-serif; font-size: 8pt;\">[Alamat_Kantor], Kode Pos : [Kode_Pos], Telepon : [No_HP]</span></p>\r\n</td>\r\n</tr>\r\n</tbody>\r\n</table>\r\n<hr style=\"border: 1px solid;\">');


#
# TABLE STRUCTURE FOR: identitas_desa
#

CREATE TABLE `identitas_desa` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `nama_desa` varchar(200) NOT NULL,
  `kode_pos` int(100) NOT NULL,
  `nama_kepdes` varchar(200) NOT NULL,
  `nip_kepdes` varchar(100) NOT NULL,
  `alamat_kantor` varchar(200) NOT NULL,
  `email_desa` varchar(100) NOT NULL,
  `no_hp` varchar(100) NOT NULL,
  `website_desa` varchar(200) NOT NULL,
  `nama_kecamatan` varchar(200) NOT NULL,
  `nama_camat` varchar(200) NOT NULL,
  `nip_camat` int(100) NOT NULL,
  `nama_kabupaten` varchar(200) NOT NULL,
  `nama_provinsi` varchar(200) NOT NULL,
  `kode_wilayah` varchar(128) NOT NULL,
  `logo_desa` varchar(500) NOT NULL,
  `gambar_desa` varchar(500) NOT NULL,
  `latitude` varchar(200) NOT NULL,
  `longitude` varchar(200) NOT NULL,
  `wilayah_desa` text NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=2 DEFAULT CHARSET=utf8;

INSERT INTO `identitas_desa` (`id`, `nama_desa`, `kode_pos`, `nama_kepdes`, `nip_kepdes`, `alamat_kantor`, `email_desa`, `no_hp`, `website_desa`, `nama_kecamatan`, `nama_camat`, `nip_camat`, `nama_kabupaten`, `nama_provinsi`, `kode_wilayah`, `logo_desa`, `gambar_desa`, `latitude`, `longitude`, `wilayah_desa`) VALUES (1, 'Tounsaru', 95618, 'GLENDY RONGKO', '18208040', 'Jl. Unima-Paleloan No. 1 Lingkungan II', 'glenalvaro@gmail.com', '085785846777', 'www.desadigital.com', 'Tondano Selatan', 'Mike,. S.Pd', 12345678, 'Minahasa', 'Sulawesi Utara', '1002', 'd2c4b25298.png', '8d80606f02.jpeg', '0.8572449317827578', '124.69388008117677', '[{\"lat\":0.8621018655499143,\"lng\":124.68503952026369},{\"lat\":0.8545496124820441,\"lng\":124.67628479003908},{\"lat\":0.8478555575726495,\"lng\":124.67122077941896},{\"lat\":0.840389098061956,\"lng\":124.68220710754396},{\"lat\":0.837471167470884,\"lng\":124.68898773193361},{\"lat\":0.8415905982604279,\"lng\":124.6996307373047},{\"lat\":0.8434786692529247,\"lng\":124.69808578491212},{\"lat\":0.8452809179821866,\"lng\":124.69911575317384},{\"lat\":0.8471689871823899,\"lng\":124.70160484313966},{\"lat\":0.8475980936905702,\"lng\":124.70538139343263},{\"lat\":0.846997344565818,\"lng\":124.70778465270998},{\"lat\":0.8491428767261469,\"lng\":124.70855712890626},{\"lat\":0.8552361815582894,\"lng\":124.70572471618654},{\"lat\":0.8573817091295741,\"lng\":124.70014572143556},{\"lat\":0.8601279826659589,\"lng\":124.69001770019533}]');


#
# TABLE STRUCTURE FOR: informasi_publik
#

CREATE TABLE `informasi_publik` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `judul_dokumen` varchar(200) NOT NULL,
  `kategori` varchar(128) NOT NULL,
  `tahun` varchar(128) NOT NULL,
  `aktif` int(11) NOT NULL,
  `tgl_muat` varchar(128) NOT NULL,
  `dokumen` varchar(400) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

#
# TABLE STRUCTURE FOR: inventaris
#

CREATE TABLE `inventaris` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `jenis_barang` varchar(200) NOT NULL,
  `kode_barang` varchar(200) NOT NULL,
  `identitas_barang` varchar(200) NOT NULL,
  `apb_desa` varchar(200) NOT NULL,
  `perolehan_lain` varchar(200) NOT NULL,
  `kekayaan_desa` varchar(200) NOT NULL,
  `tgl_perolehan` varchar(128) NOT NULL,
  `keterangan` text NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=8 DEFAULT CHARSET=utf8;

INSERT INTO `inventaris` (`id`, `jenis_barang`, `kode_barang`, `identitas_barang`, `apb_desa`, `perolehan_lain`, `kekayaan_desa`, `tgl_perolehan`, `keterangan`) VALUES (2, ' Laptop Acer', '3.07.01.02.00001', 'Laptop Merek ASUS 455LF core i3 warna hitam', '6.900.000 ', '-', '-', '2025-03-19', 'Baik');
INSERT INTO `inventaris` (`id`, `jenis_barang`, `kode_barang`, `identitas_barang`, `apb_desa`, `perolehan_lain`, `kekayaan_desa`, `tgl_perolehan`, `keterangan`) VALUES (3, 'Sepeda Motor', '02.03.01.05.00001', 'Honda Vario', 'Honda Vario', '-', '-', '2025-03-26', 'Baik');
INSERT INTO `inventaris` (`id`, `jenis_barang`, `kode_barang`, `identitas_barang`, `apb_desa`, `perolehan_lain`, `kekayaan_desa`, `tgl_perolehan`, `keterangan`) VALUES (4, 'Printer', '3.07.02.03.00001 - 3.07.02.03.00002', 'Printer Epson L120 warna hitam ', '4.700.000', '-', '-', '2025-03-27', 'Baik');
INSERT INTO `inventaris` (`id`, `jenis_barang`, `kode_barang`, `identitas_barang`, `apb_desa`, `perolehan_lain`, `kekayaan_desa`, `tgl_perolehan`, `keterangan`) VALUES (5, 'Proyektor', '3.03.03.03.00001 ', 'Proyektor Merek BENQ SVGA + WALL / TRIPOD SCREEN 70\" ', '6.500.000', '-', '-', '2025-03-28', 'Baik');
INSERT INTO `inventaris` (`id`, `jenis_barang`, `kode_barang`, `identitas_barang`, `apb_desa`, `perolehan_lain`, `kekayaan_desa`, `tgl_perolehan`, `keterangan`) VALUES (6, 'AC', '3.05.02.04.00001', '1 AC merek LG 2 PK warna Putih', '8.500.000', '-', '-', '2025-03-29', 'Baik');
INSERT INTO `inventaris` (`id`, `jenis_barang`, `kode_barang`, `identitas_barang`, `apb_desa`, `perolehan_lain`, `kekayaan_desa`, `tgl_perolehan`, `keterangan`) VALUES (7, 'Komputer', '3.07.01.02.00002', 'Komputer PC Lenovo AIO', '12.100.000', '-', '-', '2025-03-30', 'Baik');


#
# TABLE STRUCTURE FOR: jabatan
#

CREATE TABLE `jabatan` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `nama` varchar(128) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=6 DEFAULT CHARSET=utf8;

INSERT INTO `jabatan` (`id`, `nama`) VALUES (1, 'KETUA');
INSERT INTO `jabatan` (`id`, `nama`) VALUES (2, 'WAKIL KETUA');
INSERT INTO `jabatan` (`id`, `nama`) VALUES (3, 'SEKRETARIS');
INSERT INTO `jabatan` (`id`, `nama`) VALUES (4, 'BENDAHARA');
INSERT INTO `jabatan` (`id`, `nama`) VALUES (5, 'ANGGOTA');


#
# TABLE STRUCTURE FOR: jabatan_perangkat
#

CREATE TABLE `jabatan_perangkat` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `nama` varchar(200) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=13 DEFAULT CHARSET=utf8mb4;

INSERT INTO `jabatan_perangkat` (`id`, `nama`) VALUES (1, 'Kepala Kelurahan');
INSERT INTO `jabatan_perangkat` (`id`, `nama`) VALUES (5, 'Sekretaris Desa');
INSERT INTO `jabatan_perangkat` (`id`, `nama`) VALUES (6, 'Kepala Urusan Tata Usaha dan Hukum');
INSERT INTO `jabatan_perangkat` (`id`, `nama`) VALUES (7, 'Kepala Bidang Keuangan');
INSERT INTO `jabatan_perangkat` (`id`, `nama`) VALUES (8, 'Kepala Bidang Perencanaan');
INSERT INTO `jabatan_perangkat` (`id`, `nama`) VALUES (9, 'Kepala Seksi Pemerintahan');
INSERT INTO `jabatan_perangkat` (`id`, `nama`) VALUES (10, 'Kepala Seksi Kesejahteraan');
INSERT INTO `jabatan_perangkat` (`id`, `nama`) VALUES (12, 'Kepala Pemberdayaan Masyarakat');


#
# TABLE STRUCTURE FOR: kategori_kelompok
#

CREATE TABLE `kategori_kelompok` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `kategori_kelompok` varchar(200) NOT NULL,
  `deskripsi_kategori` text,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=7 DEFAULT CHARSET=utf8;

INSERT INTO `kategori_kelompok` (`id`, `kategori_kelompok`, `deskripsi_kategori`) VALUES (2, 'Pertanian', 'Bidang Pertanian Desa');
INSERT INTO `kategori_kelompok` (`id`, `kategori_kelompok`, `deskripsi_kategori`) VALUES (3, 'Ternak', 'Bidang Peternakan Desa\r\n');
INSERT INTO `kategori_kelompok` (`id`, `kategori_kelompok`, `deskripsi_kategori`) VALUES (4, 'Perikanan', 'Bidang Peternakan Desa Buyat');
INSERT INTO `kategori_kelompok` (`id`, `kategori_kelompok`, `deskripsi_kategori`) VALUES (6, 'Kesenian', 'Bidang Seni');


#
# TABLE STRUCTURE FOR: kategori_umkm
#

CREATE TABLE `kategori_umkm` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `nama` varchar(128) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=8 DEFAULT CHARSET=utf8;

INSERT INTO `kategori_umkm` (`id`, `nama`) VALUES (1, 'Jasa');
INSERT INTO `kategori_umkm` (`id`, `nama`) VALUES (2, 'Teknologi');
INSERT INTO `kategori_umkm` (`id`, `nama`) VALUES (4, 'Makanan');
INSERT INTO `kategori_umkm` (`id`, `nama`) VALUES (5, 'Bisnis');
INSERT INTO `kategori_umkm` (`id`, `nama`) VALUES (6, 'Freelencer');
INSERT INTO `kategori_umkm` (`id`, `nama`) VALUES (7, 'Pembatik');


#
# TABLE STRUCTURE FOR: layanan_penduduk
#

CREATE TABLE `layanan_penduduk` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `nik_pend` varchar(128) NOT NULL,
  `pin` varchar(100) NOT NULL,
  `no_telepon` varchar(128) DEFAULT NULL,
  `tgl_buat` varchar(128) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=3 DEFAULT CHARSET=utf8;

INSERT INTO `layanan_penduduk` (`id`, `nik_pend`, `pin`, `no_telepon`, `tgl_buat`) VALUES (1, '7110020402010002', '$2y$10$LoWdPLc1/.PwjoCkpyhjN.98EYnevByX7ywwgrCMpu3.4mIVuQMT6', NULL, '1728122473');
INSERT INTO `layanan_penduduk` (`id`, `nik_pend`, `pin`, `no_telepon`, `tgl_buat`) VALUES (2, '7101102209000001', '$2y$10$9/1YigbSbK15gfCiv/vzbeFpm1wKYbT1k12cCwT44Kh4RGVryIv8K', NULL, '1740907897');


#
# TABLE STRUCTURE FOR: lembaga_masyarakat
#

CREATE TABLE `lembaga_masyarakat` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `nama` varchar(200) NOT NULL,
  `isi` text NOT NULL,
  `user` varchar(200) NOT NULL,
  `tgl_buat` varchar(128) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=3 DEFAULT CHARSET=utf8;

INSERT INTO `lembaga_masyarakat` (`id`, `nama`, `isi`, `user`, `tgl_buat`) VALUES (1, 'Badan Pemusyaratan Desa', '<p><span style=\"font-family: Rubik; font-size: 14px;\">﻿</span><span style=\"font-size: 12px;\">﻿</span><span data-huuid=\"14961117312965216294\" style=\"text-align: justify; border-width: 0px; border-style: solid; border-color: rgb(229, 231, 235); --tw-border-spacing-x: 0; --tw-border-spacing-y: 0; --tw-translate-x: 0; --tw-translate-y: 0; --tw-rotate: 0; --tw-skew-x: 0; --tw-skew-y: 0; --tw-scale-x: 1; --tw-scale-y: 1; --tw-pan-x: ; --tw-pan-y: ; --tw-pinch-zoom: ; --tw-scroll-snap-strictness: proximity; --tw-ordinal: ; --tw-slashed-zero: ; --tw-numeric-figure: ; --tw-numeric-spacing: ; --tw-numeric-fraction: ; --tw-ring-inset: ; --tw-ring-offset-width: 0px; --tw-ring-offset-color: #fff; --tw-ring-color: rgb(59 130 246 / 0.5); --tw-ring-offset-shadow: 0 0 #0000; --tw-ring-shadow: 0 0 #0000; --tw-shadow: 0 0 #0000; --tw-shadow-colored: 0 0 #0000; --tw-blur: ; --tw-brightness: ; --tw-contrast: ; --tw-grayscale: ; --tw-hue-rotate: ; --tw-invert: ; --tw-saturate: ; --tw-sepia: ; --tw-drop-shadow: ; --tw-backdrop-blur: ; --tw-backdrop-brightness: ; --tw-backdrop-contrast: ; --tw-backdrop-grayscale: ; --tw-backdrop-hue-rotate: ; --tw-backdrop-invert: ; --tw-backdrop-opacity: ; --tw-backdrop-saturate: ; --tw-backdrop-sepia: ;\"><span style=\"border-width: 0px; border-style: solid; border-color: rgb(229, 231, 235); --tw-border-spacing-x: 0; --tw-border-spacing-y: 0; --tw-translate-x: 0; --tw-translate-y: 0; --tw-rotate: 0; --tw-skew-x: 0; --tw-skew-y: 0; --tw-scale-x: 1; --tw-scale-y: 1; --tw-pan-x: ; --tw-pan-y: ; --tw-pinch-zoom: ; --tw-scroll-snap-strictness: proximity; --tw-ordinal: ; --tw-slashed-zero: ; --tw-numeric-figure: ; --tw-numeric-spacing: ; --tw-numeric-fraction: ; --tw-ring-inset: ; --tw-ring-offset-width: 0px; --tw-ring-offset-color: #fff; --tw-ring-color: rgb(59 130 246 / 0.5); --tw-ring-offset-shadow: 0 0 #0000; --tw-ring-shadow: 0 0 #0000; --tw-shadow: 0 0 #0000; --tw-shadow-colored: 0 0 #0000; --tw-blur: ; --tw-brightness: ; --tw-contrast: ; --tw-grayscale: ; --tw-hue-rotate: ; --tw-invert: ; --tw-saturate: ; --tw-sepia: ; --tw-drop-shadow: ; --tw-backdrop-blur: ; --tw-backdrop-brightness: ; --tw-backdrop-contrast: ; --tw-backdrop-grayscale: ; --tw-backdrop-hue-rotate: ; --tw-backdrop-invert: ; --tw-backdrop-opacity: ; --tw-backdrop-saturate: ; --tw-backdrop-sepia: ;\"><span style=\"font-size: 12px;\">Badan Permusyawaratan Desa (BPD) adalah lembaga yang menjalankan tugas pemerintahan desa.</span></span><span style=\"border-width: 0px; border-style: solid; border-color: rgb(229, 231, 235); --tw-border-spacing-x: 0; --tw-border-spacing-y: 0; --tw-translate-x: 0; --tw-translate-y: 0; --tw-rotate: 0; --tw-skew-x: 0; --tw-skew-y: 0; --tw-scale-x: 1; --tw-scale-y: 1; --tw-pan-x: ; --tw-pan-y: ; --tw-pinch-zoom: ; --tw-scroll-snap-strictness: proximity; --tw-ordinal: ; --tw-slashed-zero: ; --tw-numeric-figure: ; --tw-numeric-spacing: ; --tw-numeric-fraction: ; --tw-ring-inset: ; --tw-ring-offset-width: 0px; --tw-ring-offset-color: #fff; --tw-ring-color: rgb(59 130 246 / 0.5); --tw-ring-offset-shadow: 0 0 #0000; --tw-ring-shadow: 0 0 #0000; --tw-shadow: 0 0 #0000; --tw-shadow-colored: 0 0 #0000; --tw-blur: ; --tw-brightness: ; --tw-contrast: ; --tw-grayscale: ; --tw-hue-rotate: ; --tw-invert: ; --tw-saturate: ; --tw-sepia: ; --tw-drop-shadow: ; --tw-backdrop-blur: ; --tw-backdrop-brightness: ; --tw-backdrop-contrast: ; --tw-backdrop-grayscale: ; --tw-backdrop-hue-rotate: ; --tw-backdrop-invert: ; --tw-backdrop-opacity: ; --tw-backdrop-saturate: ; --tw-backdrop-sepia: ; font-size: 12px;\">&nbsp;</span></span><span data-huuid=\"14961117312965215013\" style=\"text-align: justify; border-width: 0px; border-style: solid; border-color: rgb(229, 231, 235); --tw-border-spacing-x: 0; --tw-border-spacing-y: 0; --tw-translate-x: 0; --tw-translate-y: 0; --tw-rotate: 0; --tw-skew-x: 0; --tw-skew-y: 0; --tw-scale-x: 1; --tw-scale-y: 1; --tw-pan-x: ; --tw-pan-y: ; --tw-pinch-zoom: ; --tw-scroll-snap-strictness: proximity; --tw-ordinal: ; --tw-slashed-zero: ; --tw-numeric-figure: ; --tw-numeric-spacing: ; --tw-numeric-fraction: ; --tw-ring-inset: ; --tw-ring-offset-width: 0px; --tw-ring-offset-color: #fff; --tw-ring-color: rgb(59 130 246 / 0.5); --tw-ring-offset-shadow: 0 0 #0000; --tw-ring-shadow: 0 0 #0000; --tw-shadow: 0 0 #0000; --tw-shadow-colored: 0 0 #0000; --tw-blur: ; --tw-brightness: ; --tw-contrast: ; --tw-grayscale: ; --tw-hue-rotate: ; --tw-invert: ; --tw-saturate: ; --tw-sepia: ; --tw-drop-shadow: ; --tw-backdrop-blur: ; --tw-backdrop-brightness: ; --tw-backdrop-contrast: ; --tw-backdrop-grayscale: ; --tw-backdrop-hue-rotate: ; --tw-backdrop-invert: ; --tw-backdrop-opacity: ; --tw-backdrop-saturate: ; --tw-backdrop-sepia: ;\"><span style=\"border-width: 0px; border-style: solid; border-color: rgb(229, 231, 235); --tw-border-spacing-x: 0; --tw-border-spacing-y: 0; --tw-translate-x: 0; --tw-translate-y: 0; --tw-rotate: 0; --tw-skew-x: 0; --tw-skew-y: 0; --tw-scale-x: 1; --tw-scale-y: 1; --tw-pan-x: ; --tw-pan-y: ; --tw-pinch-zoom: ; --tw-scroll-snap-strictness: proximity; --tw-ordinal: ; --tw-slashed-zero: ; --tw-numeric-figure: ; --tw-numeric-spacing: ; --tw-numeric-fraction: ; --tw-ring-inset: ; --tw-ring-offset-width: 0px; --tw-ring-offset-color: #fff; --tw-ring-color: rgb(59 130 246 / 0.5); --tw-ring-offset-shadow: 0 0 #0000; --tw-ring-shadow: 0 0 #0000; --tw-shadow: 0 0 #0000; --tw-shadow-colored: 0 0 #0000; --tw-blur: ; --tw-brightness: ; --tw-contrast: ; --tw-grayscale: ; --tw-hue-rotate: ; --tw-invert: ; --tw-saturate: ; --tw-sepia: ; --tw-drop-shadow: ; --tw-backdrop-blur: ; --tw-backdrop-brightness: ; --tw-backdrop-contrast: ; --tw-backdrop-grayscale: ; --tw-backdrop-hue-rotate: ; --tw-backdrop-invert: ; --tw-backdrop-opacity: ; --tw-backdrop-saturate: ; --tw-backdrop-sepia: ; font-size: 12px;\">BPD merupakan wakil dari penduduk desa yang dipilih secara demokratis.</span><span style=\"border-width: 0px; border-style: solid; border-color: rgb(229, 231, 235); --tw-border-spacing-x: 0; --tw-border-spacing-y: 0; --tw-translate-x: 0; --tw-translate-y: 0; --tw-rotate: 0; --tw-skew-x: 0; --tw-skew-y: 0; --tw-scale-x: 1; --tw-scale-y: 1; --tw-pan-x: ; --tw-pan-y: ; --tw-pinch-zoom: ; --tw-scroll-snap-strictness: proximity; --tw-ordinal: ; --tw-slashed-zero: ; --tw-numeric-figure: ; --tw-numeric-spacing: ; --tw-numeric-fraction: ; --tw-ring-inset: ; --tw-ring-offset-width: 0px; --tw-ring-offset-color: #fff; --tw-ring-color: rgb(59 130 246 / 0.5); --tw-ring-offset-shadow: 0 0 #0000; --tw-ring-shadow: 0 0 #0000; --tw-shadow: 0 0 #0000; --tw-shadow-colored: 0 0 #0000; --tw-blur: ; --tw-brightness: ; --tw-contrast: ; --tw-grayscale: ; --tw-hue-rotate: ; --tw-invert: ; --tw-saturate: ; --tw-sepia: ; --tw-drop-shadow: ; --tw-backdrop-blur: ; --tw-backdrop-brightness: ; --tw-backdrop-contrast: ; --tw-backdrop-grayscale: ; --tw-backdrop-hue-rotate: ; --tw-backdrop-invert: ; --tw-backdrop-opacity: ; --tw-backdrop-saturate: ; --tw-backdrop-sepia: ; font-size: 12px;\">&nbsp;</span></span><span data-huuid=\"14961117312965217828\" style=\"text-align: justify; border-width: 0px; border-style: solid; border-color: rgb(229, 231, 235); --tw-border-spacing-x: 0; --tw-border-spacing-y: 0; --tw-translate-x: 0; --tw-translate-y: 0; --tw-rotate: 0; --tw-skew-x: 0; --tw-skew-y: 0; --tw-scale-x: 1; --tw-scale-y: 1; --tw-pan-x: ; --tw-pan-y: ; --tw-pinch-zoom: ; --tw-scroll-snap-strictness: proximity; --tw-ordinal: ; --tw-slashed-zero: ; --tw-numeric-figure: ; --tw-numeric-spacing: ; --tw-numeric-fraction: ; --tw-ring-inset: ; --tw-ring-offset-width: 0px; --tw-ring-offset-color: #fff; --tw-ring-color: rgb(59 130 246 / 0.5); --tw-ring-offset-shadow: 0 0 #0000; --tw-ring-shadow: 0 0 #0000; --tw-shadow: 0 0 #0000; --tw-shadow-colored: 0 0 #0000; --tw-blur: ; --tw-brightness: ; --tw-contrast: ; --tw-grayscale: ; --tw-hue-rotate: ; --tw-invert: ; --tw-saturate: ; --tw-sepia: ; --tw-drop-shadow: ; --tw-backdrop-blur: ; --tw-backdrop-brightness: ; --tw-backdrop-contrast: ; --tw-backdrop-grayscale: ; --tw-backdrop-hue-rotate: ; --tw-backdrop-invert: ; --tw-backdrop-opacity: ; --tw-backdrop-saturate: ; --tw-backdrop-sepia: ; font-size: 12px;\">BPD juga disebut sebagai parlemen desa.</span><br></p><p style=\"border-width: 0px; border-style: solid; border-color: rgb(229, 231, 235); --tw-border-spacing-x: 0; --tw-border-spacing-y: 0; --tw-translate-x: 0; --tw-translate-y: 0; --tw-rotate: 0; --tw-skew-x: 0; --tw-skew-y: 0; --tw-scale-x: 1; --tw-scale-y: 1; --tw-pan-x: ; --tw-pan-y: ; --tw-pinch-zoom: ; --tw-scroll-snap-strictness: proximity; --tw-ordinal: ; --tw-slashed-zero: ; --tw-numeric-figure: ; --tw-numeric-spacing: ; --tw-numeric-fraction: ; --tw-ring-inset: ; --tw-ring-offset-width: 0px; --tw-ring-offset-color: #fff; --tw-ring-color: rgb(59 130 246 / 0.5); --tw-ring-offset-shadow: 0 0 #0000; --tw-ring-shadow: 0 0 #0000; --tw-shadow: 0 0 #0000; --tw-shadow-colored: 0 0 #0000; --tw-blur: ; --tw-brightness: ; --tw-contrast: ; --tw-grayscale: ; --tw-hue-rotate: ; --tw-invert: ; --tw-saturate: ; --tw-sepia: ; --tw-drop-shadow: ; --tw-backdrop-blur: ; --tw-backdrop-brightness: ; --tw-backdrop-contrast: ; --tw-backdrop-grayscale: ; --tw-backdrop-hue-rotate: ; --tw-backdrop-invert: ; --tw-backdrop-opacity: ; --tw-backdrop-saturate: ; --tw-backdrop-sepia: ; margin-bottom: 0px;\"><span data-huuid=\"14961117312965215266\" style=\"border-width: 0px; border-style: solid; border-color: rgb(229, 231, 235); --tw-border-spacing-x: 0; --tw-border-spacing-y: 0; --tw-translate-x: 0; --tw-translate-y: 0; --tw-rotate: 0; --tw-skew-x: 0; --tw-skew-y: 0; --tw-scale-x: 1; --tw-scale-y: 1; --tw-pan-x: ; --tw-pan-y: ; --tw-pinch-zoom: ; --tw-scroll-snap-strictness: proximity; --tw-ordinal: ; --tw-slashed-zero: ; --tw-numeric-figure: ; --tw-numeric-spacing: ; --tw-numeric-fraction: ; --tw-ring-inset: ; --tw-ring-offset-width: 0px; --tw-ring-offset-color: #fff; --tw-ring-color: rgb(59 130 246 / 0.5); --tw-ring-offset-shadow: 0 0 #0000; --tw-ring-shadow: 0 0 #0000; --tw-shadow: 0 0 #0000; --tw-shadow-colored: 0 0 #0000; --tw-blur: ; --tw-brightness: ; --tw-contrast: ; --tw-grayscale: ; --tw-hue-rotate: ; --tw-invert: ; --tw-saturate: ; --tw-sepia: ; --tw-drop-shadow: ; --tw-backdrop-blur: ; --tw-backdrop-brightness: ; --tw-backdrop-contrast: ; --tw-backdrop-grayscale: ; --tw-backdrop-hue-rotate: ; --tw-backdrop-invert: ; --tw-backdrop-opacity: ; --tw-backdrop-saturate: ; --tw-backdrop-sepia: ;\"><span aria-level=\"2\" role=\"heading\" style=\"border-width: 0px; border-style: solid; border-color: rgb(229, 231, 235); --tw-border-spacing-x: 0; --tw-border-spacing-y: 0; --tw-translate-x: 0; --tw-translate-y: 0; --tw-rotate: 0; --tw-skew-x: 0; --tw-skew-y: 0; --tw-scale-x: 1; --tw-scale-y: 1; --tw-pan-x: ; --tw-pan-y: ; --tw-pinch-zoom: ; --tw-scroll-snap-strictness: proximity; --tw-ordinal: ; --tw-slashed-zero: ; --tw-numeric-figure: ; --tw-numeric-spacing: ; --tw-numeric-fraction: ; --tw-ring-inset: ; --tw-ring-offset-width: 0px; --tw-ring-offset-color: #fff; --tw-ring-color: rgb(59 130 246 / 0.5); --tw-ring-offset-shadow: 0 0 #0000; --tw-ring-shadow: 0 0 #0000; --tw-shadow: 0 0 #0000; --tw-shadow-colored: 0 0 #0000; --tw-blur: ; --tw-brightness: ; --tw-contrast: ; --tw-grayscale: ; --tw-hue-rotate: ; --tw-invert: ; --tw-saturate: ; --tw-sepia: ; --tw-drop-shadow: ; --tw-backdrop-blur: ; --tw-backdrop-brightness: ; --tw-backdrop-contrast: ; --tw-backdrop-grayscale: ; --tw-backdrop-hue-rotate: ; --tw-backdrop-invert: ; --tw-backdrop-opacity: ; --tw-backdrop-saturate: ; --tw-backdrop-sepia: ; font-size: 12px;\">Tugas BPD</span><span class=\"pjBG2e\" data-cid=\"7f7cc02e-1052-48ee-81b9-c55cef5d1bd0\" style=\"border-width: 0px; border-style: solid; border-color: rgb(229, 231, 235); --tw-border-spacing-x: 0; --tw-border-spacing-y: 0; --tw-translate-x: 0; --tw-translate-y: 0; --tw-rotate: 0; --tw-skew-x: 0; --tw-skew-y: 0; --tw-scale-x: 1; --tw-scale-y: 1; --tw-pan-x: ; --tw-pan-y: ; --tw-pinch-zoom: ; --tw-scroll-snap-strictness: proximity; --tw-ordinal: ; --tw-slashed-zero: ; --tw-numeric-figure: ; --tw-numeric-spacing: ; --tw-numeric-fraction: ; --tw-ring-inset: ; --tw-ring-offset-width: 0px; --tw-ring-offset-color: #fff; --tw-ring-color: rgb(59 130 246 / 0.5); --tw-ring-offset-shadow: 0 0 #0000; --tw-ring-shadow: 0 0 #0000; --tw-shadow: 0 0 #0000; --tw-shadow-colored: 0 0 #0000; --tw-blur: ; --tw-brightness: ; --tw-contrast: ; --tw-grayscale: ; --tw-hue-rotate: ; --tw-invert: ; --tw-saturate: ; --tw-sepia: ; --tw-drop-shadow: ; --tw-backdrop-blur: ; --tw-backdrop-brightness: ; --tw-backdrop-contrast: ; --tw-backdrop-grayscale: ; --tw-backdrop-hue-rotate: ; --tw-backdrop-invert: ; --tw-backdrop-opacity: ; --tw-backdrop-saturate: ; --tw-backdrop-sepia: ;\"><span class=\"UV3uM\" style=\"border-width: 0px; border-style: solid; border-color: rgb(229, 231, 235); --tw-border-spacing-x: 0; --tw-border-spacing-y: 0; --tw-translate-x: 0; --tw-translate-y: 0; --tw-rotate: 0; --tw-skew-x: 0; --tw-skew-y: 0; --tw-scale-x: 1; --tw-scale-y: 1; --tw-pan-x: ; --tw-pan-y: ; --tw-pinch-zoom: ; --tw-scroll-snap-strictness: proximity; --tw-ordinal: ; --tw-slashed-zero: ; --tw-numeric-figure: ; --tw-numeric-spacing: ; --tw-numeric-fraction: ; --tw-ring-inset: ; --tw-ring-offset-width: 0px; --tw-ring-offset-color: #fff; --tw-ring-color: rgb(59 130 246 / 0.5); --tw-ring-offset-shadow: 0 0 #0000; --tw-ring-shadow: 0 0 #0000; --tw-shadow: 0 0 #0000; --tw-shadow-colored: 0 0 #0000; --tw-blur: ; --tw-brightness: ; --tw-contrast: ; --tw-grayscale: ; --tw-hue-rotate: ; --tw-invert: ; --tw-saturate: ; --tw-sepia: ; --tw-drop-shadow: ; --tw-backdrop-blur: ; --tw-backdrop-brightness: ; --tw-backdrop-contrast: ; --tw-backdrop-grayscale: ; --tw-backdrop-hue-rotate: ; --tw-backdrop-invert: ; --tw-backdrop-opacity: ; --tw-backdrop-saturate: ; --tw-backdrop-sepia: ; font-size: 12px;\">&nbsp;:</span></span></span></p><div class=\"WaaZC\" style=\"border-width: 0px; border-style: solid; border-color: rgb(229, 231, 235); --tw-border-spacing-x: 0; --tw-border-spacing-y: 0; --tw-translate-x: 0; --tw-translate-y: 0; --tw-rotate: 0; --tw-skew-x: 0; --tw-skew-y: 0; --tw-scale-x: 1; --tw-scale-y: 1; --tw-pan-x: ; --tw-pan-y: ; --tw-pinch-zoom: ; --tw-scroll-snap-strictness: proximity; --tw-ordinal: ; --tw-slashed-zero: ; --tw-numeric-figure: ; --tw-numeric-spacing: ; --tw-numeric-fraction: ; --tw-ring-inset: ; --tw-ring-offset-width: 0px; --tw-ring-offset-color: #fff; --tw-ring-color: rgb(59 130 246 / 0.5); --tw-ring-offset-shadow: 0 0 #0000; --tw-ring-shadow: 0 0 #0000; --tw-shadow: 0 0 #0000; --tw-shadow-colored: 0 0 #0000; --tw-blur: ; --tw-brightness: ; --tw-contrast: ; --tw-grayscale: ; --tw-hue-rotate: ; --tw-invert: ; --tw-saturate: ; --tw-sepia: ; --tw-drop-shadow: ; --tw-backdrop-blur: ; --tw-backdrop-brightness: ; --tw-backdrop-contrast: ; --tw-backdrop-grayscale: ; --tw-backdrop-hue-rotate: ; --tw-backdrop-invert: ; --tw-backdrop-opacity: ; --tw-backdrop-saturate: ; --tw-backdrop-sepia: ; text-align: justify;\"><div class=\"RJPOee EIJn2\" style=\"border-width: 0px; border-style: solid; border-color: rgb(229, 231, 235); --tw-border-spacing-x: 0; --tw-border-spacing-y: 0; --tw-translate-x: 0; --tw-translate-y: 0; --tw-rotate: 0; --tw-skew-x: 0; --tw-skew-y: 0; --tw-scale-x: 1; --tw-scale-y: 1; --tw-pan-x: ; --tw-pan-y: ; --tw-pinch-zoom: ; --tw-scroll-snap-strictness: proximity; --tw-ordinal: ; --tw-slashed-zero: ; --tw-numeric-figure: ; --tw-numeric-spacing: ; --tw-numeric-fraction: ; --tw-ring-inset: ; --tw-ring-offset-width: 0px; --tw-ring-offset-color: #fff; --tw-ring-color: rgb(59 130 246 / 0.5); --tw-ring-offset-shadow: 0 0 #0000; --tw-ring-shadow: 0 0 #0000; --tw-shadow: 0 0 #0000; --tw-shadow-colored: 0 0 #0000; --tw-blur: ; --tw-brightness: ; --tw-contrast: ; --tw-grayscale: ; --tw-hue-rotate: ; --tw-invert: ; --tw-saturate: ; --tw-sepia: ; --tw-drop-shadow: ; --tw-backdrop-blur: ; --tw-backdrop-brightness: ; --tw-backdrop-contrast: ; --tw-backdrop-grayscale: ; --tw-backdrop-hue-rotate: ; --tw-backdrop-invert: ; --tw-backdrop-opacity: ; --tw-backdrop-saturate: ; --tw-backdrop-sepia: ; animation: 0s ease 0s 1 normal none running none !important;\"><div class=\"rPeykc uP58nb\" data-hveid=\"CAMQAQ\" data-ved=\"2ahUKEwjQ9oi6vNSLAxU8zzgGHawMN5YQo_EKegQIAxAB\" style=\"border-width: 0px; border-style: solid; border-color: rgb(229, 231, 235); --tw-border-spacing-x: 0; --tw-border-spacing-y: 0; --tw-translate-x: 0; --tw-translate-y: 0; --tw-rotate: 0; --tw-skew-x: 0; --tw-skew-y: 0; --tw-scale-x: 1; --tw-scale-y: 1; --tw-pan-x: ; --tw-pan-y: ; --tw-pinch-zoom: ; --tw-scroll-snap-strictness: proximity; --tw-ordinal: ; --tw-slashed-zero: ; --tw-numeric-figure: ; --tw-numeric-spacing: ; --tw-numeric-fraction: ; --tw-ring-inset: ; --tw-ring-offset-width: 0px; --tw-ring-offset-color: #fff; --tw-ring-color: rgb(59 130 246 / 0.5); --tw-ring-offset-shadow: 0 0 #0000; --tw-ring-shadow: 0 0 #0000; --tw-shadow: 0 0 #0000; --tw-shadow-colored: 0 0 #0000; --tw-blur: ; --tw-brightness: ; --tw-contrast: ; --tw-grayscale: ; --tw-hue-rotate: ; --tw-invert: ; --tw-saturate: ; --tw-sepia: ; --tw-drop-shadow: ; --tw-backdrop-blur: ; --tw-backdrop-brightness: ; --tw-backdrop-contrast: ; --tw-backdrop-grayscale: ; --tw-backdrop-hue-rotate: ; --tw-backdrop-invert: ; --tw-backdrop-opacity: ; --tw-backdrop-saturate: ; --tw-backdrop-sepia: ;\"></div></div></div><ul style=\"border-width: 0px; border-style: solid; border-color: rgb(229, 231, 235); --tw-border-spacing-x: 0; --tw-border-spacing-y: 0; --tw-translate-x: 0; --tw-translate-y: 0; --tw-rotate: 0; --tw-skew-x: 0; --tw-skew-y: 0; --tw-scale-x: 1; --tw-scale-y: 1; --tw-pan-x: ; --tw-pan-y: ; --tw-pinch-zoom: ; --tw-scroll-snap-strictness: proximity; --tw-ordinal: ; --tw-slashed-zero: ; --tw-numeric-figure: ; --tw-numeric-spacing: ; --tw-numeric-fraction: ; --tw-ring-inset: ; --tw-ring-offset-width: 0px; --tw-ring-offset-color: #fff; --tw-ring-color: rgb(59 130 246 / 0.5); --tw-ring-offset-shadow: 0 0 #0000; --tw-ring-shadow: 0 0 #0000; --tw-shadow: 0 0 #0000; --tw-shadow-colored: 0 0 #0000; --tw-blur: ; --tw-brightness: ; --tw-contrast: ; --tw-grayscale: ; --tw-hue-rotate: ; --tw-invert: ; --tw-saturate: ; --tw-sepia: ; --tw-drop-shadow: ; --tw-backdrop-blur: ; --tw-backdrop-brightness: ; --tw-backdrop-contrast: ; --tw-backdrop-grayscale: ; --tw-backdrop-hue-rotate: ; --tw-backdrop-invert: ; --tw-backdrop-opacity: ; --tw-backdrop-saturate: ; --tw-backdrop-sepia: ; list-style: none; margin-right: 0px; margin-bottom: 0px; margin-left: 0px; padding: 0px; text-align: justify;\"><li style=\"border-width: 0px; border-style: solid; border-color: rgb(229, 231, 235); --tw-border-spacing-x: 0; --tw-border-spacing-y: 0; --tw-translate-x: 0; --tw-translate-y: 0; --tw-rotate: 0; --tw-skew-x: 0; --tw-skew-y: 0; --tw-scale-x: 1; --tw-scale-y: 1; --tw-pan-x: ; --tw-pan-y: ; --tw-pinch-zoom: ; --tw-scroll-snap-strictness: proximity; --tw-ordinal: ; --tw-slashed-zero: ; --tw-numeric-figure: ; --tw-numeric-spacing: ; --tw-numeric-fraction: ; --tw-ring-inset: ; --tw-ring-offset-width: 0px; --tw-ring-offset-color: #fff; --tw-ring-color: rgb(59 130 246 / 0.5); --tw-ring-offset-shadow: 0 0 #0000; --tw-ring-shadow: 0 0 #0000; --tw-shadow: 0 0 #0000; --tw-shadow-colored: 0 0 #0000; --tw-blur: ; --tw-brightness: ; --tw-contrast: ; --tw-grayscale: ; --tw-hue-rotate: ; --tw-invert: ; --tw-saturate: ; --tw-sepia: ; --tw-drop-shadow: ; --tw-backdrop-blur: ; --tw-backdrop-brightness: ; --tw-backdrop-contrast: ; --tw-backdrop-grayscale: ; --tw-backdrop-hue-rotate: ; --tw-backdrop-invert: ; --tw-backdrop-opacity: ; --tw-backdrop-saturate: ; --tw-backdrop-sepia: ;\"><p style=\"border-width: 0px; border-style: solid; border-color: rgb(229, 231, 235); --tw-border-spacing-x: 0; --tw-border-spacing-y: 0; --tw-translate-x: 0; --tw-translate-y: 0; --tw-rotate: 0; --tw-skew-x: 0; --tw-skew-y: 0; --tw-scale-x: 1; --tw-scale-y: 1; --tw-pan-x: ; --tw-pan-y: ; --tw-pinch-zoom: ; --tw-scroll-snap-strictness: proximity; --tw-ordinal: ; --tw-slashed-zero: ; --tw-numeric-figure: ; --tw-numeric-spacing: ; --tw-numeric-fraction: ; --tw-ring-inset: ; --tw-ring-offset-width: 0px; --tw-ring-offset-color: #fff; --tw-ring-color: rgb(59 130 246 / 0.5); --tw-ring-offset-shadow: 0 0 #0000; --tw-ring-shadow: 0 0 #0000; --tw-shadow: 0 0 #0000; --tw-shadow-colored: 0 0 #0000; --tw-blur: ; --tw-brightness: ; --tw-contrast: ; --tw-grayscale: ; --tw-hue-rotate: ; --tw-invert: ; --tw-saturate: ; --tw-sepia: ; --tw-drop-shadow: ; --tw-backdrop-blur: ; --tw-backdrop-brightness: ; --tw-backdrop-contrast: ; --tw-backdrop-grayscale: ; --tw-backdrop-hue-rotate: ; --tw-backdrop-invert: ; --tw-backdrop-opacity: ; --tw-backdrop-saturate: ; --tw-backdrop-sepia: ; margin-bottom: 0px; animation: 0s ease 0s 1 normal none running none !important;\"></p><p style=\"border-width: 0px; border-style: solid; border-color: rgb(229, 231, 235); --tw-border-spacing-x: 0; --tw-border-spacing-y: 0; --tw-translate-x: 0; --tw-translate-y: 0; --tw-rotate: 0; --tw-skew-x: 0; --tw-skew-y: 0; --tw-scale-x: 1; --tw-scale-y: 1; --tw-pan-x: ; --tw-pan-y: ; --tw-pinch-zoom: ; --tw-scroll-snap-strictness: proximity; --tw-ordinal: ; --tw-slashed-zero: ; --tw-numeric-figure: ; --tw-numeric-spacing: ; --tw-numeric-fraction: ; --tw-ring-inset: ; --tw-ring-offset-width: 0px; --tw-ring-offset-color: #fff; --tw-ring-color: rgb(59 130 246 / 0.5); --tw-ring-offset-shadow: 0 0 #0000; --tw-ring-shadow: 0 0 #0000; --tw-shadow: 0 0 #0000; --tw-shadow-colored: 0 0 #0000; --tw-blur: ; --tw-brightness: ; --tw-contrast: ; --tw-grayscale: ; --tw-hue-rotate: ; --tw-invert: ; --tw-saturate: ; --tw-sepia: ; --tw-drop-shadow: ; --tw-backdrop-blur: ; --tw-backdrop-brightness: ; --tw-backdrop-contrast: ; --tw-backdrop-grayscale: ; --tw-backdrop-hue-rotate: ; --tw-backdrop-invert: ; --tw-backdrop-opacity: ; --tw-backdrop-saturate: ; --tw-backdrop-sepia: ; margin-bottom: 0px; animation: 0s ease 0s 1 normal none running none !important;\"></p><ul data-hveid=\"CBAQAQ\" data-ved=\"2ahUKEwjQ9oi6vNSLAxU8zzgGHawMN5YQm_YKegQIEBAB\" style=\"border-width: 0px; border-style: solid; border-color: rgb(229, 231, 235); --tw-border-spacing-x: 0; --tw-border-spacing-y: 0; --tw-translate-x: 0; --tw-translate-y: 0; --tw-rotate: 0; --tw-skew-x: 0; --tw-skew-y: 0; --tw-scale-x: 1; --tw-scale-y: 1; --tw-pan-x: ; --tw-pan-y: ; --tw-pinch-zoom: ; --tw-scroll-snap-strictness: proximity; --tw-ordinal: ; --tw-slashed-zero: ; --tw-numeric-figure: ; --tw-numeric-spacing: ; --tw-numeric-fraction: ; --tw-ring-inset: ; --tw-ring-offset-width: 0px; --tw-ring-offset-color: #fff; --tw-ring-color: rgb(59 130 246 / 0.5); --tw-ring-offset-shadow: 0 0 #0000; --tw-ring-shadow: 0 0 #0000; --tw-shadow: 0 0 #0000; --tw-shadow-colored: 0 0 #0000; --tw-blur: ; --tw-brightness: ; --tw-contrast: ; --tw-grayscale: ; --tw-hue-rotate: ; --tw-invert: ; --tw-saturate: ; --tw-sepia: ; --tw-drop-shadow: ; --tw-backdrop-blur: ; --tw-backdrop-brightness: ; --tw-backdrop-contrast: ; --tw-backdrop-grayscale: ; --tw-backdrop-hue-rotate: ; --tw-backdrop-invert: ; --tw-backdrop-opacity: ; --tw-backdrop-saturate: ; --tw-backdrop-sepia: ; list-style: none; margin-right: 0px; margin-left: 0px; padding: 0px;\"><ul style=\"border-width: 0px; border-style: solid; border-color: rgb(229, 231, 235); --tw-border-spacing-x: 0; --tw-border-spacing-y: 0; --tw-translate-x: 0; --tw-translate-y: 0; --tw-rotate: 0; --tw-skew-x: 0; --tw-skew-y: 0; --tw-scale-x: 1; --tw-scale-y: 1; --tw-pan-x: ; --tw-pan-y: ; --tw-pinch-zoom: ; --tw-scroll-snap-strictness: proximity; --tw-ordinal: ; --tw-slashed-zero: ; --tw-numeric-figure: ; --tw-numeric-spacing: ; --tw-numeric-fraction: ; --tw-ring-inset: ; --tw-ring-offset-width: 0px; --tw-ring-offset-color: #fff; --tw-ring-color: rgb(59 130 246 / 0.5); --tw-ring-offset-shadow: 0 0 #0000; --tw-ring-shadow: 0 0 #0000; --tw-shadow: 0 0 #0000; --tw-shadow-colored: 0 0 #0000; --tw-blur: ; --tw-brightness: ; --tw-contrast: ; --tw-grayscale: ; --tw-hue-rotate: ; --tw-invert: ; --tw-saturate: ; --tw-sepia: ; --tw-drop-shadow: ; --tw-backdrop-blur: ; --tw-backdrop-brightness: ; --tw-backdrop-contrast: ; --tw-backdrop-grayscale: ; --tw-backdrop-hue-rotate: ; --tw-backdrop-invert: ; --tw-backdrop-opacity: ; --tw-backdrop-saturate: ; --tw-backdrop-sepia: ; list-style: none; margin-right: 0px; margin-left: 0px; padding: 0px;\"></ul></ul><p style=\"border-width: 0px; border-style: solid; border-color: rgb(229, 231, 235); --tw-border-spacing-x: 0; --tw-border-spacing-y: 0; --tw-translate-x: 0; --tw-translate-y: 0; --tw-rotate: 0; --tw-skew-x: 0; --tw-skew-y: 0; --tw-scale-x: 1; --tw-scale-y: 1; --tw-pan-x: ; --tw-pan-y: ; --tw-pinch-zoom: ; --tw-scroll-snap-strictness: proximity; --tw-ordinal: ; --tw-slashed-zero: ; --tw-numeric-figure: ; --tw-numeric-spacing: ; --tw-numeric-fraction: ; --tw-ring-inset: ; --tw-ring-offset-width: 0px; --tw-ring-offset-color: #fff; --tw-ring-color: rgb(59 130 246 / 0.5); --tw-ring-offset-shadow: 0 0 #0000; --tw-ring-shadow: 0 0 #0000; --tw-shadow: 0 0 #0000; --tw-shadow-colored: 0 0 #0000; --tw-blur: ; --tw-brightness: ; --tw-contrast: ; --tw-grayscale: ; --tw-hue-rotate: ; --tw-invert: ; --tw-saturate: ; --tw-sepia: ; --tw-drop-shadow: ; --tw-backdrop-blur: ; --tw-backdrop-brightness: ; --tw-backdrop-contrast: ; --tw-backdrop-grayscale: ; --tw-backdrop-hue-rotate: ; --tw-backdrop-invert: ; --tw-backdrop-opacity: ; --tw-backdrop-saturate: ; --tw-backdrop-sepia: ; margin-bottom: 0px;\"></p><ul style=\"border-width: 0px; border-style: solid; border-color: rgb(229, 231, 235); --tw-border-spacing-x: 0; --tw-border-spacing-y: 0; --tw-translate-x: 0; --tw-translate-y: 0; --tw-rotate: 0; --tw-skew-x: 0; --tw-skew-y: 0; --tw-scale-x: 1; --tw-scale-y: 1; --tw-pan-x: ; --tw-pan-y: ; --tw-pinch-zoom: ; --tw-scroll-snap-strictness: proximity; --tw-ordinal: ; --tw-slashed-zero: ; --tw-numeric-figure: ; --tw-numeric-spacing: ; --tw-numeric-fraction: ; --tw-ring-inset: ; --tw-ring-offset-width: 0px; --tw-ring-offset-color: #fff; --tw-ring-color: rgb(59 130 246 / 0.5); --tw-ring-offset-shadow: 0 0 #0000; --tw-ring-shadow: 0 0 #0000; --tw-shadow: 0 0 #0000; --tw-shadow-colored: 0 0 #0000; --tw-blur: ; --tw-brightness: ; --tw-contrast: ; --tw-grayscale: ; --tw-hue-rotate: ; --tw-invert: ; --tw-saturate: ; --tw-sepia: ; --tw-drop-shadow: ; --tw-backdrop-blur: ; --tw-backdrop-brightness: ; --tw-backdrop-contrast: ; --tw-backdrop-grayscale: ; --tw-backdrop-hue-rotate: ; --tw-backdrop-invert: ; --tw-backdrop-opacity: ; --tw-backdrop-saturate: ; --tw-backdrop-sepia: ; list-style: none; margin-right: 0px; margin-left: 0px; padding: 0px;\"><li style=\"border-width: 0px; border-style: solid; border-color: rgb(229, 231, 235); --tw-border-spacing-x: 0; --tw-border-spacing-y: 0; --tw-translate-x: 0; --tw-translate-y: 0; --tw-rotate: 0; --tw-skew-x: 0; --tw-skew-y: 0; --tw-scale-x: 1; --tw-scale-y: 1; --tw-pan-x: ; --tw-pan-y: ; --tw-pinch-zoom: ; --tw-scroll-snap-strictness: proximity; --tw-ordinal: ; --tw-slashed-zero: ; --tw-numeric-figure: ; --tw-numeric-spacing: ; --tw-numeric-fraction: ; --tw-ring-inset: ; --tw-ring-offset-width: 0px; --tw-ring-offset-color: #fff; --tw-ring-color: rgb(59 130 246 / 0.5); --tw-ring-offset-shadow: 0 0 #0000; --tw-ring-shadow: 0 0 #0000; --tw-shadow: 0 0 #0000; --tw-shadow-colored: 0 0 #0000; --tw-blur: ; --tw-brightness: ; --tw-contrast: ; --tw-grayscale: ; --tw-hue-rotate: ; --tw-invert: ; --tw-saturate: ; --tw-sepia: ; --tw-drop-shadow: ; --tw-backdrop-blur: ; --tw-backdrop-brightness: ; --tw-backdrop-contrast: ; --tw-backdrop-grayscale: ; --tw-backdrop-hue-rotate: ; --tw-backdrop-invert: ; --tw-backdrop-opacity: ; --tw-backdrop-saturate: ; --tw-backdrop-sepia: ;\"><span data-huuid=\"14961117312965217053\" style=\"border-width: 0px; border-style: solid; border-color: rgb(229, 231, 235); --tw-border-spacing-x: 0; --tw-border-spacing-y: 0; --tw-translate-x: 0; --tw-translate-y: 0; --tw-rotate: 0; --tw-skew-x: 0; --tw-skew-y: 0; --tw-scale-x: 1; --tw-scale-y: 1; --tw-pan-x: ; --tw-pan-y: ; --tw-pinch-zoom: ; --tw-scroll-snap-strictness: proximity; --tw-ordinal: ; --tw-slashed-zero: ; --tw-numeric-figure: ; --tw-numeric-spacing: ; --tw-numeric-fraction: ; --tw-ring-inset: ; --tw-ring-offset-width: 0px; --tw-ring-offset-color: #fff; --tw-ring-color: rgb(59 130 246 / 0.5); --tw-ring-offset-shadow: 0 0 #0000; --tw-ring-shadow: 0 0 #0000; --tw-shadow: 0 0 #0000; --tw-shadow-colored: 0 0 #0000; --tw-blur: ; --tw-brightness: ; --tw-contrast: ; --tw-grayscale: ; --tw-hue-rotate: ; --tw-invert: ; --tw-saturate: ; --tw-sepia: ; --tw-drop-shadow: ; --tw-backdrop-blur: ; --tw-backdrop-brightness: ; --tw-backdrop-contrast: ; --tw-backdrop-grayscale: ; --tw-backdrop-hue-rotate: ; --tw-backdrop-invert: ; --tw-backdrop-opacity: ; --tw-backdrop-saturate: ; --tw-backdrop-sepia: ;\"><span style=\"border-width: 0px; border-style: solid; border-color: rgb(229, 231, 235); --tw-border-spacing-x: 0; --tw-border-spacing-y: 0; --tw-translate-x: 0; --tw-translate-y: 0; --tw-rotate: 0; --tw-skew-x: 0; --tw-skew-y: 0; --tw-scale-x: 1; --tw-scale-y: 1; --tw-pan-x: ; --tw-pan-y: ; --tw-pinch-zoom: ; --tw-scroll-snap-strictness: proximity; --tw-ordinal: ; --tw-slashed-zero: ; --tw-numeric-figure: ; --tw-numeric-spacing: ; --tw-numeric-fraction: ; --tw-ring-inset: ; --tw-ring-offset-width: 0px; --tw-ring-offset-color: #fff; --tw-ring-color: rgb(59 130 246 / 0.5); --tw-ring-offset-shadow: 0 0 #0000; --tw-ring-shadow: 0 0 #0000; --tw-shadow: 0 0 #0000; --tw-shadow-colored: 0 0 #0000; --tw-blur: ; --tw-brightness: ; --tw-contrast: ; --tw-grayscale: ; --tw-hue-rotate: ; --tw-invert: ; --tw-saturate: ; --tw-sepia: ; --tw-drop-shadow: ; --tw-backdrop-blur: ; --tw-backdrop-brightness: ; --tw-backdrop-contrast: ; --tw-backdrop-grayscale: ; --tw-backdrop-hue-rotate: ; --tw-backdrop-invert: ; --tw-backdrop-opacity: ; --tw-backdrop-saturate: ; --tw-backdrop-sepia: ; font-size: 12px;\">Menampung dan menyalurkan aspirasi masyarakat desa</span><span style=\"border-width: 0px; border-style: solid; border-color: rgb(229, 231, 235); --tw-border-spacing-x: 0; --tw-border-spacing-y: 0; --tw-translate-x: 0; --tw-translate-y: 0; --tw-rotate: 0; --tw-skew-x: 0; --tw-skew-y: 0; --tw-scale-x: 1; --tw-scale-y: 1; --tw-pan-x: ; --tw-pan-y: ; --tw-pinch-zoom: ; --tw-scroll-snap-strictness: proximity; --tw-ordinal: ; --tw-slashed-zero: ; --tw-numeric-figure: ; --tw-numeric-spacing: ; --tw-numeric-fraction: ; --tw-ring-inset: ; --tw-ring-offset-width: 0px; --tw-ring-offset-color: #fff; --tw-ring-color: rgb(59 130 246 / 0.5); --tw-ring-offset-shadow: 0 0 #0000; --tw-ring-shadow: 0 0 #0000; --tw-shadow: 0 0 #0000; --tw-shadow-colored: 0 0 #0000; --tw-blur: ; --tw-brightness: ; --tw-contrast: ; --tw-grayscale: ; --tw-hue-rotate: ; --tw-invert: ; --tw-saturate: ; --tw-sepia: ; --tw-drop-shadow: ; --tw-backdrop-blur: ; --tw-backdrop-brightness: ; --tw-backdrop-contrast: ; --tw-backdrop-grayscale: ; --tw-backdrop-hue-rotate: ; --tw-backdrop-invert: ; --tw-backdrop-opacity: ; --tw-backdrop-saturate: ; --tw-backdrop-sepia: ;\"></span></span></li><li style=\"border-width: 0px; border-style: solid; border-color: rgb(229, 231, 235); --tw-border-spacing-x: 0; --tw-border-spacing-y: 0; --tw-translate-x: 0; --tw-translate-y: 0; --tw-rotate: 0; --tw-skew-x: 0; --tw-skew-y: 0; --tw-scale-x: 1; --tw-scale-y: 1; --tw-pan-x: ; --tw-pan-y: ; --tw-pinch-zoom: ; --tw-scroll-snap-strictness: proximity; --tw-ordinal: ; --tw-slashed-zero: ; --tw-numeric-figure: ; --tw-numeric-spacing: ; --tw-numeric-fraction: ; --tw-ring-inset: ; --tw-ring-offset-width: 0px; --tw-ring-offset-color: #fff; --tw-ring-color: rgb(59 130 246 / 0.5); --tw-ring-offset-shadow: 0 0 #0000; --tw-ring-shadow: 0 0 #0000; --tw-shadow: 0 0 #0000; --tw-shadow-colored: 0 0 #0000; --tw-blur: ; --tw-brightness: ; --tw-contrast: ; --tw-grayscale: ; --tw-hue-rotate: ; --tw-invert: ; --tw-saturate: ; --tw-sepia: ; --tw-drop-shadow: ; --tw-backdrop-blur: ; --tw-backdrop-brightness: ; --tw-backdrop-contrast: ; --tw-backdrop-grayscale: ; --tw-backdrop-hue-rotate: ; --tw-backdrop-invert: ; --tw-backdrop-opacity: ; --tw-backdrop-saturate: ; --tw-backdrop-sepia: ;\"><span data-huuid=\"14961117312965214491\" style=\"border-width: 0px; border-style: solid; border-color: rgb(229, 231, 235); --tw-border-spacing-x: 0; --tw-border-spacing-y: 0; --tw-translate-x: 0; --tw-translate-y: 0; --tw-rotate: 0; --tw-skew-x: 0; --tw-skew-y: 0; --tw-scale-x: 1; --tw-scale-y: 1; --tw-pan-x: ; --tw-pan-y: ; --tw-pinch-zoom: ; --tw-scroll-snap-strictness: proximity; --tw-ordinal: ; --tw-slashed-zero: ; --tw-numeric-figure: ; --tw-numeric-spacing: ; --tw-numeric-fraction: ; --tw-ring-inset: ; --tw-ring-offset-width: 0px; --tw-ring-offset-color: #fff; --tw-ring-color: rgb(59 130 246 / 0.5); --tw-ring-offset-shadow: 0 0 #0000; --tw-ring-shadow: 0 0 #0000; --tw-shadow: 0 0 #0000; --tw-shadow-colored: 0 0 #0000; --tw-blur: ; --tw-brightness: ; --tw-contrast: ; --tw-grayscale: ; --tw-hue-rotate: ; --tw-invert: ; --tw-saturate: ; --tw-sepia: ; --tw-drop-shadow: ; --tw-backdrop-blur: ; --tw-backdrop-brightness: ; --tw-backdrop-contrast: ; --tw-backdrop-grayscale: ; --tw-backdrop-hue-rotate: ; --tw-backdrop-invert: ; --tw-backdrop-opacity: ; --tw-backdrop-saturate: ; --tw-backdrop-sepia: ; font-size: 12px;\">Melakukan pengawasan kinerja kepala desa.</span></li></ul></li></ul>', 'Administrator', '1743148656');
INSERT INTO `lembaga_masyarakat` (`id`, `nama`, `isi`, `user`, `tgl_buat`) VALUES (2, 'Pembinaan Kesejahteraan Keluarga (PKK)', '<p><span style=\"font-family: Rubik; font-size: 12px;\">﻿</span><span data-huuid=\"15436214366111373754\" style=\"\"><span style=\"font-family: Rubik; font-size: 12px;\">Pembinaan Kesejahteraan Keluarga (PKK) adalah&nbsp;</span><mark class=\"QVRyCf\" style=\"background-image: ; background-position-x: ; background-position-y: ; background-size: ; background-repeat-x: ; background-repeat-y: ; background-attachment: ; background-origin: ; background-clip: ; border-radius: 4px; padding: 0px 2px;\"><span style=\"font-family: Rubik; font-size: 12px;\">organisasi kemasyarakatan yang bertujuan untuk meningkatkan kesejahteraan keluarga dan masyarakat</span></mark><span style=\"font-family: Rubik; font-size: 12px;\">.&nbsp;</span></span><span data-huuid=\"15436214366111375115\" style=\"font-family: Rubik; font-size: 12px;\">PKK dikenal dengan \"10 program pokok\"-nya</span><br></p>', 'Administrator', '1743876922');


#
# TABLE STRUCTURE FOR: log_hapus_penduduk
#

CREATE TABLE `log_hapus_penduduk` (
  `id_pend` int(11) NOT NULL AUTO_INCREMENT,
  `nik` varchar(128) NOT NULL,
  `foto` varchar(200) NOT NULL,
  `deleted_by` varchar(128) NOT NULL,
  `deleted_at` varchar(128) NOT NULL,
  PRIMARY KEY (`id_pend`)
) ENGINE=InnoDB AUTO_INCREMENT=31 DEFAULT CHARSET=utf8;

INSERT INTO `log_hapus_penduduk` (`id_pend`, `nik`, `foto`, `deleted_by`, `deleted_at`) VALUES (30, '6575757655757757', 'wuser.png', 'admin@gmail.com', '2024-06-28 21:44:38');


#
# TABLE STRUCTURE FOR: log_surat
#

CREATE TABLE `log_surat` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `id_surat` int(11) NOT NULL,
  `id_pend` int(11) NOT NULL,
  `pamong` varchar(128) NOT NULL,
  `jabatan` varchar(128) NOT NULL,
  `user` varchar(128) NOT NULL,
  `tanggal` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP,
  `no_surat` int(11) NOT NULL,
  `keterangan` text,
  `id_status` int(11) DEFAULT NULL,
  `file_srt` varchar(200) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=13 DEFAULT CHARSET=utf8;

INSERT INTO `log_surat` (`id`, `id_surat`, `id_pend`, `pamong`, `jabatan`, `user`, `tanggal`, `no_surat`, `keterangan`, `id_status`, `file_srt`) VALUES (6, 19, 10, 'Glen Alvaro, S.Pd', 'Kepala Kelurahan', 'Administrator', '2025-03-06 10:53:23', 1, 'Sudah Ambil', 5, 'd3074af95d');
INSERT INTO `log_surat` (`id`, `id_surat`, `id_pend`, `pamong`, `jabatan`, `user`, `tanggal`, `no_surat`, `keterangan`, `id_status`, `file_srt`) VALUES (8, 16, 10, '-', '-', 'Administrator', '2025-03-06 11:01:24', 0, 'Tidak Lengkap', 3, '-');
INSERT INTO `log_surat` (`id`, `id_surat`, `id_pend`, `pamong`, `jabatan`, `user`, `tanggal`, `no_surat`, `keterangan`, `id_status`, `file_srt`) VALUES (9, 11, 10, 'Glen Alvaro, S.Pd', 'Kepala Kelurahan', 'Administrator', '2025-03-06 11:19:53', 1, 'Sudah Ambil', NULL, 'b9189a5cf8');
INSERT INTO `log_surat` (`id`, `id_surat`, `id_pend`, `pamong`, `jabatan`, `user`, `tanggal`, `no_surat`, `keterangan`, `id_status`, `file_srt`) VALUES (10, 16, 13, 'Glen Alvaro, S.Pd', 'Kepala Kelurahan', 'Administrator', '2025-03-06 11:59:43', 1, 'Sudah Ambil', 5, 'c56c81315b');
INSERT INTO `log_surat` (`id`, `id_surat`, `id_pend`, `pamong`, `jabatan`, `user`, `tanggal`, `no_surat`, `keterangan`, `id_status`, `file_srt`) VALUES (11, 19, 13, '-', '-', 'Administrator', '2025-03-06 12:01:29', 0, 'Dokumen Tidak Lengkap', 3, '-');
INSERT INTO `log_surat` (`id`, `id_surat`, `id_pend`, `pamong`, `jabatan`, `user`, `tanggal`, `no_surat`, `keterangan`, `id_status`, `file_srt`) VALUES (12, 6, 10, '-', '-', 'Operator Desa', '2025-03-06 12:17:34', 0, 'Tidak Lengkap dokumen syarat', 3, '-');


#
# TABLE STRUCTURE FOR: media_sosial
#

CREATE TABLE `media_sosial` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `nama` varchar(128) NOT NULL,
  `link` varchar(128) NOT NULL,
  `icon` varchar(200) NOT NULL,
  `tampil` int(11) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=3 DEFAULT CHARSET=utf8;

INSERT INTO `media_sosial` (`id`, `nama`, `link`, `icon`, `tampil`) VALUES (1, 'Facebook', 'https://faceboook.com', 'e3eb34f93f.png', 1);
INSERT INTO `media_sosial` (`id`, `nama`, `link`, `icon`, `tampil`) VALUES (2, 'Twitter', 'https://twiter.com', 'c24021aeef.png', 0);


#
# TABLE STRUCTURE FOR: menu_statistik
#

CREATE TABLE `menu_statistik` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `menu` varchar(128) NOT NULL,
  `url` varchar(128) NOT NULL,
  `tbl` varchar(128) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=13 DEFAULT CHARSET=utf8;

INSERT INTO `menu_statistik` (`id`, `menu`, `url`, `tbl`) VALUES (1, 'Pendidikan Dalam KK', 'pendikan_kk_id', 'penduduk_pendidikan_kk');
INSERT INTO `menu_statistik` (`id`, `menu`, `url`, `tbl`) VALUES (2, 'Pendidikan Sedang di Tempuh', 'pendidikan_sedang_id', 'penduduk_pendidikan');
INSERT INTO `menu_statistik` (`id`, `menu`, `url`, `tbl`) VALUES (3, 'Pekerjaan', 'pekerjaan_id', 'penduduk_pekerjaan');
INSERT INTO `menu_statistik` (`id`, `menu`, `url`, `tbl`) VALUES (4, 'Agama', 'agama_id', 'penduduk_agama');
INSERT INTO `menu_statistik` (`id`, `menu`, `url`, `tbl`) VALUES (5, 'Jenis Kelamin', 'jenis_kelamin', 'tweb_penduduk_sex');
INSERT INTO `menu_statistik` (`id`, `menu`, `url`, `tbl`) VALUES (6, 'Hubungan Dalam KK', 'hubungan_keluarga_id', 'penduduk_hubungan');
INSERT INTO `menu_statistik` (`id`, `menu`, `url`, `tbl`) VALUES (7, 'Warga Negara', 'status_warganegara', 'penduduk_warganegara');
INSERT INTO `menu_statistik` (`id`, `menu`, `url`, `tbl`) VALUES (8, 'Golongan Darah', 'golongan_darah', 'golongan_darah');
INSERT INTO `menu_statistik` (`id`, `menu`, `url`, `tbl`) VALUES (9, 'Suku / Etnis', 'suku', 'penduduk_suku');
INSERT INTO `menu_statistik` (`id`, `menu`, `url`, `tbl`) VALUES (10, 'Status Penduduk', 'status_penduduk_id', 'penduduk_status');
INSERT INTO `menu_statistik` (`id`, `menu`, `url`, `tbl`) VALUES (11, 'Status Perkawinan', 'status_kawin', 'penduduk_kawin');
INSERT INTO `menu_statistik` (`id`, `menu`, `url`, `tbl`) VALUES (12, 'Wilayah', 'dusun_id', 'wilayah_desa');


#
# TABLE STRUCTURE FOR: menu_web
#

CREATE TABLE `menu_web` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `nama` varchar(128) NOT NULL,
  `jenis_link` int(11) NOT NULL,
  `link` varchar(500) NOT NULL,
  `status` int(11) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=6 DEFAULT CHARSET=utf8;

INSERT INTO `menu_web` (`id`, `nama`, `jenis_link`, `link`, `status`) VALUES (1, 'Profil Kelurahan', 3, '#', 1);
INSERT INTO `menu_web` (`id`, `nama`, `jenis_link`, `link`, `status`) VALUES (2, 'Berita', 4, 'data_berita', 1);
INSERT INTO `menu_web` (`id`, `nama`, `jenis_link`, `link`, `status`) VALUES (3, 'Pembangunan', 4, 'pembangunan', 1);
INSERT INTO `menu_web` (`id`, `nama`, `jenis_link`, `link`, `status`) VALUES (4, 'Lembaga', 3, '#', 1);
INSERT INTO `menu_web` (`id`, `nama`, `jenis_link`, `link`, `status`) VALUES (5, 'Publikasi', 6, 'informasi_publik', 1);


#
# TABLE STRUCTURE FOR: pembangunan
#

CREATE TABLE `pembangunan` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `nama_kegiatan` varchar(200) NOT NULL,
  `volume` varchar(128) NOT NULL,
  `waktu` varchar(128) NOT NULL,
  `jenis_waktu` varchar(128) NOT NULL,
  `sumber_dana` varchar(128) NOT NULL,
  `tahun_anggaran` varchar(128) NOT NULL,
  `total_anggaran` varchar(128) NOT NULL,
  `biaya_pemerintah` varchar(128) NOT NULL,
  `biaya_provinsi` varchar(128) NOT NULL,
  `biaya_kab` varchar(128) NOT NULL,
  `biaya_swadaya` varchar(128) NOT NULL,
  `sifat_proyek` varchar(128) NOT NULL,
  `pelaksana_kegiatan` varchar(200) NOT NULL,
  `lokasi_pembangunan` varchar(128) NOT NULL,
  `manfaat` text NOT NULL,
  `keterangan` text NOT NULL,
  `gambar_proyek` varchar(300) NOT NULL,
  `latitude` varchar(200) NOT NULL,
  `longitude` varchar(200) NOT NULL,
  `status` int(11) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=8 DEFAULT CHARSET=utf8;

INSERT INTO `pembangunan` (`id`, `nama_kegiatan`, `volume`, `waktu`, `jenis_waktu`, `sumber_dana`, `tahun_anggaran`, `total_anggaran`, `biaya_pemerintah`, `biaya_provinsi`, `biaya_kab`, `biaya_swadaya`, `sifat_proyek`, `pelaksana_kegiatan`, `lokasi_pembangunan`, `manfaat`, `keterangan`, `gambar_proyek`, `latitude`, `longitude`, `status`) VALUES (6, 'Pembangunan Irigasi', '2500', '30', 'Hari', 'Alokasi Dana Desa', '2024', '1600000000', '40000000', '600000000', '60000000', '900000000', 'BARU', 'PT Trans Corp', 'Dusun 1', 'Sawah, Saluran', 'Irigasi', 'irigasi.jpg', '0.8502897302255552', '124.69442939281795', 1);
INSERT INTO `pembangunan` (`id`, `nama_kegiatan`, `volume`, `waktu`, `jenis_waktu`, `sumber_dana`, `tahun_anggaran`, `total_anggaran`, `biaya_pemerintah`, `biaya_provinsi`, `biaya_kab`, `biaya_swadaya`, `sifat_proyek`, `pelaksana_kegiatan`, `lokasi_pembangunan`, `manfaat`, `keterangan`, `gambar_proyek`, `latitude`, `longitude`, `status`) VALUES (7, 'Pembangunan Jalan Desa', '2100', '30', 'Hari', 'Alokasi Anggaran Pendapatan dan Belanja Negara (Dana Desa)', '2024', '4000002', '1000000', '2000000', '1000000', '2.000', 'BARU', 'PT Jasa Marga', 'Dusun 1', 'Ekonomi Maju', 'Proyek tahap Awal', 'IMG-20240708-WA0087_1.jpg', '0.8572449317827578', '124.69388008117677', 1);


#
# TABLE STRUCTURE FOR: penduduk_agama
#

CREATE TABLE `penduduk_agama` (
  `id` int(10) unsigned NOT NULL AUTO_INCREMENT,
  `nama` varchar(100) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=8 DEFAULT CHARSET=utf8 ROW_FORMAT=COMPACT;

INSERT INTO `penduduk_agama` (`id`, `nama`) VALUES (1, 'ISLAM');
INSERT INTO `penduduk_agama` (`id`, `nama`) VALUES (2, 'KRISTEN');
INSERT INTO `penduduk_agama` (`id`, `nama`) VALUES (3, 'KATHOLIK');
INSERT INTO `penduduk_agama` (`id`, `nama`) VALUES (4, 'HINDU');
INSERT INTO `penduduk_agama` (`id`, `nama`) VALUES (5, 'BUDHA');
INSERT INTO `penduduk_agama` (`id`, `nama`) VALUES (6, 'KHONGHUCU');
INSERT INTO `penduduk_agama` (`id`, `nama`) VALUES (7, 'LAINNYA');


#
# TABLE STRUCTURE FOR: penduduk_hubungan
#

CREATE TABLE `penduduk_hubungan` (
  `id` int(10) NOT NULL AUTO_INCREMENT,
  `nama` varchar(100) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=12 DEFAULT CHARSET=utf8 ROW_FORMAT=COMPACT;

INSERT INTO `penduduk_hubungan` (`id`, `nama`) VALUES (1, 'KEPALA KELUARGA');
INSERT INTO `penduduk_hubungan` (`id`, `nama`) VALUES (2, 'SUAMI');
INSERT INTO `penduduk_hubungan` (`id`, `nama`) VALUES (3, 'ISTRI');
INSERT INTO `penduduk_hubungan` (`id`, `nama`) VALUES (4, 'ANAK');
INSERT INTO `penduduk_hubungan` (`id`, `nama`) VALUES (5, 'MENANTU');
INSERT INTO `penduduk_hubungan` (`id`, `nama`) VALUES (6, 'CUCU');
INSERT INTO `penduduk_hubungan` (`id`, `nama`) VALUES (7, 'ORANGTUA');
INSERT INTO `penduduk_hubungan` (`id`, `nama`) VALUES (8, 'MERTUA');
INSERT INTO `penduduk_hubungan` (`id`, `nama`) VALUES (9, 'FAMILI LAIN');
INSERT INTO `penduduk_hubungan` (`id`, `nama`) VALUES (10, 'PEMBANTU');
INSERT INTO `penduduk_hubungan` (`id`, `nama`) VALUES (11, 'LAINNYA');


#
# TABLE STRUCTURE FOR: penduduk_kawin
#

CREATE TABLE `penduduk_kawin` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `nama` varchar(128) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=3 DEFAULT CHARSET=utf8;

INSERT INTO `penduduk_kawin` (`id`, `nama`) VALUES (1, 'KAWIN');
INSERT INTO `penduduk_kawin` (`id`, `nama`) VALUES (2, 'BELUM KAWIN');


#
# TABLE STRUCTURE FOR: penduduk_pekerjaan
#

CREATE TABLE `penduduk_pekerjaan` (
  `id` int(10) unsigned NOT NULL AUTO_INCREMENT,
  `nama` varchar(100) DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=90 DEFAULT CHARSET=utf8 ROW_FORMAT=COMPACT;

INSERT INTO `penduduk_pekerjaan` (`id`, `nama`) VALUES (1, 'BELUM/TIDAK BEKERJA');
INSERT INTO `penduduk_pekerjaan` (`id`, `nama`) VALUES (2, 'MENGURUS RUMAH TANGGA');
INSERT INTO `penduduk_pekerjaan` (`id`, `nama`) VALUES (3, 'PELAJAR/MAHASISWA');
INSERT INTO `penduduk_pekerjaan` (`id`, `nama`) VALUES (4, 'PENSIUNAN');
INSERT INTO `penduduk_pekerjaan` (`id`, `nama`) VALUES (5, 'PEGAWAI NEGERI SIPIL (PNS)');
INSERT INTO `penduduk_pekerjaan` (`id`, `nama`) VALUES (6, 'TENTARA NASIONAL INDONESIA (TNI)');
INSERT INTO `penduduk_pekerjaan` (`id`, `nama`) VALUES (7, 'KEPOLISIAN RI (POLRI)');
INSERT INTO `penduduk_pekerjaan` (`id`, `nama`) VALUES (8, 'PERDAGANGAN');
INSERT INTO `penduduk_pekerjaan` (`id`, `nama`) VALUES (9, 'PETANI/PEKEBUN');
INSERT INTO `penduduk_pekerjaan` (`id`, `nama`) VALUES (10, 'PETERNAK');
INSERT INTO `penduduk_pekerjaan` (`id`, `nama`) VALUES (11, 'NELAYAN/PERIKANAN');
INSERT INTO `penduduk_pekerjaan` (`id`, `nama`) VALUES (12, 'INDUSTRI');
INSERT INTO `penduduk_pekerjaan` (`id`, `nama`) VALUES (13, 'KONSTRUKSI');
INSERT INTO `penduduk_pekerjaan` (`id`, `nama`) VALUES (14, 'TRANSPORTASI');
INSERT INTO `penduduk_pekerjaan` (`id`, `nama`) VALUES (15, 'KARYAWAN SWASTA');
INSERT INTO `penduduk_pekerjaan` (`id`, `nama`) VALUES (16, 'KARYAWAN BUMN');
INSERT INTO `penduduk_pekerjaan` (`id`, `nama`) VALUES (17, 'KARYAWAN BUMD');
INSERT INTO `penduduk_pekerjaan` (`id`, `nama`) VALUES (18, 'KARYAWAN HONORER');
INSERT INTO `penduduk_pekerjaan` (`id`, `nama`) VALUES (19, 'BURUH HARIAN LEPAS');
INSERT INTO `penduduk_pekerjaan` (`id`, `nama`) VALUES (20, 'BURUH TANI/PERKEBUNAN');
INSERT INTO `penduduk_pekerjaan` (`id`, `nama`) VALUES (21, 'BURUH NELAYAN/PERIKANAN');
INSERT INTO `penduduk_pekerjaan` (`id`, `nama`) VALUES (22, 'BURUH PETERNAKAN');
INSERT INTO `penduduk_pekerjaan` (`id`, `nama`) VALUES (23, 'PEMBANTU RUMAH TANGGA');
INSERT INTO `penduduk_pekerjaan` (`id`, `nama`) VALUES (24, 'TUKANG CUKUR');
INSERT INTO `penduduk_pekerjaan` (`id`, `nama`) VALUES (25, 'TUKANG LISTRIK');
INSERT INTO `penduduk_pekerjaan` (`id`, `nama`) VALUES (26, 'TUKANG BATU');
INSERT INTO `penduduk_pekerjaan` (`id`, `nama`) VALUES (27, 'TUKANG KAYU');
INSERT INTO `penduduk_pekerjaan` (`id`, `nama`) VALUES (28, 'TUKANG SOL SEPATU');
INSERT INTO `penduduk_pekerjaan` (`id`, `nama`) VALUES (29, 'TUKANG LAS/PANDAI BESI');
INSERT INTO `penduduk_pekerjaan` (`id`, `nama`) VALUES (30, 'TUKANG JAHIT');
INSERT INTO `penduduk_pekerjaan` (`id`, `nama`) VALUES (31, 'TUKANG GIGI');
INSERT INTO `penduduk_pekerjaan` (`id`, `nama`) VALUES (32, 'PENATA RIAS');
INSERT INTO `penduduk_pekerjaan` (`id`, `nama`) VALUES (33, 'PENATA BUSANA');
INSERT INTO `penduduk_pekerjaan` (`id`, `nama`) VALUES (34, 'PENATA RAMBUT');
INSERT INTO `penduduk_pekerjaan` (`id`, `nama`) VALUES (35, 'MEKANIK');
INSERT INTO `penduduk_pekerjaan` (`id`, `nama`) VALUES (36, 'SENIMAN');
INSERT INTO `penduduk_pekerjaan` (`id`, `nama`) VALUES (37, 'TABIB');
INSERT INTO `penduduk_pekerjaan` (`id`, `nama`) VALUES (38, 'PARAJI');
INSERT INTO `penduduk_pekerjaan` (`id`, `nama`) VALUES (39, 'PERANCANG BUSANA');
INSERT INTO `penduduk_pekerjaan` (`id`, `nama`) VALUES (40, 'PENTERJEMAH');
INSERT INTO `penduduk_pekerjaan` (`id`, `nama`) VALUES (41, 'IMAM MASJID');
INSERT INTO `penduduk_pekerjaan` (`id`, `nama`) VALUES (42, 'PENDETA');
INSERT INTO `penduduk_pekerjaan` (`id`, `nama`) VALUES (43, 'PASTOR');
INSERT INTO `penduduk_pekerjaan` (`id`, `nama`) VALUES (44, 'WARTAWAN');
INSERT INTO `penduduk_pekerjaan` (`id`, `nama`) VALUES (45, 'USTADZ/MUBALIGH');
INSERT INTO `penduduk_pekerjaan` (`id`, `nama`) VALUES (46, 'JURU MASAK');
INSERT INTO `penduduk_pekerjaan` (`id`, `nama`) VALUES (47, 'PROMOTOR ACARA');
INSERT INTO `penduduk_pekerjaan` (`id`, `nama`) VALUES (48, 'ANGGOTA DPR-RI');
INSERT INTO `penduduk_pekerjaan` (`id`, `nama`) VALUES (49, 'ANGGOTA DPD');
INSERT INTO `penduduk_pekerjaan` (`id`, `nama`) VALUES (50, 'ANGGOTA BPK');
INSERT INTO `penduduk_pekerjaan` (`id`, `nama`) VALUES (51, 'PRESIDEN');
INSERT INTO `penduduk_pekerjaan` (`id`, `nama`) VALUES (52, 'WAKIL PRESIDEN');
INSERT INTO `penduduk_pekerjaan` (`id`, `nama`) VALUES (53, 'ANGGOTA MAHKAMAH KONSTITUSI');
INSERT INTO `penduduk_pekerjaan` (`id`, `nama`) VALUES (54, 'ANGGOTA KABINET KEMENTERIAN');
INSERT INTO `penduduk_pekerjaan` (`id`, `nama`) VALUES (55, 'DUTA BESAR');
INSERT INTO `penduduk_pekerjaan` (`id`, `nama`) VALUES (56, 'GUBERNUR');
INSERT INTO `penduduk_pekerjaan` (`id`, `nama`) VALUES (57, 'WAKIL GUBERNUR');
INSERT INTO `penduduk_pekerjaan` (`id`, `nama`) VALUES (58, 'BUPATI');
INSERT INTO `penduduk_pekerjaan` (`id`, `nama`) VALUES (59, 'WAKIL BUPATI');
INSERT INTO `penduduk_pekerjaan` (`id`, `nama`) VALUES (60, 'WALIKOTA');
INSERT INTO `penduduk_pekerjaan` (`id`, `nama`) VALUES (61, 'WAKIL WALIKOTA');
INSERT INTO `penduduk_pekerjaan` (`id`, `nama`) VALUES (62, 'ANGGOTA DPRD PROVINSI');
INSERT INTO `penduduk_pekerjaan` (`id`, `nama`) VALUES (63, 'ANGGOTA DPRD KABUPATEN/KOTA');
INSERT INTO `penduduk_pekerjaan` (`id`, `nama`) VALUES (64, 'DOSEN');
INSERT INTO `penduduk_pekerjaan` (`id`, `nama`) VALUES (65, 'GURU');
INSERT INTO `penduduk_pekerjaan` (`id`, `nama`) VALUES (66, 'PILOT');
INSERT INTO `penduduk_pekerjaan` (`id`, `nama`) VALUES (67, 'PENGACARA');
INSERT INTO `penduduk_pekerjaan` (`id`, `nama`) VALUES (68, 'NOTARIS');
INSERT INTO `penduduk_pekerjaan` (`id`, `nama`) VALUES (69, 'ARSITEK');
INSERT INTO `penduduk_pekerjaan` (`id`, `nama`) VALUES (70, 'AKUNTAN');
INSERT INTO `penduduk_pekerjaan` (`id`, `nama`) VALUES (71, 'KONSULTAN');
INSERT INTO `penduduk_pekerjaan` (`id`, `nama`) VALUES (72, 'DOKTER');
INSERT INTO `penduduk_pekerjaan` (`id`, `nama`) VALUES (73, 'BIDAN');
INSERT INTO `penduduk_pekerjaan` (`id`, `nama`) VALUES (74, 'PERAWAT');
INSERT INTO `penduduk_pekerjaan` (`id`, `nama`) VALUES (75, 'APOTEKER');
INSERT INTO `penduduk_pekerjaan` (`id`, `nama`) VALUES (76, 'PSIKIATER/PSIKOLOG');
INSERT INTO `penduduk_pekerjaan` (`id`, `nama`) VALUES (77, 'PENYIAR TELEVISI');
INSERT INTO `penduduk_pekerjaan` (`id`, `nama`) VALUES (78, 'PENYIAR RADIO');
INSERT INTO `penduduk_pekerjaan` (`id`, `nama`) VALUES (79, 'PELAUT');
INSERT INTO `penduduk_pekerjaan` (`id`, `nama`) VALUES (80, 'PENELITI');
INSERT INTO `penduduk_pekerjaan` (`id`, `nama`) VALUES (81, 'SOPIR');
INSERT INTO `penduduk_pekerjaan` (`id`, `nama`) VALUES (82, 'PIALANG');
INSERT INTO `penduduk_pekerjaan` (`id`, `nama`) VALUES (83, 'PARANORMAL');
INSERT INTO `penduduk_pekerjaan` (`id`, `nama`) VALUES (84, 'PEDAGANG');
INSERT INTO `penduduk_pekerjaan` (`id`, `nama`) VALUES (85, 'PERANGKAT DESA');
INSERT INTO `penduduk_pekerjaan` (`id`, `nama`) VALUES (86, 'KEPALA DESA');
INSERT INTO `penduduk_pekerjaan` (`id`, `nama`) VALUES (87, 'BIARAWATI');
INSERT INTO `penduduk_pekerjaan` (`id`, `nama`) VALUES (88, 'WIRASWASTA');
INSERT INTO `penduduk_pekerjaan` (`id`, `nama`) VALUES (89, 'LAINNYA');


#
# TABLE STRUCTURE FOR: penduduk_pendidikan
#

CREATE TABLE `penduduk_pendidikan` (
  `id` tinyint(3) NOT NULL AUTO_INCREMENT,
  `nama` varchar(50) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=19 DEFAULT CHARSET=utf8 ROW_FORMAT=COMPACT;

INSERT INTO `penduduk_pendidikan` (`id`, `nama`) VALUES (1, 'BELUM MASUK TK/KELOMPOK BERMAIN');
INSERT INTO `penduduk_pendidikan` (`id`, `nama`) VALUES (2, 'SEDANG TK/KELOMPOK BERMAIN');
INSERT INTO `penduduk_pendidikan` (`id`, `nama`) VALUES (3, 'TIDAK PERNAH SEKOLAH');
INSERT INTO `penduduk_pendidikan` (`id`, `nama`) VALUES (4, 'SEDANG SD/SEDERAJAT');
INSERT INTO `penduduk_pendidikan` (`id`, `nama`) VALUES (5, 'TIDAK TAMAT SD/SEDERAJAT');
INSERT INTO `penduduk_pendidikan` (`id`, `nama`) VALUES (6, 'SEDANG SLTP/SEDERAJAT');
INSERT INTO `penduduk_pendidikan` (`id`, `nama`) VALUES (7, 'SEDANG SLTA/SEDERAJAT');
INSERT INTO `penduduk_pendidikan` (`id`, `nama`) VALUES (8, 'SEDANG  D-1/SEDERAJAT');
INSERT INTO `penduduk_pendidikan` (`id`, `nama`) VALUES (9, 'SEDANG D-2/SEDERAJAT');
INSERT INTO `penduduk_pendidikan` (`id`, `nama`) VALUES (10, 'SEDANG D-3/SEDERAJAT');
INSERT INTO `penduduk_pendidikan` (`id`, `nama`) VALUES (11, 'SEDANG  S-1/SEDERAJAT');
INSERT INTO `penduduk_pendidikan` (`id`, `nama`) VALUES (12, 'SEDANG S-2/SEDERAJAT');
INSERT INTO `penduduk_pendidikan` (`id`, `nama`) VALUES (13, 'SEDANG S-3/SEDERAJAT');
INSERT INTO `penduduk_pendidikan` (`id`, `nama`) VALUES (14, 'SEDANG SLB A/SEDERAJAT');
INSERT INTO `penduduk_pendidikan` (`id`, `nama`) VALUES (15, 'SEDANG SLB B/SEDERAJAT');
INSERT INTO `penduduk_pendidikan` (`id`, `nama`) VALUES (16, 'SEDANG SLB C/SEDERAJAT');
INSERT INTO `penduduk_pendidikan` (`id`, `nama`) VALUES (17, 'TIDAK DAPAT MEMBACA DAN MENULIS HURUF LATIN/ARAB');
INSERT INTO `penduduk_pendidikan` (`id`, `nama`) VALUES (18, 'TIDAK SEDANG SEKOLAH');


#
# TABLE STRUCTURE FOR: penduduk_pendidikan_kk
#

CREATE TABLE `penduduk_pendidikan_kk` (
  `id` int(10) unsigned NOT NULL AUTO_INCREMENT,
  `nama` varchar(50) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=11 DEFAULT CHARSET=utf8 ROW_FORMAT=DYNAMIC;

INSERT INTO `penduduk_pendidikan_kk` (`id`, `nama`) VALUES (1, 'TIDAK / BELUM SEKOLAH');
INSERT INTO `penduduk_pendidikan_kk` (`id`, `nama`) VALUES (2, 'BELUM TAMAT SD/SEDERAJAT');
INSERT INTO `penduduk_pendidikan_kk` (`id`, `nama`) VALUES (3, 'TAMAT SD / SEDERAJAT');
INSERT INTO `penduduk_pendidikan_kk` (`id`, `nama`) VALUES (4, 'SLTP/SEDERAJAT');
INSERT INTO `penduduk_pendidikan_kk` (`id`, `nama`) VALUES (5, 'SLTA / SEDERAJAT');
INSERT INTO `penduduk_pendidikan_kk` (`id`, `nama`) VALUES (6, 'DIPLOMA I / II');
INSERT INTO `penduduk_pendidikan_kk` (`id`, `nama`) VALUES (7, 'AKADEMI/ DIPLOMA III/S. MUDA');
INSERT INTO `penduduk_pendidikan_kk` (`id`, `nama`) VALUES (8, 'DIPLOMA IV/ STRATA I');
INSERT INTO `penduduk_pendidikan_kk` (`id`, `nama`) VALUES (9, 'STRATA II');
INSERT INTO `penduduk_pendidikan_kk` (`id`, `nama`) VALUES (10, 'STRATA III');


#
# TABLE STRUCTURE FOR: penduduk_status
#

CREATE TABLE `penduduk_status` (
  `id` int(10) unsigned NOT NULL AUTO_INCREMENT,
  `nama` varchar(50) DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=3 DEFAULT CHARSET=utf8;

INSERT INTO `penduduk_status` (`id`, `nama`) VALUES (1, 'TETAP');
INSERT INTO `penduduk_status` (`id`, `nama`) VALUES (2, 'TIDAK TETAP');


#
# TABLE STRUCTURE FOR: penduduk_suku
#

CREATE TABLE `penduduk_suku` (
  `id` int(65) unsigned NOT NULL AUTO_INCREMENT,
  `suku` varchar(100) NOT NULL,
  `deskripsi` text NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=164 DEFAULT CHARSET=utf8;

INSERT INTO `penduduk_suku` (`id`, `suku`, `deskripsi`) VALUES (1, 'Aceh', 'Aceh');
INSERT INTO `penduduk_suku` (`id`, `suku`, `deskripsi`) VALUES (2, 'Alas', 'Aceh');
INSERT INTO `penduduk_suku` (`id`, `suku`, `deskripsi`) VALUES (3, 'Alor', 'NTT');
INSERT INTO `penduduk_suku` (`id`, `suku`, `deskripsi`) VALUES (4, 'Ambon', 'Ambon');
INSERT INTO `penduduk_suku` (`id`, `suku`, `deskripsi`) VALUES (5, 'Ampana', 'Sulawesi Tengah');
INSERT INTO `penduduk_suku` (`id`, `suku`, `deskripsi`) VALUES (6, 'Anak Dalam', 'Jambi');
INSERT INTO `penduduk_suku` (`id`, `suku`, `deskripsi`) VALUES (7, 'Aneuk Jamee', 'Aceh');
INSERT INTO `penduduk_suku` (`id`, `suku`, `deskripsi`) VALUES (8, 'Arab: Orang Hadhrami', 'Arab: Orang Hadhrami');
INSERT INTO `penduduk_suku` (`id`, `suku`, `deskripsi`) VALUES (9, 'Aru', 'Maluku');
INSERT INTO `penduduk_suku` (`id`, `suku`, `deskripsi`) VALUES (10, 'Asmat', 'Papua');
INSERT INTO `penduduk_suku` (`id`, `suku`, `deskripsi`) VALUES (11, 'Bare’e', 'Bare’e di Kabupaten Tojo Una-Una Tojo dan Tojo Barat');
INSERT INTO `penduduk_suku` (`id`, `suku`, `deskripsi`) VALUES (12, 'Banten', 'Banten di Banten');
INSERT INTO `penduduk_suku` (`id`, `suku`, `deskripsi`) VALUES (13, 'Besemah', 'Besemah di Sumatera Selatan');
INSERT INTO `penduduk_suku` (`id`, `suku`, `deskripsi`) VALUES (14, 'Bali', 'Bali di Bali terdiri dari: Suku Bali Majapahit di sebagian besar Pulau Bali; Suku Bali Aga di Karangasem dan Kintamani');
INSERT INTO `penduduk_suku` (`id`, `suku`, `deskripsi`) VALUES (15, 'Balantak', 'Balantak di Sulawesi Tengah');
INSERT INTO `penduduk_suku` (`id`, `suku`, `deskripsi`) VALUES (16, 'Banggai', 'Banggai di Sulawesi Tengah (Kabupaten Banggai Kepulauan)');
INSERT INTO `penduduk_suku` (`id`, `suku`, `deskripsi`) VALUES (17, 'Baduy', 'Baduy di Banten');
INSERT INTO `penduduk_suku` (`id`, `suku`, `deskripsi`) VALUES (18, 'Bajau', 'Bajau di Kalimantan Timur');
INSERT INTO `penduduk_suku` (`id`, `suku`, `deskripsi`) VALUES (19, 'Banjar', 'Banjar di Kalimantan Selatan');
INSERT INTO `penduduk_suku` (`id`, `suku`, `deskripsi`) VALUES (20, 'Batak', 'Sumatera Utara');
INSERT INTO `penduduk_suku` (`id`, `suku`, `deskripsi`) VALUES (21, 'Batak Karo', 'Sumatera Utara');
INSERT INTO `penduduk_suku` (`id`, `suku`, `deskripsi`) VALUES (22, 'Mandailing', 'Sumatera Utara');
INSERT INTO `penduduk_suku` (`id`, `suku`, `deskripsi`) VALUES (23, 'Angkola', 'Sumatera Utara');
INSERT INTO `penduduk_suku` (`id`, `suku`, `deskripsi`) VALUES (24, 'Toba', 'Sumatera Utara');
INSERT INTO `penduduk_suku` (`id`, `suku`, `deskripsi`) VALUES (25, 'Pakpak', 'Sumatera Utara');
INSERT INTO `penduduk_suku` (`id`, `suku`, `deskripsi`) VALUES (26, 'Simalungun', 'Sumatera Utara');
INSERT INTO `penduduk_suku` (`id`, `suku`, `deskripsi`) VALUES (27, 'Batin', 'Batin di Jambi');
INSERT INTO `penduduk_suku` (`id`, `suku`, `deskripsi`) VALUES (28, 'Bawean', 'Bawean di Jawa Timur (Gresik)');
INSERT INTO `penduduk_suku` (`id`, `suku`, `deskripsi`) VALUES (29, 'Bentong', 'Bentong di Sulawesi Selatan');
INSERT INTO `penduduk_suku` (`id`, `suku`, `deskripsi`) VALUES (30, 'Berau', 'Berau di Kalimantan Timur (kabupaten Berau)');
INSERT INTO `penduduk_suku` (`id`, `suku`, `deskripsi`) VALUES (31, 'Betawi', 'Betawi di Jakarta');
INSERT INTO `penduduk_suku` (`id`, `suku`, `deskripsi`) VALUES (32, 'Bima', 'Bima NTB (kota Bima)');
INSERT INTO `penduduk_suku` (`id`, `suku`, `deskripsi`) VALUES (33, 'Boti', 'Boti di kabupaten Timor Tengah Selatan');
INSERT INTO `penduduk_suku` (`id`, `suku`, `deskripsi`) VALUES (34, 'Bolang Mongondow', 'Bolang Mongondow di Sulawesi Utara (Kabupaten Bolaang Mongondow)');
INSERT INTO `penduduk_suku` (`id`, `suku`, `deskripsi`) VALUES (35, 'Bugis', 'Bugis di Sulawesi Selatan: Orang Bugis Pagatan di Kalimantan Selatan, Kusan Hilir, Tanah Bumbu');
INSERT INTO `penduduk_suku` (`id`, `suku`, `deskripsi`) VALUES (36, 'Bungku', 'Bungku di Sulawesi Tengah (Kabupaten Morowali)');
INSERT INTO `penduduk_suku` (`id`, `suku`, `deskripsi`) VALUES (37, 'Buru', 'Buru di Maluku (Kabupaten Buru)');
INSERT INTO `penduduk_suku` (`id`, `suku`, `deskripsi`) VALUES (38, 'Buol', 'Buol di Sulawesi Tengah (Kabupaten Buol)');
INSERT INTO `penduduk_suku` (`id`, `suku`, `deskripsi`) VALUES (39, 'Bulungan ', 'Bulungan di Kalimantan Timur (Kabupaten Bulungan)');
INSERT INTO `penduduk_suku` (`id`, `suku`, `deskripsi`) VALUES (40, 'Buton', 'Buton di Sulawesi Tenggara (Kabupaten Buton dan Kota Bau-Bau)');
INSERT INTO `penduduk_suku` (`id`, `suku`, `deskripsi`) VALUES (41, 'Bonai', 'Bonai di Riau (Kabupaten Rokan Hilir)');
INSERT INTO `penduduk_suku` (`id`, `suku`, `deskripsi`) VALUES (42, 'Cham ', 'Cham di Aceh');
INSERT INTO `penduduk_suku` (`id`, `suku`, `deskripsi`) VALUES (43, 'Cirebon ', 'Cirebon di Jawa Barat (Kota Cirebon)');
INSERT INTO `penduduk_suku` (`id`, `suku`, `deskripsi`) VALUES (44, 'Damal', 'Damal di Mimika');
INSERT INTO `penduduk_suku` (`id`, `suku`, `deskripsi`) VALUES (45, 'Dampeles', 'Dampeles di Sulawesi Tengah');
INSERT INTO `penduduk_suku` (`id`, `suku`, `deskripsi`) VALUES (46, 'Dani ', 'Dani di Papua (Lembah Baliem)');
INSERT INTO `penduduk_suku` (`id`, `suku`, `deskripsi`) VALUES (47, 'Dairi', 'Dairi di Sumatera Utara');
INSERT INTO `penduduk_suku` (`id`, `suku`, `deskripsi`) VALUES (48, 'Daya ', 'Daya di Sumatera Selatan');
INSERT INTO `penduduk_suku` (`id`, `suku`, `deskripsi`) VALUES (49, 'Dayak', 'Dayak terdiri dari: Suku Dayak Ahe di Kalimantan Barat; Suku Dayak Bajare di Kalimantan Barat; Suku Dayak Damea di Kalimantan Barat; Suku Dayak Banyadu di Kalimantan Barat; Suku Bakati di Kalimantan Barat; Suku Punan di Kalimantan Tengah; Suku Kanayatn di Kalimantan Barat; Suku Dayak Krio di Kalimantan Barat (Ketapang); Suku Dayak Sungai Laur di Kalimantan Barat (Ketapang); Suku Dayak Simpangh di Kalimantan Barat (Ketapang); Suku Iban di Kalimantan Barat; Suku Mualang di Kalimantan Barat (Sekada');
INSERT INTO `penduduk_suku` (`id`, `suku`, `deskripsi`) VALUES (50, 'Dompu', 'Dompu NTB (Kabupaten Dompu)');
INSERT INTO `penduduk_suku` (`id`, `suku`, `deskripsi`) VALUES (51, 'Donggo', 'Donggo, Bima');
INSERT INTO `penduduk_suku` (`id`, `suku`, `deskripsi`) VALUES (52, 'Dongga', 'Donggala di Sulawesi Tengah');
INSERT INTO `penduduk_suku` (`id`, `suku`, `deskripsi`) VALUES (53, 'Dondo ', 'Dondo di Sulawesi Tengah (Kabupaten Toli-Toli)');
INSERT INTO `penduduk_suku` (`id`, `suku`, `deskripsi`) VALUES (54, 'Duri', 'Duri Terletak di bagian utara Kabupaten Enrekang berbatasan dengan Kabupaten Tana Toraja, meliputi tiga kecamatan induk Anggeraja, Baraka, dan Alla di Sulawesi Selatan');
INSERT INTO `penduduk_suku` (`id`, `suku`, `deskripsi`) VALUES (55, 'Eropa ', 'Eropa (orang Indo, peranakan Eropa-Indonesia, atau etnik Mestizo)');
INSERT INTO `penduduk_suku` (`id`, `suku`, `deskripsi`) VALUES (56, 'Flores', 'Flores di NTT (Flores Timur)');
INSERT INTO `penduduk_suku` (`id`, `suku`, `deskripsi`) VALUES (57, 'Lamaholot', 'Lamaholot, Flores Timur, terdiri dari: Suku Wandan, di Solor Timur, Flores Timur; Suku Kaliha, di Solor Timur, Flores Timur; Suku Serang Gorang, di Solor Timur, Flores Timur; Suku Lamarobak, di Solor Timur, Flores Timur; Suku Atanuhan, di Solor Timur, Flores Timur; Suku Wotan, di Solor Timur, Flores Timur; Suku Kapitan Belen, di Solor Timur, Flores Timur');
INSERT INTO `penduduk_suku` (`id`, `suku`, `deskripsi`) VALUES (58, 'Gayo', 'Gayo di Aceh (Gayo Lues Aceh Tengah Bener Meriah Aceh Tenggara Aceh Timur Aceh Tamiang)');
INSERT INTO `penduduk_suku` (`id`, `suku`, `deskripsi`) VALUES (59, 'Gorontalo', 'Gorontalo di Gorontalo (Kota Gorontalo)');
INSERT INTO `penduduk_suku` (`id`, `suku`, `deskripsi`) VALUES (60, 'Gumai ', 'Gumai di Sumatera Selatan (Lahat)');
INSERT INTO `penduduk_suku` (`id`, `suku`, `deskripsi`) VALUES (61, 'India', 'India, terdiri dari: Suku Tamil di Aceh, Sumatera Utara, Sumatera Barat, dan DKI Jakarta; Suku Punjab di Sumatera Utara, DKI Jakarta, dan Jawa Timur; Suku Bengali di DKI Jakarta; Suku Gujarati di DKI Jakarta dan Jawa Tengah; Orang Sindhi di DKI Jakarta dan Jawa Timur; Orang Sikh di Sumatera Utara, DKI Jakarta, dan Jawa Timur');
INSERT INTO `penduduk_suku` (`id`, `suku`, `deskripsi`) VALUES (62, 'Jawa', 'Jawa di Jawa Tengah, Jawa Timur, DI Yogyakarta');
INSERT INTO `penduduk_suku` (`id`, `suku`, `deskripsi`) VALUES (63, 'Tengger', 'Tengger di Jawa Timur (Probolinggo, Pasuruan, dan Malang)');
INSERT INTO `penduduk_suku` (`id`, `suku`, `deskripsi`) VALUES (64, 'Osing ', 'Osing di Jawa Timur (Banyuwangi)');
INSERT INTO `penduduk_suku` (`id`, `suku`, `deskripsi`) VALUES (65, 'Samin ', 'Samin di Jawa Tengah (Purwodadi)');
INSERT INTO `penduduk_suku` (`id`, `suku`, `deskripsi`) VALUES (66, 'Bawean', 'Bawean di Jawa Timur (Pulau Bawean)');
INSERT INTO `penduduk_suku` (`id`, `suku`, `deskripsi`) VALUES (67, 'Jambi ', 'Jambi di Jambi (Kota Jambi)');
INSERT INTO `penduduk_suku` (`id`, `suku`, `deskripsi`) VALUES (68, 'Jepang', 'Jepang di DKI Jakarta, Jawa Timur, dan Bali');
INSERT INTO `penduduk_suku` (`id`, `suku`, `deskripsi`) VALUES (69, 'Kei', 'Kei di Maluku Tenggara (Kabupaten Maluku Tenggara dan Kota Tual)');
INSERT INTO `penduduk_suku` (`id`, `suku`, `deskripsi`) VALUES (70, 'Kaili ', 'Kaili di Sulawesi Tengah (Kota Palu)');
INSERT INTO `penduduk_suku` (`id`, `suku`, `deskripsi`) VALUES (71, 'Kampar', 'Kampar');
INSERT INTO `penduduk_suku` (`id`, `suku`, `deskripsi`) VALUES (72, 'Kaur ', 'Kaur di Bengkulu (Kabupaten Kaur)');
INSERT INTO `penduduk_suku` (`id`, `suku`, `deskripsi`) VALUES (73, 'Kayu Agung', 'Kayu Agung di Sumatera Selatan');
INSERT INTO `penduduk_suku` (`id`, `suku`, `deskripsi`) VALUES (74, 'Kerinci', 'Kerinci di Jambi (Kabupaten Kerinci)');
INSERT INTO `penduduk_suku` (`id`, `suku`, `deskripsi`) VALUES (75, 'Komering ', 'Komering di Sumatera Selatan (Kabupaten Ogan Komering Ilir, Baturaja)');
INSERT INTO `penduduk_suku` (`id`, `suku`, `deskripsi`) VALUES (76, 'Konjo Pegunungan', 'Konjo Pegunungan, Kabupaten Gowa, Sulawesi Selatan');
INSERT INTO `penduduk_suku` (`id`, `suku`, `deskripsi`) VALUES (77, 'Konjo Pesisir', 'Konjo Pesisir, Kabupaten Bulukumba, Sulawesi Selatan');
INSERT INTO `penduduk_suku` (`id`, `suku`, `deskripsi`) VALUES (78, 'Koto', 'Koto di Sumatera Barat');
INSERT INTO `penduduk_suku` (`id`, `suku`, `deskripsi`) VALUES (79, 'Kubu', 'Kubu di Jambi dan Sumatera Selatan');
INSERT INTO `penduduk_suku` (`id`, `suku`, `deskripsi`) VALUES (80, 'Kulawi', 'Kulawi di Sulawesi Tengah');
INSERT INTO `penduduk_suku` (`id`, `suku`, `deskripsi`) VALUES (81, 'Kutai ', 'Kutai di Kalimantan Timur (Kutai Kartanegara)');
INSERT INTO `penduduk_suku` (`id`, `suku`, `deskripsi`) VALUES (82, 'Kluet ', 'Kluet di Aceh (Aceh Selatan)');
INSERT INTO `penduduk_suku` (`id`, `suku`, `deskripsi`) VALUES (83, 'Korea ', 'Korea di DKI Jakarta');
INSERT INTO `penduduk_suku` (`id`, `suku`, `deskripsi`) VALUES (84, 'Krui', 'Krui di Lampung');
INSERT INTO `penduduk_suku` (`id`, `suku`, `deskripsi`) VALUES (85, 'Laut,', 'Laut, Kepulauan Riau');
INSERT INTO `penduduk_suku` (`id`, `suku`, `deskripsi`) VALUES (86, 'Lampung', 'Lampung, terdiri dari: Suku Sungkai di Lampung; Suku Abung di Lampung; Suku Way Kanan di Lampung, Sumatera Selatan dan Bengkulu; Suku Pubian di Lampung; Suku Tulang Bawang di Lampung; Suku Melinting di Lampung; Suku Peminggir Teluk di Lampung; Suku Ranau di Lampung, Sumatera Selatan dan Sumatera Utara; Suku Komering di Sumatera Selatan; Suku Cikoneng di Banten; Suku Merpas di Bengkulu; Suku Belalau di Lampung; Suku Smoung di Lampung; Suku Semaka di Lampung');
INSERT INTO `penduduk_suku` (`id`, `suku`, `deskripsi`) VALUES (87, 'Lematang ', 'Lematang di Sumatera Selatan');
INSERT INTO `penduduk_suku` (`id`, `suku`, `deskripsi`) VALUES (88, 'Lembak', 'Lembak, Kabupaten Rejang Lebong, Bengkulu');
INSERT INTO `penduduk_suku` (`id`, `suku`, `deskripsi`) VALUES (89, 'Lintang', 'Lintang, Sumatera Selatan');
INSERT INTO `penduduk_suku` (`id`, `suku`, `deskripsi`) VALUES (90, 'Lom', 'Lom, Bangka Belitung');
INSERT INTO `penduduk_suku` (`id`, `suku`, `deskripsi`) VALUES (91, 'Lore', 'Lore, Sulawesi Tengah');
INSERT INTO `penduduk_suku` (`id`, `suku`, `deskripsi`) VALUES (92, 'Lubu', 'Lubu, daerah perbatasan antara Provinsi Sumatera Utara dan Provinsi Sumatera Barat');
INSERT INTO `penduduk_suku` (`id`, `suku`, `deskripsi`) VALUES (93, 'Moronene', 'Moronene di Sulawesi Tenggara.');
INSERT INTO `penduduk_suku` (`id`, `suku`, `deskripsi`) VALUES (94, 'Madura', 'Madura di Jawa Timur (Pulau Madura, Kangean, wilayah Tapal Kuda)');
INSERT INTO `penduduk_suku` (`id`, `suku`, `deskripsi`) VALUES (95, 'Makassar', 'Makassar di Sulawesi Selatan: Kabupaten Gowa, Kabupaten Takalar, Kabupaten Jeneponto, Kabupaten Bantaeng, Kabupaten Bulukumba (sebagian), Kabupaten Sinjai (bagian perbatasan Kab Gowa), Kabupaten Maros (sebagian), Kabupaten Pangkep (sebagian), Kota Makassar');
INSERT INTO `penduduk_suku` (`id`, `suku`, `deskripsi`) VALUES (96, 'Mamasa', 'Mamasa (Toraja Barat) di Sulawesi Barat: Kabupaten Mamasa');
INSERT INTO `penduduk_suku` (`id`, `suku`, `deskripsi`) VALUES (97, 'Manda', 'Mandar Sulawesi Barat: Polewali Mandar');
INSERT INTO `penduduk_suku` (`id`, `suku`, `deskripsi`) VALUES (98, 'Melayu', 'Melayu, terdiri dari Suku Melayu Tamiang di Aceh (Aceh Tamiang); Suku Melayu Riau di Riau dan Kepulauan Riau; Suku Melayu Deli di Sumatera Utara; Suku Melayu Jambi di Jambi; Suku Melayu Bangka di Pulau Bangka; Suku Melayu Belitung di Pulau Belitung; Suku Melayu Sambas di Kalimantan Barat');
INSERT INTO `penduduk_suku` (`id`, `suku`, `deskripsi`) VALUES (99, 'Mentawai', 'Mentawai di Sumatera Barat (Kabupaten Kepulauan Mentawai)');
INSERT INTO `penduduk_suku` (`id`, `suku`, `deskripsi`) VALUES (100, 'Minahasa', 'Minahasa di Sulawesi Utara (Kabupaten Minahasa), terdiri 9 subetnik : Suku Babontehu; Suku Bantik; Suku Pasan Ratahan');
INSERT INTO `penduduk_suku` (`id`, `suku`, `deskripsi`) VALUES (101, 'Ponosakan', 'Ponosakan; Suku Tonsea; Suku Tontemboan; Suku Toulour; Suku Tonsawang; Suku Tombulu');
INSERT INTO `penduduk_suku` (`id`, `suku`, `deskripsi`) VALUES (102, 'Minangkabau', 'Minangkabau, Sumatera Barat');
INSERT INTO `penduduk_suku` (`id`, `suku`, `deskripsi`) VALUES (103, 'Mongondow', 'Mongondow, Sulawesi Utara');
INSERT INTO `penduduk_suku` (`id`, `suku`, `deskripsi`) VALUES (104, 'Mori', 'Mori, Kabupaten Morowali, Sulawesi Tengah');
INSERT INTO `penduduk_suku` (`id`, `suku`, `deskripsi`) VALUES (105, 'Muko-Muko', 'Muko-Muko di Bengkulu (Kabupaten Mukomuko)');
INSERT INTO `penduduk_suku` (`id`, `suku`, `deskripsi`) VALUES (106, 'Muna', 'Muna di Sulawesi Tenggara (Kabupaten Muna)');
INSERT INTO `penduduk_suku` (`id`, `suku`, `deskripsi`) VALUES (107, 'Muyu', 'Muyu di Kabupaten Boven Digoel, Papua');
INSERT INTO `penduduk_suku` (`id`, `suku`, `deskripsi`) VALUES (108, 'Mekongga', 'Mekongga di Sulawesi Tenggara (Kabupaten Kolaka dan Kabupaten Kolaka Utara)');
INSERT INTO `penduduk_suku` (`id`, `suku`, `deskripsi`) VALUES (109, 'Moro', 'Moro di Kalimantan Barat dan Kalimantan Utara');
INSERT INTO `penduduk_suku` (`id`, `suku`, `deskripsi`) VALUES (110, 'Nias', 'Nias di Sumatera Utara (Kabupaten Nias, Nias Selatan dan Nias Utara dari dua keturunan Jepang dan Vietnam)');
INSERT INTO `penduduk_suku` (`id`, `suku`, `deskripsi`) VALUES (111, 'Ngada ', 'Ngada di NTT: Kabupaten Ngada');
INSERT INTO `penduduk_suku` (`id`, `suku`, `deskripsi`) VALUES (112, 'Osing', 'Osing di Banyuwangi Jawa Timur');
INSERT INTO `penduduk_suku` (`id`, `suku`, `deskripsi`) VALUES (113, 'Ogan', 'Ogan di Sumatera Selatan');
INSERT INTO `penduduk_suku` (`id`, `suku`, `deskripsi`) VALUES (114, 'Ocu', 'Ocu di Kabupaten Kampar, Riau');
INSERT INTO `penduduk_suku` (`id`, `suku`, `deskripsi`) VALUES (115, 'Padoe', 'Padoe di Sulawesi Tengah dan Sulawesi Selatan');
INSERT INTO `penduduk_suku` (`id`, `suku`, `deskripsi`) VALUES (116, 'Papua', 'Papua / Irian, terdiri dari: Suku Asmat di Kabupaten Asmat; Suku Biak di Kabupaten Biak Numfor; Suku Dani, Lembah Baliem, Papua; Suku Ekagi, daerah Paniai, Abepura, Papua; Suku Amungme di Mimika; Suku Bauzi, Mamberamo hilir, Papua utara; Suku Arfak di Manokwari; Suku Kamoro di Mimika');
INSERT INTO `penduduk_suku` (`id`, `suku`, `deskripsi`) VALUES (117, 'Palembang', 'Palembang di Sumatera Selatan (Kota Palembang)');
INSERT INTO `penduduk_suku` (`id`, `suku`, `deskripsi`) VALUES (118, 'Pamona', 'Pamona di Sulawesi Tengah (Kabupaten Poso) dan di Sulawesi Selatan');
INSERT INTO `penduduk_suku` (`id`, `suku`, `deskripsi`) VALUES (119, 'Pesisi', 'Pesisi di Sumatera Utara (Tapanuli Tengah)');
INSERT INTO `penduduk_suku` (`id`, `suku`, `deskripsi`) VALUES (120, 'Pasir', 'Pasir di Kalimantan Timur (Kabupaten Pasir)');
INSERT INTO `penduduk_suku` (`id`, `suku`, `deskripsi`) VALUES (121, 'Pubian', 'Pubian di Lampung');
INSERT INTO `penduduk_suku` (`id`, `suku`, `deskripsi`) VALUES (122, 'Pattae', 'Pattae di Polewali Mandar');
INSERT INTO `penduduk_suku` (`id`, `suku`, `deskripsi`) VALUES (123, 'Pakistani', 'Pakistani di Sumatera Utara, DKI Jakarta, dan Jawa Tengah');
INSERT INTO `penduduk_suku` (`id`, `suku`, `deskripsi`) VALUES (124, 'Peranakan', 'Peranakan (Tionghoa-Peranakan atau Baba Nyonya)');
INSERT INTO `penduduk_suku` (`id`, `suku`, `deskripsi`) VALUES (125, 'Rawa', 'Rawa, Rokan Hilir, Riau');
INSERT INTO `penduduk_suku` (`id`, `suku`, `deskripsi`) VALUES (126, 'Rejang', 'Rejang di Bengkulu (Kabupaten Bengkulu Tengah, Kabupaten Bengkulu Utara, Kabupaten Kepahiang, Kabupaten Lebong, dan Kabupaten Rejang Lebong)');
INSERT INTO `penduduk_suku` (`id`, `suku`, `deskripsi`) VALUES (127, 'Rote', 'Rote di NTT (Kabupaten Rote Ndao)');
INSERT INTO `penduduk_suku` (`id`, `suku`, `deskripsi`) VALUES (128, 'Rongga', 'Rongga di NTT Kabupaten Manggarai Timur');
INSERT INTO `penduduk_suku` (`id`, `suku`, `deskripsi`) VALUES (129, 'Rohingya', 'Rohingya');
INSERT INTO `penduduk_suku` (`id`, `suku`, `deskripsi`) VALUES (130, 'Sabu', 'Sabu di Pulau Sabu, NTT');
INSERT INTO `penduduk_suku` (`id`, `suku`, `deskripsi`) VALUES (131, 'Saluan', 'Saluan di Sulawesi Tengah');
INSERT INTO `penduduk_suku` (`id`, `suku`, `deskripsi`) VALUES (132, 'Sambas', 'Sambas (Melayu Sambas) di Kalimantan Barat: Kabupaten Sambas');
INSERT INTO `penduduk_suku` (`id`, `suku`, `deskripsi`) VALUES (133, 'Samin', 'Samin di Jawa Tengah (Blora) dan Jawa Timur (Bojonegoro)');
INSERT INTO `penduduk_suku` (`id`, `suku`, `deskripsi`) VALUES (134, 'Sangihe', 'Sangir di Sulawesi Utara (Kepulauan Sangihe)');
INSERT INTO `penduduk_suku` (`id`, `suku`, `deskripsi`) VALUES (135, 'Sasak', 'Sasak di NTB, Lombok');
INSERT INTO `penduduk_suku` (`id`, `suku`, `deskripsi`) VALUES (136, 'Sekak Bangka', 'Sekak Bangka');
INSERT INTO `penduduk_suku` (`id`, `suku`, `deskripsi`) VALUES (137, 'Sekayu', 'Sekayu di Sumatera Selatan');
INSERT INTO `penduduk_suku` (`id`, `suku`, `deskripsi`) VALUES (138, 'Semendo ', 'Semendo di Bengkulu, Sumatera Selatan (Muara Enim)');
INSERT INTO `penduduk_suku` (`id`, `suku`, `deskripsi`) VALUES (139, 'Serawai ', 'Serawai di Bengkulu (Kabupaten Bengkulu Selatan dan Kabupaten Seluma)');
INSERT INTO `penduduk_suku` (`id`, `suku`, `deskripsi`) VALUES (140, 'Simeulue', 'Simeulue di Aceh (Kabupaten Simeulue)');
INSERT INTO `penduduk_suku` (`id`, `suku`, `deskripsi`) VALUES (141, 'Sigulai ', 'Sigulai di Aceh (Kabupaten Simeulue bagian utara');
INSERT INTO `penduduk_suku` (`id`, `suku`, `deskripsi`) VALUES (142, 'Suluk', 'Suluk di Kalimantan Utara)');
INSERT INTO `penduduk_suku` (`id`, `suku`, `deskripsi`) VALUES (143, 'Sumbawa ', 'Sumbawa Di NTB (Kabupaten Sumbawa)');
INSERT INTO `penduduk_suku` (`id`, `suku`, `deskripsi`) VALUES (144, 'Sumba', 'Sumba di NTT (Sumba Barat, Sumba Timur)');
INSERT INTO `penduduk_suku` (`id`, `suku`, `deskripsi`) VALUES (145, 'Sunda', 'Sunda di Jawa Barat, Banten, DKI Jakarta, Lampung, Sumatra Selatan dan Jawa Tengah');
INSERT INTO `penduduk_suku` (`id`, `suku`, `deskripsi`) VALUES (146, 'Sungkai ', 'Sungkai di Lampung Lampung Utara');
INSERT INTO `penduduk_suku` (`id`, `suku`, `deskripsi`) VALUES (147, 'Talau', 'Talaud di Sulawesi Utara (Kepulauan Talaud)');
INSERT INTO `penduduk_suku` (`id`, `suku`, `deskripsi`) VALUES (148, 'Talang Mamak', 'Talang Mamak di Riau (Indragiri Hulu)');
INSERT INTO `penduduk_suku` (`id`, `suku`, `deskripsi`) VALUES (149, 'Tamiang ', 'Tamiang di Aceh (Kabupaten Aceh Tamiang)');
INSERT INTO `penduduk_suku` (`id`, `suku`, `deskripsi`) VALUES (150, 'Tengger ', 'Tengger di Jawa Timur (Kabupaten Pasuruan) dan Probolinggo (lereng G. Bromo)');
INSERT INTO `penduduk_suku` (`id`, `suku`, `deskripsi`) VALUES (151, 'Ternate ', 'Ternate di Maluku Utara (Kota Ternate)');
INSERT INTO `penduduk_suku` (`id`, `suku`, `deskripsi`) VALUES (152, 'Tidore', 'Tidore di Maluku Utara (Kota Tidore)');
INSERT INTO `penduduk_suku` (`id`, `suku`, `deskripsi`) VALUES (153, 'Tidung', 'Tidung di Kalimantan Timur (Kabupaten Tanah Tidung)');
INSERT INTO `penduduk_suku` (`id`, `suku`, `deskripsi`) VALUES (154, 'Timor', 'Timor di NTT, Kota Kupang');
INSERT INTO `penduduk_suku` (`id`, `suku`, `deskripsi`) VALUES (155, 'Tionghoa', 'Tionghoa, terdiri dari: Orang Cina Parit di Pelaihari, Tanah Laut, Kalsel; Orang Cina Benteng di Tangerang, Provinsi Banten; Orang Tionghoa Hokkien di Jawa dan Sumatera Utara; Orang Tionghoa Hakka di Belitung dan Kalimantan Barat; Orang Tionghoa Hubei; Orang Tionghoa Hainan; Orang Tionghoa Kanton; Orang Tionghoa Hokchia; Orang Tionghoa Tiochiu');
INSERT INTO `penduduk_suku` (`id`, `suku`, `deskripsi`) VALUES (156, 'Tojo', 'Tojo di Sulawesi Tengah (Kabupaten Tojo Una-Una)');
INSERT INTO `penduduk_suku` (`id`, `suku`, `deskripsi`) VALUES (157, 'Toraja', 'Toraja di Sulawesi Selatan (Tana Toraja)');
INSERT INTO `penduduk_suku` (`id`, `suku`, `deskripsi`) VALUES (158, 'Tolaki', 'Tolaki di Sulawesi Tenggara (Kendari)');
INSERT INTO `penduduk_suku` (`id`, `suku`, `deskripsi`) VALUES (159, 'Toli Toli', 'Toli Toli di Sulawesi Tengah (Kabupaten Toli-Toli)');
INSERT INTO `penduduk_suku` (`id`, `suku`, `deskripsi`) VALUES (160, 'Tomini', 'Tomini di Sulawesi Tengah (Kabupaten Parigi Mouton');
INSERT INTO `penduduk_suku` (`id`, `suku`, `deskripsi`) VALUES (161, 'Una-una ', 'Una-una di Sulawesi Tengah (Kabupaten Tojo Una-Una)');
INSERT INTO `penduduk_suku` (`id`, `suku`, `deskripsi`) VALUES (162, 'Ulu', 'Ulu di Sumatera Utara (Mandailing natal)');
INSERT INTO `penduduk_suku` (`id`, `suku`, `deskripsi`) VALUES (163, 'Wolio', 'Wolio di Sulawesi Tenggara (Buton)');


#
# TABLE STRUCTURE FOR: penduduk_warganegara
#

CREATE TABLE `penduduk_warganegara` (
  `id` int(10) unsigned NOT NULL AUTO_INCREMENT,
  `nama` varchar(25) DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=4 DEFAULT CHARSET=utf8;

INSERT INTO `penduduk_warganegara` (`id`, `nama`) VALUES (1, 'WNI');
INSERT INTO `penduduk_warganegara` (`id`, `nama`) VALUES (2, 'WNA');
INSERT INTO `penduduk_warganegara` (`id`, `nama`) VALUES (3, 'DUA KEWARGANEGARAAN');


#
# TABLE STRUCTURE FOR: perangkat_desa
#

CREATE TABLE `perangkat_desa` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `nama_pegawai` varchar(200) NOT NULL,
  `gelar` varchar(128) NOT NULL,
  `nik_pegawai` varchar(128) NOT NULL,
  `nip` varchar(128) NOT NULL,
  `tempat_lahir` varchar(128) NOT NULL,
  `tgl_lahir` varchar(128) NOT NULL,
  `jenis_kelamin` varchar(128) NOT NULL,
  `pendidikan` varchar(128) NOT NULL,
  `agama` varchar(128) NOT NULL,
  `pangkat_golongan` varchar(128) NOT NULL,
  `jabatan_pegawai` varchar(128) NOT NULL,
  `status` varchar(128) NOT NULL,
  `foto_pegawai` varchar(400) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=15 DEFAULT CHARSET=utf8mb4;

INSERT INTO `perangkat_desa` (`id`, `nama_pegawai`, `gelar`, `nik_pegawai`, `nip`, `tempat_lahir`, `tgl_lahir`, `jenis_kelamin`, `pendidikan`, `agama`, `pangkat_golongan`, `jabatan_pegawai`, `status`, `foto_pegawai`) VALUES (11, 'Glen Alvaro', 'S.Pd', '7110020402010002', '18208040', 'Buyat', '04-02-2001', '1', 'SLTA / SEDERAJAT', 'KRISTEN', 'IV', '1', '1', '18208040.png');
INSERT INTO `perangkat_desa` (`id`, `nama_pegawai`, `gelar`, `nik_pegawai`, `nip`, `tempat_lahir`, `tgl_lahir`, `jenis_kelamin`, `pendidikan`, `agama`, `pangkat_golongan`, `jabatan_pegawai`, `status`, `foto_pegawai`) VALUES (12, 'Hendrawan Igirisa', 'S.Pd', '7101102209000001', '-', 'Manado', '22-09-2000', '1', 'SLTA / SEDERAJAT', 'KRISTEN', 'III', '5', '1', '-.jpg');
INSERT INTO `perangkat_desa` (`id`, `nama_pegawai`, `gelar`, `nik_pegawai`, `nip`, `tempat_lahir`, `tgl_lahir`, `jenis_kelamin`, `pendidikan`, `agama`, `pangkat_golongan`, `jabatan_pegawai`, `status`, `foto_pegawai`) VALUES (13, 'Avrilia Verlita Evelin Igirisa', 'S.Pd', '7101101604090002', '-', 'Dumooga', '16-04-2009', '2', 'SLTP/SEDERAJAT', 'KRISTEN', 'II', '6', '1', 'wuser.png');
INSERT INTO `perangkat_desa` (`id`, `nama_pegawai`, `gelar`, `nik_pegawai`, `nip`, `tempat_lahir`, `tgl_lahir`, `jenis_kelamin`, `pendidikan`, `agama`, `pangkat_golongan`, `jabatan_pegawai`, `status`, `foto_pegawai`) VALUES (14, 'Alvaro Morata', 'S.Kom', '7110020402010004', '-', 'Manado', '17-12-2002', '1', 'SLTA / SEDERAJAT', 'KRISTEN', 'III', '7', '1', '-1.jpg');


#
# TABLE STRUCTURE FOR: permohonan_surat
#

CREATE TABLE `permohonan_surat` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `id_pemohon` int(11) NOT NULL,
  `id_surat` int(11) NOT NULL,
  `id_status` int(11) NOT NULL,
  `keperluan` text NOT NULL,
  `keterangan` text,
  `no_hp_aktif` varchar(40) NOT NULL,
  `tgl_buat` varchar(128) NOT NULL,
  `pamong` varchar(128) DEFAULT NULL,
  `jabatan` varchar(128) DEFAULT NULL,
  `no_surat` varchar(128) DEFAULT NULL,
  `user` varchar(128) DEFAULT NULL,
  `file` varchar(300) DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

#
# TABLE STRUCTURE FOR: peserta_bantuan
#

CREATE TABLE `peserta_bantuan` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `id_program` int(11) NOT NULL,
  `id_anggota` int(11) NOT NULL,
  `id_sasaran` int(11) NOT NULL,
  `no_kartu` varchar(128) NOT NULL,
  `nik_peserta` varchar(128) NOT NULL,
  `nama_peserta` varchar(128) NOT NULL,
  `tmp_lahir` varchar(128) NOT NULL,
  `tgl_lahir` varchar(128) NOT NULL,
  `jk` varchar(128) NOT NULL,
  `alamat_peserta` varchar(128) NOT NULL,
  `keterangan` varchar(128) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=13 DEFAULT CHARSET=utf8;

INSERT INTO `peserta_bantuan` (`id`, `id_program`, `id_anggota`, `id_sasaran`, `no_kartu`, `nik_peserta`, `nama_peserta`, `tmp_lahir`, `tgl_lahir`, `jk`, `alamat_peserta`, `keterangan`) VALUES (3, 9, 22, 2, '54321', '7110020302530002', 'Hans Lahope', 'Buyat', '03-02-1953', 'LAKI-LAKI', 'Dusun 1', 'HIDUP');
INSERT INTO `peserta_bantuan` (`id`, `id_program`, `id_anggota`, `id_sasaran`, `no_kartu`, `nik_peserta`, `nama_peserta`, `tmp_lahir`, `tgl_lahir`, `jk`, `alamat_peserta`, `keterangan`) VALUES (7, 8, 15, 1, '123456', '7101101604090002', 'Avrilia Verlita Evelin Igirisa', 'Dumooga 1', '16-04-2009', 'PEREMPUAN', 'Dusun 2', 'HIDUP');
INSERT INTO `peserta_bantuan` (`id`, `id_program`, `id_anggota`, `id_sasaran`, `no_kartu`, `nik_peserta`, `nama_peserta`, `tmp_lahir`, `tgl_lahir`, `jk`, `alamat_peserta`, `keterangan`) VALUES (8, 10, 13, 3, '111', '7110020402010002', 'GLENDY RONGKO', 'Buyat', '04-02-2001', 'LAKI-LAKI', 'Dusun 1', 'HIDUP');
INSERT INTO `peserta_bantuan` (`id`, `id_program`, `id_anggota`, `id_sasaran`, `no_kartu`, `nik_peserta`, `nama_peserta`, `tmp_lahir`, `tgl_lahir`, `jk`, `alamat_peserta`, `keterangan`) VALUES (9, 8, 10, 1, '11111', '7110020402010002', 'GLENDY RONGKO', 'Buyat', '04-02-2001', 'LAKI-LAKI', 'Dusun 1', 'HIDUP');
INSERT INTO `peserta_bantuan` (`id`, `id_program`, `id_anggota`, `id_sasaran`, `no_kartu`, `nik_peserta`, `nama_peserta`, `tmp_lahir`, `tgl_lahir`, `jk`, `alamat_peserta`, `keterangan`) VALUES (10, 6, 10, 1, '12321', '7110020402010002', 'GLENDY RONGKO', 'Buyat', '04-02-2001', 'LAKI-LAKI', 'Dusun 2', 'HIDUP');
INSERT INTO `peserta_bantuan` (`id`, `id_program`, `id_anggota`, `id_sasaran`, `no_kartu`, `nik_peserta`, `nama_peserta`, `tmp_lahir`, `tgl_lahir`, `jk`, `alamat_peserta`, `keterangan`) VALUES (12, 11, 13, 3, '111111', '7110020402010002', 'GLENDY RONGKO', 'Buyat', '04-02-2001', 'LAKI-LAKI', 'Dusun 1', 'HIDUP');


#
# TABLE STRUCTURE FOR: program_bantuan
#

CREATE TABLE `program_bantuan` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `nama_program` varchar(128) NOT NULL,
  `sasaran_program` varchar(128) NOT NULL,
  `keterangan` text NOT NULL,
  `asal_dana` varchar(128) NOT NULL,
  `sdate` varchar(100) NOT NULL,
  `edate` varchar(100) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=13 DEFAULT CHARSET=utf8;

INSERT INTO `program_bantuan` (`id`, `nama_program`, `sasaran_program`, `keterangan`, `asal_dana`, `sdate`, `edate`) VALUES (6, 'Bibit Jagung', '1', 'Bantuan berupa tanaman untuk petani desa yang di sposori oleh pemerintah kabupaten untuk mensejahterakhan petani khusunya petani kelapa dan cengkeh', 'Kab/Kota', '2024-06-09', '2024-06-11');
INSERT INTO `program_bantuan` (`id`, `nama_program`, `sasaran_program`, `keterangan`, `asal_dana`, `sdate`, `edate`) VALUES (8, 'JAMKESMAS', '1', 'jamkesmas ( akronim dari Jaminan Kesehatan Masyarakat ) adalah sebuah program jaminan kesehatan untuk warga Indonesia yang memberikan perlindungan sosial dibidang kesehatan untuk menjamin masyarakat miskin dan tidak mampu yang iurannya dibayar oleh pemerintah agar kebutuhan dasar kesehatannya yang layak dapat terpenuhi.Program ini dijalankan oleh Departemen Kesehatan sejak 2008.', 'Pusat', '2024-06-09', '2024-06-15');
INSERT INTO `program_bantuan` (`id`, `nama_program`, `sasaran_program`, `keterangan`, `asal_dana`, `sdate`, `edate`) VALUES (9, 'PKH', '2', 'Program Keluarga Harapan yang selanjutnya disebut PKH adalah program pemberian bantuan sosial bersyarat kepada Keluarga Miskin (KM) yang ditetapkan sebagai keluarga penerima manfaat PKH. Sebagai sebuah program bantuan sosial bersyarat, PKH membuka akses keluarga miskin terutama ibu hamil dan anak untuk memanfaatkan berbagai fasilitas layanan kesehatan (faskes) dan fasilitas layanan pendidikan (fasdik) yang tersedia di sekitar mereka.', 'Pusat', '2024-06-10', '2024-06-13');
INSERT INTO `program_bantuan` (`id`, `nama_program`, `sasaran_program`, `keterangan`, `asal_dana`, `sdate`, `edate`) VALUES (10, 'PUPUK', '3', 'Bantuan pupuk kepada kelompok tani adalah salah satu bentuk dukungan yang diberikan oleh pemerintah atau lembaga terkait kepada kelompok tani untuk mendukung kegiatan pertanian dan peningkatan produksi hasil pertanian. Bantuan pupuk ini bertujuan untuk membantu kelompok tani dalam memenuhi kebutuhan pupuk yang diperlukan dalam usaha pertanian mereka.', 'Provinsi', '2024-06-09', '2024-06-15');
INSERT INTO `program_bantuan` (`id`, `nama_program`, `sasaran_program`, `keterangan`, `asal_dana`, `sdate`, `edate`) VALUES (11, 'Pestisida', '3', 'Pestisida atau racun hama adalah bahan yang digunakan untuk mengendalikan, menolak, atau membasmi organisme pengganggu.', 'Provinsi', '2024-06-25', '2024-06-25');
INSERT INTO `program_bantuan` (`id`, `nama_program`, `sasaran_program`, `keterangan`, `asal_dana`, `sdate`, `edate`) VALUES (12, 'BLT', '2', 'Bantuan Langsung Tunai atau disingkat BLT adalah program bantuan pemerintah berjenis pemberian uang tunai atau beragam bantuan lainnya, baik bersyarat maupun tak bersyarat untuk masyarakat miskin.', 'Pusat', '2024-06-25', '2024-06-25');


#
# TABLE STRUCTURE FOR: sambutan_kepala
#

CREATE TABLE `sambutan_kepala` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `isi_sambutan` text NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=2 DEFAULT CHARSET=utf8;

INSERT INTO `sambutan_kepala` (`id`, `isi_sambutan`) VALUES (1, '<p style=\"margin-bottom: 1.25rem; padding: 0px; border: 0px; font-variant-numeric: inherit; font-variant-east-asian: inherit; font-stretch: inherit; line-height: inherit; vertical-align: baseline;\"><span style=\"font-family: Rubik; font-size: 14px;\">﻿</span><span style=\"font-family: Rubik; font-size: 14px;\">﻿</span><span style=\"font-size: 14px;\">Puji syukur, alhamdulillah kami panjatkan ke hadirat Allah SWT atas limpahan rahmat, bimbingan serta karunia-Nya sehingga Website Desa Lalang Sembawa dapat hadir dihadapan masyarakat luas, khususnya warga Desa Lalang Sembawa Kecamatan Sembawa Kabupaten Banyuasin.</span></p><p style=\"margin-bottom: 1.25rem; padding: 0px; border: 0px; font-variant-numeric: inherit; font-variant-east-asian: inherit; font-stretch: inherit; line-height: inherit; vertical-align: baseline;\"><span style=\"font-size: 14px;\">Website ini dibuat dan dikembangkan dalam rangka memenuhi tuntutan era globalisasi sehingga keberadaan Desa LLalang Sembawa dengan segala informasinya dapat diketahui oleh masyarakat luas, dan sebagai sarana komunikasi antara seluruh komponen dan stakeholder yang ada di Desa Lalang Sembawa, untuk kemajuan Desa.</span></p>');


#
# TABLE STRUCTURE FOR: setting
#

CREATE TABLE `setting` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `title_admin` varchar(200) NOT NULL,
  `title_login` varchar(200) NOT NULL,
  `mode_perbaikan` varchar(100) NOT NULL,
  `sebutan_desa` varchar(100) NOT NULL,
  `sebutan_dusun` varchar(100) NOT NULL,
  `sebutan_kabupaten` varchar(128) NOT NULL,
  `tema_modul` varchar(100) NOT NULL,
  `artikel_page` varchar(100) NOT NULL,
  `vendor` varchar(200) NOT NULL,
  `cek_internet` varchar(100) NOT NULL,
  `jenis_peta` varchar(128) NOT NULL,
  `token_peta` varchar(300) DEFAULT NULL,
  `zoom_peta` int(11) NOT NULL,
  `icon_peta` varchar(200) NOT NULL,
  `latar_website` varchar(500) NOT NULL,
  `latar_login_admin` varchar(500) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=2 DEFAULT CHARSET=utf8;

INSERT INTO `setting` (`id`, `title_admin`, `title_login`, `mode_perbaikan`, `sebutan_desa`, `sebutan_dusun`, `sebutan_kabupaten`, `tema_modul`, `artikel_page`, `vendor`, `cek_internet`, `jenis_peta`, `token_peta`, `zoom_peta`, `icon_peta`, `latar_website`, `latar_login_admin`) VALUES (1, 'Sistem Informasi', 'Administrasi Kependudukan', 'Tidak', 'Kelurahan', 'Lingkungan', 'Kota', 'skin-purple-light', '4', 'PT Technologi Fintech Indonesia', 'Ya', 'leaflet', 'pk.eyJ1IjoiZ2xlbmFsdmFybzA5IiwiYSI6ImNseXpyajljbzJmcXAybHNneHEyanJieHkifQ.uTlRdIkxcUEHJQOLUkJKeQ', 12, 'gps.png', '33bb0de31e.JPG', '6dfce299f5.jpg');


#
# TABLE STRUCTURE FOR: setting_mandiri
#

CREATE TABLE `setting_mandiri` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `tampil_layanan` varchar(11) NOT NULL,
  `tampil_daftar` varchar(11) NOT NULL,
  `daftar_umkm` varchar(11) NOT NULL,
  `latar_mandiri` varchar(200) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=2 DEFAULT CHARSET=utf8;

INSERT INTO `setting_mandiri` (`id`, `tampil_layanan`, `tampil_daftar`, `daftar_umkm`, `latar_mandiri`) VALUES (1, 'Tidak', 'Ya', 'Tidak', 'ab89f06b8b.jpg');


#
# TABLE STRUCTURE FOR: setting_web
#

CREATE TABLE `setting_web` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `layout_gambar` int(11) NOT NULL,
  `tema_warna` varchar(128) NOT NULL,
  `teks_warna` varchar(200) NOT NULL,
  `tampil_statistik` int(11) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=2 DEFAULT CHARSET=utf8;

INSERT INTO `setting_web` (`id`, `layout_gambar`, `tema_warna`, `teks_warna`, `tampil_statistik`) VALUES (1, 1, '#a90003', 'rgba(216,28,43,0.6)', 1);


#
# TABLE STRUCTURE FOR: slider
#

CREATE TABLE `slider` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `nama` varchar(128) NOT NULL,
  `deskripsi` text,
  `gambar` varchar(400) NOT NULL,
  `status` int(11) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=5 DEFAULT CHARSET=utf8;

INSERT INTO `slider` (`id`, `nama`, `deskripsi`, `gambar`, `status`) VALUES (2, 'Marhaban 2025', 'Selamat menjalankan ibadah puasa', '3fb44f9165.jpg', 1);
INSERT INTO `slider` (`id`, `nama`, `deskripsi`, `gambar`, `status`) VALUES (3, 'Pesona Selat Lembeh 2025', 'Nantikan Di Bitung Mulai Tanggal 1 - 10 April 2025', 'abae4c734d.jpg', 1);
INSERT INTO `slider` (`id`, `nama`, `deskripsi`, `gambar`, `status`) VALUES (4, 'Selamat Datang', 'Website Resmi Kelurahan Tounsaru<br>Sumber informasi pemerintahan Kelurahan Tounsaru', '1e3a7e0f62.jpg', 1);


#
# TABLE STRUCTURE FOR: status_dasar
#

CREATE TABLE `status_dasar` (
  `id` int(10) unsigned NOT NULL AUTO_INCREMENT,
  `nama` varchar(50) DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=5 DEFAULT CHARSET=utf8;

INSERT INTO `status_dasar` (`id`, `nama`) VALUES (1, 'HIDUP');
INSERT INTO `status_dasar` (`id`, `nama`) VALUES (2, 'MATI');
INSERT INTO `status_dasar` (`id`, `nama`) VALUES (3, 'PINDAH');
INSERT INTO `status_dasar` (`id`, `nama`) VALUES (4, 'HILANG');


#
# TABLE STRUCTURE FOR: status_surat
#

CREATE TABLE `status_surat` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `nama` varchar(128) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=6 DEFAULT CHARSET=utf8;

INSERT INTO `status_surat` (`id`, `nama`) VALUES (1, 'Sedang diperiksa');
INSERT INTO `status_surat` (`id`, `nama`) VALUES (2, 'Menunggu ditandatangan');
INSERT INTO `status_surat` (`id`, `nama`) VALUES (3, 'Surat Ditolak');
INSERT INTO `status_surat` (`id`, `nama`) VALUES (4, 'Siap Diambil');
INSERT INTO `status_surat` (`id`, `nama`) VALUES (5, 'Sudah Diambil');


#
# TABLE STRUCTURE FOR: sub_menu_web
#

CREATE TABLE `sub_menu_web` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `id_menu` int(11) NOT NULL,
  `sub_nama` varchar(200) NOT NULL,
  `tipe_link` int(11) NOT NULL,
  `url` varchar(200) NOT NULL,
  `aktif` int(11) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=7 DEFAULT CHARSET=utf8;

INSERT INTO `sub_menu_web` (`id`, `id_menu`, `sub_nama`, `tipe_link`, `url`, `aktif`) VALUES (1, 1, 'Visi Misi', 1, 'artikel/3', 1);
INSERT INTO `sub_menu_web` (`id`, `id_menu`, `sub_nama`, `tipe_link`, `url`, `aktif`) VALUES (2, 1, 'Sejarah', 1, 'artikel/2', 1);
INSERT INTO `sub_menu_web` (`id`, `id_menu`, `sub_nama`, `tipe_link`, `url`, `aktif`) VALUES (3, 1, 'Struktur Pemerintahan', 5, 'struktur_organisasi', 1);
INSERT INTO `sub_menu_web` (`id`, `id_menu`, `sub_nama`, `tipe_link`, `url`, `aktif`) VALUES (4, 1, 'Peta', 5, 'peta', 1);
INSERT INTO `sub_menu_web` (`id`, `id_menu`, `sub_nama`, `tipe_link`, `url`, `aktif`) VALUES (5, 4, 'Lembaga Pemusyawaratan', 7, 'lembaga/1', 1);
INSERT INTO `sub_menu_web` (`id`, `id_menu`, `sub_nama`, `tipe_link`, `url`, `aktif`) VALUES (6, 4, 'PKK', 7, 'lembaga/2', 1);


#
# TABLE STRUCTURE FOR: sumber_dana
#

CREATE TABLE `sumber_dana` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `nama` varchar(128) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=8 DEFAULT CHARSET=utf8;

INSERT INTO `sumber_dana` (`id`, `nama`) VALUES (1, 'Pendapatan Asli Daerah');
INSERT INTO `sumber_dana` (`id`, `nama`) VALUES (2, 'Alokasi Anggaran Pendapatan dan Belanja Negara (Dana Desa)');
INSERT INTO `sumber_dana` (`id`, `nama`) VALUES (3, 'Bagian Hasil Pajak Daerah dan Retribusi Daerah Kabupaten/Kota');
INSERT INTO `sumber_dana` (`id`, `nama`) VALUES (4, 'Alokasi Dana Desa');
INSERT INTO `sumber_dana` (`id`, `nama`) VALUES (5, 'Bantuan Keuangan dari APBD Provinsi dan APBD Kabupaten/Kota');
INSERT INTO `sumber_dana` (`id`, `nama`) VALUES (6, 'Hibah dan Sumbangan yang Tidak Mengikat dari Pihak Ketiga');
INSERT INTO `sumber_dana` (`id`, `nama`) VALUES (7, 'Lain-lain Pendapatan Desa yang Sah');


#
# TABLE STRUCTURE FOR: surat_master
#

CREATE TABLE `surat_master` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `nama` varchar(128) NOT NULL,
  `url` varchar(128) NOT NULL,
  `active` int(11) NOT NULL,
  `tampil_surat` int(11) NOT NULL,
  `singkatan` varchar(128) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=20 DEFAULT CHARSET=utf8;

INSERT INTO `surat_master` (`id`, `nama`, `url`, `active`, `tampil_surat`, `singkatan`) VALUES (3, 'Keterangan Belum Pernah Menikah', 'surat_keterangan_belum_menikah', 1, 1, 'SKBPM');
INSERT INTO `surat_master` (`id`, `nama`, `url`, `active`, `tampil_surat`, `singkatan`) VALUES (4, 'Keterangan Domisili', 'surat_keterangan_domisili', 1, 1, 'SKDM');
INSERT INTO `surat_master` (`id`, `nama`, `url`, `active`, `tampil_surat`, `singkatan`) VALUES (5, 'Keterangan Tidak Mampu', 'surat_keterangan_tidak_mampu', 1, 1, 'SKTM');
INSERT INTO `surat_master` (`id`, `nama`, `url`, `active`, `tampil_surat`, `singkatan`) VALUES (6, 'Keterangan Berkelakuan Baik', 'surat_keterangan_berkelakuan_baik', 1, 1, 'SKBB');
INSERT INTO `surat_master` (`id`, `nama`, `url`, `active`, `tampil_surat`, `singkatan`) VALUES (7, 'Keterangan Menikah', 'surat_keterangan_menikah', 1, 0, 'SKM');
INSERT INTO `surat_master` (`id`, `nama`, `url`, `active`, `tampil_surat`, `singkatan`) VALUES (8, 'Keterangan Usaha', 'surat_keterangan_usaha', 1, 1, 'SKU');
INSERT INTO `surat_master` (`id`, `nama`, `url`, `active`, `tampil_surat`, `singkatan`) VALUES (9, 'Keterangan Cerai Mati', 'surat_keterangan_cerai_mati', 1, 0, 'SKCM');
INSERT INTO `surat_master` (`id`, `nama`, `url`, `active`, `tampil_surat`, `singkatan`) VALUES (10, 'Keterangan Belum Sekolah', 'surat_keterangan_belum_sekolah', 1, 1, 'SKBS');
INSERT INTO `surat_master` (`id`, `nama`, `url`, `active`, `tampil_surat`, `singkatan`) VALUES (11, 'Keterangan Batal Pindah', 'surat_keterangan_batal_pindah', 1, 1, 'SKBP');
INSERT INTO `surat_master` (`id`, `nama`, `url`, `active`, `tampil_surat`, `singkatan`) VALUES (12, 'Keterangan Belum Memiliki KTP', 'surat_keterangan_belum_memiliki_ktp', 1, 1, 'SKBMK');
INSERT INTO `surat_master` (`id`, `nama`, `url`, `active`, `tampil_surat`, `singkatan`) VALUES (13, 'Keterangan Beda Identitas', 'surat_keterangan_beda_identitas', 1, 0, 'SKBI');
INSERT INTO `surat_master` (`id`, `nama`, `url`, `active`, `tampil_surat`, `singkatan`) VALUES (14, 'Keterangan Kematian', 'surat_keterangan_kematian', 1, 0, 'SKK');
INSERT INTO `surat_master` (`id`, `nama`, `url`, `active`, `tampil_surat`, `singkatan`) VALUES (15, 'Keterangan Berpegian', 'surat_keterangan_berpegian', 1, 1, 'SKB');
INSERT INTO `surat_master` (`id`, `nama`, `url`, `active`, `tampil_surat`, `singkatan`) VALUES (16, 'Keterangan Jamkesos', 'surat_keterangan_jamkesos', 1, 1, 'SKJ');
INSERT INTO `surat_master` (`id`, `nama`, `url`, `active`, `tampil_surat`, `singkatan`) VALUES (17, 'Keterangan Jual Beli', 'surat_keterangan_jual_beli', 1, 0, 'SKJB');
INSERT INTO `surat_master` (`id`, `nama`, `url`, `active`, `tampil_surat`, `singkatan`) VALUES (18, 'Keterangan Kepemilikan Tanah', 'surat_keterangan_kepemilikan_tanah', 1, 1, 'SKKT');
INSERT INTO `surat_master` (`id`, `nama`, `url`, `active`, `tampil_surat`, `singkatan`) VALUES (19, 'Keterangan Penghasilan', 'surat_keterangan_penghasilan', 1, 1, 'SKP');


#
# TABLE STRUCTURE FOR: syarat_surat
#

CREATE TABLE `syarat_surat` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `id_surat` int(11) NOT NULL,
  `id_syarat` int(11) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=56 DEFAULT CHARSET=utf8;

INSERT INTO `syarat_surat` (`id`, `id_surat`, `id_syarat`) VALUES (34, 4, 3);
INSERT INTO `syarat_surat` (`id`, `id_surat`, `id_syarat`) VALUES (35, 4, 2);
INSERT INTO `syarat_surat` (`id`, `id_surat`, `id_syarat`) VALUES (36, 4, 1);
INSERT INTO `syarat_surat` (`id`, `id_surat`, `id_syarat`) VALUES (40, 18, 3);
INSERT INTO `syarat_surat` (`id`, `id_surat`, `id_syarat`) VALUES (41, 18, 2);
INSERT INTO `syarat_surat` (`id`, `id_surat`, `id_syarat`) VALUES (42, 18, 1);
INSERT INTO `syarat_surat` (`id`, `id_surat`, `id_syarat`) VALUES (43, 16, 3);
INSERT INTO `syarat_surat` (`id`, `id_surat`, `id_syarat`) VALUES (44, 17, 3);
INSERT INTO `syarat_surat` (`id`, `id_surat`, `id_syarat`) VALUES (45, 15, 3);
INSERT INTO `syarat_surat` (`id`, `id_surat`, `id_syarat`) VALUES (46, 15, 1);
INSERT INTO `syarat_surat` (`id`, `id_surat`, `id_syarat`) VALUES (47, 14, 3);
INSERT INTO `syarat_surat` (`id`, `id_surat`, `id_syarat`) VALUES (48, 14, 2);
INSERT INTO `syarat_surat` (`id`, `id_surat`, `id_syarat`) VALUES (49, 13, 3);
INSERT INTO `syarat_surat` (`id`, `id_surat`, `id_syarat`) VALUES (50, 13, 2);
INSERT INTO `syarat_surat` (`id`, `id_surat`, `id_syarat`) VALUES (53, 19, 13);
INSERT INTO `syarat_surat` (`id`, `id_surat`, `id_syarat`) VALUES (54, 19, 3);
INSERT INTO `syarat_surat` (`id`, `id_surat`, `id_syarat`) VALUES (55, 19, 2);


#
# TABLE STRUCTURE FOR: text_berjalan
#

CREATE TABLE `text_berjalan` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `isi` text NOT NULL,
  `tautan_artikel` varchar(200) DEFAULT NULL,
  `judul_tautan` varchar(128) DEFAULT NULL,
  `status` int(11) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=4 DEFAULT CHARSET=utf8;

INSERT INTO `text_berjalan` (`id`, `isi`, `tautan_artikel`, `judul_tautan`, `status`) VALUES (1, 'Selamat datang di website resmi kelurahan tounsaru', '', '', 1);
INSERT INTO `text_berjalan` (`id`, `isi`, `tautan_artikel`, `judul_tautan`, `status`) VALUES (2, 'Akses Link Ini', 'https://glenalvaro.blog.com', 'Klik Ini', 1);
INSERT INTO `text_berjalan` (`id`, `isi`, `tautan_artikel`, `judul_tautan`, `status`) VALUES (3, 'Contoh website informasi', '', '', 0);


#
# TABLE STRUCTURE FOR: tweb_penduduk_sex
#

CREATE TABLE `tweb_penduduk_sex` (
  `id` int(10) unsigned NOT NULL AUTO_INCREMENT,
  `nama` varchar(15) DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=3 DEFAULT CHARSET=utf8 ROW_FORMAT=DYNAMIC;

INSERT INTO `tweb_penduduk_sex` (`id`, `nama`) VALUES (1, 'LAKI-LAKI');
INSERT INTO `tweb_penduduk_sex` (`id`, `nama`) VALUES (2, 'PEREMPUAN');


#
# TABLE STRUCTURE FOR: umkm
#

CREATE TABLE `umkm` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `nik` varchar(128) NOT NULL,
  `no_tlp` varchar(128) NOT NULL,
  `alamat` varchar(128) NOT NULL,
  `harga_produk` varchar(128) NOT NULL,
  `satuan_produk` varchar(128) NOT NULL,
  `nama_usaha` varchar(200) NOT NULL,
  `id_kategori` varchar(128) NOT NULL,
  `deskripsi` text NOT NULL,
  `latitude` varchar(128) NOT NULL,
  `longitude` varchar(128) NOT NULL,
  `tgl_posting` varchar(128) NOT NULL,
  `gambar` varchar(300) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=6 DEFAULT CHARSET=utf8;

INSERT INTO `umkm` (`id`, `nik`, `no_tlp`, `alamat`, `harga_produk`, `satuan_produk`, `nama_usaha`, `id_kategori`, `deskripsi`, `latitude`, `longitude`, `tgl_posting`, `gambar`) VALUES (1, '7101102209000001', '08124298534', 'Ratatotok', '2.500', 'bungkus', 'Keripik Jagung', '4', 'Keripik jagung adalah keripik yang terbuat dari olahan jagung yang dibuat tipis kemudian digoreng hingga renyah dengan tambahan aneka bumbu. Biasanya rasanya adalah asin dengan aroma bawang yang gurih.', '0.8689165810511181', '124.70340728759767', '2024-10-02', 'c3ac9d66a5.jpg');
INSERT INTO `umkm` (`id`, `nik`, `no_tlp`, `alamat`, `harga_produk`, `satuan_produk`, `nama_usaha`, `id_kategori`, `deskripsi`, `latitude`, `longitude`, `tgl_posting`, `gambar`) VALUES (2, '7101105510790002', '087383456', 'Ratatotok', '1000', 'lembar', 'Fotocopy Komputer', '1', 'Fotokopi adalah salinan dokumen yang dibuat menggunakan mesin fotokopi dengan proses penyinaran. Kata fotokopi berasal dari kata \"foto\" dan \"kopi\", yang berarti cahaya dan salinan,', '0.8829911689285118', '124.70649719238283', '2024-10-02', '98875e6e49.jpg');
INSERT INTO `umkm` (`id`, `nik`, `no_tlp`, `alamat`, `harga_produk`, `satuan_produk`, `nama_usaha`, `id_kategori`, `deskripsi`, `latitude`, `longitude`, `tgl_posting`, `gambar`) VALUES (3, '7101100308050302', '08263839454', 'Basaan', '1.000.000', 'kg', 'Ternak Lele', '5', 'Ternak 1000 ekor ikan lele membutuhkan modal sebesar Rp1.200.000. Modal usaha ini termasuk biaya investasi pembuatan terpal. Berapa keuntungan ternak 1000 ekor ikan lele? Keuntungan ternak 1000 ekor ikan lele yaitu sebesar Rp2.250.000 untuk satu siklus panen ikan lele.', '0.8967224228288146', '124.7102737426758', '2024-10-02', '63e2e9770b.jpg');
INSERT INTO `umkm` (`id`, `nik`, `no_tlp`, `alamat`, `harga_produk`, `satuan_produk`, `nama_usaha`, `id_kategori`, `deskripsi`, `latitude`, `longitude`, `tgl_posting`, `gambar`) VALUES (4, '7110020402010002', '081242291179', 'Kotabunan', '1.000.000', 'paket', 'Developer Web', '1', 'Website adalah kumpulan halaman yang berisi informasi yang dapat diakses melalui internet. Informasi yang terdapat dalam website bisa berupa teks, gambar, video, animasi, dan suara.', '0.8181103215061231', '124.65499877929689', '2024-10-04', '50bf309c7d.jpg');
INSERT INTO `umkm` (`id`, `nik`, `no_tlp`, `alamat`, `harga_produk`, `satuan_produk`, `nama_usaha`, `id_kategori`, `deskripsi`, `latitude`, `longitude`, `tgl_posting`, `gambar`) VALUES (5, '7101102209000001', '08253647566', 'Lakban', '20.000', 'paket', 'Pisang Goreng', '4', 'Lorem ipsum, atau ringkasnya lipsum, adalah teks standar yang ditempatkan untuk mendemostrasikan elemen grafis atau presentasi visual seperti font, tipografi, dan tata letak.', '0.855871794226443', '124.72263336181642', '2024-10-04', '404-image-not-found.jpg');


#
# TABLE STRUCTURE FOR: user
#

CREATE TABLE `user` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `name` varchar(128) NOT NULL,
  `email` varchar(128) NOT NULL,
  `no_hp` varchar(17) NOT NULL,
  `alamat` varchar(100) NOT NULL,
  `image` varchar(128) NOT NULL,
  `password` varchar(256) NOT NULL,
  `role_id` int(11) NOT NULL,
  `is_active` int(1) NOT NULL,
  `date_created` int(11) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=3 DEFAULT CHARSET=utf8mb4;

INSERT INTO `user` (`id`, `name`, `email`, `no_hp`, `alamat`, `image`, `password`, `role_id`, `is_active`, `date_created`) VALUES (1, 'Administrator', 'admin@gmail.com', '081242291179', 'Tataaran 2, Lingkungan I', 'admin.png', '$2y$10$CxX9lhFJ4osja3wF92cIuu4d7CHPEBC2Kb8.XuTANWKk.cNbfdbNy', 1, 1, 1645368145);
INSERT INTO `user` (`id`, `name`, `email`, `no_hp`, `alamat`, `image`, `password`, `role_id`, `is_active`, `date_created`) VALUES (2, 'Operator Desa', 'operator@gmail.com', '081242291179', 'Manado', 'IMG_20240822_132453_(2).jpg', '$2y$10$pm2zAqta9D4kuWN8oIgdaOT6.qoTG74zntBCw6GJvL4VRWvtSRluK', 2, 1, 1741234428);


#
# TABLE STRUCTURE FOR: user_access_menu
#

CREATE TABLE `user_access_menu` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `role_id` int(11) NOT NULL,
  `menu_id` int(11) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=41 DEFAULT CHARSET=utf8mb4;

INSERT INTO `user_access_menu` (`id`, `role_id`, `menu_id`) VALUES (1, 1, 1);
INSERT INTO `user_access_menu` (`id`, `role_id`, `menu_id`) VALUES (3, 2, 2);
INSERT INTO `user_access_menu` (`id`, `role_id`, `menu_id`) VALUES (6, 1, 3);
INSERT INTO `user_access_menu` (`id`, `role_id`, `menu_id`) VALUES (10, 4, 2);
INSERT INTO `user_access_menu` (`id`, `role_id`, `menu_id`) VALUES (11, 4, 6);
INSERT INTO `user_access_menu` (`id`, `role_id`, `menu_id`) VALUES (12, 3, 6);
INSERT INTO `user_access_menu` (`id`, `role_id`, `menu_id`) VALUES (13, 1, 6);
INSERT INTO `user_access_menu` (`id`, `role_id`, `menu_id`) VALUES (14, 1, 7);
INSERT INTO `user_access_menu` (`id`, `role_id`, `menu_id`) VALUES (15, 1, 8);
INSERT INTO `user_access_menu` (`id`, `role_id`, `menu_id`) VALUES (16, 1, 9);
INSERT INTO `user_access_menu` (`id`, `role_id`, `menu_id`) VALUES (17, 6, 2);
INSERT INTO `user_access_menu` (`id`, `role_id`, `menu_id`) VALUES (19, 5, 2);
INSERT INTO `user_access_menu` (`id`, `role_id`, `menu_id`) VALUES (20, 5, 8);
INSERT INTO `user_access_menu` (`id`, `role_id`, `menu_id`) VALUES (21, 1, 10);
INSERT INTO `user_access_menu` (`id`, `role_id`, `menu_id`) VALUES (22, 9, 2);
INSERT INTO `user_access_menu` (`id`, `role_id`, `menu_id`) VALUES (23, 9, 9);
INSERT INTO `user_access_menu` (`id`, `role_id`, `menu_id`) VALUES (24, 6, 10);
INSERT INTO `user_access_menu` (`id`, `role_id`, `menu_id`) VALUES (25, 1, 11);
INSERT INTO `user_access_menu` (`id`, `role_id`, `menu_id`) VALUES (26, 7, 2);
INSERT INTO `user_access_menu` (`id`, `role_id`, `menu_id`) VALUES (29, 1, 12);
INSERT INTO `user_access_menu` (`id`, `role_id`, `menu_id`) VALUES (31, 8, 2);
INSERT INTO `user_access_menu` (`id`, `role_id`, `menu_id`) VALUES (33, 7, 12);
INSERT INTO `user_access_menu` (`id`, `role_id`, `menu_id`) VALUES (34, 8, 11);
INSERT INTO `user_access_menu` (`id`, `role_id`, `menu_id`) VALUES (35, 3, 2);
INSERT INTO `user_access_menu` (`id`, `role_id`, `menu_id`) VALUES (37, 1, 4);
INSERT INTO `user_access_menu` (`id`, `role_id`, `menu_id`) VALUES (38, 1, 5);
INSERT INTO `user_access_menu` (`id`, `role_id`, `menu_id`) VALUES (39, 2, 7);
INSERT INTO `user_access_menu` (`id`, `role_id`, `menu_id`) VALUES (40, 2, 8);


#
# TABLE STRUCTURE FOR: user_menu
#

CREATE TABLE `user_menu` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `menu` varchar(128) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=10 DEFAULT CHARSET=utf8mb4;

INSERT INTO `user_menu` (`id`, `menu`) VALUES (2, 'User');
INSERT INTO `user_menu` (`id`, `menu`) VALUES (3, 'Menu');
INSERT INTO `user_menu` (`id`, `menu`) VALUES (4, 'Manajemen Aplikasi');
INSERT INTO `user_menu` (`id`, `menu`) VALUES (5, 'Kependudukan');
INSERT INTO `user_menu` (`id`, `menu`) VALUES (6, 'Buku Administrasi Desa');
INSERT INTO `user_menu` (`id`, `menu`) VALUES (7, 'Layanan Surat');
INSERT INTO `user_menu` (`id`, `menu`) VALUES (8, 'Website');
INSERT INTO `user_menu` (`id`, `menu`) VALUES (9, 'Layanan Penduduk');


#
# TABLE STRUCTURE FOR: user_role
#

CREATE TABLE `user_role` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `role` varchar(128) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=4 DEFAULT CHARSET=utf8mb4;

INSERT INTO `user_role` (`id`, `role`) VALUES (1, 'Administrator');
INSERT INTO `user_role` (`id`, `role`) VALUES (2, 'Operator');
INSERT INTO `user_role` (`id`, `role`) VALUES (3, 'Redaksi');


#
# TABLE STRUCTURE FOR: user_sub_menu
#

CREATE TABLE `user_sub_menu` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `menu_id` int(11) NOT NULL,
  `title` varchar(128) NOT NULL,
  `url` varchar(128) NOT NULL,
  `icon` varchar(128) NOT NULL,
  `is_active` int(1) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=60 DEFAULT CHARSET=utf8mb4;

INSERT INTO `user_sub_menu` (`id`, `menu_id`, `title`, `url`, `icon`, `is_active`) VALUES (1, 1, 'Home', 'home', 'fa fa-home', 1);
INSERT INTO `user_sub_menu` (`id`, `menu_id`, `title`, `url`, `icon`, `is_active`) VALUES (2, 2, 'Profil', 'user', 'fa fa-user-circle', 1);
INSERT INTO `user_sub_menu` (`id`, `menu_id`, `title`, `url`, `icon`, `is_active`) VALUES (25, 3, 'Wilayah', 'wilayah_desa', 'fa fa-map-marker', 1);
INSERT INTO `user_sub_menu` (`id`, `menu_id`, `title`, `url`, `icon`, `is_active`) VALUES (26, 4, 'Modul', 'menu', 'fa fa-tags', 1);
INSERT INTO `user_sub_menu` (`id`, `menu_id`, `title`, `url`, `icon`, `is_active`) VALUES (27, 4, 'Pengguna', 'admin', 'fa fa-users', 1);
INSERT INTO `user_sub_menu` (`id`, `menu_id`, `title`, `url`, `icon`, `is_active`) VALUES (28, 4, 'Pengaturan', 'aplikasi', 'fa fa-gears', 1);
INSERT INTO `user_sub_menu` (`id`, `menu_id`, `title`, `url`, `icon`, `is_active`) VALUES (29, 4, 'Database', 'database', 'fa fa-database', 1);
INSERT INTO `user_sub_menu` (`id`, `menu_id`, `title`, `url`, `icon`, `is_active`) VALUES (31, 3, 'Informasi Desa', 'identitas_desa', 'fa fa-tv', 1);
INSERT INTO `user_sub_menu` (`id`, `menu_id`, `title`, `url`, `icon`, `is_active`) VALUES (32, 5, 'Penduduk', 'data_penduduk', 'fa fa-user-o', 1);
INSERT INTO `user_sub_menu` (`id`, `menu_id`, `title`, `url`, `icon`, `is_active`) VALUES (33, 5, 'Keluarga', 'data_keluarga', 'fa fa-users', 1);
INSERT INTO `user_sub_menu` (`id`, `menu_id`, `title`, `url`, `icon`, `is_active`) VALUES (34, 5, 'Kelompok', 'data_kelompok', 'fa fa-files-o', 1);
INSERT INTO `user_sub_menu` (`id`, `menu_id`, `title`, `url`, `icon`, `is_active`) VALUES (35, 3, 'Bantuan', 'program_bantuan', 'fa fa-glass', 1);
INSERT INTO `user_sub_menu` (`id`, `menu_id`, `title`, `url`, `icon`, `is_active`) VALUES (36, 6, 'Administrasi Umum', 'buku_surat_keluar', 'fa fa-bookmark', 1);
INSERT INTO `user_sub_menu` (`id`, `menu_id`, `title`, `url`, `icon`, `is_active`) VALUES (39, 6, 'Administrasi Penduduk', 'bumindes', 'fa fa-users', 1);
INSERT INTO `user_sub_menu` (`id`, `menu_id`, `title`, `url`, `icon`, `is_active`) VALUES (40, 3, 'Pembangunan', 'pembangunan', 'fa fa-university', 1);
INSERT INTO `user_sub_menu` (`id`, `menu_id`, `title`, `url`, `icon`, `is_active`) VALUES (41, 3, 'UMKM', 'umkm', 'fa fa-shopping-cart', 1);
INSERT INTO `user_sub_menu` (`id`, `menu_id`, `title`, `url`, `icon`, `is_active`) VALUES (42, 7, 'Persyaratan', 'persyaratan_surat', 'fa fa-book', 1);
INSERT INTO `user_sub_menu` (`id`, `menu_id`, `title`, `url`, `icon`, `is_active`) VALUES (43, 3, 'Statistik', 'statistik/kependudukan/1', 'fa fa-bar-chart-o', 1);
INSERT INTO `user_sub_menu` (`id`, `menu_id`, `title`, `url`, `icon`, `is_active`) VALUES (44, 8, 'Menu', 'menu_web', 'fa fa-list-ul', 1);
INSERT INTO `user_sub_menu` (`id`, `menu_id`, `title`, `url`, `icon`, `is_active`) VALUES (45, 8, 'Media Sosial', 'media_sosial', 'fa fa-facebook', 1);
INSERT INTO `user_sub_menu` (`id`, `menu_id`, `title`, `url`, `icon`, `is_active`) VALUES (46, 9, 'Pendaftar Layanan', 'layanan_penduduk', 'fa fa-laptop', 1);
INSERT INTO `user_sub_menu` (`id`, `menu_id`, `title`, `url`, `icon`, `is_active`) VALUES (47, 9, 'Pengaturan', 'setting_mandiri', 'fa fa-gear', 1);
INSERT INTO `user_sub_menu` (`id`, `menu_id`, `title`, `url`, `icon`, `is_active`) VALUES (48, 7, 'Cetak Surat', 'layanan_surat', 'fa fa-files-o', 1);
INSERT INTO `user_sub_menu` (`id`, `menu_id`, `title`, `url`, `icon`, `is_active`) VALUES (50, 7, 'Arsip', 'arsip_surat', 'fa fa-folder-open-o', 1);
INSERT INTO `user_sub_menu` (`id`, `menu_id`, `title`, `url`, `icon`, `is_active`) VALUES (51, 7, 'Permohonan', 'permohonan', 'fa fa-bookmark-o', 1);
INSERT INTO `user_sub_menu` (`id`, `menu_id`, `title`, `url`, `icon`, `is_active`) VALUES (52, 7, 'Pengaturan Surat', 'surat_master', 'fa fa-gear', 1);
INSERT INTO `user_sub_menu` (`id`, `menu_id`, `title`, `url`, `icon`, `is_active`) VALUES (53, 8, 'Galeri', 'galeri', 'fa fa-image', 1);
INSERT INTO `user_sub_menu` (`id`, `menu_id`, `title`, `url`, `icon`, `is_active`) VALUES (54, 6, 'Informasi Publik', 'informasi_publik', 'fa fa-feed', 1);
INSERT INTO `user_sub_menu` (`id`, `menu_id`, `title`, `url`, `icon`, `is_active`) VALUES (55, 8, 'Artikel', 'artikel', 'fa fa-files-o', 1);
INSERT INTO `user_sub_menu` (`id`, `menu_id`, `title`, `url`, `icon`, `is_active`) VALUES (56, 8, 'Lembaga', 'lembaga_masyarakat', 'fa fa-university', 1);
INSERT INTO `user_sub_menu` (`id`, `menu_id`, `title`, `url`, `icon`, `is_active`) VALUES (57, 8, 'Teks Berjalan', 'text_berjalan', 'fa fa-ellipsis-h', 1);
INSERT INTO `user_sub_menu` (`id`, `menu_id`, `title`, `url`, `icon`, `is_active`) VALUES (58, 8, 'Slider', 'slider', 'fa fa-sliders', 1);
INSERT INTO `user_sub_menu` (`id`, `menu_id`, `title`, `url`, `icon`, `is_active`) VALUES (59, 8, 'Pengaturan', 'setting_web', 'fa fa-gear', 1);


#
# TABLE STRUCTURE FOR: wilayah_desa
#

CREATE TABLE `wilayah_desa` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `nama_dusun` varchar(300) NOT NULL,
  `kepala_dusun` varchar(300) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=13 DEFAULT CHARSET=utf8;

INSERT INTO `wilayah_desa` (`id`, `nama_dusun`, `kepala_dusun`) VALUES (11, 'Dusun 2', 'Alvaro Morata');
INSERT INTO `wilayah_desa` (`id`, `nama_dusun`, `kepala_dusun`) VALUES (12, 'Dusun 1', 'Hendrawan Igirisa');


SET foreign_key_checks = 1;
