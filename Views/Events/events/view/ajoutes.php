<?php 
include_once '../model/sevice.php';
include_once '../controller/servicec.php';

if(!isset($_POST['ide'])||!isset($_POST['nom'])||!isset($_POST['datedeb'])||!isset($_POST['datefin'])||!isset($_POST['nbrt'])||!isset($_POST['adrs']))
{
	echo "erreur de ";
}
if (isset($_FILES['image']) && $_FILES['image']['error'] == 0)
{
        // Testons si le fichier n'est pas trop gros
        if ($_FILES['image']['size'] <= 1000000)
        {
                // Testons si l'extension est autorisée
                $fileInfo = pathinfo($_FILES['image']['name']);
                $extension = $fileInfo['extension'];
                $allowedExtensions = ['jpg', 'jpeg', 'gif', 'png','jfif'];
                if (in_array($extension, $allowedExtensions))
                {
                        // On peut valider le fichier et le stocker définitivement
                        move_uploaded_file($_FILES['image']['tmp_name'], 'uploads/' . basename($_FILES['image']['name']));
                        echo "L'envoi a bien été effectué !.<br>"; 
                      //  echo  'uploads/' . basename($_FILES['screenshot']['name']);
                }
        }
} 

$ser=new event($_POST['ide'],$_POST['nom'],$_POST['datedeb'],$_POST['datefin'],$_POST['nbrt'],$_POST['adrs'],$_FILES['image']['name']);


$serc=new eventc();
$serc->Ajouter($ser);
header('location:http://localhost:7882/sarah-copie/view/dashboard-events.php');

?>