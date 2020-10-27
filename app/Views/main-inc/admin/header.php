<!doctype html>
<html lang="en">

<head>
    <title>Sistem Informasi Rumah Sakit</title>
    <link rel="shortcut icon" href="/media/img/pwni.png" type="image/x-icon" />
    <link rel="stylesheet" href="/media/bootstrap/css/bootstrap.min.css ">
    <link rel="stylesheet" href="/media/bootstrap/admin.css ">
    <link rel="stylesheet" href="/media/bootstrap/main.css ">
    <script src="/media/bootstrap/js/jquery.slim.min.js"></script>
    <script src="/media/bootstrap/js/jquery.js"></script>
</head>

<body>
    <nav class="navbar navbar-dark sticky-top bg-blue flex-md-nowrap p-0 shadow">
        <a class="navbar-brand col-md-3 col-lg-2 mr-0 px-3" href="#">Hi! SiRusa <img src="..\media\img\pwni.png" style="float: right" width="25px" alt=""></a>
        <ul class="navbar-nav px-3">
            <li class="nav-item text-nowrap">
                <a class="nav-link text-white" href="<?php echo base_url('login') ?>">Keluar</a>
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
                            <a class="nav-link active text-white text-center" href="">
                                Bagas Ariefia Pribady 
                            </a>
                            <hr class="bg-light">
                        </li>
                        <li class="nav-item">
                            <a class="nav-link active text-white" href="<?php echo base_url('public/pasien') ?>">
                                <span data-feather="users"></span>
                                Pasien <span class="sr-only">(current)</span>
                            </a>
                            <hr class="bg-light">
                        </li>
                        <li class="nav-item">
                            <a class="nav-link text-white" href="<?php echo base_url('public/riwayat_layanan') ?>">
                                <span data-feather="file"></span>
                                Riwayat Layanan Pasien
                            </a>
                            <hr class="bg-light">
                        </li>
                        <li class="nav-item">
                            <a class="nav-link text-white" href="#">
                                <span data-feather="file"></span>
                                Data Master
                            </a>
                            <div class="dropdown-container">
                                <a class="nav-link text-white" href="<?php echo base_url('public/master_dokter') ?>"><span data-feather="file"></span>Dokter</a>
                                <a class="nav-link text-white" href="<?php echo base_url('public/master_pegawai') ?>"><span data-feather="file"></span>Pegawai</a>
                                <a class="nav-link text-white" href="<?php echo base_url('public/master_obat') ?>"><span data-feather="file"></span>Obat</a>
                                <a class="nav-link text-white" href="<?php echo base_url('public/master_asuransi_jiwa') ?>"><span data-feather="file"></span>Asuransi Jiwa</a>
                            </div>
                            <hr class="bg-light">
                        </li>
                    </ul>
                </div>
            </nav>
