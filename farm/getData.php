<?php
    header('Content-Type: application/json');
    header('Access-Control-Allow-Origin:*');
    header('Access-Control-Allow-Credentials:true');
    header('Access-Control-Allow-Methods:GET');
    include 'connection.php';

    $database_name="smartagro";

    mysqli_select_db($connection,$database_name) or die("Could not find database");

    $myQuery="SELECT  id,temperature,humidity,timeStamp FROM farm_data ORDER BY id DESC LIMIT 1";
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
    } else {
        echo "0 results";
    }

    $connection->close();
    print json_encode($data);
?>
