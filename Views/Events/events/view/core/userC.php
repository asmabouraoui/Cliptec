<?php
include "C:\wamp64\www\website\config.php";
class userC {
	function login($user){
		$id=$user->getid();
		$sql="SELECT * from user where id=$id";
		$db = config::getConnexion();
		try{
		$liste=$db->query($sql);
		return $liste;
		}
        catch (Exception $e){
            die('Erreur: '.$e->getMessage());
        }

	}

}



?>