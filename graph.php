
<?php
// Initialize the session
session_start();
 
// Check if the user is logged in, if not then redirect him to login page
if(!isset($_SESSION["loggedin"]) || $_SESSION["loggedin"] !== true){
    header("location: index.php");
    exit;
}
//
?>

<!doctype html>
<html lang="en">

<head>
  <meta charset="utf-8">
  <title>Bulwark </title>
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <meta name="description" content=""> 
  <meta name="author" content="">
  <!-- styles -->
  <link href="css/bootstrap.css" rel="stylesheet">
  <link href="css/bootstrap-responsive.css" rel="stylesheet">
  <link href="css/prettyPhoto.css" rel="stylesheet">
  <link href="font/stylesheet.css" rel="stylesheet">
  <link href="css/animate.css" rel="stylesheet">
  <link href="css/flexslider.css" rel="stylesheet">
  <link rel="stylesheet" media="screen" href="css/sequencejs.css">
  <link href="css/style.css" rel="stylesheet">
  <link href="color/default.css" rel="stylesheet">
  

  <!-- Fav and touch icons -->
  <link rel="apple-touch-icon-precomposed" sizes="144x144" href="ico/apple-touch-icon-144-precomposed.png">
  <link rel="apple-touch-icon-precomposed" sizes="114x114" href="ico/apple-touch-icon-114-precomposed.png">
  <link rel="apple-touch-icon-precomposed" sizes="72x72" href="ico/apple-touch-icon-72-precomposed.png">
  <link rel="apple-touch-icon-precomposed" href="ico/apple-touch-icon-57-precomposed.png">
  <link rel="shortcut icon" href="ico/favicon.ico">

  
  
  <link href="custom.css" rel="stylesheet">
  <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.3.1/css/bootstrap.min.css">
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.3.1/jquery.min.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.7/umd/popper.min.js"></script>
    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.3.1/js/bootstrap.min.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/paho-mqtt/1.0.1/mqttws31.min.js" type="text/javascript"></script>
    <script src="chart.min.js"></script>
    <script src="custom.js"></script>

   

  <!-- =======================================================
    Theme Name: Selecao
    Theme URL: https://bootstrapmade.com/selecao-bootstrap-template/
    Author: BootstrapMade.com
    Author URL: https://bootstrapmade.com
  ======================================================= --

</head>

