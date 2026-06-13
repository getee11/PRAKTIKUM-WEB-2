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
        <span class="sub-nav__title">Detail Buku</span>
        <div class="sub-nav__actions">
            <a href="/buku/edit/<?= $buku['id'] ?>" class="btn btn-primary btn--sm" aria-label="Edit buku ini">Edit</a>
            <a href="/buku" class="text-link text-link--sm">← Daftar</a>
        </div>
    </div>
</div>

<!-- ─── Hero Tile ─── -->
<section class="tile tile--dark" style="padding:var(--sp-xxl) 0;border-bottom:1px solid var(--c-hairline);" aria-label="Detail buku">
    <div class="container" style="text-align:center;">
        <span class="tile__eyebrow">Koleksi Buku</span>

        <!-- Cover icon -->
        <div style="font-size:96px;line-height:1;margin-bottom:var(--sp-xl);display:inline-block;"
             aria-hidden="true">
            <?php
            $covers = ['📗','📘','📙','📕','📓','📔','📒','📃'];
            echo $covers[($buku['id'] - 1) % count($covers)];
            ?>
        </div>

        <h1 class="tile__headline tile__headline--lg" style="margin-bottom:var(--sp-xs);">
            <?= esc($buku['judul']) ?>
        </h1>
        <p class="tile__sub" style="margin-bottom:var(--sp-lg);">
            <?= esc($buku['penulis']) ?>
        </p>
        <div class="tile__ctas" style="margin-bottom:0;">
            <a href="/buku/edit/<?= $buku['id'] ?>" class="btn btn-hero">Edit Buku</a>
            <a href="/buku" class="btn btn-secondary">Semua Buku</a>
        </div>
    </div>
</section>

<!-- ─── Detail Card ─── -->
<main>
    <div class="container">
        <div class="card card--narrow" style="margin-top:var(--sp-xl);margin-bottom:var(--sp-section);">

            <h2 style="font-family:var(--f-display);font-size:24px;font-weight:400;letter-spacing:1.5px;text-transform:uppercase;margin-bottom:var(--sp-xl);color:var(--c-on-dark);">
                Informasi Buku
            </h2>

            <table class="detail-table" aria-label="Detail informasi buku">
                <tbody>
                    <tr>
                        <th scope="row">Judul</th>
                        <td class="td-bold"><?= esc($buku['judul']) ?></td>
                    </tr>
                    <tr>
                        <th scope="row">Penulis</th>
                        <td><?= esc($buku['penulis']) ?></td>
                    </tr>
                    <tr>
                        <th scope="row">Penerbit</th>
                        <td><?= esc($buku['penerbit']) ?></td>
                    </tr>
                    <tr>
                        <th scope="row">Tahun Terbit</th>
                        <td>
                            <span class="badge badge-year"><?= esc($buku['tahun_terbit']) ?></span>
                        </td>
                    </tr>
                    <tr>
                        <th scope="row">ID Buku</th>
                        <td style="color:var(--c-muted);">#<?= esc($buku['id']) ?></td>
                    </tr>
                </tbody>
            </table>

            <hr class="section-divider" style="margin-top:var(--sp-xl);">

            <!-- Actions row -->
            <div style="display:flex;gap:var(--sp-sm);flex-wrap:wrap;align-items:center;justify-content:space-between;">
                <div style="display:flex;gap:var(--sp-sm);flex-wrap:wrap;">
                    <a href="/buku/edit/<?= $buku['id'] ?>" class="btn btn-primary" aria-label="Edit buku ini">Edit Buku</a>
                    <a href="/buku" class="btn btn-secondary">← Daftar</a>
                </div>
                <a href="/buku/delete/<?= $buku['id'] ?>"
                   class="btn btn-danger"
                   onclick="return confirm('Yakin ingin menghapus buku ini?')"
                   aria-label="Hapus buku ini">Hapus</a>
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
