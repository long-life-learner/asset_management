<?php

namespace App\Controllers;

use CodeIgniter\RESTful\ResourceController;
use CodeIgniter\API\ResponseTrait;
use App\Models\AsetBergerakModel;

class AsetBergerakAPI extends ResourceController
{
    use ResponseTrait;
    // get all product


    public function index()
    {
        $model  = new AsetBergerakModel();
        $filter = $this->request->getGet();
        $filter['search'] = $filter['search'] ?? '';

        $data = $model->searchData($filter);

        // Check if barcode results requested
        if (($filter['type'] ?? '') === 'barcode') {
            $results = array_map(function($item) {
                return [
                    'id'   => $item['kodebarang'],
                    'text' => "{$item['kodebarang']} - {$item['namabarang']} ({$item['ketersediaan']}) - {$item['unit']}"
                ];
            }, $data);
            return $this->response->setJSON(['results' => $results]);
        }

        return $this->respond($data);
    }

    public function show($kode = null)
    {
        if (!$kode) return $this->fail('Kode barang diperlukan');
        
        $model = new AsetBergerakModel();
        $data  = $model->find($kode);
        
        if ($data) {
            return $this->respond($data);
        }

        // If not found in stock table, return 0 stock
        return $this->respond([
            'kodebarang'   => $kode,
            'ketersediaan' => 0,
            'unit'         => 'Unit'
        ]);
    }

    public function create()
    {
        $model = new AsetBergerakModel();
        $data  = $this->request->getJSON(true);

        if ($model->insert($data)) {
            $res = $model->find($data['kodebarang'] ?? $model->getInsertID());
            return $this->respondCreated($res);
        }
        
        return $this->fail($model->errors());
    }

    public function update($id = null)
    {
        $model = new AsetBergerakModel();
        $kode  = $this->request->getJsonVar('kodebarang') ?? $id;
        $json  = $this->request->getJSON();

        if ($model->update($kode, $json)) {
            return $this->respond([
                'status'   => 200,
                'messages' => ['success' => 'Data berhasil diperbarui']
            ]);
        }
        
        return $this->fail($model->errors());
    }

    public function delete($id = null)
    {
        $model = new AsetBergerakModel();
        $kode  = $this->request->getJsonVar('kodebarang') ?? $id;
        
        if ($model->find($kode)) {
            $model->delete($kode);
            return $this->respondDeleted([
                'status'   => 200,
                'messages' => ['success' => 'Data berhasil dihapus']
            ]);
        }

        return $this->failNotFound("Data dengan kode $id tidak ditemukan");
    }
}
