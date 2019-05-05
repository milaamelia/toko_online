# Host: localhost  (Version: 5.5.5-10.1.9-MariaDB)
# Date: 2019-05-05 21:03:49
# Generator: MySQL-Front 5.3  (Build 4.205)

/*!40101 SET NAMES latin1 */;

#
# Structure for table "tb_barang"
#

DROP TABLE IF EXISTS `tb_barang`;
CREATE TABLE `tb_barang` (
  `kode_barang` varchar(15) NOT NULL DEFAULT '',
  `nama_barang` varchar(50) DEFAULT NULL,
  `id_kategori` varchar(15) DEFAULT NULL,
  `berat` int(11) DEFAULT NULL,
  `Id` int(11) DEFAULT NULL,
  `kode_supplier` varchar(15) DEFAULT NULL,
  `harga_satuan` decimal(10,2) DEFAULT NULL,
  `harga_jual` decimal(10,2) DEFAULT NULL,
  PRIMARY KEY (`kode_barang`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

#
# Data for table "tb_barang"
#

INSERT INTO `tb_barang` VALUES ('B0001','Baju  Muslim','K0001',12,7,'S0006',34000.00,345000.00),('B0002','Jilbab','K0001',12,7,'S0006',25000.00,300000.00),('B0003','sayur','K0001',78,1,'S0006',67000.00,800000.00),('B0004','Dupa','K0002',12,1,'S0002',23000.00,45000.00),('B0005','Tas Sekolah','K0009',34,1,'S0003',34000.00,67000.00),('B0006','mukena','K0009',56,1,'S0003',100000.00,120000.00),('B0007','Dupa','K0007',78,1,'S0004',8000.00,8500.00),('B0008','uhhj','K0004',67,2,'S0001',67.00,67.00),('B0009','sqsas','K0011',23,2,'S0004',67000.00,78888.00);

#
# Structure for table "tb_barangmasuk"
#

DROP TABLE IF EXISTS `tb_barangmasuk`;
CREATE TABLE `tb_barangmasuk` (
  `no_faktur` varchar(15) NOT NULL DEFAULT '',
  `tgl_masuk` date DEFAULT NULL,
  `kode_barang` varchar(15) DEFAULT NULL,
  `kode_supplier` varchar(15) DEFAULT NULL,
  `jumlah` int(11) DEFAULT NULL,
  `harga` decimal(10,2) DEFAULT NULL,
  PRIMARY KEY (`no_faktur`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

#
# Data for table "tb_barangmasuk"
#

INSERT INTO `tb_barangmasuk` VALUES ('BM0001','2018-05-05','B0001','S0006',7,67000.00),('BM0002','2018-05-05','B0003','S0006',9,780000.00),('BM0003','2018-05-30','B0002','S0004',8,670000.00),('BM0004','2018-07-07','B0006','S0003',9,7800000.00),('BM0005','2018-07-10','B0006','S0003',9,780000.00),('BM0006','2018-09-24','B0004','S0005',8,67000.00);

#
# Structure for table "tb_detail_jual"
#

DROP TABLE IF EXISTS `tb_detail_jual`;
CREATE TABLE `tb_detail_jual` (
  `id_detail` int(11) NOT NULL AUTO_INCREMENT,
  `jual_id` int(11) DEFAULT NULL,
  `kode_barang` varchar(15) DEFAULT NULL,
  `qty` smallint(5) DEFAULT NULL,
  `harga_total` double(20,0) DEFAULT NULL,
  PRIMARY KEY (`id_detail`)
) ENGINE=InnoDB AUTO_INCREMENT=31 DEFAULT CHARSET=latin1;

#
# Data for table "tb_detail_jual"
#

INSERT INTO `tb_detail_jual` VALUES (19,24,'B0002',2,300000),(20,26,'B0002',2,300000),(21,27,'B0004',2,45000),(23,28,'B0001',2,345000),(24,29,'B0003',3,780000),(25,31,'B0006',45,120000),(26,31,'B0003',10,800000),(27,32,'B0005',2,67000),(28,33,'B0005',2,67000),(29,35,'B0005',2,67000),(30,36,'B0004',2,45000);

#
# Structure for table "tb_indetitas"
#

DROP TABLE IF EXISTS `tb_indetitas`;
CREATE TABLE `tb_indetitas` (
  `Id_indetitas` int(11) NOT NULL AUTO_INCREMENT,
  `nama_indetitas` varchar(25) DEFAULT NULL,
  `email` varchar(30) DEFAULT NULL,
  `alamat_indetitas` text,
  `tlp` varchar(14) DEFAULT NULL,
  `keterangan` varchar(25) DEFAULT NULL,
  `notifikasi` enum('true','false') DEFAULT NULL,
  PRIMARY KEY (`Id_indetitas`)
) ENGINE=InnoDB AUTO_INCREMENT=11 DEFAULT CHARSET=latin1;

#
# Data for table "tb_indetitas"
#

INSERT INTO `tb_indetitas` VALUES (2,'Ali Abidin','ali.bulp@gmail.com','','098976567','Meneger','false'),(6,'Mba Obi ','robiyatulmuflihah36@gmail.com','','098098908','admin','false'),(7,'mila','milaamelia.119@gmail.com','','0989786765651','admin','false'),(8,'Risky Pratama ','Pratamarizky407@gmail.com','','09897897987','jlhhhhh','false'),(9,'nunik','nunik.suroya@gmail.com','','988978968','Ya','false'),(10,'mila','milaamelia.119@gmail.com','ya','968768','sbga','true');

#
# Structure for table "tb_jual"
#

DROP TABLE IF EXISTS `tb_jual`;
CREATE TABLE `tb_jual` (
  `jual_id` int(11) unsigned NOT NULL AUTO_INCREMENT,
  `tgl_jual` date DEFAULT NULL,
  `kode_pelanggan` varchar(15) DEFAULT NULL,
  `total` int(11) DEFAULT NULL,
  PRIMARY KEY (`jual_id`)
) ENGINE=InnoDB AUTO_INCREMENT=37 DEFAULT CHARSET=latin1;

#
# Data for table "tb_jual"
#

INSERT INTO `tb_jual` VALUES (1,'2018-04-06','P0002',560000),(21,'2018-05-10','P0003',900000),(24,'2018-05-10','P0003',600000),(25,'2018-05-10','P0003',2340000),(26,'2018-05-11','P0003',600000),(27,'2018-05-12','P0003',90000),(28,'2018-05-12','P0002',900000),(29,'2018-05-16','P0002',2340000),(30,'2018-05-17','P0001',1725000),(31,'2018-05-29','P0002',5400000),(32,'2018-07-13','P0002',134000),(33,'2018-09-18','P0003',134000),(34,'2018-10-07','P0002',135000),(35,'2018-11-02','P0003',134000),(36,'2019-04-03','P0004',90000);

#
# Structure for table "tb_kategori"
#

DROP TABLE IF EXISTS `tb_kategori`;
CREATE TABLE `tb_kategori` (
  `id_kategori` varchar(15) NOT NULL DEFAULT '',
  `nama_kategori` varchar(30) DEFAULT NULL,
  PRIMARY KEY (`id_kategori`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

#
# Data for table "tb_kategori"
#

INSERT INTO `tb_kategori` VALUES ('K0001','AKSESSORIS ISLAM'),('K0002','AROMA THERAPY'),('K0004','BUKU ISLAM'),('K0005','BUKU NOVEL'),('K0006','BUKU KAMUS'),('K0007','HERBAL'),('K0008','QURAN PREMIUM'),('K0009','FASION'),('K0010','MABKHARA'),('K0011','ISLAMIC TOYS'),('K0012','hjh'),('K0013','www');

#
# Structure for table "tb_login"
#

DROP TABLE IF EXISTS `tb_login`;
CREATE TABLE `tb_login` (
  `idlogin` int(11) NOT NULL AUTO_INCREMENT,
  `username` varchar(25) DEFAULT NULL,
  `password` varchar(25) DEFAULT NULL,
  `level` varchar(25) DEFAULT NULL,
  PRIMARY KEY (`idlogin`)
) ENGINE=InnoDB AUTO_INCREMENT=5 DEFAULT CHARSET=latin1;

#
# Data for table "tb_login"
#

INSERT INTO `tb_login` VALUES (1,'Admin','21012000','Admin'),(4,'aa','ad57484016654da87125db86f','Admin');

#
# Structure for table "tb_pelanggan"
#

DROP TABLE IF EXISTS `tb_pelanggan`;
CREATE TABLE `tb_pelanggan` (
  `kode_pelanggan` varchar(15) NOT NULL DEFAULT '',
  `nama_pelanggan` varchar(25) DEFAULT '',
  `alamat_pelanggan` text,
  `kota_pelanggan` varchar(25) DEFAULT NULL,
  `email_pelanggan` varchar(30) DEFAULT NULL,
  `tlp_pelanggan` varchar(14) DEFAULT NULL,
  PRIMARY KEY (`kode_pelanggan`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

#
# Data for table "tb_pelanggan"
#

INSERT INTO `tb_pelanggan` VALUES ('P0001','Yana','jl Cinere','yana@gmail.com','Depok','09876785657'),('P0002','umum','-','-','-','-0'),('P0003','mba ubi','jl. parung bingung  ','robiyatulmfliha36@gmail.c','Depok','081297527507'),('P0004','nurul','baju','nun@gmil','Depok','9899');

#
# Structure for table "tb_satuan_barang"
#

DROP TABLE IF EXISTS `tb_satuan_barang`;
CREATE TABLE `tb_satuan_barang` (
  `Id` int(11) NOT NULL AUTO_INCREMENT,
  `nama_satuan` varchar(15) DEFAULT NULL,
  PRIMARY KEY (`Id`)
) ENGINE=InnoDB AUTO_INCREMENT=4 DEFAULT CHARSET=latin1;

#
# Data for table "tb_satuan_barang"
#

INSERT INTO `tb_satuan_barang` VALUES (1,'gram'),(2,'kilo gram'),(3,'mili liter');

#
# Structure for table "tb_stok"
#

DROP TABLE IF EXISTS `tb_stok`;
CREATE TABLE `tb_stok` (
  `id_stok` int(11) NOT NULL AUTO_INCREMENT,
  `kode_barang` varchar(15) DEFAULT NULL,
  `id_kategori` varchar(15) DEFAULT NULL,
  `kode_supplier` varchar(15) DEFAULT NULL,
  `stok` int(11) DEFAULT NULL,
  PRIMARY KEY (`id_stok`)
) ENGINE=InnoDB AUTO_INCREMENT=7 DEFAULT CHARSET=latin1;

#
# Data for table "tb_stok"
#

INSERT INTO `tb_stok` VALUES (1,'B0001','K0009','S0006',12),(2,'B0003','K0009','S0006',8),(3,'B0002','K0009','S0004',3),(5,'B0006','K0009','S0003',24),(6,'B0007','K0006','S0001',5);

#
# Structure for table "tb_supplier"
#

DROP TABLE IF EXISTS `tb_supplier`;
CREATE TABLE `tb_supplier` (
  `kode_supplier` varchar(15) NOT NULL DEFAULT '',
  `nama_supplier` varchar(50) DEFAULT NULL,
  `alamt_supplier` text,
  `kota` varchar(25) DEFAULT NULL,
  `tlpn_supplier` varchar(14) DEFAULT NULL,
  PRIMARY KEY (`kode_supplier`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

#
# Data for table "tb_supplier"
#

INSERT INTO `tb_supplier` VALUES ('S0001','PT  Indomart Jaya','cggfgh','Depok','0989767545'),('S0002','PT Barang Import','jl. Raya','Depok','098665465'),('S0003','PT Jaya Saputra','jl. Jaya Baya','Jakarta','09878675757'),('S0004','PT Aica Indonesia','jl. Cinere Raya','Depok','098987564'),('S0005','PT  Bintang Utama Lestari','yuyuy','Depok3','098775467');
