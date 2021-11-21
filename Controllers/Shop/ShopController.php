<?php
include_once '../../config.php';
include_once '../../Models/Commande.php';
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
    function supprimercommande($idCommande)
    {
        $sql = "DELETE FROM commande WHERE
            idCommande=:idCommande";
        $db = config::getConnexion();
        $req = $db->prepare($sql);
        $req->bindValue(':idCommande', $idCommande);
        try {
            $req->execute();
        } catch (Exception $e) {
            die('Erreur:' . $e->getMessage());
        }
    }
    function ajoutercommande($commande)
    {
        $sql="INSERT INTO commande (idCommande, statusCommande,
        prixCommande, dateCommande)
        VALUES (:idCommande, :statusCommande, :prixCommande, :dateCommande)";
        $db = config::getConnexion();
        try{
            $query = $db->prepare($sql);
            $query->execute([
            'idCommande' => $commande->getId(),
            'statusCommande' => $commande->getStatus(),
            'prixCommande' => $commande->getPrix(),
            'dateCommande' => $commande->getDate(),
            ]);
            }
            catch(Exception $e){
                echo 'Erreur:'.$e->getMessage();
            }
    }
    function recuperercommande($idCommande){
        $sql="SELECT * from commande where idCommande=$idCommande";
        $db = config::getConnexion();
        try{
            $query=$db->prepare($sql);
            $query->execute();
            $commande=$query->fetch();
            return $commande;
        }
        catch (Exception $e){
            die('Erreur: '.$e->getMessage());
        }
    }
    
    function modifiercommande($commande, $idCommande){
        try {
            $db = config::getConnexion();
            $query = $db->prepare(
                'UPDATE commande SET 
                    statusCommande= :statusCommande, 
                    prixCommande= :prixCommande, 
                    dateCommande= :dateCommande
                WHERE idCommande= :idCommande'
            );
            $query->execute([
                'statusCommande' => $commande->getStatus(),
                'prixCommande' => $commande->getPrix(),
                'dateCommande' => $commande->getDate(),
                'idCommande' => $idCommande
            ]);
            echo $query->rowCount() . " records UPDATED successfully <br>";
        } catch (PDOException $e) {
            $e->getMessage();
        }
    }
}