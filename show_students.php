<?php

require_once('db.php');

// Fetch all students' details
$query = "SELECT * FROM students_detail";
$result = mysqli_query($con, $query);

?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="#">
    <title>STUDENTS</title>
    <style>
        body {
            font-family: Arial, sans-serif;
            background-color: #f2f2f2;
            margin: 0;
            padding: 0;
        }
        .container {
            max-width: 800px;
            margin: 0 auto;
            padding: 20px;
        }
        .card {
            border: 1px solid #ccc;
            border-radius: 5px;
            box-shadow: 0 2px 4px rgba(0, 0, 0, 0.1);
        }
        .card-header {
            background-color: #007bff;
            color: #fff;
            padding: 10px;
            text-align: center;
        }
        .card-body {
            padding: 20px;
        }
        table {
            width: 100%;
            border-collapse: collapse;
        }
        th, td {
            border: 1px solid #ccc;
            padding: 8px;
            text-align: left;
        }
        th {
            background-color: #f2f2f2;
        }
        .btn {
            text-decoration: none;
            padding: 5px 10px;
            border: none;
            border-radius: 3px;
            cursor: pointer;
        }
        .btn-primary {
            background-color: #007bff;
            color: #fff;
        }
        .btn-danger {
            background-color: #dc3545;
            color: #fff;
        }
        .modal {
            display: none;
            position: fixed;
            top: 0;
            left: 0;
            width: 100%;
            height: 100%;
            background-color: rgba(0, 0, 0, 0.5);
            justify-content: center;
            align-items: center;
        }
        .modal-content {
            background-color: #fff;
            padding: 20px;
            border-radius: 5px;
        }
        .close {
            position: absolute;
            top: 10px;
            right: 10px;
            cursor: pointer;
        }
    </style>
</head>
<body>
    <div class="container">
        <div class="row">
            <div class="col">
                <div class="card">
                    <div class="card-header">
                        <h2>STUDENTS</h2>
                    </div>
                    <div class="card-body">
                        <table id="studentTable">
                            <tr>
                                <!-- Table headers -->
                                <!-- Add a new column for Edit and Delete buttons -->
                                <td>Student_Id</td>
                                <td>Student_Name</td>
                                <td>Gender</td>
                                <td>Address</td>
                                <td>Class</td>
                                <td>Section</td>
                                <td>Edit</td>
                                <td>Delete</td>
                            </tr>
                            <?php
                            while ($row = mysqli_fetch_assoc($result)) {
                                ?>
                                <tr>
                                    <!-- Display student details -->
                                    <td><?php echo $row['Student_Id']; ?></td>
                                    <td><?php echo $row['Student_Name']; ?></td>
                                    <td><?php echo $row['Gender']; ?></td>
                                    <td><?php echo $row['Address']; ?></td>
                                    <td><?php echo $row['Class']; ?></td>
                                    <td><?php echo $row['Section']; ?></td>
                                    <!-- Add Edit and Delete buttons with student id as data attribute -->
                                    <td><a href="#" class="btn btn-primary edit-btn" data-id="<?php echo $row['Student_Id']; ?>">Edit</a></td>
                                    <td><a href="#" class="btn btn-danger">Delete</a></td>
                                </tr>
                                <?php
                            }
                            ?>
                        </table>
                    </div>
                </div>
            </div>
        </div>
    </div>

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
        // JavaScript code for handling edit functionality

        // Get modal and buttons
        var modal = document.getElementById("editModal");
        var editButtons = document.getElementsByClassName("edit-btn");
        var editForm = document.getElementById("editForm");
        var studentTable = document.getElementById("studentTable");

        // Attach click event to each edit button
        for (var i = 0; i < editButtons.length; i++) {
            editButtons[i].addEventListener("click", function () {
                // Get student ID from data attribute
                var studentId = this.getAttribute("data-id");

                // You can use AJAX to fetch the student details based on the ID and populate the form fields
                // For simplicity, let's assume you have the details in JavaScript (replace this with AJAX in a real scenario)
                var studentDetails = {
                    name: "",
                    gender: "",
                    address: "",
                    // Add more fields as needed
                };

                // Populate form fields with student details
                document.getElementById("editId").value = studentId;
                document.getElementById("editName").value = studentDetails.name;
                document.getElementById("editGender").value = studentDetails.gender;
                document.getElementById("editAddress").value = studentDetails.address;

                // Display the modal
                modal.style.display = "block";
            });
        }

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

        // Function to close the modal
        function closeModal() {
            modal.style.display = "none";
        }
    </script>
</body>
</html>
