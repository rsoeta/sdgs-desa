<!DOCTYPE html>
<html lang="en">

<head>
	<meta charset="UTF-8">
	<meta http-equiv="X-UA-Compatible" content="IE=edge">
	<meta name="viewport" content="width=device-width, initial-scale=1.0">
	<meta name="description" content="Aplikasi sederhana pembantu pemutakhiran Data SDGs di Desa Pasirlangu Kecamatan Pakenjeng Kabupaten Garut Provinsi Jawa Barat.">
	<meta name="twitter:description" content="Aplikasi sederhana pembantu pemutakhiran Data SDGs di Desa Pasirlangu Kecamatan Pakenjeng Kabupaten Garut Provinsi Jawa Barat.">
	<meta name="author" content="Rian Sutarsa">

	<title>SDGs | <?= $title; ?></title>

	<link rel="stylesheet" href="<?= base_url(); ?>/logform/style.css">
</head>

<body>
	<div class="login-wrap">
		<div class="login-html">
			<?php if (session()->get('success')) : ?>
				<div class="col-12" style="background-color: darkorange; border-radius: 3px; padding: 10px;">
					<div class="alert alert-success text-success" role="alert">
						<?= session()->get('success'); ?>
					</div>
				</div>
			<?php endif; ?>
			<?php if (session()->get('message')) : ?>
				<div class="col-12" style="background-color: darkorange; border-radius: 3px; padding: 10px;">
					<div class="alert alert-success text-danger" role="alert">
						<?= session()->get('message'); ?>
					</div>
				</div>
			<?php endif; ?>
			<?php if (isset($validation)) : ?>
				<div class="col-12" style="background-color: darkorange; border-radius: 3px; padding: 10px;">
					<div class="col">
						<div class="container">
							<?= $validation->listErrors(); ?>
						</div>
					</div>
				</div>
			<?php endif; ?>
			<input id="tab-1" type="radio" name="tab" class="sign-in" checked><label for="tab-1" class="tab">Sign In</label>
			<input id="tab-2" type="radio" name="tab" class="sign-up"><label for="tab-2" class="tab">Sign Up</label>
			<div class="login-form">
				<form action="login" method="post">
					<div class="sign-in-htm">
						<div class="group">
							<label for="email" class="label">Email</label>
							<input id="email" name="email" type="text" class="input">
						</div>
						<div class="group">
							<label for="password" class="label">Password</label>
							<input id="password" name="password" type="password" class="input" data-type="password">
						</div>
						<div class="group">
							<input id="check" type="checkbox" class="check" checked>
							<label for="check"><span class="icon"></span> Keep me Signed in</label>
						</div>
						<div class="group">
							<input type="submit" class="button" value="Sign In">
						</div>
						<div class="hr"></div>
						<div class="foot-lnk">
							<a href="https://wa.me/6285219784242?text=Mohon%20di%20Aktivasi,%20Saya%20sudah%20registrasi%20dengan%20:%20%0aNIK%20:%20%0aEmail%20:%20%0aAtasnama%20:%20" target="blank">Contact Admin</a>
							&nbsp;
							|
							&nbsp;
							<a href="<?= base_url(); ?>">Back to Home</a>
						</div>
					</div>
				</form>
				<div class="sign-up-htm">
					<form action="register" method="POST">
						<div class="group">
							<label for="firstname" class="label">Nama Depan</label>
							<input id="firstname" name="firstname" type="text" class="input">
						</div>
						<div class="group">
							<label for="lastname" class="label">Nama Belakang</label>
							<input id="lastname" name="lastname" type="text" class="input">
						</div>
						<div class="group">
							<label for="nik" class="label">NIK</label>
							<input id="nik" name="nik" type="text" class="input">
						</div>
						<div class="group">
							<label for="desa_id" class="label">Nama Desa</label>
							<select name="desa_id" id="desa_id" class="input">
								<option value="2006">Pasirlangu</option>
							</select>
						</div>
						<div class="group">
							<label for="email" class="label">Email Address</label>
							<input id="email" name="email" type="email" class="input" data-type="email">
						</div>
						<div class="group">
							<label for="password" class="label">Password</label>
							<input id="password" name="password" type="password" class="input" data-type="password">
						</div>
						<div class="group">
							<label for="password_confirm" class="label">Ulangi Password</label>
							<input id="password_confirm" name="password_confirm" type="password" class="input" data-type="password">
						</div>
						<div class="group">
							<input type="submit" class="button" value="Sign Up">
						</div>
					</form>
					<div class="hr"></div>
					<div class="foot-lnk">
						<label for="tab-1">Already Member?</a>
					</div>
				</div>
			</div>
		</div>
	</div>
</body>

</html>