<style>
    /* ══ BiteSpace Palette

    /* ── Stats ── */
    .emp-stats {
        display: grid;
        grid-template-columns: repeat(4, 1fr);
        gap: 16px;
        margin-bottom: 24px;
        animation: fadeUp 0.35s ease both;
    }
    .stat-chip {
        background: #fff;
        border: 1px solid var(--border);
        border-radius: 14px;
        padding: 16px 20px;
        display: flex;
        align-items: center;
        gap: 14px;
        transition: box-shadow 0.2s;
    }
    .stat-chip:hover { box-shadow: 0 4px 16px rgba(0,0,0,0.07); }
    .stat-chip-icon {
        width: 42px; height: 42px;
        border-radius: 12px;
        display: flex; align-items: center; justify-content: center;
        font-size: 18px; flex-shrink: 0;
    }
    .stat-chip-val {
        font-family: 'Plus Jakarta Sans', sans-serif;
        font-weight: 800; font-size: 22px;
        color: var(--dark); line-height: 1;
    }
    .stat-chip-label {
        font-size: 11.5px; color: var(--text-muted);
        font-weight: 500; margin-top: 3px;
    }

    /* ── Toolbar ── */
    .emp-toolbar {
        background: #fff;
        border: 1px solid var(--border);
        border-radius: 16px;
        padding: 16px 20px;
        display: flex; align-items: center;
        justify-content: space-between;
        gap: 12px; margin-bottom: 20px;
        flex-wrap: wrap;
        animation: fadeUp 0.35s ease 0.05s both;
    }
    .toolbar-left { display: flex; align-items: center; gap: 10px; flex-wrap: wrap; }
    .search-wrap { position: relative; }
    .search-wrap i {
        position: absolute; left: 12px; top: 50%;
        transform: translateY(-50%);
        color: var(--text-muted); font-size: 14px; pointer-events: none;
    }
    .search-input {
        height: 40px; padding-left: 36px; padding-right: 14px;
        border: 1.5px solid var(--border); border-radius: 10px;
        font-size: 13px; font-family: 'DM Sans', sans-serif;
        color: var(--dark); background: #FAFBFD; width: 220px; transition: all 0.2s;
    }
    .search-input:focus {
        outline: none; border-color: var(--sky);
        box-shadow: 0 0 0 3px rgba(75,163,195,0.12); background: #fff;
    }
    .filter-select {
        height: 40px; padding: 0 14px;
        border: 1.5px solid var(--border); border-radius: 10px;
        font-size: 13px; font-family: 'DM Sans', sans-serif;
        color: var(--dark); background: #FAFBFD; cursor: pointer; transition: all 0.2s;
    }
    .filter-select:focus {
        outline: none; border-color: var(--sky);
        box-shadow: 0 0 0 3px rgba(75,163,195,0.12);
    }
    .btn-add-emp {
        height: 40px; padding: 0 18px;
        background: linear-gradient(135deg, var(--sky), var(--tosca));
        color: #fff; border: none; border-radius: 10px;
        font-family: 'Plus Jakarta Sans', sans-serif;
        font-weight: 700; font-size: 13px; cursor: pointer;
        display: inline-flex; align-items: center; gap: 7px;
        transition: all 0.2s; box-shadow: 0 3px 10px rgba(46,196,182,0.3);
        text-decoration: none;
    }
    .btn-add-emp:hover {
        filter: brightness(1.06); transform: translateY(-1px);
        box-shadow: 0 6px 16px rgba(46,196,182,0.35); color: #fff;
    }

    /* ── Table card ── */
    .emp-table-card {
        background: #fff;
        border: 1px solid var(--border);
        border-radius: 16px; overflow: hidden;
        animation: fadeUp 0.35s ease 0.08s both;
    }
    .emp-table {
        width: 100%; border-collapse: collapse;
    }
    .emp-table thead tr {
        background: #F8F9FB;
        border-bottom: 1px solid var(--border);
    }
    .emp-table thead th {
        padding: 12px 20px;
        font-family: 'Plus Jakarta Sans', sans-serif;
        font-size: 11px; font-weight: 700;
        color: var(--text-muted);
        text-transform: uppercase; letter-spacing: 0.8px;
        text-align: left; white-space: nowrap;
    }
    .emp-table tbody tr {
        border-bottom: 1px solid var(--border);
        transition: background 0.15s;
    }
    .emp-table tbody tr:last-child { border-bottom: none; }
    .emp-table tbody tr:hover { background: #FAFBFD; }
    .emp-table tbody td {
        padding: 14px 20px;
        font-size: 13.5px; color: var(--dark); vertical-align: middle;
    }

    /* ── Avatar initials ── */
    .emp-avatar {
        width: 38px; height: 38px;
        border-radius: 11px;
        display: flex; align-items: center; justify-content: center;
        font-family: 'Plus Jakarta Sans', sans-serif;
        font-weight: 800; font-size: 15px; color: #fff;
        flex-shrink: 0;
    }
    .avatar-admin { background: linear-gradient(135deg, var(--sky), var(--purple)); }
    .avatar-kasir { background: linear-gradient(135deg, var(--yellow), var(--tosca)); }

    .emp-name {
        font-family: 'Plus Jakarta Sans', sans-serif;
        font-weight: 700; font-size: 14px; color: var(--dark);
    }
    .emp-username {
        font-size: 12px; color: var(--text-muted); margin-top: 2px;
    }

    /* ── Role pill ── */
    .role-pill {
        display: inline-flex; align-items: center; gap: 5px;
        padding: 4px 11px; border-radius: 20px;
        font-size: 11.5px; font-weight: 700;
        font-family: 'Plus Jakarta Sans', sans-serif;
    }
    .role-admin { background: rgba(75,163,195,0.12); color: #1e6e8e; }
    .role-kasir { background: rgba(255,209,102,0.2); color: #92600a; }

    /* ── Status badge ── */
    .status-badge {
        display: inline-flex; align-items: center; gap: 5px;
        padding: 4px 10px; border-radius: 20px;
        font-size: 11.5px; font-weight: 600;
    }
    .status-dot { width: 6px; height: 6px; border-radius: 50%; }
    .badge-active   { background: #ECFDF5; color: #065F46; }
    .badge-active .status-dot   { background: #10B981; }
    .badge-inactive { background: #FEF2F2; color: #991B1B; }
    .badge-inactive .status-dot { background: #EF4444; }

    /* ── Action buttons ── */
    .action-btns { display: flex; gap: 6px; }
    .btn-act {
        width: 32px; height: 32px;
        border-radius: 8px; border: 1.5px solid var(--border);
        background: #FAFBFD; color: var(--text-muted);
        display: flex; align-items: center; justify-content: center;
        font-size: 13px; cursor: pointer; transition: all 0.18s;
        text-decoration: none;
    }
    .btn-act-edit:hover  { background: rgba(75,163,195,0.1); border-color: var(--sky); color: var(--sky); }
    .btn-act-toggle:hover { background: rgba(255,209,102,0.15); border-color: #D97706; color: #D97706; }
    .btn-act-del:hover   { background: rgba(239,68,68,0.08); border-color: #EF4444; color: #EF4444; }

    /* ── Empty state ── */
    .empty-state {
        text-align: center; padding: 60px 20px; color: var(--text-muted);
    }
    .empty-state i { font-size: 48px; opacity: 0.3; display: block; margin-bottom: 12px; }

    /* ── Modal ── */
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

    /* ── Form fields (reuse pattern) ── */
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

    .btn-modal-save {
        height: 44px; padding: 0 24px;
        background: linear-gradient(135deg, var(--sky), var(--tosca));
        color: #fff; border: none; border-radius: 10px;
        font-family: 'Plus Jakarta Sans', sans-serif;
        font-weight: 700; font-size: 13.5px; cursor: pointer;
        display: inline-flex; align-items: center; gap: 7px;
        transition: all 0.2s; box-shadow: 0 3px 10px rgba(46,196,182,0.3);
    }
    .btn-modal-save:hover { filter: brightness(1.06); transform: translateY(-1px); }
    .btn-modal-cancel {
        height: 44px; padding: 0 20px;
        background: #fff; color: var(--text-muted);
        border: 1.5px solid var(--border); border-radius: 10px;
        font-family: 'Plus Jakarta Sans', sans-serif;
        font-weight: 600; font-size: 13.5px; cursor: pointer; transition: all 0.2s;
    }
    .btn-modal-cancel:hover { background: #F5F6FA; color: var(--dark); }

    .hint-text {
        font-size: 11.5px; color: var(--text-muted);
        margin-top: -12px; margin-bottom: 18px; padding-left: 2px;
    }

    @keyframes fadeUp {
        from { opacity: 0; transform: translateY(14px); }
        to   { opacity: 1; transform: translateY(0); }
    }
    @media (max-width: 768px) {
        .emp-stats { grid-template-columns: repeat(2, 1fr); }
        .emp-toolbar { flex-direction: column; align-items: stretch; }
        .toolbar-left { flex-direction: column; }
        .search-input { width: 100%; }
        .emp-table thead th:nth-child(3),
        .emp-table tbody td:nth-child(3) { display: none; }
    }
</style>

<?php
$total   = count($employees);
$admin   = count(array_filter($employees, fn($e) => $e['role'] === 'admin'));
$kasir   = count(array_filter($employees, fn($e) => $e['role'] === 'kasir'));
$aktif   = count(array_filter($employees, fn($e) => $e['is_active'] == 1));
?>

<?php if (session()->getFlashdata('success')): ?>
<?= session()->getFlashdata('success') ?>
</div>
<?php endif; ?>
<?php if (session()->getFlashdata('error')): ?>
 <?= session()->getFlashdata('error') ?>
</div>
<?php endif; ?>

<!-- ── STATS ── -->
<div class="emp-stats">
    <div class="stat-chip">
        <div class="stat-chip-icon" style="background:rgba(13,27,62,0.08);">
            <i class="bi bi-people-fill" style="color:var(--navy);"></i>
        </div>
        <div>
            <div class="stat-chip-val"><?= $total ?></div>
            <div class="stat-chip-label">Total Employee</div>
        </div>
    </div>
    <div class="stat-chip">
        <div class="stat-chip-icon" style="background:rgba(75,163,195,0.12);">
            <i class="bi bi-shield-fill" style="color:var(--sky);"></i>
        </div>
        <div>
            <div class="stat-chip-val" style="color:var(--sky);"><?= $admin ?></div>
            <div class="stat-chip-label">Admin</div>
        </div>
    </div>
    <div class="stat-chip">
        <div class="stat-chip-icon" style="background:rgba(255,209,102,0.18);">
            <i class="bi bi-star-fill" style="color:#D97706;"></i>
        </div>
        <div>
            <div class="stat-chip-val" style="color:#D97706;"><?= $kasir ?></div>
            <div class="stat-chip-label">Kasir</div>
        </div>
    </div>
    <div class="stat-chip">
        <div class="stat-chip-icon" style="background:rgba(16,185,129,0.1);">
            <i class="bi bi-check-circle-fill" style="color:#10B981;"></i>
        </div>
        <div>
            <div class="stat-chip-val" style="color:#10B981;"><?= $aktif ?></div>
            <div class="stat-chip-label">Aktif</div>
        </div>
    </div>
</div>

<!-- ── TOOLBAR ── -->
<div class="emp-toolbar">
    <div class="toolbar-left">
        <div class="search-wrap">
            <i class="bi bi-search"></i>
            <input type="text" id="searchEmp" class="search-input" placeholder="Cari nama atau username...">
        </div>
        <select id="filterRole" class="filter-select">
            <option value="">Semua Role</option>
            <option value="admin">Admin</option>
            <option value="kasir">Kasir</option>
        </select>
        <select id="filterStatus" class="filter-select">
            <option value="">Semua Status</option>
            <option value="1">Aktif</option>
            <option value="0">Nonaktif</option>
        </select>
    </div>
    <button class="btn-add-emp" data-bs-toggle="modal" data-bs-target="#modalTambah">
        <i class="bi bi-person-plus-fill"></i> Tambah Employee
    </button>
</div>

<!-- ── TABLE ── -->
<div class="emp-table-card">
    <?php if (empty($employees)): ?>
        <div class="empty-state">
            <i class="bi bi-people"></i>
            <p>Belum ada data employee.</p>
        </div>
    <?php else: ?>
    <table class="emp-table" id="empTable">
        <thead>
            <tr>
                <th>#</th>
                <th>Employee</th>
                <th>Email</th>
                <th>Role</th>
                <th>Status</th>
                <th>Bergabung</th>
                <th>Aksi</th>
            </tr>
        </thead>
        <tbody id="empTbody">
            <?php foreach ($employees as $i => $emp): ?>
            <tr data-name="<?= strtolower($emp['nama_lengkap']) ?>"
                data-username="<?= strtolower($emp['username']) ?>"
                data-role="<?= $emp['role'] ?>"
                data-status="<?= $emp['is_active'] ?>">
                <td style="color:var(--text-muted); font-size:12px; width:40px;"><?= $i + 1 ?></td>
                <td>
                    <div style="display:flex; align-items:center; gap:12px;">
                        <div class="emp-avatar <?= $emp['role'] === 'admin' ? 'avatar-admin' : 'avatar-kasir' ?>">
                            <?= strtoupper(substr($emp['nama_lengkap'], 0, 1)) ?>
                        </div>
                        <div>
                            <div class="emp-name"><?= esc($emp['nama_lengkap']) ?></div>
                            <div class="emp-username">@<?= esc($emp['username']) ?></div>
                        </div>
                    </div>
                </td>
                <td style="color:var(--text-muted); font-size:13px;">
                    <?= $emp['email'] ? esc($emp['email']) : '<span style="font-style:italic;opacity:0.5;">—</span>' ?>
                </td>
                <td>
                    <span class="role-pill <?= $emp['role'] === 'admin' ? 'role-admin' : 'role-kasir' ?>">
                        <i class="bi bi-<?= $emp['role'] === 'admin' ? 'shield-fill' : 'star-fill' ?>" style="font-size:10px;"></i>
                        <?= ucfirst($emp['role']) ?>
                    </span>
                </td>
                <td>
                    <span class="status-badge <?= $emp['is_active'] ? 'badge-active' : 'badge-inactive' ?>">
                        <span class="status-dot"></span>
                        <?= $emp['is_active'] ? 'Aktif' : 'Nonaktif' ?>
                    </span>
                </td>
                <td style="color:var(--text-muted); font-size:12.5px;">
                    <?= date('d M Y', strtotime($emp['created_at'])) ?>
                </td>
                <td>
                    <div class="action-btns">
                        <!-- Edit -->
                        <a href="<?= base_url('employee/edit/' . $emp['id_user']) ?>"
                           class="btn-act btn-act-edit" title="Edit">
                            <i class="bi bi-pencil"></i>
                        </a>
                        <!-- Toggle aktif/nonaktif — skip kalau diri sendiri -->
                        <?php if ($emp['id_user'] !== session()->get('id_user')): ?>
                        <button class="btn-act btn-act-toggle"
                                title="<?= $emp['is_active'] ? 'Nonaktifkan' : 'Aktifkan' ?>"
                                onclick="toggleStatus(<?= $emp['id_user'] ?>, '<?= esc($emp['nama_lengkap']) ?>', <?= $emp['is_active'] ?>)">
                            <i class="bi bi-<?= $emp['is_active'] ? 'toggle-on' : 'toggle-off' ?>"></i>
                        </button>
                        <!-- Hapus -->
                        <button class="btn-act btn-act-del" title="Hapus"
                                onclick="confirmDelete(<?= $emp['id_user'] ?>, '<?= esc($emp['nama_lengkap']) ?>')">
                            <i class="bi bi-trash3"></i>
                        </button>
                        <?php else: ?>
                        <span title="Akun aktif kamu" style="padding:0 6px; font-size:11px; color:var(--text-muted); display:flex; align-items:center;">
                            <i class="bi bi-person-check-fill" style="color:var(--tosca);"></i>
                        </span>
                        <?php endif; ?>
                    </div>
                </td>
            </tr>
            <?php endforeach; ?>
        </tbody>
    </table>
    <?php endif; ?>
</div>

<!-- ══ MODAL TAMBAH ══ -->
<div class="modal fade bs-modal-custom" id="modalTambah" tabindex="-1">
    <div class="modal-dialog modal-dialog-centered" style="max-width:500px;">
        <div class="modal-content">
            <div class="modal-header">
                <div class="modal-title">
                    <i class="bi bi-person-plus-fill"></i> Tambah Employee Baru
                </div>
                <button type="button" class="btn-close" data-bs-dismiss="modal"></button>
            </div>
            <form action="<?= base_url('employee/store') ?>" method="POST">
                <?= csrf_field() ?>
                <div class="modal-body">

                    <label class="field-label">Nama Lengkap <span style="color:var(--sky);">*</span></label>
                    <div class="field-wrap">
                        <i class="bi bi-person field-icon"></i>
                        <input type="text" name="nama_lengkap" class="form-input"
                               placeholder="Nama lengkap" required>
                    </div>

                    <label class="field-label">Username <span style="color:var(--sky);">*</span></label>
                    <div class="field-wrap">
                        <i class="bi bi-at field-icon"></i>
                        <input type="text" name="username" class="form-input"
                               placeholder="Username unik" required>
                    </div>

                    <label class="field-label">Email</label>
                    <div class="field-wrap">
                        <i class="bi bi-envelope field-icon"></i>
                        <input type="email" name="email" class="form-input"
                               placeholder="Email (opsional)">
                    </div>

                    <div class="row g-3">
                        <div class="col-6">
                            <label class="field-label">Role <span style="color:var(--sky);">*</span></label>
                            <div class="field-wrap" style="margin-bottom:0;">
                                <i class="bi bi-shield-half field-icon"></i>
                                <select name="role" class="form-select-custom">
                                    <option value="kasir">Kasir</option>
                                    <option value="admin">Admin</option>
                                </select>
                            </div>
                        </div>
                        <div class="col-6">
                            <label class="field-label">Status</label>
                            <div class="field-wrap" style="margin-bottom:0;">
                                <i class="bi bi-toggle-on field-icon"></i>
                                <select name="is_active" class="form-select-custom">
                                    <option value="1">Aktif</option>
                                    <option value="0">Nonaktif</option>
                                </select>
                            </div>
                        </div>
                    </div>

                    <div style="margin-top:18px;">
                        <label class="field-label">Password <span style="color:var(--sky);">*</span></label>
                        <div class="field-wrap" style="margin-bottom:4px;">
                            <i class="bi bi-lock field-icon"></i>
                            <input type="password" name="password" id="addPass" class="form-input"
                                   placeholder="Minimal 6 karakter" required>
                            <button type="button" class="toggle-eye" onclick="toggleEye('addPass','addPassEye')">
                                <i class="bi bi-eye" id="addPassEye"></i>
                            </button>
                        </div>
                        <p class="hint-text"><i class="bi bi-info-circle me-1"></i>Kasir bisa ganti password sendiri lewat halaman profil.</p>
                    </div>

                </div>
                <div class="modal-footer">
                    <button type="button" class="btn-modal-cancel" data-bs-dismiss="modal">Batal</button>
                    <button type="submit" class="btn-modal-save">
                        <i class="bi bi-check-lg"></i> Simpan
                    </button>
                </div>
            </form>
        </div>
    </div>
</div>

<!-- Hidden forms -->
<form id="formToggle" action="" method="POST" style="display:none;">
    <?= csrf_field() ?>
</form>
<form id="formDelete" action="" method="POST" style="display:none;">
    <?= csrf_field() ?>
    <input type="hidden" name="_method" value="DELETE">
</form>

<script>
/* ── Filter ── */
function applyFilters() {
    const q      = document.getElementById('searchEmp').value.toLowerCase();
    const role   = document.getElementById('filterRole').value;
    const status = document.getElementById('filterStatus').value;

    document.querySelectorAll('#empTbody tr').forEach(row => {
        const matchQ      = row.dataset.name.includes(q) || row.dataset.username.includes(q);
        const matchRole   = !role   || row.dataset.role   === role;
        const matchStatus = !status || row.dataset.status === status;
        row.style.display = matchQ && matchRole && matchStatus ? '' : 'none';
    });
}
document.getElementById('searchEmp').addEventListener('input', applyFilters);
document.getElementById('filterRole').addEventListener('change', applyFilters);
document.getElementById('filterStatus').addEventListener('change', applyFilters);

/* ── Toggle show/hide password ── */
function toggleEye(inputId, iconId) {
    const inp  = document.getElementById(inputId);
    const icon = document.getElementById(iconId);
    inp.type   = inp.type === 'password' ? 'text' : 'password';
    icon.className = inp.type === 'password' ? 'bi bi-eye' : 'bi bi-eye-slash';
}

/* ── Toggle status aktif ── */
function toggleStatus(id, nama, isActive) {
    const aksi = isActive ? 'nonaktifkan' : 'aktifkan';
    if (!confirm(`${aksi.charAt(0).toUpperCase() + aksi.slice(1)} akun ${nama}?`)) return;
    const form   = document.getElementById('formToggle');
    form.action  = `<?= base_url('employee/toggle/') ?>${id}`;
    form.submit();
}

/* ── Hapus ── */
function confirmDelete(id, nama) {
    if (!confirm(`Hapus akun ${nama}? Tindakan ini tidak dapat dibatalkan.`)) return;
    const form  = document.getElementById('formDelete');
    form.action = `<?= base_url('employee/delete/') ?>${id}`;
    form.submit();
}
</script>