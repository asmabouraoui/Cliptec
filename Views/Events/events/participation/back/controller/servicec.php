<!DOCTYPE html>
<html>

<?php 
include_once '../config.php';
class eventc{
	function afficherevente(){
		$sql="SELECT * FROM evennement";
		$db=config::getConnexion();
		try{
			$liste=$db->query($sql);
			return $liste;
		}
		catch(Exception $e){
			die("erreur:".$e->getMessage());
		}
	}
	   function supprimerevent($numadh){
 $sql="DELETE  FROM evennement WHERE `idE`= $numadh ";
		$db=config::getConnexion();
		try{
			$liste=$db->query($sql);

        }catch(Exception $e){
			die("erreur:".$e->getMessage());
   }
}
function Modifierser($ser)
{
$sqlc= "UPDATE `evennement` SET nomE=:name,datedebut=:deb,datefin=:fin WHERE idE=:id  ";
$db=config::getConnexion();
try{ $recipesStatement = $db->prepare($sqlc);
	$recipesStatement->execute([ 'name'=>$ser->getname(),
		            'deb' =>$ser->getdatedeb(),
		            'fin' =>$ser->getdatefin(),
		            'id'    =>$ser->getid(),
		         ]);
}
 catch(Exception $e){ 
 	
			 die("erreur:".$e->getMessage());
}

}
function Ajouter($ser){
$sql= "INSERT INTO `evennement` VALUES (:id, :nom, :datdeb, :datfin, :nbrt,:adresse,:image)";
$db=config::getConnexion();
try{ $recipesStatement = $db->prepare($sql);
	$recipesStatement->execute([ 'id'=>$ser->getid(),
		            'nom' =>$ser->getname(),
		            'datdeb'=>$ser->getdatedeb(),
		            'datfin'=>$ser->getdatefin(),
		            'nbrt'=>$ser->getnbrt(),
		              'adresse'=>$ser->getadrs(),
		            'image'=>$ser->getimage(),
		       



	]);
 }
 catch(Exception $e){ 
 	
			 die("erreur:".$e->getMessage());

}

}
function trieevent(){
	$sql="SELECT * FROM evennement ORDER BY datedebut";
	$db=config::getConnexion();
	try{
		$liste=$db->query($sql);
		return $liste;
	}
	catch(Exception $e){
		die("erreur:".$e->getMessage());
	}
}
}
?>
</html>
