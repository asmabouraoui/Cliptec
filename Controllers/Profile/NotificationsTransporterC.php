<?php
    include_once '../../config.php';
    include_once '../../Models/NotificationsTransporter.php';
    class NotificationC {
    
            function getNotifications() {
                $sql = "SELECT * FROM notificationst WHERE Approved='No'";
            $db = config::getConnexion();
            $req=$db->prepare($sql);
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