<!doctype html>
<html lang="en">

<head>
    <meta charset="utf-8" />
    <title>Register | Lexa - Admin & Dashboard Template</title>
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta content="Premium Multipurpose Admin & Dashboard Template" name="description" />
    <meta content="Themesbrand" name="author" />
    <link rel="shortcut icon" href="<?= base_url('assets/temp/assets/images/favicon.ico'); ?>">

    <!-- Bootstrap Css -->
    <link href="<?= base_url('assets/temp/assets/css/bootstrap.min.css'); ?>" id="bootstrap-style" rel="stylesheet" type="text/css" />
    <!-- Icons Css -->
    <link href="<?= base_url('assets/temp/assets/css/icons.min.css'); ?>" rel="stylesheet" type="text/css" />
    <!-- App Css -->
    <link href="<?= base_url('assets/temp/assets/css/app.min.css'); ?>" id="app-style" rel="stylesheet" type="text/css" />
</head>

<body>
    <div class="account-pages my-5 pt-sm-5">
        <div class="container">
            <div class="row justify-content-center">
                <div class="col-md-8 col-lg-6 col-xl-5">
                    <div class="card overflow-hidden">
                        <div class="card-body pt-0">
                            <h3 class="text-center mt-5 mb-4">
                                <a href="<?= base_url(); ?>" class="d-block auth-logo">
                                    <img src="<?= base_url('assets/temp/assets/images/logo-dark.png'); ?>" alt="" height="30" class="auth-logo-dark">
                                    <img src="<?= base_url('assets/temp/assets/images/logo-light.png'); ?>" alt="" height="30" class="auth-logo-light">
                                </a>
                            </h3>

                            <div class="p-3">
                                <h4 class="text-muted font-size-18 mb-1 text-center">Free Register</h4>
                                <p class="text-muted text-center">Get your free Lexa account now.</p>

                                <?php if ($this->session->flashdata('success')): ?>
                                    <div class="alert alert-success">
                                        <?= $this->session->flashdata('success'); ?>
                                    </div>
                                <?php endif; ?>

                                <?php if (validation_errors()): ?>
                                    <div class="alert alert-danger">
                                        <?= validation_errors(); ?>
                                    </div>
                                <?php endif; ?>

                                <form class="form-horizontal mt-4" action="<?= site_url('auth/register_user'); ?>" method="post">
                                    <div class="mb-3">
                                        <label for="username">Username</label>
                                        <input type="text" class="form-control" id="username" name="username" placeholder="Enter username" required>
                                    </div>
                                    <div class="mb-3">
                                        <label for="password">Password</label>
                                        <input type="password" class="form-control" id="password" name="password" placeholder="Enter password" required>
                                    </div>
                                    <div class="mb-3">
                                        <label for="nama_lengkap">Full Name</label>
                                        <input type="text" class="form-control" id="nama_lengkap" name="nama_lengkap" placeholder="Enter full name" required>
                                    </div>
                                    <div class="mb-3">
                                        <label for="telp">Phone Number</label>
                                        <input type="text" class="form-control" id="telp" name="telp" placeholder="Enter phone number" required>
                                    </div>
                                    <div class="mb-3 row mt-4">
                                        <div class="col-12 text-end">
                                            <button class="btn btn-primary w-md waves-effect waves-light" type="submit">Register</button>
                                        </div>
                                    </div>
                                    <div class="form-group mb-0 row">
                                        <div class="col-12 mt-4">
                                            <a href="<?= site_url('auth/login'); ?>" class="text-muted"><i class="mdi mdi-account"></i> Already have an account?</a>
                                        </div>
                                    </div>
                                </form>
                            </div>
                        </div>
                    </div>
                    <div class="mt-5 text-center">
                        <p>&copy; <?= date('Y'); ?> Lexa - Crafted with <i class="mdi mdi-heart text-danger"></i> by Themesbrand.</p>
                    </div>
                </div>
            </div>
        </div>
    </div>

    <!-- JAVASCRIPT -->
    <script src="<?= base_url('assets/temp/assets/libs/jquery/jquery.min.js'); ?>"></script>
    <script src="<?= base_url('assets/temp/assets/libs/bootstrap/js/bootstrap.bundle.min.js'); ?>"></script>
    <script src="<?= base_url('assets/temp/assets/libs/metismenu/metisMenu.min.js'); ?>"></script>
    <script src="<?= base_url('assets/temp/assets/libs/simplebar/simplebar.min.js'); ?>"></script>
    <script src="<?= base_url('assets/temp/assets/libs/node-waves/waves.min.js'); ?>"></script>
    <!-- App js -->
    <script src="<?= base_url('assets/temp/assets/js/app.js'); ?>"></script>
</body>

</html>
