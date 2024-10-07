<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Admin - Berita</title>
    <!-- Tailwind CSS -->
    <link href="https://cdn.jsdelivr.net/npm/tailwindcss@2.0.1/dist/tailwind.min.css" rel="stylesheet">
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

        .sidebar .logo {
            margin-bottom: 20px;
        }

        .sidebar .logo img {
            width: 160px;
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
        <a href="{{ route('admin.dashboard') }}">Home</a>
        <a href="{{ route('admin.news.index') }}" class="bg-gray-700 text-white">Berita</a>
        <a href="{{ route('admin.buses.index') }}">Bus</a>
        <a href="{{ route('admin.schedules.index') }}" >Schedule</a>
    </div>

    <!-- Main Content -->
    <div class="main-content">
        <!-- Header -->
        <div class="header">
            <h1>Berita Management</h1>
            <div class="actions">
                <a href="{{ route('admin.news.create') }}">
                    <button>New Post</button>
                </a>
            </div>
        </div>

        <!-- News Overview -->
        <div class="grid grid-cols-3 gap-6">
            @foreach($news as $berita)
            <div class="card">
                <img src="{{ asset('storage/' . $berita->image) }}" alt="News Image" class="w-full h-48 object-cover rounded-lg mb-4">
                <h2>{{ $berita->title }}</h2>
                <p>{{ Str::limit($berita->content, 100) }}</p>
                <div class="flex justify-between mt-4">
                    <a href="{{ route('admin.news.edit', $berita->id) }}" class="text-blue-500">Edit</a>
                    <form action="{{ route('admin.news.destroy', $berita->id) }}" method="POST">
                        @csrf
                        @method('DELETE')
                        <button type="submit" class="text-red-500">Delete</button>
                    </form>
                </div>
            </div>
            @endforeach
        </div>

        <!-- Footer -->
        <footer>
            <p>&copy; 2024 Transportation Smart Destination. All rights reserved.</p>
        </footer>
    </div>

</body>
</html>
