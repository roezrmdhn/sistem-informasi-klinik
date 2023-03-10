<?php
$page = "dokter";
?>

<div class="">
    <h1 class="h3 mb-0 text-gray-800 w3-animate-top">Data Dokter</h1>
</div>
<!-- Page Heading -->
<h1 class="h3 mb-2 text-gray-800"></h1>

<!-- DataTales Example -->
<div class="card shadow mb-4 w3-animate-left">
    <div class="card-header py-3">
        <div align="right">
            <button class="btn btn-md btn-success shadow-sm" data-toggle="modal" data-target="#tambahmodal"><i class="fas fa-pen fa-md text-white-50"></i> Tambah Dokter</button>

        </div>
    </div>
    <div class="card-body">
        <div class="table-responsive">
            <table class="table table-bordered" id="dataTable" width="100%" cellspacing="0">
                <thead>
                    <tr>
                        <th>NO</th>
                        <th>ID DOKTER</th>
                        <th>NAMA DOKTER</th>
                        <th>SPESIALIS</th>
                        <th>OPSI</th>

                    </tr>
                </thead>
                <tbody>
                    <?php $query = $conn->query('SELECT * FROM tbdokter'); ?>
                    <?php if ($query->rowCount() > 0) : ?>
                        <?php
                        $no = 1;
                        foreach ($query->fetchAll(PDO::FETCH_ASSOC) as $row) :
                        ?>
                            <tr>
                                <td> <?php echo $no; ?> </td>
                                <td> <?php echo $row['id_dokter']; ?> </td>
                                <td> <?php echo $row['nama_dokter']; ?> </td>
                                <td> <?php echo $row['spesialis']; ?> </td>
                                <td>
                                    <!-- <a href="" class="text-blue">Edit</a> -->
                                    <a href="index.php?page=edokter&id_dokter=<?php echo $row['id_dokter']; ?>" class="btn btn-warning btn-sm">
                                        <span class="icon text-white-50">
                                        </span>
                                        <span class="text">Edit</span>
                                    </a>
                                    <a href="crud/ddokter.php?id_dokter=<?php echo $row['id_dokter']; ?>" class="btn btn-danger btn-sm">
                                        <span class="icon text-white-50">
                                        </span>
                                        <span class="text">Delete</span>
                                    </a>
                                </td>
                            </tr>
                        <?php
                            $no++;
                        endforeach;
                        ?>
                    <?php else : ?>
                        <tr>
                            <th colspan="5">Belum ada data user</th>
                        </tr>
                    <?php endif; ?>
                </tbody>
            </table>
        </div>

        <!-- Modal Tambah -->
        <div class="modal fade" id="tambahmodal">
            <div class="modal-dialog">
                <div class="modal-content">
                    <div class="modal-header">
                        <h5 class="modal-title">Tambah Data Dokter</h5>
                        <button class="close" type="button" data-dismiss="modal" aria-label="Close">
                            <span aria-hidden="true">×</span>
                        </button>
                    </div>
                    <div class="modal-body">
                        <form action="crud/sdokter.php" method="post">
                            <div class="container">
                                <p>
                                    <input type="text" name="id_dokter" placeholder="ID DOKTER" class="form-control">
                                </p>
                                <p>
                                    <input type="text" name="nama_dokter" placeholder="NAMA DOKTER" class="form-control">
                                </p>
                                <p>
                                    <input type="text" name="spesialis" placeholder="SPESIALIS" class="form-control">
                                </p>
                            </div>
                            <div class="modal-footer">
                                <button class="btn btn-secondary" type="button" data-dismiss="modal">Cancle</button>
                                <button class="btn btn-success">Submit</button>
                            </div>
                        </form>
                    </div>
                </div>
            </div>
        </div>