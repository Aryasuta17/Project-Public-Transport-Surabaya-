<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Hubungi Kami - Transportation Smart Destination</title>
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
            background-color: #ff6347; /* Red background on hover */
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
            display: flex;
            justify-content: center;
            align-items: center;
            padding: 20px;
        }

        .contact-section {
            background-color: white;
            padding: 30px;
            border-radius: 10px;
            box-shadow: 0px 0px 15px rgba(0, 0, 0, 0.1);
            width: 100%;
            max-width: 600px;
        }

        .contact-section h1 {
            text-align: center;
            margin-bottom: 20px;
        }

        .contact-section p {
            text-align: center;
            margin-bottom: 30px;
            font-size: 1.2em;
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
                <!-- Navbar title -->
                <div class="navbar-title">Transportation Smart Destination</div>
            </div>
            <ul>
                <li><a href="{{ route('welcome') }}">Home</a></li>
                <li><a href="{{ route('services') }}">Services</a></li>
                <li><a href="{{ route('contact') }}">Hubungi Kami</a></li>
                <li><a href="{{ route('login') }}" class="btn-login">Login</a></li>
            </ul>
        </div>
    </nav>

    <!-- Content Section -->
    <div class="content">
        <div class="contact-section">
            <h1>Hubungi Kami</h1>
            <p>Jika Anda memiliki pertanyaan atau butuh bantuan, Anda bisa menghubungi kami melalui:</p>

            <!-- Dummy Contact Information -->
            <p><strong>Telepon:</strong> +123 456 789</p>
            <p><strong>Email:</strong> info@transportation.com</p>
            <p><strong>Instagram:</strong> @transportation_smart</p>
        </div>
    </div>

    <!-- Footer -->
    <footer>
        <p>&copy; 2024 Transportation Smart Destination. All rights reserved.</p>
    </footer>
</body>
</html>
