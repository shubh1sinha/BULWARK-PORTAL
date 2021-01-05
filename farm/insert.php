<?php
    include 'connection.php';
    $database_name = "smartagro";

    mysqli_select_db($connection,$database_name) or die("No database Found");

    $temperature = $_GET['temperature'];
    $humidity = $_GET['humidity'];
	$soil-moisture = $_GET['mositure'];
 
    //echo " ".$name." ".$temp." ".$heart_rate." ".$alert." ".$block." ".$E_Id;
    
    //echo $bindata;
 
        $myQuery = "INSERT INTO farm_data (temperature,humidity,Soil_Moisture) VALUES ($temperature,$humidity,$soil-moisture)";
        
        if($connection->query($myQuery) === TRUE){
            echo "New record inserted successfully";
        }
        else{
            echo "Error : ".$myQuery."<br>".$connection->error;
        }

    $connection->close();
?>
