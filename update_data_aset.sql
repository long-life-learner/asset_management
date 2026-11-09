-- ========================================================
-- UPDATE DATA ASET BERGERAK BERDASARKAN NAMA BARANG
-- Total Item Diproses: 282 barang
-- Di-update berdasarkan Nama: 158 item
-- Ditambahkan sebagai Barang Baru: 123 item
-- Tanggal Eksekusi: 2026-11-09
-- ========================================================

START TRANSACTION;

-- BAGIAN 1: UPDATE STOK, UNIT, & KETERANGAN BERDASARKAN NAMA BARANG
UPDATE `barangbergerak` 
SET `ketersediaan` = 14, `unit` = 'Buah', `keterangan` = 'PMB/SEMINAR', `tanggal` = '2026-11-09' 
WHERE `namabarang` = 'Acrylic panjang' OR `namabarang` = 'Acrylic panjang 25 x 5 cm';
UPDATE `masterbarang` 
SET `jumlah` = 14, `jenisbarang` = 'Buah', `keterangan` = 'PMB/SEMINAR' 
WHERE `namabarang` = 'Acrylic panjang' OR `namabarang` = 'Acrylic panjang 25 x 5 cm';
UPDATE `barangbergerak` 
SET `ketersediaan` = 2, `unit` = 'Buah', `keterangan` = 'ADM/OPERASIONAL KANTOR', `tanggal` = '2026-11-09' 
WHERE `namabarang` = 'Aerosoldispenser' OR `namabarang` = 'Aerosoldispenser';
UPDATE `masterbarang` 
SET `jumlah` = 2, `jenisbarang` = 'Buah', `keterangan` = 'ADM/OPERASIONAL KANTOR' 
WHERE `namabarang` = 'Aerosoldispenser' OR `namabarang` = 'Aerosoldispenser';
UPDATE `barangbergerak` 
SET `ketersediaan` = 300, `unit` = 'Pcs', `keterangan` = 'ADM/OPERASIONAL KANTOR', `tanggal` = '2026-11-09' 
WHERE `namabarang` = 'Amplop putih polos uk. besar' OR `namabarang` = 'Amplop putih polos uk. Besar 110x230mm';
UPDATE `masterbarang` 
SET `jumlah` = 300, `jenisbarang` = 'Pcs', `keterangan` = 'ADM/OPERASIONAL KANTOR' 
WHERE `namabarang` = 'Amplop putih polos uk. besar' OR `namabarang` = 'Amplop putih polos uk. Besar 110x230mm';
UPDATE `barangbergerak` 
SET `ketersediaan` = 47, `unit` = 'Buah', `keterangan` = 'MHS/DOSEN', `tanggal` = '2026-11-09' 
WHERE `namabarang` = 'Almamater Mahasiswa' OR `namabarang` = 'Baju Almamater Mahasiswa';
UPDATE `masterbarang` 
SET `jumlah` = 47, `jenisbarang` = 'Buah', `keterangan` = 'MHS/DOSEN' 
WHERE `namabarang` = 'Almamater Mahasiswa' OR `namabarang` = 'Baju Almamater Mahasiswa';
UPDATE `barangbergerak` 
SET `ketersediaan` = 15, `unit` = 'Buah', `keterangan` = 'WISUDA/SENAT', `tanggal` = '2026-11-09' 
WHERE `namabarang` = 'Baju Toga Senat' OR `namabarang` = 'Baju Toga Senat Poltek-GT';
UPDATE `masterbarang` 
SET `jumlah` = 15, `jenisbarang` = 'Buah', `keterangan` = 'WISUDA/SENAT' 
WHERE `namabarang` = 'Baju Toga Senat' OR `namabarang` = 'Baju Toga Senat Poltek-GT';
UPDATE `barangbergerak` 
SET `ketersediaan` = 302, `unit` = 'Buah', `keterangan` = 'WISUDA/MHS.', `tanggal` = '2026-11-09' 
WHERE `namabarang` = 'Baju Toga Wisudawan' OR `namabarang` = 'Baju Toga Wisudawan Poltek GT';
UPDATE `masterbarang` 
SET `jumlah` = 302, `jenisbarang` = 'Buah', `keterangan` = 'WISUDA/MHS.' 
WHERE `namabarang` = 'Baju Toga Wisudawan' OR `namabarang` = 'Baju Toga Wisudawan Poltek GT';
UPDATE `barangbergerak` 
SET `ketersediaan` = 0, `unit` = 'Buah', `keterangan` = 'ADM/OPERASIONAL KANTOR', `tanggal` = '2026-11-09' 
WHERE `namabarang` = 'Bak stempel' OR `namabarang` = 'Bak stempel';
UPDATE `masterbarang` 
SET `jumlah` = 0, `jenisbarang` = 'Buah', `keterangan` = 'ADM/OPERASIONAL KANTOR' 
WHERE `namabarang` = 'Bak stempel' OR `namabarang` = 'Bak stempel';
UPDATE `barangbergerak` 
SET `ketersediaan` = 227, `unit` = 'Buah', `keterangan` = 'MHS/Adm./Operasional Kantor', `tanggal` = '2026-11-09' 
WHERE `namabarang` = 'Balpoint' OR `namabarang` = 'Balpoint';
UPDATE `masterbarang` 
SET `jumlah` = 227, `jenisbarang` = 'Buah', `keterangan` = 'MHS/Adm./Operasional Kantor' 
WHERE `namabarang` = 'Balpoint' OR `namabarang` = 'Balpoint';
UPDATE `barangbergerak` 
SET `ketersediaan` = 12, `unit` = 'Buah', `keterangan` = 'ADM/OPERASIONAL KANTOR', `tanggal` = '2026-11-09' 
WHERE `namabarang` = 'Batu baterai besar (1.5 v)' OR `namabarang` = 'Batu baterai besar (1.5 v)';
UPDATE `masterbarang` 
SET `jumlah` = 12, `jenisbarang` = 'Buah', `keterangan` = 'ADM/OPERASIONAL KANTOR' 
WHERE `namabarang` = 'Batu baterai besar (1.5 v)' OR `namabarang` = 'Batu baterai besar (1.5 v)';
UPDATE `barangbergerak` 
SET `ketersediaan` = 25, `unit` = 'Buah', `keterangan` = 'ADM/OPERASIONAL KANTOR', `tanggal` = '2026-11-09' 
WHERE `namabarang` = 'Batu baterai kecil (AA)' OR `namabarang` = 'Batu baterai kecil (AA)  utk jam dinding';
UPDATE `masterbarang` 
SET `jumlah` = 25, `jenisbarang` = 'Buah', `keterangan` = 'ADM/OPERASIONAL KANTOR' 
WHERE `namabarang` = 'Batu baterai kecil (AA)' OR `namabarang` = 'Batu baterai kecil (AA)  utk jam dinding';
UPDATE `barangbergerak` 
SET `ketersediaan` = 18, `unit` = 'Buah', `keterangan` = 'ADM/OPERASIONAL KANTOR', `tanggal` = '2026-11-09' 
WHERE `namabarang` = 'Batu baterai kecil (AA)' OR `namabarang` = 'Batu baterai kecil (AAA) utk remote';
UPDATE `masterbarang` 
SET `jumlah` = 18, `jenisbarang` = 'Buah', `keterangan` = 'ADM/OPERASIONAL KANTOR' 
WHERE `namabarang` = 'Batu baterai kecil (AA)' OR `namabarang` = 'Batu baterai kecil (AAA) utk remote';
UPDATE `barangbergerak` 
SET `ketersediaan` = 0, `unit` = 'Buah', `keterangan` = 'ADM/OPERASIONAL KANTOR', `tanggal` = '2026-11-09' 
WHERE `namabarang` = 'Batu baterai kotak (1.5 v)' OR `namabarang` = 'Batu baterai kotak (1.5 v)';
UPDATE `masterbarang` 
SET `jumlah` = 0, `jenisbarang` = 'Buah', `keterangan` = 'ADM/OPERASIONAL KANTOR' 
WHERE `namabarang` = 'Batu baterai kotak (1.5 v)' OR `namabarang` = 'Batu baterai kotak (1.5 v)';
UPDATE `barangbergerak` 
SET `ketersediaan` = 0, `unit` = 'Buah', `keterangan` = 'ADM/OPERASIONAL KANTOR', `tanggal` = '2026-11-09' 
WHERE `namabarang` = 'Batu baterai sedang (9 v)' OR `namabarang` = 'Batu baterai sedang (9 v)';
UPDATE `masterbarang` 
SET `jumlah` = 0, `jenisbarang` = 'Buah', `keterangan` = 'ADM/OPERASIONAL KANTOR' 
WHERE `namabarang` = 'Batu baterai sedang (9 v)' OR `namabarang` = 'Batu baterai sedang (9 v)';
UPDATE `barangbergerak` 
SET `ketersediaan` = 73, `unit` = 'Buah', `keterangan` = 'PERKULIAHAN/PMB', `tanggal` = '2026-11-09' 
WHERE `namabarang` = 'Batu baterai stopwatch' OR `namabarang` = 'Batu baterai stopwatch';
UPDATE `masterbarang` 
SET `jumlah` = 73, `jenisbarang` = 'Buah', `keterangan` = 'PERKULIAHAN/PMB' 
WHERE `namabarang` = 'Batu baterai stopwatch' OR `namabarang` = 'Batu baterai stopwatch';
UPDATE `barangbergerak` 
SET `ketersediaan` = 9, `unit` = 'Buah', `keterangan` = 'ADM/OPERASIONAL KANTOR', `tanggal` = '2026-11-09' 
WHERE `namabarang` = 'Bendera Jurusan Teknik Elektronika' OR `namabarang` = 'Bendera Jurusan Teknik Elektronika ( Logi lama 4 Logo Baru 5)';
UPDATE `masterbarang` 
SET `jumlah` = 9, `jenisbarang` = 'Buah', `keterangan` = 'ADM/OPERASIONAL KANTOR' 
WHERE `namabarang` = 'Bendera Jurusan Teknik Elektronika' OR `namabarang` = 'Bendera Jurusan Teknik Elektronika ( Logi lama 4 Logo Baru 5)';
UPDATE `barangbergerak` 
SET `ketersediaan` = 9, `unit` = 'Buah', `keterangan` = 'ADM/OPERASIONAL KANTOR', `tanggal` = '2026-11-09' 
WHERE `namabarang` = 'Bendera Jurusan Teknik Mesin' OR `namabarang` = 'Bendera Jurusan Teknik Mesin ( Logo Lama : 4 Logo Baru 5)';
UPDATE `masterbarang` 
SET `jumlah` = 9, `jenisbarang` = 'Buah', `keterangan` = 'ADM/OPERASIONAL KANTOR' 
WHERE `namabarang` = 'Bendera Jurusan Teknik Mesin' OR `namabarang` = 'Bendera Jurusan Teknik Mesin ( Logo Lama : 4 Logo Baru 5)';
UPDATE `barangbergerak` 
SET `ketersediaan` = 8, `unit` = 'Buah', `keterangan` = 'ADM/OPERASIONAL KANTOR', `tanggal` = '2026-11-09' 
WHERE `namabarang` = 'Bendera Jurusan Teknologi Industri' OR `namabarang` = 'Bendera Jurusan Teknologi Industri ( Logo Lama 3 Logo Baru 5)';
UPDATE `masterbarang` 
SET `jumlah` = 8, `jenisbarang` = 'Buah', `keterangan` = 'ADM/OPERASIONAL KANTOR' 
WHERE `namabarang` = 'Bendera Jurusan Teknologi Industri' OR `namabarang` = 'Bendera Jurusan Teknologi Industri ( Logo Lama 3 Logo Baru 5)';
UPDATE `barangbergerak` 
SET `ketersediaan` = 9, `unit` = 'Buah', `keterangan` = 'PATAKA', `tanggal` = '2026-11-09' 
WHERE `namabarang` = 'Bendera Merah Putih uk. besar (2 x 3)' OR `namabarang` = 'Bendera merah putih uk. Besar (2 x 3)';
UPDATE `masterbarang` 
SET `jumlah` = 9, `jenisbarang` = 'Buah', `keterangan` = 'PATAKA' 
WHERE `namabarang` = 'Bendera Merah Putih uk. besar (2 x 3)' OR `namabarang` = 'Bendera merah putih uk. Besar (2 x 3)';
UPDATE `barangbergerak` 
SET `ketersediaan` = 8, `unit` = 'Buah', `keterangan` = 'PATAKA', `tanggal` = '2026-11-09' 
WHERE `namabarang` = 'Bendera merah putih uk. Kecil (100 x 120)' OR `namabarang` = 'Bendera merah putih uk. kecil (100 x 120)';
UPDATE `masterbarang` 
SET `jumlah` = 8, `jenisbarang` = 'Buah', `keterangan` = 'PATAKA' 
WHERE `namabarang` = 'Bendera merah putih uk. Kecil (100 x 120)' OR `namabarang` = 'Bendera merah putih uk. kecil (100 x 120)';
UPDATE `barangbergerak` 
SET `ketersediaan` = 6, `unit` = 'Buah', `keterangan` = 'PATAKA', `tanggal` = '2026-11-09' 
WHERE `namabarang` = 'Bendera Poltek-GT' OR `namabarang` = 'Bendera Poltek-GT logo baru';
UPDATE `masterbarang` 
SET `jumlah` = 6, `jenisbarang` = 'Buah', `keterangan` = 'PATAKA' 
WHERE `namabarang` = 'Bendera Poltek-GT' OR `namabarang` = 'Bendera Poltek-GT logo baru';
UPDATE `barangbergerak` 
SET `ketersediaan` = 4, `unit` = 'Buah', `keterangan` = 'PMB', `tanggal` = '2026-11-09' 
WHERE `namabarang` = 'Bendera Prospek' OR `namabarang` = 'Bendera Prospek';
UPDATE `masterbarang` 
SET `jumlah` = 4, `jenisbarang` = 'Buah', `keterangan` = 'PMB' 
WHERE `namabarang` = 'Bendera Prospek' OR `namabarang` = 'Bendera Prospek';
UPDATE `barangbergerak` 
SET `ketersediaan` = 4, `unit` = 'Doz (12 pcs)', `keterangan` = 'ADM/OPERASIONAL KANTOR', `tanggal` = '2026-11-09' 
WHERE `namabarang` = 'Binder clip no. 111' OR `namabarang` = 'Binder clip no. 111';
UPDATE `masterbarang` 
SET `jumlah` = 4, `jenisbarang` = 'Doz (12 pcs)', `keterangan` = 'ADM/OPERASIONAL KANTOR' 
WHERE `namabarang` = 'Binder clip no. 111' OR `namabarang` = 'Binder clip no. 111';
UPDATE `barangbergerak` 
SET `ketersediaan` = 8, `unit` = 'Doz (12 pcs)', `keterangan` = 'ADM/OPERASIONAL KANTOR', `tanggal` = '2026-11-09' 
WHERE `namabarang` = 'Binder clip no. 200' OR `namabarang` = 'Binder clip no. 200';
UPDATE `masterbarang` 
SET `jumlah` = 8, `jenisbarang` = 'Doz (12 pcs)', `keterangan` = 'ADM/OPERASIONAL KANTOR' 
WHERE `namabarang` = 'Binder clip no. 200' OR `namabarang` = 'Binder clip no. 200';
UPDATE `barangbergerak` 
SET `ketersediaan` = 15, `unit` = 'Doz (12 pcs)', `keterangan` = 'ADM/OPERASIONAL KANTOR', `tanggal` = '2026-11-09' 
WHERE `namabarang` = 'Binder clip no. 260' OR `namabarang` = 'Binder clip no. 260';
UPDATE `masterbarang` 
SET `jumlah` = 15, `jenisbarang` = 'Doz (12 pcs)', `keterangan` = 'ADM/OPERASIONAL KANTOR' 
WHERE `namabarang` = 'Binder clip no. 260' OR `namabarang` = 'Binder clip no. 260';
UPDATE `barangbergerak` 
SET `ketersediaan` = 556, `unit` = 'Lembar', `keterangan` = 'ADM/OPERASIONAL KANTOR', `tanggal` = '2026-11-09' 
WHERE `namabarang` = 'Blangko ijazah Poltek-GT' OR `namabarang` = 'Blangko ijazah Poltek-GT A4';
UPDATE `masterbarang` 
SET `jumlah` = 556, `jenisbarang` = 'Lembar', `keterangan` = 'ADM/OPERASIONAL KANTOR' 
WHERE `namabarang` = 'Blangko ijazah Poltek-GT' OR `namabarang` = 'Blangko ijazah Poltek-GT A4';
UPDATE `barangbergerak` 
SET `ketersediaan` = 573, `unit` = 'Lembar', `keterangan` = 'ADM/OPERASIONAL KANTOR', `tanggal` = '2026-11-09' 
WHERE `namabarang` = 'Blangko transkrip nilai Poltek-GT A4' OR `namabarang` = 'Blangko Transkrip nilai Poltek-GT A4';
UPDATE `masterbarang` 
SET `jumlah` = 573, `jenisbarang` = 'Lembar', `keterangan` = 'ADM/OPERASIONAL KANTOR' 
WHERE `namabarang` = 'Blangko transkrip nilai Poltek-GT A4' OR `namabarang` = 'Blangko Transkrip nilai Poltek-GT A4';
UPDATE `barangbergerak` 
SET `ketersediaan` = 0, `unit` = 'Buah', `keterangan` = 'ADM/OPERASIONAL KANTOR', `tanggal` = '2026-11-09' 
WHERE `namabarang` = 'Box file' OR `namabarang` = 'Box file';
UPDATE `masterbarang` 
SET `jumlah` = 0, `jenisbarang` = 'Buah', `keterangan` = 'ADM/OPERASIONAL KANTOR' 
WHERE `namabarang` = 'Box file' OR `namabarang` = 'Box file';
UPDATE `barangbergerak` 
SET `ketersediaan` = 1, `unit` = 'Btl', `keterangan` = 'DRUM BAND', `tanggal` = '2026-11-09' 
WHERE `namabarang` = 'Braso' OR `namabarang` = 'Braso';
UPDATE `masterbarang` 
SET `jumlah` = 1, `jenisbarang` = 'Btl', `keterangan` = 'DRUM BAND' 
WHERE `namabarang` = 'Braso' OR `namabarang` = 'Braso';
UPDATE `barangbergerak` 
SET `ketersediaan` = 7, `unit` = 'Buah', `keterangan` = 'ADM/OPERASIONAL KANTOR', `tanggal` = '2026-11-09' 
WHERE `namabarang` = 'Buku ekspedisi' OR `namabarang` = 'Buku ekspedisi';
UPDATE `masterbarang` 
SET `jumlah` = 7, `jenisbarang` = 'Buah', `keterangan` = 'ADM/OPERASIONAL KANTOR' 
WHERE `namabarang` = 'Buku ekspedisi' OR `namabarang` = 'Buku ekspedisi';
UPDATE `barangbergerak` 
SET `ketersediaan` = 11, `unit` = 'Buah', `keterangan` = 'WISUDA', `tanggal` = '2026-11-09' 
WHERE `namabarang` = 'Buku tamu' OR `namabarang` = 'Buku tamu';
UPDATE `masterbarang` 
SET `jumlah` = 11, `jenisbarang` = 'Buah', `keterangan` = 'WISUDA' 
WHERE `namabarang` = 'Buku tamu' OR `namabarang` = 'Buku tamu';
UPDATE `barangbergerak` 
SET `ketersediaan` = 6868, `unit` = 'Pack', `keterangan` = 'MHS', `tanggal` = '2026-11-09' 
WHERE `namabarang` = 'Buku tulisÃÂ  uk. Folio' OR `namabarang` = 'Buku tulis';
UPDATE `masterbarang` 
SET `jumlah` = 6868, `jenisbarang` = 'Pack', `keterangan` = 'MHS' 
WHERE `namabarang` = 'Buku tulisÃÂ  uk. Folio' OR `namabarang` = 'Buku tulis';
UPDATE `barangbergerak` 
SET `ketersediaan` = 7, `unit` = 'Buah', `keterangan` = 'KEBERSIHAN', `tanggal` = '2026-11-09' 
WHERE `namabarang` = 'Ember' OR `namabarang` = 'Ember hitam';
UPDATE `masterbarang` 
SET `jumlah` = 7, `jenisbarang` = 'Buah', `keterangan` = 'KEBERSIHAN' 
WHERE `namabarang` = 'Ember' OR `namabarang` = 'Ember hitam';
UPDATE `barangbergerak` 
SET `ketersediaan` = 30, `unit` = 'Buah', `keterangan` = 'PATAKA', `tanggal` = '2026-11-09' 
WHERE `namabarang` = 'Emblem baret' OR `namabarang` = 'Emblem baret (baru)';
UPDATE `masterbarang` 
SET `jumlah` = 30, `jenisbarang` = 'Buah', `keterangan` = 'PATAKA' 
WHERE `namabarang` = 'Emblem baret' OR `namabarang` = 'Emblem baret (baru)';
UPDATE `barangbergerak` 
SET `ketersediaan` = 39, `unit` = 'Buah', `keterangan` = 'PATAKA', `tanggal` = '2026-11-09' 
WHERE `namabarang` = 'Emblem baret' OR `namabarang` = 'Emblem baret (lama = 4 )';
UPDATE `masterbarang` 
SET `jumlah` = 39, `jenisbarang` = 'Buah', `keterangan` = 'PATAKA' 
WHERE `namabarang` = 'Emblem baret' OR `namabarang` = 'Emblem baret (lama = 4 )';
UPDATE `barangbergerak` 
SET `ketersediaan` = 0, `unit` = 'Buah', `keterangan` = 'ADM/OPERASIONAL KANTOR', `tanggal` = '2026-11-09' 
WHERE `namabarang` = 'Cutter A - 300 kecil' OR `namabarang` = 'Gagang cutter A - 300 kecil';
UPDATE `masterbarang` 
SET `jumlah` = 0, `jenisbarang` = 'Buah', `keterangan` = 'ADM/OPERASIONAL KANTOR' 
WHERE `namabarang` = 'Cutter A - 300 kecil' OR `namabarang` = 'Gagang cutter A - 300 kecil';
UPDATE `barangbergerak` 
SET `ketersediaan` = 6, `unit` = 'Buah', `keterangan` = 'ADM/OPERASIONAL KANTOR', `tanggal` = '2026-11-09' 
WHERE `namabarang` = 'Cutter L - 500 besar' OR `namabarang` = 'Gagang cutter L - 500 besar';
UPDATE `masterbarang` 
SET `jumlah` = 6, `jenisbarang` = 'Buah', `keterangan` = 'ADM/OPERASIONAL KANTOR' 
WHERE `namabarang` = 'Cutter L - 500 besar' OR `namabarang` = 'Gagang cutter L - 500 besar';
UPDATE `barangbergerak` 
SET `ketersediaan` = 363, `unit` = 'Pcs', `keterangan` = 'ADM/OPERASIONAL KANTOR', `tanggal` = '2026-11-09' 
WHERE `namabarang` = 'Gantungan penneng' OR `namabarang` = 'Gantungan penneng';
UPDATE `masterbarang` 
SET `jumlah` = 363, `jenisbarang` = 'Pcs', `keterangan` = 'ADM/OPERASIONAL KANTOR' 
WHERE `namabarang` = 'Gantungan penneng' OR `namabarang` = 'Gantungan penneng';
UPDATE `barangbergerak` 
SET `ketersediaan` = 8, `unit` = 'Buah', `keterangan` = 'KEBERSIHAN', `tanggal` = '2026-11-09' 
WHERE `namabarang` = 'Gayung' OR `namabarang` = 'Gayung';
UPDATE `masterbarang` 
SET `jumlah` = 8, `jenisbarang` = 'Buah', `keterangan` = 'KEBERSIHAN' 
WHERE `namabarang` = 'Gayung' OR `namabarang` = 'Gayung';
UPDATE `barangbergerak` 
SET `ketersediaan` = 3, `unit` = 'Buah', `keterangan` = 'ADM/OPERASIONAL KANTOR', `tanggal` = '2026-11-09' 
WHERE `namabarang` = 'Gunting' OR `namabarang` = 'Gunting';
UPDATE `masterbarang` 
SET `jumlah` = 3, `jenisbarang` = 'Buah', `keterangan` = 'ADM/OPERASIONAL KANTOR' 
WHERE `namabarang` = 'Gunting' OR `namabarang` = 'Gunting';
UPDATE `barangbergerak` 
SET `ketersediaan` = 39, `unit` = 'Pcs', `keterangan` = 'ADM/OPERASIONAL KANTOR', `tanggal` = '2026-11-09' 
WHERE `namabarang` = 'Cutter L - 500 besar' OR `namabarang` = 'Isi cutter L - 500 besar';
UPDATE `masterbarang` 
SET `jumlah` = 39, `jenisbarang` = 'Pcs', `keterangan` = 'ADM/OPERASIONAL KANTOR' 
WHERE `namabarang` = 'Cutter L - 500 besar' OR `namabarang` = 'Isi cutter L - 500 besar';
UPDATE `barangbergerak` 
SET `ketersediaan` = 175, `unit` = 'Doz', `keterangan` = 'ADM/OPERASIONAL KANTOR', `tanggal` = '2026-11-09' 
WHERE `namabarang` = 'Isi staples no. 3 - 1 M besar' OR `namabarang` = 'Isi staples no. 3 - 1 M besar';
UPDATE `masterbarang` 
SET `jumlah` = 175, `jenisbarang` = 'Doz', `keterangan` = 'ADM/OPERASIONAL KANTOR' 
WHERE `namabarang` = 'Isi staples no. 3 - 1 M besar' OR `namabarang` = 'Isi staples no. 3 - 1 M besar';
UPDATE `barangbergerak` 
SET `ketersediaan` = 22, `unit` = 'Buah', `keterangan` = 'ADM/OPERASIONAL KANTOR', `tanggal` = '2026-11-09' 
WHERE `namabarang` = 'Isolatip 1/2' OR `namabarang` = 'Isolatip 1''''';
UPDATE `masterbarang` 
SET `jumlah` = 22, `jenisbarang` = 'Buah', `keterangan` = 'ADM/OPERASIONAL KANTOR' 
WHERE `namabarang` = 'Isolatip 1/2' OR `namabarang` = 'Isolatip 1''''';
UPDATE `barangbergerak` 
SET `ketersediaan` = 10, `unit` = 'Buah', `keterangan` = 'ADM/OPERASIONAL KANTOR', `tanggal` = '2026-11-09' 
WHERE `namabarang` = 'Isolatip 1/2' OR `namabarang` = 'Isolatip 1/2''''';
UPDATE `masterbarang` 
SET `jumlah` = 10, `jenisbarang` = 'Buah', `keterangan` = 'ADM/OPERASIONAL KANTOR' 
WHERE `namabarang` = 'Isolatip 1/2' OR `namabarang` = 'Isolatip 1/2''''';
UPDATE `barangbergerak` 
SET `ketersediaan` = 26, `unit` = 'Buah', `keterangan` = 'ADM/OPERASIONAL KANTOR', `tanggal` = '2026-11-09' 
WHERE `namabarang` = 'Jangka' OR `namabarang` = 'Jangka';
UPDATE `masterbarang` 
SET `jumlah` = 26, `jenisbarang` = 'Buah', `keterangan` = 'ADM/OPERASIONAL KANTOR' 
WHERE `namabarang` = 'Jangka' OR `namabarang` = 'Jangka';
UPDATE `barangbergerak` 
SET `ketersediaan` = 20, `unit` = 'Kg', `keterangan` = 'PMB/WISUDA', `tanggal` = '2026-11-09' 
WHERE `namabarang` = 'Kantong Plastik PE' OR `namabarang` = 'Kantong plastik PE putih susu';
UPDATE `masterbarang` 
SET `jumlah` = 20, `jenisbarang` = 'Kg', `keterangan` = 'PMB/WISUDA' 
WHERE `namabarang` = 'Kantong Plastik PE' OR `namabarang` = 'Kantong plastik PE putih susu';
UPDATE `barangbergerak` 
SET `ketersediaan` = 40, `unit` = 'Buah', `keterangan` = 'PMB/WISUDA', `tanggal` = '2026-11-09' 
WHERE `namabarang` = 'Kardus polos' OR `namabarang` = 'Kardus polos';
UPDATE `masterbarang` 
SET `jumlah` = 40, `jenisbarang` = 'Buah', `keterangan` = 'PMB/WISUDA' 
WHERE `namabarang` = 'Kardus polos' OR `namabarang` = 'Kardus polos';
UPDATE `barangbergerak` 
SET `ketersediaan` = 2, `unit` = 'Buah', `keterangan` = 'KEBERSIHAN', `tanggal` = '2026-11-09' 
WHERE `namabarang` = 'Kemoceng' OR `namabarang` = 'Kemoceng';
UPDATE `masterbarang` 
SET `jumlah` = 2, `jenisbarang` = 'Buah', `keterangan` = 'KEBERSIHAN' 
WHERE `namabarang` = 'Kemoceng' OR `namabarang` = 'Kemoceng';
UPDATE `barangbergerak` 
SET `ketersediaan` = 4, `unit` = 'Buah', `keterangan` = 'WISUDA/SENAT', `tanggal` = '2026-11-09' 
WHERE `namabarang` = 'Kerah sekretaris senat Poltek' OR `namabarang` = 'Kerah sekretaris Senat Poltek';
UPDATE `masterbarang` 
SET `jumlah` = 4, `jenisbarang` = 'Buah', `keterangan` = 'WISUDA/SENAT' 
WHERE `namabarang` = 'Kerah sekretaris senat Poltek' OR `namabarang` = 'Kerah sekretaris Senat Poltek';
UPDATE `barangbergerak` 
SET `ketersediaan` = 3, `unit` = 'Buah', `keterangan` = 'WISUDA/SENAT', `tanggal` = '2026-11-09' 
WHERE `namabarang` = 'Kerah senat jurusan Teknik Elektronika' OR `namabarang` = 'Kerah Senat Jurusan Teknik Elektronika';
UPDATE `masterbarang` 
SET `jumlah` = 3, `jenisbarang` = 'Buah', `keterangan` = 'WISUDA/SENAT' 
WHERE `namabarang` = 'Kerah senat jurusan Teknik Elektronika' OR `namabarang` = 'Kerah Senat Jurusan Teknik Elektronika';
UPDATE `barangbergerak` 
SET `ketersediaan` = 3, `unit` = 'Buah', `keterangan` = 'WISUDA/SENAT', `tanggal` = '2026-11-09' 
WHERE `namabarang` = 'Kerah senat jurusan Teknik Mesin' OR `namabarang` = 'Kerah Senat Jurusan Teknik Mesin';
UPDATE `masterbarang` 
SET `jumlah` = 3, `jenisbarang` = 'Buah', `keterangan` = 'WISUDA/SENAT' 
WHERE `namabarang` = 'Kerah senat jurusan Teknik Mesin' OR `namabarang` = 'Kerah Senat Jurusan Teknik Mesin';
UPDATE `barangbergerak` 
SET `ketersediaan` = 3, `unit` = 'Buah', `keterangan` = 'WISUDA/SENAT', `tanggal` = '2026-11-09' 
WHERE `namabarang` = 'Kerah senat jurusan Teknologi Industri' OR `namabarang` = 'Kerah Senat Jurusan Teknologi Industri';
UPDATE `masterbarang` 
SET `jumlah` = 3, `jenisbarang` = 'Buah', `keterangan` = 'WISUDA/SENAT' 
WHERE `namabarang` = 'Kerah senat jurusan Teknologi Industri' OR `namabarang` = 'Kerah Senat Jurusan Teknologi Industri';
UPDATE `barangbergerak` 
SET `ketersediaan` = 10, `unit` = 'Buah', `keterangan` = 'WISUDA/SENAT', `tanggal` = '2026-11-09' 
WHERE `namabarang` = 'Kerah senat Poltek-GT' OR `namabarang` = 'Kerah Senat Poltek';
UPDATE `masterbarang` 
SET `jumlah` = 10, `jenisbarang` = 'Buah', `keterangan` = 'WISUDA/SENAT' 
WHERE `namabarang` = 'Kerah senat Poltek-GT' OR `namabarang` = 'Kerah Senat Poltek';
UPDATE `barangbergerak` 
SET `ketersediaan` = 204, `unit` = 'Buah', `keterangan` = 'WISUDA/MHS.', `tanggal` = '2026-11-09' 
WHERE `namabarang` = 'Kerah Wisudawan Teknik Elektronika' OR `namabarang` = 'Kerah Wisudawan Teknik Elektronika';
UPDATE `masterbarang` 
SET `jumlah` = 204, `jenisbarang` = 'Buah', `keterangan` = 'WISUDA/MHS.' 
WHERE `namabarang` = 'Kerah Wisudawan Teknik Elektronika' OR `namabarang` = 'Kerah Wisudawan Teknik Elektronika';
UPDATE `barangbergerak` 
SET `ketersediaan` = 255, `unit` = 'Buah', `keterangan` = 'WISUDA/MHS.', `tanggal` = '2026-11-09' 
WHERE `namabarang` = 'Kerah Wisudawan Teknik Mesin' OR `namabarang` = 'Kerah Wisudawan Teknik Mesin';
UPDATE `masterbarang` 
SET `jumlah` = 255, `jenisbarang` = 'Buah', `keterangan` = 'WISUDA/MHS.' 
WHERE `namabarang` = 'Kerah Wisudawan Teknik Mesin' OR `namabarang` = 'Kerah Wisudawan Teknik Mesin';
UPDATE `barangbergerak` 
SET `ketersediaan` = 30, `unit` = 'Buah', `keterangan` = 'WISUDA/MHS.', `tanggal` = '2026-11-09' 
WHERE `namabarang` = 'Kerah wisudawan Teknologi Industri' OR `namabarang` = 'Kerah Wisudawan Teknologi Industri';
UPDATE `masterbarang` 
SET `jumlah` = 30, `jenisbarang` = 'Buah', `keterangan` = 'WISUDA/MHS.' 
WHERE `namabarang` = 'Kerah wisudawan Teknologi Industri' OR `namabarang` = 'Kerah Wisudawan Teknologi Industri';
UPDATE `barangbergerak` 
SET `ketersediaan` = 22, `unit` = 'Rim (100)', `keterangan` = 'ADM/OPERASIONAL KANTOR', `tanggal` = '2026-11-09' 
WHERE `namabarang` = 'Kertas buram w. Hijau' OR `namabarang` = 'Kertas buram w. Hijau';
UPDATE `masterbarang` 
SET `jumlah` = 22, `jenisbarang` = 'Rim (100)', `keterangan` = 'ADM/OPERASIONAL KANTOR' 
WHERE `namabarang` = 'Kertas buram w. Hijau' OR `namabarang` = 'Kertas buram w. Hijau';
UPDATE `barangbergerak` 
SET `ketersediaan` = 13, `unit` = 'Rim (100)', `keterangan` = 'ADM/OPERASIONAL KANTOR', `tanggal` = '2026-11-09' 
WHERE `namabarang` = 'Kertas buram w. Kuning' OR `namabarang` = 'Kertas buram w. Kuning';
UPDATE `masterbarang` 
SET `jumlah` = 13, `jenisbarang` = 'Rim (100)', `keterangan` = 'ADM/OPERASIONAL KANTOR' 
WHERE `namabarang` = 'Kertas buram w. Kuning' OR `namabarang` = 'Kertas buram w. Kuning';
UPDATE `barangbergerak` 
SET `ketersediaan` = 10, `unit` = 'Rim (100)', `keterangan` = 'ADM/OPERASIONAL KANTOR', `tanggal` = '2026-11-09' 
WHERE `namabarang` = 'Kertas buram w. Putih' OR `namabarang` = 'Kertas buram w. Putih';
UPDATE `masterbarang` 
SET `jumlah` = 10, `jenisbarang` = 'Rim (100)', `keterangan` = 'ADM/OPERASIONAL KANTOR' 
WHERE `namabarang` = 'Kertas buram w. Putih' OR `namabarang` = 'Kertas buram w. Putih';
UPDATE `barangbergerak` 
SET `ketersediaan` = 200, `unit` = 'Lembar', `keterangan` = 'ADM/OPERASIONAL KANTOR', `tanggal` = '2026-11-09' 
WHERE `namabarang` = 'Kertas foto "Glossy"' OR `namabarang` = 'Kertas foto "Glossy"';
UPDATE `masterbarang` 
SET `jumlah` = 200, `jenisbarang` = 'Lembar', `keterangan` = 'ADM/OPERASIONAL KANTOR' 
WHERE `namabarang` = 'Kertas foto "Glossy"' OR `namabarang` = 'Kertas foto "Glossy"';
UPDATE `barangbergerak` 
SET `ketersediaan` = 53, `unit` = 'Rim', `keterangan` = 'ADM/OPERASIONAL KANTOR', `tanggal` = '2026-11-09' 
WHERE `namabarang` = 'Kertas foto copy A4' OR `namabarang` = 'Kertas foto copy A4 70 gsm';
UPDATE `masterbarang` 
SET `jumlah` = 53, `jenisbarang` = 'Rim', `keterangan` = 'ADM/OPERASIONAL KANTOR' 
WHERE `namabarang` = 'Kertas foto copy A4' OR `namabarang` = 'Kertas foto copy A4 70 gsm';
UPDATE `barangbergerak` 
SET `ketersediaan` = 1, `unit` = 'Rim', `keterangan` = 'ADM/OPERASIONAL KANTOR', `tanggal` = '2026-11-09' 
WHERE `namabarang` = 'Kertas foto copy d. folio' OR `namabarang` = 'Kertas foto copy d. folio';
UPDATE `masterbarang` 
SET `jumlah` = 1, `jenisbarang` = 'Rim', `keterangan` = 'ADM/OPERASIONAL KANTOR' 
WHERE `namabarang` = 'Kertas foto copy d. folio' OR `namabarang` = 'Kertas foto copy d. folio';
UPDATE `barangbergerak` 
SET `ketersediaan` = 35, `unit` = 'Rim', `keterangan` = 'ADM/OPERASIONAL KANTOR', `tanggal` = '2026-11-09' 
WHERE `namabarang` = 'Kertas foto copy F4' OR `namabarang` = 'Kertas foto copy F4 70 gsm';
UPDATE `masterbarang` 
SET `jumlah` = 35, `jenisbarang` = 'Rim', `keterangan` = 'ADM/OPERASIONAL KANTOR' 
WHERE `namabarang` = 'Kertas foto copy F4' OR `namabarang` = 'Kertas foto copy F4 70 gsm';
UPDATE `barangbergerak` 
SET `ketersediaan` = 2, `unit` = 'Rim', `keterangan` = 'ADM/OPERASIONAL KANTOR', `tanggal` = '2026-11-09' 
WHERE `namabarang` = 'Kertas karbon' OR `namabarang` = 'Kertas karbon';
UPDATE `masterbarang` 
SET `jumlah` = 2, `jenisbarang` = 'Rim', `keterangan` = 'ADM/OPERASIONAL KANTOR' 
WHERE `namabarang` = 'Kertas karbon' OR `namabarang` = 'Kertas karbon';
UPDATE `barangbergerak` 
SET `ketersediaan` = 3, `unit` = 'Rim', `keterangan` = 'ADM/OPERASIONAL KANTOR', `tanggal` = '2026-11-09' 
WHERE `namabarang` = 'Kertas koncorde A4 warna biru' OR `namabarang` = 'Kertas koncorde A4 warna biru';
UPDATE `masterbarang` 
SET `jumlah` = 3, `jenisbarang` = 'Rim', `keterangan` = 'ADM/OPERASIONAL KANTOR' 
WHERE `namabarang` = 'Kertas koncorde A4 warna biru' OR `namabarang` = 'Kertas koncorde A4 warna biru';
UPDATE `barangbergerak` 
SET `ketersediaan` = 2, `unit` = 'Rim', `keterangan` = 'ADM/OPERASIONAL KANTOR', `tanggal` = '2026-11-09' 
WHERE `namabarang` = 'Kertas koncorde A4 warna biru laut' OR `namabarang` = 'Kertas koncorde A4 warna biru laut';
UPDATE `masterbarang` 
SET `jumlah` = 2, `jenisbarang` = 'Rim', `keterangan` = 'ADM/OPERASIONAL KANTOR' 
WHERE `namabarang` = 'Kertas koncorde A4 warna biru laut' OR `namabarang` = 'Kertas koncorde A4 warna biru laut';
UPDATE `barangbergerak` 
SET `ketersediaan` = 2, `unit` = 'Rim', `keterangan` = 'ADM/OPERASIONAL KANTOR', `tanggal` = '2026-11-09' 
WHERE `namabarang` = 'Kertas koncorde A4 warna coklat' OR `namabarang` = 'Kertas koncorde A4 warna coklat';
UPDATE `masterbarang` 
SET `jumlah` = 2, `jenisbarang` = 'Rim', `keterangan` = 'ADM/OPERASIONAL KANTOR' 
WHERE `namabarang` = 'Kertas koncorde A4 warna coklat' OR `namabarang` = 'Kertas koncorde A4 warna coklat';
UPDATE `barangbergerak` 
SET `ketersediaan` = 2, `unit` = 'Rim', `keterangan` = 'ADM/OPERASIONAL KANTOR', `tanggal` = '2026-11-09' 
WHERE `namabarang` = 'Kertas koncorde A4 warna krem' OR `namabarang` = 'Kertas koncorde A4 warna krem';
UPDATE `masterbarang` 
SET `jumlah` = 2, `jenisbarang` = 'Rim', `keterangan` = 'ADM/OPERASIONAL KANTOR' 
WHERE `namabarang` = 'Kertas koncorde A4 warna krem' OR `namabarang` = 'Kertas koncorde A4 warna krem';
UPDATE `barangbergerak` 
SET `ketersediaan` = 3, `unit` = 'Rim', `keterangan` = 'ADM/OPERASIONAL KANTOR', `tanggal` = '2026-11-09' 
WHERE `namabarang` = 'Kertas koncorde A4 warna kuning' OR `namabarang` = 'Kertas koncorde A4 warna kuning';
UPDATE `masterbarang` 
SET `jumlah` = 3, `jenisbarang` = 'Rim', `keterangan` = 'ADM/OPERASIONAL KANTOR' 
WHERE `namabarang` = 'Kertas koncorde A4 warna kuning' OR `namabarang` = 'Kertas koncorde A4 warna kuning';
UPDATE `barangbergerak` 
SET `ketersediaan` = 2, `unit` = 'Rim', `keterangan` = 'ADM/OPERASIONAL KANTOR', `tanggal` = '2026-11-09' 
WHERE `namabarang` = 'Kertas koncorde A4 warna perak' OR `namabarang` = 'Kertas koncorde A4 warna perak';
UPDATE `masterbarang` 
SET `jumlah` = 2, `jenisbarang` = 'Rim', `keterangan` = 'ADM/OPERASIONAL KANTOR' 
WHERE `namabarang` = 'Kertas koncorde A4 warna perak' OR `namabarang` = 'Kertas koncorde A4 warna perak';
UPDATE `barangbergerak` 
SET `ketersediaan` = 1, `unit` = 'Rim', `keterangan` = 'ADM/OPERASIONAL KANTOR', `tanggal` = '2026-11-09' 
WHERE `namabarang` = 'Kertas koncorde A4 warna ungu' OR `namabarang` = 'Kertas koncorde A4 warna ungu';
UPDATE `masterbarang` 
SET `jumlah` = 1, `jenisbarang` = 'Rim', `keterangan` = 'ADM/OPERASIONAL KANTOR' 
WHERE `namabarang` = 'Kertas koncorde A4 warna ungu' OR `namabarang` = 'Kertas koncorde A4 warna ungu';
UPDATE `barangbergerak` 
SET `ketersediaan` = 3, `unit` = 'Rim (500 lbr)', `keterangan` = 'KAJUR TM/DOSEN', `tanggal` = '2026-11-09' 
WHERE `namabarang` = 'Kertas kop Poltek jurusan Teknik Mesin, A4' OR `namabarang` = 'Kertas kop Poltek jurusan Teknik Mesin, A4';
UPDATE `masterbarang` 
SET `jumlah` = 3, `jenisbarang` = 'Rim (500 lbr)', `keterangan` = 'KAJUR TM/DOSEN' 
WHERE `namabarang` = 'Kertas kop Poltek jurusan Teknik Mesin, A4' OR `namabarang` = 'Kertas kop Poltek jurusan Teknik Mesin, A4';
UPDATE `barangbergerak` 
SET `ketersediaan` = 2, `unit` = 'Rim (500 lbr)', `keterangan` = 'KAJUR TM/DOSEN', `tanggal` = '2026-11-09' 
WHERE `namabarang` = 'Kertas kop Poltek jurusan Teknik Mesin, F4' OR `namabarang` = 'Kertas kop Poltek jurusan Teknik Mesin, F4';
UPDATE `masterbarang` 
SET `jumlah` = 2, `jenisbarang` = 'Rim (500 lbr)', `keterangan` = 'KAJUR TM/DOSEN' 
WHERE `namabarang` = 'Kertas kop Poltek jurusan Teknik Mesin, F4' OR `namabarang` = 'Kertas kop Poltek jurusan Teknik Mesin, F4';
UPDATE `barangbergerak` 
SET `ketersediaan` = 21, `unit` = 'Rim', `keterangan` = 'ADM/OPERASIONAL KANTOR', `tanggal` = '2026-11-09' 
WHERE `namabarang` = 'Kertas kop Poltek-GT baru A4' OR `namabarang` = 'Kertas kop Poltek-GT baru A4';
UPDATE `masterbarang` 
SET `jumlah` = 21, `jenisbarang` = 'Rim', `keterangan` = 'ADM/OPERASIONAL KANTOR' 
WHERE `namabarang` = 'Kertas kop Poltek-GT baru A4' OR `namabarang` = 'Kertas kop Poltek-GT baru A4';
UPDATE `barangbergerak` 
SET `ketersediaan` = 5, `unit` = 'Rim', `keterangan` = 'ADM/OPERASIONAL KANTOR', `tanggal` = '2026-11-09' 
WHERE `namabarang` = 'Kertas kop Poltek-GT baru F4' OR `namabarang` = 'Kertas kop Poltek-GT baru F4';
UPDATE `masterbarang` 
SET `jumlah` = 5, `jenisbarang` = 'Rim', `keterangan` = 'ADM/OPERASIONAL KANTOR' 
WHERE `namabarang` = 'Kertas kop Poltek-GT baru F4' OR `namabarang` = 'Kertas kop Poltek-GT baru F4';
UPDATE `barangbergerak` 
SET `ketersediaan` = 500, `unit` = 'Sheet', `keterangan` = 'PMB', `tanggal` = '2026-11-09' 
WHERE `namabarang` = 'Kertas lembar ujian PMB' OR `namabarang` = 'Kertas lembar ujian PMB';
UPDATE `masterbarang` 
SET `jumlah` = 500, `jenisbarang` = 'Sheet', `keterangan` = 'PMB' 
WHERE `namabarang` = 'Kertas lembar ujian PMB' OR `namabarang` = 'Kertas lembar ujian PMB';
UPDATE `barangbergerak` 
SET `ketersediaan` = 1, `unit` = 'Buah', `keterangan` = 'KEBERSIHAN', `tanggal` = '2026-11-09' 
WHERE `namabarang` = 'Keset karet' OR `namabarang` = 'Keset karet';
UPDATE `masterbarang` 
SET `jumlah` = 1, `jenisbarang` = 'Buah', `keterangan` = 'KEBERSIHAN' 
WHERE `namabarang` = 'Keset karet' OR `namabarang` = 'Keset karet';
UPDATE `barangbergerak` 
SET `ketersediaan` = 51, `unit` = 'Pack', `keterangan` = 'PMB/WISUDA', `tanggal` = '2026-11-09' 
WHERE `namabarang` = 'Label T & J no. 121' OR `namabarang` = 'Label T & J no. 121';
UPDATE `masterbarang` 
SET `jumlah` = 51, `jenisbarang` = 'Pack', `keterangan` = 'PMB/WISUDA' 
WHERE `namabarang` = 'Label T & J no. 121' OR `namabarang` = 'Label T & J no. 121';
UPDATE `barangbergerak` 
SET `ketersediaan` = 12, `unit` = 'Buah', `keterangan` = 'ADM/OPERASIONAL KANTOR', `tanggal` = '2026-11-09' 
WHERE `namabarang` = 'Laqban kertas' OR `namabarang` = 'Laqban kertas';
UPDATE `masterbarang` 
SET `jumlah` = 12, `jenisbarang` = 'Buah', `keterangan` = 'ADM/OPERASIONAL KANTOR' 
WHERE `namabarang` = 'Laqban kertas' OR `namabarang` = 'Laqban kertas';
UPDATE `barangbergerak` 
SET `ketersediaan` = 24, `unit` = 'Buah', `keterangan` = 'ADM/OPERASIONAL KANTOR', `tanggal` = '2026-11-09' 
WHERE `namabarang` = 'Laqban plastik bening' OR `namabarang` = 'Laqban plastik bening/coklat';
UPDATE `masterbarang` 
SET `jumlah` = 24, `jenisbarang` = 'Buah', `keterangan` = 'ADM/OPERASIONAL KANTOR' 
WHERE `namabarang` = 'Laqban plastik bening' OR `namabarang` = 'Laqban plastik bening/coklat';
UPDATE `barangbergerak` 
SET `ketersediaan` = 4, `unit` = 'Buah', `keterangan` = 'SEMINAR/KULIAH', `tanggal` = '2026-11-09' 
WHERE `namabarang` = 'Layar infocus stand' OR `namabarang` = 'Layar infocus stand';
UPDATE `masterbarang` 
SET `jumlah` = 4, `jenisbarang` = 'Buah', `keterangan` = 'SEMINAR/KULIAH' 
WHERE `namabarang` = 'Layar infocus stand' OR `namabarang` = 'Layar infocus stand';
UPDATE `barangbergerak` 
SET `ketersediaan` = 0, `unit` = 'Kg', `keterangan` = 'RUMAH TANGGA', `tanggal` = '2026-11-09' 
WHERE `namabarang` = 'Lem Aica-Aibon 601' OR `namabarang` = 'Lem aica-Aibon 601';
UPDATE `masterbarang` 
SET `jumlah` = 0, `jenisbarang` = 'Kg', `keterangan` = 'RUMAH TANGGA' 
WHERE `namabarang` = 'Lem Aica-Aibon 601' OR `namabarang` = 'Lem aica-Aibon 601';
UPDATE `barangbergerak` 
SET `ketersediaan` = 0, `unit` = 'Botol', `keterangan` = 'ADM/OPERASIONAL KANTOR', `tanggal` = '2026-11-09' 
WHERE `namabarang` = 'Lem indrakol/FOX' OR `namabarang` = 'Lem indrakol/FOX';
UPDATE `masterbarang` 
SET `jumlah` = 0, `jenisbarang` = 'Botol', `keterangan` = 'ADM/OPERASIONAL KANTOR' 
WHERE `namabarang` = 'Lem indrakol/FOX' OR `namabarang` = 'Lem indrakol/FOX';
UPDATE `barangbergerak` 
SET `ketersediaan` = 20, `unit` = 'Buah', `keterangan` = 'ADM/OPERASIONAL KANTOR', `tanggal` = '2026-11-09' 
WHERE `namabarang` = 'Lem kertas stick UHU 21 grm' OR `namabarang` = 'Lem kertas stick ''UHU'' 21 grm';
UPDATE `masterbarang` 
SET `jumlah` = 20, `jenisbarang` = 'Buah', `keterangan` = 'ADM/OPERASIONAL KANTOR' 
WHERE `namabarang` = 'Lem kertas stick UHU 21 grm' OR `namabarang` = 'Lem kertas stick ''UHU'' 21 grm';
UPDATE `barangbergerak` 
SET `ketersediaan` = 0, `unit` = 'Buah', `keterangan` = 'ADM/OPERASIONAL KANTOR', `tanggal` = '2026-11-09' 
WHERE `namabarang` = 'Letter file uk. pendek' OR `namabarang` = 'Letter file uk. Pendek (PVC Ordner FC)';
UPDATE `masterbarang` 
SET `jumlah` = 0, `jenisbarang` = 'Buah', `keterangan` = 'ADM/OPERASIONAL KANTOR' 
WHERE `namabarang` = 'Letter file uk. pendek' OR `namabarang` = 'Letter file uk. Pendek (PVC Ordner FC)';
UPDATE `barangbergerak` 
SET `ketersediaan` = 5, `unit` = 'Buah', `keterangan` = 'ADM/OPERASIONAL KANTOR', `tanggal` = '2026-11-09' 
WHERE `namabarang` = 'Letter file uk. tinggi' OR `namabarang` = 'Letter file uk. Tinggi (PVC Ordner FC)';
UPDATE `masterbarang` 
SET `jumlah` = 5, `jenisbarang` = 'Buah', `keterangan` = 'ADM/OPERASIONAL KANTOR' 
WHERE `namabarang` = 'Letter file uk. tinggi' OR `namabarang` = 'Letter file uk. Tinggi (PVC Ordner FC)';
UPDATE `barangbergerak` 
SET `ketersediaan` = 100, `unit` = 'Buah', `keterangan` = 'ADM/OPERASIONAL KANTOR', `tanggal` = '2026-11-09' 
WHERE `namabarang` = 'Map gantung' OR `namabarang` = 'Map gantung (Filing folder no. 100)';
UPDATE `masterbarang` 
SET `jumlah` = 100, `jenisbarang` = 'Buah', `keterangan` = 'ADM/OPERASIONAL KANTOR' 
WHERE `namabarang` = 'Map gantung' OR `namabarang` = 'Map gantung (Filing folder no. 100)';
UPDATE `barangbergerak` 
SET `ketersediaan` = 2, `unit` = 'Buah', `keterangan` = 'PMB/WISUDA', `tanggal` = '2026-11-09' 
WHERE `namabarang` = 'Mega phone' OR `namabarang` = 'Mega phone';
UPDATE `masterbarang` 
SET `jumlah` = 2, `jenisbarang` = 'Buah', `keterangan` = 'PMB/WISUDA' 
WHERE `namabarang` = 'Mega phone' OR `namabarang` = 'Mega phone';
UPDATE `barangbergerak` 
SET `ketersediaan` = 10, `unit` = 'Buah', `keterangan` = 'WISUDA/SENAT', `tanggal` = '2026-11-09' 
WHERE `namabarang` = 'Mendali senat Poltek-GT' OR `namabarang` = 'Mendali Senat Poltek GT';
UPDATE `masterbarang` 
SET `jumlah` = 10, `jenisbarang` = 'Buah', `keterangan` = 'WISUDA/SENAT' 
WHERE `namabarang` = 'Mendali senat Poltek-GT' OR `namabarang` = 'Mendali Senat Poltek GT';
UPDATE `barangbergerak` 
SET `ketersediaan` = 307, `unit` = 'Buah', `keterangan` = 'WISUDA/MHS.', `tanggal` = '2026-11-09' 
WHERE `namabarang` = 'Mendali wisudawan' OR `namabarang` = 'Mendali Wisudawan Poltek-GT';
UPDATE `masterbarang` 
SET `jumlah` = 307, `jenisbarang` = 'Buah', `keterangan` = 'WISUDA/MHS.' 
WHERE `namabarang` = 'Mendali wisudawan' OR `namabarang` = 'Mendali Wisudawan Poltek-GT';
UPDATE `barangbergerak` 
SET `ketersediaan` = 2, `unit` = 'Buah', `keterangan` = 'PMB/WISUDA', `tanggal` = '2026-11-09' 
WHERE `namabarang` = 'Nampan plastik' OR `namabarang` = 'Nampan plastik';
UPDATE `masterbarang` 
SET `jumlah` = 2, `jenisbarang` = 'Buah', `keterangan` = 'PMB/WISUDA' 
WHERE `namabarang` = 'Nampan plastik' OR `namabarang` = 'Nampan plastik';
UPDATE `barangbergerak` 
SET `ketersediaan` = 437, `unit` = 'Psng', `keterangan` = 'MHS', `tanggal` = '2026-11-09' 
WHERE `namabarang` = 'Pangkat mahasiswa' OR `namabarang` = 'Pangkat';
UPDATE `masterbarang` 
SET `jumlah` = 437, `jenisbarang` = 'Psng', `keterangan` = 'MHS' 
WHERE `namabarang` = 'Pangkat mahasiswa' OR `namabarang` = 'Pangkat';
UPDATE `barangbergerak` 
SET `ketersediaan` = 140, `unit` = 'Buah', `keterangan` = 'PMB', `tanggal` = '2026-11-09' 
WHERE `namabarang` = 'Papan jalan' OR `namabarang` = 'Papan jalan';
UPDATE `masterbarang` 
SET `jumlah` = 140, `jenisbarang` = 'Buah', `keterangan` = 'PMB' 
WHERE `namabarang` = 'Papan jalan' OR `namabarang` = 'Papan jalan';
UPDATE `barangbergerak` 
SET `ketersediaan` = 0, `unit` = 'Buah', `keterangan` = 'PERKULIAHAN', `tanggal` = '2026-11-09' 
WHERE `namabarang` = 'Papan tulis' OR `namabarang` = 'Papan tulis';
UPDATE `masterbarang` 
SET `jumlah` = 0, `jenisbarang` = 'Buah', `keterangan` = 'PERKULIAHAN' 
WHERE `namabarang` = 'Papan tulis' OR `namabarang` = 'Papan tulis';
UPDATE `barangbergerak` 
SET `ketersediaan` = 350, `unit` = 'Pcs', `keterangan` = 'ADM/OPERASIONAL KANTOR', `tanggal` = '2026-11-09' 
WHERE `namabarang` = 'Paper fastener (ring map gantung)' OR `namabarang` = 'Paper fastener';
UPDATE `masterbarang` 
SET `jumlah` = 350, `jenisbarang` = 'Pcs', `keterangan` = 'ADM/OPERASIONAL KANTOR' 
WHERE `namabarang` = 'Paper fastener (ring map gantung)' OR `namabarang` = 'Paper fastener';
UPDATE `barangbergerak` 
SET `ketersediaan` = 1, `unit` = 'Buah', `keterangan` = 'ADM/OPERASIONAL KANTOR', `tanggal` = '2026-11-09' 
WHERE `namabarang` = 'Pelobang kertas besar no. 85' OR `namabarang` = 'Pelobang kertas besar no. 85';
UPDATE `masterbarang` 
SET `jumlah` = 1, `jenisbarang` = 'Buah', `keterangan` = 'ADM/OPERASIONAL KANTOR' 
WHERE `namabarang` = 'Pelobang kertas besar no. 85' OR `namabarang` = 'Pelobang kertas besar no. 85';
UPDATE `barangbergerak` 
SET `ketersediaan` = 5016, `unit` = 'Buah', `keterangan` = 'MHS/PMB', `tanggal` = '2026-11-09' 
WHERE `namabarang` = 'Pencil 2B' OR `namabarang` = 'Pencil 2B';
UPDATE `masterbarang` 
SET `jumlah` = 5016, `jenisbarang` = 'Buah', `keterangan` = 'MHS/PMB' 
WHERE `namabarang` = 'Pencil 2B' OR `namabarang` = 'Pencil 2B';
UPDATE `barangbergerak` 
SET `ketersediaan` = 1202, `unit` = 'Buah', `keterangan` = 'MHS', `tanggal` = '2026-11-09' 
WHERE `namabarang` = 'Penggaris busur' OR `namabarang` = 'Penggaris busur';
UPDATE `masterbarang` 
SET `jumlah` = 1202, `jenisbarang` = 'Buah', `keterangan` = 'MHS' 
WHERE `namabarang` = 'Penggaris busur' OR `namabarang` = 'Penggaris busur';
UPDATE `barangbergerak` 
SET `ketersediaan` = 340, `unit` = 'Buah', `keterangan` = 'MHS/PMB', `tanggal` = '2026-11-09' 
WHERE `namabarang` = 'Penghapus pencil' OR `namabarang` = 'Penghapus pencil';
UPDATE `masterbarang` 
SET `jumlah` = 340, `jenisbarang` = 'Buah', `keterangan` = 'MHS/PMB' 
WHERE `namabarang` = 'Penghapus pencil' OR `namabarang` = 'Penghapus pencil';
UPDATE `barangbergerak` 
SET `ketersediaan` = 86, `unit` = 'Buah', `keterangan` = 'PERKULIAHAN', `tanggal` = '2026-11-09' 
WHERE `namabarang` = 'Penghapus whiteboard' OR `namabarang` = 'Penghapus whiteboard';
UPDATE `masterbarang` 
SET `jumlah` = 86, `jenisbarang` = 'Buah', `keterangan` = 'PERKULIAHAN' 
WHERE `namabarang` = 'Penghapus whiteboard' OR `namabarang` = 'Penghapus whiteboard';
UPDATE `barangbergerak` 
SET `ketersediaan` = 3, `unit` = 'Buah', `keterangan` = 'KEBERSIHAN', `tanggal` = '2026-11-09' 
WHERE `namabarang` = 'Pengki' OR `namabarang` = 'Pengki';
UPDATE `masterbarang` 
SET `jumlah` = 3, `jenisbarang` = 'Buah', `keterangan` = 'KEBERSIHAN' 
WHERE `namabarang` = 'Pengki' OR `namabarang` = 'Pengki';
UPDATE `barangbergerak` 
SET `ketersediaan` = 1, `unit` = 'Buah', `keterangan` = 'DRUM BAND', `tanggal` = '2026-11-09' 
WHERE `namabarang` = 'Penutup alat drum band Bass' OR `namabarang` = 'Penutup alat drum band Bass';
UPDATE `masterbarang` 
SET `jumlah` = 1, `jenisbarang` = 'Buah', `keterangan` = 'DRUM BAND' 
WHERE `namabarang` = 'Penutup alat drum band Bass' OR `namabarang` = 'Penutup alat drum band Bass';
UPDATE `barangbergerak` 
SET `ketersediaan` = 4, `unit` = 'Buah', `keterangan` = 'DRUM BAND', `tanggal` = '2026-11-09' 
WHERE `namabarang` = 'Penutup alat drum band Belira' OR `namabarang` = 'Penutup alat drum band Belira';
UPDATE `masterbarang` 
SET `jumlah` = 4, `jenisbarang` = 'Buah', `keterangan` = 'DRUM BAND' 
WHERE `namabarang` = 'Penutup alat drum band Belira' OR `namabarang` = 'Penutup alat drum band Belira';
UPDATE `barangbergerak` 
SET `ketersediaan` = 9, `unit` = 'Buah', `keterangan` = 'DRUM BAND', `tanggal` = '2026-11-09' 
WHERE `namabarang` = 'Penutup alat drum band Snare drum bass' OR `namabarang` = 'Penutup alat drum band Snare drum bass';
UPDATE `masterbarang` 
SET `jumlah` = 9, `jenisbarang` = 'Buah', `keterangan` = 'DRUM BAND' 
WHERE `namabarang` = 'Penutup alat drum band Snare drum bass' OR `namabarang` = 'Penutup alat drum band Snare drum bass';
UPDATE `barangbergerak` 
SET `ketersediaan` = 9, `unit` = 'Buah', `keterangan` = 'DRUM BAND', `tanggal` = '2026-11-09' 
WHERE `namabarang` = 'Penutup alat drum band Tenor' OR `namabarang` = 'Penutup alat drum band Tenor';
UPDATE `masterbarang` 
SET `jumlah` = 9, `jenisbarang` = 'Buah', `keterangan` = 'DRUM BAND' 
WHERE `namabarang` = 'Penutup alat drum band Tenor' OR `namabarang` = 'Penutup alat drum band Tenor';
UPDATE `barangbergerak` 
SET `ketersediaan` = 11, `unit` = 'Buah', `keterangan` = 'DRUM BAND', `tanggal` = '2026-11-09' 
WHERE `namabarang` = 'Penutup alat drum band Trombon' OR `namabarang` = 'Penutup alat drum band Trombon';
UPDATE `masterbarang` 
SET `jumlah` = 11, `jenisbarang` = 'Buah', `keterangan` = 'DRUM BAND' 
WHERE `namabarang` = 'Penutup alat drum band Trombon' OR `namabarang` = 'Penutup alat drum band Trombon';
UPDATE `barangbergerak` 
SET `ketersediaan` = 9, `unit` = 'Buah', `keterangan` = 'DRUM BAND', `tanggal` = '2026-11-09' 
WHERE `namabarang` = 'Penutup alat drum band Trompet' OR `namabarang` = 'Penutup alat drum band Trompet';
UPDATE `masterbarang` 
SET `jumlah` = 9, `jenisbarang` = 'Buah', `keterangan` = 'DRUM BAND' 
WHERE `namabarang` = 'Penutup alat drum band Trompet' OR `namabarang` = 'Penutup alat drum band Trompet';
UPDATE `barangbergerak` 
SET `ketersediaan` = 7, `unit` = 'Buah', `keterangan` = 'SEMINAR/KULIAH UMUM', `tanggal` = '2026-11-09' 
WHERE `namabarang` = 'Plakat kenang-kenangan Poltek' OR `namabarang` = 'Plakat kenang-kenangan Poltek (5 tanpa tempat)';
UPDATE `masterbarang` 
SET `jumlah` = 7, `jenisbarang` = 'Buah', `keterangan` = 'SEMINAR/KULIAH UMUM' 
WHERE `namabarang` = 'Plakat kenang-kenangan Poltek' OR `namabarang` = 'Plakat kenang-kenangan Poltek (5 tanpa tempat)';
UPDATE `barangbergerak` 
SET `ketersediaan` = 110, `unit` = 'Sheet', `keterangan` = 'ADM/OPERASIONAL KANTOR', `tanggal` = '2026-11-09' 
WHERE `namabarang` = 'Plastik  PP pockets A4 clear' OR `namabarang` = 'Plastik PP pockets A4 clear';
UPDATE `masterbarang` 
SET `jumlah` = 110, `jenisbarang` = 'Sheet', `keterangan` = 'ADM/OPERASIONAL KANTOR' 
WHERE `namabarang` = 'Plastik  PP pockets A4 clear' OR `namabarang` = 'Plastik PP pockets A4 clear';
UPDATE `barangbergerak` 
SET `ketersediaan` = 320, `unit` = 'Sheet', `keterangan` = 'ADM/OPERASIONAL KANTOR', `tanggal` = '2026-11-09' 
WHERE `namabarang` = 'Plastik transparasi film yashica' OR `namabarang` = 'Plastik transparasi film yashica';
UPDATE `masterbarang` 
SET `jumlah` = 320, `jenisbarang` = 'Sheet', `keterangan` = 'ADM/OPERASIONAL KANTOR' 
WHERE `namabarang` = 'Plastik transparasi film yashica' OR `namabarang` = 'Plastik transparasi film yashica';
UPDATE `barangbergerak` 
SET `ketersediaan` = 108, `unit` = 'Buah', `keterangan` = 'PMB', `tanggal` = '2026-11-09' 
WHERE `namabarang` = 'Pluit' OR `namabarang` = 'Pluit Merah';
UPDATE `masterbarang` 
SET `jumlah` = 108, `jenisbarang` = 'Buah', `keterangan` = 'PMB' 
WHERE `namabarang` = 'Pluit' OR `namabarang` = 'Pluit Merah';
UPDATE `barangbergerak` 
SET `ketersediaan` = 110, `unit` = 'Buah', `keterangan` = 'PMB', `tanggal` = '2026-11-09' 
WHERE `namabarang` = 'Pluit' OR `namabarang` = 'Pluit Putih';
UPDATE `masterbarang` 
SET `jumlah` = 110, `jenisbarang` = 'Buah', `keterangan` = 'PMB' 
WHERE `namabarang` = 'Pluit' OR `namabarang` = 'Pluit Putih';
UPDATE `barangbergerak` 
SET `ketersediaan` = 7, `unit` = 'Buah', `keterangan` = 'PMB', `tanggal` = '2026-11-09' 
WHERE `namabarang` = 'Pompa air galon' OR `namabarang` = 'Pompa air galon';
UPDATE `masterbarang` 
SET `jumlah` = 7, `jenisbarang` = 'Buah', `keterangan` = 'PMB' 
WHERE `namabarang` = 'Pompa air galon' OR `namabarang` = 'Pompa air galon';
UPDATE `barangbergerak` 
SET `ketersediaan` = 12, `unit` = 'Pack', `keterangan` = 'ADM/OPERASIONAL KANTOR', `tanggal` = '2026-11-09' 
WHERE `namabarang` = 'Pos it (stick on notes)' OR `namabarang` = 'Pos it (stick on notes)';
UPDATE `masterbarang` 
SET `jumlah` = 12, `jenisbarang` = 'Pack', `keterangan` = 'ADM/OPERASIONAL KANTOR' 
WHERE `namabarang` = 'Pos it (stick on notes)' OR `namabarang` = 'Pos it (stick on notes)';
UPDATE `barangbergerak` 
SET `ketersediaan` = 30, `unit` = 'Buah', `keterangan` = 'PATAKA', `tanggal` = '2026-11-09' 
WHERE `namabarang` = 'Sabuk Pataka' OR `namabarang` = 'Sabuk Pataka (kopel ring)';
UPDATE `masterbarang` 
SET `jumlah` = 30, `jenisbarang` = 'Buah', `keterangan` = 'PATAKA' 
WHERE `namabarang` = 'Sabuk Pataka' OR `namabarang` = 'Sabuk Pataka (kopel ring)';
UPDATE `barangbergerak` 
SET `ketersediaan` = 1, `unit` = 'Buah', `keterangan` = 'KEBERSIHAN', `tanggal` = '2026-11-09' 
WHERE `namabarang` = 'Sapu karet lantai air' OR `namabarang` = 'Sapu karet lantai air';
UPDATE `masterbarang` 
SET `jumlah` = 1, `jenisbarang` = 'Buah', `keterangan` = 'KEBERSIHAN' 
WHERE `namabarang` = 'Sapu karet lantai air' OR `namabarang` = 'Sapu karet lantai air';
UPDATE `barangbergerak` 
SET `ketersediaan` = 19, `unit` = 'Buah', `keterangan` = 'KEBERSIHAN', `tanggal` = '2026-11-09' 
WHERE `namabarang` = 'Sapu lantai' OR `namabarang` = 'Sapu lantai';
UPDATE `masterbarang` 
SET `jumlah` = 19, `jenisbarang` = 'Buah', `keterangan` = 'KEBERSIHAN' 
WHERE `namabarang` = 'Sapu lantai' OR `namabarang` = 'Sapu lantai';
UPDATE `barangbergerak` 
SET `ketersediaan` = 8, `unit` = 'Buah', `keterangan` = 'KEBERSIHAN', `tanggal` = '2026-11-09' 
WHERE `namabarang` = 'Sapu lidi' OR `namabarang` = 'Sapu lidi';
UPDATE `masterbarang` 
SET `jumlah` = 8, `jenisbarang` = 'Buah', `keterangan` = 'KEBERSIHAN' 
WHERE `namabarang` = 'Sapu lidi' OR `namabarang` = 'Sapu lidi';
UPDATE `barangbergerak` 
SET `ketersediaan` = 60, `unit` = 'Pasang', `keterangan` = 'PATAKA', `tanggal` = '2026-11-09' 
WHERE `namabarang` = 'Sarung tangan pataka' OR `namabarang` = 'Sarung tangan pataka';
UPDATE `masterbarang` 
SET `jumlah` = 60, `jenisbarang` = 'Pasang', `keterangan` = 'PATAKA' 
WHERE `namabarang` = 'Sarung tangan pataka' OR `namabarang` = 'Sarung tangan pataka';
UPDATE `barangbergerak` 
SET `ketersediaan` = 17, `unit` = 'Buah', `keterangan` = 'WISUDA', `tanggal` = '2026-11-09' 
WHERE `namabarang` = 'Selendang cumlaude' OR `namabarang` = 'Selendang cumlaude wisuda';
UPDATE `masterbarang` 
SET `jumlah` = 17, `jenisbarang` = 'Buah', `keterangan` = 'WISUDA' 
WHERE `namabarang` = 'Selendang cumlaude' OR `namabarang` = 'Selendang cumlaude wisuda';
UPDATE `barangbergerak` 
SET `ketersediaan` = 301, `unit` = 'Buah', `keterangan` = 'WISUDA/MHS.', `tanggal` = '2026-11-09' 
WHERE `namabarang` = 'Selongsong Wisuda' OR `namabarang` = 'Selongsong wisuda';
UPDATE `masterbarang` 
SET `jumlah` = 301, `jenisbarang` = 'Buah', `keterangan` = 'WISUDA/MHS.' 
WHERE `namabarang` = 'Selongsong Wisuda' OR `namabarang` = 'Selongsong wisuda';
UPDATE `barangbergerak` 
SET `ketersediaan` = 79, `unit` = 'Pasang', `keterangan` = 'MHS', `tanggal` = '2026-11-09' 
WHERE `namabarang` = 'Sepatu PDH' OR `namabarang` = 'Sepatu PDH';
UPDATE `masterbarang` 
SET `jumlah` = 79, `jenisbarang` = 'Pasang', `keterangan` = 'MHS' 
WHERE `namabarang` = 'Sepatu PDH' OR `namabarang` = 'Sepatu PDH';
UPDATE `barangbergerak` 
SET `ketersediaan` = 75, `unit` = 'Pasang', `keterangan` = 'MHS', `tanggal` = '2026-11-09' 
WHERE `namabarang` = 'Sepatu sefty' OR `namabarang` = 'Sepatu sefty';
UPDATE `masterbarang` 
SET `jumlah` = 75, `jenisbarang` = 'Pasang', `keterangan` = 'MHS' 
WHERE `namabarang` = 'Sepatu sefty' OR `namabarang` = 'Sepatu sefty';
UPDATE `barangbergerak` 
SET `ketersediaan` = 0, `unit` = 'Buah', `keterangan` = 'KEBERSIHAN', `tanggal` = '2026-11-09' 
WHERE `namabarang` = 'Sikat lantai gagang panjang' OR `namabarang` = 'Sikat lantai gagang panjang';
UPDATE `masterbarang` 
SET `jumlah` = 0, `jenisbarang` = 'Buah', `keterangan` = 'KEBERSIHAN' 
WHERE `namabarang` = 'Sikat lantai gagang panjang' OR `namabarang` = 'Sikat lantai gagang panjang';
UPDATE `barangbergerak` 
SET `ketersediaan` = 2, `unit` = 'Buah', `keterangan` = 'KEBERSIHAN', `tanggal` = '2026-11-09' 
WHERE `namabarang` = 'Sikat WC' OR `namabarang` = 'Sikat WC';
UPDATE `masterbarang` 
SET `jumlah` = 2, `jenisbarang` = 'Buah', `keterangan` = 'KEBERSIHAN' 
WHERE `namabarang` = 'Sikat WC' OR `namabarang` = 'Sikat WC';
UPDATE `barangbergerak` 
SET `ketersediaan` = 32, `unit` = 'Buah', `keterangan` = 'PMB/ADM', `tanggal` = '2026-11-09' 
WHERE `namabarang` = 'Spidol kecil warna biru' OR `namabarang` = 'Spidol kecil warna biru';
UPDATE `masterbarang` 
SET `jumlah` = 32, `jenisbarang` = 'Buah', `keterangan` = 'PMB/ADM' 
WHERE `namabarang` = 'Spidol kecil warna biru' OR `namabarang` = 'Spidol kecil warna biru';
UPDATE `barangbergerak` 
SET `ketersediaan` = 136, `unit` = 'Buah', `keterangan` = 'PMB/ADM', `tanggal` = '2026-11-09' 
WHERE `namabarang` = 'Spidol kecil warna hitam' OR `namabarang` = 'Spidol kecil warna hitam';
UPDATE `masterbarang` 
SET `jumlah` = 136, `jenisbarang` = 'Buah', `keterangan` = 'PMB/ADM' 
WHERE `namabarang` = 'Spidol kecil warna hitam' OR `namabarang` = 'Spidol kecil warna hitam';
UPDATE `barangbergerak` 
SET `ketersediaan` = 24, `unit` = 'Buah', `keterangan` = 'PMB/ADM', `tanggal` = '2026-11-09' 
WHERE `namabarang` = 'Spidol kecil warna merah' OR `namabarang` = 'Spidol kecil warna merah';
UPDATE `masterbarang` 
SET `jumlah` = 24, `jenisbarang` = 'Buah', `keterangan` = 'PMB/ADM' 
WHERE `namabarang` = 'Spidol kecil warna merah' OR `namabarang` = 'Spidol kecil warna merah';
UPDATE `barangbergerak` 
SET `ketersediaan` = 4, `unit` = 'Buah', `keterangan` = 'SEMINAR/KULIAH UMUM', `tanggal` = '2026-11-09' 
WHERE `namabarang` = 'Spidol whiteboard besar warna biru' OR `namabarang` = 'Spidol whiteboard besar warna biru';
UPDATE `masterbarang` 
SET `jumlah` = 4, `jenisbarang` = 'Buah', `keterangan` = 'SEMINAR/KULIAH UMUM' 
WHERE `namabarang` = 'Spidol whiteboard besar warna biru' OR `namabarang` = 'Spidol whiteboard besar warna biru';
UPDATE `barangbergerak` 
SET `ketersediaan` = 5, `unit` = 'Buah', `keterangan` = 'PERKULIAHAN', `tanggal` = '2026-11-09' 
WHERE `namabarang` = 'Spidol whiteboard warna biru' OR `namabarang` = 'Spidol whiteboard warna biru';
UPDATE `masterbarang` 
SET `jumlah` = 5, `jenisbarang` = 'Buah', `keterangan` = 'PERKULIAHAN' 
WHERE `namabarang` = 'Spidol whiteboard warna biru' OR `namabarang` = 'Spidol whiteboard warna biru';
UPDATE `barangbergerak` 
SET `ketersediaan` = 15, `unit` = 'Buah', `keterangan` = 'PERKULIAHAN', `tanggal` = '2026-11-09' 
WHERE `namabarang` = 'Spidol whiteboard warna hitam' OR `namabarang` = 'Spidol whiteboard warna hitam';
UPDATE `masterbarang` 
SET `jumlah` = 15, `jenisbarang` = 'Buah', `keterangan` = 'PERKULIAHAN' 
WHERE `namabarang` = 'Spidol whiteboard warna hitam' OR `namabarang` = 'Spidol whiteboard warna hitam';
UPDATE `barangbergerak` 
SET `ketersediaan` = 189, `unit` = 'Buah', `keterangan` = 'PERKULIAHAN', `tanggal` = '2026-11-09' 
WHERE `namabarang` = 'Spidol whiteboard warna merah' OR `namabarang` = 'Spidol whiteboard warna merah';
UPDATE `masterbarang` 
SET `jumlah` = 189, `jenisbarang` = 'Buah', `keterangan` = 'PERKULIAHAN' 
WHERE `namabarang` = 'Spidol whiteboard warna merah' OR `namabarang` = 'Spidol whiteboard warna merah';
UPDATE `barangbergerak` 
SET `ketersediaan` = 6, `unit` = 'Buah', `keterangan` = 'ADM/OPERASIONAL KANTOR', `tanggal` = '2026-11-09' 
WHERE `namabarang` = 'Staples HD - 10 Kecil' OR `namabarang` = 'Staples HD - 10 Kecil';
UPDATE `masterbarang` 
SET `jumlah` = 6, `jenisbarang` = 'Buah', `keterangan` = 'ADM/OPERASIONAL KANTOR' 
WHERE `namabarang` = 'Staples HD - 10 Kecil' OR `namabarang` = 'Staples HD - 10 Kecil';
UPDATE `barangbergerak` 
SET `ketersediaan` = 0, `unit` = 'Lembar', `keterangan` = 'PMB/WISUDA', `tanggal` = '2026-11-09' 
WHERE `namabarang` = 'Steroform kecil' OR `namabarang` = 'Steroform kecil';
UPDATE `masterbarang` 
SET `jumlah` = 0, `jenisbarang` = 'Lembar', `keterangan` = 'PMB/WISUDA' 
WHERE `namabarang` = 'Steroform kecil' OR `namabarang` = 'Steroform kecil';
UPDATE `barangbergerak` 
SET `ketersediaan` = 900, `unit` = 'Lembar', `keterangan` = 'PMB/WISUDA', `tanggal` = '2026-11-09' 
WHERE `namabarang` = 'Stopmap folio warna biru' OR `namabarang` = 'Stopmap folio warna biru';
UPDATE `masterbarang` 
SET `jumlah` = 900, `jenisbarang` = 'Lembar', `keterangan` = 'PMB/WISUDA' 
WHERE `namabarang` = 'Stopmap folio warna biru' OR `namabarang` = 'Stopmap folio warna biru';
UPDATE `barangbergerak` 
SET `ketersediaan` = 350, `unit` = 'Lembar', `keterangan` = 'PMB/WISUDA', `tanggal` = '2026-11-09' 
WHERE `namabarang` = 'Stopmap folio warna hijau' OR `namabarang` = 'Stopmap folio warna hijau';
UPDATE `masterbarang` 
SET `jumlah` = 350, `jenisbarang` = 'Lembar', `keterangan` = 'PMB/WISUDA' 
WHERE `namabarang` = 'Stopmap folio warna hijau' OR `namabarang` = 'Stopmap folio warna hijau';
UPDATE `barangbergerak` 
SET `ketersediaan` = 749, `unit` = 'Lembar', `keterangan` = 'PMB/WISUDA', `tanggal` = '2026-11-09' 
WHERE `namabarang` = 'Stopmap folio warna merah' OR `namabarang` = 'Stopmap folio warna merah';
UPDATE `masterbarang` 
SET `jumlah` = 749, `jenisbarang` = 'Lembar', `keterangan` = 'PMB/WISUDA' 
WHERE `namabarang` = 'Stopmap folio warna merah' OR `namabarang` = 'Stopmap folio warna merah';
UPDATE `barangbergerak` 
SET `ketersediaan` = 7, `unit` = 'Buah', `keterangan` = 'PERKULIAHAN/PMB', `tanggal` = '2026-11-09' 
WHERE `namabarang` = 'Stopwatch' OR `namabarang` = 'Stopwatch';
UPDATE `masterbarang` 
SET `jumlah` = 7, `jenisbarang` = 'Buah', `keterangan` = 'PERKULIAHAN/PMB' 
WHERE `namabarang` = 'Stopwatch' OR `namabarang` = 'Stopwatch';
UPDATE `barangbergerak` 
SET `ketersediaan` = 77, `unit` = 'Buah', `keterangan` = 'PATAKA', `tanggal` = '2026-11-09' 
WHERE `namabarang` = 'Tali kur warna merah' OR `namabarang` = 'Tali kur warna merah';
UPDATE `masterbarang` 
SET `jumlah` = 77, `jenisbarang` = 'Buah', `keterangan` = 'PATAKA' 
WHERE `namabarang` = 'Tali kur warna merah' OR `namabarang` = 'Tali kur warna merah';
UPDATE `barangbergerak` 
SET `ketersediaan` = 76, `unit` = 'Buah', `keterangan` = 'PATAKA', `tanggal` = '2026-11-09' 
WHERE `namabarang` = 'Tali kur warna putih' OR `namabarang` = 'Tali kur warna putih';
UPDATE `masterbarang` 
SET `jumlah` = 76, `jenisbarang` = 'Buah', `keterangan` = 'PATAKA' 
WHERE `namabarang` = 'Tali kur warna putih' OR `namabarang` = 'Tali kur warna putih';
UPDATE `barangbergerak` 
SET `ketersediaan` = 480, `unit` = 'Buah', `keterangan` = 'PMB', `tanggal` = '2026-11-09' 
WHERE `namabarang` = 'Tali penneng' OR `namabarang` = 'Tali penneng untuk PMB';
UPDATE `masterbarang` 
SET `jumlah` = 480, `jenisbarang` = 'Buah', `keterangan` = 'PMB' 
WHERE `namabarang` = 'Tali penneng' OR `namabarang` = 'Tali penneng untuk PMB';
UPDATE `barangbergerak` 
SET `ketersediaan` = 1, `unit` = 'Roll', `keterangan` = 'PMB/WISUDA', `tanggal` = '2026-11-09' 
WHERE `namabarang` = 'Tali plastik rafia' OR `namabarang` = 'Tali plastik rafia';
UPDATE `masterbarang` 
SET `jumlah` = 1, `jenisbarang` = 'Roll', `keterangan` = 'PMB/WISUDA' 
WHERE `namabarang` = 'Tali plastik rafia' OR `namabarang` = 'Tali plastik rafia';
UPDATE `barangbergerak` 
SET `ketersediaan` = 8, `unit` = 'Meter (@15 m)', `keterangan` = 'WISUDA', `tanggal` = '2026-11-09' 
WHERE `namabarang` = 'Tali tambang plastik' OR `namabarang` = 'Tali tambang plastik';
UPDATE `masterbarang` 
SET `jumlah` = 8, `jenisbarang` = 'Meter (@15 m)', `keterangan` = 'WISUDA' 
WHERE `namabarang` = 'Tali tambang plastik' OR `namabarang` = 'Tali tambang plastik';
UPDATE `barangbergerak` 
SET `ketersediaan` = 16, `unit` = 'Buah', `keterangan` = 'R. TANGGA/SEMINAR', `tanggal` = '2026-11-09' 
WHERE `namabarang` = 'Taplak meja batik' OR `namabarang` = 'Taplak meja batik';
UPDATE `masterbarang` 
SET `jumlah` = 16, `jenisbarang` = 'Buah', `keterangan` = 'R. TANGGA/SEMINAR' 
WHERE `namabarang` = 'Taplak meja batik' OR `namabarang` = 'Taplak meja batik';
UPDATE `barangbergerak` 
SET `ketersediaan` = 7, `unit` = 'Buah', `keterangan` = 'R. TANGGA/SEMINAR', `tanggal` = '2026-11-09' 
WHERE `namabarang` = 'Taplak meja oval' OR `namabarang` = 'Taplak meja oval';
UPDATE `masterbarang` 
SET `jumlah` = 7, `jenisbarang` = 'Buah', `keterangan` = 'R. TANGGA/SEMINAR' 
WHERE `namabarang` = 'Taplak meja oval' OR `namabarang` = 'Taplak meja oval';
UPDATE `barangbergerak` 
SET `ketersediaan` = 1, `unit` = 'Buah', `keterangan` = 'WISUDA', `tanggal` = '2026-11-09' 
WHERE `namabarang` = 'Taplak nampan' OR `namabarang` = 'Taplak nampan';
UPDATE `masterbarang` 
SET `jumlah` = 1, `jenisbarang` = 'Buah', `keterangan` = 'WISUDA' 
WHERE `namabarang` = 'Taplak nampan' OR `namabarang` = 'Taplak nampan';
UPDATE `barangbergerak` 
SET `ketersediaan` = 6, `unit` = 'Botol', `keterangan` = 'ADM/OPERASIONAL KANTOR', `tanggal` = '2026-11-09' 
WHERE `namabarang` = 'Tinta printer cartridge HP laserjet' OR `namabarang` = 'Tinta printer cartridge HP Laserjet';
UPDATE `masterbarang` 
SET `jumlah` = 6, `jenisbarang` = 'Botol', `keterangan` = 'ADM/OPERASIONAL KANTOR' 
WHERE `namabarang` = 'Tinta printer cartridge HP laserjet' OR `namabarang` = 'Tinta printer cartridge HP Laserjet';
UPDATE `barangbergerak` 
SET `ketersediaan` = 6, `unit` = 'Buah', `keterangan` = 'ADM/OPERASIONAL KANTOR', `tanggal` = '2026-11-09' 
WHERE `namabarang` = 'Tinta printer Epson magenta' OR `namabarang` = 'Tinta printer Epson magenta';
UPDATE `masterbarang` 
SET `jumlah` = 6, `jenisbarang` = 'Buah', `keterangan` = 'ADM/OPERASIONAL KANTOR' 
WHERE `namabarang` = 'Tinta printer Epson magenta' OR `namabarang` = 'Tinta printer Epson magenta';
UPDATE `barangbergerak` 
SET `ketersediaan` = 49, `unit` = 'Btl', `keterangan` = 'PERKULIAHAN', `tanggal` = '2026-11-09' 
WHERE `namabarang` = 'Tinta refill warna biru' OR `namabarang` = 'Tinta refill warna biru';
UPDATE `masterbarang` 
SET `jumlah` = 49, `jenisbarang` = 'Btl', `keterangan` = 'PERKULIAHAN' 
WHERE `namabarang` = 'Tinta refill warna biru' OR `namabarang` = 'Tinta refill warna biru';
UPDATE `barangbergerak` 
SET `ketersediaan` = 0, `unit` = 'Btl', `keterangan` = 'PERKULIAHAN', `tanggal` = '2026-11-09' 
WHERE `namabarang` = 'Tinta refill warna hitam' OR `namabarang` = 'Tinta refill warna hitam';
UPDATE `masterbarang` 
SET `jumlah` = 0, `jenisbarang` = 'Btl', `keterangan` = 'PERKULIAHAN' 
WHERE `namabarang` = 'Tinta refill warna hitam' OR `namabarang` = 'Tinta refill warna hitam';
UPDATE `barangbergerak` 
SET `ketersediaan` = 119, `unit` = 'Btl', `keterangan` = 'PERKULIAHAN', `tanggal` = '2026-11-09' 
WHERE `namabarang` = 'Tinta refill warna merah' OR `namabarang` = 'Tinta refill warna merah';
UPDATE `masterbarang` 
SET `jumlah` = 119, `jenisbarang` = 'Btl', `keterangan` = 'PERKULIAHAN' 
WHERE `namabarang` = 'Tinta refill warna merah' OR `namabarang` = 'Tinta refill warna merah';
UPDATE `barangbergerak` 
SET `ketersediaan` = 21, `unit` = 'Botol', `keterangan` = 'ADM/OPERASIONAL KANTOR', `tanggal` = '2026-11-09' 
WHERE `namabarang` = 'Tinta stempel warna biru' OR `namabarang` = 'Tinta stempel warna biru';
UPDATE `masterbarang` 
SET `jumlah` = 21, `jenisbarang` = 'Botol', `keterangan` = 'ADM/OPERASIONAL KANTOR' 
WHERE `namabarang` = 'Tinta stempel warna biru' OR `namabarang` = 'Tinta stempel warna biru';
UPDATE `barangbergerak` 
SET `ketersediaan` = 1, `unit` = 'Botol', `keterangan` = 'ADM/OPERASIONAL KANTOR', `tanggal` = '2026-11-09' 
WHERE `namabarang` = 'Tinta stempel warna hitam' OR `namabarang` = 'Tinta stempel warna hitam';
UPDATE `masterbarang` 
SET `jumlah` = 1, `jenisbarang` = 'Botol', `keterangan` = 'ADM/OPERASIONAL KANTOR' 
WHERE `namabarang` = 'Tinta stempel warna hitam' OR `namabarang` = 'Tinta stempel warna hitam';
UPDATE `barangbergerak` 
SET `ketersediaan` = 7, `unit` = 'Botol', `keterangan` = 'ADM/OPERASIONAL KANTOR', `tanggal` = '2026-11-09' 
WHERE `namabarang` = 'Tinta stempel warna merah' OR `namabarang` = 'Tinta stempel warna merah';
UPDATE `masterbarang` 
SET `jumlah` = 7, `jenisbarang` = 'Botol', `keterangan` = 'ADM/OPERASIONAL KANTOR' 
WHERE `namabarang` = 'Tinta stempel warna merah' OR `namabarang` = 'Tinta stempel warna merah';
UPDATE `barangbergerak` 
SET `ketersediaan` = 180, `unit` = 'Buah', `keterangan` = 'MHS/ADM.', `tanggal` = '2026-11-09' 
WHERE `namabarang` = 'Tip-ex pentel' OR `namabarang` = 'Tip-ex';
UPDATE `masterbarang` 
SET `jumlah` = 180, `jenisbarang` = 'Buah', `keterangan` = 'MHS/ADM.' 
WHERE `namabarang` = 'Tip-ex pentel' OR `namabarang` = 'Tip-ex';
UPDATE `barangbergerak` 
SET `ketersediaan` = 2, `unit` = 'Botol', `keterangan` = 'ADM/OPERASIONAL KANTOR', `tanggal` = '2026-11-09' 
WHERE `namabarang` = 'Toner foto copy Sharp MX312 AT' OR `namabarang` = 'Toner foto copy Sharp MX312 AT';
UPDATE `masterbarang` 
SET `jumlah` = 2, `jenisbarang` = 'Botol', `keterangan` = 'ADM/OPERASIONAL KANTOR' 
WHERE `namabarang` = 'Toner foto copy Sharp MX312 AT' OR `namabarang` = 'Toner foto copy Sharp MX312 AT';
UPDATE `barangbergerak` 
SET `ketersediaan` = 306, `unit` = 'Buah', `keterangan` = 'WISUDA/MHS.', `tanggal` = '2026-11-09' 
WHERE `namabarang` = 'Topi Wisudawan' OR `namabarang` = 'Topi Wisudawan Poltek-GT';
UPDATE `masterbarang` 
SET `jumlah` = 306, `jenisbarang` = 'Buah', `keterangan` = 'WISUDA/MHS.' 
WHERE `namabarang` = 'Topi Wisudawan' OR `namabarang` = 'Topi Wisudawan Poltek-GT';
UPDATE `barangbergerak` 
SET `ketersediaan` = 12, `unit` = 'Doz', `keterangan` = 'ADM/OPERASIONAL KANTOR', `tanggal` = '2026-11-09' 
WHERE `namabarang` = 'Trigonal clips no. 3' OR `namabarang` = 'Trigonal clips no. 3';
UPDATE `masterbarang` 
SET `jumlah` = 12, `jenisbarang` = 'Doz', `keterangan` = 'ADM/OPERASIONAL KANTOR' 
WHERE `namabarang` = 'Trigonal clips no. 3' OR `namabarang` = 'Trigonal clips no. 3';
UPDATE `barangbergerak` 
SET `ketersediaan` = 45, `unit` = 'Buah', `keterangan` = 'PATAKA', `tanggal` = '2026-11-09' 
WHERE `namabarang` = 'Wings Pataka  Poltek' OR `namabarang` = 'Wings Pataka Poltek';
UPDATE `masterbarang` 
SET `jumlah` = 45, `jenisbarang` = 'Buah', `keterangan` = 'PATAKA' 
WHERE `namabarang` = 'Wings Pataka  Poltek' OR `namabarang` = 'Wings Pataka Poltek';

