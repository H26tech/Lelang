<body data-sidebar="dark">

    <!-- <body data-layout="horizontal" data-topbar="colored"> -->

    <!-- Begin page -->
    <div id="layout-wrapper">

        <header id="page-topbar">
            <div class="navbar-header">
                <div class="d-flex">
                    <!-- LOGO -->
                    <div class="navbar-brand-box">
                        <a href="index.html" class="logo logo-dark">
                            <span class="logo-sm">
                                <img src="<?= base_url('assets/temp/'); ?>assets/images/logo-sm.png" alt="" height="22">
                            </span>
                            <span class="logo-lg">
                                <img src="<?= base_url('assets/temp/'); ?>assets/images/logo-dark.png" alt="" height="17">
                            </span>
                        </a>

                        <a href="index.html" class="logo logo-light">
                            <span class="logo-sm">
                                <img src="<?= base_url('assets/temp/'); ?>assets/images/logo-sm.png" alt="" height="22">
                            </span>
                            <span class="logo-lg">
                                <img src="<?= base_url('assets/temp/'); ?>assets/images/logo-light.png" alt="" height="18">
                            </span>
                        </a>
                    </div>

                    <button type="button" class="btn btn-sm px-3 font-size-24 header-item waves-effect vertical-menu-btn">
                        <i class="mdi mdi-menu"></i>
                    </button>

                    <div class="d-none d-sm-block">
                        <div class="dropdown dropdown-topbar pt-3 mt-1 d-inline-block">
                            <a class="btn btn-light dropdown-toggle" href="#" role="button" id="dropdownMenuLink" data-bs-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                                Create <i class="mdi mdi-chevron-down"></i>
                            </a>

                            <div class="dropdown-menu" aria-labelledby="dropdownMenuLink">
                                <a class="dropdown-item" href="#">Action</a>
                                <a class="dropdown-item" href="#">Another action</a>
                                <a class="dropdown-item" href="#">Something else here</a>
                                <div class="dropdown-divider"></div>
                                <a class="dropdown-item" href="#">Separated link</a>
                            </div>
                        </div>
                    </div>
                </div>

                <div class="d-flex">

                    <!-- App Search-->
                    <form class="app-search d-none d-lg-block">
                        <div class="position-relative">
                            <input type="text" class="form-control" placeholder="Search...">
                            <span class="fa fa-search"></span>
                        </div>
                    </form>

                    <div class="dropdown d-inline-block d-lg-none ms-2">
                        <button type="button" class="btn header-item noti-icon waves-effect" id="page-header-search-dropdown" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                            <i class="mdi mdi-magnify"></i>
                        </button>
                        <div class="dropdown-menu dropdown-menu-lg dropdown-menu-right p-0" aria-labelledby="page-header-search-dropdown">

                            <form class="p-3">
                                <div class="form-group m-0">
                                    <div class="input-group">
                                        <input type="text" class="form-control" placeholder="Search ..." aria-label="Recipient's username">
                                        <div class="input-group-append">
                                            <button class="btn btn-primary" type="submit"><i class="mdi mdi-magnify"></i></button>
                                        </div>
                                    </div>
                                </div>
                            </form>
                        </div>
                    </div>

                    <div class="dropdown d-none d-lg-inline-block">
                        <button type="button" class="btn header-item noti-icon waves-effect" data-toggle="fullscreen">
                            <i class="mdi mdi-fullscreen font-size-24"></i>
                        </button>
                    </div>



                    <div class="dropdown d-inline-block">
                        <button type="button" class="btn header-item waves-effect" id="page-header-user-dropdown" data-bs-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                            <img class="rounded-circle header-profile-user" src="<?= base_url('assets/temp/'); ?>assets/images/users/user-4.jpg" alt="Header Avatar">
                        </button>
                        <div class="dropdown-menu dropdown-menu-end">
                            <!-- item-->
                            <a class="dropdown-item" href="#"><i class="mdi mdi-account-circle font-size-17 text-muted align-middle me-1"></i> Profile</a>
                            <a class="dropdown-item" href="#"><i class="mdi mdi-wallet font-size-17 text-muted align-middle me-1"></i> My Wallet</a>
                            <a class="dropdown-item d-flex align-items-center" href="#"><i class="mdi mdi-cog font-size-17 text-muted align-middle me-1"></i> Settings<span class="badge bg-success ms-auto">11</span></a>
                            <a class="dropdown-item" href="#"><i class="mdi mdi-lock-open-outline font-size-17 text-muted align-middle me-1"></i> Lock screen</a>
                            <div class="dropdown-divider"></div>
                            <a class="dropdown-item text-danger" href="#"><i class="mdi mdi-power font-size-17 text-muted align-middle me-1 text-danger"></i> Logout</a>
                        </div>
                    </div>

                    <div class="dropdown d-inline-block">
                        <button type="button" class="btn header-item noti-icon right-bar-toggle waves-effect">
                            <i class="mdi mdi-spin mdi-cog"></i>
                        </button>
                    </div>
                </div>
            </div>
        </header>




        <!-- ============================================================== -->
        <!-- Start right Content here -->
        <!-- ============================================================== -->
        <div class="main-content">
            <div class="page-content">
                <div class="container-fluid">

                    <!-- start page title -->
                    <div class="row">
                        <div class="col-sm-6">
                            <div class="page-title-box">
                                <h4>Dashboard</h4>
                                <ol class="breadcrumb m-0">
                                    <li class="breadcrumb-item"><a href="javascript: void(0);">Lexa</a></li>
                                    <li class="breadcrumb-item"><a href="javascript: void(0);">Dashboard</a></li>
                                    <li class="breadcrumb-item active">Dashboard</li>
                                </ol>
                            </div>
                            <h1>Welcome, <?php echo $this->session->userdata('nama_lengkap'); ?>! You are logged in as <?php echo $this->session->userdata('user_type'); ?>.</h1>
                        </div>
                    </div>
                    <!-- end page title -->

                    <!-- start displaying barang data -->
                    <div class="row">
                        <?php if (!empty($barang)): ?>
                            <div class="row">
                                <?php foreach ($barang as $item): ?>
                                    <div class="col-md-4">
                                        <div class="card mb-4">
                                            <img src="<?php echo base_url('uploads/' . $item['gambar']); ?>" class="card-img-top" alt="<?php echo $item['nama_barang']; ?>">
                                            <div class="card-body">
                                                <h5 class="card-title"><?php echo $item['nama_barang']; ?></h5>
                                                <p class="card-text">Harga Awal: Rp <?php echo number_format($item['harga_awal'], 0, ',', '.'); ?></p>
                                                <p class="card-text">Tanggal Mulai: <?php echo date('d-m-Y', strtotime($item['tanggal_mulai'])); ?></p>
                                                <p class="card-text">Tanggal Selesai: <?php echo date('d-m-Y', strtotime($item['tanggal_selesai'])); ?></p>
                                                <a href="<?php echo base_url('dashboard_user/detail_barang/' . $item['id_barang']); ?>" class="btn btn-primary">Lihat Detail</a>
                                            </div>
                                        </div>
                                    </div>
                                <?php endforeach; ?>
                            </div>
                        <?php else: ?>
                            <p>Tidak ada barang lelang yang tersedia saat ini.</p>
                        <?php endif; ?>
                    </div>
                    <!-- end displaying barang data -->

                </div> <!-- container-fluid -->
            </div> <!-- page-content -->
        </div> <!-- main-content -->
    </div> <!-- layout-wrapper -->
</body>


<!-- end row -->