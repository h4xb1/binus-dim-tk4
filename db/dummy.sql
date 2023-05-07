/*
 Navicat Premium Data Transfer

 Source Server         : Local (Docker) - MySql 5.7 - 3333
 Source Server Type    : MySQL
 Source Server Version : 50739
 Source Host           : localhost:3333
 Source Schema         : dim

 Target Server Type    : MySQL
 Target Server Version : 50739
 File Encoding         : 65001

 Date: 08/05/2023 05:18:27
*/

SET NAMES utf8mb4;
SET FOREIGN_KEY_CHECKS = 0;

-- ----------------------------
-- Table structure for Barang
-- ----------------------------
DROP TABLE IF EXISTS `Barang`;
CREATE TABLE `Barang` (
  `IdBarang` int(11) NOT NULL AUTO_INCREMENT,
  `IdPengguna` int(11) DEFAULT NULL,
  `IdSupplier` int(11) DEFAULT NULL,
  `NamaBarang` varchar(200) DEFAULT NULL,
  `Keterangan` text,
  `Satuan` decimal(20,2) DEFAULT NULL,
  `Stok` int(11) DEFAULT NULL,
  `JumlahMinimal` int(11) DEFAULT NULL,
  `JumlahMaksimal` int(11) DEFAULT NULL,
  PRIMARY KEY (`IdBarang`),
  KEY `IdPengguna` (`IdPengguna`),
  KEY `IdSupplier` (`IdSupplier`),
  CONSTRAINT `Barang_ibfk_1` FOREIGN KEY (`IdPengguna`) REFERENCES `Pengguna` (`IdPengguna`),
  CONSTRAINT `Barang_ibfk_2` FOREIGN KEY (`IdSupplier`) REFERENCES `Supplier` (`IdSupplier`)
) ENGINE=InnoDB AUTO_INCREMENT=12 DEFAULT CHARSET=utf8;

-- ----------------------------
-- Records of Barang
-- ----------------------------
BEGIN;
INSERT INTO `Barang` (`IdBarang`, `IdPengguna`, `IdSupplier`, `NamaBarang`, `Keterangan`, `Satuan`, `Stok`, `JumlahMinimal`, `JumlahMaksimal`) VALUES (3, 1, 1, 'Sarden CBA - 250 ML', 'Kaleng', 8000.00, 100, 10, 700);
INSERT INTO `Barang` (`IdBarang`, `IdPengguna`, `IdSupplier`, `NamaBarang`, `Keterangan`, `Satuan`, `Stok`, `JumlahMinimal`, `JumlahMaksimal`) VALUES (4, 1, 2, 'Coklat Kaori - Large', 'Ukuran L', 17000.00, 500, 10, 700);
INSERT INTO `Barang` (`IdBarang`, `IdPengguna`, `IdSupplier`, `NamaBarang`, `Keterangan`, `Satuan`, `Stok`, `JumlahMinimal`, `JumlahMaksimal`) VALUES (5, 1, 2, 'Minyak Langka', 'Literan', 16000.00, 500, 10, 700);
INSERT INTO `Barang` (`IdBarang`, `IdPengguna`, `IdSupplier`, `NamaBarang`, `Keterangan`, `Satuan`, `Stok`, `JumlahMinimal`, `JumlahMaksimal`) VALUES (6, 1, 2, 'Snack Tora - 80 gram', 'Per-gram', 2000.00, 500, 10, 700);
INSERT INTO `Barang` (`IdBarang`, `IdPengguna`, `IdSupplier`, `NamaBarang`, `Keterangan`, `Satuan`, `Stok`, `JumlahMinimal`, `JumlahMaksimal`) VALUES (7, 1, 1, 'Ketchup Asin - 500 ML', 'Botol Kaca', 20000.00, 500, 10, 700);
INSERT INTO `Barang` (`IdBarang`, `IdPengguna`, `IdSupplier`, `NamaBarang`, `Keterangan`, `Satuan`, `Stok`, `JumlahMinimal`, `JumlahMaksimal`) VALUES (8, 1, 2, 'Saos Bantal', 'Per-gram', 40000.00, 500, 10, 700);
INSERT INTO `Barang` (`IdBarang`, `IdPengguna`, `IdSupplier`, `NamaBarang`, `Keterangan`, `Satuan`, `Stok`, `JumlahMinimal`, `JumlahMaksimal`) VALUES (9, 1, 1, 'Kola-Koka - 1000 ML', 'Literan', 16000.00, 500, 10, 700);
INSERT INTO `Barang` (`IdBarang`, `IdPengguna`, `IdSupplier`, `NamaBarang`, `Keterangan`, `Satuan`, `Stok`, `JumlahMinimal`, `JumlahMaksimal`) VALUES (10, 1, 2, 'Surya Promax 16', 'Bungkus', 35000.00, 500, 10, 700);
COMMIT;

