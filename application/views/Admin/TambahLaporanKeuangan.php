<div class="container-fluid">
    <!-- DataTales Example -->
    <div class="card shadow mb-4">
        <div class="card-header py-3">
            <h6 class="m-0 font-weight-bold text-primary">Tambah Laporan Keuangan</h6>
        </div>
        <div class="card-body">
            <?= $this->session->flashdata('message'); ?>
            <?= form_open_multipart('Admin/TambahLaporanKeuangan'); ?>
            <form action="" method=" post">
                <div class="modal-body">
                    <div class="form-group">
                        <label for="Nominal">Nominal</label>
                        <?= form_error(
                            'jumlah_keuangan',
                            '<div class="alert alert-danger alert-dismissible fade show" role="alert">',
                            '<button type="button" class="close" data-dismiss="alert" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                    </button>
                    </div>'
                        ); ?>
                        <input type="text" class="form-control" id="jumlah_keuangan" name="jumlah_keuangan" placeholder="Nominal...">
                    </div>
                    <div class="form-group">
                        <label for="Keterangan">Keterangan</label>
                        <?= form_error(
                            'keterangan',
                            '<div class="alert alert-danger alert-dismissible fade show" role="alert">',
                            '<button type="button" class="close" data-dismiss="alert" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                    </button>
                    </div>'
                        ); ?>
                        <div class="form-group">
                            <div class="form-check">
                                <div>
                                    <input class="form-check-input" type="radio" id="keterangan" name="keterangan" value="Pemasukan">Pemasukan
                                </div>
                                <div>
                                    <input class="form-check-input" type="radio" id="keterangan" name="keterangan" value="Pengeluaran">Pengeluaran
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="form-group">
                        <label for="Lampiran">Lampiran</label>
                        <?= form_error(
                            'lampiran',
                            '<div class="alert alert-danger alert-dismissible fade show" role="alert">',
                            '<button type="button" class="close" data-dismiss="alert" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                    </button>
                    </div>'
                        ); ?>
                        <div class="custom-file">
                            <input type="file" class="custom-file-input" id="lampiran" name="lampiran">
                            <label class="custom-file-label" for="lampiran">Masukkan Lampiran</label>
                        </div>
                    </div>
                </div>
                <div class="modal-footer">
                    <a href="<?= base_url("Admin/LaporanKeuangan"); ?>"><button type="button" class="btn btn-secondary">Kembali</button></a>
                    <button type="submit" class="btn btn-primary">Tambahkan</button>
                </div>
            </form>
            <?= form_close() ?>
        </div>
    </div>
</div>