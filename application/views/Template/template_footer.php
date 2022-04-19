<!-- Bootstrap core JavaScript-->
<script src="<?= base_url('assets/') ?>vendor/jquery/jquery.min.js"></script>
<script src="<?= base_url('assets/') ?>vendor/bootstrap/js/bootstrap.bundle.min.js"></script>
<script src="https://code.jquery.com/jquery-3.3.1.min.js"></script>
<!-- Core plugin JavaScript-->
<script src="<?= base_url('assets/') ?>vendor/jquery-easing/jquery.easing.min.js"></script>

<!-- Custom scripts for all pages-->
<script src="<?= base_url('assets/') ?>js/sb-admin-2.min.js"></script>
<script src="<?= base_url('assets/'); ?>vendor/chart.js/Chart.min.js"></script>
<script src="<?= base_url('assets/'); ?>js/demo/chart-area-demo.js"></script>
<script src="<?= base_url('assets/'); ?>js/demo/chart-pie-demo.js"></script>

<!-- Page level plugins -->
<script src="<?= base_url('assets/') ?>vendor/datatables/jquery.dataTables.min.js"></script>
<script src="<?= base_url('assets/') ?>vendor/datatables/dataTables.bootstrap4.min.js"></script>
<script src="https://unpkg.com/gijgo@1.9.13/js/gijgo.min.js" type="text/javascript"></script>
<!-- Page level custom scripts -->
<script src="<?= base_url('assets/') ?>js/demo/datatables-demo.js"></script>


<script>
    var ctx = document.getElementById("myPieChart");
    var myPieChart = new Chart(ctx, {
        type: 'doughnut',
        data: {
            labels: ["laki Laki", "Perempuan"],
            datasets: [{
                data: [<?= $this->db->query("Select nik From tb_akun WHERE jenis_kelamin='Laki-laki'")->num_rows(); ?>, <?= $this->db->query("Select nik From tb_akun WHERE jenis_kelamin='Perempuan'")->num_rows(); ?>, 0],
                backgroundColor: ['#4e73df', '#1cc88a', '#36b9cc'],
                hoverBackgroundColor: ['#2e59d9', '#17a673', '#2c9faf'],
                hoverBorderColor: "rgba(234, 236, 244, 1)",
            }],
        },
        options: {
            maintainAspectRatio: false,
            tooltips: {
                backgroundColor: "rgb(255,255,255)",
                bodyFontColor: "#858796",
                borderColor: '#dddfeb',
                borderWidth: 1,
                xPadding: 15,
                yPadding: 15,
                displayColors: false,
                caretPadding: 10,
            },
            legend: {
                display: false
            },
            cutoutPercentage: 80,
        },
    });
</script>

<script>
    var ctx = document.getElementById("myAreaChart");
    var myLineChart = new Chart(ctx, {
        type: 'line',
        data: {
            labels: ["Petani", "Pegawai", "Guru", "Pelajar", "Lainnya"],
            datasets: [{
                label: "Grafik Pekerjaan Penduduk",
                backgroundColor: 'rgb(23, 125, 255)',
                borderColor: 'rgb(23, 125, 255)',
                data: [<?= $this->db->query("Select pekerjaan From tb_penduduk_baru WHERE pekerjaan='Petani'")->num_rows(); ?>,
                    <?= $this->db->query("Select pekerjaan From tb_penduduk_baru WHERE pekerjaan='Pegawai'")->num_rows(); ?>,
                    <?= $this->db->query("Select pekerjaan From tb_penduduk_baru WHERE pekerjaan='Guru'")->num_rows(); ?>,
                    <?= $this->db->query("Select pekerjaan From tb_penduduk_baru WHERE pekerjaan='Pelajar'")->num_rows(); ?>,
                    <?= $this->db->query("Select pekerjaan From tb_penduduk_baru WHERE pekerjaan='Lainnya'")->num_rows(); ?>
                ],
            }],
        },
        options: {
            responsive: true,
            maintainAspectRatio: false,
            scales: {
                yAxes: [{
                    ticks: {
                        beginAtZero: true
                    }
                }]
            },
        }
    });
</script>

<script>
    $('.custom-file-input').on('change', function() {
        let fileName = $(this).val().split('\\').pop();
        $(this).next('.custom-file-label').addClass("selected").html(fileName);
    });
</script>
</body>

</html>