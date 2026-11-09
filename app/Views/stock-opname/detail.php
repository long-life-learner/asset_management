<?= $this->extend('default') ?>

<?= $this->section('page_title'); ?>Detail Stock Opname - <?= esc($opname['kode_opname']); ?><?= $this->endSection(); ?>
<?= $this->section('context'); ?>Detail Stock Opname<?= $this->endSection(); ?>

<?= $this->section('css') ?>
<link rel="stylesheet" href="<?= base_url('adminLTE/plugins/datatables-bs4/css/dataTables.bootstrap4.min.css'); ?>">
<style>
    .detail-card {
        border-radius: 16px;
        border: none;
        box-shadow: 0 4px 25px rgba(0,0,0,0.05);
    }
    @media print {
        .no-print { display: none !important; }
        .main-sidebar, .main-header, .main-footer { display: none !important; }
        .content-wrapper { margin-left: 0 !important; padding: 0 !important; background: #fff !important; }
        .card { box-shadow: none !important; border: 1px solid #ddd !important; }
    }
</style>
<?= $this->endSection() ?>

<?= $this->section('content') ?>
<div class="container-fluid">

    <!-- Top Action Bar (No Print) -->
    <div class="d-flex justify-content-between align-items-center mb-4 no-print">
        <div>
            <a href="<?= base_url('stock-opname'); ?>" class="btn btn-outline-secondary rounded-pill px-4 mr-2">
                <i class="fas fa-arrow-left mr-1"></i> Kembali ke Daftar
            </a>
            <span class="text-muted">Nomor Sesi: <strong class="text-dark"><?= esc($opname['kode_opname']); ?></strong></span>
        </div>
        <div>
            <button onclick="window.print()" class="btn btn-outline-dark rounded-pill px-4 shadow-sm mr-2">
                <i class="fas fa-print mr-1"></i> Cetak Berita Acara
            </button>
            <a href="<?= base_url('stock-opname/create'); ?>" class="btn btn-primary rounded-pill px-4 shadow-sm font-weight-bold">
                <i class="fas fa-plus mr-1"></i> Opname Baru
            </a>
        </div>
    </div>

    <!-- Header Dokumen Berita Acara -->
    <div class="card detail-card bg-white mb-4">
        <div class="card-body p-4">
            <div class="row align-items-center border-bottom pb-3 mb-3">
                <div class="col-sm-8">
                    <h4 class="font-weight-bold text-dark mb-1">
                        BERITA ACARA HASIL STOCK OPNAME
                    </h4>
                    <p class="text-muted mb-0">Politeknik Gajah Tunggal &mdash; Sistem Manajemen Aset & Inventaris</p>
                </div>
                <div class="col-sm-4 text-sm-right mt-2 mt-sm-0">
                    <span class="badge badge-primary px-3 py-2 font-weight-bold" style="font-size: 0.95rem; border-radius: 8px;">
                        <?= esc($opname['kode_opname']); ?>
                    </span>
                </div>
            </div>

            <div class="row text-sm">
                <div class="col-md-3 col-6 mb-2">
                    <small class="text-muted d-block font-weight-bold text-uppercase">Tanggal Pelaksanaan</small>
                    <span class="font-weight-bold text-dark">
                        <i class="far fa-calendar-alt text-primary mr-1"></i>
                        <?= date('d F Y', strtotime($opname['tanggal_opname'])); ?>
                    </span>
                </div>
                <div class="col-md-3 col-6 mb-2">
                    <small class="text-muted d-block font-weight-bold text-uppercase">Petugas Penanggung Jawab</small>
                    <span class="font-weight-bold text-dark">
                        <i class="far fa-user text-primary mr-1"></i>
                        <?= esc($opname['petugas']); ?>
                    </span>
                </div>
                <div class="col-md-3 col-6 mb-2">
                    <small class="text-muted d-block font-weight-bold text-uppercase">Lokasi / Ruang</small>
                    <span class="font-weight-bold text-dark">
                        <i class="fas fa-map-marker-alt text-primary mr-1"></i>
                        <?= esc($opname['lokasi']); ?>
                    </span>
                </div>
                <div class="col-md-3 col-6 mb-2">
                    <small class="text-muted d-block font-weight-bold text-uppercase">Status Rekonsiliasi</small>
                    <?php if ((int)$opname['total_selisih'] == 0): ?>
                        <span class="badge badge-success px-3 py-1 font-weight-bold">
                            <i class="fas fa-check mr-1"></i> Stok Cocok 100%
                        </span>
                    <?php else: ?>
                        <span class="badge badge-warning px-3 py-1 font-weight-bold text-dark">
                            <i class="fas fa-exclamation-triangle mr-1"></i> Terdapat Selisih Fisik
                        </span>
                    <?php endif; ?>
                </div>
                <?php if (!empty($opname['keterangan'])): ?>
                    <div class="col-12 mt-2 pt-2 border-top">
                        <small class="text-muted d-block font-weight-bold text-uppercase">Keterangan / Catatan Tambahan</small>
                        <span class="text-secondary"><?= esc($opname['keterangan']); ?></span>
                    </div>
                <?php endif; ?>
            </div>
        </div>
    </div>

    <!-- Statistik Ringkas Rekonsiliasi -->
    <div class="row mb-4">
        <div class="col-md-3 col-6 mb-2">
            <div class="card detail-card bg-white p-3 text-center border">
                <small class="text-muted font-weight-bold text-uppercase">Total Barang Dicek</small>
                <h3 class="font-weight-bold text-dark mb-0"><?= number_format($opname['total_item']); ?></h3>
            </div>
        </div>
        <div class="col-md-3 col-6 mb-2">
            <div class="card detail-card bg-white p-3 text-center border">
                <small class="text-success font-weight-bold text-uppercase">Stok Fisik Cocok</small>
                <h3 class="font-weight-bold text-success mb-0"><?= number_format($cocokCount); ?></h3>
            </div>
        </div>
        <div class="col-md-3 col-6 mb-2">
            <div class="card detail-card bg-white p-3 text-center border">
                <small class="text-warning font-weight-bold text-uppercase">Surplus / Lebih (+)</small>
                <h3 class="font-weight-bold text-warning mb-0"><?= number_format($surplusCount); ?></h3>
            </div>
        </div>
        <div class="col-md-3 col-6 mb-2">
            <div class="card detail-card bg-white p-3 text-center border">
                <small class="text-danger font-weight-bold text-uppercase">Defisit / Kurang (-)</small>
                <h3 class="font-weight-bold text-danger mb-0"><?= number_format($defisitCount); ?></h3>
            </div>
        </div>
    </div>

    <!-- Tabel Rincian Barang -->
    <div class="card detail-card bg-white mb-4">
        <div class="card-header bg-white border-0 pt-4 px-4 pb-0 d-flex justify-content-between align-items-center">
            <h5 class="font-weight-bold text-dark mb-0">Rincian Komparasi Stok Fisik vs Sistem</h5>
            <div class="no-print">
                <span class="badge badge-light px-3 py-2 border text-muted">Total <?= count($details); ?> Item</span>
            </div>
        </div>
        <div class="card-body p-4">
            <div class="table-responsive">
                <table id="tableDetailOpname" class="table table-hover align-middle">
                    <thead class="thead-light">
                        <tr>
                            <th class="text-center" style="width: 50px;">NO</th>
                            <th>NAMA BARANG</th>
                            <th class="text-center">KODE</th>
                            <th class="text-center">SATUAN</th>
                            <th class="text-center">LOKASI</th>
                            <th class="text-right">STOK SISTEM</th>
                            <th class="text-right" style="background: #eff6ff;">STOK FISIK</th>
                            <th class="text-center">SELISIH</th>
                            <th>KETERANGAN / KONDISI</th>
                        </tr>
                    </thead>
                    <tbody>
                        <?php foreach ($details as $idx => $d): ?>
                            <tr>
                                <td class="text-center text-muted"><?= $idx + 1; ?></td>
                                <td>
                                    <span class="font-weight-bold text-dark"><?= esc($d['namabarang']); ?></span>
                                </td>
                                <td class="text-center text-muted small"><?= esc($d['kodebarang']); ?></td>
                                <td class="text-center text-muted small"><?= esc($d['unit']); ?></td>
                                <td class="text-center small"><?= esc($d['lokasi']); ?></td>
                                <td class="text-right font-weight-bold text-secondary"><?= number_format($d['stok_sistem']); ?></td>
                                <td class="text-right font-weight-bold text-primary" style="background: #f8fafc;"><?= number_format($d['stok_fisik']); ?></td>
                                <td class="text-center">
                                    <?php if ($d['selisih'] == 0): ?>
                                        <span class="badge badge-success px-2 py-1">0</span>
                                    <?php elseif ($d['selisih'] > 0): ?>
                                        <span class="badge badge-warning px-2 py-1 text-dark">+<?= number_format($d['selisih']); ?></span>
                                    <?php else: ?>
                                        <span class="badge badge-danger px-2 py-1"><?= number_format($d['selisih']); ?></span>
                                    <?php endif; ?>
                                </td>
                                <td>
                                    <span class="small text-muted"><?= esc($d['keterangan'] ?: '-'); ?></span>
                                </td>
                            </tr>
                        <?php endforeach; ?>
                    </tbody>
                </table>
            </div>

            <!-- Tanda Tangan Berita Acara (Khusus Print) -->
            <div class="row mt-5 pt-4 d-none d-print-flex">
                <div class="col-6 text-center">
                    <p class="mb-5">Mengetahui,<br><strong>Kepala Bagian Umum &amp; Logistik</strong></p>
                    <br><br>
                    <p class="font-weight-bold mb-0"><u>(___________________________)</u><br>NIP. </p>
                </div>
                <div class="col-6 text-center">
                    <p class="mb-5">Tangerang, <?= date('d F Y', strtotime($opname['tanggal_opname'])); ?><br><strong>Petugas Pelaksana Opname</strong></p>
                    <br><br>
                    <p class="font-weight-bold mb-0"><u>( <?= esc($opname['petugas']); ?> )</u><br>Penanggung Jawab</p>
                </div>
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
        $('#tableDetailOpname').DataTable({
            "responsive": true,
            "autoWidth": false,
            "pageLength": 50,
            "lengthMenu": [25, 50, 100, 250, 500],
            "language": {
                "search": "Cari Barang:",
                "lengthMenu": "Tampilkan _MENU_ barang",
                "info": "Menampilkan _START_ s/d _END_ dari _TOTAL_ barang",
                "paginate": { "next": "›", "previous": "‹" }
            }
        });
    });
</script>
<?= $this->endSection() ?>

