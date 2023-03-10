<?php

include_once('../connection.php');

$id_obat = $_GET['id_obat'];

$statement = $conn->prepare('DELETE FROM tbobat WHERE id_obat=:id_obat');
$statement->execute([
    'id_obat' => $id_obat
]);

header('location: ../index.php?page=obat');
