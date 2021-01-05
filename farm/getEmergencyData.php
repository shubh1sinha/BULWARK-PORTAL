<?php
    header('Content-Type: application/json');
    header('Access-Control-Allow-Origin:*');
    header('Access-Control-Allow-Credentials:true');
    header('Access-Control-Allow-Methods:GET');
    include 'connection.php';

    $database_name="health_monitor";

    mysqli_select_db($connection,$database_name) or die("Could not find database");

    $myQuery="SELECT sl_no,Name,Temperature,HR,block,alert,readStat FROM employee_data WHERE alert = 1 and readStat = 0";
    $result = $connection->query($myQuery);

    $data = array();

    if ($result->num_rows > 0) {
        // output data of each row
        foreach($result as $row) {
            $data[]=$row;
        }
        //echo $data['temperature'];
        //print_r ($data);
        $result->close();    
        print json_encode($data);
    } else {
        echo "0 results";
        
    }
        $connection->close();
    
    //print json_encode($data);
 ?>   
