<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Detail Rute Bus</title>
    <link rel="stylesheet" href="https://unpkg.com/leaflet@1.7.1/dist/leaflet.css" />
    <script src="https://unpkg.com/leaflet@1.7.1/dist/leaflet.js"></script>
    <style>
        #map {
            height: 500px;
            width: 100%;
        }
    </style>
</head>
<body>
    <div class="container mt-5">
        <h1>Detail Rute Bus</h1>
        <div class="row">
            <div class="col-md-6">
                <h3>Bus Details</h3>
                <p><strong>Route Name:</strong> {{ $busDetails->route_name }}</p>
                <p><strong>Bus Number:</strong> {{ $busDetails->bus_number }}</p>
                <p><strong>Driver:</strong> {{ $busDetails->driver }}</p>
                <p><strong>Departure Time:</strong> {{ $busDetails->departure_time }}</p>
                <p><strong>Stops Passed:</strong> {{ count($stops) }}</p>
            </div>
            <div class="col-md-6">
                <div id="map"></div>
            </div>
        </div>
    </div>

    <script>
        // Initialize the map
        var map = L.map('map').setView([{{ $stops[0]->latitude }}, {{ $stops[0]->longitude }}], 13);

        // Add OpenStreetMap tiles
        L.tileLayer('https://{s}.tile.openstreetmap.org/{z}/{x}/{y}.png', {
            attribution: '&copy; OpenStreetMap contributors'
        }).addTo(map);

        // Add markers and polyline
        var latlngs = [];
        @foreach($stops as $stop)
            L.marker([{{ $stop->latitude }}, {{ $stop->longitude }}]).addTo(map)
                .bindPopup('{{ $stop->halte_name }}');
            latlngs.push([{{ $stop->latitude }}, {{ $stop->longitude }}]);
        @endforeach

        // Add polyline connecting the bus stops
        var polyline = L.polyline(latlngs, {color: 'blue'}).addTo(map);

        // Zoom the map to fit the polyline
        map.fitBounds(polyline.getBounds());
    </script>
</body>
</html>
