<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title><?= $title ?? 'RestoPos' ?> — RestoPos</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet">
    <link href="https://fonts.googleapis.com/css2?family=Plus+Jakarta+Sans:wght@400;500;600;700;800&family=DM+Sans:wght@300;400;500&display=swap" rel="stylesheet">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.11.3/font/bootstrap-icons.min.css" rel="stylesheet">
    <style>
        :root {
            --primary:    #E8622A;
            --primary-dk: #C94E1C;
            --primary-lt: #FFF0EA;
            --dark:       #1A1A2E;
            --dark-2:     #16213E;
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
            background: var(--dark);
            display: flex;
            flex-direction: column;
            z-index: 100;
            transition: transform 0.3s ease;
        }

        .sidebar-brand {
            padding: 24px 20px 20px;
            display: flex;
            align-items: center;
            gap: 10px;
            border-bottom: 1px solid rgba(255,255,255,0.07);
        }

        .brand-icon {
            width: 38px; height: 38px;
            background: var(--primary);
            border-radius: 10px;
            display: flex; align-items: center; justify-content: center;
            font-size: 18px;
            flex-shrink: 0;
        }

        .brand-name {
            font-family: 'Plus Jakarta Sans', sans-serif;
            font-weight: 800;
            font-size: 18px;
            color: #fff;
        }

        .brand-name span { color: var(--primary); }

        /* Nav */
        .sidebar-nav {
            flex: 1;
            padding: 16px 12px;
            overflow-y: auto;
        }

        .nav-label {
            font-size: 10px;
            font-weight: 700;
            letter-spacing: 1.2px;
            text-transform: uppercase;
            color: rgba(255,255,255,0.3);
            padding: 14px 8px 6px;
        }

        .nav-item {
            display: flex;
            align-items: center;
            gap: 10px;
            padding: 11px 12px;
            border-radius: 10px;
            color: rgba(255,255,255,0.55);
            font-size: 14px;
            font-weight: 500;
            text-decoration: none;
            margin-bottom: 2px;
            transition: all 0.2s;
            cursor: pointer;
        }

        .nav-item i {
            font-size: 17px;
            width: 20px;
            text-align: center;
        }

        .nav-item:hover {
            background: rgba(255,255,255,0.07);
            color: rgba(255,255,255,0.9);
        }

        .nav-item.active {
            background: rgba(232,98,42,0.2);
            color: #fff;
            font-weight: 600;
        }

        .nav-item.active i { color: var(--primary); }

        /* Sidebar footer */
        .sidebar-footer {
            padding: 16px 12px;
            border-top: 1px solid rgba(255,255,255,0.07);
        }

        .user-card {
            display: flex;
            align-items: center;
            gap: 10px;
            padding: 10px 12px;
            border-radius: 10px;
            background: rgba(255,255,255,0.06);
            margin-bottom: 8px;
        }

        .user-avatar {
            width: 36px; height: 36px;
            background: var(--primary);
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
        }

        .user-role {
            font-size: 11px;
            color: rgba(255,255,255,0.4);
        }

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

        .btn-logout:hover {
            background: rgba(220,53,69,0.15);
            color: #ff6b7a;
        }

        /* ══ MAIN CONTENT ══ */
        .main-wrap {
            margin-left: var(--sidebar-w);
            min-height: 100vh;
            display: flex;
            flex-direction: column;
        }

        /* Topbar */
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

        .topbar-right {
            display: flex;
            align-items: center;
            gap: 12px;
        }

        .topbar-date {
            font-size: 13px;
            color: var(--text-muted);
            background: var(--bg);
            padding: 6px 14px;
            border-radius: 8px;
            border: 1px solid var(--border);
        }

        .topbar-badge {
            background: var(--primary-lt);
            color: var(--primary);
            font-size: 12px;
            font-weight: 600;
            padding: 5px 12px;
            border-radius: 8px;
            font-family: 'Plus Jakarta Sans', sans-serif;
        }

        /* Page content */
        .page-content {
            flex: 1;
            padding: 28px;
        }

        /* Alert flash */
        .flash-alert {
            border-radius: 12px;
            font-size: 13.5px;
            padding: 12px 16px;
            margin-bottom: 20px;
            display: flex;
            align-items: center;
            gap: 10px;
            border: none;
        }

        /* Hamburger for mobile */
        .hamburger {
            display: none;
            background: none;
            border: none;
            font-size: 22px;
            color: var(--dark);
            cursor: pointer;
        }

        @media (max-width: 768px) {
            .sidebar { transform: translateX(-100%); }
            .sidebar.open { transform: translateX(0); }
            .main-wrap { margin-left: 0; }
            .hamburger { display: block; }
            .topbar-date { display: none; }
        }
    </style>
