<!-- views/dashboard/index.php -->
<style>
    /* ══ PALETTE
       --navy:   #0D1B3E
       --sky:    #4BA3C3
       --tosca:  #2EC4B6
       --purple: #9B89C4
       --yellow: #FFD166
       --deep:   #39007E (situational)
    ══════════════════════════════════ */

    .stat-card {
        background: #fff;
        border-radius: 16px;
        padding: 22px 24px;
        border: 1px solid var(--border);
        display: flex;
        align-items: center;
        gap: 16px;
        transition: transform 0.2s, box-shadow 0.2s;
        text-decoration: none;
        color: inherit;
        position: relative;
        overflow: hidden;
    }
    .stat-card::after {
        content: '';
        position: absolute;
        top: 0; left: 0;
        width: 4px;
        height: 100%;
        border-radius: 16px 0 0 16px;
    }
    .stat-card.c-tosca::after  { background: linear-gradient(180deg, #2EC4B6, #4BA3C3); }
    .stat-card.c-sky::after    { background: linear-gradient(180deg, #4BA3C3, #0D1B3E); }
    .stat-card.c-purple::after { background: linear-gradient(180deg, #9B89C4, #39007E); }
    .stat-card.c-yellow::after { background: linear-gradient(180deg, #FFD166, #f0b429); }
    /* Icon bg colors per card */
    .stat-card.c-tosca  .stat-icon { background: linear-gradient(135deg, rgba(46,196,182,0.18), rgba(75,163,195,0.12)); }
    .stat-card.c-sky    .stat-icon { background: linear-gradient(135deg, rgba(75,163,195,0.18), rgba(13,27,62,0.06)); }
    .stat-card.c-purple .stat-icon { background: linear-gradient(135deg, rgba(155,137,196,0.2), rgba(57,0,126,0.08)); }
    .stat-card.c-yellow .stat-icon { background: linear-gradient(135deg, rgba(255,209,102,0.25), rgba(255,209,102,0.08)); }
    .stat-card:hover {
        transform: translateY(-3px);
        box-shadow: 0 8px 24px rgba(13,27,62,0.10);
        color: inherit;
    }
    .stat-icon {
        width: 52px; height: 52px;
        border-radius: 14px;
        display: flex; align-items: center; justify-content: center;
        font-size: 22px;
        flex-shrink: 0;
    }
    .stat-label {
        font-size: 12px;
        font-weight: 600;
        color: var(--text-muted);
        text-transform: uppercase;
        letter-spacing: 0.8px;
        margin-bottom: 4px;
    }
    .stat-value {
        font-family: 'Plus Jakarta Sans', sans-serif;
        font-size: 24px;
        font-weight: 800;
        color: var(--dark);
        line-height: 1;
        margin-bottom: 4px;
    }
    .stat-card.c-tosca  .stat-value { color: #1a8a80; }
    .stat-card.c-sky    .stat-value { color: #1e6e8e; }
    .stat-card.c-purple .stat-value { color: #5a4690; }
    .stat-card.c-yellow .stat-value { color: #8a6200; }
    .stat-sub { font-size: 12px; color: var(--text-muted); }

    .section-card {
        background: #fff;
        border-radius: 16px;
        border: 1px solid var(--border);
        overflow: hidden;
    }
    .section-head {
        padding: 18px 22px;
        border-bottom: 1px solid var(--border);
        display: flex;
        align-items: center;
        justify-content: space-between;
    }
    .section-title {
        font-family: 'Plus Jakarta Sans', sans-serif;
        font-weight: 700;
        font-size: 15px;
        color: var(--dark);
        display: flex;
        align-items: center;
        gap: 8px;
    }
    .section-body { padding: 20px 22px; }

    /* TABLE */
    .trx-table { width: 100%; border-collapse: collapse; }
    .trx-table th {
        font-size: 11px; font-weight: 700; color: var(--text-muted);
        text-transform: uppercase; letter-spacing: 0.8px;
        padding: 0 12px 12px; text-align: left;
        border-bottom: 1px solid var(--border);
    }
    .trx-table td {
        padding: 13px 12px; font-size: 13.5px; color: var(--dark);
        border-bottom: 1px solid #f5f5f7; vertical-align: middle;
    }
    .trx-table tr:last-child td { border-bottom: none; }
    .trx-table tr:hover td { background: #f8fbff; }

    .kode-badge {
        font-family: 'Plus Jakarta Sans', sans-serif;
        font-size: 12px; font-weight: 700;
        color: #1e5f7a;
        background: rgba(75,163,195,0.12);
        padding: 3px 10px; border-radius: 6px; white-space: nowrap;
    }

    .status-badge { font-size: 11px; font-weight: 600; padding: 4px 10px; border-radius: 20px; white-space: nowrap; }
    .status-done      { background: #d1fae5; color: #065f46; }
    .status-pending   { background: #fef3c7; color: #92400e; }
    .status-process   { background: rgba(75,163,195,0.15); color: #1e5f7a; }
    .status-cancelled { background: #fee2e2; color: #991b1b; }

    /* CALENDAR */
    .calendar-grid { display: grid; grid-template-columns: repeat(7,1fr); gap: 4px; text-align: center; }
    .cal-day-name { font-size: 11px; font-weight: 700; color: var(--text-muted); padding: 6px 0; text-transform: uppercase; letter-spacing: 0.5px; }
    .cal-day {
        aspect-ratio: 1; border-radius: 8px;
        display: flex; align-items: center; justify-content: center;
        font-size: 13px; font-weight: 500; color: var(--dark); cursor: default;
    }
    /* has-trx → tosca tint */
    .cal-day.has-trx {
        background: rgba(75,163,195,0.15);
        color: #1e7a9a;
        font-weight: 700;
    }
    /* today → navy */
    .cal-day.today {
        background: linear-gradient(135deg, var(--sky), var(--purple));
        color: #fff;
        font-weight: 800;
        box-shadow: 0 4px 12px rgba(75,163,195,0.4);
    }
    .cal-day.empty { opacity: 0; pointer-events: none; }
    .cal-nav { display: flex; align-items: center; justify-content: space-between; margin-bottom: 14px; }
    .cal-nav-title { font-family: 'Plus Jakarta Sans', sans-serif; font-weight: 700; font-size: 14px; color: var(--dark); }

    /* CHART */
    .chart-wrap { position: relative; height: 420px; }

    /* INCOME BARS */
    .income-row { display: flex; align-items: center; padding: 10px 0; border-bottom: 1px solid #f5f5f7; font-size: 13.5px; }
    .income-row:last-child { border-bottom: none; }
    .income-bulan  { color: var(--dark); font-weight: 500; }
    .income-total  { font-family: 'Plus Jakarta Sans', sans-serif; font-weight: 700; color: var(--dark); }
    .income-bar-wrap { flex: 1; margin: 0 14px; }
    .income-bar-bg   { height: 6px; background: var(--border); border-radius: 99px; overflow: hidden; }
    /* bar → tosca→sky */
    .income-bar-fill { height: 100%; background: linear-gradient(90deg, #9B89C4, #FFD166); border-radius: 99px; }

    .legend-dot { width: 10px; height: 10px; border-radius: 3px; display: inline-block; margin-right: 6px; }
</style>

<?php
function rp($n) { return 'Rp ' . number_format($n, 0, ',', '.'); }
$bulanNames      = ['Januari','Februari','Maret','April','Mei','Juni','Juli','Agustus','September','Oktober','November','Desember'];
$now             = new DateTime();
$todayDay        = (int)$now->format('j');
$monthName       = $bulanNames[(int)$now->format('n') - 1];
$year            = $now->format('Y');
$firstDayOfMonth = new DateTime("$year-{$now->format('m')}-01");
$startOffset     = (int)$firstDayOfMonth->format('N');
$daysInMonth     = (int)$now->format('t');
?>

<!-- STAT CARDS -->
<div class="row g-3 mb-4">
    <div class="col-12 col-sm-6 col-xl-3">
        <div class="stat-card c-tosca">
            <div class="stat-icon" style="background:linear-gradient(135deg,rgba(46,196,182,0.15),rgba(75,163,195,0.15));"><i class="bi bi-cash-coin" style="color:#2EC4B6; font-size:24px;"></i></div>
            <div>
                <div class="stat-label">Pemasukan Hari Ini</div>
                <div class="stat-value"><?= rp($pemasukanHariIni) ?></div>
                <div class="stat-sub">dari <?= $totalTransaksiHariIni ?> transaksi</div>
            </div>
        </div>
    </div>
    <div class="col-12 col-sm-6 col-xl-3">
        <div class="stat-card c-sky">
            <div class="stat-icon" style="background:linear-gradient(135deg,rgba(75,163,195,0.15),rgba(13,27,62,0.08));"><i class="bi bi-receipt" style="color:#4BA3C3; font-size:24px;"></i></div>
            <div>
                <div class="stat-label">Transaksi Hari Ini</div>
                <div class="stat-value"><?= $totalTransaksiHariIni ?></div>
                <div class="stat-sub">order selesai</div>
            </div>
        </div>
    </div>
    <div class="col-12 col-sm-6 col-xl-3">
        <div class="stat-card c-purple">
            <div class="stat-icon" style="background:linear-gradient(135deg,rgba(155,137,196,0.18),rgba(57,0,126,0.08));"><i class="bi bi-journal-bookmark-fill" style="color:#9B89C4; font-size:24px;"></i></div>
            <div>
                <div class="stat-label">Menu Aktif</div>
                <div class="stat-value"><?= $menuAktif ?></div>
                <div class="stat-sub">item tersedia</div>
            </div>
        </div>
    </div>
    <div class="col-12 col-sm-6 col-xl-3">
        <div class="stat-card c-yellow">
            <div class="stat-icon" style="background:linear-gradient(135deg,rgba(255,209,102,0.2),rgba(255,209,102,0.05));"><i class="bi bi-grid-3x3-gap" style="color:#c49800; font-size:24px;"></i></div>
            <div>
                <div class="stat-label">Meja Tersedia</div>
                <div class="stat-value"><?= $mejaTersedia ?></div>
                <div class="stat-sub">siap digunakan</div>
            </div>
        </div>
    </div>
</div>

<!-- ROW 2: Grafik + Kalender -->
<div class="row g-3 mb-4">
    <!-- Grafik -->
    <div class="col-12 col-xl-8">
        <div class="section-card h-100">
            <div class="section-head">
                <div class="section-title"><i class="bi bi-graph-up-arrow me-2" style="color:var(--sky);"></i> Tren Pemasukan 30 Hari Terakhir</div>
                <div style="font-size:12px; color:var(--text-muted); display:flex; align-items:center;">
                    <span class="legend-dot" style="background:#39007E;"></span> Pemasukan
                </div>
            </div>
            <div class="section-body">
                <div class="chart-wrap">
                    <canvas id="chartPemasukan"></canvas>
                </div>
            </div>
        </div>
    </div>

    <!-- Kalender -->
    <div class="col-12 col-xl-4">
        <div class="section-card h-100">
            <div class="section-head">
                <div class="section-title"><i class="bi bi-calendar-week me-2" style="color:var(--purple);"></i> Kalender Transaksi</div>
            </div>
            <div class="section-body">
                <!-- Dynamic calendar nav -->
                <div class="cal-nav">
                    <div style="display:flex;align-items:center;gap:6px;">
                        <button onclick="calPrev()" style="width:28px;height:28px;border-radius:8px;border:1px solid var(--border);background:#fff;cursor:pointer;display:flex;align-items:center;justify-content:center;color:var(--text-muted);transition:all 0.2s;" onmouseover="this.style.background='var(--bg)'" onmouseout="this.style.background='#fff'">
                            <i class="bi bi-chevron-left" style="font-size:12px;"></i>
                        </button>
                        <div class="cal-nav-title" id="calTitle"></div>
                        <button onclick="calNext()" style="width:28px;height:28px;border-radius:8px;border:1px solid var(--border);background:#fff;cursor:pointer;display:flex;align-items:center;justify-content:center;color:var(--text-muted);transition:all 0.2s;" onmouseover="this.style.background='var(--bg)'" onmouseout="this.style.background='#fff'">
                            <i class="bi bi-chevron-right" style="font-size:12px;"></i>
                        </button>
                    </div>
                    <div style="display:flex;gap:6px;align-items:center;">
                        <div style="width:10px;height:10px;border-radius:3px;background:rgba(75,163,195,0.2);border:1px solid rgba(75,163,195,0.4);"></div>
                        <span style="font-size:11px;color:var(--text-muted);">Ada transaksi</span>
                    </div>
                </div>

                <div class="calendar-grid" id="calGrid"></div>

                <div style="margin-top:16px; padding-top:14px; border-top:1px solid var(--border); display:flex; gap:14px; flex-wrap:wrap;">
                    <div style="display:flex;align-items:center;gap:6px;font-size:12px;color:var(--text-muted);">
                        <div style="width:24px;height:24px;border-radius:7px;background:var(--navy);display:flex;align-items:center;justify-content:center;color:#fff;font-size:10px;font-weight:800;" id="todayLegend"></div>
                        Hari ini
                    </div>
                    <div style="display:flex;align-items:center;gap:6px;font-size:12px;color:var(--text-muted);">
                        <div style="width:24px;height:24px;border-radius:7px;background:rgba(75,163,195,0.13);border:1px solid rgba(75,163,195,0.3);display:flex;align-items:center;justify-content:center;color:#1e7a9a;font-size:14px;font-weight:800;">•</div>
                        Ada transaksi
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>

<!-- ROW 3: Income + Transaksi Terakhir -->
<div class="row g-3">
    <!-- Income per Bulan -->
    <div class="col-12 col-xl-4">
        <div class="section-card h-100">
            <div class="section-head">
                <div class="section-title"><i class="bi bi-currency-dollar me-2" style="color:var(--yellow); filter:brightness(0.8);"></i> Income per Bulan <?= $year ?></div>
            </div>
            <div class="section-body">
                <?php
                $incLbl = json_decode($incomeLabel, true);
                $incDat = json_decode($incomeData,  true);
                $maxInc = !empty($incDat) ? max($incDat) : 1;
                if ($maxInc == 0) $maxInc = 1;
                if (empty($incDat)): ?>
                    <div style="text-align:center; padding:30px 0; color:var(--text-muted);">
                        <div style="font-size:32px; margin-bottom:8px;">📭</div>
                        <div style="font-size:13px;">Belum ada data income tahun ini.</div>
                    </div>
                <?php else:
                    foreach ($incLbl as $i => $bulan):
                        $pct = ($incDat[$i] / $maxInc) * 100; ?>
                    <div class="income-row">
                        <div class="income-bulan" style="width:40px;"><?= $bulan ?></div>
                        <div class="income-bar-wrap">
                            <div class="income-bar-bg">
                                <div class="income-bar-fill" style="width:<?= round($pct) ?>%;"></div>
                            </div>
                        </div>
                        <div class="income-total" style="font-size:12px; white-space:nowrap;"><?= rp($incDat[$i]) ?></div>
                    </div>
                <?php endforeach; endif; ?>
            </div>
        </div>
    </div>

    <!-- Transaksi Terakhir -->
    <div class="col-12 col-xl-8">
        <div class="section-card h-100">
            <div class="section-head">
                <div class="section-title"><i class="bi bi-clock-history me-2" style="color:var(--tosca);"></i> Transaksi Terakhir</div>
                <a href="<?= base_url('laporan') ?>" style="font-size:12px; color:#0e9088; text-decoration:none; font-weight:600;">
                    Lihat semua →
                </a>
            </div>
            <div style="overflow-x:auto;">
                <?php if (empty($transaksiTerakhir)): ?>
                    <div style="text-align:center; padding:40px 0; color:var(--text-muted);">
                        <div style="font-size:36px; margin-bottom:10px;">🧾</div>
                        <div style="font-size:13px;">Belum ada transaksi hari ini.</div>
                        <a href="<?= base_url('transaksi') ?>"
                           style="display:inline-block; margin-top:12px; padding:8px 20px;
                                  background:linear-gradient(135deg,#2EC4B6,#4BA3C3);
                                  color:#fff; border-radius:8px; font-size:13px; font-weight:600; text-decoration:none;">
                            + Buat Transaksi
                        </a>
                    </div>
                <?php else: ?>
                <table class="trx-table">
                    <thead>
                        <tr>
                            <th>Kode Order</th>
                            <th>Meja</th>
                            <th>Customer</th>
                            <?php if (session()->get('role') === 'admin'): ?><th>Kasir</th><?php endif; ?>
                            <th>Total</th>
                            <th>Waktu</th>
                            <th>Status</th>
                        </tr>
                    </thead>
                    <tbody>
                        <?php foreach ($transaksiTerakhir as $trx): ?>
                        <tr>
                            <td><span class="kode-badge"><?= esc($trx['kode_order']) ?></span></td>
                            <td><span style="font-weight:600;">Meja <?= esc($trx['nomor_meja']) ?></span></td>
                            <td>
                                <?php if ($trx['customer']): ?>
                                    <div style="font-weight:500;"><?= esc($trx['customer']) ?></div>
                                <?php else: ?>
                                    <span style="color:var(--text-muted); font-size:12px;">Umum</span>
                                <?php endif; ?>
                            </td>
                            <?php if (session()->get('role') === 'admin'): ?>
                            <td style="color:var(--text-muted); font-size:13px;"><?= esc($trx['kasir']) ?></td>
                            <?php endif; ?>
                            <td>
                                <span style="font-family:'Plus Jakarta Sans',sans-serif; font-weight:700; color:var(--dark);">
                                    <?= rp($trx['total_harga']) ?>
                                </span>
                            </td>
                            <td style="color:var(--text-muted); font-size:12.5px; white-space:nowrap;">
                                <?= date('H:i', strtotime($trx['created_at'])) ?>
                            </td>
                            <td>
                                <?php
                                $statusMap = [
                                    'done'      => ['label'=>'Selesai', 'cls'=>'status-done'],
                                    'pending'   => ['label'=>'Pending', 'cls'=>'status-pending'],
                                    'process'   => ['label'=>'Proses',  'cls'=>'status-process'],
                                    'cancelled' => ['label'=>'Batal',   'cls'=>'status-cancelled'],
                                ];
                                $s = $statusMap[$trx['status']] ?? ['label'=>ucfirst($trx['status']),'cls'=>'status-pending'];
                                ?>
                                <span class="status-badge <?= $s['cls'] ?>"><?= $s['label'] ?></span>
                            </td>
                        </tr>
                        <?php endforeach; ?>
                    </tbody>
                </table>
                <?php endif; ?>
            </div>
        </div>
    </div>
</div>

<!-- CHART JS -->
<script>
document.addEventListener('DOMContentLoaded', function() {

(function() {
    const labels = <?= $grafikLabel ?>;
    const data   = <?= $grafikData ?>;
    if (!labels.length) return;

    const ctx  = document.getElementById('chartPemasukan').getContext('2d');
    const grad = ctx.createLinearGradient(0, 0, 0, 220);
    grad.addColorStop(0, 'rgba(75,163,195,0.3)');
    grad.addColorStop(1, 'rgba(75,163,195,0)');

    new Chart(ctx, {
        type: 'line',
        data: {
            labels,
            datasets: [{
                label: 'Pemasukan',
                data,
                borderColor:          '#4BA3C3',
                backgroundColor:      grad,
                borderWidth:          2.5,
                pointRadius:          3,
                pointHoverRadius:     6,
                pointBackgroundColor: '#4BA3C3',
                tension: 0.4,
                fill: true,
            }]
        },
        options: {
            responsive: true,
            maintainAspectRatio: false,
            plugins: {
                legend: { display: false },
                tooltip: {
                    callbacks: {
                        label: ctx => 'Rp ' + Number(ctx.raw).toLocaleString('id-ID')
                    }
                }
            },
            scales: {
                x: {
                    grid: { display: false },
                    ticks: { font: { size:11, family:'DM Sans' }, color:'#8A8FAB', maxTicksLimit:10, maxRotation:0 },
                    bounds: 'ticks',
                    offset: true,
                },
                y: {
                    grid: { color:'#ECEEF5', lineWidth:1 },
                    border: { dash:[4,4] },
                    ticks: {
                        font: { size:11, family:'DM Sans' },
                        color:'#8A8FAB',
                        callback: v => {
                            if (v >= 1000000) return 'Rp ' + (v/1000000).toFixed(1) + 'jt';
                            if (v >= 1000)    return 'Rp ' + (v/1000).toFixed(0) + 'rb';
                            return 'Rp ' + v;
                        }
                    }
                }
            }
        }
    });
})();

// ── Dynamic Calendar ──────────────────────────────────
const hariAktif = <?= json_encode($hariAktif) ?>.map(Number);
const todayReal   = new Date();
let   calYear     = todayReal.getFullYear();
let   calMonth    = todayReal.getMonth(); // 0-based

const bulanNamesJS = ['Januari','Februari','Maret','April','Mei','Juni','Juli','Agustus','September','Oktober','November','Desember'];
const dayNames     = ['Sen','Sel','Rab','Kam','Jum','Sab','Min'];

function renderCalendar() {
    const title = document.getElementById('calTitle');
    const grid  = document.getElementById('calGrid');
    const leg   = document.getElementById('todayLegend');
    if (!grid) return;

    title.textContent = bulanNamesJS[calMonth] + ' ' + calYear;

    const firstDay   = new Date(calYear, calMonth, 1);
    const daysInMon  = new Date(calYear, calMonth + 1, 0).getDate();
    // Monday-based offset (getDay: 0=Sun,1=Mon,...6=Sat → Mon=1 → offset=0)
    let offset = firstDay.getDay() - 1;
    if (offset < 0) offset = 6;

    let html = '';
    dayNames.forEach(d => { html += `<div class="cal-day-name">${d}</div>`; });
    for (let i = 0; i < offset; i++) { html += '<div class="cal-day empty"></div>'; }

    const isCurrentMonth = (calYear === todayReal.getFullYear() && calMonth === todayReal.getMonth());

    for (let d = 1; d <= daysInMon; d++) {
        let cls = 'cal-day';
        let extra = '';
        if (isCurrentMonth && d === todayReal.getDate()) {
            cls += ' today';
        } else if (isCurrentMonth && hariAktif.includes(d)) {
            cls += ' has-trx';
            extra = 'title="Ada transaksi"';
        }
        html += `<div class="${cls}" ${extra}>${d}</div>`;
    }

    grid.innerHTML = html;
    if (leg) leg.textContent = todayReal.getDate();
}

function calPrev() { calMonth--; if (calMonth < 0) { calMonth = 11; calYear--; } renderCalendar(); }
function calNext() { calMonth++; if (calMonth > 11) { calMonth = 0; calYear++; } renderCalendar(); }
window.calPrev = calPrev;
window.calNext = calNext;

renderCalendar();

}); // end DOMContentLoaded
</script>