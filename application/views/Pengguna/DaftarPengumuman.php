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
                    'isi_komentar',
                    '<div class="alert alert-danger alert-dismissible fade show" role="alert">',
                    '<button type="button" class="close" data-dismiss="alert" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                    </button>
                    </div>'
                ); ?>
                <?= $this->session->flashdata('message'); ?>
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
                                    <a href="<?= base_url('Pengguna/DetailPengumuman/') . $umum['id_pengumuman']; ?>" class="badge badge-primary">Detail</a>
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