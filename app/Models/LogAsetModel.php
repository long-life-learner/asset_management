<?php

namespace App\Models;

use CodeIgniter\Model;

class LogAsetModel extends Model
{
    protected $table = 'logasetbarang';
    protected $primaryKey = 'id';
    protected $allowedFields = ['id', 'kode', 'namabarang', 'statusbarang', 'unit', 'jumlah', 'lokasi', 'ketersediaan', 'keterangan', 'tanggal', 'pic', 'user_log_in', 'dari', 'tujuan'];
    // protected $useTimestamps = true;
    public function getAllTimeStockData()
    {
        return $this->select('DATE(tanggal) as date, SUM(ketersediaan) as total_quantity')
            ->groupBy('date')
            ->get()
            ->getResultArray();
    }
    public function getStokAwal($startDate, $endDate, $lokasi)
    {
        // Logika baru: Ambil log pertama di periode ini. 
        // Stok Awal = (Ketersediaan log tersebut - Jumlah Mutasi log tersebut)
        // Ini memastikan jika barang sudah ada saldo sebelumnya tapi tidak ada transaksi lama, angka tidak 0.
        $query = $this->db->query(
            "SELECT 
                subquery.kode AS kode_aset,
                CASE 
                    WHEN prev.id IS NOT NULL THEN prev.ketersediaan 
                    ELSE (first_log.ketersediaan - CASE WHEN first_log.statusbarang = 'Masuk' THEN first_log.jumlah ELSE -first_log.jumlah END)
                END AS stok_awal
            FROM (
                SELECT DISTINCT kode 
                FROM logasetbarang 
                WHERE tanggal >= '$startDate' AND tanggal <= '$endDate' AND lokasi = '$lokasi'
            ) AS subquery
            -- Cari log terakhir SEBELUM periode
            LEFT JOIN logasetbarang prev ON prev.id = (
                SELECT MAX(id) FROM logasetbarang 
                WHERE kode = subquery.kode AND tanggal < '$startDate' AND lokasi = '$lokasi'
            )
            -- Cari log pertama DI DALAM periode (untuk hitung mundur jika prev tidak ada)
            LEFT JOIN logasetbarang first_log ON first_log.id = (
                SELECT MIN(id) FROM logasetbarang 
                WHERE kode = subquery.kode AND tanggal >= '$startDate' AND tanggal <= '$endDate' AND lokasi = '$lokasi'
            )"
        );
        return $query->getResult();
    }

    public function getStokAkhir($startDate, $endDate, $lokasi)
    {
        $query = $this->db->query(
            "SELECT 
                l.kode AS kode_aset,
                l.ketersediaan AS stok_akhir,
                mb.namabarang, 
                mb.jenisbarang AS unit, 
                l.keterangan
            FROM logasetbarang l
            JOIN (
                SELECT MAX(id) AS max_id
                FROM logasetbarang
                WHERE tanggal >= '$startDate' AND tanggal <= '$endDate' AND lokasi = '$lokasi'
                GROUP BY kode
            ) AS latest ON l.id = latest.max_id
            LEFT JOIN masterbarang mb ON l.kode = mb.kodebarang"
        );

        return $query->getResult();
    }
}
