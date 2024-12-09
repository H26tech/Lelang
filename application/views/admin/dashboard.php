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
                            <li class="breadcrumb-item"><a href="javascript: void(0);">Login</a></li>
                            <li class="breadcrumb-item active"><a href="javascript: void(0);">Dashboard</a></li>
                        </ol>
                    </div>
                    <h1>Welcome, <?php echo $this->session->userdata('nama_petugas'); ?>! You are logged in as <?php echo $this->session->userdata('user_type'); ?>.</h1>
                </div>
            </div>
            <!-- end page title -->
            <div class="row">
                <!-- Jumlah Akun User -->
                <!-- <div class="col-xl-3 col-sm-6">
                    <div class="card mini-stat bg-primary">
                        <div class="card-body mini-stat-img">
                            <div class="mini-stat-icon">
                                <i class="mdi mdi-cube-outline float-end"></i>
                            </div>
                            <div class="text-white">
                                <h6 class="text-uppercase mb-3 font-size-16 text-white">Jumlah Akun User</h6>
                                <h2 class="mb-4 text-white"><?= isset($jumlah_user) ? $jumlah_user : 'Data Tidak Tersedia'; ?></h2>
                                
                            </div>
                        </div>
                    </div>
                </div> -->
                <!-- Jumlah Akun Admin -->
                <!-- <div class="col-xl-3 col-sm-6">
                    <div class="card mini-stat bg-primary">
                        <div class="card-body mini-stat-img">
                            <div class="mini-stat-icon">
                                <i class="mdi mdi-buffer float-end"></i>
                            </div>
                            <div class="text-white">
                                <h6 class="text-uppercase mb-3 font-size-16 text-white">Jumlah Akun Admin</h6>
                                <h2 class="mb-4 text-white"><?= isset($jumlah_user) ? $jumlah_user : 'Data Tidak Tersedia'; ?></h2>
                                
                            </div>
                        </div>
                    </div>
                </div> -->
                <!-- Jumlah Akun Petugas -->
                <!-- <div class="col-xl-3 col-sm-6">
                    <div class="card mini-stat bg-primary">
                        <div class="card-body mini-stat-img">
                            <div class="mini-stat-icon">
                                <i class="mdi mdi-tag-text-outline float-end"></i>
                            </div>
                            <div class="text-white">
                                <h6 class="text-uppercase mb-3 font-size-16 text-white">Jumlah Akun Petugas</h6>
                                <h2 class="mb-4 text-white"><?= isset($jumlah_petugas) ? $jumlah_petugas : 'Data Tidak Tersedia'; ?></h2>
                                
                            </div>
                        </div>
                    </div>
                </div> -->
                <!-- Jumlah Data Barang -->
                <!-- <div class="col-xl-3 col-sm-6">
                    <div class="card mini-stat bg-primary">
                        <div class="card-body mini-stat-img">
                            <div class="mini-stat-icon">
                                <i class="mdi mdi-briefcase-check float-end"></i>
                            </div>
                            <div class="text-white">
                                <h6 class="text-uppercase mb-3 font-size-16 text-white">Data Barang</h6>
                                <h2 class="mb-4 text-white"><?= isset($jumlah_barang) ? $jumlah_barang : 'Data Tidak Tersedia'; ?></h2>
                                
                            </div>
                        </div>
                    </div>
                </div>
            </div> -->
            <!-- end row -->