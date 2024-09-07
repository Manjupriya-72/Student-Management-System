<?php
if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    // Handle form submission and database insertion
    $s_id = $_POST["student_id"];
    $s_name = $_POST["Student_Name"];
    $gender = $_POST["Gender"];
    $address = $_POST["Address"];
    $class = $_POST["class"];
    $section = $_POST["Section"];
    $con = mysqli_connect("localhost", "root", "", "user");
    $sql = "INSERT INTO students_detail (Student_Id,Student_Name,Gender,Address,Class,Section) VALUES ('$s_id', '$s_name','$gender','$address','$class','$section')";
    $r = mysqli_query($con, $sql);
    
}
?>
