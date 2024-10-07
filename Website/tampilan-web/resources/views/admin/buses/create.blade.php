<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Admin - Add Bus</title>
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
        <a href="{{ route('admin.news.index') }}">Berita</a>
        <a href="{{ route('admin.buses.index') }}" class="bg-gray-700 text-white">Bus</a>
    </div>

    <!-- Main Content -->
    <div class="main-content">
        <!-- Header -->
        <div class="header">
            <h1>Add New Bus</h1>
        </div>

        <!-- Add Bus Form -->
        <form action="{{ route('admin.buses.store') }}" method="POST">
            @csrf
            <div>
                <label for="bus_number" class="block text-sm font-medium text-gray-700">Bus Number</label>
                <input type="text" name="bus_number" id="bus_number" class="form-input mt-1 block w-full" required>
            </div>
            <div class="mt-4">
                <label for="driver" class="block text-sm font-medium text-gray-700">Driver</label>
                <input type="text" name="driver" id="driver" class="form-input mt-1 block w-full" required>
            </div>
            <div class="mt-4">
                <label for="status" class="block text-sm font-medium text-gray-700">Status</label>
                <select name="status" id="status" class="form-select mt-1 block w-full" required>
                    <option value="active">Active</option>
                    <option value="inactive">Inactive</option>
                </select>
            </div>
            <div class="mt-6">
                <button type="submit" class="bg-blue-600 text-white px-4 py-2 rounded-lg">Add Bus</button>
            </div>
        </form>

        <!-- Footer -->
        <footer>
            <p>&copy; 2024 Transportation Smart Destination. All rights reserved.</p>
        </footer>
    </div>

</body>
</html>
