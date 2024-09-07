<!-- ... (your HTML code) ... -->

<!-- Modal for editing student details -->
<div id="editModal" class="modal">
    <div class="modal-content">
        <span class="close" onclick="closeModal()">&times;</span>
        <h2>Edit Student</h2>
        <!-- Form for editing student details -->
        <form id="editForm" method="post">
            <!-- Input fields for editing -->
            <input type="hidden" id="editId" name="editId"> <!-- Hidden field to store the student ID -->

            <label for="editName">Name:</label>
            <input type="text" id="editName" name="editName">

            <label for="editGender">Gender:</label>
            <input type="text" id="editGender" name="editGender">

            <label for="editAddress">Address:</label>
            <input type="text" id="editAddress" name="editAddress">

            <!-- Add more fields as needed -->

            <!-- Save and Cancel buttons -->
            <button type="button" class="btn btn-primary" onclick="saveEdit()">Save</button>
            <button type="button" class="btn btn-secondary" onclick="closeModal()">Cancel</button>
        </form>
    </div>
</div>

<script>
    // ... (your existing JavaScript code) ...

    // Function to save edited data
    function saveEdit() {
        // Get the edited data from the form
        var editedId = document.getElementById("editId").value;
        var editedName = document.getElementById("editName").value;
        var editedGender = document.getElementById("editGender").value;
        var editedAddress = document.getElementById("editAddress").value;

        // Update the table row with the edited data
        var row = document.querySelector(`#studentTable tr[data-id="${editedId}"]`);
        if (row) {
            row.innerHTML = `
                <td>${editedId}</td>
                <td>${editedName}</td>
                <td>${editedGender}</td>
                <td>${editedAddress}</td>
                <!-- Add more fields as needed -->
                <td>Edit</td>
                <td>Delete</td>
            `;
        }

        // Close the modal
        closeModal();

        // Update the database using AJAX
        fetch('update_student.php', {
            method: 'POST',
            headers: {
                'Content-Type': 'application/json',
            },
            body: JSON.stringify({
                id: editedId,
                name: editedName,
                gender: editedGender,
                address: editedAddress,
                // Add more fields as needed
            }),
        })
        .then(response => response.json())
        .then(data => {
            // Handle the response from the server if needed
            console.log(data);
        })
        .catch(error => {
            console.error('Error:', error);
        });
    }

    // ... (your existing JavaScript code) ...
</script>
</body>
</html>
