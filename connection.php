<?php
    $database_host = "localhost";
    $database_username = "root";
    $database_password = "";

    $connection = mysqli_connect ("$database_host","$database_username","$database_password");
    
    if (mysqli_connect_errno())
    {
        echo "\n**********\nFailed to connect to MySQL: " . mysqli_connect_error()."\n**********";
    }
    else
    //echo "Success!!!";
?>