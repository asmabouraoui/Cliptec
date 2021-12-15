<?php
include_once '../../config.php';
include_once '../../Models/Commande.php';
class CommandeC
{
    function affichercommandes()
    {
        $sql = "SELECT * FROM orders";
        $db = config::getConnexion();
        try {
            $liste = $db->query($sql);
            return $liste;
        } catch (Exception $e) {
            die('Erreur' . $e->getMessage());
        }
    }
    function supprimercommande($id)
    {
        $sql = "DELETE FROM orders WHERE
            id=:id";
        $db = config::getConnexion();
        $req = $db->prepare($sql);
        $req->bindValue(':id', $id);
        try {
            $req->execute();
        } catch (Exception $e) {
            die('Erreur:' . $e->getMessage());
        }
        $sql = "DELETE FROM order_details WHERE
            order_id=:id";
        $db = config::getConnexion();
        $req = $db->prepare($sql);
        $req->bindValue(':id', $id);
        try {
            $req->execute();
        } catch (Exception $e) {
            die('Erreur:' . $e->getMessage());
        }
    }
    function ajoutercommande($commande)
    {
        $sql = "INSERT INTO orders (first_name,last_name,email,address,address2,country,state,zipcode,total_price,order_status
        )
        VALUES (:first_name,:last_name,:email,:address,:address2,:country,:state,:zipcode,:total_price,:order_status)";
        $db = config::getConnexion();
        try {
            $query = $db->prepare($sql);
            $query->execute([
                'first_name' => $commande->getFirst(),
                'last_name' => $commande->getLast(),
                'email' => $commande ->getEmail(),
                'address'=> $commande ->getAdress(),
                'address2' => $commande->getAdress2(),
                'country' => $commande ->getCountry(),
                'state' => $commande ->getState(),
                'zipcode' =>$commande ->getZip(),
                'total_price' => $commande ->getPrice(),
                'order_status' =>$commande->getStatus()
            ]);
        } catch (Exception $e) {
            echo 'Erreur:' . $e->getMessage();
        }
    }
    function recuperercommande($idCommande)
    {
        $sql = "SELECT * from orders where id=$idCommande";
        $db = config::getConnexion();
        try {
            $query = $db->prepare($sql);
            $query->execute();
            $commande = $query->fetch();
            return $commande;
        } catch (Exception $e) {
            die('Erreur: ' . $e->getMessage());
        }
    }

    function modifiercommande($commande, $id)
    {
        try {
            $db = config::getConnexion();
            $query = $db->prepare(
                'UPDATE commande SET 
                    first_name= :firstName, 
                    last_name= :lastName, 
                    email= :email,
                    address=:address,
                    address2=:address2,
                    country =:country,
                    state =:state,
                    zipcode =:zipcode,
                    total_price=:total_price,
                    order_status=:order_status
                WHERE id= :id'
            );
            $query->execute([
                'first_name' => $commande->getFirst(),
                'last_name' => $commande->getLast(),
                'email' => $commande ->getEmail(),
                'address'=> $commande ->getAdress(),
                'address2' => $commande->getAdress2(),
                'country' => $commande ->getCountry(),
                'state' => $commande ->getState(),
                'zipcode' =>$commande ->getZip(),
                'total_price' => $commande ->getPrice(),
                'order_status' =>$commande ->getStatus(),
				'id' => $id
            ]);
            echo $query->rowCount() . " records UPDATED successfully <br>";
        } catch (PDOException $e) {
            $e->getMessage();
        }
    }
}
function supprimerProduit($id)
{
    $sql = "DELETE FROM products WHERE
            id=:id";
    $db = config::getConnexion();
    $req = $db->prepare($sql);
    $req->bindValue(':id', $id);
    try {
        $req->execute();
    } catch (Exception $e) {
        die('Erreur:' . $e->getMessage());
    }
}