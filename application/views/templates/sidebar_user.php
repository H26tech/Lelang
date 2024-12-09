<!-- ========== Left Sidebar Start ========== -->
<div class="vertical-menu">

    <div data-simplebar class="h-100">

        <!--- Sidemenu -->
        <div id="sidebar-menu">
            <!-- Left Menu Start -->
            <ul class="metismenu list-unstyled" id="side-menu">
                <li class="menu-title">Main</li>

                <li>
                    <a href="<?php echo base_url('user/dashboard') ?>" class="waves-effect">
                        <i class="mdi mdi-view-dashboard"></i>
                        <span class="badge rounded-pill bg-primary float-end">2</span>
                        <span>Dashboard</span>
                    </a>
                </li>

                <li class="menu-title">Data</li>

                <li>
                    <a href="<?= base_url('dashboard_user/history') ?>">
                        <i class="mdi mdi-billboard"></i>
                        <span class="badge rounded-pill bg-success float-end">New</span>
                        <span>History Lelang</span>
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