<?php
include "../Controller/participationC.php";
$par = new participationC();

if (isset($_POST['idp'])) {
    $par->supprimerparticipation($_POST['idp']);
    header('Location:./dashboard-events.php');
}else {
    echo 'Erreur : try again';
    echo $_POST['idp'];

}?>

