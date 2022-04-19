<div class="container-fluid">
    <!-- DataTales Example -->
    <div class="card shadow mb-4">
        <div class="card-header py-3">
            <h6 class="m-0 font-weight-bold text-primary">Edit Data Akun</h6>
        </div>
        <div class="card-body">
            <?= form_open_multipart('Pengguna/EditAkunProfil'); ?>
            <div class="">
                <div class="form-group">
                    <label>Profil</label>
                    <div class="row">
                        <div class="col-sm-3">
                            <img src="<?= base_url('assets/img/profil/') . $tb_akun['profil']; ?>" class="img-thumbnail">
                        </div>
                        <div class="col-sm-9">
                            <div class="custom-file">
                                <input type="file" class="custom-file-input" id="profil" name="profil">
                                <label class="custom-file-label" for="profil">Cari foto</label>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="form-group">
                    <label>NIK</label>
                    <input type="text" class="form-control" id="nik" name="nik" value="<?= $tb_akun['nik']; ?>" readonly>
                </div>
                <div class="form-group">
                    <label>Nama</label>
                    <input type="text" class="form-control" id="nama" name="nama" value="<?= $tb_akun['nama']; ?>" readonly>
                </div>
                <div class="form-group">
                    <label>Email</label>
                    <input type="text" class="form-control" id="email" name="email" value="<?= $tb_akun['email']; ?>" readonly>
                </div>
                <div class="form-group">
                    <label>Jenis Kelamin</label>
                    <input type="text" class="form-control" id="jenis_kelamin" name="jenis_kelamin" value="<?= $tb_akun['jenis_kelamin']; ?>" readonly>
                </div>
                <div class="form-group">
                    <label>Username</label>
                    <input type="text" class="form-control" id="username" name="username" value="<?= $tb_akun['username']; ?>" readonly>
                </div>
                <div class="form-group">
                    <label>Password</label>
                    <?= form_error(
                        'password',
                        '<div class="alert alert-danger alert-dismissible fade show" role="alert">',
                        '<button type="button" class="close" data-dismiss="alert" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                    </button>
                    </div>'
                    ); ?>
                    <input type="password" class="form-control" id="password" name="password" value="<?= $tb_akun['password']; ?>">
                </div>
                <div class="form-group">
                    <label>Confirm Password</label>
                    <?= form_error(
                        'confirmpassword',
                        '<div class="alert alert-danger alert-dismissible fade show" role="alert">',
                        '<button type="button" class="close" data-dismiss="alert" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                    </button>
                    </div>'
                    ); ?>
                    <input type="password" class="form-control" id="confirmpassword" name="confirmpassword" value="<?= $tb_akun['password']; ?>">
                </div>
            </div>
        </div>
        <div class="card-footer">
            <a href="<?= base_url('Pengguna/Profil') ?>"><button type="button" class="btn btn-secondary float-left">Kembali</button></a>
            <button type="submit" class="btn btn-primary float-right">Simpan</button>
        </div>
        </form>
    </div>
</div>