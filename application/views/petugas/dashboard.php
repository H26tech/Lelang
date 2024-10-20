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
                        <h1>Welcome, <?php echo $this->session->userdata('username'); ?>! You are logged in as <?php echo $this->session->userdata('user_type'); ?>.</h1>
                    </div>
                </div>
                <!-- end page title -->

                <div class="row">
                    <div class="col-xl-3 col-sm-6">
                        <div class="card mini-stat bg-primary">
                            <div class="card-body mini-stat-img">
                                <div class="mini-stat-icon">
                                    <i class="mdi mdi-cube-outline float-end"></i>
                                </div>
                                <div class="text-white">
                                    <h6 class="text-uppercase mb-3 font-size-16 text-white">Orders</h6>
                                    <h2 class="mb-4 text-white">1,587</h2>
                                    <span class="badge bg-info"> +11% </span> <span class="ms-2">From previous period</span>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="col-xl-3 col-sm-6">
                        <div class="card mini-stat bg-primary">
                            <div class="card-body mini-stat-img">
                                <div class="mini-stat-icon">
                                    <i class="mdi mdi-buffer float-end"></i>
                                </div>
                                <div class="text-white">
                                    <h6 class="text-uppercase mb-3 font-size-16 text-white">Revenue</h6>
                                    <h2 class="mb-4 text-white">$46,782</h2>
                                    <span class="badge bg-danger"> -29% </span> <span class="ms-2">From previous period</span>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="col-xl-3 col-sm-6">
                        <div class="card mini-stat bg-primary">
                            <div class="card-body mini-stat-img">
                                <div class="mini-stat-icon">
                                    <i class="mdi mdi-tag-text-outline float-end"></i>
                                </div>
                                <div class="text-white">
                                    <h6 class="text-uppercase mb-3 font-size-16 text-white">Average Price</h6>
                                    <h2 class="mb-4 text-white">$15.9</h2>
                                    <span class="badge bg-warning"> 0% </span> <span class="ms-2">From previous period</span>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="col-xl-3 col-sm-6">
                        <div class="card mini-stat bg-primary">
                            <div class="card-body mini-stat-img">
                                <div class="mini-stat-icon">
                                    <i class="mdi mdi-briefcase-check float-end"></i>
                                </div>
                                <div class="text-white">
                                    <h6 class="text-uppercase mb-3 font-size-16 text-white">Product Sold</h6>
                                    <h2 class="mb-4 text-white">1890</h2>
                                    <span class="badge bg-info"> +89% </span> <span class="ms-2">From previous period</span>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
                <!-- end row -->