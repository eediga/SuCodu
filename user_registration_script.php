<?php

$co = mysqli_connect("localhost", "root", "", "innovation") or die(mysqli_error($co));

$name = $_POST['name'];
$clg = $_POST['college']; 
$phone = $_POST['phone'];
$password = $_POST['password'];
$username = $_POST['username'];

echo $username;
mysqli_select_db($co, "innovation");
$res = "select * from student_details where username='".$username."' ";
$re = $result = mysqli_query($co, $res) or die(mysqli_error($conn));
$res2 = mysqli_num_rows($re);
if($res2 == 0)
{
    $user_registration_query = "insert into student_details(name, college,phone,username,password) values ('$name', '$clg', $phone, '$username','$password')";
    $user_registration_submit = mysqli_query($co, $user_registration_query) or die(mysqli_error($co));
    echo $user_registration_submit;
?>
    <script type="text/javascript">
    alert("record inserted");
    location = "index.php";
    </script>

<?php      
}
else
{         
?>
    <script type="text/javascript">
    alert("this username already exists");
    location= "pg1.php";
    </script>      
<?php 
}
?>
