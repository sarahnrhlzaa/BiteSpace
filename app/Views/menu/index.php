<!-- views/menu/index.php -->
<style>
    /* ══ PALETTE
       --navy:   #0D1B3E  |  --sky:    #4BA3C3
       --tosca:  #2EC4B6  |  --purple: #9B89C4
       --yellow: #FFD166  |  --deep:   #39007E
    ══════════════════════════════════════════ */

    .btn-primary-bs {
        display: inline-flex; align-items: center; gap: 8px;
        padding: 10px 20px;
        background: linear-gradient(135deg, #2EC4B6, #4BA3C3);
        color: #fff; border: none; border-radius: 10px;
        font-family: 'Plus Jakarta Sans', sans-serif;
        font-weight: 700; font-size: 13.5px;
        text-decoration: none; cursor: pointer; transition: all 0.2s;
        box-shadow: 0 4px 12px rgba(46,196,182,0.25);
    }
    .btn-primary-bs:hover {
        filter: brightness(1.06); transform: translateY(-1px);
        box-shadow: 0 8px 20px rgba(46,196,182,0.3); color: #fff;
    }

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
        background: var(--bg); min-width: 150px; transition: all 0.2s;
    }
    .filter-select:focus { border-color: #2EC4B6; outline: none; }

    .filter-count { font-size: 13px; color: var(--text-muted); white-space: nowrap; }
    .filter-count strong { color: var(--dark); }

    /* ── Table card ── */
    .table-card { background: #fff; border-radius: 16px; border: 1px solid var(--border); overflow: hidden; }

    .menu-table { width: 100%; border-collapse: collapse; }
    .menu-table th {
        font-size: 11px; font-weight: 700; color: var(--text-muted);
        text-transform: uppercase; letter-spacing: 0.8px;
        padding: 14px 16px; text-align: left;
        border-bottom: 1px solid var(--border); background: #FAFBFD;
    }
    .menu-table td {
        padding: 14px 16px; font-size: 13.5px; color: var(--dark);
        border-bottom: 1px solid #f5f5f7; vertical-align: middle;
    }
    .menu-table tr:last-child td { border-bottom: none; }
    .menu-table tr:hover td { background: #f8fbff; }

    .menu-img { width: 52px; height: 52px; border-radius: 12px; object-fit: cover; border: 1px solid var(--border); flex-shrink: 0; }
    .menu-img-placeholder {
        width: 52px; height: 52px; border-radius: 12px; background: var(--bg);
        border: 1px solid var(--border); display: flex; align-items: center;
        justify-content: center; font-size: 22px; flex-shrink: 0;
    }
    .menu-info { display: flex; align-items: center; gap: 14px; }
    .menu-name { font-weight: 600; font-size: 14px; color: var(--dark); margin-bottom: 3px; }
    .menu-desc { font-size: 12px; color: var(--text-muted); max-width: 200px; overflow: hidden; text-overflow: ellipsis; white-space: nowrap; }

    .cat-pill { font-size: 11.5px; font-weight: 600; padding: 4px 10px; border-radius: 20px; background: rgba(75,163,195,0.15); color: #1e5f7a; white-space: nowrap; }
    .price-text { font-family: 'Plus Jakarta Sans', sans-serif; font-weight: 700; color: var(--dark); font-size: 14px; }

    /* Toggle → tosca */
    .toggle-switch { position: relative; display: inline-block; width: 44px; height: 24px; }
    .toggle-switch input { opacity: 0; width: 0; height: 0; }
    .toggle-slider { position: absolute; cursor: pointer; inset: 0; background: #CBD5E0; border-radius: 24px; transition: 0.3s; }
    .toggle-slider::before { content: ''; position: absolute; width: 18px; height: 18px; border-radius: 50%; background: #fff; left: 3px; top: 3px; transition: 0.3s; box-shadow: 0 1px 4px rgba(0,0,0,0.15); }
    .toggle-switch input:checked + .toggle-slider { background: #2EC4B6; }
    .toggle-switch input:checked + .toggle-slider::before { transform: translateX(20px); }

    /* Action buttons */
    .btn-action { width: 34px; height: 34px; border-radius: 8px; display: inline-flex; align-items: center; justify-content: center; border: none; cursor: pointer; transition: all 0.2s; font-size: 15px; text-decoration: none; }
    .btn-edit  { background: rgba(75,163,195,0.12); color: #1e5f7a; }
    .btn-edit:hover  { background: #4BA3C3; color: #fff; }
    .btn-delete { background: rgba(239,68,68,0.10); color: #dc2626; }
    .btn-delete:hover { background: #ef4444; color: #fff; }

    /* Empty state */
    .empty-state { text-align: center; padding: 60px 20px; color: var(--text-muted); }
    .empty-state .empty-icon { font-size: 48px; margin-bottom: 12px; }
    .empty-state p { font-size: 14px; margin-bottom: 16px; }

    /* ── PAGINATION ── */
    .pagination-wrap {
        display: flex; align-items: center; justify-content: space-between;
        padding: 16px 20px; border-top: 1px solid var(--border);
        flex-wrap: wrap; gap: 10px;
    }
    .pagination-info { font-size: 13px; color: var(--text-muted); }
    .pagination-info strong { color: var(--dark); }
    .pagination-btns { display: flex; align-items: center; gap: 4px; }

    .pg-btn {
        min-width: 34px; height: 34px; padding: 0 10px; border-radius: 8px;
        border: 1.5px solid var(--border); background: #fff; color: var(--dark);
        font-size: 13px; font-weight: 600; cursor: pointer;
        font-family: 'Plus Jakarta Sans', sans-serif;
        display: inline-flex; align-items: center; justify-content: center;
        transition: all 0.18s;
    }
    .pg-btn:hover:not(:disabled):not(.pg-active) { border-color: #2EC4B6; color: #2EC4B6; background: rgba(46,196,182,0.06); }
    /* aktif → navy, sama seperti cal-day.today di dashboard */
    .pg-btn.pg-active { background: #0D1B3E; border-color: #0D1B3E; color: #fff; box-shadow: 0 4px 10px rgba(13,27,62,0.22); cursor: default; }
    .pg-btn:disabled { opacity: 0.35; cursor: not-allowed; }
    .pg-dots { min-width: 34px; height: 34px; display: inline-flex; align-items: center; justify-content: center; font-size: 13px; color: var(--text-muted); font-weight: 600; }

    /* ── Delete modal → navy overlay ── */
    .modal-overlay { display: none; position: fixed; inset: 0; background: rgba(13,27,62,0.5); z-index: 999; align-items: center; justify-content: center; backdrop-filter: blur(4px); }
    .modal-overlay.show { display: flex; }
    .modal-box { background: #fff; border-radius: 20px; padding: 32px; max-width: 400px; width: 90%; text-align: center; animation: popIn 0.2s ease both; }
    @keyframes popIn { from { opacity:0; transform:scale(0.9); } to { opacity:1; transform:scale(1); } }
    .modal-icon { font-size: 48px; margin-bottom: 12px; }
    .modal-title { font-family: 'Plus Jakarta Sans', sans-serif; font-weight: 800; font-size: 18px; color: var(--dark); margin-bottom: 8px; }
    .modal-desc { font-size: 13.5px; color: var(--text-muted); margin-bottom: 24px; }
    .modal-actions { display: flex; gap: 10px; justify-content: center; }
    .btn-cancel-modal { padding: 10px 24px; border-radius: 10px; border: 1.5px solid var(--border); background: #fff; color: var(--dark); font-family: 'Plus Jakarta Sans', sans-serif; font-weight: 600; font-size: 13.5px; cursor: pointer; transition: all 0.2s; }
    .btn-cancel-modal:hover { background: var(--bg); }
    .btn-confirm-delete { padding: 10px 24px; border-radius: 10px; border: none; background: #ef4444; color: #fff; font-family: 'Plus Jakarta Sans', sans-serif; font-weight: 700; font-size: 13.5px; cursor: pointer; transition: all 0.2s; }
    .btn-confirm-delete:hover { background: #dc2626; }
</style>

<!-- Filter Bar (dengan tombol Tambah Menu di kanan) -->
<div class="filter-bar">
    <div class="search-wrap">
        <i class="bi bi-search search-icon"></i>
        <input type="text" id="searchInput" class="search-input" placeholder="Cari nama menu..." oninput="applyFilter()">
    </div>
    <select id="filterKategori" class="filter-select" onchange="applyFilter()">
        <option value="">Semua Kategori</option>
        <?php foreach ($categories as $cat): ?>
            <option value="<?= esc($cat['nama_category']) ?>"><?= esc($cat['nama_category']) ?></option>
        <?php endforeach; ?>
    </select>
    <select id="filterStatus" class="filter-select" onchange="applyFilter()" style="min-width:130px;">
        <option value="">Semua Status</option>
        <option value="1">Tersedia</option>
        <option value="0">Tidak Tersedia</option>
    </select>
    <div class="filter-count">
        Menampilkan <strong id="countShown">-</strong> dari <strong id="countTotal"><?= count($menus) ?></strong> menu
    </div>
    <a href="<?= base_url('menu/create') ?>" class="btn-primary-bs" style="white-space:nowrap; margin-left:auto;">
        <i class="bi bi-plus-lg"></i> Tambah Menu
    </a>
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
                <?php $dataNama = strtolower(htmlspecialchars($menu['nama_menu'], ENT_QUOTES, 'UTF-8')); ?>
                <tr data-nama="<?= $dataNama ?>"
                    data-kategori="<?= esc($menu['nama_category'] ?? '') ?>"
                    data-status="<?= $menu['is_available'] ?>">
                    <td class="col-no" style="color:var(--text-muted); font-size:13px;"><?= $i + 1 ?></td>
                    <td>
                        <div class="menu-info">
                            <?php if ($menu['gambar']): ?>
                                <img src="<?= base_url('uploads/menu/' . $menu['gambar']) ?>" class="menu-img" alt="<?= esc($menu['nama_menu']) ?>">
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
                    <td><span class="cat-pill"><?= esc($menu['nama_category'] ?? '-') ?></span></td>
                    <td><span class="price-text">Rp <?= number_format($menu['harga'], 0, ',', '.') ?></span></td>
                    <td>
                        <label class="toggle-switch" title="<?= $menu['is_available'] ? 'Klik untuk nonaktifkan' : 'Klik untuk aktifkan' ?>">
                            <input type="checkbox" <?= $menu['is_available'] ? 'checked' : '' ?>
                                   onchange="toggleAvailable(<?= $menu['id_menu'] ?>, this)">
                            <span class="toggle-slider"></span>
                        </label>
                    </td>
                    <td>
                        <div style="display:flex; gap:6px; justify-content:center;">
                            <a href="<?= base_url('menu/edit/' . $menu['id_menu']) ?>" class="btn-action btn-edit" title="Edit">
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

    <!-- Pagination footer -->
    <div class="pagination-wrap" id="paginationWrap">
        <div class="pagination-info" id="paginationInfo"></div>
        <div class="pagination-btns" id="paginationBtns"></div>
    </div>
    <?php endif; ?>
</div>

<!-- Delete Modal -->
<div class="modal-overlay" id="deleteModal">
    <div class="modal-box">
        <div class="modal-icon">🗑️</div>
        <div class="modal-title">Hapus Menu?</div>
        <div class="modal-desc" id="deleteModalDesc">Menu ini akan dihapus permanen dan tidak bisa dikembalikan.</div>
        <div class="modal-actions">
            <button class="btn-cancel-modal" onclick="closeDeleteModal()">Batal</button>
            <form id="deleteForm" method="POST" style="display:inline;">
                <?= csrf_field() ?>
                <button type="submit" class="btn-confirm-delete"><i class="bi bi-trash me-1"></i> Hapus</button>
            </form>
        </div>
    </div>
</div>

<script>
(function () {
    const PER_PAGE  = 10;
    let currentPage = 1;
    let filtered    = [];
    const allRows   = Array.from(document.querySelectorAll('#menuTableBody tr'));

    function applyFilter() {
        const search   = document.getElementById('searchInput').value.toLowerCase();
        const kategori = document.getElementById('filterKategori').value;
        const status   = document.getElementById('filterStatus').value;

        filtered = allRows.filter(r =>
            (r.dataset.nama || '').includes(search) &&
            (!kategori || r.dataset.kategori === kategori) &&
            (!status   || r.dataset.status   === status)
        );
        currentPage = 1;
        render();
    }

    function render() {
        const total     = filtered.length;
        const totalPage = Math.max(1, Math.ceil(total / PER_PAGE));
        if (currentPage > totalPage) currentPage = totalPage;

        const start = (currentPage - 1) * PER_PAGE;
        const end   = start + PER_PAGE;

        allRows.forEach(r => r.style.display = 'none');
        filtered.slice(start, end).forEach((row, idx) => {
            row.style.display = '';
            const c = row.querySelector('.col-no');
            if (c) c.textContent = start + idx + 1;
        });

        const from = total === 0 ? 0 : start + 1;
        const to   = Math.min(end, total);
        document.getElementById('countShown').textContent = total === 0 ? 0 : `${from}–${to}`;
        document.getElementById('countTotal').textContent = total;

        document.getElementById('paginationInfo').innerHTML =
            total === 0
                ? 'Tidak ada menu ditemukan'
                : `Halaman <strong>${currentPage}</strong> dari <strong>${totalPage}</strong> &nbsp;·&nbsp; ${total} menu`;

        document.getElementById('paginationWrap').style.display =
            total <= PER_PAGE ? 'none' : 'flex';

        renderBtns(totalPage);
    }

    function renderBtns(totalPage) {
        const wrap = document.getElementById('paginationBtns');
        wrap.innerHTML = '';

        const prev = mkBtn('‹', currentPage === 1);
        prev.onclick = () => { if (currentPage > 1) { currentPage--; render(); } };
        wrap.appendChild(prev);

        pageRange(currentPage, totalPage).forEach(p => {
            if (p === '…') {
                const d = document.createElement('span');
                d.className = 'pg-dots'; d.textContent = '…';
                wrap.appendChild(d);
            } else {
                const b = mkBtn(p, false, p === currentPage);
                b.onclick = () => { currentPage = p; render(); };
                wrap.appendChild(b);
            }
        });

        const next = mkBtn('>', currentPage === totalPage);
        next.onclick = () => { if (currentPage < totalPage) { currentPage++; render(); } };
        wrap.appendChild(next);
    }

    function mkBtn(label, disabled = false, active = false) {
        const b = document.createElement('button');
        b.className = 'pg-btn' + (active ? ' pg-active' : '');
        b.textContent = label; b.disabled = disabled;
        return b;
    }

    function pageRange(cur, total) {
        if (total <= 7) return Array.from({length: total}, (_, i) => i + 1);
        if (cur <= 4)   return [1,2,3,4,5,'…',total];
        if (cur >= total - 3) return [1,'…',total-4,total-3,total-2,total-1,total];
        return [1,'…',cur-1,cur,cur+1,'…',total];
    }

    window.applyFilter = applyFilter;
    applyFilter();
})();

function toggleAvailable(id, checkbox) {
    const val = checkbox.checked ? 1 : 0;
    fetch(`<?= base_url('menu/toggle/') ?>${id}`, {
        method: 'POST',
        headers: { 'Content-Type': 'application/json', 'X-Requested-With': 'XMLHttpRequest' },
        body: JSON.stringify({ is_available: val, <?= csrf_token() ?>: '<?= csrf_hash() ?>' })
    })
    .then(r => r.json())
    .then(d => { if (!d.success) { checkbox.checked = !checkbox.checked; alert('Gagal mengubah status menu.'); } })
    .catch(() => { checkbox.checked = !checkbox.checked; });
}

function confirmDelete(id, nama) {
    document.getElementById('deleteModalDesc').textContent = `Menu "${nama}" akan dihapus permanen dan tidak bisa dikembalikan.`;
    document.getElementById('deleteForm').action = `<?= base_url('menu/delete/') ?>${id}`;
    document.getElementById('deleteModal').classList.add('show');
}
function closeDeleteModal() { document.getElementById('deleteModal').classList.remove('show'); }
    document.getElementById('deleteModal').addEventListener('click', function(e) { if (e.target === this) closeDeleteModal(); });
</script>