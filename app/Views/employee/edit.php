<style>
    /* ══ BiteSpace Palette
    .form-card {
        background: #fff; border-radius: 16px;
        border: 1px solid var(--border); overflow: hidden;
        animation: fadeUp 0.4s ease both;
    }
    .form-card:nth-child(2) { animation-delay: 0.05s; }
    .form-card-header {
        padding: 18px 24px; border-bottom: 1px solid var(--border);
        display: flex; align-items: center; gap: 10px;
    }
    .form-card-icon {
        width: 36px; height: 36px; border-radius: 10px;
        display: flex; align-items: center; justify-content: center; font-size: 16px;
    }
    .form-card-title {
        font-family: 'Plus Jakarta Sans', sans-serif;
        font-weight: 700; font-size: 15px; color: var(--dark);
    }
    .form-card-body { padding: 24px; }

    /* ── Hero ── */
    .emp-hero {
        background: linear-gradient(135deg, var(--navy) 0%, #162952 100%);
        border-radius: 14px; padding: 24px;
        position: relative; overflow: hidden; margin-bottom: 16px;
    }
    .emp-hero::before {
        content: ''; position: absolute;
        width: 180px; height: 180px;
        background: radial-gradient(circle, rgba(75,163,195,0.2) 0%, transparent 65%);
        top: -50px; right: -30px; pointer-events: none;
    }
    .emp-hero-avatar {
        width: 64px; height: 64px; border-radius: 16px;
        display: flex; align-items: center; justify-content: center;
        font-family: 'Plus Jakarta Sans', sans-serif;
        font-weight: 800; font-size: 26px; color: #fff;
        margin-bottom: 12px; position: relative; z-index: 1;
    }
    .avatar-admin { background: linear-gradient(135deg, var(--sky), var(--purple)); box-shadow: 0 6px 20px rgba(75,163,195,0.4); }
    .avatar-kasir { background: linear-gradient(135deg, var(--yellow), var(--tosca)); box-shadow: 0 6px 20px rgba(46,196,182,0.35); }
    .emp-hero-name {
        font-family: 'Plus Jakarta Sans', sans-serif;
        font-weight: 800; font-size: 20px; color: #fff;
        margin-bottom: 4px; position: relative; z-index: 1;
    }
    .emp-hero-meta {
        font-size: 13px; color: rgba(255,255,255,0.5);
        position: relative; z-index: 1;
        display: flex; align-items: center; gap: 10px; flex-wrap: wrap;
    }
    .hero-role-badge {
        background: rgba(255,255,255,0.12); border: 1px solid rgba(255,255,255,0.2);
        color: rgba(255,255,255,0.85); font-size: 11px; font-weight: 700;
        padding: 3px 10px; border-radius: 6px;
        font-family: 'Plus Jakarta Sans', sans-serif; text-transform: uppercase;
    }

    /* ── Fields ── */
    .field-label {
        font-family: 'Plus Jakarta Sans', sans-serif;
        font-weight: 600; font-size: 12.5px;
        color: var(--dark); margin-bottom: 7px; display: block;
    }
    .field-wrap { position: relative; margin-bottom: 18px; }
    .field-icon {
        position: absolute; left: 14px; top: 50%;
        transform: translateY(-50%);
        color: var(--text-muted); font-size: 15px; pointer-events: none;
    }
    .form-input {
        width: 100%; height: 46px;
        padding-left: 42px; padding-right: 14px;
        border: 1.5px solid var(--border); border-radius: 11px;
        font-size: 13.5px; font-family: 'DM Sans', sans-serif;
        color: var(--dark); background: #FAFBFD; transition: all 0.2s;
    }
    .form-input:focus {
        border-color: var(--sky);
        box-shadow: 0 0 0 3px rgba(75,163,195,0.12);
        background: #fff; outline: none;
    }
    .form-input.readonly-field {
        background: #F5F6FA; color: var(--text-muted); cursor: not-allowed;
    }
    .form-select-custom {
        width: 100%; height: 46px;
        padding: 0 14px 0 42px;
        border: 1.5px solid var(--border); border-radius: 11px;
        font-size: 13.5px; font-family: 'DM Sans', sans-serif;
        color: var(--dark); background: #FAFBFD;
        appearance: none; cursor: pointer; transition: all 0.2s;
    }
    .form-select-custom:focus {
        border-color: var(--sky);
        box-shadow: 0 0 0 3px rgba(75,163,195,0.12);
        background: #fff; outline: none;
    }
    .toggle-eye {
        position: absolute; right: 12px; top: 50%;
        transform: translateY(-50%);
        background: none; border: none; color: var(--text-muted);
        font-size: 15px; cursor: pointer; padding: 4px; transition: color 0.2s;
    }
    .toggle-eye:hover { color: var(--sky); }

    /* ── Buttons ── */
    .btn-save {
        height: 46px; padding: 0 28px;
        background: linear-gradient(135deg, var(--sky), var(--tosca));
        color: #fff; border: none; border-radius: 11px;
        font-family: 'Plus Jakarta Sans', sans-serif;
        font-weight: 700; font-size: 14px; cursor: pointer;
        display: inline-flex; align-items: center; gap: 8px;
        transition: all 0.2s; box-shadow: 0 4px 14px rgba(46,196,182,0.3);
    }
    .btn-save:hover { filter: brightness(1.06); transform: translateY(-1px); }

    /* ── Alert ── */
    .alert-err {
        background: #FFF1F0; border: 1px solid #FFCCC7; color: #C0392B;
        border-radius: 11px; padding: 12px 16px; margin-bottom: 18px;
        display: flex; gap: 10px; align-items: flex-start; font-size: 13.5px;
    }

    /* ── Info box ── */
    .info-box {
        background: rgba(75,163,195,0.06);
        border: 1px solid rgba(75,163,195,0.2);
        border-radius: 11px; padding: 13px 16px;
        margin-bottom: 18px; display: flex; gap: 10px; align-items: flex-start;
    }
    .info-box i { color: var(--sky); font-size: 15px; margin-top: 1px; flex-shrink: 0; }
    .info-box p { font-size: 13px; color: #1e6e8e; line-height: 1.6; margin: 0; }

    /* ── Danger zone ── */
    .danger-zone {
        border: 1.5px dashed #FECACA; border-radius: 14px;
        padding: 20px 24px; background: #FFF8F8;
        animation: fadeUp 0.4s ease 0.1s both;
    }
    .danger-title {
        font-family: 'Plus Jakarta Sans', sans-serif;
        font-weight: 700; font-size: 13.5px; color: #C0392B;
        display: flex; align-items: center; gap: 7px; margin-bottom: 6px;
    }
    .danger-desc { font-size: 12.5px; color: #9B4444; margin-bottom: 16px; line-height: 1.6; }
    .btn-danger {
        height: 40px; padding: 0 20px;
        background: #FEF2F2; border: 1.5px solid #FECACA;
        border-radius: 10px; color: #C0392B;
        font-family: 'Plus Jakarta Sans', sans-serif;
        font-weight: 700; font-size: 13px; cursor: pointer;
        display: inline-flex; align-items: center; gap: 7px; transition: all 0.18s;
    }
    .btn-danger:hover { background: #EF4444; border-color: #EF4444; color: #fff; }

    /* ── Reset password card ── */
    .reset-card {
        background: rgba(155,137,196,0.06);
        border: 1px solid rgba(155,137,196,0.22);
        border-radius: 14px; padding: 20px 24px;
        animation: fadeUp 0.4s ease 0.08s both; margin-bottom: 16px;
    }
    .reset-title {
        font-family: 'Plus Jakarta Sans', sans-serif;
        font-weight: 700; font-size: 13.5px; color: #5d4a8a;
        display: flex; align-items: center; gap: 7px; margin-bottom: 6px;
    }
    .reset-desc { font-size: 12.5px; color: #7a5fa0; margin-bottom: 14px; line-height: 1.6; }
    .btn-reset-pass {
        height: 40px; padding: 0 20px;
        background: rgba(155,137,196,0.12);
        border: 1.5px solid rgba(155,137,196,0.3);
        border-radius: 10px; color: #5d4a8a;
        font-family: 'Plus Jakarta Sans', sans-serif;
        font-weight: 700; font-size: 13px; cursor: pointer;
        display: inline-flex; align-items: center; gap: 7px; transition: all 0.18s;
    }
    .btn-reset-pass:hover { background: var(--purple); border-color: var(--purple); color: #fff; }

    @keyframes fadeUp {
        from { opacity: 0; transform: translateY(14px); }
        to   { opacity: 1; transform: translateY(0); }
    }
</style>

<!-- ── Breadcrumb ── -->
<div style="display:flex;align-items:center;gap:8px;margin-bottom:20px;font-size:13px;color:var(--text-muted);">
    <a href="<?= base_url('employee') ?>"
       style="color:var(--tosca);text-decoration:none;font-weight:600;display:flex;align-items:center;gap:5px;">
        <i class="bi bi-people-fill"></i> Employee
    </a>
    <i class="bi bi-chevron-right" style="font-size:11px;"></i>
    <span>Edit — <?= esc($employee['nama_lengkap']) ?></span>
</div>

<div class="row g-4">

    <!-- ── KIRI: Hero + Reset Pass + Danger Zone ── -->
    <div class="col-lg-4">

        <!-- Hero card -->
        <div class="emp-hero">
            <div class="emp-hero-avatar <?= $employee['role'] === 'admin' ? 'avatar-admin' : 'avatar-kasir' ?>">
                <?= strtoupper(substr($employee['nama_lengkap'], 0, 1)) ?>
            </div>
            <div class="emp-hero-name"><?= esc($employee['nama_lengkap']) ?></div>
            <div class="emp-hero-meta">
                <span class="hero-role-badge"><?= ucfirst($employee['role']) ?></span>
                <span><i class="bi bi-at" style="margin-right:2px;"></i><?= esc($employee['username']) ?></span>
            </div>
        </div>

        <!-- Meta info -->
        <div class="form-card" style="margin-bottom:16px;">
            <div class="form-card-header">
                <div class="form-card-icon" style="background:rgba(13,27,62,0.07);">
                    <i class="bi bi-info-circle" style="color:var(--navy);"></i>
                </div>
                <div class="form-card-title">Info Akun</div>
            </div>
            <div class="form-card-body" style="padding:16px 24px;">
                <div style="display:flex;flex-direction:column;gap:10px;">
                    <div style="display:flex;justify-content:space-between;align-items:center;padding-bottom:10px;border-bottom:1px solid var(--border);">
                        <span style="font-size:12.5px;color:var(--text-muted);">Status</span>
                        <span style="font-size:13px;font-weight:600;color:<?= $employee['is_active'] ? '#10B981' : '#EF4444' ?>;">
                            <i class="bi bi-circle-fill" style="font-size:7px;margin-right:4px;"></i>
                            <?= $employee['is_active'] ? 'Aktif' : 'Nonaktif' ?>
                        </span>
                    </div>
                    <div style="display:flex;justify-content:space-between;align-items:center;padding-bottom:10px;border-bottom:1px solid var(--border);">
                        <span style="font-size:12.5px;color:var(--text-muted);">Bergabung</span>
                        <span style="font-size:13px;font-weight:500;color:var(--dark);">
                            <?= date('d M Y', strtotime($employee['created_at'])) ?>
                        </span>
                    </div>
                    <div style="display:flex;justify-content:space-between;align-items:center;">
                        <span style="font-size:12.5px;color:var(--text-muted);">Terakhir update</span>
                        <span style="font-size:13px;font-weight:500;color:var(--dark);">
                            <?= $employee['updated_at'] ? date('d M Y', strtotime($employee['updated_at'])) : '—' ?>
                        </span>
                    </div>
                </div>
            </div>
        </div>

        <!-- Reset password -->
        <?php if ($employee['id_user'] !== session()->get('id_user')): ?>
        <div class="reset-card">
            <div class="reset-title">
                <i class="bi bi-key-fill"></i> Reset Password
            </div>
            <p class="reset-desc">
                Reset password employee ini. Mereka bisa ganti lagi lewat halaman profil setelah login.
            </p>
            <button class="btn-reset-pass" data-bs-toggle="modal" data-bs-target="#modalResetPass">
                <i class="bi bi-arrow-repeat"></i> Reset Password
            </button>
        </div>

        <!-- Danger zone -->
        <div class="danger-zone">
            <div class="danger-title">
                <i class="bi bi-exclamation-triangle-fill"></i> Hapus Akun
            </div>
            <p class="danger-desc">
                Menghapus akun ini bersifat permanen. Pastikan employee sudah tidak aktif bekerja.
            </p>
            <form action="<?= base_url('employee/delete/' . $employee['id_user']) ?>" method="POST"
                  onsubmit="return confirm('Hapus akun <?= esc($employee['nama_lengkap']) ?>? Tindakan ini tidak dapat dibatalkan.')">
                <?= csrf_field() ?>
                <input type="hidden" name="_method" value="DELETE">
                <button type="submit" class="btn-danger">
                    <i class="bi bi-trash3"></i> Hapus Akun Ini
                </button>
            </form>
        </div>
        <?php else: ?>
        <div style="background:#F0FDF4;border:1.5px dashed #A7F3D0;border-radius:14px;padding:16px 20px;">
            <div style="font-size:13px;font-weight:700;color:#065F46;display:flex;align-items:center;gap:6px;margin-bottom:4px;">
                <i class="bi bi-person-check-fill"></i> Ini akun kamu sendiri
            </div>
            <p style="font-size:12.5px;color:#047857;margin:0;line-height:1.6;">
                Untuk keamanan, hapus & reset password akun sendiri tidak bisa dilakukan di sini. Gunakan halaman <a href="<?= base_url('profile/edit') ?>" style="color:var(--tosca);font-weight:600;">Profil</a>.
            </p>
        </div>
        <?php endif; ?>

    </div>

    <!-- ── KANAN: Form Edit ── -->
    <div class="col-lg-8">
        <div class="form-card">
            <div class="form-card-header">
                <div class="form-card-icon" style="background:rgba(46,196,182,0.12);">
                    <i class="bi bi-pencil-square" style="color:var(--tosca);"></i>
                </div>
                <div class="form-card-title">Edit Data Employee</div>
            </div>
            <div class="form-card-body">

                <?php if (session()->getFlashdata('error')): ?>
                <div class="alert-err">
                    <i class="bi bi-exclamation-circle-fill mt-1"></i>
                    <div><?= session()->getFlashdata('error') ?></div>
                </div>
                <?php endif; ?>

                <form action="<?= base_url('employee/update/' . $employee['id_user']) ?>" method="POST">
                    <?= csrf_field() ?>

                    <label class="field-label">Nama Lengkap <span style="color:var(--sky);">*</span></label>
                    <div class="field-wrap">
                        <i class="bi bi-person field-icon"></i>
                        <input type="text" name="nama_lengkap" class="form-input"
                               value="<?= esc(old('nama_lengkap', $employee['nama_lengkap'])) ?>"
                               placeholder="Nama lengkap" required>
                    </div>

                    <label class="field-label" style="color:var(--text-muted);">
                        Username <span style="font-weight:400;">(tidak bisa diubah)</span>
                    </label>
                    <div class="field-wrap">
                        <i class="bi bi-at field-icon"></i>
                        <input type="text" class="form-input readonly-field"
                               value="<?= esc($employee['username']) ?>" readonly>
                    </div>

                    <label class="field-label">Email</label>
                    <div class="field-wrap">
                        <i class="bi bi-envelope field-icon"></i>
                        <input type="email" name="email" class="form-input"
                               value="<?= esc(old('email', $employee['email'] ?? '')) ?>"
                               placeholder="Email (opsional)">
                    </div>

                    <div class="row g-3">
                        <div class="col-md-6">
                            <label class="field-label">Role <span style="color:var(--sky);">*</span></label>
                            <div class="field-wrap" style="margin-bottom:0;">
                                <i class="bi bi-shield-half field-icon"></i>
                                <select name="role" class="form-select-custom"
                                        <?= $employee['id_user'] === session()->get('id_user') ? 'disabled' : '' ?>>
                                    <option value="admin"  <?= $employee['role'] === 'admin'  ? 'selected' : '' ?>>Admin</option>
                                    <option value="kasir"  <?= $employee['role'] === 'kasir'  ? 'selected' : '' ?>>Kasir</option>
                                </select>
                                <?php if ($employee['id_user'] === session()->get('id_user')): ?>
                                    <input type="hidden" name="role" value="<?= $employee['role'] ?>">
                                <?php endif; ?>
                            </div>
                        </div>
                        <div class="col-md-6">
                            <label class="field-label">Status</label>
                            <div class="field-wrap" style="margin-bottom:0;">
                                <i class="bi bi-toggle-on field-icon"></i>
                                <select name="is_active" class="form-select-custom"
                                        <?= $employee['id_user'] === session()->get('id_user') ? 'disabled' : '' ?>>
                                    <option value="1" <?= $employee['is_active'] == 1 ? 'selected' : '' ?>>Aktif</option>
                                    <option value="0" <?= $employee['is_active'] == 0 ? 'selected' : '' ?>>Nonaktif</option>
                                </select>
                                <?php if ($employee['id_user'] === session()->get('id_user')): ?>
                                    <input type="hidden" name="is_active" value="<?= $employee['is_active'] ?>">
                                <?php endif; ?>
                            </div>
                        </div>
                    </div>

                    <?php if ($employee['id_user'] === session()->get('id_user')): ?>
                    <div class="info-box" style="margin-top:18px;">
                        <i class="bi bi-info-circle-fill"></i>
                        <p>Role dan status tidak bisa diubah untuk akun sendiri. Gunakan halaman <a href="<?= base_url('profile/edit') ?>" style="color:var(--sky);font-weight:600;">Profil</a> untuk edit data pribadi.</p>
                    </div>
                    <?php endif; ?>

                    <div class="d-flex justify-content-between align-items-center mt-4">
                        <a href="<?= base_url('employee') ?>"
                           style="color:var(--text-muted);font-size:13px;text-decoration:none;display:flex;align-items:center;gap:5px;">
                            <i class="bi bi-arrow-left"></i> Kembali
                        </a>
                        <button type="submit" class="btn-save">
                            <i class="bi bi-check-lg"></i> Simpan Perubahan
                        </button>
                    </div>
                </form>
            </div>
        </div>
    </div>
</div>

<!-- ══ MODAL RESET PASSWORD ══ -->
<div class="modal fade bs-modal-custom" id="modalResetPass" tabindex="-1">
    <div class="modal-dialog modal-dialog-centered" style="max-width:440px;">
        <div class="modal-content">
            <div class="modal-header">
                <div class="modal-title">
                    <i class="bi bi-key-fill"></i> Reset Password
                </div>
                <button type="button" class="btn-close" data-bs-dismiss="modal"></button>
            </div>
            <form action="<?= base_url('employee/reset-password/' . $employee['id_user']) ?>" method="POST">
                <?= csrf_field() ?>
                <div class="modal-body">
                    <div class="info-box" style="margin-bottom:20px;">
                        <i class="bi bi-info-circle-fill"></i>
                        <p>Set password baru untuk <strong><?= esc($employee['nama_lengkap']) ?></strong>. Employee bisa ganti lagi lewat halaman profil mereka.</p>
                    </div>

                    <label class="field-label">Password Baru <span style="color:var(--sky);">*</span></label>
                    <div class="field-wrap" style="margin-bottom:0;">
                        <i class="bi bi-lock field-icon"></i>
                        <input type="password" name="password_baru" id="resetPass" class="form-input"
                               placeholder="Minimal 6 karakter" required>
                        <button type="button" class="toggle-eye" onclick="toggleEye('resetPass','resetPassEye')">
                            <i class="bi bi-eye" id="resetPassEye"></i>
                        </button>
                    </div>
                </div>
                <div class="modal-footer">
                    <button type="button" class="btn-modal-cancel" data-bs-dismiss="modal">Batal</button>
                    <button type="submit" class="btn-modal-save" style="background:linear-gradient(135deg,var(--purple),var(--tosca));box-shadow:0 3px 10px rgba(155,137,196,0.3);">
                        <i class="bi bi-arrow-repeat"></i> Reset
                    </button>
                </div>
            </form>
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
</script>