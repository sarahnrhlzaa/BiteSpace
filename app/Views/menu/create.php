<!-- views/menu/create.php -->
<style>
    /* ══ PALETTE
       --navy:   #0D1B3E  |  --sky:    #4BA3C3
       --tosca:  #2EC4B6  |  --purple: #9B89C4
       --yellow: #FFD166  |  --deep:   #39007E
    ══════════════════════════════════════════ */

    .form-page-wrap { max-width: 820px; margin: 0 auto; }

    .breadcrumb-nav {
        display: flex; align-items: center; gap: 8px;
        margin-bottom: 22px; font-size: 13px; color: var(--text-muted);
    }
    .breadcrumb-nav a { color: #2EC4B6; text-decoration: none; font-weight: 600; }
    .breadcrumb-nav a:hover { text-decoration: underline; }
    .breadcrumb-sep { font-size: 11px; color: var(--text-muted); }

    .form-card { background: #fff; border-radius: 16px; border: 1px solid var(--border); overflow: hidden; margin-bottom: 20px; }
    .form-card-header { padding: 18px 24px; border-bottom: 1px solid var(--border); display: flex; align-items: center; gap: 10px; }
    .form-card-icon { width: 36px; height: 36px; border-radius: 10px; display: flex; align-items: center; justify-content: center; font-size: 16px; }
    .form-card-title { font-family: 'Plus Jakarta Sans', sans-serif; font-weight: 700; font-size: 15px; color: var(--dark); }
    .form-card-body { padding: 24px; }

    .field-label { font-family: 'Plus Jakarta Sans', sans-serif; font-weight: 600; font-size: 12.5px; color: var(--dark); margin-bottom: 7px; display: block; }
    .field-required { color: #2EC4B6; }
    .field-wrap { position: relative; margin-bottom: 20px; }
    .field-icon { position: absolute; left: 14px; top: 50%; transform: translateY(-50%); color: var(--text-muted); font-size: 16px; pointer-events: none; }

    .form-input {
        width: 100%; height: 46px; padding-left: 42px; padding-right: 14px;
        border: 1.5px solid var(--border); border-radius: 11px;
        font-size: 13.5px; font-family: 'DM Sans', sans-serif;
        color: var(--dark); background: #FAFBFD; transition: all 0.2s;
    }
    .form-input:focus { border-color: #2EC4B6; box-shadow: 0 0 0 3px rgba(46,196,182,0.12); background: #fff; outline: none; }

    .form-textarea {
        width: 100%; padding: 12px 14px; border: 1.5px solid var(--border); border-radius: 11px;
        font-size: 13.5px; font-family: 'DM Sans', sans-serif; color: var(--dark);
        background: #FAFBFD; resize: vertical; min-height: 100px; transition: all 0.2s;
    }
    .form-textarea:focus { border-color: #2EC4B6; box-shadow: 0 0 0 3px rgba(46,196,182,0.12); background: #fff; outline: none; }

    .form-select {
        width: 100%; height: 46px; padding: 0 14px 0 42px;
        border: 1.5px solid var(--border); border-radius: 11px;
        font-size: 13.5px; font-family: 'DM Sans', sans-serif; color: var(--dark);
        background: #FAFBFD; transition: all 0.2s; appearance: none;
        background-image: url("data:image/svg+xml,%3Csvg xmlns='http://www.w3.org/2000/svg' width='12' height='12' viewBox='0 0 24 24' fill='none' stroke='%238A8FAB' stroke-width='2'%3E%3Cpath d='M6 9l6 6 6-6'/%3E%3C/svg%3E");
        background-repeat: no-repeat; background-position: right 14px center;
    }
    .form-select:focus { border-color: #2EC4B6; box-shadow: 0 0 0 3px rgba(46,196,182,0.12); outline: none; }

    /* Upload area */
    .upload-area {
        border: 2px dashed var(--border); border-radius: 14px;
        padding: 28px; text-align: center; cursor: pointer;
        transition: all 0.2s; position: relative; background: #FAFBFD;
    }
    .upload-area:hover, .upload-area.dragover { border-color: #2EC4B6; background: rgba(46,196,182,0.05); }
    .upload-area input[type="file"] { position: absolute; inset: 0; opacity: 0; cursor: pointer; }
    .upload-icon { font-size: 36px; margin-bottom: 10px; }
    .upload-text { font-size: 14px; font-weight: 600; color: var(--dark); margin-bottom: 4px; }
    .upload-hint { font-size: 12px; color: var(--text-muted); }

    .img-preview-wrap { display: none; position: relative; border-radius: 14px; overflow: hidden; border: 1.5px solid #2EC4B6; }
    .img-preview-wrap img { width: 100%; max-height: 220px; object-fit: cover; display: block; }
    .img-preview-remove { position: absolute; top: 10px; right: 10px; width: 32px; height: 32px; border-radius: 8px; background: rgba(0,0,0,0.6); color: #fff; border: none; cursor: pointer; font-size: 14px; display: flex; align-items: center; justify-content: center; transition: background 0.2s; }
    .img-preview-remove:hover { background: #ef4444; }

    /* Status toggle → tosca */
    .status-toggle-wrap { display: flex; align-items: center; gap: 14px; padding: 16px 18px; background: #FAFBFD; border-radius: 11px; border: 1.5px solid var(--border); }
    .toggle-switch-lg { position: relative; display: inline-block; width: 52px; height: 28px; }
    .toggle-switch-lg input { opacity: 0; width: 0; height: 0; }
    .toggle-slider-lg { position: absolute; cursor: pointer; inset: 0; background: #CBD5E0; border-radius: 28px; transition: 0.3s; }
    .toggle-slider-lg::before { content: ''; position: absolute; width: 22px; height: 22px; border-radius: 50%; background: #fff; left: 3px; top: 3px; transition: 0.3s; box-shadow: 0 2px 5px rgba(0,0,0,0.15); }
    .toggle-switch-lg input:checked + .toggle-slider-lg { background: #2EC4B6; }
    .toggle-switch-lg input:checked + .toggle-slider-lg::before { transform: translateX(24px); }
    .status-label { font-size: 14px; font-weight: 600; color: var(--dark); }
    .status-desc  { font-size: 12px; color: var(--text-muted); }

    /* Actions */
    .form-actions {
        display: flex; align-items: center; justify-content: space-between;
        padding: 20px 24px; border-top: 1px solid var(--border); background: #FAFBFD;
    }
    .btn-save-menu {
        display: inline-flex; align-items: center; gap: 8px; height: 46px; padding: 0 28px;
        background: linear-gradient(135deg, #2EC4B6, #4BA3C3);
        color: #fff; border: none; border-radius: 11px;
        font-family: 'Plus Jakarta Sans', sans-serif; font-weight: 700; font-size: 14px;
        cursor: pointer; transition: all 0.2s; box-shadow: 0 4px 14px rgba(46,196,182,0.28);
    }
    .btn-save-menu:hover { filter: brightness(1.06); transform: translateY(-1px); box-shadow: 0 8px 20px rgba(46,196,182,0.35); }
    .btn-cancel-menu {
        display: inline-flex; align-items: center; gap: 8px; height: 46px; padding: 0 22px;
        background: #fff; border: 1.5px solid var(--border); color: var(--dark);
        border-radius: 11px; font-family: 'Plus Jakarta Sans', sans-serif;
        font-weight: 600; font-size: 14px; cursor: pointer; text-decoration: none; transition: all 0.2s;
    }
    .btn-cancel-menu:hover { background: var(--bg); color: var(--dark); }

    .alert-err { background: #FFF1F0; border: 1px solid #FFCCC7; color: #C0392B; border-radius: 11px; padding: 12px 16px; margin-bottom: 20px; display: flex; gap: 10px; align-items: flex-start; font-size: 13.5px; }
</style>

<!-- Breadcrumb -->
<div class="breadcrumb-nav">
    <a href="<?= base_url('menu') ?>"><i class="bi bi-book-half me-1"></i>Menu</a>
    <i class="bi bi-chevron-right breadcrumb-sep"></i>
    <span>Tambah Menu</span>
</div>

<div class="form-page-wrap">

    <?php if (session()->getFlashdata('error')): ?>
        <div class="alert-err">
            <i class="bi bi-exclamation-circle-fill mt-1"></i>
            <div><?= session()->getFlashdata('error') ?></div>
        </div>
    <?php endif; ?>

    <form action="<?= base_url('menu/store') ?>" method="POST" enctype="multipart/form-data" id="menuForm">
        <?= csrf_field() ?>

        <!-- Info Menu -->
        <div class="form-card">
            <div class="form-card-header">
                <div class="form-card-icon" style="background:rgba(46,196,182,0.12);">
                    <i class="bi bi-journal-plus" style="color:#2EC4B6;"></i>
                </div>
                <div class="form-card-title">Informasi Menu</div>
            </div>
            <div class="form-card-body">
                <div class="row g-4">
                    <div class="col-md-8">
                        <label class="field-label">Nama Menu <span class="field-required">*</span></label>
                        <div class="field-wrap">
                            <i class="bi bi-card-text field-icon"></i>
                            <input type="text" name="nama_menu" class="form-input"
                                   placeholder="Contoh: Ayam Bakar Madu"
                                   value="<?= old('nama_menu') ?>" required>
                        </div>
                    </div>
                    <div class="col-md-4">
                        <label class="field-label">Harga <span class="field-required">*</span></label>
                        <div class="field-wrap">
                            <i class="bi bi-currency-dollar field-icon"></i>
                            <input type="number" name="harga" class="form-input"
                                   placeholder="25000" value="<?= old('harga') ?>"
                                   min="0" step="500" required>
                        </div>
                    </div>
                    <div class="col-md-6">
                        <label class="field-label">Kategori <span class="field-required">*</span></label>
                        <div class="field-wrap">
                            <i class="bi bi-tag field-icon"></i>
                            <select name="id_category" class="form-select" required>
                                <option value="">-- Pilih Kategori --</option>
                                <?php foreach ($categories as $cat): ?>
                                    <option value="<?= $cat['id_category'] ?>"
                                            <?= old('id_category') == $cat['id_category'] ? 'selected' : '' ?>>
                                        <?= esc($cat['nama_category']) ?>
                                    </option>
                                <?php endforeach; ?>
                            </select>
                        </div>
                    </div>
                    <div class="col-12">
                        <label class="field-label">Deskripsi</label>
                        <div class="field-wrap" style="margin-bottom:0;">
                            <textarea name="deskripsi" class="form-textarea"
                                      placeholder="Deskripsi singkat menu (opsional)..."><?= old('deskripsi') ?></textarea>
                        </div>
                    </div>
                </div>
            </div>
        </div>

        <!-- Gambar Menu -->
        <div class="form-card">
            <div class="form-card-header">
                <div class="form-card-icon" style="background:rgba(155,137,196,0.12);">
                    <i class="bi bi-image" style="color:#9B89C4;"></i>
                </div>
                <div class="form-card-title">Foto Menu</div>
            </div>
            <div class="form-card-body">
                <div class="upload-area" id="uploadArea">
                    <input type="file" name="gambar" id="gambarInput"
                           accept="image/jpeg,image/png,image/webp"
                           onchange="previewImage(this)">
                    <div id="uploadContent">
                        <div class="upload-icon">📸</div>
                        <div class="upload-text">Klik atau drag foto di sini</div>
                        <div class="upload-hint">JPG, PNG, WEBP · Maks. 2MB</div>
                    </div>
                </div>
                <div class="img-preview-wrap mt-3" id="imgPreviewWrap">
                    <img id="imgPreview" src="" alt="Preview">
                    <button type="button" class="img-preview-remove" onclick="removeImage()" title="Hapus foto">
                        <i class="bi bi-x"></i>
                    </button>
                </div>
                <div style="font-size:12px; color:var(--text-muted); margin-top:10px;">
                    <i class="bi bi-info-circle me-1"></i>
                    Foto akan ditampilkan di halaman transaksi/POS. Rasio 1:1 (kotak) direkomendasikan.
                </div>
            </div>
        </div>

        <!-- Status -->
        <div class="form-card">
            <div class="form-card-header">
                <div class="form-card-icon" style="background:rgba(255,209,102,0.15);">
                    <i class="bi bi-toggle-on" style="color:#a07800;"></i>
                </div>
                <div class="form-card-title">Ketersediaan</div>
            </div>
            <div class="form-card-body">
                <div class="status-toggle-wrap">
                    <label class="toggle-switch-lg">
                        <input type="checkbox" name="is_available" id="statusToggle"
                               value="1" checked onchange="updateStatusLabel()">
                        <span class="toggle-slider-lg"></span>
                    </label>
                    <div>
                        <div class="status-label" id="statusLabel">Menu Tersedia</div>
                        <div class="status-desc" id="statusDesc">Menu akan muncul di halaman transaksi</div>
                    </div>
                </div>
            </div>
        </div>

        <!-- Actions -->
        <div class="form-actions" style="border-radius:16px; border:1px solid var(--border);">
            <a href="<?= base_url('menu') ?>" class="btn-cancel-menu">
                <i class="bi bi-arrow-left"></i> Batal
            </a>
            <button type="submit" class="btn-save-menu">
                <i class="bi bi-check-lg"></i> Simpan Menu
            </button>
        </div>

    </form>
</div>

<script>
function previewImage(input) {
    const file = input.files[0];
    if (!file) return;
    if (file.size > 2 * 1024 * 1024) { alert('Ukuran file terlalu besar. Maksimal 2MB.'); input.value = ''; return; }
    const reader = new FileReader();
    reader.onload = e => {
        document.getElementById('imgPreview').src = e.target.result;
        document.getElementById('imgPreviewWrap').style.display = 'block';
        document.getElementById('uploadArea').style.display = 'none';
    };
    reader.readAsDataURL(file);
}
function removeImage() {
    document.getElementById('gambarInput').value = '';
    document.getElementById('imgPreviewWrap').style.display = 'none';
    document.getElementById('uploadArea').style.display = 'block';
}
function updateStatusLabel() {
    const checked = document.getElementById('statusToggle').checked;
    document.getElementById('statusLabel').textContent = checked ? 'Menu Tersedia' : 'Menu Tidak Tersedia';
    document.getElementById('statusDesc').textContent  = checked ? 'Menu akan muncul di halaman transaksi' : 'Menu disembunyikan dari halaman transaksi';
}

const uploadArea = document.getElementById('uploadArea');
uploadArea.addEventListener('dragover',  e => { e.preventDefault(); uploadArea.classList.add('dragover'); });
uploadArea.addEventListener('dragleave', () => uploadArea.classList.remove('dragover'));
uploadArea.addEventListener('drop', e => {
    e.preventDefault(); uploadArea.classList.remove('dragover');
    const file = e.dataTransfer.files[0];
    if (file && file.type.startsWith('image/')) {
        const dt = new DataTransfer(); dt.items.add(file);
        document.getElementById('gambarInput').files = dt.files;
        previewImage(document.getElementById('gambarInput'));
    }
});
</script>