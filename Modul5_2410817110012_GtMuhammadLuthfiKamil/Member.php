<?php
require_once 'Model.php';

// Handle delete
if (isset($_GET['hapus'])) {
    $id = $_GET['hapus'];
    deleteMember($id);
    header("Location: Member.php");
    exit;
}

$memberList = getMember();
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Data Member</title>
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
                <li><a href="Index.php">Kembali</a></li>
                <li><a href="FormMember.php">Tambah Data Member</a></li>
            </ul>
        </aside>

        <!-- Main Content -->
        <main class="main-content">
            <div class="page-header">
                <h1>Daftar Member Perpustakaan Gete</h1>
            </div>

            <div class="table-container">
                <table class="table-custom">
                    <thead>
                        <tr>
                            <th>ID Member</th>
                            <th>Nama Member</th>
                            <th>Nomor Member</th>
                            <th>Alamat</th>
                            <th>Tgl Mendaftar</th>
                            <th>Tgl Terakhir Bayar</th>
                            <th>Opsi</th>
                        </tr>
                    </thead>
                    <tbody>
                        <?php if (count($memberList) > 0): ?>
                            <?php foreach ($memberList as $row): ?>
                            <tr>
                                <td><?= htmlspecialchars($row['id_member']) ?></td>
                                <td><?= htmlspecialchars($row['nama_member']) ?></td>
                                <td><?= htmlspecialchars($row['nomor_member']) ?></td>
                                <td><?= htmlspecialchars($row['alamat']) ?></td>
                                <td><?= htmlspecialchars($row['tgl_mendaftar']) ?></td>
                                <td><?= htmlspecialchars($row['tgl_terakhir_bayar']) ?></td>
                                <td>
                                    <div class="action-buttons">
                                        <a href="Member.php?hapus=<?= $row['id_member'] ?>" class="btn btn-danger" onclick="return confirm('Yakin ingin menghapus data ini?');">Hapus</a>
                                        <a href="FormMember.php?id=<?= $row['id_member'] ?>" class="btn btn-warning">Ubah</a>
                                    </div>
                                </td>
                            </tr>
                            <?php endforeach; ?>
                        <?php else: ?>
                            <tr>
                                <td colspan="7" style="text-align: center;">Tidak ada data member.</td>
                            </tr>
                        <?php endif; ?>
                    </tbody>
                </table>
            </div>
        </main>
    </div>
</body>
</html>
