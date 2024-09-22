<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>Detail Rute Kereta {{ $id }} - Transportation Smart Destination</title>
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

        /* Konten */
        .container {
            padding: 150px 20px;
            text-align: center;
        }
        h1 {
            font-size: 36px;
            margin-bottom: 20px;
            text-shadow: 2px 2px 5px rgba(0,0,0,0.7);
        }
        p {
            font-size: 18px;
            margin-bottom: 30px;
        }

        /* Peta */
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

    </style>

    <!-- Tambahkan Leaflet CSS untuk peta -->
    <link rel="stylesheet" href="https://unpkg.com/leaflet/dist/leaflet.css" />

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
        <h1>Detail Rute Kereta {{ $id }}</h1>
        <p>Stasiun: Stasiun 1 - Stasiun 2 - Stasiun 3</p>

        <!-- Div untuk peta -->
        <div id="map"></div>
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

    <!-- Tambahkan Font Awesome -->
    <script src="https://kit.fontawesome.com/a076d05399.js" crossorigin="anonymous"></script>

    <!-- Tambahkan Leaflet JS untuk peta -->
    <script src="https://unpkg.com/leaflet/dist/leaflet.js"></script>

    <script>
        // Inisialisasi peta
        var map = L.map('map').setView([-7.2575, 112.7521], 13);

        // Tambahkan layer peta (OpenStreetMap)
        L.tileLayer('https://{s}.tile.openstreetmap.org/{z}/{x}/{y}.png', {
            attribution: '&copy; OpenStreetMap contributors'
        }).addTo(map);

        // Definisikan koordinat rute (contoh data)
        var routeCoordinates = [
            // Ganti dengan data koordinat rute sebenarnya
            { lat: -7.2654, lng: 112.7518 }, // Stasiun Gubeng
            { lat: -7.2485, lng: 112.7266 }, // Stasiun Pasar Turi
            { lat: -7.3210, lng: 112.7371 }  // Stasiun Wonokromo
        ];

        // Buat array LatLng
        var latlngs = routeCoordinates.map(function(coord) {
            return [coord.lat, coord.lng];
        });

        // Tambahkan marker untuk setiap stasiun
        routeCoordinates.forEach(function(coord, index) {
            L.marker([coord.lat, coord.lng]).addTo(map)
                .bindPopup('Stasiun ' + (index + 1));
        });

        // Gambarkan polyline rute
        var routeLine = L.polyline(latlngs, { color: 'blue' }).addTo(map);

        // Sesuaikan tampilan peta agar sesuai dengan rute
        map.fitBounds(routeLine.getBounds());
    </script>

</body>
</html>
