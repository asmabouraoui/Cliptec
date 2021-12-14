<?php 
require 'db.php';
require_once 'trips.php';
include 'tripsController.php';
$tripC = new tripsC();
$listeTrips = $tripC->afficherTrips();


?>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Easyrocket</title>
    <link rel="stylesheet" href="./assets/css/event.css">
    <link rel="preconnect" href="https://fonts.googleapis.com">
<link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
<link href="https://fonts.googleapis.com/css2?family=Roboto:ital,wght@0,100;0,400;0,700;0,900;1,100&display=swap" rel="stylesheet">
</head>
<body onload="events()">
    <script src="./assets/javascript/script.js"></script>
        <img id="logo" src="./assets/images/logo white bg.png" alt="easyrocket logo">

        <ul class="list">
        <li><a href="../Home/index.php" id="selectedtab">Home</a></li>

            <li><a href="reservation.php" id="selectedtab">Trips</a></li>
            <li><a href="../Forum/Forum.php">forum</a></li>
            <li><a href="../Shop/index.php">shop</a></li>
        </ul>
        <?php $i = 1 ;?>
        <?php foreach($listeTrips as $trips) {  ?>
            
        <div class='container<?php if ($i > "1") {
  echo $i;
}
             ?>
             '>
        
            <div class="minicontainer">
                <div class="box"></div>
                <p id="title"><?php echo $trips['nomt']; ?></p>
                <p id="under"><?php echo $trips['desct']; ?></p>
                <button id="btn" type="button"><a href="cr.php">Reservation</a></button>
            </div>
            
        </div>
        <?php
        $i+=1; }
        unset($i);
        ?>
            

        <img id="active" src="./assets/images/activeevents.png" alt="active events">
        
        <img id ="circles" src="./assets/images/circles.png" alt="circles">
</body>
</html>
