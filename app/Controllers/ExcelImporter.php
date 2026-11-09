<?php

namespace App\Controllers;

use App\Controllers\BaseController;
use PhpOffice\PhpSpreadsheet\IOFactory;

class ExcelImporter extends BaseController
{
    public function index()
    {
        return view('import');
    }

    /**
     * Endpoint untuk menjalankan sinkronisasi data dari update_data_aset.sql
     * Bisa diakses melalui browser: /sync-excel-data/pgt-aset-2026
     */
    public function syncDatabase($token = null)
    {
        // Proteksi token sederhana agar tidak diakses sembarang orang
        $validToken = 'pgt-aset-2026';
        if ($token !== $validToken) {
            return $this->response->setStatusCode(403)->setBody("<h3>Akses Ditolak: Token tidak valid.</h3>");
        }

        $sqlFile = ROOTPATH . 'update_data_aset.sql';
        if (!file_exists($sqlFile)) {
            return $this->response->setStatusCode(404)->setBody("<h3>File update_data_aset.sql tidak ditemukan.</h3>");
        }

        $sqlContent = file_get_contents($sqlFile);
        $db = \Config\Database::connect();

        try {
            $statements = array_filter(
                array_map('trim', explode(";\n", $sqlContent)),
                fn($stmt) => !empty($stmt) && !str_starts_with($stmt, '--')
            );

            $db->transBegin();

            $executed = 0;
            foreach ($statements as $stmt) {
                if (empty($stmt)) continue;
                $db->query($stmt);
                $executed++;
            }

            if ($db->transStatus() === false) {
                $db->transRollback();
                return $this->response->setStatusCode(500)->setBody("<h3>Gagal mengeksekusi query. Transaksi di-rollback.</h3>");
            }

            $db->transCommit();

            $totMaster = $db->table('masterbarang')->where('jenis_aset', 'Aset Bergerak')->countAllResults();
            $totBergerak = $db->table('barangbergerak')->countAllResults();

            $html = "
            <div style='font-family: sans-serif; padding: 30px; line-height: 1.6;'>
                <h2 style='color: #16a34a;'>✓ Sukses Sinkronisasi Data Aset dari Excel!</h2>
                <p>Data berhasil diperbarui ke database <strong>" . htmlspecialchars($db->getDatabase()) . "</strong>.</p>
                <ul>
                    <li>Jumlah batch query dieksekusi: <strong>$executed</strong></li>
                    <li>Total data di <code>barangbergerak</code>: <strong>$totBergerak</strong></li>
                    <li>Total data Aset Bergerak di <code>masterbarang</code>: <strong>$totMaster</strong></li>
                </ul>
                <p><a href='" . base_url('/') . "' style='display:inline-block; padding:10px 20px; background:#2563eb; color:#fff; text-decoration:none; border-radius:6px;'>Kembali ke Dashboard</a></p>
            </div>
            ";

            return $this->response->setBody($html);

        } catch (\Throwable $e) {
            $db->transRollback();
            return $this->response->setStatusCode(500)->setBody("<h3>Error: " . htmlspecialchars($e->getMessage()) . "</h3>");
        }
    }

    public function import()
    {
        $file = $this->request->getFile('excel_file');
        $allowedExtensions = ['xls', 'xlsx'];
        $fileExtension = $file->getExtension();

        if ($file->isValid() && in_array($fileExtension, $allowedExtensions)) {
            $spreadsheet = IOFactory::load($file->getPathname());
            $data = $spreadsheet->getActiveSheet()->toArray();
            return redirect()->to('/excel-importer')->with('success', 'Excel file processed');
        } else {
            return redirect()->to('/excel-importer')->with('error', 'Invalid Excel file');
        }
    }
}
