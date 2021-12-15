<?php
include '../../Controllers/Shop/ShopController.php';
$commandeC = new CommandeC();
$commandeC->supprimercommande($_GET["idCommande"]);
header('Location:commande.php');