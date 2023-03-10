<?php

include_once('../connection.php');

$id_dokter = $_GET['id_dokter'];

$statement = $conn->prepare('DELETE FROM tbdokter WHERE id_dokter=:id_dokter');
$statement->execute([
    'id_dokter' => $id_dokter
]);

header('location: ../index.php?page=dokter');
