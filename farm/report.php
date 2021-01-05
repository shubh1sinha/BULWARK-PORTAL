<?php

	session_start();
	if(!isset($_SESSION["loggedin"]) || $_SESSION["loggedin"] !== true){
		header("location: index.php");
		exit;	
	}
    include 'connection.php';

    $database_name="smartagro";

    mysqli_select_db($connection,$database_name) or die("Could not find database");

    $myQuery="SELECT  * FROM farm_data ORDER BY id DESC";
    $result = $connection->query($myQuery);

    $data = array();
	$bin_sensor_report_data="";
	
    if ($result->num_rows > 0) {
        // output data of each row
        foreach($result as $row) {
            $data[]=$row;
			$bin_sensor_report_data .= '<tr>
		        	    <td>'.$row['id'].'</td>
                                    
                                    <td>'.$row['temperature'].'</td>
                                    <td>'.$row['humidity'].'</td>
                                    <td>'.$row['timeStamp'].'</td>
                                </tr>';
								
//			print ($bin_sensor_report_data);
        }
        //echo $data['temperature'];
        //print_r ($data);
        $result->close();    
    } else {
        echo "0 results";
    }

    $connection->close();

?>

<!DOCTYPE html>
<html lang="en">
  <head>
    <title>Smart Agro</title>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.3.1/css/bootstrap.min.css">
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.3.1/jquery.min.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.7/umd/popper.min.js"></script>
    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.3.1/js/bootstrap.min.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/paho-mqtt/1.0.1/mqttws31.min.js" type="text/javascript"></script>

    <link href="css/custom.css" rel="stylesheet">
    <script src="js/chart.min.js"></script>
 </head>

  <body>

    <!-- ********************* Navigation Header Starting ********************** -->
    <nav class="navbar navbar-expand-lg navbar-dark " style="background: #01579b;">
      <a class="navbar-brand" href="#">Smart Agro Dashboard</a>
      <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarNav" aria-controls="navbarNav" aria-expanded="false" aria-label="Toggle navigation">
        <span class="navbar-toggler-icon"></span>
      </button>
  
      <div class="collapse navbar-collapse" id="navbarNav">
        <ul class="nav navbar-nav ml-auto">

	<li class="nav-item ">
            <a class="nav-link" href="mainPage.php">Home<span class="sr-only">(current)</span></a>
        </li>

          <li class="nav-item ">
            <a class="nav-link" href="report.php">Report<span class="sr-only">(current)</span></a>
          </li>


          <li class="nav-item ">
            <a class="nav-link" href="#"><?php echo ($_SESSION["username"]) ?> <span class="sr-only">(current)</span></a>
          </li>
      
          <li class="nav-item">
            <a class="nav-link" href="logout.php">Log out</a>
          </li>
        </ul>
      </div>
    </nav>
    <!-- ********************* Navigation Header Ending ********************** -->

    <!-- ********************* Main Contatiner Starting ********************** -->
    <div class="container custom-container">
		<section>
			<div class="row" bgcolor="black">
				<div class="card custom-cards col-sm-12" style="height:80vh;overflow-y:auto;backgorund:black; ">
					<div class="card-body" bgcolor:"white">
						<table class="table table-bordered table-striped">
							<thead bgcolor="#01579b" style="color:white;">
								<tr>
									<th>Serial No</th>
									<th>Temperature</th>
									<th>Humidity </th>
                  <th>Moisture</th>
  				        <th>DateTime</th>
								</tr>									
							</thead>
							
							<tbody>
								<?php echo $bin_sensor_report_data; ?>
							</tbody>
						</table>
					</div>
				</div>
			</div>
		</section>
    </div>
    <!-- ********************* Main Contatiner Ending ********************** -->

  </body>
</html>
















