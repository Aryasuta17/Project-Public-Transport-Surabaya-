<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Cari Rute Bus</title>
    <style>
        body {
            font-family: Arial, sans-serif;
            margin: 0;
            padding: 20px;
            background-color: #f4f4f4;
        }

        h1 {
            text-align: center;
            color: #333;
        }

        .container {
            max-width: 600px;
            margin: 0 auto;
            background-color: white;
            padding: 20px;
            border-radius: 10px;
            box-shadow: 0px 0px 10px rgba(0, 0, 0, 0.1);
        }

        select, button {
            padding: 10px;
            margin-bottom: 10px;
            width: 100%;
            border-radius: 5px;
            border: 1px solid #ccc;
        }

        button {
            background-color: #007bff;
            color: white;
            border: none;
            cursor: pointer;
        }

        button:hover {
            background-color: #0056b3;
        }

        #result {
            margin-top: 20px;
            padding: 15px;
            background-color: #f9f9f9;
            border-radius: 5px;
        }
    </style>
</head>
<body>

<div class="container">
    <h1>Cari Rute Bus</h1>
    
    <label for="startPoint">Pilih Titik Awal:</label>
    <select id="startPoint">
        @foreach($positions as $position)
            <option value="{{ $position->id }}">{{ $position->halte_name }}</option>
        @endforeach
    </select>
    
    <label for="endPoint">Akhir:</label>
    <select id="endPoint">
        @foreach($positions as $position)
            <option value="{{ $position->id }}">{{ $position->halte_name }}</option>
        @endforeach
    </select>
    
    <button onclick="searchRoute()">Cari</button>

    <div id="result">
        <!-- Hasil pencarian akan ditampilkan di sini -->
    </div>
</div>

<script>
    function searchRoute() {
        const start = document.getElementById('startPoint').value;
        const end = document.getElementById('endPoint').value;
        const resultDiv = document.getElementById('result');
        resultDiv.innerHTML = '';

        if (start && end && start !== end) {
            fetch('/cari-rute', {
                method: 'POST',
                headers: {
                    'Content-Type': 'application/json',
                    'X-CSRF-TOKEN': '{{ csrf_token() }}'
                },
                body: JSON.stringify({ startPoint: start, endPoint: end })
            })
            .then(response => response.json())
            .then(data => {
                if (data.success) {
                    resultDiv.innerHTML = `
                        <h2>Rute Tersedia:</h2>
                        <p>${data.route_description}</p>
                        <p>Jarak: ${data.distance.toFixed(2)} km</p>
                        <p>Waktu tempuh: ${data.time.toFixed(2)} menit</p>
                    `;
                } else {
                    resultDiv.innerHTML = `<p>${data.message}</p>`;
                }
            })
            .catch(error => {
                resultDiv.innerHTML = `<p>Terjadi kesalahan. Coba lagi nanti.</p>`;
            });
        } else {
            resultDiv.innerHTML = '<p>Pilih titik awal dan akhir yang berbeda.</p>';
        }
    }
</script>

</body>
</html>
