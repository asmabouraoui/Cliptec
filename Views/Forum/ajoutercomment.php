<?php

include_once('../../Controllers/commentC.php');


$commentC = new commentC();
        
if(isset($_POST["username"]))

    {         
        $username = $_POST['username'];
        $comment = $_POST['comment'];
$id=$_GET['id'];
        $comment = new comment($id,$username, $comment,0);
    
        $commentC->ajouter_comment($comment);
        header("Location: ../../Views/Forum/react.php?id=$id");    }
    else
        {
            $_SESSION['error'] = "Missing information!"  ;
            header('Location: ../views/signUp.php');
        }




?>