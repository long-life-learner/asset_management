<?php

namespace App\Commands;

use CodeIgniter\CLI\BaseCommand;
use CodeIgniter\CLI\CLI;

class UpdateAsetFromExcel extends BaseCommand
{
    protected $group       = 'Aset';
    protected $name        = 'aset:update-excel';
    protected $description = 'Sinkronisasi data masterbarang dan barangbergerak berdasarkan NAMA BARANG dari update_data_aset.sql';

    public function run(array $params)
    {
        CLI::write("Memulai update data aset berdasarkan NAMA BARANG...", 'yellow');

        $sqlFile = ROOTPATH . 'update_data_aset.sql';
        if (!file_exists($sqlFile)) {
            CLI::error("File update_data_aset.sql tidak ditemukan di: " . $sqlFile);
            return;
        }

        $sqlContent = file_get_contents($sqlFile);
        if (empty($sqlContent)) {
            CLI::error("File update_data_aset.sql kosong.");
            return;
        }

        $db = \Config\Database::connect();
        CLI::write("Terhubung ke database: " . $db->getDatabase() . " di " . $db->hostname, 'cyan');

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

            $count = 0;
            foreach ($statements as $stmt) {
                if (empty($stmt)) continue;
                $db->query($stmt);
                $count++;
            }

            CLI::write("✓ Berhasil memperbarui data aset berdasarkan nama! ($count query dieksekusi)", 'green');

            $totMaster = $db->table('masterbarang')->where('jenis_aset', 'Aset Bergerak')->countAllResults();
            $totBergerak = $db->table('barangbergerak')->countAllResults();
            CLI::write("Total data Aset Bergerak di masterbarang: $totMaster", 'light_cyan');
            CLI::write("Total data di barangbergerak: $totBergerak", 'light_cyan');

        } catch (\Throwable $e) {
            CLI::error("Terjadi error: " . $e->getMessage());
        }
    }
}
