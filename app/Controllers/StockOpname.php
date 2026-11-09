<?php

namespace App\Controllers;

use App\Models\AsetBergerakModel;
use App\Models\LogAsetModel;
use App\Models\MasterAsetModel;
use App\Models\StockOpnameModel;
use App\Models\StockOpnameDetailModel;
use PhpOffice\PhpSpreadsheet\Spreadsheet;
use PhpOffice\PhpSpreadsheet\Writer\Xlsx;
use PhpOffice\PhpSpreadsheet\IOFactory;
use PhpOffice\PhpSpreadsheet\Style\Alignment;
use PhpOffice\PhpSpreadsheet\Style\Border;
use PhpOffice\PhpSpreadsheet\Style\Fill;

class StockOpname extends BaseController
{
    protected StockOpnameModel $opnameModel;
    protected StockOpnameDetailModel $detailModel;
    protected AsetBergerakModel $asetBergerakModel;

    public function initController(
        \CodeIgniter\HTTP\RequestInterface $request,
        \CodeIgniter\HTTP\ResponseInterface $response,
        \Psr\Log\LoggerInterface $logger
    ): void {
        parent::initController($request, $response, $logger);

        $this->opnameModel       = new StockOpnameModel();
        $this->detailModel       = new StockOpnameDetailModel();
        $this->asetBergerakModel = new AsetBergerakModel();

        // Pastikan tabel di database sudah siap
        $this->opnameModel->ensureTableExists();
    }

    /**
     * Halaman Dashboard Riwayat Stock Opname
     */
    public function index(): string
    {
        $data['title'] = 'Stock Opname';
        $data['opnameList'] = $this->opnameModel->orderBy('id', 'DESC')->findAll();

        // Ringkasan Statistik
        $data['totalOpname'] = count($data['opnameList']);
        $data['lastOpname']  = !empty($data['opnameList']) ? $data['opnameList'][0]['tanggal_opname'] : '-';

        return view('stock-opname/index', $data);
    }

