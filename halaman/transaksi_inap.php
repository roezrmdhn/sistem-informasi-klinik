<?php
$table = 'transaksi_inap';
$pasientable = 'tbpasien';
$doktertable = 'tbdokter';
$kamartable = 'tbkamar';

function _redirect()
{
    echo ("<script>location.href = 'index.php?page=transaksiinap';</script>");
}

if (!isset($_POST['tambah'])) {
    $query = $conn->query("SELECT $table.*, $pasientable.nama_pasien, $doktertable.nama_dokter, $kamartable.nama_kamar 
    FROM $table
    JOIN $pasientable ON $pasientable.id_pasien = $table.id_pasien
    JOIN $doktertable ON $doktertable.id_dokter = $table.id_dokter
    JOIN $kamartable ON $kamartable.no_kamar = $table.id_kamar");

    $listPasien = $conn->query("SELECT * FROM $pasientable");
    $listDokter = $conn->query("SELECT * FROM $doktertable");
    $listKamar = $conn->query("SELECT * FROM $kamartable");
} else {
    $id_inap = $_POST['id_inap'];
    $id_pasien = $_POST['pasien'];
    $id_dokter = $_POST['dokter'];
    $id_kamar = $_POST['kamar'];
    $tanggal_inap = $_POST['tanggal_inap'];
    $tanggal_pulang = $_POST['tanggal_pulang'];
    $biaya_inap = $_POST['biaya_inap'];

    $sql = "INSERT INTO $table VALUES ($id_inap, $id_pasien, $id_dokter, $id_kamar, '$tanggal_inap', '$tanggal_pulang', $biaya_inap);";
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
        <!-- <button id="sidebarToggleTop" class="btn btn-link d-md-none rounded-circle mr-3">
            <i class="fa fa-bars"></i>
        </button> -->

        <!-- Topbar Search -->

        </nav>

        <div class="container-fluid">

            <!-- Page Heading -->
            <div class="">
                <h1 class="h3 mb-0 text-gray-800">Transaksi Inap</h1>
            </div>

            <!-- DataTales Example -->
            <div class="card shadow mb-4">
                <div class="card-header">
                    <div class="row">
                        <div class="col-3">
                            <a onclick="window.open('halaman/cetak_inap.php')" class="btn btn-warning">
                                <span class="icon text-white-50">
                                </span>
                                <span class="text"><i class="fa-solid fa-print"></i> Cetak Transaksi Inap</span>
                            </a>
                        </div>
                        <div align="right">
                            <!-- Button trigger modal -->
                            <button type="button" class="btn btn-success" data-toggle="modal" data-target="#exampleModal">
                                <i class="fas fa-pen fa-md"></i> Tambah Transaksi Inap
                            </button>

                        </div>
                    </div>
                </div>
                <div class="card-body">
                    <div class="table-responsive">
                        <!-- <div class="data-tables datatable-dark"> -->
                        <table class="table table-bordered" id="dataTable" width="100%" cellspacing="0">
                            <thead>
                                <tr>
                                    <th>ID INAP</th>
                                    <th>NAMA DOKTER</th>
                                    <th>NAMA PASIEN</th>
                                    <th>NAMA KAMAR</th>
                                    <th>TANGGAL INAP</th>
                                    <th>TANGGAL PULANG</th>
                                    <th>BIAYA INAP</th>
                                    <th>OPSI</th>

                                </tr>
                            </thead>
                            <tbody>
                                <?php if ($query->rowCount() > 0) : ?>
                                    <?php foreach ($query->fetchAll(PDO::FETCH_ASSOC) as $row) : ?>
                                        <tr>
                                            <td> <?php echo $row['id_inap']; ?> </td>
                                            <td> <?php echo $row['nama_dokter']; ?> </td>
                                            <td> <?php echo $row['nama_pasien']; ?> </td>
                                            <td> <?php echo $row['nama_kamar']; ?> </td>
                                            <td> <?php echo $row['tanggal_inap']; ?> </td>
                                            <td> <?php echo $row['tanggal_pulang']; ?> </td>
                                            <td> <?php echo $row['biaya_inap']; ?> </td>
                                            <td>
                                                <a href="crud/dtransaksiinap.php?id_inap=<?php echo $row['id_inap']; ?>" class="btn btn-danger btn-sm">
                                                    <span class="icon text-white-50">
                                                    </span>
                                                    <span class="text">Delete</span>
                                                </a>
                                            </td>
                                        </tr>
                                    <?php endforeach; ?>
                                <?php else : ?>
                                    <tr>
                                        <th colspan="5">Belum ada transaksi inap</th>
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
                    <h5 class="modal-title" id="exampleModalLabel">Tambah Transaksi Inap</h5>
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                    </button>
                </div>
                <div class="modal-body">
                    <form action="" method="post">
                        <div class="form-group">
                            <label for="id_inap">ID INAP</label>
                            <input type="number" class="form-control" id="id_inap" name="id_inap" required>
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
                            <label for="dokter">DOKTER</label>
                            <select name="dokter" id="dokter" class="form-control">
                                <option value="">Pilih Dokter</option>
                                <?php foreach ($listDokter->fetchAll(PDO::FETCH_ASSOC) as $dokter) : ?>
                                    <option value="<?= $dokter['id_dokter'] ?>"><?= $dokter['nama_dokter'] ?></option>
                                <?php endforeach; ?>
                            </select>
                        </div>
                        <div class="form-group">
                            <label for="kamar">KAMAR</label>
                            <select name="kamar" id="kamar" class="form-control">
                                <option value="">Pilih Kamar</option>
                                <?php foreach ($listKamar->fetchAll(PDO::FETCH_ASSOC) as $kamar) : ?>
                                    <option value="<?= $kamar['no_kamar'] ?>"><?= $kamar['nama_kamar'] ?></option>
                                <?php endforeach; ?>
                            </select>
                        </div>
                        <div class="form-group">
                            <label for="tanggal_inap">TANGGAL INAP</label>
                            <input type="date" class="form-control" id="tanggal_inap" name="tanggal_inap" required>
                        </div>
                        <div class="form-group">
                            <label for="tanggal_pulang">TANGGAL PULANG</label>
                            <input type="date" class="form-control" id="tanggal_pulang" name="tanggal_pulang" required>
                        </div>
                        <div class="form-group">
                            <label for="biaya_inap">BIAYA INAP</label>
                            <input type="number" class="form-control" id="biaya_inap" name="biaya_inap" required>
                        </div>
                        <button name="tambah" class="btn btn-primary btn-sm"> Tambah</button>
                    </form>
                </div>

            </div>
        </div>
    </div>