-- ----------------------------
-- Table structure for HakAkses
-- ----------------------------
DROP TABLE IF EXISTS `HakAkses`;
CREATE TABLE `HakAkses` (
  `IdAkses` int(11) NOT NULL AUTO_INCREMENT,
  `NamaAkses` varchar(100) DEFAULT NULL,
  `Keterangan` text,
  PRIMARY KEY (`IdAkses`)
) ENGINE=InnoDB AUTO_INCREMENT=11 DEFAULT CHARSET=utf8;

-- ----------------------------
-- Records of HakAkses
-- ----------------------------
BEGIN;
INSERT INTO `HakAkses` (`IdAkses`, `NamaAkses`, `Keterangan`) VALUES (1, 'SuperAdmin', NULL);
INSERT INTO `HakAkses` (`IdAkses`, `NamaAkses`, `Keterangan`) VALUES (2, 'Admin', NULL);
INSERT INTO `HakAkses` (`IdAkses`, `NamaAkses`, `Keterangan`) VALUES (3, 'Seller', NULL);
INSERT INTO `HakAkses` (`IdAkses`, `NamaAkses`, `Keterangan`) VALUES (4, 'Buyer', NULL);
INSERT INTO `HakAkses` (`IdAkses`, `NamaAkses`, `Keterangan`) VALUES (5, 'Analis', NULL);
INSERT INTO `HakAkses` (`IdAkses`, `NamaAkses`, `Keterangan`) VALUES (6, 'Guest', NULL);
INSERT INTO `HakAkses` (`IdAkses`, `NamaAkses`, `Keterangan`) VALUES (7, 'Manager', NULL);
INSERT INTO `HakAkses` (`IdAkses`, `NamaAkses`, `Keterangan`) VALUES (8, 'Warehouse', NULL);
INSERT INTO `HakAkses` (`IdAkses`, `NamaAkses`, `Keterangan`) VALUES (9, 'Goods', 'Goods Manager');
INSERT INTO `HakAkses` (`IdAkses`, `NamaAkses`, `Keterangan`) VALUES (10, 'Reseller', NULL);
COMMIT;

-- ----------------------------
-- Table structure for Pelanggan
-- ----------------------------
DROP TABLE IF EXISTS `Pelanggan`;
CREATE TABLE `Pelanggan` (
  `IdPelanggan` int(11) NOT NULL AUTO_INCREMENT,
  `NamaPelanggan` varchar(200) DEFAULT NULL,
  `AlamatPelanggan` text,
  `NoTelp` varchar(20) DEFAULT NULL,
  PRIMARY KEY (`IdPelanggan`)
) ENGINE=InnoDB AUTO_INCREMENT=23 DEFAULT CHARSET=utf8;

