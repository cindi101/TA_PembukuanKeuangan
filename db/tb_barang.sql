-- --------------------------------------------------------
-- Host:                         127.0.0.1
-- Server version:               8.0.30 - MySQL Community Server - GPL
-- Server OS:                    Win64
-- HeidiSQL Version:             12.1.0.6537
-- --------------------------------------------------------

/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET NAMES utf8 */;
/*!50503 SET NAMES utf8mb4 */;
/*!40103 SET @OLD_TIME_ZONE=@@TIME_ZONE */;
/*!40103 SET TIME_ZONE='+00:00' */;
/*!40014 SET @OLD_FOREIGN_KEY_CHECKS=@@FOREIGN_KEY_CHECKS, FOREIGN_KEY_CHECKS=0 */;
/*!40101 SET @OLD_SQL_MODE=@@SQL_MODE, SQL_MODE='NO_AUTO_VALUE_ON_ZERO' */;
/*!40111 SET @OLD_SQL_NOTES=@@SQL_NOTES, SQL_NOTES=0 */;

ALTER TABLE tb_barang ADD COLUMN foto TEXT;

-- Dumping structure for view ta_dina_pembukuan.view_total_barang
DROP VIEW IF EXISTS `view_total_barang`;
-- Creating temporary table to overcome VIEW dependency errors
CREATE TABLE `view_total_barang` (
	`id_barang` INT(10) NULL,
	`foto` TEXT NULL COLLATE 'utf8mb3_unicode_ci',
	`kode_barang` VARCHAR(255) NULL COLLATE 'utf8mb3_unicode_ci',
	`nama_barang` VARCHAR(255) NULL COLLATE 'utf8mb3_unicode_ci',
	`id_jenis_barang` INT(10) NULL,
	`id_kategori_barang` INT(10) NULL,
	`harga_jual` INT(10) NULL,
	`id_satuan_barang` INT(10) NULL,
	`total_stok` DECIMAL(32,0) NULL,
	`stok_terpakai` DECIMAL(32,0) NULL
) ENGINE=MyISAM;

-- Dumping structure for view ta_dina_pembukuan.view_total_barang
DROP VIEW IF EXISTS `view_total_barang`;
-- Removing temporary table and create final VIEW structure
DROP TABLE IF EXISTS `view_total_barang`;
CREATE ALGORITHM=UNDEFINED SQL SECURITY DEFINER VIEW `view_total_barang` AS select `tb_barang`.`id_barang` AS `id_barang`,`tb_barang`.`foto` AS `foto`,`tb_barang`.`kode_barang` AS `kode_barang`,`tb_barang`.`nama_barang` AS `nama_barang`,`tb_barang`.`id_jenis_barang` AS `id_jenis_barang`,`tb_barang`.`id_kategori_barang` AS `id_kategori_barang`,`tb_barang`.`harga_jual` AS `harga_jual`,`tb_barang`.`id_satuan_barang` AS `id_satuan_barang`,(select sum(`tb_stok_barang`.`jumlah`) from `tb_stok_barang` where (`tb_stok_barang`.`id_barang` = `tb_barang`.`id_barang`)) AS `total_stok`,(select sum(`tb_detail_transaksi`.`jumlah_barang`) from (`tb_detail_transaksi` join `tb_transaksi` on((`tb_transaksi`.`id_transaksi` = `tb_detail_transaksi`.`id_transaksi`))) where ((`tb_transaksi`.`status_transaksi` = 'sukses') and (`tb_detail_transaksi`.`id_barang` = `tb_barang`.`id_barang`))) AS `stok_terpakai` from `tb_barang`;


/*!40103 SET TIME_ZONE=IFNULL(@OLD_TIME_ZONE, 'system') */;
/*!40101 SET SQL_MODE=IFNULL(@OLD_SQL_MODE, '') */;
/*!40014 SET FOREIGN_KEY_CHECKS=IFNULL(@OLD_FOREIGN_KEY_CHECKS, 1) */;
/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40111 SET SQL_NOTES=IFNULL(@OLD_SQL_NOTES, 1) */;
