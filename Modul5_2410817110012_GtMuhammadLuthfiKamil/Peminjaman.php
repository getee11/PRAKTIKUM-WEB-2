<?php
require_once 'Model.php';

// Handle delete
if (isset($_GET['hapus'])) {
    $id = $_GET['hapus'];
    deletePeminjaman($id);
    header("Location: Peminjaman.php");
    exit;
}

$peminjamanList = getPeminjaman();
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Data Peminjaman</title>
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
                <li><a href="Index.php">Kembali</a></li>
                <li><a href="FormPeminjaman.php">Tambah Data Peminjaman</a></li>
            </ul>
        </aside>

        <!-- Main Content -->
        <main class="main-content">
            <div class="page-header">
                <h1>Daftar Peminjaman Perpustakaan Gete</h1>
            </div>

            <div class="table-container">
                <table class="table-custom">
                    <thead>
                        <tr>
                            <th>ID</th>
                            <th>Member</th>
                            <th>Buku</th>
                            <th>Tanggal Pinjam</th>
                            <th>Tanggal Kembali</th>
                            <th>Opsi</th>
                        </tr>
                    </thead>
                    <tbody>
                        <?php if (count($peminjamanList) > 0): ?>
                            <?php foreach ($peminjamanList as $row): ?>
                            <tr>
                                <td><?= htmlspecialchars($row['id_peminjaman']) ?></td>
                                <td><?= htmlspecialchars($row['nama_member']) ?></td>
                                <td><?= htmlspecialchars($row['judul_buku']) ?></td>
                                <td><?= htmlspecialchars($row['tgl_pinjam']) ?></td>
                                <td><?= htmlspecialchars($row['tgl_kembali']) ?></td>
                                <td>
                                    <div class="action-buttons">
                                        <a href="Peminjaman.php?hapus=<?= $row['id_peminjaman'] ?>" class="btn btn-danger" onclick="return confirm('Yakin ingin menghapus data ini?');">Hapus</a>
                                        <a href="FormPeminjaman.php?id=<?= $row['id_peminjaman'] ?>" class="btn btn-warning">Ubah</a>
                                    </div>
                                </td>
                            </tr>
                            <?php endforeach; ?>
                        <?php else: ?>
                            <tr>
                                <td colspan="6" style="text-align: center;">Tidak ada data peminjaman.</td>
                            </tr>
                        <?php endif; ?>
                    </tbody>
                </table>
            </div>
        </main>
    </div>
</body>
</html>
