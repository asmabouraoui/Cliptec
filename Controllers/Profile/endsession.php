<?php
 include_once '../../config.php';
session_start();
$sql ="UPDATE utilisateurs SET Online='No' WHERE CIN=:cin";
$db = config::getConnexion();
           $req=$db->prepare($sql);
           $req->bindValue(':cin', $_SESSION['CIN']);
           try{
               $req->execute();
           }
           catch(Exception $e){
               die('Erreur:'. $e->getMessage());
           }
           if ($_SESSION['role']=='Transporter')
           {
               $sql ="UPDATE livreurs SET Availability='No' WHERE CIN=:cin";
               $db = config::getConnexion();
                          $req=$db->prepare($sql);
                          $req->bindValue(':cin', $_SESSION['CIN']);
                          try{
                              $req->execute();
                          }
                          catch(Exception $e){
                              die('Erreur:'. $e->getMessage());
                              header("Location:indexC.php?code=errorDB");	
                          }   
           }
session_unset();
session_destroy();
var_dump($user);
header('Location:../../Views/Login/login.php');
?>