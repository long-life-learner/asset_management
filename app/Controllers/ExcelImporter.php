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
     * Berbasis NAMA BARANG (bukan kode).
     * URL: /sync-excel-data/pgt-aset-2026
     */
    public function syncDatabase($token = null)
    {
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
            $lines = explode("\n", $sqlContent);
            $statements = [];
            $current = '';

            foreach ($lines as $line) {
                $trimmed = trim($line);
                if ($trimmed === '' || str_starts_with($trimmed, '--')) {
                    continue;
                }
                $current .= $line . "\n";
                if (str_ends_with($trimmed, ';')) {
                    $statements[] = trim($current);
                    $current = '';
                }
            }

            $executed = 0;
            foreach ($statements as $stmt) {
                if (empty($stmt)) continue;
                $db->query($stmt);
                $executed++;
            }

            $totMaster = $db->table('masterbarang')->where('jenis_aset', 'Aset Bergerak')->countAllResults();
            $totBergerak = $db->table('barangbergerak')->countAllResults();

            $html = "
            <div style='font-family: sans-serif; padding: 30px; line-height: 1.6; max-width: 600px; margin: 40px auto; border: 1px solid #e2e8f0; border-radius: 12px; box-shadow: 0 4px 6px rgba(0,0,0,0.05);'>
                <h2 style='color: #16a34a; margin-top: 0;'>✓ Sukses Update Aset Berdasarkan Nama!</h2>
                <p>Data inventaris telah disinkronkan ke database <strong>" . htmlspecialchars($db->getDatabase()) . "</strong> menggunakan pencocokan nama barang.</p>
                <div style='background: #f8fafc; padding: 15px 20px; border-radius: 8px; margin: 20px 0;'>
                    <ul style='margin: 0; padding-left: 20px;'>
                        <li>Total kueri dieksekusi: <strong>$executed statement</strong></li>
                        <li>Total data di <code>barangbergerak</code>: <strong>$totBergerak</strong></li>
                        <li>Total Aset Bergerak di <code>masterbarang</code>: <strong>$totMaster</strong></li>
                    </ul>
                </div>
                <p><a href='" . base_url('/') . "' style='display:inline-block; padding:10px 24px; background:#2563eb; color:#fff; text-decoration:none; border-radius:6px; font-weight:600;'>Kembali ke Dashboard</a></p>
            </div>
            ";

            return $this->response->setBody($html);

        } catch (\Throwable $e) {
            return $this->response->setStatusCode(500)->setBody("<h3>Error saat eksekusi: " . htmlspecialchars($e->getMessage()) . "</h3>");
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
