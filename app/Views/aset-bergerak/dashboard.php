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
        background: linear-gradient(135deg, #1d976c 0%, #93f9b9 100%);
        color: #fff; padding: 25px; border-radius: 15px; margin-bottom: 25px;
        box-shadow: 0 10px 25px rgba(29, 151, 108, 0.15);
    }
    .btn-action { border-radius: 10px; padding: 10px 20px; font-weight: 700; transition: all 0.3s; }
    .btn-action:hover { transform: translateY(-3px); box-shadow: 0 5px 15px rgba(0,0,0,0.1); }

    /* ── Tab Styles ── */
    .nav-pills-custom .nav-link {
        color: #718096; background: #edf2f7; border-radius: 10px;
        margin-right: 10px; font-weight: 600; padding: 10px 20px;
    }
    .nav-pills-custom .nav-link.active {
        background: #1d976c !important; color: #fff !important;
        box-shadow: 0 4px 12px rgba(29, 151, 108, 0.3);
    }

    /* ── Table Styles ── */
    .table-custom thead th {
        background: #f8fafc; border-top: none; color: #64748b;
        text-transform: uppercase; font-size: 0.75rem; letter-spacing: 0.05em;
    }
    .badge-pill-custom { padding: 6px 12px; border-radius: 8px; font-weight: 700; font-size: 0.7rem; }

    /* ── Modal Styles ── */
    .modal-content { border-radius: 20px; border: none; }
    .modal-header-custom { border-radius: 20px 20px 0 0; padding: 20px; }
    .stock-badge-large { font-size: 2.5rem; font-weight: 800; display: block; margin: 10px 0; }

    /* ── Mobile Select2 Fix ── */
    .select2-container--open { z-index: 9999999 !important; }
    .select2-search__field { font-size: 16px !important; } /* Prevents iOS auto-zoom */
</style>
<?= $this->endSection(); ?>

<?= $this->section('content') ?>
<div class="container-fluid">
    
    <!-- 1. Header & Quick Stats -->
    <div class="dashboard-header d-flex flex-wrap align-items-center justify-content-between shadow">
        <div>
            <h2 class="font-weight-bold mb-1"><i class="fas fa-chart-line mr-2"></i>Dashboard <?= $title; ?></h2>
            <p class="mb-0 opacity-8">Pantau pergerakan stok dan kelola transaksi aset secara real-time.</p>
        </div>
        <div class="mt-3 mt-md-0">
            <button type="button" class="btn btn-light btn-action mr-2 text-success shadow-sm" data-toggle="modal" data-target="#modal-masuk">
                <i class="fas fa-plus-circle mr-1"></i> Transaksi Masuk
            </button>
            <button type="button" class="btn btn-danger btn-action shadow-sm" data-toggle="modal" data-target="#modal-keluar">
                <i class="fas fa-minus-circle mr-1"></i> Transaksi Keluar
            </button>
        </div>
    </div>

    <!-- 2. Main Tabbed Content -->
    <div class="card border-0 shadow-sm" style="border-radius: 15px;">
        <div class="card-body p-4">
            <ul class="nav nav-pills nav-pills-custom mb-4" id="pills-tab" role="tablist">
                <li class="nav-item">
                    <a class="nav-link active" id="pills-history-tab" data-toggle="tab" href="#pills-history" role="tab"><i class="fas fa-history mr-2"></i>Riwayat Transaksi</a>
                </li>
                <li class="nav-item">
                    <a class="nav-link" id="pills-stock-tab" data-toggle="tab" href="#pills-stock" role="tab"><i class="fas fa-boxes mr-2"></i>Stok Inventaris</a>
                </li>
            </ul>

            <div class="tab-content" id="pills-tabContent">
                <!-- Tab: History -->
                <div class="tab-pane fade show active" id="pills-history" role="tabpanel">
                    <div class="table-responsive">
                        <table class="table table-custom w-100" id="dataTable1">
                            <thead>
                                <tr>
                                    <th>Kode</th>
                                    <th>Aset</th>
                                    <th>Status</th>
                                    <th>Jumlah</th>
                                    <th>Sisa Stok</th>
                                    <th>PIC</th>
                                    <th>Tujuan/Asal</th>
                                    <th>Lokasi</th>
                                    <th>Tanggal</th>
                                </tr>
                            </thead>
                            <tbody>
                                <?php foreach ($asetBergerakLog as $log) : ?>
                                    <tr>
                                        <td class="font-weight-bold text-primary"><?= $log['kode']; ?></td>
                                        <td>
                                            <div class="font-weight-bold"><?= $log['namabarang']; ?></div>
                                            <small class="text-muted"><?= $log['merk']; ?> - <?= $log['tipebarang']; ?></small>
                                        </td>
                                        <td>
                                            <span class="badge-pill-custom badge-<?= $log['statusbarang'] == 'Masuk' ? 'success' : 'danger'; ?>">
                                                <i class="fas fa-<?= $log['statusbarang'] == 'Masuk' ? 'arrow-down' : 'arrow-up'; ?> mr-1"></i>
                                                <?= $log['statusbarang']; ?>
                                            </span>
                                        </td>
                                        <td class="text-center font-weight-bold"><?= $log['jumlah']; ?></td>
                                        <td class="text-center"><?= $log['ketersediaan']; ?></td>
                                        <td><?= $log['pic']; ?></td>
                                        <td><?= $log['statusbarang'] == 'Masuk' ? $log['dari'] : $log['tujuan']; ?></td>
                                        <td><span class="text-muted"><i class="fas fa-map-marker-alt mr-1"></i><?= $log['namaruang']; ?></span></td>
                                        <td data-order="<?= $log['tanggal']; ?>"><?= date('d/m/Y', strtotime($log['tanggal'])); ?></td>
                                    </tr>
                                <?php endforeach; ?>
                            </tbody>
                        </table>
                    </div>
                </div>

                <!-- Tab: Stock -->
                <div class="tab-pane fade" id="pills-stock" role="tabpanel">
                    <div class="table-responsive">
                        <table class="table table-custom w-100" id="table-detail">
                            <thead>
                                <tr>
                                    <th>Kode</th>
                                    <th>Nama Aset</th>
                                    <th>Merk/Tipe</th>
                                    <th>Total Stok</th>
                                    <th>Lokasi</th>
                                    <th>Keterangan</th>
                                </tr>
                            </thead>
                            <tbody>
                                <?php foreach ($asetBergerakStock as $stock) : ?>
                                    <tr>
                                        <td class="font-weight-bold text-primary"><?= $stock['kodebarang']; ?></td>
                                        <td class="font-weight-bold"><?= $stock['namabarang']; ?></td>
                                        <td><?= $stock['merk']; ?> / <?= $stock['tipebarang']; ?></td>
                                        <td class="text-center"><span class="h5 font-weight-bold text-dark"><?= $stock['ketersediaan']; ?></span></td>
                                        <td><i class="fas fa-door-open mr-1 text-muted"></i><?= $stock['namaruang']; ?></td>
                                        <td><small class="text-muted"><?= $stock['keterangan'] ?: '-'; ?></small></td>
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

