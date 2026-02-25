<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Login — BiteSpace</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet">
    <link href="https://fonts.googleapis.com/css2?family=Playfair+Display:wght@600;700&family=Plus+Jakarta+Sans:wght@400;500;600;700;800&family=DM+Sans:wght@300;400;500&display=swap" rel="stylesheet">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.11.3/font/bootstrap-icons.min.css" rel="stylesheet">
    <style>
        :root {
            --navy:    #0D1B3E;
            --sky:     #4BA3C3;
            --tosca:   #2EC4B6;
            --purple:  #9B89C4;
            --yellow:  #FFD166;
            --white:   #FFFFFF;
            --deep-purple: #39007e;
            --text-dim: rgba(255,255,255,0.5);
        }

        * { box-sizing: border-box; margin: 0; padding: 0; }

        body {
            font-family: 'DM Sans', sans-serif;
            min-height: 100vh;
            background: var(--navy);
            display: flex;
            align-items: stretch;
            overflow: hidden;
        }

        /* Mesh BG */
        .mesh-bg { position: fixed; inset: 0; z-index: 0; pointer-events: none; overflow: hidden; }
        .mesh-bg::before {
            content: '';
            position: absolute;
            width: 700px; height: 700px;
            background: radial-gradient(circle, rgba(75,163,195,0.22) 0%, transparent 60%);
            top: -200px; left: -100px;
        }
        .mesh-bg::after {
            content: '';
            position: absolute;
            width: 600px; height: 600px;
            background: radial-gradient(circle, rgba(46,196,182,0.18) 0%, transparent 60%);
            bottom: -150px; right: 200px;
        }
        .orb-purple {
            position: absolute;
            width: 500px; height: 500px;
            background: radial-gradient(circle, rgba(155,137,196,0.15) 0%, transparent 60%);
            top: 30%; right: -100px;
        }
        .orb-yellow {
            position: absolute;
            width: 300px; height: 300px;
            background: radial-gradient(circle, rgba(255,209,102,0.1) 0%, transparent 60%);
            bottom: 10%; left: 30%;
        }

        /* Left Panel */
        .left-panel {
            width: 55%;
            position: relative;
            z-index: 1;
            display: flex;
            flex-direction: column;
            justify-content: space-between;
            padding: 48px 56px;
        }

        .brand { display: flex; align-items: center; gap: 12px; }
        .brand-logo {
            width: 46px; height: 46px;
            border-radius: 14px;
            background: linear-gradient(135deg, var(--tosca), var(--sky));
            display: flex; align-items: center; justify-content: center;
            font-size: 22px;
            box-shadow: 0 8px 20px rgba(46,196,182,0.3);
        }
        .brand-name { font-family: 'Plus Jakarta Sans', sans-serif; font-weight: 800; font-size: 22px; color: #fff; }
        .brand-name span { color: var(--yellow); }

        .hero-copy { flex: 1; display: flex; flex-direction: column; justify-content: center; padding: 40px 0; }

        .hero-eyebrow {
            display: inline-flex; align-items: center; gap: 8px;
            background: rgba(255,209,102,0.1);
            border: 1px solid rgba(255,209,102,0.2);
            color: var(--yellow);
            font-size: 12px; font-weight: 600;
            padding: 6px 14px; border-radius: 100px;
            margin-bottom: 24px; width: fit-content;
            font-family: 'Plus Jakarta Sans', sans-serif; letter-spacing: 0.5px;
        }

        .hero-title {
            font-family: 'Playfair Display', serif;
            font-weight: 700; font-size: 50px; line-height: 1.12;
            color: #fff; margin-bottom: 20px; letter-spacing: -1px;
        }
        .hero-title .ct { color: var(--tosca); }
        .hero-title .cy { color: var(--yellow); }

        .hero-desc { color: var(--text-dim); font-size: 15px; line-height: 1.8; max-width: 400px; margin-bottom: 40px; }

        .feature-grid { display: grid; grid-template-columns: 1fr 1fr; gap: 12px; max-width: 420px; }
        .feature-item {
            display: flex; align-items: center; gap: 10px;
            background: rgba(255,255,255,0.04);
            border: 1px solid rgba(255,255,255,0.08);
            border-radius: 12px; padding: 12px 16px;
            backdrop-filter: blur(10px); transition: all 0.2s;
        }
        .feature-item:hover { background: rgba(255,255,255,0.07); transform: translateY(-2px); }
        .feature-dot { width: 32px; height: 32px; border-radius: 8px; display: flex; align-items: center; justify-content: center; font-size: 15px; flex-shrink: 0; }
        .feature-text { font-size: 13px; color: rgba(255,255,255,0.7); font-weight: 500; }

        .stats-row { display: flex; gap: 32px; }
        .stat-num { font-family: 'Plus Jakarta Sans', sans-serif; font-weight: 800; font-size: 28px; color: #fff; line-height: 1; margin-bottom: 4px; }
        .stat-num span { color: var(--yellow); }
        .stat-label { font-size: 12px; color: var(--text-dim); }
        .stat-divider { width: 1px; background: rgba(255,255,255,0.1); align-self: stretch; }

        /* Right Panel */
        .right-panel {
            width: 45%;
            display: flex; align-items: center; justify-content: center;
            padding: 48px 56px;
            position: relative; z-index: 1;
        }

        .form-glass {
            width: 100%; max-width: 420px;
            background: rgba(255,255,255,0.04);
            border: 1px solid rgba(255,255,255,0.1);
            border-radius: 28px;
            padding: 44px 40px;
            backdrop-filter: blur(24px);
            box-shadow: 0 32px 80px rgba(0,0,0,0.3);
            animation: slideUp 0.6s cubic-bezier(0.16,1,0.3,1) both;
            position: relative;
        }

        .deco-line {
            position: absolute; top: 0; left: 0;
            width: 100%; height: 3px;
            background: linear-gradient(90deg, var(--tosca), var(--sky), var(--purple), var(--yellow));
            border-radius: 28px 28px 0 0;
        }

        @keyframes slideUp {
            from { opacity: 0; transform: translateY(30px); }
            to   { opacity: 1; transform: translateY(0); }
        }

        .form-title { font-family: 'Plus Jakarta Sans', sans-serif; font-weight: 800; font-size: 26px; color: #fff; margin-bottom: 6px; letter-spacing: -0.5px; }
        .form-subtitle { font-size: 14px; color: var(--text-dim); margin-bottom: 32px; }

        /* Input */
        .input-group-c { margin-bottom: 18px; }
        .input-label { font-family: 'Plus Jakarta Sans', sans-serif; font-weight: 600; font-size: 11px; color: rgba(255,255,255,0.5); letter-spacing: 1px; text-transform: uppercase; margin-bottom: 8px; display: block; }
        .input-wrap { position: relative; }
        .input-icon { position: absolute; left: 16px; top: 50%; transform: translateY(-50%); color: rgba(255,255,255,0.25); font-size: 16px; pointer-events: none; z-index: 2; }

        .form-field {
            width: 100%; height: 52px;
            padding-left: 46px; padding-right: 16px;
            background: rgba(255,255,255,0.06);
            border: 1.5px solid rgba(255,255,255,0.1);
            border-radius: 14px;
            font-size: 14px; font-family: 'DM Sans', sans-serif;
            color: #fff; transition: all 0.25s; outline: none;
        }
        .form-field::placeholder { color: rgba(255,255,255,0.2); }
        .form-field:focus {
            background: rgba(255,255,255,0.09);
            border-color: var(--tosca);
            box-shadow: 0 0 0 4px rgba(46,196,182,0.1);
        }

        .toggle-pass {
            position: absolute; right: 14px; top: 50%; transform: translateY(-50%);
            background: none; border: none; color: rgba(255,255,255,0.25);
            font-size: 17px; cursor: pointer; padding: 4px; transition: color 0.2s; z-index: 2;
        }
        .toggle-pass:hover { color: var(--tosca); }

        /* Alert */
        .alert-login { border-radius: 12px; font-size: 13px; padding: 12px 16px; margin-bottom: 20px; display: flex; align-items: center; gap: 10px; }
        .alert-err { background: rgba(239,68,68,0.1); border: 1px solid rgba(239,68,68,0.2); color: #FCA5A5; }
        .alert-ok  { background: rgba(46,196,182,0.1); border: 1px solid rgba(46,196,182,0.2); color: var(--tosca); }

        /* Button */
        .btn-submit {
            width: 100%; height: 54px;
            background: linear-gradient(135deg, var(--tosca) 0%, var(--sky) 100%);
            color: var(--navy);
            border: none; border-radius: 14px;
            font-family: 'Plus Jakarta Sans', sans-serif; font-weight: 800; font-size: 15px;
            cursor: pointer; transition: all 0.25s;
            display: flex; align-items: center; justify-content: center; gap: 8px;
            margin-top: 8px;
            box-shadow: 0 8px 24px rgba(46,196,182,0.25);
        }
        .btn-submit:hover { transform: translateY(-2px); box-shadow: 0 14px 32px rgba(46,196,182,0.35); filter: brightness(1.05); }
        .btn-submit:active { transform: translateY(0); }

        .footer-note { text-align: center; margin-top: 24px; font-size: 12px; color: rgba(255,255,255,0.18); }

        @media (max-width: 900px) {
            .left-panel { display: none; }
            .right-panel { width: 100%; padding: 32px 20px; }
            .form-glass { padding: 36px 28px; }
        }
    </style>
</head>
<body>

<div class="mesh-bg">
    <div class="orb-purple"></div>
    <div class="orb-yellow"></div>
</div>

<!-- Left -->
<div class="left-panel">
    <div class="brand">
        <div class="brand-logo">🍽️</div>
        <div class="brand-name">Bite<span>Space</span></div>
    </div>

    <div class="hero-copy">
        <div class="hero-eyebrow">✦ Dine-In POS System</div>
        <h1 class="hero-title">
            Restoran yang<br>
            <span class="ct">Terkelola</span> &<br>
            <span class="cy">Menguntungkan.</span>
        </h1>
        <p class="hero-desc">Sistem kasir modern untuk restoran dine-in. Kelola pesanan, pantau pemasukan, dan lacak performa shift — semua dalam satu platform.</p>
        <div class="feature-grid">
            <div class="feature-item">
                <div class="feature-dot" style="background:rgba(46,196,182,0.12);">🧾</div>
                <div class="feature-text">Transaksi Cepat</div>
            </div>
            <div class="feature-item">
                <div class="feature-dot" style="background:rgba(75,163,195,0.12);">📊</div>
                <div class="feature-text">Laporan Real-time</div>
            </div>
            <div class="feature-item">
                <div class="feature-dot" style="background:rgba(155,137,196,0.12);">👥</div>
                <div class="feature-text">Multi Kasir</div>
            </div>
            <div class="feature-item">
                <div class="feature-dot" style="background:rgba(255,209,102,0.12);">🪑</div>
                <div class="feature-text">Manajemen Meja</div>
            </div>
        </div>
    </div>

    <div class="stats-row">
        <div>
            <div class="stat-num">2<span>+</span></div>
            <div class="stat-label">Role Pengguna</div>
        </div>
        <div class="stat-divider"></div>
        <div>
            <div class="stat-num"><span>∞</span></div>
            <div class="stat-label">Transaksi Tercatat</div>
        </div>
        <div class="stat-divider"></div>
        <div>
            <div class="stat-num">24<span>/7</span></div>
            <div class="stat-label">Akses Sistem</div>
        </div>
    </div>
</div>

<!-- Right (Form) -->
<div class="right-panel">
    <div class="form-glass">
        <div class="deco-line"></div>

        <div class="form-title">Masuk ke Akun</div>
        <div class="form-subtitle">Selamat datang kembali 👋</div>

        <?php if (session()->getFlashdata('error')): ?>
            <div class="alert-login alert-err">
                <i class="bi bi-exclamation-circle-fill"></i>
                <?= session()->getFlashdata('error') ?>
            </div>
        <?php endif; ?>

        <?php if (session()->getFlashdata('success')): ?>
            <div class="alert-login alert-ok">
                <i class="bi bi-check-circle-fill"></i>
                <?= session()->getFlashdata('success') ?>
            </div>
        <?php endif; ?>

        <form action="<?= base_url('login') ?>" method="POST">
            <?= csrf_field() ?>

            <div class="input-group-c">
                <label class="input-label">Username</label>
                <div class="input-wrap">
                    <i class="bi bi-person input-icon"></i>
                    <input type="text" name="username" class="form-field"
                        placeholder="Masukkan username"
                        value="<?= old('username') ?>"
                        autocomplete="username" required>
                </div>
            </div>

            <div class="input-group-c">
                <label class="input-label">Password</label>
                <div class="input-wrap">
                    <i class="bi bi-lock input-icon"></i>
                    <input type="password" name="password" id="passInput" class="form-field"
                        placeholder="Masukkan password"
                        autocomplete="current-password" required>
                    <button type="button" class="toggle-pass" onclick="togglePass()">
                        <i class="bi bi-eye" id="passEye"></i>
                    </button>
                </div>
            </div>

            <button type="submit" class="btn-submit">
                <i class="bi bi-box-arrow-in-right"></i>
                Masuk Sekarang
            </button>
        </form>

        <div class="footer-note">BiteSpace &copy; <?= date('Y') ?> &nbsp;·&nbsp; Dine-In Point of Sale</div>
    </div>
</div>

<script>
function togglePass() {
    const inp = document.getElementById('passInput');
    const eye = document.getElementById('passEye');
    inp.type = inp.type === 'password' ? 'text' : 'password';
    eye.className = inp.type === 'password' ? 'bi bi-eye' : 'bi bi-eye-slash';
}
</script>
</body>
</html>