</head>
<body>

    <!-- ══ SIDEBAR ══ -->
    <aside class="sidebar" id="sidebar">
        <div class="sidebar-brand">
            <div class="brand-icon">🍽️</div>
            <div class="brand-name">Resto<span>Pos</span></div>
        </div>

        <nav class="sidebar-nav">
            <div class="nav-label">Menu Utama</div>

            <a href="<?= base_url('dashboard') ?>" class="nav-item <?= uri_string() === 'dashboard' ? 'active' : '' ?>">
                <i class="bi bi-grid-1x2"></i> Dashboard
            </a>

            <a href="<?= base_url('transaksi') ?>" class="nav-item <?= str_starts_with(uri_string(), 'transaksi') ? 'active' : '' ?>">
                <i class="bi bi-receipt"></i> Transaksi
            </a>

            <div class="nav-label">Manajemen</div>

            <a href="<?= base_url('menu') ?>" class="nav-item <?= str_starts_with(uri_string(), 'menu') ? 'active' : '' ?>">
                <i class="bi bi-book"></i> Menu
            </a>

            <?php if (session()->get('role') === 'admin'): ?>
            <a href="<?= base_url('employee') ?>" class="nav-item <?= str_starts_with(uri_string(), 'employee') ? 'active' : '' ?>">
                <i class="bi bi-people"></i> Employee
            </a>
            <?php endif; ?>

            <div class="nav-label">Akun</div>

            <a href="<?= base_url('profile') ?>" class="nav-item <?= str_starts_with(uri_string(), 'profile') ? 'active' : '' ?>">
                <i class="bi bi-person-circle"></i> Profil Saya
            </a>

            <div class="nav-label">Laporan</div>

            <a href="<?= base_url('laporan') ?>" class="nav-item <?= str_starts_with(uri_string(), 'laporan') ? 'active' : '' ?>">
                <i class="bi bi-bar-chart-line"></i> Laporan Transaksi
            </a>

            <a href="<?= base_url('laporan/income') ?>" class="nav-item <?= uri_string() === 'laporan/income' ? 'active' : '' ?>">
                <i class="bi bi-wallet2"></i> Income Bulanan
            </a>
        </nav>

        <div class="sidebar-footer">
            <a href="<?= base_url('profile') ?>" class="user-card" style="text-decoration:none; transition: background 0.2s;" onmouseover="this.style.background='rgba(255,255,255,0.1)'" onmouseout="this.style.background='rgba(255,255,255,0.06)'">
                <div class="user-avatar"><?= strtoupper(substr(session()->get('nama_lengkap') ?? 'U', 0, 1)) ?></div>
                <div style="flex:1; min-width:0;">
                    <div class="user-name"><?= esc(session()->get('nama_lengkap')) ?></div>
                    <div class="user-role"><?= ucfirst(session()->get('role')) ?></div>
                </div>
                <i class="bi bi-chevron-right" style="color:rgba(255,255,255,0.25); font-size:13px; flex-shrink:0;"></i>
            </a>
            <a href="<?= base_url('logout') ?>" class="btn-logout">
                <i class="bi bi-box-arrow-left"></i> Keluar
            </a>
        </div>
    </aside>

    <!-- ══ MAIN CONTENT ══ -->
    <div class="main-wrap">
        <!-- Topbar -->
        <div class="topbar">
            <div class="d-flex align-items-center gap-3">
                <button class="hamburger" onclick="toggleSidebar()">
                    <i class="bi bi-list"></i>
                </button>
                <div class="topbar-title"><?= $title ?? 'RestoPos' ?></div>
            </div>
            <div class="topbar-right">
                <div class="topbar-date">
                    <i class="bi bi-calendar3 me-1"></i>
                    <?= date('l, d F Y') ?>
                </div>
                <div class="topbar-badge">
                    <?= ucfirst(session()->get('role')) ?>
                </div>
            </div>
        </div>

        <!-- Flash messages -->
        <div style="padding: 0 28px; padding-top: 16px;">
            <?php if (session()->getFlashdata('success')): ?>
                <div class="flash-alert alert alert-success">
                    <i class="bi bi-check-circle-fill me-2"></i>
                    <?= session()->getFlashdata('success') ?>
                </div>
            <?php endif; ?>
            <?php if (session()->getFlashdata('error')): ?>
                <div class="flash-alert alert alert-danger">
                    <i class="bi bi-exclamation-circle-fill me-2"></i>
                    <?= session()->getFlashdata('error') ?>
                </div>
            <?php endif; ?>
        </div>

        <!-- Page content -->
        <div class="page-content">
            <?= view($content) ?>
        </div>
    </div>

    <!-- Overlay for mobile sidebar -->
    <div id="overlay" onclick="toggleSidebar()"
        style="display:none; position:fixed; inset:0; background:rgba(0,0,0,0.5); z-index:99;"></div>

    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/chart.js@4.4.3/dist/chart.umd.min.js"></script>
    <script>
        function toggleSidebar() {
            document.getElementById('sidebar').classList.toggle('open');
            const overlay = document.getElementById('overlay');
            overlay.style.display = overlay.style.display === 'none' ? 'block' : 'none';
        }
    </script>

    <?php if (isset($extraJs)): ?>
        <?= $extraJs ?>
    <?php endif; ?>

</body>
</html>