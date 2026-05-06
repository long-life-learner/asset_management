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
<style>
    /* ── Root & Base ── */
    :root {
        --primary-indigo: #6610f2;
        --secondary-indigo: #8540f5;
        --glass-bg: rgba(255, 255, 255, 0.95);
    }

    .content-wrapper { background-color: #f4f6f9; }

    /* ── Modern Header ── */
    .premium-header {
        background: linear-gradient(135deg, #4e08c4 0%, #6610f2 50%, #8540f5 100%);
        color: #fff;
        padding: 30px;
        border-radius: 15px;
        margin-bottom: 30px;
        box-shadow: 0 10px 30px rgba(102, 16, 242, 0.2);
        position: relative;
        overflow: hidden;
    }
    .premium-header::after {
        content: ""; position: absolute; top: -50px; right: -50px;
        width: 150px; height: 150px; background: rgba(255,255,255,0.1);
        border-radius: 50%;
    }

    /* ── Summary Cards ── */
    .stat-card {
        border: none;
        border-radius: 12px;
        transition: all 0.3s cubic-bezier(.25,.8,.25,1);
        background: var(--glass-bg);
    }
    .stat-card:hover {
        transform: translateY(-5px);
        box-shadow: 0 10px 25px rgba(0,0,0,0.08);
    }
    .stat-card .icon-box {
        width: 50px; height: 50px;
        border-radius: 12px;
        display: flex; align-items: center; justify-content: center;
        font-size: 1.5rem;
        margin-bottom: 15px;
    }
    .bg-soft-indigo { background: rgba(102, 16, 242, 0.1); color: var(--primary-indigo); }
    .bg-soft-success { background: rgba(40, 167, 69, 0.1); color: #28a745; }
    .bg-soft-warning { background: rgba(255, 193, 7, 0.1); color: #ffc107; }
    .bg-soft-info    { background: rgba(23, 162, 184, 0.1); color: #17a2b8; }

    /* ── Search & Filter Toolbar ── */
    .toolbar-box {
        background: #fff;
        padding: 15px 25px;
        border-radius: 50px;
        margin-bottom: 25px;
        box-shadow: 0 4px 15px rgba(0,0,0,0.03);
    }
    .search-wrapper { position: relative; width: 100%; max-width: 350px; }
    .search-wrapper i {
        position: absolute; left: 18px; top: 12px; color: #adb5bd;
    }
    .search-wrapper input {
        padding-left: 45px; height: 45px; border-radius: 25px;
        border: 1px solid #e9ecef; background: #f8f9fa;
    }
    .search-wrapper input:focus {
        background: #fff; box-shadow: 0 0 0 0.2rem rgba(102, 16, 242, 0.1);
        border-color: var(--primary-indigo);
    }

    /* ── jsGrid Redesign ── */
    #jsGrid1 { border-radius: 12px; overflow: hidden; border: none; }
    .jsgrid-header-row > .jsgrid-header-cell {
        background: #fff !important;
        border-bottom: 2px solid #f4f6f9 !important;
        color: #8898aa !important;
        font-size: 0.8rem; font-weight: 700; text-transform: uppercase;
        padding: 20px 10px !important;
    }
    .jsgrid-cell { padding: 15px 10px !important; border-color: #f4f6f9 !important; font-size: 0.9rem; }
    .jsgrid-row:hover, .jsgrid-alt-row:hover { background: #fbfcfe !important; }

    /* ── Custom Button Styles ── */
    .jsgrid-button {
        transition: transform 0.2s;
        filter: grayscale(1);
        opacity: 0.6;
    }
    .jsgrid-button:hover { transform: scale(1.15); filter: grayscale(0); opacity: 1; }
    .jsgrid-edit-button { color: var(--primary-indigo); }
    .jsgrid-delete-button { color: #dc3545; }

    /* ── Status Badges ── */
    .badge-modern {
        padding: 6px 12px; border-radius: 8px; font-weight: 600; font-size: 0.75rem;
        display: inline-flex; align-items: center;
    }
    .badge-modern i { margin-right: 5px; font-size: 0.6rem; }
    .badge-in  { background: #e6fffa; color: #047481; border: 1px solid #b2f5ea; }
    .badge-out { background: #fff5f5; color: #c53030; border: 1px solid #feb2b2; }

    /* ── Pagination ── */
    .jsgrid-pager-container { margin-top: 20px; text-align: center; }
    .jsgrid-pager-page a, .jsgrid-pager-nav-button a {
        padding: 8px 14px; border-radius: 8px; background: #fff;
        margin: 0 3px; color: #525f7f; border: 1px solid #e9ecef;
    }
    .jsgrid-pager-current-page {
        padding: 8px 14px; border-radius: 8px; background: var(--primary-indigo) !important;
        color: #fff !important; font-weight: bold;
    }
</style>
<?= $this->endSection(); ?>

<?= $this->section('content') ?>
<div class="container-fluid">
    
    <!-- 1. Premium Header -->
    <div class="premium-header d-flex flex-wrap align-items-center justify-content-between shadow-lg">
        <div>
            <h2 class="font-weight-bold mb-1"><i class="fas fa-cube mr-2"></i><?= $title; ?></h2>
            <p class="mb-0 opacity-8">Manajemen aset bergerak & kontrol inventaris cerdas</p>
        </div>
        <div class="header-actions">
            <button id="btn-refresh-grid" class="btn btn-white btn-sm rounded-pill px-4 shadow-sm">
                <i class="fas fa-sync-alt mr-1"></i> Refresh Data
            </button>
        </div>
    </div>

    <!-- 2. Summary Stats Cards -->
    <div class="row mb-4">
        <div class="col-xl-3 col-md-6 mb-4">
            <div class="card stat-card shadow-sm p-3">
                <div class="icon-box bg-soft-indigo"><i class="fas fa-layer-group"></i></div>
                <div class="text-muted small font-weight-bold text-uppercase mb-1">Total Jenis Aset</div>
                <div class="h3 font-weight-bold mb-0 text-dark" id="stat-total">--</div>
            </div>
        </div>
        <div class="col-xl-3 col-md-6 mb-4">
            <div class="card stat-card shadow-sm p-3">
                <div class="icon-box bg-soft-success"><i class="fas fa-check-double"></i></div>
                <div class="text-muted small font-weight-bold text-uppercase mb-1">Stok Tersedia</div>
                <div class="h3 font-weight-bold mb-0 text-dark" id="stat-stock">--</div>
            </div>
        </div>
        <div class="col-xl-3 col-md-6 mb-4">
            <div class="card stat-card shadow-sm p-3">
                <div class="icon-box bg-soft-warning"><i class="fas fa-exchange-alt"></i></div>
                <div class="text-muted small font-weight-bold text-uppercase mb-1">Mutasi Hari Ini</div>
                <div class="h3 font-weight-bold mb-0 text-dark">0</div>
            </div>
        </div>
        <div class="col-xl-3 col-md-6 mb-4">
            <div class="card stat-card shadow-sm p-3">
                <div class="icon-box bg-soft-info"><i class="fas fa-warehouse"></i></div>
                <div class="text-muted small font-weight-bold text-uppercase mb-1">Lokasi Tercover</div>
                <div class="h3 font-weight-bold mb-0 text-dark" id="stat-locations">--</div>
            </div>
        </div>
    </div>

    <!-- 3. Table Toolbar -->
    <div class="toolbar-box d-flex flex-wrap align-items-center justify-content-between">
        <div class="search-wrapper mb-2 mb-md-0">
            <i class="fas fa-search"></i>
            <input type="text" id="general-search" class="form-control border-0" placeholder="Cari kode, nama, atau lokasi...">
        </div>
        <div class="toolbar-actions">
            <span class="text-muted small mr-3"><i class="fas fa-info-circle mr-1"></i> Klik baris untuk edit cepat</span>
        </div>
    </div>

    <!-- 4. Main Grid Section -->
    <div class="card border-0 shadow-sm overflow-hidden" style="border-radius: 15px;">
        <div id="jsGrid1"></div>
    </div>

</div>
<?= $this->endSection(); ?>

<?= $this->section('javascript') ?>
<script src="<?= base_url('adminLTE/plugins/jsgrid/jsgrid.min.js'); ?>"></script>
<script>
$(document).ready(function() {

    // ─── Notification Helper ───
    const toast = (title, icon) => {
        Swal.fire({
            title: title, icon: icon,
            toast: true, position: 'top-end',
            showConfirmButton: false, timer: 3000,
            timerProgressBar: true
        });
    };

    // ─── Initial Data Loading ───
    async function loadResources() {
        try {
            const [lokasi, unit] = await Promise.all([
                $.ajax({ url: "<?= base_url('/aset-bergerak/distinct/lokasi'); ?>" }),
                $.ajax({ url: "<?= base_url('/aset-bergerak/distinct/unit'); ?>" })
            ]);
            
            $('#stat-locations').text(lokasi.length);
            initGrid(lokasi.map(v => ({ Id: v, Name: v })), unit.map(v => ({ Id: v, Name: v })));
        } catch (e) {
            console.error(e);
            Swal.fire('Error', 'Gagal sinkronisasi data referensi', 'error');
        }
    }

    loadResources();

    // ─── Grid Initialization ───
    function initGrid(lokasiItems, unitItems) {
        $("#jsGrid1").jsGrid({
            height: "600px", width: "100%",
            sorting: true, paging: true, autoload: true,
            pageSize: 10, pageButtonCount: 5,
            inserting: true, editing: true,
            
            // Text Config
            noDataContent: "Maaf, tidak ada data aset ditemukan",
            pagePrevText: "Prev", pageNextText: "Next",

            controller: {
                loadData: function(filter) {
                    return $.ajax({
                        type: "GET", url: "<?= base_url('/AsetBergerakAPI'); ?>", data: filter
                    }).done(data => {
                        $('#stat-total').text(data.length);
                        let totalStock = data.reduce((acc, curr) => acc + (parseInt(curr.ketersediaan) || 0), 0);
                        $('#stat-stock').text(totalStock.toLocaleString());
                    });
                },
                insertItem: (item) => $.ajax({
                    type: "POST", url: "<?= base_url('/AsetBergerakAPI'); ?>",
                    data: JSON.stringify(item), contentType: "application/json"
                }).done(() => toast('Berhasil menambah aset', 'success')),

                updateItem: (item) => $.ajax({
                    type: "PUT", url: "<?= base_url('/AsetBergerakAPI/update'); ?>",
                    data: JSON.stringify(item), contentType: "application/json"
                }).done(() => toast('Aset diperbarui', 'success')),

                deleteItem: (item) => $.ajax({
                    type: "DELETE", url: "<?= base_url('/AsetBergerakAPI/delete'); ?>",
                    data: JSON.stringify(item), contentType: "application/json"
                }).done(() => toast('Aset dihapus', 'success'))
            },

            fields: [
                { name: "kodebarang", title: "Kode", type: "text", width: 70, css: "font-weight-bold text-primary",
                  editTemplate: (val) => val },
                { name: "namabarang", title: "Nama Aset", type: "text", width: 150 },
                { 
                    name: "statusbarang", title: "Status", type: "select", width: 90,
                    items: [{Id: "Masuk", Name: "Masuk"}, {Id: "Keluar", Name: "Keluar"}],
                    valueField: "Id", textField: "Name",
                    itemTemplate: (val) => {
                        const isIn = val === 'Masuk';
                        return `<span class="badge-modern ${isIn ? 'badge-in' : 'badge-out'}">
                                    <i class="fas ${isIn ? 'fa-arrow-down' : 'fa-arrow-up'}"></i> ${val}
                                </span>`;
                    }
                },
                { name: "unit", title: "Unit", type: "select", width: 90, items: unitItems, valueField: "Id", textField: "Name" },
                { name: "lokasi", title: "Lokasi", type: "select", width: 110, items: lokasiItems, valueField: "Id", textField: "Name" },
                { name: "ketersediaan", title: "Stok", type: "number", width: 70, css: "text-right font-weight-bold" },
                { name: "tanggal", title: "Terakhir", type: "text", width: 100, 
                  itemTemplate: (val) => val ? moment(val).format('DD/MM/YY') : '-' },
                { type: "control", width: 80 }
            ]
        });
    }

    // ─── Search & Refresh ───
    let timer;
    $("#general-search").on("input", function() {
        clearTimeout(timer);
        timer = setTimeout(() => {
            $("#jsGrid1").jsGrid("loadData", { search: $(this).val() });
        }, 400);
    });

    $("#btn-refresh-grid").click(() => $("#jsGrid1").jsGrid("loadData"));
});
</script>
<?= $this->endSection(); ?>