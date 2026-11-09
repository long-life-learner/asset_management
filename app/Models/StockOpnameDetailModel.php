<?php

namespace App\Models;

use CodeIgniter\Model;

class StockOpnameDetailModel extends Model
{
    protected $table            = 'stock_opname_detail';
    protected $primaryKey       = 'id';
    protected $useAutoIncrement = true;
    protected $returnType       = 'array';
    protected $allowedFields    = [
        'opname_id',
        'kodebarang',
        'namabarang',
        'unit',
        'lokasi',
        'stok_sistem',
        'stok_fisik',
        'selisih',
        'keterangan'
    ];
}

