<?php

require_once('db.php');
$query="select * from classes";
$result=mysqli_query($con,$query);

?>







<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="#">
    <title>CLASSES</title>
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
            background-color: grey;
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
                        <h2>CLASSES</h2>
                    </div>
                    <div class="card-body">
                        <table>
                            <tr>
                                <td>Class Name</td>
                                <td>Section</td>
                                <td>Edit</td>
                                <td>Delete</td>
                            </tr>
                            <tr>
                            <?php
                               while($row=mysqli_fetch_assoc($result))
                               {
                            ?>
                                <td><?php echo $row['class_name']; ?></td>
                                <td><?php echo $row['section']; ?></td>
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