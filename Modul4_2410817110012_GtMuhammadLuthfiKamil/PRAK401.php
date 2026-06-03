<html>
<head>
    <title>PRAK401</title>
</head>
<body>
    <form method="post">
        <p>Panjang: <input type="number" name="panjang" required></p>
        <p>Lebar: <input type="number" name="lebar" required></p>
        <p>Nilai: <input type="text" name="nilai" placeholder="pisahkan dengan spasi" required></p>
        <button type="submit">Cetak</button>
    </form>
    
    <?php
    if ($_SERVER["REQUEST_METHOD"] == "POST") {
        $panjang = $_POST['panjang'];
        $lebar = $_POST['lebar'];
        $nilai = trim($_POST['nilai']);
        
        $arrayNilai = explode(" ", $nilai);
        $jumlahElemen = $panjang * $lebar;
        
        if (count($arrayNilai) != $jumlahElemen) {
            echo "<p style='color:red;'>Panjang nilai tidak sesuai dengan ukuran matriks</p>";
        } else {
            echo "<table border='1' cellpadding='5'>";
            $index = 0;
            for ($i = 0; $i < $panjang; $i++) {
                echo "<tr>";
                for ($j = 0; $j < $lebar; $j++) {
                    echo "<td>" . $arrayNilai[$index] . "</td>";
                    $index++;
                }
                echo "</tr>";
            }
            echo "</table>";
        }
    }
    ?>
</body>
</html>