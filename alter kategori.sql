ALTER TABLE `t_pengajuan` ADD `kategori` VARCHAR(255) NULL DEFAULT NULL AFTER `tanggal_selesai`, ADD `bukti` VARCHAR(255) NULL DEFAULT NULL AFTER `kategori`;