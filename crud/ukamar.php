<?php

include_once('../connection.php');
$no_kamar = $_POST['no_kamar'];
$nama_kamar = $_POST['nama_kamar'];
$kelas = $_POST['kelas'];

$statement = $conn->prepare('UPDATE tbkamar SET no_kamar=:no_kamar, 
	                                            nama_kamar=:nama_kamar,
                                                kelas=:kelas
                                                WHERE no_kamar=:no_kamar');
$statement->execute([
    'no_kamar' => $no_kamar,
    'nama_kamar' => $nama_kamar,
    'kelas' => $kelas
]);

header('location: ../index.php?page=kamar');
