<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>Cari Rute Bus - Transportation Smart Destination</title>
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
            margin-bottom: 40px;
            text-shadow: 2px 2px 5px rgba(0,0,0,0.7);
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
        <h1>Cari Rute Bus</h1>

        <!-- Form Pencarian Rute -->
        <div class="search-container">
            <select id="startPoint">
                <option value="" disabled selected>Pilih Titik Awal</option>
                <option value="1">Halte Terminal Bungurasih</option>
                <option value="2">Halte Tunjungan Plaza</option>
                <option value="3">Halte ITS</option>
                <option value="4">Halte Kenjeran</option>
                <option value="5">Halte Juanda Airport</option>
                <option value="6">Halte Universitas Airlangga</option>
                <option value="7">Halte Kebun Binatang Surabaya</option>
                <option value="8">Halte Darmo</option>
                <option value="9">Halte Masjid Al-Akbar</option>
                <option value="10">Halte Jembatan Merah</option>
                <option value="11">Halte Gubeng Station</option>
                <option value="12">Halte Suramadu Bridge</option>
            </select>

            <select id="endPoint">
                <option value="" disabled selected>Pilih Titik Akhir</option>
                <option value="1">Halte Terminal Bungurasih</option>
                <option value="2">Halte Tunjungan Plaza</option>
                <option value="3">Halte ITS</option>
                <option value="4">Halte Kenjeran</option>
                <option value="5">Halte Juanda Airport</option>
                <option value="6">Halte Universitas Airlangga</option>
                <option value="7">Halte Kebun Binatang Surabaya</option>
                <option value="8">Halte Darmo</option>
                <option value="9">Halte Masjid Al-Akbar</option>
                <option value="10">Halte Jembatan Merah</option>
                <option value="11">Halte Gubeng Station</option>
                <option value="12">Halte Suramadu Bridge</option>
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
        // Dummy data halte dengan koordinat
        const halte = {
            1: {name: 'Halte Terminal Bungurasih', lat: -7.3493, lng: 112.7708},
            2: {name: 'Halte Tunjungan Plaza', lat: -7.2654, lng: 112.7378},
            3: {name: 'Halte ITS', lat: -7.2818, lng: 112.7957},
            4: {name: 'Halte Kenjeran', lat: -7.2486, lng: 112.7850},
            5: {name: 'Halte Juanda Airport', lat: -7.3798, lng: 112.7874},
            6: {name: 'Halte Universitas Airlangga', lat: -7.2692, lng: 112.7521},
            7: {name: 'Halte Kebun Binatang Surabaya', lat: -7.2919, lng: 112.7342},
            8: {name: 'Halte Darmo', lat: -7.2884, lng: 112.7333},
            9: {name: 'Halte Masjid Al-Akbar', lat: -7.3387, lng: 112.7271},
            10: {name: 'Halte Jembatan Merah', lat: -7.2332, lng: 112.7384},
            11: {name: 'Halte Gubeng Station', lat: -7.2635, lng: 112.7577},
            12: {name: 'Halte Suramadu Bridge', lat: -7.1816, lng: 112.7558}
        };

        // Data bus per rute dengan waktu fiktif dan kode unik
        const busRoutes = {
            1: [
                {busCode: 'Bus A273', time: '07:15', detailLink: '{{ route("detail.rute.bus", ["id" => "A273"]) }}'},
                {busCode: 'Bus B354', time: '08:30', detailLink: '{{ route("detail.rute.bus", ["id" => "B354"]) }}'},
                {busCode: 'Bus C431', time: '10:00', detailLink: '{{ route("detail.rute.bus", ["id" => "C431"]) }}'}
            ],
            2: [
                {busCode: 'Bus D442', time: '09:45', detailLink: '{{ route("detail.rute.bus", ["id" => "D442"]) }}'},
                {busCode: 'Bus E567', time: '11:30', detailLink: '{{ route("detail.rute.bus", ["id" => "E567"]) }}'},
                {busCode: 'Bus F631', time: '13:00', detailLink: '{{ route("detail.rute.bus", ["id" => "F631"]) }}'}
            ],
            3: [
                {busCode: 'Bus G712', time: '12:15', detailLink: '{{ route("detail.rute.bus", ["id" => "G712"]) }}'},
                {busCode: 'Bus H823', time: '14:00', detailLink: '{{ route("detail.rute.bus", ["id" => "H823"]) }}'},
                {busCode: 'Bus I932', time: '15:30', detailLink: '{{ route("detail.rute.bus", ["id" => "I932"]) }}'}
            ]
        };

        // Fungsi untuk mencari jarak
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

        // Fungsi untuk menghitung harga
        function calculatePrice(distance) {
            if (distance < 5) {
                return 3000;
            } else if (distance >= 5 && distance <= 10) {
                return 5000;
            } else {
                return 7000;
            }
        }

        // Fungsi pencarian rute
        function searchRoute() {
            const start = document.getElementById('startPoint').value;
            const end = document.getElementById('endPoint').value;
            const resultsContainer = document.getElementById('results');
            resultsContainer.innerHTML = '';

            if (start && end && start !== end) {
                const startLatLng = halte[start];
                const endLatLng = halte[end];

                const distance = calculateDistance(startLatLng.lat, startLatLng.lng, endLatLng.lat, endLatLng.lng);
                const price = calculatePrice(distance);

                // Tentukan rute berdasarkan titik awal (contoh busRoutes[1] untuk titik awal 1)
                const busList = busRoutes[start] || [];

                // Tampilkan hasil pencarian bus
                busList.forEach(bus => {
                    const resultItem = `
                        <div class="result-item" onclick="window.location.href='${bus.detailLink}'">
                            <h2>${bus.busCode}</h2>
                            <p>Keberangkatan: ${bus.time}</p>
                            <p>Jarak: ${distance.toFixed(2)} km</p>
                            <p>Harga: Rp ${price}</p>
                        </div>
                    `;
                    resultsContainer.innerHTML += resultItem;
                });
            } else {
                alert('Silakan pilih titik awal dan akhir yang berbeda.');
            }
        }
    </script>

</body>
</html>
