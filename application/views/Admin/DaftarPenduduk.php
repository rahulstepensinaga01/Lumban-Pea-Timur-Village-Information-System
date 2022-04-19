<!-- End of Topbar -->

<!-- Begin Page Content -->
<div class="container-fluid">

    <!-- DataTales Example -->
    <div class="card shadow mb-4">
        <div class="card-header py-3">
            <h6 class="m-0 font-weight-bold text-primary">Daftar Penduduk </h6>
        </div>
        <div class="card-body">
            <div class="table-responsive">
                <?= form_error(
                    'nik',
                    '<div class="alert alert-danger alert-dismissible fade show" role="alert">',
                    '<button type="button" class="close" data-dismiss="alert" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                    </button>
                    </div>'
                ); ?>
                <?= form_error(
                    'nama',
                    '<div class="alert alert-danger alert-dismissible fade show" role="alert">',
                    '<button type="button" class="close" data-dismiss="alert" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                    </button>
                    </div>'
                ); ?>
                <?= form_error(
                    'jumlah_anggota_keluarga',
                    '<div class="alert alert-danger alert-dismissible fade show" role="alert">',
                    '<button type="button" class="close" data-dismiss="alert" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                    </button>
                    </div>'
                ); ?>
                <?= form_error(
                    'tempat_lahir',
                    '<div class="alert alert-danger alert-dismissible fade show" role="alert">',
                    '<button type="button" class="close" data-dismiss="alert" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                    </button>
                    </div>'
                ); ?>
                <?= form_error(
                    'tanggal_lahir',
                    '<div class="alert alert-danger alert-dismissible fade show" role="alert">',
                    '<button type="button" class="close" data-dismiss="alert" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                    </button>
                    </div>'
                ); ?>
                <?= form_error(
                    'alamat',
                    '<div class="alert alert-danger alert-dismissible fade show" role="alert">',
                    '<button type="button" class="close" data-dismiss="alert" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                    </button>
                    </div>'
                ); ?>
                <?= form_error(
                    'pekerjaan',
                    '<div class="alert alert-danger alert-dismissible fade show" role="alert">',
                    '<button type="button" class="close" data-dismiss="alert" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                    </button>
                    </div>'
                ); ?>
                <?= $this->session->flashdata('message'); ?>
                <div>
                    <a href="<?= base_url("Admin/tambahpendudukbaru") ?>" class="btn btn-primary">Tambahkan Penduduk Baru</a>
                </div>
                <table class="table table-bordered" id="dataTable" width="100%" cellspacing="0">
                    <thead>
                        <tr>
                            <th>Nik</th>
                            <th>Nama</th>
                            <th>Jumlah Anggota Keluarga</th>
                            <th>Tempat Lahir</th>
                            <th>Tanggal Lahir</th>
                            <th>Alamat</th>
                            <th>Pekerjaan</th>
                            <th>Aksi</th>
                        </tr>
                    </thead>
                    <tbody>
                        <?php foreach ($penduduk_baru as $duduk) : ?>
                            <tr>
                                <td>
                                    <?= $duduk['nik'] ?>
                                </td>
                                <td>
                                    <?= $duduk['nama'] ?>
                                </td>
                                <td>
                                    <?= $duduk['jumlah_anggota_keluarga'] ?>
                                </td>
                                <td>
                                    <?= $duduk['tempat_lahir'] ?>
                                </td>
                                <td>
                                    <?= $duduk['tanggal_lahir'] ?>
                                </td>
                                <td>
                                    <?= $duduk['alamat'] ?>
                                </td>
                                <td>
                                    <?= $duduk['pekerjaan'] ?>
                                </td>
                                <td>
                                    <a href="<?= base_url('Admin/DetailPendudukBaru/') . $duduk['nik']; ?>" class="badge badge-primary">Detail</a>
                                    <a href="<?= base_url('Admin/EditPendudukBaru/') . $duduk['nik']; ?>" class="badge badge-success ">Edit</a>
                                    <a href="<?= base_url('Admin/hapuspendudukbaru/') . $duduk['nik'] ?>" class="badge badge-danger" onclick="return confirm('Yakin ingin menghapus Daftar Penduduk?');">Hapus</a>
                                </td>
                            </tr>
                        <?php endforeach; ?>
                    </tbody>
                </table>
            </div>
        </div>
    </div>

</div>

<!-- Modal New Penduduk Baru -->
<div class="modal fade" id="newpendudukbaru" tabindex="-1" role="dialog" aria-labelledby="newpendudukbaruLabel" aria-hidden="true">
    <div class="modal-dialog" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="newpendudukbaruLabel">Tambahkan Penduduk Baru</h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <form method="post" action="<?= base_url('admin/daftarpenduduk'); ?>">
                <div class="modal-body">
                    <div class="form-group">
                        <label for="formGroupExampleInput">NIK</label>
                        <input type="number" class="form-control" id="nik" name="nik" placeholder="Masukkan Nik...">
                    </div>
                    <div class="form-group">
                        <label for="formGroupExampleInput">Nama</label>
                        <input type="text" class="form-control" id="nama" name="nama" placeholder="Masukkan Nama...">
                    </div>
                    <div class="form-group">
                        <label for="formGroupExampleInput">Jumlah Anggota Keluarga</label>
                        <input type="number" class="form-control" id="jumlah_anggota_keluarga" name="jumlah_anggota_keluarga" placeholder="Masukkan Jumlah Anggota Keluarga...">
                    </div>
                    <div class="form-group">
                        <label for="formGroupExampleInput">Tempat Lahir</label>
                        <input type="text" class="form-control" id="tempat_lahir" name="tempat_lahir" placeholder="Masukkan Tempat Lahir...">
                    </div>
                    <div class="form-group">
                        <label for="formGroupExampleInput">Tanggal Lahir</label>
                        <input id="tanggal_lahir" name="tanggal_lahir" class="form-control">
                    </div>
                    <div class="form-group">
                        <label for="formGroupExampleInput">Alamat</label>
                        <input type="text" class="form-control" id="alamat" name="alamat" placeholder="Masukkan Alamat...">
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

<script>
    $('#tanggal_lahir').datepicker({
        uiLibrary: 'bootstrap4'
    });
</script>