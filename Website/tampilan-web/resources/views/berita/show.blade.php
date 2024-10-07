<!-- resources/views/berita/show.blade.php -->

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>{{ $berita->title }} - Transportation Smart Destination</title>
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

        /* Berita Section */
        .berita-section {
            padding: 60px 20px;
            background-color: #f8f9fa;
            max-width: 800px;
            margin: 0 auto;
            text-align: left;
        }

        .berita-section h1 {
            font-size: 36px;
            color: #333;
            margin-bottom: 20px;
        }

        .berita-section img {
            width: 100%;
            height: auto;
            margin-bottom: 20px;
            border-radius: 8px;
        }

        .berita-section p {
            font-size: 18px;
            color: #666;
            line-height: 1.6;
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

    <!-- Berita Section -->
    <div class="berita-section">
        <h1>{{ $berita->title }}</h1>
        <img src="{{ asset('storage/' . $berita->image) }}" alt="{{ $berita->title }}">
        <p>{{ $berita->content }}</p>
    </div>

    <!-- Footer -->
    <footer>
        <p>&copy; 2024 Transportation Smart Destination</p>
    </footer>
</body>
</html>
