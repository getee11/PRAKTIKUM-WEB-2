<!DOCTYPE html>
<html>
<head>
    <title>PRAK201</title>
</head>
<body>
    <h2>Mengurutkan 3 Nama</h2>
    <form method="post">
        Nama 1: <input type="text" name="nama1"><br><br>
        Nama 2: <input type="text" name="nama2"><br><br>
        Nama 3: <input type="text" name="nama3"><br><br>
        <button type="submit">Submit</button>
    </form>
    
    <?php
    if (isset($_POST['nama1']) && isset($_POST['nama2']) && isset($_POST['nama3'])) {
        $nama = array($_POST['nama1'], $_POST['nama2'], $_POST['nama3']);
        sort($nama);
        echo "<h3>Hasil:</h3>";
        echo "1. $nama[0]<br>";
        echo "2. $nama[1]<br>";
        echo "3. $nama[2]";
    }
    ?>
</body>
</html>
