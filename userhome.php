<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Student Side</title>
    <style>
        body {
            text-align: center;
            font-family: Arial, sans-serif;
            background-color: #f2f2f2;
        }
        .jio {
            border: 2px solid black;
            display: inline-block;
            padding: 20px;
            background-color: #e5f4f9;
            border-radius: 10px;
            box-shadow: 0 2px 4px rgba(0, 0, 0, 0.2);
            width: 300px;
            margin: 0 auto;
        }
        h1 {
            color: #333;
        }
        label {
            display: block;
            text-align: left;
            font-weight: bold;
        }
        input {
            width: 100%;
            padding: 8px;
            margin: 5px 0;
            border: 1px solid #ccc;
            border-radius: 5px;
        }
        input[type="submit"] {
            background-color: #007bff;
            color: #fff;
            border: none;
            cursor: pointer;
        }
        input[type="submit"]:hover {
            background-color: #0056b3;
        }
        a {
            text-decoration: none;
            color: #007bff;
            display: block;
            margin-top: 10px;
        }
        a:hover {
            text-decoration: underline;
        }
    </style>
</head>
<body>
    <div class="jio">
        <h1>Student Page</h1>
        <form method="get" action="">
            <label for="Student_Id">Student ID:</label>
            <input type="text" name="Student_Id" value="<?php if(isset($_GET['Student_Id'])) {echo $_GET['Student_Id'];} ?>">
            <br><br>
            <input type="submit" value="Submit">
        </form>
        <div class="row">
            <hr>
            <?php
                $con=mysqli_connect("localhost","root","","user");
                if(isset($_GET['Student_Id']))
                {
                    $Student_Id=$_GET['Student_Id'];
                    $query="Select * from result_form where Student_id='$Student_Id'";
                    $query_run=mysqli_query($con,$query);

                    if(mysqli_num_rows($query_run)>0)
                    {
                        foreach($query_run as $row)
                        {
                            ?>
                            <label for ="">Student_Id</label>
                            <input type="id" value="<?= $row['Student_Id']; ?>">
                            <label for ="">Student_Name</label>
                            <input type="id" value="<?= $row['Student_Name']; ?>">
                            <label for ="">Class</label>
                            <input type="id" value="<?= $row['Class']; ?>">
                            <label for ="">Section</label>
                            <input type="id" value="<?= $row['Section']; ?>">
                            <label for ="">Average</label>
                            <input type="id" value="<?= $row['Average']; ?>">
                            <?php
                        }

                    }
                    else
                    {
                        echo "No Record Found";
                    }
                }


            ?>
        </div>
    </div>
    <a href="logout.php">Logout</a>
</body>
</html>
