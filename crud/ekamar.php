<?php include_once("connection.php");
$statement = $conn->prepare('SELECT * FROM tbkamar WHERE no_kamar=:no_kamar ');
$statement->execute([
    'no_kamar' => $_GET['no_kamar']
]);

$user = $statement->fetch(PDO::FETCH_ASSOC);
?>

<div>
    <h1 class="h3 mb-0 text-gray-800">Edit Data kamar</h1>
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
                        <th>ID KAMAR</th>
                        <th>NAMA KAMAR</th>
                        <th>KELAS</th>
                        <th>OPSI</th>
                    </tr>
                </thead>
                <tbody>
                    <tr>
                        <form action="crud/ukamar.php?id=<?php echo $_GET['no_kamar']; ?>" method="post">
                            <td>
                                <input type="text" name="no_kamar" value="<?php echo $user['no_kamar']; ?>" class="w3-border-light-grey">
                            </td>
                            <td>
                                <input type="text" name="nama_kamar" value="<?php echo $user['nama_kamar']; ?>" class="w3-border-light-grey">
                            </td>
                            <td>
                                <input type="text" name="kelas" value="<?php echo $user['kelas']; ?>" class="w3-border-light-grey">
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