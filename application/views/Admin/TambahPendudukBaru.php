<div class="container-fluid">
    <!-- DataTales Example -->
    <div class="card shadow mb-4">
        <div class="card-header py-3">
            <h6 class="m-0 font-weight-bold text-primary">Tambah Penduduk Baru</h6>
        </div>
        <div class="card-body">
            <?= $this->session->flashdata('message'); ?>
            <form method="post" action="<?= base_url('admin/tambahpendudukbaru'); ?>">
                <div class="card-body">
                    <div class="form-group">
                        <?= form_error(
                            'nik',
                            '<div class="alert alert-danger alert-dismissible fade show" role="alert">',
                            '<button type="button" class="close" data-dismiss="alert" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                    </button>
                    </div>'
                        ); ?>
                        <label for="nik">NIK</label>
                        <input type="number" class="form-control" id="nik" name="nik" value="<?= set_value('nik') ?>" placeholder="Masukkan Nik...">
                    </div>
                    <div class="form-group">
                        <?= form_error(
                            'nama',
                            '<div class="alert alert-danger alert-dismissible fade show" role="alert">',
                            '<button type="button" class="close" data-dismiss="alert" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                    </button>
                    </div>'
                        ); ?>
                        <label for="nama">Nama</label>
                        <input type="text" class="form-control" id="nama" name="nama" value="<?= set_value('nama') ?>" placeholder="Masukkan Nama...">
                    </div>
                    <div class="form-group">
                        <?= form_error(
                            'jumlah_anggota_keluarga',
                            '<div class="alert alert-danger alert-dismissible fade show" role="alert">',
                            '<button type="button" class="close" data-dismiss="alert" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                    </button>
                    </div>'
                        ); ?>
                        <label for="jumlah_anggota_keluarga">Jumlah Anggota Keluarga</label>
                        <input type="number" class="form-control" id="jumlah_anggota_keluarga" name="jumlah_anggota_keluarga" value="<?= set_value('jumlah_anggota_keluarga') ?>" placeholder="Masukkan Jumlah Anggota Keluarga...">
                    </div>
                    <div class="form-group">
                        <?= form_error(
                            'tempat_lahir',
                            '<div class="alert alert-danger alert-dismissible fade show" role="alert">',
                            '<button type="button" class="close" data-dismiss="alert" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                    </button>
                    </div>'
                        ); ?>
                        <label for="tempat_lahir">Tempat Lahir</label>
                        <input type="text" class="form-control" id="tempat_lahir" name="tempat_lahir" value="<?= set_value('tempat_lahir') ?>" placeholder="Masukkan Tempat Lahir...">
                    </div>
                    <div class="form-group">
                        <?= form_error(
                            'tanggal_lahir',
                            '<div class="alert alert-danger alert-dismissible fade show" role="alert">',
                            '<button type="button" class="close" data-dismiss="alert" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                    </button>
                    </div>'
                        ); ?>
                        <label for="tanggal_lahir">Tanggal Lahir</label>
                        <input id="tanggal_lahir" name="tanggal_lahir" class="form-control" value="<?= set_value('tanggal_lahir') ?>" placeholder="Masukkan Tanggal Lahir...">
                    </div>
                    <div class="form-group">
                        <?= form_error(
                            'alamat',
                            '<div class="alert alert-danger alert-dismissible fade show" role="alert">',
                            '<button type="button" class="close" data-dismiss="alert" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                    </button>
                    </div>'
                        ); ?>
                        <label for="alamat">Alamat</label>
                        <input type="text" class="form-control" id="alamat" name="alamat" value="<?= set_value('alamat') ?>" placeholder="Masukkan Alamat...">
                    </div>
                    <div class="form-group">
                        <?= form_error(
                            'pekerjaan',
                            '<div class="alert alert-danger alert-dismissible fade show" role="alert">',
                            '<button type="button" class="close" data-dismiss="alert" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                    </button>
                    </div>'
                        ); ?>
                        <label for="pekerjaan">Pekerjaan</label>
                        <select name="pekerjaan" id="pekerjaan" class="form-control form-group">
                            <option>
                                Petani
                            </option>
                            <option>
                                Pegawai
                            </option>
                            <option>
                                Guru
                            </option>
                            <option>
                                Pelajar
                            </option>
                            <option>
                                Lainnya
                            </option>
                        </select>
                    </div>
                </div>
                <div class="card-footer">
                    <a href="<?= base_url("Admin/daftarpenduduk"); ?>"><button type="button" class="btn btn-secondary float-left">Kembali</button></a>
                    <button type="submit" class="btn btn-primary float-right">Tambahkan</button>
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