-- ----------------------------
-- Records of Pelanggan
-- ----------------------------
BEGIN;
INSERT INTO `Pelanggan` (`IdPelanggan`, `NamaPelanggan`, `AlamatPelanggan`, `NoTelp`) VALUES (5, 'Hasbi', 'Indonesia', '0866666666');
INSERT INTO `Pelanggan` (`IdPelanggan`, `NamaPelanggan`, `AlamatPelanggan`, `NoTelp`) VALUES (6, 'Aba', 'Indonesia', '08212121213');
INSERT INTO `Pelanggan` (`IdPelanggan`, `NamaPelanggan`, `AlamatPelanggan`, `NoTelp`) VALUES (7, 'Aca', 'Indonesia', '08212121213');
INSERT INTO `Pelanggan` (`IdPelanggan`, `NamaPelanggan`, `AlamatPelanggan`, `NoTelp`) VALUES (8, 'Ada', 'Indonesia', '08212121213');
INSERT INTO `Pelanggan` (`IdPelanggan`, `NamaPelanggan`, `AlamatPelanggan`, `NoTelp`) VALUES (9, 'Aya', 'Indonesia', '08212121213');
INSERT INTO `Pelanggan` (`IdPelanggan`, `NamaPelanggan`, `AlamatPelanggan`, `NoTelp`) VALUES (10, 'Baba', 'Indonesia', '08212121213');
INSERT INTO `Pelanggan` (`IdPelanggan`, `NamaPelanggan`, `AlamatPelanggan`, `NoTelp`) VALUES (11, 'Baca', 'Indonesia', '08212121213');
INSERT INTO `Pelanggan` (`IdPelanggan`, `NamaPelanggan`, `AlamatPelanggan`, `NoTelp`) VALUES (12, 'Bada', 'Indonesia', '08212121213');
INSERT INTO `Pelanggan` (`IdPelanggan`, `NamaPelanggan`, `AlamatPelanggan`, `NoTelp`) VALUES (13, 'Baja', 'Indonesia', '08212121213');
INSERT INTO `Pelanggan` (`IdPelanggan`, `NamaPelanggan`, `AlamatPelanggan`, `NoTelp`) VALUES (14, 'Caca', 'Indonesia', '08212121213');
INSERT INTO `Pelanggan` (`IdPelanggan`, `NamaPelanggan`, `AlamatPelanggan`, `NoTelp`) VALUES (15, 'Dada', 'Indonesia', '08212121213');
INSERT INTO `Pelanggan` (`IdPelanggan`, `NamaPelanggan`, `AlamatPelanggan`, `NoTelp`) VALUES (16, 'Daba', 'Indonesia', '08212121213');
INSERT INTO `Pelanggan` (`IdPelanggan`, `NamaPelanggan`, `AlamatPelanggan`, `NoTelp`) VALUES (17, 'Dala', 'Indonesia', '08212121213');
INSERT INTO `Pelanggan` (`IdPelanggan`, `NamaPelanggan`, `AlamatPelanggan`, `NoTelp`) VALUES (18, 'Erpan', 'Indonesia', '08212121213');
INSERT INTO `Pelanggan` (`IdPelanggan`, `NamaPelanggan`, `AlamatPelanggan`, `NoTelp`) VALUES (19, 'Erwin', 'Indonesia', '08212121213');
INSERT INTO `Pelanggan` (`IdPelanggan`, `NamaPelanggan`, `AlamatPelanggan`, `NoTelp`) VALUES (20, 'Fani', 'Indonesia', '08212121213');
INSERT INTO `Pelanggan` (`IdPelanggan`, `NamaPelanggan`, `AlamatPelanggan`, `NoTelp`) VALUES (22, 'Dewi', 'Bandung', '0812990999918');
COMMIT;

-- ----------------------------
-- Table structure for Pembelian
-- ----------------------------
DROP TABLE IF EXISTS `Pembelian`;
CREATE TABLE `Pembelian` (
  `IdPembelian` int(11) NOT NULL AUTO_INCREMENT,
  `IdPengguna` int(11) DEFAULT NULL,
  `IdBarang` int(11) DEFAULT NULL,
  `IdPelanggan` int(11) DEFAULT NULL,
  `JumlahPembelian` int(11) DEFAULT NULL,
  `HargaBeli` decimal(20,2) DEFAULT NULL,
  PRIMARY KEY (`IdPembelian`),
  KEY `IdPengguna` (`IdPengguna`),
  KEY `IdBarang` (`IdBarang`),
  KEY `IdPelanggan` (`IdPelanggan`),
  CONSTRAINT `Pembelian_ibfk_1` FOREIGN KEY (`IdPengguna`) REFERENCES `Pengguna` (`IdPengguna`),
  CONSTRAINT `Pembelian_ibfk_2` FOREIGN KEY (`IdBarang`) REFERENCES `Barang` (`IdBarang`),
  CONSTRAINT `Pembelian_ibfk_3` FOREIGN KEY (`IdPelanggan`) REFERENCES `Pelanggan` (`IdPelanggan`)
) ENGINE=InnoDB AUTO_INCREMENT=23 DEFAULT CHARSET=utf8;

-- ----------------------------
-- Records of Pembelian
-- ----------------------------
BEGIN;
INSERT INTO `Pembelian` (`IdPembelian`, `IdPengguna`, `IdBarang`, `IdPelanggan`, `JumlahPembelian`, `HargaBeli`) VALUES (18, 10, 4, 5, 20, 340000.00);
INSERT INTO `Pembelian` (`IdPembelian`, `IdPengguna`, `IdBarang`, `IdPelanggan`, `JumlahPembelian`, `HargaBeli`) VALUES (19, 4, 5, 5, 100, 1600000.00);
INSERT INTO `Pembelian` (`IdPembelian`, `IdPengguna`, `IdBarang`, `IdPelanggan`, `JumlahPembelian`, `HargaBeli`) VALUES (20, 6, 5, 5, 10, 160000.00);
COMMIT;

