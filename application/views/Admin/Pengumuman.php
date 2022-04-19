<!-- End of Topbar -->

<!-- Begin Page Content -->
<div class="container-fluid">

    <!-- DataTales Example -->
    <div class="card shadow mb-4">
        <div class="card-header py-3">
            <h6 class="m-0 font-weight-bold text-primary"><?= $title; ?></h6>
        </div>
        <div class="card-body">
            <div class="table-responsive">
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
                <?= $this->session->flashdata('message'); ?>
                <div>
                    <a href="<?= base_url("Admin/TambahPengumuman") ?>" class="btn btn-primary">Tambahkan Pengumuman Baru</a>
                </div>
                <table class="table table-bordered" id="dataTable" width="100%" cellspacing="0">
                    <thead>
                        <tr>
                            <th>#</th>
                            <th>Judul Pengumuman</th>
                            <th>Isi Pengumuman</th>
                            <th>Waktu Pengumuman</th>
                            <th>Aksi</th>
                        </tr>
                    </thead>
                    <tbody>
                        <?php $loop = 1; ?>
                        <?php foreach ($pengumuman as $umum) : ?>
                            <tr>
                                <td scope="row">
                                    <?= $loop; ?>
                                </td>
                                <td>
                                    <?= $umum['judul_pengumuman'] ?>
                                </td>
                                <td>
                                    <?= $umum['isi_pengumuman'] ?>
                                </td>
                                <td>
                                    <?= $umum['waktu_pengumuman'] ?>
                                </td>
                                <td>
                                    <a href="<?= base_url('Admin/DetailPengumuman/') . $umum['id_pengumuman']; ?>" class="badge badge-primary">Detail</a>
                                    <a href="<?= base_url('Admin/editpengumuman/') . $umum['id_pengumuman']; ?>" class="badge badge-success">Edit</a>
                                    <a href="<?= base_url('Admin/hapuspengumuman/') . $umum['id_pengumuman']; ?>" class="badge badge-danger" onclick="return confirm('Yakin ingin menghapus Pengumuman?');">Hapus</a>
                                </td>
                            </tr>
                            <?php $loop++; ?>
                        <?php endforeach; ?>
                    </tbody>
                </table>
            </div>
        </div>
    </div>

</div>
<!-- /.container-fluid -->
<!-- Modal -->
<div class="modal fade" id="newpengumuman" tabindex="-1" role="dialog" aria-labelledby="newpengumumanLabel" aria-hidden="true">
    <div class="modal-dialog" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="newpengumumanLabel">Tambahkan Pengumuman Baru</h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <?= $this->session->flashdata('message'); ?>
            <form method="post" action="<?= base_url('admin/pengumuman'); ?>">
                <div class="modal-body">
                    <div class="form-group">
                        <label for="formGroupExampleInput">Judul Pengumuman</label>
                        <input type="text" class="form-control" id="judul_pengumuman" name="judul_pengumuman" placeholder="Masukkan Judul Pengumuman...">
                    </div>
                </div>
                <div class="modal-body">
                    <div class="form-group">
                        <label for="formGroupExampleInput">Isi Pengumuman</label>
                        <textarea type="text" class="form-control" id="isi_pengumuman" name="isi_pengumuman" placeholder="Masukkan Isi Pengumuman..."></textarea>
                    </div>
                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
                    <button type="submit" class="btn btn-primary">Tambahkan</button>
                </div>
            </form>
        </div>
    </div>
</div>