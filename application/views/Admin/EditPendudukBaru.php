<div class="container-fluid">
    <!-- DataTales Example -->
    <div class="card shadow mb-4">
        <div class="card-header py-3">
            <h6 class="m-0 font-weight-bold text-primary">Edit Penduduk Baru</h6>
        </div>
        <div class="card-body">
            <form method="post" action="<?= base_url('admin/updatependudukbaru'); ?>">
                <div class="modal-body">
                    <div class="form-group">
                        <label for="formGroupExampleInput">NIK</label>
                        <input type="number" class="form-control" id="nik" name="nik" value="<?= $ubahpendudukbaru['nik']; ?>">
                    </div>
                    <div class="form-group">
                        <label for="formGroupExampleInput">Nama</label>
                        <input type="text" class="form-control" id="nama" name="nama" value="<?= $ubahpendudukbaru['nama']; ?>">
                    </div>
                    <div class="form-group">
                        <label for="formGroupExampleInput">Jumlah Anggota Keluarga</label>
                        <input type="number" class="form-control" id="jumlah_anggota_keluarga" name="jumlah_anggota_keluarga" value="<?= $ubahpendudukbaru['jumlah_anggota_keluarga']; ?>">
                    </div>
                    <div class="form-group">
                        <label for="formGroupExampleInput">Tempat Lahir</label>
                        <input type="text" class="form-control" id="tempat_lahir" name="tempat_lahir" value="<?= $ubahpendudukbaru['tempat_lahir']; ?>">
                    </div>
                    <div class="form-group">
                        <label for="formGroupExampleInput">Tanggal Lahir</label>
                        <input id="tanggal_lahir" name="tanggal_lahir" class="form-control" value="<?= $ubahpendudukbaru['tanggal_lahir']; ?>">
                    </div>
                    <div class="form-group">
                        <label for="formGroupExampleInput">Alamat</label>
                        <input type="text" class="form-control" id="alamat" name="alamat" value="<?= $ubahpendudukbaru['alamat']; ?>">
                    </div>
                    <div class="form-group">
                        <label for="formGroupExampleInput">Pekerjaan</label>
                        <select name="pekerjaan" id="pekerjaan" class="form-control form-group">
                            <option>
                                <?= $ubahpendudukbaru['pekerjaan']; ?>
                            </option>
                            <option>
                                Petani
                            </option>
                            <option>
                                Pegawai
                            </option>
                            <option>
                                Guru
                            </option>
                            <option>
                                Pelajar
                            </option>
                            <option>
                                Lainnya
                            </option>
                        </select>
                    </div>
                </div>
                <div class="modal-footer">
                    <a href="<?= base_url('Admin/DaftarPenduduk') ?>"><button type="button" class="btn btn-secondary float-left">Kembali</button></a>
                    <button type="submit" class="btn btn-primary">Simpan</button>
                </div>
            </form>
        </div>
    </div>
</div>

<script>
    $('#tanggal_lahir').datepicker({
        uiLibrary: 'bootstrap4'
    });
</script>