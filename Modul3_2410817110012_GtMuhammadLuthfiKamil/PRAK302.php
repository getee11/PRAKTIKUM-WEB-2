<?php

$defaultImage = 'https://cdn0.iconfinder.com/data/icons/web-and-mobile-icons-volume-2/128/52-512.png';
$output = '';

if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    $tinggi = (int)$_POST['tinggi'];
    $linkGambar = !empty($_POST['link_gambar']) ? $_POST['link_gambar'] : $defaultImage;
    $tinggi = max(1, min($tinggi, 15)); 

    $output .= '<div style="display: inline-block; text-align: right; margin-top: 15px;">';

    $baris = $tinggi;
    while ($baris >= 1) {
        $k = 1;
        $rowImages = '';
        while ($k <= $baris) {
            $rowImages .= '<img src="' . htmlspecialchars($linkGambar) . '" alt="icon" style="width:30px; margin: 2px;">';
            $k++;
        }
        $output .= $rowImages . '<br>';
        $baris--;
    }
    
    $output .= '</div>';
}
?>

<!DOCTYPE html>
<html>
<head>
    <title>PRAK302</title>
</head>
<body>
    <form method="POST">
        <div style="margin-bottom: 5px;">
            <label for="tinggi">Tinggi : </label>
            <input type="number" id="tinggi" name="tinggi" min="1" max="15" required>
        </div>
        <div style="margin-bottom: 5px;">
            <label for="link_gambar">Alamat Gambar : </label>
            <input type="url" id="link_gambar" name="link_gambar" placeholder="<?= $defaultImage ?>" size="40">
        </div>
        <button type="submit">Cetak</button>
    </form>

    <?php if (!empty($output)): ?>
        <?= $output ?>
    <?php endif; ?>
</body>
</html>