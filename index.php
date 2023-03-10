<?php include_once("connection.php"); ?>
<!DOCTYPE html>
<html lang="en">

<head>

    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <meta name="description" content="">
    <meta name="author" content="">
    <?php include_once("cssauth.php"); ?>
    <title>Rumah Sakit</title>

</head>

<body id="page-top">

    <!-- Page Wrapper -->
    <div id="wrapper">

        <!-- Sidebar -->
        <ul class="navbar-nav bg-gradient-success sidebar sidebar-dark accordion w3-animate-left" id="accordionSidebar">

            <!-- Sidebar - Brand -->
            <a class="sidebar-brand d-flex align-items-center justify-content-center" href="index.php">
                <div class="sidebar-brand-icon">
                    <br>
                    <i><img src="img/logowhite.png" style="width:40%"></i>
                </div>
                <!-- <div class="sidebar-brand-text mx-3">RS Sengkuni<sup>2</sup></div> -->
            </a>
            <li class="nav-item <?php if (str_contains($_SERVER['QUERY_STRING'], 'page=dashboard')) {
                                    print('active');
                                } ?>">
                <br>
                <a class="nav-link" href="index.php?page=dashboard">
                    <i class="fas fa-fw fa-tachometer-alt"></i>
                    <span>Dashboard</span></a>
            </li>

            <!-- Divider -->
            <hr class="sidebar-divider">

            <!-- Nav Item - Pages -->
            <li class="nav-item <?php if (str_contains($_SERVER['QUERY_STRING'], 'page=dokter')) {
                                    print('active');
                                } ?>">
                <a class="nav-link " href="index.php?page=dokter" aria-expanded="true">
                    <i class="fa-solid fa-stethoscope"></i>
                    <span>Dokter</span>
                </a>
            </li>
            <li class="nav-item <?php if (str_contains($_SERVER['QUERY_STRING'], 'page=kamar')) {
                                    print('active');
                                } ?>">
                <a class="nav-link" href="index.php?page=kamar" aria-expanded="true">
                    <i class="fa fa-bed" aria-hidden="true"></i>
                    <span>Kamar</span>
                </a>
            </li>
            </li>
            <li class="nav-item <?php if (str_contains($_SERVER['QUERY_STRING'], 'page=pasien')) {
                                    print('active');
                                } ?>">
                <a class="nav-link" href="index.php?page=pasien" aria-expanded="true">
                    <i class="fa-solid fa-hospital-user"></i>
                    <span>Pasien</span>
                </a>
            </li>
            </li>
            <li class="nav-item <?php if (str_contains($_SERVER['QUERY_STRING'], 'page=obat')) {
                                    print('active');
                                } ?>">
                <a class="nav-link" href="index.php?page=obat" aria-expanded="true">
                    <i class="fa-solid fa-capsules"></i>
                    <span>Obat</span>
                </a>
            </li>
            <!-- Divider -->
            <hr class="sidebar-divider">

            <!-- Nav Item - Pages Collapse Menu -->
            <li class="nav-item">
                <a class="nav-link collapsed" href="#" data-toggle="collapse" data-target="#collapseTransaksi" aria-expanded="true" aria-controls="collapseTransaksi">
                    <i class="fa-solid fa-file-invoice-dollar"></i>
                    <span>Transaksi</span>
                </a>
                <div id="collapseTransaksi" class="collapse" aria-labelledby="headingTransaksi" data-parent="#accordionSidebar">
                    <div class="bg-white py-2 collapse-inner rounded">
                        <a class="collapse-item <?php if (str_contains($_SERVER['QUERY_STRING'], 'page=transaksiinap')) {
                                                    print('active');
                                                } ?>" href="index.php?page=transaksiinap">Rawat Inap</a>
                        <a class="collapse-item <?php if (str_contains($_SERVER['QUERY_STRING'], 'page=transaksiobat')) {
                                                    print('active');
                                                } ?>" href="index.php?page=transaksiobat">Obat</a>

                    </div>
                </div>
            </li>
            <!-- <li class="nav-item">
                <a class="nav-link collapsed" href="#" data-toggle="collapse" data-target="#collapseLaporan" aria-expanded="true" aria-controls="collapseLaporan">
                    <i class="fa-solid fa-book-medical"></i>
                    <span>Laporan</span>
                </a>
                <div id="collapseLaporan" class="collapse" aria-labelledby="headingLaporan" data-parent="#accordionSidebar">
                    <div class="bg-white py-2 collapse-inner rounded">
                        <a class="collapse-item <?php if (str_contains($_SERVER['QUERY_STRING'], 'page=laporanrawat')) {
                                                    print('active');
                                                } ?>" href="index.php?page=laporanhome">Rawat Inap</a>
                        <a class="collapse-item <?php if (str_contains($_SERVER['QUERY_STRING'], 'page=laporaninap')) {
                                                    print('active');
                                                } ?>" href="index.php?page=laporanhome">Obat</a>

                    </div>
                </div>
            </li> -->


            <!-- Divider -->
            <hr class="sidebar-divider d-none d-md-block">

            <!-- Sidebar Toggler (Sidebar) -->
            <div class="text-center d-none d-md-inline">
                <button class="rounded-circle border-0" id="sidebarToggle"></button>
            </div>
        </ul>
        <div id="content-wrapper" class="d-flex flex-column">

            <!-- Main Content -->
            <div id="content">

                <!-- Topbar -->
                <nav class="navbar navbar-expand navbar-light bg-white topbar mb-4 static-top shadow">
                    <!-- Page Heading -->
                    <img src="img/header2.png" style="width:5%">
                    <h1>Rumah Sakit Asmara Loka</h1>
                    <div>
                        <a href=""> </a>
                        <a href=""></a>
                    </div>

                    <div class="topbar-brand-icon">
                    </div>
                    <div class="topbar-brand-text">
                    </div>
                    <!-- /.container-fluid -->
                    <!-- Sidebar Toggle (Topbar) -->
                    <button id="sidebarToggleTop" class="btn btn-link d-md-none rounded-circle mr-3">
                        <i class="fa fa-bars"></i>
                    </button>
                </nav>
                <div class="container-fluid">
                    <?php
                    if (isset($_GET['page'])) {
                        $page = $_GET['page'];
                        switch ($page) {
                            case 'dashboard':
                                include "halaman/dashboard.php";
                                break;
                            case 'dokter':
                                include "halaman/dokter.php";
                                break;
                            case 'kamar':
                                include "halaman/kamar.php";
                                break;
                            case 'pasien':
                                include "halaman/pasien.php";
                                break;
                            case 'obat':
                                include "halaman/obat.php";
                                break;
                            case 'transaksiinap':
                                include "halaman/transaksi_inap.php";
                                break;
                            case 'transaksiobat':
                                include "halaman/transaksi_obat.php";
                                break;
                            case 'edokter':
                                include "crud/edokter.php";
                                break;
                            case 'ekamar':
                                include "crud/ekamar.php";
                                break;
                            case 'epasien':
                                include "crud/epasien.php";
                                break;
                            case 'eobat':
                                include "crud/eobat.php";
                                break;
                            default:
                                echo "<center><h3>Maaf. Halaman tidak di temukan !</h3></center>";
                                break;
                        }
                    } else {
                        include "halaman/dashboard.php";
                    }

                    ?>
                </div>

            </div>
            <footer class="sticky-footer bg-white">
                <div class="container my-auto">
                    <div class="copyright text-center my-auto">
                        <span>Copyright &copy; Sistem Informasi Rumah Sakit - SI20A2</span>
                    </div>
                </div>
            </footer>
            <?php include_once("jsauth.php"); ?>
</body>

</html>