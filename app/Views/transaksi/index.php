<style>
/* ══════════════════════════════════════
   POS LAYOUT
══════════════════════════════════════ */
.pos-wrap {
    display: grid;
    grid-template-columns: 1fr 360px;
    gap: 20px;
    height: calc(100vh - 115px);
    overflow: hidden;
}

/* ── LEFT: Menu Panel ── */
.pos-left {
    display: flex;
    flex-direction: column;
    overflow: hidden;
    background: #fff;
    border-radius: 18px;
    border: 1px solid var(--border);
    box-shadow: 0 2px 16px rgba(13,27,62,0.06);
}

.pos-header {
    padding: 16px 20px 12px;
    border-bottom: 1px solid var(--border);
    flex-shrink: 0;
}

.pos-search {
    position: relative;
}

.pos-search input {
    width: 100%;
    border: 1.5px solid var(--border);
    border-radius: 12px;
    padding: 9px 16px 9px 40px;
    font-size: 13.5px;
    background: var(--bg);
    transition: border-color 0.2s;
    font-family: 'DM Sans', sans-serif;
}

.pos-search input:focus {
    outline: none;
    border-color: var(--sky);
    background: #fff;
}

.pos-search .search-icon {
    position: absolute;
    left: 13px;
    top: 50%;
    transform: translateY(-50%);
    color: var(--text-muted);
    font-size: 14px;
}

/* Category tabs */
.cat-tabs {
    display: flex;
    gap: 8px;
    padding: 12px 20px 0;
    overflow-x: auto;
    flex-shrink: 0;
    padding-bottom: 12px;
    border-bottom: 1px solid var(--border);
}

.cat-tabs::-webkit-scrollbar { height: 3px; }
.cat-tabs::-webkit-scrollbar-thumb { background: var(--border); border-radius: 99px; }

.cat-tab {
    padding: 6px 14px;
    border-radius: 20px;
    font-size: 12.5px;
    font-weight: 600;
    border: 1.5px solid var(--border);
    background: #fff;
    color: var(--text-muted);
    cursor: pointer;
    white-space: nowrap;
    transition: all 0.18s;
    font-family: 'DM Sans', sans-serif;
}

.cat-tab:hover {
    border-color: var(--sky);
    color: var(--sky);
}

.cat-tab.active {
    background: linear-gradient(135deg, var(--sky), var(--tosca));
    border-color: transparent;
    color: #fff;
    box-shadow: 0 4px 12px rgba(75,163,195,0.35);
}

/* Menu Grid */
.menu-grid-wrap {
    flex: 1;
    overflow-y: auto;
    padding: 16px 20px;
}

.menu-grid-wrap::-webkit-scrollbar { width: 4px; }
.menu-grid-wrap::-webkit-scrollbar-thumb { background: var(--border); border-radius: 99px; }

.menu-grid {
    display: grid;
    grid-template-columns: repeat(auto-fill, minmax(155px, 1fr));
    gap: 14px;
}

/* Menu Card */
.menu-card {
    background: #fff;
    border-radius: 14px;
    border: 1.5px solid var(--border);
    overflow: hidden;
    cursor: pointer;
    transition: all 0.2s;
    position: relative;
}

.menu-card:hover {
    border-color: var(--sky);
    box-shadow: 0 6px 20px rgba(75,163,195,0.18);
    transform: translateY(-2px);
}

.menu-card.unavailable {
    opacity: 0.5;
    pointer-events: none;
}

