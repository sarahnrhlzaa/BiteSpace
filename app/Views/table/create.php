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

    /* ── Form Card ── */
    .form-card {
        background: #fff;
        border-radius: 16px;
        border: 1px solid var(--border);
        overflow: hidden;
        animation: fadeUp 0.4s ease both;
    }

    .form-card-header {
        padding: 18px 24px;
        border-bottom: 1px solid var(--border);
        display: flex; align-items: center; gap: 10px;
    }

    .form-card-icon {
        width: 36px; height: 36px;
        border-radius: 10px;
        display: flex; align-items: center; justify-content: center;
        font-size: 16px;
    }

    .form-card-title {
        font-family: 'Plus Jakarta Sans', sans-serif;
        font-weight: 700;
        font-size: 15px;
        color: var(--dark);
    }

    .form-card-body { padding: 24px; }

    /* ── Fields ── */
    .field-label {
        font-family: 'Plus Jakarta Sans', sans-serif;
        font-weight: 600;
        font-size: 12.5px;
        color: var(--dark);
        margin-bottom: 7px;
        display: block;
    }

    .field-wrap { position: relative; margin-bottom: 18px; }

    .field-icon {
        position: absolute;
        left: 14px; top: 50%;
        transform: translateY(-50%);
        color: var(--text-muted);
        font-size: 16px;
        pointer-events: none;
    }

    .form-input {
        width: 100%;
        height: 46px;
        padding-left: 42px;
        padding-right: 14px;
        border: 1.5px solid var(--border);
        border-radius: 11px;
        font-size: 13.5px;
        font-family: 'DM Sans', sans-serif;
        color: var(--dark);
        background: #FAFBFD;
        transition: all 0.2s;
    }
    .form-input:focus {
        border-color: var(--sky);
        box-shadow: 0 0 0 3px rgba(75,163,195,0.12);
        background: #fff;
        outline: none;
    }

    .form-select-custom {
        width: 100%;
        height: 46px;
        padding: 0 14px 0 42px;
        border: 1.5px solid var(--border);
        border-radius: 11px;
        font-size: 13.5px;
        font-family: 'DM Sans', sans-serif;
        color: var(--dark);
        background: #FAFBFD;
        appearance: none;
        cursor: pointer;
        transition: all 0.2s;
    }
    .form-select-custom:focus {
        border-color: var(--sky);
        box-shadow: 0 0 0 3px rgba(75,163,195,0.12);
        background: #fff;
        outline: none;
    }

    /* ── Status preview pill ── */
    .status-preview {
        display: inline-flex;
        align-items: center;
        gap: 7px;
        padding: 6px 14px;
        border-radius: 20px;
        font-size: 12.5px;
        font-weight: 700;
        font-family: 'Plus Jakarta Sans', sans-serif;
        transition: all 0.2s;
    }
    .status-preview .dot { width: 8px; height: 8px; border-radius: 50%; }
    .preview-available { background: #ECFDF5; color: #065F46; }
    .preview-available .dot { background: #10B981; }
    .preview-occupied  { background: #FEF2F2; color: #991B1B; }
    .preview-occupied  .dot { background: #EF4444; }
    .preview-reserved  { background: #FFFBEB; color: #92400E; }
    .preview-reserved  .dot { background: #F59E0B; }

    /* ── Capacity pills ── */
    .capacity-pills {
        display: flex;
        gap: 8px;
        flex-wrap: wrap;
        margin-top: 4px;
    }
    .cap-pill {
        width: 52px; height: 52px;
        border-radius: 12px;
        border: 2px solid var(--border);
        background: #FAFBFD;
        font-family: 'Plus Jakarta Sans', sans-serif;
        font-weight: 700;
        font-size: 16px;
        color: var(--text-muted);
        display: flex; align-items: center; justify-content: center;
        cursor: pointer;
        transition: all 0.18s;
        flex-direction: column;
        gap: 2px;
    }
    .cap-pill span { font-size: 9px; font-weight: 500; }
    .cap-pill:hover { border-color: var(--sky); color: var(--sky); background: rgba(75,163,195,0.06); }
    .cap-pill.active {
        border-color: var(--sky);
        background: rgba(75,163,195,0.12);
        color: var(--sky);
    }

    /* ── Area hint box ── */
    .area-hint {
        background: rgba(75,163,195,0.06);
        border: 1px solid rgba(75,163,195,0.2);
        border-radius: 11px;
        padding: 13px 16px;
        margin-bottom: 22px;
        display: flex;
        gap: 10px;
        align-items: flex-start;
    }
    .area-hint i { color: var(--sky); font-size: 15px; margin-top: 1px; flex-shrink: 0; }
    .area-hint p { font-size: 12.5px; color: #1e6e8e; line-height: 1.6; margin: 0; }

    /* ── Buttons ── */
    .btn-save {
        height: 46px;
        padding: 0 28px;
        background: linear-gradient(135deg, var(--sky), var(--tosca));
        color: #fff;
        border: none;
        border-radius: 11px;
        font-family: 'Plus Jakarta Sans', sans-serif;
        font-weight: 700;
        font-size: 14px;
        cursor: pointer;
        display: inline-flex; align-items: center; gap: 8px;
        transition: all 0.2s;
        box-shadow: 0 4px 14px rgba(75,163,195,0.3);
    }
    .btn-save:hover {
        filter: brightness(1.06);
        transform: translateY(-1px);
        box-shadow: 0 8px 20px rgba(75,163,195,0.35);
    }
    .btn-save:active { transform: translateY(0); }

    /* ── Alert ── */
    .alert-err {
        background: #FFF1F0;
        border: 1px solid #FFCCC7;
        color: #C0392B;
        border-radius: 11px;
        padding: 12px 16px;
        margin-bottom: 18px;
        display: flex;
        gap: 10px;
        align-items: flex-start;
        font-size: 13.5px;
    }

    @keyframes fadeUp {
        from { opacity: 0; transform: translateY(14px); }
        to   { opacity: 1; transform: translateY(0); }
    }
</style>

<!-- ── Breadcrumb ── -->
<div style="display:flex;align-items:center;gap:8px;margin-bottom:20px;font-size:13px;color:var(--text-muted);">
    <a href="<?= base_url('table') ?>"
       style="color:var(--sky);text-decoration:none;font-weight:600;display:flex;align-items:center;gap:5px;">
        <i class="bi bi-grid-3x3-gap"></i> Manajemen Meja
    </a>
    <i class="bi bi-chevron-right" style="font-size:11px;"></i>
    <span>Tambah Meja</span>
</div>



<div class="row g-4">

    <!-- ── KIRI: Panduan Area ── -->
    <div class="col-lg-4">

        <!-- Info area -->
        <div class="form-card" style="margin-bottom:16px;">
            <div class="form-card-header">
                <div class="form-card-icon" style="background:rgba(75,163,195,0.1);">
                    <i class="bi bi-map" style="color:var(--sky);"></i>
                </div>
                <div class="form-card-title">Panduan Area</div>
            </div>
            <div class="form-card-body" style="padding:16px 24px;">
                <div style="display:flex;flex-direction:column;gap:12px;">
                    <div style="display:flex;justify-content:space-between;align-items:center;padding-bottom:12px;border-bottom:1px solid var(--border);">
                        <span style="font-size:13px;font-weight:700;font-family:'Plus Jakarta Sans',sans-serif;color:var(--sky);">A</span>
                        <span style="font-size:13px;color:var(--dark);">Area Dalam</span>
                    </div>
                    <div style="display:flex;justify-content:space-between;align-items:center;padding-bottom:12px;border-bottom:1px solid var(--border);">
                        <span style="font-size:13px;font-weight:700;font-family:'Plus Jakarta Sans',sans-serif;color:var(--purple);">B</span>
                        <span style="font-size:13px;color:var(--dark);">Area VIP</span>
                    </div>
                    <div style="display:flex;justify-content:space-between;align-items:center;">
                        <span style="font-size:13px;font-weight:700;font-family:'Plus Jakarta Sans',sans-serif;color:var(--tosca);">C</span>
                        <span style="font-size:13px;color:var(--dark);">Area Outdoor</span>
                    </div>
                </div>
            </div>
        </div>

        <!-- Preview card meja baru -->
        <div class="form-card">
            <div class="form-card-header">
                <div class="form-card-icon" style="background:rgba(155,137,196,0.1);">
                    <i class="bi bi-eye" style="color:var(--purple);"></i>
                </div>
                <div class="form-card-title">Preview Meja</div>
            </div>
            <div class="form-card-body">
                <div style="background:linear-gradient(135deg,var(--navy) 0%,#162952 100%);border-radius:14px;padding:24px;position:relative;overflow:hidden;">
                    <div style="position:absolute;width:150px;height:150px;background:radial-gradient(circle,rgba(255,209,102,0.15) 0%,transparent 65%);top:-40px;right:-30px;pointer-events:none;"></div>
                    <div id="previewNomor" style="font-family:'Plus Jakarta Sans',sans-serif;font-weight:800;font-size:48px;color:#fff;line-height:1;margin-bottom:6px;position:relative;z-index:1;">—</div>
                    <div id="previewKap" style="font-size:13px;color:rgba(255,255,255,0.5);position:relative;z-index:1;">
                        <i class="bi bi-people" style="margin-right:4px;"></i> — orang
                    </div>
                    <div style="position:absolute;bottom:20px;right:20px;z-index:1;">
                        <span class="status-preview preview-available" id="previewStatus">
                            <span class="dot"></span>
                            <span id="previewStatusText">Tersedia</span>
                        </span>
                    </div>
                </div>
            </div>
        </div>

    </div>

    <!-- ── KANAN: Form Tambah ── -->
    <div class="col-lg-8">
        <div class="form-card">
            <div class="form-card-header">
                <div class="form-card-icon" style="background:rgba(75,163,195,0.12);">
                    <i class="bi bi-plus-circle" style="color:var(--sky);"></i>
                </div>
                <div class="form-card-title">Tambah Meja Baru</div>
            </div>
            <div class="form-card-body">

                <div class="area-hint">
                    <i class="bi bi-info-circle-fill"></i>
                    <p>Gunakan format <strong>prefix + angka</strong> untuk nomor meja. Contoh: <strong>A1</strong> (Area Dalam), <strong>B3</strong> (VIP), <strong>C2</strong> (Outdoor).</p>
                </div>

                <form action="<?= base_url('table/store') ?>" method="POST">
                    <?= csrf_field() ?>

                    <!-- Nomor Meja -->
                    <label class="field-label">
                        Nomor Meja <span style="color:var(--sky);">*</span>
                    </label>
                    <div class="field-wrap">
                        <i class="bi bi-hash field-icon"></i>
                        <input type="text" name="nomor_meja" id="inputNomor" class="form-input"
                               value="<?= old('nomor_meja') ?>"
                               placeholder="Contoh: A1, B3, C2"
                               maxlength="10" required
                               oninput="updatePreviewNomor(this.value)">
                    </div>

                    <!-- Kapasitas -->
                    <label class="field-label">
                        Kapasitas <span style="color:var(--sky);">*</span>
                    </label>
                    <div class="capacity-pills" style="margin-bottom:12px;">
                        <?php foreach ([2, 4, 6, 8, 10] as $cap): ?>
                        <div class="cap-pill" onclick="setKapasitas(<?= $cap ?>)">
                            <?= $cap ?><span>org</span>
                        </div>
                        <?php endforeach; ?>
                    </div>
                    <div class="field-wrap">
                        <i class="bi bi-people field-icon"></i>
                        <input type="number" name="kapasitas" id="inputKapasitas" class="form-input"
                               value="<?= old('kapasitas') ?>"
                               placeholder="Atau isi manual" min="1" max="50" required
                               oninput="syncPills(this.value); updatePreviewKap(this.value)">
                    </div>

                    <!-- Status -->
                    <label class="field-label">Status Awal</label>
                    <div class="field-wrap" style="margin-bottom:8px;">
                        <i class="bi bi-circle-half field-icon"></i>
                        <select name="status" id="selectStatus" class="form-select-custom"
                                onchange="updatePreviewStatus(this.value)">
                            <option value="available">Tersedia — meja kosong & siap digunakan</option>
                            <option value="occupied">Terisi — sedang digunakan tamu</option>
                            <option value="reserved">Dipesan — sudah ada reservasi</option>
                        </select>
                    </div>

                    <!-- Live preview status -->
                    <div style="margin-bottom:22px;display:flex;align-items:center;gap:8px;font-size:12.5px;color:var(--text-muted);">
                        Preview status:
                        <span class="status-preview preview-available" id="inlinePreview">
                            <span class="dot"></span>
                            <span id="inlinePreviewText">Tersedia</span>
                        </span>
                    </div>

                    <div class="d-flex justify-content-between align-items-center mt-2">
                        <a href="<?= base_url('table') ?>"
                           style="color:var(--text-muted);font-size:13px;text-decoration:none;display:flex;align-items:center;gap:5px;">
                            <i class="bi bi-arrow-left"></i> Kembali
                        </a>
                        <button type="submit" class="btn-save">
                            <i class="bi bi-plus-lg"></i> Tambah Meja
                        </button>
                    </div>

                </form>
            </div>
        </div>
    </div>

</div>

<script>
const statusMap = {
    available : { label: 'Tersedia', cls: 'preview-available' },
    occupied  : { label: 'Terisi',   cls: 'preview-occupied'  },
    reserved  : { label: 'Dipesan',  cls: 'preview-reserved'  },
};

function updatePreviewNomor(val) {
    document.getElementById('previewNomor').textContent = val.toUpperCase() || '—';
}

function updatePreviewKap(val) {
    const el = document.getElementById('previewKap');
    el.innerHTML = `<i class="bi bi-people" style="margin-right:4px;"></i> ${val || '—'} orang`;
}

function updatePreviewStatus(val) {
    const map = statusMap[val];
    // inline preview
    const inline = document.getElementById('inlinePreview');
    inline.className = 'status-preview ' + map.cls;
    document.getElementById('inlinePreviewText').textContent = map.label;
    // card preview
    const card = document.getElementById('previewStatus');
    card.className = 'status-preview ' + map.cls;
    document.getElementById('previewStatusText').textContent = map.label;
}

function setKapasitas(val) {
    document.getElementById('inputKapasitas').value = val;
    syncPills(val);
    updatePreviewKap(val);
}

function syncPills(val) {
    document.querySelectorAll('.cap-pill').forEach(p => {
        p.classList.toggle('active', parseInt(p.textContent) === parseInt(val));
    });
}
</script>