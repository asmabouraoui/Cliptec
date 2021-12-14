<?php
include "../Controller/participationC.php";
$par = new participationC();

if (isset($_POST['idp'])) {
    $par->supprimerparticipation($_POST['idp']);
    header('Location:../back/afficher_participation.php');
}else {
    echo 'Erreur : try again';
    echo $_POST['idp'];

}?>

