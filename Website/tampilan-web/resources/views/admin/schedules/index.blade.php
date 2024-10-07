<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Admin - Schedule Management</title>
    <!-- Tailwind CSS -->
    <link href="https://cdn.jsdelivr.net/npm/tailwindcss@2.0.1/dist/tailwind.min.css" rel="stylesheet">
    <style>
        body { font-family: 'Inter', sans-serif; background-color: #F5F7FA; }
        .sidebar { width: 280px; min-height: 100vh; background-color: #1F2937; padding: 20px; position: fixed; top: 0; left: 0; }
        .sidebar a { color: #9CA3AF; padding: 15px; display: block; text-decoration: none; border-radius: 8px; }
        .sidebar a:hover { background-color: #374151; color: #FFFFFF; }
        .main-content { margin-left: 280px; padding: 30px; }
        .header { background-color: #FFFFFF; padding: 20px; border-radius: 12px; margin-bottom: 20px; display: flex; justify-content: space-between; }
        .card { background-color: white; padding: 20px; border-radius: 12px; margin-bottom: 20px; }
        .actions button { background-color: #1F2937; color: white; padding: 8px 16px; border-radius: 6px; transition: background-color 0.3s ease; }
        .actions button:hover { background-color: #111827; }
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
        <a href="{{ route('admin.news.index') }}" class="bg-gray-700 text-white">Berita</a>
        <a href="{{ route('admin.buses.index') }}">Bus</a>
        <a href="{{ route('admin.schedules.index') }}" class="bg-gray-700 text-white">Schedule</a>
    </div>

    <!-- Main Content -->
    <div class="main-content">
        <div class="header">
            <h1>Schedule Management</h1>
            <div class="actions">
                <a href="{{ route('admin.schedules.create') }}"><button>New Schedule</button></a>
            </div>
        </div>

        <!-- Schedule Overview -->
        <div class="grid grid-cols-3 gap-6">
            @foreach($schedules as $schedule)
            <div class="card">
                <h2>Bus ID: {{ $schedule->bus_id }}</h2>
                <p>Route ID: {{ $schedule->route_id }}</p>
                <p>Departure Time: {{ $schedule->departure_time }}</p>
                <div class="flex justify-between mt-4">
                    <a href="{{ route('admin.schedules.edit', $schedule->id) }}" class="text-blue-500">Edit</a>
                    <form action="{{ route('admin.schedules.destroy', $schedule->id) }}" method="POST">
                        @csrf
                        @method('DELETE')
                        <button type="submit" class="text-red-500">Delete</button>
                    </form>
                </div>
            </div>
            @endforeach
        </div>
    </div>
</body>
</html>
