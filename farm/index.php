<?php 

  if(isset($_SESSION["loggedin"]) && $_SESSION["loggedin"] === true){
    header("location: welcome.php");
    exit;
}
  include("connection.php");
  $database_name = "smartagro";
  mysqli_select_db($connection,$database_name) or die("No databse Found");
  session_start();

?>




<!DOCTYPE html>
<html lang="en">
<head>
<meta charset="utf-8">
<meta http-equiv="X-UA-Compatible" content="IE=edge">
<meta name="viewport" content="width=device-width, initial-scale=1">
<title>Smart Agro Login Form</title>
<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css">
<script src="https://ajax.googleapis.com/ajax/libs/jquery/1.12.4/jquery.min.js"></script>
<script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/js/bootstrap.min.js"></script> 
<link href='https://fonts.googleapis.com/css?family=BioRhyme Expanded' rel='stylesheet'>
<link href="https://fonts.googleapis.com/css?family=Roboto" rel="stylesheet"> 
<link href='https://fonts.googleapis.com/css?family=Orbitron' rel='stylesheet' type='text/css'>
<style type="text/css">
  
  body{
    background: url(img/bg3.jpg);
    background-size: cover;
    background-attachment: fixed;
  }

  .login-form {
    width: 340px;
    margin: 10% auto;
    border-radius: 10px;
    background: rgba(247,247,247,0);

  }
    .login-form form {
        margin-bottom: 15px;
        background: rgba(247,247,247,0.2);
        box-shadow: 0px 2px 2px rgba(0, 0, 0, 0.3);
        padding: 30px;
        border-radius: 10px;
    }
    .login-form h2 {
        margin: 0 0 15px;
    }
    .form-control, .btn {
        min-height: 38px;
        border-radius: 2px;
    }
    .btn {        
        font-size: 15px;
        font-weight: bold;
        background: #1de9b6;
        border:1px solid #1de9b6;
        border-radius: 3px;
    }
</style>
</head>
<body>

<div class="login-form">
    <form action="login.php" method="post">
        <h2 class="text-center" style="color: white;">Log in</h2>       
        <div class="form-group">
            <input name= "username" type="text" class="form-control" placeholder="username" required="required" >
        </div>
        <div class="form-group">
            <input name= "password" type="password" class="form-control" placeholder="password" required="required">
        </div>
        <div class="form-group">
            <button type="submit" class="btn btn-primary btn-block">Log in</button>
        </div>
        <div class="clearfix">
            <label class="pull-left checkbox-inline" style="color: white;"><input type="checkbox"> Remember me</label>
            <!--a href="#" class="pull-right">Forgot Password?</a-->
        </div>        
    </form>

    <div style="margin-left:auto;margin-right:auto;color:white;font-family:'Orbitron'"><h1 style="text-align:center;letter-spacing: 8px;">Agriculture</h1></div>

</div>
</body>
</html>                                                               