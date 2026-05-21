<aside class="main-sidebar sidebar-dark-primary elevation-4" style="background: #0f172a; border-right: 1px solid rgba(255,255,255,0.05);">
  <!-- Brand Logo -->
  <a href="<?= base_url('/'); ?>" class="brand-link" style="border-bottom: 1px solid rgba(255,255,255,0.05); padding: 20px 15px;">
    <div class="d-flex align-items-center">
      <div class="brand-icon-wrap mr-3 shadow-sm" style="width: 35px; height: 35px; background: linear-gradient(135deg, #3b82f6 0%, #1d4ed8 100%); border-radius: 8px; display: flex; align-items: center; justify-content: center;">
        <i class="fas fa-warehouse text-white" style="font-size: 1.1rem;"></i>
      </div>
      <span class="brand-text font-weight-bold" style="letter-spacing: 0.5px; font-size: 1.1rem; color: #f8fafc;">ASSET <span style="color: #3b82f6;">GT</span></span>
    </div>
  </a>

  <!-- Sidebar -->
  <div class="sidebar px-3">

    <!-- Sidebar Search -->
    <div class="form-inline mt-4 mb-3">
      <div class="input-group" data-widget="sidebar-search">
        <input class="form-control form-control-sidebar border-0" type="search" placeholder="Cari menu..." style="background: rgba(255,255,255,0.05); border-radius: 8px 0 0 8px;">
        <div class="input-group-append">
          <button class="btn btn-sidebar border-0" style="background: rgba(255,255,255,0.05); border-radius: 0 8px 8px 0;">
            <i class="fas fa-search fa-fw text-muted"></i>
          </button>
        </div>
      </div>
    </div>

    <!-- Sidebar Menu -->
    <nav class="mt-2">
      <ul class="nav nav-pills nav-sidebar flex-column nav-child-indent" data-widget="treeview" role="menu">

        <li class="nav-item">
          <a href="<?= base_url('/'); ?>" class="nav-link <?= current_url() == base_url('/') ? 'active' : '' ?>" style="border-radius: 10px; margin-bottom: 5px;">
            <i class="nav-icon fas fa-th-large"></i>
            <p>Dashboard Utama</p>
          </a>
        </li>

        <li class="nav-header" style="color: #64748b; font-weight: 700; font-size: 0.7rem; letter-spacing: 1px; padding: 15px 10px 5px;">MANAJEMEN ASET</li>

        <li class="nav-item">
          <a href="<?= base_url('/aset-tetap/dashboard'); ?>" class="nav-link <?= strpos(current_url(), 'aset-tetap') !== false ? 'active' : '' ?>" style="border-radius: 10px; margin-bottom: 5px;">
            <i class="nav-icon fas fa-building"></i>
            <p>Aset Tetap</p>
          </a>
        </li>

        <li class="nav-item">
          <a href="<?= base_url('/aset-bergerak/dashboard'); ?>" class="nav-link <?= strpos(current_url(), 'aset-bergerak') !== false ? 'active' : '' ?>" style="border-radius: 10px; margin-bottom: 5px;">
            <i class="nav-icon fas fa-box-open"></i>
            <p>Aset Bergerak</p>
          </a>
        </li>

        <li class="nav-item">
          <a href="<?= base_url('/master-aset'); ?>" class="nav-link <?= strpos(current_url(), 'master-aset') !== false ? 'active' : '' ?>" style="border-radius: 10px; margin-bottom: 5px;">
            <i class="nav-icon fas fa-database"></i>
            <p>Master Aset</p>
          </a>
        </li>

        <li class="nav-header" style="color: #64748b; font-weight: 700; font-size: 0.7rem; letter-spacing: 1px; padding: 15px 10px 5px;">ANALISIS & DATA</li>

        <li class="nav-item">
          <a href="<?= base_url('/pelaporan'); ?>" class="nav-link <?= strpos(current_url(), 'pelaporan') !== false ? 'active' : '' ?>" style="border-radius: 10px; margin-bottom: 5px;">
            <i class="nav-icon fas fa-chart-pie"></i>
            <p>Laporan Mutasi</p>
          </a>
        </li>

        <li class="nav-item mt-4">
          <a href="<?= base_url('logout'); ?>" class="nav-link" style="border-radius: 10px; color: #f87171;">
            <i class="nav-icon fas fa-sign-out-alt"></i>
            <p>Keluar Aplikasi</p>
          </a>
        </li>
      </ul>
    </nav>
  </div>
</aside>

<style>
  .nav-sidebar .nav-link.active {
    background-color: #3b82f6 !important;
    box-shadow: 0 4px 12px rgba(59, 130, 246, 0.3);
  }

  .nav-sidebar .nav-link:hover:not(.active) {
    background-color: rgba(255, 255, 255, 0.05);
  }

  .sidebar-dark-primary .nav-sidebar>.nav-item>.nav-link.active {
    color: #fff;
  }
</style>