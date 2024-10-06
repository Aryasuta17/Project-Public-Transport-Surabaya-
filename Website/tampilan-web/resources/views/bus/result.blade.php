<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Hasil Pencarian Rute</title>
    <style>
        body {
            font-family: Arial, sans-serif;
            background-color: #f0f0f0;
            margin: 0;
            padding: 20px;
            text-align: center;
        }

        h1 {
            font-size: 36px;
            margin-bottom: 20px;
        }

        .result-item {
            margin-top: 20px;
            padding: 20px;
            background-color: white;
            border-radius: 10px;
            display: inline-block;
        }

        .result-item p {
            margin: 10px 0;
        }
    </style>
</head>
<body>

    <h1>Hasil Pencarian Rute</h1>

    @if(isset($route))
        <div class="result-item">
            <h2>{{ $route->route_name }}</h2>
            <p>Jarak: {{ round($distance, 2) }} km</p>
            <p>Perkiraan Waktu: {{ round($timeInMinutes, 2) }} menit</p>
        </div>
    @else
        <p>Tidak ada rute yang ditemukan untuk titik awal dan akhir tersebut.</p>
    @endif

</body>
</html>
