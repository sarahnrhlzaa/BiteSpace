<!-- views/promo/index.php -->
<style>
    /* ── Filter bar ── */
    .filter-bar {
        background: #fff; border-radius: 14px; border: 1px solid var(--border);
        padding: 16px 20px; display: flex; align-items: center;
        gap: 12px; flex-wrap: wrap; margin-bottom: 20px;
    }
    .search-wrap { position: relative; flex: 1; min-width: 200px; }
    .search-icon { position: absolute; left: 12px; top: 50%; transform: translateY(-50%); color: var(--text-muted); font-size: 15px; }
    .search-input {
        width: 100%; height: 40px; padding-left: 38px; padding-right: 12px;
        border: 1.5px solid var(--border); border-radius: 9px;
        font-size: 13.5px; font-family: 'DM Sans', sans-serif;
        color: var(--dark); background: var(--bg); transition: all 0.2s;
    }
    .search-input:focus { border-color: #2EC4B6; box-shadow: 0 0 0 3px rgba(46,196,182,0.12); outline: none; background: #fff; }
    .filter-select {
        height: 40px; padding: 0 12px; border: 1.5px solid var(--border); border-radius: 9px;
        font-size: 13px; font-family: 'DM Sans', sans-serif; color: var(--dark);
        background: var(--bg); min-width: 140px; transition: all 0.2s;
    }
    .filter-select:focus { border-color: #2EC4B6; outline: none; }
    .filter-count { font-size: 13px; color: var(--text-muted); white-space: nowrap; }
    .filter-count strong { color: var(--dark); }

    .btn-primary-bs {
        display: inline-flex; align-items: center; gap: 8px;
        padding: 10px 20px;
        background: linear-gradient(135deg, #FFD166, #f0b429);
        color: #7a5800; border: none; border-radius: 10px;
        font-family: 'Plus Jakarta Sans', sans-serif;
        font-weight: 700; font-size: 13.5px;
        text-decoration: none; cursor: pointer; transition: all 0.2s;
        box-shadow: 0 4px 12px rgba(255,209,102,0.35);
        white-space: nowrap; margin-left: auto;
    }
    .btn-primary-bs:hover { filter: brightness(1.06); transform: translateY(-1px); color: #7a5800; }

    /* ── Promo Cards Grid ── */
    .promo-grid { display: grid; grid-template-columns: repeat(auto-fill, minmax(320px, 1fr)); gap: 16px; }

    .promo-card {
        background: #fff; border-radius: 16px; border: 1px solid var(--border);
        overflow: hidden; transition: all 0.2s; position: relative;
    }
    .promo-card:hover { transform: translateY(-3px); box-shadow: 0 8px 24px rgba(13,27,62,0.10); }

    /* top accent bar per tipe */
    .promo-card::before {
        content: ''; position: absolute; top: 0; left: 0;
        width: 100%; height: 3px;
    }
    .promo-card.tipe-percent::before { background: linear-gradient(90deg, #2EC4B6, #4BA3C3); }
    .promo-card.tipe-nominal::before { background: linear-gradient(90deg, #FFD166, #f0b429); }

    .promo-card-body { padding: 20px; }

    .promo-header { display: flex; align-items: flex-start; justify-content: space-between; margin-bottom: 12px; gap: 10px; }

    .promo-kode {
        font-family: 'Plus Jakarta Sans', sans-serif; font-weight: 800;
        font-size: 15px; letter-spacing: 0.5px;
        color: #0D1B3E; background: var(--bg);
        border: 1.5px dashed var(--border);
        padding: 5px 12px; border-radius: 8px;
        display: inline-flex; align-items: center; gap: 6px;
    }
    .promo-kode i { color: var(--text-muted); font-size: 12px; }

    .promo-status { font-size: 11px; font-weight: 700; padding: 4px 10px; border-radius: 20px; white-space: nowrap; }
    .status-aktif    { background: #d1fae5; color: #065f46; }
    .status-expired  { background: #fee2e2; color: #991b1b; }
    .status-upcoming { background: rgba(75,163,195,0.15); color: #1e5f7a; }
    .status-nonaktif { background: #f3f4f6; color: #6b7280; }

    .promo-nama { font-family: 'Plus Jakarta Sans', sans-serif; font-weight: 700; font-size: 15px; color: var(--dark); margin-bottom: 5px; }
    .promo-desc { font-size: 12.5px; color: var(--text-muted); line-height: 1.6; margin-bottom: 14px; }

    .promo-detail-row { display: flex; gap: 10px; flex-wrap: wrap; margin-bottom: 14px; }
    .promo-detail-chip {
        display: inline-flex; align-items: center; gap: 5px;
        font-size: 12px; font-weight: 600;
        padding: 5px 10px; border-radius: 8px;
    }
    .chip-diskon { background: rgba(46,196,182,0.12); color: #0d6b63; }
    .chip-min    { background: rgba(75,163,195,0.12); color: #1e5f7a; }
    .chip-maks   { background: rgba(155,137,196,0.12); color: #5a4690; }

    .promo-date-row { display: flex; align-items: center; gap: 6px; font-size: 12px; color: var(--text-muted); margin-bottom: 16px; }
    .promo-date-row i { font-size: 13px; }

    .promo-footer { display: flex; align-items: center; justify-content: space-between; padding-top: 14px; border-top: 1px solid var(--border); }

    /* Toggle */
    .toggle-switch { position: relative; display: inline-block; width: 44px; height: 24px; }
    .toggle-switch input { opacity: 0; width: 0; height: 0; }
    .toggle-slider { position: absolute; cursor: pointer; inset: 0; background: #CBD5E0; border-radius: 24px; transition: 0.3s; }
    .toggle-slider::before { content: ''; position: absolute; width: 18px; height: 18px; border-radius: 50%; background: #fff; left: 3px; top: 3px; transition: 0.3s; box-shadow: 0 1px 4px rgba(0,0,0,0.15); }
    .toggle-switch input:checked + .toggle-slider { background: #2EC4B6; }
    .toggle-switch input:checked + .toggle-slider::before { transform: translateX(20px); }

    /* Action buttons */
    .btn-action { width: 34px; height: 34px; border-radius: 8px; display: inline-flex; align-items: center; justify-content: center; border: none; cursor: pointer; transition: all 0.2s; font-size: 15px; text-decoration: none; }
    .btn-edit   { background: rgba(75,163,195,0.12); color: #1e5f7a; }
    .btn-edit:hover   { background: #4BA3C3; color: #fff; }
    .btn-delete { background: rgba(239,68,68,0.10); color: #dc2626; }
    .btn-delete:hover { background: #ef4444; color: #fff; }

    /* Empty state */
    .empty-state { text-align: center; padding: 60px 20px; color: var(--text-muted); background: #fff; border-radius: 16px; border: 1px solid var(--border); }
    .empty-state .empty-icon { font-size: 48px; margin-bottom: 12px; }
    .empty-state p { font-size: 14px; margin-bottom: 16px; }

    /* Delete modal */
    .modal-overlay { display: none; position: fixed; inset: 0; background: rgba(13,27,62,0.5); z-index: 999; align-items: center; justify-content: center; backdrop-filter: blur(4px); }
    .modal-overlay.show { display: flex; }
    .modal-box { background: #fff; border-radius: 20px; padding: 32px; max-width: 400px; width: 90%; text-align: center; animation: popIn 0.2s ease both; }
    @keyframes popIn { from { opacity:0; transform:scale(0.9); } to { opacity:1; transform:scale(1); } }
    .modal-icon { font-size: 48px; margin-bottom: 12px; }
    .modal-title { font-family: 'Plus Jakarta Sans', sans-serif; font-weight: 800; font-size: 18px; color: var(--dark); margin-bottom: 8px; }
    .modal-desc { font-size: 13.5px; color: var(--text-muted); margin-bottom: 24px; }
    .modal-actions { display: flex; gap: 10px; justify-content: center; }
    .btn-cancel-modal { padding: 10px 24px; border-radius: 10px; border: 1.5px solid var(--border); background: #fff; color: var(--dark); font-family: 'Plus Jakarta Sans', sans-serif; font-weight: 600; font-size: 13.5px; cursor: pointer; }
    .btn-cancel-modal:hover { background: var(--bg); }
    .btn-confirm-delete { padding: 10px 24px; border-radius: 10px; border: none; background: #ef4444; color: #fff; font-family: 'Plus Jakarta Sans', sans-serif; font-weight: 700; font-size: 13.5px; cursor: pointer; }
    .btn-confirm-delete:hover { background: #dc2626; }

    /* Kasir info badge */
    .kasir-info {
        display: inline-flex; align-items: center; gap: 6px;
        background: rgba(255,209,102,0.12); border: 1px solid rgba(255,209,102,0.3);
        color: #8a6200; font-size: 12px; font-weight: 600;
        padding: 6px 14px; border-radius: 8px; margin-left: auto;
    }
</style>

<!-- Filter Bar -->
<div class="filter-bar">
    <div class="search-wrap">
        <i class="bi bi-search search-icon"></i>
        <input type="text" id="searchInput" class="search-input" placeholder="Cari nama / kode promo..." oninput="applyFilter()">
    </div>
    <select id="filterTipe" class="filter-select" onchange="applyFilter()">
        <option value="">Semua Tipe</option>
        <option value="percent">Persen (%)</option>
        <option value="nominal">Nominal (Rp)</option>
    </select>
    <select id="filterStatus" class="filter-select" onchange="applyFilter()">
        <option value="">Semua Status</option>
        <option value="aktif">Aktif</option>
        <option value="upcoming">Upcoming</option>
        <option value="expired">Expired</option>
        <option value="nonaktif">Nonaktif</option>
    </select>
    <div class="filter-count">
        Menampilkan <strong id="countShown">-</strong> dari <strong id="countTotal"><?= count($promos) ?></strong> promo
    </div>

    <?php if ($isAdmin): ?>
    <a href="<?= base_url('promo/create') ?>" class="btn-primary-bs">
        <i class="bi bi-plus-lg"></i> Tambah Promo
    </a>
    <?php else: ?>
    <div class="kasir-info"><i class="bi bi-eye"></i> Mode lihat saja</div>
    <?php endif; ?>
</div>

<!-- Promo Grid -->
<?php if (empty($promos)): ?>
<div class="empty-state">
    <div class="empty-icon">🎟️</div>
    <p>Belum ada promo. <?= $isAdmin ? 'Yuk buat promo pertama!' : '' ?></p>
    <?php if ($isAdmin): ?>
    <a href="<?= base_url('promo/create') ?>" class="btn-primary-bs">
        <i class="bi bi-plus-lg"></i> Tambah Promo
    </a>
    <?php endif; ?>
</div>
<?php else: ?>
<div class="promo-grid" id="promoGrid">
    <?php foreach ($promos as $p): ?>
    <?php
        $isExpired  = $p['tanggal_selesai'] < date('Y-m-d');
        $isUpcoming = $p['tanggal_mulai'] > date('Y-m-d');
        $statusCls  = [
            'aktif'    => 'status-aktif',
            'expired'  => 'status-expired',
            'upcoming' => 'status-upcoming',
            'nonaktif' => 'status-nonaktif',
        ][$p['status_display']] ?? 'status-nonaktif';
        $statusLabel = [
            'aktif'    => '● Aktif',
            'expired'  => '✕ Expired',
            'upcoming' => '◷ Upcoming',
            'nonaktif' => '○ Nonaktif',
        ][$p['status_display']] ?? $p['status_display'];
    ?>
    <div class="promo-card tipe-<?= $p['tipe_diskon'] ?>"
         data-nama="<?= strtolower(htmlspecialchars($p['nama_promo'], ENT_QUOTES, 'UTF-8')) ?>"
         data-kode="<?= strtolower(htmlspecialchars($p['kode_promo'], ENT_QUOTES, 'UTF-8')) ?>"
         data-tipe="<?= $p['tipe_diskon'] ?>"
         data-status="<?= $p['status_display'] ?>">

        <div class="promo-card-body">
            <div class="promo-header">
                <div class="promo-kode"><i class="bi bi-ticket-perforated"></i><?= esc($p['kode_promo']) ?></div>
                <span class="promo-status <?= $statusCls ?>"><?= $statusLabel ?></span>
            </div>

            <div class="promo-nama"><?= esc($p['nama_promo']) ?></div>
            <?php if ($p['deskripsi']): ?>
            <div class="promo-desc"><?= esc($p['deskripsi']) ?></div>
            <?php endif; ?>

            <div class="promo-detail-row">
                <span class="promo-detail-chip chip-diskon">
                    <i class="bi bi-tag-fill"></i>
                    <?php if ($p['tipe_diskon'] === 'percent'): ?>
                        Diskon <?= $p['nilai_diskon'] + 0 ?>%
                    <?php else: ?>
                        Potongan Rp <?= number_format($p['nilai_diskon'], 0, ',', '.') ?>
                    <?php endif; ?>
                </span>
                <?php if ($p['min_transaksi'] > 0): ?>
                <span class="promo-detail-chip chip-min">
                    <i class="bi bi-cart-check"></i>
                    Min Rp <?= number_format($p['min_transaksi'], 0, ',', '.') ?>
                </span>
                <?php endif; ?>
                <?php if ($p['maks_diskon']): ?>
                <span class="promo-detail-chip chip-maks">
                    <i class="bi bi-shield-check"></i>
                    Maks Rp <?= number_format($p['maks_diskon'], 0, ',', '.') ?>
                </span>
                <?php endif; ?>
            </div>

            <div class="promo-date-row">
                <i class="bi bi-calendar-range" style="color:var(--sky);"></i>
                <?= date('d M Y', strtotime($p['tanggal_mulai'])) ?>
                <i class="bi bi-arrow-right" style="font-size:11px;"></i>
                <?= date('d M Y', strtotime($p['tanggal_selesai'])) ?>
            </div>

            <div class="promo-footer">
                <?php if ($isAdmin): ?>
                <label class="toggle-switch" title="Toggle aktif/nonaktif">
                    <input type="checkbox" <?= $p['is_active'] ? 'checked' : '' ?>
                           onchange="togglePromo(<?= $p['id_promo'] ?>, this)">
                    <span class="toggle-slider"></span>
                </label>
                <div style="display:flex; gap:6px;">
                    <a href="<?= base_url('promo/edit/' . $p['id_promo']) ?>" class="btn-action btn-edit" title="Edit">
                        <i class="bi bi-pencil"></i>
                    </a>
                    <button class="btn-action btn-delete" title="Hapus"
                            onclick="confirmDelete(<?= $p['id_promo'] ?>, '<?= esc($p['nama_promo']) ?>')">
                        <i class="bi bi-trash"></i>
                    </button>
                </div>
                <?php else: ?>
                <span style="font-size:12px; color:var(--text-muted);">
                    <i class="bi bi-info-circle me-1"></i>Gunakan kode ini di halaman transaksi
                </span>
                <?php endif; ?>
            </div>
        </div>
    </div>
    <?php endforeach; ?>
</div>
<div style="margin-top:12px; font-size:13px; color:var(--text-muted);" id="emptyFilter" style="display:none;">
</div>
<?php endif; ?>

<?php if ($isAdmin): ?>
<!-- Delete Modal -->
<div class="modal-overlay" id="deleteModal">
    <div class="modal-box">
        <div class="modal-icon">🗑️</div>
        <div class="modal-title">Hapus Promo?</div>
        <div class="modal-desc" id="deleteModalDesc">Promo ini akan dihapus permanen.</div>
        <div class="modal-actions">
            <button class="btn-cancel-modal" onclick="closeDeleteModal()">Batal</button>
            <form id="deleteForm" method="POST" style="display:inline;">
                <?= csrf_field() ?>
                <button type="submit" class="btn-confirm-delete"><i class="bi bi-trash me-1"></i> Hapus</button>
            </form>
        </div>
    </div>
</div>
<?php endif; ?>

<script>
const allCards = Array.from(document.querySelectorAll('.promo-card'));

function applyFilter() {
    const search = document.getElementById('searchInput').value.toLowerCase();
    const tipe   = document.getElementById('filterTipe').value;
    const status = document.getElementById('filterStatus').value;

    let shown = 0;
    allCards.forEach(card => {
        const matchSearch = (card.dataset.nama + card.dataset.kode).includes(search);
        const matchTipe   = !tipe   || card.dataset.tipe   === tipe;
        const matchStatus = !status || card.dataset.status === status;
        const visible = matchSearch && matchTipe && matchStatus;
        card.style.display = visible ? '' : 'none';
        if (visible) shown++;
    });

    document.getElementById('countShown').textContent = shown;

    const emptyEl = document.getElementById('emptyFilter');
    if (emptyEl) {
        emptyEl.style.display = shown === 0 ? 'block' : 'none';
        emptyEl.textContent = shown === 0 ? 'Tidak ada promo yang sesuai filter.' : '';
    }
}

window.applyFilter = applyFilter;
document.getElementById('countShown').textContent = allCards.length;

<?php if ($isAdmin): ?>
function togglePromo(id, checkbox) {
    const val = checkbox.checked ? 1 : 0;
    fetch(`<?= base_url('promo/toggle/') ?>${id}`, {
        method: 'POST',
        headers: { 'Content-Type': 'application/json', 'X-Requested-With': 'XMLHttpRequest' },
        body: JSON.stringify({ is_active: val, <?= csrf_token() ?>: '<?= csrf_hash() ?>' })
    })
    .then(r => r.json())
    .then(d => {
        if (!d.success) {
            checkbox.checked = !checkbox.checked;
            alert(d.message || 'Gagal mengubah status promo.');
        }
    })
    .catch(() => { checkbox.checked = !checkbox.checked; });
}

function confirmDelete(id, nama) {
    document.getElementById('deleteModalDesc').textContent = `Promo "${nama}" akan dihapus permanen dan tidak bisa dikembalikan.`;
    document.getElementById('deleteForm').action = `<?= base_url('promo/delete/') ?>${id}`;
    document.getElementById('deleteModal').classList.add('show');
}
function closeDeleteModal() { document.getElementById('deleteModal').classList.remove('show'); }
document.getElementById('deleteModal').addEventListener('click', function(e) { if (e.target === this) closeDeleteModal(); });
<?php endif; ?>
</script>