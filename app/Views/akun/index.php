<?= $this->extend('templates/index'); ?>
<?= $this->section('content'); ?>

<!-- Content Wrapper. Contains page content -->
<div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <div class="content-header">
        <div class="container-fluid">
            <div class="row mb-2">
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
                    <div class="card-header">
                        <div class="col-12 col-sm-4">
                            <button type="button" class="btn btn-outline-primary btn-block tombolTambah">Tambah Akun</button>
                        </div>
                    </div>
                    <!-- /.card-header -->
                    <div class="card-body">
                        <div id="" class="dataTables_wrapper dt-bootstrap4">
                            <div class="row">
                                <div class="col-12">
                                    <table id="example2" class="table table-bordered table-striped dataTable">
                                        <thead>
                                            <tr>
                                                <th>No.</th>
                                                <th>Nama Akun</th>
                                                <th>Kategori</th>
                                                <th>Status</th>
                                                <th>#</th>
                                            </tr>
                                        </thead>
                                        <tbody>
                                            <?php
                                            $no = 1;
                                            foreach ($akun as $row) { ?>
                                                <tr>
                                                    <td><?= $no; ?></td>
                                                    <td><?= $row['jenis_akun']; ?></td>
                                                    <td><?= $row['nm_kat']; ?></td>
                                                    <td>
                                                        <?php if ($row['status_akun'] == 0) { ?>
                                                            <span class="right badge badge-secondary">Non-Aktif</span>
                                                        <?php } else if ($row['status_akun'] == 1) { ?>
                                                            <span class="right badge badge-success">Aktif</span>
                                                        <?php } ?>
                                                    </td>
                                                    <td>
                                                        <button type="button" class="btn" onclick="view('<?= $row['id_akun']; ?>')">
                                                            <i class="fa fa-info"></i>
                                                        </button>
                                                        <button type="button" class="btn" onclick="hapus('<?= $row['id_akun']; ?>','<?= $row['jenis_akun']; ?>')">
                                                            <i class="fa fa-trash"></i>
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
                    <!-- /.card-body -->
                </div>
            </div>
        </div>
        <!--/. container-fluid -->
    </section>
    <!-- /.content -->

</div>
<!-- /.content-wrapper -->
<div class="viewmodal" style="display: none;"></div>
<script>
    function hapus(id, jenis) {
        tanya = confirm(`Anda yakin akan Menghapus akun ${jenis}?`);
        if (tanya == true) {
            $.ajax({
                type: "post",
                url: "<?= base_url('akun/hapus'); ?>",
                data: {
                    id_akun: id
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
        $('.tombolTambah').click(function(e) {
            e.preventDefault();

            $.ajax({
                url: "<?= base_url('akun/formTambah'); ?>",
                dataType: "json",
                type: "post",
                data: {
                    aksi: 0
                },
                success: function(response) {
                    if (response.data) {
                        $('.viewmodal').html(response.data).show();
                        $('#modalTambahAkun').on('shown.bs.modal', function(event) {
                            // do something...
                            $('#jenis_akun').focus();
                        });
                        $('#modalTambahAkun').modal('show');
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