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
            <div class="row justify-content-center">
                <div class="col-lg-7">
                    <div class="card o-hidden border-0 shadow-lg my-5">
                        <div class="card-body p-0">
                            <!-- Nested Row within Card Body -->
                            <div class="row">
                                <div class="col-lg">
                                    <div class="p-5">
                                        <div class="text-center">
                                            <h1 class="h4 text-gray-900 mb-4">Buat Akun!</h1>
                                        </div>
                                        <?= $this->session->flashdata('message'); ?>
                                        <form class="user" method="post" action="<?= base_url('Autentikasi/register'); ?>">
                                            <div class="form-group">
                                                <?= form_error('nik', '<small class="text-danger">', '</small>'); ?>
                                                <input type="text" class="form-control" placeholder="Masukkan NIK Lengkap..." id="nik" name="nik" value="<?= set_value('nik') ?>">
                                            </div>
                                            <div class="form-group">
                                                <?= form_error('nama', '<small class="text-danger">', '</small>'); ?>
                                                <input type="text" class="form-control" placeholder="Masukkan Nama Lengkap..." id="nama" name="nama" value="<?= set_value('nama') ?>">
                                            </div>
                                            <div class="form-group">
                                                <?= form_error('email', '<small class="text-danger">', '</small>'); ?>
                                                <input type="text" class="form-control" placeholder="Masukkan Email..." id="email" name="email" value="<?= set_value('email') ?>">
                                            </div>
                                            <div class=" form-group">
                                                <?= form_error('jenis_kelamin', '<small class="text-danger">', '</small>'); ?>
                                                <select class="form-control" id="jenis_kelamin" name="jenis_kelamin" value="<?= set_value('jenis_kelamin') ?>">
                                                    <option>Masukkan Jenis Kelamin</option>
                                                    <option>Laki-laki</option>
                                                    <option>Perempuan</option>
                                                </select>
                                            </div>
                                            <div class=" form-group">
                                                <?= form_error('username', '<small class="text-danger">', '</small>'); ?>
                                                <input type="text" class="form-control" placeholder="Masukkan Username..." id="username" name="username" value="<?= set_value('username') ?>">
                                            </div>
                                            <div class=" form-group">
                                                <?= form_error('password', '<small class="text-danger">', '</small>'); ?>
                                                <input type="password" class="form-control" placeholder="Masukkan Password..." id="password" name="password" value="<?= set_value('password') ?>">
                                            </div>
                                            <div class=" form-group">
                                                <?= form_error('confirmpassword', '<small class="text-danger">', '</small>'); ?>
                                                <input type="password" class="form-control" placeholder="Masukkan Kembali Password..." id="confirmpassword" name="confirmpassword" value="<?= set_value('confirmpassword') ?>">
                                            </div>
                                            <button type="submit" class="btn btn-primary btn-user btn-block">
                                                Register
                                            </button>
                                            <!--<a href="login.html" class="btn btn-primary btn-user btn-block">
                                        Register Account
                                    </a>
                                    <hr>
                            <a href="index.html" class="btn btn-google btn-user btn-block">
                                <i class="fab fa-google fa-fw"></i> Register with Google
                            </a>
                            <a href="index.html" class="btn btn-facebook btn-user btn-block">
                                <i class="fab fa-facebook-f fa-fw"></i> Register with Facebook
                            </a>-->
                                        </form>
                                        <hr>
                                        <!--<div class="text-center">
                                    <a class="small" href="forgot-password.html">Forgot Password?</a>
                                </div>-->
                                        <div class="text-center">
                                            <a class="small" href="<?= base_url() ?>Autentikasi/index">Sudah memiliki Akun? Klik disini untuk Login!</a>
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