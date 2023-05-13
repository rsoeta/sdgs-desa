<?= $this->extend('templates/index'); ?>
<?= $this->section('content'); ?>

<!-- Content Wrapper. Contains page content -->
<div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <div class="content-header">
        <div class="container-fluid">
            <div class="row mb-2">
                <div class="col-6">
                    <strong>
                        <p id="timestamp"></p>
                    </strong>
                </div>
                <div class="col-6">
                    <ol class="breadcrumb float-right">
                        <li class="breadcrumb-item"><a href="#">Home</a></li>
                        <li class="breadcrumb-item active"><?= $title; ?></li>
                    </ol>
                </div><!-- /.col -->
            </div><!-- /.row -->
        </div><!-- /.container-fluid -->
    </div>
    <!-- /.content-header -->
    <!-- Main content -->
    <section class="content">
        <div class="card">
            <div class="card-header">
                <h3 class="card-title"><strong>MENU</strong></h3>
                <div class="card-tools">
                    <button type="button" class="btn btn-tool" data-card-widget="collapse">
                        <i class="fas fa-minus"></i>
                    </button>
                    <button type="button" class="btn btn-tool" data-card-widget="remove">
                        <i class="fas fa-times"></i>
                    </button>
                </div>
            </div>
            <div class="card-body">
                <div class="container kotak-menu">
                    <div class="row">
                        <div class="kotak pl-1 col-4 col-sm-2">
                            <div class="context" onclick="location.href='individu'">
                                <img src="<?= base_url('sdgs-garut.png'); ?>" alt="" class="img-fluid mx-auto d-block">
                                <div class="boks green">
                                    <div class="text text-white text-center">
                                        <div>
                                            <p class="mt-1"><i class="fa fa-user fa-2x"></i></p>
                                            <p>
                                                Individu
                                            </p>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>

                        <div class="kotak pl-1 col-4 col-sm-2">
                            <div class="context" onclick="location.href='keluarga'">
                                <img src="<?= base_url('sdgs-garut.png'); ?>" alt="" class="img-fluid mx-auto d-block">
                                <div class="boks darkblue">
                                    <div class="text text-white text-center">
                                        <div>
                                            <p class="mt-1"><i class="fa fa-users fa-2x"></i></p>
                                            <p>
                                                Keluarga
                                            </p>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="kotak pl-1 col-4 col-sm-2">
                            <div class="context" onclick="location.href='#'">
                                <img src="<?= base_url('sdgs-garut.png'); ?>" alt="" class="img-fluid mx-auto d-block">
                                <div class="boks pink">
                                    <div class="text text-white text-center">
                                        <div>
                                            <p class="mt-1"><i class="fa fa-clipboard-list fa-2x"></i></p>
                                            <p>
                                                #
                                            </p>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="kotak pl-1 col-4 col-sm-2">
                            <div class="context" onclick="location.href='#'">
                                <img src="<?= base_url('sdgs-garut.png'); ?>" alt="" class="img-fluid mx-auto d-block">
                                <div class="boks gold">
                                    <div class="text text-white text-center">
                                        <div>
                                            <p class="mt-1"><i class="fa fa-clipboard-list fa-2x"></i></p>
                                            <p>
                                                #
                                            </p>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="kotak pl-1 col-4 col-sm-2">
                            <div class="context" onclick="location.href='setting'">
                                <img src="<?= base_url('sdgs-garut.png'); ?>" alt="" class="img-fluid mx-auto d-block">
                                <div class="boks bg-info">
                                    <div class="text text-white text-center">
                                        <div>
                                            <p class="mt-1"><i class="fa fa-user-cog fa-2x"></i>
                                            </p>
                                            Setting
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <div class="row">
            <div class="col-md-12">
                <div class="card">
                    <div class="card-header">
                        <h3 class="card-title"><strong>Persentase Progres</strong></h3>
                        <div class="card-tools">
                            <button type="button" class="btn btn-tool" data-card-widget="collapse">
                                <i class="fas fa-minus"></i>
                            </button>
                            <button type="button" class="btn btn-tool" data-card-widget="remove">
                                <i class="fas fa-times"></i>
                            </button>
                        </div>
                    </div>
                    <!-- /.card-header -->
                    <div class="card-body">
                        <div class="row">
                            <div class="col-md-8">
                                <div id="chart_div" style="height: 600px; width: 100%"></div>
                            </div>
                            <!-- /.col -->
                            <div class="col-md-4">
                                <p class="text-center">
                                    <strong>Goal Completion</strong>
                                </p>
                                <?php foreach ($individu_log as $row) { ?>
                                    <?php $persentase = ($row['jumlah'] / $row['Jml_LP']) * 100 ?>
                                    <div class="progress-group">
                                        <?= $row['NamaPendata']; ?>
                                        <span class="float-right"><b><?= $row['jumlah']; ?></b>/<?= $row['Jml_LP']; ?></span>
                                        <div class="toast-progress">
                                            <div class="progress-bar bg-primary" style="width: <?= number_format($persentase, 2); ?>%"><?= number_format($persentase, 2); ?>%</div>
                                        </div>
                                    </div>
                                <?php } ?>
                                <!-- /.progress-group -->
                            </div>
                            <!-- /.col -->
                        </div>
                    </div>
                    <!-- /.row -->
                    <div class="card-footer">
                        <button type="button" onclick="window.location.href='/logout' " class="btn btn-danger btn-sm float-right">
                            <i class="fa fa-sign-out-alt"></i>
                            Logout
                        </button>
                    </div>
                </div>
                <!-- ./card-body -->
                <!-- /.card-footer -->
            </div>
            <!-- /.card -->
        </div>
        <!-- /.col -->
    </section>
    <!-- /.content -->
</div>
<!-- /.content-wrapper -->

<script type="text/javascript" src="https://www.gstatic.com/charts/loader.js"></script>
<script>
    google.charts.load('current', {
        'packages': ['corechart']
    });

    // google.charts.setOnLoadCallback(drawBarChart);

    google.charts.setOnLoadCallback(drawVisualization);

    // Pie Chart
    // google.charts.setOnLoadCallback(showBarChart);

    function drawVisualization() {
        var data = google.visualization.arrayToDataTable([
            ['Nama Pendata', 'Persentase'],
            <?php
            foreach ($individu_log as $row) {
                echo "['" . $row['NamaPendata'] . "'," . ($row['jumlah'] / $row['Jml_LP']) * 100 . "],";
            }
            ?>
        ]);

        var options = {
            title: ' Jumlah Persentase',
            vAxis: {
                title: 'Persen'
            },
            hAxis: {
                title: 'Nama Pendata'
            },
            seriesType: 'bars',
            series: {
                5: {
                    type: 'line'
                }
            }
        };
        var chart = new google.visualization.ComboChart(document.getElementById('chart_div'));
        chart.draw(data, options);
    }
</script>
<script>
    // Function ini dijalankan ketika Halaman ini dibuka pada browser
    $(function() {
        setInterval(timestamp, 1000); //fungsi yang dijalan setiap detik, 1000 = 1 detik
    });

    //Fungi ajax untuk Menampilkan Jam dengan mengakses File ajax_timestamp.php
    function timestamp() {
        $.ajax({
            url: '<?= base_url(); ?>/dist/js/ajax_timestamp.php',
            success: function(data) {
                $('#timestamp').html(data);
            },
        });
    }
</script>

<?= $this->endSection(); ?>