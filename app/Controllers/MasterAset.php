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
        $item = $model->find(strtoupper(trim($term)));
        if ($item) {
            return $this->response->setJSON(['status' => 'error', 'msg' => 'Kode sudah digunakan']);
        }

        return $this->response->setJSON(['status' => 'ok']);
    }

    /**
     * Rekomendasi kode aset unik untuk form tambah master aset.
     * Contoh: /master-aset/generate-code?nama=Kursi%20Putar
     */
    public function generateCode()
    {
        $model = new MasterAsetModel();
        $nama  = (string) ($this->request->getGet('nama') ?? '');
        $kode  = $model->generateUniqueKode($nama);

        return $this->response->setJSON([
            'status' => 'success',
            'kode'   => $kode,
            'unik'   => ! $model->kodeExists($kode),
        ]);
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
        $kode  = strtoupper(trim((string) $this->request->getPost('kodebarang')));

        if ($kode === '') {
            return $this->response->setJSON(['status' => 'error', 'msg' => 'Kode aset wajib diisi.']);
        }

        if ($model->kodeExists($kode)) {
            return $this->response->setJSON(['status' => 'error', 'msg' => 'Kode aset "' . $kode . '" sudah digunakan. Silakan gunakan kode lain.']);
        }

        $data = [
            'kodebarang'  => $kode,
            'namabarang'  => $this->request->getPost('namabarang'),
            'merk'        => $this->request->getPost('merk'),
            'jenisbarang' => $this->request->getPost('jenisbarang'),
            'tipebarang'  => $this->request->getPost('tipebarang'),
            'jenis_aset'  => $this->request->getPost('jenis_aset'), // 'Aset Tetap' or 'Aset Bergerak'
            'keterangan'  => $this->request->getPost('keterangan'),
        ];

        try {
            if ($model->insert($data, false)) {
                return $this->response->setJSON(['status' => 'success', 'msg' => 'Aset master berhasil didaftarkan']);
            }
        } catch (\Throwable $e) {
            return $this->response->setJSON(['status' => 'error', 'msg' => 'Gagal mendaftarkan aset: ' . $e->getMessage()]);
        }

        return $this->response->setJSON(['status' => 'error', 'msg' => 'Gagal mendaftarkan aset. Kode mungkin sudah ada.']);
    }
}
