<div class="main-content">
    <div class="page-content">
        <div class="container-fluid">
            <!-- Page Title -->
            <div class="row">
                <div class="col-sm-6">
                    <div class="page-title-box">
                        <h4>Register Petugas</h4>
                        <ol class="breadcrumb m-0">
                            <li class="breadcrumb-item"><a href="javascript: void(0);">Lexa</a></li>
                            <li class="breadcrumb-item active">Register Petugas</li>
                        </ol>
                    </div>
                </div>
            </div>
            <!-- Form Section -->
            <div class="row">
                <div class="col-lg-6 mx-auto">
                    <div class="card">
                        <div class="card-body">
                            <h4 class="card-title">Petugas Registration Form</h4>
                            <?php if ($this->session->flashdata('success')): ?>
                                <div class="alert alert-success"><?php echo $this->session->flashdata('success'); ?></div>
                            <?php elseif ($this->session->flashdata('error')): ?>
                                <div class="alert alert-danger"><?php echo $this->session->flashdata('error'); ?></div>
                            <?php endif; ?>
                            <form action="<?php echo site_url('dashboard_admin/register_petugas'); ?>" method="post">
                                <div class="mb-3">
                                    <label class="form-label" for="username">Username</label>
                                    <input type="text" class="form-control" id="username" name="username" placeholder="Enter username" required>
                                    <?php echo form_error('username'); ?>
                                </div>
                                
                                <div class="mb-3">
                                    <label class="form-label" for="password">Password</label>
                                    <input type="password" class="form-control" id="password" name="password" placeholder="Enter password" required>
                                    <?php echo form_error('password'); ?>
                                </div>
                                
                                <div class="mb-3">
                                    <label class="form-label" for="nama_petugas">Full Name</label>
                                    <input type="text" class="form-control" id="nama_petugas" name="nama_petugas" placeholder="Enter full name" required>
                                    <?php echo form_error('nama_petugas'); ?>
                                </div>

                                <button type="submit" class="btn btn-primary w-md">Submit</button>
                            </form>
                        </div>
                    </div>
                </div>
            </div>
            <!-- End Form Section -->
        </div> <!-- container-fluid -->
    </div> <!-- End Page-content -->
</div>
