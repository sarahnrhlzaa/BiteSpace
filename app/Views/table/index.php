<style>
        /* ══ BiteSpace Palette
       --navy   : #0D1B3E
       --sky    : #4BA3C3
       --tosca  : #2EC4B6
       --purple : #9B89C4
       --yellow : #FFD166
       --deep   : #39007E
       --dark   : #1A1A2E
    ══════════════════════════════════ */

    /* ── Stats Bar ── */
    .table-stats {
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
        font-size: 18px;
        flex-shrink: 0;
    }

    .stat-chip-val {
        font-family: 'Plus Jakarta Sans', sans-serif;
        font-weight: 800;
        font-size: 22px;
        color: var(--dark);
        line-height: 1;
    }

    .stat-chip-label {
        font-size: 11.5px;
        color: var(--text-muted);
        font-weight: 500;
        margin-top: 3px;
    }

    /* ── Toolbar ── */
    .table-toolbar {
        background: #fff;
        border: 1px solid var(--border);
        border-radius: 16px;
        padding: 16px 20px;
        display: flex;
        align-items: center;
        justify-content: space-between;
        gap: 12px;
        margin-bottom: 20px;
        flex-wrap: wrap;
        animation: fadeUp 0.35s ease 0.05s both;
    }

    .toolbar-left { display: flex; align-items: center; gap: 10px; flex-wrap: wrap; }

    .search-wrap {
        position: relative;
    }
    .search-wrap i {
        position: absolute;
        left: 12px; top: 50%;
        transform: translateY(-50%);
        color: var(--text-muted);
        font-size: 14px;
        pointer-events: none;
    }
    .search-input {
        height: 40px;
        padding-left: 36px;
        padding-right: 14px;
        border: 1.5px solid var(--border);
        border-radius: 10px;
        font-size: 13px;
        font-family: 'DM Sans', sans-serif;
        color: var(--dark);
        background: #FAFBFD;
        width: 220px;
        transition: all 0.2s;
    }
    .search-input:focus {
        outline: none;
        border-color: var(--sky);
        box-shadow: 0 0 0 3px rgba(75,163,195,0.12);
        background: #fff;
    }

    .filter-select {
        height: 40px;
        padding: 0 14px;
        border: 1.5px solid var(--border);
        border-radius: 10px;
        font-size: 13px;
        font-family: 'DM Sans', sans-serif;
        color: var(--dark);
        background: #FAFBFD;
        cursor: pointer;
        transition: all 0.2s;
    }
    .filter-select:focus {
        outline: none;
        border-color: var(--sky);
        box-shadow: 0 0 0 3px rgba(75,163,195,0.12);
    }

    .btn-add-table {
        height: 40px;
        padding: 0 18px;
        background: linear-gradient(135deg, var(--sky), var(--tosca));
        color: #fff;
        border: none;
        border-radius: 10px;
        font-family: 'Plus Jakarta Sans', sans-serif;
        font-weight: 700;
        font-size: 13px;
        cursor: pointer;
        display: inline-flex;
        align-items: center;
        gap: 7px;
        transition: all 0.2s;
        box-shadow: 0 3px 10px rgba(46,196,182,0.3);
        text-decoration: none;
    }
    .btn-add-table:hover {
        filter: brightness(1.06);
        transform: translateY(-1px);
        box-shadow: 0 6px 16px rgba(46,196,182,0.35);
        color: #fff;
    }
    .btn-add-table:active { transform: translateY(0); }

    /* ── Area Tabs ── */
    .area-tabs {
        display: flex;
        gap: 8px;
        margin-bottom: 20px;
        animation: fadeUp 0.35s ease 0.08s both;
    }

    .area-tab {
        padding: 8px 18px;
        border-radius: 10px;
        border: 1.5px solid var(--border);
        background: #fff;
        font-family: 'Plus Jakarta Sans', sans-serif;
        font-size: 13px;
        font-weight: 600;
        color: var(--text-muted);
        cursor: pointer;
        transition: all 0.2s;
    }
    .area-tab:hover { border-color: var(--sky); color: var(--sky); }
    .area-tab.active {
        background: var(--navy);
        border-color: var(--navy);
        color: #fff;
    }
    .area-tab .tab-count {
        display: inline-block;
        background: rgba(255,255,255,0.2);
        border-radius: 6px;
        padding: 1px 7px;
        font-size: 11px;
        margin-left: 5px;
    }
    .area-tab:not(.active) .tab-count {
        background: rgba(0,0,0,0.07);
        color: var(--text-muted);
    }

    /* ── Grid Meja ── */
    .meja-grid {
        display: grid;
        grid-template-columns: repeat(auto-fill, minmax(200px, 1fr));
        gap: 16px;
        animation: fadeUp 0.35s ease 0.1s both;
    }

    .meja-card {
        background: #fff;
        border: 1.5px solid var(--border);
        border-radius: 16px;
        padding: 20px;
        cursor: pointer;
        transition: all 0.22s;
        position: relative;
        overflow: hidden;
    }
    .meja-card::before {
        content: '';
        position: absolute;
        top: 0; left: 0; right: 0;
        height: 3px;
        border-radius: 16px 16px 0 0;
    }
    .meja-card.available::before  { background: #10B981; }
    .meja-card.occupied::before   { background: #EF4444; }
    .meja-card.reserved::before   { background: var(--yellow); }

    .meja-card:hover {
        transform: translateY(-3px);
        box-shadow: 0 8px 24px rgba(0,0,0,0.09);
        border-color: transparent;
    }
    .meja-card.available:hover  { box-shadow: 0 8px 24px rgba(16,185,129,0.18); }
    .meja-card.occupied:hover   { box-shadow: 0 8px 24px rgba(239,68,68,0.18); }
    .meja-card.reserved:hover   { box-shadow: 0 8px 24px rgba(255,209,102,0.25); }

    .meja-number {
        font-family: 'Plus Jakarta Sans', sans-serif;
        font-weight: 800;
        font-size: 28px;
        color: var(--dark);
        line-height: 1;
        margin-bottom: 10px;
    }

    .meja-capacity {
        display: flex;
        align-items: center;
        gap: 5px;
        font-size: 12.5px;
        color: var(--text-muted);
        margin-bottom: 14px;
    }

    .meja-status-badge {
        display: inline-flex;
        align-items: center;
        gap: 5px;
        padding: 4px 11px;
        border-radius: 20px;
        font-size: 11.5px;
        font-weight: 700;
        font-family: 'Plus Jakarta Sans', sans-serif;
    }
    .badge-available { background: #ECFDF5; color: #065F46; }
    .badge-occupied  { background: #FEF2F2; color: #991B1B; }
    .badge-reserved  { background: #FFFBEB; color: #92400E; }

    .meja-dot {
        width: 7px; height: 7px;
        border-radius: 50%;
        display: inline-block;
    }
    .dot-available { background: #10B981; }
    .dot-occupied  { background: #EF4444; }
    .dot-reserved  { background: var(--yellow); }

    .meja-actions {
        display: flex;
        gap: 6px;
        margin-top: 14px;
        opacity: 0;
        transition: opacity 0.2s;
    }
    .meja-card:hover .meja-actions { opacity: 1; }

    .btn-meja-action {
        flex: 1;
        height: 32px;
        border-radius: 8px;
        border: 1.5px solid var(--border);
        background: #FAFBFD;
        color: var(--text-muted);
        font-size: 12px;
        font-weight: 600;
        display: flex; align-items: center; justify-content: center; gap: 4px;
        cursor: pointer;
        transition: all 0.18s;
        font-family: 'Plus Jakarta Sans', sans-serif;
        text-decoration: none;
    }
    .btn-meja-edit:hover   { background: rgba(75,163,195,0.1); border-color: var(--sky); color: var(--sky); text-decoration: none; }
    .btn-meja-del:hover    { background: rgba(239,68,68,0.08); border-color: #EF4444; color: #EF4444; }
    .btn-meja-status:hover { background: rgba(155,137,196,0.1); border-color: var(--purple); color: var(--purple); }

    /* ── Empty state ── */
    .empty-state {
        text-align: center;
        padding: 60px 20px;
        color: var(--text-muted);
        grid-column: 1 / -1;
    }
    .empty-state i { font-size: 48px; opacity: 0.3; display: block; margin-bottom: 12px; }
    .empty-state p { font-size: 14px; }



    @keyframes fadeUp {
        from { opacity: 0; transform: translateY(14px); }
        to   { opacity: 1; transform: translateY(0); }
    }

    @media (max-width: 768px) {
        .table-stats { grid-template-columns: repeat(2, 1fr); }
        .meja-grid   { grid-template-columns: repeat(auto-fill, minmax(160px, 1fr)); }
        .table-toolbar { flex-direction: column; align-items: stretch; }
        .toolbar-left { flex-direction: column; }
        .search-input { width: 100%; }
    }
</style>

<?php
/* ── Hitung stats ── */
$total     = count($tables);
$available = count(array_filter($tables, fn($t) => $t['status'] === 'available'));
$occupied  = count(array_filter($tables, fn($t) => $t['status'] === 'occupied'));
$reserved  = count(array_filter($tables, fn($t) => $t['status'] === 'reserved'));
?>





<!-- ── STATS ── -->
<div class="table-stats">
    <div class="stat-chip">
        <div class="stat-chip-icon" style="background:rgba(13,27,62,0.08);">
            <i class="bi bi-grid-3x3-gap" style="color:var(--navy);"></i>
        </div>
        <div>
            <div class="stat-chip-val"><?= $total ?></div>
            <div class="stat-chip-label">Total Meja</div>
        </div>
    </div>
    <div class="stat-chip">
        <div class="stat-chip-icon" style="background:rgba(16,185,129,0.1);">
            <i class="bi bi-check-circle" style="color:#10B981;"></i>
        </div>
        <div>
            <div class="stat-chip-val" style="color:#10B981;"><?= $available ?></div>
            <div class="stat-chip-label">Tersedia</div>
        </div>
    </div>
    <div class="stat-chip">
        <div class="stat-chip-icon" style="background:rgba(239,68,68,0.1);">
            <i class="bi bi-person-fill" style="color:#EF4444;"></i>
        </div>
        <div>
            <div class="stat-chip-val" style="color:#EF4444;"><?= $occupied ?></div>
            <div class="stat-chip-label">Terisi</div>
        </div>
    </div>
    <div class="stat-chip">
        <div class="stat-chip-icon" style="background:rgba(255,209,102,0.18);">
            <i class="bi bi-clock" style="color:#D97706;"></i>
        </div>
        <div>
            <div class="stat-chip-val" style="color:#D97706;"><?= $reserved ?></div>
            <div class="stat-chip-label">Dipesan</div>
        </div>
    </div>
</div>

<!-- ── TOOLBAR ── -->
<div class="table-toolbar">
    <div class="toolbar-left">
        <div class="search-wrap">
            <i class="bi bi-search"></i>
            <input type="text" id="searchMeja" class="search-input" placeholder="Cari nomor meja...">
        </div>
        <select id="filterStatus" class="filter-select">
            <option value="">Semua Status</option>
            <option value="available">Tersedia</option>
            <option value="occupied">Terisi</option>
            <option value="reserved">Dipesan</option>
        </select>
        <select id="filterKapasitas" class="filter-select">
            <option value="">Semua Kapasitas</option>
            <option value="2">2 Orang</option>
            <option value="4">4 Orang</option>
            <option value="6">6 Orang</option>
        </select>
    </div>
    <?php if (session()->get('role') === 'admin'): ?>
    <a href="<?= base_url('table/create') ?>" class="btn-add-table">
        <i class="bi bi-plus-lg"></i> Tambah Meja
    </a>
    <?php endif; ?>
</div>

<!-- ── AREA TABS ── -->
<?php
/* Grup berdasarkan prefix huruf area */
$areas = [];
foreach ($tables as $t) {
    $prefix = preg_replace('/[0-9]/', '', $t['nomor_meja']);
    $areas[$prefix][] = $t;
}
?>
<div class="area-tabs" id="areaTabs">
    <button class="area-tab active" data-area="all">
        Semua <span class="tab-count"><?= $total ?></span>
    </button>
    <?php foreach ($areas as $prefix => $rows): ?>
    <button class="area-tab" data-area="<?= $prefix ?>">
        <?= match($prefix) {
            'A' => 'Area Dalam',
            'B' => 'Area VIP',
            'C' => 'Area Outdoor',
            default => 'Area ' . $prefix
        } ?>
        <span class="tab-count"><?= count($rows) ?></span>
    </button>
    <?php endforeach; ?>
</div>

<!-- ── GRID MEJA ── -->
<div class="meja-grid" id="mejaGrid">
    <?php if (empty($tables)): ?>
        <div class="empty-state">
            <i class="bi bi-grid-3x3-gap"></i>
            <p>Belum ada data meja.<br>Klik <strong>Tambah Meja</strong> untuk mulai.</p>
        </div>
    <?php else: ?>
        <?php foreach ($tables as $t): ?>
        <div class="meja-card <?= $t['status'] ?>"
             data-nomor="<?= strtolower($t['nomor_meja']) ?>"
             data-status="<?= $t['status'] ?>"
             data-kapasitas="<?= $t['kapasitas'] ?>"
             data-area="<?= preg_replace('/[0-9]/', '', $t['nomor_meja']) ?>">

            <div class="meja-number"><?= esc($t['nomor_meja']) ?></div>

            <div class="meja-capacity">
                <i class="bi bi-people"></i>
                <?= $t['kapasitas'] ?> orang
            </div>

            <div>
                <?php
                $badgeClass = match($t['status']) {
                    'available' => 'badge-available',
                    'occupied'  => 'badge-occupied',
                    'reserved'  => 'badge-reserved',
                    default     => 'badge-available'
                };
                $dotClass = match($t['status']) {
                    'available' => 'dot-available',
                    'occupied'  => 'dot-occupied',
                    'reserved'  => 'dot-reserved',
                    default     => 'dot-available'
                };
                $labelStatus = match($t['status']) {
                    'available' => 'Tersedia',
                    'occupied'  => 'Terisi',
                    'reserved'  => 'Dipesan',
                    default     => 'Tersedia'
                };
                ?>
                <span class="meja-status-badge <?= $badgeClass ?>">
                    <span class="meja-dot <?= $dotClass ?>"></span>
                    <?= $labelStatus ?>
                </span>
            </div>

            <div class="meja-actions">
                <!-- Ubah status: semua role bisa -->
                <button class="btn-meja-action btn-meja-status"
                        onclick="ubahStatus(<?= $t['id_table'] ?>, '<?= $t['status'] ?>', '<?= esc($t['nomor_meja']) ?>', <?= $t['kapasitas'] ?>)">
                    <i class="bi bi-arrow-repeat"></i> Status
                </button>
                <?php if (session()->get('role') === 'admin'): ?>
                <a href="<?= base_url('table/edit/' . $t['id_table']) ?>"
                   class="btn-meja-action btn-meja-edit">
                    <i class="bi bi-pencil"></i> Edit
                </a>
                <button class="btn-meja-action btn-meja-del"
                        onclick="confirmDelete(<?= $t['id_table'] ?>, '<?= esc($t['nomor_meja']) ?>')">
                    <i class="bi bi-trash3"></i>
                </button>
                <?php endif; ?>
            </div>
        </div>
        <?php endforeach; ?>
    <?php endif; ?>
</div>

<?php if (session()->get('role') === 'admin'): ?>
<!-- Delete hidden form -->
<form id="formDelete" action="" method="POST" style="display:none;">
    <?= csrf_field() ?>
</form>
<?php endif; ?>

<script>
/* ── Filter & Search ── */
const cards = document.querySelectorAll('.meja-card');

function applyFilters() {
    const q         = document.getElementById('searchMeja').value.toLowerCase();
    const status    = document.getElementById('filterStatus').value;
    const kapasitas = document.getElementById('filterKapasitas').value;
    const activeTab = document.querySelector('.area-tab.active').dataset.area;

    let visible = 0;
    cards.forEach(c => {
        const matchSearch = c.dataset.nomor.includes(q);
        const matchStatus = !status || c.dataset.status === status;
        const matchKap    = !kapasitas || c.dataset.kapasitas === kapasitas;
        const matchArea   = activeTab === 'all' || c.dataset.area === activeTab;
        const show        = matchSearch && matchStatus && matchKap && matchArea;
        c.style.display   = show ? '' : 'none';
        if (show) visible++;
    });

    const grid = document.getElementById('mejaGrid');
    let emptyEl = grid.querySelector('.empty-state-filter');
    if (visible === 0 && cards.length > 0) {
        if (!emptyEl) {
            emptyEl = document.createElement('div');
            emptyEl.className = 'empty-state empty-state-filter';
            emptyEl.innerHTML = '<i class="bi bi-search"></i><p>Tidak ada meja yang sesuai filter.</p>';
            grid.appendChild(emptyEl);
        }
        emptyEl.style.display = '';
    } else if (emptyEl) {
        emptyEl.style.display = 'none';
    }
}

document.getElementById('searchMeja').addEventListener('input', applyFilters);
document.getElementById('filterStatus').addEventListener('change', applyFilters);
document.getElementById('filterKapasitas').addEventListener('change', applyFilters);

/* ── Area Tabs ── */
document.querySelectorAll('.area-tab').forEach(tab => {
    tab.addEventListener('click', () => {
        document.querySelectorAll('.area-tab').forEach(t => t.classList.remove('active'));
        tab.classList.add('active');
        applyFilters();
    });
});

/* ── Confirm Delete (admin only) ── */
<?php if (session()->get('role') === 'admin'): ?>
function confirmDelete(id, nomor) {
    if (!confirm(`Hapus meja ${nomor}? Tindakan ini tidak dapat dibatalkan.`)) return;
    const form = document.getElementById('formDelete');
    form.action = `<?= base_url('table/delete/') ?>${id}`;
    form.submit();
}
<?php endif; ?>

/* ── Ubah Status (semua role) ── */
function ubahStatus(id, currentStatus, nomor, kapasitas) {
    const labels = { available: 'Tersedia', occupied: 'Terisi', reserved: 'Dipesan' };
    const options = ['available', 'occupied', 'reserved']
        .map(s => `<option value="${s}" ${s === currentStatus ? 'selected' : ''}>${labels[s]}</option>`)
        .join('');

    // Buat modal sederhana
    const overlay = document.createElement('div');
    overlay.style.cssText = 'position:fixed;inset:0;background:rgba(0,0,0,0.4);z-index:9999;display:flex;align-items:center;justify-content:center;';
    overlay.innerHTML = `
        <div style="background:#fff;border-radius:16px;padding:28px;width:320px;box-shadow:0 20px 60px rgba(0,0,0,0.2);">
            <div style="font-family:'Plus Jakarta Sans',sans-serif;font-weight:700;font-size:16px;color:#1A1A2E;margin-bottom:12px;">Ubah Status Meja</div>
            <div style="background:linear-gradient(135deg,#0D1B3E,#162952);border-radius:12px;padding:14px 18px;margin-bottom:18px;display:flex;align-items:center;gap:14px;">
                <div style="font-family:'Plus Jakarta Sans',sans-serif;font-weight:800;font-size:28px;color:#fff;line-height:1;">${nomor}</div>
                <div style="font-size:12px;color:rgba(255,255,255,0.5);"><i class="bi bi-people" style="margin-right:4px;"></i>${kapasitas} orang</div>
            </div>
            <div style="font-size:12.5px;color:#8A8FAB;margin-bottom:8px;font-weight:500;">Pilih status baru</div>            <select id="statusPilihan" style="width:100%;height:44px;padding:0 14px;border:1.5px solid #ECEEF5;border-radius:10px;font-size:13.5px;font-family:'DM Sans',sans-serif;background:#FAFBFD;margin-bottom:18px;cursor:pointer;">
                ${options}
            </select>
            <div style="display:flex;gap:10px;justify-content:flex-end;">
                <button onclick="this.closest('[style]').remove()" style="height:40px;padding:0 18px;border:1.5px solid #ECEEF5;background:#fff;border-radius:9px;font-family:'Plus Jakarta Sans',sans-serif;font-weight:600;font-size:13px;cursor:pointer;color:#8A8FAB;">Batal</button>
                <button onclick="submitStatus(${id})" style="height:40px;padding:0 18px;background:linear-gradient(135deg,#9B89C4,#2EC4B6);border:none;border-radius:9px;font-family:'Plus Jakarta Sans',sans-serif;font-weight:700;font-size:13px;color:#fff;cursor:pointer;">Simpan</button>
            </div>
        </div>`;
    document.body.appendChild(overlay);
    overlay.addEventListener('click', e => { if (e.target === overlay) overlay.remove(); });
}

function submitStatus(id) {
    const status    = document.getElementById('statusPilihan').value;
    const csrfName  = '<?= csrf_token() ?>';
    const csrfValue = '<?= csrf_hash() ?>';

    fetch(`<?= base_url('table/update-status/') ?>${id}?${csrfName}=${csrfValue}`, {
        method : 'POST',
        headers: {
            'Content-Type'    : 'application/json',
            'X-Requested-With': 'XMLHttpRequest',
        },
        body: JSON.stringify({ status, [csrfName]: csrfValue })
    })
    .then(r => {
        console.log('Status:', r.status);
        console.log('Headers:', [...r.headers.entries()]);
        return r.text();
    })
    .then(text => {
        console.log('Response:', text);
        try {
            const data = JSON.parse(text);
            if (data.success) location.reload();
            else alert(data.message);
        } catch(e) {
            alert('Response: ' + text);
        }
    });
}
</script>