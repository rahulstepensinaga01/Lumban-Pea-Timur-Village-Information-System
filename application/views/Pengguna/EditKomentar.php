<div class="container-fluid">
    <!-- DataTales Example -->
    <div class="card shadow mb-4">
        <div class="card-header py-3">
            <h6 class="m-0 font-weight-bold text-primary">Edit Pengumuman</h6>
        </div>
        <div class="card-body">
            <form method="post" action="<?= base_url('Pengguna/updatekomentar/'); ?>">
                <?= form_error(
                    'isi_komentar',
                    '<div class="alert alert-danger alert-dismissible fade show" role="alert">',
                    '<button type="button" class="close" data-dismiss="alert" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                    </button>
                    </div>'
                ); ?>
                <div class="modal-body">
                    <input type="text" class="form-control" id="id_komentar" name="id_komentar" value="<?= $ubahkomentar['id_komentar']; ?>" hidden>
                    <input type="number" class="form-control" id="nik" name="nik" value="<?= $ubahkomentar['nik']; ?>" hidden>
                    <input type="text" class="form-control" id="nama_komentar" name="nama_komentar" value="<?= $ubahkomentar['nama_komentar']; ?>" hidden>
                    <input type="number" class="form-control" id="id_pengumuman" name="id_pengumuman" value="<?= $ubahkomentar['id_pengumuman']; ?>" hidden>

                    <div class="form-group">
                        <label>Komentar</label>
                        <textarea type="text" class="form-control" id="isi_komentar" name="isi_komentar"><?= $ubahkomentar['isi_komentar']; ?></textarea>
                    </div>
                </div>

                <div class="modal-footer">
                    <a href="<?= base_url('Pengguna/DetailPengumuman/') . $ubahkomentar['id_pengumuman']; ?>"><button type="button" class="btn btn-secondary">Kembali</button></a>
                    <button type="submit" class="btn btn-primary">Simpan</button>
                </div>
            </form>
        </div>
    </div>
</div>