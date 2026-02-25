<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title><?= $title ?? 'BiteSpace' ?> — BiteSpace</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet">
    <link href="https://fonts.googleapis.com/css2?family=Plus+Jakarta+Sans:wght@400;500;600;700;800&family=DM+Sans:wght@300;400;500&display=swap" rel="stylesheet">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.11.3/font/bootstrap-icons.min.css" rel="stylesheet">
    <style>
        :root {
            --navy:       #0D1B3E;
            --sky:        #4BA3C3;
            --tosca:      #2EC4B6;
            --purple:     #9B89C4;
            --yellow:     #FFD166;
            --deep:       #39007E;
            --dark:       #1A1A2E;
            --sidebar-w:  240px;
            --text-muted: #8A8FAB;
            --border:     #ECEEF5;
            --bg:         #F5F6FA;
        }

        * { box-sizing: border-box; }
        body {
            font-family: 'DM Sans', sans-serif;
            background: var(--bg);
            margin: 0;
            min-height: 100vh;
        }

        /* ══ SIDEBAR ══ */
        .sidebar {
            position: fixed;
            top: 0; left: 0;
            width: var(--sidebar-w);
            height: 100vh;
            background: var(--navy);
            display: flex;
            flex-direction: column;
            z-index: 100;
            transition: transform 0.3s ease;
            overflow-y: auto;
        }

        .sidebar-brand {
            padding: 22px 20px 18px;
            display: flex;
            align-items: center;
            gap: 10px;
            border-bottom: 1px solid rgba(255,255,255,0.07);
            flex-shrink: 0;
        }

        .brand-icon {
            width: 38px; height: 38px;
            background: linear-gradient(135deg, var(--tosca), var(--sky));
            border-radius: 10px;
            display: flex; align-items: center; justify-content: center;
            font-size: 18px;
            flex-shrink: 0;
            box-shadow: 0 4px 12px rgba(46,196,182,0.3);
        }

        .brand-name {
            font-family: 'Plus Jakarta Sans', sans-serif;
            font-weight: 800;
            font-size: 18px;
            color: #fff;
        }
        .brand-name span { color: var(--yellow); }

        /* Nav */
        .sidebar-nav {
            flex: 1;
            padding: 12px;
            overflow-y: auto;
        }

        .nav-label {
            font-size: 10px;
            font-weight: 700;
            letter-spacing: 1.2px;
            text-transform: uppercase;
            color: rgba(255,255,255,0.28);
            padding: 16px 8px 6px;
        }

        .nav-item {
            display: flex;
            align-items: center;
            gap: 10px;
            padding: 10px 12px;
            border-radius: 10px;
            color: rgba(255,255,255,0.55);
            font-size: 13.5px;
            font-weight: 500;
            text-decoration: none;
            margin-bottom: 2px;
            transition: all 0.18s;
        }

        .nav-item i {
            font-size: 16px;
            width: 20px;
            text-align: center;
            flex-shrink: 0;
        }

        .nav-item:hover {
            background: rgba(255,255,255,0.07);
            color: rgba(255,255,255,0.9);
        }

        .nav-item.active {
            background: rgba(46,196,182,0.15);
            color: #fff;
            font-weight: 600;
        }
        .nav-item.active i { color: var(--tosca); }

        /* Sidebar footer */
        .sidebar-footer {
            padding: 14px 12px;
            border-top: 1px solid rgba(255,255,255,0.07);
            flex-shrink: 0;
        }

        .user-card {
            display: flex;
            align-items: center;
            gap: 10px;
            padding: 10px 12px;
            border-radius: 10px;
            background: rgba(255,255,255,0.06);
            margin-bottom: 8px;
            text-decoration: none;
            transition: background 0.2s;
        }
        .user-card:hover { background: rgba(255,255,255,0.1); }

        .user-avatar {
            width: 36px; height: 36px;
            background: linear-gradient(135deg, var(--tosca), var(--sky));
            border-radius: 10px;
            display: flex; align-items: center; justify-content: center;
            font-weight: 700;
            color: #fff;
            font-size: 14px;
            font-family: 'Plus Jakarta Sans', sans-serif;
            flex-shrink: 0;
        }

        .user-name {
            font-size: 13px;
            font-weight: 600;
            color: #fff;
            line-height: 1.2;
            white-space: nowrap;
            overflow: hidden;
            text-overflow: ellipsis;
        }

        .user-role { font-size: 11px; color: rgba(255,255,255,0.4); }

        .btn-logout {
            display: flex;
            align-items: center;
            gap: 8px;
            width: 100%;
            padding: 9px 12px;
            border: none;
            background: rgba(255,255,255,0.05);
            color: rgba(255,255,255,0.5);
            border-radius: 9px;
            font-size: 13px;
            font-family: 'DM Sans', sans-serif;
            cursor: pointer;
            transition: all 0.2s;
            text-decoration: none;
        }
        .btn-logout:hover { background: rgba(220,53,69,0.15); color: #ff6b7a; }

        /* ══ MAIN CONTENT ══ */
        .main-wrap {
            margin-left: var(--sidebar-w);
            min-height: 100vh;
            display: flex;
            flex-direction: column;
        }

        .topbar {
            background: #fff;
            border-bottom: 1px solid var(--border);
            padding: 0 28px;
            height: 64px;
            display: flex;
            align-items: center;
            justify-content: space-between;
            position: sticky;
            top: 0;
            z-index: 99;
        }

        .topbar-title {
            font-family: 'Plus Jakarta Sans', sans-serif;
            font-weight: 700;
            font-size: 18px;
            color: var(--dark);
        }

        .topbar-right { display: flex; align-items: center; gap: 12px; }

        .topbar-date {
            font-size: 13px;
            color: var(--text-muted);
            background: var(--bg);
            padding: 6px 14px;
            border-radius: 8px;
            border: 1px solid var(--border);
        }

        .topbar-badge {
            font-size: 12px;
            font-weight: 700;
            padding: 5px 14px;
            border-radius: 8px;
            font-family: 'Plus Jakarta Sans', sans-serif;
        }
        .badge-admin { background: rgba(46,196,182,0.12); color: #0e9088; }
        .badge-kasir { background: rgba(255,209,102,0.18); color: #a07800; }

        .page-content { flex: 1; padding: 28px; }

        .flash-area { padding: 20px 28px 0; }
        .flash-alert {
            border-radius: 12px;
            font-size: 13.5px;
            padding: 12px 18px;
            display: flex;
            align-items: center;
            gap: 10px;
            border: none;
            margin-bottom: 0;
        }

        .hamburger {
            display: none;
            background: none;
            border: none;
            font-size: 22px;
            color: var(--dark);
            cursor: pointer;
            padding: 4px;
        }

        @media (max-width: 768px) {
            .sidebar { transform: translateX(-100%); }
            .sidebar.open { transform: translateX(0); }
            .main-wrap { margin-left: 0; }
            .hamburger { display: block; }
            .topbar-date { display: none; }
            .page-content { padding: 20px 16px; }
        }
    </style>
</head>
<body>

<?php $role = session()->get('role'); ?>

<!-- ══ SIDEBAR ══ -->
<aside class="sidebar" id="sidebar">
    <div class="sidebar-brand">
        <div class="brand-icon">🍽️</div>
        <div class="brand-name">Bite<span>Space</span></div>
    </div>

    <nav class="sidebar-nav">

        <!-- ── UTAMA (semua role) ── -->
        <div class="nav-label">Utama</div>

        <a href="<?= base_url('dashboard') ?>"
           class="nav-item <?= uri_string() === 'dashboard' ? 'active' : '' ?>">
            <i class="bi bi-grid-1x2"></i> Dashboard
        </a>

        <a href="<?= base_url('transaksi') ?>"
           class="nav-item <?= str_starts_with(uri_string(), 'transaksi') ? 'active' : '' ?>">
            <i class="bi bi-receipt"></i> Transaksi
        </a>

        <?php if ($role === 'admin'): ?>
        <!-- ── MANAJEMEN (admin only) ── -->
        <div class="nav-label">Manajemen</div>

        <a href="<?= base_url('menu') ?>"
           class="nav-item <?= str_starts_with(uri_string(), 'menu') ? 'active' : '' ?>">
            <i class="bi bi-book-half"></i> Menu
        </a>

        <a href="<?= base_url('promo') ?>"
           class="nav-item <?= str_starts_with(uri_string(), 'promo') ? 'active' : '' ?>">
            <i class="bi bi-ticket-perforated"></i> Promo
        </a>

        <a href="<?= base_url('table') ?>"
           class="nav-item <?= str_starts_with(uri_string(), 'table') ? 'active' : '' ?>">
            <i class="bi bi-layout-three-columns"></i> Meja
        </a>

        <a href="<?= base_url('employee') ?>"
           class="nav-item <?= str_starts_with(uri_string(), 'employee') ? 'active' : '' ?>">
            <i class="bi bi-people"></i> Employee
        </a>
        <?php endif; ?>

        <!-- ── LAPORAN (semua role, tapi data berbeda) ── -->
        <div class="nav-label">Laporan</div>

        <a href="<?= base_url('laporan') ?>"
           class="nav-item <?= str_starts_with(uri_string(), 'laporan') ? 'active' : '' ?>">
            <i class="bi bi-bar-chart-line"></i> Laporan Keuangan
        </a>

        <!-- ── AKUN (semua role) ── -->
        <div class="nav-label">Akun</div>

        <a href="<?= base_url('profile') ?>"
           class="nav-item <?= str_starts_with(uri_string(), 'profile') ? 'active' : '' ?>">
            <i class="bi bi-person-circle"></i> Profil Saya
        </a>

    </nav>

    <div class="sidebar-footer">
        <a href="<?= base_url('profile') ?>" class="user-card">
            <div class="user-avatar">
                <?= strtoupper(substr(session()->get('nama_lengkap') ?? 'U', 0, 1)) ?>
            </div>
            <div style="flex:1; min-width:0;">
                <div class="user-name"><?= esc(session()->get('nama_lengkap')) ?></div>
                <div class="user-role"><?= ucfirst(session()->get('role')) ?></div>
            </div>
            <i class="bi bi-chevron-right" style="color:rgba(255,255,255,0.2); font-size:12px; flex-shrink:0;"></i>
        </a>
        <a href="<?= base_url('logout') ?>" class="btn-logout">
            <i class="bi bi-box-arrow-left"></i> Keluar
        </a>
    </div>
</aside>

<!-- ══ MAIN CONTENT ══ -->
<div class="main-wrap">
    <div class="topbar">
        <div class="d-flex align-items-center gap-3">
            <button class="hamburger" onclick="toggleSidebar()">
                <i class="bi bi-list"></i>
            </button>
            <div class="topbar-title"><?= $title ?? 'BiteSpace' ?></div>
        </div>
        <div class="topbar-right">
            <div class="topbar-date">
                <i class="bi bi-calendar3 me-1"></i>
                <?= date('l, d F Y') ?>
            </div>
            <div class="topbar-badge <?= $role === 'admin' ? 'badge-admin' : 'badge-kasir' ?>">
                <?= ucfirst($role) ?>
            </div>
        </div>
    </div>

    <!-- Flash messages -->
    <?php if (session()->getFlashdata('success') || session()->getFlashdata('error')): ?>
    <div class="flash-area">
        <?php if (session()->getFlashdata('success')): ?>
            <div class="flash-alert alert alert-success">
                <i class="bi bi-check-circle-fill"></i>
                <?= session()->getFlashdata('success') ?>
            </div>
        <?php endif; ?>
        <?php if (session()->getFlashdata('error')): ?>
            <div class="flash-alert alert alert-danger">
                <i class="bi bi-exclamation-circle-fill"></i>
                <?= session()->getFlashdata('error') ?>
            </div>
        <?php endif; ?>
    </div>
    <?php endif; ?>

    <div class="page-content">
        <?= view($content) ?>
    </div>
</div>

<!-- Overlay mobile -->
<div id="overlay" onclick="toggleSidebar()"
     style="display:none; position:fixed; inset:0; background:rgba(0,0,0,0.5); z-index:99;"></div>

<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js"></script>
<script src="https://cdn.jsdelivr.net/npm/chart.js@4.4.3/dist/chart.umd.min.js"></script>
<script>
    function toggleSidebar() {
        document.getElementById('sidebar').classList.toggle('open');
        const ov = document.getElementById('overlay');
        ov.style.display = ov.style.display === 'none' ? 'block' : 'none';
    }
</script>

<?php if (isset($extraJs)): ?>
    <?= $extraJs ?>
<?php endif; ?>

</body>
</html>