<?= $this->extend('templates/index'); ?>
<?= $this->section('content'); ?>

<!-- Content Wrapper. Contains page content -->
<div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <div class="content-header">
        <div class="container-fluid">
            <div class="row mb-2">
                <div class="col ">
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
            <div class="col-12 col-md-6">
                <div class="info-box bg-primary">
                    <span class="info-box-icon">
                        <a href="masuk" class="btn btn-lg">
                            <i class="fa fa-location-arrow fa-rotate-180 fa-2x"></i>
                        </a>
                    </span>
                    <div class="info-box-content">
                        <div class="row">
                            <div class="col-7">
                                <?php foreach ($salMasuk as $row) { ?>
                                    <input class="form-password text-bold form-control-lg" type="password" style="border: none; border-bottom: 2px solid black; background-color:transparent;" value="<?php echo 'Rp. ' . number_format($row->jml_masuk); ?>">
                                <?php } ?>
                            </div>
                            <div class="col-5">
                                <input type="checkbox" class="form-checkbox field_icon"> Show!
                            </div>
                        </div>
                        <div class="">
                            <h6>Pemasukan</h6>
                        </div>
                    </div>
                </div>
            </div>
            <div class="col-12 col-md-6">
                <div class="info-box bg-warning">
                    <span class="info-box-icon">
                        <a href="keluar" class="btn btn-lg">
                            <i class="fa fa-location-arrow fa-2x"></i>
                        </a>
                    </span>
                    <div class="info-box-content">
                        <div class="row">
                            <div class="col-7">
                                <?php foreach ($salKeluar as $row) { ?>
                                    <input class="form-password2 text-bold form-control-lg text-light" type="password" style="border: none; border-bottom: 2px solid black; background-color:transparent;" value="<?php echo 'Rp. ' . number_format($row->jml_keluar); ?>">
                                <?php } ?>
                            </div>
                            <div class="col-5">
                                <input type="checkbox" class="form-checkbox field_icon2"> Show!
                            </div>
                        </div>
                        <div class="">
                            <h6>Pengeluaran</h6>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <!-- /.card-body -->

        <!-- Main content -->
        <div class="row">
            <div class="col">
                <ul class="nav nav-tabs" id="myTab" role="tablist">
                    <li class="nav-item" role="presentation">
                        <button class="nav-link active" id="utang-tab" data-bs-toggle="tab" data-bs-target="#utang" type="button" role="tab" aria-controls="utang" aria-selected="true">Pemasukan</button>
                    </li>
                    <li class="nav-item" role="presentation">
                        <button class="nav-link" id="piutang-tab" data-bs-toggle="tab" data-bs-target="#piutang" type="button" role="tab" aria-controls="piutang" aria-selected="false">Pengeluaran</button>
                    </li>
                    <li class="nav-item" role="presentation">
                        <button class="nav-link" id="utput-tab" data-bs-toggle="tab" data-bs-target="#utput" type="button" role="tab" aria-controls="utput" aria-selected="false"><?= $title; ?></button>
                    </li>
                </ul>
                <div class="tab-content" id="myTabContent">

                    <div class="tab-pane fade show active" id="utang" role="tabpanel" aria-labelledby="utang-tab">
                        <div class="card">
                            <div class="card-body">
                                <table id="example1" class="table table-striped table-head-fixed dataTable">
                                    <thead>
                                        <tr>
                                            <th>No.</th>
                                            <th>Tanggal | Keterangan</th>
                                            <th>Nominal</th>
                                            <th>#</th>
                                        </tr>
                                    </thead>
                                    <tbody>
                                        <?php
                                        $no = 1;
                                        foreach ($masuk as $row) { ?>
                                            <tr>
                                                <td><?= $no; ?></td>
                                                <td>
                                                    <?= $row['tgl_masuk']; ?>
                                                    <br>
                                                    <?= $row['ket_masuk']; ?>
                                                </td>
                                                <td>
                                                    <?= number_format($row['jml_masuk']); ?>
                                                </td>
                                                <td>
                                                    <button class="btn btn-lg" onclick="hapus('<?= $row['id_masuk']; ?>','<?= $row['ket_masuk']; ?>')">
                                                        <i class="fa fa-trash-alt"></i>
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
                    <div class="tab-pane fade" id="piutang" role="tabpanel" aria-labelledby="piutang-tab">
                        <div class="card">
                            <div class="card-body">
                                <table id="example3" class="table table-striped table-head-fixed dataTable">
                                    <thead>
                                        <tr>
                                            <th>No.</th>
                                            <th>Tanggal | Keterangan</th>
                                            <th>Nominal</th>
                                            <th>#</th>
                                        </tr>
                                    </thead>
                                    <tbody>
                                        <?php
                                        $no = 1;
                                        foreach ($keluar as $row) { ?>
                                            <tr>
                                                <td><?= $no; ?></td>
                                                <td>
                                                    <?= $row['tgl_keluar']; ?>
                                                    <br>
                                                    <?= $row['ket_keluar']; ?>
                                                </td>
                                                <td>
                                                    <?= number_format($row['jml_keluar']); ?>
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
                    <div class="tab-pane fade" id="utput" role="tabpanel" aria-labelledby="utput-tab">
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
                    </div>
                </div>

            </div>
        </div>
    </section>
    <!-- /.content -->
</div>
<!-- /.content-wrapper -->

<div class="viewmodal" style="display: none;"></div>
<script>
    function hapus(id, keterangan) {
        tanya = confirm(`Anda yakin akan Menghapus ${keterangan}?`);
        if (tanya == true) {
            $.ajax({
                type: "post",
                url: "<?= base_url('kas/hapus'); ?>",
                data: {
                    id_masuk: id
                },
                dataType: "json",
                success: function(response) {
                    if (response.sukses) {
                        window.location.reload();
                    }
                }
            });
        }
    }

    function view(id) {
        $.ajax({
            type: "post",
            url: "<?= base_url("akun/formview"); ?>",
            data: {
                id_akun: id
            },
            dataType: "json",
            success: function(response) {
                if (response.sukses) {
                    $('.viewmodal').html(response.sukses).show();
                    $('#modalview').modal('show');
                }
            },
            error: function(xhr, ajaxOptions, thrownError) {
                alert(xhr.status + "\n" + xhr.responseText + "\n" + thrownError);
            }
        });
    }

    $(document).ready(function() {
        $('.field_icon').click(function() {
            if ($(this).is(':checked')) {
                $('.form-password').attr('type', 'text');
            } else {
                $('.form-password').attr('type', 'password');
            }
        });

        $('.field_icon2').click(function() {
            if ($(this).is(':checked')) {
                $('.form-password2').attr('type', 'text');
            } else {
                $('.form-password2').attr('type', 'password');
            }
        });
    });
</script>

<?= $this->endSection(); ?>