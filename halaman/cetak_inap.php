<?php include_once("../connection.php"); ?>
<?php
$table = 'transaksi_inap';
$pasientable = 'tbpasien';
$doktertable = 'tbdokter';
$kamartable = 'tbkamar';

function _redirect()
{
    echo ("<script>location.href = '../index.php?page=transaksiinap';</script>");
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
<html>

<head>
    <title>Transaksi Inap</title>
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css">
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.16.0/umd/popper.min.js"></script>
    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.5.2/js/bootstrap.min.js"></script>
    <link rel="stylesheet" type="text/css" href="https://cdn.datatables.net/1.10.19/css/jquery.dataTables.css">
    <link rel="stylesheet" type="text/css" href="https://cdn.datatables.net/buttons/1.6.5/css/buttons.dataTables.min.css">
    <link rel="stylesheet" type="text/css" href="https://cdn.datatables.net/1.10.19/css/jquery.dataTables.min.css">
    <script type="text/javascript" charset="utf8" src="https://cdn.datatables.net/1.10.19/js/jquery.dataTables.js"></script>
</head>

<body>
    <div class="container">
        <h2>Transaksi Rawat Inap</h2>
        <h4>Rumah Sakit Asmara Loka</h4>
        <div class="data-tables datatable-dark">
            <table class="table table-bordered" id="mauexport" width="100%" cellspacing="0">
                <!-- <table class="table table-bordered" id="#mauexport" width="100%" cellspacing="0"> -->
                <thead>
                    <tr>
                        <th>ID INAP</th>
                        <th>NAMA DOKTER</th>
                        <th>NAMA PASIEN</th>
                        <th>NAMA KAMAR</th>
                        <th>TANGGAL INAP</th>
                        <th>TANGGAL PULANG</th>
                        <th>BIAYA INAP</th>


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

    <script>
        $(document).ready(function() {
            $('#mauexport').DataTable({
                dom: 'Bfrtip',
                buttons: [
                    'copy', 'csv', 'excel', 'pdf', 'print'
                ]
            });
        });
    </script>

    <script src="https://code.jquery.com/jquery-3.5.1.js"></script>
    <script src="https://cdn.datatables.net/1.10.22/js/jquery.dataTables.min.js"></script>
    <script src="https://cdn.datatables.net/buttons/1.6.5/js/dataTables.buttons.min.js"></script>
    <script src="https://cdn.datatables.net/buttons/1.6.5/js/buttons.flash.min.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/jszip/3.1.3/jszip.min.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/pdfmake/0.1.53/pdfmake.min.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/pdfmake/0.1.53/vfs_fonts.js"></script>
    <script src="https://cdn.datatables.net/buttons/1.6.5/js/buttons.html5.min.js"></script>
    <script src="https://cdn.datatables.net/buttons/1.6.5/js/buttons.print.min.js"></script>



</body>

</html>