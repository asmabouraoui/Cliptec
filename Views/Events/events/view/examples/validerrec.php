<?php
include "C:/wamp64/www/website/frontoffice/Colo Shop/core/reclamationc.php";
 $reclamationc=new reclamationc();
 if(isset($_POST["supp"])){
 $reclamationc->supprimerreclamation($_POST["idsupp"]);
 header('Location: afficherclaim.php');
  }
  ?>