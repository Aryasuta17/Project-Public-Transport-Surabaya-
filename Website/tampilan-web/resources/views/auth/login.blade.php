<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Login - Transportation Smart Destination</title>
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
            padding: 10px 20px;
            box-shadow: 0 2px 5px rgba(0, 0, 0, 0.2);
        }

        .container {
            display: flex;
            justify-content: space-between;
            align-items: center;
            max-width: 1200px;
            margin: 0 auto;
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

        /* Login Container Styling */
        .login-container {
            flex: 1;
            display: flex;
            justify-content: center;
            align-items: center;
        }

        .login-box {
            background-color: white;
            padding: 60px;
            border-radius: 10px;
            box-shadow: 0px 0px 30px rgba(0, 0, 0, 0.2);
            width: 400px;
            text-align: center;
        }

        .login-box h2 {
            margin-bottom: 30px;
            font-size: 1.8em;
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
                <!-- Tombol Register dihilangkan -->
            </ul>
        </div>
    </nav>

    <!-- Login Section -->
    <div class="login-container">
        <div class="login-box">
            <h2>Login</h2>

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

            <form action="{{ route('login') }}" method="POST">
                @csrf
                <div class="form-group">
                    <label for="email">Email:</label>
                    <input type="email" id="email" name="email" required>
                </div>

                <div class="form-group">
                    <label for="password">Password:</label>
                    <input type="password" id="password" name="password" required>
                </div>

                <button type="submit" class="btn-submit">Masuk</button>
            </form>

            <p>Belum punya akun? <a href="{{ route('register') }}">Daftar</a></p>
        </div>
    </div>

    <!-- Footer -->
    <footer style="background-color: #333; color: white; text-align: center; padding: 20px; margin-top: 20px;">
        <p>&copy; 2024 Transportation Smart Destination. All rights reserved.</p>
    </footer>
</body>
</html>