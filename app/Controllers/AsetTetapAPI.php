<?php

namespace App\Controllers;

use CodeIgniter\RESTful\ResourceController;
use CodeIgniter\API\ResponseTrait;
use App\Models\AsetTetapModel;

class AsetTetapAPI extends ResourceController
{
    use ResponseTrait;
    // get all product


    public function index()
    {
        $model  = new AsetTetapModel();
        $filter = $this->request->getGet();
        $filter['search'] = $filter['search'] ?? '';

        $data = $model->searchData($filter);
        return $this->respond($data);
    }

    public function create()
    {
        $model = new AsetTetapModel();
        $data  = $this->request->getPost();

        if (intval($data['jumlah'] ?? 0) < 1) {
            return $this->fail('Jumlah aset minimal harus 1');
        }

        $result = $model->insertMultipleRecords($data);

        if ($result === true || is_int($result)) {
            return $this->respondCreated(['status' => 'success', 'msg' => 'Aset tetap berhasil ditambahkan']);
        }

        return $this->fail($result ?: 'Gagal menambahkan aset tetap');
    }

    public function update($id = null)
    {
        $model = new AsetTetapModel();
        $kode  = $this->request->getJsonVar('kode') ?? $id;
        $json  = $this->request->getJSON();

        if ($model->update($kode, $json)) {
            return $this->respond([
                'status'   => 200,
                'messages' => ['success' => 'Data berhasil diperbarui']
            ]);
        }
        
        return $this->fail($model->errors() ?: 'Gagal memperbarui data');
    }

    public function delete($id = null)
    {
        $model = new AsetTetapModel();
        $kode  = $this->request->getJsonVar('kode') ?? $id;
        
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
