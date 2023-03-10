<?php include_once("../connection.php"); ?>
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
    $query = $conn->query("SELECT $table.*, $pasientable.nama_pasien, $obattable.nama_obat
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
    $biaya_tebus = $_POST['biaya_tebus'];

    $sql = "INSERT INTO $table VALUES ($id_tebus, '$tanggal_tebus', $id_pasien, $id_obat, $biaya_tebus);";
    $conn->exec($sql);
    _redirect();
}
?>
<html>

<head>
    <title>Transaksi Obat</title>
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
        <h2>Transaksi Obat</h2>
        <h4>Rumah Sakit Asmara Loka</h4>
        <div class="data-tables datatable-dark">
            <table class="table table-bordered" id="mauexport" width="100%" cellspacing="0">
                <thead>
                    <tr>
                        <th>ID TEBUS</th>
                        <th>NAMA PASIEN</th>
                        <th>NAMA OBAT</th>
                        <th>TANGGAL TEBUS</th>
                        <th>BIAYA TEBUS</th>


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
                                <td> <?php echo $row['biaya_tebus']; ?> </td>

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