-- ----------------------------
-- Table structure for Pengguna
-- ----------------------------
DROP TABLE IF EXISTS `Pengguna`;
CREATE TABLE `Pengguna` (
  `IdPengguna` int(11) NOT NULL AUTO_INCREMENT,
  `IdAkses` int(11) DEFAULT NULL,
  `NamaPengguna` varchar(200) DEFAULT NULL,
  `Password` varchar(255) DEFAULT NULL,
  `NamaDepan` varchar(100) DEFAULT NULL,
  `NamaBelakang` varchar(100) DEFAULT NULL,
  `NoHp` varchar(20) DEFAULT NULL,
  `Alamat` text,
  PRIMARY KEY (`IdPengguna`),
  KEY `IdAkses` (`IdAkses`),
  CONSTRAINT `Pengguna_ibfk_1` FOREIGN KEY (`IdAkses`) REFERENCES `HakAkses` (`IdAkses`)
) ENGINE=InnoDB AUTO_INCREMENT=11 DEFAULT CHARSET=utf8;

-- ----------------------------
-- Records of Pengguna
-- ----------------------------
BEGIN;
INSERT INTO `Pengguna` (`IdPengguna`, `IdAkses`, `NamaPengguna`, `Password`, `NamaDepan`, `NamaBelakang`, `NoHp`, `Alamat`) VALUES (1, 9, 'mhasbi', 'ef92b778bafe771e89245b89ecbc08a44a4e166c06659911881f383d4473e94f', 'M', 'Hasbi', '08111111111', 'Bandung');
INSERT INTO `Pengguna` (`IdPengguna`, `IdAkses`, `NamaPengguna`, `Password`, `NamaDepan`, `NamaBelakang`, `NoHp`, `Alamat`) VALUES (2, 1, 'mhasba', 'ef92b778bafe771e89245b89ecbc08a44a4e166c06659911881f383d4473e94f', 'M', 'Hasba', '082222222', 'CImahi');
INSERT INTO `Pengguna` (`IdPengguna`, `IdAkses`, `NamaPengguna`, `Password`, `NamaDepan`, `NamaBelakang`, `NoHp`, `Alamat`) VALUES (3, 3, 'johndoe', 'ef92b778bafe771e89245b89ecbc08a44a4e166c06659911881f383d4473e94f', 'John', 'Doe', '083333333', 'USA');
INSERT INTO `Pengguna` (`IdPengguna`, `IdAkses`, `NamaPengguna`, `Password`, `NamaDepan`, `NamaBelakang`, `NoHp`, `Alamat`) VALUES (4, 4, 'janedoe', 'ef92b778bafe771e89245b89ecbc08a44a4e166c06659911881f383d4473e94f', 'Jane', 'Doe', '084444444', 'UK');
INSERT INTO `Pengguna` (`IdPengguna`, `IdAkses`, `NamaPengguna`, `Password`, `NamaDepan`, `NamaBelakang`, `NoHp`, `Alamat`) VALUES (5, 3, 'ujangkenalpot', 'ef92b778bafe771e89245b89ecbc08a44a4e166c06659911881f383d4473e94f', 'Ujang', 'Kenalpot', '085555555', 'Cibaduyut');
INSERT INTO `Pengguna` (`IdPengguna`, `IdAkses`, `NamaPengguna`, `Password`, `NamaDepan`, `NamaBelakang`, `NoHp`, `Alamat`) VALUES (6, 4, 'asepbadag', 'ef92b778bafe771e89245b89ecbc08a44a4e166c06659911881f383d4473e94f', 'Asep', 'Badag', '086666666', 'Kopo');
INSERT INTO `Pengguna` (`IdPengguna`, `IdAkses`, `NamaPengguna`, `Password`, `NamaDepan`, `NamaBelakang`, `NoHp`, `Alamat`) VALUES (7, 3, 'cecepsangu', 'ef92b778bafe771e89245b89ecbc08a44a4e166c06659911881f383d4473e94f', 'Cecep', 'Sangu', '087777777', 'Soreang');
INSERT INTO `Pengguna` (`IdPengguna`, `IdAkses`, `NamaPengguna`, `Password`, `NamaDepan`, `NamaBelakang`, `NoHp`, `Alamat`) VALUES (8, 4, 'dayatngapung', 'ef92b778bafe771e89245b89ecbc08a44a4e166c06659911881f383d4473e94f', 'Dayat', 'Ngapung', '088888888', 'Pasteur');
INSERT INTO `Pengguna` (`IdPengguna`, `IdAkses`, `NamaPengguna`, `Password`, `NamaDepan`, `NamaBelakang`, `NoHp`, `Alamat`) VALUES (9, 3, 'udinsedunia', 'ef92b778bafe771e89245b89ecbc08a44a4e166c06659911881f383d4473e94f', 'Udin', 'Sedunia', '089999999', 'Dago');
INSERT INTO `Pengguna` (`IdPengguna`, `IdAkses`, `NamaPengguna`, `Password`, `NamaDepan`, `NamaBelakang`, `NoHp`, `Alamat`) VALUES (10, 4, 'dadangngarit', 'ef92b778bafe771e89245b89ecbc08a44a4e166c06659911881f383d4473e94f', 'Dadang', 'Ngarit', '0810101010', 'Cihampelas');
COMMIT;

