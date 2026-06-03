<?php
$host = '127.0.0.1';
$user = 'root'; // default laragon/xampp user
$pass = '';     // default laragon/xampp pass

try {
    // Connect without database to create it
    $pdo = new PDO("mysql:host=$host", $user, $pass);
    $pdo->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
    
    // Create database
    $sql = "CREATE DATABASE IF NOT EXISTS perpustakaan";
    $pdo->exec($sql);
    echo "Database created successfully or already exists.<br>";
    
    // Use the created database
    $pdo->exec("USE perpustakaan");
    
    // Create 'member' table
    $sqlMember = "CREATE TABLE IF NOT EXISTS member (
        id_member INT AUTO_INCREMENT PRIMARY KEY,
        nama_member VARCHAR(250) NOT NULL,
        nomor_member VARCHAR(15) NOT NULL,
        alamat TEXT,
        tgl_mendaftar DATETIME,
        tgl_terakhir_bayar DATE
    )";
    $pdo->exec($sqlMember);
    echo "Table 'member' created successfully.<br>";
    
    // Create 'buku' table
    $sqlBuku = "CREATE TABLE IF NOT EXISTS buku (
        id_buku INT AUTO_INCREMENT PRIMARY KEY,
        judul_buku VARCHAR(500) NOT NULL,
        penulis VARCHAR(500),
        penerbit VARCHAR(250),
        tahun_terbit INT
    )";
    $pdo->exec($sqlBuku);
    echo "Table 'buku' created successfully.<br>";
    
    // Create 'peminjaman' table
    $sqlPeminjaman = "CREATE TABLE IF NOT EXISTS peminjaman (
        id_peminjaman INT AUTO_INCREMENT PRIMARY KEY,
        tgl_pinjam DATE NOT NULL,
        tgl_kembali DATE NOT NULL,
        id_member INT,
        id_buku INT,
        FOREIGN KEY (id_member) REFERENCES member(id_member) ON DELETE CASCADE ON UPDATE CASCADE,
        FOREIGN KEY (id_buku) REFERENCES buku(id_buku) ON DELETE CASCADE ON UPDATE CASCADE
    )";
    $pdo->exec($sqlPeminjaman);
    echo "Table 'peminjaman' created successfully.<br>";
    
    echo "<br><b>Database setup complete!</b>";
    
} catch(PDOException $e) {
    echo "Error: " . $e->getMessage();
}
?>
