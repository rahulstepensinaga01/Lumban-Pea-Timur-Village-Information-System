<div class="container-fluid">
    <!-- DataTales Example -->
    <div class="card shadow mb-4">
        <div class="card-header py-3">
            <h6 class="m-0 font-weight-bold text-primary">Edit Akun Admin</h6>
        </div>
        <div class="card-body">
            <form method="post" action="<?= base_url('Admin/updateakunadmin'); ?>">
                <div class="modal-body">
                    <div class="form-group">
                        <label>NIK</label>
                        <input type="text" class="form-control" id="nik" name="nik" value="<?= $ubahakun['nik']; ?>">
                    </div>
                    <div class="form-group">
                        <label>Nama</label>
                        <input type="text" class="form-control" id="nama" name="nama" value="<?= $ubahakun['nama']; ?>">
                    </div>
                    <div class="form-group">
                        <label for="formGroupExampleInput">Pilih Jenis Kelamin</label>
                        <select name="jenis_kelamin" id="jenis_kelamin" class="form-control form-group">
                            <option>
                                <?= $ubahakun['jenis_kelamin']; ?>
                            </option>
                            <option>
                                Perempuan
                            </option>
                            <option>
                                Laki-laki
                            </option>
                        </select>
                    </div>
                    <div class="form-group">
                        <label>Email</label>
                        <input type="text" class="form-control" id="email" name="email" value="<?= $ubahakun['email']; ?>">
                    </div>
                    <div class="form-group">
                        <label>Username</label>
                        <input type="text" class="form-control" id="username" name="username" value="<?= $ubahakun['username']; ?>">
                    </div>
                    <div class="form-group">
                        <label>Password</label>
                        <input type="password" class="form-control" id="password" name="password" value="<?= $ubahakun['password']; ?>">
                    </div>
                    <div class="form-group">
                        <div class="form-check">
                            <div>
                                <input class="form-check-input" type="radio" id="id_role" name="id_role" value="1" checked>Admin!
                            </div>
                            <div>
                                <input class="form-check-input" type="radio" id="id_role" name="id_role" value="2">Jadikan Penduduk!
                            </div>
                        </div>
                    </div>
                </div>

                <div class="modal-footer">
                    <a href="<?= base_url('Admin/DaftarAkunAdmin'); ?>"><button type="button" class="btn btn-secondary float-left">Kembali</button></a>
                    <button type="submit" class="btn btn-primary">Simpan</button>
                </div>
            </form>
        </div>
    </div>
</div>