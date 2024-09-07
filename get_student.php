<?php

require_once('db.php');

// Get the posted data
$data = json_decode(file_get_contents('php://input'), true);

$id = $data['id'];

// Fetch the student details from the database
$query = "SELECT * FROM students_detail WHERE Student_Id = ?";
$stmt = $con->prepare($query);
$stmt->bind_param('i', $id);
$stmt->execute();
$result = $stmt->get_result();
$student = $result->fetch_assoc();

echo json_encode($student);

$stmt->close();
$con->close();
?>