-- ----------------------------
-- Table structure for Penjualan
-- ----------------------------
DROP TABLE IF EXISTS `Penjualan`;
CREATE TABLE `Penjualan` (
  `IdPenjualan` int(11) NOT NULL AUTO_INCREMENT,
  `IdPengguna` int(11) DEFAULT NULL,
  `IdBarang` int(11) DEFAULT NULL,
  `IdPelanggan` int(11) DEFAULT NULL,
  `JumlahPenjualan` int(11) DEFAULT NULL,
  `HargaJual` decimal(20,2) DEFAULT NULL,
  PRIMARY KEY (`IdPenjualan`),
  KEY `IdBarang` (`IdBarang`),
  KEY `IdPengguna` (`IdPengguna`),
  KEY `IdPelanggan` (`IdPelanggan`),
  CONSTRAINT `Penjualan_ibfk_1` FOREIGN KEY (`IdBarang`) REFERENCES `Barang` (`IdBarang`),
  CONSTRAINT `Penjualan_ibfk_2` FOREIGN KEY (`IdPengguna`) REFERENCES `Pengguna` (`IdPengguna`),
  CONSTRAINT `Penjualan_ibfk_3` FOREIGN KEY (`IdPelanggan`) REFERENCES `Pelanggan` (`IdPelanggan`)
) ENGINE=InnoDB AUTO_INCREMENT=22 DEFAULT CHARSET=utf8;

-- ----------------------------
-- Records of Penjualan
-- ----------------------------
BEGIN;
INSERT INTO `Penjualan` (`IdPenjualan`, `IdPengguna`, `IdBarang`, `IdPelanggan`, `JumlahPenjualan`, `HargaJual`) VALUES (9, 3, 3, 5, 50, 400000.00);
INSERT INTO `Penjualan` (`IdPenjualan`, `IdPengguna`, `IdBarang`, `IdPelanggan`, `JumlahPenjualan`, `HargaJual`) VALUES (10, 5, 3, 5, 5, 40000.00);
INSERT INTO `Penjualan` (`IdPenjualan`, `IdPengguna`, `IdBarang`, `IdPelanggan`, `JumlahPenjualan`, `HargaJual`) VALUES (19, 7, 5, 5, 100, 1600000.00);
INSERT INTO `Penjualan` (`IdPenjualan`, `IdPengguna`, `IdBarang`, `IdPelanggan`, `JumlahPenjualan`, `HargaJual`) VALUES (20, 9, 5, 5, 10, 160000.00);
INSERT INTO `Penjualan` (`IdPenjualan`, `IdPengguna`, `IdBarang`, `IdPelanggan`, `JumlahPenjualan`, `HargaJual`) VALUES (21, 1, 6, 5, 100, 200000.00);
COMMIT;

-- ----------------------------
-- Table structure for Supplier
-- ----------------------------
DROP TABLE IF EXISTS `Supplier`;
CREATE TABLE `Supplier` (
  `IdSupplier` int(11) NOT NULL AUTO_INCREMENT,
  `NamaSupplier` varchar(200) DEFAULT NULL,
  `AlamatSupplier` text,
  `NoTelp` varchar(20) DEFAULT NULL,
  PRIMARY KEY (`IdSupplier`)
) ENGINE=InnoDB AUTO_INCREMENT=21 DEFAULT CHARSET=utf8;

