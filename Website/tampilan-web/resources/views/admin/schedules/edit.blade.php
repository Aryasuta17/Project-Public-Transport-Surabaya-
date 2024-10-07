<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Edit Schedule</title>
    <link href="https://cdn.jsdelivr.net/npm/tailwindcss@2.0.1/dist/tailwind.min.css" rel="stylesheet">
</head>
<body>
    <div class="main-content">
        <h1>Edit Schedule</h1>

        <form action="{{ route('admin.schedules.update', $schedule->id) }}" method="POST">
            @csrf
            @method('PUT')
            <div class="mb-4">
                <label for="bus_id">Bus</label>
                <select name="bus_id" id="bus_id" class="w-full p-2 border border-gray-300 rounded-lg">
                    @foreach($buses as $bus)
                    <option value="{{ $bus->id }}" {{ $bus->id == $schedule->bus_id ? 'selected' : '' }}>{{ $bus->bus_number }}</option>
                    @endforeach
                </select>
            </div>

            <div class="mb-4">
                <label for="route_id">Route</label>
                <select name="route_id" id="route_id" class="w-full p-2 border border-gray-300 rounded-lg">
                    @foreach($routes as $route)
                    <option value="{{ $route->id }}" {{ $route->id == $schedule->route_id ? 'selected' : '' }}>{{ $route->route_name }}</option>
                    @endforeach
                </select>
            </div>

            <div class="mb-4">
                <label for="departure_time">Departure Time</label>
                <input type="text" name="departure_time" id="departure_time" value="{{ $schedule->departure_time }}" class="w-full p-2 border border-gray-300 rounded-lg">
            </div>

            <button type="submit" class="bg-blue-500 text-white p-2 rounded-lg">Update Schedule</button>
        </form>
    </div>
</body>
</html>
