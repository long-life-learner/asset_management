<?php

namespace App\Controllers;

use App\Models\LogAsetModel;
use App\Models\AsetBergerakModel;
use CodeIgniter\API\ResponseTrait;
use Myth\Auth\Models\UserModel;

class Home extends BaseController
{
    use ResponseTrait;

    public function index(): string
    {
        $data['title'] = 'Dashboard';
        $users = model(UserModel::class);
        $logModel = new LogAsetModel();
        $asetBergerakModel = new AsetBergerakModel();
        
        $data['user'] = $users->find(session()->get('logged_in'));

        // 1. Stats Summary
        $data['today_in'] = $logModel->where('tanggal', date('Y-m-d'))->where('statusbarang', 'masuk')->countAllResults();
        $data['today_out'] = $logModel->where('tanggal', date('Y-m-d'))->where('statusbarang', 'keluar')->countAllResults();
        $data['stok_0'] = $asetBergerakModel->where('ketersediaan', 0)->countAllResults();

        // 2. Top 10 Less Stock (JOIN masterbarang)
        $data['top_less_stock'] = $asetBergerakModel
            ->select('barangbergerak.kodebarang, masterbarang.namabarang, barangbergerak.ketersediaan, dataruang.namaruang, barangbergerak.unit')
            ->join('masterbarang', 'barangbergerak.kodebarang = masterbarang.kodebarang')
            ->join('dataruang', 'barangbergerak.lokasi = dataruang.koderuang')
            ->orderBy('barangbergerak.ketersediaan', 'ASC')
            ->limit(10)
            ->findAll();

        // 3. Top 10 Most Stock (JOIN masterbarang)
        $data['top_most_stock'] = $asetBergerakModel
            ->select('barangbergerak.kodebarang, masterbarang.namabarang, barangbergerak.ketersediaan, dataruang.namaruang, barangbergerak.unit')
            ->join('masterbarang', 'barangbergerak.kodebarang = masterbarang.kodebarang')
            ->join('dataruang', 'barangbergerak.lokasi = dataruang.koderuang')
            ->orderBy('barangbergerak.ketersediaan', 'DESC')
            ->limit(10)
            ->findAll();

        // 4. Stok 0 All (JOIN masterbarang)
        $data['stok_0_all'] = $asetBergerakModel
            ->select('barangbergerak.kodebarang, masterbarang.namabarang, dataruang.namaruang, barangbergerak.tanggal')
            ->join('masterbarang', 'barangbergerak.kodebarang = masterbarang.kodebarang')
            ->join('dataruang', 'barangbergerak.lokasi = dataruang.koderuang')
            ->where('barangbergerak.ketersediaan', 0)
            ->findAll();

        // 5. Today Transactions (JOIN masterbarang)
        $data['today_in_all'] = $logModel
            ->select('logasetbarang.*, masterbarang.namabarang, dataruang.namaruang')
            ->join('masterbarang', 'logasetbarang.kode = masterbarang.kodebarang')
            ->join('dataruang', 'logasetbarang.lokasi = dataruang.koderuang')
            ->where('logasetbarang.tanggal', date('Y-m-d'))
            ->where('logasetbarang.statusbarang', 'masuk')
            ->findAll();

        $data['today_out_all'] = $logModel
            ->select('logasetbarang.*, masterbarang.namabarang, dataruang.namaruang')
            ->join('masterbarang', 'logasetbarang.kode = masterbarang.kodebarang')
            ->join('dataruang', 'logasetbarang.lokasi = dataruang.koderuang')
            ->where('logasetbarang.tanggal', date('Y-m-d'))
            ->where('logasetbarang.statusbarang', 'keluar')
            ->findAll();

        // 6. Analysis - Most Transaction by Product
        $data['most_transaction_by_product'] = $logModel
            ->select('logasetbarang.kode, COUNT(*) as transaction_count, masterbarang.namabarang, dataruang.namaruang')
            ->join('masterbarang', 'logasetbarang.kode = masterbarang.kodebarang')
            ->join('dataruang', 'logasetbarang.lokasi = dataruang.koderuang')
            ->groupBy('logasetbarang.kode')
            ->orderBy('transaction_count', 'DESC')
            ->limit(10)
            ->findAll();

        // 7. Analysis - Most Transaction by Location
        $data['most_transaction_by_location'] = $logModel
            ->select('logasetbarang.lokasi, COUNT(*) as transaction_count, dataruang.namaruang')
            ->join('dataruang', 'logasetbarang.lokasi = dataruang.koderuang')
            ->groupBy('logasetbarang.lokasi')
            ->orderBy('transaction_count', 'DESC')
            ->limit(10)
            ->findAll();

        return view('dashboard', $data);
    }

    public function weeklyStockData()
    {
        $logModel = new LogAsetModel();
        $stockData = $logModel->getAllTimeStockData();

        $formattedStockData  = [];
        foreach ($stockData as $row) {
            $timestamp = strtotime($row['date']);
            $formattedStockData[] = [
                $timestamp * 1000,
                (float) $row['total_quantity'],
            ];
        }

        return $this->respond($formattedStockData);
    }
}
