<style>
    .profile-hero {
        background: linear-gradient(135deg, var(--dark) 0%, #2C3E6B 100%);
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
        width: 300px; height: 300px;
        background: radial-gradient(circle, rgba(232,98,42,0.3) 0%, transparent 70%);
        top: -80px; right: -60px;
        pointer-events: none;
    }
    .profile-hero::after {
        content: '';
        position: absolute;
        width: 200px; height: 200px;
        background: radial-gradient(circle, rgba(232,98,42,0.15) 0%, transparent 70%);
        bottom: -60px; left: 200px;
        pointer-events: none;
    }
    .avatar-hero {
        width: 90px; height: 90px;
        border-radius: 22px;
        background: var(--primary);
        display: flex; align-items: center; justify-content: center;
        font-family: 'Plus Jakarta Sans', sans-serif;
        font-weight: 800;
        font-size: 36px;
        color: #fff;
        flex-shrink: 0;
        position: relative;
        z-index: 2;
        box-shadow: 0 8px 24px rgba(232,98,42,0.4);
    }
    .profile-hero-left { display: flex; align-items: center; gap: 28px; position: relative; z-index: 2; }
    .profile-hero-name { font-family: 'Plus Jakarta Sans', sans-serif; font-weight: 800; font-size: 26px; color: #fff; margin-bottom: 6px; }
    .profile-hero-meta { display: flex; align-items: center; gap: 12px; flex-wrap: wrap; }
    .role-badge { background: rgba(232,98,42,0.25); border: 1px solid rgba(232,98,42,0.4); color: #FFB899; font-size: 12px; font-weight: 700; padding: 4px 12px; border-radius: 8px; font-family: 'Plus Jakarta Sans', sans-serif; text-transform: uppercase; letter-spacing: 0.5px; }
    .profile-hero-email, .profile-hero-joined { font-size: 13px; color: rgba(255,255,255,0.5); display: flex; align-items: center; gap: 5px; }
    .btn-edit-profile {
        position: relative; z-index: 2;
        background: rgba(255,255,255,0.1);
        border: 1px solid rgba(255,255,255,0.2);
        color: #fff;
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
    .btn-edit-profile:hover { background: var(--primary); border-color: var(--primary); color: #fff; transform: translateY(-1px); }
    .info-card { background: #fff; border-radius: 16px; border: 1px solid var(--border); overflow: hidden; animation: fadeUp 0.4s ease both; }
    .info-card-header { padding: 18px 24px; border-bottom: 1px solid var(--border); display: flex; align-items: center; gap: 10px; }
    .info-card-icon { width: 36px; height: 36px; border-radius: 10px; display: flex; align-items: center; justify-content: center; font-size: 16px; }
    .info-card-title { font-family: 'Plus Jakarta Sans', sans-serif; font-weight: 700; font-size: 15px; color: var(--dark); }
    .info-card-body { padding: 8px 24px 20px; }
    .info-row { display: flex; align-items: center; padding: 14px 0; border-bottom: 1px solid var(--border); }
    .info-row:last-child { border-bottom: none; }
    .info-row-label { width: 160px; font-size: 12.5px; color: var(--text-muted); font-weight: 500; flex-shrink: 0; }
    .info-row-value { font-size: 14px; color: var(--dark); font-weight: 500; }
    .status-dot { display: inline-block; width: 8px; height: 8px; border-radius: 50%; margin-right: 6px; }
    @keyframes fadeUp { from { opacity: 0; transform: translateY(14px); } to { opacity: 1; transform: translateY(0); } }
    .info-card:nth-child(1) { animation-delay: 0.05s; }
    .info-card:nth-child(2) { animation-delay: 0.10s; }
</style>

<?php if (session()->getFlashdata('success')): ?>
    <div style="background:#ECFDF5; border:1px solid #A7F3D0; color:#065F46; border-radius:11px; padding:12px 16px; margin-bottom:20px; display:flex; gap:10px; align-items:center; font-size:13.5px;">
        <i class="bi bi-check-circle-fill"></i> <?= session()->getFlashdata('success') ?>
    </div>
<?php endif; ?>

<!-- Hero -->
<div class="profile-hero">
    <div class="profile-hero-left">
        <div class="avatar-hero"><?= strtoupper(substr($user['nama_lengkap'], 0, 1)) ?></div>
        <div>
            <div class="profile-hero-name"><?= esc($user['nama_lengkap']) ?></div>
            <div class="profile-hero-meta">
                <span class="role-badge"><?= ucfirst($user['role']) ?></span>
                <?php if ($user['email']): ?>
                    <span class="profile-hero-email"><i class="bi bi-envelope"></i> <?= esc($user['email']) ?></span>
                <?php endif; ?>
                <span class="profile-hero-joined"><i class="bi bi-calendar3"></i> Bergabung <?= date('d F Y', strtotime($user['created_at'])) ?></span>
            </div>
        </div>
    </div>
    <a href="<?= base_url('profile/edit') ?>" class="btn-edit-profile">
        <i class="bi bi-pencil-square"></i> Edit Profil
    </a>
</div>

<!-- Info Cards -->
<div class="row g-4">
    <div class="col-lg-6">
        <div class="info-card">
            <div class="info-card-header">
                <div class="info-card-icon" style="background:#EFF6FF;">
                    <i class="bi bi-person-badge" style="color:#3B82F6;"></i>
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
                        <code style="background:#F5F6FA; padding:3px 8px; border-radius:6px; font-size:13px;"><?= esc($user['username']) ?></code>
                    </div>
                </div>
                <div class="info-row">
                    <div class="info-row-label">Email</div>
                    <div class="info-row-value">
                        <?= $user['email'] ? esc($user['email']) : '<span style="color:var(--text-muted); font-style:italic;">Belum diisi</span>' ?>
                    </div>
                </div>
                <div class="info-row">
                    <div class="info-row-label">Role</div>
                    <div class="info-row-value">
                        <span style="background:<?= $user['role']==='admin' ? '#FFF0EA' : '#EFF6FF' ?>; color:<?= $user['role']==='admin' ? 'var(--primary)' : '#3B82F6' ?>; padding:4px 10px; border-radius:7px; font-size:12px; font-weight:700; font-family:'Plus Jakarta Sans',sans-serif;">
                            <?= ucfirst($user['role']) ?>
                        </span>
                    </div>
                </div>
                <div class="info-row">
                    <div class="info-row-label">Status</div>
                    <div class="info-row-value">
                        <span class="status-dot" style="background:<?= $user['is_active'] ? '#10B981' : '#EF4444' ?>;"></span>
                        <?= $user['is_active'] ? 'Aktif' : 'Nonaktif' ?>
                    </div>
                </div>
                <div class="info-row">
                    <div class="info-row-label">Terakhir Diupdate</div>
                    <div class="info-row-value" style="color:var(--text-muted); font-size:13px;">
                        <?= $user['updated_at'] ? date('d M Y, H:i', strtotime($user['updated_at'])) : '-' ?>
                    </div>
                </div>
            </div>
        </div>
    </div>

    <div class="col-lg-6">
        <div class="info-card">
            <div class="info-card-header">
                <div class="info-card-icon" style="background:#F0FFF4;">
                    <i class="bi bi-shield-lock" style="color:#10B981;"></i>
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
                    <div class="info-row-value" style="font-size:13px;"><?= date('d F Y', strtotime($user['created_at'])) ?></div>
                </div>
            </div>
            <div style="padding: 0 24px 24px;">
                <a href="<?= base_url('profile/edit') ?>#ganti-password"
                   style="display:inline-flex; align-items:center; gap:8px; background:#F0FFF4; border:1px solid #A7F3D0; color:#059669; padding:10px 18px; border-radius:10px; font-size:13px; font-weight:600; text-decoration:none; font-family:'Plus Jakarta Sans',sans-serif; transition:all 0.2s;"
                   onmouseover="this.style.background='#059669';this.style.color='#fff';"
                   onmouseout="this.style.background='#F0FFF4';this.style.color='#059669';">
                    <i class="bi bi-key"></i> Ganti Password
                </a>
            </div>
        </div>
    </div>
</div>