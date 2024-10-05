<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Admin Panel - Transportation Smart Destination</title>
    
    <!-- Import Google Fonts -->
    <link href="https://fonts.googleapis.com/css2?family=Roboto:wght@400;500;700&display=swap" rel="stylesheet">

    <!-- Chart.js -->
    <script src="https://cdn.jsdelivr.net/npm/chart.js"></script>

    <style>
        body {
            font-family: 'Roboto', sans-serif;
            background-color: #f4f4f9;
            margin: 0;
            display: flex;
            height: 100vh;
        }

        /* Sidebar */
        .sidebar {
            width: 230px;
            background-color: #2d3436;
            height: 100vh;
            position: fixed;
            display: flex;
            flex-direction: column;
            align-items: center;
            padding-top: 20px;
        }

        .sidebar h2 {
            color: #ecf0f1;
            font-size: 18px;
            margin-bottom: 40px;
        }

        .sidebar a {
            color: #bdc3c7;
            text-decoration: none;
            padding: 12px 20px;
            display: block;
            width: 100%;
            text-align: left;
            margin-bottom: 8px;
            transition: background 0.2s, color 0.2s;
        }

        .sidebar a:hover {
            background-color: #0984e3;
            color: white;
        }

        /* Konten */
        .main-content {
            margin-left: 230px;
            padding: 20px;
            flex: 1;
        }

        .main-content h1 {
            font-size: 24px;
            color: #2d3436;
            margin-bottom: 15px;
        }

        .card-container {
            display: flex;
            justify-content: space-between;
            margin-bottom: 20px;
        }

        .card {
            background-color: #fff;
            border-radius: 8px;
            box-shadow: 0 2px 8px rgba(0, 0, 0, 0.1);
            width: 30%;
            padding: 20px;
            text-align: center;
        }

        .card h3 {
            margin-bottom: 10px;
            font-size: 18px;
            color: #2d3436;
        }

        .card p {
            font-size: 16px;
            color: #636e72;
        }

        .chart-container {
            margin-top: 30px;
        }

        canvas {
            background-color: #fff;
            border-radius: 8px;
            box-shadow: 0 2px 8px rgba(0, 0, 0, 0.1);
            padding: 15px;
        }

    </style>
</head>
<body>

    <!-- Sidebar -->
    <div class="sidebar">
        <h2>Admin Panel</h2>
        <a href="{{ route('admin.dashboard') }}">Dashboard</a>
        <a href="{{ route('admin.manage.users') }}">Manage Users</a>
        <a href="{{ route('admin.manage.routes') }}">Manage Routes</a>
        <a href="{{ route('admin.manage.transport') }}">Manage Transport</a>
        <a href="{{ route('admin.settings') }}">Settings</a>
        <a href="{{ route('logout') }}">Logout</a>
    </div>

    <!-- Main Content -->
    <div class="main-content">
        @yield('content')
    </div>

    <!-- Script for Charts -->
    <script>
        // Add your chart configurations here
    </script>

</body>
</html>
