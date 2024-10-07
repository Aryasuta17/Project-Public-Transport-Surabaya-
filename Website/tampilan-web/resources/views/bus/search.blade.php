<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Cari Rute Bus</title>
    <style>
        @import url('https://fonts.googleapis.com/css2?family=Poppins:wght@400;600;700&display=swap');

        /* Reset CSS */
        * {
            margin: 0;
            padding: 0;
            box-sizing: border-box;
        }

        /* Gaya Umum */
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

        .logo-container {
            display: flex;
            align-items: center;
        }

        .logo img {
            height: 50px;
            margin-right: 15px; /* Memberi jarak antara logo dan teks */
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

        .form-group {
            margin-bottom: 20px;
        }

        .form-group select {
            width: 100%;
            padding: 15px;
            font-size: 16px;
            border-radius: 8px;
            border: 1px solid #bdc3c7;
        }

        .form-group button {
            width: 100%;
            padding: 15px;
            background-color: #3498db;
            color: white;
            border: none;
            border-radius: 8px;
            font-size: 16px;
            cursor: pointer;
            transition: all 0.3s ease;
        }

        .form-group button:hover {
            background-color: #2980b9;
        }

        .result-grid {
            margin-top: 40px;
            display: grid;
            grid-template-columns: repeat(auto-fill, minmax(300px, 1fr));
            gap: 20px;
        }

        .card {
            background-color: #fff;
            border-radius: 8px;
            padding: 20px;
            box-shadow: 0 4px 8px rgba(0, 0, 0, 0.1);
        }

        .card-title {
            font-size: 20px;
            font-weight: 700;
            margin-bottom: 10px;
            color: #2c3e50;
        }

        .card-text {
            font-size: 16px;
            color: #7f8c8d;
            margin-bottom: 8px;
        }

        .btn-primary {
            background-color: #3498db;
            color: white;
            padding: 10px 20px;
            border-radius: 8px;
            text-decoration: none;
            transition: all 0.3s ease;
            display: inline-block;
            margin-top: 10px;
        }

        .btn-primary:hover {
            background-color: #2980b9;
        }

        footer {
            background-color: #333;
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
        <div class="logo-container">
            <div class="logo">
                <a href="{{ route('welcome') }}">
                    <img src="{{ asset('images/logo.png') }}" alt="Transportation Smart Destination">
                </a>
            </div>
            <div class="navbar-title">Transportation Smart Destination</div>
        </div>
        <div class="nav-links">
            <a href="{{ route('user.home') }}">Beranda</a>
            <a href="{{ route('welcome') }}">Logout</a>
        </div>
    </div>

    <div class="container">
        <h1>Cari Rute Bus</h1>

        <!-- Form Pencarian -->
        <div class="row">
            <div class="col-md-6 mx-auto">
                <form action="/search-route" method="GET">
                    <div class="form-group">
                        <label for="startPoint">Pilih Titik Awal:</label>
                        <select class="form-control" name="startPoint" id="startPoint">
                            @foreach($positions as $position)
                                <option value="{{ $position->id }}" {{ isset($startPoint) && $startPoint == $position->id ? 'selected' : '' }}>
                                    {{ $position->halte_name }}
                                </option>
                            @endforeach
                        </select>
                    </div>

                    <div class="form-group">
                        <label for="endPoint">Pilih Titik Akhir:</label>
                        <select class="form-control" name="endPoint" id="endPoint">
                            @foreach($positions as $position)
                                <option value="{{ $position->id }}" {{ isset($endPoint) && $endPoint == $position->id ? 'selected' : '' }}>
                                    {{ $position->halte_name }}
                                </option>
                            @endforeach
                        </select>
                    </div>

                    <button type="submit" class="btn btn-primary btn-block">Cari</button>
                </form>
            </div>
        </div>

        <!-- Hasil Pencarian -->
        @if(isset($results) && count($results) > 0)
            <div class="result-grid">
                @foreach($results as $result)
                    <div class="card">
                        <h5 class="card-title">{{ $result->route_name }}</h5>
                        <p class="card-text">Nama Driver: {{ $result->driver }}</p>
                        <p class="card-text">Nama Bus: {{ $result->bus_number }}</p>
                        <p class="card-text">Titik Awal: {{ $result->start_halte }}</p>
                        <p class="card-text">Titik Akhir: {{ $result->end_halte }}</p>
                        <p class="card-text">Jumlah Halte Dilewati: {{ $result->stops_passed }}</p>
                        <p class="card-text">Jam Keberangkatan: {{ $result->adjusted_departure_time }}</p>
                        <p class="card-text">Waktu Tempuh (menit): {{ $result->travel_time }}</p>
                        <p class="card-text">Estimasi Waktu Tiba: {{ $result->estimated_arrival_time }}</p>
                        <a href="{{ route('bus.details', ['routeId' => $result->route_id, 'scheduleId' => $result->schedule_id]) }}" class="btn btn-primary">Lanjut</a>
                    </div>
                @endforeach
            </div>
        @else
            <p class="text-center mt-4">Tidak ada rute yang ditemukan.</p>
        @endif
    </div>

    <!-- Footer -->
    <footer>
        <p>&copy; 2024 Transportation Smart Destination. All rights reserved.</p>
        <p><a href="{{ route('contact') }}">Contact Us</a></p>
    </footer>
</body>
</html>
