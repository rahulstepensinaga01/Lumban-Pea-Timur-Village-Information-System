<!-- End of Topbar -->

<!-- Begin Page Content -->
<div class="container-fluid">

    <!-- DataTales Example -->
    <div class="card shadow mb-4">
        <div class="card-header py-3">
            <h6 class="m-0 font-weight-bold text-primary">Daftar Akun</h6>
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
                        <?php foreach ($akun as $Gota) : ?>
                            <?php if ($Gota['id_role'] == 1) { ?>
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
                                        <a href="<?= base_url('Admin/DetailAkunAdmin/') . $Gota['nik']; ?>" class="badge badge-primary">Detail</a>
                                        <a href="<?= base_url('Admin/EditAkunAdmin/') . $Gota['nik']; ?>" class="badge badge-success">Edit</a>
                                        <a href="<?= base_url('Admin/HapusAkunAdmin/') . $Gota['nik']; ?>" class="badge badge-danger" onclick="return confirm('Yakin ingin menghapus Daftar Akun Admin?');">Hapus</a>
                                    </td>
                                </tr>
                            <?php } ?>
                        <?php endforeach; ?>
                    </tbody>
                </table>
            </div>
        </div>
    </div>

</div>