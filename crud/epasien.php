<?php include_once("connection.php");
$statement = $conn->prepare('SELECT * FROM tbpasien WHERE id_pasien=:id_pasien ');
$statement->execute([
    'id_pasien' => $_GET['id_pasien']
]);

$user = $statement->fetch(PDO::FETCH_ASSOC);
?>

<div>
    <h1 class="h3 mb-0 text-gray-800">Edit Data Pasien</h1>
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
                        <th>ID PASIEN</th>
                        <th>NAMA PASIEN</th>
                        <th>ALAMAT</th>
                        <th>OPSI</th>
                    </tr>
                </thead>
                <tbody>
                    <tr>
                        <form action="crud/upasien.php?id=<?php echo $_GET['id_pasien']; ?>" method="post">
                            <td>
                                <input type="text" name="id_pasien" value="<?php echo $user['id_pasien']; ?>" class="w3-border-light-grey">
                            </td>
                            <td>
                                <input type="text" name="nama_pasien" value="<?php echo $user['nama_pasien']; ?>" class="w3-border-light-grey">
                            </td>
                            <td>
                                <input type="text" name="alamat" value="<?php echo $user['alamat']; ?>" class="w3-border-light-grey">
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