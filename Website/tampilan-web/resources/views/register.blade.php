<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>Register - Transportation Smart Destination</title>
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
            color: #333;
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
        /* Menghilangkan "Login" dan "Register" dari header */
        nav ul li a[href="{{ route('login') }}"],
        nav ul li a[href="{{ route('register') }}"] {
            display: none;
        }

        /* Konten */
        .container {
            width: 400px;
            margin: 150px auto;
            background-color: rgba(255, 255, 255, 0.9);
            padding: 30px;
            border-radius: 10px;
        }
        h1 {
            text-align: center;
            margin-bottom: 30px;
            color: #e74c3c;
        }
        label {
            display: block;
            margin-top: 15px;
            font-weight: 500;
            color: #333;
        }
        input[type="text"], input[type="email"], input[type="password"] {
            width: 100%;
            padding: 12px;
            margin-top: 5px;
            border: 1px solid #ccc;
            border-radius: 5px;
            font-size: 16px;
        }
        button {
            width: 100%;
            background-color: #e74c3c;
            color: #fff;
            padding: 15px;
            margin-top: 30px;
            border: none;
            border-radius: 30px;
            font-size: 18px;
            font-weight: 500;
            cursor: pointer;
            transition: background-color 0.3s, transform 0.3s;
            animation: pulse 2s infinite;
        }
        button:hover {
            background-color: #c0392b;
            transform: translateY(-5px);
        }
        p {
            text-align: center;
            margin-top: 20px;
            font-size: 14px;
            color: #fff;
        }
        p a {
            color: #e74c3c;
            text-decoration: none;
            font-weight: 500;
        }
        p a:hover {
            text-decoration: underline;
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
            .header h2 {
                font-size: 20px;
            }
            nav ul li {
                margin-left: 10px;
            }
            .container {
                width: 90%;
                margin-top: 100px;
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
                <!-- Tidak menampilkan "Login" dan "Register" di header -->
            </ul>
        </nav>
    </div>

    <!-- Konten -->
    <div class="container">
        <h1>Daftar Akun Baru</h1>
        <form action="#" method="post">
            @csrf
            <label>Nama:</label>
            <input type="text" name="name" required>
            <label>Email:</label>
            <input type="email" name="email" required>
            <label>Password:</label>
            <input type="password" name="password" required>
            <button type="submit">Daftar</button>
        </form>
        <p>Sudah punya akun? <a href="{{ route('login') }}">Login di sini</a>.</p>
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
