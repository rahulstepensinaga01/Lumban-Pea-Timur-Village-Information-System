<div class="container-fluid">
    <!-- DataTales Example -->
    <div class="card shadow mb-4">
        <div class="card-header py-3">
            <h6 class="m-0 font-weight-bold text-primary">Edit Data Pribadi</h6>
        </div>
        <div class="card-body">
            <?= form_open_multipart('Pengguna/EditDataPribadi'); ?>
            <div class="">
                <div class="form-group">
                    <label>NIK</label>
                    <input type="text" class="form-control" id="nik" name="nik" value="<?= $tb_penduduk['nik']; ?>" readonly>
                </div>
                <div class="form-group">
                    <label>Nama</label>
                    <input type="text" class="form-control" id="nama" name="nama" value="<?= $tb_penduduk['nama']; ?>" readonly>
                </div>
                <div class="form-group">
                    <label>Jumlah Anggota Keluarga</label>
                    <input type="number" class="form-control" id="jumlah_anggota_keluarga" name="jumlah_anggota_keluarga" value="<?= $tb_penduduk['jumlah_anggota_keluarga']; ?>">
                </div>
                <div class="form-group">
                    <label>Tempat Lahir</label>
                    <input type="text" class="form-control" id="tempat_lahir" name="tempat_lahir" value="<?= $tb_penduduk['tempat_lahir']; ?>" readonly>
                </div>
                <div class="form-group">
                    <label>Tanggal Lahir</label>
                    <input type="text" class="form-control" id="tanggal_lahir" name="tanggal_lahir" value="<?= $tb_penduduk['tanggal_lahir']; ?>" readonly>
                </div>
                <div class="form-group">
                    <label>Alamat</label>
                    <input type="text" class="form-control" id="alamat" name="alamat" value="<?= $tb_penduduk['alamat']; ?>">
                </div>
                <div class="form-group">
                    <label>Pekerjaan</label>
                    <select name="pekerjaan" id="pekerjaan" class="form-control form-group">
                        <option>
                            <?= $tb_penduduk['pekerjaan']; ?>
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
        </div>
        <div class="card-footer">
            <a href="<?= base_url('Pengguna/Profil') ?>"><button type="button" class="btn btn-secondary float-left">Kembali</button></a>
            <button type="submit" class="btn btn-primary float-right">Simpan</button>
        </div>
        </form>
    </div>
</div>