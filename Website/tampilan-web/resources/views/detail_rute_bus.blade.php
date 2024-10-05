<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>Detail Rute Bus {{ $busCode }} - Transportation Smart Destination</title>
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
            max-width: 1200px;
            margin: 0 auto;
        }
        h1 {
            text-align: center;
            font-size: 36px;
            margin-bottom: 20px;
            color: #fff;
        }

        .bus-info {
            background-color: rgba(224, 224, 224, 0.9);
            padding: 15px;
            border-radius: 10px;
            margin-bottom: 20px;
            color: #333;
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
        <h1>Detail Rute Bus {{ $busCode }}</h1>

        <div class="bus-info">
            <h2>Kode Bus: {{ $busCode }}</h2>
            <p>Waktu Keberangkatan: {{ $departureTime }}</p>
            <p>Estimasi Waktu Perjalanan: {{ $estimatedTime }} menit</p>
            <p>Harga Tiket: Rp {{ $price }}</p>
        </div>

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

    <!-- Tambahkan Leaflet JS untuk peta -->
    <script src="https://unpkg.com/leaflet/dist/leaflet.js"></script>
    <script src="https://unpkg.com/leaflet-routing-machine/dist/leaflet-routing-machine.js"></script>

    <script>
        // Data waypoints berdasarkan rute bus
        const busRoutes = {
            "D442": [
                { lat: -7.2575, lng: 112.7521, halteName: "Halte Terminal Bungurasih" },
                { lat: -7.2675, lng: 112.7621, halteName: "Halte Tunjungan Plaza" },
                { lat: -7.2818, lng: 112.7957, halteName: "Halte ITS" },
                { lat: -7.2919, lng: 112.7342, halteName: "Halte Kebun Binatang Surabaya" }
            ],
            "A273": [
                { lat: -7.3798, lng: 112.7874, halteName: "Halte Juanda Airport" },
                { lat: -7.2692, lng: 112.7521, halteName: "Halte Universitas Airlangga" },
                { lat: -7.3387, lng: 112.7271, halteName: "Halte Masjid Al-Akbar" },
                { lat: -7.2635, lng: 112.7577, halteName: "Halte Gubeng Station" }
            ],
            "B354": [
                { lat: -7.2575, lng: 112.7521, halteName: "Halte Terminal Bungurasih" },
                { lat: -7.2675, lng: 112.7621, halteName: "Halte Tunjungan Plaza" },
                { lat: -7.3387, lng: 112.7271, halteName: "Halte Masjid Al-Akbar" }
            ],
            "C431": [
                { lat: -7.2818, lng: 112.7957, halteName: "Halte ITS" },
                { lat: -7.3387, lng: 112.7271, halteName: "Halte Masjid Al-Akbar" },
                { lat: -7.2919, lng: 112.7342, halteName: "Halte Kebun Binatang Surabaya" }
            ],
            "F631": [
                { lat: -7.2635, lng: 112.7577, halteName: "Halte Gubeng Station" },
                { lat: -7.1816, lng: 112.7558, halteName: "Halte Suramadu Bridge" },
                { lat: -7.2919, lng: 112.7342, halteName: "Halte Kebun Binatang Surabaya" }
            ]
        };

        // Ambil data rute bus berdasarkan kode bus
        const waypoints = busRoutes["{{ $busCode }}"];

        // Inisialisasi peta
        var map = L.map('map').setView([waypoints[0].lat, waypoints[0].lng], 13);

        // Tambahkan layer peta (OpenStreetMap)
        L.tileLayer('https://{s}.tile.openstreetmap.org/{z}/{x}/{y}.png', {
            attribution: '&copy; OpenStreetMap contributors'
        }).addTo(map);

        // Tambahkan marker untuk setiap pemberhentian dengan keterangan halte
        waypoints.forEach(function(point) {
            L.marker([point.lat, point.lng]).addTo(map)
                .bindPopup('Halte: ' + point.halteName);
        });

        // Tambahkan rute dengan Leaflet Routing Machine tanpa panel petunjuk arah
        L.Routing.control({
            waypoints: waypoints.map(point => L.latLng(point.lat, point.lng)),
            lineOptions: {
                styles: [{ color: 'red', weight: 5 }]
            },
            createMarker: function(i, waypoint, n) {
                return null;  // Menggunakan marker sendiri, jadi tidak perlu marker tambahan dari routing machine
            },
            routeWhileDragging: false,
            draggableWaypoints: false,
            show: false  // Menghilangkan panel petunjuk arah
        }).addTo(map);
    </script>

</body>
</html>
