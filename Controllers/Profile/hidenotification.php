<?php
include_once '../../config.php';
session_start();

            $sql ="UPDATE notificationsu SET Seen='Yes' WHERE From_user=:CIN AND Id_notification=:id;";
            $db = config::getConnexion();
            $req=$db->prepare($sql);
			$req->bindValue(':CIN', $_GET['c']);
            $req->bindValue(':id', $_GET['id']);
			try{
				$req->execute();
			}
			catch(Exception $e){
				die('Erreur:'. $e->getMessage());
			}
?>