<?php

namespace App\Controllers;

use App\Models\AsetBergerakModel;
use App\Models\LogAsetModel;
use Myth\Auth\Models\UserModel;

class AsetBergerak extends BaseController
{
    public function dashboard()
    {
        $data['title'] = 'Aset Bergerak';
        $users = model(UserModel::class);
        $model = new AsetBergerakModel();

        $data['user'] = $users->find(session()->get('logged_in'));
        $data['asetBergerakLog'] = $model->getAsetBergerakLog();
        $data['asetBergerakStock'] = $model->getAsetStock();

        return view('aset-bergerak/dashboard', $data);
    }

    public function index(): string
    {
        $users = model(UserModel::class);
        $data['user'] = $users->find(session()->get('logged_in'));
        $data['title'] = 'Manajemen Aset Bergerak';
        return view('aset-bergerak', $data);
    }

    public function distinct($param)
    {
        $model = new AsetBergerakModel();
        return $this->response->setJSON($model->getUniqueValues($param));
    }

    public function select2()
    {
        $model = new AsetBergerakModel();
        $data = $model->select(['kodebarang', 'namabarang'])->findAll();

        $results = array_map(function ($item) {
            return [
                'id'   => $item['kodebarang'],
                'text' => "{$item['kodebarang']} - {$item['namabarang']}"
            ];
        }, $data);

        return $this->response->setJSON(['results' => $results]);
    }

    public function transaction()
    {
        $data = $this->request->getPost();
        $asetBergerakModel = new AsetBergerakModel();

        // 1. Hitung stok baru
        $currentStock = intval($data['stock'] ?? 0);
        $mutationQty  = intval($data['jumlah'] ?? 0);
        $isMasuk      = ($data['statusbarang'] === 'Masuk');

        $newStock = $isMasuk ? ($currentStock + $mutationQty) : ($currentStock - $mutationQty);

        // 2. Update Master Data
        $updateStatus = $asetBergerakModel->update($data['kode'], [
            "ketersediaan" => $newStock
        ]);

        if (!$updateStatus) {
            return $this->response->setJSON([
                "status" => "error",
                "msg"    => "Gagal update master data. Kode aset mungkin tidak ditemukan."
            ]);
        }

        // 3. Simpan Log Transaksi
        $logTransaksiModel = new LogAsetModel();
        $users = model(UserModel::class);
        $user  = $users->find(session()->get('logged_in'));

        if (!$isMasuk && $newStock < 0) {
            return $this->response->setJSON([
                "status" => "error",
                "msg"    => "Jumlah keluar melebihi stok tersedia"
            ]);
        }

        $logData = [
            'kode'          => $data['kode'],
            'statusbarang'  => $data['statusbarang'],
            'jumlah'        => $mutationQty,
            'ketersediaan'  => $newStock,
            'keterangan'    => $data['keterangan'] ?? '',
            'tanggal'       => date("Y-m-d"),
            'user_log_in'   => $user->username ?? 'system',
            'lokasi'        => $asetBergerakModel->find($data['kode'])['lokasi'] ?? '-',
            'pic'           => $data['pic'] ?? '',
            'dari'          => $data['dari'] ?? '',
            'tujuan'        => $data['tujuan'] ?? ''
        ];

        if ($logTransaksiModel->insert($logData, false)) {
            return $this->response->setJSON(["status" => "success", "msg" => "Transaksi aset berhasil dicatat"]);
        }

        return $this->response->setJSON(["status" => "error", "msg" => "Gagal mencatat log transaksi"]);
    }
}
