<?php
session_start();
$_SESSION["myValue"] = 0;
$_SESSION["myValue1"] = 0;
?>

<html>
<head>
        <link rel="stylesheet" href="bootstrap/css/bootstrap.min.css" type="text/css">
        <script type="text/javascript" src="bootstrap/js/jquery-3.1.1.min.js">            
        </script>
        <script type="text/javascript" src="bootstrap/js/bootstrap.min.js"></script>
        <script type="text/javascript" src="js/functions.js"></script>        
        <link rel="stylesheet" href="index.css" type="text/css">
<title>Login here</title>
<style>


 footer{
       padding: 15px 0px; 
            background-color: #101010;
                 color:#9d9d9d; 
                    bottom: 0;
                     position: absolute;
                        width: 100%; 
  }
  .container{
     text-align: center;
  }
  .for_login{
    padding-right: 10px;
  }
</style>

</head>
<body>

  <nav class = "navbar navbar-inverse navbar-fixed-top">
    <div class="navbar-header">
    <button type="button" class="navbar-toggle" data-toggle="collapse" data-target="#myNavbar">
      <span class="icon-bar"></span>
      <span class="icon-bar"></span>
      <span class="icon-bar"></span>
    </button>
        <div class="row">
            
        </div>
        <a href="index.php" class="navbar-brand">SuCodu</a>
         <img src="img/inno1.png" alt="text" style="margin-left:500px">
    </div>
    <div class="collapse navbar-collapse" id="myNavbar">
    <ul class="nav navbar-nav navbar-right"> 
        <li><a href="signup.php"><span class="glyphicon glyphicon-user"></span>Sign up</a></li>
    <li class="for_login"><a href="login.php"><span class="glyphicon glyphicon-log-in"></span>Login</a></li>
    </ul>
    </div>
  </nav>


  <h2>LOGIN</h2>
  <div class="col-xs-6 col-xs-offset-3" style="margin-top: 50px">
      <div class="panel panel-primary" style="height: 400px" >
    <div class="panel-heading"> Login Here</div>
        <div class="container">
            <div class="row">
                <div class="panel-body ">
                    <!--Enter your code here-->
                <form action="login.php" method="post" name="frm_login" id="frm_login">
                    <div class="form-group" style="margin-top:10px">
                        <label for="username" >Username:</label>
                        <input type="text" class="form-control" name="user_name" size="13" id="mail_id" placeholder="userame">
                    </div>
                    <div class="form-group">
                        <label for="pwd">Password:</label>
                        <input type="password" class="form-control" name="pwd" id="pwd"  size="13" placeholder="password">
                    </div>
                    <div class="form-group">
                    <input type="submit" name="submit" class="btn btn-primary" value="LOGIN"/>
                    </div>
                </form>
                </div>
            </div>
        </div>
    </div>
    </div>
  
</body>
</html>
