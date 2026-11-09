<?= $this->extend('default') ?>

<?= $this->section('page_title'); ?>Sesi Stock Opname Baru<?= $this->endSection(); ?>
<?= $this->section('context'); ?>Sesi Stock Opname Baru<?= $this->endSection(); ?>

<?= $this->section('css') ?>
<link rel="stylesheet" href="<?= base_url('adminLTE/plugins/datatables-bs4/css/dataTables.bootstrap4.min.css'); ?>">
<link rel="stylesheet" href="<?= base_url('adminLTE/plugins/sweetalert2/sweetalert2.min.css'); ?>">
<style>
    .opname-card {
        border-radius: 16px;
        border: none;
        box-shadow: 0 4px 25px rgba(0,0,0,0.05);
    }
    .input-fisik {
        font-weight: bold;
        text-align: center;
        border-radius: 8px;
        transition: all 0.2s;
    }
    .input-fisik:focus {
        background-color: #eff6ff;
        border-color: #3b82f6;
        box-shadow: 0 0 0 3px rgba(59, 130, 246, 0.2);
    }
    .badge-diff-zero { background: #dcfce7; color: #15803d; }
    .badge-diff-plus { background: #fef3c7; color: #b45309; }
    .badge-diff-minus { background: #fee2e2; color: #b91c1c; }
    .upload-box {
        border: 2px dashed #cbd5e1;
        border-radius: 16px;
        padding: 30px 20px;
        text-align: center;
        background: #f8fafc;
        transition: all 0.2s;
        cursor: pointer;
    }
    .upload-box:hover {
        border-color: #3b82f6;
        background: #eff6ff;
    }
</style>
<?= $this->endSection() ?>

<?= $this->section('content') ?>
<div class="container-fluid">

    <!-- Header Navigation -->
    <div class="d-flex justify-content-between align-items-center mb-4">
        <div>
            <h3 class="font-weight-bold text-dark mb-1">
                <i class="fas fa-boxes text-primary mr-2"></i>Sesi Stock Opname Baru
            </h3>
            <p class="text-muted mb-0">Lakukan pencocokan stok fisik secara langsung di web atau via unggah file Excel.</p>
        </div>
        <div>
            <a href="<?= base_url('stock-opname'); ?>" class="btn btn-outline-secondary rounded-pill px-4 mr-2">
                <i class="fas fa-arrow-left mr-1"></i> Kembali
            </a>
            <a href="<?= base_url('stock-opname/download-template'); ?>" class="btn btn-outline-primary rounded-pill px-4 font-weight-bold shadow-sm">
                <i class="fas fa-download mr-1"></i> Download Template Excel
            </a>
        </div>
    </div>

    <!-- Informasi Sesi Opname -->
    <div class="card opname-card bg-white mb-4">
        <div class="card-body p-4">
            <h5 class="font-weight-bold text-dark mb-3 border-bottom pb-2">
                <i class="fas fa-info-circle text-primary mr-2"></i>Informasi Dokumen Berita Acara
            </h5>
            <div class="row">
                <div class="col-md-3">
                    <div class="form-group mb-3">
                        <label class="text-muted font-weight-bold small text-uppercase">Nomor Dokumen</label>
                        <input type="text" id="kode_opname" class="form-control font-weight-bold bg-light" value="<?= esc($kodeOpname); ?>" readonly>
                    </div>
                </div>
                <div class="col-md-3">
                    <div class="form-group mb-3">
                        <label class="text-muted font-weight-bold small text-uppercase">Tanggal Pelaksanaan</label>
                        <input type="date" id="tanggal_opname" class="form-control" value="<?= esc($tanggalHariIni); ?>">
                    </div>
                </div>
                <div class="col-md-3">
                    <div class="form-group mb-3">
                        <label class="text-muted font-weight-bold small text-uppercase">Petugas Penanggung Jawab (PIC)</label>
                        <input type="text" id="petugas" class="form-control font-weight-bold" value="<?= esc($petugas); ?>" placeholder="Nama Petugas">
                    </div>
                </div>
                <div class="col-md-3">
                    <div class="form-group mb-3">
                        <label class="text-muted font-weight-bold small text-uppercase">Ruang / Lokasi Opname</label>
                        <select id="lokasi" class="form-control">
                            <option value="Semua Lokasi">-- Semua Lokasi / Gudang --</option>
                            <?php foreach ($lokasiList as $lok): ?>
                                <option value="<?= esc($lok['namaruang']); ?>"><?= esc($lok['namaruang']); ?></option>
                            <?php endforeach; ?>
                        </select>
                    </div>
                </div>
                <div class="col-12">
                    <div class="form-group mb-0">
                        <label class="text-muted font-weight-bold small text-uppercase">Keterangan / Tujuan Opname</label>
                        <input type="text" id="keterangan" class="form-control" placeholder="Contoh: Stock Opname Rutin Akhir Semester / Verifikasi Tahunan">
                    </div>
                </div>
            </div>
        </div>
    </div>

    <!-- Opsi Cepat: Import Excel Opname -->
    <div class="card opname-card bg-white mb-4">
        <div class="card-body p-4">
            <div class="row align-items-center">
                <div class="col-lg-7">
                    <h5 class="font-weight-bold text-dark mb-1">
                        <i class="fas fa-file-excel text-success mr-2"></i>Punya File Excel Hasil Hitung Fisik?
                    </h5>
                    <p class="text-muted small mb-0">
                        Unggah file Excel (format template resmi) untuk mengisi stok fisik secara otomatis. Sistem mencocokkan data <strong>berdasarkan nama barang</strong> secara presisi.
                    </p>
                </div>
                <div class="col-lg-5 text-lg-right mt-3 mt-lg-0">
                    <form id="formImportExcel" class="d-inline-flex align-items-center">
                        <input type="file" id="excel_file" name="excel_file" accept=".xlsx, .xls, .csv" class="d-none" onchange="handleExcelUpload(this)">
                        <button type="button" class="btn btn-success rounded-pill px-4 font-weight-bold shadow-sm" onclick="$('#excel_file').click()">
                            <i class="fas fa-upload mr-2"></i> Unggah File Excel Opname
                        </button>
                    </form>
                </div>
            </div>
        </div>
    </div>

    <!-- Live Counter Ringkasan Rekonsiliasi -->
    <div class="row mb-4">
        <div class="col-md-3 col-6 mb-2">
            <div class="card metric-card bg-white p-3 text-center border">
                <small class="text-muted font-weight-bold text-uppercase">Total Barang</small>
                <h3 class="font-weight-bold text-dark mb-0" id="cntTotal"><?= count($items); ?></h3>
            </div>
        </div>
        <div class="col-md-3 col-6 mb-2">
            <div class="card metric-card bg-white p-3 text-center border">
                <small class="text-success font-weight-bold text-uppercase">Stok Sesuai (Cocok)</small>
                <h3 class="font-weight-bold text-success mb-0" id="cntCocok">0</h3>
            </div>
        </div>
        <div class="col-md-3 col-6 mb-2">
            <div class="card metric-card bg-white p-3 text-center border">
                <small class="text-warning font-weight-bold text-uppercase">Surplus / Lebih (+)</small>
                <h3 class="font-weight-bold text-warning mb-0" id="cntSurplus">0</h3>
            </div>
        </div>
        <div class="col-md-3 col-6 mb-2">
            <div class="card metric-card bg-white p-3 text-center border">
                <small class="text-danger font-weight-bold text-uppercase">Defisit / Kurang (-)</small>
                <h3 class="font-weight-bold text-danger mb-0" id="cntDefisit">0</h3>
            </div>
        </div>
    </div>

    <!-- Tabel Input Barang -->
    <div class="card opname-card bg-white mb-4">
        <div class="card-header bg-white border-0 pt-4 px-4 pb-0 d-flex justify-content-between align-items-center">
            <div>
                <h5 class="font-weight-bold text-dark mb-0">Rincian Fisik vs Sistem</h5>
                <small class="text-muted">Masukkan stok fisik aktual pada kolom input biru di bawah ini.</small>
            </div>
            <div>
                <button type="button" class="btn btn-outline-primary btn-sm rounded-pill px-3 mr-2" onclick="setAllPhysicalToSystem()">
                    <i class="fas fa-equals mr-1"></i> Samakan Semua ke Sistem
                </button>
            </div>
        </div>
        <div class="card-body p-4">
            <div class="table-responsive">
                <table id="tableInputOpname" class="table table-hover align-middle">
                    <thead class="thead-light">
                        <tr>
                            <th class="text-center" style="width: 50px;">NO</th>
                            <th>NAMA BARANG</th>
                            <th class="text-center">KODE</th>
                            <th class="text-center">LOKASI</th>
                            <th class="text-center">SATUAN</th>
                            <th class="text-right" style="width: 120px;">STOK SISTEM</th>
                            <th class="text-center" style="width: 140px; background: #eff6ff;">STOK FISIK AKTUAL *</th>
                            <th class="text-center" style="width: 110px;">SELISIH</th>
                            <th>KETERANGAN / KONDISI</th>
                        </tr>
                    </thead>
                    <tbody id="tbodyOpname">
                        <?php foreach ($items as $idx => $it): ?>
                            <tr data-row-id="<?= $idx; ?>" data-nama="<?= esc($it['namabarang']); ?>" data-kode="<?= esc($it['kodebarang']); ?>">
                                <td class="text-center text-muted"><?= $idx + 1; ?></td>
                                <td>
                                    <span class="font-weight-bold text-dark d-block item-nama"><?= esc($it['namabarang']); ?></span>
                                </td>
                                <td class="text-center text-muted small item-kode"><?= esc($it['kodebarang']); ?></td>
                                <td class="text-center small item-lokasi"><?= esc($it['namaruang'] ?: $it['lokasi']); ?></td>
                                <td class="text-center text-muted small item-unit"><?= esc($it['unit']); ?></td>
                                <td class="text-right font-weight-bold text-secondary item-sistem" data-val="<?= (int)$it['ketersediaan']; ?>">
                                    <?= number_format($it['ketersediaan']); ?>
                                </td>
                                <td style="background: #f8fafc;">
                                    <input type="number" min="0" class="form-control form-control-sm input-fisik item-fisik" 
                                           value="<?= (int)$it['ketersediaan']; ?>" 
                                           oninput="recalculateRow(this)">
                                </td>
                                <td class="text-center item-selisih-col">
                                    <span class="badge badge-diff-zero px-2 py-1 font-weight-bold item-selisih-badge">0</span>
                                </td>
                                <td>
                                    <input type="text" class="form-control form-control-sm item-ket" placeholder="Keterangan..." value="<?= esc($it['keterangan'] ?? ''); ?>">
                                </td>
                            </tr>
                        <?php endforeach; ?>
                    </tbody>
                </table>
            </div>

            <hr class="my-4">

            <!-- Tombol Finalisasi -->
            <div class="d-flex justify-content-between align-items-center">
                <a href="<?= base_url('stock-opname'); ?>" class="btn btn-light rounded-pill px-4">
                    Batal
                </a>
                <button type="button" class="btn btn-primary rounded-pill px-5 py-2 font-weight-bold shadow-lg" style="background: linear-gradient(135deg, #2563eb 0%, #1d4ed8 100%);" onclick="submitFinalOpname()">
                    <i class="fas fa-check-circle mr-2"></i> Finalisasi & Perbarui Stok Database
                </button>
            </div>
        </div>
    </div>

</div>
<?= $this->endSection() ?>

<?= $this->section('script') ?>
<script src="<?= base_url('adminLTE/plugins/datatables/jquery.dataTables.min.js'); ?>"></script>
<script src="<?= base_url('adminLTE/plugins/datatables-bs4/js/dataTables.bootstrap4.min.js'); ?>"></script>
<script src="<?= base_url('adminLTE/plugins/sweetalert2/sweetalert2.min.js'); ?>"></script>
<script>
    let dtTable = null;

    $(document).ready(function() {
        dtTable = $('#tableInputOpname').DataTable({
            "responsive": true,
            "autoWidth": false,
            "pageLength": 50,
            "lengthMenu": [25, 50, 100, 250, 500],
            "language": {
                "search": "Cari Nama Barang:",
                "lengthMenu": "Tampilkan _MENU_ barang",
                "info": "Menampilkan _START_ s/d _END_ dari _TOTAL_ barang",
                "paginate": { "next": "›", "previous": "‹" }
            }
        });

        // Hitung awal
        updateSummaryCounters();
    });

    // Hitung selisih per baris saat input fisik berubah
    function recalculateRow(inputEl) {
        const row = $(inputEl).closest('tr');
        const sistemVal = parseInt(row.find('.item-sistem').data('val')) || 0;
        const fisikVal  = parseInt($(inputEl).val()) || 0;
        const diff      = fisikVal - sistemVal;

        const badge = row.find('.item-selisih-badge');
        badge.removeClass('badge-diff-zero badge-diff-plus badge-diff-minus');

        if (diff === 0) {
            badge.addClass('badge-diff-zero').text('0');
        } else if (diff > 0) {
            badge.addClass('badge-diff-plus').text('+' + diff);
        } else {
            badge.addClass('badge-diff-minus').text(diff);
        }

        updateSummaryCounters();
    }

    // Update Counter Ringkasan
    function updateSummaryCounters() {
        let total = 0, cocok = 0, surplus = 0, defisit = 0;

        $('#tableInputOpname tbody tr').each(function() {
            const sistem = parseInt($(this).find('.item-sistem').data('val')) || 0;
            const fisik  = parseInt($(this).find('.item-fisik').val()) || 0;
            const diff   = fisik - sistem;

            total++;
            if (diff === 0) cocok++;
            else if (diff > 0) surplus++;
            else defisit++;
        });

        $('#cntTotal').text(total);
        $('#cntCocok').text(cocok);
        $('#cntSurplus').text(surplus);
        $('#cntDefisit').text(defisit);
    }

    // Set semua stok fisik sama dengan sistem
    function setAllPhysicalToSystem() {
        $('#tableInputOpname tbody tr').each(function() {
            const sistem = parseInt($(this).find('.item-sistem').data('val')) || 0;
            $(this).find('.item-fisik').val(sistem);
            recalculateRow($(this).find('.item-fisik'));
        });
        Swal.fire({
            icon: 'info',
            title: 'Stok Fisik Disamakan',
            text: 'Seluruh kolom stok fisik telah diisi sesuai stok sistem saat ini.',
            timer: 1500,
            showConfirmButton: false
        });
    }

    // Upload & Import Excel Opname (Pencocokan berbasis Nama Barang)
    function handleExcelUpload(fileInput) {
        if (!fileInput.files || fileInput.files.length === 0) return;

        const file = fileInput.files[0];
        const formData = new FormData();
        formData.append('excel_file', file);

        Swal.fire({
            title: 'Membaca File Excel...',
            html: 'Mencocokkan data barang <b>berdasarkan nama</b>...',
            allowOutsideClick: false,
            didOpen: () => { Swal.showLoading(); }
        });

        fetch('<?= base_url("stock-opname/import-excel"); ?>', {
            method: 'POST',
            body: formData
        })
        .then(res => res.json())
        .then(res => {
            if (res.status !== 'success') {
                Swal.fire('Gagal!', res.message || 'File Excel tidak dapat diproses.', 'error');
                return;
            }

            // Map data dari Excel berdasarkan nama bersih
            const excelMap = {};
            res.data.forEach(item => {
                const cleanKey = cleanString(item.namabarang);
                excelMap[cleanKey] = item;
            });

            let matchedCount = 0;

            // Update baris-baris di DataTable
            $('#tableInputOpname tbody tr').each(function() {
                const nama = $(this).find('.item-nama').text().trim();
                const clean = cleanString(nama);

                if (excelMap[clean]) {
                    const exData = excelMap[clean];
                    $(this).find('.item-fisik').val(exData.stok_fisik);
                    if (exData.keterangan) {
                        $(this).find('.item-ket').val(exData.keterangan);
                    }
                    recalculateRow($(this).find('.item-fisik'));
                    matchedCount++;
                }
            });

            Swal.fire({
                icon: 'success',
                title: 'Excel Berhasil Dimuat!',
                html: `Berhasil mencocokkan <b>${matchedCount} barang</b> berdasarkan nama.<br>` +
                      `<small class="text-muted">Surplus: ${res.summary.total_surplus} | Defisit: ${res.summary.total_defisit}</small>`
            });
        })
        .catch(err => {
            Swal.fire('Error!', 'Gagal menghubungi server: ' + err, 'error');
        });

        // Reset input file agar bisa diunggah ulang jika perlu
        $(fileInput).val('');
    }

    // Helper pembersih string nama barang di sisi JS
    function cleanString(str) {
        if (!str) return '';
        return str.toLowerCase()
                  .replace(/["']/g, '')
                  .replace(/[\(\)\,\.\-\/\:\_]/g, ' ')
                  .replace(/\s+/g, ' ')
                  .trim();
    }

    // Submit Finalisasi Opname
    function submitFinalOpname() {
        const kodeOpname = $('#kode_opname').val().trim();
        const tglOpname  = $('#tanggal_opname').val().trim();
        const petugas    = $('#petugas').val().trim();
        const lokasi     = $('#lokasi').val().trim();
        const keterangan = $('#keterangan').val().trim();

        if (!petugas) {
            Swal.fire('Peringatan', 'Nama petugas penanggung jawab wajib diisi.', 'warning');
            return;
        }

        // Kumpulkan data semua barang (termasuk pagination datatables)
        const items = [];
        // Gunakan selector dtTable rows agar seluruh baris terambil (bukan hanya halaman aktif)
        $('#tableInputOpname tbody tr').each(function() {
            const kode   = $(this).find('.item-kode').text().trim();
            const nama   = $(this).find('.item-nama').text().trim();
            const unit   = $(this).find('.item-unit').text().trim();
            const lokasi = $(this).find('.item-lokasi').text().trim();
            const sistem = parseInt($(this).find('.item-sistem').data('val')) || 0;
            const fisik  = parseInt($(this).find('.item-fisik').val()) || 0;
            const ket    = $(this).find('.item-ket').val().trim();

            if (nama) {
                items.push({
                    kodebarang: kode,
                    namabarang: nama,
                    unit: unit,
                    lokasi: lokasi,
                    stok_sistem: sistem,
                    stok_fisik: fisik,
                    keterangan: ket
                });
            }
        });

        Swal.fire({
            title: 'Konfirmasi Finalisasi?',
            html: `Anda akan menyelesaikan Stock Opname <b>${kodeOpname}</b>.<br>` +
                  `<span class="text-danger small">Stok di database masterbarang dan barangbergerak akan langsung diperbarui sesuai stok fisik ini.</span>`,
            icon: 'question',
            showCancelButton: true,
            confirmButtonColor: '#2563eb',
            cancelButtonColor: '#64748b',
            confirmButtonText: 'Ya, Simpan & Perbarui Stok!',
            cancelButtonText: 'Batal'
        }).then((result) => {
            if (result.isConfirmed) {
                Swal.fire({
                    title: 'Menyimpan & Menyesuaikan Stok...',
                    allowOutsideClick: false,
                    didOpen: () => { Swal.showLoading(); }
                });

                const postData = new FormData();
                postData.append('kode_opname', kodeOpname);
                postData.append('tanggal_opname', tglOpname);
                postData.append('petugas', petugas);
                postData.append('lokasi', lokasi);
                postData.append('keterangan', keterangan);
                postData.append('items', JSON.stringify(items));

                fetch('<?= base_url("stock-opname/save"); ?>', {
                    method: 'POST',
                    body: postData
                })
                .then(res => res.json())
                .then(res => {
                    if (res.status === 'success') {
                        Swal.fire({
                            icon: 'success',
                            title: 'Berhasil!',
                            text: res.message,
                            timer: 2000,
                            showConfirmButton: false
                        }).then(() => {
                            window.location.href = res.redirect || '<?= base_url("stock-opname"); ?>';
                        });
                    } else {
                        Swal.fire('Gagal!', res.message || 'Terjadi kesalahan.', 'error');
                    }
                })
                .catch(err => {
                    Swal.fire('Error!', 'Koneksi gagal: ' + err, 'error');
                });
            }
        });
    }
</script>
<?= $this->endSection() ?>

