<?php

include_once('../connection.php');

$id_pasien = $_GET['id_pasien'];

$statement = $conn->prepare('DELETE FROM tbpasien WHERE id_pasien=:id_pasien');
$statement->execute([
    'id_pasien' => $id_pasien
]);

header('location: ../index.php?page=pasien');
