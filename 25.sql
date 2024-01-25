/*
SQLyog Ultimate v11.11 (64 bit)
MySQL - 5.5.5-10.4.28-MariaDB : Database - azzahra
*********************************************************************
*/

/*!40101 SET NAMES utf8 */;

/*!40101 SET SQL_MODE=''*/;

/*!40014 SET @OLD_UNIQUE_CHECKS=@@UNIQUE_CHECKS, UNIQUE_CHECKS=0 */;
/*!40014 SET @OLD_FOREIGN_KEY_CHECKS=@@FOREIGN_KEY_CHECKS, FOREIGN_KEY_CHECKS=0 */;
/*!40101 SET @OLD_SQL_MODE=@@SQL_MODE, SQL_MODE='NO_AUTO_VALUE_ON_ZERO' */;
/*!40111 SET @OLD_SQL_NOTES=@@SQL_NOTES, SQL_NOTES=0 */;
CREATE DATABASE /*!32312 IF NOT EXISTS*/`azzahra` /*!40100 DEFAULT CHARACTER SET utf8mb4 COLLATE utf8mb4_general_ci */;

USE `azzahra`;

/*Table structure for table `admin` */

DROP TABLE IF EXISTS `admin`;

CREATE TABLE `admin` (
  `username` char(20) NOT NULL,
  `password` varchar(12) NOT NULL,
  PRIMARY KEY (`username`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

/*Data for the table `admin` */

insert  into `admin`(`username`,`password`) values ('admin','171199');

/*Table structure for table `kerangka` */

DROP TABLE IF EXISTS `kerangka`;

CREATE TABLE `kerangka` (
  `id` char(5) NOT NULL,
  `title` varchar(50) DEFAULT NULL,
  `judul` varchar(50) DEFAULT NULL,
  `judul1` varchar(50) DEFAULT NULL,
  `copright` varchar(50) DEFAULT NULL,
  `tentang` longtext DEFAULT NULL,
  `visi` longtext DEFAULT NULL,
  `misi` longtext DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

/*Data for the table `kerangka` */

insert  into `kerangka`(`id`,`title`,`judul`,`judul1`,`copright`,`tentang`,`visi`,`misi`) values ('1','Rumah Sakit Azzahra','Rumah Sakit','Azzahra','Copyright Azzahra 2023','                                            <font color=\"#000000\">                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                Rumah Sakit Az-Zahra<font><font> </font></font>Ujung Batu terletak pada jalur lalu lintas kota Ujung Batu di jalan Rambutan No. 03 RK. Harapan Ujung Batu, Rokan Hulu yang memiliki kapasitas 55 tempat tidur. Rumah Sakit Az-Zahra Ujung Batu memiliki komitmen terhadap mutu, kemudahan akses, kualitas pelayanan dan dokter spesialis dari berbagai disiplin ilmu yang ditunjang dengan peralatan medis yang cukup lengkap. Cakupan layanan kesehatan yang diberikan oleh Rumah Sakit Az-Zahra Ujung Batu meliputi Unit Gawat Darurat, Rawat Jalan, Rawat Inap dengan HCU, Kamar Bedah, Laboratorium, Radiologi, Instalasi Farmasi, Gizi, Medical Check-up dan penunjang medis lainnya. Rumah Sakit Az-Zahra Ujung Batu berkomitmen untuk senantiasa mengupayakan keberhasilan klinis, keselamatan pasien dan kepuasan pelanggan dengan melakukan peningkatan dan perbaikan yang berkesinambungan dari waktu ke waktu sesuai perkembangan teknologi dan kebutuhan pasien.                                                                                                                                                                                                                            </font>                                            ','                                            <p>                                                                                                                                    Menjadi Rumah Sakit yang Profesional, Bermutu, dan Terbaik dalam Pelayanan Kesehatan sehingga menjadi Kebanggaan Masyarakat&nbsp;</p>                                            ','<ol><li>Memberikan pelayanan kesehatan bagi masyarakat secara profesional dan tulus\r\n</li><li>senantiasa mengedepankan kemampuan teknologi medik yang mutakhir\r\n</li><li>mengupayakan pengembangan yang berkesinambungan di bidang kesehatan</li><li>melaksanakan pembinaan dan pengembangan sumber daya manusia untuk meningkatkan pelayanan kesehatan bagi masyarakat                                            </li></ol>');

/*Table structure for table `visitor_count` */

DROP TABLE IF EXISTS `visitor_count`;

CREATE TABLE `visitor_count` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `date_visited` date NOT NULL,
  `total_visitors` int(11) NOT NULL DEFAULT 0,
  `ip_address` varchar(45) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=5 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

/*Data for the table `visitor_count` */

insert  into `visitor_count`(`id`,`date_visited`,`total_visitors`,`ip_address`) values (3,'2023-11-25',0,'1890.289'),(4,'2023-11-25',0,'127.0.0.1');

/*!40101 SET SQL_MODE=@OLD_SQL_MODE */;
/*!40014 SET FOREIGN_KEY_CHECKS=@OLD_FOREIGN_KEY_CHECKS */;
/*!40014 SET UNIQUE_CHECKS=@OLD_UNIQUE_CHECKS */;
/*!40111 SET SQL_NOTES=@OLD_SQL_NOTES */;
