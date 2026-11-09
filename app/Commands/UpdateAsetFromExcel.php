<?php

namespace App\Commands;

use CodeIgniter\CLI\BaseCommand;
use CodeIgniter\CLI\CLI;

class UpdateAsetFromExcel extends BaseCommand
{
    protected $group       = 'Aset';
    protected $name        = 'aset:update-excel';
    protected $description = 'Sinkronisasi data masterbarang dan barangbergerak dari file update_data_aset.sql';

    public function run(array $params)
    {
        CLI::write("Memulai update data aset dari Excel...", 'yellow');

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
            // Pisahkan perintah berdasarkan ;
            $statements = array_filter(
                array_map('trim', explode(";\n", $sqlContent)),
                fn($stmt) => !empty($stmt) && !str_starts_with($stmt, '--')
            );

            $db->transBegin();

            $count = 0;
            foreach ($statements as $stmt) {
                if (empty($stmt)) continue;
                $db->query($stmt);
                $count++;
            }

            if ($db->transStatus() === false) {
                $db->transRollback();
                CLI::error("Gagal mengeksekusi query. Perubahan dibatalkan (Rollback).");
                return;
            }

            $db->transCommit();
            CLI::write("✓ Berhasil memperbarui data aset! ($count batch query dieksekusi)", 'green');

            // Cek jumlah data setelah update
            $totMaster = $db->table('masterbarang')->where('jenis_aset', 'Aset Bergerak')->countAllResults();
            $totBergerak = $db->table('barangbergerak')->countAllResults();
            CLI::write("Total data Aset Bergerak di masterbarang: $totMaster", 'light_cyan');
            CLI::write("Total data di barangbergerak: $totBergerak", 'light_cyan');

        } catch (\Throwable $e) {
            $db->transRollback();
            CLI::error("Terjadi error: " . $e->getMessage());
        }
    }
}

