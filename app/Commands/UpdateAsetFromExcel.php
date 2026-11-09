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
            // Selaraskan collation agar tidak terjadi Illegal mix of collations
            try {
                $db->query("ALTER TABLE `barangbergerak` CONVERT TO CHARACTER SET utf8mb4 COLLATE utf8mb4_general_ci");
                $db->query("ALTER TABLE `masterbarang` CONVERT TO CHARACTER SET utf8mb4 COLLATE utf8mb4_general_ci");
            } catch (\Throwable $e) {
                try {
                    $db->query("SET NAMES 'latin1' COLLATE 'latin1_swedish_ci'");
                } catch (\Throwable $e2) {}
            }

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
                if (strtoupper($stmt) === 'START TRANSACTION;' || strtoupper($stmt) === 'COMMIT;') continue;

                try {
                    $db->query($stmt);
                    $count++;
                } catch (\Throwable $err) {
                    if (strpos($err->getMessage(), 'Illegal mix of collations') !== false) {
                        $db->query("SET NAMES 'latin1'");
                        $db->query($stmt);
                        $count++;
                    }
                }
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
