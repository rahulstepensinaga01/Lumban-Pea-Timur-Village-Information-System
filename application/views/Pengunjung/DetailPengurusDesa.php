<div id="content-wrapper" class="d-flex flex-column">

    <!-- Main Content -->
    <div id="content">
        <div class="container-fluid">
            <div class="mt-3">
                <div class="row justify-content-center">
                    <h1 class="text-primary ml-3">Sistem Informasi Desa Lumban Pea
                    </h1>
                    <i class="fas fa-laugh-wink rotate-n-15 text-primary"></i>
                </div>
            </div>
            <!-- DataTales Example -->
            <div class="card shadow mb-4 mt-5">
                <div class="card-header py-3">
                    <h6 class="m-0 font-weight-bold text-primary">Detail Pengurus Desa</h6>
                </div>
                <div class="card-body">
                    <div class="form-group row">
                        <label class="col-sm-3 col-form-label">Nama</label>
                        <div class="col-sm-9 mt-2">
                            : <?= $detailpendudukbaru['nama']; ?>
                        </div>
                    </div>
                    <div class="form-group row">
                        <label class="col-sm-3 col-form-label">Jumlah Anggota Keluarga</label>
                        <div class="col-sm-9 mt-2">
                            : <?= $detailpendudukbaru['jumlah_anggota_keluarga']; ?>
                        </div>
                    </div>
                    <div class="form-group row">
                        <label class="col-sm-3 col-form-label">Tempat Lahir</label>
                        <div class="col-sm-9 mt-2">
                            : <?= $detailpendudukbaru['tempat_lahir']; ?>
                        </div>
                    </div>
                    <div class="form-group row">
                        <label class="col-sm-3 col-form-label">Tanggal Lahir</label>
                        <div class="col-sm-9 mt-2">
                            : <?= $detailpendudukbaru['tanggal_lahir']; ?>
                        </div>
                    </div>
                    <div class="form-group row">
                        <label class="col-sm-3 col-form-label">Alamat</label>
                        <div class="col-sm-9 mt-2">
                            : <?= $detailpendudukbaru['alamat']; ?>
                        </div>
                    </div>
                    <div class="form-group row">
                        <label class="col-sm-3 col-form-label">Pekerjaan</label>
                        <div class="col-sm-9 mt-2">
                            : <?= $detailpendudukbaru['pekerjaan']; ?>
                        </div>
                    </div>
                </div>
                <div class="card-footer">
                    <a href="<?= base_url('Pengunjung') ?>"><button type="button" class="btn btn-secondary float-left">Kembali</button></a>
                </div>
            </div>

        </div>
    </div>
</div>