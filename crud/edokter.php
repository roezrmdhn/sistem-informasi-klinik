<?php include_once("connection.php");
$statement = $conn->prepare('SELECT * FROM tbdokter WHERE id_dokter=:id_dokter ');
$statement->execute([
    'id_dokter' => $_GET['id_dokter']
]);

$user = $statement->fetch(PDO::FETCH_ASSOC);
?>

<div>
    <h1 class="h3 mb-0 text-gray-800">Edit Data Dokter</h1>
</div>
<!-- Page Heading -->
<h1 class="h3 mb-2 text-gray-800"></h1>

<!-- DataTales Example -->
<div class="card shadow mb-4">
    <div class="card-header">
    </div>
    <div class="card-body">
        <div class="table">
            <table class="table table-bordered" width="100%" cellspacing="0">
                <thead>
                    <tr>
                        <th>ID DOKTER</th>
                        <th>NAMA DOKTER</th>
                        <th>SPESIALIS</th>
                        <th>OPSI</th>
                    </tr>
                </thead>
                <tbody>
                    <tr>
                        <form action="crud/udokter.php?id=<?php echo $_GET['id_dokter']; ?>" method="post">
                            <td>
                                <input type="text" name="id_dokter" value="<?php echo $user['id_dokter']; ?>" class="w3-border-light-grey">
                            </td>
                            <td>
                                <input type="text" name="nama_dokter" value="<?php echo $user['nama_dokter']; ?>" class="w3-border-light-grey">
                            </td>
                            <td>
                                <input type="text" name="spesialis" value="<?php echo $user['spesialis']; ?>" class="w3-border-light-grey">
                            </td>
                            <td>
                                <button class="btn btn-success">Update</button>

                            </td>
                        </form>
                    </tr>
                </tbody>
            </table>
        </div>
    </div>