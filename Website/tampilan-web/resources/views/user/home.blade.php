<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Pilihan Mode Transportasi - Transportation Smart Destination</title>
    <style>
        /* Import Google Fonts */
        @import url('https://fonts.googleapis.com/css2?family=Roboto:wght@300;400;700&display=swap');

        /* Reset CSS */
        * {
            margin: 0;
            padding: 0;
            box-sizing: border-box;
        }

        /* Gaya Umum */
        body {
            font-family: 'Roboto', sans-serif;
            background: url('{{ asset('images/background.jpg') }}') no-repeat center center fixed;
            background-size: cover;
            color: #fff;
            min-height: 100vh;
        }

        /* Header */
        .header {
            background-color: rgba(0, 0, 0, 0.7);
            padding: 15px 30px;
            display: flex;
            align-items: center;
            justify-content: space-between;
            position: fixed;
            width: 100%;
            top: 0;
            left: 0;
            z-index: 1000;
        }

        .header .logo {
            display: flex;
            align-items: center;
        }

        .header .logo img {
            height: 50px;
            margin-right: 15px;
        }

        .header h2 {
            color: #fff;
            margin: 0;
            font-weight: 700;
            font-size: 24px;
        }

        /* Navigasi */
        nav ul {
            list-style: none;
            display: flex;
            gap: 20px;
        }

        nav ul li a {
            color: #fff;
            text-decoration: none;
            font-weight: 500;
            transition: color 0.3s;
            padding: 8px 12px;
        }

        nav ul li a:hover {
            color: #e74c3c;
        }

        /* Konten */
        .container {
            text-align: center;
            padding: 150px 20px;
        }

        h1 {
            font-size: 36px;
            margin-bottom: 40px;
            text-shadow: 2px 2px 5px rgba(0,0,0,0.7);
        }

        /* Tombol Mulai Perjalanan */
        .start-journey {
            margin-top: 50px;
        }

        .start-journey a {
            display: inline-block;
            background-color: #e74c3c;
            color: #fff;
            padding: 15px 30px;
            text-decoration: none;
            border-radius: 30px;
            font-size: 18px;
            transition: background-color 0.3s, transform 0.3s;
        }

        .start-journey a:hover {
            background-color: #c0392b;
            transform: translateY(-5px);
        }

        /* Footer */
        .footer-bottom {
            background-color: rgba(0, 0, 0, 0.7);
            color: #fff;
            text-align: center;
            padding: 20px;
            position: fixed;
            bottom: 0;
            width: 100%;
        }

        .footer-bottom p {
            margin: 0;
            font-size: 14px;
        }

        .social-icons {
            margin-top: 10px;
        }

        .social-icons a {
            color: #fff;
            margin: 0 10px;
            text-decoration: none;
            font-size: 18px;
            transition: color 0.3s;
        }

        .social-icons a:hover {
            color: #e74c3c;
        }

        /* Responsive */
        @media (max-width: 768px) {
            .start-journey {
                margin-top: 30px;
            }
        }

    </style>
</head>
<body>

    <!-- Header -->
    <div class="header">
        <div class="logo">
            <img src="{{ asset('images/logo.png') }}" alt="Logo">
            <h2>Transportation Smart Destination</h2>
        </div>
        <!-- Navigasi -->
        <nav>
            <ul>
                <li><a href="{{ route('user.home') }}">Beranda</a></li>
                <li><a href="{{ route('user.home') }}">Berita</a></li>
                <li><a href="{{ route('cari-rute') }}">Transportasi</a></li>
                <li><a href="{{ route('user.home') }}">Diskusi</a></li>
                <li><a href="{{ route('user.home') }}">Kontak Kami</a></li>
                <li><a href="{{ route('user.home') }}" class="btn-logout">Logout</a></li> <!-- Tombol Logout -->
            </ul>
        </nav>
    </div>

    <!-- Konten -->
    <div class="container">
        <h1>Selamat Anda Telah Berhasil Login Kedalam Transportation Smart Destination</h1>
        <div class="start-journey">
            <a href="{{ route('cari-rute') }}">Mulai Perjalanan</a>
        </div>
    </div>

    <!-- Footer Bawah -->
    <div class="footer-bottom">
        <p>&copy; 2024 Transportation Smart Destination</p>
        <div class="social-icons">
            <a href="#"><i class="fab fa-facebook-f"></i></a>
            <a href="#"><i class="fab fa-twitter"></i></a>
            <a href="#"><i class="fab fa-instagram"></i></a>
        </div>
    </div>

    <!-- Tambahkan Font Awesome untuk ikon media sosial -->
    <script src="https://kit.fontawesome.com/a076d05399.js" crossorigin="anonymous"></script>

</body>
</html>