<body>

  <header>

    <!- start top -->
    <div id="topnav" class="navbar navbar-fixed-top default" style="height: 60px;">
      <div class="navbar-inner">
        <div class="container">
          <div class="logo">
            
            <a href="index.html"><img src="img/unnamed.png" style="width: 100px;height: 50px;float: left;"></a>
          </div>
          <div class="navigation">
            <nav>
              <ul class="nav pull-right">
                <li class="current"><a href="#featured">Home</a></li>
                <li><a href="#about">About</a></li>
                <li><a href="#services">Applications</a></li>
               <li><a href="#contact">Contact</a></li>
               <li><a href="farm/mainPage.php">Graph</li></a>
                <li class="dropdown current">
                 <a href="#">More</a>
               <ul class="dropdown-menu">
               <li><a href="components.html"><b>Features</b></a></li>
               <li class="current"><a href="https://www.accuweather.com/en/in/bhubaneswar/189781/hourly-weather-forecast/189781"><b>Weather Checkup</b></a></li></ul></li>
               <li><a href="logout.php"><b>LogOut</b></a></li>
               
              

                <!--<li class="dropdown">
                  <a href="#">More</a>
                  <ul class="dropdown-menu">
                    <li><a href="components.html" class="external">Components</a></li>
                    <li><a href="icons.html" class="external">Icons</a></li>
                  </ul>
                </li>-->
              </ul>
            </nav>
          </div>
          <!--/.nav-collapse -->
        </div>
      </div>
    </div>
    <!-- end top -->
  </header>
  <div class="container-fluid custom-container"  id=<?php echo ($_SESSION['u_id']);?>>
    <div class="row graph-contatiner">
             <div class="sub-graph-container col"><canvas id="Moisture-graph"></canvas></div>
            <div class="sub-graph-container col"><canvas id="temperature-graph">  </canvas></div>
            <div class="sub-graph-container col"><canvas id="humidity-graph">  </canvas></div>
     </div >
   </div>

   <?php
      include 'connection.php';

    $database_name="smartagro";

    mysqli_select_db($connection,$database_name) or die("Could not find database");

    $query1 = "select * from farm_data";  
    $query2 = mysqli_query($connection,$query1);
    $tot_temp = 0;
    $tot_hum = 0;
    $tot_mois = 0;
    $a = 0;

    while($row = mysqli_fetch_assoc($query2)){
      $temp = $row['temperature'];
      $hum = $row['humidity'];
      $mois = $row['Moisture'];
      $tot_mois = $tot_mois + $mois;
      $tot_hum = $tot_hum + $hum;
      $tot_temp = $tot_temp + $temp; 
      $a = $a+1; 
    }
    $tempurature = $tot_temp / $a;
    $moisture = $tot_mois / $a;
    $humidity = $tot_hum / $a;
    $u_id = $_GET['id'];

    $query1 = "INSERT INTO field_data(Moisture,temperature,humidity,u_id)";
    $query1 .="VAlUES({$moisture},{$tempurature},{$humidity},{$u_id})";
    $query2 = mysqli_query($connection,$query1);
    $cropArr;
    $query1 = "select * from tempurature";  
    $query2 = mysqli_query($connection,$query1);
    $a = 0;
    while($row = mysqli_fetch_assoc($query2)){
      $temp = $row['tempurature'];
      $crop1 = $row['crop1'];
      $crop2 = $row['crop2'];
      $crop3 = $row['crop3'];

      if($temp>$tempurature){
        if($crop1 != NULL){
          $cropArr[$a] = $crop1;
          $a = $a +1;
        }
        if($crop2 != NULL){
          $cropArr[$a] = $crop2;
          $a = $a +1;
        }
        if($crop3 != NULL){
          $cropArr[$a] = $crop3;
          $a = $a +1;
        }

      }
    }
      $query1 = "select * from moisture";  
    $query2 = mysqli_query($connection,$query1);
    $a = 0;
    $count = 1;
    $count1 = 1;
    $cropArr1 = Array();
    while($row = mysqli_fetch_assoc($query2)){
      $count = 1;
      $mois = $row['Moisture'];
      $crop1 = $row['crop1'];
      $crop2 = $row['crop2'];
      $crop3 = $row['crop3'];

      if($mois>$moisture){
        if($crop1 != NULL){
          foreach ($cropArr as $crop) {
            if($crop == $crop1)
              $count= 0;
          }
          if($count == 0){
          foreach ($cropArr1 as $crop) {
              if($crop == $crop1)
                $count1 = 0;
            }
            if($count1 == 1){
          $cropArr1[$a] = $crop1;
          $a = $a +1;
          $count = 1;
        }
        }
        }
        if($crop2 != NULL){
          foreach ($cropArr as $crop) {
            if($crop == $crop2)
              $count= 0;
          }
          if($count == 0){
          foreach ($cropArr1 as $crop) {
              if($crop == $crop2)
                $count1 = 0;
            }
            if($count1 == 1){
          $cropArr1[$a] = $crop2;
          $a = $a +1;
          $count = 1;
        }
        }
        }
        if($crop3 != NULL){
          foreach ($cropArr as $crop) {
            if($crop == $crop3)
              $count= 0;
          }
          if($count == 0){
          foreach ($cropArr1 as $crop) {
              if($crop == $crop3)
                $count1 = 0;
            }
            if($count1 == 1){
          $cropArr1[$a] = $crop3;
          $a = $a +1;
          $count = 1;
        }
        }
        }

      }

    }
    $query1 = "select * from humidity";  
    $query2 = mysqli_query($connection,$query1);
    $a = 0;
    $count = 1;
    $count1= 1;
    $cropArr2 = Array();
    while($row = mysqli_fetch_assoc($query2)){
      $hum = $row['humidity'];
      $crop1 = $row['crop1'];
      $crop2 = $row['crop2'];
      $crop3 = $row['crop3'];

      if($hum>$humidity){
        if($crop1 != NULL){
          foreach ($cropArr1 as $crop) {
            if($crop == $crop1)
              $count= 0;
          }
          if($count == 0){
          foreach ($cropArr2 as $crop) {
              if($crop == $crop1)
                $count1 = 0;
            }
            if($count1 == 1){
          $cropArr2[$a] = $crop1;
          $a = $a +1;
          $count = 1;
        }
        }
        }
        if($crop2 != NULL){
          foreach ($cropArr1 as $crop) {
            if($crop == $crop2)
              $count= 0;
          }
          if($count == 0){
          foreach ($cropArr2 as $crop) {
              if($crop == $crop2)
                $count1 = 0;
            }
            if($count1 == 1){
          $cropArr2[$a] = $crop2;
          $a = $a +1;
          $count = 1;
        }
        }
        }
        if($crop3 != NULL){
          foreach ($cropArr1 as $crop) {
            if($crop == $crop3)
              $count= 0;
          }
          if($count == 0){
            foreach ($cropArr2 as $crop) {
              if($crop == $crop3)
                $count1 = 0;
            }
            if($count1 == 1){
          $cropArr2[$a] = $crop3;
          $a = $a +1;
          $count = 1;
        }
        }
        }

      }

    }
    foreach ($cropArr2 as $crop) {
      echo "<h1 class='display-2 text-center'>";
      echo $crop;
      echo "</h1><br/>";
    }

    ?>

  <footer>
    <div class="verybottom">
      <div class="container">
        <div class="row">
          <div class="span12">
            <div class="aligncenter">
              <div class="logo">
                <a class="brand" href="index.html">
                <img src="img/unnamed.png" alt="">
              </a>
              </div>
              <p></p>
              <div class="social-links">
                <ul class="social-links">
                  <li><a href="#" title="Twitter"><i class="icon-circled icon-64 icon-twitter"></i></a></li>
                  <li><a href="#" title="Facebook"><i class="icon-circled icon-64 icon-facebook"></i></a></li>
                  <li><a href="#" title="Google plus"><i class="icon-circled icon-64 icon-google-plus"></i></a></li>
                  <li><a href="#" title="Linkedin"><i class="icon-circled icon-64 icon-linkedin"></i></a></li>
                  <li><a href="#" title="Pinterest"><i class="icon-circled icon-64 icon-pinterest"></i></a></li>
                </ul>

              </div>

              <p>
                &copy; BulWark - All right reserved
              </p>
              <div class="credits">
                <!--
                  All the links in the footer should remain intact.
                  You can delete the links only if you purchased the pro version.
                  Licensing information: https://bootstrapmade.com/license/
                  Purchase the pro version with working PHP/AJAX contact form: https://bootstrapmade.com/buy/?theme=Selecao
                -->
                Designed by <a href="https://simpleTech.com/">Team Bulwark </a>
              </div>
            </div>
          </div>
        </div>
      </div>
    </div>
  </footer>

  <!-- Javascript Library Files -->
  <script src="js/jquery.min.js"></script>
  <script src="js/jquery.easing.js"></script>
  <script src="js/bootstrap.js"></script>
  <script src="js/jquery.lettering.js"></script>
  <script src="js/parallax/jquery.parallax-1.1.3.js"></script>
  <script src="js/nagging-menu.js"></script>
  <script src="js/sequence.jquery-min.js"></script>
  <script src="js/sequencejs-options.sliding-horizontal-parallax.js"></script>
  <script src="js/portfolio/jquery.quicksand.js"></script>
  <script src="js/portfolio/setting.js"></script>
  <script src="js/jquery.scrollTo.js"></script>
  <script src="js/jquery.nav.js"></script>
  <script src="js/modernizr.custom.js"></script>
  <script src="js/prettyPhoto/jquery.prettyPhoto.js"></script>P
  <script src="js/prettyPhoto/setting.js"></script>
  <script src="js/jquery.flexslider.js"></script>
  <script src="custom.js"></script>

  <!-- Contact Form JavaScript File -->
  <script src="contactform/contactform.js"></script>

  <!-- Template Custom Javascript File -->
  <script src="js/custom.js"></script>
  <script type="text/javascript"></script>
   
  

</body>

</html>
