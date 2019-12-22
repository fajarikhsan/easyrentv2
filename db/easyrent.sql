/*
SQLyog Professional v12.4.3 (64 bit)
MySQL - 10.4.8-MariaDB : Database - easyrent
*********************************************************************
*/

/*!40101 SET NAMES utf8 */;

/*!40101 SET SQL_MODE=''*/;

/*!40014 SET @OLD_UNIQUE_CHECKS=@@UNIQUE_CHECKS, UNIQUE_CHECKS=0 */;
/*!40014 SET @OLD_FOREIGN_KEY_CHECKS=@@FOREIGN_KEY_CHECKS, FOREIGN_KEY_CHECKS=0 */;
/*!40101 SET @OLD_SQL_MODE=@@SQL_MODE, SQL_MODE='NO_AUTO_VALUE_ON_ZERO' */;
/*!40111 SET @OLD_SQL_NOTES=@@SQL_NOTES, SQL_NOTES=0 */;
CREATE DATABASE /*!32312 IF NOT EXISTS*/`easyrent` /*!40100 DEFAULT CHARACTER SET utf8mb4 */;

USE `easyrent`;

/*Table structure for table `mobil` */

DROP TABLE IF EXISTS `mobil`;

CREATE TABLE `mobil` (
  `id_mobil` int(11) NOT NULL AUTO_INCREMENT,
  `nama_mobil` varchar(30) DEFAULT NULL,
  `thn_mobil` year(4) DEFAULT NULL,
  `tipe_mobil` varchar(20) DEFAULT NULL,
  `silinder` varchar(10) DEFAULT NULL,
  `harga` int(11) DEFAULT NULL,
  `deskripsi` varchar(200) DEFAULT NULL,
  `foto_mobil` blob DEFAULT NULL,
  `nama_toko` varchar(20) DEFAULT NULL,
  PRIMARY KEY (`id_mobil`),
  KEY `nama_toko` (`nama_toko`),
  CONSTRAINT `mobil_ibfk_1` FOREIGN KEY (`nama_toko`) REFERENCES `penyedia` (`nama_toko`) ON DELETE CASCADE ON UPDATE CASCADE
) ENGINE=InnoDB AUTO_INCREMENT=3 DEFAULT CHARSET=utf8mb4;

/*Data for the table `mobil` */

/*Table structure for table `pembayaran` */

DROP TABLE IF EXISTS `pembayaran`;

CREATE TABLE `pembayaran` (
  `no_faktur` varchar(40) NOT NULL,
  `total_harga` int(11) DEFAULT NULL,
  `tgl_pembayaran` date DEFAULT NULL,
  `id_pesanan` int(11) NOT NULL,
  PRIMARY KEY (`no_faktur`),
  KEY `id_pesanan` (`id_pesanan`),
  CONSTRAINT `pembayaran_ibfk_1` FOREIGN KEY (`id_pesanan`) REFERENCES `transaksi` (`id_pesanan`) ON DELETE CASCADE ON UPDATE CASCADE
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

/*Data for the table `pembayaran` */

/*Table structure for table `penyedia` */

DROP TABLE IF EXISTS `penyedia`;

CREATE TABLE `penyedia` (
  `nama_toko` varchar(20) NOT NULL,
  `email` varchar(40) NOT NULL,
  PRIMARY KEY (`nama_toko`),
  KEY `email` (`email`),
  CONSTRAINT `penyedia_ibfk_1` FOREIGN KEY (`email`) REFERENCES `user` (`email`) ON DELETE CASCADE ON UPDATE CASCADE
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

/*Data for the table `penyedia` */

/*Table structure for table `perental` */

DROP TABLE IF EXISTS `perental`;

CREATE TABLE `perental` (
  `email` varchar(40) NOT NULL,
  `ktp` blob DEFAULT NULL,
  `selfie` blob DEFAULT NULL,
  `kk` blob DEFAULT NULL,
  `sim` blob DEFAULT NULL,
  KEY `email` (`email`),
  CONSTRAINT `perental_ibfk_1` FOREIGN KEY (`email`) REFERENCES `user` (`email`) ON DELETE CASCADE ON UPDATE CASCADE
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

/*Data for the table `perental` */

insert  into `perental`(`email`,`ktp`,`selfie`,`kk`,`sim`) values 
('fajarikhsan3@gmail.com','KTP.jpg','KTP Self.jpg','KK.jpg','');

/*Table structure for table `transaksi` */

DROP TABLE IF EXISTS `transaksi`;

CREATE TABLE `transaksi` (
  `id_pesanan` int(11) NOT NULL,
  `status` enum('0','1') DEFAULT NULL,
  `email` varchar(40) NOT NULL,
  `nama_toko` varchar(20) NOT NULL,
  PRIMARY KEY (`id_pesanan`),
  KEY `email` (`email`),
  KEY `nama_toko` (`nama_toko`),
  CONSTRAINT `transaksi_ibfk_1` FOREIGN KEY (`email`) REFERENCES `perental` (`email`) ON DELETE CASCADE ON UPDATE CASCADE,
  CONSTRAINT `transaksi_ibfk_2` FOREIGN KEY (`nama_toko`) REFERENCES `penyedia` (`nama_toko`) ON DELETE CASCADE ON UPDATE CASCADE
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

/*Data for the table `transaksi` */

/*Table structure for table `user` */

DROP TABLE IF EXISTS `user`;

CREATE TABLE `user` (
  `nama` varchar(40) NOT NULL,
  `username` varchar(20) NOT NULL,
  `email` varchar(40) NOT NULL,
  `nohp` varchar(12) DEFAULT NULL,
  `password` varchar(40) DEFAULT NULL,
  `token` varchar(255) DEFAULT NULL,
  `aktif` enum('1','0') DEFAULT NULL,
  PRIMARY KEY (`email`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

/*Data for the table `user` */

insert  into `user`(`nama`,`username`,`email`,`nohp`,`password`,`token`,`aktif`) values 
('Fajar Ikhsan','fajarikhsan','fajarikhsan3@gmail.com','085314930404','fafa','3f44d0a290df0d988719e8d9a4f346dc11a0c717d3c63ce7583d7f61bfab400d','1');

/*!40101 SET SQL_MODE=@OLD_SQL_MODE */;
/*!40014 SET FOREIGN_KEY_CHECKS=@OLD_FOREIGN_KEY_CHECKS */;
/*!40014 SET UNIQUE_CHECKS=@OLD_UNIQUE_CHECKS */;
/*!40111 SET SQL_NOTES=@OLD_SQL_NOTES */;
