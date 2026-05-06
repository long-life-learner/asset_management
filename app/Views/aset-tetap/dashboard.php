<?= $this->extend('default') ?>

<?= $this->section('page_title'); ?>
<?= $title; ?>
<?= $this->endSection(); ?>

<?= $this->section('context'); ?>
<?= $title; ?>
<?= $this->endSection(); ?>

<?= $this->section('css'); ?>
<link rel="stylesheet" href="<?= base_url('adminLTE/plugins/datatables-bs4/css/dataTables.bootstrap4.min.css'); ?>">
<link rel="stylesheet" href="<?= base_url('adminLTE/plugins/datatables-responsive/css/responsive.bootstrap4.min.css'); ?>">
<!-- Select2 -->
<link rel="stylesheet" href="<?= base_url('adminLTE/plugins/select2/css/select2.min.css'); ?>">
<link rel="stylesheet" href="<?= base_url('adminLTE/plugins/select2-bootstrap4-theme/select2-bootstrap4.min.css'); ?>">
<style>
    /* ── Header & Action Styles ── */
    .dashboard-header {
        background: linear-gradient(135deg, #002366 0%, #003399 100%);
        color: #fff; padding: 30px; border-radius: 20px; margin-bottom: 25px;
        box-shadow: 0 12px 30px rgba(0, 35, 102, 0.2);
        position: relative; overflow: hidden;
    }
    .header-icon-bg {
        position: absolute; right: -20px; top: -20px; font-size: 8rem;
        opacity: 0.1; transform: rotate(-15deg);
    }
    .btn-premium { border-radius: 12px; padding: 12px 24px; font-weight: 700; transition: all 0.3s; }
    .btn-premium:hover { transform: translateY(-3px); box-shadow: 0 8px 20px rgba(0,0,0,0.15); }

    /* ── Tab Navigation ── */
    .nav-pills-premium .nav-link {
        color: #64748b; background: #f1f5f9; border-radius: 12px;
        margin-right: 12px; font-weight: 700; padding: 12px 25px;
        border: 2px solid transparent; transition: all 0.2s;
    }
    .nav-pills-premium .nav-link.active {
        background: #fff !important; color: #002366 !important;
        border-color: #002366 !important; box-shadow: 0 4px 12px rgba(0,0,0,0.05);
    }

    /* ── Custom Table ── */
    .table-premium thead th {
        background: #f8fafc; color: #475569; border: none;
        text-transform: uppercase; font-size: 0.7rem; letter-spacing: 0.1em;
    }
    .badge-condition {
        padding: 6px 12px; border-radius: 8px; font-weight: 800; font-size: 0.65rem;
        text-transform: uppercase;
    }
    .cond-baik { background: #dcfce7; color: #166534; }
    .cond-rusak { background: #fee2e2; color: #991b1b; }

    /* ── Modal & Form ── */
    .modal-content { border-radius: 25px; border: none; overflow: hidden; }
    .modal-header-premium { background: #f8fafc; padding: 25px; border-bottom: 1px solid #f1f5f9; }
    .form-label-bold { font-weight: 700; color: #334155; margin-bottom: 8px; }
    .code-preview-box {
        background: #f8fafc; border: 2px dashed #e2e8f0; padding: 15px;
        border-radius: 12px; margin-bottom: 20px;
    }

    /* ── Mobile Select2 Fix ── */
    .select2-container--open { z-index: 9999999 !important; }
    .select2-search__field { font-size: 16px !important; } 
</style>
<?= $this->endSection(); ?>

<?= $this->section('content') ?>
<div class="container-fluid">
    
    <!-- 1. Header Section -->
    <div class="dashboard-header d-flex flex-wrap align-items-center justify-content-between shadow-lg">
        <i class="fas fa-building header-icon-bg"></i>
        <div class="z-index-1">
            <h2 class="font-weight-bold mb-1"><i class="fas fa-landmark mr-2"></i>Dashboard <?= $title; ?></h2>
            <p class="mb-0 opacity-8">Manajemen aset tetap, fasilitas gedung, dan inventaris institusi.</p>
        </div>
        <div class="z-index-1 mt-3 mt-md-0">
            <button type="button" class="btn btn-warning btn-premium mr-2 shadow" data-toggle="modal" data-target="#modal-tambah-aset-tetap">
                <i class="fas fa-plus-circle mr-1"></i> Tambah Aset Baru
            </button>
            <button type="button" class="btn btn-success btn-premium shadow" data-toggle="modal" data-target="#modal-import-excel">
                <i class="fas fa-file-excel mr-1"></i> Import Excel
            </button>
        </div>
    </div>

    <!-- 2. Content Tabs -->
    <div class="card border-0 shadow-sm mb-4" style="border-radius: 20px;">
        <div class="card-body p-4">
            <ul class="nav nav-pills nav-pills-premium mb-4" id="main-tabs" role="tablist">
                <li class="nav-item">
                    <a class="nav-link active" id="tab-summary-link" data-toggle="tab" href="#tab-summary"><i class="fas fa-th-large mr-2"></i>Ringkasan Group</a>
                </li>
                <li class="nav-item">
                    <a class="nav-link" id="tab-detail-link" data-toggle="tab" href="#tab-detail"><i class="fas fa-list-ul mr-2"></i>Detail Aset</a>
                </li>
            </ul>

            <div class="tab-content">
                <!-- Tab: Summary -->
                <div class="tab-pane fade show active" id="tab-summary">
                    <div class="table-responsive">
                        <table class="table table-premium w-100" id="dataTable1">
                            <thead>
                                <tr>
                                    <th>Kode Group</th>
                                    <th>Nama Aset & Spesifikasi</th>
                                    <th>Total Item</th>
                                </tr>
                            </thead>
                            <tbody>
                                <?php foreach ($asetTetapSumm as $asset) : ?>
                                    <tr>
                                        <td class="font-weight-bold text-primary"><?= $asset->kode_group ?></td>
                                        <td>
                                            <div class="font-weight-bold h6 mb-0"><?= $asset->nama ?></div>
                                            <small class="text-muted"><?= $asset->merk ?> - <?= $asset->tipe ?></small>
                                        </td>
                                        <td><span class="h5 font-weight-bold"><?= $asset->total_assets ?></span> <small class="text-muted">Unit</small></td>
                                    </tr>
                                <?php endforeach; ?>
                            </tbody>
                        </table>
                    </div>
                </div>

                <!-- Tab: Detail -->
                <div class="tab-pane fade" id="tab-detail">
                    <div class="table-responsive">
                        <table class="table table-premium w-100" id="table-detail">
                            <thead>
                                <tr>
                                    <th>ID Kode</th>
                                    <th>Aset</th>
                                    <th>Thn</th>
                                    <th>Lokasi</th>
                                    <th>Kondisi</th>
                                    <th>Update SO</th>
                                    <th>Keterangan</th>
                                </tr>
                            </thead>
                            <tbody>
                                <?php foreach ($asetTetapDetail as $asset) : ?>
                                    <tr>
                                        <td class="font-weight-bold text-primary"><?= $asset['kode']; ?></td>
                                        <td>
                                            <div class="font-weight-bold"><?= $asset['namabarang']; ?></div>
                                            <small class="text-muted"><?= $asset['merk']; ?> / <?= $asset['tipebarang']; ?></small>
                                        </td>
                                        <td class="text-center"><?= $asset['tahun']; ?></td>
                                        <td><i class="fas fa-map-marker-alt mr-1 text-muted"></i><?= $asset['namaruang']; ?></td>
                                        <td>
                                            <span class="badge-condition <?= strpos($asset['kondisi'], 'Rusak') !== false ? 'cond-rusak' : 'cond-baik'; ?>">
                                                <?= $asset['kondisi']; ?>
                                            </span>
                                        </td>
                                        <td><small><?= date('d/m/Y', strtotime($asset['tanggal'])); ?></small></td>
                                        <td><small class="text-muted"><?= $asset['keterangan'] ?: '-'; ?></small></td>
                                    </tr>
                                <?php endforeach; ?>
                            </tbody>
                        </table>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>

<!-- Modal: Import Excel -->
<div class="modal fade" id="modal-import-excel" role="dialog" data-focus="false">
    <div class="modal-dialog modal-dialog-centered modal-lg">
        <div class="modal-content shadow-2xl">
            <form id="excelForm">
                <div class="modal-header-premium">
                    <h5 class="modal-title font-weight-bold text-primary"><i class="fas fa-file-excel mr-2 text-success"></i>Import Aset Tetap via Excel</h5>
                    <button type="button" class="close" data-dismiss="modal">&times;</button>
                </div>
                <div class="modal-body p-4">
                    <div class="alert alert-warning border-0 shadow-sm mb-4" style="border-radius: 12px;">
                        <i class="fas fa-exclamation-triangle mr-2"></i>
                        <strong>Penting!</strong> Anda harus mencari kode terakhir aset untuk disalin ke file Excel agar ID tidak berbenturan.
                    </div>
                    <div class="form-group mb-4">
                        <label class="form-label-bold">1. Cari Kode Terakhir</label>
                        <select class="form-control select2" id="cari-kode" required style="width: 100%;"></select>
                    </div>
                    <div id="kode-terakhir-container" class="code-preview-box d-none text-center">
                        <small class="text-muted d-block mb-1 text-uppercase">Gunakan Kode Berikut di Excel:</small>
                        <span id="new-code-display" class="h4 font-weight-bold text-success mb-0"></span>
                    </div>
                    <hr>
                    <div class="form-group mb-0">
                        <label class="form-label-bold">2. Pilih File Excel</label>
                        <div class="custom-file mb-2">
                            <input type="file" name="excelFile" class="custom-file-input" id="uploadExcel" accept=".xlsx, .xls">
                            <label class="custom-file-label" for="uploadExcel">Pilih file .xlsx...</label>
                        </div>
                        <div class="text-right">
                            <a href="<?= base_url('public/adminLTE/aset-tetap-template.xlsx'); ?>" class="btn btn-link btn-sm p-0">
                                <i class="fas fa-download mr-1"></i> Unduh Template Excel
                            </a>
                        </div>
                    </div>
                </div>
                <div class="modal-footer border-0 p-4">
                    <button type="button" class="btn btn-light rounded-pill px-4" data-dismiss="modal">Batal</button>
                    <button type="button" id="btnUploadExcel" class="btn btn-primary rounded-pill px-5 font-weight-bold shadow">MULAI IMPORT</button>
                </div>
            </form>
        </div>
    </div>
</div>

<!-- Modal: Tambah Aset Manual -->
<div class="modal fade" id="modal-tambah-aset-tetap" role="dialog" data-focus="false">
    <div class="modal-dialog modal-dialog-centered modal-lg">
        <div class="modal-content">
            <form id="formTambahAsetTetap">
                <div class="modal-header-premium bg-primary text-white">
                    <h5 class="modal-title font-weight-bold"><i class="fas fa-plus-circle mr-2"></i>Tambah Aset Tetap Manual</h5>
                    <button type="button" class="close text-white" data-dismiss="modal">&times;</button>
                </div>
                <div class="modal-body p-4">
                    <div class="row">
                        <div class="col-md-6 form-group">
                            <label class="form-label-bold">Cari Referensi Aset*</label>
                            <select class="form-control select2" id="cari-kode-manual" required style="width: 100%;"></select>
                        </div>
                        <div class="col-md-6 form-group">
                            <label class="form-label-bold">ID Kode Selanjutnya</label>
                            <input type="text" class="form-control bg-light font-weight-bold text-primary" id="kode-manual-display" name="kode" readonly>
                        </div>
                    </div>
                    <div class="row">
                        <div class="col-md-4 form-group">
                            <label class="form-label-bold">Jumlah Item*</label>
                            <input type="number" name="jumlah" class="form-control" value="1" min="1" required>
                        </div>
                        <div class="col-md-4 form-group">
                            <label class="form-label-bold">Kondisi Aset*</label>
                            <select class="form-control" name="kondisi" required>
                                <option>Baik</option>
                                <option>Rusak Ringan</option>
                                <option>Rusak Sedang</option>
                                <option>Rusak Parah</option>
                            </select>
                        </div>
                        <div class="col-md-4 form-group">
                            <label class="form-label-bold">Lokasi Penempatan*</label>
                            <select class="form-control" id="lokasi-manual" name="lokasi" required></select>
                        </div>
                    </div>
                    <div class="form-group">
                        <label class="form-label-bold">Keterangan Aset</label>
                        <textarea class="form-control" name="keterangan" rows="2" placeholder="Catatan opsional..."></textarea>
                    </div>
                </div>
                <div class="modal-footer border-0 p-4">
                    <button type="button" class="btn btn-light rounded-pill px-4" data-dismiss="modal">Batal</button>
                    <button type="submit" class="btn btn-primary rounded-pill px-5 font-weight-bold shadow">SIMPAN ASET</button>
                </div>
            </form>
        </div>
    </div>
</div>
<?= $this->endSection(); ?>

<?= $this->section('javascript'); ?>
<script src="<?= base_url('adminLTE/plugins/datatables/jquery.dataTables.min.js'); ?>"></script>
<script src="<?= base_url('adminLTE/plugins/datatables-bs4/js/dataTables.bootstrap4.min.js'); ?>"></script>
<script src="<?= base_url('adminLTE/plugins/datatables-responsive/js/dataTables.responsive.min.js'); ?>"></script>
<!-- Select2 -->
<script src="<?= base_url('adminLTE/plugins/select2/js/select2.full.min.js'); ?>"></script>

<script>
$(document).ready(function() {
    // 1. DataTables Init
    const dtOptions = { responsive: true, language: { search: "Cari:", info: "_START_ s/d _END_ dari _TOTAL_" } };
    $('#dataTable1').DataTable(dtOptions);
    $('#table-detail').DataTable({ 
        ...dtOptions, 
        order: [[2, 'desc'], [5, 'desc']] 
    });

    // 2. Load Rooms for Manual Entry
    $.get("<?= base_url('/AsetBangunanAPI'); ?>", (data) => {
        data.forEach(el => $('#lokasi-manual').append(`<option value="${el.koderuang}">${el.namaruang}</option>`));
    });

    // 3. Select2 Config Factory
    const setupAssetSearch = (selectId, displayId, containerId) => {
        $(selectId).select2({
            placeholder: "Ketikan kode / nama aset...",
            allowClear: true,
            ajax: {
                url: '<?= base_url('master-aset/search-last-code'); ?>',
                dataType: 'json',
                delay: 250,
                data: p => ({ search: p.term, type: 'Aset Tetap' }),
                processResults: data => data,
                cache: false
            },
            minimumInputLength: 1
        }).on("select2:select", function(e) {
            const kode = e.params.data.id;
            $.get("<?= base_url('aset-tetap/search-last-code'); ?>/" + kode, (data) => {
                let nextCode = data && data.kode ? 
                    data.kode.slice(0, -4) + ('0000' + (parseInt(data.kode.slice(-4)) + 1)).slice(-4) : 
                    kode + '0001';
                
                $(displayId).is('input') ? $(displayId).val(nextCode) : $(displayId).text(nextCode);
                if(containerId) $(containerId).removeClass('d-none');
            });
        });
    };

    setupAssetSearch('#cari-kode', '#new-code-display', '#kode-terakhir-container');
    setupAssetSearch('#cari-kode-manual', '#kode-manual-display');

    // 4. File Input Helper
    $('#uploadExcel').on('change', function(e) {
        $(this).next('.custom-file-label').html(e.target.files[0].name);
    });

    // 5. Actions
    $('#formTambahAsetTetap').submit(function(e) {
        e.preventDefault();
        $.post('<?= base_url('/AsetTetapAPI'); ?>', $(this).serialize(), (res) => {
            Swal.fire('Berhasil', res.msg, 'success').then(() => location.reload());
        }).fail(err => Swal.fire('Gagal', err.responseText, 'error'));
    });

    $("#btnUploadExcel").on("click", function() {
        let formData = new FormData($("#excelForm")[0]);
        $.ajax({
            url: "<?= base_url('/aset-tetap/upload'); ?>",
            type: "POST", data: formData, contentType: false, processData: false,
            success: (res) => Swal.fire('Yeay', res.msg, 'success').then(() => location.reload()),
            error: (err) => Swal.fire('Error', 'Gagal memproses file', 'error')
        });
    });
});
</script>
<?= $this->endSection(); ?>