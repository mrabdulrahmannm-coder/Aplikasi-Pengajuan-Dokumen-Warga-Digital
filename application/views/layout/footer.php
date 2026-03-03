<!-- <footer>
    <div class="footer clearfix mb-0 text-muted">
        <div class="float-left">
            <p>2022 &copy; Aplikasi Pelayanan Surat</p>
        </div>
    </div>
</footer> -->
</div>
</div>
<script src="<?= base_url(); ?>./assets/js/feather-icons/feather.min.js"></script>
<script src="<?= base_url(); ?>./assets/vendors/perfect-scrollbar/perfect-scrollbar.min.js"></script>
<script src="<?= base_url(); ?>./assets/js/app.js"></script>

<script src="<?= base_url(); ?>./assets/vendors/chartjs/Chart.min.js"></script>
<script src="<?= base_url(); ?>./assets/vendors/apexcharts/apexcharts.min.js"></script>
<script src="<?= base_url(); ?>./assets/js/pages/dashboard.js"></script>
<script src="<?= base_url(); ?>./assets/alertifyjs/alertify.min.js"></script>
<script src="<?= base_url(); ?>./assets/jQuery/jQuery.js"></script>
<script src="<?= base_url(); ?>./assets/DataTables/datatables.min.js"></script>
<script src="<?= base_url(); ?>./assets/js/main.js"></script>

<script>
    $(document).ready(function () {
        $('#data-admin').DataTable();
    });

    $(document).ready(function () {
        $('#data-warga').DataTable();
    });

    $(document).ready(function () {
        $('#data-users').DataTable();
    });

    $(document).ready(function () {
        $('#verifikasi').DataTable();
    });
</script>

<script>
    $(document).ready(function () {
        $('#histori').DataTable();
    });
</script>


<script>
    <?php if ($this->session->flashdata('success')) { ?>
        alertify.set('notifier', 'position', 'top-right');
        alertify.success('<span class="text-white"><?= $this->session->flashdata('success') ?></span>');
    <?php } else if ($this->session->flashdata('danger')) { ?>
            alertify.set('notifier', 'position', 'top-right');
            alertify.error('<span class="text-white"><?= $this->session->flashdata('danger') ?></span>');
    <?php } else if ($this->session->flashdata('error')) { ?>
                alertify.set('notifier', 'position', 'top-right');
                alertify.warning('<span class="text-dark"><?= $this->session->flashdata('error') ?></span>');
                unset();
    <?php } ?>
</script>

<script>
    function clearme() {
        <?php
        if (isset($_SESSION['success'])):
            unset($_SESSION['success']);
        elseif (isset($_SESSION['success'])):
            unset($_SESSION['success']);
        endif;
        ?>

        <?php
        if (isset($_SESSION['danger'])):
            unset($_SESSION['danger']);
        elseif (isset($_SESSION['danger'])):
            unset($_SESSION['danger']);
        endif;
        ?>

        <?php
        if (isset($_SESSION['error'])):
            unset($_SESSION['error']);
        elseif (isset($_SESSION['error'])):
            unset($_SESSION['error']);
        endif;
        ?>
    }
</script>

<script src="https://cdn.jsdelivr.net/npm/chart.js"></script>
<?php if ($this->session->userdata('role_id') == 3) { ?>
    <script>
        const cs = document.getElementById('grafikSurat');

        if (cs) {
            const grafikSurat = new Chart(cs.getContext('2d'), {
                type: 'bar',
                data: {
                    labels: [
                        'Surat Ket. Tidak Mampu',
                        'Surat Ket. Usaha',
                        'Surat Ket. Domisili',
                        'Surat Ket. Pengantar',
                        'Surat Pengantar Akte Kelahiran',
                        'Surat Ket. Kematian'
                    ],
                    datasets: [{
                        label: 'Jumlah Pengajuan',
                        data: [
                            <?= $sktm ?>,
                            <?= $sku ?>,
                            <?= $psd ?>,
                            <?= $skp ?>,
                            <?= $sk ?>,
                            <?= $kk ?>
                        ],
                        borderWidth: 1
                    }]
                },
                options: {
                    responsive: true,
                    plugins: { legend: { display: false } },
                    scales: { y: { beginAtZero: true, ticks: { stepSize: 1 } } }
                }
            });
        }
    </script>
<?php } ?>


<?php if ($this->session->userdata('role_id') == 1) { ?>
    <script>
        const ca = document.getElementById("grafikAdmin");

        if (ca) {
            const grafikAdmin = new Chart(ca.getContext('2d'), {
                type: 'bar',
                data: {
                    labels: [
                        "Surat Domisili",
                        "Surat Pengantar Akte Kelahiran",
                        "Surat Ket. Kematian",
                        "Surat Ket. Pengantar",
                        "Surat Ket. Tidak Mampu",
                        "Surat Ket. Usaha"
                    ],
                    datasets: [{
                        label: "Jumlah Pengajuan",
                        data: [
                            <?= $psd ?>,
                            <?= $sk ?>,
                            <?= $kk ?>,
                            <?= $skp ?>,
                            <?= $sktm ?>,
                            <?= $sku ?>
                        ],
                        backgroundColor: [
                            "#007bff", "#28a745", "#ffc107",
                            "#17a2b8", "#dc3545", "#6f42c1"
                        ]
                    }]
                },
                options: {
                    responsive: true,
                    scales: { y: { beginAtZero: true } }
                }
            });
        }
    </script>
<?php } ?>

<?php if ($this->session->userdata('role_id') == 2) { ?>
    <script>
        const ca = document.getElementById("grafikPetugas");

        if (ca) {
            const grafikPetugas = new Chart(ca.getContext('2d'), {
                type: 'bar',
                data: {
                    labels: [
                        "Surat Domisili",
                        "Surat Pengantar Akte Kelahiran",
                        "Surat Ket. Kematian",
                        "Surat Ket. Pengantar",
                        "Surat Ket. Tidak Mampu",
                        "Surat Ket. Usaha"
                    ],
                    datasets: [{
                        label: "Jumlah Pengajuan",
                        data: [
                            <?= $psd ?>,
                            <?= $sk ?>,
                            <?= $kk ?>,
                            <?= $skp ?>,
                            <?= $sktm ?>,
                            <?= $sku ?>
                        ],
                        backgroundColor: [
                            "#007bff", "#28a745", "#ffc107",
                            "#17a2b8", "#dc3545", "#6f42c1"
                        ]
                    }]
                },
                options: {
                    responsive: true,
                    scales: { y: { beginAtZero: true } }
                }
            });
        }
    </script>
<?php } ?>




</body>

</html>