<?php
    //header('Content-Type: application/json');
    header('Access-Control-Allow-Origin:*');
    header('Access-Control-Allow-Credentials:true');
    header('Access-Control-Allow-Methods:GET');
    include 'connection.php';

    $database_name="health_monitor";


    mysqli_select_db($connection,$database_name) or die("Could not find database");
    $Sl_No=$_GET['Sl_No'];
    $myQuery="UPDATE employee_data SET readStat=1 WHERE sl_no = $Sl_No";

    if($connection->query($myQuery) === TRUE){
            echo "New record inserted successfully";
        }
        else{
            echo "Error : ".$myQuery."<br>".$connection->error;
        }

    $connection->close();

    //print json_encode($data);
 ?>   
