<!-- End of Topbar -->

<!-- Begin Page Content -->
<div class="container-fluid">

    <!-- DataTales Example -->
    <div class="card shadow mb-4">
        <div class="card-header py-3">
            <h6 class="m-0 font-weight-bold text-primary">Detail Akun Baru</h6>
        </div>
        <div class="card-body">
            <div class="form-group row">
                <label class="col-sm-3 col-form-label">NIK</label>
                <div class="col-sm-9 mt-2">
                    : <?= $detailakun['nik']; ?>
                </div>
            </div>
            <div class="form-group row">
                <label class="col-sm-3 col-form-label">Nama</label>
                <div class="col-sm-9 mt-2">
                    : <?= $detailakun['nama']; ?>
                </div>
            </div>
            <div class="form-group row">
                <label class="col-sm-3 col-form-label">Jenis Kelamin</label>
                <div class="col-sm-9 mt-2">
                    : <?= $detailakun['jenis_kelamin']; ?>
                </div>
            </div>
            <div class="form-group row">
                <label class="col-sm-3 col-form-label">Email</label>
                <div class="col-sm-9 mt-2">
                    : <?= $detailakun['email']; ?>
                </div>
            </div>
        </div>
        <div class="card-footer">
            <a href="<?= base_url('Admin/DaftarAkun') ?>"><button type="button" class="btn btn-secondary float-left">Kembali</button></a>
        </div>
    </div>

</div>