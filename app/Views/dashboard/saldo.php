<?= $this->extend('templates/index'); ?>
<?= $this->section('content'); ?>

<!-- Content Wrapper. Contains page content -->
<div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <div class="content-header">
        <div class="container-fluid">
            <div class="row">
                <div class="col">
                    <ol class="breadcrumb float-right">
                        <li class="breadcrumb-item"><a href="/kas">Home</a></li>
                        <li class="breadcrumb-item active"><?= $title; ?></li>
                    </ol>
                </div><!-- /.col -->
            </div><!-- /.row -->
        </div><!-- /.container-fluid -->
    </div>
    <!-- /.content-header -->

    <!-- Main content -->
    <section class="content">
        <div class="row">
            <div class="col">
                <div class="card">
                    <div class="card-header bg-info no-print">
                        <h3 class="card-title"><?= $title; ?></h3>

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
                            <div class="col-8 col-sm-4">
                                <?php foreach ($salmasuk as $m) { ?> <?php $kasmasuk = $m->jml_masuk; ?> <?php } ?> <?php foreach ($salkeluar as $n) { ?> <?php $kaskeluar = $n->jml_keluar; ?> <?php } ?>
                                <input class="form-password text-bold form-control-lg" type="password" style="border: none; border-bottom: 2px solid lightskyblue; background-color:transparent;" value="<?= 'Rp. ' . number_format($kasmasuk - $kaskeluar); ?>">
                            </div>
                            <div class="col-4 col-sm-2">
                                <input type="checkbox" class="form-checkbox field_icon"> Show!
                            </div>
                        </div>
                    </div>
                    <!-- /.card-body -->
                    <div class="card-footer p-0 no-print">
                        <ul class="nav nav-pills float-right">
                            <li class="nav-item">
                                <button type="button" class="btn btn-tool-lg" onclick="window.location='<?= base_url('saldo'); ?>'">
                                    <i class="fas fa-sync-alt"></i>
                                </button>
                            </li>
                            <li class="nav-item">
                                <button type="button" class="btn btn-tool-lg" onclick="window.location='<?= base_url('rincian'); ?>'">
                                    <i class="fas fa-history"></i>
                                </button>
                            </li>
                            <li class="nav-item">
                                <button type="button" class="btn btn-tool-lg" onclick="window.location='<?= base_url('keluar'); ?>'">
                                    <i class="fas fa-location-arrow"></i>
                                </button>
                            </li>
                            <li class="nav-item">
                                <button type="button" class="btn btn-tool-lg" onclick="window.location='<?= base_url('masuk'); ?>'">
                                    <i class="fas fa-location-arrow fa-rotate-180"></i>
                                </button>
                            </li>
                        </ul>
                    </div>
                    <!-- /.footer -->
                </div>
            </div>
        </div>
    </section>

    <!-- Main content -->
    <section class="content">
        <div class="row">
            <div class="col">
                <div class="card">
                    <!-- /.card-header -->
                    <div class="card-body">
                        <table id="example3" class="table table-striped table-head-fixed dataTable">
                            <thead>
                                <tr>
                                    <th>No.</th>
                                    <th>Tanggal | Keterangan</th>
                                    <th>Debet | Kredit</th>
                                    <th>#</th>
                                </tr>
                            </thead>
                            <tbody>
                                <?php
                                $no = 1;
                                foreach ($rincian as $row) { ?>
                                    <tr>
                                        <td><?= $no; ?></td>
                                        <td>
                                            <?= $row['tgl_masuk']; ?><?= $row['tgl_keluar']; ?>
                                            <br>
                                            <?= $row['ket_masuk']; ?><?= $row['ket_keluar']; ?>
                                        </td>
                                        <td>
                                            <span class="badge badge-success"><?= number_format($row['jml_masuk']); ?></span>
                                            <br>
                                            <span class="badge badge-danger"><?= number_format($row['jml_keluar']); ?></span>
                                        </td>
                                        <td>
                                            <button class="btn btn-lg">
                                                <i class="fa fa-trash"></i>
                                            </button>
                                        </td>
                                    </tr>
                                <?php $no++;
                                } ?>
                            </tbody>
                        </table>
                    </div>
                    <!-- /.card-body -->
                </div>
            </div>
        </div>
        <!--/. container-fluid -->
    </section>
    <!-- /.content -->
    <!-- /.content -->
</div>
<!-- /.content-wrapper -->
<script>
    $(document).ready(function() {
        $('.field_icon').click(function() {
            if ($(this).is(':checked')) {
                $('.form-password').attr('type', 'text');
            } else {
                $('.form-password').attr('type', 'password');
            }
        });

    });
</script>


<?= $this->endSection(); ?>