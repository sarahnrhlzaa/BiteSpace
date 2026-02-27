<?php
/**
 * View: transaksi/struk.php
 * Simpan di: app/Views/transaksi/struk.php
 */
?>

<style>
.struk-wrap {
    max-width: 680px;
    margin: 0 auto;
}

.struk-actions {
    display: flex;
    gap: 10px;
    margin-bottom: 20px;
    flex-wrap: wrap;
}

/* ── Struk Card ── */
.struk-card {
    background: #fff;
    border-radius: 20px;
    border: 1px solid var(--border);
    box-shadow: 0 4px 24px rgba(13,27,62,0.08);
    overflow: hidden;
}

.struk-top {
    background: linear-gradient(135deg, var(--navy) 0%, #1a2d5c 100%);
    padding: 28px 32px 24px;
    text-align: center;
    position: relative;
    overflow: hidden;
}

.struk-top::before {
    content: '';
    position: absolute;
    width: 200px; height: 200px;
    border-radius: 50%;
    background: rgba(75,163,195,0.12);
    top: -60px; right: -40px;
}

.struk-top::after {
    content: '';
    position: absolute;
    width: 150px; height: 150px;
    border-radius: 50%;
    background: rgba(46,196,182,0.1);
    bottom: -50px; left: -20px;
}

.struk-brand {
    font-family: 'Plus Jakarta Sans', sans-serif;
    font-size: 26px;
    font-weight: 800;
    background: linear-gradient(90deg, var(--sky), var(--tosca), var(--yellow));
    -webkit-background-clip: text;
    -webkit-text-fill-color: transparent;
    background-clip: text;
    margin-bottom: 4px;
    position: relative;
    z-index: 1;
}

.struk-tagline {
    font-size: 12px;
    color: rgba(255,255,255,0.5);
    margin-bottom: 16px;
    position: relative;
    z-index: 1;
}

.struk-kode {
    display: inline-block;
    background: rgba(255,255,255,0.1);
    border: 1px solid rgba(255,255,255,0.2);
    color: #fff;
    border-radius: 10px;
    padding: 6px 18px;
    font-size: 13px;
    font-weight: 700;
    letter-spacing: 1px;
    font-family: monospace;
    position: relative;
    z-index: 1;
}

/* Zigzag separator */
.struk-zigzag {
    height: 20px;
    background:
        radial-gradient(circle at 10px 0, transparent 10px, #fff 10px) -10px 0 / 20px 20px,
        radial-gradient(circle at 0 0, #fff 10px, transparent 10px) 0 0 / 20px 20px;
    background-color: var(--navy);
}

.struk-body {
    padding: 24px 32px;
}

/* Info Row */
.info-grid {
    display: grid;
    grid-template-columns: 1fr 1fr;
    gap: 12px;
    margin-bottom: 20px;
    padding-bottom: 20px;
    border-bottom: 1px dashed var(--border);
}

.info-item {
    background: var(--bg);
    border-radius: 12px;
    padding: 12px 14px;
}

.info-item-label {
    font-size: 11px;
    font-weight: 700;
    color: var(--text-muted);
    text-transform: uppercase;
    letter-spacing: 0.6px;
    margin-bottom: 4px;
}

.info-item-val {
    font-size: 13.5px;
    font-weight: 600;
    color: var(--dark);
}

/* Order Items */
.struk-items-title {
    font-family: 'Plus Jakarta Sans', sans-serif;
    font-size: 13px;
    font-weight: 700;
    color: var(--text-muted);
    text-transform: uppercase;
    letter-spacing: 0.8px;
    margin-bottom: 12px;
}

.struk-item {
    display: flex;
    align-items: center;
    gap: 12px;
    padding: 10px 0;
    border-bottom: 1px solid var(--border);
}

.struk-item:last-child { border-bottom: none; }

.struk-item-num {
    width: 28px; height: 28px;
    border-radius: 8px;
    background: linear-gradient(135deg, var(--sky), var(--tosca));
    color: #fff;
    font-size: 12px;
    font-weight: 700;
    display: flex;
    align-items: center;
    justify-content: center;
    flex-shrink: 0;
}

.struk-item-info { flex: 1; }
.struk-item-name {
    font-size: 13.5px;
    font-weight: 600;
    color: var(--dark);
    font-family: 'Plus Jakarta Sans', sans-serif;
}

.struk-item-note {
    font-size: 11.5px;
    color: var(--text-muted);
    margin-top: 2px;
}

.struk-item-qty {
    font-size: 12px;
    color: var(--text-muted);
    white-space: nowrap;
}

.struk-item-sub {
    font-size: 13.5px;
    font-weight: 700;
    color: var(--dark);
    white-space: nowrap;
}

/* Total area */
.struk-total-area {
    margin-top: 16px;
    padding-top: 16px;
    border-top: 2px dashed var(--border);
}

.struk-total-row {
    display: flex;
    justify-content: space-between;
    font-size: 13.5px;
    margin-bottom: 8px;
    color: #555;
}

.struk-total-row .lbl { font-weight: 500; }
.struk-total-row .val { font-weight: 600; color: var(--dark); }

.struk-total-row.main-row {
    font-size: 18px;
    padding-top: 10px;
    margin-top: 4px;
    border-top: 1px solid var(--border);
}
.struk-total-row.main-row .lbl { font-weight: 800; color: var(--navy); font-family: 'Plus Jakarta Sans', sans-serif; }
.struk-total-row.main-row .val { font-weight: 800; color: var(--tosca); }

/* Payment Badge */
.pay-badge {
    display: inline-flex;
    align-items: center;
    gap: 6px;
    padding: 5px 14px;
    border-radius: 20px;
    font-size: 12px;
    font-weight: 700;
    text-transform: uppercase;
    letter-spacing: 0.5px;
}

.pay-badge.cash   { background: rgba(34,197,94,0.12);  color: #16a34a; }
.pay-badge.debit  { background: rgba(75,163,195,0.12); color: var(--sky); }
.pay-badge.qris   { background: rgba(155,137,196,0.12); color: var(--purple); }

/* Footer struk */
.struk-footer {
    text-align: center;
    padding: 20px 32px 28px;
    border-top: 1px dashed var(--border);
}

.struk-thanks {
    font-family: 'Plus Jakarta Sans', sans-serif;
    font-size: 15px;
    font-weight: 700;
    color: var(--navy);
    margin-bottom: 4px;
}

.struk-footnote {
    font-size: 12px;
    color: var(--text-muted);
}

@media print {
    .struk-actions { display: none !important; }
    .topbar, .sidebar, .main-wrap > .topbar { display: none !important; }
    .struk-card { box-shadow: none; border: 1px solid #ddd; }
    body { background: #fff !important; }
}
</style>

<div class="struk-wrap">

    <!-- Actions -->
    <div class="struk-actions">
        <a href="<?= base_url('transaksi') ?>"
           class="btn btn-light"
           style="border-radius:11px; font-weight:600; font-size:13px; border:1.5px solid var(--border);">
            <i class="bi bi-plus-circle me-2"></i>Transaksi Baru
        </a>
        <button onclick="window.print()"
                class="btn btn-light"
                style="border-radius:11px; font-weight:600; font-size:13px; border:1.5px solid var(--border);">
            <i class="bi bi-printer me-2"></i>Print Struk
        </button>
        <?php if (session()->get('role') === 'admin'): ?>
        <a href="<?= base_url('laporan') ?>"
           class="btn btn-light"
           style="border-radius:11px; font-weight:600; font-size:13px; border:1.5px solid var(--border);">
            <i class="bi bi-bar-chart-line me-2"></i>Lihat Laporan
        </a>
        <?php endif; ?>
    </div>

    <!-- Struk Card -->
    <div class="struk-card">

        <!-- Header -->
        <div class="struk-top">
            <div class="struk-brand">🍽️ BiteSpace</div>
            <div class="struk-tagline">Terima kasih telah makan di tempat kami</div>
            <div class="struk-kode"><?= esc($order['kode_order']) ?></div>
        </div>
        <div class="struk-zigzag"></div>

        <!-- Body -->
        <div class="struk-body">

            <!-- Info Grid -->
            <div class="info-grid">
                <div class="info-item">
                    <div class="info-item-label"><i class="bi bi-person-circle me-1"></i>Pelanggan</div>
                    <div class="info-item-val"><?= esc($order['nama_customer'] ?? 'Guest') ?></div>
                    <?php if (!empty($order['telp']) && $order['telp'] !== '-'): ?>
                        <div style="font-size:11.5px; color:var(--text-muted);"><?= esc($order['telp']) ?></div>
                    <?php endif; ?>
                </div>
                <div class="info-item">
                    <div class="info-item-label"><i class="bi bi-grid-3x3-gap me-1"></i>Meja</div>
                    <div class="info-item-val"><?= $order['nomor_meja'] ? 'Meja ' . esc($order['nomor_meja']) : 'Dine In' ?></div>
                </div>
                <div class="info-item">
                    <div class="info-item-label"><i class="bi bi-person-fill me-1"></i>Kasir</div>
                    <div class="info-item-val"><?= esc($order['kasir']) ?></div>
                </div>
                <div class="info-item">
                    <div class="info-item-label"><i class="bi bi-clock me-1"></i>Waktu</div>
                    <div class="info-item-val"><?= date('d/m/Y H:i', strtotime($order['created_at'])) ?></div>
                </div>
            </div>

            <!-- Items -->
            <div class="struk-items-title">Detail Pesanan</div>

            <?php foreach ($details as $i => $item): ?>
            <div class="struk-item">
                <div class="struk-item-num"><?= $i + 1 ?></div>
                <div class="struk-item-info">
                    <div class="struk-item-name"><?= esc($item['nama_menu']) ?></div>
                    <?php if (!empty($item['catatan'])): ?>
                        <div class="struk-item-note">📝 <?= esc($item['catatan']) ?></div>
                    <?php endif; ?>
                    <div style="font-size:11.5px; color:var(--text-muted);">Rp <?= number_format($item['harga_satuan'], 0, ',', '.') ?> / pcs</div>
                </div>
                <div style="text-align:right; flex-shrink:0;">
                    <div class="struk-item-qty">×<?= $item['qty'] ?></div>
                    <div class="struk-item-sub">Rp <?= number_format($item['subtotal'], 0, ',', '.') ?></div>
                </div>
            </div>
            <?php endforeach; ?>

            <!-- Totals -->
            <div class="struk-total-area">
                <?php
                $subtotal = array_sum(array_column($details, 'subtotal'));
                ?>
                <div class="struk-total-row">
                    <span class="lbl">Subtotal</span>
                    <span class="val">Rp <?= number_format($subtotal, 0, ',', '.') ?></span>
                </div>

                <?php if ($order['diskon_nominal'] > 0): ?>
                <div class="struk-total-row">
                    <span class="lbl" style="color:#22c55e;">
                        Diskon
                        <?php if (!empty($order['nama_promo'])): ?>
                            <span style="font-size:11px; background:rgba(34,197,94,0.1); padding:2px 8px; border-radius:8px;"><?= esc($order['nama_promo']) ?></span>
                        <?php endif; ?>
                    </span>
                    <span class="val" style="color:#22c55e;">- Rp <?= number_format($order['diskon_nominal'], 0, ',', '.') ?></span>
                </div>
                <?php endif; ?>

                <div class="struk-total-row main-row">
                    <span class="lbl">Total</span>
                    <span class="val">Rp <?= number_format($order['total_harga'], 0, ',', '.') ?></span>
                </div>

                <?php if ($payment): ?>
                <div style="margin-top:14px; display:flex; justify-content:space-between; align-items:center; flex-wrap:wrap; gap:10px;">
                    <div>
                        <div style="font-size:11.5px; color:var(--text-muted); margin-bottom:4px;">Metode Pembayaran</div>
                        <span class="pay-badge <?= $payment['metode_bayar'] ?>">
                            <?php
                                $icons = ['cash' => '💵', 'debit' => '💳', 'qris' => '📱'];
                                echo $icons[$payment['metode_bayar']] ?? '💰';
                            ?>
                            <?= strtoupper($payment['metode_bayar']) ?>
                        </span>
                    </div>

                    <?php if ($payment['metode_bayar'] === 'cash'): ?>
                    <div style="text-align:right;">
                        <div style="font-size:12px; color:var(--text-muted);">
                            Dibayar: <b>Rp <?= number_format($payment['jumlah_bayar'], 0, ',', '.') ?></b>
                        </div>
                        <div style="font-size:12px; color:var(--text-muted);">
                            Kembalian: <b style="color:var(--navy);">Rp <?= number_format($payment['kembalian'], 0, ',', '.') ?></b>
                        </div>
                    </div>
                    <?php endif; ?>
                </div>
                <?php endif; ?>

                <?php if (!empty($order['catatan'])): ?>
                <div style="margin-top:14px; padding:10px 14px; background:rgba(255,209,102,0.1); border-radius:10px; border-left:3px solid var(--yellow); font-size:12.5px; color:#6b5a00;">
                    <i class="bi bi-sticky-fill me-2" style="color:var(--yellow);"></i><?= esc($order['catatan']) ?>
                </div>
                <?php endif; ?>
            </div>
        </div>

        <!-- Footer -->
        <div class="struk-footer">
            <div class="struk-thanks">✨ Terima kasih atas kunjungan Anda!</div>
            <div class="struk-footnote">Selamat menikmati dan sampai jumpa kembali 🙏</div>
            <div style="margin-top:10px; font-size:10.5px; color:#bbb; font-family:monospace;">
                <?= date('Y-m-d H:i:s') ?> · <?= esc($order['kode_order']) ?>
            </div>
        </div>

    </div>
</div>