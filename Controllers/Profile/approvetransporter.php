<?php
include_once '../../config.php';
session_start();

            $sql ="UPDATE utilisateurs set Role='Transporter' WHERE CIN=:CIN;";
            $db = config::getConnexion();
            $req=$db->prepare($sql);
			$req->bindValue(':CIN', $_GET['c']);
			try{
				$req->execute();
			}
			catch(Exception $e){
				die('Erreur:'. $e->getMessage());
			}
			$sql ="INSERT INTO livreurs (CIN) VALUES (:cin)";
            $req=$db->prepare($sql);
			$req->bindValue(':cin', $_GET['c']);
			try{
				$req->execute();
                header("Location:indexC.php?code=userapproved");	
			}
			catch(Exception $e){
				die('Erreur:'. $e->getMessage());
                header("Location:userprofile.php?code=error");	
			}

            $sql ="DELETE FROM notificationst WHERE From_Client=:CIN;";
            $req=$db->prepare($sql);
			$req->bindValue(':CIN', $_GET['c']);
			try{
				$req->execute();
                header("Location:indexC.php?code=userapproved");	
			}
			catch(Exception $e){
				die('Erreur:'. $e->getMessage());
                header("Location:userprofile.php?code=error");	
			}
            $sql ="INSERT INTO notificationsu (From_user,To_user,Message) VALUES (:adm,:user,'Your request has been approved!')";
            $req=$db->prepare($sql);
			$req->bindValue(':adm', $_GET['a']);
            $req->bindValue(':user', $_GET['c']);
			try{
				$req->execute();
                header("Location:indexC.php?code=userapproved");	
			}
			catch(Exception $e){
				die('Erreur:'. $e->getMessage());
                header("Location:userprofile.php?code=error");	
			}
			



?>