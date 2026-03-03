<!DOCTYPE html>
<html lang="en">

<head>
	<meta charset="UTF-8">
	<meta name="viewport" content="width=device-width, initial-scale=1.0">
	<title>Register - Aplikasi Pelayanan Surat</title>

	<!-- Bootstrap Icons -->
	<link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.10.5/font/bootstrap-icons.css">

	<!-- Google Font -->
	<link href="https://fonts.googleapis.com/css2?family=Poppins:wght@300;400;500;600&display=swap" rel="stylesheet">

	<style>
		* {
			font-family: 'Poppins', sans-serif;
			margin: 0;
			padding: 0;
			box-sizing: border-box;
		}

		/* Background */
		.register-background {
			width: 100%;
			height: 100vh;
			background: linear-gradient(135deg, #4ea1ff, #2575fc);
			display: flex;
			justify-content: center;
			align-items: center;
			padding: 20px;
		}

		/* Card Glassmorphism */
		.register-card {
			width: 100%;
			max-width: 520px;
			background: rgba(56, 208, 250, 0.86);
			border-radius: 20px;
			padding: 35px;
			backdrop-filter: blur(18px);
			-webkit-backdrop-filter: blur(18px);
			box-shadow: 0 8px 25px rgba(0, 0, 0, 0.15);
			animation: fadeIn 0.7s ease-out;
		}

		/* Logo */
		.logo-section {
			text-align: center;
			margin-bottom: 20px;
		}

		.logo-section img {
			width: 95px;
			margin-bottom: 10px;
		}

		.logo-section h2 {
			font-weight: 600;
			font-size: 20px;
			color: #ffffff;
		}

		.logo-section p {
			color: #e7e7e7;
			font-size: 14px;
		}

		/* Input */
		.form-group label {
			color: white;
			font-size: 14px;
			font-weight: 500;
		}

		.form-control {
			width: 100%;
			padding: 12px 15px;
			border-radius: 10px;
			border: none;
			outline: none;
			margin-top: 5px;
			background: rgba(255, 255, 255, 0.35);
			color: #fff;
			font-size: 14px;
			transition: .3s;
		}

		.form-control::placeholder {
			color: rgba(255, 255, 255, 0.7);
		}

		.form-control:focus {
			background: rgba(255, 255, 255, 0.50);
			box-shadow: 0 0 0 2px rgba(255, 255, 255, 0.25);
		}

		/* Error text */
		.text-danger {
			font-size: 12px;
			color: #ffecec;
		}

		/* Link */
		.login-link {
			text-align: center;
			margin: 10px 0 20px;
			color: #fff;
		}

		.login-link a {
			color: #ffe9e9;
			font-weight: 600;
			text-decoration: underline;
		}

		/* Buttons */
		.btn {
			padding: 10px 25px;
			border-radius: 10px;
			text-decoration: none;
			font-weight: 600;
			transition: .3s;
		}

		.btn-back {
			background: #ff6b6b;
			color: #fff;
		}

		.btn-back:hover {
			background: #ff4d4d;
		}

		.btn-submit {
			background: #4c8fff;
			color: #fff;
			border: none;
		}

		.btn-submit:hover {
			background: #2f74e0;
		}

		.button-row {
			display: flex;
			justify-content: space-between;
			margin-top: 10px;
		}

		/* Animation */
		@keyframes fadeIn {
			from {
				opacity: 0;
				transform: translateY(15px);
			}

			to {
				opacity: 1;
				transform: translateY(0);
			}
		}
	</style>
</head>

<body>

	<div class="register-background">
		<div class="register-card">

			<div class="logo-section">
				<img src="<?= base_url('assets/logo/jpr.png') ?>" alt="Logo">
				<h2>APLIKASI PELAYANAN SURAT</h2>
				<p>KOTA BATAM</p>
			</div>

			<form action="<?= base_url('user-register-proses') ?>" method="post" enctype="multipart/form-data">

				<div class="row" style="display: flex; gap: 20px;">

					<!-- LEFT COLUMN -->
					<div style="flex: 1;">

						<div class="form-group">
							<label>NIK :</label>
							<input type="number" name="nik" value="<?= set_value('nik') ?>" class="form-control"
								placeholder="Masukkan NIK">
							<small class="text-danger"><?= form_error('nik') ?></small>
						</div>

						<div class="form-group">
							<label>Password :</label>
							<input type="password" name="password" class="form-control" placeholder="Masukkan Password">
							<small class="text-danger"><?= form_error('password') ?></small>
						</div>

					</div>

					<!-- RIGHT COLUMN -->
					<div style="flex: 1;">

						<div class="form-group">
							<label>Alamat Email :</label>
							<input type="email" name="email" value="<?= set_value('email') ?>" class="form-control"
								placeholder="Masukkan Email">
							<small class="text-danger"><?= form_error('email') ?></small>
						</div>

						<div class="form-group">
							<label>Konfirmasi Password :</label>
							<input type="password" name="konfirmasi_password" class="form-control"
								placeholder="Konfirmasi Password">
							<small class="text-danger"><?= form_error('konfirmasi_password') ?></small>
						</div>

					</div>
					<div>
						<small class="text-danger">*Sebelum registrasi, pastikan NIK Anda sudah terdaftar oleh admin.
							Jika belum, silakan hubungi admin untuk pendaftaran NIK.</small>
					</div>

				</div>

				<div class="login-link">
					Sudah punya akun? <a href="<?= base_url('user/login') ?>">Login disini</a>
				</div>

				<div class="button-row">
					<a href="<?= base_url('login') ?>" class="btn btn-back">
						<i class="bi bi-arrow-left-circle-fill"></i> Kembali
					</a>

					<button class="btn btn-submit">
						<i class="bi bi-check-circle-fill"></i> Submit
					</button>
				</div>

			</form>

		</div>
	</div>

</body>

</html>