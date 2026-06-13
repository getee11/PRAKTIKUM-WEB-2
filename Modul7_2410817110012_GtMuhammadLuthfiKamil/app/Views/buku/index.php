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
        <span class="sub-nav__title">Daftar Buku</span>
        <div class="sub-nav__actions">
            <a href="/buku/create" class="btn btn-primary btn--sm" aria-label="Tambah buku baru">+ Tambah Buku</a>
        </div>
    </div>
</div>

<!-- ─── Main Content ─── -->
<main>
    <div class="container">

        <!-- Flash alert -->
        <?php if ($alert): ?>
            <div class="alert alert-success" role="status" style="margin-top:var(--sp-xl);">
                <?= esc($alert) ?>
            </div>
        <?php endif; ?>

        <?php if (empty($buku)): ?>
            <!-- ─── Empty State ─── -->
            <div class="empty-state">
                <span class="empty-state__icon" aria-hidden="true">📖</span>
                <h2 class="empty-state__title">Belum ada buku</h2>
                <p class="empty-state__body">Tambahkan buku pertama Anda ke dalam koleksi.</p>
                <a href="/buku/create" class="btn btn-hero">+ Tambah Buku Pertama</a>
            </div>

        <?php else: ?>
            <!-- ─── Book Grid ─── -->
            <div class="book-grid" role="list" aria-label="Daftar buku">
                <?php $i = 1; foreach ($buku as $row): ?>
                <article class="book-card" role="listitem">
                    <div class="book-card__cover" aria-hidden="true">
                        <?php
                        $covers = ['📗','📘','📙','📕','📓','📔','📒','📃'];
                        echo $covers[($row['id'] - 1) % count($covers)];
                        ?>
                    </div>

                    <div class="book-card__number">#<?= $i++ ?></div>

                    <h3 class="book-card__title">
                        <a href="/buku/show/<?= $row['id'] ?>" style="color:inherit;text-decoration:none;font:inherit;">
                            <?= esc($row['judul']) ?>
                        </a>
                    </h3>

                    <div class="book-card__author"><?= esc($row['penulis']) ?></div>
                    <div class="book-card__author" style="font-size:12px;"><?= esc($row['penerbit']) ?></div>

                    <div class="book-card__meta">
                        <span class="badge badge-year"><?= esc($row['tahun_terbit']) ?></span>
                    </div>

                    <div class="book-card__actions">
                        <a href="/buku/show/<?= $row['id'] ?>" class="btn btn-pearl btn--sm" aria-label="Detail <?= esc($row['judul']) ?>">Detail</a>
                        <a href="/buku/edit/<?= $row['id'] ?>" class="btn btn-pearl btn--sm" aria-label="Edit <?= esc($row['judul']) ?>">Edit</a>
                        <a href="/buku/delete/<?= $row['id'] ?>"
                           class="btn btn-danger btn--sm"
                           aria-label="Hapus <?= esc($row['judul']) ?>"
                           onclick="return confirm('Yakin ingin menghapus buku ini?')">Hapus</a>
                    </div>
                </article>
                <?php endforeach; ?>
            </div>

            <!-- Table view (secondary) -->
            <div class="card" style="margin-bottom:var(--sp-xxl);">
                <h2 style="font-family:var(--f-display);font-size:24px;font-weight:400;letter-spacing:1.5px;text-transform:uppercase;margin-bottom:var(--sp-lg);color:var(--c-on-dark);">
                    Tampilan Tabel
                </h2>
                <div class="table-wrap">
                    <table class="apple-table" aria-label="Tabel daftar buku">
                        <thead>
                            <tr>
                                <th scope="col">No</th>
                                <th scope="col">Judul</th>
                                <th scope="col">Penulis</th>
                                <th scope="col">Penerbit</th>
                                <th scope="col">Tahun</th>
                                <th scope="col">Aksi</th>
                            </tr>
                        </thead>
                        <tbody>
                            <?php $j = 1; foreach ($buku as $row): ?>
                            <tr>
                                <td class="td-muted"><?= $j++ ?></td>
                                <td class="td-strong"><?= esc($row['judul']) ?></td>
                                <td><?= esc($row['penulis']) ?></td>
                                <td class="td-muted"><?= esc($row['penerbit']) ?></td>
                                <td><span class="badge badge-year"><?= esc($row['tahun_terbit']) ?></span></td>
                                <td>
                                    <div class="td-actions">
                                        <a href="/buku/show/<?= $row['id'] ?>" class="btn btn-pearl btn--sm">Detail</a>
                                        <a href="/buku/edit/<?= $row['id'] ?>" class="btn btn-pearl btn--sm">Edit</a>
                                        <a href="/buku/delete/<?= $row['id'] ?>"
                                           class="btn btn-danger btn--sm"
                                           onclick="return confirm('Yakin ingin menghapus buku ini?')">Hapus</a>
                                    </div>
                                </td>
                            </tr>
                            <?php endforeach; ?>
                        </tbody>
                    </table>
                </div>
            </div>

        <?php endif; ?>

        <div style="padding:var(--sp-lg) 0 var(--sp-xxl);">
            <a href="/dashboard" class="text-link text-link--sm">← Kembali ke Dashboard</a>
        </div>
    </div>
</main>

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
