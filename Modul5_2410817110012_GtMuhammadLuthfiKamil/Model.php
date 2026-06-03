<?php
require_once 'Koneksi.php';

function getBuku() {
    $pdo = getKoneksi();
    $stmt = $pdo->query("SELECT * FROM buku ORDER BY id_buku DESC");
    return $stmt->fetchAll();
}

function getBukuById($id) {
    $pdo = getKoneksi();
    $stmt = $pdo->prepare("SELECT * FROM buku WHERE id_buku = ?");
    $stmt->execute([$id]);
    return $stmt->fetch();
}

function insertBuku($judul, $penulis, $penerbit, $tahun) {
    $pdo = getKoneksi();
    $stmt = $pdo->prepare("INSERT INTO buku (judul_buku, penulis, penerbit, tahun_terbit) VALUES (?, ?, ?, ?)");
    return $stmt->execute([$judul, $penulis, $penerbit, $tahun]);
}

function updateBuku($id, $judul, $penulis, $penerbit, $tahun) {
    $pdo = getKoneksi();
    $stmt = $pdo->prepare("UPDATE buku SET judul_buku = ?, penulis = ?, penerbit = ?, tahun_terbit = ? WHERE id_buku = ?");
    return $stmt->execute([$judul, $penulis, $penerbit, $tahun, $id]);
}

function deleteBuku($id) {
    $pdo = getKoneksi();
    $stmt = $pdo->prepare("DELETE FROM buku WHERE id_buku = ?");
    return $stmt->execute([$id]);
}

function getMember() {
    $pdo = getKoneksi();
    $stmt = $pdo->query("SELECT * FROM member ORDER BY id_member DESC");
    return $stmt->fetchAll();
}

function getMemberById($id) {
    $pdo = getKoneksi();
    $stmt = $pdo->prepare("SELECT * FROM member WHERE id_member = ?");
    $stmt->execute([$id]);
    return $stmt->fetch();
}

function insertMember($nama, $nomor, $alamat, $tgl_mendaftar, $tgl_terakhir_bayar) {
    $pdo = getKoneksi();
    $stmt = $pdo->prepare("INSERT INTO member (nama_member, nomor_member, alamat, tgl_mendaftar, tgl_terakhir_bayar) VALUES (?, ?, ?, ?, ?)");
    return $stmt->execute([$nama, $nomor, $alamat, $tgl_mendaftar, $tgl_terakhir_bayar]);
}

function updateMember($id, $nama, $nomor, $alamat, $tgl_mendaftar, $tgl_terakhir_bayar) {
    $pdo = getKoneksi();
    $stmt = $pdo->prepare("UPDATE member SET nama_member = ?, nomor_member = ?, alamat = ?, tgl_mendaftar = ?, tgl_terakhir_bayar = ? WHERE id_member = ?");
    return $stmt->execute([$nama, $nomor, $alamat, $tgl_mendaftar, $tgl_terakhir_bayar, $id]);
}

function deleteMember($id) {
    $pdo = getKoneksi();
    $stmt = $pdo->prepare("DELETE FROM member WHERE id_member = ?");
    return $stmt->execute([$id]);
}

function getPeminjaman() {
    $pdo = getKoneksi();
    $stmt = $pdo->query("SELECT p.*, b.judul_buku, m.nama_member 
                         FROM peminjaman p
                         LEFT JOIN buku b ON p.id_buku = b.id_buku
                         LEFT JOIN member m ON p.id_member = m.id_member
                         ORDER BY p.id_peminjaman DESC");
    return $stmt->fetchAll();
}

function getPeminjamanById($id) {
    $pdo = getKoneksi();
    $stmt = $pdo->prepare("SELECT * FROM peminjaman WHERE id_peminjaman = ?");
    $stmt->execute([$id]);
    return $stmt->fetch();
}

function insertPeminjaman($tgl_pinjam, $tgl_kembali, $id_member, $id_buku) {
    $pdo = getKoneksi();
    $stmt = $pdo->prepare("INSERT INTO peminjaman (tgl_pinjam, tgl_kembali, id_member, id_buku) VALUES (?, ?, ?, ?)");
    return $stmt->execute([$tgl_pinjam, $tgl_kembali, $id_member, $id_buku]);
}

function updatePeminjaman($id, $tgl_pinjam, $tgl_kembali, $id_member, $id_buku) {
    $pdo = getKoneksi();
    $stmt = $pdo->prepare("UPDATE peminjaman SET tgl_pinjam = ?, tgl_kembali = ?, id_member = ?, id_buku = ? WHERE id_peminjaman = ?");
    return $stmt->execute([$tgl_pinjam, $tgl_kembali, $id_member, $id_buku, $id]);
}

function deletePeminjaman($id) {
    $pdo = getKoneksi();
    $stmt = $pdo->prepare("DELETE FROM peminjaman WHERE id_peminjaman = ?");
    return $stmt->execute([$id]);
}
?>
