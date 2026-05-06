<?php

namespace App\Controllers;

use App\Models\AsetBergerakModel;
use App\Models\LogAsetModel;
use Config\Services;
use Myth\Auth\Models\UserModel;

class Pelaporan extends BaseController
{
    public function index(): string
    {
        $data['title'] = 'Pelaporan';
        $users = model(UserModel::class);
        $data['user'] = $users->find(session()->get('logged_in'));

        return view('pelaporan', $data);
    }

    public function getDataAndColumns($modelName = null, $forWhat = null)
    {
        $modelNamespace = '\App\Models\\' . ucfirst($modelName);

        // Check if the model exists
        if (class_exists($modelNamespace)) {
            $model = new $modelNamespace();

            // Fetch data and columns from the model
            $data = $model->findAll(); // Implement this method in your model
            // $columns = $model->getColumns(); // Implement this method in your model
            $columns = $model->getColumns();
            if (!is_null($forWhat)) {
            }
            return $this->response->setJSON(['data' => $data, 'columns' => $columns]);
        } else {
            // Model doesn't exist, handle accordingly (e.g., return an error response)dataTable
            return $this->response->setJSON(['error' => 'Model not found']);
        }
    }

    public function transaksiAset()
    {
        $data['title'] = 'Transaksi Aset';
        $users = model(UserModel::class);
        $data['user'] = $users->find(session()->get('logged_in'));
        return view('transaksi-aset', $data);
    }

    public function dataTable()
    {
        $start  = $this->request->getJsonVar('start');
        $end    = $this->request->getJsonVar('end');
        $lokasi = $this->request->getJsonVar('lokasi');

        $logTransaksiModel = new LogAsetModel();

        // STOK AWAL = ketersediaan sebelum periode (entri pertama di periode sebagai referensi)
        $stokAwalAsets  = $logTransaksiModel->getStokAwal($start, $end, $lokasi);

        // STOK AKHIR = ketersediaan pada entri terakhir di periode
        $stokAkhirAsets = $logTransaksiModel->getStokAkhir($start, $end, $lokasi);

        // Indeks stok akhir berdasarkan kode_aset agar pencarian O(1)
        $akhirIndex = [];
        foreach ($stokAkhirAsets as $akhirItem) {
            $akhirIndex[$akhirItem->kode_aset] = $akhirItem;
        }

        $mergedData = [];
        foreach ($stokAwalAsets as $awalItem) {
            $kode = $awalItem->kode_aset;
            if (!isset($akhirIndex[$kode])) continue;

            $akhirItem  = $akhirIndex[$kode];
            $stokAwal   = intval($awalItem->stok_awal);
            $stokAkhir  = intval($akhirItem->stok_akhir);
            $mutasi     = $stokAkhir - $stokAwal;

            $mergedData[] = [
                'kode'       => $kode,
                'namabarang' => $akhirItem->namabarang,
                'unit'       => $akhirItem->unit,
                'stok_awal'  => $stokAwal,
                'stok_akhir' => $stokAkhir,
                'mutasi'     => $mutasi,
                'keterangan' => $akhirItem->keterangan ?? ''
            ];
        }

        return $this->response->setJSON($mergedData);
    }
}
