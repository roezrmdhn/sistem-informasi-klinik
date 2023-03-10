<?php

include_once('../connection.php');

$id_inap = $_GET['id_inap'];

$statement = $conn->prepare('DELETE FROM transaksi_inap WHERE id_inap=:id_inap');
$statement->execute([
    'id_inap' => $id_inap
]);


header('location: ../index.php?page=transaksiinap');
