<!-- ========== Left Sidebar Start ========== -->
<div class="vertical-menu">

    <div data-simplebar class="h-100">

        <!--- Sidemenu -->
        <div id="sidebar-menu">
            <!-- Left Menu Start -->
            <ul class="metismenu list-unstyled" id="side-menu">
                <li class="menu-title">Main</li>

                <li>
                    <a href="<?php echo ($this->session->userdata('user_role') == 'administrator ') ? base_url('admin/dashboard') : base_url('petugas/dashboard'); ?>" class="waves-effect">
                        <i class="mdi mdi-view-dashboard"></i>
                        <span class="badge rounded-pill bg-primary float-end">2</span>
                        <span>Dashboard</span>
                    </a>
                </li>


                <?php if ($this->session->userdata('user_type') == 'admin'): ?>
                    <li>
                        <a href="javascript: void(0);" class="has-arrow waves-effect">
                            <i class="mdi mdi-email-outline"></i>
                            <span>Register Akun</span>
                        </a>
                        <ul class="sub-menu" aria-expanded="false">
                            <li><a href="<?php echo base_url('auth/register_admin'); ?>">Admin</a></li>

                        </ul>
                    </li>
                <?php endif; ?>

                <li class="menu-title">Data</li>
                <li>
                    <a href="<?= base_url('Dashboard_petugas/data_lelang'); ?>" class="waves-effect">
                        <i class="mdi mdi-chat-processing-outline"></i>
                        <span class="badge rounded-pill bg-danger float-end">Hot</span>
                        <span>Data lelang</span>
                    </a>
                </li>

                <li>
                    <a href="<?= base_url('lelang/data_pemenang'); ?>" class="waves-effect">
                        <i class="mdi mdi-billboard"></i>
                        <span class="badge rounded-pill bg-success float-end">New</span>
                        <span>Data Pemenang</span>
                    </a>
                </li>

                <?php if ($this->session->userdata('user_type') == 'admin'): ?>
                    <li>
                        <a href="<?php echo base_url('Dashboard_admin/list_akun'); ?>" class="waves-effect">
                            <i class="mdi mdi-chat-processing-outline"></i>
                            <span class="badge rounded-pill bg-danger float-end">Hot</span>
                            <span>Data Akun</span>
                        </a>
                    </li>
                <?php endif; ?>
                <li class="menu-title">Laporan</li>
                <li>
                    <a href="<?= base_url('petugas/laporan'); ?>" class="waves-effect">
                        <i class="mdi mdi-chat-processing-outline"></i>
                        <span class="badge rounded-pill bg-danger float-end">Hot</span>
                        <span>Laporan</span>
                    </a>
                </li>
                <li class="menu-title">Logout</li>
                <li>
                    <a href="<?= base_url('auth/logout') ?>" class="waves-effect">
                        <i class="mdi mdi-chat-processing-outline"></i>
                        <span class="badge rounded-pill bg-danger float-end">Hot</span>
                        <span>Logout</span>
                    </a>
                </li>
            </ul>
        </div>
        <!-- Sidebar -->
    </div>
</div>
<!-- Left Sidebar End -->