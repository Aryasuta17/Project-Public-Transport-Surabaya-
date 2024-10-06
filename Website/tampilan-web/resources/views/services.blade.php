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
            background-color: #333;
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
            color: white;
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
            color: white;
            text-decoration: none;
            font-weight: bold;
            padding: 8px 16px;
            transition: background-color 0.3s;
        }

        nav ul li a:hover {
            background-color: #ff6347;
            border-radius: 5px;
        }

        .btn-login {
            background-color: #ff6347;
            padding: 8px 16px;
            border-radius: 5px;
            transition: background-color 0.3s;
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

        .service-card a:hover {
            background-color: #ff4500;
        }

        /* Footer Styling */
        footer {
            background-color: #333;
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
                <!-- Judul Transportation Smart Destination di Navbar -->
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
                <h2>Service 1</h2>
                <p>Description of Service 1.</p>
                <a href="#">Learn More</a>
            </div>
            <div class="service-card">
                <h2>Service 2</h2>
                <p>Description of Service 2.</p>
                <a href="#">Learn More</a>
            </div>
            <div class="service-card">
                <h2>Service 3</h2>
                <p>Description of Service 3.</p>
                <a href="#">Learn More</a>
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