-- ----------------------------
-- Records of Supplier
-- ----------------------------
BEGIN;
INSERT INTO `Supplier` (`IdSupplier`, `NamaSupplier`, `AlamatSupplier`, `NoTelp`) VALUES (1, 'CV ApaAja', 'Jawa Timur', '0822222222');
INSERT INTO `Supplier` (`IdSupplier`, `NamaSupplier`, `AlamatSupplier`, `NoTelp`) VALUES (2, 'CV TokoSerbaAda', 'Jawa Tengah', '0822222222');
INSERT INTO `Supplier` (`IdSupplier`, `NamaSupplier`, `AlamatSupplier`, `NoTelp`) VALUES (3, 'CV Ada Aja', 'Indonesia', '08212121213');
INSERT INTO `Supplier` (`IdSupplier`, `NamaSupplier`, `AlamatSupplier`, `NoTelp`) VALUES (4, 'CV Baca Dulu', 'Indonesia', '08212121213');
INSERT INTO `Supplier` (`IdSupplier`, `NamaSupplier`, `AlamatSupplier`, `NoTelp`) VALUES (5, 'CV Dandan ', 'Indonesia', '08212121213');
INSERT INTO `Supplier` (`IdSupplier`, `NamaSupplier`, `AlamatSupplier`, `NoTelp`) VALUES (6, 'CV Fatma', 'Indonesia', '08212121213');
INSERT INTO `Supplier` (`IdSupplier`, `NamaSupplier`, `AlamatSupplier`, `NoTelp`) VALUES (7, 'CV Eagle', 'Indonesia', '08212121213');
INSERT INTO `Supplier` (`IdSupplier`, `NamaSupplier`, `AlamatSupplier`, `NoTelp`) VALUES (8, 'CV Gacor', 'Indonesia', '08212121213');
INSERT INTO `Supplier` (`IdSupplier`, `NamaSupplier`, `AlamatSupplier`, `NoTelp`) VALUES (9, 'CV Haliman', 'Indonesia', '08212121213');
INSERT INTO `Supplier` (`IdSupplier`, `NamaSupplier`, `AlamatSupplier`, `NoTelp`) VALUES (10, 'CV Iklim', 'Indonesia', '08212121213');
INSERT INTO `Supplier` (`IdSupplier`, `NamaSupplier`, `AlamatSupplier`, `NoTelp`) VALUES (11, 'CV Jackal', 'Indonesia', '08212121213');
INSERT INTO `Supplier` (`IdSupplier`, `NamaSupplier`, `AlamatSupplier`, `NoTelp`) VALUES (12, 'CV Kelingking', 'Indonesia', '08212121213');
INSERT INTO `Supplier` (`IdSupplier`, `NamaSupplier`, `AlamatSupplier`, `NoTelp`) VALUES (13, 'CV Lemon', 'Indonesia', '08212121213');
INSERT INTO `Supplier` (`IdSupplier`, `NamaSupplier`, `AlamatSupplier`, `NoTelp`) VALUES (14, 'CV Moonstradt', 'Indonesia', '08212121213');
INSERT INTO `Supplier` (`IdSupplier`, `NamaSupplier`, `AlamatSupplier`, `NoTelp`) VALUES (15, 'CV Nagita', 'Indonesia', '08212121213');
INSERT INTO `Supplier` (`IdSupplier`, `NamaSupplier`, `AlamatSupplier`, `NoTelp`) VALUES (16, 'CV Oreo', 'Indonesia', '08212121213');
INSERT INTO `Supplier` (`IdSupplier`, `NamaSupplier`, `AlamatSupplier`, `NoTelp`) VALUES (17, 'CV Qurma', 'Indonesia', '08212121213');
INSERT INTO `Supplier` (`IdSupplier`, `NamaSupplier`, `AlamatSupplier`, `NoTelp`) VALUES (18, 'CV Rasa Bersama', 'Indonesia', '08212121213');
INSERT INTO `Supplier` (`IdSupplier`, `NamaSupplier`, `AlamatSupplier`, `NoTelp`) VALUES (19, 'CV Setahu Ku', 'Indonesia', '08212121213');
INSERT INTO `Supplier` (`IdSupplier`, `NamaSupplier`, `AlamatSupplier`, `NoTelp`) VALUES (20, 'CV Tahuntu', 'Indonesia', '08212121213');
COMMIT;

SET FOREIGN_KEY_CHECKS = 1;
