<?php
	//require '../config.php';
    require_once 'config.php';
    require_once 'trips.php';
	//include_once '../Model/utilisateur.php';
	class tripsC {
		function afficherTrips(){
			$sql="SELECT * FROM trips";
			$db = config::getConnexion();
			try{
				$liste = $db->query($sql);
				return $liste;
			}
			catch(Exception $e){
				die('Erreur:'. $e->getMessage());
			}
		}
		
        
		function supprimerTrips($id){
			$sql="DELETE FROM trips WHERE id=:id";
			$db = config::getConnexion();
			$req=$db->prepare($sql);
			$req->bindValue(':id', $id);
			try{
				$req->execute();
			}
			catch(Exception $e){
				die('Erreur:'. $e->getMessage());
			}
		}
		function ajouterTrips($trips){
			$sql="INSERT INTO trips (nomt, desct) 
			VALUES (:nomt,:desct)";
			$db = config::getConnexion();
			try{
				$query = $db->prepare($sql);
				$query->execute([
					'nomt' => $trips->getNom(),
					'desct' => $trips->getDesc()
				]);			
			}
			catch (Exception $e){
				echo 'Erreur: '.$e->getMessage();
			}			
		}
		function recupererTrips($id){
			$sql="SELECT * from trips where id=$id";
			$db = config::getConnexion();
			try{
				$query=$db->prepare($sql);
				$query->execute();

				$trips=$query->fetch();
				return $trips;
			}
			catch (Exception $e){
				die('Erreur: '.$e->getMessage());
			}
		}
		
		function modifierTrips($trips, $id){
			try {
				$db = config::getConnexion();
				$query = $db->prepare(
					'UPDATE trips SET 
						nomt= :ville, 
						desct= :dateeve
					WHERE id= :id'
				);
				$query->execute([
					'nomt' => $trips->getNom(),
					'desct' => $trips->getDesc(),
					'id' => $id
				]);	
				echo $query->rowCount() . " records UPDATED successfully <br>";
			} catch (PDOException $e) {
				$e->getMessage();
			}
		}

	}
?>