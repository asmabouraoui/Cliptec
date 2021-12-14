<?php
include "../Controller/carteC.php";
$car = new carteC();

if (isset($_POST['idc'])) {
    $car->supprimercarte($_POST['idc']);
    header("Location:../../dashboard-events.php");
}else {
    echo 'Erreur : try again';
    echo $_POST['idc'];

}?>

