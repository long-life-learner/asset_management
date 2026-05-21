<?php

namespace App\Models;

use CodeIgniter\Model;

class MasterAsetModel extends Model
{
    protected $table = 'masterbarang';
    protected $primaryKey = 'kodebarang';
    protected $allowedFields = ['kodebarang', 'namabarang', 'jenisbarang', 'tipebarang', 'jumlah', 'keterangan', 'merk', 'jenis_aset'];
    // protected $useTimestamps = true;
    public function searchData($filter)
    {
        $builder = $this->db->table($this->table);
        $builder->like('kodebarang', $filter['search']);
        $builder->orLike('namabarang', $filter['search']);
        $builder->orLike('jenisbarang', $filter['search']);
        $builder->orLike('tipebarang', $filter['search']);
        $builder->orLike('merk', $filter['search']);
        $builder->orLike('jumlah', $filter['search']);
        $builder->orLike('keterangan', $filter['search']);
        // Add more columns as needed

        return $builder->get()->getResultArray();
    }

    public function searchByKodeAndNama($filter)
    {
        $search = $this->db->escapeLikeString($filter['search']);
        $type = $this->db->escapeString($filter['type']);

        $sql = "
            SELECT m.kodebarang, m.namabarang, m.merk, m.tipebarang,
                   COALESCE(b.ketersediaan, 0) as ketersediaan, m.jenisbarang AS unit
            FROM masterbarang AS m
            LEFT JOIN (
                SELECT kodebarang, SUM(ketersediaan) as ketersediaan 
                FROM barangbergerak 
                GROUP BY kodebarang
            ) AS b ON m.kodebarang = b.kodebarang
            WHERE (m.kodebarang LIKE '%$search%' 
               OR m.namabarang LIKE '%$search%') AND m.jenis_aset = '$type'
            LIMIT 20
        ";

        return $this->db->query($sql)->getResultArray();
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

    public function getColumns()
    {
        // Fetch columns from your database or define them statically
        // Example: return ['column1', 'column2', ...];
        return $this->db->getFieldNames($this->table);
    }
}
