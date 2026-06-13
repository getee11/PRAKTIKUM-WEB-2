<?php
require_once 'Model.php';

$id = '';
$nama = '';
$nomor = '';
$alamat = '';
$tgl_mendaftar = '';
$tgl_terakhir_bayar = '';

$isEdit = false;

// Cek apakah mode edit
if (isset($_GET['id'])) {
    $isEdit = true;
    $id = $_GET['id'];
    $data = getMemberById($id);
    if ($data) {
        $nama = $data['nama_member'];
        $nomor = $data['nomor_member'];
        $alamat = $data['alamat'];
        // Format datetime for HTML5 datetime-local input
        $tgl_mendaftar = date('Y-m-d\TH:i', strtotime($data['tgl_mendaftar']));
        $tgl_terakhir_bayar = $data['tgl_terakhir_bayar'];
    } else {
        header("Location: Member.php");
        exit;
    }
}

// Handle submit
if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    $nama_post = $_POST['nama_member'];
    $nomor_post = $_POST['nomor_member'];
    $alamat_post = $_POST['alamat'];
    // Convert HTML5 datetime-local to MySQL datetime
    $tgl_mendaftar_post = date('Y-m-d H:i:s', strtotime($_POST['tgl_mendaftar']));
    $tgl_terakhir_bayar_post = $_POST['tgl_terakhir_bayar'];

    if (isset($_POST['id_member']) && $_POST['id_member'] !== '') {
        // Update
        updateMember($_POST['id_member'], $nama_post, $nomor_post, $alamat_post, $tgl_mendaftar_post, $tgl_terakhir_bayar_post);
    } else {
        // Insert
        insertMember($nama_post, $nomor_post, $alamat_post, $tgl_mendaftar_post, $tgl_terakhir_bayar_post);
    }
    
    header("Location: Member.php");
    exit;
}
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title><?= $isEdit ? 'Edit' : 'Tambah' ?> Data Member</title>
    <link rel="stylesheet" href="style.css">
</head>
<body>
    <div class="dashboard-container">
        <!-- Sidebar -->
        <aside class="sidebar">
            <div class="sidebar-header">
                <h2>Data Member</h2>
            </div>
            <ul class="sidebar-menu">
                <li><a href="Member.php">Kembali</a></li>
            </ul>
        </aside>

        <!-- Main Content -->
        <main class="main-content">
            <div class="page-header">
                <h1><?= $isEdit ? 'Form Edit Data Member' : 'Form Tambah Data Member' ?></h1>
            </div>

            <div class="form-card">
                <form method="POST" action="">
                    <?php if ($isEdit): ?>
                        <input type="hidden" name="id_member" value="<?= htmlspecialchars($id) ?>">
                    <?php endif; ?>

                    <div class="form-group">
                        <label for="nama_member">Nama Member</label>
                        <input type="text" id="nama_member" name="nama_member" class="form-control" value="<?= htmlspecialchars($nama) ?>" required>
                    </div>

                    <div class="form-group">
                        <label for="nomor_member">Nomor Member</label>
                        <input type="text" id="nomor_member" name="nomor_member" class="form-control" value="<?= htmlspecialchars($nomor) ?>" required>
                    </div>

                    <div class="form-group">
                        <label for="alamat">Alamat</label>
                        <textarea id="alamat" name="alamat" class="form-control" required><?= htmlspecialchars($alamat) ?></textarea>
                    </div>

                    <div class="form-group">
                        <label for="tgl_mendaftar">Tanggal Mendaftar</label>
                        <input type="datetime-local" id="tgl_mendaftar" name="tgl_mendaftar" class="form-control" value="<?= htmlspecialchars($tgl_mendaftar) ?>" required>
                    </div>

                    <div class="form-group">
                        <label for="tgl_terakhir_bayar">Tanggal Terakhir Bayar</label>
                        <input type="date" id="tgl_terakhir_bayar" name="tgl_terakhir_bayar" class="form-control" value="<?= htmlspecialchars($tgl_terakhir_bayar) ?>" required>
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
