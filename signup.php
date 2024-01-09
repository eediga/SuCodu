<!DOCTYPE html>
<html>
<head>
    <title>User Registration form</title>
    <link rel="stylesheet" href="bootstrap/css/bootstrap.min.css" type="text/css">
    <script type="text/javascript" src="bootstrap/js/jquery-3.1.1.min.js">            
    </script>
    <script type="text/javascript" src="bootstrap/js/bootstrap.min.js"></script>

    <link href="css/index.css" rel="stylesheet" type="text/css"/>
<style>
.top_margin
{
    margin-top:70px;
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
        <a href="index.php" class="navbar-brand">SuCodu</a>
    </div>
    <div class="collapse navbar-collapse" id="myNavbar">
    <ul class="nav navbar-nav navbar-right"> 
    
        <li class="for_login" style="padding-right:30px"><a href="index.php"><span class="glyphicon glyphicon-log-in"></span>Login</a></li>
    </ul>
    </div>
  </nav>

    <div class="row top_margin ">
        <div class="col-xs-6 col-xs-offset-3">
            <div class="panel panel-primary">
                <div class="panel-heading">User Registration</div>
                <div class="panel-body ">
    
        <div class="container">
            <div class="row">
                <div class="col-xs-6">

                <form method="post" action="user_registration_script.php"  >
                    <div class="form-group">
                        <label for="name">Name</label>
                        <input type="text" class="form-control" id="first_name" size="13" name="name" required>

                    </div>

                        <div class="form-group ">
                        <label for="college">College Name</label>
                        <input type="text" class="form-control" id="college" size="13" name="college" required >

                    </div>
                        
                    <div class="form-group">
                        <label for="phone">Phone</label>
                        <input type="number" class="form-control" id="phone" name="phone" size="13">
                    </div>
                    <div class="form-group">
                        <label for="name">Username</label>
                        <input type="text" class="form-control" id="username" size="13" name="username" required>

                    </div>    
                    <div class="form-group">
                        <label for="password">Password</label>
                        <input type="password" class="form-control" id="password" name="password" size="13" required>

                    </div>
                    <button type="submit" class="btn btn-primary" value=”registration_submit”>Submit</button>
                </form>
            </div>
            </div>
        </div>
                </div>
            </div>
        </div>
    </div>
        
</body>
</html>