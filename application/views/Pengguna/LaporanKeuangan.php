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

                <table class="table table-bordered" id="dataTable" width="100%" cellspacing="0">
                    <a class="btn btn-danger" href="<?= base_url('Pengguna/Cetak'); ?>"><i class="fa fa-print"></i> Cetak</a>
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
                                    <a href="<?= base_url('Pengguna/DetailLaporanKeuangan/') . $akas['id_keuangan']; ?>" class="badge badge-primary">Detail</a>
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