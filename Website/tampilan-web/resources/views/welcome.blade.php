<!-- resources/views/welcome.blade.php -->

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Transportation Smart Destination</title>
    <link rel="stylesheet" href="{{ asset('css/style.css') }}">
    <style>
        body {
            font-family: 'Montserrat', sans-serif;
            margin: 0;
            padding: 0;
            background-color: #f8f9fa;
            color: #333;
        }

        /* Header */
        header {
            background-color: #333;
            color: #fff;
            padding: 20px;
            display: flex;
            justify-content: space-between;
            align-items: center;
            position: sticky;
            top: 0;
            z-index: 1000;
            box-shadow: 0 2px 8px rgba(0, 0, 0, 0.2);
        }

        .logo-container {
            display: flex;
            align-items: center;
        }

        .logo img {
            height: 50px;
        }

        .logo-text {
            margin-left: 15px;
            color: #fff;
        }

        .logo-text h2 {
            margin: 0;
            font-size: 24px;
            font-weight: 700;
        }

        nav ul {
            list-style: none;
            display: flex;
            gap: 20px;
        }

        nav ul li a {
            color: #fff;
            text-decoration: none;
            font-weight: bold;
            padding: 10px 15px;
            transition: background-color 0.3s ease;
            border-radius: 5px;
        }

        nav ul li a:hover {
            background-color: #ff6347;
            color: #fff;
        }

        .btn-login {
            background-color: #ff6347;
            color: white;
            padding: 10px 20px;
            border-radius: 5px;
            text-transform: uppercase;
        }

        .btn-login:hover {
            background-color: #ff4500;
        }

        /* Hero Section */
        .hero-section {
            text-align: center;
            padding: 100px 20px;
            background-color: #e9ecef;
        }

        .hero-section h1 {
            font-size: 48px;
            margin-bottom: 10px;
            color: #333;
        }

        .hero-section p {
            font-size: 18px;
            color: #666;
        }

        /* Info Section */
        .info-section {
            text-align: center;
            padding: 60px 20px;
        }

        .info-section .logo img {
            width: 150px;
        }

        .info-boxes {
            display: flex;
            justify-content: center;
            gap: 40px;
            margin-top: 40px;
        }

        .info-box {
            background-color: #fff;
            padding: 20px;
            border-radius: 8px;
            box-shadow: 0 4px 8px rgba(0, 0, 0, 0.1);
            text-align: center;
            width: 200px;
        }

        .info-box img {
            width: 60px;
            margin-bottom: 20px;
        }

        .info-box h3 {
            font-size: 24px;
            margin-bottom: 10px;
        }

        .info-box p {
            font-size: 16px;
            color: #555;
        }

        /* News Section */
        .news-section {
            padding: 60px 20px;
            background-color: #f8f9fa;
            text-align: center;
        }

        .news-section h2 {
            text-align: center;
            margin-bottom: 40px;
            font-size: 32px;
            color: #333;
        }

        /* Grid layout for news */
        .news-grid {
            display: grid;
            grid-template-columns: repeat(auto-fit, minmax(300px, 1fr));
            gap: 20px;
        }

        .news-card {
            background-color: #fff;
            padding: 20px;
            border-radius: 12px;
            box-shadow: 0 4px 12px rgba(0, 0, 0, 0.1);
            text-align: left;
            transition: all 0.3s ease;
        }

        .news-card:hover {
            transform: translateY(-5px);
            box-shadow: 0 8px 16px rgba(0, 0, 0, 0.2);
        }

        .news-card img {
            width: 100%;
            height: 200px;
            object-fit: cover;
            border-radius: 8px;
        }

        .news-card h3 {
            font-size: 22px;
            margin: 15px 0 10px;
            color: #333;
        }

        .news-card p {
            font-size: 16px;
            color: #666;
        }

        .btn-read-more {
            display: inline-block;
            margin-top: 10px;
            background-color: #333;
            color: white;
            padding: 10px 20px;
            border-radius: 50px;
            text-decoration: none;
            text-transform: uppercase;
            font-weight: bold;
            transition: background-color 0.3s ease, box-shadow 0.3s ease;
        }

        .btn-read-more:hover {
            background-color: #ff6347;
            box-shadow: 0 4px 12px rgba(255, 99, 71, 0.4);
        }

        footer {
            background-color: #333;
            color: #fff;
            padding: 20px;
            text-align: center;
        }
    </style>
</head>
<body>
    <!-- Header -->
    <header>
        <div class="logo-container">
            <div class="logo">
                <img src="{{ asset('images/logo.png') }}" alt="Transportation Smart Destination">
            </div>
            <div class="logo-text">
                <h2>Transportation Smart Destination</h2>
            </div>
        </div>
        <nav>
            <ul>
                <li><a href="{{ route('welcome') }}">Home</a></li>
                <li><a href="#berita">Berita</a></li>
                <li><a href="services">Services</a></li>
                <li><a href="contact">Contact Us</a></li>
                <li><a href="{{ route('login') }}" class="btn-login">Login</a></li>
            </ul>
        </nav>
    </header>

    <!-- Hero Section -->
    <div class="hero-section">
        <h1>Selamat Datang di Transportation Smart Destination</h1>
        <p>Menyediakan solusi transportasi yang cerdas dan terintegrasi.</p>
    </div>

    <!-- Info Section -->
    <div class="info-section">
        <div class="logo">
            <img src="{{ asset('images/tsd-logo.png') }}" alt="Transportation Smart Destination" style="max-width: 100%; height: auto;">
        </div>
        <h2>Apa Itu Transportation Smart Destination?</h2>
        <p>Transportation Smart Destination adalah platform yang memudahkan Anda dalam menemukan layanan transportasi terbaik.</p>
        
        <div class="info-boxes">
            <div class="info-box">
                <img src="{{ asset('images/bus-icon.png') }}" alt="Bus">
                <h3>50 Bus</h3>
                <p>Bus yang tersedia</p>
            </div>
            <div class="info-box">
                <img src="{{ asset('images/train-icon.png') }}" alt="Kereta">
                <h3>20 Kereta</h3>
                <p>Kereta yang siap melayani</p>
            </div>
            <div class="info-box">
                <img src="{{ asset('images/user-icon.png') }}" alt="User">
                <h3>1000 Pengguna</h3>
                <p>Pengguna aktif</p>
            </div>
            <div class="info-box">
                <img src="{{ asset('images/partner-icon.png') }}" alt="Mitra">
                <h3>50 Mitra</h3>
                <p>Mitra kerjasama</p>
            </div>
        </div>
    </div>

    <!-- News Section -->
    <div id="berita" class="news-section">
        <h2>Berita Terkini</h2>

        <!-- Grid for news cards -->
        <div class="news-grid">
            @foreach($news as $berita)
                <div class="news-card">
                    <img src="{{ asset('storage/' . $berita->image) }}" alt="{{ $berita->title }}">
                    <h3>{{ $berita->title }}</h3>
                    <p>{{ Str::limit($berita->content, 100) }}</p>
                    <a href="{{ route('berita.show', $berita->id) }}" class="btn-read-more">Read More</a>
                </div>
            @endforeach
        </div>
    </div>

    <!-- Footer -->
    <footer>
        <p>&copy; 2024 Transportation Smart Destination</p>
    </footer>
</body>
</html>
