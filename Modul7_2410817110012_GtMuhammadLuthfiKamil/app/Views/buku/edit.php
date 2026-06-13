<?= $this->extend('layout') ?>
<?= $this->section('content') ?>

<!-- ─── Global Nav ─── -->
<nav class="global-nav" aria-label="Navigasi utama">
    <div class="global-nav__inner">
        <a href="/dashboard" class="global-nav__brand">Pustaka</a>
        <div class="global-nav__links" role="list">
            <a href="/dashboard" class="global-nav__link" role="listitem">Dashboard</a>
            <a href="/buku" class="global-nav__link global-nav__link--active" role="listitem">Buku</a>
            <a href="/logout" class="global-nav__link global-nav__link--logout" role="listitem">Logout</a>
        </div>
        <button class="global-nav__hamburger" onclick="openMobileNav()" aria-label="Buka menu" aria-expanded="false">
            <span></span><span></span><span></span>
        </button>
    </div>
</nav>

<!-- ─── Sub Nav ─── -->
<div class="sub-nav">
    <div class="sub-nav__inner">
        <span class="sub-nav__title">Edit Buku</span>
        <div class="sub-nav__actions">
            <a href="/buku/show/<?= $buku['id'] ?>" class="text-link text-link--sm">← Detail</a>
            <a href="/buku" class="text-link text-link--sm">Daftar Buku</a>
        </div>
    </div>
</div>

<!-- ─── Hero Tile ─── -->
<section class="tile tile--dark" style="padding:var(--sp-xxl) 0 var(--sp-xl);border-bottom:1px solid var(--c-hairline);" aria-label="Header form edit">
    <div class="container" style="text-align:center;">
        <span class="tile__eyebrow">Koleksi Buku</span>
        <h1 class="tile__headline tile__headline--lg" style="margin-bottom:var(--sp-xs);">
            Edit Buku
        </h1>
        <p style="font-family:var(--f-body);font-size:16px;font-weight:400;line-height:1.5;color:var(--c-muted);">
            Perbarui informasi untuk <em><?= esc($buku['judul']) ?></em>.
        </p>
    </div>
</section>

<!-- ─── Form Card ─── -->
<main>
    <div class="container">
        <div class="card card--form" style="margin-top:var(--sp-xl);margin-bottom:var(--sp-section);">

            <!-- Validation summary -->
            <?php if ($validation && is_array($validation) && count($validation) > 0): ?>
                <div class="alert alert-danger" role="alert">
                    <?php foreach ($validation as $err): ?>
                        <?= esc($err) ?><br>
                    <?php endforeach; ?>
                </div>
            <?php endif; ?>

            <form action="/buku/update/<?= $buku['id'] ?>" method="post" novalidate>
                <?= csrf_field() ?>

                <div class="form-group">
                    <label for="judul" class="form-label">Judul Buku</label>
                    <input
                        type="text"
                        name="judul"
                        id="judul"
                        class="form-input <?= ($validation && isset($validation['judul'])) ? 'is-invalid' : '' ?>"
                        value="<?= old('judul', $buku['judul']) ?>"
                        placeholder="Masukkan judul buku"
                        required
                    >
                    <?php if ($validation && isset($validation['judul'])): ?>
                        <div class="form-error" role="alert"><?= esc($validation['judul']) ?></div>
                    <?php endif; ?>
                </div>

                <div class="form-group">
                    <label for="penulis" class="form-label">Penulis</label>
                    <input
                        type="text"
                        name="penulis"
                        id="penulis"
                        class="form-input <?= ($validation && isset($validation['penulis'])) ? 'is-invalid' : '' ?>"
                        value="<?= old('penulis', $buku['penulis']) ?>"
                        placeholder="Nama penulis"
                        required
                    >
                    <?php if ($validation && isset($validation['penulis'])): ?>
                        <div class="form-error" role="alert"><?= esc($validation['penulis']) ?></div>
                    <?php endif; ?>
                </div>

                <div class="form-group">
                    <label for="penerbit" class="form-label">Penerbit</label>
                    <input
                        type="text"
                        name="penerbit"
                        id="penerbit"
                        class="form-input <?= ($validation && isset($validation['penerbit'])) ? 'is-invalid' : '' ?>"
                        value="<?= old('penerbit', $buku['penerbit']) ?>"
                        placeholder="Nama penerbit"
                        required
                    >
                    <?php if ($validation && isset($validation['penerbit'])): ?>
                        <div class="form-error" role="alert"><?= esc($validation['penerbit']) ?></div>
                    <?php endif; ?>
                </div>

                <div class="form-group">
                    <label for="tahun_terbit" class="form-label">Tahun Terbit</label>
                    <input
                        type="number"
                        name="tahun_terbit"
                        id="tahun_terbit"
                        class="form-input <?= ($validation && isset($validation['tahun_terbit'])) ? 'is-invalid' : '' ?>"
                        value="<?= old('tahun_terbit', $buku['tahun_terbit']) ?>"
                        placeholder="Contoh: 2020"
                        min="1801"
                        max="2023"
                        required
                    >
                    <?php if ($validation && isset($validation['tahun_terbit'])): ?>
                        <div class="form-error" role="alert"><?= esc($validation['tahun_terbit']) ?></div>
                    <?php endif; ?>
                    <div class="form-hint">Tahun antara 1801 – 2023</div>
                </div>

                <div class="form-actions">
                    <button type="submit" class="btn btn-primary">Update Buku</button>
                    <a href="/buku/show/<?= $buku['id'] ?>" class="btn btn-secondary">Batal</a>
                </div>
            </form>

            <hr class="section-divider" style="margin-top:var(--sp-xxl);">

            <!-- Danger zone -->
            <div style="display:flex;align-items:center;justify-content:space-between;flex-wrap:wrap;gap:var(--sp-md);">
                <div>
                    <div style="font-family:var(--f-display);font-size:16px;font-weight:400;letter-spacing:1.5px;text-transform:uppercase;color:var(--c-on-dark);margin-bottom:var(--sp-xxs);">
                        Hapus Buku Ini
                    </div>
                    <div style="font-family:var(--f-mono);font-size:11px;letter-spacing:1px;color:var(--c-muted-soft);">
                        Tindakan ini tidak dapat dibatalkan.
                    </div>
                </div>
                <a href="/buku/delete/<?= $buku['id'] ?>"
                   class="btn btn-danger"
                   onclick="return confirm('Yakin ingin menghapus buku ini? Tindakan tidak dapat dibatalkan.')"
                   aria-label="Hapus buku ini secara permanen">
                    Hapus Permanen
                </a>
            </div>
        </div>
    </div>
</main>

<!-- ─── Footer ─── -->
<footer class="site-footer" role="contentinfo">
    <div>Modul 7 — CRUD &amp; Login · Pemrograman Web II</div>
    <div class="site-footer__legal">Gt. Muhammad Luthfi Kamil · 2410817110012</div>
</footer>

<?= $this->endSection() ?>
