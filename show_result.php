<?php

require_once('db.php');
$query="select * from result_form";
$result=mysqli_query($con,$query);

?>







<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>RESULTS</title>
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
    </style>
</head>
<body>
    <div class="container">
        <div class="row">
            <div class="col">
                <div class="card">
                    <div class="card-header">
                        <h2>RESULTS</h2>
                    </div>
                    <div class="card-body">
                        <table>
                            <tr>
                                <td>Student_Id</td>
                                <td>Student_Name</td>
                                <td>Class</td>
                                <td>Section</td>
                                <td>Average</td>
                                <td>Edit</td>
                                <td>Delete</td>
                            </tr>
                            <tr>
                            <?php
                               while($row=mysqli_fetch_assoc($result))
                               {
                            ?>
                                <td><?php echo $row['Student_Id']; ?></td>
                                <td><?php echo $row['Student_Name']; ?></td>
                                <td><?php echo $row['Class']; ?></td>
                                <td><?php echo $row['Section']; ?></td>
                                <td><?php echo $row['Average']; ?></td>
                                <td><a href="#" class="btn btn-primary">Edit</a></td>
                                <td><a href="#" class="btn btn-danger">Delete</a></td>
                            </tr>
                            <?php
                               }
                            ?>
                        </table>
                    <div>
                </div>
            </div>
        </div>
    </div>   

    
</body>
</html>