-- BAGIAN 2: INSERT BARANG BARU KE TABEL masterbarang
INSERT INTO `masterbarang` (`kodebarang`, `merk`, `namabarang`, `jenisbarang`, `tipebarang`, `jumlah`, `keterangan`, `jenis_aset`) VALUES
('K0299', '', 'Acrylic tinggi 21 x 15 cm', 'Buah', '', 18, 'PMB/SEMINAR', 'Aset Bergerak'),
('K0300', '', 'Amplop kop Poltek w. coklat,  F4 berkas ujian', 'Pcs', '', 3203, 'ADM/OPERASIONAL KANTOR', 'Aset Bergerak'),
('K0301', '', 'Amplop kop Poltek warna coklat uk. F4', 'Pcs', '', 827, 'ADM/OPERASIONAL KANTOR', 'Aset Bergerak'),
('K0302', '', 'Amplop kop Poltek warna coklat uk. kecil', 'Pcs', '', 385, 'ADM/OPERASIONAL KANTOR', 'Aset Bergerak'),
('K0303', '', 'Amplop putih kop Poltek', 'Pcs', '', 1886, 'ADM/OPERASIONAL KANTOR', 'Aset Bergerak'),
('K0304', '', 'Amplop putih polos uk. Kecil 95x125mm', 'Pcs', '', 400, 'ADM/OPERASIONAL KANTOR', 'Aset Bergerak'),
('K0305', '', 'Amplop warna coklat polos uk. A4', 'Pcs', '', 38, 'ADM/OPERASIONAL KANTOR', 'Aset Bergerak'),
('K0306', '', 'Amplop warna coklat polos uk. F4', 'Pcs', '', 50, 'ADM/OPERASIONAL KANTOR', 'Aset Bergerak'),
('K0307', '', 'Amplop warna coklat uk. dobel folio polos/A3', 'Pcs', '', 3, 'ADM/OPERASIONAL KANTOR', 'Aset Bergerak'),
('K0308', '', 'Baju jas staf Poltek lama', 'Buah', '', 0, 'DOSEN/STAF', 'Aset Bergerak'),
('K0309', '', 'Baju Menwa', 'Buah', '', 5, 'MHS', 'Aset Bergerak'),
('K0310', '', 'Baju Seragam Mhs 2 stel', 'Stel', '', 7, 'MHS', 'Aset Bergerak'),
('K0311', '', 'Baret Menwa', 'Buah', '', 80, 'PATAKA', 'Aset Bergerak'),
('K0312', '', 'Batu baterai kalkulator', 'Buah', '', 14, 'ADM/OPERASIONAL KANTOR', 'Aset Bergerak'),
('K0313', '', 'Batu Baterai Kotak (9 v)', 'Buah', '', 12, 'PMB', 'Aset Bergerak'),
('K0314', '', 'Bendera jurusan Teknik Informasi (Logo Lama 2 Logo Baru 5 )', 'Buah', '', 7, 'PRODI TI', 'Aset Bergerak'),
('K0315', '', 'Binder clip no. 107', 'Doz (12 pcs)', '', 1, 'ADM/OPERASIONAL KANTOR', 'Aset Bergerak'),
('K0316', '', 'Buku gambar A3', 'Pack', '', 3322, 'MHS', 'Aset Bergerak'),
('K0317', '', 'Buku saku Mhs', 'Buah', '', 95, 'MHS', 'Aset Bergerak'),
('K0318', '', 'Buku tulis  uk. Folio', 'Buah', '', 4, 'ADM/OPERASIONAL KANTOR', 'Aset Bergerak'),
('K0319', '', 'Dobel tape ''''1', 'Buah', '', 21, 'ADM/OPERASIONAL KANTOR', 'Aset Bergerak'),
('K0320', '', 'Dobel tape ''''2,5', 'Buah', '', 15, 'ADM/OPERASIONAL KANTOR', 'Aset Bergerak'),
('K0321', '', 'Dudukan Solatif', 'Buah', '', 4, 'ADM/OPERASIONAL KANTOR', 'Aset Bergerak'),
('K0322', '', 'Dudukan tiang bendera', 'Buah', '', 0, 'WISUDA', 'Aset Bergerak'),
('K0323', '', 'Emblem tanda panitia PMB utk pataka (kain)', 'Buah', '', 11, 'PMB/PATAKA', 'Aset Bergerak'),
('K0324', '', 'File folder personal GT (merah putih)', 'Buah', '', 1941, 'ADM/OPERASIONAL KANTOR', 'Aset Bergerak'),
('K0325', '', 'Gelas plastik', 'Buah', '', 31, 'PMB', 'Aset Bergerak'),
('K0326', '', 'Isi cutter L - 100 kecil', 'Pcs', '', 250, 'ADM/OPERASIONAL KANTOR', 'Aset Bergerak'),
('K0327', '', 'Isi staples no. 10 - 1 M kecil', 'Doz', '', 58, 'ADM/OPERASIONAL KANTOR', 'Aset Bergerak'),
('K0328', '', 'Kain pel refil lantai', 'Buah', '', 7, 'KEBERSIHAN', 'Aset Bergerak'),
('K0329', '', 'Kalkulator', 'Buah', '', 2, 'PMB', 'Aset Bergerak'),
('K0330', '', 'Kantong plastik sampah', 'Pack', '', 105, 'KEBERSIHAN', 'Aset Bergerak'),
('K0331', '', 'Kertas buram w. Biru', 'Rim (100)', '', 14, 'ADM/OPERASIONAL KANTOR', 'Aset Bergerak'),
('K0332', '', 'Kertas buram w. Merah', 'Rim (100)', '', 20, 'ADM/OPERASIONAL KANTOR', 'Aset Bergerak'),
('K0333', '', 'Kertas buram w. Coklat', 'Rim (100)', '', 15, 'ADM/OPERASIONAL KANTOR', 'Aset Bergerak'),
('K0334', '', 'Kertas buram w. Merah Muda', 'Rim (100)', '', 26, 'ADM/OPERASIONAL KANTOR', 'Aset Bergerak'),
('K0335', '', 'Kertas folio Polos', 'Rim', '', 30, '', 'Aset Bergerak'),
('K0336', '', 'Kertas dobel folio bergaris', 'Rim', '', 116, 'PERKULIAHAN', 'Aset Bergerak'),
('K0337', '', 'Kertas koncorde A4 warna merah muda', 'Rim', '', 2, 'ADM/OPERASIONAL KANTOR', 'Aset Bergerak'),
('K0338', '', 'Kertas kop Poltek  jurusan Teknik Elektro, F4', 'Rim (500 lbr)', '', 3, 'KAJUR TE/DOSEN', 'Aset Bergerak'),
('K0339', '', 'Kertas kop Poltek jurusan Teknik Elektro, A4', 'Rim (500 lbr)', '', 2, 'KAJUR TE/DOSEN', 'Aset Bergerak'),
('K0340', '', 'Kertas kop Poltek jurusan Teknologi Industri, A4', 'Rim (500 lbr)', '', 23, 'KAJUR TI/DOSEN', 'Aset Bergerak'),
('K0341', '', 'Kertas kop Poltek jurusan Teknologi Industri, F4', 'Rim (500 lbr)', '', 0, 'KAJUR TI/DOSEN', 'Aset Bergerak'),
('K0342', '', 'Kertas manila putih', 'Rim (100)', '', 1, 'PMB/WISUDA', 'Aset Bergerak'),
('K0343', '', 'Label T & J no. 104', 'Pack', '', 19, 'PMB/WISUDA', 'Aset Bergerak'),
('K0344', '', 'Label T & J no. 105', 'Pack', '', 0, 'PMB/WISUDA', 'Aset Bergerak'),
('K0345', '', 'Label T & J no. 120', 'Pack', '', 22, 'PMB/WISUDA', 'Aset Bergerak'),
('K0346', '', 'Laqban kain/plastik warna kuning', 'Buah', '', 14, 'ADM/OPERASIONAL KANTOR', 'Aset Bergerak'),
('K0347', '', 'Layar infocus utk. tembok', 'Buah', '', 2, 'SEMINAR/KULIAH', 'Aset Bergerak'),
('K0348', '', 'Lem stereoform', 'Botol', '', 4, 'PMB/WISUDA', 'Aset Bergerak'),
('K0349', '', 'Map plastik transparan uk. A4 (putih)', 'Sheet', '', 102, 'ADM/OPERASIONAL KANTOR', 'Aset Bergerak'),
('K0350', '', 'Map plastik transparan uk. F4 (putih)', 'Sheet', '', 125, 'ADM/OPERASIONAL KANTOR', 'Aset Bergerak'),
('K0351', '', 'Map plastik warna merah (busines file) F4', 'Buah', '', 121, 'ADM/OPERASIONAL KANTOR', 'Aset Bergerak'),
('K0352', '', 'Map plastik warna biru (busines file) A4', 'Buah', '', 32, 'ADM/OPERASIONAL KANTOR', 'Aset Bergerak'),
('K0353', '', 'Map plastik warna biru (busines file) F4', 'Buah', '', 108, 'ADM/OPERASIONAL KANTOR', 'Aset Bergerak'),
('K0354', '', 'Masker dr Kemendikbud', 'Pcs', '', 243, 'Sumbangan', 'Aset Bergerak'),
('K0355', '', 'Masker dr pak Ari', 'Pcs', '', 1, 'MHS', 'Aset Bergerak'),
('K0356', '', 'Masker dr Yayasan', 'Pcs', '', 2, 'MHS', 'Aset Bergerak'),
('K0357', '', 'Masker Hoda Kaesen', 'y211', '', 5, 'PMB 2021', 'Aset Bergerak'),
('K0358', '', 'Masker kain abu-abu', 'Pcs', '', 100, 'Sumbangan', 'Aset Bergerak'),
('K0359', '', 'Matras utk Samapta', 'Buah', '', 20, 'PMB', 'Aset Bergerak'),
('K0360', '', 'Millimeter block', 'Buah', '', 260, 'PERKULIAHAN', 'Aset Bergerak'),
('K0361', '', 'Nampan kayu', 'Buah', '', 2, 'PMB/WISUDA', 'Aset Bergerak'),
('K0362', '', 'Palu sidang Senat wisuda', 'Unit', '', 1, 'PMB/WISUDA', 'Aset Bergerak'),
('K0363', '', 'Pedal senat wisuda Poltek GT', 'Buah', '', 1, 'WISUDA', 'Aset Bergerak'),
('K0364', '', 'Peneng mahasiswa id card', 'Buah', '', 320, 'MHS', 'Aset Bergerak'),
('K0365', '', 'Penggaris baja ''30 cm', 'Buah', '', 43, 'MHS/PMB', 'Aset Bergerak'),
('K0366', '', 'Penggaris plastik ''30 cm', 'Buah', '', 1578, 'MHS', 'Aset Bergerak'),
('K0367', '', 'Plakat ucapan trima kasih GT', 'Buah', '', 0, 'SEMINAR/KULIAH UMUM', 'Aset Bergerak'),
('K0368', '', 'Plakat ucapan trima kasih Poltek', 'Buah', '', 14, 'SEMINAR/KULIAH UMUM', 'Aset Bergerak'),
('K0369', '', 'Plastik laminating  F4', 'Sheet', '', 64, 'PERKULIAHAN', 'Aset Bergerak'),
('K0370', '', 'Plastik laminating  id card', 'Sheet', '', 900, 'MHS', 'Aset Bergerak'),
('K0371', '', 'Plastik PVC utk sampul buku', 'Roll', '', 0, 'PERPUSTAKAAN', 'Aset Bergerak'),
('K0372', '', 'Sharpener (serutan pencil) Joyko A-5', 'Buah', '', 2, 'PMB/ADM', 'Aset Bergerak'),
('K0373', '', 'Spidol Kecil Warna Hijau', 'Buah', '', 2, 'PMB', 'Aset Bergerak'),
('K0374', '', 'Spidol permanent'' 70 warna hitam', 'Buah', '', 10, 'PERKULIAHAN', 'Aset Bergerak'),
('K0375', '', 'Spidol whiteboard besar warna hitam', 'Buah', '', 2, 'SEMINAR/KULIAH UMUM', 'Aset Bergerak'),
('K0376', '', 'Spidol whiteboard besar warna merah', 'Buah', '', 2, 'SEMINAR/KULIAH UMUM', 'Aset Bergerak'),
('K0377', '', 'Spiral plastik utk. Jilid uk. 1/2''''', 'Buah', '', 1, 'JILID', 'Aset Bergerak'),
('K0378', '', 'Spiral plastik utk. Jilid uk. 1/8''''', 'Buah', '', 2, 'JILID', 'Aset Bergerak'),
('K0379', '', 'Spiral plastik utk. Jilid uk. 5/16''''', 'Buah', '', 3, 'JILID', 'Aset Bergerak'),
('K0380', '', 'Spiral plastik utk. Jilid uk. A4 3/8'''' 10 mm', 'Box', '', 2, 'JILID', 'Aset Bergerak'),
('K0381', '', 'Spiral plastik utk. Jilid uk. A4, 1 1/4'''' 32 mm', 'Box', '', 2, 'JILID', 'Aset Bergerak'),
('K0382', '', 'Spiral plastik utk. Jilid uk. A4, 1/4'''' 6 mm', 'Box', '', 2, 'JILID', 'Aset Bergerak'),
('K0383', '', 'Spiral plastik utk. Jilid uk. A4, 5/8'''' 16 mm', 'Box', '', 2, 'JILID', 'Aset Bergerak'),
('K0384', '', 'Spiral plastik utk. Jilid uk. F4, 1/4'''' 6 mm', 'Box', '', 2, 'JILID', 'Aset Bergerak'),
('K0385', '', 'Spiral plastik utk. Jilid uk. F4, 3/8'''' 10 mm', 'Box', '', 2, 'JILID', 'Aset Bergerak'),
('K0386', '', 'Spiral plastik utk. Jilid uk. F4, 5/8'''' 16 mm', 'Box', '', 2, 'JILID', 'Aset Bergerak'),
('K0387', '', 'Spiral plastik utk. Jilid uk. F4, 50 mm''''', 'Box', '', 2, 'JILID', 'Aset Bergerak'),
('K0388', '', 'Spiral plastik utk. Jilid uk. F4, 51 mm''''', 'Box', '', 2, 'JILID', 'Aset Bergerak'),
('K0389', '', 'Staples HD - 50 sedang', 'Buah', '', 4, 'ADM/OPERASIONAL KANTOR', 'Aset Bergerak'),
('K0390', '', 'Stabillo Highligter', 'Buah', '', 10, 'ADM/OPERASIONAL KANTOR', 'Aset Bergerak'),
('K0391', '', 'Stopmap folio warna kuning', 'Lembar', '', 0, 'PMB/WISUDA', 'Aset Bergerak'),
('K0392', '', 'Stopmap kop Poltek warna abu-abu, F4', 'Lembar', '', 422, 'ADM/OPERASIONAL KANTOR', 'Aset Bergerak'),
('K0393', '', 'Stopmap motif batik (baru)', 'Lembar', '', 34, 'PMB/WISUDA', 'Aset Bergerak'),
('K0394', '', 'Stopmap motif bludru (lama)', 'Lembar', '', 13, 'PMB/WISUDA', 'Aset Bergerak'),
('K0395', '', 'Syal Pataka merah putih', 'Buah', '', 131, 'PATAKA', 'Aset Bergerak'),
('K0396', '', 'Tali tambang bendera Merah Putih', 'Mtr', '', 80, 'PATAKA', 'Aset Bergerak'),
('K0397', '', 'Tempat peneng mahasiswa id card', 'Buah', '', 373, 'MHS', 'Aset Bergerak'),
('K0398', '', 'Tiang bendera', 'Buah', '', 0, 'WISUDA', 'Aset Bergerak'),
('K0399', '', 'Tinta printer Canon w. cyan', 'Buah', '', 6, 'ADM/OPERASIONAL KANTOR', 'Aset Bergerak'),
('K0400', '', 'Tinta printer Canon w. hitam', 'Buah', '', 3, 'ADM/OPERASIONAL KANTOR', 'Aset Bergerak'),
('K0401', '', 'Tinta printer Canon w. magenta', 'Buah', '', 6, 'ADM/OPERASIONAL KANTOR', 'Aset Bergerak'),
('K0402', '', 'Tinta printer Canon w. yellow', 'Buah', '', 6, 'ADM/OPERASIONAL KANTOR', 'Aset Bergerak'),
('K0403', '', 'Tinta printer cartridge Canon', 'Buah', '', 2, '', 'Aset Bergerak'),
('K0404', '', 'Tinta printer Epson cyan', 'Buah', '', 6, 'ADM/OPERASIONAL KANTOR', 'Aset Bergerak'),
('K0405', '', 'Tinta printer epson w. hitam', 'Pcs', '', 4, 'ADM/OPERASIONAL KANTOR', 'Aset Bergerak'),
('K0406', '', 'Tinta printer epson w. kuning', 'Pcs', '', 6, 'ADM/OPERASIONAL KANTOR', 'Aset Bergerak'),
('K0407', '', 'Tongkat senat wisuda Poltek-GT', 'Buah', '', 1, 'WISUDA/SENAT', 'Aset Bergerak'),
('K0408', '', 'Topi PGT', 'Buah', '', 311, 'MHS', 'Aset Bergerak'),
('K0409', '', 'Topi senat wisuda Poltek-GT', 'Buah', '', 15, 'WISUDA/SENAT', 'Aset Bergerak'),
('K0410', '', 'USB flash disk KMI', 'Buah', '', 149, 'MHS/ADM.', 'Aset Bergerak'),
('K0411', '', 'USB flash disk Kioxia', 'Buah', '', 96, 'MHS/ADM.', 'Aset Bergerak'),
('K0412', '', 'USB flash disk Lexar', 'Buah', '', 142, 'MHS/ADM.', 'Aset Bergerak'),
('K0413', '', 'USB flash disk 1 T', 'Buah', '', 0, 'MHS/ADM.', 'Aset Bergerak'),
('K0414', '', 'Wearpack Dosen Teknik Elektronika (M=3, L= 2, XL= 2)', 'Steel', '', 6, 'DOSEN', 'Aset Bergerak'),
('K0415', '', 'Wearpack Dosen Teknologi Industri (M= 0, L= 1, XL= 1)', 'Steel', '', 2, 'DOSEN', 'Aset Bergerak'),
('K0416', '', 'Wearpack Dosen Teknologi Informasi ( L= 5 XL=2 )', 'Steel', '', 7, 'DOSEN', 'Aset Bergerak'),
('K0417', '', 'Wearpack Dosen Teknik Mesin (M= 6, L= 5, XL= 1)', 'Steel', '', 12, 'DOSEN', 'Aset Bergerak'),
('K0418', '', 'Wearpack Mahasiswa Teknik Elektronika (M= 16, L= 4, S=1)', 'Steel', '', 21, 'PERKULIAHAN', 'Aset Bergerak'),
('K0419', '', 'Wearpack Mahasiswa Teknologi Industri (S= 1, M= 13, L= 4)', 'Steel', '', 18, 'PERKULIAHAN', 'Aset Bergerak'),
('K0420', '', 'Wearpack Mahasiswa Teknik Mesin (M= 10, L= 29, S= 3)', 'Steel', '', 42, 'PERKULIAHAN', 'Aset Bergerak'),
('K0421', '', 'Wearpack Mahasiswa Teknologi Informasi ( M= 0, L= 0, XL= 0 )', 'Steel', '', 0, 'PERKULIAHAN', 'Aset Bergerak')
ON DUPLICATE KEY UPDATE
  `jumlah`      = VALUES(`jumlah`),
  `jenisbarang` = VALUES(`jenisbarang`),
  `keterangan`  = VALUES(`keterangan`);

