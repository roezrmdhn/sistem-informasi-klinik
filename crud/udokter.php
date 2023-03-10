<?php

include_once('../connection.php');
$id_dokter = $_POST['id_dokter'];
$nama_dokter = $_POST['nama_dokter'];
$spesialis = $_POST['spesialis'];

$statement = $conn->prepare('UPDATE tbdokter SET id_dokter=:id_dokter, 
	                                            nama_dokter=:nama_dokter,
                                                spesialis=:spesialis
                                                WHERE id_dokter=:id_dokter');
$statement->execute([
    'id_dokter' => $id_dokter,
    'nama_dokter' => $nama_dokter,
    'spesialis' => $spesialis
]);

header('location: ../index.php?page=dokter');
