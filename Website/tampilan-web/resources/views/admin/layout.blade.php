<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Admin Dashboard</title>
    <!-- Bootstrap 5 CSS -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha1/dist/css/bootstrap.min.css" rel="stylesheet">
    <!-- Custom CSS -->
    <style>
        .sidebar {
            height: 100vh;
            background-color: #2a2f3a;
            color: white;
            padding: 20px;
            position: fixed;
            width: 250px;
        }

        .sidebar h3 {
            color: #ff6347;
            text-align: center;
            margin-bottom: 30px;
        }

        .sidebar .nav-link {
            color: #d1d1d1;
            padding: 10px;
            border-radius: 8px;
            transition: background-color 0.3s ease;
        }

        .sidebar .nav-link.active, .sidebar .nav-link:hover {
            background-color: #ff6347;
            color: white;
        }

        .content {
            margin-left: 270px;
            padding: 20px;
        }
    </style>
</head>
<body>
    <div class="sidebar">
        <h3>Admin Dashboard</h3>
        <ul class="nav flex-column">
            <li class="nav-item">
                <a class="nav-link" href="{{ route('admin.dashboard') }}">Home</a>
            </li>
            <li class="nav-item">
                <a class="nav-link" href="{{ route('admin.news') }}">Berita</a>
            </li>
            <li class="nav-item">
                <a class="nav-link" href="{{ route('admin.buses') }}">Bus</a>
            </li>
        </ul>
    </div>

    <div class="content">
        @yield('content')
    </div>

    <!-- Bootstrap JS -->
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha1/dist/js/bootstrap.bundle.min.js"></script>
</body>
</html>
