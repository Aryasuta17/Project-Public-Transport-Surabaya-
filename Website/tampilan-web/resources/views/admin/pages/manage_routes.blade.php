@extends('admin.layouts.main')

@section('content')
    <h1>Manage Routes</h1>

    <!-- Add Route Button -->
    <button class="add-btn" onclick="openModal('addRouteModal')">Add Route</button>

    <!-- Routes Table -->
    <table class="styled-table">
        <thead>
            <tr>
                <th>Route Name</th>
                <th>Start</th>
                <th>End</th>
                <th>Actions</th>
            </tr>
        </thead>
        <tbody>
            <tr>
                <td>Route 1</td>
                <td>Station A</td>
                <td>Station B</td>
                <td>
                    <button class="edit-btn" onclick="openModal('editRouteModal')">Edit</button>
                    <button class="delete-btn" onclick="confirmDelete()">Delete</button>
                </td>
            </tr>
            <tr>
                <td>Route 2</td>
                <td>Station C</td>
                <td>Station D</td>
                <td>
                    <button class="edit-btn" onclick="openModal('editRouteModal')">Edit</button>
                    <button class="delete-btn" onclick="confirmDelete()">Delete</button>
                </td>
            </tr>
        </tbody>
    </table>

    <!-- Modals -->
    <!-- Add Route Modal -->
    <div id="addRouteModal" class="modal">
        <div class="modal-content">
            <span class="close-btn" onclick="closeModal('addRouteModal')">&times;</span>
            <h2>Add New Route</h2>
            <form>
                <label for="route-name">Route Name</label>
                <input type="text" id="route-name" name="route-name" required>

                <label for="start">Start</label>
                <input type="text" id="start" name="start" required>

                <label for="end">End</label>
                <input type="text" id="end" name="end" required>

                <button type="submit">Add Route</button>
            </form>
        </div>
    </div>

    <!-- Edit Route Modal -->
    <div id="editRouteModal" class="modal">
        <div class="modal-content">
            <span class="close-btn" onclick="closeModal('editRouteModal')">&times;</span>
            <h2>Edit Route</h2>
            <form>
                <label for="route-name">Route Name</label>
                <input type="text" id="edit-route-name" name="route-name" value="Route 1" required>

                <label for="start">Start</label>
                <input type="text" id="edit-start" name="start" value="Station A" required>

                <label for="end">End</label>
                <input type="text" id="edit-end" name="end" value="Station B" required>

                <button type="submit">Save Changes</button>
            </form>
        </div>
    </div>

    <!-- JavaScript for Modals -->
    <script>
        function openModal(modalId) {
            document.getElementById(modalId).style.display = 'block';
        }

        function closeModal(modalId) {
            document.getElementById(modalId).style.display = 'none';
        }

        function confirmDelete() {
            if (confirm("Are you sure you want to delete this route?")) {
                alert("Route deleted.");
            }
        }
    </script>
@endsection
