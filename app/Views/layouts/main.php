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
            --sidebar-w:  256px;
            --text-muted: #8A8FAB;
            --border:     #ECEEF5;
            --bg:         #F5F6FA;
        }

        * { box-sizing: border-box; }
        body { font-family: 'DM Sans', sans-serif; background: var(--bg); margin: 0; min-height: 100vh; }

        /* ══════════════════════════════
           SIDEBAR
        ══════════════════════════════ */
        .sidebar {
            position: fixed;
            top: 0; left: 0;
            width: var(--sidebar-w);
            height: 100vh;
            /* Deep navy base with subtle texture */
            background: linear-gradient(160deg, #0f1f42 0%, #0d1835 50%, #0a1428 100%);
            display: flex;
            flex-direction: column;
            z-index: 100;
            transition: transform 0.3s ease;
            overflow: hidden;
        }

        /* Multi-color ambient blobs */
        .sidebar-blob {
            position: absolute;
            border-radius: 50%;
            pointer-events: none;
            filter: blur(1px);
        }
        .blob-1 {
            width: 160px; height: 160px;
            background: radial-gradient(circle, rgba(75,163,195,0.22) 0%, transparent 70%);
            top: -30px; right: -50px;
        }
        .blob-2 {
            width: 140px; height: 140px;
            background: radial-gradient(circle, rgba(155,137,196,0.20) 0%, transparent 70%);
            top: 160px; left: -40px;
        }
        .blob-3 {
            width: 120px; height: 120px;
            background: radial-gradient(circle, rgba(255,209,102,0.12) 0%, transparent 70%);
            bottom: 160px; right: -30px;
        }
        .blob-4 {
            width: 130px; height: 130px;
            background: radial-gradient(circle, rgba(46,196,182,0.14) 0%, transparent 70%);
            bottom: -20px; left: -20px;
        }

        /* ── Brand ── */
        .sidebar-brand {
            padding: 20px 16px 16px;
            display: flex;
            align-items: center;
            gap: 11px;
            flex-shrink: 0;
            position: relative;
            z-index: 2;
        }

        .brand-icon {
            width: 42px; height: 42px;
            border-radius: 13px;
            display: flex; align-items: center; justify-content: center;
            font-size: 20px;
            flex-shrink: 0;
            /* Sky + purple gradient for brand */
            background: linear-gradient(135deg, var(--sky) 0%, var(--purple) 100%);
            box-shadow: 0 4px 18px rgba(75,163,195,0.5), 0 0 0 1px rgba(155,137,196,0.3);
        }

        .brand-name {
            font-family: 'Plus Jakarta Sans', sans-serif;
            font-weight: 800;
            font-size: 19px;
            /* Full rainbow gradient */
            background: linear-gradient(90deg, var(--sky) 0%, var(--purple) 50%, var(--yellow) 100%);
            -webkit-background-clip: text;
            -webkit-text-fill-color: transparent;
            background-clip: text;
            letter-spacing: -0.3px;
        }

        /* ── Divider ── */
        .sidebar-divider {
            height: 1px;
            /* Gradient divider using palette colors */
            background: linear-gradient(90deg, transparent 0%, rgba(75,163,195,0.25) 30%, rgba(155,137,196,0.25) 70%, transparent 100%);
            margin: 0 14px;
            flex-shrink: 0;
        }

        /* ── Nav ── */
        .sidebar-nav {
            flex: 1;
            padding: 8px 10px;
            overflow-y: auto;
            position: relative;
            z-index: 2;
        }
        .sidebar-nav::-webkit-scrollbar { width: 3px; }
        .sidebar-nav::-webkit-scrollbar-track { background: transparent; }
        .sidebar-nav::-webkit-scrollbar-thumb { background: rgba(255,255,255,0.08); border-radius: 99px; }

        .nav-label {
            font-size: 9.5px;
            font-weight: 700;
            letter-spacing: 1.5px;
            text-transform: uppercase;
            color: rgba(255,255,255,0.35);
            padding: 14px 10px 5px;
            display: flex;
            align-items: center;
            gap: 8px;
        }
        .nav-label::after { content: ''; flex: 1; height: 1px; background: rgba(255,255,255,0.10); }

        .nav-item {
            display: flex;
            align-items: center;
            gap: 10px;
            padding: 9px 12px;
            border-radius: 12px;
            color: rgba(255,255,255,0.6);
            font-size: 13.5px;
            font-weight: 500;
            text-decoration: none;
            margin-bottom: 3px;
            transition: all 0.18s;
            position: relative;
        }

        .nav-icon {
            width: 34px; height: 34px;
            border-radius: 10px;
            display: flex; align-items: center; justify-content: center;
            font-size: 16px;
            flex-shrink: 0;
            background: rgba(255,255,255,0.08);
            transition: all 0.2s;
            color: rgba(255,255,255,0.55);
        }

        .nav-item:hover { background: rgba(255,255,255,0.08); color: rgba(255,255,255,0.9); }
        .nav-item:hover .nav-icon { background: rgba(255,255,255,0.12); color: #fff; }

        /* Default icon tints per menu (subtle, not active) */
        .nav-item[data-color="sky"]    .nav-icon { color: rgba(75,163,195,0.7); }
        .nav-item[data-color="tosca"]  .nav-icon { color: rgba(46,196,182,0.7); }
        .nav-item[data-color="purple"] .nav-icon { color: rgba(155,137,196,0.7); }
        .nav-item[data-color="yellow"] .nav-icon { color: rgba(255,209,102,0.7); }
        .nav-item[data-color="sky2"]   .nav-icon { color: rgba(75,163,195,0.65); }
        .nav-item[data-color="deep"]   .nav-icon { color: rgba(155,137,196,0.7); }
        .nav-item[data-color="report"] .nav-icon { color: rgba(155,137,196,0.65); }
        .nav-item[data-color="profile"].nav-icon { color: rgba(46,196,182,0.65); }

        /* ── Per-route color theming ── */
        /* Dashboard → sky */
        .nav-item.active[data-color="sky"] { background: rgba(255,255,255,0.10); color: #fff; }
        .nav-item.active[data-color="sky"] .nav-icon { background: linear-gradient(135deg, #9B89C4, #2EC4B6); color: #fff; box-shadow: 0 6px 16px rgba(155,137,196,0.45); }
        .nav-item.active[data-color="sky"]::before { background: linear-gradient(180deg, #9B89C4, #2EC4B6); }

        /* Transaksi → tosca */
        .nav-item.active[data-color="tosca"] { background: rgba(255,255,255,0.10); color: #fff; }
        .nav-item.active[data-color="tosca"] .nav-icon { background: linear-gradient(135deg, #9B89C4, #2EC4B6); color: #fff; box-shadow: 0 6px 16px rgba(155,137,196,0.45); }
        .nav-item.active[data-color="tosca"]::before { background: linear-gradient(180deg, #9B89C4, #2EC4B6); }

        /* Menu → purple */
        .nav-item.active[data-color="purple"] { background: rgba(255,255,255,0.10); color: #fff; }
        .nav-item.active[data-color="purple"] .nav-icon { background: linear-gradient(135deg, #9B89C4, #2EC4B6); color: #fff; box-shadow: 0 6px 16px rgba(155,137,196,0.45); }
        .nav-item.active[data-color="purple"]::before { background: linear-gradient(180deg, #9B89C4, #2EC4B6); }

        /* Promo → yellow */
        .nav-item.active[data-color="yellow"] { background: rgba(255,255,255,0.10); color: #fff; }
        .nav-item.active[data-color="yellow"] .nav-icon { background: linear-gradient(135deg, #9B89C4, #2EC4B6); color: #fff; box-shadow: 0 6px 16px rgba(155,137,196,0.45); }
        .nav-item.active[data-color="yellow"]::before { background: linear-gradient(180deg, #9B89C4, #2EC4B6); }

        /* Meja → sky-light */
        .nav-item.active[data-color="sky2"] { background: rgba(255,255,255,0.10); color: #fff; }
        .nav-item.active[data-color="sky2"] .nav-icon { background: linear-gradient(135deg, #9B89C4, #2EC4B6); color: #fff; box-shadow: 0 6px 16px rgba(155,137,196,0.45); }
        .nav-item.active[data-color="sky2"]::before { background: linear-gradient(180deg, #9B89C4, #2EC4B6); }

        /* Employee → deep purple */
        .nav-item.active[data-color="deep"] { background: rgba(255,255,255,0.10); color: #fff; }
        .nav-item.active[data-color="deep"] .nav-icon { background: linear-gradient(135deg, #9B89C4, #2EC4B6); color: #fff; box-shadow: 0 6px 16px rgba(155,137,196,0.45); }
        .nav-item.active[data-color="deep"]::before { background: linear-gradient(180deg, #9B89C4, #2EC4B6); }

        /* Laporan → gradient deep+sky */
        .nav-item.active[data-color="report"] { background: rgba(255,255,255,0.10); color: #fff; }
        .nav-item.active[data-color="report"] .nav-icon { background: linear-gradient(135deg, #9B89C4, #2EC4B6); color: #fff; box-shadow: 0 6px 16px rgba(155,137,196,0.45); }
        .nav-item.active[data-color="report"]::before { background: linear-gradient(180deg, #9B89C4, #2EC4B6); }

        /* Profil → purple+tosca */
        .nav-item.active[data-color="profile"] { background: rgba(255,255,255,0.10); color: #fff; }
        .nav-item.active[data-color="profile"] .nav-icon { background: linear-gradient(135deg, #9B89C4, #2EC4B6); color: #fff; box-shadow: 0 6px 16px rgba(155,137,196,0.45); }
        .nav-item.active[data-color="profile"]::before { background: linear-gradient(180deg, #9B89C4, #2EC4B6); }

        /* Shared active indicator bar */
        .nav-item.active { font-weight: 600; }
        .nav-item.active::before {
            content: '';
            position: absolute;
            left: 0; top: 50%;
            transform: translateY(-50%);
            width: 3px; height: 55%;
            border-radius: 0 3px 3px 0;
        }

        /* ── Sidebar footer ── */
        .sidebar-footer {
            padding: 12px 10px;
            flex-shrink: 0;
            position: relative;
            z-index: 2;
        }

        .user-card {
            display: flex;
            align-items: center;
            gap: 10px;
            padding: 10px 12px;
            border-radius: 12px;
            background: rgba(255,255,255,0.06);
            border: 1px solid rgba(255,255,255,0.07);
            margin-bottom: 8px;
            text-decoration: none;
            transition: all 0.2s;
        }
        .user-card:hover { background: rgba(255,209,102,0.1); border-color: rgba(255,209,102,0.2); }

        .user-avatar {
            width: 36px; height: 36px;
            background: linear-gradient(135deg, var(--yellow), #fff);
            border-radius: 10px;
            display: flex; align-items: center; justify-content: center;
            font-weight: 800;
            color: var(--navy);
            font-size: 15px;
            font-family: 'Plus Jakarta Sans', sans-serif;
            flex-shrink: 0;
            box-shadow: 0 3px 12px rgba(255,209,102,0.4);
        }

        .user-name { font-size: 13px; font-weight: 600; color: #fff; line-height: 1.2; white-space: nowrap; overflow: hidden; text-overflow: ellipsis; }
        .user-role { font-size: 10.5px; color: rgba(255,255,255,0.35); font-weight: 500; }

        .btn-logout {
            display: flex; align-items: center; gap: 8px;
            width: 100%; padding: 9px 12px;
            border: 1px solid rgba(255,255,255,0.06);
            background: rgba(255,255,255,0.03);
            color: rgba(255,255,255,0.38);
            border-radius: 10px; font-size: 13px;
            font-family: 'DM Sans', sans-serif;
            cursor: pointer; transition: all 0.2s; text-decoration: none;
        }
        .btn-logout:hover { background: rgba(220,53,69,0.14); border-color: rgba(220,53,69,0.25); color: #ff7b87; }

        /* ══════════════════════════════
           TOPBAR
        ══════════════════════════════ */
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

        .topbar-right { display: flex; align-items: center; gap: 10px; }

        /* Datetime inline */
        .topbar-datetime {
            display: flex;
            align-items: center;
            gap: 10px;
            background: var(--bg);
            padding: 7px 16px;
            border-radius: 10px;
            border: 1px solid var(--border);
        }
        .topbar-clock {
            font-family: 'Plus Jakarta Sans', sans-serif;
            font-size: 15px;
            font-weight: 800;
            color: var(--dark);
            letter-spacing: 1px;
            min-width: 64px;
        }
        .topbar-dt-sep { width: 1px; height: 18px; background: var(--border); }
        .topbar-date { 
            font-size: 14px; 
            color: var(--navy); 
            font-weight: 700; 
            white-space: nowrap;
            background: rgba(75, 163, 195, 0.08);
            padding: 4px 10px;
            border-radius: 6px;
        }
        
        /* Badge — sky for admin, yellow for kasir */
        .topbar-badge {
            font-size: 12px; font-weight: 700;
            padding: 6px 14px; border-radius: 9px;
            font-family: 'Plus Jakarta Sans', sans-serif;
        }
        .badge-admin {
            background: linear-gradient(135deg, rgba(75,163,195,0.18), rgba(155,137,196,0.12));
            color: #1e6e8e;
            border: 1px solid rgba(75,163,195,0.25);
        }
        .badge-kasir {
            background: linear-gradient(135deg, rgba(255,209,102,0.25), rgba(255,209,102,0.1));
            color: #8a6200;
            border: 1px solid rgba(255,209,102,0.35);
        }

        .page-content { flex: 1; padding: 28px; }

        .flash-area { padding: 16px 28px 0; }
        .flash-alert {
            border-radius: 12px; font-size: 13.5px;
            padding: 12px 18px; display: flex;
            align-items: center; gap: 10px;
            border: none; margin-bottom: 0;
        }

        .hamburger {
            display: none; background: none; border: none;
            font-size: 22px; color: var(--dark); cursor: pointer; padding: 4px;
        }

        @media (max-width: 768px) {
            .sidebar { transform: translateX(-100%); }
            .sidebar.open { transform: translateX(0); }
            .main-wrap { margin-left: 0; }
            .hamburger { display: block; }
            .topbar-datetime { display: none; }
            .page-content { padding: 20px 16px; }
            .btn-collapse-sidebar { display: none !important; }
        }

        /* ══ Sidebar Collapsed ══ */
        .sidebar { transition: width 0.25s cubic-bezier(.4,0,.2,1); }
        .main-wrap { transition: margin-left 0.25s cubic-bezier(.4,0,.2,1); }

        .sidebar.collapsed { width: 64px; }
        .sidebar.collapsed ~ .main-wrap { margin-left: 64px; }

        /* Sembunyikan semua teks & label secara instan */
        .sidebar.collapsed .brand-name,
        .sidebar.collapsed .nav-label,
        .sidebar.collapsed .nav-item .nav-text,
        .sidebar.collapsed .user-name,
        .sidebar.collapsed .user-role,
        .sidebar.collapsed .bi-chevron-right,
        .sidebar.collapsed .logout-text {
            display: none !important;
        }

        /* Tengahkan semua item */
        .sidebar.collapsed .sidebar-brand { justify-content: center; padding: 20px 0 16px; }
        .sidebar.collapsed .nav-item { justify-content: center; padding: 9px 0; }
        .sidebar.collapsed .user-card { justify-content: center; padding: 10px 0; }
        .sidebar.collapsed .btn-logout { justify-content: center; padding: 9px 0; }
        .sidebar.collapsed .sidebar-footer { padding: 12px 8px; }

        /* Tooltip saat hover collapsed */
        .sidebar.collapsed .nav-item { position: relative; }
        .sidebar.collapsed .nav-item:hover::after {
            content: attr(data-label);
            position: absolute;
            left: calc(100% + 10px);
            top: 50%; transform: translateY(-50%);
            background: var(--navy);
            color: #fff;
            padding: 5px 12px;
            border-radius: 8px;
            font-size: 12px;
            font-weight: 600;
            white-space: nowrap;
            z-index: 300;
            font-family: 'DM Sans', sans-serif;
            box-shadow: 0 4px 14px rgba(0,0,0,0.25);
            pointer-events: none;
        }

        /* Tombol toggle di topbar */
        .btn-collapse-sidebar {
            background: none;
            border: 1.5px solid var(--border);
            border-radius: 9px;
            width: 34px; height: 34px;
            display: flex; align-items: center; justify-content: center;
            font-size: 16px; color: var(--text-muted);
            cursor: pointer; transition: all 0.18s; flex-shrink: 0;
        }
        .btn-collapse-sidebar:hover { background: var(--bg); border-color: var(--sky); color: var(--sky); }
    </style>
</head>
<body>

<?php $role = session()->get('role'); ?>

<!-- ══ SIDEBAR ══ -->
<aside class="sidebar" id="sidebar">
    <!-- Ambient color blobs -->
    <div class="sidebar-blob blob-1"></div>
    <div class="sidebar-blob blob-2"></div>
    <div class="sidebar-blob blob-3"></div>
    <div class="sidebar-blob blob-4"></div>

    <div class="sidebar-brand">
        <div class="brand-icon">🍽️</div>
        <div class="brand-name">BiteSpace</div>
    </div>
    <div class="sidebar-divider"></div>

    <nav class="sidebar-nav">

        <div class="nav-label">Utama</div>

        <a href="<?= base_url('dashboard') ?>"
           data-color="sky" data-label="Dashboard"
           class="nav-item <?= uri_string() === 'dashboard' ? 'active' : '' ?>">
            <div class="nav-icon"><i class="bi bi-grid-1x2-fill"></i></div>
            <span class="nav-text">Dashboard</span>
        </a>

        <a href="<?= base_url('transaksi') ?>"
           data-color="tosca" data-label="Transaksi"
           class="nav-item <?= str_starts_with(uri_string(), 'transaksi') ? 'active' : '' ?>">
            <div class="nav-icon"><i class="bi bi-receipt"></i></div>
            <span class="nav-text">Transaksi</span>
        </a>

        <?php if ($role === 'admin'): ?>
        <div class="nav-label">Manajemen</div>

        <a href="<?= base_url('menu') ?>"
           data-color="purple" data-label="Menu"
           class="nav-item <?= str_starts_with(uri_string(), 'menu') ? 'active' : '' ?>">
            <div class="nav-icon"><i class="bi bi-book-half"></i></div>
            <span class="nav-text">Menu</span>
        </a>

        <a href="<?= base_url('promo') ?>"
           data-color="yellow" data-label="Promo"
           class="nav-item <?= str_starts_with(uri_string(), 'promo') ? 'active' : '' ?>">
            <div class="nav-icon"><i class="bi bi-ticket-perforated-fill"></i></div>
            <span class="nav-text">Promo</span>
        </a>

        <a href="<?= base_url('table') ?>"
           data-color="sky2" data-label="Meja"
           class="nav-item <?= str_starts_with(uri_string(), 'table') ? 'active' : '' ?>">
            <div class="nav-icon"><i class="bi bi-grid-3x3-gap-fill"></i></div>
            <span class="nav-text">Meja</span>
        </a>

        <a href="<?= base_url('employee') ?>"
           data-color="deep" data-label="Employee"
           class="nav-item <?= str_starts_with(uri_string(), 'employee') ? 'active' : '' ?>">
            <div class="nav-icon"><i class="bi bi-people-fill"></i></div>
            <span class="nav-text">Employee</span>
        </a>

        <div class="nav-label">Laporan</div>

        <a href="<?= base_url('laporan') ?>"
           data-color="report" data-label="Laporan Keuangan"
           class="nav-item <?= str_starts_with(uri_string(), 'laporan') ? 'active' : '' ?>">
            <div class="nav-icon"><i class="bi bi-bar-chart-line-fill"></i></div>
            <span class="nav-text">Laporan Keuangan</span>
        </a>

        <?php endif; ?>

        <?php if ($role === 'kasir'): ?>
        <div class="nav-label">Kelola</div>

        <a href="<?= base_url('menu') ?>"
           data-color="purple" data-label="Menu"
           class="nav-item <?= str_starts_with(uri_string(), 'menu') ? 'active' : '' ?>">
            <div class="nav-icon"><i class="bi bi-book-half"></i></div>
            <span class="nav-text">Menu</span>
        </a>

        <a href="<?= base_url('table') ?>"
           data-color="sky2" data-label="Meja"
           class="nav-item <?= str_starts_with(uri_string(), 'table') ? 'active' : '' ?>">
            <div class="nav-icon"><i class="bi bi-grid-3x3-gap-fill"></i></div>
            <span class="nav-text">Meja</span>
        </a>

        <div class="nav-label">Laporan</div>

        <a href="<?= base_url('laporan') ?>"
           data-color="report" data-label="Laporan Keuangan"
           class="nav-item <?= str_starts_with(uri_string(), 'laporan') ? 'active' : '' ?>">
            <div class="nav-icon"><i class="bi bi-bar-chart-line-fill"></i></div>
            <span class="nav-text">Laporan Keuangan</span>
        </a>

        <?php endif; ?>

        <div class="nav-label">Akun</div>

        <a href="<?= base_url('profile') ?>"
           data-color="profile" data-label="Profil Saya"
           class="nav-item <?= str_starts_with(uri_string(), 'profile') ? 'active' : '' ?>">
            <div class="nav-icon"><i class="bi bi-person-circle"></i></div>
            <span class="nav-text">Profil Saya</span>
        </a>

    </nav>

    <div class="sidebar-divider"></div>
    <div class="sidebar-footer">
        <a href="<?= base_url('profile') ?>" class="user-card">
            <div class="user-avatar">
                <?= strtoupper(substr(session()->get('nama_lengkap') ?? 'U', 0, 1)) ?>
            </div>
            <div style="flex:1; min-width:0;">
                <div class="user-name"><?= esc(session()->get('nama_lengkap')) ?></div>
                <div class="user-role"><?= ucfirst(session()->get('role')) ?></div>
            </div>
            <i class="bi bi-chevron-right" style="color:rgba(255,255,255,0.18); font-size:11px; flex-shrink:0;"></i>
        </a>
        <a href="<?= base_url('logout') ?>" class="btn-logout">
            <i class="bi bi-box-arrow-left"></i> <span class="logout-text">Keluar</span>
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
            <button class="btn-collapse-sidebar" onclick="collapseSidebar()" title="Toggle Sidebar">
                <i class="bi bi-layout-sidebar" id="collapseIcon"></i>
            </button>
            <div class="topbar-title"><?= $title ?? 'BiteSpace' ?></div>
        </div>
        <div class="topbar-right">
            <div class="topbar-datetime">
                <i class="bi bi-clock" style="color:var(--purple); font-size:14px;"></i>
                <div class="topbar-clock" id="realtimeClock">00:00:00</div>
                <div class="topbar-dt-sep"></div>
                <i class="bi bi-calendar3" style="color:var(--sky); font-size:13px;"></i>
                <div class="topbar-date"><?= date('l, d F Y') ?></div>
            </div>
            <div class="topbar-badge <?= $role === 'admin' ? 'badge-admin' : 'badge-kasir' ?>">
                <i class="bi bi-<?= $role === 'admin' ? 'shield-fill' : 'star-fill' ?> me-1"></i>
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

    function collapseSidebar() {
        const sidebar   = document.getElementById('sidebar');
        const icon      = document.getElementById('collapseIcon');
        const collapsed = sidebar.classList.toggle('collapsed');
        icon.className  = collapsed ? 'bi bi-layout-sidebar-reverse' : 'bi bi-layout-sidebar';
        localStorage.setItem('sidebarCollapsed', collapsed ? '1' : '0');
    }

    // Restore state
    (function() {
        if (localStorage.getItem('sidebarCollapsed') === '1') {
            document.getElementById('sidebar').classList.add('collapsed');
            const icon = document.getElementById('collapseIcon');
            if (icon) icon.className = 'bi bi-layout-sidebar-reverse';
        }
    })();

    (function() {
        function updateClock() {
            const now = new Date();
            const hh  = String(now.getHours()).padStart(2,'0');
            const mm  = String(now.getMinutes()).padStart(2,'0');
            const ss  = String(now.getSeconds()).padStart(2,'0');
            const el  = document.getElementById('realtimeClock');
            if (el) el.textContent = hh + ':' + mm + ':' + ss;
        }
        updateClock();
        setInterval(updateClock, 1000);
    })();
</script>

<?php if (isset($extraJs)): ?>
    <?= $extraJs ?>
<?php endif; ?>

</body>
</html>