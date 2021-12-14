<?php

require_once 'trips.php';
include 'tripsController.php';
$tripsC=new tripsC();
$tripsC->supprimerTrips($_GET["id"]);
header('Location:tripsBackend.php');
?>