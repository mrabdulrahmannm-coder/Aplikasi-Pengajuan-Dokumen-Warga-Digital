<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Aplikasi Pelayanan Surat – Kota Batam</title>

    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet">

    <style>

        body {
            margin: 0;
            padding: 0;
            height: 100vh;
            background: radial-gradient(circle at top left, #0A84FF, #001F4D);
            display: flex;
            justify-content: center;
            align-items: center;
            overflow: hidden;
            font-family: "Poppins", sans-serif;
        }

        /* Floating glowing circles */
        .floating-circle {
            position: absolute;
            border-radius: 50%;
            filter: blur(40px);
            opacity: 0.5;
            animation: float 10s infinite ease-in-out;
        }

        .c1 { width: 220px; height: 220px; background: #0AFFD4; top: 5%; left: 10%; }
        .c2 { width: 300px; height: 300px; background: #FF7B00; bottom: 8%; right: 12%; animation-delay: 2s; }
        .c3 { width: 180px; height: 180px; background: #007BFF; bottom: 20%; left: 20%; animation-delay: 4s; }

        @keyframes float {
            0% { transform: translateY(0px); }
            50% { transform: translateY(-40px); }
            100% { transform: translateY(0px); }
        }

        /* Glass card */
        .neo-card {
            background: rgba(255, 255, 255, 0.14);
            backdrop-filter: blur(18px);
            -webkit-backdrop-filter: blur(18px);
            border-radius: 25px;
            padding: 50px 40px;
            width: 450px;
            box-shadow: 
                0 10px 40px rgba(0,0,0,0.4),
                inset 0 0 20px rgba(255,255,255,0.2);
            z-index: 5;
            text-align: center;
        }

        .neo-title {
            font-size: 20px;
            font-weight: 700;
            letter-spacing: 1px;
            color: white;
        }

        h6 {
            font-weight: 600;
            color: #E3E3E3;
        }

        .btn-modern {
            width: 100%;
            padding: 14px;
            border-radius: 14px;
            font-weight: 600;
            font-size: 16px;
            border: none;
            transition: 0.2s;
            box-shadow: 0 6px 20px rgba(0,0,0,0.2);
        }

        .btn-warga {
            background: linear-gradient(135deg, #2DFF88, #0BC069);
            color: #000;
        }

        .btn-admin {
            background: linear-gradient(135deg, #FFC453, #FF8C00);
            color: #000;
        }

        .btn-modern:hover {
            transform: translateY(-3px);
            box-shadow: 0 10px 30px rgba(0,0,0,0.3);
        }

    </style>

</head>
<body>

    <!-- Floating glowing items -->
    <div class="floating-circle c1"></div>
    <div class="floating-circle c2"></div>
    <div class="floating-circle c3"></div>

    <!-- Main Card -->
    <div class="neo-card">

        <img src="<?= base_url() ?>assets/logo/jpr.png" height="85" class="mb-3">

        <div class="neo-title">APLIKASI PELAYANAN SURAT</div>
        <h6>KOTA BATAM</h6>

        <p class="text-white fw-semibold mt-3">Silahkan Login</p>

        <div class="d-grid gap-3 mt-4">
            <a href="<?= base_url('user/login') ?>" class="btn-modern btn-warga">
                Login Warga
            </a>

            <a href="<?= base_url('administrator/login') ?>" class="btn-modern btn-admin">
                Login Administrator & Petugas
            </a>
        </div>

    </div>

</body>
</html>
