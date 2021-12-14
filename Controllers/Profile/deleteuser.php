<?php
         include_once '../../config.php';
session_start();

$sql ="DELETE FROM utilisateurs WHERE CIN=:CIN;";
$db = config::getConnexion();
$req=$db->prepare($sql);
$req->bindValue(':CIN', $_GET['CIN']);
try{
    $req->execute();
}
catch(Exception $e){
    die('Erreur:'. $e->getMessage());
}

if ($_GET['page']=='profile')
header("Location:endsession.php");
else
header("Location:dashboard-users.php");


?>