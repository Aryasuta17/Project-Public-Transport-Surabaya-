<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Cari Rute Bus</title>
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
            background: #f0f0f0;
            color: #333;
            text-align: center;
            padding: 20px;
        }

        h1 {
            font-size: 36px;
            margin-bottom: 40px;
            text-shadow: 2px 2px 5px rgba(0,0,0,0.7);
        }

        /* Konten */
        .container {
            padding: 50px;
        }

        /* Form */
        .form-group {
            margin-bottom: 20px;
        }

        select {
            padding: 10px;
            width: 200px;
            font-size: 16px;
            margin-right: 10px;
        }

        button {
            padding: 10px 20px;
            background-color: #007bff;
            color: #fff;
            border: none;
            cursor: pointer;
        }

        button:hover {
            background-color: #0056b3;
        }

        /* Hasil Pencarian */
        .results {
            margin-top: 30px;
            display: flex;
            justify-content: center;
            flex-wrap: wrap;
        }

        .result-item {
            background-color: #fff;
            padding: 20px;
            border-radius: 10px;
            margin: 10px;
            box-shadow: 0 2px 5px rgba(0,0,0,0.1);
            width: 250px;
            text-align: center;
        }
    </style>
</head>
<body>

    <div class="container">
        <h1>Cari Rute Bus</h1>

        <!-- Form Pencarian -->
        <div class="form-group">
            <select id="startPoint">
                <option value="" disabled selected>Pilih Titik Awal</option>
                @foreach($routes as $route)
                    <option value="{{ $route->starting_point }}">{{ $route->starting_point }}</option>
                @endforeach
            </select>

            <select id="endPoint">
                <option value="" disabled selected>Pilih Titik Akhir</option>
                @foreach($routes as $route)
                    <option value="{{ $route->ending_point }}">{{ $route->ending_point }}</option>
                @endforeach
            </select>

            <button onclick="searchRoute()">Cari</button>
        </div>

        <!-- Hasil Pencarian -->
        <div class="results" id="results">
            <!-- Hasil akan dimuat di sini -->
        </div>
    </div>

    <script>
        function searchRoute() {
            const start = document.getElementById('startPoint').value;
            const end = document.getElementById('endPoint').value;
            const resultsContainer = document.getElementById('results');
            resultsContainer.innerHTML = '';

            if (start && end && start !== end) {
                // Fetch results from backend (AJAX or route logic)
                resultsContainer.innerHTML = `<div class="result-item">
                    <h2>Bus Ditemukan</h2>
                    <p>Dari: ${start}</p>
                    <p>Ke: ${end}</p>
                </div>`;
            } else {
                alert('Pilih titik awal dan akhir yang berbeda.');
            }
        }
    </script>
</body>
</html>
