<!-- views/menu/index.php -->
<style>
    .page-header {
        display: flex; align-items: center; justify-content: space-between;
        margin-bottom: 24px; flex-wrap: wrap; gap: 12px;
    }
    .page-title {
        font-family: 'Plus Jakarta Sans', sans-serif;
        font-weight: 800; font-size: 22px; color: var(--dark);
    }
    .page-title span { color: var(--tosca); }

    .btn-primary-bs {
        display: inline-flex; align-items: center; gap: 8px;
        padding: 10px 20px;
        background: linear-gradient(135deg, #2EC4B6, #4BA3C3);
        color: #fff; border: none; border-radius: 10px;
        font-family: 'Plus Jakarta Sans', sans-serif;
        font-weight: 700; font-size: 13.5px;
        text-decoration: none; cursor: pointer;
        transition: all 0.2s;
        box-shadow: 0 4px 12px rgba(46,196,182,0.25);
    }
    .btn-primary-bs:hover {
        filter: brightness(1.06); transform: translateY(-1px);
        box-shadow: 0 8px 20px rgba(46,196,182,0.3); color: #fff;
    }

    /* Filter bar */
    .filter-bar {
        background: #fff; border-radius: 14px;
        border: 1px solid var(--border);
        padding: 16px 20px;
        display: flex; align-items: center; gap: 12px;
        flex-wrap: wrap; margin-bottom: 20px;
    }
    .search-wrap { position: relative; flex: 1; min-width: 200px; }
    .search-icon { position: absolute; left: 12px; top: 50%; transform: translateY(-50%); color: var(--text-muted); font-size: 15px; }
    .search-input {
        width: 100%; height: 40px;
        padding-left: 38px; padding-right: 12px;
        border: 1.5px solid var(--border); border-radius: 9px;
        font-size: 13.5px; font-family: 'DM Sans', sans-serif;
        color: var(--dark); background: var(--bg);
        transition: all 0.2s;
    }
    .search-input:focus { border-color: var(--tosca); box-shadow: 0 0 0 3px rgba(46,196,182,0.1); outline: none; background: #fff; }

    .filter-select {
        height: 40px; padding: 0 12px;
        border: 1.5px solid var(--border); border-radius: 9px;
        font-size: 13px; font-family: 'DM Sans', sans-serif;
        color: var(--dark); background: var(--bg);
        min-width: 150px; transition: all 0.2s;
    }
    .filter-select:focus { border-color: var(--tosca); outline: none; }

    .filter-count {
        font-size: 13px; color: var(--text-muted);
        white-space: nowrap;
    }
    .filter-count strong { color: var(--dark); }

    /* Table card */
    .table-card {
        background: #fff; border-radius: 16px;
        border: 1px solid var(--border); overflow: hidden;
    }

    .menu-table { width: 100%; border-collapse: collapse; }
    .menu-table th {
        font-size: 11px; font-weight: 700; color: var(--text-muted);
        text-transform: uppercase; letter-spacing: 0.8px;
        padding: 14px 16px; text-align: left;
        border-bottom: 1px solid var(--border);
        background: #FAFBFD;
    }
    .menu-table td {
        padding: 14px 16px; font-size: 13.5px;
        color: var(--dark); border-bottom: 1px solid #f5f5f7;
        vertical-align: middle;
    }
    .menu-table tr:last-child td { border-bottom: none; }
    .menu-table tr:hover td { background: #f8fbff; }

    /* Menu image */
    .menu-img {
        width: 52px; height: 52px; border-radius: 12px;
        object-fit: cover; border: 1px solid var(--border);
        flex-shrink: 0;
    }
    .menu-img-placeholder {
        width: 52px; height: 52px; border-radius: 12px;
        background: var(--bg); border: 1px solid var(--border);
        display: flex; align-items: center; justify-content: center;
        font-size: 22px; flex-shrink: 0;
    }
    .menu-info { display: flex; align-items: center; gap: 14px; }
    .menu-name { font-weight: 600; font-size: 14px; color: var(--dark); margin-bottom: 3px; }
    .menu-desc { font-size: 12px; color: var(--text-muted); max-width: 200px; overflow: hidden; text-overflow: ellipsis; white-space: nowrap; }

    /* Category pill */
    .cat-pill {
        font-size: 11.5px; font-weight: 600;
        padding: 4px 10px; border-radius: 20px;
        background: rgba(75,163,195,0.12); color: #1e5f7a;
        white-space: nowrap;
    }

    /* Price */
    .price-text {
        font-family: 'Plus Jakarta Sans', sans-serif;
        font-weight: 700; color: var(--dark); font-size: 14px;
    }

    /* Toggle switch */
    .toggle-switch { position: relative; display: inline-block; width: 44px; height: 24px; }
    .toggle-switch input { opacity: 0; width: 0; height: 0; }
    .toggle-slider {
        position: absolute; cursor: pointer; inset: 0;
        background: #CBD5E0; border-radius: 24px;
        transition: 0.3s;
    }
    .toggle-slider::before {
        content: ''; position: absolute;
        width: 18px; height: 18px; border-radius: 50%;
        background: #fff; left: 3px; top: 3px;
        transition: 0.3s;
        box-shadow: 0 1px 4px rgba(0,0,0,0.15);
    }
    .toggle-switch input:checked + .toggle-slider { background: var(--tosca); }
    .toggle-switch input:checked + .toggle-slider::before { transform: translateX(20px); }

    /* Action buttons */
    .btn-action {
        width: 34px; height: 34px; border-radius: 8px;
        display: inline-flex; align-items: center; justify-content: center;
        border: none; cursor: pointer; transition: all 0.2s;
        font-size: 15px; text-decoration: none;
    }
    .btn-edit  { background: rgba(75,163,195,0.12); color: #1e5f7a; }
    .btn-edit:hover  { background: #4BA3C3; color: #fff; }
    .btn-delete { background: rgba(239,68,68,0.10); color: #dc2626; }
    .btn-delete:hover { background: #ef4444; color: #fff; }

    /* Empty state */
    .empty-state {
        text-align: center; padding: 60px 20px; color: var(--text-muted);
    }
    .empty-state .empty-icon { font-size: 48px; margin-bottom: 12px; }
    .empty-state p { font-size: 14px; margin-bottom: 16px; }

    /* Delete modal */
    .modal-overlay {
        display: none; position: fixed; inset: 0;
        background: rgba(13,27,62,0.5); z-index: 999;
        align-items: center; justify-content: center;
        backdrop-filter: blur(4px);
    }
    .modal-overlay.show { display: flex; }
    .modal-box {
        background: #fff; border-radius: 20px;
        padding: 32px; max-width: 400px; width: 90%;
        text-align: center; animation: popIn 0.2s ease both;
    }
    @keyframes popIn { from { opacity:0; transform:scale(0.9); } to { opacity:1; transform:scale(1); } }
    .modal-icon { font-size: 48px; margin-bottom: 12px; }
    .modal-title { font-family: 'Plus Jakarta Sans', sans-serif; font-weight: 800; font-size: 18px; color: var(--dark); margin-bottom: 8px; }
    .modal-desc { font-size: 13.5px; color: var(--text-muted); margin-bottom: 24px; }
    .modal-actions { display: flex; gap: 10px; justify-content: center; }
    .btn-cancel-modal {
        padding: 10px 24px; border-radius: 10px;
        border: 1.5px solid var(--border); background: #fff;
        color: var(--dark); font-family: 'Plus Jakarta Sans', sans-serif;
        font-weight: 600; font-size: 13.5px; cursor: pointer; transition: all 0.2s;
    }
    .btn-cancel-modal:hover { background: var(--bg); }
    .btn-confirm-delete {
        padding: 10px 24px; border-radius: 10px;
        border: none; background: #ef4444;
        color: #fff; font-family: 'Plus Jakarta Sans', sans-serif;
        font-weight: 700; font-size: 13.5px; cursor: pointer; transition: all 0.2s;
    }
    .btn-confirm-delete:hover { background: #dc2626; }
</style>

<!-- Page Header -->
<div class="page-header">
    <div>
        <div class="page-title">Daftar <span>Menu</span></div>
        <div style="font-size:13px; color:var(--text-muted); margin-top:3px;">
            Kelola semua item menu restoran
        </div>
    </div>
    <a href="<?= base_url('menu/create') ?>" class="btn-primary-bs">
        <i class="bi bi-plus-lg"></i> Tambah Menu
    </a>
</div>

<!-- Filter Bar -->
<div class="filter-bar">
    <div class="search-wrap">
        <i class="bi bi-search search-icon"></i>
        <input type="text" id="searchInput" class="search-input"
               placeholder="Cari nama menu..." oninput="filterTable()">
    </div>
    <select id="filterKategori" class="filter-select" onchange="filterTable()">
        <option value="">Semua Kategori</option>
        <?php foreach ($categories as $cat): ?>
            <option value="<?= esc($cat['nama_category']) ?>">
                <?= esc($cat['nama_category']) ?>
            </option>
        <?php endforeach; ?>
    </select>
    <select id="filterStatus" class="filter-select" onchange="filterTable()" style="min-width:130px;">
        <option value="">Semua Status</option>
        <option value="1">Tersedia</option>
        <option value="0">Tidak Tersedia</option>
    </select>
    <div class="filter-count">
        Menampilkan <strong id="countShown"><?= count($menus) ?></strong> dari <strong><?= count($menus) ?></strong> menu
    </div>
</div>

<!-- Table Card -->
<div class="table-card">
    <?php if (empty($menus)): ?>
        <div class="empty-state">
            <div class="empty-icon">🍽️</div>
            <p>Belum ada menu. Yuk tambah menu pertama!</p>
            <a href="<?= base_url('menu/create') ?>" class="btn-primary-bs">
                <i class="bi bi-plus-lg"></i> Tambah Menu
            </a>
        </div>
    <?php else: ?>
    <div style="overflow-x:auto;">
        <table class="menu-table" id="menuTable">
            <thead>
                <tr>
                    <th style="width:40px;">#</th>
                    <th>Menu</th>
                    <th>Kategori</th>
                    <th>Harga</th>
                    <th>Status</th>
                    <th style="width:100px; text-align:center;">Aksi</th>
                </tr>
            </thead>
            <tbody id="menuTableBody">
                <?php foreach ($menus as $i => $menu): ?>
                <tr data-nama="<?= strtolower(esc($menu['nama_menu'])) ?>"
                    data-kategori="<?= esc($menu['nama_category'] ?? '') ?>"
                    data-status="<?= $menu['is_available'] ?>">
                    <td style="color:var(--text-muted); font-size:13px;"><?= $i + 1 ?></td>
                    <td>
                        <div class="menu-info">
                            <?php if ($menu['gambar']): ?>
                                <img src="<?= base_url('uploads/menu/' . $menu['gambar']) ?>"
                                     class="menu-img" alt="<?= esc($menu['nama_menu']) ?>">
                            <?php else: ?>
                                <div class="menu-img-placeholder">🍴</div>
                            <?php endif; ?>
                            <div>
                                <div class="menu-name"><?= esc($menu['nama_menu']) ?></div>
                                <?php if ($menu['deskripsi']): ?>
                                    <div class="menu-desc"><?= esc($menu['deskripsi']) ?></div>
                                <?php endif; ?>
                            </div>
                        </div>
                    </td>
                    <td>
                        <span class="cat-pill"><?= esc($menu['nama_category'] ?? '-') ?></span>
                    </td>
                    <td>
                        <span class="price-text">
                            Rp <?= number_format($menu['harga'], 0, ',', '.') ?>
                        </span>
                    </td>
                    <td>
                        <label class="toggle-switch" title="<?= $menu['is_available'] ? 'Klik untuk nonaktifkan' : 'Klik untuk aktifkan' ?>">
                            <input type="checkbox"
                                   <?= $menu['is_available'] ? 'checked' : '' ?>
                                   onchange="toggleAvailable(<?= $menu['id_menu'] ?>, this)">
                            <span class="toggle-slider"></span>
                        </label>
                    </td>
                    <td>
                        <div style="display:flex; gap:6px; justify-content:center;">
                            <a href="<?= base_url('menu/edit/' . $menu['id_menu']) ?>"
                               class="btn-action btn-edit" title="Edit">
                                <i class="bi bi-pencil"></i>
                            </a>
                            <button class="btn-action btn-delete" title="Hapus"
                                    onclick="confirmDelete(<?= $menu['id_menu'] ?>, '<?= esc($menu['nama_menu']) ?>')">
                                <i class="bi bi-trash"></i>
                            </button>
                        </div>
                    </td>
                </tr>
                <?php endforeach; ?>
            </tbody>
        </table>
    </div>
    <?php endif; ?>
</div>

<!-- Delete Modal -->
<div class="modal-overlay" id="deleteModal">
    <div class="modal-box">
        <div class="modal-icon">🗑️</div>
        <div class="modal-title">Hapus Menu?</div>
        <div class="modal-desc" id="deleteModalDesc">
            Menu ini akan dihapus permanen dan tidak bisa dikembalikan.
        </div>
        <div class="modal-actions">
            <button class="btn-cancel-modal" onclick="closeDeleteModal()">Batal</button>
            <form id="deleteForm" method="POST" style="display:inline;">
                <?= csrf_field() ?>
                <input type="hidden" name="_method" value="DELETE">
                <button type="submit" class="btn-confirm-delete">
                    <i class="bi bi-trash me-1"></i> Hapus
                </button>
            </form>
        </div>
    </div>
</div>

<script>
// ── Filter table ──
function filterTable() {
    const search   = document.getElementById('searchInput').value.toLowerCase();
    const kategori = document.getElementById('filterKategori').value;
    const status   = document.getElementById('filterStatus').value;
    const rows     = document.querySelectorAll('#menuTableBody tr');
    let shown = 0;

    rows.forEach(row => {
        const nama    = row.dataset.nama || '';
        const kat     = row.dataset.kategori || '';
        const stat    = row.dataset.status || '';

        const matchSearch  = nama.includes(search);
        const matchKat     = !kategori || kat === kategori;
        const matchStatus  = !status   || stat === status;

        if (matchSearch && matchKat && matchStatus) {
            row.style.display = '';
            shown++;
        } else {
            row.style.display = 'none';
        }
    });
    document.getElementById('countShown').textContent = shown;
}

// ── Toggle available via AJAX ──
function toggleAvailable(id, checkbox) {
    const val = checkbox.checked ? 1 : 0;
    fetch(`<?= base_url('menu/toggle/') ?>${id}`, {
        method: 'POST',
        headers: {
            'Content-Type': 'application/json',
            'X-Requested-With': 'XMLHttpRequest',
        },
        body: JSON.stringify({ is_available: val, <?= csrf_token() ?>: '<?= csrf_hash() ?>' })
    })
    .then(r => r.json())
    .then(data => {
        if (!data.success) {
            // revert jika gagal
            checkbox.checked = !checkbox.checked;
            alert('Gagal mengubah status menu.');
        }
    })
    .catch(() => {
        checkbox.checked = !checkbox.checked;
    });
}

// ── Delete modal ──
function confirmDelete(id, nama) {
    document.getElementById('deleteModalDesc').textContent =
        `Menu "${nama}" akan dihapus permanen dan tidak bisa dikembalikan.`;
    document.getElementById('deleteForm').action = `<?= base_url('menu/delete/') ?>${id}`;
    document.getElementById('deleteModal').classList.add('show');
}

function closeDeleteModal() {
    document.getElementById('deleteModal').classList.remove('show');
}

// Close modal on overlay click
document.getElementById('deleteModal').addEventListener('click', function(e) {
    if (e.target === this) closeDeleteModal();
});
</script>