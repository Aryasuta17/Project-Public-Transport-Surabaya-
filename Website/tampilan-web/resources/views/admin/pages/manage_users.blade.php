@extends('admin.layouts.main')

@section('content')
    <h1>Manage Users</h1>

    <!-- Add User Button -->
    <button class="add-btn" onclick="openModal('addUserModal')">Add User</button>

    <!-- Users Table -->
    <table class="styled-table">
        <thead>
            <tr>
                <th>Name</th>
                <th>Email</th>
                <th>Status</th>
                <th>Actions</th>
            </tr>
        </thead>
        <tbody>
            <tr>
                <td>John Doe</td>
                <td>john@example.com</td>
                <td>Active</td>
                <td>
                    <button class="edit-btn" onclick="openModal('editUserModal')">Edit</button>
                    <button class="delete-btn" onclick="confirmDelete()">Delete</button>
                </td>
            </tr>
            <tr>
                <td>Jane Smith</td>
                <td>jane@example.com</td>
                <td>Suspended</td>
                <td>
                    <button class="edit-btn" onclick="openModal('editUserModal')">Edit</button>
                    <button class="delete-btn" onclick="confirmDelete()">Delete</button>
                </td>
            </tr>
        </tbody>
    </table>

    <!-- Modals -->
    <!-- Add User Modal -->
    <div id="addUserModal" class="modal">
        <div class="modal-content">
            <span class="close-btn" onclick="closeModal('addUserModal')">&times;</span>
            <h2>Add New User</h2>
            <form>
                <label for="name">Name</label>
                <input type="text" id="name" name="name" required>

                <label for="email">Email</label>
                <input type="email" id="email" name="email" required>

                <button type="submit">Add User</button>
            </form>
        </div>
    </div>

    <!-- Edit User Modal -->
    <div id="editUserModal" class="modal">
        <div class="modal-content">
            <span class="close-btn" onclick="closeModal('editUserModal')">&times;</span>
            <h2>Edit User</h2>
            <form>
                <label for="name">Name</label>
                <input type="text" id="edit-name" name="name" value="John Doe" required>

                <label for="email">Email</label>
                <input type="email" id="edit-email" name="email" value="john@example.com" required>

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
            if (confirm("Are you sure you want to delete this user?")) {
                // Perform deletion logic here
                alert("User deleted.");
            }
        }
    </script>
@endsection
