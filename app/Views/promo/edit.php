<!-- views/promo/edit.php -->
<style>
    .form-card {
        background: #fff; border-radius: 16px; border: 1px solid var(--border);
        overflow: hidden; max-width: 760px;
    }
    .form-card-head {
        padding: 20px 24px; border-bottom: 1px solid var(--border);
        display: flex; align-items: center; gap: 10px;
    }
    .form-card-title { font-family: 'Plus Jakarta Sans', sans-serif; font-weight: 700; font-size: 15px; color: var(--dark); }
    .form-card-body { padding: 24px; }

    .form-label {
        font-family: 'Plus Jakarta Sans', sans-serif; font-weight: 700;
        font-size: 12px; color: var(--dark); margin-bottom: 7px;
        display: flex; align-items: center; gap: 5px;
    }
    .form-label .req { color: #ef4444; }
    .form-label .hint { font-weight: 400; color: var(--text-muted); font-size: 11px; }

    .form-control-bs {
        width: 100%; height: 42px; padding: 0 14px;
        border: 1.5px solid var(--border); border-radius: 10px;
        font-size: 13.5px; font-family: 'DM Sans', sans-serif;
        color: var(--dark); background: #fff; transition: all 0.2s; outline: none;
    }
    .form-control-bs:focus { border-color: #2EC4B6; box-shadow: 0 0 0 3px rgba(46,196,182,0.12); }
    textarea.form-control-bs { height: auto; padding: 12px 14px; resize: vertical; }

    .input-group-bs { position: relative; }
    .input-prefix {
        position: absolute; left: 0; top: 0; bottom: 0;
        display: flex; align-items: center; padding: 0 12px;
        font-size: 13px; font-weight: 600; color: var(--text-muted);
        background: var(--bg); border-radius: 10px 0 0 10px;
        border: 1.5px solid var(--border); border-right: none; white-space: nowrap;
    }
    .input-with-prefix { padding-left: 52px !important; }
    .input-with-prefix-wide { padding-left: 40px !important; }

    .tipe-selector { display: flex; gap: 10px; }
    .tipe-btn {
        flex: 1; padding: 12px; border-radius: 10px; border: 2px solid var(--border);
        background: #fff; cursor: pointer; transition: all 0.2s; text-align: center;
        font-family: 'Plus Jakarta Sans', sans-serif; font-weight: 600; font-size: 13px;
        color: var(--text-muted);
    }
    .tipe-btn:hover { border-color: #2EC4B6; color: var(--dark); }
    .tipe-btn.selected-percent { border-color: #2EC4B6; background: rgba(46,196,182,0.06); color: #0d6b63; }
    .tipe-btn.selected-nominal { border-color: #FFD166; background: rgba(255,209,102,0.08); color: #7a5800; }
    .tipe-btn .tipe-icon { font-size: 22px; margin-bottom: 4px; }
    .tipe-btn input[type=radio] { display: none; }

    .divider-label {
        font-size: 11px; font-weight: 700; color: var(--text-muted);
        text-transform: uppercase; letter-spacing: 1px;
        display: flex; align-items: center; gap: 10px; margin: 20px 0 16px;
    }
    .divider-label::before, .divider-label::after { content: ''; flex: 1; height: 1px; background: var(--border); }

    .btn-submit-bs {
        display: inline-flex; align-items: center; gap: 8px; padding: 11px 28px;
        background: linear-gradient(135deg, #2EC4B6, #4BA3C3); color: #fff;
        border: none; border-radius: 10px;
        font-family: 'Plus Jakarta Sans', sans-serif; font-weight: 700; font-size: 14px;
        cursor: pointer; transition: all 0.2s; box-shadow: 0 4px 12px rgba(46,196,182,0.25);
    }
    .btn-submit-bs:hover { filter: brightness(1.06); transform: translateY(-1px); }

    .btn-back-bs {
        display: inline-flex; align-items: center; gap: 8px; padding: 11px 20px;
        background: #fff; color: var(--dark); border: 1.5px solid var(--border);
        border-radius: 10px; font-family: 'Plus Jakarta Sans', sans-serif;
        font-weight: 600; font-size: 14px; text-decoration: none; transition: all 0.2s;
    }
    .btn-back-bs:hover { background: var(--bg); color: var(--dark); }

    .toggle-switch { position: relative; display: inline-block; width: 44px; height: 24px; }
    .toggle-switch input { opacity: 0; width: 0; height: 0; }
    .toggle-slider { position: absolute; cursor: pointer; inset: 0; background: #CBD5E0; border-radius: 24px; transition: 0.3s; }
    .toggle-slider::before { content: ''; position: absolute; width: 18px; height: 18px; border-radius: 50%; background: #fff; left: 3px; top: 3px; transition: 0.3s; box-shadow: 0 1px 4px rgba(0,0,0,0.15); }
    .toggle-switch input:checked + .toggle-slider { background: #2EC4B6; }
    .toggle-switch input:checked + .toggle-slider::before { transform: translateX(20px); }
</style>

<div style="margin-bottom:20px;">
    <a href="<?= base_url('promo') ?>" class="btn-back-bs">
        <i class="bi bi-arrow-left"></i> Kembali
    </a>
</div>

<div class="form-card">
    <div class="form-card-head">
        <i class="bi bi-pencil-square" style="color:#4BA3C3; font-size:18px;"></i>
        <div class="form-card-title">Edit Promo — <span style="color:var(--text-muted); font-weight:500;"><?= esc($promo['kode_promo']) ?></span></div>
    </div>
    <div class="form-card-body">

        <?php if (session()->getFlashdata('error')): ?>
        <div class="alert alert-danger d-flex align-items-center gap-2 mb-4" style="border-radius:10px; font-size:13.5px;">
            <i class="bi bi-exclamation-circle-fill"></i>
            <?= session()->getFlashdata('error') ?>
        </div>
        <?php endif; ?>

        <form action="<?= base_url('promo/update/' . $promo['id_promo']) ?>" method="POST">
            <?= csrf_field() ?>

            <div class="row g-3 mb-3">
                <div class="col-md-4">
                    <label class="form-label">Kode Promo <span class="req">*</span></label>
                    <input type="text" name="kode_promo" class="form-control-bs"
                           value="<?= esc(old('kode_promo', $promo['kode_promo'])) ?>"
                           style="text-transform:uppercase;" maxlength="20" required>
                </div>
                <div class="col-md-8">
                    <label class="form-label">Nama Promo <span class="req">*</span></label>
                    <input type="text" name="nama_promo" class="form-control-bs"
                           value="<?= esc(old('nama_promo', $promo['nama_promo'])) ?>"
                           maxlength="100" required>
                </div>
            </div>

            <div class="mb-3">
                <label class="form-label">Deskripsi <span class="hint">— opsional</span></label>
                <textarea name="deskripsi" class="form-control-bs" rows="2"
                          maxlength="500"><?= esc(old('deskripsi', $promo['deskripsi'])) ?></textarea>
            </div>

            <div class="divider-label">Detail Diskon</div>

            <?php $tipeVal = old('tipe_diskon', $promo['tipe_diskon']); ?>
            <div class="mb-3">
                <label class="form-label">Tipe Diskon <span class="req">*</span></label>
                <div class="tipe-selector">
                    <label class="tipe-btn <?= $tipeVal === 'percent' ? 'selected-percent' : '' ?>" id="btnPercent" onclick="setTipe('percent')">
                        <input type="radio" name="tipe_diskon" value="percent" <?= $tipeVal === 'percent' ? 'checked' : '' ?>>
                        <div class="tipe-icon">%</div>
                        <div>Persen</div>
                        <div style="font-size:11px; color:inherit; opacity:0.7; margin-top:2px;">Diskon % dari total</div>
                    </label>
                    <label class="tipe-btn <?= $tipeVal === 'nominal' ? 'selected-nominal' : '' ?>" id="btnNominal" onclick="setTipe('nominal')">
                        <input type="radio" name="tipe_diskon" value="nominal" <?= $tipeVal === 'nominal' ? 'checked' : '' ?>>
                        <div class="tipe-icon">Rp</div>
                        <div>Nominal</div>
                        <div style="font-size:11px; color:inherit; opacity:0.7; margin-top:2px;">Potongan langsung Rp</div>
                    </label>
                </div>
            </div>

            <div class="row g-3 mb-3">
                <div class="col-md-4">
                    <label class="form-label">Nilai Diskon <span class="req">*</span></label>
                    <div class="input-group-bs">
                        <span class="input-prefix" id="nilaiPrefix"><?= $tipeVal === 'percent' ? '%' : 'Rp' ?></span>
                        <input type="number" name="nilai_diskon" id="nilaiInput"
                               class="form-control-bs input-with-prefix-wide"
                               value="<?= old('nilai_diskon', $promo['nilai_diskon'] + 0) ?>"
                               min="0.01" step="0.01"
                               <?= $tipeVal === 'percent' ? 'max="100"' : '' ?> required>
                    </div>
                </div>
                <div class="col-md-4">
                    <label class="form-label">Maks Diskon <span class="hint" id="maksHint"><?= $tipeVal === 'percent' ? '— untuk tipe persen' : '— tidak berlaku untuk nominal' ?></span></label>
                    <div class="input-group-bs">
                        <span class="input-prefix">Rp</span>
                        <input type="number" name="maks_diskon" id="maksInput"
                               class="form-control-bs input-with-prefix"
                               value="<?= old('maks_diskon', $promo['maks_diskon'] ? $promo['maks_diskon'] + 0 : '') ?>"
                               min="0" step="1"
                               <?= $tipeVal === 'nominal' ? 'disabled' : '' ?>>
                    </div>
                </div>
                <div class="col-md-4">
                    <label class="form-label">Min Transaksi <span class="req">*</span></label>
                    <div class="input-group-bs">
                        <span class="input-prefix">Rp</span>
                        <input type="number" name="min_transaksi"
                               class="form-control-bs input-with-prefix"
                               value="<?= old('min_transaksi', $promo['min_transaksi'] + 0) ?>"
                               min="0" step="1" required>
                    </div>
                </div>
            </div>

            <div class="divider-label">Periode & Status</div>

            <div class="row g-3 mb-3">
                <div class="col-md-4">
                    <label class="form-label">Tanggal Mulai <span class="req">*</span></label>
                    <input type="date" name="tanggal_mulai" class="form-control-bs"
                           value="<?= old('tanggal_mulai', $promo['tanggal_mulai']) ?>" required>
                </div>
                <div class="col-md-4">
                    <label class="form-label">Tanggal Selesai <span class="req">*</span></label>
                    <input type="date" name="tanggal_selesai" class="form-control-bs"
                           value="<?= old('tanggal_selesai', $promo['tanggal_selesai']) ?>" required>
                </div>
                <div class="col-md-4">
                    <label class="form-label">Status</label>
                    <div style="display:flex; align-items:center; gap:12px; height:42px;">
                        <label class="toggle-switch">
                            <input type="checkbox" name="is_active" value="1"
                                   <?= old('is_active', $promo['is_active']) ? 'checked' : '' ?>>
                            <span class="toggle-slider"></span>
                        </label>
                        <span style="font-size:13px; color:var(--dark);" id="statusLabel">
                            <?= $promo['is_active'] ? 'Aktif' : 'Nonaktif' ?>
                        </span>
                    </div>
                </div>
            </div>

            <div style="display:flex; gap:10px; padding-top:8px;">
                <a href="<?= base_url('promo') ?>" class="btn-back-bs">Batal</a>
                <button type="submit" class="btn-submit-bs">
                    <i class="bi bi-check-lg"></i> Simpan Perubahan
                </button>
            </div>
        </form>
    </div>
</div>

<script>
function setTipe(tipe) {
    const btnP = document.getElementById('btnPercent');
    const btnN = document.getElementById('btnNominal');
    const prefix = document.getElementById('nilaiPrefix');
    const maksInput = document.getElementById('maksInput');
    const maksHint  = document.getElementById('maksHint');

    btnP.className = 'tipe-btn' + (tipe === 'percent' ? ' selected-percent' : '');
    btnN.className = 'tipe-btn' + (tipe === 'nominal' ? ' selected-nominal' : '');
    btnP.querySelector('input').checked = tipe === 'percent';
    btnN.querySelector('input').checked = tipe === 'nominal';

    if (tipe === 'percent') {
        prefix.textContent = '%';
        document.getElementById('nilaiInput').max = 100;
        maksInput.disabled = false;
        maksHint.textContent = '— untuk tipe persen';
    } else {
        prefix.textContent = 'Rp';
        document.getElementById('nilaiInput').removeAttribute('max');
        maksInput.disabled = true;
        maksInput.value = '';
        maksHint.textContent = '— tidak berlaku untuk nominal';
    }
}

document.querySelector('input[name=is_active]').addEventListener('change', function() {
    document.getElementById('statusLabel').textContent = this.checked ? 'Aktif' : 'Nonaktif';
});

document.querySelector('input[name=kode_promo]').addEventListener('input', function() {
    const pos = this.selectionStart;
    this.value = this.value.toUpperCase();
    this.setSelectionRange(pos, pos);
});
</script>