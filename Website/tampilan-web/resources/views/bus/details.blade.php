<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Detail Rute Bus Surabaya</title>
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

        /* Atur tata letak agar map memenuhi sisa ruang */
        .result-grid {
            display: grid;
            grid-template-columns: 1fr 3fr; /* 1/3 untuk informasi, 2/3 untuk map */
            gap: 20px;
            margin-top: 20px;
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

        #map {
            height: 500px;
            width: 100%;
            border-radius: 8px;
        }

        .list-group-item {
            font-size: 16px;
            color: #34495e;
            padding: 10px;
            border: 1px solid #ddd;
            margin-bottom: 5px;
            border-radius: 5px;
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
    <link rel="stylesheet" href="https://unpkg.com/leaflet@1.7.1/dist/leaflet.css" />
    <script src="https://unpkg.com/leaflet@1.7.1/dist/leaflet.js"></script>
</head>
<body>
    <!-- Navbar -->
    <div class="navbar">
        <div class="logo">
            <a href="{{ route('welcome') }}">
                <img src="{{ asset('images/logo.png') }}" alt="Transportation Smart Destination">
            </a>
        </div>
        <div class="navbar-title">Transportation Smart Destination</div>
        <div class="nav-links">
            <a href="{{ route('user.home') }}">Beranda</a>
            <a href="{{ route('welcome') }}">Logout</a>
        </div>
    </div>

    <div class="container">
        <h1>Detail Rute Bus Surabaya</h1>

        <!-- Grid Layout for the Information and Map -->
        <div class="result-grid">
            <!-- Informasi Bus -->
            <div class="card">
                <h5 class="card-title">Informasi Bus</h5>
                <p class="card-text"><strong>Nama Rute:</strong> {{ $busDetails->route_name }}</p>
                <p class="card-text"><strong>Nomor Bus:</strong> {{ $busDetails->bus_number }}</p>
                <p class="card-text"><strong>Nama Pengemudi:</strong> {{ $busDetails->driver }}</p>
                <p class="card-text"><strong>Waktu Keberangkatan:</strong> {{ $busDetails->departure_time }}</p>
                <p class="card-text"><strong>Jumlah Halte:</strong> {{ count($stops) }}</p>
            </div>

            <!-- Peta Halte -->
            <div id="map"></div>
        </div>

        <!-- Daftar Halte -->
        <div class="card mt-4">
            <h5 class="card-title">Daftar Halte</h5>
            <ul class="list-group">
                @foreach($stops as $index => $stop)
                    <li class="list-group-item">{{ $index + 1 }}. {{ $stop->halte_name }}</li>
                @endforeach
            </ul>
        </div>
    </div>

    <!-- Footer -->
    <footer>
        <p>&copy; 2024 Transportation Smart Destination. All rights reserved.</p>
    </footer>

    <script>
        // Initialize the map centered on Surabaya
        var map = L.map('map').setView([-7.2575, 112.7521], 12);

        L.tileLayer('https://{s}.tile.openstreetmap.org/{z}/{x}/{y}.png', {
            attribution: '© OpenStreetMap contributors'
        }).addTo(map);

        var markers = [];
        var latlngs = [];

        @foreach($stops as $index => $stop)
            var marker = L.marker([{{ $stop->latitude }}, {{ $stop->longitude }}])
                .bindPopup('{{ $index + 1 }}. {{ $stop->halte_name }}')
                .addTo(map);
            markers.push(marker);
            latlngs.push([{{ $stop->latitude }}, {{ $stop->longitude }}]);
        @endforeach

        // Create a polyline connecting all stops
        var polyline = L.polyline(latlngs, {color: 'blue'}).addTo(map);

        // Adjust the map bounds to include all stops
        map.fitBounds(polyline.getBounds());
    </script>
</body>
</html>
