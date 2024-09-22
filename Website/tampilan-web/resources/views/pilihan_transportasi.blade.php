<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>Pilihan Transportasi - Transportation Smart Destination</title>
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
            padding: 150px 20px;
        }
        h1 {
            font-size: 36px;
            margin-bottom: 40px;
            text-shadow: 2px 2px 5px rgba(0,0,0,0.7);
        }
        .transport-options {
            display: flex;
            justify-content: center;
            gap: 50px;
        }
        .option {
            width: 200px;
            text-align: center;
        }
        .option img {
            width: 100%;
            border-radius: 10px;
        }
        .option a {
            display: block;
            margin-top: 15px;
            background-color: #e74c3c;
            color: #fff;
            padding: 12px;
            text-decoration: none;
            border-radius: 30px;
            transition: background-color 0.3s, transform 0.3s;
        }
        .option a:hover {
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
            .transport-options {
                flex-direction: column;
                align-items: center;
            }
            .option {
                margin-bottom: 30px;
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
            </ul>
        </nav>
    </div>

    <!-- Konten -->
    <div class="container">
        <h1>Pilih Transportasi</h1>
        <div class="transport-options">
            <div class="option">
                <img src="{{ asset('images/bus.jpg') }}" alt="Bus">
                <a href="{{ route('rute.bus') }}">Bus</a>
            </div>
            <div class="option">
                <img src="{{ asset('images/kereta.jpg') }}" alt="Kereta">
                <a href="{{ route('rute.kereta') }}">Kereta</a>
            </div>
        </div>
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
