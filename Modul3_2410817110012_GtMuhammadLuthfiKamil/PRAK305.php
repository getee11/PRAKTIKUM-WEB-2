<?php

if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    $input = trim($_POST['input']);
    $output = '';

    if (!empty($input)) {
        $panjang = strlen($input);
        $i = 0;

        while ($i < $panjang) {
            $char = $input[$i];
            $j = 0;

            while ($j < $panjang) {
                $output .= ($j === 0) ? strtoupper($char) : strtolower($char);
                $j++;
            }

            $i++;
        }
    }
}
?>

<!DOCTYPE html>
<html>
<head>
    <title>PRAK305</title>
</head>
<body>
    
    <form method="POST">
        <p>Input: <input type="text" name="input" value="<?= isset($input) ? htmlspecialchars($input) : '' ?>" required></p>
        <button type="submit">Proses</button>
    </form>

    <?php if (isset($output)): ?>
        <p><?= htmlspecialchars($input) ?></p>
        <h3>Output:</h3>
        <p><?= htmlspecialchars($output) ?></p>
    <?php endif; ?>
</body>
</html>