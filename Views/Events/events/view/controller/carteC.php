<?PHP
	include "../config.php";
	include_once '../carte/model/carte.php';
	/*view\controller\carteC.php
	view\carte\model\carte.php*/

	class carteC {
		
		function ajoutercarte($carte){
			$sql="INSERT INTO carte (nom,prenom,ddn,adresse,tel) 
			VALUES (:nom,:prenom,:ddn,:adresse,:tel)";
			$db = config::getConnexion();
			try{
				$query = $db->prepare($sql);
			
				$query->execute([
					'nom' => $carte->getnom(),
					'prenom' => $carte->getprenom(),
					'ddn' => $carte->getddn(),
                    'adresse' => $carte->getadresse(),
                    'tel' => $carte->gettel(),
				]);			
			}
			catch (Exception $e){
				echo 'Erreur: '.$e->getMessage();
			}			
		}
		
		function affichercarte(){
			
			$sql="SELECT * FROM carte";
			$db = config::getConnexion();
			try{
				$liste = $db->query($sql);
				return $liste;
			}
			catch (Exception $e){
				die('Erreur: '.$e->getMessage());
			}	
		}

		function supprimercarte($idc){
			$sql="DELETE FROM carte WHERE idc= :idc";
			$db = config::getConnexion();
			$req=$db->prepare($sql);
			$req->bindValue(':idc',$idc);
			try{
				$req->execute();
			}
			catch (Exception $e){
				die('Erreur: '.$e->getMessage());
			}
		}
		function modifiercarte($carte, $idc){
			try {
				$db = config::getConnexion();
				$query = $db->prepare(
					'UPDATE carte SET 
						nom = :nom, 
						prenom = :prenom,
						ddn = :ddn,
						adresse = :adresse,
						tel = :tel
						 
					WHERE idc = :idc'
				);
				$query->execute([
					'nom' => $carte->getNom(),
					'prenom' => $carte->getprenom(),
					'ddn' => $carte->getddn(),
					 'adresse' => $carte->getadresse(),
					 'tel' => $carte->gettel(),

					'idc' => $idc
				]);
				echo $query->rowCount() . " records UPDATED successfully <br>";
			} catch (PDOException $e) {
				$e->getMessage();
			}
		}
		function recuperercarte($idc){
			$sql="SELECT * from carte where idc=$idc";
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

		function recuperercarte1($idc){
			$sql="SELECT * from carte where idc=$idc";
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