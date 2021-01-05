<?php  include "connection.php"; ?>
 <?php $database_name = "smartagro";
  mysqli_select_db($connection,$database_name) or die("No databse Found");?>
    
<?php
if(isset($_POST['submit'])){
$username = $_POST['username'];
$password = $_POST['password'];    

$username = mysqli_real_escape_string($connection,$username);
$password = mysqli_real_escape_string($connection,$password);
    
$query1 = "INSERT INTO user (username , password)";
$query1 .= "VALUES('{$username}' , '{$password}')";

$query2 = mysqli_query($connection,$query1);    
  header("location: index.php");  
}
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
</head> 
 <body>

    <!-- Page Content -->
    <div class="container">
<center><img src="img/bgg1.JPEG"></center>
<div style="background-image: url('img/7581.JPEG');"></div>
    
<section id="login">
    <div class="container">
        <div class="row">
            <div class="col-xs-6 col-xs-offset-3">

                <div class="form-wrap">
                <center><h1><b>Please Fill Details</b></h1></center>
                    <form role="form" action="registration.php" method="post" id="login-form" autocomplete="off">
                                <div class="form-group">
                            <label for="username" class="sr-only">email Id</label>
                            <input type="text" name="email Id" id="email Id" class="form-control" placeholder="Your Email ID" required>
                        </div>
                         <div class="form-group">
                            <label for="password" class="sr-only">Contact</label>
                            <input type="charset" name="Contact" id="key" class="form-control" placeholder="Enter Your Contact" required>
                        </div>
                        <div class="form-group">
                            <label for="username" class="sr-only">username</label>
                            <input type="text" name="username" id="username" class="form-control" placeholder="Enter Desired Username" required>
                        </div>
                            </div>
                         <div class="form-group">
                            <label for="password" class="sr-only">Password</label>
                            <input type="password" name="password" id="key" class="form-control" placeholder="Password" required>
                           
                    </div>
                     <div class="form-group">
                            <label for="OTP" class="sr-only">Enter OTP</label>
                            <input type="OTP" name="OTP" id="key" class="form-control" placeholder=" Enter Your OTP" required>
                           
                    </div>


                        <input type="submit" name="submit" id="btn-login" class="btn btn-custom btn-lg btn-block" value="Register">
                    </form>
                </div>

            </div> <!-- /.col-xs-12 -->
        </div> <!-- /.row -->
    </div> <!-- /.container -->

</section>


</body>
</html>  
