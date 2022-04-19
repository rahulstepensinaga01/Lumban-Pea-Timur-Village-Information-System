<!-- End of Topbar -->

<!-- Begin Page Content -->
<div class="container-fluid">

    <!-- DataTales Example -->
    <div class="card shadow mb-4">
        <div class="card-header py-3">
            <h6 class="m-0 font-weight-bold text-primary">Detail Laporan Keuangan</h6>
        </div>
        <div class="card-body">
            <div class="form-group row">
                <label class="col-sm-3 col-form-label">Tanggal Pemasukan</label>
                <div class="col-sm-9 mt-2">
                    : <?= $detailpemasukan['tanggal_laporan_keuangan']; ?>
                </div>
            </div>
            <div class="form-group row">
                <label class="col-sm-3 col-form-label">Dana Yang Masuk</label>
                <div class="col-sm-9 mt-2">
                    : <?= $detailpemasukan['jumlah_keuangan']; ?>
                </div>
            </div>
            <div class="form-group row">
                <label class="col-sm-3 col-form-label">Lampiran</label>
                <div class="col-sm-9 mt-2">
                    : <?= $detailpemasukan['lampiran']; ?>
                    <a href="<?= base_url(); ?>Admin/download/<?= $detailpemasukan['id_keuangan']; ?>" class="badge badge-primary bg-info float-right"><i class="fas fa-download"></i></a>
                </div>
            </div>
        </div>
        <div class="card-footer">
            <a href="<?= base_url('Admin/Keuangan') ?>"><button type="button" class="btn btn-secondary float-left">Kembali</button></a>
        </div>
    </div>

</div>