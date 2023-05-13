<!DOCTYPE html>
<html lang="en">

<head>
    <!-- Required meta tags-->
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <meta name="description" content="Colorlib Templates">
    <meta name="author" content="Colorlib">
    <meta name="keywords" content="Colorlib Templates">

    <!-- Title Page-->
    <title>SDGs Desa | <?= $title; ?></title>

    <!-- Icons font CSS-->
    <link href="<?= base_url('regform-3'); ?>/vendor/mdi-font/css/material-design-iconic-font.min.css" rel="stylesheet" media="all">
    <link href="<?= base_url('regform-3'); ?>/vendor/font-awesome-4.7/css/font-awesome.min.css" rel="stylesheet" media="all">
    <!-- Font special for pages-->
    <link href="https://fonts.googleapis.com/css?family=Poppins:100,100i,200,200i,300,300i,400,400i,500,500i,600,600i,700,700i,800,800i,900,900i" rel="stylesheet">

    <!-- Vendor CSS-->
    <link href="<?= base_url('regform-3'); ?>/vendor/select2/select2.min.css" rel="stylesheet" media="all">
    <link href="<?= base_url('regform-3'); ?>/vendor/datepicker/daterangepicker.css" rel="stylesheet" media="all">

    <!-- Main CSS-->
    <link href="<?= base_url('regform-3'); ?>/css/main.css" rel="stylesheet" media="all">
</head>

<body>
    <div class="page-wrapper bg-gra-01 p-t-me p-b-100 font-poppins">
        <div class="wrapper wrapper--w780">
            <div class="card card-3">
                <div class="card-heading"></div>
                <div class="card-body">
                    <h2 class="title"><?= $title; ?></h2>
                    <?php if (isset($validation)) : ?>
                        <div class="col-12" style="background-color: darkorange; border-radius: 3px; padding: 5px;">
                            <div class="col">
                                <div class="container">
                                    <?= $validation->listErrors(); ?>
                                </div>
                            </div>
                        </div>
                    <?php endif; ?>
                    <br>
                    <form method="POST" action="register">
                        <div class="input-group">
                            <input class="input--style-3" type="text" placeholder="Nama Depan" name="firstname" value="<?= set_value('firstname'); ?>">
                            <i class="zmdi zmdi-account input-icon"></i>
                        </div>
                        <div class="input-group">
                            <input class="input--style-3" type="text" placeholder="Nama Belakang" name="lastname" value="<?= set_value('lastname'); ?>">
                            <i class="zmdi zmdi-account-o input-icon"></i>
                        </div>
                        <div class="input-group">
                            <input class="input--style-3" type="text" placeholder="NIK" name="nik" minlength="16" maxlength="16" value="<?= set_value('nik'); ?>">
                            <i class="zmdi zmdi-card input-icon fa-1x"></i>
                        </div>
                        <!-- <div class="input-group">
                            <input class="input--style-3 js-datepicker" type="text" placeholder="Birthdate" name="birthday">
                            <i class="zmdi zmdi-calendar-note input-icon js-btn-calendar"></i>
                        </div> -->
                        <div class="input-group">
                            <div class="rs-select2 js-select-simple select--no-search">
                                <select name="desa_id">
                                    <option disabled="disabled" selected="selected">Desa</option>
                                    <?php foreach ($desKels as $row) { ?>
                                        <option value="<?= $row['KodeDesa']; ?>" <?= set_select('desa_id', $row['KodeDesa']); ?>><?= $row['NamaDesa']; ?></option>
                                    <?php } ?>
                                </select>
                                <div class="select-dropdown"></div>
                            </div>
                        </div>
                        <div class="input-group">
                            <input class="input--style-3" type="text" placeholder="Email" name="email" value="<?= set_value('email'); ?>">
                        </div>
                        <div class="input-group">
                            <input class="input--style-3" type="password" placeholder="Password" name="password">
                        </div>
                        <div class="input-group">
                            <input class="input--style-3" type="password" placeholder="Ulangi Password" name="password_confirm">
                        </div>
                        <div class="p-t-10">
                            <button class="btn btn--pill btn--green" type="submit">Submit</button>
                        </div>
                    </form>
                    <div class="p-t-10 mt-10 float-right">
                        <a href="login" class="input--style-3 float-right" style="text-decoration: none;">
                            sudah punya akun?
                        </a>
                    </div>
                </div>
            </div>
        </div>
    </div>

    <!-- Jquery JS-->
    <script src="<?= base_url('regform-3'); ?>/vendor/jquery/jquery.min.js"></script>
    <!-- Vendor JS-->
    <script src="<?= base_url('regform-3'); ?>/vendor/select2/select2.min.js"></script>
    <script src="<?= base_url('regform-3'); ?>/vendor/datepicker/moment.min.js"></script>
    <script src="<?= base_url('regform-3'); ?>/vendor/datepicker/daterangepicker.js"></script>

    <!-- Main JS-->
    <script src="<?= base_url('regform-3'); ?>/js/global.js"></script>

</body><!-- This templates was made by Colorlib (https://colorlib.com) -->

</html>
<!-- end document-->