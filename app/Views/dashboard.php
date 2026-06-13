<?= $this->extend('layout') ?>
<?= $this->section('content') ?>

<!-- ─── Global Nav ─── -->
<nav class="global-nav" aria-label="Navigasi utama">
    <div class="global-nav__inner">
        <a href="/dashboard" class="global-nav__brand">Pustaka</a>
        <div class="global-nav__links" role="list">
            <a href="/dashboard" class="global-nav__link global-nav__link--active" role="listitem">Dashboard</a>
            <a href="/buku" class="global-nav__link" role="listitem">Buku</a>
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
        <span class="sub-nav__title">Dashboard</span>
        <div class="sub-nav__actions">
            <span class="sub-nav__meta"><?= esc(session()->get('username')) ?></span>
        </div>
    </div>
</div>

<!-- ─── Hero Tile ─── -->
<section class="tile tile--dark" aria-label="Selamat datang">
    <div class="container">
        <span class="tile__eyebrow">Pustaka · Pemrograman Web II</span>
        <h1 class="tile__headline">
            Selamat Datang,<br><?= esc(session()->get('username')) ?>.
        </h1>
        <p class="tile__sub">Kelola koleksi buku Anda dengan mudah.</p>
        <div class="tile__ctas">
            <a href="/buku" class="btn btn-hero">Kelola Buku →</a>
            <a href="/buku/create" class="btn btn-secondary">+ Tambah Buku</a>
        </div>
        <span class="tile__icon" aria-hidden="true">📚</span>
    </div>
</section>

<!-- ─── Stats Tile ─── -->
<section class="tile tile--parchment" aria-label="Ringkasan">
    <div class="container">
        <h2 class="tile__headline tile__headline--lg" style="margin-bottom:var(--sp-xxl);">
            Ringkasan Sistem
        </h2>
        <div class="stats-row">
            <div class="stat-card">
                <div class="stat-card__value">CRUD</div>
                <div class="stat-card__label">Operasi Tersedia</div>
            </div>
            <div class="stat-card">
                <div class="stat-card__value">Auth</div>
                <div class="stat-card__label">Session Login Aktif</div>
            </div>
            <div class="stat-card">
                <div class="stat-card__value">CI4</div>
                <div class="stat-card__label">Framework Backend</div>
            </div>
        </div>
    </div>
</section>

<!-- ─── Feature Tile ─── -->
<section class="tile tile--dark" style="border-top:1px solid var(--c-hairline);" aria-label="Fitur aplikasi">
    <div class="container">
        <span class="tile__eyebrow">Fitur</span>
        <h2 class="tile__headline tile__headline--lg">Yang Bisa Anda Lakukan</h2>
        <p class="tile__sub">Sistem manajemen buku lengkap berbasis web.</p>

        <div style="display:grid;grid-template-columns:repeat(3,1fr);gap:var(--sp-xl);text-align:left;">
            <div class="card">
                <div style="font-size:32px;margin-bottom:var(--sp-md);" aria-hidden="true">➕</div>
                <h3 style="font-family:var(--f-display);font-size:20px;font-weight:400;letter-spacing:1px;text-transform:uppercase;margin-bottom:var(--sp-xs);color:var(--c-on-dark);">Tambah Buku</h3>
                <p style="font-family:var(--f-body);font-size:14px;color:var(--c-muted);line-height:1.5;">
                    Input data buku baru lengkap dengan judul, penulis, penerbit, dan tahun terbit.
                </p>
            </div>
            <div class="card">
                <div style="font-size:32px;margin-bottom:var(--sp-md);" aria-hidden="true">✏️</div>
                <h3 style="font-family:var(--f-display);font-size:20px;font-weight:400;letter-spacing:1px;text-transform:uppercase;margin-bottom:var(--sp-xs);color:var(--c-on-dark);">Edit & Update</h3>
                <p style="font-family:var(--f-body);font-size:14px;color:var(--c-muted);line-height:1.5;">
                    Perbarui informasi buku kapan saja dengan form edit yang mudah digunakan.
                </p>
            </div>
            <div class="card">
                <div style="font-size:32px;margin-bottom:var(--sp-md);" aria-hidden="true">🗑️</div>
                <h3 style="font-family:var(--f-display);font-size:20px;font-weight:400;letter-spacing:1px;text-transform:uppercase;margin-bottom:var(--sp-xs);color:var(--c-on-dark);">Hapus Data</h3>
                <p style="font-family:var(--f-body);font-size:14px;color:var(--c-muted);line-height:1.5;">
                    Hapus data buku yang sudah tidak relevan dengan konfirmasi sebelum dihapus.
                </p>
            </div>
        </div>

        <div class="tile__ctas" style="margin-top:var(--sp-xxl);margin-bottom:0;">
            <a href="/buku" class="btn btn-primary">Lihat Semua Buku</a>
        </div>
    </div>
</section>

<!-- ─── Footer ─── -->
<footer class="site-footer" role="contentinfo">
    <div class="site-footer__links">
        <a href="/dashboard" class="site-footer__link">Dashboard</a>
        <a href="/buku" class="site-footer__link">Buku</a>
        <a href="/logout" class="site-footer__link">Logout</a>
    </div>
    <div>Modul 7 — CRUD &amp; Login · Pemrograman Web II</div>
    <div class="site-footer__legal">Gt. Muhammad Luthfi Kamil · 2410817110012</div>
</footer>

<?= $this->endSection() ?>
