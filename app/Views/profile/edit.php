<style>
    /* ══ PALETTE: BiteSpace
       --tosca  : #2EC4B6
       --sky    : #4BA3C3
       --yellow : #FFD166
       --navy   : #0D1B3E
    ══════════════════════════════════ */

    .form-card {
        background: #fff;
        border-radius: 16px;
        border: 1px solid var(--border);
        overflow: hidden;
        animation: fadeUp 0.4s ease both;
    }
    .form-card:nth-child(2) { animation-delay: 0.05s; }

    .form-card-header {
        padding: 18px 24px;
        border-bottom: 1px solid var(--border);
        display: flex; align-items: center; gap: 10px;
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

    /* ── Fields ── */
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
        border-color: var(--sky);
        box-shadow: 0 0 0 3px rgba(75,163,195,0.12);
        background: #fff;
        outline: none;
    }

    .form-input.readonly-field {
        background: #F5F6FA;
        color: var(--text-muted);
        cursor: not-allowed;
    }

    /* toggle eye */
    .toggle-eye {
        position: absolute;
        right: 12px; top: 50%;
        transform: translateY(-50%);
        background: none; border: none;
        color: var(--text-muted);
        font-size: 16px;
        cursor: pointer;
        padding: 4px;
        transition: color 0.2s;
    }
    .toggle-eye:hover { color: var(--sky); }

    /* ── Save button ── */
    .btn-save {
        height: 46px;
        padding: 0 28px;
        background: linear-gradient(135deg, var(--sky), var(--purple));
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
        box-shadow: 0 4px 14px rgba(75,163,195,0.3);
    }
    .btn-save:hover {
        filter: brightness(1.06);
        transform: translateY(-1px);
        box-shadow: 0 8px 20px rgba(75,163,195,0.35);
    }
    .btn-save:active { transform: translateY(0); }

    /* green save (password) */
    .btn-save-green {
        height: 46px;
        padding: 0 28px;
        background: linear-gradient(135deg, var(--purple), var(--tosca));
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
        box-shadow: 0 4px 14px rgba(155,137,196,0.35);
    }
    .btn-save-green:hover {
        filter: brightness(1.06);
        transform: translateY(-1px);
        box-shadow: 0 8px 20px rgba(155,137,196,0.4);
    }

    /* ── Alerts ── */
    .alert-err {
        background: #FFF1F0;
        border: 1px solid #FFCCC7;
        color: #C0392B;
        border-radius: 11px;
        padding: 12px 16px;
        margin-bottom: 18px;
        display: flex;
        gap: 10px;
        align-items: flex-start;
        font-size: 13.5px;
    }

    /* ── Password strength ── */
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

    /* ── Requirement checklist ── */
    .req-item {
        display: flex;
        align-items: center;
        color: var(--text-muted);
        transition: color 0.2s;
        font-size: 12.5px;
        margin-bottom: 6px;
    }
    .req-item i { font-size: 11px; margin-right: 6px; }
    .req-item.valid { color: var(--tosca); }
    .req-item.valid i::before { content: "\f270"; }

    /* ── Info box ── */
    .info-box {
        background: rgba(155,137,196,0.08);
        border: 1px solid rgba(155,137,196,0.25);
        border-radius: 11px;
        padding: 13px 16px;
        margin-bottom: 22px;
        display: flex;
        gap: 10px;
        align-items: flex-start;
    }
    .info-box i { color: var(--purple); font-size: 15px; margin-top: 1px; flex-shrink: 0; }
    .info-box p { font-size: 13px; color: #5d4a8a; line-height: 1.6; margin: 0; }

    /* ── Syarat box ── */
    .syarat-box {
        background: #F8F9FA;
        border-radius: 10px;
        padding: 14px 16px;
        margin-bottom: 22px;
    }
    .syarat-title {
        font-size: 12px;
        font-weight: 600;
        color: var(--dark);
        margin-bottom: 10px;
        display: flex;
        align-items: center;
        gap: 6px;
    }
    .syarat-title i { color: var(--tosca); }
</style>

<!-- Breadcrumb -->
<div style="display:flex; align-items:center; gap:8px; margin-bottom:20px; font-size:13px; color:var(--text-muted);">
    <a href="<?= base_url('profile') ?>"
       style="color:var(--tosca); text-decoration:none; font-weight:600; display:flex; align-items:center; gap:5px;">
        <i class="bi bi-person-circle"></i> Profile
    </a>
    <i class="bi bi-chevron-right" style="font-size:11px;"></i>
    <span>Edit Profile</span>
</div>

<div class="row g-4">

    <!-- ── KIRI: Edit Profil ── -->
    <div class="col-lg-5">
        <div class="form-card">
            <div class="form-card-header">
                <div class="form-card-icon" style="background:rgba(46,196,182,0.12);">
                    <i class="bi bi-pencil-square" style="color:var(--tosca);"></i>
                </div>
                <div class="form-card-title">Edit Profile</div>
            </div>
            <div class="form-card-body">

                <form action="<?= base_url('profile/update') ?>" method="POST">
                    <?= csrf_field() ?>

                    <label class="field-label">
                        Nama Lengkap <span style="color:var(--sky);">*</span>
                    </label>
                    <div class="field-wrap">
                        <i class="bi bi-person field-icon"></i>
                        <input type="text" name="nama_lengkap" class="form-input"
                            value="<?= esc(old('nama_lengkap', $user['nama_lengkap'])) ?>"
                            placeholder="Nama lengkap kamu" required>
                    </div>

                    <label class="field-label">Email</label>
                    <div class="field-wrap">
                        <i class="bi bi-envelope field-icon"></i>
                        <input type="email" name="email" class="form-input"
                            value="<?= esc(old('email', $user['email'] ?? '')) ?>"
                            placeholder="Email (opsional)">
                    </div>

                    <label class="field-label" style="color:var(--text-muted);">
                        Username <span style="font-weight:400;">(tidak bisa diubah)</span>
                    </label>
                    <div class="field-wrap">
                        <i class="bi bi-at field-icon"></i>
                        <input type="text" class="form-input readonly-field"
                            value="<?= esc($user['username']) ?>" readonly>
                    </div>

                    <div class="d-flex justify-content-between align-items-center mt-2">
                        <a href="<?= base_url('profile') ?>"
                           style="color:var(--text-muted); font-size:13px; text-decoration:none; display:flex; align-items:center; gap:5px;">
                            <i class="bi bi-arrow-left"></i> Batal
                        </a>
                        <button type="submit" class="btn-save">
                            <i class="bi bi-check-lg"></i> Simpan
                        </button>
                    </div>
                </form>
            </div>
        </div>
    </div>

    <!-- ── KANAN: Ganti Password ── -->
    <div class="col-lg-7">
        <div class="form-card" id="ganti-password">
            <div class="form-card-header">
                <div class="form-card-icon" style="background:rgba(155,137,196,0.12);">
                    <i class="bi bi-shield-lock" style="color:var(--purple);"></i>
                </div>
                <div class="form-card-title">Ganti Password</div>
            </div>
            <div class="form-card-body">

                <?php if (session()->getFlashdata('error_pass')): ?>
                    <div class="alert-err">
                        <i class="bi bi-exclamation-circle-fill mt-1"></i>
                        <div><?= session()->getFlashdata('error_pass') ?></div>
                    </div>
                <?php endif; ?>

                <!-- Info box tosca -->
                <div class="info-box">
                    <i class="bi bi-info-circle-fill"></i>
                    <p>
                        <?php if ($user['role'] === 'kasir'): ?>
                            Ganti password yang diberikan admin dengan password pilihanmu sendiri.
                        <?php else: ?>
                            Ganti password secara berkala untuk menjaga keamanan akun.
                        <?php endif; ?>
                    </p>
                </div>

                <form action="<?= base_url('profile/change-password') ?>" method="POST">
                    <?= csrf_field() ?>

                    <!-- Password lama -->
                    <label class="field-label">
                        Password Saat Ini <span style="color:var(--sky);">*</span>
                    </label>
                    <div class="field-wrap">
                        <i class="bi bi-lock field-icon"></i>
                        <input type="password" name="password_lama" id="passLama"
                            class="form-input" placeholder="Masukkan password saat ini" required>
                        <button type="button" class="toggle-eye" onclick="toggleEye('passLama','eyeLama')">
                            <i class="bi bi-eye" id="eyeLama"></i>
                        </button>
                    </div>

                    <!-- Password baru -->
                    <label class="field-label">
                        Password Baru <span style="color:var(--sky);">*</span>
                    </label>
                    <div class="field-wrap" style="margin-bottom:6px;">
                        <i class="bi bi-lock-fill field-icon"></i>
                        <input type="password" name="password_baru" id="passBaru"
                            class="form-input" placeholder="Minimal 6 karakter" required
                            oninput="checkStrength(this.value)">
                        <button type="button" class="toggle-eye" onclick="toggleEye('passBaru','eyeBaru')">
                            <i class="bi bi-eye" id="eyeBaru"></i>
                        </button>
                    </div>
                    <div class="strength-bar mb-1">
                        <div class="strength-fill" id="strengthFill"></div>
                    </div>
                    <div class="strength-text mb-3" id="strengthText" style="color:var(--text-muted);">
                        Belum diisi
                    </div>

                    <!-- Konfirmasi -->
                    <label class="field-label">
                        Konfirmasi Password Baru <span style="color:var(--sky);">*</span>
                    </label>
                    <div class="field-wrap">
                        <i class="bi bi-lock-fill field-icon"></i>
                        <input type="password" name="password_konfirmasi" id="passKonfirm"
                            class="form-input" placeholder="Ulangi password baru" required
                            oninput="checkMatch()">
                        <button type="button" class="toggle-eye" onclick="toggleEye('passKonfirm','eyeKonfirm')">
                            <i class="bi bi-eye" id="eyeKonfirm"></i>
                        </button>
                    </div>
                    <div id="matchMsg" style="font-size:12px; margin-top:-12px; margin-bottom:16px;"></div>

                    <!-- Syarat -->
                    <div class="syarat-box">
                        <div class="syarat-title">
                            <i class="bi bi-shield-check"></i> Syarat Password
                        </div>
                        <div class="req-item" id="req-length">
                            <i class="bi bi-circle"></i> Minimal 6 karakter
                        </div>
                        <div class="req-item" id="req-upper">
                            <i class="bi bi-circle"></i> Mengandung huruf besar
                        </div>
                        <div class="req-item" id="req-number">
                            <i class="bi bi-circle"></i> Mengandung angka
                        </div>
                    </div>

                    <div class="d-flex justify-content-end">
                        <button type="submit" class="btn-save-green">
                            <i class="bi bi-shield-check"></i> Ganti Password
                        </button>
                    </div>
                </form>
            </div>
        </div>
    </div>

</div>

<script>
function toggleEye(inputId, iconId) {
    const inp  = document.getElementById(inputId);
    const icon = document.getElementById(iconId);
    inp.type   = inp.type === 'password' ? 'text' : 'password';
    icon.className = inp.type === 'password' ? 'bi bi-eye' : 'bi bi-eye-slash';
}

function checkStrength(val) {
    const fill = document.getElementById('strengthFill');
    const text = document.getElementById('strengthText');
    const hasLen    = val.length >= 6;
    const hasUpper  = /[A-Z]/.test(val);
    const hasNumber = /[0-9]/.test(val);
    const hasSymbol = /[^a-zA-Z0-9]/.test(val);

    setReq('req-length', hasLen);
    setReq('req-upper',  hasUpper);
    setReq('req-number', hasNumber);

    const score = [hasLen, hasUpper, hasNumber, hasSymbol, val.length >= 10].filter(Boolean).length;
    const levels = [
        { pct:'0%',   color:'#EEE',    label:'Belum diisi',    tc:'#AAA'     },
        { pct:'25%',  color:'#EF4444', label:'Lemah',          tc:'#EF4444'  },
        { pct:'50%',  color:'#F59E0B', label:'Sedang',         tc:'#F59E0B'  },
        { pct:'75%',  color:'#4BA3C3', label:'Cukup Kuat',     tc:'#4BA3C3'  },
        { pct:'90%',  color:'#2EC4B6', label:'Kuat',           tc:'#2EC4B6'  },
        { pct:'100%', color:'#0e9088', label:'💪 Sangat Kuat', tc:'#0e9088'  },
    ];
    const idx = val.length === 0 ? 0 : Math.min(score, 5);
    fill.style.width      = levels[idx].pct;
    fill.style.background = levels[idx].color;
    text.textContent      = levels[idx].label;
    text.style.color      = levels[idx].tc;
}

function setReq(id, valid) {
    const el = document.getElementById(id);
    el.classList.toggle('valid', valid);
    el.querySelector('i').className = valid ? 'bi bi-check-circle-fill' : 'bi bi-circle';
}

function checkMatch() {
    const baru    = document.getElementById('passBaru').value;
    const konfirm = document.getElementById('passKonfirm').value;
    const msg     = document.getElementById('matchMsg');
    if (!konfirm) { msg.innerHTML = ''; return; }
    msg.innerHTML = baru === konfirm
        ? '<span style="color:#10B981;"><i class="bi bi-check-circle-fill me-1"></i>Password cocok</span>'
        : '<span style="color:#EF4444;"><i class="bi bi-x-circle-fill me-1"></i>Password tidak cocok</span>';
}

// Scroll ke ganti password jika ada hash
if (window.location.hash === '#ganti-password') {
    setTimeout(() => {
        document.getElementById('ganti-password')?.scrollIntoView({ behavior: 'smooth' });
    }, 300);
}
</script>