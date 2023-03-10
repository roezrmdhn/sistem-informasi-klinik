<?php
include_once('../connection.php');
$id_pasien = $_POST['id_pasien'];
$nama_pasien = $_POST['nama_pasien'];
$alamat = $_POST['alamat'];

$statement = $conn->prepare('INSERT INTO tbpasien (id_pasien, nama_pasien, alamat)
                                            VALUES (:id_pasien, :nama_pasien, :alamat)');

$statement->execute([
    'id_pasien' => $id_pasien,
    'nama_pasien' => $nama_pasien,
    'alamat' => $alamat
]);

header('location: ../index.php?page=pasien');
