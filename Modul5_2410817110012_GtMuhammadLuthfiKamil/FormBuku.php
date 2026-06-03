<?php
require_once 'Model.php';

$id = '';
$judul = '';
$penulis = '';
$penerbit = '';
$tahun = '';

$isEdit = false;

// Cek apakah mode edit
if (isset($_GET['id'])) {
    $isEdit = true;
    $id = $_GET['id'];
    $data = getBukuById($id);
    if ($data) {
        $judul = $data['judul_buku'];
        $penulis = $data['penulis'];
        $penerbit = $data['penerbit'];
        $tahun = $data['tahun_terbit'];
    } else {
        header("Location: Buku.php");
        exit;
    }
}

// Handle submit
if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    $judul_post = $_POST['judul_buku'];
    $penulis_post = $_POST['penulis'];
    $penerbit_post = $_POST['penerbit'];
    $tahun_post = $_POST['tahun_terbit'];

    if (isset($_POST['id_buku']) && $_POST['id_buku'] !== '') {
        // Update
        updateBuku($_POST['id_buku'], $judul_post, $penulis_post, $penerbit_post, $tahun_post);
    } else {
        // Insert
        insertBuku($judul_post, $penulis_post, $penerbit_post, $tahun_post);
    }
    
    header("Location: Buku.php");
    exit;
}
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title><?= $isEdit ? 'Edit' : 'Tambah' ?> Data Buku</title>
    <link rel="stylesheet" href="style.css">
</head>
<body>
    <div class="dashboard-container">
        <!-- Sidebar -->
        <aside class="sidebar">
            <div class="sidebar-header">
                <h2>Data Buku</h2>
            </div>
            <ul class="sidebar-menu">
                <li><a href="Buku.php">Kembali</a></li>
            </ul>
        </aside>

        <!-- Main Content -->
        <main class="main-content">
            <div class="page-header">
                <h1><?= $isEdit ? 'Form Edit Data Buku' : 'Form Tambah Data Buku' ?></h1>
            </div>

            <div class="form-card">
                <form method="POST" action="">
                    <?php if ($isEdit): ?>
                        <input type="hidden" name="id_buku" value="<?= htmlspecialchars($id) ?>">
                    <?php endif; ?>

                    <div class="form-group">
                        <label for="judul_buku">Judul Buku</label>
                        <input type="text" id="judul_buku" name="judul_buku" class="form-control" value="<?= htmlspecialchars($judul) ?>" required>
                    </div>

                    <div class="form-group">
                        <label for="penulis">Penulis</label>
                        <input type="text" id="penulis" name="penulis" class="form-control" value="<?= htmlspecialchars($penulis) ?>" required>
                    </div>

                    <div class="form-group">
                        <label for="penerbit">Penerbit</label>
                        <input type="text" id="penerbit" name="penerbit" class="form-control" value="<?= htmlspecialchars($penerbit) ?>" required>
                    </div>

                    <div class="form-group">
                        <label for="tahun_terbit">Tahun Terbit</label>
                        <input type="number" id="tahun_terbit" name="tahun_terbit" class="form-control" value="<?= htmlspecialchars($tahun) ?>" required>
                    </div>

                    <div class="form-group" style="margin-top: 2rem;">
                        <button type="submit" class="btn btn-primary" style="width: 100%; padding: 0.8rem; font-size: 1rem;">
                            <?= $isEdit ? 'Update Data' : 'Simpan Data' ?>
                        </button>
                    </div>
                </form>
            </div>
        </main>
    </div>
</body>
</html>
