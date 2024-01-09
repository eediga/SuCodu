<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html>
        <head>
        <title> products</title>
        <link rel="stylesheet" href="bootstrap/css/bootstrap.min.css" type="text/css">
        <script type="text/javascript" src="bootstrap/js/jquery-3.1.1.min.js">            
        </script>
        <script type="text/javascript" src="bootstrap/js/bootstrap.min.js"></script>

        <link href="css/index.css" rel="stylesheet" type="text/css"/></link>
        
        <link rel="stylesheet" href="index.css" type="text/css"></link>
    </head>
    <body>
<div class="content_after_header">
    <div class="container">
        
        <div class="jumbotron">
            <center><h1>Thank You For Participating</h1></center>
            
        </div>
    </div>
</div>

        
    </body>
</html>
    
<?php //

session_start();
$servername = "localhost";
$username = "root";
$password="";
$dbname = "innovation";
$um1 = $_SESSION['username'];
$num1=0;
$conn = mysqli_connect($servername, $username, $password, $dbname);
    $answers = array("9","7","1","6","8","5","3",
        "5","7","9","1","6","8",
        "6","3","8","2","4","7",
        "3","1","2","9","6",
        "2","7","4","1","3",
        "1","6","4","3","2","8","7",
        "9","3","7","8","4","2",
        "3","4","7","1","8","5",
        "2","8","6","4","5","9","7");
$flag = 0;
$j=0;
for($i=1;$i<=55;$i++)
{
    if(isset($_POST[$i]))
    {
        $tbid = $_POST[$i];
        if ($tbid == $answers[$j]) {
            $j++;
        }
        else
        {
            $j++;

            $flag = 1;

            break;
        }
    }
    else
    {
        $j++;
    }
}
if($flag == 1)
{
//    echo "******************************* INCORRET   *****************************";
    $sql = "update `student_details` set `sudoku` = 'Wrong' where `username`= '$um1' ";
    $result = mysqli_query($conn, $sql) or die(mysqli_error($conn));

}
else
{
//    echo "*******************************  Correct   *****************************";
    $sql = "update `student_details` set `sudoku` = 'Correct' where `username`= '$um1' ";
    $result = mysqli_query($conn, $sql) or die(mysqli_error($conn)); 
}

$num1 = $_POST['timer'];
$num1 = $num1/1000;
$ques_score = $_POST['quiz_score'];

$sql2 = "update `student_details` set `time` = $num1 where `username`= '$um1' ";
$sql3 = "update `student_details` set `Score` = $ques_score where `username`= '$um1' ";
$result2 = mysqli_query($conn, $sql2) or die(mysqli_error($conn));
$result3 = mysqli_query($conn, $sql3) or die(mysqli_error($conn));

?>
   