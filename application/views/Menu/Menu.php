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
                    'menu',
                    '<div class="alert alert-danger alert-dismissible fade show" role="alert">',
                    '<button type="button" class="close" data-dismiss="alert" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                    </button>
                    </div>'
                ); ?>
                <?= $this->session->flashdata('message'); ?>
                <div>
                    <a href="" class="btn btn-primary" data-toggle="modal" data-target="#newMenu">Tambahkan Menu Baru</a>
                </div>
                <table class="table table-bordered" id="dataTable" width="100%" cellspacing="0">
                    <thead>
                        <tr>
                            <th>#</th>
                            <th>Menu</th>
                            <th>Action</th>
                        </tr>
                    </thead>
                    <tbody>
                        <?php $loop = 1; ?>
                        <?php foreach ($menu as $m) : ?>
                            <tr>
                                <td scope="row">
                                    <?= $loop; ?>
                                </td>
                                <td>
                                    <?= $m['menu'] ?>
                                </td>
                                <td>
                                    <a href="" class="badge badge-success " data-toggle="modal" data-target="#editMenu">Edit</a>
                                    <a href="<?= base_url('Menu/hapusmenu/') . $m['id_menu'] ?>" class="badge badge-danger" onclick="return confirm('Yakin ingin menghapus menu?');">Hapus</a>
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
<!-- Modal New Menu -->
<div class="modal fade" id="newMenu" tabindex="-1" role="dialog" aria-labelledby="newMenuLabel" aria-hidden="true">
    <div class="modal-dialog" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="newMenuLabel">Tambahkan Menu Baru</h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <form method="post" action="<?= base_url('Menu'); ?>">
                <div class="modal-body">
                    <div class="form-group">
                        <label for="formGroupExampleInput">Menu</label>
                        <input type="text" class="form-control" id="menu" name="menu" placeholder="Masukkan Menu...">
                    </div>
                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-secondary" data-dismiss="modal">Tutup</button>
                    <button type="submit" class="btn btn-primary">Tambahkan</button>
                </div>
            </form>
        </div>
    </div>
</div>
<!-- Modal Edit Menu -->
<div class="modal fade" id="editMenu" tabindex="-1" role="dialog" aria-labelledby="editMenuLabel" aria-hidden="true">
    <div class="modal-dialog" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="editMenuLabel">Edit Menu Baru</h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <form method="post" action="<?= base_url('Menu/editMenu/') . $m['id_menu']; ?>">
                <div class="modal-body">
                    <div class="form-group">
                        <label for="formGroupExampleInput">Menu</label>
                        <input type="text" class="form-control" id="menu" name="menu" value="<?= $m['menu']; ?>">
                    </div>
                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-secondary" data-dismiss="modal">Tutup</button>
                    <button type="submit" class="btn btn-primary">Simpan</button>
                </div>
            </form>
        </div>
    </div>
</div>