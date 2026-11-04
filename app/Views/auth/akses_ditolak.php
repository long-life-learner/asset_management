<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>Akses Ditolak — Sistem Aset Politeknik GT</title>
    <link rel="stylesheet" href="https://fonts.googleapis.com/css?family=Source+Sans+Pro:300,400,600,700&display=fallback">
    <link rel="stylesheet" href="<?= base_url('/adminLTE/plugins/fontawesome-free/css/all.min.css'); ?>">
    <style>
        * { box-sizing: border-box; margin: 0; padding: 0; }
        body {
            font-family: 'Source Sans Pro', sans-serif;
            background: linear-gradient(135deg, #1e3c72 0%, #2a5298 50%, #7e22ce 100%);
            min-height: 100vh;
            display: flex;
            align-items: center;
            justify-content: center;
            padding: 20px;
        }
        .card {
            background: rgba(255, 255, 255, 0.08);
            backdrop-filter: blur(20px);
            -webkit-backdrop-filter: blur(20px);
            border: 1px solid rgba(255, 255, 255, 0.15);
            border-radius: 24px;
            padding: 50px 40px;
            text-align: center;
            max-width: 460px;
            width: 100%;
            box-shadow: 0 25px 50px rgba(0,0,0,0.3);
        }
        .icon-wrap {
            width: 90px;
            height: 90px;
            border-radius: 50%;
            background: rgba(239, 68, 68, 0.2);
            border: 2px solid rgba(239, 68, 68, 0.5);
            display: flex;
            align-items: center;
            justify-content: center;
            margin: 0 auto 24px;
        }
        .icon-wrap i {
            font-size: 2.5rem;
            color: #fca5a5;
        }
        h1 {
            color: #fff;
            font-size: 1.6rem;
            font-weight: 700;
            margin-bottom: 12px;
        }
        p {
            color: rgba(255,255,255,0.75);
            font-size: 0.95rem;
            line-height: 1.6;
            margin-bottom: 8px;
        }
        .highlight {
            color: #fca5a5;
            font-weight: 600;
        }
        .divider {
            border: none;
            border-top: 1px solid rgba(255,255,255,0.12);
            margin: 28px 0;
        }
        .info-box {
            background: rgba(255,255,255,0.07);
            border-radius: 12px;
            padding: 16px 20px;
            margin-bottom: 28px;
            text-align: left;
        }
        .info-box p {
            font-size: 0.85rem;
            margin-bottom: 4px;
            color: rgba(255,255,255,0.65);
        }
        .info-box p:last-child { margin-bottom: 0; }
        .info-box strong { color: rgba(255,255,255,0.9); }
        .btn-back {
            display: inline-block;
            padding: 12px 32px;
            background: rgba(255,255,255,0.15);
            color: #fff;
            text-decoration: none;
            border-radius: 50px;
            font-weight: 600;
            font-size: 0.9rem;
            border: 1px solid rgba(255,255,255,0.25);
            transition: background 0.2s, transform 0.1s;
        }
        .btn-back:hover {
            background: rgba(255,255,255,0.25);
            color: #fff;
            text-decoration: none;
            transform: translateY(-1px);
        }
        .logo-text {
            color: rgba(255,255,255,0.4);
            font-size: 0.75rem;
            margin-top: 28px;
            letter-spacing: 0.5px;
        }
    </style>
</head>
<body>
    <div class="card">
        <div class="icon-wrap">
            <i class="fas fa-ban"></i>
        </div>

        <h1>Akses Ditolak</h1>
        <p>
            Akun Anda <span class="highlight">tidak memiliki izin</span> untuk mengakses
            Sistem Manajemen Aset Politeknik GT.
        </p>

        <hr class="divider">

        <div class="info-box">
            <p>Aplikasi ini hanya dapat diakses oleh:</p>
            <p><strong>✓ Dosen &amp; Staf Pengajar</strong></p>
            <p><strong>✓ Tenaga Kependidikan (Tendik)</strong></p>
            <p><strong>✓ Staf Administrasi &amp; IT</strong></p>
        </div>

        <p style="font-size:0.85rem; color:rgba(255,255,255,0.5); margin-bottom: 24px;">
            Jika Anda merasa ini adalah kesalahan, hubungi administrator IT Politeknik GT.
        </p>

        <a href="<?= base_url('/sso-login'); ?>" class="btn-back">
            <i class="fas fa-sign-in-alt mr-2"></i> Masuk dengan Akun Lain
        </a>

        <p class="logo-text">POLITEKNIK GT &mdash; Sistem Manajemen Aset</p>
    </div>
</body>
</html>

