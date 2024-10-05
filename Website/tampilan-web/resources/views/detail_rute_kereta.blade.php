<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>Detail Rute Kereta - Transportation Smart Destination</title>
    <style>
        /* Reset dan Gaya Umum */
        * {
            margin: 0;
            padding: 0;
            box-sizing: border-box;
        }

        body {
            font-family: 'Roboto', sans-serif;
            background: url('{{ asset('images/background.jpg') }}') no-repeat center center fixed;
            background-size: cover;
            color: #fff;
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

        /* Konten */
        .container {
            padding: 150px 20px;
            max-width: 1200px;
            margin: 0 auto;
        }

        h1 {
            text-align: center;
            font-size: 36px;
            margin-bottom: 20px;
            text-shadow: 2px 2px 5px rgba(0, 0, 0, 0.7);
        }

        .route-info {
            background-color: rgba(224, 224, 224, 0.9);
            padding: 15px;
            border-radius: 10px;
            margin-bottom: 20px;
            color: #333;
        }

        #map {
            width: 100%;
            height: 500px;
            margin-top: 20px;
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
            h1 {
                font-size: 28px;
            }

            .route-info {
                font-size: 14px;
            }
        }
    </style>

    <!-- Leaflet CSS untuk peta -->
    <link rel="stylesheet" href="https://unpkg.com/leaflet/dist/leaflet.css" />
    <link rel="stylesheet" href="https://unpkg.com/leaflet-routing-machine/dist/leaflet-routing-machine.css" />
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
            </ul>
        </nav>
    </div>

    <!-- Konten -->
    <div class="container">
        <h1>Detail Rute Kereta {{ $validRoute['route'] }}</h1>

        <div class="route-info">
            <h2>Rute: {{ $validRoute['route'] }}</h2>
            <p>Stasiun Awal: {{ $stations[$start] }}</p>
            <p>Stasiun Tujuan: {{ $stations[$end] }}</p>
        </div>

        <!-- Div untuk peta -->
        <div id="map"></div>
    </div>

    <!-- Footer -->
    <div class="footer-bottom">
        <p>&copy; 2023 Transportation Smart Destination</p>
        <div class="social-icons">
            <a href="#"><i class="fab fa-facebook-f"></i></a>
            <a href="#"><i class="fab fa-twitter"></i></a>
            <a href="#"><i class="fab fa-instagram"></i></a>
        </div>
    </div>

    <!-- Tambahkan Leaflet JS untuk peta -->
    <script src="https://unpkg.com/leaflet/dist/leaflet.js"></script>
    <script src="https://unpkg.com/leaflet-routing-machine/dist/leaflet-routing-machine.js"></script>

    <script>
        // Data rute dari controller (disiapkan di backend)
        const waypoints = [
            @foreach ($validRoute['stations'] as $station)
                L.latLng({{ $station['lat'] }}, {{ $station['lng'] }}),
            @endforeach
        ];

        const stationNames = [
            @foreach ($validRoute['stations'] as $station)
                "{{ $station['name'] }}",
            @endforeach
        ];

        // Inisialisasi peta
        var map = L.map('map').setView([waypoints[0].lat, waypoints[0].lng], 13);

        // Tambahkan layer peta (OpenStreetMap)
        L.tileLayer('https://{s}.tile.openstreetmap.org/{z}/{x}/{y}.png', {
            attribution: '&copy; OpenStreetMap contributors'
        }).addTo(map);

        // Tambahkan marker untuk setiap pemberhentian dengan keterangan stasiun
        waypoints.forEach(function(point, index) {
            L.marker([point.lat, point.lng]).addTo(map)
                .bindPopup(stationNames[index]);
        });

        // Gambarkan rute dengan Leaflet Routing Machine tanpa panel petunjuk arah
        L.Routing.control({
            waypoints: waypoints,
            lineOptions: {
                styles: [{ color: 'blue', weight: 5 }]
            },
            createMarker: function() {
                return null;  // Nonaktifkan marker dari Routing Machine
            },
            routeWhileDragging: false,
            draggableWaypoints: false,
            show: false  // Menghilangkan panel petunjuk arah
        }).addTo(map);
    </script>

</body>
</html>