    /**
     * Halaman Form Input Stock Opname Baru
     */
    public function create(): string
    {
        $db = \Config\Database::connect();

        // Ambil semua barang bergerak yang terdaftar
        $query = $db->query("
            SELECT bb.kodebarang, bb.namabarang, bb.unit, bb.lokasi, bb.ketersediaan,
                   COALESCE(dr.namaruang, bb.lokasi) AS namaruang, bb.keterangan
            FROM barangbergerak bb
            LEFT JOIN dataruang dr ON bb.lokasi = dr.koderuang
            ORDER BY bb.namabarang ASC
        ");

        $data['title']       = 'Sesi Stock Opname Baru';
        $data['kodeOpname']  = $this->opnameModel->generateKodeOpname();
        $data['tanggalHariIni'] = date('Y-m-d');
        $data['petugas']     = session()->get('sso_user_name') ?: (session()->get('user')['username'] ?? 'Petugas Logistik');
        $data['items']       = $query->getResultArray();

        // Ambil daftar lokasi ruang untuk filter
        $lokasiQuery = $db->query("SELECT koderuang, namaruang FROM dataruang ORDER BY namaruang ASC");
        $data['lokasiList']  = $lokasiQuery->getResultArray();

        return view('stock-opname/create', $data);
    }

    /**
     * Download Template Excel Resmi Stock Opname
     * Format kolom terstandarisasi untuk konsistensi data
     */
    public function downloadTemplate()
    {
        $db = \Config\Database::connect();
        $query = $db->query("
            SELECT bb.kodebarang, bb.namabarang, bb.unit, bb.lokasi, bb.ketersediaan,
                   COALESCE(dr.namaruang, bb.lokasi) AS namaruang, bb.keterangan
            FROM barangbergerak bb
            LEFT JOIN dataruang dr ON bb.lokasi = dr.koderuang
            ORDER BY bb.namabarang ASC
        ");
        $items = $query->getResultArray();

        $spreadsheet = new Spreadsheet();
        $sheet = $spreadsheet->getActiveSheet();
        $sheet->setTitle('Stock Opname');

        // Header Dokumen
        $sheet->mergeCells('A1:H1');
        $sheet->setCellValue('A1', 'POLITEKNIK GAJAH TUNGGAL - FORMULIR RESMI STOCK OPNAME');
        $sheet->getStyle('A1')->getFont()->setBold(true)->setSize(14)->setColor(new \PhpOffice\PhpSpreadsheet\Style\Color('1D4ED8'));
        $sheet->getStyle('A1')->getAlignment()->setHorizontal(Alignment::HORIZONTAL_CENTER);

        $sheet->mergeCells('A2:H2');
        $sheet->setCellValue('A2', 'Tanggal Cetak: ' . date('d F Y') . ' | Panduan: Isi kolom [STOK FISIK] & [KETERANGAN FISIK], lalu upload kembali ke sistem.');
        $sheet->getStyle('A2')->getFont()->setItalic(true)->setSize(10)->setColor(new \PhpOffice\PhpSpreadsheet\Style\Color('64748B'));
        $sheet->getStyle('A2')->getAlignment()->setHorizontal(Alignment::HORIZONTAL_CENTER);

        // Header Kolom Tabel
        $headers = [
            'A4' => 'NO.',
            'B4' => 'KODE BARANG',
            'C4' => 'NAMA BARANG (KUNCI UTAMA)',
            'D4' => 'LOKASI RUANG',
            'E4' => 'SATUAN',
            'F4' => 'STOK SISTEM',
            'G4' => 'STOK FISIK AKTUAL *',
            'H4' => 'KETERANGAN / KONDISI'
        ];

        foreach ($headers as $cell => $val) {
            $sheet->setCellValue($cell, $val);
        }

        // Style Header Tabel
        $headerStyle = [
            'font' => ['bold' => true, 'color' => ['rgb' => 'FFFFFF'], 'size' => 10],
            'alignment' => ['horizontal' => Alignment::HORIZONTAL_CENTER, 'vertical' => Alignment::VERTICAL_CENTER],
            'fill' => [
                'fillType' => Fill::FILL_SOLID,
                'startColor' => ['rgb' => '1E293B'] // Navy Dark Sleek
            ],
            'borders' => ['allBorders' => ['borderStyle' => Border::BORDER_THIN, 'color' => ['rgb' => 'CBD5E1']]]
        ];
        $sheet->getStyle('A4:H4')->applyFromArray($headerStyle);
        $sheet->getRowDimension(4)->setRowHeight(28);

        // Warna khusus untuk kolom input petugas (Kolom G)
        $sheet->getStyle('G4')->getFill()->setFillType(Fill::FILL_SOLID)->getStartColor()->setRGB('2563EB');

        // Isi Data Barang
        $rowNum = 5;
        foreach ($items as $idx => $item) {
            $sheet->setCellValue('A' . $rowNum, $idx + 1);
            $sheet->setCellValue('B' . $rowNum, $item['kodebarang']);
            $sheet->setCellValue('C' . $rowNum, $item['namabarang']);
            $sheet->setCellValue('D' . $rowNum, $item['namaruang']);
            $sheet->setCellValue('E' . $rowNum, $item['unit']);
            $sheet->setCellValue('F' . $rowNum, (int) $item['ketersediaan']);
            // Kolom G default diisi sama dengan stok sistem sebagai acuan (bisa langsung diedit oleh petugas)
            $sheet->setCellValue('G' . $rowNum, (int) $item['ketersediaan']);
            $sheet->setCellValue('H' . $rowNum, $item['keterangan'] ?? '');

            // Alignment
            $sheet->getStyle('A' . $rowNum)->getAlignment()->setHorizontal(Alignment::HORIZONTAL_CENTER);
            $sheet->getStyle('B' . $rowNum)->getAlignment()->setHorizontal(Alignment::HORIZONTAL_CENTER);
            $sheet->getStyle('D' . $rowNum)->getAlignment()->setHorizontal(Alignment::HORIZONTAL_CENTER);
            $sheet->getStyle('E' . $rowNum)->getAlignment()->setHorizontal(Alignment::HORIZONTAL_CENTER);
            $sheet->getStyle('F' . $rowNum)->getAlignment()->setHorizontal(Alignment::HORIZONTAL_RIGHT);
            $sheet->getStyle('G' . $rowNum)->getAlignment()->setHorizontal(Alignment::HORIZONTAL_RIGHT);

            // Highlight kolom input fisik agar terlihat jelas
            $sheet->getStyle('G' . $rowNum)->getFill()->setFillType(Fill::FILL_SOLID)->getStartColor()->setRGB('EFF6FF');
            $sheet->getStyle('G' . $rowNum)->getFont()->setBold(true)->setColor(new \PhpOffice\PhpSpreadsheet\Style\Color('1D4ED8'));

            $sheet->getStyle("A{$rowNum}:H{$rowNum}")->getBorders()->getAllBorders()->setBorderStyle(Border::BORDER_THIN)->getColor()->setRGB('E2E8F0');
            $rowNum++;
        }

        // Auto width kolom
        foreach (range('A', 'H') as $col) {
            $sheet->getColumnDimension($col)->setAutoSize(true);
        }

        $filename = 'Template_Stock_Opname_PGT_' . date('Ymd_His') . '.xlsx';

        header('Content-Type: application/vnd.openxmlformats-officedocument.spreadsheetml.sheet');
        header("Content-Disposition: attachment; filename=\"$filename\"");
        header('Cache-Control: max-age=0');

        $writer = new Xlsx($spreadsheet);
        $writer->save('php://output');
        exit;
    }

    /**
     * Upload & Parsing File Excel Stock Opname
     * Pencocokan dilakukan BERDASARKAN NAMA BARANG (bukan kode)
     */
    public function importExcel()
    {
        $file = $this->request->getFile('excel_file');

        if (!$file || !$file->isValid()) {
            return $this->response->setJSON([
                'status'  => 'error',
                'message' => 'File tidak valid atau tidak ditemukan.'
            ]);
        }

        $ext = strtolower($file->getClientExtension());
        if (!in_array($ext, ['xlsx', 'xls', 'csv'])) {
            return $this->response->setJSON([
                'status'  => 'error',
                'message' => 'Format file harus berupa Excel (.xlsx atau .xls).'
            ]);
        }

        try {
            $spreadsheet = IOFactory::load($file->getTempName());
            $sheet = $spreadsheet->getActiveSheet();
            $maxRow = $sheet->getHighestRow();

            // 1. Ambil seluruh data barang database saat ini untuk pencocokan berbasis nama
            $db = \Config\Database::connect();
            $dbItems = $db->query("SELECT kodebarang, namabarang, unit, lokasi, ketersediaan FROM barangbergerak")->getResultArray();

            // Normalisasi daftar nama barang di database
            $dbMap = [];
            foreach ($dbItems as $it) {
                $clean = $this->cleanName($it['namabarang']);
                $dbMap[$clean] = $it;
            }

            // 2. Deteksi letak header kolom (apakah baris 1 atau baris 4)
            $headerRow = 4;
            $headerFound = false;
            for ($r = 1; $r <= min(6, $maxRow); $r++) {
                $cVal = (string) $sheet->getCell("C{$r}")->getValue();
                if (stripos($cVal, 'NAMA') !== false || stripos($cVal, 'BARANG') !== false) {
                    $headerRow = $r;
                    $headerFound = true;
                    break;
                }
            }

            $startRow = $headerFound ? ($headerRow + 1) : 2;

            $parsedData = [];
            $totalMatched = 0;
            $totalNew = 0;
            $totalSurplus = 0;
            $totalDefisit = 0;

            for ($r = $startRow; $r <= $maxRow; $r++) {
                // Kolom C adalah Nama Barang
                $namaVal = (string) $sheet->getCell("C{$r}")->getValue();
                if (empty(trim($namaVal))) {
                    // Coba cek kolom B jika kolom C kosong (jika format berbeda)
                    $namaVal = (string) $sheet->getCell("B{$r}")->getValue();
                }

                $namaVal = trim($namaVal);
                if (empty($namaVal)) continue;

                $kodeVal   = trim((string) $sheet->getCell("B{$r}")->getValue());
                $unitVal   = trim((string) $sheet->getCell("E{$r}")->getValue()) ?: 'Pcs';
                $stokSistem= (int) $sheet->getCell("F{$r}")->getValue();
                $stokFisik = (int) $sheet->getCell("G{$r}")->getValue();
                $ketVal    = trim((string) $sheet->getCell("H{$r}")->getValue());

                // Pencocokan BERDASARKAN NAMA
                $cleanInput = $this->cleanName($namaVal);
                $matchedDb = $dbMap[$cleanInput] ?? null;

                // Jika belum cocok exact, coba substring match
                if (!$matchedDb) {
                    foreach ($dbMap as $cDb => $item) {
                        if (strlen($cleanInput) >= 6 && (strpos($cDb, $cleanInput) !== false || strpos($cleanInput, $cDb) !== false)) {
                            $matchedDb = $item;
                            break;
                        }
                    }
                }

                if ($matchedDb) {
                    $totalMatched++;
                    $finalKode   = $matchedDb['kodebarang'];
                    $finalNama   = $matchedDb['namabarang'];
                    $finalSistem = (int) $matchedDb['ketersediaan'];
                    $finalUnit   = $matchedDb['unit'] ?: $unitVal;
                    $finalLokasi = $matchedDb['lokasi'] ?: 'W007';
                } else {
                    $totalNew++;
                    $finalKode   = $kodeVal ?: 'NEW';
                    $finalNama   = $namaVal;
                    $finalSistem = $stokSistem;
                    $finalUnit   = $unitVal;
                    $finalLokasi = 'W007';
                }

                $selisih = $stokFisik - $finalSistem;
                if ($selisih > 0) $totalSurplus++;
                if ($selisih < 0) $totalDefisit++;

                $parsedData[] = [
                    'kodebarang'  => $finalKode,
                    'namabarang'  => $finalNama,
                    'unit'        => $finalUnit,
                    'lokasi'      => $finalLokasi,
                    'stok_sistem' => $finalSistem,
                    'stok_fisik'  => $stokFisik,
                    'selisih'     => $selisih,
                    'keterangan'  => $ketVal,
                    'is_matched'  => ($matchedDb !== null)
                ];
            }

            return $this->response->setJSON([
                'status'  => 'success',
                'summary' => [
                    'total_item'    => count($parsedData),
                    'total_matched' => $totalMatched,
                    'total_new'     => $totalNew,
                    'total_surplus' => $totalSurplus,
                    'total_defisit' => $totalDefisit,
                ],
                'data' => $parsedData
            ]);

        } catch (\Throwable $e) {
            return $this->response->setJSON([
                'status'  => 'error',
                'message' => 'Gagal membaca file Excel: ' . $e->getMessage()
            ]);
        }
    }

    /**
     * Simpan Hasil Finalisasi Stock Opname
     */
    public function save()
    {
        $post = $this->request->getPost();

        $kodeOpname   = trim($post['kode_opname'] ?? '');
        $tanggal      = trim($post['tanggal_opname'] ?? date('Y-m-d'));
        $petugas      = trim($post['petugas'] ?? 'Petugas Logistik');
        $lokasi       = trim($post['lokasi'] ?? 'Semua Lokasi');
        $keterangan   = trim($post['keterangan'] ?? '');
        $itemsJson    = $post['items'] ?? '[]';

        $items = json_decode($itemsJson, true);

        if (empty($kodeOpname) || empty($items)) {
            return $this->response->setJSON([
                'status'  => 'error',
                'message' => 'Data tidak lengkap. Harap periksa kembali rincian barang.'
            ]);
        }

        $db = \Config\Database::connect();
        $db->transBegin();

        try {
            // Selaraskan collation agar tidak terjadi error mix of collations
            try {
                $db->query("ALTER TABLE `barangbergerak` CONVERT TO CHARACTER SET utf8mb4 COLLATE utf8mb4_general_ci");
                $db->query("ALTER TABLE `masterbarang` CONVERT TO CHARACTER SET utf8mb4 COLLATE utf8mb4_general_ci");
            } catch (\Throwable $ignored) {
                try {
                    $db->query("SET NAMES 'latin1' COLLATE 'latin1_swedish_ci'");
                } catch (\Throwable $ignored2) {}
            }

            $totalItem = count($items);
            $totalSelisih = 0;

            // 1. Simpan Header Sesi Stock Opname
            $opnameId = $this->opnameModel->insert([
                'kode_opname'    => $kodeOpname,
                'tanggal_opname' => $tanggal,
                'petugas'        => $petugas,
                'lokasi'         => $lokasi,
                'total_item'     => $totalItem,
                'total_selisih'  => 0, // diupdate setelah loop
                'keterangan'     => $keterangan,
                'created_at'     => date('Y-m-d H:i:s')
            ]);

            $logModel = new LogAsetModel();

            // 2. Simpan Rincian & Update Database Stok
            foreach ($items as $it) {
                $kode   = trim($it['kodebarang']);
                $nama   = trim($it['namabarang']);
                $unit   = trim($it['unit']);
                $lok    = trim($it['lokasi'] ?? 'W007');
                $sistem = (int) $it['stok_sistem'];
                $fisik  = (int) $it['stok_fisik'];
                $selisih= $fisik - $sistem;
                $ket    = trim($it['keterangan'] ?? '');

                if ($selisih != 0) {
                    $totalSelisih += abs($selisih);
                }

                // A. Simpan ke stock_opname_detail
                $this->detailModel->insert([
                    'opname_id'   => $opnameId,
                    'kodebarang'  => $kode,
                    'namabarang'  => $nama,
                    'unit'        => $unit,
                    'lokasi'      => $lok,
                    'stok_sistem' => $sistem,
                    'stok_fisik'  => $fisik,
                    'selisih'     => $selisih,
                    'keterangan'  => $ket
                ]);

                // B. UPDATE STOK BERDASARKAN NAMA BARANG (dan Kode)
                $db->query("
                    UPDATE `barangbergerak`
                    SET `ketersediaan` = ?, `unit` = ?, `keterangan` = ?, `tanggal` = ?
                    WHERE `namabarang` = ? OR `kodebarang` = ?
                ", [$fisik, $unit, $ket, $tanggal, $nama, $kode]);

                $db->query("
                    UPDATE `masterbarang`
                    SET `jumlah` = ?, `jenisbarang` = ?, `keterangan` = ?
                    WHERE `namabarang` = ? OR `kodebarang` = ?
                ", [$fisik, $unit, $ket, $nama, $kode]);

                // C. Jika ada selisih, catat otomatis ke logasetbarang sebagai audit trail
                if ($selisih != 0) {
                    $statusMutasi = ($selisih > 0) ? 'Masuk' : 'Keluar';
                    $logKet = "[Stock Opname $kodeOpname] Selisih fisik: " . ($selisih > 0 ? "+$selisih" : "$selisih") . ". " . $ket;

                    $db->query("
                        INSERT INTO `logasetbarang`
                        (`kode`, `namabarang`, `statusbarang`, `unit`, `jumlah`, `lokasi`, `ketersediaan`, `keterangan`, `tanggal`, `pic`, `user_log_in`, `tujuan`, `dari`)
                        VALUES (?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?)
                    ", [
                        $kode,
                        $nama,
                        $statusMutasi,
                        $unit,
                        abs($selisih),
                        $lok,
                        $fisik,
                        $logKet,
                        $tanggal,
                        $petugas,
                        session()->get('sso_user_name') ?? 'Admin',
                        'Stock Opname',
                        'Penyesuaian Fisik'
                    ]);
                }
            }

            // 3. Update total selisih di header opname
            $this->opnameModel->update($opnameId, ['total_selisih' => $totalSelisih]);

            if ($db->transStatus() === false) {
                $db->transRollback();
                return $this->response->setJSON([
                    'status'  => 'error',
                    'message' => 'Gagal menyimpan transaksi Stock Opname ke database.'
                ]);
            }

            $db->transCommit();

            return $this->response->setJSON([
                'status'   => 'success',
                'message'  => "Stock Opname $kodeOpname berhasil diselesaikan dan stok telah diperbarui!",
                'redirect' => base_url("/stock-opname/detail/$opnameId")
            ]);

        } catch (\Throwable $e) {
            $db->transRollback();
            return $this->response->setJSON([
                'status'  => 'error',
                'message' => 'Error: ' . $e->getMessage()
            ]);
        }
    }

    /**
     * Halaman Rincian Sesi Stock Opname
     */
    public function detail($id): string
    {
        $opname = $this->opnameModel->find($id);
        if (!$opname) {
            throw \CodeIgniter\Exceptions\PageNotFoundException::forPageNotFound("Sesi Stock Opname ID #$id tidak ditemukan.");
        }

        $details = $this->detailModel->where('opname_id', $id)->findAll();

        $surplusCount = 0;
        $defisitCount = 0;
        $cocokCount   = 0;

        foreach ($details as $d) {
            if ($d['selisih'] > 0) $surplusCount++;
            elseif ($d['selisih'] < 0) $defisitCount++;
            else $cocokCount++;
        }

        $data['title']        = 'Detail Stock Opname - ' . $opname['kode_opname'];
        $data['opname']       = $opname;
        $data['details']      = $details;
        $data['surplusCount'] = $surplusCount;
        $data['defisitCount'] = $defisitCount;
        $data['cocokCount']   = $cocokCount;

        return view('stock-opname/detail', $data);
    }

    /**
     * Helper pembersih string nama barang untuk pencocokan toleran
     */
    private function cleanName($s): string
    {
        $s = strtolower(trim((string)$s));
        $s = preg_replace('/["\']/', '', $s);
        $s = preg_replace('/[\(\)\,\.\-\/\:\_]/', ' ', $s);
        $s = preg_replace('/\s+/', ' ', $s);
        return trim($s);
    }
}

