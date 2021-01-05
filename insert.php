<?php
    include 'connection.php';
    $database_name = "smartagro";

    mysqli_select_db($connection,$database_name) or die("No database Found");

    $Moisture = $_GET['moisture_Percentage'];
    $temperature = $_GET['temperature'];
    $humidity = $_GET['humidity'];
    $u_id = $_GET['id'];
    
 
    //echo " ".$name." ".$temp." ".$heart_rate." ".$alert." ".$block." ".$E_Id;
    
    //echo $bindata;
 
        $myQuery = "INSERT INTO farm_data (Moisture,temperature,humidity,u_id) VALUES ($Moisture,$temperature,$humidity,$u_id)";
        
        if($connection->query($myQuery) === TRUE){
            echo "New record inserted successfully";
        }
        else{
            echo "Error : ".$myQuery."<br>".$connection->error;
        }

    $connection->close();
?>
