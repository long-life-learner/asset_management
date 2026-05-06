<?php

namespace App\Controllers;

use App\Models\MasterAsetModel;

class MasterAset extends BaseController
{
    public function index()
    {
        $model = new MasterAsetModel();
        return $this->response->setJSON($model->findAll());
    }

    public function searchLastCode()
    {
        $model = new MasterAsetModel();
        $filter = $this->request->getGet();
        $filter['search'] = $filter['search'] ?? '';
        $filter['type'] = $filter['type'] ?? 'Aset Tetap';

        $data = $model->searchByKodeAndNama($filter);

        $results = [];
        foreach ($data as $item) {
            $stockInfo = "(" . ($item['ketersediaan'] ?? 0) . ") - " . ($item['unit'] ?? 'Unit');
            $desc = $item['namabarang'] . ' ' . $item['merk'] . ' ' . $item['tipebarang'];
            $results[] = [
               'id'    => $item['kodebarang'],
                'text'  => $item['kodebarang'] . ' - ' . $desc . ' ' . $stockInfo,
                'stock' => $item['ketersediaan'] ?? 0,
            ];
        }
        
        return $this->response->setJSON(['results' => $results]);
    }
}
