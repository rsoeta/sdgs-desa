<?= $this->extend('templates/index'); ?>
<?= $this->section('content'); ?>


<!-- Content Wrapper. Contains page content -->
<div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <div class="content-header">
    </div>
    <!-- /.content-header -->

    <!-- Main content -->
    <section class="content">
        <div class="row">
            <div class="col">
                <ul class="nav nav-tabs" id="myTab" role="tablist">
                    <li class="nav-item" role="presentation">
                        <button class="nav-link" id="profile-tab" data-bs-toggle="tab" data-bs-target="#profile" type="button" role="tab" aria-controls="profile" aria-selected="false">Operators</button>
                    </li>
                    <li class="nav-item" role="presentation">
                        <button class="nav-link active" id="home-tab" data-bs-toggle="tab" data-bs-target="#home" type="button" role="tab" aria-controls="home" aria-selected="true">Users</button>
                    </li>
                </ul>
                <div class="tab-content" id="myTabContent">
                    <div class="tab-pane fade" id="profile" role="tabpanel" aria-labelledby="profile-tab">
                        <div class="row">
                            <div class="col-12 col-sm-10">
                                <div class="card">
                                    <div class="card-header">
                                        <div class="col">
                                            <h5>
                                                Tab Target dan Capaian Operator
                                            </h5>
                                        </div>
                                    </div>
                                    <!-- /.card-header -->
                                    <div class="card-body">
                                        <div class="row">
                                            <div class="col">
                                                <table id="example2" class="table table-bordered table-striped dataTable">
                                                    <thead>
                                                        <tr>
                                                            <th>No.</th>
                                                            <th>Nama Pendata</th>
                                                            <th>Persentase L/P</th>
                                                            <th>Jumlah L/P</th>
                                                            <th>Capaian L/P</th>
                                                            <th>Jumlah KK</th>
                                                            <th>User ID</th>
                                                        </tr>
                                                    </thead>
                                                    <tbody>
                                                        <?php
                                                        $no = 1;
                                                        foreach ($individu_log as $row) { ?>
                                                            <tr>
                                                                <td><?= $no; ?></td>
                                                                <td><?= $row['NamaPendata']; ?></td>
                                                                <td><?= number_format(($row['jumlah'] / $row['Jml_LP']) * 100, 2) . '%'; ?></td>
                                                                <td><?= $row['Jml_LP']; ?></td>
                                                                <td><?= $row['jumlah']; ?></td>
                                                                <td><?= $row['Jml_KK']; ?></td>
                                                                <td><?= $row['UserID']; ?></td>
                                                            </tr>
                                                        <?php $no++;
                                                        } ?>
                                                    </tbody>
                                                </table>
                                            </div>
                                        </div>
                                    </div>
                                    <!-- /.card-body -->
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="tab-pane fade show active" id="home" role="tabpanel" aria-labelledby="home-tab">
                        <div class="row">
                            <div class="col-12">
                                <div class="card">
                                    <div class="card-header">
                                        <div class="col-12 col-sm-4">
                                            <button type="button" class="btn btn-outline-primary btn-block tombolTambah">
                                                Tambah User
                                            </button>
                                        </div>
                                    </div>
                                    <div class="card-body">
                                        <div class="row">
                                            <div class="col-12">
                                                <table id="example4" class="table table-bordered table-striped dataTable">
                                                    <thead>
                                                        <tr style="text-align: center;">
                                                            <th rowspan="2">No.</th>
                                                            <th rowspan="2">NIK</th>
                                                            <th rowspan="2">Nama User</th>
                                                            <th rowspan="2">Nama Desa</th>
                                                            <th rowspan="2">Email</th>
                                                            <th colspan="2">Akses</th>
                                                            <th rowspan="2">Role</th>
                                                            <th rowspan="2">Status</th>
                                                            <th rowspan="2">User Image</th>
                                                            <th rowspan="2">#</th>
                                                        </tr>
                                                        <tr>
                                                            <th>RT</th>
                                                            <th>RW</th>
                                                        </tr>
                                                    </thead>
                                                    <tbody>
                                                        <?php
                                                        $no = 1;
                                                        foreach ($user as $row) { ?>
                                                            <tr>
                                                                <td><?= $no; ?></td>
                                                                <td><?= $row['nik']; ?></td>
                                                                <td><?= ucfirst(strtolower($row['firstname'])); ?> <?= ucfirst(strtolower($row['lastname'])); ?></td>
                                                                <td><?= $row['NamaDesa']; ?></td>
                                                                <td><?= $row['email']; ?></td>
                                                                <td></td>
                                                                <td></td>
                                                                <td>
                                                                    <span class="right badge <?php if ($row['id_role'] == 1) {
                                                                                                    echo 'badge-danger';
                                                                                                } elseif ($row['id_role'] == 2) {
                                                                                                    echo 'badge-primary';
                                                                                                } elseif ($row['id_role'] == 3) {
                                                                                                    echo 'badge-success';
                                                                                                } ?> ">
                                                                        <?= $row['nm_role']; ?>
                                                                    </span>
                                                                </td>
                                                                <td>
                                                                    <?php $status = $row['status'] ?>
                                                                    <?php if ($status == 1) { ?>
                                                                        <a href="update_status/<?php echo $row['id']; ?>/<?php echo $row['status']; ?>" class="btn btn-success btn-sm">Active</a>
                                                                        <!-- In these as we are creating an attribute and passing the values -->
                                                                    <?php } else { ?>
                                                                        <a href="update_status/<?php echo $row['id']; ?>/<?php echo $row['status']; ?>" class=" btn btn-secondary btn-sm">Inactive</a>
                                                                    <?php } ?>
                                                                </td>
                                                                <td><?= $row['user_image']; ?></td>
                                                                <td>
                                                                    <button type="button" class="btn" onclick="view('<?= $row['id']; ?>')">
                                                                        <i class="fa fa-pen"></i>
                                                                    </button>
                                                                    <button type="button" class="btn" onclick="hapus('<?= $row['id']; ?>','<?= $row['firstname']; ?>')">
                                                                        <i class="fa fa-trash-alt"></i>
                                                                    </button>
                                                                </td>
                                                            </tr>
                                                        <?php $no++;
                                                        } ?>
                                                    </tbody>
                                                </table>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>
</div>

<!-- /.content-wrapper -->
<div class="viewmodal" style="display: none;"></div>
<script>
    function hapus(id, firstname) {
        tanya = confirm(`Anda yakin akan Menghapus ${firstname}?`);
        if (tanya == true) {
            $.ajax({
                type: "post",
                url: "<?= base_url('user/hapus'); ?>",
                data: {
                    id: id
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
            url: "<?= base_url("user/formview"); ?>",
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
    }

    $(document).ready(function() {
        $('.tombolTambah').click(function(e) {
            e.preventDefault();

            $.ajax({
                url: "<?= base_url('user/formTambah'); ?>",
                dataType: "json",
                type: "post",
                data: {
                    aksi: 0
                },
                success: function(response) {
                    if (response.data) {
                        $('.viewmodal').html(response.data).show();
                        $('#modalTambahUser').on('shown.bs.modal', function(event) {
                            // do something...
                            $('#firstname').focus();
                        });
                        $('#modalTambahUser').modal('show');
                    }
                },
                error: function(xhr, thrownError) {
                    alert(xhr.status + "\n" + xhr.responseText + "\n" + thrownError);
                }
            });
        });
    });
</script>

<?= $this->endSection(); ?>