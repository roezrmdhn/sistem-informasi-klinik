<?php include_once("connection.php");
$statement = $conn->prepare('SELECT * FROM tbobat WHERE id_obat=:id_obat ');
$statement->execute([
    'id_obat' => $_GET['id_obat']
]);

$user = $statement->fetch(PDO::FETCH_ASSOC);
?>

<div>
    <h1 class="h3 mb-0 text-gray-800">Edit Data obat</h1>
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
                        <th>ID OBAT</th>
                        <th>NAMA OBAT</th>
                        <th>HARGA OBAT</th>
                        <th>OPSI</th>
                    </tr>
                </thead>
                <tbody>
                    <tr>
                        <form action="crud/uobat.php?id=<?php echo $_GET['id_obat']; ?>" method="post">
                            <td>
                                <input type="text" name="id_obat" value="<?php echo $user['id_obat']; ?>" class="w3-border-light-grey">
                            </td>
                            <td>
                                <input type="text" name="nama_obat" value="<?php echo $user['nama_obat']; ?>" class="w3-border-light-grey">
                            </td>
                            <td>
                                <input type="text" name="harga_obat" value="<?php echo $user['harga_obat']; ?>" class="w3-border-light-grey">
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