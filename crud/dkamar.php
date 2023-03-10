<?php

include_once('../connection.php');

$no_kamar = $_GET['no_kamar'];

$statement = $conn->prepare('DELETE FROM tbkamar WHERE no_kamar=:no_kamar');
$statement->execute([
    'no_kamar' => $no_kamar
]);

header('location: ../index.php?page=kamar');
