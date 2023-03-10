<?php
include_once('../connection.php');
$no_kamar = $_POST['no_kamar'];
$nama_kamar = $_POST['nama_kamar'];
$kelas = $_POST['kelas'];

$statement = $conn->prepare('INSERT INTO tbkamar (no_kamar, nama_kamar, kelas)
                                            VALUES (:no_kamar, :nama_kamar, :kelas)');

$statement->execute([
    'no_kamar' => $no_kamar,
    'nama_kamar' => $nama_kamar,
    'kelas' => $kelas
]);

header('location: ../index.php?page=kamar');
