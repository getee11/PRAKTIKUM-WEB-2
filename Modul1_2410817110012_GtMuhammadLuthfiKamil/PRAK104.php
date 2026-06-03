<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <title>PRAK104 - Indexed Array</title>
    <style>
        body {
            font-family: Arial, sans-serif;
            padding: 20px;
        }
        table {
            border-collapse: collapse;
            width: 250px;
        }
        th, td {
            border: 1px solid black;
            padding: 6px 10px;
            text-align: left;
        }
        th {
            background-color: white;
            font-weight: bold;
        }
    </style>
</head>
<body>

<?php

// Indexed Array
$smartphones = [
    "Samsung Galaxy S22",
    "Samsung Galaxy S22+",
    "Samsung Galaxy A03",
    "Samsung Galaxy Xcover 5"
];
?>

<table>
    <tr>
        <th>Daftar Smartphone Samsung</th>
    </tr>
    <?php foreach ($smartphones as $item): ?>
    <tr>
        <td><?php echo $item; ?></td>
    </tr>
    <?php endforeach; ?>
</table>

</body>
</html>
