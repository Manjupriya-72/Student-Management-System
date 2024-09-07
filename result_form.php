<?php
if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    // Handle form submission and database insertion
    $s_id = $_POST["student_id"];
    $s_name = $_POST["Student_Name"];
    $class = $_POST["class"];
    $section = $_POST["Section"];
    $average =$_POST["Average"];
    $con = mysqli_connect("localhost", "root", "", "user");
    $sql = "INSERT INTO result_form (Student_Id,Student_Name,Class,Section,Average) VALUES ('$s_id', '$s_name','$class','$section','$average')";
    $r = mysqli_query($con, $sql);
    
}
?>
