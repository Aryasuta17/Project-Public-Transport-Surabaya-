<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Cari Rute Bus</title>
    <link href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css" rel="stylesheet">
    <style>
        .card {
            margin-bottom: 20px;
        }
    </style>
</head>
<body>
    <div class="container mt-5">
        <h1 class="text-center mb-4">Cari Rute Bus</h1>

        <div class="row">
            <div class="col-md-6 mx-auto">
                <form action="/search-route" method="GET">
                    <div class="form-group">
                        <label for="startPoint">Pilih Titik Awal:</label>
                        <select class="form-control" name="startPoint" id="startPoint">
                            @foreach($positions as $position)
                                <option value="{{ $position->id }}" {{ isset($startPoint) && $startPoint == $position->id ? 'selected' : '' }}>
                                    {{ $position->halte_name }}
                                </option>
                            @endforeach
                        </select>
                    </div>

                    <div class="form-group">
                        <label for="endPoint">Pilih Titik Akhir:</label>
                        <select class="form-control" name="endPoint" id="endPoint">
                            @foreach($positions as $position)
                                <option value="{{ $position->id }}" {{ isset($endPoint) && $endPoint == $position->id ? 'selected' : '' }}>
                                    {{ $position->halte_name }}
                                </option>
                            @endforeach
                        </select>
                    </div>

                    <button type="submit" class="btn btn-primary btn-block">Cari</button>
                </form>
            </div>
        </div>

        @if(isset($results) && count($results) > 0)
            <div class="mt-5">
                <h2>Hasil Pencarian:</h2>
                <div class="row">
                    @foreach($results as $result)
                        <div class="col-md-4">
                            <div class="card">
                                <div class="card-body">
                                    <h5 class="card-title">{{ $result->route_name }}</h5>
                                    <p class="card-text">Nama Driver: {{ $result->driver }}</p>
                                    <p class="card-text">Nama Bus: {{ $result->bus_number }}</p>
                                    <p class="card-text">Titik Awal: {{ $result->start_halte }}</p>
                                    <p class="card-text">Titik Akhir: {{ $result->end_halte }}</p>
                                    <p class="card-text">Jumlah Halte Dilewati: {{ $result->stops_passed }}</p>
                                    <p class="card-text">Jam Keberangkatan: {{ $result->adjusted_departure_time }}</p>
                                    <p class="card-text">Waktu Tempuh (menit): {{ $result->travel_time }}</p>
                                    <p class="card-text">Estimasi Waktu Tiba: {{ $result->estimated_arrival_time }}</p>
                                    <a href="#" class="btn btn-primary">Lanjut</a>
                                </div>
                            </div>
                        </div>
                    @endforeach
                </div>
            </div>
        @else
            <p class="text-center mt-4">Tidak ada rute yang ditemukan.</p>
        @endif
    </div>

    <script src="https://code.jquery.com/jquery-3.5.1.slim.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.9.3/dist/umd/popper.min.js"></script>
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/js/bootstrap.min.js"></script>
</body>
</html>
