<?= $this->extend('default') ?>

<?= $this->section('page_title'); ?>
<?= $title; ?>
<?= $this->endSection(); ?>

<?= $this->section('context'); ?>
<?= $title; ?>
<?= $this->endSection(); ?>

<?= $this->section('css') ?>
<link rel="stylesheet" href="<?= base_url('adminLTE/plugins/jsgrid/jsgrid.min.css'); ?>">
<link rel="stylesheet" href="<?= base_url('adminLTE/plugins/jsgrid/jsgrid-theme.min.css'); ?>">
<style id="premium-ui-styles">
    /* ── Root Design Tokens ── */
    :root {
        --royal-main: #0a2351;
        --royal-light: #1a3a7a;
        --gold-accent: #c5a021;
        --glass-white: rgba(255, 255, 255, 0.9);
    }

    .content-wrapper { background: #f0f2f5 !important; }

    /* ── Hero Header ── */
    .hero-banner {
        background: linear-gradient(145deg, var(--royal-main) 0%, var(--royal-light) 100%);
        color: #fff;
        padding: 40px 30px;
        border-radius: 20px;
        margin-bottom: 35px;
        position: relative;
        box-shadow: 0 15px 35px rgba(10, 35, 81, 0.25);
        border: 1px solid rgba(255,255,255,0.1);
    }
    .hero-banner h1 { font-weight: 800; letter-spacing: -1px; }
    .hero-circle {
        position: absolute; top: -20px; right: -20px; width: 150px; height: 150px;
        background: radial-gradient(circle, rgba(255,255,255,0.1) 0%, transparent 70%);
        border-radius: 50%;
    }

    /* ── Modern Stats ── */
    .premium-stat {
        background: #fff;
        border-radius: 18px;
        padding: 25px;
        border: none;
        transition: all 0.3s cubic-bezier(0.4, 0, 0.2, 1);
        display: flex;
        align-items: center;
        box-shadow: 0 4px 6px rgba(0,0,0,0.02);
    }
    .premium-stat:hover {
        transform: translateY(-10px);
        box-shadow: 0 20px 40px rgba(0,0,0,0.08);
    }
    .stat-icon-wrap {
        width: 60px; height: 60px;
        border-radius: 15px;
        display: flex; align-items: center; justify-content: center;
        font-size: 1.8rem; margin-right: 20px;
    }
    .icon-blue { background: rgba(10, 35, 81, 0.08); color: var(--royal-main); }
    .icon-gold { background: rgba(197, 160, 33, 0.08); color: var(--gold-accent); }
    .icon-green { background: rgba(40, 167, 69, 0.08); color: #28a745; }

    /* ── Search Toolbar Pill ── */
    .toolbar-pill {
        background: #fff;
        border-radius: 50px;
        padding: 10px 15px 10px 25px;
        margin-bottom: 30px;
        box-shadow: 0 10px 25px rgba(0,0,0,0.03);
        border: 1px solid #edf2f7;
    }
    .pill-search { position: relative; flex-grow: 1; max-width: 450px; }
    .pill-search i { position: absolute; left: 0; top: 12px; color: #a0aec0; }
    .pill-search input {
        border: none; padding-left: 30px; height: 45px; background: transparent;
        font-size: 1rem; width: 100%;
    }
    .pill-search input:focus { outline: none; }

    /* ── jsGrid Overrides ── */
    #jsGrid1 { border: none !important; }
    .jsgrid-header-row > .jsgrid-header-cell {
        background: transparent !important;
        border-bottom: 2px solid #edf2f7 !important;
        color: #4a5568 !important;
        font-weight: 700; text-transform: uppercase;
        font-size: 0.75rem; padding: 20px 10px !important;
    }
    .jsgrid-cell { 
        padding: 15px 10px !important; 
        border-bottom: 1px solid #f7fafc !important;
        color: #2d3748;
    }
    .jsgrid-row:hover, .jsgrid-alt-row:hover { background: #f8fbff !important; }

    /* ── Condition Badges ── */
    .badge-cond {
        padding: 5px 12px; border-radius: 10px; font-weight: 800; font-size: 0.65rem;
        text-transform: uppercase; display: inline-block;
    }
    .cond-baik { background: #c6f6d5; color: #22543d; }
    .cond-rusak { background: #fed7d7; color: #822727; }
    .cond-sedang { background: #feebc8; color: #744210; }

</style>
<?= $this->endSection(); ?>

<?= $this->section('content') ?>
<div class="container-fluid py-3">
    
    <!-- Hero Banner -->
    <div class="hero-banner d-flex flex-wrap align-items-center justify-content-between overflow-hidden">
        <div class="hero-circle"></div>
        <div class="z-index-1">
            <h1 class="display-5 mb-1"><?= $title; ?></h1>
            <p class="lead opacity-8 mb-0">Manajemen Inventaris Aset Tetap Institusi Secara Terpusat</p>
        </div>
        <div class="z-index-1 mt-3 mt-md-0">
            <button class="btn btn-warning btn-lg rounded-pill px-4 shadow font-weight-bold" data-toggle="modal" data-target="#modal-import-excel">
                <i class="fas fa-upload mr-2"></i> Import Excel
            </button>
        </div>
    </div>

    <!-- Quick Stats -->
    <div class="row mb-5">
        <div class="col-lg-4 mb-3">
            <div class="premium-stat shadow-sm">
                <div class="stat-icon-wrap icon-blue"><i class="fas fa-boxes"></i></div>
                <div>
                    <div class="text-muted small font-weight-bold text-uppercase">Total Item</div>
                    <div class="h2 font-weight-bold mb-0" id="stat-total">--</div>
                </div>
            </div>
        </div>
        <div class="col-lg-4 mb-3">
            <div class="premium-stat shadow-sm">
                <div class="stat-icon-wrap icon-green"><i class="fas fa-shield-alt"></i></div>
                <div>
                    <div class="text-muted small font-weight-bold text-uppercase">Kondisi Prima</div>
                    <div class="h2 font-weight-bold mb-0" id="stat-baik">--</div>
                </div>
            </div>
        </div>
        <div class="col-lg-4 mb-3">
            <div class="premium-stat shadow-sm">
                <div class="stat-icon-wrap icon-gold"><i class="fas fa-map-marker-alt"></i></div>
                <div>
                    <div class="text-muted small font-weight-bold text-uppercase">Total Lokasi</div>
                    <div class="h2 font-weight-bold mb-0" id="stat-lokasi">--</div>
                </div>
            </div>
        </div>
    </div>

    <!-- Search Toolbar -->
    <div class="toolbar-pill d-flex align-items-center justify-content-between shadow-sm">
        <div class="pill-search">
            <i class="fas fa-search"></i>
            <input type="text" id="general-search" placeholder="Cari aset berdasarkan kode, nama, atau lokasi...">
        </div>
        <div>
            <button id="btn-refresh" class="btn btn-primary rounded-circle shadow-sm" style="width:45px; height:45px">
                <i class="fas fa-sync-alt"></i>
            </button>
        </div>
    </div>

    <!-- Grid Container -->
    <div class="card border-0 shadow-sm" style="border-radius: 25px; overflow: hidden;">
        <div class="card-body p-0">
            <div id="jsGrid1"></div>
        </div>
    </div>

</div>

<!-- Modal Import -->
<div class="modal fade" id="modal-import-excel" tabindex="-1">
    <div class="modal-dialog modal-dialog-centered">
        <div class="modal-content border-0 shadow-lg" style="border-radius: 25px;">
            <div class="modal-header bg-light py-4 border-0" style="border-radius: 25px 25px 0 0">
                <h5 class="modal-title font-weight-bold"><i class="fas fa-file-import mr-2 text-warning"></i>Import Data Aset</h5>
                <button type="button" class="close" data-dismiss="modal">&times;</button>
            </div>
            <div class="modal-body p-4">
                <div class="text-center mb-4">
                    <i class="fas fa-cloud-upload-alt text-muted" style="font-size: 3rem; opacity: 0.3"></i>
                </div>
                <div class="form-group mb-4">
                    <label class="font-weight-bold">Pilih File Excel</label>
                    <div class="custom-file shadow-sm">
                        <input type="file" class="custom-file-input" id="uploadExcel">
                        <label class="custom-file-label" for="uploadExcel">Cari file...</label>
                    </div>
                </div>
                <div class="bg-light p-3 rounded" style="border: 1px dashed #cbd5e0">
                    <small class="text-muted d-block mb-1">Butuh bantuan?</small>
                    <a href="<?= base_url('public/adminLTE/aset-tetap-template.xlsx'); ?>" class="btn btn-outline-primary btn-sm btn-block rounded-pill">
                        <i class="fas fa-download mr-1"></i> Unduh Template Excel
                    </a>
                </div>
            </div>
            <div class="modal-footer border-0 p-4">
                <button type="button" id="btnUploadExcel" class="btn btn-warning btn-block font-weight-bold rounded-pill py-2 shadow-sm">
                    UPLOAD SEKARANG
                </button>
            </div>
        </div>
    </div>
</div>
<?= $this->endSection(); ?>

<?= $this->section('javascript') ?>
<script src="<?= base_url('adminLTE/plugins/jsgrid/jsgrid.min.js'); ?>"></script>
<script src="<?= base_url('js/jsgrid-config.js'); ?>"></script>
<script>
$(document).ready(function() {

    const notify = (title, icon) => {
        Swal.fire({
            title: title, icon: icon, toast: true,
            position: 'top-end', showConfirmButton: false, timer: 3000
        });
    };

    // Load Metadata
    async function initResources() {
        try {
            const locs = await $.ajax({ url: "<?= base_url('/aset-tetap/distinct/lokasi'); ?>" });
            $('#stat-lokasi').text(locs.length);
            setupGrid(locs.map(v => ({ Id: v, Name: v })));
        } catch (e) {
            notify('Koneksi terputus', 'error');
        }
    }

    initResources();

    function setupGrid(locations) {
        $("#jsGrid1").jsGrid({
            height: "650px", width: "100%",
            autoload: true, sorting: true, paging: true,
            pageSize: 15, pageButtonCount: 5,
            inserting: true, editing: true,
            
            noDataContent: "Belum ada data yang tersedia",
            deleteConfirm: "Data yang dihapus tidak dapat dikembalikan. Lanjutkan?",

            controller: {
                loadData: (filter) => {
                    return $.ajax({
                        type: "GET", url: "<?= base_url('/AsetTetapAPI'); ?>", data: filter
                    }).done(data => {
                        updateDash(data);
                    });
                },
                insertItem: (item) => $.ajax({
                    type: "POST", url: "<?= base_url('/AsetTetapAPI'); ?>",
                    data: JSON.stringify(item), contentType: "application/json"
                }).done(() => notify('Data tersimpan', 'success')),

                updateItem: (item) => $.ajax({
                    type: "PUT", url: "<?= base_url('/AsetTetapAPI/update'); ?>",
                    data: JSON.stringify(item), contentType: "application/json"
                }).done(() => notify('Perubahan disimpan', 'success')),

                deleteItem: (item) => $.ajax({
                    type: "DELETE", url: "<?= base_url('/AsetTetapAPI/delete'); ?>",
                    data: JSON.stringify(item), contentType: "application/json"
                }).done(() => notify('Data terhapus', 'success'))
            },

            fields: [
                { name: "kode", title: "ID ASET", type: "text", width: 80, css: "font-weight-bold text-primary", editTemplate: v => v },
                { name: "namabarang", title: "NAMA ASET", type: "text", width: 140 },
                { name: "merk", title: "MERK", type: "text", width: 90 },
                { name: "tipebarang", title: "TIPE", type: "text", width: 90 },
                { name: "tahun", title: "THN", type: "number", width: 50, css: "text-center" },
                { name: "namaruang", title: "LOKASI", type: "text", width: 110, editTemplate: v => v },
                { 
                    name: "kondisi", title: "KONDISI", type: "select", width: 100,
                    items: [{Id: "Baik", Name: "Baik"}, {Id: "Rusak", Name: "Rusak"}, {Id: "Rusak Sedang", Name: "Rusak Sedang"}],
                    valueField: "Id", textField: "Name",
                    itemTemplate: (val) => {
                        let cls = 'cond-baik';
                        if (val && val.includes('Rusak')) cls = val === 'Rusak Sedang' ? 'cond-sedang' : 'cond-rusak';
                        return `<span class="badge-cond ${cls}">${val}</span>`;
                    }
                },
                { type: "control", width: 80 }
            ]
        });
    }

    function updateDash(data) {
        if (!data) return;
        $('#stat-total').text(data.length);
        $('#stat-baik').text(data.filter(i => i.kondisi === 'Baik').length);
    }

    // Interactive Search
    let st;
    $("#general-search").on("input", function() {
        clearTimeout(st);
        st = setTimeout(() => {
            $("#jsGrid1").jsGrid("loadData", { search: $(this).val() });
        }, 400);
    });

    $("#btn-refresh").click(() => $("#jsGrid1").jsGrid("loadData"));

});
</script>
<?= $this->endSection(); ?>