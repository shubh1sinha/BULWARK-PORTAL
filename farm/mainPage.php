
<?php
// Initialize the session
session_start();
 
// Check if the user is logged in, if not then redirect him to login page
if(!isset($_SESSION["loggedin"]) || $_SESSION["loggedin"] !== true){
    header("location: index.php");
    exit;
}
?>

<!DOCTYPE html>
<html lang="en">
  <head>
    <title>Agriculture</title>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.3.1/css/bootstrap.min.css">
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.3.1/jquery.min.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.7/umd/popper.min.js"></script>
    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.3.1/js/bootstrap.min.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/paho-mqtt/1.0.1/mqttws31.min.js" type="text/javascript"></script>

    <link href="css/custom.css" rel="stylesheet">
    <script src="js/ipTable.js"></script>
    <script src="js/custom.js"></script>
    <script src="js/chart.min.js"></script>
    <script src="js/mqtt.js"></script>

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
    <div class="container-fluid custom-container">
      
      <!--********************* Graph Contatiner Starting ********************** -->
          <div class="row graph-contatiner">
            <div class="sub-graph-container col"><canvas id="temperature-graph">  </canvas></div>
            <div class="sub-graph-container col"><canvas id="humidity-graph">  </canvas></div>
              <div class="sub-graph-container col"><canvas id="Soil-Moisture-graph"></canvas></div>
          </div >
      <!-- ********************* Graph Contatiner ending ********************** -->


      <!-- ********************* Action Contatiner Starting ********************** -->
         <!--   
<div class="action-contatiner row">
            
            <div class="sub-action-container col-sm">
              <div class="row"><h2 class="action-header">PLANT-1</h2></div>
              <div class="indicator row" >
                <div class="indicator-icon"id="dev1"></div>
              </div>

              
              
              <div class="action-btns row">
                <button class="btn-success m-auto col cutom-btn device1-on">Show</button>
              </div>
            
            </div>
            
            <div class="sub-action-container col-sm">
              <div class="row"><h2 class="action-header">PLANT-2</h2></div>
              <div class="indicator row" >
                <div class="indicator-icon "id="dev2"></div>
              </div>
              
              <div class="action-btns row">
                <button class="btn-success m-auto col cutom-btn device2-on">Show</button>
              </div>
            </div>

            <div class="sub-action-container col-sm">
              <div class="row"><h2 class="action-header">PLANT-3</h2></div>
              <div class="indicator row" >
                <div class="indicator-icon "id="dev3"></div>
              </div>
              
              <div class="action-btns row"> 
                <button class="btn-success m-auto col cutom-btn device3-on">Show</button>
              </div>
            </div>

            <div class="sub-action-container col-sm" >
              <div class="row"><h2 class="action-header">PLANT-4</h2></div>
              <div class="indicator row led" > 
                <div class="indicator-icon"id="dev4"></div>
              </div>
               
              <div class="action-btns row"> 
                <button class="btn-success m-auto col cutom-btn device4-on">Show</button>              
              </div>
            </div>

          </div>-->
      <!-- ********************* Action Contatiner ending ********************** -->

    </div>
    <!-- ********************* Main Contatiner Ending ********************** -->

  </body>
</html>
















