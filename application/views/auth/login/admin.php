<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Login Administrator</title>

    <!-- Bootstrap Icons -->
    <link rel="stylesheet"
          href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.10.5/font/bootstrap-icons.css">

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
        .login-background {
            width: 100%;
            height: 100vh;
            background: linear-gradient(135deg, #4ea1ff, #2575fc);
            display: flex;
            justify-content: center;
            align-items: center;
            padding: 20px;
        }

        /* Card Glass */
        .login-card {
            width: 100%;
            max-width: 420px;
            background: rgba(56, 208, 250, 0.86);
            border-radius: 20px;
            padding: 40px;
            backdrop-filter: blur(18px);
            -webkit-backdrop-filter: blur(18px);
            box-shadow: 0 8px 25px rgba(0,0,0,0.15);
            animation: fadeIn 0.7s ease-out;
        }

        .logo-section {
            text-align: center;
            margin-bottom: 25px;
        }

        .logo-section img {
            width: 90px;
            margin-bottom: 10px;
        }

        .logo-section h2 {
            color: white;
            font-weight: 600;
            font-size: 18px;
        }

        .logo-section p {
            color: #eee;
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
            padding: 12px 15px 12px 40px;
            border-radius: 10px;
            border: none;
            outline: none;
            margin-top: 5px;
            background: rgba(255,255,255,0.35);
            color: #fff;
            font-size: 14px;
            transition: .3s;
        }

        .form-control::placeholder {
            color: rgba(255,255,255,0.7);
        }

        .form-control:focus {
            background: rgba(255,255,255,0.5);
            box-shadow: 0 0 0 2px rgba(255,255,255,0.25);
        }

        .input-icon {
            position: absolute;
            top: 50%;
            left: 12px;
            transform: translateY(-50%);
            color: white;
            font-size: 18px;
        }

        .text-danger {
            font-size: 12px;
            color: #ffecec;
        }

        /* Buttons */
        .btn {
            padding: 10px 25px;
            border-radius: 10px;
            font-weight: 600;
            transition: .3s;
        }

        .btn-back {
            background: #ff6b6b;
            color: white;
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

        .button-row {
            display: flex;
            justify-content: space-between;
            margin-top: 20px;
        }

        /* Fade Animation */
        @keyframes fadeIn {
            from { opacity: 0; transform: translateY(15px); }
            to   { opacity: 1; transform: translateY(0); }
        }
    </style>

</head>

<body>

<div class="login-background">

    <div class="login-card">

        <div class="logo-section">
            <img src="<?= base_url('assets/logo/jpr.png') ?>" alt="">
            <h2>APLIKASI PELAYANAN SURAT</h2>
            <p>KOTA BATAM</p>
        </div>

        <form action="<?= base_url('administrator-login-proses'); ?>" method="post">

            <div class="form-group" style="position: relative;">
                <label>Alamat Email:</label>
                <input type="email" name="email" class="form-control" placeholder="Masukkan Email">
                <small class="text-danger"><?= form_error('email') ?></small>
            </div>

            <div class="form-group" style="position: relative; margin-top: 15px;">
                <label>Password:</label>
                <input type="password" name="password" class="form-control" placeholder="Masukkan Password">
                <small class="text-danger"><?= form_error('password') ?></small>
            </div>

            <div class="button-row">
                <a href="<?= base_url('login') ?>" class="btn btn-back">
                    <i class="bi bi-arrow-left-circle-fill"></i> Kembali
                </a>

                <button class="btn btn-login">
                    Login <i class="bi bi-box-arrow-in-right"></i>
                </button>
            </div>

        </form>

    </div>

</div>

</body>

</html>
