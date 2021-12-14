<?php 
include_once '../model/sevice.php';
include_once'../controller/servicec.php';
if(!isset($_POST['id_produit'])||!isset($_POST['nom'])||!isset($_POST['datedeb'])||!isset($_POST['datefin']))
{
	echo "erreur de ";
}


$service=new  eventt( $_POST['id_produit'],$_POST['nom'], $_POST['datedeb'],$_POST['datefin']);


$produitc=new eventc();
$produitc->Modifierser($service);
header('location:dashboard-events.php');





?>