<?php
include_once('../connection.php');
$id_obat = $_POST['id_obat'];
$nama_obat = $_POST['nama_obat'];
$harga_obat = $_POST['harga_obat'];

$statement = $conn->prepare('INSERT INTO tbobat (id_obat, nama_obat, harga_obat)
                                            VALUES (:id_obat, :nama_obat, :harga_obat)');

$statement->execute([
    'id_obat' => $id_obat,
    'nama_obat' => $nama_obat,
    'harga_obat' => $harga_obat
]);

header('location: ../index.php?page=obat');