<!-- Modal: Transaksi Masuk -->
<div class="modal fade" id="modal-masuk" role="dialog" data-focus="false">
    <div class="modal-dialog modal-dialog-centered modal-lg">
        <div class="modal-content shadow-lg">
            <form id="form-aset-bergerak-masuk">
                <div class="modal-header-custom bg-success text-white">
                    <h5 class="modal-title font-weight-bold"><i class="fas fa-plus-circle mr-2"></i>Transaksi Aset Masuk</h5>
                    <button type="button" class="close text-white" data-dismiss="modal">&times;</button>
                </div>
                <div class="modal-body p-4">
                    <div class="row align-items-center mb-4 bg-light p-3 rounded-lg">
                        <div class="col-md-4 text-center">
                            <small class="text-muted text-uppercase font-weight-bold">Stok Saat Ini</small>
                            <span class="stock-badge-large text-primary" id="stock">--</span>
                        </div>
                        <div class="col-md-8 border-left">
                            <label class="font-weight-bold">Pilih Aset*</label>
                            <select class="form-control select2" id="kode-masuk" name="kode" required style="width: 100%;"></select>
                        </div>
                    </div>
                    <div class="row">
                        <div class="col-md-6 form-group">
                            <label>Jumlah Masuk*</label>
                            <input type="number" name="jumlah" class="form-control form-control-lg" placeholder="0" required min="1">
                        </div>
                        <div class="col-md-6 form-group">
                            <label>Penyalur/Vendor*</label>
                            <input type="text" name="dari" class="form-control form-control-lg text-uppercase" placeholder="Nama Vendor" required>
                        </div>
                    </div>
                    <div class="form-group">
                        <label>PIC (Penanggung Jawab)*</label>
                        <input type="text" name="pic" class="form-control text-uppercase" placeholder="Nama Lengkap" required>
                    </div>
                    <div class="form-group">
                        <label>Keterangan Tambahan</label>
                        <textarea name="keterangan" class="form-control" rows="2" placeholder="Catatan transaksi..."></textarea>
                    </div>
                </div>
                <div class="modal-footer border-0 p-4">
                    <button type="button" class="btn btn-light rounded-pill px-4" data-dismiss="modal">Batal</button>
                    <button type="submit" class="btn btn-success rounded-pill px-5 font-weight-bold shadow">SIMPAN TRANSAKSI</button>
                </div>
            </form>
        </div>
    </div>
</div>

