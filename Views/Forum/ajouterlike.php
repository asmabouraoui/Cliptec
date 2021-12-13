<?php

include_once('../../Controllers/commentC.php');

$commentC = new commentC();        

if(isset($_POST["aa"]) )
    {
       

        $id = $_GET['id'];
        $idd=$_GET['idd'];
        $conn=$_GET['conn'];
        $name=$_GET['name'];
        $likee=$_GET['likee'];
        $comment = new comment($idd,$name,$conn,$likee+1);
    
        $commentC->modifier_comment($comment ,$id);
        header("Location:react.php?id=$idd"); 
    }
    else
        {
            $_SESSION['error'] = "Missing information!"  ;
            header('Location: ../views/signUp.php');
        }




?>