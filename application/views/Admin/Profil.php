<!-- Begin Page Content -->
<div class="card-body">
    <div class="chart-area">
        <?= $this->session->flashdata('message'); ?>
        <div class="row">
            <div class="col-xl-4 col-lg-5">
                <div class="card shadow mb-4">
                    <!-- Card Header - Dropdown -->
                    <div class="card-header py-3">
                        <h6 class="m-0 font-weight-bold text-primary">Foto Profil</h6>

                    </div>
                    <div>
                        <img class="img-thumbnail" src="<?= base_url('assets/img/profil/') . $tb_akun['profil'] ?>">
                    </div>
                </div>

            </div>

            <div class="col-xl-8 col-lg-7">
                <div class="card shadow mb-4">
                    <div class="card-header p-2">
                        <ul class="nav nav-pills">
                            <li class="nav-item"><a class="nav-link active" href="#dataakun" data-toggle="tab">Data Akun</a></li>
                        </ul>
                    </div><!-- /.card-header -->
                    <div class="card-body">
                        <div class="tab-content">
                            <div class="card-body">
                                <div class="chart-area">
                                    <div class="form-group row">
                                        <label class="col-sm-3 col-form-label">NIK</label>
                                        <div class="col-sm-9 mt-2">
                                            : <?= $tb_akun['nik'] ?>
                                        </div>
                                    </div>
                                    <div class="form-group row">
                                        <label class="col-sm-3 col-form-label">Nama</label>
                                        <div class="col-sm-9 mt-2">
                                            : <?= $tb_akun['nama'] ?>
                                        </div>
                                    </div>
                                    <div class="form-group row">
                                        <label class="col-sm-3 col-form-label">Email</label>
                                        <div class="col-sm-9 mt-2">
                                            : <?= $tb_akun['email'] ?>
                                        </div>
                                    </div>
                                    <div class="form-group row">
                                        <label class="col-sm-3 col-form-label">Jenis Kelamin</label>
                                        <div class="col-sm-9 mt-2">
                                            : <?= $tb_akun['jenis_kelamin'] ?>
                                        </div>
                                    </div>
                                    <div class="form-group row">
                                        <label class="col-sm-3 col-form-label">Username</label>
                                        <div class="col-sm-9 mt-2">
                                            : <?= $tb_akun['username'] ?>
                                        </div>
                                    </div>
                                </div>
                                <div class="form-group row float-right">
                                    <a href="<?= base_url('Pengguna/EditAkunProfil'); ?>"><button type="submit" class="btn btn-primary">Edit Akun Profil</button></a>
                                </div>
                            </div>
                        </div>
                        <!-- /.tab-content -->
                    </div><!-- /.card-body -->
                </div>
                <!-- /.card -->
            </div>
        </div>
    </div>
</div>
<!-- /.container-fluid -->