-- BAGIAN 3: INSERT BARANG BARU KE TABEL barangbergerak
INSERT INTO `barangbergerak` (`kodebarang`, `namabarang`, `statusbarang`, `unit`, `lokasi`, `ketersediaan`, `keterangan`, `tanggal`) VALUES
('K0299', 'Acrylic tinggi 21 x 15 cm', 'Masuk', 'Buah', 'W007', 18, 'PMB/SEMINAR', '2026-11-09'),
('K0300', 'Amplop kop Poltek w. coklat,  F4 berkas ujian', 'Masuk', 'Pcs', 'W007', 3203, 'ADM/OPERASIONAL KANTOR', '2026-11-09'),
('K0301', 'Amplop kop Poltek warna coklat uk. F4', 'Masuk', 'Pcs', 'W007', 827, 'ADM/OPERASIONAL KANTOR', '2026-11-09'),
('K0302', 'Amplop kop Poltek warna coklat uk. kecil', 'Masuk', 'Pcs', 'W007', 385, 'ADM/OPERASIONAL KANTOR', '2026-11-09'),
('K0303', 'Amplop putih kop Poltek', 'Masuk', 'Pcs', 'W007', 1886, 'ADM/OPERASIONAL KANTOR', '2026-11-09'),
('K0304', 'Amplop putih polos uk. Kecil 95x125mm', 'Masuk', 'Pcs', 'W007', 400, 'ADM/OPERASIONAL KANTOR', '2026-11-09'),
('K0305', 'Amplop warna coklat polos uk. A4', 'Masuk', 'Pcs', 'W007', 38, 'ADM/OPERASIONAL KANTOR', '2026-11-09'),
('K0306', 'Amplop warna coklat polos uk. F4', 'Masuk', 'Pcs', 'W007', 50, 'ADM/OPERASIONAL KANTOR', '2026-11-09'),
('K0307', 'Amplop warna coklat uk. dobel folio polos/A3', 'Masuk', 'Pcs', 'W007', 3, 'ADM/OPERASIONAL KANTOR', '2026-11-09'),
('K0308', 'Baju jas staf Poltek lama', 'Masuk', 'Buah', 'W007', 0, 'DOSEN/STAF', '2026-11-09'),
('K0309', 'Baju Menwa', 'Masuk', 'Buah', 'W007', 5, 'MHS', '2026-11-09'),
('K0310', 'Baju Seragam Mhs 2 stel', 'Masuk', 'Stel', 'W007', 7, 'MHS', '2026-11-09'),
('K0311', 'Baret Menwa', 'Masuk', 'Buah', 'W007', 80, 'PATAKA', '2026-11-09'),
('K0312', 'Batu baterai kalkulator', 'Masuk', 'Buah', 'W007', 14, 'ADM/OPERASIONAL KANTOR', '2026-11-09'),
('K0313', 'Batu Baterai Kotak (9 v)', 'Masuk', 'Buah', 'W007', 12, 'PMB', '2026-11-09'),
('K0314', 'Bendera jurusan Teknik Informasi (Logo Lama 2 Logo Baru 5 )', 'Masuk', 'Buah', 'W007', 7, 'PRODI TI', '2026-11-09'),
('K0315', 'Binder clip no. 107', 'Masuk', 'Doz (12 pcs)', 'W007', 1, 'ADM/OPERASIONAL KANTOR', '2026-11-09'),
('K0316', 'Buku gambar A3', 'Masuk', 'Pack', 'W007', 3322, 'MHS', '2026-11-09'),
('K0317', 'Buku saku Mhs', 'Masuk', 'Buah', 'W007', 95, 'MHS', '2026-11-09'),
('K0318', 'Buku tulis  uk. Folio', 'Masuk', 'Buah', 'W007', 4, 'ADM/OPERASIONAL KANTOR', '2026-11-09'),
('K0319', 'Dobel tape ''''1', 'Masuk', 'Buah', 'W007', 21, 'ADM/OPERASIONAL KANTOR', '2026-11-09'),
('K0320', 'Dobel tape ''''2,5', 'Masuk', 'Buah', 'W007', 15, 'ADM/OPERASIONAL KANTOR', '2026-11-09'),
('K0321', 'Dudukan Solatif', 'Masuk', 'Buah', 'W007', 4, 'ADM/OPERASIONAL KANTOR', '2026-11-09'),
('K0322', 'Dudukan tiang bendera', 'Masuk', 'Buah', 'W007', 0, 'WISUDA', '2026-11-09'),
('K0323', 'Emblem tanda panitia PMB utk pataka (kain)', 'Masuk', 'Buah', 'W007', 11, 'PMB/PATAKA', '2026-11-09'),
('K0324', 'File folder personal GT (merah putih)', 'Masuk', 'Buah', 'W007', 1941, 'ADM/OPERASIONAL KANTOR', '2026-11-09'),
('K0325', 'Gelas plastik', 'Masuk', 'Buah', 'W007', 31, 'PMB', '2026-11-09'),
('K0326', 'Isi cutter L - 100 kecil', 'Masuk', 'Pcs', 'W007', 250, 'ADM/OPERASIONAL KANTOR', '2026-11-09'),
('K0327', 'Isi staples no. 10 - 1 M kecil', 'Masuk', 'Doz', 'W007', 58, 'ADM/OPERASIONAL KANTOR', '2026-11-09'),
('K0328', 'Kain pel refil lantai', 'Masuk', 'Buah', 'W007', 7, 'KEBERSIHAN', '2026-11-09'),
('K0329', 'Kalkulator', 'Masuk', 'Buah', 'W007', 2, 'PMB', '2026-11-09'),
('K0330', 'Kantong plastik sampah', 'Masuk', 'Pack', 'W007', 105, 'KEBERSIHAN', '2026-11-09'),
('K0331', 'Kertas buram w. Biru', 'Masuk', 'Rim (100)', 'W007', 14, 'ADM/OPERASIONAL KANTOR', '2026-11-09'),
('K0332', 'Kertas buram w. Merah', 'Masuk', 'Rim (100)', 'W007', 20, 'ADM/OPERASIONAL KANTOR', '2026-11-09'),
('K0333', 'Kertas buram w. Coklat', 'Masuk', 'Rim (100)', 'W007', 15, 'ADM/OPERASIONAL KANTOR', '2026-11-09'),
('K0334', 'Kertas buram w. Merah Muda', 'Masuk', 'Rim (100)', 'W007', 26, 'ADM/OPERASIONAL KANTOR', '2026-11-09'),
('K0335', 'Kertas folio Polos', 'Masuk', 'Rim', 'W007', 30, '', '2026-11-09'),
('K0336', 'Kertas dobel folio bergaris', 'Masuk', 'Rim', 'W007', 116, 'PERKULIAHAN', '2026-11-09'),
('K0337', 'Kertas koncorde A4 warna merah muda', 'Masuk', 'Rim', 'W007', 2, 'ADM/OPERASIONAL KANTOR', '2026-11-09'),
('K0338', 'Kertas kop Poltek  jurusan Teknik Elektro, F4', 'Masuk', 'Rim (500 lbr)', 'W007', 3, 'KAJUR TE/DOSEN', '2026-11-09'),
('K0339', 'Kertas kop Poltek jurusan Teknik Elektro, A4', 'Masuk', 'Rim (500 lbr)', 'W007', 2, 'KAJUR TE/DOSEN', '2026-11-09'),
('K0340', 'Kertas kop Poltek jurusan Teknologi Industri, A4', 'Masuk', 'Rim (500 lbr)', 'W007', 23, 'KAJUR TI/DOSEN', '2026-11-09'),
('K0341', 'Kertas kop Poltek jurusan Teknologi Industri, F4', 'Masuk', 'Rim (500 lbr)', 'W007', 0, 'KAJUR TI/DOSEN', '2026-11-09'),
('K0342', 'Kertas manila putih', 'Masuk', 'Rim (100)', 'W007', 1, 'PMB/WISUDA', '2026-11-09'),
('K0343', 'Label T & J no. 104', 'Masuk', 'Pack', 'W007', 19, 'PMB/WISUDA', '2026-11-09'),
('K0344', 'Label T & J no. 105', 'Masuk', 'Pack', 'W007', 0, 'PMB/WISUDA', '2026-11-09'),
('K0345', 'Label T & J no. 120', 'Masuk', 'Pack', 'W007', 22, 'PMB/WISUDA', '2026-11-09'),
('K0346', 'Laqban kain/plastik warna kuning', 'Masuk', 'Buah', 'W007', 14, 'ADM/OPERASIONAL KANTOR', '2026-11-09'),
('K0347', 'Layar infocus utk. tembok', 'Masuk', 'Buah', 'W007', 2, 'SEMINAR/KULIAH', '2026-11-09'),
('K0348', 'Lem stereoform', 'Masuk', 'Botol', 'W007', 4, 'PMB/WISUDA', '2026-11-09'),
('K0349', 'Map plastik transparan uk. A4 (putih)', 'Masuk', 'Sheet', 'W007', 102, 'ADM/OPERASIONAL KANTOR', '2026-11-09'),
('K0350', 'Map plastik transparan uk. F4 (putih)', 'Masuk', 'Sheet', 'W007', 125, 'ADM/OPERASIONAL KANTOR', '2026-11-09'),
('K0351', 'Map plastik warna merah (busines file) F4', 'Masuk', 'Buah', 'W007', 121, 'ADM/OPERASIONAL KANTOR', '2026-11-09'),
('K0352', 'Map plastik warna biru (busines file) A4', 'Masuk', 'Buah', 'W007', 32, 'ADM/OPERASIONAL KANTOR', '2026-11-09'),
('K0353', 'Map plastik warna biru (busines file) F4', 'Masuk', 'Buah', 'W007', 108, 'ADM/OPERASIONAL KANTOR', '2026-11-09'),
('K0354', 'Masker dr Kemendikbud', 'Masuk', 'Pcs', 'W007', 243, 'Sumbangan', '2026-11-09'),
('K0355', 'Masker dr pak Ari', 'Masuk', 'Pcs', 'W007', 1, 'MHS', '2026-11-09'),
('K0356', 'Masker dr Yayasan', 'Masuk', 'Pcs', 'W007', 2, 'MHS', '2026-11-09'),
('K0357', 'Masker Hoda Kaesen', 'Masuk', 'y211', 'W007', 5, 'PMB 2021', '2026-11-09'),
('K0358', 'Masker kain abu-abu', 'Masuk', 'Pcs', 'W007', 100, 'Sumbangan', '2026-11-09'),
('K0359', 'Matras utk Samapta', 'Masuk', 'Buah', 'W007', 20, 'PMB', '2026-11-09'),
('K0360', 'Millimeter block', 'Masuk', 'Buah', 'W007', 260, 'PERKULIAHAN', '2026-11-09'),
('K0361', 'Nampan kayu', 'Masuk', 'Buah', 'W007', 2, 'PMB/WISUDA', '2026-11-09'),
('K0362', 'Palu sidang Senat wisuda', 'Masuk', 'Unit', 'W007', 1, 'PMB/WISUDA', '2026-11-09'),
('K0363', 'Pedal senat wisuda Poltek GT', 'Masuk', 'Buah', 'W007', 1, 'WISUDA', '2026-11-09'),
('K0364', 'Peneng mahasiswa id card', 'Masuk', 'Buah', 'W007', 320, 'MHS', '2026-11-09'),
('K0365', 'Penggaris baja ''30 cm', 'Masuk', 'Buah', 'W007', 43, 'MHS/PMB', '2026-11-09'),
('K0366', 'Penggaris plastik ''30 cm', 'Masuk', 'Buah', 'W007', 1578, 'MHS', '2026-11-09'),
('K0367', 'Plakat ucapan trima kasih GT', 'Masuk', 'Buah', 'W007', 0, 'SEMINAR/KULIAH UMUM', '2026-11-09'),
('K0368', 'Plakat ucapan trima kasih Poltek', 'Masuk', 'Buah', 'W007', 14, 'SEMINAR/KULIAH UMUM', '2026-11-09'),
('K0369', 'Plastik laminating  F4', 'Masuk', 'Sheet', 'W007', 64, 'PERKULIAHAN', '2026-11-09'),
('K0370', 'Plastik laminating  id card', 'Masuk', 'Sheet', 'W007', 900, 'MHS', '2026-11-09'),
('K0371', 'Plastik PVC utk sampul buku', 'Masuk', 'Roll', 'W007', 0, 'PERPUSTAKAAN', '2026-11-09'),
('K0372', 'Sharpener (serutan pencil) Joyko A-5', 'Masuk', 'Buah', 'W007', 2, 'PMB/ADM', '2026-11-09'),
('K0373', 'Spidol Kecil Warna Hijau', 'Masuk', 'Buah', 'W007', 2, 'PMB', '2026-11-09'),
('K0374', 'Spidol permanent'' 70 warna hitam', 'Masuk', 'Buah', 'W007', 10, 'PERKULIAHAN', '2026-11-09'),
('K0375', 'Spidol whiteboard besar warna hitam', 'Masuk', 'Buah', 'W007', 2, 'SEMINAR/KULIAH UMUM', '2026-11-09'),
('K0376', 'Spidol whiteboard besar warna merah', 'Masuk', 'Buah', 'W007', 2, 'SEMINAR/KULIAH UMUM', '2026-11-09'),
('K0377', 'Spiral plastik utk. Jilid uk. 1/2''''', 'Masuk', 'Buah', 'W007', 1, 'JILID', '2026-11-09'),
('K0378', 'Spiral plastik utk. Jilid uk. 1/8''''', 'Masuk', 'Buah', 'W007', 2, 'JILID', '2026-11-09'),
('K0379', 'Spiral plastik utk. Jilid uk. 5/16''''', 'Masuk', 'Buah', 'W007', 3, 'JILID', '2026-11-09'),
('K0380', 'Spiral plastik utk. Jilid uk. A4 3/8'''' 10 mm', 'Masuk', 'Box', 'W007', 2, 'JILID', '2026-11-09'),
('K0381', 'Spiral plastik utk. Jilid uk. A4, 1 1/4'''' 32 mm', 'Masuk', 'Box', 'W007', 2, 'JILID', '2026-11-09'),
('K0382', 'Spiral plastik utk. Jilid uk. A4, 1/4'''' 6 mm', 'Masuk', 'Box', 'W007', 2, 'JILID', '2026-11-09'),
('K0383', 'Spiral plastik utk. Jilid uk. A4, 5/8'''' 16 mm', 'Masuk', 'Box', 'W007', 2, 'JILID', '2026-11-09'),
('K0384', 'Spiral plastik utk. Jilid uk. F4, 1/4'''' 6 mm', 'Masuk', 'Box', 'W007', 2, 'JILID', '2026-11-09'),
('K0385', 'Spiral plastik utk. Jilid uk. F4, 3/8'''' 10 mm', 'Masuk', 'Box', 'W007', 2, 'JILID', '2026-11-09'),
('K0386', 'Spiral plastik utk. Jilid uk. F4, 5/8'''' 16 mm', 'Masuk', 'Box', 'W007', 2, 'JILID', '2026-11-09'),
('K0387', 'Spiral plastik utk. Jilid uk. F4, 50 mm''''', 'Masuk', 'Box', 'W007', 2, 'JILID', '2026-11-09'),
('K0388', 'Spiral plastik utk. Jilid uk. F4, 51 mm''''', 'Masuk', 'Box', 'W007', 2, 'JILID', '2026-11-09'),
('K0389', 'Staples HD - 50 sedang', 'Masuk', 'Buah', 'W007', 4, 'ADM/OPERASIONAL KANTOR', '2026-11-09'),
('K0390', 'Stabillo Highligter', 'Masuk', 'Buah', 'W007', 10, 'ADM/OPERASIONAL KANTOR', '2026-11-09'),
('K0391', 'Stopmap folio warna kuning', 'Masuk', 'Lembar', 'W007', 0, 'PMB/WISUDA', '2026-11-09'),
('K0392', 'Stopmap kop Poltek warna abu-abu, F4', 'Masuk', 'Lembar', 'W007', 422, 'ADM/OPERASIONAL KANTOR', '2026-11-09'),
('K0393', 'Stopmap motif batik (baru)', 'Masuk', 'Lembar', 'W007', 34, 'PMB/WISUDA', '2026-11-09'),
('K0394', 'Stopmap motif bludru (lama)', 'Masuk', 'Lembar', 'W007', 13, 'PMB/WISUDA', '2026-11-09'),
('K0395', 'Syal Pataka merah putih', 'Masuk', 'Buah', 'W007', 131, 'PATAKA', '2026-11-09'),
('K0396', 'Tali tambang bendera Merah Putih', 'Masuk', 'Mtr', 'W007', 80, 'PATAKA', '2026-11-09'),
('K0397', 'Tempat peneng mahasiswa id card', 'Masuk', 'Buah', 'W007', 373, 'MHS', '2026-11-09'),
('K0398', 'Tiang bendera', 'Masuk', 'Buah', 'W007', 0, 'WISUDA', '2026-11-09'),
('K0399', 'Tinta printer Canon w. cyan', 'Masuk', 'Buah', 'W007', 6, 'ADM/OPERASIONAL KANTOR', '2026-11-09'),
('K0400', 'Tinta printer Canon w. hitam', 'Masuk', 'Buah', 'W007', 3, 'ADM/OPERASIONAL KANTOR', '2026-11-09'),
('K0401', 'Tinta printer Canon w. magenta', 'Masuk', 'Buah', 'W007', 6, 'ADM/OPERASIONAL KANTOR', '2026-11-09'),
('K0402', 'Tinta printer Canon w. yellow', 'Masuk', 'Buah', 'W007', 6, 'ADM/OPERASIONAL KANTOR', '2026-11-09'),
('K0403', 'Tinta printer cartridge Canon', 'Masuk', 'Buah', 'W007', 2, '', '2026-11-09'),
('K0404', 'Tinta printer Epson cyan', 'Masuk', 'Buah', 'W007', 6, 'ADM/OPERASIONAL KANTOR', '2026-11-09'),
('K0405', 'Tinta printer epson w. hitam', 'Masuk', 'Pcs', 'W007', 4, 'ADM/OPERASIONAL KANTOR', '2026-11-09'),
('K0406', 'Tinta printer epson w. kuning', 'Masuk', 'Pcs', 'W007', 6, 'ADM/OPERASIONAL KANTOR', '2026-11-09'),
('K0407', 'Tongkat senat wisuda Poltek-GT', 'Masuk', 'Buah', 'W007', 1, 'WISUDA/SENAT', '2026-11-09'),
('K0408', 'Topi PGT', 'Masuk', 'Buah', 'W007', 311, 'MHS', '2026-11-09'),
('K0409', 'Topi senat wisuda Poltek-GT', 'Masuk', 'Buah', 'W007', 15, 'WISUDA/SENAT', '2026-11-09'),
('K0410', 'USB flash disk KMI', 'Masuk', 'Buah', 'W007', 149, 'MHS/ADM.', '2026-11-09'),
('K0411', 'USB flash disk Kioxia', 'Masuk', 'Buah', 'W007', 96, 'MHS/ADM.', '2026-11-09'),
('K0412', 'USB flash disk Lexar', 'Masuk', 'Buah', 'W007', 142, 'MHS/ADM.', '2026-11-09'),
('K0413', 'USB flash disk 1 T', 'Masuk', 'Buah', 'W007', 0, 'MHS/ADM.', '2026-11-09'),
('K0414', 'Wearpack Dosen Teknik Elektronika (M=3, L= 2, XL= 2)', 'Masuk', 'Steel', 'W007', 6, 'DOSEN', '2026-11-09'),
('K0415', 'Wearpack Dosen Teknologi Industri (M= 0, L= 1, XL= 1)', 'Masuk', 'Steel', 'W007', 2, 'DOSEN', '2026-11-09'),
('K0416', 'Wearpack Dosen Teknologi Informasi ( L= 5 XL=2 )', 'Masuk', 'Steel', 'W007', 7, 'DOSEN', '2026-11-09'),
('K0417', 'Wearpack Dosen Teknik Mesin (M= 6, L= 5, XL= 1)', 'Masuk', 'Steel', 'W007', 12, 'DOSEN', '2026-11-09'),
('K0418', 'Wearpack Mahasiswa Teknik Elektronika (M= 16, L= 4, S=1)', 'Masuk', 'Steel', 'W007', 21, 'PERKULIAHAN', '2026-11-09'),
('K0419', 'Wearpack Mahasiswa Teknologi Industri (S= 1, M= 13, L= 4)', 'Masuk', 'Steel', 'W007', 18, 'PERKULIAHAN', '2026-11-09'),
('K0420', 'Wearpack Mahasiswa Teknik Mesin (M= 10, L= 29, S= 3)', 'Masuk', 'Steel', 'W007', 42, 'PERKULIAHAN', '2026-11-09'),
('K0421', 'Wearpack Mahasiswa Teknologi Informasi ( M= 0, L= 0, XL= 0 )', 'Masuk', 'Steel', 'W007', 0, 'PERKULIAHAN', '2026-11-09')
ON DUPLICATE KEY UPDATE
  `ketersediaan` = VALUES(`ketersediaan`),
  `unit`         = VALUES(`unit`),
  `keterangan`   = VALUES(`keterangan`),
  `tanggal`      = VALUES(`tanggal`);

COMMIT;
