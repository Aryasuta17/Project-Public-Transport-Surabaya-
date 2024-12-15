<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Konfirmasi Transaksi</title>
    <style>
        @import url('https://fonts.googleapis.com/css2?family=Poppins:wght@400;600;700&display=swap');

        body {
            font-family: 'Poppins', sans-serif;
            background-color: #f5f5f5;
            color: #333;
            min-height: 100vh;
            display: flex;
            flex-direction: column;
        }

        .navbar {
            background-color: #2c3e50;
            padding: 15px 30px;
            display: flex;
            justify-content: space-between;
            align-items: center;
            box-shadow: 0 2px 10px rgba(0,0,0,0.1);
        }

        .logo img {
            height: 50px;
        }

        .navbar-title {
            color: #ecf0f1;
            font-size: 24px;
            font-weight: bold;
        }

        .nav-links {
            display: flex;
        }

        .nav-links a {
            color: #ecf0f1;
            text-decoration: none;
            padding: 10px 15px;
            font-size: 16px;
            transition: all 0.3s ease;
            border-radius: 5px;
        }

        .nav-links a:hover {
            background-color: #34495e;
            transform: translateY(-2px);
        }

        .container {
            margin-top: 50px;
            padding: 20px;
        }

        h1 {
            font-size: 36px;
            margin-bottom: 30px;
            text-align: center;
        }

        .transaction-details {
            background-color: #fff;
            border-radius: 8px;
            padding: 20px;
            box-shadow: 0 4px 8px rgba(0, 0, 0, 0.1);
            margin-bottom: 20px;
        }

        .transaction-details p {
            font-size: 18px;
            margin: 10px 0;
        }

        .btn {
            display: inline-block;
            padding: 15px 30px;
            background-color: #3498db;
            color: white;
            text-decoration: none;
            font-size: 16px;
            font-weight: bold;
            text-align: center;
            border-radius: 8px;
            transition: all 0.3s ease;
            cursor: pointer;
        }

        .btn:hover {
            background-color: #2980b9;
        }

        footer {
            background-color: #2c3e50;
            color: white;
            text-align: center;
            padding: 20px;
            margin-top: auto;
        }

        footer p {
            margin: 0;
        }

        footer a {
            color: white;
            text-decoration: underline;
        }
    </style>
</head>
<body>
    <!-- Navbar -->
    <div class="navbar">
        <div class="logo">
            <a href="{{ route('welcome') }}">
                <img src="{{ asset('images/logo.png') }}" alt="Transportation Smart Destination">
            </a>
        </div>
        <div class="navbar-title">Konfirmasi Transaksi</div>
        <div class="nav-links">
            <a href="{{ route('user.home') }}">Beranda</a>
            <a href="{{ route('welcome') }}">Logout</a>
        </div>
    </div>

    <div class="container">
        <h1>Konfirmasi Detail Transaksi</h1>
        <div class="transaction-details">
            <p><strong>Titik Awal:</strong> {{ $startPoint->name }}</p>
            <p><strong>Titik Akhir:</strong> {{ $endPoint->name }}</p>
            <p><strong>Harga:</strong> Rp {{ number_format($price, 0, ',', '.') }}</p>
            <p><strong>Jam Keberangkatan:</strong> {{ $departureTime }}</p>
        </div>

        <form action="{{ route('store.transaction') }}" method="POST">
            @csrf
            <input type="hidden" name="user_id" value="{{ auth()->user()->id }}">
            <input type="hidden" name="rute_awal" value="{{ $startPoint->name }}">
            <input type="hidden" name="rute_akhir" value="{{ $endPoint->name }}">
            <input type="hidden" name="jam_keberangkatan" value="{{ $departureTime }}">
            <input type="hidden" name="tanggal" value="{{ now()->format('Y-m-d') }}">

            <button type="submit" class="btn">Konfirmasi dan Simpan</button>
        </form>
    </div>

    <!-- Footer -->
    <footer>
        <p>&copy; 2024 Transportation Smart Destination. All rights reserved.</p>
    </footer>
</body>
</html>
