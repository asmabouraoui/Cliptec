<?php
 include_once '../../config.php';
session_start();

$sql = "SELECT * FROM notificationst WHERE From_Client=:cin";
            $db = config::getConnexion();
            $req=$db->prepare($sql);
			$req->bindValue(':cin', $_GET['cin']);
			try{
				$req->execute();
                $result = $req->rowCount();
			}
			catch(Exception $e){
				die('Erreur:'. $e->getMessage());
			}

            if ($result<1)
            {
                $sql="INSERT INTO notificationst (From_Client,Content)
			VALUES (:CIN,'Awaiting your approval to become a transporter!')";
			try{
				$query = $db->prepare($sql);
				$query->execute([
                    'CIN' => $_GET['cin']
				]);	
                header("Location:../../Views/Profile/userprofile.php?code=Submited");		
			}
			catch (Exception $e){
				die('Erreur: '.$e->getMessage());
			}
            } else 
            header("Location:../../Views/Profile/userprofile.php?error=AlreadySubmited");

			



?>