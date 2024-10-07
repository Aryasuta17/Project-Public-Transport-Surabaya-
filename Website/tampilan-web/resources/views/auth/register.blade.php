<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Registrasi - Transportation Smart Destination</title>
    <style>
        * {
            margin: 0;
            padding: 0;
            box-sizing: border-box;
        }

        body {
            font-family: Arial, sans-serif;
            background-color: #f4f4f4;
            display: flex;
            flex-direction: column;
            height: 100vh;
        }

        /* Navbar Styling */
        nav {
            background-color: #333;
            padding: 10px 0; /* Sesuaikan padding atas dan bawah */
            box-shadow: 0 2px 5px rgba(0, 0, 0, 0.2);
            width: 100%; /* Pastikan navbar melebar penuh */
        }

        .container {
            display: flex;
            justify-content: space-between;
            align-items: center;
            max-width: 1200px; /* Lebar maksimum untuk mengatur jarak item */
            margin: 0 auto;
            padding: 0 20px; /* Tambahkan padding untuk jarak dari tepi */
            width: 100%;
        }

        nav .logo img {
            height: 50px;
            margin-right: 20px;
        }

        .navbar-title {
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

        /* Registration Container Styling */
        .register-container {
            flex: 1;
            display: flex;
            justify-content: center;
            align-items: center;
        }

        .register-box {
            background-color: white;
            padding: 50px;
            border-radius: 10px;
            box-shadow: 0px 0px 30px rgba(0, 0, 0, 0.2);
            width: 400px;
            text-align: center;
            transition: all 0.3s ease;
        }

        .register-box:hover {
            transform: translateY(-5px);
            box-shadow: 0px 0px 40px rgba(0, 0, 0, 0.25);
        }

        .register-box h2 {
            margin-bottom: 30px;
            font-size: 1.8em;
            color: #333;
        }

        .form-group {
            margin-bottom: 20px;
            text-align: left;
        }

        .form-group label {
            display: block;
            margin-bottom: 5px;
            font-weight: bold;
        }

        .form-group input {
            width: 100%;
            padding: 12px;
            border: 1px solid #ccc;
            border-radius: 5px;
            font-size: 1em;
        }

        .btn-submit {
            background-color: #ff6347;
            color: white;
            border: none;
            padding: 12px;
            border-radius: 5px;
            cursor: pointer;
            transition: background-color 0.3s;
            width: 100%;
            font-size: 1.1em;
        }

        .btn-submit:hover {
            background-color: #ff4500;
        }

        footer {
            background-color: #333;
            color: white;
            text-align: center;
            padding: 20px;
            margin-top: 20px;
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
            </ul>
        </div>
    </nav>

    <!-- Registration Section -->
    <div class="register-container">
        <div class="register-box">
            <h2>Registrasi Pengguna Baru</h2>

            <!-- Display validation errors -->
            @if ($errors->any())
                <div class="error-message">
                    <ul>
                        @foreach ($errors->all() as $error)
                            <li>{{ $error }}</li>
                        @endforeach
                    </ul>
                </div>
            @endif

            <form action="{{ route('register') }}" method="POST">
                @csrf
                <div class="form-group">
                    <label for="name">Nama:</label>
                    <input type="text" id="name" name="name" value="{{ old('name') }}" required>
                </div>

                <div class="form-group">
                    <label for="email">Email:</label>
                    <input type="email" id="email" name="email" value="{{ old('email') }}" required>
                </div>

                <div class="form-group">
                    <label for="password">Password:</label>
                    <input type="password" id="password" name="password" required>
                </div>

                <div class="form-group">
                    <label for="password_confirmation">Konfirmasi Password:</label>
                    <input type="password" id="password_confirmation" name="password_confirmation" required>
                </div>

                <button type="submit" class="btn-submit">Daftar</button>
            </form>

            <p>Sudah punya akun? <a href="{{ route('login') }}">Masuk</a></p>
        </div>
    </div>

    <!-- Footer -->
    <footer>
        <p>&copy; 2024 Transportation Smart Destination. All rights reserved.</p>
    </footer>
</body>
</html>
