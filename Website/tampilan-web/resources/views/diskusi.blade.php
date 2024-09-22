<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>Diskusi - Transportation Smart Destination</title>
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
            background-color: rgba(0, 0, 0, 0.7);
            padding: 15px 30px;
            display: flex;
            align-items: center;
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
        nav {
            margin-left: auto;
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
            padding: 8px 12px;
        }
        nav ul li a:hover {
            color: #e74c3c;
        }

        /* Konten */
        .container {
            padding: 100px 20px;
        }
        h1 {
            text-align: center;
            margin-bottom: 40px;
            font-size: 36px;
            text-shadow: 2px 2px 5px rgba(0,0,0,0.7);
        }
        .diskusi-item {
            background-color: rgba(0, 0, 0, 0.7);
            margin-bottom: 30px;
            padding: 20px;
            border-radius: 10px;
        }
        .diskusi-item h2 {
            margin-top: 0;
            color: #e74c3c;
        }
        .diskusi-item p {
            line-height: 1.6;
            color: #fff;
        }
        .button {
            display: block;
            width: 200px;
            margin: 0 auto;
            text-align: center;
            background-color: #e74c3c;
            color: #fff;
            padding: 15px;
            text-decoration: none;
            border-radius: 30px;
            margin-top: 30px;
            transition: background-color 0.3s, transform 0.3s;
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
            h1 {
                font-size: 28px;
            }
            .diskusi-item {
                padding: 15px;
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
                <!-- Menampilkan "Login" dan "Register" jika diperlukan -->
            </ul>
        </nav>
    </div>

    <!-- Konten -->
    <div class="container">
        <h1>Forum Diskusi</h1>
        <!-- Contoh statis diskusi -->
        <div class="diskusi-item">
            <h2>Bus banyak yang terlambat</h2>
            <p>Kenapasih di surabaya ini bus nya gaada yang ontime telat semua bus nya, kemarin aku mau ngantor bus nya telat. karna itu aku jadi telat ngantor juga</p>
        </div>
        <div class="diskusi-item">
            <h2>Bus bau</h2>
            <p>BUS NYA BAU ANJIR</p>
        </div>
        <!-- Tambahkan lebih banyak diskusi sesuai kebutuhan -->
        <a href="#" class="button">Buat Diskusi Baru</a>
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
