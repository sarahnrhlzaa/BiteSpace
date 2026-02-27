<style>
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

    .hint-text {
        font-size: 11.5px; color: var(--text-muted);
        margin-top: 0; margin-bottom: 18px; padding-left: 2px;
    }

    /* ── Preview avatar ── */
    .avatar-preview {
        width: 64px; height: 64px; border-radius: 16px;
        display: flex; align-items: center; justify-content: center;
        font-family: 'Plus Jakarta Sans', sans-serif;
        font-weight: 800; font-size: 26px; color: #fff;
        transition: background 0.3s;
        background: linear-gradient(135deg, var(--yellow), var(--tosca));
    }
    .avatar-preview.role-admin { background: linear-gradient(135deg, var(--sky), var(--purple)); }
    .avatar-preview.role-kasir { background: linear-gradient(135deg, var(--yellow), var(--tosca)); }

    @keyframes fadeUp {
        from { opacity: 0; transform: translateY(14px); }
        to   { opacity: 1; transform: translateY(0); }
    }

    /* ── Modal (reuse dari index) ── */
    .bs-modal-custom .modal-content {
        border: none; border-radius: 18px; overflow: hidden;
        box-shadow: 0 20px 60px rgba(0,0,0,0.15);
    }
    .bs-modal-custom .modal-header {
        background: linear-gradient(135deg, var(--navy) 0%, #162952 100%);
        border: none; padding: 20px 24px;
    }
    .bs-modal-custom .modal-title {
        font-family: 'Plus Jakarta Sans', sans-serif;
        font-weight: 700; font-size: 16px; color: #fff;
        display: flex; align-items: center; gap: 10px;
    }
    .bs-modal-custom .btn-close { filter: invert(1) brightness(2); }
    .bs-modal-custom .modal-body { padding: 24px; }
    .bs-modal-custom .modal-footer {
        border-top: 1px solid var(--border); padding: 16px 24px; background: #FAFBFD;
    }
</style>

<!-- Breadcrumb -->
<div style="display:flex;align-items:center;gap:8px;margin-bottom:20px;font-size:13px;color:var(--text-muted);">
    <a href="<?= base_url('employee') ?>"
       style="color:var(--tosca);text-decoration:none;font-weight:600;display:flex;align-items:center;gap:5px;">
        <i class="bi bi-people-fill"></i> Employee
    </a>
    <i class="bi bi-chevron-right" style="font-size:11px;"></i>
    <span>Tambah Employee Baru</span>
</div>

<div class="row g-4">

    <!-- ── KIRI: Preview ── -->
    <div class="col-lg-4">
        <!-- Avatar Preview -->
        <div class="form-card" style="margin-bottom:16px;">
            <div class="form-card-header">
                <div class="form-card-icon" style="background:rgba(75,163,195,0.1);">
                    <i class="bi bi-person-badge" style="color:var(--sky);"></i>
                </div>
                <div class="form-card-title">Preview Akun</div>
            </div>
            <div class="form-card-body" style="display:flex;flex-direction:column;align-items:center;text-align:center;padding:28px 24px;">
                <div class="avatar-preview role-kasir" id="avatarPreview">?</div>
                <div style="margin-top:14px;font-family:'Plus Jakarta Sans',sans-serif;font-weight:700;font-size:16px;color:var(--dark);" id="namePreview">Nama Employee</div>
                <div style="font-size:12.5px;color:var(--text-muted);margin-top:4px;" id="usernamePreview">@username</div>
                <div style="margin-top:10px;" id="rolePreview">
                    <span style="background:rgba(255,209,102,0.2);color:#92600a;font-size:11.5px;font-weight:700;padding:4px 11px;border-radius:20px;font-family:'Plus Jakarta Sans',sans-serif;">
                        <i class="bi bi-star-fill" style="font-size:10px;"></i> Kasir
                    </span>
                </div>
            </div>
        </div>

        <!-- Info box -->
        <div class="info-box">
            <i class="bi bi-info-circle-fill"></i>
            <p>Employee baru akan bisa login langsung dengan username dan password yang kamu set. Mereka bisa ganti password sendiri lewat halaman profil.</p>
        </div>
    </div>

    <!-- ── KANAN: Form ── -->
    <div class="col-lg-8">
        <div class="form-card">
            <div class="form-card-header">
                <div class="form-card-icon" style="background:rgba(46,196,182,0.12);">
                    <i class="bi bi-person-plus-fill" style="color:var(--tosca);"></i>
                </div>
                <div class="form-card-title">Data Employee Baru</div>
            </div>
            <div class="form-card-body">

                <?php if (session()->getFlashdata('error')): ?>
                <div class="alert-err">
                    <i class="bi bi-exclamation-circle-fill mt-1"></i>
                    <div><?= session()->getFlashdata('error') ?></div>
                </div>
                <?php endif; ?>

                <form action="<?= base_url('employee/store') ?>" method="POST">
                    <?= csrf_field() ?>

                    <!-- Nama & Username -->
                    <div class="row g-3">
                        <div class="col-md-6">
                            <label class="field-label">Nama Lengkap <span style="color:var(--sky);">*</span></label>
                            <div class="field-wrap">
                                <i class="bi bi-person field-icon"></i>
                                <input type="text" name="nama_lengkap" id="inputNama" class="form-input"
                                       placeholder="Nama lengkap employee"
                                       value="<?= esc(old('nama_lengkap')) ?>" required>
                            </div>
                        </div>
                        <div class="col-md-6">
                            <label class="field-label">Username <span style="color:var(--sky);">*</span></label>
                            <div class="field-wrap">
                                <i class="bi bi-at field-icon"></i>
                                <input type="text" name="username" id="inputUsername" class="form-input"
                                       placeholder="Username unik (lowercase)"
                                       value="<?= esc(old('username')) ?>" required>
                            </div>
                        </div>
                    </div>

                    <!-- Email -->
                    <label class="field-label">Email <span style="font-weight:400;color:var(--text-muted);">— opsional</span></label>
                    <div class="field-wrap">
                        <i class="bi bi-envelope field-icon"></i>
                        <input type="email" name="email" class="form-input"
                               placeholder="email@contoh.com"
                               value="<?= esc(old('email')) ?>">
                    </div>

                    <!-- Role & Status -->
                    <div class="row g-3">
                        <div class="col-md-6">
                            <label class="field-label">Role <span style="color:var(--sky);">*</span></label>
                            <div class="field-wrap" style="margin-bottom:0;">
                                <i class="bi bi-shield-half field-icon"></i>
                                <select name="role" id="inputRole" class="form-select-custom">
                                    <option value="kasir" <?= old('role') === 'kasir' || !old('role') ? 'selected' : '' ?>>Kasir</option>
                                    <option value="admin" <?= old('role') === 'admin' ? 'selected' : '' ?>>Admin</option>
                                </select>
                            </div>
                        </div>
                        <div class="col-md-6">
                            <label class="field-label">Status Awal</label>
                            <div class="field-wrap" style="margin-bottom:0;">
                                <i class="bi bi-toggle-on field-icon"></i>
                                <select name="is_active" class="form-select-custom">
                                    <option value="1" <?= old('is_active', '1') == '1' ? 'selected' : '' ?>>Aktif</option>
                                    <option value="0" <?= old('is_active') == '0' ? 'selected' : '' ?>>Nonaktif</option>
                                </select>
                            </div>
                        </div>
                    </div>

                    <!-- Password -->
                    <div style="margin-top:18px;">
                        <label class="field-label">Password <span style="color:var(--sky);">*</span></label>
                        <div class="field-wrap" style="margin-bottom:4px;">
                            <i class="bi bi-lock field-icon"></i>
                            <input type="password" name="password" id="inputPass" class="form-input"
                                   placeholder="Minimal 6 karakter" required>
                            <button type="button" class="toggle-eye" onclick="toggleEye('inputPass','passEye')">
                                <i class="bi bi-eye" id="passEye"></i>
                            </button>
                        </div>
                        <p class="hint-text"><i class="bi bi-info-circle me-1"></i>Employee bisa ganti password sendiri lewat halaman profil setelah login.</p>
                    </div>

                    <!-- Actions -->
                    <div class="d-flex justify-content-between align-items-center mt-4">
                        <a href="<?= base_url('employee') ?>"
                           style="color:var(--text-muted);font-size:13px;text-decoration:none;display:flex;align-items:center;gap:5px;">
                            <i class="bi bi-arrow-left"></i> Kembali
                        </a>
                        <button type="submit" class="btn-save">
                            <i class="bi bi-check-lg"></i> Simpan Employee
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

// Live preview
const inputNama     = document.getElementById('inputNama');
const inputUsername = document.getElementById('inputUsername');
const inputRole     = document.getElementById('inputRole');
const avatarEl      = document.getElementById('avatarPreview');
const nameEl        = document.getElementById('namePreview');
const usernameEl    = document.getElementById('usernamePreview');
const roleEl        = document.getElementById('rolePreview');

function updatePreview() {
    const nama     = inputNama.value.trim() || 'Nama Employee';
    const username = inputUsername.value.trim() || 'username';
    const role     = inputRole.value;

    // Avatar inisial
    avatarEl.textContent = nama.charAt(0).toUpperCase() || '?';
    avatarEl.className   = 'avatar-preview role-' + role;

    nameEl.textContent     = nama;
    usernameEl.textContent = '@' + username.toLowerCase();

    const isAdmin = role === 'admin';
    roleEl.innerHTML = `
        <span style="background:${isAdmin ? 'rgba(75,163,195,0.12)' : 'rgba(255,209,102,0.2)'};
                     color:${isAdmin ? '#1e6e8e' : '#92600a'};
                     font-size:11.5px;font-weight:700;padding:4px 11px;border-radius:20px;
                     font-family:'Plus Jakarta Sans',sans-serif;">
            <i class="bi bi-${isAdmin ? 'shield-fill' : 'star-fill'}" style="font-size:10px;"></i>
            ${isAdmin ? 'Admin' : 'Kasir'}
        </span>`;
}

inputNama.addEventListener('input', updatePreview);
inputUsername.addEventListener('input', updatePreview);
inputRole.addEventListener('change', updatePreview);

// Username otomatis lowercase
inputUsername.addEventListener('input', function() {
    const pos = this.selectionStart;
    this.value = this.value.toLowerCase().replace(/\s/g, '');
    this.setSelectionRange(pos, pos);
});

updatePreview();
</script>