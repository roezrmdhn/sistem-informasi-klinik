<?php
$page = "kamar";
?>

<div class="">
    <h1 class="h3 mb-0 text-gray-800 w3-animate-top">Data kamar</h1>
</div>
<!-- Page Heading -->
<h1 class="h3 mb-2 text-gray-800"></h1>

<!-- DataTales Example -->
<div class="card shadow mb-4 w3-animate-left">
    <div class="card-header">
        <div align="right">
            <button class="btn btn-md btn-success shadow-sm" data-toggle="modal" data-target="#tambahmodalkamar"><i class="fas fa-pen fa-md text-white-50"></i> Tambah kamar</button>

        </div>
    </div>
    <div class="card-body">
        <div class="table-responsive">
            <table class="table table-bordered" id="dataTable" width="100%" cellspacing="0">
                <thead>
                    <tr>
                        <th>NO</th>
                        <th>NO KAMAR</th>
                        <th>NAMA KAMAR</th>
                        <th>KELAS</th>
                        <th>OPSI</th>

                    </tr>
                </thead>
                <tbody>
                    <?php $query = $conn->query('SELECT * FROM tbkamar'); ?>
                    <?php if ($query->rowCount() > 0) : ?>
                        <?php
                        $no = 1;
                        foreach ($query->fetchAll(PDO::FETCH_ASSOC) as $row) :
                        ?>
                            <tr>
                                <td> <?php echo $no; ?> </td>
                                <td> <?php echo $row['no_kamar']; ?> </td>
                                <td> <?php echo $row['nama_kamar']; ?> </td>
                                <td> <?php echo $row['kelas']; ?> </td>
                                <td>
                                    <a href="index.php?page=ekamar&no_kamar=<?php echo $row['no_kamar']; ?>" class="btn btn-warning btn-sm">
                                        <span class="icon text-white-50">
                                        </span>
                                        <span class="text">Edit</span>
                                    </a>
                                    <a href="crud/dkamar.php?no_kamar=<?php echo $row['no_kamar']; ?>" class="btn btn-danger btn-sm">
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
        <div class="modal fade" id="tambahmodalkamar" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
            <div class="modal-dialog" role="document">
                <div class="modal-content">
                    <div class="modal-header">
                        <h5 class="modal-title" id="exampleModalLabel">Tambah Data kamar</h5>
                        <button class="close" type="button" data-dismiss="modal" aria-label="Close">
                            <span aria-hidden="true">×</span>
                        </button>
                    </div>
                    <div class="modal-body">
                        <form action="crud/skamar.php" method="post">
                            <div class="container">
                                <p>
                                    <input type="text" name="no_kamar" placeholder="ID KAMAR" class="form-control">
                                </p>
                                <p>
                                    <input type="text" name="nama_kamar" placeholder="NAMA KAMAR" class="form-control">
                                </p>
                                <p>
                                    <input type="text" name="kelas" placeholder="KELAS" class="form-control">
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