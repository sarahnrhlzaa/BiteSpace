<style>
    .profile-hero {
        background: linear-gradient(135deg, var(--dark) 0%, #2C3E6B 100%);
        border-radius: 20px;
        padding: 36px 40px;
        display: flex;
        align-items: center;
        gap: 28px;
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

    .profile-hero-info { position: relative; z-index: 2; }

    .profile-hero-name {
        font-family: 'Plus Jakarta Sans', sans-serif;
        font-weight: 800;
        font-size: 26px;
        color: #fff;
        margin-bottom: 4px;
    }

    .profile-hero-meta {
        display: flex;
        align-items: center;
        gap: 12px;
        flex-wrap: wrap;
    }

    .role-badge {
        background: rgba(232,98,42,0.25);
        border: 1px solid rgba(232,98,42,0.4);
        color: #FFB899;
        font-size: 12px;
        font-weight: 700;
        padding: 4px 12px;
        border-radius: 8px;
        font-family: 'Plus Jakarta Sans', sans-serif;
        text-transform: uppercase;
        letter-spacing: 0.5px;
    }

    .profile-hero-email {
        font-size: 13px;
        color: rgba(255,255,255,0.5);
        display: flex;
        align-items: center;
        gap: 5px;
    }

    .profile-hero-joined {
        font-size: 13px;
        color: rgba(255,255,255,0.4);
        display: flex;
        align-items: center;
        gap: 5px;
    }

    /* Cards */
    .form-card {
        background: #fff;
        border-radius: 16px;
        border: 1px solid var(--border);
        overflow: hidden;
        animation: fadeUp 0.4s ease both;
    }

    .form-card-header {
        padding: 18px 24px;
        border-bottom: 1px solid var(--border);
        display: flex;
        align-items: center;
        gap: 10px;
    }

    .form-card-icon {
        width: 36px; height: 36px;
        border-radius: 10px;
        display: flex; align-items: center; justify-content: center;
        font-size: 16px;
    }

    .form-card-title {
        font-family: 'Plus Jakarta Sans', sans-serif;
        font-weight: 700;
        font-size: 15px;
        color: var(--dark);
    }

    .form-card-body { padding: 24px; }

    /* Form styling */
    .field-label {
        font-family: 'Plus Jakarta Sans', sans-serif;
        font-weight: 600;
        font-size: 12.5px;
        color: var(--dark);
        margin-bottom: 7px;
        display: block;
    }

    .field-wrap { position: relative; margin-bottom: 18px; }

    .field-icon {
        position: absolute;
        left: 14px; top: 50%;
        transform: translateY(-50%);
        color: var(--text-muted);
        font-size: 16px;
        pointer-events: none;
    }

    .form-input {
        width: 100%;
        height: 46px;
        padding-left: 42px;
        padding-right: 14px;
        border: 1.5px solid var(--border);
        border-radius: 11px;
        font-size: 13.5px;
        font-family: 'DM Sans', sans-serif;
        color: var(--dark);
        background: #FAFBFD;
        transition: all 0.2s;
    }

    .form-input:focus {
        border-color: var(--primary);
        box-shadow: 0 0 0 3px rgba(232,98,42,0.1);
        background: #fff;
        outline: none;
    }

    .form-input.readonly-field {
        background: #F5F6FA;
        color: var(--text-muted);
        cursor: not-allowed;
    }

    .toggle-eye {
        position: absolute;
        right: 12px; top: 50%;
        transform: translateY(-50%);
        background: none; border: none;
        color: var(--text-muted);
        font-size: 16px;
        cursor: pointer;
        padding: 4px;
    }

    .toggle-eye:hover { color: var(--primary); }

    .btn-save {
        height: 46px;
        padding: 0 28px;
        background: var(--primary);
        color: #fff;
        border: none;
        border-radius: 11px;
        font-family: 'Plus Jakarta Sans', sans-serif;
        font-weight: 700;
        font-size: 14px;
        cursor: pointer;
        transition: all 0.2s;
        display: inline-flex;
        align-items: center;
        gap: 8px;
    }

    .btn-save:hover {
        background: var(--primary-dk);
        transform: translateY(-1px);
        box-shadow: 0 6px 20px rgba(232,98,42,0.3);
    }

    .btn-save:active { transform: translateY(0); }

    /* Alert */
    .alert-custom {
        border-radius: 11px;
        font-size: 13.5px;
        padding: 12px 16px;
        margin-bottom: 18px;
        display: flex;
        align-items: flex-start;
        gap: 10px;
        border: none;
    }

    .alert-success-c {
        background: #ECFDF5;
        border: 1px solid #A7F3D0;
        color: #065F46;
    }

    .alert-danger-c {
        background: #FFF1F0;
        border: 1px solid #FFCCC7;
        color: #C0392B;
    }

    /* Password strength */
    .strength-bar {
        height: 4px;
        border-radius: 4px;
        background: #EEE;
        margin-top: 8px;
        overflow: hidden;
    }

    .strength-fill {
        height: 100%;
        border-radius: 4px;
        transition: width 0.3s, background 0.3s;
        width: 0%;
    }

    .strength-text {
        font-size: 11px;
        margin-top: 4px;
        font-weight: 600;
    }

    /* Info row */
    .info-row {
        display: flex;
        align-items: center;
        padding: 14px 0;
        border-bottom: 1px solid var(--border);
    }

    .info-row:last-child { border-bottom: none; }

    .info-row-label {
        width: 140px;
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

    @keyframes fadeUp {
        from { opacity: 0; transform: translateY(14px); }
        to   { opacity: 1; transform: translateY(0); }
    }

    .form-card:nth-child(1) { animation-delay: 0.05s; }
    .form-card:nth-child(2) { animation-delay: 0.10s; }
</style>

<!-- ── HERO PROFIL ── -->
<div class="profile-hero">
    <div class="avatar-hero">
        <?= strtoupper(substr($user['nama_lengkap'], 0, 1)) ?>
    </div>
    <div class="profile-hero-info">
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

<!-- ── FLASH MESSAGES GLOBAL ── -->
<?php if (session()->getFlashdata('success')): ?>
    <div class="alert-custom alert-success-c mb-4">
        <i class="bi bi-check-circle-fill mt-1"></i>
        <div><?= session()->getFlashdata('success') ?></div>
    </div>
<?php endif; ?>

<div class="row g-4">

    <!-- ── KOLOM KIRI: Info akun + Edit Profil ── -->
    <div class="col-lg-5">

        <!-- Info Akun (readonly) -->
        <div class="form-card mb-4">
            <div class="form-card-header">
                <div class="form-card-icon" style="background:#EFF6FF;">
                    <i class="bi bi-person-badge" style="color:#3B82F6;"></i>
                </div>
                <div class="form-card-title">Informasi Akun</div>
            </div>
            <div class="form-card-body">
                <div class="info-row">
                    <div class="info-row-label">Username</div>
                    <div class="info-row-value">
                        <code style="background:#F5F6FA; padding:3px 8px; border-radius:6px; font-size:13px;">
                            <?= esc($user['username']) ?>
                        </code>
                    </div>
                </div>
                <div class="info-row">
                    <div class="info-row-label">Role</div>
                    <div class="info-row-value">
                        <span class="badge-status" style="background:<?= $user['role']==='admin' ? '#FFF0EA' : '#EFF6FF' ?>; color:<?= $user['role']==='admin' ? 'var(--primary)' : '#3B82F6' ?>; padding:4px 10px; border-radius:7px; font-size:12px; font-weight:700; font-family:'Plus Jakarta Sans',sans-serif;">
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
                    <div class="info-row-label">Terakhir Update</div>
                    <div class="info-row-value" style="font-size:13px; color:var(--text-muted);">
                        <?= $user['updated_at'] ? date('d M Y, H:i', strtotime($user['updated_at'])) : '-' ?>
                    </div>
                </div>
            </div>
        </div>

        <!-- Edit Profil -->
        <div class="form-card">
            <div class="form-card-header">
                <div class="form-card-icon" style="background:var(--primary-lt);">
                    <i class="bi bi-pencil-square" style="color:var(--primary);"></i>
                </div>
                <div class="form-card-title">Edit Profil</div>
            </div>
            <div class="form-card-body">

                <?php if (session()->getFlashdata('error')): ?>
                    <div class="alert-custom alert-danger-c">
                        <i class="bi bi-exclamation-circle-fill mt-1"></i>
                        <div><?= session()->getFlashdata('error') ?></div>
                    </div>
                <?php endif; ?>

                <form action="<?= base_url('profile/update') ?>" method="POST">
                    <?= csrf_field() ?>

                    <label class="field-label">Nama Lengkap <span style="color:var(--primary);">*</span></label>
                    <div class="field-wrap">
                        <i class="bi bi-person field-icon"></i>
                        <input
                            type="text"
                            name="nama_lengkap"
                            class="form-input"
                            value="<?= esc($user['nama_lengkap']) ?>"
                            placeholder="Nama lengkap kamu"
                            required
                        >
                    </div>

                    <label class="field-label">Email</label>
                    <div class="field-wrap">
                        <i class="bi bi-envelope field-icon"></i>
                        <input
                            type="email"
                            name="email"
                            class="form-input"
                            value="<?= esc($user['email'] ?? '') ?>"
                            placeholder="Email (opsional)"
                        >
                    </div>

                    <label class="field-label" style="color:var(--text-muted); font-size:12px;">Username</label>
                    <div class="field-wrap">
                        <i class="bi bi-at field-icon"></i>
                        <input
                            type="text"
                            class="form-input readonly-field"
                            value="<?= esc($user['username']) ?>"
                            readonly
                            title="Username tidak bisa diubah"
                        >
                    </div>

                    <div class="d-flex justify-content-end">
                        <button type="submit" class="btn-save">
                            <i class="bi bi-check-lg"></i> Simpan Perubahan
                        </button>
                    </div>
                </form>
            </div>
        </div>

    </div>

    <!-- ── KOLOM KANAN: Ganti Password ── -->
    <div class="col-lg-7">
        <div class="form-card h-100">
            <div class="form-card-header">
                <div class="form-card-icon" style="background:#F0FFF4;">
                    <i class="bi bi-shield-lock" style="color:#10B981;"></i>
                </div>
                <div class="form-card-title">Ganti Password</div>
            </div>
            <div class="form-card-body">

                <?php if (session()->getFlashdata('error_pass')): ?>
                    <div class="alert-custom alert-danger-c">
                        <i class="bi bi-exclamation-circle-fill mt-1"></i>
                        <div><?= session()->getFlashdata('error_pass') ?></div>
                    </div>
                <?php endif; ?>

                <!-- Info box -->
                <div style="background:var(--primary-lt); border:1px solid rgba(232,98,42,0.2); border-radius:11px; padding:14px 16px; margin-bottom:22px; display:flex; gap:10px; align-items:flex-start;">
                    <i class="bi bi-info-circle-fill" style="color:var(--primary); font-size:16px; margin-top:1px; flex-shrink:0;"></i>
                    <div style="font-size:13px; color:#8B4513; line-height:1.6;">
                        <?php if ($user['role'] === 'kasir'): ?>
                            Kamu bisa ganti password yang diberikan admin kapan saja. Pastikan password baru mudah kamu ingat tapi sulit ditebak orang lain.
                        <?php else: ?>
                            Ganti password secara berkala untuk menjaga keamanan akun kamu.
                        <?php endif; ?>
                    </div>
                </div>

                <form action="<?= base_url('profile/change-password') ?>" method="POST" id="formPassword">
                    <?= csrf_field() ?>

                    <!-- Password lama -->
                    <label class="field-label">Password Saat Ini <span style="color:var(--primary);">*</span></label>
                    <div class="field-wrap">
                        <i class="bi bi-lock field-icon"></i>
                        <input type="password" name="password_lama" id="passLama" class="form-input" placeholder="Masukkan password saat ini" required>
                        <button type="button" class="toggle-eye" onclick="toggleEye('passLama','eyeLama')">
                            <i class="bi bi-eye" id="eyeLama"></i>
                        </button>
                    </div>

                    <!-- Password baru -->
                    <label class="field-label">Password Baru <span style="color:var(--primary);">*</span></label>
                    <div class="field-wrap" style="margin-bottom:6px;">
                        <i class="bi bi-lock-fill field-icon"></i>
                        <input type="password" name="password_baru" id="passBaru" class="form-input"
                            placeholder="Minimal 6 karakter" required
                            oninput="checkStrength(this.value)">
                        <button type="button" class="toggle-eye" onclick="toggleEye('passBaru','eyeBaru')">
                            <i class="bi bi-eye" id="eyeBaru"></i>
                        </button>
                    </div>

                    <!-- Strength bar -->
                    <div class="strength-bar mb-1">
                        <div class="strength-fill" id="strengthFill"></div>
                    </div>
                    <div class="strength-text mb-3" id="strengthText" style="color:var(--text-muted);">Belum diisi</div>

                    <!-- Konfirmasi password -->
                    <label class="field-label">Konfirmasi Password Baru <span style="color:var(--primary);">*</span></label>
                    <div class="field-wrap">
                        <i class="bi bi-lock-fill field-icon"></i>
                        <input type="password" name="password_konfirmasi" id="passKonfirm" class="form-input"
                            placeholder="Ulangi password baru" required
                            oninput="checkMatch()">
                        <button type="button" class="toggle-eye" onclick="toggleEye('passKonfirm','eyeKonfirm')">
                            <i class="bi bi-eye" id="eyeKonfirm"></i>
                        </button>
                    </div>
                    <div id="matchMsg" style="font-size:12px; margin-top:-12px; margin-bottom:16px;"></div>

                    <!-- Syarat password -->
                    <div style="background:#F8F9FA; border-radius:10px; padding:14px 16px; margin-bottom:22px;">
                        <div style="font-size:12px; font-weight:600; color:var(--dark); margin-bottom:10px;">
                            <i class="bi bi-shield-check me-1" style="color:var(--primary);"></i> Syarat Password Aman
                        </div>
                        <div class="d-flex flex-column gap-2">
                            <div class="req-item" id="req-length">
                                <i class="bi bi-circle" style="font-size:11px;"></i>
                                <span style="font-size:12.5px; margin-left:6px;">Minimal 6 karakter</span>
                            </div>
                            <div class="req-item" id="req-upper">
                                <i class="bi bi-circle" style="font-size:11px;"></i>
                                <span style="font-size:12.5px; margin-left:6px;">Mengandung huruf besar</span>
                            </div>
                            <div class="req-item" id="req-number">
                                <i class="bi bi-circle" style="font-size:11px;"></i>
                                <span style="font-size:12.5px; margin-left:6px;">Mengandung angka</span>
                            </div>
                        </div>
                    </div>

                    <div class="d-flex justify-content-between align-items-center">
                        <div style="font-size:12px; color:var(--text-muted);">
                            <i class="bi bi-info-circle me-1"></i>
                            Setelah ganti password, kamu akan tetap bisa login
                        </div>
                        <button type="submit" class="btn-save" id="btnSavePass" style="background:#10B981;">
                            <i class="bi bi-shield-check"></i> Ganti Password
                        </button>
                    </div>
                </form>
            </div>
        </div>
    </div>

</div>

<style>
    .req-item { display: flex; align-items: center; color: var(--text-muted); transition: color 0.2s; }
    .req-item.valid { color: #10B981; }
    .req-item.valid i::before { content: "\f270"; } /* bi-check-circle-fill */
</style>

<script>
function toggleEye(inputId, iconId) {
    const inp  = document.getElementById(inputId);
    const icon = document.getElementById(iconId);
    if (inp.type === 'password') {
        inp.type = 'text';
        icon.className = 'bi bi-eye-slash';
    } else {
        inp.type = 'password';
        icon.className = 'bi bi-eye';
    }
}

function checkStrength(val) {
    const fill = document.getElementById('strengthFill');
    const text = document.getElementById('strengthText');

    const hasLen    = val.length >= 6;
    const hasUpper  = /[A-Z]/.test(val);
    const hasNumber = /[0-9]/.test(val);
    const hasSymbol = /[^a-zA-Z0-9]/.test(val);

    // Update requirement checklist
    setReq('req-length', hasLen);
    setReq('req-upper',  hasUpper);
    setReq('req-number', hasNumber);

    let score = 0;
    if (hasLen)    score++;
    if (hasUpper)  score++;
    if (hasNumber) score++;
    if (hasSymbol) score++;
    if (val.length >= 10) score++;

    const levels = [
        { pct: '0%',   color: '#EEE',    label: 'Belum diisi',     textColor: '#AAA' },
        { pct: '25%',  color: '#EF4444', label: 'Lemah',           textColor: '#EF4444' },
        { pct: '50%',  color: '#F59E0B', label: 'Sedang',          textColor: '#F59E0B' },
        { pct: '75%',  color: '#3B82F6', label: 'Cukup Kuat',      textColor: '#3B82F6' },
        { pct: '90%',  color: '#10B981', label: 'Kuat',            textColor: '#10B981' },
        { pct: '100%', color: '#059669', label: '💪 Sangat Kuat',  textColor: '#059669' },
    ];

    const idx = val.length === 0 ? 0 : Math.min(score, 5);
    fill.style.width      = levels[idx].pct;
    fill.style.background = levels[idx].color;
    text.textContent      = levels[idx].label;
    text.style.color      = levels[idx].textColor;
}

function setReq(id, valid) {
    const el = document.getElementById(id);
    if (valid) {
        el.classList.add('valid');
        el.querySelector('i').className = 'bi bi-check-circle-fill';
    } else {
        el.classList.remove('valid');
        el.querySelector('i').className = 'bi bi-circle';
    }
}

function checkMatch() {
    const baru    = document.getElementById('passBaru').value;
    const konfirm = document.getElementById('passKonfirm').value;
    const msg     = document.getElementById('matchMsg');

    if (konfirm.length === 0) {
        msg.innerHTML = '';
        return;
    }

    if (baru === konfirm) {
        msg.innerHTML = '<span style="color:#10B981;"><i class="bi bi-check-circle-fill me-1"></i>Password cocok</span>';
    } else {
        msg.innerHTML = '<span style="color:#EF4444;"><i class="bi bi-x-circle-fill me-1"></i>Password tidak cocok</span>';
    }
}
</script>