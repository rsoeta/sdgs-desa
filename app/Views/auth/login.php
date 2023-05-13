<!DOCTYPE html>
<html lang="id">

<head>
	<meta charset="UTF-8">
	<meta name="viewport" content="width=device-width, initial-scale=1">
	<!-- <meta name="description" content="Aplikasi sederhana pembantu pemutakhiran Data SDGs di Desa Pasirlangu Kecamatan Pakenjeng Kabupaten Garut Provinsi Jawa Barat.">
	<meta name="twitter:description" content="Aplikasi sederhana pembantu pemutakhiran Data SDGs di Desa Pasirlangu Kecamatan Pakenjeng Kabupaten Garut Provinsi Jawa Barat."> -->
	<!-- <meta name="author" content="Rian Sutarsa"> -->

	<title>SDGs | <?= $title; ?></title>

	<!--===============================================================================================-->
	<link rel="icon" type="image/png" href="<?= base_url(); ?>/login/images/icons/favicon.ico" />
	<!--===============================================================================================-->
	<link rel="stylesheet" type="text/css" href="<?= base_url(); ?>/login/vendor/bootstrap/css/bootstrap.min.css">
	<!--===============================================================================================-->
	<link rel="stylesheet" type="text/css" href="<?= base_url(); ?>/login/fonts/font-awesome-4.7.0/css/font-awesome.min.css">
	<!--===============================================================================================-->
	<link rel="stylesheet" type="text/css" href="<?= base_url(); ?>/login/fonts/iconic/css/material-design-iconic-font.min.css">
	<!--===============================================================================================-->
	<link rel="stylesheet" type="text/css" href="<?= base_url(); ?>/login/vendor/animate/animate.css">
	<!--===============================================================================================-->
	<link rel="stylesheet" type="text/css" href="<?= base_url(); ?>/login/vendor/css-hamburgers/hamburgers.min.css">
	<!--===============================================================================================-->
	<link rel="stylesheet" type="text/css" href="<?= base_url(); ?>/login/vendor/animsition/css/animsition.min.css">
	<!--===============================================================================================-->
	<link rel="stylesheet" type="text/css" href="<?= base_url(); ?>/login/vendor/select2/select2.min.css">
	<!--===============================================================================================-->
	<link rel="stylesheet" type="text/css" href="<?= base_url(); ?>/login/vendor/daterangepicker/daterangepicker.css">
	<!--===============================================================================================-->
	<link rel="stylesheet" type="text/css" href="<?= base_url(); ?>/login/css/util.css">
	<link rel="stylesheet" type="text/css" href="<?= base_url(); ?>/login/css/main.css">
	<!--===============================================================================================-->
</head>

<body>

	<div class="limiter">
		<div class="container-login100" style="background-image: url('<?= base_url(); ?>/login/images/bg-01.jpg');">
			<div class="wrap-login100">
				<form class="login100-form" action="login" method="POST">
					<span class="login100-form-logo">
						<a href="<?= base_url(); ?>">
							<img src="<?= base_url('sdgs-garut.png'); ?>" alt="" style="width: 100%;">
						</a>
					</span>

					<span class="login100-form-title p-b-34 p-t-27">
						<?= $title; ?>
					</span>
					<?php if (session()->get('success')) : ?>
						<div class="alert alert-success text-center" role="alert">
							<?= session()->get('success'); ?>
						</div>
					<?php endif; ?>
					<?php if (session()->get('message')) : ?>
						<div class="alert alert-warning text-center" role="alert">
							<?= session()->get('message'); ?>
						</div>
					<?php endif; ?>
					<div class="wrap-input100 validate-input" data-validate="Enter NIK">
						<input class="input100" type="text" name="nik" placeholder="NIK">
						<span class="focus-input100" data-placeholder="&#xf207;"></span>
					</div>

					<div class="wrap-input100 validate-input" data-validate="Enter password">
						<input class="input100" type="password" name="password" placeholder="Password">
						<span class="focus-input100" data-placeholder="&#xf191;"></span>
					</div>

					<div class="contact100-form-checkbox">
						<input class="input-checkbox100" id="ckb1" type="checkbox" name="remember-me">
						<label class="label-checkbox100" for="ckb1">
							Remember me
						</label>
					</div>

					<div class="container-login100-form-btn">
						<button class="login100-form-btn">
							Login
						</button>
					</div>

					<div class="text-center p-t-90">
						<!-- <a class="txt1" href="https://wa.me/6285219784242?text=Saya%20lupa%20password.%20Tolong%20reset-ulang%20pendaftaran%20saya!">
							Forgot Password?
						</a> -->
						<!-- &nbsp;
						|
						&nbsp; -->
						<a class="txt1" href="register">
							Registration
						</a>
						&nbsp;
						|
						&nbsp;
						<a class="txt1" href="https://wa.me/6285219784242?text=Saya%sudah%20registrasi.%20Mohon%20di%20Aktivasi">
							Contact Admin
						</a>
					</div>
				</form>
			</div>
		</div>
	</div>


	<div id="dropDownSelect1"></div>

	<!--===============================================================================================-->
	<script src="<?= base_url(); ?>/login/vendor/jquery/jquery-3.2.1.min.js"></script>
	<!--===============================================================================================-->
	<script src="<?= base_url(); ?>/login/vendor/animsition/js/animsition.min.js"></script>
	<!--===============================================================================================-->
	<script src="<?= base_url(); ?>/login/vendor/bootstrap/js/popper.js"></script>
	<script src="<?= base_url(); ?>/login/vendor/bootstrap/js/bootstrap.min.js"></script>
	<!--===============================================================================================-->
	<script src="<?= base_url(); ?>/login/vendor/select2/select2.min.js"></script>
	<!--===============================================================================================-->
	<script src="<?= base_url(); ?>/login/vendor/daterangepicker/moment.min.js"></script>
	<script src="<?= base_url(); ?>/login/vendor/daterangepicker/daterangepicker.js"></script>
	<!--===============================================================================================-->
	<script src="<?= base_url(); ?>/login/vendor/countdowntime/countdowntime.js"></script>
	<!--===============================================================================================-->
	<script src="<?= base_url(); ?>/login/js/main.js"></script>

</body>

</html>