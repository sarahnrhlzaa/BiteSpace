<!-- views/menu/edit.php -->
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
    .breadcrumb-sep { font-size: 11px; }

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

    /* Current image */
    .current-img-wrap { border-radius: 14px; overflow: hidden; border: 1.5px solid var(--border); margin-bottom: 14px; position: relative; }
    .current-img-wrap img { width: 100%; max-height: 200px; object-fit: cover; display: block; }
    .current-img-label { position: absolute; bottom: 0; left: 0; right: 0; background: linear-gradient(transparent, rgba(0,0,0,0.6)); color: #fff; font-size: 12px; padding: 16px 12px 10px; font-weight: 500; }

    /* Upload area */
    .upload-area { border: 2px dashed var(--border); border-radius: 14px; padding: 22px; text-align: center; cursor: pointer; transition: all 0.2s; position: relative; background: #FAFBFD; }
    .upload-area:hover, .upload-area.dragover { border-color: #2EC4B6; background: rgba(46,196,182,0.05); }
    .upload-area input[type="file"] { position: absolute; inset: 0; opacity: 0; cursor: pointer; }
    .upload-icon { font-size: 28px; margin-bottom: 8px; }
    .upload-text { font-size: 13.5px; font-weight: 600; color: var(--dark); margin-bottom: 3px; }
    .upload-hint { font-size: 12px; color: var(--text-muted); }

    /* New preview → tosca border */
    .img-preview-new { display: none; position: relative; border-radius: 14px; overflow: hidden; border: 1.5px solid #2EC4B6; }
    .img-preview-new img { width: 100%; max-height: 200px; object-fit: cover; display: block; }
    .new-badge { position: absolute; top: 10px; left: 10px; background: #2EC4B6; color: #fff; font-size: 11px; font-weight: 700; padding: 3px 10px; border-radius: 6px; }
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

    /* Meta info → sky tint, selaras dashboard */
    .meta-info {
        background: rgba(75,163,195,0.07); border: 1px solid rgba(75,163,195,0.2);
        border-radius: 11px; padding: 14px 18px; margin-bottom: 20px;
        display: flex; gap: 20px; flex-wrap: wrap;
    }
    .meta-item { font-size: 12.5px; color: var(--text-muted); }
    .meta-item strong { color: var(--dark); font-weight: 600; }

    /* Actions */
    .form-actions { display: flex; align-items: center; justify-content: space-between; padding: 20px 24px; border-top: 1px solid var(--border); background: #FAFBFD; }
    .btn-save-menu {
        display: inline-flex; align-items: center; gap: 8px; height: 46px; padding: 0 28px;
        background: linear-gradient(135deg, #2EC4B6, #4BA3C3);
        color: #fff; border: none; border-radius: 11px;
        font-family: 'Plus Jakarta Sans', sans-serif; font-weight: 700; font-size: 14px;
        cursor: pointer; transition: all 0.2s; box-shadow: 0 4px 14px rgba(46,196,182,0.28);
    }
    .btn-save-menu:hover { filter: brightness(1.06); transform: translateY(-1px); }
    .btn-cancel-menu {
        display: inline-flex; align-items: center; gap: 8px; height: 46px; padding: 0 22px;
        background: #fff; border: 1.5px solid var(--border); color: var(--dark);
        border-radius: 11px; font-family: 'Plus Jakarta Sans', sans-serif;
        font-weight: 600; font-size: 14px; cursor: pointer; text-decoration: none; transition: all 0.2s;
    }
    .btn-cancel-menu:hover { 
        background: var(--bg); 
        color: var(--dark); 
    }

    .alert-err { 
        background: #FFF1F0; 
        border: 1px solid #FFCCC7; 
        color: #C0392B; 
        border-radius: 11px; 
        padding: 12px 16px; 
        margin-bottom: 20px; 
        display: flex; 
        gap: 10px; 
        align-items: flex-start; 
        font-size: 13.5px; 
        }
</style>

<!-- Breadcrumb -->
<div class="breadcrumb-nav">
    <a href="<?= base_url('menu') ?>"><i class="bi bi-book-half me-1"></i>Menu</a>
    <i class="bi bi-chevron-right breadcrumb-sep"></i>
    <span>Edit — <?= esc($menu['nama_menu']) ?></span>
</div>

<div class="form-page-wrap">

    <?php if (session()->getFlashdata('error')): ?>
        <div class="alert-err">
            <i class="bi bi-exclamation-circle-fill mt-1"></i>
            <div><?= session()->getFlashdata('error') ?></div>
        </div>
    <?php endif; ?>

    <!-- Meta info -->
    <div class="meta-info">
        <div class="meta-item">ID Menu: <strong>#<?= $menu['id_menu'] ?></strong></div>
        <div class="meta-item">Dibuat: <strong><?= date('d M Y', strtotime($menu['created_at'])) ?></strong></div>
        <div class="meta-item">Diupdate: <strong><?= $menu['updated_at'] ? date('d M Y, H:i', strtotime($menu['updated_at'])) : '-' ?></strong></div>
    </div>

    <form action="<?= base_url('menu/update/' . $menu['id_menu']) ?>" method="POST"
          enctype="multipart/form-data" id="menuForm">
        <?= csrf_field() ?>
        <!-- <input type="hidden" name="_method" value="PUT"> -->

        <!-- Info Menu -->
        <div class="form-card">
            <div class="form-card-header">
                <div class="form-card-icon" style="background:rgba(46,196,182,0.12);">
                    <i class="bi bi-pencil-square" style="color:#2EC4B6;"></i>
                </div>
                <div class="form-card-title">Edit Informasi Menu</div>
            </div>
            <div class="form-card-body">
                <div class="row g-4">
                    <div class="col-md-8">
                        <label class="field-label">Nama Menu <span class="field-required">*</span></label>
                        <div class="field-wrap">
                            <i class="bi bi-card-text field-icon"></i>
                            <input type="text" name="nama_menu" class="form-input"
                                   value="<?= esc(old('nama_menu', $menu['nama_menu'])) ?>" required>
                        </div>
                    </div>
                    <div class="col-md-4">
                        <label class="field-label">Harga <span class="field-required">*</span></label>
                        <div class="field-wrap">
                            <i class="bi bi-currency-dollar field-icon"></i>
                            <input type="number" name="harga" class="form-input"
                                   value="<?= esc(old('harga', $menu['harga'])) ?>"
                                   min="0" step="500" required>
                        </div>
                    </div>
                    <div class="col-md-6">
                        <label class="field-label">Kategori <span class="field-required">*</span></label>
                        <div class="field-wrap">
                            <i class="bi bi-tag field-icon"></i>
                                <select name="id_category" class="form-select" required>
                                    <option value="">-- Pilih Kategori --</option>
                                    <?php
                                    $sudah_tampil = [];
                                    foreach ($categories as $cat): 
                                        if (!in_array($cat['nama_category'], $sudah_tampil)): 
                                            $sudah_tampil[] = $cat['nama_category']; 
                                    ?>
                                        <option value="<?= $cat['id_category'] ?>"
                                                <?= (old('id_category', $menu['id_category']) == $cat['id_category']) ? 'selected' : '' ?>>
                                            <?= esc($cat['nama_category']) ?>
                                        </option>
                                    <?php 
                                        endif; 
                                            endforeach; 
                                    ?>
                                </select>
                        </div>
                    </div>
                    <div class="col-12">
                        <label class="field-label">Deskripsi</label>
                        <div class="field-wrap" style="margin-bottom:0;">
                            <textarea name="deskripsi" class="form-textarea"
                                      placeholder="Deskripsi singkat menu..."><?= esc(old('deskripsi', $menu['deskripsi'])) ?></textarea>
                        </div>
                    </div>
                </div>
            </div>
        </div>

        <!-- Gambar -->
        <div class="form-card">
            <div class="form-card-header">
                <div class="form-card-icon" style="background:rgba(155,137,196,0.12);">
                    <i class="bi bi-image" style="color:#9B89C4;"></i>
                </div>
                <div class="form-card-title">Foto Menu</div>
            </div>
            <div class="form-card-body">

                <?php if ($menu['gambar']): ?>
                <div style="margin-bottom:14px;">
                    <div style="font-size:12.5px; font-weight:600; color:var(--text-muted); margin-bottom:8px;">
                        <i class="bi bi-image me-1"></i> Foto Saat Ini
                    </div>
                    <div class="current-img-wrap">
                        <img src="<?= base_url('uploads/menu/' . $menu['gambar']) ?>" alt="<?= esc($menu['nama_menu']) ?>">
                        <div class="current-img-label"><?= esc($menu['gambar']) ?></div>
                    </div>
                    <div style="display:flex; align-items:center; gap:8px; margin-bottom:14px;">
                        <input type="checkbox" id="hapusGambar" name="hapus_gambar" value="1"
                               style="width:16px;height:16px; accent-color:#2EC4B6;">
                        <label for="hapusGambar" style="font-size:13px; color:var(--text-muted); cursor:pointer;">
                            Hapus foto saat ini (tanpa upload baru)
                        </label>
                    </div>
                </div>
                <div style="font-size:12.5px; font-weight:600; color:var(--text-muted); margin-bottom:8px;">
                    <i class="bi bi-arrow-repeat me-1"></i> Ganti dengan Foto Baru (opsional)
                </div>
                <?php else: ?>
                <div style="font-size:12.5px; font-weight:600; color:var(--text-muted); margin-bottom:8px;">
                    <i class="bi bi-image me-1"></i> Belum ada foto — Upload Sekarang (opsional)
                </div>
                <?php endif; ?>

                <div class="upload-area" id="uploadArea">
                    <input type="file" name="gambar" id="gambarInput"
                           accept="image/jpeg,image/png,image/webp" onchange="previewImage(this)">
                    <div id="uploadContent">
                        <div class="upload-icon">📸</div>
                        <div class="upload-text">Klik atau drag foto di sini</div>
                        <div class="upload-hint">JPG, PNG, WEBP · Maks. 2MB</div>
                    </div>
                </div>

                <div class="img-preview-new mt-3" id="imgPreviewWrap">
                    <img id="imgPreview" src="" alt="Preview baru">
                    <div class="new-badge">Foto Baru</div>
                    <button type="button" class="img-preview-remove" onclick="removeImage()" title="Batal ganti foto">
                        <i class="bi bi-x"></i>
                    </button>
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
                               value="1" <?= $menu['is_available'] ? 'checked' : '' ?>
                               onchange="updateStatusLabel()">
                        <span class="toggle-slider-lg"></span>
                    </label>
                    <div>
                        <div style="font-size:14px; font-weight:600; color:var(--dark);" id="statusLabel">
                            <?= $menu['is_available'] ? 'Menu Tersedia' : 'Menu Tidak Tersedia' ?>
                        </div>
                        <div style="font-size:12px; color:var(--text-muted);" id="statusDesc">
                            <?= $menu['is_available'] ? 'Menu muncul di halaman transaksi' : 'Menu disembunyikan dari halaman transaksi' ?>
                        </div>
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
                <i class="bi bi-check-lg"></i> Simpan Perubahan
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
        const cb = document.getElementById('hapusGambar');
        if (cb) cb.checked = false;
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
    document.getElementById('statusDesc').textContent  = checked ? 'Menu muncul di halaman transaksi' : 'Menu disembunyikan dari halaman transaksi';
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