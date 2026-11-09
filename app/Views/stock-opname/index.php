<?= $this->extend('default') ?>

<?= $this->section('page_title'); ?>Stock Opname<?= $this->endSection(); ?>
<?= $this->section('context'); ?>Stock Opname<?= $this->endSection(); ?>

<?= $this->section('css') ?>
<link rel="stylesheet" href="<?= base_url('adminLTE/plugins/datatables-bs4/css/dataTables.bootstrap4.min.css'); ?>">
<link rel="stylesheet" href="<?= base_url('adminLTE/plugins/datatables-responsive/css/responsive.bootstrap4.min.css'); ?>">
<style>
    .metric-card {
        border-radius: 16px;
        border: none;
        box-shadow: 0 4px 20px rgba(0,0,0,0.04);
        transition: transform 0.2s, box-shadow 0.2s;
    }
    .metric-card:hover {
        transform: translateY(-2px);
        box-shadow: 0 8px 25px rgba(0,0,0,0.08);
    }
</style>
<?= $this->endSection() ?>

<?= $this->section('content') ?>
<div class="container-fluid">

    <!-- Header & Action -->
    <div class="d-flex justify-content-between align-items-center mb-4">
        <div>
            <h3 class="font-weight-bold text-dark mb-1">
                <i class="fas fa-clipboard-check text-primary mr-2"></i>Stock Opname Aset
            </h3>
            <p class="text-muted mb-0">Manajemen pencocokan fisik inventaris dan penyesuaian stok berkala.</p>
        </div>
        <div class="d-flex">
            <a href="<?= base_url('stock-opname/download-template'); ?>" class="btn btn-outline-primary rounded-pill px-4 mr-2 shadow-sm font-weight-bold">
                <i class="fas fa-file-excel mr-2"></i> Download Template Excel
            </a>
            <a href="<?= base_url('stock-opname/create'); ?>" class="btn btn-primary rounded-pill px-4 shadow-sm font-weight-bold" style="background: linear-gradient(135deg, #2563eb 0%, #1d4ed8 100%);">
                <i class="fas fa-plus-circle mr-2"></i> Mulai Opname Baru
            </a>
        </div>
    </div>

    <!-- Quick Stats -->
    <div class="row mb-4">
        <div class="col-md-4">
            <div class="card metric-card bg-white p-4">
                <div class="d-flex align-items-center">
                    <div class="rounded-circle p-3 mr-3" style="background: #eff6ff; color: #2563eb; width: 60px; height: 60px; display: flex; align-items: center; justify-content: center;">
                        <i class="fas fa-history fa-2x"></i>
                    </div>
                    <div>
                        <small class="text-muted font-weight-bold text-uppercase">Total Sesi Opname</small>
                        <h3 class="font-weight-bold text-dark mb-0"><?= $totalOpname; ?></h3>
                    </div>
                </div>
            </div>
        </div>
        <div class="col-md-4">
            <div class="card metric-card bg-white p-4">
                <div class="d-flex align-items-center">
                    <div class="rounded-circle p-3 mr-3" style="background: #f0fdf4; color: #16a34a; width: 60px; height: 60px; display: flex; align-items: center; justify-content: center;">
                        <i class="fas fa-calendar-check fa-2x"></i>
                    </div>
                    <div>
                        <small class="text-muted font-weight-bold text-uppercase">Opname Terakhir</small>
                        <h4 class="font-weight-bold text-dark mb-0">
                            <?= $lastOpname !== '-' ? date('d M Y', strtotime($lastOpname)) : 'Belum Ada'; ?>
                        </h4>
                    </div>
                </div>
            </div>
        </div>
        <div class="col-md-4">
            <div class="card metric-card bg-white p-4">
                <div class="d-flex align-items-center">
                    <div class="rounded-circle p-3 mr-3" style="background: #faf5ff; color: #9333ea; width: 60px; height: 60px; display: flex; align-items: center; justify-content: center;">
                        <i class="fas fa-check-double fa-2x"></i>
                    </div>
                    <div>
                        <small class="text-muted font-weight-bold text-uppercase">Pencocokan Data</small>
                        <h4 class="font-weight-bold text-dark mb-0">Berbasis Nama Barang</h4>
                    </div>
                </div>
            </div>
        </div>
    </div>

    <!-- Tabel Riwayat Sesi Opname -->
    <div class="card metric-card bg-white mb-4">
        <div class="card-header bg-white border-0 pt-4 px-4 pb-0 d-flex justify-content-between align-items-center">
            <h5 class="font-weight-bold text-dark mb-0">Riwayat Berita Acara Stock Opname</h5>
            <span class="badge badge-light px-3 py-2 text-muted font-weight-normal border">Total <?= count($opnameList); ?> Riwayat</span>
        </div>
        <div class="card-body p-4">
            <div class="table-responsive">
                <table id="tableOpname" class="table table-hover align-middle">
                    <thead class="thead-light">
                        <tr>
                            <th class="text-center" style="width: 50px;">NO</th>
                            <th>KODE OPNAME</th>
                            <th>TANGGAL</th>
                            <th>PETUGAS (PIC)</th>
                            <th>LOKASI RUANG</th>
                            <th class="text-center">TOTAL BARANG</th>
                            <th class="text-center">STATUS SELISIH</th>
                            <th class="text-center" style="width: 120px;">AKSI</th>
                        </tr>
                    </thead>
                    <tbody>
                        <?php if (empty($opnameList)): ?>
                            <tr>
                                <td colspan="8" class="text-center py-5 text-muted">
                                    <i class="fas fa-clipboard-list fa-3x mb-3 text-muted d-block opacity-50"></i>
                                    Belum ada sesi Stock Opname yang tercatat.<br>
                                    <a href="<?= base_url('stock-opname/create'); ?>" class="btn btn-sm btn-primary mt-2 rounded-pill px-3">
                                        Mulai Stock Opname Pertama
                                    </a>
                                </td>
                            </tr>
                        <?php else: ?>
                            <?php foreach ($opnameList as $i => $row): ?>
                                <tr>
                                    <td class="text-center font-weight-bold text-muted"><?= $i + 1; ?></td>
                                    <td>
                                        <span class="font-weight-bold text-primary"><?= esc($row['kode_opname']); ?></span>
                                    </td>
                                    <td>
                                        <i class="far fa-calendar-alt text-muted mr-1"></i>
                                        <?= date('d/m/Y', strtotime($row['tanggal_opname'])); ?>
                                    </td>
                                    <td>
                                        <i class="far fa-user text-muted mr-1"></i>
                                        <?= esc($row['petugas']); ?>
                                    </td>
                                    <td>
                                        <span class="badge badge-secondary px-2 py-1"><?= esc($row['lokasi']); ?></span>
                                    </td>
                                    <td class="text-center font-weight-bold">
                                        <?= number_format($row['total_item']); ?> Item
                                    </td>
                                    <td class="text-center">
                                        <?php if ((int)$row['total_selisih'] == 0): ?>
                                            <span class="badge badge-success px-3 py-1 font-weight-bold">
                                                <i class="fas fa-check-circle mr-1"></i> Cocok (0)
                                            </span>
                                        <?php else: ?>
                                            <span class="badge badge-warning px-3 py-1 font-weight-bold text-dark">
                                                <i class="fas fa-exclamation-triangle mr-1"></i> Selisih (<?= number_format($row['total_selisih']); ?>)
                                            </span>
                                        <?php endif; ?>
                                    </td>
                                    <td class="text-center">
                                        <a href="<?= base_url('stock-opname/detail/' . $row['id']); ?>" class="btn btn-sm btn-outline-info rounded-pill px-3 shadow-none">
                                            <i class="fas fa-eye mr-1"></i> Rincian
                                        </a>
                                    </td>
                                </tr>
                            <?php endforeach; ?>
                        <?php endif; ?>
                    </tbody>
                </table>
            </div>
        </div>
    </div>

</div>
<?= $this->endSection() ?>

<?= $this->section('script') ?>
<script src="<?= base_url('adminLTE/plugins/datatables/jquery.dataTables.min.js'); ?>"></script>
<script src="<?= base_url('adminLTE/plugins/datatables-bs4/js/dataTables.bootstrap4.min.js'); ?>"></script>
<script>
    $(document).ready(function() {
        $('#tableOpname').DataTable({
            "responsive": true,
            "autoWidth": false,
            "language": {
                "search": "Cari Riwayat:",
                "lengthMenu": "Tampilkan _MENU_ data",
                "info": "Menampilkan _START_ s/d _END_ dari _TOTAL_ sesi",
                "paginate": {
                    "first": "Awal",
                    "last": "Akhir",
                    "next": "›",
                    "previous": "‹"
                }
            }
        });
    });
</script>
<?= $this->endSection() ?>

