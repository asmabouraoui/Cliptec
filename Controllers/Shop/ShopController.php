<?php
include '../../config.php';
include '../../Models/Commande.php';
class CommandeC
{
    function affichercommandes()
    {
        $sql = "SELECT * FROM commande";
        $db = config::getConnexion();
        try{
            $liste = $db->query($sql);
            return $liste;
        } catch(Exception $e) {
            die('Erreur' . $e->getMessage());
        }
    }
}