<style>
    /* ══ PALETTE OVERRIDE (BiteSpace) ══
       --tosca  : #2EC4B6
       --sky    : #4BA3C3
       --yellow : #FFD166
       --navy   : #0D1B3E
       --dark   : #1A1A2E
    ══════════════════════════════════ */

    .profile-hero {
        background: linear-gradient(135deg, var(--navy) 0%, #162952 100%);
        border-radius: 20px;
        padding: 36px 40px;
        display: flex;
        align-items: center;
        justify-content: space-between;
        position: relative;
        overflow: hidden;
        margin-bottom: 24px;
        animation: fadeUp 0.4s ease both;
    }
    .profile-hero::before {
        content: '';
        position: absolute;
        width: 320px; height: 320px;
        background: radial-gradient(circle, rgba(155,137,196,0.28) 0%, transparent 65%);
        top: -90px; right: -60px;
        pointer-events: none;
    }
    .profile-hero::after {
        content: '';
        position: absolute;
        width: 200px; height: 200px;
        background: radial-gradient(circle, rgba(255,209,102,0.12) 0%, transparent 65%);
        bottom: -60px; left: 220px;
        pointer-events: none;
    }

    .avatar-hero {
        width: 90px; height: 90px;
        border-radius: 22px;
        background: linear-gradient(135deg, var(--sky), var(--purple));
        display: flex; align-items: center; justify-content: center;
        font-family: 'Plus Jakarta Sans', sans-serif;
        font-weight: 800;
        font-size: 36px;
        color: #fff;
        flex-shrink: 0;
        position: relative;
        z-index: 2;
        box-shadow: 0 8px 24px rgba(75,163,195,0.4);
    }

    .profile-hero-left { display: flex; align-items: center; gap: 28px; position: relative; z-index: 2; }

    .profile-hero-name {
        font-family: 'Plus Jakarta Sans', sans-serif;
        font-weight: 800;
        font-size: 26px;
        color: #fff;
        margin-bottom: 6px;
    }

    .profile-hero-meta { display: flex; align-items: center; gap: 12px; flex-wrap: wrap; }

    .role-badge {
        background: rgba(75,163,195,0.2);
        border: 1px solid rgba(75,163,195,0.4);
        color: #a8d8ea;
        font-size: 12px;
        font-weight: 700;
        padding: 4px 12px;
        border-radius: 8px;
        font-family: 'Plus Jakarta Sans', sans-serif;
        text-transform: uppercase;
        letter-spacing: 0.5px;
    }

    .profile-hero-email,
    .profile-hero-joined {
        font-size: 13px;
        color: rgba(255,255,255,0.5);
        display: flex;
        align-items: center;
        gap: 5px;
    }

    .btn-edit-profile {
        position: relative; z-index: 2;
        background: rgba(255,209,102,0.15);
        border: 1px solid rgba(255,209,102,0.35);
        color: var(--yellow);
        padding: 10px 20px;
        border-radius: 11px;
        font-family: 'Plus Jakarta Sans', sans-serif;
        font-weight: 600;
        font-size: 13px;
        text-decoration: none;
        display: flex; align-items: center; gap: 8px;
        transition: all 0.2s;
        backdrop-filter: blur(8px);
    }
    .btn-edit-profile:hover {
        background: var(--yellow);
        border-color: var(--yellow);
        color: var(--navy);
        transform: translateY(-1px);
    }

    /* ── Info Cards ── */
    .info-card {
        background: #fff;
        border-radius: 16px;
        border: 1px solid var(--border);
        overflow: hidden;
        animation: fadeUp 0.4s ease both;
    }
    .info-card:nth-child(1) { animation-delay: 0.05s; }
    .info-card:nth-child(2) { animation-delay: 0.10s; }

    .info-card-header {
        padding: 18px 24px;
        border-bottom: 1px solid var(--border);
        display: flex; align-items: center; gap: 10px;
    }

    .info-card-icon {
        width: 36px; height: 36px;
        border-radius: 10px;
        display: flex; align-items: center; justify-content: center;
        font-size: 16px;
    }

    .info-card-title {
        font-family: 'Plus Jakarta Sans', sans-serif;
        font-weight: 700;
        font-size: 15px;
        color: var(--dark);
    }

    .info-card-body { padding: 8px 24px 20px; }

    .info-row {
        display: flex; align-items: center;
        padding: 14px 0;
        border-bottom: 1px solid var(--border);
    }
    .info-row:last-child { border-bottom: none; }

    .info-row-label {
        width: 160px;
        font-size: 12.5px;
        color: var(--text-muted);
        font-weight: 500;
        flex-shrink: 0;
    }

    .info-row-value {
        font-size: 14px;
        color: var(--dark);
        font-weight: 500;
    }

    .status-dot {
        display: inline-block;
        width: 8px; height: 8px;
        border-radius: 50%;
        margin-right: 6px;
    }

    /* role badge inside card */
    .role-pill-admin { background: rgba(75,163,195,0.15); color: #1e6e8e; padding: 4px 10px; border-radius: 7px; font-size:12px; font-weight:700; font-family:'Plus Jakarta Sans',sans-serif; }
    .role-pill-kasir { background: rgba(255,209,102,0.18); color: #a07800; padding: 4px 10px; border-radius: 7px; font-size:12px; font-weight:700; font-family:'Plus Jakarta Sans',sans-serif; }

    /* ganti password button */
    .btn-ganti-pass {
        display: inline-flex;
        align-items: center;
        gap: 8px;
        background: rgba(155,137,196,0.12);
        border: 1px solid rgba(155,137,196,0.3);
        color: #5d4a8a;
        padding: 10px 18px;
        border-radius: 10px;
        font-size: 13px;
        font-weight: 600;
        text-decoration: none;
        font-family: 'Plus Jakarta Sans', sans-serif;
        transition: all 0.2s;
    }
    .btn-ganti-pass:hover {
        background: var(--purple);
        border-color: var(--purple);
        color: #fff;
    }

    @keyframes fadeUp {
        from { opacity: 0; transform: translateY(14px); }
        to   { opacity: 1; transform: translateY(0); }
    }
</style>

<?php if (session()->getFlashdata('success')): ?>
    <div style="background:#ECFDF5; border:1px solid #A7F3D0; color:#065F46; border-radius:11px; padding:12px 16px; margin-bottom:20px; display:flex; gap:10px; align-items:center; font-size:13.5px;">
        <i class="bi bi-check-circle-fill"></i> <?= session()->getFlashdata('success') ?>
    </div>
<?php endif; ?>

<!-- ── HERO ── -->
<div class="profile-hero">
    <div class="profile-hero-left">
        <div class="avatar-hero">
            <?= strtoupper(substr($user['nama_lengkap'], 0, 1)) ?>
        </div>
        <div>
            <div class="profile-hero-name"><?= esc($user['nama_lengkap']) ?></div>
            <div class="profile-hero-meta">
                <span class="role-badge"><?= ucfirst($user['role']) ?></span>
                <?php if ($user['email']): ?>
                    <span class="profile-hero-email">
                        <i class="bi bi-envelope"></i> <?= esc($user['email']) ?>
                    </span>
                <?php endif; ?>
                <span class="profile-hero-joined">
                    <i class="bi bi-calendar3"></i>
                    Bergabung <?= date('d F Y', strtotime($user['created_at'])) ?>
                </span>
            </div>
        </div>
    </div>
    <a href="<?= base_url('profile/edit') ?>" class="btn-edit-profile">
        <i class="bi bi-pencil-square"></i> Edit Profil
    </a>
</div>

<!-- ── INFO CARDS ── -->
<div class="row g-4">

    <!-- Informasi Akun -->
    <div class="col-lg-6">
        <div class="info-card">
            <div class="info-card-header">
                <div class="info-card-icon" style="background:rgba(75,163,195,0.12);">
                    <i class="bi bi-person-badge" style="color:var(--sky);"></i>
                </div>
                <div class="info-card-title">Informasi Akun</div>
            </div>
            <div class="info-card-body">
                <div class="info-row">
                    <div class="info-row-label">Nama Lengkap</div>
                    <div class="info-row-value"><?= esc($user['nama_lengkap']) ?></div>
                </div>
                <div class="info-row">
                    <div class="info-row-label">Username</div>
                    <div class="info-row-value">
                        <code style="background:#F5F6FA; padding:3px 8px; border-radius:6px; font-size:13px;">
                            <?= esc($user['username']) ?>
                        </code>
                    </div>
                </div>
                <div class="info-row">
                    <div class="info-row-label">Email</div>
                    <div class="info-row-value">
                        <?= $user['email']
                            ? esc($user['email'])
                            : '<span style="color:var(--text-muted); font-style:italic;">Belum diisi</span>' ?>
                    </div>
                </div>
                <div class="info-row">
                    <div class="info-row-label">Role</div>
                    <div class="info-row-value">
                        <span class="<?= $user['role'] === 'admin' ? 'role-pill-admin' : 'role-pill-kasir' ?>">
                            <?= ucfirst($user['role']) ?>
                        </span>
                    </div>
                </div>
                <div class="info-row">
                    <div class="info-row-label">Status</div>
                    <div class="info-row-value">
                        <span class="status-dot"
                              style="background:<?= $user['is_active'] ? '#10B981' : '#EF4444' ?>;"></span>
                        <?= $user['is_active'] ? 'Aktif' : 'Nonaktif' ?>
                    </div>
                </div>
                <div class="info-row">
                    <div class="info-row-label">Terakhir Diupdate</div>
                    <div class="info-row-value" style="color:var(--text-muted); font-size:13px;">
                        <?= $user['updated_at']
                            ? date('d M Y, H:i', strtotime($user['updated_at']))
                            : '-' ?>
                    </div>
                </div>
            </div>
        </div>
    </div>

    <!-- Keamanan -->
    <div class="col-lg-6">
        <div class="info-card">
            <div class="info-card-header">
                <div class="info-card-icon" style="background:rgba(155,137,196,0.14);">
                    <i class="bi bi-shield-lock" style="color:var(--purple);"></i>
                </div>
                <div class="info-card-title">Keamanan</div>
            </div>
            <div class="info-card-body">
                <div class="info-row">
                    <div class="info-row-label">Password</div>
                    <div class="info-row-value">
                        <span style="letter-spacing:3px; color:var(--text-muted);">••••••••</span>
                    </div>
                </div>
                <div class="info-row">
                    <div class="info-row-label">Bergabung Sejak</div>
                    <div class="info-row-value" style="font-size:13px;">
                        <?= date('d F Y', strtotime($user['created_at'])) ?>
                    </div>
                </div>
            </div>
            <div style="padding: 0 24px 24px;">
                <a href="<?= base_url('profile/edit') ?>#ganti-password" class="btn-ganti-pass">
                    <i class="bi bi-key"></i> Ganti Password
                </a>
            </div>
        </div>
    </div>

</div>