<!DOCTYPE html>
<html>

<head>
    <title></title>
</head>

<body>
    <table class="table table-bordered" id="dataTable" width="100%" cellspacing="0">
        <tr>
            <th>#</th>
            <th>Tanggal Laporan Keuangan</th>
            <th>Nominal</th>
            <th>Keterangan</th>
        </tr>
        <?php $loop = 1; ?>
        <?php foreach ($kas as $uang) : ?>
            <tr>
                <td scope="row">
                    <?= $loop; ?>
                </td>
                <td>
                    <?= $uang['tanggal_laporan_keuangan'] ?>
                </td>
                <td>
                    <?= $uang['jumlah_keuangan'] ?>
                </td>
                <td>
                    <?= $uang['keterangan'] ?>
                </td>
            </tr>
            <?php $loop++; ?>
        <?php endforeach; ?>
        <tr>

        </tr>
    </table>

    <script type="text/javascript">
        window.print();
    </script>

</body>

</html>


<!-- 

<div class="container-fluid">

    <div class="card shadow mb-4">
        <div class="card-header py-3">
            <h6 class="m-0 font-weight-bold text-primary"><?= $title; ?></h6>
        </div>
        <div class="card-body">
            <div class="table-responsive">
                <table class="table table-bordered" id="dataTable" width="100%" cellspacing="0">
                    <thead>
                        <tr>
                            <th>#</th>
                            <th>id_keuangan</th>
                            <th>Tanggal Laporan Keuangan</th>
                            <th>Nominal</th>
                            <th>Keterangan</th>

                        </tr>
                    </thead>
                    <tbody>
                        <?php $loop = 1; ?>
                        <?php foreach ($kas as $uang) : ?>
                            <tr>
                                <td scope="row">
                                    <?= $loop; ?>
                                </td>
                                <td>
                                    <?= $uang['id_keuangan'] ?>
                                </td>
                                <td>
                                    <?= $uang['tanggal_laporan_keuangan'] ?>
                                </td>
                                <td>
                                    <?= $uang['jumlah_keuangan'] ?>
                                </td>
                                <td>
                                    <?= $uang['keterangan'] ?>
                                </td>
                            </tr>
                            <?php $loop++; ?>
                        <?php endforeach; ?>
                    </tbody>
                </table>

                <script>
                    window.print();
                </script>
            </div>
        </div>
    </div>

</div> -->