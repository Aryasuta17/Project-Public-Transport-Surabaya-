<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Create Schedule</title>
    <link href="https://cdn.jsdelivr.net/npm/tailwindcss@2.0.1/dist/tailwind.min.css" rel="stylesheet">
</head>
<body>
    <div class="main-content">
        <h1>Create New Schedule</h1>

        <form action="{{ route('admin.schedules.store') }}" method="POST">
            @csrf
            <div class="mb-4">
                <label for="bus_id">Bus</label>
                <select name="bus_id" id="bus_id">
                    @foreach($buses as $bus)
                    <option value="{{ $bus->id }}">{{ $bus->bus_number }}</option>
                    @endforeach
                </select>
            </div>

            <div class="mb-4">
                <label for="route_id">Route</label>
                <select name="route_id" id="route_id">
                    @foreach($routes as $route)
                    <option value="{{ $route->id }}">{{ $route->route_name }}</option>
                    @endforeach
                </select>
            </div>

            <div class="mb-4">
                <label for="departure_time">Departure Time</label>
                <input type="text" name="departure_time" id="departure_time" placeholder="HH:MM:SS" class="w-full p-2 border border-gray-300 rounded-lg">
            </div>

            <button type="submit" class="bg-blue-500 text-white p-2 rounded-lg">Create Schedule</button>
        </form>
    </div>
</body>
</html>
