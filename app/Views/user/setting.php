<?= $this->extend('templates/index'); ?>
<?= $this->section('content'); ?>

<div class="content-wrapper" style="min-height: 1627.6px;">
    <!-- Content Header (Page header) -->
    <section class="content-header">
        <div class="container-fluid">
            <div class="row mb-2">
                <div class="col-sm-6">
                    <h1><?= $title; ?></h1>
                </div>
                <div class="col-sm-6">
                    <ol class="breadcrumb float-sm-right">
                        <li class="breadcrumb-item"><a href="<?= base_url(); ?>">Home</a></li>
                        <li class="breadcrumb-item active">User Profile</li>
                    </ol>
                </div>
            </div>
        </div><!-- /.container-fluid -->
    </section>

    <!-- Main content -->
    <section class="content">
        <div class="container-fluid">
            <div class="row">
                <div class="col-sm-6 col-md-6 col-lg-4">

                    <!-- Profile Image -->
                    <div class="card card-primary card-outline">
                        <div class="card-body box-profile">
                            <?= form_open_multipart('', ['class' => 'formUpdate']); ?>
                            <?= csrf_field(); ?>
                            <div class="text-center">
                                <img id="gambar" class="profile-user-img img-fluid img-circle" src="<?= base_url(); ?>/dist/img/business-icon-png-1934.png" alt="User profile picture">
                            </div>
                            <?php
                            foreach ($users as $key) {
                                $id = $key['id'];
                                $NamaDesa = $key['NamaDesa'];
                                $nik = $key['nik'];
                                $firstname = $key['firstname'];
                                $lastname = $key['lastname'];
                                $email = $key['email'];
                            }
                            ?>
                            <h3 class="profile-username text-center"><?= $firstname; ?> <?= $lastname; ?></h3>
                            <?php

                            ?>

                            <p class="text-muted text-center">
                                <?php echo $key['nm_role']; ?>
                            </p>
                            <div class="row">
                                <div class="col-12">
                                    <ul class="list-group list-group-unbordered mb-3">
                                        <li class="list-group-item" hidden>
                                            ID
                                            <span class="float-right">
                                                <input id="id" name="id" class="list" value="<?= $id; ?>" style="border: none; font-weight: bold; font-style:italic;" readonly>
                                                <div class="errorid invalid-feedback" style="display: none;"></div>
                                            </span>
                                        </li>
                                        <li class="list-group-item">
                                            Desa
                                            <span class="float-right">
                                                <input id="NamaDesa" name="NamaDesa" class="list" value="<?= $NamaDesa; ?>" style="border: none; font-weight: bold; font-style:italic;" readonly>
                                                <div class="errornik invalid-feedback" style="display: none;"></div>
                                            </span>
                                        </li>
                                        <li class="list-group-item">
                                            No. KTP
                                            <span class="float-right">
                                                <input id="nik" name="nik" class="list" value="<?= $nik; ?>" style="border: none; font-weight: bold; font-style:italic;" readonly>
                                                <div class="errornik invalid-feedback" style="display: none;"></div>
                                            </span>
                                        </li>
                                        <li class="list-group-item">
                                            Nama Depan
                                            <span class="float-right">
                                                <input id="firstname" name="firstname" class="list" value="<?= $firstname; ?>" style="border: none; font-weight: bold; font-style:italic;">
                                                <div class="errorfirstname invalid-feedback" style="display: none;"></div>
                                            </span>
                                        <li class="list-group-item">
                                            Nama Belakang
                                            <span class="float-right">
                                                <input id="lastname" name="lastname" value="<?= $lastname; ?>" style="border: none; font-weight: bold; font-style:italic;">
                                                <div class="errorlastname invalid-feedback" style="display: none;"></div>
                                            </span>
                                        </li>
                                        </li>
                                        <li class="list-group-item mt-1">
                                            Email
                                            <span class="float-right">
                                                <input id="email" name="email" value="<?= $email; ?>" style="border: none; font-weight: bold; font-style:italic;">
                                                <div class="erroremail invalid-feedback" style="display: none;"></div>
                                            </span>
                                        </li>
                                    </ul>
                                </div>

                            </div>
                            <button type="submit" class="btn btn-primary btn-block tombolSimpan"><b>Simpan Perubahan</b></button>
                            <?= form_close(); ?>
                        </div>
                        <!-- /.card-body -->
                    </div>
                    <!-- /.card -->

                </div>
            </div>
            <!-- /.row -->
        </div><!-- /.container-fluid -->
    </section>
    <!-- /.content -->
</div>

<script>
    $(document).ready(function() {
        $('.tombolSimpan').click(function(e) {
            // alert('Hallo');
            e.preventDefault();

            let form = $('.formUpdate')[0];
            let data = new FormData(form);

            $.ajax({
                type: "post",
                url: "<?= base_url('usercontroller/updatedata'); ?>",
                data: data,
                dataType: "json",
                enctype: 'multipart/form-data',
                processData: false,
                contentType: false,
                cache: false,
                beforeSend: function(e) {
                    $('.tombolSimpan').html('<i class="fa fa-spin fa-spinner"></i>')
                    $('.tombolSimpan').prop('disabled', true);
                },
                complete: function() {
                    $('.tombolSimpan').html('Simpan');
                    $('.tombolSimpan').prop('disabled', false);
                },
                success: function(response) {
                    if (response.error) {
                        let dataError = response.error;
                        if (dataError.errornik) {
                            $('.errornik').html(dataError.errornik).show();
                            $('#nik').addClass('is-invalid');
                        } else {
                            $('.errornik').fadeOut();
                            $('#nik').removeClass('is-invalid');
                            $('#nik').addClass('is-valid');
                        }

                        if (dataError.errorfirstname) {
                            $('.errorfirstname').html(dataError.errorfirstname).show();
                            $('#firstname').addClass('is-invalid');
                        } else {
                            $('.errorfirstname').fadeOut();
                            $('#firstname').removeClass('is-invalid');
                            $('#firstname').addClass('is-valid');
                        }

                        if (dataError.errorlastname) {
                            $('.errorlastname').html(dataError.errorlastname).show();
                            $('#lastname').addClass('is-invalid');
                        } else {
                            $('.errorlastname').fadeOut();
                            $('#lastname').removeClass('is-invalid');
                            $('#lastname').addClass('is-valid');
                        }

                        if (dataError.erroremail) {
                            $('.erroremail').html(dataError.erroremail).show();
                            $('#email').addClass('is-invalid');
                        } else {
                            $('.erroremail').fadeOut();
                            $('#email').removeClass('is-invalid');
                            $('#email').addClass('is-valid');
                        }

                        if (dataError.errorrole) {
                            $('.errorrole').html(dataError.errorrole).show();
                            $('#role').addClass('is-invalid');
                        } else {
                            $('.errorrole').fadeOut();
                            $('#role').removeClass('is-invalid');
                            $('#role').addClass('is-valid');
                        }

                        if (dataError.errorstatus) {
                            $('.errorstatus').html(dataError.errorstatus).show();
                            $('#status').addClass('is-invalid');
                        } else {
                            $('.errorstatus').fadeOut();
                            $('#status').removeClass('is-invalid');
                            $('#status').addClass('is-valid');
                        }
                    } else {
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
                },
                error: function(xhr, thrownError) {
                    alert(xhr.status + "\n" + xhr.responseText + "\n" + thrownError);
                }
            });
        });
    });
</script>

<?= $this->endSection(); ?>