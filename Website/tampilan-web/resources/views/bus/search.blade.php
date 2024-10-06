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
                    resultDiv.innerHTML = '<h2>Pilihan Rute yang Tersedia:</h2>';
                    data.routes.forEach(route => {
                        resultDiv.innerHTML += `
                            <div class="route-box">
                                <h3>Bus: ${route.bus_number}</h3>
                                <p>Driver: ${route.driver}</p>
                                <p>Jumlah pemberhentian: ${route.stops_count}</p>
                                <p>Keberangkatan: ${route.departure_time}</p>
                                <p>Estimasi Kedatangan: ${route.arrival_time}</p>
                            </div>
                        `;
                    });
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
