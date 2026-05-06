<?= $this->extend('default') ?>

<?= $this->section('page_title'); ?>
<?= $title; ?>
<?= $this->endSection(); ?>

<?= $this->section('context'); ?>
<?= $title; ?>
<?= $this->endSection(); ?>

<?= $this->section('css'); ?>
<style>
    /* ── Root Styles ── */
    :root {
        --glass-blue: rgba(59, 130, 246, 0.1);
        --glass-green: rgba(34, 197, 94, 0.1);
        --glass-red: rgba(239, 68, 68, 0.1);
    }

    .content-wrapper { background: #f8fafc !important; }

    /* ── Premium Stat Cards ── */
    .stat-card-premium {
        background: #fff; border: none; border-radius: 20px;
        padding: 30px; position: relative; overflow: hidden;
        transition: all 0.3s cubic-bezier(0.4, 0, 0.2, 1);
        box-shadow: 0 4px 6px -1px rgba(0,0,0,0.02), 0 2px 4px -1px rgba(0,0,0,0.01);
    }
    .stat-card-premium:hover {
        transform: translateY(-10px);
        box-shadow: 0 20px 25px -5px rgba(0,0,0,0.1), 0 10px 10px -5px rgba(0,0,0,0.04);
    }
    .stat-card-premium .icon-box {
        width: 60px; height: 60px; border-radius: 15px;
        display: flex; align-items: center; justify-content: center;
        font-size: 1.8rem; margin-bottom: 20px;
    }
    .bg-soft-red { background: var(--glass-red); color: #ef4444; }
    .bg-soft-green { background: var(--glass-green); color: #22c55e; }
    .bg-soft-blue { background: var(--glass-blue); color: #3b82f6; }
    
    .stat-val { font-size: 2.5rem; font-weight: 800; line-height: 1; margin-bottom: 5px; }
    .stat-label { color: #64748b; font-weight: 600; text-transform: uppercase; font-size: 0.75rem; letter-spacing: 0.05em; }

    /* ── Chart Container ── */
    .chart-box-premium {
        background: #fff; border-radius: 25px; padding: 30px;
        box-shadow: 0 10px 15px -3px rgba(0,0,0,0.05);
        border: 1px solid #f1f5f9; margin-bottom: 30px;
    }

    /* ── Table Cards ── */
    .list-card-premium {
        background: #fff; border-radius: 20px; border: none;
        box-shadow: 0 4px 6px rgba(0,0,0,0.03); margin-bottom: 30px;
    }
    .list-card-header {
        padding: 25px 30px; border-bottom: 1px solid #f1f5f9;
        display: flex; align-items: center; justify-content: space-between;
    }
    .list-card-header h3 { font-size: 1.1rem; font-weight: 800; margin: 0; color: #1e293b; }
    
    .table-clean th { 
        background: #f8fafc; border: none; color: #64748b; 
        font-size: 0.7rem; text-transform: uppercase; padding: 15px 20px !important;
    }
    .table-clean td { padding: 18px 20px !important; border-bottom: 1px solid #f8fafc; vertical-align: middle !important; }

    /* ── Badges ── */
    .badge-premium { padding: 6px 12px; border-radius: 8px; font-weight: 700; font-size: 0.7rem; }
    
</style>
<?= $this->endSection(); ?>

<?= $this->section('content') ?>
<div class="container-fluid py-4">
    
    <!-- 1. Top Statistics -->
    <div class="row mb-4">
        <div class="col-lg-4 mb-4">
            <div class="stat-card-premium h-100" data-toggle="modal" data-target="#modal-transaksi-keluar-today" style="cursor:pointer">
                <div class="icon-box bg-soft-red"><i class="fas fa-arrow-circle-up"></i></div>
                <div class="stat-val text-danger"><?= $today_out; ?></div>
                <div class="stat-label text-uppercase">Keluar Hari Ini</div>
                <div class="mt-3 text-sm text-muted">Klik untuk melihat detail <i class="fas fa-chevron-right ml-1"></i></div>
            </div>
        </div>
        <div class="col-lg-4 mb-4">
            <div class="stat-card-premium h-100" data-toggle="modal" data-target="#modal-transaksi-masuk-today" style="cursor:pointer">
                <div class="icon-box bg-soft-green"><i class="fas fa-arrow-circle-down"></i></div>
                <div class="stat-val text-success"><?= $today_in; ?></div>
                <div class="stat-label text-uppercase">Masuk Hari Ini</div>
                <div class="mt-3 text-sm text-muted">Klik untuk melihat detail <i class="fas fa-chevron-right ml-1"></i></div>
            </div>
        </div>
        <div class="col-lg-4 mb-4">
            <div class="stat-card-premium h-100" data-toggle="modal" data-target="#modal-stok-0" style="cursor:pointer">
                <div class="icon-box bg-soft-blue"><i class="fas fa-exclamation-triangle"></i></div>
                <div class="stat-val text-primary"><?= $stok_0; ?></div>
                <div class="stat-label text-uppercase">Stok Kosong</div>
                <div class="mt-3 text-sm text-muted">Klik untuk restock <i class="fas fa-chevron-right ml-1"></i></div>
            </div>
        </div>
    </div>

    <!-- 2. Main Analytics Chart -->
    <div class="chart-box-premium">
        <div class="d-flex align-items-center justify-content-between mb-4">
            <div>
                <h3 class="h5 font-weight-bold mb-1">Analisis Pergerakan Stok</h3>
                <p class="text-muted small mb-0">Milestone keseluruhan inventaris dalam periode waktu tertentu.</p>
            </div>
            <div class="dropdown">
                <button class="btn btn-light btn-sm rounded-pill px-3 shadow-sm" type="button" data-toggle="dropdown">
                    <i class="fas fa-ellipsis-v"></i>
                </button>
            </div>
        </div>
        <div id="weekly-Stok-moves-container" style="height: 450px;"></div>
    </div>

    <!-- 3. Advanced Insights Grid -->
    <div class="row mt-5">
        <!-- Low Stock Items -->
        <div class="col-lg-6">
            <div class="list-card-premium h-100">
                <div class="list-card-header">
                    <h3><i class="fas fa-battery-quarter text-danger mr-2"></i>Top 10 Stok Terendah</h3>
                    <span class="badge badge-danger rounded-pill">Urgent</span>
                </div>
                <div class="table-responsive">
                    <table class="table table-clean">
                        <thead>
                            <tr>
                                <th>Aset</th>
                                <th>Lokasi</th>
                                <th>Sisa Stok</th>
                            </tr>
                        </thead>
                        <tbody>
                            <?php foreach ($top_less_stock as $p) : ?>
                                <tr>
                                    <td>
                                        <div class="font-weight-bold"><?= $p['namabarang']; ?></div>
                                        <small class="text-muted"><?= $p['kodebarang']; ?></small>
                                    </td>
                                    <td><i class="fas fa-map-marker-alt mr-1 text-muted"></i><?= $p['namaruang']; ?></td>
                                    <td><span class="badge-premium bg-soft-red"><?= $p['ketersediaan']; ?> <?= $p['unit']; ?></span></td>
                                </tr>
                            <?php endforeach; ?>
                        </tbody>
                    </table>
                </div>
            </div>
        </div>

        <!-- Most Active Locations -->
        <div class="col-lg-6">
            <div class="list-card-premium h-100">
                <div class="list-card-header">
                    <h3><i class="fas fa-sync text-primary mr-2"></i>Frekuensi Transaksi Terbanyak</h3>
                    <span class="badge badge-primary rounded-pill">Analytics</span>
                </div>
                <div class="table-responsive">
                    <table class="table table-clean">
                        <thead>
                            <tr>
                                <th>Aset & Lokasi</th>
                                <th>Frekuensi</th>
                                <th>Volume</th>
                            </tr>
                        </thead>
                        <tbody>
                            <?php foreach ($most_transaction_by_product as $aset) : ?>
                                <tr>
                                    <td>
                                        <div class="font-weight-bold"><?= $aset['namabarang']; ?></div>
                                        <small class="text-muted"><i class="fas fa-door-open mr-1"></i><?= $aset['namaruang']; ?></small>
                                    </td>
                                    <td><span class="badge-premium bg-soft-blue"><?= $aset['transaction_count']; ?> Kali</span></td>
                                    <td>
                                        <div class="progress" style="height: 6px; border-radius: 10px; width: 60px;">
                                            <div class="progress-bar bg-primary" style="width: <?= min(100, $aset['transaction_count'] * 10); ?>%"></div>
                                        </div>
                                    </td>
                                </tr>
                            <?php endforeach; ?>
                        </tbody>
                    </table>
                </div>
            </div>
        </div>
    </div>

</div>

<!-- Modals with Premium Styling -->
<div class="modal fade" id="modal-stok-0" tabindex="-1">
    <div class="modal-dialog modal-dialog-centered modal-xl">
        <div class="modal-content border-0 shadow-lg" style="border-radius: 25px;">
            <div class="modal-header bg-danger py-4" style="border-radius: 25px 25px 0 0">
                <h5 class="modal-title font-weight-bold text-white"><i class="fas fa-exclamation-circle mr-2"></i>Aset dengan Stok Kosong</h5>
                <button type="button" class="close text-white" data-dismiss="modal">&times;</button>
            </div>
            <div class="modal-body p-0">
                <table class="table table-clean mb-0">
                    <thead>
                        <tr>
                            <th>#</th>
                            <th>Kode</th>
                            <th>Aset</th>
                            <th>Lokasi</th>
                            <th>Update Terakhir</th>
                        </tr>
                    </thead>
                    <tbody>
                        <?php $i = 1; foreach ($stok_0_all as $aset) : ?>
                            <tr>
                                <td><?= $i++; ?></td>
                                <td class="font-weight-bold"><?= $aset['kodebarang']; ?></td>
                                <td><?= $aset['namabarang']; ?></td>
                                <td><span class="badge badge-light"><?= $aset['namaruang']; ?></span></td>
                                <td><?= date('d M Y', strtotime($aset['tanggal'])); ?></td>
                            </tr>
                        <?php endforeach; ?>
                    </tbody>
                </table>
            </div>
        </div>
    </div>
</div>

<!-- Modal Masuk Today -->
<div class="modal fade" id="modal-transaksi-masuk-today" tabindex="-1">
  <div class="modal-dialog modal-dialog-centered modal-xl">
    <div class="modal-content border-0 shadow-lg" style="border-radius: 25px;">
      <div class="modal-header bg-success py-4" style="border-radius: 25px 25px 0 0">
        <h5 class="modal-title font-weight-bold text-white"><i class="fas fa-plus-circle mr-2"></i>Transaksi Masuk Hari Ini</h5>
        <button type="button" class="close text-white" data-dismiss="modal">&times;</button>
      </div>
      <div class="modal-body p-0">
        <table class="table table-clean mb-0">
          <thead>
            <tr>
              <th>Kode</th>
              <th>Aset</th>
              <th>Lokasi</th>
              <th>Jumlah</th>
              <th>PIC</th>
              <th>Keterangan</th>
            </tr>
          </thead>
          <tbody>
            <?php foreach ($today_in_all as $aset) : ?>
              <tr>
                <td class="font-weight-bold text-success"><?= $aset['kode']; ?></td>
                <td><?= $aset['namabarang']; ?></td>
                <td><?= $aset['namaruang']; ?></td>
                <td><span class="badge-premium bg-soft-green">+<?= $aset['jumlah']; ?></span></td>
                <td><?= $aset['pic']; ?></td>
                <td><small><?= $aset['keterangan']; ?></small></td>
              </tr>
            <?php endforeach; ?>
          </tbody>
        </table>
      </div>
    </div>
  </div>
</div>

<!-- Modal Keluar Today -->
<div class="modal fade" id="modal-transaksi-keluar-today" tabindex="-1">
  <div class="modal-dialog modal-dialog-centered modal-xl">
    <div class="modal-content border-0 shadow-lg" style="border-radius: 25px;">
      <div class="modal-header bg-danger py-4" style="border-radius: 25px 25px 0 0">
        <h5 class="modal-title font-weight-bold text-white"><i class="fas fa-minus-circle mr-2"></i>Transaksi Keluar Hari Ini</h5>
        <button type="button" class="close text-white" data-dismiss="modal">&times;</button>
      </div>
      <div class="modal-body p-0">
        <table class="table table-clean mb-0">
          <thead>
            <tr>
              <th>Kode</th>
              <th>Aset</th>
              <th>Lokasi</th>
              <th>Jumlah</th>
              <th>PIC</th>
              <th>Tujuan</th>
            </tr>
          </thead>
          <tbody>
            <?php foreach ($today_out_all as $aset) : ?>
              <tr>
                <td class="font-weight-bold text-danger"><?= $aset['kode']; ?></td>
                <td><?= $aset['namabarang']; ?></td>
                <td><?= $aset['namaruang']; ?></td>
                <td><span class="badge-premium bg-soft-red">-<?= $aset['jumlah']; ?></span></td>
                <td><?= $aset['pic']; ?></td>
                <td><?= $aset['tujuan']; ?></td>
              </tr>
            <?php endforeach; ?>
          </tbody>
        </table>
      </div>
    </div>
  </div>
</div>

<?= $this->endSection() ?>

<?= $this->section('javascript'); ?>
<script src="https://code.highcharts.com/stock/highstock.js"></script>
<script src="https://code.highcharts.com/stock/modules/exporting.js"></script>
<script src="https://code.highcharts.com/stock/modules/export-data.js"></script>
<script src="https://code.highcharts.com/stock/modules/accessibility.js"></script>

<script>
  (async () => {
    const data = await fetch("<?= base_url('weeklyStockData'); ?>").then(r => r.json());

    Highcharts.stockChart('weekly-Stok-moves-container', {
      chart: { backgroundColor: 'transparent', style: { fontFamily: 'Outfit, sans-serif' } },
      rangeSelector: { selected: 1, buttonTheme: { fill: '#f1f5f9', stroke: 'none', 'stroke-width': 0, r: 8, style: { color: '#64748b', fontWeight: 'bold' }, states: { select: { fill: '#3b82f6', style: { color: 'white' } } } }, inputBoxBorderColor: 'none' },
      title: { text: 'Pergerakan Milestone Stok', align: 'left', style: { fontWeight: '800', color: '#1e293b' } },
      credits: { enabled: false },
      navigator: { enabled: false },
      scrollbar: { enabled: false },
      series: [{
        name: 'Jumlah Stok',
        data: data,
        color: '#3b82f6',
        type: 'areaspline',
        fillColor: { linearGradient: { x1: 0, y1: 0, x2: 0, y2: 1 }, stops: [ [0, 'rgba(59, 130, 246, 0.2)'], [1, 'rgba(59, 130, 246, 0)'] ] },
        tooltip: { valueDecimals: 0 }
      }]
    });
  })();
</script>
<?= $this->endSection(); ?>
