<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Admin Dashboard</title>
    <link href="https://cdn.jsdelivr.net/npm/tailwindcss@2.0.1/dist/tailwind.min.css" rel="stylesheet">

    <!-- Custom styles for modern look -->
    <style>
        /* Global Font Styling */
        body {
            font-family: 'Inter', sans-serif;
            background-color: #F5F7FA;
        }

        /* Sidebar styling */
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

        .sidebar .logo {
            margin-bottom: 20px;
        }

        .sidebar .logo img {
            width: 160px;
        }

        /* Main content */
        .main-content {
            margin-left: 280px;
            padding: 30px;
            background-color: #F9FAFB;
        }

        /* Header */
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

        .header .actions {
            display: flex;
            gap: 10px;
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

        /* Cards */
        .card {
            background-color: white;
            padding: 20px;
            border-radius: 12px;
            box-shadow: 0 2px 10px rgba(0, 0, 0, 0.05);
            margin-bottom: 20px;
            transition: transform 0.3s ease-in-out;
        }

        .card:hover {
            transform: translateY(-5px);
        }

        .card h2 {
            font-size: 1.5rem;
            font-weight: 600;
            color: #1F2937;
            margin-bottom: 10px;
        }

        .card p {
            color: #6B7280;
        }

        /* Footer */
        footer {
            text-align: center;
            padding: 20px;
            background-color: #F3F4F6;
            margin-top: 20px;
            border-radius: 12px;
        }

        footer p {
            color: #6B7280;
            font-size: 0.875rem;
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
        <a href="{{ route('admin.dashboard') }}" class="bg-gray-700 text-white">Home</a>
        <a href="{{ route('admin.news') }}">Berita</a>
        <a href="{{ route('admin.buses') }}">Bus</a>
    </div>

    <!-- Main Content -->
    <div class="main-content">
        <!-- Header -->
        <div class="header">
            <h1>Welcome, Admin</h1>
            <div class="actions">
                <!-- Logout Button -->
                <form action="{{ route('logout') }}" method="POST">
                    @csrf
                    <button type="submit">Logout</button>
                </form>
            </div>
        </div>

        <!-- Dashboard Overview -->
        <div class="grid grid-cols-3 gap-6">
            <!-- Home Overview Card -->
            <div class="card">
                <h2>Admin Home</h2>
                <p>Access general settings, manage users, and more.</p>
            </div>

            <!-- Berita Overview Card -->
            <div class="card">
                <h2>Berita</h2>
                <p>Manage all news articles, publish or delete posts.</p>
            </div>

            <!-- Bus Overview Card -->
            <div class="card">
                <h2>Bus Management</h2>
                <p>View and manage bus routes, schedules, and drivers.</p>
            </div>
        </div>

        <!-- Footer -->
        <footer>
            <p>&copy; 2024 Transportation Smart Destination. All rights reserved.</p>
        </footer>
    </div>

</body>

</html>
