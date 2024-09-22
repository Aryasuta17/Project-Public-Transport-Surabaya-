<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>Rute Transportasi - Transportation Smart Destination</title>
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

        /* Konten */
        .container {
            padding: 100px 20px;
        }
        h1 {
            text-align: center;
            margin-bottom: 30px;
            font-size: 36px;
            color: #333;
        }
        #map {
            width: 100%;
            height: 500px;
            margin-bottom: 30px;
        }
        p {
            line-height: 1.6;
            font-size: 16px;
            color: #333;
            max-width: 800px;
            margin: 0 auto;
            text-align: center;
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
            #map {
                height: 300px;
            }
        }

    </style>
    <!-- Menambahkan Leaflet CSS -->
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
                <!-- Menampilkan "Login" dan "Register" jika diperlukan -->
            </ul>
        </nav>
    </div>

    <!-- Konten -->
    <div class="container">
        <h1>Rute Transportasi</h1>
        <div id="map"></div>
        <p>Deskripsi rute transportasi yang dipilih akan ditampilkan di sini. Anda dapat melihat detail rute pada peta di atas.</p>
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

    <!-- Menambahkan Leaflet JS -->
    <script src="https://unpkg.com/leaflet/dist/leaflet.js"></script>
    <!-- Tambahkan Font Awesome untuk ikon media sosial -->
    <script src="https://kit.fontawesome.com/a076d05399.js" crossorigin="anonymous"></script>

    <script>
        // Inisialisasi peta
        var map = L.map('map').setView([-7.250445, 112.768845], 13); // Koordinat Surabaya

        L.tileLayer('https://{s}.tile.openstreetmap.org/{z}/{x}/{y}.png', {
            attribution: '&copy; OpenStreetMap contributors'
        }).addTo(map);

        // Tambahkan rute atau marker berdasarkan ID rute
        var ruteId = {{ request()->get('id') }}; // Mendapatkan ID rute dari parameter URL

        // Contoh menambahkan marker dan polyline untuk rute tertentu
        if (ruteId == 1) {
            // Rute 1: Terminal Purabaya ke Tunjungan Plaza
            var pointA = L.latLng(-7.3407, 112.7266); // Terminal Purabaya
            var pointB = L.latLng(-7.2575, 112.7404); // Tunjungan Plaza

            var route = L.polyline([pointA, pointB], {
                color: 'red'
            }).addTo(map);

            // Zoom ke rute
            map.fitBounds(route.getBounds());

            // Tambahkan marker
            L.marker(pointA).addTo(map).bindPopup('Terminal Purabaya');
            L.marker(pointB).addTo(map).bindPopup('Tunjungan Plaza');
        } else if (ruteId == 2) {
            // Rute 2: Stasiun Gubeng ke Jembatan Suramadu
            var pointA = L.latLng(-7.2654, 112.7518); // Stasiun Gubeng
            var pointB = L.latLng(-7.1915, 112.7773); // Jembatan Suramadu

            var route = L.polyline([pointA, pointB], {
                color: 'blue'
            }).addTo(map);

            // Zoom ke rute
            map.fitBounds(route.getBounds());

            // Tambahkan marker
            L.marker(pointA).addTo(map).bindPopup('Stasiun Gubeng');
            L.marker(pointB).addTo(map).bindPopup('Jembatan Suramadu');
        }
        // Tambahkan kondisi lain untuk rute lainnya
    </script>

</body>
</html>
