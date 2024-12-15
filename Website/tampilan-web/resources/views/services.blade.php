<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Our Services - Transportation Smart Destination</title>
    <link rel="stylesheet" href="{{ asset('css/style.css') }}">
    <style>
        * {
            margin: 0;
            padding: 0;
            box-sizing: border-box;
        }

        html, body {
            height: 100%;
            font-family: Arial, sans-serif;
        }

        body {
            display: flex;
            flex-direction: column;
            background-color: #f4f4f4;
        }

        /* Navbar Styling */
        nav {
            background-color: #2c3e50; /* Dark navbar background color */
            padding: 10px 20px;
        }

        nav .container {
            display: flex;
            justify-content: space-between;
            align-items: center;
        }

        nav .logo img {
            height: 50px;
            margin-right: 20px;
        }

        nav .navbar-title {
            color: #ecf0f1; /* Light text color for the title */
            font-size: 24px;
            font-weight: bold;
        }

        nav ul {
            list-style-type: none;
            display: flex;
            margin: 0;
        }

        nav ul li {
            margin-left: 20px;
        }

        nav ul li a {
            color: #ecf0f1; /* Light text color for links */
            text-decoration: none;
            font-weight: bold;
            padding: 8px 16px;
            transition: background-color 0.3s;
        }

        nav ul li a:hover {
            background-color: #34495e; /* Darker hover background */
            border-radius: 5px;
        }

        .btn-login {
            background-color: #ff6347;
            padding: 8px 16px;
            border-radius: 5px;
            transition: background-color 0.3s;
            color: white; /* Text color for login button */
        }

        .btn-login:hover {
            background-color: #ff4500;
        }

        /* Content Styling */
        .content {
            flex: 1;
            padding: 40px 20px;
            text-align: center;
        }

        .content h1 {
            margin-bottom: 30px;
        }

        .services-list {
            display: flex;
            justify-content: center;
            flex-wrap: wrap;
            gap: 20px;
        }

        .service-card {
            background-color: white;
            padding: 20px;
            border-radius: 10px;
            box-shadow: 0px 0px 15px rgba(0, 0, 0, 0.1);
            width: 100%;
            max-width: 300px;
            text-align: center;
        }

        .service-card img {
            max-width: 100%;
            height: auto;
            margin-bottom: 15px; /* Margin between image and title */
            border-radius: 10px; /* Rounded corners for the image */
        }

        .service-card h2 {
            margin-bottom: 15px;
            font-size: 1.5em;
        }

        .service-card p {
            margin-bottom: 20px;
            font-size: 1em;
        }

        .service-card a {
            background-color: #ff6347;
            color: white;
            padding: 10px 20px;
            border-radius: 5px;
            text-decoration: none;
            font-size: 1em;
            display: inline-block;
            transition: background-color 0.3s;
            
        }

        .service-card img {
            width: 100%; /* Pastikan gambar menggunakan lebar penuh dari container */
            max-width: 150px; /* Batas maksimal lebar gambar agar tidak terlalu besar */
            height: auto; /* Sesuaikan tinggi otomatis agar proporsional */
            margin-bottom: 15px;
        }

        .service-card a:hover {
            background-color: #ff4500;
        }

        /* Footer Styling */
        footer {
            background-color: #2c3e50; /* Dark footer background */
            color: white;
            text-align: center;
            padding: 20px;
        }
    </style>
</head>
<body>
    <!-- Navbar -->
    <nav>
        <div class="container">
            <div style="display: flex; align-items: center;">
                <div class="logo">
                    <a href="{{ route('welcome') }}">
                        <img src="{{ asset('images/logo.png') }}" alt="Transportation Smart Destination">
                    </a>
                </div>
                <div class="navbar-title">Transportation Smart Destination</div>
            </div>
            <ul>
                <li><a href="{{ route('welcome') }}">Home</a></li>
                <li><a href="{{ route('services') }}">Services</a></li>
                <li><a href="{{ route('contact') }}">Contact Us</a></li>
                <li><a href="{{ route('login') }}" class="btn-login">Login</a></li>
            </ul>
        </div>
    </nav>

    <!-- Content Section -->
    <div class="content">
        <h1>Our Services</h1>
        <div class="services-list">
            <div class="service-card">
                <img src="{{ asset('images/rute-icon.png') }}" alt="Rute Transportasi Cerdas">
                <h2>48 Halte yang tersebar di seluruh surabaya</h2>
                <p>Terdapat 48 hate yang tersebar dalam 8 rute yang berbeda</p>
            </div>
            <div class="service-card">
                <img src="{{ asset('images/waktu-icon.png') }}" alt="Estimasi Waktu Kedatangan Yang Tepat">
                <h2>Estimasi Waktu Kedatangan</h2>
                <p>Layanan ini memberikan estimasi waktu perjalanan berdasarkan halte yang dipilih pengguna</p>
            </div>
            <div class="service-card">
                <img src="{{ asset('images/driver-icon.png') }}" alt="Pengaturan Jadwal Perjalanan">
                <h2>Driver terlatih</h2>
                <p>Keunggulan kami adalah kami memiliki driver yang terlatih dan dapat dipercaya</p>
            </div>
            <!-- Tambahkan lebih banyak service-card jika diperlukan -->
        </div>
    </div>

    <!-- Footer -->
    <footer>
        <p>&copy; 2024 Transportation Smart Destination. All rights reserved.</p>
    </footer>
</body>
</html>
