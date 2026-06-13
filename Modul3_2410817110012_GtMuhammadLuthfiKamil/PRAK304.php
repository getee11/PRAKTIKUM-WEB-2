<?php

session_start();

$starImage = 'star.png';
$jumlahBintang = 0;

if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    if (isset($_POST['submit'])) {
        $jumlahBintang = (int)$_POST['jumlah'];
        $_SESSION['jumlah_bintang'] = $jumlahBintang;
    } elseif (isset($_POST['tambah'])) {
        $_SESSION['jumlah_bintang'] = isset($_SESSION['jumlah_bintang']) ? $_SESSION['jumlah_bintang'] + 1 : 1;
        $jumlahBintang = $_SESSION['jumlah_bintang'];
    } elseif (isset($_POST['kurang'])) {
        $_SESSION['jumlah_bintang'] = isset($_SESSION['jumlah_bintang']) ? max(0, $_SESSION['jumlah_bintang'] - 1) : 0;
        $jumlahBintang = $_SESSION['jumlah_bintang'];
    }
}

$submitted = isset($_SESSION['jumlah_bintang']);
if ($submitted && !isset($jumlahBintang)) {
    $jumlahBintang = $_SESSION['jumlah_bintang'];
}
?>

<!DOCTYPE html>
<html>
<head>
    <title>PRAK304</title>
</head>
<body>
    
    <?php if (!$submitted): ?>
        <form method="POST">
            <p>Jumlah: <input type="number" name="jumlah" min="0" max="20" required></p>
            <button type="submit" name="submit">Submit</button>
        </form>
    <?php else: ?>
        <form method="POST">
            <p>Jumlah: <input type="number" value="<?= $jumlahBintang ?>" readonly></p>
            <button type="submit" name="tambah">Tambah</button>
            <button type="submit" name="kurang">Kurang</button>
        </form>

        <p>
            <?php
            $i = 1;
            while ($i <= $jumlahBintang) {
                echo '<img src="' . $starImage . '" alt="star" style="width:40px;">';
                $i++;
            }
            ?>
        </p>
    <?php endif; ?>
</body>
</html>