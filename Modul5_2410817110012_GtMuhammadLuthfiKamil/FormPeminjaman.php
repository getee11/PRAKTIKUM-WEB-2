<?php
require_once 'Model.php';

$id = '';
$tgl_pinjam = '';
$tgl_kembali = '';
$id_member_val = '';
$id_buku_val = '';

$isEdit = false;

// Get available books and members for dropdown
$bukuList = getBuku();
$memberList = getMember();

// Cek apakah mode edit
if (isset($_GET['id'])) {
    $isEdit = true;
    $id = $_GET['id'];
    $data = getPeminjamanById($id);
    if ($data) {
        $tgl_pinjam = $data['tgl_pinjam'];
        $tgl_kembali = $data['tgl_kembali'];
        $id_member_val = $data['id_member'];
        $id_buku_val = $data['id_buku'];
    } else {
        header("Location: Peminjaman.php");
        exit;
    }
}

// Handle submit
if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    $tgl_pinjam_post = $_POST['tgl_pinjam'];
    $tgl_kembali_post = $_POST['tgl_kembali'];
    $id_member_post = $_POST['id_member'];
    $id_buku_post = $_POST['id_buku'];

    if (isset($_POST['id_peminjaman']) && $_POST['id_peminjaman'] !== '') {
        // Update
        updatePeminjaman($_POST['id_peminjaman'], $tgl_pinjam_post, $tgl_kembali_post, $id_member_post, $id_buku_post);
    } else {
        // Insert
        insertPeminjaman($tgl_pinjam_post, $tgl_kembali_post, $id_member_post, $id_buku_post);
    }
    
    header("Location: Peminjaman.php");
    exit;
}
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title><?= $isEdit ? 'Edit' : 'Tambah' ?> Data Peminjaman</title>
    <link rel="stylesheet" href="style.css">
</head>
<body>
    <div class="dashboard-container">
        <!-- Sidebar -->
        <aside class="sidebar">
            <div class="sidebar-header">
                <h2>Data Peminjaman</h2>
            </div>
            <ul class="sidebar-menu">
                <li><a href="Peminjaman.php">Kembali</a></li>
            </ul>
        </aside>

        <!-- Main Content -->
        <main class="main-content">
            <div class="page-header">
                <h1><?= $isEdit ? 'Form Edit Data Peminjaman' : 'Form Tambah Data Peminjaman' ?></h1>
            </div>

            <div class="form-card">
                <form method="POST" action="">
                    <?php if ($isEdit): ?>
                        <input type="hidden" name="id_peminjaman" value="<?= htmlspecialchars($id) ?>">
                    <?php endif; ?>

                    <div class="form-group">
                        <label for="id_member">Pilih Member</label>
                        <select id="id_member" name="id_member" class="form-control" required>
                            <option value="">-- Pilih Member --</option>
                            <?php foreach ($memberList as $m): ?>
                                <option value="<?= $m['id_member'] ?>" <?= ($m['id_member'] == $id_member_val) ? 'selected' : '' ?>>
                                    <?= htmlspecialchars($m['nama_member']) ?> (<?= htmlspecialchars($m['nomor_member']) ?>)
                                </option>
                            <?php endforeach; ?>
                        </select>
                    </div>

                    <div class="form-group">
                        <label for="id_buku">Pilih Buku</label>
                        <select id="id_buku" name="id_buku" class="form-control" required>
                            <option value="">-- Pilih Buku --</option>
                            <?php foreach ($bukuList as $b): ?>
                                <option value="<?= $b['id_buku'] ?>" <?= ($b['id_buku'] == $id_buku_val) ? 'selected' : '' ?>>
                                    <?= htmlspecialchars($b['judul_buku']) ?>
                                </option>
                            <?php endforeach; ?>
                        </select>
                    </div>

                    <div class="form-group">
                        <label for="tgl_pinjam">Tanggal Pinjam</label>
                        <input type="date" id="tgl_pinjam" name="tgl_pinjam" class="form-control" value="<?= htmlspecialchars($tgl_pinjam) ?>" required>
                    </div>

                    <div class="form-group">
                        <label for="tgl_kembali">Tanggal Kembali</label>
                        <input type="date" id="tgl_kembali" name="tgl_kembali" class="form-control" value="<?= htmlspecialchars($tgl_kembali) ?>" required>
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
