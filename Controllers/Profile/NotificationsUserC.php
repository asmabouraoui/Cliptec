<?php
    include_once '../../config.php';
    include_once '../../Models/NotificationsUser.php';

    class NotificationUC {
    
            function getNotifications($cin) {
                $sql = "SELECT * FROM notificationsu WHERE To_User=:cin AND Seen='No'";
            $db = config::getConnexion();
            $req=$db->prepare($sql);
            $req->bindValue(':cin', $cin);
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