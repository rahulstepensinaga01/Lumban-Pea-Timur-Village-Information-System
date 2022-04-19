<div id="content-wrapper" class="d-flex flex-column">

    <!-- Main Content -->
    <div id="content">
        <!-- Begin Page Content -->
        <div class="container-fluid">

            <div class="mt-3">
                <div class="row justify-content-center">
                    <h1 class="text-primary ml-3">Sistem Informasi Desa Lumban Pea
                    </h1>
                    <i class="fas fa-laugh-wink rotate-n-15 text-primary"></i>
                </div>
            </div>

            <div class="card shadow mb-4 mt-5">
                <div class="card-header py-3">
                    <h6 class="m-0 font-weight-bold text-primary">Sejarah</h6>
                </div>
                <div class="card-body">
                    <div class="media">
                        <img class="mr-3 img-thumbnail" src="<?= base_url('assets/img/beranda/Kantor Desa.jpg') ?>" alt="Generic placeholder image">
                        <div class="media-body">
                            <h5 class="mt-0">Lumban Pea, Balige, Toba</h5>
                            Lumban Pea adalah salah satu desa di Kecamatan Balige, Kabupaten Toba, Provinsi Sumatra Utara, Indonesia. Kepala Desa Lumban Pea saat ini adalah Faber Tambunan.
                            <p></p>
                            <h5 class="mt-0">Suku</h5>
                            Mayoritas penduduk Desa Lumban Pea adalah suku Toba.
                            <p></p>
                            <h5 class="mt-0">Agama</h5>
                            Mayoritas penduduk Desa Lumban Pea memeluk agama Kristen. Di Desa Lumban Pea juga terdapat sarana ibadah yaitu tiga bangunan Gereja dan satu Masjid.
                        </div>
                    </div>
                </div>
            </div>

            <div class="card shadow mb-4 mt-5">
                <div class="card-header py-3">
                    <h6 class="m-0 font-weight-bold text-primary">Daftar Pengumuman</h6>
                </div>
                <div class="card-body">
                    <div class="table-responsive">
                        <table class="table table-bordered" id="pengumuman" width="100%" cellspacing="0">
                            <thead>
                                <tr>
                                    <th>#</th>
                                    <th>Judul Pengumuman</th>
                                    <th>Isi Pengumuman</th>
                                    <th>Waktu Pengumuman</th>
                                    <th>Aksi</th>
                                </tr>
                            </thead>
                            <tbody>
                                <?php $loop = 1; ?>
                                <?php foreach ($pengumuman as $umum) : ?>
                                    <tr>
                                        <td scope="row">
                                            <?= $loop; ?>
                                        </td>
                                        <td>
                                            <?= $umum['judul_pengumuman'] ?>
                                        </td>
                                        <td>
                                            <?= $umum['isi_pengumuman'] ?>
                                        </td>
                                        <td>
                                            <?= $umum['waktu_pengumuman'] ?>
                                        </td>
                                        <td>
                                            <a href="<?= base_url('Pengunjung/DetailPengumuman/') . $umum['id_pengumuman']; ?>" class="badge badge-primary">Detail</a>
                                        </td>
                                    </tr>
                                    <?php $loop++; ?>
                                <?php endforeach; ?>
                            </tbody>
                        </table>
                    </div>
                </div>
            </div>

            <div class="card shadow mb-4">
                <div class="card-header py-3">
                    <h6 class="m-0 font-weight-bold text-primary">Daftar Pengurus Desa</h6>
                </div>
                <div class="card-body">
                    <div class="table-responsive">
                        <table class="table table-bordered" id="kepengurusan" width="100%" cellspacing="0">
                            <thead>
                                <tr>
                                    <th>#</th>
                                    <th>Nama</th>
                                    <th>Jenis Kelamin</th>
                                    <th>Aksi</th>
                                </tr>
                            </thead>
                            <tbody>
                                <?php $loop = 1; ?>
                                <?php foreach ($admin as $Gota) : ?>
                                    <tr>
                                        <td scope="row">
                                            <?= $loop; ?>
                                        </td>
                                        <td>
                                            <?= $Gota['nama'] ?>
                                        </td>
                                        <td>
                                            <?= $Gota['jenis_kelamin'] ?>
                                        </td>
                                        <td>
                                            <a href="<?= base_url('Pengunjung/DetailPengurusDesa/') . $Gota['nik']; ?>" class="badge badge-primary">Detail</a>
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
    </div>
</div>

<script>
    $(document).ready(function() {
        $('#pengumuman').DataTable();
    });
</script>
<script>
    $(document).ready(function() {
        $('#kepengurusan').DataTable();
    });
</script>