<!-- Modal: Transaksi Keluar -->
<div class="modal fade" id="modal-keluar" role="dialog" data-focus="false">
    <div class="modal-dialog modal-dialog-centered modal-lg">
        <div class="modal-content shadow-lg">
            <form id="form-aset-bergerak-keluar">
                <div class="modal-header-custom bg-danger text-white">
                    <h5 class="modal-title font-weight-bold"><i class="fas fa-minus-circle mr-2"></i>Transaksi Aset Keluar</h5>
                    <button type="button" class="close text-white" data-dismiss="modal">&times;</button>
                </div>
                <div class="modal-body p-4">
                    <div class="row align-items-center mb-4 bg-light p-3 rounded-lg">
                        <div class="col-md-4 text-center">
                            <small class="text-muted text-uppercase font-weight-bold">Stok Tersedia</small>
                            <span class="stock-badge-large text-danger" id="stock-keluar">--</span>
                        </div>
                        <div class="col-md-8 border-left">
                            <label class="font-weight-bold">Pilih Aset*</label>
                            <select class="form-control select2" id="kode-keluar" name="kode" required style="width: 100%;"></select>
                        </div>
                    </div>
                    <div class="row">
                        <div class="col-md-6 form-group">
                            <label>Jumlah Keluar*</label>
                            <input type="number" id="jumlah-keluar" name="jumlah" class="form-control form-control-lg" placeholder="0" required min="1">
                        </div>
                        <div class="col-md-6 form-group">
                            <label>Penerima*</label>
                            <input type="text" name="tujuan" class="form-control form-control-lg text-uppercase" placeholder="Nama Penerima" required>
                        </div>
                    </div>
                    <div class="form-group">
                        <label>PIC (Penanggung Jawab)*</label>
                        <input type="text" name="pic" class="form-control text-uppercase" placeholder="Nama Lengkap" required>
                    </div>
                    <div class="form-group">
                        <label>Keterangan Tambahan</label>
                        <textarea name="keterangan" class="form-control" rows="2" placeholder="Tujuan pengeluaran..."></textarea>
                    </div>
                </div>
                <div class="modal-footer border-0 p-4">
                    <button type="button" class="btn btn-light rounded-pill px-4" data-dismiss="modal">Batal</button>
                    <button type="submit" id="btn-submit-keluar" class="btn btn-danger rounded-pill px-5 font-weight-bold shadow">PROSES KELUAR</button>
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
    // 1. DataTables Localization & Init
    const dtLang = {
        emptyTable: "Belum ada data",
        info: "Menampilkan _START_ s/d _END_ dari _TOTAL_ data",
        paginate: { next: "<i class='fas fa-chevron-right'></i>", previous: "<i class='fas fa-chevron-left'></i>" },
        search: "Cari Data:"
    };

    $('#dataTable1').DataTable({
        responsive: true,
        language: dtLang,
        order: [[8, 'desc']] // Urutkan berdasarkan kolom Tanggal (data-order)
    });

    $('#table-detail').DataTable({
        responsive: true,
        language: dtLang,
        order: [[0, 'asc']] // Urutkan berdasarkan Kode (kolom 1)
    });

    // 2. Select2 Shared Config
    const initSelect2 = (id, stockLabelId, btnSubmitId) => {
        $(id).select2({
            placeholder: "Ketikan kode / nama aset...",
            allowClear: true,
            ajax: {
                url: '<?= base_url('master-aset/search-last-code'); ?>',
                dataType: 'json',
                delay: 250,
                data: params => ({ search: params.term, type: 'Aset Bergerak' }),
                processResults: data => data,
                cache: false
            },
            minimumInputLength: 1
        }).on("select2:select", function(e) {
            const kode = e.params.data.id;
            $.ajax({
                type: "GET",
                url: "<?= base_url('AsetBergerakAPI'); ?>/" + kode,
                dataType: 'json',
                success: function(data) {
                    const stock = data ? data.ketersediaan : 0;
                    $(stockLabelId).text(stock);
                
                    // Extra logic for pengeluaran
                    if (btnSubmitId) {
                        if (parseInt(stock) === 0) {
                            $(btnSubmitId).prop('disabled', true);
                            Swal.fire('Stok Kosong', 'Aset tidak dapat dikeluarkan.', 'error');
                        } else {
                            $(btnSubmitId).prop('disabled', false);
                            $('#jumlah-keluar').attr('max', stock);
                        }
                    }
                },
                error: function() {
                    $(stockLabelId).text('0');
                }
            });
        });
    };

    initSelect2('#kode-masuk', '#stock');
    initSelect2('#kode-keluar', '#stock-keluar', '#btn-submit-keluar');

    // 3. Form Submissions
    const handleForm = (formId, modalId, status) => {
        $(formId).submit(function(e) {
            e.preventDefault();
            let formData = $(this).serialize() + `&statusbarang=${status}`;
            
            // Append current stock for validation
            const currentStock = status === 'Masuk' ? $('#stock').text() : $('#stock-keluar').text();
            formData += `&stock=${currentStock}`;

            $.ajax({
                type: "POST",
                url: "<?= base_url('/aset-bergerak/transaksi'); ?>",
                data: formData,
                success: (res) => {
                    $(modalId).modal('hide');
                    Swal.fire('Berhasil', res.msg, 'success').then(() => location.reload());
                },
                error: (err) => Swal.fire('Gagal', err.responseText, 'error')
            });
        });
    };

    handleForm("#form-aset-bergerak-masuk", "#modal-masuk", "Masuk");
    handleForm("#form-aset-bergerak-keluar", "#modal-keluar", "Keluar");
});
</script>
<?= $this->endSection(); ?>