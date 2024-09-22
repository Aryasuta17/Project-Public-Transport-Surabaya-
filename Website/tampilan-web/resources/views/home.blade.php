<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>Beranda - Transportation Smart Destination</title>
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
            background: url('{{ asset('images/surabaya.jpeg') }}') no-repeat center center fixed;
            background-size: cover;
            color: #333;
        }

        /* Header */
        .header {
            background-color: rgba(0, 0, 0, 0.7); /* Warna gelap dengan transparansi */
            padding: 15px 30px;
            display: flex;
            align-items: center;
            position: fixed;
            width: 100%;
            top: 0;
            left: 0; /* Menambahkan left: 0 untuk memastikan header mulai dari kiri */
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
        nav {
            margin-left: auto; /* Menggeser navigasi ke sisi kanan */
        }
        nav ul {
            list-style: none;
            display: flex;
        }
        nav ul li {
            margin-left: 20px;
        }
        nav ul li a {
            color: #fff;
            text-decoration: none;
            font-weight: 500;
            transition: color 0.3s;
            padding: 8px 12px; /* Menambahkan padding untuk area klik yang lebih besar */
        }
        nav ul li a:hover {
            color: #e74c3c;
        }

        /* Konten */
        .container {
            text-align: center;
            padding: 200px 20px 100px 20px;
        }
        h1 {
            font-size: 54px;
            margin-bottom: 20px;
            color: #fff;
            text-shadow: 2px 2px 5px rgba(0,0,0,0.7);
        }
        p {
            font-size: 24px;
            margin-bottom: 40px; /* Menambahkan margin-bottom untuk memberikan ruang */
            font-weight: bold;
            color: #fff;
            text-shadow: 1px 1px 3px rgba(0,0,0,0.7);
        }
        .auth-links {
            margin-bottom: 30px;
        }
        .auth-links a {
            color: #fff;
            background-color: #e74c3c;
            padding: 12px 25px;
            margin: 0 15px; /* Menambah jarak antar tombol */
            text-decoration: none;
            border-radius: 30px;
            font-size: 18px;
            transition: background-color 0.3s, transform 0.3s;
        }
        .auth-links a:hover {
            background-color: #c0392b;
            transform: translateY(-5px);
        }
        .button {
            display: inline-block;
            margin-top: 30px; /* Menambah jarak antara tombol dan elemen di atasnya */
            background-color: #e74c3c;
            color: #fff;
            padding: 15px 30px;
            text-decoration: none;
            font-size: 20px;
            border-radius: 30px;
            transition: background-color 0.3s, transform 0.3s;
            /* Menambahkan animasi */
            animation: pulse 2s infinite;
        }
        .button:hover {
            background-color: #c0392b;
            transform: translateY(-5px);
        }

        /* Animasi Tombol */
        @keyframes pulse {
            0% {
                box-shadow: 0 0 0 0 rgba(231, 76, 60, 0.7);
            }
            70% {
                box-shadow: 0 0 20px 20px rgba(231, 76, 60, 0);
            }
            100% {
                box-shadow: 0 0 0 0 rgba(231, 76, 60, 0);
            }
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
            .header h2 {
                font-size: 20px;
            }
            nav ul li {
                margin-left: 10px;
            }
            .container {
                padding-top: 150px;
            }
            h1 {
                font-size: 36px;
            }
            p {
                font-size: 18px;
            }
            .auth-links a,
            .button {
                font-size: 16px;
                padding: 12px 20px;
            }
            .auth-links a {
                margin: 0 10px; /* Menyesuaikan jarak pada layar kecil */
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
                <li><a href="{{ route('home') }}">Beranda</a></li>
                <li><a href="{{ route('berita') }}">Berita</a></li>
                <li><a href="{{ route('pilihan.transportasi') }}">Transportasi</a></li>
                <li><a href="{{ route('diskusi') }}">Diskusi</a></li>
                <li><a href="{{ route('contact.us') }}">Kontak Kami</a></li>
                <!-- Tidak menampilkan "Login" dan "Register" di header -->
            </ul>
        </nav>
    </div>

    <!-- Konten -->
    <div class="container">
        <h1>Selamat Datang di Transportation Smart Destination</h1>
        <p>Informasi terbaru seputar transportasi pintar di Surabaya.</p>
        <!-- Link Login dan Register -->
        <div class="auth-links">
            <a href="{{ route('login') }}">Login</a>
            <a href="{{ route('register') }}">Register</a>
        </div>
        <a href="{{ route('pilihan.transportasi') }}" class="button">Mulai Perjalanan</a>
    </div>

    <!-- Footer Bawah -->
    <div class="footer-bottom">
        <p>&copy; 2023 Transportation Smart Destination</p>
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
