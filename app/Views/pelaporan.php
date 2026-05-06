<?= $this->extend('default') ?>
<?= $this->section('page_title'); ?>
<?= $title; ?>
<?= $this->endSection(); ?>

<?= $this->section('context'); ?>
<?= $title; ?>
<?= $this->endSection(); ?>
<?= $this->section('css') ?>
<link rel="stylesheet" href="<?= base_url('adminLTE/plugins/datatables-bs4/css/dataTables.bootstrap4.min.css'); ?>">
<link rel="stylesheet" href="<?= base_url('adminLTE/plugins/datatables-buttons/css/buttons.bootstrap4.min.css'); ?>">
<link rel="stylesheet" href="<?= base_url('adminLTE/plugins/datatables-responsive/css/responsive.bootstrap4.min.css'); ?>">
<link rel="stylesheet" href="<?= base_url('adminLTE/plugins/daterangepicker/daterangepicker.css'); ?>">
<link rel="stylesheet" href="<?= base_url('adminLTE/plugins/tempusdominus-bootstrap-4/css/tempusdominus-bootstrap-4.min.css'); ?>">
<style>
    /* ── Filter Card ── */
    .filter-card {
        border-left: 4px solid #007bff;
        border-radius: 6px;
    }
    .filter-card .card-header {
        background: linear-gradient(135deg, #007bff 0%, #0056b3 100%);
        color: #fff;
        border-radius: 5px 5px 0 0;
    }
    /* ── Summary Cards ── */
    .summary-card {
        border-radius: 8px;
        transition: transform .15s ease, box-shadow .15s ease;
    }
    .summary-card:hover {
        transform: translateY(-3px);
        box-shadow: 0 6px 18px rgba(0,0,0,.12);
    }
    .summary-card .icon-wrap {
        width: 52px; height: 52px;
        border-radius: 50%;
        display: flex; align-items: center; justify-content: center;
        font-size: 1.4rem;
        opacity: .9;
    }
    /* ── Period Banner ── */
    #periode-info-banner {
        display: none;
        background: #e8f4fd;
        border: 1px solid #bee5fd;
        border-radius: 6px;
        padding: 10px 16px;
        margin-bottom: 12px;
        font-size: .92rem;
        color: #0c5460;
    }
    /* ── Mutation badges ── */
    .badge-mutasi-plus  { background-color: #28a745; color: #fff; }
    .badge-mutasi-minus { background-color: #dc3545; color: #fff; }
    .badge-mutasi-zero  { background-color: #6c757d; color: #fff; }
    .badge-mutasi-plus, .badge-mutasi-minus, .badge-mutasi-zero {
        font-size: .82rem; padding: 3px 9px; border-radius: 12px; font-weight: 600;
    }
    /* ── Row highlight ── */
    tr.row-plus  td { background-color: rgba(40,167,69,.06) !important; }
    tr.row-minus td { background-color: rgba(220,53,69,.06) !important; }
    /* ── Loading overlay ── */
    #loading-overlay {
        display: none;
        position: absolute; inset: 0;
        background: rgba(255,255,255,.75);
        z-index: 10;
        align-items: center; justify-content: center;
        border-radius: 6px;
    }
    .card-body { position: relative; }
    /* ── Stok column alignment ── */
    td.stok-col { text-align: center; font-weight: 600; }
    /* ── Keterangan truncate ── */
    td.keterangan-col {
        max-width: 200px;
        white-space: nowrap;
        overflow: hidden;
        text-overflow: ellipsis;
    }
    /* ── Empty state ── */
    #empty-state {
        display: none;
        padding: 40px 20px;
        text-align: center;
        color: #6c757d;
    }
    #empty-state i { font-size: 3rem; margin-bottom: 12px; opacity: .5; }
</style>
<?= $this->endSection(); ?>

<!-- Default box -->
<?= $this->section('content') ?>

<!-- ══════════════════════════════════════════
     FILTER CARD
     ══════════════════════════════════════════ -->
<div class="card filter-card mb-3">
    <div class="card-header">
        <h5 class="mb-0"><i class="fas fa-filter mr-2"></i>Filter Laporan Mutasi Aset</h5>
    </div>
    <div class="card-body">
        <div class="row">
            <!-- Periode -->
            <div class="col-md-5 col-12">
                <div class="form-group mb-md-0">
                    <label class="font-weight-bold"><i class="far fa-calendar-alt mr-1 text-primary"></i>Periode Pelaporan</label>
                    <div class="input-group">
                        <div class="input-group-prepend">
                            <span class="input-group-text"><i class="far fa-clock"></i></span>
                        </div>
                        <input type="text" class="form-control" id="periode-pelaporan"
                               placeholder="Pilih rentang tanggal...">
                    </div>
                    <small class="text-muted">Klik untuk memilih rentang tanggal</small>
                </div>
            </div>
            <!-- Lokasi -->
            <div class="col-md-5 col-12">
                <div class="form-group mb-md-0">
                    <label class="font-weight-bold"><i class="fas fa-map-marker-alt mr-1 text-danger"></i>Lokasi / Ruangan</label>
                    <select class="form-control select2" id="lokasi" name="lokasi"
                            style="width:100%"></select>
                    <small class="text-muted">Pilih lokasi/ruangan yang ingin dilaporkan</small>
                </div>
            </div>
            <!-- Button -->
            <div class="col-md-2 col-12 d-flex align-items-end">
                <div class="form-group mb-md-0 w-100">
                    <label class="d-none d-md-block">&nbsp;</label>
                    <button id="btn-refresh" class="btn btn-primary btn-block" disabled>
                        <i class="fas fa-sync-alt mr-1"></i>Tampilkan
                    </button>
                </div>
            </div>
        </div>
    </div>
</div>

<!-- ══════════════════════════════════════════
     SUMMARY CARDS
     ══════════════════════════════════════════ -->
<div class="row mb-3" id="summary-row" style="display:none!important">
    <div class="col-6 col-md-3">
        <div class="card summary-card border-0 shadow-sm">
            <div class="card-body d-flex align-items-center">
                <div class="icon-wrap bg-primary text-white mr-3">
                    <i class="fas fa-boxes"></i>
                </div>
                <div>
                    <div class="text-muted" style="font-size:.78rem">Total Jenis Aset</div>
                    <div id="sum-total" class="font-weight-bold h5 mb-0">—</div>
                </div>
            </div>
        </div>
    </div>
    <div class="col-6 col-md-3">
        <div class="card summary-card border-0 shadow-sm">
            <div class="card-body d-flex align-items-center">
                <div class="icon-wrap bg-info text-white mr-3">
                    <i class="fas fa-warehouse"></i>
                </div>
                <div>
                    <div class="text-muted" style="font-size:.78rem">Total Stok Awal</div>
                    <div id="sum-stok-awal" class="font-weight-bold h5 mb-0">—</div>
                </div>
            </div>
        </div>
    </div>
    <div class="col-6 col-md-3">
        <div class="card summary-card border-0 shadow-sm">
            <div class="card-body d-flex align-items-center">
                <div class="icon-wrap bg-warning text-white mr-3">
                    <i class="fas fa-exchange-alt"></i>
                </div>
                <div>
                    <div class="text-muted" style="font-size:.78rem">Total Mutasi</div>
                    <div id="sum-mutasi" class="font-weight-bold h5 mb-0">—</div>
                </div>
            </div>
        </div>
    </div>
    <div class="col-6 col-md-3">
        <div class="card summary-card border-0 shadow-sm">
            <div class="card-body d-flex align-items-center">
                <div class="icon-wrap bg-success text-white mr-3">
                    <i class="fas fa-check-circle"></i>
                </div>
                <div>
                    <div class="text-muted" style="font-size:.78rem">Total Stok Akhir</div>
                    <div id="sum-stok-akhir" class="font-weight-bold h5 mb-0">—</div>
                </div>
            </div>
        </div>
    </div>
</div>

<!-- ══════════════════════════════════════════
     TABEL LAPORAN
     ══════════════════════════════════════════ -->
<div class="card">
    <div class="card-header">
        <h3 class="card-title"><i class="fas fa-table mr-2"></i><?= $title; ?></h3>
        <div class="card-tools">
            <span id="badge-periode" class="badge badge-primary" style="display:none;font-size:.85rem;padding:5px 10px">
                <i class="far fa-calendar-check mr-1"></i><span id="badge-periode-text"></span>
            </span>
            <span id="badge-lokasi" class="badge badge-danger ml-1" style="display:none;font-size:.85rem;padding:5px 10px">
                <i class="fas fa-map-marker-alt mr-1"></i><span id="badge-lokasi-text"></span>
            </span>
        </div>
    </div>
    <!-- /.card-header -->
    <div class="card-body overflow-auto">

        <!-- Loading Overlay -->
        <div id="loading-overlay" style="display:none;position:absolute;inset:0;background:rgba(255,255,255,.8);z-index:10;align-items:center;justify-content:center;border-radius:6px;flex-direction:column">
            <div class="spinner-border text-primary mb-2" role="status"></div>
            <div class="text-muted">Memuat data...</div>
        </div>

        <!-- Period info banner -->
        <div id="periode-info-banner"></div>

        <!-- Empty state -->
        <div id="empty-state" class="text-center py-5">
            <i class="fas fa-inbox d-block mb-3 text-muted" style="font-size:3rem;opacity:.4"></i>
            <h5 class="text-muted">Belum ada data</h5>
            <p class="text-muted">Pilih periode dan lokasi, lalu klik <strong>Tampilkan</strong> untuk melihat laporan.</p>
        </div>

        <table id="pelaporan" class="table table-striped table-bordered" style="width:100%">
            <thead>
                <tr class="text-center">
                    <th style="width:120px">Kode Aset</th>
                    <th>Nama Barang</th>
                    <th style="width:80px">Satuan</th>
                    <th style="width:90px">Stok Awal</th>
                    <th style="width:90px">Mutasi</th>
                    <th style="width:90px">Stok Akhir</th>
                    <th style="width:80px">Tren</th>
                    <th>Keterangan</th>
                </tr>
            </thead>
            <tfoot>
                <tr class="font-weight-bold bg-light">
                    <td colspan="3" class="text-right">TOTAL</td>
                    <td class="text-center" id="foot-stok-awal">—</td>
                    <td class="text-center" id="foot-mutasi">—</td>
                    <td class="text-center" id="foot-stok-akhir">—</td>
                    <td colspan="2"></td>
                </tr>
            </tfoot>
            <tbody></tbody>
        </table>
    </div>
    <!-- /.card-body -->
</div>
<!-- /.card -->

<?= $this->endSection() ?>


<?= $this->section('javascript') ?>

<script src="<?= base_url('adminLTE/plugins/datatables/jquery.dataTables.min.js'); ?>"></script>
<script src="<?= base_url('adminLTE/plugins/datatables-bs4/js/dataTables.bootstrap4.min.js'); ?>"></script>
<script src="<?= base_url('adminLTE/plugins/datatables-responsive/js/dataTables.responsive.min.js'); ?>"></script>
<script src="<?= base_url('adminLTE/plugins/datatables-buttons/js/dataTables.buttons.min.js'); ?>"></script>
<script src="<?= base_url('adminLTE/plugins/datatables-buttons/js/buttons.bootstrap4.min.js'); ?>"></script>
<script src="<?= base_url('adminLTE/plugins/datatables-buttons/js/buttons.print.min.js'); ?>"></script>
<script src="<?= base_url('adminLTE/plugins/datatables-buttons/js/buttons.html5.min.js'); ?>"></script>
<script src="<?= base_url('adminLTE/plugins/datatables-buttons/js/buttons.colVis.min.js'); ?>"></script>
<script src="<?= base_url('adminLTE/plugins/jszip/jszip.min.js'); ?>"></script>
<script src="<?= base_url('adminLTE/plugins/pdfmake/pdfmake.min.js'); ?>"></script>
<script src="<?= base_url('adminLTE/plugins/pdfmake/vfs_fonts.js'); ?>"></script>
<script src="<?= base_url('adminLTE/plugins/daterangepicker/daterangepicker.js'); ?>"></script>
<script src="<?= base_url('adminLTE/plugins/tempusdominus-bootstrap-4/js/tempusdominus-bootstrap-4.min.js'); ?>"></script>
<script src="<?= base_url('js/util.js'); ?>"></script>

<script>
$(document).ready(function () {

    /* ─── helpers ─── */
    function getReportTitle() {
        let lokLabel = $('#lokasi option:selected').text() || '-';
        return `Laporan Mutasi Aset — ${$('#periode-pelaporan').val()} — ${lokLabel}`;
    }

    function showLoading(show) {
        if (show) {
            $('#loading-overlay').css('display','flex');
        } else {
            $('#loading-overlay').hide();
        }
    }

    function updateSummary(data) {
        if (!data || data.length === 0) {
            $('#summary-row').hide();
            $('#foot-stok-awal, #foot-mutasi, #foot-stok-akhir').text('—');
            return;
        }
        let totalAwal = 0, totalMutasi = 0, totalAkhir = 0;
        data.forEach(function(r) {
            totalAwal   += parseInt(r.stok_awal)   || 0;
            totalMutasi += parseInt(r.mutasi)       || 0;
            totalAkhir  += parseInt(r.stok_akhir)  || 0;
        });
        $('#sum-total').text(data.length);
        $('#sum-stok-awal').text(totalAwal);
        $('#sum-stok-akhir').text(totalAkhir);

        let mutasiSign = totalMutasi > 0 ? '+' : '';
        $('#sum-mutasi').text(mutasiSign + totalMutasi)
            .removeClass('text-success text-danger text-muted')
            .addClass(totalMutasi > 0 ? 'text-success' : totalMutasi < 0 ? 'text-danger' : 'text-muted');

        $('#foot-stok-awal').text(totalAwal);
        $('#foot-stok-akhir').text(totalAkhir);
        $('#foot-mutasi').text((totalMutasi >= 0 ? '+' : '') + totalMutasi)
            .css('color', totalMutasi > 0 ? '#28a745' : totalMutasi < 0 ? '#dc3545' : '#6c757d');

        $('#summary-row').css('display','');
    }

    function updateBanner(periode, lokasiLabel) {
        if (!periode || !lokasiLabel) return;

        // Badges in card-header
        $('#badge-periode-text').text(periode);
        $('#badge-lokasi-text').text(lokasiLabel);
        $('#badge-periode, #badge-lokasi').show();

        // Banner above table
        $('#periode-info-banner')
            .html(`<i class="fas fa-info-circle mr-2"></i>Menampilkan laporan mutasi aset ruangan <strong>${lokasiLabel}</strong> untuk periode <strong>${periode}</strong>`)
            .show();
    }

    /* ─── DataTable ─── */
    let dataTable = $('#pelaporan').DataTable({
        language: {
            emptyTable: "Pilih periode dan lokasi, lalu klik <strong>Tampilkan</strong>",
            info: "Menampilkan _START_ – _END_ dari _TOTAL_ item",
            paginate: {
                first: "Pertama", last: "Terakhir",
                next: "›", previous: "‹"
            },
            infoEmpty: "Tidak ada data yang tersedia",
            infoFiltered: "(dari _MAX_ total)",
            search: "Cari:",
            zeroRecords: "Tidak ada data yang cocok ditemukan",
            buttons: { colvis: 'Kolom' }
        },
        responsive: true,
        dom: 'Bfrtip',
        autoWidth: false,
        buttons: [
            {
                extend: 'copyHtml5',
                text: '<i class="fas fa-copy mr-1"></i>Salin',
                titleAttr: 'Salin ke clipboard',
                title: getReportTitle
            },
            {
                extend: 'excelHtml5',
                text: '<i class="fas fa-file-excel mr-1"></i>Excel',
                titleAttr: 'Unduh Excel',
                title: getReportTitle
            },
            {
                extend: 'csvHtml5',
                text: '<i class="fas fa-file-csv mr-1"></i>CSV',
                titleAttr: 'Unduh CSV',
                title: getReportTitle
            },
            {
                extend: 'pdfHtml5',
                text: '<i class="fas fa-file-pdf mr-1"></i>PDF',
                titleAttr: 'Unduh / Buka PDF',
                title: getReportTitle,
                download: 'open',
                customize: function(doc) {
                    doc.defaultStyle.fontSize = 9;
                    doc.styles.tableHeader.fillColor = '#007bff';
                    doc.styles.tableHeader.color     = '#ffffff';
                }
            },
            {
                extend: 'print',
                text: '<i class="fas fa-print mr-1"></i>Cetak',
                titleAttr: 'Cetak laporan',
                title: getReportTitle
            },
            {
                extend: 'colvis',
                text: '<i class="fas fa-columns mr-1"></i>Kolom'
            }
        ],
        columns: [
            { data: 'kode',         className: 'text-center' },
            { data: 'namabarang' },
            { data: 'unit',         className: 'text-center' },
            { data: 'stok_awal',    className: 'stok-col' },
            {
                data: 'mutasi',
                className: 'text-center',
                render: function(data) {
                    let val = parseInt(data) || 0;
                    if (val > 0)  return `<span class="badge-mutasi-plus">+${val}</span>`;
                    if (val < 0)  return `<span class="badge-mutasi-minus">${val}</span>`;
                    return `<span class="badge-mutasi-zero">0</span>`;
                }
            },
            { data: 'stok_akhir',   className: 'stok-col' },
            {
                /* Kolom Tren visual */
                data: 'mutasi',
                orderable: false,
                className: 'text-center',
                render: function(data) {
                    let val = parseInt(data) || 0;
                    if (val > 0) return '<i class="fas fa-arrow-up text-success" title="Stok bertambah"></i>';
                    if (val < 0) return '<i class="fas fa-arrow-down text-danger" title="Stok berkurang"></i>';
                    return '<i class="fas fa-minus text-muted" title="Tidak ada mutasi"></i>';
                }
            },
            {
                data: 'keterangan',
                className: 'keterangan-col',
                render: function(data, type) {
                    if (type === 'display' && data && data.length > 60) {
                        return `<span title="${data}">${data.substring(0,60)}…</span>`;
                    }
                    return data || '<span class="text-muted">—</span>';
                }
            }
        ],
        /* row highlight sesuai mutasi */
        createdRow: function(row, data) {
            let val = parseInt(data.mutasi) || 0;
            if (val > 0) $(row).addClass('row-plus');
            else if (val < 0) $(row).addClass('row-minus');
        },
        initComplete: function() {
            $('#empty-state').show();
        }
    });

    /* ─── Date Range Picker ─── */
    $('#periode-pelaporan').daterangepicker({
        showDropdowns: true,
        minYear: 2013,
        maxYear: new Date().getFullYear() + 1,
        locale: {
            format: "DD-MM-YYYY",
            separator: " s/d ",
            applyLabel: "Tetapkan",
            cancelLabel: "Batal",
            fromLabel: "Dari",
            toLabel: "Ke",
            customRangeLabel: "Kustom",
            weekLabel: "W",
            daysOfWeek: ["Min","Sen","Sel","Rab","Kam","Jum","Sab"],
            monthNames: ["Januari","Februari","Maret","April","Mei","Juni",
                         "Juli","Agustus","September","Oktober","November","Desember"],
            firstDay: 1
        },
        autoApply: true,
        ranges: {
            'Hari ini'       : [moment(), moment()],
            'Kemarin'        : [moment().subtract(1,'days'), moment().subtract(1,'days')],
            '7 Hari Terakhir': [moment().subtract(6,'days'), moment()],
            '30 Hari Terakhir': [moment().subtract(29,'days'), moment()],
            'Bulan Ini'      : [moment().startOf('month'), moment().endOf('month')],
            'Bulan Lalu'     : [moment().subtract(1,'month').startOf('month'), moment().subtract(1,'month').endOf('month')],
            '3 Bulan Terakhir': [moment().subtract(3,'months').startOf('month'), moment().endOf('month')],
            '6 Bulan Terakhir': [moment().subtract(6,'months').startOf('month'), moment().endOf('month')]
        },
        alwaysShowCalendars: true
    }, function() {
        checkFilterReady();
    });

    /* ─── Select2 Lokasi ─── */
    $('#lokasi').select2({
        placeholder: "Ketikan kode / nama lokasi…",
        allowClear: true,
    });

    /* Load data ruangan */
    $.ajax({
        type: "GET",
        url: "<?= base_url('/AsetBangunanAPI'); ?>",
        dataType: 'json',
        success: function(data) {
            $('#lokasi').append('');
            $(data).each(function(i, el) {
                $('#lokasi').append(
                    `<option value="${el.namaruang + '-' + el.koderuang}">${el.namaruang} <small>(${el.koderuang})</small></option>`
                );
            });
        },
        error: function(error) {
            Swal.fire('Oops', 'Terjadi kesalahan ketika mengambil data ruangan', 'error');
            console.error('Error:', error);
        }
    });

    /* Aktifkan tombol jika periode & lokasi sudah dipilih */
    function checkFilterReady() {
        let periodeVal = $('#periode-pelaporan').val();
        let lokasiVal  = $('#lokasi').val();
        let ready = periodeVal && periodeVal.trim() !== '' && lokasiVal && lokasiVal.trim() !== '';
        $('#btn-refresh').prop('disabled', !ready);
    }
    $('#lokasi').on('select2:select select2:clear', checkFilterReady);

    /* ─── Fetch & render data ─── */
    function fetchData() {
        let periodeVal = $('#periode-pelaporan').val();
        let lokasiVal  = $('#lokasi').val();
        if (!periodeVal || !lokasiVal) return;

        let parts    = periodeVal.split('s/d');
        let startArr = parts[0].trim().split('-');
        let endArr   = parts[1].trim().split('-');
        let start    = `${startArr[2]}-${startArr[1]}-${startArr[0]}`;
        let end      = `${endArr[2]}-${endArr[1]}-${endArr[0]}`;
        let lokasi   = lokasiVal.split('-')[1];
        let lokasiLabel = lokasiVal.split('-')[0];

        showLoading(true);
        $('#empty-state').hide();

        $.ajax({
            url: "<?= base_url('/pelaporan/transaksi-aset'); ?>",
            type: "PATCH",
            dataType: "json",
            data: JSON.stringify({ start, end, lokasi }),
            contentType: "application/json; charset=utf-8",
            success: function(response) {
                showLoading(false);
                dataTable.clear();
                dataTable.rows.add(response).draw();
                updateSummary(response);
                updateBanner(periodeVal, lokasiLabel);

                if (!response || response.length === 0) {
                    $('#empty-state').show();
                }
            },
            error: function(e) {
                showLoading(false);
                Swal.fire('Gagal', 'Terjadi kesalahan saat mengambil data laporan.', 'error');
                console.error(e.responseText);
            }
        });
    }

    /* Tombol Tampilkan */
    $('#btn-refresh').on('click', fetchData);

    /* Juga fetch otomatis jika lokasi dipilih ulang */
    $('#lokasi').on('select2:select', function() {
        checkFilterReady();
        let periodeVal = $('#periode-pelaporan').val();
        if (periodeVal && periodeVal.trim() !== '') {
            fetchData();
        }
    });

});
</script>
<?= $this->endSection() ?>