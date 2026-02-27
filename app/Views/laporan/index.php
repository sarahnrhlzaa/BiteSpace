<?php
/**
 * View: laporan/index.php
 * Simpan di: app/Views/laporan/index.php
 */
$role       = session()->get('role');
$bulanNames = ['','Januari','Februari','Maret','April','Mei','Juni','Juli','Agustus','September','Oktober','November','Desember'];
?>

<style>
/* ══════════════════════════════════════════
   LAPORAN — Vibrant Multi-Color Theme
══════════════════════════════════════════ */

/* ── Summary Cards ── */
.lap-cards {
    display: grid;
    grid-template-columns: repeat(auto-fit, minmax(190px, 1fr));
    gap: 16px;
    margin-bottom: 24px;
}

.lap-card {
    background: #fff;
    border-radius: 20px;
    padding: 20px;
    position: relative;
    overflow: hidden;
    border: 1.5px solid transparent;
    box-shadow: 0 4px 20px rgba(13,27,62,0.07);
    transition: transform 0.2s, box-shadow 0.2s;
}

.lap-card:hover {
    transform: translateY(-3px);
    box-shadow: 0 8px 28px rgba(13,27,62,0.12);
}

.lap-card::before {
    content: '';
    position: absolute;
    inset: 0;
    border-radius: 20px;
    padding: 1.5px;
    -webkit-mask: linear-gradient(#fff 0 0) content-box, linear-gradient(#fff 0 0);
    -webkit-mask-composite: xor;
    mask-composite: exclude;
    pointer-events: none;
}

.lap-card.c-tosca  { border-color: rgba(46,196,182,0.3);  }
.lap-card.c-sky    { border-color: rgba(75,163,195,0.3);  }
.lap-card.c-yellow { border-color: rgba(255,209,102,0.35);}
.lap-card.c-green  { border-color: rgba(34,197,94,0.3);   }
.lap-card.c-purple { border-color: rgba(155,137,196,0.3); }
.lap-card.c-deep   { border-color: rgba(57,0,126,0.2);    }

.lap-card-glow {
    position: absolute;
    width: 100px; height: 100px;
    border-radius: 50%;
    top: -20px; right: -20px;
    pointer-events: none;
    opacity: 0.18;
}

.c-tosca  .lap-card-glow { background: radial-gradient(circle, #2EC4B6, transparent); }
.c-sky    .lap-card-glow { background: radial-gradient(circle, #4BA3C3, transparent); }
.c-yellow .lap-card-glow { background: radial-gradient(circle, #FFD166, transparent); }
.c-green  .lap-card-glow { background: radial-gradient(circle, #22c55e, transparent); }
.c-purple .lap-card-glow { background: radial-gradient(circle, #9B89C4, transparent); }
.c-deep   .lap-card-glow { background: radial-gradient(circle, #39007E, transparent); }

.lap-card-icon {
    width: 48px; height: 48px;
    border-radius: 14px;
    display: flex; align-items: center; justify-content: center;
    font-size: 22px; flex-shrink: 0;
    margin-bottom: 14px;
}

.c-tosca  .lap-card-icon { background: linear-gradient(135deg, #2EC4B6, #4BA3C3); box-shadow: 0 6px 16px rgba(46,196,182,0.4); }
.c-sky    .lap-card-icon { background: linear-gradient(135deg, #4BA3C3, #2EC4B6); box-shadow: 0 6px 16px rgba(75,163,195,0.4); }
.c-yellow .lap-card-icon { background: linear-gradient(135deg, #FFD166, #ffa94d); box-shadow: 0 6px 16px rgba(255,209,102,0.45); }
.c-green  .lap-card-icon { background: linear-gradient(135deg, #22c55e, #16a34a); box-shadow: 0 6px 16px rgba(34,197,94,0.4); }
.c-purple .lap-card-icon { background: linear-gradient(135deg, #9B89C4, #39007E); box-shadow: 0 6px 16px rgba(155,137,196,0.4); }
.c-deep   .lap-card-icon { background: linear-gradient(135deg, #39007E, #9B89C4); box-shadow: 0 6px 16px rgba(57,0,126,0.35); }

.lap-card-label {
    font-size: 11px; font-weight: 700;
    color: var(--text-muted);
    text-transform: uppercase; letter-spacing: 0.8px;
    margin-bottom: 5px;
}

.lap-card-val {
    font-family: 'Plus Jakarta Sans', sans-serif;
    font-size: 17px; font-weight: 800; color: var(--navy);
    line-height: 1.2;
}

.c-tosca  .lap-card-val { color: #1a9e93; }
.c-sky    .lap-card-val { color: #2d7a99; }
.c-yellow .lap-card-val { color: #a16800; }
.c-green  .lap-card-val { color: #15803d; }
.c-purple .lap-card-val { color: #6d4fa0; }
.c-deep   .lap-card-val { color: #39007E; }

/* ── Filter Bar ── */
.filter-bar {
    background: linear-gradient(135deg, #fff 0%, #f8faff 100%);
    border-radius: 18px;
    border: 1.5px solid var(--border);
    padding: 18px 22px;
    margin-bottom: 22px;
    display: flex;
    flex-wrap: wrap;
    gap: 12px;
    align-items: flex-end;
    box-shadow: 0 2px 12px rgba(13,27,62,0.05);
    position: relative;
    overflow: hidden;
}

.filter-bar::before {
    content: '';
    position: absolute;
    left: 0; top: 0; bottom: 0;
    width: 4px;
    background: linear-gradient(180deg, var(--sky), var(--tosca), var(--purple));
    border-radius: 4px 0 0 4px;
}

.filter-group { display: flex; flex-direction: column; gap: 5px; }
.filter-group label {
    font-size: 10.5px; font-weight: 700;
    color: var(--text-muted); text-transform: uppercase; letter-spacing: 0.8px;
}
.filter-group input,
.filter-group select {
    border: 1.5px solid var(--border);
    border-radius: 11px;
    padding: 8px 13px;
    font-size: 12.5px;
    font-family: 'DM Sans', sans-serif;
    background: #fff;
    color: var(--dark);
    min-width: 150px;
    transition: border-color 0.2s, box-shadow 0.2s;
}
.filter-group input:focus,
.filter-group select:focus {
    outline: none;
    border-color: var(--sky);
    box-shadow: 0 0 0 3px rgba(75,163,195,0.15);
}

.btn-filter {
    border-radius: 11px;
    background: linear-gradient(135deg, var(--navy), #1a2d5c);
    color: #fff;
    font-weight: 700;
    font-size: 12.5px;
    padding: 9px 20px;
    border: none;
    cursor: pointer;
    transition: all 0.2s;
    height: fit-content;
    display: flex; align-items: center; gap: 6px;
    box-shadow: 0 4px 14px rgba(13,27,62,0.3);
}
.btn-filter:hover { transform: translateY(-1px); box-shadow: 0 6px 20px rgba(13,27,62,0.4); }

.btn-reset {
    border-radius: 11px;
    background: #fff;
    color: var(--text-muted);
    font-weight: 600;
    font-size: 12.5px;
    padding: 9px 16px;
    border: 1.5px solid var(--border);
    text-decoration: none;
    height: fit-content;
    display: flex; align-items: center; gap: 6px;
    transition: all 0.2s;
}
.btn-reset:hover { border-color: #ef4444; color: #ef4444; }

/* ── Section Box ── */
.lap-section {
    background: #fff;
    border-radius: 20px;
    border: 1.5px solid var(--border);
    box-shadow: 0 4px 20px rgba(13,27,62,0.06);
    margin-bottom: 24px;
    overflow: hidden;
}

.lap-section-header {
    padding: 16px 22px;
    border-bottom: 1.5px solid var(--border);
    display: flex;
    align-items: center;
    justify-content: space-between;
    flex-wrap: wrap;
    gap: 10px;
    background: linear-gradient(135deg, #fafbfe, #f5f6fa);
}

.lap-section-title {
    font-family: 'Plus Jakarta Sans', sans-serif;
    font-size: 14px; font-weight: 700; color: var(--navy);
    display: flex; align-items: center; gap: 10px;
}

.section-icon {
    width: 32px; height: 32px;
    border-radius: 9px;
    display: flex; align-items: center; justify-content: center;
    font-size: 15px;
}

/* ── Table ── */
.lap-table-wrap { overflow-x: auto; }
.lap-table {
    width: 100%; border-collapse: collapse;
    font-size: 12.5px;
}
.lap-table th {
    padding: 11px 16px;
    text-align: left;
    font-size: 10.5px; font-weight: 700;
    color: var(--text-muted);
    text-transform: uppercase; letter-spacing: 0.6px;
    white-space: nowrap;
    border-bottom: 1.5px solid var(--border);
    background: #fafbfe;
}
.lap-table td {
    padding: 12px 16px;
    border-bottom: 1px solid var(--border);
    color: var(--dark);
    vertical-align: middle;
}
.lap-table tr:last-child td { border-bottom: none; }
.lap-table tbody tr {
    transition: background 0.15s;
    cursor: pointer;
}
.lap-table tbody tr:hover { background: linear-gradient(135deg, rgba(75,163,195,0.04), rgba(46,196,182,0.04)); }

/* ── Badges ── */
.badge-metode {
    display: inline-flex; align-items: center; gap: 5px;
    padding: 4px 11px; border-radius: 20px;
    font-size: 11px; font-weight: 700; white-space: nowrap;
}
.badge-metode.cash  { background: linear-gradient(135deg, rgba(34,197,94,0.12), rgba(34,197,94,0.06)); color: #16a34a; border: 1px solid rgba(34,197,94,0.2); }
.badge-metode.debit { background: linear-gradient(135deg, rgba(75,163,195,0.12), rgba(75,163,195,0.06)); color: var(--sky); border: 1px solid rgba(75,163,195,0.2); }
.badge-metode.qris  { background: linear-gradient(135deg, rgba(155,137,196,0.12), rgba(155,137,196,0.06)); color: var(--purple); border: 1px solid rgba(155,137,196,0.2); }

.kode-order {
    font-family: 'Plus Jakarta Sans', monospace;
    font-size: 11.5px; font-weight: 700; color: var(--navy);
    background: linear-gradient(135deg, rgba(13,27,62,0.06), rgba(75,163,195,0.08));
    padding: 3px 9px; border-radius: 7px;
    border: 1px solid rgba(13,27,62,0.08);
}

/* ── Row number highlight ── */
.row-num {
    width: 26px; height: 26px;
    border-radius: 8px;
    background: var(--bg);
    display: inline-flex; align-items: center; justify-content: center;
    font-size: 11px; font-weight: 700; color: var(--text-muted);
}

/* ── Income per bulan - colored rows ── */
.income-row-1  td:first-child { border-left: 3px solid var(--sky); }
.income-row-2  td:first-child { border-left: 3px solid var(--tosca); }
.income-row-3  td:first-child { border-left: 3px solid var(--purple); }
.income-row-4  td:first-child { border-left: 3px solid var(--yellow); }
.income-row-5  td:first-child { border-left: 3px solid #22c55e; }
.income-row-6  td:first-child { border-left: 3px solid #f97316; }
.income-row-7  td:first-child { border-left: 3px solid var(--sky); }
.income-row-8  td:first-child { border-left: 3px solid var(--tosca); }
.income-row-9  td:first-child { border-left: 3px solid var(--purple); }
.income-row-10 td:first-child { border-left: 3px solid var(--yellow); }
.income-row-11 td:first-child { border-left: 3px solid #22c55e; }
.income-row-12 td:first-child { border-left: 3px solid #f97316; }

/* Progress bar income */
.income-bar-wrap {
    height: 6px;
    background: var(--bg);
    border-radius: 99px;
    overflow: hidden;
    margin-top: 5px;
    width: 120px;
}
.income-bar {
    height: 100%;
    border-radius: 99px;
    background: linear-gradient(90deg, var(--sky), var(--tosca));
    transition: width 0.6s ease;
}

/* ── Search input ── */
.search-input {
    border: 1.5px solid var(--border);
    border-radius: 11px;
    padding: 7px 13px 7px 36px;
    font-size: 12px;
    font-family: 'DM Sans', sans-serif;
    background: #fff;
    min-width: 200px;
    transition: border-color 0.2s, box-shadow 0.2s;
    position: relative;
}
.search-input:focus {
    outline: none;
    border-color: var(--sky);
    box-shadow: 0 0 0 3px rgba(75,163,195,0.12);
}
.search-wrap { position: relative; }
.search-wrap i {
    position: absolute; left: 11px; top: 50%;
    transform: translateY(-50%);
    color: var(--text-muted); font-size: 13px;
    pointer-events: none;
}

/* ── Footer total row ── */
.tfoot-total td {
    background: linear-gradient(135deg, rgba(13,27,62,0.04), rgba(46,196,182,0.06)) !important;
    font-weight: 700 !important;
    border-top: 2px solid var(--border) !important;
    padding: 13px 16px !important;
}

/* ── Empty ── */
.empty-state {
    padding: 52px 20px; text-align: center; color: var(--text-muted);
}
.empty-state i { font-size: 42px; opacity: 0.25; display: block; margin-bottom: 12px; }
.empty-state p { font-size: 13px; margin: 0; }

/* ── Promo badge in table ── */
.promo-tag {
    background: linear-gradient(135deg, rgba(255,209,102,0.2), rgba(255,180,80,0.1));
    color: #92610a;
    border: 1px solid rgba(255,209,102,0.35);
    padding: 2px 9px; border-radius: 8px;
    font-size: 11px; font-weight: 600;
}

/* ── Print ── */
@media print {
    .filter-bar, .lap-section-header .d-flex,
    .topbar, .sidebar, #overlay, .btn-print-wrap { display: none !important; }
    .lap-section { box-shadow: none; border: 1px solid #ddd; border-radius: 8px; }
    body { background: #fff !important; }
    .lap-table tbody tr:hover { background: transparent !important; }
    .lap-card { box-shadow: none; border: 1px solid #ddd; }
}
</style>

<!-- ══ SUMMARY CARDS ══ -->
<div class="lap-cards">
    <div class="lap-card c-tosca">
        <div class="lap-card-glow"></div>
        <div class="lap-card-icon"><i class="bi bi-cash-stack" style="color:#fff;"></i></div>
        <div class="lap-card-label">Total Pemasukan</div>
        <div class="lap-card-val">Rp <?= number_format($totalPemasukan, 0, ',', '.') ?></div>
    </div>
    <div class="lap-card c-sky">
        <div class="lap-card-glow"></div>
        <div class="lap-card-icon"><i class="bi bi-receipt-cutoff" style="color:#fff;"></i></div>
        <div class="lap-card-label">Total Transaksi</div>
        <div class="lap-card-val"><?= $totalTransaksi ?> Order</div>
    </div>
    <div class="lap-card c-yellow">
        <div class="lap-card-glow"></div>
        <div class="lap-card-icon"><i class="bi bi-ticket-perforated-fill" style="color:#fff;"></i></div>
        <div class="lap-card-label">Total Diskon</div>
        <div class="lap-card-val">Rp <?= number_format($totalDiskon, 0, ',', '.') ?></div>
    </div>
    <?php if ($role === 'admin'): ?>
    <div class="lap-card c-green">
        <div class="lap-card-glow"></div>
        <div class="lap-card-icon"><i class="bi bi-cash" style="color:#fff;"></i></div>
        <div class="lap-card-label">Cash</div>
        <div class="lap-card-val">Rp <?= number_format($metodeSummary['cash'], 0, ',', '.') ?></div>
    </div>
    <div class="lap-card c-purple">
        <div class="lap-card-glow"></div>
        <div class="lap-card-icon"><i class="bi bi-credit-card-2-front-fill" style="color:#fff;"></i></div>
        <div class="lap-card-label">Debit / EDC</div>
        <div class="lap-card-val">Rp <?= number_format($metodeSummary['debit'], 0, ',', '.') ?></div>
    </div>
    <div class="lap-card c-deep">
        <div class="lap-card-glow"></div>
        <div class="lap-card-icon"><i class="bi bi-qr-code-scan" style="color:#fff;"></i></div>
        <div class="lap-card-label">QRIS</div>
        <div class="lap-card-val">Rp <?= number_format($metodeSummary['qris'], 0, ',', '.') ?></div>
    </div>
    <?php endif; ?>
</div>

<!-- ══ FILTER BAR ══ -->
<form method="GET" action="<?= base_url('laporan') ?>" class="filter-bar" id="filterForm">
    <div class="filter-group">
        <label><i class="bi bi-calendar-event me-1"></i>Tanggal Mulai</label>
        <input type="date" name="tgl_mulai" value="<?= esc($tglMulai) ?>">
    </div>
    <div class="filter-group">
        <label><i class="bi bi-calendar-check me-1"></i>Tanggal Selesai</label>
        <input type="date" name="tgl_selesai" value="<?= esc($tglSelesai) ?>">
    </div>
    <?php if ($role === 'admin'): ?>
    <div class="filter-group">
        <label><i class="bi bi-person-badge me-1"></i>Kasir</label>
        <select name="id_kasir">
            <option value="">Semua Kasir</option>
            <?php foreach ($kasirList as $k): ?>
                <option value="<?= $k['id_user'] ?>" <?= $idKasir == $k['id_user'] ? 'selected' : '' ?>>
                    <?= esc($k['nama_lengkap']) ?> (<?= $k['role'] ?>)
                </option>
            <?php endforeach; ?>
        </select>
    </div>
    <?php endif; ?>
    <button type="submit" class="btn-filter">
        <i class="bi bi-funnel-fill"></i> Terapkan Filter
    </button>
    <a href="<?= base_url('laporan') ?>" class="btn-reset">
        <i class="bi bi-x-circle"></i> Reset
    </a>
</form>

<!-- ══ TABEL TRANSAKSI ══ -->
<div class="lap-section">
    <div class="lap-section-header">
        <div class="lap-section-title">
            <div class="section-icon" style="background:linear-gradient(135deg,var(--sky),var(--tosca));">
                <i class="bi bi-table" style="color:#fff; font-size:14px;"></i>
            </div>
            Daftar Transaksi
            <span style="background:linear-gradient(135deg,rgba(75,163,195,0.12),rgba(46,196,182,0.12)); color:var(--sky); border:1px solid rgba(75,163,195,0.2); padding:3px 10px; border-radius:20px; font-size:11.5px; font-weight:600;">
                <?= $totalTransaksi ?> data
            </span>
        </div>
        <div class="d-flex gap-2 align-items-center btn-print-wrap">
            <div class="search-wrap">
                <i class="bi bi-search"></i>
                <input type="text" id="searchTransaksi" class="search-input" placeholder="Cari nama / kode...">
            </div>
            <button onclick="window.print()" class="btn btn-sm"
                    style="border-radius:11px; font-weight:700; font-size:12px; border:1.5px solid var(--border); background:#fff; padding:7px 15px; display:flex; align-items:center; gap:6px; white-space:nowrap;">
                <i class="bi bi-printer" style="color:var(--purple);"></i> Print
            </button>
        </div>
    </div>

    <div class="lap-table-wrap">
        <?php if (empty($transaksi)): ?>
            <div class="empty-state">
                <i class="bi bi-inbox"></i>
                <p>Tidak ada transaksi pada periode ini.</p>
            </div>
        <?php else: ?>
        <table class="lap-table" id="tabelTransaksi">
            <thead>
                <tr>
                    <th>#</th>
                    <th>Kode Order</th>
                    <th>Tanggal & Waktu</th>
                    <th>Pelanggan</th>
                    <th>No. Telp</th>
                    <th>Meja</th>
                    <?php if ($role === 'admin'): ?><th>Kasir</th><?php endif; ?>
                    <th>Promo</th>
                    <th>Diskon</th>
                    <th>Total</th>
                    <th>Metode</th>
                    <th></th>
                </tr>
            </thead>
            <tbody>
                <?php foreach ($transaksi as $i => $t): ?>
                <tr onclick="lihatDetail(<?= $t['id_order'] ?>)">
                    <td><span class="row-num"><?= $i + 1 ?></span></td>
                    <td><span class="kode-order"><?= esc($t['kode_order']) ?></span></td>
                    <td style="white-space:nowrap;">
                        <div style="font-weight:600; color:var(--dark); font-size:12.5px;"><?= date('d/m/Y', strtotime($t['created_at'])) ?></div>
                        <div style="font-size:11px; color:var(--text-muted);"><?= date('H:i', strtotime($t['created_at'])) ?></div>
                    </td>
                    <td>
                        <div style="display:flex; align-items:center; gap:8px;">
                            <div style="width:28px; height:28px; border-radius:9px; background:linear-gradient(135deg,var(--sky),var(--tosca)); color:#fff; font-weight:700; font-size:12px; display:flex; align-items:center; justify-content:center; flex-shrink:0;">
                                <?= strtoupper(substr($t['nama_customer'] ?? 'G', 0, 1)) ?>
                            </div>
                            <div>
                                <div style="font-weight:600; font-size:12.5px;"><?= esc($t['nama_customer'] ?? 'Guest') ?></div>
                            </div>
                        </div>
                    </td>
                    <td style="color:var(--text-muted); font-size:12px;"><?= esc($t['telp'] ?? '-') ?></td>
                    <td>
                        <?php if ($t['nomor_meja']): ?>
                            <span style="background:rgba(13,27,62,0.06); padding:3px 9px; border-radius:8px; font-size:11.5px; font-weight:600; color:var(--navy);">
                                <i class="bi bi-grid-3x3-gap me-1" style="font-size:10px;"></i><?= esc($t['nomor_meja']) ?>
                            </span>
                        <?php else: ?>
                            <span style="color:var(--text-muted); font-size:12px;">—</span>
                        <?php endif; ?>
                    </td>
                    <?php if ($role === 'admin'): ?>
                    <td>
                        <span style="background:linear-gradient(135deg,rgba(155,137,196,0.1),rgba(57,0,126,0.06)); color:var(--purple); padding:3px 10px; border-radius:8px; font-size:11.5px; font-weight:600; border:1px solid rgba(155,137,196,0.2);">
                            <?= esc($t['kasir'] ?? '-') ?>
                        </span>
                    </td>
                    <?php endif; ?>
                    <td>
                        <?php if ($t['nama_promo']): ?>
                            <span class="promo-tag">🎫 <?= esc($t['nama_promo']) ?></span>
                        <?php else: ?>
                            <span style="color:var(--border);">—</span>
                        <?php endif; ?>
                    </td>
                    <td>
                        <?php if ($t['diskon_nominal'] > 0): ?>
                            <span style="color:#16a34a; font-weight:700; font-size:12.5px;">
                                −Rp <?= number_format($t['diskon_nominal'], 0, ',', '.') ?>
                            </span>
                        <?php else: ?>
                            <span style="color:var(--border);">—</span>
                        <?php endif; ?>
                    </td>
                    <td>
                        <span style="font-weight:800; color:var(--tosca); font-size:13px; white-space:nowrap;">
                            Rp <?= number_format($t['total_harga'], 0, ',', '.') ?>
                        </span>
                    </td>
                    <td>
                        <?php $m = $t['metode_bayar'] ?? 'cash'; ?>
                        <span class="badge-metode <?= $m ?>">
                            <?= $m === 'cash' ? '💵' : ($m === 'debit' ? '💳' : '📱') ?>
                            <?= strtoupper($m) ?>
                        </span>
                    </td>
                    <td onclick="event.stopPropagation()">
                        <button onclick="lihatDetail(<?= $t['id_order'] ?>)"
                                style="width:32px; height:32px; border-radius:9px; border:1.5px solid var(--border); background:#fff; display:inline-flex; align-items:center; justify-content:center; cursor:pointer; color:var(--sky); transition:all 0.15s; font-size:14px;"
                                onmouseover="this.style.background='rgba(75,163,195,0.08)'; this.style.borderColor='var(--sky)';"
                                onmouseout="this.style.background='#fff'; this.style.borderColor='var(--border)';">
                            <i class="bi bi-eye"></i>
                        </button>
                    </td>
                </tr>
                <?php endforeach; ?>
            </tbody>
            <tfoot>
                <tr class="tfoot-total">
                    <td colspan="<?= $role === 'admin' ? 8 : 7 ?>">
                        <span style="font-family:'Plus Jakarta Sans',sans-serif; font-size:13px; color:var(--navy);">
                            TOTAL — <?= $totalTransaksi ?> Transaksi
                        </span>
                    </td>
                    <td>
                        <span style="color:#16a34a; font-weight:700;">
                            −Rp <?= number_format($totalDiskon, 0, ',', '.') ?>
                        </span>
                    </td>
                    <td>
                        <span style="color:var(--tosca); font-weight:800; font-size:14px;">
                            Rp <?= number_format($totalPemasukan, 0, ',', '.') ?>
                        </span>
                    </td>
                    <td colspan="2"></td>
                </tr>
            </tfoot>
        </table>
        <?php endif; ?>
    </div>
</div>

<!-- ══ INCOME PER BULAN ══ -->
<?php
$maxIncome = !empty($incomePerBulan) ? max(array_column($incomePerBulan, 'total_income')) : 1;
$barColors = ['linear-gradient(90deg,#4BA3C3,#2EC4B6)','linear-gradient(90deg,#9B89C4,#4BA3C3)','linear-gradient(90deg,#2EC4B6,#FFD166)','linear-gradient(90deg,#FFD166,#f97316)','linear-gradient(90deg,#22c55e,#2EC4B6)','linear-gradient(90deg,#f97316,#FFD166)'];
?>
<div class="lap-section">
    <div class="lap-section-header">
        <div class="lap-section-title">
            <div class="section-icon" style="background:linear-gradient(135deg,var(--purple),var(--deep));">
                <i class="bi bi-calendar3-week" style="color:#fff; font-size:14px;"></i>
            </div>
            Income Per Bulan
            <span style="background:linear-gradient(135deg,rgba(155,137,196,0.12),rgba(57,0,126,0.08)); color:var(--purple); border:1px solid rgba(155,137,196,0.2); padding:3px 10px; border-radius:20px; font-size:11.5px; font-weight:600;">
                Tahun <?= $tahun ?>
            </span>
        </div>
    </div>

    <div class="lap-table-wrap">
        <?php if (empty($incomePerBulan)): ?>
            <div class="empty-state">
                <i class="bi bi-calendar-x"></i>
                <p>Tidak ada data income untuk tahun <?= $tahun ?>.</p>
            </div>
        <?php else: ?>
        <?php
        $grandIncome = 0; $grandTrx = 0; $grandDisk = 0;
        foreach ($incomePerBulan as $r) { $grandIncome += $r['total_income']; $grandTrx += $r['jml_transaksi']; $grandDisk += $r['total_diskon']; }
        ?>
        <table class="lap-table">
            <thead>
                <tr>
                    <th>Bulan</th>
                    <th>Transaksi</th>
                    <th>Total Diskon</th>
                    <th>Total Income</th>
                    <th>Proporsi</th>
                    <th>Rata-rata / Order</th>
                </tr>
            </thead>
            <tbody>
                <?php foreach ($incomePerBulan as $idx => $row):
                    $avg  = $row['jml_transaksi'] > 0 ? $row['total_income'] / $row['jml_transaksi'] : 0;
                    $pct  = $maxIncome > 0 ? ($row['total_income'] / $maxIncome * 100) : 0;
                    $ci   = $idx % count($barColors);
                ?>
                <tr class="income-row-<?= (int)$row['bulan'] ?>">
                    <td>
                        <span style="font-family:'Plus Jakarta Sans',sans-serif; font-weight:700; color:var(--navy); font-size:13.5px;">
                            <?= $bulanNames[(int)$row['bulan']] ?? '-' ?>
                        </span>
                    </td>
                    <td>
                        <span style="background:linear-gradient(135deg,rgba(75,163,195,0.1),rgba(46,196,182,0.08)); color:var(--sky); padding:4px 11px; border-radius:20px; font-size:12px; font-weight:700; border:1px solid rgba(75,163,195,0.2);">
                            <?= $row['jml_transaksi'] ?> order
                        </span>
                    </td>
                    <td style="color:#16a34a; font-weight:600; font-size:12.5px;">
                        <?= $row['total_diskon'] > 0 ? '−Rp '.number_format($row['total_diskon'],0,',','.') : '—' ?>
                    </td>
                    <td>
                        <span style="font-family:'Plus Jakarta Sans',sans-serif; font-weight:800; color:var(--tosca); font-size:14px;">
                            Rp <?= number_format($row['total_income'], 0, ',', '.') ?>
                        </span>
                    </td>
                    <td style="min-width:140px;">
                        <div style="font-size:11px; color:var(--text-muted); margin-bottom:4px;"><?= number_format($pct, 1) ?>%</div>
                        <div class="income-bar-wrap">
                            <div class="income-bar" style="width:<?= $pct ?>%; background:<?= $barColors[$ci] ?>;"></div>
                        </div>
                    </td>
                    <td style="color:var(--text-muted); font-size:12px;">
                        Rp <?= number_format($avg, 0, ',', '.') ?>
                    </td>
                </tr>
                <?php endforeach; ?>
            </tbody>
            <tfoot>
                <tr class="tfoot-total">
                    <td style="font-family:'Plus Jakarta Sans',sans-serif; color:var(--navy);">TOTAL</td>
                    <td style="color:var(--sky); font-weight:800;"><?= $grandTrx ?> order</td>
                    <td style="color:#16a34a; font-weight:700;">−Rp <?= number_format($grandDisk, 0, ',', '.') ?></td>
                    <td style="color:var(--tosca); font-size:15px; font-weight:800;">Rp <?= number_format($grandIncome, 0, ',', '.') ?></td>
                    <td></td>
                    <td style="color:var(--text-muted); font-size:12px;">
                        Rp <?= $grandTrx > 0 ? number_format($grandIncome / $grandTrx, 0, ',', '.') : 0 ?>
                    </td>
                </tr>
            </tfoot>
        </table>
        <?php endif; ?>
    </div>
</div>


<!-- ══════════════════════════════════════
     MODAL: Detail Order
══════════════════════════════════════ -->
<div class="modal fade" id="modalDetail" tabindex="-1">
    <div class="modal-dialog modal-dialog-centered modal-lg">
        <div class="modal-content" style="border-radius:20px; border:none; overflow:hidden;">

            <div class="modal-header" style="background:linear-gradient(135deg,var(--navy),#1a2d5c); padding:18px 24px; border:none;">
                <div>
                    <h5 class="modal-title" style="font-family:'Plus Jakarta Sans',sans-serif; font-weight:700; font-size:15px; color:#fff; margin:0;">
                        <i class="bi bi-receipt me-2" style="color:var(--tosca);"></i>Detail Transaksi
                    </h5>
                    <div id="detailKode" style="font-family:monospace; font-size:12px; color:rgba(255,255,255,0.5); margin-top:2px;"></div>
                </div>
                <button type="button" class="btn-close btn-close-white" data-bs-dismiss="modal"></button>
            </div>

            <div class="modal-body" style="padding:22px 24px;" id="detailBody">
                <div style="text-align:center; padding:30px; color:var(--text-muted);">
                    <div class="spinner-border spinner-border-sm" style="color:var(--sky);" role="status"></div>
                    <p style="margin-top:10px; font-size:13px;">Memuat data...</p>
                </div>
            </div>

            <div class="modal-footer" style="border-top:1.5px solid var(--border); padding:14px 24px; gap:8px; background:#fafbfe;">
                <button type="button" class="btn btn-light" data-bs-dismiss="modal"
                        style="border-radius:11px; font-size:13px; font-weight:600; border:1.5px solid var(--border);">
                    Tutup
                </button>
                <a href="#" id="btnStrukModal" target="_blank"
                   style="border-radius:11px; padding:9px 20px; background:linear-gradient(135deg,var(--sky),var(--tosca)); color:#fff; font-weight:700; font-size:13px; text-decoration:none; display:inline-flex; align-items:center; gap:7px; box-shadow:0 4px 14px rgba(75,163,195,0.35);">
                    <i class="bi bi-printer-fill"></i> Cetak Struk
                </a>
            </div>
        </div>
    </div>
</div>


<script>
/* ── Search ── */
document.getElementById('searchTransaksi')?.addEventListener('input', function () {
    const q = this.value.toLowerCase();
    document.querySelectorAll('#tabelTransaksi tbody tr').forEach(row => {
        row.style.display = row.textContent.toLowerCase().includes(q) ? '' : 'none';
    });
});

/* ── Detail Modal (AJAX) ── */
function lihatDetail(idOrder) {
    const modal = new bootstrap.Modal(document.getElementById('modalDetail'));
    document.getElementById('detailKode').textContent = 'Memuat...';
    document.getElementById('detailBody').innerHTML = `
        <div style="text-align:center; padding:36px; color:var(--text-muted);">
            <div class="spinner-border" style="color:var(--sky); width:2rem; height:2rem;" role="status"></div>
            <p style="margin-top:12px; font-size:13px;">Mengambil data transaksi...</p>
        </div>`;
    modal.show();

    fetch('<?= base_url('laporan/detail/') ?>' + idOrder, {
        headers: { 'X-Requested-With': 'XMLHttpRequest' }
    })
    .then(r => r.json())
    .then(data => {
        if (!data.success) {
            document.getElementById('detailBody').innerHTML = '<p style="color:#ef4444; text-align:center; padding:24px;">Data tidak ditemukan.</p>';
            return;
        }

        const o = data.order;
        const d = data.details;

        document.getElementById('detailKode').textContent = o.kode_order;
        document.getElementById('btnStrukModal').href = '<?= base_url('transaksi/struk/') ?>' + o.id_order;

        // Info grid
        const infoItems = [
            ['bi-person-circle', 'var(--sky)', 'Pelanggan', (o.nama_customer || 'Guest') + (o.telp && o.telp !== '-' ? `<br><span style="font-size:11px;color:var(--text-muted);">${o.telp}</span>` : '')],
            ['bi-grid-3x3-gap-fill', 'var(--tosca)', 'Meja', o.nomor_meja ? 'Meja ' + o.nomor_meja : 'Dine In'],
            ['bi-person-badge-fill', 'var(--purple)', 'Kasir', o.kasir || '-'],
            ['bi-clock-fill', 'var(--yellow)', 'Waktu', formatTgl(o.created_at)],
            ['bi-credit-card-fill', '#22c55e', 'Metode Bayar', (o.metode_bayar || '-').toUpperCase()],
            o.nama_promo ? ['bi-ticket-perforated-fill', '#f97316', 'Promo', o.nama_promo] : null,
        ].filter(Boolean);

        let infoHtml = '<div style="display:grid; grid-template-columns:repeat(auto-fill,minmax(150px,1fr)); gap:10px; margin-bottom:20px;">';
        infoItems.forEach(([icon, color, label, val]) => {
            infoHtml += `
            <div style="background:var(--bg); border-radius:13px; padding:12px 14px; border:1.5px solid var(--border);">
                <div style="font-size:10.5px; font-weight:700; color:var(--text-muted); text-transform:uppercase; letter-spacing:0.6px; margin-bottom:5px; display:flex; align-items:center; gap:5px;">
                    <i class="bi ${icon}" style="color:${color};"></i>${label}
                </div>
                <div style="font-size:13px; font-weight:600; color:var(--dark);">${val}</div>
            </div>`;
        });
        infoHtml += '</div>';

        // Items
        let itemsHtml = '<div style="font-size:10.5px; font-weight:700; color:var(--text-muted); text-transform:uppercase; letter-spacing:0.7px; margin-bottom:10px;">Detail Pesanan</div>';
        let subtotal = 0;
        const rowColors = ['var(--sky)','var(--tosca)','var(--purple)','var(--yellow)','#22c55e','#f97316'];
        d.forEach((item, i) => {
            subtotal += parseFloat(item.subtotal);
            const rc = rowColors[i % rowColors.length];
            itemsHtml += `
            <div style="display:flex; align-items:center; gap:11px; padding:10px 0; border-bottom:1px solid var(--border);">
                <div style="width:28px; height:28px; border-radius:9px; background:${rc}20; color:${rc}; font-size:12px; font-weight:800; display:flex; align-items:center; justify-content:center; flex-shrink:0; border:1.5px solid ${rc}30;">${i+1}</div>
                <div style="flex:1;">
                    <div style="font-weight:700; font-size:13px; color:var(--dark);">${item.nama_menu}</div>
                    ${item.catatan ? `<div style="font-size:11px; color:var(--text-muted);">📝 ${item.catatan}</div>` : ''}
                    <div style="font-size:11.5px; color:var(--text-muted);">Rp ${fRp(item.harga_satuan)} × ${item.qty}</div>
                </div>
                <div style="font-weight:800; color:var(--dark); white-space:nowrap; font-family:'Plus Jakarta Sans',sans-serif;">Rp ${fRp(item.subtotal)}</div>
            </div>`;
        });

        // Totals
        const diskon = parseFloat(o.diskon_nominal) || 0;
        const total  = parseFloat(o.total_harga);
        let totalHtml = `
        <div style="margin-top:16px; padding:14px 16px; background:linear-gradient(135deg,rgba(13,27,62,0.03),rgba(46,196,182,0.05)); border-radius:14px; border:1.5px solid var(--border);">
            <div style="display:flex; justify-content:space-between; font-size:13px; margin-bottom:7px; color:#666;">
                <span>Subtotal</span><span style="font-weight:600; color:var(--dark);">Rp ${fRp(subtotal)}</span>
            </div>
            ${diskon > 0 ? `<div style="display:flex; justify-content:space-between; font-size:13px; margin-bottom:7px; color:#16a34a;">
                <span>Diskon ${o.nama_promo ? '<span style="background:rgba(255,209,102,0.2);padding:1px 7px;border-radius:6px;font-size:11px;">('+o.nama_promo+')</span>' : ''}</span>
                <span style="font-weight:700;">−Rp ${fRp(diskon)}</span>
            </div>` : ''}
            <div style="display:flex; justify-content:space-between; font-size:17px; font-weight:800; margin-top:8px; padding-top:10px; border-top:1.5px dashed var(--border);">
                <span style="color:var(--navy); font-family:'Plus Jakarta Sans',sans-serif;">Total</span>
                <span style="color:var(--tosca);">Rp ${fRp(total)}</span>
            </div>
            ${o.metode_bayar === 'cash' ? `
            <div style="margin-top:10px; display:flex; justify-content:space-between; font-size:12.5px; color:#666; background:#fff; padding:8px 12px; border-radius:10px; border:1px solid var(--border);">
                <span>Dibayar: <b style="color:var(--dark);">Rp ${fRp(o.jumlah_bayar)}</b></span>
                <span>Kembalian: <b style="color:var(--navy);">Rp ${fRp(o.kembalian)}</b></span>
            </div>` : ''}
        </div>`;

        document.getElementById('detailBody').innerHTML = infoHtml + itemsHtml + totalHtml;
    })
    .catch(() => {
        document.getElementById('detailBody').innerHTML = '<p style="color:#ef4444; text-align:center; padding:24px;">Gagal memuat data.</p>';
    });
}

function fRp(n) { return Number(n).toLocaleString('id-ID'); }
function formatTgl(str) {
    if (!str) return '-';
    const d = new Date(str);
    return d.toLocaleDateString('id-ID', {day:'2-digit', month:'short', year:'numeric'})
         + ' ' + d.toLocaleTimeString('id-ID', {hour:'2-digit', minute:'2-digit'});
}
</script>