<?php
$page = "pasien";
?>

<div class="">
    <h1 class="h3 mb-0 text-gray-800 w3-animate-top">Data pasien</h1>
</div>
<!-- Page Heading -->
<h1 class="h3 mb-2 text-gray-800"></h1>

<!-- DataTales Example -->
<div class="card shadow mb-4 w3-animate-left">
    <div class="card-header">
        <div align="right">
            <button class="btn btn-md btn-success shadow-sm" data-toggle="modal" data-target="#tambahmodalpasien"><i class="fas fa-pen fa-md text-white-50"></i> Tambah pasien</button>

        </div>
    </div>
    <div class="card-body">
        <div class="table-responsive">
            <table class="table table-bordered" id="dataTable" width="100%" cellspacing="0">
                <thead>
                    <tr>
                        <th>NO</th>
                        <th>ID PASIEN</th>
                        <th>NAMA PASIEN</th>
                        <th>ALAMAT</th>
                        <th>OPSI</th>

                    </tr>
                </thead>
                <tbody>
                    <?php $query = $conn->query('SELECT * FROM tbpasien'); ?>
                    <?php if ($query->rowCount() > 0) : ?>
                        <?php
                        $no = 1;
                        foreach ($query->fetchAll(PDO::FETCH_ASSOC) as $row) :
                        ?>
                            <tr>
                                <td> <?php echo $no; ?> </td>
                                <td> <?php echo $row['id_pasien']; ?> </td>
                                <td> <?php echo $row['nama_pasien']; ?> </td>
                                <td> <?php echo $row['alamat']; ?> </td>
                                <td>
                                    <a href="index.php?page=epasien&id_pasien=<?php echo $row['id_pasien']; ?>" class="btn btn-warning btn-sm">
                                        <span class="icon text-white-50">
                                        </span>
                                        <span class="text">Edit</span>
                                    </a>
                                    <a href="crud/dpasien.php?id_pasien=<?php echo $row['id_pasien']; ?>" class="btn btn-danger btn-sm">
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
        <div class="modal fade" id="tambahmodalpasien" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
            <div class="modal-dialog" role="document">
                <div class="modal-content">
                    <div class="modal-header">
                        <h5 class="modal-title" id="exampleModalLabel">Tambah Data pasien</h5>
                        <button class="close" type="button" data-dismiss="modal" aria-label="Close">
                            <span aria-hidden="true">×</span>
                        </button>
                    </div>
                    <div class="modal-body">
                        <form action="crud/spasien.php" method="post">
                            <div class="container">
                                <p>
                                    <input type="text" name="id_pasien" placeholder="ID PASIEN" class="form-control">
                                </p>
                                <p>
                                    <input type="text" name="nama_pasien" placeholder="NAMA PASIEN" class="form-control">
                                </p>
                                <p>
                                    <input type="text" name="alamat" placeholder="ALAMAT" class="form-control">
                                </p>
                            </div>
                            <div class="modal-footer">
                                <button class="btn btn-secondary" type="button" data-dismiss="modal">Cancle</button>
                                <button class="btn btn-success">Submit</button>
                            </div>
                    </div>
                </div>
            </div>
        </div>