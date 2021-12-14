<?PHP
	include "../config.php";
	require_once '../model/participation.php';

	class participationC {
		
		function ajouterparticipation($participation){
			$sql="INSERT INTO participation (nom,prenom,ddn,adresse,tel) 
			VALUES (:nom,:prenom,:ddn,:adresse,:tel)";
			$db = config::getConnexion();
			try{
				$query = $db->prepare($sql);
			
				$query->execute([
					'nom' => $participation->getnom(),
					'prenom' => $participation->getprenom(),
					'ddn' => $participation->getddn(),
                    'adresse' => $participation->getadresse(),
                    'tel' => $participation->gettel(),
				]);			
			}
			catch (Exception $e){
				echo 'Erreur: '.$e->getMessage();
			}			
		}
		
		function afficherparticipation(){
			
			$sql="SELECT * FROM participation";
			$db = config::getConnexion();
			try{
				$liste = $db->query($sql);
				return $liste;
			}
			catch (Exception $e){
				die('Erreur: '.$e->getMessage());
			}	
		}

		function supprimerparticipation($idp){
			$sql="DELETE FROM participation WHERE idp= :idp";
			$db = config::getConnexion();
			$req=$db->prepare($sql);
			$req->bindValue(':idp',$idp);
			try{
				$req->execute();
			}
			catch (Exception $e){
				die('Erreur: '.$e->getMessage());
			}
		}
		function modifierparticipation($participation, $idp){
			try {
				$db = config::getConnexion();
				$query = $db->prepare(
					'UPDATE participation SET 
						nom = :nom, 
						prenom = :prenom,
						ddn = :ddn,
						adresse = :adresse,
						tel = :tel
						 
					WHERE idp = :idp'
				);
				$query->execute([
					'nom' => $participation->getNom(),
					'prenom' => $participation->getprenom(),
					'ddn' => $participation->getddn(),
					 'adresse' => $participation->getadresse(),
					 'tel' => $participation->gettel(),

					'idp' => $idp
				]);
				echo $query->rowCount() . " records UPDATED successfully <br>";
			} catch (PDOException $e) {
				$e->getMessage();
			}
		}
		function recupererparticipation($idp){
			$sql="SELECT * from participation where idp=$idp";
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

		function recupererparticipation1($idp){
			$sql="SELECT * from participation where idp=$idp";
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