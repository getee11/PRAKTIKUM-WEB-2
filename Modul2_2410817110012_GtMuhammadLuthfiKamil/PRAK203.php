<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <title>PRAK203</title>
</head>
<body>
    <form method="post">
        Nilai : <input type="number" name="nilai" step="any" value="<?= isset($_POST['nilai']) ? $_POST['nilai'] : '' ?>"><br>
        
        Dari : <br>
        <input type="radio" name="dari" value="Celcius" <?= (isset($_POST['dari']) && $_POST['dari'] == "Celcius") ? "checked" : "" ?>> Celcius<br>
        <input type="radio" name="dari" value="Fahrenheit" <?= (isset($_POST['dari']) && $_POST['dari'] == "Fahrenheit") ? "checked" : "" ?>> Fahrenheit<br>
        <input type="radio" name="dari" value="Rheamur" <?= (isset($_POST['dari']) && $_POST['dari'] == "Rheamur") ? "checked" : "" ?>> Rheamur<br>
        <input type="radio" name="dari" value="Kelvin" <?= (isset($_POST['dari']) && $_POST['dari'] == "Kelvin") ? "checked" : "" ?>> Kelvin<br>
        
        Ke : <br>
        <input type="radio" name="ke" value="Celcius" <?= (isset($_POST['ke']) && $_POST['ke'] == "Celcius") ? "checked" : "" ?>> Celcius<br>
        <input type="radio" name="ke" value="Fahrenheit" <?= (isset($_POST['ke']) && $_POST['ke'] == "Fahrenheit") ? "checked" : "" ?>> Fahrenheit<br>
        <input type="radio" name="ke" value="Rheamur" <?= (isset($_POST['ke']) && $_POST['ke'] == "Rheamur") ? "checked" : "" ?>> Rheamur<br>
        <input type="radio" name="ke" value="Kelvin" <?= (isset($_POST['ke']) && $_POST['ke'] == "Kelvin") ? "checked" : "" ?>> Kelvin<br>
        
        <button type="submit" name="submit">Konversi</button>
    </form>

    <?php
    if (isset($_POST['submit'])) {
      $nilai = $_POST['nilai'] ?? 0; 
        $dari = $_POST['dari'] ?? '';
        $ke = $_POST['ke'] ?? '';

        $c = 0;
        if ($dari == "Celcius") {
            $c = $nilai;
        } elseif ($dari == "Fahrenheit") {
            $c = ($nilai - 32) * 5 / 9;
        } elseif ($dari == "Rheamur") {
            $c = $nilai * 5 / 4;
        } elseif ($dari == "Kelvin") {
            $c = $nilai - 273.15;
        }

        $hasil = 0;
        $simbol = "";
        
        if ($ke == "Celcius") {
            $hasil = $c;
            $simbol = "°C";
        } elseif ($ke == "Fahrenheit") {
            $hasil = ($c * 9 / 5) + 32;
            $simbol = "°F";
        } elseif ($ke == "Rheamur") {
            $hasil = $c * 4 / 5;
            $simbol = "°Re";
        } elseif ($ke == "Kelvin") {
            $hasil = $c + 273.15;
            $simbol = "°K";
        }

        echo "<h2>Hasil Konversi: " . number_format($hasil, 1) . " $simbol</h2>";
    }
    ?>
</body>
</html>