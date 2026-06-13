<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <title>PRAK105 - Associative Array</title>
    <style>
        body {
            font-family: Arial, sans-serif;
            padding: 20px;
        }
        table {
            border-collapse: collapse;
            width: 300px;
        }
        th {
            background-color: red;
            color: white;
            font-size: 20px;
            font-weight: bold;
            padding: 10px;
            text-align: left;
            border: 1px solid black;
        }
        td {
            border: 1px solid black;
            padding: 8px 10px;
            text-align: left;
            background-color: white;
        }
    </style>
</head>
<body>

<?php

$smartphones = [
    "model_1" => "Samsung Galaxy S22",
    "model_2" => "Samsung Galaxy S22+",
    "model_3" => "Samsung Galaxy A03",
    "model_4" => "Samsung Galaxy Xcover 5"
];
?>

<table>
    <tr>
        <th>Daftar Smartphone Samsung</th>
    </tr>
    <?php foreach ($smartphones as $key => $value): ?>
    <tr>
        <td><?php echo $value; ?></td>
    </tr>
    <?php endforeach; ?>
</table>

</body>
</html>
