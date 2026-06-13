<?= $this->extend('layout') ?>
<?= $this->section('content') ?>

<div class="auth-page">
    <div class="auth-card">

        <!-- Brand mark -->
        <div class="auth-brand">Pustaka</div>

        <h1 class="auth-title">Login</h1>
        <p class="auth-sub">Masuk untuk mengelola koleksi buku Anda.</p>

        <!-- Flash danger alert (wrong credentials etc.) -->
        <?php if (!empty($alert) && session()->getFlashdata('success') === null): ?>
            <div class="alert alert-danger" role="alert">
                <?= esc($alert) ?>
            </div>
        <?php endif; ?>

        <!-- Success alert (e.g. after register) -->
        <?php if (!empty($success)): ?>
            <div class="alert alert-success" role="status">
                <?= esc($success) ?>
            </div>
        <?php endif; ?>

        <form action="/login" method="post" novalidate>
            <?= csrf_field() ?>

            <div class="form-group">
                <label for="email" class="form-label">Email</label>
                <input
                    type="email"
                    name="email"
                    id="email"
                    class="form-input <?= ($validation && $validation->hasError('email')) ? 'is-invalid' : '' ?>"
                    value="<?= old('email') ?>"
                    placeholder="email@contoh.com"
                    autocomplete="email"
                    required
                >
                <?php if ($validation && $validation->hasError('email')): ?>
                    <div class="form-error" role="alert"><?= esc($validation->getError('email')) ?></div>
                <?php endif; ?>
            </div>

            <div class="form-group">
                <label for="password" class="form-label">Password</label>
                <input
                    type="password"
                    name="password"
                    id="password"
                    class="form-input"
                    placeholder="Masukkan password"
                    autocomplete="current-password"
                    required
                >
            </div>

            <button type="submit" class="btn btn-primary btn--full" style="margin-top:var(--sp-sm);">
                Login
            </button>
        </form>

        <hr class="auth-divider">

        <div class="auth-footer">
            Belum punya akun?
            <a href="/register" class="text-link text-link--sm">Daftar sekarang</a>
        </div>

    </div>
</div>

<?= $this->endSection() ?>
