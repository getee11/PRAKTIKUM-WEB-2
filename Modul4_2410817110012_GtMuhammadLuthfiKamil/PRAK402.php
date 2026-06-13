<html>
<head>
    <title>PRAK402</title>
</head>
<body>
    
    <?php
    $mahasiswa = [
        ["Nama" => "Andi", "NIM" => "2101001", "Nilai UTS" => 87, "Nilai UAS" => 65],
        ["Nama" => "Budi", "NIM" => "2101002", "Nilai UTS" => 76, "Nilai UAS" => 79],
        ["Nama" => "Tono", "NIM" => "2101003", "Nilai UTS" => 50, "Nilai UAS" => 41],
        ["Nama" => "Jessica", "NIM" => "2101004", "Nilai UTS" => 60, "Nilai UAS" => 75]
    ];
    
    function getHuruf($nilaiAkhir) {
        if ($nilaiAkhir >= 80) return "A";
        elseif ($nilaiAkhir >= 70) return "B";
        elseif ($nilaiAkhir >= 60) return "C";
        elseif ($nilaiAkhir >= 50) return "D";
        else return "E";
    }
    
    foreach ($mahasiswa as &$mhs) {
        $mhs["Nilai Akhir"] = (0.4 * $mhs["Nilai UTS"]) + (0.6 * $mhs["Nilai UAS"]);
        $mhs["Huruf"] = getHuruf($mhs["Nilai Akhir"]);
    }
    unset($mhs);
    
    echo "<table border='1' cellpadding='8'>";
    echo "<tr>
            <th>Nama</th>
            <th>NIM</th>
            <th>Nilai UTS</th>
            <th>Nilai UAS</th>
            <th>Nilai Akhir</th>
            <th>Huruf</th>
          </tr>";
    
    foreach ($mahasiswa as $mhs) {
        echo "<tr>
                <td>{$mhs['Nama']}</td>
                <td>{$mhs['NIM']}</td>
                <td>{$mhs['Nilai UTS']}</td>
                <td>{$mhs['Nilai UAS']}</td>
                <td>{$mhs['Nilai Akhir']}</td>
                <td>{$mhs['Huruf']}</td>
              </tr>";
    }
    echo "</table>";
    ?>
</body>
</html>