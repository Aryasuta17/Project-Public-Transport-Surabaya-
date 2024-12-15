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
            <!-- Pendapatan per Bulan -->
            <div class="bg-white p-4 rounded shadow">
                <h2 class="text-lg font-bold mb-4">Pendapatan per Bulan</h2>
                <canvas id="pendapatanBulanChart"></canvas>
            </div>

            <!-- Jumlah Pelanggan per Rute -->
            <div class="bg-white p-4 rounded shadow">
                <h2 class="text-lg font-bold mb-4">Jumlah Pelanggan per Rute</h2>
                <canvas id="pelangganRuteChart"></canvas>
            </div>

            <!-- Jumlah Pengemudi per Bus -->
            <div class="bg-white p-4 rounded shadow">
                <h2 class="text-lg font-bold mb-4">Jumlah Pengemudi per Bus</h2>
                <canvas id="pengemudiBusChart"></canvas>
            </div>

            <!-- Distribusi Keterlambatan -->
            <div class="bg-white p-4 rounded shadow">
                <h2 class="text-lg font-bold mb-4">Distribusi Keterlambatan</h2>
                <canvas id="keterlambatanChart"></canvas>
            </div>
        </div>
    </div>

    <!-- Chart.js Scripts -->
    <script>
        // Pendapatan per Bulan
        new Chart(document.getElementById('pendapatanBulanChart'), {
            type: 'bar',
            data: {
                labels: @json($pendapatanBulanLabels),
                datasets: [{
                    label: 'Pendapatan',
                    data: @json($pendapatanBulanData),
                    backgroundColor: 'rgba(75, 192, 192, 0.7)',
                }]
            }
        });

        // Jumlah Pelanggan per Rute
        new Chart(document.getElementById('pelangganRuteChart'), {
            type: 'pie',
            data: {
                labels: @json($ruteLabels),
                datasets: [{
                    data: @json($rutePelangganData),
                    backgroundColor: ['#FF6384', '#36A2EB', '#FFCE56', '#4BC0C0', '#9966FF'],
                }]
            }
        });

        // Jumlah Pengemudi per Bus
        new Chart(document.getElementById('pengemudiBusChart'), {
            type: 'horizontalBar',
            data: {
                labels: @json($busLabels),
                datasets: [{
                    label: 'Jumlah Pengemudi',
                    data: @json($busPengemudiData),
                    backgroundColor: 'rgba(255, 99, 132, 0.7)',
                }]
            }
        });

        // Distribusi Keterlambatan
        new Chart(document.getElementById('keterlambatanChart'), {
            type: 'doughnut',
            data: {
                labels: @json($keterlambatanLabels),
                datasets: [{
                    data: @json($keterlambatanData),
                    backgroundColor: ['#FF6384', '#36A2EB', '#FFCE56'],
                }]
            }
        });
    </script>
</body>
</html>
