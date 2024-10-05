@extends('admin.layouts.main')

@section('content')
    <h1>Settings</h1>

    <!-- Settings Form -->
    <form>
        <label for="site-name">Site Name</label>
        <input type="text" id="site-name" name="site-name" value="Transportation Smart Destination" required>

        <label for="admin-email">Admin Email</label>
        <input type="email" id="admin-email" name="admin-email" value="admin@transport.com" required>

        <label for="maintenance-mode">Maintenance Mode</label>
        <select id="maintenance-mode" name="maintenance-mode">
            <option value="off">Off</option>
            <option value="on">On</option>
        </select>

        <button type="submit" class="save-btn">Save Settings</button>
    </form>
@endsection
