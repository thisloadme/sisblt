<!doctype html>
<html lang="en">

<head>
    <title>Sistem Informasi BLT</title>
    <link rel="shortcut icon" href="/media/img/pwni.png" type="image/x-icon" />
    <link rel="stylesheet" href="/adminlte/plugins/datatables-bs4/css/dataTables.bootstrap4.min.css">
    <link rel="stylesheet" href="/adminlte/plugins/datatables-responsive/css/responsive.bootstrap4.min.css">
    <link rel="stylesheet" href="/media/bootstrap/css/bootstrap.min.css ">
    <link rel="stylesheet" href="/media/bootstrap/admin.css ">
    <link rel="stylesheet" href="/media/bootstrap/main.css ">
    <style type="text/css">
        .selected{
            background-color: #8cbbf5!important;
        }
        .fade{
            transition: opacity .15s linear!important;
        }
    </style>
    <script src="/media/bootstrap/js/jquery.slim.min.js"></script>
    <script src="/media/bootstrap/js/jquery.js"></script>
    <script src="/media/bootstrap/js/bootstrap.min.js"></script>

    <script src="/media/sweetalert/sweetalert.min.js"></script>
</head>

<body>
    <nav class="navbar navbar-dark sticky-top bg-blue flex-md-nowrap p-0 shadow">
        <a class="navbar-brand col-md-3 col-lg-2 mr-0 px-3" href="#">SIS - BLT <img src="..\media\img\pwni.png" style="float: right" width="25px" alt=""></a>
        <ul class="navbar-nav px-3">
            <li class="nav-item text-nowrap">
                <a class="nav-link text-white" href="/login">Keluar</a>
            </li>
        </ul>
    </nav>

    <div class="container-fluid">
        <div class="row">
            <nav id="sidebarMenu" class="col-md-3 col-lg-2 d-md-block bg-dark sidebar collapse">
                <div class="sidebar-sticky pt-3">
                    <ul class="nav flex-column">
                        <li class="nav-item">
                            <img src="/media/img/pwni.png" alt="" style="width:100px;margin-left: 4.2rem;">
                            <hr class="bg-light">
                        </li>
                        <li class="nav-item">
                            <a class="nav-link text-white" href="/transaksi">
                                <span data-feather="file"></span>
                                Transaksi
                            </a>
                            <hr class="bg-light">
                        </li>
                        <li class="nav-item">
                            <a class="nav-link text-white" href="/plafon">
                                <span data-feather="file"></span>
                                Plafon Anggaran
                            </a>
                            <hr class="bg-light">
                        </li>
                        <li class="nav-item">
                            <a class="nav-link text-white" href="#">
                                <span data-feather="file"></span>
                                Data Master
                            </a>
                            <div class="dropdown-container">
                                <a class="nav-link text-white" href="/master_penduduk"><span data-feather="file"></span>Penduduk</a>
                                <a class="nav-link text-white" href="/master_kk"><span data-feather="file"></span>Kartu Keluarga</a>
                                <a class="nav-link text-white" href="/master_jenis_bantuan"><span data-feather="file"></span>Jenis Bantuan</a>
                                <a class="nav-link text-white" href="/master_tingkat_adm"><span data-feather="file"></span>Tingkat Administrasi</a>
                                <a class="nav-link text-white" href="/master_status"><span data-feather="file"></span>Status</a>
                                <a class="nav-link text-white" href="/master_pengguna"><span data-feather="file"></span>Pengguna</a>
                            </div>
                            <hr class="bg-light">
                        </li>
                    </ul>
                </div>
            </nav>
