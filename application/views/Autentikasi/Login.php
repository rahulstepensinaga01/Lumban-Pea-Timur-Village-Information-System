<div id="content-wrapper" class="d-flex flex-column">

    <!-- Main Content -->
    <div id="content">
        <div class="container">
            <div class="mt-3">
                <div class="row justify-content-center">
                    <h1 class="text-primary ml-3">Sistem Informasi Desa Lumban Pea
                    </h1>
                    <i class="fas fa-laugh-wink rotate-n-15 text-primary"></i>
                </div>
            </div>
            <!-- Outer Row -->
            <div class="row justify-content-center">

                <div class="col-lg-7">

                    <div class="card o-hidden border-0 shadow-lg my-5">
                        <div class="card-body p-0">
                            <!-- Nested Row within Card Body -->
                            <div class="row">
                                <div class="col-lg">
                                    <div class="p-5">
                                        <div class="text-center">
                                            <h1 class="h4 text-gray-900 mb-4">Login</h1>
                                        </div>

                                        <?= $this->session->flashdata('message'); ?>

                                        <form class="user" method="post" action="<?= base_url('Autentikasi/index'); ?>">
                                            <div class="form-group">
                                                <?= form_error('username', '<small class="text-danger">', '</small>'); ?>
                                                <input type="text" class="form-control form-control-user" id="username" name="username" placeholder="Masukkan Username..." value="<?= set_value('username') ?>">
                                            </div>
                                            <div class="form-group">
                                                <?= form_error('password', '<small class="text-danger">', '</small>'); ?>
                                                <input type="password" class="form-control form-control-user" id="password" name="password" placeholder="Masukkan Password...">
                                            </div>
                                            <button type="submit" class="btn btn-primary btn-user btn-block">
                                                Login
                                            </button>
                                            <!--<div class="form-group">
                                            <div class="custom-control custom-checkbox small">
                                                <input type="checkbox" class="custom-control-input" id="customCheck">
                                                <label class="custom-control-label" for="customCheck">Remember
                                                    Me</label>
                                            </div>
                                        </div>-->
                                            <!--<a href="index.html" class="btn btn-primary btn-user btn-block">
                                        Login
                                    </a>
                                    <hr>
                                        <a href="index.html" class="btn btn-google btn-user btn-block">
                                            <i class="fab fa-google fa-fw"></i> Login with Google
                                        </a>
                                        <a href="index.html" class="btn btn-facebook btn-user btn-block">
                                            <i class="fab fa-facebook-f fa-fw"></i> Login with Facebook
                                        </a>-->
                                        </form>
                                        <hr>
                                        <!--<div class="text-center">
                                    <a class="small" href="forgot-password.html">Forgot Password?</a>
                                </div>-->
                                        <div class="text-center">
                                            <a class="small" href="<?= base_url() ?>Autentikasi/register">Belum memiliki Akun? Klik disini untuk Registrasi!</a>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>

                </div>

            </div>

        </div>
    </div>
</div>