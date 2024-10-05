@extends('admin.layouts.main')

@section('content')
    <h1>Admin Dashboard</h1>

    <!-- Cards Overview -->
    <div class="card-container">
        <div class="card">
            <h3>Total Users</h3>
            <p>1,024</p>
        </div>
        <div class="card">
            <h3>Total Routes</h3>
            <p>256</p>
        </div>
        <div class="card">
            <h3>Total Transports</h3>
            <p>72</p>
        </div>
    </div>

    <!-- Chart -->
    <div class="chart-container">
        <h3>Monthly User Growth</h3>
        <canvas id="userGrowthChart" height="80"></canvas>
    </div>

    <div class="chart-container" style="margin-top: 40px;">
        <h3>Bus Usage Statistics</h3>
        <canvas id="busUsageChart" height="80"></canvas>
    </div>

    <!-- Script for Charts -->
    <script>
        // User Growth Chart
        const ctx1 = document.getElementById('userGrowthChart').getContext('2d');
        const userGrowthChart = new Chart(ctx1, {
            type: 'line',
            data: {
                labels: ['Jan', 'Feb', 'Mar', 'Apr', 'May', 'Jun', 'Jul'],
                datasets: [{
                    label: 'Users',
                    data: [120, 190, 250, 300, 350, 500, 620],
                    backgroundColor: 'rgba(41, 128, 185, 0.2)',
                    borderColor: 'rgba(41, 128, 185, 1)',
                    borderWidth: 2
                }]
            },
            options: {
                responsive: true,
                scales: {
                    y: {
                        beginAtZero: true
                    }
                }
            }
        });

        // Bus Usage Chart
        const ctx2 = document.getElementById('busUsageChart').getContext('2d');
        const busUsageChart = new Chart(ctx2, {
            type: 'bar',
            data: {
                labels: ['Route 1', 'Route 2', 'Route 3', 'Route 4', 'Route 5'],
                datasets: [{
                    label: 'Bus Usage',
                    data: [200, 300, 150, 400, 250],
                    backgroundColor: 'rgba(39, 174, 96, 0.2)',
                    borderColor: 'rgba(39, 174, 96, 1)',
                    borderWidth: 2
                }]
            },
            options: {
                responsive: true,
                scales: {
                    y: {
                        beginAtZero: true
                    }
                }
            }
        });
    </script>
@endsection
