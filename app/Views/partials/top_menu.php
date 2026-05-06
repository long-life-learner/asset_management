<nav class="main-header navbar navbar-expand navbar-white navbar-light border-bottom-0 shadow-sm" style="background: #fff; height: 70px;">
  <!-- Left navbar links -->
  <ul class="navbar-nav align-items-center">
    <li class="nav-item">
      <a class="nav-link text-dark" data-widget="pushmenu" href="#" role="button" style="padding: 10px 15px;"><i class="fas fa-bars"></i></a>
    </li>
    <li class="nav-item d-none d-sm-inline-block">
      <a href="<?= base_url(); ?>" class="nav-link font-weight-bold text-dark px-3">Ringkasan</a>
    </li>
    <li class="nav-item d-none d-sm-inline-block">
      <a href="#" class="nav-link text-muted px-3">Bantuan</a>
    </li>
  </ul>

  <!-- Right navbar links -->
  <ul class="navbar-nav ml-auto align-items-center">
    
    <li class="nav-item">
      <a class="nav-link text-muted px-3" data-widget="fullscreen" href="#" role="button" title="Layar Penuh">
        <i class="fas fa-expand-arrows-alt"></i>
      </a>
    </li>

    <div class="vr mx-2" style="width: 1px; height: 30px; background: #e2e8f0;"></div>

    <?php if (isset($user->username)) : ?>
      <li class="nav-item dropdown user-menu">
        <a href="#" class="nav-link dropdown-toggle d-flex align-items-center" data-toggle="dropdown" style="padding: 10px 15px;">
          <div class="user-avatar-wrap mr-2 shadow-sm" style="width: 35px; height: 35px; border-radius: 50%; overflow: hidden; border: 2px solid #fff;">
             <img src="<?= base_url('adminLTE/dist/img/user.png'); ?>" style="width: 100%; height: 100%; object-fit: cover;">
          </div>
          <div class="d-none d-md-block text-left">
            <span class="d-block font-weight-bold text-dark" style="line-height: 1; font-size: 0.9rem;"><?= $user->username; ?></span>
            <small class="text-muted" style="font-size: 0.75rem;">Administrator</small>
          </div>
          <i class="fas fa-chevron-down ml-2 text-muted" style="font-size: 0.7rem;"></i>
        </a>
        <ul class="dropdown-menu dropdown-menu-lg dropdown-menu-right border-0 shadow-lg" style="border-radius: 15px; overflow: hidden; margin-top: 15px;">
          <!-- User header -->
          <li class="user-header" style="background: linear-gradient(135deg, #1e293b 0%, #334155 100%); height: auto; padding: 30px 20px;">
            <img src="<?= base_url('adminLTE/dist/img/user.png'); ?>" class="img-circle elevation-2 mb-3" style="width: 80px; height: 80px; border: 3px solid rgba(255,255,255,0.2);">
            <p class="text-white font-weight-bold mb-0">
              <?= $user->username; ?>
            </p>
            <small class="text-white-50"><?= $user->email ?? 'admin@poltek-gt.ac.id'; ?></small>
          </li>
          <!-- Menu Footer-->
          <li class="user-footer bg-white p-3">
            <div class="d-flex justify-content-between">
              <a href="#" class="btn btn-light rounded-pill px-4 text-sm">Profil</a>
              <a href="<?= base_url('logout'); ?>" class="btn btn-danger rounded-pill px-4 text-sm shadow-sm">Logout</a>
            </div>
          </li>
        </ul>
      </li>
    <?php else : ?>
      <li class="nav-item">
        <a href="/login" class="btn btn-primary rounded-pill px-4 shadow-sm" style="font-weight: 700;">Masuk</a>
      </li>
    <?php endif; ?>
  </ul>
</nav>