<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Admin - Create Schedule</title>
    <link href="https://cdn.jsdelivr.net/npm/tailwindcss@2.0.1/dist/tailwind.min.css" rel="stylesheet">
    <style>
        body { font-family: 'Inter', sans-serif; background-color: #F5F7FA; }
        .sidebar { width: 280px; min-height: 100vh; background-color: #1F2937; padding: 20px; position: fixed; top: 0; left: 0; }
        .sidebar a { color: #9CA3AF; padding: 15px; display: block; text-decoration: none; border-radius: 8px; }
        .sidebar a:hover { background-color: #374151; color: #FFFFFF; }
        .main-content { margin-left: 280px; padding: 30px; }
        .header { background-color: #FFFFFF; padding: 20px; border-radius: 12px; margin-bottom: 20px; display: flex; justify-content: space-between; }
        .form-container { background-color: white; padding: 20px; border-radius: 12px; }
        .form-container label { display: block; margin-bottom: 10px; }
        .form-container input { width: 100%; padding: 10px; border: 1px solid #ccc; border-radius: 8px; margin-bottom: 20px; }
        .form-container button { background-color: #1F2937; color: white; padding: 8px 16px; border-radius: 6px; transition: background-color 0.3s ease; }
        .form-container button:hover { background-color: #111827; }
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
        <a href="{{ route('admin.schedules.index') }}" class="bg-gray-700 text-white">Schedule</a>
    </div>

    <!-- Main Content -->
    <div class="main-content">
        <div class="header">
            <h1>Create New Schedule</h1>
        </div>

        <div class="form-container">
            <form action="{{ route('admin.schedules.store') }}" method="POST">
                @csrf
                <label for="bus_id">Bus ID:</label>
                <input type="number" name="bus_id" id="bus_id" required>

                <label for="route_id">Route ID:</label>
                <input type="number" name="route_id" id="route_id" required>

                <label for="departure_time">Departure Time:</label>
                <input type="time" name="departure_time" id="departure_time" required>

                <button type="submit">Create Schedule</button>
            </form>
        </div>
    </div>
</body>
</html>
