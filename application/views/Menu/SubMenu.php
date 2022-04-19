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
                    'nama_menu',
                    '<div class="alert alert-danger alert-dismissible fade show" role="alert">',
                    '<button type="button" class="close" data-dismiss="alert" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                    </button>
                    </div>'
                ); ?>
                <?= form_error(
                    'id_menu',
                    '<div class="alert alert-danger alert-dismissible fade show" role="alert">',
                    '<button type="button" class="close" data-dismiss="alert" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                    </button>
                    </div>'
                ); ?>
                <?= form_error(
                    'url',
                    '<div class="alert alert-danger alert-dismissible fade show" role="alert">',
                    '<button type="button" class="close" data-dismiss="alert" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                    </button>
                    </div>'
                ); ?>
                <?= form_error(
                    'icon',
                    '<div class="alert alert-danger alert-dismissible fade show" role="alert">',
                    '<button type="button" class="close" data-dismiss="alert" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                    </button>
                    </div>'
                ); ?>

                <?= $this->session->flashdata('message'); ?>
                <div>
                    <a href="" class="btn btn-primary" data-toggle="modal" data-target="#newsubmenu">Tambahkan subMenu Baru</a>
                </div>
                <table class="table table-bordered" id="dataTable" width="100%" cellspacing="0">
                    <thead>
                        <tr>
                            <th>#</th>
                            <th>SubMenu</th>
                            <th>Menu</th>
                            <th>URL</th>
                            <th>Icon</th>
                            <th>Is Active</th>
                            <th>Action</th>
                        </tr>
                    </thead>
                    <tbody>
                        <?php $loop = 1; ?>
                        <?php foreach ($submenu as $sm) : ?>
                            <tr>
                                <td scope="row">
                                    <?= $loop; ?>
                                </td>
                                <td>
                                    <?= $sm['nama_menu'] ?>
                                </td>
                                <td>
                                    <?= $sm['menu'] ?>
                                </td>
                                <td>
                                    <?= $sm['url'] ?>
                                </td>
                                <td>
                                    <?= $sm['icon'] ?>
                                </td>
                                <td>
                                    <?= $sm['is_active'] ?>
                                </td>
                                <td>
                                    <a href="<?= base_url('Menu/editsubmenu/') . $sm['id_submenu']; ?>" class="badge badge-success">Edit</a>
                                    <a href="<?= base_url('Menu/hapussubmenu/') . $sm['id_submenu']; ?>" class="badge badge-danger" onclick="return confirm('Yakin ingin menghapus submenu?');">Hapus</a>
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
<!-- New Modal -->
<div class="modal fade" id="newsubmenu" tabindex="-1" role="dialog" aria-labelledby="newsubmenuLabel" aria-hidden="true">
    <div class="modal-dialog" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="newsubmenuLabel">Tambahkan subMenu Baru</h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <form method="post" action="<?= base_url('Menu/submenu'); ?>">
                <div class="modal-body">
                    <div class="form-group">
                        <label>subMenu</label>
                        <input type="text" class="form-control" id="nama_menu" name="nama_menu" placeholder="Masukkan subMenu...">
                    </div>
                    <div class="form-group">
                        <label for="formGroupExampleInput">Pilih Menu</label>
                        <select name="id_menu" id="id_menu" class="form-control form-group">
                            <option>
                                Pilih Menu...
                            </option>
                            <?php foreach ($menu as $m) : ?>
                                <option value="<?= $m['id_menu']; ?>"><?= $m['menu']; ?></option>
                            <?php endforeach; ?>
                        </select>
                    </div>
                    <div class="form-group">
                        <label>Url</label>
                        <input type="text" class="form-control" id="url" name="url" placeholder="Masukkan url...">
                    </div>
                    <div class="form-group">
                        <label>Icon</label>
                        <input type="text" class="form-control" id="icon" name="icon" placeholder="Masukkan icon...">
                    </div>
                    <div class="form-group">
                        <div class="form-check">
                            <input class="form-check-input" type="checkbox" id="is_active" name="is_active" value="1" checked>
                            <label class="form-check-label" for="is_active">
                                Active?
                            </label>
                        </div>
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