<div class="container-fluid">
    <!-- DataTales Example -->
    <div class="card shadow mb-4">
        <div class="card-header py-3">
            <h6 class="m-0 font-weight-bold text-primary">Tambah Pengumuman</h6>
        </div>
        <div class="card-body">
            <?= $this->session->flashdata('message'); ?>
            <?= form_error(
                'judul_pengumuman',
                '<div class="alert alert-danger alert-dismissible fade show" role="alert">',
                '<button type="button" class="close" data-dismiss="alert" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                    </button>
                    </div>'
            ); ?>
            <?= form_error(
                'isi_pengumuman',
                '<div class="alert alert-danger alert-dismissible fade show" role="alert">',
                '<button type="button" class="close" data-dismiss="alert" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                    </button>
                    </div>'
            ); ?>
            <form method="post" action="<?= base_url('Admin/tambahpengumuman'); ?>">
                <div class="modal-body">
                    <div class="form-group">
                        <label for="judul_pengumuman">Judul Pengumuman</label>
                        <input type="text" class="form-control" id="judul_pengumuman" name="judul_pengumuman" placeholder="Masukkan Judul Pengumuman...">
                    </div>
                    <div class="form-group">
                        <label for="isi_pengumuman">Isi Pengumuman</label>
                        <textarea type="text" class="form-control" id="isi_pengumuman" name="isi_pengumuman" placeholder="Masukkan Isi Pengumuman..."></textarea>
                    </div>
                </div>
                <div class="modal-footer">
                    <a href="<?= base_url("Admin/Pengumuman"); ?>"><button type="button" class="btn btn-secondary">Kembali</button></a>
                    <button type="submit" class="btn btn-primary">Tambahkan</button>
                </div>
            </form>
        </div>
    </div>
</div>