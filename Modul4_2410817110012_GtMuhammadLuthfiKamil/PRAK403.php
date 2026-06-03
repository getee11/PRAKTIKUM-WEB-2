<html>
<head>
    <title>PRAK403</title>
    <style>
        .revisi { background-color: red; color: white; }
        .tidak-revisi { background-color: green; color: white; }
    </style>
</head>
<body>
    
    <?php
    $mahasiswa = [
        [
            "No" => 1,
            "Nama" => "Ridho",
            "Mata Kuliah" => [
                ["nama" => "Pemrograman I", "sks" => 2],
                ["nama" => "Praktikum Pemrograman I", "sks" => 1],
                ["nama" => "Pengantar Lingkungan Lahan Basah", "sks" => 2],
                ["nama" => "Arsitektur Komputer", "sks" => 3]
            ]
        ],
        [
            "No" => 2,
            "Nama" => "Ratna",
            "Mata Kuliah" => [
                ["nama" => "Basis Data I", "sks" => 2],
                ["nama" => "Praktikum Basis Data I", "sks" => 1],
                ["nama" => "Kalkulus", "sks" => 3]
            ]
        ],
        [
            "No" => 3,
            "Nama" => "Tono",
            "Mata Kuliah" => [
                ["nama" => "Rekayasa Perangkat Lunak", "sks" => 3],
                ["nama" => "Analisis dan Perancangan Sistem", "sks" => 3],
                ["nama" => "Komputasi Awan", "sks" => 3],
                ["nama" => "Kecerdasan Bisnis", "sks" => 3]
            ]
        ]
    ];
    
    foreach ($mahasiswa as &$mhs) {
        $totalSKS = 0;
        foreach ($mhs["Mata Kuliah"] as $mk) {
            $totalSKS += $mk["sks"];
        }
        $mhs["Total SKS"] = $totalSKS;
        $mhs["Keterangan"] = ($totalSKS < 7) ? "Revisi KRS" : "Tidak Revisi";
    }
    unset($mhs);
    
    echo "<table border='1' cellpadding='5' cellspacing='0'>";
    echo "<tr>
            <th>No</th>
            <th>Nama</th>
            <th>Mata Kuliah diambil</th>
            <th>SKS</th>
            <th>Total SKS</th>
            <th>Keterangan</th>
          </tr>";
    
    foreach ($mahasiswa as $mhs) {
        $ketClass = ($mhs["Keterangan"] == "Revisi KRS") ? "revisi" : "tidak-revisi";
        $first = true;
        
        foreach ($mhs["Mata Kuliah"] as $mk) {
            echo "<tr>";
            if ($first) {
                echo "<td>{$mhs['No']}</td>";
                echo "<td>{$mhs['Nama']}</td>";
            } else {
                echo "<td></td>";
                echo "<td></td>";
            }
            echo "<td>{$mk['nama']}</td>";
            echo "<td>{$mk['sks']}</td>";
            if ($first) {
                echo "<td>{$mhs['Total SKS']}</td>";
                echo "<td class='$ketClass'>{$mhs['Keterangan']}</td>";
            } else {
                echo "<td></td>";
                echo "<td></td>";
            }
            echo "</tr>";
            $first = false;
        }
    }
    echo "</table>";
    ?>
</body>
</html>