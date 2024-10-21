<!doctype html>
<html lang="en">

<head>
    <meta charset="utf-8" />
    <title>Login | Lexa - Admin & Dashboard Template</title>
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta content="Premium Multipurpose Admin & Dashboard Template" name="description" />
    <meta content="Themesbrand" name="author" />
    <link rel="shortcut icon" href="<?= base_url('assets/temp/assets/images/favicon.ico'); ?>">
    <link href="<?= base_url('assets/temp/assets/css/bootstrap.min.css'); ?>" rel="stylesheet" />
    <link href="<?= base_url('assets/temp/assets/css/icons.min.css'); ?>" rel="stylesheet" />
    <link href="<?= base_url('assets/temp/assets/css/app.min.css'); ?>" rel="stylesheet" />
</head>

<body>
    <div class="account-pages my-5 pt-sm-5">
        <div class="container">
            <div class="row justify-content-center">
                <div class="col-md-8 col-lg-6 col-xl-5">
                    <div class="card overflow-hidden">
                        <div class="card-body pt-0">
                            <h3 class="text-center mt-5 mb-4">
                                <a href="index.html" class="d-block auth-logo">
                                    <img src="<?= base_url('assets/temp/assets/images/logo-dark.png'); ?>" alt="logo" height="30">
                                    <img src="<?= base_url('assets/temp/assets/images/logo-light.png'); ?>" alt="logo" height="30">
                                </a>
                            </h3>
                            <div class="p-3">
                                <h4 class="text-muted font-size-18 mb-1 text-center">Welcome Back!</h4>
                                <p class="text-muted text-center">Sign in to continue to Lexa.</p>
                                <form class="form-horizontal mt-4" action="<?= base_url('auth/login_process'); ?>" method="post">
                                    <div class="mb-3">
                                        <label for="username">Username</label>
                                        <input type="text" class="form-control" id="username" name="username" placeholder="Enter username" required>
                                    </div>
                                    <div class="mb-3">
                                        <label for="password">Password</label>
                                        <input type="password" class="form-control" id="password" name="password" placeholder="Enter password" required>
                                    </div>
                                    <div class="mb-3 row mt-4">
                                        <div class="col-6">
                                            <div class="form-check">
                                                <input type="checkbox" class="form-check-input" id="remember_me">
                                                <label class="form-check-label" for="remember_me">Remember me</label>
                                            </div>
                                        </div>
                                        <div class="col-6 text-end">
                                            <button class="btn btn-primary w-md waves-effect waves-light" type="submit">Log In</button>
                                        </div>
                                    </div>
                                </form>
                            </div>
                        </div>
                    </div>
                    <div class="mt-5 text-center">
                        <p>Don't have an account? <a href="<?= base_url('auth/register'); ?>" class="text-primary">Sign up now</a></p>
                        <p>&copy; <?= date('Y'); ?> Lexa - Crafted with <i class="mdi mdi-heart text-danger"></i> by Themesbrand.</p>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <script src="<?= base_url('assets/temp/assets/libs/jquery/jquery.min.js'); ?>"></script>
    <script src="<?= base_url('assets/temp/assets/libs/bootstrap/js/bootstrap.bundle.min.js'); ?>"></script>
    <script src="<?= base_url('assets/temp/assets/js/app.js'); ?>"></script>
</body>

</html>
