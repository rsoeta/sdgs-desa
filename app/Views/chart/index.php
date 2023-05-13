<?= $this->extend('templates/index'); ?>
<?= $this->section('content'); ?>

<!-- Content Wrapper. Contains page content -->
<div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <div class="container-fluid">
        <div class="row mb-2">
            <div class="col">
                <ol class="breadcrumb float-right">
                    <li class="breadcrumb-item"><a href="/dashboard">Home</a></li>
                    <li class="breadcrumb-item active"><?= $title; ?></li>
                </ol>
            </div>
        </div>
        <div class="row">
            <div class="col-sm-12">
                <div class="card">
                    <div class="card-header">
                        <h5 class="card-title">Chart Pekerjaan</h5>

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
                            <div class="col-sm-4">
                                <p class="text-center">
                                    <strong>Chart Kondisi Pekerjaan</strong>
                                </p>
                                <div id="ChartKondPekerjaan" style="height: 200px; display: block; width: 300px;"></div>
                            </div>
                            <div class="col-sm-8">
                                <p class="text-center">
                                    <strong>Chart Pekerjaan Utama</strong>
                                </p>
                                <div id="barchart_div"></div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>

<script type="text/javascript" src="https://www.gstatic.com/charts/loader.js"></script>
<script>
    // Load google charts
    google.charts.load('current', {
        'packages': ['corechart']
    });
    google.charts.setOnLoadCallback(drawChart);

    google.charts.setOnLoadCallback(drawAnthonyChart);


    // Draw the chart and set the chart values
    function drawChart() {
        var data = google.visualization.arrayToDataTable([
            ['Kondisi Pekerjaan', 'Jumlah Pekerjaan'],
            <?php
            foreach ($kondisis as $row) {
                echo "['" . $row['NamaKondisi'] . "'," . $row['JmlKondisi'] . "],";
            }
            ?>
        ]);
        var options = {
            // 'legend': 'left',
            // 'width': 300,
            'height': 200,
            'is3D': true,
        };
        var chart = new google.visualization.PieChart(document.getElementById('ChartKondPekerjaan'));
        chart.draw(data, options);
    }


    function drawAnthonyChart() {
        var data = google.visualization.arrayToDataTable([
            ['Nama Pekerjaan Utama', 'Jumlah Pekerjaan'],
            <?php
            foreach ($pekerjaan as $row) {
                echo "['" . $row['NamaPekerjaan'] . "'," . $row['JmlPekerjaan'] . "],";
            }
            ?>
        ]);

        var view = new google.visualization.DataView(data);

        var options = {
            // width: 1200,
            height: 400,
            bar: {
                groupWidth: "95%"
            },
            legend: {
                position: "none"
            },
        };
        var chart = new google.visualization.BarChart(document.getElementById("barchart_div"));
        chart.draw(view, options);
    }
</script>

<?= $this->endSection(); ?>