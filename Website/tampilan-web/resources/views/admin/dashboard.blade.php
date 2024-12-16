<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>OLAP Dashboard</title>
    <link href="https://cdn.jsdelivr.net/npm/tailwindcss@2.0.1/dist/tailwind.min.css" rel="stylesheet">
    <script src="https://cdn.jsdelivr.net/npm/chart.js"></script>

    <style>
        body {
            font-family: 'Inter', sans-serif;
            background-color: #F5F7FA;
        }

        .sidebar {
            width: 280px;
            min-height: 100vh;
            background-color: #1F2937;
            position: fixed;
            top: 0;
            left: 0;
            display: flex;
            flex-direction: column;
            padding: 20px;
        }

        .sidebar a {
            color: #9CA3AF;
            padding: 15px;
            margin: 10px 0;
            display: block;
            text-decoration: none;
            border-radius: 8px;
            transition: background-color 0.3s ease-in-out, color 0.3s ease-in-out;
        }

        .sidebar a:hover {
            background-color: #374151;
            color: #FFFFFF;
        }

        .main-content {
            margin-left: 280px;
            padding: 30px;
            background-color: #F9FAFB;
        }

        .header {
            background-color: #FFFFFF;
            padding: 20px;
            border-radius: 12px;
            margin-bottom: 20px;
            box-shadow: 0 2px 10px rgba(0, 0, 0, 0.05);
            display: flex;
            justify-content: space-between;
            align-items: center;
        }

        .header h1 {
            font-size: 1.75rem;
            font-weight: 700;
            color: #1F2937;
        }

        .header .actions button {
            background-color: #1F2937;
            color: white;
            padding: 8px 16px;
            border-radius: 6px;
            transition: background-color 0.3s ease;
        }

        .header .actions button:hover {
            background-color: #111827;
        }
    </style>
</head>
<body>

    <!-- Sidebar -->
    <div class="sidebar">
        <div class="logo">
            <a href="{{ route('welcome') }}">
                <img src="{{ asset('images/logo.png') }}" alt="Logo">
            </a>
        </div>
        <a href="{{ route('admin.dashboard') }}">Home</a>
        <a href="{{ route('admin.news.index') }}">Berita</a>
        <a href="{{ route('admin.buses.index') }}">Bus</a>
        <a href="{{ route('admin.schedules.index') }}">Schedule</a>
    </div>

    <!-- Main Content -->
    <div class="main-content">
        <!-- Header -->
        <div class="header">
            <h1>Dashboard Admin</h1>
            <div class="actions">
                <form action="{{ route('logout') }}" method="POST">
                    @csrf
                    <button type="submit">Logout</button>
                </form>
            </div>
        </div>

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
                <h2 class="text-lg font-bold mb-4">Pendapatan per Halte</h2>
                <canvas id="pendapatanRuteBarChart"></canvas>
            </div>

            <!-- Jumlah Pelanggan per Rute -->
            <div class="bg-white p-4 rounded shadow">
                <h2 class="text-lg font-bold mb-4">Jumlah Pelanggan per Rute</h2>
                <canvas id="pelangganRuteChart"></canvas>
            </div>

            <!-- Pendapatan per Bulan -->
            <div class="bg-white p-4 rounded shadow">
                <h2 class="text-lg font-bold mb-4">Pendapatan per Bulan</h2>
                <canvas id="pendapatanBulanChart"></canvas>
            </div>

            <!-- Pendapatan Harian -->
            <div class="bg-white p-4 rounded shadow">
                <!-- Judul -->
                <h2 class="text-lg font-bold text-center mb-4">Pendapatan Harian untuk Bulan {{ $bulanTerpilih ?? 'Semua Bulan' }}</h2>
                
                <!-- Dropdown di bawah judul -->
                <form method="GET" action="{{ route('admin.dashboard') }}" class="mb-4 flex justify-center">
                    <select name="bulan" id="bulan" class="w-48 border-gray-300 rounded-md shadow-sm mr-2">
                        <option value="">-- Semua Bulan --</option>
                        @foreach ($bulanLabels as $bulan)
                            <option value="{{ $bulan }}" {{ $bulanTerpilih == $bulan ? 'selected' : '' }}>
                                {{ $bulan }}
                            </option>
                        @endforeach
                    </select>
                    <button type="submit" class="px-4 py-2 bg-blue-600 text-white rounded">Tampilkan</button>
                </form>

                <!-- Grafik -->
                <canvas id="pendapatanHarianChart"></canvas>
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
            }
        });

        // Jumlah Pelanggan per Rute
        new Chart(document.getElementById('pelangganRuteChart'), {
            type: 'bar',
            data: {
                labels: @json($pelangganRuteLabels),
                datasets: [{
                    label: 'Jumlah Pelanggan',
                    data: @json($pelangganRuteData),
                    backgroundColor: 'rgba(153, 102, 255, 0.7)'
                }]
            }
        });

        // Pendapatan per Bulan
        new Chart(document.getElementById('pendapatanBulanChart'), {
            type: 'bar',
            data: {
                labels: @json($bulanLabels),
                datasets: [{
                    label: 'Total Pendapatan',
                    data: @json($bulanData),
                    backgroundColor: 'rgba(54, 162, 235, 0.7)'
                }]
            }
        });

        // Pendapatan Harian
        @if ($bulanTerpilih)
            new Chart(document.getElementById('pendapatanHarianChart'), {
                type: 'line',
                data: {
                    labels: @json($harianLabels),
                    datasets: [{
                        label: 'Total Pendapatan',
                        data: @json($harianData),
                        backgroundColor: 'rgba(255, 99, 132, 0.7)',
                        borderColor: 'rgba(255, 99, 132, 1)',
                        fill: false
                    }]
                }
            });
        @endif
    </script>
</body>
</html>
