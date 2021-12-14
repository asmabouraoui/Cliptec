<?php
    include_once '../../config.php';
    include_once '../../Models/Transporter.php';

    class TransporterC {
    
            function getData($cin) {
                $sql = "SELECT * FROM livreurs WHERE CIN=:cin";
            $db = config::getConnexion();
            $req=$db->prepare($sql);
            $req->bindValue(':cin',$cin);
			try{
				$req->execute();
                return $req;
			}
			catch(Exception $e){
				die('Erreur:'. $e->getMessage());
			}
            }
    }

?>