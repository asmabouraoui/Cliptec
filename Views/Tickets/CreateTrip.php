<?php
require 'db.php';
require_once 'trips.php';
include 'tripsController.php';
$tripsC = new tripsC();
$test = true;
if (isset ($_POST['Nom'])  && isset($_POST['description'])) {
  $Tname = $_POST['Nom'];
  $Descp = $_POST['description'];
  if (empty($Tname)){
    echo "<div style='text-align:right;font-size:12px;color:white;background-color:red;'>";
				echo   "fullname  is empry ! <br>" ;
				echo "</div>";
        $test = false;
}
if (empty($Descp)){
  echo "<div style='text-align:right;font-size:12px;color:white;background-color:red;'>";
  echo   "city is empty ! <br>" ;
  echo "</div>";
        $test = false;
}



if ($test==true){
    $trips = new trips(
        $Tname,
        $Descp
        //kamil b9iyit les parametre mte3 constructeur fil class utilisateur 7at fil constructeur 8 parametre w lina ta3ti fih ken fi 4
        //ok
    );
    $tripsC->ajouterTrips($trips);
    header('Location:tripsbackend.php');
}
else
    $error = "Missing information";

}




 ?>


<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Easyrocket</title>
    <link rel="stylesheet" href="./assets/css/payment.css">
</head>
<body onload="register()">
    <script src="./assets/javascript/script.js"></script>
    <h3>TRIPS INFORMATION</h3>
    <!--<h3 id="under"><a href="./login.html">already has an account?</a></h3>-->
    <form class="form" action="CreateTrip.php" method="post">
        <div id="error"></div>
        
        
        <div id='name'>
        
        <label for="Nom">Nom</label><br>
        <input class="input2" type="text" name="Nom" id="Nom"><br>
        
        </div>
        <div id='description'>
        <label for="ville">Description</label><br>
        <input class="input2"  type="text" name="description" id="description"><br> 
        </div>
        
        

            <br>
        <input class="input2"  type="submit" value="Continue" href="tripsBackend.php">
    </form>
    
</body>
</html>