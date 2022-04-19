<div class="container-fluid">
    <!-- DataTales Example -->
    <div class="card shadow mb-4">
        <div class="card-header py-3">
            <h6 class="m-0 font-weight-bold text-primary">Edit Laporan Keuangan</h6>
        </div>
        <div class="card-body">
            <?= form_open_multipart('Admin/UpdateLaporanKeuangan'); ?>
            <form action="" method=" post">
                <input type="text" class="form-control" id="id_keuangan" name="id_keuangan" value="<?= $ubahpemasukan['id_keuangan']; ?>" hidden>
                <div class="modal-body">
                    <div class="form-group">
                        <label for="inputAddress2">Nominal</label>
                        <input type="text" class="form-control" id="jumlah_keuangan" name="jumlah_keuangan" value="<?= $ubahpemasukan['jumlah_keuangan']; ?>">
                    </div>
                    <div class="form-group">
                        <label for="formGroupExampleInput">Lampiran</label>
                        <div class="custom-file">
                            <input type="file" class="custom-file-input" id="lampiran" name="lampiran">
                            <label class="custom-file-label" for="lampiran">Masukkan Lampiran</label>
                        </div>
                    </div>
                </div>

                <div class="modal-footer">
                    <a href="<?= base_url('Admin/Keuangan'); ?>"><button type="button" class="btn btn-secondary">Kembali</button></a>
                    <button type="submit" class="btn btn-primary">Simpan</button>
                </div>
            </form>
            <?= form_close() ?>
        </div>
    </div>
</div>