<!-- End of Topbar -->

<!-- Begin Page Content -->
<div class="container-fluid">

    <!-- DataTales Example -->
    <div class="card shadow mb-4">
        <div class="card-header py-3">
            <h6 class="m-0 font-weight-bold text-primary">Daftar Penduduk Desa</h6>
        </div>
        <div class="card-body">
            <div class="table-responsive">
                <table class="table table-bordered" id="dataTable" width="100%" cellspacing="0">
                    <thead>
                        <tr>
                            <th>Nik</th>
                            <th>Nama</th>
                            <th>Jenis Kelamin</th>
                            <th>Email</th>
                            <th>Aksi</th>
                        </tr>
                    </thead>
                    <tbody>
                        <?php foreach ($duduk as $Gota) : ?>
                            <tr>
                                <td>
                                    <?= $Gota['nik'] ?>
                                </td>
                                <td>
                                    <?= $Gota['nama'] ?>
                                </td>
                                <td>
                                    <?= $Gota['jenis_kelamin'] ?>
                                </td>
                                <td>
                                    <?= $Gota['email'] ?>
                                </td>
                                <td>
                                    <a href="<?= base_url('Pengguna/DetailPendudukDesa/') . $Gota['nik']; ?>" class="badge badge-primary">Detail</a>
                                </td>
                            </tr>
                        <?php endforeach; ?>
                    </tbody>
                </table>
            </div>
        </div>
    </div>

</div>