
<?php
session_start();
$servername = "localhost";
$username = "root";
$password="";
$dbname = "innovation";

$conn = mysqli_connect($servername, $username, $password, $dbname);

if (!$conn) {
    die("Connection failed: " . mysqli_connect_error());
}
$unme=$_POST['user_name'];
$_SESSION["username"]=$unme;
$ps=$_POST["pwd"];
$_SESSION["password"]=$ps;
echo $ps;

$sql = "SELECT * FROM student_details WHERE username = '".$unme."' ";
$sq2 = "SELECT * FROM student_details WHERE username = '".$unme."' and password = '".$ps."' ";


$result = mysqli_query($conn, $sql) or die(mysqli_error($conn));
$result1 = mysqli_query($conn, $sq2) or die(mysqli_error($conn));


if (mysqli_num_rows($result)> 0) 
{
    // output data of each row
    if(mysqli_num_rows($result1)> 0)
    {
        header("Location:quiz.php");
    }
    else
    {?>
        <script>   
        alert("wrong password");
        location="index.php";</script>";<?php
    }  
}
else 
{
?>
    <script>
        alert("Enter valid username");
        location="index.php";
    </script>
<?php
}
mysqli_close($conn);
?>
