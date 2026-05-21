<?= $this->extend('default') ?>

<?= $this->section('page_title'); ?>
Master Aset
<?= $this->endSection(); ?>

<?= $this->section('context'); ?>
Master Aset - CRUD
<?= $this->endSection(); ?>

<?= $this->section('css'); ?>
<link rel="stylesheet" href="<?= base_url('adminLTE/plugins/datatables-bs4/css/dataTables.bootstrap4.min.css'); ?>">
<link rel="stylesheet" href="<?= base_url('adminLTE/plugins/datatables-responsive/css/responsive.bootstrap4.min.css'); ?>">
<style>
    .card-header-custom {
        background: linear-gradient(135deg, #667eea 0%, #764ba2 100%);
        color: #fff;
        border-radius: 10px 10px 0 0;
    }

    .btn-action {
        border-radius: 8px;
        padding: 10px 20px;
        font-weight: 600;
        transition: all 0.3s;
    }

    .btn-action:hover {
        transform: translateY(-2px);
        box-shadow: 0 5px 15px rgba(0, 0, 0, 0.2);
    }

    .modal-header-custom {
        background: linear-gradient(135deg, #667eea 0%, #764ba2 100%);
        color: #fff;
        border-radius: 15px 15px 0 0;
    }

    .form-label {
        font-weight: 600;
        color: #333;
        margin-bottom: 8px;
    }

    .table-custom thead th {
        background: #f8f9fa;
        border-top: none;
        color: #495057;
        text-transform: uppercase;
        font-size: 0.75rem;
        letter-spacing: 0.05em;
        font-weight: 700;
    }

    .badge-aset {
        padding: 6px 12px;
        border-radius: 6px;
        font-weight: 600;
        font-size: 0.75rem;
    }

    .badge-tetap {
        background: #e3f2fd;
        color: #1976d2;
    }

    .badge-bergerak {
        background: #f3e5f5;
        color: #7b1fa2;
    }
</style>
<?= $this->endSection(); ?>

<?= $this->section('content') ?>
<div class="container-fluid">
    <!-- Header Section -->
    <div class="row mb-4">
        <div class="col-12">
            <div class="d-flex justify-content-between align-items-center">
                <div>
                    <h2 class="text-dark font-weight-bold mb-1">
                        <i class="fas fa-cube mr-2"></i>Master Aset
                    </h2>
                    <p class="text-muted mb-0">Kelola data master untuk semua aset di sistem</p>
                </div>
                <button type="button" class="btn btn-primary btn-action" data-toggle="modal" data-target="#modalTambahAset">
                    <i class="fas fa-plus-circle mr-2"></i>Tambah Aset
                </button>
            </div>
        </div>
    </div>

    <!-- Filter Section -->
    <div class="row mb-3">
        <div class="col-md-4">
            <div class="input-group">
                <input type="text" class="form-control" id="searchInput" placeholder="Cari kode, nama, atau merk...">
                <div class="input-group-append">
                    <span class="input-group-text"><i class="fas fa-search"></i></span>
                </div>
            </div>
        </div>
    </div>

    <!-- Table Card -->
    <div class="card border-0 shadow-sm" style="border-radius: 10px;">
        <div class="card-header card-header-custom">
            <h5 class="mb-0"><i class="fas fa-table mr-2"></i>Daftar Master Aset</h5>
        </div>
        <div class="card-body p-0">
            <div class="table-responsive">
                <table class="table table-custom table-hover w-100" id="tabelAset">
                    <thead>
                        <tr>
                            <th style="width: 10%;">Kode</th>
                            <th style="width: 20%;">Nama Aset</th>
                            <th style="width: 12%;">Merk</th>
                            <th style="width: 12%;">Jenis</th>
                            <th style="width: 12%;">Tipe</th>
                            <th style="width: 10%;">Tipe Aset</th>
                            <th style="width: 15%;">Aksi</th>
                        </tr>
                    </thead>
                    <tbody></tbody>
                </table>
            </div>
        </div>
    </div>
</div>

<!-- Modal Tambah/Edit Aset -->
<div class="modal fade" id="modalTambahAset" role="dialog" data-backdrop="static" data-keyboard="false">
    <div class="modal-dialog modal-dialog-centered modal-lg">
        <div class="modal-content" style="border-radius: 15px;">
            <div class="modal-header-custom">
                <h5 class="modal-title font-weight-bold">
                    <i class="fas fa-plus-circle mr-2"></i><span id="modalTitle">Tambah Master Aset</span>
                </h5>
                <button type="button" class="close text-white" data-dismiss="modal">&times;</button>
            </div>
            <form id="formAset" method="POST">
                <div class="modal-body p-4">
                    <div class="form-group">
                        <label class="form-label">Kode Aset *</label>
                        <input type="text" class="form-control form-control-lg" id="kodebarang" name="kodebarang" placeholder="Contoh: AC001" required>
                        <small class="form-text text-muted">Kode unik untuk aset (max 9 karakter)</small>
                    </div>

                    <div class="row">
                        <div class="col-md-6">
                            <div class="form-group">
                                <label class="form-label">Nama Aset *</label>
                                <input type="text" class="form-control" id="namabarang" name="namabarang" placeholder="Nama lengkap aset" required>
                            </div>
                        </div>
                        <div class="col-md-6">
                            <div class="form-group">
                                <label class="form-label">Merk</label>
                                <input type="text" class="form-control" id="merk" name="merk" placeholder="Merk/Produsen">
                            </div>
                        </div>
                    </div>

                    <div class="row">
                        <div class="col-md-6">
                            <div class="form-group">
                                <label class="form-label">Jenis Barang *</label>
                                <input type="text" class="form-control" id="jenisbarang" name="jenisbarang" placeholder="Contoh: Unit, Buah, Set" required>
                            </div>
                        </div>
                        <div class="col-md-6">
                            <div class="form-group">
                                <label class="form-label">Tipe Barang *</label>
                                <input type="text" class="form-control" id="tipebarang" name="tipebarang" placeholder="Contoh: 2 PK, Standard">
                            </div>
                        </div>
                    </div>

                    <div class="row">

                        <div class="col-md-6">
                            <div class="form-group">
                                <label class="form-label">Jenis Aset *</label>
                                <select class="form-control" id="jenis_aset" name="jenis_aset" required>
                                    <option value="">-- Pilih Jenis Aset --</option>
                                    <option value="Aset Tetap">Aset Tetap</option>
                                    <option value="Aset Bergerak">Aset Bergerak</option>
                                    <option value="Aset Bangunan">Aset Bangunan</option>
                                </select>
                            </div>
                        </div>
                    </div>

                    <div class="form-group">
                        <label class="form-label">Keterangan</label>
                        <textarea class="form-control" id="keterangan" name="keterangan" rows="3" placeholder="Catatan tambahan..."></textarea>
                    </div>
                </div>
                <div class="modal-footer border-0 p-4">
                    <button type="button" class="btn btn-secondary rounded-pill px-4" data-dismiss="modal">Batal</button>
                    <button type="submit" class="btn btn-primary rounded-pill px-5 font-weight-bold">
                        <i class="fas fa-save mr-2"></i><span id="btnTitle">Simpan</span>
                    </button>
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

<script>
    $(document).ready(function() {
        let editMode = false;
        let dataTable;

        // Initialize DataTable
        dataTable = $('#tabelAset').DataTable({
            responsive: true,
            processing: true,
            serverSide: false,
            ajax: {
                url: "<?= base_url('/MasterAsetAPI'); ?>",
                type: "GET",
                dataSrc: function(json) {
                    return json;
                }
            },
            columns: [{
                    data: 'kodebarang',
                    render: function(data) {
                        return '<strong class="text-primary">' + data + '</strong>';
                    }
                },
                {
                    data: 'namabarang'
                },
                {
                    data: 'merk',
                    render: function(data) {
                        return data || '-';
                    }
                },
                {
                    data: 'jenisbarang'
                },
                {
                    data: 'tipebarang'
                },

                {
                    data: 'jenis_aset',
                    render: function(data) {
                        let badgeClass = data === 'Aset Tetap' ? 'badge-tetap' : (data === 'Aset Bergerak' ? 'badge-bergerak' : 'badge-secondary');
                        return '<span class="badge badge-aset ' + badgeClass + '">' + data + '</span>';
                    }
                },
                {
                    data: null,
                    render: function(data) {
                        return `
                        <button class="btn btn-sm btn-info btn-edit" data-kode="${data.kodebarang}" title="Edit">
                            <i class="fas fa-edit"></i>
                        </button>
                        <button class="btn btn-sm btn-danger btn-hapus" data-kode="${data.kodebarang}" title="Hapus">
                            <i class="fas fa-trash"></i>
                        </button>
                    `;
                    }
                }
            ],
            order: [
                [0, 'asc']
            ],
            language: {
                emptyTable: "Tidak ada data",
                processing: "Memproses...",
                info: "Menampilkan _START_ ke _END_ dari _TOTAL_ entri",
                paginate: {
                    next: '<i class="fas fa-chevron-right"></i>',
                    previous: '<i class="fas fa-chevron-left"></i>'
                }
            }
        });

        // Reload table
        function reloadTable() {
            dataTable.ajax.reload();
        }

                // Reset Form
        function resetForm() {
            $('#formAset')[0].reset();
            editMode = false;
            $('#modalTitle').text('Tambah Master Aset');
            $('#btnTitle').text('Simpan');
            $('#kodebarang').prop('disabled', false);
        }

        // Ensure Add button always opens modal in add mode
        $(document).on('click', '.btn-action[data-target="#modalTambahAset"]', function(e) {
            editMode = false;
            resetForm();
            // let Bootstrap handle showing the modal via data-toggle
        });

        // Open Modal for Add
        $('#modalTambahAset').on('show.bs.modal', function() {
            if (!editMode) {
                resetForm();
            }
        });

        // Form Submit
        $('#formAset').on('submit', function(e) {
            e.preventDefault();
            const formData = $(this).serialize();
            const url = editMode ? "<?= base_url('/MasterAsetAPI'); ?>/" + $('#kodebarang').val() : "<?= base_url('/MasterAsetAPI'); ?>";
            const method = editMode ? 'PUT' : 'POST';

            $.ajax({
                url: url,
                type: method,
                data: formData,
                success: function(res) {
                    $('#modalTambahAset').modal('hide');
                    Swal.fire('Berhasil', editMode ? 'Data berhasil diperbarui' : 'Data berhasil ditambahkan', 'success');
                    reloadTable();
                },
                error: function(err) {
                    const msg = err.responseJSON?.msg || 'Terjadi kesalahan';
                    Swal.fire('Error', msg, 'error');
                }
            });
        });

        // Edit Button
        $(document).on('click', '.btn-edit', function() {
            const kode = $(this).data('kode');
            editMode = true;

            // Find data from table
            const row = dataTable.row($(this).closest('tr')).data();

            $('#modalTitle').text('Edit Master Aset');
            $('#btnTitle').text('Update');
            $('#kodebarang').val(row.kodebarang).prop('disabled', true);
            $('#namabarang').val(row.namabarang);
            $('#merk').val(row.merk);
            $('#jenisbarang').val(row.jenisbarang);
            $('#tipebarang').val(row.tipebarang);
            $('#jenis_aset').val(row.jenis_aset);
            $('#keterangan').val(row.keterangan);

            $('#modalTambahAset').modal('show');
        });

        // Delete Button
        $(document).on('click', '.btn-hapus', function() {
            const kode = $(this).data('kode');
            Swal.fire({
                title: 'Hapus Data?',
                text: 'Data akan dihapus secara permanen',
                icon: 'warning',
                showCancelButton: true,
                confirmButtonColor: '#dc3545',
                confirmButtonText: 'Hapus',
                cancelButtonText: 'Batal'
            }).then(result => {
                if (result.isConfirmed) {
                    $.ajax({
                        url: "<?= base_url('/MasterAsetAPI'); ?>/" + kode,
                        type: 'DELETE',
                        success: function() {
                            Swal.fire('Berhasil', 'Data berhasil dihapus', 'success');
                            reloadTable();
                        },
                        error: function(err) {
                            Swal.fire('Error', 'Gagal menghapus data', 'error');
                        }
                    });
                }
            });
        });

        // Search Filter
        $('#searchInput').on('keyup', function() {
            const searchTerm = $(this).val().toLowerCase();
            dataTable.rows().every(function() {
                const row = $(this.node());
                const text = row.text().toLowerCase();
                row.toggle(text.includes(searchTerm));
            });
        });
    });
</script>
<?= $this->endSection(); ?>