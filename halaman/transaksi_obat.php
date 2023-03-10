<?php
$page = "transaksiobat";
$table = 'transaksi_obat';
$pasientable = 'tbpasien';
$obattable = 'tbobat';
function _redirect()
{
    echo ("<script>location.href = 'index.php?page=transaksiobat';</script>");
}

if (isset($_GET['delete_id'])) {
    $sql = "DELETE FROM $table WHERE id_tebus = " . $_GET['delete_id'];
    $conn->exec($sql);
    _redirect();
}

if (!isset($_POST['tambah'])) {
    $query = $conn->query("SELECT $table.*, $pasientable.*, $obattable.*
    FROM $table
    JOIN $pasientable ON $pasientable.id_pasien = $table.id_pasien
    JOIN $obattable ON $obattable.id_obat = $table.id_obat
    ");

    $listPasien = $conn->query("SELECT * FROM $pasientable");
    $listObat = $conn->query("SELECT * FROM $obattable");
} else {
    $id_tebus = $_POST['id_tebus'];
    $tanggal_tebus = $_POST['tanggal_tebus'];
    $id_pasien = $_POST['pasien'];
    $id_obat = $_POST['obat'];
    $harga_obat = $_POST['harga_obat'];

    $sql = "INSERT INTO $table VALUES ($id_tebus, '$tanggal_tebus', $id_pasien, $id_obat, $harga_obat);";
    $conn->exec($sql);
    _redirect();
}
?>

<div id="content-wrapper" class="d-flex flex-column">

    <!-- Main Content -->
    <div id="content">

        <!-- Topbar -->
        <!-- <nav class="navbar navbar-expand navbar-light bg-white topbar mb-4 static-top shadow"> -->

        <!-- Sidebar Toggle (Topbar) -->
        <button id="sidebarToggleTop" class="btn btn-link d-md-none rounded-circle mr-3">
            <i class="fa fa-bars"></i>
        </button>

        <!-- Topbar Search -->

        </nav>

        <div class="container-fluid">

            <!-- Page Heading -->
            <div class="">
                <h1 class="h3 mb-0 text-gray-800">Transaksi Obat</h1>


            </div>
            <!-- Page Heading -->
            <h1 class="h3 mb-2 text-gray-800"></h1>

            <!-- DataTales Example -->
            <div class="card shadow mb-4">
                <div class="card-header">
                    <div class="row">
                        <div class="col-3">
                            <a onclick="window.open('halaman/cetak_obat.php')" class="btn btn-warning">
                                <span class="icon text-white-50">
                                </span>
                                <span class="text"><i class="fa-solid fa-print"></i> Cetak Transaksi Obat</span>
                            </a>
                        </div>
                        <div align="right">
                            <!-- Button trigger modal -->
                            <button type="button" class="btn btn-success" data-toggle="modal" data-target="#exampleModal">
                                <i class="fas fa-pen fa-md"></i> Tambah Transaksi Obat
                            </button>

                        </div>
                    </div>
                </div>
                <div class="card-body">
                    <div class="table-responsive">
                        <table class="table table-bordered" id="dataTable" width="100%" cellspacing="0">
                            <thead>
                                <tr>
                                    <th>ID TEBUS</th>
                                    <th>NAMA PASIEN</th>
                                    <th>NAMA OBAT</th>
                                    <th>TANGGAL TEBUS</th>
                                    <th>BIAYA TEBUS</th>
                                    <th>OPSI</th>

                                </tr>
                            </thead>
                            <tbody>
                                <?php if ($query->rowCount() > 0) : ?>
                                    <?php foreach ($query->fetchAll(PDO::FETCH_ASSOC) as $row) : ?>
                                        <tr>
                                            <td> <?php echo $row['id_tebus']; ?> </td>
                                            <td> <?php echo $row['nama_pasien']; ?> </td>
                                            <td> <?php echo $row['nama_obat']; ?> </td>
                                            <td> <?php echo $row['tanggal_tebus']; ?> </td>
                                            <td> <?php echo $row['harga_obat']; ?> </td>
                                            <td>
                                                <a href="index.php?page=transaksiobat&?delete_id=<?php echo $row['id_tebus']; ?>" onclick="confirm('anda yakin ingin menghapus data ini?')" class="btn btn-danger btn-sm">Delete</a>
                                            </td>
                                        </tr>
                                    <?php endforeach; ?>
                                <?php else : ?>
                                    <tr>
                                        <th colspan="5">Belum ada transaksi Obat</th>
                                    </tr>
                                <?php endif; ?>
                            </tbody>
                        </table>
                    </div>
                </div>
            </div>

        </div>
        <!-- /.container-fluid -->

    </div>

    <!-- Modal -->
    <div class="modal fade" id="exampleModal" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
        <div class="modal-dialog">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="exampleModalLabel">Tambah Transaksi Tebus</h5>
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                    </button>
                </div>
                <div class="modal-body">
                    <form action="" method="post">
                        <div class="form-group">
                            <label for="id_tebus">ID TEBUS</label>
                            <input type="number" class="form-control" id="id_tebus" name="id_tebus" required>
                        </div>
                        <div class="form-group">
                            <label for="pasien">PASIEN</label>
                            <select name="pasien" id="pasien" class="form-control">
                                <option value="">Pilih Pasien</option>
                                <?php foreach ($listPasien->fetchAll(PDO::FETCH_ASSOC) as $pasien) : ?>
                                    <option value="<?= $pasien['id_pasien'] ?>"><?= $pasien['nama_pasien'] ?></option>
                                <?php endforeach; ?>
                            </select>
                        </div>
                        <div class="form-group">
                            <label for="obat">OBAT</label>
                            <select name="obat" id="obat" class="form-control">
                                <option value="">Pilih Obat</option>
                                <?php foreach ($listObat->fetchAll(PDO::FETCH_ASSOC) as $obat2) : ?>
                                    <option value="<?= $obat2['id_obat'] ?>"><?= $obat2['harga_obat'] ?></option>
                                <?php endforeach; ?>
                            </select>
                        </div>

                        <div class="form-group">
                            <label for="tanggal_tebus">TANGGAL TEBUS</label>
                            <input type="date" class="form-control" id="tanggal_tebus" name="tanggal_tebus" required>
                        </div>
                        <div class="form-group">
                            <label for="harga_obat">harga obat</label>
                            <select name="harga_obat" id="harga_obat" class="form-control">
                                <option value="">Pilih Harga</option>
                                <?php foreach ($listObat->fetchAll(PDO::FETCH_ASSOC) as $obat) : ?>
                                    <option value="<?= $obat['id_obat'] ?>"><?= $obat['nama_obat'] ?></option>
                                <?php endforeach; ?>
                            </select>
                        </div>
                        <!-- <div class="form-group">
                            <label for="harga_obat">BIAYA TEBUS</label>
                            <input type="number" class="form-control" id="harga_obat" name="harga_obat" required>
                        </div> -->
                        <button name="tambah" class="btn btn-primary btn-sm"> Tambah</button>
                    </form>
                </div>

            </div>
        </div>
    </div>