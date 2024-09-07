<?php
if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    // Handle form submission and database insertion
    $cn = $_POST["className"];
    $sc = $_POST["section"];
    $con = mysqli_connect("localhost", "root", "", "user");
    $sql = "INSERT INTO classes (class_name, section) VALUES ('$cn', '$sc')";
    $r = mysqli_query($con, $sql);
    
    if ($r) {
        // If the query was successful, show a success message
        echo '<script>alert("New class added successfully");</script>';
    } else {
        // If there was an error, show an error message
        echo '<script>alert("Error: ' . mysqli_error($con) . '");</script>';
    }
}
?>

