 <?php

$host="localhost";
$user="root";
$password="";
$db="user";

session_start();

$con=mysqli_connect($host,$user,$password,$db);
if($con==false)
{
    echo "connection error";
}

if($_SERVER["REQUEST_METHOD"]=="POST")
{
    $username=$_POST["username"];
    $password=$_POST["password"];

    $sql="select * from logintable where username='".$username."' AND   password='".$password."' ";

    $result=mysqli_query($con,$sql);

    $row=mysqli_fetch_array($result);

    if($row["usertype"]=="student")
    {
        $_SESSION["username"]=$username;

        header("location:userhome.php");
    }

    else if($row["usertype"]=="admin")
    {
        $_SESSION["username"]=$admin;

        header("location:adminside.html");
    }
    else
    {
        echo "username or password incorrect";
    }
}

?>

