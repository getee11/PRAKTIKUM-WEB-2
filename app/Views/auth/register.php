<?= $this->extend('layout') ?>
<?= $this->section('content') ?>

<div class="auth-page">
    <div class="auth-card">

        <!-- Brand mark -->
        <div class="auth-brand">Pustaka</div>

        <h1 class="auth-title">Register</h1>
        <p class="auth-sub">Buat akun baru untuk mulai mengelola buku.</p>

        <!-- Validation summary -->
        <?php if ($validation && count($validation->getErrors()) > 0): ?>
            <div class="alert alert-danger" role="alert">
                <?php foreach ($validation->getErrors() as $error): ?>
                    <?= esc($error) ?><br>
                <?php endforeach; ?>
            </div>
        <?php endif; ?>

        <form action="/register" method="post" novalidate>
            <?= csrf_field() ?>

            <div class="form-group">
                <label for="username" class="form-label">Username</label>
                <input
                    type="text"
                    name="username"
                    id="username"
                    class="form-input <?= ($validation && $validation->hasError('username')) ? 'is-invalid' : '' ?>"
                    value="<?= old('username') ?>"
                    placeholder="Nama pengguna (min. 3 karakter)"
                    autocomplete="username"
                    required
                >
                <?php if ($validation && $validation->hasError('username')): ?>
                    <div class="form-error" role="alert"><?= esc($validation->getError('username')) ?></div>
                <?php endif; ?>
            </div>

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
                    class="form-input <?= ($validation && $validation->hasError('password')) ? 'is-invalid' : '' ?>"
                    placeholder="Minimal 6 karakter"
                    autocomplete="new-password"
                    required
                >
                <?php if ($validation && $validation->hasError('password')): ?>
                    <div class="form-error" role="alert"><?= esc($validation->getError('password')) ?></div>
                <?php endif; ?>
            </div>

            <div class="form-group">
                <label for="password_confirm" class="form-label">Konfirmasi Password</label>
                <input
                    type="password"
                    name="password_confirm"
                    id="password_confirm"
                    class="form-input <?= ($validation && $validation->hasError('password_confirm')) ? 'is-invalid' : '' ?>"
                    placeholder="Ulangi password"
                    autocomplete="new-password"
                    required
                >
                <?php if ($validation && $validation->hasError('password_confirm')): ?>
                    <div class="form-error" role="alert"><?= esc($validation->getError('password_confirm')) ?></div>
                <?php endif; ?>
            </div>

            <button type="submit" class="btn btn-primary btn--full" style="margin-top:var(--sp-sm);">
                Buat Akun
            </button>
        </form>

        <hr class="auth-divider">

        <div class="auth-footer">
            Sudah punya akun?
            <a href="/login" class="text-link text-link--sm">Login</a>
        </div>

    </div>
</div>

<?= $this->endSection() ?>
