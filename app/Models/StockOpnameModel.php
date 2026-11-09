<?php

namespace App\Models;

use CodeIgniter\Model;

class StockOpnameModel extends Model
{
    protected $table            = 'stock_opname';
    protected $primaryKey       = 'id';
    protected $useAutoIncrement = true;
    protected $returnType       = 'array';
    protected $allowedFields    = [
        'kode_opname',
        'tanggal_opname',
        'petugas',
        'lokasi',
        'total_item',
        'total_selisih',
        'keterangan',
        'created_at'
    ];

    /**
     * Memastikan tabel stock_opname & stock_opname_detail sudah tersedia di database.
     */
    public function ensureTableExists()
    {
        $db = \Config\Database::connect();
        
        $sql1 = "CREATE TABLE IF NOT EXISTS `stock_opname` (
            `id` INT(11) NOT NULL AUTO_INCREMENT,
            `kode_opname` VARCHAR(50) NOT NULL UNIQUE,
            `tanggal_opname` DATE NOT NULL,
            `petugas` VARCHAR(100) NOT NULL,
            `lokasi` VARCHAR(50) NOT NULL DEFAULT 'Semua Lokasi',
            `total_item` INT(11) NOT NULL DEFAULT 0,
            `total_selisih` INT(11) NOT NULL DEFAULT 0,
            `keterangan` TEXT NULL,
            `created_at` DATETIME NOT NULL DEFAULT CURRENT_TIMESTAMP,
            PRIMARY KEY (`id`)
        ) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;";

        $sql2 = "CREATE TABLE IF NOT EXISTS `stock_opname_detail` (
            `id` INT(11) NOT NULL AUTO_INCREMENT,
            `opname_id` INT(11) NOT NULL,
            `kodebarang` VARCHAR(50) NOT NULL,
            `namabarang` TEXT NOT NULL,
            `unit` VARCHAR(50) NOT NULL DEFAULT 'Pcs',
            `lokasi` VARCHAR(50) NOT NULL DEFAULT 'W007',
            `stok_sistem` INT(11) NOT NULL DEFAULT 0,
            `stok_fisik` INT(11) NOT NULL DEFAULT 0,
            `selisih` INT(11) NOT NULL DEFAULT 0,
            `keterangan` TEXT NULL,
            PRIMARY KEY (`id`),
            KEY `opname_id` (`opname_id`)
        ) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;";

        try {
            $db->query($sql1);
            $db->query($sql2);
        } catch (\Throwable $e) {
            log_message('error', '[StockOpname] Gagal membuat tabel opname: ' . $e->getMessage());
        }
    }

    /**
     * Generate Nomor Dokumen Stock Opname otomatis (contoh: SO-202611-001)
     */
    public function generateKodeOpname(): string
    {
        $prefix = 'SO-' . date('Ym') . '-';
        $last = $this->like('kode_opname', $prefix, 'after')
                     ->orderBy('id', 'DESC')
                     ->first();

        if ($last) {
            $lastNum = (int) substr($last['kode_opname'], strlen($prefix));
            $nextNum = str_pad($lastNum + 1, 3, '0', STR_PAD_LEFT);
        } else {
            $nextNum = '001';
        }

        return $prefix . $nextNum;
    }
}

