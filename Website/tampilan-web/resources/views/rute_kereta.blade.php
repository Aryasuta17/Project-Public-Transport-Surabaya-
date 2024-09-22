<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>Rute Kereta - Transportation Smart Destination</title>
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
            padding: 150px 20px;
            text-align: center;
        }
        h1 {
            font-size: 36px;
            margin-bottom: 40px;
            text-shadow: 2px 2px 5px rgba(0,0,0,0.7);
        }
        .rute-list {
            list-style: none;
            padding: 0;
            margin: 0 auto;
            max-width: 800px;
        }
        .rute-list li {
            background-color: rgba(0, 0, 0, 0.7);
            margin-bottom: 20px;
            padding: 20px;
            border-radius: 10px;
        }
        .rute-list li a {
            text-decoration: none;
            color: #e74c3c;
            font-weight: bold;
            font-size: 20px;
        }
        .rute-list li a:hover {
            text-decoration: underline;
        }
        .rute-list li p {
            margin: 10px 0 0 0;
            color: #fff;
            line-height: 1.6;
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
            .rute-list li {
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
            </ul>
        </nav>
    </div>

    <!-- Konten -->
    <div class="container">
        <h1>Rute Kereta</h1>
        <ul class="rute-list">
            <!-- Contoh rute kereta dengan stasiun-stasiun -->
            @foreach ([
                ['id' => 1, 'nama' => 'Rute Kereta 1', 'stasiun' => ['Stasiun Gubeng', 'Stasiun Pasar Turi', 'Stasiun Wonokromo']],
                ['id' => 2, 'nama' => 'Rute Kereta 2', 'stasiun' => ['Stasiun Gubeng', 'Stasiun Waru', 'Stasiun Sidoarjo']],
                // Tambahkan rute kereta lainnya jika diperlukan
            ] as $rute)
                <li>
                    <a href="{{ route('detail.rute.kereta', ['id' => $rute['id']]) }}">{{ $rute['nama'] }}</a>
                    <p>Stasiun: {{ implode(' - ', $rute['stasiun']) }}</p>
                </li>
            @endforeach
        </ul>
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
