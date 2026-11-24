<?php

namespace App\Models;

use CodeIgniter\Model;

class AsetBergerakModel extends Model
{
    protected $table = 'barangbergerak';
    protected $primaryKey = 'kodebarang';
    protected $allowedFields = ['kodebarang', 'namabarang', 'statusbarang', 'unit', 'lokasi', 'ketersediaan', 'keterangan', 'tanggal'];
    // protected $useTimestamps = true;


    public function searchData($filter)
    {
        $builder = $this->db->table($this->table);
        $builder->like('kodebarang', $filter['search']);
        $builder->orLike('namabarang', $filter['search']);
        $builder->orLike('statusbarang', $filter['search']);
        $builder->orLike('unit', $filter['search']);
        $builder->orLike('lokasi', $filter['search']);
        $builder->orLike('ketersediaan', $filter['search']);
        $builder->orLike('keterangan', $filter['search']);
        $builder->orLike('tanggal', $filter['search']);
        $builder->orderBy('tanggal', 'DESC');
        // Add more columns as needed

        return $builder->get()->getResultArray();
    }

    public function getUniqueValues($col)
    {
        $builder = $this->db->table($this->table);
        $builder->distinct();
        $builder->select($col);
        $result = $builder->get()->getResultArray();

        // Extract values from the result array
        $values = array_column($result, $col);

        return $values;
    }

    // public function getData()
    // {
    //     // Fetch data from your database
    //     return $this->findAll(); // This is a basic example; adjust based on your requirements
    // }

    public function getColumns()
    {
        // Fetch columns from your database or define them statically
        // Example: return ['column1', 'column2', ...];
        return $this->db->getFieldNames($this->table);
    }

    public function getAsetBergerakLog()
    {
        // LEFT JOIN supaya transaksi dengan master/ruang belum ada tetap tampil.
        // "stok_saat_ini" diambil dari saldo barangbergerak sekarang, supaya
        // bisa dibandingkan dengan "ketersediaan" (snapshot saat transaksi).
        $query = $this->db->query('
        SELECT
            logasetbarang.kode,
            COALESCE(NULLIF(TRIM(masterbarang.namabarang), \'\'), NULLIF(TRIM(logasetbarang.namabarang), \'\'), logasetbarang.kode) AS namabarang,
            masterbarang.merk,
            masterbarang.jenisbarang,
            masterbarang.tipebarang,
            dataruang.namaruang,
            logasetbarang.statusbarang,
            logasetbarang.jumlah,
            logasetbarang.ketersediaan,
            barangbergerak.ketersediaan AS stok_saat_ini,
            logasetbarang.tanggal,
            logasetbarang.pic,
            logasetbarang.user_log_in,
            logasetbarang.tujuan,
            logasetbarang.dari,
            logasetbarang.keterangan
        FROM logasetbarang
        LEFT JOIN masterbarang ON logasetbarang.kode = masterbarang.kodebarang
        LEFT JOIN dataruang ON logasetbarang.lokasi = dataruang.koderuang
        LEFT JOIN barangbergerak ON logasetbarang.kode = barangbergerak.kodebarang
        ORDER BY logasetbarang.tanggal DESC, logasetbarang.id DESC');
        return $query->getResultArray();
    }

    public function getAsetStock()
    {
        // LEFT JOIN supaya aset yang belum punya master/ruang tetap tampil.
        $query = $this->db->query("
        SELECT
            barangbergerak.kodebarang,
            COALESCE(NULLIF(TRIM(masterbarang.namabarang), ''), NULLIF(TRIM(barangbergerak.namabarang), ''), barangbergerak.kodebarang) AS namabarang,
            masterbarang.merk,
            masterbarang.jenisbarang,
            masterbarang.tipebarang,
            barangbergerak.ketersediaan,
            dataruang.namaruang,
            barangbergerak.keterangan
        FROM barangbergerak
        LEFT JOIN masterbarang
        ON barangbergerak.kodebarang = masterbarang.kodebarang
        LEFT JOIN dataruang
        ON barangbergerak.lokasi = dataruang.koderuang
        ");
        return $query->getResultArray();
    }
}
