<?php
include_once '../../config.php';
session_start();

$sql = "UPDATE livreurs SET Governorat=:gov WHERE CIN=:cin";
            $db = config::getConnexion();
            $req=$db->prepare($sql);
			$req->bindValue(':cin', $_GET['cin']);
			$req->bindValue(':gov', $_GET['gov']);
			try{
				$req->execute();
			}
			catch(Exception $e){
				die('Erreur:'. $e->getMessage());
			}
?>