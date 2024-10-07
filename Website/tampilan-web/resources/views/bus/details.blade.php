<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Detail Rute Bus Surabaya</title>
    <link href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css" rel="stylesheet">
    <link rel="stylesheet" href="https://unpkg.com/leaflet@1.7.1/dist/leaflet.css" />
    <script src="https://unpkg.com/leaflet@1.7.1/dist/leaflet.js"></script>
    <style>
        #map { height: 400px; width: 100%; margin-top: 20px; }
    </style>
</head>
<body>
    <div class="container mt-5">
        <h1>Detail Rute Bus Surabaya</h1>
        <div class="row">
            <div class="col-md-6">
                <div class="card">
                    <div class="card-body">
                        <h3 class="card-title">Informasi Bus</h3>
                        <p><strong>Nama Rute:</strong> {{ $busDetails->route_name }}</p>
                        <p><strong>Nomor Bus:</strong> {{ $busDetails->bus_number }}</p>
                        <p><strong>Nama Pengemudi:</strong> {{ $busDetails->driver }}</p>
                        <p><strong>Waktu Keberangkatan:</strong> {{ $busDetails->departure_time }}</p>
                        <p><strong>Jumlah Halte:</strong> {{ count($stops) }}</p>
                    </div>
                </div>
            </div>
            <div class="col-md-6">
                <div id="map"></div>
            </div>
        </div>
        
        <div class="mt-4">
            <h3>Daftar Halte</h3>
            <ul class="list-group">
                @foreach($stops as $index => $stop)
                    <li class="list-group-item">
                        {{ $index + 1 }}. {{ $stop->halte_name }}
                    </li>
                @endforeach
            </ul>
        </div>
    </div>

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

        // Zoom map to fit all markers
        map.fitBounds(polyline.getBounds());
    </script>
</body>
</html>
