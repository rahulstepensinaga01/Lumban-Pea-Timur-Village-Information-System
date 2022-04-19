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
            <div class="card shadow mb-4 text-center mt-5">
                <div class="card-header py-3">
                    <small class="float-right"><?= $detailpengumuman['waktu_pengumuman']; ?></small>
                    <h6 class="m-0 font-weight-bold text-primary float-left"><?= $detailpengumuman['judul_pengumuman']; ?></h6>
                </div>
                <div class="card-body">
                    <div>
                        <?= $detailpengumuman['isi_pengumuman']; ?>
                    </div>
                </div>
                <div class="card-footer">
                    <a href="<?= base_url('Pengunjung') ?>"><button type="button" class="btn btn-secondary float-left">Kembali</button></a>
                </div>
            </div>
        </div>
    </div>
</div>