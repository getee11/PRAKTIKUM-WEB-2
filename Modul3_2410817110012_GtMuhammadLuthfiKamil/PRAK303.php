<?php

$starImage = 'star.png';

if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    $batasBawah = (int)$_POST['batas_bawah'];
    $batasAtas = (int)$_POST['batas_atas'];

    $deret = [];
    $i = $batasBawah;

    do {
        if (($i + 7) % 5 == 0) {
            $deret[] = '<img src="' . $starImage . '" alt="star" style="width:24px;">';
        } else {
            $deret[] = $i;
        }
        $i++;
    } while ($i <= $batasAtas);

    $output = implode(' ', $deret);
}
?>

<!DOCTYPE html>
<html>
<head>
    <title>PRAK303</title>
</head>
<body>
    <form method="POST">
        <p>Batas Bawah: <input type="number" name="batas_bawah" value="<?= isset($batasBawah) ? $batasBawah : 1 ?>" required></p>
        <p>Batas Atas: <input type="number" name="batas_atas" value="<?= isset($batasAtas) ? $batasAtas : 20 ?>" required></p>
        <button type="submit">Tampilkan</button>
    </form>

    <?php if (isset($output)): ?>
        <h3>Output:</h3>
        <p><?= $output ?></p>
    <?php endif; ?>
</body>
</html>