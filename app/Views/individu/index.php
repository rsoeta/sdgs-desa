<?= $this->extend('templates/index'); ?>

<?= $this->section('content'); ?>

<div class="content-wrapper">
    <div class="content-header">
        <div class="container-fluid">
            <div class="row">
                <!-- <div class="col-12 col-sm-6 col-md-6"> -->
                <!-- <ol class="breadcrumb float-right">
                    <li class="breadcrumb-item"><a href="dashboard">Home</a></li>
                    <li class="breadcrumb-item active"></li>
                </ol> -->
                <!-- <br> -->
                <!-- </div>
                <div class="col-12 col-sm-6 col-md-6"> -->
                <?php if (session()->get('success')) : ?>
                    <div class="alert alert-success" role="alert">
                        <?= session()->get('success'); ?>
                    </div>
                <?php endif; ?>
                <div class="col-12 col-md-3">
                    <button type="button" class="btn btn-success btn-block" onclick="window.location='/individutmb'">
                        <i class="fa fa-plus"></i> Tambah <?= $title; ?>
                    </button>
                </div>
            </div>
        </div>
    </div><!-- /.container-fluid -->
    <section class="content">
        <div class="row">
            <div class="col">
                <div class="card">
                    <div class="card-header">
                        <?php
                        $user = session()->get('role');
                        $nik = session()->get('nik');
                        $desa_id = session()->get('desa_id');
                        ?>
                        <div class="container">
                            <div class="row">
                                <div class="col-sm-1 col-4">
                                    <label for="desa" class="form-label">
                                        Desa
                                    </label>
                                </div>
                                <div class="col-sm-3 col-8">
                                    <select <?php if ($user >= 2) {
                                                echo 'disabled="disabled"';
                                            } ?> class="form-control form-control-sm" name="" id="desa">
                                        <option value="">-Pilih-</option>
                                        <?php foreach ($desKels as $row) { ?>
                                            <option <?php if ($desa_id == $row['KodeDesa']) {
                                                        echo 'selected';
                                                    } ?> value="<?= $row['KodeDesa']; ?>"><?= $row['NamaDesa']; ?></option>
                                        <?php } ?>
                                    </select>
                                </div>
                                <div class="col-sm-1 col-4">
                                    <label for="operator" class="form-label">
                                        Operator
                                    </label>
                                </div>
                                <div class="col-sm-3 col-8">
                                    <select <?php if ($user == 3) {
                                                echo 'disabled="disabled"';
                                            } ?> class="form-control form-control-sm" name="" id="operator">
                                        <option value="">-Pilih-</option>
                                        <?php foreach ($operator as $row) { ?>
                                            <option <?php if ($nik == $row['UserID']) {
                                                        echo 'selected';
                                                    } ?> value="<?php echo $row['UserID']; ?>"><?php echo $row['NamaLengkap']; ?></option>
                                        <?php } ?>
                                    </select>
                                </div>
                            </div>
                            <div class="row">
                                <div class="col-sm-1 col-4">
                                    <label for="rw" class="form-label">
                                        RW
                                    </label>
                                </div>
                                <div class="col-sm-3 col-8">
                                    <select class="form-control form-control-sm" name="" id="rw">
                                        <option value="">-Pilih-</option>
                                        <?php foreach ($rws as $row) { ?>
                                            <option value="<?= $row['no_rw']; ?>"><?= $row['no_rw']; ?></option>
                                        <?php } ?>
                                    </select>
                                </div>
                                <div class="col-sm-1 col-4">
                                    <label for="rt" class="form-label">
                                        RT
                                    </label>
                                </div>
                                <div class="col-sm-3 col-8">
                                    <select class="form-control form-control-sm" name="" id="rt">
                                        <option value="">-Pilih-</option>
                                    </select>
                                </div>
                                <div class="col-sm-1 col-4">
                                    <label for="keterangan" class="form-label">
                                        Keterangan
                                    </label>
                                </div>
                                <div class="col-sm-3 col-8">
                                    <select class="form-control form-control-sm" name="" id="keterangan">
                                        <option value="">-Pilih Keterangan-</option>
                                        <?php foreach ($kets as $row) { ?>
                                            <option value="<?= $row['IDKeterangan']; ?>"><?= $row['NamaKeterangan']; ?></option>
                                        <?php } ?>
                                    </select>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="card-body">
                        <div class="row">
                            <div class="col-12 col-sm-12">
                                <input type="hidden" class="form-control input-group-sm" name="<?= csrf_token() ?>" value="<?= csrf_hash() ?>" />
                                <table class="table table-bordered table-striped dataTable compact" id="tblIndividu">
                                    <thead>
                                        <tr>
                                            <th>No.</th>
                                            <th>Nama</th>
                                            <th>No. KTP</th>
                                            <th>No. KK</th>
                                            <th>No. RT</th>
                                            <th>No. RW</th>
                                            <!-- <th>Desa</th> -->
                                            <th>Tempat Lahir</th>
                                            <th>Tanggal Lahir</th>
                                            <th>Keterangan</th>
                                            <!-- <th>Pend Tertinggi</th> -->
                                            <th>#</th>
                                        </tr>
                                    </thead>
                                    <tbody></tbody>
                                </table>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>
