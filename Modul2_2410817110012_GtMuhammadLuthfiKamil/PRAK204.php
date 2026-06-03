<!DOCTYPE html>
<html>
<head>
    <title>PRAK204</title>
</head>
<body>
    <h2>Ejaan Bilangan</h2>
    <form method="post">
        Masukkan Bilangan: <input type="number" name="bilangan"><br><br>
        <button type="submit">Ejakan</button>
    </form>
    
    <?php
    if (isset($_POST['bilangan'])) {
        $n = (int)$_POST['bilangan'];
        
        if ($n == 0) {
            echo "<h3>Hasil: Nol</h3>";
        } elseif ($n >= 1 && $n < 10) {
            echo "<h3>Hasil: Satuan</h3>";
        } elseif ($n >= 10 && $n < 20) {
            echo "<h3>Hasil: Belasan</h3>";
        } elseif ($n >= 20 && $n < 100) {
            echo "<h3>Hasil: Puluhan</h3>";
        } else {
            echo "<h3>Hasil: Ratusan</h3>";
        }
    }
    ?>
</body>
</html>
