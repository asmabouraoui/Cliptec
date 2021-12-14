<?PHP
	include "../config.php";
	require_once '../model/offre.php';

	class offreC {
		
		function ajouteroffre($offre){
			$sql="INSERT INTO offre ( description,datedeb,datefin,pourcentage) 
			VALUES (:description,:datedeb,:datefin,:pourcentage )";
			$db = config::getConnexion();
			try{
				$query = $db->prepare($sql);
			
				$query->execute([

					'description' => $offre->getdescription(),
					'datedeb' => $offre->getdatedeb(),
					'datefin' => $offre->getdatefin(),
					'pourcentage' => $offre->getpourcentage()
					 
				]);			
			}
			catch (Exception $e){
				echo 'Erreur: '.$e->getMessage();
			}			
		}
		
		function afficheroffre(){
			
			$sql="SELECT * FROM offre";
			$db = config::getConnexion();
			try{
				$liste = $db->query($sql);
				return $liste;
			}
			catch (Exception $e){
				die('Erreur: '.$e->getMessage());
			}	
		}

		function supprimeroffre($id){
			$sql="DELETE FROM offre WHERE id= :id";
			$db = config::getConnexion();
			$req=$db->prepare($sql);
			$req->bindValue(':id',$id);
			try{
				$req->execute();
			}
			catch (Exception $e){
				die('Erreur: '.$e->getMessage());
			}
		}
		function modifieroffre($offre, $id){
			try {
				$db = config::getConnexion();
				$query = $db->prepare(
					'UPDATE offre SET 
						id = :id, 
						description = :description,
						datedeb = :datedeb,
                        datefin = :datefin,
                        pourcentage = :pourcentage
						 
					WHERE id = :id'
				);
				$query->execute([
					
					'description' => $offre->getdescription(),
					'datedeb' => $offre->getdatedeb(),
					'datefin' => $offre->getdatefin(),
					'pourcentage' => $offre->getpourcentage(),
					 
					'id' => $id
				]);
				echo $query->rowCount()." records UPDATED successfully <br>";
			} catch (PDOException $e) {
				$e->getMessage();
			}
		}
		function recupereroffre($id){
			$sql="SELECT * from offre where id=$id";
			$db = config::getConnexion();
			try{
				$query=$db->prepare($sql);
				$query->execute();

				$user=$query->fetch();
				return $user;
			}
			catch (Exception $e){
				die('Erreur: '.$e->getMessage());
			}
		}

		function recupereroffre1($id){
			$sql="SELECT * from offre where id=$id";
			$db = config::getConnexion();
			try{
				$query=$db->prepare($sql);
				$query->execute();
				
				$user = $query->fetch(PDO::FETCH_OBJ);
				return $user;
			}
			catch (Exception $e){
				die('Erreur: '.$e->getMessage());
			}
		}
		
	}

?>