</div>

<script>
    table = $('#tblIndividu').DataTable({
        'order': [],
        'fixedHeader': true,
        'searching': true,
        'paging': true,
        'responsive': true,
        'processing': true,
        'serverSide': true,
        "ajax": {
            "url": "<?= site_url('individu/table_data'); ?>",
            "type": "POST",
            "data": {
                "csrf_test_name": $('input[name=csrf_test_name]').val()
            },
            "data": function(data) {
                data.csrf_test_name = $('input[name=csrf_test_name]').val();
                data.desa = $('#desa').val();
                data.operator = $('#operator').val();
                data.rw = $('#rw').val();
                data.rt = $('#rt').val();
                data.keterangan = $('#keterangan').val();
            },
            "dataSrc": function(response) {
                $('input[name=csrf_test_name]').val(response.csrf_test_name);
                return response.data;
            }
        },

        "columnDefs": [{
            "targets": [0],
            "orderable": false
        }]
    });

    $('#desa').change(function() {
        table.draw();
    });
    $('#operator').change(function() {
        table.draw();
    });
    $('#rw').change(function() {
        table.draw();
    });
    $('#rt').change(function() {
        table.draw();
    });
    $('#keterangan').change(function() {
        table.draw();
    });

    $(document).on('click', '#deleteBtn', function() {
        var id = $(this).data('id');
        // alert(id);
        // $('.editIndividu').modal('show');
        tanya = confirm("Hapus data ini?");
        if (tanya == true) {
            $.ajax({
                type: "post",
                url: "<?= base_url('individu/delete'); ?>",
                data: {
                    id: id
                },
                dataType: "json",
                success: function(response) {
                    if (response.sukses) {
                        const Toast = Swal.mixin({
                            toast: true,
                            position: 'top-end',
                            showConfirmButton: false,
                            timer: 3000,
                            timerProgressBar: true,
                            didOpen: (toast) => {
                                toast.addEventListener('mouseenter', Swal.stopTimer)
                                toast.addEventListener('mouseleave', Swal.resumeTimer)
                            }
                        })

                        Toast.fire({
                            icon: 'success',
                            title: response.sukses,
                        });
                        window.location.reload();
                    }
                }
            });
        }

    });

    $(document).on('click', '#editBtn', function edit() {
        var id = $(this).data('id');
        // alert(id);
        // $('.editIndividu').modal('show');
        $.ajax({
            type: "get",
            url: "<?= base_url("individu/edit/"); ?>",
            data: {
                id: id
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
    });

    $(document).ready(function() {

        $('#rw').change(function() {

            var no_rw = $('#rw').val();

            var action = 'get_rt';

            if (no_rw != '') {
                $.ajax({
                    url: "<?php echo base_url('individu/get_rt'); ?>",
                    method: "POST",
                    data: {
                        no_rw: no_rw,
                        action: action
                    },
                    dataType: "JSON",
                    success: function(data) {
                        var html = '<option value="">-Pilih-</option>';

                        for (var count = 0; count < data.length; count++) {

                            html += '<option value="' + data[count].no_rt + '">' + data[count].no_rt + '</option>';

                        }

                        $('#rt').html(html);
                    }
                });
            } else {
                $('#rt').val('');
            }
        });
    });
</script>
<?= $this->endSection(); ?>