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
                    <div class="card-body">
                        <img class="img-thumbnail" src="<?= base_url('assets/img/profil/') . $tb_akun['profil'] ?>">
                    </div>
                </div>

            </div>
            <div class="col-xl-8 col-lg-7">
                <div class="card">
                    <div class="card-header">
                        <div class="card-tools">
                            <ul class="nav nav-pills ml-auto">
                                <li class="nav-item">
                                    <a class="nav-link active" href="#dataakun" data-toggle="tab">Data Akun</a>
                                </li>
                                <li class="nav-item">
                                    <a class="nav-link" href="#datapribadi" data-toggle="tab">Data Pribadi</a>
                                </li>
                            </ul>
                        </div>
                    </div><!-- /.card-header -->
                    <div class="card-body">
                        <div class="tab-content p-0">
                            <!-- Morris chart - Sales -->
                            <div class="chart tab-pane active" id="dataakun" style="position: relative; height: 300px;">
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
                                <div class="form-group row float-right">
                                    <a href="<?= base_url('Pengguna/EditAkunProfil'); ?>"><button type="submit" class="btn btn-primary mr-3">Edit Akun Profil</button></a>
                                </div>
                            </div>
                            <div class="chart tab-pane" id="datapribadi" style="position: relative; height: 300px;">
                                <div class="form-group row">
                                    <label class="col-sm-3 col-form-label">NIK</label>
                                    <div class="col-sm-9 mt-2">
                                        : <?= $tb_penduduk['nik'] ?>
                                    </div>
                                </div>
                                <div class="form-group row">
                                    <label class="col-sm-3 col-form-label">Nama</label>
                                    <div class="col-sm-9 mt-2">
                                        : <?= $tb_penduduk['nama'] ?>
                                    </div>
                                </div>
                                <div class="form-group row">
                                    <label class="col-sm-3 col-form-label">Jumlah Anggota Keluarga</label>
                                    <div class="col-sm-9 mt-2">
                                        : <?= $tb_penduduk['jumlah_anggota_keluarga'] ?>
                                    </div>
                                </div>
                                <div class="form-group row">
                                    <label class="col-sm-3 col-form-label">Tempat Lahir</label>
                                    <div class="col-sm-9 mt-2">
                                        : <?= $tb_penduduk['tempat_lahir'] ?>
                                    </div>
                                </div>
                                <div class="form-group row">
                                    <label class="col-sm-3 col-form-label">Tanggal Lahir</label>
                                    <div class="col-sm-9 mt-2">
                                        : <?= $tb_penduduk['tanggal_lahir'] ?>
                                    </div>
                                </div>
                                <div class="form-group row">
                                    <label class="col-sm-3 col-form-label">Alamat</label>
                                    <div class="col-sm-9 mt-2">
                                        : <?= $tb_penduduk['alamat'] ?>
                                    </div>
                                </div>
                                <div class="form-group row">
                                    <label class="col-sm-3 col-form-label">Pekerjaan</label>
                                    <div class="col-sm-9 mt-2">
                                        : <?= $tb_penduduk['pekerjaan'] ?>
                                    </div>
                                </div>
                                <div class="form-group row float-right">
                                    <a href="<?= base_url('Pengguna/EditDataPribadi'); ?>"><button type="submit" class="btn btn-primary mr-3">Edit Data Pribadi</button></a>
                                </div>
                            </div>
                        </div>
                    </div><!-- /.card-body -->
                </div>
            </div>
        </div>
    </div>
</div>
<!-- /.container-fluid -->