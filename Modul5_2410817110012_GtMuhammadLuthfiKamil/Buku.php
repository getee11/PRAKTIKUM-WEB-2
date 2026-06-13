<?php
require_once 'Model.php';

// Handle delete
if (isset($_GET['hapus'])) {
    $id = $_GET['hapus'];
    deleteBuku($id);
    header("Location: Buku.php");
    exit;
}

$bukuList = getBuku();
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Data Buku</title>
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
                <li><a href="Index.php">Kembali</a></li>
                <li><a href="FormBuku.php">Tambah Data Buku</a></li>
            </ul>
        </aside>

        <!-- Main Content -->
        <main class="main-content">
            <div class="page-header">
                <h1>Daftar Buku Perpustakaan Gete</h1>
            </div>

            <div class="table-container">
                <table class="table-custom">
                    <thead>
                        <tr>
                            <th>ID Buku</th>
                            <th>Judul Buku</th>
                            <th>Penulis</th>
                            <th>Penerbit</th>
                            <th>Tahun Terbit</th>
                            <th>Opsi</th>
                        </tr>
                    </thead>
                    <tbody>
                        <?php if (count($bukuList) > 0): ?>
                            <?php foreach ($bukuList as $row): ?>
                            <tr>
                                <td><?= htmlspecialchars($row['id_buku']) ?></td>
                                <td><?= htmlspecialchars($row['judul_buku']) ?></td>
                                <td><?= htmlspecialchars($row['penulis']) ?></td>
                                <td><?= htmlspecialchars($row['penerbit']) ?></td>
                                <td><?= htmlspecialchars($row['tahun_terbit']) ?></td>
                                <td>
                                    <div class="action-buttons">
                                        <a href="Buku.php?hapus=<?= $row['id_buku'] ?>" class="btn btn-danger" onclick="return confirm('Yakin ingin menghapus data ini?');">Hapus</a>
                                        <a href="FormBuku.php?id=<?= $row['id_buku'] ?>" class="btn btn-warning">Ubah</a>
                                    </div>
                                </td>
                            </tr>
                            <?php endforeach; ?>
                        <?php else: ?>
                            <tr>
                                <td colspan="6" style="text-align: center;">Tidak ada data buku.</td>
                            </tr>
                        <?php endif; ?>
                    </tbody>
                </table>
            </div>
        </main>
    </div>
</body>
</html>
