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

        // 1. Hitung stok baru dari database (bukan dari nilai yang dikirim browser)
        //    agar saldo tabel master dan snapshot di log selalu konsisten.
        $kode = $data['kode'] ?? null;
        $barang = $kode ? $asetBergerakModel->find($kode) : null;

        if (!$barang) {
            return $this->response->setJSON([
                "status" => "error",
                "msg"    => "Kode aset tidak ditemukan."
            ]);
        }

        $currentStock = (int) $barang['ketersediaan'];
        $mutationQty  = intval($data['jumlah'] ?? 0);
        $isMasuk      = ($data['statusbarang'] === 'Masuk');
        $newStock     = $isMasuk ? $currentStock + $mutationQty : $currentStock - $mutationQty;

        if ($mutationQty <= 0) {
            return $this->response->setJSON([
                "status" => "error",
                "msg"    => "Jumlah transaksi harus lebih dari 0."
            ]);
        }

        if (!$isMasuk && $newStock < 0) {
            return $this->response->setJSON([
                "status" => "error",
                "msg"    => "Jumlah keluar melebihi stok tersedia"
            ]);
        }

        // 2. Update stok di barangbergerak DAN masterbarang agar tetap sinkron
        $updateStatus = $asetBergerakModel->update($kode, [
            "ketersediaan" => $newStock
        ]);

        if (!$updateStatus) {
            return $this->response->setJSON([
                "status" => "error",
                "msg"    => "Gagal update master data. Kode aset mungkin tidak ditemukan."
            ]);
        }

        // 3. Simpan Log Transaksi
        $db = \Config\Database::connect();
        $db->query("UPDATE masterbarang SET jumlah = ? WHERE kodebarang = ?", [$newStock, $kode]);

        $logTransaksiModel = new LogAsetModel();
        $users = model(UserModel::class);
        $user  = $users->find(session()->get('logged_in'));

        $logData = [
            'kode'          => $data['kode'],
            'statusbarang'  => $data['statusbarang'],
            'jumlah'        => $mutationQty,
            'ketersediaan'  => $newStock,
            'keterangan'    => $data['keterangan'] ?? '',
            'tanggal'       => date("Y-m-d"),
            'user_log_in'   => $user->username ?? 'system',
            'lokasi'        => $barang['lokasi'] ?? '-',
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
