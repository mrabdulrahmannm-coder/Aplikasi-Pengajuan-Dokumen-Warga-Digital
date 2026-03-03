<!DOCTYPE html>
<html lang="en">

<head>
	<meta charset="UTF-8">
	<meta name="viewport" content="width=device-width, initial-scale=1.0">
	<title>Login - Aplikasi Pelayanan Surat</title>
	<link href="https://fonts.googleapis.com/css2?family=Poppins:wght@300;400;500;600&display=swap" rel="stylesheet">
	<link rel="stylesheet"
      href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.10.5/font/bootstrap-icons.css">
	<link rel="stylesheet" href="<?= base_url('assets/css/login-modern.css'); ?>">
	<style>
		/* GOOGLE FONT */
		* {
			font-family: 'Poppins', sans-serif;
			margin: 0;
			padding: 0;
			box-sizing: border-box;
		}

		/* Background Gradient */
		.login-background {
			width: 100%;
			height: 100vh;
			background: linear-gradient(135deg, #4ea1ff, #2575fc);
			display: flex;
			justify-content: center;
			align-items: center;
			padding: 20px;
		}

		/* Glassmorphism Card */
		.login-card {
			width: 100%;
			max-width: 420px;
			background: rgba(56, 208, 250, 0.86);
			border-radius: 20px;
			padding: 40px;
			backdrop-filter: blur(18px);
			-webkit-backdrop-filter: blur(18px);
			box-shadow: 0 8px 25px rgba(0, 0, 0, 0.15);
			animation: fadeIn 0.7s ease-out;
		}

		/* Logo & Title */
		.logo-section {
			text-align: center;
			margin-bottom: 25px;
		}

		.logo-section img {
			width: 95px;
			margin-bottom: 10px;
		}

		.logo-section h2 {
			font-weight: 600;
			font-size: 20px;
			color: #ffffff;
			letter-spacing: .5px;
		}

		.logo-section p {
			color: #e7e7e7;
			font-size: 14px;
		}

		/* Input Group */
		.input-group {
			margin-bottom: 20px;
		}

		.input-group label {
			color: white;
			font-size: 14px;
			font-weight: 500;
		}

		.input-group input {
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

		.input-group input::placeholder {
			color: rgba(255, 255, 255, 0.7);
		}

		.input-group input:focus {
			background: rgba(255, 255, 255, 0.50);
			box-shadow: 0 0 0 2px rgba(255, 255, 255, 0.25);
		}

		/* Link */
		.register-link {
			text-align: center;
			margin: 10px 0 20px;
			color: #fff;
		}

		.register-link a {
			color: #ffe9e9;
			font-weight: 600;
			text-decoration: underline;
		}

		/* Buttons */
		.button-row {
			display: flex;
			justify-content: space-between;
			align-items: center;
		}

		.btn {
			padding: 10px 25px;
			border-radius: 10px;
			text-decoration: none;
			font-weight: 600;
			transition: .3s;
			display: inline-block;
		}

		.btn-back {
			background: #ff6b6b;
			color: #fff;
		}

		.btn-back:hover {
			background: #ff4d4d;
		}

		.btn-login {
			background: #4c8fff;
			color: white;
			border: none;
		}

		.btn-login:hover {
			background: #2f74e0;
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

	<div class="login-background">
		<div class="login-card">

			<div class="logo-section">
				<img src="<?= base_url('assets/logo/jpr.png') ?>" alt="Logo">
				<h2>APLIKASI PELAYANAN SURAT</h2>
				<p>KOTA BATAM</p>
			</div>

			<form action="<?= base_url('user-login-proses'); ?>" method="post">

				<div class="input-group">
					<label>Alamat Email:</label>
					<input type="email" name="email" placeholder="Masukkan Alamat Email Anda" required>
				</div>

				<div class="input-group">
					<label>Password:</label>
					<input type="password" name="password" placeholder="Masukkan Password Anda" required>
				</div>

				<div class="register-link">
					Belum punya akun? <a href="<?= base_url('user/register') ?>">Daftar disini</a>
				</div>

				<div class="button-row">
					<a href="<?= base_url('login'); ?>" class="btn btn-back"><i class="bi bi-arrow-left-circle-fill"> Kembali</i></a>
					<button class="btn btn-login">Login <i class="bi bi-box-arrow-in-right"></i></button>
				</div>

			</form>

		</div>
	</div>

</body>

</html>