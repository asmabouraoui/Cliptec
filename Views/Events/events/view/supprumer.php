<?php 

include_once '../config.php';
include_once '../controller/servicec.php';


$produitc=new eventc();
$prod=$produitc->supprimerevent($_POST['id_event']);
//$catc=new produitC();
//$catc->supprimerproduit($sqlc);
header('location:./dashboard-events.php');

?>


