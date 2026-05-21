<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>Asset Management | <?= lang('Auth.loginTitle') ?></title>

    <!-- Google Font: Source Sans Pro -->
    <link rel="stylesheet" href="https://fonts.googleapis.com/css?family=Source+Sans+Pro:300,400,400i,700&display=fallback">
    <!-- Font Awesome -->
    <link rel="stylesheet" href="<?= base_url('/adminLTE/plugins/fontawesome-free/css/all.min.css'); ?>">
    <!-- icheck bootstrap -->
    <link rel="stylesheet" href="<?= base_url('/adminLTE/plugins/icheck-bootstrap/icheck-bootstrap.min.css'); ?>">
    <!-- Theme style -->
    <link rel="stylesheet" href="<?= base_url('/adminLTE/dist/css/adminlte.min.css'); ?>">
    <style>
        body {
            background: linear-gradient(135deg, #1e3c72 0%, #2a5298 50%, #7e22ce 100%);
            min-height: 100vh;
            display: flex;
            align-items: center;
            justify-content: center;
            font-family: 'Source Sans Pro', sans-serif;
        }

        .login-container {
            width: 100%;
            max-width: 420px;
            padding: 20px;
        }

        .login-card {
            background: rgba(255, 255, 255, 0.95);
            border-radius: 20px;
            box-shadow: 0 20px 60px rgba(0, 0, 0, 0.3);
            overflow: hidden;
            border: none;
            backdrop-filter: blur(10px);
        }

        .login-header {
            background: linear-gradient(135deg, #3b82f6 0%, #1d4ed8 100%);
            color: white;
            padding: 40px 20px;
            text-align: center;
            border-bottom: none;
        }

        .login-header .brand-icon {
            width: 60px;
            height: 60px;
            background: rgba(255, 255, 255, 0.2);
            border-radius: 12px;
            display: flex;
            align-items: center;
            justify-content: center;
            margin: 0 auto 15px;
            font-size: 1.8rem;
        }

        .login-header h1 {
            font-size: 2rem;
            font-weight: 700;
            margin: 0 0 5px 0;
            letter-spacing: -0.5px;
        }

        .login-header p {
            margin: 0;
            opacity: 0.9;
            font-size: 0.9rem;
        }

        .login-body {
            padding: 40px;
        }

        .form-group {
            margin-bottom: 20px;
        }

        .form-group label {
            font-weight: 600;
            color: #1e293b;
            margin-bottom: 8px;
            display: block;
            font-size: 0.9rem;
        }

        .form-control {
            border: 1.5px solid #e2e8f0;
            border-radius: 10px;
            height: 45px;
            padding: 10px 15px;
            font-size: 0.95rem;
            transition: all 0.3s ease;
        }

        .form-control:focus {
            border-color: #3b82f6;
            box-shadow: 0 0 0 3px rgba(59, 130, 246, 0.1);
            outline: none;
        }

        .form-control.is-invalid {
            border-color: #dc2626;
        }

        .form-control.is-invalid:focus {
            box-shadow: 0 0 0 3px rgba(220, 38, 38, 0.1);
        }

        .input-group-append .input-group-text {
            background: transparent;
            border: 1.5px solid #e2e8f0;
            border-left: none;
            border-radius: 0 10px 10px 0;
        }

        .input-group .form-control {
            border-radius: 10px 0 0 10px;
        }

        .icheck-primary>input {
            margin-right: 8px;
        }

        .icheck-primary label {
            font-weight: 500;
            color: #475569;
            margin: 0;
            cursor: pointer;
        }

        .login-links {
            margin-top: 25px;
            padding-top: 20px;
            border-top: 1px solid #e2e8f0;
        }

        .login-links a {
            color: #3b82f6;
            font-size: 0.9rem;
            font-weight: 500;
            transition: color 0.3s;
            text-decoration: none;
        }

        .login-links a:hover {
            color: #1d4ed8;
            text-decoration: underline;
        }

        .login-links p {
            margin: 10px 0;
            text-align: center;
        }

        .login-links .text-muted {
            color: #64748b;
        }

        .btn-login:hover {
            transform: translateY(-2px);
            box-shadow: 0 6px 20px rgba(59, 130, 246, 0.5);

            text-decoration: none;
        }

        .btn-login:active {
            transform: translateY(0);
        }

        .alert {
            border-radius: 10px;
            border: none;
            margin-bottom: 20px;
        }

        .invalid-feedback {
            display: block;
            color: #dc2626;
            font-size: 0.85rem;
            margin-top: 5px;
        }
    </style>
</head>

<body>

    <div class="login-container">
        <div class="login-card">
            <div class="login-header">
                <div class="brand-icon">
                    <i class="fas fa-warehouse"></i>
                </div>
                <h1>ASSET PGT</h1>
                <p>Sistem Manajemen Aset</p>
            </div>
            <div class="login-body">
                <?php if (session('error')) : ?>
                    <div class="alert alert-danger" role="alert">
                        <?= session('error') ?>
                    </div>
                <?php endif; ?>
                <?php if (session('message')) : ?>
                    <div class="alert alert-success" role="alert">
                        <?= session('message') ?>
                    </div>
                <?php endif; ?>

                <form action="<?= route_to('login') ?>" method="post">
                    <?= csrf_field() ?>

                    <?php if ($config->validFields === ['email']) : ?>
                        <div class="form-group">
                            <label for="email"><i class="fas fa-envelope mr-2"></i><?= lang('Auth.email') ?></label>
                            <input type="email" class="form-control <?php if (session('errors.login')) : ?>is-invalid<?php endif ?>" id="email" name="login" placeholder="Masukkan email Anda">
                            <?php if (session('errors.login')) : ?>
                                <div class="invalid-feedback"><?= session('errors.login') ?></div>
                            <?php endif; ?>
                        </div>
                    <?php else : ?>
                        <div class="form-group">
                            <label for="login"><i class="fas fa-user mr-2"></i><?= lang('Auth.emailOrUsername') ?></label>
                            <input type="text" class="form-control <?php if (session('errors.login')) : ?>is-invalid<?php endif ?>" id="login" name="login" placeholder="Email atau nama pengguna">
                            <?php if (session('errors.login')) : ?>
                                <div class="invalid-feedback"><?= session('errors.login') ?></div>
                            <?php endif; ?>
                        </div>
                    <?php endif; ?>

                    <div class="form-group">
                        <label for="password"><i class="fas fa-lock mr-2"></i><?= lang('Auth.password') ?></label>
                        <input type="password" class="form-control <?php if (session('errors.password')) : ?>is-invalid<?php endif ?>" id="password" name="password" placeholder="Masukkan kata sandi">
                        <?php if (session('errors.password')) : ?>
                            <div class="invalid-feedback"><?= session('errors.password') ?></div>
                        <?php endif; ?>
                    </div>

                    <?php if ($config->allowRemembering) : ?>
                        <div class="form-group mb-3">
                            <div class="icheck-primary">
                                <input type="checkbox" id="remember" name="remember" <?php if (old('remember')) : ?>checked<?php endif ?>>
                                <label for="remember"><?= lang('Auth.rememberMe') ?></label>
                            </div>
                        </div>
                    <?php endif; ?>

                    <button type="submit" class="btn btn-login w-100 rounded-pill shadow-sm btn-primary"><?= lang('Auth.loginAction') ?></button>
                </form>

                <div class="login-links">
                    <?php if ($config->activeResetter) : ?>
                        <p>
                            <a href="<?= route_to('forgot') ?>"><i class="fas fa-key mr-1"></i><?= lang('Auth.forgotYourPassword') ?></a>
                        </p>
                    <?php endif; ?>

                    <?php if ($config->allowRegistration) : ?>
                        <p class="mb-0">
                            <span class="text-muted">Belum punya akun? </span><a href="<?= route_to('register') ?>"><?= lang('Auth.needAnAccount') ?></a>
                        </p>
                    <?php endif; ?>
                </div>
            </div>
        </div>
    </div>

    <!-- jQuery -->
    <script src="<?= base_url('/adminLTE/plugins/jquery/jquery.min.js'); ?>"></script>
    <!-- Bootstrap 4 -->
    <script src="<?= base_url('/adminLTE/plugins/bootstrap/js/bootstrap.bundle.min.js'); ?>"></script>
    <!-- AdminLTE App -->
    <script src="<?= base_url('/adminLTE/dist/js/adminlte.min.js'); ?>"></script>
    <script>
        // Add smooth focus animations
        document.querySelectorAll('.form-control').forEach(input => {
            input.addEventListener('focus', function() {
                this.parentElement.classList.add('focused');
            });
            input.addEventListener('blur', function() {
                this.parentElement.classList.remove('focused');
            });
        });
    </script>
</body>

</html>