<?php
session_start();
include "C:/wamp64/www/website/dashboard/entitites/user.php";
include "C:/wamp64/www/website/dashboard/core/userC.php";
if(isset($_POST['sign'])){
$user= new user($_POST['idd'],'','','',0,$_POST['pwd']);
$userC= new userC();
$res=$userC->login($user);
foreach($res as $row){
	$id=$row['id'];
	$pwd=$row['mdp'];
	$_SESSION['nomm']=$row['nom'];
	$_SESSION['prenomm']=$row['prenom'];
	$_SESSION['emaill']=$row['email'];
}
if(($id==$_POST['idd']) && ($pwd==$_POST['pwd'])){
	echo "<script>
alert('bienvenue roua');
window.location.href='../index.html';
header('Location: ../index.html');
</script>";
}

else {
	echo "<script>
alert('mot de passe ou login est incorrect');

window.location.href='login.html';
</script>";
}
}
?>