<?php

namespace App\Controllers;

use App\Models\MasterAsetModel;

class MasterAset extends BaseController
{
    public function index()
    {
        // If request expects JSON (API), return data, otherwise render admin view
        $model = new MasterAsetModel();
        $accept = $this->request->getHeaderLine('Accept');
        if ($this->request->isAJAX() || strpos($accept, 'application/json') !== false) {
            return $this->response->setJSON($model->findAll());
        }

        // Render admin page (only accessible via route filter)
        $data['title'] = 'Master Aset';
        return view('master-aset-crud', $data);
    }

    public function distinct($col)
    {
        $model = new MasterAsetModel();
        $values = $model->getUniqueValues($col);
        return $this->response->setJSON($values);
    }

    public function search()
    {
        $term = $this->request->getGet('search');
        if (!$term) return $this->response->setJSON(['status' => 'ok']);

        $model = new MasterAsetModel();
        // check by kodebarang
        $item = $model->find($term);
        if ($item) {
            return $this->response->setJSON(['status' => 'error', 'msg' => 'Kode sudah digunakan']);
        }

        return $this->response->setJSON(['status' => 'ok']);
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

    public function store()
    {
        $model = new MasterAsetModel();
        $data = [
            'kodebarang'  => strtoupper($this->request->getPost('kodebarang')),
            'namabarang'  => $this->request->getPost('namabarang'),
            'merk'        => $this->request->getPost('merk'),
            'tipebarang'  => $this->request->getPost('tipebarang'),
            'jenis_aset'  => $this->request->getPost('jenis_aset'), // 'Aset Tetap' or 'Aset Bergerak'
            'keterangan'  => $this->request->getPost('keterangan'),
        ];

        if ($model->insert($data)) {
            return $this->response->setJSON(['status' => 'success', 'msg' => 'Aset master berhasil didaftarkan']);
        }

        return $this->response->setJSON(['status' => 'error', 'msg' => 'Gagal mendaftarkan aset. Kode mungkin sudah ada.'], 500);
    }
}
