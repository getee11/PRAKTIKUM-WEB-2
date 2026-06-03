<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <title>PRAK202</title>
    <style>
        .error {
            color: red;
        }
    </style>
</head>
<body>
    <?php

    $pesanNama = $pesanNim = $pesanJk = "";
    $nama = $nim = $jk = "";

    if (isset($_POST['submit'])) {
        
        if (empty($_POST['nama'])) {
            $pesanNama = "nama tidak boleh kosong";
        } else {
            $nama = $_POST['nama'];
        }

        if (empty($_POST['nim'])) {
            $pesanNim = "nim tidak boleh kosong";
        } else {
            $nim = $_POST['nim'];
        }

        if (empty($_POST['jk'])) {
            $pesanJk = "jenis kelamin tidak boleh kosong";
        } else {
            $jk = $_POST['jk'];
        }
    }
    ?>

    <form method="post">
        Nama: 
        <input type="text" name="nama" value="<?= $nama ?>"> 
        <span class="error">* <?= $pesanNama ?></span><br><br>

        <input type="text" name="nim" value="<?= $nim ?>"> 
        <span class="error">* <?= $pesanNim ?></span><br><br>

        <span class="error">* <?= $pesanJk ?></span><br>
        
        <input type="radio" name="jk" value="Laki-Laki" <?= ($jk == "Laki-Laki") ? "checked" : "" ?>> Laki-Laki<br>
        <input type="radio" name="jk" value="Perempuan" <?= ($jk == "Perempuan") ? "checked" : "" ?>> Perempuan<br>
        <br>
        <button type="submit" name="submit">Submit</button>
    </form>

    <?php
    if (!empty($nama) && !empty($nim) && !empty($jk)) {
        echo "<h2>Hasil Input:</h2>";
        echo "$nama <br>";
        echo "$nim <br>";
        echo "$jk <br>";
    }
    ?>
</body>
</html>