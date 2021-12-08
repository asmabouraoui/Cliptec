<?php
    include_once '././config.php';
    include_once '././Model/NotificationsTransporter.php';

    class NotificationC {
    
            function getNotifications() {
                $sql = "SELECT * FROM notificationst WHERE Approved='No'";
            $db = config::getConnection();
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