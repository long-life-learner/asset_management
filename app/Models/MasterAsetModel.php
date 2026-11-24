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

    /**
     * Buat rekomendasi kode aset yang unik berdasarkan nama barang.
     *
     * Pola: 3 karakter awal nama (huruf/angka) + nomor urut 2 digit,
     * contoh "KUR01".
     * Nomor urut diambil dari kode terbesar dengan prefix yang sama,
     * lalu dipastikan belum dipakai di masterbarang maupun barangbergerak.
     */
    public function generateUniqueKode(string $nama = ''): string
    {
        $prefix = $this->buildKodePrefix($nama);

        // Batas maksimal panjang kodebarang (varchar 9)
        $maxLength = 9;
        $digitLength = 2;

        $maxNumber = 0;
        $rows = $this->db->table($this->table)
            ->select('kodebarang')
            ->like('kodebarang', $prefix, 'after')
            ->get()
            ->getResultArray();

        foreach ($rows as $row) {
            $suffix = substr((string) $row['kodebarang'], strlen($prefix));
            if ($suffix !== '' && ctype_digit($suffix)) {
                $maxNumber = max($maxNumber, (int) $suffix);
            }
        }

        $next = $maxNumber + 1;

        do {
            $kode = $prefix . str_pad((string) $next, $digitLength, '0', STR_PAD_LEFT);
            $next++;
        } while ($this->kodeExists($kode) && $next < 100000);

        return substr($kode, 0, $maxLength);
    }

    /**
     * Cek apakah kode sudah dipakai di masterbarang atau barangbergerak.
     */
    public function kodeExists(string $kode): bool
    {
        if ($this->db->table($this->table)->where('kodebarang', $kode)->countAllResults() > 0) {
            return true;
        }

        if ($this->db->tableExists('barangbergerak')
            && $this->db->table('barangbergerak')->where('kodebarang', $kode)->countAllResults() > 0
        ) {
            return true;
        }

        return false;
    }

    /**
     * Bentuk prefix 3 huruf dari nama barang (3 huruf/angka pertama nama).
     * Contoh: "Kursi Putar" -> "KUR", "AC" -> "ACX".
     */
    private function buildKodePrefix(string $nama): string
    {
        $clean = strtoupper((string) preg_replace('/[^A-Za-z0-9]/', '', $nama));

        if ($clean === '') {
            return 'AST';
        }

        return str_pad(substr($clean, 0, 3), 3, 'X');
    }
}
