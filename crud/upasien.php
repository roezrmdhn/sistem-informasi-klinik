<?php

include_once('../connection.php');
$id_pasien = $_POST['id_pasien'];
$nama_pasien = $_POST['nama_pasien'];
$alamat = $_POST['alamat'];

$statement = $conn->prepare('UPDATE tbpasien SET id_pasien=:id_pasien, 
	                                            nama_pasien=:nama_pasien,
                                                alamat=:alamat
                                                WHERE id_pasien=:id_pasien');
$statement->execute([
    'id_pasien' => $id_pasien,
    'nama_pasien' => $nama_pasien,
    'alamat' => $alamat
]);

header('location: ../index.php?page=pasien');
