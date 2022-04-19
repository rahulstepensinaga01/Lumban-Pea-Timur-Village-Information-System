<div class="container-fluid">
    <div class="card shadow mb-4">
        <div class="card-header py-3">
            <h6 class="m-0 font-weight-bold text-primary"><?= $title; ?></h6>
        </div>
        <div class="card-body">
            <div class="table-responsive">
                <?= form_error(
                    'jenis_transaksi',
                    '<div class="alert alert-danger alert-dismissible fade show" role="alert">',
                    '<button type="button" class="close" data-dismiss="alert" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                    </button>
                    </div>'
                ); ?>
                <?= form_error(
                    'keterangan',
                    '<div class="alert alert-danger alert-dismissible fade show" role="alert">',
                    '<button type="button" class="close" data-dismiss="alert" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                    </button>
                    </div>'
                ); ?>
                <?= $this->session->flashdata('message'); ?>
                <div>
                    <a href="<?= base_url('Admin/TambahLaporanKeuangan') ?>" class="btn btn-primary">Tambahkan Laporan Keuangan</a>

                    <a class="btn btn-danger" href="<?= base_url('Admin/Cetak'); ?>"><i class="fa fa-print"></i> Cetak</a>
                </div>
                <table class="table table-bordered" id="dataTable" width="100%" cellspacing="0">
                    <thead>
                        <tr>
                            <th>#</th>
                            <th>Tanggal Laporan Keuangan</th>
                            <th>Jumlah Keuangan</th>
                            <th>Keterangan</th>
                            <th>Lampiran</th>
                            <th>Aksi</th>
                        </tr>
                    </thead>
                    <tbody>
                        <?php $loop = 1; ?>
                        <?php foreach ($kas as $akas) : ?>
                            <tr>
                                <td scope="row">
                                    <?= $loop; ?>
                                </td>
                                <td>
                                    <?= $akas['tanggal_laporan_keuangan'] ?>
                                </td>
                                <td>
                                    <?= $akas['jumlah_keuangan'] ?>
                                </td>
                                <td>
                                    <?= $akas['keterangan'] ?>
                                </td>
                                <td>
                                    <?= $akas['lampiran'] ?>
                                </td>

                                <td>
                                    <a href="<?= base_url('Admin/DetailLaporanKeuangan/') . $akas['id_keuangan']; ?>" class="badge badge-primary">Detail</a>
                                    <a href="<?= base_url('Admin/EditLaporanKeuangan/') . $akas['id_keuangan']; ?>" class="badge badge-success">Edit</a>
                                    <a href="<?= base_url('Admin/HapusLaporanKeuangan/') . $akas['id_keuangan']; ?>" class="badge badge-danger" onclick="return confirm('Yakin ingin menghapus Laporan Keuangan?');">Hapus</a>
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