.menu-card-img {
    width: 100%;
    height: 110px;
    object-fit: cover;
    display: block;
    background: linear-gradient(135deg, #f0f4ff, #e8f4f8);
}

.menu-card-img-placeholder {
    width: 100%;
    height: 110px;
    display: flex;
    align-items: center;
    justify-content: center;
    background: linear-gradient(135deg, #f0f4ff, #e8f4f8);
    font-size: 32px;
}

.menu-card-body {
    padding: 10px 11px;
}

.menu-card-name {
    font-size: 13px;
    font-weight: 600;
    color: var(--dark);
    margin-bottom: 4px;
    white-space: nowrap;
    overflow: hidden;
    text-overflow: ellipsis;
    font-family: 'Plus Jakarta Sans', sans-serif;
}

.menu-card-price {
    font-size: 12.5px;
    font-weight: 700;
    color: var(--tosca);
}

.menu-card-badge {
    position: absolute;
    top: 8px;
    right: 8px;
    background: rgba(255,255,255,0.92);
    backdrop-filter: blur(4px);
    border-radius: 8px;
    padding: 2px 7px;
    font-size: 10.5px;
    font-weight: 700;
    color: var(--navy);
    border: 1px solid rgba(255,255,255,0.5);
}

/* ── RIGHT: Cart Panel ── */
.pos-right {
    display: flex;
    flex-direction: column;
    background: #fff;
    border-radius: 18px;
    border: 1px solid var(--border);
    box-shadow: 0 2px 16px rgba(13,27,62,0.06);
    overflow: hidden;
}

.cart-header {
    padding: 16px 20px;
    border-bottom: 1px solid var(--border);
    flex-shrink: 0;
}

.cart-title {
    font-family: 'Plus Jakarta Sans', sans-serif;
    font-size: 15px;
    font-weight: 700;
    color: var(--navy);
    display: flex;
    align-items: center;
    gap: 8px;
}

.cart-count-badge {
    background: linear-gradient(135deg, var(--sky), var(--tosca));
    color: #fff;
    border-radius: 20px;
    padding: 2px 8px;
    font-size: 11px;
    font-weight: 700;
}

/* Table selector */
.table-selector {
    padding: 10px 20px;
    border-bottom: 1px solid var(--border);
    flex-shrink: 0;
}

.table-selector select {
    width: 100%;
    border: 1.5px solid var(--border);
    border-radius: 10px;
    padding: 7px 12px;
    font-size: 13px;
    font-family: 'DM Sans', sans-serif;
    background: var(--bg);
    color: var(--dark);
}

.table-selector select:focus { outline: none; border-color: var(--sky); }

/* Cart items */
.cart-items {
    flex: 1;
    overflow-y: auto;
    padding: 12px 16px;
}

.cart-items::-webkit-scrollbar { width: 3px; }
.cart-items::-webkit-scrollbar-thumb { background: var(--border); border-radius: 99px; }

.cart-empty {
    display: flex;
    flex-direction: column;
    align-items: center;
    justify-content: center;
    height: 100%;
    color: var(--text-muted);
    text-align: center;
    gap: 8px;
}

.cart-empty i { font-size: 40px; opacity: 0.4; }
.cart-empty p { font-size: 13px; margin: 0; }

.cart-item {
    display: flex;
    align-items: center;
    gap: 10px;
    padding: 9px 0;
    border-bottom: 1px dashed var(--border);
}

.cart-item:last-child { border-bottom: none; }

.cart-item-img {
    width: 44px; height: 44px;
    border-radius: 10px;
    object-fit: cover;
    flex-shrink: 0;
    background: linear-gradient(135deg, #f0f4ff, #e8f4f8);
}

.cart-item-img-placeholder {
    width: 44px; height: 44px;
    border-radius: 10px;
    display: flex;
    align-items: center;
    justify-content: center;
    background: linear-gradient(135deg, #f0f4ff, #e8f4f8);
    font-size: 18px;
    flex-shrink: 0;
}

.cart-item-info { flex: 1; min-width: 0; }
.cart-item-name {
    font-size: 12.5px;
    font-weight: 600;
    color: var(--dark);
    white-space: nowrap;
    overflow: hidden;
    text-overflow: ellipsis;
    font-family: 'Plus Jakarta Sans', sans-serif;
}
.cart-item-price { font-size: 11.5px; color: var(--tosca); font-weight: 600; }

.qty-control {
    display: flex;
    align-items: center;
    gap: 6px;
    flex-shrink: 0;
}

.qty-btn {
    width: 26px; height: 26px;
    border-radius: 8px;
    border: 1.5px solid var(--border);
    background: #fff;
    display: flex;
    align-items: center;
    justify-content: center;
    cursor: pointer;
    font-size: 14px;
    color: var(--navy);
    transition: all 0.15s;
    font-weight: 700;
}

.qty-btn:hover { background: var(--bg); border-color: var(--sky); color: var(--sky); }
.qty-btn.minus:hover { border-color: #ef4444; color: #ef4444; }

.qty-num {
    font-size: 13px;
    font-weight: 700;
    min-width: 18px;
    text-align: center;
    color: var(--dark);
}

/* Cart footer */
.cart-footer {
    padding: 14px 20px;
    border-top: 1px solid var(--border);
    flex-shrink: 0;
    background: #fafbfe;
}

.cart-summary-row {
    display: flex;
    justify-content: space-between;
    align-items: center;
    font-size: 13px;
    margin-bottom: 6px;
    color: #555;
}

.cart-summary-row .label { font-weight: 500; }
.cart-summary-row .value { font-weight: 600; color: var(--dark); }

.cart-summary-row.total-row {
    margin-top: 8px;
    padding-top: 8px;
    border-top: 1.5px dashed var(--border);
    font-size: 15px;
}

.cart-summary-row.total-row .label { font-weight: 700; color: var(--navy); }
.cart-summary-row.total-row .value { font-weight: 800; color: var(--tosca); font-size: 17px; }

.promo-row {
    display: flex;
    gap: 8px;
    margin: 8px 0 4px;
}
.promo-input {
    flex: 1;
    border: 1.5px solid var(--border);
    border-radius: 10px;
    padding: 7px 12px;
    font-size: 12.5px;
    font-family: 'DM Sans', sans-serif;
    text-transform: uppercase;
    transition: border-color 0.2s;
}
.promo-input:focus { outline: none; border-color: var(--sky); }
.promo-input.valid { border-color: #22c55e !important; background: #f0fdf4; }
.promo-input.invalid { border-color: #ef4444 !important; background: #fef2f2; }
.promo-msg {
    font-size: 11.5px;
    margin-top: 3px;
    min-height: 14px;
}
.promo-msg.success { color: #22c55e; }
.promo-msg.error   { color: #ef4444; }

/* ── Auto-suggest banner ── */
.promo-suggest-banner {
    display: none;
    align-items: center;
    gap: 8px;
    background: linear-gradient(135deg, rgba(46,196,182,0.1), rgba(75,163,195,0.08));
    border: 1.5px solid rgba(46,196,182,0.35);
    border-radius: 11px;
    padding: 9px 12px;
    margin-bottom: 8px;
    cursor: pointer;
    transition: all 0.18s;
    animation: slideDown 0.25s ease;
}
.promo-suggest-banner:hover {
    background: linear-gradient(135deg, rgba(46,196,182,0.18), rgba(75,163,195,0.14));
    border-color: var(--tosca);
}
@keyframes slideDown {
    from { opacity: 0; transform: translateY(-6px); }
    to   { opacity: 1; transform: translateY(0); }
}
.promo-suggest-icon { font-size: 20px; flex-shrink: 0; }
.promo-suggest-text { flex: 1; min-width: 0; }
.promo-suggest-title {
    font-size: 12px; font-weight: 700; color: #0d6b63;
    font-family: 'Plus Jakarta Sans', sans-serif;
    white-space: nowrap; overflow: hidden; text-overflow: ellipsis;
}
.promo-suggest-sub { font-size: 11px; color: #4a9e97; margin-top: 1px; }
.promo-suggest-cta {
    font-size: 11px; font-weight: 700; color: #fff;
    background: var(--tosca); padding: 4px 10px;
    border-radius: 7px; white-space: nowrap; flex-shrink: 0;
}

/* ── Applied promo chip ── */
.promo-applied-chip {
    display: none;
    align-items: center;
    gap: 6px;
    background: #f0fdf4;
    border: 1.5px solid #86efac;
    border-radius: 10px;
    padding: 7px 10px;
    margin-bottom: 6px;
}
.promo-applied-chip .chip-label {
    flex: 1; font-size: 12px; font-weight: 700;
    color: #166534; font-family: 'Plus Jakarta Sans', sans-serif;
}
.promo-applied-chip .chip-remove {
    background: none; border: none; color: #dc2626;
    font-size: 16px; cursor: pointer; padding: 0 2px;
    line-height: 1; transition: transform 0.15s;
}
.promo-applied-chip .chip-remove:hover { transform: scale(1.2); }

/* ── Promo chips daftar ── */
.promo-chips-section { margin-bottom: 6px; }
.promo-chips-toggle {
    font-size: 11.5px; color: var(--text-muted); cursor: pointer;
    display: flex; align-items: center; gap: 4px; padding: 3px 0;
    user-select: none; font-family: 'DM Sans', sans-serif;
}
.promo-chips-toggle:hover { color: var(--sky); }
.promo-chips-list {
    display: none; flex-wrap: wrap; gap: 6px;
    margin-top: 7px; max-height: 90px; overflow-y: auto;
}
.promo-chip {
    display: inline-flex; align-items: center; gap: 4px;
    padding: 4px 10px; border-radius: 20px;
    font-size: 11px; font-weight: 700; cursor: pointer;
    transition: all 0.15s; font-family: 'Plus Jakarta Sans', sans-serif;
    border: 1.5px solid transparent; white-space: nowrap;
}
.promo-chip.eligible {
    background: rgba(46,196,182,0.1);
    border-color: rgba(46,196,182,0.4); color: #0d6b63;
}
.promo-chip.eligible:hover { background: var(--tosca); color: #fff; border-color: var(--tosca); }
.promo-chip.ineligible {
    background: #f5f5f5; border-color: #e5e5e5; color: #bbb; cursor: not-allowed;
}

.btn-checkout {
    width: 100%;
    padding: 13px;
    border-radius: 12px;
    border: none;
    background: linear-gradient(135deg, var(--sky) 0%, var(--tosca) 100%);
    color: #fff;
    font-weight: 700;
    font-size: 14px;
    font-family: 'Plus Jakarta Sans', sans-serif;
    cursor: pointer;
    transition: all 0.2s;
    margin-top: 12px;
    box-shadow: 0 4px 16px rgba(75,163,195,0.4);
    display: flex;
    align-items: center;
    justify-content: center;
    gap: 8px;
}

.btn-checkout:hover { transform: translateY(-1px); box-shadow: 0 6px 20px rgba(75,163,195,0.5); }
.btn-checkout:disabled { opacity: 0.5; cursor: not-allowed; transform: none; }

/* ══ MODAL: Menu Detail ══ */
.modal-menu-img {
    width: 100%;
    height: 200px;
    object-fit: cover;
    border-radius: 12px;
    background: linear-gradient(135deg, #f0f4ff, #e8f4f8);
}

.modal-menu-img-placeholder {
    width: 100%;
    height: 160px;
    display: flex;
    align-items: center;
    justify-content: center;
    background: linear-gradient(135deg, #f0f4ff, #e8f4f8);
    border-radius: 12px;
    font-size: 52px;
}

/* ══ MODAL: Checkout / Payment ══ */
.payment-method {
    display: grid;
    grid-template-columns: repeat(3, 1fr);
    gap: 10px;
    margin: 12px 0;
}

.pay-method-btn {
    border: 2px solid var(--border);
    border-radius: 12px;
    padding: 12px 8px;
    text-align: center;
    cursor: pointer;
    transition: all 0.18s;
    background: #fff;
}

.pay-method-btn:hover { border-color: var(--sky); }
.pay-method-btn.active {
    border-color: var(--tosca);
    background: linear-gradient(135deg, rgba(75,163,195,0.08), rgba(46,196,182,0.08));
    box-shadow: 0 0 0 3px rgba(46,196,182,0.15);
}

.pay-method-btn i { font-size: 22px; display: block; margin-bottom: 5px; }
.pay-method-btn.active i { color: var(--tosca); }
.pay-method-label { font-size: 12px; font-weight: 600; color: var(--dark); }
.pay-method-btn.active .pay-method-label { color: var(--tosca); }

/* ══ MODAL: Success ══ */
.success-animation {
    display: flex;
    flex-direction: column;
    align-items: center;
    justify-content: center;
    padding: 20px 0;
    text-align: center;
}

.success-icon {
    width: 80px; height: 80px;
    border-radius: 50%;
    background: linear-gradient(135deg, var(--sky), var(--tosca));
    display: flex;
    align-items: center;
    justify-content: center;
    font-size: 38px;
    color: #fff;
    box-shadow: 0 8px 30px rgba(46,196,182,0.4);
    animation: popIn 0.4s cubic-bezier(0.34, 1.56, 0.64, 1);
    margin-bottom: 14px;
}

@keyframes popIn {
    from { transform: scale(0); opacity: 0; }
    to   { transform: scale(1); opacity: 1; }
}

/* Responsive */
@media (max-width: 768px) {
    .pos-wrap {
        grid-template-columns: 1fr;
        height: auto;
        overflow: visible;
    }
    .pos-left { height: 60vh; }
    .pos-right { min-height: 400px; }
}

@keyframes slideUp {
    from { opacity: 0; transform: translateX(-50%) translateY(12px); }
    to   { opacity: 1; transform: translateX(-50%) translateY(0); }
}
</style>

<div class="pos-wrap">

    <!-- ════════════ LEFT: Menu ════════════ -->
    <div class="pos-left">

        <!-- Search -->
        <div class="pos-header">
            <div class="pos-search">
                <i class="bi bi-search search-icon"></i>
                <input type="text" id="searchMenu" placeholder="Cari menu..." autocomplete="off">
            </div>
        </div>

        <!-- Category Tabs -->
        <div class="cat-tabs">
            <button class="cat-tab active" data-cat="all">🍽️ Semua</button>
            <?php foreach ($categories as $cat): ?>
                <?php
                    $hasMenu = false;
                    foreach ($menus as $m) {
                        if ($m['id_category'] == $cat['id_category']) { $hasMenu = true; break; }
                    }
                    if (! $hasMenu) continue;
                ?>
                <button class="cat-tab" data-cat="<?= $cat['id_category'] ?>">
                    <?= esc($cat['nama_category']) ?>
                </button>
            <?php endforeach; ?>
        </div>

        <!-- Menu Grid -->
        <div class="menu-grid-wrap">
            <div class="menu-grid" id="menuGrid">
                <?php foreach ($menus as $menu): ?>
                <div class="menu-card <?= $menu['is_available'] ? '' : 'unavailable' ?>"
                     data-id="<?= $menu['id_menu'] ?>"
                     data-cat="<?= $menu['id_category'] ?>"
                     data-name="<?= esc(strtolower($menu['nama_menu'])) ?>"
                     onclick="openMenuModal(<?= htmlspecialchars(json_encode($menu), ENT_QUOTES) ?>)">

                    <?php if ($menu['gambar']): ?>
                        <img src="<?= base_url('uploads/menu/' . $menu['gambar']) ?>"
                             alt="<?= esc($menu['nama_menu']) ?>"
                             class="menu-card-img">
                    <?php else: ?>
                        <div class="menu-card-img-placeholder">🍜</div>
                    <?php endif; ?>

                    <span class="menu-card-badge"><?= esc($menu['nama_category']) ?></span>

                    <div class="menu-card-body">
                        <div class="menu-card-name"><?= esc($menu['nama_menu']) ?></div>
                        <div class="menu-card-price">Rp <?= number_format($menu['harga'], 0, ',', '.') ?></div>
                    </div>
                </div>
                <?php endforeach; ?>
            </div>
            <div id="noMenuMsg" style="display:none; text-align:center; padding:40px 0; color:var(--text-muted);">
                <i class="bi bi-search" style="font-size:32px; opacity:0.3;"></i>
                <p style="margin-top:8px; font-size:13px;">Menu tidak ditemukan</p>
            </div>
        </div>
    </div>

    <!-- ════════════ RIGHT: Cart ════════════ -->
    <div class="pos-right">

        <!-- Cart Header -->
        <div class="cart-header">
            <div class="cart-title">
                <i class="bi bi-receipt" style="color:var(--tosca);"></i>
                Pesanan
                <span class="cart-count-badge" id="cartCountBadge">0</span>
            </div>
        </div>

        <!-- Table Selector -->
        <div class="table-selector">
            <select id="selectTable">
                <option value="">— Pilih Meja —</option>
                <?php foreach ($tables as $t): ?>
                    <option value="<?= $t['id_table'] ?>"><?= esc($t['nomor_meja']) ?> (Kapasitas <?= $t['kapasitas'] ?>)</option>
                <?php endforeach; ?>
            </select>
        </div>

        <!-- Cart Items -->
        <div class="cart-items" id="cartItems">
            <div class="cart-empty" id="cartEmpty">
                <i class="bi bi-bag-x"></i>
                <p>Keranjang masih kosong.<br>Pilih menu di sebelah kiri!</p>
            </div>
        </div>

        <!-- Cart Footer -->
        <div class="cart-footer">

            <!-- ① Auto-suggest: muncul otomatis kalau ada promo eligible -->
            <div class="promo-suggest-banner" id="promoSuggestBanner" onclick="applyPromoFromSuggest()">
                <div class="promo-suggest-icon">🎫</div>
                <div class="promo-suggest-text">
                    <div class="promo-suggest-title" id="promoSuggestTitle">PROMO tersedia!</div>
                    <div class="promo-suggest-sub" id="promoSuggestSub">Hemat Rp 0</div>
                </div>
                <div class="promo-suggest-cta">Pakai</div>
            </div>

            <!-- ② Applied chip: muncul kalau promo sudah aktif -->
            <div class="promo-applied-chip" id="promoAppliedChip">
                <span>✅</span>
                <span class="chip-label" id="promoAppliedLabel">PROMO aktif</span>
                <button class="chip-remove" onclick="removePromo()" title="Hapus promo">×</button>
            </div>

            <!-- ③ Input manual: untuk kode dari customer -->
            <div class="promo-row" id="promoInputRow">
                <input type="text" class="promo-input" id="promoInput"
                       placeholder="Kode dari pelanggan..." maxlength="20"
                       oninput="this.value=this.value.toUpperCase()">
                <button type="button" class="btn btn-sm" id="promoBtn"
                        style="border-radius:10px; background:linear-gradient(135deg,var(--sky),var(--tosca)); color:#fff; font-weight:600; font-size:12px; padding:0 14px; border:none; white-space:nowrap;"
                        onclick="cekPromo()">
                    Pakai
                </button>
            </div>
            <div class="promo-msg" id="promoMsg"></div>

            <!-- ④ Daftar semua promo: collapsible, kasir bisa lihat semua -->
            <div class="promo-chips-section" id="promoChipsSection" style="display:none;">
                <div class="promo-chips-toggle" id="promoChipsToggle" onclick="toggleChipsList()">
                    <i class="bi bi-tags" style="font-size:11px;"></i>
                    <span id="promoChipsToggleLabel">Lihat promo tersedia</span>
                    <i class="bi bi-chevron-down" id="promoChipsChevron" style="font-size:10px; margin-left:auto;"></i>
                </div>
                <div class="promo-chips-list" id="promoChipsList">
                    <?php foreach ($promosAktif as $p): ?>
                    <span class="promo-chip ineligible"
                          data-kode="<?= esc($p['kode_promo']) ?>"
                          data-nama="<?= esc($p['nama_promo']) ?>"
                          data-min="<?= (int)$p['min_transaksi'] ?>"
                          data-nilai="<?= esc($p['nilai_diskon']) ?>"
                          data-tipe="<?= esc($p['tipe_diskon']) ?>"
                          data-id="<?= esc($p['id_promo']) ?>"
                          onclick="chipClick(this)"
                          title="Min. Rp <?= number_format($p['min_transaksi'],0,',','.') ?>">
                        <?= esc($p['kode_promo']) ?>
                        <span class="chip-info">
                            (<?= $p['tipe_diskon']==='percent' ? $p['nilai_diskon'].'%' : 'Rp '.number_format($p['nilai_diskon'],0,',','.') ?>)
                        </span>
                    </span>
                    <?php endforeach; ?>
                </div>
            </div>

            <!-- Data promo untuk JS (hidden) -->
            <script>
            const PROMOS_AKTIF = <?= json_encode(array_map(function($p) {
                return [
                    'kode'      => $p['kode_promo'],
                    'nama'      => $p['nama_promo'],
                    'tipe'      => $p['tipe_diskon'],
                    'nilai'     => (float)$p['nilai_diskon'],
                    'maks'      => (float)($p['maks_diskon'] ?? 0),
                    'min'       => (float)$p['min_transaksi'],
                    'id_promo'  => $p['id_promo'],
                ];
            }, $promosAktif)) ?>;
            </script>

            <!-- Summary -->
            <div class="cart-summary-row">
                <span class="label">Subtotal</span>
                <span class="value" id="subtotalText">Rp 0</span>
            </div>
            <div class="cart-summary-row" id="diskonRow" style="display:none;">
                <span class="label" style="color:#22c55e;">Diskon 🎉</span>
                <span class="value" style="color:#22c55e;" id="diskonText">- Rp 0</span>
            </div>
            <div class="cart-summary-row total-row">
                <span class="label">Total</span>
                <span class="value" id="totalText">Rp 0</span>
            </div>

            <button class="btn-checkout" id="btnCheckout" disabled onclick="openPaymentModal()">
                <i class="bi bi-cash-coin"></i> Lanjut Pembayaran
            </button>
        </div>
    </div>
</div>


<!-- ══════════════════════════════════════════════
     MODAL: Detail Menu
══════════════════════════════════════════════ -->
<div class="modal fade" id="modalMenu" tabindex="-1">
    <div class="modal-dialog modal-dialog-centered" style="max-width:380px;">
        <div class="modal-content" style="border-radius:18px; border:none; overflow:hidden;">
            <div class="modal-body p-0">
                <div id="modalMenuImgWrap"></div>
                <div style="padding:18px 20px 20px;">
                    <div style="display:flex; justify-content:space-between; align-items:flex-start; margin-bottom:6px;">
                        <h5 style="font-family:'Plus Jakarta Sans',sans-serif; font-weight:700; margin:0; font-size:17px; color:var(--dark);" id="modalMenuName"></h5>
                        <span id="modalMenuCat" style="font-size:11px; font-weight:600; color:var(--sky); background:rgba(75,163,195,0.1); padding:3px 10px; border-radius:20px; white-space:nowrap; margin-left:8px;"></span>
                    </div>
                    <div style="font-size:18px; font-weight:800; color:var(--tosca); margin-bottom:10px;" id="modalMenuPrice"></div>
                    <p style="font-size:13px; color:#666; line-height:1.6; margin-bottom:14px;" id="modalMenuDesc"></p>

                    <!-- Catatan -->
                    <div style="margin-bottom:14px;">
                        <label style="font-size:12px; font-weight:600; color:var(--text-muted); display:block; margin-bottom:4px;">Catatan (opsional)</label>
                        <input type="text" id="modalMenuCatatan" class="form-control form-control-sm" placeholder="e.g. tidak pedas, tanpa bawang..." style="border-radius:9px; font-size:12.5px;">
                    </div>

                    <div style="display:flex; align-items:center; gap:10px;">
                        <div class="qty-control" style="gap:10px;">
                            <button class="qty-btn minus" onclick="modalChangeQty(-1)">−</button>
                            <span class="qty-num" id="modalQty" style="font-size:16px;">1</span>
                            <button class="qty-btn" onclick="modalChangeQty(1)">+</button>
                        </div>
                        <button class="btn btn-sm flex-fill"
                                style="background:linear-gradient(135deg,var(--sky),var(--tosca)); color:#fff; border:none; border-radius:10px; font-weight:700; padding:9px; font-family:'Plus Jakarta Sans',sans-serif; font-size:13px;"
                                onclick="addToCartFromModal()">
                            <i class="bi bi-plus-circle me-1"></i> Tambah ke Pesanan
                        </button>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>


<!-- ══════════════════════════════════════════════
     MODAL: Payment / Checkout
══════════════════════════════════════════════ -->
<div class="modal fade" id="modalPayment" tabindex="-1" data-bs-backdrop="static">
    <div class="modal-dialog modal-dialog-centered" style="max-width:420px;">
        <div class="modal-content" style="border-radius:18px; border:none;">
            <div class="modal-header" style="border-bottom:1px solid var(--border); padding:16px 20px;">
                <h5 class="modal-title" style="font-family:'Plus Jakarta Sans',sans-serif; font-weight:700; font-size:16px; color:var(--navy);">
                    <i class="bi bi-cash-coin me-2" style="color:var(--tosca);"></i>Pembayaran
                </h5>
                <button type="button" class="btn-close" data-bs-dismiss="modal"></button>
            </div>
            <div class="modal-body" style="padding:20px;">

                <!-- Customer Info -->
                <div style="background:var(--bg); border-radius:12px; padding:14px; margin-bottom:16px;">
                    <div style="font-size:12px; font-weight:700; color:var(--text-muted); text-transform:uppercase; letter-spacing:0.8px; margin-bottom:10px;">Info Pelanggan</div>
                    <div class="row g-2">
                        <div class="col-7">
                            <label style="font-size:11.5px; font-weight:600; color:var(--dark); display:block; margin-bottom:4px;">Nama</label>
                            <input type="text" id="payNamaCustomer" class="form-control form-control-sm" placeholder="Nama pelanggan" style="border-radius:9px; font-size:12.5px;">
                        </div>
                        <div class="col-5">
                            <label style="font-size:11.5px; font-weight:600; color:var(--dark); display:block; margin-bottom:4px;">No. Telp</label>
                            <input type="text" id="payTelpCustomer" class="form-control form-control-sm" placeholder="08xx..." style="border-radius:9px; font-size:12.5px;">
                        </div>
                    </div>
                </div>

                <!-- Order Summary -->
                <div style="background:var(--bg); border-radius:12px; padding:14px; margin-bottom:16px;">
                    <div style="font-size:12px; font-weight:700; color:var(--text-muted); text-transform:uppercase; letter-spacing:0.8px; margin-bottom:10px;">Ringkasan Pesanan</div>
                    <div id="payOrderSummary" style="font-size:12.5px; max-height:120px; overflow-y:auto;"></div>
                    <div style="border-top:1px dashed var(--border); margin-top:8px; padding-top:8px;">
                        <div style="display:flex; justify-content:space-between; font-size:13px;">
                            <span style="color:#666;">Subtotal</span>
                            <span style="font-weight:600;" id="paySubtotal"></span>
                        </div>
                        <div id="payDiskonRow" style="display:none; flex-direction:row; justify-content:space-between; font-size:13px;">
                            <span style="color:#22c55e;">Diskon</span>
                            <span style="font-weight:600; color:#22c55e;" id="payDiskon"></span>
                        </div>
                        <div style="display:flex; justify-content:space-between; font-size:16px; margin-top:6px;">
                            <span style="font-weight:700; color:var(--navy);">Total</span>
                            <span style="font-weight:800; color:var(--tosca);" id="payTotal"></span>
                        </div>
                    </div>
                </div>

                <!-- Payment Method -->
                <div style="margin-bottom:16px;">
                    <div style="font-size:12px; font-weight:700; color:var(--text-muted); text-transform:uppercase; letter-spacing:0.8px; margin-bottom:10px;">Metode Pembayaran</div>
                    <div class="payment-method">
                        <div class="pay-method-btn active" data-method="cash" onclick="selectPayMethod(this, 'cash')">
                            <i class="bi bi-cash" style="color:var(--tosca);"></i>
                            <span class="pay-method-label">Cash</span>
                        </div>
                        <div class="pay-method-btn" data-method="debit" onclick="selectPayMethod(this, 'debit')">
                            <i class="bi bi-credit-card-2-front" style="color:var(--sky);"></i>
                            <span class="pay-method-label">Debit/EDC</span>
                        </div>
                        <div class="pay-method-btn" data-method="qris" onclick="selectPayMethod(this, 'qris')">
                            <i class="bi bi-qr-code" style="color:var(--purple);"></i>
                            <span class="pay-method-label">QRIS</span>
                        </div>
                    </div>
                </div>

                <!-- Cash: input jumlah -->
                <div id="cashWrap" style="margin-bottom:16px;">
                    <label style="font-size:12px; font-weight:700; color:var(--text-muted); text-transform:uppercase; letter-spacing:0.8px; display:block; margin-bottom:8px;">Jumlah Bayar (Cash)</label>
                    <input type="number" id="payJumlahBayar" class="form-control" placeholder="0"
                           style="border-radius:10px; font-size:14px; font-weight:600;" oninput="hitungKembalian()">
                    <div style="display:flex; justify-content:space-between; font-size:13px; margin-top:8px; padding:8px 12px; background:var(--bg); border-radius:10px;">
                        <span style="color:#666;">Kembalian</span>
                        <span style="font-weight:700; color:var(--navy);" id="payKembalian">Rp 0</span>
                    </div>
                </div>

                <!-- Catatan order -->
                <div style="margin-bottom:4px;">
                    <label style="font-size:12px; font-weight:700; color:var(--text-muted); text-transform:uppercase; letter-spacing:0.8px; display:block; margin-bottom:6px;">Catatan Pesanan</label>
                    <textarea id="payCatatan" class="form-control" rows="2"
                              placeholder="Catatan tambahan untuk dapur..."
                              style="border-radius:10px; font-size:12.5px; resize:none;"></textarea>
                </div>

            </div>
            <div class="modal-footer" style="border-top:1px solid var(--border); padding:14px 20px; gap:8px;">
                <button type="button" class="btn btn-light" data-bs-dismiss="modal"
                        style="border-radius:10px; font-size:13px; font-weight:600;">Batal</button>
                <button type="button" class="btn flex-fill" id="btnConfirmPayment"
                        style="border-radius:10px; background:linear-gradient(135deg,var(--sky),var(--tosca)); color:#fff; font-weight:700; font-size:14px; border:none;"
                        onclick="confirmPayment()">
                    <i class="bi bi-check2-circle me-2"></i>Konfirmasi Pembayaran
                </button>
            </div>
        </div>
    </div>
</div>


<div class="modal fade" id="modalSuccess" tabindex="-1" data-bs-backdrop="static" data-bs-keyboard="false">
    <div class="modal-dialog modal-dialog-centered" style="max-width:340px;">
        <div class="modal-content" style="border-radius:18px; border:none; text-align:center;">
            <div class="modal-body" style="padding:32px 24px;">
                <div class="success-animation">
                    <div class="success-icon"><i class="bi bi-check-lg"></i></div>
                    <h5 style="font-family:'Plus Jakarta Sans',sans-serif; font-weight:800; color:var(--navy); font-size:20px; margin-bottom:6px;">Pembayaran Berhasil!</h5>
                    <p style="font-size:13.5px; color:#666; margin-bottom:20px;">Pesanan telah selesai dan tercatat ke laporan.</p>
                    <div style="background:var(--bg); border-radius:12px; padding:12px 16px; width:100%; margin-bottom:20px; text-align:left;">
                        <div style="font-size:12px; color:var(--text-muted); margin-bottom:2px;">Kode Order</div>
                        <div style="font-size:15px; font-weight:700; color:var(--navy);" id="successKode">—</div>
                    </div>
                    <div style="display:flex; gap:10px; width:100%;">
                        <a href="#" id="btnLihatStruk" target="_blank"
                           style="flex:1; padding:11px; border-radius:11px; border:2px solid var(--border); background:#fff; color:var(--dark); font-weight:600; font-size:13px; text-decoration:none; display:flex; align-items:center; justify-content:center; gap:6px;">
                            <i class="bi bi-printer"></i> Struk
                        </a>
                        <button type="button" onclick="resetPOS()"
                                style="flex:1; padding:11px; border-radius:11px; border:none; background:linear-gradient(135deg,var(--sky),var(--tosca)); color:#fff; font-weight:700; font-size:13px; cursor:pointer;">
                            <i class="bi bi-plus-circle me-1"></i> Transaksi Baru
                        </button>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>


<!-- ══ Form untuk checkout ══ -->
<form id="formCheckout" action="<?= base_url('transaksi/checkout') ?>" method="POST" style="display:none;">
    <?= csrf_field() ?>
    <input type="hidden" name="id_table"        id="fIdTable">
    <input type="hidden" name="id_promo"        id="fIdPromo">
    <input type="hidden" name="nama_customer"   id="fNamaCustomer">
    <input type="hidden" name="telp_customer"   id="fTelpCustomer">
    <input type="hidden" name="metode_bayar"    id="fMetodeBayar">
    <input type="hidden" name="jumlah_bayar"    id="fJumlahBayar">
    <input type="hidden" name="diskon_nominal"  id="fDiskon">
    <input type="hidden" name="catatan"         id="fCatatan">
    <input type="hidden" name="items"           id="fItems">
</form>


<script>
/* ══════════════════════════════════════
   STATE
══════════════════════════════════════ */
let cart        = [];
let promoData   = null; // {kode, id_promo, diskon, nama}
let modalMenu   = null;
let metodeBayar = 'cash';
let chipsOpen   = false;
let suggestKode = null; // promo terbaik yang eligible saat ini

/* ══════════════════════════════════════
   HELPER
══════════════════════════════════════ */
function formatRp(n) { return Number(n).toLocaleString('id-ID'); }

function getSubtotal() {
    return cart.reduce((s, c) => s + c.harga * c.qty, 0);
}

function getCsrfToken() {
    const el = document.querySelector('#formCheckout input[name^="csrf"]');
    return el ? el.value : '';
}
function getCsrfName() {
    const el = document.querySelector('#formCheckout input[name^="csrf"]');
    return el ? el.name : 'csrf_test_name';
}

/* ══════════════════════════════════════
   PROMO CORE
══════════════════════════════════════ */

/**
 * Dipanggil setiap cart berubah.
 * 1. Update chip eligibility
 * 2. Cek auto-suggest promo terbaik
 * 3. Re-hitung diskon kalau promo sudah applied
 */
function recalcPromo() {
    const subtotal = getSubtotal();
    updateChipEligibility(subtotal);
    checkAutoSuggest(subtotal);

    if (!promoData) {
        updateTotals();
        return;
    }
    // Re-validate applied promo terhadap subtotal baru (silent)
    applyPromo(promoData.kode, false);
}

/**
 * Cek promo mana yang paling menguntungkan & eligible → tampilkan banner
 */
function checkAutoSuggest(subtotal) {
    if (!PROMOS_AKTIF || PROMOS_AKTIF.length === 0) return;
    if (promoData) {
        // Kalau sudah ada promo applied, sembunyikan suggest
        document.getElementById('promoSuggestBanner').style.display = 'none';
        suggestKode = null;
        return;
    }
    if (subtotal === 0) {
        document.getElementById('promoSuggestBanner').style.display = 'none';
        suggestKode = null;
        return;
    }

    // Cari promo yang eligible dan hitung diskonnya
    let best = null;
    let bestDiskon = 0;

    PROMOS_AKTIF.forEach(p => {
        if (subtotal < p.min) return; // tidak eligible
        let diskon = 0;
        if (p.tipe === 'percent') {
            diskon = subtotal * (p.nilai / 100);
            if (p.maks > 0 && diskon > p.maks) diskon = p.maks;
        } else {
            diskon = p.nilai;
        }
        diskon = Math.min(diskon, subtotal);
        if (diskon > bestDiskon) {
            bestDiskon = diskon;
            best = p;
            best._diskon = diskon;
        }
    });

    const banner = document.getElementById('promoSuggestBanner');
    if (best) {
        suggestKode = best.kode;
        document.getElementById('promoSuggestTitle').textContent =
            best.kode + ' — ' + best.nama;
        document.getElementById('promoSuggestSub').textContent =
            'Hemat Rp ' + formatRp(best._diskon) + ' untuk pelanggan ini!';
        banner.style.display = 'flex';
    } else {
        banner.style.display = 'none';
        suggestKode = null;
    }
}

/**
 * Kasir klik banner suggest → langsung apply
 */
function applyPromoFromSuggest() {
    if (!suggestKode) return;
    document.getElementById('promoInput').value = suggestKode;
    applyPromo(suggestKode, true);
}

/**
 * Update tampilan chip (eligible/ineligible) berdasarkan subtotal
 */
function updateChipEligibility(subtotal) {
    const chips = document.querySelectorAll('.promo-chip');
    const section = document.getElementById('promoChipsSection');
    
    if (chips.length === 0) return;
    section.style.display = subtotal > 0 ? 'block' : 'none';

    chips.forEach(chip => {
        const min = parseFloat(chip.dataset.min) || 0;
        if (subtotal >= min) {
            chip.className = 'promo-chip eligible';
            chip.title = 'Klik untuk pakai';
        } else {
            chip.className = 'promo-chip ineligible';
            chip.title = 'Min. transaksi Rp ' + formatRp(min);
        }
    });
}

/**
 * Kasir klik chip promo dari daftar
 */
function chipClick(el) {
    if (el.classList.contains('ineligible')) return;
    const kode = el.dataset.kode;
    document.getElementById('promoInput').value = kode;
    applyPromo(kode, true);
    // Tutup list setelah pilih
    setChipsList(false);
}

function toggleChipsList() {
    setChipsList(!chipsOpen);
}

function setChipsList(open) {
    chipsOpen = open;
    const list = document.getElementById('promoChipsList');
    const chevron = document.getElementById('promoChipsChevron');
    const label = document.getElementById('promoChipsToggleLabel');
    list.style.display = open ? 'flex' : 'none';
    chevron.className = open ? 'bi bi-chevron-up' : 'bi bi-chevron-down';
    chevron.style.fontSize = '10px';
    chevron.style.marginLeft = 'auto';
    label.textContent = open ? 'Sembunyikan' : 'Lihat promo tersedia';
}

/**
 * Core apply promo → fetch ke server
 */
async function applyPromo(kode, verbose = true) {
    const subtotal = getSubtotal();

    if (!kode || subtotal === 0) {
        promoData = null;
        updateTotals();
        return;
    }

    try {
        const res = await fetch('<?= base_url('transaksi/cek-promo') ?>', {
            method: 'POST',
            headers: {
                'Content-Type': 'application/json',
                'X-Requested-With': 'XMLHttpRequest',
            },
            body: JSON.stringify({
                kode_promo: kode.toUpperCase(),
                subtotal: subtotal,
                [getCsrfName()]: getCsrfToken(),
            })
        });

        const data = await res.json();

        if (data.valid) {
            promoData = {
                kode     : kode.toUpperCase(),
                id_promo : data.id_promo,
                diskon   : parseFloat(data.diskon),
                nama     : data.nama_promo,
            };

            // Tampilkan applied chip
            showAppliedChip(promoData);

            if (verbose) {
                showPromoMsg('✅ ' + data.message, 'success');
                document.getElementById('promoInput').classList.add('valid');
                document.getElementById('promoInput').classList.remove('invalid');
            }
        } else {
            // Promo gagal
            const wasApplied = !!promoData;
            promoData = null;
            hideAppliedChip();

            if (verbose) {
                showPromoMsg('❌ ' + data.message, 'error');
                document.getElementById('promoInput').classList.add('invalid');
                document.getElementById('promoInput').classList.remove('valid');
            } else if (wasApplied) {
                // Silent: promo dihapus karena subtotal turun di bawah minimum
                showPromoMsg('⚠️ Promo dihapus: ' + data.message, 'error');
                document.getElementById('promoInput').value = '';
                document.getElementById('promoInput').className = 'promo-input';
            }
        }

        updateTotals();
        checkAutoSuggest(subtotal); // refresh suggest

    } catch (err) {
        console.error('Promo error:', err);
        if (verbose) showPromoMsg('Gagal memverifikasi promo.', 'error');
    }
}

/** Dipanggil tombol "Pakai" */
function cekPromo() {
    const kode = document.getElementById('promoInput').value.trim().toUpperCase();
    applyPromo(kode, true);
}

/** Hapus promo yang sudah applied */
function removePromo() {
    promoData = null;
    document.getElementById('promoInput').value = '';
    document.getElementById('promoInput').className = 'promo-input';
    document.getElementById('promoMsg').textContent = '';
    hideAppliedChip();
    updateTotals();
    recalcPromo(); // refresh suggest
}

function showAppliedChip(promo) {
    const chip = document.getElementById('promoAppliedChip');
    document.getElementById('promoAppliedLabel').textContent =
        '🎫 ' + promo.kode + ' — Hemat Rp ' + formatRp(promo.diskon);
    chip.style.display = 'flex';
    document.getElementById('promoSuggestBanner').style.display = 'none';
    document.getElementById('promoInputRow').style.display = 'none';
    document.getElementById('promoChipsSection').style.display = 'none';
}

function hideAppliedChip() {
    document.getElementById('promoAppliedChip').style.display = 'none';
    document.getElementById('promoInputRow').style.display = 'flex';
    const subtotal = getSubtotal();
    if (subtotal > 0) document.getElementById('promoChipsSection').style.display = 'block';
}

function showPromoMsg(msg, type) {
    const el = document.getElementById('promoMsg');
    el.textContent = msg;
    el.className = 'promo-msg ' + type;
}

/* ══════════════════════════════════════
   TOTALS
══════════════════════════════════════ */
function updateTotals() {
    const sub    = getSubtotal();
    const diskon = promoData ? promoData.diskon : 0;
    const total  = Math.max(0, sub - diskon);

    document.getElementById('subtotalText').textContent = 'Rp ' + formatRp(sub);
    document.getElementById('totalText').textContent    = 'Rp ' + formatRp(total);

    const row = document.getElementById('diskonRow');
    if (diskon > 0) {
        row.style.display = 'flex';
        document.getElementById('diskonText').textContent = '- Rp ' + formatRp(diskon);
    } else {
        row.style.display = 'none';
    }
}

/* ══════════════════════════════════════
   MODAL: Menu Detail
══════════════════════════════════════ */
function openMenuModal(menu) {
    modalMenu = menu;
    document.getElementById('modalMenuName').textContent  = menu.nama_menu;
    document.getElementById('modalMenuCat').textContent   = menu.nama_category ?? '';
    document.getElementById('modalMenuPrice').textContent = 'Rp ' + formatRp(menu.harga);
    document.getElementById('modalMenuDesc').textContent  = menu.deskripsi || 'Tidak ada deskripsi.';
    document.getElementById('modalQty').textContent       = 1;
    document.getElementById('modalMenuCatatan').value     = '';

    const imgWrap = document.getElementById('modalMenuImgWrap');
    if (menu.gambar) {
        imgWrap.innerHTML = `<img src="<?= base_url('uploads/menu/') ?>${menu.gambar}" class="modal-menu-img" alt="${menu.nama_menu}">`;
    } else {
        imgWrap.innerHTML = `<div class="modal-menu-img-placeholder">🍜</div>`;
    }

    new bootstrap.Modal(document.getElementById('modalMenu')).show();
}

function modalChangeQty(delta) {
    const el  = document.getElementById('modalQty');
    const val = Math.max(1, parseInt(el.textContent) + delta);
    el.textContent = val;
}

function addToCartFromModal() {
    if (!modalMenu) return;
    const qty     = parseInt(document.getElementById('modalQty').textContent);
    const catatan = document.getElementById('modalMenuCatatan').value.trim();

    const existing = cart.find(c => c.id_menu == modalMenu.id_menu && c.catatan === catatan);
    if (existing) {
        existing.qty += qty;
    } else {
        cart.push({
            id_menu   : modalMenu.id_menu,
            nama_menu : modalMenu.nama_menu,
            harga     : parseFloat(modalMenu.harga),
            qty       : qty,
            gambar    : modalMenu.gambar,
            catatan   : catatan,
        });
    }

    bootstrap.Modal.getInstance(document.getElementById('modalMenu'))?.hide();
    renderCart();
    recalcPromo();
}

/* ══════════════════════════════════════
   CART RENDER
══════════════════════════════════════ */
function renderCart() {
    const wrap  = document.getElementById('cartItems');
    const empty = document.getElementById('cartEmpty');
    const badge = document.getElementById('cartCountBadge');
    const btn   = document.getElementById('btnCheckout');

    if (cart.length === 0) {
        empty.style.display = 'flex';
        badge.textContent   = '0';
        btn.disabled        = true;
        promoData = null;
        document.getElementById('promoInput').value = '';
        document.getElementById('promoInput').className = 'promo-input';
        document.getElementById('promoMsg').textContent = '';
        hideAppliedChip();
        document.getElementById('promoSuggestBanner').style.display = 'none';
        document.getElementById('promoChipsSection').style.display = 'none';
        updateTotals();
        return;
    }

    empty.style.display = 'none';
    badge.textContent   = cart.reduce((s, c) => s + c.qty, 0);
    btn.disabled        = false;

    Array.from(wrap.children).forEach(el => { if (!el.id) el.remove(); });

    cart.forEach((item, idx) => {
        const div = document.createElement('div');
        div.className = 'cart-item';
        div.innerHTML = `
            ${item.gambar
                ? `<img src="<?= base_url('uploads/menu/') ?>${item.gambar}" class="cart-item-img" alt="${item.nama_menu}">`
                : `<div class="cart-item-img-placeholder">🍜</div>`
            }
            <div class="cart-item-info">
                <div class="cart-item-name">${item.nama_menu}</div>
                ${item.catatan ? `<div style="font-size:10.5px; color:var(--text-muted); margin-bottom:1px;">📝 ${item.catatan}</div>` : ''}
                <div class="cart-item-price">Rp ${formatRp(item.harga * item.qty)}</div>
            </div>
            <div class="qty-control">
                <button class="qty-btn minus" onclick="changeCartQty(${idx}, -1)">−</button>
                <span class="qty-num">${item.qty}</span>
                <button class="qty-btn" onclick="changeCartQty(${idx}, 1)">+</button>
            </div>
        `;
        wrap.appendChild(div);
    });

    updateTotals();
}

function changeCartQty(idx, delta) {
    cart[idx].qty += delta;
    if (cart[idx].qty <= 0) cart.splice(idx, 1);
    renderCart();
    recalcPromo();
}

/* ══════════════════════════════════════
   PAYMENT MODAL
══════════════════════════════════════ */
function openPaymentModal() {
    if (cart.length === 0) return;

    // Validasi meja wajib diisi
    if (! document.getElementById('selectTable').value) {
        const toast = document.createElement('div');
        toast.innerHTML = `<i class="bi bi-exclamation-triangle-fill me-2"></i>Nomor meja belum dipilih!`;
        toast.style.cssText = `
            position: fixed; bottom: 28px; left: 50%; transform: translateX(-50%);
            background: linear-gradient(135deg, #ef4444, #dc2626);
            color: #fff; padding: 12px 22px; border-radius: 12px;
            font-size: 13.5px; font-weight: 600; font-family: 'Plus Jakarta Sans', sans-serif;
            box-shadow: 0 6px 24px rgba(239,68,68,0.4);
            z-index: 9999; white-space: nowrap;
            animation: slideUp 0.25s ease;
        `;
        document.body.appendChild(toast);

        // Highlight dropdown meja
        const sel = document.getElementById('selectTable');
        sel.style.borderColor = '#ef4444';
        sel.style.boxShadow   = '0 0 0 3px rgba(239,68,68,0.15)';
        sel.focus();

        setTimeout(() => {
            toast.style.opacity    = '0';
            toast.style.transition = 'opacity 0.3s';
            setTimeout(() => toast.remove(), 300);
            sel.style.borderColor = '';
            sel.style.boxShadow   = '';
        }, 2500);
        return;
    }

    const sub    = getSubtotal();
    const diskon = promoData ? promoData.diskon : 0;
    const total  = Math.max(0, sub - diskon);

    document.getElementById('paySubtotal').textContent = 'Rp ' + formatRp(sub);
    document.getElementById('payTotal').textContent    = 'Rp ' + formatRp(total);

    const disRow = document.getElementById('payDiskonRow');
    if (diskon > 0) {
        disRow.style.display = 'flex';
        document.getElementById('payDiskon').textContent = '- Rp ' + formatRp(diskon);
    } else {
        disRow.style.display = 'none';
    }

    let summaryHtml = '';
    cart.forEach(item => {
        summaryHtml += `<div style="display:flex; justify-content:space-between; margin-bottom:5px; color:#444;">
            <span>${item.nama_menu} <span style="color:var(--text-muted);">×${item.qty}</span></span>
            <span>Rp ${formatRp(item.harga * item.qty)}</span>
        </div>`;
    });
    document.getElementById('payOrderSummary').innerHTML = summaryHtml;

    document.getElementById('payJumlahBayar').value = '';
    document.getElementById('payKembalian').textContent = 'Rp 0';
    selectPayMethod(document.querySelector('.pay-method-btn[data-method="cash"]'), 'cash');

    new bootstrap.Modal(document.getElementById('modalPayment')).show();
}

function selectPayMethod(el, method) {
    metodeBayar = method;
    document.querySelectorAll('.pay-method-btn').forEach(b => b.classList.remove('active'));
    el.classList.add('active');
    document.getElementById('cashWrap').style.display = method === 'cash' ? 'block' : 'none';
}

function hitungKembalian() {
    const sub    = getSubtotal();
    const diskon = promoData ? promoData.diskon : 0;
    const total  = Math.max(0, sub - diskon);
    const bayar  = parseFloat(document.getElementById('payJumlahBayar').value) || 0;
    document.getElementById('payKembalian').textContent = 'Rp ' + formatRp(Math.max(0, bayar - total));
}

function confirmPayment() {
    const nama  = document.getElementById('payNamaCustomer').value.trim() || 'Guest';
    const telp  = document.getElementById('payTelpCustomer').value.trim() || '-';

    const sub    = getSubtotal();
    const diskon = promoData ? promoData.diskon : 0;
    const total  = Math.max(0, sub - diskon);

    let jumlahBayar = total;
    if (metodeBayar === 'cash') {
        jumlahBayar = parseFloat(document.getElementById('payJumlahBayar').value) || 0;
        if (jumlahBayar < total) {
            alert('Jumlah bayar kurang dari total!');
            return;
        }
    }

    document.getElementById('fIdTable').value      = document.getElementById('selectTable').value;
    document.getElementById('fIdPromo').value      = promoData ? promoData.id_promo : '';
    document.getElementById('fNamaCustomer').value = nama;
    document.getElementById('fTelpCustomer').value = telp;
    document.getElementById('fMetodeBayar').value  = metodeBayar;
    document.getElementById('fJumlahBayar').value  = jumlahBayar;
    document.getElementById('fDiskon').value       = diskon;
    document.getElementById('fCatatan').value      = document.getElementById('payCatatan').value;
    document.getElementById('fItems').value        = JSON.stringify(cart);

    document.getElementById('formCheckout').submit();
}

/* ══════════════════════════════════════
   CATEGORY FILTER & SEARCH
══════════════════════════════════════ */
document.querySelectorAll('.cat-tab').forEach(tab => {
    tab.addEventListener('click', () => {
        document.querySelectorAll('.cat-tab').forEach(t => t.classList.remove('active'));
        tab.classList.add('active');
        filterMenu();
    });
});

document.getElementById('searchMenu').addEventListener('input', filterMenu);

function filterMenu() {
    const catId  = document.querySelector('.cat-tab.active').dataset.cat;
    const search = document.getElementById('searchMenu').value.toLowerCase();
    let visible  = 0;

    document.querySelectorAll('.menu-card').forEach(card => {
        const matchCat  = catId === 'all' || card.dataset.cat === catId;
        const matchText = card.dataset.name.includes(search);
        const show      = matchCat && matchText;
        card.style.display = show ? '' : 'none';
        if (show) visible++;
    });

    document.getElementById('noMenuMsg').style.display = visible === 0 ? 'block' : 'none';
}

/* ══════════════════════════════════════
   RESET POS
══════════════════════════════════════ */
function resetPOS() {
    cart      = [];
    promoData = null;
    suggestKode = null;
    document.getElementById('promoInput').value = '';
    document.getElementById('promoInput').className = 'promo-input';
    document.getElementById('promoMsg').textContent = '';
    document.getElementById('selectTable').value = '';
    hideAppliedChip();
    document.getElementById('promoSuggestBanner').style.display = 'none';
    document.getElementById('promoChipsSection').style.display = 'none';
    bootstrap.Modal.getInstance(document.getElementById('modalSuccess'))?.hide();
    renderCart();
}

// Init
renderCart();
</script>