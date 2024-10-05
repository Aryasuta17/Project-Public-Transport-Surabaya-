@extends('admin.layouts.main')

@section('content')
    <h1>Manage Transport</h1>

    <!-- Add Transport Button -->
    <button class="add-btn" onclick="openModal('addTransportModal')">Add Transport</button>

    <!-- Transport Table -->
    <table class="styled-table">
        <thead>
            <tr>
                <th>Bus Code</th>
                <th>Capacity</th>
                <th>Status</th>
                <th>Actions</th>
            </tr>
        </thead>
        <tbody>
            <tr>
                <td>Bus A273</td>
                <td>40</td>
                <td>Operational</td>
                <td>
                    <button class="edit-btn" onclick="openModal('editTransportModal')">Edit</button>
                    <button class="delete-btn" onclick="confirmDelete()">Delete</button>
                </td>
            </tr>
            <tr>
                <td>Bus B354</td>
                <td>30</td>
                <td>Under Maintenance</td>
                <td>
                    <button class="edit-btn" onclick="openModal('editTransportModal')">Edit</button>
                    <button class="delete-btn" onclick="confirmDelete()">Delete</button>
                </td>
            </tr>
        </tbody>
    </table>

    <!-- Modals -->
    <!-- Add Transport Modal -->
    <div id="addTransportModal" class="modal">
        <div class="modal-content">
            <span class="close-btn" onclick="closeModal('addTransportModal')">&times;</span>
            <h2>Add New Transport</h2>
            <form>
                <label for="bus-code">Bus Code</label>
                <input type="text" id="bus-code" name="bus-code" required>

                <label for="capacity">Capacity</label>
                <input type="number" id="capacity" name="capacity" required>

                <label for="status">Status</label>
                <select id="status" name="status" required>
                    <option value="Operational">Operational</option>
                    <option value="Under Maintenance">Under Maintenance</option>
                </select>

                <button type="submit">Add Transport</button>
            </form>
        </div>
    </div>

    <!-- Edit Transport Modal -->
    <div id="editTransportModal" class="modal">
        <div class="modal-content">
            <span class="close-btn" onclick="closeModal('editTransportModal')">&times;</span>
            <h2>Edit Transport</h2>
            <form>
                <label for="bus-code">Bus Code</label>
                <input type="text" id="edit-bus-code" name="bus-code" value="Bus A273" required>

                <label for="capacity">Capacity</label>
                <input type="number" id="edit-capacity" name="capacity" value="40" required>

                <label for="status">Status</label>
                <select id="edit-status" name="status" required>
                    <option value="Operational">Operational</option>
                    <option value="Under Maintenance">Under Maintenance</option>
                </select>

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
            if (confirm("Are you sure you want to delete this transport?")) {
                alert("Transport deleted.");
            }
        }
    </script>
@endsection
