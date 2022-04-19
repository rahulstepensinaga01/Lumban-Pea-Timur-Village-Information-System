<!-- End of Topbar -->

<!-- Begin Page Content -->
<div class="container-fluid">
    <!-- DataTales Example -->
    <div class="card shadow mb-4 text-center">
        <div class="card-header py-3">
            <small class="float-right"><?= $detailpengumuman['waktu_pengumuman']; ?></small>
            <h6 class="m-0 font-weight-bold text-primary float-left"><?= $detailpengumuman['judul_pengumuman']; ?></h6>
        </div>
        <div class="card-body">
            <div>
            </div>
            <div>
                <?= $detailpengumuman['isi_pengumuman']; ?>
            </div>
        </div>
        <div class="card-footer">
            <a href="<?= base_url('Admin/Pengumuman') ?>"><button type="button" class="btn btn-secondary float-left">Kembali</button></a>
        </div>
    </div>

    <form action="<?= base_url('admin/tambahkomentar'); ?>" method="POST">
        <div class="card shadow mb-4 text-center card-body">
            <?= form_error(
                'isi_komentar',
                '<div class="alert alert-danger alert-dismissible fade show" role="alert">',
                '<button type="button" class="close" data-dismiss="alert" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                    </button>
                    </div>'
            ); ?>
            <?= $this->session->flashdata('message'); ?>
            <input type="text" class="form-control" id="nama_komentar" name="nama_komentar" value="<?= $tb_akun['nama']; ?>" hidden>
            <input type="number" class="form-control" id="id_pengumuman" name="id_pengumuman" value="<?= $detailpengumuman['id_pengumuman']; ?>" hidden>
            <input type="number" class="form-control" id="nik" name="nik" value="<?= $tb_akun['nik']; ?>" hidden>
            <label>Tambahkan Komentar</label>
            <textarea class="form-control" id="isi_komentar" name="isi_komentar" placeholder="Masukkan Komentar anda..."></textarea>
            <button type="submit" class="btn btn-primary mt-3">Tambah Komentar</button>
            <div class="mt-3">
                <?php foreach ($komentar as $komen) : ?>
                    <?php if ($komen['id_pengumuman'] == $detailpengumuman['id_pengumuman']) { ?>

                        <?php if ($tb_akun['nik'] == $komen['nik']) { ?>
                            <div class="">
                                <small class="float-right"><?= $komen['waktu_komentar'] ?></small>
                                <small class="m-0 font-weight-bold text-primary float-left"><?= $komen['nama_komentar'] ?></small>
                            </div>
                            <div class="card-body">
                                <div class="mt-3">
                                    <div class="float-left">
                                        <?= $komen['isi_komentar'] ?>
                                    </div>
                                    <a href="<?= base_url('Admin/hapuskomentar/') . $komen['id_komentar'] ?>" class="badge badge-danger float-right" onclick="return confirm('Yakin ingin menghapus Komentar?');">Hapus</a>
                                    <a href="<?= base_url('Admin/editkomentar/') . $komen['id_komentar']; ?>" class="badge badge-success float-right mb-3 mr-3">Edit</a>
                                    <hr class="">
                                    </hr>
                                </div>
                            </div>
                        <?php } elseif ($tb_akun['nik'] != $komen['nik']) { ?>

                            <div class="">
                                <small class="float-right"><?= $komen['waktu_komentar'] ?></small>
                                <small class="m-0 font-weight-bold text-primary float-left"><?= $komen['nama_komentar'] ?></small>
                            </div>
                            <div class="card-body">
                                <div class="mt-3">
                                    <div class="float-left">
                                        <?= $komen['isi_komentar'] ?>
                                    </div>
                                    <a href="<?= base_url('Admin/hapuskomentar/') . $komen['id_komentar'] ?>" class="badge badge-danger float-right" onclick="return confirm('Yakin ingin menghapus Komentar?');">Hapus</a>
                                    <hr class="">
                                    </hr>
                                </div>
                            </div>
                        <?php } ?>
                    <?php } ?>
                <?php endforeach; ?>
            </div>
        </div>
    </form>
</div>