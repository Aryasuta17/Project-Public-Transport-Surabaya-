<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>OLAP Dashboard</title>
    <link href="https://cdn.jsdelivr.net/npm/tailwindcss@2.2.19/dist/tailwind.min.css" rel="stylesheet">
    <script src="https://cdn.jsdelivr.net/npm/chart.js"></script>
</head>
<body class="bg-gray-100">

    <!-- Sidebar -->
    <div class="fixed w-64 h-screen bg-gray-800 text-white p-6">
        <h1 class="text-2xl font-bold mb-6">OLAP Dashboard</h1>
        <nav>
            <a href="#" class="block py-2 px-4 bg-gray-700 rounded">Dashboard</a>
        </nav>
    </div>

    <!-- Main Content -->
    <div class="ml-64 p-6">
        <h1 class="text-3xl font-bold mb-6">OLAP Dashboard</h1>

        <!-- Visualisasi -->
        <div class="grid grid-cols-1 md:grid-cols-2 lg:grid-cols-3 gap-6">

            <!-- Distribusi Jumlah Keterlambatan -->
            <div class="bg-white p-4 rounded shadow">
                <h2 class="text-lg font-bold mb-4">Distribusi Jumlah Keterlambatan</h2>
                <canvas id="keterlambatanDistribusiChart"></canvas>
            </div>

            <!-- Jumlah Pelanggan per Bulan -->
            <div class="bg-white p-4 rounded shadow">
                <h2 class="text-lg font-bold mb-4">Jumlah Pelanggan per Bulan</h2>
                <canvas id="pelangganBulanChart"></canvas>
            </div>

            <!-- Proporsi Pendapatan per Rute -->
            <div class="bg-white p-4 rounded shadow">
                <h2 class="text-lg font-bold mb-4">Pendapatan per Rute</h2>
                <canvas id="pendapatanRuteBarChart"></canvas>
            </div>
        </div>
    </div>

    <!-- Chart.js Scripts -->
    <script>
        // Distribusi Jumlah Keterlambatan
        new Chart(document.getElementById('keterlambatanDistribusiChart'), {
            type: 'bar',
            data: {
                labels: @json($keterlambatanLabels),
                datasets: [{
                    label: 'Jumlah Pengemudi',
                    data: @json($keterlambatanData),
                    backgroundColor: ['#FF6384', '#36A2EB']
                }]
            }
        });

        // Jumlah Pelanggan per Bulan
        new Chart(document.getElementById('pelangganBulanChart'), {
            type: 'bar',
            data: {
                labels: @json($pelangganBulanLabels),
                datasets: [{
                    label: 'Jumlah Pelanggan',
                    data: @json($pelangganBulanData),
                    backgroundColor: 'rgba(75, 192, 192, 0.7)'
                }]
            },
            options: {
                responsive: true,
                scales: { y: { beginAtZero: true } }
            }
        });

        // Pendapatan per Rute
        new Chart(document.getElementById('pendapatanRuteBarChart'), {
            type: 'bar',
            data: {
                labels: @json($pendapatanRuteBarLabels),
                datasets: [{
                    label: 'Total Pendapatan',
                    data: @json($pendapatanRuteBarData),
                    backgroundColor: '#FFCE56'
                }]
            },
            options: {
                responsive: true,
                scales: { y: { beginAtZero: true } }
            }
        });
    </script>
</body>
</html>
