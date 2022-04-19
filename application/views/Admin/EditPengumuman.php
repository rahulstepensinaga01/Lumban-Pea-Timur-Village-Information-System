<div class="container-fluid">
    <!-- DataTales Example -->
    <div class="card shadow mb-4">
        <div class="card-header py-3">
            <h6 class="m-0 font-weight-bold text-primary">Edit Pengumuman</h6>
        </div>
        <div class="card-body">
            <form method="post" action="<?= base_url('Admin/updatepengumuman/'); ?>">
                <div class="modal-body">
                    <input type="text" class="form-control" id="id_pengumuman" name="id_pengumuman" value="<?= $ubahpengumuman['id_pengumuman']; ?>" hidden>

                    <div class="form-group">
                        <label>Judul Pengumuman</label>
                        <input type="text" class="form-control" id="judul_pengumuman" name="judul_pengumuman" value="<?= $ubahpengumuman['judul_pengumuman']; ?>">
                    </div>
                    <div class="form-group">
                        <label>Isi Pengumuman</label>
                        <textarea type="text" class="form-control" id="isi_pengumuman" name="isi_pengumuman"><?= $ubahpengumuman['isi_pengumuman']; ?></textarea>
                    </div>
                </div>

                <div class="modal-footer">
                    <a href="<?= base_url('Admin/Pengumuman'); ?>"><button type="button" class="btn btn-secondary float-left">Kembali</button></a>
                    <button type="submit" class="btn btn-primary">Simpan</button>
                </div>
            </form>
        </div>
    </div>
</div>