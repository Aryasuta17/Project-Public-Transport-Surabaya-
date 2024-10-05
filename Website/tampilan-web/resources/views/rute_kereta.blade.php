<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>Cari Rute Kereta - Transportation Smart Destination</title>
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
            text-align: center;
        }

        h1 {
            font-size: 36px;
            margin-bottom: 40px;
            text-shadow: 2px 2px 5px rgba(0, 0, 0, 0.7);
        }

        .search-container {
            display: flex;
            justify-content: center;
            margin-bottom: 40px;
        }

        .search-container select {
            padding: 10px;
            margin-right: 20px;
            font-size: 16px;
            border-radius: 5px;
            border: none;
        }

        .search-container button {
            padding: 10px 20px;
            background-color: #e74c3c;
            color: #fff;
            border: none;
            font-size: 16px;
            border-radius: 5px;
            cursor: pointer;
        }

        /* Hasil Pencarian */
        .results {
            margin-top: 30px;
            display: flex;
            flex-wrap: wrap;
            justify-content: center;
        }

        .result-item {
            background-color: rgba(0, 0, 0, 0.7);
            padding: 20px;
            border-radius: 10px;
            margin: 10px;
            width: 250px;
            text-align: center;
            cursor: pointer;
            transition: background-color 0.3s;
        }

        .result-item:hover {
            background-color: #e74c3c;
        }

        .result-item h2 {
            color: #fff;
            margin-bottom: 10px;
        }

        .result-item p {
            color: #fff;
            margin: 5px 0;
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
            </ul>
        </nav>
    </div>

    <!-- Konten -->
    <div class="container">
        <h1>Cari Rute Kereta</h1>

        <!-- Form Pencarian Rute -->
        <div class="search-container">
            <select id="startStation">
                <option value="" disabled selected>Pilih Stasiun Awal</option>
                <option value="1">Stasiun Gubeng</option>
                <option value="2">Stasiun Pasar Turi</option>
                <option value="3">Stasiun Wonokromo</option>
                <option value="4">Stasiun Waru</option>
                <option value="5">Stasiun Sidoarjo</option>
                <option value="6">Stasiun Mojokerto</option>
            </select>

            <select id="endStation">
                <option value="" disabled selected>Pilih Stasiun Tujuan</option>
                <option value="1">Stasiun Gubeng</option>
                <option value="2">Stasiun Pasar Turi</option>
                <option value="3">Stasiun Wonokromo</option>
                <option value="4">Stasiun Waru</option>
                <option value="5">Stasiun Sidoarjo</option>
                <option value="6">Stasiun Mojokerto</option>
            </select>

            <button onclick="searchRoute()">Cari</button>
        </div>

        <!-- Hasil Pencarian -->
        <div class="results" id="results"></div>
    </div>

    <!-- Footer -->
    <div class="footer-bottom">
        <p>&copy; 2023 Transportation Smart Destination</p>
    </div>

    <!-- JavaScript -->
    <script>
        // Dummy data stasiun dengan koordinat
        const stations = {
            1: {name: 'Stasiun Gubeng', lat: -7.2575, lng: 112.7521},
            2: {name: 'Stasiun Pasar Turi', lat: -7.2493, lng: 112.7313},
            3: {name: 'Stasiun Wonokromo', lat: -7.2956, lng: 112.7366},
            4: {name: 'Stasiun Waru', lat: -7.3574, lng: 112.7448},
            5: {name: 'Stasiun Sidoarjo', lat: -7.4463, lng: 112.7107},
            6: {name: 'Stasiun Mojokerto', lat: -7.4706, lng: 112.4336}
        };

        // Data kereta per rute dengan waktu fiktif dan kode unik
        const trainRoutes = {
            1: [
                {trainCode: 'KA101', time: '07:00', detailLink: '{{ route("detail.rute.kereta", ["start" => 1, "end" => 2]) }}'},
                {trainCode: 'KA102', time: '09:30', detailLink: '{{ route("detail.rute.kereta", ["start" => 1, "end" => 3]) }}'}
            ],
            2: [
                {trainCode: 'KA201', time: '08:00', detailLink: '{{ route("detail.rute.kereta", ["start" => 2, "end" => 5]) }}'},
                {trainCode: 'KA202', time: '10:45', detailLink: '{{ route("detail.rute.kereta", ["start" => 2, "end" => 6]) }}'}
            ]
        };

        // Fungsi untuk mencari jarak (dummy, bisa disesuaikan)
        function calculateDistance(lat1, lon1, lat2, lon2) {
            var R = 6371; // Radius bumi dalam km
            var dLat = (lat2 - lat1) * Math.PI / 180;
            var dLon = (lon2 - lon1) * Math.PI / 180;
            var a = 
                0.5 - Math.cos(dLat)/2 + 
                Math.cos(lat1 * Math.PI / 180) * Math.cos(lat2 * Math.PI / 180) * 
                (1 - Math.cos(dLon))/2;

            return R * 2 * Math.asin(Math.sqrt(a));
        }

        // Fungsi pencarian rute kereta
        function searchRoute() {
            const start = document.getElementById('startStation').value;
            const end = document.getElementById('endStation').value;
            const resultsContainer = document.getElementById('results');
            resultsContainer.innerHTML = '';

            if (start && end && start !== end) {
                const startLatLng = stations[start];
                const endLatLng = stations[end];

                const distance = calculateDistance(startLatLng.lat, startLatLng.lng, endLatLng.lat, endLatLng.lng);

                // Tentukan rute berdasarkan stasiun awal (contoh trainRoutes[1] untuk stasiun awal 1)
                const trainList = trainRoutes[start] || [];

                // Tampilkan hasil pencarian kereta
                trainList.forEach(train => {
                    const resultItem = `
                        <div class="result-item" onclick="window.location.href='${train.detailLink}'">
                            <h2>${train.trainCode}</h2>
                            <p>Keberangkatan: ${train.time}</p>
                            <p>Jarak: ${distance.toFixed(2)} km</p>
                        </div>
                    `;
                    resultsContainer.innerHTML += resultItem;
                });
            } else {
                alert('Silakan pilih stasiun awal dan akhir yang berbeda.');
            }
        }
    </script>

</body>
</html>
