<?php

$outputs = [];

if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    $jumlah = (int)$_POST['jumlah'];
    $i = 1;

    while ($i <= $jumlah) {
        $warna = ($i % 2 == 0) ? 'green' : 'red';
        $outputs[] = ['text' => 'Peserta ke-' . $i, 'warna' => $warna];
        $i++;
    }
}
?>

<!DOCTYPE html>
<html>
<head>
    <title>PRAK301</title>
</head>
<body>
    <form method="POST">
        <p>Jumlah: <input type="number" name="jumlah" min="1" required></p>
        <button type="submit">Cetak</button>
    </form>

    <?php if (!empty($outputs)): ?>
        <h3>Output:</h3>
        <?php foreach ($outputs as $item): ?>
            <p style="color: <?= $item['warna'] ?>;"><?= $item['text'] ?></p>
        <?php endforeach; ?>
    <?php endif; ?>
</body>
</html>